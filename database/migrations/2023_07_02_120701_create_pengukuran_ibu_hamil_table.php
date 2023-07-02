<?php

use App\Models\IbuHamil;
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
        Schema::create('pengukuran_ibu_hamil', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_ukur');
            $table->string('berat_badan')->default(0);
            $table->string('tinggi_badan');
            $table->string('lila')->nullable();
            $table->string('usia_kehamilan');
            $table->string('imt')->nullable();
            $table->string('bbi')->nullable();
            $table->string('bbih')->nullable();
            $table->foreignIdFor(IbuHamil::class)->nullable()->constrained('ibu_hamil','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengukuran_ibu_hamil');
    }
};
