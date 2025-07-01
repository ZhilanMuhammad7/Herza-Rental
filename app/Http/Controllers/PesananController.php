<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\Cicilan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Response;
use PhpOffice\PhpSpreadsheet\Style\Fill;

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
    public function exportlaporan()
    {
        $data = Pesanan::where('status_pesanan', 'Selesai')->get();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A2', 'REKAP SEWA MOBIL HERZA RENTAL');
        $sheet->mergeCells('A2:G2');

        $sheet->setCellValue('A3', 'No');
        $sheet->setCellValue('B3', 'Pemesan');
        $sheet->setCellValue('C3', 'Mobil');
        $sheet->setCellValue('D3', 'Jumlah Hari');
        $sheet->setCellValue('E3', 'Total Bayar');
        $sheet->setCellValue('F3', 'Jenis Pembayaran');
        $sheet->setCellValue('G3', 'Tanggal Sewa');

        $row = 4;
        foreach ($data as $index => $item) {
            $sheet->setCellValue('A' . $row, $index + 1);
            $sheet->setCellValue('B' . $row, $item->user->nama);
            $sheet->setCellValue('C' . $row, $item->produk->nama_mobil);
            $sheet->setCellValue('D' . $row, $item->jumlah_hari);
            $sheet->setCellValue('E' . $row, $item->total_harga);
            $sheet->getStyle('E' . $row)
                ->getNumberFormat()
                ->setFormatCode('"Rp"#,##0_-');
            $sheet->setCellValue('F' . $row, $item->jenis_pembayaran);
            $sheet->setCellValue('G' . $row, $item->tanggal);
            $row++;
        }

        $borderStyle = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ];

        $sheet->getStyle('A3:G' . ($row - 1))->applyFromArray($borderStyle);
        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(20);
        $sheet->getColumnDimension('C')->setWidth(15);
        $sheet->getColumnDimension('D')->setWidth(12);
        $sheet->getColumnDimension('E')->setWidth(15);
        $sheet->getColumnDimension('F')->setWidth(17);
        $sheet->getColumnDimension('G')->setWidth(12);
        $sheet->getStyle('A3:G3')->applyFromArray([
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'color' => [
                    'rgb' => '4CAF50',
                ],
            ],
            'font' => [
                'color' => [
                    'rgb' => 'FFFFFF',
                ],
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ],
        ]);

        $sheet->getStyle('A2:G2')->applyFromArray([
            'font' => [
                'size' => 14,
                'color' => ['rgb' => '000000'],
                'bold' => true,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
                'wrapText' => true,
            ],
        ]);

        $filename = 'Rekap_Rental_' . date('d-m-y') . '.xlsx';
        $writer = new Xlsx($spreadsheet);
        $filePath = storage_path('app/public/' . $filename);
        $writer->save($filePath);

        return Response::download($filePath, $filename, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        ])->deleteFileAfterSend(true);
    }
}
