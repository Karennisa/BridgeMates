-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2024 at 03:22 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bridgemates`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id`, `foto`, `nama`, `no_hp`, `email`) VALUES
(11, 'WhatsApp Image 2024-12-12 at 05.48.18_11b5564b.jpg', 'Sri Lestari, M.M', '085866130467', 'sri_123@gmail.com'),
(13, 'WhatsApp Image 2024-12-12 at 05.48.17_09fffa14.jpg', 'Denny Vasanando S.,S.Kom', '08523455689', 'denny123@gmail.com'),
(14, 'WhatsApp Image 2024-12-12 at 05.48.17_c82644a6.jpg', 'Henny Indriani,ST, MM., M.Kom', '149876326367', 'heny123@gmail.com'),
(15, 'img.png', 'Fitriasih, M.Kom', '0895359886753', 'fitrih24@gmail.com'),
(16, 'img.png', 'Haris Anom Susetyo AN, M.Kom', '0895359886753', 'haris24@gmail.com'),
(17, 'img.png', 'Muhammad Ainurohman, S.Kom', '0895359886753', 'Ainur24@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `hari` varchar(10) DEFAULT NULL,
  `waktu_mulai` time DEFAULT NULL,
  `waktu_selesai` time DEFAULT NULL,
  `mata_kuliah` varchar(100) DEFAULT NULL,
  `dosen` varchar(100) DEFAULT NULL,
  `ruang` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `hari`, `waktu_mulai`, `waktu_selesai`, `mata_kuliah`, `dosen`, `ruang`) VALUES
(1, 'Senin', '08:00:00', '09:40:00', 'Pemrograman Artificial Intelligence', 'Heny Indriani, ST, MM., M.Kom', 'LAB 1'),
(2, 'Senin', '10:00:00', '12:00:00', 'Praktik Mengelola Usaha', 'Sri Lestari, M.M', 'C'),
(3, 'Senin', '13:00:00', '14:40:00', 'Data Science', 'Fitriashi, M.Kom', 'A'),
(4, 'Selasa', '08:00:00', '10:00:00', 'Praktik Pemrograman Berorientasi Objek-2', 'Denny Vasanando S., S.Kom', 'LAB 2'),
(5, 'Selasa', '10:00:00', '12:00:00', 'Rekayasa Perangkat Lunak 2', 'M. Romdlon, SE', 'LAB 2'),
(6, 'Selasa', '13:00:00', '15:00:00', 'Basis Data 2', 'Denny Vasanando S., S.Kom', 'LAB 2'),
(7, 'Rabu', '08:00:00', '10:00:00', 'Praktikum Pemrograman Artificial Intelligence', 'Heny Indriani, ST, MM., M.Kom', 'LAB 3'),
(8, 'Rabu', '10:00:00', '12:00:00', 'Matematika Diskrit', 'Haris Anom Susetyo AN, M.Kom', 'LAB 3'),
(9, 'Kamis', '10:00:00', '12:00:00', 'Perancangan WEB 2', 'Muhamad Ainurohman, S.Kom', 'A'),
(10, 'Kamis', '13:00:00', '15:00:00', 'Praktikum Perancangan WEB 2', 'Muhamad Ainurohman, S.Kom', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id` int(11) NOT NULL,
  `nama_ruang` varchar(50) NOT NULL,
  `status` enum('digunakan','tidak digunakan') DEFAULT 'tidak digunakan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id`, `nama_ruang`, `status`) VALUES
(1, 'Ruang A', 'tidak digunakan'),
(2, 'Ruang B', 'digunakan'),
(3, 'Ruang C', 'digunakan'),
(4, 'Lab 1', 'tidak digunakan'),
(5, 'Lab 2', 'tidak digunakan'),
(6, 'Lab 3', 'tidak digunakan');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`) VALUES
(1, 'Karennisa', 'Karen', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
