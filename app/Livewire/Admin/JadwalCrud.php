<?php

namespace App\Livewire\Admin;


use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\JadwalPelajaran as Jadwal;
use Illuminate\Support\Facades\Storage;

class JadwalCrud extends Component
{

    use WithFileUploads;

    public $pdfFiles;
    public $nama;
    public $jenis;
    public $file;
    public $editingId = null;
    public $editingName;
    public $editingJenis;
    public $editingFile;
    public function mount()
    {
        $this->pdfFiles = Jadwal::all();
    }
    public function render()
    {
        return view('livewire.admin.jadwal-crud');
    }
    public function create()
    {
        $this->validate([
            'nama' => 'required|string|max:255',
            'jenis' => 'required|nullable|string|max:255',
            'file' => 'required|file|mimes:pdf|max:2048', // Max 2MB
        ]);

        $path = $this->file->store('pdfs', 'public');

        Jadwal::create([
            'nama' => $this->nama,
            'jenis' => $this->jenis,
            'path' => $path,
        ]);

        $this->reset(['nama', 'jenis', 'file']);
        $this->pdfFiles = Jadwal::all();
    }
    public function edit($id)
    {
        $pdf = Jadwal::find($id);
        $this->editingId = $id;
        $this->editingName = $pdf->nama;
        $this->editingJenis = $pdf->jenis;
        // File lama tidak di-reset, tapi bisa diganti
    }

    public function update()
    {
        $pdf = Jadwal::find($this->editingId);

        $this->validate([
            'editingName' => 'required|string|max:255',
            'editingJenis' => 'nullable|string|max:255',
            'editingFile' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        if ($this->editingFile) {
            // Hapus file lama
            Storage::disk('public')->delete($pdf->path);
            $path = $this->editingFile->store('pdfs', 'public');
            $pdf->path = $path;
        }

        $pdf->nama = $this->editingName;
        $pdf->jenis = $this->editingJenis;
        $pdf->save();

        $this->reset(['editingId', 'editingName', 'editingJenis', 'editingFile']);
        $this->pdfFiles = Jadwal::all();
    }

    public function delete($id)
    {
        $pdf = Jadwal::find($id);
        Storage::disk('public')->delete($pdf->path);
        $pdf->delete();

        $this->pdfFiles = Jadwal::all();
    }
}
