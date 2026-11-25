@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1" style="color: #0f172a;">Daftar Kursus</h3>
            <p class="text-muted small mb-0">Kelola dan lihat seluruh daftar kursus yang tersedia.</p>
        </div>
        <a href="{{ route('courses.create') }}" class="btn btn-primary text-white px-3 py-2">
            + Tambah Kursus
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success border-0 shadow-sm rounded-3 mb-4 d-flex align-items-center justify-content-between">
            <div>{{ session('success') }}</div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Ringkasan Data (Milestone 13) --}}
    @isset($stats)
    <div class="row g-3 mb-3">
        <div class="col-6 col-md-3">
            <div class="card shadow-sm border-0 p-3">
                <div class="text-muted small">Total Kursus</div>
                <div class="fs-4 fw-bold" style="color: #0f172a;">{{ $stats['total_courses'] }}</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card shadow-sm border-0 p-3">
                <div class="text-muted small">Kursus Open</div>
                <div class="fs-4 fw-bold text-success">{{ $stats['open_courses'] }}</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card shadow-sm border-0 p-3">
                <div class="text-muted small">Total Peserta</div>
                <div class="fs-4 fw-bold text-primary">{{ $stats['total_participants'] }}</div>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="card shadow-sm border-0 p-3">
                <div class="text-muted small">Total Pendaftaran</div>
                <div class="fs-4 fw-bold text-dark">{{ $stats['total_enrollments'] }}</div>
            </div>
        </div>
    </div>
    @endisset

    {{-- Form Search & Filter Status (Method GET sebagai Fallback Non-JS) --}}
    <div class="card shadow-sm border-0 p-3 mb-3">
        <form method="GET" action="{{ route('courses.index') }}" class="row g-2 align-items-center">
            <div class="col-md-6">
                <input id="live-search" type="search" name="q" value="{{ $search ?? '' }}" class="form-control" placeholder="Cari kode atau nama kursus...">
            </div>
            <div class="col-md-3">
                <select id="status-filter" name="status" class="form-select">
                    <option value="">Semua Status</option>
                    <option value="open" @selected(($status ?? '') === 'open')>Open</option>
                    <option value="closed" @selected(($status ?? '') === 'closed')>Closed</option>
                    <option value="draft" @selected(($status ?? '') === 'draft')>Draft</option>
                </select>
            </div>
            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-primary w-50">Cari</button>
                <a href="{{ route('courses.index') }}" class="btn btn-outline-secondary w-50">Reset</a>
            </div>
        </form>
    </div>

    {{-- Partial Hasil Tabel & Pagination --}}
    @include('courses._results')
</div>

{{-- Progressive Enhancement: jQuery Ajax Live Search & Pagination --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    let searchTimer;

    function loadCourses(url = '{{ route('courses.index') }}') {
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
@endsection