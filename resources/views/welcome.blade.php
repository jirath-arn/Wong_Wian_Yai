<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Wong Wian Yai">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('panel.page_search') }}</title>
    
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
    <link rel="stylesheet" href="{{ asset('css/vendor/cloudflare-flag-icon/css/flag-icon.min.css') }}">

    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    @yield('styles')

    <style>
        .checked {
          color: orange;
        }
        </style>
</head>

<body>
    <!-- Header -->
    <header id="header" class="fixed-top d-flex align-items-center">
        <div class="container">
            <div class="header-container d-flex align-items-center justify-content-between">
                <div class="logo">
                    <h1 class="text-light"><a href="{{ url('/') }}"><span>{{ trans('panel.site_title') }}</span></a></h1>
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
                                <li><a href="#">Japanese<span class="flag-icon flag-icon-jp"></span></a></li>
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
    
    <!-- Hero Section -->
    <section id="hero" class="d-flex align-items-center">
        <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
            <h1>Find restaurants in Thailand</h1>
            <h2>- WongWianYai -</h2>
            <a href="#about" class="btn-get-started scrollto">{{ trans('global.login') }}</a>
        </div>
    </section><!-- End Hero -->
    
    <!-- services Section -->
    <section id="services" class="services section-bg">
        <div class="container">
            <div class="row">
                <h4>Popular Restaurants</h4>
                <!-- Left Info -->
                <div class="col-lg-2">
                    
                    <hr>
                    <div class="section-title" data-aos="fade-right">
                        <strong>Categories</strong><br>
                        
                        @foreach($categories as $key => $category)
                            <input type="checkbox" id="{{ $category->id }}" name="{{ $category->id }}" value="{{ $category->title }}">
                            <label for="{{ $category->id }}"> {{ $category->title }}</label><br>
                        @endforeach
                    </div>
                    <div class="section-title" data-aos="fade-right">
                        <strong>Score</strong><br>
                        
                        <input type="radio" id="male" name="gender" value="male">
                        <label for="male"> &GreaterEqual; 4.0</label><br>
                        <input type="radio" id="female" name="gender" value="female">
                        <label for="female"> &GreaterEqual; 3.5</label><br>
                        <input type="radio" id="other" name="gender" value="other">
                        <label for="other"> &GreaterEqual; 3.0</label>
                    </div>
                </div>

                <!-- Right Info -->
                <div class="col-lg-10">
                    <div class="row">
                        @foreach($restaurants as $key => $restaurant)
                            <div class="col-md-6 align-items-stretch mt-4">
                                <div class="icon-box" data-aos="zoom-in" data-aos-delay="100">
                                    <h4><a href="">{{ $restaurant->name }}</a></h4>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-half-full checked"></span>
                                    <span>4.5 (5 Reviews)</span>

                                    <p>ประเภท: {{ $restaurant->category->title }}</p>
                                    <p>โทรจอง: {{ $restaurant->telephone }}</p>
                                    
                                    <hr>
                                    <img src="{{ asset('img/hero-bg.jpg') }}" alt="Snow" style="width:60%;  margin-left: auto; margin-right: auto; display: block;">
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
    </section><!-- End Services Section -->

    <!-- Footer -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>{{ trans('panel.site_title') }}</h3>
                        <p>
                            {{ trans('panel.about_us.address') }}<br><br>
                            <strong>{{ trans('global.phone') }}:</strong> {{ trans('panel.about_us.phone') }}<br>
                            <strong>{{ trans('global.email') }}:</strong> {{ trans('panel.about_us.email') }}<br>
                        </p>
                    </div>
                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>Useful Links</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>Our Services</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>Join Our Newsletter</h4>
                        <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
                        <form action="" method="post">
                            <input type="email" name="email"><input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="container d-md-flex py-4">
            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright 2021 <strong><span>{{ trans('panel.site_title') }}</span></strong>. All Rights Reserved.
                </div>
                <div class="credits">
                    Designed by <a href="{{ url('/v1') }}">{{ trans('panel.site_title') }}</a>
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
        </div>
    </footer><!-- End Footer -->
    
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('js/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('js/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('js/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('js/vendor/purecounter/purecounter.js') }}"></script>
    <script src="{{ asset('js/vendor/swiper/swiper-bundle.min.js') }}"></script>
    
    <!-- Main JS File -->
    <script src="{{ asset('js/main.js') }}"></script>
    
    @yield('scripts')
</body>
</html>