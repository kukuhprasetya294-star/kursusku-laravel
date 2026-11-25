<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password — KursusKu</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@500;600&family=Plus+Jakarta+Sans:wght@400;500;600;700&family=Space+Grotesk:wght@600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #090d16;
            color: #f8fafc;
            overflow-x: hidden;
            position: relative;
        }
        .bg-grid {
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(to right, rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
            background-size: 42px 42px;
            mask-image: radial-gradient(ellipse at center, black 45%, transparent 85%);
            pointer-events: none;
        }
        .orb {
            position: fixed;
            width: 360px;
            height: 360px;
            border-radius: 50%;
            filter: blur(85px);
            opacity: 0.42;
            pointer-events: none;
            animation: floatOrb 12s ease-in-out infinite alternate;
        }
        .orb-1 { background: #2563eb; top: -80px; right: -60px; }
        .orb-2 { background: #06b6d4; bottom: -80px; left: -60px; animation-delay: -6s; }
        @keyframes floatOrb {
            0% { transform: translate(0, 0) scale(1); }
            100% { transform: translate(-30px, 25px) scale(1.1); }
        }
        @keyframes fadeUp {
            from { opacity: 0; transform: translateY(18px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .font-display { font-family: 'Space Grotesk', sans-serif; }
        .font-mono-code { font-family: 'JetBrains Mono', monospace; }

        .reset-glass-panel {
            position: relative;
            z-index: 1;
            max-width: 470px;
            width: 100%;
            background: rgba(15, 23, 42, 0.84);
            backdrop-filter: blur(22px);
            border: 1px solid rgba(148, 163, 184, 0.22);
            border-radius: 26px;
            box-shadow: 0 28px 60px -15px rgba(0, 0, 0, 0.65);
            overflow: hidden;
            animation: fadeUp 0.55s cubic-bezier(0.16, 1, 0.3, 1) forwards;
        }
        .reset-glass-panel::before {
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
        .input-dark::placeholder { color: #64748b; }
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
            z-index: 5;
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
        }
        .eye-toggle-btn:hover {
            background: rgba(56, 189, 248, 0.15);
            color: #38bdf8;
        }
        .strength-seg {
            height: 4px;
            border-radius: 99px;
            background: rgba(148, 163, 184, 0.2);
            transition: background 0.25s ease;
        }
        .btn-glow-primary {
            background: linear-gradient(135deg, #2563eb 0%, #0284c7 100%);
            border: 1px solid rgba(255, 255, 255, 0.18);
            border-radius: 13px;
            padding: 0.82rem 1.25rem;
            font-weight: 600;
            color: #ffffff;
            box-shadow: 0 10px 25px -5px rgba(37, 99, 235, 0.55);
            transition: all 0.2s ease;
        }
        .btn-glow-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 16px 32px -6px rgba(6, 182, 212, 0.6);
            color: #ffffff;
        }
    </style>
</head>
<body class="min-vh-100 d-flex align-items-center justify-content-center p-3">

    <div class="bg-grid"></div>
    <div class="orb orb-1"></div>
    <div class="orb orb-2"></div>

    <div class="reset-glass-panel p-4 p-sm-5">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div class="d-flex align-items-center gap-2">
                <div class="d-inline-flex align-items-center justify-content-center rounded-3 text-white fw-bold font-display"
                     style="width: 38px; height: 38px; background: linear-gradient(135deg, #3b82f6 0%, #06b6d4 100%);">
                    K
                </div>
                <span class="font-display fw-bold fs-5">KursusKu</span>
            </div>
            <span class="font-mono-code badge rounded-pill px-3 py-2"
                  style="background: rgba(56, 189, 248, 0.12); color: #38bdf8; border: 1px solid rgba(56, 189, 248, 0.25); font-size: 0.68rem;">
                PASSWORD RECOVERY
            </span>
        </div>

        <div class="mb-4">
            <h3 class="font-display fw-bold mb-1" style="letter-spacing: -0.02em;">Atur Ulang Password</h3>
            <p class="text-secondary small mb-0">Masukkan username atau email terdaftar beserta password baru Anda.</p>
        </div>

        <?php if($errors->any()): ?>
            <div class="alert border-0 rounded-3 py-2 px-3 small mb-3"
                 style="background: rgba(239, 68, 68, 0.15); color: #fca5a5; border: 1px solid rgba(239, 68, 68, 0.3) !important;">
                <ul class="mb-0 ps-3">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('password.update')); ?>">
            <?php echo csrf_field(); ?>

            <div class="mb-3">
                <label for="login" class="form-label small fw-medium text-light">Username atau Email Terdaftar</label>
                <div class="position-relative">
                    <i class="bi bi-person-check field-icon"></i>
                    <input type="text" id="login" name="login" value="<?php echo e(old('login')); ?>"
                           class="form-control input-dark"
                           placeholder="Kukuh Prasetya atau kukuh@kursusku.test" required autofocus>
                </div>
            </div>

            <div class="mb-3">
                <label for="newPassword" class="form-label small fw-medium text-light">Password Baru</label>
                <div class="position-relative">
                    <i class="bi bi-shield-lock field-icon"></i>
                    <input type="password" id="newPassword" name="password"
                           class="form-control input-dark pe-5"
                           placeholder="Minimal 6 karakter" required>
                    <button type="button" class="eye-toggle-btn toggle-pass" data-target="newPassword">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>

                
                <div class="row g-1 mt-2">
                    <div class="col-3"><div class="strength-seg" id="seg1"></div></div>
                    <div class="col-3"><div class="strength-seg" id="seg2"></div></div>
                    <div class="col-3"><div class="strength-seg" id="seg3"></div></div>
                    <div class="col-3"><div class="strength-seg" id="seg4"></div></div>
                </div>
                <div id="strengthLabel" class="font-mono-code text-secondary mt-1" style="font-size: 0.7rem;"></div>
            </div>

            <div class="mb-4">
                <label for="confirmPassword" class="form-label small fw-medium text-light">Konfirmasi Password Baru</label>
                <div class="position-relative">
                    <i class="bi bi-check2-circle field-icon"></i>
                    <input type="password" id="confirmPassword" name="password_confirmation"
                           class="form-control input-dark pe-5"
                           placeholder="Ulangi password baru" required>
                    <button type="button" class="eye-toggle-btn toggle-pass" data-target="confirmPassword">
                        <i class="bi bi-eye"></i>
                    </button>
                </div>
            </div>

            <button type="submit" class="btn btn-glow-primary w-100 mb-3">
                Simpan Password Baru <i class="bi bi-check2-all ms-1"></i>
            </button>
        </form>

        <div class="text-center pt-3 border-top border-secondary border-opacity-25">
            <a href="<?php echo e(route('login')); ?>" class="small text-info text-decoration-none fw-semibold">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Halaman Login
            </a>
        </div>
    </div>

    <script>
        document.querySelectorAll('.toggle-pass').forEach(btn => {
            btn.addEventListener('click', function () {
                const input = document.getElementById(this.dataset.target);
                const icon = this.querySelector('i');
                const isHidden = input.type === 'password';
                input.type = isHidden ? 'text' : 'password';
                icon.className = isHidden ? 'bi bi-eye-slash text-info' : 'bi bi-eye';
            });
        });

        const newPass = document.getElementById('newPassword');
        const segs = [document.getElementById('seg1'), document.getElementById('seg2'), document.getElementById('seg3'), document.getElementById('seg4')];
        const strengthLabel = document.getElementById('strengthLabel');

        newPass.addEventListener('input', function () {
            const val = this.value;
            let level = 0;
            if (val.length >= 6) level++;
            if (/[A-Z]/.test(val)) level++;
            if (/[0-9]/.test(val)) level++;
            if (val.length >= 10 || /[^A-Za-z0-9]/.test(val)) level++;

            const colors = ['', '#ef4444', '#f59e0b', '#38bdf8', '#10b981'];
            const texts = ['', 'KEAMANAN: LEMAH', 'KEAMANAN: CUKUP', 'KEAMANAN: KUAT', 'KEAMANAN: SANGAT KUAT'];

            segs.forEach((seg, idx) => {
                seg.style.background = idx < level ? colors[level] : 'rgba(148, 163, 184, 0.2)';
            });
            strengthLabel.textContent = val.length ? texts[level] : '';
            strengthLabel.style.color = val.length ? colors[level] : '#94a3b8';
        });
    </script>
</body>
</html><?php /**PATH C:\laragon\www\kursusku-laravel\resources\views/auth/forgot-password.blade.php ENDPATH**/ ?>