@extends('layouts.masterAdmin')
@section('content')
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="card mb-5 mb-xl-8">
            <!--begin::Header-->
            <div class="card-header border-0 pt-5">
                <h3 class="card-title align-items-start flex-column">
                    <span class="card-label fw-bold fs-3 mb-1">Data Produk</span>
                </h3>
                <div class="card-toolbar" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-trigger="hover"
                    title="Klik untuk tambah produk">
                    <button type="button" class="btn btn-primary er fs-6 px-4 py-2" onclick="add_ajax()">
                        <i class="ki-outline ki-plus fs-2"></i> Tambah Produk
                    </button>
                </div>
            </div>
            <div class="card-body py-3">
                <div class="table-responsive">
                    <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                        <thead>
                            <tr class="fw-bold text-muted">
                                <th>No</th>
                                <th>Nama Mobil</th>
                                <th>Jenis Mobil</th>
                                <th>Tahun</th>
                                <th>Nomor Plat</th>
                                <th>Kapasitas</th>
                                <th>Harga Sewa</th>
                                <th>Status</th>
                                <th>Kondisi</th>
                                <th>Bahan Bakar</th>
                                <th>Jarak Tempuh</th>
                                <th>Foto</th>
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
                                        <td>{{ $item->nama_mobil }}</td>
                                        <td>{{ $item->jenis_mobil }}</td>
                                        <td>{{ $item->tahun }}</td>
                                        <td>{{ $item->nomor_plat }}</td>
                                        <td>{{ $item->kapasitas }}</td>
                                        <td>{{ $item->harga_sewa }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->kondisi }}</td>
                                        <td>{{ $item->bahan_bakar }}</td>
                                        <td>{{ $item->jarak_tempuh }}</td>
                                        <td>
                                            <span style="cursor: pointer; color: blue; text-decoration: underline;"
                                                data-bs-toggle="modal" data-bs-target="#viewImage{{ $item->id }}">
                                                Cek Foto
                                            </span>
                                            <div class="modal fade" id="viewImage{{ $item->id }}" tabindex="-1"
                                                aria-labelledby="viewImageModalLabel{{ $item->id }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="viewImageModalLabel{{ $item->id }}">Foto</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <img src="{{ Storage::url($item->foto) }}" alt="product image"
                                                                class="img-fluid">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
                            <h1 class="mb-3" id="m_modal_6_title">Data Produk</h1>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Nama Mobil</span>
                            </label>
                            <input type="text" class="form-control bg-transparent" placeholder="Masukkan Nama Mobil"
                                name="nama_mobil" />
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Jenis Mobil</span>
                            </label>
                            <input type="text" class="form-control bg-transparent" placeholder="Masukkan Jenis Mobil"
                                name="jenis_mobil" />
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Tahun</span>
                            </label>
                            <input type="number" class="form-control bg-transparent" placeholder="Masukkan Tahun"
                                name="tahun" />
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Nomor Plat</span>
                            </label>
                            <input type="text" class="form-control bg-transparent" placeholder="Masukkan Nomor Plat"
                                name="nomor_plat" />
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Kapasitas</span>
                            </label>
                            <input type="number" class="form-control bg-transparent" placeholder="Masukkan Kapasitas"
                                name="kapasitas" />
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Harga Sewa</span>
                            </label>
                            <input type="number" class="form-control bg-transparent" placeholder="Rp."
                                name="harga_sewa" />
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Status</span>
                            </label>
                            <select class="form-select bg-transparent" data-control="select2" data-hide-search="true"
                                name="status">
                                <option value="">Pilih Status</option>
                                <option value="Tersedia">Tersedia</option>
                                <option value="Disewa">Disewa</option>
                                <option value="Maintenance">Maintenance</option>
                            </select>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Deskripsi</span>
                            </label>
                            <textarea name="deskripsi" placeholder="Deskripsi" autocomplete="off" class="form-control bg-transparent"></textarea>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Kondisi</span>
                            </label>
                            <select class="form-select bg-transparent" data-control="select2" data-hide-search="true"
                                name="kondisi">
                                <option value="">Pilih Kondisi</option>
                                <option value="Baik">Baik</option>
                                <option value="Cukup Baik">Cukup Baik</option>
                                <option value="Perlu Perbaikan">Perlu Perbaikan</option>
                            </select>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Bahan Bakar</span>
                            </label>
                            <select class="form-select bg-transparent" data-control="select2" data-hide-search="true"
                                name="bahan_bakar">
                                <option value="">Pilih Bahan Bakar</option>
                                <option value="Bensin">Bensin</option>
                                <option value="Diesel">Diesel</option>
                            </select>
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Jarak Tempuh</span>
                            </label>
                            <input type="number" class="form-control bg-transparent" placeholder="KM"
                                name="jarak_tempuh" />
                        </div>
                        <div class="d-flex flex-column mb-8 fv-row">
                            <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                <span class="required">Foto</span>
                            </label>
                            <input type="file" class="form-control bg-transparent" name="foto" />
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
            $('#m_modal_6_title').html("Tambah Produk");
            $('#m_form_1_msg').hide();
            $('#m_modal_6').modal('show');
        }

        function save() {
            let url;

            if (method === 'add') {
                url = "{{ route('produk.store') }}";
            } else {
                url = "{{ route('produk.update') }}";
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
            $('#m_modal_6_title').html("Edit Produk");

            $.ajax({
                url: "{{ url('produk/edit') }}/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    if (data.data) {
                        $('#formAdd')[0].reset();
                        $('[name="id"]').val(data.data.id);
                        $('[name="nama_mobil"]').val(data.data.nama_mobil);
                        $('[name="jenis_mobil"]').val(data.data.jenis_mobil);
                        $('[name="tahun"]').val(data.data.tahun);
                        $('[name="nomor_plat"]').val(data.data.nomor_plat);
                        $('[name="kapasitas"]').val(data.data.kapasitas);
                        $('[name="harga_sewa"]').val(data.data.harga_sewa);
                        $('[name="deskripsi"]').val(data.data.deskripsi);
                        $('[name="jarak_tempuh"]').val(data.data.jarak_tempuh);
                        $('[name="status"]').val(data.data.status).change();
                        $('[name="kondisi"]').val(data.data.kondisi).change();
                        $('[name="bahan_bakar"]').val(data.data.bahan_bakar).change();

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
                        url: "{{ url('produk') }}/" + id,
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
