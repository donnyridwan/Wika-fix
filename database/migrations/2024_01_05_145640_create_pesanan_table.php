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
        Schema::create('pesanan', function (Blueprint $table) {
            $table->id('id_pesanan');
            $table->string('Kota_asal');
            $table->string('Kota_Tujuan');
            $table->string('jam_berangkat');
            $table->string('jam_tiba');
            $table->string('maskapai');
            $table->string('harga');
            $table->string('kode_tiket')->nullable();
            $table->enum('status', ['proses', 'selesai', 'gagal'])->default('proses');
            $table->string('pemesan');
            $table->string('tanggal');
            $table->mediumText('penumpang');
            $table->foreign('pemesan')->references('nama')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};
