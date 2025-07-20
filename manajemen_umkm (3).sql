-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2025 at 05:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manajemen_umkm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(100) DEFAULT NULL,
  `terdaftar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id`, `nama_kategori`, `terdaftar`) VALUES
(1, 'Minuman', '2025-06-28 15:33:55'),
(2, 'Makanan', '2025-06-28 15:40:48'),
(3, 'Kerajinan', '2025-06-28 15:41:00'),
(5, 'Jasa', '2025-06-28 15:51:47'),
(8, 'otomotif', '2025-07-01 06:13:39'),
(9, 'snack', '2025-07-12 10:56:51'),
(10, 'fashion', '2025-07-13 06:06:15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `dibuat` timestamp NOT NULL DEFAULT current_timestamp(),
  `terdaftar` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_log`
--

CREATE TABLE `tb_log` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `ipAddress` varchar(45) DEFAULT NULL,
  `device` text DEFAULT NULL,
  `terdaftar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_log`
--

INSERT INTO `tb_log` (`id`, `id_user`, `status`, `ipAddress`, `device`, `terdaftar`) VALUES
(1, NULL, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-28 13:30:58'),
(2, NULL, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-28 13:38:41'),
(3, NULL, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-28 13:38:54'),
(4, NULL, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-28 13:53:52'),
(5, NULL, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-28 13:54:00'),
(6, NULL, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-28 13:54:11'),
(7, NULL, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-28 13:54:20'),
(8, NULL, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', '2025-06-28 13:55:09'),
(9, NULL, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-28 14:02:23'),
(10, NULL, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-28 14:02:32'),
(11, NULL, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', '2025-06-28 14:03:24'),
(12, NULL, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-28 14:03:35'),
(13, NULL, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-28 14:03:42'),
(14, NULL, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-28 14:22:47'),
(15, NULL, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-28 14:22:55'),
(16, NULL, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', '2025-06-28 14:23:35'),
(17, NULL, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', '2025-06-28 14:27:51'),
(18, NULL, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', '2025-06-28 14:27:58'),
(19, NULL, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-28 18:13:08'),
(20, NULL, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', '2025-06-28 18:46:52'),
(21, NULL, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-28 18:47:01'),
(22, NULL, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-28 18:47:07'),
(23, NULL, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-28 22:36:59'),
(24, NULL, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-28 22:37:08'),
(25, NULL, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-28 22:43:50'),
(26, NULL, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-28 22:44:08'),
(27, NULL, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', '2025-06-28 22:52:07'),
(28, NULL, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-28 23:00:05'),
(29, NULL, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-28 23:00:24'),
(30, NULL, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-29 07:00:36'),
(31, NULL, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', '2025-06-29 07:27:21'),
(32, NULL, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', '2025-06-29 18:25:43'),
(33, NULL, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-29 18:26:06'),
(34, NULL, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-29 19:02:23'),
(35, 17, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-29 19:03:11'),
(36, 17, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-29 19:03:23'),
(37, 12, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-29 19:03:30'),
(38, 12, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-29 19:03:40'),
(39, 17, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-29 19:03:48'),
(40, 17, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-29 19:04:20'),
(41, 17, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-29 19:04:31'),
(42, 17, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-29 19:12:55'),
(43, 17, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-29 19:13:03'),
(44, NULL, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', '2025-06-29 19:16:11'),
(45, 12, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', '2025-06-29 19:16:19'),
(46, 17, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-29 20:44:07'),
(47, 17, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-29 20:44:16'),
(48, 1, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', '2025-07-01 08:50:45'),
(49, 1, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', '2025-07-01 10:30:05'),
(50, 1, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', '2025-07-01 11:10:47'),
(51, 17, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', '2025-07-01 11:10:57'),
(52, 1, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-07-01 11:12:54'),
(55, 1, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-12 15:56:29'),
(56, 1, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-12 15:56:37'),
(57, 1, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-12 16:15:55'),
(58, 17, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-12 16:16:05'),
(59, 17, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 07:40:31'),
(60, 17, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 08:35:04'),
(61, 1, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 08:35:11'),
(62, 1, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 08:35:33'),
(63, 17, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 08:35:41'),
(64, 17, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 08:43:44'),
(65, 1, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 08:43:55'),
(66, 1, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 08:45:22'),
(67, 17, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 08:45:29'),
(68, 17, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 09:37:01'),
(69, 1, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 09:37:08'),
(70, 1, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 09:44:36'),
(71, 17, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 09:44:46'),
(72, 17, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 09:45:37'),
(73, 1, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 09:46:07'),
(74, 1, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 09:58:18'),
(75, 17, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 09:58:25'),
(76, 17, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 09:59:11'),
(77, 1, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 09:59:19'),
(78, 1, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 09:59:57'),
(79, 17, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 10:00:04'),
(80, 17, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 10:03:24'),
(81, 1, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 10:03:32'),
(82, 1, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 10:18:54'),
(83, 19, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 10:19:04'),
(84, 19, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 10:19:51'),
(85, 1, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 10:19:58'),
(86, 1, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 10:20:30'),
(87, 19, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 10:20:37'),
(88, 19, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 10:20:42'),
(89, 1, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 10:20:55'),
(90, 1, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 10:23:07'),
(91, 1, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 10:25:14'),
(92, 1, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 10:26:23'),
(93, 1, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 10:30:51'),
(94, 1, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 10:57:57'),
(95, 17, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 10:58:05'),
(96, 17, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 10:58:08'),
(97, 1, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 10:58:15'),
(98, 1, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 10:58:33'),
(99, 1, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 10:58:44'),
(100, 1, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 11:43:29'),
(101, 1, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 11:43:37'),
(102, 1, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 12:26:19'),
(103, 17, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 12:26:27'),
(104, 17, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 13:05:52'),
(105, 1, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 13:06:00'),
(106, 1, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36 Edg/138.0.0.0', '2025-07-13 13:25:11'),
(107, 1, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 13:29:32'),
(108, 17, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 13:29:40'),
(109, 1, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 13:56:13'),
(110, 1, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 14:04:47'),
(111, 17, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 14:04:59'),
(112, 17, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 14:07:46'),
(113, 1, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 14:07:54'),
(114, 1, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 14:13:08'),
(115, 17, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-13 14:13:16'),
(116, 1, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-20 10:10:41'),
(117, 1, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-20 10:11:15'),
(118, 17, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-20 10:11:27'),
(119, 17, 'Logout', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-20 10:38:47'),
(120, 1, 'Login', '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/138.0.0.0 Safari/537.36', '2025-07-20 10:39:06');

-- --------------------------------------------------------

--
-- Table structure for table `tb_log_produk`
--

CREATE TABLE `tb_log_produk` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `aksi` enum('Tambah','Update','Hapus') DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `waktu` datetime DEFAULT current_timestamp(),
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_notifikasi`
--

CREATE TABLE `tb_notifikasi` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `pesan` text DEFAULT NULL,
  `dibaca` enum('Ya','Tidak') DEFAULT 'Tidak',
  `dibuat` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_notifikasi`
--

INSERT INTO `tb_notifikasi` (`id`, `id_user`, `judul`, `pesan`, `dibaca`, `dibuat`) VALUES
(1, 17, 'Status Pesanan Anda Diperbarui', 'Pesanan Anda sekarang berstatus <b>Dikirim</b>.', 'Ya', '2025-07-13 04:44:31'),
(2, 17, 'Status Pesanan Anda Diperbarui', 'Pesanan Anda sekarang berstatus <b>Selesai</b>.', 'Ya', '2025-07-13 04:58:15'),
(3, 17, 'Status Pesanan Anda Diperbarui', 'Pesanan Anda sekarang berstatus <b>Selesai</b>.', 'Ya', '2025-07-13 04:59:27'),
(4, 17, 'Status Pesanan Anda Diperbarui', 'Pesanan Anda sekarang berstatus <b>Selesai</b>.', 'Ya', '2025-07-13 04:59:32'),
(5, 17, 'Status Pesanan Anda Diperbarui', 'Pesanan Anda sekarang berstatus <b>Selesai</b>.', 'Ya', '2025-07-13 04:59:35'),
(6, 17, 'Status Pesanan Anda Diperbarui', 'Pesanan Anda sekarang berstatus <b>Selesai</b>.', 'Ya', '2025-07-13 04:59:39'),
(7, 17, 'Status Pesanan Anda Diperbarui', 'Pesanan Anda sekarang berstatus <b>Selesai</b>.', 'Ya', '2025-07-13 04:59:42'),
(8, 17, 'Status Pesanan Anda Diperbarui', 'Pesanan Anda sekarang berstatus <b>Selesai</b>.', 'Ya', '2025-07-13 04:59:45'),
(9, 17, 'Status Pesanan Anda Diperbarui', 'Pesanan Anda sekarang berstatus <b>Selesai</b>.', 'Ya', '2025-07-13 04:59:48'),
(10, 17, 'Status Pesanan Anda Diperbarui', 'Pesanan Anda sekarang berstatus <b>Selesai</b>.', 'Ya', '2025-07-13 04:59:51'),
(11, 17, 'Status Pesanan Anda Diperbarui', 'Pesanan Anda sekarang berstatus <b>Selesai</b>.', 'Ya', '2025-07-13 04:59:54'),
(12, 19, 'Status Pesanan Anda Diperbarui', 'Pesanan Anda sekarang berstatus <b>Dikirim</b>.', 'Ya', '2025-07-13 05:20:24'),
(13, 19, 'Status Pesanan Anda Diperbarui', 'Pesanan Anda sekarang berstatus <b>Selesai</b>.', 'Ya', '2025-07-13 05:20:27'),
(14, 17, 'Status Pesanan Anda Diperbarui', 'Pesanan Anda sekarang berstatus <b>Selesai</b>.', 'Ya', '2025-07-13 05:58:58'),
(15, 17, 'Status Pesanan Anda Diperbarui', 'Pesanan Anda sekarang berstatus <b>Selesai</b>.', '', '2025-07-20 05:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `total_item` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `status` enum('Dipesan','Diproses','Dikirim','Selesai') DEFAULT 'Dipesan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`id`, `id_user`, `total_item`, `created_at`, `status`) VALUES
(1, 17, 3, '2025-06-29 20:23:29', 'Selesai'),
(2, 17, 1, '2025-06-29 20:32:25', 'Selesai'),
(3, 17, 1, '2025-06-29 20:39:45', 'Selesai'),
(4, 17, 1, '2025-06-29 20:53:44', 'Selesai'),
(5, 17, 1, '2025-06-29 21:03:26', 'Selesai'),
(6, 17, 3, '2025-07-01 11:12:12', 'Selesai'),
(7, 17, 1, '2025-07-13 08:11:07', 'Selesai'),
(8, 17, 4, '2025-07-13 08:43:30', 'Selesai'),
(9, 17, 1, '2025-07-13 08:47:31', 'Selesai'),
(10, 17, 15, '2025-07-13 09:14:53', 'Selesai'),
(11, 17, 10, '2025-07-13 09:36:58', 'Selesai'),
(12, 19, 1005, '2025-07-13 10:19:44', 'Selesai'),
(13, 17, 5, '2025-07-20 10:38:03', 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tb_order_detail`
--

CREATE TABLE `tb_order_detail` (
  `id` int(11) NOT NULL,
  `id_order` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_order_detail`
--

INSERT INTO `tb_order_detail` (`id`, `id_order`, `id_produk`, `jumlah`, `created_at`) VALUES
(1, 1, 1, 1, '2025-06-29 20:23:29'),
(2, 1, 8, 1, '2025-06-29 20:23:29'),
(3, 1, 7, 1, '2025-06-29 20:23:29'),
(4, 2, 3, 1, '2025-06-29 20:32:25'),
(5, 3, 7, 1, '2025-06-29 20:39:45'),
(6, 4, 1, 1, '2025-06-29 20:53:44'),
(7, 5, 8, 1, '2025-06-29 21:03:26'),
(8, 6, 1, 3, '2025-07-01 11:12:12'),
(9, 7, 1, 1, '2025-07-13 08:11:07'),
(10, 8, 1, 1, '2025-07-13 08:43:30'),
(11, 8, 3, 1, '2025-07-13 08:43:30'),
(12, 8, 7, 2, '2025-07-13 08:43:30'),
(13, 9, 1, 1, '2025-07-13 08:47:31'),
(14, 10, 3, 4, '2025-07-13 09:14:53'),
(15, 10, 7, 3, '2025-07-13 09:14:53'),
(16, 10, 8, 4, '2025-07-13 09:14:53'),
(17, 10, 9, 4, '2025-07-13 09:14:53'),
(18, 11, 1, 1, '2025-07-13 09:36:58'),
(19, 11, 1, 3, '2025-07-13 09:36:58'),
(20, 11, 3, 4, '2025-07-13 09:36:58'),
(21, 11, 7, 2, '2025-07-13 09:36:58'),
(22, 12, 9, 1000, '2025-07-13 10:19:44'),
(23, 12, 8, 2, '2025-07-13 10:19:44'),
(24, 12, 7, 1, '2025-07-13 10:19:44'),
(25, 12, 3, 1, '2025-07-13 10:19:44'),
(26, 12, 1, 1, '2025-07-13 10:19:44'),
(27, 13, 1, 5, '2025-07-20 10:38:03');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan_detail`
--

CREATE TABLE `tb_pesanan_detail` (
  `id` int(11) NOT NULL,
  `id_pesanan` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `stok` int(11) DEFAULT 0,
  `id_user` int(11) DEFAULT NULL,
  `terdaftar` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id`, `nama_produk`, `deskripsi`, `foto`, `harga`, `stok`, `id_user`, `terdaftar`) VALUES
(1, 'Sari Salak Pondoh', 'minuman khas srumbung', '1751120705-Screenshot_2025-06-28_211331.png', 15000, 45, NULL, NULL),
(3, 'Kripik Salak', 'Makanan khas Srumbung', '1751124234-Gambar_WhatsApp_2025-05-28_pukul_13_28_00_a7d9d3c3.jpg', 10000, 10, NULL, NULL),
(7, 'fortisvisuals', 'Prewedding & Wedding Magelang\r\nFotografi & Videografi\r\n\" Capturing your love story, one frame at a time. ”\r\n????Based On Magelang\r\nPrewedding | Wedding | Engagement | Wisuda\r\nwa.me/+6285641260586', '1751157120-Screenshot_2025-06-29_073138.png', 100000, 2, NULL, NULL),
(8, 'soul.shoescare', 'CUCI SEPATU MAGELANG\r\nHome-based shoes • cap • bag cleaning\r\nClean — Detailed — Trusted\r\nHandled by @gustianndwi\r\n↓ Mulai langkah bersihmu sekarang\r\nlynk.id/soul.shoescare', '1751159715-biru_simpel_update_pricelist.png', 20000, 0, NULL, NULL),
(9, 'baut', 'baut apik', '1751343259-view-building-with-cartoon-style-architecture_(1).jpg', 500, 5, NULL, NULL),
(10, 'Ukiran Candi', 'ukiran candi dengan bambu', '1752376954-Screenshot_2025-05-27_134927.png', 25000, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk_kategori`
--

CREATE TABLE `tb_produk_kategori` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_produk_kategori`
--

INSERT INTO `tb_produk_kategori` (`id`, `id_produk`, `id_kategori`) VALUES
(7, 1, 1),
(11, 3, 2),
(17, 7, 5),
(18, 8, 5),
(21, 9, 8),
(20, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_review`
--

CREATE TABLE `tb_review` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` >= 1 and `rating` <= 5),
  `komentar` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_review`
--

INSERT INTO `tb_review` (`id`, `id_user`, `id_produk`, `rating`, `komentar`, `created_at`) VALUES
(1, 17, 1, 5, 'sangat baik', '2025-07-13 03:29:56'),
(2, 17, 3, 5, 'sip', '2025-07-13 04:15:18'),
(3, 17, 7, 4, 'sip', '2025-07-13 04:15:33'),
(4, 17, 8, 4, 'naissss', '2025-07-13 04:15:45'),
(5, 17, 9, 1, 'kurang', '2025-07-13 04:16:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_statistik_penjualan`
--

CREATE TABLE `tb_statistik_penjualan` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `total_terjual` int(11) DEFAULT 0,
  `total_pendapatan` int(11) DEFAULT 0,
  `bulan` int(11) DEFAULT NULL,
  `tahun` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `level` enum('Admin','User') DEFAULT NULL,
  `login` enum('Ya','Tidak') DEFAULT NULL,
  `terdaftar` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `email`, `username`, `password`, `level`, `login`, `terdaftar`) VALUES
(1, 'Admin UMKM', 'admin@umkm.com', 'admin', '0192023a7bbd73250516f069df18b500', 'Admin', 'Ya', '2025-06-28 13:03:46'),
(12, 'Septian Angga Dwi Cahyo', 'septianangga2004@gmail.com', 'septian', 'eaec8de3a25ffaad45461d875060005f', 'Admin', 'Ya', '2025-06-28 23:00:42'),
(13, 'Ahmad Khaniful Huda', 'hanif1976@gmail.com', 'hanif', 'da40526f219afb8a602e12c727aed58d', 'Admin', 'Ya', '2025-06-28 23:01:46'),
(14, 'adam fattah putra budianto', 'adam1919@gmail.com', 'adam', '3e7b522b9756d2578d3a86d8f366be6e', 'Admin', 'Ya', '2025-06-28 23:02:20'),
(15, 'Slamet Rifaudin', 'rifa@gmail.com', 'rifa', 'a59b7bcf86103e937aa159126bb55648', 'Admin', 'Ya', '2025-06-28 23:02:59'),
(16, 'sandy bintang firmansyah', 'sandy@gmail.com', 'sandy', 'ba853c550a1687d3cc912aef79f857c3', 'Admin', 'Ya', '2025-06-28 23:03:32'),
(17, 'User UMKM', 'userumkm@umkm.com', 'user', '6ad14ba9986e3615423dfca256d04e3f', 'User', 'Ya', '2025-06-29 19:02:58'),
(19, 'Slamet Rifaudins', 'rifaudin28@gmail.com', 'udin', '3af4c9341e31bce1f4262a326285170d', 'User', 'Ya', '2025-07-13 10:18:51');

-- --------------------------------------------------------

--
-- Table structure for table `tb_wishlist`
--

CREATE TABLE `tb_wishlist` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `tanggal_ditambahkan` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_wishlist`
--

INSERT INTO `tb_wishlist` (`id`, `id_user`, `id_produk`, `tanggal_ditambahkan`) VALUES
(2, 17, 3, '2025-07-13 03:03:05'),
(3, 17, 7, '2025-07-13 03:03:06'),
(4, 17, 8, '2025-07-13 03:03:18'),
(5, 17, 9, '2025-07-13 03:03:19'),
(6, 17, 1, '2025-07-13 03:13:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_log`
--
ALTER TABLE `tb_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_log_produk`
--
ALTER TABLE `tb_log_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_notifikasi`
--
ALTER TABLE `tb_notifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_order_detail`
--
ALTER TABLE `tb_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pesanan_detail`
--
ALTER TABLE `tb_pesanan_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `tb_produk_kategori`
--
ALTER TABLE `tb_produk_kategori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_produk` (`id_produk`,`id_kategori`),
  ADD UNIQUE KEY `id_produk_2` (`id_produk`,`id_kategori`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `tb_review`
--
ALTER TABLE `tb_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tb_statistik_penjualan`
--
ALTER TABLE `tb_statistik_penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tb_wishlist`
--
ALTER TABLE `tb_wishlist`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_wishlist` (`id_user`,`id_produk`),
  ADD KEY `id_produk` (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_log`
--
ALTER TABLE `tb_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `tb_log_produk`
--
ALTER TABLE `tb_log_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_notifikasi`
--
ALTER TABLE `tb_notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_order_detail`
--
ALTER TABLE `tb_order_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_pesanan_detail`
--
ALTER TABLE `tb_pesanan_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_produk_kategori`
--
ALTER TABLE `tb_produk_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_review`
--
ALTER TABLE `tb_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_statistik_penjualan`
--
ALTER TABLE `tb_statistik_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_wishlist`
--
ALTER TABLE `tb_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_log`
--
ALTER TABLE `tb_log`
  ADD CONSTRAINT `tb_log_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`);

--
-- Constraints for table `tb_log_produk`
--
ALTER TABLE `tb_log_produk`
  ADD CONSTRAINT `tb_log_produk_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id`),
  ADD CONSTRAINT `tb_log_produk_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`);

--
-- Constraints for table `tb_notifikasi`
--
ALTER TABLE `tb_notifikasi`
  ADD CONSTRAINT `tb_notifikasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`);

--
-- Constraints for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD CONSTRAINT `tb_produk_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`);

--
-- Constraints for table `tb_produk_kategori`
--
ALTER TABLE `tb_produk_kategori`
  ADD CONSTRAINT `tb_produk_kategori_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id`),
  ADD CONSTRAINT `tb_produk_kategori_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategori` (`id`);

--
-- Constraints for table `tb_review`
--
ALTER TABLE `tb_review`
  ADD CONSTRAINT `tb_review_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`),
  ADD CONSTRAINT `tb_review_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id`);

--
-- Constraints for table `tb_statistik_penjualan`
--
ALTER TABLE `tb_statistik_penjualan`
  ADD CONSTRAINT `tb_statistik_penjualan_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id`);

--
-- Constraints for table `tb_wishlist`
--
ALTER TABLE `tb_wishlist`
  ADD CONSTRAINT `tb_wishlist_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id`),
  ADD CONSTRAINT `tb_wishlist_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `tb_produk` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
