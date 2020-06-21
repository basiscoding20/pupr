-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jun 2020 pada 08.59
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pupr`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jasa_kontruksi`
--

CREATE TABLE `jasa_kontruksi` (
  `id_jasa` int(11) NOT NULL,
  `nama_jasa` varchar(128) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jasa_kontruksi`
--

INSERT INTO `jasa_kontruksi` (`id_jasa`, `nama_jasa`, `alamat`, `no_tlp`, `email`) VALUES
(1, 'cv. mahardika', 'pandeglang', '54678970', 'deniandiansyah40@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Gedung'),
(2, 'Jalan'),
(3, 'Irigasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontruksi`
--

CREATE TABLE `kontruksi` (
  `id_kontruksi` int(11) NOT NULL,
  `id_kategori` int(2) NOT NULL,
  `nama_kontruksi` varchar(128) NOT NULL,
  `luas` varchar(128) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kontruksi`
--

INSERT INTO `kontruksi` (`id_kontruksi`, `id_kategori`, `nama_kontruksi`, `luas`, `latitude`, `longitude`, `image`) VALUES
(47, 1, 'Graha Pancasila Pandeglang', '20000', '-6.310603', '106.106038', '2017-08-23.jpg'),
(48, 2, 'jln amd', '20000', '-6.320887', '106.116329', 'sasaaa.jpg'),
(49, 3, 'Irigasi Cibinuangen', '39999', '-6.800681', '105.906005', 'default.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan_masyarakat`
--

CREATE TABLE `pengaduan_masyarakat` (
  `id_pengaduan` int(11) NOT NULL,
  `id_kontruksi` varchar(12) NOT NULL,
  `nama_masyarakat` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `no_tlp` int(15) NOT NULL,
  `image` varchar(128) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengaduan_masyarakat`
--

INSERT INTO `pengaduan_masyarakat` (`id_pengaduan`, `id_kontruksi`, `nama_masyarakat`, `email`, `no_tlp`, `image`, `keterangan`) VALUES
(5, '49', 'deni', 'denias@rocketmail.com', 98765, 'client1.png', 'rusak'),
(6, '47', 'deni', 'denias@rocketmail.com', 345678, '2019-06-27.jpg', 'rusak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek`
--

CREATE TABLE `proyek` (
  `id_proyek` int(11) NOT NULL,
  `id_kontruksi` int(11) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `id_jasa` int(3) NOT NULL,
  `tanggal_kontrak` date NOT NULL,
  `akhir_kontrak` date NOT NULL,
  `pelaksanaan` date NOT NULL,
  `sumber_dana` varchar(50) NOT NULL,
  `tahun_anggaran` int(4) NOT NULL,
  `image1` varchar(128) NOT NULL,
  `image2` varchar(128) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `proyek`
--

INSERT INTO `proyek` (`id_proyek`, `id_kontruksi`, `kategori`, `id_jasa`, `tanggal_kontrak`, `akhir_kontrak`, `pelaksanaan`, `sumber_dana`, `tahun_anggaran`, `image1`, `image2`, `keterangan`) VALUES
(15, 47, 'Pembangunan', 1, '2020-06-02', '2020-06-02', '2020-06-02', 'desas', 2022, 'man1.jpg', 'man2.jpg', 'dede'),
(16, 47, 'Perbaikan', 1, '2020-06-01', '2020-07-11', '2020-06-02', 'kabupaten', 2020, '2018-02-21.jpg', '2019-06-27.jpg', 'Perbaikan lapang '),
(17, 48, 'Pelebaran', 1, '2020-06-01', '2020-07-11', '2020-06-09', 'provinsi', 2020, 'sasaaa.jpg', 'sada.jpg', 'pelabarang jalan Kiri 2m kanan 2m');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `kelamin` int(1) NOT NULL,
  `image` varchar(128) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `alamat` text NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `kelamin`, `image`, `no_tlp`, `email`, `password`, `alamat`, `date_created`) VALUES
(8, 'Deni andiansyah', 1, '20180828_163213.jpg', '089618840412', 'deniandiansyah40@gmail.com', '$2y$10$rqIZAzK8e2eHJbgKGB1dMe.RifnDQ1cnFjGmy9qZO6c4xhmX3Xebu', '', 1582478763),
(18, 'Rafka Fatir Mahendra', 1, 'IMG-20180726-WA0009.jpg', '098765434567', 'hejok4765@gmail.com', '$2y$10$Cl6PtmJFjmIwbf6rqItp8OGfjdnUA7osbCjAGCvOD3MDJ6aWWc9Sq', '', 1584880389),
(19, 'fikri zain', 1, 'default.jpg', '098765434567', 'fikrizain@yahoo.com', '$2y$10$bDOkgZHDxrejBEEyLptD6e8tX8rzjUIhA38tIga5JivD1eJHCpv.G', '', 1584881936);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_token`
--

CREATE TABLE `user_token` (
  `id_token` int(11) NOT NULL,
  `email` varchar(128) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jasa_kontruksi`
--
ALTER TABLE `jasa_kontruksi`
  ADD PRIMARY KEY (`id_jasa`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `kontruksi`
--
ALTER TABLE `kontruksi`
  ADD PRIMARY KEY (`id_kontruksi`);

--
-- Indeks untuk tabel `pengaduan_masyarakat`
--
ALTER TABLE `pengaduan_masyarakat`
  ADD PRIMARY KEY (`id_pengaduan`);

--
-- Indeks untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id_proyek`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id_token`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jasa_kontruksi`
--
ALTER TABLE `jasa_kontruksi`
  MODIFY `id_jasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kontruksi`
--
ALTER TABLE `kontruksi`
  MODIFY `id_kontruksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT untuk tabel `pengaduan_masyarakat`
--
ALTER TABLE `pengaduan_masyarakat`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
