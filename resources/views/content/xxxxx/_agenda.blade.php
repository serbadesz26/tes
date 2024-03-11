<div id="agenda">

    {{-- Card Header--}}
    <div class="card mt-1">
        <div class="card-header bg-primary bg-darken-1 text-white p-1 m-0">
            <h4 class="card-title text-white">Agenda Terbaru</h4>
            <p class="card-text font-small-2 mr-25 mb-0">
                <a href="{{ route('agenda-index', 'tahun=2022') }}" class="text-body-heading">
                    + Agenda Lainnya
                </a>
            </p>
        </div>

        {{-- Card Body--}}
        <div class="card-body my-50 py-50">
            @foreach($data_agenda as $item_agenda)
                <div class="media-list media-bordered px-05">
                    <div class="media p-50">
                        {{-- Tanggal Agenda--}}
                        <div class="media-aside align-self-start pr-1">
                            <div class="agenda-day">
                                <h4 class="mb-0 text-warning">
                                    {{ $item_agenda['tanggal'] }}
                                </h4>
                                <h3 class="mb-0 text-primary">
                                    {{ $item_agenda['bulan'] }}
                                </h3>
                            </div>
                        </div>
                        {{-- Judul Agenda--}}
                        <div class="media-body">
                            <h4 class="media-heading mb-0">
                                <a href="/agenda_detil{{ $item_agenda['slug'] }}" class="text-body-heading" target="_self">
                                    {{ $item_agenda['judul'] }}
                                </a>
                            </h4>
                            <div class="card-text">
                                {{ $item_agenda['lokasi']." | ".$item_agenda['pelaksana'] }}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
