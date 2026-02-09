<?php

namespace Database\Seeders;

use App\Models\Aspirasi;
use App\Models\Kategori;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $dataUser = [
            [
                'nama' => 'Slamet Kuatno, S.Pd',
                'username' => 'slametkuatno',
                'email' => 'slametkuatno@gmail.com',
                'jabatan' => 'Waka Sarpras',
                'password' => bcrypt('admin'),
                'role' => 'admin'
            ],
            [
                'nama' => 'Annisa Nur Fitri',
                'username' => 'user-12345678',
                'email' => 'annisaica@gmail.com',
                'jabatan' => '',
                'password' => bcrypt('123456'),
                'role' => 'siswa'
            ],
            [
                'nama' => 'Cecep Spidermen',
                'username' => 'user-12345679',
                'email' => 'spidermen@gmail.com',
                'jabatan' => '',
                'password' => bcrypt('123456'),
                'role' => 'siswa'
            ],
        ];

        foreach ($dataUser as $user) {
            User::create($user);
        }

        $dataSiswa = [
            [
                'user_id' => 2,
                'nis' => '12345678',
                'kelas' => '12 RPL',
                'jurusan' => 'PPLG'
            ],
            [
                'user_id' => 3,
                'nis' => '12345679',
                'kelas' => '12 RPL',
                'jurusan' => 'PPLG'
            ],
        ];
        foreach ($dataSiswa as $siswa) {
            Siswa::create($siswa);
        }

        $dataKategori = [
            [
                'nama_kategori' => 'Ruang Kelas',
                'deskripsi' => 'Sarana dan prasarana ruang kelas siswa'
            ],
            [
                'nama_kategori' => 'Toilet',
                'deskripsi' => 'Sarana dan prasarana kamar mandi/toilet siswa'
            ],
            [
                'nama_kategori' => 'Sekolah',
                'deskripsi' => 'Sarana dan prasarana sekolah'
            ],
            [
                'nama_kategori' => 'Laboratorium Komputer',
                'deskripsi' => 'Sarana dan prasarana laboratorium komputer sekolah'
            ],
        ];

        foreach ($dataKategori as $kategori) {
            Kategori::create($kategori);
        }

        $dataAspirasi = [
            [
                'siswa_id' => 1,
                'kategori_id' => 1,
                'judul' => 'AC Kurang Dingin',
                'isi' => 'Mohon di cek, AC di ruang kelas 12 RPL kurang dingin',
                'status' => 'menunggu',
            ],
            [
                'siswa_id' => 1,
                'kategori_id' => 1,
                'judul' => 'Lampu Mati',
                'isi' => 'Mohon di cek, lampu di ruang kelas 12 RPL mati',
                'status' => 'diproses',
            ],
            [
                'siswa_id' => 1,
                'kategori_id' => 1,
                'judul' => 'Bangku Kurang',
                'isi' => 'Mohon di cek, jumlah bangku tidak sesuai dengan jumlah total siswa di ruang kelas 12 RPL',
                'status' => 'diproses',
            ],
            [
                'siswa_id' => 2,
                'kategori_id' => 2,
                'judul' => 'Toilet Mampet',
                'isi' => 'Mohon di cek, toilet perempuan di kamar 2, saluran pembuangannya mampet',
                'status' => 'menunggu',
            ],
        ];

        foreach ($dataAspirasi as $aspirasi) {
            Aspirasi::create($aspirasi);
        }
    }
}
