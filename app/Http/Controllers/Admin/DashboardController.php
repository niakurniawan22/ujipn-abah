<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aspirasi;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard Admin',
            'aspirasi' => Aspirasi::orderBy('created_at', 'DESC')->get(),
            'total_aspirasi' => Aspirasi::all()->count(),
            'aspirasi_menunggu' => Aspirasi::where('status', 'menunggu')->get()->count(),
            'aspirasi_diproses' => Aspirasi::where('status', 'diproses')->get()->count(),
            'aspirasi_selesai' => Aspirasi::where('status', 'selesai')->get()->count(),
        ];

        return view('admin.dashboard', $data);
    }
}
