<div class="modal-header">
    <h5 class="modal-title"><?=$title?></h5>
    <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
</div>
<form action="<?=$action?>" id="regis_form" method="post" >
<div class="modal-body align-content-center">
    <h6>Masukkan Nomor Registrasi Kontrak</h6>
    <input
        type="text"
        name="no_registrasi"
        class="form-control"
        value="<?=$value?>"
        />
</div>
<div class="modal-footer">
    <button class="btn btn-primary" name="submit" value="submit" type="button">Kirim</button>
    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
</div>
</form>
