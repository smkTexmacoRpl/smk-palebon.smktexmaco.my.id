<div>
    <!-- Toast Notification -->
    @if($toast['message'])

    <div <div x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 2000); 
                $watch('show', value => { if (!value) setTimeout(() => @this.set('toast', { message: '', type: '' }), 300) })" x-show="show"
        x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="opacity-0 transform translate-y-4"
        x-transition:enter-end="opacity-100 transform translate-y-0"
        x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform translate-y-4" class="fixed top-6 right-2 z-50 animate-fade-in">



        <div class="bg-green-500 text-white px-4 py-4 rounded-lg shadow-lg flex items-center space-x-3">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
            </svg>
            <span>{{ $toast['message'] }}</span>
        </div>
    </div>

    <script>
        setTimeout(() => @this.set('toast', { message: '', type: '' }), 3000);
    </script>
    @endif

    <!-- Loading Overlay Global (untuk delete & proses berat) -->
    <div wire:loading wire:target="store,update,delete"
        class="fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center">
        <div class="bg-white rounded-lg p-6 flex items-center space-x-4">
            <svg class="animate-spin h-8 w-8 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                <path class="opacity-75" fill="currentColor"
                    d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                </path>
            </svg>
            <span class="text-lg font-medium">Memproses...</span>
        </div>
    </div>

    <!-- Tombol Tambah -->
    <div class="mb-6">
        <button wire:click="create"
            class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 shadow transition">
            Tambah Prestasi
        </button>
    </div>

    <!-- Tabel -->
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Judul
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Keterangan</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Team</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gambar
                    </th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($prestasis as $prestasi)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $prestasi->judul }}</td>
                    <td class="px-6 py-4">{{ Str::limit($prestasi->keterangan, 50) }}</td>
                    <td class="px-6 py-4">{{ $prestasi->team }}</td>
                    <td class="px-6 py-4">
                        @if($prestasi->gambar)
                        <div class="flex space-x-2">
                            @foreach($prestasi->gambar as $img)
                            <img src="{{ Storage::url($img) }}" class="w-16 h-16 object-cover rounded border">
                            @endforeach
                        </div>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-sm font-medium space-x-4">
                        <button wire:click="edit({{ $prestasi->id }})"
                            class="text-indigo-600 hover:text-indigo-900">Edit</button>
                        <button wire:click="confirmDelete({{ $prestasi->id }})"
                            wire:confirm="Yakin ingin menghapus prestasi ini?"
                            class="text-red-600 hover:text-red-900 relative">
                            Hapus

                            <span wire:loading wire:target="confirmDelete({{ $prestasi->id }})" class="ml-2">
                                <svg class="animate-spin h-4 w-4 text-red-600 inline" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8v-4a8 8 0 00-8 8h4z"></path>
                                </svg>
                            </span>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if($showModal)
    <div class="fixed inset-0 z-40 bg-black/50 bg-opacity-50 flex items-center justify-center p-4 overflow-y-auto">
        <div class="mt-[10vh] bg-white rounded-xl shadow-2xl max-w-3xl w-full max-h-[90vh] overflow-y-auto">
            <div class="p-5">
                <!-- Judul Modal -->
                <h2 class="text-3xl font-bold mb-8 text-center text-gray-800">
                    {{ $prestasiId ? 'Edit' : 'Tambah' }} Prestasi
                </h2>

                <form wire:submit.prevent="{{ $prestasiId ? 'update' : 'store' }}">
                    <!-- Grid 2 Kolom -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Kolom Kiri -->
                        <div class="space-y-6">
                            <!-- Judul -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Judul</label>
                                <input type="text" wire:model.live="judul"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                                @error('judul')
                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Keterangan -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Keterangan</label>
                                <textarea wire:model.live="keterangan" rows="5"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition"></textarea>
                                @error('keterangan')
                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Team -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Team</label>
                                <input type="text" wire:model.live="team"
                                    class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition">
                                @error('team')
                                <span class="text-red-500 text-sm mt-1 block">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <!-- Kolom Kanan: Upload Gambar + Preview -->
                        <div class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Gambar (multiple)
                                </label>
                                <input type="file" wire:model="gambar" multiple
                                    class="w-full text-sm text-gray-600 file:mr-4 file:py-3 file:px-6 file:rounded-lg file:border-0 file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition">

                                <!-- Loading saat upload -->
                                <div wire:loading wire:target="gambar"
                                    class="mt-3 text-blue-600 text-sm flex items-center">
                                    <svg class="animate-spin h-5 w-5 mr-2" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                            stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor"
                                            d="M4 12a8 8 0 018-8v-4a8 8 0 00-8 8h4z"></path>
                                    </svg>
                                    Mengunggah gambar...
                                </div>

                                @error('gambar.*')
                                <span class="text-red-500 text-sm block mt-1">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Preview Gambar Baru (yang baru diupload) -->
                            @if($gambar)
                            <div>
                                <p class="text-sm font-medium text-gray-700 mb-3">Preview Gambar Baru:</p>
                                <div class="grid grid-cols-3 gap-4">
                                    @foreach($gambar as $img)
                                    <div class="relative group">
                                        <img src="{{ $img->temporaryUrl() }}"
                                            class="w-full h-40 object-cover rounded-lg border shadow-lg">
                                        <div
                                            class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-40 rounded-lg transition flex items-center justify-center">
                                            <span
                                                class="text-white font-semibold opacity-0 group-hover:opacity-100">Baru</span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endif

                            <!-- Preview Gambar Lama (hanya muncul jika belum upload baru) -->
                            @if($existingGambar && !$gambar)
                            <div>
                                <p class="text-sm font-medium text-gray-700 mb-3">Gambar Saat Ini:</p>
                                <div class="grid grid-cols-3 gap-4 opacity-80">
                                    @foreach($existingGambar as $img)
                                    <img src="{{ Storage::url($img) }}"
                                        class="w-full h-40 object-cover rounded-lg border shadow">
                                    @endforeach
                                </div>
                                <p class="text-sm text-gray-500 mt-3">
                                    Upload gambar baru untuk menggantikan yang lama.
                                </p>
                            </div>
                            @endif
                        </div>
                    </div>

                    <!-- Tombol Aksi -->
                    <div class="mt-10 flex justify-end space-x-4 border-t pt-6">
                        <button type="button" wire:click="closeModal"
                            class="px-8 py-3 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600 transition">
                            Batal
                        </button>
                        <button type="submit"
                            class="px-8 py-3 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition relative">
                            <span wire:loading.remove wire:target="store,update">Simpan</span>
                            <span wire:loading wire:target="store,update" class="flex items-center">
                                <svg class="animate-spin h-5 w-5 mr-3" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                        stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor"
                                        d="M4 12a8 8 0 018-8v-4a8 8 0 00-8 8h4z"></path>
                                </svg>
                                Menyimpan...
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>