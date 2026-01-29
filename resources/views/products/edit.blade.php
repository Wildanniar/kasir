@extends('layouts.app')

@section('content')
<div class="container-fluid">
<h1 class="h3 mb-4">Edit Produk</h1>

<form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
@csrf @method('PUT')

@include('products.form')

<button class="btn btn-primary">Update</button>
<a href="{{ route('products.index') }}" class="btn btn-secondary">Kembali</a>
</form>
</div>
@endsection
