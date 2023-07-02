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
        Schema::table('ibu_hamil', function (Blueprint $table) {
            $table->string('berat_badan_ideal_sebelum_hamil')->after('tinggi_badan_sebelum_hamil');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ibu_hamil', function (Blueprint $table) {
            //
        });
    }
};
