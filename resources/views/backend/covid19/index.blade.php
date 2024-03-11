@extends('adminlte::page')

@section('title', 'Konten Management')

@section('content_header')
    <h1>Konten Management</h1>
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

                    <table id="covid19_table" style="width:100%" class="table table-bordered table-sm table-hover dataTable" role="grid">
                        <thead>
                        <tr role="row">
                            <th>No</th>
                            <th>Tanggal Data</th>
                            <th>Created</th>
                            <th style="width:20px">
                                @can('covid19-create')
                                    <a href="{{ URL::route('covid19.create') }}" class="btn btn-sm btn-success">Tambah</a>
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

@section('js')
    <script>
        $(document).ready(function() {

            $('body').on('click', '[data-toggle="modal"]', function(){
                $($(this).data("target")+' .modal-content').load($(this).attr("href"));
            });

            // COVID19 ADMIN TABLE
            $('#covid19_table').DataTable({
                processing: true,
                serverSide: true,
                pageLength:50,
                ajax: "{{ route('covid19.data') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, width: "10"},

                    {data: 'tgl_data', name: 'tgl_data'},
                    {data: 'created_at', name: 'created_at'},

                    {data: 'action', name: 'action', orderable: false, searchable: false, width: "20px", "class" : "text-right"},
                ],
            });

        });
    </script>
@stop
