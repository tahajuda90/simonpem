<div class="content shadow p-4 my-4">
    <form method="post" action="<?= $action ?>" class="needs-validation" novalidate>
        <div class="form-group">
            <label>Nama Satuan Kerja</label>
            <input
                type="text"
                name="stk_nama"
                class="form-control"
                required
                value="<?= $satker->stk_nama ?>"
                />
            <div class="invalid-feedback">Field tidak boleh kosong.</div>
        </div>
        <div class="form-group">
            <label>Telepon</label>
            <input
                type="text"
                name="stk_telepon"
                class="form-control"
                required
                value="<?= $satker->stk_telepon ?>"
                />
            <div class="invalid-feedback">Field tidak boleh kosong.</div>
        </div>
        <div class="form-group">
            <label>Nama Kepala Satuan Kerja</label>
            <input
                type="text"
                name="nama_kpl"
                class="form-control"
                required
                value="<?= $satker->nama_kpl ?>"
                />
            <div class="invalid-feedback">Field tidak boleh kosong.</div>
        </div>
        <div class="form-group">
            <label>NIP</label>
            <input
                type="text"
                name="nip_kpl"
                class="form-control"
                required
                value="<?= $satker->nip_kpl ?>"
                />
            <div class="invalid-feedback">Field tidak boleh kosong.</div>
        </div>
        <div class="form-group">
            <label>Alamat Lokasi</label>
            <textarea
                class="form-control"
                name="stk_alamat"
                rows="5"
                required
                ><?= $satker->stk_alamat ?></textarea>
            <div class="invalid-feedback">Field tidak boleh kosong.</div>
        </div>
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary" name="submit" type="submit">
                <?= $button ?>
            </button>
        </div>
    </form>
</div>