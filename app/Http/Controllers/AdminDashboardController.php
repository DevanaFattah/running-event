<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\Pendaftaran;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            "stats" => [
                'totalPeserta' => Peserta::count(),
                'totalPendaftaran' => Pendaftaran::count(),
                'total5KM' => Pendaftaran::whereHas('runningEvent', function ($q) { $q->where('kategori', '5K'); })->count(),
                'total10KM' => Pendaftaran::whereHas('runningEvent', function ($q) { $q->where('kategori', '10K'); })->count(),
                'bibBelum' => Pendaftaran::where('status', 'belum_diambil')->count(),
            ],
        ]);
    }
}
