@extends('layouts/detachedLayoutMaster')

@section('title', 'Data Transparansi Anggaran')

@section('content')

    <!-- Content Detached to Left -->
    <div class="content-detached content-left">
        <div class="content-body">

            <div class="row">
                <div class="col-12">

                    @php
                        $last_kat = '';
                    @endphp

                    <div class="row">
                    @foreach($data_transparansi_anggaran['listTransparansiAnggaran'] as $key => $item_transparansi_anggaran)

                        @if($last_kat != $item_transparansi_anggaran['kategori'])
                            <div class="col-12 text-right">
                                <h3 class="mt-2 mb-1 text-primary text-uppercase font-weight-bolder border-bottom">:: {{$item_transparansi_anggaran['kategori']}}</h3>
                            </div>
                        @endif

                        <div class="col-12 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <a href="{{ route('transparansi-anggaran-show', substr($item_transparansi_anggaran['slug'], 1)) }}">
                                        <h2>{{ $item_transparansi_anggaran['title'] }}</h2>
                                    </a>
                                    <span class="badge badge-danger">Data tahun {{ $item_transparansi_anggaran['tahun'] }}</span>
                                </div>
                            </div>
                        </div>

                        @php
                            $last_kat = $item_transparansi_anggaran['kategori'];
                        @endphp

                    @endforeach()
                    </div>

                </div>
            </div>

            <!-- Info Paging -->
{{--            <div class="row my-1">--}}
{{--                <div class="col-12">--}}
{{--                    <span class="badge bg-warning bg-darken-4">Pages : {{ $data_transparansi_anggaran['pager']['pages'] }}</span>--}}
{{--                    <span class="badge bg-danger bg-darken-4">Page : {{ $data_transparansi_anggaran['pager']['page'] }}</span>--}}
{{--                    <span class="badge bg-success bg-darken-4">Limit : {{ $data_transparansi_anggaran['pager']['limit'] }}</span>--}}
{{--                    <span class="badge bg-primary bg-darken-4">Count : {{ $data_transparansi_anggaran['pager']['count'] }}</span>--}}
{{--                </div>--}}
{{--            </div>--}}

            <!-- Pagination -->
            <div class="row">
                <div class="col-12">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center mt-2">

                            <?php
                            $curPage = $data_transparansi_anggaran['pager']['page'];
                            $totalPage = $data_transparansi_anggaran['pager']['pages'];

                            $startPage = ($curPage < 5)? 1 : $curPage - 4;
                            $endPage = 8 + $startPage;
                            $endPage = ($totalPage < $endPage) ? $totalPage : $endPage;
                            $diff = $startPage - $endPage + 8;
                            $startPage -= ($startPage - $diff > 0) ? $diff : 0;
                            ?>

                            @if($startPage > 1)
                                <li class="page-item prev-item"><a class="page-link" href="/transparansi_anggaran/{{ request()->segment(2) }}?page={{ $curPage-5 }}&transparansi_anggaran_search={{ request()->transparansi_anggaran_search }}"></a></li>
                            @endif

                            @for ($i=$startPage; $i<=$endPage; $i++)
                                <li class="page-item {{ ($i == request()->page) ? 'active' : '' }}"><a class="page-link" href="/transparansi_anggaran/{{ request()->segment(2) }}?page={{ $i }}&transparansi_anggaran_search={{ request()->transparansi_anggaran_search }}">{{ $i }}</a></li>
                            @endfor

                            @if($endPage < $totalPage)
                                <li class="page-item next-item"><a class="page-link" href="/transparansi_anggaran/{{ request()->segment(2) }}?page={{ $curPage+5 }}&transparansi_anggaran_search={{ request()->transparansi_anggaran_search }}"></a></li>
                            @endif

                        </ul>
                    </nav>
                </div>
            </div>

        </div>
    </div>
    <!--/ Content Detached to Left -->

    <!-- Sidebar Detached to Right -->
    <div class="sidebar-detached sidebar-right">
        <div class="sidebar">

            <!-- Search bar -->
            <div class="transparansi-anggaran-search">
                <form action="{{ route('transparansi-anggaran-index', 'all') }}" method="get">
                    <div class="input-group input-group-merge">
                        <input name="transparansi_anggaran_search" type="text" value="{{ request()->transparansi_anggaran_search }}" class="form-control" placeholder="Cari Data Transparansi Anggaran" />
                        <div class="input-group-append">
                          <span class="input-group-text cursor-pointer">
                            <i data-feather="search"></i>
                          </span>
                        </div>
                    </div>
                </form>
            </div>

            <h4 class="section-label my-2">+ Kategori Data Transparansi Anggaran</h4>
            <div class="kanal-transparansi-anggaran mt-2">
                <a href="/transparansi_anggaran/all?page=1" class="btn btn-sm btn-outline-danger rounded-pill mb-50 mr-50 {{ request()->segment(2) == null  ? 'active' : '' }}">Semua Data</a>
                @foreach($data_kategori_transparansi_anggaran as $item_kategori)
                    <a href="/transparansi_anggaran/{{ str_replace(' ', '-', $item_kategori['nama']) }}?page=1" class="btn btn-sm btn-outline-success rounded-pill mb-50 mr-50 {{ request()->segment(2) == $item_kategori['nama'] ? 'active' : '' }}">{{ $item_kategori['nama'].' ('.$item_kategori['jumlah'].')' }}</a>
                @endforeach
            </div>

        </div>
    </div>
    <!--/ Sidebar Detached to Right -->
@endsection
