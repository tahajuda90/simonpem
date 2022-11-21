    <nav class="navbar py-3 navbar-expand-lg navbar-light shadow-sm">
      <div class="container-fluid">
        <a class="navbar-brand mr-5" href="#">LOGO APLIKASI</a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNavDropdown"
          aria-controls="navbarNavDropdown"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <ul class="navbar-nav">
            <li class="nav-item active">
              <a class="nav-link" href="#"
                >Dashboard <span class="sr-only">(current)</span></a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"
                >User Manajemen </a
              >
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-toggle="dropdown"
                aria-expanded="false"
              >
                Master
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Kontrak</a>
                <a class="dropdown-item" href="#">Satuan Keja</a>
                <a class="dropdown-item" href="#">Penyedia</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-toggle="dropdown"
                aria-expanded="false"
              >
                Monitoring
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Relasi Pekerjaan</a>
                <a class="dropdown-item" href="#">Kendala Pekerjaan</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="#"
                role="button"
                data-toggle="dropdown"
                aria-expanded="false"
              >
                Laporan
              </a>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Rekap Pekerjaan</a>
                <a class="dropdown-item" href="#">Rekap Relasi Pekerjaan</a>
                <a class="dropdown-item" href="#"
                  >Rekap Serah Terima Pekerjaan</a
                >
              </div>
            </li>
          </ul>
        </div>
        <div class="dropdown user">
          <a
            class="nav-link dropdown-toggle"
            href="#"
            role="button"
            data-toggle="dropdown"
            aria-expanded="false"
          >
            <img
                src="<?=base_url('assets/')?>picture.png"
              width="40"
              height="40"
              class="rounded-circle"
            />
          </a>
          <div class="dropdown-menu" style="width: 60px">
            <a class="dropdown-item" href="#">Ubah Password</a>
            <a class="dropdown-item" href="#">Logout</a>
          </div>
        </div>
      </div>
    </nav>