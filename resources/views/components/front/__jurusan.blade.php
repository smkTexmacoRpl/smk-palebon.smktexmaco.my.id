<section id="jurusan" class="py-12 bg-white">

  <div x-data="sliderData(6, 2)" class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8 bg-gray-50 rounded-xl shadow-2xl"
    data-aos="fade-up">

    <h2 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">
      🎓 Program Keahlian Unggulan SMK Palebon
    </h2>
    <p class="text-center text-gray-900 mb-12 max-w-2xl mx-auto">Pilihan jurusan yang sesuai passion dan prospek
      kerja masa depan</p>


    @foreach ($jurusan1 as $jr )


    <div class="relative overflow-hidden">
      <div x-ref="track" class="flex transition-transform duration-500 ease-in-out"
        :style="`transform: translateX(-${(currentPage - 1) * 100}%)`">
        <div class="w-full flex-shrink-0 grid md:grid-cols-2 gap-6 p-2">

          <div
            class="bg-gradient-to-r from-teal-900 to-green-700 text-gray-200 rounded-lg shadow-xl p-6 transform hover:scale-[1.02] hover:text-orange-500 transition duration-300">
            <svg class="w-10 h-10 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9.75 17L12 19.25m0 0L14.25 17m-2.25 2.25V5M16 3H8a2 2 0 00-2 2v14a2 2 0 002 2h8a2 2 0 002-2V5a2 2 0 00-2-2z">
              </path>
            </svg>

            <h3 class="text-2xl font-bold mb-2">{{ $jr->nama_jurusan }}</h3>
            <p class="text-gray-300">{{ substr($jr->keterangan, 0, 150) }}....</p>
          </div>

          <div
            class="bg-green-700 text-gray-200 rounded-lg shadow-xl p-6 transform hover:scale-[1.02] transition duration-300">
            <svg class="w-10 h-10 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M21 12a9 9 0 01-9 9m9-9h-2M3 12a9 9 0 009 9m-9-9h2m5 5v2m5-5v2m-5-5v2m5-5v2m-5-5v2m0-5V7m0 0a5 5 0 0110 0v2m0 0a5 5 0 01-10 0v-2">
              </path>
              sds
            </svg>

            <h3 class="text-2xl font-bold mb-2">Teknik Komputer & Jaringan (TKJ)</h3>
            <p class="text-gray-300">Instalasi dan pemeliharaan infrastruktur jaringan, hardware, dan
              sistem
              operasi.</p>
          </div>
        </div>

        <div class="w-full flex-shrink-0 grid md:grid-cols-2 gap-6 p-2">

          <div
            class="bg-green-700 text-gray-200 rounded-lg shadow-xl p-6 transform hover:scale-[1.02] transition duration-300">
            <svg class="w-10 h-10 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2M12 3v1m0 16v1M5 12H4m16 0h-1M6.7 6.7l.7-.7M17.3 17.3l.7.7M6.7 17.3l.7-.7M17.3 6.7l.7.7">
              </path>
            </svg>

            <h3 class="text-2xl font-bold mb-2">Akuntansi Keuangan & Lembaga (AKL)</h3>
            <p class="text-gray-300">Menguasai pembukuan, pelaporan keuangan, audit, dan perpajakan
              dasar.
            </p>
          </div>

          <div
            class="bg-green-700 text-gray-200 rounded-lg shadow-xl p-6 transform hover:scale-[1.02] transition duration-300">
            <svg class="w-10 h-10 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z">
              </path>
            </svg>

            <h3 class="text-2xl font-bold mb-2">Manajemen Perkantoran (MP)</h3>
            <p class="text-gray-300">Keterampilan administrasi modern, kearsipan digital, dan komunikasi
              bisnis.</p>
          </div>
        </div>

        <div class="w-full flex-shrink-0 grid md:grid-cols-2 gap-6 p-2">

          <div
            class="bg-green-700 text-gray-200 rounded-lg shadow-xl p-6 transform hover:scale-[1.02] transition duration-300">
            <svg class="w-10 h-10 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7">
              </path>
            </svg>

            <h3 class="text-2xl font-bold mb-2">Teknik Kendaraan Ringan (TKR)</h3>
            <p class="text-gray-300">Perawatan, perbaikan, dan pemeliharaan sistem mesin kendaraan
              ringan.
            </p>
          </div>

          <div
            class="bg-green-700 text-gray-200 rounded-lg shadow-xl p-6 transform hover:scale-[1.02] transition duration-300">
            <svg class="w-10 h-10 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
              xmlns="http://www.w3.org/2000/svg">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 10v10a1 1 0 001 1h16a1 1 0 001-1V10M7 5h10M5 5h14M12 5V3m0 6v12"></path>
            </svg>

            <h3 class="text-2xl font-bold mb-2">Kuliner (Tata Boga)</h3>
            <p class="text-gray-300">Seni mengolah makanan, manajemen dapur, dan standar kebersihan
              industri.</p>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    <div class="flex justify-between items-center mt-6">
      <button @click="prevPage" :disabled="currentPage === 1"
        class="p-3 bg-gray-300 rounded-full hover:bg-gray-400 disabled:opacity-50 transition duration-150"
        aria-label="Previous Page">
        <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
          </path>
        </svg>
      </button>

      <div class="flex space-x-2">
        <template x-for="page in totalPages" :key="page">
          <button @click="currentPage = page"
            :class="{ 'bg-gray-800': currentPage === page, 'bg-gray-400': currentPage !== page }"
            class="w-3 h-3 rounded-full transition duration-300" :aria-label="'Go to page ' + page"></button>
        </template>
      </div>

      <button @click="nextPage" :disabled="currentPage === totalPages"
        class="p-3 bg-gray-300 rounded-full hover:bg-gray-400 disabled:opacity-50 transition duration-150"
        aria-label="Next Page">
        <svg class="w-6 h-6 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24"
          xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
        </svg>
      </button>
    </div>

    <p class="text-sm text-center text-gray-500 mt-4 md:hidden">
      *Pada layar kecil (mobile), slider akan menampilkan 1 Jurusan per halaman.
    </p>

  </div>

</section>