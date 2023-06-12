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
        Schema::create('anak', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->date('tanggal_lahir');
            $table->string('tempat_lahir');
            $table->integer('anak_ke')->nullable(0);
            $table->string('nik')->unique();
            $table->string('berat_lahir')->nullable();
            $table->string('tinggi');
            $table->string('umur');
            $table->enum('jenis_kelamin',['L','P']);
            $table->foreignIdFor(\App\Models\OrangTua::class)->nullable()->constrained('orang_tua','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anak');
    }
};
