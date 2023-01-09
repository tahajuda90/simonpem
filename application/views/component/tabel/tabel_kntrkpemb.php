      <div class="content shadow p-4">
        
        <table id="kontrakKerja" class="table table-bordered table-hover">
          <thead>
            <tr>
              <th>Kode</th>
              <th>Satuan Kerja</th>
              <th>Nama Paket</th>
              <th>Nilai Kontrak</th>
              <th>Tanggal Pengadaan</th>
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
                  <td><?=$kt->pkt_nama?><br><?=$kt->kontrak_no ?></td>
                  <td><?= rupiah($kt->kontrak_nilai)?></td>
                  <td>Rencana : <?= fdateformat('m-Y',$kt->tanggal_awal_pengadaan)?>
                  <br>
                  Realisasi : <?= fdateformat('m-Y',$kt->jadwal_awal_pengumuman)?>
                  </td>
                  <td>                      
                  <?php
                  if(($kt->btk_pembayaran == 3) && ($kt->jml_nil == 0)){
                     echo '<button type="button" data-toggle="modal" data-target="#nilai" value="'.$kt->id_kontrak.'" id="penilai" class="btn-sm p-1 btn-secondary" >Penilaian Penyedia</button><br><br>';
                  }elseif($kt->jml_nil == 0){
                     echo '<button type="button" data-toggle="modal" data-target="#nilai" value="'.$kt->id_kontrak.'" id="penilai" class="btn-sm p-1 btn-secondary" >Penilaian Penyedia</button><br><br>'; 
                  }
                  
                  if(($kt->jml_pemb == 0) && ($kt->btk_pembayaran == 3) && ($kt->jml_nil == 0)){
                      
                  }elseif(($kt->jml_pemb > 0)){                      
                      echo '<a type="button" class="btn-sm p-1 btn-primary" href="'.base_url('pembayaran/list/'.$kt->id_kontrak).'">Pembayaran</a>';
                  }else{
                      echo '<a type="button" class="btn-sm p-1 btn-success" href="'.base_url('pembayaran/create/'.$kt->id_kontrak).'"><span><i class="fa-solid fa-add"></i>Tambah</span></a>';
                  }
                  ?>
                  </td>
              </tr>
              <?php    }
              }?>
          </tbody>
        </table>
      </div>

<div
    class="modal fade"
    id="nilai"
    tabindex="-1"
    role="dialog"
    aria-labelledby="modalNilaiTitle"
    aria-hidden="true"
    >
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
            </div>
            <form action="" id="nilai_form" enctype="multipart/form-data" method="post" >
                <div class="modal-body align-content-center">
                    <h6>Masukkan Nilai Penilaian Penyedia SiKAP</h6>
                    <input
                        id ="nilai"
                        type="text"
                        name="nilai"
                        class="form-control"
                        />
                    <input
                  type="file"
                  class="form-control-file"
                  name="dokumen"
                />
                    <p class="text-muted">Silahkan upload file berekstensi .jpg,.png,.jpeg</p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" id="submit" name="submit" value="submit" type="button">Kirim</button>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
   <script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
   <script src="<?= base_url('assets/') ?>vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
   <script src="<?= base_url('assets/') ?>vendor/sweetalert2/sweetalert2.min.js"></script>
   <script type="text/javascript">
    $( document ).ready(function() {
        $('#kontrakKerja').DataTable();
        $('#kontrakKerja tbody tr td button').click(function(){
            console.log($(this).val());
            $.get("<?= base_url('C_Penilaian/assign_nilai')?>",{id_kontrak:$(this).val()},function(result){
                 console.log(result);
                 elem = JSON.parse(result);
                 $('.modal-title').html(elem.title);
                 $('#nilai_form').attr('action', elem.action);
             });
        });
        $('#submit').click(function(){
            var formData = new FormData($('#nilai_form')[0]);
            console.log(formData);
            $.ajax({
                type: $('#nilai_form').attr('method'),
                url:$('#nilai_form').attr('action'),
                cache:false,
                contentType: false,
                processData: false,
                data:formData,
                success:function(response){
                    console.log(response);
                    if(JSON.parse(response) === 'success'){
                        Swal.fire({
                            icon: 'success',
                            title: 'Nilai Berhasil di Upload !',
                            showConfirmButton: true,
                            timer: 1500
                          }).then(function(isConfirm){
                              if(isConfirm){
                                  location.reload();
                              }
                          });
                    }
                    $('#nilai').modal('hide');
                }
            });
        });
        
    });
    </script>