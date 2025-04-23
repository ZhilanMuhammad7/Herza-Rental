<!DOCTYPE html>
<html lang="en">

<head>
    <title>Herza-Rental</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">

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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="{{url('/')}}" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="{{route('landingPage.mobil')}}" class="nav-link">Mobil</a></li>
                    <li class="nav-item"><a href="{{route('landingPage.kontak')}}" class="nav-link">Kontak</a></li>
                    <li class="nav-item"><a href="{{route('landingPage.order')}}" class="nav-link">Pesanan</a></li>
                    <li class="nav-item"><a href="{{route('landingPage.profile')}}" class="nav-link">Profile</a></li>
                    <li class="nav-item"><a href="{{route('login')}}" class="nav-link">Masuk</a></li>
                    <!-- <li class="nav-item"><a href="{{route('register')}}" class="nav-link">Daftar</a></li> -->
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    @yield('content')

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
                        </ul>
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
                        Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                        </script> All rights reserved | Herza Rental by <a href="https://colorlib.com"
                            target="_blank">Alif</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>



    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                stroke="#F96D00" />
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false">
    </script>
    <script src="{{asset('ladingPage/js/google-map.js')}}"></script>
    <script src="{{asset('ladingPage/js/main.js')}}"></script>

</body>

</html>