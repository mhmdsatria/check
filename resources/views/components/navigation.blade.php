@php
$currentRoute = request()->route()->getName();
@endphp

<!-- Navigation Sidebar -->
<nav class="fixed inset-y-0 left-0 z-50 w-64 bg-gradient-to-b from-slate-900 via-slate-800 to-slate-900 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out" id="sidebar">
    <!-- Logo Section -->
    <div class="flex items-center justify-center h-16 px-4 bg-gradient-to-r from-blue-600 to-purple-600">
        <div class="flex items-center space-x-3">
            <div class="w-8 h-8 bg-white rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
            </div>
            <span class="text-xl font-bold text-white">Super Admin</span>
        </div>
    </div>

    <!-- User Profile Section -->
    <div class="p-4 border-b border-slate-700">
        <div class="flex items-center space-x-3">
            <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center">
                <span class="text-white font-semibold text-sm">{{ substr(auth()->user()->name ?? 'SA', 0, 2) }}</span>
            </div>
            <div>
                <p class="text-white font-medium text-sm">{{ auth()->user()->name ?? 'Super Admin' }}</p>
                <p class="text-slate-400 text-xs">{{ auth()->user()->email ?? 'admin@example.com' }}</p>
            </div>
        </div>
    </div>

    <!-- Navigation Menu -->
    <div class="flex-1 px-4 py-6 space-y-2">
        <!-- Dashboard -->
        <a href="{{ route('superadmin.dashboard') }}" 
           class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-all duration-200 group {{ $currentRoute === 'superadmin.dashboard' ? 'bg-gradient-to-r from-blue-600 to-purple-600 text-white shadow-lg' : 'text-slate-300 hover:bg-slate-700 hover:text-white' }}">
            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
            </svg>
            Dashboard
        </a>

        <!-- Konsultasi -->
        <a href="{{ route('superadmin.superadmin.konsultasi.index') }}" 
           class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-all duration-200 group {{ str_contains($currentRoute, 'konsultasi') ? 'bg-gradient-to-r from-green-600 to-teal-600 text-white shadow-lg' : 'text-slate-300 hover:bg-slate-700 hover:text-white' }}">
            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"/>
            </svg>
            Konsultasi
        </a>

        <!-- Accounts Management -->
        <a href="{{ route('superadmin.accounts') }}" 
           class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-all duration-200 group {{ str_contains($currentRoute, 'accounts') ? 'bg-gradient-to-r from-orange-600 to-red-600 text-white shadow-lg' : 'text-slate-300 hover:bg-slate-700 hover:text-white' }}">
            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
            </svg>
            Kelola Akun
        </a>

        <!-- Bidang Management -->
        <a href="{{ route('superadmin.bidang.index') }}" 
           class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-all duration-200 group {{ str_contains($currentRoute, 'bidang') ? 'bg-gradient-to-r from-purple-600 to-pink-600 text-white shadow-lg' : 'text-slate-300 hover:bg-slate-700 hover:text-white' }}">
            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h4a2 2 0 012 2v2a2 2 0 01-2 2H8a2 2 0 01-2-2v-2z" clip-rule="evenodd"/>
            </svg>
            Kelola Bidang
        </a>

        <!-- Divider -->
        <div class="border-t border-slate-700 my-4"></div>

        <!-- Settings -->
        <a href="#" 
           class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-all duration-200 group text-slate-300 hover:bg-slate-700 hover:text-white">
            <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"/>
            </svg>
            Pengaturan
        </a>

        <!-- Logout -->
        <form method="POST" action="{{ route('logout') }}" class="mt-4">
            @csrf
            <button type="submit" 
                    class="flex items-center w-full px-4 py-3 text-sm font-medium rounded-lg transition-all duration-200 group text-slate-300 hover:bg-red-600 hover:text-white">
                <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"/>
                </svg>
                Keluar
            </button>
        </form>
    </div>
</nav>

<!-- Mobile Menu Button -->
<div class="lg:hidden fixed top-4 left-4 z-50">
    <button id="mobile-menu-button" 
            class="p-2 rounded-lg bg-slate-800 text-white shadow-lg hover:bg-slate-700 transition-colors duration-200">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
    </button>
</div>

<!-- Mobile Overlay -->
<div id="mobile-overlay" class="lg:hidden fixed inset-0 bg-black bg-opacity-50 z-40 hidden"></div>

<!-- JavaScript for Mobile Menu -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('mobile-overlay');

    function toggleMobileMenu() {
        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
    }

    mobileMenuButton.addEventListener('click', toggleMobileMenu);
    overlay.addEventListener('click', toggleMobileMenu);

    // Close menu on escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !sidebar.classList.contains('-translate-x-full')) {
            toggleMobileMenu();
        }
    });
});
</script>
