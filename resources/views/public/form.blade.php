@extends('layouts.public')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-indigo-50 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="text-center mb-12">
            <div class="inline-flex items-center justify-center w-16 h-16 bg-blue-600 rounded-full mb-6">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                </svg>
            </div>
            <h1 class="text-4xl font-bold text-gray-900 mb-4">Form Konsultasi Publik</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Sampaikan pertanyaan atau konsultasi Anda kepada BPS Kota Sukabumi. 
                Tim kami akan merespons dalam waktu 1x24 jam.
            </p>
        </div>

        <div class="bg-white rounded-2xl shadow-xl border border-gray-100 overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-indigo-600 px-8 py-6">
                <h2 class="text-xl font-semibold text-white flex items-center">
                    <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Informasi Konsultasi
                </h2>
                <p class="text-blue-100 mt-2">Lengkapi formulir di bawah ini dengan informasi yang akurat</p>
            </div>

            <form action="{{ route('konsultasi.store') }}" method="post" enctype="multipart/form-data" class="p-8 space-y-8">
                @csrf

                <div class="space-y-6">
                    <div class="border-l-4 border-blue-500 pl-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-1">Informasi Pribadi</h3>
                        <p class="text-sm text-gray-600">Data diri untuk keperluan komunikasi</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-2">
                            <label class="flex items-center text-sm font-medium text-gray-700">
                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Nama Lengkap
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <input type="text" name="nama" required
                                class="w-full rounded-lg border-2 border-gray-200 px-4 py-3 text-gray-900 placeholder-gray-500 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent hover:border-gray-300"
                                placeholder="Masukkan nama lengkap Anda" />
                        </div>

                        <div class="space-y-2">
                            <label class="flex items-center text-sm font-medium text-gray-700">
                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                Email
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <input type="email" name="email" required
                                class="w-full rounded-lg border-2 border-gray-200 px-4 py-3 text-gray-900 placeholder-gray-500 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent hover:border-gray-300"
                                placeholder="contoh@email.com" />
                        </div>

                        <div class="space-y-2">
                            <label class="flex items-center text-sm font-medium text-gray-700">
                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V7a2 2 0 00-2-2H8a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                Nomor WhatsApp
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <input type="text" name="no_wa" required
                                class="w-full rounded-lg border-2 border-gray-200 px-4 py-3 text-gray-900 placeholder-gray-500 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent hover:border-gray-300"
                                placeholder="08xxxxxxxxxx" />
                        </div>

                        <div class="space-y-2">
                            <label class="flex items-center text-sm font-medium text-gray-700">
                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 4v10m6-10v10m-6-4h6"></path>
                                </svg>
                                Tanggal Konsultasi
                            </label>
                            <input type="date" name="tanggal_permohonan"
                                class="w-full rounded-lg border-2 border-gray-200 px-4 py-3 text-gray-900 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent hover:border-gray-300" />
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="border-l-4 border-green-500 pl-4">
                        <h3 class="text-lg font-semibold text-gray-900 mb-1">Detail Konsultasi</h3>
                        <p class="text-sm text-gray-600">Jelaskan kebutuhan konsultasi Anda</p>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-2 space-y-2">
                            <label class="flex items-center text-sm font-medium text-gray-700">
                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Deskripsi Konsultasi
                                <span class="text-red-500 ml-1">*</span>
                            </label>
                            <textarea name="deskripsi" required rows="5"
                                class="w-full rounded-lg border-2 border-gray-200 px-4 py-3 text-gray-900 placeholder-gray-500 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent hover:border-gray-300 resize-none"
                                placeholder="Jelaskan secara detail topik atau pertanyaan yang ingin Anda konsultasikan..."></textarea>
                        </div>

                        <div class="space-y-2">
                            <label class="flex items-center text-sm font-medium text-gray-700">
                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Waktu Konsultasi (Format 24 jam)
                            </label>
                            <div class="relative">
                                <input type="time" name="waktu_permohonan"
                                    class="w-full rounded-lg border-2 border-gray-200 px-4 py-3 text-gray-900 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent hover:border-gray-300" />
                                <div class="absolute right-3 top-1/2 transform -translate-y-1/2 text-sm text-gray-500 pointer-events-none">
                                </div>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">
                                {{-- <svg class="w-3 h-3 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg> --}}
                                **AM** berarti pagi hingga siang (00:00 - 11:59). **PM** berarti siang hingga malam (12:00 - 23:59).
                            </p>
                        </div>

                        <div class="space-y-2">
                            <label class="flex items-center text-sm font-medium text-gray-700">
                                <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"></path>
                                </svg>
                                Lampiran
                                <span class="text-xs text-gray-500 ml-2">(opsional)</span>
                            </label>
                            <div class="relative">
                                <input type="file" name="lampiran"
                                    class="w-full rounded-lg border-2 border-dashed border-gray-300 px-4 py-6 text-gray-900 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent hover:border-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" />
                                <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
                                    <div class="text-center">
                                        <svg class="mx-auto h-8 w-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                        </svg>
                                        <p class="mt-1 text-sm text-gray-500">Klik untuk upload file</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-200">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <button type="submit"
                            class="flex-1 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white py-4 px-8 rounded-lg font-semibold text-lg transition-all duration-200 transform hover:scale-[1.02] focus:outline-none focus:ring-4 focus:ring-blue-500 focus:ring-opacity-50 shadow-lg hover:shadow-xl flex items-center justify-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                            </svg>
                            Kirim Konsultasi
                        </button>
                        <button type="reset"
                            class="sm:w-auto px-8 py-4 border-2 border-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-50 hover:border-gray-400 transition-all duration-200 focus:outline-none focus:ring-4 focus:ring-gray-500 focus:ring-opacity-50">
                            Reset Form
                        </button>
                    </div>
                    
                    <div class="mt-6 p-4 bg-blue-50 rounded-lg border border-blue-200">
                        <div class="flex items-start">
                            <svg class="w-5 h-5 text-blue-600 mt-0.5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <div class="text-sm text-blue-800">
                                <p class="font-medium mb-1">Informasi Penting:</p>
                                <ul class="space-y-1 text-blue-700">
                                    <li>• Tim kami akan merespons dalam waktu 1x24 jam</li>
                                    <li>• Pastikan nomor WhatsApp aktif untuk komunikasi lebih lanjut</li>
                                    <li>• File lampiran maksimal 5MB (format: PDF, DOC, JPG, PNG)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection