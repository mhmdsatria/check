<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah User - Super Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen">
    <div class="max-w-4xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">Tambah User Baru</h1>
        <p class="mb-6 text-gray-600">Gunakan form ini untuk menambahkan Super Admin atau Admin Divisi baru.</p>

        {{-- Alert Sukses --}}
        @if(session('success'))
        <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-4 border border-green-200">
            {{ session('success') }}
        </div>
        @endif

        {{-- Alert Error --}}
        @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded-lg mb-4 border border-red-200">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        {{-- Form Tambah User --}}
        <form action="{{ route('super-admin.add-user') }}" method="POST"
            class="bg-white p-6 rounded-lg shadow-lg space-y-4">
            @csrf

            {{-- Nama --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                <input type="text" name="name" placeholder="Masukkan nama lengkap"
                    class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required>
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" placeholder="Masukkan email aktif"
                    class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required>
            </div>

            {{-- Password --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" placeholder="Minimal 6 karakter"
                    class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required>
            </div>

            {{-- Role --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                <select name="role" id="role"
                    class="w-full border border-gray-300 rounded-lg p-2.5 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    required>
                    <option value="">-- Pilih Role --</option>
                    <option value="SuperAdmin">Super Admin</option>
                    <option value="Admin">Admin Divisi</option>
                </select>
            </div>

            {{-- Divisi (Muncul Hanya Jika Role = Admin) --}}
            <div id="divisi-wrapper" style="display:none;">
                <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Divisi</label>
                <select name="divisi_id" required>
                    <option value="">-- Pilih Divisi --</option>
                    @foreach($divisis as $divisi)
                    <option value="{{ $divisi->id }}">{{ $divisi->nama_divisi }}</option>
                    @endforeach
                </select>

            </div>

            {{-- Submit --}}
            <button type="submit"
                class="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 transition font-semibold">
                Tambah User
            </button>
        </form>

        <div class="mt-6">
            <a href="{{ route('super-admin.index') }}" class="text-blue-600 hover:underline">← Kembali ke Dashboard</a>
        </div>
    </div>

    <script>
        // Tampilkan field divisi hanya jika role Admin dipilih
        document.getElementById('role').addEventListener('change', function () {
            const divisiWrapper = document.getElementById('divisi-wrapper');
            divisiWrapper.style.display = (this.value === 'Admin') ? 'block' : 'none';
        });
    </script>
</body>

</html>