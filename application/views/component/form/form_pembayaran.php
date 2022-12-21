    <div class="content shadow p-4 my-4">
      <form method="post" action="<?=$action?>"  enctype="multipart/form-data" class="needs-validation" novalidate>
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label>Nomor Berita Acara</label>
            <input type="text" name="no_bap" value="<?=$pembayaran->no_bap?>" class="form-control" required />
            <div class="invalid-feedback">Field tidak boleh kosong.</div>
          </div>
          <div class="col-md-6 mb-3">
            <label> acara tanggal berita acara</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span
                  class="input-group-text"
                  style="cursor: pointer"
                  onclick="$('#bap').focus();"
                  ><i class="fa-solid fa-calendar"></i
                ></span>
              </div>
              <input
                type="text"
                id="bap"
                name="tanggal"
                class="form-control"
                value="<?= strlen($pembayaran->tanggal) == 0 ? date('d-m-Y') : fdateformat('d-m-Y', $pembayaran->tanggal)?>"
                required
              />
              <div class="invalid-feedback">Field tidak boleh kosong.</div>
            </div>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-6 mb-3">
            <label>Prosentase Pekerjaan</label>
            <input
              type="text"
              name="prosentase"
              class="form-control"
              value="<?=$pembayaran->prosentase?>"
              required
            />
            <div class="invalid-feedback">Field tidak boleh kosong.</div>
          </div>
          <div class="col-md-6 mb-3">
            <label>Jenis Pembayaran</label>
            <select class="custom-select" name="jns_pemb" required>
              <option selected disabled value="">Silahkan Pilih</option>
              <option <?=$pembayaran->btk_pembayaran=0?'selected':''?> value="0">Uang Muka</option>
              <?php if($pembayaran->btk_pembayaran !=null){
                  echo'<option '.$pembayaran->btk_pembayaran!=0?'selected':''.' value="'.$pembayaran->btk_pembayaran.'">'. pembayaran()[$pembayaran->btk_pembayaran].'</option>';
              }else{
                  foreach(pembayaran() as $key=>$pbr){
                      echo'<option '.$pembayaran->btk_pembayaran!=$key?'selected':''.' value="'.$key.'">'.$pbr.'</option>';
                  }
              }?>
            </select>
            <div class="invalid-feedback">Field tidak boleh kosong.</div>
          </div>
        </div>
        <div class="form-group">
          <label>Nilai Pembayaran</label>
          <input type="text" name="nilai_bayar" value="<?=$pembayaran->nilai_bayar?>" class="form-control" required />
          <div class="invalid-feedback">Field tidak boleh kosong.</div>
        </div>
        <div id="dynamicForm">
          <div class="form-row align-items-center">
            <div class="col-md-5 mb-3">
              <label>Jenis Potongan</label>
              <input type="text" name="jns_pot[]" class="form-control" />
              <div class="invalid-feedback">Field tidak boleh kosong.</div>
            </div>
            <div class="col-md-6 mb-3">
              <label>Nilai Potongan</label>
              <input type="text" name="nilai_pot[]" class="form-control" />
              <div class="invalid-feedback">Field tidak boleh kosong.</div>
            </div>
            <div class="col-auto mb-3 align-self-end ml-auto">
              <button id="rowAdder" class="btn btn-primary">
                <i class="fa-solid fa-plus"></i>
              </button>
            </div>
          </div>
        </div>

          <div id="newForm">
              <?php
              if(isset($potongan)){
                  foreach($potongan as $ptg){
                      echo '<div id="dynamicForm">
          <div class="form-row align-items-center">
            <div class="col-md-5 mb-3">
              <label>Jenis Potongan</label>
              <input
                type="text"
                name="jns_pot[]"
                class="form-control"
                value="'.$ptg->jns_pot.'"
              />
              
            </div>
            <div class="col-md-6 mb-3">
              <label>Nilai Potongan</label>
              <input
                type="text"
                name="nilai_pot[]"
                class="form-control"
                value="'.$ptg->nilai_pot.'"
              />
              
            </div>
            <div class="col-auto mb-3 align-self-end ml-auto">
              <button id="deleteRow" class="btn btn-danger">
                <i class="fa-solid fa-minus"></i>
              </button>
            </div>
          </div>
        </div>';
                  }
              }
              ?>
          </div>

        <div class="form-group">
          <label>Keterangan</label>
          <textarea
            class="form-control"
            name="keterangan"
            required
            rows="5"
          ><?=$pembayaran->keterangan?></textarea>
          <div class="invalid-feedback">Field tidak boleh kosong.</div>
        </div>
        <div class="form-group">
          <label>Kendala</label>
          <textarea
            class="form-control"
            name="kendala"
            rows="5"
          ><?=$pembayaran->kendala?></textarea>
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
 <script type="text/javascript">
      $("#rowAdder").click(function () {
        console.log("tambah");
        newRowAdd = `
         <div id="dynamicForm">
          <div class="form-row align-items-center">
            <div class="col-md-5 mb-3">
              <label>Jenis Potongan</label>
              <input
                type="text"
                name="jns_pot[]"
                class="form-control"
              
              />
              
            </div>
            <div class="col-md-6 mb-3">
              <label>Nilai Potongan</label>
              <input
                type="text"
                name="nilai_pot[]"
                class="form-control"
               
              />
              
            </div>
            <div class="col-auto mb-3 align-self-end ml-auto">
              <button id="deleteRow" class="btn btn-danger">
                <i class="fa-solid fa-minus"></i>
              </button>
            </div>
          </div>
        </div>`;
        $("#newForm").append(newRowAdd);
        $("body").on("click", "#deleteRow", function () {
          $(this).parents("#dynamicForm").remove();
        });
      });
    </script>