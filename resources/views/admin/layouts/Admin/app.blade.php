<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin | Aroma Avvolgente')</title>

    @include('admin.layouts.admin.css')
</head>
<body>
    <div class="container-fluid position-relative d-flex p-0">
        @include('admin.layouts.admin.sidebar')

        <div class="content">
            @include('admin.layouts.admin.navbar')

            <div class="container-fluid pt-4 px-4">
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

                @yield('content')
            </div>

            @include('admin.layouts.admin.footer')
        </div>
    </div>

    @include('admin.layouts.admin.js')
</body>
</html>
