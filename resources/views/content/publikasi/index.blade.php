@extends('layouts/contentLayoutMaster')

@section('title', 'Publikasi')

@section('content')

    <div class="content-body">

        <div class="row">
            <div class="col-12 col-md-8 order-2 order-md-1">

                {{-- Data --}}
                <div class="row">
                    <div class="col-12">

                        @php
                            $last_kat = '';
                        @endphp

                        <div class="row">
                            @foreach($data_publikasi['listPublikasi'] as $key => $item_publikasi)

                                @if($last_kat != $item_publikasi['kategori'])
                                    <div class="col-12">
                                        <h3 class="mt-2 mb-1 text-primary text-uppercase font-weight-bolder border-bottom">:: {{$item_publikasi['kategori']}}</h3>
                                    </div>
                                @endif

                                <div class="col-12 col-md-6">
                                    <div class="card">
                                        <div class="card-body p-1 p-sm-2">
                                            <a href="{{ route('publikasi-show', substr($item_publikasi['slug'], 1)) }}">
                                                <h2>{{ $item_publikasi['title'] }}</h2>
                                            </a>
                                            <span class="badge badge-danger mb-50">Data Tahun {{ $item_publikasi['tahun'] }}</span>
                                            <span class="badge badge-primary">Sumber : {{ $item_publikasi['sumber'] }}</span>
                                        </div>
                                    </div>
                                </div>

                                @php
                                    $last_kat = $item_publikasi['kategori'];
                                @endphp

                            @endforeach()
                        </div>

                    </div>
                </div>

            </div>
            <div class="col-12 col-md-4 order-1 order-md-2">

                {{-- Filter --}}
                <h3 class="mt-2 mb-1 text-primary text-uppercase font-weight-bolder border-bottom">:: Filter Data</h3>
                <form method="get" action="{{ route('publikasi-index') }}">
                    <div class="row">

                        <div class="mb-1 col-12">
                            <div role="group" class="input-group">
                                {!! Form::select('fltrKategori', Helper::selectData($data_kategori_publikasi), null, ['id' => 'fltrKategori', 'class' =>'custom-select']) !!}
                            </div>
                        </div>

                        <div class="mb-1 col-12">
                            <div role="group" class="input-group">
                                {!! Form::select('fltrSubKategori', [], null, ['id' => 'fltrSubKategori', 'class' =>'custom-select']) !!}
                            </div>
                        </div>

                        <div class="mb-1 col-12">
                            <div role="group" class="input-group">
                                {!! Form::select('fltrTahun', [
                                                                '' => '-- Semua --',
                                                                '2014' => '2014',
                                                                '2015' => '2015',
                                                                '2016' => '2016',
                                                                '2017' => '2017',
                                                                '2018' => '2018',
                                                                '2019' => '2019',
                                                                '2020' => '2020',
                                                                '2021' => '2021',
                                                                '2022' => '2022',
                                                                ], null, ['id' => 'fltrTahun', 'class' =>'custom-select']) !!}
                            </div>
                        </div>

                        <div class="mb-1 col-12">
                            <div role="group" class="input-group">
                                {!! Form::submit('Filter', ['class' =>'btn btn-success custom-select']) !!}
                            </div>
                        </div>

                    </div>
                </form>

            </div>
        </div>

    </div>

@endsection

@section('page-script')
    <script>
        $(document).ready(function() {

            $("#fltrKategori").val("{{ request()->fltrKategori }}");
            $("#fltrTahun").val("{{ request()->fltrTahun }}");

            $.ajax({
                url: "{{ route('api.get_subkategori_publikasi', 'kategori='.request()->fltrKategori)}}",
                method: 'GET',
                success: function(data) {
                    $('#fltrSubKategori').html(data.html);
                    $("#fltrSubKategori").val("{{ request()->fltrSubKategori }}");
                }
            });

            $("#fltrKategori").change(function(){

                $.ajax({
                    url: "{{ route('api.get_subkategori_publikasi', 'kategori=') }}" + $(this).val(),
                    method: 'GET',
                    success: function(data) {
                        // console.log(data);
                        $('#fltrSubKategori').html(data.html);
                    }
                });
            });

        });
    </script>
@endsection
