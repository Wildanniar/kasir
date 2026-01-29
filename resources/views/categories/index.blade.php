@extends('layouts.app')

@section('title', 'Kategori')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 text-gray-800">Data Kategori</h1>
    <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addModal">
        <i class="fas fa-plus fa-sm"></i> Tambah Kategori
    </button>
</div>

<div class="card shadow mb-4">
<div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Tabel Kategori</h6>
</div>
<div class="card-body">
<table class="table table-bordered">
    <thead>
        <tr>
            <th width="50">No</th>
            <th>Nama</th>
            <th width="150">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($categories as $no => $item)
        <tr>
            <td>{{ $no+1 }}</td>
            <td>{{ $item->name }}</td>
            <td>
                <button class="btn btn-warning btn-sm">Edit</button>
                <button class="btn btn-danger btn-sm">Hapus</button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
</div>

@endsection
