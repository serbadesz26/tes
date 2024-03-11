@extends('layouts/detachedLayoutMaster')

@section('title', 'Layanan SPBE')

@section('content')

    <link itemprop="thumbnailUrl" href="{{ asset('images/website/img_layanan_spbe.png') }}">
    <span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject">
        <link itemprop="url" href="{{ asset('images/website/img_layanan_spbe.png') }}">
    </span>

    <!-- Content Detached to Left -->
    <div class="content-detached content-left">
        <div class="content-body">

            <div class="row">

                @foreach($data_layanan_spbe['listLayananSpbe'] as $key => $item_layanan_spbe)
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        <div class="card m-50 p-50 collapse-icon">
                            <div class="media p-50">
                                <div class="media-aside align-self-start pr-1">
                                    <img src="{{ $item_layanan_spbe['icon'] }}" width="64" height="64" class="rounded">
                                </div>
                                <div class="media-body">
                                    <div
                                        id="headingCollapse{{ $key }}"
                                        data-toggle="collapse"
                                        role="button"
                                        data-target="#collapse{{ $key }}"
                                        aria-expanded="false"
                                        aria-controls="collapse{{ $key }}">

                                        <span class="lead collapse-title">
                                            <a href="#" class="text-body-heading" target="_self">
                                                <h6 class="media-heading">{{ $item_layanan_spbe['nama'] }}</h6>
                                            </a>
                                        </span>
                                    </div>
                                    <div id="collapse{{ $key }}" role="tabpanel" aria-labelledby="headingCollapse{{ $key }}" class="collapse">
                                        <p class="card-text text-muted">{{ $item_layanan_spbe['keterangan']}}</p>
                                        <a href="{{ $item_layanan_spbe['url'] }}" target="blank">{{ $item_layanan_spbe['url']}}</a>
                                    </div>
                                    <span class="badge bg-{{ $item_layanan_spbe['kategori'] == 'Publik' ? 'success' : 'warning' }} bg-darken-4 mt-50">{{ $item_layanan_spbe['kategori']}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
    <!--/ Content Detached to Left -->

    <!-- Sidebar Detached to Right -->
    <div class="sidebar-detached sidebar-right">
        <div class="sidebar">

            <!-- Kanal Kategori -->
            <div class="kanal-berita my-2">
                <h6 class="section-label my-1">+ Kategori Layanan</h6>
                <a href="/layanan_spbe/all/all" class="btn btn-sm btn-outline-danger rounded-pill mb-50 mr-50 {{ request()->segment(2) == null  ? 'active' : '' }}">Semua Kategori</a>
                @foreach($data_kategori_layanan_spbe as $item_kategori)
                    <a href="/layanan_spbe/{{ $item_kategori['nama'] }}/all" class="btn btn-sm btn-outline-success rounded-pill mb-50 mr-50 {{ request()->segment(2) == $item_kategori['nama'] ? 'active' : '' }}">{{ $item_kategori['nama'].'('.$item_kategori['jumlah'].')' }}</a>
                @endforeach
            </div>

            <!-- Kanal Kategori -->
            <div class="kanal-berita my-2">
                <h6 class="section-label my-1">+ Jenis Layanan</h6>
                <a href="/layanan_spbe/all/all" class="btn btn-sm btn-outline-danger rounded-pill mb-50 mr-50 {{ request()->segment(2) == null  ? 'active' : '' }}">Semua Jenis</a>
                @foreach($data_jenis_layanan_spbe as $item_jenis)
                    <a href="/layanan_spbe/all/{{ str_replace(' ', '-', $item_jenis['nama']) }}" class="btn btn-sm btn-outline-success rounded-pill mb-50 mr-50 {{ request()->segment(3) == $item_jenis['nama'] ? 'active' : '' }}">{{ $item_jenis['nama'].'('.$item_jenis['jumlah'].')' }}</a>
                @endforeach
            </div>

        </div>
    </div>
    <!--/ Sidebar Detached to Right -->
@endsection
