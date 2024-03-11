@extends('layouts/detachedLayoutMaster')

@section('title', 'Detil Pengumuman')

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
                        <div class="alert-body">Penulis : <strong>{{ $data_detil_pengumuman['sumber'] }}</strong> ({{ $data_detil_pengumuman['sumber'] }})</div>
                    </div>

                    <!-- Tags -->
                    <div class="my-50">
                        <div class="badge badge-danger mr-50">{{ $data_detil_pengumuman['created'] }}</div>
                        @if($data_detil_pengumuman['tgl_status'] == '0 sec')
                            <span class="badge bg-success bg-darken-4 mb-1">{{ $data_detil_pengumuman['tanggal'] }}</span>
                        @else
                            <span class="badge bg-danger bg-darken-4 mb-1">{{ $data_detil_pengumuman['tanggal'] }}</span>
                        @endif
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
