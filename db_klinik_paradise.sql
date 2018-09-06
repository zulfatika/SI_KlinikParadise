-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2018 at 04:18 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_klinik_paradise`
--

-- --------------------------------------------------------

--
-- Table structure for table `antrian`
--

CREATE TABLE `antrian` (
  `id_antrian` int(10) UNSIGNED NOT NULL,
  `tgl_periksa` date NOT NULL,
  `urutan_antrian` int(11) NOT NULL,
  `status_cek` varchar(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_pasien` int(10) UNSIGNED NOT NULL,
  `id_poli` int(10) UNSIGNED NOT NULL,
  `id_jadwalklinik` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `antrian`
--

INSERT INTO `antrian` (`id_antrian`, `tgl_periksa`, `urutan_antrian`, `status_cek`, `id_pasien`, `id_poli`, `id_jadwalklinik`, `created_at`, `updated_at`) VALUES
(1, '2018-08-08', 1, '2', 3, 1, 1, NULL, NULL),
(2, '2018-08-08', 2, '1', 4, 1, 1, NULL, NULL),
(3, '2018-08-08', 3, '0', 5, 1, 1, NULL, NULL),
(4, '2018-08-08', 1, '0', 6, 2, 1, NULL, NULL),
(5, '2018-08-08', 2, '0', 7, 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cekfisik`
--

CREATE TABLE `cekfisik` (
  `id_fisik` int(10) UNSIGNED NOT NULL,
  `tek_darah` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nadi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rr` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `suhu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spo2` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat_bdn` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinggi_bdn` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pasien` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cekfisik`
--

INSERT INTO `cekfisik` (`id_fisik`, `tek_darah`, `nadi`, `rr`, `suhu`, `spo2`, `berat_bdn`, `tinggi_bdn`, `id_pasien`, `created_at`, `updated_at`) VALUES
(1, '112', '78', '20', '38', '120', '45', '150', 8, '2018-07-27 03:15:16', '2018-08-02 03:15:16'),
(2, '111', '80', '17', '37', '120', '50', '151', 8, '2018-07-28 03:18:49', '2018-08-02 03:18:49'),
(3, '113', '86', '15', '37', '110', '60', '170', 3, '2018-07-27 03:21:58', '2018-08-02 03:21:58'),
(4, '108', '98', '20', '40', '130', '65', '171', 3, '2018-07-28 03:24:24', '2018-08-02 03:24:24'),
(5, '110', '88', '18', '37', '120', '44', '152', 8, '2018-07-28 18:35:04', '2018-08-02 18:35:04'),
(6, '112', '86', '19', '38', '110', '45', '152', 8, '2018-07-29 18:46:20', '2018-08-02 18:46:20'),
(7, '116', '90', '21', '39', '119', '45', '153', 8, '2018-07-30 18:57:09', '2018-08-02 18:57:09'),
(8, '126', '93', '22', '37', '125', '48', '153', 8, '2018-07-31 19:04:41', '2018-08-02 19:04:41'),
(9, '141', '85', '19', '39', '110', '45', '154', 8, '2018-08-01 19:11:16', '2018-08-02 19:11:16'),
(10, '129', '90', '19', '38', '120', '68', '171', 3, '2018-07-28 19:20:02', '2018-08-02 19:20:02'),
(11, '138', '93', '19', '38', '120', '70', '172', 3, '2018-07-29 19:32:51', '2018-08-02 19:32:51'),
(12, '136', '92', '17', '36', '125', '67', '173', 3, '2018-07-30 19:40:33', '2018-08-02 19:40:33'),
(13, '120', '88', '20', '39', '130', '69', '173', 3, '2018-07-31 19:46:33', '2018-08-02 19:46:33'),
(14, '110', '87', '18', '36', '121', '45', '162', 4, '2018-07-31 22:37:17', '2018-08-02 22:37:17'),
(15, '113', '89', '19', '39', '120', '46', '162', 4, '2018-08-01 22:41:32', '2018-08-02 22:41:32'),
(16, '110', '92', '18', '37', '120', '55', '164', 7, '2018-08-04 06:36:07', '2018-08-04 06:36:07'),
(17, '110', '89', '19', '37', '115', '45', '150', 5, '2018-08-07 00:19:21', '2018-08-07 00:19:21'),
(18, '110', '89', '18', '38', '120', '45', '150', 4, '2018-08-08 01:18:17', '2018-08-08 01:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `sip_dokter` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_poli` int(10) UNSIGNED NOT NULL,
  `id_jadwal` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `id_user`, `sip_dokter`, `token`, `alamat`, `jenis_kelamin`, `no_telp`, `id_poli`, `id_jadwal`, `created_at`, `updated_at`) VALUES
(2, 4, '503.446/1990/I/IP.DU/436.6.3/2013', NULL, 'Penjaringan 45-F Surabaya', 'P', '089778168768', 1, 1, '2018-07-09 07:18:25', '2018-07-09 07:18:25'),
(3, 5, '503.446/1990/I/IP.DU/436.6.3/2012', NULL, 'Rungkut Menanggal Harapan', 'P', '089623893298', 2, 1, '2018-07-18 13:17:55', '2018-07-18 13:17:55'),
(6, 8, '503.446/1990/I/IP.DU/436.6.3/2014', NULL, 'Rungkut Menanggal Harapan', 'L', '087977263819', 1, 1, '2018-08-01 23:56:40', '2018-08-01 23:56:40'),
(7, 9, '503.446/1142/I/IP.DG/436.6.3/2013', NULL, 'Perum Gunung Anyar No.52 Surabaya', 'P', '087971239698', 2, 2, '2018-08-01 23:58:52', '2018-08-01 23:58:52'),
(8, 10, '503.446/1098/I/IP.DU/436.6.3/2013', NULL, 'Rungkut Asri Tengah No.45 Surabaya', 'P', '087568239467', 3, 1, '2018-08-02 00:01:20', '2018-08-02 00:01:20');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_klinik`
--

CREATE TABLE `jadwal_klinik` (
  `id_jadwalklinik` int(10) UNSIGNED NOT NULL,
  `shift_klinik` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_buka` time NOT NULL,
  `jam_tutup` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_klinik`
--

INSERT INTO `jadwal_klinik` (`id_jadwalklinik`, `shift_klinik`, `jam_buka`, `jam_tutup`, `created_at`, `updated_at`) VALUES
(1, 'Siang', '09:00:00', '14:00:00', '2018-07-09 06:18:36', '2018-07-09 06:18:36'),
(2, 'Malam', '19:00:00', '01:00:00', '2018-07-09 06:19:02', '2018-07-09 06:19:02');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_praktek`
--

CREATE TABLE `jadwal_praktek` (
  `id_jadwal` int(10) UNSIGNED NOT NULL,
  `shift_praktek` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hari_praktek` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jam_praktek` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal_praktek`
--

INSERT INTO `jadwal_praktek` (`id_jadwal`, `shift_praktek`, `hari_praktek`, `jam_praktek`, `created_at`, `updated_at`) VALUES
(1, 'Siang', 'Senin-Kamis', '09.00-14.00', '2018-07-09 06:33:20', '2018-07-09 06:33:20'),
(2, 'Malam', 'Senin-Kamis', '19.00-22.00', '2018-07-09 06:33:27', '2018-07-09 06:33:27'),
(3, 'Siang', 'Jumat-Sabtu', '09.00-14.00', '2018-07-09 06:33:45', '2018-07-09 06:33:45'),
(4, 'Malam', 'Jumat-Sabtu', '19.00-22.00', '2018-07-09 06:33:55', '2018-07-09 06:33:55'),
(5, 'Siang', 'Jumat-Minggu', '09.00-14.00', '2018-07-09 06:34:02', '2018-07-09 06:34:02'),
(6, 'Malam', 'Jumat-Minggu', '19.00-22.00', '2018-07-09 06:34:10', '2018-07-09 06:34:10'),
(7, 'Siang', 'Minggu', '09.00-14.00', '2018-07-09 06:34:15', '2018-07-09 06:34:15'),
(8, 'Malam', 'Minggu', '19.00-22.00', '2018-07-09 06:34:35', '2018-07-09 06:34:35');

-- --------------------------------------------------------

--
-- Table structure for table `jenispemeriksaanlab`
--

CREATE TABLE `jenispemeriksaanlab` (
  `id_jeniskadar` int(10) UNSIGNED NOT NULL,
  `nama_kadar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `standart_kadar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan_kadar` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jenispemeriksaanlab`
--

INSERT INTO `jenispemeriksaanlab` (`id_jeniskadar`, `nama_kadar`, `standart_kadar`, `satuan_kadar`, `created_at`, `updated_at`) VALUES
(1, 'Kolesterol', '200', 'mg/dl', '2018-07-18 13:21:38', '2018-07-18 13:21:38'),
(2, 'Asam urat', '210', 'mg/dl', '2018-07-18 13:22:03', '2018-07-18 13:22:03'),
(3, 'Hemoglobin', '220', 'mg/dl', '2018-07-18 13:22:23', '2018-07-18 13:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2018_03_28_044005_create_pasien_table', 1),
(3, '2018_03_28_044010_create_poli_table', 1),
(4, '2018_03_28_044122_create_jadwal_klinik_table', 1),
(5, '2018_03_28_044232_create_antrian_table', 1),
(6, '2018_03_28_044515_create_cekfisik_table', 1),
(7, '2018_03_28_044812_create_jenispemeriksaanlab_table', 1),
(8, '2018_03_28_045052_create_pemeriksaanlab_table', 1),
(9, '2018_03_28_045129_create_obat_table', 1),
(10, '2018_03_28_045554_create_jadwal_praktek_table', 1),
(11, '2018_03_28_051625_create_dokter_table', 1),
(12, '2018_03_28_052016_create_rm_pemeriksaan_table', 1),
(13, '2018_03_28_053052_create_resep_obat_table', 1),
(14, '2018_03_28_053120_create_resep_racikan_table', 1),
(15, '2018_03_28_053528_create_pegawai_table', 1),
(16, '2018_04_19_125920_create_entrust_user_table', 1),
(17, '2018_06_27_095541_create_status_antrian_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(10) UNSIGNED NOT NULL,
  `nama_obat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan_obat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`, `satuan_obat`, `created_at`, `updated_at`) VALUES
(1, 'Amoxicillin', 'tablet', '2018-07-18 13:42:26', '2018-07-18 13:42:26'),
(2, 'Cefadroxil', 'tablet', '2018-07-18 13:42:49', '2018-07-18 13:42:49'),
(3, 'Acyclovir 5', 'krim', '2018-07-31 21:14:19', '2018-07-31 21:14:19'),
(4, 'Acyclovir 400 mg', 'tablet', '2018-07-31 22:08:39', '2018-07-31 22:08:39'),
(5, 'Alletrol T. Mata 5 ml', 'tetes mata', '2018-07-31 22:10:43', '2018-07-31 22:10:43'),
(6, 'Amlodipine 5 mg', 'tablet', '2018-07-31 22:11:11', '2018-07-31 22:11:11'),
(7, 'Amlodipine 10 mg', 'tablet', '2018-07-31 22:11:58', '2018-07-31 22:11:58'),
(8, 'Anaton', 'tablet', '2018-07-31 22:13:14', '2018-07-31 22:13:14'),
(9, 'Anaton', 'syrup', '2018-07-31 22:13:31', '2018-07-31 22:13:31'),
(10, 'Aspilets', 'tablet', '2018-08-01 02:49:24', '2018-08-01 02:49:24'),
(11, 'Berlicort', 'krim', '2018-08-01 02:49:45', '2018-08-01 02:49:45'),
(12, 'Berloson-N', 'tablet', '2018-08-01 02:50:14', '2018-08-01 02:50:14'),
(13, 'Biovitan', 'syrup', '2018-08-01 02:50:37', '2018-08-01 02:50:37'),
(14, 'Bubuk Tabur', 'serbuk', '2018-08-01 02:51:09', '2018-08-01 02:51:09'),
(15, 'Bufacaryl', 'tablet', '2018-08-01 02:51:34', '2018-08-01 02:51:34'),
(16, 'Calortusin', 'tablet', '2018-08-01 02:51:58', '2018-08-01 02:51:58'),
(17, 'Caps Teosal', 'kapsul', '2018-08-01 02:59:07', '2018-08-01 02:59:07'),
(18, 'Caps Wiros', 'kapsul', '2018-08-01 02:59:26', '2018-08-01 02:59:26'),
(19, 'Caviplex', 'kaplet', '2018-08-01 02:59:58', '2018-08-01 02:59:58'),
(20, 'Cazetin Drop', 'syrup', '2018-08-01 03:00:25', '2018-08-01 03:00:25'),
(21, 'Cefadroxil 500 mg', 'tablet', '2018-08-01 03:00:59', '2018-08-01 03:00:59'),
(22, 'Cefadroxil Forte', 'syrup', '2018-08-01 03:01:29', '2018-08-01 03:01:29'),
(23, 'Cefadroxil', 'syrup', '2018-08-01 03:01:47', '2018-08-01 03:01:47'),
(24, 'Cefixime 100 mg', 'kaplet', '2018-08-01 03:02:21', '2018-08-01 03:02:21'),
(25, 'Cefixime', 'syrup', '2018-08-01 23:11:20', '2018-08-01 23:11:20'),
(27, 'Cetirizine 10 mg', 'kapsul', '2018-08-01 23:12:38', '2018-08-01 23:12:38'),
(28, 'Cetrizine 5 mg / 6 ml', 'syrup', '2018-08-01 23:13:51', '2018-08-01 23:13:51'),
(29, 'Clindamycin 300 mg', 'tablet', '2018-08-01 23:14:21', '2018-08-01 23:14:21'),
(30, 'CTM 4 mg', 'tablet', '2018-08-01 23:14:42', '2018-08-01 23:14:42'),
(31, 'Demacolin', 'syrup', '2018-08-01 23:14:55', '2018-08-01 23:14:55'),
(32, 'Demacolin', 'tablet', '2018-08-01 23:15:07', '2018-08-01 23:15:07'),
(33, 'Dexamethasone 0,5 mg', 'tablet', '2018-08-01 23:15:48', '2018-08-01 23:15:48'),
(34, 'Ekacetol', 'syrup', '2018-08-01 23:16:23', '2018-08-01 23:16:23'),
(35, 'Eryra Forte', 'tablet', '2018-08-01 23:16:48', '2018-08-01 23:16:48'),
(36, 'Etafenin Forte', 'tablet', '2018-08-01 23:17:13', '2018-08-01 23:17:13'),
(37, 'Famotidin 20 mg', 'tablet', '2018-08-01 23:18:43', '2018-08-01 23:18:43'),
(38, 'Farmoten 25 mg', 'tablet', '2018-08-01 23:19:17', '2018-08-01 23:19:17'),
(39, 'Flutrop', 'tablet', '2018-08-01 23:19:35', '2018-08-01 23:19:35'),
(40, 'Flutrop', 'syrup', '2018-08-01 23:19:48', '2018-08-01 23:19:48'),
(41, 'GG', 'tablet', '2018-08-01 23:19:59', '2018-08-01 23:19:59'),
(42, 'Grafalin 2 mg', 'tablet', '2018-08-01 23:20:23', '2018-08-01 23:20:23'),
(43, 'Gralixa 40 mg', 'tablet', '2018-08-01 23:20:52', '2018-08-01 23:20:52'),
(44, 'Grantusif', 'tablet', '2018-08-01 23:21:09', '2018-08-01 23:21:09'),
(45, 'Histigo', 'tablet', '2018-08-01 23:21:21', '2018-08-01 23:21:21'),
(46, 'Ibuprofen 400 mg', 'tablet', '2018-08-01 23:21:47', '2018-08-01 23:21:47'),
(47, 'Inamid 2 mg', 'tablet', '2018-08-01 23:22:09', '2018-08-01 23:22:09'),
(48, 'Insic', 'syrup', '2018-08-01 23:22:31', '2018-08-01 23:22:31'),
(49, 'ISDN', 'tablet', '2018-08-01 23:22:45', '2018-08-01 23:22:45'),
(50, 'Itrabat', 'syrup', '2018-08-01 23:23:00', '2018-08-01 23:23:00'),
(51, 'Ketoconazole 200 mg', 'tablet', '2018-08-01 23:23:45', '2018-08-01 23:23:45'),
(52, 'Kompolax', 'syrup', '2018-08-01 23:24:00', '2018-08-01 23:24:00'),
(53, 'Kurkumex', 'syrup', '2018-08-01 23:24:19', '2018-08-01 23:24:19'),
(54, 'Kurkumex', 'tablet', '2018-08-01 23:24:38', '2018-08-01 23:24:38'),
(55, 'L-Bio', 'tablet', '2018-08-01 23:24:50', '2018-08-01 23:24:50'),
(56, 'Lanzoprazole', 'tablet', '2018-08-01 23:25:15', '2018-08-01 23:25:15'),
(57, 'Latibet 5 mg', 'tablet', '2018-08-01 23:25:32', '2018-08-01 23:25:32'),
(58, 'Laxadine Emulsi 110 ml', 'syrup', '2018-08-01 23:26:09', '2018-08-01 23:26:09'),
(59, 'Licogenta', 'krim', '2018-08-01 23:26:28', '2018-08-01 23:26:28'),
(60, 'Lodecont Forte', 'tablet', '2018-08-01 23:26:55', '2018-08-01 23:26:55'),
(61, 'Lostacef', 'syrup', '2018-08-01 23:27:16', '2018-08-01 23:27:16'),
(62, 'Methylprednisolone 16 mg', 'tablet', '2018-08-01 23:27:48', '2018-08-01 23:27:48'),
(63, 'Methylprednisolone 4 mg', 'tablet', '2018-08-01 23:28:12', '2018-08-01 23:28:12'),
(64, 'Miconazole 2%', 'tablet', '2018-08-01 23:28:38', '2018-08-01 23:28:38'),
(65, 'Molacort 0,75 mg', 'tablet', '2018-08-01 23:29:23', '2018-08-01 23:29:23'),
(66, 'Moxigra 500 mg', 'tablet', '2018-08-01 23:29:37', '2018-08-01 23:29:37'),
(67, 'Neurodex', 'tablet', '2018-08-01 23:30:02', '2018-08-01 23:30:02'),
(68, 'Neuromec 500 mg', 'tablet', '2018-08-01 23:30:26', '2018-08-01 23:30:26'),
(69, 'Niprocor', 'tablet', '2018-08-01 23:30:42', '2018-08-01 23:30:42'),
(70, 'Norvom 10 mg', 'tablet', '2018-08-01 23:31:04', '2018-08-01 23:31:04'),
(71, 'Norvom', 'syrup', '2018-08-01 23:31:21', '2018-08-01 23:31:21'),
(72, 'Novadiar', 'syrup', '2018-08-01 23:31:46', '2018-08-01 23:31:46'),
(73, 'Novaflox', 'tablet', '2018-08-01 23:32:11', '2018-08-01 23:32:11'),
(74, 'Novagyl', 'tablet', '2018-08-01 23:32:26', '2018-08-01 23:32:26'),
(75, 'Nufatrim', 'syrup', '2018-08-01 23:32:44', '2018-08-01 23:32:44'),
(76, 'Omedom', 'syrup', '2018-08-01 23:33:04', '2018-08-01 23:33:04'),
(77, 'Omegdiar', 'tablet', '2018-08-01 23:33:31', '2018-08-01 23:33:31'),
(78, 'Omegluphage', 'tablet', '2018-08-01 23:35:50', '2018-08-01 23:35:50'),
(79, 'Omelegar', 'tablet', '2018-08-01 23:36:08', '2018-08-01 23:36:08'),
(80, 'Omenhidrinat', 'tablet', '2018-08-01 23:36:26', '2018-08-01 23:36:26'),
(81, 'Omeprazole 20 mg', 'kapsul', '2018-08-01 23:36:48', '2018-08-01 23:36:48'),
(82, 'Omeric 300 mg', 'tablet', '2018-08-01 23:37:08', '2018-08-01 23:37:08'),
(83, 'Omeroxol', 'tablet', '2018-08-01 23:37:57', '2018-08-01 23:37:57'),
(84, 'Omevomid', 'syrup', '2018-08-01 23:38:15', '2018-08-01 23:38:15'),
(85, 'Otoprim', 'tablet', '2018-08-01 23:38:33', '2018-08-01 23:38:33'),
(86, 'Papaverin 40 mg', 'tablet', '2018-08-01 23:40:21', '2018-08-01 23:40:21'),
(87, 'Pil Hormon', 'pil', '2018-08-01 23:40:38', '2018-08-01 23:40:38'),
(88, 'Piracetam 400 mg', 'tablet', '2018-08-01 23:40:55', '2018-08-01 23:40:55'),
(89, 'Piroxicam 20 mg', 'tablet', '2018-08-01 23:41:19', '2018-08-01 23:41:19'),
(90, 'Prednisone 5 mg', 'tablet', '2018-08-01 23:42:08', '2018-08-01 23:42:08'),
(91, 'Ranacid Forte', 'tablet', '2018-08-01 23:42:30', '2018-08-01 23:42:30'),
(92, 'Ranacid', 'syrup', '2018-08-01 23:42:46', '2018-08-01 23:42:46'),
(93, 'Ranitidin 150 mg', 'tablet', '2018-08-01 23:43:12', '2018-08-01 23:43:12'),
(94, 'Reco Tetes Mata', 'tetes mata', '2018-08-01 23:43:38', '2018-08-01 23:43:38'),
(95, 'Reco Tetes Telinga', 'tetes telinga', '2018-08-01 23:44:16', '2018-08-01 23:44:16'),
(96, 'Selvim 10 mg', 'tablet', '2018-08-01 23:44:33', '2018-08-01 23:44:33'),
(97, 'Solathim', 'tablet', '2018-08-01 23:44:50', '2018-08-01 23:44:50'),
(98, 'Solinfec', 'krim', '2018-08-01 23:45:10', '2018-08-01 23:45:10'),
(99, 'Spasminal', 'tablet', '2018-08-01 23:45:22', '2018-08-01 23:45:22'),
(100, 'Suprabion', 'tablet', '2018-08-01 23:45:50', '2018-08-01 23:45:50'),
(101, 'Teosal', 'tablet', '2018-08-01 23:46:02', '2018-08-01 23:46:02'),
(102, 'Termagon', 'tablet', '2018-08-01 23:46:18', '2018-08-01 23:46:18'),
(103, 'Thiamfilex', 'syrup', '2018-08-01 23:46:37', '2018-08-01 23:46:37'),
(104, 'Thrombo Aspilet 80 mg', 'tablet', '2018-08-01 23:47:05', '2018-08-01 23:47:05'),
(105, 'Vesperum', 'tablet', '2018-08-01 23:47:30', '2018-08-01 23:47:30'),
(106, 'Vitamin B Complex', 'tablet', '2018-08-01 23:47:48', '2018-08-01 23:47:48'),
(107, 'Vitamin C 100 mg', 'tablet', '2018-08-01 23:48:10', '2018-08-01 23:48:10'),
(108, 'Vitamin K 10 mg', 'tablet', '2018-08-01 23:48:25', '2018-08-01 23:48:25'),
(109, 'Voltadex 50 mg', 'tablet', '2018-08-01 23:48:43', '2018-08-01 23:48:43'),
(110, 'Wiros', 'tablet', '2018-08-01 23:48:57', '2018-08-01 23:48:57'),
(111, 'Yusimox Forte', 'syrup', '2018-08-01 23:49:30', '2018-08-01 23:49:30'),
(112, 'Yusimox', 'syrup', '2018-08-01 23:49:53', '2018-08-01 23:49:53'),
(113, 'Zinc 20 mg', 'tablet', '2018-08-01 23:50:10', '2018-08-01 23:50:10'),
(114, 'Ondansentron 4 mg', 'tablet', '2018-08-01 23:50:31', '2018-08-01 23:50:31'),
(115, 'Benason-N', 'tablet', '2018-08-01 23:50:54', '2018-08-01 23:50:54'),
(116, 'HCT', 'tablet', '2018-08-01 23:51:04', '2018-08-01 23:51:04'),
(117, 'Glimepiride 2 mg', 'tablet', '2018-08-01 23:51:28', '2018-08-01 23:51:28'),
(118, 'Meloxicam 15 mg', 'tablet', '2018-08-01 23:51:51', '2018-08-01 23:51:51');

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(10) UNSIGNED NOT NULL,
  `no_kartu` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nik` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pasien` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `riwayat_alergi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `no_kartu`, `nik`, `nama_pasien`, `password`, `token`, `tempat_lahir`, `tgl_lahir`, `alamat`, `no_telp`, `jenis_kelamin`, `riwayat_alergi`, `created_at`, `updated_at`) VALUES
(3, '000003', '5432', 'andi', '$2y$10$mddKk048jHTo3s9OmFWTHOLrREy2By6j7UhnNd/MHZM4RCz2umlgK', 'c927qSdihvQ:APA91bEkC6qOV6TEhdy4huusZVejHJKigehJO8APajNVC03HFRPCNDGyYEc3j4RRummVXf4dgZza1RSXM5CrDDqsvvA9Bf5uw6xnbhyhYXS7ejRVThs-DFtO4k2tT1FeVxKr6-mgX90xwp7JvjiOh2B_A1QUPsd0pg', 'surabaya', '1998-07-10', 'kendalsari', '08767862832829', 'l', 'debu', '2018-07-18 18:55:44', '2018-07-18 18:55:44'),
(4, '000004', '9876', 'rizka', '$2y$10$EUfKOUUTQHwgp0nA4AXZtudZt9k1DXCP.T.J65/whUtEsJsU3/khC', 'c927qSdihvQ:APA91bEkC6qOV6TEhdy4huusZVejHJKigehJO8APajNVC03HFRPCNDGyYEc3j4RRummVXf4dgZza1RSXM5CrDDqsvvA9Bf5uw6xnbhyhYXS7ejRVThs-DFtO4k2tT1FeVxKr6-mgX90xwp7JvjiOh2B_A1QUPsd0pg', 'surabaya', '1996-11-05', 'keputih', '08589237829', 'p', 'tidak ada', '2018-07-18 18:56:57', '2018-07-18 18:56:57'),
(5, '000005', '5678', 'dian', '$2y$10$EoUkTYYJerOFlRIR6LA6SOgwhL6Vqz1IoucY.sc21qG4CPGBOTfTq', 'fhK1uDSfcEE:APA91bFN_nUxcuSCRg2R9vwdOQUlNKH7tOdgm7Xeu_OkVkzNFxWKkaLmTLLwTcQByDgWoDT7OhP7fxfF6u3lPX9e0eDNww5DO-pqylfshj5kvH6GDiYvd_6JwF5haXUHOR8zv-exw8DvgI_KXHfMgNKN-fj6JOsFdA', 'surabaya', '1998-01-27', 'penjaringan', '08962897281', 'p', 'tidak ada', '2018-07-16 18:58:11', '2018-07-18 18:58:11'),
(6, '000006', '7654', 'satya', '$2y$10$PIfl5CiMqqMvSh/nKaB53eNxnY/xyoOlgyth4vYUjjX/soVjZB6ia', 'fhK1uDSfcEE:APA91bFN_nUxcuSCRg2R9vwdOQUlNKH7tOdgm7Xeu_OkVkzNFxWKkaLmTLLwTcQByDgWoDT7OhP7fxfF6u3lPX9e0eDNww5DO-pqylfshj5kvH6GDiYvd_6JwF5haXUHOR8zv-exw8DvgI_KXHfMgNKN-fj6JOsFdA', 'jajjgsj', '2009-11-25', 'uakhzns', '0899178628981', 'P', 'gshhaj', '2018-07-21 04:36:26', '2018-07-21 04:36:26'),
(7, '000007', '1234', 'atika', '$2y$10$46HEcWKP/rrz9yUyvFkT6.lLg./AAjlp05OPbc01bVRMhKnBROWCu', 'fhK1uDSfcEE:APA91bFN_nUxcuSCRg2R9vwdOQUlNKH7tOdgm7Xeu_OkVkzNFxWKkaLmTLLwTcQByDgWoDT7OhP7fxfF6u3lPX9e0eDNww5DO-pqylfshj5kvH6GDiYvd_6JwF5haXUHOR8zv-exw8DvgI_KXHfMgNKN-fj6JOsFdA', 'surabaya', '1996-02-21', 'pebjaringan', '08817682', 'P', 'tdk ada', '2018-07-25 03:53:20', '2018-07-25 03:53:20'),
(8, '000008', '2345', 'rezky', '$2y$10$8ttOmlRhEXhxEHCcDVXQ3eXmUSE7r8Bv5K/xY50fv52aHUa8MOSyu', 'fhK1uDSfcEE:APA91bFN_nUxcuSCRg2R9vwdOQUlNKH7tOdgm7Xeu_OkVkzNFxWKkaLmTLLwTcQByDgWoDT7OhP7fxfF6u3lPX9e0eDNww5DO-pqylfshj5kvH6GDiYvd_6JwF5haXUHOR8zv-exw8DvgI_KXHfMgNKN-fj6JOsFdA', 'Lamongan', '1996-07-24', 'bendul merisi', '089927882782', 'P', 'tidak ada', '2018-07-31 20:00:24', '2018-07-31 20:00:24');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(10) UNSIGNED NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `token` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_user`, `token`, `alamat`, `jenis_kelamin`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, 3, NULL, 'Rungkut Menanggal Harapan', 'P', '08917786261', '2018-07-09 06:35:52', '2018-07-09 06:35:52'),
(2, 11, NULL, 'Rungkut Asri Tengah', 'P', '089678473827', '2018-08-08 09:41:06', '2018-08-08 09:41:06');

-- --------------------------------------------------------

--
-- Table structure for table `pemeriksaanlab`
--

CREATE TABLE `pemeriksaanlab` (
  `id_ceklab` int(10) UNSIGNED NOT NULL,
  `hasil_kadar` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci,
  `id_jeniskadar` int(10) UNSIGNED NOT NULL,
  `id_pasien` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pemeriksaanlab`
--

INSERT INTO `pemeriksaanlab` (`id_ceklab`, `hasil_kadar`, `keterangan`, `id_jeniskadar`, `id_pasien`, `created_at`, `updated_at`) VALUES
(1, '210', 'lebih', 1, 8, '2018-07-28 03:19:15', '2018-08-02 03:19:15'),
(2, '210', 'normal', 2, 8, '2018-07-28 03:19:15', '2018-08-02 03:19:15'),
(3, '200', 'kurang', 3, 8, '2018-07-28 03:19:15', '2018-08-02 03:19:15'),
(4, '201', 'normal', 1, 3, '2018-07-28 03:22:26', '2018-08-02 03:22:26'),
(5, '211', 'lebih', 2, 3, '2018-07-28 03:22:26', '2018-08-02 03:22:26'),
(6, '211', 'kurang', 3, 3, '2018-07-28 03:22:26', '2018-08-02 03:22:26'),
(7, '210', 'lebih', 1, 8, '2018-07-28 18:35:36', '2018-08-02 18:35:36'),
(8, '210', 'normal', 2, 8, '2018-07-28 18:35:36', '2018-08-02 18:35:36'),
(9, '225', 'lebih', 3, 8, '2018-07-28 18:35:37', '2018-08-02 18:35:37'),
(10, '209', NULL, 1, 8, '2018-07-29 18:47:07', '2018-08-02 18:47:07'),
(11, '211', NULL, 2, 8, '2018-07-29 18:47:07', '2018-08-02 18:47:07'),
(12, '220', 'normal', 3, 8, '2018-07-29 18:47:07', '2018-08-02 18:47:07'),
(13, '210', 'lebih', 1, 8, '2018-07-30 18:57:37', '2018-08-02 18:57:37'),
(14, '210', 'normal', 2, 8, '2018-07-30 18:57:37', '2018-08-02 18:57:37'),
(15, '220', 'normal', 3, 8, '2018-07-30 18:57:38', '2018-08-02 18:57:38'),
(16, '238', 'lebih', 1, 8, '2018-08-01 19:12:30', '2018-08-02 19:12:30'),
(17, '211', NULL, 2, 8, '2018-08-01 19:12:30', '2018-08-02 19:12:30'),
(18, '220', 'normal', 3, 8, '2018-08-01 19:12:30', '2018-08-02 19:12:30'),
(22, '200', 'normal', 1, 3, '2018-07-30 16:33:17', '2018-08-02 19:33:17'),
(23, '210', 'normal', 2, 3, '2018-07-29 19:33:17', '2018-08-02 19:33:17'),
(24, '230', 'lebih', 3, 3, '2018-07-29 19:33:17', '2018-08-02 19:33:17'),
(25, '193', 'kurang', 1, 3, '2018-07-30 19:41:04', '2018-08-02 19:41:04'),
(26, '210', 'normal', 2, 3, '2018-07-30 19:41:04', '2018-08-02 19:41:04'),
(27, '220', 'normal', 3, 3, '2018-07-30 19:41:04', '2018-08-02 19:41:04'),
(28, '210', 'lebih', 1, 4, '2018-07-31 22:37:39', '2018-08-02 22:37:39'),
(29, '210', 'normal', 2, 4, '2018-07-31 22:37:39', '2018-08-02 22:37:39'),
(30, '220', 'normal', 3, 4, '2018-07-31 22:37:39', '2018-08-02 22:37:39'),
(31, '200', 'normal', 1, 4, '2018-08-01 22:41:55', '2018-08-02 22:41:55'),
(32, '210', 'normal', 2, 4, '2018-08-01 22:41:55', '2018-08-02 22:41:55'),
(33, '210', 'kurang', 3, 4, '2018-08-01 22:41:55', '2018-08-02 22:41:55'),
(34, '200', 'normal', 1, 7, '2018-08-04 06:36:44', '2018-08-04 06:36:44'),
(35, '220', 'lebih', 2, 7, '2018-08-04 06:36:44', '2018-08-04 06:36:44'),
(36, '220', 'normal', 3, 7, '2018-08-04 06:36:44', '2018-08-04 06:36:44'),
(37, '200', 'normal', 1, 5, '2018-08-07 00:19:47', '2018-08-07 00:19:47'),
(38, '215', 'lebih', 2, 5, '2018-08-07 00:19:47', '2018-08-07 00:19:47'),
(39, '220', 'normal', 3, 5, '2018-08-07 00:19:47', '2018-08-07 00:19:47');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'edit-user', 'Edit Users', 'edit existing users', '2018-07-09 06:17:11', '2018-07-09 06:17:11'),
(2, 'insert-user', 'Insert User', 'insert all data users', '2018-07-09 06:17:11', '2018-07-09 06:17:11'),
(3, 'edit-all-data', 'Edit Data From All Table', 'edit data pasien, s', '2018-07-09 06:17:11', '2018-07-09 06:17:11'),
(4, 'insert-all-data', 'Insert All Data ..', 'insert data absence', '2018-07-09 06:17:11', '2018-07-09 06:17:11'),
(5, 'view-data-rm', 'View Data', 'view data absence', '2018-07-09 06:17:11', '2018-07-09 06:17:11');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(4, 2),
(4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `poli`
--

CREATE TABLE `poli` (
  `id_poli` int(10) UNSIGNED NOT NULL,
  `nama_poli` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `poli`
--

INSERT INTO `poli` (`id_poli`, `nama_poli`, `keterangan`, `created_at`, `updated_at`) VALUES
(1, 'Poli Umum', 'untuk pemeriksaan penyakit umum', '2018-07-09 07:11:43', '2018-07-09 07:11:43'),
(2, 'Poli Gigi', 'untuk pemeriksaan gigi', '2018-07-09 14:14:11', '2018-07-09 14:14:11'),
(3, 'Poli Kecantikan', 'untuk pemeriksaan kecantikan', '2018-07-09 14:17:39', '2018-07-09 14:17:39');

-- --------------------------------------------------------

--
-- Table structure for table `resep_obat`
--

CREATE TABLE `resep_obat` (
  `id_resep_obat` int(10) UNSIGNED NOT NULL,
  `jml_obat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aturan_pakai` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_obat` int(10) UNSIGNED NOT NULL,
  `id_rm` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `resep_obat`
--

INSERT INTO `resep_obat` (`id_resep_obat`, `jml_obat`, `aturan_pakai`, `keterangan`, `id_obat`, `id_rm`, `created_at`, `updated_at`) VALUES
(1, '10', '3 x sehari 1 tablet setelah makan', 'obat jadi', 1, 1, '2018-07-27 03:16:26', '2018-08-02 03:16:26'),
(2, '5', '3 x sehari 1 tab setelah makan', 'obat jadi', 10, 1, '2018-07-27 03:17:01', '2018-08-02 03:17:01'),
(3, '10', '3xsehari 1 tab', 'obat racikan', 11, 2, '2018-07-28 03:20:35', '2018-08-02 03:20:35'),
(4, '10', '3xsehari 1 tab', 'obat jadi', 10, 3, '2018-07-27 03:23:24', '2018-08-02 03:23:24'),
(5, '3', '3xsehari 1 tab', 'obat racikan', 12, 3, '2018-07-27 03:23:45', '2018-08-02 03:23:45'),
(6, '5', '3xsehari 1 tab', 'obat jadi', 109, 4, '2018-07-28 03:25:18', '2018-08-02 03:25:18'),
(7, '13', '3xsehari 1 tab seteah makan', 'obat jadi', 66, 5, '2018-07-28 18:37:22', '2018-08-02 18:37:22'),
(8, '12', '3xsehari 1 tab setelah makan', 'obat jadi', 15, 5, '2018-07-28 18:37:49', '2018-08-02 18:37:49'),
(9, '13', '3xsehari 1 tab setelah makan', 'obat jadi', 8, 5, '2018-07-28 18:38:13', '2018-08-02 18:38:13'),
(10, '12', '3xsehari 1 tab setelah makan', 'obat jadi', 36, 5, '2018-07-28 18:38:39', '2018-08-02 18:38:39'),
(11, '13', '3xsehari 1 tab setelah makan', 'obat jadi', 109, 6, '2018-07-29 18:48:31', '2018-08-02 18:48:31'),
(12, '12', '3xsehari 1 tab setelah makan', 'obat jadi', 64, 6, '2018-07-29 18:49:26', '2018-08-02 18:49:26'),
(13, '6', '0-0-1 setelah makan', 'obat jadi', 97, 6, '2018-07-29 18:51:15', '2018-08-02 18:51:15'),
(14, '10', '3xsehari 1 tab setelah makan', 'obat jadi', 16, 7, '2018-07-30 18:59:25', '2018-08-02 18:59:25'),
(15, '6', '1x sehari 1 tablet setelah makan', 'obat jadi', 81, 7, '2018-07-30 19:00:11', '2018-08-02 19:00:11'),
(16, '10', '2 x sehari 1 tablet setelah makan', 'obat jadi', 21, 7, '2018-07-30 19:00:57', '2018-08-02 19:00:57'),
(17, '12', '3xsehari 1 tab setelah makan', 'obat racikan', 15, 8, '2018-07-31 19:06:09', '2018-08-02 19:06:09'),
(18, '13', '3xsehari 1 tab setelah makan', 'obat racikan', 8, 8, '2018-07-31 19:06:28', '2018-08-02 19:06:28'),
(19, '12', '3xsehari 1 tab setelah makan', 'obat racikan', 73, 8, '2018-07-31 19:06:51', '2018-08-02 19:06:51'),
(20, '13', '3xsehari 1 tab setelah makan', 'obat racikan', 91, 8, '2018-07-31 19:07:17', '2018-08-02 19:07:17'),
(21, '10', '2 x sehari 1 tablet setelah makan', 'obat jadi', 36, 9, '2018-08-01 19:14:47', '2018-08-02 19:14:47'),
(22, '10', '0-0-1 setelah makan', 'obat jadi', 109, 9, '2018-08-01 19:15:16', '2018-08-02 19:15:16'),
(23, '10', '3xsehari 1 tab setelah makan', 'obat jadi', 91, 10, '2018-07-28 19:22:13', '2018-08-02 19:22:13'),
(24, '10', '3xsehari 1 tab setelah makan', 'obat jadi', 36, 10, '2018-07-28 19:22:33', '2018-08-02 19:22:33'),
(25, '10', '3xsehari 1 tab setelah makan', 'obat jadi', 68, 10, '2018-07-28 19:23:01', '2018-08-02 19:23:01'),
(28, '1', '3xsehari 1 tab sebelum makan', 'obat jadi', 16, 12, '2018-07-29 19:34:06', '2018-08-02 19:34:06'),
(29, '15', '2 x sehari 1 tablet setelah makan', 'obat jadi', 68, 12, '2018-07-29 19:34:25', '2018-08-02 19:34:25'),
(30, '6', '2 x sehari 1 tablet setelah makan', 'obat racikan', 73, 13, '2018-07-30 19:42:33', '2018-08-02 19:42:33'),
(31, '10', '3xsehari 1 tab setelah makan', 'obat racikan', 7, 13, '2018-07-30 19:42:54', '2018-08-02 19:42:54'),
(32, '10', '2 x sehari 1 tablet sebelum makan', 'obat racikan', 81, 14, '2018-07-31 19:48:35', '2018-08-02 19:48:35'),
(33, '10', '3xsehari 1 tab sebelum makan', 'obat racikan', 100, 14, '2018-07-31 19:49:09', '2018-08-02 19:49:09'),
(34, '5', '0-0-1 sebelum makan', 'obat racikan', 114, 14, '2018-07-31 19:49:43', '2018-08-02 19:49:43'),
(35, '10', '3xsehari 1 tab setelah makan', 'obat jadi', 116, 15, '2018-07-31 22:38:34', '2018-08-02 22:38:34'),
(36, '5', '2 x sehari 1 tablet setelah makan', 'obat jadi', 110, 15, '2018-07-31 22:39:01', '2018-08-02 22:39:01'),
(37, '10', '3xsehari 1 tab setelah makan', 'obat jadi', 1, 16, '2018-08-01 22:42:32', '2018-08-02 22:42:32'),
(38, '10', '3xsehari 1 tab setelah makan', 'obat jadi', 41, 16, '2018-08-01 22:42:49', '2018-08-02 22:42:49'),
(39, '10', '3xsehari 1 tab setelah makan', 'obat jadi', 32, 17, '2018-08-04 06:38:04', '2018-08-04 06:38:04'),
(40, '10', '3xsehari 1 tab setelah makan', 'obat jadi', 1, 17, '2018-08-04 06:38:26', '2018-08-04 06:38:26'),
(41, '10', '3xsehari 1 tab setelah makan', 'obat jadi', 2, 18, '2018-08-07 00:20:49', '2018-08-07 00:20:49'),
(42, '5', '3xsehari 1 tab setelah makan', 'obat jadi', 32, 18, '2018-08-07 00:21:30', '2018-08-07 00:21:30'),
(43, '10', '3xsehari 1 tab setelah makan', 'obat jadi', 1, 19, '2018-08-08 01:18:51', '2018-08-08 01:18:51');

-- --------------------------------------------------------

--
-- Table structure for table `resep_racikan`
--

CREATE TABLE `resep_racikan` (
  `id_racikan` int(10) UNSIGNED NOT NULL,
  `jml_obat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan_obat` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aturan_pakai` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `urutan_racikan` int(11) NOT NULL,
  `id_obat` int(10) UNSIGNED NOT NULL,
  `id_rm` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rm_pemeriksaan`
--

CREATE TABLE `rm_pemeriksaan` (
  `id_rm` int(10) UNSIGNED NOT NULL,
  `keluhan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `diagnosa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_dokter` int(10) UNSIGNED NOT NULL,
  `id_pasien` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rm_pemeriksaan`
--

INSERT INTO `rm_pemeriksaan` (`id_rm`, `keluhan`, `diagnosa`, `id_dokter`, `id_pasien`, `created_at`, `updated_at`) VALUES
(1, 'batuk, panas, pilek', 'ISPA', 6, 8, '2018-07-27 03:15:41', '2018-08-02 03:15:41'),
(2, 'demam, batuk', 'ISPA', 2, 8, '2018-07-28 03:20:14', '2018-08-02 03:20:14'),
(3, 'batuk, pilek', 'flu', 2, 3, '2018-07-27 03:22:45', '2018-08-02 03:22:45'),
(4, 'nafas tersengal-sengal', 'asma', 6, 3, '2018-07-28 03:25:02', '2018-08-02 03:25:02'),
(5, 'Batuk, pilek, panas', 'ISPA akut + Faringitis', 2, 8, '2018-07-28 18:36:28', '2018-08-02 18:36:28'),
(6, 'pusing, nyeri tengkurat', 'chepalgit + myalgit', 6, 8, '2018-07-29 18:48:10', '2018-08-02 18:48:10'),
(7, 'nyeri di sendi-sendi dan tulang, mual-mual', 'persendian', 6, 8, '2018-07-30 18:59:07', '2018-08-02 18:59:07'),
(8, 'meriang, mual, gemetar, batuk, pilek', 'ISPA + Faringitis', 6, 8, '2018-07-31 19:05:40', '2018-08-02 19:05:40'),
(9, 'pusing, meriang', 'ceptialgia', 6, 8, '2018-08-01 19:13:57', '2018-08-02 19:13:57'),
(10, 'nyeri ulu hati, mual, muntah, punggung nyeri, pusing', 'linu , maag', 2, 3, '2018-07-28 19:21:28', '2018-08-02 19:21:28'),
(12, 'batuk, pilek, nyeri', 'ISPA', 6, 3, '2018-07-29 19:33:37', '2018-08-02 19:33:37'),
(13, 'batuk berdarah', 'batuk berdarah', 6, 3, '2018-07-30 19:41:57', '2018-08-02 19:41:57'),
(14, 'perut terasa perih, mual,', 'dysresia syndrom', 6, 3, '2018-07-31 19:47:49', '2018-08-02 19:47:49'),
(15, 'sesak nafas, tersengal-sengal', 'asma', 2, 4, '2018-07-31 22:38:01', '2018-08-02 22:38:01'),
(16, 'batuk, pilek, flu', 'ISPA', 6, 4, '2018-08-01 22:42:19', '2018-08-02 22:42:19'),
(17, 'batuk, flu, panas', 'ISPA', 6, 7, '2018-08-04 06:37:18', '2018-08-04 06:37:18'),
(18, 'panas, pusing, batuk, demam', 'gejala typus', 6, 5, '2018-08-07 00:20:27', '2018-08-07 00:20:27'),
(19, 'batuk', 'ispa', 6, 4, '2018-08-08 01:18:36', '2018-08-08 01:18:36');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin Login', 'Admin', '2018-07-09 06:17:11', '2018-07-09 06:17:11'),
(2, 'user_dokter', 'User Dokter Page', 'User Dokter', '2018-07-09 06:17:11', '2018-07-09 06:17:11'),
(3, 'user_pegawai', 'User Pegawai Page', 'User Pegawai', '2018-07-09 06:17:11', '2018-07-09 06:17:11');

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(3, 3),
(4, 2),
(5, 2),
(8, 2),
(9, 2),
(10, 2),
(11, 3);

-- --------------------------------------------------------

--
-- Table structure for table `status_antrian`
--

CREATE TABLE `status_antrian` (
  `id_status` int(10) UNSIGNED NOT NULL,
  `status_cek` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_antrian`
--

INSERT INTO `status_antrian` (`id_status`, `status_cek`, `created_at`, `updated_at`) VALUES
(1, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status_kirim_obat`
--

CREATE TABLE `status_kirim_obat` (
  `id_status_obat` int(11) UNSIGNED NOT NULL,
  `status_obat` varchar(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pasien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_kirim_obat`
--

INSERT INTO `status_kirim_obat` (`id_status_obat`, `status_obat`, `id_pasien`) VALUES
(1, '2', 4),
(2, '1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '$2y$10$gamOxYkBXksq7XeP3N8dc.x3faluvRGlRq1XrtT/fJg1NK2Fe4XRW', 'lDG7pd8Fte4X08x78SAOzjkZSILefAkb5dcvoBwdquZC9XBcruvx8PTiqwCH', '2018-07-09 06:17:12', '2018-07-09 06:17:12'),
(3, 'atikah', 'atikah', '$2y$10$kLt.ieKtpnxnJ0mypkDH5.ecDP9s/KI8xx4jnDbbsv42gI7BBUbY6', '6bLrzG5PyYURPU8c7OSlQ6wfuQ7zuSNgiyXkXYSldXeX7BfgwkRNR7lFdHiW', '2018-07-09 06:35:52', '2018-07-09 06:35:52'),
(4, 'zulfa', 'zulfa', '$2y$10$lZ3yw6hzVGSvG4bCpmnQFOnp7gg8sDL/n8C8pK/KkICYDcyd6la8y', 'X42G01uipQ3MhoajzwboGZQ0iOXgLdXChsoj90ea78ImHyBFTPSYcEPyLpFY', '2018-07-09 07:18:25', '2018-07-09 07:18:25'),
(5, 'aida', 'aida', '$2y$10$PV0jGkAlbAIEvemqULd5aupV.OZxrh.56Cg0feDw1aYD6T6mBvCvK', NULL, '2018-07-18 13:17:55', '2018-07-18 13:17:55'),
(6, 'dr. Sukma Sahadewa', 'sukma', '$2y$10$xVqYXRaOtzelQCUn1oljweM7Qkm2YMYjm/qDFiCINvMb2QL46GJI2', NULL, '2018-08-01 23:55:54', '2018-08-01 23:55:54'),
(7, 'dr. Sukma Sahadewa', 'sukma', '$2y$10$2tDbj52ottK72uCanDrGAulWcNOaUWXc.PvuZ5KXpguSCKFGEzzaW', NULL, '2018-08-01 23:56:26', '2018-08-01 23:56:26'),
(8, 'dr. Sukma Sahadewa', 'sukma', '$2y$10$xN3zup65Ute35Aw2VqSrueOqh6Qo19L6/U2UQcj5DNULyMcmMEpji', NULL, '2018-08-01 23:56:40', '2018-08-01 23:56:40'),
(9, 'dr. Arinda Rizkya Wakhida', 'arinda', '$2y$10$693Qzp95/.An1.aBDtc.Ue9qopz9FnsQufZbF99uyTyRMq6he155C', NULL, '2018-08-01 23:58:52', '2018-08-01 23:58:52'),
(10, 'dr. Fara Disa Durry', 'fara', '$2y$10$IumYnhV.0pg9xtJ5Wg0TZu5VrKQeoUN.2bMqGDNRylVQKnxeDFBce', NULL, '2018-08-02 00:01:20', '2018-08-02 00:01:20'),
(11, 'pegawai paradise', 'pegawai', '$2y$10$J4bKODTKSZ8O4Vht3XXOC.gybwGlT5cZ5PwTKSbVZmOrdD2B2O0RK', NULL, '2018-08-08 09:41:06', '2018-08-08 09:41:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antrian`
--
ALTER TABLE `antrian`
  ADD PRIMARY KEY (`id_antrian`),
  ADD KEY `antrian_id_pasien_foreign` (`id_pasien`),
  ADD KEY `antrian_id_poli_foreign` (`id_poli`),
  ADD KEY `antrian_id_jadwalklinik_foreign` (`id_jadwalklinik`);

--
-- Indexes for table `cekfisik`
--
ALTER TABLE `cekfisik`
  ADD PRIMARY KEY (`id_fisik`),
  ADD KEY `cekfisik_id_pasien_foreign` (`id_pasien`);

--
-- Indexes for table `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`),
  ADD UNIQUE KEY `dokter_sip_dokter_unique` (`sip_dokter`),
  ADD KEY `dokter_id_user_foreign` (`id_user`),
  ADD KEY `dokter_id_poli_foreign` (`id_poli`),
  ADD KEY `dokter_id_jadwal_foreign` (`id_jadwal`);

--
-- Indexes for table `jadwal_klinik`
--
ALTER TABLE `jadwal_klinik`
  ADD PRIMARY KEY (`id_jadwalklinik`);

--
-- Indexes for table `jadwal_praktek`
--
ALTER TABLE `jadwal_praktek`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `jenispemeriksaanlab`
--
ALTER TABLE `jenispemeriksaanlab`
  ADD PRIMARY KEY (`id_jeniskadar`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`),
  ADD UNIQUE KEY `pasien_no_kartu_unique` (`no_kartu`),
  ADD UNIQUE KEY `pasien_nik_unique` (`nik`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `pegawai_id_user_foreign` (`id_user`);

--
-- Indexes for table `pemeriksaanlab`
--
ALTER TABLE `pemeriksaanlab`
  ADD PRIMARY KEY (`id_ceklab`),
  ADD KEY `pemeriksaanlab_id_jeniskadar_foreign` (`id_jeniskadar`),
  ADD KEY `pemeriksaanlab_id_pasien_foreign` (`id_pasien`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `poli`
--
ALTER TABLE `poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD PRIMARY KEY (`id_resep_obat`),
  ADD KEY `resep_obat_id_obat_foreign` (`id_obat`),
  ADD KEY `resep_obat_id_rm_foreign` (`id_rm`);

--
-- Indexes for table `resep_racikan`
--
ALTER TABLE `resep_racikan`
  ADD PRIMARY KEY (`id_racikan`),
  ADD KEY `resep_racikan_id_obat_foreign` (`id_obat`),
  ADD KEY `resep_racikan_id_rm_foreign` (`id_rm`);

--
-- Indexes for table `rm_pemeriksaan`
--
ALTER TABLE `rm_pemeriksaan`
  ADD PRIMARY KEY (`id_rm`),
  ADD KEY `rm_pemeriksaan_id_dokter_foreign` (`id_dokter`),
  ADD KEY `rm_pemeriksaan_id_pasien_foreign` (`id_pasien`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indexes for table `status_antrian`
--
ALTER TABLE `status_antrian`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `status_kirim_obat`
--
ALTER TABLE `status_kirim_obat`
  ADD PRIMARY KEY (`id_status_obat`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antrian`
--
ALTER TABLE `antrian`
  MODIFY `id_antrian` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cekfisik`
--
ALTER TABLE `cekfisik`
  MODIFY `id_fisik` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `dokter`
--
ALTER TABLE `dokter`
  MODIFY `id_dokter` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `jadwal_klinik`
--
ALTER TABLE `jadwal_klinik`
  MODIFY `id_jadwalklinik` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `jadwal_praktek`
--
ALTER TABLE `jadwal_praktek`
  MODIFY `id_jadwal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `jenispemeriksaanlab`
--
ALTER TABLE `jenispemeriksaanlab`
  MODIFY `id_jeniskadar` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `id_pasien` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pemeriksaanlab`
--
ALTER TABLE `pemeriksaanlab`
  MODIFY `id_ceklab` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `poli`
--
ALTER TABLE `poli`
  MODIFY `id_poli` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `resep_obat`
--
ALTER TABLE `resep_obat`
  MODIFY `id_resep_obat` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `resep_racikan`
--
ALTER TABLE `resep_racikan`
  MODIFY `id_racikan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rm_pemeriksaan`
--
ALTER TABLE `rm_pemeriksaan`
  MODIFY `id_rm` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `status_antrian`
--
ALTER TABLE `status_antrian`
  MODIFY `id_status` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `status_kirim_obat`
--
ALTER TABLE `status_kirim_obat`
  MODIFY `id_status_obat` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `antrian`
--
ALTER TABLE `antrian`
  ADD CONSTRAINT `antrian_id_jadwalklinik_foreign` FOREIGN KEY (`id_jadwalklinik`) REFERENCES `jadwal_klinik` (`id_jadwalklinik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `antrian_id_pasien_foreign` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `antrian_id_poli_foreign` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id_poli`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cekfisik`
--
ALTER TABLE `cekfisik`
  ADD CONSTRAINT `cekfisik_id_pasien_foreign` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `dokter`
--
ALTER TABLE `dokter`
  ADD CONSTRAINT `dokter_id_jadwal_foreign` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_praktek` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dokter_id_poli_foreign` FOREIGN KEY (`id_poli`) REFERENCES `poli` (`id_poli`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dokter_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemeriksaanlab`
--
ALTER TABLE `pemeriksaanlab`
  ADD CONSTRAINT `pemeriksaanlab_id_jeniskadar_foreign` FOREIGN KEY (`id_jeniskadar`) REFERENCES `jenispemeriksaanlab` (`id_jeniskadar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemeriksaanlab_id_pasien_foreign` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD CONSTRAINT `resep_obat_id_obat_foreign` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resep_obat_id_rm_foreign` FOREIGN KEY (`id_rm`) REFERENCES `rm_pemeriksaan` (`id_rm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `resep_racikan`
--
ALTER TABLE `resep_racikan`
  ADD CONSTRAINT `resep_racikan_id_obat_foreign` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resep_racikan_id_rm_foreign` FOREIGN KEY (`id_rm`) REFERENCES `rm_pemeriksaan` (`id_rm`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `rm_pemeriksaan`
--
ALTER TABLE `rm_pemeriksaan`
  ADD CONSTRAINT `rm_pemeriksaan_id_dokter_foreign` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `rm_pemeriksaan_id_pasien_foreign` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
