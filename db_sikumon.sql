-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2020 at 06:16 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sikumon`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(100) NOT NULL,
  `no_tlp_admin` varchar(20) NOT NULL,
  `email_admin` varchar(100) NOT NULL,
  `password_admin` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `no_tlp_admin`, `email_admin`, `password_admin`) VALUES
(1, 'roidi alfan', '085732947857', 'roifan1804@gmail.com', 'roidi'),
(5, 'roidi', '085798327456', 'roidi@umsida.ac.id', 'roidi');

-- --------------------------------------------------------

--
-- Table structure for table `db_absensi`
--

CREATE TABLE `db_absensi` (
  `id_absensi` int(11) NOT NULL,
  `id_subyek_siswa` varchar(50) NOT NULL,
  `tanggal_absensi` varchar(2) NOT NULL,
  `bulan_absensi` varchar(2) NOT NULL,
  `tahun_absensi` varchar(4) NOT NULL,
  `waktu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_absensi`
--

INSERT INTO `db_absensi` (`id_absensi`, `id_subyek_siswa`, `tanggal_absensi`, `bulan_absensi`, `tahun_absensi`, `waktu`) VALUES
(14, 'math14726072020', '05', '08', '2020', '08 59 45'),
(15, 'math14726072020', '11', '08', '2020', '17 05 29'),
(16, 'math14726072020', '12', '08', '2020', '13 38 48'),
(17, 'math35510082020', '12', '08', '2020', '13 39 49'),
(18, 'math35510082020', '17', '08', '2020', '08 46 26'),
(19, 'math14726072020', '17', '08', '2020', '08 48 24'),
(20, 'math35510082020', '31', '08', '2020', '09 26 16'),
(21, 'math21706082020', '31', '08', '2020', '09 26 28'),
(22, 'efl71631082020', '31', '08', '2020', '09 26 47'),
(23, 'efl55931082020', '31', '08', '2020', '09 27 25');

-- --------------------------------------------------------

--
-- Table structure for table `db_bayar`
--
-- Error reading structure for table db_sikumon.db_bayar: #1932 - Table 'db_sikumon.db_bayar' doesn't exist in engine
-- Error reading data for table db_sikumon.db_bayar: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `db_sikumon`.`db_bayar`' at line 1

-- --------------------------------------------------------

--
-- Table structure for table `db_bayarr`
--

CREATE TABLE `db_bayarr` (
  `id_bayar` int(11) NOT NULL,
  `id_subyek_siswa` varchar(50) NOT NULL,
  `jumlah_tagihan` varchar(10) NOT NULL,
  `jumlah_bayar` varchar(10) NOT NULL,
  `bulan_bayar` varchar(2) NOT NULL,
  `tahun_bayar` varchar(4) NOT NULL,
  `jenis_bayar` enum('pendaftaran','spp') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_bayarr`
--

INSERT INTO `db_bayarr` (`id_bayar`, `id_subyek_siswa`, `jumlah_tagihan`, `jumlah_bayar`, `bulan_bayar`, `tahun_bayar`, `jenis_bayar`) VALUES
(1, 'math44931082020', '280000', '280000', '06', '2020', 'pendaftaran'),
(2, 'math44931082020', '400000', '400000', '9', '2019', 'spp'),
(3, 'math44931082020', '400000', '400000', '6', '2020', 'spp'),
(4, 'math55931082020', '280000', '280000', '06', '2020', 'pendaftaran'),
(5, 'math55931082020', '400000', '400000', '7', '2020', 'spp'),
(6, 'math55931082020', '400000', '0', '8', '2020', 'spp'),
(7, 'math60831082020', '280000', '280000', '06', '2020', 'pendaftaran'),
(8, 'math60831082020', '400000', '400000', '7', '2020', 'spp'),
(9, 'math60831082020', '400000', '0', '8', '2020', 'spp'),
(10, 'efl55931082020', '280000', '280000', '06', '2020', 'pendaftaran'),
(11, 'efl55931082020', '400000', '400000', '7', '2020', 'spp'),
(12, 'efl55931082020', '400000', '0', '8', '2020', 'spp'),
(13, 'efl71631082020', '280000', '280000', '06', '2020', 'pendaftaran'),
(14, 'efl71631082020', '400000', '400000', '7', '2020', 'spp'),
(15, 'efl71631082020', '400000', '0', '8', '2020', 'spp'),
(16, 'math14726072020', '400000', '400000', '8', '2020', 'spp');

-- --------------------------------------------------------

--
-- Table structure for table `db_kemajuan_belajar`
--

CREATE TABLE `db_kemajuan_belajar` (
  `id_kb` int(11) NOT NULL,
  `id_subyek_siswa` varchar(50) NOT NULL,
  `tgl_kb` int(11) NOT NULL,
  `target_level_kb` varchar(5) NOT NULL,
  `t_no_level_kb` int(11) NOT NULL,
  `real_level_kb` varchar(5) NOT NULL,
  `r_no_level_kb` int(11) NOT NULL,
  `catatan_kb` text NOT NULL,
  `tahun_kb` varchar(10) NOT NULL,
  `subyek` varchar(20) NOT NULL,
  `id_admin` int(20) NOT NULL,
  `id_pembimbing` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_kemajuan_belajar`
--

INSERT INTO `db_kemajuan_belajar` (`id_kb`, `id_subyek_siswa`, `tgl_kb`, `target_level_kb`, `t_no_level_kb`, `real_level_kb`, `r_no_level_kb`, `catatan_kb`, `tahun_kb`, `subyek`, `id_admin`, `id_pembimbing`) VALUES
(50, 'math14726072020', 8, '', 0, '2a', 70, '', '2020', 'math', 0, 0),
(54, 'math14726072020', 9, 'a', 30, 'a', 70, 'ok, belajar dengan mandiri', '2020', 'math', 0, 0),
(55, 'math21706082020', 8, '', 0, '5a', 70, '', '2020', 'math', 0, 0),
(56, 'math35510082020', 8, '', 0, '2a', 70, '', '2020', 'math', 0, 0),
(57, 'math44931082020', 5, '', 0, '2a', 100, '', '2020', 'math', 0, 0),
(58, 'math44931082020', 7, 'b', 20, 'b', 20, 'fokus belajar ok', '2020', 'math', 0, 0),
(59, 'math44931082020', 6, 'a', 120, 'a', 110, 'ok, belajar dengan mandiri, tapi kurang tangkas', '2020', 'math', 0, 0),
(60, 'math55931082020', 6, '', 0, '2a', 100, '', '2020', 'math', 0, 0),
(61, 'math55931082020', 7, '2a', 170, '2a', 170, 'ok, belajar dengan mandiri', '2020', 'math', 0, 0),
(62, 'math55931082020', 8, 'a', 70, 'a', 70, 'fokus belajar ok', '2020', 'math', 0, 0),
(63, 'math60831082020', 6, '', 0, 'b', 30, '', '2020', 'math', 0, 0),
(64, 'math60831082020', 7, 'b', 90, 'b', 90, 'kurang fokus, banyak bicara di kelas', '2020', 'math', 0, 0),
(65, 'math60831082020', 8, 'b', 170, 'b', 140, 'kurang fokus saat belajar', '2020', 'math', 0, 0),
(66, 'efl55931082020', 6, '', 0, '3a', 70, '', '2020', 'efl', 0, 0),
(67, 'efl55931082020', 7, '3a', 200, '2a', 10, 'ok, belajar dengan mandiri', '2020', 'efl', 0, 0),
(68, 'efl55931082020', 8, '2a', 120, '2a', 120, 'ok, belajar dengan mandiri, tapi kurang tangkas', '2020', 'efl', 0, 0),
(69, 'efl71631082020', 6, '', 0, '3a', 70, '', '2020', 'efl', 0, 0),
(70, 'efl71631082020', 7, '3a', 170, '3a', 200, 'ok, belajar dengan mandiri', '2020', 'efl', 0, 0),
(71, 'efl71631082020', 8, '2a', 70, '2a', 100, 'fokus belajar ok', '2020', 'efl', 0, 0),
(72, 'math14726072020', 8, 'a', 70, 'a', 80, 'ok sudah belajar dengan mandiri', '2020', 'math', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_pembimbing`
--

CREATE TABLE `db_pembimbing` (
  `id_pembimbing` int(11) NOT NULL,
  `username_pembimbing` varchar(100) NOT NULL,
  `pass_pembimbing` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_pembimbing`
--

INSERT INTO `db_pembimbing` (`id_pembimbing`, `username_pembimbing`, `pass_pembimbing`) VALUES
(1, 'deasyariarti', 'deasy123');

-- --------------------------------------------------------

--
-- Table structure for table `db_siswa`
--

CREATE TABLE `db_siswa` (
  `id_siswa` bigint(20) NOT NULL,
  `nama_siswa` varchar(200) NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `tanggal_daftar` varchar(20) NOT NULL,
  `id_wali_murid` int(20) NOT NULL,
  `sekolah` varchar(100) NOT NULL,
  `foto_siswa` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_siswa`
--

INSERT INTO `db_siswa` (`id_siswa`, `nama_siswa`, `tgl_lahir`, `kelas`, `tanggal_daftar`, `id_wali_murid`, `sekolah`, `foto_siswa`) VALUES
(14726072020, 'rahmad aldi cahya ramadhan', '2020-07-04', '2', '26-07-2020', 1, 'TK kusuma putra', 'rahmad_aldi_cahya_ramadhan_2.jpg'),
(21706082020, 'rafael cahyanto', '2010-02-07', '1', '02-08-2020', 2, 'TK kusuma putra', 'default.png'),
(35510082020, 'rafif', '2007-08-06', '5', '10-08-2020', 3, 'sdi raudlotul jannah', 'default.png'),
(44931082020, 'farah najwa salsabilla', '2010-08-05', '4', '31-08-2020', 4, 'MI MAARIF', 'default.png'),
(55931082020, 'devino yosua kristiono', '2014-05-07', '1', '31-08-2020', 5, 'mutiara bunda', 'default.png'),
(60831082020, 'maritza alfiyah azhaara', '2012-09-11', '2', '31-08-2020', 6, 'mi darul falah', 'default.png'),
(71631082020, 'louis alexander tisna', '2014-07-31', '1', '31-08-2020', 7, 'mutiara bunda', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `db_subyek_siswa`
--

CREATE TABLE `db_subyek_siswa` (
  `id_subyek_siswa` varchar(50) NOT NULL,
  `id_siswa` bigint(20) NOT NULL,
  `subyek` enum('efl','math') NOT NULL,
  `tgl_awal_daftar` varchar(100) NOT NULL,
  `level` varchar(20) NOT NULL,
  `jenis_tp` varchar(20) NOT NULL,
  `status_subyek_siswa` varchar(20) NOT NULL,
  `img_qrcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_subyek_siswa`
--

INSERT INTO `db_subyek_siswa` (`id_subyek_siswa`, `id_siswa`, `subyek`, `tgl_awal_daftar`, `level`, `jenis_tp`, `status_subyek_siswa`, `img_qrcode`) VALUES
('efl55931082020', 55931082020, 'efl', '31-08-2020', '3a70', 'k1', 'aktif', 'efl55931082020.png'),
('efl71631082020', 71631082020, 'efl', '31-08-2020', '3a70', 'k1', 'aktif', 'efl71631082020.png'),
('math14726072020', 14726072020, 'math', '05-08-2020', '2a70', 'p2', 'aktif', 'math14726072020.png'),
('math21706082020', 21706082020, 'math', '09-08-2020', '5a70', 'k1', 'aktif', 'math21706082020.png'),
('math35510082020', 35510082020, 'math', '10-08-2020', '2a70', 'p2', 'aktif', 'math35510082020.png'),
('math44931082020', 44931082020, 'math', '31-08-2020', '2a100', 'p3', 'aktif', 'math44931082020.png'),
('math55931082020', 55931082020, 'math', '31-08-2020', '2a100', 'p1', 'aktif', 'math55931082020.png'),
('math60831082020', 60831082020, 'math', '31-08-2020', 'b30', 'p2', 'aktif', 'math60831082020.png');

-- --------------------------------------------------------

--
-- Table structure for table `db_wali_murid`
--

CREATE TABLE `db_wali_murid` (
  `id_wali_murid` int(20) NOT NULL,
  `nama_wali_murid` varchar(100) NOT NULL,
  `alamat_wali_murid` varchar(255) NOT NULL,
  `no_tlp_wali_murid` varchar(20) NOT NULL,
  `pass_wali_murid` varchar(255) NOT NULL,
  `email_wali_murid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `db_wali_murid`
--

INSERT INTO `db_wali_murid` (`id_wali_murid`, `nama_wali_murid`, `alamat_wali_murid`, `no_tlp_wali_murid`, `pass_wali_murid`, `email_wali_murid`) VALUES
(1, 'dia ika arianti', 'jebug cangkringsari rt 18 rw 05 sukodono sidoarjo ', '085732947585 ', 'diaika', '161080200230@umsida.ac.id'),
(2, 'anik suyanti', 'sukodono', '085645000373', 'anik', 'anik@gmail.com'),
(3, 'deasy', 'citra harmoni', '085929209202', 'deasy123', 'deasy@gmail.com'),
(4, 'fatimah salsabilla', 'bringin bendo taman sidoarjo', '085929209202', 'fatimah', 'fatimah@gmail.com'),
(5, 'ferdi kristanto', 'citra harmoni taman sidoarjo', '085929209201', 'ferdi', 'ferdi@gmail.com'),
(6, 'roni trisawan', 'citra harmoni taman sidoarjo', '081234897098', 'roni', 'roni@gmail.com'),
(7, 'doni rahardian', 'citra harmoni taman sidoarjo', '081223211890', 'doni', 'doni@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `db_absensi`
--
ALTER TABLE `db_absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `id_subyek_siswa` (`id_subyek_siswa`);

--
-- Indexes for table `db_bayarr`
--
ALTER TABLE `db_bayarr`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `db_kemajuan_belajar`
--
ALTER TABLE `db_kemajuan_belajar`
  ADD PRIMARY KEY (`id_kb`);

--
-- Indexes for table `db_pembimbing`
--
ALTER TABLE `db_pembimbing`
  ADD PRIMARY KEY (`id_pembimbing`);

--
-- Indexes for table `db_siswa`
--
ALTER TABLE `db_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_wali_murid` (`id_wali_murid`);

--
-- Indexes for table `db_subyek_siswa`
--
ALTER TABLE `db_subyek_siswa`
  ADD PRIMARY KEY (`id_subyek_siswa`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `db_wali_murid`
--
ALTER TABLE `db_wali_murid`
  ADD PRIMARY KEY (`id_wali_murid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `db_absensi`
--
ALTER TABLE `db_absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `db_bayarr`
--
ALTER TABLE `db_bayarr`
  MODIFY `id_bayar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `db_kemajuan_belajar`
--
ALTER TABLE `db_kemajuan_belajar`
  MODIFY `id_kb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `db_pembimbing`
--
ALTER TABLE `db_pembimbing`
  MODIFY `id_pembimbing` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `db_wali_murid`
--
ALTER TABLE `db_wali_murid`
  MODIFY `id_wali_murid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `db_siswa`
--
ALTER TABLE `db_siswa`
  ADD CONSTRAINT `db_siswa_ibfk_1` FOREIGN KEY (`id_wali_murid`) REFERENCES `db_wali_murid` (`id_wali_murid`) ON UPDATE CASCADE;

--
-- Constraints for table `db_subyek_siswa`
--
ALTER TABLE `db_subyek_siswa`
  ADD CONSTRAINT `db_subyek_siswa_ibfk_1` FOREIGN KEY (`id_siswa`) REFERENCES `db_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
