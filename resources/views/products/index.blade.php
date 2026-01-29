@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800">Data Produk</h1>

    {{-- TOMBOL TAMBAH (ADMIN ONLY) --}}
    @if(auth()->user()->role === 'admin')
    <a href="{{ route('products.create') }}" class="btn btn-primary btn-sm">
        <i class="fas fa-plus"></i> Tambah Produk
    </a>
    @endif

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($products as $p)
                    <tr>
                        <td>{{ $p->code }}</td>
                        <td>{{ $p->name }}</td>
                        <td>{{ $p->category->name }}</td>
                        <td>Rp {{ number_format($p->price_sell) }}</td>
                        <td>{{ $p->stock }}</td>
                        <td>
                            {{-- AKSI (ADMIN ONLY) --}}
                            @if(auth()->user()->role === 'admin')
                                <a href="{{ route('products.edit',$p->id) }}"
                                    class="btn btn-warning btn-sm">Edit</a>

                                <form method="POST" action="{{ route('products.destroy',$p->id) }}"
                                        class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button onclick="return confirm('Hapus produk?')"
                                    class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            @else
                                {{-- KASIR VIEW ONLY --}}
                                <span class="badge badge-info">View Only</span>
                            @endif

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            {{ $products->links() }}
        </div>
    </div>
</div>
@endsection
