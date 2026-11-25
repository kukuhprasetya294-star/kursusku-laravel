<div id="course-results">
    <div class="card shadow-sm border-0 overflow-hidden">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="py-3 px-4">#</th>
                        <th class="py-3">Kode</th>
                        <th class="py-3">Nama Kursus</th>
                        <th class="py-3">Biaya</th>
                        <th class="py-3">Kuota</th>
                        <th class="py-3">Tanggal Mulai</th>
                        <th class="py-3">Status</th>
                        <th class="py-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td class="px-4 fw-semibold"><?php echo e($courses->firstItem() + $index); ?></td>
                            <td><span class="badge bg-light text-dark border font-monospace px-2 py-1"><?php echo e($course->code); ?></span></td>
                            <td class="fw-bold" style="color: #0f172a;"><?php echo e($course->name); ?></td>
                            <td>Rp <?php echo e(number_format($course->fee, 0, ',', '.')); ?></td>
                            <td><span class="badge bg-primary rounded-pill px-3 py-1"><?php echo e($course->quota); ?> peserta</span></td>
                            <td><?php echo e($course->start_date ? $course->start_date->format('d-m-Y') : '-'); ?></td>
                            <td>
                                <?php if($course->status === 'open'): ?>
                                    <span class="badge bg-success">Open</span>
                                <?php elseif($course->status === 'draft'): ?>
                                    <span class="badge bg-secondary">Draft</span>
                                <?php else: ?>
                                    <span class="badge bg-danger">Closed</span>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <div class="d-inline-flex gap-1">
                                    <a href="<?php echo e(route('courses.show', $course)); ?>" class="btn btn-sm btn-outline-primary">Detail</a>
                                    <a href="<?php echo e(route('courses.edit', $course)); ?>" class="btn btn-sm btn-outline-warning">Edit</a>
                                    <form method="POST" action="<?php echo e(route('courses.destroy', $course)); ?>" onsubmit="return confirm('Hapus kursus ini?')">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                        <button type="submit" class="btn btn-sm btn-outline-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="8" class="text-center py-4 text-muted">
                                Tidak ada kursus yang sesuai pencarian/filter.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        <?php echo e($courses->links('pagination::bootstrap-5')); ?>

    </div>
</div><?php /**PATH C:\laragon\www\kursusku-laravel\resources\views/courses/_results.blade.php ENDPATH**/ ?>