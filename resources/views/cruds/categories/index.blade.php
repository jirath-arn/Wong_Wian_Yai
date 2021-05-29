@extends('layouts.app')

@section('head')
    <title>{{ trans('panel.page_') }}{{ trans('cruds.category.title') }}</title>
@endsection

@section('content')
<!-- Hero Section -->
<section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
        <h1>{{ trans('cruds.category.title') }}</h1>
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
                        <h2 style="text-align: center;"><a href="#categories">{{ trans('cruds.category.title') }}</a></h2><br>
                        
                        <!-- Card -->
                        <div class="card">
                            <div class="card-header">
                                {{ trans('cruds.category.title_singular') }} {{ trans('global.list') }}
                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover datatable datatable-Category">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>{{ trans('cruds.category.fields.id') }}</th>
                                                <th>{{ trans('cruds.category.fields.title') }}</th>
                                                <th>{{ trans('global.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($categories as $key => $category)
                                                <tr data-entry-id="{{ $category->id }}">
                                                    <td></td>
                                                    <td>{{ $category->id ?? '' }}</td>
                                                    <td>{{ $category->title ?? '' }}</td>
                                                    <td>
                                                        @can('category_show')
                                                            <button type="button" class="btn btn-xs btn-primary" id="btn-view" data-id="{{ $category->id }}" data-toggle="modal" data-target="#viewModel">{{ trans('global.view') }}</button>
                                                        @endcan

                                                        @can('category_edit')
                                                            <a class="btn btn-xs btn-info" href="{{ route('categories.edit', $category->id) . '#categories' }}">{{ trans('global.edit') }}</a>
                                                        @endcan

                                                        @can('category_delete')
                                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

                <!-- View Model -->
                <div class="modal fade" id="viewModel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">{{ trans('global.show') }} {{ trans('cruds.category.title_singular') }}</h4>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th>{{ trans('cruds.category.fields.id') }}</th>
                                            <td id="category_id"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.category.fields.title') }}</th>
                                            <td id="category_title"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.category.fields.created_at') }}</th>
                                            <td id="category_created_at"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.category.fields.updated_at') }}</th>
                                            <td id="category_updated_at"></td>
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
            
            $.get('categories/' + id, function (data) {

                $('#viewModel').modal('show');
                $('#category_id').html(data.data.id);
                $('#category_title').html(data.data.title);
     
                var created_at = new Date(data.data.created_at);
                $('#category_created_at').html(created_at.toLocaleString());
     
                var updated_at = new Date(data.data.updated_at);
                $('#category_updated_at').html(updated_at.toLocaleString());
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

        @can('category_create')
            let addButtonTrans = '{{ trans('global.add') }} {{ trans('cruds.category.title_singular') }}'
            let addButton = {
                text: addButtonTrans,
                className: 'btn-success',
                
                action: function (e, dt, node, config) {
                    window.location.href = '/categories/create#categories';
                }
            }
            dtButtons.push(addButton)
        @endcan

        /****************************************
         * Delete Selected
         ****************************************/

        @can('category_delete')
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
                            url: '{{ route('categories.massDestroy') }}',
                            data: {
                                ids: ids
                            },
                
                            success: function (data) {
                                window.location.hash = "#categories";
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
  
        $('.datatable-Category:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        });
    })
</script>
@endsection