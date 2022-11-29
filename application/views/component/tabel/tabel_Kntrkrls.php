<link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/datatables-bs4/css/dataTables.bootstrap4.css" >    
<link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/sweetalert2/sweetalert2.min.css" />
<div class="container my-4">
      <div class="content shadow p-4">
        
        <table id="kontrakKerja" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Kode</th>
              <th>Satuan Kerja</th>
              <th>Nama Paket</th>
              <th>Nilai Kontrak</th>
              <th>Tanggal</th>
              <th style="width: 10%">Action</th>
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
                  <td><?=$kt->pkt_nama?><br><?=$kt->kontrak_no?></td>
                  <td><?= rupiah($kt->kontrak_nilai)?></td>
                  <td>Rencana : <?= fdateformat('m-Y',$kt->tanggal_awal_pengadaan)?>
                  <br>
                  Realisasi : <?= fdateformat('m-Y',$kt->jadwal_awal_pengumuman)?>
                  </td>
                  <td><a class="btn-sm p-1 btn-success" href="<?= base_url('C_Realisasi/uraian/'.$kt->id_kontrak)?>"><i class="fa-solid fa-plus"></i>Uraian</a></td>
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
        $('#cari').on('click',function(e){
            Swal.fire({
            title: 'Auto close alert!',
            html: 'I will close in <b></b> milliseconds.',
            timer: 20000,
            timerProgressBar: true,
            didOpen: ()=>{
                Swal.showLoading();
                },
            willClose:()=>{
                clearInterval(timerInterval);
            }
        }).then((reuslt)=>{
            if(result.dismiss === Swal.DismissReason.timer){
                console.log('colse by eye');
            }
        });
        });
        
    });
    </script>