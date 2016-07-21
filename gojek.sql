-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2016 at 03:07 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gojek`
--

-- --------------------------------------------------------

--
-- Table structure for table `master`
--

CREATE TABLE `master` (
  `idmaster` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jenis` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master`
--

INSERT INTO `master` (`idmaster`, `nama`, `jenis`) VALUES
(1, 'BELUM/TIDAK BEKERJA', 'KTP'),
(2, 'MENGURUS RUMAH TANGGA', 'KTP'),
(3, 'PELAJAR/MAHASISWA', 'KTP'),
(4, 'PENSIUNAN', 'KTP'),
(5, 'PEGAWAI NEGERI SIPIL', 'KTP'),
(6, 'TENTARA NASIONAL INDONESIA', 'KTP'),
(7, 'KEPOLISIAN RI', 'KTP'),
(8, 'PERDAGANGAN', 'KTP'),
(9, 'PETANI PERKEBUNAN', 'KTP'),
(10, 'PETERNAK', 'KTP'),
(11, 'NELAYAN/PERIKANAN', 'KTP'),
(12, 'INDUSTRI', 'KTP'),
(13, 'KONSTRUKSI', 'KTP'),
(14, 'TRANSPORTASI', 'KTP'),
(15, 'KARYAWAN SWASTA', 'KTP'),
(16, 'KARYAWAN BUMN', 'KTP'),
(17, 'KARYAWAN BUMD', 'KTP'),
(18, 'KARYAWAN HONORER', 'KTP'),
(19, 'BURUH HARIAN LEPAS', 'KTP'),
(20, 'BURUH TANI PERKEBUNAN', 'KTP'),
(21, 'BURUH NELAYAN PERIKANAN', 'KTP'),
(22, 'BURUH PETERNAKAN', 'KTP'),
(23, 'PEMBANTU RUMAH TANGGA', 'KTP'),
(24, 'TUKANG CUKUR', 'KTP'),
(25, 'TUKANG LISTRIK', 'KTP'),
(26, 'TUKANG BATU', 'KTP'),
(27, 'TUKANG KAYU', 'KTP'),
(28, 'TUKANG SOL SEPATU', 'KTP'),
(29, 'TUKANG LAS PANDAI BESI', 'KTP'),
(30, 'TUKANG JAHIT', 'KTP'),
(31, 'TUKANG GIGI', 'KTP'),
(32, 'PENATA RIAS', 'KTP'),
(33, 'PENATA BUSANA', 'KTP'),
(34, 'PENATA RAMBUT', 'KTP'),
(35, 'MEKANIK', 'KTP'),
(36, 'SENIMAN', 'KTP'),
(37, 'TABIB', 'KTP'),
(38, 'PARAJI', 'KTP'),
(39, 'PERENCANG BUSANA', 'KTP'),
(40, 'PENTERJAMAH', 'KTP'),
(41, 'IMAM MESJID', 'KTP'),
(42, 'PENDATA', 'KTP'),
(43, 'PASTOR', 'KTP'),
(44, 'WARTAWAN', 'KTP'),
(45, 'USTADZ MUBALIGHT', 'KTP'),
(46, 'JURU MASAK', 'KTP'),
(47, 'PROMOTOR ACARA', 'KTP'),
(48, 'ANGGOTA DPR RI', 'KTP'),
(49, 'ANGGOTA DPD', 'KTP'),
(50, 'ANNGOTA BPK', 'KTP'),
(51, 'PRESIDEN', 'KTP'),
(52, 'WAKIL PRESIDEN', 'KTP'),
(53, 'ANGGOTA MAHKAMAH KONSTITUSI', 'KTP'),
(54, 'ANGGOTA KABINET KEMENTRIAN', 'KTP'),
(55, 'DUTA BESAR', 'KTP'),
(56, 'GUBERNUR', 'KTP'),
(57, 'WAKIL GUBERNUR', 'KTP'),
(58, 'BUPATI', 'KTP'),
(59, 'WAKIL BUPATI', 'KTP'),
(60, 'WALIKOTA', 'KTP'),
(61, 'WAKIL WALIKOTA', 'KTP'),
(62, 'ANGGOTA DPRD PROVINSI', 'KTP'),
(63, 'ANGGOTA DPRD KAB/KOTA', 'KTP'),
(64, 'DOSEN', 'KTP'),
(65, 'GURU', 'KTP'),
(66, 'PILOT', 'KTP'),
(67, 'PENGACARA', 'KTP'),
(68, 'NOTARIS', 'KTP'),
(69, 'ARSITEK', 'KTP'),
(70, 'AKUNTAN', 'KTP'),
(71, 'KONSULTAN', 'KTP'),
(72, 'DOKTER', 'KTP'),
(73, 'BIDAN', 'KTP'),
(74, 'PERAWAT', 'KTP'),
(75, 'APOTEKER', 'KTP'),
(76, 'PSIKIATER PSIKOLOGIS', 'KTP'),
(77, 'PENYIAR TELEVISI', 'KTP'),
(78, 'PENYIAR RADIO', 'KTP'),
(79, 'PELAUT', 'KTP'),
(80, 'PENELITI', 'KTP'),
(81, 'SOPIR', 'KTP'),
(82, 'PIALANG', 'KTP'),
(83, 'PARANORMAL', 'KTP'),
(84, 'PEDAGANG', 'KTP'),
(85, 'PERANGKAT DESA', 'KTP'),
(86, 'KEPALA DESA', 'KTP'),
(87, 'BIARAWATI', 'KTP'),
(88, 'WIRA SWASTA', 'KTP'),
(89, 'HAKIM', 'KTP'),
(90, 'LAINNYA', 'KTP');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Michael', 'm1', 'michael.hlm178@gmail.com', '$2y$10$xkLUH4RA9D5D17nvmgDbMOOjT391taa.qM6m8FlAMuZtkmUK6wNX2', 'JrACNzlU7DayaYqjrJlF1CsdevE8XRuvSTc6zYWSXg8IR71mUzzCuseUEbeq', '2016-07-19 08:30:31', '2016-07-20 13:12:28');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` varchar(255) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `name`, `email`, `phone`, `occupation`, `created_at`, `updated_at`) VALUES
('GO-JEKVSTR0000000001', 'Michael Halim', 'michael@m1host.org', 8988199920, 'BELUM/TIDAK BEKERJA', '2016-07-20 12:55:21', '2016-07-20 12:55:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `master`
--
ALTER TABLE `master`
  ADD PRIMARY KEY (`idmaster`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `master`
--
ALTER TABLE `master`
  MODIFY `idmaster` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
