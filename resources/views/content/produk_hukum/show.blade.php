@extends('layouts/detachedLayoutMaster')

@section('title', 'Detil Produk Hukum')

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
                    <div class="d-flex align-items-center justify-content-between my-1 py-1">
                        <div class="d-flex align-items-center">
                            <h3 class="text-warning mt-2">{{ $data_detil_prodkum['kategori']. ' '.($data_detil_prodkum['no'] ? ' Nomor '.$data_detil_prodkum['no'] : '').($data_detil_prodkum['tahun'] ? ' Tahun '.$data_detil_prodkum['tahun'] : '') }}</h3>
                        </div>

                        <div class="dropdown prodkum-detail-share">
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
                    <h1 class="my-2">{{ $data_detil_prodkum['title'] }}</h1>

                    <div class="row border-bottom py-50 mt-3">
                        <div class="text-muted col-12 col-sm-3 mb-50">
                            Kategori
                        </div>
                        <div class="col-12 col-sm-9">
                            <h4>{{ $data_detil_prodkum['kategori'] }}</h4>
                        </div>
                    </div>

                    <div class="row border-bottom py-50">
                        <div class="text-muted col-12 col-sm-3 mb-50">
                            Nomor
                        </div>
                        <div class="col-12 col-sm-9">
                            <h4>{{ $data_detil_prodkum['no'] ? $data_detil_prodkum['no'] : '-' }}</h4>
                        </div>
                    </div>

                    <div class="row border-bottom py-50">
                        <div class="text-muted col-12 col-sm-3 mb-50">
                            Tahun
                        </div>
                        <div class="col-12 col-sm-9">
                            <h4>{{ $data_detil_prodkum['tahun'] }}</h4>
                        </div>
                    </div>

                    <div class="row border-bottom py-50">
                        <div class="text-muted col-12 col-sm-3 mb-50">
                            Status
                        </div>
                        <div class="col-12 col-sm-9">
                            @if($data_detil_prodkum['status'])
                                <h4>{{ $data_detil_prodkum['status'] }}</h4>
                                <blockquote class="blockquote pl-1 border-left-primary border-left-3">
                                    <p class="mb-0">
                                        {{ $data_detil_prodkum['ket_status'] }}
                                    </p>
                                </blockquote>
                            @endif
                        </div>
                    </div>

                    <div class="row border-bottom py-50">
                        <div class="text-muted col-12 col-sm-3 mb-50">
                            Tanggal Peraturan
                        </div>
                        <div class="col-12 col-sm-9">
                            <h4>{{ $data_detil_prodkum['tgl_peraturan'] }}</h4>
                        </div>
                    </div>

                    <div class="row border-bottom py-50">
                        <div class="text-muted col-12 col-sm-3 mb-50">
                            Pengarang
                        </div>
                        <div class="col-12 col-sm-9">
                            <h4>{{ $data_detil_prodkum['pengarang'] }}</h4>
                        </div>
                    </div>

                    <div class="row border-bottom py-50">
                        <div class="text-muted col-12 col-sm-3 mb-50">
                            Sumber
                        </div>
                        <div class="col-12 col-sm-9">
                            <h4>{{ $data_detil_prodkum['sumber'] }}</h4>
                        </div>
                    </div>

                    <div class="row border-bottom py-50">
                        <div class="text-muted col-12 col-sm-3 mb-50">
                            File/Dokumen
                        </div>
                        <div class="col-12 col-sm-9">
                            @foreach(Helper::str2array($data_detil_prodkum['file']) as $key => $item_file)
                                <a href="{{ $item_file }}" target="blank">
                                    <div class="badge badge-danger m-25">File {{ $key+1 }}</div>
                                </a>
                            @endforeach
                        </div>
                    </div>

                    <div class="row border-bottom py-50">
                        <div class="text-muted col-12 col-sm-3 mb-50">
                            Ketrangan lainnya
                        </div>
                        <div class="col-12 col-sm-9">
                            <h4>{{ $data_detil_prodkum['body'] ? $data_detil_prodkum['body'] : '-' }}</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar Detached to Right -->
    <div class="sidebar-detached sidebar-right">
        <div class="sidebar">

            <!-- Header & Link Produk Hukum lainnya -->
            <a href="{{ route('produk-hukum-index', 'all') }}">
                <h6 class="section-label">+ Produk Hukum Lainnya</h6>
            </a>

            <div class="media-list media-bordered px-05">
                @foreach(array_slice($data_prodkum, 0, 5) as $item_produk_hukum)
                    <div class="media p-50">
                        {{-- Icon Produk Hukum--}}
                        <div class="media-aside align-self-start pr-1">
                            <img src="{{asset('images/icons/book.svg')}}" blank-color="#ccc" width="32" alt="Produk Hukum"/>
                        </div>
                        {{-- Judul Produk Hukum--}}
                        <div class="media-body">
                            <h5 class="media-heading mb-0">
                                <a href="{{ route('produk-hukum-show', substr($item_produk_hukum['slug'], 1)) }}">{{ $item_produk_hukum['kategori']." Nomor ".$item_produk_hukum['no']." Tahun ".$item_produk_hukum['tahun'] }}</a>
                            </h5>
                            <div class="card-text small">
                                {{ $item_produk_hukum['title'] }}
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
