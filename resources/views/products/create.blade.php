@extends('layouts.main')

@section('content')

<style>
    /* Background putih */
    body {
        background: #f4c8e9;
        min-height: 100vh;
    }

    /* Card utama */
    .product-card {
        border: none;
        border-radius: 24px;
        overflow: hidden;
        background: #ffffff;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }

    /* Header gradasi */
    .card-header-gradient {
        background: linear-gradient(135deg, #ec4899, #f472b6, #db2777);
        color: white;
        padding: 30px;
        position: relative;
    }

    /* Efek bulat dekorasi */
    .card-header-gradient::before {
        content: "";
        position: absolute;
        width: 180px;
        height: 180px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 50%;
        top: -70px;
        right: -60px;
    }

    .card-header-gradient::after {
        content: "";
        position: absolute;
        width: 120px;
        height: 120px;
        background: rgba(255, 255, 255, 0.08);
        border-radius: 50%;
        bottom: -40px;
        left: -40px;
    }

    /* Form */
    .form-control,
    .form-select {
        border-radius: 14px;
        border: 1px solid #dcdcdc;
        padding: 12px 15px;
        font-size: 14px;
        transition: all 0.3s ease;
        background: #f9fafb;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #ed3a73;
        background: white;
        box-shadow: 0 0 0 0.2rem rgba(124, 58, 237, 0.15);
    }

    .form-label {
        font-size: 14px;
        font-weight: 600;
        color: #374151;
        margin-bottom: 8px;
    }

    /* Tombol utama */
    .btn-gradient {
        background: linear-gradient(135deg, #e54680, #ed3ad8);
        border: none;
        color: white;
        border-radius: 14px;
        padding: 11px 24px;
        font-size: 14px;
        font-weight: 600;
        transition: 0.3s ease;
    }

    .btn-gradient:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 20px rgba(79, 70, 229, 0.25);
        color: white;
    }

    /* Tombol kembali */
    .btn-secondary-custom {
        background: #eef2ff;
        color: #e546bd;
        border: none;
        border-radius: 14px;
        padding: 11px 24px;
        font-size: 14px;
        font-weight: 600;
        transition: 0.3s ease;
    }

    .btn-secondary-custom:hover {
        background: #dbeafe;
        color: #ca389e;
    }

    .card-body {
        padding: 40px;
    }

    textarea {
        resize: none;
    }
</style>

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-7">

            <div class="card product-card">

                <!-- Header -->
                <div class="card-header-gradient text-center">

                    <h3 class="fw-bold mb-2">
                        Tambah Produk
                    </h3>

                    <p class="mb-0 opacity-75" style="font-size:14px;">
                        Lengkapi data produk dengan informasi yang benar
                    </p>

                </div>

                <!-- Body -->
                <div class="card-body">

                    <form action="/store" method="POST">
                        @csrf

                        <!-- Nama Produk -->
                        <div class="mb-4">

                            <label for="name" class="form-label">
                                Nama Produk
                            </label>

                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="form-control"
                                placeholder="Masukkan nama produk"
                                required>

                        </div>

                        <!-- Kategori -->
                        <div class="mb-4">

                            <label for="category_id" class="form-label">
                                Kategori
                            </label>

                            <select
                                name="category_id"
                                id="category_id"
                                class="form-select"
                                required>
                                <option value="">-- Pilih Kategori --</option>

                                @foreach($category as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                                @endforeach

                            </select>

                        </div>

                        <!-- Harga & Stok -->
                        <div class="row">

                            <div class="col-md-6 mb-4">

                                <label for="price" class="form-label">
                                    Harga
                                </label>

                                <input
                                    type="number"
                                    name="price"
                                    id="price"
                                    class="form-control"
                                    placeholder="Masukkan harga"
                                    required>

                            </div>

                            <div class="col-md-6 mb-4">

                                <label for="stock" class="form-label">
                                    Stok
                                </label>

                                <input
                                    type="number"
                                    name="stock"
                                    id="stock"
                                    class="form-control"
                                    placeholder="Masukkan stok"
                                    required>

                            </div>

                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-4">

                            <label for="description" class="form-label">
                                Deskripsi
                            </label>

                            <textarea
                                name="description"
                                id="description"
                                rows="4"
                                class="form-control"
                                placeholder="Masukkan deskripsi produk..."></textarea>

                        </div>

                        <!-- Status -->
                        <div class="mb-4">

                            <label for="status" class="form-label">
                                Status Produk
                            </label>

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

                        <!-- Button -->
                        <div class="d-flex justify-content-between align-items-center mt-4">

                            <a href="/product" class="btn btn-secondary-custom">
                                Kembali
                            </a>

                            <button type="submit" class="btn btn-gradient">
                                Simpan Produk
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

</div>

@endsection