@extends('layouts.app')

@section('head')
    <title>{{ trans('panel.page_') }}{{ trans('cruds.review.title') }}</title>
@endsection

@section('content')
<!-- Hero Section -->
<section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
        <h1>{{ trans('cruds.review.title') }}</h1>
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
                        <h2 style="text-align: center;"><a href="#reviews">{{ trans('cruds.review.title') }}</a></h2><br>
                        
                        <!-- Card -->
                        <div class="card">
                            <div class="card-header">
                                {{ trans('cruds.review.title_singular') }} {{ trans('global.list') }}
                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover datatable datatable-Review">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>{{ trans('cruds.review.fields.id') }}</th>
                                                <th>{{ trans('cruds.review.fields.user_id') }}</th>
                                                <th>{{ trans('cruds.review.fields.restaurant_id') }}</th>
                                                <th>{{ trans('cruds.review.fields.description') }}</th>
                                                <th>{{ trans('cruds.review.fields.score') }}</th>
                                                <th>{{ trans('global.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($reviews as $key => $review)
                                                <tr data-entry-id="{{ $review->id }}">
                                                    <td></td>
                                                    <td>{{ $review->id ?? '' }}</td>
                                                    <td>{{ $review->user->username ?? '' }}</td>
                                                    <td>{{ $review->restaurant->name ?? '' }}</td>
                                                    <td>{{ $review->description ?? '' }}</td>
                                                    <td>{{ $review->score ?? '' }}</td>
                                                    <td>
                                                        @can('review_show')
                                                            <button type="button" class="btn btn-xs btn-primary" id="btn-view" data-id="{{ $review->id }}" data-toggle="modal" data-target="#viewModel">{{ trans('global.view') }}</button>
                                                        @endcan

                                                        @can('review_edit')
                                                            <a class="btn btn-xs btn-info" href="{{ route('reviews.edit', $review->id) . '#reviews' }}">{{ trans('global.edit') }}</a>
                                                        @endcan

                                                        @can('review_delete')
                                                            <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                                <input type="hidden" name="_method" value="DELETE">
                                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                            </form>
                                                        @endcan
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- End Card -->
                    </div><!-- End icon-box -->
                </div>
                
                <!-- Create Model -->
                <div class="modal fade" id="createModel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{{ trans('global.create') }} {{ trans('cruds.review.title_singular') }}</h4>
                            </div>
                            <div class="modal-body">
                                <form id="createForm" name="createForm" class="form-horizontal" novalidate="">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="description" name="description" placeholder="{{ trans('cruds.review.fields.description') }}*" value="{{ old('description', null) }}">
                                    </div><br>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="score" name="score" placeholder="{{ trans('cruds.review.fields.score') }}*" value="{{ old('score', null) }}">
                                    </div>
                                </form>
                            </div>
                
                            <!-- Button -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-model btn-flat" id="btn-create">{{ trans('global.create') }}</button>
                            </div>
                        </div>
                    </div>
                </div><!-- End Create Modal -->


                <!-- View Model -->
                <div class="modal fade" id="viewModel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{{ trans('global.show') }} {{ trans('cruds.review.title_singular') }}</h4>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th>{{ trans('cruds.review.fields.id') }}</th>
                                            <td id="review_id"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.review.fields.description') }}</th>
                                            <td id="review_description">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.review.fields.score') }}</th>
                                            <td id="review_score">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.review.fields.created_at') }}</th>
                                            <td id="review_created_at"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.review.fields.updated_at') }}</th>
                                            <td id="review_updated_at"></td>
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
            
            $.get('reviews/' + id, function (data) {
                $('#viewModel').modal('show');
                $('#review_id').html(data.data.id);
                $('#review_description').html(data.data.description);
                $('#review_score').html(data.data.score);
     
                var created_at = new Date(data.data.created_at);
                $('#review_created_at').html(created_at.toLocaleString());
     
                var updated_at = new Date(data.data.updated_at);
                $('#review_updated_at').html(updated_at.toLocaleString());
            });
        });
        
        jQuery('#btn-close').click(function (e) {
            jQuery('#viewModel').modal('hide');
        });

        // Store
        jQuery('body').on('click', '#btn-create', function (event) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });
    
            event.preventDefault();
            $.ajax({
                type: 'POST',
                url: "{{ route('reviews.store') }}",
                data: {
                    title: jQuery('#title').val()
                },
                
                success: function (data) {
                    jQuery('#createForm').trigger("reset");
                    jQuery('#createModel').modal('hide');
                    window.location.hash = "#reviews";
                    location.reload();
                },
                error: function (data) {
                    var res = JSON.parse(data.responseText);

                    if (data.status == 500) {
                        alert(res.message);
                    } else {
                        alert(res.errors.title[0]);
                    }
                }
            });
        });
    });
</script>

<script>
    $(function () {
        let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
        
        /****************************************
         * Create
         ****************************************/

        @can('review_create')
            let addButtonTrans = '{{ trans('global.add') }} {{ trans('cruds.review.title_singular') }}'
            let addButton = {
                text: addButtonTrans,
                className: 'btn-success',
                
                action: function (e, dt, node, config) {
                    jQuery('#createForm').trigger("reset");
                    jQuery('#createModel').modal('show');
                }
            }
            // dtButtons.push(addButton)
        @endcan

        /****************************************
         * Delete Selected
         ****************************************/

        @can('review_delete')
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
                            url: '{{ route('reviews.massDestroy') }}',
                            data: {
                                ids: ids
                            },
                
                            success: function (data) {
                                window.location.hash = "#reviews";
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
  
        $('.datatable-Review:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        });
    })
</script>
@endsection