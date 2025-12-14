<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ config('app.name', 'smk palebon') }} | @yield('title')</title>
    <meta name="description"
        content="SMK Negeri Palebon Semarang - Sekolah kejuruan terbaik dengan jurusan unggulan dan lulusan tersalurkan 98%">

    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <style>
        .navbar-scrolled {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="font-sans text-gray-800">
    <!-- NAVBAR DENGAN DROPDOWN (Desktop + Mobile Friendly) -->
    <x-front.__header />
    <!-- HERO -->
    <x-front.__hero />
    <!-- HERO SLIDER (3 Slide Otomatis + Indikator + Navigasi) -->

    <!-- 1. KATA PENGANTAR KEPALA SEKOLAH -->
    <x-front.__prakata />

    <!-- 2. Counter tab di mobile) -->
    <x-front.__counter />

    <!-- 3. KEGIATAN TERBARU (Grid 3 kolom, foto besar + caption) -->

    <x-front.__kegiatanTerbaru />



    <!-- JURUSANNN -->
    <x-front.__jurusan />
    <!-- SECTION PROGRAM INDUSTRI KERJASAMA -->
    <!-- PPDB CTA -->
    <x-front.__ctaPpdb />
    <!-- SECTION BERITA & KEGIATAN TERBARU -->
    <x-front.__beritaKegiatanTerbaru />

    <!-- SECTION TESTIMONI SISWA & ALUMNI (Slider Otomatis) -->
    <x-front.__testimoni />
    <!-- FOOTER -->
    <x-front.__footer />

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    @stack('scripts')
    <script>
        AOS.init({
            duration: 800,
            once: true,
        });
    </script>

    // Navbar scroll effect
    <script>
        <x-front.__scripts />
    </script>
</body>

</html>