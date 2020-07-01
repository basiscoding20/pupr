-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2020 pada 15.17
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
-- Struktur dari tabel `desa`
--

CREATE TABLE `desa` (
  `id_desa` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kecamatan` int(3) NOT NULL,
  `nama_desa` varchar(128) NOT NULL,
  `alamat_kantor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `desa`
--

INSERT INTO `desa` (`id_desa`, `id_user`, `id_kecamatan`, `nama_desa`, `alamat_kantor`) VALUES
(3, 27, 2, 'petir', 'petirs'),
(6, 32, 2, 'dede', 'dasfafas'),
(7, 33, 1, 'kadu jojor', 'jln kadu jojor number 4 '),
(8, 34, 1, 'sumur', 'deahdasldk');

-- --------------------------------------------------------

--
-- Struktur dari tabel `image`
--

CREATE TABLE `image` (
  `id_image` int(128) NOT NULL,
  `id_proyek` varchar(128) NOT NULL,
  `progres` varchar(15) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `image`
--

INSERT INTO `image` (`id_image`, `id_proyek`, `progres`, `image`) VALUES
(31, 'P0200626001', 'Progres 0%', 'client2.png'),
(32, 'P0200626001', 'Progres 50%', 'man2.jpg'),
(33, 'P0200626001', 'Progres 100%', 'client3.png'),
(37, 'P0200626002', 'Progres 0%', 'man1.jpg'),
(38, 'P0200626002', 'Progres 50%', 'man21.jpg'),
(39, 'P0200626002', 'Progres 100%', 'man3.jpg'),
(40, 'P0200628001', 'Progres 0%', 'ss.jpg'),
(41, 'P0200628001', 'Progres 50%', '2019-06-27.jpg'),
(42, 'P0200628001', 'Progres 100%', 'asasa.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jalan`
--

CREATE TABLE `jalan` (
  `id_jalan` int(11) NOT NULL,
  `id_desa` int(4) NOT NULL,
  `nama_jalan` varchar(128) NOT NULL,
  `panjang` varchar(20) NOT NULL,
  `lebar` varchar(20) NOT NULL,
  `pekerasan` varchar(128) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `image1` varchar(128) NOT NULL,
  `image2` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jalan`
--

INSERT INTO `jalan` (`id_jalan`, `id_desa`, `nama_jalan`, `panjang`, `lebar`, `pekerasan`, `latitude`, `longitude`, `image1`, `image2`) VALUES
(55, 3, 'Jl. Yusuf Martadilaga', '20.000', '12.000', 'beton', '-6.121554', '106.155053', '2019-06-27.jpg', 's.jpg'),
(56, 3, 'Jl. Ki Masjong', '40.000', '20.000', 'hotmik', '-6.117841', '106.152273', 'asasa.jpg', '2017-08-23.jpg'),
(58, 6, 'Jl. Nasional 1', '21.314.312', '312.414', 'hotmik beton', '-6.096435', '106.166308', 'asasa1.jpg', '2017-08-231.jpg'),
(59, 6, 'Jl. Bumi Agung II', '3.214.325', '32.131', 'hotmik', '-6.102228', '106.169683', 'client2.png', 'client3.png'),
(60, 8, 'jalur baros', '300.000', '200.000', 'beton ', '432567', '3245', '2019-06-271.jpg', 'default.png');

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
(1, 'cv. mahardika', 'pandeglang', '54678970', 'deniandiansyah40@gmail.com'),
(2, 'cv. jaya kusuma', ', Unyur, Kec. Serang, Kota Serang, Banten 42111', '09876543', 'cvjaya@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `kecamatan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `kecamatan`) VALUES
(1, 'baros'),
(2, 'cikesal');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaduan_masyarakat`
--

CREATE TABLE `pengaduan_masyarakat` (
  `id_pengaduan` int(11) NOT NULL,
  `id_jalan` varchar(12) NOT NULL,
  `nama_masyarakat` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `no_tlp` int(15) NOT NULL,
  `image` varchar(128) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengaduan_masyarakat`
--

INSERT INTO `pengaduan_masyarakat` (`id_pengaduan`, `id_jalan`, `nama_masyarakat`, `email`, `no_tlp`, `image`, `keterangan`) VALUES
(9, '59', 'deni', 'denias@rocketmail.com', 987, 'asasa2.jpg', 'ruksak'),
(10, '55', 'ddd', 'deniandiansyah40@gmail.com', 9876, 'asasa3.jpg', 'ruksak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek`
--

CREATE TABLE `proyek` (
  `id_proyek` varchar(25) NOT NULL,
  `id_jalan` int(11) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `id_jasa` int(3) NOT NULL,
  `tanggal_kontrak` date NOT NULL,
  `akhir_kontrak` date NOT NULL,
  `pelaksanaan` date NOT NULL,
  `sumber_dana` varchar(50) NOT NULL,
  `anggaran` varchar(20) NOT NULL,
  `tahun_anggaran` int(4) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `proyek`
--

INSERT INTO `proyek` (`id_proyek`, `id_jalan`, `kategori`, `id_jasa`, `tanggal_kontrak`, `akhir_kontrak`, `pelaksanaan`, `sumber_dana`, `anggaran`, `tahun_anggaran`, `keterangan`) VALUES
('P0200626001', 55, 'Pelebaran', 2, '2020-06-02', '2020-06-03', '2020-06-04', 'gggg', '66.666.666', 2023, 'dddd'),
('P0200626002', 58, 'Perbaikan', 1, '2020-06-01', '2020-06-02', '2020-06-30', 'desa', '23.457.689', 2020, 'dasdasd'),
('P0200628001', 60, 'Pelebaran', 2, '2020-05-31', '2020-07-11', '2020-06-01', 'desa', '40.000.000', 2020, 'pelabran jalan kiri 1 meter kana 1 meter');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL,
  `aktif` int(1) NOT NULL,
  `akses` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `no_tlp`, `email`, `password`, `date_created`, `aktif`, `akses`) VALUES
(18, 'Rafka Fatir Mahendra', '098765434567', 'hejok4765a@gmail.com', '$2y$10$Cl6PtmJFjmIwbf6rqItp8OGfjdnUA7osbCjAGCvOD3MDJ6aWWc9Sq', 1584880389, 1, 1),
(27, 'Deni andiansyah', '089618840412', 'deniandiansyah40@gmail.com', '$2y$10$N2noauWXbBgBjJeQ5lnwu.DHfYSpPegK.9L5yvoEVgAMnhSdvvYxm', 1592817802, 1, 3),
(32, 'dede', '223', 'hejok4765s@gmail.com', '$2y$10$s7kIy85ap5WFxbbc3euFS.VrsQmLMYY83EZaEQu486ZIaSbf/1EiC', 1592906481, 1, 3),
(33, 'faizal ardian', '09876543', 'hejok4765b@gmail.com', '$2y$10$4vjTISKlEuaXyW5.PgY3KOtWw/BOauJzYIG.tdcWCZuMxRI0DmeIS', 1593095825, 1, 3),
(34, 'waluyo', '09876543', 'hejok4765@gmail.com', '$2y$10$9rCQtWoHuy9MWo3sFn7euezbN7iH0Z0tJLVMrTcqhLHj2VpfmKaNq', 1593349619, 1, 3);

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
-- Indeks untuk tabel `desa`
--
ALTER TABLE `desa`
  ADD PRIMARY KEY (`id_desa`);

--
-- Indeks untuk tabel `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id_image`);

--
-- Indeks untuk tabel `jalan`
--
ALTER TABLE `jalan`
  ADD PRIMARY KEY (`id_jalan`);

--
-- Indeks untuk tabel `jasa_kontruksi`
--
ALTER TABLE `jasa_kontruksi`
  ADD PRIMARY KEY (`id_jasa`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

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
-- AUTO_INCREMENT untuk tabel `desa`
--
ALTER TABLE `desa`
  MODIFY `id_desa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `image`
--
ALTER TABLE `image`
  MODIFY `id_image` int(128) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT untuk tabel `jalan`
--
ALTER TABLE `jalan`
  MODIFY `id_jalan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `jasa_kontruksi`
--
ALTER TABLE `jasa_kontruksi`
  MODIFY `id_jasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengaduan_masyarakat`
--
ALTER TABLE `pengaduan_masyarakat`
  MODIFY `id_pengaduan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id_token` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
