
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
                <th>Pembayaran</th>
                <th>Adendum</th>
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
                  <td><?=$kt->jml_pemb?></td>
                  <td><?=$kt->jml_addm?></td>
                  <td><?=$kt->jml_prakhir?></td>
                  <td>                     
                  <?php
                  if(($this->group == 'admin')|| ($this->group == 'operator')){
                      echo' <button type="button" data-toggle="modal"
          data-target="#ringkasan" value="'.$kt->id_kontrak.'" id="regis" class="btn-sm p-1 btn-success" >Registrasi</button>
                  <br><br>';
                  }
                  
                  if(!empty($kt->no_registrasi)){
                      echo '<a type="button" class="btn-sm p-1 btn-primary" href="'.base_url('C_Ringkasan/cetak/'.$kt->id_kontrak).'"><span><i class="fa-solid fa-print"></i>Cetak</span></a>';
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
        id="ringkasan"
        tabindex="-1"
        role="dialog"
        aria-labelledby="modalRingkasanTitle"
        aria-hidden="true"
      >
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title"></h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              </div>
              <form action="" id="regis_form" method="post" >
                  <div class="modal-body align-content-center">
                      <h6>Masukkan Nomor Registrasi Kontrak</h6>
                      <input
                          id ="no_registrasi"
                          type="text"
                          name="no_registrasi"
                          class="form-control"
                          />
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
             $.get("<?= base_url('C_Ringkasan/assign_regis')?>",{id_kontrak:$(this).val()},function(result){
                 console.log(result);
                 elem = JSON.parse(result);
                 $('.modal-title').html(elem.title);
                 $('#regis_form').attr('action', elem.action);
                 $('#no_registrasi').val(elem.value);
             });
        });
        
        $('#submit').click(function(){
            $.ajax({
                type: $('#regis_form').attr('method'),
                url:$('#regis_form').attr('action'),
                cache:false,
                data:$('#regis_form').serialize(),
                success:function(response){
                    console.log(response);
                    if(JSON.parse(response) === 'success'){
                        Swal.fire({
                            icon: 'success',
                            title: 'Kontrak Berhasil di Registrasi !',
                            showConfirmButton: true,
                            timer: 1500
                          }).then(function(isConfirm){
                              if(isConfirm){
                                  location.reload();
                              }
                          });
                    }
                    $('#ringkasan').modal('hide');
                },
                error:function(){
                    alert("error");
                }
            });
        });
    });

    </script>