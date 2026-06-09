@extends('layouts.main')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Daftar Barang Inventaris</h1>

    @if(Auth::check() && Auth::user()->role === 'admin')
    <a href="{{ route('product.create') }}" class="btn btn-primary">
        + Tambah Barang
    </a>
    @endif
</div>

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button"
        class="btn-close"
        data-bs-dismiss="alert">
    </button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button"
        class="btn-close"
        data-bs-dismiss="alert">
    </button>
</div>
@endif

<div class="card shadow-sm mb-4">
    <div class="card-body">
        <div class="table-responsive">

            <table class="table table-striped table-hover align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Deskripsi</th>
                        <th>Status</th>

                        @if(Auth::check() && Auth::user()->role === 'admin')
                        <th>Aksi</th>
                        @endif
                    </tr>
                </thead>

                <tbody>
                    @forelse($products as $p)
                    <tr>
                        <td>
                            {{ $products->firstItem()
                                        ? $products->firstItem() + $loop->index
                                        : $loop->iteration }}
                        </td>

                        <td>{{ $p->name }}</td>

                        <td>
                            {{ $p->category->name ?? '-' }}
                        </td>

                        <td>
                            Rp {{ number_format($p->price, 0, ',', '.') }}
                        </td>

                        <td>{{ $p->stock }}</td>

                        <td>{{ $p->description }}</td>

                        <td>
                            <span class="badge {{ $p->status == 'Tersedia' ? 'bg-success' : 'bg-danger' }}">
                                {{ $p->status }}
                            </span>
                        </td>

                        @if(Auth::check() && Auth::user()->role === 'admin')
                        <td class="text-nowrap">

                            <a href="{{ route('product.edit', $p->id) }}"
                                class="btn btn-warning btn-sm">
                                Edit
                            </a>

                            <a href="{{ route('product.delete', $p->id) }}"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin mau hapus data ini?')">
                                Hapus
                            </a>

                        </td>
                        @endif
                    </tr>
                    @empty
                    <tr>
                        <td colspan="{{ Auth::check() && Auth::user()->role === 'admin' ? 8 : 7 }}"
                            class="text-center text-muted">
                            Tidak ada data barang yang ditemukan.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center flex-wrap gap-3">

    <div class="text-muted small">
        @if($products->total())
        Menampilkan {{ $products->firstItem() }}
        sampai {{ $products->lastItem() }}
        dari {{ $products->total() }} data
        @endif
    </div>

    <div>
        {{ $products->links('pagination::bootstrap-5') }}
    </div>

</div>
@endsection