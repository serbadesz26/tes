@extends('adminlte::page')

@section('title', 'Permission Management')

@section('content_header')
    <h1>Permission Management</h1>
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
                    <h3 class="card-title">Daftar Permission</h3>
                </div>


                <div  class="card-body table-responsive">

                    {{--<table id="Permissions_table" style="width:100%" class="table table-bordered table-hover dataTable" Permission="grid">--}}
                    <table id="permission_table" style="width:100%" class="table table-striped dataTable projects">
                        <thead>
                        <tr Permission="row">
                            <th>No</th>
                            <th>Permission Name</th>
                            <th>Guard Name</th>

                            <th style="width:20px">
                                @can('permission-create')
                                    <a href="{{ URL::route('permissions.create') }}" data-toggle="modal" data-target="#createModal" class="btn btn-sm btn-success">Tambah</a>
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
<div class="modal fade" id="deleteModal" tabindex="-1" Permission="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
            oTable = $('#permission_table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('permissions.data', 'admin') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, width: "10"},

                    {data: 'name', name: 'name'},
                    {data: 'guard_name', name: 'guard_name', "class" : "text-center"},

                    {data: 'action', name: 'action', orderable: false, searchable: false, width: "20px", "class" : "text-right"},
                ]
            });

        });
    </script>
@stop
