@extends('layouts.masterUser')
@section('content')
<section class="hero-wrap hero-wrap-2 js-fullheight" style="background-image: url('{{asset('ladingPage/images/bg_2.jpg')}}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-start">
            <div class="col-md-9 ftco-animate pb-5">
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>Tentang Kami <i class="ion-ios-arrow-forward"></i></span></p>
                <h1 class="mb-3 bread">Tentang Kami</h1>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-about">
    <div class="container">
        <div class="row no-gutters">
            <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url('{{asset('ladingPage/images/logo_herza.png')}}');">
            </div>
            <div class="col-md-6 wrap-about ftco-animate">
                <div class="heading-section heading-section-white pl-md-5">
                    <span class="subheading">Tentang Kami</span>
                    <h2 class="mb-4">Selamat Datang di Herza Rental</h2>

                    <p>
                        Herza Rental adalah penyedia layanan rental kendaraan terpercaya yang berkomitmen untuk memberikan pengalaman terbaik
                        bagi pelanggan kami. Dengan armada kendaraan yang lengkap, kondisi prima, dan harga yang kompetitif,
                        kami siap memenuhi kebutuhan transportasi Anda, baik untuk keperluan pribadi, bisnis, maupun liburan.
                    </p>
                    <p>
                        Didukung oleh tim profesional yang ramah dan berpengalaman, kami selalu mengutamakan kepuasan pelanggan dengan memberikan
                        layanan yang cepat, aman, dan mudah. Pilih Herza Rental sebagai mitra perjalanan Anda, dan nikmati kenyamanan serta kepraktisan
                        dalam setiap perjalanan.
                    </p>
                    <p><a href="{{route('landingPage.about')}}" class="btn btn-primary py-3 px-4">Lebih Banyak</a></p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection