@extends('adminlte::page')

@section('title', 'Role Management')

@section('content_header')
    <h1>Role Management</h1>
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
                    <h3 class="card-title">Daftar Role</h3>
                </div>


                <div  class="card-body table-responsive">

                    {{--<table id="roles_table" style="width:100%" class="table table-bordered table-hover dataTable" role="grid">--}}
                    <table id="roles_table" style="width:100%" class="table table-striped dataTable projects">
                        <thead>
                        <tr role="row">
                            <th>No</th>
                            <th width="0">Role Name</th>
                            <th>Jumlah User</th>
                            <th>Update</th>
                            <th style="width:20px">
                                @can('role-create')
                                    <a href="{{ URL::route('roles.create') }}" data-toggle="modal" data-target="#createModal" class="btn btn-sm btn-success">Tambah</a>
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
            oTable = $('#roles_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('roles.data', 'admin') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, width: "10"},

                    {data: 'name', name: 'name'},
                    {data: 'jml_user', name: 'jml_user', "class" : "text-center"},

                    {data: 'updated_at', name: 'updated_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false, width: "20px", "class" : "text-right"},
                ]
            });

        });
    </script>
@stop
