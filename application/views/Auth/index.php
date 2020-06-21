<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Viga&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <!-- Custom styles for this page -->
    <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">
    <link rel="icon" href="<?= base_url('assets/img/serang.png') ?>">
    <title><?= $title ?></title>
  </head>
  <body >

    <!-- navbar open -->
      <nav class="navbar shadow navbar-expand-lg navbar-light fixed-top  ">
        <div class="container">
          <a class="navbar-brand" href="<?= base_url() ?>">
            Pemerintah Kabupaten Serang
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav ">
              <li class="nav-item ">
                <a class="nav-link active" href="<?= base_url() ?>">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/pengaduan_masyarakat') ?>">Pengaduan Masyarakat</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-primary" id="tombol" href="<?= base_url('auth/login'); ?>">Login</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- nav close -->

      <div class="container container-Second">
        <div class="row ">
          <div class="col-xs-12  col-lg-8 col-md-12 mb-3">
            <div id="carouselExampleCaptions" class="carousel slide  " data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active shadow">
                  <img src="<?= base_url('assets/'); ?>img/1.jpg" class="d-block w-100" alt="...">

                </div>
                <div class="carousel-item">
                  <img src="<?= base_url('assets/'); ?>img/2.jpg" class="d-block w-100" alt="...">

                </div>
                <div class="carousel-item">
                  <img src="<?= base_url('assets/'); ?>img/4.jpg" class="d-block w-100" alt="...">

                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
          </div>
          <div class="col-xs-6  col-lg-4 col-md-12 mb-2 ">
            <div class="card card-info mb-3 shadow  bg-light">
              <div class="card-body text-center">
                  <img src="<?= base_url('assets/img/serang.png') ?>" class="logo" alt="">
                  <h5>Dinas Pekerjaan Umum Dan Penataan Ruang</h5>
              </div>
            </div>
          </div>
        </div>
        <div class="card card-content   border-0">
        <div class="list-group-item list-group-item-action active">
          <h5 class="mb-1"> <?= $title ?></h5>
        </div>
          <div class="card-body">
            <div class="row">
              <div class="col-xs-12  col-lg-8 col-md-12 ">
                <div class="card card-content-1 " id="card">
                  <div class="card-body">
                    <h2 class="card-title ">Special title treatment</h2>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  </div>
                </div>
                <?php
                  $queryKategori = "SELECT * FROM kategori";
                  $kategori = $this->db->query($queryKategori)->result_array();
                   ?>

                   <?php foreach ($kategori as $kategori): ?>
                    <div class="list-group list-kategori mt-4 mb-4 ">
                    <a href="<?= base_url('auth/kontruksi/'.$kategori['id_kategori']); ?>" class="list-group-item list-group-item-action active">
                        <h5 class="mb-1"><?= $kategori['kategori'] ?> <span class="float-right">&raquo;</span> </h5>
                    </a>

                    <?php
                      $queryKontruksi = "SELECT k.* FROM kontruksi k
                      JOIN kategori i ON k.id_kategori = i.id_kategori
                      WHERE i.id_kategori = ".$kategori['id_kategori']."
                      ORDER BY k.id_kontruksi ASC";
                      $kontruksi = $this->db->query($queryKontruksi)->result_array();
                       ?>
                    <?php foreach ($kontruksi as $kontruksi): ?>
                      <a href="<?= base_url("auth/view/".$kontruksi['id_kontruksi']) ?>" class=" list-group-item-action">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                          <?= $kontruksi['nama_kontruksi'] ?>
                        </li>
                      </a>
                    </div>
                    <?php endforeach; ?>
                   <?php endforeach; ?>
              </div>
              <div class="col-xs-6  col-lg-4 col-md-12 ">
                <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action active">
                  <h5 class="mb-1">List Pembanguan  </h5>
                </a>
                <?php foreach ($proyek as $proyek): ?>
                  <a href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                      <small class="text-muted"><?= $proyek['tanggal_kontrak']  ?></small>
                    </div>
                    <p class="mb-1"><?= $proyek['kategori'].' '.$proyek['nama_kontruksi'] ?></p>
                    <p class="mb-1">Nama Tender <?= $proyek['nama_jasa']?></p>
                    <small class="text-muted"><?= $proyek['pelaksanaan']  ?></small>
                  </a>
                <?php endforeach; ?>
              </div>
              </div>
            </div>
          </div>
        </div>
        <div class="footer text-center">
          <h5>copy rig'</h5>
        </div>
      </div>
      <!-- Image and text -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/'); ?>vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
    <script type="text/javascript">
    const x = document.getElementById('card').style;
      x.backgroundImage = "url('<?= base_url('assets/'); ?>img/1.jpg')";


    </script>
  </body>
</html>
