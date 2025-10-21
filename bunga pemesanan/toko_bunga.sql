-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 11, 2025 at 08:05 AM
-- Server version: 5.7.44
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_bunga`
--

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_ditambahkan` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `deskripsi`, `harga`, `gambar`, `tanggal_ditambahkan`) VALUES
(5, 'Bunga Anggrek', 'bungan anggrek berwarna ungu dan pink', 40000, 'gambar/1760169556_bunga anggrek.jpg', '2025-10-11 07:59:16'),
(6, 'bunga kain', 'bunga yang indah dan lembut', 85000, 'gambar/1760169634_bunga kain.jpg', '2025-10-11 08:00:34'),
(7, 'bunga mawar', 'bunga untuk kekasih', 100000, 'gambar/1760169677_bunga mawar.jpg', '2025-10-11 08:01:17'),
(8, 'bunga tulip', 'bunga belum mekar', 67000, 'gambar/1760169717_bunga tulip.jpg', '2025-10-11 08:01:57'),
(9, 'bunga pot hitam', 'bunga yang elegan', 450000, 'gambar/1760169767_bunga pot hitam.jpg', '2025-10-11 08:02:47'),
(10, 'pot gelas', 'pot yang elegan', 75000, 'gambar/1760169800_pot gelas.jpg', '2025-10-11 08:03:20'),
(11, 'pot plastik', 'pot lucu dan unik', 35000, 'gambar/1760169828_pot plastik.jpg', '2025-10-11 08:03:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
