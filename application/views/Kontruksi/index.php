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
              <th>Kd Kontruksi</th>
              <th>Kategori</th>
              <th>Nama Kontruksi</th>
              <th>Luas</th>
              <th>Latitude</th>
              <th>Longitude</th>
              <th>Image</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php $no=1; foreach ($kontruksi as $kontruksi): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $kontruksi['id_kontruksi'] ?></td>
                <td><?= $kontruksi['kategori'] ?></td>
                <td><?= $kontruksi['nama_kontruksi'] ?></td>
                <td><?= $kontruksi['luas'] ?></td>
                <td><?= $kontruksi['latitude'] ?></td>
                <td><?= $kontruksi['longitude'] ?></td>
                <td width="100" >
                    <a href="#"><img src="<?= base_url('assets/img/kontruksi/'). $kontruksi['image'] ?>" class="img-thumbnail" ></a>
                </td>
                <td><a href="#"  data-toggle="modal" data-target="#exampleModal" class="badge badge-primary update-data" data-id="<?= $kontruksi['id_kontruksi'] ?>">Update</a>
                  |<a href="<?= base_url("kontruksi/hapusjalan/".$kontruksi['id_kontruksi']) ?>" class="badge badge-danger" onclick="return confirm('Yakin?');">Hapus</a></td>
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
<?= form_open_multipart('kontruksi');?>
    <input type="hidden" class="form-control" id="id_kontruksi" name="id_kontruksi" placeholder="Example input placeholder">
    <div class="form-group">
        <select class="form-control" id="kategori"name="kategori"  required>
            <option value="">Kategori </option>
            <?php foreach ($kategori as $kategori): ?>
              <option value="<?= $kategori['id_kategori'] ?>"><?= $kategori['kategori'] ?></option>
            <?php endforeach; ?>
        </select>
      </div>
    <div class="form-group">
      <input type="text" class="form-control" id="nama_kontruksi" name="nama_kontruksi" placeholder="Nama Kontruksi" required>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="luas" name="luas" placeholder="Luas kontruksi" required>
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
      <div class="col-sm-2">Image </div>
      <div class="col-sm-10">
        <div class="row">
        <div class="col-sm-3 oldImage">
          <img src="<?= base_url('assets/img/jalan/default.png')?>"class="img-thumbnail" >
        </div>
        <div class="col-sm-9">
          <div class="custom-file">
            <input type="file" class="custom-file-input" id="image" name="image" >
            <label class="custom-file-label" for="image">Choose file</label>
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
