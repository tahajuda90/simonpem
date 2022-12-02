<link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/dropzone/dist/min/dropzone.min.css" />
<div class="content shadow p-4 my-4">
    <form class="needs-validation" action="<?= $action ?>" name="realisasi" id="realisasi" enctype="multipart/form-data" method="POST" novalidate>
        <div class="form-row">
            <div class="col mb-3">
                <label>Rencana</label>
                <input
                    type="text"
                    name="rencana"
                    class="form-control"
                    required
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
                    />
                <div class="invalid-feedback">
                    Field tidak boleh kosong.
                </div>
            </div>
        </div>
        <div
            action="/file-upload"
            class="dropzone dz-clickable mb-4"
            id="uploadBukti"
            >
            <div class="dz-message d-flex flex-column">
                <i class="fa-solid fa-cloud-arrow-up"></i>
                Drag &amp; Drop here or click
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <button class="btn btn-primary" id="submit" name="submit" type="submit">
                kirim
            </button>
        </div>
    </form>
</div>
<script src="<?= base_url('assets/') ?>vendor/dropzone/dist/min/dropzone.min.js"></script>
<script type="text/javascript">
Dropzone.autoDiscover = false;
$(document).ready(function () {
    var myDropzone =  new Dropzone(("div#uploadBukti"),{
        url:'<?= base_url('Coba_Upload/upload')?>',
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
                            myDropzone.processQueue();
                        }else{
                            console.log("error");
                        }
                    }
                });
            });
            this.on('sending', function(file, xhr, formData){
                
            });
            this.on("success", function (file, response) {});
            this.on("queuecomplete", function () {});
            this.on("sendingmultiple", function() {});
            this.on("successmultiple", function(files, response) {});
            this.on("errormultiple", function(files, response) {});
        }
    });
});
</script>