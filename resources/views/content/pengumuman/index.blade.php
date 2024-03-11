@extends('layouts/detachedLayoutMaster')

@section('title', 'Pengumuman')

@section('content')

    <link itemprop="thumbnailUrl" href="{{ asset('images/website/img_pengumuman.png') }}">
    <span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject">
        <link itemprop="url" href="{{ asset('images/website/img_pengumuman.png') }}">
    </span>

    <!-- Content Detached to Left -->
    <div class="content-detached content-left">
        <div class="content-body">
            <div class="row">
                @foreach($data_pengumuman['listPengumuman'] as $item_pengumuman)
                    <div class="col-12">
                        <div class="card p-1">

                            <div class="text-body-heading">
                                @if($item_pengumuman['tgl_status'] == '0 sec')
                                    <span class="badge bg-success bg-darken-4 mb-1">{{ $item_pengumuman['tanggal'] }}</span>
                                @else
                                    <span class="badge bg-danger bg-darken-4 mb-1">{{ $item_pengumuman['tanggal'] }}</span>
                                @endif
                                <a href="/pengumuman_detil{{ request()->pengumuman_search ? substr($item_pengumuman['slug'], 0) : $item_pengumuman['slug'] }}">
                                <h2 class="media-heading">{{ $item_pengumuman['title'] }}</h2>
                                </a>

                                <div class="alert alert-primary m-0" role="alert">
                                    <div class="alert-body">Sumber : <strong>{{ $item_pengumuman['sumber'] }}</strong></div>
                                </div>
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
                                $curPage = $data_pengumuman['pager']['page'];
                                $totalPage = $data_pengumuman['pager']['pages'];

                                $startPage = ($curPage < 5)? 1 : $curPage - 4;
                                $endPage = 8 + $startPage;
                                $endPage = ($totalPage < $endPage) ? $totalPage : $endPage;
                                $diff = $startPage - $endPage + 8;
                                $startPage -= ($startPage - $diff > 0) ? $diff : 0;
                            ?>

                            @if($startPage > 1)
                                <li class="page-item prev-item"><a class="page-link" href="/pengumuman/{{ request()->segment(2) }}?page={{ $curPage-5 }}&pengumuman_search={{ request()->pengumuman_search }}"></a></li>
                            @endif

                            @for ($i=$startPage; $i<=$endPage; $i++)
                                <li class="page-item {{ ($i == request()->page) ? 'active' : '' }}"><a class="page-link" href="/pengumuman/{{ request()->segment(2) }}?page={{ $i }}&pengumuman_search={{ request()->pengumuman_search }}">{{ $i }}</a></li>
                            @endfor

                            @if($endPage < $totalPage)
                                <li class="page-item next-item"><a class="page-link" href="/pengumuman/{{ request()->segment(2) }}?page={{ $curPage+5 }}&pengumuman_search={{ request()->pengumuman_search }}"></a></li>
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
            <div class="pengumuman-search">
                <form action="{{ route('pengumuman-index') }}" method="get">
                    <div class="input-group input-group-merge">
                        <input name="pengumuman_search" type="text" value="" class="form-control" placeholder="Cari pengumuman" />
                        <div class="input-group-append">
                          <span class="input-group-text cursor-pointer">
                            <i data-feather="search"></i>
                          </span>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Tags Pengumuman -->
            <div class="kanal-pengumuman mt-2">
                <a href="/pengumuman?page=1" class="btn btn-sm btn-outline-danger rounded-pill mb-50 mr-50">Semua Data</a>
            </div>

        </div>
    </div>
    <!--/ Sidebar Detached to Right -->
@endsection
