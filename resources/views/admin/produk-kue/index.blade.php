
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Produk Kue - Aroma Avvolgente</title>
    <link href="{{ asset('admin-template/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h2>Data Produk Kue</h2>
    <p>Aroma Avvolgente - Manajemen Produk</p>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close"
                data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <a href="{{ route('produk-kue.create') }}"
       class="btn btn-primary mb-3">
        + Tambah Produk Kue
    </a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
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
                @forelse ($produkKues as $produk)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $produk->nama_kue }}</td>
                        <td>{{ $produk->kategori }}</td>
                        <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                        <td>{{ $produk->stok }}</td>
                        <td>
                            <a href="{{ route('produk-kue.edit', $produk) }}"
                               class="btn btn-warning btn-sm">Edit</a>

                            <form action="{{ route('produk-kue.destroy', $produk) }}"
                                  method="POST" class="d-inline"
                                  onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="btn btn-danger btn-sm">Hapus</button>
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

    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
        Kembali ke Dashboard
    </a>
</div>

<script src="{{ asset('admin-template/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
