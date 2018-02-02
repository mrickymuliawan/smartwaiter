-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2017 at 05:39 AM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartwaiter`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderlist`
--

CREATE TABLE `tbl_orderlist` (
  `kode_order` int(11) NOT NULL,
  `kode_user` int(11) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `kode_produk` int(11) DEFAULT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `keterangan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_orderlist`
--

INSERT INTO `tbl_orderlist` (`kode_order`, `kode_user`, `username`, `kode_produk`, `nama_produk`, `harga`, `kuantitas`, `total`, `status`, `keterangan`) VALUES
(1, 2, 'meja1', 1, 'roti bakar', 20000, 1, 10000, 'selesai', ''),
(2, 2, 'meja1', 2, 'roti goren', 20000, 1, 20000, 'selesai', ''),
(3, 2, 'meja1', 4, 'sate kambing', 20000, 1, 20000, 'selesai', ''),
(4, 2, 'meja1', 5, 'teh botol', 5000, 1, 5000, 'selesai', ''),
(5, 2, 'meja1', 6, 'aqua', 5000, 1, 5000, 'selesai', ''),
(6, 2, 'meja1', 4, 'sate kambing', 20000, 1, 20000, 'selesai', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualan`
--

CREATE TABLE `tbl_penjualan` (
  `kode_penjualan` int(11) NOT NULL,
  `kode_user` int(11) NOT NULL,
  `tanggal` datetime DEFAULT NULL,
  `total_item` int(11) DEFAULT NULL,
  `bayar` int(11) DEFAULT NULL,
  `kembali` int(11) DEFAULT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `profit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penjualan`
--

INSERT INTO `tbl_penjualan` (`kode_penjualan`, `kode_user`, `tanggal`, `total_item`, `bayar`, `kembali`, `total_harga`, `profit`) VALUES
(17693, 1, '2017-12-15 23:10:29', 2, 50000, 10000, 40000, 20000),
(1955101, 1, '2017-12-15 23:09:18', 2, 50000, 10000, 40000, 20000),
(6005814, 1, '2017-12-15 23:11:38', 2, 50000, 10000, 40000, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penjualandetail`
--

CREATE TABLE `tbl_penjualandetail` (
  `kode_penjualan` int(11) DEFAULT NULL,
  `kode_produk` int(11) DEFAULT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  `kuantitas` int(11) DEFAULT NULL,
  `harga_modal` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `diskon` float DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `profit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penjualandetail`
--

INSERT INTO `tbl_penjualandetail` (`kode_penjualan`, `kode_produk`, `nama_produk`, `kuantitas`, `harga_modal`, `harga_jual`, `diskon`, `total`, `profit`) VALUES
(1955101, 2, 'roti goren', 1, 10000, 20000, 0, 20000, 10000),
(1955101, 3, 'sate ayam', 1, 10000, 20000, 0, 20000, 10000),
(17693, 3, 'sate ayam', 2, 10000, 20000, 0, 40000, 20000),
(6005814, 3, 'sate ayam', 1, 10000, 20000, 0, 20000, 10000),
(6005814, 4, 'sate kambing', 1, 10000, 20000, 0, 20000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_produk`
--

CREATE TABLE `tbl_produk` (
  `kode_produk` int(11) NOT NULL,
  `nama_produk` varchar(50) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `harga_modal` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `diskon` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_produk`
--

INSERT INTO `tbl_produk` (`kode_produk`, `nama_produk`, `kategori`, `harga_modal`, `harga_jual`, `diskon`) VALUES
(1, 'roti bakar', 'makanan', 10000, 20000, 0.5),
(2, 'roti goren', 'makanan', 10000, 20000, 0),
(3, 'sate ayam', 'makanan', 10000, 20000, 0),
(4, 'sate kambing', 'makanan', 10000, 20000, 0),
(5, 'teh botol', 'minuman', 3000, 5000, 0),
(6, 'aqua', 'minuman', 3000, 5000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `kode_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` enum('admin','meja') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`kode_user`, `username`, `password`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'meja1', '10705f86b703823d889c434c01419350', 'meja'),
(3, 'meja2', '7b2c6d18787edfdbfd9e67ccdbb15c4b', 'meja'),
(4, 'kasir', 'c7911af3adbd12a035b289556d96470a', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_orderlist`
--
ALTER TABLE `tbl_orderlist`
  ADD PRIMARY KEY (`kode_order`);

--
-- Indexes for table `tbl_penjualan`
--
ALTER TABLE `tbl_penjualan`
  ADD PRIMARY KEY (`kode_penjualan`);

--
-- Indexes for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  ADD PRIMARY KEY (`kode_produk`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`kode_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_orderlist`
--
ALTER TABLE `tbl_orderlist`
  MODIFY `kode_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_produk`
--
ALTER TABLE `tbl_produk`
  MODIFY `kode_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `kode_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
