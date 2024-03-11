{{--MODAL HEADER--}}
<div class="modal-header bg-warning">
    <h4 class="modal-title">View Data Role</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>

{{--MODAL BODY--}}
<div class="modal-body">
    @include('roles._form_info')
</div>

{{--MODAL FOOTER--}}
<div class="modal-footer justify-content-between">
    <button type="button" class="btn btn-warning" data-dismiss="modal">Tutup</button>
</div>