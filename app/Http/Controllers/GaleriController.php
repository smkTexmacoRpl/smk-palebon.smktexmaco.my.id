<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Galeri;
use App\Models\Kategori;

class GaleriController extends Controller
{
    public function index()
    {
        $kategoris = Kategori::with('galeries')->get();
        $galeris = Galeri::with('kategori')->get();
        $galeri = $galeris->map(function ($g) {
            // Normalize fotos to a single filename (handles string, array, or Collection)
            $file = null;
            if ($g->fotos) {
                if (is_array($g->fotos)) {
                    $file = $g->fotos[0] ?? null;
                } elseif ($g->fotos instanceof \Illuminate\Support\Collection) {
                    $file = $g->fotos->first();
                } else {
                    $file = $g->fotos;
                }
            }

            $src = $file ? \Illuminate\Support\Facades\Storage::disk('public')->url('galeri/' . $file) : null;

            return [
                'id' => $g->id,
                'src' => $src,
                'category_id' => $g->kategori_id,
                'category_name' => $g->kategori->nama_kategori ?? null,
            ];
        })->filter(fn($item) => $item['src'] !== null)->values()->toArray();
        return view('front.galeri', compact('galeri', 'galeris', 'kategoris'));
    }
}
