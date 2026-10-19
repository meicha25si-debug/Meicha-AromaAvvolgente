
@extends('admin.layouts.app')

@section('title', 'Tambah Pelanggan | Aroma Avvolgente')

@section('content')
<div class="container-fluid pt-2 px-0">
    <div class="mb-4">
        <h3>Tambah Pelanggan</h3>
        <p class="text-muted">Masukkan informasi pelanggan baru.</p>
    </div>

    <div class="bg-secondary rounded p-4">
        <form action="{{ route('pelanggan.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="first_name" class="form-label">Nama Depan</label>
                <input type="text" name="first_name" id="first_name"
                    class="form-control @error('first_name') is-invalid @enderror"
                    value="{{ old('first_name') }}" maxlength="100" required>
                @error('first_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="last_name" class="form-label">Nama Belakang</label>
                <input type="text" name="last_name" id="last_name"
                    class="form-control @error('last_name') is-invalid @enderror"
                    value="{{ old('last_name') }}" maxlength="100" required>
                @error('last_name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="birthday" class="form-label">Tanggal Lahir</label>
                <input type="date" name="birthday" id="birthday"
                    class="form-control @error('birthday') is-invalid @enderror"
                    value="{{ old('birthday') }}">
                @error('birthday')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" id="gender"
                    class="form-select @error('gender') is-invalid @enderror">
                    <option value="">-- Pilih Gender --</option>
                    <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                    <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                    <option value="Other" {{ old('gender') == 'Other' ? 'selected' : '' }}>Other</option>
                </select>
                @error('gender')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email"
                    class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Nomor Telepon</label>
                <input type="text" name="phone" id="phone"
                    class="form-control @error('phone') is-invalid @enderror"
                    value="{{ old('phone') }}" maxlength="20">
                @error('phone')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">
                <i class="fa fa-save me-2"></i>Simpan Pelanggan
            </button>

            <a href="{{ route('pelanggan.index') }}" class="btn btn-outline-light">
                Batal
            </a>
        </form>
    </div>
</div>
@endsection
