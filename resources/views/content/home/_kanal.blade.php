<div id="kanal_berita">

    <div class="card mt-1 mb-50">
        {{-- Card Header--}}
        <div class="card-header bg-warning bg-darken-2 text-white p-1 m-0">
            <h4 class="card-title text-white">:: Kanal Berita</h4>
        </div>

        {{-- Card Body--}}
        <div class="card-body my-50 py-50 text-center">
            @foreach($data_kanal as $item_kanal)
                <a href="/berita/{{ $item_kanal['nama'] }}?page=1" class="btn btn-sm btn-outline-secondary mb-50 mr-50">{{ $item_kanal['nama'].'('.$item_kanal['jumlah'].')' }}</a>
            @endforeach
        </div>
    </div>

</div>
