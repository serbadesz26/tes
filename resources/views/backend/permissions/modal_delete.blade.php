{{--MODAL HEADER--}}
<div class="modal-header bg-danger">
    <h4 class="modal-title">Delete Data Permission</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>

{!! Form::model($permission,
     [
         'id'     => 'frmDelete',
         'method' => 'DELETE',
         'route'  => ['permissions.destroy', $permission->id]
     ])
 !!}

{{--MODAL BODY--}}
<div class="modal-body">
    @include('permissions._form_info')
</div>

{{--MODAL FOOTER--}}
<div class="modal-footer justify-content-between">
    {!! Form::button('Batal', ['class' => 'btn btn-default', 'id' => 'closeButtonDelete', 'data-dismiss' => 'modal']) !!}
    {!! Form::submit('Hapus Data', ['class' => 'btn btn-danger']) !!}
</div>

{!! Form::close() !!}

<script>
    $(document).ready(function() {

        function refreshForm(){
            document.getElementById("frmDelete").reset();
            $( '#deleteModal' ).modal('hide').data( 'bs.modal', null );
            $( '#roles_table' ).DataTable().ajax.reload();
        }

        $('#frmDelete').submit(function(e) {

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
                error: function (jqXhr) {
                    if( jqXhr.status === 401 ) {
                        errorsHtml = 'Not authorize';
                    }
                    else if( jqXhr.status === 404 ) {
                        errorsHtml = 'Data Role sedang digunakan';

                    }
                    refreshForm();
                    toastr.error(errorsHtml);
                }
            });
            return false;
        });

        $('#closeButtonDelete').click(function() {

            document.getElementById("frmDelete").reset();
            $( '#deleteModal' ).modal( 'hide' ).data( 'bs.modal', null );
        });

    });
</script>