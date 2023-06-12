-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2023 at 04:44 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anjeng`
--

-- --------------------------------------------------------

--
-- Table structure for table `isi`
--

CREATE TABLE `isi` (
  `id` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `wkt_mulai` time NOT NULL,
  `wkt_selesai` time NOT NULL,
  `level_Kepentingan` varchar(30) NOT NULL,
  `durasi` varchar(10) NOT NULL,
  `lokasi` text NOT NULL,
  `gambar_kegiatan` varchar(50) NOT NULL,
  `day` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `isi`
--

INSERT INTO `isi` (`id`, `keterangan`, `tgl_mulai`, `tgl_selesai`, `wkt_mulai`, `wkt_selesai`, `level_Kepentingan`, `durasi`, `lokasi`, `gambar_kegiatan`, `day`) VALUES
(55, '', '2023-06-26', '2023-06-26', '23:22:00', '12:22:00', 'Penting', '13', '           A', 'images/WhatsApp Image 2023-06-06 at 22.01.20.jpeg', ''),
(56, '', '2023-06-28', '2023-06-30', '14:42:00', '14:44:00', 'Sangat Penting', '01', ' llll', 'images/WhatsApp Image 2023-06-06 at 21.57.42.jpeg', ''),
(61, '', '2023-06-23', '2023-06-28', '01:28:00', '21:32:00', 'Biasa', '21', ' pp', 'images/WhatsApp Image 2023-05-29 at 10.56.08.jpg', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `isi`
--
ALTER TABLE `isi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `isi`
--
ALTER TABLE `isi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
