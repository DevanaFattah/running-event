<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftaran;
use App\Models\RunningEvent;

class AdminController extends Controller
{
    public function index()
    {
        $registrations = \App\Models\Pendaftaran::with('peserta', 'runningEvent')->get();
        $peserta = \App\Models\Peserta::get();

        // dd($registrations);

        $stats = [
            'total_peserta' => $peserta->count(),
            'total_pendaftaran' => $registrations->count(),
            'peserta_5k' => $registrations->where('kategori', '5KM')->count(),
            'peserta_10k' => $registrations->where('kategori', '10KM')->count(),
            'bib_belum_diambil' => $registrations->where('status', 'belum_diambil')->count(),
        ];

        $registrationRows = $registrations;

        // State 20 Data Pendaftaran
        // $registrations = [
        //     ['id' => 1, 'nama' => 'Lutpi Gay', 'no_hp' => '08111222333', 'event' => 'Jakarta Run 10K', 'bib' => 'BIB-7166', 'status_bib' => 'Belum Diambil', 'is_taken' => false],
        //     ['id' => 2, 'nama' => 'Ahmad Subardjo', 'no_hp' => '08571234567', 'event' => 'Borobudur Marathon 5K', 'bib' => 'BIB-2022', 'status_bib' => 'Sudah Diambil', 'is_taken' => true],
        //     ['id' => 3, 'nama' => 'Siti Nurhaliza Putri', 'no_hp' => '08129998887', 'event' => 'Jakarta Run 10K', 'bib' => 'BIB-5541', 'status_bib' => 'Belum Diambil', 'is_taken' => false],
        //     ['id' => 4, 'nama' => 'Budi Setiadi Jaya', 'no_hp' => '08215554443', 'event' => 'Night Run 5K', 'bib' => 'BIB-0098', 'status_bib' => 'Sudah Diambil', 'is_taken' => true],
        //     ['id' => 5, 'nama' => 'Rizky Ramadhan', 'no_hp' => '08998877665', 'event' => 'Jakarta Run 10K', 'bib' => 'BIB-8812', 'status_bib' => 'Belum Diambil', 'is_taken' => false],
        //     ['id' => 6, 'nama' => 'Dinda Permata Sari', 'no_hp' => '087711223344', 'event' => 'Bali Marathon 10K', 'bib' => 'BIB-1122', 'status_bib' => 'Sudah Diambil', 'is_taken' => true],
        //     ['id' => 7, 'nama' => 'Eko Prasetyo', 'no_hp' => '081344556677', 'event' => 'Jakarta Run 10K', 'bib' => 'BIB-9901', 'status_bib' => 'Belum Diambil', 'is_taken' => false],
        //     ['id' => 8, 'nama' => 'Farah Quinn', 'no_hp' => '085200998877', 'event' => 'Night Run 5K', 'bib' => 'BIB-3344', 'status_bib' => 'Belum Diambil', 'is_taken' => false],
        //     ['id' => 9, 'nama' => 'Gilang Dirga', 'no_hp' => '081122334455', 'event' => 'Jakarta Run 10K', 'bib' => 'BIB-7766', 'status_bib' => 'Sudah Diambil', 'is_taken' => true],
        //     ['id' => 10, 'nama' => 'Hendra Setiawan', 'no_hp' => '082133445566', 'event' => 'Borobudur Marathon 5K', 'bib' => 'BIB-8899', 'status_bib' => 'Belum Diambil', 'is_taken' => false],
        //     ['id' => 11, 'nama' => 'Indah Kusuma', 'no_hp' => '081266778899', 'event' => 'Jakarta Run 10K', 'bib' => 'BIB-4433', 'status_bib' => 'Belum Diambil', 'is_taken' => false],
        //     ['id' => 12, 'nama' => 'Joko Widodo Jjr', 'no_hp' => '081155443322', 'event' => 'Night Run 5K', 'bib' => 'BIB-1100', 'status_bib' => 'Sudah Diambil', 'is_taken' => true],
        //     ['id' => 13, 'nama' => 'Kevin Sanjaya', 'no_hp' => '085733221100', 'event' => 'Jakarta Run 10K', 'bib' => 'BIB-2211', 'status_bib' => 'Bel_um Diambil', 'is_taken' => false],
        //     ['id' => 14, 'nama' => 'Lestari Dewi', 'no_hp' => '081399887766', 'event' => 'Borobudur Marathon 5K', 'bib' => 'BIB-6655', 'status_bib' => 'Belum Diambil', 'is_taken' => false],
        //     ['id' => 15, 'nama' => 'Muhammad Ali', 'no_hp' => '081177665544', 'event' => 'Jakarta Run 10K', 'bib' => 'BIB-0011', 'status_bib' => 'Sudah Diambil', 'is_taken' => true],
        //     ['id' => 16, 'nama' => 'Nadia Vega', 'no_hp' => '085244332211', 'event' => 'Night Run 5K', 'bib' => 'BIB-9988', 'status_bib' => 'Belum Diambil', 'is_taken' => false],
        //     ['id' => 17, 'nama' => 'Oki Setiana', 'no_hp' => '081211223344', 'event' => 'Jakarta Run 10K', 'bib' => 'BIB-3322', 'status_bib' => 'Belum Diambil', 'is_taken' => false],
        //     ['id' => 18, 'nama' => 'Panji Petualang', 'no_hp' => '081388776655', 'event' => 'Borobudur Marathon 5K', 'bib' => 'BIB-4455', 'status_bib' => 'Belum Diambil', 'is_taken' => false],
        //     ['id' => 19, 'nama' => 'Queen Alexandra', 'no_hp' => '085711009988', 'event' => 'Jakarta Run 10K', 'bib' => 'BIB-5566', 'status_bib' => 'Belum Diambil', 'is_taken' => false],
        //     ['id' => 20, 'nama' => 'Rano Karno', 'no_hp' => '081100112233', 'event' => 'Night Run 5K', 'bib' => 'BIB-1133', 'status_bib' => 'Belum Diambil', 'is_taken' => false],
        // ];

            return view('dashboard', compact('stats', 'registrationRows'));
    }

    public function create() {
        return view('admin.create');
    }
    public function store(Request $request) {
            // 1. Validasi Data
            // dd($request);
        $validated = $request->validate([
            'nama_event' => 'required|string',
            'tanggal'    => 'required|date',
            'start'      => 'required|string', // Pastikan ini ada
            'flag_off'   => 'required|string', // Pastikan ini ada
            'lokasi'     => 'required|string',
            'subLokasi'  => 'required|string', // Pastikan ini ada (perhatikan huruf besar S)
            'deskripsi'  => 'required|string',
            'kuota'      => 'required|integer',
            'kategori'   => 'required|in:5KM,10KM',
        ]);

        // Sekarang field 'start' dkk tidak akan hilang lagi
        RunningEvent::create($validated);

        // 3. Redirect dengan pesan sukses
        return redirect()->route('dashboard')->with('message', 'Event Berhasil Ditambahkan!');
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
        $newStatus = $pendaftaran->status === 'belum_diambil' ? 'sudah_diambil' : 'belum_diambil';
        $pendaftaran->update([
            'status' => $newStatus
        ]);

        $message = $newStatus === 'sudah_diambil' ? 'BIB ditandai sudah diambil' : 'BIB ditandai belum diambil';
        return back()->with('success', $message);
    }
    
}
