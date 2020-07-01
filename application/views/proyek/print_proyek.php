<!DOCTYPE html>
<html lang="en" dir="ltr"><head>
    <meta charset="utf-8">
    <title>Laporan Proyek</title>
    <style media="screen">
      .logo img {
        width: 70px;
        height: 70px;
        margin-top : -85px;
      }
      .proyek1 img {
        width: 120px;
        height: 120px;
        margin-left: 522px;
        margin-top : -340px;
      }
      .proyek2 img {
        width: 120px;
        height: 120px;
        margin-left: 522px;
        margin-top : -220px;
      }
      .proyek3 img {
        width: 120px;
        height: 120px;
        margin-left: 522px;
        margin-top : -100px;
      }
      center p{
        margin-top: -10px;
      }
      .isi{
        margin-bottom: 10px;
      }
      .jasa , th ,td{
        border: 1px solid black;
        width: 100%;
        border-collapse: collapse;
      }
    </style>
  </head><body>
    <center>
      <p>
         <b>LAPORAN PEKERJAAN PROYEK</b> <br>
        dinas pekerjaan umum dan penataan ruang <br>
         <small>Jl. Delima No.13, RT.4/RW.15, Lopang, Kec. Serang, Kota Serang, Banten 42111</small>
      </p>
      <hr>
    </center>
    <div class="logo">
      <img src="assets/img/serang.png" >
    </div>
      <div class="isi">
        <table  width="300px" class="isi">
          <tr>
            <td width="150px"><b>Kode Jalan</b></td>
            <td width="300px" >: <?= $jalan['id_jalan'] ?></td>
          </tr>
          <tr>
            <td><b>Nama Jalan</b></td>
            <td>: <?= $jalan['nama_jalan'] ?></td>
          </tr>
          <tr>
            <td><b>Nama Desa</b></td>
            <td>: <?= $jalan['nama_desa'] ?></td>
          </tr>
          <tr>
            <td><b>Panjang-Lebar</b></td>
            <td>: <?= $jalan['panjang'] ?><sup>m</sup> - <?= $jalan['lebar'] ?><sup>m</sup></td>
          </tr>
          <tr>
            <td><b>Pekerasan</b></td>
            <td>: <?= $jalan['pekerasan'] ?></td>
          </tr>
          <tr>
            <td><b>Kategori</b></td>
            <td>: <?= $proyek['kategori'] ?></td>
          </tr>
          <tr>
            <td><b>Tanggal Kontrak</b></td>
            <td>: <?= $proyek['tanggal_kontrak'] ?></td>
          </tr>
          <tr>
            <td><b>Akhir Kontrak</b></td>
            <td>: <?= $proyek['akhir_kontrak'] ?></td>
          </tr>
          <tr>
            <td><b>Pelaksanaan</b></td>
            <td>: <?= $proyek['pelaksanaan'] ?></td>
          </tr>
          <tr>
            <td><b>Sumber Dana</b></td>
            <td>: <?= $proyek['sumber_dana'] ?> tahun anggaran <?= $proyek['tahun_anggaran'] ?></td>
          </tr>
          <tr>
            <td><b>Anggaran</b></td>
            <td>: Rp. <?= $proyek['anggaran'] ?></td>
          </tr>
          <tr>
            <td><b>Jasa Kotruksi</b></td>
            <td>: <?= $proyek['nama_jasa'] ?></td>
          </tr>
          <tr>
            <td><b>Keterangan</b></td>
            <td>: <?= $proyek['keterangan'] ?></td>
          </tr>
        </table>
      </div>
      <div class="proyek1">
        <img src="assets/img/proyek/<?= $image[0]['image'] ?>" >
      </div>
      <div class="proyek2">
        <img src="assets/img/proyek/<?= $image[1]['image'] ?>" >
      </div>
      <div class="proyek3">
        <img src="assets/img/proyek/<?= $image[2]['image'] ?>" >
      </div>
  </body></html>
