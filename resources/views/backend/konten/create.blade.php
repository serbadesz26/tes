@extends('adminlte::page')

@section('title', 'Tambah Konten')

@section('content_header')
    <h1>Tambah Konten</h1>
@stop

@section('content')

    <div class="row">

        <div class="col-md-12">

            <div class="card card-primary">

                <div class="card-header">
                    <h3 class="card-title">Konten</h3>
                </div>

                {!! Form::model(App\Konten::class,
                     [
                        'id'     => 'frmCreate',
                        'method' => 'POST',
                        'route'  => ['konten.store'],
                        'files'  => 'true',
                     ])
                 !!}

                <div class="card-body">

                    @include('backend.konten._form')

                </div>

                {{--MODAL FOOTER--}}
                <div class="modal-footer justify-content-between">
                    {!! Form::button('Batal', ['class' => 'btn btn-default', 'id' => 'closeButtonCreate']) !!}
                    {!! Form::submit('Simpan Data', ['class' => 'btn btn-success']) !!}
                </div>

                {!! Form::close() !!}

            </div>

        </div>

    </div>

@stop

@section('plugins.CkEditor', true)

@section('js')
    <script>
        CKEDITOR.replace('konten', {
            contentsCss: ['/css/core.css'],
            allowedContent: true,
        });

        $('#closeButtonEdit').click(function() {
            window.history.back();
        });
    </script>
@stop
