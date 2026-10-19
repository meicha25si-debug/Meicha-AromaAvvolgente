@extends('layouts.admin.app')

@section('title', 'Edit Produk Kue - Aroma Avvolgente')

@section('content')

{{-- Flash message success --}}
@if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{-- Flash message error --}}
@if (session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

{{-- Pesan validasi --}}
@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="container-fluid pt-4 px-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="bg-light rounded p-4">
                    <h4 class="mb-2">Edit Produk Kue</h4>
                    <p>Perbarui informasi produk kue.</p>

                    <form action="{{ route('produk-kue.update', $produkKue) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nama_kue" class="form-label">Nama Kue</label>
                            <input
                                type="text"
                                name="nama_kue"
                                id="nama_kue"
                                class="form-control @error('nama_kue') is-invalid @enderror"
                                value="{{ old('nama_kue', $produkKue->nama_kue) }}"
                                required
                            >
                            @error('nama_kue')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="kategori" class="form-label">Kategori Kue</label>
                            <input
                                type="text"
                                name="kategori"
                                id="kategori"
                                class="form-control @error('kategori') is-invalid @enderror"
                                value="{{ old('kategori', $produkKue->kategori) }}"
                                required
                            >
                            @error('kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga (Rp)</label>
                            <input
                                type="number"
                                name="harga"
                                id="harga"
                                class="form-control @error('harga') is-invalid @enderror"
                                value="{{ old('harga', $produkKue->harga) }}"
                                min="0"
                                step="0.01"
                                required
                            >
                            @error('harga')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="stok" class="form-label">Stok</label>
                            <input
                                type="number"
                                name="stok"
                                id="stok"
                                class="form-control @error('stok') is-invalid @enderror"
                                value="{{ old('stok', $produkKue->stok) }}"
                                min="0"
                                step="1"
                                required
                            >
                            @error('stok')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save me-2"></i>Simpan Perubahan
                        </button>

                        <a href="{{ route('produk-kue.index') }}"
                           class="btn btn-secondary">
                            Batal
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
