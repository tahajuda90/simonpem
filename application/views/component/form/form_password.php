<div class="content shadow p-4 my-4">
    <form method="post" action="<?= base_url(uri_string())?>">
        <div class="form-group">
            <label>Password Lama</label>
            <input
                id="passInput" type="password" name="old"
                class="form-control"
                />
        </div>
        <div class="form-group">
            <label>Password Baru</label>
            <input
                id="passInput" type="password" name="new"
                class="form-control"
                />
            <input type="hidden" name="id" value="<?=$id_user?>">
        </div>
        <div class="form-group">
            <label>Konfirmasi Password Baru</label>
            <input
                id="passInput" type="password" name="new_confirm"
                class="form-control"
                />
        </div>
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary" name="submit" type="submit">
                <?=$button?>
            </button>
        </div>
    </form>
</div>