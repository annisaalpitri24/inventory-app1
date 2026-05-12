@extends('layouts.main')

@section('content')

<style>
    body {
        background: linear-gradient(135deg, #ff9a9e, #fad0c4);
        min-height: 100vh;
    }

    .card {
        border: none;
        border-radius: 20px;
        background: rgba(255, 255, 255, 0.95);
    }

    h3 {
        color: #d63384;
        font-weight: bold;
        text-align: center;
        margin-bottom: 20px;
    }

    .form-control {
        border-radius: 10px;
    }

    .btn-primary {
        background: #d63384;
        border: none;
        border-radius: 10px;
        width: 10%;
        padding: 10px;
        font-weight: bold;
    }

    .btn-primary:hover {
        background: #c2186a;
    }
</style>

<div class="container mt-5">
    <div class="card p-4 shadow">
        <h3>Edit Product</h3>

        <form action="/update/{{ $product->id }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nama Product</label>
                <input type="text" name="name" class="form-control"
                    value="{{ $product->name }}">
            </div>

            <div class="mb-3">
                <label>Harga</label>
                <input type="number" name="price" class="form-control"
                    value="{{ $product->price }}">
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="description" class="form-control">{{ $product->description }}</textarea>
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="tersedia"
                        {{ $product->status == 'tersedia' ? 'selected' : '' }}>
                        Tersedia
                    </option>

                    <option value="tidak tersedia"
                        {{ $product->status == 'tidak tersedia' ? 'selected' : '' }}>
                        tidak tersedia
                    </option>
                </select>
            </div>

            <div class="mb-3">
                <label>Kategori</label>
                <select name="category_id" class="form-control">
                    @foreach($category as $c)
                        <option value="{{ $c->id }}"
                            {{ $product->category_id == $c->id ? 'selected' : '' }}>
                            {{ $c->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">
                Update
            </button>
        </form>
    </div>
</div>

@endsection