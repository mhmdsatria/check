<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Super Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">
    <a href="{{ url('/admin/super-admin/add-user') }}" 
   class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
    + Add User
</a>

    <div class="max-w-7xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Dashboard Super Admin</h1>
        <p class="mb-6">Selamat datang, {{ Auth::user()->name }} ({{ Auth::user()->role }})</p>

        {{-- Statistik --}}
        <div class="grid grid-cols-4 gap-4 mb-6">
            <div class="bg-white p-4 rounded shadow">
                <p class="text-gray-600">Total Konsultasi</p>
                <p class="text-2xl font-bold">{{ $totalKonsultasi }}</p>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <p class="text-gray-600">Diterima</p>
                <p class="text-2xl font-bold">{{ $totalDiterima }}</p>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <p class="text-gray-600">Ditolak</p>
                <p class="text-2xl font-bold">{{ $totalDitolak }}</p>
            </div>
            <div class="bg-white p-4 rounded shadow">
                <p class="text-gray-600">Pending</p>
                <p class="text-2xl font-bold">{{ $totalRiwayat }}</p>
            </div>
        </div>

        {{-- Tabel Riwayat Konsultasi --}}
        <h2 class="text-2xl font-semibold mb-3">Riwayat Konsultasi</h2>
        <table class="w-full border border-gray-300 bg-white mb-8">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="border p-2">Nama</th>
                    <th class="border p-2">Email</th>
                    <th class="border p-2">Tanggal</th>
                    <th class="border p-2">Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($konsultasiTerbaru as $k)
                    <tr>
                        <td class="border p-2">{{ $k->nama_lengkap }}</td>
                        <td class="border p-2">{{ $k->email }}</td>
                        <td class="border p-2">{{ $k->tanggal }}</td>
                        <td class="border p-2">{{ ucfirst($k->status) }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center p-3 text-gray-500">Belum ada data konsultasi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <h2>Kelola Divisi</h2>
<form action="{{ route('super-admin.store-divisi') }}" method="POST">
    @csrf
    <input type="text" name="nama_divisi" placeholder="Nama Divisi" required>
    <button type="submit">Tambah Divisi</button>
</form>

<ul>
    @foreach($divisis as $divisi)
        <li>{{ $divisi->nama_divisi }}</li>
    @endforeach
</ul>

        {{-- Tabel Users --}}
        <h2 class="text-2xl font-semibold mb-3">Daftar Pengguna</h2>
        <table class="w-full border border-gray-300 bg-white">
            <thead>
                <tr class="bg-gray-200 text-left">
                    <th class="border p-2">Nama</th>
                    <th class="border p-2">Email</th>
                    <th class="border p-2">Role</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr>
                        <td class="border p-2">{{ $user->name }}</td>
                        <td class="border p-2">{{ $user->email }}</td>
                        <td class="border p-2">{{ $user->role }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center p-3 text-gray-500">Belum ada user terdaftar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>
