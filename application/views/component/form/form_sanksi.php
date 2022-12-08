        <div class="content shadow p-4 my-4">
            <form method="post" action="<?=$action?>" enctype="multipart/form-data" class="needs-validation" novalidate>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label>Nomor Sanksi / Denda</label>
                <input
                  type="text"
                  name="nmr_denda"
                  class="form-control"
                  required
                  value="<?=$sanksi->nmr_denda?>"
                />
                <div class="invalid-feedback">Field tidak boleh kosong.</div>
              </div>
              <div class="col-md-6 mb-3">
                <label>Tanggal Pemberian Sanksi</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span
                      class="input-group-text"
                      style="cursor: pointer"
                      onclick="$('#sanksi').focus();"
                      ><i class="fa-solid fa-calendar"></i
                    ></span>
                  </div>
                  <input
                    type="text"
                    id="sanksi"
                    name="tanggal"
                    class="form-control"
                    required
                    value="<?= strlen($sanksi->tanggal) == 0 ? date('d-m-Y') : fdateformat('d-m-Y', $sanksi->tanggal)?>"
                  />
                  <div class="invalid-feedback">Field tidak boleh kosong.</div>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label>Jenis Sanksi / Denda</label>
                <select class="custom-select" name="jns_sanksi" required>
                  <option selected disabled value="">Silahkan Pilih</option>
                  <?php
                        foreach(sanksi() as $key=>$val){ ?>
                        <option <?= $sanksi->jns_sanksi == $key ? 'selected' : '' ?> value="<?=$key?>"><?=$val?></option>
                        <?php }
                        ?>
                </select>
                <div class="invalid-feedback">Pilih salah satu.</div>
              </div>
              <div class="col-md-6 mb-3">
                <label>Tindakan</label>
                <input
                  type="text"
                  name="sanksi"
                  class="form-control"
                  required
                  value="<?=$sanksi->sanksi?>"
                />
                <div class="invalid-feedback">Field tidak boleh kosong.</div>
              </div>
            </div>
            <div class="form-group">
              <label>Nilai Denda</label>
              <input
                type="text"
                name="denda_nilai"
                class="form-control"
                required
                value="<?=$sanksi->denda_nilai?>"
              />
              <div class="invalid-feedback">Field tidak boleh kosong.</div>
            </div>
            <div class="form-group">
              <label>Alasan</label>
              <textarea
                class="form-control"
                name="kendala"
                rows="5"
                required
              ><?=$sanksi->kendala?></textarea>
              <div class="invalid-feedback">Field tidak boleh kosong.</div>
            </div>
            <div class="form-row">
              <div class="col-md-4 mb-3">
                <label>Upload Dokumen</label>
                <input
                  type="file"
                  class="form-control-file"
                  name="dokumen"
                  <?php if($button !== 'Update'){echo'required';}?>
                />
                <div class="invalid-feedback">Field tidak boleh kosong.</div>
              </div>
              <div class="col-auto mb-3 align-self-end ml-auto">
                <button class="btn btn-primary" name="submit" type="submit">
                  <?=$button?>
                </button>
              </div>
            </div>
          </form>
        </div>
<script src="<?= base_url('assets/') ?>vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url('assets/') ?>script/validateForm.js"></script>
<script src="<?= base_url('assets/') ?>script/datePicker.js"></script>