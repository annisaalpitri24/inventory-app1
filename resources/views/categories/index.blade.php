@extends('layouts.main')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Daftar Kategori</h1>
    @if(Auth::check() && Auth::user()->role === 'admin')
        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            + Tambah Kategori
        </a>
    @endif
</div>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            @if(Auth::check() && Auth::user()->role === 'admin')
                <th>Aksi</th>
            @endif
        </tr>
    </thead>

    <tbody>
        @forelse($categories as $index => $category)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $category->name }}</td>
            @if(Auth::check() && Auth::user()->role === 'admin')
                <td>
                    <a href="{{ route('categories.edit', $category->id) }}"
                       class="btn btn-warning btn-sm">
                       Edit
                    </a>

                    <form action="{{ route('categories.destroy', $category->id) }}"
                          method="POST"
                          style="display:inline;">

                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin hapus data?')">
                            Hapus
                        </button>

                    </form>
                </td>
            @endif
        </tr>
        @empty
        <tr>
            <td colspan="3" class="text-center text-muted py-3">
                Tidak ada data kategori yang ditemukan.
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

@endsection