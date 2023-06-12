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
        Schema::create('standard_antropometri_bb_by_umur', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_kelamin', ['L','P'])->nullable();
            $table->integer('umur')->default(0);
            $table->string('-3sd');
            $table->string('-2sd');
            $table->string('-1sd');
            $table->string('median');
            $table->string('1sd');
            $table->string('2sd');
            $table->string('3sd');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('standard_antropometri_bb_by_umur');
    }
};
