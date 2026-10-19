@extends('layouts.admin.app')

@section('title', 'Data Produk Kue | Aroma Avvolgente')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h4 class="mb-0">Data Produk Kue</h4>
            <a href="{{ route('produk-kue.create') }}" class="btn btn-primary">
                <i class="fa fa-plus me-2"></i>Tambah Produk Kue
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Kue</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($produkKues as $produkKue)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $produkKue->nama_kue }}</td>
                        <td>{{ $produkKue->kategori }}</td>
                        <td>Rp {{ number_format($produkKue->harga, 0, ',', '.') }}</td>
                        <td>{{ $produkKue->stok }}</td>
                        <td>
                            <a href="{{ route('produk-kue.edit', $produkKue->id) }}"
                               class="btn btn-sm btn-warning">Edit</a>

                            <form action="{{ route('produk-kue.destroy', $produkKue->id) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus produk kue ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">
                            Belum ada data produk kue.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
