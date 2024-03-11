@extends('adminlte::page')

@section('title', 'Tambah Data Covid 19')

@section('content_header')
    <h1>Tambah Data Covid 19</h1>
@stop

@section('content')

    <div class="row">

        <div class="col-md-12">

            <div class="card card-primary">

                <div class="card-header">
                    <h3 class="card-title">Data Covid 19</h3>
                </div>

                {!! Form::model(App\Covid19::class,
                     [
                        'id'     => 'frmCreate',
                        'method' => 'POST',
                        'route'  => ['covid19.store'],
                        'files'  => 'true',
                     ])
                 !!}

                <div class="card-body">

                    @include('backend.covid19._form')

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

@section('js')
    <script>
        $('#closeButtonEdit').click(function() {
            window.history.back();
        });
    </script>
@stop
