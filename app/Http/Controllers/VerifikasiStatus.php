<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerifikasiStatus extends Controller
{
    public function __invoke(Request $request)
    {
        // config dinamis model
        $model =  '\\App\\Models\\' . $request->model;
        $model = new $model;

        $idData   = $request->id;
        $verifikasi = $request->verifikasi;

        if ($verifikasi == 'status_pesanan') {
            $data['status_pesanan'] = $request->status;
            $data['catatan'] = $request->catatan ?? null;
            if ($request->status == 'Selesai') {
                $data['status_pembayaran'] = 'Lunas';
            }
        } else {
            $data['status'] = $request->status;
        }

        $save = $model::find($idData);
        $save->update($data);

        return response()->json([
            'status'      => true,
            'status_code' => 200,
            'message'     => 'Data berhasil di simpan.',
            'data'        => [
                'id' => $idData
            ]
        ], 200);
    }
}
