@extends('layouts/detachedLayoutMaster')

@section('title', 'Data Bank Data')

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
                    @foreach($data_bank_data['listBankData'] as $key => $item_bank_data)

                        @if($last_kat != $item_bank_data['kategori'])
                            <div class="col-12">
                                <h3 class="mt-2 mb-1 text-primary text-uppercase font-weight-bolder border-bottom">:: {{$item_bank_data['kategori']}}</h3>
                            </div>
                        @endif

                        <div class="col-12">
                            <div class="card">
                                <div class="card-body p-1 p-sm-2">
                                    <a href="{{ route('bank-data-show', substr($item_bank_data['slug'], 1)) }}">
                                        <h2>{{ $item_bank_data['title'] }}</h2>
                                    </a>
                                    <span class="badge badge-danger mb-50">Data Tahun {{ $item_bank_data['tahun'] }}</span>
                                    <span class="badge badge-primary">Sumber : {{ $item_bank_data['sumber'] }}</span>
                                </div>
                            </div>
                        </div>

                        @php
                            $last_kat = $item_bank_data['kategori'];
                        @endphp

                    @endforeach()
                    </div>

                </div>
            </div>

            <!-- Info Paging -->
{{--            <div class="row my-1">--}}
{{--                <div class="col-12">--}}
{{--                    <span class="badge bg-warning bg-darken-4">Pages : {{ $data_bank_data['pager']['pages'] }}</span>--}}
{{--                    <span class="badge bg-danger bg-darken-4">Page : {{ $data_bank_data['pager']['page'] }}</span>--}}
{{--                    <span class="badge bg-success bg-darken-4">Limit : {{ $data_bank_data['pager']['limit'] }}</span>--}}
{{--                    <span class="badge bg-primary bg-darken-4">Count : {{ $data_bank_data['pager']['count'] }}</span>--}}
{{--                </div>--}}
{{--            </div>--}}

            <!-- Pagination -->
            <div class="row">
                <div class="col-12">
                    <nav aria-label="Page navigation">
                        <ul class="pagination justify-content-center mt-2">

                            <?php
                            $curPage = $data_bank_data['pager']['page'];
                            $totalPage = $data_bank_data['pager']['pages'];

                            $startPage = ($curPage < 5)? 1 : $curPage - 4;
                            $endPage = 8 + $startPage;
                            $endPage = ($totalPage < $endPage) ? $totalPage : $endPage;
                            $diff = $startPage - $endPage + 8;
                            $startPage -= ($startPage - $diff > 0) ? $diff : 0;
                            ?>

                            @if($startPage > 1)
                                <li class="page-item prev-item"><a class="page-link" href="/bank_data/{{ request()->segment(2) }}?page={{ $curPage-5 }}&bank_data_search={{ request()->bank_data_search }}"></a></li>
                            @endif

                            @for ($i=$startPage; $i<=$endPage; $i++)
                                <li class="page-item {{ ($i == request()->page) ? 'active' : '' }}"><a class="page-link" href="/bank_data/{{ request()->segment(2) }}?page={{ $i }}&bank_data_search={{ request()->bank_data_search }}">{{ $i }}</a></li>
                            @endfor

                            @if($endPage < $totalPage)
                                <li class="page-item next-item"><a class="page-link" href="/bank_data/{{ request()->segment(2) }}?page={{ $curPage+5 }}&bank_data_search={{ request()->bank_data_search }}"></a></li>
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
            <div class="bank-data-search">
                <form action="{{ route('bank-data-index', 'all') }}" method="get">
                    <div class="input-group input-group-merge">
                        <input name="bank_data_search" type="text" value="{{ request()->bank_data_search }}" class="form-control" placeholder="Cari Data Bank Data" />
                        <div class="input-group-append">
                          <span class="input-group-text cursor-pointer">
                            <i data-feather="search"></i>
                          </span>
                        </div>
                    </div>
                </form>
            </div>

            <h4 class="section-label my-2">+ Kategori Data Bank Data</h4>
            <div class="kanal-bank-data mt-2">
                <a href="/bank_data/all?page=1" class="btn btn-sm btn-outline-danger rounded-pill mb-50 mr-50 {{ request()->segment(2) == null  ? 'active' : '' }}">Semua Data</a>
                @foreach($data_kategori_bank_data as $item_kategori)
                    <a href="/bank_data/{{ str_replace(' ', '-', $item_kategori['nama']) }}?page=1" class="btn btn-sm btn-outline-success rounded-pill mb-50 mr-50 {{ request()->segment(2) == $item_kategori['nama'] ? 'active' : '' }}">{{ $item_kategori['nama'].' ('.$item_kategori['jumlah'].')' }}</a>
                @endforeach
            </div>

        </div>
    </div>
    <!--/ Sidebar Detached to Right -->
@endsection
