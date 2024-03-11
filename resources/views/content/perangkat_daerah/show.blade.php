@extends('layouts/detachedLayoutMaster')

@section('title', 'Detil Perangkat Daerah')

@section('content')

    <link itemprop="thumbnailUrl" href="{{ $img_thumb }}">
    <span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject">
        <link itemprop="url" href="{{ $img_thumb }}">
    </span>

    <!-- Content Detached to Left -->
    <div class="content-detached content-left">
        <div class="content-body">
            <div class="card">
                <div class="card-body p-1 p-sm-2">

                    <!-- Title-->
                    <h1 class="my-2">{{ $data_detil_perangkat_daerah['title'] }}</h1>

                    <div class="row border-bottom py-50 px-2">
                            <img class="rounded float-start" src="{{ $data_detil_perangkat_daerah['foto-staf']['src'] }}" width="200px">
                    </div>
                    
                    <div class="row border-bottom py-50">
                        <div class="text-muted col-12 col-sm-3 mb-50">
                            Pimpinan
                        </div>
                        <div class="col-12 col-sm-9">
                            <h4>{{ $data_detil_perangkat_daerah['Pimpinan'] }}</h4>
                        </div>
                    </div>
                    
                    <div class="row border-bottom py-50">
                        <div class="text-muted col-12 col-sm-3 mb-50">
                            Alamat
                        </div>
                        <div class="col-12 col-sm-9">
                            <h4>{{ $data_detil_perangkat_daerah['alamat'] }}</h4>
                        </div>
                    </div>
                    
                    <div class="row border-bottom py-50">
                        <div class="text-muted col-12 col-sm-3 mb-50">
                            Telepon
                        </div>
                        <div class="col-12 col-sm-9">
                            <h4>{{ $data_detil_perangkat_daerah['Telp'] }}</h4>
                        </div>
                    </div>
                    
                    <div class="row border-bottom py-50">
                        <div class="text-muted col-12 col-sm-3 mb-50">
                            Fax
                        </div>
                        <div class="col-12 col-sm-9">
                            <h4>{{ $data_detil_perangkat_daerah['fax'] }}</h4>
                        </div>
                    </div>
                    
                    <div class="row border-bottom py-50">
                        <div class="text-muted col-12 col-sm-3 mb-50">
                            E-mail
                        </div>
                        <div class="col-12 col-sm-9">
                            <h4>{{ $data_detil_perangkat_daerah['email'] }}</h4>
                        </div>
                    </div>
                    
                    <div class="row border-bottom py-50">
                        <div class="text-muted col-12 col-sm-3 mb-50">
                            Website
                        </div>
                        <div class="col-12 col-sm-9">
                            <h4>{{ $data_detil_perangkat_daerah['website'] }}</h4>
                        </div>
                    </div>
                    
                    <div class="row border-bottom py-50">
                        <div class="text-muted col-12 col-sm-3 mb-50">
                            Selayang Pandang
                        </div>
                        <div class="col-12 col-sm-9">
                            <h4 style="text-align:justify">{{ $data_detil_perangkat_daerah['selayang-pandang'] }}</h4>
                        </div>
                    </div>
                    
                    <div class="row border-bottom py-50">
                        <div class="text-muted col-12 col-sm-3 mb-50">
                            Visi dan Misi
                        </div>
                        <div class="col-12 col-sm-9">
                            <h4 style="text-align:justify">{{ $data_detil_perangkat_daerah['visi-misi'] }}</h4>
                        </div>
                    </div>
                    
                    <div class="row border-bottom py-50">
                        <div class="text-muted col-12 col-sm-3 mb-50">
                            Program Kerja
                        </div>
                        <div class="col-12 col-sm-9">
                            <h4 style="text-align:justify">{{ $data_detil_perangkat_daerah['program-kerja'] }}</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
