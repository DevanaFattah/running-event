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
        if (!Schema::hasColumn('pendaftarans', 'kategori')) {
            Schema::table('pendaftarans', function (Blueprint $table) {
                $table->string('kategori')->nullable()->after('event_id');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('pendaftarans', 'kategori')) {
            Schema::table('pendaftarans', function (Blueprint $table) {
                $table->dropColumn('kategori');
            });
        }
    }
};
