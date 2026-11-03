<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KursusController extends Controller
{
    public function index()
    {
        $namaSitus = 'KursusKu';
        $slogan    = 'Belajar, daftar, dan kelola kursus dalam satu tempat.';
        $tahun     = date('Y');

        $daftarKursus = [
            ['kode' => 'WEB-01', 'nama' => 'HTML & CSS Dasar', 'biaya' => 200000, 'kuota' => 30, 'pendaftar' => 12, 'tanggal_mulai' => '2026-09-21'],
            ['kode' => 'PHP-01', 'nama' => 'PHP Pemula',       'biaya' => 250000, 'kuota' => 30, 'pendaftar' => 18, 'tanggal_mulai' => '2026-09-22'],
            ['kode' => 'LAR-01', 'nama' => 'Framework Laravel',  'biaya' => 350000, 'kuota' => 25, 'pendaftar' => 25, 'tanggal_mulai' => '2026-09-28'],
        ];

        return view('beranda', compact('namaSitus', 'slogan', 'tahun', 'daftarKursus'));
    }

    public function pendaftaran(Request $request)
    {
        $namaSitus = 'KursusKu';
        $tahun     = date('Y');
        $kursusTerpilih = $request->query('course', '');

        $daftarKursus = [
            'WEB-01' => 'WEB-01 - HTML & CSS Dasar',
            'PHP-01' => 'PHP-01 - PHP Pemula',
            'LAR-01' => 'LAR-01 - Framework Laravel',
        ];

        return view('pendaftaran', compact('namaSitus', 'tahun', 'kursusTerpilih', 'daftarKursus'));
    }
}