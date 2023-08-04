-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2022 at 11:19 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `kd_transaksi` int(10) DEFAULT NULL,
  `jumlah` int(10) DEFAULT NULL,
  `sub_total` int(10) DEFAULT NULL,
  `size` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`kd_pemesanan`, `id_customer`, `kd_produk`, `kd_transaksi`, `jumlah`, `sub_total`, `size`) VALUES
(30, 1, 2, NULL, 2, 200000, 'XXL'),
(31, 1, 2, NULL, 3, 300000, 'XXL');

-- --------------------------------------------------------

--
-- Table structure for table `pengiriman`
--

CREATE TABLE `pengiriman` (
  `kd_pengiriman` int(10) NOT NULL,
  `kd_transaksi` int(10) DEFAULT NULL,
  `status_pengiriman` int(10) DEFAULT NULL,
  `ekspedisi` varchar(255) DEFAULT NULL,
  `ekspedisi_service` varchar(255) DEFAULT NULL,
  `ongkir` int(10) DEFAULT NULL,
  `no_resi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `harga` int(10) DEFAULT NULL,
  `foto_produk` text DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `harga`, `foto_produk`, `keterangan`) VALUES
(1, 'Seragam Putih Dongker', 120000, '7759c2cff3a229915129b09b1afaaa8e.jpeg', 'deskripsi keterangan produk'),
(2, 'Seragam Batik', 100000, '78b31efe49eff8bfa3da23b4dd3db991.jpeg', 'deskripsi keterangan produk'),
(3, 'Seragam Muslim', 100000, 'e43d85da9e4c6cc263a82766275edc9c.jpeg', 'deskripsi keterangan produk'),
(4, 'Seragam Pramuka', 120000, '5ae9b080d984682f31ac55b5ec2b2061.jpeg', 'deskripsi keterangan produk'),
(5, 'Seragam Olah Raga', 110000, '924ba36992a191c44746fce665b0fa85.jpeg', 'deskripsi keterangan produk');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `kd_transaksi` int(10) NOT NULL,
  `total_harga` int(10) DEFAULT NULL,
  `bukti_pembayaran` text DEFAULT NULL,
  `status_pembayaran` int(10) DEFAULT NULL,
  `tgl` date DEFAULT NULL,
  `status_transaksi` int(10) DEFAULT NULL,
  `id_customer` int(10) DEFAULT NULL,
  `total_biaya` int(10) DEFAULT NULL
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
('aku', '89ccfac87d8d06db06bf3211cb2d69ed', 1),
('asrul huda', '5111e795f8818c69fa4eb1889ecd7af7', 1),
('customer', '91ec1f9324753048c0096d036a694f86', 1),
('customer2', '5ce4d191fd14ac85a1469fb8c29b7a7b', 1),
('kurir', 'bb31e9f1f03ad601eb8fb53e4f663039', 2),
('operator', '4b583376b2767b923c3e1da60d10de59', 3),
('pemilik', '58399557dae3c60e23c78606771dfa3d', 4),
('PPL SAKATO', '4e8719806adb1b81020eebb0b0b2b9e4', 4),
('saya', '20c1a26a55039b30866c9d0aa51953ca', 1),
('SMP N 1 KECAMATAN SULIKI', '1d8c1eb2544474eeb07b96769f194bc3', 1),
('smpku', 'de2c93efee83ed4a4f85b898573f82e2', 1),
('smpni', '70e7c10fb69adf6c48a718d3569d072a', 1),
('smppadang', 'eff941e554ce7afb11f1334dac86eb30', 1),
('smptu', '1525da122ccc7229621097ba4fd6e51a', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_customer`
--

CREATE TABLE `user_customer` (
  `id` int(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `nama_penanggung_jawab` varchar(255) DEFAULT NULL,
  `telp` char(20) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `kode_pos` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_customer`
--

INSERT INTO `user_customer` (`id`, `nama`, `username`, `alamat`, `nama_penanggung_jawab`, `telp`, `provinsi`, `kota`, `kode_pos`) VALUES
(1, 'Isan Si Daguak', 'customer', 'Padang', NULL, NULL, NULL, NULL, NULL),
(2, 'Isan Si Daguak 22', 'customer2', 'Padang', NULL, NULL, NULL, NULL, NULL),
(3, 'SMP N 1 KECAMATAN SULIKI', 'SMP N 1 KECAMATAN SULIKI', 'LIMBANANG', NULL, NULL, NULL, NULL, NULL),
(7, 'smpku', 'smpku', 'smpku', NULL, NULL, NULL, NULL, NULL),
(8, '', 'smptu', '', NULL, NULL, NULL, NULL, NULL),
(9, 'smpni', 'smpni', 'smpni\r\n', NULL, NULL, NULL, NULL, NULL),
(10, 'saya', 'saya', 'saya', NULL, NULL, NULL, NULL, NULL),
(11, 'pembangunan', 'asrul huda', 'padang', NULL, NULL, NULL, NULL, NULL);

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
(1, 'ADMIN', 'admin', 'admin'),
(2, 'OPERATOR', 'operator', 'operator'),
(3, 'KURIR', 'kurir', 'kurir'),
(4, 'PEMILIK', 'pemilik', 'pemilik'),
(6, 'PPL SAKATO', 'PPL SAKATO', 'pemilik');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pemesanan`
-- (See below for the actual view)
--
CREATE TABLE `v_pemesanan` (
`kd_pemesanan` int(10)
,`jumlah` int(10)
,`sub_total` int(10)
,`size` varchar(50)
,`id` int(10)
,`nama` varchar(50)
,`username` varchar(50)
,`alamat` text
,`nama_penanggung_jawab` varchar(255)
,`telp` char(20)
,`provinsi` varchar(255)
,`kota` varchar(255)
,`kode_pos` varchar(255)
,`kd_produk` int(10)
,`nama_produk` varchar(50)
,`harga` int(10)
,`foto_produk` text
,`keterangan` text
,`kd_transaksi` int(10)
,`total_harga` int(10)
,`bukti_pembayaran` text
,`status_pembayaran` int(10)
,`tgl` date
,`status_transaksi` int(10)
,`id_customer` int(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pengiriman`
-- (See below for the actual view)
--
CREATE TABLE `v_pengiriman` (
`id` int(10)
,`nama` varchar(50)
,`username` varchar(50)
,`alamat` text
,`nama_penanggung_jawab` varchar(255)
,`telp` char(20)
,`provinsi` varchar(255)
,`kota` varchar(255)
,`kode_pos` varchar(255)
,`kd_transaksi` int(10)
,`total_harga` int(10)
,`bukti_pembayaran` text
,`status_pembayaran` int(10)
,`tgl` date
,`status_transaksi` int(10)
,`kd_pengiriman` int(10)
,`status_pengiriman` int(10)
,`ekspedisi` varchar(255)
,`ekspedisi_service` varchar(255)
,`ongkir` int(10)
,`no_resi` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_pesanan`
-- (See below for the actual view)
--
CREATE TABLE `v_pesanan` (
`id` int(10)
,`nama` varchar(50)
,`harga` int(10)
,`foto_produk` text
,`keterangan` text
,`kd_pemesanan` int(10)
,`id_customer` int(10)
,`jumlah` int(10)
,`sub_total` int(10)
,`size` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_transaksi`
-- (See below for the actual view)
--
CREATE TABLE `v_transaksi` (
`id` int(10)
,`nama` varchar(50)
,`username` varchar(50)
,`alamat` text
,`nama_penanggung_jawab` varchar(255)
,`telp` char(20)
,`provinsi` varchar(255)
,`kota` varchar(255)
,`kode_pos` varchar(255)
,`kd_transaksi` int(10)
,`total_harga` int(10)
,`bukti_pembayaran` text
,`status_pembayaran` int(10)
,`tgl` date
,`status_transaksi` int(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_user_customer`
-- (See below for the actual view)
--
CREATE TABLE `v_user_customer` (
`username` varchar(50)
,`password` varchar(50)
,`level` int(10)
,`id` int(10)
,`nama` varchar(50)
,`alamat` text
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_user_toko`
-- (See below for the actual view)
--
CREATE TABLE `v_user_toko` (
`username` varchar(50)
,`password` varchar(50)
,`level` int(10)
,`id` int(10)
,`nama` varchar(50)
,`jabatan` varchar(50)
);

-- --------------------------------------------------------

--
-- Structure for view `v_pemesanan`
--
DROP TABLE IF EXISTS `v_pemesanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pemesanan`  AS  select `pemesanan`.`kd_pemesanan` AS `kd_pemesanan`,`pemesanan`.`jumlah` AS `jumlah`,`pemesanan`.`sub_total` AS `sub_total`,`pemesanan`.`size` AS `size`,`user_customer`.`id` AS `id`,`user_customer`.`nama` AS `nama`,`user_customer`.`username` AS `username`,`user_customer`.`alamat` AS `alamat`,`user_customer`.`nama_penanggung_jawab` AS `nama_penanggung_jawab`,`user_customer`.`telp` AS `telp`,`user_customer`.`provinsi` AS `provinsi`,`user_customer`.`kota` AS `kota`,`user_customer`.`kode_pos` AS `kode_pos`,`produk`.`id` AS `kd_produk`,`produk`.`nama` AS `nama_produk`,`produk`.`harga` AS `harga`,`produk`.`foto_produk` AS `foto_produk`,`produk`.`keterangan` AS `keterangan`,`transaksi`.`kd_transaksi` AS `kd_transaksi`,`transaksi`.`total_harga` AS `total_harga`,`transaksi`.`bukti_pembayaran` AS `bukti_pembayaran`,`transaksi`.`status_pembayaran` AS `status_pembayaran`,`transaksi`.`tgl` AS `tgl`,`transaksi`.`status_transaksi` AS `status_transaksi`,`transaksi`.`id_customer` AS `id_customer` from (((`pemesanan` join `user_customer`) join `produk`) join `transaksi`) where `pemesanan`.`id_customer` = `user_customer`.`id` and `pemesanan`.`kd_produk` = `produk`.`id` and `pemesanan`.`kd_transaksi` = `transaksi`.`kd_transaksi` ;

-- --------------------------------------------------------

--
-- Structure for view `v_pengiriman`
--
DROP TABLE IF EXISTS `v_pengiriman`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pengiriman`  AS  select `v_transaksi`.`id` AS `id`,`v_transaksi`.`nama` AS `nama`,`v_transaksi`.`username` AS `username`,`v_transaksi`.`alamat` AS `alamat`,`v_transaksi`.`nama_penanggung_jawab` AS `nama_penanggung_jawab`,`v_transaksi`.`telp` AS `telp`,`v_transaksi`.`provinsi` AS `provinsi`,`v_transaksi`.`kota` AS `kota`,`v_transaksi`.`kode_pos` AS `kode_pos`,`v_transaksi`.`kd_transaksi` AS `kd_transaksi`,`v_transaksi`.`total_harga` AS `total_harga`,`v_transaksi`.`bukti_pembayaran` AS `bukti_pembayaran`,`v_transaksi`.`status_pembayaran` AS `status_pembayaran`,`v_transaksi`.`tgl` AS `tgl`,`v_transaksi`.`status_transaksi` AS `status_transaksi`,`pengiriman`.`kd_pengiriman` AS `kd_pengiriman`,`pengiriman`.`status_pengiriman` AS `status_pengiriman`,`pengiriman`.`ekspedisi` AS `ekspedisi`,`pengiriman`.`ekspedisi_service` AS `ekspedisi_service`,`pengiriman`.`ongkir` AS `ongkir`,`pengiriman`.`no_resi` AS `no_resi` from (`pengiriman` join `v_transaksi`) where `pengiriman`.`kd_transaksi` = `v_transaksi`.`kd_transaksi` ;

-- --------------------------------------------------------

--
-- Structure for view `v_pesanan`
--
DROP TABLE IF EXISTS `v_pesanan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_pesanan`  AS  select `produk`.`id` AS `id`,`produk`.`nama` AS `nama`,`produk`.`harga` AS `harga`,`produk`.`foto_produk` AS `foto_produk`,`produk`.`keterangan` AS `keterangan`,`pemesanan`.`kd_pemesanan` AS `kd_pemesanan`,`pemesanan`.`id_customer` AS `id_customer`,`pemesanan`.`jumlah` AS `jumlah`,`pemesanan`.`sub_total` AS `sub_total`,`pemesanan`.`size` AS `size` from (`pemesanan` join `produk`) where `pemesanan`.`kd_produk` = `produk`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `v_transaksi`
--
DROP TABLE IF EXISTS `v_transaksi`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_transaksi`  AS  select `user_customer`.`id` AS `id`,`user_customer`.`nama` AS `nama`,`user_customer`.`username` AS `username`,`user_customer`.`alamat` AS `alamat`,`user_customer`.`nama_penanggung_jawab` AS `nama_penanggung_jawab`,`user_customer`.`telp` AS `telp`,`user_customer`.`provinsi` AS `provinsi`,`user_customer`.`kota` AS `kota`,`user_customer`.`kode_pos` AS `kode_pos`,`transaksi`.`kd_transaksi` AS `kd_transaksi`,`transaksi`.`total_harga` AS `total_harga`,`transaksi`.`bukti_pembayaran` AS `bukti_pembayaran`,`transaksi`.`status_pembayaran` AS `status_pembayaran`,`transaksi`.`tgl` AS `tgl`,`transaksi`.`status_transaksi` AS `status_transaksi` from (`transaksi` join `user_customer`) where `transaksi`.`id_customer` = `user_customer`.`id` ;

-- --------------------------------------------------------

--
-- Structure for view `v_user_customer`
--
DROP TABLE IF EXISTS `v_user_customer`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_user_customer`  AS  select `user`.`username` AS `username`,`user`.`password` AS `password`,`user`.`level` AS `level`,`user_customer`.`id` AS `id`,`user_customer`.`nama` AS `nama`,`user_customer`.`alamat` AS `alamat` from (`user` join `user_customer`) where `user`.`username` = `user_customer`.`username` ;

-- --------------------------------------------------------

--
-- Structure for view `v_user_toko`
--
DROP TABLE IF EXISTS `v_user_toko`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_user_toko`  AS  select `user`.`username` AS `username`,`user`.`password` AS `password`,`user`.`level` AS `level`,`user_toko`.`id` AS `id`,`user_toko`.`nama` AS `nama`,`user_toko`.`jabatan` AS `jabatan` from (`user` join `user_toko`) where `user`.`username` = `user_toko`.`username` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`kd_pemesanan`),
  ADD KEY `id_customer` (`id_customer`),
  ADD KEY `kd_produk` (`kd_produk`),
  ADD KEY `kd_transaksi` (`kd_transaksi`);

--
-- Indexes for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`kd_pengiriman`),
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
  ADD KEY `id_customer` (`id_customer`);

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
  MODIFY `kd_pemesanan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `kd_pengiriman` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `kd_transaksi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user_customer`
--
ALTER TABLE `user_customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_toko`
--
ALTER TABLE `user_toko`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `user_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`kd_produk`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`kd_transaksi`) REFERENCES `transaksi` (`kd_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD CONSTRAINT `pengiriman_ibfk_2` FOREIGN KEY (`kd_transaksi`) REFERENCES `transaksi` (`kd_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `user_customer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
