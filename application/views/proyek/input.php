<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <?= $this->session->flashdata('image'); ?>
  <!-- DataTales Example -->
  <div class="col-md-12">
    <div class="card shadow  mb-5">
      <div class="card-header  py-3">
        <h6 class="m-0 font-weight-bold text-primary"><?= $title ?></h6>
      </div>
      <div class="card-body">
          <?= form_open_multipart('proyek/input');?>
          <div class="form-group">
            <div class="row">
              <div class="col-md-2 mb-1">
                <label for="formGroupExampleInput">Pilih kontruksi</label>
                <a href="#"  data-toggle="modal" data-target="#exampleModal" class="badge badge-primary " ><i class="fas fa-search"></i></a>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" id="id_kontruksi" name="id_kontruksi" readonly value="<?= set_value('id_kontruksi'); ?>">
                  </div>
                  <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" id="nama_kontruksi" name="nama_kontruksi" readonly value="<?= set_value('nama_kontruksi'); ?>">
                  </div>
                </div>
                <?= form_error('id_kontruksi', '<small class="text-danger pl-3">*','</small>'); ?>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="row">
              <div class="col-md-2 mb-1">
                <label for="formGroupExampleInput">Pilih jasa</label>
                <a href="#"  data-toggle="modal" data-target="#modalVendor" class="badge badge-primary " ><i class="fas fa-search"></i></a>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-sm-2">
                    <input type="text" class="form-control form-control-sm" id="id_jasa" name="id_jasa" readonly value="<?= set_value('id_jasa'); ?>">
                  </div>
                  <div class="col-sm-8">
                    <input type="text" class="form-control form-control-sm" id="nama_jasa" name="nama_jasa" readonly value="<?= set_value('nama_jasa'); ?>">
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
                  <option value="">Kategori </option>
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
              <input class="form-control" type="date"  id="tanggal_kontrak" name="tanggal_kontrak" value="<?= set_value('tanggal_kontrak'); ?>">
              <?= form_error('tanggal_kontrak', '<small class="text-danger pl-3">*','</small>'); ?>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-2">
              <label for="example-date-input" class=" form-label">Akhir kontrak</label>
              </div>
            <div class="col-md-5">
              <input class="form-control" type="date"  id="akhir_kontrak" name="akhir_kontrak" value="<?= set_value('akhir_kontrak'); ?>">
              <?= form_error('akhir_kontrak', '<small class="text-danger pl-3">*','</small>'); ?>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-2">
              <label for="example-date-input" class=" form-label">Pelaksanaan</label>
              </div>
            <div class="col-md-5">
              <input class="form-control" type="date"  id="pelaksanaan" name="pelaksanaan" value="<?= set_value('pelaksanaan'); ?>">
              <?= form_error('pelaksanaan', '<small class="text-danger pl-3">*','</small>'); ?>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-2">
              <label for="example-date-input" class=" form-label">Sumber dana</label>
              </div>
            <div class="col-md-5">
              <input type="text" class="form-control form-control-sm" id="sumber_dana" name="sumber_dana"  value="<?= set_value('sumber_dana'); ?>">
              <?= form_error('sumber_dana', '<small class="text-danger pl-3">*','</small>'); ?>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-md-2">
              <label for="example-date-input" class=" form-label">Tahun anggaran</label>
              </div>
            <div class="col-md-5">
              <input type="number" class="form-control form-control-sm" max="2090" min="2020" id="tahun_anggaran" name="tahun_anggaran" value="<?= set_value('tahun_anggaran'); ?>">
              <?= form_error('tahun_anggaran', '<small class="text-danger pl-3">*','</small>'); ?>
            </div>
          </div>
          <div class="form-group row">
                <div class="col-md-2">Kondisi Awal</div>
                <div class="col-md-10">
                  <div class="row">
                  <div class="col-md-2 oldImage1">
                    <img src="<?= base_url('assets/img/proyek/default.png')?>"class="img-thumbnail" >
                  </div>
                  <div class="col-md-4">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="image1" name="image1" required>
                      <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                  </div>
                  </div>
                </div>
              </div>
              <div class="form-group row">
                    <div class="col-md-2">Kondisi Ahir</div>
                    <div class="col-md-10">
                      <div class="row">
                      <div class="col-md-2 oldImage2">
                        <img src="<?= base_url('assets/img/proyek/default.png')?>"class="img-thumbnail" >
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
                      <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                    </div>
                  </div>

                      <button type="submit"  class="btn btn-primary">Simpan</button>
          </form>
      </div>
    </div>
  </div>
</div>
<!-- modal -->
<div class="modal fade  " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg ">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="modal-title">Modal title</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
  <div class="table-responsive">
    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
      <thead>
        <tr class="text-center">
          <th>Kd jalan</th>
          <th>Nama Ruas</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <?php $no=1; foreach ($kontruksi as $kontruksi): ?>
          <tr>
            <td><?= $kontruksi['id_kontruksi'] ?></td>
            <td><?= $kontruksi['nama_kontruksi'] ?></td>
            <td><a href="#"   class="badge badge-primary pilih-data" data-id="<?= $kontruksi['id_kontruksi'] ?>" data-nama="<?= $kontruksi['nama_kontruksi'] ?>" data-dismiss="modal">Pilih</a></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
</div>

<div class="modal fade  " id="modalVendor" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg ">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title" id="modal-title">Pilih jasa kontruksi</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
  <div class="table-responsive">
    <table class="table table-striped display"  width="100%" cellspacing="0">
      <thead>
        <tr class="text-center">
          <th>Kd</th>
          <th>Nama </th>
          <th>NO telp</th>
          <th>Opsi</th>
        </tr>
      </thead>
      <tbody class="text-center">
        <?php $no=1; foreach ($jasa_kontruksi as $jasa_kontruksi): ?>
          <tr>
            <td><?= $jasa_kontruksi['id_jasa'] ?></td>
            <td><?= $jasa_kontruksi['nama_jasa'] ?></td>
            <td><?= $jasa_kontruksi['no_tlp'] ?></td>
            <td><a href="#"   class="badge badge-primary pilih-data-kontruksi" data-id="<?= $jasa_kontruksi['id_jasa'] ?>" data-nama="<?= $jasa_kontruksi['nama_jasa'] ?>" data-dismiss="modal">Pilih</a></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
</div>
