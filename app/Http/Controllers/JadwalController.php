<?php

namespace App\Http\Controllers;

use App\Models\JadwalPelajaran;

use Illuminate\Http\Request;

class JadwalController extends Controller
{
    public function jadwal()
    {
        $jadwal = JadwalPelajaran::where('jenis', 'jadwal')->first();
        return view('front.jadwal', compact('jadwal'));
    }
    public function kalenderAkademik()
    {
        $kalender = JadwalPelajaran::where('jenis', 'kalender')->first();
        return view('front.kalender_akademik', compact('kalender'));
    }
    public function kurikulum()
    {
        $kurikulum = JadwalPelajaran::where('jenis', 'kurikulum')->first();
        return view('front.kurikulum', compact('kurikulum'));
    }
}
