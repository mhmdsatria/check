<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Form Konsultasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('build/assets/app.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 min-h-screen">
    <x-navbar></x-navbar>
    <main class="" style="background-image: url('{{ asset('storage/bg-scenery.webp') }}'); background-size: contain;">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-12 items-center py-16">
            <!-- Kolom Kiri: Teks -->
            <div>
                <h2 class="text-4xl text-left md:text-5xl font-bold text-white mb-6 leading-snug">
                    Spintar Bps Kota Sukabumi Untuk Konsultasi Statistik Masyarakat
                </h2>
                <p class="text-lg text-left text-white leading-relaxed">
                    SPINTAR (Satu Pintu Informasi dan Konsultasi) merupakan layanan resmi Badan Pusat Statistik
                    (BPS) Kota Sukabumi yang dirancang untuk memudahkan masyarakat dalam mengakses informasi,
                    melakukan konsultasi, serta memperoleh layanan terkait data statistik secara cepat, mudah, dan
                    profesional.
                </p>
                <div class="mt-6">
                    <a href="{{ route('konsultasi.create') }}"
                        class="font-medium bg-[oklch(76.9%_0.188_70.08)] hover:bg-[oklch(82.8%_0.189_84.429)] text-white px-6 py-3 rounded-lg shadow-md">
                        Ajukan Sekarang
                    </a>
                </div>
            </div>

            <!-- Kolom Kanan: Gambar -->
            <div class="flex justify-center">
                <img src="{{ asset('storage/C.png') }}" alt="Ilustrasi SPINTAR" class="w-full max-w-md">
            </div>
        </div>
    </main>
    <x-layout>
        <div class="text-center text-black py-8 px-4">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Layanan Terbaik Spintar</h1>
            <p class="text-gray-600 mb-8">
                Dapatkan berbagai layanan konsultasi dan informasi yang anda butuhkan<br>
                dengan mudah dan cepat
            </p>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 justify-items-center">
                <x-card />
                <x-card />
                <x-card />
            </div>
        </div>
    </x-layout>
    <x-layout>
        <div class="grid grid-cols-2 gap-4">
            <div class=" bg-white">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">Mengapa memilih Spintar?</h1>
                <div >
                    <div>
                        <h1 class="text-xl text-gray-800 font-medium">Tanpa Registrasi</h1>
                        <p>Ajukan konsultasi langsung tanpa ribet membuat akun</p>
                    </div>
                    <div>
                        <h1 class="text-xl text-gray-800 font-medium">responsif dan cepat</h1>
                        <p>Proses validasi cepat dengan respon yang sigap.</p>
                    </div>
                    <div>
                        <h1 class="text-xl text-gray-800 font-medium">multi platform</h1>
                        <p>Akses layanan dari perangkat apa saja, kapan saja.</p>
                    </div>
                </div>
            </div>
            <div class=" bg-white">
                <div class=" bg-white border border-gray-200">
                    <img src="{{ asset('storage/C.png') }}" alt="">
                </div>
            </div>
        </div>
    </x-layout>
    <x-form-pengajuan :divisis="$divisis"></x-form-pengajuan>

    <x-layout>
        {{-- <x-form-pengajuan></x-form-pengajuan> --}}
    </x-layout>
    <x-footer></x-footer>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const form = document.getElementById('consultation-form');
            const successAlert = document.getElementById('success-alert');

            form.addEventListener('submit', function(event) {
                // Mencegah perilaku default pengiriman form (refresh halaman)
                event.preventDefault();
                
                // Untuk demo, kita hanya akan menampilkan pesan sukses
                // Dalam aplikasi nyata, Anda akan mengirim data ke server menggunakan fetch() di sini.
                
                // Sembunyikan form dan tampilkan pesan sukses
                form.style.display = 'none';
                successAlert.style.display = 'block';
                successAlert.style.opacity = '1';

                // Opsional: Atur timeout untuk menyembunyikan pesan dan menampilkan form lagi
                // setTimeout(() => {
                //     successAlert.style.opacity = '0';
                //     setTimeout(() => {
                //         successAlert.style.display = 'none';
                //         form.style.display = 'block';
                //         form.reset();
                //     }, 300);
                // }, 5000);
            });
        });
    </script>
</body>

</html>