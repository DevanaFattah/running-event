<?php

namespace App\Livewire\Event;

use App\Models\Pendaftaran; // Pastikan model ini ada
use App\Models\Peserta; // Pastikan model ini ada
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Str;

class Regist extends Component
{
    public $event; // Menampung data event dari halaman sebelumnya

    // Definisikan semua field form sebagai property public
    public $nama_lengkap;
    public $nomor_telepon;
    public $email;
    public $jenis_kelamin;
    public $tanggal_lahir;
    public $umur;

    public function mount($event)
    {
        $this->event = $event;
    }

    public function submit() 
    {
        // 1. Validasi
        $this->validate([
            'nama_lengkap'  => 'required|string|min:3',
            'nomor_telepon' => 'required|numeric|digits_between:10,14',
            'email'         => 'required|email',
            'jenis_kelamin' => 'required|in:L,P',
            // 'tanggal_lahir' => 'required|date',
            'umur'          => 'required|integer|min:5',
        ]);

        // 2. Gunakan Database Transaction untuk keamanan data ganda
        DB::transaction(function () {
            
            // Simpan Data Peserta
            $peserta = Peserta::create([
                'nama'          => $this->nama_lengkap,
                'nomor_telepon' => $this->nomor_telepon,
                'email'         => $this->email,
                'jenis_kelamin' => $this->jenis_kelamin,
                'tanggal_lahir' => $this->tanggal_lahir,
                'umur'          => $this->umur,
            ]);

            $kategoriEvent = $this->event['distance'] ?? $this->event['kategori'];

            $lastPendaftaran = Pendaftaran::where('event_id', $this->event['id'])
                ->where('kategori', $kategoriEvent)
                ->lockForUpdate()
                ->orderBy('id', 'desc')
                ->first();

            if ($lastPendaftaran && Str::contains($lastPendaftaran->bib, '-')) {
                $lastNumber = (int) Str::afterLast($lastPendaftaran->bib, '-');
                $newNumber = $lastNumber + 1;
            } else {
                $newNumber = 1;
            }

            $currentBib = 'BIB-' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

            // Simpan Pendaftaran
            Pendaftaran::create([
                'peserta_id' => $peserta->id,
                'event_id'   => $this->event['id'],
                'kategori'   => $kategoriEvent,
                'bib'        => $currentBib,
                'status'     => 'belum_diambil',
            ]);
        });

        session()->flash('success', 'Pendaftaran Berhasil! Nomor BIB Anda telah diterbitkan.');
        return redirect()->route('event.index');
    }

    public function render()
    {
        return view('livewire.event.regist');
    }
}