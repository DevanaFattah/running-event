<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class BibController extends Controller
{
    public function cetak($id)
    {
        $pendaftaran = Pendaftaran::with('peserta')->findOrFail($id);
        $pdf = Pdf::loadView('admin.bib.cetak', compact('pendaftaran'));
        return $pdf->download('BIB-' . $pendaftaran->bib . '.pdf');
    }
}
