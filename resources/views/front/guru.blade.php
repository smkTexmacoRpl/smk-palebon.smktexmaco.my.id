@extends('layouts.utama')
@section('title','Teacher & Education Staff')
@section('styles')
<style>
    p {
        text-align: justify;
        margin-bottom: 1.5em;
    }

    hr {
        border: none;
        border-top: 1px solid #7c7878;
        color: #6b6161;
        overflow: visible;
        text-align: center;
        height: 2px;
    }
</style>
@section('content')

<section id="blog" class="py-12 bg-gray-50 dark:bg-gray-900 mt-[18vh]">
    <div class="container mx-auto px-6 grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- KONTEN UTAMA -->
        <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6">
            <div class="w-full flex justify-center">
                <h1 class="text-xl font-bold text-gray-800 dark:text-white mb-[5%] ">
                    {{strtoupper('Data Guru & tenaga pendidikan SMK Palebon Semarang')}}
                </h1>
            </div>
            <hr class="w-full mb-6">
            </h1>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @forelse ($gurus as $guru)


                <div
                    class="w-full h-[200px] bg-white rounded-xl shadow-lg overflow-hidden flex group hover:border border-slate-300 transition-border  duration-100">
                    <div class="w-[35%] h-full shrink-0 relative overflow-hidden">
                        <img class="h-full w-full object-cover transition duration-500 group-hover:scale-125"
                            src="{{ asset($guru->foto_url) }}" alt="Kopi">
                    </div>
                    <div class="w-[65%] p-3 flex flex-col justify-center">
                        <span class="text-lg font-bold text-indigo-500 uppercase">{{ $guru->nama_lengkap }}</span>
                        <h3 class="text-base text-slate-800 leading-tight mt-1">{{ $guru->jabatan }}</h3>
                        <h3 class="text-base  text-slate-800 leading-tight mt-1">{{ $guru->alamat }}</h3>
                        <h3 class="text-base text-slate-800 leading-tight mt-1">{{ $guru->bidang_studi }}</h3>

                        <button class="text-sm bg-indigo-500 text-white px-1 rounded w-fit hover:bg-indigo-600">
                            Detail
                        </button>
                    </div>
                </div>

                @empty
                <p>Tidak ada data guru tersedia.</p>

                @endforelse
            </div>

        </div>

        <!-- SIDEBAR: LATEST NEWS -->
        <aside class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Berita Terbaru</h2>
            <ul class="space-y-4">
                @foreach ($latestPosts as $post)
                <li class="border-b border-gray-200 dark:border-gray-700 pb-4">
                    <a href="{{ route('posts.show', $post->slug) }}"
                        class="block hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                        🔹 {{ $post->title }}
                    </a>
                    <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">{{ $post->published_at->format('d F Y') }}
                    </p>
                </li>
                @endforeach
            </ul>
            <div class="mt-6">

                <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Artikel Terkait</h2>
                <ul class="space-y-4">
                    @foreach($related as $r)
                    <li><a href="{{ url('posts/'. $r->slug) }}">{{ $r->title }}</a></li>
                    @endforeach
                </ul>
            </div>
        </aside>
    </div>
</section>

@endsection