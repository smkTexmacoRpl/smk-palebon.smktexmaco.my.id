<section id="jurusan" class=" bg-white">

  <div x-data="sliderData(6, 2)" class="max-w-7xl mx-auto p-4 sm:p-6 lg:p-8 bg-gray-50 rounded-sm " data-aos="fade-up">

    <h2 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">
      🎓 Program Keahlian Unggulan SMK Palebon
    </h2>
    <p class="text-center text-gray-900 mb-12 max-w-2xl mx-auto">Pilihan jurusan yang sesuai passion dan prospek
      kerja masa depan</p>

    <div class="relative overflow-hidden py-8 bg-white" x-data="carousel({{ ceil($jurusan1->count() / 2) }})">

      <!-- Track Slider -->
      <div class="flex transition-transform duration-700 ease-in-out"
        :style="`transform: translateX(-${currentPage * 100}%)`">

        @foreach($jurusan1->chunk(2) as $chunk)
        <div class="w-full flex-shrink-0 px-6 md:px-12">
          <div class="grid md:grid-cols-2 gap-8 lg:gap-16 max-w-7xl mx-auto">

            @foreach($chunk as $jr)
            <div
              class="bg-white/10 backdrop-blur-md rounded-3xl shadow-2xl overflow-hidden transform hover:scale-105 hover:bg-white/20 transition duration-500 flex flex-col">

              <!-- Small Image / Thumbnail -->
              <div class="w-full h-48 md:h-64 overflow-hidden">
                @if($jr->foto ?? false)
                <img src="{{ asset('storage/' . $jr->foto) }}" alt="{{ $jr->nama_jurusan }}"
                  class="w-full h-full object-cover hover:scale-110 transition duration-700">
                @else
                <!-- Fallback jika belum ada foto -->
                <div
                  class="w-full h-full bg-gradient-to-br from-teal-700 to-green-600 flex items-center justify-center">
                  <svg class="w-20 h-20 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                </div>
                @endif
              </div>

              <!-- Content Card -->
              <div class="p-8 md:p-10 flex-1 flex flex-col justify-between">
                <div>
                  <h3 class="text-3xl md:text-4xl font-bold text-secondary mb-6">{{ $jr->nama_jurusan }}</h3>
                  <p class="text-lg text-gray-500 leading-relaxed mb-8">
                    {{ Str::limit($jr->keterangan, 220, '...') }}
                  </p>
                </div>

                <a href="{{ route('jurusan.show', $jr->slug ?? $jr->id) }}"
                  class="inline-block bg-orange-500 text-gray-600 px-8 py-4 rounded-full font-bold hover:bg-orange-600 transition shadow-lg hover:text-white">
                  Selengkapnya →
                </a>
              </div>
            </div>
            @endforeach

            <!-- Spacer jika hanya 1 jurusan di slide terakhir -->
            @if($chunk->count() == 1)
            <div class="hidden md:block"></div>
            @endif
          </div>
        </div>
        @endforeach
      </div>

      <!-- Navigasi -->
      <div class="flex justify-center items-center mt-16 gap-12">
        <button @click="prev()" :disabled="currentPage === 0"
          class="p-5 bg-white rounded-full shadow-2xl hover:bg-gray-100 disabled:opacity-50 disabled:cursor-not-allowed transition">
          <svg class="w-10 h-10 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
          </svg>
        </button>

        <div class="flex space-x-4">
          @foreach($jurusan1->chunk(2) as $index => $chunk)
          <button @click="currentPage = {{ $loop->index }}"
            :class="currentPage === {{ $loop->index }} ? 'bg-orange-500' : 'bg-gray-400'"
            class="w-4 h-4 rounded-full transition duration-300 hover:scale-125"></button>
          @endforeach
        </div>

        <button @click="next()" :disabled="currentPage === {{ ceil($jurusan1->count() / 2) - 1 }}"
          class="p-5 bg-white rounded-full shadow-2xl hover:bg-gray-100 disabled:opacity-50 disabled:cursor-not-allowed transition">
          <svg class="w-10 h-10 text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
          </svg>
        </button>
      </div>

      <p class="text-center text-gray-400 mt-10 text-sm md:hidden">
        *Geser atau gunakan tombol untuk melihat jurusan lainnya.
      </p>
    </div>

    <script>
      function carousel(totalSlides) {
  return {
    currentPage: 0,
    total: totalSlides,

    prev() {
      if (this.currentPage > 0) this.currentPage--;
    },

    next() {
      if (this.currentPage < this.total - 1) this.currentPage++;
    }
  }
}
    </script>

  </div>
</section>