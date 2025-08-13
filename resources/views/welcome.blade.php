<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form Konsultasi - SPINTAR BPS Kota Sukabumi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            100: '#dbeafe',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            800: '#1e40af',
                            900: '#1e3a8a'
                        },
                        accent: {
                            400: '#fbbf24',
                            500: '#f59e0b'
                        }
                    },
                    fontFamily: {
                        'sans': ['Inter', 'system-ui', 'sans-serif'],
                    },
                    animation: {
                        'fade-in-up': 'fadeInUp 0.6s ease-out',
                        'fade-in': 'fadeIn 0.8s ease-out',
                        'scale-in': 'scaleIn 0.5s ease-out',
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        .glass-effect {
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>

<body class="bg-gray-50 font-sans antialiased">
    <x-header />
    
    <main>
        <!-- Hero Section -->
        <section class="relative bg-gradient-to-br from-primary-900 via-primary-800 to-primary-700 text-white overflow-hidden min-h-screen flex items-center">
            <!-- Enhanced background with better overlay and positioning -->
            <div class="absolute inset-0 bg-gradient-to-br from-black/50 via-black/30 to-black/40"></div>
            <div class="absolute inset-0 bg-cover bg-center opacity-30" 
                 style="background-image: url('{{ asset('storage/bg-scenery.webp') }}');"></div>
            
            <!-- Content -->
            <div class="container mx-auto px-6 py-24 relative z-10">
                <div class="grid lg:grid-cols-2 gap-20 items-center max-w-7xl mx-auto">
                    <!-- Left Column: Main Content -->
                    <div class="space-y-10 animate-fade-in-up">
                        <div class="space-y-8">
                            <h1 class="text-6xl lg:text-8xl font-black leading-tight">
                                <span class="block text-white drop-shadow-2xl tracking-tight">SPINTAR</span>
                                <span class="block text-accent-400 text-3xl lg:text-4xl font-bold mt-2 tracking-wide">BPS Kota Sukabumi</span>
                            </h1>
                            {{-- <div class="w-24 h-1 bg-accent-500 rounded-full"></div> --}}
                            <p class="text-xl lg:text-2xl text-gray-100 leading-relaxed max-w-2xl font-light">
                                <strong class="font-semibold text-white">SPINTAR</strong> (Satu Pintu Informasi dan Konsultasi) adalah layanan resmi Badan Pusat Statistik 
                                yang memudahkan akses informasi dan konsultasi data statistik secara cepat dan profesional.
                            </p>
                        </div>
                        
                        <!-- CTA Buttons -->
                        <div class="flex flex-col sm:flex-row gap-6">
                            <a href="{{ route('konsultasi.create') }}"
                               class="group inline-flex items-center justify-center px-10 py-5 bg-accent-500 hover:bg-accent-400 text-white font-bold rounded-2xl shadow-2xl hover:shadow-accent-500/25 transition-all duration-300 text-lg transform hover:scale-105">
                                <svg class="w-6 h-6 mr-3 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                </svg>
                                Ajukan Konsultasi
                            </a>
                            <a href="#layanan"
                               class="inline-flex items-center justify-center px-10 py-5 border-2 border-white/80 text-white font-bold rounded-2xl hover:bg-white hover:text-primary-900 transition-all duration-300 text-lg backdrop-blur-sm">
                                Pelajari Layanan
                            </a>
                        </div>
                    </div>

                    <!-- Right Column: Enhanced Features Card -->
                    <div class="lg:pl-8 animate-fade-in">
                        <div class="glass-effect rounded-3xl p-10 shadow-2xl">
                            <h2 class="text-3xl font-bold mb-10 text-center">Mengapa Pilih SPINTAR?</h2>
                            <div class="space-y-8">
                                <div class="flex items-start space-x-6 group">
                                    <div class="flex-shrink-0 w-14 h-14 bg-accent-500 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-xl mb-2">Respons Cepat</h3>
                                        <p class="text-gray-200 leading-relaxed">Teknologi terkini untuk layanan yang efisien dan responsif</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start space-x-6 group">
                                    <div class="flex-shrink-0 w-14 h-14 bg-green-500 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-xl mb-2">Keamanan Terjamin</h3>
                                        <p class="text-gray-200 leading-relaxed">Privasi data dengan standar keamanan tinggi dan terpercaya</p>
                                    </div>
                                </div>
                                
                                <div class="flex items-start space-x-6 group">
                                    <div class="flex-shrink-0 w-14 h-14 bg-purple-500 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="font-bold text-xl mb-2">Wawasan Profesional</h3>
                                        <p class="text-gray-200 leading-relaxed">Rekomendasi berbasis data untuk hasil yang optimal</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Enhanced Wave Separator -->
            <div class="absolute bottom-0 left-0 right-0">
                <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto">
                    <path d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="white" />
                </svg>
            </div>
        </section>

        <!-- Prosedur Section -->
        <section id="prosedur" class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-20">
                    <h2 class="text-5xl lg:text-6xl font-bold text-gray-900 mb-6 tracking-tight">Prosedur Konsultasi</h2>
                    <div class="w-24 h-1 bg-primary-500 rounded-full mx-auto mb-6"></div>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">Tiga langkah mudah untuk mendapatkan konsultasi statistik profesional</p>
                </div>
                
                <div class="grid md:grid-cols-3 gap-12 max-w-6xl mx-auto">
                    <!-- Enhanced procedure cards with better spacing and animations -->
                    <div class="text-center group animate-fade-in-up" style="animation-delay: 0.1s">
                        <div class="relative mb-10">
                            <div class="w-24 h-24 bg-gradient-to-br from-primary-500 to-primary-600 rounded-3xl flex items-center justify-center mx-auto group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 shadow-xl">
                                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </div>
                            <div class="absolute -top-3 -right-3 w-10 h-10 bg-accent-500 text-white rounded-full flex items-center justify-center font-bold text-lg shadow-lg">1</div>
                        </div>
                        <h3 class="text-2xl font-bold mb-6 text-gray-900">Isi Formulir</h3>
                        <p class="text-gray-600 leading-relaxed text-lg">Lengkapi data dan kebutuhan konsultasi melalui formulir online yang mudah digunakan</p>
                    </div>
                    
                    <div class="text-center group animate-fade-in-up" style="animation-delay: 0.2s">
                        <div class="relative mb-10">
                            <div class="w-24 h-24 bg-gradient-to-br from-green-500 to-green-600 rounded-3xl flex items-center justify-center mx-auto group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 shadow-xl">
                                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="absolute -top-3 -right-3 w-10 h-10 bg-accent-500 text-white rounded-full flex items-center justify-center font-bold text-lg shadow-lg">2</div>
                        </div>
                        <h3 class="text-2xl font-bold mb-6 text-gray-900">Konfirmasi Admin</h3>
                        <p class="text-gray-600 leading-relaxed text-lg">Tim admin akan memeriksa dan mengonfirmasi permintaan konsultasi dalam 1x24 jam</p>
                    </div>
                    
                    <div class="text-center group animate-fade-in-up" style="animation-delay: 0.3s">
                        <div class="relative mb-10">
                            <div class="w-24 h-24 bg-gradient-to-br from-purple-500 to-purple-600 rounded-3xl flex items-center justify-center mx-auto group-hover:scale-110 group-hover:rotate-3 transition-all duration-300 shadow-xl">
                                <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 4v10m6-10v10m-6-4h6" />
                                </svg>
                            </div>
                            <div class="absolute -top-3 -right-3 w-10 h-10 bg-accent-500 text-white rounded-full flex items-center justify-center font-bold text-lg shadow-lg">3</div>
                        </div>
                        <h3 class="text-2xl font-bold mb-6 text-gray-900">Konsultasi</h3>
                        <p class="text-gray-600 leading-relaxed text-lg">Hadiri sesi konsultasi sesuai jadwal yang telah disepakati bersama</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Layanan Utama -->
        <section id="layanan" class="py-24 bg-gradient-to-br from-gray-50 to-gray-100">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-20">
                    <h2 class="text-5xl lg:text-6xl font-bold text-gray-900 mb-6 tracking-tight">Layanan Utama</h2>
                    <div class="w-24 h-1 bg-primary-500 rounded-full mx-auto mb-6"></div>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">Berbagai layanan statistik untuk mendukung kebutuhan penelitian dan bisnis Anda</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Enhanced service cards with better shadows and hover effects -->
                    <!-- Perpustakaan -->
                    <div class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 p-8 relative group transform hover:-translate-y-2">
                        <div class="absolute top-6 right-6">
                            <span class="bg-green-100 text-green-800 text-xs font-bold px-4 py-2 rounded-full">GRATIS</span>
                        </div>
                        <div class="w-18 h-18 bg-gradient-to-br from-primary-500 to-primary-600 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Perpustakaan</h3>
                        <p class="text-sm font-semibold text-primary-600 mb-4 uppercase tracking-wide">Layanan Umum</p>
                        <p class="text-gray-600 mb-8 leading-relaxed">Publikasi statistik terbitan BPS dari berbagai kategori: kependudukan, sosial, ekonomi, dan pertanian.</p>
                        <a href="https://pst.bps.go.id/layanan/perpustakaan" class="inline-flex items-center text-primary-600 font-bold hover:text-primary-700 transition-colors duration-300 group-hover:translate-x-1">
                            Cari Pustaka
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>

                    <!-- Produk Berbayar -->
                    <div class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 p-8 relative group transform hover:-translate-y-2">
                        <div class="absolute top-6 right-6">
                            <span class="bg-red-100 text-red-800 text-xs font-bold px-4 py-2 rounded-full">BERBAYAR</span>
                        </div>
                        <div class="w-18 h-18 bg-gradient-to-br from-red-500 to-red-600 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Produk Statistik</h3>
                        <p class="text-sm font-semibold text-primary-600 mb-4 uppercase tracking-wide">Layanan Umum</p>
                        <p class="text-gray-600 mb-8 leading-relaxed">Layanan penjualan data mikro, publikasi elektronik, dan peta digital wilayah statistik.</p>
                        <a href="https://pst.bps.go.id/layanan/pembelian" class="inline-flex items-center text-primary-600 font-bold hover:text-primary-700 transition-colors duration-300 group-hover:translate-x-1">
                            Beli Data & Publikasi
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>

                    <!-- Konsultasi -->
                    <div class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 p-8 relative group border-2 border-accent-200 transform hover:-translate-y-2">
                        <div class="absolute top-6 right-6">
                            <span class="bg-accent-100 text-accent-800 text-xs font-bold px-4 py-2 rounded-full">UNGGULAN</span>
                        </div>
                        <div class="w-18 h-18 bg-gradient-to-br from-accent-500 to-accent-600 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Konsultasi</h3>
                        <p class="text-sm font-semibold text-primary-600 mb-4 uppercase tracking-wide">Layanan Umum</p>
                        <p class="text-gray-600 mb-8 leading-relaxed">Konsultasi terkait data, metadata, klasifikasi, dan produk statistik BPS lainnya.</p>
                        <a href="{{ route('konsultasi.create') }}" class="inline-flex items-center text-accent-600 font-bold hover:text-accent-700 transition-colors duration-300 group-hover:translate-x-1">
                            Ajukan Konsultasi
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>

                    <!-- Rekomendasi -->
                    <div class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 p-8 relative group transform hover:-translate-y-2">
                        <div class="absolute top-6 right-6">
                            <span class="bg-green-100 text-green-800 text-xs font-bold px-4 py-2 rounded-full">GRATIS</span>
                        </div>
                        <div class="w-18 h-18 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mb-8 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                            </svg>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Rekomendasi</h3>
                        <p class="text-sm font-semibold text-primary-600 mb-4 uppercase tracking-wide">Layanan Instansi</p>
                        <p class="text-gray-600 mb-8 leading-relaxed">Layanan bagi instansi pemerintah untuk survei dan rekomendasi kegiatan statistik.</p>
                        <a href="https://pst.bps.go.id/layanan/romantik" class="inline-flex items-center text-primary-600 font-bold hover:text-primary-700 transition-colors duration-300 group-hover:translate-x-1">
                            Minta Rekomendasi
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>


        <!-- Layanan Pendukung -->
        <section class="py-24 bg-white">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-20">
                    <h2 class="text-5xl lg:text-6xl font-bold text-gray-900 mb-6 tracking-tight">Layanan Pendukung</h2>
                    <div class="w-24 h-1 bg-primary-500 rounded-full mx-auto mb-6"></div>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">Layanan tambahan untuk mendukung kebutuhan data dan teknologi</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                    <!-- Enhanced supporting service cards -->
                    <!-- WebAPI -->
                    <div class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 p-10 border border-gray-100 group transform hover:-translate-y-2">
                        <div class="flex items-center justify-between mb-8">
                            <div class="w-18 h-18 bg-gradient-to-br from-primary-500 to-primary-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" />
                                </svg>
                            </div>
                            <span class="bg-green-100 text-green-800 text-xs font-bold px-4 py-2 rounded-full">GRATIS</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">WebAPI</h3>
                        <p class="text-sm font-semibold text-primary-600 mb-4 uppercase tracking-wide">Layanan Developer</p>
                        <p class="text-gray-600 mb-8 leading-relaxed">API data statistik BPS untuk integrasi dengan aplikasi dan sistem lain.</p>
                        <a href="https://webapi.bps.go.id/developer/" class="inline-flex items-center text-primary-600 font-bold hover:text-primary-700 transition-colors duration-300 group-hover:translate-x-1">
                            Kunjungi WebAPI
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                    </div>

                    <!-- StatInaLab -->
                    <div class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 p-10 border border-gray-100 group transform hover:-translate-y-2">
                        <div class="flex items-center justify-between mb-8">
                            <div class="w-18 h-18 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" />
                                </svg>
                            </div>
                            <span class="bg-blue-100 text-blue-800 text-xs font-bold px-4 py-2 rounded-full">INTERNAL</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">StatInaLab</h3>
                        <p class="text-sm font-semibold text-primary-600 mb-4 uppercase tracking-wide">Layanan Internal BPS</p>
                        <p class="text-gray-600 mb-8 leading-relaxed">Statistics Indonesia Data Lab untuk pengalaman real time pemrosesan data mikro.</p>
                        <a href="https://statinalab.bps.go.id/" class="inline-flex items-center text-primary-600 font-bold hover:text-primary-700 transition-colors duration-300 group-hover:translate-x-1">
                            Kunjungi StatInaLab
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                    </div>

                    <!-- Transdata -->
                    <div class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 p-10 border border-gray-100 group transform hover:-translate-y-2">
                        <div class="flex items-center justify-between mb-8">
                            <div class="w-18 h-18 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300 shadow-lg">
                                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l3 3-3 3m5 0h3M5 20h14a2 2 0 002-2V6a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <span class="bg-purple-100 text-purple-800 text-xs font-bold px-4 py-2 rounded-full">INSTANSI</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">Transdata</h3>
                        <p class="text-sm font-semibold text-primary-600 mb-4 uppercase tracking-wide">Layanan Instansi</p>
                        <p class="text-gray-600 mb-8 leading-relaxed">Sistem pertukaran data antara BPS dan Kementerian/Lembaga dengan kerja sama.</p>
                        <a href="https://pst.bps.go.id/layanan/transdata" class="inline-flex items-center text-primary-600 font-bold hover:text-primary-700 transition-colors duration-300 group-hover:translate-x-1">
                            Kunjungi Transdata
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Artikel Terbaru -->
        <section class="py-24 bg-gradient-to-br from-gray-50 to-gray-100">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-20">
                    <h2 class="text-5xl lg:text-6xl font-bold text-gray-900 mb-6 tracking-tight">Artikel Terbaru</h2>
                    <div class="w-24 h-1 bg-primary-500 rounded-full mx-auto mb-6"></div>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">Informasi dan tips terkini seputar layanan statistik</p>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 max-w-6xl mx-auto">
                    <!-- Enhanced article cards with better gradients and hover effects -->
                    <article class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 overflow-hidden group transform hover:-translate-y-2">
                        <div class="h-56 bg-gradient-to-br from-primary-400 via-primary-500 to-primary-600 relative overflow-hidden">
                            <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors duration-300"></div>
                            <div class="absolute bottom-4 left-4 right-4">
                                <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-primary-600 transition-colors duration-300 leading-tight">Tips Memahami Data Statistik dengan Mudah</h3>
                            <p class="text-gray-600 mb-8 leading-relaxed">Pelajari cara cepat memahami data statistik untuk kebutuhan riset dan bisnis Anda.</p>
                            <a href="#" class="inline-flex items-center text-primary-600 font-bold hover:text-primary-700 transition-colors duration-300 group-hover:translate-x-1">
                                Baca Selengkapnya
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </article>
                    
                    <article class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 overflow-hidden group transform hover:-translate-y-2">
                        <div class="h-56 bg-gradient-to-br from-green-400 via-green-500 to-green-600 relative overflow-hidden">
                            <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors duration-300"></div>
                            <div class="absolute bottom-4 left-4 right-4">
                                <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-primary-600 transition-colors duration-300 leading-tight">Panduan Ajukan Konsultasi di SPINTAR</h3>
                            <p class="text-gray-600 mb-8 leading-relaxed">Langkah-langkah mudah mengajukan janji temu konsultasi melalui platform kami.</p>
                            <a href="#" class="inline-flex items-center text-primary-600 font-bold hover:text-primary-700 transition-colors duration-300 group-hover:translate-x-1">
                                Baca Selengkapnya
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </article>
                    
                    <article class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transition-all duration-500 overflow-hidden group transform hover:-translate-y-2">
                        <div class="h-56 bg-gradient-to-br from-purple-400 via-purple-500 to-purple-600 relative overflow-hidden">
                            <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors duration-300"></div>
                            <div class="absolute bottom-4 left-4 right-4">
                                <div class="w-12 h-12 bg-white/20 backdrop-blur-sm rounded-xl flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <div class="p-8">
                            <h3 class="text-2xl font-bold text-gray-900 mb-4 group-hover:text-primary-600 transition-colors duration-300 leading-tight">Keamanan Data dalam Layanan SPINTAR</h3>
                            <p class="text-gray-600 mb-8 leading-relaxed">Cara kami menjaga privasi dan keamanan data pengguna selama proses konsultasi.</p>
                            <a href="#" class="inline-flex items-center text-primary-600 font-bold hover:text-primary-700 transition-colors duration-300 group-hover:translate-x-1">
                                Baca Selengkapnya
                                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                                </svg>
                            </a>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="py-24 bg-gradient-to-r from-primary-900 via-primary-800 to-primary-700 text-white relative overflow-hidden">
            <!-- Enhanced CTA section with better background and spacing -->
            <div class="absolute inset-0 bg-gradient-to-br from-black/20 to-black/40"></div>
            <div class="max-w-5xl mx-auto px-6 text-center relative z-10">
                <h2 class="text-5xl lg:text-6xl font-bold mb-8 tracking-tight">Siap untuk Konsultasi?</h2>
                <div class="w-24 h-1 bg-accent-500 rounded-full mx-auto mb-8"></div>
                <p class="text-2xl mb-12 text-gray-100 leading-relaxed font-light max-w-3xl mx-auto">Dapatkan wawasan statistik profesional untuk mendukung keputusan bisnis dan penelitian Anda</p>
                <div class="flex flex-col sm:flex-row gap-6 justify-center">
                    <a href="{{ route('konsultasi.create') }}"
                       class="group inline-flex items-center justify-center px-12 py-5 bg-accent-500 hover:bg-accent-400 text-white font-bold rounded-2xl shadow-2xl hover:shadow-accent-500/25 transition-all duration-300 text-xl transform hover:scale-105">
                        <svg class="w-6 h-6 mr-3 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                        Ajukan Konsultasi Sekarang
                    </a>
                    <a href="#prosedur"
                       class="inline-flex items-center justify-center px-12 py-5 border-2 border-white/80 text-white font-bold rounded-2xl hover:bg-white hover:text-primary-900 transition-all duration-300 text-xl backdrop-blur-sm">
                        Pelajari Prosedur
                    </a>
                </div>
            </div>
        </section>
    </main>

    <x-footer />
</body>

</html>
