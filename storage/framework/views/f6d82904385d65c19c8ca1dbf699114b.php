

<?php $__env->startSection('title', 'Pendaftaran Kursus'); ?>

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Formulir Pendaftaran Kursus</h4>
            </div>
            <div class="card-body">

                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('enrollments.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>

                    <div class="mb-3">
                        <label for="name" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name')); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Alamat Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="course_id" class="form-label">Pilih Kursus</label>
                        <select class="form-select" id="course_id" name="course_id" required>
                            <option value="" selected disabled>-- Pilih Kursus --</option>
                            <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($course['id']); ?>">
                                    <?php echo e($course['code']); ?> - <?php echo e($course['name']); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <button type="button" id="btn-check-seat" class="btn btn-outline-info btn-sm" disabled>
                            Cek Ketersediaan Kursi (Ajax)
                        </button>
                        <div id="seat-info" class="mt-2 text-muted fw-bold"></div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">Kirim Pendaftaran</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<script type="module">
    $(document).ready(function() {
        $('#course_id').on('change', function() {
            let courseId = $(this).val();
            if (courseId) {
                $('#btn-check-seat').prop('disabled', false);
                $('#seat-info').html('');
            }
        });

        $('#btn-check-seat').on('click', function() {
            let courseId = $('#course_id').val();
            if (!courseId) return;

            $('#seat-info').html('<span class="text-primary">Mengecek sisa kursi...</span>');

            $.ajax({
                url: "<?php echo e(route('enrollments.seats')); ?>",
                type: "GET",
                data: { course_id: courseId },
                success: function(response) {
                    if (response.available) {
                        $('#seat-info').html(
                            '<span class="text-success">Tersedia ' + response.seats + ' kursi untuk ' + response.course_name + '.</span>'
                        );
                    } else {
                        $('#seat-info').html(
                            '<span class="text-danger">Maaf, kursi untuk ' + response.course_name + ' sudah penuh!</span>'
                        );
                    }
                },
                error: function() {
                    $('#seat-info').html('<span class="text-danger">Gagal mengecek sisa kursi.</span>');
                }
            });
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kursusku-laravel\resources\views/pendaftaran.blade.php ENDPATH**/ ?>