<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    protected $fillable = ['nama', 'nomor_telepon', 'email', 'jenis_kelamin', 'umur'];

    public function pendaftaran()
    {
        return $this->hasOne(\App\Models\Pendaftaran::class);
    }
}
