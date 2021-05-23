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
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
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
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">

    @yield('styles')
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
                        <li><a class="nav-link scrollto" href="#">{{ trans('global.about') }}</a></li>
                        <li><a class="nav-link scrollto" href="#restaurants">Search</a></li>
                        <li><a class="nav-link scrollto" href="#">{{ trans('global.contact') }}</a></li>
                        <li class="dropdown"><a href="#"><span>Languages</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="#">English<span class="flag-icon flag-icon-gb"></span></a></li>
                                <li><a href="#">Thai<span class="flag-icon flag-icon-th"></span></a></li>
                            </ul>
                        </li>
                        <li><a class="getstarted scrollto" href="{{ route('login') }}">{{ trans('global.login') }}</a></li>
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
            <a href="{{ route('login') }}" class="btn-get-started scrollto">{{ trans('global.login') }}</a>
        </div>
    </section><!-- End Hero -->
    
    <!-- Restaurants Section -->
    <section id="restaurants" class="restaurants section-bg">
        <div class="container">
            <div class="row">
                <!-- Left Info -->
                <div class="col-lg-8 restaurants-topic">
                    <h4>Popular Restaurants</h4>
                </div>

                <!-- Right Info -->
                <div class="col-lg-4 restaurants-search">
                    <form action="" method="POST">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                        </svg>

                        <input type="search" name="search" placeholder="ex. Categories, Restaurants, Cities"><input type="submit" value="Search">
                    </form>
                </div>
            </div>

            <div class="row">
                <!-- Left Info -->
                <div class="col-lg-2 menu-filter">
                    <hr>
                    <div class="section-title" data-aos="fade-right">
                        <strong>Categories</strong><br>
                        
                        <div class="checkbox">
                            @foreach($categories as $key => $category)
                                <label><input type="checkbox" value="{{ $category->title }}"> {{ $category->title }}</label><br>
                            @endforeach
                        </div>
                    </div>
                    <div class="section-title" data-aos="fade-right">
                        <strong>Star Rating</strong><br>

                        <div class="radio">
                            <label><input type="radio" value="4.0" name="rating"> &GreaterEqual; 4.0</label><br>
                            <label><input type="radio" value="3.5" name="rating"> &GreaterEqual; 3.5</label><br>
                            <label><input type="radio" value="3.0" name="rating"> &GreaterEqual; 3.0</label><br>
                        </div>
                    </div>
                    <div class="section-title" data-aos="fade-right">
                        <strong>Cities</strong><br>
                        
                        <select class="form-select">
                            <option selected>Choose...</option>
                            <option value="Bangkok">Bangkok</option>
                            <option value="Pathum Thani">Pathum Thani</option>
                            <option value="Chonburi">Chonburi</option>
                        </select>
                    </div>
                </div>

                <!-- Right Info -->
                <div class="col-lg-10">
                    <div class="row">
                        @for($i = 0; $i < count($restaurants); $i++)
                            <div class="col-md-6 align-items-stretch mt-4">
                                <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                                    <h4><a href="">{{ $restaurants[$i]->name }}</a></h4>

                                    <span class="star-rate">{{ $reviews[$i]['score_reviews'] }} <i class="fa fa-star"></i></span>
                                    <span style="padding-left: 5px;">{{ $reviews[$i]['count_reviews'] }} {{ $reviews[$i]['count_reviews'] >= 2 ? 'Reviews':'Review' }}</span>

                                    <p>
                                        <strong>ประเภท:</strong> {{ $restaurants[$i]->category->title }}<br>
                                        <strong>โทรจอง:</strong> {{ $restaurants[$i]->telephone }}<br>
                                        <strong>สถานที่:</strong> {{ $restaurants[$i]->address }}
                                    </p>
                                    
                                    <hr>
                                    <img src="{{ asset('img/hero-bg.jpg') }}" alt="Snow" style="width:60%;  margin-left: auto; margin-right: auto; display: block;">
                                </div>
                            </div>
                        @endfor

                        {{-- @foreach($restaurants as $key => $restaurant)
                            <div class="col-md-6 align-items-stretch mt-4">
                                <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                                    <h4><a href="">{{ $restaurant->name }}</a></h4>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star-half-full checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span>4.5 (5 Reviews)</span>

                                    <p>
                                        <strong>ประเภท:</strong> {{ $restaurant->category->title }}<br>
                                        <strong>โทรจอง:</strong> {{ $restaurant->telephone }}<br>
                                        <strong>สถานที่:</strong> {{ $restaurant->address }}
                                    </p>
                                    
                                    <hr>
                                    <img src="{{ asset('img/hero-bg.jpg') }}" alt="Snow" style="width:60%;  margin-left: auto; margin-right: auto; display: block;">
                                </div>
                            </div>
                        @endforeach --}}
                    </div>
                </div>

            </div>
        </div>
    </section><!-- End Restaurants Section -->

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