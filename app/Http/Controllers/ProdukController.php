<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Produk::paginate(10);
        return view('admin.produk.index', compact('data'));
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
        if ($request->hasFile('foto')) {
            $gambarPath = $request->file('foto')->store('foto_produk', 'public');
            $gambar = $gambarPath;
        } else {
            $gambar = null;
        }

        $data = Produk::create([
            'nama_mobil' => $request->nama_mobil,
            'jenis_mobil' => $request->jenis_mobil,
            'tahun' => $request->tahun,
            'nomor_plat' => $request->nomor_plat,
            'kapasitas' => $request->kapasitas,
            'harga_sewa' => preg_replace('/[^0-9]/', '', $request->harga_sewa),
            'status' => $request->status,
            'deskripsi' => $request->deskripsi,
            'foto' => $gambar,
            'kondisi' => $request->kondisi,
            'bahan_bakar' => $request->bahan_bakar,
            'jarak_tempuh' => $request->jarak_tempuh
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
        $data = Produk::findOrFail($id);
        return response()->json(['data' => $data], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;
        $data = Produk::find($id);

        if (!$data) {
            return response()->json([
                'status' => false,
                'message' => 'Data Produk tidak ditemukan',
            ]);
        }

        $data->update([
            'nama_mobil' => $request->nama_mobil,
            'jenis_mobil' => $request->jenis_mobil,
            'tahun' => $request->tahun,
            'nomor_plat' => $request->nomor_plat,
            'kapasitas' => $request->kapasitas,
            'harga_sewa' => preg_replace('/[^0-9]/', '', $request->harga_sewa),
            'status' => $request->status,
            'deskripsi' => $request->deskripsi,
            'kondisi' => $request->kondisi,
            'bahan_bakar' => $request->bahan_bakar,
            'jarak_tempuh' => $request->jarak_tempuh
        ]);

        if ($request->hasFile('foto')) {
            $gambarPath = $request->file('foto')->store('foto_produk', 'public');
            $foto = $gambarPath;
            $data->update([
                'foto' => $foto
            ]);
        }

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
        $data = Produk::find($id);

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
