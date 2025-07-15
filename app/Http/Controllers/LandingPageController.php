<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Cicilan;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produk = Produk::all();
        return view('landingPage.index', compact('produk'));
    }

    public function mobil()
    {
        $produk = Produk::all();
        return view('landingPage.mobil', compact('produk'));
    }

    public function profile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('landingPage.profile', compact('user'));
    }

    public function order()
    {
        $id = Auth::user()->id ?? null;
        $data = Pesanan::where('user_id', $id)->orderBy('id', 'desc')
            ->get();
        return view('landingPage.order', compact('data'));
    }

    public function detail_cicilan($id)
    {
        $decryptedId = Crypt::decryptString($id);

        $pesanan = pesanan::find($decryptedId);
        $produk = Produk::find($pesanan->produk_id);
        $data = Cicilan::where('pesanan_id', $decryptedId)
            ->get();
        return view('landingPage.detail_cicilan', compact('data', 'produk', 'pesanan'));
    }

    public function kontak()
    {
        return view('landingPage.kontak');
    }

    public function detail_mobil($id)
    {
        $decryptedId = Crypt::decryptString($id);
        $produk =  Produk::find($decryptedId);
        return view('landingPage.detail_mobil', compact('produk'));
    }

    public function invoice()
    {
        return view('landingPage.invoice');
    }

    public function invoice_cicilan()
    {
        return view('landingPage.invoice_cicilan');
    }

    public function batalkanPesanan($id)
    {
        $pesanan = Pesanan::find($id);

        if ($pesanan && $pesanan->status_pembayaran === 'Pending') {
            $pesanan->delete();
            return response()->json(['message' => 'Pesanan dibatalkan']);
        }

        return response()->json(['message' => 'Pesanan tidak ditemukan atau sudah dibayar'], 404);
    }
}
