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
    <link rel="stylesheet" href="<?= base_url('assets/')?>fontawesome/css/all.css" />
    <link rel="stylesheet" href="<?= base_url('assets/')?>styles/login.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
      rel="stylesheet"
    />
    <title>Sinergi - Sistem Informasi Pengendalian Dan Evaluasi Melalui Registrasi Kontrak Kota Kediri</title>
  </head>
  <body>
        <section class="mx-auto">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-center">
          <div class="d-none d-lg-block col-lg-6 hero">
            <img
              src="<?= base_url('assets/')?>logo-login.png"
              class="img-fluid mt-5"
              alt="Login image"
            />
          </div>
          <div class="col-md-12 col-lg-6 my-5">
            <div class="row justify-content-center">
              <div class="col-10">
                <div class="row align-items-center justify-content-center">
                  <div class="col-4">
                    <div
                      class="d-flex align-items-center justify-content-center p-2 card-img"
                    >
                      <a href="">
                        <img
                          src="<?= base_url('assets/')?>harmoni.png"
                          alt=""
                          class="img-fluid"
                        />
                      </a>
                    </div>
                  </div>
                  <div class="col-4">
                    <div
                      class="d-flex align-items-center justify-content-center p-2 card-img"
                    >
                      <a href="">
                        <img
                          src="<?= base_url('assets/')?>logo-pemkot.png"
                          alt=""
                          class="img-fluid"
                        />
                      </a>
                    </div>
                  </div>
                  <div class="col-4">
                    <div
                      class="d-flex align-items-center justify-content-center p-2 card-img"
                    >
                      <a href="">
                        <img
                            src="<?= base_url('assets/')?>theservicecity.png"
                          alt=""
                          class="img-fluid"
                        />
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <h2 class="font-weight-bold text-center text-white my-5">
              Bagian Administrasi Pembangunan
            </h2>
            <div class="w-50 p-3 mx-auto">
              <form method="post" action="<?= base_url('Akses/login')?>">
                <div class="form-group">
                  <input
                    type="text"
                    name="identity"
                    class="form-control"
                    id="inputUser"
                    required
                  />
                  <label class="form-control-placeholder" for="inputUser"
                    >User Name</label
                  >
                </div>
                <div
                  class="form-group input-group align-items-center mt-4"
                  id="show_hide_password"
                >
                  <input
                    name="password"
                    type="password"
                    class="form-control"
                    id="inputPass"
                    required
                  />
                  <label class="form-control-placeholder" for="inputPass"
                    >Password</label
                  >
                  <div class="input-group-addon">
                    <a href=""
                      ><i class="fa fa-eye-slash" aria-hidden="true"></i
                    ></a>
                  </div>
                </div>
                <button class="login-btn" name="submit" type="submit">
                  Masuk
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <script src="<?= base_url('assets/') ?>script/jquery-3.6.0.min.js"></script>
    <script src="<?= base_url('assets/') ?>vendor/bootstrap-4.6.2-dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets/') ?>script/login.js"></script>
  </body>
</html>
