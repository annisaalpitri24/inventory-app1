@extends('layouts.main')

@section('content')
<div class="card-header-gradient text-center">

    <h1>Daftar Barang Inventaris</h1>


</div>

<style>
    .btn-custom {
        background: linear-gradient(135deg, #ec4899, #db2777);
        border: none;
        color: white;
        font-weight: 600;
        padding: 10px 20px;
        border-radius: 14px;
        transition: 0.3s ease;
        box-shadow: 0 6px 15px rgba(219, 39, 119, 0.25);
    }

    .btn-custom:hover {
        transform: translateY(-2px);
        background: linear-gradient(135deg, #db2777, #be185d);
        color: white;
        box-shadow: 0 10px 20px rgba(219, 39, 119, 0.35);
    }

    .btn-update {
        background: linear-gradient(135deg, #f59e0b, #f97316);
        border: none;
        color: white;
        border-radius: 10px;
        padding: 6px 14px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-update:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 14px rgba(249, 115, 22, 0.3);
        color: white;
    }

    .btn-delete {
        background: linear-gradient(135deg, #ef4444, #dc2626);
        border: none;
        color: white;
        border-radius: 10px;
        padding: 6px 14px;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-delete:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 14px rgba(220, 38, 38, 0.3);
        color: white;
    }
</style>


<a href="/create" class="btn btn-custom mb-3">
    Tambah Data Otomatis
</a>

<table class="table table-striped table-bordered">
    <thead>
        <tr>
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
            <td>{{ $p->name }}</td>
            <td>{{ $p->category->name ?? '-' }}</td>
            <td>Rp {{ number_format($p->price) }}</td>
            <td>{{ $p->stock }}</td>
            <td>{{ $p->description }}</td>
            <td>{{ $p->status }}</td>
            <td>
                <a href="/edit/{{ $p->id }}" class="btn btn-update btn-sm">
                    Update
                </a>

                <a href="/delete/{{ $p->id }}" class="btn btn-delete btn-sm"
                onclick="return confirm('Apakah yakin ingin menghapus data ini?')">
                    
                    Delete
                </a>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="7" class="text-center">Data tidak ada</td>
        </tr>
        @endforelse
    </tbody>
</table>

{{ $products->links('pagination::bootstrap-5') }}
@endsection