<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function pendaftaran()
    {
        $pendaftarans = Pendaftaran::with('peserta', 'event')->get();
        return view('admin.pendaftaran', compact('pendaftarans'));
    }

    public function ambilBib($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        
        // Toggle status
        $newStatus = $pendaftaran->status_bib === 'belum_diambil' ? 'sudah_diambil' : 'belum_diambil';
        $pendaftaran->update([
            'status_bib' => $newStatus
        ]);

        $message = $newStatus === 'sudah_diambil' ? 'BIB ditandai sudah diambil' : 'BIB ditandai belum diambil';
        return back()->with('success', $message);
    }
    
}
    
