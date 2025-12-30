<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    protected $fillable = [
        'nama_event','tanggal','lokasi','deskripsi'
    ];
}
