<div class="row">
    <div class="col-md-12">
        <div class="col-xs-12 col-sm-12 col-md-12">
            {!! Form::hidden('konten_id', request()->konten_id) !!}
            <div class="form-group">
                <strong>Judul</strong>
                {!! Form::text('judul', null, array('class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Konten</strong>
                {!! Form::textarea('konten', null, ['id' => 'konten', 'class' =>'form-control textarea', 'style' => 'width: 100%; height: 400px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">

            <div class="form-group">
                <div class="form-group">
                    {!! Form::label('status', 'Status') !!}
                    {{ Form::select('status', ['1'  => 'Aktif','0'  => 'Tidak Aktif'], null, ['class' => 'form-control']) }}
                </div>
            </div>

        </div>
    </div>

</div>



