    <nav class="navbar py-3 navbar-expand-lg navbar-light shadow-sm">
      <div class="container-fluid">
        <a class="navbar-brand pb-2" href="#">
          <img
              src="<?= base_url('assets/navbar-logo.png')?>"
            alt=""
            width="200"
            height="40"
          />
        </a><button
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
                <a class="nav-link" href="<?= base_url('Akses')?>">User Manajemen </a>
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
                  <a class="dropdown-item" href="<?= base_url('C_Kontrak')?>">Kontrak</a>
                  <a class="dropdown-item" href="<?= base_url('C_SatuanKerja')?>">Satuan Keja</a>
                  <a class="dropdown-item" href="<?= base_url('C_Rekanan')?>">Penyedia</a>
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
                  <a class="dropdown-item" href="<?= base_url('C_Realisasi')?>"
                  >Realisasi Pekerjaan</a
                >
                <a class="dropdown-item" href="<?= base_url('C_Adendum')?>"
                  >Adendum Pekerjaan</a
                >
                <a class="dropdown-item" href="<?= base_url('C_Sanksi')?>"
                  >Sanksi / Denda Pekerjaan</a
                >
                <a class="dropdown-item" href="<?= base_url('C_Perhitungan')?>"
                  >Berita Acara Perhitungan</a
                >
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
                <a class="dropdown-item" href="#">Ringkasan Kontrak</a>
                <a class="dropdown-item" href="#"
                  >Ringkasan Progress Pekerjaan</a
                >
                <a class="dropdown-item" href="#"
                  >Laporan Realisasi pekerjaan</a
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
              <a class="dropdown-item" href="<?= base_url('akses/change_password')?>">Ubah Password</a>
            <a class="dropdown-item" href="<?= base_url('akses/logout')?>">Logout</a>
          </div>
        </div>
      </div>
    </nav>