@extends('adminlte::page')

@section('title', 'Sub Konten Management')

@section('content_header')
    <h1>Sub Konten Management</h1>
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
                    <h3 class="card-title">Konten</h3>
                </div>

                <div  class="card-body table-responsive">

                    <table style="width:100%" class="table table-bordered table-sm table-striped">
                        <tbody>
                            <tr>
                                <td class="text-bold">ID</td>
                                <td>{{ $konten->id }}</td>
                            </tr>
                            <tr>
                                <td class="text-bold">Judul</td>
                                <td><h3>{{ $konten->judul }}</h3></td>
                            </tr>
                            <tr>
                                <td class="text-bold">Konten</td>
                                <td>{!! $konten->konten !!}</td>
                            </tr>
                            <tr>
                                <td class="text-bold">Kategori</td>
                                <td>{!! $konten->kategori !!}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="col-md-12">

            <div class="card">

                <div class="card-header">
                    <h3 class="card-title">Daftar Sub Konten</h3>
                </div>

                <div  class="card-body table-responsive">

                    <table id="sub_konten_table" style="width:100%" class="table table-bordered table-sm table-hover dataTable" role="grid">
                        <thead>
                        <tr role="row">
                            <th>No</th>
                            <th>Sub Judul</th>
                            <th>Sub Konten</th>
                            <th>Status</th>
                            <th>Created</th>
                            <th style="width:20px">
                                @can('sub_konten-create')
                                <a href="{{ URL::route('sub_konten.create','konten_id='.$konten->id) }}" data-toggle="modal" data-target="#createModal" class="btn btn-sm btn-success">Tambah</a>
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
@section('plugins.CkEditor', true)

@section('js')
    <script>
        $(document).ready(function() {

            $('body').on('click', '[data-toggle="modal"]', function(){
                $($(this).data("target")+' .modal-content').load($(this).attr("href"));
            });

            // KONTEN ADMIN TABLE
            $('#sub_konten_table').DataTable({
                processing: true,
                serverSide: true,
                pageLength:50,
                ajax: "{{ route('sub_konten.data', 'konten_id='.request()->konten_id) }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, searchable: false, width: "10"},

                    {data: 'judul', name: 'judul'},
                    {data: 'konten', name: 'konten'},
                    {data: 'status', name: 'status'},
                    {data: 'created', name: 'created'},

                    {data: 'action', name: 'action', orderable: false, searchable: false, width: "20px", "class" : "text-right"},
                ],
            });

        });
    </script>
@stop
