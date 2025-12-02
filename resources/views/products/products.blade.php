@extends('products.layout')

@section('title', 'Daftar Produk')

@section('content')

<h1 class="mb-4">Daftar Produk</h1>

<a href="{{ route('products.create') }}" class="btn btn-primary mb-4">
    + Tambah Produk
</a>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

{{-- FORM PENCARIAN + FILTER HARGA + SORT --}}
<form method="GET" action="{{ route('products.index') }}" class="row g-3 mb-4">

    {{-- Search nama / deskripsi --}}
    <div class="col-md-4">
        <input type="text"
               name="search"
               class="form-control"
               placeholder="Cari produk..."
               value="{{ request('search') }}">
    </div>

    {{-- Min price --}}
    <div class="col-md-2">
        <input type="number"
               name="min_price"
               class="form-control"
               placeholder="Harga min"
               value="{{ request('min_price') }}">
    </div>

    {{-- Max price --}}
    <div class="col-md-2">
        <input type="number"
               name="max_price"
               class="form-control"
               placeholder="Harga max"
               value="{{ request('max_price') }}">
    </div>

    {{-- Sort --}}
    <div class="col-md-3">
        <select name="sort" class="form-select">
            <option value="">Urutkan...</option>
            <option value="name_asc"  {{ request('sort')=='name_asc' ? 'selected' : '' }}>Nama A-Z</option>
            <option value="name_desc" {{ request('sort')=='name_desc' ? 'selected' : '' }}>Nama Z-A</option>
            <option value="price_asc" {{ request('sort')=='price_asc' ? 'selected' : '' }}>Harga termurah</option>
            <option value="price_desc"{{ request('sort')=='price_desc' ? 'selected' : '' }}>Harga termahal</option>
        </select>
    </div>

    <div class="col-md-1">
        <button type="submit" class="btn btn-primary w-100">
            Filter
        </button>
    </div>

</form>

{{-- LIST PRODUK --}}
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
    @forelse ($products as $product)
        <div class="col">
            <div class="card h-100 shadow-sm">

                <img src="{{ asset('images/products/' . $product->image) }}"
                     class="card-img-top"
                     alt="{{ $product->name }}">

                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>

                    <p class="mb-1 fw-bold">
                        Rp {{ number_format($product->price, 0, ',', '.') }}
                    </p>

                    <p class="mb-1 text-warning small">
                        {{ $product->category->name ?? '-' }}
                    </p>

                    <p class="card-text small">
                        {{ $product->description }}
                    </p>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('products.edit', $product->id) }}"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="{{ route('products.delete', $product->id) }}"
                          method="POST"
                          onsubmit="return confirm('Yakin hapus produk ini?')">
                        @csrf
                        @method('POST')
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </div>

            </div>
        </div>
    @empty
        <p>Belum ada produk.</p>
    @endforelse
</div>

@endsection
