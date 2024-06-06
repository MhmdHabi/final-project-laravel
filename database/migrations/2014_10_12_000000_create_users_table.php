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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('nim')->unique()->nullable();
            $table->integer('nidn')->unique()->nullable();
            $table->string('username')->unique()->nullable();
            $table->enum('gender', ['Laki-Laki', 'Perempuan'])->nullable();
            $table->string('no_hp')->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->string('agama')->nullable();
            $table->string('jabatan')->nullable();
            $table->text('alamat')->nullable();
            $table->text('image')->nullable();
            $table->string('status_kuliah')->nullable();
            $table->enum('jurusan', ['Sistem Informasi', 'Teknik Informatika'])->nullable();
            $table->string('fakultas')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
