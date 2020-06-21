<div class="container-fluid">
    <button type="button"  class="btn btn-primary mb-2 tambah-data" data-toggle="modal" data-target="#exampleModal">
    Tambah Data
    </button>
    <?= $this->session->flashdata('image'); ?>
    <?= form_error('nama_jasa', '<div class="alert alert-danger" role="alert">','</div>'); ?>
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
              <th>Kd jasa</th>
              <th>Nama Jasa</th>
              <th>Alamat</th>
              <th>No telpon</th>
              <th>Email</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php $no=1; foreach ($jasa as $jasa): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $jasa['id_jasa'] ?></td>
                <td><?= $jasa['nama_jasa'] ?></td>
                <td><?= $jasa['alamat'] ?></td>
                <td><?= $jasa['no_tlp'] ?></td>
                <td><?= $jasa['email'] ?></td>
                <td><a href="#"  data-toggle="modal" data-target="#exampleModal" class="badge badge-primary update-data" data-id="<?= $jasa['id_jasa'] ?>">Update</a>
                  |<a href="<?= base_url("jasa_Kontruksi/hapus/".$jasa['id_jasa']) ?>" class="badge badge-danger" onclick="return confirm('Yakin?');">Hapus</a></td>
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
<?= form_open_multipart('jasa_Kontruksi');?>
    <input type="hidden" class="form-control" id="id_jasa" name="id_jasa" placeholder="Example input placeholder">
    <div class="form-group">
      <input type="text" class="form-control" id="nama_jasa" name="nama_jasa" placeholder="Nama Jasa Kontruksi" required>
    </div>
    <div class="form-group">
      <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" required>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat" required>
    </div>
    <div class="form-group">
      <input type="text" class="form-control" id="no_tlp" name="no_tlp" placeholder="Nomer telpon" required>
    </div>
</div>
<div class="modal-footer">
<button type="submit"  class="btn btn-primary">Save changes</button>
</form>
</div>
</div>
</div>
</div>
