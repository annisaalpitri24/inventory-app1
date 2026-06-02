@extends('layouts.main')

@section('content')

<div class="container mt-5">

    <h2 class="mb-4 text-center">Edit Product</h2>

    <form action="/update/{{ $product->id }}" method="POST">
        @csrf

        <!-- Nama Product -->
        <div class="mb-3">
            <label for="name" class="form-label">Nama Product</label>

            <input
                type="text"
                name="name"
                id="name"
                class="form-control"
                value="{{ $product->name }}"
                required>
        </div>

        <!-- Harga -->
        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>

            <input
                type="number"
                name="price"
                id="price"
                class="form-control"
                value="{{ $product->price }}"
                required>
        </div>

        <!-- Deskripsi -->
        <div class="mb-3">
            <label for="description" class="form-label">Deskripsi</label>

            <textarea
                name="description"
                id="description"
                class="form-control"
                rows="4">{{ $product->description }}</textarea>
        </div>

        <!-- Status -->
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>

            <select
                name="status"
                id="status"
                class="form-select"
                required>

                <option value="Tersedia"
                    {{ $product->status == 'Tersedia' ? 'selected' : '' }}>
                    Tersedia
                </option>

                <option value="Tidak Tersedia"
                    {{ $product->status == 'Tidak Tersedia' ? 'selected' : '' }}>
                    Tidak Tersedia
                </option>

            </select>
        </div>

        <!-- Kategori -->
        <div class="mb-3">
            <label for="category_id" class="form-label">Kategori</label>

            <select
                name="category_id"
                id="category_id"
                class="form-select"
                required>

                @foreach($category as $c)
                <option value="{{ $c->id }}"
                    {{ $product->category_id == $c->id ? 'selected' : '' }}>
                    {{ $c->name }}
                </option>
                @endforeach

            </select>
        </div>

        <!-- Button -->
        <div class="mt-4 d-flex justify-content-between">

            <a href="/product" class="btn btn-secondary">
                Kembali
            </a>

            <button type="submit" class="btn btn-primary">
                Update
            </button>

        </div>

    </form>

</div>

@endsection