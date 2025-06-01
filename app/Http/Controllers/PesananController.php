<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\Cicilan;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{

    public function index()
    {
        $data = Pesanan::paginate(10);
        return view('admin.pesanan.index', compact('data'));
    }

    public function store(Request $request)
    {
        $produk = Produk::find($request->produk_id);

        $lastPesanan = Pesanan::orderBy('created_at', 'desc')->first();

        if ($lastPesanan && $lastPesanan->no_pesanan) {
            $lastNumber = (int) str_replace('INV-', '', $lastPesanan->no_pesanan);
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }
        $noPesanan = 'INV-' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);
        $totalHarga = $produk->harga_sewa * $request->jumlah_hari;

        $data = Pesanan::create([
            'no_pesanan' => $noPesanan,
            'user_id' => Auth::id(),
            'produk_id' => $request->produk_id,
            'jumlah_hari' => $request->jumlah_hari,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'total_harga' => $produk->harga_sewa * $request->jumlah_hari,
            'jenis_pembayaran' => $request->jenis_pembayaran,
            'status_pembayaran' => 'Pending',
            'status_pesanan' => 'Proses',
            'tanggal' => now()
        ]);

        if ($request->jenis_pembayaran == 'cicilan') {
            $jumlahCicilan = 2;
            $nominalCicilan = $totalHarga / $jumlahCicilan;

            for ($i = 1; $i <= $jumlahCicilan; $i++) {
                Cicilan::create([
                    'pesanan_id' => $data->id,
                    'cicilan' => $i,
                    'total_bayar' => $nominalCicilan,
                    'status' => 'Pending',
                ]);
            }
        }

        if ($data) {
            $pesanan = Pesanan::with('produk')->find($data->id);
            return view('landingPage.invoice', compact('pesanan'))->with('success', 'Pesanan Berhasil Dikirim!');
        } else {
            return redirect()->route('landingPage.index')->with('error', 'Pesanan Gagal Dikirim!');
        }
    }

    public function show(string $id) {}


    public function edit(string $id) {}

    public function update(Request $request) {}

    public function destroy(string $id)
    {
        $data = Pesanan::find($id);

        if (empty($data)) {
            return response()->json([
                'status' => false,
                'message' => 'Data gagal ditemukan'
            ], 404);
        }

        $data->delete();

        return response()->json([
            'status' => true,
            'message' => 'Sukses Melakukan delete Data',
        ]);
    }
}
