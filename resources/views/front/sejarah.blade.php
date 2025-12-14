@extends('layouts.utama')
@section('title','sejarah')
@section('styles')
<style>
    p {
        text-align: justify;
        margin-bottom: 1.5em;
    }
</style>
@section('content')

<section id="sejarah" class="py-12 bg-gray-50  mt-[18vh]">
    <div class="container mx-auto px-6 grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- KONTEN UTAMA -->
        <div class="lg:col-span-2 bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-6">
            <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-4"> Sejarah Pendirian SMK Palebon Semarang
            </h1>
            <img src="https://placehold.co/600x400/6893f7/FEFEFE?text=Sejarah" alt="sejarah"
                class="w-full sm:w-1/2 md:w-full h-48 object-cover rounded-xl" />

            <p class="text-justify mt-[5vh]">
                <span class="font-bold">SMK Palebon</span> Semarang merupakan salah satu lembaga pendidikan kejuruan
                swasta di Kota Semarang, Jawa
                Tengah, yang telah berkontribusi dalam mencetak tenaga kerja terampil di bidang manajemen dan bisnis.
                Berlokasi di Jl. Palebon Raya No. 30, Kecamatan Pedurungan, sekolah ini memiliki sejarah panjang yang
                dimulai dari era 1960-an. Saat ini, SMK Palebon berada di bawah naungan Kementerian Pendidikan dan
                Kebudayaan, dengan status akreditasi B yang diperoleh pada 15 Januari 2019 berdasarkan SK No.
                032/BAN-SM/SK/2019
            </p>

            <p class="text-justify">
                Awal Pendirian sebagai SMEA PGRI
                Sejarah SMK Palebon Semarang tidak dapat dipisahkan dari pendahuluannya, yaitu Sekolah Menengah Ekonomi
                Atas (SMEA) PGRI. Sekolah ini didirikan pada tahun 1967 sebagai bagian dari upaya Persatuan Guru
                Republik Indonesia (PGRI) untuk mengembangkan pendidikan vokasi di Semarang. Pada masa awal, SMEA PGRI
                fokus pada pendidikan ekonomi dan administrasi, menyesuaikan dengan kebutuhan tenaga kerja saat itu.
                Pendirian ini mencerminkan semangat pendidikan nasional pasca-kemerdekaan, di mana lembaga-lembaga
                seperti PGRI aktif dalam membangun sistem pendidikan yang lebih inklusif.
                Pada tahun 1985, sekolah mengalami perkembangan signifikan dengan membeli dan membangun lahan serta
                kelas sendiri di Jl. Palebon Raya No. 30 Semarang. Langkah ini dilakukan karena adanya kebutuhan
                ekspansi dan kemandirian, setelah sebelumnya mungkin bergantung pada fasilitas bersama atau yayasan
                lain. Peralihan ini juga menandai komitmen yayasan pendidikan untuk meningkatkan kualitas infrastruktur.
            </p>
            <p class="text-justify">
                Perubahan dan Modernisasi
                Tahun 1987 menjadi tonggak penting ketika nama jurusan diubah menjadi Manajemen Keuangan, Manajemen
                Perkantoran, dan Manajemen Bisnis. Perubahan ini disesuaikan dengan perkembangan kurikulum nasional yang
                lebih menekankan pada keterampilan praktis dan relevansi dengan dunia kerja. Kemudian, pada tahun 1998,
                sekolah secara resmi berganti nama menjadi SMK Palebon Semarang, menandai transisi dari SMEA ke Sekolah
                Menengah Kejuruan (SMK) yang lebih modern. Perubahan nama ini sejalan dengan reformasi pendidikan di
                Indonesia yang mengubah SMEA menjadi SMK untuk lebih fokus pada kompetensi vokasi.
            <p class="text-justify">Pada 4 Oktober 2005, sekolah memperoleh Surat Keputusan (SK) Operasional No.
                848/3615, yang memperkuat
                status operasionalnya. Kemudian, pada 6 September 2013, diterbitkan SK Pendirian No. 05, yang mungkin
                merupakan pembaruan administratif untuk menyesuaikan dengan regulasi terbaru dari Kementerian Pendidikan
                dan Kebudayaan. Sejak itu, SMK Palebon terus berkembang, dengan jumlah siswa mencapai sekitar 975 pada
                tahun 2018, dan 75% lulusannya terserap di dunia kerja atau menjadi wirausaha.</p>
            <p>
                Kondisi Saat Ini dan Kontribusi
                Saat ini, SMK Palebon memiliki 315 siswa (104 laki-laki dan 211 perempuan) serta 35 guru profesional.
                Sekolah dilengkapi fasilitas seperti akses internet Telkom Speedy dan listrik PLN, serta memiliki situs
                resmi di smkpalebonsemarang.sch.id untuk informasi lebih lanjut. Kepala sekolah saat ini adalah
                Soeparno, dengan operator Mk. Catur Rini.
                Sebagai kelanjutan dari SMEA PGRI, SMK Palebon Semarang telah berkembang menjadi institusi pendidikan
                yang relevan dengan tuntutan zaman, fokus pada pembentukan karakter dan keterampilan siswa.
                Keberhasilannya dalam menyerap lulusan ke dunia kerja menunjukkan peran pentingnya dalam pembangunan
                sumber daya manusia di Semarang dan sekitarnya.

            </p>
            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-6">
                <i data-lucide="calendar" class="w-4 h-4 mr-2"></i>
                <span>{{ $visi->updated_at->format('d F Y') }}</span>
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