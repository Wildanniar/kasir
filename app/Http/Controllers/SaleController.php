<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\SaleDetail;
use App\Models\StockLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::where('stock','>',0)->get();
        $cart = session()->get('cart', []);
        return view('sales.index', compact('products','cart'));
    }

     public function add(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        if ($product->stock <= 0) {
            return back()->with('error','Stok habis');
        }

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            if ($cart[$product->id]['qty'] >= $product->stock) {
                return back()->with('error','Stok tidak cukup');
            }
            $cart[$product->id]['qty']++;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price_sell,
                'qty' => 1
            ];
        }

        session()->put('cart', $cart);
        return back();
    }

    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);
        unset($cart[$request->product_id]);
        session()->put('cart', $cart);
        return back();
    }

    public function receipt(Sale $sale)
    {
        $sale->load(['details.product','user']);
        return view('sales.receipt', compact('sale'));
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart');

        if (!$cart) {
            return back()->with('error','Keranjang kosong');
        }

        $sale = null;

        DB::transaction(function () use ($cart, $request, &$sale) {

            $total = collect($cart)->sum(fn($i)=>$i['price']*$i['qty']);

            $sale = Sale::create([
                'invoice' => 'INV-'.time(),
                'user_id' => auth()->id(),
                'total'   => $total,
                'paid'    => $request->paid,
                'change'  => $request->paid - $total,
                'payment_method' => 'cash'
            ]);

            foreach ($cart as $productId => $item) {

                SaleDetail::create([
                    'sale_id'   => $sale->id,
                    'product_id'=> $productId,
                    'qty'       => $item['qty'],
                    'price'     => $item['price'],
                    'subtotal'  => $item['qty'] * $item['price']
                ]);

                Product::where('id',$productId)
                    ->decrement('stock', $item['qty']);

                StockLog::create([
                    'product_id'=> $productId,
                    'user_id'   => auth()->id(),
                    'qty'       => $item['qty'],
                    'type'      => 'out',
                    'description'=>'Penjualan'
                ]);
            }
        });

    session()->forget('cart');
        return redirect()->route('sales.receipt', $sale->id)->with('success','Transaksi berhasil');
    }
}
