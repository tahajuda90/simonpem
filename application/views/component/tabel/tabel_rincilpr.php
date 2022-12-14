      <div class="content shadow p-4 my-4">
          <button class="btn btn-warning mb-2">
              <a href="<?= base_url('realisasi/laporan/edit/'.$laporan->id_lpr)?>" class="text-decoration-none text-white"
            >Ubah <span class="pl-2"><i class="fa-solid fa-edit"></i></span
          ></a>
        </button>
        <h2 class="text-center border-bottom p-4 mb-4"><?=$laporan->pkt_nama?></h2>
        <div class="row">
          <div class="col-md-6">
            <table class="table table-borderless">
              <tr>
                <td class="font-weight-bold">Tanggal Awal</td>
                <td>:</td>
                <td><?= fdateformat('d-m-Y', $laporan->tanggal_awal)?></td>
              </tr>
              <tr>
                <td class="font-weight-bold">Rencana</td>
                <td>:</td>
                <td><?=$laporan->rencana?></td>
              </tr>
              <tr>
                <td class="font-weight-bold">Keterangan</td>
                <td>:</td>
                <td class="text-justify">
                  <?=$laporan->keterangan?>
                </td>
              </tr>
            </table>
          </div>
          <div class="col-md-6">
            <table class="table table-borderless">
              <tr>
                <td class="font-weight-bold">Tanggal Akhir</td>
                <td>:</td>
                <td><?= fdateformat('d-m-Y', $laporan->tanggal_akhir)?></td>
              </tr>
              <tr>
                <td class="font-weight-bold">Realisasi</td>
                <td>:</td>
                <td><?=$laporan->realisasi?></td>
              </tr>
              <tr>
                <td class="font-weight-bold">Kendala</td>
                <td>:</td>
                <td class="text-justify">
                  <?=$laporan->kendala?>
                </td>
              </tr>
            </table>
          </div>
        </div>
        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr class="bg-info text-white">
                <th scope="col">Uraian Pekerjaan</th>
                <th scope="col">Bobot</th>
              </tr>
            </thead>
            <tbody>
                <?php if (!empty($pekerjaan)) {
                    foreach ($pekerjaan as $pkrj) {
                        ?>
                        <tr>
                            <th><?=$pkrj->uraian_pkrj?></th>
                            <th><?=$pkrj->bobot?></th>
                        </tr>
                    <?php }
                }
                ?>
            </tbody>
          </table>
        </div>
        <div class="row">
            <?php if(!empty($bukti)){
                foreach($bukti as $bkti){ ?>
                    <div class="col-md-3 col-xs-6 thumb">
            <a
              class="thumbnail"
              href="#"
              data-image-id=""
              data-toggle="modal"
              data-title=""
              data-image="<?= base_url('assets/gambar/').$bkti->image?>"
              data-target="#image-gallery"
            >
              <img
                class="img-thumbnail"
                src="<?= base_url('assets/gambar/').$bkti->image?>"
                alt="<?=$laporan->realisasi?>"
              />
            </a>
          </div>
            <?php    }
            }?>
          
        </div>
        <div
          class="modal fade"
          id="image-gallery"
          tabindex="-1"
          role="dialog"
          aria-labelledby="myModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="image-gallery-title"></h4>
                <button type="button" class="close" data-dismiss="modal">
                  <span aria-hidden="true">×</span
                  ><span class="sr-only">Close</span>
                </button>
              </div>
              <div class="modal-body">
                <img
                  id="image-gallery-image"
                  class="img-responsive col-md-12"
                  src=""
                />
              </div>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-secondary float-left"
                  id="show-previous-image"
                >
                  <i class="fa fa-arrow-left"></i>
                </button>

                <button
                  type="button"
                  id="show-next-image"
                  class="btn btn-secondary float-right"
                >
                  <i class="fa fa-arrow-right"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
<script src="<?= base_url('assets/') ?>script/gallery.js"></script>