<!DOCTYPE html>
<html lang="en">

<head>
    <title>Herza-Rental</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('ladingPage/css/open-iconic-bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('ladingPage/css/animate.css')}}">

    <link rel="stylesheet" href="{{asset('ladingPage/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('ladingPage/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('ladingPage/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('ladingPage/css/aos.css')}}">

    <link rel="stylesheet" href="{{asset('ladingPage/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{asset('ladingPage/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('ladingPage/css/jquery.timepicker.css')}}">


    <link rel="stylesheet" href="{{asset('ladingPage/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('ladingPage/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{asset('ladingPage/css/style.css')}}">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}">Herza<span>Rental</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active"><a href="{{url('/')}}" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{route('landingPage.about')}}" class="nav-link">Tentang</a></li>
                    <li class="nav-item"><a href="{{route('landingPage.layanan')}}" class="nav-link">Layanan</a></li>
                    <li class="nav-item"><a href="{{route('landingPage.harga')}}" class="nav-link">Harga</a></li>
                    <li class="nav-item"><a href="{{route('landingPage.mobil')}}" class="nav-link">Mobil</a></li>
                    <li class="nav-item"><a href="{{route('landingPage.kontak')}}" class="nav-link">Kontak</a></li>
                    <li class="nav-item"><a href="{{route('auth.login')}}" class="nav-link">Masuk</a></li>
                    <li class="nav-item"><a href="{{route('auth.register')}}" class="nav-link">Daftar</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    <div class="hero-wrap ftco-degree-bg" style="background-image: url('{{asset('ladingPage/images/bg_1.jpg')}}');" data-stellar-background-ratio="0.5">
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
            <div class="row no-gutters">
                <div class="col-md-12	featured-top">
                    <div class="row no-gutters">
                        <div class="col-md-4 d-flex align-items-center">
                            <form action="#" class="request-form ftco-animate bg-primary">
                                <h2>Make your trip</h2>
                                <div class="form-group">
                                    <label for="" class="label">Pick-up location</label>
                                    <input type="text" class="form-control" placeholder="City, Airport, Station, etc">
                                </div>
                                <div class="form-group">
                                    <label for="" class="label">Drop-off location</label>
                                    <input type="text" class="form-control" placeholder="City, Airport, Station, etc">
                                </div>
                                <div class="d-flex">
                                    <div class="form-group mr-2">
                                        <label for="" class="label">Pick-up date</label>
                                        <input type="text" class="form-control" id="book_pick_date" placeholder="Date">
                                    </div>
                                    <div class="form-group ml-2">
                                        <label for="" class="label">Drop-off date</label>
                                        <input type="text" class="form-control" id="book_off_date" placeholder="Date">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="label">Pick-up time</label>
                                    <input type="text" class="form-control" id="time_pick" placeholder="Time">
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Rent A Car Now" class="btn btn-secondary py-3 px-4">
                                </div>
                            </form>
                        </div>
                        <div class="col-md-8 d-flex align-items-center">
                            <div class="services-wrap rounded-right w-100">
                                <h3 class="heading-section mb-4">Cara Lebih Baik untuk Menyewa Mobil</h3>
                                <div class="row d-flex mb-4">
                                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-route"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">Pilih Lokasi Penjemputan Anda</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-handshake"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">Pilih Penawaran Terbaik</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 d-flex align-self-stretch ftco-animate">
                                        <div class="services w-100 text-center">
                                            <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-rent"></span></div>
                                            <div class="text w-100">
                                                <h3 class="heading mb-2">Pesan Mobil Sewa Anda</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- <p><a href="#" class="btn btn-primary py-3 px-4">Reserve Your Perfect Car</a></p> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>


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
                        <div class="item">
                            <div class="car-wrap rounded ftco-animate">
                                <div class="img rounded d-flex align-items-end" style="background-image: url(images/car-1.jpg);">
                                </div>
                                <div class="text">
                                    <h2 class="mb-0"><a href="#">Mercedes Grand Sedan</a></h2>
                                    <div class="d-flex mb-3">
                                        <span class="cat">Cheverolet</span>
                                        <p class="price ml-auto">$500 <span>/day</span></p>
                                    </div>
                                    <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="{{route('landingPage.detailMobil')}}" class="btn btn-secondary py-2 ml-1">Details</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="car-wrap rounded ftco-animate">
                                <div class="img rounded d-flex align-items-end" style="background-image: url(images/car-2.jpg);">
                                </div>
                                <div class="text">
                                    <h2 class="mb-0"><a href="#">Mercedes Grand Sedan</a></h2>
                                    <div class="d-flex mb-3">
                                        <span class="cat">Cheverolet</span>
                                        <p class="price ml-auto">$500 <span>/day</span></p>
                                    </div>
                                    <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="{{route('landingPage.detailMobil')}}" class="btn btn-secondary py-2 ml-1">Details</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="car-wrap rounded ftco-animate">
                                <div class="img rounded d-flex align-items-end" style="background-image: url(images/car-3.jpg);">
                                </div>
                                <div class="text">
                                    <h2 class="mb-0"><a href="#">Mercedes Grand Sedan</a></h2>
                                    <div class="d-flex mb-3">
                                        <span class="cat">Cheverolet</span>
                                        <p class="price ml-auto">$500 <span>/day</span></p>
                                    </div>
                                    <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="{{route('landingPage.detailMobil')}}" class="btn btn-secondary py-2 ml-1">Details</a></p>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="car-wrap rounded ftco-animate">
                                <div class="img rounded d-flex align-items-end" style="background-image: url(images/car-4.jpg);">
                                </div>
                                <div class="text">
                                    <h2 class="mb-0"><a href="#">Mercedes Grand Sedan</a></h2>
                                    <div class="d-flex mb-3">
                                        <span class="cat">Cheverolet</span>
                                        <p class="price ml-auto">$500 <span>/day</span></p>
                                    </div>
                                    <p class="d-flex mb-0 d-block"><a href="#" class="btn btn-primary py-2 mr-1">Book now</a> <a href="{{route('landingPage.detailMobil')}}" class="btn btn-secondary py-2 ml-1">Details</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-about">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url('{{asset('ladingPage/images/about.jpg')}}');">
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
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-wedding-car"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">Sewa Mobil Harian dan Mingguan</h3>
                            <!-- <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">Antar Kota</h3>
                            <!-- <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-car"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">Antar Jemput Bandara</h3>
                            <!-- <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p> -->
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="services services-2 w-100 text-center">
                        <div class="icon d-flex align-items-center justify-content-center"><span class="flaticon-transportation"></span></div>
                        <div class="text w-100">
                            <h3 class="heading mb-2">Sewa Per Jam</h3>
                            <!-- <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p> -->
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
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="https://www.facebook.com/profile.php?id=61558886885936"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="https://www.instagram.com/unclekretek"><span class="icon-instagram"></span></a></li>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Information</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">About</a></li>
                            <li><a href="#" class="py-2 d-block">Services</a></li>
                            <li><a href="#" class="py-2 d-block">Term and Conditions</a></li>
                            <li><a href="#" class="py-2 d-block">Best Price Guarantee</a></li>
                            <li><a href="#" class="py-2 d-block">Privacy &amp; Cookies Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Customer Support</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">FAQ</a></li>
                            <li><a href="#" class="py-2 d-block">Payment Option</a></li>
                            <li><a href="#" class="py-2 d-block">Booking Tips</a></li>
                            <li><a href="#" class="py-2 d-block">How it works</a></li>
                            <li><a href="#" class="py-2 d-block">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                                <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@herzarental.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved | Herza Rental by <a href="https://colorlib.com" target="_blank">Alif</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


    <script src="{{asset('ladingPage/js/jquery.min.js')}}"></script>
    <script src="{{asset('ladingPage/js/jquery-migrate-3.0.1.min.js')}}"></script>
    <script src="{{asset('ladingPage/js/popper.min.js')}}"></script>
    <script src="{{asset('ladingPage/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('ladingPage/js/jquery.easing.1.3.js')}}"></script>
    <script src="{{asset('ladingPage/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('ladingPage/js/jquery.stellar.min.js')}}"></script>
    <script src="{{asset('ladingPage/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('ladingPage/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('ladingPage/js/aos.js')}}"></script>
    <script src="{{asset('ladingPage/js/jquery.animateNumber.min.js')}}"></script>
    <script src="{{asset('ladingPage/js/bootstrap-datepicker.js')}}"></script>
    <script src="{{asset('ladingPage/js/jquery.timepicker.min.js')}}"></script>
    <script src="{{asset('ladingPage/js/scrollax.min.js')}}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{asset('ladingPage/js/google-map.js')}}"></script>
    <script src="{{asset('ladingPage/js/main.js')}}"></script>

</body>

</html>