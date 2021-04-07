@extends('layouts.app2')

@section('content')
<!-- Hero Section -->
<section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
        <h1>Find Restaurants in Thailand</h1>
        <h2>- WongWianYai -</h2>
        <a href="{{route('register')}}" class="btn-get-started scrollto">register here</a>
        <a href="{{route('login')}}" class="btn-get-started scrollto">login here</a>
    </div>
</section><!-- End Hero -->
@endsection