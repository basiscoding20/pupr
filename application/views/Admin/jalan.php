<div class="container-fluid">
    <?= $this->session->flashdata('image'); ?>
    <?= form_error('nama_kontruksi', '<div class="alert alert-danger" role="alert">','</div>'); ?>
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
              <th>Kd Jalan</th>
              <th>Nama Jalan</th>
              <th>Nama Desa</th>
              <th>Panjang</th>
              <th>Lebar</th>
              <th>Pekerasan</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php $no=1; foreach ($jalan as $jalan): ?>
              <tr>
                <td><?= $jalan['id_jalan'] ?></td>
                <td><?= $jalan['nama_jalan'] ?></td>
                <td><?= $jalan['nama_desa'] ?></td>
                <td><?= $jalan['panjang'] ?><sup>m</sup></td>
                <td><?= $jalan['lebar'] ?><sup>m</sup></td>
                <td><?= $jalan['pekerasan'] ?></td>
                <td><a href="#"  data-toggle="modal" data-target="#exampleModal" class="badge badge-primary view" data-id="<?= $jalan['id_jalan'] ?>"><i class="fas fa-edit"></i></a>
                  </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- modal -->
<div class="modal fade bd-example-modal-lg " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="modal-title">Modal title</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
  <div class="row">
    <div class="col-md-8">
      <div class="form-group row">
        <div class="col-md-3">
          <label for="example-date-input" class=" form-label"> Jalan</label>
          </div>
        <div class="col-md-8">
          <div class="row">
            <div class="col-md-4">
              <label for="example-date-input" class=" form-label" id="id_jalan"></label>
            </div>
            <div class="col-md-8">
              <label for="example-date-input" class=" form-label" id="nama_jalan">Kode Jaladddddn</label>
            </div>
          </div>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-3">
          <label for="example-date-input" class=" form-label">Nama Desa</label>
          </div>
        <div class="col-md-5">
        <label for="example-date-input" class=" form-label" id="nama_desa">Nama Desa</label>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-3">
          <label for="example-date-input" class=" form-label">Panjang</label>
          </div>
        <div class="col-md-7">
        <label for="example-date-input" class=" form-label" id="panjang">panjang</label>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-3">
          <label for="example-date-input" class=" form-label">Lebar</label>
          </div>
        <div class="col-md-5">
        <label for="example-date-input" class=" form-label" id="lebar">Lebar</label>
        </div>
      </div>
      <div class="form-group row">
        <div class="col-md-3">
          <label for="example-date-input" class=" form-label">Pekerasan</label>
          </div>
        <div class="col-md-5">
        <label for="example-date-input" class=" form-label" id="pekerasan">Pekerasan</label>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="row">
        <div class="col-md-12 image1">
          <img src=""class="img-thumbnail" >
        </div>
    </div>
    <div class="row">
      <div class="col-md-12 image2">
        <img src=""class="img-thumbnail" >
      </div>
  </div>
    </div>
  </div>
</div>
</div>
</div>
</div>
