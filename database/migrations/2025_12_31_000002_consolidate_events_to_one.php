<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update event id=1 menjadi event umum dengan kategori kosong/general
        DB::table('events')
            ->where('id', 1)
            ->update([
                'nama_event' => 'Running Event 2025',
                'kategori' => 'General',  // Set ke value yang valid, bukan null
                'kuota' => 1500,  // Total untuk 5K + 10K
                'lokasi' => 'Bandung & Jakarta',
            ]);

        // Hapus event id=2 jika ada
        DB::table('events')->where('id', 2)->delete();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Restore ke kondisi awal
        DB::table('events')->where('id', 1)->update([
            'nama_event' => 'Jakarta Run 10K',
            'kategori' => '10K',
            'kuota' => 750,
            'lokasi' => 'Jakarta',
        ]);

        // Recreate event id=2
        DB::table('events')->insert([
            'id' => 2,
            'nama_event' => 'Bandung Marathon',
            'kategori' => '5K',
            'kuota' => 750,
            'lokasi' => 'Bandung',
            'deskripsi' => '',
            'tanggal' => now()->format('Y-m-d'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
};
