<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Sistem Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .navbar-custom {
            background: linear-gradient(90deg, #56ccf2, #2f80ed);
            padding-top: 8px;
            padding-bottom: 8px;
        }

        .navbar-brand-custom {
            gap: 10px;
        }

        .brand-logo {
            width: 52px;
            height: 52px;
            object-fit: contain;
            flex-shrink: 0;
        }

        .brand-text-wrap {
            margin-left: 4px;
            display: flex;
            align-items: center;
        }

        .brand-title {
            font-size: 1.2rem;
            font-weight: 700;
            color: #ffffff;
            letter-spacing: 0.2px;
            line-height: 1.1;
            margin: 0;
            text-shadow: 0 1px 2px rgba(0,0,0,0.12);
        }

        .navbar .nav-link {
            color: #ffffff !important;
            font-size: 0.95rem;
            font-weight: 500;
            padding-left: 10px !important;
            padding-right: 10px !important;
        }

        .navbar .nav-link:hover {
            color: #f8fbff !important;
        }

        .navbar .nav-link.active {
            font-weight: 600;
        }

        .navbar .dropdown-toggle::after {
            margin-left: 5px;
            vertical-align: middle;
        }

        .navbar .btn {
            font-weight: 600;
            font-size: 0.9rem;
        }

        .user-greeting {
            font-size: 0.95rem;
            font-weight: 600;
            color: #fff !important;
            white-space: nowrap;
        }

        .logout-btn {
            padding: 6px 14px !important;
        }

        @media (max-width: 992px) {
            .navbar-custom {
                padding-top: 8px;
                padding-bottom: 8px;
            }

            .brand-logo {
                width: 42px;
                height: 42px;
            }

            .brand-title {
                font-size: 1rem;
            }

            .brand-text-wrap {
                margin-left: 2px;
            }

            .navbar-nav {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body style="background-color: #f4f8fc;">

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container">

        <a class="navbar-brand d-flex align-items-center navbar-brand-custom" href="{{ route('dashboard') }}">
            <img src="{{ asset('images/logo2.png') }}"
                alt="Logo Kampus"
                class="brand-logo">

            <div class="brand-text-wrap">
                <span class="brand-title">Sistem Akademik ITBSS</span>
            </div>
        </a>

        <button class="navbar-toggler" type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarMenu"
                aria-controls="navbarMenu"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav ms-auto align-items-lg-center">

                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('dashboard') }}">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"
                       href="#"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">
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

                @auth
                    <li class="nav-item ms-lg-3">
                        <span class="nav-link user-greeting">
                            Halo, {{ Auth::user()->name }}
                        </span>
                    </li>

                    <li class="nav-item ms-lg-2">
                        <form action="{{ route('logout') }}" method="POST" class="m-0">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm rounded-3 logout-btn">
                                Logout
                            </button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li class="nav-item ms-lg-3">
                        <a href="{{ route('login') }}" class="btn btn-light btn-sm rounded-3 me-2">
                            Login
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('register') }}" class="btn btn-outline-light btn-sm rounded-3">
                            Register
                        </a>
                    </li>
                @endguest

            </ul>
        </div>
    </div>
</nav>

<div class="container py-5">
    <div class="card shadow border-0 rounded-4">
        <div class="card-body p-5">
            <h1 class="fw-bold mb-3">Dashboard Sistem Akademik</h1>

            @auth
                <p class="text-muted mb-4">
                    Selamat datang, <strong>{{ Auth::user()->name }}</strong>. Silakan pilih menu akademik dari navbar di atas.
                </p>
            @else
                <p class="text-muted mb-4">
                    Selamat datang di dashboard sistem akademik. Untuk mengakses menu dosen, mahasiswa, jurusan, mata kuliah, kelas, KRS, dan KRS detail, silakan login terlebih dahulu.
                </p>
            @endauth

            <div class="row g-4 mt-2">
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body">
                            <h5 class="fw-bold">Manajemen Data Akademik</h5>
                            <p class="text-muted mb-0">
                                Kelola data dosen, mahasiswa, jurusan, mata kuliah, kelas, KRS, dan KRS detail dalam satu dashboard.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body">
                            <h5 class="fw-bold">Akses Menu Cepat</h5>
                            <p class="text-muted mb-0">
                                Gunakan menu dropdown di navbar untuk langsung membuka halaman data yang dibutuhkan.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body">
                            <h5 class="fw-bold">Sistem Login</h5>
                            <p class="text-muted mb-0">
                                Halaman dashboard bisa diakses umum, tetapi menu data akademik hanya bisa dibuka setelah login.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 text-center">
                <img src="{{ asset('images/homepage.png') }}"
                    alt="Banner Dashboard"
                    class="img-fluid rounded-4 shadow-sm"
                    style="max-width: 100%; height: auto; object-fit: cover;">
            </div>

            @guest
                <div class="mt-4">
                    <a href="{{ route('login') }}" class="btn btn-primary rounded-3 me-2">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-outline-primary rounded-3">Register</a>
                </div>
            @endguest
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>