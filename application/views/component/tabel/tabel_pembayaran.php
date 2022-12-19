<div class="content shadow p-4">
    <div class="d-flex justify-content-end">    
        <button class="btn btn-primary mb-2">
            <a href="<?= base_url('pembayaran/create/' . $kontrak->id_kontrak) ?>" class="text-decoration-none text-white"
               >Tambah <span class="pl-2"><i class="fa-solid fa-plus"></i></span
                ></a>
        </button>
    </div>
    <table id="adendum" class="table table-bordered table-hover">
        <thead>
                <tr>
                    <th rowspan="2">Nomor Berita Acara</th>
                    <th rowspan="2">Tanggal</th>
                    <th colspan="4">Pembayaran</th>
                    <th rowspan="2">Keterangan</th>
                    <th rowspan="2">Dokumen</th>
                    <th rowspan="2" style="width: 10%">Action</th>
                </tr>
                <tr>
                    <th>Jenis Pembayaran</th>
                    <th>Prosentase</th>
                    <th>Nilai Pembayaran</th>
                    <th>Potongan</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($pembayaran)) {
                    foreach ($pembayaran as $byr) {
                        ?>
                        <tr>
                            <td><?= $byr->no_bap ?></td>
                            <td><?= fdateformat('d-m-Y', $byr->tanggal) ?></td>
                            <td><?=$byr->jns_pemb == 0 ? 'Uang Muka':pembayaran()[$byr->jns_pemb]?></td>
                            <td><?= $byr->prosentase ?> % </td>
                            <td><?= rupiah($byr->nilai_bayar) ?></td>
                            <td><?php if(!empty($byr->potongan)){
                                foreach($byr->potongan as $ptg){
                                    echo ucfirst($ptg->jns_pot).' : '. rupiah($ptg->nilai_pot).'<br>';
                                }
                            }?></td>
                            <td><?= $byr->keterangan ?></td>
                            <td><a class="badge badge-pill badge-primary" href="<?= base_url('assets/dokumen/'.$byr->dokumen) ?>">Dokumen</a></td>
                            <td><a type="button" class="btn-sm p-1 btn-warning" href="<?= base_url('pembayaran/edit/'.$byr->id_pemb)?>"><span><i class="fa-solid fa-edit"></i>Edit</span></a></td>
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
        $('#adendum').DataTable();
    });
</script>