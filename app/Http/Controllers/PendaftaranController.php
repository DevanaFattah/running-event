<?php

namespace App\Http\Controllers;

use App\Services\PendaftaranService;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Support\Number;
use Illuminate\Support\Str;


class PendaftaranController extends Controller
{
    protected $service;

    public function __construct(PendaftaranService $service)
    {
    $this->service = $service;
    }

public function store(Request $request)
{
    $lastBib = Pendaftaran::where('event_id', $request->event_id)->where('kategori', $request->kategori)->pluck('bib')->last();

    $currentBib = Number::parseInt(Str::remove('BIB-', $lastBib)) + 1;

    $request->validate([
        'nama' => 'required',
        'email' => 'required|email',
        'nomor_telepon' => 'required',
        'kategori' => 'required|in:5KM,10KM',
        'event_id' => 'required|integer|exists:events,id',
    ]);
       // lanjut proses simpan data


    $this->service->daftar($request->all() + [
        'bib' => $currentBib,
    ]);

    return back()->with('success', 'pendaftaran berhasil');

    }

}

