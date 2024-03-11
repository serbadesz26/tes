@extends('layouts/detachedLayoutMaster')

@section('title', 'Produk Hukum')

@section('content')
    <!-- Content Detached to Left -->
    <div class="content-detached content-left">
        <div class="content-body">

            <div class="card">
                <div class="card-body">

                    <!-- Tabel Data -->
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Kategori</th>
                                <th class="text-center">Nomor</th>
                                <th>Tahun</th>
                                <th>Judul</th>
                                <th>File</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data_produk_hukum['listProdKum'] as $key => $item_produk_hukum)
                            <tr>
                                <td>{{ $item_produk_hukum['kategori'] }}</td>
                                <td class="text-center">{{ $item_produk_hukum['no'] }}</td>
                                <td class="text-center">{{ $item_produk_hukum['tahun'] }}</td>
                                <td><a href="{{ route('produk-hukum-show', substr($item_produk_hukum['slug'], 29)) }}">{{ $item_produk_hukum['title'] }}</a></td>
                                <td>
                                    @foreach(Helper::str2array($item_produk_hukum['file']) as $key => $item_file)
                                        <a href="{{ $item_file }}" target="blank">
                                            <div class="badge badge-danger m-25">File {{ $key+1 }}</div>
                                        </a>
                                    @endforeach
                                </td>
                            </tr>
                            @endforeach()
                            </tbody>
                        </table>
                    </div>
                        </div>
                    </div>

                    <!-- Info Paging -->
{{--                    <div class="row my-1">--}}
{{--                        <div class="col-12">--}}
{{--                            <span class="badge bg-warning bg-darken-4">Pages : {{ $data_produk_hukum['pager']['pages'] }}</span>--}}
{{--                            <span class="badge bg-danger bg-darken-4">Page : {{ $data_produk_hukum['pager']['page'] }}</span>--}}
{{--                            <span class="badge bg-success bg-darken-4">Limit : {{ $data_produk_hukum['pager']['limit'] }}</span>--}}
{{--                            <span class="badge bg-primary bg-darken-4">Count : {{ $data_produk_hukum['pager']['count'] }}</span>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <!-- Pagination -->
                    <div class="row">
                        <div class="col-12">
                            <nav aria-label="Page navigation">
                                <ul class="pagination justify-content-center mt-2">

                                    <?php
                                    $curPage = $data_produk_hukum['pager']['page'];
                                    $totalPage = $data_produk_hukum['pager']['pages'];

                                    $startPage = ($curPage < 5)? 1 : $curPage - 4;
                                    $endPage = 8 + $startPage;
                                    $endPage = ($totalPage < $endPage) ? $totalPage : $endPage;
                                    $diff = $startPage - $endPage + 8;
                                    $startPage -= ($startPage - $diff > 0) ? $diff : 0;
                                    ?>

                                    @if($startPage > 1)
                                        <li class="page-item prev-item"><a class="page-link" href="/produk_hukum/{{ request()->segment(2) }}?page={{ $curPage-5 }}&prodkum_search={{ request()->prodkum_search }}"></a></li>
                                    @endif

                                    @for ($i=$startPage; $i<=$endPage; $i++)
                                        <li class="page-item {{ ($i == request()->page) ? 'active' : '' }}"><a class="page-link" href="/produk_hukum/{{ request()->segment(2) }}?page={{ $i }}&prodkum_search={{ request()->prodkum_search }}">{{ $i }}</a></li>
                                    @endfor

                                    @if($endPage < $totalPage)
                                        <li class="page-item next-item"><a class="page-link" href="/produk_hukum/{{ request()->segment(2) }}?page={{ $curPage+5 }}&prodkum_search={{ request()->prodkum_search }}"></a></li>
                                    @endif

                                </ul>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!--/ Content Detached to Left -->

    <!-- Sidebar Detached to Right -->
    <div class="sidebar-detached sidebar-right">
        <div class="sidebar">

            <!-- Search bar -->
            <div class="blog-search">
                <form action="{{ route('produk-hukum-index', 'all') }}" method="get">
                    <div class="input-group input-group-merge">
                        <input name="prodkum_search" type="text" value="{{ request()->prodkum_search }}" class="form-control" placeholder="Cari Produk Hukum" />
                        <div class="input-group-append">
                          <span class="input-group-text cursor-pointer">
                            <i data-feather="search"></i>
                          </span>
                        </div>
                    </div>
                </form>
            </div>

            <h4 class="section-label my-2">+ Kategori Produk Hukum</h4>
            <div class="kanal-produk-hukum mt-2">
                <a href="/produk_hukum/all?page=1" class="btn btn-sm btn-outline-danger rounded-pill mb-50 mr-50 {{ request()->segment(2) == null  ? 'active' : '' }}">Semua Data</a>
                @foreach($data_kategori_produk_hukum as $item_kategori)
                    <a href="/produk_hukum/{{ str_replace(' ', '-', $item_kategori['nama']) }}?page=1" class="btn btn-sm btn-outline-success rounded-pill mb-50 mr-50 {{ request()->segment(2) == $item_kategori['nama'] ? 'active' : '' }}">{{ $item_kategori['nama'].' ('.$item_kategori['jumlah'].')' }}</a>
                @endforeach
            </div>

        </div>
    </div>
    <!--/ Sidebar Detached to Right -->
@endsection
