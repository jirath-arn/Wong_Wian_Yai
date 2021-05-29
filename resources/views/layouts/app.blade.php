<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Wong Wian Yai">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @yield('head')
    
    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Data Table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css">

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
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

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
                        <li><a class="nav-link scrollto" href="#footer">{{ trans('global.about') }}</a></li>
                        <li><a class="nav-link scrollto" href="#restaurants">{{ trans('global.search') }}</a></li>
                        <li><a class="nav-link scrollto" href="#footer">{{ trans('global.contact') }}</a></li>
                        <li class="dropdown"><a href="#"><span>{{ trans('global.languages') }}</span> <i class="bi bi-chevron-down"></i></a>
                            <ul>
                                <li><a href="{{ url()->current() }}?change_language=en">{{ trans('global.countries.en') }}<span class="flag-icon flag-icon-gb"></span></a></li>
                                <li><a href="{{ url()->current() }}?change_language=th">{{ trans('global.countries.th') }}<span class="flag-icon flag-icon-th"></span></a></li>
                            </ul>
                        </li>
                        @guest
                            @if (Route::has('login'))
                                <li><a class="getstarted scrollto" href="{{ route('login') }}">{{ trans('global.login') }}</a></li>
                            @endif
                        @else
                            <li class="dropdown"><a class="getstarted scrollto" href="#" style="color: #fff;"><span>{{ trans('global.username') }} : <label style="text-transform: none;">{{ Auth::user()->username }}</label></span> <i class="bi bi-chevron-down"></i></a>
                                <ul>
                                    <li><a href="{{ route('users.profile') }}">{{ trans('cruds.profile.title') }}<i class="bi bi-person-fill"></i></a></li>
                                    @if(Gate::check('category_access') || Gate::check('restaurant_access') || Gate::check('review_access') || Gate::check('permission_access' ) || Gate::check('role_access') || Gate::check('user_access'))
                                        <li><div class="line"></div></li>
                                    @endif

                                    @can('category_access')
                                        <li><a href="{{ route('categories.index') }}">{{ trans('cruds.category.title') }}<i class="bi bi-tags"></i></a></li>
                                    @endcan

                                    @can('restaurant_access')
                                        <li><a href="{{ route('restaurants.index') }}">{{ trans('cruds.restaurant.title') }}<i class="bi bi-shop"></i></a></li>
                                    @endcan

                                    @can('review_access')
                                        <li><a href="{{ route('reviews.index') }}">{{ trans('cruds.review.title') }}<i class="bi bi-chat-right-text"></i></a></li>
                                    @endcan

                                    @can('permission_access')
                                        <li><a href="{{ route('permissions.index') }}">{{ trans('cruds.permission.title') }}<i class="bi bi-key"></i></a></li>
                                    @endcan

                                    @can('role_access')
                                        <li><a href="{{ route('roles.index') }}">{{ trans('cruds.role.title') }}<i class="bi bi-person-bounding-box"></i></a></li>
                                    @endcan

                                    @can('user_access')
                                        <li><a href="{{ route('users.index') }}">{{ trans('cruds.user.title') }}<i class="bi bi-people"></i></a></li>
                                    @endcan

                                    @if(Gate::check('category_access') || Gate::check('restaurant_access') || Gate::check('review_access') || Gate::check('permission_access' ) || Gate::check('role_access') || Gate::check('user_access'))
                                        <li><div class="line"></div></li>
                                    @endif
                                    <li>
                                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ trans('global.logout') }}<i class="bi bi-x-circle"></i></a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- End navbar -->
            </div><!-- End Header Container -->
        </div>
    </header><!-- End Header -->

    @yield('content')

    <!-- Footer -->
    <footer id="footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 footer-contact">
                        <h3>{{ trans('panel.site_title') }}</h3>
                        <p>
                            {{ trans('panel.about_us.address') }}<br><br>
                            <strong>{{ trans('global.phone') }} :</strong> {{ trans('panel.about_us.phone') }}<br>
                            <strong>{{ trans('global.email') }} :</strong> {{ trans('panel.about_us.email') }}<br>
                        </p>
                    </div>
                    <div class="col-lg-2 col-md-6 footer-links">
                        <h4>{{ trans('global.useful_links') }}</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#hero">{{ trans('global.home') }}</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#footer">{{ trans('global.about_us') }}</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#restaurants">{{ trans('global.search') }}</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#footer">{{ trans('global.contact') }}</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 footer-links">
                        <h4>{{ trans('global.our_services') }}</h4>
                        <ul>
                            <li><i class="bx bx-chevron-right"></i> <a href="#restaurants">{{ trans('panel.search_restaurants') }}</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#restaurants">{{ trans('panel.promote_restaurants') }}</a></li>
                            <li><i class="bx bx-chevron-right"></i> <a href="#restaurants">{{ trans('panel.restaurant_reviews') }}</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-6 footer-newsletter">
                        <h4>{{ trans('panel.join_our_newsletter') }}</h4>
                        <p>{{ trans('panel.newsletter_content') }}</p>
                        <form action="" method="POST">
                            <input type="email" name="email"><input type="submit" value="{{ trans('global.subscribe') }}">
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
                    Designed by <a href="{{ url('/') }}">{{ trans('panel.site_title') }}</a>
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

    <!-- jQuery JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    
    <!-- Main JS File -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/select2.js') }}"></script>

    <!-- Data Table -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>

    <script>
        $(function() {
            let printButtonTrans = '{{ trans('global.print') }}'
            let languages = {
                'en': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/English.json',
                'th': 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Thai.json'
            };
            
            $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' })
            $.extend(true, $.fn.dataTable.defaults, {
                language: {
                    url: languages['{{ app()->getLocale() }}']
                },
                columnDefs: [{
                    orderable: false,
                    className: 'select-checkbox',
                    targets: 0
                }, {
                    orderable: false,
                    searchable: false,
                    targets: -1
                }],
                select: {
                    style: 'multi+shift',
                    selector: 'td:first-child'
                },
                order: [],
                scrollX: true,
                pageLength: 100,
                dom: 'lBfrtip<"actions">',
                buttons: [{
                    extend: 'print',
                    className: 'btn-secondary',
                    text: printButtonTrans,
                    exportOptions: {
                        columns: ':visible'
                    }
                }]
            });
            
            $.fn.dataTable.ext.classes.sPageButton = '';
        });
    </script>
    
    @yield('scripts')
</body>
</html>