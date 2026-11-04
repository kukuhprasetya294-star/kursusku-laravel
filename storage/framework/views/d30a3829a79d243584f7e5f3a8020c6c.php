

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <?php if(session('success')): ?>
        <div class="alert alert-success border-0 shadow-sm rounded-3 mb-4 d-flex align-items-center justify-content-between">
            <div><?php echo e(session('success')); ?></div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <h1 class="h3 mb-1 fw-bold" style="color: #0f172a;">Detail Kursus</h1>
            <p class="text-muted mb-0"><span class="badge bg-light text-dark border font-monospace me-1"><?php echo e($course->code); ?></span> <?php echo e($course->name); ?></p>
        </div>
        <div class="d-flex gap-2">
            <a href="<?php echo e(route('courses.index')); ?>" class="btn btn-outline-secondary">Kembali</a>
            <a href="<?php echo e(route('courses.edit', $course)); ?>" class="btn btn-primary">Edit</a>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body p-4">
            <dl class="row mb-0">
                <dt class="col-sm-3 text-secondary">Kode</dt>
                <dd class="col-sm-9 fw-bold font-monospace"><?php echo e($course->code); ?></dd>

                <dt class="col-sm-3 text-secondary">Nama Kursus</dt>
                <dd class="col-sm-9 fw-bold"><?php echo e($course->name); ?></dd>

                <dt class="col-sm-3 text-secondary">Deskripsi</dt>
                <dd class="col-sm-9"><?php echo e($course->description ?: '-'); ?></dd>

                <dt class="col-sm-3 text-secondary">Biaya</dt>
                <dd class="col-sm-9 fw-bold text-success">Rp <?php echo e(number_format($course->fee, 0, ',', '.')); ?></dd>

                <dt class="col-sm-3 text-secondary">Kuota</dt>
                <dd class="col-sm-9"><?php echo e($course->quota); ?> peserta</dd>

                <dt class="col-sm-3 text-secondary">Tanggal Mulai</dt>
                <dd class="col-sm-9"><?php echo e($course->start_date?->format('d-m-Y')); ?></dd>

                <dt class="col-sm-3 text-secondary">Status</dt>
                <dd class="col-sm-9">
                    <?php if($course->status === 'open'): ?>
                        <span class="badge bg-success">Open</span>
                    <?php elseif($course->status === 'draft'): ?>
                        <span class="badge bg-secondary">Draft</span>
                    <?php else: ?>
                        <span class="badge bg-danger">Closed</span>
                    <?php endif; ?>
                </dd>
            </dl>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kursusku-laravel\resources\views/courses/show.blade.php ENDPATH**/ ?>