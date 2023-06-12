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
        Schema::create('orang_tua', function (Blueprint $table) {
            $table->id();
            $table->string('nik')->unique();
            $table->string('nama');
            $table->string('pekerjaan')->nullable();
            $table->text('alamat_lengkap');
            $table->string('kontak')->nullable();
            $table->foreignIdFor(\App\Models\KelurahanDesa::class,'kelurahan_desa_id')->nullable()->constrained('kelurahan_desa','id')->nullOnDelete()->cascadeOnUpdate();
            $table->foreignIdFor(\App\Models\PosyanduPembina::class,'posyandu_pembina_id')->nullable()->constrained('posyandu_pembina','id')->nullOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orang_tua');
    }
};
