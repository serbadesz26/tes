@extends('layouts/detachedLayoutMaster')

@section('title', 'Berita')

@section('content')

    <link itemprop="thumbnailUrl" href="{{ asset('images/website/img_berita.png') }}">
    <span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject">
        <link itemprop="url" href="{{ asset('images/website/img_berita.png') }}">
    </span>

    <!-- Content Detached to Left -->
    <div class="content-detached content-left">
        <div class="content-body">
            <div class="row">
                @foreach($data_berita['daftarBerita'] as $item_berita)
                    <div class="col-md-4 px-0 px-sm-1">
                        <div class="card">
                            <img src="{{ $item_berita['thumb_foto'] }}" alt="Card image cap" class="card-img-top">
                            <div class="card-body mb-0 px-05">
                                <h4 class="card-title"><a href="/berita_detil{{ request()->berita_search ? substr($item_berita['slug'], 32) : $item_berita['slug'] }}">{{ $item_berita['title'] }}</a></h4>
                                <span class="badge bg-warning mb-50">{{ $item_berita['created'] }}</span>
                                <span class="badge bg-success mb-50">{{ $item_berita['sumber'] }}</span>
                                <span class="badge bg-primary mb-50">{{ $item_berita['kanal'] }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="row">
                <div class="col-12">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center mt-2">

                            <?php
                                $curPage = $data_berita['pager']['page'];
                                $totalPage = $data_berita['pager']['pages'];

                                $startPage = ($curPage < 5)? 1 : $curPage - 4;
                                $endPage = 8 + $startPage;
                                $endPage = ($totalPage < $endPage) ? $totalPage : $endPage;
                                $diff = $startPage - $endPage + 8;
                                $startPage -= ($startPage - $diff > 0) ? $diff : 0;
                            ?>

                            @if($startPage > 1)
                                <li class="page-item prev-item"><a class="page-link" href="/berita/{{ request()->segment(2) }}?page={{ $curPage-5 }}&berita_search={{ request()->berita_search }}"></a></li>
                            @endif

                            @for ($i=$startPage; $i<=$endPage; $i++)
                                <li class="page-item {{ ($i == request()->page) ? 'active' : '' }}"><a class="page-link" href="/berita/{{ request()->segment(2) }}?page={{ $i }}&berita_search={{ request()->berita_search }}">{{ $i }}</a></li>
                            @endfor

                            @if($endPage < $totalPage)
                                <li class="page-item next-item"><a class="page-link" href="/berita/{{ request()->segment(2) }}?page={{ $curPage+5 }}&berita_search={{ request()->berita_search }}"></a></li>
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
                <form action="{{ route('berita-index','all') }}" method="get">
                    <div class="input-group input-group-merge">
                        <input name="berita_search" type="text" value="{{ request()->berita_search }}" class="form-control" placeholder="Cari berita" />
                        <div class="input-group-append">
                          <span class="input-group-text cursor-pointer">
                            <i data-feather="search"></i>
                          </span>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Kanal Berita -->
            <div class="kanal-berita mt-2">
                <a href="/berita/all" class="btn btn-sm btn-outline-danger rounded-pill mb-50 mr-50 {{ request()->segment(2) == null  ? 'active' : '' }}">Semua Data</a>
                @foreach($data_kanal as $item_kanal)
                    <a href="/berita/{{ str_replace(' ', '-', $item_kanal['nama']) }}?page=1" class="btn btn-sm btn-outline-success rounded-pill mb-50 mr-50 {{ request()->segment(2) == $item_kanal['nama'] ? 'active' : '' }}">{{ $item_kanal['nama'].' ('.$item_kanal['jumlah'].')' }}</a>
                @endforeach
            </div>

        </div>
    </div>
    <!--/ Sidebar Detached to Right -->
@endsection
