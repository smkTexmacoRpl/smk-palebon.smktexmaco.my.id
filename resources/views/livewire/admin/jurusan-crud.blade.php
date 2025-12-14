{{-- resources/views/livewire/jurusan-crud.blade.php --}}
<div>
    <div class="p-6 bg-white rounded-lg shadow">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Manajemen Jurusan</h1>
            <button wire:click="openModal"
                class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                + Tambah Jurusan
            </button>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kode
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama
                            Jurusan</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Foto
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($jurusans as $index => $jurusan)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $jurusans->firstItem() + $index }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">{{ $jurusan->kode_jurusan ?? '-' }}</td>
                        <td class="px-6 py-4 text-sm">{{ $jurusan->nama_jurusan }}</td>
                        <td class="px-6 py-4">
                            @if($jurusan->foto)
                            <img src="{{ asset('storage/'.$jurusan->foto) }}" alt="{{ $jurusan->nama_jurusan }}"
                                class="h-12 w-12 object-cover rounded">
                            @else
                            <span class="text-gray-400 text-xs">Tidak ada foto</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium space-x-2">
                            <button wire:click="openModal({{ $jurusan->id }})"
                                class="text-indigo-600 hover:text-indigo-900">Edit</button>
                            <button wire:click="delete({{ $jurusan->id }})"
                                wire:confirm="Yakin ingin menghapus jurusan ini?"
                                class="text-red-600 hover:text-red-900">Hapus</button>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">Belum ada data jurusan.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-4">
                {{ $jurusans->links() }}
            </div>
        </div>
    </div>

    <!-- Modal -->
    @if($isOpen)
    <div class="fixed inset-0 z-50 overflow-y-auto">
        <div class="flex items-center justify-center min-h-screen px-4">
            <div class="fixed inset-0 bg-black opacity-50" wire:click="closeModal"></div>

            <div class="relative bg-white rounded-lg max-w-3xl w-full p-6 shadow-xl">
                <h2 class="text-xl font-bold mb-4">{{ $isEdit ? 'Edit' : 'Tambah' }} Jurusan</h2>

                <form wire:submit.prevent="{{ $isEdit ? 'update' : 'store' }}">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Kode Jurusan</label>
                            <input type="text" wire:model="kode_jurusan"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @error('kode_jurusan') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nama Jurusan <span
                                    class="text-red-500">*</span></label>
                            <input type="text" wire:model.live="nama_jurusan"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                            @error('nama_jurusan') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Slug (otomatis)</label>
                            <input type="text" wire:model="slug" readonly
                                class="mt-1 block w-full rounded-md border-gray-300 bg-gray-100 shadow-sm sm:text-sm">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Peluang Kerja</label>
                            <input type="text" wire:model="peluang_kerja"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Foto Jurusan</label>
                            <input type="file" wire:model="foto" accept="image/*"
                                class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                            @if($fotoLama)
                            <div class="mt-2">
                                <img src="{{ asset('storage/'.$fotoLama) }}" alt="Current" class="h-24 rounded border">
                                <p class="text-xs text-gray-500 mt-1">Foto saat ini</p>
                            </div>
                            @endif
                            @error('foto') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Keterangan</label>
                            <textarea wire:model="keterangan" rows="3"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Materi</label>
                            <textarea wire:model="materi" rows="4"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"></textarea>
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end space-x-3">
                        <button type="button" wire:click="closeModal"
                            class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 transition">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                            {{ $isEdit ? 'Update' : 'Simpan' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif

    <!-- Toast Notification (optional, gunakan package atau JS sederhana) -->
    <div>
        @if (session()->has('toast'))
        <div class="fixed bottom-4 right-4 bg-green-600 text-white px-6 py-3 rounded-lg shadow-lg">
            {{ session('toast') }}
        </div>
        @endif
    </div>
</div>

@push('scripts')
<script>
    document.addEventListener('livewire:init', () => {
        Livewire.on('toast', (event) => {
            // Bisa pakai Toast library atau alert biasa
            alert(event.message);
        });
    });
</script>
@endpush