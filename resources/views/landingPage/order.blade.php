@extends('layouts.masterUser')
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight"
    style="background-image: url('{{asset('ladingPage/images/bg_2.jpg')}}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Pesanan <i
                            class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Pesanan Anda</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-4">
            <div class="col-md-10 text-center">
                <h2 class="mb-4">Daftar Pesanan</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive bg-white p-4 rounded shadow">
                    <table class="table table-bordered table-striped" id="ordersTable">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nomor Pesanan</th>
                                <th>Tanggal</th>
                                <th>Produk</th>
                                <th>Pembayaran</th>
                                <th>Total Harga</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <span class="badge">
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Optional: Tambahkan DataTables JS jika ingin fitur pencarian/sorting -->
@push('scripts')
<script>
$(document).ready(function() {
    $('#ordersTable').DataTable();
});
</script>
@endpush
@endsection