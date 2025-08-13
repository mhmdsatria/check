<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>SPINTAS - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-full">
    <!-- Using admin navigation component instead of embedded navigation -->
    <!-- Admin Navigation Component -->
    <nav class="fixed inset-y-0 left-0 z-50 w-64 bg-gradient-to-b from-blue-900 via-blue-800 to-indigo-900 shadow-xl transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out"
        id="sidebar">
        <!-- Header -->
        <div
            class="flex items-center justify-center h-16 bg-gradient-to-r from-blue-800 to-indigo-800 border-b border-blue-700">
            <div class="flex items-center space-x-3">
                <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                    <img src="{{ asset('storage/logo-bps.webp') }}" alt="Logo BPS" class="h-10 w-10 object-contain" />
                </div>
                <h1 class="text-xl font-bold text-white">SPINTAR<br>Admin Panel</h1>
            </div>
        </div>

        <!-- User Profile Section -->
        <div class="p-4 border-b border-blue-700">
            <div class="flex items-center space-x-3">
                <div
                    class="w-10 h-10 bg-gradient-to-r from-blue-400 to-indigo-400 rounded-full flex items-center justify-center text-white font-semibold">
                    {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
                </div>
                <div>
                    <p class="text-white font-medium">{{ Auth::user()->name ?? 'Admin' }}</p>
                    <p class="text-blue-200 text-sm">{{ Auth::user()->email ?? 'admin@example.com' }}</p>
                </div>
            </div>
        </div>

        <!-- Navigation Menu -->
        <div class="flex-1 px-4 py-6 space-y-2">
            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center px-4 py-3 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 group {{ request()->routeIs('admin.dashboard') ? 'bg-blue-700 shadow-lg' : '' }}">
                <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-blue-200' : 'text-blue-300' }} group-hover:text-blue-200"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z" />
                </svg>
                <span class="font-medium">Dashboard</span>
                @if(request()->routeIs('admin.dashboard'))
                <div class="ml-auto w-2 h-2 bg-blue-200 rounded-full"></div>
                @endif
            </a>

            <!-- Konsultasi -->
            <a href="{{ route('admin.dashboard') }}"
                class="flex items-center px-4 py-3 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 group {{ request()->routeIs('admin.konsultasi.*') ? 'bg-blue-700 shadow-lg' : '' }}">
                <svg class="w-5 h-5 mr-3 {{ request()->routeIs('admin.konsultasi.*') ? 'text-blue-200' : 'text-blue-300' }} group-hover:text-blue-200"
                    fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z"
                        clip-rule="evenodd" />
                </svg>
                <span class="font-medium">Konsultasi</span>
                @if(request()->routeIs('admin.konsultasi.*'))
                <div class="ml-auto w-2 h-2 bg-blue-200 rounded-full"></div>
                @endif
            </a>
        </div>

        <!-- Logout Section -->
        <div class="p-4 border-t border-blue-700">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit"
                    class="flex items-center w-full px-4 py-3 text-white rounded-lg hover:bg-red-600 transition-colors duration-200 group">
                    <svg class="w-5 h-5 mr-3 text-red-300 group-hover:text-red-200" fill="currentColor"
                        viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
                            clip-rule="evenodd" />
                    </svg>
                    <span class="font-medium">Logout</span>
                </button>
            </form>
        </div>
    </nav>

    <!-- Mobile Menu Overlay -->
    <div class="fixed inset-0 z-40 bg-black bg-opacity-50 lg:hidden hidden" id="sidebar-overlay"></div>

    <!-- Mobile Menu Button -->
    <div class="lg:hidden fixed top-4 left-4 z-50">
        <button id="mobile-menu-button"
            class="p-2 bg-blue-600 text-white rounded-lg shadow-lg hover:bg-blue-700 transition-colors duration-200">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    <!-- Added proper margin for sidebar and enhanced styling -->
    <main class="lg:ml-64 min-h-screen bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="max-w-7xl mx-auto p-6">
            <!-- Enhanced success message styling with gradient and icon -->
            @if(session('success'))
            <div
                class="mb-6 rounded-xl bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-green-800 font-medium">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
            @endif

            <!-- Enhanced error message styling -->
            @if(session('error'))
            <div class="mb-6 rounded-xl bg-gradient-to-r from-red-50 to-rose-50 border border-red-200 p-4 shadow-sm">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-red-800 font-medium">{{ session('error') }}</p>
                    </div>
                </div>
            </div>
            @endif

            <!-- Enhanced validation error styling -->
            @if($errors->any())
            <div
                class="mb-6 rounded-xl bg-gradient-to-r from-yellow-50 to-amber-50 border border-yellow-200 p-4 shadow-sm">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-yellow-800 font-medium">Terdapat kesalahan:</h3>
                        <ul class="mt-2 text-yellow-700 list-disc list-inside space-y-1">
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endif

            {{ $slot ?? '' }}
            @yield('content')
        </div>
    </main>

    <!-- Added loading overlay for better UX -->
    <div id="loading-overlay" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden items-center justify-center">
        <div class="bg-white rounded-lg p-6 shadow-xl">
            <div class="flex items-center space-x-3">
                <div class="animate-spin rounded-full h-6 w-6 border-b-2 border-blue-600"></div>
                <span class="text-gray-700 font-medium">Memproses...</span>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Show loading overlay on form submissions
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function() {
                    document.getElementById('loading-overlay').classList.remove('hidden');
                    document.getElementById('loading-overlay').classList.add('flex');
                });
            });

            // Smooth scrolling for anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Auto-hide success messages after 5 seconds
            const successMessages = document.querySelectorAll('.bg-gradient-to-r.from-green-50');
            successMessages.forEach(message => {
                setTimeout(() => {
                    message.style.transition = 'opacity 0.5s ease-out';
                    message.style.opacity = '0';
                    setTimeout(() => message.remove(), 500);
                }, 5000);
            });
        });
    </script>
</body>

</html>