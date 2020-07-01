<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
  <!-- DataTales Example -->
  <div class="col-md-12">
    <div class="card shadow  mb-5">
      <div class="card-header  py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
      </div>
      <div class="card-body">
          <?= form_open_multipart('admin/profile');?>
          <input type="hidden" class="form-control form-control-sm" id="id_user" name="id_user" value="<?= $user['id_user'] ?>"  title="" required>
          <div class="form-group row">
            <div class="col-md-2">
              <label for="example-date-input" class=" form-label">Nama</label>
              </div>
            <div class="col-md-5">
              <input type="text" class="form-control form-control-sm" id="nama" name="nama" value="<?= $user['nama'] ?>"  title="Nama user" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-2">
              <label for="example-date-input" class=" form-label">Nomer Telpon</label>
              </div>
            <div class="col-md-5">
              <input type="text" class="form-control form-control-sm" id="no_tlp" name="no_tlp" value="<?= $user['no_tlp'] ?>"  title="Nomer Telpon" required>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-2">
              <label for="example-date-input" class=" form-label">Email</label>
              </div>
            <div class="col-md-5">
              <label for="example-date-input" class=" form-label"><?= $user['email'] ?></label>
            </div>
          </div>
              <button type="submit"  class="btn btn-primary">Simpan</button>
          </form>
      </div>
    </div>
  </div>
</div>
