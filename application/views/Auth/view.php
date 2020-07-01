<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>
    <link href="<?= base_url('assets/'); ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Viga&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/'); ?>css/style.css">
    <link rel="icon" href="<?= base_url('assets/img/serang.png') ?>">
    <style media="screen">
  </style>
    <title><?= $title ?></title>
  </head>
  <body class="bg-light">
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
        <div class="card card-content   border-0">
        <div class="list-group-item list-group-item-action active">
          <h5 class="mb-1">Home &raquo; <?= $title ?></h5>
        </div>
          <div class="card-body">
                <div class="row mb-2">
                  <div class="col-sm-8">
                    <div class="table-responsive">
                      <table class="table table-bordered p-0">
                      <tbody>
                        <tr>
                          <th scope="row">Kode Jalan</th>
                          <td colspan="3"><?= $header['id_jalan'] ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Nama Jalan</th>
                          <td colspan="3"><?= $header['nama_jalan'] ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Desa</th>
                          <td colspan="3"><?= $header['nama_desa'] ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Panjang</th>
                          <td ><?= $header['panjang'] ?></td>
                          <th >Lebar</th>
                          <td><?= $header['lebar'] ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Pekerasan</th>
                          <td colspan="3"><?= $header['pekerasan'] ?></td>
                        </tr>
                        <tr>
                          <th scope="row">Latitude</th>
                          <td ><?= $header['latitude'] ?></td>
                          <th >Longitude</th>
                          <td><?= $header['longitude'] ?></td>
                        </tr>
                      </tbody>
                    </table>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="card-body " id="map">
                    </div>
                  </div>
                </div>
                <div class="card mb-2">
                <h5 class="card-header bg-grey text-white">Perubahan kondisi</h5>
                  <div class="table-responsive">
                    <table class="table ">
                      <thead>
                        <tr>
                          <th scope="col">Kd proyek</th>
                          <th scope="col">kategori</th>
                          <th scope="col">nama Jasa</th>
                          <th scope="col">tanggal_kontrak</th>
                          <th scope="col">Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php  foreach ($proyek as $proyek): ?>
                        <tr>
                          <td><?= $proyek['id_proyek'] ?></td>
                          <td><?= $proyek['kategori'] ?></td>
                          <td><?= $proyek['nama_jasa'] ?></td>
                          <td><?= $proyek['tanggal_kontrak'] ?></td>
                          <td><a href="#"  data-toggle="modal" data-target="#exampleModal" class="badge badge-secondary view-proyek" data-id="<?= $proyek['id_proyek'] ?>">details</a></td>
                        </tr>
                      <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
              </div>
              <div class="card">
              <h5 class="card-header bg-grey text-white">Pengaduan Masyarkat</h5>
                <div class="table-responsive">
                  <table class="table ">
                    <thead>
                      <tr>
                        <th scope="col">Kd Pengaduan</th>
                        <th scope="col">Nama Masyarkat</th>
                        <th scope="col">Email</th>
                        <th scope="col">No telpon</th>
                        <th scope="col">Opsi</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php  foreach ($pengaduan_masyarakat as $pengaduan_masyarakat): ?>
                      <tr>
                        <td><?= $pengaduan_masyarakat['id_pengaduan'] ?></td>
                        <td><?= $pengaduan_masyarakat['nama_masyarakat'] ?></td>
                        <td><?= $pengaduan_masyarakat['email'] ?></td>
                        <td><?= $pengaduan_masyarakat['no_tlp'] ?></td>
                        <td><a href="#"  data-toggle="modal" data-target="#modalPengaduan" class="badge badge-secondary view-pengaduan" data-id="<?= $pengaduan_masyarakat['id_pengaduan'] ?>">details</a></td>
                      </tr>
                    <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
            </div>
          </div>
        </div>
        <div class="footer text-center">
          <h5>copy rig'</h5>
        </div>
      </div>
      <!-- modal -->
      <div class="modal fade bd-example-modal-lg " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="modal-title">Detail</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-bordered p-0">
          <tbody>
            <tr>
              <th scope="row">Kode Proyek</th>
              <td colspan="3" id="id_proyek"></td>
            </tr>
            <tr>
              <th scope="row">Kategori</th>
              <td colspan="3" id="kategori"></td>
            </tr>
            <tr>
              <th scope="row">Nama Jasa</th>
              <td colspan="3" id="nama_jasa"></td>
            </tr>
            <tr>
              <th scope="row">Tanggal Kontrak</th>
              <td  id="tanggal_kontrak"></td>
              <th >Akhir Kontrak</th>
              <td id="akhir_kontrak"></td>
            </tr>
            <tr>
              <th scope="row">Pelaksanaan</th>
              <td id="pelaksanaan" ></td>
              <th >Tahun Anggaran</th>
              <td id="tahun_anggaran"></td>
            </tr>
            <tr>
              <th scope="row">Total anggaran</th>
              <td colspan="3" id="anggaran"></td>
            </tr>
            <tr>
              <th scope="row">Keterangan</th>
              <td colspan="3" id="keterangan"></td>
            </tr>
          </tbody>
        </table>
        </div>
        <div class="row">
          <div class="col-md-4 image1">
            <label for=""></label>
            <div class="form-group">
              <img src=""class="img-thumbnail" >
            </div>
          </div>
          <div class="col-md-4 image2">
            <label for=""></label>
            <div class="form-group">
              <img src=""class="img-thumbnail" >
            </div>
          </div>
          <div class="col-md-4 image3">
            <label for=""></label>
            <div class="form-group">
              <img src=""class="img-thumbnail" >
            </div>
          </div>
        </div>
      </div>
      </div>
      </div>
      </div>

      <!-- modal -->
      <div class="modal fade bd-example-modal-lg " id="modalPengaduan" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
      <div class="modal-content">
      <div class="modal-header">
      <h5 class="modal-title" id="modal-title">Pengaduan Masyarkat</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>
      <div class="modal-body">
        <div class="table-responsive">
          <table class="table table-bordered p-0">
          <tbody>
            <tr>
              <th scope="row">Kode Pengaduan</th>
              <td colspan="3" id="id_pengaduan"></td>
            </tr>
            <tr>
              <th scope="row">Nama Masyarkat</th>
              <td colspan="3" id="nama_masyarakat"></td>
            </tr>
            <tr>
              <th scope="row">E-mail</th>
              <td  id="email"></td>
              <th >Nomer telpon</th>
              <td id="no_tlp"></td>
            </tr>
            <tr>
              <th scope="row">Keterangan</th>
              <td colspan="3" id="ket"></td>
            </tr>
          </tbody>
        </table>
        </div>
          <div class="image d-flex justify-content-center">
            <div class="form-group">
              <img src=""class="img-thumbnail" >
            </div>
          </div>
      </div>
      </div>
      </div>
      </div>

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
    <script src="<?= base_url('assets/'); ?>js/demo/datatables-demo.js"></script>
    <script src="<?= base_url('assets/js/'.$script); ?>"></script>

  </body>
</html>
