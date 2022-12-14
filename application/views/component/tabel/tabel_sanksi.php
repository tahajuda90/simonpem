    <div class="content shadow p-4">
        <div class="d-flex justify-content-end">    
            <button class="btn btn-primary mb-2">
                <a href="<?= base_url('sanksi/create/' . $kontrak->id_kontrak) ?>" class="text-decoration-none text-white"
                   >Tambah <span class="pl-2"><i class="fa-solid fa-plus"></i></span
                    ></a>
            </button>
        </div>
        <table id="sanksi" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>Nomor Adendum</th>
                    <th>Tanggal</th>
                    <th>Sanksi</th>
                    <th>Alasan</th>
                    <th>Dokumen</th>
                    <th style="width: 10%">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($sanksi)) {
                    foreach ($sanksi as $snksi) {
                        ?>
                        <tr>
                            <td><?= $snksi->nmr_denda ?></td>
                            <td><?= fdateformat('d-m-Y', $snksi->tanggal) ?></td>
                            <td><?= sanksi()[$snksi->jns_sanksi] ?> 
                                <br><?= $snksi->sanksi ?> </td>
                            <td><?= $snksi->kendala ?></td>
                            <td><a class="badge badge-pill badge-primary" href="<?= base_url('assets/dokumen/'.$snksi->dokumen) ?>">Dokumen</a></td>
                            <td><a class="btn-sm p-0 btn-warning" href="<?= base_url('sanksi/edit/'.$snksi->id_snksi)?>"><i class="fa-solid fa-edit"></i>Edit</a></td>
                        </tr>      
                    <?php }
                }
                ?>
            </tbody>
        </table>
    </div>
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/sweetalert2/sweetalert2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sanksi').DataTable();
    });
</script>
