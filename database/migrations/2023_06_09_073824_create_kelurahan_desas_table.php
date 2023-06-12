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
        Schema::create('kelurahan_desa', function (Blueprint $table) {
            $table->id();
            $table->string('nama_desa');
            $table->text('alamat')->nullable();
            $table->foreignIdFor(\App\Models\Kecamatan::class)->nullable()->constrained('kecamatan','id')->nullOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelurahan_desa');
    }
};
