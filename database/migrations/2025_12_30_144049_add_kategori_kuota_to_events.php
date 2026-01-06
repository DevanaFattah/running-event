<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tambah kolom kategori dan kuota jika belum ada
        if (!Schema::hasColumn('events', 'kategori')) {
            Schema::table('events', function (Blueprint $table) {
                $table->string('kategori')->after('nama_event');
            });
        }

        if (!Schema::hasColumn('events', 'kuota')) {
            Schema::table('events', function (Blueprint $table) {
                $table->integer('kuota')->after('kategori');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus kolom jika ada
        if (Schema::hasColumn('events', 'kuota')) {
            Schema::table('events', function (Blueprint $table) {
                $table->dropColumn('kuota');
            });
        }

        if (Schema::hasColumn('events', 'kategori')) {
            Schema::table('events', function (Blueprint $table) {
                $table->dropColumn('kategori');
            });
        }
    }
};
