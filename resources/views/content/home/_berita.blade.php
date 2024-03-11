<div id="berita">

    <div class="card mt-1 mb-50">
        {{-- Card Header--}}
        <div class="card-header bg-primary bg-darken-2 text-white p-1 m-0">
            <h4 class="card-title text-white">:: Kabar Terkini</h4>
            <p class="card-text font-small-2 mr-25 mb-0">
                <a href="{{ route('berita-index', 'all') }}" class="text-body-heading">
                    + Kabar Lainnya
                </a>
            </p>
        </div>

        {{-- Card Body--}}
        <div class="card-body my-50 py-50">
            <div class="row">
                <!-- Kabar Terkini -->
                <div class="d-flex justify-content-between flex-column mt-1 mt-sm-0 col-12 col-md-6 order-1 p-50">
                    <div id="berita_terbaru" class="mb-0">
                        <img src="{{ $data_berita[0]['thumb_foto'] }}" width="100%" height="auto" class="img-fluid" alt="{{ $data_berita[0]['title'] }}">
                        <h4 class="blog-recent-post-title mt-1">
                            <a href="berita_detil{{ $data_berita[0]['slug'] }}" class="text-body-heading">{{ $data_berita[0]['title'] }}</a>
                        </h4>
                        <span class="text-muted small">{{ $data_berita[0]['created'] }} | {{ $data_berita[0]['sumber'] }}</span>
                    </div>
                </div>

                <!-- Kabar Lainnya -->
{{--                <div class="d-flex justify-content-between flex-column col-sm-6 order-sm-2 col-12 order-2 p-0">--}}
                <div class="d-flex justify-content-between flex-column col-12 col-md-6 order-2 p-0">
                    <div class="media-list media-bordered px-50">

                        @foreach(array_slice($data_berita, 1, 4) as $item_berita)
                            <div class="media p-50">
                                <div class="media-aside align-self-start pr-1">
                                    <img src="{{ $item_berita['thumb_foto'] }}" width="100" height="60" class="rounded" alt=""{{ $item_berita['title'] }}>
                                </div>
                                <div class="media-body">
                                    <a href="/berita_detil{{ $item_berita['slug'] }}" class="text-body-heading" target="_self">
                                        <h6 class="media-heading">{{ $item_berita['title'] }}</h6>
                                    </a>
                                    <p class="card-text text-muted small">{{ $item_berita['created'].' | '.$item_berita['sumber'] }}</p>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
