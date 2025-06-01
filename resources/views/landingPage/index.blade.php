<!DOCTYPE html>
<html lang="en">

<head>
    <title>Herza-Rental</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('ladingPage/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ladingPage/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('ladingPage/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ladingPage/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('ladingPage/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('ladingPage/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('ladingPage/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('ladingPage/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('ladingPage/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('ladingPage/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('ladingPage/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('ladingPage/css/style.css') }}">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Herza<span>Rental</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item {{ request()->routeIs('landingPage.index') ? 'active' : '' }}"><a
                            href="{{ url('/') }}" class="nav-link">Home</a></li>
                    <li class="nav-item {{ request()->routeIs('landingPage.mobil') ? 'active' : '' }}"><a
                            href="{{ route('landingPage.mobil') }}" class="nav-link">Mobil</a></li>
                    <li class="nav-item {{ request()->routeIs('landingPage.kontak') ? 'active' : '' }}"><a
                            href="{{ route('landingPage.kontak') }}" class="nav-link">Kontak</a></li>
                    <li class="nav-item {{ request()->routeIs('landingPage.order') ? 'active' : '' }}"><a
                            href="{{ route('landingPage.order') }}" class="nav-link">Pesanan</a></li>
                    @auth
                        @if (auth()->user()->role == 'user')
                            <li class="nav-item {{ request()->routeIs('landingPage.profile') ? 'active' : '' }}"><a
                                    href="{{ route('landingPage.profile') }}" class="nav-link">Profile</a></li>
                        @endif
                    @endauth
                    @if (Auth::check())
                        <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link">Keluar</a></li>
                    @else
                        <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Masuk</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->
    @if (session('error'))
        <div class="alert alert-danger mt-3" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <div class="hero-wrap ftco-degree-bg" style="background-image: url('{{ asset('ladingPage/images/bg_1.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
                <div class="col-lg-8 ftco-animate">
                    <div class="text w-100 text-center mb-md-5 pb-md-5">
                        <h1 class="mb-4">Cara Cepat &amp; Mudah Untuk Rental Mobil</h1>
                        <p style="font-size: 18px;">Herza Rental, Teman Setia di Setiap Kilometer.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-no-pt bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                    <span class="subheading">Apa yang kami tawarkan</span>
                    <h2 class="mb-2">Kendaraan Unggulan</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="carousel-car owl-carousel">
                        @foreach ($produk as $value)
                            <div class="item">
                                <div class="car-wrap rounded ftco-animate">
                                    <div class="img rounded d-flex align-items-end"
                                        style="background-image: url('{{ Storage::url($value->foto) }}');">
                                    </div>
                                    <div class="text">
                                        <h2 class="mb-0"><a href="#">{{ $value->nama_mobil }}
                                                {{ $value->tahun }}</a></h2>
                                        <div class="d-flex mb-3">
                                            <span class="cat">{{ $value->jenis_mobil }}</span>
                                            <p class="price ml-auto">
                                                {{ isset($value->harga_sewa) ? 'Rp ' . number_format($value->harga_sewa, 0, ',', '.') : 'Rp 0' }}
                                            </p>
                                        </div>
                                        <p class="d-flex mb-0 d-block">
                                            <a href="{{ url('detail_mobil/' . Crypt::encryptString($value->id)) }}"
                                                class="btn btn-secondary py-2 ml-1">Detail</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-about">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center"
                    style="background-image: url('{{ asset('ladingPage/images/logo_herza.png') }}');">
                </div>
                <div class="col-md-6 wrap-about ftco-animate">
                    <div class="heading-section heading-section-white pl-md-5">
                        <span class="subheading">Tentang Kami</span>
                        <h2 class="mb-4">Selamat Datang di Herza Rental</h2>

                        <p style="text-align: justify;">
                            Herza Rental adalah penyedia layanan rental kendaraan terpercaya yang berkomitmen untuk
                            memberikan pengalaman terbaik
                            bagi pelanggan kami. Dengan armada kendaraan yang lengkap, kondisi prima, dan harga yang
                            kompetitif,
                            kami siap memenuhi kebutuhan transportasi Anda, baik untuk keperluan pribadi, bisnis, maupun
                            liburan.
                        </p>
                        <p style="text-align: justify;">
                            Didukung oleh tim profesional yang ramah dan berpengalaman, kami selalu mengutamakan
                            kepuasan pelanggan dengan memberikan
                            layanan yang cepat, aman, dan mudah. Pilih Herza Rental sebagai mitra perjalanan Anda, dan
                            nikmati kenyamanan serta kepraktisan
                            dalam setiap perjalanan.
                        </p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 text-center heading-section ftco-animate">
                    <span class="subheading">Layanan</span>
                    <h2 class="mb-3">Layanan Terbaru Kami</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span
                                class="flaticon-wedding-car"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">Sewa Mobil Harian dan Bulanan</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span
                                class="flaticon-transportation"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">Antar Kota dan Provinsi</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span
                                class="flaticon-car"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">Antar Jemput Bandara</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span
                                class="flaticon-transportation"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">Sewa Lepas Kunci</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2"><a href="#" class="logo">Herza<span>Rental</span></a></h2>
                        <p>Herza Rental, Teman Setia di Setiap Kilometer.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a
                                    href="https://www.facebook.com/profile.php?id=61558886885936"><span
                                        class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="https://www.instagram.com/unclekretek"><span
                                        class="icon-instagram"></span></a></li>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Informasi</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Home</a></li>
                            <li><a href="#" class="py-2 d-block">Mobil</a></li>
                            <li><a href="#" class="py-2 d-block">Kontak</a></li>
                            <li><a href="#" class="py-2 d-block">Profile</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Info Selengkapnya?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">Jl Tiung Ujung Gang
                                        Buntu 1 No 3C</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+62
                                            822-8484-4057</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span
                                            class="text">info@herzarental.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p>
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> | Herza Rental
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="{{ asset('ladingPage/js/jquery.min.js') }}"></script>
    <script src="{{ asset('ladingPage/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('ladingPage/js/popper.min.js') }}"></script>
    <script src="{{ asset('ladingPage/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('ladingPage/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('ladingPage/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('ladingPage/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('ladingPage/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('ladingPage/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('ladingPage/js/aos.js') }}"></script>
    <script src="{{ asset('ladingPage/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('ladingPage/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('ladingPage/js/jquery.timepicker.min.js') }}"></script>
    <script src="{{ asset('ladingPage/js/scrollax.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ asset('ladingPage/js/google-map.js') }}"></script>
    <script src="{{ asset('ladingPage/js/main.js') }}"></script>

</body>

</html>
