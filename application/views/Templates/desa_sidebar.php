<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('desa') ?>">
    <div class="sidebar-brand-icon ">
    <i class="fas fa-code"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Desa</div>
  </a>
  <!-- Divider -->
  <hr class="sidebar-divider">
  <!-- Heading -->
  <div class="sidebar-heading ">
    Dashboard
  </div>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('desa') ?>">
      <i class="fas fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('desa/dataProyek') ?>">
      <i class="fas fa-tasks"></i>
      <span>Proyek</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('desa/profile') ?>">
    <i class="fas fa-user"></i>
      <span>User</span></a>
  </li>
  <hr class="sidebar-divider">
  <!-- Heading -->
  <div class="sidebar-heading">
    Master
  </div>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsetree" aria-expanded="true" aria-controls="collapsetree">
      <i class="fas fa-stream"></i>
      <span>Master</span>
    </a>
    <div id="collapsetree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="<?= base_url('jalan') ?>">Data Jalan</a>
      </div>
    </div>
  </li>
  <!-- Nav Item - Charts -->
  <hr class="sidebar-divider">
  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
