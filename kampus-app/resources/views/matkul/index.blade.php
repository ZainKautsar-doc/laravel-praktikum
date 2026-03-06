<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Matkul</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-soft: #f5f7fb;
            --text: #1f2937;
            --muted: #6b7280;
            --white: #ffffff;
            --border: #e5e7eb;
            --shadow: 0 10px 25px rgba(0,0,0,0.08);
            --blue: #2563eb;
            --blue-hover: #1d4ed8;
            --red: #dc2626;
            --red-hover: #b91c1c;
            --green: #16a34a;
            --green-hover: #15803d;
        }
        * { box-sizing: border-box }
        html, body { height: 100% }
        body {
            margin: 0;
            font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, Helvetica, Arial, "Apple Color Emoji", "Segoe UI Emoji";
            color: var(--text);
            background: linear-gradient(180deg, #f8fafc 0%, #eef2f7 100%);
        }
        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 20px;
        }
        .header {
            margin-bottom: 20px;
        }
        .title {
            font-size: 28px;
            font-weight: 700;
            letter-spacing: -0.02em;
            margin: 0;
        }
        .subtitle {
            margin-top: 6px;
            color: var(--muted);
            font-size: 14px;
        }
        .card {
            background: var(--white);
            border-radius: 12px;
            box-shadow: var(--shadow);
            border: 1px solid var(--border);
            padding: 20px;
        }
        .card + .card { margin-top: 18px }
        .table-responsive {
            width: 100%;
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
        }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }
        thead th {
            text-align: left;
            background: var(--bg-soft);
            font-weight: 600;
            color: var(--muted);
            padding: 14px 16px;
            border-top: 1px solid var(--border);
            border-bottom: 1px solid var(--border);
        }
        tbody td {
            padding: 12px 16px;
            border-bottom: 1px solid var(--border);
        }
        tbody tr:hover {
            background: #f9fafb;
        }
        .actions {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 14px;
            border-radius: 8px;
            border: 1px solid transparent;
            font-weight: 600;
            font-size: 14px;
            text-decoration: none;
            cursor: pointer;
            transition: background-color .15s ease, border-color .15s ease, color .15s ease, transform .08s ease;
            user-select: none;
        }
        .btn:active { transform: translateY(1px) }
        .btn-edit { background: var(--blue); color: #fff }
        .btn-edit:hover { background: var(--blue-hover) }
        .btn-delete { background: var(--red); color: #fff }
        .btn-delete:hover { background: var(--red-hover) }
        .btn-add { background: var(--green); color: #fff }
        .btn-add:hover { background: var(--green-hover) }
        .form {
            display: flex;
            gap: 12px;
            align-items: flex-end;
            flex-wrap: wrap;
        }
        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
            flex: 1 1 200px;
            min-width: 200px;
        }
        label {
            font-size: 13px;
            color: var(--muted);
            font-weight: 600;
        }
        input[type="text"] {
            padding: 10px 12px;
            border-radius: 6px;
            border: 1px solid #ddd;
            outline: none;
            font-size: 14px;
            transition: border-color .15s ease, box-shadow .15s ease;
        }
        input[type="text"]:focus {
            border-color: var(--blue);
            box-shadow: 0 0 0 4px rgba(37, 99, 235, 0.15);
        }
        .form-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        @media (max-width: 640px) {
            .form {
                flex-direction: column;
                align-items: stretch;
            }
            .form-actions {
                width: 100%;
            }
            .btn {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 class="title">Daftar Matkul</h1>
            <p class="subtitle">Kelola data mata kuliah dengan tampilan modern dan responsif</p>
        </div>

        <div class="card">
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Matkul</th>
                            <th>Jurusan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($matkul as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->kode }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->jurusan }}</td>
                            <td>
                                <div class="actions">
                                    <a class="btn btn-edit" href="{{ route('matkul.edit', $item->id) }}">Edit</a>
                                    <form action="{{ route('matkul.destroy', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-delete" type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5">Belum ada data matkul.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <form class="form" action="{{ route('matkul.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="kode">Kode</label>
                    <input type="text" name="kode" id="kode" placeholder="Contoh: IF101">
                </div>
                <div class="form-group">
                    <label for="nama">Nama Matkul</label>
                    <input type="text" name="nama" id="nama" placeholder="Contoh: Algoritma dan Pemrograman">
                </div>
                <div class="form-group">
                    <label for="jurusan">Jurusan</label>
                    <input type="text" name="jurusan" id="jurusan" placeholder="Contoh: Informatika">
                </div>
                <div class="form-actions">
                    <button class="btn btn-add" type="submit">Tambah</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
