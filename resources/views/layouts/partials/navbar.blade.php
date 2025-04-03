<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    {{-- Sidebar toggle --}}
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars"></i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('home') }}" class="nav-link">Dashboard</a>
        </li>
    </ul>

    {{-- Right Navbar --}}
    <ul class="navbar-nav ml-auto">
        {{-- Logout --}}
        <li class="nav-item">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-link nav-link text-danger" onclick="return confirm('Keluar dari sistem?')">
                    <i class="fas fa-sign-out-alt"></i> Log Keluar
                </button>
            </form>
        </li>
    </ul>
</nav>
