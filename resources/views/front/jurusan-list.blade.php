@extends('layouts.utama')
@section('title','list-jurusan')
@section('content')
<section id="list-jurusan" class="py-16 md:py-24 bg-gray-50 dark:bg-gray-900 mt-[18vh] md:mt-[10vh]">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-16">
            <h2
                class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white border-b-4 border-primary-500 inline-block pb-1">
                Kompetensi Keahlian
            </h2>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($jurusans as $jurusan)
            <div
                class="bg-white dark:bg-gray-800 rounded-xl shadow-xl overflow-hidden group transform hover:scale-[1.02] transition-transform duration-500 ease-in-out border border-gray-100 dark:border-gray-700">
                {{-- Cover Image --}}
                <div class="h-52 overflow-hidden">
                    <img src="{{ asset('storage/'.$jurusan->cover_image) }}" alt="{{ $jurusan->name }}"
                        class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 ease-in-out" />
                </div>

                {{-- Content --}}
                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 line-clamp-2"
                        title="{{ $jurusan->name }}">
                        {{ $jurusan->name }}
                    </h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-4 text-base line-clamp-3">
                        {{ substr($jurusan->description, 0, 150) }}...
                    </p>
                    <a href="{{ route('jurusan.show', $jurusan->slug) }}"
                        class="inline-flex items-center font-semibold text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300 transition-colors duration-300">
                        Pelajari Lebih Lanjut
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>
                </div>
            </div>
            @endforeach
        </div>
</section>

@endsection