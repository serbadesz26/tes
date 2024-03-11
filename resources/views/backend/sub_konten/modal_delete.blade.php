{{--MODAL HEADER--}}
<div class="modal-header bg-danger">
    <h4 class="modal-title">Delete Sub Konten</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>

{!! Form::model($sub_konten,
     [
         'id'     => 'frmDelete',
         'method' => 'DELETE',
         'route'  => ['sub_konten.update', $sub_konten->id]
     ])
 !!}

{{--MODAL BODY--}}
<div class="modal-body">
    @include('backend.sub_konten._form_info')
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
            $( '#sub_konten_table' ).DataTable().ajax.reload();
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

        $('#closeButtonDelete').click(function() {

            document.getElementById("frmDelete").reset();
            $( '#deleteModal' ).modal( 'hide' ).data( 'bs.modal', null );
        });

    });
</script>
