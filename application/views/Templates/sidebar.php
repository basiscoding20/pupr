<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin') ?>">
    <div class="sidebar-brand-icon ">
    <i class="fas fa-code"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Admin</div>
  </a>
  <!-- Divider -->
  <hr class="sidebar-divider">
  <!-- Heading -->
  <div class="sidebar-heading ">
    Dashboard
  </div>
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('admin') ?>">
      <i class="fas fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>
  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('admin/profile') ?>">
      <i class="fas fa-user"></i>
      <span>User</span></a>
  </li>
  <hr class="sidebar-divider">
  <!-- Heading -->
  <div class="sidebar-heading">
    Master
  </div>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseone" aria-expanded="true" aria-controls="collapseone">
      <i class="fas fa-stream"></i>
      <span>Data Master</span></a>
    </a>
    <div id="collapseone" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="<?= base_url('admin/dataUser') ?>">Data User</a>
        <a class="collapse-item" href="<?= base_url('admin/dataDesa') ?>">Data Desa</a>
        <a class="collapse-item" href="<?= base_url('admin/dataJalan') ?>">Data Jalan</a>
        <a class="collapse-item" href="<?= base_url('Jasa_Kontruksi') ?>">Data Jasa Kontruksi</a>
      </div>
    </div>
  </li>
  <!-- Nav Item - Charts -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    PROYEK
  </div>
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-tasks"></i>
      <span>Proyek</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="<?= base_url('proyek') ?>">proyek</a>
      </div>
    </div>
  </li>

  <!-- Nav Item - Charts -->
  <hr class="sidebar-divider">
  <!-- Heading -->
  <div class="sidebar-heading">
    Addons
  </div>
  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="<?= base_url('pengaduan') ?>">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Pengaduan masyarakat</span></a>
  </li>
  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
