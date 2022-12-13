<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="<?= base_url('assets/') ?>vendor/bootstrap-4.6.2-dist/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/dropzone/dist/min/dropzone.min.css" />        
<link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/bootstrap-datepicker/css/bootstrap-datepicker.css"/>
<link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/datatables-bs4/css/dataTables.bootstrap4.css" >    
<link
      rel="stylesheet"
      href="<?= base_url('assets/') ?>vendor/datatables-bs4/css/buttons.bootstrap4.min.css"
    />
<link rel="stylesheet" href="<?= base_url('assets/') ?>vendor/sweetalert2/sweetalert2.min.css" />    
<link rel="stylesheet" href="<?= base_url('assets/')?>fontawesome/css/all.css" />
    <link rel="stylesheet" href="<?= base_url('assets/') ?>styles/styles.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
      rel="stylesheet"
    />    
    <script src="<?= base_url('assets/') ?>script/jquery-3.6.0.min.js"></script>
    <title>Sinergi - Sistem Informasi Pengendalian dan Evaluasi Melalui Registrasi Kontrak</title>
  </head>
  <body>
    <?php $this->load->view('component/navbar')?>
    <main>
      <div class="container my-4">
          <?php $this->load->view($page)?>
      </div>
    </main>
    <footer class="footer">
      <div class="container">
        <p class="text-center">&copy; Pemerintah Kota Kediri - Bagian Administrasi Pembangunan 2022</p>
      </div>
    </footer>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap-4.6.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/') ?>script/main.js"></script>
  </body>
</html>
