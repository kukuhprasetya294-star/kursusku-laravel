<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($title ?? 'Kursusku'); ?></title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>

    <style>
        body {
            font-family: 'Inter', system-ui, -apple-system, sans-serif;
            background-color: #f8fafc;
            color: #334155;
        }
        .navbar-custom {
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 100%);
            box-shadow: 0 4px 20px -5px rgba(15, 23, 42, 0.15);
        }
        .card-custom {
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05), 0 8px 10px -6px rgba(0, 0, 0, 0.01);
            background: #ffffff;
        }
        .btn-custom-primary {
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            border: none;
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.2s ease;
        }
        .btn-custom-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(37, 99, 235, 0.3);
        }
        .form-control, .form-select {
            border-radius: 10px;
            border: 1px solid #cbd5e1;
            padding: 0.625rem 0.875rem;
        }
        .form-control:focus, .form-select:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15);
        }
        .badge-pill {
            background-color: #eff6ff;
            color: #2563eb;
            font-weight: 600;
            border-radius: 9999px;
            padding: 0.5rem 1rem;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom py-3">
        <div class="container">
            <a class="navbar-brand fw-bold fs-4 d-flex align-items-center gap-2" href="/">
                <span style="color: #60a5fa;">●</span> Kursusku
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav gap-2">
                    <li class="nav-item">
                        <a class="nav-link px-3 <?php echo e(request()->is('/') ? 'active fw-bold' : ''); ?>" href="/">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 <?php echo e(request()->is('enrollments*') ? 'active fw-bold' : ''); ?>" href="/enrollments/create">Pendaftaran</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="py-5">
        <?php echo $__env->yieldContent('content'); ?>
    </main>

</body>
</html><?php /**PATH C:\laragon\www\kursusku-laravel\resources\views/layouts/app.blade.php ENDPATH**/ ?>