<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use App\Models\Jurusan;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class JurusanCrud extends Component
{
    use WithFileUploads;

    public $isOpen = false;
    public $isEdit = false;
    public $jurusanId;

    public $kode_jurusan;
    public $nama_jurusan;
    public $slug;
    public $keterangan;
    public $peluang_kerja;
    public $materi;
    public $foto;
    public $fotoLama;

    protected $rules = [
        'kode_jurusan' => 'nullable|string|max:10|unique:jurusans,kode_jurusan',
        'nama_jurusan' => 'required|string|max:255',
        'keterangan'   => 'nullable|string',
        'peluang_kerja' => 'nullable|string|max:255',
        'materi'       => 'nullable|string',
        'foto'         => 'nullable|image|max:2048', // 2MB
    ];

    public function updatedNamaJurusan($value)
    {
        $this->slug = Str::slug($value);
    }

    public function openModal($id = null)
    {
        $this->resetErrorBag();
        $this->isOpen = true;

        if ($id) {
            $this->isEdit = true;
            $this->jurusanId = $id;
            $jurusan = Jurusan::findOrFail($id);

            $this->kode_jurusan   = $jurusan->kode_jurusan;
            $this->nama_jurusan   = $jurusan->nama_jurusan;
            $this->slug           = $jurusan->slug;
            $this->keterangan     = $jurusan->keterangan;
            $this->peluang_kerja  = $jurusan->peluang_kerja;
            $this->materi         = $jurusan->materi;
            $this->fotoLama       = $jurusan->foto;
        } else {
            $this->resetForm();
        }
    }

    public function closeModal()
    {
        $this->isOpen = false;
        $this->resetForm();
    }

    public function resetForm()
    {
        $this->isEdit = false;
        $this->jurusanId = null;
        $this->kode_jurusan = null;
        $this->nama_jurusan = null;
        $this->slug = null;
        $this->keterangan = null;
        $this->peluang_kerja = null;
        $this->materi = null;
        $this->foto = null;
        $this->fotoLama = null;
    }

    public function store()
    {
        $this->validate(array_merge($this->rules, [
            'kode_jurusan' => 'nullable|string|max:10|unique:jurusans,kode_jurusan',
        ]));

        $data = [
            'kode_jurusan'  => $this->kode_jurusan,
            'nama_jurusan'  => $this->nama_jurusan,
            'slug'          => $this->slug,
            'keterangan'    => $this->keterangan,
            'peluang_kerja' => $this->peluang_kerja,
            'materi'        => $this->materi,
        ];

        if ($this->foto) {
            $path = $this->foto->store('jurusan', 'public');
            $data['foto'] = $path;

            // Hapus foto lama jika ada
            if ($this->fotoLama) {
                Storage::disk('public')->delete($this->fotoLama);
            }
        }

        Jurusan::create($data);

        $this->dispatch('toast', message: 'Jurusan berhasil ditambahkan!', type: 'success');
        $this->closeModal();
    }

    public function update()
    {
        $this->validate(array_merge($this->rules, [
            'kode_jurusan' => 'nullable|string|max:10|unique:jurusans,kode_jurusan,' . $this->jurusanId,
            'slug'         => 'required|string|unique:jurusans,slug,' . $this->jurusanId,
        ]));

        $jurusan = Jurusan::findOrFail($this->jurusanId);

        $data = [
            'kode_jurusan'  => $this->kode_jurusan,
            'nama_jurusan'  => $this->nama_jurusan,
            'slug'          => $this->slug,
            'keterangan'    => $this->keterangan,
            'peluang_kerja' => $this->peluang_kerja,
            'materi'        => $this->materi,
        ];

        if ($this->foto) {
            $path = $this->foto->store('jurusan', 'public');
            $data['foto'] = $path;

            if ($jurusan->foto) {
                Storage::disk('public')->delete($jurusan->foto);
            }
        }

        $jurusan->update($data);

        $this->dispatch('toast', message: 'Jurusan berhasil diperbarui!', type: 'success');
        $this->closeModal();
    }

    public function delete($id)
    {
        Jurusan::findOrFail($id)->delete();
        $this->dispatch('toast', message: 'Jurusan berhasil dihapus!', type: 'success');
    }

    public function render()
    {
        return view('livewire.admin.jurusan-crud', [
            'jurusans' => Jurusan::latest()->paginate(10)
        ]);
    }
}
