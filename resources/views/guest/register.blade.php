<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | Aroma Avvolgente</title>

    <link rel="stylesheet" href="{{ asset('guest/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/responsive.css') }}">

    <style>
        body {
            background: #f8f5f2;
            font-family: Poppins, sans-serif;
        }

        .register-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
        }

        .register-card {
            width: 100%;
            max-width: 480px;
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.1);
        }

        .register-logo {
            text-align: center;
            margin-bottom: 25px;
        }

        .register-logo img {
            width: 65px;
            margin-bottom: 10px;
        }

        .register-logo h3 {
            color: #46200b;
            font-weight: bold;
        }

        .register-card h4 {
            text-align: center;
            margin-bottom: 25px;
            color: #46200b;
        }

        .form-control {
            height: 48px;
            border-radius: 8px;
        }

        .btn-register {
            width: 100%;
            background: #46200b;
            color: white;
            border-radius: 8px;
            padding: 12px;
            margin-top: 10px;
        }

        .btn-register:hover {
            background: #6b351b;
            color: white;
        }

        .register-links {
            text-align: center;
            margin-top: 20px;
        }

        .register-links a,
        .back-home a {
            color: #8b4513;
        }

        .back-home {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>

<div class="register-container">
    <div class="register-card">

        <div class="register-logo">
            <img src="{{ asset('guest/images/logo.svg') }}" alt="Logo">
            <h3>Aroma Avvolgente</h3>
            <p>Buat akun pelanggan baru</p>
        </div>

        <h4>Registrasi</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.process') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="name" class="form-control"
                    placeholder="Masukkan nama lengkap"
                    value="{{ old('name') }}" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control"
                    placeholder="Masukkan email"
                    value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control"
                    placeholder="Minimal 8 karakter" required>
            </div>

            <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation"
                    class="form-control" placeholder="Ulangi password" required>
            </div>

            <button type="submit" class="btn btn-register">
                Daftar
            </button>
        </form>

        <div class="register-links">
            <p>Sudah punya akun?
                <a href="{{ route('login') }}">Login di sini</a>
            </p>
        </div>

        <div class="back-home">
            <a href="{{ route('guest.home') }}">
                <i class="fa fa-arrow-left"></i> Kembali ke Home
            </a>
        </div>

    </div>
</div>

</body>
</html>
