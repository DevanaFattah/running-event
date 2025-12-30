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
        Schema::table('pendaftarans', function (Blueprint $table) {
            if (!Schema::hasColumn('pendaftarans', 'peserta_id')) {
                $table->unsignedBigInteger('peserta_id')->after('id');
            }
            if (!Schema::hasColumn('pendaftarans', 'event_id')) {
                $table->unsignedBigInteger('event_id')->nullable()->after('peserta_id');
            }
            if (!Schema::hasColumn('pendaftarans', 'bib')) {
                $table->string('bib')->nullable();
            }
            if (!Schema::hasColumn('pendaftarans', 'status')) {
                $table->string('status')->default('terdaftar');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pendaftarans', function (Blueprint $table) {
            if (Schema::hasColumn('pendaftarans', 'peserta_id')) {
                $table->dropColumn('peserta_id');
            }
            if (Schema::hasColumn('pendaftarans', 'event_id')) {
                $table->dropColumn('event_id');
            }
            if (Schema::hasColumn('pendaftarans', 'bib')) {
                $table->dropColumn('bib');
            }
            if (Schema::hasColumn('pendaftarans', 'status')) {
                $table->dropColumn('status');
            }
        });
    }
};
