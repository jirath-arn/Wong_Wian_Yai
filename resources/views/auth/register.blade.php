@extends('layouts.auth')

@section('head')
    <title>{{ trans('panel.page_register') }}</title>
@endsection

@section('content')
<div class="login-box">
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg"><a href="{{ url('/') }}">{{ trans('panel.site_title') }}</a></p><br>
            <form action="{{ route('register') }}" method="POST">
                {{ csrf_field() }}

                <div class="form-group">
                    <input type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" required autofocus placeholder="{{ trans('global.username') }}" name="username" value="{{ old('username', null) }}" autocomplete="username">
                    @if($errors->has('username'))
                        <div class="invalid-feedback">
                            {{ $errors->first('username') }}
                        </div>
                    @endif
                </div>
                
                <div class="form-group">
                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.email') }}" name="email" value="{{ old('email', null) }}" autocomplete="email">
                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.password') }}" name="password" autocomplete="new-password">
                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <input type="password" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.password_confirm') }}" name="password_confirmation" autocomplete="new-password">
                    @if($errors->has('password_confirmation'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password_confirmation') }}
                        </div>
                    @endif
                </div>

                <!-- Checkbox -->
                <div class="row">
                    <div class="col-8" style="padding-top: 10px">
                        @if (Route::has('login'))
                            <a class="forgot-password" href="{{ route('login') }}">
                                {{ trans('global.have_an_account') }}
                            </a>
                        @endif
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('global.register') }}</button>
                    </div>
                </div>
            </form>
        </div><!-- End card-body -->
    </div>
</div>
@endsection