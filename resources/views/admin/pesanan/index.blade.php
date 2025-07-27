@extends('layouts.masterAdmin')
@section('content')
<div id="kt_app_content_container" class="app-container container-fluid">
    <div class="card mb-5 mb-xl-8">
        <div class="card-header border-0 pt-5">
            <h3 class="card-title align-items-start flex-column">
                <span class="card-label fw-bold fs-3 mb-1">Manage Pesanan</span>
                <span class="text-muted mt-1 fw-semibold fs-7">Pesanan</span>
            </h3>
            <div class="card-toolbar">
                <a href="#" class="btn btn-sm btn-primary" onclick="exportExcel()">
                    <i class="fas fa-file-export fs-2"></i>
                    Export</a>
            </div>
        </div>
        <div class="card-body py-3">
            <div class="table-responsive">
                <table class="table align-middle gs-0 gy-4">
                    <thead>
                        <tr class="fw-bold text-muted bg-light">
                            <th class="ps-4 rounded-start">No</th>
                            <th>Nama</th>
                            <th>Produk</th>
                            <th>Jumlah Hari</th>
                            <th>Total Bayar</th>
                            <th>Jenis Pembayaran</th>
                            <th>Tanggal</th>
                            <th>Bukti Pembayaran</th>
                            <th>Status Pembayaran</th>
                            <th>Status Pesanan</th>
                            <th class="rounded-end"> Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $item)
                        <tr>
                            <td class="ps-4">
                                {{ $loop->iteration + ($data->currentPage() - 1) * $data->perPage() }}
                            </td>
                            <td>{{ $item->user->nama }}</td>
                            <td>{{ $item->produk->nama_mobil }}</td>
                            <td>{{ $item->jumlah_hari }}</td>
                            <td>{{ number_format($item->total_harga, 0, ',', '.') }}</span></td>
                            <td>{{ ucfirst($item->jenis_pembayaran) }}</td>
                            <td>{{ $item->tanggal }}</td>
                            <td>
                                @if ($item->jenis_pembayaran == 'cicilan')
                                Cicilan
                                @else
                                @if ($item->bukti_pembayaran_tunai)
                                <a href="https://dashboard.sandbox.midtrans.com/beta/transactions"
                                    class="fw-semibold fs-6 text-primary text-hover-primary"
                                    target="_blank">Link</a>
                                @else
                                <span class="text-muted">-</span>
                                @endif
                                @endif
                            </td>
                            <td>
                                @if ($item->status_pembayaran == 'Pending')
                                <span class="badge badge-warning">Pending</span>
                                @elseif($item->status_pembayaran == 'Lunas')
                                <span class="badge badge-success">Lunas</span>
                                @else
                                <span class="badge badge-danger">Ditolak</span>
                                @endif
                            </td>
                            <td>
                                @if ($item->status_pesanan == 'Proses')
                                <span class="badge badge-info">Proses</span>
                                @elseif($item->status_pesanan == 'Selesai')
                                <span class="badge badge-success">Selesai</span>
                                @elseif($item->status_pesanan == 'Diterima')
                                <span class="badge badge-success">Diterima</span>
                                @else
                                <span class="badge badge-danger">Ditolak</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ url('pesanan/show/' . Crypt::encryptString($item->id)) }}"
                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm me-1">
                                    <i class="ki-outline ki-information fs-2 text-primary"></i>
                                </a>
                                <a href="javascript:void(0)" onclick="hapus('{{ $item->id }}')"
                                    class="btn btn-icon btn-bg-light btn-active-color-primary btn-sm">
                                    <i class="ki-outline ki-trash fs-2 text-danger"></i>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-start">
                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script type="text/javascript">
    function hapus(id) {
        Swal.fire({
            title: "Apakah anda yakin?",
            text: "Anda yakin ingin hapus data ini?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "<span><i class='flaticon-interface-1'></i><span>Ya, Hapus!</span></span>",
            confirmButtonClass: "btn btn-danger m-btn m-btn--pill m-btn--icon",
            cancelButtonText: "<span><i class='flaticon-close'></i><span>Batal Hapus</span></span>",
            cancelButtonClass: "btn btn-metal m-btn m-btn--pill m-btn--icon",
            customClass: {
                confirmButton: 'btn btn-danger m-btn m-btn--pill m-btn--icon',
                cancelButton: 'btn btn-metal m-btn m-btn--pill m-btn--icon'
            }
        }).then(function(result) {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ url('pesanan') }}/" + id,
                    type: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: "JSON",
                    success: function(data) {
                        if (data.status === true) {
                            Swal.fire({
                                title: "Berhasil..",
                                text: "Data Anda berhasil dihapus",
                                icon: "success"
                            }).then(function() {
                                location.reload();
                            });
                        } else {
                            Swal.fire("Oops", "Data gagal dihapus!", "error");
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        Swal.fire("Oops", "Data gagal dihapus!", "error");
                    }
                });
            }
        });
    }

    function exportExcel() {
        $.ajax({
            url: "{{ route('pesanan.exportlaporan') }}",
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            xhrFields: {
                responseType: 'blob'
            },
            success: function(data, status, xhr) {
                const filename = xhr.getResponseHeader('Content-Disposition').split('filename=')[1].replace(
                    /"/g, '');
                const link = document.createElement('a');
                link.href = window.URL.createObjectURL(data);
                link.download = filename;
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                swal("Oops", "Data gagal disimpan!", "error");
            }
        });
    }
</script>
@endsection
