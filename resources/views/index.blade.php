@extends('layouts.app')

@section('head')
    <meta name="description" content="Wong Wian Yai">
    <title>{{ trans('panel.site_title') }}</title>
@endsection

@section('content')
<!-- Hero Section -->
<section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
        <h1>Find Restaurants in Thailand</h1>
        <h2>- WongWianYai -</h2>
        <a href="#about" class="btn-get-started scrollto">{{ trans('global.login') }}</a>
    </div>
</section><!-- End Hero -->
@endsection