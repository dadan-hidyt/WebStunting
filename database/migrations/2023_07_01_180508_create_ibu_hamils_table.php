<?php

use App\Models\KelurahanDesa;
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
        Schema::create('ibu_hamil', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('nama')->unique();
            $table->date('tanggal_lahir');
            $table->string('kontak')->nullable();
            $table->text('alamat_lengkap');
            $table->string('berat_badan_sebelum_hamil')->default(0);
            $table->foreignIdFor(KelurahanDesa::class)->nullable()->constrained('kelurahan_desa','id')->nullOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ibu_hamil');
    }
};
