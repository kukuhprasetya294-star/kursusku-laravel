

<?php $__env->startSection('content'); ?>
<style>
    @keyframes fadeUp {
        from { opacity: 0; transform: translateY(18px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes spinRing {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    .anim-section-1 { animation: fadeUp 0.5s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
    .anim-section-2 { opacity: 0; animation: fadeUp 0.5s cubic-bezier(0.16, 1, 0.3, 1) 0.1s forwards; }
    .anim-section-3 { opacity: 0; animation: fadeUp 0.5s cubic-bezier(0.16, 1, 0.3, 1) 0.2s forwards; }

    .hero-midnight-banner {
        background: linear-gradient(135deg, #090d16 0%, #0f172a 55%, #1e3a8a 100%);
        border: 1px solid rgba(56, 189, 248, 0.2);
        border-radius: 24px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 22px 45px -15px rgba(15, 23, 42, 0.35);
    }
    .hero-midnight-banner::after {
        content: '';
        position: absolute;
        width: 280px;
        height: 280px;
        border-radius: 50%;
        background: radial-gradient(circle, rgba(6, 182, 212, 0.24) 0%, transparent 70%);
        top: -90px;
        right: -50px;
        pointer-events: none;
    }

    .avatar-ring-wrap {
        position: relative;
        width: 86px;
        height: 86px;
        border-radius: 50%;
        padding: 3px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }
    .avatar-ring-spin {
        position: absolute;
        inset: 0;
        border-radius: 50%;
        background: conic-gradient(from 0deg, #3b82f6, #06b6d4, #38bdf8, #3b82f6);
        animation: spinRing 6s linear infinite;
    }
    .avatar-inner {
        position: relative;
        z-index: 1;
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background: #0f172a;
        color: #ffffff;
        font-family: 'Space Grotesk', sans-serif;
        font-weight: 700;
        font-size: 2rem;
        display: flex;
        align-items: center;
        justify-content: center;
        border: 3px solid #090d16;
    }

    .kpi-bento {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 20px;
        padding: 1.2rem;
        transition: all 0.22s ease;
        box-shadow: 0 4px 16px -6px rgba(15, 23, 42, 0.06);
    }
    .kpi-bento:hover {
        transform: translateY(-4px);
        border-color: #93c5fd;
        box-shadow: 0 16px 30px -10px rgba(37, 99, 235, 0.16);
    }
    .kpi-icon-box {
        width: 46px;
        height: 46px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.25rem;
    }

    .panel-elevated {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 22px;
        box-shadow: 0 10px 30px -10px rgba(15, 23, 42, 0.06);
    }
    .input-clean {
        border-radius: 12px;
        border: 1px solid #cbd5e1;
        padding: 0.7rem 0.95rem;
        font-size: 0.92rem;
        background: #f8fafc;
        transition: all 0.2s ease;
    }
    .input-clean:focus {
        background: #ffffff;
        border-color: #2563eb;
        box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.12);
    }
    .btn-save-modern {
        background: linear-gradient(135deg, #2563eb 0%, #0284c7 100%);
        border: none;
        border-radius: 12px;
        padding: 0.75rem 1.5rem;
        font-weight: 600;
        color: #ffffff;
        box-shadow: 0 10px 20px -6px rgba(37, 99, 235, 0.45);
        transition: all 0.2s ease;
    }
    .btn-save-modern:hover {
        transform: translateY(-1px);
        box-shadow: 0 14px 26px -6px rgba(2, 132, 199, 0.55);
        color: #ffffff;
    }
</style>

<div class="container py-4">
    
    <?php if(session('success')): ?>
        <div class="alert border-0 rounded-4 shadow-sm mb-4 px-4 py-3 d-flex align-items-center justify-content-between anim-section-1"
             style="background: #064e3b; color: #ecfdf5;">
            <div class="d-flex align-items-center gap-2 small fw-medium">
                <i class="bi bi-check-circle-fill fs-5 text-info"></i>
                <span><?php echo e(session('success')); ?></span>
            </div>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="alert border-0 rounded-4 shadow-sm mb-4 px-4 py-3 small anim-section-1"
             style="background: #7f1d1d; color: #fef2f2;">
            <ul class="mb-0 ps-3">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    
    <div class="hero-midnight-banner p-4 p-md-5 text-white mb-4 anim-section-1">
        <div class="d-flex flex-column flex-lg-row align-items-lg-center justify-content-between gap-4 position-relative" style="z-index: 1;">
            <div class="d-flex flex-column flex-sm-row align-items-sm-center gap-4">
                <div class="avatar-ring-wrap">
                    <div class="avatar-ring-spin"></div>
                    <div class="avatar-inner">
                        <?php echo e(strtoupper(substr($user->name, 0, 1))); ?>

                    </div>
                </div>

                <div>
                    <div class="d-flex flex-wrap align-items-center gap-2 mb-2">
                        <span class="font-mono-code badge rounded-pill px-3 py-1"
                              style="background: rgba(56, 189, 248, 0.16); color: #38bdf8; border: 1px solid rgba(56, 189, 248, 0.3); font-size: 0.7rem;">
                            MY PROFILE &bull; VERIFIED ADMIN
                        </span>
                        <span class="font-mono-code text-success small">
                            <i class="bi bi-circle-fill me-1" style="font-size: 0.5rem;"></i>ONLINE
                        </span>
                    </div>
                    <h2 class="font-display fw-bold mb-1" style="letter-spacing: -0.02em;"><?php echo e($user->name); ?></h2>
                    <p class="text-secondary small mb-0 font-mono-code">
                        <i class="bi bi-envelope text-info me-1"></i> <?php echo e($user->email); ?>

                    </p>
                </div>
            </div>

            <div class="d-flex flex-wrap gap-2">
                <a href="<?php echo e(route('courses.index')); ?>" class="btn btn-light rounded-3 px-3 py-2 fw-semibold small">
                    <i class="bi bi-journal-code text-primary me-1"></i> Kelola Kursus
                </a>
                <form method="POST" action="<?php echo e(route('logout')); ?>">
                    <?php echo csrf_field(); ?>
                    <button type="submit" class="btn btn-outline-danger rounded-3 px-3 py-2 fw-semibold small text-white border-danger">
                        <i class="bi bi-box-arrow-right me-1"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    
    <?php if(isset($stats)): ?>
    <div class="row g-3 mb-4 anim-section-2">
        <div class="col-6 col-lg-3">
            <div class="kpi-bento h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Total Kursus</span>
                    <div class="kpi-icon-box" style="background: #eff6ff; color: #2563eb;">
                        <i class="bi bi-journal-bookmark-fill"></i>
                    </div>
                </div>
                <div class="font-display fs-3 fw-bold text-dark"><?php echo e($stats['total_courses']); ?></div>
                <div class="font-mono-code text-primary mt-1" style="font-size: 0.7rem;">KATALOG AKTIF</div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="kpi-bento h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Kursus Open</span>
                    <div class="kpi-icon-box" style="background: #ecfdf5; color: #059669;">
                        <i class="bi bi-broadcast"></i>
                    </div>
                </div>
                <div class="font-display fs-3 fw-bold text-success"><?php echo e($stats['open_courses']); ?></div>
                <div class="font-mono-code text-success mt-1" style="font-size: 0.7rem;">SIAP DIDAFTAR</div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="kpi-bento h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Total Peserta</span>
                    <div class="kpi-icon-box" style="background: #f0f9ff; color: #0284c7;">
                        <i class="bi bi-people-fill"></i>
                    </div>
                </div>
                <div class="font-display fs-3 fw-bold text-dark"><?php echo e($stats['total_participants']); ?></div>
                <div class="font-mono-code text-info mt-1" style="font-size: 0.7rem;">TERREGISTRASI</div>
            </div>
        </div>
        <div class="col-6 col-lg-3">
            <div class="kpi-bento h-100">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <span class="text-muted small fw-medium">Pendaftaran</span>
                    <div class="kpi-icon-box" style="background: #fefce8; color: #ca8a04;">
                        <i class="bi bi-clipboard2-check-fill"></i>
                    </div>
                </div>
                <div class="font-display fs-3 fw-bold text-dark"><?php echo e($stats['total_enrollments']); ?></div>
                <div class="font-mono-code text-warning mt-1" style="font-size: 0.7rem;">TRANSAKSI MASUK</div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    
    <div class="row g-4 anim-section-3">
        <div class="col-lg-4">
            <div class="panel-elevated p-4 h-100">
                <div class="d-flex align-items-center gap-2 pb-3 mb-3 border-bottom">
                    <span class="badge rounded-3 bg-primary bg-opacity-10 text-primary p-2">
                        <i class="bi bi-person-vcard-fill fs-6"></i>
                    </span>
                    <div>
                        <h6 class="font-display fw-bold mb-0">Identitas Akun</h6>
                        <div class="text-muted" style="font-size: 0.75rem;">Ringkasan kredensial aktif</div>
                    </div>
                </div>

                <div class="small">
                    <div class="py-2 border-bottom">
                        <div class="font-mono-code text-muted" style="font-size: 0.7rem;">NAMA PENGGUNA</div>
                        <div class="fw-semibold text-dark mt-1"><?php echo e($user->name); ?></div>
                    </div>
                    <div class="py-2 border-bottom">
                        <div class="font-mono-code text-muted" style="font-size: 0.7rem;">EMAIL TERDAFTAR</div>
                        <div class="fw-semibold text-dark mt-1"><?php echo e($user->email); ?></div>
                    </div>
                    <div class="py-2 border-bottom">
                        <div class="font-mono-code text-muted" style="font-size: 0.7rem;">HAK AKSES</div>
                        <div class="mt-1">
                            <span class="badge rounded-pill bg-dark text-info font-mono-code px-3 py-1" style="font-size: 0.72rem;">
                                Administrator Sistem
                            </span>
                        </div>
                    </div>
                    <div class="py-2">
                        <div class="font-mono-code text-muted" style="font-size: 0.7rem;">BERGABUNG SEJAK</div>
                        <div class="fw-semibold text-dark mt-1"><?php echo e($user->created_at ? $user->created_at->format('d F Y') : '-'); ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="panel-elevated p-4 h-100">
                <div class="d-flex align-items-center gap-2 pb-3 mb-4 border-bottom">
                    <span class="badge rounded-3 bg-primary bg-opacity-10 text-primary p-2">
                        <i class="bi bi-sliders2 fs-6"></i>
                    </span>
                    <div>
                        <h6 class="font-display fw-bold mb-0">Pengaturan Profil &amp; Keamanan</h6>
                        <div class="text-muted" style="font-size: 0.75rem;">Perbarui data diri atau ganti kata sandi akun</div>
                    </div>
                </div>

                <form method="POST" action="<?php echo e(route('profile.update')); ?>">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('PUT'); ?>

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="name" class="form-label fw-semibold small text-secondary">Nama Lengkap / Username</label>
                            <input type="text" id="name" name="name" value="<?php echo e(old('name', $user->name)); ?>"
                                   class="form-control input-clean" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label fw-semibold small text-secondary">Alamat Email</label>
                            <input type="email" id="email" name="email" value="<?php echo e(old('email', $user->email)); ?>"
                                   class="form-control input-clean" required>
                        </div>
                    </div>

                    <div class="p-3 p-sm-4 rounded-4 mb-4" style="background: #f8fafc; border: 1px solid #e2e8f0;">
                        <div class="d-flex align-items-center justify-content-between mb-1">
                            <span class="font-display fw-bold small text-dark">
                                <i class="bi bi-shield-lock-fill text-primary me-1"></i> Ubah Kata Sandi (Opsional)
                            </span>
                            <span class="font-mono-code text-muted" style="font-size: 0.68rem;">MIN. 6 KARAKTER</span>
                        </div>
                        <p class="text-muted mb-3" style="font-size: 0.78rem;">
                            Kosongkan kolom di bawah jika tidak ingin mengubah kata sandi saat ini.
                        </p>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="profilePass" class="form-label fw-semibold small text-secondary">Password Baru</label>
                                <div class="input-group">
                                    <input type="password" id="profilePass" name="password"
                                           class="form-control input-clean rounded-end-0 bg-white" placeholder="Masukkan password baru">
                                    <button type="button" class="btn btn-outline-secondary rounded-end-3 toggle-prof-pass" data-target="profilePass">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="profilePassConfirm" class="form-label fw-semibold small text-secondary">Konfirmasi Password Baru</label>
                                <div class="input-group">
                                    <input type="password" id="profilePassConfirm" name="password_confirmation"
                                           class="form-control input-clean rounded-end-0 bg-white" placeholder="Ulangi password baru">
                                    <button type="button" class="btn btn-outline-secondary rounded-end-3 toggle-prof-pass" data-target="profilePassConfirm">
                                        <i class="bi bi-eye"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-save-modern">
                            <i class="bi bi-check2-circle me-1"></i> Simpan Perubahan Profil
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.toggle-prof-pass').forEach(btn => {
        btn.addEventListener('click', function () {
            const input = document.getElementById(this.dataset.target);
            const icon = this.querySelector('i');
            const isHidden = input.type === 'password';
            input.type = isHidden ? 'text' : 'password';
            icon.className = isHidden ? 'bi bi-eye-slash text-primary' : 'bi bi-eye';
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kursusku-laravel\resources\views/profile/index.blade.php ENDPATH**/ ?>