<?php

namespace App\Services;

use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UserSiswaService
{
   public function create(array $data)
   {
      return DB::transaction(function () use ($data) {
         $user = User::create([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'username' => 'user-' . $data['nis'],
            'password' => bcrypt('123456'),
            'role' => 'siswa',
            'jabatan' => ''
         ]);
         $siswa = Siswa::create([
            'user_id' => $user->id,
            'nis' => $data['nis'],
            'kelas' => $data['kelas'],
            'jurusan' => $data['jurusan'],
         ]);

         return $user->load('siswa');
      });
   }

   public function edit(array $data)
   {
      return DB::transaction(function () use ($data) {
         $siswa = Siswa::find($data['id']);
         $user = $siswa->user;

         $user = $user->update([
            'nama' => $data['nama'],
            'email' => $data['email'],
            'username' => $data['username'],
         ]);
         $siswa = $siswa->update([
            'nis' => $data['nis'],
            'kelas' => $data['kelas'],
            'jurusan' => $data['jurusan'],
         ]);
      });
   }

   public function delete(Siswa $siswa)
   {
      return DB::transaction(function () use ($siswa) {

         // hapus data siswa berdasarkan id
         Siswa::find($siswa->id)->delete();

         // hapus data user berdasarkan user_id
         User::find($siswa->user_id)->delete();
      });
   }
}
