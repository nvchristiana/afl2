@extends('products.layout')

@section('title', 'Edit Produk')

@section('content')

<h1 class="mb-4">Edit Produk #{{ $product->id }}</h1>

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


    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('POST') {{-- AFL belum pakai PUT --}}

        {{-- Nama Produk --}}
        <div class="mb-3">
            <label class="form-label">Nama Produk</label>
            <input type="text" name="name" value="{{ $product->name }}" class="form-control" required>
        </div>

        {{-- Harga --}}
        <div class="mb-3">
            <label class="form-label">Harga</label>
            <input type="number" name="price" value="{{ $product->price }}" class="form-control" required>
        </div>

        {{-- Deskripsi --}}
        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" rows="3">{{ $product->description }}</textarea>
        </div>

        {{-- Nama File Gambar --}}
        <div class="mb-3">
            <label class="form-label">Nama File Gambar</label>
            <input type="text" name="image" value="{{ $product->image }}" class="form-control">
        </div>

        {{-- Kategori --}}
        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="category_id" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" 
                        {{ $product->category_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-warning">Update Produk</button>
    </form>

</div>

@endsection

