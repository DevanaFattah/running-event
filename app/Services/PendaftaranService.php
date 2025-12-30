<?php

namespace App\Services;

use App\Models\Peserta;
use App\Models\Pendaftaran;
use App\Models\Event;

class PendaftaranService
{
    public function generateBIB()
    {
        return 'BIB-' . str_pad((string) rand(1000, 9999), 4, '0', STR_PAD_LEFT);
    }

    public function daftar(array $data)
    {
       $peserta = Peserta::create([
    'nama' => $data['nama'],
    'nomor_telepon' => $data['nomor_telepon'],
    'email' => $data['email'],
    'jenis_kelamin' => $data['jenis_kelamin'],
    'umur' => $data['umur'],
]);

        // Tentukan event yang dipilih (default ke 1 jika tidak diberikan)
        $eventId = $data['event_id'] ?? 1;
        $event = Event::findOrFail($eventId);

        // Hitung total pendaftar untuk event ini dan periksa kuota
        $totalPendaftar = Pendaftaran::where('event_id', $event->id)->count();
        if ($totalPendaftar >= $event->kuota) {
            throw new \Exception('Kuota kategori ini sudah penuh');
        }

        Pendaftaran::create([
            'peserta_id' => $peserta->id,
            'event_id' => $event->id,
            'bib' => 'BIB-' . rand(1000,9999),
            'status' => 'terdaftar',
        ]);
    }

    public function cekKuota($kategori)
    {
        // Hitung jumlah pendaftaran berdasarkan kategori event (kategori ada di tabel events)
        $jumlah = Pendaftaran::whereHas('event', function ($q) use ($kategori) {
            $q->where('kategori', $kategori);
        })->count();

        if ($kategori === '5K' && $jumlah >= 750) {
            throw new \Exception('Kuota 5K penuh');
        }

        if ($kategori === '10K' && $jumlah >= 750) {
            throw new \Exception('Kuota 10K penuh');
            //btw ini inti OOP nya wok 
        }
    }
}
//“Logic pendaftaran dipisahkan ke Service biar controller ga berat berat amat.”