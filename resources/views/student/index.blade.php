<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Student</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <style>
        body {
            background: #f4f7fb;
        }
        .navbar-custom {
            background: linear-gradient(90deg, #0d6efd, #0b5ed7);
        }
        .card-custom {
            border: none;
            border-radius: 16px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }
        .footer {
            margin-top: 40px;
            padding: 15px 0;
            text-align: center;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark navbar-custom">
    <div class="container">
        <span class="navbar-brand font-weight-bold">CRUD Laravel - Data Mahasiswa</span>
    </div>
</nav>

<div class="container mt-5">
    <div class="card card-custom">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Daftar Mahasiswa</h4>
            <a href="/student/add" class="btn btn-primary">+ Tambah Data</a>
        </div>

        <div class="card-body">
            @if(session('notifikasi'))
                <div class="alert alert-{{ session('type') }}">
                    {{ session('notifikasi') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Prodi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($students as $index => $data)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $data->nim }}</td>
                                <td>{{ $data->nama }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->prodi }}</td>
                                <td>
                                    <a href="/student/edit/{{ $data->nim }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="/student/delete/{{ $data->nim }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">Belum ada data mahasiswa.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="footer">
        © 2026 CRUD Laravel Project | Dibuat oleh Dwiki Nur Setiyanto (4342511027)
    </div>
</div>

</body>
</html>