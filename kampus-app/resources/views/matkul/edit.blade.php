<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Edit Matkul</title>
</head>

<body>
    <h1>Edit Matkul</h1>

    <form action="{{ route('matkul.update', $matkul->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="kode">Kode</label>
        <input type="text" name="kode" id="kode" value="{{ old('kode', $matkul->kode) }}">

        <label for="nama">Nama Matkul</label>
        <input type="text" name="nama" id="nama" value="{{ old('nama', $matkul->nama) }}">

        <label for="jurusan">Jurusan</label>
        <input type="text" name="jurusan" id="jurusan" value="{{ old('jurusan', $matkul->jurusan) }}">

        <button type="submit">Simpan Perubahan</button>
    </form>

    <p><a href="{{ route('matkul.index') }}">Kembali ke daftar matkul</a></p>
</body>

</html>

