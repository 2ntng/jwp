-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2022 at 06:27 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serkom_praktik`
--

-- --------------------------------------------------------

--
-- Table structure for table `tempat`
--

CREATE TABLE `tempat` (
  `id_tempat` int(11) NOT NULL,
  `nama_tempat` varchar(64) NOT NULL,
  `harga` int(64) NOT NULL,
  `foto` varchar(256) NOT NULL,
  `video` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tempat`
--

INSERT INTO `tempat` (`id_tempat`, `nama_tempat`, `harga`, `foto`, `video`) VALUES
(1, 'Taman Nasional Way Kambas', 250000, 'https://img.freepik.com/free-photo/two-asian-elephants-playing-with-each-other-indonesia-sumatra-way-kambas-national-park_265142-8716.jpg?w=500', 'https://www.youtube.com/embed/nStDQRz_MO8'),
(2, 'Museum Lampung', 50000, 'https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1584445602/xyghntxlczw1lufnyiud.jpg', 'https://www.youtube.com/embed/uBUdK1yOOUs'),
(3, 'Teluk Kiluan', 750000, 'https://live.staticflickr.com/1851/44322052051_50fd213d9a_b.jpg', 'https://www.youtube.com/embed/7kn-XJA-Vrg');

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id_tiket` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `no_iden` varchar(16) NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `id_tempat` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `jml_dewasa` int(10) NOT NULL,
  `jml_anak` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `nama`, `no_iden`, `no_hp`, `id_tempat`, `tanggal`, `jml_dewasa`, `jml_anak`) VALUES
(1, 'Muhammad Bintang', '3674212144124421', '087773932899', 1, '2022-06-15', 2, 3),
(2, 'Muhammad Bintang', '3674212144124421', '08214124124', 2, '2022-06-16', 2, 1),
(3, 'Muhammad Bintang', '3674212144124421', '241714071240', 3, '2022-06-21', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tempat`
--
ALTER TABLE `tempat`
  ADD PRIMARY KEY (`id_tempat`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tempat`
--
ALTER TABLE `tempat`
  MODIFY `id_tempat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id_tiket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
