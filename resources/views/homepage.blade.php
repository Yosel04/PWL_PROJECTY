<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Sistem Akademik</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Bootstrap Icons -->
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
        .dashboard-desc {
            color: var(--text-muted) !important;
        }

        /* HEADER CARD: logo + judul sejajar */
        .feature-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 18px;
        }

        /* icon biru di card */
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

        /* JUDUL CARD DIBESARIN DIKIT */
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
        }

        @media (max-width: 576px) {
            .feature-header {
                align-items: flex-start;
            }

            .feature-title {
                font-size: 1.02rem;
                line-height: 1.35;
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
            <h1 class="fw-bold mb-3">Dashboard Sistem Akademik</h1>

            @auth
                <p class="dashboard-desc mb-4">
                    Selamat datang, <strong>{{ Auth::user()->name }}</strong>. Silakan pilih menu akademik dari navbar di atas.
                </p>
            @else
                <p class="dashboard-desc mb-4">
                    Selamat datang di dashboard sistem akademik. Untuk mengakses menu dosen, mahasiswa, jurusan, mata kuliah, kelas, KRS, dan KRS detail, silakan login terlebih dahulu.
                </p>
            @endauth

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
                                Gunakan menu dropdown di navbar untuk langsung membuka halaman data yang dibutuhkan.
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
                                <h5 class="feature-title">Sistem Login</h5>
                            </div>
                            <p class="mb-0">
                                Halaman dashboard bisa diakses umum, tetapi menu data akademik hanya bisa dibuka setelah login.
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