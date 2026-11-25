<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KursusKu — Learning Management Portal</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@500;600&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f1f5f9;
            color: #0f172a;
        }
        .font-display { font-family: 'Space Grotesk', sans-serif; }
        .font-mono-code { font-family: 'JetBrains Mono', monospace; }

        .navbar-midnight {
            background: rgba(9, 13, 22, 0.95);
            backdrop-filter: blur(14px);
            border-bottom: 1px solid rgba(148, 163, 184, 0.14);
            padding: 0.72rem 0;
        }
        .brand-emblem-sm {
            width: 36px;
            height: 36px;
            border-radius: 11px;
            background: linear-gradient(135deg, #3b82f6 0%, #06b6d4 100%);
            color: #ffffff;
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 700;
            font-size: 1.05rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 18px rgba(59, 130, 246, 0.4);
        }
        .nav-link-midnight {
            color: #94a3b8;
            font-weight: 500;
            font-size: 0.88rem;
            padding: 0.48rem 0.95rem !important;
            border-radius: 999px;
            transition: all 0.2s ease;
        }
        .nav-link-midnight:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.07);
        }
        .nav-link-midnight.active {
            color: #38bdf8;
            background: rgba(56, 189, 248, 0.14);
            border: 1px solid rgba(56, 189, 248, 0.28);
            font-weight: 600;
        }
        .profile-pill-dark {
            background: rgba(30, 41, 59, 0.85);
            border: 1px solid rgba(148, 163, 184, 0.24);
            border-radius: 999px;
            padding: 4px 14px 4px 5px;
            display: inline-flex;
            align-items: center;
            gap: 9px;
            color: #f8fafc;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.2s ease;
        }
        .profile-pill-dark:hover {
            border-color: #38bdf8;
            background: rgba(30, 41, 59, 1);
        }
        .avatar-gradient-sm {
            width: 28px;
            height: 28px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3b82f6 0%, #06b6d4 100%);
            color: #ffffff;
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 700;
            font-size: 0.78rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }
        .dropdown-dark {
            background: #0f172a;
            border: 1px solid rgba(148, 163, 184, 0.22);
            border-radius: 18px;
            box-shadow: 0 20px 40px -10px rgba(0, 0, 0, 0.45);
            padding: 0.6rem;
            min-width: 240px;
        }
        .dropdown-dark .dropdown-item {
            color: #cbd5e1;
            border-radius: 11px;
            padding: 0.55rem 0.8rem;
            font-size: 0.86rem;
            transition: all 0.15s ease;
        }
        .dropdown-dark .dropdown-item:hover {
            background: rgba(56, 189, 248, 0.12);
            color: #ffffff;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-midnight sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2 text-white" href="{{ route('landing') }}">
    <span class="brand-emblem-sm">K</span>
    <span class="font-display fw-bold fs-5" style="letter-spacing: -0.02em;">KursusKu</span>
</a>

            <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
                <i class="bi bi-list fs-3"></i>
            </button>

            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav mx-auto gap-1 my-2 my-lg-0">
                    @auth
                        <li class="nav-item">
                            <a class="nav-link nav-link-midnight {{ request()->routeIs('profile.*') ? 'active' : '' }}" href="{{ route('profile.index') }}">
                                <i class="bi bi-person-badge me-1"></i> Profil Saya
                            </a>
                        </li>
                    @endauth
                    <li class="nav-item">
                        <a class="nav-link nav-link-midnight {{ request()->routeIs('courses.*') ? 'active' : '' }}" href="{{ route('courses.index') }}">
                            <i class="bi bi-journal-bookmark me-1"></i> Daftar Kursus
                        </a>
                    </li>
                    @if(Route::has('participants.index'))
                        <li class="nav-item">
                            <a class="nav-link nav-link-midnight {{ request()->routeIs('participants.*') ? 'active' : '' }}" href="{{ route('participants.index') }}">
                                <i class="bi bi-people me-1"></i> Peserta
                            </a>
                        </li>
                    @endif
                    @if(Route::has('enrollments.index'))
                        <li class="nav-item">
                            <a class="nav-link nav-link-midnight {{ request()->routeIs('enrollments.*') ? 'active' : '' }}" href="{{ route('enrollments.index') }}">
                                <i class="bi bi-card-checklist me-1"></i> Pendaftaran
                            </a>
                        </li>
                    @endif
                </ul>

                <div class="d-flex align-items-center">
                    @auth
                        <div class="dropdown">
                            <button class="profile-pill-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="avatar-gradient-sm">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</span>
                                <span>{{ Auth::user()->name }}</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-dark mt-2">
                                <li class="px-3 py-2 border-bottom border-secondary border-opacity-25 mb-1">
                                    <div class="font-display fw-bold text-white small">{{ Auth::user()->name }}</div>
                                    <div class="font-mono-code text-info text-truncate" style="font-size: 0.72rem;">{{ Auth::user()->email }}</div>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('profile.index') }}">
                                        <i class="bi bi-person-circle text-info"></i>
                                        <span>Profil Saya</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item d-flex align-items-center gap-2" href="{{ route('courses.index') }}">
                                        <i class="bi bi-journal-code text-info"></i>
                                        <span>Kelola Kursus</span>
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider border-secondary border-opacity-25 my-1"></li>
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger d-flex align-items-center gap-2">
                                            <i class="bi bi-box-arrow-right"></i>
                                            <span>Logout</span>
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-sm rounded-pill px-3 py-2 fw-semibold text-white"
                           style="background: linear-gradient(135deg, #2563eb 0%, #0284c7 100%);">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Login
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>