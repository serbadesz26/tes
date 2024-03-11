@extends('layouts/detachedLayoutMaster')

@section('title', 'Berita')

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

                    {{-- Carousel --}}
                    <div id="showcaseIndicators" class="carousel slide" data-ride="carousel">
                        {{-- Indicator --}}
                        <ol class="carousel-indicators">
                            @foreach(explode(',',$data_detil_berita['dtl_foto']) as $key => $item_indikator)
                                <li data-target="#showcaseIndicators" data-slide-to="{{ $key }}" class="{{ $key == 0 ? "active" : "" }}"></li>
                            @endforeach()
                        </ol>
                        {{-- Slide --}}
                        <div class="carousel-inner" role="listbox">
                            @foreach(explode(',',$data_detil_berita['dtl_foto']) as $key => $item_slide)
                                <div class="carousel-item {{ $key == 0 ? "active" : "" }}">
                                    <img class="img-fluid" src="{{ $item_slide }}" alt="{{ $item_slide }}" />
                                </div>
                            @endforeach()
                        </div>
                        {{-- Navigator --}}
                        <a class="carousel-control-prev" href="#showcaseIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#showcaseIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>

                    <!-- Title-->
                    <h1 class="mt-4">{{ $data_detil_berita['title'] }}</h1>

                    <!-- Tanggal dan Share Link  -->
                    <div class="d-flex align-items-center justify-content-between my-1 py-1">
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center mr-1">
                                <div class="badge badge-success mr-50">{{ $data_detil_berita['created'] }}</div>
                            </div>
                        </div>

                        <div class="dropdown berita-detail-share">
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

                    {!! $data_detil_berita['body'] !!}

                    <!-- Info Berita -->
                    <div class="my-1 py-1">
                        <div class="badge badge-danger mr-50 mb-50">Penulis : {{ $data_detil_berita['penulis'] }}</div>
                        <div class="badge badge-success mr-50  mb-50">Sumber : {{ $data_detil_berita['sumber'] }}</div>
                        <div class="badge badge-info mr-50  mb-50">Editor : {{ $data_detil_berita['editor'] }}</div>
                        <div class="badge badge-warning mr-50  mb-50">Fotografer : {{ $data_detil_berita['fotografer'] }}</div>
                        <div class="badge badge-danger mr-50  mb-50">Dibaca : {{ str_replace(',','.',number_format($counter)) }} Kali</div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar Detached to Right -->
    <div class="sidebar-detached sidebar-right">
        <div class="sidebar">

            <a href="{{ route('berita-index', 'all') }}"><h6 class="section-label">+ Berita Lainnya</h6></a>
            <div class="media-list media-bordered">
                @foreach(array_slice($data_berita, 0, 11) as $item_berita)
                    <div class="media p-50">
                        <div class="media-aside align-self-start pr-1">
                            <img src="{{ $item_berita['thumb_foto'] }}" width="100" height="60" class="rounded">
                        </div>
                        <div class="media-body">
                            <a href="/berita_detil{{ $item_berita['slug'] }}" class="text-body-heading" target="_self">
                                <h6 class="media-heading">{{ $item_berita['title'] }}</h6>
                            </a>
                            <p class="card-text text-muted small">{{ $item_berita['created'].' | '.$item_berita['sumber'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

@endsection

@section('page-script')
    <script src="https://kit.fontawesome.com/41a75c0358.js" crossorigin="anonymous"></script>
    <script>
        $('.carousel').carousel({
            pause: "hover"
        })
    </script>
@endsection

