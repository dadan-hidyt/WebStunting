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
        Schema::create('posyandu_pembina', function (Blueprint $table) {
            $table->id();
            $table->string('nama_posyandu');
            $table->text('alamat_lengkap');
            $table->string('kontak')->nullable();
            $table->foreignIdFor(\App\Models\KelurahanDesa::class,'kelurahan_desa_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posyandu_pembina');
    }
};
