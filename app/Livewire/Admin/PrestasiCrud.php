<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Prestasi;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;



class PrestasiCrud extends Component
{
    use WithFileUploads;
    public $judul = '';
    public $keterangan = '';
    public $team = '';
    public $gambar = [];
    public $prestasiId = null;
    public $existingGambar = [];

    public $showModal = false;
    public $toast = ['message' => '', 'type' => ''];

    // Loading states
    public $isProcessing = false; // untuk store, update, delete

    protected $rules = [
        'judul' => 'required|string|max:255',
        'keterangan' => 'nullable|string',
        'team' => 'nullable|string',
        'gambar.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
    ];

    public function render()
    {
        $prestasis = Prestasi::latest()->get();
        return view('livewire.admin.prestasi-crud', compact('prestasis'));
    }

    public function create()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function store()
    {
        $this->validate();

        $this->isProcessing = true;

        $paths = [];
        if ($this->gambar) {
            foreach ($this->gambar as $image) {
                $paths[] = $image->store('prestasi', 'public');
            }
        }

        Prestasi::create([
            'judul' => $this->judul,
            'keterangan' => $this->keterangan,
            'team' => $this->team,
            'gambar' => $paths,
        ]);

        $this->toast = ['message' => 'Prestasi berhasil ditambahkan!', 'type' => 'success'];
        $this->isProcessing = false;
        $this->closeModal();
    }

    public function edit($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        $this->prestasiId = $id;
        $this->judul = $prestasi->judul;
        $this->keterangan = $prestasi->keterangan;
        $this->team = $prestasi->team;
        $this->existingGambar = $prestasi->gambar ?? [];

        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();

        $this->isProcessing = true;

        $prestasi = Prestasi::findOrFail($this->prestasiId);
        $paths = $prestasi->gambar ?? [];

        if ($this->gambar) {
            foreach ($paths as $old) {
                Storage::disk('public')->delete($old);
            }
            $paths = [];
            foreach ($this->gambar as $image) {
                $paths[] = $image->store('prestasi', 'public');
            }
        }

        $prestasi->update([
            'judul' => $this->judul,
            'keterangan' => $this->keterangan,
            'team' => $this->team,
            'gambar' => $paths,
        ]);

        $this->toast = ['message' => 'Prestasi berhasil diperbarui!', 'type' => 'success'];
        $this->isProcessing = false;
        $this->closeModal();
    }
    public function confirmDelete($id)
{
    try {
        $prestasi = Prestasi::findOrFail($id);

        if ($prestasi->gambar) {
            foreach ((array) $prestasi->gambar as $path) {
                if (Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
            }
        }

        $prestasi->delete();

        $this->toast = [
            'message' => 'Prestasi berhasil dihapus!',
            'type' => 'success'
        ];

    } catch (\Exception $e) {
        $this->toast = [
            'message' => 'Gagal menghapus data',
            'type' => 'error'
        ];
    }
}



    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    private function resetForm()
    {
        $this->prestasiId = null;
        $this->judul = '';
        $this->keterangan = '';
        $this->team = '';
        $this->gambar = [];
        $this->existingGambar = [];
        $this->resetErrorBag();
    }
}
