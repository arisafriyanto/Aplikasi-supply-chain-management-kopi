-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 29, 2020 at 04:34 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_scm_kopi`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_bahan`
--

CREATE TABLE `data_bahan` (
  `id` int(11) NOT NULL,
  `kode_bahan` varchar(100) NOT NULL,
  `nama_bahan` varchar(100) NOT NULL,
  `satuan` enum('kg','buah','bungkus','karung','botol') NOT NULL,
  `harga_beli` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_bahan`
--

INSERT INTO `data_bahan` (`id`, `kode_bahan`, `nama_bahan`, `satuan`, `harga_beli`) VALUES
(1, 'B0001', 'Arabica Rosta', 'kg', 15000),
(2, 'B0002', 'Caramel', 'bungkus', 20000),
(3, 'B0003', 'Cappucino', 'bungkus', 17000);

-- --------------------------------------------------------

--
-- Table structure for table `data_supplier`
--

CREATE TABLE `data_supplier` (
  `id` int(11) NOT NULL,
  `kode_supplier` varchar(100) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat` enum('Aceh','Semarang','Medan','Lampung','Bandung') NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_supplier`
--

INSERT INTO `data_supplier` (`id`, `kode_supplier`, `nama_supplier`, `alamat`, `telp`) VALUES
(1, 'S0001', 'Aris Afriyanto', 'Aceh', '089574637483'),
(2, 'S0002', 'Rohman', 'Semarang', '089674839372'),
(3, 'S0003', 'Afifah Khoir', 'Medan', '089674848384');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'aris afriyanto', '$2y$10$p2NmnW8ZdPtTSpLAzfU4y.IJ0XiBcQaGLxf6BT559W1UyCSXe6Yzu', 'aris afriyanto'),
(2, 'aris', '$2y$10$SikrOHS.telEnp2AhObVfuncOr8kHw0vDH/3JknFif.n6BB4Kj18K', 'aris aff');

-- --------------------------------------------------------

--
-- Table structure for table `pemakaian_bahan`
--

CREATE TABLE `pemakaian_bahan` (
  `id` int(11) NOT NULL,
  `id_pemesanan` varchar(100) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `satuan` enum('Kg','Buah','Bungkus','Karung','Botol') NOT NULL,
  `harga_beli` int(100) NOT NULL,
  `jumlah_pakai` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemakaian_bahan`
--

INSERT INTO `pemakaian_bahan` (`id`, `id_pemesanan`, `nama_supplier`, `alamat`, `nama_produk`, `satuan`, `harga_beli`, `jumlah_pakai`) VALUES
(2, 'ef2d127de37b942baad06145e54b0c619a1f22327b2ebbcfbec78f5564afe39d', 'Rohman', 'Semarang', 'Arabica Rosta', 'Kg', 15000, 7),
(3, '4e07408562bedb8b60ce05c1decfe3ad16b72230967de01f640b7e4729b49fce', 'Afifah Khoir', 'Medan', 'Caramel', 'Bungkus', 20000, 9);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_bahan`
--

CREATE TABLE `pemesanan_bahan` (
  `id` int(11) NOT NULL,
  `id_pemesanan` varchar(100) NOT NULL,
  `kode_supplier` varchar(100) NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `satuan` enum('kg','buah','bungkus','karung','botol') NOT NULL,
  `harga_beli` varchar(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  `terima` int(11) NOT NULL,
  `belum` int(11) NOT NULL,
  `pakai` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan_bahan`
--

INSERT INTO `pemesanan_bahan` (`id`, `id_pemesanan`, `kode_supplier`, `nama_supplier`, `alamat`, `nama_produk`, `satuan`, `harga_beli`, `jumlah`, `tanggal_pesan`, `terima`, `belum`, `pakai`) VALUES
(1, '6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b', 'S0001', 'Aris Afriyanto', 'Aceh', 'Arabica Rosta', 'kg', '15000', 30, '2020-03-27', 1, 0, 0),
(2, '', 'S0002', 'Rohman', 'Semarang', 'Cappucino', 'bungkus', '17000', 8, '2020-03-31', 0, 0, 0),
(3, '4e07408562bedb8b60ce05c1decfe3ad16b72230967de01f640b7e4729b49fce', 'S0003', 'Afifah Khoir', 'Medan', 'Caramel', 'bungkus', '20000', 51, '2020-03-28', 1, 0, 9),
(4, '', 'S0001', 'Aris Afriyanto', 'Aceh', 'Caramel', 'bungkus', '20000', 45, '2020-04-01', 0, 0, 0),
(5, 'ef2d127de37b942baad06145e54b0c619a1f22327b2ebbcfbec78f5564afe39d', 'S0002', 'Rohman', 'Semarang', 'Arabica Rosta', 'kg', '15000', 32, '2020-03-26', 1, 0, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_bahan`
--
ALTER TABLE `data_bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_supplier`
--
ALTER TABLE `data_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemakaian_bahan`
--
ALTER TABLE `pemakaian_bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan_bahan`
--
ALTER TABLE `pemesanan_bahan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_bahan`
--
ALTER TABLE `data_bahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `data_supplier`
--
ALTER TABLE `data_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemakaian_bahan`
--
ALTER TABLE `pemakaian_bahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pemesanan_bahan`
--
ALTER TABLE `pemesanan_bahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
