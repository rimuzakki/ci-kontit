-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2018 at 03:48 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `mst_anggota`
--

CREATE TABLE `mst_anggota` (
  `id_anggota` int(5) NOT NULL,
  `nim` varchar(13) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `progdi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_anggota`
--

INSERT INTO `mst_anggota` (`id_anggota`, `nim`, `nama`, `progdi`) VALUES
(1, 'G.231.15.0114', 'Rifqon Muzakki', 'Teknik Informatika'),
(2, 'G.231.15.0129', 'Rahmat Nur', 'Sistem Informasi'),
(3, 'G.231.15.0176', 'Qwety', 'Teknik Informatika');

-- --------------------------------------------------------

--
-- Table structure for table `mst_buku`
--

CREATE TABLE `mst_buku` (
  `id_buku` int(8) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `pengarang` varchar(150) NOT NULL,
  `kategori` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_buku`
--

INSERT INTO `mst_buku` (`id_buku`, `judul`, `pengarang`, `kategori`) VALUES
(1, 'Buku PHP', 'Andre Darwis', 'Teknologi'),
(2, 'Memasak', 'John Doe', 'komik');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam`
--

CREATE TABLE `pinjam` (
  `id_pinjam` int(5) NOT NULL,
  `id_anggota` int(5) NOT NULL,
  `id_buku` int(5) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjam`
--

INSERT INTO `pinjam` (`id_pinjam`, `id_anggota`, `id_buku`, `tgl_pinjam`, `tgl_kembali`) VALUES
(1, 1, 1, '0000-00-00', '0000-00-00'),
(2, 1, 1, '0000-00-00', '0000-00-00'),
(3, 1, 1, '0000-00-00', '0000-00-00'),
(4, 1, 1, '0000-00-00', '0000-00-00'),
(5, 1, 1, '0000-00-00', '0000-00-00'),
(6, 1, 1, '0000-00-00', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mst_anggota`
--
ALTER TABLE `mst_anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `mst_buku`
--
ALTER TABLE `mst_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mst_anggota`
--
ALTER TABLE `mst_anggota`
  MODIFY `id_anggota` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mst_buku`
--
ALTER TABLE `mst_buku`
  MODIFY `id_buku` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id_pinjam` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
