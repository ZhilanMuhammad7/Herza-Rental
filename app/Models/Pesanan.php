<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    protected $table = 'pesanan';
    protected $fillable = [
        "user_id",
        "produk_id",
        "tgl_mulai",
        "tgl_selesai",
        "jumlah",
        "total_harga",
        "via",
        "status",
        "status_pesanan",
        "status_pembayaran"
    ];
}
