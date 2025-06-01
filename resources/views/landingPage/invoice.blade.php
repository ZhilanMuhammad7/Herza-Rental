@extends('layouts.masterUser')
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight"
        style="background-image: url('{{ asset('ladingPage/images/bg_2.jpg') }}');" data-stellar-background-ratio="0.5">
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
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="container bg-white p-5 rounded shadow">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h4><strong>Herza Rental</strong></h4>
                    <p>Jl. Arifin Ahmad<br>
                        Phone: 08232343434<br>
                        Email: herzarental@gmail.com
                    </p>
                </div>
                <div class="col-md-6 text-right">
                    <h4><strong>Invoice</strong></h4>
                    <p>No. Invoice: <strong>#{{ $pesanan->no_pesanan }}</strong><br>
                        Tanggal: <strong>{{ $pesanan->tanggal }}</strong><br>
                        Status Pembayaran: <span class="badge badge-warning text-white">Pending</span><br>
                        Status Pesanan: <span class="badge badge-info text-white">Proses</span>
                    </p>
                </div>
            </div>

            <hr>

            <div class="row mb-4">
                <div class="col-md-6">
                    <h5>Tagihan Kepada:</h5>
                    <p>{{ Auth::user()->nama }}<br>
                        {{ Auth::user()->email }}<br>
                        {{ Auth::user()->alamat }}
                    </p>
                </div>
            </div>

            <table class="table table-bordered mt-4">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <th>No</th>
                        <th>Produk</th>
                        <th>Jumlah Hari</th>
                        <th>Total Harga</th>
                        <th>Jenis Pembayaran</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="text-center">
                        <td>1</td>
                        <td>{{ $pesanan->produk->nama_mobil }}</td>
                        <td>{{ $pesanan->jumlah_hari }} Hari</td>
                        <td>{{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                        <td>{{ ucfirst($pesanan->jenis_pembayaran) }}</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4" class="text-right">Total</th>
                        <th>{{ number_format($pesanan->total_harga, 0, ',', '.') }}</th>
                    </tr>
                    <tr>
                        <th colspan="4" class="text-right">Status</th>
                        <th><span class="badge badge-info text-white">Proses</span></th>
                    </tr>
                </tfoot>
            </table>
            <a href="{{ route('landingPage.order') }}" class="btn btn-primary mt-3">Selesai</a>
            <div class="text-center mt-5">
                <p>Terima kasih telah percaya kepada <strong>Herza Rental</strong>!</p>
            </div>
        </div>
    </section>
@endsection
