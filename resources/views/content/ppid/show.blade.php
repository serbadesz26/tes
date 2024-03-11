@extends('layouts/detachedLayoutMaster')

@section('title', $data_konten->kategori)

@section('content')

    <link itemprop="thumbnailUrl" href="{{ $img_thumb }}">
    <span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject">
        <link itemprop="url" href="{{ $img_thumb }}">
    </span>

    <!-- Content Detached to Left -->
    <div class="content-detached content-left">
        <div class="content-body">
            <div class="card">
                @if($data_konten->image)
                    <img src="/konten/{{ $data_konten->image }}" alt="{{ $data_konten->judul }}" class="card-img-top">
                @endif
                <div class="card-body p-1 p-sm-2">

                    <!-- Title dan Share Link  -->
                    <div class="d-flex align-items-center justify-content-between my-1 py-1">
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center mr-1">
                                <h1 class="mb-3 border-bottom">{{ $data_konten->judul }}</h1>
                            </div>
                        </div>

                        <div class="dropdown berita-detail-share">
                            <i data-feather="share-2" class="font-medium-5 text-body cursor-pointer" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></i>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a target="_blank" href="https://wa.me/?text={{ request()->url() }}" class="dropdown-item py-50 px-1">
                                    <span class="fa fa-whatsapp"></span>  WhatsApp
                                </a>
                                <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ request()->url()  }}" class="dropdown-item py-50 px-1">
                                    <span class="fa fa-facebook"></span>  Facebook
                                </a>
                                <a target="_blank" href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ request()->url()  }}" class="dropdown-item py-50 px-1">
                                    <span class="fa fa-twitter"></span>  Twitter
                                </a>
                            </div>
                        </div>

                    </div>

                    {!! $data_konten->konten !!}

                    <!-- Sub Knten -->
                    <section id="accordion-with-margin">
                        <div class="row mt-2">
                            <div class="col-sm-12">
                                <div class="card collapse-icon">

                                    <div class="card-body p-0">

                                        <div class="collapse-margin" id="accordionExample">
                                            @foreach($data_konten->sub_konten as $key => $item_sub_konten)
                                            <div class="card">
                                                <div
                                                    class="card-header"
                                                    id="heading{{ $key }}"
                                                    data-toggle="collapse"
                                                    role="button"
                                                    data-target="#collapse{{ $key }}"
                                                    aria-expanded="false"
                                                    aria-controls="collapse{{ $key }}"
                                                >
                                                    <span class="lead collapse-title"><h4> {{ $item_sub_konten->judul }} </h4></span>
                                                </div>

                                                <div id="collapse{{ $key }}" class="collapse" aria-labelledby="heading{{ $key }}" data-parent="#accordionExample">
                                                    <div class="card-body">
                                                        {!! $item_sub_konten->konten !!}
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </div>

    <!-- Sidebar Detached to Right -->
    <div class="sidebar-detached sidebar-right">
        <div class="sidebar">

            <div class="list-group">
                @foreach($menuData[1]->menu[4]->submenu as $item)
                    <a href="{{ $item->slug == '' ? $item->url : '/'.$item->url }}" class="list-group-item list-group-item-action {{ $item->slug == request()->segment(2) ? 'active' : '' }}">{{ $item->name }}</a>
                @endforeach
            </div>

        </div>
    </div>

@endsection

@section('page-script')
    <script src="https://kit.fontawesome.com/41a75c0358.js" crossorigin="anonymous"></script>
@endsection

