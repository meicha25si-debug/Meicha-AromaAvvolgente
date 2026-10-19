@extends('layouts.admin.app')

@section('title', 'Data Pelanggan | Aroma Avvolgente')

@section('content')
<div class="container-fluid pt-2 px-0">
    <div class="d-flex align-items-center justify-content-between mb-4">
        <div>
            <h3 class="mb-1">Data Pelanggan</h3>
            <p class="text-muted mb-0">
                Aroma Avvolgente - Manajemen Pelanggan
            </p>
        </div>

        <a href="{{ route('pelanggan.create') }}"
           class="btn btn-primary">
            <i class="fa fa-plus me-2"></i>Tambah Pelanggan
        </a>
    </div>

    <div class="bg-secondary rounded p-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Depan</th>
                        <th>Nama Belakang</th>
                        <th>Tanggal Lahir</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($pelanggans as $pelanggan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pelanggan->first_name }}</td>
                            <td>{{ $pelanggan->last_name ?: '-' }}</td>
                            <td>{{ $pelanggan->birthday ?: '-' }}</td>
                            <td>{{ $pelanggan->gender ?: '-' }}</td>
                            <td>{{ $pelanggan->email }}</td>
                            <td>{{ $pelanggan->phone ?: '-' }}</td>
                            <td class="text-nowrap">
                                <a href="{{ route('pelanggan.edit', $pelanggan) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('pelanggan.destroy', $pelanggan) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin ingin menghapus pelanggan ini?')">
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
                            <td colspan="8" class="text-center">
                                Belum ada data pelanggan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

