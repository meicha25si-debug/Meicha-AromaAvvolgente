<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelanggan - Aroma Avvolgente</title>
    <link href="{{ asset('admin-template/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container py-5">
        <div class="card shadow-sm">
            <div class="card-header bg-warning">
                <h4 class="mb-0">Edit Pelanggan</h4>
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

                <form action="{{ route('pelanggan.update', $pelanggan) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="first_name" class="form-label">Nama Depan</label>
                        <input type="text" name="first_name" id="first_name"
                            class="form-control @error('first_name') is-invalid @enderror"
                            value="{{ old('first_name', $pelanggan->first_name) }}"
                            maxlength="100" required>
                        @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="last_name" class="form-label">Nama Belakang</label>
                        <input type="text" name="last_name" id="last_name"
                            class="form-control @error('last_name') is-invalid @enderror"
                            value="{{ old('last_name', $pelanggan->last_name) }}"
                            maxlength="100" required>
                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="birthday" class="form-label">Tanggal Lahir</label>
                        <input type="date" name="birthday" id="birthday"
                            class="form-control @error('birthday') is-invalid @enderror"
                            value="{{ old('birthday', $pelanggan->birthday) }}">
                        @error('birthday')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select name="gender" id="gender"
                            class="form-select @error('gender') is-invalid @enderror">
                            <option value="">-- Pilih Gender --</option>
                            <option value="Male" {{ old('gender', $pelanggan->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ old('gender', $pelanggan->gender) == 'Female' ? 'selected' : '' }}>Female</option>
                            <option value="Other" {{ old('gender', $pelanggan->gender) == 'Other' ? 'selected' : '' }}>Other</option>
                        </select>
                        @error('gender')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email', $pelanggan->email) }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Nomor Telepon</label>
                        <input type="text" name="phone" id="phone"
                            class="form-control @error('phone') is-invalid @enderror"
                            value="{{ old('phone', $pelanggan->phone) }}" maxlength="20">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-warning">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('pelanggan.index') }}" class="btn btn-secondary">
                        Batal
                    </a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
