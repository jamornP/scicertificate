-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2023 at 12:31 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_scicertificate`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_background`
--

CREATE TABLE `tb_background` (
  `b_id` int(11) NOT NULL,
  `b_name` varchar(255) NOT NULL,
  `b_path` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_background`
--

INSERT INTO `tb_background` (`b_id`, `b_name`, `b_path`, `status`) VALUES
(1, 'workshop_sciday2023.png', '/scicertificate/backend/images/bg/', 1),
(2, 'certificate-BG.png', '/scicertificate/backend/images/bg/', 1),
(3, 'expo2023.png', '/scicertificate/backend/images/bg/', 1),
(4, 'sciday2022-bronze.png', '/scicertificate/backend/images/bg/', 1),
(5, 'sciday2022-silver.png', '/scicertificate/backend/images/bg/', 1),
(6, 'sciday2022-gold.png', '/scicertificate/backend/images/bg/', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_ca`
--

CREATE TABLE `tb_ca` (
  `ca_id` int(11) NOT NULL,
  `ca_name` varchar(255) NOT NULL,
  `ca_path` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_ca`
--

INSERT INTO `tb_ca` (`ca_id`, `ca_name`, `ca_path`, `status`) VALUES
(2, 'su.png', '/scicertificate/backend/images/ca/', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_filephp`
--

CREATE TABLE `tb_filephp` (
  `f_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `f_path` varchar(255) NOT NULL,
  `f_img` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_filephp`
--

INSERT INTO `tb_filephp` (`f_id`, `f_name`, `f_path`, `f_img`, `status`) VALUES
(2, 'ca02.php', '/scicertificate/backend/gen_certificate/', '/scicertificate/backend/images/example/ca02.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_background`
--
ALTER TABLE `tb_background`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tb_ca`
--
ALTER TABLE `tb_ca`
  ADD PRIMARY KEY (`ca_id`);

--
-- Indexes for table `tb_filephp`
--
ALTER TABLE `tb_filephp`
  ADD PRIMARY KEY (`f_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_background`
--
ALTER TABLE `tb_background`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_ca`
--
ALTER TABLE `tb_ca`
  MODIFY `ca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_filephp`
--
ALTER TABLE `tb_filephp`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
