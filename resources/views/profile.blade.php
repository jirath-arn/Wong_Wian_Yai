@extends('layouts.app')

@section('head')
    <title>{{ trans('panel.page_') }}{{ trans('cruds.profile.title') }}</title>
@endsection

@section('content')
<!-- Hero Section -->
<section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
        <h1>{{ trans('cruds.profile.title') }}</h1>
        <h2>- {{ trans('panel.site_title') }} -</h2>
    </div>
</section><!-- End Hero -->
    
<!-- Profiles Section -->
<section id="profiles" class="profiles section-bg">
    <div class="container">

        <!-- Profile Info -->
        <div class="row justify-content-md-center">
            <div class="col-lg-9">
                <div class="col-md-12 align-items-stretch mt-4">
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                        <h2 style="text-align: center;"><a href="#profiles">{{ trans('cruds.profile.title') }}</a></h2><br>
                        
                        <div class="row justify-content-md-center">
                            <div style="width: 60%;">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th>{{ trans('cruds.profile.fields.id') }}</th>
                                            <td>{{ $user->id }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.profile.fields.username') }}</th>
                                            <td>{{ $user->username }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.profile.fields.roles') }}</th>
                                            <td>
                                                @foreach($user->roles as $key => $item)
                                                    <span class="badge badge-info">{{ $item->title }}</span>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.profile.fields.email') }}</th>
                                            <td>{{ $user->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.profile.fields.email_verified_at') }}</th>
                                            <td>{{ $user->email_verified_at }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.profile.fields.count_restaurant') }}</th>
                                            <td>{{ count($user->restaurants) }}</td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.profile.fields.count_review') }}</th>
                                            <td>{{ count($user->reviews) }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            <div>
                        <div>

                    </div><!-- End icon-box -->
                </div>
            </div>
        </div>
    </div>
</section><!-- End Section -->
@endsection