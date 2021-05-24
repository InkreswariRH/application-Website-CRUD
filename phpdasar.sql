-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2021 at 10:47 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `nim` char(8) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `jurusan` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `email`, `jurusan`, `gambar`) VALUES
(1, 'Inkreswari Retno Hardini', '23518015', 'inkreswari@gmail.com', 'Teknologi Informasi', 'ines.jpg'),
(2, 'Shon Seungwan', '23518020', 'wendy@gmail.com', 'Teknik Kimia', 'wendy.jpg'),
(3, 'Kang Seulgi', '23518030', 'seulgi@gmail.com', 'Teknik ELektro', 'seulgi.jpg'),
(4, 'Bae Joohyun', '23518016', 'irene@gmail.com', 'Seni Rupa', 'irene.jpg'),
(5, 'Kim Yerim', '23518002', 'yeri@gmail.com', 'Bisnis', 'yeri.jpg'),
(6, 'Park Sooyoung', '23518007', 'joy@gmail.com', 'Bisnis', 'joy.jpg'),
(7, 'Farrel', '23518022', 'farel@gmail.com', 'Teknik Elektro', 'farel.jpg'),
(8, 'Kyra', '23518017', 'kyra@gmail.com', 'Teknik Kimia', 'kyra.jpg'),
(9, 'Biya', '23518016', 'biya@gmail.com', 'Teknik Kimia', 'biya.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `grup` varchar(100) DEFAULT NULL,
  `tahun_lahir` char(4) DEFAULT NULL,
  `agensi` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `nama`, `grup`, `tahun_lahir`, `agensi`, `foto`) VALUES
(1, 'Bae Joohyun', 'Red Velvet', '1991', 'SM Entertainment', 'irene.jpg'),
(2, 'Kang Seulgi', 'Red Velvet', '1994', 'SM Entertainment', 'seulgi.jpg'),
(3, 'Shon Seungwan', 'Red Velvet', '1994', 'SM Entertainment', 'wendy.jpg'),
(4, 'Park Sooyoung', 'Red Velvet', '1996', 'SM Entertainment', 'joy.jpg'),
(5, 'Kim Yerim', 'Red Velvet', '1999', 'SM Entertainment', 'yeri.jpg'),
(6, 'Kim Yongsun', 'Mamamoo', '1991', 'RBW Entertainment', 'solar.jpg'),
(7, 'Moon Byulyi', 'Mamamoo', '1992', 'RBW Entertainment', 'byul.jpg'),
(8, 'Jung Wheein', 'Mamamoo', '1995', 'RBW Entertainment', 'wheein.jpg'),
(9, 'Ahn Hyejin', 'Mamamoo', '1995', 'RBW Entertainment', 'hwasa.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'ines', '$2y$10$ZFpiDUQsmMYjMsUy3Hrfoe.HPS7In0qkuQIyFPjPPYnWWqKjMGC0W'),
(2, 'admin', '$2y$10$7C1FK.T0PnyAZW64YYwScexnJq/6HJeg.bu50Mhmd.zAOUICVRjbC'),
(9, 'test', '$2y$10$8buEltpKzp3KMBFx80b1UepJExqXU1zoNPRzn6ISRRWnRponjoRuK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
