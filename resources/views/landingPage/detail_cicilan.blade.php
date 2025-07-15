@extends('layouts.masterUser')
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight"
    style="background-image: url('{{ asset('ladingPage/images/bg_2.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Pesanan <i
                            class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Cicilan Anda</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="car-details">
                    <div style="display: flex; justify-content: center; margin-top: 0px;">
                        <div class="img rounded"
                            style="background-image: url('{{ Storage::url($produk->foto) }}');
                                    width: 350px;
                                    height: 250px;
                                    background-size: contain;
                                    background-repeat: no-repeat;
                                    background-position: center;">
                        </div>
                    </div>

                    <div class="text text-center">
                        <span class="subheading">{{ $produk->jenis_mobil }}</span>
                        <h2> Daftar Cicilan {{ $produk->nama_mobil }} {{ $produk->tahun }}</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="car-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th class="bg-dark heading">No</th>
                                <th class="bg-dark heading">Cicilan</th>
                                <th class="bg-dark heading">Total Bayar</th>
                                <th class="bg-dark heading">Bukti Pembayaran</th>
                                <th class="bg-dark heading">Tanggal Bayar</th>
                                <th class="bg-dark heading">Status</th>
                                <th class="bg-dark" style="width: 100px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr class="">
                                <td class="price">
                                    <div class="price-rate">
                                        <span class="subheading">{{ $loop->iteration }}</span>
                                    </div>
                                </td>
                                <td class="price">
                                    <div class="price-rate">
                                        <span class="subheading">{{ $item->cicilan }}</span>
                                    </div>
                                </td>
                                <td class="price">
                                    <div class="price-rate">
                                        <span class="subheading">Rp
                                            {{ number_format($item->total_bayar, 0, ',', '.') }}</span></span>
                                    </div>
                                </td>
                                <td class="price">
                                    <div class="price-rate">
                                        <span class="subheading">

                                            @if ($item->bukti_bayar)
                                            <a href="{{ Storage::url($item->bukti_bayar) }}"
                                                class="fw-semibold fs-6 text-primary text-hover-primary"
                                                target="_blank">File</a>
                                            @else
                                            -
                                            @endif
                                    </div>
                                </td>
                                <td class="price">
                                    <div class="price-rate">
                                        <span class="subheading">{{ $item->tanggal_bayar }}</span>
                                    </div>
                                </td>
                                <td class="price">
                                    <div class="price-rate">
                                        <span class="subheading">@php
                                            $statusPembayaranClass = match ($item->status) {
                                            'Pending' => 'warning',
                                            'Lunas' => 'success',
                                            'Ditolak' => 'danger',
                                            default => 'secondary',
                                            };
                                            @endphp
                                            <span class="badge badge-{{ $statusPembayaranClass }} text-white">
                                                {{ ucfirst($item->status) }}
                                            </span>
                                        </span>
                                    </div>
                                </td>
                                <td class="price">
                                    <div class="price-rate">
                                        @if ($pesanan->status_pesanan == 'Selesai')
                                        -
                                        @else
                                        <span class="subheading">
                                            @if ($item->status == 'Ditolak' || empty($item->bukti_bayar))
                                            <a class="btn btn-info btn-sm" href="#"
                                                onclick="pembayaran('{{ $item->id }}')">Bayar</a>
                                            @endif
                                        </span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" id="bayarModal" tabindex="-1" aria-labelledby="bayarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bayarModalLabel">Upload Pembayaran</h5>
            </div>
            <div class="modal-body">
                <form class="form" action="" method="POST" id="formPembayaran" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="">
                    <div class="mb-3">
                        <label for="bukti_tf" class="form-label">Bukti Pembayaran</label>
                        <input type="file" class="form-control" name="bukti_pembayaran" required>
                    </div>
                    <div class="mt-5">
                        <button type="button" class="btn btn-light me-3 btn-sm" data-bs-dismiss="modal">Close</button>
                        <a href="#" onclick="save()" class="btn btn-info btn-sm">
                            Simpan
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    function resetForm() {
        $('#formPembayaran')[0].reset();
    }

    function pembayaran(id) {
        resetForm();
        $('[name="id"]').val(id);
        $('#bayarModal').modal('show');
    }

    function save() {

        const formData = new FormData($('#formPembayaran')[0]);
        const csrfToken = $('meta[name="csrf-token"]').attr('content');
        formData.append('_token', csrfToken);

        $.ajax({
            url: "{{ route('pesanan.pembayaran_cicilan') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function(data) {
                if (data.status) {
                    $('#bayarModal').modal('hide');
                    location.reload();
                } else {
                    Swal.fire({
                        text: data.message,
                        icon: 'warning'
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                swal("Oops", "Data gagal disimpan!", "error");
            }
        });
    }
</script>
@endsection