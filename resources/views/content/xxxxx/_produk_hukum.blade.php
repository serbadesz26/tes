<div id="produk_hukum">

    {{-- Card Header--}}
    <div class="card mt-1">
        <div class="card-header bg-info bg-darken-4 text-white p-1 m-0">
            <h4 class="card-title text-white">Produk Hukum</h4>
            <p class="card-text font-small-2 mr-25 mb-0">
                <a href="{{ route('produk-hukum-index', 'all') }}?page=1" class="text-body-heading">
                    + Produk Hukum Lainnya
                </a>
            </p>
        </div>

        {{-- Card Body--}}
        <div class="card-body my-50 py-50">
            <div class="media-list media-bordered px-05">
                @foreach(array_slice($data_produk_hukum, 1, 4) as $item_produk_hukum)
                    <div class="media p-50">
                            {{-- Icon Produk Hukum--}}
                            <div class="media-aside align-self-start pr-1">
                                <img src="{{asset('images/icons/book.svg')}}" blank-color="#ccc" width="32" height="auto" alt="Produk Hukum"/>
                            </div>
                            {{-- Judul Produk Hukum--}}
                            <div class="media-body">
                                <h5 class="media-heading mb-0">
                                    <a href="{{ route('produk-hukum-show', substr($item_produk_hukum['slug'], 1)) }}">{{ $item_produk_hukum['kategori']." Nomor ".$item_produk_hukum['no']." Tahun ".$item_produk_hukum['tahun'] }}</a>
                                </h5>
                                <div class="card-text small">
                                    {{ $item_produk_hukum['title'] }}
                                </div>
                            </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</div>
