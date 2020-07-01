<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
  <!-- DataTales Example -->
  <div class="col-md-12">
    <div class="card shadow  mb-5">
      <div class="card-header  py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
      </div>
      <div class="card-body">
          <?= form_open_multipart('jasa_Kontruksi/password');?>
          <input type="hidden" class="form-control form-control-sm" id="id_user" name="id_user" value="<?= $user['id_user'] ?>"  title="" readonly>
          <div class="form-group row">
            <div class="col-md-2">
              <label for="example-date-input" class=" form-label">Nama</label>
              </div>
            <div class="col-md-5">
              <label for="example-date-input" class=" form-label"><?= $user['nama'] ?></label>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-2">
              <label for="example-date-input" class=" form-label">Nomer Telpon</label>
              </div>
            <div class="col-md-5">
              <label for="example-date-input" class=" form-label"><?= $user['no_tlp'] ?></label>
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
          <div class="form-group row">
            <div class="col-md-2">
              <label for="example-date-input" class=" form-label">Password</label>
              </div>
            <div class="col-md-5">
              <div class="row">
                <div class="col-md-6">
                  <input type="password" class="form-control form-control-sm" id="password1" name="password1" >
                </div>
                <div class="col-md-6">
                  <input type="password" class="form-control form-control-sm" id="password2" name="password2" >
                </div>
              </div>
              <?= form_error('password1','  <small class="text-danger pl-3">', '</small>'); ?>
            </div>
          </div>
              <button type="submit"  class="btn btn-primary">Simpan</button>
          </form>
      </div>
    </div>
  </div>
</div>
