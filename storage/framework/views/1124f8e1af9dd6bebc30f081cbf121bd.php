

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <?php if(session('success')): ?>
        <div class="alert alert-success border-0 shadow-sm rounded-3 mb-4 d-flex align-items-center gap-2" style="background-color: #ecfdf5; color: #065f46;" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
            </svg>
            <div><?php echo e(session('success')); ?></div>
        </div>
    <?php endif; ?>

    <div class="row align-items-center my-5">
        <div class="col-lg-8">
            <span class="badge-pill d-inline-block mb-3">
                Kursus teknologi untuk mahasiswa
            </span>
            <h1 class="display-4 fw-bold mb-3" style="color: #0f172a; letter-spacing: -0.02em;">
                Belajar lebih terarah <br><span style="color: #2563eb;">bersama Kursusku</span>
            </h1>
            <p class="lead text-secondary mb-4" style="max-width: 580px;">
                Pilih kursus, cek ketersediaan kursi secara langsung, lalu isi formulir pendaftaran dengan mudah.
            </p>
            <a href="/enrollments/create" class="btn btn-custom-primary text-white btn-lg px-4 py-2-5 shadow-sm">
                Daftar Kursus Sekarang
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kursusku-laravel\resources\views/home.blade.php ENDPATH**/ ?>