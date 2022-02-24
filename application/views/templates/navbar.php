<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo mr-5" href=""><img src="<?php echo base_url() ?>assets/images/logo.png" class="mr-2" alt="logo">
                </a>
                <a class="navbar-brand brand-logo-mini" href=""><img src="<?php echo base_url() ?>assets/images/logo.png" alt="logo"></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown">
                        <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="<?= base_url(); ?>peserta/notifikasi" data-toggle="dropdown">
                            <i class="icon-bell mx-0"></i>
                            <span class="count"></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                            <a href="<?= base_url(); ?>peserta/notifikasi">
                                <p href="<?= base_url(); ?>peserta/notifikasi" class="mb-0 font-weight-normal float-left dropdown-header">Notifikasi</p>
                            </a>
                        </div>
                    </li>
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                            <img src="<?= base_url('assets'); ?>/images/logo.png">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                            <a href="<?php echo base_url(); ?>peserta/profil" class="dropdown-item">
                                <i class="icon-head text-primary"></i>
                                Profil
                            </a>
                            <a href="<?php echo base_url(); ?>masuk/keluar" class="dropdown-item">
                                <i class="ti-power-off text-primary"></i>
                                Keluar
                            </a>
                        </div>
                    </li>
                    <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                        <span class="icon-menu"></span>
                    </button>
            </div>
        </nav>