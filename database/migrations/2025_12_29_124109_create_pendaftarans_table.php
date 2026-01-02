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
        if (!Schema::hasTable('pendaftarans')) {
            Schema::create('pendaftarans', function (Blueprint $table) {
                $table->id();
                $table->foreignId('peserta_id')->constrained('pesertas');
                $table->foreignId('event_id')->constrained('running_events');
                $table->string('bib');
                $table->enum('status', ['belum_diambil', 'sudah_diambil'])->default('belum_diambil');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};
