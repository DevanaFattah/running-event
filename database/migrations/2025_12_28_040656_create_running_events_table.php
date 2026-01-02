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
        Schema::create('running_events', function (Blueprint $table) {
            $table->id();
                $table->string('nama_event');
                $table->date('tanggal');
                $table->string('lokasi');
                $table->string('deskripsi');
                $table->integer('kuota');
                $table->string('kategori')->default('5KM', '10KM');
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('running_events');
    }
};