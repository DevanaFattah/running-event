<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;

class AdminPendaftaranController extends Controller
{
    public function ambilBib($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        // 🔒 validasi biar ga dobel
        if ($pendaftaran->status_bib === 'sudah_diambil') {
            return back()->with('error', 'BIB sudah diambil sebelumnya');
        }

        $pendaftaran->update([
            'status_bib' => 'sudah_diambil'
        ]);

        return back()->with('success', 'BIB berhasil ditandai sudah diambil');
    }
}
