@extends('layouts.app')

@section('head')
    <title>{{ trans('panel.page_') }}{{ trans('cruds.role.title') }}</title>
@endsection

@section('content')
<!-- Hero Section -->
<section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
        <h1>{{ trans('cruds.role.title') }}</h1>
        <h2>- {{ trans('panel.site_title') }} -</h2>
    </div>
</section><!-- End Hero -->
    
<!-- Roles Section -->
<section id="roles" class="roles section-bg">
    <div class="container">

        <!-- Role Info -->
        <div class="row justify-content-md-center">
            <div class="col-lg-9">
                <div class="col-md-12 align-items-stretch mt-4">
                    <div class="icon-box" data-aos="zoom-in" data-aos-delay="50">
                        <h2 style="text-align: center;"><a href="#roles">{{ trans('cruds.role.title') }}</a></h2><br>
                        
                        <!-- Card -->
                        <div class="card">
                            <div class="card-header">
                                {{ trans('cruds.role.title_singular') }} {{ trans('global.list') }}
                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover datatable datatable-Role">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>{{ trans('cruds.role.fields.id') }}</th>
                                                <th>{{ trans('cruds.role.fields.title') }}</th>
                                                <th>{{ trans('global.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($roles as $key => $role)
                                                <tr data-entry-id="{{ $role->id }}">
                                                    <td></td>
                                                    <td>{{ $role->id ?? '' }}</td>
                                                    <td>{{ $role->title ?? '' }}</td>
                                                    <td>
                                                        @can('role_show')
                                                            <button type="button" class="btn btn-xs btn-primary" id="btn-view" data-id="{{ $role->id }}" data-toggle="modal" data-target="#viewModel">{{ trans('global.view') }}</button>
                                                        @endcan

                                                        @can('role_edit')
                                                            <a class="btn btn-xs btn-info" href="{{ route('roles.edit', $role->id) . '#roles' }}">{{ trans('global.edit') }}</a>
                                                        @endcan

                                                        @can('role_delete')
                                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
                                <h4 class="modal-title">{{ trans('global.create') }} {{ trans('cruds.role.title_singular') }}</h4>
                            </div>
                            <div class="modal-body">
                                <form id="createForm" name="createForm" class="form-horizontal" novalidate="">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="title" name="title" placeholder="{{ trans('cruds.role.fields.title') }}*" value="{{ old('title', null) }}">
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
                                <h4 class="modal-title">{{ trans('global.show') }} {{ trans('cruds.role.title_singular') }}</h4>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th>{{ trans('cruds.role.fields.id') }}</th>
                                            <td id="role_id"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.role.fields.title') }}</th>
                                            <td id="role_title">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.role.fields.created_at') }}</th>
                                            <td id="role_created_at"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.role.fields.updated_at') }}</th>
                                            <td id="role_updated_at"></td>
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
            
            $.get('roles/' + id, function (data) {
                $('#viewModel').modal('show');
                $('#role_id').html(data.data.id);
                $('#role_title').html(data.data.title);
     
                var created_at = new Date(data.data.created_at);
                $('#role_created_at').html(created_at.toLocaleString());
     
                var updated_at = new Date(data.data.updated_at);
                $('#role_updated_at').html(updated_at.toLocaleString());
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
                url: "{{ route('roles.store') }}",
                data: {
                    title: jQuery('#title').val()
                },
                
                success: function (data) {
                    jQuery('#createForm').trigger("reset");
                    jQuery('#createModel').modal('hide');
                    window.location.hash = "#roles";
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

        @can('role_create')
            let addButtonTrans = '{{ trans('global.add') }} {{ trans('cruds.role.title_singular') }}'
            let addButton = {
                text: addButtonTrans,
                className: 'btn-success',
                
                action: function (e, dt, node, config) {
                    jQuery('#createForm').trigger("reset");
                    jQuery('#createModel').modal('show');
                }
            }
            dtButtons.push(addButton)
        @endcan

        /****************************************
         * Delete Selected
         ****************************************/

        @can('role_delete')
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
                            url: '{{ route('roles.massDestroy') }}',
                            data: {
                                ids: ids
                            },
                
                            success: function (data) {
                                window.location.hash = "#roles";
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
  
        $('.datatable-Role:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        });
    })
</script>
@endsection