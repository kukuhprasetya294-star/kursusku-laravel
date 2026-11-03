<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ $namaSitus }} - Portal Belajar Pemrograman</title>
  
  <style>
    :root {
      --utama: #0f766e;
      --utama-gelap: #0d615b;
      --aksen: #2dd4bf;
      --latar: #f8fafc;
      --latar-kartu: #ffffff;
      --teks-utama: #0f172a;
      --teks-pudar: #64748b;
      --pembatas: #e2e8f0;
    }

    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
      scroll-behavior: smooth;
    }

    body {
      font-family: 'Segoe UI', Roboto, sans-serif;
      background-color: var(--latar);
      color: var(--teks-utama);
      line-height: 1.6;
    }

    header {
      position: sticky;
      top: 0;
      z-index: 100;
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid var(--pembatas);
      padding: 15px 0;
    }

    .wadah-navigasi {
      max-width: 1100px;
      margin: 0 auto;
      padding: 0 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .logo {
      font-size: 1.5rem;
      font-weight: 800;
      color: var(--utama);
      text-decoration: none;
    }

    nav a {
      margin-left: 20px;
      color: var(--teks-pudar);
      text-decoration: none;
      font-weight: 600;
      font-size: 0.95rem;
      transition: color 0.3s ease;
    }

    nav a:hover {
      color: var(--utama);
    }

    .spanduk-utama {
      max-width: 1100px;
      margin: 60px auto;
      padding: 0 20px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      gap: 40px;
    }

    .konten-spanduk {
      flex: 1;
    }

    .konten-spanduk h2 {
      font-size: 2.5rem;
      font-weight: 800;
      line-height: 1.2;
      margin-bottom: 15px;
    }

    .konten-spanduk h2 span {
      color: var(--utama);
    }

    .konten-spanduk p {
      font-size: 1.1rem;
      color: var(--teks-pudar);
      margin-bottom: 25px;
    }

    .tombol-utama {
      display: inline-block;
      padding: 12px 28px;
      background-color: var(--utama);
      color: white;
      text-decoration: none;
      border-radius: 8px;
      font-weight: 700;
      box-shadow: 0 4px 12px rgba(15, 118, 110, 0.25);
    }

    .bagian {
      max-width: 1100px;
      margin: 60px auto;
      padding: 0 20px;
    }

    .judul-bagian {
      font-size: 1.8rem;
      font-weight: 700;
      text-align: center;
      margin-bottom: 30px;
    }

    .tata-letak-kursus {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 25px;
    }

    .kartu-kursus {
      background: var(--latar-kartu);
      padding: 25px;
      border-radius: 12px;
      border: 1px solid var(--pembatas);
      box-shadow: 0 4px 12px rgba(0,0,0,0.03);
    }

    .kartu-kursus h3 {
      color: var(--utama);
      margin-bottom: 10px;
    }

    .kartu-kursus p {
      color: var(--teks-pudar);
      font-size: 0.95rem;
      margin-bottom: 20px;
    }

    .tombol-daftar {
      display: inline-block;
      padding: 8px 18px;
      background-color: var(--utama);
      color: white;
      text-decoration: none;
      border-radius: 6px;
      font-weight: 600;
      font-size: 0.9rem;
    }

    footer {
      text-align: center;
      padding: 30px 20px;
      color: var(--teks-pudar);
      border-top: 1px solid var(--pembatas);
      background: var(--latar-kartu);
      margin-top: 60px;
    }
  </style>
</head>

<body>

  <header>
    <div class="wadah-navigasi">
      <a href="{{ route('beranda') }}" class="logo">{{ $namaSitus }}.</a>
      <nav>
        <a href="#beranda">Beranda</a>
        <a href="#kursus">Program Kursus</a>
        <a href="{{ route('pendaftaran') }}">Pendaftaran</a>
      </nav>
    </div>
  </header>

  <main>
    <section id="beranda" class="spanduk-utama">
      <div class="konten-spanduk">
        <h2>Selamat Datang di <span>{{ $namaSitus }}</span></h2>
        <p>{{ $slogan }}</p>
        <a href="#kursus" class="tombol-utama">Lihat Kursus</a>
      </div>
    </section>

    <section id="kursus" class="bagian">
      <h2 class="judul-bagian">Program Kursus</h2>
      <div class="tata-letak-kursus">
        @foreach($daftarKursus as $k)
          <article class="kartu-kursus">
            <h3>{{ $k['nama'] }}</h3>
            <p>Biaya: Rp {{ number_format($k['biaya'], 0, ',', '.') }} | Kuota: {{ $k['kuota'] }}</p>
            <a href="{{ route('pendaftaran', ['course' => $k['kode']]) }}" class="tombol-daftar">Daftar Kursus</a>
          </article>
        @endforeach
      </div>
    </section>
  </main>

  <footer>
    <p>&copy; {{ $tahun }} {{ $namaSitus }}. Pemrograman Web.</p>
  </footer>

</body>

</html>