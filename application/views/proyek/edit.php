<div class="container-fluid">
    <?= $this->session->flashdata('image'); ?>
  <!-- DataTales Example -->
  <div class="col-md-12">
    <div class="card shadow  mb-5">
      <div class="card-header  py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
      </div>
      <div class="card-body">
          <?= form_open_multipart('proyek/edit');?>
          <input type="hidden" class="form-control form-control-sm" id="id_proyek" name="id_proyek" readonly value="<?= $proyek['id_proyek'] ?>">
          <div class="form-group">
            <div class="row">
              <div class="col-md-2 mb-1">
                <label for="formGroupExampleInput">kontruksi</label>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" id="id_kontruksi" name="id_kontruksi" readonly value="<?= $proyek['id_kontruksi'] ?>">
                  </div>
                  <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" id="nama_kontruksi" name="nama_kontruksi" readonly value="<?= $proyek['nama_kontruksi'] ?>">
                  </div>
                </div>
                <?= form_error('id_kontruksi', '<small class="text-danger pl-3">*','</small>'); ?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-2 mb-1">
                <label for="formGroupExampleInput">Jasa </label>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" id="id_jasa" name="id_jasa" readonly value="<?= $proyek['id_jasa']; ?>">
                  </div>
                  <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" id="nama_jasa" name="nama_jasa" readonly value="<?= $proyek['nama_jasa']; ?>">
                  </div>
                </div>
                <?= form_error('id_jasa', '<small class="text-danger pl-3">*','</small>'); ?>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-2">
              <label for="example-date-input" class=" form-label">Kategori</label>
              </div>
            <div class="col-md-5">
              <select class="form-control" id="kategori"name="kategori"  >
                  <option value="<?= $proyek['kategori'] ?>"><?= $proyek['kategori'] ?> </option>
                  <option value="Perbaikan">Perbaikan </option>
                  <option value="Pelebaran">Pelebaran </option>
                  <option value="Pembangunan">Pembangunan </option>
                  <option value="Penggantian">Penggantian </option>
              </select>
              <?= form_error('kategori', '<small class="text-danger pl-3">*','</small>'); ?>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-2">
              <label for="example-date-input" class=" form-label">Tanggal kontrak</label>
              </div>
            <div class="col-md-5">
              <input class="form-control" type="date"  id="tanggal_kontrak" name="tanggal_kontrak" value="<?= $proyek['tanggal_kontrak'] ?>">
              <?= form_error('tanggal_kontrak', '<small class="text-danger pl-3">*','</small>'); ?>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-2">
              <label for="example-date-input" class=" form-label">Akhir kontrak</label>
              </div>
            <div class="col-md-5">
              <input class="form-control" type="date"  id="akhir_kontrak" name="akhir_kontrak" value="<?= $proyek['akhir_kontrak'] ?>">
              <?= form_error('akhir_kontrak', '<small class="text-danger pl-3">*','</small>'); ?>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-2">
              <label for="example-date-input" class=" form-label">Pelaksanaan</label>
              </div>
            <div class="col-md-5">
              <input class="form-control" type="date"  id="pelaksanaan" name="pelaksanaan" value="<?= $proyek['pelaksanaan'] ?>">
              <?= form_error('pelaksanaan', '<small class="text-danger pl-3">*','</small>'); ?>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-2">
              <label for="example-date-input" class=" form-label">Sumber dana</label>
              </div>
            <div class="col-md-5">
              <input type="text" class="form-control form-control-sm" id="sumber_dana" name="sumber_dana"  value="<?= $proyek['sumber_dana'] ?>">
              <?= form_error('sumber_dana', '<small class="text-danger pl-3">*','</small>'); ?>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-2">
              <label for="example-date-input" class=" form-label">Tahun anggaran</label>
              </div>
            <div class="col-md-5">
              <input type="text" class="form-control form-control-sm" id="tahun_anggaran" name="tahun_anggaran" value="<?= $proyek['tahun_anggaran'] ?>">
              <?= form_error('tahun_anggaran', '<small class="text-danger pl-3">*','</small>'); ?>
            </div>
          </div>
          <div class="form-group row">
                <div class="col-md-2">Kondisi Awal</div>
                <div class="col-md-10">
                  <div class="row">
                  <div class="col-md-2 oldImage1">
                    <img src="<?= base_url("assets/img/proyek/".$proyek['image1']) ?>"class="img-thumbnail" >
                  </div>
                  <div class="col-md-4">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="image1" name="image1" >
                      <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                    <div class="col-md-2">Kondisi akhir</div>
                    <div class="col-md-10">
                      <div class="row">
                      <div class="col-md-2 oldImage2">
                        <img src="<?= base_url("assets/img/proyek/".$proyek['image2']) ?>"class="img-thumbnail" >
                      </div>
                      <div class="col-md-4">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="image2" name="image2" >
                          <label class="custom-file-label" for="image">Choose file</label>
                        </div>
                      </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-md-2">
                      <label for="example-date-input" class=" form-label">keterangan</label>
                      </div>
                    <div class="col-md-5">
                      <textarea class="form-control" id="keterangan" name="keterangan" rows="3"  ><?= $proyek['keterangan']; ?></textarea>
                    </div>
                  </div>
              <button type="submit"  class="btn btn-primary">Simpan Update</button>
          </form>
      </div>
    </div>
  </div>
</div>
