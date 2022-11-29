<div class="content shadow p-4 my-4">
          <h2 class="my-4"><?=$kontrak->pkt_nama?></h2>
          <form method="post" action="<?=$action?>" class="needs-validation" novalidate>
            <div class="form-group">
              <label>Uraian Pekerjaan</label>
              <input
                type="text"
                name="uraian_pkrj"
                class="form-control"
                required
                value ="<?= $uraian->uraian_pkrj ?>"
              />
              <div class="invalid-feedback">Field tidak boleh kosong.</div>
            </div>
            <div class="form-row">
              <div class="col-md-4 mb-3">
                <label>Satuan</label>
                <input
                  type="text"
                  name="satuan"
                  class="form-control"
                  required
                  value ="<?= $uraian->satuan ?>"
                />
                <div class="invalid-feedback">Field tidak boleh kosong.</div>
              </div>
              <div class="col-md-4 mb-3">
                <label>Volume</label>
                <input
                  type="number"
                  name="volume"
                  class="form-control"
                  required
                  value ="<?= $uraian->volume ?>"
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