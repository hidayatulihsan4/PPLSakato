-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2022 at 07:34 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ppl_sakato`
--

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `kd_pemesanan` int(10) NOT NULL,
  `id_customer` int(10) DEFAULT NULL,
  `kd_produk` int(10) DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL,
  `tgl` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `kd_pengiriman` int(10) NOT NULL,
  `id_user_toko` int(10) DEFAULT NULL,
  `kd_transaksi` int(10) DEFAULT NULL,
  `status_pengiriman` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `harga` int(10) DEFAULT NULL,
  `foto_produk` text,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kd_transaksi` int(10) NOT NULL,
  `kd_pemesanan` int(10) DEFAULT NULL,
  `total_harga` int(10) DEFAULT NULL,
  `bukti_pembayaran` text,
  `status_pembayaran` int(10) DEFAULT NULL,
  `tgl` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) DEFAULT NULL,
  `level` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `level`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 5),
('admin2', 'c84258e9c39059a89ab77d846ddab909', 5),
('customer', '91ec1f9324753048c0096d036a694f86', 1),
('customer2', '5ce4d191fd14ac85a1469fb8c29b7a7b', 1),
('kurir', 'bb31e9f1f03ad601eb8fb53e4f663039', 2),
('operator', '4b583376b2767b923c3e1da60d10de59', 3),
('pemilik', '58399557dae3c60e23c78606771dfa3d', 4);

-- --------------------------------------------------------

--
-- Table structure for table `user_customer`
--

CREATE TABLE `user_customer` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `alamat` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_customer`
--

INSERT INTO `user_customer` (`id`, `nama`, `username`, `alamat`) VALUES
(1, 'Isan Si Daguak', 'customer', 'Padang'),
(2, 'Isan Si Daguak 22', 'customer2', 'Padang');

-- --------------------------------------------------------

--
-- Table structure for table `user_toko`
--

CREATE TABLE `user_toko` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_toko`
--

INSERT INTO `user_toko` (`id`, `nama`, `username`, `jabatan`) VALUES
(1, 'HIDAYATUL IHSAN', 'admin', 'admin'),
(2, 'HIDAYATUL IHSAN Daguak', 'operator', 'Operator'),
(3, 'HIDAYATUL Daguak IHSAN', 'kurir', 'Kurir'),
(4, 'Daguak Isan Panjang', 'pemilik', 'Pemilik'),
(5, 'Isan Si Daguak 2', 'admin2', 'admin');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_transaksi`
-- (See below for the actual view)
--
CREATE TABLE `v_transaksi` (
`kd_transaksi` int(10)
,`kd_pemesanan` int(10)
,`total_harga` int(10)
,`bukti_pembayaran` text
,`status_pembayaran` int(10)
,`tgl` date
,`id` int(10)
,`nama` varchar(50)
,`username` varchar(50)
,`alamat` text
,`kd_produk` int(10)
,`nama_produk` varchar(50)
,`harga_produk` int(10)
,`foto_produk` text
,`keterangan_produk` text
,`jumlah` int(10)
,`tgl_pemesanan` date
);

-- --------------------------------------------------------

--
-- Structure for view `v_transaksi`
--
DROP TABLE IF EXISTS `v_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_transaksi`  AS  select `transaksi`.`kd_transaksi` AS `kd_transaksi`,`transaksi`.`kd_pemesanan` AS `kd_pemesanan`,`transaksi`.`total_harga` AS `total_harga`,`transaksi`.`bukti_pembayaran` AS `bukti_pembayaran`,`transaksi`.`status_pembayaran` AS `status_pembayaran`,`transaksi`.`tgl` AS `tgl`,`user_customer`.`id` AS `id`,`user_customer`.`nama` AS `nama`,`user_customer`.`username` AS `username`,`user_customer`.`alamat` AS `alamat`,`produk`.`id` AS `kd_produk`,`produk`.`nama` AS `nama_produk`,`produk`.`harga` AS `harga_produk`,`produk`.`foto_produk` AS `foto_produk`,`produk`.`keterangan` AS `keterangan_produk`,`pemesanan`.`jumlah` AS `jumlah`,`pemesanan`.`tgl` AS `tgl_pemesanan` from (((`transaksi` join `pemesanan`) join `produk`) join `user_customer`) where ((`transaksi`.`kd_pemesanan` = `pemesanan`.`kd_pemesanan`) and (`pemesanan`.`id_customer` = `user_customer`.`id`) and (`pemesanan`.`kd_produk` = `produk`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`kd_pemesanan`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `kd_produk` (`kd_produk`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`kd_pengiriman`),
  ADD KEY `id_user_toko` (`id_user_toko`),
  ADD KEY `kd_transaksi` (`kd_transaksi`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`kd_transaksi`),
  ADD KEY `kd_pemesanan` (`kd_pemesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `user_customer`
--
ALTER TABLE `user_customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `user_toko`
--
ALTER TABLE `user_toko`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `kd_pemesanan` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `kd_pengiriman` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kd_transaksi` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_customer`
--
ALTER TABLE `user_customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_toko`
--
ALTER TABLE `user_toko`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `user_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`kd_produk`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_1` FOREIGN KEY (`id_user_toko`) REFERENCES `user_toko` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pengiriman_ibfk_2` FOREIGN KEY (`kd_transaksi`) REFERENCES `transaksi` (`kd_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`kd_pemesanan`) REFERENCES `pemesanan` (`kd_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_customer`
--
ALTER TABLE `user_customer`
  ADD CONSTRAINT `user_customer_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_toko`
--
ALTER TABLE `user_toko`
  ADD CONSTRAINT `user_toko_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
