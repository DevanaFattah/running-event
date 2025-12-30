<?php

namespace App\Http\Controllers;

use App\Services\PendaftaranService;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Unique;

class PendaftaranController extends Controller
{
    protected $service;

    public function __construct(PendaftaranService $service)
    {
    $this->service = $service;
    }

public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'email' => 'required|email',
        'nomor_telepon' => 'required',
        'kategori' => 'required|in:5K,10K',
        'event_id' => 'required|integer|exists:events,id',
    ]);
       // lanjut proses simpan data


    $this->service->daftar($request->all());

    return back()->with('success', 'pendaftaran berhasil');

    }

}

