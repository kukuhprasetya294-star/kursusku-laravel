

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1" style="color: #0f172a;">Daftar Kursus</h3>
            <p class="text-muted small mb-0">Kelola dan lihat seluruh daftar kursus yang tersedia.</p>
        </div>
        <a href="<?php echo e(route('courses.create')); ?>" class="btn btn-custom-primary text-white px-3 py-2">
            + Tambah Kursus
        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success border-0 shadow-sm rounded-3 mb-4" style="background-color: #ecfdf5; color: #065f46;">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="card card-custom overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="py-3 px-4">#</th>
                        <th class="py-3">Judul Kursus</th>
                        <th class="py-3">Deskripsi</th>
                        <th class="py-3">Kuota</th>
                        <th class="py-3">Tanggal Mulai</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="px-4 fw-semibold"><?php echo e($index + 1); ?></td>
                            <td class="fw-bold" style="color: #0f172a;"><?php echo e($course->title); ?></td>
                            <td class="text-secondary small"><?php echo e(Str::limit($course->description, 50)); ?></td>
                            <td><span class="badge bg-primary rounded-pill px-3 py-2"><?php echo e($course->quota); ?> Kursi</span></td>
                            <td><?php echo e($course->start_date ? $course->start_date->format('d M Y') : '-'); ?></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="text-center py-4 text-muted">Belum ada data kursus.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kursusku-laravel\resources\views/courses/index.blade.php ENDPATH**/ ?>