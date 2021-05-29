@extends('layouts.app')

@section('head')
    <title>{{ trans('panel.page_') }}{{ trans('cruds.restaurant.title') }}</title>
@endsection

@section('content')
<!-- Hero Section -->
<section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
        <h1>{{ trans('cruds.restaurant.title') }}</h1>
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
                        <h2 style="text-align: center;"><a href="#restaurants">{{ trans('cruds.restaurant.title') }}</a></h2><br>
                        
                        <!-- Card -->
                        <div class="card">
                            <div class="card-header">
                                {{ trans('cruds.restaurant.title_singular') }} {{ trans('global.list') }}
                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover datatable datatable-Restaurant">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>{{ trans('cruds.restaurant.fields.id') }}</th>
                                                <th>{{ trans('cruds.restaurant.fields.user_id') }}</th>
                                                <th>{{ trans('cruds.restaurant.fields.category_id') }}</th>
                                                <th>{{ trans('cruds.restaurant.fields.name') }}</th>
                                                <th>{{ trans('cruds.restaurant.fields.rating_star') }}</th>
                                                <th>{{ trans('cruds.restaurant.fields.count_reviews') }}</th>
                                                <th>{{ trans('global.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for($i = 0; $i < count($restaurants); $i++)
                                                <tr data-entry-id="{{ $restaurants[$i]->id }}">
                                                    <td></td>
                                                    <td>{{ $restaurants[$i]->id ?? '' }}</td>
                                                    <td>{{ $restaurants[$i]->user->username ?? '' }}</td>
                                                    <td>{{ $restaurants[$i]->category->title ?? '' }}</td>
                                                    <td>{{ $restaurants[$i]->name ?? '' }}</td>
                                                    <td>
                                                        <span class="star-rate">{{ $reviews[$i]['score_reviews'] }} <i class="fa fa-star"></i></span>
                                                    </td>
                                                    <td>{{ count($restaurants[$i]->reviews) ?? '' }} 
                                                        @if (count($restaurants[$i]->reviews) >= 2)
                                                            {{ trans('global.reviews') }}
                                                        @else
                                                            {{ trans('global.review') }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @can('restaurant_show')
                                                            <button type="button" class="btn btn-xs btn-primary" id="btn-view" data-id="{{ $restaurants[$i]->id }}" data-toggle="modal" data-target="#viewModel">{{ trans('global.view') }}</button>
                                                        @endcan

                                                        @can('restaurant_edit')
                                                            <a class="btn btn-xs btn-info" href="{{ route('restaurants.edit', $restaurants[$i]->id) . '#restaurants' }}">{{ trans('global.edit') }}</a>
                                                        @endcan

                                                        @can('restaurant_delete')
                                                            <form action="{{ route('restaurants.destroy', $restaurants[$i]->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                            </form>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- End Card -->
                    </div><!-- End icon-box -->
                </div>

                <!-- View Model -->
                <div class="modal fade" id="viewModel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{{ trans('global.show') }} {{ trans('cruds.restaurant.title_singular') }}</h4>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th>{{ trans('cruds.restaurant.fields.id') }}</th>
                                            <td id="restaurant_id"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.restaurant.fields.user_id') }}</th>
                                            <td id="restaurant_user_id"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.restaurant.fields.category_id') }}</th>
                                            <td id="restaurant_category_id"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.restaurant.fields.rating_star') }}</th>
                                            <td id="restaurant_rating_star"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.restaurant.fields.name') }}</th>
                                            <td id="restaurant_name"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.restaurant.fields.description') }}</th>
                                            <td id="restaurant_description"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.restaurant.fields.telephone') }}</th>
                                            <td id="restaurant_telephone"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.restaurant.fields.address') }}</th>
                                            <td id="restaurant_address"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.restaurant.fields.website') }}</th>
                                            <td id="restaurant_website"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.restaurant.fields.created_at') }}</th>
                                            <td id="restaurant_created_at"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.restaurant.fields.updated_at') }}</th>
                                            <td id="restaurant_updated_at"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                
                            <!-- Close Button -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger btn-flat" id="btn-close">{{ trans('global.close') }}</button>
                            </div>
                        </div>
                    </div>
                </div><!-- End View Modal -->
            </div>
        </div>
    </div>
</section><!-- End Section -->
@endsection

@section('scripts')
<script>
    jQuery(document).ready(function($) {
        
        // Show Button
        jQuery('body').on('click', '#btn-view', function (event) {
            event.preventDefault();
            var id = $(this).data('id');
            
            $.get('restaurants/' + id, function (data) {

                var star = '<span class="badge badge-info">' + data.rating.score_reviews + ' <i class="fa fa-star"></i></span>&nbsp;';
                star += '  (' + data.rating.count_reviews + '';

                if (data.rating.count_reviews >= 2) {
                    star += " {{ trans('global.reviews') }})";
                } else {
                    star += " {{ trans('global.review') }})";
                }

                $('#viewModel').modal('show');
                $('#restaurant_id').html(data.data.id);
                $('#restaurant_user_id').html(data.user.username);
                $('#restaurant_category_id').html(data.category.title);
                $('#restaurant_rating_star').html(star);
                $('#restaurant_name').html(data.data.name);
                $('#restaurant_description').html(data.data.description);
                $('#restaurant_telephone').html(data.data.telephone);
                $('#restaurant_address').html(data.data.address);
                $('#restaurant_website').html('<textarea style="width: 100%;" readonly>' + data.data.website + '</textarea>');
     
                var created_at = new Date(data.data.created_at);
                $('#restaurant_created_at').html(created_at.toLocaleString());
     
                var updated_at = new Date(data.data.updated_at);
                $('#restaurant_updated_at').html(updated_at.toLocaleString());
            });
        });
        
        jQuery('#btn-close').click(function (e) {
            jQuery('#viewModel').modal('hide');
        });
    });
</script>

<script>
    $(function () {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        
        /****************************************
         * Create
         ****************************************/

        @can('restaurant_create')
            let addButtonTrans = '{{ trans('global.add') }} {{ trans('cruds.restaurant.title_singular') }}'
            let addButton = {
                text: addButtonTrans,
                className: 'btn-success',
                
                action: function (e, dt, node, config) {
                    window.location.href = '/restaurants/create#restaurants';
                }
            }
            dtButtons.push(addButton)
        @endcan

        /****************************************
         * Delete Selected
         ****************************************/

        @can('restaurant_delete')
            let deleteButtonTrans = '{{ trans('global.delete_selected') }}'
            let deleteButton = {
                text: deleteButtonTrans,
                className: 'btn-danger',
    
                action: function (e, dt, node, config) {
                    var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
                        return $(entry).data('entry-id')
                    });
      
                    if (ids.length === 0) {
                        alert('{{ trans('global.zero_selected') }}')
                        return
                    }
      
                    if (confirm('{{ trans('global.areYouSure') }}')) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                            }
                        });
            
                        $.ajax({
                            type: 'POST',
                            url: '{{ route('restaurants.massDestroy') }}',
                            data: {
                                ids: ids
                            },
                
                            success: function (data) {
                                window.location.hash = "#restaurants";
                                location.reload();
                            },
                            error: function (data) {
                                var res = JSON.parse(data.responseText);

                                alert(res.message);
                            }
                        });
                    }
                }
            }
            dtButtons.push(deleteButton)
        @endcan
  
        $.extend(true, $.fn.dataTable.defaults, {
            order: [[ 1, 'desc' ]],
            pageLength: 10,
        });
  
        $('.datatable-Restaurant:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        });
    })
</script>
@endsection