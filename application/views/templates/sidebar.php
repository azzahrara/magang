 <!-- partial -->
 <div class="container-fluid page-body-wrapper">
     <!-- partial:partials/_sidebar.html -->
     <nav class="sidebar sidebar-offcanvas" id="sidebar">
         <ul class="nav">
             <li class="nav-item ">
                 <a class="nav-link" href="<?= base_url(); ?>pegawai/dashboard">
                     <i class="icon-grid menu-icon"></i>
                     <span class="menu-title">Dashboard</span>
                 </a>
             </li>
             <li class="nav-item ">
                 <a class="nav-link" href="<?= base_url(); ?>pegawai/penugasan">
                     <i class="icon-paper menu-icon"></i>
                     <span class="menu-title">Penugasan</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                     <i class="menu-icon"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                             <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                         </svg></i>
                     <span class="menu-title">Data Peserta</span>
                     <i class="menu-arrow"></i>
                 </a>
                 <div class="collapse" id="ui-basic">
                     <ul class="nav flex-column sub-menu">
                         <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>pegawai/data_peserta">Peserta Bimbingan</a></li>
                         <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>pegawai/data_peserta/data_seluruh_peserta">Seluruh Peserta</a></li>
                     </ul>
                 </div>
             </li>
             <li class="nav-item">
                 <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                     <i class="ti-agenda menu-icon"></i>
                     <span class="menu-title">Data Laporan</span>
                     <i class="menu-arrow"></i>
                 </a>
                 <div class="collapse" id="icons">
                     <ul class="nav flex-column sub-menu">
                         <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>pegawai/laporan">Peserta Bimbingan</a></li>
                         <li class="nav-item"> <a class="nav-link" href="<?= base_url(); ?>pegawai/laporan/laporan_seluruh_peserta">Seluruh Peserta</a></li>
                     </ul>
                 </div>
             </li>
             <!-- <li class="nav-item">
                 <a class="nav-link" href="<?= base_url(); ?>pegawai/laporan">
                     <i class="ti-agenda menu-icon"></i>
                     <span class="menu-title">Data Laporan</span>
                 </a>
             </li> -->
         </ul>
     </nav>