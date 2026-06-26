-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 17, 2019 at 09:22 PM
-- Server version: 10.3.11-MariaDB-1:10.3.11+maria~jessie-log
-- PHP Version: 5.6.38-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+07:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cbt_v143`
--

-- --------------------------------------------------------

--
-- Table structure for table `absens`
--

CREATE TABLE IF NOT EXISTS `absens` (
`id` int(10) unsigned NOT NULL,
  `id_guru` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `id_kelas` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `id_siswa` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `jam` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `absen` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `absens`
--

INSERT INTO `absens` (`id`, `id_guru`, `id_kelas`, `id_siswa`, `jam`, `absen`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '512', '1', 'A', '2017-03-21', '2017-03-21 02:50:40', '2017-03-21 02:50:40'),
(2, '1', '1', '513', '1', 'I', '2017-03-21', '2017-03-21 02:50:41', '2017-03-21 02:50:41'),
(3, '1', '1', '514', '1', 'S', '2017-03-21', '2017-03-21 02:50:42', '2017-03-21 02:50:42'),
(4, '1', '1', '515', '1', 'M', '2017-03-21', '2017-03-21 02:50:42', '2017-03-21 02:50:42'),
(5, '1', '1', '516', '1', 'M', '2017-03-21', '2017-03-21 02:50:43', '2017-03-21 02:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `aktifitas`
--

CREATE TABLE IF NOT EXISTS `aktifitas` (
`id` int(10) unsigned NOT NULL,
  `id_user` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countexamtimes`
--

CREATE TABLE IF NOT EXISTS `countexamtimes` (
`id` int(10) unsigned NOT NULL,
  `id_soal` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `id_user` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `waktu` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `countexamtimes`
--

INSERT INTO `countexamtimes` (`id`, `id_soal`, `id_user`, `waktu`, `created_at`, `updated_at`) VALUES
(1, '307', '1515', '-1845', '2019-10-17 10:32:26', '2019-10-17 11:30:14'),
(2, '320', '1515', '3535', '2019-10-17 10:46:11', '2019-10-17 10:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `detailsoals`
--

CREATE TABLE IF NOT EXISTS `detailsoals` (
`id` int(10) unsigned NOT NULL,
  `id_soal` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `jenis` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `soal` longtext COLLATE utf8_unicode_ci NOT NULL,
  `audio` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pila` longtext COLLATE utf8_unicode_ci NOT NULL,
  `pilb` longtext COLLATE utf8_unicode_ci NOT NULL,
  `pilc` longtext COLLATE utf8_unicode_ci NOT NULL,
  `pild` longtext COLLATE utf8_unicode_ci NOT NULL,
  `pile` longtext COLLATE utf8_unicode_ci NOT NULL,
  `kunci` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `score` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_user` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `sesi` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=10652 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `detailsoals`
--

-- --------------------------------------------------------

--
-- Table structure for table `distribusisoals`
--

CREATE TABLE IF NOT EXISTS `distribusisoals` (
`id` int(10) unsigned NOT NULL,
  `id_soal` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `id_kelas` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `distribusisoals`
--

-- --------------------------------------------------------

--
-- Table structure for table `jawabs`
--

CREATE TABLE IF NOT EXISTS `jawabs` (
`id` int(10) unsigned NOT NULL,
  `no_soal_id` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `id_soal` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `id_user` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `id_kelas` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pilihan` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `score` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jawabs`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
`id` int(10) unsigned NOT NULL,
  `nama` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kelas`
--



-- --------------------------------------------------------

--
-- Table structure for table `materis`
--

CREATE TABLE IF NOT EXISTS `materis` (
`id` int(10) unsigned NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `judul` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isi` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hits` int(11) DEFAULT NULL,
  `sesi` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_02_04_111141_create_schools_table', 2),
('2016_02_04_131540_create_kelas_table', 3),
('2016_02_05_145815_create_soals_table', 4),
('2016_02_05_150357_create_distribusisoals_table', 5),
('2016_02_06_154209_create_detailsoals_table', 6),
('2016_02_07_055735_create_jawabs_table', 7),
('2016_02_12_095142_create_table_aktifitas', 8),
('2017_01_23_132408_create_materis_table', 9),
('2017_03_07_101338_create_absens_table', 10),
('2017_03_13_090758_create_countexamtimes_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE IF NOT EXISTS `schools` (
`id` int(10) unsigned NOT NULL,
  `nama` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `header` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `motto` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `bypass_ujian` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `nama`, `alamat`, `logo`, `header`, `motto`, `bypass_ujian`, `created_at`, `updated_at`) VALUES
(1, 'SMK S Muhammadiyah Sampit', 'Jl. Merak 47 A Kotawaringin Timur, Sampit, Kalimantan Tengah. Website: www.smkmuhsampit.sch.id', '831bd9f3b3723ed1b241c1416f76fca9_68689649IMG_1.jpg', 'header.jpg', '- فاستبقوا الخيرات -', 0, '2016-02-04 11:15:44', '2018-03-10 03:51:35');

-- --------------------------------------------------------

--
-- Table structure for table `soals`
--

CREATE TABLE IF NOT EXISTS `soals` (
`id` int(10) unsigned NOT NULL,
  `id_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `jenis` char(1) COLLATE utf8_unicode_ci DEFAULT '1',
  `materi` int(11) DEFAULT NULL,
  `paket` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `kkm` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `waktu` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `tampil` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=330 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `id_kelas` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `nama` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `no_induk` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `jk` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sekolah_asal` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=2499 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_kelas`, `nama`, `no_induk`, `jk`, `status`, `gambar`, `email`, `password`, `remember_token`, `sekolah_asal`, `created_at`, `updated_at`) VALUES
(1, '', 'Administrator', '-', 'L', 'A', '', 'admin@merak.net', '$2y$10$8RiLv0yh7inzPngkaSph2uVznVy.dfoeGpnsL9hxK.SymLGIMt3AG', 'mTLG62HJO7Z9Oi1bLb2IkJnOicLEavKSQNeQvDEJnlMVAgt7wjNgeALzNjqg', '', '0000-00-00 00:00:00', '2019-10-17 09:41:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absens`
--
ALTER TABLE `absens`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aktifitas`
--
ALTER TABLE `aktifitas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countexamtimes`
--
ALTER TABLE `countexamtimes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailsoals`
--
ALTER TABLE `detailsoals`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `distribusisoals`
--
ALTER TABLE `distribusisoals`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jawabs`
--
ALTER TABLE `jawabs`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materis`
--
ALTER TABLE `materis`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
 ADD KEY `password_resets_email_index` (`email`), ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `soals`
--
ALTER TABLE `soals`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absens`
--
ALTER TABLE `absens`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `aktifitas`
--
ALTER TABLE `aktifitas`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `countexamtimes`
--
ALTER TABLE `countexamtimes`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `detailsoals`
--
ALTER TABLE `detailsoals`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10652;
--
-- AUTO_INCREMENT for table `distribusisoals`
--
ALTER TABLE `distribusisoals`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `jawabs`
--
ALTER TABLE `jawabs`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `materis`
--
ALTER TABLE `materis`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `soals`
--
ALTER TABLE `soals`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=330;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2499;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
