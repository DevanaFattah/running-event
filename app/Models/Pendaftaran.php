<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Peserta;
use App\Models\RunningEvent;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'peserta_id',
        'event_id',
        'kategori',
        'bib',
        'status',
        'status_bib'
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }

    public function runningEvent()
    {
        return $this->belongsTo(RunningEvent::class, 'event_id');
    }
}

