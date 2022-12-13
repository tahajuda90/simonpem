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

        <div class="content shadow p-4 my-4">
          <div class="form-row">
            <div class="col-md-4 mb-3">
              <select class="custom-select">
                <option selected disabled value="">Silahkan Pilih</option>
                <option>...</option>
                <option>...</option>
              </select>
            </div>
            <div class="col-md-4 mb-3">
              <select class="custom-select">
                <option selected disabled value="">Silahkan Pilih</option>
                <option>...</option>
                <option>...</option>
              </select>
            </div>
            <div class="col-auto mb-3 align-self-end ml-auto">
              <button class="btn btn-primary" name="submit" type="submit">
                Generate
              </button>
            </div>
          </div>
        </div>

        <div class="content shadow p-4 my-4">
          <canvas id="myChart"></canvas>
          <div class="accordion shadow mt-5" id="dashboardAccordion">
            <div class="card">
              <div class="card-header" id="headingOne">
                <h2 class="mb-0">
                  <div
                    class="btn btn-block text-center font-weight-bold"
                    data-toggle="collapse"
                    data-target="#collapseOne"
                    aria-expanded="false"
                    aria-controls="collapseOne"
                  >
                    Rincian Data
                  </div>
                </h2>
              </div>

              <div
                id="collapseOne"
                class="collapse"
                aria-labelledby="headingOne"
                data-parent="#dashboardAccordion"
              >
                <div class="card-body">
                  <table
                    id="rincianData"
                    class="table table-bordered table-hover"
                  >
                    <thead>
                      <tr>
                        <th>Rendering engine</th>
                        <th>Browser</th>
                        <th>Platform(s)</th>
                        <th>Engine version</th>
                        <th>CSS grade</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Trident</td>
                        <td>Internet Explorer 4.0</td>
                        <td>Win 95+</td>
                        <td>4</td>
                        <td>X</td>
                      </tr>
                      <tr>
                        <td>Trident</td>
                        <td>Internet Explorer 5.0</td>
                        <td>Win 95+</td>
                        <td>5</td>
                        <td>C</td>
                      </tr>
                      <tr>
                        <td>Trident</td>
                        <td>Internet Explorer 5.5</td>
                        <td>Win 95+</td>
                        <td>5.5</td>
                        <td>A</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
<script src="<?= base_url('assets/')?>vendor/chartjs/dist/chart.umd.js"></script>
<script src="<?= base_url('assets/')?>script/chartjs.js"></script>