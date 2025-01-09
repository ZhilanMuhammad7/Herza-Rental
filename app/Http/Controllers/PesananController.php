<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\User;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pesanan::leftJoin('users', 'users.id', '=', 'pesanan.user_id')
            ->leftJoin('produk', 'produk.id', '=', 'pesanan.produk_id')
            ->select('pesanan.*', 'users.nama', 'users.no_hp', 'produk.nama_mobil')
            ->paginate(10);
        $user = User::where('role', 'user')->get();
        $produk = Produk::all();
        return view('admin.pesanan.index', compact('data', 'user', 'produk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produk = Produk::find($request->produk_id);

        $data = Pesanan::create([
            'user_id' => $request->user_id,
            'produk_id' => $request->produk_id,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'jumlah' => $request->jumlah,
            'total_harga' => ($request->jumlah * $produk->harga_sewa),
            'via' => 'Langsung',
            'status' => 'Proses',
            'status_pesanan' => 'Selesai',
            'status_pembayaran' => 'Lunas'
        ]);

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Sukses Memasukkan Data',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menyimpan data',
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Pesanan::findOrFail($id);
        return response()->json(['data' => $data], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $data = Pesanan::find($id);
        $produk = Produk::find($request->produk_id);

        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data Pesanan tidak ditemukan',
            ]);
        }

        $data->update([
            'user_id' => $request->user_id,
            'produk_id' => $request->produk_id,
            'tgl_mulai' => $request->tgl_mulai,
            'tgl_selesai' => $request->tgl_selesai,
            'jumlah' => $request->jumlah,
            'total_harga' => ($request->jumlah * $produk->harga_sewa)
        ]);

        if ($data) {
            return response()->json([
                'status' => true,
                'message' => 'Sukses Mengubah Data',
            ]);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Gagal Mengubah data',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
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
