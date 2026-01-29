@extends('layouts.app')

@section('content')
<div class="container-fluid">
<h1 class="h3 mb-4">Transaksi Kasir</h1>

@if(session('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

<div class="row">
<div class="col-md-7">
    <div class="card shadow">
        <div class="card-header">Produk</div>
        <div class="card-body">
            <table class="table table-bordered">
                @foreach($products as $p)
                <tr>
                    <td>{{ $p->name }}</td>
                    <td>Rp {{ number_format($p->price_sell) }}</td>
                    <td>
                        <form action="{{ route('sales.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $p->id }}">
                            <button class="btn btn-success btn-sm">Tambah</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

<div class="col-md-5">
    <div class="card shadow">
        <div class="card-header">Keranjang</div>
        <div class="card-body">
            @php $total=0; @endphp
            @foreach($cart as $id=>$item)
                @php $subtotal = $item['qty']*$item['price']; $total+=$subtotal; @endphp
                <div class="d-flex justify-content-between">
                    <span>{{ $item['name'] }} ({{ $item['qty'] }})</span>
                    <span>Rp {{ number_format($subtotal) }}</span>
                </div>
            @endforeach

            <hr>
            <h5>Total: Rp {{ number_format($total) }}</h5>

            <form action="{{ route('sales.checkout') }}" method="POST">
                @csrf
                <input type="number" name="paid" class="form-control mb-2" placeholder="Uang Bayar" required>
                <button class="btn btn-primary btn-block">Bayar</button>
            </form>
        </div>
    </div>
</div>
</div>
</div>
@endsection
