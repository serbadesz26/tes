@extends('layouts/detachedLayoutMaster')

@section('title', 'Pengumuman')

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
                    <h1 class="mt-2">{{ $data_detil_pengumuman['title'] }}</h1>

                    <div class="alert alert-primary mt-1" role="alert">
                        <div class="alert-body">Sumber : <strong>{{ $data_detil_pengumuman['sumber'] }}</strong> ({{ $data_detil_pengumuman['sumber'] }})</div>
                    </div>

                    <!-- Tanggal dan Share Link  -->
                    <div class="d-flex align-items-center justify-content-between my-1 py-1">
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center mr-1">
                                <div class="my-50">
                                    <div class="badge badge-danger mr-50">{{ $data_detil_pengumuman['created'] }}</div>
                                    @if($data_detil_pengumuman['tgl_status'] == '0 sec')
                                        <span class="badge bg-success bg-darken-4 mb-1">{{ $data_detil_pengumuman['tanggal'] }}</span>
                                    @else
                                        <span class="badge bg-danger bg-darken-4 mb-1">{{ $data_detil_pengumuman['tanggal'] }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="dropdown pengumuman-detail-share">
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

                    <div class="alert alert-success mt-1" role="alert">
                        <div class="alert-body"><a href="{{ $data_detil_pengumuman['file'] }}">Download <strong>Dokumen Pengumuman {{ $data_detil_pengumuman['title'] }}</strong></a></div>
                    </div>

                    <embed src="{{ $data_detil_pengumuman['file'] }}" width="100%" height="1200" alt="pdf" />

                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar Detached to Right -->
    <div class="sidebar-detached sidebar-right">

        <div class="sidebar">
            <!-- Header & Link Pengumuman lainnya -->
            <a href="{{ route('pengumuman-index') }}">
                <h6 class="section-label">+ Pengumuman Lainnya</h6>
            </a>

            <!-- Daftar Pengumuman lainnya -->
            <div class="media-list media-bordered">
                @foreach(array_slice($data_pengumuman, 0, 6) as $item_pengumuman)
                    <div class="media px-0 py-50">
                        <div class="media-body">
                            @if($item_pengumuman['tgl_status'] == '0 sec')
                                <span class="badge bg-success bg-darken-4 mb-1">{{ $item_pengumuman['tanggal'] }}</span>
                            @else
                                <span class="badge bg-danger bg-darken-4 mb-1">{{ $item_pengumuman['tanggal'] }}</span>
                            @endif
                            <a href="/pengumuman_detil{{ $item_pengumuman['slug'] }}" class="text-body-heading" target="_self">
                                <h6 class="media-heading">{{ $item_pengumuman['title'] }}</h6>
                            </a>
                            <p class="card-text text-muted small">{{ $item_pengumuman['sumber'] }}</p>
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
