<div class="content shadow p-4 my-4">
        <div class="d-flex justify-content-end">
            <form method="get" action="<?= base_url('C_Kontrak/tarik')?>" class="form-inline">
            <div class="form-group mb-2 mr-2">
              <input type="text" name="lls_id" class="form-control" placeholder="Tarik Kode Tender" />
            </div>
            <button type="submit" id="cari" class="btn btn-primary mb-2">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
          </form>
        </div>
        <table id="kontrakKerja" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th colspan="2" >Kode</th>
              <th rowspan="2" >SKPD</th>
              <th rowspan="2" >No & Tgl Registrasi</th>
              <th rowspan="2" >Nama Paket Pengadaan</th>
              <th rowspan="2" >Pagu Anggaran</th>
              <th colspan="3">Kontrak</th>
              <th rowspan="2" >Tanggal Pengadaan</th>
              <th rowspan="2" >Action</th>
            </tr>
            <tr>
                <th>RUP</th>
                <th>Tender</th>
                <th>No.</th>
                <th>Tanggal</th>
                <th>Nilai</th>
            </tr>
          </thead>
          <tbody>
              <?php if(!empty($kontrak)){
                  $no = 1;
                  foreach($kontrak as $kt){ ?>
              <tr>
                  <td><?=$kt->rup_id?></td>
                  <td><?=$kt->lls_id?></td>
                  <td><?=$kt->stk_nama?></td>
                  <td><?=$kt->no_registrasi?><br><?= isset($kt->tgl_reg)?fdateformat('d-m-Y', $kt->tgl_reg):''?></td>
                  <td><?=$kt->pkt_nama?></td>
                  <td><?=$kt->pkt_pagu?></td>
                  <td><?=$kt->kontrak_no?></td>
                  <td><?= fdateformat('d-m-Y', $kt->kontrak_tanggal)?></td>
                  <td><?= rupiah($kt->kontrak_nilai)?></td>
                  <td>Rencana : <?= fdateformat('m-Y',$kt->tanggal_awal_pengadaan)?>
                  <br>
                  Realisasi : <?= fdateformat('m-Y',$kt->jadwal_awal_pengumuman)?>
                  </td>
                  <td><a class="btn-sm p-1 btn-warning" href="<?= base_url('kontrak/edit/'.$kt->id_kontrak)?>"><i class="fa-solid fa-edit"></i>edit</a></td>
              </tr>
              <?php $no++;    }
              }?>
          </tbody>
        </table>
      </div>
   <script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
   <script src="<?= base_url('assets/') ?>vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
   <script src="<?= base_url('assets/') ?>vendor/sweetalert2/sweetalert2.min.js"></script>
   <script type="text/javascript">
    $( document ).ready(function() {
        $('#kontrakKerja').DataTable({
            scrollX: true
        });
        $('#cari').on('click',function(e){
            Swal.fire({
            title: 'Tarik Data Tender !',
            html: 'Tunggu Beberapa Saat !',
            allowOutsideClick: false,
            timer: 40000,
            timerProgressBar: true,
            didOpen: ()=>{
                Swal.showLoading();
                },
            willClose:()=>{
                clearInterval(timerInterval);
            }
        }).then((result)=>{
            if(result.dismiss === Swal.DismissReason.timer){
                console.log('close by eye');
            }
        });
        });
        
        <?php if($this->session->flashdata('error_tarik')){ ?>
         Swal.fire({
            title:'<?=$this->session->flashdata('error_tarik')?>',
            icon: 'error', 
            showCancelButton: true,
            confirmButtonText: 'Tambah'             
         }).then((result)=>{
             if(result.isConfirmed){
                 window.location.href = "<?= base_url('C_Kontrak/create')?>";
             }
         });       
        <?php } ?>
    });
    </script>