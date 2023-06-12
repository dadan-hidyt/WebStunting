<?php

use App\Models\Anak;
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
        Schema::create('pengukuran', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Anak::class)->constrained('anak','id')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('tanggal_ukur')->nullable();
            $table->integer('umur');
            $table->string('bb')->nullable();
            $table->string('bb_zscore')->nullable();

            $table->string('tb')->nullable();
            $table->string('tb_zscore')->nullable();

            $table->string('pb')->nullable();
            $table->string('pb_zscore')->nullable();

            $table->string('bb_pb')->nullable();
            $table->string('bb_pb_zscore')->nullable();

            $table->string('bb_tb')->nullable();
            $table->string('bb_tb_zscore')->nullable();

            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengukuran');
    }
};
