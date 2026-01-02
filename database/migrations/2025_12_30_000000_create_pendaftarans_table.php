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
                $table->unsignedBigInteger('peserta_id');
                $table->unsignedBigInteger('event_id')->nullable();
                $table->string('kategori')->nullable();
                $table->string('bib')->nullable();
                $table->string('status')->default('terdaftar');
                $table->timestamps();

                // Foreign keys
                $table->foreign('peserta_id')->references('id')->on('pesertas')->onDelete('cascade');
                $table->foreign('event_id')->references('id')->on('running_events')->onDelete('cascade');
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
