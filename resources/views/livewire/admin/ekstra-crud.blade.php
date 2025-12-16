<!-- resources/views/livewire/ekstrakurikuler-crud.blade.php -->
<div>
    {{-- Toast Notifikasi --}}
    <div wire:ignore.self id="toast" class="fixed top-4 right-4 z-50"></div>

    <div class="p-6 max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Data Ekstrakurikuler</h1>
            <button wire:click="create"
                class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg font-medium transition">
                + Tambah Ekstrakurikuler
            </button>
        </div>

        {{-- Search --}}
        <div class="mb-6">
            <input type="text" wire:model.live.debounce.500ms="search" placeholder="Cari nama ekstrakurikuler..."
                class="w-full max-w-md px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:outline-none">
        </div>

        {{-- Grid Card --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($ekstras as $ekstra)
            <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
                <img src="{{ asset('storage/'.$ekstra->gambar) }}" alt="{{ $ekstra->nama_ekstrakurikuler }}"
                    class="w-full h-64 object-cover">

                <div class="p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-2">
                        {{ $ekstra->nama_ekstrakurikuler }}
                    </h3>
                    <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                        {{ $ekstra->deskripsi }}
                    </p>

                    <div class="flex justify-end space-x-3">
                        <button wire:click="edit({{ $ekstra->id }})"
                            class="text-indigo-600 hover:text-indigo-800 font-medium">
                            Edit
                        </button>
                        <button wire:click="delete({{ $ekstra->id }})"
                            onclick="confirm('Yakin ingin menghapus ekstrakurikuler ini?') || event.stopImmediatePropagation()"
                            class="text-red-600 hover:text-red-800 font-medium">
                            Hapus
                        </button>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-span-full text-center py-12">
                <p class="text-gray-500 text-lg">Belum ada data ekstrakurikuler</p>
            </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-8">
            {{ $ekstras->links() }}
        </div>
    </div>

    {{-- Modal --}}
    @if($isOpen)
    <div class="fixed inset-0 z-50 flex items-center justify-center">
        <div wire:click="closeModal" class="absolute inset-0 bg-black bg-opacity-60"></div>

        <div class="relative bg-white rounded-xl shadow-2xl w-full max-w-2xl mx-4 max-h-screen overflow-y-auto">
            <div class="flex justify-between items-center p-6 border-b">
                <h3 class="text-2xl font-bold text-gray-800">
                    {{ $isEdit ? 'Edit' : 'Tambah' }} Ekstrakurikuler
                </h3>
                <button wire:click="closeModal" class="text-3xl text-gray-500 hover:text-gray-800">&times;</button>
            </div>

            <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}" class="p-6 space-y-6">
                <div>
                    <label class="block font-medium mb-1">Nama Ekstrakurikuler <span
                            class="text-red-500">*</span></label>
                    <input type="text" wire:model="nama_ekstrakurikuler"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500">
                    @error('nama_ekstrakurikuler') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block font-medium mb-1">Deskripsi <span class="text-red-500">*</span></label>
                    <textarea wire:model="deskripsi" rows="5"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-indigo-500"></textarea>
                    @error('deskripsi') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block font-medium mb-1">Gambar (max 2MB)</label>
                    @if($gambar || $gambar_lama)
                    <div class="mb-4">
                        <img src="{{ $gambar ? $gambar->temporaryUrl() : asset('storage/'.$gambar_lama) }}"
                            class="w-full h-64 object-cover rounded-lg border">
                    </div>
                    @endif
                    <input type="file" wire:model="gambar" accept="image/*"
                        class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:bg-indigo-50 file:text-indigo-700">
                    @error('gambar') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
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

    {{-- Script Toast + ESC --}}
    @script
    <script>
        $wire.on('notify', (msg) => {
            const toast = document.getElementById('toast');
            toast.innerHTML = `<div class="bg-green-600 text-white px-6 py-4 rounded-lg shadow-lg animate-fade-in">${msg}</div>`;
            setTimeout(() => toast.innerHTML = '', 4000);
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') @this.closeModal();
        });
    </script>
    @endscript
</div>