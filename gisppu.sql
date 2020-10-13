-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2020 at 08:29 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gisppu`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_12_10_125521_create_outlets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `outlets`
--

CREATE TABLE `outlets` (
  `nib` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pendaftar` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon_pendaftar` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_pendaftar` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nik` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `propinsi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'Kalimantan Timur',
  `kab_kota` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT 'Balikpapan',
  `kecamatan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kelurahan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah_tki_l` smallint(6) DEFAULT NULL,
  `jumlah_tki_p` smallint(6) DEFAULT NULL,
  `kbli` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bangunan` int(11) DEFAULT NULL,
  `mesin_peralatan` int(11) DEFAULT NULL,
  `peralatan_impor` int(11) DEFAULT NULL,
  `pembelian_dan_pematangan_tanah` int(11) DEFAULT NULL,
  `investasi_lain_lain` int(11) DEFAULT NULL,
  `pembelian_pematangan_lain_lain` int(11) DEFAULT NULL,
  `modal_kerja_3_bulanan` int(11) DEFAULT NULL,
  `jumlah_investasisin_p` int(11) DEFAULT NULL,
  `tanggal_pengajuan_pemohonan_berusaha` date DEFAULT NULL,
  `tanggal_terbit_oss` date DEFAULT NULL,
  `jenis_perseroan` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_penanaman_modal` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pemegang_saham` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_modal` int(11) DEFAULT NULL,
  `jabatan` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `negara_asal` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `penanggung_jawab` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `latitude` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `longitude` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `creator_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outlets`
--

INSERT INTO `outlets` (`nib`, `name`, `address`, `nama_pendaftar`, `telepon_pendaftar`, `email_pendaftar`, `nik`, `propinsi`, `kab_kota`, `kecamatan`, `kelurahan`, `jumlah_tki_l`, `jumlah_tki_p`, `kbli`, `bangunan`, `mesin_peralatan`, `peralatan_impor`, `pembelian_dan_pematangan_tanah`, `investasi_lain_lain`, `pembelian_pematangan_lain_lain`, `modal_kerja_3_bulanan`, `jumlah_investasisin_p`, `tanggal_pengajuan_pemohonan_berusaha`, `tanggal_terbit_oss`, `jenis_perseroan`, `status_penanaman_modal`, `nama_pemegang_saham`, `total_modal`, `jabatan`, `negara_asal`, `penanggung_jawab`, `latitude`, `longitude`, `creator_id`, `created_at`, `updated_at`) VALUES
('', 'SMP N 5 PPU', 'Jl. Propinsi KM. 16, Giri Mukti, Penajam, Giri Mukti, Penajam, Kabupaten Penajam Paser Utara, Kalimantan Timur 76143\r\nCopy address', 'Yaleswati', NULL, NULL, NULL, 'Kalimantan Timur', 'PPU', 'Penajam', 'Giri Mukti', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '-1.3428435', '116.6084843', NULL, NULL, NULL),
('30402057', 'SMP NEGERI 1 PENAJAM PASER UTARA', 'Jl. Propinsi Km 1 Penajam, Penajam, Kec. Penajam, Kab. Penajam Paser Utara Prov. Kalimantan Timur', 'Edy Prayitno', NULL, NULL, NULL, NULL, NULL, 'Penajam', 'Penajam', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '-1.2495833', '116.7742662', NULL, NULL, NULL),
('69926307', 'SMPN 25 Penajam Paser Utara', 'jl. provinsi km. 16 kel. bulu minung', 'Nuzuludin Susanto', NULL, NULL, NULL, NULL, NULL, 'Penajam', 'Bulu Minung', NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '-1.2411666', '116.5664704', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('samsul.mj10@gmail.com', '$2y$10$sdK7XZCsasx2Wu19ZHfCGOcjNBwhEon02cVf9B/UzX.2Ha2RLhSoe', '2019-11-03 13:58:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(31, 'mjsyam', 'samsul.mj10@gmail.com', NULL, '$2y$10$GjYp5exYxrdFHHTfGc.b3OirXpFThSugM2r.gc6UlqZ8vH5gj3WKy', NULL, '2019-11-03 06:38:09', '2019-11-03 06:38:09'),
(32, 'Umar Mustofa', 'umar@gmail.com', NULL, '$2y$10$X6EMYciz36c15y4zGXTswO5qgOqs7bgYvf0u1KF/qCfBl8qcvlni2', NULL, '2019-11-17 16:42:04', '2019-11-17 16:42:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outlets`
--
ALTER TABLE `outlets`
  ADD PRIMARY KEY (`nib`),
  ADD KEY `outlets_creator_id_foreign` (`creator_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `outlets`
--
ALTER TABLE `outlets`
  ADD CONSTRAINT `outlets_creator_id_foreign` FOREIGN KEY (`creator_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
