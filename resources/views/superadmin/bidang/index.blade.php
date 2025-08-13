@extends('layouts.app')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 p-4 md:p-6">
    <!-- Header Section -->
    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 mb-6 overflow-hidden">
        <div class="bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-700 p-6 text-white">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="flex items-center space-x-3 mb-4 md:mb-0">
                    <div class="bg-white/20 p-3 rounded-xl">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold">Daftar Bidang</h1>
                        <p class="text-blue-100 mt-1">Kelola bidang dan departemen sistem</p>
                    </div>
                </div>
                <a href="{{ route('superadmin.bidang.create') }}" 
                   class="bg-white text-blue-600 px-6 py-3 rounded-xl font-semibold hover:bg-blue-50 transition-all duration-200 flex items-center space-x-2 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <span>Tambah Bidang</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="bg-gradient-to-r from-green-500 to-emerald-600 text-white p-4 mb-6 rounded-xl shadow-lg flex items-center space-x-3">
            <div class="bg-white/20 p-2 rounded-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
            </div>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl p-6 text-white shadow-xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-blue-100 text-sm font-medium">Total Bidang</p>
                    <p class="text-3xl font-bold mt-1">{{ $bidangs->count() }}</p>
                </div>
                <div class="bg-white/20 p-3 rounded-xl">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl p-6 text-white shadow-xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-purple-100 text-sm font-medium">Bidang Aktif</p>
                    <p class="text-3xl font-bold mt-1">{{ $bidangs->count() }}</p>
                </div>
                <div class="bg-white/20 p-3 rounded-xl">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-gradient-to-br from-indigo-500 to-indigo-600 rounded-2xl p-6 text-white shadow-xl">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-indigo-100 text-sm font-medium">Terakhir Ditambah</p>
                    <p class="text-lg font-bold mt-1">{{ $bidangs->last() ? $bidangs->last()->created_at->format('d M Y') : 'Belum ada' }}</p>
                </div>
                <div class="bg-white/20 p-3 rounded-xl">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Desktop Table -->
    <div class="hidden md:block bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                </svg>
                                <span>ID</span>
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                <span>Nama Bidang</span>
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            <div class="flex items-center space-x-2">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"></path>
                                </svg>
                                <span>Aksi</span>
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($bidangs as $bidang)
                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                                    #{{ $bidang->id }}
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center space-x-3">
                                <div class="bg-gradient-to-br from-indigo-500 to-purple-600 w-10 h-10 rounded-xl flex items-center justify-center text-white font-bold text-sm">
                                    {{ strtoupper(substr($bidang->nama_bidang, 0, 2)) }}
                                </div>
                                <div>
                                    <div class="text-sm font-semibold text-gray-900">{{ $bidang->nama_bidang }}</div>
                                    <div class="text-sm text-gray-500">Dibuat {{ $bidang->created_at->format('d M Y') }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('superadmin.bidang.edit', $bidang->id) }}" 
                                   class="bg-gradient-to-r from-amber-400 to-orange-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:from-amber-500 hover:to-orange-600 transition-all duration-200 flex items-center space-x-1 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    <span>Edit</span>
                                </a>

                                <form action="{{ route('superadmin.bidang.destroy', $bidang->id) }}" method="POST" class="inline"
                                      onsubmit="return confirm('Yakin ingin menghapus bidang ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="bg-gradient-to-r from-red-500 to-red-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:from-red-600 hover:to-red-700 transition-all duration-200 flex items-center space-x-1 shadow-md hover:shadow-lg transform hover:-translate-y-0.5">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        <span>Hapus</span>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Mobile Cards -->
    <div class="md:hidden space-y-4">
        @foreach($bidangs as $bidang)
        <div class="bg-white rounded-2xl shadow-lg border border-gray-100 overflow-hidden">
            <div class="p-6">
                <div class="flex items-center justify-between mb-4">
                    <div class="flex items-center space-x-3">
                        <div class="bg-gradient-to-br from-indigo-500 to-purple-600 w-12 h-12 rounded-xl flex items-center justify-center text-white font-bold">
                            {{ strtoupper(substr($bidang->nama_bidang, 0, 2)) }}
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">{{ $bidang->nama_bidang }}</h3>
                            <p class="text-sm text-gray-500">ID: #{{ $bidang->id }}</p>
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                    <span>Dibuat: {{ $bidang->created_at->format('d M Y') }}</span>
                </div>

                <div class="flex space-x-2">
                    <a href="{{ route('superadmin.bidang.edit', $bidang->id) }}" 
                       class="flex-1 bg-gradient-to-r from-amber-400 to-orange-500 text-white px-4 py-2 rounded-lg text-sm font-medium hover:from-amber-500 hover:to-orange-600 transition-all duration-200 flex items-center justify-center space-x-1">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        <span>Edit</span>
                    </a>

                    <form action="{{ route('superadmin.bidang.destroy', $bidang->id) }}" method="POST" class="flex-1"
                          onsubmit="return confirm('Yakin ingin menghapus bidang ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="w-full bg-gradient-to-r from-red-500 to-red-600 text-white px-4 py-2 rounded-lg text-sm font-medium hover:from-red-600 hover:to-red-700 transition-all duration-200 flex items-center justify-center space-x-1">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            <span>Hapus</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if($bidangs->isEmpty())
    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-12 text-center">
        <div class="bg-gray-100 w-20 h-20 rounded-full flex items-center justify-center mx-auto mb-4">
            <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
            </svg>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">Belum Ada Bidang</h3>
        <p class="text-gray-500 mb-6">Mulai dengan menambahkan bidang pertama untuk sistem Anda.</p>
        <a href="{{ route('superadmin.bidang.create') }}" 
           class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-xl font-semibold hover:from-blue-700 hover:to-indigo-700 transition-all duration-200 inline-flex items-center space-x-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            <span>Tambah Bidang Pertama</span>
        </a>
    </div>
    @endif
</div>
@endsection
