<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Akademik</h1>

    <!-- Form Create -->
    <form wire:submit.prevent="create" class="mb-8">
        <div class="mb-4">
            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" wire:model="nama" id="nama"
                class="mt-1 block w-full h-10 border-gray-300 rounded-md shadow-sm">
            @error('nama') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="jenis" class="block text-sm font-medium text-gray-700">Jenis</label>
            <select name="jenis" id="jenis" wire:model="jenis"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm h-10">
                <option value="">--pilih jenis akademik--</option>
                <option value="jadwal">Jadwal Sekolah</option>
                <option value="kalender">Kalender Akademik</option>
                <option value="kurikulum">Kurikulum</option>

            </select>

            @error('jenis') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="file" class="block text-sm font-medium text-gray-700">PDF File</label>
            <input type="file" wire:model="file" id="file" class="mt-1 block w-full">
            @error('file') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Upload</button>
    </form>

    <!-- Form Edit (jika editingId ada) -->
    @if($editingId)
    <form wire:submit.prevent="update" class="mb-8 bg-gray-100 p-4 rounded">
        <h2 class="text-xl font-bold mb-4">Edit PDF</h2>
        <div class="mb-4">
            <label for="editingName" class="block text-sm font-medium text-gray-700">Nama</label>
            <input type="text" wire:model="editingName" id="editingName"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
            @error('editingName') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>'
        <div class="mb-4">
            <label for="editingJenis" class="block text-sm font-medium text-gray-700">Jenis</label>
            <select name="editingJenis" id="editingJenis" wire:model="editingJenis"
                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm h-10">
                <option value="jadwal" disabled>--pilih jenis akademik--</option>
                <option value="jadwal">Jadwal Sekolah</option>
                <option value="kalender">Kalender Akademik</option>
                <option value="kurikulum">Kurikulum</option>
            </select>
            @error('editingJenis') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="editingFile" class="block text-sm font-medium text-gray-700">New PDF File (opsional)</label>
            <input type="file" wire:model="editingFile" id="editingFile" class="mt-1 block w-full">
            @error('editingFile') <span class="text-red-500">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update</button>
    </form>
    @endif

    <!-- Daftar PDF -->
    <table class="min-w-full bg-white border border-gray-300">
        <thead>
            <tr>
                <th class="px-4 py-2 border">ID</th>
                <th class="px-4 py-2 border">Nama</th>
                <th class="px-4 py-2 border">Jenis</th>
                <th class="px-4 py-2 border">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pdfFiles as $pdf)
            <tr>
                <td class="px-4 py-2 border">{{ $pdf->id }}</td>
                <td class="px-4 py-2 border">
                    <a href="{{ Storage::url($pdf->path) }}" target="_blank" class="text-blue-500">{{ $pdf->nama
                        }}</a>
                </td>
                <td class="px-4 py-2 border">{{ $pdf->jenis }}</td>

                <td class="px-4 py-2 border">
                    <button wire:click="edit({{ $pdf->id }})"
                        class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
                    <button wire:click="delete({{ $pdf->id }})"
                        class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>