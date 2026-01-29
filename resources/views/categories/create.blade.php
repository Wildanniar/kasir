@extends('layouts.app')

@section('content')
<div class="container-fluid">
<h1 class="h3 mb-4">Tambah Kategori</h1>

<form action="{{ route('categories.store') }}" method="POST">
@csrf

<div class="form-group">
    <label>Nama Kategori</label>
    <input type="text" name="name" class="form-control" required>
</div>

<button class="btn btn-primary">Simpan</button>
<a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
</form>
</div>
@endsection
