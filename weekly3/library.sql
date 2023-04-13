-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2023 at 04:04 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `isbn` varchar(25) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `tahun` int(11) NOT NULL,
  `id_penerbit` varchar(8) NOT NULL,
  `id_pengarang` varchar(8) NOT NULL,
  `id_katalog` varchar(3) NOT NULL,
  `qty_stok` int(11) NOT NULL,
  `harga_pinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE `katalog` (
  `id_katalog` varchar(3) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`id_katalog`, `nama`) VALUES
('KG0', 'Buku Dewasa'),
('KG1', 'Buku Anak'),
('KG2', 'Buku Belajar'),
('KG3', 'Buku Belajar Agama'),
('KG4', 'Buku Kesehatan');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` varchar(8) NOT NULL,
  `nama_penerbit` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `nama_penerbit`, `email`, `telp`, `alamat`) VALUES
('PN01', 'Penerbit 01', 'penerbit@perpus.co.id', '0219999333', 'Surabaya'),
('PN02', 'Penerbit 02', 'penerbit2@gmail.com', '08765158111', 'Bandung'),
('PN03', 'Penerbit 03', 'penerbit3@gmail.com', '', 'Jakarta Barat'),
('PN04', 'Penerbit 04', 'penerbit4@gmail.com', '08972017209', 'Jakarta Selatan'),
('PN05', 'Penerbit 05', 'penerbit5@gmail.com', '08972187209', 'Jakarta Selatan');

-- --------------------------------------------------------

--
-- Table structure for table `pengarang`
--

CREATE TABLE `pengarang` (
  `id_pengarang` varchar(8) NOT NULL,
  `nama_pengarang` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengarang`
--

INSERT INTO `pengarang` (`id_pengarang`, `nama_pengarang`, `email`, `telp`, `alamat`) VALUES
('PG01', 'Pengarang 01', 'pengarang1@perpus.co.id', '0929211', 'Bandung'),
('PG02', 'Pengarang 02', 'pengarang2@perpus.co.id', '0929211222', 'Yogyakarta'),
('PG03', 'Pengarang 03', 'pengarang3@perpus.co.id', '092921199', 'Banten'),
('PG04', 'Pengarang 04', 'pengarang4@perpus.co.id', '93938199', 'Jakarta'),
('PG05', 'Pengarang 05', 'pengarang5@perpus.co.id', '93938199', 'Cimahi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`isbn`);

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id_katalog`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indexes for table `pengarang`
--
ALTER TABLE `pengarang`
  ADD PRIMARY KEY (`id_pengarang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
