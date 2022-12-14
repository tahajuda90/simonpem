<nav class="navbar py-3 navbar-expand-lg navbar-light shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand pb-2" href="<?= base_url('home') ?>">
            <img
                src="<?= base_url('assets/navbar-logo.png') ?>"
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
                <?php
                $name = $this->ion_auth->get_users_groups()->row()->name;
                foreach (load_menu($name) as $menu) {
                    if (isset($menu['sub'])) {
                        echo '<li class="nav-item '.(in_array($this->uri->segment(1), array_keys($menu['sub'])) ? 'active':'').' dropdown"><a
                        class="nav-link dropdown-toggle"
                        href="#"
                        role="button"
                        data-toggle="dropdown"
                        aria-expanded="false"
                        >'
                        . $menu['menu'] .
                    '</a><div class="dropdown-menu">';
                        foreach($menu['sub'] as $key=>$sub){
                            echo '<a class="dropdown-item" href="'. base_url($key).'">'.$sub.'</a>';
                        }
                        echo'</div></li>';
                    } else {
                        echo '<li class="nav-item '.($this->uri->segment(1) === $menu['link'] ? 'active':'').'">'
                        . '<a class="nav-link" href="' . base_url($menu['link']) . '">' . $menu['menu'] . '</a></li>';
                    }
                }
                ?>
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
                    src="<?= base_url('assets/') ?>picture.png"
                    width="40"
                    height="40"
                    class="rounded-circle"
                    />
            </a>
            <div class="dropdown-menu" style="width: 60px">
                <a class="dropdown-item" href="<?= base_url('akses/change_password') ?>">Ubah Password</a>
                <a class="dropdown-item" href="<?= base_url('akses/logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</nav>
