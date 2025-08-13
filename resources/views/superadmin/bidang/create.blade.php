@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md mx-auto">
        <!-- Header Card -->
        <div class="bg-white rounded-t-2xl shadow-xl border-b border-gray-100">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-t-2xl px-8 py-6">
                <div class="flex items-center space-x-3">
                    <div class="bg-white/20 rounded-lg p-2">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-2xl font-bold text-white">Tambah Bidang</h1>
                        <p class="text-blue-100 text-sm">Buat bidang baru untuk sistem</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-b-2xl shadow-xl p-8">
            <!-- Error Messages -->
            @if ($errors->any())
            <div class="mb-6 rounded-xl bg-gradient-to-r from-red-50 to-pink-50 border border-red-200 p-4">
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-red-500 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-sm font-medium text-red-800 mb-2">Terdapat kesalahan:</h3>
                        <ul class="text-sm text-red-700 space-y-1">
                            @foreach ($errors->all() as $error)
                            <li class="flex items-center space-x-2">
                                <span class="w-1 h-1 bg-red-500 rounded-full"></span>
                                <span>{{ $error }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endif

            <!-- Form -->
            <form action="{{ route('superadmin.bidang.store') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Nama Bidang Input -->
                <div class="space-y-2">
                    <label for="nama_bidang" class="block text-sm font-semibold text-gray-700">
                        <span class="flex items-center space-x-2">
                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            <span>Nama Bidang</span>
                        </span>
                    </label>
                    <div class="relative">
                        <input 
                            type="text" 
                            name="nama_bidang" 
                            id="nama_bidang" 
                            required
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 hover:bg-gray-100"
                            placeholder="Masukkan nama bidang..."
                            value="{{ old('nama_bidang') }}">
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                            </svg>
                        </div>
                    </div>
                    <p class="text-xs text-gray-500 mt-1">Nama bidang akan digunakan untuk mengkategorikan konsultasi</p>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-3 pt-4">
                    <button 
                        type="submit"
                        class="flex-1 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white py-3 px-6 rounded-xl font-semibold transition-all duration-200 transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 shadow-lg hover:shadow-xl">
                        <span class="flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            <span>Simpan Bidang</span>
                        </span>
                    </button>
                    
                    <a 
                        href="{{ route('superadmin.bidang.index') }}" 
                        class="flex-1 bg-gray-100 hover:bg-gray-200 text-gray-700 py-3 px-6 rounded-xl font-semibold transition-all duration-200 transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 text-center">
                        <span class="flex items-center justify-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            <span>Batal</span>
                        </span>
                    </a>
                </div>
            </form>

            <!-- Info Card -->
            <div class="mt-8 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-4 border border-blue-100">
                <div class="flex items-start space-x-3">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold text-blue-900 mb-1">Informasi</h4>
                        <p class="text-sm text-blue-700">Bidang yang dibuat akan tersedia untuk dipilih saat admin melakukan konsultasi dan dapat dikelola melalui menu Kelola Bidang.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
