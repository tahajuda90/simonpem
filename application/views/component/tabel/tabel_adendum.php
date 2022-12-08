<div class="container my-4">
    <div class="content shadow p-4">
        <div class="d-flex justify-content-end">    
            <button class="btn btn-primary mb-2">
                <a href="<?= base_url('C_Adendum/adendum_create/' . $kontrak->id_kontrak) ?>" class="text-decoration-none text-white"
                   >Tambah <span class="pl-2"><i class="fa-solid fa-plus"></i></span
                    ></a>
            </button>
        </div>
        <table id="adendum" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nomor Adendum</th>
                    <th>Tanggal</th>
                    <th>Perubahan</th>
                    <th>Alasan</th>
                    <th>Dokumen</th>
                    <th style="width: 10%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($adendum)) {
                    foreach ($adendum as $add) {
                        ?>
                        <tr>
                            <td><?= $add->nmr_adendum ?></td>
                            <td><?= fdateformat('d-m-Y', $add->tanggal_adendum) ?></td>
                            <td>Nilai Kontrak : <?= rupiah($add->nilai_lama) ?> Menjadi <?= rupiah($add->kontrak_nilai) ?> </td>
                            <td><?= $add->kendala ?></td>
                            <td><a class="badge badge-pill badge-primary" href="<?= base_url('assets/dokumen/'.$add->dokumen) ?>">Dokumen</a></td>
                            <td><a class="btn-sm p-0 btn-warning" href="<?= base_url('C_Adendum/adendum_update/'.$add->id_addm)?>"><i class="fa-solid fa-edit"></i>Edit</a></td>
                        </tr>      
                    <?php }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/sweetalert2/sweetalert2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#adendum').DataTable();
    });
</script>
