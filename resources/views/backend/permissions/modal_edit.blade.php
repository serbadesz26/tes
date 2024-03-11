{{--MODAL HEADER--}}
<div class="modal-header bg-primary">
    <h4 class="modal-title">Edit Data User</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>

{!! Form::model($role,
     [
         'id'     => 'frmEdit',
         'method' => 'PATCH',
         'route'  => ['roles.update', $role->id],
     ])
 !!}

{{--MODAL BODY--}}
<div class="modal-body">
    @include('roles._form', ['role' => $role])
</div>

{{--MODAL FOOTER--}}
<div class="modal-footer justify-content-between">
    {!! Form::button('Batal', ['class' => 'btn btn-default', 'id' => 'closeButtonEdit', 'data-dismiss' => 'modal']) !!}
    {!! Form::submit('Update Data', ['class' => 'btn btn-primary']) !!}
</div>

{!! Form::close() !!}

<script>
    $(document).ready(function() {

        function refreshForm(){
            document.getElementById("frmEdit").reset();
            $( '#editModal' ).modal('hide').data( 'bs.modal', null );
            $( '#roles_table' ).DataTable().ajax.reload();
        }


        $('#frmEdit').submit(function(e) {

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

        $('#closeButtonEdit').click(function() {

            document.getElementById("frmEdit").reset();
            $( '#editeModal' ).modal( 'hide' ).data( 'bs.modal', null );
        });

    });
</script>