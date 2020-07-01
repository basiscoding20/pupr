<div class="container-fluid">
    <a href="<?= base_url('proyek/input') ?>"  class="btn btn-primary mb-2 ">Input Baru</a>
    <a href="<?= base_url('proyek/input') ?>"  class="btn btn-warning mb-2 "><i class="fas fa-print"></i></a>
    <?= $this->session->flashdata('pesan'); ?>
    <?= $this->session->flashdata('image'); ?>
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
              <th>No</th>
              <th>Nama Jalan</th>
              <th>Kategori</th>
              <th>Nama Jasa</th>
              <th>Tanggal Kontrak</th>
              <th>Akhir Kontrak</th>
              <th>Pelaksanaan</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php $no = 1;  foreach ($proyek_jalan as $proyek_jalan): ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $proyek_jalan['nama_jalan'] ?></td>
                <td><?= $proyek_jalan['kategori'] ?></td>
                <td><?= $proyek_jalan['nama_jasa'] ?></td>
                <td><?= $proyek_jalan['tanggal_kontrak'] ?></td>
                <td><?= $proyek_jalan['akhir_kontrak'] ?></td>
                <td><?= $proyek_jalan['pelaksanaan'] ?></td>
                <td><a href="<?= base_url("proyek/edit/".$proyek_jalan['id_proyek']) ?>"class="badge badge-primary " ><i class="fas fa-edit"></i></a>
                <a href="<?= base_url("proyek/delete/".$proyek_jalan['id_proyek']) ?>" class="badge badge-danger" onclick="return confirm('Yakin?');"><i class="fas fa-trash-alt"></i></a>
                <a href="<?= base_url("proyek/print/".$proyek_jalan['id_proyek']) ?>" target="_blank" class="badge badge-warning"><i class="fas fa-print"></i></a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
