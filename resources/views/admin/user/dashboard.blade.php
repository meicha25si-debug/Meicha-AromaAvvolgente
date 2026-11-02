@extends('layouts.admin.app')

@section('title', 'Dashboard | Aroma Avvolgente')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="mb-4">
        <h3 class="mb-1">Dashboard</h3>
        <p class="text-muted mb-0">Ringkasan pengelolaan toko Aroma Avvolgente.</p>
    </div>

    {{-- Ringkasan data: angka dikirim dari Query Builder di DashboardController. --}}
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-birthday-cake fa-3x text-primary"></i>
                <div class="ms-3 text-end">
                    <p class="mb-2">Total Produk</p>
                    <h4 class="mb-0">{{ $totalProduk }}</h4>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-list fa-3x text-primary"></i>
                <div class="ms-3 text-end">
                    <p class="mb-2">Total Kategori</p>
                    <h4 class="mb-0">{{ $totalKategori }}</h4>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-users fa-3x text-primary"></i>
                <div class="ms-3 text-end">
                    <p class="mb-2">Total Pelanggan</p>
                    <h4 class="mb-0">{{ $totalPelanggan }}</h4>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                <i class="fa fa-user fa-3x text-primary"></i>
                <div class="ms-3 text-end">
                    <p class="mb-2">Total User</p>
                    <h4 class="mb-0">{{ $totalUser }}</h4>
                </div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        {{-- Data stok menipis berasal dari Query Builder. --}}
        <div class="col-12 col-xl-7">
            <div class="bg-secondary rounded p-4 h-100">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="mb-0">Peringatan Stok Menipis</h5>
                    <a href="{{ route('produk-kue.index') }}" class="btn btn-sm btn-primary">Lihat Produk</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Nama Kue</th>
                                <th>Kategori</th>
                                <th>Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($stokMenipis as $produk)
                                <tr>
                                    <td>{{ $produk->nama_kue }}</td>
                                    <td>{{ $produk->kategori }}</td>
                                    <td>
                                        <span class="badge {{ $produk->stok == 0 ? 'bg-danger' : 'bg-warning text-dark' }}">
                                            {{ $produk->stok }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Tidak ada produk dengan stok 5 atau kurang.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Pengelompokan produk berdasarkan kategori memakai Query Builder. --}}
        <div class="col-12 col-xl-5">
            <div class="bg-secondary rounded p-4 h-100">
                <h5 class="mb-3">Jumlah Produk per Kategori</h5>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Kategori</th>
                                <th class="text-end">Jumlah Produk</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($produkPerKategori as $item)
                                <tr>
                                    <td>{{ $item->kategori ?: 'Belum dikategorikan' }}</td>
                                    <td class="text-end">{{ $item->jumlah_produk }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="text-center">Belum ada data produk.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Produk terbaru diambil menggunakan Eloquent ORM. --}}
        <div class="col-12">
            <div class="bg-secondary rounded p-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="mb-0">Lima Produk Terbaru</h5>
                    <a href="{{ route('produk-kue.create') }}" class="btn btn-sm btn-primary">Tambah Produk</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Nama Kue</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Tanggal Ditambahkan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($produkTerbaru as $produk)
                                <tr>
                                    <td>{{ $produk->nama_kue }}</td>
                                    <td>{{ $produk->kategori }}</td>
                                    <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                                    <td>{{ $produk->stok }}</td>
                                    <td>{{ $produk->created_at?->format('d-m-Y H:i') ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada produk kue.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
