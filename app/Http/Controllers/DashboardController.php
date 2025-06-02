<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pesanan;

class DashboardController extends Controller
{

    public function index()
    {
        $produk = Produk::count();
        $pesanan = Pesanan::count();
        $cicilan = Pesanan::where('jenis_pembayaran', 'cicilan')->where('status_pembayaran', '!=', 'Lunas')->count();
        return view('admin.dashboard.index', compact('produk', 'pesanan', 'cicilan'));
    }
}
