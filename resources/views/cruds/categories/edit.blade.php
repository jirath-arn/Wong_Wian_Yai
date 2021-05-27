@extends('layouts.app')

@section('head')
    <title>{{ trans('panel.page_') }}{{ trans('global.edit') }} {{ trans('cruds.category.title_singular') }}</title>
@endsection

@section('content')
<!-- Hero Section -->
<section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
        <h1>{{ trans('global.edit') }} {{ trans('cruds.category.title_singular') }}</h1>
        <h2>- {{ trans('panel.site_title') }} -</h2>
    </div>
</section><!-- End Hero -->
    
<!-- Categories Section -->
<section id="categories" class="categories section-bg">
    <div class="container">

        <!-- Category Info -->
        <div class="row justify-content-md-center">
            <div class="col-lg-9">
                <div class="col-md-12 align-items-stretch mt-4">
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                        <h2 style="text-align: center;"><a href="#categories">{{ trans('global.edit') }} {{ trans('cruds.category.title_singular') }}</a></h2><br>
                        
                        <div class="row justify-content-md-center">
                            <div style="width: 60%;">
                                <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <!-- Title -->
                                    <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                                        <label for="title">{{ trans('cruds.category.fields.title') }}*</label>
                                        <input type="text" id="title" name="title" class="form-control" value="{{ old('title', isset($category) ? $category->title : '') }}">
                                        @if($errors->has('title'))
                                            <p class="help-block" style="color: #CD1201;">{{ $errors->first('title') }}</p>
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