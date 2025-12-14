@extends('layouts.utama')
@section('content')
<div class="mt-[18vh] min-h-screen bg-linear-to-br from-secondary  via-blue-600 to-blue-950 p-4 md:p-8">
    <div class="max-w-6xl mx-auto">
        <!-- Header -->
        <div class="text-center mb-12">
            <h1 class="text-4xl md:text-5xl font-bold text-gray-800 mb-2">Struktur Organisasi</h1>
            <p class="text-gray-600 text-2xl">{{strtoupper($appName)}}</p>
        </div>

        <!-- Organization Chart -->
        <div class="flex flex-col items-center gap-8">
            <!-- Kepala Sekolah -->
            <div class="flex justify-center">
                <div class="flex flex-col items-center">
                    <div
                        class="w-24 h-24 md:w-32 md:h-32 mb-4 rounded-[50%] overflow-hidden shadow-lg border-4 border-blue-600">
                        <img src="{{ asset('images/kepala-sekolah.jpg') }}" alt="Kepala Sekolah"
                            class="w-full h-full object-cover">
                    </div>
                    <div
                        class="bg-white rounded-lg shadow-lg p-6 w-full md:w-64 text-center border-l-4 border-blue-600">
                        <h3 class="font-bold text-lg text-gray-800">Kepala Sekolah</h3>
                        <p class="text-gray-600 text-sm mt-1">Nama Kepala Sekolah</p>
                    </div>
                </div>
            </div>

            <!-- Line -->
            <div class="h-8 w-1 bg-gray-400"></div>

            <!-- Second Level -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 w-full">
                <div class="flex flex-col items-center">
                    <div class="bg-white rounded-lg shadow-md p-5 w-full text-center border-l-4 border-green-600">
                        <h3 class="font-bold text-gray-800">Wakil Kepala Sekolah</h3>
                        <p class="text-gray-600 text-sm mt-1">Kurikulum</p>
                    </div>
                    <div class="h-6 w-1 bg-gray-400 mt-2"></div>
                </div>
                <div class="flex flex-col items-center">
                    <div class="bg-white rounded-lg shadow-md p-5 w-full text-center border-l-4 border-purple-600">
                        <h3 class="font-bold text-gray-800">Wakil Kepala Sekolah</h3>
                        <p class="text-gray-600 text-sm mt-1">Kesiswaan</p>
                    </div>
                    <div class="h-6 w-1 bg-gray-400 mt-2"></div>
                </div>
                <div class="flex flex-col items-center">
                    <div class="bg-white rounded-lg shadow-md p-5 w-full text-center border-l-4 border-orange-600">
                        <h3 class="font-bold text-gray-800">Wakil Kepala Sekolah</h3>
                        <p class="text-gray-600 text-sm mt-1">Sarana & Prasarana</p>
                    </div>
                    <div class="h-6 w-1 bg-gray-400 mt-2"></div>
                </div>
            </div>

            <!-- Third Level -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 w-full">
                <div class="bg-white rounded-lg shadow p-4 text-center border-t-4 border-blue-500">
                    <h4 class="font-semibold text-gray-800 text-sm">Kepala Jurusan</h4>
                    <p class="text-gray-600 text-xs mt-1">TKJ</p>
                </div>
                <div class="bg-white rounded-lg shadow p-4 text-center border-t-4 border-blue-500">
                    <h4 class="font-semibold text-gray-800 text-sm">Kepala Jurusan</h4>
                    <p class="text-gray-600 text-xs mt-1">RPL</p>
                </div>
                <div class="bg-white rounded-lg shadow p-4 text-center border-t-4 border-blue-500">
                    <h4 class="font-semibold text-gray-800 text-sm">Kepala Jurusan</h4>
                    <p class="text-gray-600 text-xs mt-1">Akuntansi</p>
                </div>
                <div class="bg-white rounded-lg shadow p-4 text-center border-t-4 border-blue-500">
                    <h4 class="font-semibold text-gray-800 text-sm">Kepala Jurusan</h4>
                    <p class="text-gray-600 text-xs mt-1">Bisnis</p>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection