<div class="container-fluid">
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
              <th>No</th>
              <th>Nama Jalan</th>
              <th>Kategori</th>
              <th>Nama Jasa</th>
              <th>Tanggal Kontrak</th>
              <th>Akhir Kontrak</th>
              <th>Pelaksanaan</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php $no = 1;  foreach ($proyek_jalan as $proyek_jalan): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $proyek_jalan['nama_jalan'] ?></td>
                <td><?= $proyek_jalan['kategori'] ?></td>
                <td><?= $proyek_jalan['nama_jasa'] ?></td>
                <td><?= $proyek_jalan['tanggal_kontrak'] ?></td>
                <td><?= $proyek_jalan['akhir_kontrak'] ?></td>
                <td><?= $proyek_jalan['pelaksanaan'] ?></td>
                <td><a href="#"  data-toggle="modal" data-target="#exampleModal" class="badge badge-secondary view-proyek" data-id="<?= $proyek_jalan['id_proyek'] ?>">details</a></a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
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
