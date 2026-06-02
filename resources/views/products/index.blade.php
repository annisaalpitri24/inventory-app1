@extends('layouts.main')

@section('content')

<div class="container mt-5">

    <!-- Judul -->
    <h2 class="text-center mb-4">
        Daftar Barang Inventaris
    </h2>

    <!-- Tombol Tambah -->
    <div class="mb-3">
        <a href="/create" class="btn btn-primary">
            Tambah Data
        </a>
    </div>

    <!-- Table -->
    <table class="table table-bordered">

        <thead class="table-light">
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse($products as $p)

            <tr>

                <!-- Nomor -->
                <td>
                    {{ ($products->currentPage() - 1) * $products->perPage() + $loop->iteration }}
                </td>

                <!-- Nama Barang -->
                <td>
                    {{ $p->name }}
                </td>

                <!-- Kategori -->
                <td>
                    {{ $p->category->name ?? '-' }}
                </td>

                <!-- Harga -->
                <td>
                    Rp {{ number_format($p->price, 0, ',', '.') }}
                </td>

                <!-- Stok -->
                <td>
                    {{ $p->stock }}
                </td>

                <!-- Deskripsi -->
                <td>
                    {{ $p->description }}
                </td>

                <!-- Status -->
                <td>
                    @if(strtolower($p->status) == 'tersedia')
                    <span class="badge bg-success">
                        {{ $p->status }}
                    </span>
                    @else
                    <span class="badge bg-danger">
                        {{ $p->status }}
                    </span>
                    @endif
                </td>

                <!-- Tombol -->
                <td>

                    <a href="/edit/{{ $p->id }}"
                        class="btn btn-warning btn-sm">

                        Update
                    </a>

                    <a href="/delete/{{ $p->id }}"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Apakah yakin ingin menghapus data ini?')">

                        Delete
                    </a>

                </td>

            </tr>

            @empty

            <tr>
                <td colspan="8" class="text-center">
                    Data tidak ada
                </td>
            </tr>

            @endforelse

        </tbody>

    </table>

    <!-- Pagination -->
    <div class="mt-3">
        {{ $products->links('pagination::bootstrap-5') }}
    </div>

</div>

@endsection