<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\Cicilan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;

class PesananController extends Controller
{

    public function index()
    {
        $data = Pesanan::orderBy('id', 'desc')->paginate(10);
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

        if ($request->hasFile('bukti_pembayaran')) {
            $gambarPath = $request->file('bukti_pembayaran')->store('bukti_pembayaran', 'public');
            $gambar = $gambarPath;
        } else {
            $gambar = null;
        }

        $tglMulai = Carbon::parse($request->tgl_mulai);
        $jumlahHari = (int) $request->jumlah_hari;
        $tglSelesai = $tglMulai->copy()->addDays($jumlahHari);

        $data = Pesanan::create([
            'no_pesanan' => $noPesanan,
            'user_id' => Auth::id(),
            'produk_id' => $request->produk_id,
            'jumlah_hari' =>  $jumlahHari,
            'tgl_mulai' => $tglMulai,
            'tgl_selesai' => $tglSelesai,
            'total_harga' => $produk->harga_sewa * $request->jumlah_hari,
            'jenis_pembayaran' => $request->jenis_pembayaran,
            'bukti_pembayaran_tunai' => $gambar,
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

    public function bukti_pembayaran(Request $request)
    {
        $id = $request->id;
        $data = Pesanan::find($id);

        if ($request->hasFile('bukti_pembayaran')) {
            $bukti_pembayaranPath = $request->file('bukti_pembayaran')->store('file_pendukung', 'public');
            $bukti_pembayaran = $bukti_pembayaranPath;
            $data->update([
                'bukti_pembayaran_tunai' => $bukti_pembayaran
            ]);
        }

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Berhasil Menyimpan Data',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Gagal Menyimpan Data',
            ]);
        }
    }

    public function pembayaran_cicilan(Request $request)
    {
        $id = $request->id;
        $data = Cicilan::find($id);

        if ($request->hasFile('bukti_pembayaran')) {
            $bukti_pembayaranPath = $request->file('bukti_pembayaran')->store('pembayaran_cicilan', 'public');
            $bukti_pembayaran = $bukti_pembayaranPath;
            $data->update([
                'bukti_bayar' => $bukti_pembayaran,
                'tanggal_bayar' => now()
            ]);
        }

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Berhasil Menyimpan Data',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Gagal Menyimpan Data',
            ]);
        }
    }

    public function show(string $id)
    {
        $decryptedId = Crypt::decryptString($id);
        $pesanan =  Pesanan::find($decryptedId);
        $cicilan =  Cicilan::where('pesanan_id', $decryptedId)->get();

        return view('admin.pesanan.detail', compact('pesanan', 'cicilan'));
    }


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
