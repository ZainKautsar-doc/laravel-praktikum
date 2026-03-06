<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Matkul</title>
</head>

<body>
    <h1>Daftar Matkul</h1>
    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Jurusan</th>
            </tr>
        </thead>
        <tbody>
            @forelse($matkul as $mhs)

            <tr>
                <td>{{ $mhs->npm }}</td>
                <td>{{ $mhs->nama }}</td>
                <td>{{ $mhs->jurusan }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="3">Belum ada data mahasiswa.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
    <form action="{{ route('matkul.store') }}" method="POST">
        @csrf
        <label for="kode">Kode</label>
        <input type="text" name="kode" id="kode">
        <label for="nama">Nama Matkul</label>
        <input type="text" name="nama" id="nama">
        <label for="jurusan">Jurusan</label>
        <input type="text" name="jurusan" id="jurusan">
        <button type="submit">Tambah</button>
    </form>
</body>

</html>