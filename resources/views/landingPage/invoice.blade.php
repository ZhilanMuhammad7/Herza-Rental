@extends('layouts.masterUser')
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight"
    style="background-image: url('{{asset('ladingPage/images/bg_2.jpg')}}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Invoice <i
                            class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Invoice Anda</h1>
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
                <h4><strong>Invoice</strong></h4>
                <p>No. Invoice: <strong>#INV-000123</strong><br>
                    Tanggal: <strong>12/12/12</strong><br>
                    Status: <span class="badge badge-success">Lunas</span>
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
                    <td>Nama Produk 1</td>
                    <td>2</td>
                    <td>Rp 100.000</td>
                    <td>Rp 200.000</td>
                </tr>
                <tr class="text-center">
                    <td>2</td>
                    <td>Nama Produk 2</td>
                    <td>1</td>
                    <td>Rp 150.000</td>
                    <td>Rp 150.000</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="4" class="text-right">Subtotal</th>
                    <th>Rp 350.000</th>
                </tr>
                <tr>
                    <th colspan="4" class="text-right">Pajak (10%)</th>
                    <th>Rp 35.000</th>
                </tr>
                <tr>
                    <th colspan="4" class="text-right">Total Bayar</th>
                    <th>Rp 385.000</th>
                </tr>
            </tfoot>
        </table>

        <div class="text-center mt-5">
            <p>Terima kasih telah percaya kepada <strong>Herza Rental</strong>!</p>
        </div>
    </div>
</section>
@endsection