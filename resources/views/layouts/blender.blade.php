@extends('layouts.utama')
@section('title','tutorial blender')
@section('styles')
<style>
 body {
  font-family: Arial, sans-serif;
  line-height: 1.6;
  margin: 40px;
  background-color: #f9f9f9;
  color: #333;
 }

 h1,
 h2 {
  color: #2c3e50;
 }

 h1 {
  text-align: center;
 }

 img {
  max-width: 100%;
  height: auto;
  display: block;
  margin: 20px auto;
  border: 1px solid #ddd;
  border-radius: 8px;
 }

 pre {
  background: #eee;
  padding: 10px;
  border-radius: 5px;
 }

 ul {
  list-style-type: disc;
  margin-left: 20px;
 }

 .caption {
  text-align: center;
  font-style: italic;
  margin-top: 10px;
 }
</style>
@section('content')

<div>

 <h1>Panduan Penggunaan Blender Versi 4.5 untuk Siswa Jurusan Desain Komunikasi Visual (DKV)</h1>

 <p>Blender 4.5 adalah versi Long Term Support (LTS) yang dirilis pada Juli 2025, didukung hingga Juli 2027. Software
  open-source gratis ini sangat powerful untuk membuat konten 3D, animasi, visual effects, dan ilustrasi digital. Bagi
  siswa DKV, Blender cocok untuk proyek seperti desain poster 3D, animasi promosi, motion graphics, karakter untuk
  branding, hingga visualisasi produk. Artikel ini disusun secara sistematis dan berurut, mulai dari dasar hingga
  aplikasi praktis, agar mudah diikuti oleh pemula.</p>

 <h2>1. Pengenalan Blender 4.5</h2>
 <p>Blender adalah software all-in-one untuk kreasi 3D: modeling, texturing, lighting, animation, rendering, hingga
  editing video. Versi 4.5 membawa peningkatan performa seperti dukungan penuh Vulkan (lebih cepat di GPU modern),
  shader compilation multi-threaded, dan fitur baru seperti shadow terminator bias untuk model low-poly.</p>

 <p>Keunggulan untuk DKV:</p>
 <ul>
  <li>Gratis dan legal.</li>
  <li>Bisa buat aset 3D untuk iklan, branding, atau media sosial.</li>
  <li>Integrasi dengan tools lain seperti Adobe (export FBX/GLTF).</li>
 </ul>

 <p>Download resmi di blender.org (versi terbaru saat ini sekitar 4.5.x).</p>

 <img src="https://upload.wikimedia.org/wikipedia/commons/e/ec/Blender_4.5.1_startup_screen.png"
  alt="Tampilan startup Blender 4.5">
 <div class="caption">Tampilan startup Blender 4.5 dengan interface default</div>

 <img src="https://docs.blender.org/manual/en/latest/_images/interface_window-system_introduction_default-screen.png"
  alt="Contoh workspace Blender 4.5">
 <div class="caption">Contoh workspace Blender 4.5 dengan panel-panel utama</div>

 <h2>2. Instalasi dan Pengaturan Awal</h2>
 <ul>
  <li>Download dari situs resmi Blender.org (pilih versi Windows, macOS, atau Linux).</li>
  <li>Instal seperti software biasa.</li>
  <li>Saat pertama buka, pilih bahasa (ada Indonesia, tapi English lebih lengkap untuk tutorial).</li>
  <li>Atur preferences: Edit > Preferences > System > Aktifkan Vulkan untuk performa lebih baik (jika GPU support).</li>
  <li>Simpan startup file agar pengaturan default tersimpan.</li>
 </ul>

 <p>Tips: Gunakan mouse dengan scroll wheel untuk navigasi viewport.</p>

 <h2>3. Memahami Interface Blender</h2>
 <p>Interface Blender terdiri dari beberapa area utama:</p>
 <ul>
  <li><strong>Top Bar</strong>: Menu utama (File, Edit, dll.).</li>
  <li><strong>3D Viewport</strong>: Area utama untuk melihat dan edit objek 3D.</li>
  <li><strong>Outliner</strong>: Daftar objek di scene.</li>
  <li><strong>Properties Editor</strong>: Tab untuk material, lighting, dll.</li>
  <li><strong>Timeline</strong>: Untuk animasi (di bawah viewport).</li>
 </ul>

 <p>Gunakan shortcut:</p>
 <ul>
  <li>Orbit: Tekan tengah mouse + drag.</li>
  <li>Zoom: Scroll wheel.</li>
  <li>Pan: Shift + tengah mouse + drag.</li>
  <li>Ganti mode: Tab (Object Mode ↔ Edit Mode).</li>
 </ul>

 <img src="https://docs.blender.org/manual/en/2.82/_images/interface_window-system_workspaces_layout.png"
  alt="Layout interface lengkap">
 <div class="caption">Layout interface lengkap di Blender 4.5</div>

 <h2>4. Navigasi dan Manipulasi Dasar</h2>
 <ul>
  <li>Tambah objek: Shift + A (Mesh > Cube, dll.).</li>
  <li>Transformasi:
   <ul>
    <li>Pindah (Grab): G</li>
    <li>Rotasi: R</li>
    <li>Skala: S</li>
    <li>Ikuti sumbu: + X/Y/Z (misal G + X untuk sumbu X).</li>
   </ul>
  </li>
  <li>Seleksi: Klik kanan (default), atau A untuk select all.</li>
  <li>Hapus: X atau Delete.</li>
 </ul>

 <p>Latihan: Buat scene sederhana dengan cube, sphere, dan cylinder.</p>

 <h2>5. Modeling Dasar</h2>
 <p>Modeling adalah membuat bentuk 3D. Mulai dari primitive shapes.</p>
 <ul>
  <li>Masuk Edit Mode (Tab).</li>
  <li>Tools: Extrude (E), Inset (I), Loop Cut (Ctrl + R), Bevel (Ctrl + B).</li>
  <li>Proportional Editing: O (untuk edit halus).</li>
 </ul>

 <p>Contoh untuk DKV: Model objek produk seperti botol atau logo 3D.</p>

 <img src="https://i.ytimg.com/vi/6oE2_ijI4-c/hq720.jpg" alt="Contoh modeling karakter sederhana">
 <div class="caption">Contoh modeling karakter sederhana untuk pemula</div>

 <img src="https://i.ytimg.com/vi/S7zRQjDQmS0/maxresdefault.jpg" alt="Tutorial modeling karakter dasar">
 <div class="caption">Tutorial modeling karakter dasar</div>

 <h2>6. Texturing dan Material</h2>
 <ul>
  <li>Switch ke Shading workspace.</li>
  <li>Gunakan Shader Editor.</li>
  <li>Tambah material: Principled BSDF untuk material realistis.</li>
  <li>UV Unwrapping: Edit Mode > U > Unwrap.</li>
  <li>Tambah texture gambar untuk logo atau pola.</li>
 </ul>

 <p>Berguna untuk visual produk di DKV.</p>

 <h2>7. Lighting dan Camera</h2>
 <ul>
  <li>Tambah light: Shift + A > Light (Sun, Point, Area).</li>
  <li>Camera: Shift + A > Camera, lalu Ctrl + Alt + Numpad 0 untuk view dari camera.</li>
  <li>Atur exposure dan color temperature (fitur baru di 4.5).</li>
 </ul>

 <h2>8. Rendering</h2>
 <ul>
  <li>Pilih engine: EEVEE (cepat, real-time) atau Cycles (realistis).</li>
  <li>Render image: F12.</li>
  <li>Render animation: Ctrl + F12.</li>
 </ul>

 <img src="https://i.ytimg.com/vi/hA55WRkmaSA/maxresdefault.jpg" alt="Contoh render scene realistis">
 <div class="caption">Contoh render scene interior realistis</div>

 <img src="https://i.ytimg.com/vi/1bkMSxJb_sU/maxresdefault.jpg" alt="Render archviz">
 <div class="caption">Render visualisasi arsitektur dengan Blender</div>

 <h2>9. Animasi Dasar</h2>
 <ul>
  <li>Gunakan Timeline di bawah.</li>
  <li>Insert keyframe: I (Location/Rotation/Scale).</li>
  <li>Play: Spacebar.</li>
 </ul>

 <p>Contoh untuk motion graphics DKV.</p>

 <img src="https://i.ytimg.com/vi/fT2rRiECmzc/maxresdefault.jpg" alt="Timeline animasi">
 <div class="caption">Timeline animasi di Blender</div>

 <h2>10. Aplikasi Lanjutan untuk DKV</h2>
 <ul>
  <li>Grease Pencil: Untuk ilustrasi 2D/3D hybrid (storyboard, animasi 2D).</li>
  <li>Geometry Nodes: Procedural design (fitur baru di 4.5 lebih powerful).</li>
  <li>Video Sequence Editor: Edit video + tambah efek 3D.</li>
  <li>Export: Untuk After Effects atau Premiere (GLTF/FBX).</li>
 </ul>

 <h2>11. Tips Belajar dan Sumber Daya</h2>
 <ul>
  <li>Latihan donut tutorial klasik (Blender Guru di YouTube).</li>
  <li>Channel: CG Cookie, Blender Guru, Dillongoo.</li>
  <li>Komunitas: Blender Artists, Reddit r/blender.</li>
  <li>Praktik proyek DKV: Buat animasi logo, visual produk 3D, atau motion poster.</li>
 </ul>

 <p>Dengan Blender 4.5, siswa DKV bisa berkreasi tanpa batas biaya. Mulai dari dasar, latihan rutin, dan eksplorasi
  fitur baru seperti Vulkan untuk performa lebih cepat. Selamat mencoba! 🚀</p>

</div>
@endsection