<div class="container-fluid">
    <button type="button"  class="btn btn-primary mb-2 tambah-data" data-toggle="modal" data-target="#exampleModal">
    Tambah Data
    </button>
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
              <th>#No</th>
              <th>Kd Jalan</th>
              <th>Nama Jalan</th>
              <th>Panjang</th>
              <th>Lebar</th>
              <th>Pekerasan</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php $no=1; foreach ($jalan as $jalan): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $jalan['id_jalan'] ?></td>
                <td><?= $jalan['nama_jalan'] ?></td>
                <td><?= $jalan['panjang'] ?><sup>m</sup></td>
                <td><?= $jalan['lebar'] ?><sup>m</sup></td>
                <td><?= $jalan['pekerasan'] ?></td>
                <td><a href="#"  data-toggle="modal" data-target="#exampleModal" class="badge badge-primary update-data" data-id="<?= $jalan['id_jalan'] ?>"><i class="fas fa-edit"></i></a>
                  <a href="<?= base_url("jalan/hapusjalan/".$jalan['id_jalan']) ?>" class="badge badge-danger" onclick="return confirm('Yakin?');"><i class="fas fa-trash-alt"></i></a></td>
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
<?= form_open_multipart('jalan');?>
    <input type="hidden" class="form-control" id="id_jalan" name="id_jalan" placeholder="Example input placeholder">
    <input type="hidden" class="form-control" id="id_desa" name="id_desa" value="<?= $desa['id_desa'] ?>">
    <div class="form-group">
      <input type="text" class="form-control" id="nama_jalan" name="nama_jalan" placeholder="Nama Jalan" required>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="pekerasan" name="pekerasan" placeholder="Pekerasan" required>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <input type="text" class="form-control " id="panjang" name="panjang" placeholder="Panjang" required>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <input type="text" class="form-control" id="lebar" name="lebar" placeholder="Lebar" required>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
          <input type="text" class="form-control" id="latitude" name="latitude" placeholder="Latitude" required>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <input type="text" class="form-control" id="longitude" name="longitude" placeholder="Longitude" required>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-2">Image awal </div>
      <div class="col-sm-10">
        <div class="row">
        <div class="col-sm-3 oldImage1">
          <img src="<?= base_url('assets/img/jalan/default.png')?>"class="img-thumbnail" >
        </div>
        <div class="col-sm-9">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="image1" name="image1" >
            <label class="custom-file-label" for="image1">Choose file</label>
          </div>
        </div>
        </div>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-2">Image akhir </div>
      <div class="col-sm-10">
        <div class="row">
        <div class="col-sm-3 oldImage2">
          <img src="<?= base_url('assets/img/jalan/default.png')?>"class="img-thumbnail" >
        </div>
        <div class="col-sm-9">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="image2" name="image2" >
            <label class="custom-file-label" for="image2">Choose file</label>
          </div>
        </div>
        </div>
      </div>
    </div>
</div>
<div class="modal-footer">
<button type="submit"  class="btn btn-primary">Save changes</button>
</form>
</div>
</div>
</div>
</div>
