<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SalesExport;

class ReportController extends Controller
{
    public function sales(Request $request)
    {
        $query = Sale::with('user');

        if ($request->start_date && $request->end_date) {
            $query->whereBetween('created_at', [
                $request->start_date.' 00:00:00',
                $request->end_date.' 23:59:59'
            ]);
        }

        $sales = $query->orderBy('created_at','desc')->get();
        $total = $sales->sum('total');

        return view('reports.sales', compact('sales','total'));
    }

    public function salesPdf(Request $request)
    {
        $sales = Sale::with('user')->get();
        $total = $sales->sum('total');

        $pdf = PDF::loadView('reports.sales_pdf', compact('sales','total'));
        return $pdf->download('laporan-penjualan.pdf');
    }

    public function salesExcel()
    {
        return Excel::download(new SalesExport, 'laporan-penjualan.xlsx');
    }
}
