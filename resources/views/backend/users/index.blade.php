@extends('adminlte::page')

@section('title', 'User Management')

@section('content_header')
    <h1>User Management</h1>
@stop

@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Info</h5>
            {{ $message }}
        </div>
    @endif

    <div class="row">

        <div class="col-md-12">


            <div class="card card-primary">

                <div class="card-header">
                    <h3 class="card-title">Daftar User</h3>
                </div>


                <div  class="card-body table-responsive">

                    <table id="users_table" style="width:100%" class="table table-bordered table-sm table-hover dataTable" role="grid">
                        <thead>
                        <tr role="row">
                            <th>No</th>
                            <th width="0">Nama</th>
                            <th>E-Mail</th>
                            <th>Kelamin</th>
                            <th>Foto</th>
                            <th>Role</th>
                            <th>Update</th>

                            <th style="width:20px">
                                @can('user-create')
                                    <a href="{{ URL::route('users.create') }}" data-toggle="modal" data-target="#createModal" class="btn btn-sm btn-success">Tambah</a>
                                @endcan
                            </th>
                        </thead>
                    </table>

                </div>

            </div>

        </div>

    </div>

@stop

<!-- :: SHOW MODAL :: ------------------>
<!-- :: CREATE :: ---------------------->
<div class="modal fade" id="createModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        </div>
    </div>
</div>

<!-- :: SHOW :: ---------------------->
<div class="modal fade" id="showModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        </div>
    </div>
</div>

<!-- :: EDIT :: ---------------------->
<div class="modal fade" id="editModal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        </div>
    </div>
</div>

<!-- :: CONFIRM DELETE :: -------------->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        </div>
    </div>
</div>

@section('plugins.Datatables', true)
@section('plugins.Toastr', true)
@section('plugins.Select2', true)

@section('css')
    {{--<link rel="stylesheet" href="/css/admin_custom.css">--}}
@stop

@section('js')
    <script>
        $(document).ready(function() {

            $('body').on('click', '[data-toggle="modal"]', function(){
                $($(this).data("target")+' .modal-content').load($(this).attr("href"));
            });

            // USER ADMIN TABLE
            oTable = $('#users_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('users.data', 'admin') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, width: "10"},

                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'kelamin', name: 'kelamin'},
                    {data: 'foto', name: 'foto'},
                    {data: 'role', name: 'role'},
                    {data: 'updated_at', name: 'updated_at'},

                    {data: 'action', name: 'action', orderable: false, searchable: false, width: "20px", "class" : "text-right"},
                ],
                buttons: [
                    {
                        text: 'Add New User',
                        className: 'add-new btn btn-primary mt-50',
                        attr: {
                            'data-toggle': 'modal',
                            'data-target': '#modals-slide-in'
                        },
                        init: function (api, node, config) {
                            $(node).removeClass('btn-secondary');
                        }
                    }
                ],
            });

        });
    </script>
@stop
