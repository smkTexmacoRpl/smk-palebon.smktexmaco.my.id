<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\JadwalCrud;
use App\Livewire\Admin\PrestasiCrud;


Route::middleware(['auth'])->prefix('admin')->group(function () {
  // Route::get('/', fn() => redirect()->route('admin.posts'))->name('admin.dashboard');
  // // Livewire components (index & form)
  // // Route::get('/posts', PostIndex::class)->name('admin.posts');
  // Route::get('/posts/create', PostForm::class)->name('admin.posts.create');
  // Route::get('/posts/{id}/edit', PostForm::class)->name('admin.posts.edit');
  // categories & tags simple resource controllers (or Livewire similarly)
  // Route::resource('categories', CategoryController::class)->except(['show']);
  // Route::resource('tags', TagController::class)->except(['show']);
  Route::get('/dashboard', function () {
    return view('layouts.dashboard');
  })->name('admin.dashboard');
  Route::get('kategori', function () {
    return view('admin.kategori.index');
  })->name('admin.kategori');
  Route::get('/tag', function () {
    return view('admin.tag.index');
  })->name('admin.tag');
  Route::get('/profil-sekolah', function () {
    return view('admin.webconfig.profile-sekolah');
  })->name('admin.profil-sekolah');

  Route::get('/prakata', function () {
    return view('admin.webconfig.prakata');
  })->name('admin.prakata');

  Route::get('/menu', function () {
    return view('admin.webconfig.menu');
  })->name('admin.menu');
  Route::get('/counter', function () {
    return view('admin.webconfig.counter');
  })->name('admin.counter');

  Route::get('galeri', function () {
    return view('admin.galeri.index');
  })->name('admin.galeri');

  Route::get('jenis', function () {
    return view('admin.jenisPage');
  })->name('admin.jenis');
  Route::get('blogs', function () {
    return view('admin.post.index');
  })->name('admin.blogs');
  Route::get('posts', function () {
    return view('admin.post.index');
  })->name('admin.posts');
  Route::get('/jadwal', function () {
    return view('admin.jadwal.index');
  })->name('admin.jadwal');
  Route::get('/guru_tedik', function () {
    return view('admin.guru');
  })->name('admin.tedik');
  Route::get('/jurusan', function () {
    return view('admin.jurusan');
  })->name('admin.jurusan');
  Route::get('/ekstra', function () {
    return view('admin.ekstra');
  })->name('admin.ekstra');

  Route::get('/prestasi', function () {
    return view('admin.prestasi');
  })->name('admin.prestasi');

  // Route::get('/prestasi', PrestasiCrud::class)->name('admin.prestasi');
});
