<div class="row">
    <div class="col-12">


        <div class="row border-bottom py-50 mt-3">
            <div class="text-muted col-12 col-md-2 mb-50">ID</div>
            <div class="col-12 col-md-10">
                <h4>{{ $konten->id }}</h4>
            </div>
        </div>

        <div class="row border-bottom py-50 mt-3">
            <div class="text-muted col-12 col-md-2 mb-50">Judul</div>
            <div class="col-12 col-md-10">
                <h4>{{ $konten->judul }}</h4>
            </div>
        </div>

        <div class="row border-bottom py-50 mt-3">
            <div class="text-muted col-12 col-md-2 mb-50">Konten</div>
            <div class="col-12 col-md-10">
                <p>{!! $konten->konten !!}</p>
            </div>
        </div>

        <div class="row border-bottom py-50 mt-3">
            <div class="text-muted col-12 col-md-2 mb-50">Slug</div>
            <div class="col-12 col-md-10">
                <h4>{{ $konten->slug }}</h4>
            </div>
        </div>

        <div class="row border-bottom py-50 mt-3">
            <div class="text-muted col-12 col-md-2 mb-50">Kategori</div>
            <div class="col-12 col-md-10">
                <h4>{{ Helper::listKategoriKonten($konten->kategori_id) }}</h4>
            </div>
        </div>

        <div class="row border-bottom py-50 mt-3">
            <div class="text-muted col-12 col-md-2 mb-50">Created at</div>
            <div class="col-12 col-md-10">
                <h5>{{ $konten->created_at->format('d F Y - H:i') }}</h5>
            </div>
        </div>

        <div class="row border-bottom py-50 mt-3">
            <div class="text-muted col-12 col-md-2 mb-50">Update at</div>
            <div class="col-12 col-md-10">
                <h5>{{ $konten->updated_at->format('d F Y - H:i') }}</h5>
            </div>
        </div>

    </div>

</div>
