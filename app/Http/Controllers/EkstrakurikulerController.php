<?php

namespace App\Http\Controllers;

use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;

class EkstrakurikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ekstras = Ekstrakurikuler::all();
        return view('front.ekstra', [
            'ekstras' => $ekstras
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function prestasi()
    {
        //
    }
}   
