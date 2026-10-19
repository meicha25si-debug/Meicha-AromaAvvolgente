
@extends('admin.layouts.app')

@section('title', 'Data Kategori Kue - Aroma Avvolgente')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h2>Data Kategori Kue</h2>
                <p>Aroma Avvolgente - Manajemen Kategori</p>
            </div>

            <a href="{{ route('kategori-kue.create') }}"
               class="btn btn-primary">
                <i class="fa fa-plus me-2"></i>Tambah Kategori
            </a>
        </div>

        <div class="bg-light rounded p-4">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No.</th>
                            <th>Nama Kategori</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($kategoriKues as $kategori)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $kategori->nama_kategori }}</td>
                                <td>{{ $kategori->deskripsi ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('kategori-kue.edit', $kategori) }}"
                                       class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('kategori-kue.destroy', $kategori) }}"
                                          method="POST"
                                          class="d-inline"
                                          onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"
                                                class="btn btn-danger btn-sm">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">
                                    Belum ada kategori kue.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <a href="{{ route('admin.dashboard') }}"
           class="btn btn-secondary mt-3">
            Kembali ke Dashboard
        </a>
    </div>
@endsection
