<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
        'total_peserta' => 20,
        'total_pendaftaran' => 20,
        'peserta_5k' => 8,
        'peserta_10k' => 12,
        'bib_belum_diambil' => 14 // 14 orang is_taken = false
    ];

    // State 20 Data Pendaftaran
    $registrations = [
        ['id' => 1, 'nama' => 'Lutpi Gay', 'no_hp' => '08111222333', 'event' => 'Jakarta Run 10K', 'bib' => 'BIB-7166', 'status_bib' => 'Belum Diambil', 'is_taken' => false],
        ['id' => 2, 'nama' => 'Ahmad Subardjo', 'no_hp' => '08571234567', 'event' => 'Borobudur Marathon 5K', 'bib' => 'BIB-2022', 'status_bib' => 'Sudah Diambil', 'is_taken' => true],
        ['id' => 3, 'nama' => 'Siti Nurhaliza Putri', 'no_hp' => '08129998887', 'event' => 'Jakarta Run 10K', 'bib' => 'BIB-5541', 'status_bib' => 'Belum Diambil', 'is_taken' => false],
        ['id' => 4, 'nama' => 'Budi Setiadi Jaya', 'no_hp' => '08215554443', 'event' => 'Night Run 5K', 'bib' => 'BIB-0098', 'status_bib' => 'Sudah Diambil', 'is_taken' => true],
        ['id' => 5, 'nama' => 'Rizky Ramadhan', 'no_hp' => '08998877665', 'event' => 'Jakarta Run 10K', 'bib' => 'BIB-8812', 'status_bib' => 'Belum Diambil', 'is_taken' => false],
        ['id' => 6, 'nama' => 'Dinda Permata Sari', 'no_hp' => '087711223344', 'event' => 'Bali Marathon 10K', 'bib' => 'BIB-1122', 'status_bib' => 'Sudah Diambil', 'is_taken' => true],
        ['id' => 7, 'nama' => 'Eko Prasetyo', 'no_hp' => '081344556677', 'event' => 'Jakarta Run 10K', 'bib' => 'BIB-9901', 'status_bib' => 'Belum Diambil', 'is_taken' => false],
        ['id' => 8, 'nama' => 'Farah Quinn', 'no_hp' => '085200998877', 'event' => 'Night Run 5K', 'bib' => 'BIB-3344', 'status_bib' => 'Belum Diambil', 'is_taken' => false],
        ['id' => 9, 'nama' => 'Gilang Dirga', 'no_hp' => '081122334455', 'event' => 'Jakarta Run 10K', 'bib' => 'BIB-7766', 'status_bib' => 'Sudah Diambil', 'is_taken' => true],
        ['id' => 10, 'nama' => 'Hendra Setiawan', 'no_hp' => '082133445566', 'event' => 'Borobudur Marathon 5K', 'bib' => 'BIB-8899', 'status_bib' => 'Belum Diambil', 'is_taken' => false],
        ['id' => 11, 'nama' => 'Indah Kusuma', 'no_hp' => '081266778899', 'event' => 'Jakarta Run 10K', 'bib' => 'BIB-4433', 'status_bib' => 'Belum Diambil', 'is_taken' => false],
        ['id' => 12, 'nama' => 'Joko Widodo Jjr', 'no_hp' => '081155443322', 'event' => 'Night Run 5K', 'bib' => 'BIB-1100', 'status_bib' => 'Sudah Diambil', 'is_taken' => true],
        ['id' => 13, 'nama' => 'Kevin Sanjaya', 'no_hp' => '085733221100', 'event' => 'Jakarta Run 10K', 'bib' => 'BIB-2211', 'status_bib' => 'Bel_um Diambil', 'is_taken' => false],
        ['id' => 14, 'nama' => 'Lestari Dewi', 'no_hp' => '081399887766', 'event' => 'Borobudur Marathon 5K', 'bib' => 'BIB-6655', 'status_bib' => 'Belum Diambil', 'is_taken' => false],
        ['id' => 15, 'nama' => 'Muhammad Ali', 'no_hp' => '081177665544', 'event' => 'Jakarta Run 10K', 'bib' => 'BIB-0011', 'status_bib' => 'Sudah Diambil', 'is_taken' => true],
        ['id' => 16, 'nama' => 'Nadia Vega', 'no_hp' => '085244332211', 'event' => 'Night Run 5K', 'bib' => 'BIB-9988', 'status_bib' => 'Belum Diambil', 'is_taken' => false],
        ['id' => 17, 'nama' => 'Oki Setiana', 'no_hp' => '081211223344', 'event' => 'Jakarta Run 10K', 'bib' => 'BIB-3322', 'status_bib' => 'Belum Diambil', 'is_taken' => false],
        ['id' => 18, 'nama' => 'Panji Petualang', 'no_hp' => '081388776655', 'event' => 'Borobudur Marathon 5K', 'bib' => 'BIB-4455', 'status_bib' => 'Belum Diambil', 'is_taken' => false],
        ['id' => 19, 'nama' => 'Queen Alexandra', 'no_hp' => '085711009988', 'event' => 'Jakarta Run 10K', 'bib' => 'BIB-5566', 'status_bib' => 'Belum Diambil', 'is_taken' => false],
        ['id' => 20, 'nama' => 'Rano Karno', 'no_hp' => '081100112233', 'event' => 'Night Run 5K', 'bib' => 'BIB-1133', 'status_bib' => 'Belum Diambil', 'is_taken' => false],
    ];

        return view('dashboard', compact('stats', 'registrations'));
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
