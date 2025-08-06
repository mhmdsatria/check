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
