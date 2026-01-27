<?php

namespace App\Http\Controllers\Siswa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Aspirasi;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $siswa_id = auth()->user()->siswa->id;
        $data = [
            'aspirasi' => Aspirasi::where('siswa_id', $siswa_id)->get(),
            'total_aspirasi' => Aspirasi::where('siswa_id', $siswa_id)->get()->count(),
            'aspirasi_menunggu' => Aspirasi::where([
                'siswa_id' => $siswa_id,
                'status' => 'menunggu'
            ])->get()->count(),
            'aspirasi_diproses' => Aspirasi::where([
                'siswa_id' => $siswa_id,
                'status' => 'diproses'
            ])->get()->count(),
            'aspirasi_selesai' => Aspirasi::where([
                'siswa_id' => $siswa_id,
                'status' => 'selesai'
            ])->get()->count(),
        ];

        return view('siswa.dashboard', $data);
    }
}
