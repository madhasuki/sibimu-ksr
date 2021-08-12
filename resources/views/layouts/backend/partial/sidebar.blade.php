<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SIBIMU</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    @if ($user->hasRole('admin') or $user->hasRole('pengurus'))
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Kelola Data
        </div>

        <!-- Nav Item - Anggota -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="fas fa-fw fa-table "></i>
                <span>Anggota</span></a>
        </li>

        <!-- Nav Item - Pengguna -->
        @if (Auth::user()->hasRole('admin'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.pengguna') }}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Pengurus</span></a>
            </li>

            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Pengaturan
            </div>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('anggota.change.password') }}">
                    <i class="fas fa-key fa-sm fa-fw"></i>
                    <span>Ganti Password</span></a>
            </li>
        @endif
        
    @else
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Anggota -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('convert.pdf') }}">
                <i class="fas fa-print fa-sm fa-fw"></i>
                <span>Cetak Data</span></a>
        </li>

        <!-- Nav Item - Anggota -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('anggota.change.password') }}">
                <i class="fas fa-key fa-sm fa-fw"></i>
                <span>Ganti Password</span></a>
        </li>
    @endif


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>