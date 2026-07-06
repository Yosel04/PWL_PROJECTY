<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Akademik</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root{
            --bg-light: linear-gradient(to bottom, #eef4ff, #dbeafe);
            --bg-dark: #0f172a;

            --nav-light-1: #4fc3f7;
            --nav-light-2: #2563eb;

            --nav-dark-1: #0f172a;
            --nav-dark-2: #1e3a8a;

            --card-light: #ffffff;
            --card-dark: #ffffff;

            --text-dark-strong: #111827;
            --text-dark-soft: #64748b;
            --table-head-dark: #24344d;
        }

        body{
            min-height: 100vh;
            background: var(--bg-light);
            transition: background-color .25s ease, background .25s ease, color .25s ease;
        }

        /* ================= NAVBAR ================= */
        .navbar-custom{
            background: linear-gradient(90deg, var(--nav-light-1), var(--nav-light-2));
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.18);
            padding-top: 14px;
            padding-bottom: 14px;
        }

        .navbar-brand-custom{
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .brand-logo-wrap{
            position: relative;
            width: 58px;
            height: 58px;
            flex-shrink: 0;
        }

        .brand-logo{
            width: 58px;
            height: 58px;
            object-fit: contain;
            position: absolute;
            inset: 0;
            transition: opacity .25s ease;
        }

        .brand-logo-dark{
            opacity: 0;
        }

        .brand-title{
            color: #fff;
            font-size: 1.05rem;
            font-weight: 700;
            letter-spacing: .2px;
            margin: 0;
            line-height: 1.2;
            white-space: nowrap;
        }

        .navbar .nav-link{
            color: #ffffff !important;
            font-size: 1rem;
            font-weight: 600;
            padding-left: 14px !important;
            padding-right: 14px !important;
        }

        .navbar .nav-link.active{
            font-weight: 700;
        }

        .navbar .dropdown-menu{
            border: none;
            border-radius: 14px;
            padding: 10px;
            box-shadow: 0 14px 30px rgba(15, 23, 42, 0.14);
        }

        .navbar .dropdown-item{
            border-radius: 10px;
            padding: 10px 14px;
            color: #1f2937;
        }

        .navbar .dropdown-item:hover{
            background: #eff6ff;
            color: #111827;
        }

        .logout-btn{
            border-radius: 14px;
            padding: 10px 18px;
            font-weight: 600;
        }

        .theme-toggle-btn{
            border-radius: 14px;
            padding: 9px 16px;
            font-weight: 600;
            border: 2px solid rgba(255,255,255,.7);
            background: rgba(255,255,255,.12);
            color: #fff;
            min-width: 108px;
            transition: .2s ease;
        }

        .theme-toggle-btn:hover{
            background: rgba(255,255,255,.2);
            color: #fff;
        }

        /* ================= LIGHT DEFAULT ================= */
        .bg-white,
        .card,
        .modal-content{
            background-color: #fff !important;
        }

        .table thead th{
            background: #eef4ff;
            color: #111827;
            border-color: #d9e2f0;
            font-weight: 700;
        }

        .table tbody td{
            color: #111827;
            border-color: #d9e2f0;
            vertical-align: middle;
        }

        /* ================= DARK MODE ================= */
        body.dark-mode{
            background: var(--bg-dark) !important;
            color: #e5e7eb;
        }

        body.dark-mode .navbar-custom{
            background: linear-gradient(90deg, var(--nav-dark-1), var(--nav-dark-2)) !important;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.35);
        }

        /* ganti logo saat dark mode */
        body.dark-mode .brand-logo-light{
            opacity: 0;
        }

        body.dark-mode .brand-logo-dark{
            opacity: 1;
        }

        /* Card / wrapper putih tetap dipertahankan biar isi CRUD gampang dibaca */
        body.dark-mode .bg-white,
        body.dark-mode .card,
        body.dark-mode .modal-content{
            background-color: var(--card-dark) !important;
            color: var(--text-dark-strong) !important;
        }

        /* Semua heading / text di area konten jadi gelap lagi supaya kebaca */
        body.dark-mode main h1,
        body.dark-mode main h2,
        body.dark-mode main h3,
        body.dark-mode main h4,
        body.dark-mode main h5,
        body.dark-mode main h6{
            color: var(--text-dark-strong) !important;
        }

        body.dark-mode main p,
        body.dark-mode main span,
        body.dark-mode main label,
        body.dark-mode main small,
        body.dark-mode main li,
        body.dark-mode main div{
            color: inherit;
        }

        body.dark-mode .text-muted{
            color: var(--text-dark-soft) !important;
        }

        /* table */
        body.dark-mode .table{
            color: var(--text-dark-strong) !important;
            background-color: #fff !important;
        }

        body.dark-mode .table thead th{
            background: var(--table-head-dark) !important;
            color: #fff !important;
            border-color: #d9e2f0 !important;
        }

        body.dark-mode .table tbody tr{
            background-color: #fff !important;
        }

        body.dark-mode .table tbody td{
            color: var(--text-dark-strong) !important;
            background-color: #fff !important;
            border-color: #d9e2f0 !important;
        }

        body.dark-mode .table tbody tr:hover td{
            background-color: #f8fafc !important;
        }

        /* form */
        body.dark-mode .form-control,
        body.dark-mode .form-select{
            background-color: #fff !important;
            color: var(--text-dark-strong) !important;
            border-color: #cbd5e1 !important;
        }

        body.dark-mode .form-control:focus,
        body.dark-mode .form-select:focus{
            background-color: #fff !important;
            color: var(--text-dark-strong) !important;
            border-color: #93c5fd !important;
            box-shadow: 0 0 0 .2rem rgba(59, 130, 246, .15) !important;
        }

        body.dark-mode .form-control::placeholder{
            color: #94a3b8 !important;
        }

        body.dark-mode .form-label{
            color: var(--text-dark-strong) !important;
        }

        /* dropdown */
        body.dark-mode .dropdown-menu{
            background-color: #fff !important;
            color: var(--text-dark-strong) !important;
        }

        body.dark-mode .dropdown-item{
            color: var(--text-dark-strong) !important;
        }

        body.dark-mode .dropdown-item:hover{
            background-color: #eff6ff !important;
            color: var(--text-dark-strong) !important;
        }

        /* alert */
        body.dark-mode .alert{
            color: var(--text-dark-strong) !important;
        }

        /* tombol-outline / button tertentu kalau dipakai di halaman lain */
        body.dark-mode .btn-outline-secondary{
            color: var(--text-dark-strong);
            border-color: #cbd5e1;
            background: #fff;
        }

        /* link pagination kalau nanti dipakai */
        body.dark-mode .page-link{
            color: var(--text-dark-strong);
            background-color: #fff;
            border-color: #dbe2ea;
        }

        body.dark-mode .page-item.active .page-link{
            background-color: #2563eb;
            border-color: #2563eb;
            color: #fff;
        }

        @media (max-width: 991.98px){
            .brand-logo-wrap{
                width: 48px;
                height: 48px;
            }

            .brand-logo{
                width: 48px;
                height: 48px;
            }

            .brand-title{
                font-size: .95rem;
                white-space: normal;
            }

            .theme-toggle-btn{
                margin-top: 10px;
                margin-bottom: 10px;
                width: 100%;
            }

            .logout-btn{
                width: 100%;
            }
        }
    </style>
</head>
<body id="appBody">

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container">
        <a class="navbar-brand navbar-brand-custom" href="{{ route('dashboard') }}">
            <div class="brand-logo-wrap">
                <img src="{{ asset('images/logo2.png') }}" alt="Logo Kampus" class="brand-logo brand-logo-light">
                <img src="{{ asset('images/logo2-putih.png') }}" alt="Logo Kampus" class="brand-logo brand-logo-dark">
            </div>
            <span class="brand-title">Sistem Akademik ITBSS</span>
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
                @endauth

                <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                    <button id="themeToggle" class="btn theme-toggle-btn" type="button">
                        🌙 Dark
                    </button>
                </li>

                @auth
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0">
                        <form action="{{ route('logout') }}" method="POST" class="m-0">
                            @csrf
                            <button class="btn btn-danger logout-btn" type="submit">Logout</button>
                        </form>
                    </li>
                @else
                    <li class="nav-item ms-lg-3 mt-2 mt-lg-0">
                        <a href="{{ route('login') }}" class="btn btn-light rounded-3">Login</a>
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

<script>
    const body = document.getElementById('appBody');
    const themeToggle = document.getElementById('themeToggle');

    function applyTheme(theme) {
        if (theme === 'dark') {
            body.classList.add('dark-mode');
            if (themeToggle) themeToggle.innerHTML = '☀️ Light';
        } else {
            body.classList.remove('dark-mode');
            if (themeToggle) themeToggle.innerHTML = '🌙 Dark';
        }
    }

    const savedTheme = localStorage.getItem('theme') || 'light';
    applyTheme(savedTheme);

    if (themeToggle) {
        themeToggle.addEventListener('click', function () {
            const isDark = body.classList.contains('dark-mode');
            const nextTheme = isDark ? 'light' : 'dark';
            localStorage.setItem('theme', nextTheme);
            applyTheme(nextTheme);
        });
    }
</script>
</body>
</html>