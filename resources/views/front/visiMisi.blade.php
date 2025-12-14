@extends('layouts.utama')
@section('title','visi&misi')
@section('content')

<section id="blog" class="py-12 bg-gray-50 dark:bg-gray-900 mt-[20vh]">
    <div class="container mx-auto px-6 grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- KONTEN UTAMA -->
        <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6">
            <section class="py-20 bg-primary text-white">
                <div class="container mx-auto px-6">
                    <h2 class="text-4xl md:text-5xl font-bold text-center mb-16">
                        Visi & Misi Sekolah
                    </h2>

                    <div class="max-w-5xl mx-auto" x-data="{ tab: 'visi' }">
                        <!-- Tombol Tab (desktop) & Dropdown (mobile) -->
                        <div class="flex justify-center mb-10">
                            <div
                                class="bg-white/20 backdrop-blur rounded-full p-2 inline-flex flex-wrap justify-center gap-3">
                                <button @click="tab = 'visi'"
                                    :class="tab === 'visi' ? 'bg-white text-primary' : 'text-white hover:bg-white/30'"
                                    class="px-10 py-4 rounded-full font-bold transition text-lg">
                                    VISI
                                </button>
                                <button @click="tab = 'misi'"
                                    :class="tab === 'misi' ? 'bg-white text-primary' : 'text-white hover:bg-white/30'"
                                    class="px-10 py-4 rounded-full font-bold transition text-lg">
                                    MISI
                                </button>
                            </div>
                        </div>

                        <!-- Konten Visi -->
                        <div x-show="tab === 'visi'" x-transition class="text-center max-w-4xl mx-auto">
                            <h3 class="text-3xl md:text-4xl font-bold mb-10">
                                Menjadi SMK Unggul Berbasis Teknologi yang Berdaya Saing Global pada Tahun 2030
                            </h3>
                            <p class="text-xl leading-relaxed opacity-90">
                                Mewujudkan lulusan yang kompeten, berakhlak mulia, inovatif, serta mampu bersaing di era
                                revolusi industri 5.0 dan society 5.0.
                            </p>
                        </div>

                        <!-- Konten Misi -->
                        <div x-show="tab === 'misi'" x-transition
                            class="space-y-8 max-w-4xl mx-auto text-lg leading-relaxed">
                            <div class="flex items-start gap-6">
                                <div class="text-4xl font-bold text-secondary">1</div>
                                <p>Menyelenggarakan pendidikan kejuruan yang link and match dengan dunia industri dan
                                    dunia
                                    kerja.</p>
                            </div>
                            <div class="flex items-start gap-6">
                                <div class="text-4xl font-bold text-secondary">2</div>
                                <p>Mengembangkan kompetensi hard skill dan soft skill berbasis teknologi terkini.</p>
                            </div>
                            <div class="flex items-start gap-6">
                                <div class="text-4xl font-bold text-secondary">3</div>
                                <p>Menanamkan nilai-nilai karakter, keimanan, dan kewirausahaan kepada seluruh warga
                                    sekolah.
                                </p>
                            </div>
                            <div class="flex items-start gap-6">
                                <div class="text-4xl font-bold text-secondary">4</div>
                                <p>Menciptakan lingkungan sekolah yang kondusif, inklusif, dan berwawasan lingkungan.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
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