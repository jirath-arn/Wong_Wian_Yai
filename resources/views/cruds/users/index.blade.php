@extends('layouts.app')

@section('head')
    <title>{{ trans('panel.page_') }}{{ trans('cruds.user.title') }}</title>
@endsection

@section('content')
<!-- Hero Section -->
<section id="hero" class="d-flex align-items-center">
    <div class="container text-center position-relative" data-aos="fade-in" data-aos-delay="200">
        <h1>{{ trans('cruds.user.title') }}</h1>
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
                        <h2 style="text-align: center;"><a href="#users">{{ trans('cruds.user.title') }}</a></h2><br>
                        
                        <!-- Card -->
                        <div class="card">
                            <div class="card-header">
                                {{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}
                            </div>
                            
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover datatable datatable-User">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>{{ trans('cruds.user.fields.id') }}</th>
                                                <th>{{ trans('cruds.user.fields.username') }}</th>
                                                <th>{{ trans('cruds.user.fields.email') }}</th>
                                                <th>{{ trans('cruds.user.fields.email_verified_at') }}</th>
                                                <th>{{ trans('cruds.user.fields.roles') }}</th>
                                                <th>{{ trans('global.actions') }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $key => $user)
                                                <tr data-entry-id="{{ $user->id }}">
                                                    <td></td>
                                                    <td>{{ $user->id ?? '' }}</td>
                                                    <td>{{ $user->username ?? '' }}</td>
                                                    <td>{{ $user->email ?? '' }}</td>
                                                    <td>{{ $user->email_verified_at ?? '' }}</td>
                                                    <td>
                                                        @foreach($user->roles as $key => $item)
                                                            <span class="badge badge-info">{{ $item->title }}</span>
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @can('user_show')
                                                            <button type="button" class="btn btn-xs btn-primary" id="btn-view" data-id="{{ $user->id }}" data-toggle="modal" data-target="#viewModel">{{ trans('global.view') }}</button>
                                                        @endcan

                                                        @can('user_edit')
                                                            <a class="btn btn-xs btn-info" href="{{ route('users.edit', $user->id) . '#users' }}">{{ trans('global.edit') }}</a>
                                                        @endcan

                                                        @can('user_delete')
                                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
                                <h4 class="modal-title">{{ trans('global.show') }} {{ trans('cruds.user.title_singular') }}</h4>
                            </div>
                            <div class="modal-body">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        <tr>
                                            <th>{{ trans('cruds.user.fields.id') }}</th>
                                            <td id="user_id"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.user.fields.username') }}</th>
                                            <td id="user_username"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.user.fields.roles') }}</th>
                                            <td id="user_roles"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.user.fields.email') }}</th>
                                            <td id="user_email"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.user.fields.email_verified_at') }}</th>
                                            <td id="user_email_verified_at"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.user.fields.created_at') }}</th>
                                            <td id="user_created_at"></td>
                                        </tr>
                                        <tr>
                                            <th>{{ trans('cruds.user.fields.updated_at') }}</th>
                                            <td id="user_updated_at"></td>
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
            
            $.get('users/' + id, function (data) {

                var roles = '';
                data.roles.forEach(element => {
                    roles += '<span class="badge badge-info">' + element.title + '</span><br>';
                });

                $('#viewModel').modal('show');
                $('#user_id').html(data.data.id);
                $('#user_username').html(data.data.username);
                $('#user_roles').html(roles);
                $('#user_email').html(data.data.email);
                $('#user_email_verified_at').html(data.data.email_verified_at);
     
                var created_at = new Date(data.data.created_at);
                $('#user_created_at').html(created_at.toLocaleString());
     
                var updated_at = new Date(data.data.updated_at);
                $('#user_updated_at').html(updated_at.toLocaleString());
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

        @can('user_create')
            let addButtonTrans = '{{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}'
            let addButton = {
                text: addButtonTrans,
                className: 'btn-success',
                
                action: function (e, dt, node, config) {
                    window.location.href = '/users/create#users';
                }
            }
            dtButtons.push(addButton)
        @endcan

        /****************************************
         * Delete Selected
         ****************************************/

        @can('user_delete')
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
                            url: '{{ route('users.massDestroy') }}',
                            data: {
                                ids: ids
                            },
                
                            success: function (data) {
                                window.location.hash = "#users";
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
  
        $('.datatable-User:not(.ajaxTable)').DataTable({ buttons: dtButtons })
        $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
            $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
        });
    })
</script>
@endsection