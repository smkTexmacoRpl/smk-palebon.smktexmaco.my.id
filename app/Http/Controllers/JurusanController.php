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

    public function show(Jurusan $jurusan)
    {
        //
    }
}
