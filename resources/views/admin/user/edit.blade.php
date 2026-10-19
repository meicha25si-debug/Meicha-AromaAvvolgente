
@extends('admin.layouts.app')

@section('title', 'Edit User | Aroma Avvolgente')

@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded p-4">
        <h4 class="mb-4">Edit User</h4>

        <form action="{{ route('user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nama</label>
                <input type="text" name="name" id="name"
                       class="form-control"
                       value="{{ old('name', $user->name) }}"
                       maxlength="100" required>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email"
                       class="form-control"
                       value="{{ old('email', $user->email) }}" required>
                @error('email')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">
                    Password Baru (opsional)
                </label>
                <input type="password" name="password" id="password"
                       class="form-control" minlength="8">
                <small class="text-muted">
                    Kosongkan jika tidak ingin mengubah password.
                </small>
                @error('password')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">
                    Konfirmasi Password Baru
                </label>
                <input type="password" name="password_confirmation"
                       id="password_confirmation" class="form-control"
                       minlength="8">
            </div>

            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('user.index') }}" class="btn btn-secondary">
                Kembali
            </a>
        </form>
    </div>
</div>
@endsection
