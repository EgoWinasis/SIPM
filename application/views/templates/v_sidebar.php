   <!-- Sidebar -->
   <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

       <!-- Sidebar - Brand -->
       <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
           <div class="sidebar-brand-icon rotate-n-15">
               <i class="fas fa-2x fa-fingerprint"></i>
           </div>
           <div class="sidebar-brand-text mx-3">
               <h2>SIPM</h2>
           </div>
       </a>

       <!-- Divider -->
       <hr class="sidebar-divider my-0">

       <!-- Nav Item - Dashboard -->
       <li class="nav-item <?php if($this->uri->segment(2) == '') echo 'active' ?>">
           <a class="nav-link" href="<?= base_url() ?>">
               <i class="fas fa-fw fa-tachometer-alt"></i>
               <span>Dashboard</span></a>
       </li>

       <!-- Divider -->
       <hr class="sidebar-divider">

       <!-- Heading -->
       <div class="sidebar-heading">
           Interface
       </div>

       <!-- Nav Item - Pages Collapse Menu -->
       
       <li class="nav-item <?php if($this->uri->segment(2) == 'mahasiswa') echo 'active' ?>">
           <a class="nav-link" href="<?= base_url('mahasiswa') ?>">
               <i class="fas fa-fw fa-user"></i>
               <span>Data Mahasiswa</span></a> 
       </li>

       <!-- Nav Item - Utilities Collapse Menu -->
       <!-- Nav Item - Pages Collapse Menu -->
       <li class="nav-item <?php if($this->uri->segment(2) == 'presensi') echo 'active' ?>">
           <a class="nav-link" href="<?= base_url('presensi/presensi') ?>">
               <i class="fas fa-fw fa-book"></i>
               <span>Data Presensi</span></a>
       </li>





       <!-- Divider -->
       <hr class="sidebar-divider d-none d-md-block">

       <!-- Sidebar Toggler (Sidebar) -->
       <div class="text-center d-none d-md-inline">
           <button class="rounded-circle border-0" id="sidebarToggle"></button>
       </div>


   </ul>
   <!-- End of Sidebar -->