<link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/bootstrap-datepicker/css/bootstrap-datepicker.css"/>


<div class="container my-5">
    <form class="needs-validation" novalidate>
        <div class="content shadow p-4">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="pills-pekerjaan-tab" data-toggle="pill" data-target="#pills-pekerjaan" type="button" role="tab" aria-controls="pills-pekerjaan" aria-selected="true" >
                        Pekerjaan
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-kontrak-tab" data-toggle="pill" data-target="#pills-kontrak" type="button" role="tab" aria-controls="pills-kontrak" aria-selected="false">
                        Kontrak
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="pills-penyedia-tab" data-toggle="pill" data-target="#pills-penyedia" type="button" role="tab" aria-controls="pills-penyedia" aria-selected="false">
                        Penyedia
                    </button>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">            

                <div
                    class="tab-pane fade show active"
                    id="pills-pekerjaan"
                    role="tabpanel"
                    aria-labelledby="pills-pekerjaan-tab"
                    >
                    <div class="form-group">
                        <label>Satuan Kerja</label>
                        <select class="custom-select" required>
                            <option selected disabled value="">Silahkan Pilih</option>
                            <option>...</option>
                            <option>...</option>
                        </select>
                        <div class="invalid-feedback">Pilih salah satu.</div>
                    </div>
                    <div class="form-group">
                        <label>Nama Paket Pekerjaan</label>
                        <input type="text" class="form-control" required />
                        <div class="invalid-feedback">Field tidak boleh kosong.</div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>Kode RUP</label>
                            <input type="text" class="form-control" required />
                            <div class="invalid-feedback">Field tidak boleh kosong.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Kode Tender</label>
                            <input type="text" class="form-control" required />
                            <div class="invalid-feedback">Field tidak boleh kosong.</div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>Sumber Dana</label>
                            <input type="text" class="form-control" required />
                            <div class="invalid-feedback">Field tidak boleh kosong.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Tahun Anggaran</label>
                            <input type="text" class="form-control" required />
                            <div class="invalid-feedback">Field tidak boleh kosong.</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Metode Pemilihan</label>
                        <select class="custom-select" required>
                            <option selected disabled value="">Silahkan Pilih</option>
                            <option>...</option>
                            <option>...</option>
                        </select>
                        <div class="invalid-feedback">Pilih salah satu.</div>
                    </div>
                    <div class="form-group">
                        <label>Pagu Anggaran</label>
                        <input type="text" class="form-control" required />
                        <div class="invalid-feedback">Field tidak boleh kosong.</div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>Tanggal Rencana Pengadaan</label>
                            <input type="text" id="demoDate1" class="form-control" required />
                            <div class="invalid-feedback">Field tidak boleh kosong.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Tanggal Realisasi Pengadaan</label>
                            <input type="text" id="demoDate2" class="form-control" required />
                            <div class="invalid-feedback">Field tidak boleh kosong.</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Lokasi Pekerjaan</label>
                        <input type="text" class="form-control" required />
                        <div class="invalid-feedback">Field tidak boleh kosong.</div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>Latitude</label>
                            <input type="text" class="form-control" required />
                            <div class="invalid-feedback">Field tidak boleh kosong.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Longitude</label>
                            <input type="text" class="form-control" required />
                            <div class="invalid-feedback">Field tidak boleh kosong.</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Alamat Lokasi</label>
                        <textarea class="form-control" rows="5" required></textarea>
                        <div class="invalid-feedback">Field tidak boleh kosong.</div>
                    </div>
                </div>
                <div
                    class="tab-pane fade"
                    id="pills-kontrak"
                    role="tabpanel"
                    aria-labelledby="pills-kontrak-tab"
                    >
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>Nomor Kontrak</label>
                            <input type="text" class="form-control" required />
                            <div class="invalid-feedback">Field tidak boleh kosong.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Tanggal Kontrak</label>
                            <input type="date" class="form-control" required />
                            <div class="invalid-feedback">Field tidak boleh kosong.</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Kode Rekening Kegiatan</label>
                        <input type="text" class="form-control" required />
                        <div class="invalid-feedback">Field tidak boleh kosong.</div>
                    </div>
                    <div class="form-group">
                        <label>Nilai Kontrak</label>
                        <input type="text" class="form-control" required />
                        <div class="invalid-feedback">Field tidak boleh kosong.</div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>Tanggal Awal Pekerjaan</label>
                            <input type="date" class="form-control" required />
                            <div class="invalid-feedback">Field tidak boleh kosong.</div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>Lama Pekerjaan</label>
                            <input type="number" class="form-control" required />
                            <div class="invalid-feedback">Field tidak boleh kosong.</div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>Lama Pemeliharaan</label>
                            <input type="number" class="form-control" required />
                            <div class="invalid-feedback">Field tidak boleh kosong.</div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>Jabatan Wakil Penyedia</label>
                            <input type="text" class="form-control" required />
                            <div class="invalid-feedback">Field tidak boleh kosong.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Nama Wakil Penyedia</label>
                            <input type="text" class="form-control" required />
                            <div class="invalid-feedback">Field tidak boleh kosong.</div>
                        </div>
                    </div>
                </div>
                <div
                    class="tab-pane fade"
                    id="pills-penyedia"
                    role="tabpanel"
                    aria-labelledby="pills-penyedia-tab"
                    >
                    <div class="form-row">
                        <div class="col-md-6 mb-3">
                            <label>Nama Penyedia</label>
                            <input type="text" class="form-control" required />
                            <div class="invalid-feedback">Field tidak boleh kosong.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>NPWP Penyedia</label>
                            <input type="text" class="form-control" required />
                            <div class="invalid-feedback">Field tidak boleh kosong.</div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <label>Nomor Akta</label>
                            <input type="text" class="form-control" required />
                            <div class="invalid-feedback">Field tidak boleh kosong.</div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Nama Notaris</label>
                            <input type="text" class="form-control" required />
                            <div class="invalid-feedback">Field tidak boleh kosong.</div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Tanggal Akta</label>
                            <input type="date" class="form-control" required />
                            <div class="invalid-feedback">Field tidak boleh kosong.</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Alamat Penyedia</label>
                        <textarea class="form-control" rows="5" required></textarea>
                        <div class="invalid-feedback">Field tidak boleh kosong.</div>
                    </div>
                    <button class="btn btn-primary" type="submit">Simpan</button>
                </div>

            </div>
        </div>
    </form>
</div>
<script src="<?= base_url('assets/') ?>vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
    $( document ).ready(function() {
        $('#demoDate1').datepicker({
        startView: "months", 
        minViewMode: "months",
      	format: "dd-mm-yyyy",
      	autoclose: true
      });
       $('#demoDate2').datepicker({
      	format: "dd-mm-yyyy",
      	autoclose: true,
      	todayHighlight: true
      });
    });      
    </script>