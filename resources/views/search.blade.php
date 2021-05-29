@extends('layouts.app')

@section('head')
    <title>{{ trans('panel.page_search') }}</title>
@endsection

@section('content')
<!-- Hero Section -->
<section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
        <h1>{{ trans('panel.hero_1') }}</h1>
        <h2>- {{ trans('panel.site_title') }} -</h2>
        @guest
            @if (Route::has('login'))
                <a href="{{ route('login') }}" class="btn-get-started scrollto">{{ trans('global.login') }}</a>
            @endif
        @else
            <a href="#restaurants" class="btn-get-started scrollto">{{ trans('panel.popular_restaurants') }}</a>
        @endguest
    </div>
</section><!-- End Hero -->
    
<!-- Restaurants Section -->
<section id="restaurants" class="restaurants section-bg">
    <div class="container">
        <div class="row">
            <!-- Left Info -->
            <div class="col-lg-8 restaurants-topic">
                <h4>{{ trans('panel.popular_restaurants') }}</h4>
            </div>

            <!-- Right Info -->
            <div class="col-lg-4 restaurants-search">
                <form action="" method="POST">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"></path>
                    </svg>

                    <input type="search" name="search" placeholder="{{ trans('panel.example_search') }}"><input type="submit" value="{{ trans('global.search') }}">
                </form>
            </div>
        </div>

        <div class="row">
            <!-- Left Info -->
            <div class="col-lg-2 menu-filter">
                <hr>
                <div class="section-title" data-aos="fade-right">
                    <strong>{{ trans('global.categories') }}</strong><br>
                        
                    <div class="checkbox">
                        @foreach($categories as $key => $category)
                            <label><input type="checkbox" value="{{ $category->title }}"> {{ $category->title }}</label><br>
                        @endforeach
                    </div>
                </div>
                <div class="section-title" data-aos="fade-right">
                    <strong>{{ trans('global.star_rating') }}</strong><br>

                    <div class="radio">
                        <label><input type="radio" value="4.0" name="rating"> &GreaterEqual; 4.0</label><br>
                        <label><input type="radio" value="3.5" name="rating"> &GreaterEqual; 3.5</label><br>
                        <label><input type="radio" value="3.0" name="rating"> &GreaterEqual; 3.0</label><br>
                    </div>
                </div>
                {{-- <div class="section-title" data-aos="fade-right">
                    <strong>{{ trans('global.cities') }}</strong><br>
                        
                    <select class="form-select">
                        <option selected>Choose...</option>
                        <option value="Bangkok">Bangkok</option>
                        <option value="Pathum Thani">Pathum Thani</option>
                        <option value="Chonburi">Chonburi</option>
                    </select>
                </div> --}}
            </div>

            <!-- Right Info -->
            <div class="col-lg-10">
                <div class="row">
                    @for($i = 0; $i < count($restaurants); $i++)
                        <div class="col-md-6 align-items-stretch mt-4">
                            <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                                <h4><a href="/details/{{ $restaurants[$i]->name }}">{{ $restaurants[$i]->name }}</a></h4>

                                <span class="star-rate">{{ $reviews[$i]['score_reviews'] }} <i class="fa fa-star"></i></span>
                                <span style="padding-left: 5px;">{{ $reviews[$i]['count_reviews'] }} </span>
                                @if ($reviews[$i]['count_reviews'] >= 2)
                                    <span>{{ trans('global.reviews') }}</span>
                                @else
                                    <span>{{ trans('global.review') }}</span>
                                @endif

                                <p>
                                    <strong>{{ trans('global.category') }}:</strong> {{ $restaurants[$i]->category->title }}<br>
                                    <strong>{{ trans('global.phone') }}:</strong> {{ $restaurants[$i]->telephone }}<br>
                                    <strong>{{ trans('global.address') }}:</strong> {{ $restaurants[$i]->address }}
                                </p>
                                    
                                <hr>
                                {{-- <img src="{{ asset('img/hero-bg.jpg') }}" alt="Restaurant" style="width:60%;  margin-left: auto; margin-right: auto; display: block;"> --}}

                                {{-- <img src="{{ asset('storage/'. $restaurant->image) }}"> --}}

                                <div class="slideshow-container" id="group-img{{ $i }}">

                                    @for ($j = 0; $j < count($restaurants[$i]->images); $j++)
                                        <div class="mySlides">
                                            <img src="{{ asset('storage/' . $restaurants[$i]->images[$j]->path) }}">
                                            <div class="text">{{ $j+1 }} / {{ count($restaurants[$i]->images) }}</div>
                                        </div>
                                    @endfor

                                    <a class="prev" onclick="plusSlides(-1, {{ $i }})">&#10094;</a>
                                    <a class="next" onclick="plusSlides(1, {{ $i }})">&#10095;</a>
                                </div>



                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
</section><!-- End Restaurants Section -->
@endsection

@section('styles')
<style>
    * {
        /* box-sizing: border-box */
    }

    .mySlides {
        display: none
    }

    img {
        vertical-align: middle;
        width: 100%;
        height: 200px;
        /* max-height: 1000px; */
        object-fit: cover;
    }

    /* Slideshow container */
    .slideshow-container {
        /* max-width: 500px; */
        width: 70%;
        position: relative;
        margin: auto;
    }

    /* Next & previous buttons */
    .prev,
    .next {
        cursor: pointer;
        position: absolute;
        top: 50%;
        width: auto;
        padding: 16px;
        margin-top: -22px;
        color: white;
        font-weight: bold;
        font-size: 18px;
        transition: 0.6s ease;
        border-radius: 0 3px 3px 0;
        user-select: none;
    }

    /* Position the "next button" to the right */
    .next {
        right: 0;
        border-radius: 3px 0 0 3px;
    }

    /* On hover, add a grey background color */
    .prev:hover,
    .next:hover {
        background-color: #f1f1f1;
        color: black;
    }

    /* Caption text */
    .text {
        color: #f2f2f2;
        font-size: 15px;
        padding: 8px 12px;
        position: absolute;
        bottom: 8px;
        width: 100%;
        text-align: center;
    }
</style>
@endsection

@section('scripts')
<script>
    var slideIndex = [];
    @for ($i = 0; $i < count($restaurants); $i++)
        slideIndex.push(1);
    @endfor

    @for ($i = 0; $i < count($restaurants); $i++)
        showSlides(1, {{ $i }});
    @endfor

    function plusSlides(n, no) {
        showSlides(slideIndex[no] += n, no);
    }

    function showSlides(n, no) {
        var i;
        var x = document.getElementById("group-img" + no).getElementsByClassName("mySlides");
        if (n > x.length) {
            slideIndex[no] = 1
        }
        if (n < 1) {
            slideIndex[no] = x.length
        }
        for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
        }
        x[slideIndex[no] - 1].style.display = "block";
    }
</script>
@endsection