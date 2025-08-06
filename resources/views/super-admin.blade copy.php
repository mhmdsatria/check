<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superadmin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gray-100 font-sans">
    @php
    $total = max($totalDiterima + $totalDitolak + $totalRiwayat, 1); // agar tidak 0
    @endphp
    {{-- <x-layout> --}}
        <div class="p-6 bg-gray-50 min-h-screen">

            <!-- Alert Notifications -->
            @foreach (['success' => 'green', 'warning' => 'yellow', 'error' => 'red'] as $msg => $color)
            @if(session($msg))
            <div
                class="alert relative flex items-center justify-between mb-4 p-3 rounded bg-{{ $color }}-100 text-{{ $color }}-800 border border-{{ $color }}-200 transition-opacity duration-500">
                <span>{{ session($msg) }}</span>
                <button type="button" class="ml-4 text-{{ $color }}-600 hover:text-{{ $color }}-800 focus:outline-none"
                    onclick="this.parentElement.remove()">
                    ✕
                </button>
            </div>
            @endif
            @endforeach
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-bold text-gray-800">Super Admin Dashboard</h1>
                <div class="flex items-center gap-4">
                    <span class="font-medium text-gray-700">Super Admin</span>
                    <img src="https://i.pravatar.cc/40" alt="Admin" class="w-10 h-10 rounded-full border">
                </div>
            </div>

            <!-- Statistik -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                <div class="bg-white p-4 rounded-lg shadow">
                    <p class="text-sm text-gray-500">Total Konsultasi</p>
                    <h2 class="text-2xl font-bold">{{ $totalKonsultasi }}</h2>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <p class="text-sm text-gray-500">Diterima</p>
                    <h2 class="text-2xl font-bold">{{ $totalDiterima }}</h2>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <p class="text-sm text-gray-500">Ditolak</p>
                    <h2 class="text-2xl font-bold">{{ $totalDitolak }}</h2>
                </div>
                <div class="bg-white p-4 rounded-lg shadow">
                    <p class="text-sm text-gray-500">Pending</p>
                    <h2 class="text-2xl font-bold">{{ $totalRiwayat }}</h2>
                </div>
            </div>
            <!-- Grafik -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <!-- Pie Chart -->
                <div class="bg-white p-5 rounded-lg shadow flex flex-col items-center justify-center">
                    <h3 class="text-base font-semibold mb-3 text-gray-700 text-center">Pie Chart</h3>
                    <div class="flex items-center gap-6">
                        <!-- Canvas Pie Chart -->
                        <div class="w-40 h-40">
                            <canvas id="pieChart"></canvas>
                        </div>

                        <!-- Keterangan di samping kanan -->
                        <div class="flex flex-col text-sm text-gray-600 space-y-1">
                            <p><span class="inline-block w-3 h-3 bg-green-500 rounded-full mr-1"></span>
                                Diterima: {{ number_format(($totalDiterima / max($total, 1)) * 100, 1) }}%
                            </p>
                            <p><span class="inline-block w-3 h-3 bg-red-500 rounded-full mr-1"></span>
                                Ditolak: {{ number_format(($totalDitolak / max($total, 1)) * 100, 1) }}%
                            </p>
                            <p><span class="inline-block w-3 h-3 bg-yellow-500 rounded-full mr-1"></span>
                                Pending: {{ number_format(($totalRiwayat / max($total, 1)) * 100, 1) }}%
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Bar Chart -->
                <div class="bg-white p-5 rounded-lg shadow flex flex-col items-center justify-center">
                    <h3 class="text-base font-semibold mb-3 text-gray-700">Bar Chart</h3>
                    <div class="w-full max-w-sm h-48">
                        <!-- Lebar penuh card, tinggi proporsional -->
                        <canvas id="barChart"></canvas>
                    </div>
                    <p class="text-xs text-gray-500 mt-2">Konsultasi per Bulan 2025</p>
                </div>
            </div>


            <script>
                document.addEventListener('DOMContentLoaded', function () {
        // Pie Chart
        const pieCtx = document.getElementById('pieChart').getContext('2d');
        new Chart(pieCtx, {
            type: 'pie',
            data: {
                // labels: ['Diterima', 'Ditolak', 'Pending'],
                datasets: [{
                    data: [{{ $totalDiterima }}, {{ $totalDitolak }}, {{ $totalRiwayat }}],
                    backgroundColor: ['#22c55e', '#ef4444', '#eab308'],
                    borderWidth: 2,
                    borderColor: '#fff',
                }]
            },
            options: {
                responsive: true,
                plugins: { legend: { position: 'bottom' } }
            }
        });

        // Bar Chart
        const barCtx = document.getElementById('barChart').getContext('2d');
        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($bulan) !!},
                datasets: [{
                    label: 'Jumlah Konsultasi',
                    data: {!! json_encode($jumlahPerBulan) !!},
                    backgroundColor: '#2563eb',
                    borderRadius: 5
                }]
            },
            options: {
                responsive: true,
                scales: { y: { beginAtZero: true, ticks: { stepSize: 5 } } },
                plugins: { legend: { display: false } }
            }
        });
    });
            </script>
            <!-- Tabel Riwayat -->
            <div class="bg-white p-6 rounded-lg shadow">
                <div class="flex justify-between items-center mb-4">
                    <h2 class="text-lg font-semibold text-gray-800">Riwayat Konsultasi Lengkap</h2>
                    <!-- Form Filter -->
                    <form id="filterForm" method="GET" action="{{ url('/admin/super-admin') }}"
                        class="flex flex-wrap md:flex-nowrap items-center gap-2">

                        <!-- Search -->
                        <input type="text" name="search" id="searchInput" value="{{ request('search') }}"
                            placeholder="Cari konsultasi..."
                            class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none w-full md:w-auto">

                        <!-- Dropdown Filter Status -->
                        <select name="status" id="statusFilter"
                            class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none w-full md:w-auto">
                            <option value="">Semua Status</option>
                            <option value="pending" {{ request('status')=='pending' ? 'selected' : '' }}>Pending
                            </option>
                            <option value="diterima" {{ request('status')=='diterima' ? 'selected' : '' }}>Diterima
                            </option>
                            <option value="ditolak" {{ request('status')=='ditolak' ? 'selected' : '' }}>Ditolak
                            </option>
                        </select>

                        <!-- Export Button -->
                        <a href=""
                            class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 text-sm w-full md:w-auto text-center">
                            Export Excel
                        </a>
                    </form>
                </div>
                

                <div x-data="konsultasiTable()" x-init="init()">
                    <!-- Konten tabel akan dimuat ulang -->
                    <div id="table-container">
                        @include('partials.konsultasi-table', ['konsultasiTerbaru' => $konsultasiTerbaru])
                    </div>
                </div>

            </div>
        </div>
        <!-- Script Auto Close -->
        <script>
            // Hilang otomatis setelah 5 detik
    setTimeout(() => {
        document.querySelectorAll('.alert').forEach(el => {
            el.style.opacity = '0';
            setTimeout(() => el.remove(), 500); // Hapus setelah animasi
        });
    }, 5000);
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        const statusFilter = document.getElementById('statusFilter');
        const filterForm = document.getElementById('filterForm');

        // Submit otomatis saat ketik (debounce biar gak terlalu sering reload)
        let typingTimer;
        searchInput.addEventListener('input', function () {
            clearTimeout(typingTimer);
            typingTimer = setTimeout(() => {
                filterForm.submit();
            }, 500); // Delay 0.5 detik setelah berhenti mengetik
        });

        // Submit otomatis saat ganti status filter
        statusFilter.addEventListener('change', function () {
            filterForm.submit();
        });
    });
        </script>
        <script>
function konsultasiTable() {
    return {
        init() {
            document.addEventListener('click', (e) => {
                if (e.target.closest('.pagination a')) {
                    e.preventDefault();
                    let url = e.target.closest('.pagination a').getAttribute('href');
                    this.loadTable(url);
                }
            });
        },
        loadTable(url) {
            fetch(url, { headers: { 'X-Requested-With': 'XMLHttpRequest' } })
                .then(res => res.text())
                .then(html => {
                    document.querySelector('#table-container').innerHTML = html;
                    window.history.pushState({}, '', url); // Update URL tanpa reload
                });
        }
    }
}
</script>

</body>

</html>