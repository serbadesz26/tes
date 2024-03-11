@extends('adminlte::page')

@section('title', 'Edit Data Covid 19')

@section('content_header')
    <h1>Edit Data Covid 19</h1>
@stop

@section('content')

    <div class="row">

        <div class="col-md-12">

            <div class="card card-primary">

                <div class="card-header">
                    <h3 class="card-title">Data Covid 19</h3>
                </div>

                {!! Form::model($covid19,
                     [
                         'id'     => 'frmEdit',
                         'method' => 'PATCH',
                         'route'  => ['covid19.update', $covid19->id],
                         'files'  => 'true'
                     ])
                 !!}

                <div class="card-body">

                    @include('backend.covid19._form')

                </div>

                <div class="card-footer justify-content-between">
                    {!! Form::button('Batal', ['class' => 'btn btn-default', 'id' => 'closeButtonEdit']) !!}
                    {!! Form::submit('Simpan Data', ['class' => 'btn btn-success']) !!}
                </div>

                {!! Form::close() !!}

            </div>

        </div>

    </div>

@stop

@section('plugins.Summernote', true)

@section('js')
    <script>



        $('#closeButtonEdit').click(function() {
            window.history.back();
        });
    </script>
@stop
