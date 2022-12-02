<div class="content shadow p-4 my-4">
      <div class="d-flex justify-content-end">
        <button class="btn btn-primary mb-2">
            <a href="<?= base_url('C_SatuanKerja/create')?>" class="text-decoration-none text-white"
            >Tambah <span class="pl-2"><i class="fa-solid fa-plus"></i></span
          ></a>
        </button>
      </div>
      <table id="satuanKerja" class="table table-bordered table-hover">
        <thead>
          <tr>
            <th>Nama </th>
            <th>Telepon</th>
            <th>Alamat</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
            <?php
            if(!empty($satker)){
                foreach($satker as $stk){ ?>
            <tr>
                <td><?=$stk->stk_nama?></td>
                <td><?=$stk->stk_telepon?></td>
                <td><?=$stk->stk_alamat?></td>
                <td><a class="btn-xs p-1 btn-warning" href="<?= base_url('C_SatuanKerja/edit/'.$stk->id_satker)?>"><i class="fa-solid fa-edit"></i>edit</a></td>
            </tr>        
            <?php    }
            }
            ?>
        </tbody>
      </table>
    </div>
<script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/') ?>vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $( document ).ready(function() {
        $('#satuanKerja').DataTable();
    });
</script>