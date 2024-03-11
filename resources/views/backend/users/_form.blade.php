<div class="row">
    <div class="col-md-6">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Kelamin</strong>
                {!! Form::select('kelamin', [
                'Laki-laki' => 'Laki-laki',
                'Perempuan' =>'Perempuan'
                ], null , ['class' => 'form-control']) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Confirm Password:</strong>
                {!! Form::password('password_confirmation', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Role:</strong>
                {!! Form::select('roles[]', $roles, isset($user) ? $userRole : null, ['id' => 'roles', 'class' => 'form-control select2', 'multiple', 'style' => 'width: 100%;']) !!}
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

    {{--FILE PREVIEW--}}
    <div class="col-md-6">

        @if (isset($user->foto) && ($user->foto != ""))
            <div id="filepreview">
                <img id="fotopreview" src="{{ asset('foto_user/' . $user->foto) }}" width="295" class="img-thumbnail">
            </div>
        @else
            <div id="filepreview">
                <img id="fotopreview" src="{{ asset('images/website/temp_foto.png') }}" width="295" class="img-thumbnail">
            </div>
        @endif

        {{--File : Gambar--}}
        <div class="form-group">
            {{ Form::checkbox('hapusfoto', 0, null, ['id' => 'hapusfoto', 'class' => 'field']) }}
            {!! Form::label('hapusfoto', 'Hapus File Foto ') !!}
        </div>

        {{--FOTO--}}
        <div class="form-group">
            {!! Form::label('foto', 'Upload Foto User') !!}
            <div class="input-group">
                {{ Form::file('foto') }}
            </div>
        </div>

    </div>
</div>



