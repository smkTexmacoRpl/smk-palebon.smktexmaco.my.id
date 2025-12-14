@extends('layouts.utama')
@section('title','Artikel')
@section('content')
<section id="list-berita" class="py-16 md:py-24 bg-gray-50 dark:bg-gray-900 mt-[12vh] md:mt-[10vh]">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">

        <div class="text-center mb-16">
            <h2
                class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white border-b-4 border-primary-500 inline-block pb-1">
                Berita Terbaru
            </h2>
        </div>


        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- KOLOM KIRI (Berita Utama - Mengambil 2 kolom dari 3 = 66%) --}}
            <div class="lg:col-span-2">
                {{-- Grid untuk item Berita di dalam Kolom Kiri --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    {{-- Loop Daftar Berita --}}
                    @forelse ($semuaBerita as $berita)
                    <div
                        class="bg-white dark:bg-gray-800 rounded-xl shadow-xl overflow-hidden group transform hover:scale-[1.02] transition-transform duration-500 ease-in-out border border-gray-100 dark:border-gray-700">
                        {{-- Cover Image --}}
                        <div class="h-52 overflow-hidden">
                            <img src="{{ asset('storage/'.$berita->cover_image) }}" alt="{{ $berita->title }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500 ease-in-out" />
                        </div>

                        {{-- Content --}}
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3 line-clamp-2"
                                title="{{ $berita->title }}">
                                {{ $berita->title }}
                            </h3>
                            <p class="text-gray-600 dark:text-gray-400 mb-4 text-base line-clamp-3">
                                {{ substr($berita->content, 0, 150) }}...
                            </p>
                            <a href="{{ route('posts.show', $berita->slug) }}"
                                class="inline-flex items-center font-semibold text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300 transition-colors duration-300">
                                Baca Selengkapnya
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                    @empty
                    {{-- Tampilan untuk Kasus Kosong --}}
                    <div class="lg:col-span-2 text-center py-10 bg-white dark:bg-gray-800 rounded-xl shadow-lg">
                        <svg class="w-16 h-16 mx-auto text-gray-400 dark:text-gray-600" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                        <p class="text-xl font-medium text-gray-700 dark:text-gray-300 mt-4">
                            Saat ini belum ada artikel atau berita yang tersedia.
                        </p>
                    </div>
                    @endforelse
                </div>
                {{-- (Jika menggunakan pagination, letakkan di sini) --}}
                {{-- <div class="mt-8">
                    {{ $semuaBerita->links() }}
                </div> --}}
            </div>

            {{-- KOLOM KANAN (Sidebar - Mengambil 1 kolom dari 3 = 33%) --}}
            <div class="lg:col-span-1">
                <aside
                    class="bg-white dark:bg-gray-800 rounded-xl shadow-2xl p-6 sticky top-28 border border-gray-100 dark:border-gray-700">

                    {{-- Berita Terbaru --}}
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-5 border-b pb-2 border-primary-500">
                        📰 Berita Terbaru
                    </h2>
                    <ul class="space-y-4 divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($latestPosts as $post)
                        <li class="pt-4 first:pt-0">
                            <a href="{{ route('posts.show', $post->slug) }}"
                                class="block text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors font-medium text-lg line-clamp-2">
                                {{ $post->title }}
                            </a>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                                <time datetime="{{ $post->published_at->format('Y-m-d') }}">{{
                                    $post->published_at->format('d F Y') }}</time>
                            </p>
                        </li>
                        @endforeach
                    </ul>

                    {{-- Artikel Terkait --}}
                    <div class="mt-8 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <h2
                            class="text-2xl font-bold text-gray-900 dark:text-white mb-5 border-b pb-2 border-primary-500">
                            🔗 Artikel Terkait
                        </h2>
                        <ul class="space-y-3">
                            @foreach($related as $r)
                            <li>
                                <a href="{{ url('posts/'. $r->slug) }}"
                                    class="text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 transition-colors block line-clamp-2">
                                    &rsaquo; {{ $r->title }}
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </aside>
            </div>

        </div>
        {{-- END: GRID UTAMA --}}

    </div>
</section>
@endsection