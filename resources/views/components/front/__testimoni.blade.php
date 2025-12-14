<section class="py-10 bg-gradient-to-b from-slate-100 to-blue-900 ">
  <div class="container mx-auto px-6">
    <div data-aos="zoom-in-up" class="text-center mb-16">
      <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">
        Apa Kata Mereka Tentang Kami
      </h2>
      <p class="text-xl text-gray-600 max-w-2xl mx-auto">
        Testimoni dari siswa aktif dan alumni yang sudah sukses bekerja & berkuliah
      </p>
    </div>

    <!-- Slider Testimoni -->
    <div data-aos="fade-down" class="relative max-w-7xl mx-auto" x-data="testimoniSlider()">
      <div class="overflow-hidden rounded-3xl shadow-2xl">
        <div class="flex transition-transform duration-700 ease-in-out"
          :style="'transform: translateX(-' + (current * 100) + '%)'">

          <!-- Testimoni 1 -->
          <div class="w-full shrink-0 bg-white">
            <div class="flex flex-col md:flex-row items-center p-5 md:p-16 gap-10">
              <img
                src="https://media.istockphoto.com/id/1295058550/id/foto/potret-remaja-di-rumah-menggunakan-laptopnya-untuk-menonton-video-atau-bermain-game-satu-orang.jpg?s=1024x1024&w=is&k=20&c=yka48tSgAsYYtH08Hj9rLvJud_QoExIKipWW633kBwg="
                alt="Rizky Pratama"
                class="w-40 h-40 md:w-56 md:h-56 rounded-full object-cover shadow-xl border-8 border-white">
              <div class="text-center md:text-left">
                <div class="text-6xl text-secondary/20 select-none">“</div>
                <p class="text-xl md:text-2xl text-gray-700 italic leading-relaxed mb-6">
                  “Berkat praktik langsung di lab Cisco dan bimbingan guru yang sabar, saya
                  langsung diterima kerja di Telkom Indonesia sebelum lulus!”
                </p>
                <p class="text-2xl font-bold text-primary">M. Rizky Pratama</p>
                <p class="text-lg text-gray-600">Alumni 2023 • Network Engineer Telkom Indonesia</p>
              </div>
            </div>
          </div>

          <!-- Testimoni 2 -->
          <div class="w-full shrink-0 bg-white">
            <div class="flex flex-col md:flex-row items-center p-10 md:p-16 gap-10">
              <img
                src="https://media.istockphoto.com/id/1392783238/id/foto/potret-seorang-remaja-wanita-tersenyum-menatap-kamera-dengan-latar-belakang-biru.jpg?s=1024x1024&w=is&k=20&c=6xocR_g4TmmJ6wIoDvjPvjMDsUP3lPNbm2VZ_CIypH0="
                alt="Siti Aisyah"
                class="w-40 h-40 md:w-56 md:h-56 rounded-full object-cover shadow-xl border-8 border-white">
              <div class="text-center md:text-left">
                <div class="text-6xl text-secondary/20 select-none">“</div>
                <p class="text-xl md:text-2xl text-gray-700 italic leading-relaxed mb-6">
                  “Saya kuliah di Politeknik Negeri Bandung lewat jalur prestasi. Sertifikat Cisco
                  CCNA yang saya dapat di SMK sangat membantu!”
                </p>
                <p class="text-2xl font-bold text-primary">Siti Aisyah Nur</p>
                <p class="text-lg text-gray-600">Mahasiswa Teknik Informatika Polban • Juara LKS
                  2025</p>
              </div>
            </div>
          </div>

          <!-- Testimoni 3 -->
          <div class="w-full shrink-0 bg-white">
            <div class="flex flex-col md:flex-row items-center p-10 md:p-16 gap-10">
              <img src="assets/images/testi3.jpg" alt="Fajar Nugroho"
                class="w-40 h-40 md:w-56 md:h-56 rounded-full object-cover shadow-xl border-8 border-white">
              <div class="text-center md:text-left">
                <div class="text-6xl text-secondary/20 select-none">“</div>
                <p class="text-xl md:text-2xl text-gray-700 italic leading-relaxed mb-6">
                  “Sekarang saya punya usaha jasa pembuatan website sendiri. Semua ilmu dasar
                  programming saya dapat dari jurusan RPL di sini.”
                </p>
                <p class="text-2xl font-bold text-primary">Fajar Nugroho</p>
                <p class="text-lg text-gray-600">Alumni 2022 • Owner Startup “Nugroho Digital”</p>
              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- Tombol Navigasi Kiri/Kanan -->
      <button @click="prev()"
        class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white shadow-xl p-4 rounded-full transition">
        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7" />
        </svg>
      </button>
      <button @click="next()"
        class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/80 hover:bg-white shadow-xl p-4 rounded-full transition">
        <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
        </svg>
      </button>

      <!-- Dot Indicator -->
      <div class="flex justify-center mt-10 space-x-3">
        <template x-for="(item, index) in 3">
          <button @click="current = index" :class="current === index ? 'bg-primary' : 'bg-gray-400'"
            class="w-4 h-4 rounded-full transition-all duration-300 hover:bg-primary"></button>
        </template>
      </div>
    </div>
  </div>
</section>