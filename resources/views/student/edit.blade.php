<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <style>
        body {
            background: #f4f7fb;
        }
        .navbar-custom {
            background: linear-gradient(90deg, #ffc107, #e0a800);
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
        <span class="navbar-brand font-weight-bold">Edit Data Mahasiswa</span>
    </div>
</nav>

<div class="container mt-5">
    <div class="card card-custom">
        <div class="card-header bg-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Form Edit Mahasiswa</h4>
            <a href="/student" class="btn btn-secondary">Kembali</a>
        </div>

        <form action="/student/edit/{{ $student->nim }}" method="POST">
            @csrf
            @method('PUT')
            <input type="hidden" name="old_nim" value="{{ $student->nim }}">

            <div class="card-body">
                <div class="form-group">
                    <label>NIM</label>
                    <input type="text" name="nim" class="form-control @error('nim') is-invalid @enderror" value="{{ old('nim', $student->nim) }}">
                    @error('nim')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $student->nama) }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $student->email) }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Prodi</label>
                    <select name="prodi" class="form-control @error('prodi') is-invalid @enderror">
                        <option value="">- Pilih Prodi -</option>
                        <option value="Teknik Informatika" {{ old('prodi', $student->prodi) == 'Teknik Informatika' ? 'selected' : '' }}>Teknik Informatika</option>
                        <option value="Teknik Rekayasa Keamanan Siber" {{ old('prodi', $student->prodi) == 'Teknik Rekayasa Keamanan Siber' ? 'selected' : '' }}>Teknik Rekayasa Keamanan Siber</option>
                        <option value="Teknik Rekayasa Perangkat Lunak" {{ old('prodi', $student->prodi) == 'Teknik Rekayasa Perangkat Lunak' ? 'selected' : '' }}>Teknik Rekayasa Perangkat Lunak</option>
                    </select>
                    @error('prodi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="card-footer bg-white">
                <button type="submit" class="btn btn-primary">Update</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </div>
        </form>
    </div>

    <div class="footer">
        © 2026 CRUD Laravel Project | Dibuat oleh Dwiki Nur Setiyanto
    </div>
</div>

</body>
</html>