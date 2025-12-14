<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Models\GuruTedik as Guru;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;


class GuruTedik extends Component
{
    use WithPagination, WithFileUploads;

    public $search = '';
    public $perPage = 10;

    // form fields
    public $guru_id;
    public $nip;
    public $nama_lengkap;
    public $jabatan = 'Guru Mata Pelajaran';
    public $bidang_studi;
    public $jenis_kelamin = 'Laki-laki';
    public $nomor_hp;
    public $alamat;
    public $foto;
    public $foto_lama;

    // UI state
    public $isOpen = false;
    public $confirmDelete = false;
    public $isEdit = false;

    protected $queryString = ['search'];

    protected function rules()
    {
        return [
            'nip' => 'nullable|string|unique:guru_tediks,nip' . ($this->guru_id ? ',' . $this->guru_id : ''),
            'nama_lengkap' => 'required|string|max:255',
            'jabatan' => 'required|string',
            'bidang_studi' => 'nullable|string',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'nomor_hp' => 'nullable|string',
            'alamat' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ];
    }

    public function render()
    {
        $gurus = Guru::when($this->search, function ($q) {
            $q->where('nama_lengkap', 'like', "%{$this->search}%")
                ->orWhere('nip', 'like', "%{$this->search}%");
        })->paginate($this->perPage);

        return view('livewire.admin.guru-tedik', ['gurus' => $gurus]);
    }

    // === Modal & Mode Control ===
    public function create(){
        $this->resetForm();
        $this->isEdit = false;
        $this->isOpen = true;
    }

    public function edit($id)
    {
        $guru = Guru::findOrFail($id);

        $this->guru_id      = $guru->id;
        $this->nip          = $guru->nip;
        $this->nama_lengkap = $guru->nama_lengkap;
        $this->jabatan      = $guru->jabatan;
        $this->bidang_studi = $guru->bidang_studi;
        $this->jenis_kelamin = $guru->jenis_kelamin;
        $this->nomor_hp     = $guru->nomor_hp;
        $this->alamat       = $guru->alamat;
        $this->foto_lama    = $guru->foto;

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

        $data = $this->only(['nip', 'nama_lengkap', 'jabatan', 'bidang_studi', 'jenis_kelamin', 'nomor_hp', 'alamat']);

        if ($this->foto) {
            $data['foto'] = $this->foto->store('guru-tediks', 'public');
        }

        Guru::create($data);

        $this->dispatch('notify', 'Guru berhasil ditambahkan!');
        $this->closeModal();
    }

    public function update()
    {
        $this->validate();

        $guru = Guru::findOrFail($this->guru_id);
        $data = $this->only(['nip', 'nama_lengkap', 'jabatan', 'bidang_studi', 'jenis_kelamin', 'nomor_hp', 'alamat']);

        if ($this->foto) {
            if ($this->foto_lama) {
                Storage::disk('public')->delete($this->foto_lama);
            }
            $data['foto'] = $this->foto->store('guru-tediks', 'public');
        }

        $guru->update($data);

        $this->dispatch('notify', 'Guru berhasil diperbarui!');
        $this->closeModal();
    }

    public function delete($id)
    {
        Guru::findOrFail($id)->delete();
        $this->dispatch('notify', 'Guru berhasil dihapus!');
    }

    private function resetForm()
    {
        $this->reset([
            'guru_id',
            'nip',
            'nama_lengkap',
            'jabatan',
            'bidang_studi',
            'jenis_kelamin',
            'nomor_hp',
            'alamat',
            'foto',
            'foto_lama'
        ]);
        $this->resetValidation();
    }
}
