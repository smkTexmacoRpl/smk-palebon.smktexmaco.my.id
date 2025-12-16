<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jurusans = Jurusan::all();
        return view('front.jurusan-list', compact('jurusans'));
    }

    public function show($slug)
    {
        $jurusan = Jurusan::where('slug', $slug)->firstOrFail();
        return view('front.jurusan-detail', compact('jurusan'));
    }
    public function show1($slug)
    {
        $jurusan1 = Jurusan::where('slug', $slug)->firstOrFail();
        return view('components.front.__jurusan', compact('jurusan1'));
    }
}
