@extends('layouts.utama')
@section('title','ekstra')
@section('content')
<!-- Hero Section -->
<section class="pt-24 bg-gradient-to-r from-primary to-teal-700 text-white">
    <div class="container mx-auto px-4 py-20 text-center ">
        <h1 class=" text-4xl md:text-6xl font-bold mb-6">Daftar Ekstrakurikuler</h1>
        <p class="text-xl max-w-3xl mx-auto">
            Kami memiliki lebih dari 45 kegiatan ekstrakurikuler yang dapat kamu pilih
            untuk mengembangkan bakat, minat, dan karakter. Temukan yang sesuai
            denganmu!
        </p>
    </div>
</section>

<!-- Accordion List Ekstrakurikuler -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 max-w-5xl">
        <h2 class="text-4xl font-bold text-center mb-12 text-primary">
            Pilih Ekstrakurikuler Favoritmu
        </h2>
        @forelse($ekstras as $ekstra)

        <div class="space-y-4">
            <!-- Contoh Accordion 1: Pramuka -->
            <div x-data="{ open: false }" class="bg-gray-50 rounded-2xl shadow-lg overflow-hidden">
                <button @click="open = !open"
                    class="w-full px-6 py-5 text-left font-bold text-xl flex justify-between items-center hover:bg-gray-100 transition">
                    {{ $ekstra->nama_ekstrakurikuler }}
                    <i :class="open ? 'fa-chevron-up' : 'fa-chevron-down'" class="text-primary"></i>
                </button>
                <div x-show="open" x-transition x-cloak class="px-6 py-8 border-t border-gray-200">
                    <div class="grid md:grid-cols-2 gap-8 items-center">
                        <div>
                            <p class="text-lg mb-4">
                                {{$ekstra->deskripsi}}
                            </p>
                            <ul class="list-disc list-inside space-y-2 text-gray-700">
                                <li>Pembina: Bapak/Ibu Guru Pramuka</li>
                                <li>Jadwal: Setiap Rabu sore</li>
                                <li>Manfaat: Membangun karakter tangguh dan jiwa sosial</li>
                            </ul>
                        </div>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            <grok-card data-id="e017c8" data-type="image_card"></grok-card>


                            {{-- <grok-card data-id="c939c1" data-type="image_card"></grok-card>

                            <grok-card data-id="bfaa09" data-type="image_card"></grok-card> --}}
                        </div>
                    </div>
                </div>
            </div>



        </div>
        @empty
        <p class="text-center text-gray-600">Belum ada data ekstrakurikuler tersedia.</p>
        @endforelse

        <p class="text-center mt-12 text-gray-600">
            * Total 45 ekstrakurikuler tersedia. Hubungi OSIS untuk informasi lengkap.
        </p>
    </div>
</section>
@endsection