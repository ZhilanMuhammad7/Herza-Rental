@extends('layouts.masterAdmin')
@section('content')
    <div id="kt_app_content_container" class="app-container container-fluid">
        <div class="row g-5 gx-xl-10">
            <div class="page-heading">
                <h1>Welcome, Owner!</h1>
            </div>
            <div class="col-xxl-12 mb-md-5 mb-xl-12">
                <div class="row g-5 g-xl-8">
                    <div class="col-xl-4">
                        <a href="#" class="card bg-success hoverable card-xl-stretch mb-xl-8">
                            <div class="card-body">
                                <i class="ki-duotone ki-basket text-white fs-2x ms-n1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                                <div class="text-white fw-bold fs-2 mb-2 mt-5">Total: {{ $produk }}</div>
                                <div class="fw-semibold text-white">Jumlah Mobil Tersedia</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-4">
                        <a href="#" class="card bg-primary hoverable card-xl-stretch mb-xl-8">
                            <div class="card-body">
                                <i class="ki-duotone ki-cheque text-white fs-2x ms-n1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                    <span class="path5"></span>
                                    <span class="path6"></span>
                                    <span class="path7"></span>
                                </i>
                                <div class="text-white fw-bold fs-2 mb-2 mt-5">Total: {{ $pesanan }}</div>
                                <div class="fw-semibold text-white">Jumlah Sewa Mobil</div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-4">
                        <a href="#" class="card bg-danger hoverable card-xl-stretch mb-5 mb-xl-8">
                            <div class="card-body">
                                <i class="ki-duotone ki-chart-simple-3 text-white fs-2x ms-n1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                    <span class="path3"></span>
                                    <span class="path4"></span>
                                </i>
                                <div class="text-white fw-bold fs-2 mb-2 mt-5">Total : {{ $cicilan }}</div>
                                <div class="fw-semibold text-white">Jumlah Cicilan Sewa Mobil Belum Lunas</div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

