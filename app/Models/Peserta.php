<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'nomor_telepon', 'email', 'jenis_kelamin', 'umur'];

    public function pendaftaran()
    {
        return $this->hasOne(\App\Models\Pendaftaran::class);
    }

    public function runningEvents()
    {
        return $this->hasMany(\App\Models\RunningEvent::class);
    }
}
