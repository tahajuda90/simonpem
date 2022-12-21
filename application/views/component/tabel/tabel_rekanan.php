<div class="content shadow p-4 my-4">
      <div class="d-flex justify-content-end">
        <button class="btn btn-primary mb-2">
            <a href="<?= base_url('penyedia/create')?>" class="text-decoration-none text-white"
            >Tambah <span class="pl-2"><i class="fa-solid fa-plus"></i></span
          ></a>
        </button>
      </div>
      <table id="penyedia" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Nama Rekanan</th>
            <th>NPWP</th>
            <th>Alamat</th>
            <th>Akta</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            <?php if (!empty($rekanan)) {
                foreach ($rekanan as $rkn) {
                    ?>  
                    <tr>
                        <td><?=$rkn->rkn_nama?></td>
                        <td><?=$rkn->rkn_npwp?></td>
                        <td><?=$rkn->rkn_alamat?></td>
                        <td>No :<?=$rkn->lhk_no?><br>
                        Tanggal :<?=$rkn->lhk_tanggal?><br>
                        Notaris :<?=$rkn->lhk_notaris?>
                        </td>
                        <td><a class="btn-xs p-1 btn-warning" href="<?= base_url('penyedia/edit/'.$rkn->id_rekanan)?>"><i class="fa-solid fa-edit"></i>edit</a></td>
                    </tr>
                <?php }
            }
            ?>
        </tbody>
      </table>
    </div>
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $( document ).ready(function() {
        $('#penyedia').DataTable();
    });
</script>