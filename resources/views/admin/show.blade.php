@extends('layouts.admin')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100">
    <div class="container mx-auto px-4 py-8">
        <!-- Header Section -->
        <div class="bg-white rounded-2xl shadow-xl p-8 mb-8 border border-slate-200">
            <div class="flex items-center justify-between flex-wrap gap-4">
                <div class="flex items-center space-x-4">
                    <a href="{{ route('dashboard') }}" 
                       class="bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 p-3 rounded-xl shadow-lg text-white transition-all duration-200 hover:shadow-xl transform hover:-translate-y-0.5">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                    </a>
                    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 p-3 rounded-xl shadow-lg">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Detail Konsultasi #{{ $k->id }}</h1>
                        <p class="text-gray-600 mt-1">Informasi lengkap dan verifikasi konsultasi</p>
                    </div>
                </div>
                
                <!-- Status Badge -->
                <div class="flex items-center space-x-4">
                    @php
                        $statusColors = [
                            'pending' => 'from-yellow-400 to-orange-500',
                            'diproses' => 'from-blue-400 to-blue-600',
                            'selesai' => 'from-green-400 to-green-600',
                            'ditolak' => 'from-red-400 to-red-600'
                        ];
                        $statusColor = $statusColors[strtolower($k->status)] ?? 'from-gray-400 to-gray-600';
                    @endphp
                    <span class="inline-flex items-center px-4 py-2 rounded-xl text-sm font-semibold text-white bg-gradient-to-r {{ $statusColor }} shadow-lg">
                        <div class="w-2 h-2 bg-white rounded-full mr-2 opacity-80"></div>
                        {{ ucfirst($k->status) }}
                    </span>
                </div>
            </div>
        </div>

        <!-- Main Content Grid -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Consultation Details -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Personal Information Card -->
                <div class="bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden">
                    <div class="bg-gradient-to-r from-gray-50 to-slate-100 px-8 py-6 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-900 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Informasi Pemohon
                        </h2>
                    </div>
                    <div class="p-8">
                        <div class="flex items-center mb-6">
                            <div class="bg-gradient-to-r from-purple-500 to-pink-500 w-16 h-16 rounded-full flex items-center justify-center text-white font-bold text-xl mr-6">
                                {{ strtoupper(substr($k->nama, 0, 2)) }}
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900">{{ $k->nama }}</h3>
                                <p class="text-gray-600">Pemohon Konsultasi</p>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-6 rounded-xl border border-blue-100">
                                <div class="flex items-center space-x-3">
                                    <div class="bg-blue-500 p-2 rounded-lg">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-blue-800">Email</p>
                                        <p class="text-blue-900 font-semibold">{{ $k->email }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="bg-gradient-to-r from-green-50 to-emerald-50 p-6 rounded-xl border border-green-100">
                                <div class="flex items-center space-x-3">
                                    <div class="bg-green-500 p-2 rounded-lg">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-green-800">WhatsApp</p>
                                        <p class="text-green-900 font-semibold">{{ $k->no_wa }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Consultation Details Card -->
                <div class="bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden">
                    <div class="bg-gradient-to-r from-gray-50 to-slate-100 px-8 py-6 border-b border-gray-200">
                        <h2 class="text-xl font-semibold text-gray-900 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Detail Konsultasi
                        </h2>
                    </div>
                    <div class="p-8">
                        <div class="space-y-6">
                            <div class="bg-gradient-to-r from-purple-50 to-pink-50 p-6 rounded-xl border border-purple-100">
                                <h4 class="text-sm font-medium text-purple-800 mb-2">Deskripsi Permohonan</h4>
                                <p class="text-purple-900 leading-relaxed">{{ $k->deskripsi }}</p>
                            </div>
                            
                            <div class="bg-gradient-to-r from-orange-50 to-red-50 p-6 rounded-xl border border-orange-100">
                                <div class="flex items-center space-x-3">
                                    <div class="bg-orange-500 p-2 rounded-lg">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-orange-800">Waktu Permohonan</p>
                                        <p class="text-orange-900 font-semibold">{{ $k->tanggal_permohonan }} {{ $k->waktu_permohonan }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Verification Form -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-2xl shadow-xl border border-slate-200 overflow-hidden sticky top-8">
                    <div class="bg-gradient-to-r from-green-500 to-emerald-600 px-8 py-6">
                        <h2 class="text-xl font-semibold text-white flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Verifikasi Konsultasi
                        </h2>
                        <p class="text-green-100 mt-1">Proses dan berikan konfirmasi</p>
                    </div>
                    
                    <form method="post" action="{{ route('admin.konsultasi.verify', $k->id) }}" class="p-8">
                        @csrf
                        <div class="space-y-6">
                            <!-- Action Selection -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-3">
                                    <svg class="w-4 h-4 inline mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                    Tindakan
                                </label>
                                <select name="action" required class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white shadow-sm">
                                    <option value="">Pilih tindakan...</option>
                                    <option value="accept">✅ Terima Konsultasi</option>
                                    <option value="reschedule">📅 Reschedule Waktu</option>
                                </select>
                            </div>

                            <!-- Confirmation Time -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-3">
                                    <svg class="w-4 h-4 inline mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    Waktu Konfirmasi <span class="text-gray-500">(opsional)</span>
                                </label>
                                <input type="datetime-local" name="waktu_konfirmasi" 
                                       class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white shadow-sm" />
                            </div>

                            <!-- Notes -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-3">
                                    <svg class="w-4 h-4 inline mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Catatan <span class="text-gray-500">(opsional)</span>
                                </label>
                                <textarea name="catatan" rows="4" 
                                          placeholder="Tambahkan catatan atau instruksi khusus..."
                                          class="w-full px-4 py-3 border border-gray-300 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200 bg-white shadow-sm resize-none"></textarea>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" 
                                    class="w-full bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white font-semibold py-4 px-6 rounded-xl shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center space-x-2">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                </svg>
                                <span>Kirim Konfirmasi</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
