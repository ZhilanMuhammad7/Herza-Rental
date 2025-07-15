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
                    <div style="display: flex; justify-content: center; margin-top: 20px; position: relative;">
                        <div class="img rounded"
                            style="background-image: url('{{ Storage::url($produk->foto) }}');
                            width: 450px;
                            height: 350px;
                            background-size: contain;
                            background-repeat: no-repeat;
                            background-position: center;">
                        </div>
                    </div>
                    {{-- Badge Status Mobil --}}
                    <span class="badge position-absolute top-0 start-0 m-2 
                            @if ($produk->status == 'Tersedia')
                                bg-success text-white
                            @elseif ($produk->status == 'Disewa')
                                bg-warning text-white
                            @elseif ($produk->status == 'Maintenance')
                                bg-danger text-white
                            @else
                                bg-secondary
                            @endif">
                        {{ $produk->status }}
                    </span>
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
                                @if ($produk->status == 'Tersedia')
                                <h3 class="head mb-4">Formulir Pemesanan</h3>
                                <form class="form" action="{{ route('pesanan.store') }}" method="POST" id="formPesan" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="produk_id" value="{{ $produk->id }}">

                                    <div class="form-group mb-3">
                                        <label for="nama" class="form-label">Nama</label>
                                        <input type="text" class="form-control" id="nama" value="{{ Auth::user()->nama }}" disabled>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="jumlah_hari" class="form-label">Jumlah Hari</label>
                                        <input type="number" class="form-control" name="jumlah_hari" placeholder="Jumlah Hari" min="1" required>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="tgl_mulai" class="form-label">Tanggal Mulai</label>
                                        <input type="date" class="form-control" id="tgl_mulai" name="tgl_mulai" required min="{{ date('Y-m-d') }}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="jam_pengambilan" class="form-label">Jam Pengambilan</label>
                                        <input type="time" class="form-control" name="jam_pengambilan" placeholder="Masukkan jam pengambilan">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="jam_pengambilan" class="form-label">Tujuan Rental</label>
                                        <input type="text" class="form-control" name="tujuan_rental" placeholder="Masukkan Tujuan Rental">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="tipe" class="form-label">Pilih Jenis Pembayaran</label>
                                        <select class="form-control" id="tipe" name="jenis_pembayaran">
                                            <option value="">Pilih Pembayaran</option>
                                            <option value="Via Midtrans">Via Midtrans</option>
                                            <option value="cicilan">Cicilan</option>
                                        </select>
                                    </div>

                                    <!-- <div class="form-group mb-3" id="uploadFile" style="display: none;">
                                        <label for="bukti" class="form-label">Upload Bukti Pembayaran</label>
                                        <input type="file" class="form-control" id="bukti" name="bukti_pembayaran">
                                    </div> -->

                                    <div id="norek" style="display: none;" class="alert alert-warning mb-3">
                                        <p class="fw-bold mb-1">Terima kasih atas pesanan Anda</p>
                                        <p class="mb-2">Untuk melanjutkan, silakan transfer ke rekening berikut:</p>
                                        <ul class="mb-0 ps-3">
                                            <li><strong>Bank:</strong> BCA</li>
                                            <li><strong>No. Rekening:</strong> 2201182524</li>
                                            <li><strong>Atas Nama:</strong> Alif Alprega</li>
                                        </ul>
                                    </div>

                                    <div class="form-group mb-3" id="cicilan" style="display: none;">
                                        <label class="form-label">Cicilan akan dibayarkan dalam 2 tahap, berdasarkan total harga produk ditambah durasi sewa mobil (jumlah hari).</label>
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-3">Buat Pesanan</button>
                                </form>
                                @else
                                <div class="alert alert-warning text-center mt-4" role="alert">
                                    Mobil ini saat ini <strong>{{ strtolower($produk->status) }}</strong> dan tidak dapat dipesan.
                                </div>
                                @endif
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
    // const uploadDiv = document.getElementById("uploadFile");
    const cicilanDiv = document.getElementById("cicilan");
    const norekDiv = document.getElementById("norek");

    tipeSelect.disabled = true;

    jumlahHariInput.addEventListener("input", function() {
        const jumlahHari = parseInt(this.value);

        if (!isNaN(jumlahHari) && jumlahHari >= 1) {
            tipeSelect.disabled = false;

            tipeSelect.innerHTML = '<option value="">Pilih Pembayaran</option>';
            tipeSelect.innerHTML += '<option value="Via Midtrans">Via Midtrans</option>';

            if (jumlahHari >= 7) {
                tipeSelect.innerHTML += '<option value="cicilan">Cicilan</option>';
            }

        } else {
            tipeSelect.disabled = true;
            tipeSelect.value = "";
            // uploadDiv.style.display = "none";
            cicilanDiv.style.display = "none";
            norekDiv.style.display = "none";
        }
    });

    tipeSelect.addEventListener("change", function() {
        const value = this.value;

        if (value === "Via Midtrans") {
            // uploadDiv.style.display = "block";
            cicilanDiv.style.display = "none";
            norekDiv.style.display = "none";
        } else if (value === "cicilan") {
            // uploadDiv.style.display = "none";
            cicilanDiv.style.display = "block";
            norekDiv.style.display = "block";
        } else {
            // uploadDiv.style.display = "none";
            cicilanDiv.style.display = "none";
            norekDiv.style.display = "block";
        }
    });
</script>

<script>
    document.getElementById('formPesan').addEventListener('submit', function(e) {
        // Ambil semua input wajib
        const jumlahHari = document.querySelector('input[name="jumlah_hari"]');
        const tglMulai = document.querySelector('input[name="tgl_mulai"]');
        const jamAmbil = document.querySelector('input[name="jam_pengambilan"]');
        const jenisBayar = document.querySelector('select[name="jenis_pembayaran"]');
        const tujuanRental = document.querySelector('select[name="tujuan_rental"]');
        const bukti = document.querySelector('input[name="bukti_pembayaran"]');

        let isValid = true;
        let message = "";

        if (!jumlahHari.value.trim()) {
            isValid = false;
            message += "- Jumlah Hari belum diisi\n";
        }

        if (!tglMulai.value.trim()) {
            isValid = false;
            message += "- Tanggal Mulai belum diisi\n";
        }

        if (!jamAmbil.value.trim()) {
            isValid = false;
            message += "- Jam Pengambilan belum diisi\n";
        }

        if (!jenisBayar.value.trim()) {
            isValid = false;
            message += "- Jenis Pembayaran belum dipilih\n";
        }

        if (!tujuanRental.value.trim()) {
            isValid = false;
            message += "- Tujuan Rental belum diisi\n";
        }

        // Jika pembayaran cicilan/tunai, tapi bukti pembayaran belum diupload
        if ((jenisBayar.value === "Via Midtrans") && !bukti.value.trim()) {
            isValid = false;
            message += "- Bukti Pembayaran belum diupload\n";
        }

        if (!isValid) {
            e.preventDefault(); // Hentikan pengiriman form
            alert("Harap lengkapi data berikut:\n\n" + message); // Tampilkan popup alert
        }
    });
</script>

@endsection