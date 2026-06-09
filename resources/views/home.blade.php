@extends('layouts.main')

@section('content')
    <div class="row justify-content-center align-items-center text-center" style="min-height: calc(100vh - 200px);">
        <div class="col-lg-8">
            <h1 class="display-3 fw-bold mb-3">Inventory App</h1>
            <p class="lead text-muted mb-5">Selamat datang pada aplikasi inventaris sederhana Laravel.</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <a href="{{ route('product') }}" class="btn btn-primary btn-lg px-5 py-3">Kelola Produk</a>
                <a href="{{ route('categories.index') }}" class="btn btn-success btn-lg px-5 py-3">Kelola Kategori</a>
            </div>
        </div>
    </div>
@endsection