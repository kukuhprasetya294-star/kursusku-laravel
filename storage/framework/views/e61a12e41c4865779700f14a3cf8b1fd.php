

<?php $__env->startSection('content'); ?>
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1" style="color: #0f172a;">Daftar Kursus</h3>
            <p class="text-muted small mb-0">Kelola dan lihat seluruh daftar kursus yang tersedia.</p>
        </div>
        <a href="<?php echo e(route('courses.create')); ?>" class="btn btn-primary text-white px-3 py-2">
            + Tambah Kursus
        </a>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success border-0 shadow-sm rounded-3 mb-4 d-flex align-items-center justify-content-between">
            <div><?php echo e(session('success')); ?></div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    
    <?php if(isset($stats)): ?>
    <div class="row g-3 mb-3">
        <div class="col-6 col-md-3">
            <div class="card shadow-sm border-0 p-3">
                <div class="text-muted small">Total Kursus</div>
                <div class="fs-4 fw-bold" style="color: #0f172a;"><?php echo e($stats['total_courses']); ?></div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card shadow-sm border-0 p-3">
                <div class="text-muted small">Kursus Open</div>
                <div class="fs-4 fw-bold text-success"><?php echo e($stats['open_courses']); ?></div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card shadow-sm border-0 p-3">
                <div class="text-muted small">Total Peserta</div>
                <div class="fs-4 fw-bold text-primary"><?php echo e($stats['total_participants']); ?></div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card shadow-sm border-0 p-3">
                <div class="text-muted small">Total Pendaftaran</div>
                <div class="fs-4 fw-bold text-dark"><?php echo e($stats['total_enrollments']); ?></div>
            </div>
        </div>
    </div>
    <?php endif; ?>

    
    <div class="card shadow-sm border-0 p-3 mb-3">
        <form method="GET" action="<?php echo e(route('courses.index')); ?>" class="row g-2 align-items-center">
            <div class="col-md-6">
                <input id="live-search" type="search" name="q" value="<?php echo e($search ?? ''); ?>" class="form-control" placeholder="Cari kode atau nama kursus...">
            </div>
            <div class="col-md-3">
                <select id="status-filter" name="status" class="form-select">
                    <option value="">Semua Status</option>
                    <option value="open" <?php if(($status ?? '') === 'open'): echo 'selected'; endif; ?>>Open</option>
                    <option value="closed" <?php if(($status ?? '') === 'closed'): echo 'selected'; endif; ?>>Closed</option>
                    <option value="draft" <?php if(($status ?? '') === 'draft'): echo 'selected'; endif; ?>>Draft</option>
                </select>
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-primary w-50">Cari</button>
                <a href="<?php echo e(route('courses.index')); ?>" class="btn btn-outline-secondary w-50">Reset</a>
            </div>
        </form>
    </div>

    
    <?php echo $__env->make('courses._results', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
</div>


<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    let searchTimer;

    function loadCourses(url = '<?php echo e(route('courses.index')); ?>') {
        const q = $('#live-search').val();
        const status = $('#status-filter').val();

        $.get(url, { q, status, partial: 1 })
            .done(function (html) {
                $('#course-results').replaceWith(html);
            })
            .fail(function () {
                console.error('Gagal memuat hasil course.');
            });
    }

    $(document).on('input', '#live-search', function () {
        clearTimeout(searchTimer);
        searchTimer = setTimeout(function () {
            loadCourses();
        }, 300);
    });

    $(document).on('change', '#status-filter', function () {
        loadCourses();
    });

    $(document).on('click', '#course-results .pagination a', function (e) {
        e.preventDefault();
        const url = $(this).attr('href');
        loadCourses(url);
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kursusku-laravel\resources\views/courses/index.blade.php ENDPATH**/ ?>