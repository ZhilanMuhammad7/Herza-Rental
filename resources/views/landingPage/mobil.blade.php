@extends('layouts.masterUser')
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight"
    style="background-image: url('{{ asset('ladingPage/images/bg_2.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Mobil <i
                            class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Pilih Mobil Anda</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section bg-light">
    <div class="container">
        <div class="row">
            @foreach ($produk as $value)
            <div class="col-md-4 mb-4">
                <div class="car-wrap rounded ftco-animate shadow-sm">
                    <div class="img rounded d-flex align-items-end position-relative"
                        style="background-image: url('{{ Storage::url($value->foto) }}'); height: 200px; background-size: cover; background-position: center;">
                        {{-- Badge Status Mobil --}}
                        <span class="badge position-absolute top-0 start-0 m-2 
                            @if ($value->status == 'Tersedia')
                                bg-success text-white
                            @elseif ($value->status == 'Disewa')
                                bg-warning text-white
                            @elseif ($value->status == 'Maintenance')
                                bg-danger text-white
                            @else
                                bg-secondary
                            @endif">
                            {{ $value->status }}
                        </span>
                    </div>

                    <div class="text p-3 bg-white rounded-bottom">
                        <h2 class="mb-1">
                            <a href="car-single.html" class="text-dark">
                                {{ $value->nama_mobil }} {{ $value->tahun }}
                            </a>
                        </h2>
                        <div class="d-flex mb-3 justify-content-between">
                            <span class="cat">{{ $value->jenis_mobil }}</span>
                            <p class="price">
                                {{ isset($value->harga_sewa) ? 'Rp ' . number_format($value->harga_sewa, 0, ',', '.') : 'Rp 0' }}
                            </p>
                        </div>
                        <p class="d-flex mb-0">
                            <a href="{{ url('detail_mobil/' . Crypt::encryptString($value->id)) }}"
                                class="btn btn-secondary py-2 ml-1 w-100">Detail</a>
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">
                        <ul>
                            <li><a href="#">&lt;</a></li>
                            <li class="active"><span>1</span></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&gt;</a></li>
                        </ul>
                    </div>
                </div>
            </div> --}}
    </div>
</section>
@endsection