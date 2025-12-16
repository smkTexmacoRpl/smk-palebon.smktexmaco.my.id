@extends('layouts.utama')
@section('title','jurusan detail')
@section('content')
<!-- Header Jurusan BDP -->

<section class="py-8 bg-gradient-to-r from-teal-800 to-blue-900 text-white">


    <div class="container mx-auto px-4 py-20 grid md:grid-cols-2 gap-10 items-center">
        <div>
            <h1 class="text-4xl md:text-6xl font-bold mb-6">
                {{ $jurusan->nama_jurusan }} ({{ strtoupper($jurusan->kode_jurusan) }})
            </h1>
            <p class="text-xl mb-8">
                Siap jadi entrepreneur digital dan marketer handal di era industri 4.0!
            </p>
            <ul class="space-y-4 text-lg">
                <li class="flex items-center gap-3">
                    <i class="fas fa-check-circle"></i> {{ $jurusan->keterangan }}
                </li>

            </ul>
            <a href="#ppdb"
                class="mt-8 inline-block bg-white text-teal-600 px-8 py-4 rounded-full font-bold hover:bg-gray-100 transition">Daftar
                Jurusan Ini →</a>
        </div>
        <img src="https://media.istockphoto.com/id/2163952011/id/foto/pengusaha-milenial-cantik-menggunakan-ai-di-ponsel-pintar-dan-laptop-untuk-bekerja.jpg?s=1024x1024&w=is&k=20&c=5ksD7USDMkl2yKaDDkyDWpaeQCvqDQGc0d-L8UXDnBw="
            alt="Siswa BDP" class="rounded-2xl shadow-2xl" />
    </div>
</section>


<!-- Tabs: Kenapa Memilih BDP -->
{{-- <section class="py-16 bg-white" x-data="{ tab: 'ecommerce' }">
    <div class="container mx-auto px-4 max-w-5xl">
        <h2 class="text-4xl font-bold text-center mb-12">
            Kenapa Memilih Jurusan BDP?
        </h2>
        <div class="flex flex-wrap justify-center gap-4 mb-10">
            <button @click="tab = 'ecommerce'" :class="tab === 'ecommerce' ? 'bg-teal-600 text-white' : 'bg-gray-200'"
                class="px-6 py-3 rounded-full font-medium transition">
                E-Commerce
            </button>
            <button @click="tab = 'marketing'" :class="tab === 'marketing' ? 'bg-teal-600 text-white' : 'bg-gray-200'"
                class="px-6 py-3 rounded-full font-medium transition">
                Digital Marketing
            </button>
            <button @click="tab = 'prospek'" :class="tab === 'prospek' ? 'bg-teal-600 text-white' : 'bg-gray-200'"
                class="px-6 py-3 rounded-full font-medium transition">
                Prospek Kerja
            </button>
        </div>

        <div class="text-center p-10 bg-teal-50 rounded-3xl" x-show="tab === 'ecommerce'" x-transition>
            <i class="fas fa-shopping-cart text-6xl text-teal-600 mb-6"></i>
            <h3 class="text-3xl font-bold mb-4">E-Commerce Expert</h3>
            <p class="text-lg max-w-2xl mx-auto">
                Belajar mengelola toko online dari nol: mulai dari membuat produk, upload
                ke marketplace, hingga mengoptimasi penjualan.
            </p>
        </div>
        <div class="text-center p-10 bg-blue-50 rounded-3xl" x-show="tab === 'marketing'" x-transition>
            <i class="fas fa-chart-line text-6xl text-blue-600 mb-6"></i>
            <h3 class="text-3xl font-bold mb-4">Digital Marketing Handal</h3>
            <p class="text-lg max-w-2xl mx-auto">
                Kuasai SEO, Facebook Ads, Google Ads, content creation, dan analisis data
                untuk meningkatkan brand awareness.
            </p>
        </div>
        <div class="text-center p-10 bg-green-50 rounded-3xl" x-show="tab === 'prospek'" x-transition>
            <i class="fas fa-briefcase text-6xl text-green-600 mb-6"></i>
            <h3 class="text-3xl font-bold mb-4">Prospek Kerja Luas</h3>
            <p class="text-lg max-w-2xl mx-auto">
                {{ $jurusan->peluang_kerja }}
            </p>
        </div>
    </div>
</section> --}}

<!-- Accordion Mata Pelajaran -->
<section class="py-16 bg-gray-100">
    <div class="container mx-auto px-4 max-w-4xl">
        <h2 class="text-4xl font-bold text-center mb-12">Mata Pelajaran Utama</h2>
        <div class="space-y-4">
            @php
            $prospekArray = explode(',',$jurusan->materi);
            $poinBersih = array_filter(array_map('trim', $prospekArray));

            @endphp
            @foreach ($poinBersih as $poin )

            <div x-data="{ open: false }" class="bg-white rounded-xl shadow-lg overflow-hidden">


                <button @click="open = !open"
                    class="w-full px-6 py-5 text-left font-bold flex justify-between items-center hover:bg-gray-50 transition">

                    {{ $poin }}

                    <i :class="open ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                </button>

                <div x-show="open" x-transition x-cloak class="px-6 py-5 border-t">
                    Merancang produk inovatif, membuat business plan, dan simulasi memulai
                    usaha dari nol.
                </div>
            </div>
            @endforeach

            <div x-data="{ open: false }" class="bg-white rounded-xl shadow-lg overflow-hidden">
                <button @click="open = !open"
                    class="w-full px-6 py-5 text-left font-bold flex justify-between items-center hover:bg-gray-50 transition">
                    Bisnis Online
                    <i :class="open ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                </button>
                <div x-show="open" x-transition x-cloak class="px-6 py-5 border-t">
                    Praktik langsung membuat toko di Shopee/Tokopedia, pengelolaan stok, dan
                    pembayaran digital.
                </div>
            </div>

            <!-- Tambahkan lebih banyak accordion sesuai kebutuhan -->
        </div>
    </div>
</section>

<!-- Prospek Karir -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-4xl font-bold text-center mb-12">
            Prospek Karir Lulusan {{ strtoupper($jurusan->kode_jurusan) }}
        </h2>
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="space-y-8">
                <div class="flex items-center gap-6">
                    <div
                        class="bg-teal-600 text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold">
                        1
                    </div>
                    <div>
                        <h4 class="text-xl font-bold">Digital Marketer</h4>
                        <p>Gaji awal ± Rp 5-8 juta</p>
                    </div>
                </div>
                <div class="flex items-center gap-6">
                    <div
                        class="bg-blue-600 text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold">
                        2
                    </div>
                    <div>
                        <h4 class="text-xl font-bold">E-Commerce Manager</h4>
                        <p>Di perusahaan besar</p>
                    </div>
                </div>
                <div class="flex items-center gap-6">
                    <div
                        class="bg-green-600 text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold">
                        3
                    </div>
                    <div>
                        <h4 class="text-xl font-bold">Content Creator</h4>
                        <p>Freelance/full-time</p>
                    </div>
                </div>
                <div class="flex items-center gap-6">
                    <div
                        class="bg-purple-600 text-white w-16 h-16 rounded-full flex items-center justify-center text-2xl font-bold">
                        4
                    </div>
                    <div>
                        <h4 class="text-xl font-bold">Entrepreneur Digital</h4>
                        <p>Usaha sendiri</p>
                    </div>
                </div>
            </div>
            <img src="https://via.placeholder.com/600x600" alt="Infographic Karir" class="rounded-2xl shadow-xl" />
        </div>
    </div>
</section>
@endsection