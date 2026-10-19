
<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="{{ route('admin.dashboard') }}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary">
                <img src="{{ asset('admin-template/img/logo.svg') }}"
                     alt="Logo Aroma Avvolgente"
                     style="width: 35px; height: 35px;">
                Aroma Avvolgente
            </h3>
        </a>

        <div class="navbar-nav w-100">
            <a href="{{ route('admin.dashboard') }}" class="nav-item nav-link">
                <i class="fa fa-tachometer-alt me-2"></i>Dashboard
            </a>

            <a href="{{ url('/pelanggan') }}" class="nav-item nav-link">
                <i class="fa fa-users me-2"></i>Pelanggan
            </a>

            <a href="{{ url('/produk-kue') }}" class="nav-item nav-link">
                <i class="fa fa-birthday-cake me-2"></i>Produk Kue
            </a>

            <a href="{{ url('/kategori-kue') }}" class="nav-item nav-link">
                <i class="fa fa-list me-2"></i>Kategori Kue
            </a>

            <a href="{{ url('/user') }}" class="nav-item nav-link">
                <i class="fa fa-user me-2"></i>User
            </a>
        </div>
    </nav>
</div>
