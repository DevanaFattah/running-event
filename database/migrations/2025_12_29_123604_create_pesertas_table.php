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
        if (!Schema::hasTable('pesertas')) {
            Schema::create('pesertas', function (Blueprint $table) {
                $table->id();
                $table->string('nama');
                $table->string('nomor_telepon');
                $table->string('email');
                $table->enum('jenis_kelamin', ['L', 'P']);
                $table->integer('umur');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesertas');
    }
};
