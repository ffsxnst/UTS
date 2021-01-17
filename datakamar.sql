-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2021 at 04:04 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datakamar`
--

-- --------------------------------------------------------

--
-- Table structure for table `datakamar`
--

CREATE TABLE `datakamar` (
  `id_kamar` int(10) NOT NULL,
  `no_kamar` varchar(20) NOT NULL,
  `nama_anggota` varchar(60) NOT NULL,
  `program_studi` varchar(40) NOT NULL,
  `angkatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datakamar`
--

INSERT INTO `datakamar` (`id_kamar`, `no_kamar`, `nama_anggota`, `program_studi`, `angkatan`) VALUES
(3, 'Fatimah Azzahra 2', 'Fikri Faridah Sansiati', 'Teknik Informatika', 'Guardian'),
(5, 'Fatimah Azzahra 2', 'Marsa Salsabila', 'Manajemen Bisnis', 'Guardian'),
(6, 'Fatimah Azzahra 2', 'Diventi Kiki Susekti', 'Pendidikan Agama Islam', 'Guardian'),
(7, 'Fatimah Azzahra 2', 'Fadhilah Amalia', 'Farmasi', 'Guardian'),
(8, 'Fatimah Azzahra 2', 'Syifaurrahmah', 'Hubungan Internasional', 'Guardian'),
(9, 'Fatimah Azzahra 2', 'Nur Najla', 'Hubungan Internasional', 'Prominent');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datakamar`
--
ALTER TABLE `datakamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datakamar`
--
ALTER TABLE `datakamar`
  MODIFY `id_kamar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
