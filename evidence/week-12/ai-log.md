# AI Log — Pertemuan 12

- **Nama:** Kukuh Prasetya
- **NIM:** 2524233
- **Proyek:** Kursusku (Laravel)
- **Materi:** Relasi Database (`participants`, `courses`, `enrollments`)

## Penggunaan AI
AI digunakan sebatas referensi sintaks dan bantuan *troubleshooting* saat pengerjaan:
- Mengecek referensi sintaks *foreign key* (`cascadeOnDelete`) dan logika validasi anti-duplikat pada controller.
- *Troubleshooting* tampilan form dan tabel pendaftaran agar menyatu dengan *layout* Bootstrap 5 yang sudah ada di proyek.
- Memastikan skenario pengujian *cascade delete* antara tabel `courses` dan `enrollments`.

## Contoh Prompt
- *"Referensi sintaks Laravel untuk validasi agar peserta dan kursus yang sama tidak terinput dua kali."*
- *"Kenapa styling di halaman enrollments/create tidak terbaca padahal sudah memakai `@extends('layouts.app')`?"*

## Pengerjaan & Pengujian Mandiri
- Penyusunan migrasi, relasi model Eloquent, controller, dan penyesuaian label antarmuka dikerjakan serta diuji langsung di lokal (Laragon & HeidiSQL).
- Seluruh skenario pengujian (input normal, penolakan data duplikat, dan *cascade delete* saat kursus dihapus) berhasil dijalankan tanpa error.