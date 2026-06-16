@extends('layouts/admin')

@push('title', 'Edit Mahasiswa')

@section('content')

    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Form Edit Mahasiswa</h6>
            <a href="/student" class="btn btn-secondary btn-sm">Kembali</a>
        </div>

        <!-- PENTING -->
        <form action="/student/edit/{{ $student->nim }}"
              method="POST"
              enctype="multipart/form-data">

            @csrf
            @method('PUT')

            <input type="hidden"
                   name="old_nim"
                   value="{{ $student->nim }}">

            <div class="card-body">

                <!-- NIM -->
                <div class="form-group mb-3">
                    <label>NIM</label>

                    <input type="text"
                           name="nim"
                           class="form-control @error('nim') is-invalid @enderror"
                           value="{{ old('nim', $student->nim) }}">

                    @error('nim')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- NAMA -->
                <div class="form-group mb-3">
                    <label>Nama</label>

                    <input type="text"
                           name="nama"
                           class="form-control @error('nama') is-invalid @enderror"
                           value="{{ old('nama', $student->nama) }}">

                    @error('nama')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- EMAIL -->
                <div class="form-group mb-3">
                    <label>Email</label>

                    <input type="email"
                           name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email', $student->email) }}">

                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- PRODI -->
                <div class="form-group mb-3">
                    <label>Prodi</label>

                    <select name="prodi"
                            class="form-control @error('prodi') is-invalid @enderror">

                        <option value="">- Pilih Prodi -</option>

                        <option value="Teknik Informatika"
                            {{ old('prodi', $student->prodi) == 'Teknik Informatika' ? 'selected' : '' }}>
                            Teknik Informatika
                        </option>

                        <option value="Teknik Rekayasa Keamanan Siber"
                            {{ old('prodi', $student->prodi) == 'Teknik Rekayasa Keamanan Siber' ? 'selected' : '' }}>
                            Teknik Rekayasa Keamanan Siber
                        </option>

                        <option value="Teknik Rekayasa Perangkat Lunak"
                            {{ old('prodi', $student->prodi) == 'Teknik Rekayasa Perangkat Lunak' ? 'selected' : '' }}>
                            Teknik Rekayasa Perangkat Lunak
                        </option>
                    </select>

                    @error('prodi')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <!-- FOTO LAMA -->
                <div class="form-group mb-3">

                    <label>Foto Lama</label>

                    <div class="mt-2">

                        @if($student->foto)

                            <img src="{{ asset('storage/foto/'.$student->foto) }}"
                                 style="width: 140px; border-radius: 10px; border: 1px solid #ddd; padding: 5px; background: white;">

                        @else

                            <p class="text-muted">
                                Belum ada foto
                            </p>

                        @endif

                    </div>
                </div>

                <!-- FOTO BARU -->
                <div class="form-group mb-3">

                    <label>Foto Baru</label>

                    <input type="file"
                           name="foto"
                           accept=".jpg,.jpeg,.png"
                           class="form-control @error('foto') is-invalid @enderror">

                    <small class="text-muted">
                        Kosongkan jika tidak ingin mengganti foto
                    </small>

                    @error('foto')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>

            <div class="card-footer bg-white">

                <button type="submit" class="btn btn-primary">
                    Update
                </button>

                <button type="reset" class="btn btn-warning">
                    Reset
                </button>

            </div>

        </form>

    </div>

@endsection