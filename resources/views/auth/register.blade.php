<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic
Product Version: 8.2.3
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
    <base href="../../../" />
    <title>Herza - Rental</title>
    <meta charset="utf-8" />
    <meta name="description"
        content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords"
        content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Herza - Rental" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="Metronic by Keenthemes" />
    <link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
    <link rel="shortcut icon" href="{{ asset('admin/assets/media/logos/custom-3.png') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="{{ asset('admin/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <script></script>
</head>

<body id="kt_body" class="app-blank">
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <div class="d-flex flex-column flex-lg-row flex-column-fluid">
            <div class="d-flex flex-column flex-lg-row-fluid w-lg-50 p-10 order-2 order-lg-1">
                <div class="d-flex flex-center flex-column flex-lg-row-fluid">
                    <div class="w-lg-500px p-10">
                        <form class="form w-100" novalidate="novalidate" id="kt_sign_in_form"
                            action="{{ route('postRegister') }}" method="POST">
                            @csrf
                            <div class="text-center mb-4">
                                <h1 class="text-gray-900 fw-bolder mb-3">Registrasi</h1>
                            </div>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger mt-3" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div class="fv-row mb-3">
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Nama Lengkap</span>
                                </label>
                                <input type="text" placeholder="Nama Lengkap" name="nama" autocomplete="off"
                                    class="form-control bg-transparent" />
                            </div>
                            <div class="fv-row mb-3">
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Email</span>
                                </label>
                                <input type="text" placeholder="Email" name="email" autocomplete="off"
                                    class="form-control bg-transparent" />
                            </div>
                            <div class="fv-row mb-3">
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Password</span>
                                </label>
                                <input type="password" placeholder="Password" name="password" autocomplete="off"
                                    class="form-control bg-transparent" />
                            </div>
                            <div class="fv-row mb-3">
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">Alamat</span>
                                </label>
                                <textarea name="alamat" placeholder="Alamat" autocomplete="off" class="form-control bg-transparent"></textarea>
                            </div>
                            <div class="fv-row mb-3">
                                <label class="d-flex align-items-center fs-6 fw-semibold mb-2">
                                    <span class="required">No Hp</span>
                                </label>
                                <input type="number" placeholder="No Hp" name="no_hp" autocomplete="off"
                                    class="form-control bg-transparent" />
                            </div>
                            <div class="d-grid mb-10">
                                <button type="submit" class="btn btn-primary">
                                    <span class="indicator-label">Daftar</span>
                                </button>
                            </div>
                            <div class="text-gray-500 text-center fw-semibold fs-6">Sudah memiliki akun?
                                <a href="{{ url('/login') }}" class="link-primary">Masuk</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-lg-row-fluid w-lg-50 bgi-size-cover bgi-position-center order-1 order-lg-2"
                style="background-image: url(admin/assets/media/misc/auth-bg.png)">
                <div class="d-flex flex-column flex-center py-7 py-lg-15 px-5 px-md-15 w-100">
                    <a href="index.html" class="mb-0 mb-lg-2">
                        <img alt="Logo" src="{{ asset('admin/assets/media/logos/custom-2.png') }}"
                            class="h-100px h-lg-100" />
                    </a>
                    <img class="d-none d-lg-block mx-auto w-275px w-md-40 w-xl-500px mb-2 mb-lg-20 animate__animated animate__fadeInLeft"
                        style="--animate-duration: 1.5s; --animate-delay: 0.5s;"
                        src="{{ asset('admin/assets/media/misc/car-2.png') }}" alt=""/>
                    <h1 class="d-none d-lg-block text-white fs-2qx fw-bolder text-center" style="margin-top:-50px ">
                        Cepat, Nyaman, dan Terpercaya</h1>
                    <div class="d-none d-lg-block text-white fs-base text-center">Temukan kemudahan perjalanan Anda
                        bersama,
                        <a href="#" class="opacity-75-hover text-warning fw-bold me-1">Herza Rental
                            Mobil</a>pilihan terbaik untuk kenyamanan dan efisiensi.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var hostUrl = "assets/";
    </script>
    <script src="{{ asset('admin/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom/authentication/sign-in/general.js') }}"></script>
</body>

</html>
