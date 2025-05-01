@extends('layouts.masterUser')
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight"
    style="background-image: url('{{ asset('ladingPage/images/bg_2.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs">
                    <span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span>
                    <span>Invoice <i class="ion-ios-arrow-forward"></i></span>
                </p>
                <h1 class="mb-3 bread">Invoice Cicilan Anda</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container bg-white p-5 rounded shadow">
        <div class="row mb-4">
            <div class="col-md-6">
                <h4><strong>Herza Rental</strong></h4>
                <p>Jl Tiung Ujung Gang Buntu 1 No 3C<br>
                    Phone: +62 822-8484-4057<br>
                    Email: info@herza@gmail.com
                </p>
            </div>
            <div class="col-md-6 text-right">
                <h4><strong>Invoice Cicilan</strong></h4>
                <p>No. Invoice: <strong>#INV-CICIL-000456</strong><br>
                    Tanggal: <strong>01/05/2025</strong><br>
                    Status: <span class="badge badge-warning">Cicilan Berjalan</span>
                </p>
            </div>
        </div>

        <hr>

        <div class="row mb-4">
            <div class="col-md-6">
                <h5>Tagihan Kepada:</h5>
                <p>Nama Pelanggan<br>
                    nama@email.com<br>
                    Alamat pelanggan
                </p>
            </div>
        </div>

        <table class="table table-bordered mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Produk</th>
                    <th>Qty</th>
                    <th>Harga Satuan</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr class="text-center">
                    <td>1</td>
                    <td>Nama Produk Cicilan</td>
                    <td>1</td>
                    <td>Rp 1.500.000</td>
                    <td>Rp 1.500.000</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4" class="text-right">Total Harga</th>
                    <th>Rp 1.500.000</th>
                </tr>
                <tr>
                    <th colspan="4" class="text-right">Uang Muka (DP)</th>
                    <th>Rp 300.000</th>
                </tr>
                <tr>
                    <th colspan="4" class="text-right">Sisa Cicilan</th>
                    <th>Rp 1.200.000</th>
                </tr>
                <tr>
                    <th colspan="4" class="text-right">Tenor</th>
                    <th>6 Bulan</th>
                </tr>
                <tr>
                    <th colspan="4" class="text-right">Angsuran per Bulan</th>
                    <th>Rp 200.000</th>
                </tr>
                <tr>
                    <th colspan="4" class="text-right">Status Pembayaran Terakhir</th>
                    <th><span class="badge badge-info">Sudah bayar 2x (Rp 400.000)</span></th>
                </tr>
                <tr>
                    <th colspan="4" class="text-right">Sisa Pembayaran</th>
                    <th>Rp 800.000</th>
                </tr>
            </tfoot>
        </table>
        <a href="" class="btn btn-primary mt-3">Selesai</a>
        <div class="text-center mt-5">
            <p>Terima kasih telah melakukan pembayaran cicilan di <strong>Herza Rental</strong>.</p>
        </div>
    </div>
</section>
@endsection