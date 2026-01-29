@extends('layouts.app')

@section('content')
<div class="container-fluid">
<h1 class="h3 mb-4">Tambah Produk</h1>

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
@csrf

@include('products.form')

<button class="btn btn-primary">Simpan</button>
<a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>
</form>
</div>
@endsection
