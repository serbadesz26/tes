<div class="row">
    <div class="col-12">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Judul</strong>
                {!! Form::text('judul', null, array('class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kategori</strong>
                {!! Form::select('kategori_id', Helper::listKategoriKonten(), null , ['class' => 'form-control']) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Konten</strong>
                {!! Form::textarea('konten', null, ['id' => 'konten', 'class' =>'form-control textarea', 'style' => 'width: 100%; height: 600px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;']) !!}
            </div>
        </div>

        {{-- Image --}}
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">
                {{ Form::checkbox('hapusimage', 0, null, ['id' => 'hapusimage', 'class' => 'field']) }}
                {!! Form::label('hapusimage', 'Hapus File Image ') !!}
            </div>

            <div class="form-group">
                <strong>Image</strong>
                    {{ Form::file('image') }}
            </div>
        </div>

    </div>

</div>



