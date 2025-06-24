@extends('layouts.masterUser')
@section('content')
    <section class="hero-wrap hero-wrap-2 js-fullheight"
        style="background-image: url('{{ asset('ladingPage/images/bg_2.jpg') }}');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
                <div class="col-md-9 ftco-animate pb-5">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span>Detail Mobil <i
                                class="ion-ios-arrow-forward"></i></span></p>
                    <h1 class="mb-3 bread">Detail Mobil</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-car-details">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="car-details">
                        <div style="display: flex; justify-content: center; margin-top: 20px;">
                            <div class="img rounded"
                                style="background-image: url('{{ Storage::url($produk->foto) }}');
                                    width: 450px;
                                    height: 350px;
                                    background-size: contain;
                                    background-repeat: no-repeat;
                                    background-position: center;">
                            </div>
                        </div>

                        <div class="text text-center">
                            <span class="subheading">{{ $produk->jenis_mobil }}</span>
                            <h2>{{ $produk->nama_mobil }} {{ $produk->tahun }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-dashboard"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Kilometer
                                        <span>{{ $produk->jarak_tempuh }}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-pistons"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Kondisi
                                        <span>{{ $produk->kondisi }}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-car-seat"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Kapasitas
                                        <span>{{ $produk->kapasitas }} orang</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex align-self-stretch ftco-animate">
                    <div class="media block-6 services">
                        <div class="media-body py-md-4">
                            <div class="d-flex mb-3 align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-diesel"></span></div>
                                <div class="text">
                                    <h3 class="heading mb-0 pl-3">
                                        Bahan Bakar
                                        <span>{{ $produk->bahan_bakar }}</span>
                                    </h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 pills">
                    <div class="bd-example bd-example-tabs">
                        <div class="d-flex justify-content-center">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-manufacturer-tab" data-toggle="pill"
                                        href="#pills-manufacturer" role="tab" aria-controls="pills-manufacturer"
                                        aria-expanded="true">Deskripsi</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-review-tab" data-toggle="pill" href="#pills-review"
                                        role="tab" aria-controls="pills-review" aria-expanded="true">Pesan</a>
                                </li>
                            </ul>
                        </div>

                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade" id="pills-manufacturer" role="tabpanel"
                                aria-labelledby="pills-manufacturer-tab">
                                <p>{{ $produk->deskripsi }}</p>
                            </div>

                            <div class="tab-pane fade show active" id="pills-review" role="tabpanel"
                                aria-labelledby="pills-review-tab">
                                <div class="container">
                                    @guest
                                        <div class="alert alert-warning text-center mt-4" role="alert">
                                            Silakan <a href="{{ route('login') }}">login</a> terlebih dahulu untuk melakukan
                                            pemesanan.
                                        </div>
                                    @endguest

                                    @auth
                                        <h3 class="head mb-4">Formulir Pemesanan</h3>
                                        <form class="form" action="{{ route('pesanan.store') }}" method="POST"
                                            id="formPesan" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="produk_id" value="{{ $produk->id }}">
                                            <div class="form-group">
                                                <label for="nama">Nama</label>
                                                <input type="text" class="form-control" id="nama"
                                                    value="{{ Auth::user()->nama }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label>Jumlah Hari</label>
                                                <input type="number" class="form-control" name="jumlah_hari"
                                                    placeholder="Jumlah Hari" min="1">
                                            </div>
                                            <div class="form-group">
                                                <label>Tanggal Mulai</label>
                                                <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai">
                                            </div>
                                            <div class="form-group">
                                                <label for="tipe">Pilih Jenis Pembayaran</label>
                                                <select class="form-control" id="tipe" name="jenis_pembayaran">
                                                    <option value="">Pilih Pembayaran</option>
                                                    <option value="tunai">Tunai</option>
                                                    <option value="cicilan">Cicilan</option>
                                                </select>
                                            </div>
                                            <div class="form-group" id="uploadFile" style="display: none;">
                                                <label for="bukti">Upload Bukti Pembayaran</label>
                                                <input type="file" class="form-control" id="bukti"
                                                    name="bukti_pembayaran">
                                            </div>
                                            <div class="form-group" id="cicilan" style="display: none;">
                                                <label>Cicilan akan dibayarkan dalam 2 tahap, berdasarkan total harga produk
                                                    ditambah durasi sewa mobil (jumlah hari).</label>
                                            </div>
                                            <button type="submit" class="btn btn-primary mt-3">Pesan Sekarang</button>
                                        </form>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        const jumlahHariInput = document.querySelector('input[name="jumlah_hari"]');
        const tipeSelect = document.getElementById("tipe");
        const uploadDiv = document.getElementById("uploadFile");
        const cicilanDiv = document.getElementById("cicilan");

        tipeSelect.disabled = true;

        jumlahHariInput.addEventListener("input", function() {
            const jumlahHari = parseInt(this.value);

            if (!isNaN(jumlahHari) && jumlahHari >= 1) {
                tipeSelect.disabled = false;

                tipeSelect.innerHTML = '<option value="">Pilih Pembayaran</option>';

                tipeSelect.innerHTML += '<option value="tunai">Tunai</option>';
                if (jumlahHari >= 7) {
                    tipeSelect.innerHTML += '<option value="cicilan">Cicilan</option>';
                }

            } else {
                tipeSelect.disabled = true;
                tipeSelect.value = "";
                uploadDiv.style.display = "none";
                cicilanDiv.style.display = "none";
            }
        });

        tipeSelect.addEventListener("change", function() {
            const value = this.value;

            if (value === "tunai") {
                uploadDiv.style.display = "block";
                cicilanDiv.style.display = "none";
            } else if (value === "cicilan") {
                uploadDiv.style.display = "none";
                cicilanDiv.style.display = "block";
            } else {
                uploadDiv.style.display = "none";
                cicilanDiv.style.display = "none";
            }
        });
    </script>
@endsection
