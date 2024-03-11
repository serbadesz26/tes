<div id="pengumuman">

    <div class="card my-50 mt-1 mb-50">
        {{-- Card Header--}}
        <div class="card-header bg-danger bg-darken-4 text-white p-1 m-0">
            <h4 class="card-title text-white">Pengumuman Terbaru</h4>
            <p class="card-text font-small-2 mr-25 mb-0">
                <a href="{{ route('pengumuman-index') }}" class="text-body-heading">
                    + Pengumuman Lainnya
                </a>
            </p>
        </div>

        {{-- Card Body--}}
        <div class="card-body my-50 py-50">
            <ul class="timeline">
                @foreach($data_pengumuman as $item_pengumuman)
                    <li class="timeline-item pb-0">
                    <span class="timeline-point timeline-point-indicator"></span>
                    <div class="timeline-event">
                        <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                            <a href="/pengumuman_detil{{ $item_pengumuman['slug'] }}" class="text-body-heading" target="_self">
                                <h4 class="media-heading">{{ $item_pengumuman['title'] }}</h4>
                            </a>
                        </div>
                        <p>{{ $item_pengumuman['sumber'] }}</p>
                    </div>
                </li>
                @endforeach
            </ul>
        </div>
    </div>

</div>
