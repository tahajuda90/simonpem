<div class="content shadow p-4 my-4">

      <table id="laporan" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th rowspan="2">SKPD</th>
            <th rowspan="2">Nama Paket Pengadaan</th>
            <th rowspan="2">Pagu Anggaran</th>
            <th rowspan="2">Nama Penyedia</th>
            <th rowspan="2">Alamat Penyedia</th>
            <th colspan="3">Kontrak</th>
            <th rowspan="2">Jangka Waktu Pelaksanaan</th>
            <th rowspan="2">Tanggal Mulai Kontrak</th>
            <th colspan="3">Pelaksanaan Pekerjaan</th>
          </tr>
          <tr>
              <th>No</th>
              <th>Tanggal</th>
              <th>Nilai</th>
              <th>Target</th>
              <th>Realisasi</th>
              <th>Deviasi</th>
          </tr>
        </thead>
        <tbody>
            <?php if(isset($kontrak)){
                foreach($kontrak as $kt){ ?>
          <tr>
            <td><?=$kt->stk_nama?></td>
            <td><?=$kt->pkt_nama?></td>
            <td><?= rupiah($kt->pkt_pagu)?></td>
            <td><?=$kt->rkn_nama?></td>
            <td><?=$kt->rkn_alamat?></td>
            <td><?=$kt->kontrak_no?></td>
            <td><?= fdateformat('d-m-Y', $kt->kontrak_tanggal)?></td>
            <td><?= rupiah($kt->kontrak_nilai)?></td>
            <td><?=$kt->lama_durasi_penyerahan1?><br><?= fdatebulan(date("m",strtotime($kt->kontrak_mulai)))?>-<?= fdatebulan(date("m",strtotime($kt->kontrak_akhir)))?></td>
            <td><?= fdateformat('d-m-Y', $kt->kontrak_mulai)?></td>
            <td><?=$kt->rencana?></td>
            <td><?=$kt->realisasi?></td>
            <td><?=$kt->realisasi - $kt->rencana?></td>
          </tr>
                    
            <?php    }
            }?>
        </tbody>
      </table>
</div>
<script src="<?= base_url('assets/')?>vendor/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url('assets/')?>vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/')?>vendor/datatables/dataTables.buttons.min.js"></script>
<script src="<?= base_url('assets/')?>vendor/datatables/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url('assets/')?>vendor/datatables/jszip.min.js"></script>
<script src="<?= base_url('assets/')?>vendor/datatables/pdfmake.min.js"></script>
<script src="<?= base_url('assets/')?>vendor/datatables/vfs_fonts.js"></script>
<script src="<?= base_url('assets/')?>vendor/datatables/buttons.html5.min.js"></script>
<script src="<?= base_url('assets/')?>vendor/datatables/buttons.print.min.js"></script>
<script src="<?= base_url('assets/')?>vendor/datatables/buttons.colVis.min.js"></script>
<script>
     $( document ).ready(function() {
        $("#laporan").DataTable({
          scrollX: true,
          paging: true,
          lengthChange: true,
          searching: true,
          ordering: true,
          info: true,
          autoWidth: false,
          dom: '<"container-fluid"<"row mb-2"<"col"B>><"row"<"col"l><"col"f>>>rtip',
          buttons: ["print", "excel", "pdf", "colvis"]
        });
        table
          .buttons()
          .container()
          .appendTo("#laporan_wrapper .col-md-6:eq(0)");
      });
    </script>