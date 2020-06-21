<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
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

  <!-- Nav Item - Charts -->
  <li class="nav-item">
    <a class="nav-link" href="">
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
        <a class="collapse-item" href="<?= base_url('Kategori') ?>">Data Kategori</a>
        <a class="collapse-item" href="<?= base_url('Kontruksi') ?>">Data kontruksi</a>
        <a class="collapse-item" href="<?= base_url('Jasa_Kontruksi') ?>">Data Jasa kontruksi</a>
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
    <a class="nav-link" href="<?= base_url('respon_masyarakat') ?>">
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
