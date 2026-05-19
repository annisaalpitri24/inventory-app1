@extends('layouts.main')

@section('content')

<div class="container mt-5">

    <h2 class="mb-4 text-center">Tambah Produk</h2>

    <form action="/store" method="POST">
        @csrf

        <!-- Nama Produk -->
        <div class="mb-3">
            <label for="name" class="form-label">Nama Produk</label>

            <input
                type="text"
                name="name"
                id="name"
                class="form-control"
                placeholder="Masukkan nama produk"
                required>
        </div>

        <!-- Kategori -->
        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>

            <select
                name="category_id"
                id="category_id"
                class="form-select"
                required>

                <option value="">-- Pilih Kategori --</option>

                @foreach($category as $item)
                <option value="{{ $item->id }}">
                    {{ $item->name }}
                </option>
                @endforeach

            </select>
        </div>

        <!-- Harga -->
        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>

            <input
                type="number"
                name="price"
                id="price"
                class="form-control"
                placeholder="Masukkan harga"
                required>
        </div>

        <!-- Stok -->
        <div class="mb-3">
            <label for="stock" class="form-label">Stok</label>

            <input
                type="number"
                name="stock"
                id="stock"
                class="form-control"
                placeholder="Masukkan stok"
                required>
        </div>

        <!-- Deskripsi -->
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>

            <textarea
                name="description"
                id="description"
                rows="4"
                class="form-control"
                placeholder="Masukkan deskripsi produk"></textarea>
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label for="status" class="form-label">Status Produk</label>

            <select
                name="status"
                id="status"
                class="form-select"
                required>

                <option value="">-- Pilih Status --</option>
                <option value="Tersedia">Tersedia</option>
                <option value="Tidak Tersedia">Tidak Tersedia</option>

            </select>
        </div>

        <!-- Tombol -->
        <div class="mt-4 d-flex justify-content-between">

            <a href="/product" class="btn btn-secondary">
                Kembali
            </a>

            <button type="submit" class="btn btn-primary">
                Simpan Product
            </button>

        </div>
    </form>

</div>

@endsection