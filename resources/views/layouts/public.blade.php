<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>SPINTAS - @yield('title', 'Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Smooth transitions */
        * {
            transition: all 0.2s ease-in-out;
        }
        
        /* Mobile background optimization */
        @media (max-width: 640px) {
            body {
                background-size: cover;
            }
        }
    </style>
</head>

<body class="min-h-screen flex flex-col bg-gray-50">
    
    <!-- Header Navigation -->
    <x-header/>

    <!-- Main Content -->
    <main class="flex-grow">
        <!-- Success Message -->
        @if(session('success'))
            <div class="container mx-auto px-4 sm:px-6 lg:px-8 pt-6">
                <div id="successMessage" class="bg-green-50 border border-green-200 text-green-800 px-4 py-3 rounded-lg mb-6 shadow-sm flex items-center justify-between" role="alert">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ session('success') }}</span>
                    </div>
                    <button onclick="closeSuccessMessage()" class="ml-4 text-green-600 hover:text-green-800 transition-colors">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        @endif

        <!-- Content Container -->
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8">
            {{-- Jika dipanggil sebagai komponen --}}
            {{ $slot ?? '' }}

            {{-- Jika dipanggil dengan @extends --}}
            @yield('content')
        </div>
    </main>

    <!-- Footer -->
    <x-footer/>

    <!-- Mobile Menu Toggle Script -->
    <script>
        function toggleMobileMenu() {
            const menu = document.getElementById('mobileMenu');
            menu.classList.toggle('hidden');
        }

        // Close mobile menu when clicking outside
        document.addEventListener('click', function(event) {
            const menu = document.getElementById('mobileMenu');
            const button = event.target.closest('button');
            
            if (!menu.contains(event.target) && !button) {
                menu.classList.add('hidden');
            }
        });

        // Auto-hide success message after 5 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const successMessage = document.getElementById('successMessage');
            if (successMessage) {
                setTimeout(function() {
                    successMessage.style.opacity = '0';
                    setTimeout(function() {
                        successMessage.style.display = 'none';
                    }, 300);
                }, 5000);
            }
        });

        // Function to manually close success message
        function closeSuccessMessage() {
            const successMessage = document.getElementById('successMessage');
            if (successMessage) {
                successMessage.style.opacity = '0';
                setTimeout(function() {
                    successMessage.style.display = 'none';
                }, 300);
            }
        }
    </script>
</body>

</html>
