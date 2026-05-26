<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('student.index', compact('students'));
    }

    public function create()
    {
        return view('student.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|unique:students,nim',
            'nama' => 'required',
            'email' => 'required|email',
            'prodi' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png|max:2048'
        ], [
            'nim.required' => 'NIM harus diisi.',
            'nim.unique' => 'NIM sudah digunakan.',
            'nama.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'prodi.required' => 'Prodi harus diisi.',
            'foto.required' => 'Foto harus diupload.',
            'foto.mimes' => 'Format foto harus JPG, JPEG, atau PNG.',
            'foto.max' => 'Ukuran foto maksimal 2MB.'
        ]);

        $foto = $request->file('foto');
        $namaFoto = time() . '_' . $foto->getClientOriginalName();

        // Simpan ke storage/app/public/foto
        $foto->storeAs('foto', $namaFoto, 'public');

        Student::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'email' => $request->email,
            'prodi' => $request->prodi,
            'foto' => $namaFoto
        ]);

        return redirect('/student')->with([
            'notifikasi' => 'Data berhasil disimpan.',
            'type' => 'success'
        ]);
    }

    public function edit($id)
    {
        $student = Student::where('nim', $id)->first();

        if (!$student) {
            return redirect('/student')->with([
                'notifikasi' => 'Data siswa tidak ditemukan.',
                'type' => 'danger'
            ]);
        }

        return view('student.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|unique:students,nim,' . $request->old_nim . ',nim',
            'nama' => 'required',
            'email' => 'required|email',
            'prodi' => 'required',
            'foto' => 'nullable|mimes:jpg,jpeg,png|max:2048'
        ], [
            'nim.required' => 'NIM harus diisi.',
            'nim.unique' => 'NIM sudah digunakan.',
            'nama.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'prodi.required' => 'Prodi harus diisi.',
            'foto.mimes' => 'Format foto harus JPG, JPEG, atau PNG.',
            'foto.max' => 'Ukuran foto maksimal 2MB.'
        ]);

        $student = Student::where('nim', $id)->first();

        if (!$student) {
            return redirect('/student')->with([
                'notifikasi' => 'Data siswa tidak ditemukan.',
                'type' => 'danger'
            ]);
        }

        $namaFoto = $student->foto;

        if ($request->hasFile('foto')) {

            // Hapus foto lama
            if ($student->foto && Storage::disk('public')->exists('foto/' . $student->foto)) {
                Storage::disk('public')->delete('foto/' . $student->foto);
            }

            $foto = $request->file('foto');
            $namaFoto = time() . '_' . $foto->getClientOriginalName();

            // Upload foto baru
            $foto->storeAs('foto', $namaFoto, 'public');
        }

        $student->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'email' => $request->email,
            'prodi' => $request->prodi,
            'foto' => $namaFoto
        ]);

        return redirect('/student')->with([
            'notifikasi' => 'Data berhasil diupdate.',
            'type' => 'success'
        ]);
    }

    public function destroy($id)
    {
        $student = Student::where('nim', $id)->first();

        if (!$student) {
            return redirect('/student')->with([
                'notifikasi' => 'Data siswa tidak ditemukan.',
                'type' => 'danger'
            ]);
        }

        // Hapus foto
        if ($student->foto && Storage::disk('public')->exists('foto/' . $student->foto)) {
            Storage::disk('public')->delete('foto/' . $student->foto);
        }

        $student->delete();

        return redirect('/student')->with([
            'notifikasi' => 'Data berhasil dihapus.',
            'type' => 'success'
        ]);
    }

    public function preview($id)
    {
        $student = Student::where('nim', $id)->first();

        if (!$student || !$student->foto) {
            return redirect('/student');
        }

        $path = storage_path('app/public/foto/' . $student->foto);

        if (!file_exists($path)) {
            return redirect('/student')->with([
                'notifikasi' => 'File foto tidak ditemukan.',
                'type' => 'danger'
            ]);
        }

        return response()->file($path);
    }

    public function download($id)
    {
        $student = Student::where('nim', $id)->first();

        if (!$student || !$student->foto) {
            return redirect('/student');
        }

        $path = storage_path('app/public/foto/' . $student->foto);

        if (!file_exists($path)) {
            return redirect('/student')->with([
                'notifikasi' => 'File foto tidak ditemukan.',
                'type' => 'danger'
            ]);
        }

        return response()->download($path);
    }
}