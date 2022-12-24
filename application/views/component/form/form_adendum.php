<div class="content shadow p-4 my-4">
    <form method="post" action="<?=$action?>" enctype="multipart/form-data" class="needs-validation" novalidate>                      
        <p class="text-muted">*Ubah komponen yang perlu diubah</p>    
        <div class="form-row">
              <div class="col-md-6 mb-3">
                <label>Nomor Adendum</label>
                <input
                  type="text"
                  name="nmr_adendum"
                  class="form-control"
                  required
                  value="<?=$adendum->nmr_adendum?>"
                />
                <div class="invalid-feedback">Field tidak boleh kosong.</div>
              </div>
              <div class="col-md-6 mb-3">
                <label>Tanggal Adendum</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span
                      class="input-group-text"
                      style="cursor: pointer"
                      onclick="$('#adendum').focus();"
                      ><i class="fa-solid fa-calendar"></i
                    ></span>
                  </div>
                  <input
                    type="text"
                    id="adendum"
                    name="tanggal_adendum"
                    class="form-control"
                    required
                    value="<?= strlen($adendum->tanggal_adendum) == 0 ? date('d-m-Y') : fdateformat('d-m-Y', $adendum->tanggal_adendum)?>"
                  />
                  <div class="invalid-feedback">Field tidak boleh kosong.</div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <label>Perubahan Nilai</label>
              <input
                type="text"
                name="kontrak_nilai"
                class="form-control"
                required
                value="<?=$adendum->kontrak_nilai?>"
              />
              <div class="invalid-feedback">Field tidak boleh kosong.</div>
            </div>
            <div class="form-row">
              <div class="col-md-4 mb-3">
                <label>Lama Pekerjaan</label>
                <input
                  type="number"
                  name="lama_durasi_penyerahan1"
                  class="form-control"
                  required
                  value="<?=$adendum->lama_durasi_penyerahan1?>"
                />
                <div class="invalid-feedback">Field tidak boleh kosong.</div>
              </div>
              <div class="col-md-4 mb-3">
                <label>Lama Pemeliharaan</label>
                <input
                  type="number"
                  name="lama_durasi_pemeliharaan"
                  class="form-control"
                  required
                  value="<?=$adendum->lama_durasi_pemeliharaan?>"
                />
                <div class="invalid-feedback">Field tidak boleh kosong.</div>
              </div>
              <div class="col-md-4 mb-3">
                <label>Bentuk Pembayaran</label>
                <select class="custom-select" name="btk_pembayaran" required>
                  <option selected disabled value="">Silahkan Pilih</option>
                  <?php
                        foreach(pembayaran() as $key=>$val){ ?>
                        <option <?= $adendum->btk_pembayaran == $key ? 'selected' : '' ?> value="<?=$key?>"><?=$val?></option>
                        <?php }
                        ?>
                </select>
                <div class="invalid-feedback">Pilih salah satu.</div>
              </div>
            </div>
            <div class="form-group">
              <label>Alasan</label>
              <textarea
                class="form-control"
                name="kendala"
                rows="5"
                required
              ><?=$adendum->kendala?></textarea>
              <div class="invalid-feedback">Field tidak boleh kosong.</div>
            </div>
            <div class="form-row">
              <div class="col-md-4 mb-3">
                <label>Upload Dokumen</label>
                <input
                  type="file"
                  class="form-control-file"
                  name="dokumen"
                  <?php if($button !== 'Ubah'){echo'required';}?>
                />
                <p class="text-muted">ekstensi file upload yang diperbolehkan .pdf</p>  
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