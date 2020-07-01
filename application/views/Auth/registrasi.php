
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-lg-6">

        <div class="card o-hidden  border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row ">
              <div class=" col-md-12 ">
                <div class="p-2">
                  <div class="text-center">
                    <img src="<?= base_url('assets/img/serang.png') ?>" class="logo mb-2" alt="">
                  </div>
                  <?= $this->session->flashdata('pesan'); ?>
                  <form class="user" method="post" action="<?= base_url('Auth/registrasi') ?>" >
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="nama" name="nama" value="<?= set_value('nama'); ?>"  placeholder="Nama">
                      <?= form_error('nama','  <small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="no_tlp" name="no_tlp" value="<?= set_value('no_tlp'); ?>"  placeholder="Nomer telpon">
                      <?= form_error('no_tlp','  <small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" id="email" name="email" value="<?= set_value('email'); ?>"  placeholder="Enter Email Address...">
                      <?= form_error('email','  <small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="password" class="form-control form-control-user" id="password1" name="password1" placeholder="Password">
                          <?= form_error('password1','  <small class="text-danger pl-3">', '</small>'); ?>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Reapet Password">
                        </div>
                      </div>
                    </div>
                    <div class="row ">
                      <div class="col-lg-6 mb-1">
                        <button  class="btn btn-primary btn-user btn-block" type="submit">
                          Registrasi
                        </button>
                      </div>
                      <div class="col-lg-6 mb-1">
                          <a href="<?= base_url() ?>"class="btn btn-secondary btn-user btn-block">Home</a>
                      </div>
                    </div>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('Auth/registrasi') ?>">Registrasi</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('Auth/forget_password') ?>">Forgot Password?</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
