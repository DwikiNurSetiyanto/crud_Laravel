<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Mahasiswa</h6>
        <a href="/student/add" class="btn btn-primary btn-sm">+ Tambah Data</a>
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
                        <th>Foto</th>
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
                                @if($data->foto)
                                    <img src="{{ asset('storage/foto/'.$data->foto) }}"
                                        width="80"
                                        class="img-thumbnail">
                                @else
                                    Tidak ada foto
                                @endif
                            </td>
                            <td>
                                <a href="/student/edit/{{ $data->nim }}" class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <a href="/student/preview/{{ $data->nim }}"
                                class="btn btn-info btn-sm"
                                target="_blank">
                                    Preview
                                </a>

                                <a href="/student/download/{{ $data->nim }}"
                                class="btn btn-success btn-sm">
                                    Download
                                </a>

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
                            <td colspan="7">Belum ada data mahasiswa.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
