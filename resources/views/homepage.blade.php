<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Sistem Akademik</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --bg-main: #f4f8fc;
            --bg-surface: #ffffff;
            --bg-card: #ffffff;
            --bg-card-soft: #f8fbff;
            --text-main: #1f2937;
            --text-muted: #6b7280;
            --border-color: #dbe5f0;
            --shadow-color: rgba(15, 23, 42, 0.08);
            --navbar-grad-1: #56ccf2;
            --navbar-grad-2: #2f80ed;
            --theme-btn-bg: rgba(255,255,255,0.18);
            --theme-btn-color: #ffffff;

            --feature-card-bg: #f6f9ff;
            --feature-card-border: #d7e5f7;
            --feature-card-shadow: 0 10px 24px rgba(59, 130, 246, 0.10);

            --icon-bg: linear-gradient(135deg, #60a5fa, #2563eb);
            --icon-shadow: 0 10px 22px rgba(37, 99, 235, 0.22);

            --stat-card-bg: #f8fbff;
            --stat-card-border: #dbeafe;
            --stat-icon-bg: linear-gradient(135deg, #3b82f6, #2563eb);
            --footer-bg: transparent;
        }

        html[data-theme="dark"] {
            --bg-main: #0f172a;
            --bg-surface: #111827;
            --bg-card: #1e293b;
            --bg-card-soft: #243244;
            --text-main: #f8fafc;
            --text-muted: #cbd5e1;
            --border-color: #334155;
            --shadow-color: rgba(0, 0, 0, 0.35);
            --navbar-grad-1: #0f172a;
            --navbar-grad-2: #1e3a8a;
            --theme-btn-bg: rgba(255,255,255,0.08);
            --theme-btn-color: #ffffff;

            --feature-card-bg: #243244;
            --feature-card-border: #334155;
            --feature-card-shadow: 0 10px 24px rgba(0, 0, 0, 0.28);

            --icon-bg: linear-gradient(135deg, #3b82f6, #1d4ed8);
            --icon-shadow: 0 10px 24px rgba(30, 64, 175, 0.35);

            --stat-card-bg: #243244;
            --stat-card-border: #334155;
            --stat-icon-bg: linear-gradient(135deg, #3b82f6, #1d4ed8);
            --footer-bg: transparent;
        }

        body {
            background-color: var(--bg-main);
            color: var(--text-main);
            transition: background-color .25s ease, color .25s ease;
        }

        .navbar-custom {
            background: linear-gradient(90deg, var(--navbar-grad-1), var(--navbar-grad-2));
            padding-top: 8px;
            padding-bottom: 8px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.12);
        }

        .navbar-brand-custom {
            gap: 10px;
        }

        .brand-logo-wrap {
            position: relative;
            width: 52px;
            height: 52px;
            flex-shrink: 0;
        }

        .brand-logo {
            width: 52px;
            height: 52px;
            object-fit: contain;
            position: absolute;
            inset: 0;
            transition: opacity .25s ease;
        }

        .brand-logo-dark {
            opacity: 0;
        }

        html[data-theme="dark"] .brand-logo-light {
            opacity: 0;
        }

        html[data-theme="dark"] .brand-logo-dark {
            opacity: 1;
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

        .theme-toggle-btn {
            border: 1px solid rgba(255,255,255,0.28);
            background: var(--theme-btn-bg);
            color: var(--theme-btn-color);
            font-weight: 600;
            font-size: 0.9rem;
            border-radius: 10px;
            padding: 6px 14px;
            transition: all .2s ease;
            white-space: nowrap;
        }

        .theme-toggle-btn:hover {
            background: rgba(255,255,255,0.28);
            color: #fff;
        }

        .main-card {
            background: var(--bg-card);
            border: 1px solid var(--border-color);
            box-shadow: 0 10px 24px var(--shadow-color);
            color: var(--text-main);
        }

        .feature-card {
            background: var(--feature-card-bg);
            border: 1px solid var(--feature-card-border);
            box-shadow: var(--feature-card-shadow);
            color: var(--text-main);
            transition: all .25s ease;
        }

        .feature-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 16px 30px rgba(15, 23, 42, 0.14);
        }

        html[data-theme="dark"] .feature-card:hover {
            box-shadow: 0 16px 30px rgba(0, 0, 0, 0.35);
        }

        .feature-card p,
        .dashboard-desc,
        .section-subtitle,
        .stat-label,
        .quick-action-desc,
        .footer-text {
            color: var(--text-muted) !important;
        }

        .feature-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 18px;
        }

        .feature-icon {
            width: 58px;
            height: 58px;
            border-radius: 18px;
            background: var(--icon-bg);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--icon-shadow);
            flex-shrink: 0;
        }

        .feature-icon i {
            color: #fff;
            font-size: 1.45rem;
            line-height: 1;
        }

        .feature-title {
            font-size: 1.25rem;
            font-weight: 700;
            line-height: 1.28;
            margin: 0;
            color: var(--text-main);
        }

        .dashboard-image {
            max-width: 100%;
            height: auto;
            object-fit: cover;
        }

        .role-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 12px;
            border-radius: 999px;
            background: #e0edff;
            color: #1d4ed8;
            font-size: 0.9rem;
            font-weight: 700;
        }

        html[data-theme="dark"] .role-badge {
            background: #1e3a8a;
            color: #dbeafe;
        }

        .section-title {
            font-size: 1.15rem;
            font-weight: 700;
            margin-bottom: 4px;
            color: var(--text-main);
        }

        .stats-card {
            background: var(--stat-card-bg);
            border: 1px solid var(--stat-card-border);
            border-radius: 20px;
            padding: 20px;
            height: 100%;
            box-shadow: 0 10px 24px var(--shadow-color);
            transition: .25s ease;
        }

        .stats-card:hover {
            transform: translateY(-4px);
        }

        .stats-top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 14px;
        }

        .stats-icon {
            width: 52px;
            height: 52px;
            border-radius: 16px;
            background: var(--stat-icon-bg);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 1.25rem;
            box-shadow: 0 12px 24px rgba(37, 99, 235, 0.20);
        }

        .stat-label {
            font-size: 0.95rem;
            margin-bottom: 6px;
        }

        .stat-value {
            font-size: 1.9rem;
            font-weight: 800;
            line-height: 1;
            color: var(--text-main);
            margin-bottom: 0;
        }

        .quick-action-card {
            background: var(--bg-card-soft);
            border: 1px solid var(--border-color);
            border-radius: 20px;
            padding: 24px;
            box-shadow: 0 10px 24px var(--shadow-color);
        }

        .quick-action-buttons .btn {
            min-width: 170px;
        }

        .footer-custom {
            margin-top: 42px;
            padding: 24px 0 36px;
            background: var(--footer-bg);
            border-top: 1px solid var(--border-color);
        }

        .footer-title {
            color: var(--text-main);
            font-weight: 700;
            margin-bottom: 4px;
        }

        @media (max-width: 992px) {
            .navbar-custom {
                padding-top: 8px;
                padding-bottom: 8px;
            }

            .brand-logo-wrap {
                width: 42px;
                height: 42px;
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

            .theme-toggle-wrap {
                margin-top: 10px;
            }

            .feature-header {
                gap: 14px;
                margin-bottom: 16px;
            }

            .feature-icon {
                width: 52px;
                height: 52px;
                border-radius: 16px;
            }

            .feature-icon i {
                font-size: 1.25rem;
            }

            .feature-title {
                font-size: 1.08rem;
            }

            .quick-action-buttons .btn {
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            .feature-header {
                align-items: flex-start;
            }

            .feature-title {
                font-size: 1.02rem;
                line-height: 1.35;
            }

            .stat-value {
                font-size: 1.55rem;
            }
        }
    </style>

    <script>
        (function () {
            const savedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.setAttribute('data-theme', savedTheme);
        })();
    </script>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container">

        <a class="navbar-brand d-flex align-items-center navbar-brand-custom" href="{{ route('dashboard') }}">
            <div class="brand-logo-wrap">
                <img src="{{ asset('images/logo2.png') }}" alt="Logo Kampus" class="brand-logo brand-logo-light">
                <img src="{{ asset('images/logo2-putih.png') }}" alt="Logo Kampus" class="brand-logo brand-logo-dark">
            </div>

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

                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle"
                       href="#"
                       role="button"
                       data-bs-toggle="dropdown"
                       aria-expanded="false">
                        Menu
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end">
                        @if(Auth::user()->role === 'admin')
                            <li><a class="dropdown-item" href="{{ route('dosen.index') }}">Dosen</a></li>
                            <li><a class="dropdown-item" href="{{ route('mahasiswa.index') }}">Mahasiswa</a></li>
                            <li><a class="dropdown-item" href="{{ route('jurusan.index') }}">Jurusan</a></li>
                            <li><a class="dropdown-item" href="{{ route('matakuliah.index') }}">Mata Kuliah</a></li>
                            <li><a class="dropdown-item" href="{{ route('kelas.index') }}">Kelas</a></li>
                            <li><a class="dropdown-item" href="{{ route('krs.index') }}">KRS</a></li>
                            <li><a class="dropdown-item" href="{{ route('krsdetail.index') }}">KRS Detail</a></li>
                        @endif

                        @if(Auth::user()->role === 'mahasiswa')
                            <li><a class="dropdown-item" href="{{ route('mahasiswa.krs.index') }}">KRS Saya</a></li>
                        @endif

                        @if(Auth::user()->role === 'dosen')
                            <li><a class="dropdown-item" href="{{ route('dosen.krs.index') }}">Approval KRS</a></li>
                        @endif
                    </ul>
                </li>
                @endauth

                <li class="nav-item ms-lg-3 theme-toggle-wrap">
                    <button type="button" id="themeToggle" class="theme-toggle-btn">
                        🌙 Dark
                    </button>
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
    <div class="card main-card shadow border-0 rounded-4">
        <div class="card-body p-5">
            <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-center gap-3 mb-3">
                <div>
                    <h1 class="fw-bold mb-2">Dashboard Sistem Akademik</h1>

                    @auth
                        <p class="dashboard-desc mb-0">
                            Selamat datang, <strong>{{ Auth::user()->name }}</strong>. Silakan gunakan menu akademik sesuai role akun Anda.
                        </p>
                    @else
                        <p class="dashboard-desc mb-0">
                            Selamat datang di dashboard sistem akademik. Login untuk mengakses fitur sesuai peran pengguna.
                        </p>
                    @endauth
                </div>

                @auth
                    <div class="role-badge">
                        <i class="bi bi-person-badge-fill"></i>
                        {{ ucfirst(Auth::user()->role) }}
                    </div>
                @endauth
            </div>

            {{-- DASHBOARD KHUSUS SAAT LOGIN --}}
            @auth
                {{-- ADMIN --}}
                @if(Auth::user()->role === 'admin')
                    <div class="mt-4">
                        <h4 class="section-title">Ringkasan Admin</h4>
                        <p class="section-subtitle mb-4">Statistik data akademik dan status pengajuan KRS.</p>

                        <div class="row g-4 mb-4">
                            <div class="col-md-6 col-xl-3">
                                <div class="stats-card">
                                    <div class="stats-top">
                                        <div>
                                            <p class="stat-label">Total Dosen</p>
                                            <h3 class="stat-value">{{ $stats['total_dosen'] ?? 0 }}</h3>
                                        </div>
                                        <div class="stats-icon">
                                            <i class="bi bi-person-workspace"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="stats-card">
                                    <div class="stats-top">
                                        <div>
                                            <p class="stat-label">Total Mahasiswa</p>
                                            <h3 class="stat-value">{{ $stats['total_mahasiswa'] ?? 0 }}</h3>
                                        </div>
                                        <div class="stats-icon">
                                            <i class="bi bi-mortarboard-fill"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="stats-card">
                                    <div class="stats-top">
                                        <div>
                                            <p class="stat-label">Total Kelas</p>
                                            <h3 class="stat-value">{{ $stats['total_kelas'] ?? 0 }}</h3>
                                        </div>
                                        <div class="stats-icon">
                                            <i class="bi bi-door-open-fill"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-xl-3">
                                <div class="stats-card">
                                    <div class="stats-top">
                                        <div>
                                            <p class="stat-label">Total KRS</p>
                                            <h3 class="stat-value">{{ $stats['total_krs'] ?? 0 }}</h3>
                                        </div>
                                        <div class="stats-icon">
                                            <i class="bi bi-journal-text"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="stats-card">
                                    <div class="stats-top">
                                        <div>
                                            <p class="stat-label">KRS Pending</p>
                                            <h3 class="stat-value">{{ $stats['krs_pending'] ?? 0 }}</h3>
                                        </div>
                                        <div class="stats-icon">
                                            <i class="bi bi-hourglass-split"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="stats-card">
                                    <div class="stats-top">
                                        <div>
                                            <p class="stat-label">KRS Approved</p>
                                            <h3 class="stat-value">{{ $stats['krs_approved'] ?? 0 }}</h3>
                                        </div>
                                        <div class="stats-icon">
                                            <i class="bi bi-check-circle-fill"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="stats-card">
                                    <div class="stats-top">
                                        <div>
                                            <p class="stat-label">KRS Declined</p>
                                            <h3 class="stat-value">{{ $stats['krs_declined'] ?? 0 }}</h3>
                                        </div>
                                        <div class="stats-icon">
                                            <i class="bi bi-x-circle-fill"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="quick-action-card mb-4">
                            <h5 class="fw-bold mb-2">Quick Action Admin</h5>
                            <p class="quick-action-desc mb-3">Akses cepat ke menu pengelolaan utama.</p>

                            <div class="d-flex flex-wrap gap-2 quick-action-buttons">
                                <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary rounded-3">Kelola Mahasiswa</a>
                                <a href="{{ route('dosen.index') }}" class="btn btn-outline-primary rounded-3">Kelola Dosen</a>
                                <a href="{{ route('kelas.index') }}" class="btn btn-outline-primary rounded-3">Kelola Kelas</a>
                                <a href="{{ route('krs.index') }}" class="btn btn-outline-primary rounded-3">Lihat Data KRS</a>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- MAHASISWA --}}
                @if(Auth::user()->role === 'mahasiswa')
                    @php
                        $krsTerakhir = $stats['krs_terakhir'] ?? null;
                    @endphp

                    <div class="mt-4">
                        <h4 class="section-title">Ringkasan Mahasiswa</h4>
                        <p class="section-subtitle mb-4">Pantau pengajuan KRS Anda dengan lebih cepat.</p>

                        <div class="row g-4 mb-4">
                            <div class="col-md-4">
                                <div class="stats-card">
                                    <div class="stats-top">
                                        <div>
                                            <p class="stat-label">Total Pengajuan KRS</p>
                                            <h3 class="stat-value">{{ $stats['total_krs'] ?? 0 }}</h3>
                                        </div>
                                        <div class="stats-icon">
                                            <i class="bi bi-journal-plus"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="stats-card">
                                    <div class="stats-top">
                                        <div>
                                            <p class="stat-label">Status KRS Terakhir</p>
                                            <h3 class="stat-value" style="font-size: 1.25rem;">
                                                {{ $krsTerakhir ? ucfirst($krsTerakhir->status) : '-' }}
                                            </h3>
                                        </div>
                                        <div class="stats-icon">
                                            <i class="bi bi-clipboard-check-fill"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="stats-card">
                                    <div class="stats-top">
                                        <div>
                                            <p class="stat-label">Total SKS KRS Terakhir</p>
                                            <h3 class="stat-value">
                                                {{ $krsTerakhir ? $krsTerakhir->total_sks : 0 }}
                                            </h3>
                                        </div>
                                        <div class="stats-icon">
                                            <i class="bi bi-book-half"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="quick-action-card mb-4">
                            <h5 class="fw-bold mb-2">Quick Action Mahasiswa</h5>
                            <p class="quick-action-desc mb-3">Kelola pengajuan KRS Anda dari sini.</p>

                            <div class="d-flex flex-wrap gap-2 quick-action-buttons">
                                <a href="{{ route('mahasiswa.krs.index') }}" class="btn btn-primary rounded-3">KRS Saya</a>
                                <a href="{{ route('mahasiswa.krs.create') }}" class="btn btn-outline-primary rounded-3">Buat KRS Baru</a>
                            </div>
                        </div>
                    </div>
                @endif

                {{-- DOSEN --}}
                @if(Auth::user()->role === 'dosen')
                    <div class="mt-4">
                        <h4 class="section-title">Ringkasan Dosen</h4>
                        <p class="section-subtitle mb-4">Pantau proses approval KRS mahasiswa.</p>

                        <div class="row g-4 mb-4">
                            <div class="col-md-4">
                                <div class="stats-card">
                                    <div class="stats-top">
                                        <div>
                                            <p class="stat-label">KRS Pending</p>
                                            <h3 class="stat-value">{{ $stats['krs_pending'] ?? 0 }}</h3>
                                        </div>
                                        <div class="stats-icon">
                                            <i class="bi bi-hourglass-split"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="stats-card">
                                    <div class="stats-top">
                                        <div>
                                            <p class="stat-label">KRS Approved</p>
                                            <h3 class="stat-value">{{ $stats['krs_approved'] ?? 0 }}</h3>
                                        </div>
                                        <div class="stats-icon">
                                            <i class="bi bi-check-circle-fill"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="stats-card">
                                    <div class="stats-top">
                                        <div>
                                            <p class="stat-label">KRS Declined</p>
                                            <h3 class="stat-value">{{ $stats['krs_declined'] ?? 0 }}</h3>
                                        </div>
                                        <div class="stats-icon">
                                            <i class="bi bi-x-circle-fill"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="quick-action-card mb-4">
                            <h5 class="fw-bold mb-2">Quick Action Dosen</h5>
                            <p class="quick-action-desc mb-3">Masuk ke halaman approval KRS mahasiswa.</p>

                            <div class="d-flex flex-wrap gap-2 quick-action-buttons">
                                <a href="{{ route('dosen.krs.index') }}" class="btn btn-primary rounded-3">Approval KRS</a>
                            </div>
                        </div>
                    </div>
                @endif
            @endauth

            {{-- GUEST / INFO UMUM --}}
            <div class="row g-4 mt-2">
                <div class="col-md-4">
                    <div class="card feature-card rounded-4 h-100">
                        <div class="card-body">
                            <div class="feature-header">
                                <div class="feature-icon">
                                    <i class="bi bi-database-fill"></i>
                                </div>
                                <h5 class="feature-title">Manajemen Data Akademik</h5>
                            </div>
                            <p class="mb-0">
                                Kelola data dosen, mahasiswa, jurusan, mata kuliah, kelas, KRS, dan KRS detail dalam satu dashboard.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card feature-card rounded-4 h-100">
                        <div class="card-body">
                            <div class="feature-header">
                                <div class="feature-icon">
                                    <i class="bi bi-grid-1x2-fill"></i>
                                </div>
                                <h5 class="feature-title">Akses Menu Cepat</h5>
                            </div>
                            <p class="mb-0">
                                Setiap role memiliki akses menu yang berbeda, admin untuk kelola data, mahasiswa untuk KRS, dan dosen untuk approval KRS.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card feature-card rounded-4 h-100">
                        <div class="card-body">
                            <div class="feature-header">
                                <div class="feature-icon">
                                    <i class="bi bi-shield-lock-fill"></i>
                                </div>
                                <h5 class="feature-title">Sistem Login Multi Role</h5>
                            </div>
                            <p class="mb-0">
                                Sistem mendukung role admin, mahasiswa, dan dosen dengan hak akses dashboard yang berbeda.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-4 text-center">
                <img src="{{ asset('images/homepage.png') }}"
                    alt="Banner Dashboard"
                    class="img-fluid rounded-4 shadow-sm dashboard-image">
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

<footer class="footer-custom">
    <div class="container text-center">
        <div class="footer-title">Sistem Akademik ITBSS</div>
        <div class="footer-text">
            Project Pemrograman Web Lanjut • © {{ date('Y') }}
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    const themeToggleBtn = document.getElementById('themeToggle');

    function applyThemeLabel(theme) {
        if (!themeToggleBtn) return;
        themeToggleBtn.textContent = theme === 'dark' ? '☀️ Light' : '🌙 Dark';
    }

    function setTheme(theme) {
        document.documentElement.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);
        applyThemeLabel(theme);
    }

    const currentTheme = localStorage.getItem('theme') || 'light';
    setTheme(currentTheme);

    if (themeToggleBtn) {
        themeToggleBtn.addEventListener('click', function () {
            const activeTheme = document.documentElement.getAttribute('data-theme');
            const nextTheme = activeTheme === 'dark' ? 'light' : 'dark';
            setTheme(nextTheme);
        });
    }
</script>
</body>
</html>