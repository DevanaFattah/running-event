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
        // Pastikan kolom kategori dan kuota ada (jika migrasi sebelumnya tidak berjalan)
        if (!Schema::hasColumn('events', 'kategori')) {
            Schema::table('events', function (Blueprint $table) {
                $table->string('kategori')->after('nama_event')->nullable();
            });
        }

        if (!Schema::hasColumn('events', 'kuota')) {
            Schema::table('events', function (Blueprint $table) {
                $table->integer('kuota')->after('kategori')->default(0);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
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
