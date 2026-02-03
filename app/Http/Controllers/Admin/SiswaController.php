<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
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
}
