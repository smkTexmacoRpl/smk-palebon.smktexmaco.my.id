@extends('layouts.utama')
@section('title','Artikel')
@section('content')
<section id="list-berita" class="py-16 md:py-24 bg-gray-50  mt-[12vh] md:mt-[18vh]">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Header Artikel diletakkan di luar grid utama agar lebar penuh --}}
        <div class="text-center mb-16">
            <h2
                class="text-4xl md:text-5xl font-extrabold text-gray-900 dark:text-white border-b-4 border-primary-500 inline-block pb-1">
                Artikel
            </h2>
        </div>

        {{-- START: Grid Container untuk Layout Utama (Artikel Kiri, Sidebar Kanan) --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- KOLOM KIRI (Daftar Artikel) --}}
            <div class="lg:col-span-2">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">

                    @forelse ($artikels as $artikel)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden group">
                        <img src="{{ asset('storage/'.$artikel->cover_image) }}" alt="{{ $artikel->title }}"
                            class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" />
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">{{ $artikel->title }}</h3>
                            <p class="text-gray-600 mb-4">
                                {{substr($artikel->content,0,100) }}
                            </p>
                            <a href="{{ route('posts.show',$artikel->slug) }}"
                                class="font-semibold text-primary-600 hover:underline">Lihat
                                Detail
                                &rarr;</a>
                        </div>
                    </div>

                    @empty
                    <p class="lg:col-span-3">Tidak ada artikel tersedia.</p>
                    @endforelse
                </div>
            </div>

            {{-- KOLOM KANAN (Sidebar) --}}
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
        {{-- END: Grid Container --}}
    </div>
</section>
@endsection