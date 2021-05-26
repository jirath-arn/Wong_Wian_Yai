@extends('layouts.auth')

@section('head')
    <title>{{ trans('panel.page_') }}{{ trans('global.login') }}</title>
@endsection

@section('content')
<div class="login-box">
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg"><a href="{{ url('/') }}">{{ trans('panel.site_title') }}</a></p><br>
            <form action="{{ route('login') }}" method="POST">
                {{ csrf_field() }}
                
                <div class="form-group">
                    <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" required autofocus placeholder="{{ trans('global.email') }}" name="email" value="{{ old('email', null) }}">
                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" required placeholder="{{ trans('global.password') }}" name="password">
                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>

                <!-- Checkbox -->
                <div class="row">
                    <div class="col-8">
                        <div class="checkbox">
                            <label><input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>{{ trans('global.remember_me') }}</label>
                        </div>
                    </div>

                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('global.login') }}</button>
                    </div>
                </div>
            </form>

            <p class="mb-1" style="padding-top: 10px;">
                @if (Route::has('password.request'))
                    <a class="forgot-password" href="#" id="forgot-password">
                        {{ trans('global.forgot_password') }}
                    </a>
                @endif
                
                @if (Route::has('password.request') && Route::has('register'))
                    |
                @endif

                @if (Route::has('register'))
                    <a class="forgot-password" href="{{ route('register') }}">
                        {{ trans('global.register') }}
                    </a>
                @endif
            </p>
            
            <div class="modal fade" id="formModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">{{ trans('global.password_reset') }}</h4>
                        </div>
                        <div class="modal-body">
                            <form id="myForm" name="myForm" class="form-horizontal" novalidate="">
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" name="email" placeholder="{{ trans('global.email') }}" value="{{ old('email', null) }}">
                                </div>
                            </form>
                        </div>
    
                        <!-- Send Password Reset Link Button -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary btn-flat" id="btn-send-password">{{ trans('global.send_password_reset') }}</button>
                        </div>
                    </div>
                </div>
            </div><!-- End formModal -->

        </div><!-- End card-body -->
    </div>
</div>
@endsection

@section('scripts')
    <script>
        jQuery(document).ready(function($) {
            //----- Open model Create -----//
            jQuery('#forgot-password').click(function () {
                jQuery('#btn-send-password').val("reset-password");
                jQuery('#myForm').trigger("reset");
                jQuery('#formModal').modal('show');
            });
            
            // Create Button
            jQuery('#btn-send-password').click(function (e) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                e.preventDefault();
                var formData = {
                    email: jQuery('#email').val(),
                };
                var type = "POST";
                var ajaxurl = '/password/email';
                $.ajax({
                    type: type,
                    url: ajaxurl,
                    data: formData,
                    dataType: 'json',
                    success: function (data) {
                        alert('Success!, please check the message in the email.');
                        jQuery('#myForm').trigger("reset");
                        jQuery('#formModal').modal('hide')
                    },
                    error: function (data) {
                        var res = JSON.parse(data.responseText);

                        if (data.status == 500) {
                            alert(res.message);
                        } else {
                            alert(res.errors.email[0]);
                        }
                    }
                });
            });
        });
    </script>
@endsection