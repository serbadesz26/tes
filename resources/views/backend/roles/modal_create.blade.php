{{--MODAL HEADER--}}
<div class="modal-header bg-success">
    <h4 class="modal-title">Tambah Data User</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>

{!! Form::model(Spatie\Permission\Models\Role::class,
    [
        'id'     => 'frmCreate',
        'method' => 'POST',
        'route'  => ['roles.store'],
        'files'  => 'true',
    ])
!!}

{{--MODAL BODY--}}
<div class="modal-body">
    @include('backend.roles._form', $rolePermissions = [])
</div>

{{--MODAL FOOTER--}}
<div class="modal-footer justify-content-between">
    {!! Form::button('Batal', ['class' => 'btn btn-default', 'id' => 'closeButtonCreate', 'data-dismiss' => 'modal']) !!}
    {!! Form::submit('Simpan Data', ['class' => 'btn btn-success']) !!}
</div>

{!! Form::close() !!}

<script>
    $(document).ready(function() {

        function refreshForm(){
            document.getElementById("frmCreate").reset();
            $( '#createModal' ).modal('hide').data( 'bs.modal', null );
            $( '#roles_table' ).DataTable().ajax.reload();
        }

        $('#frmCreate').submit(function(e) {

            e.preventDefault();

            $.ajax({
                data     : $(this).serialize(),
                type     : $(this).attr('method'),
                url      : $(this).attr('action'),
                dataType : 'json',

                success: function(result) {
                    toastr.success(result.message);
                    refreshForm();
                },
                error: function (jqXhr)
                {
                    if( jqXhr.status === 401 )
                        console.log('Not authorize');

                    if( jqXhr.status === 422 ) {
                        console.log('Validation error');

                        let data = jqXhr.responseJSON;
                        errorsHtml = '<ul>';

                        $.each( data.errors , function( key, value ) {
                            errorsHtml += '<li>' + value[0] + '</li>';
                        });
                        errorsHtml += '</ul>';
                        toastr.error(errorsHtml);
                    }
                    else {
                        refreshForm();
                    }
                }
            });
            return false;
        });

        $('#closeButtonCreate').click(function() {

            document.getElementById("frmCreate").reset();
            $( '#createModal' ).modal( 'hide' ).data( 'bs.modal', null );
        });

    });
</script>
