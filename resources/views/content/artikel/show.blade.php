@extends('layouts/detachedLayoutMaster')

@section('title', 'Artikel')

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
                    <h1 class="mt-2">{{ $data_detil_artikel['title'] }}</h1>

                    <!-- Tanggal dan Share Link  -->
                    <div class="d-flex align-items-center justify-content-between my-1 py-1">
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center mr-1">
                                <div>Penulis : <strong>{{ $data_detil_artikel['penulis'].' ('.$data_detil_artikel['sumber'] }})</strong></div>
                            </div>
                        </div>

                        <div class="dropdown artikel-detail-share">
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

                    {!! $data_detil_artikel['body'] !!}

                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar Detached to Right -->
    <div class="sidebar-detached sidebar-right">
        <div class="sidebar">

            <!-- Info Penulis -->
            <div class="card">
                <img class="card-img-top" src="{{ $data_detil_artikel['dtl_foto'] }}" alt="Card image cap" />
                <div class="card-body">
                    <h4 class="card-title">Penulis : <strong>{{ $data_detil_artikel['penulis'] }}</strong></h4>
                    <p class="card-text">
                        {{ $data_detil_artikel['sumber'] }}
                    </p>
                </div>
            </div>

            <!-- Header & Link Artikel lainnya -->
            <a href="{{ route('artikel-index', 'all') }}">
                <h6 class="section-label">+ Artikel Lainnya</h6>
            </a>

            <!-- Daftar Artikel lainnya -->
            <div class="media-list media-bordered">
                @foreach(array_slice($data_artikel, 0, 6) as $item_artikel)
                    <div class="media p-50">
                        <div class="media-aside align-self-start pr-1">
                            <img src="{{ $item_artikel['thumb_foto'] }}" width="100" height="60" class="rounded">
                        </div>
                        <div class="media-body">
                            <a href="/artikel_detil{{ $item_artikel['slug'] }}" class="text-body-heading" target="_self">
                                <h6 class="media-heading">{{ $item_artikel['title'] }}</h6>
                            </a>
                            <p class="card-text text-muted small">{{ $item_artikel['penulis'] }}</p>
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

