<li class="nav-item">
    <a href="{{ route('home') }}" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Dashboard</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('users.index') }}" class="nav-link">
        <i class="nav-icon fas fa-user-shield"></i>
        <p>Pengguna</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('modalities.index') }}" class="nav-link">
        <i class="nav-icon fas fa-cubes"></i>
        <p>Modality</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('pesakit.index') }}" class="nav-link">
        <i class="nav-icon fas fa-user-injured"></i>
        <p>Pesakit</p>
    </a>
</li>

<li class="nav-item">
    <a href="{{ route('appointments.index') }}" class="nav-link">
        <i class="nav-icon fas fa-calendar-check"></i>
        <p>Janji Temu</p>
    </a>
</li>
