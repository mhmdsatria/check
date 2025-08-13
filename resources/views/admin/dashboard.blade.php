@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100">
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="bg-white rounded-2xl shadow-xl p-8 mb-8 border border-slate-200">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <div class="flex items-center space-x-4">
                    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-3 rounded-xl shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Dashboard Admin Bidang</h1>
                        <p class="text-gray-600 mt-1">Kelola konsultasi publik dengan mudah</p>
                    </div>
                </div>
                
                <!-- Stats Cards -->
                <!-- Replaced single stats card with comprehensive statistics grid -->
                <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
                    <!-- Total Konsultasi -->
                    <div class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-3 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-xs font-medium opacity-90">Total</div>
                                <div class="text-xl font-bold">{{ $konsultasis->count() }}</div>
                            </div>
                            <div class="bg-white bg-opacity-20 p-2 rounded-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Pending -->
                    <div class="bg-gradient-to-r from-yellow-500 to-orange-500 text-white px-4 py-3 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-xs font-medium opacity-90">Pending</div>
                                <div class="text-xl font-bold">{{ $konsultasis->where('status', 'pending')->count() }}</div>
                            </div>
                            <div class="bg-white bg-opacity-20 p-2 rounded-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Diproses -->
                    <div class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-4 py-3 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-xs font-medium opacity-90">Diproses</div>
                                <div class="text-xl font-bold">{{ $konsultasis->where('status', 'diproses')->count() }}</div>
                            </div>
                            <div class="bg-white bg-opacity-20 p-2 rounded-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Selesai -->
                    <div class="bg-gradient-to-r from-green-500 to-emerald-600 text-white px-4 py-3 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-xs font-medium opacity-90">Selesai</div>
                                <div class="text-xl font-bold">{{ $konsultasis->where('status', 'selesai')->count() }}</div>
                            </div>
                            <div class="bg-white bg-opacity-20 p-2 rounded-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Ditolak -->
                    <div class="bg-gradient-to-r from-red-500 to-red-600 text-white px-4 py-3 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-200">
                        <div class="flex items-center justify-between">
                            <div>
                                <div class="text-xs font-medium opacity-90">Ditolak</div>
                                <div class="text-xl font-bold">{{ $konsultasis->where('status', 'ditolak')->count() }}</div>
                            </div>
                            <div class="bg-white bg-opacity-20 p-2 rounded-lg">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden">
            <!-- Table Header -->
            <div class="bg-gradient-to-r from-gray-50 to-slate-100 px-8 py-6 border-b border-gray-200">
                <div class="flex items-center justify-between flex-wrap gap-4">
                    <h2 class="text-xl font-semibold text-gray-900 flex items-center">
                        <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002-2h2a2 2 0 002 2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        Data Konsultasi
                    </h2>
                </div>
            </div>

            <!-- Desktop Table -->
            <div class="hidden md:block overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-slate-100 to-gray-100">
                        <tr>
                            <th class="px-8 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                    </svg>
                                    <span>ID</span>
                                </div>
                            </th>
                            <th class="px-8 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                    <span>Nama</span>
                                </div>
                            </th>
                            <th class="px-8 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                    </svg>
                                    <span>No WhatsApp</span>
                                </div>
                            </th>
                            <th class="px-8 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <span>Status</span>
                                </div>
                            </th>
                            <th class="px-8 py-4 text-left text-sm font-semibold text-gray-700 uppercase tracking-wider">
                                <div class="flex items-center space-x-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                                    </svg>
                                    <span>Aksi</span>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @forelse($konsultasis as $k)
                        <tr class="hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-all duration-200">
                            <td class="px-8 py-6 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="bg-gradient-to-r from-blue-100 to-indigo-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                                        #{{ $k->id }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6 whitespace-nowrap">
                                <div class="flex items-center space-x-3">
                                    <div class="bg-gradient-to-r from-purple-500 to-pink-500 w-10 h-10 rounded-full flex items-center justify-center text-white font-semibold text-sm mr-4">
                                        {{ strtoupper(substr($k->nama, 0, 2)) }}
                                    </div>
                                    <div>
                                        <div class="text-sm font-semibold text-gray-900">{{ $k->nama }}</div>
                                        <div class="text-sm text-gray-500">Konsultan</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-8 py-6 whitespace-nowrap">
                                <div class="flex items-center space-x-2">
                                    <div class="bg-green-100 p-2 rounded-lg">
                                        <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-gray-900">{{ $k->no_wa }}</span>
                                </div>
                            </td>
                            <td class="px-8 py-6 whitespace-nowrap">
                                @php
                                    $statusColors = [
                                        'pending' => 'from-yellow-400 to-orange-500',
                                        'diproses' => 'from-blue-400 to-blue-600',
                                        'selesai' => 'from-green-400 to-green-600',
                                        'ditolak' => 'from-red-400 to-red-600'
                                    ];
                                    $statusColor = $statusColors[strtolower($k->status)] ?? 'from-gray-400 to-gray-600';
                                @endphp
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold text-white bg-gradient-to-r {{ $statusColor }} shadow-lg">
                                    <div class="w-2 h-2 bg-white rounded-full mr-2 opacity-80"></div>
                                    {{ ucfirst($k->status) }}
                                </span>
                            </td>
                            <td class="px-8 py-6 whitespace-nowrap">
                                @if(in_array(strtolower($k->status), ['pending', 'diproses']))
                                    <!-- Show verification actions for unverified consultations -->
                                    <div class="flex space-x-2">
                                        <form action="{{ route('admin.konsultasi.verify', $k->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" 
                                                   class="inline-flex items-center px-3 py-2 bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white text-sm font-medium rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                Verifikasi
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.konsultasi.confirm', $k->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" 
                                                   class="inline-flex items-center px-3 py-2 bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white text-sm font-medium rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                                </svg>
                                                Konfirmasi
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <!-- Show only detail button for verified consultations -->
                                    <a href="{{ route('admin.konsultasi.show', $k->id) }}" 
                                       class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white text-sm font-medium rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        Lihat Detail
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="px-8 py-12 text-center">
                                <div class="flex flex-col items-center justify-center space-y-4">
                                    <div class="bg-gray-100 p-6 rounded-full">
                                        <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-medium text-gray-900">Belum ada data konsultasi</h3>
                                        <p class="text-gray-500 mt-1">Data konsultasi akan muncul di sini ketika ada pengajuan baru.</p>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Mobile Cards -->
            <div class="md:hidden divide-y divide-gray-200">
                @forelse($konsultasis as $k)
                <div class="p-6 hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-all duration-200">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center space-x-3">
                            <div class="bg-gradient-to-r from-purple-500 to-pink-500 w-12 h-12 rounded-full flex items-center justify-center text-white font-semibold">
                                {{ strtoupper(substr($k->nama, 0, 2)) }}
                            </div>
                            <div>
                                <h3 class="text-lg font-semibold text-gray-900">{{ $k->nama }}</h3>
                                <div class="bg-gradient-to-r from-blue-100 to-indigo-100 text-blue-800 px-2 py-1 rounded-full text-xs font-medium inline-block">
                                    #{{ $k->id }}
                                </div>
                            </div>
                        </div>
                        @php
                            $statusColors = [
                                'pending' => 'from-yellow-400 to-orange-500',
                                'diproses' => 'from-blue-400 to-blue-600',
                                'selesai' => 'from-green-400 to-green-600',
                                'ditolak' => 'from-red-400 to-red-600'
                            ];
                            $statusColor = $statusColors[strtolower($k->status)] ?? 'from-gray-400 to-gray-600';
                        @endphp
                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold text-white bg-gradient-to-r {{ $statusColor }}">
                            {{ ucfirst($k->status) }}
                        </span>
                    </div>
                    
                    <div class="space-y-3 mb-4">
                        <div class="flex items-center space-x-2 text-sm text-gray-600">
                            <svg class="w-4 h-4 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                            </svg>
                            <span class="font-medium">{{ $k->no_wa }}</span>
                        </div>
                    </div>
                    
                    @if(in_array(strtolower($k->status), ['pending', 'diproses']))
                        <!-- Show verification actions for unverified consultations -->
                        <div class="flex space-x-2">
                            <form action="{{ route('admin.konsultasi.verify', $k->id) }}" method="POST" class="flex-1">
                                @csrf
                                @method('PUT')
                                <button type="submit" 
                                       class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-green-500 to-emerald-600 hover:from-green-600 hover:to-emerald-700 text-white text-sm font-medium rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 w-full justify-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Verifikasi
                                </button>
                            </form>
                            <form action="{{ route('admin.konsultasi.confirm', $k->id) }}" method="POST" class="flex-1">
                                @csrf
                                @method('PUT')
                                <button type="submit" 
                                       class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-indigo-600 hover:from-blue-600 hover:to-indigo-700 text-white text-sm font-medium rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 w-full justify-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Konfirmasi
                                </button>
                            </form>
                        </div>
                    @else
                        <!-- Show only detail button for verified consultations -->
                        <a href="{{ route('admin.konsultasi.show', $k->id) }}" 
                           class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white text-sm font-medium rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 w-full justify-center">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                            </svg>
                            Lihat Detail
                        </a>
                    @endif
                </div>
                @empty
                <div class="p-12 text-center">
                    <div class="flex flex-col items-center justify-center space-y-4">
                        <div class="bg-gray-100 p-6 rounded-full">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900">Belum ada data konsultasi</h3>
                            <p class="text-gray-500 mt-1">Data konsultasi akan muncul di sini ketika ada pengajuan baru.</p>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
