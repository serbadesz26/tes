@extends('layouts/detachedLayoutMaster')

@section('title', 'Artikel')

@section('content')

    <link itemprop="thumbnailUrl" href="{{ asset('images/website/img_artikel.png') }}">
    <span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject">
        <link itemprop="url" href="{{ asset('images/website/img_artikel.png') }}">
    </span>

    <!-- Content Detached to Left -->
    <div class="content-detached content-left">
        <div class="content-body">

            <div class="row">
                <div class="media-list media-bordered">
                    @foreach($data_artikel['listArtikel'] as $item_artikel)
                        <div class="card p-0 mb-1">
                            <div class="media">
                                <div class="media-aside align-self-start mr-1 d-none d-sm-block">
                                    <img src="{{ $item_artikel['dtl_foto'] }}" width="150" class="rounded" alt="{{ $item_artikel['title'] }}"/>
                                </div>
                                <div class="text-body-heading">
                                    <a href="/artikel_detil{{ request()->artikel_search ? substr($item_artikel['slug'], 32) : $item_artikel['slug'] }}">
                                        <h2 class="media-heading">{{ $item_artikel['title'] }}</h2>
                                    </a>
                                    {{ $item_artikel['teaser'] }}
                                    <div class="alert alert-primary mt-1" role="alert">
                                        <div class="alert-body">Penulis : <strong>{{ $item_artikel['penulis'] }}</strong> ({{ $item_artikel['sumber'] }})</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

{{--            <div class="row">--}}
{{--                <div class="col-12">--}}
{{--                    <span class="badge bg-warning bg-darken-4">Pages : {{ $data_artikel['pager']['pages'] }}</span>--}}
{{--                    <span class="badge bg-danger bg-darken-4">Page : {{ $data_artikel['pager']['page'] }}</span>--}}
{{--                    <span class="badge bg-success bg-darken-4">Limit : {{ $data_artikel['pager']['limit'] }}</span>--}}
{{--                    <span class="badge bg-primary bg-darken-4">Count : {{ $data_artikel['pager']['count'] }}</span>--}}
{{--                </div>--}}
{{--            </div>--}}

            <!-- Pagination -->
            <div class="row">
                <div class="col-12">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center mt-2">

                            <?php
                                $curPage = $data_artikel['pager']['page'];
                                $totalPage = $data_artikel['pager']['pages'];

                                $startPage = ($curPage < 5)? 1 : $curPage - 4;
                                $endPage = 8 + $startPage;
                                $endPage = ($totalPage < $endPage) ? $totalPage : $endPage;
                                $diff = $startPage - $endPage + 8;
                                $startPage -= ($startPage - $diff > 0) ? $diff : 0;
                            ?>

                            @if($startPage > 1)
                                <li class="page-item prev-item"><a class="page-link" href="/artikel/{{ request()->segment(2) }}?page={{ $curPage-5 }}&artikel_search={{ request()->artikel_search }}"></a></li>
                            @endif

                            @for ($i=$startPage; $i<=$endPage; $i++)
                                <li class="page-item {{ ($i == request()->page) ? 'active' : '' }}"><a class="page-link" href="/artikel/{{ request()->segment(2) }}?page={{ $i }}&artikel_search={{ request()->artikel_search }}">{{ $i }}</a></li>
                            @endfor

                            @if($endPage < $totalPage)
                                <li class="page-item next-item"><a class="page-link" href="/artikel/{{ request()->segment(2) }}?page={{ $curPage+5 }}&artikel_search={{ request()->artikel_search }}"></a></li>
                            @endif

                        </ul>
                    </nav>
                </div>
            </div>
            <!--/ Pagination -->
        </div>
    </div>
    <!--/ Content Detached to Left -->

    <!-- Sidebar Detached to Right -->
    <div class="sidebar-detached sidebar-right">
        <div class="sidebar">

            <!-- Search bar -->
            <div class="blog-search">
                <form action="{{ route('artikel-index','all') }}" method="get">
                    <div class="input-group input-group-merge">
                        <input name="artikel_search" type="text" value="{{ request()->artikel_search }}" class="form-control" placeholder="Cari artikel" />
                        <div class="input-group-append">
                          <span class="input-group-text cursor-pointer">
                            <i data-feather="search"></i>
                          </span>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Kanal Artikel -->
            <div class="kanal-artikel mt-2">
                <a href="/artikel/all?page=1" class="btn btn-sm btn-outline-danger rounded-pill mb-50 mr-50 {{ request()->segment(2) == null  ? 'active' : '' }}">Semua Data</a>
                @foreach($data_kanal as $item_kanal)
                    <a href="/artikel/{{ str_replace(' ', '-', $item_kanal['nama']) }}?page=1" class="btn btn-sm btn-outline-success rounded-pill mb-50 mr-50 {{ request()->segment(2) == $item_kanal['nama'] ? 'active' : '' }}">{{ $item_kanal['nama'].'('.$item_kanal['jumlah'].')' }}</a>
                @endforeach
            </div>
        </div>
    </div>
    <!--/ Sidebar Detached to Right -->
@endsection
