<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Sistem Akademik ITBSS' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root{
            --bg-light: linear-gradient(180deg, #eef5ff 0%, #eaf2ff 45%, #f8fbff 100%);
            --bg-dark: #0f172a;

            --nav-light-1: #4fc3f7;
            --nav-light-2: #2563eb;
            --nav-dark-1: #0f172a;
            --nav-dark-2: #1e3a8a;

            --card-light: #ffffff;
            --card-dark: #ffffff;

            --text-dark-strong: #111827;
            --text-dark-soft: #64748b;

            --border-soft: #dbe5f0;
            --table-head-light: #eef4ff;
            --table-head-dark: #24344d;

            --page-max: 1220px;
            --radius-xl: 22px;
            --radius-lg: 16px;
            --radius-md: 12px;
        }

        html, body{
            min-height: 100%;
        }

        body{
            min-height: 100vh;
            background: var(--bg-light);
            color: #111827;
            transition: background-color .25s ease, background .25s ease, color .25s ease;
            display: flex;
            flex-direction: column;
        }

        /* ================= BASE ================= */
        .page-shell{
            flex: 1;
        }

        .page-container{
            max-width: var(--page-max);
        }

        .content-card{
            background: #fff;
            border: 1px solid rgba(219, 229, 240, .9);
            border-radius: var(--radius-xl);
            box-shadow: 0 14px 40px rgba(37, 99, 235, 0.08);
        }

        .section-card{
            background: #fff;
            border: 1px solid #e7eef7;
            border-radius: 18px;
            box-shadow: 0 8px 24px rgba(15, 23, 42, 0.06);
        }

        .page-title{
            font-size: clamp(1.55rem, 2vw, 2rem);
            font-weight: 800;
            color: #0f172a;
            margin-bottom: .2rem;
            letter-spacing: -.02em;
        }

        .page-subtitle{
            color: #64748b;
            margin-bottom: 0;
            font-size: .98rem;
        }

        .soft-divider{
            border: 0;
            border-top: 1px solid #edf2f7;
            opacity: 1;
            margin: 1.25rem 0;
        }

        .info-label{
            font-size: .82rem;
            color: #64748b;
            margin-bottom: .3rem;
            font-weight: 600;
        }

        .info-value{
            font-size: .98rem;
            color: #111827;
            font-weight: 600;
        }

        .table-wrap{
            border: 1px solid #e6edf6;
            border-radius: 16px;
            overflow: hidden;
        }

        .table{
            margin-bottom: 0;
        }

        .table thead th{
            background: var(--table-head-light);
            color: #111827;
            border-color: #d9e2f0;
            font-weight: 700;
            font-size: .95rem;
            padding: 14px 16px;
            white-space: nowrap;
        }

        .table tbody td{
            color: #111827;
            border-color: #e7eef7;
            vertical-align: middle;
            padding: 14px 16px;
        }

        .table tbody tr:hover td{
            background: #f8fbff;
        }

        .empty-state{
            text-align: center;
            color: #64748b;
            padding: 32px 16px !important;
        }

        .badge-status{
            display: inline-flex;
            align-items: center;
            gap: 6px;
            border-radius: 999px;
            padding: 8px 12px;
            font-weight: 700;
            font-size: .8rem;
        }

        .status-pending{
            background: #fff7db;
            color: #9a6700;
        }

        .status-approved{
            background: #e8f8ee;
            color: #157347;
        }

        .status-declined{
            background: #fdecec;
            color: #b42318;
        }

        .status-default{
            background: #eef2f7;
            color: #475467;
        }

        .btn-soft{
            background: #eff6ff;
            color: #1d4ed8;
            border: 1px solid #dbeafe;
            font-weight: 700;
        }

        .btn-soft:hover{
            background: #dbeafe;
            color: #1e40af;
            border-color: #bfdbfe;
        }

        .btn{
            border-radius: 12px;
            font-weight: 600;
        }

        .btn-sm{
            border-radius: 10px;
        }

        /* ================= NAVBAR ================= */
        .navbar-custom{
            background: linear-gradient(90deg, var(--nav-light-1), var(--nav-light-2));
            box-shadow: 0 8px 24px rgba(37, 99, 235, 0.18);
            padding-top: 12px;
            padding-bottom: 12px;
        }

        .navbar-brand-custom{
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .brand-logo-wrap{
            position: relative;
            width: 56px;
            height: 56px;
            flex-shrink: 0;
        }

        .brand-logo{
            width: 56px;
            height: 56px;
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
            font-weight: 800;
            letter-spacing: .2px;
            margin: 0;
            line-height: 1.2;
            white-space: nowrap;
        }

        .brand-subtitle{
            display: block;
            color: rgba(255,255,255,.88);
            font-size: .78rem;
            font-weight: 500;
            margin-top: 2px;
        }

        .navbar .nav-link{
            color: #ffffff !important;
            font-size: .98rem;
            font-weight: 600;
            padding-left: 14px !important;
            padding-right: 14px !important;
        }

        .navbar .nav-link.active{
            font-weight: 800;
        }

        .navbar .dropdown-menu{
            border: none;
            border-radius: 16px;
            padding: 10px;
            box-shadow: 0 16px 32px rgba(15, 23, 42, 0.16);
        }

        .navbar .dropdown-item{
            border-radius: 12px;
            padding: 10px 14px;
            color: #1f2937;
            font-weight: 500;
        }

        .navbar .dropdown-item:hover{
            background: #eff6ff;
            color: #111827;
        }

        .navbar .dropdown-header{
            color: #64748b;
            font-size: .75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .06em;
            padding: 8px 14px;
        }

        .user-chip{
            display: inline-flex;
            align-items: center;
            gap: 10px;
            color: #fff;
            background: rgba(255,255,255,.14);
            border: 1px solid rgba(255,255,255,.18);
            padding: 9px 14px;
            border-radius: 999px;
            font-weight: 600;
            font-size: .94rem;
        }

        .user-chip i{
            font-size: 1rem;
        }

        .logout-btn{
            border-radius: 14px;
            padding: 10px 18px;
            font-weight: 700;
        }

        .theme-toggle-btn{
            border-radius: 14px;
            padding: 9px 16px;
            font-weight: 700;
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

        /* ================= FOOTER ================= */
        .site-footer{
            margin-top: auto;
            border-top: 1px solid rgba(219, 229, 240, .9);
            background: rgba(255,255,255,.65);
            backdrop-filter: blur(8px);
        }

        .footer-inner{
            min-height: 68px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            flex-wrap: wrap;
            color: #64748b;
            font-size: .95rem;
        }

        .footer-brand{
            font-weight: 700;
            color: #334155;
        }

        /* ================= LIGHT DEFAULT ================= */
        .bg-white,
        .card,
        .modal-content{
            background-color: #fff !important;
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

        body.dark-mode .brand-logo-light{
            opacity: 0;
        }

        body.dark-mode .brand-logo-dark{
            opacity: 1;
        }

        body.dark-mode .content-card,
        body.dark-mode .section-card,
        body.dark-mode .bg-white,
        body.dark-mode .card,
        body.dark-mode .modal-content{
            background-color: var(--card-dark) !important;
            color: var(--text-dark-strong) !important;
        }

        body.dark-mode main h1,
        body.dark-mode main h2,
        body.dark-mode main h3,
        body.dark-mode main h4,
        body.dark-mode main h5,
        body.dark-mode main h6,
        body.dark-mode .page-title{
            color: var(--text-dark-strong) !important;
        }

        body.dark-mode .page-subtitle,
        body.dark-mode .info-label,
        body.dark-mode .text-muted{
            color: var(--text-dark-soft) !important;
        }

        body.dark-mode .info-value{
            color: var(--text-dark-strong) !important;
        }

        body.dark-mode .table-wrap{
            border-color: #d9e2f0;
        }

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
            border-color: #e7eef7 !important;
        }

        body.dark-mode .table tbody tr:hover td{
            background-color: #f8fafc !important;
        }

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

        body.dark-mode .alert{
            color: var(--text-dark-strong) !important;
        }

        body.dark-mode .btn-outline-secondary{
            color: var(--text-dark-strong);
            border-color: #cbd5e1;
            background: #fff;
        }

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

        body.dark-mode .site-footer{
            background: rgba(15, 23, 42, .75);
            border-top-color: rgba(51, 65, 85, .8);
        }

        body.dark-mode .footer-inner{
            color: #cbd5e1;
        }

        body.dark-mode .footer-brand{
            color: #f8fafc;
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

            .user-chip{
                width: 100%;
                justify-content: center;
            }

            .page-title{
                font-size: 1.45rem;
            }
        }

        @media (max-width: 767.98px){
            .content-card{
                border-radius: 18px;
            }

            .section-card{
                border-radius: 16px;
            }

            .table thead th,
            .table tbody td{
                padding: 12px 12px;
            }

            .footer-inner{
                justify-content: center;
                text-align: center;
            }
        }
    </style>
</head>
<body id="appBody">

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container page-container">
        <a class="navbar-brand navbar-brand-custom" href="{{ route('dashboard') }}">
            <div class="brand-logo-wrap">
                <img src="{{ asset('images/logo2.png') }}" alt="Logo Kampus" class="brand-logo brand-logo-light">
                <img src="{{ asset('images/logo2-putih.png') }}" alt="Logo Kampus" class="brand-logo brand-logo-dark">
            </div>

            <div>
                <div class="brand-title">Sistem Akademik ITBSS</div>
                <span class="brand-subtitle">Portal akademik mahasiswa, dosen, dan admin</span>
            </div>
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
                            @if(Auth::user()->role === 'admin')
                                <li><h6 class="dropdown-header">Menu Admin</h6></li>
                                <li><a class="dropdown-item" href="{{ route('dosen.index') }}">Dosen</a></li>
                                <li><a class="dropdown-item" href="{{ route('mahasiswa.index') }}">Mahasiswa</a></li>
                                <li><a class="dropdown-item" href="{{ route('jurusan.index') }}">Jurusan</a></li>
                                <li><a class="dropdown-item" href="{{ route('matakuliah.index') }}">Mata Kuliah</a></li>
                                <li><a class="dropdown-item" href="{{ route('kelas.index') }}">Kelas</a></li>
                                <li><a class="dropdown-item" href="{{ route('krs.index') }}">KRS</a></li>
                                <li><a class="dropdown-item" href="{{ route('krsdetail.index') }}">KRS Detail</a></li>
                            @endif

                            @if(Auth::user()->role === 'mahasiswa')
                                <li><h6 class="dropdown-header">Menu Mahasiswa</h6></li>
                                <li><a class="dropdown-item" href="{{ route('mahasiswa.krs.index') }}">KRS Saya</a></li>
                            @endif

                            @if(Auth::user()->role === 'dosen')
                                <li><h6 class="dropdown-header">Menu Dosen</h6></li>
                                <li><a class="dropdown-item" href="{{ route('dosen.krs.index') }}">Approval KRS</a></li>
                            @endif
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
                        <div class="user-chip">
                            <i class="bi bi-person-circle"></i>
                            <span>{{ Auth::user()->name }}</span>
                        </div>
                    </li>

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

<div class="page-shell">
    <main class="py-4 py-lg-5">
        @yield('content')
    </main>
</div>

<footer class="site-footer">
    <div class="container page-container">
        <div class="footer-inner">
            <div>
                <span class="footer-brand">Sistem Akademik ITBSS</span>
                <span class="ms-2">© {{ date('Y') }}</span>
            </div>

            <div>
                Dibuat untuk pengelolaan data akademik, KRS, dan approval dosen
            </div>
        </div>
    </div>
</footer>

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