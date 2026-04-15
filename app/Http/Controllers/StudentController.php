<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

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
            'prodi' => 'required'
        ], [
            'nim.required' => 'NIM harus diisi.',
            'nim.unique' => 'NIM sudah digunakan.',
            'nama.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'prodi.required' => 'Prodi harus diisi.'
        ]);

        Student::create([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'email' => $request->email,
            'prodi' => $request->prodi
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
            'prodi' => 'required'
        ], [
            'nim.required' => 'NIM harus diisi.',
            'nim.unique' => 'NIM sudah digunakan.',
            'nama.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'prodi.required' => 'Prodi harus diisi.'
        ]);

        $student = Student::where('nim', $id)->first();

        if (!$student) {
            return redirect('/student')->with([
                'notifikasi' => 'Data siswa tidak ditemukan.',
                'type' => 'danger'
            ]);
        }

        $student->update([
            'nim' => $request->nim,
            'nama' => $request->nama,
            'email' => $request->email,
            'prodi' => $request->prodi
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

        $student->delete();

        return redirect('/student')->with([
            'notifikasi' => 'Data berhasil dihapus.',
            'type' => 'success'
        ]);
    }
}