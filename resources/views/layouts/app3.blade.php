<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Wong Wian Yai">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('panel.site_title') }}</title>
    
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i">
    
    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/vendor/aos/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap-icons/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/boxicons/css/boxicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/glightbox/css/glightbox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/remixicon/remixicon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/vendor/swiper/swiper-bundle.min.css') }}">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('css/style2.css') }}">

    <!-- Cloudflare CSS File -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/2.3.1/css/flag-icon.min.css">

    @yield('styles')
    <style>
        body {background-color: coral;}
    </style>
</head>

<body>
    <!-- Header -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container">
            <div class="header-container d-flex align-items-center justify-content-between">
                <div class="logo">
                    <h1 class="text-light"><a href="index.html"><span>{{ trans('panel.title_logo') }}</span></a></h1>
                </div>
                
                <nav id="navbar" class="navbar">
                    <ul>
                        <li><a class="nav-link scrollto active" href="#hero">{{ trans('global.home') }}</a></li>
                        <li><a class="nav-link scrollto" href="#about">{{ trans('global.about') }}</a></li>
                        <li><a class="nav-link scrollto" href="#services">Services</a></li>
                        <li><a class="nav-link scrollto" href="#team">Team</a></li>
                        <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="#">Drop Down 1</a></li>
                                <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                                    <ul>
                                        <li><a href="#">Deep Drop Down 1</a></li>
                                        <li><a href="#">Deep Drop Down 2</a></li>
                                        <li><a href="#">Deep Drop Down 3</a></li>
                                        <li><a href="#">Deep Drop Down 4</a></li>
                                        <li><a href="#">Deep Drop Down 5</a></li>
                                    </ul>
                                </li>
                                <li><a href="#">Drop Down 2</a></li>
                                <li><a href="#">Drop Down 3</a></li>
                                <li><a href="#">Drop Down 4</a></li>
                            </ul>
                        </li>
                        <li><a class="nav-link scrollto" href="#contact">{{ trans('global.contact') }}</a></li>
                        <li class="dropdown"><a href="#"><span>Languages</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="#">English<span class="flag-icon flag-icon-gb"></span></a></li>
                                <!-- <li><a href="#">Japanese<span class="flag-icon flag-icon-jp"></span></a></li> -->
                                <li><a href="#">Thai<span class="flag-icon flag-icon-th"></span></a></li>
                            </ul>
                        </li>
                        <li><a class="getstarted scrollto" href="#about">{{ trans('global.login') }}</a></li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- End navbar -->
            </div><!-- End Header Container -->
        </div>
    </header><!-- End Header -->
    
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    {{-- <script src="{{ asset('js/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('js/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('js/vendor/purecounter/purecounter.js') }}"></script>
    <script src="{{ asset('js/vendor/swiper/swiper-bundle.min.js') }}"></script>
    
    <!-- Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script> --}}
    
    @yield('scripts')
</body>
</html>