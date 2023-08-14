-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2023 at 08:56 AM
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
-- Database: `instagram`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_comments`
--

CREATE TABLE `tb_comments` (
  `id_comment` int(11) NOT NULL,
  `id_reels_fk` int(11) NOT NULL,
  `id_user_fk` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_locations`
--

CREATE TABLE `tb_locations` (
  `id_location` int(11) NOT NULL,
  `id_reels_fk` int(11) NOT NULL,
  `coordinate` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_reels`
--

CREATE TABLE `tb_reels` (
  `id_reels` int(11) NOT NULL,
  `id_user_fk` int(11) NOT NULL,
  `id_location_fk` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tag`
--

CREATE TABLE `tb_tag` (
  `id_tag` int(11) NOT NULL,
  `id_reels_fk` int(11) NOT NULL,
  `id_user_fk` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_comments`
--
ALTER TABLE `tb_comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_reels_fk` (`id_reels_fk`),
  ADD KEY `id_user_fk` (`id_user_fk`);

--
-- Indexes for table `tb_locations`
--
ALTER TABLE `tb_locations`
  ADD PRIMARY KEY (`id_location`),
  ADD KEY `id_reels_fk` (`id_reels_fk`);

--
-- Indexes for table `tb_reels`
--
ALTER TABLE `tb_reels`
  ADD PRIMARY KEY (`id_reels`),
  ADD KEY `id_location_fk` (`id_location_fk`),
  ADD KEY `id_user_fk` (`id_user_fk`);

--
-- Indexes for table `tb_tag`
--
ALTER TABLE `tb_tag`
  ADD PRIMARY KEY (`id_tag`),
  ADD KEY `id_reels_fk` (`id_reels_fk`),
  ADD KEY `id_user_fk` (`id_user_fk`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_comments`
--
ALTER TABLE `tb_comments`
  ADD CONSTRAINT `tb_comments_ibfk_1` FOREIGN KEY (`id_reels_fk`) REFERENCES `tb_reels` (`id_reels`),
  ADD CONSTRAINT `tb_comments_ibfk_2` FOREIGN KEY (`id_user_fk`) REFERENCES `tb_user` (`id_user`);

--
-- Constraints for table `tb_locations`
--
ALTER TABLE `tb_locations`
  ADD CONSTRAINT `tb_locations_ibfk_1` FOREIGN KEY (`id_reels_fk`) REFERENCES `tb_reels` (`id_reels`);

--
-- Constraints for table `tb_reels`
--
ALTER TABLE `tb_reels`
  ADD CONSTRAINT `tb_reels_ibfk_1` FOREIGN KEY (`id_user_fk`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_reels_ibfk_2` FOREIGN KEY (`id_location_fk`) REFERENCES `tb_locations` (`id_location`);

--
-- Constraints for table `tb_tag`
--
ALTER TABLE `tb_tag`
  ADD CONSTRAINT `tb_tag_ibfk_1` FOREIGN KEY (`id_user_fk`) REFERENCES `tb_user` (`id_user`),
  ADD CONSTRAINT `tb_tag_ibfk_2` FOREIGN KEY (`id_reels_fk`) REFERENCES `tb_reels` (`id_reels`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
