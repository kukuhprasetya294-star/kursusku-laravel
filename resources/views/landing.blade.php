<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KursusKu — Platform Pembelajaran &amp; Pendaftaran Kursus Digital</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@500;600&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --bg-midnight: #090d16;
            --surface-glass: rgba(15, 23, 42, 0.72);
            --border-glass: rgba(148, 163, 184, 0.16);
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-midnight);
            color: #f8fafc;
            overflow-x: hidden;
            position: relative;
        }

        .font-display { font-family: 'Space Grotesk', sans-serif; }
        .font-mono-code { font-family: 'JetBrains Mono', monospace; }

        /* Background Grid & Animated Aurora */
        .bg-grid {
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(to right, rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
            background-size: 44px 44px;
            mask-image: radial-gradient(ellipse at top, black 45%, transparent 90%);
            pointer-events: none;
            z-index: 0;
        }

        .aurora-orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(95px);
            opacity: 0.4;
            pointer-events: none;
            z-index: 0;
            animation: driftOrb 14s ease-in-out infinite alternate;
        }
        .orb-blue {
            width: 440px;
            height: 440px;
            background: #2563eb;
            top: -120px;
            left: -90px;
        }
        .orb-cyan {
            width: 380px;
            height: 380px;
            background: #06b6d4;
            top: 220px;
            right: -110px;
            animation-delay: -6s;
        }

        @keyframes driftOrb {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(35px, 30px) scale(1.1); }
        }

        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(22px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .anim-1 { animation: fadeUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        .anim-2 { opacity: 0; animation: fadeUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) 0.12s forwards; }
        .anim-3 { opacity: 0; animation: fadeUp 0.6s cubic-bezier(0.16, 1, 0.3, 1) 0.24s forwards; }

        /* Sticky Midnight Navbar */
        .navbar-landing {
            background: rgba(9, 13, 22, 0.84);
            backdrop-filter: blur(16px);
            border-bottom: 1px solid var(--border-glass);
            padding: 0.8rem 0;
            z-index: 1030;
        }
        .brand-emblem {
            width: 38px;
            height: 38px;
            border-radius: 11px;
            background: linear-gradient(135deg, #3b82f6 0%, #06b6d4 100%);
            color: #ffffff;
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 700;
            font-size: 1.1rem;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 0 22px rgba(59, 130, 246, 0.45);
        }
        .nav-anchor {
            color: #94a3b8;
            font-size: 0.9rem;
            font-weight: 500;
            padding: 0.45rem 0.9rem !important;
            border-radius: 999px;
            transition: all 0.2s ease;
        }
        .nav-anchor:hover {
            color: #ffffff;
            background: rgba(255, 255, 255, 0.06);
        }

        /* Buttons */
        .btn-aurora {
            background: linear-gradient(135deg, #2563eb 0%, #0284c7 100%);
            border: 1px solid rgba(255, 255, 255, 0.18);
            color: #ffffff;
            border-radius: 13px;
            padding: 0.82rem 1.5rem;
            font-weight: 600;
            font-size: 0.95rem;
            box-shadow: 0 12px 28px -6px rgba(37, 99, 235, 0.55);
            transition: all 0.22s ease;
        }
        .btn-aurora:hover {
            transform: translateY(-2px);
            box-shadow: 0 18px 34px -6px rgba(6, 182, 212, 0.6);
            color: #ffffff;
        }

        .btn-glass-outline {
            background: rgba(30, 41, 59, 0.55);
            border: 1px solid rgba(148, 163, 184, 0.28);
            color: #f8fafc;
            border-radius: 13px;
            padding: 0.82rem 1.5rem;
            font-weight: 600;
            font-size: 0.95rem;
            backdrop-filter: blur(10px);
            transition: all 0.22s ease;
        }
        .btn-glass-outline:hover {
            background: rgba(30, 41, 59, 0.9);
            border-color: #38bdf8;
            color: #38bdf8;
            transform: translateY(-2px);
        }

        /* Glass Surfaces */
        .glass-panel {
            background: var(--surface-glass);
            backdrop-filter: blur(18px);
            border: 1px solid var(--border-glass);
            border-radius: 22px;
            transition: transform 0.25s ease, border-color 0.25s ease, box-shadow 0.25s ease;
        }
        .course-card-hover:hover {
            transform: translateY(-5px);
            border-color: rgba(56, 189, 248, 0.45);
            box-shadow: 0 20px 40px -15px rgba(2, 132, 199, 0.35);
        }

        .gradient-text {
            background: linear-gradient(90deg, #60a5fa 0%, #22d3ee 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .pulse-live {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #10b981;
            display: inline-block;
            box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
            animation: pulseDot 2s infinite;
        }
        @keyframes pulseDot {
            0% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
            70% { box-shadow: 0 0 0 8px rgba(16, 185, 129, 0); }
            100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
        }

        .step-badge-num {
            width: 42px;
            height: 42px;
            border-radius: 12px;
            background: rgba(56, 189, 248, 0.14);
            border: 1px solid rgba(56, 189, 248, 0.3);
            color: #38bdf8;
            font-family: 'JetBrains Mono', monospace;
            font-weight: 700;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .cta-aurora-box {
            background: linear-gradient(135deg, rgba(30, 58, 138, 0.75) 0%, rgba(15, 23, 42, 0.92) 60%, rgba(6, 182, 212, 0.28) 100%);
            border: 1px solid rgba(56, 189, 248, 0.3);
            border-radius: 28px;
            position: relative;
            overflow: hidden;
        }
    </style>
</head>
<body>

    <div class="bg-grid"></div>
    <div class="aurora-orb orb-blue"></div>
    <div class="aurora-orb orb-cyan"></div>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-landing sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2 text-white" href="{{ route('landing') }}">
                <span class="brand-emblem">K</span>
                <span class="font-display fw-bold fs-5" style="letter-spacing: -0.02em;">KursusKu</span>
            </a>

            <button class="navbar-toggler border-0 text-white" type="button" data-bs-toggle="collapse" data-bs-target="#landingNav">
                <i class="bi bi-list fs-3"></i>
            </button>

            <div class="collapse navbar-collapse" id="landingNav">
                <ul class="navbar-nav mx-auto gap-1 my-2 my-lg-0">
                    <li class="nav-item"><a class="nav-link nav-anchor" href="#beranda">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link nav-anchor" href="#katalog">Katalog Kursus</a></li>
                    <li class="nav-item"><a class="nav-link nav-anchor" href="#keunggulan">Keunggulan</a></li>
                    <li class="nav-item"><a class="nav-link nav-anchor" href="#alur">Alur Belajar</a></li>
                </ul>

                <div class="d-flex align-items-center gap-2">
                    @auth
                        <a href="{{ route('courses.index') }}" class="btn btn-sm btn-glass-outline py-2 px-3 rounded-pill">
                            Daftar Kursus
                        </a>
                        <a href="{{ route('profile.index') }}" class="btn btn-sm btn-aurora py-2 px-3 rounded-pill d-inline-flex align-items-center gap-2">
                            <i class="bi bi-person-circle"></i>
                            <span>{{ Auth::user()->name }}</span>
                        </a>
                    @else
                        <a href="{{ route('courses.index') }}" class="btn btn-sm btn-glass-outline py-2 px-3 rounded-pill">
                            Katalog
                        </a>
                        <a href="{{ route('login') }}" class="btn btn-sm btn-aurora py-2 px-4 rounded-pill">
                            Masuk <i class="bi bi-arrow-right-short"></i>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    {{-- Hero Section --}}
    <section id="beranda" class="position-relative py-5" style="z-index: 1;">
        <div class="container py-4 py-lg-5">
            <div class="row justify-content-center text-center">
                <div class="col-lg-9">
                    <div class="anim-1 d-inline-flex align-items-center gap-2 px-3 py-2 rounded-pill mb-4"
                         style="background: rgba(56, 189, 248, 0.12); border: 1px solid rgba(56, 189, 248, 0.28);">
                        <span class="pulse-live"></span>
                        <span class="font-mono-code text-info" style="font-size: 0.74rem;">
                            PLATFORM MANAJEMEN &amp; PENDAFTARAN KURSUS DIGITAL
                        </span>
                    </div>

                    <h1 class="anim-2 font-display fw-bold mb-4" style="font-size: clamp(2.2rem, 5vw, 3.6rem); line-height: 1.12; letter-spacing: -0.03em;">
                        Bangun Kompetensi Digital &amp; Kelola <span class="gradient-text">Kelas Terstruktur</span> Secara Real-Time.
                    </h1>

                    <p class="anim-2 text-secondary mx-auto mb-5" style="max-width: 650px; font-size: 1.05rem; line-height: 1.7;">
                        KursusKu menghadirkan sistem katalog pelatihan, penyaringan kelas instan, dan manajemen pendaftaran peserta dalam satu portal modern yang cepat dan aman.
                    </p>

                    <div class="anim-3 d-flex flex-wrap justify-content-center gap-3 mb-5">
                        <a href="{{ route('courses.index') }}" class="btn btn-aurora d-inline-flex align-items-center gap-2">
                            <i class="bi bi-journal-code"></i>
                            <span>Jelajahi Semua Kursus</span>
                        </a>
                        @auth
                            <a href="{{ route('profile.index') }}" class="btn btn-glass-outline d-inline-flex align-items-center gap-2">
                                <i class="bi bi-person-badge"></i>
                                <span>Buka Profil Saya</span>
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-glass-outline d-inline-flex align-items-center gap-2">
                                <i class="bi bi-box-arrow-in-right"></i>
                                <span>Masuk ke Portal Member</span>
                            </a>
                        @endauth
                    </div>
                </div>
            </div>

            {{-- Live Stats Strip (Data Real dari Database) --}}
            <div class="anim-3 glass-panel p-4 mt-2">
                <div class="row g-4 text-center">
                    <div class="col-6 col-md-3 border-end border-secondary border-opacity-25">
                        <div class="font-display fs-2 fw-bold text-white">{{ $stats['total_courses'] }}</div>
                        <div class="font-mono-code text-info mt-1" style="font-size: 0.72rem;">TOTAL PROGRAM KURSUS</div>
                    </div>
                    <div class="col-6 col-md-3 border-end-md border-secondary border-opacity-25">
                        <div class="font-display fs-2 fw-bold text-success">{{ $stats['open_courses'] }}</div>
                        <div class="font-mono-code text-secondary mt-1" style="font-size: 0.72rem;">KELAS DIBUKA (OPEN)</div>
                    </div>
                    <div class="col-6 col-md-3 border-end border-secondary border-opacity-25">
                        <div class="font-display fs-2 fw-bold text-white">{{ $stats['total_participants'] }}</div>
                        <div class="font-mono-code text-secondary mt-1" style="font-size: 0.72rem;">PESERTA TERDAFTAR</div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="font-display fs-2 fw-bold gradient-text">{{ $stats['total_enrollments'] }}</div>
                        <div class="font-mono-code text-secondary mt-1" style="font-size: 0.72rem;">TOTAL PENDAFTARAN</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Katalog Kursus Pilihan (Dinamis dari Database) --}}
    <section id="katalog" class="position-relative py-5" style="z-index: 1;">
        <div class="container py-3">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3 mb-4">
                <div>
                    <div class="font-mono-code text-info mb-1" style="font-size: 0.75rem;">OPEN ENROLLMENT</div>
                    <h2 class="font-display fw-bold mb-0" style="letter-spacing: -0.02em;">Kursus Tersedia Saat Ini</h2>
                </div>
                <a href="{{ route('courses.index') }}" class="text-info text-decoration-none fw-semibold small">
                    Lihat seluruh {{ $stats['total_courses'] }} kursus <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>

            <div class="row g-4">
                @forelse($featuredCourses as $course)
                    <div class="col-md-6 col-lg-4">
                        <div class="glass-panel course-card-hover p-4 h-100 d-flex flex-column justify-content-between">
                            <div>
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="font-mono-code badge rounded-2 px-2 py-1"
                                          style="background: rgba(59, 130, 246, 0.18); color: #93c5fd; border: 1px solid rgba(59, 130, 246, 0.3);">
                                        {{ $course->code }}
                                    </span>
                                    <span class="badge rounded-pill px-3 py-1"
                                          style="background: rgba(16, 185, 129, 0.16); color: #6ee7b7; border: 1px solid rgba(16, 185, 129, 0.3); font-size: 0.72rem;">
                                        Open
                                    </span>
                                </div>

                                <h5 class="font-display fw-bold text-white mb-2">{{ $course->name }}</h5>
                                <p class="text-secondary small mb-4" style="line-height: 1.6;">
                                    {{ \Illuminate\Support\Str::limit($course->description ?? 'Program pelatihan intensif terstruktur dengan pendampingan praktik langsung.', 95) }}
                                </p>
                            </div>

                            <div>
                                <div class="d-flex justify-content-between align-items-center py-3 border-top border-secondary border-opacity-25 small">
                                    <div>
                                        <div class="text-secondary" style="font-size: 0.72rem;">Biaya Investasi</div>
                                        <div class="font-display fw-bold text-white fs-6">
                                            Rp {{ number_format($course->fee, 0, ',', '.') }}
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <div class="text-secondary" style="font-size: 0.72rem;">Kuota &amp; Mulai</div>
                                        <div class="font-mono-code text-info" style="font-size: 0.76rem;">
                                            {{ $course->quota }} kursi &bull; {{ $course->start_date ? $course->start_date->format('d M Y') : 'Segera' }}
                                        </div>
                                    </div>
                                </div>

                                <a href="{{ route('courses.index', ['q' => $course->code]) }}"
                                   class="btn btn-glass-outline w-100 py-2 small mt-2">
                                    Cek Detail Kelas <i class="bi bi-arrow-up-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="glass-panel p-5 text-center text-secondary">
                            Belum ada kursus berstatus Open saat ini. Silakan cek kembali pada halaman <a href="{{ route('courses.index') }}" class="text-info">Daftar Kursus</a>.
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    {{-- Keunggulan Bento Grid --}}
    <section id="keunggulan" class="position-relative py-5" style="z-index: 1;">
        <div class="container py-3">
            <div class="text-center mb-5">
                <div class="font-mono-code text-info mb-1" style="font-size: 0.75rem;">KENAPA KURSUSKU</div>
                <h2 class="font-display fw-bold" style="letter-spacing: -0.02em;">Dirancang untuk Efisiensi &amp; Keamanan</h2>
            </div>

            <div class="row g-4">
                <div class="col-md-4">
                    <div class="glass-panel p-4 h-100">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-3 mb-3"
                             style="width: 48px; height: 48px; background: rgba(59, 130, 246, 0.16); color: #60a5fa;">
                            <i class="bi bi-search fs-4"></i>
                        </div>
                        <h5 class="font-display fw-bold text-white">Pencarian &amp; Filter Instan</h5>
                        <p class="text-secondary small mb-0" style="line-height: 1.65;">
                            Temukan kode atau nama kursus secara langsung menggunakan teknologi Ajax Live Search dan filter status tanpa memuat ulang halaman.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="glass-panel p-4 h-100">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-3 mb-3"
                             style="width: 48px; height: 48px; background: rgba(6, 182, 212, 0.16); color: #22d3ee;">
                            <i class="bi bi-shield-check fs-4"></i>
                        </div>
                        <h5 class="font-display fw-bold text-white">Autentikasi &amp; Kontrol Profil</h5>
                        <p class="text-secondary small mb-0" style="line-height: 1.65;">
                            Sistem login dengan dukungan Remember Token, pemulihan kata sandi mandiri, serta pengelolaan profil akun yang terintegrasi.
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="glass-panel p-4 h-100">
                        <div class="d-inline-flex align-items-center justify-content-center rounded-3 mb-3"
                             style="width: 48px; height: 48px; background: rgba(16, 185, 129, 0.16); color: #34d399;">
                            <i class="bi bi-diagram-3 fs-4"></i>
                        </div>
                        <h5 class="font-display fw-bold text-white">Manajemen Kuota Terukur</h5>
                        <p class="text-secondary small mb-0" style="line-height: 1.65;">
                            Pantau ketersediaan kursi, status pembukaan kelas (Open, Draft, Closed), dan rekap pendaftaran peserta secara akurat.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Alur Belajar 3 Langkah --}}
    <section id="alur" class="position-relative py-5" style="z-index: 1;">
        <div class="container py-3">
            <div class="glass-panel p-4 p-md-5">
                <div class="row align-items-center g-4">
                    <div class="col-lg-5">
                        <div class="font-mono-code text-info mb-1" style="font-size: 0.75rem;">ALUR PENGGUNAAN</div>
                        <h3 class="font-display fw-bold text-white mb-3">Tiga Langkah Mulai Mengelola Kursus</h3>
                        <p class="text-secondary small mb-0" style="line-height: 1.65;">
                            Mulai dari penelusuran katalog hingga pengelolaan profil dan pendaftaran berjalan dalam alur yang ringkas.
                        </p>
                    </div>
                    <div class="col-lg-7">
                        <div class="d-flex flex-column gap-3">
                            <div class="d-flex align-items-start gap-3 p-3 rounded-4" style="background: rgba(30, 41, 59, 0.55); border: 1px solid rgba(148, 163, 184, 0.14);">
                                <div class="step-badge-num">01</div>
                                <div>
                                    <div class="font-display fw-bold text-white">Telusuri Katalog Kelas</div>
                                    <div class="text-secondary small">Saring kursus berdasarkan status Open, biaya, dan tanggal mulai melalui halaman Daftar Kursus.</div>
                                </div>
                            </div>
                            <div class="d-flex align-items-start gap-3 p-3 rounded-4" style="background: rgba(30, 41, 59, 0.55); border: 1px solid rgba(148, 163, 184, 0.14);">
                                <div class="step-badge-num">02</div>
                                <div>
                                    <div class="font-display fw-bold text-white">Masuk ke Portal Akun</div>
                                    <div class="text-secondary small">Login menggunakan username atau email untuk mengakses halaman Profil Saya dan ringkasan statistik.</div>
                                </div>
                            </div>
                            <div class="d-flex align-items-start gap-3 p-3 rounded-4" style="background: rgba(30, 41, 59, 0.55); border: 1px solid rgba(148, 163, 184, 0.14);">
                                <div class="step-badge-num">03</div>
                                <div>
                                    <div class="font-display fw-bold text-white">Kelola Data &amp; Pendaftaran</div>
                                    <div class="text-secondary small">Perbarui informasi kursus, data peserta, dan riwayat pendaftaran dalam satu antarmuka konsisten.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- CTA Banner --}}
    <section class="position-relative py-5" style="z-index: 1;">
        <div class="container">
            <div class="cta-aurora-box p-4 p-md-5 text-center">
                <span class="font-mono-code badge rounded-pill px-3 py-2 mb-3"
                      style="background: rgba(56, 189, 248, 0.16); color: #38bdf8; border: 1px solid rgba(56, 189, 248, 0.3); font-size: 0.72rem;">
                    SIAP MEMULAI?
                </span>
                <h2 class="font-display fw-bold text-white mb-3">Akses Sistem KursusKu Sekarang</h2>
                <p class="text-secondary mx-auto mb-4" style="max-width: 560px;">
                    Masuk ke akun Anda untuk mengelola profil dan program kursus, atau buka katalog untuk melihat seluruh kelas yang tersedia.
                </p>
                <div class="d-flex flex-wrap justify-content-center gap-3">
                    @auth
                        <a href="{{ route('profile.index') }}" class="btn btn-aurora">
                            Ke Halaman Profil Saya <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-aurora">
                            Login ke Akun <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    @endauth
                    <a href="{{ route('courses.index') }}" class="btn btn-glass-outline">
                        Buka Daftar Kursus
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="position-relative border-top border-secondary border-opacity-25 py-4 mt-4" style="z-index: 1;">
        <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center gap-3 small text-secondary">
            <div class="d-flex align-items-center gap-2">
                <span class="brand-emblem" style="width: 28px; height: 28px; font-size: 0.85rem; border-radius: 8px;">K</span>
                <span class="font-display fw-bold text-white">KursusKu</span>
                <span>&bull; Sistem Informasi Pendaftaran Kursus</span>
            </div>
            <div class="d-flex gap-4">
                <a href="#beranda" class="text-secondary text-decoration-none">Beranda</a>
                <a href="{{ route('courses.index') }}" class="text-secondary text-decoration-none">Daftar Kursus</a>
                <a href="{{ route('login') }}" class="text-secondary text-decoration-none">Login</a>
            </div>
            <div class="font-mono-code" style="font-size: 0.74rem;">&copy; 2026 Kukuh Prasetya</div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>