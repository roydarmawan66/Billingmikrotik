-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2021 at 05:36 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mikrobil_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(1) NOT NULL,
  `no_customer` varchar(15) NOT NULL,
  `nm_lengkap` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `no_customer`, `nm_lengkap`, `email`, `level`, `username`, `password`, `last_login`) VALUES
(10, '2706200002', 'Royani Darmawan', 'roydarmawan66@g', 'administrator', 'admin', '$2y$10$wmYZqQReZ4XiJedYYOx46OD1nZz7ixAj.07Cm7psZ/h/ViszXBFFC', '2020-07-14 14:38:05'),
(11, '1407200001', 'Galih Rangga', 'galih_rangga@gm', 'customer', 'user', '$2y$10$wmYZqQReZ4XiJedYYOx46OD1nZz7ixAj.07Cm7psZ/h/ViszXBFFC', '2020-07-14 14:57:27'),
(23, '0612200001', 'Roy Darmawan', 'roydarmawan66@gmail.', 'customer', 'solid', '$2y$10$wmYZqQReZ4XiJedYYOx46OD1nZz7ixAj.07Cm7psZ/h/ViszXBFFC', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_billing`
--

CREATE TABLE `tbl_billing` (
  `id_billing` int(5) NOT NULL,
  `noinvoice` int(15) NOT NULL,
  `jenispaket` varchar(10) NOT NULL,
  `id_client` int(5) NOT NULL,
  `user` varchar(15) NOT NULL,
  `pass` varchar(10) NOT NULL,
  `id_paket` int(5) NOT NULL,
  `namapaket` varchar(15) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `idr` int(5) NOT NULL,
  `id_admin` int(1) NOT NULL,
  `date_on` date DEFAULT NULL,
  `masa_aktiv` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_billing`
--

INSERT INTO `tbl_billing` (`id_billing`, `noinvoice`, `jenispaket`, `id_client`, `user`, `pass`, `id_paket`, `namapaket`, `harga`, `idr`, `id_admin`, `date_on`, `masa_aktiv`) VALUES
(16, 8001, 'timebase', 14, 'arif', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-08', '1'),
(17, 8002, 'timebase', 11, 'linda', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-08', '1'),
(18, 8003, 'unlimited', 9, 'budi', '', 31, 'PRO UNLIMITED', '50000', 10, 11, '2021-06-08', '30'),
(19, 8004, 'unlimited', 15, 'dadang', '', 31, 'PRO UNLIMITED', '50000', 10, 11, '2021-06-08', '30'),
(20, 9005, 'timebase', 17, 'siska', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-09', '1'),
(21, 9006, 'unlimited', 18, 'bambang', '', 31, 'PRO UNLIMITED', '50000', 10, 11, '2021-06-09', ',30'),
(22, 9007, 'timebase', 14, 'arif', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-09', '1'),
(23, 9007, 'timebase', 14, 'arif', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-09', '1'),
(24, 9008, 'unlimited', 11, 'linda', '', 31, 'PRO UNLIMITED', '50000', 10, 11, '2021-06-09', '30'),
(25, 9009, 'timebase', 17, 'siska', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-09', '1'),
(26, 9010, 'timebase', 18, 'bambang', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-09', '1'),
(27, 9010, 'timebase', 18, 'bambang', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-09', '1'),
(28, 9010, 'timebase', 18, 'bambang', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-09', '1'),
(29, 9011, 'timebase', 18, 'bambang', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-09', '1'),
(30, 9011, 'timebase', 18, 'bambang', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-09', '1'),
(31, 9012, 'timebase', 18, 'bambang', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-11', '1'),
(32, 9012, 'timebase', 18, 'bambang', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-11', '1'),
(33, 9012, 'timebase', 18, 'bambang', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-11', '1'),
(34, 11013, 'timebase', 17, 'siska', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-11', '1'),
(35, 11013, 'timebase', 17, 'siska', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-11', '1'),
(36, 11013, 'timebase', 17, 'siska', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-11', '1'),
(37, 11014, 'unlimited', 17, 'siska', '', 31, 'PRO UNLIMITED', '50000', 10, 11, '2021-06-11', '30'),
(38, 12015, 'unlimited', 16, 'maryam', '', 31, 'PRO UNLIMITED', '50000', 10, 11, '2021-06-12', '30'),
(39, 12015, 'unlimited', 16, 'maryam', '', 31, 'PRO UNLIMITED', '50000', 10, 11, '2021-06-12', '30'),
(40, 12015, 'unlimited', 16, 'maryam', '', 31, 'PRO UNLIMITED', '50000', 10, 11, '2021-06-12', '30'),
(41, 12016, 'timebase', 17, 'siska', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-12', '1'),
(42, 12016, 'timebase', 17, 'siska', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-12', '1'),
(43, 12017, 'timebase', 14, 'arif', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-12', '1'),
(44, 12017, 'timebase', 14, 'arif', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-12', '1'),
(45, 12017, 'timebase', 14, 'arif', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-12', '1'),
(46, 12017, 'timebase', 14, 'arif', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-12', '1'),
(47, 12017, 'timebase', 14, 'arif', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-12', '1'),
(48, 12017, 'timebase', 14, 'arif', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-12', '1'),
(49, 12017, 'timebase', 14, 'arif', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-12', '1'),
(50, 12017, 'timebase', 14, 'arif', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-12', '1'),
(51, 12017, 'timebase', 14, 'arif', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-12', '1'),
(52, 12018, 'timebase', 15, 'dadang', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-12', '1'),
(53, 12019, 'timebase', 11, 'linda', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-12', '1'),
(54, 12020, 'timebase', 9, 'budi', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-12', '1'),
(55, 12020, 'timebase', 9, 'budi', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-12', '1'),
(56, 12021, 'unlimited', 9, 'budi', '', 31, 'PRO UNLIMITED', '50000', 10, 11, '2021-06-12', '30'),
(57, 12021, 'unlimited', 9, 'budi', '', 31, 'PRO UNLIMITED', '50000', 10, 11, '2021-06-12', '30'),
(58, 12022, 'unlimited', 9, 'Budi', '', 31, 'PRO UNLIMITED', '50000', 10, 11, '2021-06-12', '30'),
(59, 12023, 'timebase', 11, 'linda', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-12', '1'),
(60, 12023, 'timebase', 11, 'linda', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-12', '1'),
(61, 13024, 'timebase', 18, 'bambang', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-13', '1'),
(62, 13024, 'timebase', 18, 'bambang', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-13', '1'),
(63, 13024, 'timebase', 18, 'bambang', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-13', '1'),
(64, 13024, 'timebase', 18, 'bambang', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-13', '1'),
(65, 13025, 'timebase', 17, 'siska', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-13', '1'),
(66, 14026, 'timebase', 18, 'bambang', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-14', '1'),
(67, 14026, 'timebase', 18, 'bambang', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-14', '1'),
(68, 14026, 'timebase', 18, 'bambang', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-14', '1'),
(69, 14026, 'timebase', 18, 'bambang', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-14', '1'),
(70, 14026, 'timebase', 18, 'bambang', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-14', '1'),
(71, 14026, 'timebase', 18, 'bambang', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-14', '1'),
(72, 14026, 'timebase', 18, 'bambang', '', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-14', '1'),
(73, 14027, 'timebase', 17, 'siska', '(*S&s]', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-14', '1'),
(74, 15028, 'timebase', 18, 'bambang', 'nlfr(O', 30, 'Paket-1Jam', '2000', 10, 11, '2021-06-15', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client`
--

CREATE TABLE `tbl_client` (
  `id_client` int(1) NOT NULL,
  `nm_client` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `noHP` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `idr` int(5) NOT NULL,
  `id_admin` int(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_client`
--

INSERT INTO `tbl_client` (`id_client`, `nm_client`, `alamat`, `noHP`, `email`, `password`, `idr`, `id_admin`, `created_on`, `last_update`) VALUES
(9, 'Budi Gunawan', 'Tangerang', '089505636396', 'budigunawan@gmail.co', '$2y$10$bwnW3ecncU3T3', 10, 11, '2020-11-18 03:23:52', '2020-11-18 03:23:52'),
(11, 'Linda Yuli', 'Jakarta Barat', '02195577321', 'linda.yul@gmail.com', '$2y$10$byXofELPCnhtM', 10, 11, '2020-12-06 07:50:36', '2020-12-06 07:50:36'),
(13, 'Admin', 'Jl. Warga Damai, Kel Peninggilan Kec Ciledug, No.14 Tangerang', '089505636396', 'admin@hotspot.com', '$2y$10$1l.nkVN1f4aoY', 22, 23, '2021-02-21 01:09:59', '2021-02-21 01:09:59'),
(14, 'Arif R.N Hakim', 'Tangerang Selatan', '089505636396', 'arif@sagara.co.id', '$2y$10$J1b8HV76bznGW', 10, 11, '2021-05-28 09:07:33', '2021-05-28 09:07:33'),
(15, 'Dadang Atmojo', 'Tangerang', '123', 'dadang.at@gmail.com', '$2y$10$/XwPDGupCtUqX', 10, 11, '2021-06-08 05:12:51', '2021-06-08 05:12:51'),
(16, 'Maryam', 'Jakarta Selatan', '021', 'maryam@gmail.com', '$2y$10$F9SAtwDqZ3bC8', 10, 11, '2021-06-08 05:18:45', '2021-06-08 05:18:45'),
(17, 'Siska Putri', 'Tangerang', '021', 'siska.putri@gmail.co', '$2y$10$4jVqI1FKH9nyb', 10, 11, '2021-06-09 02:57:29', '2021-06-09 02:57:29'),
(18, 'Bambang Atmajaya', 'Jakarta Barat', '0899', 'bambang@gmail.com', '$2y$10$nuvJt1SMTbKHE', 10, 11, '2021-06-09 03:04:24', '2021-06-09 03:04:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id_customer` int(1) NOT NULL,
  `no_customer` varchar(15) NOT NULL,
  `nm_customer` varchar(20) NOT NULL,
  `noktp` varchar(20) NOT NULL,
  `tlp` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(15) NOT NULL,
  `nm_usaha` varchar(30) NOT NULL,
  `logo` varchar(10) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id_customer`, `no_customer`, `nm_customer`, `noktp`, `tlp`, `alamat`, `email`, `nm_usaha`, `logo`, `tanggal`) VALUES
(133, '1407200001', 'Galih Rangga', '3671111611920002', '089505636396', 'Jakarta Selatan', 'galih_rangga@gm', '', '', '2020-07-14 14:51:30'),
(138, '1110200001', 'Achmad Saepudin', '3671111111960016', '089666727107', 'Jakarta Barat', 'ach@gmail.com', '', '', '2020-10-10 18:33:49'),
(139, '0612200001', 'Roy Darmawan', '3671111611920002', '089505636396', 'Jl. M Taih Rt 03/05 No.32 Kel Cipete Kec Pinang, Tangerang', 'roydarmawan66@g', '', '', '0000-00-00 00:00:00'),
(141, '2602210002', 'Muhammad Habibi', '3671111611920002', '089505636396', 'Tangerang Selatan', 'bibi@yahoo.com', '', '', '0000-00-00 00:00:00'),
(142, '1506210003', 'Royani Darmawan', '3671111611920002', '089505636396', 'JL HR Rasuna Said GG Ismail Rt 03/05 Kel Cipete Kec Pinang Tangerang', 'roydarmawan66@g', '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_detail_konfig`
--

CREATE TABLE `tbl_detail_konfig` (
  `id_detail` int(1) NOT NULL,
  `no_invoice` int(15) NOT NULL,
  `no_customer` varchar(15) NOT NULL,
  `nm_customer` varchar(30) NOT NULL,
  `idr` int(1) NOT NULL,
  `host_router` varchar(20) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `expiry_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `priode` varchar(25) NOT NULL,
  `Biaya` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_detail_konfig`
--

INSERT INTO `tbl_detail_konfig` (`id_detail`, `no_invoice`, `no_customer`, `nm_customer`, `idr`, `host_router`, `created_on`, `expiry_date`, `priode`, `Biaya`) VALUES
(39, 28002, '0612200001', 'Roy Darmawan', 22, '192.168.1.2', '2021-03-27 18:39:13', '2021-06-27 18:39:13', '3', '100000'),
(41, 29003, '1407200001', 'Galih Rangga', 9, '192.168.10.1', '2021-03-28 20:26:56', '2021-06-28 20:26:56', '3', '100000'),
(47, 31005, '1407200001', 'Galih Rangga', 10, '192.168.84.130', '2021-03-30 19:26:07', '2021-03-31 19:26:07', '3', '100000'),
(48, 15006, '1407200001', 'Galih Rangga', 10, '192.168.84.130', '2021-05-15 03:04:13', '2021-08-15 03:04:13', '3', '100000'),
(49, 15007, '1506210003', 'Royani Darmawan', 24, '192.168.10.1', '2021-06-15 01:12:42', '2021-09-15 01:12:42', '3', '100000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konfig`
--

CREATE TABLE `tbl_konfig` (
  `idr` int(1) NOT NULL,
  `nm_router` varchar(20) NOT NULL,
  `host_router` varchar(20) NOT NULL,
  `user_router` varchar(20) NOT NULL,
  `pass_router` varchar(20) NOT NULL,
  `no_customer` varchar(15) NOT NULL,
  `nm_customer` varchar(20) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_konfig`
--

INSERT INTO `tbl_konfig` (`idr`, `nm_router`, `host_router`, `user_router`, `pass_router`, `no_customer`, `nm_customer`, `created_on`) VALUES
(9, 'galihNet', '192.168.10.1', 'admin', 'admin', '1407200001', 'Galih Rangga', '2020-11-06 15:31:33'),
(10, 'galihNet 2', '192.168.84.130', 'admin', 'admin', '1407200001', 'Galih Rangga', '2020-11-06 15:31:33'),
(22, 'Solid Print', '192.168.1.2', 'admin', 'admin', '0612200001', 'Roy Darmawan', '0000-00-00 00:00:00'),
(24, 'internetdesa', '192.168.10.1', 'admin', 'admin', '1506210003', 'Royani Darmawan', '2021-06-15 01:12:40');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paket`
--

CREATE TABLE `tbl_paket` (
  `id_paket` int(5) NOT NULL,
  `nama` varchar(15) NOT NULL,
  `tipe_limit` varchar(15) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `time_limit` varchar(10) NOT NULL,
  `time_unit` varchar(10) NOT NULL,
  `data_limit` varchar(10) NOT NULL,
  `data_unit` varchar(10) NOT NULL,
  `masa_aktiv` varchar(5) NOT NULL,
  `share` varchar(15) NOT NULL,
  `idr` int(5) NOT NULL,
  `id_admin` int(1) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_update` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_paket`
--

INSERT INTO `tbl_paket` (`id_paket`, `nama`, `tipe_limit`, `harga`, `time_limit`, `time_unit`, `data_limit`, `data_unit`, `masa_aktiv`, `share`, `idr`, `id_admin`, `created_on`, `last_update`) VALUES
(20, '1 Jam', 'timebase', '2500', '1', 'Hrs', '0', 'MB', '1', '1', 22, 23, '2021-03-04 17:41:40', '2021-03-04 17:41:40'),
(22, 'Paket-1Jam', 'timebase', '2500', '1', 'Hrs', '0', 'MB', '1', '1', 22, 23, '2021-03-06 20:45:22', '2021-03-06 20:45:22'),
(30, 'Paket-1Jam', 'timebase', '2000', '1', 'Hrs', '0', 'MB', '1', '1', 10, 11, '2021-06-08 03:09:33', '2021-06-08 03:09:33'),
(31, 'PRO UNLIMITED', 'unlimited', '50000', '0', 'Hrs', '0', 'MB', '30', '3', 10, 11, '2021-06-08 04:49:58', '2021-06-08 04:49:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_billing`
--
ALTER TABLE `tbl_billing`
  ADD PRIMARY KEY (`id_billing`);

--
-- Indexes for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `tbl_detail_konfig`
--
ALTER TABLE `tbl_detail_konfig`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `tbl_konfig`
--
ALTER TABLE `tbl_konfig`
  ADD PRIMARY KEY (`idr`);

--
-- Indexes for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_billing`
--
ALTER TABLE `tbl_billing`
  MODIFY `id_billing` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `id_client` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id_customer` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `tbl_detail_konfig`
--
ALTER TABLE `tbl_detail_konfig`
  MODIFY `id_detail` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_konfig`
--
ALTER TABLE `tbl_konfig`
  MODIFY `idr` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_paket`
--
ALTER TABLE `tbl_paket`
  MODIFY `id_paket` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
