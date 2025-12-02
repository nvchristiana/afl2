@extends('products.layout')

@section('title', 'Tambah Produk')

@section('content')

<h1 class="mb-4">Tambah Produk</h1>

<div class="card p-4 shadow-sm">

    {{-- Tampilkan error jika ada --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('products.store') }}" method="POST">
        @csrf

        {{-- Nama Produk --}}
        <div class="mb-3">
            <label class="form-label">Nama Produk</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        {{-- Harga --}}
        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        {{-- Deskripsi --}}
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
        </div>

        {{-- Nama File Gambar --}}
        <div class="mb-3">
            <label class="form-label">Nama File Gambar</label>
            <input type="text" name="image" class="form-control" placeholder="contoh: 10.jpg">
        </div>

        {{-- Kategori --}}
        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="category_id" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary">Simpan Produk</button>
    </form>

</div>

@endsection


