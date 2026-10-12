```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori Kue - Aroma Avvolgente</title>
    <link href="{{ asset('admin-template/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Tambah Kategori Kue</h4>
            </div>

            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Periksa kembali input Anda:</strong>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

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
                        Simpan Kategori
                    </button>
                    <a href="{{ route('kategori-kue.index') }}"
                       class="btn btn-secondary">
                        Batal
                    </a>
                </form>

            </div>
        </div>
    </div>
</body>
</html>
```