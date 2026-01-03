<?php

namespace Database\Factories;

use App\Models\Peserta;
use App\Models\Pendaftaran;
use App\Models\RunningEvent;
use Illuminate\Database\Eloquent\Factories\Factory;

class PendaftaranFactory extends Factory
{
    // Gunakan static variable agar nilainya bertahan selama proses seeding
    protected static array $bibCounters = [];

    public function definition(): array
    {
        // Ambil event (pastikan sudah ada event di database)
        // $event = RunningEvent::inRandomOrder()->first() ?? RunningEvent::factory()->create();
        
        return [
            'peserta_id' => Peserta::factory(),
            // 'event_id'   => $event->id,
            'kategori'   => fake()->randomElement(['5KM', '10KM']),
            'status'     => 'belum_diambil',
            'bib'        => function (array $attributes) use ($event) {
                $eventId = $event->id;

                // Jika counter untuk event ini belum ada, cek database atau mulai dari 0
                if (!isset(self::$bibCounters[$eventId])) {
                    $lastBib = Pendaftaran::where('event_id', $eventId)
                        ->orderBy('id', 'desc')
                        ->first();

                    if ($lastBib) {
                        // Ambil angka dari BIB terakhir, misal BIB-005 jadi 5
                        self::$bibCounters[$eventId] = (int) str_replace('BIB-', '', $lastBib->bib);
                    } else {
                        self::$bibCounters[$eventId] = 0;
                    }
                }

                // Tambah 1 ke counter
                self::$bibCounters[$eventId]++;

                // Kembalikan format BIB-001, BIB-002, dst
                return 'BIB-' . str_pad(self::$bibCounters[$eventId], 3, '0', STR_PAD_LEFT);
            },
        ];
    }
}