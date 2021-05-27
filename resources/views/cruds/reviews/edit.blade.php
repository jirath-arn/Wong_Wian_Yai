@extends('layouts.app')

@section('head')
    <title>{{ trans('panel.page_') }}{{ trans('global.edit') }} {{ trans('cruds.review.title_singular') }}</title>
@endsection

@section('content')
<!-- Hero Section -->
<section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
        <h1>{{ trans('global.edit') }} {{ trans('cruds.review.title_singular') }}</h1>
        <h2>- {{ trans('panel.site_title') }} -</h2>
    </div>
</section><!-- End Hero -->
    
<!-- Reviews Section -->
<section id="reviews" class="reviews section-bg">
    <div class="container">

        <!-- Review Info -->
        <div class="row justify-content-md-center">
            <div class="col-lg-9">
                <div class="col-md-12 align-items-stretch mt-4">
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                        <h2 style="text-align: center;"><a href="#reviews">{{ trans('global.edit') }} {{ trans('cruds.review.title_singular') }}</a></h2><br>
                        
                        <div class="row justify-content-md-center">
                            <div style="width: 60%;">
                                <form action="{{ route('reviews.update', $review->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <!-- Score -->
                                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                        <label for="rating">{{ trans('cruds.review.fields.score') }}*</label>
                                        <div class="rate">
                                            <fieldset class="score-rating">
                                                <input {{ ($review->score == 5) ? 'checked':'' }} type="radio" id="star5_full" name="rating" value="5"><label class="full" for="star5_full" title="{{ trans('panel.rating.excellent', ['num' => '5']) }}"></label>
                                                <input {{ ($review->score == 4.5) ? 'checked':'' }} type="radio" id="star4_half" name="rating" value="4.5"><label class="half" for="star4_half" title="{{ trans('panel.rating.excellent', ['num' => '4.5']) }}"></label>
                                                <input {{ ($review->score == 4) ? 'checked':'' }} type="radio" id="star4_full" name="rating" value="4"><label class="full" for="star4_full" title="{{ trans('panel.rating.Great', ['num' => '4']) }}"></label>
                                                <input {{ ($review->score == 3.5) ? 'checked':'' }} type="radio" id="star3_half" name="rating" value="3.5"><label class="half" for="star3_half" title="{{ trans('panel.rating.Great', ['num' => '3.5']) }}"></label>
                                                <input {{ ($review->score == 3) ? 'checked':'' }} type="radio" id="star3_full" name="rating" value="3"><label class="full" for="star3_full" title="{{ trans('panel.rating.Good', ['num' => '3']) }}"></label>
                                                <input {{ ($review->score == 2.5) ? 'checked':'' }} type="radio" id="star2_half" name="rating" value="2.5"><label class="half" for="star2_half" title="{{ trans('panel.rating.Good', ['num' => '2.5']) }}"></label>
                                                <input {{ ($review->score == 2) ? 'checked':'' }} type="radio" id="star2_full" name="rating" value="2"><label class="full" for="star2_full" title="{{ trans('panel.rating.ok', ['num' => '2']) }}"></label>
                                                <input {{ ($review->score == 1.5) ? 'checked':'' }} type="radio" id="star1_half" name="rating" value="1.5"><label class="half" for="star1_half" title="{{ trans('panel.rating.ok', ['num' => '1.5']) }}"></label>
                                                <input {{ ($review->score == 1) ? 'checked':'' }} type="radio" id="star1_full" name="rating" value="1"><label class="full" for="star1_full" title="{{ trans('panel.rating.bad', ['num' => '1']) }}"></label>
                                                <input {{ ($review->score == 0.5) ? 'checked':'' }} type="radio" id="star0_half" name="rating" value="0.5"><label class="half" for="star0_half" title="{{ trans('panel.rating.bad', ['num' => '0.5']) }}"></label>
                                            </fieldset>
                                        </div>
                                        @if($errors->has('title'))
                                            <p class="help-block" style="color: #CD1201;">{{ $errors->first('title') }}</p>
                                        @endif
                                    </div><br><br>

                                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                        <label for="description">{{ trans('cruds.review.fields.description') }}*</label>
                                        <textarea class="description" name="description" style="height: 100%;">{{ $review->description }}</textarea>
                                        @if($errors->has('description'))
                                            <p class="help-block" style="color: #CD1201;">{{ $errors->first('description') }}</p>
                                        @endif
                                    </div><br>

                                    <!-- Save -->
                                    <div class="row justify-content-md-center">
                                        <input class="btn btn-model btn-flat" type="submit" style="width: 100px;" value="{{ trans('global.save') }}">
                                    </div>
                                </form>
                            <div>
                        <div>

                    </div><!-- End icon-box -->
                </div>
            </div>
        </div>
    </div>
</section><!-- End Section -->
@endsection

@section('styles')
<style>
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
@endsection