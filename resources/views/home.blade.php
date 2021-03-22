@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    <!--button link to create Restaurant page-->
                    <form class="form-horizontal" role="form" method="get" action="{{ route('restaurant') }}">
                        <div class="form-group">
                            <div class="col-md-4 col-md-offset-4"> <br>
                                <button type="submit" class="btn btn-success btn-lg btn-block">สร้างร้านอาหาร</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
