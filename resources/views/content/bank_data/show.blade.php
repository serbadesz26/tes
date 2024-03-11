@extends('layouts/detachedLayoutMaster')

@section('title', 'Bank Data')

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

                    <!-- Title dan Share Link  -->
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center">
                            <h3 class="text-warning mt-2">{{ $data_detil_bank_data['kategori']. ' '.($data_detil_bank_data['tahun'] ? ' Tahun '.$data_detil_bank_data['tahun'] : '') }}</h3>
                        </div>
                        <div class="dropdown bankdata-detail-share">
                            <i data-feather="share-2" class="font-medium-5 text-body cursor-pointer" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a target="_blank" href="https://wa.me/?text={{ request()->url() }}" class="dropdown-item py-50 px-1">
                                    <span class="fa fa-whatsapp"></span>  WhatsApp
                                </a>
                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ request()->url()  }}" class="dropdown-item py-50 px-1">
                                    <span class="fa fa-facebook"></span>  Facebook
                                </a>
                                <a target="_blank" href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ request()->url()  }}" class="dropdown-item py-50 px-1">
                                    <span class="fa fa-twitter"></span>  Twitter
                                </a>
                            </div>
                        </div>
                    </div>

                    <h1 class="mb-2">{{ $data_detil_bank_data['title'] }}</h1>

                    {{-- Kategori --}}
                    <div class="row border-bottom py-50 mt-3">
                        <div class="text-muted col-12 col-sm-3 mb-50">
                            Kategori
                        </div>
                        <div class="col-12 col-sm-9">
                            <h4>{{ $data_detil_bank_data['kategori'] }}</h4>
                        </div>
                    </div>

                    {{-- Tahun --}}
                    <div class="row border-bottom py-50">
                        <div class="text-muted col-12 col-sm-3 mb-50">
                            Tahun
                        </div>
                        <div class="col-12 col-sm-9">
                            <h4>{{ $data_detil_bank_data['tahun'] }}</h4>
                        </div>
                    </div>

                    {{-- Sumber --}}
                    <div class="row border-bottom py-50">
                        <div class="text-muted col-12 col-sm-3 mb-50">
                            Sumber
                        </div>
                        <div class="col-12 col-sm-9">
                            <h4>{{ $data_detil_bank_data['sumber'] }}</h4>
                        </div>
                    </div>

                    {{-- File/Dokumen --}}
                    <div class="row border-bottom py-50">
                        <div class="text-muted col-12 col-sm-3 mb-50">
                            File/Dokumen
                        </div>
                        <div class="col-12 col-sm-9">
                            @foreach(Helper::str2array($data_detil_bank_data['file']) as $key => $item_file)
                                <a href="{{ $item_file }}" target="blank">
                                    <div class="badge badge-danger m-25">File {{ $key+1 }}</div>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    {{-- Keterangan --}}
                    <div class="row border-bottom py-50">
                        <div class="text-muted col-12 col-sm-3 mb-50">
                            Ketrangan lainnya
                        </div>
                        <div class="col-12 col-sm-9">
                            <p>{!! $data_detil_bank_data['body'] ? $data_detil_bank_data['body'] : '-'  !!}</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar Detached to Right -->
    <div class="sidebar-detached sidebar-right">
        <div class="sidebar">

            <!-- Header & Link Bank Data lainnya -->
            <a href="{{ route('produk-hukum-index', 'all') }}">
                <h6 class="section-label">+ Bank Data Lainnya</h6>
            </a>

            <div class="media-list media-bordered px-05">
                @foreach(array_slice($data_bank_data, 0, 5) as $item_bank_data)
                    <div class="media p-50">
                        {{-- Icon Bank Data--}}
                        <div class="media-aside align-self-start pr-1">
                            <img src="{{asset('images/icons/book.svg')}}" blank-color="#ccc" width="32" alt="Bank Data"/>
                        </div>
                        {{-- Judul Bank Data--}}
                        <div class="media-body">
                            <h5 class="media-heading mb-0">
                                <a href="{{ route('produk-hukum-show', substr($item_bank_data['slug'], 1)) }}">{{ $item_bank_data['kategori']." Tahun ".$item_bank_data['tahun'] }}</a>
                            </h5>
                            <div class="card-text small">
                                {{ $item_bank_data['title'] }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

@endsection

@section('page-script')
    <script src="https://kit.fontawesome.com/41a75c0358.js" crossorigin="anonymous"></script>
@endsection
