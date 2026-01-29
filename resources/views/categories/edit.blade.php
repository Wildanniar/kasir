@extends('layouts.app')

@section('content')
<div class="container-fluid">
<h1 class="h3 mb-4">Edit Kategori</h1>

<form action="{{ route('categories.update',$category->id) }}" method="POST">
@csrf @method('PUT')

<div class="form-group">
    <label>Nama Kategori</label>
    <input type="text" name="name" class="form-control"
        value="{{ old('name',$category->name) }}" required>
</div>

<button class="btn btn-primary">Update</button>
<a href="{{ route('categories.index') }}" class="btn btn-secondary">Kembali</a>
</form>
</div>
@endsection
