<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Masuk — KursusKu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@500;600&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --bg-dark: #090d16;
            --card-glass: rgba(15, 23, 42, 0.72);
            --border-glass: rgba(148, 163, 184, 0.16);
            --accent-blue: #3b82f6;
            --accent-cyan: #06b6d4;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-dark);
            color: #f8fafc;
            overflow-x: hidden;
            position: relative;
        }

        /* Architectural Grid Overlay */
        .bg-grid {
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(to right, rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
            background-size: 42px 42px;
            mask-image: radial-gradient(ellipse at center, black 45%, transparent 85%);
            pointer-events: none;
            z-index: 0;
        }

        /* Animated Aurora Orbs */
        .orb {
            position: fixed;
            border-radius: 50%;
            filter: blur(85px);
            opacity: 0.45;
            pointer-events: none;
            z-index: 0;
            animation: floatOrb 12s ease-in-out infinite alternate;
        }
        .orb-1 {
            width: 380px;
            height: 380px;
            background: #2563eb;
            top: -90px;
            left: -80px;
        }
        .orb-2 {
            width: 340px;
            height: 340px;
            background: #06b6d4;
            bottom: -90px;
            right: -60px;
            animation-delay: -5s;
        }

        @keyframes floatOrb {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(35px, 25px) scale(1.12); }
        }

        /* Entrance Animations */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .anim-1 { animation: fadeUp 0.55s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        .anim-2 { opacity: 0; animation: fadeUp 0.55s cubic-bezier(0.16, 1, 0.3, 1) 0.1s forwards; }
        .anim-3 { opacity: 0; animation: fadeUp 0.55s cubic-bezier(0.16, 1, 0.3, 1) 0.2s forwards; }
        .anim-4 { opacity: 0; animation: fadeUp 0.55s cubic-bezier(0.16, 1, 0.3, 1) 0.3s forwards; }

        .font-display { font-family: 'Space Grotesk', sans-serif; }
        .font-mono-code { font-family: 'JetBrains Mono', monospace; }

        .auth-stage {
            position: relative;
            z-index: 1;
            max-width: 960px;
            width: 100%;
        }

        /* Bento Showcase Left */
        .bento-card {
            background: rgba(15, 23, 42, 0.58);
            backdrop-filter: blur(16px);
            border: 1px solid var(--border-glass);
            border-radius: 22px;
            transition: transform 0.25s ease, border-color 0.25s ease;
        }
        .bento-card:hover {
            transform: translateY(-3px);
            border-color: rgba(56, 189, 248, 0.4);
        }

        .brand-emblem {
            width: 44px;
            height: 44px;
            border-radius: 13px;
            background: linear-gradient(135deg, #3b82f6 0%, #06b6d4 100%);
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-family: 'Space Grotesk', sans-serif;
            font-weight: 700;
            font-size: 1.25rem;
            color: #ffffff;
            box-shadow: 0 0 25px rgba(59, 130, 246, 0.45);
        }

        .status-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background: #10b981;
            display: inline-block;
            box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7);
            animation: pulseGreen 2s infinite;
        }
        @keyframes pulseGreen {
            0% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
            70% { box-shadow: 0 0 0 8px rgba(16, 185, 129, 0); }
            100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
        }

        /* Frosted Form Card Right */
        .login-glass-panel {
            background: rgba(15, 23, 42, 0.82);
            backdrop-filter: blur(22px);
            border: 1px solid rgba(148, 163, 184, 0.22);
            border-radius: 26px;
            box-shadow: 0 28px 60px -15px rgba(0, 0, 0, 0.65);
            position: relative;
            overflow: hidden;
        }
        .login-glass-panel::before {
            content: '';
            position: absolute;
            top: 0;
            left: 12%;
            right: 12%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #38bdf8, #3b82f6, transparent);
        }

        .input-dark {
            background: rgba(30, 41, 59, 0.65);
            border: 1px solid rgba(148, 163, 184, 0.22);
            color: #f8fafc;
            border-radius: 13px;
            padding: 0.78rem 1rem 0.78rem 2.75rem;
            font-size: 0.92rem;
            transition: all 0.2s ease;
        }
        .input-dark::placeholder {
            color: #64748b;
        }
        .input-dark:focus {
            background: rgba(30, 41, 59, 0.95);
            border-color: #38bdf8;
            color: #ffffff;
            box-shadow: 0 0 0 4px rgba(56, 189, 248, 0.14);
        }

        .field-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 1rem;
            z-index: 5;
            transition: color 0.2s ease;
        }
        .input-wrapper:focus-within .field-icon {
            color: #38bdf8;
        }

        .eye-toggle-btn {
            position: absolute;
            right: 8px;
            top: 50%;
            transform: translateY(-50%);
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.08);
            color: #94a3b8;
            border-radius: 9px;
            padding: 5px 10px;
            z-index: 5;
            transition: all 0.2s ease;
        }
        .eye-toggle-btn:hover {
            background: rgba(56, 189, 248, 0.15);
            color: #38bdf8;
            border-color: rgba(56, 189, 248, 0.3);
        }

        .form-check-input {
            background-color: rgba(30, 41, 59, 0.8);
            border-color: rgba(148, 163, 184, 0.35);
        }
        .form-check-input:checked {
            background-color: #2563eb;
            border-color: #38bdf8;
        }

        .btn-glow-primary {
            background: linear-gradient(135deg, #2563eb 0%, #0284c7 100%);
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 13px;
            padding: 0.82rem 1.25rem;
            font-weight: 600;
            font-size: 0.95rem;
            color: #ffffff;
            box-shadow: 0 10px 25px -5px rgba(37, 99, 235, 0.55);
            transition: all 0.2s ease;
        }
        .btn-glow-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 32px -6px rgba(6, 182, 212, 0.6);
            color: #ffffff;
        }
        .btn-glow-primary:active {
            transform: translateY(0);
        }
    </style>
</head>
<body class="min-vh-100 d-flex align-items-center justify-content-center p-3 p-md-4">

    <div class="bg-grid"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    <div class="auth-stage">
        <div class="row g-4 align-items-center">
            {{-- Kolom Kiri: Bento Overview (Bukan Split Kotak Biasa) --}}
            <div class="col-lg-6 d-none d-lg-block">
                <div class="anim-1 d-flex align-items-center gap-3 mb-4">
                    <div class="brand-emblem">K</div>
                    <div>
                        <div class="font-display fw-bold fs-4 lh-1 tracking-tight">KursusKu</div>
                        <div class="font-mono-code text-info mt-1" style="font-size: 0.72rem;">LEARNING MANAGEMENT PORTAL</div>
                    </div>
                </div>

                <h1 class="anim-2 font-display fw-bold mb-3" style="font-size: 2.35rem; line-height: 1.16; letter-spacing: -0.03em;">
                    Kelola Ekosistem <span style="background: linear-gradient(90deg, #60a5fa, #22d3ee); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Belajar Digital</span> dalam Satu Kendali.
                </h1>
                <p class="anim-2 text-secondary mb-4" style="font-size: 0.95rem; line-height: 1.65;">
                    Akses manajemen katalog kursus, pantau peserta terdaftar, dan perbarui profil akun Anda dengan keamanan sesi terenkripsi.
                </p>

                {{-- Bento Cards Grid --}}
                <div class="anim-3 row g-3 mb-4">
                    <div class="col-6">
                        <div class="bento-card p-3 h-100">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge rounded-2 bg-primary bg-opacity-25 text-info px-2 py-1">
                                    <i class="bi bi-shield-lock-fill"></i>
                                </span>
                                <span class="font-mono-code text-secondary" style="font-size: 0.68rem;">AUTH v2.0</span>
                            </div>
                            <div class="font-display fw-semibold small text-white">Proteksi Sesi</div>
                            <div class="text-secondary mt-1" style="font-size: 0.76rem;">Dukungan Remember Token &amp; Reset Password instan.</div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="bento-card p-3 h-100">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <span class="badge rounded-2 bg-info bg-opacity-25 text-info px-2 py-1">
                                    <i class="bi bi-lightning-charge-fill"></i>
                                </span>
                                <span class="font-mono-code text-secondary" style="font-size: 0.68rem;">AJAX LIVE</span>
                            </div>
                            <div class="font-display fw-semibold small text-white">Katalog Real-Time</div>
                            <div class="text-secondary mt-1" style="font-size: 0.76rem;">Pencarian kursus &amp; filter status tanpa reload halaman.</div>
                        </div>
                    </div>
                </div>

                <div class="anim-4 bento-card px-3 py-2 d-inline-flex align-items-center gap-2">
                    <span class="status-dot"></span>
                    <span class="font-mono-code text-light" style="font-size: 0.74rem;">System Online &bull; Laravel 11 Engine</span>
                </div>
            </div>

            {{-- Kolom Kanan: Frosted Glass Login Form --}}
            <div class="col-lg-6">
                <div class="login-glass-panel p-4 p-sm-5 anim-2">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="d-flex align-items-center gap-2 d-lg-none">
                            <div class="brand-emblem" style="width: 36px; height: 36px; font-size: 1rem;">K</div>
                            <span class="font-display fw-bold fs-5">KursusKu</span>
                        </div>
                        <span class="font-mono-code badge rounded-pill px-3 py-2 ms-auto"
                              style="background: rgba(56, 189, 248, 0.12); color: #38bdf8; border: 1px solid rgba(56, 189, 248, 0.25); font-size: 0.7rem;">
                            MEMBER ACCESS
                        </span>
                    </div>

                    <div class="mb-4">
                        <h3 class="font-display fw-bold mb-1" style="letter-spacing: -0.02em;">Selamat Datang Kembali</h3>
                        <p class="text-secondary small mb-0">Masukkan kredensial akun untuk melanjutkan ke Profil Saya.</p>
                    </div>

                    @if(session('success'))
                        <div class="alert border-0 rounded-3 py-2 px-3 small d-flex align-items-center gap-2 mb-3"
                             style="background: rgba(16, 185, 129, 0.15); color: #6ee7b7; border: 1px solid rgba(16, 185, 129, 0.3) !important;">
                            <i class="bi bi-check-circle-fill"></i>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert border-0 rounded-3 py-2 px-3 small d-flex align-items-center gap-2 mb-3"
                             style="background: rgba(239, 68, 68, 0.15); color: #fca5a5; border: 1px solid rgba(239, 68, 68, 0.3) !important;">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            <span>{{ $errors->first() }}</span>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('login.post') }}" id="loginForm">
                        @csrf

                        {{-- Username / Email --}}
                        <div class="mb-3">
                            <label for="login" class="form-label small fw-medium text-light">Username atau Email</label>
                            <div class="position-relative input-wrapper">
                                <i class="bi bi-person-badge field-icon"></i>
                                <input type="text" id="login" name="login" value="{{ old('login') }}"
                                       class="form-control input-dark @error('login') is-invalid @enderror"
                                       placeholder="Kukuh Prasetya atau kukuh@kursusku.test" required autofocus>
                            </div>
                        </div>

                        {{-- Password + Fitur Hiding Password --}}
                        <div class="mb-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <label for="password" class="form-label small fw-medium text-light">Password</label>
                                <span id="capsWarning" class="font-mono-code text-warning d-none" style="font-size: 0.7rem;">
                                    <i class="bi bi-capslock-fill"></i> CAPS LOCK ON
                                </span>
                            </div>
                            <div class="position-relative input-wrapper">
                                <i class="bi bi-key field-icon"></i>
                                <input type="password" id="password" name="password"
                                       class="form-control input-dark pe-5 @error('password') is-invalid @enderror"
                                       placeholder="Masukkan kata sandi" required>
                                <button type="button" class="eye-toggle-btn" id="togglePassword" title="Tampilkan / Sembunyikan Password">
                                    <i class="bi bi-eye" id="toggleIcon"></i>
                                </button>
                            </div>
                        </div>

                        {{-- Remember Password & Forgot Password --}}
                        <div class="d-flex justify-content-between align-items-center my-3 pt-1">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label small text-secondary" for="remember">
                                    Remember password
                                </label>
                            </div>
                            <a href="{{ route('password.request') }}" class="small text-info text-decoration-none fw-semibold">
                                Forgot password?
                            </a>
                        </div>

                        <button type="submit" class="btn btn-glow-primary w-100 mt-2 d-flex align-items-center justify-content-center gap-2" id="submitBtn">
                            <span id="btnText">Masuk ke Dashboard</span>
                            <i class="bi bi-arrow-right-short fs-5" id="btnArrow"></i>
                        </button>
                    </form>

                    <div class="d-flex justify-content-between align-items-center mt-4 pt-3 border-top border-secondary border-opacity-25 small">
                        <a href="{{ route('courses.index') }}" class="text-secondary text-decoration-none">
                            <i class="bi bi-grid-1x2 me-1"></i> Lihat Katalog
                        </a>
                        <span class="font-mono-code text-secondary" style="font-size: 0.72rem;">&copy; 2026 KursusKu</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('toggleIcon');
        const capsWarning = document.getElementById('capsWarning');

        togglePassword.addEventListener('click', function () {
            const isHidden = passwordInput.type === 'password';
            passwordInput.type = isHidden ? 'text' : 'password';
            toggleIcon.className = isHidden ? 'bi bi-eye-slash text-info' : 'bi bi-eye';
        });

        passwordInput.addEventListener('keyup', function (e) {
            if (e.getModifierState && e.getModifierState('CapsLock')) {
                capsWarning.classList.remove('d-none');
            } else {
                capsWarning.classList.add('d-none');
            }
        });

        document.getElementById('loginForm').addEventListener('submit', function () {
            const btn = document.getElementById('submitBtn');
            document.getElementById('btnText').textContent = 'Memverifikasi...';
            document.getElementById('btnArrow').className = 'spinner-border spinner-border-sm';
            btn.disabled = true;
        });
    </script>
</body>
</html>