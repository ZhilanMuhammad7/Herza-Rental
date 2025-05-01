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
                        <div class="img rounded" style="background-image: url('{{ Storage::url($produk->foto) }}');
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

                            {{-- <li class="nav-item">
                                    <a class="nav-link" id="pills-description-tab" data-toggle="pill"
                                        href="#pills-description" role="tab" aria-controls="pills-description"
                                        aria-expanded="true">Spesifikasi</a>
                                </li> --}}
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
                        {{-- <div class="tab-pane fade" id="pills-description" role="tabpanel"
                                aria-labelledby="pills-description-tab">
                                <div class="row">
                                    <div class="col-md-4">
                                        <ul class="features">
                                            <li class="check"><span class="ion-ios-checkmark"></span>AC</li>
                                            <li class="check"><span class="ion-ios-checkmark"></span>GPS</li>
                                            <li class="check"><span class="ion-ios-checkmark"></span>Audio</li>
                                        </ul>
                                    </div>
                                    <div class="col-md-4">
                                        <ul class="features">
                                            <li class="check"><span class="ion-ios-checkmark"></span>Sabuk Pengaman</li>
                                            <li class="check"><span class="ion-ios-checkmark"></span>Dongkrak dan Kunci
                                                Ban
                                            </li>
                                            <li class="check"><span class="ion-ios-checkmark"></span>Remot Kunci</li>
                                        </ul>
                                    </div>
                                </div>
                            </div> --}}

                        <div class="tab-pane fade" id="pills-manufacturer" role="tabpanel"
                            aria-labelledby="pills-manufacturer-tab">
                            <p>{{ $produk->deskripsi }}</p>
                        </div>

                        <div class="tab-pane fade show active" id="pills-review" role="tabpanel"
                            aria-labelledby="pills-review-tab">
                            <div class="container">
                                <h3 class="head mb-4">Formulir Pemesanan</h3>
                                <form>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" value="Alif" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="no_hp">No Handphone</label>
                                        <input type="text" class="form-control" id="no_hp" value="081291226574"
                                            disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal">Tanggal Mulai</label>
                                        <input type="date" class="form-control" id="tanggal">
                                    </div>
                                    <div class="form-group">
                                        <label for="tanggal">Tanggal Selesai</label>
                                        <input type="date" class="form-control" id="tanggal">
                                    </div>
                                    <div class="form-group">
                                        <label for="waktu">Jumlah Hari</label>
                                        <input type="number" class="form-control" id="hari">
                                    </div>
                                    <div class="form-group">
                                        <label for="tipe">Pilih Jenis Pembayaran</label>
                                        <select class="form-control" id="tipe">
                                            <option value="">-- Pilih Pembayaran --</option>
                                            <option value="cash">Cash</option>
                                            <option value="cicilan">Cicilan</option>
                                        </select>
                                    </div>

                                    <div class="form-group" id="uploadFile" style="display: none;">
                                        <label for="bukti">Upload Bukti Pembayaran</label>
                                        <input type="file" class="form-control" id="bukti">
                                    </div>

                                    <div class="form-group" id="cicilan" style="display: none;">
                                        <label for="cicilanInput">Detail Cicilan</label>
                                        <input type="text" class="form-control" id="cicilanInput"
                                            placeholder="Pembayaran Cicilan Dilakukan 12x per Bulan" disabled>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-3">Kirim</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.getElementById("tipe").addEventListener("change", function() {
        const value = this.value;
        const uploadDiv = document.getElementById("uploadFile");
        const cicilanDiv = document.getElementById("cicilan");

        if (value === "cash") {
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