@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-7">
            <div class="card shadow-sm border-0 p-4 p-md-5">
                <h3 class="fw-bold mb-1" style="color: #0f172a;">Tambah Kursus Baru</h3>
                <p class="text-muted small mb-4">Isi formulir di bawah ini untuk menambahkan data kursus ke sistem.</p>

                <form action="{{ route('courses.store') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="code" class="form-label fw-semibold small text-uppercase text-secondary">Kode Kursus</label>
                            <input type="text" id="code" name="code" class="form-control @error('code') is-invalid @enderror" value="{{ old('code') }}" placeholder="Contoh: WEB-001">
                            @error('code') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label fw-semibold small text-uppercase text-secondary">Nama Kursus</label>
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Contoh: Pemrograman Laravel 11">
                            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label fw-semibold small text-uppercase text-secondary">Deskripsi</label>
                        <textarea id="description" name="description" rows="3" class="form-control @error('description') is-invalid @enderror" placeholder="Deskripsi singkat mengenai materi kursus">{{ old('description') }}</textarea>
                        @error('description') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="fee" class="form-label fw-semibold small text-uppercase text-secondary">Biaya (Rp)</label>
                            <input type="number" id="fee" name="fee" min="0" class="form-control @error('fee') is-invalid @enderror" value="{{ old('fee', 0) }}">
                            @error('fee') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="quota" class="form-label fw-semibold small text-uppercase text-secondary">Kuota (1 - 500)</label>
                            <input type="number" id="quota" name="quota" min="1" max="500" class="form-control @error('quota') is-invalid @enderror" value="{{ old('quota') }}" placeholder="Contoh: 20">
                            @error('quota') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="start_date" class="form-label fw-semibold small text-uppercase text-secondary">Tanggal Mulai</label>
                            <input type="date" id="start_date" name="start_date" class="form-control @error('start_date') is-invalid @enderror" value="{{ old('start_date') }}">
                            @error('start_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="status" class="form-label fw-semibold small text-uppercase text-secondary">Status</label>
                            <select id="status" name="status" class="form-select @error('status') is-invalid @enderror">
                                @foreach(['draft' => 'Draft', 'open' => 'Open', 'closed' => 'Closed'] as $val => $label)
                                    <option value="{{ $val }}" @selected(old('status', 'open') === $val)>{{ $label }}</option>
                                @endforeach
                            </select>
                            @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="d-flex gap-2 mt-4">
                        <a href="{{ route('courses.index') }}" class="btn btn-light text-secondary w-50 py-2 fw-semibold">Batal</a>
                        <button type="submit" class="btn btn-primary text-white w-50 py-2">Simpan Kursus</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection