<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin Divisi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-6xl mx-auto p-6">
        {{-- Judul --}}
        <h1 class="text-3xl font-bold mb-4">Dashboard Admin Divisi</h1>
        <p class="mb-6 text-gray-700">
            Selamat datang, <span class="font-semibold">{{ Auth::user()->name }}</span> 
            (<span class="italic">{{ Auth::user()->role }}</span>)
        </p>

        {{-- Alert Sukses --}}
        @if(session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 border border-green-300 rounded">
                {{ session('success') }}
            </div>
        @endif

        {{-- Alert Error --}}
        @if(session('error'))
            <div class="mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded">
                {{ session('error') }}
            </div>
        @endif

        {{-- Tabel Konsultasi --}}
        <h2 class="text-2xl font-semibold mb-3">Daftar Konsultasi Masuk</h2>
        <div class="overflow-x-auto">
            <table class="w-full border border-gray-300 bg-white rounded-lg overflow-hidden">
                <thead>
                    <tr class="bg-gray-200 text-left">
                        <th class="border p-3">Nama</th>
                        <th class="border p-3">Email</th>
                        <th class="border p-3">Tanggal</th>
                        <th class="border p-3">Status</th>
                        <th class="border p-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($konsultasis as $k)
                        <tr class="hover:bg-gray-50">
                            <td class="border p-3">{{ $k->nama_lengkap }}</td>
                            <td class="border p-3">{{ $k->email }}</td>
                            <td class="border p-3">{{ \Carbon\Carbon::parse($k->tanggal)->format('d M Y') }}</td>
                            <td class="border p-3">
                                @if($k->status == 'diterima')
                                    <span class="px-2 py-1 bg-green-100 text-green-700 rounded text-sm">Diterima</span>
                                @elseif($k->status == 'ditolak')
                                    <span class="px-2 py-1 bg-red-100 text-red-700 rounded text-sm">Ditolak</span>
                                @else
                                    <span class="px-2 py-1 bg-yellow-100 text-yellow-700 rounded text-sm">Pending</span>
                                @endif
                            </td>
                            <td class="border p-3 text-center">
                                @if($k->status == 'pending')
                                    <div class="flex gap-2 justify-center">
                                        {{-- Tombol Terima --}}
                                        <form action="{{ route('konsultasi.verifikasi', $k->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="diterima">
                                            <button type="submit" 
                                                class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded text-sm">
                                                Terima
                                            </button>
                                        </form>

                                        {{-- Tombol Tolak --}}
                                        <form action="{{ route('konsultasi.verifikasi', $k->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="status" value="ditolak">
                                            <button type="submit" 
                                                class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-sm">
                                                Tolak
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <span class="text-gray-500 italic">Sudah divalidasi</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center p-4 text-gray-500">
                                Belum ada konsultasi masuk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Tombol Logout --}}
        <div class="mt-6">
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button type="submit" class="bg-gray-700 text-white px-4 py-2 rounded hover:bg-gray-800">
                    Logout
                </button>
            </form>
        </div>
    </div>
</body>
</html>
