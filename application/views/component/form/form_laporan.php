<div class="content shadow p-4 my-4">
    <form method="post" name="realisasi" id="realisasi" action="<?=$action?>" class="needs-validation" novalidate>
        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link active"
                    id="pills-realisasi-tab"
                    data-toggle="pill"
                    data-target="#pills-realisasi"
                    type="button"
                    role="tab"
                    aria-controls="pills-realisasi"
                    aria-selected="true"
                    >
                    Laporan Realisasi
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link"
                    id="pills-uraian-tab"
                    data-toggle="pill"
                    data-target="#pills-uraian"
                    type="button"
                    role="tab"
                    aria-controls="pills-uraian"
                    aria-selected="false"
                    >
                    Uraian Pekerjaan
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button
                    class="nav-link"
                    id="pills-upload-tab"
                    data-toggle="pill"
                    data-target="#pills-upload"
                    type="button"
                    role="tab"
                    aria-controls="pills-upload"
                    aria-selected="false"
                    >
                    Upload Bukti
                </button>
            </li>
        </ul>
        <div class="tab-content" id="pills-tabContent">
            <!-- tab form Laporan Realisasi -->
            <div
                class="tab-pane fade show active"
                id="pills-realisasi"
                role="tabpanel"
                aria-labelledby="pills-realisasi-tab"
                >
                <div class="form-row">
                    <div class="col mb-3">
                        <label>Rencana</label>
                        <input
                            type="text"
                            name="rencana"
                            class="form-control"
                            required
                            value="<?=$laporan->rencana?>"
                            />
                        <div class="invalid-feedback">
                            Field tidak boleh kosong.
                        </div>
                    </div>
                    <div class="col mb-3">
                        <label>Realisasi</label>
                        <input
                            type="text"
                            name="realisasi"
                            class="form-control"
                            required
                            value="<?=$laporan->realisasi?>"
                            />
                        <div class="invalid-feedback">
                            Field tidak boleh kosong.
                        </div>
                    </div>
                    <div class="col mb-3">
                        <label>Minggu</label>
                        <input
                            type="text"
                            name="minggu"
                            class="form-control"
                            required
                            value="<?=$laporan->minggu?>"
                            />
                        <div class="invalid-feedback">
                            Field tidak boleh kosong.
                        </div>
                    </div>
                    <div class="col mb-3">
                        <label>Bulan</label>
                        <input
                            type="text"
                            name="bulan"
                            class="form-control"
                            required
                            value="<?=$laporan->bulan?>"
                            />
                        <div class="invalid-feedback">
                            Field tidak boleh kosong.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label>Tanggal Awal</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span
                                    class="input-group-text"
                                    style="cursor: pointer"
                                    onclick="$('#pekerjaanAwal').focus();"
                                    ><i class="fa-solid fa-calendar"></i
                                    ></span>
                            </div>
                            <input
                                type="text"
                                id="pekerjaanAwal"
                                name="tanggal_awal"
                                class="form-control"
                                required
                                value="<?= strlen($laporan->tanggal_awal) == 0 ? date('d-m-Y') : fdateformat('d-m-Y', $laporan->tanggal_awal)?>"
                                />
                            <div class="invalid-feedback">
                                Field tidak boleh kosong.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Tanggal Ahkir</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span
                                    class="input-group-text"
                                    style="cursor: pointer"
                                    onclick="$('#pekerjaanAkhir').focus();"
                                    ><i class="fa-solid fa-calendar"></i
                                    ></span>
                            </div>
                            <input
                                type="text"
                                id="pekerjaanAkhir"
                                name="tanggal_akhir"
                                class="form-control"
                                required
                                value="<?= strlen($laporan->tanggal_akhir) == 0 ? date('d-m-Y') : fdateformat('d-m-Y', $laporan->tanggal_akhir)?>"
                                />
                            <div class="invalid-feedback">
                                Field tidak boleh kosong.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Keterangan</label>
                    <textarea
                        class="form-control"
                        name="keterangan"
                        rows="5"
                        required
                        ><?=$laporan->keterangan?></textarea>
                    <div class="invalid-feedback">Field tidak boleh kosong.</div>
                </div>
                <div class="form-group">
                    <label>Kendala</label>
                    <textarea
                        class="form-control"
                        name="kendala"
                        rows="5"
                        ><?=$laporan->kendala?></textarea>
                    <div class="invalid-feedback">Field tidak boleh kosong.</div>
                </div>
            </div>

            <!-- tab form uraian pekerjaan -->
            <div
                class="tab-pane fade"
                id="pills-uraian"
                role="tabpanel"
                aria-labelledby="pills-uraian-tab"
                >
                <table class="table table-bordered">
                    <thead class="thead-light">
                        <tr>
                            <th class="col-5">Uraian Pekerjaan</th>
                            <th class="col-5">Satuan</th>
                            <th class="col-2">Bobot Pekerjaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(!empty($pekerjaan) && isset($pekerjaan)){
                            foreach($pekerjaan as $pkj){ ?>
                        <tr>
                            <td><?=$pkj->uraian_pkrj?></td>
                            <td><?=$pkj->satuan?></td>
                            <td>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="<?=$pkj->id_pkrj?>"
                                    />
                            </td>
                        </tr>
                        <?php    }} else if(!empty($lapPeker) && isset($lapPeker)){
                            foreach($lapPeker as $pkj){ ?>
                                <tr>
                            <td><?=$pkj->uraian_pkrj?></td>
                            <td><?=$pkj->satuan?></td>
                            <td>
                                <input
                                    type="text"
                                    class="form-control"
                                    name="<?=$pkj->id_lpkr?>"
                                    value="<?=$pkj->bobot?>"
                                    />
                            </td>
                        </tr>
                        <?php    }
                        }?>
                        
                    </tbody>
                </table>
            </div>
            <input type="hidden" id="id_lpr" name="id_lpr">
            <!-- tab form upload -->
            <div
                class="tab-pane fade"
                id="pills-upload"
                role="tabpanel"
                aria-labelledby="pills-upload-tab"
                >
                <div
                    class="dropzone dz-clickable mb-4"
                    id="uploadBukti"
                    >
                    <div class="dz-message d-flex flex-column">
                        <i class="fa-solid fa-cloud-arrow-up"></i>
                        Drag &amp; Drop here or click
                    </div>
                </div>
                <div class="row">
                    <?php if(!empty($bukti)){
                        foreach($bukti as $bkt){ ?>
                            <div class="col-md-3">
                        <div class="wrapper">
                            <a
                                href="<?= base_url('C_Laporan/delete_bukti/'.$bkt->id_bkti)?>"
                                data-toggle="tooltip"
                                data-placement="top"
                                title="Delete"
                                ><i class="fa-regular fa-rectangle-xmark fa-2x"></i
                                ></a>
                            <img
                                class="img-thumbnail"
                                src="<?= base_url('assets/gambar/').$bkt->image?>"
                                alt="Another alt text"
                                />
                        </div>
                    </div>
                    <?php    }
                    }?>
                    
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary" name="submit" type="submit">
                        <?=$button?>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
<script src="<?= base_url('assets/') ?>vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/dropzone/dist/min/dropzone.min.js"></script>
<script src="<?= base_url('assets/') ?>script/validateForm.js"></script>
<script src="<?= base_url('assets/') ?>script/datePicker.js"></script>
<script type="text/javascript">
Dropzone.autoDiscover = false;
$(document).ready(function () {
    var myDropzone =  new Dropzone(("div#uploadBukti"),{
        url:'<?= base_url('C_Laporan/upload')?>',
        paramName: 'image',
        autoProcessQueue: false,
        uploadMultiple: false,
        parallelUploads: 10,
        acceptedFiles: 'image/*',
        method:"post",
        init: function(){
            var myDropzone = this;
            $("form[name='realisasi']").submit(function(event) {
                event.preventDefault();
                URL = $("#realisasi").attr('action');
                formData = $('#realisasi').serialize();
                $.ajax({
                    type:'POST',
                    url:URL,
                    data:formData,
                    success:function(result){
                        hasil = JSON.parse(result);
                        if(hasil.status === 'success'){
                            $("#id_lpr").val(hasil.id_lpr);
                            if(myDropzone.files.length > 0 ){
                                myDropzone.processQueue();
                            }else{
                                window.location.href = "<?= base_url('C_Laporan/laporan_edit/')?>"+hasil.id_lpr;
                            }                            
                        }else{
                            console.log("error");
                        }
                    }
                });
            });
            this.on('sending', function(file, xhr, formData){
                let id_lpr = document.getElementById('id_lpr').value;
                formData.append('id_lpr',id_lpr);
            });
            this.on("success", function (file, response) {
                hasil = JSON.parse(response);
                window.location.href = "<?= base_url('C_Laporan/laporan/')?>"+hasil.id_kontrak;
            });
            this.on("error", function (file, response) {
                hasil = JSON.parse(response);
                window.location.href = "<?= base_url('C_Laporan/laporan/')?>"+hasil.id_kontrak;
            });
            this.on("queuecomplete", function () {});
            this.on("sendingmultiple", function() {});
            this.on("successmultiple", function(files, response) {
                hasil = JSON.parse(response);
                window.location.href = "<?= base_url('C_Laporan/laporan/')?>"+hasil.id_kontrak;
            });
            this.on("errormultiple", function(files, response) {
                hasil = JSON.parse(response);
                window.location.href = "<?= base_url('C_Laporan/laporan/')?>"+hasil.id_kontrak;
            });
        }
    });
});
</script>