-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2023 at 07:05 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kampuskuaja`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_beasiswa`
--

CREATE TABLE `tb_beasiswa` (
  `id_beasiswa` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_beasiswa`
--

INSERT INTO `tb_beasiswa` (`id_beasiswa`, `nama`, `deskripsi`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Beasiswa Unggulan', 'Beasiswa Unggulan adalah pemberian biaya pendidikan oleh pemerintah Indonesia kepada putra-putri terbaik bangsa Indonesia pada perguruan tinggi penerima peserta didik program Beasiswa Unggulan pada jenjang S1, S2, dan S3.', 'https://beasiswaunggulan.kemdikbud.go.id/wp-content/uploads/2023/05/logo-siunggul-full-white-300x46.png', NULL, NULL),
(2, 'Karya Salemba Empat', 'Beasiswa Yayasan Karya Salemba Empat akan terus berusaha mengulurkan tangan untuk para mahasiswa yang ingin meneruskan perjuangannya dalam meraih gelar Strata 1 di Perguruan Tinggi.', 'https://kse.or.id/application/files/cache/5cd9ab6c46030ae9991294021bd3adf1.png', NULL, NULL),
(3, 'KIP Kuliah', 'Kartu Indonesia Pintar (KIP-Kuliah) adalah bantuan pendidikan yang diberikan pemerintah kepada mahasiswa yang berasal dari keluarga kurang mampu.', 'https://kip-kuliah.kemdikbud.go.id/img/puslapdik.png', NULL, NULL),
(4, 'Bank Indonesia', 'Beasiswa Bank Indonesia merupakan beasiswa prestasi yang diberikan oleh Bank Indonesia untuk mahasiswa dengan jenjang Pendidikan Strata 1 (S1) di berbagai perguruan tinggi baik perguruan tinggi negeri dan swasta.', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ipk`
--

CREATE TABLE `tb_ipk` (
  `id_ipk` int(11) NOT NULL,
  `npm` varchar(255) NOT NULL,
  `semester` int(11) NOT NULL,
  `ipk` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_ipk`
--

INSERT INTO `tb_ipk` (`id_ipk`, `npm`, `semester`, `ipk`, `created_at`, `updated_at`) VALUES
(1, '1917051045', 1, 3.16, NULL, NULL),
(2, '1917051045', 2, 3.25, NULL, NULL),
(3, '1917051045', 3, 3.31, NULL, NULL),
(4, '1917051045', 4, 3.49, NULL, NULL),
(5, '1917051045', 5, 3.54, NULL, NULL),
(6, '1917051045', 6, 3.67, NULL, NULL),
(7, '1917051045', 7, 3.71, NULL, NULL),
(8, '1917051045', 8, 3.85, NULL, NULL),
(9, '2217051003', 1, 3.79, NULL, NULL),
(10, '2217051003', 2, 3.88, NULL, NULL),
(11, '2217051004', 1, 3.79, NULL, NULL),
(12, '2217051004', 2, 3.88, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_mahasiswa`
--

CREATE TABLE `tb_mahasiswa` (
  `npm` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_mahasiswa`
--

INSERT INTO `tb_mahasiswa` (`npm`, `email`, `created_at`, `updated_at`) VALUES
('1917051045', 'muhammadbintang2727@gmail.com', NULL, NULL),
('2217051003', 'praba@gmail.com', NULL, NULL),
('2217051004', 'veda@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_registrasi`
--

CREATE TABLE `tb_registrasi` (
  `id_registrasi` int(11) NOT NULL,
  `npm` varchar(255) NOT NULL,
  `id_beasiswa` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `semester` int(11) NOT NULL,
  `ipk` float NOT NULL,
  `status_ajuan` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_registrasi`
--

INSERT INTO `tb_registrasi` (`id_registrasi`, `npm`, `id_beasiswa`, `nama_lengkap`, `no_hp`, `semester`, `ipk`, `status_ajuan`, `created_at`, `updated_at`) VALUES
(3, '1917051045', 2, 'Muhammad Bintang', '08214124124', 3, 3.31, 'Belum diverifikasi', NULL, NULL),
(4, '2217051003', 4, 'Cakrawangsa Praba', '08221', 2, 3.88, 'Belum diverifikasi', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_beasiswa`
--
ALTER TABLE `tb_beasiswa`
  ADD PRIMARY KEY (`id_beasiswa`);

--
-- Indexes for table `tb_ipk`
--
ALTER TABLE `tb_ipk`
  ADD PRIMARY KEY (`id_ipk`),
  ADD KEY `npm` (`npm`);

--
-- Indexes for table `tb_mahasiswa`
--
ALTER TABLE `tb_mahasiswa`
  ADD PRIMARY KEY (`npm`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tb_registrasi`
--
ALTER TABLE `tb_registrasi`
  ADD PRIMARY KEY (`id_registrasi`),
  ADD KEY `npm` (`npm`),
  ADD KEY `id_beasiswa` (`id_beasiswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_ipk`
--
ALTER TABLE `tb_ipk`
  MODIFY `id_ipk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_registrasi`
--
ALTER TABLE `tb_registrasi`
  MODIFY `id_registrasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
