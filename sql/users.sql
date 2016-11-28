-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2016 at 02:08 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `session`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image` blob,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('user','admin') NOT NULL DEFAULT 'user',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address` varchar(100) DEFAULT NULL,
  `nohp` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `password`, `level`, `time`, `address`, `nohp`) VALUES
(5, 'Andrean Taufik', 0x616e6472652e706e67, 'andreantaufik96@gmail.com', '3de33d38027dbe6e18c9be179b88eb9e', 'admin', '2016-11-20 14:09:53', NULL, NULL),
(6, 'Andrean Taufik', 0x77616c6c686176656e2d3339313638302e706e67, 'andreantaufik@live.com', '9e3a9fbaa66a287c423bd74113ad4020', 'user', '2016-11-20 14:24:46', 'Pontianak 2', ''),
(7, 'Alvin Niza Aulia', 0x77616c6c686176656e2d3339313731382e706e67, 'alvin.niza@gmail.com', '6e55d1d66c289dbdb34baf068e838adf', 'user', '2016-11-20 16:43:04', 'Jl. Jatinangor No. 47 A', '082112121112'),
(8, 'Ardhi Harahap', NULL, 'ardhi@gmail.com', '3f9931015c52d8e86ff98ad49d151071', 'user', '2016-11-21 06:47:40', NULL, NULL),
(9, 'Hilga', NULL, 'hilga@dwiana.com', '36d926a632318747acc1430a9fed884a', 'user', '2016-11-21 07:14:37', NULL, NULL),
(10, 'farestu', NULL, 'fares@gmail.com', '9e999aef4357d0f677bbebb052db5243', 'user', '2016-11-21 07:26:15', NULL, NULL),
(11, 'ada ada aja', NULL, 'adaadaaja@gmail.com', '81f60737be18672fbbcdbcda35d6d21f', 'user', '2016-11-24 22:01:50', NULL, NULL),
(12, 'Andre Unpad', NULL, 'andrean13001@mail.unpad.ac.id', 'aa63d725c7fa0805be441e5d10f2039f', 'user', '2016-11-25 17:08:20', NULL, NULL),
(13, 'wadaw semester 7', NULL, 'wadawsemester7@gmail.com', '7eac15ba8bd270c15ef778d362a11a56', 'user', '2016-11-26 14:03:39', NULL, NULL),
(17, 'Dwiki WOTA', NULL, 'dwiki@gmail.com', '695ec196f1410f367cee6a9b46125636', 'user', '2016-11-27 14:00:29', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
