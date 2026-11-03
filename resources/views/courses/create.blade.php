@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            <div class="card card-custom p-4 p-md-5">
                <h3 class="fw-bold mb-1" style="color: #0f172a;">Tambah Kursus Baru</h3>
                <p class="text-muted small mb-4">Isi formulir di bawah ini untuk menambahkan data kursus ke sistem.</p>

                <form action="{{ route('courses.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-uppercase text-secondary">Judul Kursus</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Contoh: Pemrograman Laravel 11">
                        @error('title') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold small text-uppercase text-secondary">Deskripsi</label>
                        <textarea name="description" rows="3" class="form-control @error('description') is-invalid @enderror" placeholder="Deskripsi singkat mengenai materi kursus">{{ old('description') }}</textarea>
                        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold small text-uppercase text-secondary">Kuota Kursi</label>
                            <input type="number" name="quota" class="form-control @error('quota') is-invalid @enderror" value="{{ old('quota') }}" placeholder="Contoh: 20">
                            @error('quota') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label fw-semibold small text-uppercase text-secondary">Tanggal Mulai</label>
                            <input type="date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}">
                            @error('start_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="d-flex gap-2 mt-3">
                        <a href="{{ route('courses.index') }}" class="btn btn-light text-secondary w-50 py-2-5 fw-semibold">Batal</a>
                        <button type="submit" class="btn btn-custom-primary text-white w-50 py-2-5">Simpan Kursus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection