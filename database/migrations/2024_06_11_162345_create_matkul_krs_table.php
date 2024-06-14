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
        Schema::create('matkul_krs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('krs_id');
            $table->unsignedBigInteger('matkul_id');
            $table->enum('status', ['Menunggu', 'Disetujui', 'Ditolak'])->default('Menunggu');
            $table->decimal('nilai', 4, 2)->nullable();
            $table->timestamps();

            $table->foreign('krs_id')->references('id')->on('krs')->onDelete('cascade');
            $table->foreign('matkul_id')->references('id')->on('matkuls')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matkul_krs');
    }
};
