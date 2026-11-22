<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | Aroma Avvolgente</title>

    <link rel="stylesheet" href="{{ asset('guest/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('guest/css/responsive.css') }}">

    <style>
        body {
            background: #f8f5f2;
            font-family: Poppins, sans-serif;
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 30px;
        }

        .login-card {
            width: 100%;
            max-width: 450px;
            background: white;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.1);
        }

        .login-logo {
            text-align: center;
            margin-bottom: 25px;
        }

        .login-logo img {
            width: 65px;
            margin-bottom: 10px;
        }

        .login-logo h3 {
            color: #46200b;
            font-weight: bold;
        }

        .login-card h4 {
            text-align: center;
            margin-bottom: 25px;
            color: #46200b;
        }

        .form-control {
            height: 48px;
            border-radius: 8px;
        }

        .btn-login {
            width: 100%;
            background: #46200b;
            color: white;
            border-radius: 8px;
            padding: 12px;
            margin-top: 10px;
        }

        .btn-login:hover {
            background: #6b351b;
            color: white;
        }

        .login-links {
            text-align: center;
            margin-top: 20px;
        }

        .login-links a,
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

<div class="login-container">
    <div class="login-card">

        <div class="login-logo">
            <img src="{{ asset('guest/images/logo.svg') }}" alt="Logo">
            <h3>Aroma Avvolgente</h3>
            <p>Selamat datang kembali!</p>
        </div>

        <h4>Login Akun</h4>

        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control"
                    placeholder="Masukkan email" value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control"
                    placeholder="Masukkan password" required>
            </div>

            <button type="submit" class="btn btn-login">
                Login
            </button>
        </form>

        <div class="login-links">
            <p>Belum punya akun?
                <a href="{{ route('register') }}">Daftar sekarang</a>
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
