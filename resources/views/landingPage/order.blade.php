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
                    <h1 class="mb-3 bread">Pesanan Anda</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            @guest
                <div class="alert alert-warning text-center mt-4" role="alert">
                    Silakan <a href="{{ route('login') }}">login</a> terlebih dahulu untuk melihat daftar
                    <strong>Pesanan</strong> Anda. Jika belum memiliki akun, silakan <a
                        href="{{ route('register') }}">daftar</a> terlebih dahulu untuk membuat akun dan melakukan pemesanan
                </div>
            @endguest

            @auth
                <div class="row justify-content-center mb-4">
                    <div class="col-md-10 text-center">
                        <h2 class="mb-4">Daftar Pesanan</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="ftco-animate">
                        <div class="car-list">
                            <table class="table">
                                <thead class="thead-primary">
                                    <tr class="text-center">
                                        <th class="bg-dark heading">No</th>
                                        <th class="bg-dark heading">Produk</th>
                                        <th class="bg-dark heading">Jumlah Hari</th>
                                        <th class="bg-dark heading">Total Bayar</th>
                                        <th class="bg-dark heading">Jenis Pembayaran</th>
                                        <th class="bg-dark heading">Tanggal</th>
                                        <th class="bg-dark heading">Bukti Pembayaran</th>
                                        <th class="bg-dark heading">Status Pembayaran</th>
                                        <th class="bg-dark heading">Status Pesanan</th>
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
                                                    <span class="subheading">{{ $item->produk->nama_mobil }}</span>
                                                </div>
                                            </td>
                                            <td class="price">
                                                <div class="price-rate">
                                                    <span class="subheading">{{ $item->jumlah_hari }}</span>
                                                </div>
                                            </td>
                                            <td class="price">
                                                <div class="price-rate">
                                                    <span class="subheading">Rp
                                                        {{ number_format($item->total_harga, 0, ',', '.') }}</span>
                                                </div>
                                            </td>
                                            <td class="price">
                                                <div class="price-rate">
                                                    <span class="subheading">{{ ucfirst($item->jenis_pembayaran) }}</span>
                                                </div>
                                            </td>
                                            <td class="price">
                                                <div class="price-rate">
                                                    <span class="subheading">{{ $item->tanggal }}</span>
                                                </div>
                                            </td>
                                            <td class="price">
                                                <div class="price-rate">
                                                    <span class="subheading">
                                                        @if ($item->jenis_pembayaran == 'cicilan')
                                                            Cicilan
                                                        @else
                                                            @if ($item->bukti_pembayaran_tunai)
                                                                <a href="{{ Storage::url($item->bukti_pembayaran_tunai) }}"
                                                                    class="fw-semibold fs-6 text-primary text-hover-primary"
                                                                    target="_blank">File</a>
                                                            @else
                                                                -
                                                            @endif
                                                        @endif
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="price">
                                                <div class="price-rate">
                                                    <span class="subheading">@php
                                                        $statusPembayaranClass = match ($item->status_pembayaran) {
                                                            'Pending' => 'warning',
                                                            'Lunas' => 'success',
                                                            'Ditolak' => 'danger',
                                                            default => 'secondary',
                                                        };
                                                    @endphp
                                                        <span class="badge badge-{{ $statusPembayaranClass }} text-white">
                                                            {{ ucfirst($item->status_pembayaran) }}
                                                        </span>
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="price">
                                                <div class="price-rate">
                                                    <span class="subheading">
                                                        @php
                                                            $statusPesananClass = match ($item->status_pesanan) {
                                                                'Proses' => 'info',
                                                                'Selesai' => 'success',
                                                                'Ditolak' => 'danger',
                                                                default => 'secondary',
                                                            };
                                                        @endphp
                                                        <span class="badge badge-{{ $statusPesananClass }} text-white">
                                                            {{ ucfirst($item->status_pesanan) }}
                                                        </span>
                                                    </span>
                                                </div>
                                            </td>
                                            <td class="price">
                                                <div class="price-rate">
                                                    <span class="subheading">
                                                        @if (
                                                            $item->jenis_pembayaran == 'tunai' &&
                                                                (empty($item->bukti_pembayaran_tunai) ||
                                                                    (!empty($item->bukti_pembayaran_tunai) && $item->status_pembayaran == 'Ditolak')) &&
                                                                $item->status_pembayaran != 'Lunas')
                                                            <a class="btn btn-info btn-sm" href="#"
                                                                onclick="pembayaran('{{ $item->id }}')">Bayar</a>
                                                        @endif
                                                        @if ($item->jenis_pembayaran == 'cicilan' && $item->status_pesanan != 'Ditolak')
                                                            <a class="btn btn-primary btn-sm"
                                                                href="{{ url('detail_cicilan/' . Crypt::encryptString($item->id)) }}">Detail</a>
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
        @endauth
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
                            <button type="button" class="btn btn-light me-3 btn-sm"
                                data-bs-dismiss="modal">Close</button>
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
                url: "{{ route('pesanan.bukti_pembayaran') }}",
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
