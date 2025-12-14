<section class="py-20 bg-primary text-white" x-data="counter(20000, 98, 50, 15)">
 <div class="container mx-auto px-6">
  <h2 class="text-4xl md:text-5xl font-bold text-center mb-16">
   Prestasi & Fakta Sekolah Kami
  </h2>

  <div class="grid grid-cols-2 md:grid-cols-4 gap-10 text-center" x-init="initObserver($el)">

   <div class="space-y-4" :data-target="targets.target1">
    <div class="text-6xl md:text-7xl font-extrabold">
     <span x-text="count1.toLocaleString(20.000)">0</span><span class="text-5xl">+</span>
    </div>
    <p class="text-xl md:text-2xl font-medium opacity-90">Siswa Aktif</p>
   </div>

   <div class="space-y-4" :data-target="targets.target2">
    <div class="text-6xl md:text-7xl font-extrabold">
     <span x-text="count2.toFixed(0)">0</span><span class="text-5xl">%</span>
    </div>
    <p class="text-xl md:text-2xl font-medium opacity-90">Lulusan Tersalurkan</p>
   </div>

   <div class="space-y-4" :data-target="targets.target3">
    <div class="text-6xl md:text-7xl font-extrabold">
     <span x-text="count3.toFixed(0)">0</span><span class="text-5xl">+</span>
    </div>
    <p class="text-xl md:text-2xl font-medium opacity-90">Mitra Industri</p>
   </div>

   <div class="space-y-4" :data-target="targets.target4">
    <div class="text-6xl md:text-7xl font-extrabold">
     <span x-text="count4.toFixed(0)">0</span>
    </div>
    <p class="text-xl md:text-2xl font-medium opacity-90">Sertifikasi Internasional</p>
   </div>
  </div>
 </div>
</section>