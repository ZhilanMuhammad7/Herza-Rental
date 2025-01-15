@extends('layouts.masterAdmin')
@section('content')
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="card mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Data Pesanan</span>
                </h3>
                <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
                    title="Klik untuk tambah produk">
                    <button type="button" class="btn btn-primary er fs-6 px-4 py-2" onclick="add_ajax()">
                        <i class="ki-outline ki-plus fs-2"></i> Tambah Pesanan
                    </button>
                </div>
            </div>
            <div class="card-body py-3">
                <div class="table-responsive">
                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                        <thead>
                            <tr class="fw-bold text-muted">
                                <th>No</th>
                                <th>Nama</th>
                                <th>No Hp</th>
                                <th>Mobil</th>
                                <th>Tanggal Mulai</th>
                                <th>Tanggal Selesai</th>
                                <th>Jumlah</th>
                                <th>Total Harga</th>
                                <th>Via</th>
                                <th>Status</th>
                                <th>Status Pesanan</th>
                                <th>Status Pembayaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($data->isEmpty())
                                <tr>
                                    <td colspan="13" class="text-center text-muted">No record found</td>
                                </tr>
                            @else
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $loop->iteration + ($data->currentPage() - 1) * $data->perPage() }}</td>
                                        <td>{{ $item->nama }}</td>
                                        <td>{{ $item->no_hp }}</td>
                                        <td>{{ $item->nama_mobil }}</td>
                                        <td>{{ $item->tgl_mulai }}</td>
                                        <td>{{ $item->tgl_selesai }}</td>
                                        <td>{{ $item->jumlah }}</td>
                                        <td>Rp {{ number_format($item->total_harga, 0, ',', '.') }}</td>
                                        <td>{{ $item->via }}</td>
                                        <td>
                                            @if ($item->status == 'Proses')
                                                <span
                                                    class="badge badge-light-info flex-shrink-0 align-self-center py-3 px-4 fs-7">{{ $item->status }}</span>
                                            @else
                                                <span
                                                    class="badge badge-light-success flex-shrink-0 align-self-center py-3 px-4 fs-7">{{ $item->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->status_pesanan == 'Pending')
                                                <span
                                                    class="badge badge-light-warning flex-shrink-0 align-self-center py-3 px-4 fs-7">{{ $item->status_pesanan }}</span>
                                            @else
                                                <span
                                                    class="badge badge-light-success flex-shrink-0 align-self-center py-3 px-4 fs-7">{{ $item->status_pesanan }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->status_pembayaran == 'Pending')
                                                <span
                                                    class="badge badge-light-warning flex-shrink-0 align-self-center py-3 px-4 fs-7">{{ $item->status_pembayaran }}</span>
                                            @else
                                                <span
                                                    class="badge badge-light-success flex-shrink-0 align-self-center py-3 px-4 fs-7">{{ $item->status_pembayaran }}</span>
                                            @endif
                                        </td>
                                        <td><a href="javascript:void(0)" onclick="edit('{{ $item->id }}')"><i
                                                    class="fa fa-edit text-info"></i></a>
                                            <a href="javascript:void(0)" onclick="hapus('{{ $item->id }}')"
                                                style="color: red;"><i class="fas fa-trash text-danger"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    <div class="d-flex justify-content-start">
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--begin::Modal - New Target-->
    <div class="modal fade" id="m_modal_6" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <div class="modal-content rounded">
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                </div>
                <div class="modal-body scroll-y px-10 px-lg-15 pt-0 pb-15">
                    <form class="form" action="" method="POST" id="formAdd" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="">
                        <div class="mb-13 text-center">
                            <h1 class="mb-3" id="m_modal_6_title">Data Pesanan</h1>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">Pelanggan</label>
                            <select name="user_id" class="form-control bg-transparent" required>
                                <option value="">Pilih Pelanggan</option>
                                @foreach ($user as $value)
                                    <option value="{{ $value->id }}">{{ $value->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">Mobil</label>
                            <select name="produk_id" class="form-control bg-transparent" required>
                                <option value="">Pilih Mobil</option>
                                @foreach ($produk as $value)
                                    <option value="{{ $value->id }}">{{ $value->nama_mobil }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Tanggal Mulai</span>
                            </label>
                            <input type="date" class="form-control bg-transparent"
                                placeholder="Masukkan Tanggal Mulai" name="tgl_mulai" />
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Tanggal Selesai</span>
                            </label>
                            <input type="date" class="form-control bg-transparent"
                                placeholder="Masukkan Tanggal Selesai" name="tgl_selesai" />
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Jumlah</span>
                            </label>
                            <input type="number" class="form-control bg-transparent" placeholder="Masukkan Jumlah"
                                name="jumlah" />
                        </div>
                        <div class="text-center">
                            <button type="button" class="btn btn-light me-3" data-bs-dismiss="modal">Close</button>
                            <a href="#" onclick="save()" class="btn btn-primary ">
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
            $('#m_form_1_msg').hide();
            $('#formAdd')[0].reset();
        }

        function add_ajax() {
            method = 'add';
            resetForm();
            $('#m_modal_6_title').html("Tambah User");
            $('#m_form_1_msg').hide();
            $('#m_modal_6').modal('show');
        }

        function save() {
            let url;

            if (method === 'add') {
                url = "{{ route('pesanan.store') }}";
            } else {
                url = "{{ route('pesanan.update') }}";
            }

            const formData = new FormData($('#formAdd')[0]);
            const csrfToken = $('meta[name="csrf-token"]').attr('content');
            formData.append('_token', csrfToken);

            $.ajax({
                url: url,
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                dataType: "json",
                success: function(data) {
                    if (data.status) {
                        $('#m_modal_6').modal('hide');
                        Swal.fire({
                            title: 'Berhasil..',
                            text: 'Data Anda berhasil disimpan',
                            icon: 'success'
                        }).then(function() {
                            location.reload();
                        });
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

        function edit(id) {
            method = 'edit';
            resetForm();
            $('#m_modal_6_title').html("Edit Pesanan");

            $.ajax({
                url: "{{ url('pesanan/edit') }}/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    if (data.data) {
                        $('#formAdd')[0].reset();
                        $('[name="id"]').val(data.data.id);
                        $('[name="user_id"]').val(data.data.user_id).change();
                        $('[name="produk_id"]').val(data.data.produk_id).change();
                        $('[name="tgl_mulai"]').val(data.data.tgl_mulai);
                        $('[name="tgl_selesai"]').val(data.data.tgl_selesai);
                        $('[name="jumlah"]').val(data.data.jumlah);
                        $('#m_modal_6').modal('show');
                    } else {
                        Swal.fire("Oops", "Gagal mengambil data!", "error");
                    }
                    mApp.unblockPage();
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    mApp.unblockPage();
                    Swal.fire("Error", "Gagal mengambil data dari server!", "error");
                }
            });
        }

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
    </script>
@endsection
