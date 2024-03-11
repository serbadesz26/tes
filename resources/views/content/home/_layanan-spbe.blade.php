<div id="layanan_spbe">

    <div class="card mt-1 mb-50">
        {{-- Card Header--}}
        <div class="card-header bg-info bg-darken-2 text-white p-1 m-0">
            <h4 class="card-title text-white">Layanan SPBE</h4>
            <p class="card-text font-small-2 mr-25 mb-0">
                <a href="/layanan_spbe/all/all" class="text-body-heading">
                    :: Layanan Lainnya
                </a>
            </p>
        </div>

        {{-- Card Body--}}
        <!-- Nav Tabs -->
        <ul class="nav nav-tabs nav-justified" id="myTab2" role="tablist">
            <li class="nav-item">
                <a
                    class="nav-link active"
                    id="layanan-publik-tab"
                    data-toggle="tab"
                    href="#layanan-publik-just"
                    role="tab"
                    aria-controls="layanan-publik-just"
                    aria-selected="true">Layanan Publik</a>
            </li>
            <li class="nav-item">
                <a
                    class="nav-link"
                    id="layanan-pemerintahan-tab"
                    data-toggle="tab"
                    href="#layanan-pemerintahan-just"
                    role="tab"
                    aria-controls="layanan-pemerintahan-just"
                    aria-selected="true">Layanan Pemerintahan</a>
            </li>
        </ul>

        <!-- Tab Panes -->
        <div class="tab-content p-1">
            <div class="tab-pane active" id="layanan-publik-just" role="tabpanel" aria-labelledby="layanan-publik-tab">
                <div class="row">
                    @foreach($data_layanan_publik as $item_layanan_publik)
                    <div class="col-3 col-sm-2 mx-0 px-25">
                        <div class="card text-center border mb-25">
                            <a href="{{ $item_layanan_publik['url']}}">
                                <div class="card-body m-0 p-0">
                                    <img src="{{ $item_layanan_publik['icon'] }}" alt="{{ $item_layanan_publik['singkatan']}}" class="mx-auto d-block" width="64px" height="auto">
                                    <div class="card-text mb-0">
                                        {{ $item_layanan_publik['singkatan']}}
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
                </div>
            </div>
            <div class="tab-pane" id="layanan-pemerintahan-just" role="tabpanel" aria-labelledby="layanan-pemerintahan-tab">
                <div class="row">
                    @foreach($data_layanan_pemerintah as $item_layanan_pemerintah)
                        <div class="col-3 col-sm-2 mx-0 px-25">
                            <div class="card text-center border mb-25">
                                <a href="{{ $item_layanan_pemerintah['url']}}">
                                    <div class="card-body m-0 p-0">
                                        <img src="{{ $item_layanan_pemerintah['icon'] }}" alt="{{ $item_layanan_pemerintah['singkatan']}}" class="mx-auto d-block" width="64px" height="auto">
                                        <div class="card-text mb-0">
                                            {{ $item_layanan_pemerintah['singkatan']}}
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

</div>
