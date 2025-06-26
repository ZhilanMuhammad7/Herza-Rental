@extends('layouts.masterAdmin')
@section('content')
    <div id="kt_app_content_container" class="app-container container-fluid">

        <div class="row g-5">
            <div class="col-xl-7">
                <div class="card mb-5 mb-xl-12" id="kt_profile_details_view">
                    <div class="card-header cursor-pointer">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Detail Pesanan</h3>
                        </div>
                        <a href="{{ route('pesanan.index') }}" class="btn btn-sm btn-primary align-self-center">Kembali</a>
                    </div>
                    <div class="card-body p-9">
                        <div class="row mb-7">
                            <label class="col-lg-6 fw-semibold text-muted">Nama</label>
                            <div class="col-lg-6">
                                <span class="fw-bold fs-6 text-gray-800">{{ $pesanan->user->nama }}</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-6 fw-semibold text-muted">Produk</label>
                            <div class="col-lg-6 fv-row">
                                <span class="fw-semibold text-gray-800 fs-6">{{ $pesanan->produk->nama_mobil }}</span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-6 fw-semibold text-muted">Jumlah Hari</label>
                            </label>
                            <div class="col-lg-6 d-flex align-items-center">
                                <span class="fw-bold fs-6 text-gray-800 me-2">
                                    {{ $pesanan->jumlah_hari }} Hari</span>
                                </span>
                            </div>
                        </div>
                        <div class="row mb-7">
                            <label class="col-lg-6 fw-semibold text-muted">Tanggal Sewa</label>
                            <div class="col-lg-6">
                                {{ $pesanan->tgl_mulai }} s/d {{ $pesanan->tgl_selesai }}
                            </div>
                        </div>
                        <div class="row mb-10">
                            <label class="col-lg-6 fw-semibold text-muted">Tanggal Pesan</label>
                            <div class="col-lg-6">
                                <span class="fw-semibold fs-6 text-gray-800">{{ $pesanan->tanggal }}</span>
                            </div>
                        </div>
                        <div class="row mb-10">
                            <label class="col-lg-6 fw-semibold text-muted">Total Bayar</label>
                            <div class="col-lg-6">
                                <span class="fw-semibold fs-6 text-gray-800">Rp
                                    {{ number_format($pesanan->total_harga, 0, ',', '.') }}</span>
                            </div>
                        </div>
                        <div class="row mb-10">
                            <label class="col-lg-6 fw-semibold text-muted">Bukti Pembayaran Tunai</label>
                            <div class="col-lg-6">
                                <span class="fw-semibold fs-6 text-gray-800">
                                    @if ($pesanan->jenis_pembayaran == 'cicilan')
                                        Cicilan
                                    @else
                                        @if ($pesanan->bukti_pembayaran_tunai)
                                            <a href="{{ Storage::url($pesanan->bukti_pembayaran_tunai) }}"
                                                class="fw-semibold fs-6 text-primary text-hover-primary"
                                                target="_blank">File</a>
                                        @else
                                            -
                                        @endif
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="row mb-10">
                            <label class="col-lg-6 fw-semibold text-muted">Jenis Pembayaran</label>
                            <div class="col-lg-6">
                                <span class="fw-semibold fs-6 text-gray-800">
                                    {{ ucfirst($pesanan->jenis_pembayaran) }}
                                </span>
                            </div>
                        </div>
                        <div class="row mb-10">
                            <label class="col-lg-6 fw-semibold text-muted">Status Pembayaran</label>
                            <div class="col-lg-6">
                                @php
                                    $statusPembayaranClass = match ($pesanan->status_pembayaran) {
                                        'Pending' => 'warning',
                                        'Lunas' => 'success',
                                        'Ditolak' => 'danger',
                                        default => 'secondary',
                                    };
                                @endphp
                                <span class="badge badge-{{ $statusPembayaranClass }} text-white">
                                    {{ ucfirst($pesanan->status_pembayaran) }}
                                </span>
                            </div>
                        </div>
                        <div class="row mb-10">
                            <label class="col-lg-6 fw-semibold text-muted">Status Pesanan</label>
                            <div class="col-lg-6">
                                @php
                                    $statusPesananClass = match ($pesanan->status_pesanan) {
                                        'Proses' => 'info',
                                        'Selesai' => 'success',
                                        'Diterima' => 'success',
                                        'Ditolak' => 'danger',
                                        default => 'secondary',
                                    };
                                @endphp
                                <span class="badge badge-{{ $statusPesananClass }} text-white">
                                    {{ ucfirst($pesanan->status_pesanan) }}
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="card mb-5 mb-xl-12" id="kt_profile_details_view">
                    <div class="card-header cursor-pointer">
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Verifikasi Status</h3>
                        </div>
                    </div>
                    <div class="card-body p-9">
                        <div class="row mb-7">
                            <label class="col-lg-4 fw-semibold text-muted">Status Pesanan</label>
                            <div class="col-lg-8">
                                @if ($pesanan->status_pesanan == 'Selesai')
                                    -
                                @else
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-light dropdown-toggle" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            Verifikasi
                                        </button>
                                        <ul class="dropdown-menu">
                                            @if ($pesanan->jenis_pembayaran == 'cicilan' && $pesanan->status_pesanan != 'Diterima')
                                                <li><a class="dropdown-item btn-verifikasi" data-id="{{ $pesanan->id }}"
                                                        data-status="Diterima" data-verifikasi="status_pesanan"
                                                        data-model="Pesanan">Diterima</a></li>
                                            @elseif($pesanan->jenis_pembayaran == 'cicilan' && $pesanan->status_pesanan == 'Diterima')
                                                <li><a class="dropdown-item btn-verifikasi" data-id="{{ $pesanan->id }}"
                                                        data-status="Selesai" data-verifikasi="status_pesanan"
                                                        data-model="Pesanan">Selesai</a>
                                                </li>
                                            @else
                                                <li><a class="dropdown-item btn-verifikasi" data-id="{{ $pesanan->id }}"
                                                        data-status="Selesai" data-verifikasi="status_pesanan"
                                                        data-model="Pesanan">Selesai</a>
                                                </li>
                                            @endif
                                            <li><a class="dropdown-item btn-verifikasi" data-id="{{ $pesanan->id }}"
                                                    data-status="Ditolak" data-verifikasi="status_pesanan"
                                                    data-model="Pesanan">Ditolak</a>
                                            </li>
                                        </ul>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if ($pesanan->jenis_pembayaran == 'cicilan')
            <div class="card mb-5 mb-xl-8">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold fs-3 mb-1">Detail Cicilan</span>
                    </h3>
                </div>
                <div class="card-body py-3">
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table class="table table-striped gy-7 gs-7">
                                <thead>
                                    <tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
                                        <th>No</th>
                                        <th>Cicilan</th>
                                        <th>Total Bayar</th>
                                        <th>Bukti Pembayaran</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cicilan as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}
                                            </td>
                                            <td>
                                                {{ $item->cicilan }}
                                            </td>
                                            <td>
                                                {{ isset($item->total_bayar) ? 'Rp ' . number_format($item->total_bayar, 0, ',', '.') : 'Rp 0' }}
                                            </td>
                                            <td>
                                                @if ($item->bukti_bayar)
                                                    <a href="{{ Storage::url($item->bukti_bayar) }}"
                                                        class="fw-semibold fs-6 text-primary text-hover-primary"
                                                        target="_blank">File</a>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                {{ $item->tanggal_bayar ?? '-' }}
                                            </td>
                                            <td>
                                                @if ($item->status == 'Pending')
                                                    <span class="badge badge-warning">Pending</span>
                                                @elseif($item->status == 'Lunas')
                                                    <span class="badge badge-success">Lunas</span>
                                                @else
                                                    <span class="badge badge-danger">Ditolak</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($pesanan->status_pesanan == 'Selesai')
                                                    -
                                                @else
                                                    <div class="dropdown">
                                                        <button class="btn btn-sm btn-light dropdown-toggle"
                                                            type="button" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            Verifikasi
                                                        </button>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item btn-verifikasi"
                                                                    data-id="{{ $item->id }}" data-status="Lunas"
                                                                    data-verifikasi="status"
                                                                    data-model="Cicilan">Lunas</a>
                                                            </li>
                                                            <li><a class="dropdown-item btn-verifikasi"
                                                                    data-id="{{ $item->id }}" data-status="Ditolak"
                                                                    data-verifikasi="status"
                                                                    data-model="Cicilan">Ditolak</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="modal fade" id="modalVerifikasi" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content rounded">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                </div>
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <form class="form" action="" method="POST" id="formVerifikasi"
                        enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{ $pesanan->id }}">
                        <input type="hidden" name="verifikasi" value="status_pesanan">
                        <input type="hidden" name="status" value="Ditolak">
                        <input type="hidden" name="model" value="Pesanan">
                        <div class="mb-13 text-center">
                            <h1 class="mb-3">Verifikasi</h1>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Catatan</span>
                            </label>
                            <textarea name="catatan" placeholder="Catatan" autocomplete="off" class="form-control bg-transparent"></textarea>
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Close</button>
                            <a href="#" onclick="verifikasi()" class="btn btn-primary ">
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
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            // Status Progres
            $(document).on('click', '.btn-verifikasi', function() {
                data = $(this).data()
                if (data.status === 'Ditolak') {
                    $('#modalVerifikasi').modal('show');
                } else {
                    $.ajax({
                        type: "post",
                        url: "{{ url('verifikasi-status') }}",
                        data: data,
                        dataType: "json",
                        success: function(response) {
                            Swal.fire({
                                text: "Data Berhasil Disimpan",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "OK",
                                customClass: {
                                    confirmButton: "btn btn-primary"
                                }
                            }).then(function() {
                                location.reload();
                            });
                        }
                    });
                }
            });
        });

        function verifikasi() {

            const formData = new FormData($('#formVerifikasi')[0]);
            const csrfToken = $('meta[name="csrf-token"]').attr('content');
            formData.append('_token', csrfToken);

            $.ajax({
                url: "{{ url('verifikasi-status') }}",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(response) {
                    Swal.fire({
                        text: "Data Berhasil Disimpan",
                        icon: "success",
                        buttonsStyling: false,
                        confirmButtonText: "OK",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    }).then(function() {
                        location.reload();
                    });
                }
            });
        }
    </script>
@endsection
