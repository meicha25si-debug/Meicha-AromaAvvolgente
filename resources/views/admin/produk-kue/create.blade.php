
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tambah Produk Kue - Aroma Avvolgente</title>
    <link href="{{ asset('admin-template/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h2>Tambah Produk Kue</h2>
    <p>Masukkan informasi produk kue baru.</p>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Periksa kembali data yang dimasukkan:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

   <form action="{{ route('produk-kue.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama_kue" class="form-label">Nama Kue</label>
            <input type="text" name="nama_kue" id="nama_kue"
                class="form-control @error('nama_kue') is-invalid @enderror"
                value="{{ old('nama_kue') }}" required>
            @error('nama_kue')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori Kue</label>
            <input type="text" name="kategori" id="kategori"
                class="form-control @error('kategori') is-invalid @enderror"
                value="{{ old('kategori') }}" placeholder="Contoh: Brownies"
                required>
            @error('kategori')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="harga" class="form-label">Harga (Rp)</label>
            <input type="number" name="harga" id="harga"
                class="form-control @error('harga') is-invalid @enderror"
                value="{{ old('harga') }}" min="0" step="0.01" required>
            @error('harga')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" name="stok" id="stok"
                class="form-control @error('stok') is-invalid @enderror"
                value="{{ old('stok', 0) }}" min="0" step="1" required>
            @error('stok')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            Simpan Produk
        </button>

        <a href="{{ route('produk-kue.index') }}"
            class="btn btn-secondary">Kembali</a>
    </form>
</div>

<script src="{{ asset('admin-template/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>
