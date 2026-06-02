@extends('layouts.main')

@section('content')

<div class="text-center mt-5">

    <h1 class="display-4">
        Inventory App
    </h1>

    <p class="lead">
        Selamat datang pada aplikasi inventaris sederhana Laravel.
    </p>

    <div class="mt-4">

        <a href="{{ route('product') }}"
           class="btn btn-primary btn-lg">
            Kelola Produk
        </a>

        <a href="{{ route('categories.index') }}"
           class="btn btn-success btn-lg">
            Kelola Kategori
        </a>

    </div>

</div>

@endsection