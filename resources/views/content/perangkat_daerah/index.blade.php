@extends('layouts/detachedLayoutMaster')

@section('title', 'Perangkat Daerah')

@section('content')

    <link itemprop="thumbnailUrl" href="{{ asset('images/website/img_perangkat_daerah.png') }}">
    <span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject">
        <link itemprop="url" href="{{ asset('images/website/img_perangkat_daerah.png') }}">
    </span>

    <!-- Content Detached to Left -->
    <div class="content-detached content-left">
        <div class="content-body">

            <?php $last_kat = ''; ?>

                <div class="row">
                @foreach($data_perangkat_daerah['listPerangkatDaerah'] as $key => $item_perangkat_daerah)


                    @if($last_kat != $item_perangkat_daerah['kategori'])
                        <div class="col-12">
                            <h2 class="mt-2 text-uppercase font-weight-bolder border-bottom">:: {{$item_perangkat_daerah['kategori']}}</h2>
                        </div>
                    @endif

                    <div class="col-12 col-md-6">
                        <div class="card m-50 p-50 collapse-icon">
                            <div class="media p-50">
                                <div class="media-aside align-self-start pr-1">
                                    <img src="{{ asset('images/website/logo-babel-footer.png') }}" width="64" height="64" class="rounded">
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
                                                <h5 class="media-heading">{{ $item_perangkat_daerah['title'] }}</h5>
                                            </a>
                                        </span>

                                    </div>

                                    <div id="collapse{{ $key }}" role="tabpanel" aria-labelledby="headingCollapse{{ $key }}" class="collapse">
                                        {{-- Alamat --}}
                                        @if($item_perangkat_daerah['alamat'])
                                        <div class="card-text text-muted">Alamat :</div>
                                        <p class="card-text ">{{ $item_perangkat_daerah['alamat'] }}</p>
                                        @endif

                                        {{-- Telepon/Fax --}}
                                        @if($item_perangkat_daerah['telp'])
                                        <div class="card-text text-muted">Telepon/Fax :</div>
                                        <p class="card-text ">{{ $item_perangkat_daerah['telp']}}</p>
                                        @endif

                                        {{-- Email --}}
                                        @if($item_perangkat_daerah['email'])
                                            <div class="card-text text-muted">Email :</div>
                                            <p class="card-text ">{{ $item_perangkat_daerah['email']}}</p>
                                        @endif

                                        {{-- Website --}}
                                        @if($item_perangkat_daerah['email'])
                                            <div class="card-text text-muted">Website :</div>
                                            <a href="{{ $item_perangkat_daerah['website'] }}" target="blank">{{ $item_perangkat_daerah['website']}}</a>
                                        @endif


                                    </div>

                                    <a href="{{ route('perangkat-daerah-show', substr($item_perangkat_daerah['slug'],1)) }}"> <span class="badge bg-success bg-darken-4 mt-50"> Detil </span></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $last_kat = $item_perangkat_daerah['kategori']; ?>

                @endforeach
                </div>

        </div>
    </div>
    <!--/ Content Detached to Left -->

    <!-- Sidebar Detached to Right -->
    <div class="sidebar-detached sidebar-right">
        <div class="sidebar">

            <!-- Search bar -->
            <div class="blog-search">
                <form action="{{ route('perangkat-daerah-index', 'all') }}" method="get">
                    <div class="input-group input-group-merge">
                        <input name="perangkat_daerah_search" type="text" value="{{ request()->perangkat_daerah_search }}" class="form-control" placeholder="Cari Perangkat Daerah" />
                        <div class="input-group-append">
                          <span class="input-group-text cursor-pointer">
                            <i data-feather="search"></i>
                          </span>
                        </div>
                    </div>
                </form>
            </div>

            <h4 class="section-label my-2">+ Kategori Perangkat Daerah</h4>
            <div class="kanal-perangkat-daerah mt-2">

                <a href="/perangkat_daerah/all" class="btn btn-sm btn-outline-danger rounded-pill mb-50 mr-50 {{ request()->segment(2) == null  ? 'active' : '' }}">Semua Data</a>
                @foreach($data_kategori_perangkat_daerah as $item_kategori)
                    <a href="/perangkat_daerah/{{ str_replace(' ', '-', $item_kategori['nama']) }}" class="btn btn-sm btn-outline-success rounded-pill mb-50 mr-50 {{ request()->segment(2) == $item_kategori['nama'] ? 'active' : '' }}">{{ $item_kategori['nama'].' ('.$item_kategori['jumlah'].')' }}</a>
                @endforeach

            </div>

        </div>
    </div>
    <!--/ Sidebar Detached to Right -->
@endsection
