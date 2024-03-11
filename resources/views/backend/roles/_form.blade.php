<div class="row">
    <div class="col-md-6">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Role</strong>
                {!! Form::text('name', null, array('placeholder' => 'Nama role','class' => 'form-control')) !!}
            </div>
        </div>
    </div>

    {{--FILE PREVIEW--}}
    <div class="col-md-6">

        {!! Helper::rolePermissionsEdit($permission, $rolePermissions)  !!}

    </div>
</div>



