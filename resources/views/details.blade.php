@extends('layouts.app')

@section('head')
    <title>{{ trans('panel.page_') }}{{ $restaurant[0]->name }}</title>
@endsection

@section('content')
<!-- Hero Section -->
<section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
        <h1>{{ $restaurant[0]->name }}</h1>
        <h2>- {{ $restaurant[0]->description }} -</h2>
    </div>
</section><!-- End Hero -->
    
<!-- Restaurants Section -->
<section id="restaurants" class="restaurants section-bg">
    <div class="container">
        <!-- Restaurant Info -->
        <div class="row justify-content-md-center">
            <div class="col-lg-9">
                <div class="col-md-12 align-items-stretch mt-4">
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                        <h2 style="text-align: center;"><a href="#restaurants">{{ $restaurant[0]->name }}</a></h2><br>
                        
                        <div class="slideshow-container" id="group-img">
                            @for ($j = 0; $j < count($restaurant[0]->images); $j++)
                                <div class="mySlides">
                                    <img src="{{ asset('storage/' . $restaurant[0]->images[$j]->path) }}">
                                    <div class="text">{{ $j+1 }} / {{ count($restaurant[0]->images) }}</div>
                                </div>
                            @endfor

                            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                            <a class="next" onclick="plusSlides(1)">&#10095;</a>
                        </div>
                        <hr>
                        
                        <span class="star-rate">{{ $rating['score_reviews'] }} <i class="fa fa-star"></i></span>
                        <span style="padding-left: 5px;">{{ $rating['count_reviews'] }} </span>
                        @if ($rating['count_reviews'] >= 2)
                            <span>{{ trans('global.reviews') }}</span>
                        @else
                            <span>{{ trans('global.review') }}</span>
                        @endif
                        
                        <p>
                            <strong>{{ trans('global.description') }}:</strong> {{ $restaurant[0]->description }}<br>
                            <strong>{{ trans('global.category') }}:</strong> {{ $restaurant[0]->category->title }}<br>
                            <strong>{{ trans('global.phone') }}:</strong> {{ $restaurant[0]->telephone }}<br>
                            <strong>{{ trans('global.address') }}:</strong> {{ $restaurant[0]->address }}<br>
                            <strong>{{ trans('global.website') }}:</strong>
                            @if ($restaurant[0]->website != null)
                                <a href="{{ $restaurant[0]->website }}" target="_blank"> {{ $restaurant[0]->website }}</a>
                            @else
                                -
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reviews Info -->
        <div class="row justify-content-md-center">
            <div class="col-lg-9">
                <div class="restaurants-topic" style="padding-top: 35px;">
                    <h4>{{ trans('global.reviews') }}</h4>
                </div>
                
                @if (count($reviews) > 0)
                    @foreach ($reviews as $review)
                        <div class="col-md-12 align-items-stretch mt-4">
                            <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">

                                @for($i = 0; $i < floor($review->score); $i++)
                                    <span class="fa fa-star" style="color: orange;"></span>
                                @endfor

                                @if (floor($review->score) != $review->score)
                                    <span class="fa fa-star-half-o" style="color: orange;"></span>
                                @endif

                                @for($i = ceil($review->score); $i < 5; $i++)
                                    <span class="fa fa-star-o" style="color: orange;"></span>
                                @endfor

                                <p>
                                    <strong>{{ $review->user->username }} :</strong> {{ $review->description }}<br><br>
                                    {{ $review->updated_at }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12 align-items-stretch mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="50" style="text-align: center;">
                            <span>{{ trans('global.no_reviews') }}</span>
                        </div>
                    </div>
                @endif

                <div class="row justify-content-md-center" style="padding-top: 35px;">
                    <div class="col-lg-4" style="text-align: center;">
                        {!! $reviews->links() !!}<br>
                        {{ trans('panel.page_of_results', ['currentPage' => $reviews->currentPage(), 'countPages' => $rating['count_pages']]) }}
                    </div>
                </div>
            </div>
        </div>


        <!-- Reviews Comment -->
        @auth
            <div class="row justify-content-md-center">
                <div class="col-lg-9">
                    <div class="restaurants-topic" style="padding-top: 35px;">
                        <h4>{{ trans('global.write_review') }}</h4>
                    </div>
                    
                    <div class="col-md-12 align-items-stretch mt-4">
                        <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                            <form action="{{ route('reviews.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                
                                <strong>{{ trans('global.star_rating') }}</strong><br>
                                <div class="rate">
                                    <fieldset class="score-rating">
                                        <input type="radio" id="star5_full" name="rating" value="5"><label class="full" for="star5_full" title="{{ trans('panel.rating.excellent', ['num' => '5']) }}"></label>
                                        <input type="radio" id="star4_half" name="rating" value="4.5"><label class="half" for="star4_half" title="{{ trans('panel.rating.excellent', ['num' => '4.5']) }}"></label>
                                        <input type="radio" id="star4_full" name="rating" value="4"><label class="full" for="star4_full" title="{{ trans('panel.rating.Great', ['num' => '4']) }}"></label>
                                        <input type="radio" id="star3_half" name="rating" value="3.5"><label class="half" for="star3_half" title="{{ trans('panel.rating.Great', ['num' => '3.5']) }}"></label>
                                        <input type="radio" id="star3_full" name="rating" value="3"><label class="full" for="star3_full" title="{{ trans('panel.rating.Good', ['num' => '3']) }}"></label>
                                        <input type="radio" id="star2_half" name="rating" value="2.5"><label class="half" for="star2_half" title="{{ trans('panel.rating.Good', ['num' => '2.5']) }}"></label>
                                        <input type="radio" id="star2_full" name="rating" value="2"><label class="full" for="star2_full" title="{{ trans('panel.rating.ok', ['num' => '2']) }}"></label>
                                        <input type="radio" id="star1_half" name="rating" value="1.5"><label class="half" for="star1_half" title="{{ trans('panel.rating.ok', ['num' => '1.5']) }}"></label>
                                        <input type="radio" id="star1_full" name="rating" value="1"><label class="full" for="star1_full" title="{{ trans('panel.rating.bad', ['num' => '1']) }}"></label>
                                        <input type="radio" id="star0_half" name="rating" value="0.5"><label class="half" for="star0_half" title="{{ trans('panel.rating.bad', ['num' => '0.5']) }}"></label>
                                    </fieldset>
                                </div><br><br>
                                
                                <strong>{{ trans('global.description') }}</strong><br>
                                <textarea name="description" style="width: 100%;" rows="7"></textarea><br>
                                <input type="hidden" name="restaurant_id" value="{{ $restaurant[0]->id }}">

                                <div class="row justify-content-md-center">
                                    <button type="submit" class="btn btn-primary btn-block btn-flat" style="width: 100px;">{{ trans('global.submit') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endauth
    </div>
</section><!-- End Restaurants Section -->
@endsection

@section('styles')
<style>
.mySlides {
    display: none
}

img {
    vertical-align: middle;
    width: 100%;
    height: 400px;
    object-fit: cover;
}

.slideshow-container {
    width: 70%;
    position: relative;
    margin: auto;
}

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

.next {
    right: 0;
    border-radius: 3px 0 0 3px;
}

.prev:hover,
.next:hover {
    background-color: #f1f1f1;
    color: black;
}

.text {
    color: #f2f2f2;
    font-size: 15px;
    padding: 8px 12px;
    position: absolute;
    bottom: 8px;
    width: 100%;
    text-align: center;
}

.btn-primary {
    color: #fff;
    background-color: #009970;
    border-color: #009970;
    box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
}

.btn-primary:hover {
    color: #fff;
    background-color: #00664b;
    border-color: #00664b;
}

.btn-primary.focus,
.btn-primary:focus {
    background-color: #00664b;
    border-color: #00664b;
    box-shadow: 0 1px 1px rgba(0, 0, 0, .075), 0 0 0 0.2rem rgba(0, 123, 255, .5);
}

.btn-primary.disabled,
.btn-primary:disabled {
    color: #fff;
    background-color: #00664b;
    border-color: #00664b;
}

.btn-primary:not(:disabled):not(.disabled).active,
.btn-primary:not(:disabled):not(.disabled):active,
.show>.btn-primary.dropdown-toggle {
    color: #fff;
    background-color: #009970;
    border-color: #009970
}

.btn-primary:not(:disabled):not(.disabled).active:focus,
.btn-primary:not(:disabled):not(.disabled):active:focus,
.show>.btn-primary.dropdown-toggle:focus {
    box-shadow: inset 0 3px 5px rgba(0, 0, 0, .125), 0 0 0 0.2rem rgba(0, 123, 255, .5)
}

.btn-block {
    display: block;
    width: 100%
}

.btn-block+.btn-block {
    margin-top: 0.5rem
}

input[type=button].btn-block,
input[type=reset].btn-block,
input[type=submit].btn-block {
    width: 100%
}

.btn-group-vertical .btn.btn-flat:first-of-type,
.btn-group-vertical .btn.btn-flat:last-of-type {
    border-radius: 0
}

.btn.btn-flat {
    border-radius: 0;
    box-shadow: none;
    border-width: 1px
}

.rate fieldset label { 
    margin: 0; padding: 0; 
}

.score-rating {
    border: none;
    float: left;
}

.score-rating > input {
    display: none;
}

.score-rating > label:before {
    margin: 5px;
    font-size: 1.25em;
    font-family: FontAwesome;
    display: inline-block;
    content: "\f005";
}

.score-rating > .half:before {
    content: "\f089";
    position: absolute;
}

.score-rating > label { 
    color: #ddd; 
    float: right; 
}

.score-rating > input:checked ~ label, /* show gold star when clicked */
.score-rating:not(:checked) > label:hover, /* hover current star */
.score-rating:not(:checked) > label:hover ~ label {
    color: orange;  
} /* hover previous stars in list */

.score-rating > input:checked + label:hover, /* hover current star when changing rating */
.score-rating > input:checked ~ label:hover,
.score-rating > label:hover ~ input:checked ~ label, /* lighten current selection */
.score-rating > input:checked ~ label:hover ~ label { 
    color: #FFC355;
}
</style>
@endsection

@section('scripts')
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector:'textarea.description',
        // width: 900,
        // height: 300,
    });
</script>

<script>
    var slideIndex = 1;
    showSlides(slideIndex);
    
    function plusSlides(n) {
      showSlides(slideIndex += n);
    }
  
    function showSlides(n) {
      var i;
      var slides = document.getElementById("group-img").getElementsByClassName("mySlides");
      if (n > slides.length) {slideIndex = 1}    
      if (n < 1) {slideIndex = slides.length}
      for (i = 0; i < slides.length; i++) {
          slides[i].style.display = "none";  
      }
      slides[slideIndex-1].style.display = "block";  
    }
</script>
@endsection