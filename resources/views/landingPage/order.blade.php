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
                <div class="row justify-content-center">
                    <div class="col-md-10 ftco-animate">
                        <div class="car-list shadow-sm rounded bg-white p-3">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover w-100">
                                    <thead class="thead-primary">
                                        <tr class="text-center">
                                            <th class="bg-dark heading">No</th>
                                            <th class="bg-dark heading">Produk</th>
                                            <th class="bg-dark heading">Jumlah Hari</th>
                                            <th class="bg-dark heading">Bukti Pembayaran</th>
                                            <th class="bg-dark heading">Status Pembayaran</th>
                                            <th class="bg-dark heading">Status Pesanan</th>
                                            <th class="bg-dark heading">Keterangan</th>
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
                                                        <span class="subheading">{{ $item->jumlah_hari }} Hari</span>
                                                    </div>
                                                </td>
                                                <td class="price">
                                                    <div class="price-rate">
                                                        <span class="subheading">
                                                            @if ($item->jenis_pembayaran == 'cicilan')
                                                                Cicilan
                                                            @elseif ($item->jenis_pembayaran == 'Via Midtrans')
                                                                @if ($item->bukti_pembayaran_tunai)
                                                                    {{ $item->bukti_pembayaran_tunai }}
                                                                @else
                                                                    Tunai (belum upload bukti)
                                                                @endif
                                                            @else
                                                                -
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
                                                                    'Diterima' => 'success',
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
                                                            @if ($item->catatan)
                                                                {{ $item->catatan }}
                                                            @else
                                                                -
                                                            @endif
                                                        </span>
                                                    </div>
                                                </td>
                                                <td class="price">
                                                    <div class="price-rate">
                                                        <span class="subheading">
                                                            @if (
                                                                $item->jenis_pembayaran == 'Via Midtrans' &&
                                                                    (empty($item->bukti_pembayaran_tunai) ||
                                                                        (!empty($item->bukti_pembayaran_tunai) && $item->status_pembayaran == 'Ditolak')) &&
                                                                    $item->status_pembayaran != 'Lunas')
                                                                <!-- Tombol Bayar dengan ikon -->
                                                                <a class="btn btn-info btn-sm" href="#"
                                                                    onclick="pembayaran('{{ $item->id }}')" title="Bayar">
                                                                    <i class="fas fa-credit-card"></i>
                                                                </a>
                                                            @endif

                                                            @if ($item->jenis_pembayaran == 'cicilan' && ($item->status_pesanan == 'Diterima' || $item->status_pesanan == 'Selesai'))
                                                                <!-- Tombol Detail Cicilan dengan ikon -->
                                                                <a class="btn btn-primary btn-sm"
                                                                    href="{{ url('detail_cicilan/' . Crypt::encryptString($item->id)) }}"
                                                                    title="Detail Cicilan">
                                                                    <i class="fas fa-file-invoice-dollar"></i>
                                                                </a>
                                                            @endif

                                                            <!-- Tombol Detail Pesanan (Modal) dengan ikon -->
                                                            <button type="button" class="btn btn-secondary btn-sm"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#modalDetailPesanan{{ $item->id }}"
                                                                title="Detail Pesanan">
                                                                <i class="fas fa-info-circle"></i>
                                                            </button>
                                                        </span>
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

    <!-- Modal Detail Pesanan -->
    @foreach ($data as $item)
        <!-- ✅ Modal diletakkan di dalam loop -->
        <div class="modal fade" id="modalDetailPesanan{{ $item->id }}" tabindex="-1"
            aria-labelledby="modalLabel{{ $item->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content shadow-lg rounded-4">
                    <div class="modal-header bg-white text-dark rounded-top">
                        <h5 class="modal-title" id="modalLabel{{ $item->id }}">
                            <i class="fas fa-info-circle me-2"></i> Detail Pesanan
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Tutup"></button>
                    </div>
                    <div class="modal-body p-4">
                        <form>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Produk</label>
                                    <input type="text" class="form-control"
                                        value="{{ $item->produk->nama_mobil ?? '-' }}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Jumlah Hari</label>
                                    <input type="text" class="form-control" value="{{ $item->jumlah_hari }} Hari"
                                        disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Total Bayar</label>
                                    <input type="text" class="form-control"
                                        value="Rp {{ number_format($item->total_harga, 0, ',', '.') }}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Jenis Pembayaran</label>
                                    <input type="text" class="form-control"
                                        value="{{ ucfirst($item->jenis_pembayaran) }}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Tanggal</label>
                                    <input type="text" class="form-control" value="{{ $item->tanggal }}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Jam Pengambilan</label>
                                    <input type="text" class="form-control"
                                        value="{{ $item->jam_pengambilan ?? '-' }}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Tujuan Rental</label>
                                    <textarea class="form-control" rows="2" disabled>{{ $item->tujuan_rental ?? '-' }}</textarea>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Bukti Pembayaran</label>
                                    @php
                                        $bukti = '-';
                                        if ($item->jenis_pembayaran == 'cicilan') {
                                            $bukti = 'Cicilan';
                                        } elseif ($item->jenis_pembayaran == 'Via Midtrans') {
                                            $bukti = $item->bukti_pembayaran_tunai ?? 'Tunai (belum upload bukti)';
                                        }
                                    @endphp
                                    <input type="text" class="form-control text-end" value="{{ $bukti }}"
                                        disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Status Pembayaran</label>
                                    <input type="text"
                                        class="form-control bg-{{ match ($item->status_pembayaran) {
                                            'Pending' => 'warning',
                                            'Lunas' => 'success',
                                            'Ditolak' => 'danger',
                                            default => 'secondary',
                                        } }} text-white"
                                        value="{{ ucfirst($item->status_pembayaran) }}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Status Pesanan</label>
                                    <input type="text"
                                        class="form-control bg-{{ match ($item->status_pesanan) {
                                            'Proses' => 'info',
                                            'Selesai', 'Diterima' => 'success',
                                            'Ditolak' => 'danger',
                                            default => 'secondary',
                                        } }} text-white"
                                        value="{{ ucfirst($item->status_pesanan) }}" disabled>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer bg-light border-0">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">
                            <i class="fas fa-times me-1"></i> Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    @push('css')
        <!-- <style>
            .table th,
            .table td {
                vertical-align: middle !important;
                white-space: nowrap;
                text-align: center;
            }

            .fixed-table-layout {
                table-layout: fixed;
                width: 100%;
                word-wrap: break-word;
            }

            .table-responsive {
                overflow-x: auto;
            }

            @media (max-width: 768px) {

                .table th,
                .table td {
                    font-size: 12px !important;
                }

                .table thead {
                    font-size: 13px;
                }
            }

            .badge {
                font-size: 0.75rem;
                padding: 0.4em 0.6em;
                border-radius: 0.4rem;
            }

            .car-list {
                background-color: #fff;
                border-radius: 0.5rem;
                padding: 1rem;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.05);
            }
        </style> -->
    @endpush
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
