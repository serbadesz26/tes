{{--MODAL HEADER--}}
<div class="modal-header bg-primary">
    <h4 class="modal-title">Edit Data User</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>

{!! Form::model($user,
     [
         'id'     => 'frmEdit',
         'method' => 'PATCH',
         'route'  => ['users.update', $user->id],
         'files'  => 'true'
     ])
 !!}

{{--MODAL BODY--}}
<div class="modal-body">
    @include('backend.users._form', ['user' => $user])
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
            $( '#users_table' ).DataTable().ajax.reload();
        }

        $('#roles').select2({
            tags: true,
            tokenSeparators: [',', ' ']
        });

        $('#frmEdit').submit(function(e) {

            e.preventDefault();

            // -----------------------------------------------
            // TAMBAHAN UNTUK PROSES UPLOAD FILE SECARA AJAX
            // -----------------------------------------------
            let $form    = $(e.target),
                formData = new FormData(),
                params   = $form.serializeArray();

            if($("#foto").val() != '') {
                formData.append('foto', $('#foto')[0].files[0]);
            }

            $.each(params, function(i, val) {
                formData.append(val.name, val.value);
            });
            // ------------------------------------------------

            $.ajax({
                data     : formData,
                type     : $(this).attr('method'),
                url      : $(this).attr('action'),
                contentType : false,
                processData : false,
                cache       : false,

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
