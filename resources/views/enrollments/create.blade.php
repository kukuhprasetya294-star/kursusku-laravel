@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card card-custom p-4 p-md-5">
                <h3 class="fw-bold mb-1" style="color: #0f172a;">Pendaftaran Kursus</h3>
                <p class="text-muted small mb-4">Pilih kursus. Jumlah kursi akan dicek tanpa reload halaman.</p>

                <form action="{{ route('enrollments.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-uppercase text-secondary" style="letter-spacing: 0.05em;">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" placeholder="Masukkan nama kamu" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-uppercase text-secondary" style="letter-spacing: 0.05em;">Alamat Email</label>
                        <input type="email" name="email" class="form-control" placeholder="nama@email.com" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-uppercase text-secondary" style="letter-spacing: 0.05em;">Pilih Kursus</label>
                        <select name="course" id="courseSelect" class="form-select" required>
                            <option value="">-- pilih kursus --</option>
                            <option value="PHP Dasar">PHP Dasar</option>
                            <option value="Web Dasar">Web Dasar</option>
                            <option value="Laravel Dasar">Laravel Dasar</option>
                        </select>
                    </div>

                    <div id="seatStatus" class="alert py-2-5 px-3 mb-4 small border-0 rounded-3 text-secondary" style="background-color: #f1f5f9;">
                        Pilih kursus untuk melihat sisa kursi.
                    </div>

                    <button type="submit" class="btn btn-custom-primary text-white w-100 py-2-5">
                        Kirim Pendaftaran
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection