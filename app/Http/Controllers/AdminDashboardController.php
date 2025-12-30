<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\Pendaftaran;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'totalPeserta' => Peserta::count(),
            'totalPendaftaran' => Pendaftaran::count(),
            'total5K' => Pendaftaran::whereHas('event', function ($q) { $q->where('kategori', '5K'); })->count(),
            'total10K' => Pendaftaran::whereHas('event', function ($q) { $q->where('kategori', '10K'); })->count(),
            'bibBelum' => Pendaftaran::where('status_bib', 'belum_diambil')->count(),
        ]);
    }
}

