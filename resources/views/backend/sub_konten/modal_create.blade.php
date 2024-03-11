{{--MODAL HEADER--}}
<div class="modal-header bg-success">
    <h4 class="modal-title">Tambah Sub Konten</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>

{!! Form::model(App\SubKonten::class,
    [
        'id'     => 'frmCreate',
        'method' => 'POST',
        'route'  => ['sub_konten.store'],
        'files'  => 'true',
    ])
!!}

{{--MODAL BODY--}}
<div class="modal-body">
    @include('backend.sub_konten._form')
</div>

{{--MODAL FOOTER--}}
<div class="modal-footer justify-content-between">
    {!! Form::button('Batal', ['class' => 'btn btn-default', 'id' => 'closeButtonCreate', 'data-dismiss' => 'modal']) !!}
    {!! Form::submit('Simpan Data', ['class' => 'btn btn-success']) !!}
</div>

{!! Form::close() !!}

<script>
    $(document).ready(function() {

        function CKupdate(){
            for ( instance in CKEDITOR.instances ) CKEDITOR.instances[instance].updateElement();
        }

        function refreshForm(){
            document.getElementById("frmCreate").reset();
            $( '#createModal' ).modal('hide').data( 'bs.modal', null );
            $( '#sub_konten_table' ).DataTable().ajax.reload();
        }

        CKEDITOR.replace('konten', {
            contentsCss: ['/css/core.css'],
            allowedContent: true,
        });

        $('#frmCreate').submit(function(e) {

            e.preventDefault();

            CKupdate();


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
