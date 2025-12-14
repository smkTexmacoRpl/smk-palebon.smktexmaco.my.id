<!-- resources/views/livewire/guru-tedik-crud.blade.php -->
<div>
    {{-- Toast Notifikasi --}}
    <div wire:ignore.self id="toast" class="fixed top-4 right-4 z-50"></div>

    <div class="p-6 max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Data Guru Tedik</h1>
            <button wire:click="create"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-medium transition">
                + Tambah Guru
            </button>
        </div>

        {{-- Search --}}
        <div class="mb-6">
            <input type="text" wire:model.live.debounce.500ms="search" placeholder="Cari nama atau NIP..."
                class="w-full max-w-md px-4 py-3 border rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
        </div>

        {{-- Table --}}
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">NIP
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Jabatan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">JK
                        </th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($gurus as $guru)
                    <tr class="hover:bg-gray-50 transition">
                        <td class="px-6 py-4">
                            <img src="{{ $guru->foto_url }}" class="w-12 h-12 rounded-full object-cover border">
                        </td>
                        <td class="px-6 py-4 text-sm">{{ $guru->nip ?? '-' }}</td>
                        <td class="px-6 py-4 font-medium">{{ $guru->nama_lengkap }}</td>
                        <td class="px-6 py-4 text-sm">{{ $guru->jabatan }}</td>
                        <td class="px-6 py-4 text-center">{{ substr($guru->jenis_kelamin, 0, 1) }}</td>
                        <td class="px-6 py-4 text-center space-x-4">
                            <button wire:click="edit({{ $guru->id }})"
                                class="text-indigo-600 hover:underline font-medium">Edit</button>
                            <button wire:click="delete({{ $guru->id }})"
                                class="text-red-600 hover:underline font-medium"
                                onclick="confirm('Yakin hapus data ini?') || event.stopImmediatePropagation()">
                                Hapus
                            </button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center py-12 text-gray-500">Tidak ada data guru</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="bg-gray-50 px-6 py-4">{{ $gurus->links() }}</div>
        </div>
    </div>

    {{-- Modal — pakai $isOpen dan $isEdit langsung (tanpa Alpine.js) --}}
    @if($isOpen)
    <div class="fixed inset-0 z-50 flex items-center justify-center">
        <!-- Backdrop -->
        <div wire:click="closeModal" class="absolute inset-0 bg-black bg-opacity-60"></div>

        <!-- Modal Box -->
        <div class="relative bg-white rounded-xl shadow-2xl w-full max-w-4xl mx-4 max-h-screen overflow-y-auto">
            <div class="flex justify-between items-center p-6 border-b">
                <h3 class="text-2xl font-bold text-gray-800">
                    {{ $isEdit ? 'Edit' : 'Tambah' }} Guru Tedik
                </h3>
                <button wire:click="closeModal" class="text-3xl text-gray-500 hover:text-gray-800">&times;</button>
            </div>

            <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" class="p-6 space-y-6">
                <!-- Form fields sama seperti sebelumnya -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block font-medium mb-1">NIP</label>
                        <input type="text" wire:model="nip"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                        @error('nip') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <label class="block font-medium mb-1">Nama Lengkap <span class="text-red-500">*</span></label>
                        <input type="text" wire:model="nama_lengkap"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                        @error('nama_lengkap') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block font-medium mb-1">Jabatan</label>
                        <input type="text" wire:model="jabatan" class="w-full px-4 py-2 border rounded-lg">
                    </div>
                    <div>
                        <label class="block font-medium mb-1">Bidang Studi</label>
                        <input type="text" wire:model="bidang_studi" class="w-full px-4 py-2 border rounded-lg">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label class="block font-medium mb-1">Jenis Kelamin</label>
                        <select wire:model="jenis_kelamin" class="w-full px-4 py-2 border rounded-lg">
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div>
                        <label class="block font-medium mb-1">Nomor HP</label>
                        <input type="text" wire:model="nomor_hp" class="w-full px-4 py-2 border rounded-lg">
                    </div>
                </div>

                <div>
                    <label class="block font-medium mb-1">Alamat</label>
                    <textarea wire:model="alamat" rows="3" class="w-full px-4 py-2 border rounded-lg"></textarea>
                </div>

                <div>
                    <label class="block font-medium mb-1">Foto (max 2MB)</label>
                    @if($foto || $foto_lama)
                    <div class="mb-4">
                        <img src="{{ $foto ? $foto->temporaryUrl() : asset('storage/'.$foto_lama) }}"
                            class="w-32 h-32 object-cover rounded-lg border-4 border-gray-200">
                    </div>
                    @endif
                    <input type="file" wire:model="foto" accept="image/*"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-indigo-50 file:text-indigo-700">
                    @error('foto') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="flex justify-end gap-4 pt-6 border-t">
                    <button type="button" wire:click="closeModal"
                        class="px-6 py-3 border rounded-lg hover:bg-gray-100 transition">
                        Batal
                    </button>
                    <button type="submit"
                        class="px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                        {{ $isEdit ? 'Update' : 'Simpan' }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif

    {{-- Toast + ESC Close --}}
    @script
    <script>
        $wire.on('notify', (msg) => {
            const toast = document.getElementById('toast');
            toast.innerHTML = `<div class="bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg animate-fade-in-down">${msg}</div>`;
            setTimeout(() => toast.innerHTML = '', 3000);
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') @this.closeModal();
        });
    </script>
    @endscript
</div>