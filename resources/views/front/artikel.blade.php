@extends('layouts.utama')
@section('title','Artikel')
@section('content')
<section class="mt-[18vh]">
    <div class="container mx-auto px-6">

        {{-- Header Artikel diletakkan di luar grid utama agar lebar penuh --}}
        <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">
            <h2 class="flex mt-5 text-3xl md:text-4xl font-bold justify-center">Artikel</h2>
        </div>

        {{-- START: Grid Container untuk Layout Utama (Artikel Kiri, Sidebar Kanan) --}}
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8 mb-12">

            {{-- KOLOM KIRI (Daftar Artikel) --}}
            <div class="lg:col-span-3">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

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
                <aside class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6 sticky top-28">

                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Berita Terbaru</h2>
                    <ul class="space-y-4">
                        @foreach ($latestPosts as $post)
                        <li class="border-b border-gray-200 dark:border-gray-700 pb-4">
                            <a href="{{ route('posts.show', $post->slug) }}"
                                class="block hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                                🔹 {{ $post->title }}
                            </a>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ $post->published_at->format('d F
                                Y') }}
                            </p>
                        </li>
                        @endforeach
                    </ul>

                    <div class="mt-6 pt-4 border-t border-gray-200 dark:border-gray-700">
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Artikel Terkait</h2>
                        <ul class="space-y-4">
                            @foreach($related as $r)
                            <li>
                                <a href="{{ url('posts/'. $r->slug) }}"
                                    class="hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                                    {{ $r->title }}
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