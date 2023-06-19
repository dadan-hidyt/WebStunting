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
        Schema::table('anak',fn(Blueprint $table) => $table->removeColumn('lila'));
        Schema::table('pengukuran',fn(Blueprint $table) => $table->string('lila')->after('bb'));
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengukuran', function (Blueprint $table) {
            //
        });
    }
};
