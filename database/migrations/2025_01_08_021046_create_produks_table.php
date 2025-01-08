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
        Schema::create('produk', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_mobil');
            $table->string('jenis_mobil');
            $table->integer('tahun');
            $table->string('nomor_plat');
            $table->integer('kapasitas');
            $table->integer('harga_sewa');
            $table->string('status');
            $table->string('deskripsi');
            $table->string('foto');
            $table->string('kondisi');
            $table->string('bahan_bakar');
            $table->integer('jarak_tempuh');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk');
    }
};
