@extends('layouts.utama')
@section('title','Artikel')
@section('content')
<section id="list-berita" class="mt-[18vh]">
    <div class="container mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold">Berita Terbaru</h2>
        </div>

        {{-- START: Grid Container untuk Layout Utama (Berita Kiri, Sidebar Kanan) --}}
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">

            {{-- KOLOM KIRI (Berita Utama) --}}
            <div class="lg:col-span-3 my-5">
                <div class="grid grid-cols-1 sm:grid-cols-3  gap-8">
                    {{-- Loop Daftar Berita --}}
                    @forelse ($semuaBerita as $berita)
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden group">
                        <img src="{{ asset('storage/'.$berita->cover_image) }}" alt="{{ $berita->title }}"
                            class="w-full h-48 object-cover group-hover:scale-105 transition-transform duration-300" />
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2">{{ $berita->title }}</h3>
                            <p class="text-gray-600 dark:text-gray-400 mb-4">
                                {{substr($berita->content,0,100) }}
                            </p>
                            <a href="{{ route('posts.show',$berita->slug) }}"
                                class="font-semibold text-primary-600 dark:text-primary-400 hover:from-green-500 hover:to-yellow-500 transition-colors duration-300">Lihat
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
                    {{-- Menambahkan sticky top-28 agar sidebar tetap terlihat saat di-scroll --}}
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