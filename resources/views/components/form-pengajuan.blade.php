@php
use App\Models\Divisi;
$divisis = Divisi::all();
@endphp

<div class="flex justify-center px-4">
    <div class="w-full max-w-4xl bg-white p-8 rounded-2xl shadow-lg border border-gray-200">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-6">Ajukan Konsultasi Anda</h2>

        {{-- Alert sukses --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-4 text-center border border-green-200">
                {{ session('success') }}
            </div>
        @endif

        {{-- Form --}}
        <form action="{{ route('konsultasi.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Grid 2 kolom untuk 4 field pertama -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Nama Lengkap -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" placeholder="Masukkan nama lengkap" 
                        class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                </div>

                <!-- No WA -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nomor WhatsApp Aktif</label>
                    <input type="text" name="no_wa" placeholder="Masukkan nomor WhatsApp yang dapat dihubungi" 
                        class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                </div>

                <!-- Instansi -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Instansi/Lembaga (Opsional)</label>
                    <input type="text" name="instansi" placeholder="Masukkan instansi/lembaga anda" 
                        class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                    <input type="email" name="email" placeholder="Masukkan email aktif" 
                        class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
                </div>
            </div>

            <!-- Pilih Divisi -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Divisi Tujuan</label>
                <select name="divisi_id" required 
                    class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none">
                    <option value="">-- Pilih Divisi --</option>
                    @foreach($divisis as $divisi)
                        <option value="{{ $divisi->id }}">{{ $divisi->nama_divisi }}</option>
                    @endforeach
                </select>
            </div>

            <!-- Tanggal -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Konsultasi</label>
                <input type="date" name="tanggal" 
                    class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>

            <!-- Waktu -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Waktu Konsultasi</label>
                <input type="time" name="waktu" 
                    class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>

            <!-- Deskripsi -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
                <textarea name="deskripsi" placeholder="Masukkan keterangan pengajuan anda" rows="4" 
                    class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none" required></textarea>
            </div>

            <!-- File Upload -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Upload File (Opsional)</label>
                <input type="file" name="file" 
                    class="w-full border border-gray-300 rounded-lg p-2.5 focus:outline-none">
            </div>

            <!-- Submit -->
            <button type="submit" 
                class="w-full bg-primary text-white py-3 rounded-lg hover:bg-slate-800 transition flex items-center justify-center font-semibold">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2">
                    <path d="M10 14L21 3"></path>
                    <path d="M21 3L14.5 21L10.5 14.5L3 10L21 3Z"></path>
                </svg>
                Kirim Permohonan
            </button>
        </form>
    </div>
</div>
