<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Admin Divisi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <h2 class="text-2xl font-bold text-center mb-4">Login Admin Divisi</h2>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                {{ $errors->first() }}
            </div>
        @endif

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('post.login.admin') }}" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium">Email</label>
                <input type="email" name="email" required 
                    class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-sm font-medium">Password</label>
                <input type="password" name="password" required 
                    class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-500">
            </div>
            <button type="submit" 
                class="w-full bg-green-600 text-white py-2 rounded hover:bg-green-700">
                Login
            </button>
        </form>

        <p class="text-center mt-4 text-sm text-gray-600">
            Login sebagai Super Admin? 
            <a href="{{ route('login.superadmin') }}" class="text-blue-600 hover:underline">Klik di sini</a>
        </p>
    </div>
</body>
</html>
