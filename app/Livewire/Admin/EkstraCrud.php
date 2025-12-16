<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Ekstrakurikuler;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;

class EkstraCrud extends Component
{
    use WithFileUploads, WithPagination;

    public $search = '';

    public $isOpen = false;
    public $isEdit = false;

    public $ekstra_id;
    public $nama_ekstrakurikuler;
    public $deskripsi;
    public $gambar;
    public $gambar_lama;

    protected function rules()
    {
        return [
            'nama_ekstrakurikuler' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048',
        ];
    }
    public function render()
    {
        return view('livewire.admin.ekstra-crud', [
            'ekstras' => Ekstrakurikuler::when($this->search, function ($q) {
                $q->where('nama_ekstrakurikuler', 'like', "%{$this->search}%");
            })
                ->latest()
                ->paginate(10)
        ]);
    }
    public function create()
    {
        $this->resetForm();
        $this->isEdit = false;
        $this->isOpen = true;
    }

    public function edit($id)
    {
        $ekstra = Ekstrakurikuler::findOrFail($id);

        $this->ekstra_id = $ekstra->id;
        $this->nama_ekstrakurikuler = $ekstra->nama_ekstrakurikuler;
        $this->deskripsi = $ekstra->deskripsi;
        $this->gambar_lama = $ekstra->gambar;

        $this->isEdit = true;
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetForm();
    }

    public function store()
    {
        $this->validate();

        $data = [
            'nama_ekstrakurikuler' => $this->nama_ekstrakurikuler,
            'deskripsi' => $this->deskripsi,
        ];

        if ($this->gambar) {
            $data['gambar'] = $this->gambar->store('ekstrakurikuler', 'public');
        }

        Ekstrakurikuler::create($data);

        $this->dispatch('notify', 'Ekstrakurikuler berhasil ditambahkan!');
        $this->closeModal();
    }

    public function update()
    {
        $this->validate();

        $ekstra = Ekstrakurikuler::findOrFail($this->ekstra_id);

        $data = [
            'nama_ekstrakurikuler' => $this->nama_ekstrakurikuler,
            'deskripsi' => $this->deskripsi,
        ];

        if ($this->gambar) {
            if ($this->gambar_lama) {
                Storage::disk('public')->delete($this->gambar_lama);
            }
            $data['gambar'] = $this->gambar->store('ekstrakurikuler', 'public');
        }

        $ekstra->update($data);

        $this->dispatch('notify', 'Ekstrakurikuler berhasil diperbarui!');
        $this->closeModal();
    }

    public function delete($id)
    {
        Ekstrakurikuler::findOrFail($id)->delete();
        $this->dispatch('notify', 'Ekstrakurikuler berhasil dihapus!');
    }

    private function resetForm()
    {
        $this->reset([
            'ekstra_id',
            'nama_ekstrakurikuler',
            'deskripsi',
            'gambar',
            'gambar_lama'
        ]);
        $this->resetValidation();
    }
}
