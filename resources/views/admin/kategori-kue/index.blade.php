
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Kategori Kue - Aroma Avvolgente</title>
    <link href="{{ asset('admin-template/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h2>Data Kategori Kue</h2>
    <p>Aroma Avvolgente - Manajemen Kategori</p>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <a href="{{ route('kategori-kue.create') }}"
       class="btn btn-primary mb-3">
        + Tambah Kategori
    </a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
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
                               class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('kategori-kue.destroy', $kategori) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus kategori ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn btn-danger btn-sm">Hapus</button>
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

    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
        Kembali ke Dashboard
    </a>
</div>
</body>
</html>
