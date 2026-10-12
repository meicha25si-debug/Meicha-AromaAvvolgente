<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan - Aroma Avvolgente</title>
    <link href="{{ asset('admin-template/css/bootstrap.min.css') }}" rel="stylesheet">
    ```html
<style>
    body {
        background-color: #f4f6f9 !important;
        color: #212529 !important;
    }

    h2, p, label, td, th {
        color: #212529;
    }

    .text-muted {
        color: #6c757d !important;
    }

    .table {
        background-color: #ffffff;
        color: #212529;
    }

    .table thead th {
        background-color: #343a40;
        color: #ffffff !important;
    }

    .table tbody td {
        background-color: #ffffff;
        color: #212529 !important;
    }

    .btn-warning {
        color: #212529 !important;
    }

    .btn-danger,
    .btn-primary,
    .btn-secondary {
        color: #ffffff !important;
    }
</style>
```
</head>
<body class="bg-light">
    <div class="container py-5">
        <h2>Data Pelanggan</h2>
        <p class="text-muted">Aroma Avvolgente - Manajemen Pelanggan</p>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Terjadi kesalahan:</strong>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <a href="{{ route('pelanggan.create') }}"
           class="btn btn-danger mb-3">
            + Tambah Pelanggan
        </a>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($pelanggans as $pelanggan)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pelanggan->nama }}</td>
                            <td>{{ $pelanggan->email }}</td>
                            <td>{{ $pelanggan->telepon ?: '-' }}</td>
                            <td>{{ $pelanggan->alamat ?: '-' }}</td>
                            <td>
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
                            <td colspan="6" class="text-center">
                                Belum ada data pelanggan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <a href="{{ route('admin.dashboard') }}"
           class="btn btn-secondary">
            Kembali ke Dashboard
        </a>
    </div>
</body>
</html>