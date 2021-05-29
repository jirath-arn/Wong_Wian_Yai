@extends('layouts.app')

@section('head')
    <title>{{ trans('panel.page_') }}{{ trans('global.edit') }} {{ trans('cruds.restaurant.title_singular') }}</title>
@endsection

@section('content')
<!-- Hero Section -->
<section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
        <h1>{{ trans('global.edit') }} {{ trans('cruds.restaurant.title_singular') }}</h1>
        <h2>- {{ trans('panel.site_title') }} -</h2>
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
                        <h2 style="text-align: center;"><a href="#restaurants">{{ trans('global.edit') }} {{ trans('cruds.restaurant.title_singular') }}</a></h2><br>
                        
                        <div class="row justify-content-md-center">
                            <div style="width: 60%;">
                                <form action="{{ route("restaurants.update", $restaurant->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <!-- Name -->
                                    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                                        <label for="name">{{ trans('cruds.restaurant.fields.name') }}*</label>
                                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($restaurant) ? $restaurant->name : '') }}" autocomplete="name">
                                        @if($errors->has('name'))
                                            <p class="help-block" style="color: #CD1201;">{{ $errors->first('name') }}</p>
                                        @endif
                                    </div><br>

                                    <!-- Category -->
                                    {{-- <div class="form-group {{ $errors->has('categories') ? 'has-error' : '' }}">
                                        <label for="categories">{{ trans('cruds.restaurant.fields.category_id') }}*</label>
                                        <select name="categories" id="categories" class="form-control select2" required>
                                            @foreach($categories as $id => $categories)
                                                <option value="{{ $id }}" {{ isset($restaurant) && $restaurant->category->contains($id)) ? 'selected' : '' }}>{{ $categories }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('categories'))
                                            <p class="help-block">
                                                {{ $errors->first('categories') }}
                                            </p>
                                        @endif
                                    </div><br> --}}

                                    <!-- Description -->
                                    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                                        <label for="description">{{ trans('cruds.restaurant.fields.description') }}*</label>
                                        <textarea id="description" name="description" style="width: 100%;" rows="5">{{ old('description', isset($restaurant) ? $restaurant->description : '') }}</textarea>
                                        @if($errors->has('description'))
                                            <p class="help-block" style="color: #CD1201;">{{ $errors->first('description') }}</p>
                                        @endif
                                    </div><br>

                                    <!-- File -->
                                    <div class="form-group {{ $errors->has('images') ? 'has-error' : '' }}">
                                        <label for="images">{{ trans('cruds.restaurant.fields.images') }}*</label>
                                        <input type="file" id="images" name="images[]" multiple class="form-control" accept="image/*">
                                        @if($errors->has('images'))
                                            <p class="help-block" style="color: #CD1201;">{{ $errors->first('images') }}</p>
                                        @endif
                                    </div><br>

                                    <!-- Telephone -->
                                    <div class="form-group {{ $errors->has('telephone') ? 'has-error' : '' }}">
                                        <label for="telephone">{{ trans('cruds.restaurant.fields.telephone') }}*</label>
                                        <input type="tel" id="telephone" name="telephone" class="form-control" value="{{ old('telephone', isset($restaurant) ? $restaurant->telephone : '') }}" autocomplete="telephone">
                                        @if($errors->has('telephone'))
                                            <p class="help-block" style="color: #CD1201;">{{ $errors->first('telephone') }}</p>
                                        @endif
                                    </div><br>

                                    <!-- Address -->
                                    <div class="form-group {{ $errors->has('address') ? 'has-error' : '' }}">
                                        <label for="address">{{ trans('cruds.restaurant.fields.address') }}*</label>
                                        <textarea id="address" name="address" style="width: 100%;" rows="3">{{ old('address', isset($restaurant) ? $restaurant->address : '') }}</textarea>
                                        @if($errors->has('address'))
                                            <p class="help-block" style="color: #CD1201;">{{ $errors->first('address') }}</p>
                                        @endif
                                    </div><br>

                                    <!-- Website -->
                                    <div class="form-group {{ $errors->has('website') ? 'has-error' : '' }}">
                                        <label for="website">{{ trans('cruds.restaurant.fields.website') }}</label>
                                        <input type="text" id="website" name="website" class="form-control" value="{{ old('website', isset($restaurant) ? $restaurant->website : '') }}" autocomplete="website">
                                        @if($errors->has('website'))
                                            <p class="help-block" style="color: #CD1201;">{{ $errors->first('website') }}</p>
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