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
        Schema::table('pengukuran', function (Blueprint $table) {
            $table->string('lingkar_kepala')->nullable();
            $table->string('vitamin_a')->nullable();
            $table->enum('cara_ukur', ['terlentang','berdiri'])->nullable()->default(null);
        });
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
