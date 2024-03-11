<div id="artikel">

    {{-- Card Header--}}
    <div class="card mt-1">
        <div class="card-header bg-success bg-darken-2 text-white p-1 m-0">
            <h4 class="card-title text-white">:: Artikel Terkini</h4>
            <p class="card-text font-small-2 mr-25 mb-0">
                <a href="{{ route('artikel-index', 'all') }}" class="text-body-heading">
                    + Artikel Lainnya
                </a>
            </p>
        </div>

        {{-- Card Body--}}
        <div class="card-body my-50 py-50">
            <div class="row">
                <!-- Kabar Terkini -->
{{--                <div class="d-flex justify-content-between flex-column col-12 col-md-4 order-1 order-md-1 mt-1 mt-sm-0 p-50">--}}
{{--                    <div id="artikel_terbaru" class="mb-0">--}}
{{--                        <img src="{{ $data_artikel[0]['dtl_foto'] }}" class="img-fluid">--}}
{{--                        <h4 class="blog-recent-post-title mt-1">--}}
{{--                            <a href="/artikel_detil{{ $data_artikel[0]['slug'] }}" class="text-body-heading">{{ $data_artikel[0]['title'] }}</a>--}}
{{--                        </h4>--}}
{{--                        <span class="text-muted small">{{ $data_artikel[0]['penulis'] }}</span>--}}
{{--                    </div>--}}
{{--                </div>--}}

                <!-- Kabar Lainnya -->
                <div class="d-flex justify-content-between flex-column col-12 col-md-12 order-2 order-md-2 p-0">
                    <div class="media-list media-bordered px-50">

                        @foreach(array_slice($data_artikel, 1, 5) as $item_artikel)
                            <div class="media p-50">
                                <div class="media-aside align-self-start pr-1">
                                    <img src="{{ $item_artikel['thumb_foto'] }}" width="100" height="60" class="rounded" alt="{{ Str::of($item_artikel['title'])->words(8, '...') }}">
                                </div>
                                <div class="media-body">
                                    <a href="/artikel_detil{{ $item_artikel['slug'] }}" class="text-body-heading" target="_self">
                                        <h6 class="media-heading">{{ Str::of($item_artikel['title'])->words(8, '...') }}</h6>
                                    </a>
                                    <p class="card-text text-muted small">{{ $item_artikel['penulis'] }}</p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
