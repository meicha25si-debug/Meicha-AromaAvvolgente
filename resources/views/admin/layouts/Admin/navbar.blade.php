
<nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
    <a href="{{ route('admin.dashboard') }}" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0">
            <i class="fa fa-birthday-cake"></i>
        </h2>
    </a>

    <a href="{{ route('admin.dashboard') }}" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>

    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <i class="fa fa-user me-lg-2"></i>
                <span class="d-none d-lg-inline-flex">Administrator</span>
            </a>

            <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                <a href="{{ route('admin.dashboard') }}" class="dropdown-item">Dashboard</a>
                <a href="{{ route('guest.home') }}" class="dropdown-item">Lihat Halaman Guest</a>
            </div>
        </div>
    </div>
</nav>
