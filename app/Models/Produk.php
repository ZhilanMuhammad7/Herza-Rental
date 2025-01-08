<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $fillable = [
        "nama_mobil",
        "jenis_mobil",
        "tahun",
        "nomor_plat",
        "kapasitas",
        "harga_sewa",
        "status",
        "deskripsi",
        "foto",
        "kondisi",
        "bahan_bakar",
        "jarak_tempuh"
    ];

}
