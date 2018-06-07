-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2018 at 09:14 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

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
(3, 'G.231.15.0176', 'Qwety', 'Teknik Informatika'),
(4, 'G.231.15.001', 'John doe', 'Teknik Informatika'),
(5, 'G.231.15.002', 'Doe John', 'Sistem Informasi'),
(6, 'G.231.15.003', 'Lorem Ipsum', 'Teknik Informatika'),
(7, 'G.231.15.004', 'Ipsum Lorem', 'Teknik Informatika');

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
(2, 'Memasak', 'John Doe', 'komik'),
(3, 'Panduan Puasa', 'Ustadz Rifqon', 'Teknologi'),
(4, 'Mobile lejen', 'Montoon', 'Teknologi'),
(5, 'Buku Code Igniter', 'Dosen', 'Teknologi'),
(6, 'Buku Perangkat PC', 'Pak Dosen', 'Teknologi'),
(7, 'Buku A', 'John Doe', 'kamus');

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
(6, 1, 1, '0000-00-00', '0000-00-00'),
(7, 1, 1, '2018-05-24', '2018-05-24');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` tinyint(4) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mst_anggota`
--
ALTER TABLE `mst_anggota`
  MODIFY `id_anggota` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `mst_buku`
--
ALTER TABLE `mst_buku`
  MODIFY `id_buku` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `id_pinjam` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
