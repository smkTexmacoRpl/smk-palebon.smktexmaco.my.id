@extends('layouts.utama')
@section('title','prestasi smk palebon')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
@endsection
<div>

    <div class="bg-gray-50 text-gray-800">


        <!-- Hero Section -->
        <section class="pt-24 bg-gradient-to-br   from-primary to-teal-800 text-white">
            <div class="container mx-auto px-4 py-20 text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">Prestasi Gemilang Siswa SMK Palebon</h1>
                <p class="text-xl max-w-3xl mx-auto">Kami bangga dengan pencapaian siswa-siswi kami di berbagai bidang
                    kompetisi, olahraga, seni, dan sains tingkat kabupaten, provinsi, hingga nasional.</p>
            </div>
        </section>



        <!-- Daftar Prestasi (Grid Card) -->
        <section class="py-16 bg-gray-100">
            <div class="container mx-auto px-4">
                <h2 class="text-4xl font-bold text-center mb-12 text-primary">Daftar Prestasi Tahun 2023-2025</h2>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($prestasis as $prestasi)
                    <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition">
                        <div class="flex items-center gap-4 mb-4">
                            <i class="fas 
                            {{ $loop->iteration % 2 === 0 
                                ? 'fa-medal text-yellow-400' 
                                : 'fa-trophy text-yellow-500' 
                            }} text-4xl">
                            </i>

                            <h3 class="text-2xl font-bold">{{ ucwords($prestasi->judul) }}</h3>
                        </div>
                        <p class="text-gray-600">Bidang Lomba: {{ $prestasi->keterangan }}<br>Tahun: {{
                            $prestasi->tahun }}<br>Siswa: {{ $prestasi->team }}</p>
                    </div>
                    @endforeach


                    <!-- Tambahkan lebih banyak card sesuai prestasi sekolahmu -->
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-20 bg-primary text-white text-center">
            <div class="container mx-auto px-4">
                <h2 class="text-4xl md:text-5xl font-bold mb-8">Bergabunglah dan Raih Prestasi Bersama Kami!</h2>
                <p class="text-xl mb-10">Daftar sekarang di PPDB 2026/2027 dan wujudkan mimpi menjadi juara.</p>
                <a href="#"
                    class="bg-white text-primary px-10 py-5 rounded-full text-xl font-bold hover:bg-gray-100 transition">Daftar
                    PPDB Sekarang →</a>
            </div>
        </section>

        <!-- Footer -->
    </div>

</div>