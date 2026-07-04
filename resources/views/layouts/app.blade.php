<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Akademik</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: linear-gradient(to bottom, #eef4ff, #dbeafe); min-height:100vh;">

<nav class="navbar navbar-expand-lg navbar-dark" style="background: linear-gradient(90deg, #4fc3f7, #2563eb);">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
            Sistem Akademik
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto align-items-lg-center">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                        Home
                    </a>
                </li>

                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        Menu
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{ route('dosen.index') }}">Dosen</a></li>
                        <li><a class="dropdown-item" href="{{ route('mahasiswa.index') }}">Mahasiswa</a></li>
                        <li><a class="dropdown-item" href="{{ route('jurusan.index') }}">Jurusan</a></li>
                        <li><a class="dropdown-item" href="{{ route('matakuliah.index') }}">Mata Kuliah</a></li>
                        <li><a class="dropdown-item" href="{{ route('kelas.index') }}">Kelas</a></li>
                        <li><a class="dropdown-item" href="{{ route('krs.index') }}">KRS</a></li>
                        <li><a class="dropdown-item" href="{{ route('krsdetail.index') }}">KRS Detail</a></li>
                    </ul>
                </li>

                <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-danger">Logout</button>
                    </form>
                </li>
                @else
                <li class="nav-item ms-lg-3">
                    <a href="{{ route('login') }}" class="btn btn-light">Login</a>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<main class="py-4">
    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>