  <link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/datatables-bs4/css/dataTables.bootstrap4.css" >    
<div class="container my-4">
      <div class="content shadow p-4">
        <div class="alert alert-success" role="alert">
          This is a success alert—check it out!
        </div>
        <div class="d-flex justify-content-end">
          <form class="form-inline">
            <div class="form-group mb-2 mr-2">
              <input type="text" class="form-control" placeholder="Tarik Kode Tender" />
            </div>
            <button type="button" onclick="cari()" class="btn btn-primary mb-2">
              <i class="fa-solid fa-magnifying-glass"></i>
            </button>
          </form>
        </div>
        <table id="kontrakKerja" class="table table-bordered table-hover">
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
   <script src="<?= base_url('assets/') ?>vendor/datatables/jquery.dataTables.min.js"></script>
   <script src="<?= base_url('assets/') ?>vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
   <script type="text/javascript">
    $( document ).ready(function() {
        $('#kontrakKerja').DataTable();
    });
    </script>