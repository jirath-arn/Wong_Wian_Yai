@extends('layouts.app')

@section('head')
    <title>{{ trans('panel.page_') }}{{ trans('cruds.permission.title') }}</title>
@endsection

@section('content')
<!-- Hero Section -->
<section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
        <h1>{{ trans('cruds.permission.title') }}</h1>
        <h2>- {{ trans('panel.site_title') }} -</h2>
    </div>
</section><!-- End Hero -->
    
<!-- Permissions Section -->
<section id="permissions" class="permissions section-bg">
    <div class="container">

        <!-- Permission Info -->
        <div class="row justify-content-md-center">
            <div class="col-lg-9">
                <div class="col-md-12 align-items-stretch mt-4">
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                        <h2 style="text-align: center;"><a href="#permissions">{{ trans('cruds.permission.title') }}</a></h2><br>
                        
                        <!-- Card -->
                        <div class="card">
                            <div class="card-header">
                                {{ trans('cruds.permission.title_singular') }} {{ trans('global.list') }}
                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover datatable datatable-Permission">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>{{ trans('cruds.permission.fields.id') }}</th>
                                                <th>{{ trans('cruds.permission.fields.title') }}</th>
                                                <th>{{ trans('global.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($permissions as $key => $permission)
                                                <tr data-entry-id="{{ $permission->id }}">
                                                    <td></td>
                                                    <td>{{ $permission->id ?? '' }}</td>
                                                    <td>{{ $permission->title ?? '' }}</td>
                                                    <td>
                                                        @can('permission_show')
                                                            <button type="button" class="btn btn-xs btn-primary" id="btn-view" data-id="{{ $permission->id }}" data-toggle="modal" data-target="#viewModel">{{ trans('global.view') }}</button>
                                                        @endcan

                                                        @can('permission_edit')
                                                            <a class="btn btn-xs btn-info" href="{{ route('permissions.edit', $permission->id) . '#permissions' }}">{{ trans('global.edit') }}</a>
                                                        @endcan

                                                        @can('permission_delete')
                                                            <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
                                <h4 class="modal-title">{{ trans('global.show') }} {{ trans('cruds.permission.title_singular') }}</h4>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th>{{ trans('cruds.permission.fields.id') }}</th>
                                            <td id="permission_id"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.permission.fields.title') }}</th>
                                            <td id="permission_title"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.permission.fields.created_at') }}</th>
                                            <td id="permission_created_at"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.permission.fields.updated_at') }}</th>
                                            <td id="permission_updated_at"></td>
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
            
            $.get('permissions/' + id, function (data) {

                $('#viewModel').modal('show');
                $('#permission_id').html(data.data.id);
                $('#permission_title').html(data.data.title);
     
                var created_at = new Date(data.data.created_at);
                $('#permission_created_at').html(created_at.toLocaleString());
     
                var updated_at = new Date(data.data.updated_at);
                $('#permission_updated_at').html(updated_at.toLocaleString());
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

        @can('permission_create')
            let addButtonTrans = '{{ trans('global.add') }} {{ trans('cruds.permission.title_singular') }}'
            let addButton = {
                text: addButtonTrans,
                className: 'btn-success',
                
                action: function (e, dt, node, config) {
                    window.location.href = '/permissions/create#permissions';
                }
            }
            dtButtons.push(addButton)
        @endcan

        /****************************************
         * Delete Selected
         ****************************************/

        @can('permission_delete')
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
                            url: '{{ route('permissions.massDestroy') }}',
                            data: {
                                ids: ids
                            },
                
                            success: function (data) {
                                window.location.hash = "#permissions";
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
  
        $('.datatable-Permission:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        });
    })
</script>
@endsection