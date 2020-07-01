
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
              <th>Nam User</th>
              <th>No telpon</th>
              <th>E mail</th>
              <th>Tgl buat</th>
              <th>akses</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php $no=1; foreach ($dataUser as $dataUser): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $dataUser['nama'] ?></td>
                <td><?= $dataUser['no_tlp'] ?></td>
                <td><?= $dataUser['email'] ?></td>
                <td><?= date('d F Y', $dataUser['date_created']);  ?></td>
                <td><?= $dataUser['akses'] ?></td>
                <td><a href="#"  data-toggle="modal" data-target="#exampleModal" class="badge badge-primary update-data" data-id="<?= $dataUser['id_user'] ?>">Update</a>
                  |<a href="<?= base_url("admin/deletUser/".$dataUser['id_user']) ?>" class="badge badge-danger" onclick="return confirm('Yakin?');">Hapus</a></td>
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
    <input type="hidden" class="form-control" id="id_user" name="id_user" placeholder="Example input placeholder">
    <div class="form-group">
      <input type="text" class="form-control" id="nama" name="nama"  required>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="no_tlp" name="no_tlp"  required>
    </div>
    <div class="form-group">
      <input type="email" class="form-control" id="email" name="email"  required readonly>
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
