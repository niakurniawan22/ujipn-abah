<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Services\UserSiswaService;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function __construct(
        private UserSiswaService $service
    ) {}

    public function index()
    {
        $data = [
            'title' => 'Data Siswa',
            'siswa' => Siswa::all()
        ];

        return view('admin.data-siswa', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Data Siswa',
        ];

        return view('admin.form-siswa', $data);
    }

    public function edit(Siswa $siswa)
    {
        $data = [
            'title' => 'Data Siswa',
            'siswa' => $siswa,
        ];

        return view('admin.form-edit-siswa', $data);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'nis' => 'required|integer|unique:siswa,nis',
            'kelas' => 'required',
            'jurusan' => 'required',
        ], [
            'nama' => 'Nama siswa harus diisi!',
            'email.required' => 'Alamat email harus diisi!',
            'email.email' => 'Penulisan  email harus benar (menggunakan @)!',
            'email.unique' => 'Alamat email sudah digunakan di dalam database!',
            'nis.required' => 'NIS harus diisi!',
            'nis.integer' => 'NIS harus berupa angka (tidak boleh huruf)!',
            'nis.unique' => 'NIS sudah digunakan di dalam database!',
            'kelas' => 'Kelas harus dipilih!',
            'jurusan' => 'Jurusan harus dipilih!',
        ]);

        try {
            $this->service->create($validatedData);
            return redirect()->route('admin.siswa')->with('success', 'Data siswa berhasil ditambahkan ke dalam database.');
        } catch (\Throwable $th) {
            return redirect()->route('admin.siswa')->with('error', 'Gagal menambahkan data siswa!');
        }
    }

    public function update(Request $request)
    {
        $id = $request->id; // mendapatkan id siswa
        $siswa = Siswa::find($id); // mendapatkan siswa dimaksud yang akan diupdate
        $user_id = $siswa->user_id; // mendapatkan user_id dari siswa dimaksud

        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' . $user_id,
            'username' => 'required|max:20|unique:users,username,' . $user_id,
            'nis' => 'required|integer|unique:siswa,nis,' . $id,
            'kelas' => 'required',
            'jurusan' => 'required',
        ], [
            'nama' => 'Nama siswa harus diisi!',
            'email.required' => 'Alamat email harus diisi!',
            'email.email' => 'Penulisan  email harus benar (menggunakan @)!',
            'email.unique' => 'Alamat email sudah digunakan di dalam database!',
            'username.required' => 'Username harus diisi!',
            'username.max' => 'Username maksimal 20 karakter!',
            'username.unique' => 'Username sudah digunakan di dalam database!',
            'nis.required' => 'NIS harus diisi!',
            'nis.integer' => 'NIS harus berupa angka (tidak boleh huruf)!',
            'nis.unique' => 'NIS sudah digunakan di dalam database!',
            'kelas' => 'Kelas harus dipilih!',
            'jurusan' => 'Jurusan harus dipilih!',
        ]);

        $validatedData['id'] = $id;

        try {
            $this->service->edit($validatedData);
            return redirect()->route('admin.siswa')->with('success', 'Data siswa berhasil di-update di dalam database.');
        } catch (\Throwable $th) {
            dd($th);
            return redirect()->route('admin.siswa')->with('error', 'Gagal meng-update data siswa!');
        }
    }

    public function delete(Siswa $siswa)
    {
        try {
            $this->service->delete($siswa);
            return redirect()->route('admin.siswa')->with('success', 'Data siswa berhasil dihapus dari database.');
        } catch (\Throwable $th) {
            return redirect()->route('admin.siswa')->with('error', 'Gagal menghapus data siswa!');
        }
    }
}
