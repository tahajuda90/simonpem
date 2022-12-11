<div class="container my-4">
      <div class="content shadow p-4">
        
        <table id="kontrakKerja" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th rowspan="2" >Kode</th>
              <th rowspan="2" >Satuan Kerja</th>
              <th rowspan="2" >Nama Paket</th>
              <th rowspan="2" >Nilai Kontrak</th>
              <th rowspan="2" >Realisasi</th>
              <th style="text-align: center" colspan="3">Jumlah</th>
              <th style="width: 10%" rowspan="2">Action</th>
            </tr>
            <tr>
                <th>Adendum</th>
                <th>Denda</th>
                <th>BA.Perhitungan</th>
            </tr>
          </thead>
          <tbody>
              <?php if(!empty($kontrak)){
                  foreach($kontrak as $kt){ ?>
              <tr>
                  <td>Kode Tender : <?=$kt->lls_id?>
                      <br>
                  Kode Sirup : <?=$kt->rup_id?>
                  </td>
                  <td><?=$kt->stk_nama?></td>
                  <td><?=$kt->pkt_nama?><br>No Kontrak :<?=$kt->kontrak_no?></td>
                  <td><?= rupiah($kt->kontrak_nilai)?></td>
                  <td><?=$kt->realisasi?>%</td>
                  <td><?=$kt->jml_addm?></td>
                  <td><?=$kt->jml_snksi?></td>
                  <td><?=$kt->jml_prakhir?></td>
                  <td>
                      <a class="btn-sm p-0 btn-success" href="">Registrasi</a>
                  <br><br>
                  <?php
                  if(!empty($kt->no_registrasi)){
                      echo '<a class="btn-sm p-0 btn-primary" href=""><i class="fa-solid fa-print"></i>Cetak</a>';
                  }
                  ?>
                  </td>
              </tr>
              <?php    }
              }?>
          </tbody>
        </table>
      </div>
    </div>
   <script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
   <script src="<?= base_url('assets/') ?>vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
   <script src="<?= base_url('assets/') ?>vendor/sweetalert2/sweetalert2.min.js"></script>
   <script type="text/javascript">
    $( document ).ready(function() {
        $('#kontrakKerja').DataTable();
        
    });
    </script>