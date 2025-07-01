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
            $table->bigIncrements('id');
            $table->string('no_pesanan')->unique();
            $table->integer('user_id');
            $table->integer('produk_id');
            $table->integer('jumlah_hari');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai');
            $table->time('jam_pengambilan')->nullable();
            $table->integer('total_harga');
            $table->string('bukti_pembayaran_tunai')->nullable();
            $table->string('jenis_pembayaran');
            $table->string('status_pembayaran');
            $table->string('status_pesanan');
            $table->date('tanggal');
            $table->text('catatan')->nullable();
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
