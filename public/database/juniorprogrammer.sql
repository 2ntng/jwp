-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 11, 2023 at 08:31 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `juniorprogrammer`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_contacts`
--

CREATE TABLE `tb_contacts` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_contacts`
--

INSERT INTO `tb_contacts` (`id`, `profile_id`, `media_id`, `link`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'https://wa.me/6287773932899', '2023-08-11 18:12:52', '2023-08-11 18:12:52'),
(2, 1, 2, 'https://www.youtube.com/@muhammadbintangfirdaus8545', '2023-08-11 18:12:52', '2023-08-11 18:12:52'),
(3, 1, 4, 'https://www.linkedin.com/in/2ntng/', '2023-08-11 18:13:39', '2023-08-11 18:13:39');

-- --------------------------------------------------------

--
-- Table structure for table `tb_medias`
--

CREATE TABLE `tb_medias` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_medias`
--

INSERT INTO `tb_medias` (`id`, `name`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Whatsapp', 'fa-whatsapp', '2023-08-11 04:24:05', '2023-08-11 04:26:42'),
(2, 'YouTube', 'fa-youtube', '2023-08-11 04:24:38', '2023-08-11 04:24:38'),
(3, 'Twitter', 'fa-twitter', '2023-08-11 04:27:30', '2023-08-11 04:27:30'),
(4, 'LinkedIn', 'fa-linkedin', '2023-08-11 04:28:03', '2023-08-11 04:28:03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profiles`
--

CREATE TABLE `tb_profiles` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_profiles`
--

INSERT INTO `tb_profiles` (`id`, `full_name`, `nickname`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Muhammad Bintang Firdaus', 'Bintang', 'Junior Web Developer', '2023-08-11 04:28:31', '2023-08-11 04:28:31');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reviews`
--

CREATE TABLE `tb_reviews` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `rate` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_reviews`
--

INSERT INTO `tb_reviews` (`id`, `service_id`, `author`, `gender`, `rate`, `description`, `created_at`, `updated_at`) VALUES
(1, 2, 'Marcello Riveira', 1, 5, 'I had the pleasure of working for my recent web development project, and I am thrilled with the results. From start to finish, their team demonstrated a remarkable level of expertise, professionalism, and dedication.', '2023-08-11 07:13:26', '2023-08-11 07:13:26'),
(2, 2, 'Lance Advocat', 1, 4, 'The communication throughout the project was flawless. They were always quick to respond to my inquiries and provided regular updates on the progress. It felt like I had a dedicated team working around the clock just for me!', '2023-08-11 07:17:03', '2023-08-11 07:17:03'),
(3, 2, 'Rina', 0, 4, 'Deadlines were just a number in our book. We agreed that time is a mere construct, and it was liberating to break free from the constraints of schedules.', '2023-08-11 07:17:03', '2023-08-11 07:17:03'),
(4, 2, 'Salman Kemp', 1, 3, 'Good work result, Decent work ethics.', '2023-08-11 17:04:48', '2023-08-11 17:04:48'),
(5, 2, 'Ella Johnson', 0, 4, 'Great work! Very satisfied with the results.', '2023-08-12 08:30:42', '2023-08-12 08:30:42'),
(6, 2, 'William Turner', 1, 3, 'Decent service overall. Could use some improvements.', '2023-08-12 09:12:19', '2023-08-12 09:12:19'),
(7, 2, 'Sophia Martinez', 0, 5, 'Exceeded my expectations! Will definitely recommend.', '2023-08-12 10:45:57', '2023-08-12 10:45:57'),
(8, 2, 'Noah Clark', 1, 4, 'Communication was good. Satisfied with the outcome.', '2023-08-12 11:28:33', '2023-08-12 11:28:33'),
(9, 2, 'Olivia Wright', 0, 5, 'Fantastic work! Quick turnaround and high quality.', '2023-08-12 12:10:09', '2023-08-12 12:10:09'),
(10, 2, 'Aiden Parker', 1, 3, 'Average service. Room for improvement.', '2023-08-12 13:45:24', '2023-08-12 13:45:24');

-- --------------------------------------------------------

--
-- Table structure for table `tb_services`
--

CREATE TABLE `tb_services` (
  `id` int(11) NOT NULL,
  `profile_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_services`
--

INSERT INTO `tb_services` (`id`, `profile_id`, `name`, `description`, `link`, `created_at`, `updated_at`) VALUES
(1, 1, 'Day 1', 'In this exercise, we calculate the Big O notation for factorial operations to determine the relative efficiency of different algorithms.', './page/day1', '2023-08-11 06:52:21', '2023-08-11 06:52:21'),
(2, 1, 'Web Developer', 'We are seeking a talented and enthusiastic Web Developer to join our dynamic team. As a Web Developer, you will play a crucial role in designing, coding, testing, and maintaining user-friendly websites and web applications.', './page/webdeveloper', '2023-08-11 06:48:33', '2023-08-11 06:48:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_contacts`
--
ALTER TABLE `tb_contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_id` (`profile_id`),
  ADD KEY `media_id` (`media_id`);

--
-- Indexes for table `tb_medias`
--
ALTER TABLE `tb_medias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_profiles`
--
ALTER TABLE `tb_profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_reviews`
--
ALTER TABLE `tb_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `tb_services`
--
ALTER TABLE `tb_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profile_id` (`profile_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_contacts`
--
ALTER TABLE `tb_contacts`
  ADD CONSTRAINT `tb_contacts_ibfk_1` FOREIGN KEY (`media_id`) REFERENCES `tb_medias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_contacts_ibfk_2` FOREIGN KEY (`profile_id`) REFERENCES `tb_profiles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_reviews`
--
ALTER TABLE `tb_reviews`
  ADD CONSTRAINT `tb_reviews_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `tb_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_services`
--
ALTER TABLE `tb_services`
  ADD CONSTRAINT `tb_services_ibfk_1` FOREIGN KEY (`profile_id`) REFERENCES `tb_profiles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
