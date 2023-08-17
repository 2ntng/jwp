-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 17, 2023 at 05:24 PM
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
-- Database: `unila_akap`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(255) NOT NULL,
  `harga` int(64) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `nama_kelas`, `harga`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Ekonomi', 35000, 'https://www.busharapanjaya.com/file/eko-2.jpg', NULL, NULL),
(2, 'PATAS', 50000, 'https://www.busharapanjaya.com/file/patas-2.jpg', NULL, NULL),
(3, 'Eksekutif', 100000, 'https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1602653305/bw57hpfeimki55sph2jl.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tiket`
--

CREATE TABLE `tb_tiket` (
  `id_tiket` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_iden` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `jml_reguler` int(10) NOT NULL,
  `jml_lansia` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_tiket`
--

INSERT INTO `tb_tiket` (`id_tiket`, `nama`, `no_iden`, `no_hp`, `id_kelas`, `tanggal`, `jml_reguler`, `jml_lansia`, `created_at`, `updated_at`) VALUES
('1d71367353da0fda99d6683220f96372', 'Muhammad Bintang Firdaus', '3674022705010005', '087773932899', 2, '2023-08-15', 3, 1, NULL, NULL),
('bbbe3cd428c864636ae5fb53a6207be6', 'John Smith', '3674022705010077', '08214124124', 3, '2023-08-26', 1, 2, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_tiket`
--
ALTER TABLE `tb_tiket`
  ADD PRIMARY KEY (`id_tiket`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
