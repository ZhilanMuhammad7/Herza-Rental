@extends('layouts.masterUser')
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{asset('ladingPage/images/bg_3.jpg')}}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Harga <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">List Harga</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="car-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th class="bg-primary heading">Per Hari</th>
                                <th class="bg-dark heading">Per Minggu</th>
                                <th class="bg-black heading">Per Bulan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="">
                                <td class="car-image">
                                    <div class="img" style="background-image:url('{{asset('ladingPage/images/car-1.jpg')}}');"></div>
                                </td>
                                <td class="product-name">
                                    <h3>Cheverolet SUV Car</h3>
                                    <p class="mb-0">
                                        <span>Plat:</span>
                                        <span class="subheading">BA 010101 AL</span>
                                    </p>
                                </td>

                                <td class="price">
                                    <p class="btn-custom">
                                        <a href="#" data-toggle="modal" data-target="#myModal">Pesan Rental</a>
                                    </p>
                                    <div class="price-rate">
                                        <h3>
                                            <span class="num"><small class="currency">$</small> 10.99</span>
                                            <span class="per">/per hour</span>
                                        </h3>
                                        <span class="subheading">$3/hour fuel surcharges</span>
                                    </div>
                                </td>

                                <td class="price">
                                    <p class="btn-custom"><a href="#">Pesan Rental</a></p>
                                    <div class="price-rate">
                                        <h3>
                                            <span class="num"><small class="currency">$</small> 60.99</span>
                                            <span class="per">/per day</span>
                                        </h3>
                                        <span class="subheading">$3/hour fuel surcharges</span>
                                    </div>
                                </td>

                                <td class="price">
                                    <p class="btn-custom"><a href="#">Pesan Rental</a></p>
                                    <div class="price-rate">
                                        <h3>
                                            <span class="num"><small class="currency">$</small> 995.99</span>
                                            <span class="per">/per month</span>
                                        </h3>
                                        <span class="subheading">$3/hour fuel surcharges</span>
                                    </div>
                                </td>
                            </tr><!-- END TR-->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Formulir Pemesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="Masukkan nama Anda">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Masukkan email Anda">
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal Pemesanan</label>
                        <input type="date" class="form-control" id="tanggal">
                    </div>
                    <div class="form-group">
                        <label for="waktu">Waktu Pemesanan</label>
                        <input type="time" class="form-control" id="waktu">
                    </div>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endsection