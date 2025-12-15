<?php

// use App\Http\Controllers\KategoriController;
use App\Livewire\Admin\PostForm;
use App\Livewire\Admin\PostIndex;
use App\Livewire\Admin\TagController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;
use App\Livewire\Admin\CategoryController;

Route::get('/home', [SiteController::class, 'home'])->name('home1');
Route::get('/posts/{slug}', [SiteController::class, 'show'])->name('posts.show');
Route::get('/categori/{slug}', [SiteController::class, 'category'])->name('categori.show');
Route::get('/tag/{slug}', [SiteController::class, 'tag'])->name('tag.show');
Route::get('/artikel', [SiteController::class, 'artikel'])->name('artikel.index');
Route::get('/berita', [SiteController::class, 'berita'])->name('semua-berita');


Route::get('/kontak', [SiteController::class, 'kontak'])->name('kontak.index');
Route::post('/kontak', [SiteController::class, 'kontak_send'])->name('kontak.send');

Route::get('/sambutan', [SiteController::class, 'sambutan'])->name('sambutan.index');


Route::get('/', function () {
    return view('front.home');
})->name('home');
// Route::get('/blender', function () {
//     return view('layouts.blender');
// })->name('blender');

Route::get('/galeri', [App\Http\Controllers\GaleriController::class, 'index'])->name('galeri.index');
Route::get('/visi_misi', [App\Http\Controllers\ProfilController::class, 'index'])->name('visi-misi');
Route::get('/sejarah', [App\Http\Controllers\ProfilController::class, 'sejarah'])->name('sejarah');

Route::get('/detail_berita', [App\Http\Controllers\BlogController::class, 'index'])->name('detail-berita');
Route::get('/struktur_organisasi', [App\Http\Controllers\ProfilController::class, 'struktur'])->name('struktur-organisasi');
Route::get('/guru_tedik', [App\Http\Controllers\GuruCOntroller::class, 'index'])->name('tedik.index');

Route::get('/kompetensi-keahlian', [App\Http\Controllers\JurusanController::class, 'index'])->name('jurusan.index');
Route::get('/jurusan/{slug}', [App\Http\Controllers\JurusanController::class, 'show'])->name('jurusan.show');
// Route::get('/fasilitas', [App\Http\Controllers\FasilitasController::class, 'index'])->name('fasilitas.index');
Route::get('kalender', [App\Http\Controllers\JadwalController::class, 'kalenderAkademik'])->name('kalender-akademik.index');
Route::get('jadwal', [App\Http\Controllers\JadwalController::class, 'jadwal'])->name('jadwal.index');
Route::get('kurikulum', [App\Http\Controllers\JadwalController::class, 'kurikulum'])->name('kurikulum.index');


Route::get('card', function () {
    return view('card');
})->name('card');

// Route::get('/kategori', function () {
//     return view('kategori.index');
// });

require __DIR__ . '/admin.php';
require __DIR__ . '/auth.php';
