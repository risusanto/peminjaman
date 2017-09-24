-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 14 Sep 2017 pada 15.23
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `peminjaman`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `amunisi`
--

CREATE TABLE IF NOT EXISTS `amunisi` (
`no_amunisi` int(10) NOT NULL,
  `kesatuan` varchar(36) DEFAULT NULL,
  `merk` varchar(255) DEFAULT NULL,
  `caliber` varchar(20) DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL,
  `kondisi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `amunisi`
--

INSERT INTO `amunisi` (`no_amunisi`, `kesatuan`, `merk`, `caliber`, `jumlah`, `kondisi`) VALUES
(1, 'adadasd', 'adasdasdasd', 'dasdasda', 1111, 'asasasas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita_acara`
--

CREATE TABLE IF NOT EXISTS `berita_acara` (
`no_ba` bigint(20) NOT NULL,
  `id_pemohon` bigint(20) DEFAULT NULL,
  `no_senpi` int(10) DEFAULT NULL,
  `no_amunisi` int(10) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1101 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `berita_acara`
--

INSERT INTO `berita_acara` (`no_ba`, `id_pemohon`, `no_senpi`, `no_amunisi`) VALUES
(1100, 4, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pemohon`
--

CREATE TABLE IF NOT EXISTS `data_pemohon` (
  `nrp` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `pangkat` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `kesatuan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_pemohon`
--

INSERT INTO `data_pemohon` (`nrp`, `nama`, `pangkat`, `jabatan`, `kesatuan`) VALUES
('asas', 'rezi apriliansyah', 'manager', 'as', 'sa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemohon`
--

CREATE TABLE IF NOT EXISTS `pemohon` (
`id_pemohon` bigint(20) NOT NULL,
  `kelengkapan` varchar(255) DEFAULT NULL,
  `jumlah_amunisi` int(10) DEFAULT NULL,
  `no_senpi` int(20) DEFAULT NULL,
  `status` enum('1','0') NOT NULL,
  `nrp` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `pemohon`
--

INSERT INTO `pemohon` (`id_pemohon`, `kelengkapan`, `jumlah_amunisi`, `no_senpi`, `status`, `nrp`) VALUES
(4, 'sdsd', 2, 1, '1', 'asas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role`
--

CREATE TABLE IF NOT EXISTS `role` (
`id_role` tinyint(4) NOT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `role`
--

INSERT INTO `role` (`id_role`, `role`) VALUES
(1, 'admin'),
(2, 'kabag_sumda'),
(3, 'admin-gudang'),
(4, 'pemohon');

-- --------------------------------------------------------

--
-- Struktur dari tabel `senjata_api`
--

CREATE TABLE IF NOT EXISTS `senjata_api` (
`no_senpi` int(10) NOT NULL,
  `jenis` varchar(36) DEFAULT NULL,
  `merk` varchar(255) DEFAULT NULL,
  `kaliber` varchar(20) DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL,
  `kondisi` varchar(20) DEFAULT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `senjata_api`
--

INSERT INTO `senjata_api` (`no_senpi`, `jenis`, `merk`, `kaliber`, `jumlah`, `kondisi`, `keterangan`) VALUES
(1, 'kaliber', 'asas', 'asasa', 111, 'as', 'fdfsfsdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(36) NOT NULL,
  `password` varchar(64) DEFAULT NULL,
  `id_role` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `id_role`) VALUES
('admin1', '202cb962ac59075b964b07152d234b70', 1),
('admin2', '202cb962ac59075b964b07152d234b70', 2),
('admin3', '202cb962ac59075b964b07152d234b70', 3),
('asas', 'd41d8cd98f00b204e9800998ecf8427e', 4),
('ayu', 'a4f95a239896cd1fada61069976b9dda', 2),
('lestari', 'a4f95a239896cd1fada61069976b9dda', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amunisi`
--
ALTER TABLE `amunisi`
 ADD PRIMARY KEY (`no_amunisi`);

--
-- Indexes for table `berita_acara`
--
ALTER TABLE `berita_acara`
 ADD PRIMARY KEY (`no_ba`), ADD KEY `fk_ba_senpi_amunisi` (`id_pemohon`), ADD KEY `fk_ba_senpi` (`no_senpi`), ADD KEY `fk_ba_amunisi` (`no_amunisi`);

--
-- Indexes for table `data_pemohon`
--
ALTER TABLE `data_pemohon`
 ADD PRIMARY KEY (`nrp`);

--
-- Indexes for table `pemohon`
--
ALTER TABLE `pemohon`
 ADD PRIMARY KEY (`id_pemohon`), ADD KEY `fk_pemohon_senpi` (`no_senpi`), ADD KEY `nrp` (`nrp`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
 ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `senjata_api`
--
ALTER TABLE `senjata_api`
 ADD PRIMARY KEY (`no_senpi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`username`), ADD KEY `fk_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amunisi`
--
ALTER TABLE `amunisi`
MODIFY `no_amunisi` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `berita_acara`
--
ALTER TABLE `berita_acara`
MODIFY `no_ba` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1101;
--
-- AUTO_INCREMENT for table `pemohon`
--
ALTER TABLE `pemohon`
MODIFY `id_pemohon` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
MODIFY `id_role` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `senjata_api`
--
ALTER TABLE `senjata_api`
MODIFY `no_senpi` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berita_acara`
--
ALTER TABLE `berita_acara`
ADD CONSTRAINT `fk_ba_amunisi` FOREIGN KEY (`no_amunisi`) REFERENCES `amunisi` (`no_amunisi`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk_ba_senpi` FOREIGN KEY (`no_senpi`) REFERENCES `senjata_api` (`no_senpi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pemohon`
--
ALTER TABLE `pemohon`
ADD CONSTRAINT `fk_pemohon_senpi` FOREIGN KEY (`no_senpi`) REFERENCES `senjata_api` (`no_senpi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
ADD CONSTRAINT `fk_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
