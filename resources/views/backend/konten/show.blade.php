@extends('adminlte::page')

@section('title', 'Tambah Konten')

@section('content_header')
    <h1>Detil Konten</h1>
@stop

@section('content')

    <div class="row">

        <div class="col-md-12">

            <div class="card card-primary">

                <div class="card-header">
                    <h3 class="card-title">Konten</h3>
                </div>

                <div class="card-body">

                    @include('backend.konten._form_info')

                </div>

            </div>

        </div>

    </div>

@stop

