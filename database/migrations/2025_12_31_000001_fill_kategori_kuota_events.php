<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Cari event yang nama mengandung 10K atau 5K (case-insensitive)
        $events = DB::table('events')->get();

        foreach ($events as $e) {
            $name = $e->nama_event ?? '';
            $kategori = null;

            if (preg_match('/\b10\s?k\b/i', $name)) {
                $kategori = '10K';
            } elseif (preg_match('/\b5\s?k\b/i', $name)) {
                $kategori = '5K';
            }

            if ($kategori) {
                DB::table('events')
                    ->where('id', $e->id)
                    ->update(['kategori' => $kategori, 'kuota' => 750]);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Kembalikan hanya baris yang kita set ke kuota 750 dan kategori 5K/10K
        DB::table('events')
            ->whereIn('kategori', ['5K', '10K'])
            ->where('kuota', 750)
            ->update(['kategori' => null, 'kuota' => 0]);
    }
};
