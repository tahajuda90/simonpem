        <div class="content shadow p-4 my-4">
          <form class="needs-validation" novalidate>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label>Nomor Sanksi / Denda</label>
                <input
                  type="text"
                  name="nmr_denda"
                  class="form-control"
                  required
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
                    placeholder="DD/MM/YYYY"
                    required
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
                  <option>...</option>
                  <option>...</option>
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
              ></textarea>
              <div class="invalid-feedback">Field tidak boleh kosong.</div>
            </div>
            <div class="form-row">
              <div class="col-md-4 mb-3">
                <label>Upload Dokumen</label>
                <input
                  type="file"
                  class="form-control-file"
                  name="dokumen"
                  required
                />
                <div class="invalid-feedback">Field tidak boleh kosong.</div>
              </div>
              <div class="col-auto mb-3 align-self-end ml-auto">
                <button class="btn btn-primary" name="submit" type="submit">
                  kirim
                </button>
              </div>
            </div>
          </form>
        </div>