@extends('layouts/detachedLayoutMaster')

@section('title', 'Agenda')

@section('content')

    <link itemprop="thumbnailUrl" href="{{ asset('images/website/img_agenda.png') }}">
    <span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject">
        <link itemprop="url" href="{{ asset('images/website/img_agenda.png') }}">
    </span>

    <!-- Content Detached to Left -->
    <div class="content-detached content-left">
        <div class="content-body">
            <div class="row">
                @foreach($data_agenda['daftarAgenda'] as $item_agenda)
                    <div class="col-12">
                        <div class="card p-1">

                            <div class="media-list media-bordered px-05">
                                <div class="media p-50">
                                    {{-- Tanggal Agenda--}}
                                    <div class="media-aside align-self-start pr-1">
                                        <div class="agenda-day">
                                            <h3 class="mb-0 text-warning">
                                                {{ $item_agenda['tanggal'] }}
                                            </h3>
                                            <h2 class="mb-0 text-primary">
                                                {{ $item_agenda['bulan'] }}
                                            </h2>
                                            <h4 class="mb-0 text-danger">
                                                {{ $item_agenda['tahun'] }}
                                            </h4>
                                        </div>
                                    </div>
                                    {{-- Judul Agenda--}}
                                    <div class="media-body">
                                        <h2 class="media-heading mb-0">
                                            <a href="/agenda_detil{{ $item_agenda['slug'] }}" class="text-body-heading" target="_self">
                                                {{ $item_agenda['judul'] }}
                                            </a>
                                        </h2>
                                        <div class="card-text">
                                            {{ ($item_agenda['lokasi'] ? $item_agenda['lokasi'] : '').($item_agenda['pelaksana'] ? ' | '.$item_agenda['pelaksana'] : '') }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach

            </div>

            <div class="row">
                <div class="col-12">
{{--                    <span class="badge bg-warning bg-darken-4">Pages : {{ $data_agenda['pager']['pages'] }}</span>--}}
                </div>
            </div>

            <!-- Pagination -->
            <div class="row">
                <div class="col-12">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center mt-2">

                            <?php
                                $curPage = $data_agenda['pager']['page'];
                                $totalPage = $data_agenda['pager']['pages'];

                                $startPage = ($curPage < 5)? 1 : $curPage - 4;
                                $endPage = 8 + $startPage;
                                $endPage = ($totalPage < $endPage) ? $totalPage : $endPage;
                                $diff = $startPage - $endPage + 8;
                                $startPage -= ($startPage - $diff > 0) ? $diff : 0;
                            ?>

                            @if($startPage > 1)
                                <li class="page-item prev-item"><a class="page-link" href="/agenda/{{ request()->segment(2) }}?page={{ $curPage-5 }}&agenda_search={{ request()->agenda_search }}"></a></li>
                            @endif

                            @for ($i=$startPage; $i<=$endPage; $i++)
                                <li class="page-item {{ ($i == request()->page) ? 'active' : '' }}"><a class="page-link" href="/agenda/{{ request()->segment(2) }}?page={{ $i }}&agenda_search={{ request()->agenda_search }}">{{ $i }}</a></li>
                            @endfor

                            @if($endPage < $totalPage)
                                <li class="page-item next-item"><a class="page-link" href="/agenda/{{ request()->segment(2) }}?page={{ $curPage+5 }}&agenda_search={{ request()->agenda_search }}"></a></li>
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
            <div class="agenda-search">
                <form action="#" method="get">
                    <div class="input-group input-group-merge">
                        <input name="agenda_search" type="text" value="" class="form-control" placeholder="Cari agenda" />
                        <div class="input-group-append">
                          <span class="input-group-text cursor-pointer">
                            <i data-feather="search"></i>
                          </span>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Tags Agenda -->
            <div class="kanal-agenda mt-2">
                <!-- Tahun Agenda -->
                <h4 class="section-label my-1">+ Tahun Agenda</h4>
                @for($r = 2022; $r >= 2019; $r--)
                    <a href="/agenda?tahun={{ $r }}" class="btn btn-sm btn-outline-danger rounded-pill mb-50 mr-50">{{ $r }}</a>
                @endfor

                 <!-- Bulan Agenda -->
                <h4 class="section-label my-1">+ Bulan Agenda</h4>
                <a href="/agenda?page=1" class="btn btn-sm btn-outline-danger rounded-pill mb-50 mr-50">Semua Data</a>
                @for($i = 1; $i <= 12; $i++)
                    <a href="/agenda?tahun={{ request()->tahun }}&bulan={{ $i }}" class="btn btn-sm btn-outline-danger rounded-pill mb-50 mr-50">{{ Helper::getNamaBulan($i) }}</a>
                @endfor
            </div>

        </div>
    </div>
    <!--/ Sidebar Detached to Right -->
@endsection
