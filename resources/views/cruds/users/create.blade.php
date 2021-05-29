@extends('layouts.app')

@section('head')
    <title>{{ trans('panel.page_') }}{{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}</title>
@endsection

@section('content')
<!-- Hero Section -->
<section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
        <h1>{{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}</h1>
        <h2>- {{ trans('panel.site_title') }} -</h2>
    </div>
</section><!-- End Hero -->
    
<!-- Users Section -->
<section id="users" class="users section-bg">
    <div class="container">

        <!-- User Info -->
        <div class="row justify-content-md-center">
            <div class="col-lg-9">
                <div class="col-md-12 align-items-stretch mt-4">
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                        <h2 style="text-align: center;"><a href="#users">{{ trans('global.create') }} {{ trans('cruds.user.title_singular') }}</a></h2><br>
                        
                        <div class="row justify-content-md-center">
                            <div style="width: 60%;">
                                <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <!-- Username -->
                                    <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                                        <label for="username">{{ trans('cruds.user.fields.username') }}*</label>
                                        <input type="text" id="username" name="username" class="form-control" value="{{ old('username', isset($user) ? $user->username : '') }}" autocomplete="username">
                                        @if($errors->has('username'))
                                            <p class="help-block" style="color: #CD1201;">{{ $errors->first('username') }}</p>
                                        @endif
                                    </div><br>

                                    <!-- Email -->
                                    <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                                        <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
                                        <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}" autocomplete="email">
                                        @if($errors->has('email'))
                                            <p class="help-block" style="color: #CD1201;">{{ $errors->first('email') }}</p>
                                        @endif
                                    </div><br>

                                    <!-- Password -->
                                    <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                        <label for="password">{{ trans('cruds.user.fields.password') }}*</label>
                                        <input type="password" id="password" name="password" class="form-control" value="{{ old('password', isset($user) ? $user->password : '') }}" autocomplete="new-password">
                                        @if($errors->has('password'))
                                            <p class="help-block" style="color: #CD1201;">{{ $errors->first('password') }}</p>
                                        @endif
                                    </div><br>

                                    <!-- Confirm Password -->
                                    <div class="form-group {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                        <label for="password_confirmation">{{ trans('global.password_confirm') }}*</label>
                                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" value="{{ old('password', isset($user) ? $user->password : '') }}" autocomplete="new-password">
                                        @if($errors->has('password_confirmation'))
                                            <p class="help-block" style="color: #CD1201;">{{ $errors->first('password_confirmation') }}</p>
                                        @endif
                                    </div><br>

                                    <!-- Roles -->
                                    <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                                        <label for="roles">{{ trans('cruds.user.fields.roles') }}*
                                            <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                                            <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span>
                                        </label>
                                        <select name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>
                                            @foreach($roles as $id => $roles)
                                                <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('roles'))
                                            <p class="help-block">
                                                {{ $errors->first('roles') }}
                                            </p>
                                        @endif
                                    </div><br>

                                    <!-- Create -->
                                    <div class="row justify-content-md-center">
                                        <input class="btn btn-model btn-flat" type="submit" style="width: 100px;" value="{{ trans('global.create') }}">
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