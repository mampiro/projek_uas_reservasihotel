-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2022 at 03:34 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservasihotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `no_kamar` char(5) NOT NULL,
  `harga_kamar` bigint(15) NOT NULL,
  `fasilitas_kamar` text NOT NULL,
  `status_kamar` int(2) NOT NULL,
  `id_kelas_kamar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `no_kamar`, `harga_kamar`, `fasilitas_kamar`, `status_kamar`, `id_kelas_kamar`) VALUES
(1, '1001', 981818, '<p><span style=\"font-size: 1rem;\">Kamar dirancang demi kenyamanan anda selama menginap . Dilengkapi fasilitas seperti AC, TV dan lain-lain.&nbsp;</span><br></p><p>Fasilitas Kamar :&nbsp;</p> AC&nbsp;, TV, Minibar,&nbsp;Brankas,&nbsp;Tempat tidur yang nyaman, Kamar mandi, Akses internet', 1, 1),
(2, '1002', 981818, '<p>Kamar dirancang demi kenyamanan anda selama menginap . Dilengkapi fasilitas seperti AC, TV dan lain-lain. </p><p>Fasilitas Kamar : </p> AC , TV, Minibar, Brankas, Tempat tidur yang nyaman, Kamar mandi, Akses internet', 0, 1),
(7, '2001', 454545, '<p>Kamar dirancang demi kenyamanan anda selama menginap . Dilengkapi fasilitas seperti AC, TV dan lain-lain. </p><p>Fasilitas Kamar : </p> AC , TV, Minibar, Brankas, Tempat tidur yang nyaman, Kamar mandi, Akses internet dan Tanpa Sarapan', 1, 3),
(8, '2002', 454545, '<p>Kamar dirancang demi kenyamanan anda selama menginap . Dilengkapi fasilitas seperti AC, TV dan lain-lain. </p><p>Fasilitas Kamar : </p> AC , TV, Minibar, Brankas, Tempat tidur yang nyaman, Kamar mandi, Akses internet dan Tanpa Sarapan', 0, 3),
(9, '2003', 568595, '<p>Kamar dirancang demi kenyamanan anda selama menginap . Dilengkapi fasilitas seperti AC, TV dan lain-lain. </p><p>Fasilitas Kamar : </p> AC , TV, Minibar, Brankas, Tempat tidur yang nyaman, Kamar mandi, Akses internet, Dengan Sarapan', 0, 2),
(10, '1003', 568595, '<p>Kamar dirancang demi kenyamanan anda selama menginap . Dilengkapi fasilitas seperti AC, TV dan lain-lain. </p><p>Fasilitas Kamar : </p> AC , TV, Minibar, Brankas, Tempat tidur yang nyaman, Kamar mandi, Akses internet, Dengan Sarapan', 0, 2),
(12, '1212', 30000, '<p>ada<br></p>', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kamar_gambar`
--

CREATE TABLE `kamar_gambar` (
  `id_kamar_gambar` int(5) NOT NULL,
  `nama_kamar_gambar` varchar(50) NOT NULL,
  `id_kamar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kamar_gambar`
--

INSERT INTO `kamar_gambar` (`id_kamar_gambar`, `nama_kamar_gambar`, `id_kamar`) VALUES
(1, 'nama_kamar_gambar1574452364.jpg', 1),
(4, 'nama_kamar_gambar1574464177.jpg', 2),
(5, 'nama_kamar_gambar1574464197.jpeg', 3),
(6, 'nama_kamar_gambar1574464209.jpg', 4),
(7, 'nama_kamar_gambar1574464217.jpg', 5),
(8, 'nama_kamar_gambar1574464228.jpg', 6),
(9, 'nama_kamar_gambar1574464551.jpg', 2),
(10, 'nama_kamar_gambar1574692697.jpg', 7),
(11, 'nama_kamar_gambar1574692704.jpg', 8),
(12, 'nama_kamar_gambar1574692715.jpg', 9),
(13, 'nama_kamar_gambar1574692739.jpg', 10),
(14, 'nama_kamar_gambar1574700111.jpg', 11),
(15, 'nama_kamar_gambar1574700126.jpg', 12),
(16, 'nama_kamar_gambar1574700138.jpg', 13),
(17, 'nama_kamar_gambar1574700156.jpg', 14),
(18, 'nama_kamar_gambar1574700164.jpg', 15),
(19, 'nama_kamar_gambar1574700173.jpg', 16),
(20, 'nama_kamar_gambar1574700183.jpg', 17),
(21, 'nama_kamar_gambar1574700195.jpeg', 18),
(22, 'nama_kamar_gambar1574700204.jpg', 19),
(23, 'nama_kamar_gambar1574700212.jpg', 20),
(24, 'nama_kamar_gambar1574700221.jpg', 21),
(25, 'nama_kamar_gambar1574700229.jpg', 22),
(26, 'nama_kamar_gambar1574700237.jpg', 23),
(27, 'nama_kamar_gambar1574700247.jpg', 24),
(28, 'nama_kamar_gambar1574700254.jpg', 25),
(29, 'nama_kamar_gambar1574700263.jpg', 26),
(30, 'nama_kamar_gambar1574700274.jpg', 27),
(31, 'nama_kamar_gambar1574700281.jpg', 28),
(32, 'nama_kamar_gambar1574700289.jpg', 29),
(33, 'nama_kamar_gambar1574700298.jpeg', 30),
(34, 'nama_kamar_gambar1574700306.jpeg', 31),
(35, 'nama_kamar_gambar1574700314.jpg', 32),
(36, 'nama_kamar_gambar1574700322.jpg', 33),
(37, 'nama_kamar_gambar1574700331.jpg', 34),
(38, 'nama_kamar_gambar1574700338.jpg', 35),
(39, 'nama_kamar_gambar1574700345.jpg', 36),
(40, 'nama_kamar_gambar1574700353.jpg', 37),
(41, 'nama_kamar_gambar1574700360.jpg', 38),
(42, 'nama_kamar_gambar1574700367.jpg', 39),
(43, 'nama_kamar_gambar1574700377.jpg', 40),
(44, 'nama_kamar_gambar1574700387.jpg', 41),
(45, 'nama_kamar_gambar1574700395.jpg', 42),
(46, 'nama_kamar_gambar1574700403.jpg', 43),
(47, 'nama_kamar_gambar1574700410.jpg', 44),
(48, 'nama_kamar_gambar1574752414.jpg', 1),
(49, 'nama_kamar_gambar1574752424.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_kamar`
--

CREATE TABLE `kelas_kamar` (
  `id_kelas_kamar` int(5) NOT NULL,
  `nama_kelas_kamar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_kamar`
--

INSERT INTO `kelas_kamar` (`id_kelas_kamar`, `nama_kelas_kamar`) VALUES
(1, 'KELAS SUITE'),
(2, 'KELAS DELUXE'),
(3, 'KELAS DELUXE ROOM ONLY');

-- --------------------------------------------------------

--
-- Table structure for table `output_mitrans`
--

CREATE TABLE `output_mitrans` (
  `id` int(11) NOT NULL,
  `status_code` int(11) NOT NULL,
  `status_message` varchar(50) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  `order_id` int(11) NOT NULL,
  `gross_amount` int(11) NOT NULL,
  `payment_type` varchar(30) NOT NULL,
  `transaction_time` datetime NOT NULL,
  `transaction_status` varchar(20) NOT NULL,
  `va_numbers_bank` varchar(30) DEFAULT NULL,
  `va_numbers_va_number` int(100) DEFAULT NULL,
  `fraud_status` varchar(20) DEFAULT NULL,
  `pdf_url` varchar(255) NOT NULL,
  `finish_redirect_url` varchar(255) NOT NULL,
  `id_pendaftar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `output_mitrans`
--

INSERT INTO `output_mitrans` (`id`, `status_code`, `status_message`, `transaction_id`, `order_id`, `gross_amount`, `payment_type`, `transaction_time`, `transaction_status`, `va_numbers_bank`, `va_numbers_va_number`, `fraud_status`, `pdf_url`, `finish_redirect_url`, `id_pendaftar`) VALUES
(1, 201, 'Transaksi sedang diproses', 'f52f88c2-b4f8-4c47-921f-cf1460346968', 25443, 986818, 'bank_transfer', '2022-04-24 11:56:36', 'pending', 'bri', 2147483647, 'accept', 'Transaksi sedang diproses', 'Transaksi sedang diproses', 1),
(2, 201, 'Transaksi sedang diproses', '71dc0ac4-404c-4d99-9247-4e304a511867', 11104, 459545, 'echannel', '2022-04-24 12:52:59', 'pending', NULL, NULL, 'accept', 'Transaksi sedang diproses', 'Transaksi sedang diproses', 1),
(3, 201, 'Transaksi sedang diproses', '88098ee2-44c9-4d2c-b8ab-93f8a912fcee', 26649, 986818, 'echannel', '2022-04-24 12:55:15', 'pending', NULL, NULL, 'accept', 'Transaksi sedang diproses', 'Transaksi sedang diproses', 1),
(4, 201, 'Transaksi sedang diproses', '19e4cd47-e680-498e-90de-115dbaacfc47', 5549, 986818, 'bank_transfer', '2022-04-24 13:24:49', 'pending', 'bni', 2147483647, 'accept', 'Transaksi sedang diproses', 'Transaksi sedang diproses', 1),
(5, 201, 'Transaksi sedang diproses', '4d5888e8-94a4-48b8-9016-717b479c8c2c', 27918, 1555413, 'bank_transfer', '2022-04-24 21:52:26', 'pending', 'bri', 2147483647, 'accept', 'Transaksi sedang diproses', 'Transaksi sedang diproses', 1),
(6, 201, 'Transaksi sedang diproses', '9e5eacd6-c0d2-41d8-b9cd-3b2f8d30b41d', 28486, 986818, 'bank_transfer', '2022-04-25 21:23:48', 'pending', 'bri', 2147483647, 'accept', 'Transaksi sedang diproses', 'Transaksi sedang diproses', 1),
(7, 201, 'Transaksi sedang diproses', '8a648f84-c771-46f6-b854-5a23cfd997fa', 7140, 986818, 'bank_transfer', '2022-04-25 23:24:34', 'pending', 'bni', 2147483647, 'accept', 'Transaksi sedang diproses', 'Transaksi sedang diproses', 1),
(8, 201, 'Transaksi sedang diproses', 'da515f6a-ffe2-41b5-9f36-a3a9f25d5e0b', 21036, 986818, 'bank_transfer', '2022-06-05 20:00:28', 'pending', 'bri', 2147483647, 'accept', 'Transaksi sedang diproses', 'Transaksi sedang diproses', 1),
(9, 201, 'Transaksi sedang diproses', '26f659dd-efbc-4274-8ea4-1384b0a8ea72', 27809, 986818, 'bank_transfer', '2022-06-05 20:24:12', 'pending', 'bri', 2147483647, 'accept', 'Transaksi sedang diproses', 'Transaksi sedang diproses', 1),
(10, 201, 'Transaksi sedang diproses', '418d5efb-8670-4b9b-912b-7bef97281982', 7017, 986818, 'bank_transfer', '2022-06-05 20:44:13', 'pending', 'bri', 2147483647, 'accept', 'Transaksi sedang diproses', 'Transaksi sedang diproses', 1),
(11, 201, 'Transaksi sedang diproses', '5e95422e-f3f5-4c70-88ac-989d9c2ea693', 20753, 986818, 'bank_transfer', '2022-06-05 20:57:47', 'pending', 'bri', 2147483647, 'accept', 'Transaksi sedang diproses', 'Transaksi sedang diproses', 1),
(12, 201, 'Transaksi sedang diproses', '06a00540-6d04-48b1-96d4-b1a9a8d16c99', 16722, 1968636, 'bank_transfer', '2022-06-05 21:04:12', 'pending', 'bri', 2147483647, 'accept', 'Transaksi sedang diproses', 'Transaksi sedang diproses', 1),
(13, 201, 'Transaksi sedang diproses', '127248cb-db01-4098-890b-fd3867db1deb', 2929, 986818, 'bank_transfer', '2022-06-05 21:35:14', 'pending', 'bri', 2147483647, 'accept', 'Transaksi sedang diproses', 'Transaksi sedang diproses', 1),
(14, 201, 'Transaksi sedang diproses', 'd44422d9-8761-4605-bf9a-6534e2dc886c', 1317, 1968636, 'bank_transfer', '2022-06-05 22:54:25', 'pending', 'bri', 2147483647, 'accept', 'Transaksi sedang diproses', 'Transaksi sedang diproses', 1),
(15, 201, 'Transaksi sedang diproses', '4353ac97-390a-45d7-8823-f8a0f434ec3c', 29742, 1441363, 'bank_transfer', '2022-06-11 11:37:17', 'pending', 'bni', 2147483647, 'accept', 'Transaksi sedang diproses', 'Transaksi sedang diproses', 1),
(16, 201, 'Transaksi sedang diproses', 'b398d1cd-3d2e-49ea-95df-1ea2ebf3050e', 11215, 1441363, 'bank_transfer', '2022-06-11 11:37:49', 'pending', 'bri', 2147483647, 'accept', 'Transaksi sedang diproses', 'Transaksi sedang diproses', 1),
(17, 201, 'Transaksi sedang diproses', 'b398d1cd-3d2e-49ea-95df-1ea2ebf3050e', 11215, 1441363, 'bank_transfer', '2022-06-11 11:37:49', 'pending', 'bri', 2147483647, 'accept', 'Transaksi sedang diproses', 'Transaksi sedang diproses', 1),
(18, 201, 'Success, transaction is found', '69abaf50-6795-4496-a6e3-9d7086eca6a0', 14881, 1968636, 'bank_transfer', '2022-06-30 10:37:20', 'pending', 'bri', 2147483647, 'accept', 'Success, transaction is found', 'Success, transaction is found', 3),
(19, 201, 'Success, transaction is found', 'd3efaa82-01fe-4b6c-b905-5655bf6eb40d', 32681, 459545, 'bank_transfer', '2022-06-30 10:42:44', 'pending', 'bri', 2147483647, 'accept', 'Success, transaction is found', 'Success, transaction is found', 3),
(20, 201, 'Success, transaction is found', 'f0881dec-6f55-442e-84e5-3a7bd57583d8', 2350, 1441363, 'bank_transfer', '2022-06-30 10:58:01', 'pending', 'bri', 2147483647, 'accept', 'Success, transaction is found', 'Success, transaction is found', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id_pendaftar` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `ktp` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pendaftar`
--

INSERT INTO `pendaftar` (`id_pendaftar`, `nama`, `alamat`, `no_hp`, `ktp`, `foto`, `email`, `password`) VALUES
(1, 'Endip Yus Fauzi', '', '', '', '', 'fauzi_dotmail@yahoo.co.id', '202cb962ac59075b964b07152d234b70'),
(2, 'Endip Yus Fauzi', 'Jl Magelang KM 16', '0875433433', '232323', '', 'fauzi_dotmail@yahoo.co.id', '202cb962ac59075b964b07152d234b70'),
(3, 'Kelvin', 'Jl Magelang KM 16', '087665525', '1234567', '16565601191.jpg', 'kelvin@yahoo.com', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `id_pendaftar` int(11) NOT NULL,
  `total_harga` int(10) NOT NULL,
  `status_pembayaran` int(1) NOT NULL,
  `tgl_entry` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `id_pendaftar`, `total_harga`, `status_pembayaran`, `tgl_entry`) VALUES
(1, 3, 1963636, 1, '2022-06-30 10:37:26'),
(2, 3, 454545, 1, '2022-06-30 10:42:47'),
(3, 3, 1436363, 1, '2022-06-30 10:58:04');

-- --------------------------------------------------------

--
-- Table structure for table `reservasi_detail`
--

CREATE TABLE `reservasi_detail` (
  `id_reservasi_detail` int(11) NOT NULL,
  `id_reservasi` int(11) NOT NULL,
  `tgl_reservasi_masuk` date NOT NULL,
  `tgl_reservasi_keluar` date NOT NULL,
  `harga_plus_hari` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `status_reservasi` int(2) NOT NULL,
  `tgl_entry` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservasi_detail`
--

INSERT INTO `reservasi_detail` (`id_reservasi_detail`, `id_reservasi`, `tgl_reservasi_masuk`, `tgl_reservasi_keluar`, `harga_plus_hari`, `id_kamar`, `status_reservasi`, `tgl_entry`) VALUES
(1, 1, '2022-07-01', '2022-07-02', 981818, 1, 2, '2022-06-30 10:37:26'),
(2, 1, '2022-07-01', '2022-07-02', 981818, 2, 2, '2022-06-30 10:37:27'),
(3, 2, '2022-07-01', '2022-07-02', 454545, 7, 2, '2022-06-30 10:42:47'),
(4, 3, '2022-07-01', '2022-07-02', 454545, 7, 1, '2022-06-30 10:58:04'),
(5, 3, '2022-07-01', '2022-07-02', 981818, 1, 1, '2022-06-30 10:58:04');

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `id_saran` int(11) NOT NULL,
  `nama_saran` varchar(50) NOT NULL,
  `email_saran` varchar(25) NOT NULL,
  `tlp_saran` bigint(15) NOT NULL,
  `isi_saran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `temp_reservasi`
--

CREATE TABLE `temp_reservasi` (
  `id_temp_reservasi` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `tgl_reservasi_masuk` datetime NOT NULL,
  `tgl_reservasi_keluar` datetime NOT NULL,
  `id_pendaftar` int(11) NOT NULL,
  `tgl_entry` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `tlp_user` bigint(15) NOT NULL,
  `username_user` varchar(255) NOT NULL,
  `password_user` varchar(255) NOT NULL,
  `id_user_group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `email_user`, `tlp_user`, `username_user`, `password_user`, `id_user_group`) VALUES
(1, 'admin_hotel', 'testing@gmail.com', 85210662437, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'operator', 'operator@testing.com', 643139439, 'operator', '4b583376b2767b923c3e1da60d10de59', 2),
(3, 'yoga', 'arifincaesar@gmail.com', 85210662437, 'yoga', '28fab75dc1f392d731b3f54cf09ae212', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id_user_group` int(11) NOT NULL,
  `nama_user_group` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id_user_group`, `nama_user_group`) VALUES
(1, 'admin'),
(2, 'operator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `kamar_gambar`
--
ALTER TABLE `kamar_gambar`
  ADD PRIMARY KEY (`id_kamar_gambar`);

--
-- Indexes for table `kelas_kamar`
--
ALTER TABLE `kelas_kamar`
  ADD PRIMARY KEY (`id_kelas_kamar`);

--
-- Indexes for table `output_mitrans`
--
ALTER TABLE `output_mitrans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id_pendaftar`);

--
-- Indexes for table `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- Indexes for table `reservasi_detail`
--
ALTER TABLE `reservasi_detail`
  ADD PRIMARY KEY (`id_reservasi_detail`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id_saran`);

--
-- Indexes for table `temp_reservasi`
--
ALTER TABLE `temp_reservasi`
  ADD PRIMARY KEY (`id_temp_reservasi`),
  ADD UNIQUE KEY `id_pendaftar_dan_kamar_tidak_boleh_sama` (`id_kamar`,`id_pendaftar`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id_user_group`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kamar_gambar`
--
ALTER TABLE `kamar_gambar`
  MODIFY `id_kamar_gambar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `kelas_kamar`
--
ALTER TABLE `kelas_kamar`
  MODIFY `id_kelas_kamar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `output_mitrans`
--
ALTER TABLE `output_mitrans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id_pendaftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservasi_detail`
--
ALTER TABLE `reservasi_detail`
  MODIFY `id_reservasi_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `temp_reservasi`
--
ALTER TABLE `temp_reservasi`
  MODIFY `id_temp_reservasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id_user_group` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
