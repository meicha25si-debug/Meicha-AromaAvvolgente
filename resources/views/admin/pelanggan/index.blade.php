
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pelanggan - Aroma Avvolgente</title>
    <link href="{{ asset('admin-template/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        body {
            background-color: #f4f6f9;
            color: #212529;
        }

        .table {
            background-color: #fff;
        }

        .table thead th {
            background-color: #343a40;
            color: #fff;
        }
    </style>
</head>
<body>
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

        <a href="{{ route('pelanggan.create') }}" class="btn btn-danger mb-3">
            + Tambah Pelanggan
        </a>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
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
                                    <button type="submit" class="btn btn-danger btn-sm">
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

        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
            Kembali ke Dashboard
        </a>
    </div>
</body>
</html>
