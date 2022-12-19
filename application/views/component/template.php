<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="<?= base_url('assets/')?>vendor/bootstrap-4.6.2-dist/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="<?= base_url('assets/')?>/style/styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
      rel="stylesheet"
    />
    <title>Sinergi - <?=$kontrak->lls_id?></title>
  </head>
  <body>
      <div style="margin: -40px"> No Registrasi : <?=$kontrak->no_registrasi?></div>
      <div class="page-print">
        <h3
          style="
            text-align: center;
            text-transform: uppercase;
            font-weight: bold;
            margin: 40px 0;
            font-size: 24px;
          "
        >
          Ringkasan Kontrak
        </h3>
        <table style="margin: auto; border-spacing: 10px">
          <tbody>
            <tr>
              <td style="width: 5%">1.</td>
              <td style="width: 50%">Nama Paket Pekerjaan</td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%"><?=$kontrak->pkt_nama?></td>
            </tr>
            <tr>
              <td style="width: 5%">2.</td>
              <td style="width: 50%">Nomor kontrak</td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%"><?=$kontrak->kontrak_no?></td>
            </tr>
            <tr>
              <td style="width: 5%">3.</td>
              <td style="width: 50%">Tanggal Kontrak</td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%"><?= fdateindo($kontrak->kontrak_tanggal)?></td>
            </tr>
            <tr>
              <td style="width: 5%">4.</td>
              <td style="width: 50%">Nilai Kontrak</td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%"><?=rupiah($kontrak->kontrak_nilai)?></td>
            </tr>
            <tr>
              <td style="width: 5%">5.</td>
              <td style="width: 50%">Nama Penyedia/Pelaksana</td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%"><?=$kontrak->rkn_nama?></td>
            </tr>
            <tr>
              <td style="width: 5%">6.</td>
              <td style="width: 50%">Jangka Waktu Pelaksanaan</td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%"><?=$kontrak->lama_durasi_penyerahan1?> Hari Kalender</td>
            </tr>
            <tr>
              <td style="width: 5%"></td>
              <td style="width: 50%">Tanggal Mulai</td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%"><?= fdateindo($kontrak->kontrak_mulai)?></td>
            </tr>
            <tr>
              <td style="width: 5%"></td>
              <td style="width: 50%">Tanggal Selesai</td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%"><?= fdateindo($kontrak->kontrak_akhir)?></td>
            </tr>
            <tr>
              <td style="width: 5%">7.</td>
              <td style="width: 50%">Bentuk Pembayaran</td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%"><?= isset($kontrak->btk_pembayaran)?pembayaran()[$kontrak->btk_pembayaran]:'............'?></td>
            </tr>
            <tr>
              <td style="width: 5%">8.</td>
              <td style="width: 50%">Addendum Kontrak <b>(apabila ada)</b></td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%"></td>
            </tr>
            <?php if(!empty($adendum)){ 
                foreach($adendum as $aden){
                ?>
            <tr>
              <td style="width: 5%"></td>
              <td style="width: 50%">Nomor</td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%"><?=$aden->nmr_adendum?></td>
            </tr>
            <tr>
              <td style="width: 5%"></td>
              <td style="width: 50%">Tanggal</td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%"><?= fdateindo($aden->tanggal_adendum)?></td>
            </tr>
            <tr>
              <td style="width: 5%"></td>
              <td style="width: 50%">Nilai</td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%"><?=rupiah($aden->kontrak_nilai)?></td>
            </tr>
            <?php }}else{ ?>
            <tr>
              <td style="width: 5%"></td>
              <td style="width: 50%">Nomor</td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%">....................................</td>
            </tr>
            <tr>
              <td style="width: 5%"></td>
              <td style="width: 50%">Tanggal</td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%">....................................</td>
            </tr>
            <tr>
              <td style="width: 5%"></td>
              <td style="width: 50%">Nilai</td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%">....................................</td>
            </tr>
            <?php }?>
            
            <tr>
              <td style="width: 5%">9.</td>
              <td style="width: 50%">
                Berita Acara Perhitungan Akhir <b>(apabila ada)</b>
              </td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%"></td>
            </tr>
            <?php if(!empty($hitung)){ 
                foreach($hitung as $htg){
                ?>
            <tr>
              <td style="width: 5%"></td>
              <td style="width: 50%">Nomor</td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%"><?=$htg->no_ba?></td>
            </tr>
            <tr>
              <td style="width: 5%"></td>
              <td style="width: 50%">Tanggal</td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%"><?= fdateindo($htg->tanggal)?></td>
            </tr>
            <tr>
              <td style="width: 5%"></td>
              <td style="width: 50%">Nilai</td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%"><?=rupiah($htg->hitung_nilai)?></td>
            </tr>
            <?php }}else{ ?>
            <tr>
              <td style="width: 5%"></td>
              <td style="width: 50%">Nomor</td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%">....................................</td>
            </tr>
            <tr>
              <td style="width: 5%"></td>
              <td style="width: 50%">Tanggal</td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%">....................................</td>
            </tr>
            <tr>
              <td style="width: 5%"></td>
              <td style="width: 50%">Nilai</td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%">....................................</td>
            </tr>
            <?php }?>
            <tr>
              <td style="width: 5%">10.</td>
              <td style="width: 50%">Denda <b>(apabila ada)</b></td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%"></td>
            </tr>
            <?php
            if(!empty($sanksi1)){
                $no1 = 0;
               foreach($sanksi1 as $lmbt){
                   if($no1>0){ ?>
            
            <tr>
              <td style="width: 5%"></td>
              <td style="width: 50%"></td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%"><?= rupiah($lmbt->denda_nilai)?></td>
            </tr>           
            <?php }else{ ?>            
            <tr>
              <td style="width: 5%"></td>
              <td style="width: 50%">Denda Keterlambatan <b>(nilai)</b></td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%"><?=rupiah($lmbt->denda_nilai)?></td>
            </tr>           
            <?php       }
                   $no1++;
               } 
            }else{?>                
            <tr>
              <td style="width: 5%"></td>
              <td style="width: 50%">Denda Keterlambatan <b>(nilai)</b></td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%">....................................</td>
            </tr>
            <?php }
            if(!empty($sanksi2)){
                $no2 = 0;
               foreach($sanksi2 as $lmbt){
            if($no2 > 0){            
            ?>
            <tr>
              <td style="width: 5%"></td>
              <td style="width: 50%"></td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%"><?=rupiah($lmbt->denda_nilai)?></td>
            </tr>           
            <?php }else{ ?> 
            <tr>
              <td style="width: 5%"></td>
              <td style="width: 50%">Denda lainnya <b>(nilai)</b></td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%"><?=rupiah($lmbt->denda_nilai)?></td>
            </tr>           
            <?php       }
                   $no2++;
               } 
            }else{?> 
            <tr>
              <td style="width: 5%"></td>
              <td style="width: 50%">Denda lainnya <b>(nilai)</b></td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%">....................................</td>
            </tr>
            <?php } ?>
            <tr>
              <td style="width: 5%">11.</td>
              <td style="width: 50%">Nomor Rekening Bank Penyedia</td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%"><?=$kontrak->kontrak_norekening?></td>
            </tr>
            <tr>
              <td style="width: 5%">12.</td>
              <td style="width: 50%">Nama Bank Penyedia</td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%"><?=$kontrak->kontrak_namarekening?></td>
            </tr>
            <tr>
              <td style="width: 5%">13.</td>
              <td style="width: 50%">NPWP Penyedia</td>
              <td style="width: 5%; text-align: center">:</td>
              <td style="width: 45%"><?=$kontrak->rkn_npwp?></td>
            </tr>
          </tbody>
        </table>
        <div style="float: right; margin-top: 40px; padding: 0 50px">
            <p>Kediri, <span><?= fdateindo(date('d-m-Y'))?></span></p>
          <p style="text-align: center; margin-top: 80px">
            <u><b><?=$ppk->ppk_nama?></b></u><br />
            <?=$ppk->ppk_nip?>
          </p>
        </div>
      </div>
    <script src="<?= base_url('assets/')?>script/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('assets/')?>vendor/bootstrap-4.6.2-dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
