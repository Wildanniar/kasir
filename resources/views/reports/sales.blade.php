@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Laporan Penjualan</h1>

    <form method="GET" class="row mb-3">
        <div class="col-md-3">
            <input type="date" name="start_date" class="form-control"
                   value="{{ request('start_date') }}">
        </div>
        <div class="col-md-3">
            <input type="date" name="end_date" class="form-control"
                   value="{{ request('end_date') }}">
        </div>
        <div class="col-md-2">
            <button class="btn btn-primary">Filter</button>
        </div>
        <div class="col-md-4 text-right">
            <a href="{{ route('reports.sales.pdf') }}" class="btn btn-danger">
                <i class="fas fa-file-pdf"></i> PDF
            </a>
            <a href="{{ route('reports.sales.excel') }}" class="btn btn-success">
                <i class="fas fa-file-excel"></i> Excel
            </a>
        </div>
    </form>

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        <th>Kode</th>
                        <th>Kasir</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($sales as $s)
                    <tr>
                        <td>{{ $s->created_at->format('d-m-Y') }}</td>
                        <td>{{ $s->invoice }}</td>
                        <td>{{ $s->user->name }}</td>
                        <td>Rp {{ number_format($s->total) }}</td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">TOTAL</th>
                        <th>Rp {{ number_format($total) }}</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection