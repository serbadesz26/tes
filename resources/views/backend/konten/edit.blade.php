@extends('adminlte::page')

@section('title', 'Edit Pertanyaan Pusat')

@section('content_header')
    <h1>Edit Pertanyaan Pusat</h1>
@stop

@section('content')

    <div class="row">

        <div class="col-md-12">

            <div class="card card-primary">

                <div class="card-header">
                    <h3 class="card-title">Konten</h3>
                </div>

                {!! Form::model($konten,
                     [
                         'id'     => 'frmEdit',
                         'method' => 'PATCH',
                         'route'  => ['konten.update', $konten->id],
                         'files'  => 'true'
                     ])
                 !!}

                <div class="card-body">

                    @include('backend.konten._form')

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

@section('plugins.CkEditor', true)

@section('js')
    <script>
        CKEDITOR.replace('konten', {
            contentsCss: ['/css/core.css'],
            allowedContent: true,
        });CKEDITOR.replace('konten');


        $('#closeButtonEdit').click(function() {
            window.history.back();
        });
    </script>
@stop
