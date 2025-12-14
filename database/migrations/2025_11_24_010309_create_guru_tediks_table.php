<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('guru_tediks', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique()->nullable(); // Nomor Induk Pegawai, bisa null
            $table->string('nama_lengkap');
            $table->string('jabatan')->default('Guru Mata Pelajaran'); // Contoh: Guru Mata Pelajaran
            $table->string('bidang_studi')->nullable(); // Khusus untuk guru
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->string('nomor_hp')->nullable();
            $table->text('alamat')->nullable();
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru_tediks');
    }
};
