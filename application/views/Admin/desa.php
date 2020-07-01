
<div class="container-fluid">
    <?= $this->session->flashdata('image'); ?>
    <?= form_error('kategori', '<div class="alert alert-danger" role="alert">','</div>'); ?>
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
              <th>Kd Desa</th>
              <th>Nama User</th>
              <th>Kecamatan</th>
              <th>Nama Desa</th>
              <th>Kantor Desa</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php $no=1; foreach ($desa as $desa): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $desa['id_desa'] ?></td>
                <td><?= $desa['nama'] ?></td>
                <td><?= $desa['kecamatan'] ?></td>
                <td><?= $desa['nama_desa'] ?></td>
                <td><?= $desa['alamat_kantor'] ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<!-- modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="modal-title">Modal title</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
<?= form_open_multipart('admin/dataUser');?>
    <input type="text" class="form-control" id="id_user" name="id_user" placeholder="Example input placeholder">
    <div class="form-group">
      <input type="text" class="form-control" id="nama" name="nama"  required>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="no_tlp" name="no_tlp"  required>
    </div>
    <div class="form-group">
      <input type="email" class="form-control" id="email" name="email"  required>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="password" name="password"  placeholder="Password">
    </div>
    <div class="form-group">
        <select class="form-control" id="aktif"name="aktif"  required>
            <option value="1">Aktif </option>
            <option value="0">Tidak aktif </option>
        </select>
    </div>
</div>
<div class="modal-footer">
<button type="submit"  class="btn btn-primary">Save changes</button>
</form>
</div>
</div>
</div>
</div>
