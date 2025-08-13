<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Konsultasi Publik</title>
    <style>
        body { font-family: 'sans-serif'; font-size: 12px; }
        h1 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Laporan Konsultasi Publik</h1>
    <table>
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>No. WhatsApp</th>
                <th>Tanggal</th>
                <th>Deskripsi</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($konsultasis as $konsultasi)
            <tr>
                <td>{{ $konsultasi->nama }}</td>
                <td>{{ $konsultasi->email }}</td>
                <td>{{ $konsultasi->no_wa }}</td>
                <td>{{ \Carbon\Carbon::parse($konsultasi->tanggal_permohonan)->translatedFormat('d F Y') }}</td>
                <td>{{ $konsultasi->deskripsi }}</td>
                <td>{{ ucfirst($konsultasi->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>