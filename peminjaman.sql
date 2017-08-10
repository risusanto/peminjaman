-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 10, 2017 at 01:56 AM
-- Server version: 5.7.17-log
-- PHP Version: 7.0.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `peminjaman`
--

-- --------------------------------------------------------

--
-- Table structure for table `amunisi`
--

CREATE TABLE `amunisi` (
  `no_amunisi` int(10) NOT NULL,
  `kesatuan` varchar(36) DEFAULT NULL,
  `merk` varchar(255) DEFAULT NULL,
  `caliber` varchar(20) DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL,
  `kondisi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `berita_acara`
--

CREATE TABLE `berita_acara` (
  `no_ba` bigint(20) NOT NULL,
  `nrp` bigint(20) DEFAULT NULL,
  `no_senpi` int(10) DEFAULT NULL,
  `no_amunisi` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pemohon`
--

CREATE TABLE `pemohon` (
  `nrp` bigint(20) NOT NULL,
  `nama_anggota` varchar(255) DEFAULT NULL,
  `pangkat` varchar(36) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `kesatuan` varchar(20) DEFAULT NULL,
  `kelengkapan` varchar(255) DEFAULT NULL,
  `jumlah_amunisi` int(10) DEFAULT NULL,
  `no_senpi` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` tinyint(4) NOT NULL,
  `role` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `senjata_api`
--

CREATE TABLE `senjata_api` (
  `no_senpi` int(10) NOT NULL,
  `jenis` varchar(36) DEFAULT NULL,
  `merk` varchar(255) DEFAULT NULL,
  `kaliber` varchar(20) DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL,
  `kondisi` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(36) NOT NULL,
  `password` varchar(64) DEFAULT NULL,
  `id_role` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
  ADD PRIMARY KEY (`no_ba`),
  ADD KEY `fk_ba_senpi_amunisi` (`nrp`),
  ADD KEY `fk_ba_senpi` (`no_senpi`),
  ADD KEY `fk_ba_amunisi` (`no_amunisi`);

--
-- Indexes for table `pemohon`
--
ALTER TABLE `pemohon`
  ADD PRIMARY KEY (`nrp`),
  ADD KEY `fk_pemohon_senpi` (`no_senpi`);

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
  ADD PRIMARY KEY (`username`),
  ADD KEY `fk_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `amunisi`
--
ALTER TABLE `amunisi`
  MODIFY `no_amunisi` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `berita_acara`
--
ALTER TABLE `berita_acara`
  MODIFY `no_ba` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pemohon`
--
ALTER TABLE `pemohon`
  MODIFY `nrp` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` tinyint(4) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `senjata_api`
--
ALTER TABLE `senjata_api`
  MODIFY `no_senpi` int(10) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita_acara`
--
ALTER TABLE `berita_acara`
  ADD CONSTRAINT `fk_ba_amunisi` FOREIGN KEY (`no_amunisi`) REFERENCES `amunisi` (`no_amunisi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ba_senpi` FOREIGN KEY (`no_senpi`) REFERENCES `senjata_api` (`no_senpi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ba_senpi_amunisi` FOREIGN KEY (`nrp`) REFERENCES `pemohon` (`nrp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemohon`
--
ALTER TABLE `pemohon`
  ADD CONSTRAINT `fk_pemohon_senpi` FOREIGN KEY (`no_senpi`) REFERENCES `senjata_api` (`no_senpi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
