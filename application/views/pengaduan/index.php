<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
  <!-- DataTales Example -->
  <div class="card shadow  mb-4">
    <div class="card-header  py-3">
      <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr class="text-center">
              <th>#No</th>
              <th>Kd Pengaduan</th>
              <th>Nama Kontruksi</th>
              <th>Nama Masyarakat</th>
              <th>Email</th>
              <th>No telpon</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php $no=1; foreach ($pengaduan as $pengaduan): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $pengaduan['id_pengaduan'] ?></td>
                <td><?= $pengaduan['nama_jalan'] ?></td>
                <td><?= $pengaduan['nama_masyarakat'] ?></td>
                <td><?= $pengaduan['email'] ?></td>
                <td><?= $pengaduan['no_tlp'] ?></td>
                <td><a href="#"  data-toggle="modal" data-target="#modalPengaduan" class="badge badge-primary view" data-id="<?= $pengaduan['id_pengaduan'] ?>">View</a>
                  </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
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
