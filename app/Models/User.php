<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    protected $guarded = ['id'];

    public function siswa(): HasOne
    {
        return $this->hasOne(Siswa::class);
    }

    public function tanggapan(): HasMany
    {
        return $this->hasMany(Tanggapan::class);
    }
}
