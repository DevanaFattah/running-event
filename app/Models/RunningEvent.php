<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RunningEvent extends Model
{
    /** @use HasFactory<\Database\Factories\RunningEventFactory> */
    use HasFactory;

    protected $fillable = [
        'nama_event','tanggal','lokasi','deskripsi', 'kategori', 'kuota'
    ];

    public function pendaftarans()
    {
        return $this->hasMany(Pendaftaran::class, 'event_id');
    }
}
