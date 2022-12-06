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
    <link rel="stylesheet" href="<?= base_url('assets/') ?>fontawesome/css/all.css" />
    <link rel="stylesheet" href="<?= base_url('assets/') ?>styles/styles.css" />
    <link rel="stylesheet" href="<?= base_url('assets/') ?>styles/login.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins&display=swap"
      rel="stylesheet"
    />
    <title>Login</title>
  </head>
  <body>
    <section class="vh-100">
      <div class="container my-4 h-100">
        <div class="row d-flex align-items-center justify-content-center h-100">
          <div class="col-md-8 col-lg-7 col-xl-6">
            <img
              src="<?= base_url('assets/') ?>login.png"
              class="img-fluid"
              alt="Login image"
            />
          </div>
          <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
            <div
              class="login-card shadow my-4 d-flex flex-column align-items-center justify-content-center"
            >
              <h2 class="font-weight-bold">Login Page</h2>
              <form method="post" action="<?= base_url('Akses/login')?>">
                <div class="form-group mt-5">
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
                    type="password"
                    class="form-control"
                    id="inputPass"
                    name="password"
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
                <div class="d-flex justify-content-center">
                  <button class="btn btn-primary" name="submit" type="submit">
                    Login
                  </button>
                </div>
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
