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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mahasiswa_id');
            $table->string('jenis_tagihan');
            $table->enum('metode_transfer', ['ATM', 'E-Banking']);
            $table->enum('rekening_tujuan', ['Mandiri', 'BRI', 'BNI']);
            $table->date('tanggal_transfer');
            $table->decimal('nominal', 20);
            $table->text('deskripsi')->nullable();
            $table->text('bukti_pembayaran')->nullable();
            $table->enum('status_pembayaran', ['Belum Dibayar', 'Sudah Dibayar'])->default('Belum Dibayar');
            $table->enum('semester', ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14']);
            $table->enum('tahun_ajaran', ['Ganjil', 'Genap']);
            $table->enum('status_konfirmasi', ['Menunggu', 'Ditolak', 'Diterima'])->default('Menunggu');
            $table->timestamps();

            $table->foreign('mahasiswa_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
