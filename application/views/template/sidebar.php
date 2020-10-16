<!-- Page Wrapper -->
<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url("admin")?>">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Admin</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url("admin")?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider">
  <!-- Heading -->
    <div class="sidebar-heading">
    Data Rumah
  </div>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url("Data_Rumah")?>">
      <i class="fas fa-fw fa-table"></i>
      <span>Data Rumah</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url("Kategori")?>">
      <i class="fas fa-fw fa-table"></i>
      <span>Kategori Rumah</span></a>
  </li>

  <div class="sidebar-heading">
    Sistem
  </div>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url("")?>">
      <i class="fas fa-fw fa-table"></i>
      <span>Agency</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url("Profile")?>">
      <i class="fas fa-fw fa-table"></i>
      <span>Profile</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url("")?>">
      <i class="fas fa-fw fa-table"></i>
      <span>Akun Admin</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('auth/logout') ?>" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt"></i>
    <span>Logout</span></a>
  </li>

  

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->