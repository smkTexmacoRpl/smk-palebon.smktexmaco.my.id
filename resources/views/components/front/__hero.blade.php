<section class="relative h-screen overflow-hidden" x-data="heroSlider()">
  <!-- Slides -->
  <div class="absolute inset-0 page-list">
    <!-- Slide 1 -->
    <div x-show="current === 0" x-transition:enter="transition ease-out duration-1000"
      x-transition:enter-start="opacity-0 transform scale-105" x-transition:enter-end="opacity-100 transform scale-100"
      x-transition:leave="transition ease-in duration-700" x-transition:leave-start="opacity-100"
      x-transition:leave-end="opacity-0" class="absolute inset-0">
      <div
        class="absolute inset-0 page-item bg-linear-to-br odd:from-primary/90 odd:via-blue-900 odd:to-secondary/60 even:from-teal-900/90 even:via-cyan-800/80 even:to-blue-900/50">
      </div>
      <img
        src="https://images.unsplash.com/photo-1495727034151-8fdc73e332a8?q=80&w=865&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
        alt="Slide 1" class="w-full h-full object-cover">
      <div class="absolute inset-0 flex items-center justify-center text-center text-white px-6">
        <div class="max-w-4xl">
          <h1 class="text-4xl md:text-6xl font-extrabold mb-6 leading-tight animate-fade-up" data-aos="fade-right">
            Selamat Datang di <br><span class="text-secondary">SMK Negeri 1 Teknologi</span>
          </h1>
          <p data-aos="fade-left" class="text-xl md:text-3xl mb-10 font-light">Siap Kerja • Siap Kuliah • Siap
            Berwirausaha</p>
          <div class="space-x-4" data-aos="zoom-in">
            <a href="#jurusan"
              class="bg-secondary px-8 py-4 rounded-full text-lg font-bold hover:bg-orange-600 transition shadow-xl">
              Lihat Jurusan
            </a>
            <a href="#ppdb"
              class="border-2 border-white px-8 py-4 rounded-full text-lg font-bold hover:bg-white hover:text-primary transition shadow-xl">
              Daftar PPDB 2025
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Slide 2 -->
    <div x-show="current === 1" x-transition:enter="transition ease-out duration-1000"
      x-transition:enter-start="opacity-0 transform translate-x-32"
      x-transition:enter-end="opacity-100 transform translate-x-0" x-transition:leave="transition ease-in duration-700"
      x-transition:leave-end="opacity-0" class="absolute inset-0">
      <div
        class="absolute inset-0 page-item bg-linear-to-br odd:from-primary/90 odd:via-blue-900 odd:to-secondary/60 even:from-teal-900/90 even:via-cyan-800/80 even:to-blue-900/50">
      </div>
      <img
        src="https://images.unsplash.com/photo-1564981797816-1043664bf78d?q=80&w=774&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
        alt="Laboratorium" class="w-full h-full object-cover">
      <div class="absolute inset-0 flex items-center justify-center text-center text-white px-6">
        <div class="max-w-4xl">
          <h1 class="text-4xl md:text-6xl font-extrabold mb-6">
            Fasilitas <span class="text-yellow-300">Modern & Lengkap</span>
          </h1>
          <p class="text-xl md:text-2xl">Laboratorium TKJ, RPL, Otomotif, Studio Multimedia, dan Workshop
            Industri</p>
        </div>
      </div>
    </div>

    <!-- Slide 3 -->
    <div x-show="current === 2" x-transition:enter="transition ease-out duration-1000"
      x-transition:enter-start="opacity-0 transform -translate-x-32"
      x-transition:enter-end="opacity-100 transform translate-x-0" class="absolute inset-0">
      <div
        class="absolute inset-0 page-item bg-linear-to-br odd:from-primary/90 odd:via-blue-950 odd:to-secondary/60  even:from-teal-900/90 even:via-cyan-800/80 even:to-blue-900/50">
      </div>
      <img
        src="https://plus.unsplash.com/premium_photo-1661909267383-58991abdca51?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
        alt="Kerjasama Industri" class="w-full h-full object-cover">
      <div class="absolute inset-0 flex items-center justify-center text-center text-white px-6">
        <div class="max-w-4xl">
          <h1 class="text-4xl md:text-6xl font-extrabold mb-6">
            98% Lulusan <span class="text-green-400">Langsung Kerja!</span>
          </h1>
          <p class="text-xl md:text-2xl">Kerjasama dengan 50+ perusahaan ternama nasional</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Navigasi Kiri/Kanan -->
  <button @click="prev()"
    class="absolute left-4 top-1/2 -translate-y-1/2 z-10 bg-white/20 hover:bg-white/40 backdrop-blur p-3 rounded-full transition">
    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M15 19l-7-7 7-7" />
    </svg>
  </button>
  <button @click="next()"
    class="absolute right-4 top-1/2 -translate-y-1/2 z-10 bg-white/20 hover:bg-white/40 backdrop-blur p-3 rounded-full transition">
    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M9 5l7 7-7 7" />
    </svg>
  </button>

  <!-- Indikator Dots -->
  <div class="absolute bottom-8 left-1/2 -translate-x-1/2 flex space-x-3 z-10">
    <template x-for="(slide, index) in 3" :key="index">
      <button @click="current = index" :class="current === index ? 'bg-white w-12 h-3' : 'bg-white/50 w-8 h-3'"
        class="rounded-full transition-all duration-300 hover:bg-white"></button>
    </template>
  </div>

  <!-- Scroll Down Indicator -->
  <div class="absolute bottom-10 left-1/2 -translate-x-1/2 animate-bounce">
    <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3">
      </path>
    </svg>
  </div>
</section>