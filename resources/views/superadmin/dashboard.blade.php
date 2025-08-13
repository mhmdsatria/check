@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <!-- Header Section -->
    <div class="bg-gradient-to-r from-blue-600 to-blue-700 rounded-xl p-6 text-white shadow-lg">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-bold mb-2">Data Konsultasi Publik</h1>
                <p class="text-blue-100">Kelola dan teruskan konsultasi ke admin bidang yang sesuai</p>
            </div>
            <div class="hidden md:block">
                <div class="bg-white/10 rounded-lg p-4">
                    <div class="text-2xl font-bold">{{ $konsultasis->count() }}</div>
                    <div class="text-sm text-blue-100">Total Konsultasi</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Button -->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <div>
            <h2 class="text-xl font-semibold text-gray-800">Daftar Konsultasi</h2>
            <p class="text-gray-600 text-sm">Kelola semua data konsultasi publik dan teruskan ke admin bidang</p>
        </div>
        <a href="{{ route('superadmin.accounts') }}" 
           class="inline-flex items-center justify-center bg-gradient-to-r from-gray-600 to-gray-700 hover:from-gray-700 hover:to-gray-800 text-white px-6 py-3 rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
            </svg>
            Kelola Akun Admin
        </a>
    </div>

    <!-- Desktop Table View -->
    <div class="hidden lg:block bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gradient-to-r from-gray-50 to-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Nama & Email
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                WhatsApp
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                Tanggal & Waktu
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Status
                            </div>
                        </th>
                        <th class="px-6 py-4 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"></path>
                                </svg>
                                Aksi
                            </div>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($konsultasis as $k)
                    <tr class="hover:bg-gray-50 transition-colors duration-150">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-10 w-10">
                                    <div class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-400 to-blue-600 flex items-center justify-center">
                                        <span class="text-sm font-medium text-white">{{ substr($k->nama, 0, 1) }}</span>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-medium text-gray-900">{{ $k->nama }}</div>
                                    <div class="text-sm text-gray-500">{{ $k->email ?? '-' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 mr-2 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                                </svg>
                                <span class="text-sm text-gray-900">{{ $k->no_wa }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">
                                <div class="flex items-center mb-1">
                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    {{ \Carbon\Carbon::parse($k->tanggal_permohonan)->translatedFormat('d M Y') }}
                                </div>
                                <div class="flex items-center text-xs text-gray-500">
                                    <svg class="w-3 h-3 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    {{ $k->waktu_permohonan ?? '-' }}
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                                $statusColors = [
                                    'pending' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
                                    'diproses' => 'bg-blue-100 text-blue-800 border-blue-200',
                                    'selesai' => 'bg-green-100 text-green-800 border-green-200',
                                    'ditolak' => 'bg-red-100 text-red-800 border-red-200'
                                ];
                                $statusIcons = [
                                    'pending' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
                                    'diproses' => 'M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15',
                                    'selesai' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z',
                                    'ditolak' => 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z'
                                ];
                            @endphp
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium border {{ $statusColors[$k->status] ?? 'bg-gray-100 text-gray-800 border-gray-200' }}">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $statusIcons[$k->status] ?? 'M8.228 9c.549-1.165 2.03-2 3.772-2 2.21 0 4 1.343 4 3 0 1.4-1.278 2.575-3.006 2.907-.542.104-.994.54-.994 1.093m0 3h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z' }}"></path>
                                </svg>
                                {{ ucfirst($k->status) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex flex-col space-y-3">
                                <!-- Added view details button with better styling -->
                                <button onclick="showDetail({{ $k->id }})" 
                                        class="inline-flex items-center text-indigo-600 hover:text-indigo-800 transition-colors duration-150 text-sm font-medium">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    Lihat Detail
                                </button>
                                
                                <!-- Improved assignment form layout -->
                                <form action="{{ route('superadmin.assign', $k->id) }}" method="post" class="flex items-center space-x-2">
                                    @csrf
                                    <select name="admin_id" required 
                                            class="flex-1 border border-gray-300 rounded-lg px-3 py-2 text-xs focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white">
                                        <option value="" disabled selected>Pilih Admin</option>
                                        @foreach(App\Models\User::where('role','admin_bidang')->get() as $admin)
                                            <option value="{{ $admin->id }}">
                                                {{ $admin->name }} 
                                                @if(optional($admin->bidang)->nama_bidang)
                                                    ({{ $admin->bidang->nama_bidang }})
                                                @endif
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type="submit" 
                                            class="inline-flex items-center bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white p-2 rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            
                            <!-- Hidden detail data for modal -->
                            <div id="detail-{{ $k->id }}" class="hidden">
                                <div class="detail-data" 
                                     data-nama="{{ $k->nama }}"
                                     data-email="{{ $k->email }}"
                                     data-no_wa="{{ $k->no_wa }}"
                                     data-deskripsi="{{ $k->deskripsi }}"
                                     data-tanggal="{{ \Carbon\Carbon::parse($k->tanggal_permohonan)->translatedFormat('d F Y') }}"
                                     data-waktu="{{ $k->waktu_permohonan }}"
                                     data-lampiran="{{ $k->lampiran }}"
                                     data-status="{{ $k->status }}">
                                </div>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center">
                                <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <h3 class="text-lg font-medium text-gray-900 mb-1">Tidak ada konsultasi</h3>
                                <p class="text-gray-500">Belum ada konsultasi yang perlu ditangani saat ini.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Added mobile card view for better responsiveness -->
    <!-- Mobile Card View -->
    <div class="lg:hidden space-y-4">
        @forelse($konsultasis as $k)
        <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200">
            <div class="flex items-start justify-between mb-4">
                <div class="flex items-center">
                    <div class="h-12 w-12 rounded-full bg-gradient-to-r from-blue-400 to-blue-600 flex items-center justify-center">
                        <span class="text-lg font-medium text-white">{{ substr($k->nama, 0, 1) }}</span>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-lg font-semibold text-gray-900">{{ $k->nama }}</h3>
                        <p class="text-sm text-gray-500">{{ $k->email ?? '-' }}</p>
                    </div>
                </div>
                @php
                    $statusColors = [
                        'pending' => 'bg-yellow-100 text-yellow-800 border-yellow-200',
                        'diproses' => 'bg-blue-100 text-blue-800 border-blue-200',
                        'selesai' => 'bg-green-100 text-green-800 border-green-200',
                        'ditolak' => 'bg-red-100 text-red-800 border-red-200'
                    ];
                @endphp
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium border {{ $statusColors[$k->status] ?? 'bg-gray-100 text-gray-800 border-gray-200' }}">
                    {{ ucfirst($k->status) }}
                </span>
            </div>
            
            <div class="grid grid-cols-2 gap-4 mb-4">
                <div>
                    <p class="text-xs font-medium text-gray-500 mb-1">WhatsApp</p>
                    <p class="text-sm text-gray-900">{{ $k->no_wa }}</p>
                </div>
                <div>
                    <p class="text-xs font-medium text-gray-500 mb-1">Tanggal</p>
                    <p class="text-sm text-gray-900">{{ \Carbon\Carbon::parse($k->tanggal_permohonan)->translatedFormat('d M Y') }}</p>
                </div>
            </div>
            
            <div class="flex flex-col space-y-3">
                <button onclick="showDetail({{ $k->id }})" 
                        class="w-full inline-flex items-center justify-center text-indigo-600 hover:text-indigo-800 bg-indigo-50 hover:bg-indigo-100 px-4 py-2 rounded-lg transition-colors duration-150 text-sm font-medium">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                    </svg>
                    Lihat Detail
                </button>
                
                <form action="{{ route('superadmin.assign', $k->id) }}" method="post" class="flex space-x-3">
                    @csrf
                    <select name="admin_id" required 
                            class="flex-1 border border-gray-300 rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white">
                        <option value="" disabled selected>Pilih Admin Bidang</option>
                        @foreach(App\Models\User::where('role','admin_bidang')->get() as $admin)
                            <option value="{{ $admin->id }}">
                                {{ $admin->name }} 
                                @if(optional($admin->bidang)->nama_bidang)
                                    ({{ $admin->bidang->nama_bidang }})
                                @endif
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" 
                            class="inline-flex items-center bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 text-white px-4 py-2 rounded-lg transition-all duration-200 shadow-md hover:shadow-lg">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                        </svg>
                        Teruskan
                    </button>
                </form>
            </div>
            
            <!-- Hidden detail data for modal -->
            <div id="detail-{{ $k->id }}" class="hidden">
                <div class="detail-data" 
                     data-nama="{{ $k->nama }}"
                     data-email="{{ $k->email }}"
                     data-no_wa="{{ $k->no_wa }}"
                     data-deskripsi="{{ $k->deskripsi }}"
                     data-tanggal="{{ \Carbon\Carbon::parse($k->tanggal_permohonan)->translatedFormat('d F Y') }}"
                     data-waktu="{{ $k->waktu_permohonan }}"
                     data-lampiran="{{ $k->lampiran }}"
                     data-status="{{ $k->status }}">
                </div>
            </div>
        </div>
        @empty
        <div class="bg-white rounded-xl shadow-lg p-12 text-center">
            <svg class="w-16 h-16 text-gray-400 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
            </svg>
            <h3 class="text-xl font-medium text-gray-900 mb-2">Tidak ada konsultasi</h3>
            <p class="text-gray-500">Belum ada konsultasi yang perlu ditangani saat ini.</p>
        </div>
        @endforelse
    </div>
</div>

<!-- Enhanced modal with better animations and accessibility -->
<!-- Detail Modal -->
<div id="detailModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 hidden z-50 transition-opacity duration-300" role="dialog" aria-labelledby="modal-title" aria-modal="true">
    <div class="flex items-center justify-center min-h-screen p-4">
        <div class="bg-white rounded-xl shadow-xl max-w-2xl w-full max-h-[90vh] overflow-y-auto transform transition-all duration-300 scale-95" id="modalContent">
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 text-white p-6 rounded-t-xl">
                <div class="flex items-center justify-between">
                    <h3 id="modal-title" class="text-xl font-bold">Detail Konsultasi</h3>
                    <button onclick="closeDetail()" class="text-white hover:text-gray-200 transition-colors duration-150" aria-label="Tutup modal">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Nama</label>
                        <div id="modal-nama" class="text-sm text-gray-900 bg-gray-50 p-3 rounded-lg border"></div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                        <div id="modal-email" class="text-sm text-gray-900 bg-gray-50 p-3 rounded-lg border"></div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">No WhatsApp</label>
                        <div id="modal-no_wa" class="text-sm text-gray-900 bg-gray-50 p-3 rounded-lg border"></div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <div id="modal-status" class="text-sm text-gray-900 bg-gray-50 p-3 rounded-lg border"></div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal</label>
                        <div id="modal-tanggal" class="text-sm text-gray-900 bg-gray-50 p-3 rounded-lg border"></div>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Waktu</label>
                        <div id="modal-waktu" class="text-sm text-gray-900 bg-gray-50 p-3 rounded-lg border"></div>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Deskripsi Konsultasi</label>
                    <div id="modal-deskripsi" class="text-sm text-gray-900 bg-gray-50 p-4 rounded-lg min-h-[120px] whitespace-pre-wrap border"></div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Lampiran</label>
                    <div id="modal-lampiran" class="text-sm text-gray-900 bg-gray-50 p-3 rounded-lg border"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Improved JavaScript with better error handling and animations -->
<script>
function showDetail(id) {
    try {
        const detailData = document.querySelector(`#detail-${id} .detail-data`);
        
        if (!detailData) {
            console.error('Detail data not found for ID:', id);
            return;
        }
        
        // Populate modal with data
        document.getElementById('modal-nama').textContent = detailData.dataset.nama || '-';
        document.getElementById('modal-email').textContent = detailData.dataset.email || '-';
        document.getElementById('modal-no_wa').textContent = detailData.dataset.no_wa || '-';
        document.getElementById('modal-deskripsi').textContent = detailData.dataset.deskripsi || 'Tidak ada deskripsi';
        document.getElementById('modal-tanggal').textContent = detailData.dataset.tanggal || '-';
        document.getElementById('modal-waktu').textContent = detailData.dataset.waktu || '-';
        document.getElementById('modal-status').textContent = detailData.dataset.status ? 
            detailData.dataset.status.charAt(0).toUpperCase() + detailData.dataset.status.slice(1) : '-';
        
        // Handle attachment
        const lampiranDiv = document.getElementById('modal-lampiran');
        if (detailData.dataset.lampiran) {
            lampiranDiv.innerHTML = `
                <a href="/storage/${detailData.dataset.lampiran}" target="_blank" 
                   class="inline-flex items-center text-blue-600 hover:text-blue-800 transition-colors duration-150">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                    </svg>
                    Lihat File
                </a>`;
        } else {
            lampiranDiv.textContent = 'Tidak ada lampiran';
        }
        
        // Show modal with animation
        const modal = document.getElementById('detailModal');
        const modalContent = document.getElementById('modalContent');
        
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.add('opacity-100');
            modalContent.classList.remove('scale-95');
            modalContent.classList.add('scale-100');
        }, 10);
        
        // Focus management for accessibility
        modalContent.focus();
        
    } catch (error) {
        console.error('Error showing detail:', error);
        alert('Terjadi kesalahan saat menampilkan detail');
    }
}

function closeDetail() {
    const modal = document.getElementById('detailModal');
    const modalContent = document.getElementById('modalContent');
    
    // Hide with animation
    modal.classList.remove('opacity-100');
    modalContent.classList.remove('scale-100');
    modalContent.classList.add('scale-95');
    
    setTimeout(() => {
        modal.classList.add('hidden');
    }, 300);
}

// Close modal when clicking outside
document.getElementById('detailModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeDetail();
    }
});

// Close modal with Escape key
document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') {
        const modal = document.getElementById('detailModal');
        if (!modal.classList.contains('hidden')) {
            closeDetail();
        }
    }
});

// Initialize modal styles
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('detailModal');
    modal.classList.add('opacity-0');
});
</script>
@endsection
