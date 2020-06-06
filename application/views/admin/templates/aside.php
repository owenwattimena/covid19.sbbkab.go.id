<?php
$active_menu = explode('/', $current_menu);
if (count($active_menu) <= 1) {
    $current_submenu = '';
} else {
    $current_menu = $active_menu[0];
    $current_submenu = $active_menu[1];
}
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url() ?>" class="brand-link">
        <img src="<?= base_url('/assets/site/images/sbblogo.png') ?>" alt="AdminLTE Logo" class="brand-image "
            style="opacity: .8">
        <span class="brand-text font-weight-light">SBB Siaga Covid-19</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url('/assets/admin/img/user-auth.png') ?>" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <p class="d-block mb-0 pb-0 text-light"><?= $this->session->user->nama ?></p>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url('/admin/dashboard') ?>"
                        class="nav-link <?= $current_menu == 'Dashboard' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard

                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">

                    <a href="#" class="nav-link <?= $current_menu == 'Covid19' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-virus"></i>
                        <p>
                            Covid-19
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="<?= base_url('/admin/covid19/orang-tanpa-gejalah') ?>"
                                class="nav-link <?= $current_submenu == 'otg' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Orang Tanpa Gejalah</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('/admin/covid19/orang-dalam-pemantauan') ?>"
                                class="nav-link <?= $current_submenu == 'odp' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Orang Dalam Pemantauan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('/admin/covid19/pasien-dalam-pengawasan') ?>"
                                class="nav-link <?= $current_submenu == 'pdp' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pasien Dalam Pengawasan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="<?= base_url('/admin/covid19/positif-covid19') ?>"
                                class="nav-link <?= $current_submenu == 'positif' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Positif Covid-19</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/admin/hotline') ?>"
                        class="nav-link <?= $current_menu == 'Hotline' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-phone"></i>
                        <p>
                            Hot Line
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="<?= base_url('/admin/media') ?>"
                        class="nav-link <?= $current_menu == 'Media' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-photo-video"></i>
                        <p>
                            Media
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/admin/himbauan') ?>"
                        class="nav-link <?= $current_menu == 'Himbauan' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-bullhorn"></i>
                        <p>
                            Himbauan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/admin/infografis') ?>"
                        class="nav-link <?= $current_menu == 'Infografis' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-info-circle"></i>
                        <p>
                            Infografis
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('/admin/users') ?>"
                        class="nav-link <?= $current_menu == 'Users' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link <?= $current_menu == 'Pengaturan' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-cog"></i>
                        <p>
                            Pengaturan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="pages/layout/top-nav.html"
                                class="nav-link <?= $current_submenu == 'halaman' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Halaman</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="pages/layout/top-nav-sidebar.html"
                                class="nav-link <?= $current_submenu == 'kontak' ? 'active' : '' ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kontak</p>
                            </a>
                        </li>

                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>