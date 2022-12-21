        <div class="content shadow p-4 my-4">
          <form class="needs-validation" novalidate>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label>Nama Penyedia</label>
                <input
                  type="text"
                  name="rkn_nama"
                  class="form-control"
                  required
                  value="<?=$rekanan->rkn_nama?>"
                />
                <div class="invalid-feedback">Field tidak boleh kosong.</div>
              </div>
              <div class="col-md-6 mb-3">
                <label>NPWP Penyedia</label>
                <input
                  type="text"
                  name="rkn_npwp"
                  class="form-control"
                  required
                  value="<?=$rekanan->rkn_npwp?>"
                />
                <div class="invalid-feedback">Field tidak boleh kosong.</div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-4 mb-3">
                <label>Nomor Akta</label>
                <input
                  type="text"
                  name="lhk_no"
                  class="form-control"
                  required
                  value="<?=$rekanan->lhk_no?>"
                />
                <div class="invalid-feedback">Field tidak boleh kosong.</div>
              </div>
              <div class="col-md-4 mb-3">
                <label>Nama Notaris</label>
                <input
                  type="text"
                  name="lhk_notaris"
                  class="form-control"
                  required
                  value="<?=$rekanan->lhk_notaris?>"
                />
                <div class="invalid-feedback">Field tidak boleh kosong.</div>
              </div>
              <div class="col-md-4 mb-3">
                <label>Tanggal Akta</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span
                      class="input-group-text"
                      style="cursor: pointer"
                      onclick="$('#tanggalAkta').focus();"
                      ><i class="fa-solid fa-calendar"></i
                    ></span>
                  </div>
                  <input
                    type="text"
                    id="akta"
                    name="lhk_tanggal"
                    class="form-control"
                    required
                    value = "<?= strlen($rekanan->lhk_tanggal) == 0 ? date('d-m-Y') : fdateformat('d-m-Y', $rekanan->lhk_tanggal) ?>"
                  />
                  <div class="invalid-feedback">Field tidak boleh kosong.</div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Alamat Penyedia</label>
              <textarea
                class="form-control"
                name="rkn_alamat"
                rows="5"
                required
              ><?=$rekanan->rkn_alamat?></textarea>
              <div class="invalid-feedback">Field tidak boleh kosong.</div>
            </div>
            <div class="d-flex justify-content-end">
              <button class="btn btn-primary" name="submit" type="submit">
                <?=$button?>
              </button>
            </div>
          </form>
        </div>
<script src="<?= base_url('assets/') ?>vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url('assets/') ?>script/validateForm.js"></script>
<script src="<?= base_url('assets/') ?>script/datePicker.js"></script>