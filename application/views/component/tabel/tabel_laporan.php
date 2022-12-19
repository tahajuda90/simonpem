<div class="content shadow p-4 my-4">
    <div class="d-flex justify-content-end">
        <button class="btn btn-primary mb-2">
            <a href="<?= base_url('realisasi/create/' . $kontrak->id_kontrak) ?>" class="text-decoration-none text-white"
               >Tambah <span class="pl-2"><i class="fa-solid fa-plus"></i></span
                ></a>
        </button>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-borderless">
                <tr>
                    <td class="font-weight-bold">Satuan kerja :</td>

                    <td><?= $kontrak->stk_nama ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Nama paket :</td>

                    <td><?= $kontrak->pkt_nama ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Nilai kontrak :</td>

                    <td><?= rupiah($kontrak->kontrak_nilai) ?></td>
                </tr>
            </table>
        </div>
        <div class="col">
            <table class="table table-borderless">
                <tr>
                    <td class="font-weight-bold">Rencana pengadaan :</td>
                    <td><?= fdateformat('d-m-Y', $kontrak->tanggal_awal_pengadaan) ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Realisasi pengadaan :</td>
                    <td><?= fdateformat('d-m-Y', $kontrak->jadwal_awal_pengumuman) ?></td>
                </tr>
                <tr>
                    <td class="font-weight-bold">Nama Penyedia :</td>
                    <td><?= $kontrak->rkn_nama ?></td>
                </tr>
            </table>
        </div>
    </div>
    <?php if (!empty($laporan)) {
        foreach ($laporan as $key => $lpr) {
            ?>

            <div class="accordion" id="realisasi<?= $key ?>">
                <div class="card">
                    <div class="card-header" id="heading<?= $key ?>">
                        <h2 class="mb-0">
                            <div
                                class="btn btn-block text-center font-weight-bold"
                                data-toggle="collapse"
                                data-target="#collapse<?= $key ?>"
                                aria-expanded="false"
                                aria-controls="collapse<?= $key ?>"
                                >
                                Realisasi Minggu <?= $lpr->minggu ?>
                            </div>
                        </h2>
                    </div>

                    <div
                        id="collapse<?= $key ?>"
                        class="collapse"
                        aria-labelledby="heading<?= $key ?>"
                        data-parent="#realisasi<?= $key ?>"
                        >
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td class="font-weight-bold">Tanggal Awal</td>
                                            <td>:</td>
                                            <td><?= fdateformat('d-m-Y', $lpr->tanggal_awal) ?></td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Rencana</td>
                                            <td>:</td>
                                            <td><?= $lpr->rencana ?></td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Keterangan</td>
                                            <td>:</td>
                                            <td class="text-justify"><?= $lpr->keterangan ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-6">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td class="font-weight-bold">Tanggal Akhir</td>
                                            <td>:</td>
                                            <td><?= fdateformat('d-m-Y', $lpr->tanggal_akhir) ?></td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Realisasi</td>
                                            <td>:</td>
                                            <td><?= $lpr->realisasi ?></td>
                                        </tr>
                                        <tr>
                                            <td class="font-weight-bold">Kendala</td>
                                            <td>:</td>
                                            <td class="text-justify">
        <?= $lpr->kendala ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <?php if (!empty($lpr->bukti)) {
                                    foreach ($lpr->bukti as $bkti) {
                                        ?>
                                        <div class="col-md-3 col-xs-6 thumb">
                                                 <a
                                                    
                                                class="thumbnail"
                                                href="#"
                                                data-image-id=""
                                                data-toggle="modal"
                                                data-title=""
                                                data-image="<?= base_url('assets/gambar/') . $bkti->image ?>"
                                                data-target="#image-gallery"
                                                >
                                                <img
                                                    class="img-thumbnail"
                                                    src="<?= base_url('assets/gambar/') . $bkti->image ?>"
                                                    alt="<?= $lpr->realisasi ?>"
                                                    />
                                            </a>                                            
                                        </div>
            <?php }
        }
        ?>

                            </div>  
                            <div class="d-flex justify-content-end my-4">
                                <a
                                    class="btn btn-warning"
                                    href="<?= base_url('realisasi/edit/' . $lpr->id_lpr) ?>"
                                    role="button"
                                    ><span><i class="fa fa-edit"></i>Edit</span></a
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
    <?php }
}
?>
    <div
        class="modal fade"
        id="image-gallery"
        tabindex="-1"
        role="dialog"
        aria-labelledby="myModalLabel"
        aria-hidden="true"
        >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="image-gallery-title"></h4>
                    <button type="button" class="close" data-dismiss="modal">
                        <span aria-hidden="true">×</span
                        ><span class="sr-only">Close</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img
                        id="image-gallery-image"
                        class="img-responsive col-md-12"
                        src=""
                        />
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary float-left"
                        id="show-previous-image"
                        >
                        <i class="fa fa-arrow-left"></i>
                    </button>

                    <button
                        type="button"
                        id="show-next-image"
                        class="btn btn-secondary float-right"
                        >
                        <i class="fa fa-arrow-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/') ?>script/gallery.js"></script>