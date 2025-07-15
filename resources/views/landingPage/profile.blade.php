@extends('layouts.masterUser')
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight"
    style="background-image: url('{{ asset('ladingPage/images/bg_2.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home <i
                                class="ion-ios-arrow-forward"></i></a></span> <span>Profile <i
                            class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Profile Anda</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section contact-section">
    <div class="row justify-content-center mb-5">
        <div class="col-md-10">
            <div class="card shadow p-4 rounded bg-light">
                <div class="row align-items-center">
                    <!-- Foto Profil -->
                    <div class="col-md-4 text-center mb-4 mb-md-0">
                        <img src="{{ asset('ladingPage/images/blank.png') }}" alt="Foto Profil"
                            class="img-fluid rounded-circle shadow-sm"
                            style="width: 150px; height: 150px; object-fit: cover;">
                        <h4 class="mt-3">{{ $user->nama }}</h4>
                        <p class="text-muted mb-0">Pelanggan</p>
                    </div>

                    <!-- Detail Info -->
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <strong>Email:</strong>
                                <p class="mb-1">{{ $user->email }}</p>
                            </div>
                            <div class="col-md-6 mb-3">
                                <strong>Telepon:</strong>
                                <p class="mb-1">{{ $user->no_hp }}</p>
                            </div>
                            <div class="col-md-12 mb-3">
                                <strong>Alamat:</strong>
                                <p class="mb-1">{{ $user->alamat }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection