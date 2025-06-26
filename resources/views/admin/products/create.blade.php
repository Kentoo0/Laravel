@extends('layouts.app') {{-- Atau sesuaikan layout-mu --}}
@section('content')

<div class="container">
    <h1>Tambah Produk Baru</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nama Produk</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" name="price" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stok</label>
            <input type="number" name="stock" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Kategori</label>
            <select name="category" class="form-select" required>
                <option value="1">Male</option>
                <option value="2">Female</option>
                <option value="3">Unisex</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="volume" class="form-label">Volume</label>
            <input type="text" name="volume" class="form-control">
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Tipe</label>
            <input type="text" name="type" class="form-control">
        </div>

        <div class="mb-3">
            <label for="longevity" class="form-label">Ketahanan</label>
            <input type="text" name="longevity" class="form-control">
        </div>

        <div class="mb-3">
            <label for="aroma" class="form-label">Aroma</label>
            <input type="text" name="aroma" class="form-control">
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Gambar</label>
            <input type="file" name="image" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>
            <textarea name="description" rows="4" class="form-control" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Produk</button>
    </form>
</div>

@endsection
