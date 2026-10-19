
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Admin | Aroma Avvolgente')</title>

    <link href="{{ asset('admin-template/img/logo.svg') }}" rel="icon" type="image/svg+xml">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('admin-template/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-template/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-template/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin-template/css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container-fluid position-relative d-flex p-0">
        @include('admin.partials.sidebar')

        <div class="content">
            @include('admin.partials.navbar')

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

            @include('admin.partials.footer')
        </div>
    </div>

    <script src="{{ asset('admin-template/lib/chart/chart.min.js') }}"></script>
    <script src="{{ asset('admin-template/lib/easing/easing.min.js') }}"></script>
    <script src="{{ asset('admin-template/lib/waypoints/waypoints.min.js') }}"></script>
    <script src="{{ asset('admin-template/lib/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('admin-template/lib/tempusdominus/js/moment.min.js') }}"></script>
    <script src="{{ asset('admin-template/lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
    <script src="{{ asset('admin-template/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('admin-template/js/main.js') }}"></script>
</body>
</html>
