@extends('admin.layouts.app')

@section('title', 'Tambah Kategori Kue - Aroma Avvolgente')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="bg-light rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h4 class="mb-0">Tambah Kategori Kue</h4>
                    </div>

                    <form action="{{ route('kategori-kue.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="nama_kategori" class="form-label">
                                Nama Kategori
                            </label>
                            <input
                                type="text"
                                name="nama_kategori"
                                id="nama_kategori"
                                class="form-control @error('nama_kategori') is-invalid @enderror"
                                value="{{ old('nama_kategori') }}"
                                required
                            >
                            @error('nama_kategori')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">
                                Deskripsi
                            </label>
                            <textarea
                                name="deskripsi"
                                id="deskripsi"
                                class="form-control @error('deskripsi') is-invalid @enderror"
                                rows="4"
                            >{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-save me-2"></i>Simpan Kategori
                        </button>

                        <a href="{{ route('kategori-kue.index') }}"
                           class="btn btn-secondary">
                            Batal
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
