 <div class="row">
          <div class="col-md-8">
            <h2>Dashboard</h2>
          </div>
          <div class="col-md-4">
            <nav aria-label="breadcrumb ">
              <ol class="breadcrumb shadow p-3 mb-5 rounded">
                <li class="breadcrumb-item active" aria-current="page">Home</li>
              </ol>
            </nav>
          </div>
        </div>


        <?php if($this->group != 'skpd'){ ?>
        <div class="content shadow p-4 my-4">
            <form>
                    <div class="form-row">
                        <div class="col-md-4 mb-3">
                            <select name="id_satker" class="custom-select">
                                <option selected disabled value="">Satuan Kerja</option>
                                <?php
                                if (!empty($satker)) {
                                    foreach ($satker as $stk) {
                                        echo '<option value="' . $stk->id_satker . '">' . $stk->stk_nama . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <select name="mode" class="custom-select">
                                <option selected disabled value="">Silahkan Pilih</option>
                                <option value="1" >Selesai</option>
                                <option value="2" >Progress</option>
                                <option value="3" >Realisasi = 100%</option>
                                <option value="4" >Realisasi < 100%</option>
                            </select>
                        </div>
                        <div class="col-auto mb-3 align-self-end ml-auto">
                            <button class="btn btn-primary" name="submit" type="submit">
                                Generate
                            </button>
                        </div>
                    </div>
                </form>
        </div>
        <?php } ?>

        <div class="content shadow p-4 my-4">
          <canvas id="myChart"></canvas>
        </div>
<script src="<?= base_url('assets/')?>vendor/chartjs/dist/chart.umd.js"></script>
<!--<script src="<?= base_url('assets/')?>script/chartjs.js"></script>-->
<script type="text/javascript">
    $(document).ready(function () { 
    
    const ctx = document.getElementById("myChart");
    const data = <?=$grafik?>;
    console.log(data.legend);
new Chart(ctx, {
  type: "bar",
  data: {
      labels:data.label,
      datasets:[{
            label: data.legend[0],
            data: data.data[0]
            },{
            label: data.legend[1],
            data: data.data[1]
            }]
  },
  options: {
    responsive: true  }
});
    });
</script>