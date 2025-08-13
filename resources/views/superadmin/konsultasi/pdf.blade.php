<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan Konsultasi Publik</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 0;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            border-bottom: 2px solid #333;
            padding-bottom: 20px;
        }
        .header h1 {
            color: #333;
            margin: 0;
            font-size: 24px;
        }
        .header p {
            color: #666;
            margin: 5px 0;
        }
        .filter-info {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .filter-info h3 {
            margin: 0 0 10px 0;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
            vertical-align: top;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
            color: #333;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .status {
            padding: 3px 8px;
            border-radius: 12px;
            font-size: 10px;
            font-weight: bold;
            text-align: center;
        }
        .status-pending { background-color: #fff3cd; color: #856404; }
        .status-diproses { background-color: #d1ecf1; color: #0c5460; }
        .status-selesai { background-color: #d4edda; color: #155724; }
        .status-ditolak { background-color: #f8d7da; color: #721c24; }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 10px;
            color: #666;
            border-top: 1px solid #ddd;
            padding-top: 15px;
        }
        .summary {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .summary-item {
            text-align: center;
            flex: 1;
        }
        .summary-number {
            font-size: 18px;
            font-weight: bold;
            color: #333;
        }
        .summary-label {
            font-size: 10px;
            color: #666;
            text-transform: uppercase;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>LAPORAN KONSULTASI PUBLIK</h1>
        <p>Sistem Informasi Konsultasi Publik</p>
        <p>Tanggal Cetak: {{ date('d/m/Y H:i:s') }}</p>
    </div>

    @if($request->filled('start_date') || $request->filled('end_date') || $request->filled('month') || $request->filled('year'))
    <div class="filter-info">
        <h3>Filter yang Diterapkan:</h3>
        @if($request->filled('start_date'))
            <p><strong>Tanggal Mulai:</strong> {{ date('d/m/Y', strtotime($request->start_date)) }}</p>
        @endif
        @if($request->filled('end_date'))
            <p><strong>Tanggal Akhir:</strong> {{ date('d/m/Y', strtotime($request->end_date)) }}</p>
        @endif
        @if($request->filled('month'))
            <p><strong>Bulan:</strong> {{ DateTime::createFromFormat('!m', $request->month)->format('F') }}</p>
        @endif
        @if($request->filled('year'))
            <p><strong>Tahun:</strong> {{ $request->year }}</p>
        @endif
    </div>
    @endif

    <div class="summary">
        <div class="summary-item">
            <div class="summary-number">{{ $konsultasis->count() }}</div>
            <div class="summary-label">Total Konsultasi</div>
        </div>
        <div class="summary-item">
            <div class="summary-number">{{ $konsultasis->where('status', 'pending')->count() }}</div>
            <div class="summary-label">Pending</div>
        </div>
        <div class="summary-item">
            <div class="summary-number">{{ $konsultasis->where('status', 'diproses')->count() }}</div>
            <div class="summary-label">Diproses</div>
        </div>
        <div class="summary-item">
            <div class="summary-number">{{ $konsultasis->where('status', 'selesai')->count() }}</div>
            <div class="summary-label">Selesai</div>
        </div>
        <div class="summary-item">
            <div class="summary-number">{{ $konsultasis->where('status', 'ditolak')->count() }}</div>
            <div class="summary-label">Ditolak</div>
        </div>
    </div>

    @if($konsultasis->count() > 0)
    <table>
        <thead>
            <tr>
                <th style="width: 5%;">No</th>
                <th style="width: 15%;">Nama</th>
                <th style="width: 20%;">Email</th>
                <th style="width: 12%;">No WA</th>
                <th style="width: 25%;">Deskripsi</th>
                <th style="width: 10%;">Tanggal</th>
                <th style="width: 8%;">Waktu</th>
                <th style="width: 5%;">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($konsultasis as $index => $k)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $k->nama }}</td>
                <td>{{ $k->email }}</td>
                <td>{{ $k->no_wa }}</td>
                <td>{{ Str::limit($k->deskripsi, 100) }}</td>
                <td>{{ date('d/m/Y', strtotime($k->tanggal)) }}</td>
                <td>{{ $k->waktu }}</td>
                <td>
                    @php
                        $statusClass = 'status-' . $k->status;
                    @endphp
                    <span class="status {{ $statusClass }}">{{ ucfirst($k->status) }}</span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <div style="text-align: center; padding: 50px; color: #666;">
        <h3>Tidak ada data konsultasi yang sesuai dengan filter yang dipilih.</h3>
    </div>
    @endif

    <div class="footer">
        <p>Laporan ini dibuat secara otomatis oleh sistem pada {{ date('d/m/Y H:i:s') }}</p>
        <p>© {{ date('Y') }} Sistem Informasi Konsultasi Publik</p>
    </div>
</body>
</html>
