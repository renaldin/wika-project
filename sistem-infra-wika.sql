-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 12, 2024 at 03:12 PM
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
-- Database: `sistem-infra-wika`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievement`
--

CREATE TABLE `achievement` (
  `id_achievement` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `sub_judul` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `tanggal_input` timestamp NULL DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `id_activity` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `tanggal_input` timestamp NULL DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id_activity`, `judul`, `deskripsi`, `gambar`, `tanggal_input`, `id_user`, `is_active`) VALUES
(1, 'Dialog Infra 2', '<p>Dialog Infra 2 (Disdusi Asik dan Logis)&nbsp;merupakan Podcast Media AKHLAK&nbsp;Infrastructure 2 Division&nbsp;</p>', '01042024074407.png', '2023-12-02 23:23:16', 1, 1),
(3, 'Kolaborasi KI/KM', '<p>Kolaborasi menciptakan Karya Inovasi dan Knowledge Management Tim Project dan Head Office untuk meningkatkan keharmonisan dan kerjasama di lingkungan Infrastructure 2 Division.&nbsp;</p>', '01042024065658.jpg', '2023-12-02 23:25:17', 1, 1),
(4, 'Klinik QHSE', '<p>Klinik QHSE Infrastructure 2 Division&nbsp;memberikan support dan pendampingan kepada Tim Project&nbsp;dalam mengimplementasikan pekerjaan di lapangan sesuai dengan Sistem Manajemen&nbsp;WIKA.</p>', '01042024083201.jpg', '2023-12-02 23:25:10', 1, 1),
(5, 'Pendampingan Implementasi BIM', '<p>Infrastructure 2 Division memberi support penuh Engineering Project untuk meningkatkan kompetensi melalui Pendampingan BIM.&nbsp;</p>', '01042024070747.jpg', '2023-12-02 23:25:03', 1, 1),
(8, 'Safety Patrol', '<p>Safety Patrol Infrastructure 2 Division merupakan suatu program yang dihadiri oleh Manajemen untuk melakukan Inspeksi pekerjaan di Proyek dalam rangka memastikan kualitas implementasi semua aspek di Proyek berjalan dengan baik dan memberikan feedback agar Proyek menjadi lebih baik.</p>', '01042024065013.jpg', '2023-12-03 18:28:39', 1, 1),
(10, 'Project Technical Supporting', '<p>Pencapaian Project Technical Supporting Infrastructure 2 Division yang dikerjakan&nbsp;pada tahun 2023 terhitung lebih dari 50 Laporan.</p>', '01042024070917.jpg', '2023-12-18 19:56:35', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `agendas`
--

CREATE TABLE `agendas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kegiatan` varchar(255) DEFAULT NULL,
  `tanggal_kegiatan` datetime DEFAULT NULL,
  `catatan_agenda` text DEFAULT NULL,
  `status_agenda` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status_task` varchar(255) DEFAULT NULL,
  `link` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agendas`
--

INSERT INTO `agendas` (`id`, `nama_kegiatan`, `tanggal_kegiatan`, `catatan_agenda`, `status_agenda`, `created_by`, `created_at`, `updated_at`, `status_task`, `link`) VALUES
(3, 'Kegiatan 2', '2024-03-21 14:44:00', 'Catatan 2', 'Reschedule', 63, '2024-03-10 00:44:19', '2024-03-30 21:30:54', 'Kegiatan', 'Link'),
(4, 'Kegiatan 3', '2024-03-22 14:44:00', 'Catatan 3', 'Cancel', 63, '2024-03-10 00:44:42', '2024-03-30 15:15:54', 'Kegiatan', NULL),
(12, 'Event 11', '2024-04-27 17:14:00', 'Cataan', 'Closed', 63, '2024-03-30 21:09:03', '2024-03-30 21:09:03', 'Kegiatan', NULL),
(13, 'Event 12', '2024-04-06 15:35:00', 'Cattan', 'Reschedule', 63, '2024-03-30 21:31:32', '2024-03-30 21:31:32', 'Kegiatan', 'Link'),
(14, 'Judul 1', '2024-04-23 18:30:00', 'Instruksi', 'Belum', 61, '2024-04-12 00:36:01', '2024-04-12 05:24:32', 'Task', NULL),
(15, 'Judul 2', '2024-04-23 18:30:00', 'Instruksi', 'Belum', 61, '2024-04-12 04:30:14', '2024-04-12 04:30:14', 'Task', NULL),
(16, 'Judul 3', '2024-04-30 18:32:00', 'Instruksi', 'Belum', 61, '2024-04-12 04:33:02', '2024-04-12 04:33:02', 'Task', NULL),
(17, 'Judul 4', '2024-04-30 18:34:00', 'Link', 'Belum', 61, '2024-04-12 04:34:21', '2024-04-12 06:11:25', 'Task', NULL),
(18, 'Judul 5', '2024-04-30 18:35:00', 'Instrksui', 'Belum', 61, '2024-04-12 04:35:31', '2024-04-12 04:35:31', 'Task', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `agenda_tasks`
--

CREATE TABLE `agenda_tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_task_pcp` bigint(20) UNSIGNED DEFAULT NULL,
  `id_agenda` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `agenda_tasks`
--

INSERT INTO `agenda_tasks` (`id`, `id_task_pcp`, `id_agenda`, `created_at`, `updated_at`) VALUES
(4, 9, 14, '2024-04-12 00:36:01', '2024-04-12 00:36:01'),
(5, 10, 15, '2024-04-12 04:30:14', '2024-04-12 04:30:14'),
(6, 11, 16, '2024-04-12 04:33:02', '2024-04-12 04:33:02'),
(7, 12, 17, '2024-04-12 04:34:21', '2024-04-12 04:34:21'),
(8, 13, 18, '2024-04-12 04:35:31', '2024-04-12 04:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `aspek_csi`
--

CREATE TABLE `aspek_csi` (
  `id_aspek_csi` int(11) NOT NULL,
  `aspek` varchar(255) DEFAULT NULL,
  `parameter` varchar(255) DEFAULT NULL,
  `bobot` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aspek_csi`
--

INSERT INTO `aspek_csi` (`id_aspek_csi`, `aspek`, `parameter`, `bobot`) VALUES
(1, 'Kesesuaian biaya konsultan dengan scope pekerjaan', 'BIAYA', 15),
(2, 'Nilai efisiensi proyek dari hasil pekerjaan konsultan', 'BIAYA', 15),
(3, 'Kesesuaian dokumen laporan engineering dan peraturan yang berlaku (code)', 'MUTU', 15),
(4, 'Kesesuaian antara dokumen laporan engineering dengan gambar', 'MUTU', 8),
(5, 'Sistematika penyajian dokumen laporan engineering', 'MUTU', 7),
(6, 'Ketepatan waktu penyelesaian dokumen laporan engineering', 'WAKTU', 30),
(7, 'Keaktifan dan Responsifitas terhadap masalah lapangan', 'PELAYANAN', 5),
(8, 'Pertanggung-jawaban hasil pekerjaan engineering ke owner', 'PELAYANAN', 5);

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id_carousel` int(11) NOT NULL,
  `item` text NOT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `id_user` int(11) NOT NULL,
  `tanggal_input` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id_carousel`, `item`, `is_active`, `id_user`, `tanggal_input`) VALUES
(4, '01212024045433.jpg', 1, 41, '2024-01-21 04:54:33'),
(5, '01242024044844.mp4', 1, 41, '2024-01-23 21:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id_chat` int(11) NOT NULL,
  `id_user_satu` int(11) NOT NULL,
  `id_user_dua` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id_chat`, `id_user_satu`, `id_user_dua`, `created_at`, `updated_at`) VALUES
(5, 60, 58, '2024-02-11 04:30:51', '2024-02-11 13:46:25'),
(7, 60, 23, '2024-02-11 14:12:44', '2024-02-11 14:12:54');

-- --------------------------------------------------------

--
-- Table structure for table `csi`
--

CREATE TABLE `csi` (
  `id_csi` int(11) NOT NULL,
  `id_proyek` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `periode` varchar(255) DEFAULT NULL,
  `pendapat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `csi`
--

INSERT INTO `csi` (`id_csi`, `id_proyek`, `id_user`, `periode`, `pendapat`) VALUES
(3, 3, 54, '2023-11', 'Pendapat ku 1'),
(4, 3, 54, '2023-01', 'Masukkan / Pendapat'),
(5, 3, 54, '2023-02', 'Masukkan / Pendapat'),
(6, 0, 0, 'periode', 'pendapat');

-- --------------------------------------------------------

--
-- Table structure for table `detail_achievement`
--

CREATE TABLE `detail_achievement` (
  `id_detail_achievement` int(11) NOT NULL,
  `id_achievement` int(11) DEFAULT NULL,
  `poin` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_chat`
--

CREATE TABLE `detail_chat` (
  `id_detail_chat` int(11) NOT NULL,
  `id_chat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `message` text DEFAULT NULL,
  `file` text DEFAULT NULL,
  `is_read` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_chat`
--

INSERT INTO `detail_chat` (`id_detail_chat`, `id_chat`, `id_user`, `message`, `file`, `is_read`, `created_at`, `updated_at`) VALUES
(1, 5, 60, 'Pesan 1', NULL, 0, '2024-02-11 13:24:11', '2024-02-11 13:24:11'),
(2, 5, 60, 'Pesan 1', NULL, 0, '2024-02-10 13:27:03', '2024-02-10 13:27:03'),
(4, 5, 60, 'Pesan 2', NULL, 0, '2024-02-11 13:41:16', '2024-02-11 13:41:16'),
(5, 5, 58, 'Bales Pesan 2', NULL, 0, '2024-02-11 13:46:25', '2024-02-11 13:46:25'),
(6, 7, 60, 'Pesan 1', NULL, 0, '2024-02-11 14:12:54', '2024-02-11 14:12:54');

-- --------------------------------------------------------

--
-- Table structure for table `detail_csi`
--

CREATE TABLE `detail_csi` (
  `id_detail_csi` int(11) NOT NULL,
  `id_csi` int(11) DEFAULT NULL,
  `id_aspek_csi` int(11) DEFAULT NULL,
  `penilaian` varchar(255) DEFAULT NULL,
  `nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_csi`
--

INSERT INTO `detail_csi` (`id_detail_csi`, `id_csi`, `id_aspek_csi`, `penilaian`, `nilai`) VALUES
(17, 3, 1, 'Sangat Baik', 5),
(18, 3, 2, 'Baik', 4),
(19, 3, 3, 'Sangat Baik', 5),
(20, 3, 4, 'Sangat Baik', 5),
(21, 3, 5, 'Baik', 4),
(22, 3, 6, 'Baik', 4),
(23, 3, 7, 'Sangat Baik', 5),
(24, 3, 8, 'Sangat Baik', 5),
(25, 4, 1, 'Sangat Baik', 5),
(26, 4, 2, 'Sangat Baik', 5),
(27, 4, 3, 'Baik', 4),
(28, 4, 4, 'Sangat Baik', 5),
(29, 4, 5, 'Sangat Baik', 5),
(30, 4, 6, 'Baik', 4),
(31, 4, 7, 'Sangat Baik', 5),
(32, 4, 8, 'Sangat Baik', 5),
(33, 5, 1, 'Sangat Baik', 5),
(34, 5, 2, 'Baik', 4),
(35, 5, 3, 'Sangat Baik', 5),
(36, 5, 4, 'Sangat Baik', 5),
(37, 5, 5, 'Sangat Baik', 5),
(38, 5, 6, 'Sangat Baik', 5),
(39, 5, 7, 'Sangat Baik', 5),
(40, 5, 8, 'Baik', 4);

-- --------------------------------------------------------

--
-- Table structure for table `detail_license`
--

CREATE TABLE `detail_license` (
  `id_detail_license` int(11) NOT NULL,
  `id_license` int(11) DEFAULT NULL,
  `id_software` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `tanggal_input` date DEFAULT NULL,
  `expired_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_license`
--

INSERT INTO `detail_license` (`id_detail_license`, `id_license`, `id_software`, `status`, `tanggal_input`, `expired_date`) VALUES
(3, 4, 41, 'Full', '2023-11-22', NULL),
(7, 7, 35, 'Trial', '2023-12-08', '2023-12-15'),
(8, 7, 34, 'Full', '2023-12-08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_tim_proyek`
--

CREATE TABLE `detail_tim_proyek` (
  `id_detail_tim_proyek` int(11) NOT NULL,
  `id_tim_proyek` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_tim_proyek`
--

INSERT INTO `detail_tim_proyek` (`id_detail_tim_proyek`, `id_tim_proyek`, `id_user`) VALUES
(5, 3, 14),
(6, 3, 15),
(7, 4, 15),
(8, 8, 54),
(9, 9, 55),
(10, 10, 56),
(11, 31, 57),
(12, 31, 64);

-- --------------------------------------------------------

--
-- Table structure for table `divisies`
--

CREATE TABLE `divisies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_divisi` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisies`
--

INSERT INTO `divisies` (`id`, `nama_divisi`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Divisi updae', 0, '2024-04-09 11:03:23', '2024-04-09 11:03:38'),
(2, 'Engineering', 1, '2024-04-12 00:10:38', '2024-04-12 00:10:38'),
(3, 'PCP', 1, '2024-04-12 00:10:47', '2024-04-12 00:10:47'),
(4, 'Finance', 1, '2024-04-12 00:10:56', '2024-04-12 00:10:56'),
(5, 'Mankon', 1, '2024-04-12 00:11:49', '2024-04-12 00:11:49'),
(6, 'QHSE', 1, '2024-04-12 00:12:03', '2024-04-12 00:12:03'),
(7, 'HC', 1, '2024-04-12 00:12:18', '2024-04-12 00:12:18'),
(8, 'DIVISI 1', 1, '2024-04-12 00:13:11', '2024-04-12 00:13:11'),
(9, 'DIVISI 2', 1, '2024-04-12 00:13:21', '2024-04-12 00:13:21'),
(10, 'DIVISI 3', 1, '2024-04-12 00:13:34', '2024-04-12 00:13:34'),
(11, 'DIVISI 4', 1, '2024-04-12 00:13:48', '2024-04-12 00:13:48'),
(12, 'DIVISI 5', 1, '2024-04-12 00:14:03', '2024-04-12 00:14:03'),
(13, 'DIVISI 5', 1, '2024-04-12 00:14:03', '2024-04-12 00:14:03'),
(14, 'DIVISI 7', 1, '2024-04-12 00:14:13', '2024-04-12 00:14:13');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_lps`
--

CREATE TABLE `dokumen_lps` (
  `id_dokumen_lps` int(11) NOT NULL,
  `nama_dokumen` varchar(255) DEFAULT NULL,
  `no_urut` varchar(10) DEFAULT NULL,
  `jenis_dokumen` enum('Utama','Pendukung') NOT NULL,
  `tanggal_input` date DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dokumen_lps`
--

INSERT INTO `dokumen_lps` (`id_dokumen_lps`, `nama_dokumen`, `no_urut`, `jenis_dokumen`, `tanggal_input`, `is_active`) VALUES
(1, 'Dokumen LPS Bab 3 Realisasi Engineering', '1', 'Utama', '2023-11-16', 1),
(2, 'Dokumen Karya Inovasi (KI) / Knowledge Management (KM)', '2', 'Utama', '2023-11-16', 1),
(3, 'Metode Kerja', '3', 'Utama', '2023-11-16', 1),
(4, 'Laporan Justifikasi Teknis / Memo Teknis / Review Desain', '4', 'Utama', '2023-11-16', 1),
(5, 'BOQ Kontrak s.d BOQ Final Quantity', '5', 'Utama', '2023-11-16', 1),
(6, 'Gambar Perencanaan *)', '6', 'Utama', '2023-11-16', 1),
(7, 'Detail Engineering Design (DED) **)', '7', 'Utama', '2023-11-16', 1),
(8, 'Shop Drawing (SHD)', '8', 'Utama', '2023-11-16', 1),
(9, 'As Built Drawing (ABD)', '9', 'Utama', '2023-11-16', 1),
(10, 'Dokumentasi Pelaksanaan', '10', 'Utama', '2023-11-16', 1),
(11, 'Kontrak dan Addendumnya. *)', 'a', 'Pendukung', '2023-11-16', 1),
(12, 'Laporan Harian', 'b', 'Pendukung', '2023-11-16', 1),
(13, 'Laporan Mingguan', 'c', 'Pendukung', '2023-11-16', 1),
(14, 'Laporan Bulanan', 'd', 'Pendukung', '2023-11-16', 1),
(15, 'Monthly Certificate (MC) **)', 'e', 'Pendukung', '2023-11-16', 1),
(16, 'Back up Quantity', 'f', 'Pendukung', '2023-11-16', 1),
(17, 'Back up Quality', 'g', 'Pendukung', '2023-11-16', 1),
(18, 'Request Pekerjaan', 'h', 'Pendukung', '2023-11-16', 1),
(19, 'Data Soil Investigation, Data Topografi, Data Bathimetri, Data Hidrologi, Data Hidro Oceanografi, dll', 'i', 'Pendukung', '2023-11-16', 1),
(20, 'Berita Acara Serah Terima I (PHO)', 'j', 'Pendukung', '2023-11-16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `dokumen_timelines`
--

CREATE TABLE `dokumen_timelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dokumen` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokumen_timelines`
--

INSERT INTO `dokumen_timelines` (`id`, `dokumen`, `created_at`, `updated_at`) VALUES
(1, 'Kontrak Induk', '2024-04-06 05:45:43', '2024-04-06 05:45:43'),
(2, 'SPMK', '2024-04-06 05:45:56', '2024-04-06 05:45:56'),
(3, 'Dokumen RKP', '2024-04-06 05:46:28', '2024-04-06 05:46:28'),
(4, 'Checkpoint 20%', '2024-04-06 05:46:54', '2024-04-06 05:46:54'),
(5, 'Checkpoint 50%', '2024-04-06 05:47:08', '2024-04-06 05:47:08'),
(6, 'Checkpoint 70%', '2024-04-06 05:47:19', '2024-04-06 05:47:19'),
(7, 'Foureyes Principal', '2024-04-06 05:47:39', '2024-04-06 05:47:39'),
(8, 'Dokumen LPS', '2024-04-06 05:47:54', '2024-04-06 05:47:54');

-- --------------------------------------------------------

--
-- Table structure for table `engineering_activity`
--

CREATE TABLE `engineering_activity` (
  `id_engineering_activity` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_kategori_pekerjaan` int(11) DEFAULT NULL,
  `tanggal_masuk_kerja` date DEFAULT NULL,
  `status_kerja` varchar(255) DEFAULT NULL,
  `judul_pekerjaan` varchar(255) DEFAULT NULL,
  `durasi` varchar(255) DEFAULT NULL,
  `evidence` varchar(255) DEFAULT NULL,
  `checked` int(11) NOT NULL DEFAULT 0,
  `validasi` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `engineering_activity`
--

INSERT INTO `engineering_activity` (`id_engineering_activity`, `id_user`, `id_kategori_pekerjaan`, `tanggal_masuk_kerja`, `status_kerja`, `judul_pekerjaan`, `durasi`, `evidence`, `checked`, `validasi`) VALUES
(2, 43, 28, '2023-10-02', 'WFO', 'Koordinasi & Review persiapan Zoom meet Review RKP Proyek MNP, Benoa, IKN, Keerom', '3', '', 1, 1),
(3, 43, 35, '2023-10-02', 'WFO', 'Koordinasi pengisian AKHLAK di wzone dengan bbrp rekan Eng Infra 2', '1', '', 1, 1),
(4, 43, 7, '2023-10-02', 'WFO', 'Menyusun Bab 2 Pembahasan KIKM Kolaborasi Proyek MNP - 45%', '4.5', 'https://drive.google.com/open?id=1xpXUd353GHCanMQx5JiLf2b1DU_2v0WS', 1, 1),
(5, 43, 7, '2023-10-03', 'WFO', 'Penyusunan KIKM Kolaborasi dengan proyek MNP 45 %', '4', '', 1, 1),
(6, 43, 28, '2023-10-03', 'WFO', 'Koordinasi materi review RKP dan sosialisasi PPT Review RKP dengan MNP, Benoa, IKN,', '4', '', 1, 1),
(7, 43, 11, '2023-10-04', 'WFO', 'Zoom meeting system Eng & Lean construction Sub Div Eng Infra 2', '2', '', 1, 1),
(8, 43, 35, '2023-10-04', 'WFO', 'Zoom meeting sosialisasi realignment prosedur sistem manajemen, SMAP & SMP', '3', 'https://drive.google.com/open?id=1rkY-4ysUOnFmwa5C5_lPu_b7cQ5A7H6E', 1, 1),
(9, 43, 28, '2023-10-04', 'WFO', 'Koordinasi kesiapan review RKP dept op4 dengan rekan2 eng infa 2 & perapihan dokumen share point review RKP', '3', '', 1, 1),
(10, 43, 28, '2023-10-05', 'WFO', 'Zoom review RKP Bab Eng dengan Proyek Bendungan Ameroro', '2', '', 1, 1),
(11, 43, 28, '2023-10-05', 'WFO', 'Zoom meeting Review RKP Bab Eng dengan Proses Irigasi Gumbasa', '2', '', 1, 1),
(12, 43, 35, '2023-10-05', 'WFO', 'Penyelesaian paper profesionalisme PSSPI ITB', '3', '', 1, 1),
(13, 43, 7, '2023-10-05', 'WFO', 'Koordinasi penyusunan makalah KIKM Proyek MNP & Benoa terkait konten & kesiapan kolaborasi', '1.5', '', 1, 1),
(14, 43, 35, '2023-10-06', 'WFO', 'ZOOM SOSIALISASI RE-ALIGNMENT PROSEDUR KNOWLEDGE MANAGEMENT, KARYA INOVASI, PELAKSANAAN BENCHMARKING DAN PROSEDUR PENELITIAN PENGEMBANGAN', '2', 'https://drive.google.com/open?id=1GX5lKb2S1FOm64Ndi3xJ5xRktR7KJA-n', 1, 1),
(15, 43, 35, '2023-10-06', 'WFO', 'ZOOM SOSIALISASI HASIL RE-ALIGNMENT PROSEDUR HUMAN CAPITAL', '2', '', 1, 1),
(16, 43, 7, '2023-10-06', 'WFO', 'Menyusun Bab 2 Pembahasan KIKM Kolaborasi Proyek MNP - 60%', '4.5', 'https://drive.google.com/open?id=1INEAOkRv4TgplyXd1In1CGpWby3qcsE3', 1, 1),
(17, 43, 28, '2023-10-09', 'WFA', 'Zoom RKP Bab 3 Proyek Pengerukan Alur dan Kolom Pelabuhan Benoa + Persiapannya', '2', '', 1, 1),
(18, 43, 11, '2023-10-09', 'WFA', 'Koordinasi apel pagi sistem engineering dan lean construction infra 2', '1.5', '', 1, 1),
(19, 43, 28, '2023-10-09', 'WFA', 'Zoom Review RKP divisi dengan team proyek PKT Bontang', '2', '', 1, 1),
(20, 43, 28, '2023-10-09', 'WFA', 'Koordinasi revisi materi untuk zoom meeting & form form excel serta evidence review RKP Proyek Benoa', '1.5', '', 1, 1),
(21, 43, 11, '2023-10-10', 'WFA', 'Zoom apel pagi bersama tem enjinering subdiv infra2', '1.5', '', 1, 1),
(22, 43, 7, '2023-10-10', 'WFA', 'Menyusun Bab 2 Pembahasan KIKM Kolaborasi Proyek MNP - 65%', '5', '', 1, 1),
(23, 43, 28, '2023-10-11', 'WFA', 'Zoom review RKP subdivisi Enjinering dengan proyek Acces tol makasar Newport + Persiapan & koordinasi terkait form excel evidence dan kelengkapan lainnya', '3.5', '', 1, 1),
(24, 43, 28, '2023-10-11', 'WFA', '\nZoom Evaluasi Perencanaan & Pengendalian Engineering Okt 2023 Proyek Pasigala', '2', '', 1, 1),
(25, 43, 28, '2023-10-11', 'WFA', 'Zoom Evaluasi Perencanaan & Pengendalian Engineering Okt 2023 Proyek Sumbu Timur', '2', '', 1, 1),
(26, 43, 35, '2023-10-10', 'WFA', 'Penyusunan portofolio PSPPI ITB', '1.5', '', 1, 1),
(27, 43, 35, '2023-10-12', 'WFA', 'Kuliah umum PSPPI Ketiga dengan pembicara 1.Prof. Ir. Iswandi Imran, M.A.Sc., Ph.D.\nGuru Besar Fakultas Teknik SIpil dan Lingkungan ITB & Ir. Andradiet I J Alis., M.B.A., IPM.\nKonsultan Independen\n', '4', 'https://drive.google.com/open?id=1pIkuH-0sv3uK2qSOKz0AwcQpUL9X3Fx4', 1, 1),
(28, 43, 28, '2023-10-12', 'WFO', 'Evaluasi evidence review RKP Proyek Benoa (form excel dan evidence)', '1.5', '', 1, 1),
(29, 43, 28, '2023-10-12', 'WFA', 'Update file monitoring RKP pada share point RKP proyek berjalan dept ops 4, dan koordinasi dengan proyek Wani Port terkait Review lanjutan RKP', '2.5', '', 1, 1),
(30, 43, 28, '2023-10-13', 'WFA', 'Zoom Evaluasi Perencanaan & Pengendalian Engineering Okt 2023 Proyek MWRD', '2', '', 1, 1),
(31, 43, 28, '2023-10-13', 'WFA', 'Zoom Evaluasi Perencanaan & Pengendalian Engineering Okt 2023 Proyek Samba Hiran', '2', '', 1, 1),
(32, 43, 28, '2023-10-13', 'WFA', 'Zoom Evaluasi Perencanaan & Pengendalian Engineering Okt 2023 Proyek Tol IKN', '2', '', 1, 1),
(33, 43, 28, '2023-10-13', 'WFA', 'Evaluasi evidence review RKP Proyek MNP (form excel dan evidence)', '1.5', '', 1, 1),
(34, 43, 11, '2023-10-16', 'WFO', 'Zoom Apel Pagi Eng. Div Infra 2', '1.5', '', 1, 1),
(35, 43, 28, '2023-10-16', 'WFO', '\nZoom Evaluasi Perencanaan & Pengendalian Engineering Okt 2023 Proyek MUTIP', '2', '', 1, 1),
(36, 43, 28, '2023-10-16', 'WFO', '\nZoom Evaluasi Perencanaan & Pengendalian Engineering Okt 2023 Proyek Lingkar Kijing', '2', '', 1, 1),
(37, 43, 28, '2023-10-16', 'WFO', 'Update file monitoring RKP pada share point RKP proyek berjalan dept ops 4, dan koordinasi dengan tim sistem engineering', '1.5', '', 1, 1),
(38, 43, 29, '2023-10-17', 'WFO', 'Zoom SOSIALISASI HASIL RE-ALIGNMENT PROSEDUR MANAJEMEN PROYEK', '2', '', 1, 1),
(39, 43, 28, '2023-10-17', 'WFO', '\nZoom Evaluasi Perencanaan & Pengendalian Engineering Okt 2023 Proyek Tursina', '2', '', 1, 1),
(40, 43, 28, '2023-10-17', 'WFO', '\nZoom Evaluasi Perencanaan & Pengendalian Engineering Okt 2023 Proyek LC Keerom', '2', '', 1, 1),
(41, 43, 35, '2023-10-17', 'WFO', 'Membaca literatur manajemen proyek PMBOK buku karangan PP', '1.5', '', 1, 1),
(42, 43, 6, '2023-10-18', 'WFO', '\nZoom Topic : meet the Engineer #2 dilingkungan Infrastruktur 2', '3', '', 1, 1),
(43, 43, 28, '2023-10-18', 'WFO', 'Zoom Evaluasi Perencanaan & Pengendalian Engineering Okt 2023 Proyek LC Keerom', '2', '', 1, 1),
(44, 43, 28, '2023-10-18', 'WFO', 'Zoom Evaluasi Perencanaan & Pengendalian Engineering Okt 2023 Proyek Banggai', '2', '', 1, 1),
(45, 43, 28, '2023-10-19', 'WFO', '\nZoom Evaluasi Perencanaan & Pengendalian Engineering Okt 2023 Proyek Bendungan Pamukkulu', '2', '', 1, 1),
(46, 43, 7, '2023-10-19', 'WFO', 'Meeting persiapan untuk KI/KM Rewards Inrfastruktur2', '1.5', '', 1, 1),
(47, 43, 7, '2023-10-19', 'WFO', 'Menyusun Bab 2 Pembahasan KIKM Kolaborasi Proyek MNP - 70%', '4.5', '', 1, 1),
(48, 43, 28, '2023-10-20', 'WFO', '\nZoom Evaluasi Perencanaan & Pengendalian Engineering Okt 2023 Proyek Duplikasi Jembatan Kapuas', '2', '', 1, 1),
(49, 43, 35, '2023-10-20', 'WFO', 'Zoom QHSE Morning Talk Online dengan tema \"OUR MINDS, OUR RIGHTS\"', '2', '', 1, 1),
(50, 43, 28, '2023-10-20', 'WFO', 'Koordinasi & Collecting hasil review RKP, rekapitulasi evidence, form excel, dan dokumen dokumen pendukung, dengan proyek MNP & BENOA', '3', '', 1, 1),
(51, 43, 29, '2023-10-23', 'WFA', 'Kickoff Meting, FGD & Persiapan Pelatihan MS. Project Level Intermediate', '2', '', 1, 1),
(52, 43, 28, '2023-10-23', 'WFO', 'Zoom Evaluasi Perencanaan & Pengendalian Engineering Okt 2023 Proyek Wani Port', '2', '', 1, 1),
(53, 43, 28, '2023-10-23', 'WFA', 'Koordinasi revisi materi hasil zoom meeting & persiapan form excel evidence review RKP Proyek Wani Port', '1', '', 1, 1),
(54, 43, 35, '2023-10-23', 'WFA', 'Pengisian form change agen AKHLAK 2023', '2', '', 1, 1),
(55, 43, 35, '2023-10-24', 'WFA', 'Pelatihan Ms. Project Basic - Intermediate', '8', '', 1, 1),
(56, 43, 35, '2023-10-25', 'WFA', 'Pelatihan Ms. Project Basic - Intermediate hari ke 2', '8', 'https://drive.google.com/open?id=1HvBNNRYyrR6nuudSqAVvZhcOC34fycFU', 1, 1),
(57, 43, 7, '2023-10-26', 'WFA', 'Kick of meeting KI/KM award divisi infrastruktur 2 tahun 2023', '1.5', '', 1, 1),
(58, 43, 7, '2023-10-26', 'WFA', '\nKoordinasi KI / KM awards dengan Eng proyek MNP, Benoa, Wani Port', '1.5', '', 1, 1),
(59, 43, 7, '2023-10-26', 'WFA', 'Menyusun Bab 2 Pembahasan KIKM Kolaborasi Proyek MNP - 75%', '4', '', 1, 1),
(60, 43, 35, '2023-10-27', 'WFA', 'QHSE Morning Talk Infra 2', '1.5', '', 1, 1),
(61, 43, 35, '2023-10-27', 'WFA', 'Mempelajari Code Of Conduct PT. Wijaya Karya 2023 - 2025 dan menuangkan pada penulisan portofolio PSPPI ITB', '2.5', '', 1, 1),
(62, 43, 28, '2023-10-27', 'WFA', 'Monitoring tindak lanjut program kerja sistem engineering & lean construction, melakukan rekapitulasi dan resume issue strategis dari review periodik RKP Oktober', '3', '', 1, 1),
(63, 43, 7, '2023-10-30', 'WFO', '\nZoom meeting Revisi KI/KM Kolaborasi Proyek MUTIP', '1.5', '', 1, 1),
(64, 43, 7, '2023-10-30', 'WFO', 'Koordinasi persiapan KIKM award', '1', '', 1, 1),
(65, 43, 7, '2023-10-30', 'WFO', '\nMenyusun Bab 2 Pembahasan KIKM Kolaborasi Proyek MNP - 80%', '4', '', 1, 1),
(66, 43, 35, '2023-10-31', 'WFO', 'Mengikuti zoom Awareness Cobit 2019 terkait tata kelola IT dalam lingkup organisasi', '3', '', 1, 1),
(67, 43, 7, '2023-10-31', 'WFO', 'Zoom meeting KI/KM BENDUNGAN PAMUKKULU', '1.5', '', 1, 1),
(68, 43, 28, '2023-10-31', 'WFO', 'Collecting & perapihan share point & monitoring global review RKP Periode Sept - Okt', '2.5', '', 1, 1),
(69, 0, 0, '0000-00-00', 'status_kerja', 'judul_pekerjaan', 'durasi', 'evidence', 0, 0),
(70, 43, 7, '2023-11-20', 'WFA', 'Koordinasi perihal persiapan acara KI/KM award Divisi Infrastruktur 2', '2', '', 1, 1),
(71, 43, 7, '2023-11-20', 'WFA', 'Menyusun makalah Karya Inovasi Kolaborasi dengan Proyek Benoa 35 %', '4,5', '', 1, 1),
(72, 43, 7, '2023-11-21', 'WFA', 'Menyusun makalah Karya Inovasi Kolaborasi dengan Proyek Benoa 40 %', '3,5', '', 1, 1),
(73, 43, 35, '2023-11-21', 'WFA', 'Membaca literasi PMBOK 7th dari PMI & Buku Manajemen Proyek PP', '3,5', '', 1, 1),
(74, 43, 35, '2023-11-22', 'WFA', 'Kuliah Umum Ke 4 - PSPPI ITB', '8', 'https://drive.google.com/open?id=1UoL8VdqmLJdHkrp77J_PMEPvVLfuA4n1', 1, 1),
(75, 43, 7, '2023-11-23', 'WFA', 'Menyusun makalah Karya Inovasi Kolaborasi dengan Proyek Benoa 45 %', '4', '', 1, 1),
(76, 43, 32, '2023-11-23', 'WFA', 'Mengisi tambahan evidence self assesment penilaian AKHLAK 2023', '3', '', 1, 1),
(77, 43, 11, '2023-11-24', 'WFA', 'Rapat Koordinasi periodik mingguan koordinasi internal sub divisi engineering infra 2', '1,5', '', 1, 1),
(78, 43, 29, '2023-11-24', 'WFA', 'QSHE Morning Talk - Safe Manual Handling', '1', '', 1, 1),
(79, 43, 7, '2023-11-27', 'WFO', 'Menyusun makalah Karya Inovasi Kolaborasi dengan Proyek Benoa 50 %', '5', '', 1, 1),
(80, 43, 7, '2023-11-27', 'WFO', 'Zoom Kolaborasi KI/KM sebagai penulis & mempresentasikan dengan rekan2 Sub Engineering Divisi Infrastuktur 2', '2', '', 1, 1),
(81, 43, 7, '2023-11-28', 'WFO', 'Melakukan revisi 50 % Makalah Karya Inovasi dengan Proyek Benoa & Mencari referensi pada portal KM Wzone', '7', '', 1, 1),
(82, 43, 35, '2023-11-24', 'WFA', 'Membaca literasi PMBOK 7th dari PMI & Buku Manajemen Proyek PP', '3,5', '', 1, 1),
(83, 43, 7, '2023-11-29', 'WFO', 'Menyusun makalah Karya Inovasi Kolaborasi dengan Proyek Benoa 60 %', '7,5', '', 1, 1),
(84, 43, 7, '2023-11-30', 'WFO', '\nMenyusun makalah Karya Inovasi Kolaborasi dengan Proyek Benoa 70 %', '8', '', 1, 1),
(85, 43, 7, '2023-12-01', 'WFO', 'Menyusun makalah Karya Inovasi Kolaborasi dengan Proyek Benoa 80 %', '7,5', '', 1, 1),
(86, 43, 35, '2023-12-04', 'WFA', 'ST Perbantuan Proyek Dermaga Donggala, Survey Lapangan Kondisi Proyek', '8', 'https://drive.google.com/open?id=1K8AD1x6LUdbDBlMQtlgtF60scD3cMz-4', 1, 1),
(87, 43, 35, '2023-12-05', 'WFA', 'ST Perbantuan Proyek Dermaga Donggala, Penyusunan Cut Off Schedule & Penyusunan Action Plan Penyelesaian Proyek', '8', 'https://drive.google.com/open?id=1lI_l2bl2zzxM07yaK6hUMu_8M8D0wzWa', 1, 1),
(88, 43, 35, '2023-12-06', 'WFA', 'Menyusun revisi presentasi final PSPPI ITB untuk keperluan sidang akhir tanggal 7 Desember 2023 & Submit upload 100% Makalah karya inovasi dengan proyek Benoa', '8', '', 1, 1),
(89, 43, 35, '2023-12-07', 'WFA', 'Sidang akhir PSPPI di ITB', '8', 'https://drive.google.com/open?id=1wqh40YQMwYdRfHyXBCTmZQsFWCUGehl3', 1, 1),
(90, 43, 35, '2023-12-08', 'WFA', 'Menyusun revisi, dan submit berkas kelengkapan akhir kebutuhan yudisium PSPPI ITB di Bandung', '8', '', 1, 1),
(91, 43, 35, '2023-12-11', 'WFA', 'ST Perbantuan Proyek Dermaga Donggala, Penyusunan Action Plan & sistem monitoring evaluasi harian penyelesaian Proyek', '8', 'https://drive.google.com/open?id=1M6snQdXh-jSl8C5L6GV-4qpGPVbGZ7pA', 1, 1),
(92, 43, 35, '2023-12-12', 'WFA', 'ST Perbantuan Proyek Dermaga Donggala, Pendampingan DGM Operasi 4 & Paparan serta diskusi revisi action plan penyelesaian proyek & monitoring sumber daya', '8', 'https://drive.google.com/open?id=1wyd2cv4BYvHx42oNFUVxkSJkk-Sa5qS4', 1, 1),
(93, 42, 26, '2023-12-04', 'WFA', 'Koordinasi program sistem engineering, KI KM award divisi infra 2', '1,5', '', 1, 1),
(94, 42, 7, '2023-12-04', 'WFA', 'Penilaian KI KM Award 2023 divisi infra 2', '2', '', 1, 1),
(95, 42, 35, '2023-12-04', 'WFA', 'Koordinasi & menyusun paparan overview proyek Bypass Banjarmasin dan materi keuangan proyek', '2', '', 1, 1),
(96, 29, 2, '2023-12-18', 'WFO', 'Meeting dengan tim proyek MUTIP 1', '2', 'https://drive.google.com/open?id=1rHZPAU1Zvs3vj4XRYp8HkTafsBRdZS3T', 1, 1),
(97, 42, 35, '2023-12-04', 'WFA', 'Koordinasi dengan Adkon tindak lanjut proses eskalasi proyek Bypass Banjarmasin', '2', '', 1, 1),
(98, 42, 7, '2023-12-05', 'WFA', 'Penilaian KI KM Award 2023 divisi infra 2', '2', '', 1, 1),
(99, 42, 35, '2023-12-05', 'WFA', 'Rapat koordinasi dept operasi 3 terkait proses eskalasi proyek Bypass Banjarmasin', '2,5', '', 1, 1),
(100, 42, 28, '2023-12-05', 'WFA', 'Undangan LPS Proyek Rekonstruksi Jalan Kalawara - Kulawi dan Sirenja', '1,5', 'https://drive.google.com/open?id=1UYchCImMgPMpKKim1Eby5ZiQolTrNq_4', 1, 1),
(101, 42, 35, '2023-12-05', 'WFA', 'Rapat dengan vendor Aneka Makmur (Proyek Bypass Banjarmasin)', '1', 'https://drive.google.com/open?id=1VWOogSj5ps-KYq5n8A3NTMngdecaJm5z', 1, 1),
(102, 42, 35, '2023-12-06', 'WFA', 'Koordinasi dengan ADKON divisi terkait indek solar industri untuk eskalasi proyek Bypass Banjarmasin', '1,5', '', 1, 1),
(103, 42, 35, '2023-12-06', 'WFA', 'Undangan rapat finalisasi kegiatan tim task force QHSE DOP 1 di lantai 15', '3', 'https://drive.google.com/open?id=1i8QH6mgE5i9wk6HfSlvpeHKepaw6qans', 1, 1),
(104, 42, 7, '2023-12-06', 'WFA', 'Penilaian KI KM Award 2023 divisi infra 2', '2,5', '', 1, 1),
(105, 42, 35, '2023-12-07', 'WFA', 'Koordinasi dengan PPK proyek Bypass Banjarmasin terkait tindak lanjut perbaikan dalam masa pemeliharaan', '3', '', 1, 1),
(106, 42, 7, '2023-12-07', 'WFA', 'Penilaian KI KM Award 2023 divisi infra 2', '2', '', 1, 1),
(107, 42, 35, '2023-12-07', 'WFA', 'Koordinasi dengan Tim audit BPKP Kalimantan Selatan terkait proses eskalasi proyek Bypass Banjarmasin', '3', '', 1, 1),
(108, 42, 35, '2023-12-08', 'WFA', 'Koordinasi dengan Kasie Preservasi Jalan BPJN Kalimantan Selatan di kantor BPJN Kalsel terkait pemeliharaan proyek Bypass Banjarmasin', '4', '', 1, 1),
(109, 42, 7, '2023-12-08', 'WFA', 'Penilaian KI KM Award 2023 divisi infra 2', '2', '', 1, 1),
(110, 42, 7, '2023-12-08', 'WFA', 'Rapat Koordinasi Penilaian KI KM Award 2023', '1', '', 1, 1),
(111, 42, 35, '2023-12-11', 'WFO', 'Membuat monitoring pekerjaan pemeliharaan proyek bypass Banjarmasin', '2', '', 1, 1),
(112, 42, 35, '2023-12-11', 'WFO', 'Membuat laporan tim tasforce QHSE dept operasi 3', '2,5', '', 1, 1),
(113, 42, 32, '2023-12-11', 'WFO', 'Menyusun ulang program kerja sistem engineering & lean construction', '2', '', 1, 1),
(114, 42, 25, '2023-12-12', 'WFO', 'Koordinasi personel dan program kerja sub sistem engineering', '2', '', 1, 1),
(115, 42, 35, '2023-12-12', 'WFO', 'Koordinasi dengan keuangan terkait pembayaran hutang vendor proyek Bypass Banjarmasin', '1', '', 1, 1),
(116, 42, 35, '2023-12-12', 'WFO', 'Rapat dengan vendor PT Karya Aspal Mandiri tindak lanjut penyelesaian hutang', '1,5', 'https://drive.google.com/open?id=1PLFcGXACMSVOW8FrOJY1tQlt-TyvadIl', 1, 1),
(117, 42, 35, '2023-12-12', 'WFO', 'Melengkapi laporan tim taskforce QHSE dept operasi 3', '1', '', 1, 1),
(118, 42, 7, '2023-12-12', 'WFO', 'Koordinasi persiapan puncak acara KI KM award divisi infra 2', '1', '', 1, 1),
(119, 42, 11, '2023-12-13', 'WFO', 'Meet The Engineer 4 Infra 2 : Proyek Gumbasa & Bendungan Pamukkulu', '3', 'https://drive.google.com/open?id=1SORbI1LqElyg9V8TTNCMNgHFC2gQTIFv', 1, 1),
(120, 42, 7, '2023-12-13', 'WFO', 'Rapat koordinasi panitia KI KM Award via zoom', '1', 'https://drive.google.com/open?id=14BdGQXd5PHgpFLcpC-pbLedZGMF36ySq', 1, 1),
(121, 42, 35, '2023-12-13', 'WFO', 'Membuat paparan rapat persiapan presentasi dengan Divisi Keuangan', '1,5', '', 1, 1),
(122, 29, 2, '2023-12-18', 'WFO', 'Meeting dengan tim proyek pasigala', '2', 'https://drive.google.com/open?id=1xBo3GnvcYKByKNYnM0fVZKxZPnO5P6pL', 1, 1),
(123, 32, 35, '2023-12-05', 'WFA', 'Perbantuan Proyek MUTIP 1 (Final Quantity and PHO)', '8', '', 1, 1),
(124, 32, 35, '2023-12-06', 'WFO', 'Perbantuan Proyek MUTIP 1', '8', '', 1, 1),
(125, 32, 35, '2023-12-07', 'WFO', 'Perbantuan Proyek Mutip 1', '8', '', 1, 1),
(126, 32, 35, '2023-12-08', 'WFO', 'Perbantuan Proyek Mutip 1', '8', 'https://drive.google.com/open?id=1NWAfmg8MQhJj6G-ASxMqGYve9GYM8eep', 1, 1),
(127, 32, 35, '2023-12-11', 'WFO', 'Perbantuan Proyek Mutip 1', '8', 'https://drive.google.com/open?id=1RCE_iUpd4pmWBFFX30M50TuCbVOjZWes', 1, 1),
(128, 32, 35, '2023-12-12', 'WFO', 'Perbantuan Proyek Mutip-1', '8', '', 1, 1),
(129, 32, 35, '2023-12-13', 'WFO', 'Perbantuan Proyek MUTIP 1', '8', '', 1, 1),
(130, 32, 35, '2023-12-14', 'WFA', 'Perbantuan Proyek Mutip 1', '8', '', 1, 1),
(131, 32, 35, '2023-12-15', 'WFO', 'Perbantuan Proyek MUTIP 1', '8', '', 1, 1),
(132, 32, 35, '2023-12-18', 'WFA', 'Perbantuan Proyek MUTIP 1', '8', 'https://drive.google.com/open?id=1QQgGavFgybZgZcz-L-a1mXbSgPGZlvpp', 1, 1),
(133, 42, 35, '2023-12-14', 'WFO', 'Rapat dengan divisi keuangan di ruang meeting lt 10 (pembahasan proyek Bypass Banjarmasin)', '2', 'https://drive.google.com/open?id=12uck92_HOeY7vS1ELQnsLZ1uYSMa7hyA', 1, 1),
(134, 42, 7, '2023-12-14', 'WFO', 'Pengujian Karya Inovasi Review Desain Tebal Kedalaman Granular yang Dibongkar pada Proyek Provision of Maintenance Completion on Muara Wahau Road Diversion', '1', 'https://drive.google.com/open?id=1gYfEoxAXoaJa8zZTwwmetUIktS1aZ3be', 1, 1),
(135, 42, 7, '2023-12-14', 'WFO', 'Pengujian Karya Inovasi M-Sand (Manufactured Sand) Sebagai Pengganti Material Pasir Alam Pada Beton Fc? 30 MPa', '1', 'https://drive.google.com/open?id=1Z7wnz0YzoTtpN_WRet4FRP93N1zj1N27', 1, 1),
(136, 42, 35, '2023-12-15', 'WFO', 'QHSEE Morning Talk Online Tema: AYO LAKUKAN BUDAYA KERJA SEHAT & SELAMAT LINGKUNGAN KERJA', '1', 'https://drive.google.com/open?id=1YYX74VoIZDnyzSOd2nJw5_ttS_asH5hz', 1, 1),
(137, 42, 23, '2023-12-15', 'WFO', 'Konsolidasi dengan Engineering divisi QHSEE', '2', '', 1, 1),
(138, 42, 23, '2023-12-15', 'WFO', 'Membaca prosedur manajemen proyek rev 1', '2', '', 1, 1),
(139, 46, 35, '2023-12-18', 'WFA', 'tugas perbantuan ke proyek pasigala', '8', '', 1, 1),
(140, 46, 35, '2023-12-19', 'WFA', 'tugas perbantuan ke proyek pasigala', '8', '', 1, 1),
(141, 46, 35, '2023-12-20', 'WFA', 'tugas perbantuan ke proyek pasigala', '8', '', 1, 1),
(142, 49, 35, '2023-11-27', 'WFA', 'Membuat laporan tim taskforce qhsee', '7,5', '', 1, 1),
(143, 49, 35, '2023-11-28', 'WFA', 'Membuat laporan taskforce qhsee dept op 4', '7,5', '', 1, 1),
(144, 49, 35, '2023-11-29', 'WFA', 'Koordjnasi tim task force qhsee dept op 4', '7', '', 1, 1),
(145, 49, 35, '2023-11-30', 'WFA', 'Agenda tim task force qhsee proyek bendungan ameroro', '8', '', 1, 1),
(146, 49, 35, '2023-12-01', 'WFA', 'Agenda tim task force proyek bendungan ameroro', '8', '', 1, 1),
(147, 49, 35, '2023-12-02', 'WFA', 'Agenda tim taskforce proyek bendungan ameroro', '8', '', 1, 1),
(148, 49, 35, '2023-12-04', 'WFO', 'Rakor tim taskforce dept op 4 di lantai 11', '6', '', 1, 1),
(149, 49, 7, '2023-12-05', 'WFO', 'Monitoring dan input data ki km award juri awal', '7', '', 1, 1),
(150, 49, 29, '2023-12-06', 'WFO', 'Zoominar forkabim lewat media zoom', '2', '', 1, 1),
(151, 49, 7, '2023-12-06', 'WFO', 'Monitoring dan input data ki km award', '5', '', 1, 1),
(152, 49, 7, '2023-12-07', 'WFO', 'Monitoring dan persiapan pelaksanaan ki km award', '7', '', 1, 1),
(153, 49, 29, '2023-12-08', 'WFO', 'Sosialisasi pengisian akhlak di hcms', '2', '', 1, 1),
(154, 49, 7, '2023-12-08', 'WFO', 'Rekapitulasi penilaian ki km award', '4', '', 1, 1),
(155, 49, 7, '2023-12-08', 'WFO', 'Rapat penrntuan 3 besar ki km award', '1', '', 1, 1),
(156, 49, 35, '2023-12-11', 'WFA', 'Membuat laporan tim taskforce qhsee dept op 4', '7', '', 1, 1),
(157, 49, 7, '2023-12-12', 'WFA', 'Koordinasi persiapan puncak acara ki km award', '4', '', 1, 1),
(158, 49, 35, '2023-12-13', 'WFA', 'Menyusun laporan task force QHSEE', '3', '', 1, 1),
(159, 49, 7, '2023-12-14', 'WFA', 'Persiapan ki km award', '4,5', '', 1, 1),
(160, 49, 29, '2023-12-15', 'WFA', 'Qhse morning talk', '1,5', '', 1, 1),
(161, 49, 7, '2023-12-15', 'WFA', 'Persiapan ki km award', '5,5', '', 1, 1),
(162, 49, 7, '2023-12-18', 'WFO', 'Koordinasi dengan team lt 17.persiapan ki km award', '2,5', '', 1, 1),
(163, 49, 7, '2023-12-18', 'WFO', 'Persiapan ki km award', '4', '', 1, 1),
(164, 49, 7, '2023-12-19', 'WFO', 'Persiapan ki km award', '7', '', 1, 1),
(165, 41, 20, '2023-12-21', 'WFO', 'memasukan data monthly report november ke website', '6', 'https://drive.google.com/open?id=1bO62J5YjcFa8E0a5rtRdNytG5n9Xn9WC', 1, 1),
(166, 41, 20, '2023-12-20', 'WFO', 'kikm award 2023', '7', 'https://drive.google.com/open?id=1HILBCiL7HDXxRyblDLrzFFwKNeHRVZHe', 1, 1),
(167, 41, 20, '2023-12-19', 'WFO', 'persiapan kikm award', '4', '', 1, 1),
(168, 41, 20, '2023-12-19', 'WFO', 'membuat detail / read more activities', '4', 'https://drive.google.com/open?id=1zhfkAZETUn5JqF93eohwxwUz8Ip3EPJq', 1, 1),
(169, 41, 20, '2023-12-18', 'WFO', 'membuat infra news di web', '2', 'https://drive.google.com/open?id=10iT0Zd9uXDLDE_aKafULYiNXM8Lm9nwy', 1, 1),
(170, 41, 20, '2023-12-18', 'WFO', 'membuat infranews ke website', '2', 'https://drive.google.com/open?id=13FUz8vNfg9xD7N4XP-G9qHHN627rjBoo', 1, 1),
(171, 41, 20, '2023-12-18', 'WFO', 'membuat modal, pop up latestnews', '6', 'https://drive.google.com/open?id=1GRSIEIMK_FeTlsS2LddZ41QY6Xz8BW_0', 1, 1),
(172, 29, 35, '2023-12-21', 'WFO', 'Sosialisasi HC terkait Program Pengharkatan Non Tunai', '1,5', 'https://drive.google.com/open?id=1AFaz7eHrQedUE0sJxCidN7LlhQPdgBdr', 1, 1),
(173, 41, 20, '2023-12-21', 'WFO', 'membuat Infranews_Pemenang KIKM 2023 di website', '2', 'https://drive.google.com/open?id=1GpXe5ZZExc0eBwAm13un8VL3R-zAW9L1', 1, 1),
(174, 45, 35, '2023-12-11', 'WFA', 'input data penilaian untuk KI/KM Awards infra2', '7', '', 1, 1),
(175, 45, 35, '2023-12-12', 'WFA', 'pengumpulan materi presentasi dari proyek\nuntuk acara ki/km awards', '7', '', 1, 1),
(176, 45, 35, '2023-12-13', 'WFA', 'Zoom Meet The Engineer #4, pemaparan dari proyek Gumbasa dan bendungan Pamukkulu', '3', '', 1, 1),
(177, 45, 35, '2023-12-13', 'WFA', 'input dan collect data penilaian untuk KI/KM Awards infra2', '4', '', 1, 1),
(178, 45, 35, '2023-12-14', 'WFA', 'zoom persiapan untuk ki/km awards', '2', '', 1, 1),
(179, 45, 35, '2023-12-14', 'WFA', 'sayembara change agent', '3', '', 1, 1),
(180, 45, 35, '2023-12-14', 'WFA', 'input dan collect data penilaian untuk KI/KM Awards infra2', '4', '', 1, 1),
(181, 45, 35, '2023-12-15', 'WFA', 'QSHE Morning Talk Online', '1', '', 1, 1),
(182, 45, 35, '2023-12-15', 'WFA', 'input dan collect data penilaian untuk KI/KM Awards infra2', '6', '', 1, 1),
(183, 45, 35, '2023-12-22', 'WFO', 'peltihan KONTRAK MANAJEMEN BATCH 23', '8', '', 1, 1),
(184, 45, 35, '2023-12-21', 'WFO', 'peltihan KONTRAK MANAJEMEN BATCH 23', '8', '', 1, 1),
(185, 45, 35, '2023-12-20', 'WFO', 'KI/KM Awards', '8', '', 1, 1),
(186, 45, 35, '2023-12-19', 'WFO', 'Persiapan kelengkapan Acara KI/KM Awards infra2', '4', '', 1, 1),
(187, 45, 35, '2023-12-19', 'WFO', 'Gladi resik untuk acara KI/KM Awards', '4', '', 1, 1),
(188, 45, 35, '2023-12-18', 'WFO', 'Persiapan kelengkapan Acara KI/KM Awards infra2', '7', '', 1, 1),
(189, 42, 29, '2023-12-18', 'WFA', 'Mengikuti Webinar Artificial Intelligence dalam Dunia Konstruksi', '2', 'https://drive.google.com/open?id=1HjifnuCafSAuU3Q0uEB5_V9jpEnDN_kY', 1, 1),
(190, 42, 27, '2023-12-18', 'WFA', 'Koordinasi engineering dengan proyek IPAL IKN', '2', '', 1, 1),
(191, 42, 7, '2023-12-18', 'WFA', 'Koordinasi persiapan puncak acara KI KM award divisi infra 2', '1,5', '', 1, 1),
(192, 42, 35, '2023-12-18', 'WFA', 'Koordinasi dengan BPKP Kalsel persiapan sebelum QA BPKP Pusat', '2', 'https://drive.google.com/open?id=1J07hAvM72XehWznkW7EHsU6p19GkQlgc', 1, 1),
(193, 42, 35, '2023-12-19', 'WFA', 'Expert Talks 2023 dengan Narasumber Bapak Prof.Rhenald Kasali Ph.D, ESG: Embracing The Future Business Environment', '3', 'https://drive.google.com/open?id=1HSfsp8vUwDATb1XWYtIR_Or-Pmj2EwzX', 1, 1),
(194, 42, 35, '2023-12-19', 'WFA', 'Membuat surat pengajuan pinjaman dana untuk pemeliharaan proyek Bypass Banjarmasin', '1', '', 1, 1),
(195, 42, 7, '2023-12-19', 'WFA', 'Gladi resik persiapan acara puncak KI KM Award divisi infrastruktur 2', '3', '', 1, 1),
(196, 42, 35, '2023-12-20', 'WFA', 'Mengikuti pelatihan manajemen kontrak Batch 23 hari ke-1', '5', 'https://drive.google.com/open?id=1mNim1ob9WD5ExrhMhL03fi_7U3_CtXZ-', 1, 1),
(197, 42, 7, '2023-12-20', 'WFA', 'Mengikuti puncak acara KI KM Awards Infrastruktur 2 di lt 17 WIKA Tower', '5', 'https://drive.google.com/open?id=13grFiW5SnVOqMmNq8Df1ddM688HuqdYz', 1, 1),
(198, 42, 35, '2023-12-21', 'WFA', 'Mengikuti pelatihan manajemen kontrak Batch 23 hari ke-2', '7,5', 'https://drive.google.com/open?id=1Mrs60QqWDA0aY1aHm20DhOhtC6d9aJg7', 1, 1),
(199, 42, 35, '2023-12-21', 'WFA', 'Mengikuti Sosialisasi Pengharkatan Non Tunai UPS2023', '1,5', 'https://drive.google.com/open?id=1w2jwIuxNPCiVdp1MydN-Lg5qL01ecOpb', 1, 1),
(200, 42, 35, '2023-12-22', 'WFA', 'Mengurus FHO proyek Bypass Banjarmasin di Kalsel', '8', 'https://drive.google.com/open?id=120xTkU70LC2_9dhLeza27nl7PSjoVHoE', 1, 1),
(201, 41, 20, '2023-12-22', 'WFO', 'mengikuti seminar \'start from your belief\' - Mothers day', '4', 'https://drive.google.com/open?id=1KCZLgYXLosn9gEuoC1yeeE9IhXwcPxXL', 1, 1),
(202, 41, 20, '2023-12-22', 'WFO', 'melanjutkan buat pop up berita website', '4', '', 1, 1),
(203, 46, 35, '2023-12-21', 'WFA', 'tugas perbantuan ke proyek pasigala', '8', '', 1, 1),
(204, 46, 35, '2023-12-22', 'WFA', 'tugas perbantuan ke proyek pasigala', '8', '', 1, 1),
(205, 46, 35, '2023-12-26', 'WFA', 'tugas perbantuan ke proyek pasigala', '8', '', 1, 1),
(206, 46, 35, '2023-12-27', 'WFA', 'tugas perbantuan ke proyek pasigala', '8', '', 1, 1),
(208, 42, 32, '2023-10-01', 'WFA', 'Mengikuti workshop K2R Neo hari ke-1', '3', 'https://drive.google.com/open?id=1VjUfBWLRgXCBPU6sZY9qrUyEmkkitSPQ', 1, 1),
(209, 31, 35, '2023-10-01', 'WFA', 'ST Perbantuan TIm PHO Proyek Akses Toll Makassar New Port (MNP)', '5', 'https://drive.google.com/open?id=1bNCdE2UieLPvHP2_3oAeop0XnIX9ivrR', 1, 1),
(210, 44, 32, '2023-10-01', 'WFA', 'Mengikuti Workshop K2R Hari-1', '3', 'https://drive.google.com/open?id=1oneZgQe1X-9Ny7BZwaS6aOzki-d6dA7C', 1, 1),
(211, 37, 32, '2023-10-02', 'WFA', 'Workshop Kompetisi Konstruksi Ramping Harri ke-2', '7,5', 'https://drive.google.com/open?id=1gL-bYcFaWMPQHeOgVZdJzM6Z70cc65kS', 1, 1),
(212, 48, 27, '2023-10-02', 'WFA', 'Mempelajari RKP Bendungan Pamukkulu Juni', '8', 'https://drive.google.com/open?id=1mh3Z2reBpuxVg3uBHJFuYUdsVOin0iU-', 1, 1),
(213, 39, 29, '2023-10-02', 'WFO', 'Software Controlling Mamminasata', '4', '', 1, 1),
(214, 39, 11, '2023-10-02', 'WFO', 'Persiapan MR, Update Lapbul September, Persiapan Podcast Infra 2', '4', '', 1, 1),
(215, 38, 12, '2023-10-02', 'WFO', 'MEMPERSIAPKAN MATERI SLIDE MR', '4', '', 1, 1),
(216, 38, 12, '2023-10-02', 'WFO', 'MEMBUAT VIDEO UNTUK MR', '4', '', 1, 1),
(217, 51, 7, '2023-10-02', 'WFO', 'Menyicil review dan susun makalah KM best practice proyek bendungan Ameroro.', '5', '', 1, 1),
(218, 51, 35, '2023-10-02', 'WFO', 'Koordinasi dengan BPK bersama MP proyek jalan Labuan Bajo.', '2', 'https://drive.google.com/open?id=1mu05n_ohf01cFLnc1gvFROFARmVBKMbg', 1, 1),
(219, 51, 27, '2023-10-02', 'WFO', 'Koordinasi rencana evaluasi RKP proyek infra 2', '1', '', 1, 1),
(220, 32, 35, '2023-10-02', 'WFA', 'Pemeliharaan proyek Goro-Muri', '3', 'https://drive.google.com/open?id=1pDMmOQMJEZsAoSHXkbGZHgR4YSmhr5Qi', 1, 1),
(221, 32, 35, '2023-10-02', 'WFA', 'Koordinasi terkait Dashboard', '1,5', '', 1, 1),
(222, 45, 7, '2023-10-02', 'WFO', 'Revisi penulisan ki/km kolaborasi divisi dengan proyek MUTIP', '6,5', '', 1, 1),
(223, 49, 27, '2023-10-02', 'WFO', 'Koordinasi KI KM dan RKP Proyek sumbu timur, Kalawara dan Bendungan Jenelata', '2', '', 1, 1),
(224, 49, 7, '2023-10-02', 'WFO', 'Menyusun dan Mencari refrensi KI KM proyek Sumbu timur', '4', 'https://drive.google.com/open?id=1_C2_p82JB_hndx7E7lHIbLW6Tifx0rg_', 1, 1),
(225, 49, 35, '2023-10-02', 'WFO', 'Koordinasi dengan BPKP untuk claim tahap 2 proyek Labuan Bajo', '2,5', '', 1, 1),
(226, 29, 2, '2023-10-02', 'WFO', 'Analisis kebutuhan pondasi tiang proyek jenelata', '8', '', 1, 1),
(227, 30, 2, '2023-10-02', 'WFO', 'Desain Pondasi Jembatan A100 Jenelata', '8', '', 1, 1),
(228, 46, 27, '2023-10-02', 'WFA', 'Review RKP', '1', '', 1, 1),
(229, 46, 7, '2023-10-02', 'WFA', 'Kolaborasi KI/KM', '4', '', 1, 1),
(230, 33, 2, '2023-10-02', 'WFA', 'Analisis dan persiapan data untuk report proyek tol IKN 3B', '3', 'https://drive.google.com/open?id=1jMr3IZZG7Y3xCynLs6Q4vZYnOMhngnvS', 1, 1),
(231, 33, 2, '2023-10-02', 'WFA', 'Permodelan dan analisis Trial Error Counterweigh protek dredging tursina', '5', 'https://drive.google.com/open?id=1vxmH-14elSa-aH6ilXbTkIN5zDMudCjo', 1, 1),
(232, 0, 7, '2023-10-02', 'WFA', 'revisi ppt dan word km proyek sei taiwan', '6', 'https://drive.google.com/open?id=1xzIDZcLzjAacVD1hD_5bYxgHWZXuitLK', 1, 1),
(233, 0, 2, '2023-10-02', 'WFA', 'backup data counter klaim vendor labuhan bajo', '3,5', '', 1, 1),
(234, 32, 2, '2023-10-02', 'WFA', 'Report Analisis Tol IKN 3B', '3', 'https://drive.google.com/open?id=1-nFu4yKdp04S6bzWk0l4_B6seVTY-1lb', 1, 1),
(235, 47, 35, '2023-10-02', 'WFO', '-koordinasi KIKM PKT Bontang\n-Baca-baca KIKM di KM MAPS', '3', 'https://drive.google.com/open?id=14MeB4_Mh1X-lBrxmwZLnCVKPH-2xbppT', 1, 1),
(236, 47, 35, '2023-10-02', 'WFO', '-Bantu cari Referensi penulisan Knowledge management proyek Keerom', '4', 'https://drive.google.com/open?id=1efZZPr5oqwW1WnKfvhSAr-3jmJ16d-z5', 1, 1),
(237, 28, 32, '2023-10-02', 'WFO', 'Workshop 32 K2R NEO 1.0', '4,5', 'https://drive.google.com/open?id=1Hr55miqyk50P1qu4-gH0_lUys5DR0Aig', 1, 1),
(238, 28, 35, '2023-10-02', 'WFO', 'Pembahasan Internal Back Up Klaim Proyek Kijing', '2,5', 'https://drive.google.com/open?id=13uM5tzIU0rQfsaiGXJc5PF8HmQeByT3V', 1, 1),
(239, 28, 2, '2023-10-02', 'WFO', 'Diskusi Slope Stability Proyek Dredging PKT dengan Tim Proyek', '1', '', 1, 1),
(240, 50, 28, '2023-10-02', 'WFO', 'Membaca artikel KI/KM', '5', '', 1, 1),
(241, 44, 35, '2023-10-02', 'WFO', 'Perbantuan Personil Administrasi FHO Sei Taiwan', '8', '', 1, 1),
(242, 42, 35, '2023-10-02', 'WFO', 'Mengikuti presentasi tender Pekerjaan Pembangunan Jembatan dan Jalan Elevated Kawasan Karawang, di hotel Kempinski', '5', '', 1, 1),
(243, 42, 32, '2023-10-02', 'WFO', 'Mengikuti workshop K2R Neo hari ke-2 : Modul 02 Sistem Perencana Akhir', '1', 'https://drive.google.com/open?id=1P5gkDHOq8x_62WG6xelh9wPR01JrjBJ8', 1, 1),
(244, 42, 32, '2023-10-02', 'WFO', 'Mengikuti workshop K2R Neo hari ke-2 : Modul 03 Peraturan Permainan', '1', 'https://drive.google.com/open?id=1N1tw0Eb0RMMy-Em96ArmqpDGJaw7H0mA', 1, 1),
(245, 42, 35, '2023-10-02', 'WFO', 'Ngobrol dengan Adkon (Pak Agus Istanto) tindaklanjut proses eskalasi proyek Bypass Banjarmasin', '0,5', '', 1, 1),
(246, 42, 35, '2023-10-02', 'WFO', 'Koordinasi dengan QS Pemasaran di lantai 11, tentang tender embung DAS Pamaluan', '0,5', '', 1, 1),
(247, 0, 29, '2023-10-03', 'WFA', 'zoom meeting betwork of asian river basin organization', '3,5', 'https://drive.google.com/open?id=15bosUNa9BBErXsobFkOkjPkytZwNkMnf', 1, 1),
(248, 37, 12, '2023-10-03', 'WFA', 'Koordinasi tim digimon terkait materi MR', '3', '', 1, 1),
(249, 37, 32, '2023-10-03', 'WFA', 'Koordinasi persiapan kompetisi dan workshop LC', '3', '', 1, 1),
(250, 37, 16, '2023-10-03', 'WFA', 'Meeeting dengan tim QSHEE terkait Trimble Program', '1,5', 'https://drive.google.com/open?id=1J4bIBv-FM2n3Gel0fH3gKIVNKmcOWSSO', 1, 1),
(251, 37, 11, '2023-10-03', 'WFA', 'Diskusi dengan pak media terkait program strategis', '1', '', 1, 1),
(252, 39, 11, '2023-10-03', 'WFO', 'Membuat RAB Sub Divisi Engineering & Rapat Koordinasi Digimon', '4', '', 1, 1),
(253, 39, 29, '2023-10-03', 'WFO', 'FGD Software Trimble & Monitoring Dampak BIM', '4', '', 1, 1),
(254, 49, 29, '2023-10-03', 'WFO', 'Zoom sharing is caring change agent', '1,5', 'https://drive.google.com/open?id=1QkfbTVbipo8Qgye1jGn32F2sLRlgbU5j', 1, 1),
(255, 48, 27, '2023-10-03', 'WFA', 'Mempelajari RKP Juni Proyek IKN Tol untuk persiapan pembahasan update RKP oktober', '8', 'https://drive.google.com/open?id=16-D2_X_M9QRpc1BTXom_-IfXJ62wjOHS', 1, 1),
(256, 0, 2, '2023-10-03', 'WFA', 'counter data klaim vendor', '2,5', '', 1, 1),
(257, 46, 7, '2023-10-03', 'WFA', 'Monitoring dan kolaborasi KI/KM', '4', '', 1, 1),
(258, 46, 27, '2023-10-03', 'WFA', 'Monitoring RKP', '1', '', 1, 1),
(259, 51, 29, '2023-10-03', 'WFO', 'Mengikuti webinar Network Of Asian River Basin Organization', '3', 'https://drive.google.com/open?id=1oR0RlvR6_og5UBYqAvFrdPy8yaGgGF5v', 1, 1),
(260, 51, 7, '2023-10-03', 'WFO', 'Suppirt review dan merapihkan knowledge management proyek Ameroro.', '5', '', 1, 1),
(261, 45, 7, '2023-10-03', 'WFO', 'penyiapan PPT ki/km kolaborasi dengan proyek MUTIP', '3,5', '', 1, 1),
(262, 45, 7, '2023-10-03', 'WFO', 'Revisi penulisan ki/km kolaborasi divisi dengan proyek MUTIP', '3,5', '', 1, 1),
(263, 33, 29, '2023-10-03', 'WFA', 'Kegiatan Sharing Cange Agent', '2', 'https://drive.google.com/open?id=1D8RPJADsvtYXogPHWuMivCP3a1XJ-hJM', 1, 1),
(264, 33, 11, '2023-10-03', 'WFA', 'Koordinasi terkait isi dan desain tampilan dashboard design dan analisis', '2', 'https://drive.google.com/open?id=147SA5m1CeSGnFPfPyKEFgzIynq0CpwOx', 1, 1),
(265, 33, 2, '2023-10-03', 'WFA', 'Analisis Trial Counterweight dredging tursina', '4', 'https://drive.google.com/open?id=1B5lJCl677qgwmZjFfsDK-cwUU036MaVN', 1, 1),
(266, 29, 13, '2023-10-03', 'WFO', 'Diskusi Dashboard monitoring pekerjaan engineering desain dan analisis', '2', 'https://drive.google.com/open?id=10OQKr6GgvCIxGJz6a5oW5cD_pBODyxGk', 1, 1),
(267, 30, 13, '2023-10-03', 'WFO', 'Dashboard DESIS', '2', 'https://drive.google.com/open?id=10OQKr6GgvCIxGJz6a5oW5cD_pBODyxGk', 1, 1),
(268, 0, 29, '2023-10-03', 'WFA', 'Narbo 3rd webinar (road to the 10th world water forum 2024', '3', 'https://drive.google.com/open?id=1YmaznisvCdrvE4-rFaWg0zH_KCnfPkPu', 1, 1),
(269, 0, 11, '2023-10-03', 'WFA', 'kordinasi internal diruangan GM3 lt10', '1', '', 1, 1),
(270, 0, 7, '2023-10-03', 'WFA', 'revisi ppt & word km proy sei taiwan', '3', 'https://drive.google.com/open?id=1JtppYIdD87Rywsb2UOwbrRADCP9UJ1gp', 1, 1),
(271, 49, 7, '2023-10-03', 'WFO', 'Menyusun dan Mencari refrensi KI KM proyek Sumbu timur, koordinasi dengan proyek Kalawara', '5', '', 1, 1),
(272, 38, 20, '2023-10-03', 'WFO', 'membuatmateri MR dan dashboard', '7', '', 1, 1),
(273, 29, 2, '2023-10-03', 'WFO', 'Analisis kebutuhan pondasi tiang jembatan proyek jenelata', '7', '', 1, 1),
(274, 30, 2, '2023-10-03', 'WFO', 'Desain Pondasi Jembatan A100 Jenelata', '7', '', 1, 1),
(275, 30, 35, '2023-10-03', 'WFO', 'Sharing Session Change Agent DOP 1', '2', '', 1, 1),
(276, 32, 35, '2023-10-03', 'WFA', 'Koordinasi team analisis desain dan membahas dashboard', '2', 'https://drive.google.com/open?id=1Nv7oDywU8Auq6Ds-kodq6PYHZ16Qw0iJ', 1, 1),
(277, 32, 9, '2023-10-03', 'WFA', 'Webinar 3rd NARBO', '4', 'https://drive.google.com/open?id=1Ehko1W5NukMeCeGGOTn5BhJaR99LzXXS', 1, 1),
(278, 32, 2, '2023-10-03', 'WFA', 'Report IKN 3B Rev', '1,5', '', 1, 1),
(279, 47, 27, '2023-10-03', 'WFO', '-Koordinasi mengenai KIKN,RKP dengan proyek Keerom\n-Bantu penulisan KIKM proyek Keerom', '4', 'https://drive.google.com/open?id=1-xrjf2LgizWMK_5NA59yRjpetMBdrnUs', 1, 1),
(280, 28, 24, '2023-10-03', 'WFO', 'Rapat Finalisasi Prosedur Konstruksi dan Commisioning Rev. 01 (Alignment dengan IK Progress Opname Penyedia) dengan TPSM Konstruksi', '2,5', 'https://drive.google.com/open?id=1-vF5FGWBGfHlXxbexYkjUgGt7QF0gyHU', 1, 1),
(281, 28, 32, '2023-10-03', 'WFO', 'Workshop 32 K2R NEO 1.0', '3,5', 'https://drive.google.com/open?id=1rLDMa80SfRw_lNugef6WhgUj9X-M8kTV', 1, 1),
(282, 28, 35, '2023-10-03', 'WFO', 'Review Draft Presentasi Meeting Klarifikasi Tol Kediri - Bandara Dhoho', '3', '', 1, 1),
(283, 44, 32, '2023-10-03', 'WFA', 'Koordinasi persiapan kompetisi dan workshop LC', '3', '', 1, 1),
(284, 44, 35, '2023-10-03', 'WFO', 'perbantuan personil Administrasi FHO Sei Taiwan', '5', '', 1, 1),
(285, 50, 28, '2023-10-03', 'WFO', 'Membaca artikel KI/KM', '5', '', 1, 1),
(286, 42, 32, '2023-10-03', 'WFO', 'Mengikuti workshop K2R Neo hari ke-3 : Modul 03 Camp', '2', 'https://drive.google.com/open?id=1r72TARWZXQ2OkcmPwPlodLJ9YGEGSL62', 1, 1),
(287, 42, 24, '2023-10-03', 'WFO', 'Koordinasi program kerja sistem engineering dengan expert & koordinator', '1,5', '', 1, 1),
(288, 42, 32, '2023-10-03', 'WFO', 'Koordinasi persiapan lomba K2R (akomodasi, pembagian anggota tim, teknik kompetisi, dll)', '2', '', 1, 1),
(289, 42, 35, '2023-10-03', 'WFO', 'Koordinasi dengan QS Pemasaran di lantai 11, subkon perkuatan tebing (Interlocking Permeable Revetment)', '0,5', '', 1, 1),
(290, 0, 31, '2023-10-04', 'WFA', 'Apel Pagi Sistem Eng & 32 29 Sept 2023', '0,5', 'https://drive.google.com/open?id=1UUuduZwL-YY6FEl7UO8HBmEp5_iqIH1B', 1, 1),
(291, 45, 35, '2023-10-04', 'WFO', 'zoom apel pagi pembahasan KI/KM, Review RKP', '1', '', 1, 1),
(292, 0, 24, '2023-10-04', 'WFA', 'SOSIALISASI RE-ALIGNMENT PROSEDUR SISTEM MANAJEMEN, SMAP, DAN SMP', '2,5', 'https://drive.google.com/open?id=1wYigzB-UdnMcmKnQF7t6Cmz72B3tDY7_', 1, 1),
(293, 48, 24, '2023-10-04', 'WFA', 'Zoom Sosialisasi Re-Aligment Prosedur Sistem Manajemen SMAP dan SMP', '2', 'https://drive.google.com/open?id=19rYa0m4kh5upI-wEPMCGg9i4iTm0VmF-', 1, 1),
(294, 48, 7, '2023-10-04', 'WFA', 'KM - Digitalisasi Dalam Kegiatan Oprasional di Proyek Menggunakan Software Open-Source', '2', 'https://drive.google.com/open?id=1l1A9qn-h90cIn-cfv1HEeVzmdWvgcjW8', 1, 1),
(295, 33, 29, '2023-10-04', 'WFA', 'ZOOM SOSIALISASI RE-ALIGNMENT PROSEDUR SISTEM MANAJEMEN, SMAP, DAN SMP', '2', 'https://drive.google.com/open?id=12DfMHGg9j1pMx6l6CERuwZcZEz6hzchV', 1, 1),
(296, 33, 35, '2023-10-04', 'WFA', 'Membuat Paparan Terkait Perkembangan Progres Eskalasi Proyek Bajo', '2', 'https://drive.google.com/open?id=1zxsiYs_snlOrL2HGhAyj4uCRsnHfv5H5', 1, 1),
(297, 37, 35, '2023-10-04', 'WFA', 'Sosialisasi Prosedur Sistem Manajemen Mutu, Anti Penyuapan dan Pengamanan', '2', 'https://drive.google.com/open?id=1ehKjkMv6v3U-ua9mAzTUQ1wYuZCD0rXd', 1, 1),
(298, 37, 16, '2023-10-04', 'WFA', 'Podcast infra 2', '4', 'https://drive.google.com/open?id=1FALTDFDd14p60uIEDoh8tFNIxC5AxQIQ', 1, 1),
(299, 48, 29, '2023-10-04', 'WFA', 'Webinar: Inovasi Teknologi Konstuksi Lepas Pantai Yang Ramah Lingkungan - PII', '2,5', 'https://drive.google.com/open?id=1GYs55XaSuLY0ePc21F4CDGoCNwcYeO6S', 1, 1),
(300, 51, 26, '2023-10-04', 'WFO', 'Koordinasi internal sistem Engineering', '1,5', 'https://drive.google.com/open?id=125128Qd22_QnHVAWOu_-KFwbXZfIdaHW', 1, 1),
(301, 51, 29, '2023-10-04', 'WFO', 'Mengikuti zoom sosialisasi SMW', '2', 'https://drive.google.com/open?id=1Xv4eNCDj54bIOb4Bx8PEoCkBeJWcd9tn', 1, 1),
(302, 51, 27, '2023-10-04', 'WFO', 'Koordinasi dengan Eng proyek Ameroro dan Gumbasa untuk paparan evaluasi Eng september 2023.', '1,5', '', 1, 1),
(303, 51, 7, '2023-10-04', 'WFO', 'Support review dan penyusunan KM proyek bendungan Ameroro', '3', 'https://drive.google.com/open?id=1hxlYHkdM1b5-VoPRSrzXs5VblWiYwXJD', 1, 1),
(304, 37, 35, '2023-10-04', 'WFA', 'Koordinasi dengan QSHE infra 2 terkait penilaian akhlak', '1', '', 1, 1),
(305, 37, 14, '2023-10-04', 'WFA', 'Updating data time manajemn', '1', '', 1, 1),
(306, 45, 35, '2023-10-04', 'WFO', 'zoom SOSIALISASI RE-ALIGNMENT PROSEDUR SISTEM MANAJEMEN, SMAP, DAN SMP', '2', '', 1, 1),
(307, 48, 35, '2023-10-04', 'WFA', 'Kordinasi update RKP oktober ke PIC Poyek IKN Tol dan Bendungan Pamukkulu', '1,5', '', 1, 1),
(308, 45, 7, '2023-10-04', 'WFO', 'Review KI/KM', '3,5', '', 1, 1),
(309, 0, 11, '2023-10-04', 'WFA', 'apel pagi sistem eng dan 32', '1', 'https://drive.google.com/open?id=1v8sfgCPkuP5auZd5CYNhhNY6k0oAG5tp', 1, 1),
(310, 0, 29, '2023-10-04', 'WFA', 'sosialisasi re-aligment prosedur sistem manajemen, smap, dan smp', '3', 'https://drive.google.com/open?id=1F8XmVsp8aaynmTQNcDprg8Y8G0cG9FU8', 1, 1),
(311, 0, 7, '2023-10-04', 'WFA', 'kordinasi ki/km proy rjn kalbar', '3', 'https://drive.google.com/open?id=129OoCbomiaDSTmPo-zAIZpkIUX_-ybuc', 1, 1),
(312, 49, 29, '2023-10-04', 'WFO', 'Menyusun dan Mencari refrensi KI KM proyek Sumbu timur', '5', '', 1, 1),
(313, 49, 29, '2023-10-04', 'WFO', 'Rakor harian sistem engineering dan 32', '1', '', 1, 1),
(314, 49, 29, '2023-10-04', 'WFO', 'Zoom Sosialisasi prosedur baru SMW wika', '3', '', 1, 1),
(315, 39, 11, '2023-10-04', 'WFO', 'Membuat podcast Dialog Infra 2 2 Episode', '4', 'https://drive.google.com/open?id=1sFx8LxJZSzHluwSK5ixQVebDwL_bXeiP', 1, 1),
(316, 39, 29, '2023-10-04', 'WFO', 'Revisi Format Software Controlling SDE Infra 2 & Notulen Rakor', '4', '', 1, 1),
(317, 46, 11, '2023-10-04', 'WFA', 'SOSIALISASI RE-ALIGNMENT PROSEDUR SISTEM MANAJEMEN, SMAP, DAN SMP', '3', '', 1, 1),
(318, 46, 7, '2023-10-04', 'WFA', 'kolaborasi KI/KM proyek infra 2', '2', '', 1, 1),
(319, 38, 11, '2023-10-04', 'WFO', 'persiapan dan pelaksanaan program podcast', '8', '', 1, 1),
(320, 47, 35, '2023-10-04', 'WFO', 'Zoom Sosialisasi prosedur sistem manajemen mutu,anti penyuapan dan pengamanan', '2', 'https://drive.google.com/open?id=1JwoBGID-Q4vdfqsOUaKLbnIIMYg26rus', 1, 1),
(321, 33, 29, '2023-10-04', 'WFA', 'Webinar Inovasi Teknologi Konstruksi Lepas Pantai oleh PII', '3', 'https://drive.google.com/open?id=1P5jyDJxeELI_jYk2PGUV1KnufkvvJSw4', 1, 1),
(322, 32, 10, '2023-10-04', 'WFA', 'Pembuatan Bank Data Soil Investigation', '6,5', 'https://drive.google.com/open?id=1fSg2zWTW6f1F6WR0N8V4cXUeeSFus0DV', 1, 1),
(323, 32, 35, '2023-10-04', 'WFA', 'Koordinasi team lapangan Goro-Muri untuk pemeliharan', '1,5', '', 1, 1),
(324, 29, 2, '2023-10-04', 'WFO', 'Meeting dengan tim proyek tol IKN', '2', 'https://drive.google.com/open?id=12bYY0Dzg2ExBYvqpjiEIfelNyCXFetkd', 1, 1),
(325, 30, 2, '2023-10-04', 'WFO', 'Meeting dengan tim proyek tol IKN', '2', 'https://drive.google.com/open?id=12bYY0Dzg2ExBYvqpjiEIfelNyCXFetkd', 1, 1),
(326, 29, 2, '2023-10-04', 'WFO', 'Analisis kebutuhan pondasi proyek jenelata', '7', '', 1, 1),
(327, 30, 2, '2023-10-04', 'WFO', 'Desain Pondasi Jembatan A100 Jenelata', '7', '', 1, 1),
(328, 47, 35, '2023-10-04', 'WFO', 'Baca-baca prosedur manajemen proyek', '2', 'https://drive.google.com/open?id=1OyOrleVnZ0ZMPU4JPy_JixVOVu9QXYrV', 1, 1),
(329, 28, 35, '2023-10-04', 'WFO', 'Mengikuti Teams Sharing is Caring CA DOP 1', '1', '', 1, 1),
(330, 28, 27, '2023-10-04', 'WFO', 'Apel Pagi Sistem Engineering dan 32', '0,5', '', 1, 1),
(331, 28, 24, '2023-10-04', 'WFO', 'Sosialisasi Prosedur Sistem Manajemen Mutu, Sistem Manajemen Pengamanan, dan Sistem Manajemen Anti Penyuapan', '2,5', '', 1, 1),
(332, 28, 24, '2023-10-04', 'WFO', 'Update monitoring seluruh prosedur WIKA dan memasukkan sebagian ke dalam sharepoint', '4', 'https://drive.google.com/open?id=1HaXyQqtFZVOpVKqCa4TztXPqywl3BD6H', 1, 1),
(333, 50, 35, '2023-10-04', 'WFO', 'Zoom Sosialisasi Re-alignment prosedur system manajemen, SMAP dan SMP\nMembaca Artikel KI/KM', '6', '', 1, 1),
(334, 42, 27, '2023-10-04', 'WFO', 'Zoom apel pagi sistem engineering & LC', '1', 'https://drive.google.com/open?id=1ORkLWAE1HpiF5RTPPch7jIMMNDjicN-_', 1, 1),
(335, 42, 24, '2023-10-04', 'WFO', 'Mengikuti SOSIALISASI RE-ALIGNMENT PROSEDUR SISTEM MANAJEMEN MUTU, SMAP, DAN SMP', '2', 'https://drive.google.com/open?id=1kWBbIy4at9ggAKz_CRQKbV0lpxg06Qij', 1, 1),
(336, 42, 32, '2023-10-04', 'WFO', 'Diskusi teknik permainan K2R & mempersiapkan materi utk koordinasi esoknya', '1,5', '', 1, 1),
(337, 42, 26, '2023-10-04', 'WFO', 'Membaca IK metode pelaksanaan & IK pembuatan metode kerja standar', '1', '', 1, 1),
(338, 42, 35, '2023-10-04', 'WFO', 'Sharing dengan tim proyek Sei Taiwan (tindaklanjut masalah yang outstanding)', '0,5', '', 1, 1),
(339, 45, 35, '2023-10-05', 'WFO', 'zoom review RKP BAB3 enjinering dengan proyek bendungan Ameroro', '2', '', 1, 1),
(340, 37, 32, '2023-10-05', 'WFA', 'Koordinasi persiapan kompetisi LC', '1', '', 1, 1),
(341, 37, 27, '2023-10-05', 'WFA', 'RKP ameroro', '2', '', 1, 1),
(342, 37, 14, '2023-10-05', 'WFA', 'Updating data frame time', '2', '', 1, 1),
(343, 37, 16, '2023-10-05', 'WFA', 'Evaluasi implementasi BIM proyek Ameroro', '1,5', 'https://drive.google.com/open?id=1apiqTBuVpZMOvzBzSStKseSMH_rOIPHh', 1, 1),
(344, 48, 27, '2023-10-05', 'WFA', 'Zoom Evalwasi Perencanaan dan Pengendalian Eng. Proyek Ameroro', '2', 'https://drive.google.com/open?id=1jnJfPQes8xMWTvI0wc1ej5Qu4Usqids-', 1, 1),
(345, 48, 35, '2023-10-05', 'WFA', 'Mempelajari KM Implementasi Digitalisasi Terhadap Customer Lingkungan WIka', '2', 'https://drive.google.com/open?id=1t54AuzAo0pfbYsIikIV21c1Lw0Mf2vKN', 1, 1),
(346, 48, 35, '2023-10-05', 'WFA', 'Mempelajari KM Perencanaan izin online menggunakan layanan google', '2', 'https://drive.google.com/open?id=1NH6ibRLOX12d1jZfHy6xyRVu5nBzUwhU', 1, 1),
(347, 46, 27, '2023-10-05', 'WFA', 'zoom review RKP proyek infra 2', '4,5', '', 1, 1),
(348, 0, 0, '2023-10-05', 'WFA', 'zoom meeting Evaluasi Perencanaan & Pengendalian Engineering Sept 2023 Proyek gumbasa', '2', 'https://drive.google.com/open?id=1A-bHeFUAojLKeeBJQATZnw9uaVV8s_OH', 1, 1),
(349, 48, 27, '2023-10-05', 'WFA', 'Zoom Evalwasi Perencanaan dan Pengndalian Eng. Proyek Irigasi Gumbasa', '2', 'https://drive.google.com/open?id=1jhATS7MOHAQeHuBaqY2XkVU_Yrb1KLhT', 1, 1),
(350, 45, 35, '2023-10-05', 'WFO', 'Pengecekan pengiriman review RKP MUTIP', '2,5', '', 1, 1),
(351, 45, 35, '2023-10-05', 'WFO', 'Zoom Review RKP dengan proyek Irigasi Gumbasa', '2', '', 1, 1),
(352, 51, 27, '2023-10-05', 'WFO', 'Zoom evaluasi perencanaan & pengendalian engineering proyek Ameroro', '2', 'https://drive.google.com/open?id=1Cfs7cbZNb3w2kF8pYqyNevOCmzT9jk6Z', 1, 1),
(353, 51, 27, '2023-10-05', 'WFO', 'Zoom evaluasi perencanaan & pengendalian engineering proyek Gumbasa', '2', 'https://drive.google.com/open?id=1Wj5JY9CkSFAuh6BxUkZlMbYqRdrj4knw', 1, 1),
(354, 51, 27, '2023-10-05', 'WFO', 'Menyusun form evaluasi eng Ameroro september 2023', '4', '', 1, 1),
(355, 47, 35, '2023-10-05', 'WFO', 'Zoom evaluasi pengendalian engineering proyek Bendungan Ameroro', '2', 'https://drive.google.com/open?id=1hm9llKO9gssTh6BkkDQWN58IEwoDlK4n', 1, 1),
(356, 47, 27, '2023-10-05', 'WFO', 'Zoom evaluasi pengendalian engineering proyek Irigasi Gumbasa', '2', 'https://drive.google.com/open?id=1Rj3QJOIbMJRjAqWHFGLtOuBk_1ou9vsX', 1, 1),
(357, 0, 27, '2023-10-05', 'WFA', 'Zoom Review RKP BAB III proyek Ameroro', '2', 'https://drive.google.com/open?id=1ebeSGPvM2EcIqwJlHYNAB4_OAzRw9nO6', 1, 1),
(358, 0, 27, '2023-10-05', 'WFA', 'Zoom Review RKP BAB III proyek Gumbasa', '2', 'https://drive.google.com/open?id=1QzfEeuyi5MyEuRGtkD0ZUFZqOpzzl2Wh', 1, 1),
(359, 0, 35, '2023-10-05', 'WFA', 'kordinasi proyek tursina terkait format riview RKP BAB III', '1', '', 1, 1),
(360, 0, 35, '2023-10-05', 'WFA', 'Kordinasi tenaga lokal terkait pemeliharaan proyek sei taiwan', '1', '', 1, 1),
(361, 33, 27, '2023-10-05', 'WFA', 'Riset Materi, Belajar dan Membuat Materi untuk kegiatan SMT Infra 2', '8', 'https://drive.google.com/open?id=1Vm-3mOmADvRdZtR_AlxDRfrOzjRiCZ3A', 1, 1),
(362, 32, 27, '2023-10-05', 'WFA', 'Review RKP Proyek Bendungan Ameroro', '2', 'https://drive.google.com/open?id=17mC1FS6sRIEBZLrX465651F3ku0zNbND', 1, 1),
(363, 32, 35, '2023-10-05', 'WFA', 'Review RKP Proyek Gungbasa', '2', 'https://drive.google.com/open?id=1wJskda79xt43jwdm3AqKj35Ae8AL2TB8', 1, 1),
(364, 32, 10, '2023-10-05', 'WFA', 'Bank Data Soil Investigation', '2,5', 'https://drive.google.com/open?id=1uC_gv8b6IQGNiD8tV5Lc3CKIZ4RQhKh1', 1, 1),
(365, 32, 35, '2023-10-05', 'WFA', 'Koordinasi dengan Kontraktor Lokal Papua untuk mengambil material di quary dalam rangka pemeliharaan proyek Goro-Muri', '1,5', '', 1, 1),
(366, 49, 27, '2023-10-05', 'WFO', 'zoom review RKP BAB3 enjinering dengan proyek bendungan Ameroro', '2', '', 1, 1),
(367, 49, 27, '2023-10-05', 'WFO', 'Zoom Review RKP dengan proyek Irigasi Gumbasa', '2', '', 1, 1),
(368, 49, 7, '2023-10-05', 'WFO', 'koordinasi penulisan KM proyek sumbu timur', '3', '', 1, 1),
(369, 38, 20, '2023-10-05', 'WFO', 'Membuat dashboard', '8', '', 1, 1),
(370, 39, 29, '2023-10-05', 'WFO', 'Perbaikan Lisensi Software & Evaluasi RKP Ameroro', '4', '', 1, 1),
(371, 39, 16, '2023-10-05', 'WFO', 'Pendampingan BIM Ameroro & kordinasi digitalisasi', '4', '', 1, 1),
(372, 29, 2, '2023-10-05', 'WFO', 'Meeting dengan tim Proyek SPAM IKN', '2', 'https://drive.google.com/open?id=1kzIZwbBauWKSPD7c74J53Tn0cGO9UOTg', 1, 1),
(373, 30, 2, '2023-10-05', 'WFO', 'Metode Kerja Shaft IPAL IKN', '2', 'https://drive.google.com/open?id=1kzIZwbBauWKSPD7c74J53Tn0cGO9UOTg', 1, 1),
(374, 37, 32, '2023-10-05', 'WFA', 'Koordinasi persiapan kompetisi LC', '1,5', '', 1, 1),
(375, 29, 35, '2023-10-05', 'WFA', 'Menghadiri undangan freissynet mewakili DIROP 1', '6', '', 1, 1),
(376, 30, 35, '2023-10-05', 'WFA', 'Mengurus Perpanjangan SKK Ahli Muda K3 Konstruksi', '6', '', 1, 1),
(377, 47, 35, '2023-10-05', 'WFO', 'Apel Sub eng infra 2', '1', 'https://drive.google.com/open?id=1qMPMe3IsjHtahR6rFFN0vGxLPquEz5sd', 1, 1),
(378, 47, 35, '2023-10-05', 'WFO', 'Apel pagi Sub eng infra 2', '1', 'https://drive.google.com/open?id=1It-dZKlFumlIz4T-j6AC-dVnvSAM5FcS', 1, 1),
(379, 28, 35, '2023-10-05', 'WFO', 'Kick Off Meeting Program Wellness Kesehatan', '4', '', 1, 1),
(380, 28, 32, '2023-10-05', 'WFO', 'Persiapan Lomba K2R NEO 1.0', '2,5', '', 1, 1);
INSERT INTO `engineering_activity` (`id_engineering_activity`, `id_user`, `id_kategori_pekerjaan`, `tanggal_masuk_kerja`, `status_kerja`, `judul_pekerjaan`, `durasi`, `evidence`, `checked`, `validasi`) VALUES
(381, 28, 27, '2023-10-05', 'WFO', 'Zoom Evaluasi Perencanaan dan Pengendalian RKP Bab 3 Engineering Proyek Irigasi Gumbasa', '1,5', 'https://drive.google.com/open?id=1JMMYNx_O8kzBrxvVKA7X8eqhp0NM9Wak', 1, 1),
(382, 50, 27, '2023-10-05', 'WFO', 'Zoom evaluasi engineering Bendungan Ameroro\nZoom evaluasi engineering Proyek Irigasi Gumbasa', '6', '', 1, 1),
(383, 42, 32, '2023-10-05', 'WFO', 'Rapat koordinasi zoom, pelaksanaan lomba K2R', '1', 'https://drive.google.com/open?id=1lN5smhKW0f8vAXTk3_pR1zhENdU_U87C', 1, 1),
(384, 42, 27, '2023-10-05', 'WFO', 'Zoom Evaluasi Perencanaan & Pengendalian Engineering Sept 2023 Proyek Ameroro', '2', 'https://drive.google.com/open?id=1kEvUh41yfbbkSYirhPyYl82Ngr4ezjKl', 1, 1),
(385, 42, 32, '2023-10-05', 'WFO', 'Persiapan simulasi untuk kompetisi K2R (persiapan perlengkapan lego)', '2', '', 1, 1),
(386, 42, 27, '2023-10-05', 'WFO', 'Zoom Evaluasi Perencanaan & Pengendalian Engineering Sept 2023 Proyek Irigasi Gumbasa', '1', 'https://drive.google.com/open?id=17oU14rGVTK-gsgV2IlM4TvkVysY-TEwz', 1, 1),
(387, 33, 29, '2023-10-06', 'WFA', 'Sosialisasi Re-Aligment Prosedur KM / KI', '2', 'https://drive.google.com/open?id=1Sf_9S4TuU8Fa5yaPjwTQPPYTogESXwzH', 1, 1),
(388, 0, 24, '2023-10-06', 'WFA', 'zoom meeting SOSIALISASI RE-ALIGNMENT PROSEDUR KNOWLEDGE MANAGEMENT, KARYA INOVASI, PELAKSANAAN BENCHMARKING DAN PROSEDUR PENELITIAN PENGEMBANGAN', '2', 'https://drive.google.com/open?id=1S0iOyQ2q-sv2UogW-T1kmaSnkMIZOva_', 1, 1),
(389, 48, 7, '2023-10-06', 'WFA', 'Sosialisasi re sligment prosedur managemen karya inovasi pelaksanaan dan prosedur penelitian', '2', 'https://drive.google.com/open?id=1woASNnUV7pVjHV8jwGxrnZ6B3OR_HWS5', 1, 1),
(390, 45, 35, '2023-10-06', 'WFO', 'Zoom SOSIALISASI HASIL RE-ALIGNMENT PROSEDUR HUMAN CAPITAL', '2', '', 1, 1),
(391, 45, 35, '2023-10-06', 'WFO', 'pengecekan hasil PPT dan form Review RKP BAB3 engjinering proyek MUTIP', '2,5', '', 1, 1),
(392, 45, 35, '2023-10-06', 'WFO', 'Zoom SOSIALISASI RE-ALIGNMENT PROSEDUR KNOWLEDGE MANAGEMENT, KARYA INOVASI, PELAKSANAAN BENCHMARKING DAN PROSEDUR PENELITIAN PENGEMBANGAN', '2', '', 1, 1),
(393, 45, 7, '2023-10-06', 'WFO', 'Revisi Penulisan KI/KM dan PPT presentasi kolaborasi divisi dengan Proyek MUTIP', '1', '', 1, 1),
(394, 49, 29, '2023-10-06', 'WFO', 'zoom meeting SOSIALISASI RE-ALIGNMENT PROSEDUR KNOWLEDGE MANAGEMENT, KARYA INOVASI, PELAKSANAAN BENCHMARKING DAN PROSEDUR PENELITIAN PENGEMBANGAN', '2', '', 1, 1),
(395, 48, 29, '2023-10-06', 'WFA', 'Webinar SistemModular Pada Pekerjaan Galian Tanah Dan Basemant', '2', 'https://drive.google.com/open?id=1pILcM98WPQhBWQIQaqOryQgmDzrpHq1G', 1, 1),
(396, 48, 35, '2023-10-06', 'WFA', 'Zoom SOSIALISASI HASIL RE-ALIGNMENT PROSEDUR HUMAN CAPITAL', '2', 'https://drive.google.com/open?id=1PoIi5coLBE05u3Th14yJc5sCSGlhP-HM', 1, 1),
(397, 48, 27, '2023-10-06', 'WFA', 'Collecting Data dan Uploading Data Proyek Pamukkulu', '2', 'https://drive.google.com/open?id=1htwWQiWAZGggdD8CWcvZe5JALtBQmmkV', 1, 1),
(398, 0, 24, '2023-10-06', 'WFA', 'SOSIALISASI HASIL RE-ALIGNMENT PROSEDUR HUMAN CAPITAL\n\n', '2', 'https://drive.google.com/open?id=1E8WvXUt223J0bEJMLAquzo_qrnbbJbSS', 1, 1),
(399, 0, 29, '2023-10-06', 'WFA', 'Webinar PENGGUNAAN SISTEM STRUTTING MODULAR PADA PEKERJAAN GALIAN TANAH DAN BASEMENT\n\n', '3', 'https://drive.google.com/open?id=1pmBvG7FaedsLY4u40io13uRPhR436lkN', 1, 1),
(400, 39, 11, '2023-10-06', 'WFO', 'Pengisian Implementasi BIM Infra 2 & Persiapan MTE Oktober', '4', '', 1, 1),
(401, 39, 35, '2023-10-06', 'WFO', 'Revisi Administrasi Sei Taiwan', '3', '', 1, 1),
(402, 49, 29, '2023-10-06', 'WFO', 'zooom sosialisasi prosedur human capital', '2', '', 1, 1),
(403, 51, 29, '2023-10-06', 'WFO', 'Mengikuti sosialisasi hasil re-alignment prosedur Human Capital.', '2', 'https://drive.google.com/open?id=1wLfPbtenC26Qjyu4IJTJXVGFXvnoeGyo', 1, 1),
(404, 51, 29, '2023-10-06', 'WFO', 'Mengikuti sosialiasi prosesur Knowledge Management dan Karya Inovasi.', '2', 'https://drive.google.com/open?id=1FL49THkiSB6aDW1B1LNf-7cXDHuxMRLX', 1, 1),
(405, 51, 27, '2023-10-06', 'WFO', 'Review dan penyusunan evaluasi RKP BAB 3 september proyek Gumbasa.', '4', '', 1, 1),
(406, 46, 11, '2023-10-06', 'WFA', 'Zoom sosialisasi re-aligment prosedur knowledge manajemen,karya inovasi,pelaksanaan benchmarking dan prosedur penelitian pengembangan', '3', '', 1, 1),
(407, 46, 7, '2023-10-06', 'WFA', 'Monitoring KI/KM proyek infra 2', '2', '', 1, 1),
(408, 32, 35, '2023-10-06', 'WFA', 'SOSIALISASI RE-ALIGNMENT PROSEDUR KNOWLEDGE MANAGEMENT, KARYA INOVASI, PELAKSANAAN BENCHMARKING DAN PROSEDUR PENELITIAN PENGEMBANGAN', '2', 'https://drive.google.com/open?id=1GV3EdmlNIXyqahh6ZxX4QzXBTaMIqr1h', 1, 1),
(409, 32, 35, '2023-10-06', 'WFA', 'SOSIALISASI HASIL RE-ALIGNMENT PROSEDUR HUMAN CAPITAL', '2', 'https://drive.google.com/open?id=1gFwuxQphcsmgwlWdyjsvyL931LK1H0oX', 1, 1),
(410, 32, 35, '2023-10-06', 'WFA', 'SOSIALISASI RE-ALIGNMENT PROSEDUR KNOWLEDGE MANAGEMENT, KARYA INOVASI, PELAKSANAAN BENCHMARKING DAN PROSEDUR PENELITIAN PENGEMBANGA', '3,5', 'https://drive.google.com/open?id=1C7E14a_ljAVQ5bL-Un_cJGbkYvEde79H', 1, 1),
(411, 47, 35, '2023-10-06', 'WFO', 'Zoom Sosialisasi prosedur Karya Inovasi,Knowledge management', '2', 'https://drive.google.com/open?id=1VeTSdiviy7Pixwf_S2XJh9eQ3oi0cjOs', 1, 1),
(412, 47, 35, '2023-10-06', 'WFO', 'Zoom sosialisasi prosedur human capital', '2', 'https://drive.google.com/open?id=1DUjmconJw_H-Ev7rKqFWl7dvbQr-Kt5X', 1, 1),
(413, 37, 32, '2023-10-06', 'WFA', 'Workshop LC di ITB', '8', '', 1, 1),
(414, 33, 29, '2023-10-06', 'WFA', 'Webinar Struting Tanah', '2,5', 'https://drive.google.com/open?id=1bqIEyn3AZ9d3FDY1DAu3qOMp71BgQyvw', 1, 1),
(415, 33, 29, '2023-10-06', 'WFA', 'Sosialisasi Re-Aligmnet Sosialisasi Prosedur HC', '2', '', 1, 1),
(416, 33, 35, '2023-10-06', 'WFA', 'Finishing Materi SMT', '1,5', 'https://drive.google.com/open?id=1nfWXXcG-WuAAZjD1tmpalc7etd_zY60s', 1, 1),
(417, 34, 2, '2023-10-06', 'WFO', 'Pembuata Laporan CAR Terkait Analisa Stabilitas Lereng Underpass Tatakan 101', '3', 'https://drive.google.com/open?id=14Cy42SVEZ2-Nhbbi6FUJ0SbMK-rj1Mxy', 1, 1),
(418, 49, 24, '2023-10-06', 'WFO', 'Mempelajari IK metode kerja', '3', '', 1, 1),
(419, 34, 35, '2023-10-06', 'WFO', 'SOSIALISASI HASIL RE-ALIGNMENT PROSEDUR HUMAN CAPITAL', '2', 'https://drive.google.com/open?id=1xUvqWdvn5PHMq-SVOFPObtgcvbEXK3au', 1, 1),
(420, 30, 35, '2023-10-06', 'WFO', 'SOSIALISASI PROSEDUR HUMAN CAPITAL', '2', 'https://drive.google.com/open?id=1xUvqWdvn5PHMq-SVOFPObtgcvbEXK3au', 1, 1),
(421, 34, 35, '2023-10-06', 'WFO', 'WEBINAR SERIES TEKNIK SIPIL SESSION 84 \"PENGGUNAAN SISTEM STRUTTING MODULAR PADA PEKERJAAN GALIAN TANAH DAN BASEMENT\"', '2', 'https://drive.google.com/open?id=1axKe1nq4H7q1vKhNdEBbCNPRVC_8Grif', 1, 1),
(422, 0, 29, '2023-10-06', 'WFA', 'SOSIALISASI RE-ALIGNMENT PROSEDUR KNOWLEDGE MANAGEMENT, KARYA INOVASI, PELAKSANAAN BENCHMARKING DAN PROSEDUR PENELITIAN PENGEMBANGAN', '2', 'https://drive.google.com/open?id=1M2jGCMJK7cPECLo_27Ly0PWJ9n-JCJCQ', 1, 1),
(423, 0, 11, '2023-10-06', 'WFA', 'sosialisasi hasil re-alignment prosedur human capital', '2', 'https://drive.google.com/open?id=1fVXod-nmJmLfZPqgqcvxpqImPrG5mJgM', 1, 1),
(424, 0, 29, '2023-10-06', 'WFA', 'ZOOM SOSIALISASI RE-ALIGNMENT PROSEDUR KNOWLEDGE MANAGEMENT, KARYA INOVASI, PELAKSANAAN BENCHMARKING DAN PROSEDUR PENELITIAN PENGEMBANGAN', '2', 'https://drive.google.com/open?id=1ZMb4ETB7oTs8QdoNaBpBNVArwtJkzcwv', 1, 1),
(425, 29, 2, '2023-10-06', 'WFA', 'Analisis kebutuhan pondasi jembatan KPC Sangatta', '8', '', 1, 1),
(426, 28, 24, '2023-10-06', 'WFO', 'Sosialisasi Prosedur Riset, Inovasi, dan Knowledge Management', '2,5', 'https://drive.google.com/open?id=12bxnyUnXxYEocRWoxXo88p6c-DHrEvC-', 1, 1),
(427, 28, 32, '2023-10-06', 'WFO', 'Technical Meeting Lomba K2R NEO 1.0', '3', 'https://drive.google.com/open?id=1r-eleF1BHbH3Y8ZkYhOoz7z_3NDXhtGW', 1, 1),
(428, 28, 24, '2023-10-06', 'WFO', 'Sosialisasi Prosedur Human Capital', '2', 'https://drive.google.com/open?id=1iNo0TfU3HNUv7SmCDij25rjXEAZXsaBS', 1, 1),
(429, 28, 32, '2023-10-06', 'WFO', 'Persiapan Lomba K2R NEO 1.0', '3', 'https://drive.google.com/open?id=1r8z9_5BfygCGqnzG8noGl9dRMZ2KTovB', 1, 1),
(430, 50, 35, '2023-10-06', 'WFO', 'Zoom Sosialisasi Re Alignment Prosedur KM/KI, Pelaksanaan Benchmarking\nZoom Sosialisasi Re-Alignment Prosedur Human Capital\nMembaca Prosedur', '6', '', 1, 1),
(431, 42, 24, '2023-10-06', 'WFO', 'Mengikuti SOSIALISASI RE-ALIGNMENT PROSEDUR KNOWLEDGE MANAGEMENT, KARYA INOVASI, PELAKSANAAN BENCHMARKING DAN PROSEDUR PENELITIAN PENGEMBANGAN', '2', 'https://drive.google.com/open?id=1kPxi8osQBvBvybkcHhIkdHRV89qaK5ai', 1, 1),
(432, 42, 24, '2023-10-06', 'WFO', 'Mengikuti SOSIALISASI HASIL RE-ALIGNMENT PROSEDUR HUMAN CAPITAL', '2', 'https://drive.google.com/open?id=1XNMV5WRlHHmIwBH_D2hqfe107zzkc3Mr', 1, 1),
(433, 42, 32, '2023-10-06', 'WFO', 'Mengikuti Via Zoom Technical Meeting Kompetisi Konstruksi Ramping Neo 1.0', '2', 'https://drive.google.com/open?id=1dex85U3FsQ-KCT33FXiemrok0NovdgN1', 1, 1),
(434, 42, 32, '2023-10-06', 'WFO', 'Perjalanan ke Bandung untuk mengikuti Kompetisi Konstruksi Ramping Neo 1.0', '2', '', 1, 1),
(435, 42, 35, '2023-10-06', 'WFO', 'Membuat surat permohonan dana untuk pembayaraan hutang vendor bulan Oktober 2023 proyek Bypass Banjarmasin', '0,5', '', 1, 1),
(436, 37, 32, '2023-10-07', 'WFA', 'Kompetisi LC ITB', '8', 'https://drive.google.com/open?id=1Pxxom-MFBVRFRfR25QfANlH4ZcaQMxqs', 1, 1),
(437, 28, 32, '2023-10-07', 'WFA', 'Mengikuti Lomba K2R NEO 1.0', '8', 'https://drive.google.com/open?id=1-dJ43jijQHmHd98yAWOcByugMk0V-7Yk', 1, 1),
(438, 42, 32, '2023-10-07', 'WFA', 'Mengikuti Workshop Konstruksi Ramping di gedung CRCS ITB Bandung', '4', 'https://drive.google.com/open?id=1FYPi-5vnrhKqEyFIhu63Yovnky7x0flG', 1, 1),
(439, 42, 32, '2023-10-07', 'WFA', 'Mengikuti Kompetisi Konstruksi Ramping Neo 1.0 di gedung CRCS ITB Bandung', '4', 'https://drive.google.com/open?id=1u2wijkGJxjXt6b4kRR7wz304gpE2fBDQ', 1, 1),
(440, 46, 11, '2023-10-09', 'WFO', 'koordinasi sistem engineering dan 32 infra 2', '1', '', 1, 1),
(441, 48, 27, '2023-10-09', 'WFO', 'Zoom Kordinasi Internal Eng. Div Infra 2', '1', 'https://drive.google.com/open?id=14PSQgNkgx1gdspYctm4uzSMjglmesqSo', 1, 1),
(442, 48, 7, '2023-10-09', 'WFO', 'Collecting and uploading KI-KM dari tim proyek bendungan pamukkulu', '2', 'https://drive.google.com/open?id=1hmv5Yk13lPbhdN2YDO4_pmelR-uLRFgE', 1, 1),
(443, 0, 22, '2023-10-09', 'WFO', 'Apel Pagi Sistem Eng & 32', '1', 'https://drive.google.com/open?id=1u5QNv5FS1FQ84WSjiT5EcuyMpVvMwabz', 1, 1),
(444, 0, 2, '2023-10-09', 'WFO', 'Koordinasi tagihan proyek dengan PC', '2,5', '', 1, 1),
(445, 48, 27, '2023-10-09', 'WFO', 'Zoom RKP Bab 3 Proyek Pengerukan Alur dan Kolom Pelabuhan Benoa', '1,5', 'https://drive.google.com/open?id=1SGpdOXjzMQOf_frkRKJnC7nGd6m9Lf6r', 1, 1),
(446, 0, 27, '2023-10-09', 'WFO', 'Evaluasi Perencanaan & Pengendalian Engineering Okt 2023 Proyek Pelabuhan Benoa\n', '1,5', 'https://drive.google.com/open?id=1cwVdEdKeWNU4W6SnunUaxm1LB_8sMaVc', 1, 1),
(447, 45, 35, '2023-10-09', 'WFA', 'apel pagi harian team Enjinering Subdiv Infra2', '1', '', 1, 1),
(448, 0, 2, '2023-10-09', 'WFO', 'meeting dengan PT eka sinar abadi pembahasan tentang klaim vendor', '1', '', 1, 1),
(449, 45, 35, '2023-10-09', 'WFA', 'zoom Revier RKP divisi dengan team proyek pengerukan Benoa', '2', '', 1, 1),
(450, 45, 35, '2023-10-09', 'WFA', 'Zoom Revier RKP divisi dengan team proyek PKT Bontang', '2', '', 1, 1),
(451, 45, 35, '2023-10-09', 'WFA', 'pengecekan reviewpresentasi PPT RKP proyek pasigala', '2', '', 1, 1),
(452, 46, 27, '2023-10-09', 'WFO', 'review dan monnitoring RKP proyek infra 2', '6', '', 1, 1),
(453, 46, 7, '2023-10-09', 'WFO', 'colecting,monitoring KI/KM proyek infra 2', '1,5', '', 1, 1),
(454, 48, 32, '2023-10-09', 'WFO', 'Kordinasi off line (dikantor) antar PIC dan Kordinator PIC Bab 3 dan KI-KM menindak lanjuti arahan zoom pagi', '1', '', 1, 1),
(455, 48, 32, '2023-10-09', 'WFO', 'Kordinasi PIC Div to PIC Proyek untuk update KI-KM dan RKP Bab 3, respon dari Proyek Bendungan Pamukkulu, masih mencari jadwal kosong untuk presentasi PPT yang sudah diterima', '1', 'https://drive.google.com/open?id=1jY9ibkisnfyn8T6SowK20yBFlpqTYpfS', 1, 1),
(456, 37, 12, '2023-10-09', 'WFO', 'MR Departemen 4', '8', 'https://drive.google.com/open?id=1aqZhxzRbj5shndtUzmf9gAja6Au3RPcs', 1, 1),
(457, 0, 27, '2023-10-09', 'WFO', 'evaluasi perencanaan dan pengendalian engineering oktober 2023 proyek PKT bontang', '1', 'https://drive.google.com/open?id=1_04s_DjHfRSt3nopViiRAKREuXxzoDPU', 1, 1),
(458, 48, 27, '2023-10-09', 'WFO', 'Zoom RKP Bab 3 Proyek K-5 PT Pupuk Kaltim', '1', 'https://drive.google.com/open?id=1Mv-m63RWW8KtG1VfkroHTnrWnKABWEVr', 1, 1),
(459, 51, 35, '2023-10-09', 'WFA', 'Meeting offline persiapan proyek IPAL IKN', '3', 'https://drive.google.com/open?id=1yCyQ6PCYZeY3UDwrU8xhN12bR5XWH065', 1, 1),
(460, 51, 35, '2023-10-09', 'WFA', 'Meeting offline tim persiapan proyek IPAL IKN', '3', 'https://drive.google.com/open?id=1FHKU8zWtmiu90WHVwlMiXS4wgN2brLct', 1, 1),
(461, 51, 27, '2023-10-09', 'WFA', 'Penyusunan dan kirim form evaluasi Eng proyek Gumbasa periode september 2023', '2', 'https://drive.google.com/open?id=1Jg4jxCBrJGGqD1ys73FM6ha8Wt_6cjeP', 1, 1),
(462, 49, 29, '2023-10-09', 'WFA', 'Apel pagi harian team Enjinering Subdiv Infra2', '1', 'https://drive.google.com/open?id=1LVMuWZqfK1qCKwGz-OlbbALiox1urpQt', 1, 1),
(463, 49, 27, '2023-10-09', 'WFA', '\nZook Meeting RKP dengan tim proyek Benoa', '2', 'https://drive.google.com/open?id=1KIhG3ZeLEMhEfIQ8DNyz3hx-x3B--61z', 1, 1),
(464, 49, 7, '2023-10-09', 'WFA', 'Penulisan KI KM Kolaborasi Sumbu timur', '4,5', '', 1, 1),
(465, 47, 35, '2023-10-09', 'WFA', '-Zoom evaluasi engineering BAB 3 proyek PKT Bontang\n-Zoom evaluasi engineering BAB 3 proyek Pelabuhan Benoa', '3,5', 'https://drive.google.com/open?id=1gfD1RRm1WKpJQFoE-qU-x5rYmTPTHFv5', 1, 1),
(466, 38, 11, '2023-10-09', 'WFO', 'membuat flyer dan persiapan meet the Engineer 2', '8', '', 1, 1),
(467, 0, 11, '2023-10-09', 'WFO', 'Apel Pagi Sistem Eng & 32', '1', 'https://drive.google.com/open?id=1VXXF4Jm3myta1CpktwZwKs5bCY9rny_q', 1, 1),
(468, 0, 27, '2023-10-09', 'WFO', 'Zoom Evaluasi Perencanaan & Pengendalian Engineering Okt 2023 Proyek Pelabuhan Benoa', '1,5', 'https://drive.google.com/open?id=1810zSRlDu0Gcf25TNMiz8e_ZxYVGA1_T', 1, 1),
(469, 0, 27, '2023-10-09', 'WFO', 'Zoom Evaluasi Perencanaan & Pengendalian Engineering Okt 2023 Proyek PKT Bontang', '1,5', 'https://drive.google.com/open?id=1e6RIU2_T66fnNOTsE1VeHTaASX8wsofO', 1, 1),
(470, 29, 27, '2023-10-09', 'WFA', 'Meeting RKP dengan tim proyek Benoa', '2', 'https://drive.google.com/open?id=1VgAZbuzCjx36R9qzBcADGFPRCyXHsud9', 1, 1),
(471, 30, 27, '2023-10-09', 'WFA', 'Meeting RKP Proyek Benoa', '2', 'https://drive.google.com/open?id=1VgAZbuzCjx36R9qzBcADGFPRCyXHsud9', 1, 1),
(472, 29, 35, '2023-10-09', 'WFA', 'Management Review operasi 4 Infra 2', '8', 'https://drive.google.com/open?id=1HfW8N6r4n4-laKw9EzAQ4113RZkBGZ07', 1, 1),
(473, 30, 35, '2023-10-09', 'WFA', 'MR OP4 Infra 2', '8', 'https://drive.google.com/open?id=1HfW8N6r4n4-laKw9EzAQ4113RZkBGZ07', 1, 1),
(474, 33, 14, '2023-10-09', 'WFO', 'Koordinasi tim persiapan proyek IPAL IKN', '1', 'https://drive.google.com/open?id=1bunQkc5pVRO4oidpNgThIQ0dKHaH8AFD', 1, 1),
(475, 33, 14, '2023-10-09', 'WFO', 'Koordinasi Tahap 1 tim persiapan IPAL', '1', '', 1, 1),
(476, 33, 14, '2023-10-09', 'WFO', 'Mempelajari dokumen IPAL', '6', 'https://drive.google.com/open?id=1SSCXpjzD8Ip-scMZ8DJWcmxm1wKPXqCI', 1, 1),
(477, 39, 35, '2023-10-09', 'WFA', 'Bantuan Teknis Proyek Sei Taiwan mengurus FHO', '8', '', 1, 1),
(478, 47, 35, '2023-10-09', 'WFA', 'Koordinasi dengan proyek Bontang mengenai Review RKP BAB 3', '1', '', 1, 1),
(479, 50, 27, '2023-10-09', 'WFA', 'Apel pagi monitoring KI/KM \nEvaluasi Perencanaan & Pengendalian Engineering Okt 2023 Proyek Pelabuhan Benoa', '5', '', 1, 1),
(480, 42, 29, '2023-10-09', 'WFA', 'Zoom apel pagi sistem engineering & LC', '1', 'https://drive.google.com/open?id=1gfQUkNh2aRzcQuhCavmwOU88qWehHsRS', 1, 1),
(481, 42, 12, '2023-10-09', 'WFA', 'Mengikuti Rapat Management Review Departemen Operasi 4 Cut Off bln September 2023', '6', 'https://drive.google.com/open?id=12_QIrB9si2QGNkRfXBptZLvrCJ0A2b22', 1, 1),
(482, 42, 27, '2023-10-09', 'WFA', 'Evaluasi Perencanaan & Pengendalian Engineering Okt 2023 Proyek PKT Bontang', '1', 'https://drive.google.com/open?id=18pCj63XkZqyt_EKzHIOPAOl9kOGgjSoA', 1, 1),
(483, 32, 35, '2023-10-09', 'WFO', 'Baca Prosedur', '5,5', '', 1, 1),
(484, 28, 27, '2023-10-09', 'WFO', 'Apel Pagi Sistem Engineering & 32', '1', 'https://drive.google.com/open?id=1NKoFnhFp0Bi1hlYkgpjr1dqyhCtnsSFA', 1, 1),
(485, 28, 27, '2023-10-09', 'WFO', 'Zoom Evaluasi Perencanaan dan Pengendalian Bab 3 Engineering Proyek D&B Pengerukan Kolam dan Alur Pelabuhan Benoa Paket A', '2', 'https://drive.google.com/open?id=1qaeJDZZWpPYshmLI3Ahl1dBiFCj2p8jl', 1, 1),
(486, 28, 27, '2023-10-09', 'WFO', 'Zoom Evaluasi Perencanaan dan Pengendalian RKP Bab 3 Engineering Proyek Penyiapan Lahan Industri PKT Bontang', '2', 'https://drive.google.com/open?id=1qlOvgjbgS1emTJ-fgoG5BXfplm4oPvBu', 1, 1),
(487, 28, 32, '2023-10-09', 'WFO', 'Buat Draft PPT Implementasi LC PP dari Workshop K2R NEO 1.0', '3', 'https://drive.google.com/open?id=1TPAwS2pYpc2UMznd8DTvvAstkXf-kps1', 1, 1),
(488, 48, 32, '2023-10-10', 'WFO', 'Zoom Kordinasi Div Eng. Pagi', '1', 'https://drive.google.com/open?id=1qa05v1PJHIdvESzR2nhuMZlmbMJFKWx_', 1, 1),
(489, 48, 7, '2023-10-10', 'WFO', 'Updateing dan Kordinasi KI-KM dengan PIC Bendungan Pamukkulu', '3', 'https://drive.google.com/open?id=13ZazbORSf4Qwe6mhpgaj0-5mIysd3c36', 1, 1),
(490, 48, 29, '2023-10-10', 'WFO', 'Digitalisasi wika infrastruktur 2', '1,5', 'https://drive.google.com/open?id=1ff_pSsxr7xxd2OtRgc-Od7hO6pAbhTrO', 1, 1),
(491, 37, 12, '2023-10-10', 'WFO', 'MR QSHEE', '4', 'https://drive.google.com/open?id=1xmNEMbvPtRMuyEHldlK_nXaMpuYeHd0M', 1, 1),
(492, 37, 12, '2023-10-10', 'WFO', 'Monitoring database utk MR', '2', '', 1, 1),
(493, 37, 7, '2023-10-10', 'WFO', 'Koordinasi terkait acara KI KM Award dgn tim', '1', '', 1, 1),
(494, 37, 16, '2023-10-10', 'WFO', 'Koordinasi digimon', '1', 'https://drive.google.com/open?id=1CdGo6xB09h7EVJ8qijIiv7vary0h3m4k', 1, 1),
(495, 48, 32, '2023-10-10', 'WFO', 'KI-KM Effisiensi & Optimalisasai Material Selubung Garuda Pada Banguanan Gedung Kantor Presiden IKN Nusantara', '3', 'https://drive.google.com/open?id=1SjWQcKVd237M9VkPxV5MQyULTZZRh5ry', 1, 1),
(496, 38, 12, '2023-10-10', 'WFO', 'buat dashboard', '6', '', 1, 1),
(497, 45, 35, '2023-10-10', 'WFA', 'Zoom apel pagi bersama tem enjinering subdiv infra2', '1', '', 1, 1),
(498, 45, 7, '2023-10-10', 'WFA', 'Pengecekan Review RKP BAB3 enjinering dr proyek MUTIP', '3', '', 1, 1),
(499, 45, 7, '2023-10-10', 'WFA', 'Pengecekan Review RKP BAB3 enjinering dr proyek pasigala', '3', '', 1, 1),
(500, 46, 28, '2023-10-10', 'WFO', 'review dan monitoring LPS proyek infra 2', '3', '', 1, 1),
(501, 46, 27, '2023-10-10', 'WFO', 'review dan monitoring RKP infra 2', '3', '', 1, 1),
(502, 46, 7, '2023-10-10', 'WFO', 'kolaborasi KI/KM proyek infra 2', '1', '', 1, 1),
(503, 46, 11, '2023-10-10', 'WFO', 'koordinasi intern engineering sub divisi engineering infra 2', '1', '', 1, 1),
(504, 33, 14, '2023-10-10', 'WFO', 'Ketemu dengan BPKP', '2', '', 1, 1),
(505, 34, 35, '2023-10-10', 'WFO', 'LPS BAB 3 Underpass Tatakan 101', '4', 'https://drive.google.com/open?id=1uG1MA30xo1AeoiW6HOZxSKKGbzBPsWv9', 1, 1),
(506, 30, 35, '2023-10-10', 'WFO', 'Perpanjangan SKK Ahli Muda K3 Konstruksi', '8', 'https://drive.google.com/open?id=1uG1MA30xo1AeoiW6HOZxSKKGbzBPsWv9', 1, 1),
(507, 34, 7, '2023-10-10', 'WFO', 'Pembuatan Karya Inovasi Jacking Box', '4', 'https://drive.google.com/open?id=1aOfQTLIREQh0u-yZICN2x7tyjX75q7OJ', 1, 1),
(508, 33, 11, '2023-10-10', 'WFO', 'Rekap dan resume KI/KM infra 2 untuk persiapan KM Award dan membuat resume terkait dampak dari KI/KM yang dibuat.', '6', 'https://drive.google.com/open?id=1HFVv-7Fu35Y72kR0bP2PpFs3FeH6vI4e', 1, 1),
(509, 29, 9, '2023-10-10', 'WFO', 'Pemberkasan dan administrasi perpanjangan lisensi software engineering', '2,5', '', 1, 1),
(510, 51, 7, '2023-10-10', 'WFA', 'Support review dan perbaikan isi dan format Knowledge Management proyek Ameroro.', '5', 'https://drive.google.com/open?id=1Y_axakFZ8TVG9UzKL39XvG-ZqS-gTgiy', 1, 1),
(511, 51, 35, '2023-10-10', 'WFA', 'Mempelajari gambar dan dokumen teknis rencana proyek IPAL, IKN.', '3', '', 1, 1),
(512, 39, 35, '2023-10-10', 'WFA', 'Bantuan teknis proyek Sei Taiwan mengurus FHO', '8', '', 1, 1),
(513, 49, 27, '2023-10-10', 'WFA', 'Pengecekan Review RKP BAB3 enjinering dr proyek MUTIP', '3', '', 1, 1),
(514, 49, 27, '2023-10-10', 'WFA', 'Pengecekan Review RKP BAB3 enjinering dr proyek pasigala', '3', '', 1, 1),
(515, 47, 35, '2023-10-10', 'WFA', 'Baca_baca prosedur LPS', '2', 'https://drive.google.com/open?id=1FdmZvV8l_owjZPx81xEUs0kq09DzB-dr', 1, 1),
(516, 47, 35, '2023-10-10', 'WFA', 'Bantu penulisan KIKM proyek KEEROm', '2', 'https://drive.google.com/open?id=18dF6GmaBciR5SIIzJ1Ku4znm1oZAJtdu', 1, 1),
(517, 50, 32, '2023-10-10', 'WFA', 'Zoom Sistem Eng & 32\nMembaca Prosedur', '5', '', 1, 1),
(518, 42, 29, '2023-10-10', 'WFA', 'Zoom apel pagi sistem engineering & LC', '1', 'https://drive.google.com/open?id=19o_R2lmIHUTjoaARgD2_2GLlKGJBe63V', 1, 1),
(519, 32, 35, '2023-10-10', 'WFO', 'Perbantuan MUTIP', '6,5', '', 1, 1),
(520, 28, 27, '2023-10-10', 'WFO', 'Apel Pagi Sistem Engineering & 32', '1', 'https://drive.google.com/open?id=1nDSAZh4yIzqoS9Ok9lkfvBvttoB4NEv1', 1, 1),
(521, 28, 24, '2023-10-10', 'WFO', 'Input File Prosedur Hasil Realignment ke dalam SharePoint Engineering Infra 2', '4', 'https://drive.google.com/open?id=15jk-yAmquG9ps8T8bdEZUmD3NQJknlZk', 1, 1),
(522, 28, 24, '2023-10-10', 'WFO', 'Input Evidence Sosialisasi Prosedur Engineering & BIM ke SharePoint QSM dan Update Monitoring Progress Prosedur WIKA Hasil Realignment', '3', 'https://drive.google.com/open?id=1berOJeweZi-qGj0OwRsRCrbTI0uHHo8e', 1, 1),
(523, 48, 32, '2023-10-11', 'WFO', 'Zoom Apel Pagi Eng. Div. Infra 2', '1', 'https://drive.google.com/open?id=1BLAO3kcGLv54TEWkhSNWoYuvVe3JbHbR', 1, 1),
(524, 48, 27, '2023-10-11', 'WFO', 'Zoom Evaluasi Perencanaan & Pengendalian Engineering Okt 2023 Proyek Pasigala', '1,5', 'https://drive.google.com/open?id=1a_rLDrFqpYN_j5DsxXHGl2rkMvFpEqtc', 1, 1),
(525, 48, 27, '2023-10-11', 'WFO', 'Evalwasi PPT dari Proyek Bendungan Pamukkulu untuk kesiapan RKP 18 oktober', '1,5', 'https://drive.google.com/open?id=1BPQBKiV_LzC_7b4roBYmLgv5Sz72ZBZ6', 1, 1),
(526, 46, 35, '2023-10-11', 'WFO', 'koordinasi intern engineering sub divisi engineering infra 2', '1', '', 1, 1),
(527, 46, 27, '2023-10-11', 'WFO', 'Monitoring review RKP proyek infra 2', '3', '', 1, 1),
(528, 46, 28, '2023-10-11', 'WFO', 'colecting dan monitoring LPS proyek infra 2', '3', '', 1, 1),
(529, 46, 7, '2023-10-11', 'WFO', 'kolaborasi,monitoring KI/KM proyek infra 2', '1', '', 1, 1),
(530, 48, 27, '2023-10-11', 'WFO', 'Zoom Evaluasi Perencanaan & Pengendalian Engineering Okt 2023 Proyek Sumbu Timur', '1,5', '', 1, 1),
(531, 48, 27, '2023-10-11', 'WFO', 'Zoom Evaluasi Perencanaan & Pengendalian Engineering Okt 2023 Proyek Makasar Newport Toll', '1,5', 'https://drive.google.com/open?id=1KtqRSQ4RZbMCN3UpaGohdZeQVpR7GDdW', 1, 1),
(532, 37, 7, '2023-10-11', 'WFO', 'Koordinasi dan diskusi terkait KI/KM award dengan tim SE', '2', '', 1, 1),
(533, 37, 12, '2023-10-11', 'WFO', 'Koordinasi terkait materi MR dengan tim digimon', '2', '', 1, 1),
(534, 48, 32, '2023-10-11', 'WFO', 'Kordinasi antar PIC di divisi infra 2, pembahasan internal progres RKP update dan KI-KM', '1', '', 1, 1),
(535, 37, 27, '2023-10-11', 'WFO', 'Zoom meeting review RKP Proyek Passigalla', '1,5', '', 1, 1),
(536, 37, 27, '2023-10-11', 'WFO', 'Zoom meeting review RKP Proyek Sumbu Timur', '1,5', 'https://drive.google.com/open?id=1r4SJp1nk_NUJsPwal337xPzzU4Bc83hj', 1, 1),
(537, 37, 27, '2023-10-11', 'WFO', 'Evaluasi Perencanaan & Pengendalian Engineering Okt 2023 Proyek Akses Tol MNP', '1,5', 'https://drive.google.com/open?id=1Snfy_wQ0nO9vv19hxgHblW7FvM4TSlw7', 1, 1),
(538, 38, 12, '2023-10-11', 'WFO', 'MEMBUAT MATERI PERSIAPAN MR', '6,5', '', 1, 1),
(539, 45, 7, '2023-10-11', 'WFA', 'Revisi Penulisan ki/km kolaborasi dengan proyek mutip', '1,5', '', 1, 1),
(540, 45, 35, '2023-10-11', 'WFA', 'Zoom review RKP subdivisi Enjinering dengan proyek Pasigala', '2', '', 1, 1),
(541, 45, 35, '2023-10-11', 'WFA', 'Zoom review RKP subdivisi Enjinering dengan proyek sumbu timur IKN', '2', '', 1, 1),
(542, 45, 35, '2023-10-11', 'WFA', 'Zoom review RKP subdivisi Enjinering dengan proyek Acces tol makasar Newport', '2', '', 1, 1),
(543, 33, 11, '2023-10-11', 'WFO', 'Koordinasi dengan vendor dan tim proyek IPAL IKN', '2,5', 'https://drive.google.com/open?id=12hItKHGamo2KPAQKgPrHH2GUl3L2iPVp', 1, 1),
(544, 33, 14, '2023-10-11', 'WFO', 'Membuat Laporan MC 100% Proyek Bajo untuk evaluasi perhitungan penyesuaian harga BBM dan Aspal Proyek Labuan Bajo', '4', 'https://drive.google.com/open?id=1g08fo_GCFIfERpxRcksUQ6D41xIjTkyf', 1, 1),
(545, 33, 14, '2023-10-11', 'WFO', 'Membuat paparan persiapan intro/ entri meeting eskalasi tahap 2 proyek labuan bajo', '2', 'https://drive.google.com/open?id=1dAnJK2QTEucg6V87Aaj-NHVkOoAD65I6', 1, 1),
(546, 34, 27, '2023-10-11', 'WFO', 'Evaluasi Perencanaan dan Pengendalian RKP BAB 3 Engineering Proyek Sumbu Timur IKN', '1,5', 'https://drive.google.com/open?id=1mMSPy-KkSixTjZtHmb2u4MS-krUBorkN', 1, 1),
(547, 30, 27, '2023-10-11', 'WFO', 'RKP SUMBU TIMUR', '2', 'https://drive.google.com/open?id=1mMSPy-KkSixTjZtHmb2u4MS-krUBorkN', 1, 1),
(548, 51, 26, '2023-10-11', 'WFA', 'Koordinasi sistem Engineering.', '2', 'https://drive.google.com/open?id=1L2tHmsbpWvPsQ5XA4sgjO-IB3NpSI3D2', 1, 1),
(549, 51, 27, '2023-10-11', 'WFA', 'Zoom meeting RKP review periode September proyek Pasigala.', '1,5', 'https://drive.google.com/open?id=1mlFCXMny5-b8bUtd2vcl8ObZ1rG4EVmd', 1, 1),
(550, 51, 27, '2023-10-11', 'WFA', 'Koordinasi dengan Eng proyek Gumbasa dan Ameroro, dan cek review form evaluasi RKP periode September 2023.', '5', '', 1, 1),
(551, 34, 27, '2023-10-11', 'WFO', 'evaluasi perencanaan dan pengendalian rkp bab 3 engineering proyek tol?MNP?makassar', '1,5', 'https://drive.google.com/open?id=1xQjc-yChO4Svz0JRRxWrlOk-8e_tEisi', 1, 1),
(552, 30, 27, '2023-10-11', 'WFO', 'RKP MNP MAKASSAR', '2', 'https://drive.google.com/open?id=1xQjc-yChO4Svz0JRRxWrlOk-8e_tEisi', 1, 1),
(553, 29, 2, '2023-10-11', 'WFA', 'Analisis longsoran lereng jalan akses proyek bendungan manikin', '8', '', 1, 1),
(554, 39, 35, '2023-10-11', 'WFA', 'Bantuan teknis proyek sei taiwan mengurus FHO', '8', '', 1, 1),
(555, 49, 29, '2023-10-11', 'WFA', 'Rakor engineering system and LC', '1', '', 1, 1),
(556, 49, 27, '2023-10-11', 'WFA', 'Zoom evakuasi RKP bab 3 eng proyek Sumbu timur', '2,5', '', 1, 1),
(557, 49, 27, '2023-10-11', 'WFA', 'Zoom evaluasi RKP bab 3 akses makassar new port', '2,5', '', 1, 1),
(558, 49, 27, '2023-10-11', 'WFA', 'zoom meeting evaluasi eng bab 3 rkp proyek pasigala', '2', '', 1, 1),
(559, 47, 27, '2023-10-11', 'WFA', 'Zoom review RKP proyek Pasigala', '1,5', 'https://drive.google.com/open?id=1zKPyQh3o19z0yNPJel_dSeYv9YO5guTM', 1, 1),
(560, 47, 27, '2023-10-11', 'WFA', 'Zoom review RKP BAB 3 proyek Sumbu Timur', '2', 'https://drive.google.com/open?id=1LFbcVSTpPCvEFFjKeBtDSZV3BX-a61YO', 1, 1),
(561, 47, 27, '2023-10-11', 'WFA', 'Zoom RKP BAB 3 Proyek Akses Tol Makasar Newport', '1,5', 'https://drive.google.com/open?id=1FY-rCsIyZMTWUTbdDLzKIA1cInHd7hbj', 1, 1),
(562, 50, 27, '2023-10-11', 'WFA', 'Zoom Review RKP Bab 3 Proyek Pasigala\nZoom Review RKP Bab 3 Proyek Sumbu Timur\nZoom Review RKP Bab 3 Proyek MNP', '6', '', 1, 1),
(563, 42, 29, '2023-10-11', 'WFA', 'Zoom apel pagi sistem engineering & LC', '0,5', 'https://drive.google.com/open?id=1l2jSDbKgsHfhU8fplWFCLrpFOX_HKecv', 1, 1),
(564, 42, 7, '2023-10-11', 'WFA', 'Koordinasi rencana KI/KM award (pembentukan panitia, timeline, dll)', '0,5', '', 1, 1),
(565, 42, 27, '2023-10-11', 'WFA', 'Zoom Evaluasi Perencanaan & Pengendalian Engineering Proyek Pasigala', '1', 'https://drive.google.com/open?id=101PRWAfSQgFeS4FjtrZgwcw-gwgI1NHT', 1, 1),
(566, 42, 35, '2023-10-11', 'WFA', 'Koordinasi dengan Keuangan (Bu Dina) terkait pembayaran hutang vendor proyek Bypass Banjarmasin', '0,5', '', 1, 1),
(567, 42, 27, '2023-10-11', 'WFA', 'Zoom Evaluasi RKP Bab 3 Perencanaan & Pengendalian Engineering Proyek Sumbu Kebangsaan Timur', '1,5', 'https://drive.google.com/open?id=19kw2S7VW5H6iI4Bjjyhd3pqEQdBD04CU', 1, 1),
(568, 42, 27, '2023-10-11', 'WFA', 'Zoom Evaluasi RKP Bab 3 Perencanaan & Pengendalian Engineering Proyek Makasar New Port', '1,5', 'https://drive.google.com/open?id=15X0y-9s_XYLhGKcYMWpum3FpAtEJxJsQ', 1, 1),
(569, 32, 35, '2023-10-11', 'WFO', 'Perbantuan MUTIP', '7,5', '', 1, 1),
(570, 28, 27, '2023-10-11', 'WFO', 'Zoom Evaluasi Perencanaan dan Pengendalian RKP Bab 3 Engineering Proyek Pasigala', '2', 'https://drive.google.com/open?id=1283ZSdgYP1z-1Q2DaY9zu9KKdaNa3FFv', 1, 1),
(571, 28, 27, '2023-10-11', 'WFO', 'Zoom Evaluasi Perencanaan dan Pengendalian RKP Bab 3 Engineering Proyek Sumbu Timur IKN', '2', 'https://drive.google.com/open?id=1zcSrhA7kEpLRJeA4U9fgogSi2XrJGKk3', 1, 1),
(572, 28, 27, '2023-10-11', 'WFO', 'Zoom Evaluasi Perencanaan dan Pengendalian RKP Bab 3 Engineering Proyek MNP', '2', 'https://drive.google.com/open?id=16fw3zmpadNV2CMnIiGsZIivHwC26IVDa', 1, 1),
(573, 48, 29, '2023-10-12', 'WFO', 'Mempelajari via youtube Wika Underpas Tatakan 101', '0,5', 'https://drive.google.com/open?id=16EG-2VZzXmVHn5XEdPDNwkHYxm_B9p8G', 1, 1),
(574, 33, 14, '2023-10-12', 'WFO', 'Membuat draft dan asistensi untuk surat kuasa', '1', 'https://drive.google.com/open?id=10_XIgIb5pf7-XED4fJhBCkZDwxazaagd', 1, 1),
(575, 33, 2, '2023-10-12', 'WFO', 'Zoom dengan proyek Bendungan Jenelata', '1,5', 'https://drive.google.com/open?id=1oCyISfuIM9Qn6SKwEduxdFrWPkLZzRi8', 1, 1),
(576, 48, 27, '2023-10-12', 'WFO', 'Collecting, Uploading dan Mempelajari file Update RKP persiapan presentasi Proyek IKN tol', '4', 'https://drive.google.com/open?id=1cBQeUodJmvHMxy166BaOGKEVCZ3n94z8', 1, 1),
(577, 48, 35, '2023-10-12', 'WFO', 'KI-KM Pemanfaatan Tanah Claystone Sebagai Material Tanah Timbunan Lapangan Upacara Proyek Pembangunan Gedung Istana Negara dan Lapangan Upacara di IKN', '1,5', 'https://drive.google.com/open?id=1myb9oAEXpmxe6IjM7SHnUotrYB3gl8K2', 1, 1),
(578, 48, 35, '2023-10-12', 'WFO', 'KI-KM TRAFFIC MANAGEMENT PADA PROYEK PRESERVASI JALAN DAN JEMBATAN SP. PESANGGARAN ? NUSA DUA, JIMBARAN ? ULUWATU DAN PENATAAN LANSKAP BUNDARAN, PEDESTRIAN DAN MEDIAN RUAS JALAN BANDARA', '1', 'https://drive.google.com/open?id=1U7mebDZ7cp9W9EXQxE_VzFcJg2XgHJAB', 1, 1),
(579, 48, 35, '2023-10-12', 'WFO', 'KI-KM PENGGUNAAN KAMERA 360 DALAM VIDEO MONITORING PROGRESS PROYEK PRESERVASI JALAN DAN JEMBATAN SP. PESANGGARAN ? NUSA DUA, JIMBARAN ? ULUWATU DAN PENATAAN LANSKAP BUNDARAN, PEDESTRIAN', '1', 'https://drive.google.com/open?id=1CSr1nssK7Htguy4Oi-o7jWVqMDOhgLij', 1, 1),
(580, 46, 28, '2023-10-12', 'WFO', 'colecting dan perapihan data LPS G20', '8', '', 1, 1),
(581, 45, 35, '2023-10-12', 'WFA', 'Membaca2 prosedur', '3,5', '', 1, 1),
(582, 45, 35, '2023-10-12', 'WFA', 'Membuat PPT presentasi untuk ki/km kolaborasi dengan proyek MUTIP', '3,5', '', 1, 1),
(583, 37, 11, '2023-10-12', 'WFA', 'Koordinasi strategi program', '2,5', '', 1, 1),
(584, 37, 12, '2023-10-12', 'WFA', 'Koordinasi terkait materi MR', '3,5', '', 1, 1),
(585, 51, 35, '2023-10-12', 'WFA', 'Koordinasi / meeting dengan vendor pekerjaan jacking pipa rencana proyek IPAL, IKN di WITO 2.', '4', 'https://drive.google.com/open?id=1IFKGaUWgjDqnwzzfgpp1zUxX1lXvO32D', 1, 1),
(586, 51, 35, '2023-10-12', 'WFA', 'Mereview file backup quantity rencana proyek IPAL, IKN.', '4', '', 1, 1),
(587, 39, 18, '2023-10-12', 'WFA', 'Rapat koordinasi & persiapan meet the engineer', '4', '', 1, 1),
(588, 39, 11, '2023-10-12', 'WFA', 'Revisi RAB dan proposal kegiatan engineering', '3', '', 1, 1),
(589, 49, 24, '2023-10-12', 'WFA', 'menggabungkan IK metode kerja standar dengan IK metode pelaksanaan', '4', '', 1, 1),
(590, 49, 27, '2023-10-12', 'WFA', 'Koord dan revier form evaluasi proyek sumbu timur', '3', '', 1, 1),
(591, 34, 7, '2023-10-12', 'WFO', 'Penulisan Karya Inovasi', '4', 'https://drive.google.com/open?id=1DubCGsZozWIBgHLFfAAszN2vf7PlfYn5', 1, 1),
(592, 34, 7, '2023-10-12', 'WFO', 'Diskusi Penulisan Karya Inovasi Tatakan', '4', 'https://drive.google.com/open?id=1DubCGsZozWIBgHLFfAAszN2vf7PlfYn5', 1, 1),
(593, 29, 2, '2023-10-12', 'WFA', 'Meeting dengan tim proyek jenelata', '2', 'https://drive.google.com/open?id=16gohO7mfDfvnrnyyB6O0LScheTzVSLo9', 1, 1),
(594, 30, 2, '2023-10-12', 'WFA', 'Meeting dengan tim proyek jenelata', '2', 'https://drive.google.com/open?id=16gohO7mfDfvnrnyyB6O0LScheTzVSLo9', 1, 1),
(595, 29, 35, '2023-10-12', 'WFA', 'Audit komite engineering ke proyek RS Persahabatan', '8', 'https://drive.google.com/open?id=17mNi6T9COxTe2o6Lj47QS5SLGzQlmJSZ', 1, 1),
(596, 34, 2, '2023-10-12', 'WFO', 'Meeting Proyek Jenelata', '2', 'https://drive.google.com/open?id=1fPNoDWFTQyj9npf8mU10gN7ZCA3xAw4M', 1, 1),
(597, 33, 35, '2023-10-12', 'WFO', 'Membuat list data inventaris IPAL IKN', '5', 'https://drive.google.com/open?id=1vMqYBOeRhLhaE_lpLK9XBXt7PTpguvT2', 1, 1),
(598, 38, 20, '2023-10-12', 'WFO', 'membuat dashboard', '8', '', 1, 1),
(599, 47, 35, '2023-10-12', 'WFA', 'Baca-baca prosedur LPS', '1,5', 'https://drive.google.com/open?id=1_08PW501n46ofCm54idXTDfusCFaXExN', 1, 1),
(600, 44, 35, '2023-10-12', 'WFA', 'assistensi tugas pelathan mankon', '1,5', '', 1, 1),
(601, 50, 32, '2023-10-12', 'WFA', 'Membaca artikel KI/KM', '5', '', 1, 1),
(602, 42, 35, '2023-10-12', 'WFA', 'Perjalanan dinas dari Jakarta ke Banjarmasin untuk pengurusan eskalasi Bypass Banjarmasin ke BPKP Kalsel', '3', 'https://drive.google.com/open?id=1bollVp7tnAmYWF1COkcapDDxkusi5Ccc', 1, 1),
(603, 42, 27, '2023-10-12', 'WFA', 'Mengikuti Zoom RKP Review proyek MWRD', '1,5', 'https://drive.google.com/open?id=1uDh7tySNYBFL1MwXk9UF00GxgkH1SpeD', 1, 1),
(604, 32, 35, '2023-10-12', 'WFO', 'Perbantuan Proyek MUTIP 1', '8', '', 1, 1),
(605, 47, 35, '2023-10-12', 'WFA', 'Baca-baca KIKM mengenai pemanfaatan drone untuk survey', '2,5', 'https://drive.google.com/open?id=1HsPsdRO5NnG0df3VUUuBG44toTHdWuQ8', 1, 1),
(606, 28, 27, '2023-10-12', 'WFA', 'Zoom Presentasi RKP Proyek MWRD (Tambahan Pekerjaan Underpass)', '2,5', 'https://drive.google.com/open?id=1SPbv7LQVM24ZVxTXBZ0NfRxi03eAq_2d', 1, 1),
(607, 48, 32, '2023-10-13', 'WFO', 'Zoom Forum SHE WIKA grub ELECTRICAL SAFETY', '2,5', 'https://drive.google.com/open?id=1DrsyLOM7WWiW0bLoai5OGlh6RFozVf7B', 1, 1),
(608, 48, 27, '2023-10-13', 'WFO', 'Zoom Review RKP Bab 3 Tol IKN Seksi 3', '1,5', 'https://drive.google.com/open?id=17ZIutzs7x_wsUK2owsET2Cd5ZS3kJ2ge', 1, 1),
(609, 45, 35, '2023-10-13', 'WFA', 'Zoom webinar forum HSE wika2023 dengan jumlah ELECTRICAL SAFETY', '2', '', 1, 1),
(610, 45, 35, '2023-10-13', 'WFA', 'Zoom review RKP divisi dengan proyek Tol IKN', '2', '', 1, 1),
(611, 45, 35, '2023-10-13', 'WFA', 'Zoom review RKP divisi dengan proyek SWRD', '2', '', 1, 1),
(612, 48, 27, '2023-10-13', 'WFO', 'ZOOM REVIEW RKP BAB 3 PROYEK MWRD', '1', 'https://drive.google.com/open?id=1_xJ7A4bjthw84CJ0gT9Jl5-fEygZZe0Y', 1, 1),
(613, 48, 27, '2023-10-13', 'WFO', 'ZOOM REVIEW RKP BAB 3 PROYEK TUMBANG SAMBA HIRAN', '1,5', 'https://drive.google.com/open?id=1P9vpbCNLJR5A0tqCklqYsLnJVZrUd9FA', 1, 1),
(614, 48, 32, '2023-10-13', 'WFO', 'Aktifitar Kordinasi anter PIC RKP di kantor', '2', '', 1, 1),
(615, 46, 11, '2023-10-13', 'WFO', 'forum HSE WIKA groub ( electrical safety )', '3', '', 1, 1),
(616, 46, 27, '2023-10-13', 'WFO', 'zoommeating review RKP proyek infra 2', '3', '', 1, 1),
(617, 46, 28, '2023-10-13', 'WFO', 'monitoring data LPS proyek infra 2', '2', '', 1, 1),
(618, 45, 35, '2023-10-13', 'WFA', 'Zoom review RKP divis dengan proyek samba hiran', '1,5', '', 1, 1),
(619, 37, 12, '2023-10-13', 'WFA', 'Monitoring PPT MR', '2,5', '', 1, 1),
(620, 37, 35, '2023-10-13', 'WFA', 'Izin antar anak kontrol', '6', '', 1, 1),
(621, 51, 26, '2023-10-13', 'WFA', 'Koordinasi sistem Eng', '1', '', 1, 1),
(622, 51, 35, '2023-10-13', 'WFA', 'Menyaksikan RUPS online WIKA.', '1', '', 1, 1),
(623, 51, 35, '2023-10-13', 'WFA', 'Mempelajari backup quantity rencana proyek IPAL, IKN.', '3', '', 1, 1),
(624, 51, 7, '2023-10-13', 'WFA', 'Koordinasi dengan Eng proyek Ameroro terkait format dan isi Knowledge Management.', '3', '', 1, 1),
(625, 39, 16, '2023-10-13', 'WFA', 'Rapat koordinasi dan monitoring BIM prioritas 2', '4', '', 1, 1),
(626, 39, 11, '2023-10-13', 'WFA', 'Persiapan meet the engineer Oktober', '2', '', 1, 1),
(627, 49, 29, '2023-10-13', 'WFA', 'Forumh HSE Wika elektrical safety', '3', '', 1, 1),
(628, 49, 27, '2023-10-13', 'WFA', 'zoom evaluasi rkp bab 3 eng proyek samba hiram', '1,5', '', 1, 1),
(629, 49, 27, '2023-10-13', 'WFA', 'zoom monitoring eng bab 3 proyek MWRD', '2', '', 1, 1),
(630, 34, 29, '2023-10-13', 'WFO', 'Forum HSE WIKA Group', '3', 'https://drive.google.com/open?id=1FpxGc6lUpF8ZhKFJEACwMnD_-4Sf5wp2', 1, 1),
(631, 30, 29, '2023-10-13', 'WFO', 'Forum HSE WIKA Group', '3', 'https://drive.google.com/open?id=1FpxGc6lUpF8ZhKFJEACwMnD_-4Sf5wp2', 1, 1),
(632, 34, 29, '2023-10-13', 'WFO', 'Kick Off Meeting Pelatihan QA/QC Batch 3', '2', 'https://drive.google.com/open?id=1hvp7ww0PQfbmWDRcTDwcQ0NUXHtUyIIO', 1, 1),
(633, 29, 2, '2023-10-13', 'WFO', 'Analisis kebutuhan pondasi jembatan proyek samba hiran', '8', '', 1, 1),
(634, 30, 2, '2023-10-13', 'WFO', 'ANALISIS PONDASI SAMBA HIRAN', '5', '', 1, 1),
(635, 33, 35, '2023-10-13', 'WFO', 'Membuat daftar inventaris IPAL lanjutan', '8', 'https://drive.google.com/open?id=1UEDyTlBWxq5T-LOee5sgjOYzJ83nOtKv', 1, 1),
(636, 38, 12, '2023-10-13', 'WFO', 'Membuat presentasi persiapan MR', '8', '', 1, 1),
(637, 47, 27, '2023-10-13', 'WFA', 'Zoom review RKP BAB 3 proyek Tumbang Samba Hiran', '1', '', 1, 1),
(638, 47, 27, '2023-10-13', 'WFA', 'Zoom review RKP BAB 3 proyek MWRD', '1,5', '', 1, 1),
(639, 47, 27, '2023-10-13', 'WFA', 'Zoom review RKP BAB 3 proyek Tol IKN', '1,5', 'https://drive.google.com/open?id=11KVaPPdbS-PvfFIwKLlRuWnj8F64Ipn1', 1, 1),
(640, 47, 35, '2023-10-13', 'WFA', 'Zoom forum HSE WIKA', '2', 'https://drive.google.com/open?id=1l1jdPiRNfSqs1pSetkEVxpkNjZUVuWy8', 1, 1),
(641, 50, 27, '2023-10-13', 'WFA', 'Zoom HSE WIKA Grup Tematik IV 2023 topik Elektrikal \nZoom review RKP Proyek Tol IKN \nZoom review RKP Proyek MWRD\nZoom review RKP Proyek Tumbang Samba Hiran', '6,5', '', 1, 1),
(642, 42, 35, '2023-10-13', 'WFA', 'Mengikuti Zoom Forum HSE WIKA Group \"Electrical Safety\"', '2,5', 'https://drive.google.com/open?id=1DuVEdyxn6_zHPIPyFSKW7S5_hlYyoflN', 1, 1),
(643, 42, 35, '2023-10-13', 'WFA', 'Bertemu dengan PPK 1.2 Proyek Bypass Banjarmasin, membahas action plan pemeliharaan proyek', '1', 'https://drive.google.com/open?id=1LTPvRodEOpqUSKb8NYp-HzNei45m7CPQ', 1, 1),
(644, 42, 35, '2023-10-13', 'WFA', 'Bertemu dengan Satker PJN wil 2 Kalsel, membahas eskalasi proyek Bypass Banjarmasin, boleh tidaknya dalam berita acara dicantumkan 2 hasil perhitungan eskalasi dengan indeks BPS buku & disagregasi indeks bbm industri', '1', 'https://drive.google.com/open?id=1iLid9wE-0a0GRbPht6ow7myCrlXHfDzv', 1, 1),
(645, 42, 27, '2023-10-13', 'WFA', 'Zoom Evaluasi RKP Bab 3 Perencanaan & Pengendalian Engineering Proyek tol IKN 3B', '1', 'https://drive.google.com/open?id=1YkGEDzfY7Y9hyTx3IayPXUnosZpTETNd', 1, 1),
(646, 42, 27, '2023-10-13', 'WFA', 'Zoom Evaluasi RKP Bab 3 Perencanaan & Pengendalian Engineering Proyek MWRD', '1', 'https://drive.google.com/open?id=164o0R8fgUF6DlWzghiyaFkbLgQdQeRdz', 1, 1),
(647, 42, 35, '2023-10-13', 'WFA', 'Perjalanan dinas balik dari Banjarmasin ke Jakarta', '2', 'https://drive.google.com/open?id=1vCtvdoy8ByEDsowKCgBBrFZYbRvTEzPH', 1, 1),
(648, 42, 35, '2023-10-13', 'WFA', 'Bertemu dengan Korwas BPKP Kalsel di Jakarta, update proses eskalasi proyek Bypass Banjarmasin, terkait usulan catatan di BA jika diperbolehkan penggunaan disagregasi indeks BBM Industri akan disesuaikan lagi perhitungannya, akan dikonsultasikn ke BPKP pu', '1', 'https://drive.google.com/open?id=1sQi_stBDpwvX7qoesQZ2g1ZrbVgWFmVM', 1, 1),
(649, 32, 35, '2023-10-13', 'WFO', 'Perbantuan Proyek MUTIP 1 (Final Quantity and PHO)', '8', '', 1, 1),
(650, 28, 35, '2023-10-13', 'WFA', 'Zoom Forum HSE WIKA Group Program Tematik HSE : Electrical Safety', '3', 'https://drive.google.com/open?id=1b2Q1A44LT73E4bGbiP5V7Sz0UVN7klU0', 1, 1),
(651, 28, 27, '2023-10-13', 'WFA', 'Zoom Evaluasi Perencanaan dan Pengendalian RKP Bab 3 Engineering Proyek Tol IKN 3B', '2', 'https://drive.google.com/open?id=1CEx736Hk72N580mw8ZIBoMALSyxMF5Lg', 1, 1),
(652, 28, 27, '2023-10-13', 'WFA', 'Zoom Evaluasi Perencanaan dan Pengendalian RKP Bab 3 Engineering Proyek MWRD', '1,5', 'https://drive.google.com/open?id=1CrFe3hDho37YteDFpxdZPfgL2fI62qNX', 1, 1),
(653, 28, 27, '2023-10-13', 'WFA', 'Zoom Evaluasi Perencanaan dan Pengendalian RKP Bab 3 Engineering Proyek Jalan dan Jembatan Samba Hiran', '2', 'https://drive.google.com/open?id=1CDKfMp1URqX0tuP1efq7Th4ilA_tsY0M', 1, 1),
(654, 28, 35, '2023-10-13', 'WFA', 'Teams Telekonsultasi dengan Nutrisionist dan Personal Trainer Program Wellness Kesehatan WIKA', '1', 'https://drive.google.com/open?id=1Y2P3icpuY7k8ANhk2t5ZYEm_YrX6MJEh', 1, 1),
(655, 44, 29, '2023-10-14', 'WFA', 'mengerjakan koreksi dan finising tugas pelatihan mankon', '8', 'https://drive.google.com/open?id=1p2HAPqVJyZ7KKQRYzvKSp5262u1b7I_r', 1, 1),
(656, 32, 35, '2023-10-14', 'WFO', 'Perbantuan Proyek MUTIP 1 (Final Quantity and PHO)', '8', '', 1, 1),
(657, 44, 9, '2023-10-15', 'WFA', 'mengerjakan tugas mapping komersial dan upload tugas', '8', 'https://drive.google.com/open?id=1iNxQoFRAzm3-Si-ZcCTV3wa0S5Cfrj7I', 1, 1),
(658, 32, 35, '2023-10-15', 'WFO', 'Perbantuan Proyek MUTIP 1 (Final Quantity and PHO)', '8', 'https://drive.google.com/open?id=1Np9s3Z7GSpRu7BzZKLCWc54Zz6fWXmq7', 1, 1),
(659, 45, 35, '2023-10-16', 'WFO', 'apel pagi suddiv enjinering infra2', '1', '', 1, 1),
(660, 48, 32, '2023-10-16', 'WFA', 'Zoom Apel Pagi Eng. Div Infra 2', '1,5', 'https://drive.google.com/open?id=1RdRMzPFDdPvpFnTcr4Xbbvia6cDdDCw6', 1, 1),
(661, 48, 27, '2023-10-16', 'WFA', 'Zoom Review RKP Bab 3 Proyek MUTIP', '1,5', 'https://drive.google.com/open?id=1zKDk1BmY-Tl-2JyZGp-Cf0SEtm0daUrG', 1, 1),
(662, 41, 20, '2023-10-16', 'WFO', 'IT Intern tim digitalisasi Infra2', '8', 'https://drive.google.com/open?id=14myjWtEgJZT9JpxmmArrswQk828q6wzP', 1, 1),
(663, 41, 20, '2023-10-16', 'WFO', 'mempelajari proses bisnis website digitalisasi infra2', '8', 'https://drive.google.com/open?id=1i1SyBGxEJXOQLIgZvW0FVO02Q9AjvJrj', 1, 1),
(664, 45, 35, '2023-10-16', 'WFO', 'ZOOM Review RKP dengan proyek MUTIP', '2', '', 1, 1),
(665, 41, 20, '2023-10-16', 'WFO', 'briefing task', '8', 'https://drive.google.com/open?id=1LF9YnGEqL65xYIWB10RCocNkA_R3ZOCo', 1, 1),
(666, 48, 27, '2023-10-16', 'WFA', 'Zoom Review RKP Bab 3 Proyek Lingkar Kijing', '1,5', 'https://drive.google.com/open?id=1PAJpBEoUjfEOHmua-J4IDdzFV6ohel0G', 1, 1),
(667, 48, 27, '2023-10-16', 'WFA', 'Kordinasi PIC Div to PIC Proyek Bendungan Pamukkulu', '2', '', 1, 1),
(668, 48, 7, '2023-10-16', 'WFA', 'Kordinasi PIC Div to PIC proyek IKN Toll pembahasan KI-KM', '2', '', 1, 1),
(669, 37, 0, '2023-10-16', 'WFA', 'Koordinasi dan monitoring tim digimon', '3', '', 1, 1),
(670, 37, 16, '2023-10-16', 'WFA', 'Supporting BIM Proyek Thursina', '1,5', 'https://drive.google.com/open?id=1Ev2gkUo9qriXBBtaCB6eBFg_v7Z6nB2z', 1, 1),
(671, 37, 27, '2023-10-16', 'WFA', 'RKP review RJN', '1,5', 'https://drive.google.com/open?id=1oDA-BAl47lg6kAs0iw8UPy-VyNsU92m5', 1, 1),
(672, 46, 11, '2023-10-16', 'WFA', 'koordinasi intern engineering infra 2', '1', '', 1, 1),
(673, 46, 27, '2023-10-16', 'WFA', 'zoom review RKP proyek infra 2', '3', '', 1, 1),
(674, 46, 28, '2023-10-16', 'WFA', 'monitoring LPS proyek infra 2', '4', '', 1, 1),
(675, 45, 7, '2023-10-16', 'WFO', 'penulisan dan penyiapan PPT ki/km kolaborasi dengan proyek MUTIP', '3,5', '', 1, 1),
(676, 39, 29, '2023-10-16', 'WFO', 'Revisi Monitoring Lisensi Software Mamminasata', '4', '', 1, 1),
(677, 39, 16, '2023-10-16', 'WFA', 'Pendampingan Dredging Tursina', '1', '', 1, 1),
(678, 39, 29, '2023-10-16', 'WFO', 'membuat database dashboard software lisensi', '3', '', 1, 1),
(679, 49, 29, '2023-10-16', 'WFO', 'rakor sub divisi engineeering', '1', '', 1, 1),
(680, 49, 27, '2023-10-16', 'WFO', 'ZOOM Review RKP dengan proyek MUTIP', '2', '', 1, 1),
(681, 49, 24, '2023-10-16', 'WFO', 'penggabungan 2 IK', '2', '', 1, 1),
(682, 47, 35, '2023-10-16', 'WFO', 'Apel pagi Sub Div infra 2', '1', '', 1, 1),
(683, 47, 27, '2023-10-16', 'WFO', 'Zoom Review RKP proyek Mutip \nzoom Review RKP proyek Lingkar Kijing', '3', 'https://drive.google.com/open?id=1X1r7NnlQWvhNHktwsEiUC6mLxfqUHSEe', 1, 1),
(684, 33, 35, '2023-10-16', 'WFA', 'Ekspos LHE BPKP proyek Labuan - Tanamori', '8', 'https://drive.google.com/open?id=1UARBxRSitRmb69QMEFtinCrBUJUK2pz7', 1, 1),
(685, 29, 2, '2023-10-16', 'WFO', 'Meeting dengan P2JN Tim proyek Samba - Hiran', '2,5', 'https://drive.google.com/open?id=189BLSNSsU_0ui4nOUn6iu7aNnhaDJj75', 1, 1),
(686, 30, 2, '2023-10-16', 'WFO', 'Meeting dengan P2JN Tim proyek Samba - Hiran', '3', 'https://drive.google.com/open?id=189BLSNSsU_0ui4nOUn6iu7aNnhaDJj75', 1, 1),
(687, 49, 29, '2023-10-16', 'WFO', 'Koordinasi KI KM kolaborasi', '2', '', 1, 1),
(688, 34, 2, '2023-10-16', 'WFO', 'Memo Teknis Pengecoran Mass Concrete Proyek Sumbu Timur', '2', 'https://drive.google.com/open?id=1BnNl0c-jnPwxjJSOIcKkWRX-ynEYCmF0', 1, 1),
(689, 30, 2, '2023-10-16', 'WFO', 'Review Memo Teknis Pengecoran Mass Concrete Proyek Sumbu Timur', '3', 'https://drive.google.com/open?id=1BnNl0c-jnPwxjJSOIcKkWRX-ynEYCmF0', 1, 1),
(690, 34, 29, '2023-10-16', 'WFO', 'Pembuatan materi Meet The Engineers #2', '3', 'https://drive.google.com/open?id=1ilZDwLj-akfSYL0rurz3fv4zObtQiu_W', 1, 1),
(691, 38, 12, '2023-10-16', 'WFA', 'MEMPERBAIKI SLIDE MR', '8', '', 1, 1),
(692, 51, 26, '2023-10-16', 'WFO', 'Koordinasi sistem engineering', '1,5', 'https://drive.google.com/open?id=1vnhB8GQ_PcZ4kKc4TAdmoa1vr7hbWKa0', 1, 1),
(693, 51, 27, '2023-10-16', 'WFO', 'Mengikuti zoom meeting RKP review proyek Mandalika', '2', 'https://drive.google.com/open?id=1UIV-xc_ASfxVGxt5o9VShSwOftGbwvGj', 1, 1),
(694, 51, 35, '2023-10-16', 'WFO', 'Mempelajari dokumen teknis dan diskusi persiapan rencana proyek IPAL IKN.', '4,5', '', 1, 1),
(695, 29, 2, '2023-10-16', 'WFO', 'Analisis kebutuhan pondasi proyek samba hiran', '7', '', 1, 1),
(696, 50, 27, '2023-10-16', 'WFO', 'Apel pagi Sistem Eng & 32\nReview RKP MUTIP\nReview RKP Lingkar Kijing', '6', '', 1, 1),
(697, 42, 28, '2023-10-16', 'WFO', 'Menyusun program kerja sistem engineering dan 32 untuk 2 minggu ke depan', '1', '', 1, 1),
(698, 42, 35, '2023-10-16', 'WFO', 'Perjalanan dinas dari Jakarta ke Banjarmasin untuk menghadiri undangan rapat pemeliharaan proyek Bypass Banjarmasin di BPJN Kalsel', '3', 'https://drive.google.com/open?id=1zSQxLevCOs7h6LkuruUrQvDeRIeBQnpv', 1, 1),
(699, 42, 35, '2023-10-16', 'WFO', 'Rapat di BPJN Kalsel membahas rencana pelaksanaan pemeliharaan proyek Bypass Banjarmasin', '3', 'https://drive.google.com/open?id=1_sbllzOxqs_Yx2J4Nb_8wAYE7n2_NHcs', 1, 1),
(700, 42, 27, '2023-10-16', 'WFO', 'Zoom Evaluasi RKP Bab 3 Perencanaan & Pengendalian Engineering Proyek Relokasi Jalan Nasional Kijing Mempawah', '1', 'https://drive.google.com/open?id=1QhCE1aMnFUXW6pKhoJxAlL0ZVaDhgHoZ', 1, 1),
(701, 32, 35, '2023-10-16', 'WFO', 'Perbantuan Proyek MUTIP 1 (Final Quantity and PHO)', '8', 'https://drive.google.com/open?id=1-2kcC9UMXdPeY_gfojyQCkY3zruoGPab', 1, 1),
(702, 28, 27, '2023-10-16', 'WFA', 'Apel Pagi Sistem Engineering & 32', '1,5', 'https://drive.google.com/open?id=1Zm1dyCSeQ08_BXjfY4Gtd4Y-vZSnDdPr', 1, 1),
(703, 28, 27, '2023-10-16', 'WFA', 'Zoom Evaluasi Perencanaan dan Pengendalian RKP Bab 3 Engineering Proyek MUTIP', '2', 'https://drive.google.com/open?id=1sxFpV864cc6EhLh0scmRR2dgWIDBkTpp', 1, 1),
(704, 28, 27, '2023-10-16', 'WFA', 'Zoom Evaluasi Perencanaan dan Pengendalian RKP Bab 3 Engineering Proyek Relokasi Jalan Nasional Lingkar Kijing', '2', 'https://drive.google.com/open?id=1fq3PKuxk45KOJL4ifuLqEYk6ohhMFgr8', 1, 1),
(705, 28, 35, '2023-10-16', 'WFA', 'Zoom Pembahasan Internal Pengajuan Kompensasi Proyek Kijing', '2,5', 'https://drive.google.com/open?id=1TKBD50EOxsdZ9mw6Y4LQNZiGJpy_TBhs', 1, 1),
(706, 48, 27, '2023-10-17', 'WFA', 'Zoom Review RKP Update Bab 3 Proyek Dredging Alur Tursina', '1,5', 'https://drive.google.com/open?id=1TXgJIndXYeqq9xGAI5NbN_RELh4vgQRY', 1, 1),
(707, 48, 32, '2023-10-17', 'WFA', 'Zoom Sosialisasi Prosedur Manajemen Proyek', '2', 'https://drive.google.com/open?id=1Onc9g7u-i5I-Wm-2gjkn4VuDc5Xo1fh0', 1, 1),
(708, 45, 35, '2023-10-17', 'WFO', 'Zoom Review RKP Bab 3 Proyek Dredging Tursina', '1,5', '', 1, 1),
(709, 45, 35, '2023-10-17', 'WFO', 'Zoom SOSIALISASI HASIL RE-ALIGNMENT PROSEDUR MANAJEMEN PROYEK', '2', '', 1, 1),
(710, 48, 27, '2023-10-17', 'WFA', 'Zoom RKP Update Bab 3 Proyek Bendungan Manikin', '1,5', 'https://drive.google.com/open?id=1KK93f93NXVxB-AtbC3kM46W2OHa150z8', 1, 1),
(711, 37, 29, '2023-10-17', 'WFA', 'Sosialisasi prosedur PCP', '2,5', 'https://drive.google.com/open?id=1DSbA_0435Bvu2u8bFf_7RnOjWfkQmS0f', 1, 1),
(712, 37, 16, '2023-10-17', 'WFA', 'Supporting BIM Ameroro', '1,5', 'https://drive.google.com/open?id=1an29YhefqH4S8hmo0tuj65kjbeWk5f7u', 1, 1),
(713, 37, 27, '2023-10-17', 'WFA', 'RKP Review proyek Manikin', '1,5', 'https://drive.google.com/open?id=1hBGnbsOro0gR9r2M0p2ayW1Y6O2Mq4lr', 1, 1),
(714, 37, 12, '2023-10-17', 'WFA', 'Content MR III', '2,5', '', 1, 1),
(715, 48, 35, '2023-10-17', 'WFA', 'Kordinasi PIC review RKP proyek di mundur ke 19 oktober 8.30 pagi karena ada ST HC', '1', '', 1, 1),
(716, 48, 11, '2023-10-17', 'WFA', 'Kordinasi antar PIC RKP Bab 3 di divisi sehubungan perubahan jadwal', '1,5', '', 1, 1),
(717, 41, 11, '2023-10-17', 'WFO', 'Koordinasi Proses Bisnis Website', '4', '', 1, 1),
(718, 46, 27, '2023-10-17', 'WFA', 'sosialisasi hasil re-aligment prosedur manajemen proyek', '3', '', 1, 1),
(719, 46, 28, '2023-10-17', 'WFA', 'review RKP proyek infra 2', '3', '', 1, 1);
INSERT INTO `engineering_activity` (`id_engineering_activity`, `id_user`, `id_kategori_pekerjaan`, `tanggal_masuk_kerja`, `status_kerja`, `judul_pekerjaan`, `durasi`, `evidence`, `checked`, `validasi`) VALUES
(720, 46, 35, '2023-10-17', 'WFA', 'colecting dan monitoring LPS proyek infra 2', '2', '', 1, 1),
(721, 45, 27, '2023-10-17', 'WFO', 'Zoom Review RKP dengan proyek Kerom', '2', '', 1, 1),
(722, 48, 35, '2023-10-17', 'WFA', 'Zoom RKP Update Bab 3 Proyek LC Keerom', '1,5', 'https://drive.google.com/open?id=1INu35QvBoQN21sGn3Ow6FKD7HIEDPb6L', 1, 1),
(723, 47, 27, '2023-10-17', 'WFO', 'Zoom Sosialisasi prosedur manajemen poryeek', '2,5', 'https://drive.google.com/open?id=1VlkXlIE3IoIeDTXKR0dzpos8DNmgKiYQ', 1, 1),
(724, 47, 20, '2023-10-17', 'WFO', 'Zoom Review RKP proyek Land Clearing Keerom\nZoom Review RKP proyek Dredging Tursina\nZoom Review RKP proyek Bendungan Manikin', '5', 'https://drive.google.com/open?id=1sajEpSennZOcWjfkl9WsqK-UFdp4Q-OT', 1, 1),
(725, 41, 35, '2023-10-17', 'WFO', 'meeting proses bisnis website', '4', 'https://drive.google.com/open?id=1WBSuIt9yt-zDH65c4PxvxRm-yK565lU1', 1, 1),
(726, 33, 14, '2023-10-17', 'WFA', 'Perjalan kembali dari Kupang', '6', '', 1, 1),
(727, 33, 27, '2023-10-17', 'WFA', 'Rakor desis sub divisi Engineering indra 2', '1,5', 'https://drive.google.com/open?id=14ry32B81aNAvcZoFn102X1F88XvIvfEp', 1, 1),
(728, 49, 31, '2023-10-17', 'WFO', 'Zoom Review RKP dengan proyek Kerom', '2', '', 1, 1),
(729, 49, 27, '2023-10-17', 'WFO', 'Zoom SOSIALISASI HASIL RE-ALIGNMENT PROSEDUR MANAJEMEN PROYEK', '2', '', 1, 1),
(730, 49, 12, '2023-10-17', 'WFO', 'Zoom Review RKP Bab 3 Proyek Dredging Tursina', '1,5', '', 1, 1),
(731, 38, 27, '2023-10-17', 'WFO', 'MEMPERBAIKI SLIDE MR', '8', '', 1, 1),
(732, 51, 35, '2023-10-17', 'WFO', 'Mengikuti zoom RKP review proyek PKT Bontang', '1', 'https://drive.google.com/open?id=1wRjboQKQ-wBqZRGZ81onXMONT1mCsF9E', 1, 1),
(733, 51, 27, '2023-10-17', 'WFO', 'Mengikuti sosialisasi prosedur pengendalian proyek.', '2', 'https://drive.google.com/open?id=1gmlU6AL1t9UC6vmdl5Pyi883UEohCOzb', 1, 1),
(734, 51, 27, '2023-10-17', 'WFO', 'Mengikuti zoom RKP review proyek Manikin.', '3,5', 'https://drive.google.com/open?id=1zcfFSP6UZV5fzjQPh4CVZ6QKMTXZixYV', 1, 1),
(735, 51, 11, '2023-10-17', 'WFO', 'Mengikuti zoom RKP review proyek Keerom.', '1', 'https://drive.google.com/open?id=1h_b_4n6RQOY073oXNWZdpYBXGzV-0-LF', 1, 1),
(736, 39, 16, '2023-10-17', 'WFO', 'Persiapaan Meet the Engineer', '4', '', 1, 1),
(737, 39, 27, '2023-10-17', 'WFO', 'Monitoring Implementasi BIM Prioritas 2', '4', '', 1, 1),
(738, 29, 27, '2023-10-17', 'WFO', 'RKP Proyek Dredging Tursina', '2,5', 'https://drive.google.com/open?id=1vSuuroCO92xb3-WoshkBjLeG0wwN7f50', 1, 1),
(739, 30, 11, '2023-10-17', 'WFO', 'RKP Proyek Dredging Tursina', '2,5', 'https://drive.google.com/open?id=1vSuuroCO92xb3-WoshkBjLeG0wwN7f50', 1, 1),
(740, 29, 11, '2023-10-17', 'WFO', 'Rakor Tim Desain dan Analisis Engineering Infra 2', '2', 'https://drive.google.com/open?id=1CuwSKhyz6CDCfRdEGqErQPfW5K1JH-KD', 1, 1),
(741, 30, 29, '2023-10-17', 'WFO', 'Rakor Tim Desain dan Analisis Engineering Infra 2', '2', 'https://drive.google.com/open?id=1CuwSKhyz6CDCfRdEGqErQPfW5K1JH-KD', 1, 1),
(742, 34, 29, '2023-10-17', 'WFO', 'Pelatihan QA/QC batch 3', '4', 'https://drive.google.com/open?id=1sp6IoC-K2MQFquVmNWmO-H6XuO1WeSbZ', 1, 1),
(743, 34, 27, '2023-10-17', 'WFO', 'Pelatihan QA/QC', '4', 'https://drive.google.com/open?id=1LRSE0Q_ChEt2J11AIMAW-r4J10ZrdgLm', 1, 1),
(744, 50, 27, '2023-10-17', 'WFO', 'Review RKP Bab 3 Proyek Dredging Tursina \nSosialisasi hasil Re-Alignment Prosedur Manajemen Proyek\nReview RKP Bab 3 Proyek Bendungan Manikin\nReview RKP proyek Land Clearing Keerom', '7', '', 1, 1),
(745, 42, 24, '2023-10-17', 'WFO', 'Zoom Evaluasi RKP Bab 3 Perencanaan & Pengendalian Engineering Proyek Dredging Tursina', '1,5', 'https://drive.google.com/open?id=1VRwgK6PFfogfLATTD5bhU5jrnJ-uSkIn', 1, 1),
(746, 42, 27, '2023-10-17', 'WFO', 'Mengikuti SOSIALISASI HASIL RE-ALIGNMENT PROSEDUR MANAJEMEN PROYEK', '2,5', 'https://drive.google.com/open?id=1DEcc5IdvQz9aDHoU254y4g1blqiC4eXi', 1, 1),
(747, 42, 35, '2023-10-17', 'WFO', 'Zoom Evaluasi RKP Bab 3 Perencanaan & Pengendalian Engineering Proyek Bendungan Manekin', '1,5', 'https://drive.google.com/open?id=1tBkY_n_hV0I7kg213j4BCWOb98gglwi7', 1, 1),
(748, 42, 35, '2023-10-17', 'WFO', 'Perjalanan dinas balik dari Banjarmasin ke Jakarta', '2', 'https://drive.google.com/open?id=1uLK9_BHtVeZLTnDpp4vgjhyp7OYhIH2B', 1, 1),
(749, 32, 27, '2023-10-17', 'WFO', 'Perbantuan Proyek MUTIP 1 (Final Quantity and PHO)', '8', 'https://drive.google.com/open?id=1FCj3zVubzlErMKMSX6ojuxvW8h8Dpclw', 1, 1),
(750, 28, 24, '2023-10-17', 'WFA', 'Zoom Evaluasi Perencanaan dan Pengendalian RKP Bab 3 Engineering Proyek Dredging Tursina PKT Bontang', '2', 'https://drive.google.com/open?id=1M9b4zWOsSiPloo6YzMw7DOygHzjC_qHo', 1, 1),
(751, 28, 35, '2023-10-17', 'WFA', 'Zoom Sosialisasi Prosedur Manajemen Proyek', '3', 'https://drive.google.com/open?id=179UK7OAXNpncSJEUmHz8ISf8D9Tcn4y_', 1, 1),
(752, 28, 27, '2023-10-17', 'WFA', 'Zoom Tugas Pelatihan Finance for Non Finance', '3', 'https://drive.google.com/open?id=1_nxOlZzO4Fl38_dkSvwZN3tBIw2qB0HN', 1, 1),
(753, 48, 27, '2023-10-18', 'WFA', 'Collecting and uploading bahan PPT Proyek Bendungan Pamukkulu untuk Review RKP Bab 3', '2', 'https://drive.google.com/open?id=1BYk54w9MrZgwHMDmxOp7ZX33POoA1mZT', 1, 1),
(754, 48, 20, '2023-10-18', 'WFA', 'Zoom Review RKP Bab 3 Proyek Bandara Banggai', '1,5', 'https://drive.google.com/open?id=16XlDWdNlRQPY0QNnyg1SAQAEW6atvzzk', 1, 1),
(755, 41, 35, '2023-10-18', 'WFO', 'membuat usecase website', '4', 'https://drive.google.com/open?id=1SNuriY69TaC8X2ABjXz7vSEFNZ18XTq5', 1, 1),
(756, 48, 35, '2023-10-18', 'WFA', 'Mempelajari KI-KM OPTIMASI DESAIN STRUKTUR ADDITIONAL LIFT WEST CENTRAL OFFICE BUILDING (COB)', '2', 'https://drive.google.com/open?id=1F6wGIVh5vIhJyjB2spO2x3kMEQ_fPiJi', 1, 1),
(757, 45, 29, '2023-10-18', 'WFO', 'Zoom Review RKP BAB 3 Enjinering dengan proyek Kerom', '2', '', 1, 1),
(758, 44, 27, '2023-10-18', 'WFO', 'sosialisai prosedur tata kelola perusahaan', '1', 'https://drive.google.com/open?id=1_4xnQl6cLBIc_QDEHQdR0nF1atIv-93O', 1, 1),
(759, 44, 29, '2023-10-18', 'WFO', 'Review RKP Bab 3 Engineering Bandara Banggai', '1,5', 'https://drive.google.com/open?id=1nKc_XMJIbSXkchLU3ro4C_JNZW8jfAdt', 1, 1),
(760, 48, 35, '2023-10-18', 'WFA', 'Zoom Sheering Knowledge - Meet The Eng. October', '3', 'https://drive.google.com/open?id=13OMKSN9cxJl3kdoHMnJJq9EK-CTUcbSV', 1, 1),
(761, 45, 35, '2023-10-18', 'WFO', 'Zoom Topic: meet the Engineer #2 dilingkungan Infrastruktur 2', '3', '', 1, 1),
(762, 45, 27, '2023-10-18', 'WFO', 'membaca prosedur', '2', '', 1, 1),
(763, 46, 11, '2023-10-18', 'WFA', 'review RKP proyek infra 2', '1,5', '', 1, 1),
(764, 46, 28, '2023-10-18', 'WFA', 'meet the engineering #2', '3', '', 1, 1),
(765, 46, 27, '2023-10-18', 'WFA', 'colecting data LPS proyek infra 2', '4', '', 1, 1),
(766, 47, 29, '2023-10-18', 'WFO', 'Zoom review RKP proyek Bandara Banggai', '1,5', 'https://drive.google.com/open?id=1jD1o0i1gyN3dYJCsbeG8bQe2jjt5M1AH', 1, 1),
(767, 47, 29, '2023-10-18', 'WFO', 'Zoom Meet Engineering Infra 2 proyek Underpass Tatakan dan proyek PASIGALA Raw Water', '3', 'https://drive.google.com/open?id=1HloV78i2ukLWBLhYyEw6Sw56rUGXgsUO', 1, 1),
(768, 33, 27, '2023-10-18', 'WFA', 'Webinar meet the engineer eps. 02', '3', 'https://drive.google.com/open?id=191oF_RF8ttImfAWcdARW_Wt3vTKO2Moh', 1, 1),
(769, 33, 29, '2023-10-18', 'WFA', 'Review RKP bandara banggai', '1,5', '', 1, 1),
(770, 49, 27, '2023-10-18', 'WFO', 'Zoom Topic: meet the Engineer #2 dilingkungan Infrastruktur 2', '3', '', 1, 1),
(771, 49, 27, '2023-10-18', 'WFO', 'Zoom Topic: meet the Engineer #2 dilingkungan Infrastruktur 2', '2', '', 1, 1),
(772, 49, 20, '2023-10-18', 'WFO', 'Zoom Review RKP BAB 3 Enjinering dengan proyek Kerom', '2', '', 1, 1),
(773, 41, 12, '2023-10-18', 'WFO', 'Master of Ceremony Meet The engineering oct 2023', '4', 'https://drive.google.com/open?id=1cSR3o9lPj4xlvrOdfFmpNbU5PAIOnB9l', 1, 1),
(774, 37, 18, '2023-10-18', 'WFO', 'Diskusi dan finishing conten MR', '7,5', '', 1, 1),
(775, 38, 35, '2023-10-18', 'WFO', 'PERSIAPAN DAN ACARA MEET THE ENGINEER', '6', '', 1, 1),
(776, 51, 35, '2023-10-18', 'WFO', 'Membuat inventaris jaringan pipa rencana proyek IPAL IKN.', '3', 'https://drive.google.com/open?id=1FYLt0BkocUUrcM4C5OprJqTn37JZGRUA', 1, 1),
(777, 51, 11, '2023-10-18', 'WFO', 'Membuat sequence pekerjaan jacking rencana proyek IPAL IKN.', '5', '', 1, 1),
(778, 39, 11, '2023-10-18', 'WFO', 'Persiapan Meet the Engineer Oktober', '4', '', 1, 1),
(779, 39, 29, '2023-10-18', 'WFO', 'Panitia kegiatan meet the enginer infra 2 Oktober', '3', '', 1, 1),
(780, 39, 35, '2023-10-18', 'WFO', 'Revisi Monitoring Lisensi Software SPAM Mamminasata', '4', '', 1, 1),
(781, 50, 29, '2023-10-18', 'WFO', 'Sosialisasi Prosedur Tata Kelola Perusahaan\nReview RKP Bab 3 Proyek Bandara Banggai\nMeet the engineer #2 \nMembaca Prosedur', '7', '', 1, 1),
(782, 34, 29, '2023-10-18', 'WFO', 'Persentasi Meet The Engineer #2', '3', 'https://drive.google.com/open?id=1h5-Ch8wHLzujTw_qnJ3faG3tAMlijOGY', 1, 1),
(783, 30, 27, '2023-10-18', 'WFO', 'Moderator Meet The Engineer #2', '5', 'https://drive.google.com/open?id=1h5-Ch8wHLzujTw_qnJ3faG3tAMlijOGY', 1, 1),
(784, 42, 27, '2023-10-18', 'WFO', 'Koordinasi update PIC personel sistem engineering & 32', '1', '', 1, 1),
(785, 42, 27, '2023-10-18', 'WFO', 'Koordinasi materi MR sub divisi engineering, proposal KI/KM award', '1', '', 1, 1),
(786, 42, 35, '2023-10-18', 'WFO', 'Zoom Evaluasi RKP Bab 3 Perencanaan & Pengendalian Engineering Proyek Bandara Banggai', '1', 'https://drive.google.com/open?id=1BgfZb9S7MZQNNX58tlHN4152MrWs4Iy0', 1, 1),
(787, 42, 11, '2023-10-18', 'WFO', 'Bertemu vendor aspal PT Karya Aspal Mandiri terkait sisa hutang proyek Bypass Banjarmasin', '0,5', 'https://drive.google.com/open?id=1usAtEJRAENF5OZ4nPBU58zZtzUIeLGT4', 1, 1),
(788, 42, 35, '2023-10-18', 'WFO', 'Mengikuti acara Meet the Engineer #2 (Proyek Pasigala & Underpass Tatakan)', '2,5', 'https://drive.google.com/open?id=1BaHHTfSkTDqdb3JUwo7_Vomz8Z5x8rhk', 1, 1),
(789, 42, 35, '2023-10-18', 'WFO', 'Diskusi dengan Adkon (pak Agus Istianto) terkait update eskalasi proyek', '0,5', '', 1, 1),
(790, 32, 35, '2023-10-18', 'WFO', 'Perbantuan Proyek MUTIP 1 (Final Quantity and PHO)', '8', 'https://drive.google.com/open?id=1Upcl59_IRmfV7UF9ZqeCvCYP_AkNRP8Z', 1, 1),
(791, 29, 35, '2023-10-18', 'WFO', 'Persiapan paparan management review DOP 1', '2,5', '', 1, 1),
(792, 30, 35, '2023-10-18', 'WFO', 'Persiapan paparan management review DOP 1', '3', '', 1, 1),
(793, 29, 2, '2023-10-18', 'WFO', 'Analisis kebutuhan pondasi proyek samba hiran', '7', '', 1, 1),
(794, 28, 35, '2023-10-18', 'WFA', 'Rapat Mediasi Tripartit Penyelesaian Kompensasi Proyek Kijing di JAMDATUN', '3,5', 'https://drive.google.com/open?id=1CV8k_qFMQdIpDIheIFQKSxcstQ1geO_D', 1, 1),
(795, 28, 35, '2023-10-18', 'WFA', 'Zoom Pelatihan Finance for Non Finance', '3,5', 'https://drive.google.com/open?id=1IOmcSrCpJ3VnYkTKUzy2vaEfCiy7Q9BC', 1, 1),
(796, 28, 18, '2023-10-18', 'WFA', 'Zoom Program Meet The Engineer Infra 2 Proyek Underpass Tatakan', '1,5', 'https://drive.google.com/open?id=1_TllHuxS3nV4jpYoQoqnHAdeIociR_-m', 1, 1),
(797, 48, 27, '2023-10-19', 'WFA', 'Zoom Update Review RKP Bab 3 Proyek Bendungan Pamukkulu', '1,5', 'https://drive.google.com/open?id=1o49eY0IB9FNEs_eE7F58i7aL1EsaHmua', 1, 1),
(798, 48, 29, '2023-10-19', 'WFA', 'Zoom Webinar Artificial inteligence driven road asset management IA-ITB', '4', 'https://drive.google.com/open?id=1owlw6YwgDr3AC54oIXW8ADF6a_ArfJxX', 1, 1),
(799, 45, 35, '2023-10-19', 'WFO', 'Zoom Review RKP BAB3 Enjinering dengan proyek Bendungan Pamukkulu', '2', '', 1, 1),
(800, 45, 35, '2023-10-19', 'WFO', 'Meeting persiapan untuk KI/KM Rewards Inrfastruktur2', '1', '', 1, 1),
(801, 45, 35, '2023-10-19', 'WFO', 'membaca2 ki/km di portal wika', '3,5', '', 1, 1),
(802, 49, 27, '2023-10-19', 'WFO', 'Zoom Review RKP Bab 3 Proyek Bendungan Pamukkulu', '1,5', '', 1, 1),
(803, 41, 20, '2023-10-19', 'WFO', 'membuat proses bisnis website', '4', 'https://drive.google.com/open?id=1gefgIY19I-5uVI-eT_DKFb50wszW_frT', 1, 1),
(804, 49, 7, '2023-10-19', 'WFO', 'Rakor KI KM award', '2,5', 'https://drive.google.com/open?id=1am-DhDnwkMIeyKuhnd8YX0b4oUF1N9x5', 1, 1),
(805, 41, 20, '2023-10-19', 'WFO', 'membuat landing page website', '4', 'https://drive.google.com/open?id=1huWlkcQtep42Ksmi6ps0h9lo7Itwxc0M', 1, 1),
(806, 44, 27, '2023-10-19', 'WFO', 'Zoom Meeting Review RKP Engineering Proyek Bendungan Pammukulu', '1,5', 'https://drive.google.com/open?id=1QDGDxonzOGjOnQt1s2IU8zEH_n6Oe54B', 1, 1),
(807, 44, 7, '2023-10-19', 'WFO', 'Rapat Koordinasi Ki/Km Award', '2,5', '', 1, 1),
(808, 48, 7, '2023-10-19', 'WFA', 'Kordinasi KI-KM dengan PIC Proyek IKN tol', '1', '', 1, 1),
(809, 48, 7, '2023-10-19', 'WFA', 'Kordinasi KI-KM dengan PIC proyek Bendungan Pamukkulu', '1', '', 1, 1),
(810, 48, 7, '2023-10-19', 'WFA', 'Kordinasi antar PIC di divisi eng. infra 2 mengenai update KI-KM', '1', '', 1, 1),
(811, 46, 27, '2023-10-19', 'WFA', 'review RKP proyek infra 2', '2', '', 1, 1),
(812, 46, 28, '2023-10-19', 'WFA', 'colecting LPS proyek infra 2', '6', '', 1, 1),
(813, 49, 24, '2023-10-19', 'WFO', 'Penyusunan IK engineering', '3', '', 1, 1),
(814, 37, 12, '2023-10-19', 'WFO', 'MR DOP 1', '8', '', 1, 1),
(815, 38, 11, '2023-10-19', 'WFO', 'MR di Wikasatrian', '8', '', 1, 1),
(816, 51, 27, '2023-10-19', 'WFO', 'Mengikuti zoom RKP review proyek Pamukkulu.', '1,5', 'https://drive.google.com/open?id=1Y_nxPayDMLggtJXsd8_G8-Aq6mA7STvU', 1, 1),
(817, 51, 35, '2023-10-19', 'WFO', 'Meeting / koordinasi team rencana proyek IPAL IKN.', '2', '', 1, 1),
(818, 51, 35, '2023-10-19', 'WFO', 'Melanjutkan inventaris jaringan pipa rencana proyek IPAL IKN.', '4,5', '', 1, 1),
(819, 39, 16, '2023-10-19', 'WFO', 'Koordinasi BIM dengan proyek Mamminasata', '2', '', 1, 1),
(820, 47, 27, '2023-10-19', 'WFO', 'Zoom review RKP Bab 3 pryek Bendungan Pamukkulu', '1,5', 'https://drive.google.com/open?id=19r6tylhmLm9M6xX4rh-50jIjBWmiUQ45', 1, 1),
(821, 47, 35, '2023-10-19', 'WFO', 'Rakor KIKM Award Infra 2', '1,5', '', 1, 1),
(822, 47, 35, '2023-10-19', 'WFO', 'Bantu penulisan KIKM Proyek Keerom', '1,5', 'https://drive.google.com/open?id=1YvXDkZdbcayV2UPWNGDMwrnquPYJoIgu', 1, 1),
(823, 50, 27, '2023-10-19', 'WFO', 'Review RKP Bab 3 Proyek Bendungan Pamukkulu\nReview RKP BAB 3 Proyek Duplikasi Jembatan Kapuas \nMembaca artikel KI/KM', '6', '', 1, 1),
(824, 42, 27, '2023-10-19', 'WFO', 'Zoom Evaluasi RKP Bab 3 Perencanaan & Pengendalian Engineering Proyek Bendungan Pamukkulu', '1,5', 'https://drive.google.com/open?id=17LAaLr6sh05_y_MlhpJFcJ9NI4MpfOAs', 1, 1),
(825, 42, 7, '2023-10-19', 'WFO', 'Rapat persiapan KI/KM award divisi infrastruktur 2', '2', 'https://drive.google.com/open?id=1V-e5ifbFZCvvtAguKISL7QZbtdeiKEf-', 1, 1),
(826, 42, 25, '2023-10-19', 'WFO', 'Mengikuti MR IV Divisi Infrastruktur 2 di Wikasatrian', '6', 'https://drive.google.com/open?id=1-2k9wy8CCw1di0z4DYZ3EIfjglCgYFIA', 1, 1),
(827, 34, 29, '2023-10-19', 'WFO', 'Pelatihan QA/QC', '4', 'https://drive.google.com/open?id=1YIhyTFsHOXGLEoeClmxAjKjhdo4WrEAa', 1, 1),
(828, 34, 7, '2023-10-19', 'WFO', 'Penulisan Karya Inovasi Metode Jacking Box Underpass Tatakan 101', '3', 'https://drive.google.com/open?id=1ZwvZ9D_ighR68XhX_kr1HiJXPXZ8f1LA', 1, 1),
(829, 29, 35, '2023-10-19', 'WFA', 'Management Review DOP 1', '8', '', 1, 1),
(830, 30, 35, '2023-10-19', 'WFA', 'Management Review DOP 1', '8', '', 1, 1),
(831, 28, 35, '2023-10-19', 'WFA', 'Diskusi dengan Konsultan Desainer Proyek Kijing', '2,5', '', 1, 1),
(832, 28, 7, '2023-10-19', 'WFA', 'Rapat Persiapan Panitia KI/KM Award Infra 2 Tahun 2022', '1,5', '', 1, 1),
(833, 28, 12, '2023-10-19', 'WFA', 'Mengikuti MR IV / 2023 Infrastructure 2 Division', '6', 'https://drive.google.com/open?id=1IKJPl1IIqOTWmchBQpIp-m2XHPViaOzu', 1, 1),
(834, 48, 29, '2023-10-20', 'WFA', 'Zoom Our minds our rights', '1,5', 'https://drive.google.com/open?id=1fnETo5pibFnEekCmYk6skDS1biM5_DDQ', 1, 1),
(835, 45, 35, '2023-10-20', 'WFO', 'Zoom QHSE Morning Talk Online dengan tema \"OUR MINDS, OUR RIGHTS\"', '2', '', 1, 1),
(836, 45, 7, '2023-10-20', 'WFO', 'pengumpulan bahan KI/KM untuk persiapan KI/KM Awards infra2', '2', '', 1, 1),
(837, 45, 7, '2023-10-20', 'WFO', 'membaca baca KI/KM maps di protal WIKA', '1,5', '', 1, 1),
(838, 49, 29, '2023-10-20', 'WFO', 'qhse morning talk', '1,5', '', 1, 1),
(839, 45, 7, '2023-10-20', 'WFO', 'zoom Review RKP divisi enginering dengan proyek Proyek Duplikasi Jembatan Kapuas', '2', '', 1, 1),
(840, 49, 27, '2023-10-20', 'WFO', 'Zoom Evaluasi RKP bab 3 Proyek Duplikasi jembatan kapuas', '2', '', 1, 1),
(841, 46, 27, '2023-10-20', 'WFA', 'review RKP proyek infra 2', '2', '', 1, 1),
(842, 46, 28, '2023-10-20', 'WFA', 'colecting data LPS proyek infra 2', '5', '', 1, 1),
(843, 48, 7, '2023-10-20', 'WFA', 'Kordinasi dengan PIC Proyek Bendungan Pamukkulu membahas KI-KM', '2', '', 1, 1),
(844, 48, 7, '2023-10-20', 'WFA', 'Kordinasi dengan PIC Proyek Toll IKN pembahasan KI-KM update', '2', '', 1, 1),
(845, 48, 7, '2023-10-20', 'WFA', 'Kordinasi dengan sesama PIC divisi membahas update KI-KM', '2', '', 1, 1),
(846, 41, 20, '2023-10-20', 'WFO', 'membuat landing page website', '4', 'https://drive.google.com/open?id=1dMl4XuOTvRVJrwjHMbWNPimNGEGShjqM', 1, 1),
(847, 37, 12, '2023-10-20', 'WFO', 'MR DOP 1 via zoom', '4', '', 1, 1),
(848, 37, 7, '2023-10-20', 'WFO', 'Rapat terkait persiapan KIKM Award', '3,5', '', 1, 1),
(849, 37, 7, '2023-10-20', 'WFO', 'Nyicil screening awal untuk KIKM Award', '2', '', 1, 1),
(850, 37, 18, '2023-10-20', 'WFO', 'Koordinasi tim digimon', '1,5', '', 1, 1),
(851, 38, 20, '2023-10-20', 'WFO', 'memperbaiki Dashboard', '7,5', '', 1, 1),
(852, 33, 35, '2023-10-20', 'WFA', 'Simulasi posisi galian start dan finish MH IPAL dan menghitung volume', '5', 'https://drive.google.com/open?id=1cnm2u0ZU6QeDAtug5umUZ4s_qzigzOQZ', 1, 1),
(853, 33, 35, '2023-10-20', 'WFA', 'Zoom Koordinasi IPAL, Schedule', '2', '', 1, 1),
(854, 51, 29, '2023-10-20', 'WFO', 'Mengikuti zoom QSHE.', '1', 'https://drive.google.com/open?id=1XgAvCn-gNsiWC3Og0kKAfl1p6zWzSCQk', 1, 1),
(855, 51, 35, '2023-10-20', 'WFO', 'Melanjutkan inventaris jaringan pipa dan membuat kerangka schedule rencana proyek IPAL IKN.', '7', '', 1, 1),
(856, 39, 16, '2023-10-20', 'WFO', 'Kick Off Implementasi BIM SPAM Mamminasata', '2', '', 1, 1),
(857, 39, 11, '2023-10-20', 'WFO', 'Podcast Infra 2', '4', '', 1, 1),
(858, 47, 27, '2023-10-20', 'WFO', 'Zoom RKP BAB 3 Proyek Duplikasi Jembatan Kapuas', '2', 'https://drive.google.com/open?id=1IRB8TL-Gz2knVbEVnCqxpEQhiHZ3x7FJ', 1, 1),
(859, 47, 35, '2023-10-20', 'WFO', 'Zoom QHSE Morning Talk', '1,5', 'https://drive.google.com/open?id=1SFfuxo7f9KmyzhZRRFT8KtdZQLS4vBLb', 1, 1),
(860, 47, 35, '2023-10-20', 'WFO', 'Baca-baca prosedur engineer dan BIM', '1,5', 'https://drive.google.com/open?id=1ToOSqbtnvKblsaUWyqeu6iNEDa07Bce3', 1, 1),
(861, 50, 35, '2023-10-20', 'WFO', 'QHSE Morning Talk Online tema OUR MINDS, OUR RIGHTS\nEvaluasi RKP BAB 3 Proyek Duplikasi Jembatan Kapuas \nMembaca artikel KI/KM', '5', '', 1, 1),
(862, 42, 25, '2023-10-20', 'WFO', 'Mengikuti MR IV Divisi Infrastruktur 2 via zoom', '3', 'https://drive.google.com/open?id=1ZbtFImHVFJ5YQLGcCDieRwHy49oVRw5B', 1, 1),
(863, 42, 27, '2023-10-20', 'WFO', 'Zoom Evaluasi RKP Bab 3 Perencanaan & Pengendalian Engineering Proyek Duplikasi Jembatan Kapuas', '2', 'https://drive.google.com/open?id=18_sdwivdYauWYY7rIx4xEoqP6_b6ii7k', 1, 1),
(864, 42, 30, '2023-10-20', 'WFO', 'Koordinasi Tim Sub Divisi Engineering', '1', 'https://drive.google.com/open?id=1WRFabmQ-MkxPU4H8aCHEJeewQ9fhMM0P', 1, 1),
(865, 32, 35, '2023-10-20', 'WFO', 'Perbantuan Proyek MUTIP 1 (Final Quantity and PHO)', '8', 'https://drive.google.com/open?id=1_cl2Jj8SpfuyedeUcfren7vvEPBwKiab', 1, 1),
(866, 29, 35, '2023-10-20', 'WFO', 'Rapat koordinasi Engineering Infra 2', '2', 'https://drive.google.com/open?id=1-Z51-Sm3dbEAj4oRYI0sCk_gbX5XqLt5', 1, 1),
(867, 30, 35, '2023-10-20', 'WFO', 'Rapat koordinasi Engineering Infra 2', '2', 'https://drive.google.com/open?id=1-Z51-Sm3dbEAj4oRYI0sCk_gbX5XqLt5', 1, 1),
(868, 34, 7, '2023-10-20', 'WFO', 'Revisi Karya Inovasi', '3', '', 1, 1),
(869, 29, 35, '2023-10-20', 'WFO', 'Rapat koordinasi tim sub divisi engineering', '2', '', 1, 1),
(870, 30, 35, '2023-10-20', 'WFO', 'Rapat koordinasi tim sub divisi engineering', '2', '', 1, 1),
(871, 29, 2, '2023-10-20', 'WFO', 'Analisis kebutuhan pondasi jembatan jenelata', '8', '', 1, 1),
(872, 30, 2, '2023-10-20', 'WFO', 'Desain Pondasi Jembatan A100 Jenelata', '4', '', 1, 1),
(873, 29, 35, '2023-10-20', 'WFO', 'Pemnuatan karya inovasi proyek infra 2', '6', '', 1, 1),
(874, 28, 12, '2023-10-20', 'WFA', 'Zoom MR IV / 2023 Direktorat Operasi I', '4', 'https://drive.google.com/open?id=1jvHGGuKKkuM1_9Oy9GTT1TNTtgKL2WfU', 1, 1),
(875, 28, 27, '2023-10-20', 'WFA', 'Zoom Evaluasi Perencanaan dan Pengendalian RKP Bab 3 Engineering Proyek Duplikasi Jembatan Kapuas I', '2', 'https://drive.google.com/open?id=1syhewWAAPedxMVcnlqactZ_PjddFGRMw', 1, 1),
(876, 28, 22, '2023-10-20', 'WFA', 'Zoom Koordinasi Pendetailan Program Sub Divisi Engineering Infra 2', '1', 'https://drive.google.com/open?id=1ufYttTdettX1OpXrmYh6NtprRSLniKJO', 1, 1),
(877, 32, 35, '2023-10-21', 'WFO', 'Perbantuan Proyek MUTIP 1', '8', 'https://drive.google.com/open?id=13xY3JPxp9Rd63YwilnQK_Xg-Vh-ceWb9', 1, 1),
(878, 32, 35, '2023-10-22', 'WFO', 'Perbantuan Proyek MUTIP 1 (Final Quantity and PHO)', '8', 'https://drive.google.com/open?id=1FvqcxUup0SYxOdGBhP6sjZFvp81gHhWu', 1, 1),
(879, 48, 27, '2023-10-23', 'WFO', 'Uploading File Video Zoom RKP 6 Proyek ke sherpoin Div', '2', 'https://drive.google.com/open?id=161dchZ2-RRNbxc64mASWgvoD8HjIjR8m', 1, 1),
(880, 40, 20, '2023-10-23', 'WFO', 'pemaparan dan induksi lingkup fungsi BIM dan digitalisasi', '5', 'https://drive.google.com/open?id=19rYt0VJcuavis6l172Zo2zwKiFPTsGDx', 1, 1),
(881, 48, 27, '2023-10-23', 'WFO', 'Zoom Review RKP Bab 3 Proyek Dermaga Wani', '1,5', 'https://drive.google.com/open?id=1i7AGsiFhFRoohDGh8qMkxyyhfSSLDXeY', 1, 1),
(882, 40, 35, '2023-10-23', 'WFO', 'Pelatihan WFPM Batch 7', '5', 'https://drive.google.com/open?id=1gCOGOpwkqCBnV8gMExQ3Egwu0FVReTcU', 1, 1),
(883, 48, 32, '2023-10-23', 'WFO', 'Mengerjakan Update Akhlak WIKA', '2,5', 'https://drive.google.com/open?id=18lfcMp5IFH8hx9Ti5MconwPTTf6lm6K3', 1, 1),
(884, 46, 27, '2023-10-23', 'WFO', 'review rkp proyek infra 2 via zoom', '2', '', 1, 1),
(885, 46, 35, '2023-10-23', 'WFO', 'pengisian form change agen AKHLAK 2023', '6', '', 1, 1),
(886, 41, 20, '2023-10-23', 'WFO', 'Revisi Landing Page', '4', 'https://drive.google.com/open?id=1BhBGkWTXQrXUiR3JVqDXNNIfE3Uy30Yu', 1, 1),
(887, 48, 35, '2023-10-23', 'WFO', 'Kordinasi bersosialisasi antar karyawan dikantor', '1', '', 1, 1),
(888, 41, 20, '2023-10-23', 'WFO', 'membuat login dan kelola user', '4', 'https://drive.google.com/open?id=18dWn1qmQW3QyxfOc3q7M3TwnuP50gMJZ', 1, 1),
(889, 37, 11, '2023-10-23', 'WFO', 'Koordinasi internal dengan pak media', '4', '', 1, 1),
(890, 38, 11, '2023-10-23', 'WFO', 'membuat proses bisnis website', '7,5', '', 1, 1),
(891, 44, 27, '2023-10-23', 'WFA', 'Zoom Meeting Review RKP Proyek Wani', '2', '', 1, 1),
(892, 33, 29, '2023-10-23', 'WFO', 'Kickoff Meting dan FGD Pelatihan MS. Project', '8', 'https://drive.google.com/open?id=1Km6pMo7GG8k5EAzfR3l6vzw5ViQJV5Ys', 1, 1),
(893, 45, 35, '2023-10-23', 'WFA', 'zoom review RKP dgan proyek Wani Port', '2', '', 1, 1),
(894, 45, 7, '2023-10-23', 'WFA', 'Revisi penulisan ki/km kolaborasi dgan proyek MUTIP', '5', '', 1, 1),
(895, 39, 35, '2023-10-23', 'WFA', 'FGD Microsoft Project', '7', '', 1, 1),
(896, 49, 27, '2023-10-23', 'WFA', '\nzoom review RKP dgan proyek Wani Port', '2', '', 1, 1),
(897, 49, 27, '2023-10-23', 'WFA', 'Koordimasi RKP dengan proyek kalawara', '1,5', '', 1, 1),
(898, 49, 7, '2023-10-23', 'WFA', 'Menyusun form penilaian kikm award', '3', '', 1, 1),
(899, 47, 27, '2023-10-23', 'WFA', 'Zoom review RKP BAB 3 proyek Dermaga Wani', '1,5', 'https://drive.google.com/open?id=1f1yRDXNu6YMt3YNX_ZRxdkvC8Wl-9EGV', 1, 1),
(900, 51, 35, '2023-10-23', 'WFA', 'Revisi Schedule Plan rencana proyek IPAL IKN', '8', 'https://drive.google.com/open?id=1m6qR_DlCh83vdSOlJbrXvKwd6HW6k4yT', 1, 1),
(901, 50, 35, '2023-10-23', 'WFA', 'Review RKP Engineering Proyek Wani port\nKoordinasi dengan direksi bendungan kuwil', '6', '', 1, 1),
(902, 42, 27, '2023-10-23', 'WFA', 'Zoom Evaluasi RKP Bab 3 Perencanaan & Pengendalian Engineering Proyek Wani Port', '1,5', 'https://drive.google.com/open?id=1XrxjiaS-Pf8lgKxVb0UuCiY_qpTXICMC', 1, 1),
(903, 42, 35, '2023-10-23', 'WFA', 'Perjalanan PP Jakarta - Pontianak, membantu proyek Terminal Kijing', '4', 'https://drive.google.com/open?id=1RFIdCRwXWNfc3IEOVE12N6Tq27JWNGam', 1, 1),
(904, 42, 35, '2023-10-23', 'WFA', 'Rapat dengan vendor proyek terminal Kijing di Pontianak', '1,5', 'https://drive.google.com/open?id=1VyBiyfDJPIUSU5JtOoXUwkh-pctO6--_', 1, 1),
(905, 32, 35, '2023-10-23', 'WFO', 'Perbantuan Proyek MUTIP 1 (Final Quantity and PHO)', '8', '', 1, 1),
(906, 47, 35, '2023-10-23', 'WFA', 'Baca-baca prosedur', '3', 'https://drive.google.com/open?id=1v6W8skD30QVK2NHsZbSx1qCSWKNs53Lg', 1, 1),
(907, 34, 7, '2023-10-23', 'WFO', 'Pembuatan PPT Karya Inovasi', '4', 'https://drive.google.com/open?id=1KqQ3nFmveNGbEbfUzK_oBLjrbcmMCEhO', 1, 1),
(908, 30, 7, '2023-10-23', 'WFO', 'Review PPT Karya Inovasi', '4', 'https://drive.google.com/open?id=1KqQ3nFmveNGbEbfUzK_oBLjrbcmMCEhO', 1, 1),
(909, 29, 2, '2023-10-23', 'WFA', 'Analisis back calculation stabilitas lereng proyek antang tatakan', '7', '', 1, 1),
(910, 29, 35, '2023-10-23', 'WFA', 'Membuat surat pengajuan untuk sertifikasi insinyur, pengajuan keikutsertaan seminat HATTI 2023, pengajuan keikutsertaan training Plaxis Tahunan', '2,5', '', 1, 1),
(911, 30, 35, '2023-10-23', 'WFA', 'Membuat surat pengajuan untuk sertifikasi insinyur, pengajuan keikutsertaan seminat HATTI 2023, pengajuan keikutsertaan training Plaxis Tahunan', '2,5', '', 1, 1),
(912, 28, 35, '2023-10-23', 'WFA', 'Zoom Pembahasan Internal Kompensasi Proyek Kijing', '2', 'https://drive.google.com/open?id=1SzGSVP8vtOgKUgSPAS_KCs_RKjrnTFA9', 1, 1),
(913, 28, 27, '2023-10-23', 'WFA', 'Zoom Evaluasi Perencanaan dan Pengendalian RKP Bab 3 Engineering Proyek Wani Port', '2', '', 1, 1),
(914, 28, 35, '2023-10-23', 'WFA', 'Zoom Internal Pembahasan Kompensasi Proyek Kijing (Lanjutan)', '3', 'https://drive.google.com/open?id=17mgSS7VVsGHmXcTezEvHdHKTGcj9YJZP', 1, 1),
(915, 48, 27, '2023-10-24', 'WFO', 'Zoom Review RKP Bab 3 Proyek Donggala', '1,5', 'https://drive.google.com/open?id=1RMSQzILT-ZeUcCawW-w1mCxHVf9ICBYD', 1, 1),
(916, 48, 27, '2023-10-24', 'WFO', 'Updateing Akhlak dan uploading video Review RKP Bab 3 Proyek Dongala', '2', 'https://drive.google.com/open?id=1eL05032ZB9fB5gMMqtTzLnz71gHI37Vf', 1, 1),
(917, 40, 35, '2023-10-24', 'WFO', 'Pelatihan WFPM Batch 7', '5', 'https://drive.google.com/open?id=1skbvoprwIZtV43yTFGUdJcOWP5bHXwRn', 1, 1),
(918, 40, 35, '2023-10-24', 'WFO', 'Review Paparan Pengajuan Kompensasi Terminal Kijing', '4,5', 'https://drive.google.com/open?id=1SxPxGFlg_pJcqccEqLDkrDPahxGMifuO', 1, 1),
(919, 46, 27, '2023-10-24', 'WFO', 'review RKP proyek infra 2 via zoom on line', '2', '', 1, 1),
(920, 46, 11, '2023-10-24', 'WFO', 'sosialisasi prosedur manajemen aset', '3', '', 1, 1),
(921, 46, 28, '2023-10-24', 'WFO', 'monitoring data LPS proyek infra 2', '3', '', 1, 1),
(922, 48, 24, '2023-10-24', 'WFO', 'ZOOM SOSIALISASI PROSEDUR MANAJEMEN ASET', '1,5', 'https://drive.google.com/open?id=1i81m71_ygsMNRM_cNootE7MnrSU-TBeq', 1, 1),
(923, 44, 27, '2023-10-24', 'WFA', 'Zoomk Meeting Review RKP Donggala Port', '1', 'https://drive.google.com/open?id=1lp117ZkMpzgwqVfVQiyBKhST1X1Hvhcr', 1, 1),
(924, 33, 29, '2023-10-24', 'WFO', 'Pelatihan MS. Project', '8', 'https://drive.google.com/open?id=14srRgISil0wpbKL77w88Mu0GNSQRH43Z', 1, 1),
(925, 45, 35, '2023-10-24', 'WFA', 'Zoom review RKP dgan proyek donggala', '2', '', 1, 1),
(926, 45, 7, '2023-10-24', 'WFA', 'Revisi penulisan ki/km kolaborasi dgan proyek MUTIP', '5', '', 1, 1),
(927, 39, 35, '2023-10-24', 'WFA', 'Pelatihan Ms. Project Basic - Intermediate', '8', '', 1, 1),
(928, 37, 11, '2023-10-24', 'WFO', 'Audit eksternal', '4', '', 1, 1),
(929, 37, 35, '2023-10-24', 'WFO', 'Sosialisasi prosedur IT', '2', '', 1, 1),
(930, 37, 16, '2023-10-24', 'WFO', 'Koordinasi internal', '1,5', '', 1, 1),
(931, 49, 27, '2023-10-24', 'WFA', 'Zoom Meeting Review RKP Donggala Port', '2', '', 1, 1),
(932, 49, 35, '2023-10-24', 'WFA', 'Membaca dan mempelajari prosedur QHSE', '5', '', 1, 1),
(933, 51, 35, '2023-10-24', 'WFA', 'Online meeting tim persiapan rencana proyek IPAL IKN', '2', '', 1, 1),
(934, 51, 35, '2023-10-24', 'WFA', 'Melanjutkan revisi schedule plan rencana proyek IPAL IKN', '6', '', 1, 1),
(935, 50, 35, '2023-10-24', 'WFA', 'Zoom Review RKP Bab 3 Proyek Dongala\nZoom Sosialisasi Prosedur Manajemen Aset', '5', '', 1, 1),
(936, 42, 24, '2023-10-24', 'WFA', 'Koordinasi update sistem engineering untuk persiapan audit', '1', '', 1, 1),
(937, 42, 27, '2023-10-24', 'WFA', 'Zoom Evaluasi RKP Bab 3 Perencanaan & Pengendalian Engineering Proyek Donggala', '1,5', 'https://drive.google.com/open?id=1C8J0ueBD5wtwVQ0TstMBjv2vlxa7fKOC', 1, 1),
(938, 42, 26, '2023-10-24', 'WFA', 'Update data share point program kerja engineering & monitoringnya', '1', '', 1, 1),
(939, 42, 24, '2023-10-24', 'WFA', 'Mengikuti SOSIALISASI PROSEDUR MANAJEMEN ASET', '1,5', 'https://drive.google.com/open?id=1eUKaU3t5y_3b22HOnf1v3igSMgCwfiYB', 1, 1),
(940, 42, 27, '2023-10-24', 'WFA', 'Audit ISO 9001 internal sub divisi Engineering', '1', 'https://drive.google.com/open?id=1QqwJrNQjlcENUkmD8I9DSNG_E-00cJpZ', 1, 1),
(941, 42, 7, '2023-10-24', 'WFA', 'Koordinasi persiapan kick of meeting KI-KM award divisi infrastruktur 2', '0,5', '', 1, 1),
(942, 32, 35, '2023-10-24', 'WFO', 'Perbantuan Proyek MUTIP 1', '8', '', 1, 1),
(943, 47, 27, '2023-10-24', 'WFA', 'Zoom review RKP BAB 3 proyek Donggala', '2', 'https://drive.google.com/open?id=12zo5mj5eLaOX0H7nuuxAfKh0my2T7fau', 1, 1),
(944, 47, 35, '2023-10-24', 'WFA', 'Zoom sosialisasi IT', '2', 'https://drive.google.com/open?id=1A1Fr97mAihZWH06uBBamoZnKYFe3bMKM', 1, 1),
(945, 38, 11, '2023-10-24', 'WFO', 'membuat proses bisnis website', '8', '', 1, 1),
(946, 34, 29, '2023-10-24', 'WFO', 'Pelatihan QA/QC', '4', 'https://drive.google.com/open?id=1zX-9TWWE2O05nD2mTbSk3lbHk0TAK4Z_', 1, 1),
(947, 29, 35, '2023-10-24', 'WFO', 'Rapat Tim Task Force WIKA', '2', '', 1, 1),
(948, 30, 35, '2023-10-24', 'WFO', 'Rapat Tim Task Force WIKA', '2', '', 1, 1),
(949, 29, 35, '2023-10-24', 'WFO', 'Pembuatan Karya Inovasi Proyek Infra 2', '8', '', 1, 1),
(950, 30, 35, '2023-10-24', 'WFO', 'Perpanjangan SKK Ahli Muda K3 Konstruksi', '6', '', 1, 1),
(951, 28, 35, '2023-10-24', 'WFA', 'Teams Acara Refreshment Program Sayembara AKHLAK', '2', 'https://drive.google.com/open?id=1QYzcSXxc_vWkq0nmQwCPUaSma1C-_E9D', 1, 1),
(952, 28, 35, '2023-10-24', 'WFA', 'Zoom Rapat Persiapan Tim Task Force QHSE DOP1 di Departemen Operasi 1', '6', 'https://drive.google.com/open?id=1vKpi0yr6l0xEPSuY3ixfEpZpqvxvPIEL', 1, 1),
(953, 48, 24, '2023-10-25', 'WFO', 'Zoom Sosialisasi Prosedur Teknologi Informasi', '2', 'https://drive.google.com/open?id=1HR59Jk0LGnfn71QmfTBnhtPE1oYSQk34', 1, 1),
(954, 46, 11, '2023-10-25', 'WFO', 'sosialisasi prosedur teknologi informasi', '3', '', 1, 1),
(955, 46, 11, '2023-10-25', 'WFO', 'sosialisasi re-aligment prosedur supply chain management', '3', '', 1, 1),
(956, 46, 11, '2023-10-25', 'WFO', 'KI/KM award sub divisi engineering infra 2', '1', '', 1, 1),
(957, 46, 28, '2023-10-25', 'WFO', 'monitoring data LPS', '1', '', 1, 1),
(958, 48, 24, '2023-10-25', 'WFO', 'Zoom Sosialisasi Prosedur Supplay Chain Management', '2', 'https://drive.google.com/open?id=1DUbY69s4z4Rr7FRuczuZn221l1WyOzTL', 1, 1),
(959, 48, 7, '2023-10-25', 'WFO', 'Collection and uploading Update KI-KM Proyek Bendungan Pamukkulu', '2', 'https://drive.google.com/open?id=1K_1AKUqhytE57k7FHsnJ9jxww9gnLG_c', 1, 1),
(960, 45, 35, '2023-10-25', 'WFA', 'Zoom sosialisasi Prosedur Teknologi Informasi', '2', '', 1, 1),
(961, 45, 35, '2023-10-25', 'WFA', 'Zoom persiapan Kick off meeting KI/KM Awards infrastruktur 2', '1', '', 1, 1),
(962, 45, 35, '2023-10-25', 'WFA', 'Zoom sosialisasi Re Alignment Prosedur Supply Chain Management', '2', '', 1, 1),
(963, 45, 35, '2023-10-25', 'WFA', 'Membaca dan mempelajari prosedur', '2', '', 1, 1),
(964, 40, 35, '2023-10-25', 'WFO', 'Pelatihan WFPM Batch 7', '5', 'https://drive.google.com/open?id=1iMkHRqoDFN8ksI5ei3V_-vllNBcd1pgr', 1, 1),
(965, 40, 35, '2023-10-25', 'WFO', 'Klaim Kijing - Analisa data Hidro-oceanografi vs aktual BMKG', '4', 'https://drive.google.com/open?id=1fHi5GIu8mdE4nvivMSNq5YI9PbJDdptf', 1, 1),
(966, 39, 35, '2023-10-25', 'WFA', 'Pelatihan Ms. Project Basic - Intermediate hari ke 2', '7,5', '', 1, 1),
(967, 41, 20, '2023-10-25', 'WFO', 'membuat login dan tampilan awal admin', '8', 'https://drive.google.com/open?id=1Dlz1z17N8SbFnZJW7bwwTYB-hQCJbS05', 1, 1),
(968, 37, 0, '2023-10-25', 'WFO', 'Monitoring dan reviewing data', '4', '', 1, 1),
(969, 37, 35, '2023-10-25', 'WFO', 'Sosialisasi Prosedur SCM', '1,5', '', 1, 1),
(970, 33, 29, '2023-10-25', 'WFO', 'Pelatihan Ms. Project', '8', 'https://drive.google.com/open?id=18ZqkGh_psTRpo18WdXpLI1Wt7exm8zV5', 1, 1),
(971, 49, 29, '2023-10-25', 'WFA', '\nZoom Sosialisasi Prosedur Teknologi Informasi', '2,5', '', 1, 1),
(972, 49, 29, '2023-10-25', 'WFA', 'Zoom sosialisasi Re Alignment Prosedur Supply Chain Management', '2,5', '', 1, 1),
(973, 49, 7, '2023-10-25', 'WFA', 'Zoom persiapan Kick off meeting KI/KM Awards infrastruktur 2', '2', '', 1, 1),
(974, 51, 35, '2023-10-25', 'WFA', 'Meeting panitia KM Awards', '1', 'https://drive.google.com/open?id=1v8WJTAqoMdgz9Y26CKumAQI414w3-O0m', 1, 1),
(975, 51, 35, '2023-10-25', 'WFA', 'Melanjutkan inventaris rencana proyek IPAL IKN', '2', 'https://drive.google.com/open?id=1nheJiu1nscWzZpwpwGCQ0wJPcWiJSB8z', 1, 1),
(976, 51, 29, '2023-10-25', 'WFA', 'Mengikuti zoom sosialisasi prosedur', '2', 'https://drive.google.com/open?id=1kKNkK2RlSaWnICiIlfiwSGqtdTBzNAfR', 1, 1),
(977, 51, 7, '2023-10-25', 'WFA', 'Koordinasi submit KI / KM proyek Gumbasa dan proyek Ameroro dengan Eng proyek', '3', '', 1, 1),
(978, 50, 35, '2023-10-25', 'WFA', 'Sosialisasi Prosedur Teknologi Informasi\nSosialisasi Re-Alignment Prosedur Supply Chain Management\nMembaca Prosedur', '6', '', 1, 1),
(979, 42, 24, '2023-10-25', 'WFA', 'Mengikuti SOSIALISASI PROSEDUR TEKNOLOGI INFORMASI', '2', 'https://drive.google.com/open?id=18OByfbjKTGjjZ9JlnnvW_jgJDrXa9I5a', 1, 1),
(980, 42, 7, '2023-10-25', 'WFA', 'Zoom persiapan kick of meeting KI-KM award & cek materi presentasi', '1', 'https://drive.google.com/open?id=1d-_Emr3lZ4052JuMynQVvlHbBaZzAgoU', 1, 1),
(981, 42, 35, '2023-10-25', 'WFA', 'Rapat Pre kick of meeting Task Force QHSE di lantai 15', '2', 'https://drive.google.com/open?id=13T68IpiriMQAzAbkY3ZDOjod8xroVzmX', 1, 1),
(982, 42, 24, '2023-10-25', 'WFA', 'Mengikuti SOSIALISASI RE-ALIGNMENT PROSEDUR SUPPLY CHAIN MANAGEMENT', '2', 'https://drive.google.com/open?id=1BXVdbykPPcdT-H2NyAvFo8uoK8WR3tH0', 1, 1),
(983, 32, 35, '2023-10-25', 'WFO', 'Perbantuan Proyek MUTIP 1', '8', '', 1, 1),
(984, 47, 35, '2023-10-25', 'WFA', 'Zoom Sosialisasi Prosedur Suoly Chain Managemet', '2', 'https://drive.google.com/open?id=1mQfWfsYl4Sl86u_3tmm_UGKOTsao0trX', 1, 1),
(985, 38, 11, '2023-10-25', 'WFO', 'membuat Proses Bisnis Website Infra 2', '8', '', 1, 1),
(986, 29, 35, '2023-10-25', 'WFA', 'Pembuatan karya inovasi proyek infra 2', '8', '', 1, 1),
(987, 30, 35, '2023-10-25', 'WFA', 'Perpanjangan SKK Ahli Muda K3 Konstruksi', '8', '', 1, 1),
(988, 28, 35, '2023-10-25', 'WFO', 'Zoom Pelatihan Finance for Non Finance', '6,5', 'https://drive.google.com/open?id=1KW6cn5takz5lN4_p2Lt6uJTzD6UKFPKN', 1, 1),
(989, 28, 35, '2023-10-25', 'WFO', 'Rapat Offline Pra Kick Off Meeting Tim Task Force QHSE DOP1', '2', 'https://drive.google.com/open?id=1CvKl8pV_xM37U_LAdwqPWcRJiPaKr1Qc', 1, 1),
(990, 40, 35, '2023-10-26', 'WFO', 'Pelatihan WFPM Batch 7', '5', 'https://drive.google.com/open?id=10WRrOLEticBkyeqiO8n-uwV9h-BlJdw2', 1, 1),
(991, 48, 9, '2023-10-26', 'WFO', 'Update inventaris PC/laptop pendataan pengakat NB dan PC', '0,5', 'https://drive.google.com/open?id=1dYr8UKYYCQM-YcNbObdQ7VzQ_aZbJukr', 1, 1),
(992, 48, 27, '2023-10-26', 'WFO', 'UPDATE RENCANA TINDAK LANJUT PROYEK DI SHERPOIN UNTUK PROYEK TOLL IKN DAN BENDUNGAN PAMUKKULU', '0,5', 'https://drive.google.com/open?id=1H3nFtm9ur941lKN6WazsAvN3NQzwFLHo', 1, 1),
(993, 48, 7, '2023-10-26', 'WFO', 'KICK OF MEETING KI/KM AWARD DIV INFRA 2 TH 2023', '1', 'https://drive.google.com/open?id=1JnMXwuKM6XW-3JLcpkEm6OQGKHpsa2gE', 1, 1),
(994, 48, 7, '2023-10-26', 'WFO', 'Teknik Terusan Panama dan Terusan Suez', '2', 'https://drive.google.com/open?id=1pbQK4NnlsSZZ4cal9_Tfru2Dt3Hmx9Ik', 1, 1),
(995, 46, 35, '2023-10-26', 'WFO', 'international coastal reservoir workshop : mitigation flood disaster,ensuring water supply,combating land subsidence and promoting sustainable energy', '7', '', 1, 1),
(996, 46, 11, '2023-10-26', 'WFO', 'kick of meeting KI/KM award divisi infrastruktur 2 tahun 2023', '1', '', 1, 1),
(997, 41, 20, '2023-10-26', 'WFO', 'mc kick of meeting ki/km', '1,5', 'https://drive.google.com/open?id=14MYBw0q_yOCYt0Pxu0XteTlBSeIMst4U', 1, 1),
(998, 41, 20, '2023-10-26', 'WFO', 'membuat kelola user', '6,5', 'https://drive.google.com/open?id=1n8r6QcWjgc-s5q6wMwE1b52QRK-gtKqI', 1, 1),
(999, 48, 35, '2023-10-26', 'WFO', 'Zoom Speechmaking Sharing Seassion', '1,5', 'https://drive.google.com/open?id=1szRFQffKC80BnuGQoES08ik_mlaXGvY4', 1, 1),
(1000, 48, 7, '2023-10-26', 'WFO', 'Pengayaan Ilmu Kontruksi Bendungan dari KI-KM proyek Bendungan Pamukkulu', '1,5', 'https://drive.google.com/open?id=1pVQTNobLOUxVRjzHRP7fneLHyBd4kh7b', 1, 1),
(1001, 37, 11, '2023-10-26', 'WFO', 'Koordinasi dengan MOF terkait pendanaan acara KI KM award', '3', '', 1, 1),
(1002, 37, 35, '2023-10-26', 'WFO', 'Kick off meeting KIKM award', '1,5', '', 1, 1),
(1003, 37, 35, '2023-10-26', 'WFO', 'Sosialisasi Prrosedur', '1,5', '', 1, 1),
(1004, 37, 7, '2023-10-26', 'WFO', 'Membaca KI KM award dalamm rangka penillaian awa', '3,5', '', 1, 1),
(1005, 37, 18, '2023-10-26', 'WFO', 'Reviewing collecting data', '1,5', '', 1, 1),
(1006, 45, 35, '2023-10-26', 'WFA', 'Zoom kick-off meeting ki/km awards infrastruktur 2', '1', '', 1, 1),
(1007, 45, 7, '2023-10-26', 'WFA', 'Revisi penulisan ki/km dan pembuatan ppt presentasi untuk ki/km kolaborasi dengan proyek MUTIP', '5,5', '', 1, 1),
(1008, 33, 11, '2023-10-26', 'WFO', 'Kick off metting KI/KM Award', '1,5', '', 1, 1),
(1009, 33, 35, '2023-10-26', 'WFO', 'Zoom Meeting persiapan Laporan Sayembara Akhlak Bulan Oktober', '1,5', '', 1, 1),
(1010, 33, 35, '2023-10-26', 'WFO', 'Membuat konsep dan persiapan wawancara laporan sayembara Akhlak', '1', 'https://drive.google.com/open?id=18UnV2I8OSlFUBcvG81gQ1h61_ysAHRxP', 1, 1),
(1011, 33, 14, '2023-10-26', 'WFO', 'Review Pelatihan MS. Project dengan Belajar dari Youtube', '4', 'https://drive.google.com/open?id=1W3bDgD8BeOToHUElla4M4r1axPv5oA-k', 1, 1),
(1012, 49, 7, '2023-10-26', 'WFA', 'KICK OF MEETING KI/KM AWARD DIV INFRA 2 TH 2023', '1,5', '', 1, 1),
(1013, 49, 35, '2023-10-26', 'WFA', 'Zoom Meeting persiapan Laporan Sayembara Akhlak Bulan Oktober', '2', '', 1, 1),
(1014, 49, 7, '2023-10-26', 'WFA', 'Menyususn form penilaian KI KM award', '2,5', '', 1, 1),
(1015, 51, 35, '2023-10-26', 'WFA', 'Kick Off KI KM awards', '1', 'https://drive.google.com/open?id=14o4wJscNxlTxj098ZDPiSrWOjbsge5DO', 1, 1),
(1016, 51, 7, '2023-10-26', 'WFA', 'Koordinasi KI / KM awards dengan Eng proyek Gumbasa dan Ameroro', '3', '', 1, 1),
(1017, 51, 27, '2023-10-26', 'WFA', 'Revisi dan collecting form evaluasi pengendalian Eng proyek Ameroro bulan Sept 2023', '4', '', 1, 1),
(1018, 50, 35, '2023-10-26', 'WFA', 'Engineering Infra 2 Zoom Meeting\nMembaca Artikel KI/KM', '4,5', '', 1, 1),
(1019, 42, 24, '2023-10-26', 'WFA', 'Membaca prosedur penerapan sistem manajemen keselamatan, kesehatan kerja dan lingkungan (SMK3L)', '1', '', 1, 1),
(1020, 42, 7, '2023-10-26', 'WFA', 'Kick of meeting KI/KM Award divisi infrastruktur 2', '1', 'https://drive.google.com/open?id=1IVDd0FuDKey4MaBoQtTNivDCsEeZxTDY', 1, 1),
(1021, 42, 35, '2023-10-26', 'WFA', 'Kick of meeting task force QHSE di lantai 15', '2', 'https://drive.google.com/open?id=1CikiuyZ6SgWH2dfwVvIztYb4dwmd2Ng2', 1, 1),
(1022, 42, 35, '2023-10-26', 'WFA', 'Menyusun jadual program kerja tim task force dept operasi 3', '0,5', '', 1, 1),
(1023, 42, 35, '2023-10-26', 'WFA', 'Menonton podcast Transformasi WIKA (kenal dekat dengan MRA)', '0,5', 'https://drive.google.com/open?id=1GgAJno52xGeNQ75FHNA8U2jh-9DTPX_o', 1, 1),
(1024, 39, 16, '2023-10-26', 'WFA', 'Monitoring BIM dan Lisensi Software', '7', '', 1, 1),
(1025, 32, 35, '2023-10-26', 'WFO', 'Perbantuan Proyek MUTIP 1 (Final Quantity and PHO)', '8', 'https://drive.google.com/open?id=1673r-Rymh8SW86z1IuxxcCFReoe3nTi-', 1, 1),
(1026, 47, 35, '2023-10-26', 'WFA', 'Zoom Kick off KIKM Award', '1,5', 'https://drive.google.com/open?id=1vflqeWxOGvUs_7_KgwtJLhgLpoitawsl', 1, 1),
(1027, 47, 35, '2023-10-26', 'WFA', 'Bantu penulis KM proyek Keerom', '2', 'https://drive.google.com/open?id=18Jx8vOiTiyS2SGvk4DURPWTCU2PSFujV', 1, 1),
(1028, 47, 35, '2023-10-26', 'WFA', 'Zoom Spechmaking Sharing Seasion', '1,5', '', 1, 1),
(1029, 38, 11, '2023-10-26', 'WFO', 'membuat video change Agen', '7', '', 1, 1),
(1030, 29, 35, '2023-10-26', 'WFA', 'Pembuatan karya inovasi proyek infra 2', '8', '', 1, 1),
(1031, 30, 35, '2023-10-26', 'WFA', 'Perpanjangan SKK Ahli Muda K3 Konstruksi', '8', '', 1, 1),
(1032, 28, 7, '2023-10-26', 'WFO', 'Zoom Kick Off Meeting Program KI/KM Award Infra 2 Tahun 2023', '1,5', 'https://drive.google.com/open?id=1CjR9QqOizx_V0MhFxDwWRVgHrO3HjKaK', 1, 1),
(1033, 28, 35, '2023-10-26', 'WFO', 'Zoom Finalisasi Tugas Laporan Bulan Oktober Program Sayembara AKHLAK', '2', 'https://drive.google.com/open?id=1tPruRaVsA7iy2aFlwkfc2AwmnEbxN8i4', 1, 1),
(1034, 28, 35, '2023-10-26', 'WFO', 'Rapat Offline Kick Off Meeting Tim Task Force QHSE DOP1', '2,5', 'https://drive.google.com/open?id=1p3vPKLAv9-1r18mpQZ2uCzbE_xOMMM0d', 1, 1),
(1035, 28, 35, '2023-10-26', 'WFO', 'Buat Draft Schedule Keberangkatan dan Program Kerja Tim Task Force QHSE DOP1 di Proyek Departemen Operasi 1', '3', '', 1, 1),
(1036, 48, 29, '2023-10-27', 'WFO', 'SMT Div Infra 2', '1', 'https://drive.google.com/open?id=1yTtz34sxRH-zN8Ln5yXxDBYb1BiVEoSv', 1, 1),
(1037, 48, 7, '2023-10-27', 'WFO', 'Kordinasi hasil KI-KM Proyek Bendungan Pamukkulu ke Kordinator PIC KI-KM', '1', '', 1, 1),
(1038, 46, 11, '2023-10-27', 'WFO', 'QHSE morning talk infra 2', '1', '', 1, 1),
(1039, 46, 29, '2023-10-27', 'WFO', 'PERAN BESAR GEOSINTETIK DALAM KONSTRUKSI BERKELANJUTAN\n', '4', '', 1, 1),
(1040, 48, 32, '2023-10-27', 'WFO', 'Mempalajari Code of Conduct WIKA', '2', 'https://drive.google.com/open?id=1w-fPubRTFSFVUaablNd5-c0ugH2OOhXv', 1, 1),
(1041, 48, 32, '2023-10-27', 'WFO', 'Membaca T-News Wika', '1', 'https://drive.google.com/open?id=1JnH5-CGPG09gg4YbgbSO8GDrocGqZYto', 1, 1),
(1042, 37, 35, '2023-10-27', 'WFO', 'QHSE Talk infra 2', '1,5', '', 1, 1),
(1043, 37, 16, '2023-10-27', 'WFO', 'Preparing data terkait temuan audit', '4', '', 1, 1),
(1044, 45, 35, '2023-10-27', 'WFA', 'Zoom Safety Morning Talk dengan tema OBESITAS', '1', '', 1, 1),
(1045, 45, 7, '2023-10-27', 'WFA', 'Pembuatan PPT presentasi untuk ki/km kolaborasi dengan proyek MUTIP', '5', '', 1, 1),
(1046, 33, 29, '2023-10-27', 'WFO', 'SMT materin Obesitas', '1', 'https://drive.google.com/open?id=17uZPrO2gUlojz-k1uWW0eWki76TYKCK1', 1, 1),
(1047, 33, 35, '2023-10-27', 'WFO', 'Pengmabilan Video Testimoni Feedback Sayembara Akhlak', '1', 'https://drive.google.com/open?id=1UhP1whiu7k7s-Rgiam5aTEynyiz20CnD', 1, 1),
(1048, 33, 35, '2023-10-27', 'WFO', 'Membuat Draft Laporan Bulan Oktober sayembara Akhlak', '6', 'https://drive.google.com/open?id=1ZQrBLctnZA__EFsvw1F4H8MnfExUdKZw', 1, 1),
(1049, 42, 35, '2023-10-27', 'WFA', 'Mengikuti QHSE morning talk infra 2 (tema : Obesitas)', '0,5', 'https://drive.google.com/open?id=1LjGYfBX_ecAS0qqzxt23SuxCIU1NyE7V', 1, 1),
(1050, 42, 0, '2023-10-27', 'WFA', 'Mengisi data Inventarisasi Notebook dan Personal Computer', '0,5', 'https://drive.google.com/open?id=1kqAaQErwWp9Xceybud7jXrI_y5dj54u-', 1, 1),
(1051, 42, 27, '2023-10-27', 'WFA', 'Monitoring tindak lanjut program kerja sistem engineering & 32', '1', '', 1, 1),
(1052, 42, 35, '2023-10-27', 'WFA', 'Menyusun jadual program kerja tim task force dept operasi 3 & menyusun kertas kerja', '1', 'https://drive.google.com/open?id=1f1Adxp7gHwabR0CLS_4KLnIdXLzWCnOV', 1, 1),
(1053, 42, 35, '2023-10-27', 'WFA', 'Collecting data-data HSE proyek Duplikasi Jembatan Kapuas', '1', '', 1, 1),
(1054, 42, 24, '2023-10-27', 'WFA', 'Membaca prosedur penerapan sistem manajemen keselamatan, kesehatan kerja dan lingkungan (SMK3L)', '1', '', 1, 1),
(1055, 49, 35, '2023-10-27', 'WFA', 'QHSE morning talk infra 2', '1', '', 1, 1),
(1056, 49, 35, '2023-10-27', 'WFA', 'Rapat Koordinasi tim task force QHSE', '5', '', 1, 1),
(1057, 51, 35, '2023-10-27', 'WFA', 'Koordinasi dengan tim persiapan dan revisi input schedule rencana proyek IPAL IKN', '4', '', 1, 1),
(1058, 51, 27, '2023-10-27', 'WFA', 'Revisi dan collect form evaluasi pengendalian Eng proyek Gumbasa bulan Sept 2023', '4', '', 1, 1),
(1059, 50, 35, '2023-10-27', 'WFA', 'Zoom QHSE Morning Talk Infrastructure 2 Division tema OBESITAS\nMembaca Transformasi wika', '4', '', 1, 1),
(1060, 39, 11, '2023-10-27', 'WFA', 'Membuar RKD Engineering', '7', '', 1, 1),
(1061, 32, 35, '2023-10-27', 'WFO', 'Perbantuan Proyek MUTIP 1 (Final Quantity and PHO)', '8', 'https://drive.google.com/open?id=1M_0mSRcA028c7gFPTsICb9Q4gPKWXj6M', 1, 1),
(1062, 47, 35, '2023-10-27', 'WFA', 'Zoom QHSE Morning Talk Perihal Obesitas', '1', 'https://drive.google.com/open?id=1DFmfOdxGntXd_GebeRn5buY4UkTMUDES', 1, 1),
(1063, 47, 35, '2023-10-27', 'WFA', 'Zoom Sharing Seasion perihal Geosintetik dalam konstruksi', '4', 'https://drive.google.com/open?id=1p7RH5RN4ujuHMvMEppur_7EGw7T-OVIE', 1, 1),
(1064, 38, 11, '2023-10-27', 'WFO', 'membuat mockup sistem log in website', '7,5', '', 1, 1),
(1065, 29, 2, '2023-10-27', 'WFA', 'Meeting dengan tim proyek Bendungan Pamukkulu', '2,5', 'https://drive.google.com/open?id=1cwFiyHnsZQDLsoi9A6ETGBep4UMPgjNf', 1, 1),
(1066, 30, 2, '2023-10-27', 'WFA', 'Meeting dengan tim proyek Bendungan Pamukkulu', '3', 'https://drive.google.com/open?id=1cwFiyHnsZQDLsoi9A6ETGBep4UMPgjNf', 1, 1),
(1067, 30, 2, '2023-10-27', 'WFA', 'Ujian SKK Ahli Muda K3 Konstruksi', '5', 'https://drive.google.com/open?id=1cwFiyHnsZQDLsoi9A6ETGBep4UMPgjNf', 1, 1),
(1068, 29, 35, '2023-10-27', 'WFA', 'Pembuatan Karya Inovasi Proyek Infra 2', '8', '', 1, 1),
(1069, 28, 35, '2023-10-27', 'WFO', 'Mengikuti Safety Morning Talk Divisi Infra 2', '1', 'https://drive.google.com/open?id=1F6qLYiUV4TjPWfV9tlVkwoIsC77nbxfo', 1, 1),
(1070, 28, 35, '2023-10-27', 'WFO', 'Zoom Rapat Persiapan Tim Task Force QHSE Departemen Operasi 1', '4', 'https://drive.google.com/open?id=1f505l7JcxQglMt5aXQ92pL49Rx_F9Jtv', 1, 1),
(1071, 28, 35, '2023-10-27', 'WFO', 'Rapat Internal Pembahasan Kompensasi Proyek Kijing', '3', '', 1, 1),
(1072, 41, 20, '2023-10-27', 'WFA', 'membuat basis data productivities', '8', '', 1, 1),
(1073, 42, 35, '2023-10-28', 'WFA', 'Upacara hari Sumpah Pemuda di kantor WIKA', '1,5', 'https://drive.google.com/open?id=1fc_wl3s5UCc-D4TAp7go3IbxYhzFKlnu', 1, 1),
(1074, 32, 35, '2023-10-28', 'WFO', 'Perbantuan Proyek MUTIP 1', '8', '', 1, 1),
(1075, 41, 20, '2023-10-30', 'WFO', 'membuat fitur projek dan kelola projek', '4', 'https://drive.google.com/open?id=1F3481cq94iVmP7BHyEz4MJhgC6NHX9Re', 1, 1),
(1076, 48, 7, '2023-10-30', 'WFA', 'ZOOM KI/KM PROYEK MUTIP', '1,5', 'https://drive.google.com/open?id=1sFKOjWqVTXArlZyjny-mrwoJhsXvn87t', 1, 1),
(1077, 48, 7, '2023-10-30', 'WFA', 'KORDINASI KI/KM DENGAN PROYEK BENDUNGAN PAMUKKULU PENENTUAN ZOOM KIKM', '1', '', 1, 1),
(1078, 41, 20, '2023-10-30', 'WFO', 'membuat form monnthly report', '4', '', 1, 1),
(1079, 48, 7, '2023-10-30', 'WFA', 'Collection and Uploading hasil Zoom Meeting Revisi KI_KM Kolaborasi Proyek MUTIP', '1', 'https://drive.google.com/open?id=1gvPOVj7mnmTOjrv5CdRul0Izrl_mO171', 1, 1),
(1080, 48, 7, '2023-10-30', 'WFA', 'Membaca dan mereview KI/KM Modifikasi_susunan_saringan_stone_crusher untuk pemenuhan_gradasi_material_timbunan_zona_2A_dan_2B_ Bendungan Pamukkulu', '3', 'https://drive.google.com/open?id=1JK5kQqaELkN5jMVQFhwaesOshZSlhogF', 1, 1),
(1081, 46, 7, '2023-10-30', 'WFA', '1. Review kolaborasi KI/KM proyek mutib\n2. Koordinasi KI/KM award infra 2', '2', '', 1, 1),
(1082, 46, 28, '2023-10-30', 'WFA', 'Monitoring data LPS proyek infra 2', '3', '', 1, 1),
(1083, 50, 35, '2023-10-30', 'WFO', 'Zoom meeting Revisi KI/KM Kolaborasi Proyek MUTIP', '1,5', '', 1, 1),
(1084, 42, 35, '2023-10-30', 'WFO', 'Koordinasi dengan DGM Dept. Operasi 3 terkait pelaksanaan tugas tim Task Force QHSE', '0,5', '', 1, 1),
(1085, 42, 7, '2023-10-30', 'WFO', 'Zoom Review KI/KM proyek Mutip (Jidar Roller)', '1', 'https://drive.google.com/open?id=1ybLJuWQhYUY9hEOtfKgbKguGh-_lOURW', 1, 1),
(1086, 42, 35, '2023-10-30', 'WFO', 'Teleconference rapat dgn vendor PT Asphalt Bangun Sarana tentang penyelesaian hutang proyek', '1', 'https://drive.google.com/open?id=1vEatM5G9TTh2-EDrh6XVP7F_HyrJLSng', 1, 1),
(1087, 42, 35, '2023-10-30', 'WFO', 'Pengarahan tim Task Force oleh SVP Infrastruktur 2', '0,5', 'https://drive.google.com/open?id=1b5nVPHSleVug2DBUmdk_ZZ53EMxLcn9R', 1, 1),
(1088, 42, 7, '2023-10-30', 'WFO', 'Pengujian KI KM Portal Crane Portable of primer canal onsite irrigation system project & perubahan desain pekerjaan sambungan precast lining menggunakan campuran skimcoat', '1,5', 'https://drive.google.com/open?id=1_2enHQc57IblldQulSFOz7MxuwqWtkbn', 1, 1),
(1089, 42, 35, '2023-10-30', 'WFO', 'Koordinasi actian plan tim task force dept operasi 3', '1,5', '', 1, 1),
(1090, 42, 30, '2023-10-30', 'WFO', 'Rapat tindakan perbaikan temuan audit internal kantor divisi infrastruktur 2', '0,5', 'https://drive.google.com/open?id=11UdV72vOSFJ9fjd8Io-LKjVmpdebX9bd', 1, 1),
(1091, 42, 24, '2023-10-30', 'WFO', 'Membaca prosedur penerapan sistem manajemen keselamatan, kesehatan kerja dan lingkungan (SMK3L)', '0,5', '', 1, 1),
(1092, 45, 7, '2023-10-30', 'WFO', 'Zoom Revisi KI/KM Kolaborasi Proyek MUTIP meeting.', '1', '', 1, 1);
INSERT INTO `engineering_activity` (`id_engineering_activity`, `id_user`, `id_kategori_pekerjaan`, `tanggal_masuk_kerja`, `status_kerja`, `judul_pekerjaan`, `durasi`, `evidence`, `checked`, `validasi`) VALUES
(1093, 45, 35, '2023-10-30', 'WFO', 'Revisi penulisan KI/KM kolaborasi dengan proyek MUTIP', '6', '', 1, 1),
(1094, 37, 11, '2023-10-30', 'WFA', 'Closing temuan audit SMW', '4', '', 1, 1),
(1095, 37, 7, '2023-10-30', 'WFA', 'Koordinasi persiapan KIKM award', '1', '', 1, 1),
(1096, 37, 16, '2023-10-30', 'WFA', 'Koordinasi internal tim digimon', '1,5', '', 1, 1),
(1097, 44, 7, '2023-10-30', 'WFO', 'Zoom Revisi KI/KM Kolaborasi Proyek MUTIP meeting. (Jiddar Roller)', '1', 'https://drive.google.com/open?id=10CNwF_7caSlHpLKGALIg2e1vVn50EDx4', 1, 1),
(1098, 44, 7, '2023-10-30', 'WFO', 'koordinasi KIKM Award 2023', '1', 'https://drive.google.com/open?id=1BWeO_7F0ORoHP3pk3jzPKUQx9d6Gfunb', 1, 1),
(1099, 32, 35, '2023-10-30', 'WFO', 'Perbantuan Proyek MUTIP 1', '8', 'https://drive.google.com/open?id=1rBmoiEyaTT-j-x0ig61DlDnNWn2aXuQV', 1, 1),
(1100, 47, 35, '2023-10-30', 'WFO', 'Zoom paparan KIKM proeyek MUTIP-1', '1,5', 'https://drive.google.com/open?id=1cYXfXF7RNenVPWBSIuM0Hg3SYoGQnBdI', 1, 1),
(1101, 47, 35, '2023-10-30', 'WFO', 'Bantu Revisi penulisan KIKM proyek Keerom', '2', 'https://drive.google.com/open?id=1sRB-eMf-uoxdjIVCIx6EKKw_1tpAyEET', 1, 1),
(1102, 39, 22, '2023-10-30', 'WFO', 'Monitoring Lapbul Oktober dan Diskusi RAB Engineering 2024', '7', '', 1, 1),
(1103, 38, 11, '2023-10-30', 'WFA', 'membuat proses bisnis website', '6', '', 1, 1),
(1104, 33, 35, '2023-10-30', 'WFO', 'Mengumpulkan data untuk laporan final kegiatan sayembara akhlak', '8', '', 1, 1),
(1105, 34, 35, '2023-10-30', 'WFA', 'Buat Dokumen Laporan Cuaca dan Executive Summary Lereng Underpass Tatakan 101 untuk kelengkapan dokumen CAR', '5', 'https://drive.google.com/open?id=1hG5wHAn46sDz_ds2hQViAYKkumHtg-0y', 1, 1),
(1106, 29, 2, '2023-10-30', 'WFA', 'Analisis kebutuhan pondasi jembatan proyek jenelata', '8', '', 1, 1),
(1107, 30, 2, '2023-10-30', 'WFA', 'Desain Rigging Tools Pamukkulu', '8', '', 1, 1),
(1108, 49, 7, '2023-10-30', 'WFO', 'zoom meeting KI KM proyek MUTIP', '1,5', '', 1, 1),
(1109, 49, 35, '2023-10-30', 'WFO', 'koordinasi task force QHSE dengan KADIV Infrastruktur 2', '0,5', '', 1, 1),
(1110, 49, 35, '2023-10-30', 'WFO', 'rapat koordniasi dengan tim task force dept 4', '4', '', 1, 1),
(1111, 28, 7, '2023-10-30', 'WFO', 'Zoom Pembahasan KI/KM Proyek MUTIP', '1,5', 'https://drive.google.com/open?id=1am1O13pAMmotvw5pmcl0-E6_AEd311RS', 1, 1),
(1112, 28, 35, '2023-10-30', 'WFO', 'Rapat Internal Pembahasan Kompensasi Proyek Kijing', '1,5', '', 1, 1),
(1113, 28, 35, '2023-10-30', 'WFO', 'Perjalanan Dinas ke Batam bersama Tim Task Force QHSE', '5', 'https://drive.google.com/open?id=16i8HC17gGNj9Kjd7Z6yVH9qQ4w9RDJPn', 1, 1),
(1114, 48, 7, '2023-10-31', 'WFA', 'ZOOM REVIEW KIKM PROYEK BENDUNGAN PAMUKKULU: Modifikasi_susunan_saringan_stone_crusher untuk pemenuhan_gradasi_material_timbunan_zona_2A_dan_2B', '1,5', 'https://drive.google.com/open?id=1XDsExY40zZAMcQrO7zR-9XY9Kq8f78yj', 1, 1),
(1115, 48, 32, '2023-10-31', 'WFA', 'AWARENESS COBIT 2019', '3', 'https://drive.google.com/open?id=1VSRWZRrFSkUPIPQ5Ds_Zt3dDrD9PyRGp', 1, 1),
(1116, 45, 35, '2023-10-31', 'WFO', 'Zoom Awareness Cobit 2019', '3', '', 1, 1),
(1117, 41, 20, '2023-10-31', 'WFO', 'membuat fitur monthly report', '8', '', 1, 1),
(1118, 44, 7, '2023-10-31', 'WFO', 'Zoom meeting KI/KM BENDUNGAN PAMUKKULU', '1,5', 'https://drive.google.com/open?id=1v6Dvvbr3Oa3YLg4TZwWV82AZFy_T_dTF', 1, 1),
(1119, 46, 7, '2023-10-31', 'WFA', 'review kolaborasi KI/KM proyek pamukulu', '1,5', '', 1, 1),
(1120, 46, 11, '2023-10-31', 'WFA', 'awarenes cobit 2019', '4', '', 1, 1),
(1121, 46, 28, '2023-10-31', 'WFA', 'monitoring lps proyek infra 2', '2,5', '', 1, 1),
(1122, 48, 7, '2023-10-31', 'WFA', 'Collection dan uploading hasil meeting zoom review KI-KM Kolaborasi Proyek Bendungan Pamukkulu', '1', 'https://drive.google.com/open?id=1bq8MW31ME6mRwctDXNQ-GK9tap89IqdD', 1, 1),
(1123, 42, 35, '2023-10-31', 'WFO', 'Mengikuti zoom Awareness Cobit 2019 terkait tata kelola IT dalam lingkup organisasi', '2,5', 'https://drive.google.com/open?id=1KFtW7IGxfwcbjlc7JdHJ2KILmd_89djM', 1, 1),
(1124, 42, 35, '2023-10-31', 'WFO', 'Membuat rundown week 1 tim taskforce QHSE dept. 3 & materi paparan', '2', 'https://drive.google.com/open?id=1h9YnlG1o0Z3jbmrCRwHcX0QYceveKNj7', 1, 1),
(1125, 42, 35, '2023-10-31', 'WFO', 'Koordinasi dengan Tim Task Force Dept. 3 di ruang meeting Infra 2', '1,5', 'https://drive.google.com/open?id=1gUgt0VcotHaJR5j574fIzrgs1NIr-Zmo', 1, 1),
(1126, 42, 14, '2023-10-31', 'WFO', 'Mengisi form time management bulan Oktober 2023', '1,5', '', 1, 1),
(1127, 50, 27, '2023-10-31', 'WFO', 'Zoom meeting KI/KM Proyek Pamukkulu', '1,5', '', 1, 1),
(1128, 45, 35, '2023-10-31', 'WFO', 'Revisi Penulisan ki/km kolaborasi dengan proyek MUTIP', '4', '', 1, 1),
(1129, 47, 35, '2023-10-31', 'WFO', 'Zoom Awareness cobit 2019', '3', 'https://drive.google.com/open?id=1UeENTcderxASnWIr5w9g6FKcQA7Ad2yp', 1, 1),
(1130, 47, 35, '2023-10-31', 'WFO', 'Zoom KIKM proyek Bendungan Pamukkulu', '1,5', 'https://drive.google.com/open?id=1011nCq7pJT4idif7MQUYPZJWb4UT48OC', 1, 1),
(1131, 39, 11, '2023-10-31', 'WFO', 'Monitoring Lapbul Oktober, Persiapan MTE November, Update Inventaris PC NB Infra 2', '7', '', 1, 1),
(1132, 32, 35, '2023-10-31', 'WFO', 'Perbantuan Proyek MUTIP 1 (Final Quantity and PHO)', '8', 'https://drive.google.com/open?id=1-nt1TLMfgSURxafPXOK2StnpyMFDbCNk', 1, 1),
(1133, 38, 11, '2023-10-31', 'WFO', 'membuat video podcast eps 2', '8', '', 1, 1),
(1134, 33, 35, '2023-10-31', 'WFO', 'Membuat draft laporan final kegiatan sayembara akhlak', '8', '', 1, 1),
(1135, 30, 2, '2023-10-31', 'WFA', 'Desain Rigging Tools Pamukkulu', '8', '', 1, 1),
(1136, 29, 35, '2023-10-31', 'WFA', 'Pelatihan Supervisory Wika Pratama', '4', 'https://drive.google.com/open?id=1i6s5_nVfJnR_WU42uBtU1FDz6RD24lW0', 1, 1),
(1137, 34, 29, '2023-10-31', 'WFA', 'Buat PPT Pelatihan QA/QC', '4', 'https://drive.google.com/open?id=1MfK9GoMioHPHNuw1Bn3bJG24VNLTD2kW', 1, 1),
(1138, 29, 35, '2023-10-31', 'WFA', 'Pembuatan Karya Inovasi Penanganan Longsor Tol IKN 3B', '7,5', '', 1, 1),
(1139, 37, 16, '2023-10-31', 'WFO', 'Koordinasi internal digimon', '1,5', '', 1, 1),
(1140, 37, 11, '2023-10-31', 'WFO', 'Koordinasi dengan pak media', '2,5', '', 1, 1),
(1141, 37, 7, '2023-10-31', 'WFO', 'Membaca dan menillaian awal KI KM', '4', '', 1, 1),
(1142, 49, 29, '2023-10-31', 'WFO', 'Mengikuti zoom Awareness Cobit 2019 terkait tata kelola IT dalam lingkup organisasi', '3', '', 1, 1),
(1143, 49, 29, '2023-10-31', 'WFO', 'Membuat rundown week 1 tim taskforce QHSE dept. 4 & materi paparan untuk proyek', '3', '', 1, 1),
(1144, 28, 35, '2023-10-31', 'WFO', 'Kunjungan Lapangan ke Proyek Pembangunan Jalan Pelabuhan Utama - Bandara (Simpang Laluan Madani - Punggur) Batam oleh Tim Task Force QHSE DOP1', '8', 'https://drive.google.com/open?id=1H1r9lv_GMX6FcZloWhXejiEPluw-imbO', 1, 1),
(1146, 29, 35, '2023-11-01', 'WFA', 'Pelatihan Wikapratama Supervisory', '5', 'https://drive.google.com/open?id=1pajgeHdsGeVInle1mAqsAn9vbkRFuS8R', 1, 1),
(1147, 48, 35, '2023-11-01', 'WFA', 'DESIS WIKA Infrastructure 2 Division - Youtuber', '1.5', 'https://drive.google.com/open?id=1i6LV_cqs1hQHMZohvVLgHOWTCW1vNcnf', 1, 1),
(1148, 48, 35, '2023-11-01', 'WFA', 'Digitalisasi WIKA Infrastructure 2 Division - Youtube', '1.5', 'https://drive.google.com/open?id=1GvFjoeWRNzZKaurmVpU5o_0uxNd1Wkf8', 1, 1),
(1149, 48, 32, '2023-11-01', 'WFA', 'WORKSHOP KONTRUKSI INDONESIA 2023 DI JIEXPO KEMAYORAN', '4', 'https://drive.google.com/open?id=1gbP17gS5PKIUc3peusK_QViKn-UmgOY3', 1, 1),
(1150, 41, 20, '2023-11-01', 'WFO', 'update dan revisi Monthly report', '4', 'https://drive.google.com/open?id=1Ylz3xNOWOvf7P87AZR4zzMwxPEoHkKAO', 1, 1),
(1151, 41, 20, '2023-11-01', 'WFO', 'membuat fitur productivity', '4', '', 1, 1),
(1152, 46, 27, '2023-11-01', 'WFA', 'perapihan data RKP proyek banggai dan donggala', '4', '', 1, 1),
(1153, 46, 28, '2023-11-01', 'WFA', 'monitoring data LPS', '4', '', 1, 1),
(1154, 38, 11, '2023-11-01', 'WFO', 'membuat proses bisnis website bagiian log in data productivity', '7', '', 1, 1),
(1155, 32, 35, '2023-11-01', 'WFO', 'Perbantuan Proyek MUTIP 1 (Final Quantity snd PHO)', '8', 'https://drive.google.com/open?id=1XUzknBkD7IR3luzGYL8g9pLgQXRZu2NO', 1, 1),
(1156, 45, 35, '2023-11-01', 'WFO', 'Revisi penulisan KI/KM kolaborasi dengan proyek MUTIP', '7.5', '', 1, 1),
(1157, 44, 35, '2023-11-01', 'WFO', 'koordinasi surat tugas tender dengan Pemasaran Infra Div', '4', '', 1, 1),
(1158, 44, 27, '2023-11-01', 'WFO', 'update evaluasi RKP Engineering dan koordinasi dengan Tim Proyek MWRD', '3.5', 'https://drive.google.com/open?id=1MLGqPUakp9LqKj1PK-4SI1Ddu591tvDJ', 1, 1),
(1159, 42, 35, '2023-11-01', 'WFO', 'Agenda site visit Tim Task Force QHSE ke proyek Duplikasi Jembatan Kapuas, Pontianak, Kalbar', '8', 'https://drive.google.com/open?id=1ZW-LPTvsc_WsaNVBYTpaEBOHGv8M_Rqg', 1, 1),
(1160, 29, 2, '2023-11-01', 'WFA', 'Meeting dengan tim proyek pamukkulu', '2', '', 1, 1),
(1161, 39, 17, '2023-11-01', 'WFO', 'Revisi RKD dan monitoring BIM Prioritas 2', '7', '', 1, 1),
(1162, 29, 35, '2023-11-01', 'WFA', 'Pembuatan Karya Inovasi secant Pile proyek sumbu timur', '6', '', 1, 1),
(1163, 49, 35, '2023-11-01', 'WFO', 'Agenda site visit tim taskforce dept 4 proyek pamukulu', '8', 'https://drive.google.com/open?id=1PAX94erDKvrm4e0I6YRw6lLqfHpVwx-P', 1, 1),
(1164, 43, 7, '2023-11-01', 'WFO', 'Menyusun Makalan Karya Inovasi Kolaborasi dengan proyek Benoa 5%', '7', '', 1, 1),
(1165, 29, 35, '2023-11-02', 'WFO', 'Pelatihan Supervisory Wikapratama', '4.5', 'https://drive.google.com/open?id=1oohRhSHsXdnwRhjeJTp-LJb2sEsAbnYL', 1, 1),
(1166, 41, 20, '2023-11-02', 'WFO', 'membuat fitur \"ubahpassword, fitur profil, dan edit profil\"', '4', 'https://drive.google.com/open?id=1aGiuQJFm1UrbDwX4gnhWWI8_RlfcRwlL', 1, 1),
(1167, 41, 20, '2023-11-02', 'WFO', 'melanjutkan develop tabel productivity', '4', '', 1, 1),
(1168, 48, 29, '2023-11-02', 'WFA', 'Workshop kontruksi indonesia hari ke 2 di kemayoran JIEXPO', '8', 'https://drive.google.com/open?id=1CdUTtVkygiqjnz4qRbHFzrCasJ0ZGgFh', 1, 1),
(1169, 46, 35, '2023-11-02', 'WFA', 'teknologi, perencanaan, dan tantangan pembangunan trasportasi massal berbasis Rel ( KCIC,LRT,MRT )', '8', '', 1, 1),
(1170, 32, 35, '2023-11-02', 'WFO', 'Perbantuan Proyek MUTIP 1', '8', '', 1, 1),
(1171, 45, 35, '2023-11-02', 'WFO', 'Seminar teknologi, perencanaan, dan tantangan pembangunan trasportasi massal berbasis Rel ( KCIC,LRT,MRT ) di waskita tower', '8', 'https://drive.google.com/open?id=1uj-eJc433hfWCvnr9HhEoMSQXSl5vR7A', 1, 1),
(1172, 34, 29, '2023-11-02', 'WFA', 'Persentasi Pelatihan QA/QC', '2.5', '', 1, 1),
(1173, 38, 11, '2023-11-02', 'WFO', 'membuat proses bisnis website', '7', '', 1, 1),
(1174, 42, 35, '2023-11-02', 'WFO', 'Agenda site visit Tim Task Force QHSE ke proyek Relokasi Jalan Nasional Sei Duri Mempawah Kalbar.', '8', 'https://drive.google.com/open?id=1OupRhA8921ifHlT3rQPPYPVcgl5jM9Vc', 1, 1),
(1175, 29, 2, '2023-11-02', 'WFA', 'Kalkulasi Steel Pipe Pile sebagai saluran drainase proyek bendungan pamukkulu', '6', '', 1, 1),
(1176, 39, 29, '2023-11-02', 'WFO', 'Mengikuti Seminar PU Bangun', '4', '', 1, 1),
(1177, 39, 11, '2023-11-02', 'WFO', 'Persiapan Meet the Engineer bulan November', '3', '', 1, 1),
(1178, 49, 35, '2023-11-02', 'WFO', 'Agenda Kunjungan tim taskforce proyek pamukulu, maminasata, jenelata', '8', 'https://drive.google.com/open?id=13zRLERPuiZmtxd4njJwxGX1Hixz40Qah', 1, 1),
(1179, 43, 35, '2023-11-02', 'WFA', 'Menghadiri acara Forum Bangun Antara BUMN Konstruksi, dengan tema teknologi, perencanaan, dan tantangan pembangunan trasportasi massal berbasis Rel (KCIC,LRT,MRT)', '8', '', 1, 1),
(1180, 45, 35, '2023-11-03', 'WFO', 'Revisi penulisan KI/KM kolaborasi dengan proyek MUTIP', '8', '', 1, 1),
(1181, 48, 7, '2023-11-03', 'WFA', 'Kordinasi KIKM dengan proyek bendungan dan IKN', '1.5', '', 1, 1),
(1182, 48, 29, '2023-11-03', 'WFA', 'Workshop kontruksi indonesia di JIXPO Kemayoran hari terakhir', '5', 'https://drive.google.com/open?id=1XwYwjbLgLZr5adziYhoM6QZsDAAXsV7d', 1, 1),
(1183, 46, 27, '2023-11-03', 'WFA', 'monitoring RKP donggala dan banggai', '4', '', 1, 1),
(1184, 46, 28, '2023-11-03', 'WFA', 'kolaborasi KI/KM proyek donggala dan banggai', '4', '', 1, 1),
(1185, 34, 2, '2023-11-03', 'WFA', 'Aanwidzing Proyek Lingkar Kijing', '2.5', 'https://drive.google.com/open?id=1D3PVcSdPtfkn3q6SjhuyJ4992Hh6iurN', 1, 1),
(1186, 38, 20, '2023-11-03', 'WFO', 'membuat video podcast', '7', '', 1, 1),
(1187, 42, 35, '2023-11-03', 'WFO', 'Agenda site visit Tim Task Force QHSE ke proyek Duplikasi Jembatan Kapuas, Pontianak, Kalbar', '8', 'https://drive.google.com/open?id=12NB5TrpGhKx447UpV215rYsZyIZzFpRY', 1, 1),
(1188, 29, 35, '2023-11-03', 'WFA', 'Site visit tim task force WIKA ke proyek palang joglo Solo', '8', '', 1, 1),
(1189, 39, 17, '2023-11-03', 'WFO', 'Monitoring BIM SPAM Mamminasata & Revisi proposal KI KM Award', '7', '', 1, 1),
(1190, 49, 35, '2023-11-03', 'WFO', 'Agenda tim taskforce QHSE kunjungan ke proyek Makassar new port', '8', 'https://drive.google.com/open?id=17sYu3DIEZLy8Awv_kRUmN4i4PwCLmuWQ', 1, 1),
(1191, 32, 35, '2023-11-03', 'WFO', 'Perbantuan Proyek MUTIP 1 (Final Quantity and PHO)', '8', '', 1, 1),
(1192, 41, 20, '2023-11-03', 'WFO', 'melanjutkan develop productivity', '8', 'https://drive.google.com/open?id=1swcRbVw3_kw-KrJ8tgx9eqQdwnsvDC0l', 1, 1),
(1193, 43, 7, '2023-11-03', 'WFO', 'Menyusun makalah Karya Inovasi Kolaborasi dengan Proyek Benoa 10 %', '6', '', 1, 1),
(1194, 43, 35, '2023-11-03', 'WFO', 'Membaca literasi PMBOK 7th dari PMI', '2', '', 1, 1),
(1195, 48, 7, '2023-11-06', 'WFO', 'MEMPELAJARI KM RANCANGAN DUMMY SIGNAL RESISTOR TEMPORARY PENGGANTI SIGNAL PILOT HP PUMP PLTMG LANGGUR 20 MW DARI WIKA INFO', '1.5', 'https://drive.google.com/open?id=1_GEzNBHlcy3pHFek8s-1mmlEts5iZGVj', 1, 1),
(1196, 48, 7, '2023-11-06', 'WFO', 'KORDINASI KIKM DENGAN PIC PROYEK BENDUNGAN PAMUKKULU UNTUK UPDATE KAMIS PPT DAN UPDATE TULISAN BISA DI SELESAI', '1.5', '', 1, 1),
(1197, 48, 7, '2023-11-06', 'WFO', 'KORDINASI KIKM DENGAN PIC PROYEK TOL IKN MENGENAI UPDATE KIKM DI MINGGU INI MASIH DIUSAHAKAN', '1', '', 1, 1),
(1198, 41, 20, '2023-11-06', 'WFO', 'update progress tabel productivity', '8', 'https://drive.google.com/open?id=1wrVCUrSo_4Bcg1HLEwrY7VuocB_clds5', 1, 1),
(1199, 46, 7, '2023-11-06', 'WFO', 'monitoring KI/KM banggai dan donggala', '2', '', 1, 1),
(1200, 46, 27, '2023-11-06', 'WFO', 'monitoring RKP banggai dan donggala', '3', '', 1, 1),
(1201, 46, 28, '2023-11-06', 'WFO', 'monitoring LPS proyek infra 2', '3', '', 1, 1),
(1202, 48, 27, '2023-11-06', 'WFO', 'MERAPIHKAN DATA REVIEW RKP PERIODE SEPTEMBER (MOM/NOTULENSI, PPT RKP, EXCEL, DAFTAR HADIR DLL) KE DALAM 1 FOLDER LINK', '3.5', 'https://drive.google.com/open?id=16aprXG-hXAHAihvSRTBx9ViGr_ghZCnU', 1, 1),
(1203, 34, 2, '2023-11-06', 'WFO', 'Analisis Design Jembatan A-100 Bendungan Jenelata', '5', 'https://drive.google.com/open?id=1y-NRIjfNzdYN1XX3JgOj2dYATGdGW66e', 1, 1),
(1204, 38, 11, '2023-11-06', 'WFO', 'membuat proses bisnis website', '8', '', 1, 1),
(1205, 45, 35, '2023-11-06', 'WFA', 'Pembuatan PPT presentasi ki/km kolaborasi denganproyek MUTIP', '8', '', 1, 1),
(1206, 42, 35, '2023-11-06', 'WFA', 'Mengikuti undangan evaluasi RK JO proyek Infra 2 dept operasi 3', '3', 'https://drive.google.com/open?id=10M-FAxQ71VDeEC7kYcsb8mqxP7F6JKg2', 1, 1),
(1207, 42, 35, '2023-11-06', 'WFA', 'Menyusun laporan minggu pertama tim Task Force QHSE dept 3', '2', '', 1, 1),
(1208, 42, 27, '2023-11-06', 'WFA', 'Monitoring update program kerja Sistem Engineering (KI KM, review RKP, dll)', '1', '', 1, 1),
(1209, 29, 2, '2023-11-06', 'WFO', 'Diskusi dengan tim proyek RJN', '3', '', 1, 1),
(1210, 29, 2, '2023-11-06', 'WFO', 'Kalkulasi Steel Pipe Pile sebagai saluran drainase proyek bendungan pamukkulu', '7.5', '', 1, 1),
(1211, 39, 19, '2023-11-06', 'WFA', 'Monitoring BIM & Lisensi Software Infra 2', '6', '', 1, 1),
(1212, 49, 35, '2023-11-06', 'WFO', 'Agenda tim task force QHSE kunjungan proyek Donggala Palu', '8', 'https://drive.google.com/open?id=1c7zPOuOOLCGbR66yjH6wp5HufRBKe1k1', 1, 1),
(1213, 37, 17, '2023-11-06', 'WFO', 'Koordinasi digimon', '2', '', 1, 1),
(1214, 37, 11, '2023-11-06', 'WFO', 'Diskusi dengan pak media', '2', '', 1, 1),
(1215, 37, 14, '2023-11-06', 'WFO', 'Personil frame time manajement', '1', '', 1, 1),
(1216, 37, 21, '2023-11-06', 'WFO', 'Collectig data & reviewing', '2', '', 1, 1),
(1217, 32, 35, '2023-11-06', 'WFO', 'Perbantuan Proyek MUTIP 1', '8', 'https://drive.google.com/open?id=1EU1bbd2hJZj8Q3gDRHCnOm--9ogowTLu', 1, 1),
(1218, 43, 35, '2023-11-06', 'WFO', 'Menyusun portofolio final PI5001 program PSPPI Insinyur ITB', '4', 'https://drive.google.com/open?id=1j4HMog52WD3xIC1HvL7C4LS4oZRFd1SL', 1, 1),
(1219, 43, 7, '2023-11-07', 'WFA', 'Menyusun makalah Karya Inovasi Kolaborasi dengan Proyek Benoa 15 %', '4', '', 1, 1),
(1220, 29, 35, '2023-11-07', 'WFO', 'Pelatihan Supervisory Wikapratama', '4.5', 'https://drive.google.com/open?id=1S05zg1uFg4CzH2kV1doQ--NJPOb1TTEi', 1, 1),
(1221, 48, 7, '2023-11-07', 'WFO', 'MEMBUAT NOTULENSI (MOM) DARI PERMINTAAN PIC PROYEK PAMUKKULU UNTUK BAHAN UPDATE KIKM BENDUNGAN PAMUKKULU', '2', 'https://drive.google.com/open?id=1sfOfGLwkhvjMuEV24sSnynfMgvsf8LYr', 1, 1),
(1222, 48, 27, '2023-11-07', 'WFO', 'UPDATE NOTULENSI (MOM) PROYEK TOL IKN REVIEW RKP BAHAN KELENGKAPAN DOKUMENTASI DI SHAREPOINT', '2', 'https://drive.google.com/open?id=1mttZ5_SwbruWIPHzS_i-5jKcHIhJm8FW', 1, 1),
(1223, 48, 27, '2023-11-07', 'WFO', 'UPDATE NOTULENSI (MOM) PROYEK BENDUNGAN PAMUKKULU REVIEW RKP BAHAN KELENGKAPAN DOKUMENTASI DI SHAREPOINT', '2', 'https://drive.google.com/open?id=11O3xZzVA7eSbZReHiPqvHDmwEzNlByAS', 1, 1),
(1224, 29, 35, '2023-11-07', 'WFO', 'Meeting Task Force dengan Divisi HSE', '2.5', 'https://drive.google.com/open?id=1os60G4v4uqmPVl7nEP23rqZ6j6ls6qwl', 1, 1),
(1225, 46, 30, '2023-11-07', 'WFO', 'CMC 2023', '8', '', 1, 1),
(1226, 48, 30, '2023-11-07', 'WFO', 'MENGERJAKAN CMC ARAHAN HC', '2', 'https://drive.google.com/open?id=19zP9clLc8uOfoFvEB6ymYnerm9msWO9n', 1, 1),
(1227, 41, 20, '2023-11-07', 'WFO', 'revisi productivity', '8', '', 1, 1),
(1228, 34, 2, '2023-11-07', 'WFO', 'Analisis Steel Pipe Proyek Bendungan Pamukkulu', '5', 'https://drive.google.com/open?id=10nD81VG0RnatWRUA75HsopO74OEknDrC', 1, 1),
(1229, 38, 11, '2023-11-07', 'WFO', 'membuat proses bisnis website', '8', '', 1, 1),
(1230, 45, 35, '2023-11-07', 'WFA', 'Pembuatan PPT presentasi ki/km kolaborasi denganproyek MUTIP', '8', '', 1, 1),
(1231, 42, 35, '2023-11-07', 'WFA', 'Agenda site visit Tim Task Force QHSE ke proyek Penyiapan Lahan Industri PKT Bontang, Kaltim.', '8', 'https://drive.google.com/open?id=1L5hyP0oC3pROXva0xKRI7xl65wimciEZ', 1, 1),
(1232, 29, 35, '2023-11-07', 'WFO', 'Pembuatan Karya Inovasi Penanganan Longsor Lereng Proyek Tol IKN segmen 3B', '8', '', 1, 1),
(1233, 39, 11, '2023-11-07', 'WFA', 'Persiapan Meet the Engineer bulan November', '6', '', 1, 1),
(1234, 49, 35, '2023-11-07', 'WFO', 'Agenda tim task force kunjungan proyek pelabuhan wani', '8', 'https://drive.google.com/open?id=1VxsYuaSouFJYrYxtE-bjir8RmMdliEaV', 1, 1),
(1235, 37, 18, '2023-11-07', 'WFO', 'Monitoring dan koordinasi terkait laporan bulanan oktober', '5', '', 1, 1),
(1236, 37, 11, '2023-11-07', 'WFO', 'Koordinasi startegis planning dengan pak media', '2.5', '', 1, 1),
(1237, 32, 35, '2023-11-07', 'WFO', 'Perbantuan Proyek MUTIP 1', '8', 'https://drive.google.com/open?id=17BbCmiYTkt_F9G0cQWjjkG8xGmd7gPbu', 1, 1),
(1238, 43, 32, '2023-11-07', 'WFA', 'Membaca literasi PMBOK 7th dari PMI', '4', '', 1, 1),
(1239, 43, 35, '2023-11-07', 'WFA', 'Pengisian AKHLAK & Perapihan CMC, IDP & track record', '3', '', 1, 1),
(1240, 29, 35, '2023-11-08', 'WFO', 'Pelatihan Supervisory Wikapratama', '4.5', 'https://drive.google.com/open?id=1fildLQCB8N1l8-x4NsLiHU7hp70Cmabd', 1, 1),
(1241, 48, 30, '2023-11-08', 'WFO', 'UPDATE CMC & UPLOAD CMC KE SHAREPOINT', '2', 'https://drive.google.com/open?id=1plrVPonYPIqKyLK2VuxybNrDUWPHpE0u', 1, 1),
(1242, 48, 14, '2023-11-08', 'WFO', 'MENGERJAKAN INDIVIDUAL DEVELOPMENT PLAN ARAHAN HC', '2', 'https://drive.google.com/open?id=1GM5OC3BXXWj-eRelJaOeAtwoSEKbHw29', 1, 1),
(1243, 48, 24, '2023-11-08', 'WFO', 'Podcast QTalks (QHSE & Engineering Talks) - Episode 5 \"Obrolan Santai Prosedur Manajemen Mutu\"', '2', 'https://drive.google.com/open?id=1bDcjZ_kAocpQEsA9cidHA76_qezopCjU', 1, 1),
(1244, 46, 35, '2023-11-08', 'WFO', 'pengisian CMC dan IDP 2023', '2', '', 1, 1),
(1245, 46, 28, '2023-11-08', 'WFO', 'monitoring KI/KM proyek banggai dan donggala', '6', '', 1, 1),
(1246, 48, 35, '2023-11-08', 'WFO', 'KORDINASI ANTAR SESAMA PIC KIKM DI KANTOR', '1', '', 1, 1),
(1247, 41, 20, '2023-11-08', 'WFO', 'analysis tabel bantuan teknis, ki/km, dan mengimplementasikannya', '8', '', 1, 1),
(1248, 34, 29, '2023-11-08', 'WFO', 'Seminar Nasioanl & Kunjungan Proyek Pembiyaan Kreatif dan Berkelanjutan Pembangunan Jalan di Indonesia', '8', 'https://drive.google.com/open?id=1BhThoRqoX9sFngThKxqPUUCqG5DzYSid', 1, 1),
(1249, 38, 11, '2023-11-08', 'WFO', 'membuat proses bisnis website', '8', '', 1, 1),
(1250, 45, 35, '2023-11-08', 'WFA', 'mebaca-baca ki/km di portal', '6.5', '', 1, 1),
(1251, 42, 35, '2023-11-08', 'WFA', 'Agenda site visit Tim Task Force QHSE ke proyek Dredging Tursina PKT Bontang, Kaltim.', '8', 'https://drive.google.com/open?id=18QYceun998_7I6jmQY8iePiTMGx-Pgfg', 1, 1),
(1252, 29, 35, '2023-11-08', 'WFO', 'Pembuatan Karya Inovasi Secant Pile Proyek Sumbu Kebangsaan Timur', '8', '', 1, 1),
(1253, 39, 17, '2023-11-08', 'WFA', 'Revisi Daftar BIM Modeller Infra 2', '6', '', 1, 1),
(1254, 49, 35, '2023-11-08', 'WFO', 'Agenda kunjungan tim task force QHSE dept op 4 proyek Pasigala Sigi SUlteng', '8', 'https://drive.google.com/open?id=1P2Y_2tmp7fLkj-_2ttRVOCLOGsApCRia', 1, 1),
(1255, 40, 35, '2023-11-08', 'WFO', 'Penyusunan Klaim Kijing _ Final Qty', '8', 'https://drive.google.com/open?id=1dDQHeZIr1SyECX9ig-gxKvP81egdwVS6', 1, 1),
(1256, 37, 21, '2023-11-08', 'WFO', 'Koordinasi digimon dan monitoring data dasboard lapbul oktober', '5', '', 1, 1),
(1257, 37, 12, '2023-11-08', 'WFO', 'diskusi dengan pak media terkait persiapan rakor divisi', '2.5', '', 1, 1),
(1258, 32, 35, '2023-11-08', 'WFO', 'Perbantuan Proyek MUTIP 1', '8', 'https://drive.google.com/open?id=1pfMfKse-qIr_F4Ciotk2QEtm4ILoNYN8', 1, 1),
(1259, 43, 7, '2023-11-08', 'WFA', 'Menyusun makalah Karya Inovasi Kolaborasi dengan Proyek Benoa 15 %', '3.5', '', 1, 1),
(1260, 43, 35, '2023-11-08', 'WFA', 'Menyusun revisi portofolio final PI5002 program PSPPI Insinyur ITB', '3.5', '', 1, 1),
(1261, 29, 35, '2023-11-09', 'WFO', 'Pelatihan supervisory wikapratama', '4.5', 'https://drive.google.com/open?id=1lQ817S0N6Qnt5G9p8sEvS-xlBamdftHX', 1, 1),
(1262, 48, 7, '2023-11-09', 'WFO', 'Collecting and uploading file update KIKM Bendungan Pamukkulu', '2', 'https://drive.google.com/open?id=1r5F7cgKrlN5mK2OLE-Gv9_snHCnaMazR', 1, 1),
(1263, 48, 29, '2023-11-09', 'WFO', 'Implementasi Intelligent Compactor - Proyek Jalan Sumbu Kebangsaan Sisi Timur IKN dan literatur pendukung from Google', '2', 'https://drive.google.com/open?id=1XmckqPWXMG25E0oPvSwviTQNCfY3oHjm', 1, 1),
(1264, 48, 7, '2023-11-09', 'WFO', 'Kordinasi dengan PIC KIKM Toll IKN', '1', '', 1, 1),
(1265, 46, 11, '2023-11-09', 'WFO', 'prosedur manajemen mutu ( knowledge sharing )', '2', '', 1, 1),
(1266, 46, 14, '2023-11-09', 'WFO', 'coaching untuk pengembangan karir', '4', '', 1, 1),
(1267, 41, 20, '2023-11-09', 'WFO', 'implementasi tabel bantuan teknis & KIKM', '8', 'https://drive.google.com/open?id=1nByLEaWcJKRVCA2Pxgb8l_DwRRGkv-Ha', 1, 1),
(1268, 48, 32, '2023-11-09', 'WFO', 'Mengenal teknologi sistem monitoring keselamatan kerja dan produktivitas WIKA -Pemahaman dan pengenalan', '0.5', 'https://drive.google.com/open?id=1uccrn_Sh4PERuCwVNexPGutew9twAlcO', 1, 1),
(1269, 46, 11, '2023-11-09', 'WFO', 'belajar sistem intelligent compactor', '2', '', 1, 1),
(1270, 34, 2, '2023-11-09', 'WFO', 'Review Analisa Steel Pipe Bendungan Pamukkulu (Menyesuaikan stock steel pipe di lapangan)', '5', 'https://drive.google.com/open?id=1_uQFTxn5DcYZAcpcaBC62-iIYGlaSj3c', 1, 1),
(1271, 48, 30, '2023-11-09', 'WFO', 'Update CMC dan IDP arahan HC untuk memastikan kesesuaian berdasarkan arahan kordinator', '1.5', '', 1, 1),
(1272, 38, 11, '2023-11-09', 'WFO', 'membuat proses bisnis website', '8', '', 1, 1),
(1273, 45, 35, '2023-11-09', 'WFA', 'revisi penulisan ki/km kolaborasi denganproyek MUTIP', '8', '', 1, 1),
(1274, 42, 35, '2023-11-09', 'WFA', 'Agenda site visit Tim Task Force QHSE ke proyek Jalan sumbu kebangsaan sisi timur, Kaltim.', '8', 'https://drive.google.com/open?id=1t0I0KalDve2JwM6GXWhWtTdPKBgmBW0L', 1, 1),
(1275, 29, 35, '2023-11-09', 'WFO', 'Menghadiri Seminar PIT HATTI 2023', '4.5', '', 1, 1),
(1276, 29, 35, '2023-11-09', 'WFA', 'Pembuatan Karya Inovasi Jembatan Pelengkung Proyek Sumbu Timur', '8', '', 1, 1),
(1277, 49, 35, '2023-11-09', 'WFO', 'Agenda tim taskforce kunjungan proyek gumbasa sigi', '8', 'https://drive.google.com/open?id=1hjgIGM9xtzX-4OOt0rsnAOjF3DYOi0G3', 1, 1),
(1278, 40, 35, '2023-11-09', 'WFO', 'WFPM B7', '4.5', 'https://drive.google.com/open?id=1d2w2U4_3BirjzqfNxivmwDTVGjsmlUj7', 1, 1),
(1279, 40, 35, '2023-11-09', 'WFO', 'Koordinasi Penyusunan Klaim Kijing - Sub Engineering', '4.5', '', 1, 1),
(1280, 37, 20, '2023-11-09', 'WFO', 'controling data dasboard', '5', '', 1, 1),
(1281, 37, 13, '2023-11-09', 'WFO', 'koordinasi digimon', '2.5', '', 1, 1),
(1282, 32, 35, '2023-11-09', 'WFA', 'Perbantuan Proyek MUTIP 1 (Final Quantity and PHO)', '8', 'https://drive.google.com/open?id=1zbJnuJpnAagq0tNOTN3rmjoQmIMA2FQE', 1, 1),
(1283, 43, 7, '2023-11-09', 'WFA', 'Menyusun makalah Karya Inovasi Kolaborasi dengan Proyek Benoa 20 %', '7', '', 1, 1),
(1284, 48, 27, '2023-11-10', 'WFO', 'Kordinasi Update Review RKP Proyek Bendungan Pamukkulu atas note dari sharepoint', '2.5', 'https://drive.google.com/open?id=1pubhZdSsefmQK2N4Utt_POLmhxDSAxVi', 1, 1),
(1285, 48, 27, '2023-11-10', 'WFO', 'Kordinasi dengan sesama PIC di kantor untuk pembahasan update RKP di sharepoint divisi', '2.5', 'https://drive.google.com/open?id=1tBfQA4OY2EHJ4wjXd4i9YocjdRtP5QRd', 1, 1),
(1286, 46, 28, '2023-11-10', 'WFO', 'monitoring data LPS', '3', '', 1, 1),
(1287, 46, 27, '2023-11-10', 'WFO', 'monitoring RKP proyek banggai dan proyek donggala', '2', '', 1, 1),
(1288, 46, 35, '2023-11-10', 'WFO', 'belajar sistim perkuatan terowongan dengan fenomena heaving invert', '2', '', 1, 1),
(1289, 41, 20, '2023-11-10', 'WFO', 'Revisi productivity by team & by person', '8', 'https://drive.google.com/open?id=1f1qHnxklVenJD5mxHFm5YVjZlMMhq3IE', 1, 1),
(1290, 48, 7, '2023-11-10', 'WFO', 'Mempelajari KIKM Sistem Perkuatan Terowongan Dengan Fenomena Heaving Invert di KM link from Whatsapp grub', '2.5', 'https://drive.google.com/open?id=1odDlreqHLYyVfjoxaLdEGzmeBxfLX8vQ', 1, 1),
(1291, 38, 11, '2023-11-10', 'WFO', 'membuat proses bisnis website', '8', '', 1, 1),
(1292, 45, 35, '2023-11-10', 'WFA', 'revisi penulisan ki/km kolaborasi denganproyek MUTIP', '8', '', 1, 1),
(1293, 42, 35, '2023-11-10', 'WFA', 'Agenda site visit Tim Task Force QHSE ke proyek Jalan sumbu kebangsaan sisi timur, Kaltim.', '8', 'https://drive.google.com/open?id=1Wlif2J5sBQlA3zP87Gb5rwNgqYK1D_Y8', 1, 1),
(1294, 39, 17, '2023-11-10', 'WFA', 'Monitoring BIM dan Lisensi Software Infra 2', '6', '', 1, 1),
(1295, 29, 35, '2023-11-10', 'WFA', 'Menghadiri Seminar PIT HATTI 2023', '8', 'https://drive.google.com/open?id=1KJrpCb1wVDmhtwcFJ513_PID6Ncr9_69', 1, 1),
(1296, 29, 2, '2023-11-10', 'WFO', 'Analisis penanganan longsor lereng bendungan manikin', '7', '', 1, 1),
(1297, 40, 35, '2023-11-10', 'WFO', 'WFPM Batch7', '4.5', 'https://drive.google.com/open?id=1hySd88EcfnhnHKHSrHgNTBPDalexcCpo', 1, 1),
(1298, 40, 35, '2023-11-10', 'WFO', 'Koordinasi Penyusunan Eviden Klaim Kijing (colecting eviden)', '2.5', '', 1, 1),
(1299, 40, 35, '2023-11-10', 'WFO', 'Self Learning Infrawork Basic', '4', 'https://drive.google.com/open?id=1cviwOxyAqnhvNksmzRet-sGTMviKA8qW', 1, 1),
(1300, 37, 7, '2023-11-10', 'WFO', 'Penilaian KIKM award', '5', '', 1, 1),
(1301, 37, 21, '2023-11-10', 'WFO', 'Koordinasi digimon', '2.5', '', 1, 1),
(1302, 49, 35, '2023-11-10', 'WFO', 'Agenda tim taskforce QHSEE dept 4', '7', '', 1, 1),
(1303, 32, 35, '2023-11-10', 'WFO', 'Proyek MUTIP 1 ( Final Quantity and PHO)', '8', 'https://drive.google.com/open?id=14-CvcBEtf_FmMoSJzCE4-vAOCzOP7Ctz', 1, 1),
(1304, 43, 35, '2023-11-10', 'WFA', 'Membaca literasi PMBOK 7th dari PMI', '3.5', '', 1, 1),
(1305, 43, 27, '2023-11-10', 'WFA', 'Perapihan data keseluruhan review RKP Proyek Infra 2', '3', '', 1, 1),
(1306, 29, 35, '2023-11-11', 'WFA', 'Presentasi Paper pada acara Pekan Ilmiah Tahunan HATTI 2023', '8', 'https://drive.google.com/open?id=1qwzbQl61jx9tUMMwHi0V_A7mMZxiysyD', 1, 1),
(1307, 29, 35, '2023-11-11', 'WFA', 'Pembuatan Karya Inovasi Jembatan Pelengkung Proyek Sumbu Kebangsaan Timur', '4', '', 1, 1),
(1308, 45, 35, '2023-11-13', 'WFO', 'kick of meeting ki/km awards dengan tem penilai', '1', '', 1, 1),
(1309, 46, 28, '2023-11-13', 'WFA', 'perapihan data LPS proyek infra 2', '4', '', 1, 1),
(1310, 46, 27, '2023-11-13', 'WFA', 'monitoring update RKP banggai dan donggala', '2', '', 1, 1),
(1311, 46, 11, '2023-11-13', 'WFA', 'mempelajari prosedur manajemen aset rev.01', '2', '', 1, 1),
(1312, 48, 24, '2023-11-13', 'WFA', 'Update kelengkapan (check and recheck) aktifitas harian bulan september dan oktober arahan divisi', '4', '', 1, 1),
(1313, 48, 7, '2023-11-13', 'WFA', 'Pemeriksaan berkas yang sudah masuk mengenai KIKM dari Proyek Bendungan Pamukkulu', '2', '', 1, 1),
(1314, 29, 35, '2023-11-13', 'WFA', 'Pembuatan Karya Inovasi Secant Pile Proyek Sumbu Timur', '8', '', 1, 1),
(1315, 29, 35, '2023-11-13', 'WFA', 'Pembuatan Karya Inovasi Review Desain Jembatan Pelengkung Sumbu Timur', '8', '', 1, 1),
(1316, 29, 35, '2023-11-13', 'WFA', 'Pembuatan karya inovasi penanganan longsor lereng STA 12+700 Proyek Jalan Tol IKN Segmen 3B', '8', '', 1, 1),
(1317, 29, 35, '2023-11-13', 'WFA', 'Pembuatan Karya Inovasi Secant Pile Proyek Sumbu Kebangsaan Timur', '5', '', 1, 1),
(1318, 29, 35, '2023-11-13', 'WFA', 'Pembuatan Karya Inovasi Penanganan Lereng Longsor Proyek Tol IKN 3B', '4', '', 1, 1),
(1319, 41, 20, '2023-11-13', 'WFO', 'membuat tabel RKP & LPS', '8', 'https://drive.google.com/open?id=1tZxpgOlUYABqBwZAtJltq5OcHgivuoR1', 1, 1),
(1320, 48, 27, '2023-11-13', 'WFA', 'Kordinasi update note dari review RKP oktober ke PIC Proyek Bendungan Pamukkulu', '2', '', 1, 1),
(1321, 39, 12, '2023-11-13', 'WFA', 'Membuat paparan Engineering Rakor Infra 2', '8', '', 1, 1),
(1322, 34, 2, '2023-11-13', 'WFO', 'Update Laporan Analisa Steel Pipe Bendungan Pamukkulu', '4', 'https://drive.google.com/open?id=128TPSZt2sZZuRy_V3FnKeQQE82c1qQly', 1, 1),
(1323, 44, 35, '2023-11-13', 'WFO', 'Rapat Koordinasi Online Tender Bakaru 2', '1', 'https://drive.google.com/open?id=1H-FPo2lYB02xliymI06QZto5GteArEUD', 1, 1),
(1324, 44, 7, '2023-11-13', 'WFO', 'Rapat Koordinasi KI KM Award 2023', '1', '', 1, 1),
(1325, 44, 35, '2023-11-13', 'WFO', 'Rapat Koordinasi Metode Kerja Tender Bakaru 2', '3', '', 1, 1),
(1326, 40, 35, '2023-11-13', 'WFA', 'Klaim Kijing - Analisa Data Cuaca', '8', 'https://drive.google.com/open?id=1cBBLm5688WyQLrJBvc2q6ZCyW9n4e9Ms', 1, 1),
(1327, 45, 35, '2023-11-13', 'WFO', 'membaca prosedur terbaru', '7', '', 1, 1),
(1328, 38, 20, '2023-11-13', 'WFO', 'membuat proses bisnis website', '8', '', 1, 1),
(1329, 37, 7, '2023-11-13', 'WFA', 'Kick of meeting KIKM award', '1.5', '', 1, 1),
(1330, 37, 11, '2023-11-13', 'WFA', 'Koordinasi strategis planning', '1.5', '', 1, 1),
(1331, 37, 17, '2023-11-13', 'WFA', 'Koordinasi digimon', '1', '', 1, 1),
(1332, 37, 7, '2023-11-13', 'WFA', 'Penilaian KIKM Award', '3.5', '', 1, 1),
(1333, 49, 35, '2023-11-13', 'WFO', 'Agenda tim taskforce QHSEE dept 4 Meyusun laporan', '7', '', 1, 1),
(1334, 42, 7, '2023-11-13', 'WFO', 'Kick Of Meeting penilai KI KM Award via zoom', '1', 'https://drive.google.com/open?id=1AM0zuo5nI20FgWPfW0SXT3T0f3B_jpYW', 1, 1),
(1335, 42, 35, '2023-11-13', 'WFO', 'Membuat laporan tim task force QHSE dept 3 minggu ke-2', '2', '', 1, 1),
(1336, 42, 27, '2023-11-13', 'WFO', 'Cek laporan validasi review RKP Penyiapan Lahan Industri PKT dan Land Clearing Keerom', '1', '', 1, 1),
(1337, 42, 24, '2023-11-13', 'WFO', 'Monitoring rencana program engineering sub sistem engineering dan 32', '1', '', 1, 1),
(1338, 32, 35, '2023-11-13', 'WFO', 'Perbantuan Proyek MUTIP 1', '8', '', 1, 1),
(1339, 43, 7, '2023-11-13', 'WFA', 'Kick of meeting ki/km awards dengan tem penilai', '1.5', '', 1, 1),
(1340, 43, 7, '2023-11-13', 'WFO', 'Mencari literasi & membaca beberapa ki/km sebagai referensi pada portal KM Wzone', '6', '', 1, 1),
(1341, 41, 20, '2023-11-14', 'WFO', 'melanjutkan tabel productivity', '8', '', 1, 1),
(1342, 29, 2, '2023-11-14', 'WFA', 'Meeting dengan konsultan Proyek tol IKN 3B', '2.5', 'https://drive.google.com/open?id=1pbBhaj6v6aW0YQfFNPl-wUthjjyxMPVp', 1, 1),
(1343, 40, 35, '2023-11-14', 'WFA', 'Klaim Kijing - Evaluasi Final Qty Pancang', '8', 'https://drive.google.com/open?id=1MxY_IiFGx0wtp_QOnx_TfOD5ddNzsJkz', 1, 1),
(1344, 48, 24, '2023-11-14', 'WFA', 'Membaca dan mempelajari 4 prosedur update wika', '8', 'https://drive.google.com/open?id=1xCueYS8UhKf_l2smdK6roFybSGOhDiCo', 1, 1),
(1345, 41, 20, '2023-11-14', 'WFO', 'melanjutkan develop tabel rkp&lps', '8', '', 1, 1),
(1346, 39, 12, '2023-11-14', 'WFO', 'Revisi paparan Rakor dan Notulen, Update monitoring BIM', '7', '', 1, 1),
(1347, 46, 28, '2023-11-14', 'WFA', 'colecting data LPS proyek infra 2', '2', '', 1, 1),
(1348, 46, 27, '2023-11-14', 'WFA', 'reviewing data RKP proyek banggai dan donggala', '2', '', 1, 1),
(1349, 46, 35, '2023-11-14', 'WFA', 'pengisian self assesment perilaku spesifik akhlak', '4', '', 1, 1),
(1350, 45, 35, '2023-11-14', 'WFO', 'membaca baca prosedur dan ki/km di portal wikazone', '7', '', 1, 1),
(1351, 38, 20, '2023-11-14', 'WFO', 'membuat proses bisnis website', '8', '', 1, 1),
(1352, 37, 7, '2023-11-14', 'WFA', 'Peenilaian KI/KM Award', '5', '', 1, 1),
(1353, 37, 21, '2023-11-14', 'WFA', 'Koordinasi dan monitoring digimon', '2', '', 1, 1),
(1354, 49, 35, '2023-11-14', 'WFO', 'Agenda tim taskforce QHSEE dept 4 Rakor dengan ketua tim', '7.5', '', 1, 1),
(1355, 42, 35, '2023-11-14', 'WFO', 'Site visit tim task force QHSE ke Proyek Tol IKN 3B', '8', 'https://drive.google.com/open?id=10PP-wD02cHwFBuDv_V6L0VSY6beuXEwS', 1, 1),
(1356, 32, 35, '2023-11-14', 'WFO', 'Perbantuan Proyek MUTIP 1', '8', '', 1, 1),
(1357, 43, 7, '2023-11-14', 'WFO', 'Menyusun makalah Karya Inovasi Kolaborasi dengan Proyek Benoa 25 %\n', '4', '', 1, 1),
(1358, 43, 35, '2023-11-14', 'WFO', 'Membaca literasi PMBOK 7th dari PMI', '3', '', 1, 1),
(1359, 39, 11, '2023-11-15', 'WFO', 'Persiapan Meet the Engineer bulan November', '7', '', 1, 1),
(1360, 41, 20, '2023-11-15', 'WFO', 'Update landingpage & melanJutkan develop tabel lisensi software', '8', '', 1, 1),
(1361, 46, 11, '2023-11-15', 'WFA', 'mempelajari last planner sistem', '8', '', 1, 1),
(1362, 48, 7, '2023-11-15', 'WFA', 'Kordinasi KiKm proyek Tol IKN', '2.5', '', 1, 1),
(1363, 48, 27, '2023-11-15', 'WFA', 'Kordinasi update Review RKP oktober untuk proyek tol IKN', '2', '', 1, 1),
(1364, 48, 28, '2023-11-15', 'WFA', 'Kordinasi antar PIC KIKM update LPS', '2.5', '', 1, 1),
(1365, 45, 35, '2023-11-15', 'WFO', 'membaca baca prosedur dan ki/km di portal wikazone', '7', '', 1, 1),
(1366, 38, 20, '2023-11-15', 'WFO', 'membuat proses bisnis website', '7.5', '', 1, 1),
(1367, 37, 7, '2023-11-15', 'WFA', 'Penilaian KIKM Award', '5', '', 1, 1),
(1368, 37, 11, '2023-11-15', 'WFA', 'Startegis planing', '2', '', 1, 1),
(1369, 49, 35, '2023-11-15', 'WFO', 'Agenda tim taskforce QHSEE dept 4 rakor dengan tim', '7', '', 1, 1),
(1370, 42, 35, '2023-11-15', 'WFO', 'Site visit tim task force QHSE ke Proyek Tol IKN 3B', '8', 'https://drive.google.com/open?id=1pF5h0YGuVlO25PPwWMKlaL7-96PoHAq3', 1, 1),
(1371, 32, 35, '2023-11-15', 'WFO', 'Perbantuan Proyek MUTIP 1', '8', 'https://drive.google.com/open?id=1pYWNAB1skLwfS6DaRnODQiyHz-zScs0V', 1, 1),
(1372, 43, 35, '2023-11-15', 'WFO', 'Menyusun revisi portofolio final PI5003 program PSPPI Insinyur ITB', '7', 'https://drive.google.com/open?id=1qn7bY8Ucenf9MM7_cFqbPyQEajrwAwjY', 1, 1),
(1373, 41, 20, '2023-11-16', 'WFO', 'Melanjutkan develop tabel lisensi software', '8', '', 1, 1),
(1374, 48, 32, '2023-11-16', 'WFA', 'Mengerjakan update Ahklak Wika bulan November', '6', '', 1, 1),
(1375, 48, 7, '2023-11-16', 'WFA', 'Mempelajari update KIKM Proyek Bendungan Pamukkulu', '2', '', 1, 1),
(1376, 46, 11, '2023-11-16', 'WFA', 'Colecting data monitoring item pekerjaan beresiko tinggi PROYEK INFRASTRUCTURE 2 DIVISION', '4', '', 1, 1),
(1377, 46, 11, '2023-11-16', 'WFA', 'mempelajari IK proses bisnis wika dan IK 32', '4', '', 1, 1),
(1378, 45, 35, '2023-11-16', 'WFO', 'membaca baca prosedur dan ki/km di portal wikazone', '7', '', 1, 1),
(1379, 38, 20, '2023-11-16', 'WFO', 'membuat proses bisnis website', '7', '', 1, 1),
(1380, 37, 7, '2023-11-16', 'WFA', 'Peniaian KI/KM award', '5', '', 1, 1),
(1381, 37, 20, '2023-11-16', 'WFA', 'Monitoring data dasboard', '2', '', 1, 1),
(1382, 49, 35, '2023-11-16', 'WFO', 'Agenda tim taskforce QHSEE dept 4', '7', '', 1, 1),
(1383, 42, 35, '2023-11-16', 'WFO', 'Site visit tim task force QHSE ke Proyek MWRD KPC di Sangata, Kutai Timur', '8', 'https://drive.google.com/open?id=1x3H4zohptYietyQxRrF2LaFtJ4bLEfTg', 1, 1),
(1384, 32, 35, '2023-11-16', 'WFO', 'Perbantuan Proyek MUTIP 1', '8', 'https://drive.google.com/open?id=1KzMacGfTUvYx-9YuSfCUut6lg8yHxBNi', 1, 1),
(1385, 43, 25, '2023-11-16', 'WFO', 'Colecting data & Perapihan share point monitoring item pekerjaan beresiko tinggi pada proyek Divisi Infrastruktur 2', '6', '', 1, 1),
(1386, 46, 27, '2023-11-20', 'WFO', 'colecting data RKP proyek banggai dan donggala', '3', '', 1, 1),
(1387, 46, 11, '2023-11-20', 'WFO', 'koordinasi perihal persiapan acara KI/KM award infra 2 2023', '2', '', 1, 1),
(1388, 48, 14, '2023-11-20', 'WFO', 'Mempelajari dan mengupdate Akhlak dari HCMS', '2', 'https://drive.google.com/open?id=1OaG4HNeOXdIbAn2Rf5FAmCjJ_UHuSDYX', 1, 1),
(1389, 48, 7, '2023-11-20', 'WFO', 'Mempelajari KIKM Metode Subtitusi Pengangkatan Cylinder Head Dengan Endoscope Untuk Pengecekan Kebocoran Air Pada Ruang Bakar Engine MAN #1 dan MAN #2', '2', 'https://drive.google.com/open?id=142GhatCXCWCsaFP-mccAtLFRp19Vl-8Z', 1, 1),
(1390, 46, 11, '2023-11-20', 'WFO', 'colecting data monitoring item pekerjaan beresiko tinggi proyek infra 2', '2', '', 1, 1),
(1391, 48, 32, '2023-11-20', 'WFO', 'MONITORING ITEM PEKERJAAN BERESIKO TINGGI PROYEK INFRASTRUCTURE 2 DIVISION', '2', 'https://drive.google.com/open?id=1kZuo9_w5m11yJHMpayyB7abHcP4ptME8', 1, 1),
(1392, 46, 7, '2023-11-20', 'WFO', 'monitoring KI/KM proyek donggala dan banggai', '1.5', '', 1, 1),
(1393, 48, 7, '2023-11-20', 'WFO', 'KORDINASI DENGAN PIC BENDUNGAN PAMUKKULU MENGENAI KI KM DARI PROYEK MEREKA', '2', '', 1, 1),
(1394, 29, 2, '2023-11-20', 'WFA', 'Paparan dengan P2JN Proyek Samba Hiran', '2.5', 'https://drive.google.com/open?id=1R_M7xJFvkO_JTClcopyujRW_CxzFir-y', 1, 1),
(1395, 34, 2, '2023-11-20', 'WFA', 'Meeting Evaluai Desain Jembatan Samba Hiran', '2', 'https://drive.google.com/open?id=1Yo8ST6OLHMITLPRIYNU_hYmGzHyNXfGG', 1, 1),
(1396, 38, 11, '2023-11-20', 'WFO', 'membuat form serta persiapan acara meet the engineer', '6', '', 1, 1),
(1397, 37, 11, '2023-11-20', 'WFO', 'Koordinasi strategis planning', '3.5', '', 1, 1),
(1398, 37, 12, '2023-11-20', 'WFO', 'Rakor divisi', '4', '', 1, 1),
(1399, 49, 35, '2023-11-20', 'WFO', 'Agenda tim taskforce proyek benoa bali', '8', 'https://drive.google.com/open?id=1EWToNP-EPYG8eaHgbtVzys4T1D0bzzsm', 1, 1),
(1400, 45, 35, '2023-11-20', 'WFA', 'pembuatan PPT presentasi utk ki/km kolaborasi dengan proyek MUTIP', '7', '', 1, 1),
(1401, 42, 35, '2023-11-20', 'WFA', 'Proses tender proyek Relokasi Jalan Masyarakat Terdampak Bendungan Bulango Ulu', '8', 'https://drive.google.com/open?id=1njioJwYN-WObC3m94RUh7fQFLj4zmKGa', 1, 1),
(1402, 32, 35, '2023-11-20', 'WFO', 'Perbantuan Proyek MUTIP 1', '8', 'https://drive.google.com/open?id=1rUXkjG8aPvX0FM-x7_8-4qVz5esR_h9e', 1, 1),
(1403, 41, 20, '2023-11-20', 'WFO', 'membuat analisis pengembangan sistem', '3', 'https://drive.google.com/open?id=1MORCNRAoSZrmZKjZ1zkn10etcrKKjZ0I', 1, 1),
(1404, 41, 20, '2023-11-20', 'WFO', 'Update Landing page carosuel', '5', 'https://drive.google.com/open?id=1xfZ6hdEGKQrCuP8Am5AfmH57ARqJqy7T', 1, 1),
(1405, 43, 7, '2023-11-20', 'WFA', 'Koordinasi perihal persiapan acara KI/KM award Divisi Infrastruktur 2', '2', '', 1, 1),
(1406, 43, 7, '2023-11-20', 'WFA', 'Menyusun makalah Karya Inovasi Kolaborasi dengan Proyek Benoa 35 %', '4.5', '', 1, 1),
(1407, 48, 14, '2023-11-21', 'WFO', 'UPDATE KOMPETEN 1 DI HCMS WIKA PERIODE KERJA SEPTEMBER 2023', '4', 'https://drive.google.com/open?id=1Nwx9FNmylE_lX_hzTXzjRK24AtV2jLrk', 1, 1),
(1408, 37, 13, '2023-11-21', 'WFO', 'Koordinasi dengan pak media', '3', '', 1, 1),
(1409, 37, 27, '2023-11-21', 'WFO', 'Pra RKP Proyek IPAL IKN', '2', '', 1, 1),
(1410, 48, 14, '2023-11-21', 'WFO', 'UPDATE KOMPETENSI 1 DI HCMS WIKA PERIODE OKTOBER & NOVEMBER 2023', '4', 'https://drive.google.com/open?id=11IxLhxtzQmkfzfntjDqV6fYh5VgxeGhf', 1, 1),
(1411, 37, 7, '2023-11-21', 'WFO', 'Penilaian KIKM award', '2.5', '', 1, 1),
(1412, 46, 14, '2023-11-21', 'WFO', 'pengisian akhlak di HCMS', '8', '', 1, 1),
(1413, 49, 35, '2023-11-21', 'WFO', 'agenda tim taskforce QHSE proyek manikin Kupang', '8', 'https://drive.google.com/open?id=1NV5nfJZ4kmdNUiymiOXCm9ku80v3-efo', 1, 1),
(1414, 41, 20, '2023-11-21', 'WFO', 'melanjutkan tabel CSI dan mengisi materi website', '8', '', 1, 1),
(1415, 45, 7, '2023-11-21', 'WFA', 'pembuatan PPT presentasi utk ki/km kolaborasi dengan proyek MUTIP', '7', '', 1, 1),
(1416, 42, 35, '2023-11-21', 'WFA', 'Proses tender proyek Relokasi Jalan Masyarakat Terdampak Bendungan Bulango Ulu', '8', '', 1, 1),
(1417, 32, 35, '2023-11-21', 'WFO', 'Perbantuan Proyek MUTIP 1 (Final Quantity and PHO)', '8', 'https://drive.google.com/open?id=1VU5a7TotW2gd8sAg5OGEr3LawRiH7T1H', 1, 1),
(1418, 38, 11, '2023-11-21', 'WFO', 'membuat dan mendesain rencana website', '7.5', '', 1, 1),
(1419, 43, 7, '2023-11-21', 'WFA', 'Menyusun makalah Karya Inovasi Kolaborasi dengan Proyek Benoa 40 %', '3.5', '', 1, 1),
(1420, 43, 35, '2023-11-21', 'WFA', 'Membaca literasi PMBOK 7th dari PMI & Buku Manajemen Proyek PP', '3.5', '', 1, 1),
(1421, 48, 29, '2023-11-22', 'WFO', 'ZOOM Meet The Engineers #3 Engineers dari Proyek D & B Pengerukan Pelabuhan Benoa Paket A', '3', 'https://drive.google.com/open?id=1Xeqs3AO5rccGNv-4p3Zdvaw44V4g2T8O', 1, 1),
(1422, 34, 29, '2023-11-22', 'WFA', 'Meet The Engineer #3', '4', 'https://drive.google.com/open?id=1JuHCRzXdKw29WdpabcQdaOKp8l5BxTTZ', 1, 1),
(1423, 48, 14, '2023-11-22', 'WFO', 'Kordinasi dan diskusi untuk update Akhlak dari HCMS (check and recheck)', '3', 'https://drive.google.com/open?id=1JFiaXMk6TyHowYHtkyWfnynyrm82DM7x', 1, 1),
(1424, 46, 29, '2023-11-22', 'WFO', 'meet engineering #3', '3', '', 1, 1),
(1425, 46, 24, '2023-11-22', 'WFO', 'mempelajari IK proses bisnis wika dan IK32', '2', '', 1, 1),
(1426, 46, 14, '2023-11-22', 'WFO', 'pengisian form akhlak di HCMS', '3', '', 1, 1),
(1427, 48, 7, '2023-11-22', 'WFO', 'Check and Recheck KIKM Proyek Bendungan Pamukkulu dan Proyek Toll IKN', '2', '', 1, 1),
(1428, 41, 20, '2023-11-22', 'WFO', 'mc meet the engineer #4', '4', 'https://drive.google.com/open?id=1hc2fFkfsovHnhHoh3xooDXrkhx0hQ9rO', 1, 1),
(1429, 41, 20, '2023-11-22', 'WFO', 'melanjutkan peninputann materi website', '4', '', 1, 1),
(1430, 37, 17, '2023-11-22', 'WFO', 'Konsolidasi dengan tim QSHEE', '2.5', '', 1, 1),
(1431, 37, 11, '2023-11-22', 'WFO', 'Meet the engineer #3', '4', '', 1, 1),
(1432, 37, 11, '2023-11-22', 'WFO', 'Koordinasi internal', '1.5', '', 1, 1),
(1433, 49, 35, '2023-11-22', 'WFO', 'agenda tim taskforce QHSE proyek manikin Kupang', '8', '', 1, 1),
(1434, 45, 7, '2023-11-22', 'WFA', 'pembuatan PPT presentasi utk ki/km kolaborasi dengan proyek MUTIP', '7', '', 1, 1),
(1435, 42, 35, '2023-11-22', 'WFA', 'Proses tender proyek Relokasi Jalan Masyarakat Terdampak Bendungan Bulango Ulu', '7', '', 1, 1),
(1436, 42, 11, '2023-11-22', 'WFA', 'Meet the Engineers #3 : Proyek D & B Pengerukan Pelabuhan Benoa Paket A dan Proyek Penyiapan Lahan Industri PKT Bontang', '3', 'https://drive.google.com/open?id=1lpS4G5t1LCj15w8nLntsjT4IIfqenbSK', 1, 1),
(1437, 32, 35, '2023-11-22', 'WFO', 'Perbantuan Proyek MUTIP 1 (Final Quantity and PHO)', '8', 'https://drive.google.com/open?id=1dgLv5bIPOyG6_Zyt_0oqCt8kOs2Cy2je', 1, 1),
(1438, 38, 11, '2023-11-22', 'WFO', 'membuat dan mendesain rencana website', '6.5', '', 1, 1),
(1439, 43, 35, '2023-11-22', 'WFA', 'Kuliah Umum Ke 4 - PSPPI ITB', '8', 'https://drive.google.com/open?id=1UoL8VdqmLJdHkrp77J_PMEPvVLfuA4n1', 1, 1),
(1440, 48, 32, '2023-11-23', 'WFO', 'Simulasi Kebakaran di lingkungan wika tower 2', '2', '', 1, 1),
(1441, 48, 7, '2023-11-23', 'WFO', 'PEMAHAMAN QUALITY CONTROL CIRCLE (QCC) DARI KM WZONE SEHUBUNGAN DENGAN PERTANYAAN DARI PIHAK PROYEK BENDUNGAN PAMUKKULU (PAK IHWAN)', '2', 'https://drive.google.com/open?id=1CiQy4f3U_pI_z11KoKvXfhCO7ea9b_je', 1, 1),
(1442, 48, 14, '2023-11-23', 'WFO', 'MENGERJAKAN HARMONIS 1 2 DAN 3 (PERIODE BULAN SEPTEMBER TO NOVEMBER) MELALU HCMS', '3', 'https://drive.google.com/open?id=12nSTCaMyoA_V1Fm61rS-nlzYeL37f62X', 1, 1),
(1443, 48, 11, '2023-11-23', 'WFO', 'MEMPELAJARI PERMASALAH QCC DARI PROYEK BENDUNGAN PAMUKKULU VIA JAPRI WHATSAPP (PAK ILHAM MUHAMMAD)', '1', 'https://drive.google.com/open?id=1v0LCC0i1IMdB69PeUJ6pVG5-xogPTKP_', 1, 1),
(1444, 46, 14, '2023-11-23', 'WFO', 'melanjutkan pengisian form self assesment perilaku akhlak 2023', '8', '', 1, 1),
(1445, 41, 20, '2023-11-23', 'WFO', 'membuat dashboard (grafik)', '8', '', 1, 1),
(1446, 49, 35, '2023-11-23', 'WFO', 'agenda tim taskforce QHSEE menyusun laporan', '8', '', 1, 1),
(1447, 42, 35, '2023-11-23', 'WFA', 'Proses tender proyek Relokasi Jalan Masyarakat Terdampak Bendungan Bulango Ulu', '8', 'https://drive.google.com/open?id=1M5aghc6BF5PsI6iJSeQrHnXmFWpf5f33', 1, 1),
(1448, 42, 35, '2023-11-23', 'WFA', 'Proses tender proyek Relokasi Jalan Masyarakat Terdampak Bendungan Bulango Ulu', '3', '', 1, 1),
(1449, 32, 35, '2023-11-23', 'WFO', 'Perbantuan Proyek MUTIP 1 (Final Quantity and PHO)', '8', '', 1, 1),
(1450, 38, 11, '2023-11-23', 'WFO', 'membuat dan mendesain rencana website', '7', '', 1, 1),
(1451, 43, 7, '2023-11-23', 'WFA', 'Menyusun makalah Karya Inovasi Kolaborasi dengan Proyek Benoa 45 %', '4', '', 1, 1),
(1452, 43, 32, '2023-11-23', 'WFA', 'Mengisi tambahan evidence self assesment penilaian AKHLAK 2023', '3', '', 1, 1),
(1453, 48, 29, '2023-11-24', 'WFO', 'QHSEE MORNING TALK', '1', 'https://drive.google.com/open?id=1ghiVu3r7Du_I3YlvUhWOQ1gHqMh3ubBU', 1, 1),
(1454, 48, 7, '2023-11-24', 'WFO', 'Kordinasi dan pengecekan PPT KIKM Proyek Bendungan Pamukkulu Untuk segera upload guna mengikuti lomba', '4', 'https://drive.google.com/open?id=1R3-vNNj1elVfmTGDhYrWOQ7n_u9sWwpO', 1, 1),
(1455, 48, 32, '2023-11-24', 'WFO', 'RAPAT KORDINASI DIV ENG INFRA 2 DI RUANG RAPAT LT 10 WIKA TOWER 2', '1.5', 'https://drive.google.com/open?id=1E5PXXxspSRIsE1hDPruQYWKxb7yyVVbW', 1, 1),
(1456, 48, 0, '2023-11-24', 'WFO', 'YOUTUBE Serba Canggih Proyek Sumbu Timur - Infrastructure 2 Division', '1.5', '', 1, 1),
(1457, 46, 11, '2023-11-24', 'WFO', 'qshe morning talk safe manual handling', '1', '', 1, 1),
(1458, 46, 11, '2023-11-24', 'WFO', 'rapat mingguan koordinasi internal sub divisi engineering infra 2', '2', '', 1, 1),
(1459, 46, 11, '2023-11-24', 'WFO', 'rapat koordinasi KI/KM award sub divisi engineering infra 2', '1.5', '', 1, 1),
(1460, 46, 28, '2023-11-24', 'WFO', 'monitoring dan colecting data LPS infra 2', '4', '', 1, 1),
(1461, 46, 28, '2023-11-24', 'WFO', 'monitoring dan colecting data LPS infra 2', '4', '', 1, 1),
(1462, 49, 29, '2023-11-24', 'WFO', 'Rakor tim engineering 3', '3', '', 1, 1),
(1463, 49, 29, '2023-11-24', 'WFO', 'Menyusun rencana KI KM award', '3', '', 1, 1),
(1464, 45, 35, '2023-11-24', 'WFA', 'QHSEE MORNING TALK', '1', '', 1, 1),
(1465, 45, 35, '2023-11-24', 'WFA', 'Rakor mingguan koordinasi internal sub divisi engineering infra 2', '2', '', 1, 1),
(1466, 45, 7, '2023-11-24', 'WFA', 'monitoring ki/km', '4', '', 1, 1),
(1467, 41, 20, '2023-11-24', 'WFO', 'memasukkan materi landing page', '8', '', 1, 1),
(1468, 42, 27, '2023-11-24', 'WFA', 'Rapat Koordinasi Internal Sub Divisi Engineering', '1.5', 'https://drive.google.com/open?id=1ksRyF_vPXuzm1cvrG2Pz_MEmSOFahnK7', 1, 1),
(1469, 42, 35, '2023-11-24', 'WFA', 'Koordinasi dengan BPKP Kalsel untuk proses eskalasi proyek Bypass Banjarmasin dan keperluan pemeliharaan proyek di Banjarmasin', '6.5', '', 1, 1),
(1470, 32, 35, '2023-11-24', 'WFO', 'Perbantuan Proyek MUTIP 1 (Final Quantity and PHO)', '8', 'https://drive.google.com/open?id=1cy3AuawR8A2hY6I7QL5kx87HrOQ6heIS', 1, 1),
(1471, 38, 11, '2023-11-24', 'WFO', 'membuat dan mendesain rencana website', '6.5', '', 1, 1),
(1472, 43, 11, '2023-11-24', 'WFA', 'Rapat Koordinasi periodik mingguan koordinasi internal sub divisi engineering infra 2', '1.5', '', 1, 1),
(1473, 43, 29, '2023-11-24', 'WFA', 'QSHE Morning Talk - Safe Manual Handling', '1', '', 1, 1),
(1474, 43, 35, '2023-11-24', 'WFA', 'Membaca literasi PMBOK 7th dari PMI & Buku Manajemen Proyek PP', '3.5', '', 1, 1),
(1475, 48, 7, '2023-11-27', 'WFA', 'Penerapan Four Eyes Principles Dalam Proses Seleksi Pemberi Kerja', '8', 'https://drive.google.com/open?id=1ahqgG81V-heVSwl1zioCljRLVltn-MhL', 1, 1),
(1476, 46, 28, '2023-11-27', 'WFA', 'Monitoring LPS', '4', '', 1, 1),
(1477, 46, 30, '2023-11-27', 'WFA', 'Konseling dan coaching', '2', '', 1, 1),
(1478, 46, 7, '2023-11-27', 'WFA', 'Zoom kolaborasi KI/KM proyek benoa', '2', '', 1, 1),
(1479, 41, 20, '2023-11-27', 'WFO', 'Melanjutkan pembuatan dashboard', '8', '', 1, 1),
(1480, 39, 11, '2023-11-27', 'WFO', 'Persiapan MTE Desember, KI KM Award, dan Rapat Koordinasi', '8', '', 1, 1),
(1481, 37, 21, '2023-11-27', 'WFA', 'Koordinasi digimon', '2', '', 1, 1),
(1482, 37, 7, '2023-11-27', 'WFA', 'Penilaian KIKM', '5.5', '', 1, 1),
(1483, 45, 7, '2023-11-27', 'WFO', 'pembuatan PPT presentasi utk ki/km kolaborasi dengan proyek MUTIP', '5', '', 1, 1),
(1484, 45, 7, '2023-11-27', 'WFO', 'Zoom kolaborasi KI/KM proyek benoa', '2', '', 1, 1);
INSERT INTO `engineering_activity` (`id_engineering_activity`, `id_user`, `id_kategori_pekerjaan`, `tanggal_masuk_kerja`, `status_kerja`, `judul_pekerjaan`, `durasi`, `evidence`, `checked`, `validasi`) VALUES
(1485, 42, 27, '2023-11-27', 'WFO', 'Zoom Validasi HPP & Upload RKP/RAB Review Divisi Infrastruktur 2', '1', 'https://drive.google.com/open?id=1IUGq9_R_BRfRYOCMLLdqvJd3iYGU763d', 1, 1),
(1486, 42, 24, '2023-11-27', 'WFO', 'Koordinasi Sub divisi Engineering program kerja s/d Des 2023', '1.5', '', 1, 1),
(1487, 42, 35, '2023-11-27', 'WFO', 'Koordinasi pembayaran hutang proyek Bypass Banjarmasin, membalas surat somasi vendor', '1.5', '', 1, 1),
(1488, 42, 7, '2023-11-27', 'WFO', 'KIKM Kolaborasi Proyek Benoa', '1', 'https://drive.google.com/open?id=11EOX0SRqnQiPzYaqK5vrTL57vwB29VWZ', 1, 1),
(1489, 42, 7, '2023-11-27', 'WFO', 'Penilaian KI KM Award', '2', '', 1, 1),
(1490, 32, 35, '2023-11-27', 'WFA', 'Perbantuan Proyek MUTIP 1', '8', 'https://drive.google.com/open?id=1RczEPxt8oDtJizmPhVhQtlzjLYM3HSOW', 1, 1),
(1491, 38, 11, '2023-11-27', 'WFO', 'membuat dan mendesain rencana website', '8', '', 1, 1),
(1492, 43, 7, '2023-11-27', 'WFO', 'Menyusun makalah Karya Inovasi Kolaborasi dengan Proyek Benoa 50 %', '5', '', 1, 1),
(1493, 43, 7, '2023-11-27', 'WFO', 'Zoom Kolaborasi KI/KM sebagai penulis & mempresentasikan dengan rekan2 Sub Engineering Divisi Infrastuktur 2', '2', '', 1, 1),
(1494, 49, 35, '2023-11-27', 'WFA', 'Membuat laporan tim taskforce qhsee', '7.5', '', 1, 1),
(1495, 41, 20, '2023-11-28', 'WFO', 'Revisi fitur KI/KM, TECHNICAL SUPPORT, dan RKP', '8', '', 1, 1),
(1496, 46, 28, '2023-11-28', 'WFA', 'monitoring data LPS', '4', '', 1, 1),
(1497, 46, 11, '2023-11-28', 'WFA', 'koordinasi acara KI/KM award infra 2', '2', '', 1, 1),
(1498, 46, 11, '2023-11-28', 'WFA', 'pengarahan perihal ST ke proyek pasigala', '2', '', 1, 1),
(1499, 39, 11, '2023-11-28', 'WFO', 'Persiapan MTE, Rakor persiapan KI KM Award, dan Koordinasi BIM IPAL', '8', '', 1, 1),
(1500, 48, 7, '2023-11-28', 'WFA', 'Kordinasi KIKM proyek bendungan pamukkulu', '4', '', 1, 1),
(1501, 48, 7, '2023-11-28', 'WFA', 'Kordinasi KIKM proyek Tol IKN', '4', '', 1, 1),
(1502, 37, 28, '2023-11-28', 'WFA', 'Pra LPS Labuan Bajo', '4.5', '', 1, 1),
(1503, 37, 7, '2023-11-28', 'WFA', 'Koordinasi persiapan KIKM Award', '1', '', 1, 1),
(1504, 37, 7, '2023-11-28', 'WFA', 'Penilaian KIKM award', '2', '', 1, 1),
(1505, 45, 35, '2023-11-28', 'WFO', 'koordinasi acara KI/KM award infra 2', '2', '', 1, 1),
(1506, 45, 35, '2023-11-28', 'WFO', 'pengisian form ahlak di HCMS', '2', '', 1, 1),
(1507, 45, 35, '2023-11-28', 'WFO', '\nmonitoring data ki/km', '4', '', 1, 1),
(1508, 42, 27, '2023-11-28', 'WFO', 'Zoom RAB review proyek Tol IKN 3B', '1.5', 'https://drive.google.com/open?id=1zkrt0dNPBMdN-PJniraVRjN9UcNwu5H5', 1, 1),
(1509, 42, 28, '2023-11-28', 'WFO', 'Undangan Pra LPS Proyek Jalan dan Jembatan Labuan Bajo - Sp. Nalis - Sp. Kenari - Tanamori', '1.5', 'https://drive.google.com/open?id=1wWjJ90aWuEL3X4YwW7jDFMDgG8w6pAgj', 1, 1),
(1510, 42, 7, '2023-11-28', 'WFO', 'Rapat Koordinasi Acara KI KM Award', '1', '', 1, 1),
(1511, 42, 7, '2023-11-28', 'WFO', 'Penilaian KI KM Award', '2', '', 1, 1),
(1512, 32, 35, '2023-11-28', 'WFA', 'Perbantuan Proyek MUTIP 1', '8', 'https://drive.google.com/open?id=1VzdC3VL0oV4gTMZlTW9nHdY-dCNqNipu', 1, 1),
(1513, 46, 35, '2023-11-28', 'WFA', 'tugas perbantuan proyek pasigala', '8', '', 1, 1),
(1514, 38, 11, '2023-11-28', 'WFO', 'membuat dan mendesain rencana website', '8', '', 1, 1),
(1515, 43, 7, '2023-11-28', 'WFO', 'Melakukan revisi 50 % Makalah Karya Inovasi dengan Proyek Benoa & Mencari referensi pada portal KM Wzone', '7', '', 1, 1),
(1516, 49, 35, '2023-11-28', 'WFA', 'Membuat laporan taskforce qhsee dept op 4', '7.5', '', 1, 1),
(1517, 48, 14, '2023-11-29', 'WFA', 'Mengerjakan form track reqord', '4', '', 1, 1),
(1518, 48, 14, '2023-11-29', 'WFA', 'Mengerjakan Ahlak di HCIS', '4', '', 1, 1),
(1519, 44, 35, '2023-11-29', 'WFO', 'Rapat MIngguan Tender Bakaru (KSO)', '1.5', 'https://drive.google.com/open?id=1vkmVEos1IIXDrRKrWxPVrPTEzEgwDlDg', 1, 1),
(1520, 44, 35, '2023-11-29', 'WFO', 'Update Proposal Klaim Proyek', '1.5', 'https://drive.google.com/open?id=1gKxszYPt3nIi7jOlDSMQ16KoeXU62cCl', 1, 1),
(1521, 44, 35, '2023-11-29', 'WFO', 'Membuat BOQ dan Estimasi RAB Bangunan Semi Permanen', '5', '', 1, 1),
(1522, 45, 35, '2023-11-29', 'WFO', 'Update data Ahlak di HCIS', '2', '', 1, 1),
(1523, 45, 35, '2023-11-29', 'WFO', 'pembuatan form track record pribadi untuk dikumpulkan', '3', '', 1, 1),
(1524, 45, 35, '2023-11-29', 'WFO', 'revisi ppt ki/km kolaborasi sebelum di update ke portal wika', '3', '', 1, 1),
(1525, 42, 27, '2023-11-29', 'WFO', 'Undangan Pra RKP Proyek Pembangunan Bendungan Jenelata Kab. Gowa, Sulawesi Selatan', '3', 'https://drive.google.com/open?id=1VnWeSwIJNp3gBgd0RU8nqtaPmX34UiHh', 1, 1),
(1526, 42, 35, '2023-11-29', 'WFO', 'Site visit tim task force QHSE ke Proyek Pembangunan Jalan dan Jembatan Tumbang Samba - Tumbang Hiran II', '5', 'https://drive.google.com/open?id=1zczblpsGlSG9Ai9d3gXFBa3UEq23Hj_A', 1, 1),
(1527, 39, 11, '2023-11-29', 'WFO', 'Persiapan MTE Desember dan List Proker', '7.5', '', 1, 1),
(1528, 32, 35, '2023-11-29', 'WFA', 'Perbantuan Proyek MUTIP 1', '8', '', 1, 1),
(1529, 46, 35, '2023-11-29', 'WFA', 'tugas perbantuan ke proyek pasigala', '8', '', 1, 1),
(1530, 38, 11, '2023-11-29', 'WFO', 'membuat dan mendesain rencana website', '7.5', '', 1, 1),
(1531, 41, 20, '2023-11-29', 'WFA', 'membuat chart producivity rate & kelengkapan data', '8', 'https://drive.google.com/open?id=19rKxH9oFIyEpe1JcSWkdXlzeQW70lZwj', 1, 1),
(1532, 43, 7, '2023-11-29', 'WFO', 'Menyusun makalah Karya Inovasi Kolaborasi dengan Proyek Benoa 60 %', '7.5', '', 1, 1),
(1533, 49, 35, '2023-11-29', 'WFA', 'Koordjnasi tim task force qhsee dept op 4', '7', '', 1, 1),
(1534, 45, 35, '2023-11-30', 'WFO', 'update form ahlak di HCMS', '2', '', 1, 1),
(1535, 45, 35, '2023-11-30', 'WFO', 'membaca ki/km dan prosedur di portal wizone', '5', '', 1, 1),
(1536, 41, 20, '2023-11-30', 'WFO', 'REVISI rkp dan lps', '8', 'https://drive.google.com/open?id=1qpMGRoTofFT00nJ3FKElmw3sCFQs93AR', 1, 1),
(1537, 42, 35, '2023-11-30', 'WFO', 'Site visit tim task force QHSE ke Proyek Pembangunan Jalan dan Jembatan Tumbang Samba - Tumbang Hiran II', '8', 'https://drive.google.com/open?id=15OZ_Ea-fY6Grx6DMbwu5nJzAAaYBpkxp', 1, 1),
(1538, 39, 17, '2023-11-30', 'WFO', 'Rapat Proker, Gambar 3D, dan Monitoring Lapbul', '7.5', '', 1, 1),
(1539, 32, 35, '2023-11-30', 'WFA', 'Perbantuan Proyek MUTIP 1', '8', '', 1, 1),
(1540, 46, 35, '2023-11-30', 'WFA', 'tugas perbantuan ke proyek pasigala', '8', '', 1, 1),
(1541, 38, 11, '2023-11-30', 'WFA', 'membuat dan mendesain rencana website', '6.5', '', 1, 1),
(1542, 43, 7, '2023-11-30', 'WFO', '\nMenyusun makalah Karya Inovasi Kolaborasi dengan Proyek Benoa 70 %', '8', '', 1, 1),
(1543, 49, 35, '2023-11-30', 'WFA', 'Agenda tim task force qhsee proyek bendungan ameroro', '8', '', 1, 1),
(2226, 39, 17, '2023-12-01', 'WFO', 'Monitoring Lapbul, BIM, dan revisi 3d', '7,5', '', 1, 1),
(2227, 32, 35, '2023-12-01', 'WFA', 'Perbantuan Proyek MUTIP 1', '8', 'https://drive.google.com/open?id=1CfR5aLEpCfNbRdGXGFcyPHBcfB6TZTZq', 1, 1),
(2228, 46, 35, '2023-12-01', 'WFA', 'tugas perbantuan ke proyek pasigala', '8', '', 1, 1),
(2229, 38, 11, '2023-12-01', 'WFO', 'membuat dan mendesain rencana website', '6,5', '', 1, 1),
(2230, 45, 35, '2023-12-01', 'WFO', 'update form ahlak di HCMS', '2', '', 1, 1),
(2231, 45, 35, '2023-12-01', 'WFO', 'Monitor dan input data penilaian KI/KM Awards infrastruktur 2', '5', '', 1, 1),
(2232, 41, 20, '2023-12-01', 'WFO', 'Memperbaiki Fitur Produktivity', '8', 'https://drive.google.com/open?id=1iRbRFJgwpQfYoKkpuWnf8VQkj4NX2Z6s', 1, 1),
(2233, 42, 28, '2023-12-01', 'WFO', 'Undangan Pra LPS Proyek Rekonstruksi Jalan Kalawara - Kulawi dan Sirenja', '2', 'https://drive.google.com/open?id=1V-sBw7TRAcznl7dRCsx2aqKeq5MszZyF', 1, 1),
(2234, 42, 35, '2023-12-01', 'WFO', 'Site visit tim task force QHSE ke Proyek Pembangunan Jalan dan Jembatan Tumbang Samba - Tumbang Hiran II', '5', 'https://drive.google.com/open?id=13ma6MXTfxqEOMb0qAiqJMYO-a-cGS0-l', 1, 1),
(2235, 42, 7, '2023-12-01', 'WFO', 'Penilaian KI KM Award 2023 divisi infra 2', '1', '', 1, 1),
(2236, 43, 7, '2023-12-01', 'WFO', 'Menyusun makalah Karya Inovasi Kolaborasi dengan Proyek Benoa 80 %', '7,5', '', 1, 1),
(2237, 49, 35, '2023-12-01', 'WFA', 'Agenda tim task force proyek bendungan ameroro', '8', '', 1, 1),
(2238, 49, 35, '2023-12-02', 'WFA', 'Agenda tim taskforce proyek bendungan ameroro', '8', '', 1, 1),
(2239, 46, 35, '2023-12-04', 'WFA', 'perbantuan penugasan ke proyek pasigala', '8', '', 1, 1),
(2240, 38, 11, '2023-12-04', 'WFO', 'membuat dan mendesain rencana website', '5', '', 1, 1),
(2241, 45, 7, '2023-12-04', 'WFO', 'Monitor dan input data penilaian KI/KM Awards infrastruktur 2', '7', '', 1, 1),
(2242, 32, 35, '2023-12-04', 'WFO', 'Perbantuan Proyek MUTIP 1', '8', '', 1, 1),
(2243, 41, 20, '2023-12-04', 'WFO', 'rapat koordinasi Sub divisi Engineering', '3,5', 'https://drive.google.com/open?id=1vpUrI1ybnSYyIqdKcsmSY5EKr7ayM303', 1, 1),
(2244, 41, 20, '2023-12-04', 'WFO', 'Melakukan Perubahan tampilan Landing Page', '4,5', 'https://drive.google.com/open?id=1cg3hGlVQAgPcAc66AFcEpR_JY-4II0iR', 1, 1),
(2245, 43, 35, '2023-12-04', 'WFA', 'ST Perbantuan Proyek Dermaga Donggala, Survey Lapangan Kondisi Proyek', '8', 'https://drive.google.com/open?id=1K8AD1x6LUdbDBlMQtlgtF60scD3cMz-4', 1, 1),
(2246, 42, 26, '2023-12-04', 'WFA', 'Koordinasi program sistem engineering, KI KM award divisi infra 2', '1,5', '', 1, 1),
(2247, 42, 7, '2023-12-04', 'WFA', 'Penilaian KI KM Award 2023 divisi infra 2', '2', '', 1, 1),
(2248, 42, 35, '2023-12-04', 'WFA', 'Koordinasi & menyusun paparan overview proyek Bypass Banjarmasin dan materi keuangan proyek', '2', '', 1, 1),
(2249, 42, 35, '2023-12-04', 'WFA', 'Koordinasi dengan Adkon tindak lanjut proses eskalasi proyek Bypass Banjarmasin', '2', '', 1, 1),
(2250, 49, 35, '2023-12-04', 'WFO', 'Rakor tim taskforce dept op 4 di lantai 11', '6', '', 1, 1),
(2251, 46, 35, '2023-12-05', 'WFA', 'penugasan perbantuan ke proyek pasigala', '8', '', 1, 1),
(2252, 38, 11, '2023-12-05', 'WFO', 'membuat dan mendesain rencana website', '6,5', '', 1, 1),
(2253, 45, 7, '2023-12-05', 'WFO', 'Monitor dan input data penilaian KI/KM Awards infrastruktur 2', '7', '', 1, 1),
(2254, 41, 20, '2023-12-05', 'WFO', 'Revisi Login, dan Landing Page', '8', 'https://drive.google.com/open?id=1lsJ1r4Rwdj5tX7g3_bsfB2U9AXn4rWQn', 1, 1),
(2255, 43, 35, '2023-12-05', 'WFA', 'ST Perbantuan Proyek Dermaga Donggala, Penyusunan Cut Off Schedule & Penyusunan Action Plan Penyelesaian Proyek', '8', 'https://drive.google.com/open?id=1lI_l2bl2zzxM07yaK6hUMu_8M8D0wzWa', 1, 1),
(2256, 42, 7, '2023-12-05', 'WFA', 'Penilaian KI KM Award 2023 divisi infra 2', '2', '', 1, 1),
(2257, 42, 35, '2023-12-05', 'WFA', 'Rapat koordinasi dept operasi 3 terkait proses eskalasi proyek Bypass Banjarmasin', '2,5', '', 1, 1),
(2258, 42, 28, '2023-12-05', 'WFA', 'Undangan LPS Proyek Rekonstruksi Jalan Kalawara - Kulawi dan Sirenja', '1,5', 'https://drive.google.com/open?id=1UYchCImMgPMpKKim1Eby5ZiQolTrNq_4', 1, 1),
(2259, 42, 35, '2023-12-05', 'WFA', 'Rapat dengan vendor Aneka Makmur (Proyek Bypass Banjarmasin)', '1', 'https://drive.google.com/open?id=1VWOogSj5ps-KYq5n8A3NTMngdecaJm5z', 1, 1),
(2260, 32, 35, '2023-12-05', 'WFA', 'Perbantuan Proyek MUTIP 1 (Final Quantity and PHO)', '8', '', 1, 1),
(2261, 49, 7, '2023-12-05', 'WFO', 'Monitoring dan input data ki km award juri awal', '7', '', 1, 1),
(2262, 46, 35, '2023-12-06', 'WFA', 'penugasan perbantuan ke proyek pasigala', '8', '', 1, 1),
(2263, 38, 11, '2023-12-06', 'WFO', 'Podcast Eps 4', '2', '', 1, 1),
(2264, 38, 11, '2023-12-06', 'WFO', 'membuat materi visual, youtube dan zoom acara Sosialisasi Penilaian Perilaku Spesifik AKHLAK.', '6', '', 1, 1),
(2265, 45, 35, '2023-12-06', 'WFO', 'Webinar FORKABIM, media zoom', '2', '', 1, 1),
(2266, 45, 7, '2023-12-06', 'WFO', 'Monitor dan input data penilaian KI/KM Awards infrastruktur 2', '5', '', 1, 1),
(2267, 41, 20, '2023-12-06', 'WFO', 'Podcast Dialog Infra', '5', '', 1, 1),
(2268, 41, 20, '2023-12-06', 'WFO', 'Koreksi sistem bersama mas nico dan mas ihsan', '3', 'https://drive.google.com/open?id=1-O9kLMm_gllnLIAucmp3F443dxlHAm2Y', 1, 1),
(2269, 43, 35, '2023-12-06', 'WFA', 'Menyusun revisi presentasi final PSPPI ITB untuk keperluan sidang akhir tanggal 7 Desember 2023 & Submit upload 100% Makalah karya inovasi dengan proyek Benoa', '8', '', 1, 1),
(2270, 42, 35, '2023-12-06', 'WFA', 'Koordinasi dengan ADKON divisi terkait indek solar industri untuk eskalasi proyek Bypass Banjarmasin', '1,5', '', 1, 1),
(2271, 42, 35, '2023-12-06', 'WFA', 'Undangan rapat finalisasi kegiatan tim task force QHSE DOP 1 di lantai 15', '3', 'https://drive.google.com/open?id=1i8QH6mgE5i9wk6HfSlvpeHKepaw6qans', 1, 1),
(2272, 42, 7, '2023-12-06', 'WFA', 'Penilaian KI KM Award 2023 divisi infra 2', '2,5', '', 1, 1),
(2273, 32, 35, '2023-12-06', 'WFO', 'Perbantuan Proyek MUTIP 1', '8', '', 1, 1),
(2274, 49, 29, '2023-12-06', 'WFO', 'Zoominar forkabim lewat media zoom', '2', '', 1, 1),
(2275, 49, 7, '2023-12-06', 'WFO', 'Monitoring dan input data ki km award', '5', '', 1, 1),
(2276, 38, 11, '2023-12-07', 'WFO', 'membuat desain KI/KM Award', '6', '', 1, 1),
(2277, 38, 11, '2023-12-07', 'WFO', 'membuat dan mendesain rencana website', '3', '', 1, 1),
(2278, 45, 7, '2023-12-07', 'WFO', 'Monitor dan input data penilaian KI/KM Awards infrastruktur 2', '7', '', 1, 1),
(2279, 46, 35, '2023-12-07', 'WFA', 'tugas perbantuan ke proyek pasigala', '8', '', 1, 1),
(2280, 41, 20, '2023-12-07', 'WFO', 'Memperbaiki revisi kemarin', '8', 'https://drive.google.com/open?id=1Q4pk7bQq1HTgcagxQNMAMzMNzr_qxqX-', 1, 1),
(2281, 43, 35, '2023-12-07', 'WFA', 'Sidang akhir PSPPI di ITB', '8', 'https://drive.google.com/open?id=1wqh40YQMwYdRfHyXBCTmZQsFWCUGehl3', 1, 1),
(2282, 42, 35, '2023-12-07', 'WFA', 'Koordinasi dengan PPK proyek Bypass Banjarmasin terkait tindak lanjut perbaikan dalam masa pemeliharaan', '3', '', 1, 1),
(2283, 42, 7, '2023-12-07', 'WFA', 'Penilaian KI KM Award 2023 divisi infra 2', '2', '', 1, 1),
(2284, 42, 35, '2023-12-07', 'WFA', 'Koordinasi dengan Tim audit BPKP Kalimantan Selatan terkait proses eskalasi proyek Bypass Banjarmasin', '3', '', 1, 1),
(2285, 32, 35, '2023-12-07', 'WFO', 'Perbantuan Proyek Mutip 1', '8', '', 1, 1),
(2286, 49, 7, '2023-12-07', 'WFO', 'Monitoring dan persiapan pelaksanaan ki km award', '7', '', 1, 1),
(2287, 45, 35, '2023-12-08', 'WFO', 'Sosialisasi pengisisan form AKHLAK di HCMS', '2', '', 1, 1),
(2288, 45, 35, '2023-12-08', 'WFO', 'zoom pleno hasil rekapitulasi nilai untuk KI/KM awards', '1', '', 1, 1),
(2289, 45, 7, '2023-12-08', 'WFO', 'input data penilaian ki/km awards', '4', '', 1, 1),
(2290, 46, 35, '2023-12-08', 'WFA', 'tugas perbantuan ke proyek pasigala', '8', '', 1, 1),
(2291, 41, 20, '2023-12-08', 'WFO', 'Membuat materi Video tutorial penggunaan website', '4', 'https://drive.google.com/open?id=1aVxMkskj280GFZHcjRDFZbiA-59DAwkV', 1, 1),
(2292, 41, 20, '2023-12-08', 'WFO', 'mc pengisian akhlak 2023', '3', 'https://drive.google.com/open?id=10mEi3xKq-_01tXil5ka5TF2tR_M2q7Ow', 1, 1),
(2293, 43, 35, '2023-12-08', 'WFA', 'Menyusun revisi, dan submit berkas kelengkapan akhir kebutuhan yudisium PSPPI ITB di Bandung', '8', '', 1, 1),
(2294, 42, 35, '2023-12-08', 'WFA', 'Koordinasi dengan Kasie Preservasi Jalan BPJN Kalimantan Selatan di kantor BPJN Kalsel terkait pemeliharaan proyek Bypass Banjarmasin', '4', '', 1, 1),
(2295, 42, 7, '2023-12-08', 'WFA', 'Penilaian KI KM Award 2023 divisi infra 2', '2', '', 1, 1),
(2296, 42, 7, '2023-12-08', 'WFA', 'Rapat Koordinasi Penilaian KI KM Award 2023', '1', '', 1, 1),
(2297, 32, 35, '2023-12-08', 'WFO', 'Perbantuan Proyek Mutip 1', '8', 'https://drive.google.com/open?id=1NWAfmg8MQhJj6G-ASxMqGYve9GYM8eep', 1, 1),
(2298, 49, 29, '2023-12-08', 'WFO', 'Sosialisasi pengisian akhlak di hcms', '2', '', 1, 1),
(2299, 49, 7, '2023-12-08', 'WFO', 'Rekapitulasi penilaian ki km award', '4', '', 1, 1),
(2300, 49, 7, '2023-12-08', 'WFO', 'Rapat penrntuan 3 besar ki km award', '1', '', 1, 1),
(2301, 39, 11, '2023-12-11', 'WFO', 'Persiapan MTE, dan KI KM Award, Pengisian Akhlak Divisi', '8', '', 1, 1),
(2302, 41, 20, '2023-12-11', 'WFO', 'Revisi Dashboard', '8', 'https://drive.google.com/open?id=1MVFi_z2pYPLihk7TjExSphyXlbCSbV-A', 1, 1),
(2303, 41, 20, '2023-12-11', 'WFO', 'REVISI DASHBOARD', '8', 'https://drive.google.com/open?id=15RLLp8gRRiS_5d8wqFV0e-QKIABe2d_f', 1, 1),
(2304, 46, 35, '2023-12-11', 'WFA', 'tugas perbantuan ke proyek pasigala', '8', '', 1, 1),
(2305, 43, 35, '2023-12-11', 'WFA', 'ST Perbantuan Proyek Dermaga Donggala, Penyusunan Action Plan & sistem monitoring evaluasi harian penyelesaian Proyek', '8', 'https://drive.google.com/open?id=1M6snQdXh-jSl8C5L6GV-4qpGPVbGZ7pA', 1, 1),
(2306, 42, 35, '2023-12-11', 'WFO', 'Membuat monitoring pekerjaan pemeliharaan proyek bypass Banjarmasin', '2', '', 1, 1),
(2307, 42, 35, '2023-12-11', 'WFO', 'Membuat laporan tim tasforce QHSE dept operasi 3', '2,5', '', 1, 1),
(2308, 42, 32, '2023-12-11', 'WFO', 'Menyusun ulang program kerja sistem engineering & 32', '2', '', 1, 1),
(2309, 32, 35, '2023-12-11', 'WFO', 'Perbantuan Proyek Mutip 1', '8', 'https://drive.google.com/open?id=1RCE_iUpd4pmWBFFX30M50TuCbVOjZWes', 1, 1),
(2310, 49, 35, '2023-12-11', 'WFA', 'Membuat laporan tim taskforce qhsee dept op 4', '7', '', 1, 1),
(2311, 45, 35, '2023-12-11', 'WFA', 'input data penilaian untuk KI/KM Awards infra2', '7', '', 1, 1),
(2312, 41, 20, '2023-12-12', 'WFO', 'Membuat Form feedback dan mencoba untuk share link sistem dengan NGROK', '8', 'https://drive.google.com/open?id=14cTJiTwQ9rHZ5bv9AkRB2ByIFr3xsRPB', 1, 1),
(2313, 46, 35, '2023-12-12', 'WFA', 'tugas perbantuan ke proyek pasigala', '8', '', 1, 1),
(2314, 43, 35, '2023-12-12', 'WFA', 'ST Perbantuan Proyek Dermaga Donggala, Pendampingan DGM Operasi 4 & Paparan serta diskusi revisi action plan penyelesaian proyek & monitoring sumber daya', '8', 'https://drive.google.com/open?id=1wyd2cv4BYvHx42oNFUVxkSJkk-Sa5qS4', 1, 1),
(2315, 42, 25, '2023-12-12', 'WFO', 'Koordinasi personel dan program kerja sub sistem engineering', '2', '', 1, 1),
(2316, 42, 35, '2023-12-12', 'WFO', 'Koordinasi dengan keuangan terkait pembayaran hutang vendor proyek Bypass Banjarmasin', '1', '', 1, 1),
(2317, 42, 35, '2023-12-12', 'WFO', 'Rapat dengan vendor PT Karya Aspal Mandiri tindak lanjut penyelesaian hutang', '1,5', 'https://drive.google.com/open?id=1PLFcGXACMSVOW8FrOJY1tQlt-TyvadIl', 1, 1),
(2318, 42, 35, '2023-12-12', 'WFO', 'Melengkapi laporan tim taskforce QHSE dept operasi 3', '1', '', 1, 1),
(2319, 42, 7, '2023-12-12', 'WFO', 'Koordinasi persiapan puncak acara KI KM award divisi infra 2', '1', '', 1, 1),
(2320, 32, 35, '2023-12-12', 'WFO', 'Perbantuan Proyek Mutip-1', '8', '', 1, 1),
(2321, 49, 7, '2023-12-12', 'WFA', 'Koordinasi persiapan puncak acara ki km award', '4', '', 1, 1),
(2322, 45, 35, '2023-12-12', 'WFA', 'pengumpulan materi presentasi dari proyek\nuntuk acara ki/km awards', '7', '', 1, 1),
(2323, 41, 20, '2023-12-13', 'WFO', 'Proses Hosting Aplikasi WIDER', '8', 'https://drive.google.com/open?id=1FVLmea-jnU3g258RE4y40VWLes451Gu1', 1, 1),
(2324, 46, 35, '2023-12-13', 'WFA', 'tugas perbantuan ke proyek pasigala', '8', '', 1, 1),
(2325, 42, 11, '2023-12-13', 'WFO', 'Meet The Engineer 4 Infra 2 : Proyek Gumbasa & Bendungan Pamukkulu', '3', 'https://drive.google.com/open?id=1SORbI1LqElyg9V8TTNCMNgHFC2gQTIFv', 1, 1),
(2326, 42, 7, '2023-12-13', 'WFO', 'Rapat koordinasi panitia KI KM Award via zoom', '1', 'https://drive.google.com/open?id=14BdGQXd5PHgpFLcpC-pbLedZGMF36ySq', 1, 1),
(2327, 42, 35, '2023-12-13', 'WFO', 'Membuat paparan rapat persiapan presentasi dengan Divisi Keuangan', '1,5', '', 1, 1),
(2328, 32, 35, '2023-12-13', 'WFO', 'Perbantuan Proyek MUTIP 1', '8', '', 1, 1),
(2329, 49, 35, '2023-12-13', 'WFA', 'Menyusun laporan task force QHSEE', '3', '', 1, 1),
(2330, 45, 35, '2023-12-13', 'WFA', 'Zoom Meet The Engineer #4, pemaparan dari proyek Gumbasa dan bendungan Pamukkulu', '3', '', 1, 1),
(2331, 45, 35, '2023-12-13', 'WFA', 'input dan collect data penilaian untuk KI/KM Awards infra2', '4', '', 1, 1),
(2332, 41, 20, '2023-12-14', 'WFO', 'proses hosting', '3', 'https://drive.google.com/open?id=1zCQ8icPGYp_EhU_b3HByrDPAJrd4OEBr', 1, 1),
(2333, 41, 20, '2023-12-14', 'WFO', 'Membuat Script Poster Aplikasi WIDER dan Script Video Soft launching WIDER', '5', 'https://drive.google.com/open?id=1hgZA5g8rDKYyjm6M84W1396rJgxZkYOC', 1, 1),
(2334, 46, 35, '2023-12-14', 'WFA', 'tugas perbantuan ke proyek pasigala', '8', '', 1, 1),
(2335, 32, 35, '2023-12-14', 'WFA', 'Perbantuan Proyek Mutip 1', '8', '', 1, 1),
(2336, 42, 35, '2023-12-14', 'WFO', 'Rapat dengan divisi keuangan di ruang meeting lt 10 (pembahasan proyek Bypass Banjarmasin)', '2', 'https://drive.google.com/open?id=12uck92_HOeY7vS1ELQnsLZ1uYSMa7hyA', 1, 1),
(2337, 42, 7, '2023-12-14', 'WFO', 'Pengujian Karya Inovasi Review Desain Tebal Kedalaman Granular yang Dibongkar pada Proyek Provision of Maintenance Completion on Muara Wahau Road Diversion', '1', 'https://drive.google.com/open?id=1gYfEoxAXoaJa8zZTwwmetUIktS1aZ3be', 1, 1),
(2338, 42, 7, '2023-12-14', 'WFO', 'Pengujian Karya Inovasi M-Sand (Manufactured Sand) Sebagai Pengganti Material Pasir Alam Pada Beton Fc? 30 MPa', '1', 'https://drive.google.com/open?id=1Z7wnz0YzoTtpN_WRet4FRP93N1zj1N27', 1, 1),
(2339, 49, 7, '2023-12-14', 'WFA', 'Persiapan ki km award', '4,5', '', 1, 1),
(2340, 45, 35, '2023-12-14', 'WFA', 'zoom persiapan untuk ki/km awards', '2', '', 1, 1),
(2341, 45, 35, '2023-12-14', 'WFA', 'sayembara change agent', '3', '', 1, 1),
(2342, 45, 35, '2023-12-14', 'WFA', 'input dan collect data penilaian untuk KI/KM Awards infra2', '4', '', 1, 1),
(2343, 41, 20, '2023-12-15', 'WFO', 'MC Sosialiasi Pengisian Penilaian AKHLAK2023', '4', 'https://drive.google.com/open?id=1GNuF-05H9ReKOV8khqjvL_aex9jSzBGw', 1, 1),
(2344, 41, 20, '2023-12-15', 'WFO', 'Membuat Infranews', '8', 'https://drive.google.com/open?id=16xHQcN-CsA5sr7gBtaqjMr7YaCqTWh3u', 1, 1),
(2345, 46, 35, '2023-12-15', 'WFA', 'tugas perbantuan ke proyek pasigala', '8', '', 1, 1),
(2346, 32, 35, '2023-12-15', 'WFO', 'Perbantuan Proyek MUTIP 1', '8', '', 1, 1),
(2347, 42, 35, '2023-12-15', 'WFO', 'QHSEE Morning Talk Online Tema: AYO LAKUKAN BUDAYA KERJA SEHAT & SELAMAT LINGKUNGAN KERJA', '1', 'https://drive.google.com/open?id=1YYX74VoIZDnyzSOd2nJw5_ttS_asH5hz', 1, 1),
(2348, 42, 24, '2023-12-15', 'WFO', 'Konsolidasi dengan Engineering divisi QHSEE', '2', '', 1, 1),
(2349, 42, 24, '2023-12-15', 'WFO', 'Membaca prosedur manajemen proyek rev 1', '2', '', 1, 1),
(2350, 49, 29, '2023-12-15', 'WFA', 'Qhse morning talk', '1,5', '', 1, 1),
(2351, 49, 7, '2023-12-15', 'WFA', 'Persiapan ki km award', '5,5', '', 1, 1),
(2352, 45, 35, '2023-12-15', 'WFA', 'QSHE Morning Talk Online', '1', '', 1, 1),
(2353, 45, 35, '2023-12-15', 'WFA', 'input dan collect data penilaian untuk KI/KM Awards infra2', '6', '', 1, 1),
(2354, 29, 2, '2023-12-18', 'WFO', 'Meeting dengan tim proyek MUTIP 1', '2', 'https://drive.google.com/open?id=1rHZPAU1Zvs3vj4XRYp8HkTafsBRdZS3T', 1, 1),
(2355, 29, 2, '2023-12-18', 'WFO', 'Meeting dengan tim proyek pasigala', '2', 'https://drive.google.com/open?id=1xBo3GnvcYKByKNYnM0fVZKxZPnO5P6pL', 1, 1),
(2356, 32, 35, '2023-12-18', 'WFA', 'Perbantuan Proyek MUTIP 1', '8', 'https://drive.google.com/open?id=1QQgGavFgybZgZcz-L-a1mXbSgPGZlvpp', 1, 1),
(2357, 46, 35, '2023-12-18', 'WFA', 'tugas perbantuan ke proyek pasigala', '8', '', 1, 1),
(2358, 49, 7, '2023-12-18', 'WFO', 'Koordinasi dengan team lt 17.persiapan ki km award', '2,5', '', 1, 1),
(2359, 49, 7, '2023-12-18', 'WFO', 'Persiapan ki km award', '4', '', 1, 1),
(2360, 41, 20, '2023-12-18', 'WFO', 'membuat infra news di web', '2', 'https://drive.google.com/open?id=10iT0Zd9uXDLDE_aKafULYiNXM8Lm9nwy', 1, 1),
(2361, 41, 20, '2023-12-18', 'WFO', 'membuat infranews ke website', '2', 'https://drive.google.com/open?id=13FUz8vNfg9xD7N4XP-G9qHHN627rjBoo', 1, 1),
(2362, 41, 20, '2023-12-18', 'WFO', 'membuat modal, pop up latestnews', '6', 'https://drive.google.com/open?id=1GRSIEIMK_FeTlsS2LddZ41QY6Xz8BW_0', 1, 1),
(2363, 45, 35, '2023-12-18', 'WFO', 'Persiapan kelengkapan Acara KI/KM Awards infra2', '7', '', 1, 1),
(2364, 42, 29, '2023-12-18', 'WFA', 'Mengikuti Webinar Artificial Intelligence dalam Dunia Konstruksi', '2', 'https://drive.google.com/open?id=1HjifnuCafSAuU3Q0uEB5_V9jpEnDN_kY', 1, 1),
(2365, 42, 27, '2023-12-18', 'WFA', 'Koordinasi engineering dengan proyek IPAL IKN', '2', '', 1, 1),
(2366, 42, 7, '2023-12-18', 'WFA', 'Koordinasi persiapan puncak acara KI KM award divisi infra 2', '1,5', '', 1, 1),
(2367, 42, 35, '2023-12-18', 'WFA', 'Koordinasi dengan BPKP Kalsel persiapan sebelum QA BPKP Pusat', '2', 'https://drive.google.com/open?id=1J07hAvM72XehWznkW7EHsU6p19GkQlgc', 1, 1),
(2368, 46, 35, '2023-12-19', 'WFA', 'tugas perbantuan ke proyek pasigala', '8', '', 1, 1),
(2369, 49, 7, '2023-12-19', 'WFO', 'Persiapan ki km award', '7', '', 1, 1),
(2370, 41, 20, '2023-12-19', 'WFO', 'persiapan kikm award', '4', '', 1, 1),
(2371, 41, 20, '2023-12-19', 'WFO', 'membuat detail / read more activities', '4', 'https://drive.google.com/open?id=1zhfkAZETUn5JqF93eohwxwUz8Ip3EPJq', 1, 1),
(2372, 45, 35, '2023-12-19', 'WFO', 'Persiapan kelengkapan Acara KI/KM Awards infra2', '4', '', 1, 1),
(2373, 45, 35, '2023-12-19', 'WFO', 'Gladi resik untuk acara KI/KM Awards', '4', '', 1, 1),
(2374, 42, 35, '2023-12-19', 'WFA', 'Expert Talks 2023 dengan Narasumber Bapak Prof.Rhenald Kasali Ph.D, ESG: Embracing The Future Business Environment', '3', 'https://drive.google.com/open?id=1HSfsp8vUwDATb1XWYtIR_Or-Pmj2EwzX', 1, 1),
(2375, 42, 35, '2023-12-19', 'WFA', 'Membuat surat pengajuan pinjaman dana untuk pemeliharaan proyek Bypass Banjarmasin', '1', '', 1, 1),
(2376, 42, 7, '2023-12-19', 'WFA', 'Gladi resik persiapan acara puncak KI KM Award divisi infrastruktur 2', '3', '', 1, 1),
(2377, 46, 35, '2023-12-20', 'WFA', 'tugas perbantuan ke proyek pasigala', '8', '', 1, 1),
(2378, 41, 20, '2023-12-20', 'WFO', 'kikm award 2023', '7', 'https://drive.google.com/open?id=1HILBCiL7HDXxRyblDLrzFFwKNeHRVZHe', 1, 1),
(2379, 45, 35, '2023-12-20', 'WFO', 'KI/KM Awards', '8', '', 1, 1),
(2380, 42, 35, '2023-12-20', 'WFA', 'Mengikuti pelatihan manajemen kontrak Batch 23 hari ke-1', '5', 'https://drive.google.com/open?id=1mNim1ob9WD5ExrhMhL03fi_7U3_CtXZ-', 1, 1),
(2381, 42, 7, '2023-12-20', 'WFA', 'Mengikuti puncak acara KI KM Awards Infrastruktur 2 di lt 17 WIKA Tower', '5', 'https://drive.google.com/open?id=13grFiW5SnVOqMmNq8Df1ddM688HuqdYz', 1, 1),
(2382, 41, 20, '2023-12-21', 'WFO', 'memasukan data monthly report november ke website', '6', 'https://drive.google.com/open?id=1bO62J5YjcFa8E0a5rtRdNytG5n9Xn9WC', 1, 1),
(2383, 29, 35, '0000-00-00', 'WFO', 'Sosialisasi HC terkait Program Pengharkatan Non Tunai', '1,5', 'https://drive.google.com/open?id=1AFaz7eHrQedUE0sJxCidN7LlhQPdgBdr', 1, 1),
(2384, 41, 20, '2023-12-21', 'WFO', 'membuat Infranews_Pemenang KIKM 2023 di website', '2', 'https://drive.google.com/open?id=1GpXe5ZZExc0eBwAm13un8VL3R-zAW9L1', 1, 1),
(2385, 45, 35, '2023-12-21', 'WFO', 'peltihan KONTRAK MANAJEMEN BATCH 23', '8', '', 1, 1),
(2386, 42, 35, '2023-12-21', 'WFA', 'Mengikuti pelatihan manajemen kontrak Batch 23 hari ke-2', '7,5', 'https://drive.google.com/open?id=1Mrs60QqWDA0aY1aHm20DhOhtC6d9aJg7', 1, 1),
(2387, 42, 35, '2023-12-21', 'WFA', 'Mengikuti Sosialisasi Pengharkatan Non Tunai UPS2023', '1,5', 'https://drive.google.com/open?id=1w2jwIuxNPCiVdp1MydN-Lg5qL01ecOpb', 1, 1),
(2388, 46, 35, '2023-12-21', 'WFA', 'tugas perbantuan ke proyek pasigala', '8', '', 1, 1),
(2389, 45, 35, '2023-12-22', 'WFO', 'peltihan KONTRAK MANAJEMEN BATCH 23', '8', '', 1, 1),
(2390, 42, 35, '2023-12-22', 'WFA', 'Mengurus FHO proyek Bypass Banjarmasin di Kalsel', '8', 'https://drive.google.com/open?id=120xTkU70LC2_9dhLeza27nl7PSjoVHoE', 1, 1),
(2391, 41, 20, '2023-12-22', 'WFO', 'mengikuti seminar \'start from your belief\' - Mothers day', '4', 'https://drive.google.com/open?id=1KCZLgYXLosn9gEuoC1yeeE9IhXwcPxXL', 1, 1),
(2392, 41, 20, '2023-12-22', 'WFO', 'melanjutkan buat pop up berita website', '4', '', 1, 1),
(2393, 46, 35, '2023-12-22', 'WFA', 'tugas perbantuan ke proyek pasigala', '8', '', 1, 1),
(2394, 46, 35, '2023-12-26', 'WFA', 'tugas perbantuan ke proyek pasigala', '8', '', 1, 1),
(2395, 46, 35, '2023-12-27', 'WFA', 'tugas perbantuan ke proyek pasigala', '8', '', 1, 1),
(2396, 29, 35, '2023-12-28', 'WFA', 'Rapat Koordinasi Engineering Infra 2', '2', 'https://drive.google.com/open?id=1c5Nxda4BwxV-h_jsMwxbbc7omcWvYXUF', 1, 1),
(2397, 46, 35, '2023-12-28', 'WFA', 'tugas perbantuan ke proyek pasigala', '8', '', 1, 1),
(2398, 41, 20, '2023-12-27', 'WFO', 'Membuat draft bab1&bab2 karya inovasi', '8', 'https://drive.google.com/open?id=1Pjjt-0y6hABw5Sbim4Rs9Wt78gy8spmd', 1, 1),
(2399, 41, 35, '2023-12-29', 'WFO', 'acara infra2', '4', '', 1, 1),
(2400, 41, 20, '2023-12-29', 'WFO', 'input data activity engineering oktober', '4', 'https://drive.google.com/open?id=1xcxa_O7Hxq0dAqfuVizV7w1DQ8f3FQU0', 1, 1),
(2401, 41, 20, '2023-12-29', 'WFO', 'input data activity engineering oktober', '4', 'https://drive.google.com/open?id=1LeKnz1ZaDOUBMYv0FxvmaoJZ9b4WSMdA', 1, 1),
(2402, 41, 20, '2023-12-28', 'WFO', 'Menginputkan data Engineering Activity oktober', '8', '', 1, 1),
(2403, 41, 20, '2023-12-29', 'WFO', 'Menginputkan data Engineering Activity november', '4', '', 1, 1),
(2622, 53, 2, '2024-04-11', 'WFA', 'Judul', '3.5', '04112024004518 53.png', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `gambar` text DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0,
  `id_user` int(11) DEFAULT NULL,
  `tanggal_input` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `gambar`, `is_active`, `id_user`, `tanggal_input`) VALUES
(2, '12032023070738.jpg', 1, 1, '2023-12-03 00:07:38'),
(3, '12032023070747.jpg', 1, 1, '2023-12-03 00:07:47'),
(4, '12032023070757.jpg', 1, 1, '2023-12-03 00:07:57'),
(5, '12252023143445.jpg', 1, 1, '2023-12-03 00:08:08'),
(6, '12032023233525.jpg', 1, 1, '2023-12-03 16:35:25');

-- --------------------------------------------------------

--
-- Table structure for table `infra_news`
--

CREATE TABLE `infra_news` (
  `id_infra_news` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `news` text DEFAULT NULL,
  `is_active` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `infra_news`
--

INSERT INTO `infra_news` (`id_infra_news`, `judul`, `gambar`, `tanggal`, `id_user`, `news`, `is_active`) VALUES
(27, '\"Sharing Knowledge Implementasi BIM\" - Mengulas Software Autodesk AEC untuk Masa Depan Konstruksi Lebih Cerdas!', '12252023144213 Sharing Knowledge Implementasi BIM.jpg', '2023-04-12', 1, '<p><strong>&quot;<em>Sharing Knowledge </em>Implementasi BIM&quot; - Mengulas <em>Software Autodesk AEC</em> untuk Masa Depan Konstruksi Lebih Cerdas!</strong></p>\r\n\r\n<hr />\r\n<p>Pada tanggal 12 April 2023, sebuah puncak pengetahuan terjadi dalam acara &quot;<em>Sharing Knowledge</em> Implementasi BIM.&quot; Dalam fokusnya, acara ini menggali setiap detail tentang penggunaan <em>Software Autodesk AEC</em> dalam konteks <em>Building Information Modeling </em>(BIM). Tidak seperti sebelumnya, acara kali ini dirancang untuk memperkenalkan dan membahas potensi luar biasa dari perangkat lunak ini.</p>\r\n\r\n<p>Peserta diajak berpetualang dalam dunia inovasi konstruksi modern, mengikuti acara yang diadakan secara daring melalui<em> platform Zoom</em> pada pukul 09.00 WIB. Sesi pembukaan yang penuh semangat membuka acara dengan pengantar hangat dari PT. Sinergi Wahana Gemilang, penyelenggara acara yang penuh dedikasi.</p>\r\n\r\n<p>Pemateri utama, Alve Yunus Marpaung, membawa peserta dalam perjalanan implementasi BIM pada proyek Makassar <em>New Port Toll Access Road Construction Phase I &amp; II</em>. Dengan penuh semangat, beliau membagikan wawasan tentang bagaimana pengenalan <em>Software Autodesk AEC</em> telah membentuk proyek-proyeknya menjadi prestasi luar biasa.</p>\r\n\r\n<p>Moderator R.M.Ihsan, seorang praktisi berpengalaman di bidang Engineering Infrastruktur PT. Wijaya Karya (Persero) Tbk., menjalankan sesi dengan kepiawaian, membimbing diskusi yang hidup dan dinamis antara pemateri dan peserta.</p>\r\n\r\n<p>Sekarang, pengetahuan baru telah ditanamkan, inspirasi telah dihidupkan, dan industri konstruksi semakin siap untuk melangkah maju dalam era BIM.<br />\r\n<strong>Bersiaplah untuk menggali lebih dalam dalam revolusi konstruksi ini!</strong></p>\r\n\r\n<p><strong>&quot;<em>Sharing Knowledge </em>Implementasi BIM&quot; - Mengulas <em>Software Autodesk AEC</em> untuk Masa Depan Konstruksi Lebih Cerdas!</strong></p>\r\n\r\n<hr />\r\n<p>Pada tanggal 12 April 2023, sebuah puncak pengetahuan terjadi dalam acara &quot;<em>Sharing Knowledge</em> Implementasi BIM.&quot; Dalam fokusnya, acara ini menggali setiap detail tentang penggunaan <em>Software Autodesk AEC</em> dalam konteks <em>Building Information Modeling </em>(BIM). Tidak seperti sebelumnya, acara kali ini dirancang untuk memperkenalkan dan membahas potensi luar biasa dari perangkat lunak ini.</p>\r\n\r\n<p>Peserta diajak berpetualang dalam dunia inovasi konstruksi modern, mengikuti acara yang diadakan secara daring melalui<em> platform Zoom</em> pada pukul 09.00 WIB. Sesi pembukaan yang penuh semangat membuka acara dengan pengantar hangat dari PT. Sinergi Wahana Gemilang, penyelenggara acara yang penuh dedikasi.</p>\r\n\r\n<p>Pemateri utama, Alve Yunus Marpaung, membawa peserta dalam perjalanan implementasi BIM pada proyek Makassar <em>New Port Toll Access Road Construction Phase I &amp; II</em>. Dengan penuh semangat, beliau membagikan wawasan tentang bagaimana pengenalan <em>Software Autodesk AEC</em> telah membentuk proyek-proyeknya menjadi prestasi luar biasa.</p>\r\n\r\n<p>Moderator R.M.Ihsan, seorang praktisi berpengalaman di bidang Engineering Infrastruktur PT. Wijaya Karya (Persero) Tbk., menjalankan sesi dengan kepiawaian, membimbing diskusi yang hidup dan dinamis antara pemateri dan peserta.</p>\r\n\r\n<p>Sekarang, pengetahuan baru telah ditanamkan, inspirasi telah dihidupkan, dan industri konstruksi semakin siap untuk melangkah maju dalam era BIM.<br />\r\n<strong>Bersiaplah untuk menggali lebih dalam dalam revolusi konstruksi ini!</strong></p>', 1),
(28, 'Sukses Gemilang \"Sharing Knowledge 2\" dalam Membahas Inovasi Software Bentley di Dunia Konstruksi!', '12252023144714 Sukses Gemilang.jpg', '2023-04-17', 41, '<p><strong>Berita Terkini: Sukses Gemilang &quot;<em>Sharing Knowledge</em> 2&quot; dalam Membahas Inovasi <em>Software</em> Bentley di Dunia Konstruksi!</strong></p>\r\n\r\n<hr />\r\n<p>Pada hari Senin, 17 April 2023, dunia konstruksi dan teknologi menyaksikan momen bersejarah melalui acara &quot;<em>Sharing Knowledge</em> 2.&quot; Dengan menghadirkan pemateri-pemateri ternama, termasuk Darius Opilas, Regional Sales Manager for SEA Bentley Systems, acara ini membahas secara mendalam pengenalan <em>Software</em> Bentley, memaparkan fitur-fitur revolusioner, dan membagikan pengalaman sukses implementasi di proyek-proyek terkemuka.</p>\r\n\r\n<p>Pemateri utama, Darius Opilas, membuka wawasan baru tentang kemajuan teknologi dengan <em>Software</em> Bentley, sementara Maylen Yee Cabalan dan tim implementasi dari PT. Wijaya Karya (Persero) Tbk. memberikan perspektif unik dalam mengaplikasikan teknologi ini dalam proyek-proyek infrastruktur yang signifikan.</p>\r\n\r\n<p>Sesi tanya jawab dan diskusi penuh antusiasme menghasilkan kolaborasi yang produktif antara pemateri dan peserta. Moderator, Muhammad Risyad Alditio, mengapresiasi semangat interaktif para peserta dan menyatakan harapannya bahwa wawasan yang diperoleh akan merambah jauh ke dalam praktik industri.</p>\r\n\r\n<p>Inilah bukti bahwa dunia konstruksi tak hanya membangun struktur fisik, tetapi juga menggali kearifan dan pengetahuan untuk mewujudkan masa depan yang lebih cerdas. Kami berterima kasih kepada semua yang telah berkontribusi pada kesuksesan acara ini dan berharap <em>sharing knowledge </em>seperti ini akan terus menjadi inspirasi untuk kemajuan industri.<br />\r\n&nbsp;</p>\r\n\r\n<p>&quot;Sharing Knowledge 2: Membangun Masa Depan Konstruksi dengan Software Bentley!&quot;</p>', 1),
(29, '\"Menggali Profunditas Implementasi BIM: Workshop Software Bentley Menyapa Para Profesional!\"', '12252023144853 Menggali Profunditas.jpg', '2023-08-06', 41, '<p><strong>&quot;Menggali Profunditas Implementasi BIM: <em>Workshop Software </em>Bentley Menyapa Para Profesional!&quot;</strong></p>\r\n\r\n<hr />\r\n<p>Pada tanggal 8-9 Juni 2023, jagat konstruksi akan bergemuruh dengan kehadiran workshop bertajuk &quot;Implementasi BIM <em>Software</em> Bentley.&quot; Acara yang dirancang untuk mengupas tuntas aplikasi dan keunggulan<em> Software </em>Bentley dalam <em>Building Information Modeling </em>(BIM) ini akan digelar secara <em>online</em> melalui<em> platform Zoom.</em></p>\r\n\r\n<p>Peserta diundang untuk menggali lebih dalam ke dalam dunia revolusioner BIM dan menemukan cara efektif memanfaatkan kecanggihan <em>Software</em> Bentley. Melalui sesi-sesi yang terstruktur dan interaktif, <em>workshop</em> ini akan memberikan pandangan mendalam tentang strategi implementasi yang sukses, fitur-fitur terbaru, dan manfaat nyata yang dapat dihasilkan.</p>\r\n\r\n<p>Jangan lewatkan kesempatan untuk berinteraksi langsung dengan para ahli, memperluas jaringan profesional, dan membangun keterampilan yang relevan dengan tuntutan industri.<br />\r\n<br />\r\n<strong>Daftarkan diri Anda sekarang dan bergabunglah dalam perjalanan menuju penguasaan BIM yang lebih mendalam!</strong></p>', 1),
(30, '\"Sharing Knowledge Engineering\": Menyusuri Keahlian Pemasangan Pipa JDU di Proyek Perpipaan Air Limbah Kota Pekanbaru!', '12252023145110 Knowledge Engineering.jpg', '2023-07-05', 41, '<p><strong>&quot;Sharing Knowledge Engineering&quot;: Menyusuri Keahlian Pemasangan Pipa JDU di Proyek Perpipaan Air Limbah Kota Pekanbaru!</strong></p>\r\n\r\n<p>Pada tanggal 5 Juli 2023, marilah kita bersatu dalam acara &quot;Sharing Knowledge Engineering&quot; yang akan mengupas habis keahlian dalam pekerjaan pemasangan pipa JDU pada proyek Pembangunan Perpipaan Air Limbah Kota Pekanbaru area selatan (Paket SC-1).</p>\r\n\r\n<p>Acara ini akan menjadi sumber inspirasi yang tak ternilai, dilangsungkan secara daring melalui Zoom, dan akan dipimpin oleh pemateri ulung:</p>\r\n\r\n<p><strong>Lutfi Bina, S.T.,M.MT. -</strong> seorang Expert 2 of Engineering yang akan membuka pintu rahasia sukses dalam pemasangan pipa JDU. Dengan pengalamannya yang luas, Lutfi Bina akan memandu kita melalui tahapan dan strategi yang diperlukan untuk mencapai hasil yang optimal dalam proyek perpipaan ini.</p>\r\n\r\n<p>Acara ini tidak hanya sekadar pertemuan, tetapi sebuah peluang langka untuk mendapatkan wawasan mendalam langsung dari seorang ahli. Jangan lewatkan kesempatan ini untuk memperkaya pengetahuan Anda, dan ikuti diskusi yang interaktif dan dinamis.</p>\r\n\r\n<p><strong>Daftarkan diri Anda sekarang dan menjadi bagian dari sesi berbagi pengetahuan yang memacu inovasi di dunia engineering!</strong></p>', 1),
(31, 'Sosialisasi Prosedur Engineering & BIM\": Merajut Keterampilan untuk Masa Depan Infrastruktur yang Terarah!', '12252023145358 Sosialisasi Prosedur.jpg', '2023-08-07', 41, '<p><strong>&quot;Sosialisasi Prosedur Engineering &amp; BIM&quot;: Merajut Keterampilan untuk Masa Depan Infrastruktur yang Terarah!&quot;</strong></p>\r\n\r\n<hr />\r\n<p>Pada tanggal 7 Agustus 2023, dunia engineering akan diterangi oleh acara istimewa, &quot;Sosialisasi Prosedur Engineering &amp; BIM&quot;. Acara ini, yang akan diadakan secara daring melalui Zoom, bertujuan untuk menyatukan para ahli dan praktisi dalam menyempurnakan keterampilan mereka dalam bidang prosedur engineering dan Building Information Modeling (BIM).</p>\r\n\r\n<p>Dua narasumber handal akan menjadi pionir dalam menguraikan wawasan mendalam:</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Akbar Ashari - DQHSEE:</strong> Akan membahas detil prosedur engineering yang kritis untuk mendukung keberlanjutan proyek.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Khalid Adil - DQHSEE:</strong> Akan membawa peserta ke dalam dunia Building Information Modeling (BIM) dan bagaimana menerapkannya secara efektif dalam proyek infrastruktur.</p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Aliq Taufan Arisono</strong>, dari Divisi Infrastruktur 2, akan memberikan pandangan unik dan pengalamannya selama sosialisasi.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p>Acara ini dikhususkan untuk Kasie dan Staff Engineering Project Divisi Infrastruktur 2, menjadi kesempatan bagi mereka untuk merajut pengetahuan dan keterampilan yang diperlukan untuk menghadapi tantangan masa depan.</p>\r\n\r\n<p>Jangan lewatkan momen untuk terlibat dalam diskusi yang mendalam, berinteraksi dengan para ahli, dan membentuk pondasi yang kuat untuk masa depan infrastruktur yang lebih terarah. Daftarkan diri Anda sekarang dan jadilah bagian dari evolusi engineering yang lebih cerdas!</p>', 1),
(32, '\"Forum Engineering 2023\" Mempersembahkan Inovasi Terkini dalam Menangani Geotechnical Issues', '12252023145604 Forum Engineering.jpg', '2023-08-23', 41, '<p><strong>&quot;<em>Forum Engineering</em> 2023&quot; Mempersembahkan Inovasi Terkini dalam Menangani <em>Geotechnical Issues</em></strong></p>\r\n\r\n<hr />\r\n<p>Pada tanggal 23 Agustus 2023, dunia teknik akan meriah dengan kehadiran &quot;<em>Forum Engineering </em>2023&quot; yang kali ini akan memfokuskan perhatian pada isu geoteknik. Acara ini tidak hanya menjanjikan wawasan mendalam tentang masalah geoteknik terkini, tetapi juga menawarkan platform interaktif melalui format hybrid &ndash; <em>offline</em>&nbsp;bertempat di lantai 17 auditorium Wika Tower 2, PT. Wijaya Karya (Persero) Tbk., dan secara daring, pukul 08.00 - 16.00.</p>\r\n\r\n<p><strong>Narasumber Pilihan:</strong></p>\r\n\r\n<ol>\r\n	<li><strong>Endra Susila, Ph.D., PE. (ITB) -</strong> &quot;Konstruksi di Atas Tanah Clayshale Beserta Best Practice.&quot;</li>\r\n	<li><strong>Dr. Ir. Aksan Kawanda, S.T.,M.T.,IPM ASEAN Eng. (Universitas Trisakti) -</strong> &quot;Longsor Lereng dan Instrumentasi Monitoring Lengser.&quot;</li>\r\n	<li><strong>Randy Meivishar (Proyek TOL 3B IKN) -</strong> &quot;Stabilitas Lereng Beserta Usulan Penanganannya.&quot;</li>\r\n	<li><strong>Suwantoro (Proyek Sumbu Timur IKN) -</strong> &quot;Konstruksi di Atas Tanah Clayshale dan Automasi Alat Kerja (OBU).&quot;</li>\r\n</ol>\r\n\r\n<p><strong>Moderator Terbaik:</strong></p>\r\n\r\n<ol>\r\n	<li><strong>Purwanto (IPUNK) -</strong>&nbsp; Engineering, Sub Divisi Engineering Infrastruktur 2, PT. Wijaya Karya (Persero) Tbk.</li>\r\n	<li><strong>M. Risyad Alditio -</strong>&nbsp;Engineering, Sub Divisi Engineering Infrastruktur 2, PT. Wijaya Karya (Persero) Tbk.</li>\r\n	<li><strong>R.M.Ihsan -&nbsp;</strong>Engineering, Sub Divisi Engineering Infrastruktur 2, PT. Wijaya Karya (Persero) Tbk.</li>\r\n	<li><strong>Aliq Taufan -</strong>&nbsp;Engineering, Sub Divisi Engineering Infrastruktur 2, PT. Wijaya Karya (Persero) Tbk.</li>\r\n</ol>\r\n\r\n<p>Jangan lewatkan acara ini yang akan menjadi panggung diskusi mengenai tantangan geoteknik terbaru dan solusi inovatif. Daftarkan diri Anda dan saksikan kolaborasi para ahli dan praktisi di dunia teknik. Temukan jawaban untuk isu geoteknik yang kompleks dalam &quot;<em>Forum Engineering</em> 2023&quot;!</p>', 1),
(33, '\"Training For Trainers\": Optimalisasi Produktivitas dengan Mengurangi Pemborosan!', '12252023145734 Training For Trainers.jpg', '2023-09-18', 41, '<p><strong>&quot;<em>Training For Trainers</em>&quot;: Optimalisasi Produktivitas dengan Mengurangi Pemborosan!</strong></p>\r\n\r\n<hr />\r\n<p>Minggu ini, pada tanggal<strong> 18 September 2023</strong>, Wika Tower akan menjadi saksi dari pelaksanaan acara &quot;<em>Training For Trainers&quot;</em> yang akan mengupas tuntas strategi meningkatkan produktivitas sambil mengurangi pemborosan. Acara ini akan berlangsung secara <em>offline</em> di lantai 2 Wika Tower, dimulai pukul 09.00 hingga 17.00 WIB.</p>\r\n\r\n<p>Penceramah utama pada acara ini adalah pakar-pakar terkemuka dalam industri:</p>\r\n\r\n<ol>\r\n	<li>\r\n	<p><strong>Hadi Triolaksana - SM Eng QHSE:</strong></p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Aminullah, PMP Lean Const Mgr</strong></p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Muhammad Iqbal - Expert 2 T.<em>Office</em></strong></p>\r\n	</li>\r\n	<li>\r\n	<p><strong>Anang Wirdianto - Expert 2 <em>Construction</em></strong></p>\r\n	</li>\r\n</ol>\r\n\r\n<p>Acara ini tidak hanya akan memberikan pengetahuan yang berharga tetapi juga akan memberikan peluang untuk berinteraksi langsung dengan para ahli ini. Jangan lewatkan kesempatan ini untuk mengasah keterampilan Anda dan meningkatkan produktivitas di lingkungan kerja.<br />\r\n<br />\r\n<strong>Daftar segera dan jadilah bagian dari transformasi menuju keunggulan operasional!</strong></p>', 1),
(34, 'D - Day KI/KM Award 2023', '12252023145945 KIKM Award.jpg', '2023-12-19', 41, '<p><strong>Hallo Sobat Infra,</strong><br />\r\nSelamat datang di Acara KI/KM AWARD 2023 - INFRA 2, Acara ini merupakan acara Puncak Program Kolaborasi Karya Inovasi dan Knowledge Management yang diselenggarakan oleh Infrastructure 2 Division.</p>\r\n\r\n<p>Tujuan daripada acara ini adalah:<br />\r\n1. Menciptakan wadah kolaborasi dan peningkatan kompetensi sesuai nilai-nilai AKHLAK di lingkungan WIKA Group khususnya Infrastructure 2 Division,&nbsp;<br />\r\n2. Meningkatkan minat insan WIKA Group khususnya Infrastructure 2 Division dalam menciptakan Karya Inovasi dan Knowledge Management,<br />\r\n3. Menjadi pematik untuk perkembangan Culture Knowledge Management di lingkungan WIKA Group khususnya Infrastructure 2 Division</p>\r\n\r\n<p>Acara ini akan diselenggarakan secara Hybrid pada:<br />\r\nTanggal : Rabu, 20 Des 2023<br />\r\nWaktu &nbsp; : 08.00 WIB<br />\r\nTempat Offline: Auditorium Lt17 WITO 2<br />\r\nOnline Via : linktr.ee/sobatinfra_wika</p>\r\n\r\n<p>Jangan lewatkan Acara ini,&nbsp;<br />\r\nSalam<br />\r\nInfrastructure 2 Division<br />\r\n&nbsp;</p>', 1),
(35, 'Pemenang KIKM AWARD 2023', '12252023150313 Pemenang.jpg', '2023-12-20', 41, '<p><strong>&quot;KIKM Award 2023: Inovasi dan Pengetahuan Merajai, Para Pemenang Tembus Batas!&quot;</strong></p>\r\n\r\n<hr />\r\n<p>Acara KIKM Award 2023 sukses besar! Infrastructure 2 Division memfasilitasi platform yang memungkinkan peserta menaklukkan setiap tahap, dari awal hingga final. Diskusi tanya jawab dengan para juri utama menambahkan nuansa ketegangan yang mengasyikkan.<br />\r\n<br />\r\n<strong>Juara KI/Karya Inovasi</strong></p>\r\n\r\n<ul>\r\n	<li><em>Juara 1:</em> &quot;Pemanfaatan Limbah FABA (Fly Ash Bottom Ash) sebagai material Timbunan&quot; oleh PKT Bontang.</li>\r\n	<li><em>Juara 2:</em> &quot;Karya Inovasi Jembatan Pelengkung Proyek Sumbu Kebangsaan Timur&quot; oleh Sumbu Timur.</li>\r\n	<li><em>Juara 3:</em> &quot;Digitalisasi Operasional Proyek dengan Software Open Source&quot; oleh Bendungan Manikin.</li>\r\n</ul>\r\n\r\n<p><strong>Juara KM/Knowledge Management</strong></p>\r\n\r\n<ul>\r\n	<li><em>Juara 1:</em> &quot;Penanganan Longsor Lereng STA 12+700 Tol IKN 3B&quot; oleh IKN 3B.</li>\r\n	<li><em>Juara 2:</em> &quot;Review Manajemen Pengetahuan: Desain Struktur Abutmen Menjadi Pierhead Backwail di Tol Makassar Newport&quot; oleh MNP.</li>\r\n	<li><em>Juara 3:</em> &quot;Perubahan Desain Pekerjaan Precast Lining dengan Campuran Skimcoat&quot; oleh Irigasi Gumbasa.</li>\r\n</ul>\r\n\r\n<p>Para pemenang bukan hanya penghuni podium, tetapi juga perwujudan semangat kreatifitas dan manajemen pengetahuan. Keberhasilan ini membuka babak baru dalam industri konstruksi, menunjukkan bahwa inovasi dan pengetahuan adalah kekuatan yang tak terhentikan.<br />\r\n&nbsp;</p>\r\n\r\n<p>Dengan ide-ide unik, para pemenang KIKM Award 2023 telah membuka pintu menuju masa depan konstruksi yang lebih canggih. Keberhasilan mereka membuktikan bahwa keunikan dan kecanggihan adalah kunci menuju progres.</p>\r\n\r\n<p><em><strong>Selamat kepada para pemenang yang telah menorehkan prestasi gemilang ini. Teruslah menginspirasi dan mewarnai perjalanan inovasi di dunia konstruksi!</strong></em></p>', 1),
(36, 'Akses Tol Makassar New Port Resmi Difungsionalkan, Menandai Capaian Gemilang Tim MNP', '01042024011401 Akses Tol Makassar New Port Resmi Difungsionalkan, Menandai Capaian Gemilang Tim MNP.jpg', '2024-01-02', 41, '<p>[INFRANEWS]</p>\r\n\r\n<p>Selamat datang, Sobat Infra! Kabar baik dan prestasi gemilang datang dari Proyek Jalan Akses Tol Makassar New Port, yang telah mencapai tonggak sejarah dengan difungsionalkannya Akses Tol tersebut sejak tanggal 2 Januari 2024. Suasana penuh kebanggaan dan semangat membara menghiasi acara pembukaan ini, yang dipandu oleh sosok Direktur Utama PT Jalan Tol Seksi Empat, Bapak Ismail Malliungan.</p>\r\n\r\n<p>Prestasi ini tak lepas dari dedikasi dan kerja keras seluruh tim yang terlibat dalam proyek, khususnya Project Manager Proyek Akses Tol MNP, Bapak Amin Nur Said, beserta timnya yang telah berupaya maksimal dalam mewujudkan impian ini. Keberhasilan ini juga menjadi momentum bersejarah yang turut dihadiri oleh Tim Operasional Tol PT. Jalan Tol Seksi Empat dan Tim PJR DITLANTAS Polda Sulsel, menandai kolaborasi yang harmonis antara sektor swasta dan pihak keamanan.</p>\r\n\r\n<p>Dalam suasana penuh kebersamaan, acara pembukaan ini menjadi ajang untuk merayakan prestasi bersama dan meneguhkan komitmen untuk terus memberikan pelayanan terbaik kepada masyarakat. Dengan difungsionalkannya Akses Tol Makassar New Port, diharapkan akan memberikan dampak positif terhadap konektivitas dan pertumbuhan ekonomi di wilayah tersebut.</p>\r\n\r\n<p>Selamat dan sukses untuk Tim MNP yang telah berhasil mengukir prestasi luar biasa ini. Semoga Akses Tol Makassar New Port dapat menjadi simbol kemajuan dan kemudahan akses transportasi bagi masyarakat serta menjadi inspirasi untuk proyek-proyek infrastruktur mendatang. Teruslah berkarya untuk kemajuan bersama!</p>', 1),
(37, 'The Phoenix to Infinity', '01192024032046 The Phoenix to Infinity.jpg', '2024-01-17', 1, '<p>&quot;Momentum luar biasa di acara The Phoenix to Infinity! 🚀 Bersama seluruh Manajer Proyek Departemen Operasi 1, kita hadir untuk merayakan perjalanan kita yang tak terbatas. 🌟<br />\r\nWikasatrian menjadi saksi inspirasi di acara kami hari ini! 🔥 The Phoenix to Infinity Departemen Operasi 1 menghadirkan sarasehan epik, disajikan langsung oleh Direktur Utama dan Direktur Operasi 1. Terima kasih kepada semua yang hadir! 🙌<br />\r\nKesuksesan adalah perjalanan, bukan tujuan akhir. Di The Phoenix to Infinity, kita bersatu sebagai satu keluarga Departemen Operasi 1 untuk merayakan pencapaian luar biasa dan menatap masa depan yang cerah bersama! 🎉🚀&nbsp;<a href=\"https://www.instagram.com/explore/tags/operasi1family/\">#Operasi1Family</a>&quot;<br />\r\n<a href=\"https://www.instagram.com/explore/tags/thephoenixtoinfinity/\">#ThePhoenixToInfinity</a>&nbsp;<a href=\"https://www.instagram.com/explore/tags/operasi1journey/\">#Operasi1Journey</a>&quot;</p>', 1),
(38, 'Purna Bakti Pak Hermawan Dhewayanto', '01192024031901 Purna Bakti Pak Hermawan Dhewayanto.jpg', '2024-01-17', 1, '<p>&quot;Wikasatrian bergema dengan rasa haru saat kita mengucapkan selamat Purna Tugas kepada Senior Vice President Infra 2 Bapak Hermawan Dhewayanto. 🌐 Di hadapan manajer proyek, SVP INFRA 1, SVP INFRA 2, Direktur Operasi 1 dan Direktur Utama kami yang visioner, kita menghargai momen dan pelajaran yang dibagikan. 🤝<br />\r\n<br />\r\n<a href=\"https://www.instagram.com/explore/tags/farewellsvp/\">#FarewellSVP</a>&nbsp;<a href=\"https://www.instagram.com/explore/tags/infra2legacy/\">#Infra2Legacy</a>&quot;</p>', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jabatans`
--

CREATE TABLE `jabatans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jabatan` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jabatans`
--

INSERT INTO `jabatans` (`id`, `nama_jabatan`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Jabatan update', 0, '2024-04-09 10:37:55', '2024-04-09 10:38:31'),
(2, 'Coordinator', 1, '2024-04-09 11:43:25', '2024-04-11 08:58:46');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_pekerjaan`
--

CREATE TABLE `kategori_pekerjaan` (
  `id_kategori_pekerjaan` int(11) NOT NULL,
  `kategori_pekerjaan` varchar(255) DEFAULT NULL,
  `fungsi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori_pekerjaan`
--

INSERT INTO `kategori_pekerjaan` (`id_kategori_pekerjaan`, `kategori_pekerjaan`, `fungsi`) VALUES
(1, 'A1. CSI Collecting, Monitoring & Feedback Follow Up', 'Design & Analysis'),
(2, 'A2. Project Technical Supporting', 'Design & Analysis'),
(3, 'A3. Engineering Clinic', 'Design & Analysis'),
(4, 'A4. Quality Engineering Committee (If Any)', 'Design & Analysis'),
(5, 'A5. Engineering Work Optimation dan Efficiency Collecting', 'Design & Analysis'),
(6, 'A6. Engineering Lesson Learn Register', 'Design & Analysis'),
(7, 'A7. Monitoring & Collecting KI/KM Div Infra 2', 'Design & Analysis'),
(8, 'A8. Technical Code & Standard Control', 'Design & Analysis'),
(9, 'A9. Technical Software Renewing & Personel Capability', 'Design & Analysis'),
(10, 'A10. Soil Investigation and Project Data Collecting', 'Design & Analysis'),
(11, 'B1. Strategic Programs Planning', 'BIM & Digitalization Engineering'),
(12, 'B2. Management Review (MR) Content Planning', 'BIM & Digitalization Engineering'),
(13, 'B3. Monitoring Project Technical Issue, Production & BIM', 'BIM & Digitalization Engineering'),
(14, 'B4. Personnel Time Frame Management', 'BIM & Digitalization Engineering'),
(15, 'B5. Submission & Monitoring Engineering Expertise Certification', 'BIM & Digitalization Engineering'),
(16, 'B6. BIM Project Monitoring', 'BIM & Digitalization Engineering'),
(17, 'B7. BIM Project Supporting', 'BIM & Digitalization Engineering'),
(18, 'B8. BIM & Engineering Learning Center', 'BIM & Digitalization Engineering'),
(19, 'B9. BIM Software Controlling & Submission', 'BIM & Digitalization Engineering'),
(20, 'B10. Data Dashboard Design System', 'BIM & Digitalization Engineering'),
(21, 'B11. Data Center Controlling & Reviewing', 'BIM & Digitalization Engineering'),
(22, 'B12. Project Technical Support Report Collecting & Uploading', 'BIM & Digitalization Engineering'),
(23, 'C1. Sub-Contractor Technical Verification', 'System Engineering & Lean Construction'),
(24, 'C2. WIKA Procedure Reviewing Person', 'System Engineering & Lean Construction'),
(25, 'C3. Project Technical Risk Management', 'System Engineering & Lean Construction'),
(26, 'C4. WIKA Work Instruction Reviewing Person', 'System Engineering & Lean Construction'),
(27, 'C5. Project RKP Reviewing Person', 'System Engineering & Lean Construction'),
(28, 'C6. Project LPS Reviewing Person', 'System Engineering & Lean Construction'),
(29, 'C7. Pelatihan, Webinar, Internal Training Sub-Divisi Engineering', 'System Engineering & Lean Construction'),
(30, 'C8. CMC Personnel Collecting', 'System Engineering & Lean Construction'),
(31, 'C9. Memorandum of Understanding (MOU) With Partner Team', 'System Engineering & Lean Construction'),
(32, 'C10. Lean Construction', 'System Engineering & Lean Construction'),
(35, 'D. Lain-lain', NULL),
(36, 'B13. BIM Valuasi & Benefit Dampak Implementasi', 'BIM & Digitalization Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `ki_km`
--

CREATE TABLE `ki_km` (
  `id_ki_km` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `status_ki_km` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `tanggal_upload` date DEFAULT NULL,
  `proses_penulisan` int(11) NOT NULL DEFAULT 0,
  `approval_atasan` int(11) NOT NULL DEFAULT 0,
  `approval_pic_divisi` int(11) NOT NULL DEFAULT 0,
  `approval_pic_pusat` int(11) NOT NULL DEFAULT 0,
  `approval_published` int(11) NOT NULL DEFAULT 0,
  `tanggal_published` date DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `is_respon` int(11) NOT NULL DEFAULT 0,
  `id_user_respon` int(11) DEFAULT NULL,
  `tanggal_input` date NOT NULL,
  `upload_file` text DEFAULT NULL,
  `upload_file_hasil` text DEFAULT NULL,
  `terupload_kmspace` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ki_km`
--

INSERT INTO `ki_km` (`id_ki_km`, `id_proyek`, `id_user`, `judul`, `status_ki_km`, `kategori`, `department`, `tanggal_upload`, `proses_penulisan`, `approval_atasan`, `approval_pic_divisi`, `approval_pic_pusat`, `approval_published`, `tanggal_published`, `note`, `is_respon`, `id_user_respon`, `tanggal_input`, `upload_file`, `upload_file_hasil`, `terupload_kmspace`) VALUES
(1, 3, 54, 'Judul', 'Engineering', 'Best Practice', 'Departemen Operasi 3', '2023-11-11', 1, 1, 1, 0, 0, NULL, 'note', 1, 52, '2023-11-11', '11282023024742 Judul1.pdf', NULL, NULL),
(2, 5, 56, 'Judul', 'Engineering', 'Best Practice', 'Departemen Operasi 3', '2023-11-11', 1, 1, 1, 1, 1, '2023-11-25', 'Note', 1, 53, '2023-11-11', NULL, '11282023074702 Judul.pdf', NULL),
(3, 4, 55, 'PTOYEK', 'Non Engineering', 'Knowledge Management', 'Departemen Operasi 3', '2023-11-12', 1, 1, 0, 0, 0, NULL, NULL, 1, 37, '2023-11-12', NULL, NULL, NULL),
(4, 3, 54, 'Judul', 'Engineering', 'Best Practice', 'Departemen Operasi 3', '2023-11-28', 1, 1, 0, 0, 0, '2023-11-28', NULL, 1, 53, '2023-11-28', '11282023024742 Judul.pdf', '11282023075011 Judul.zip', NULL),
(5, 4, 55, 'mmm', 'Engineering', 'Best Practice', 'Departemen Operasi 3', '2023-12-07', 0, 1, 0, 0, 0, NULL, NULL, 1, 37, '2023-12-06', '12062023101743 mmm.xlsx', NULL, 1),
(6, 4, 55, 'Digitalisasi', 'Non Engineering', 'Knowledge Management', 'Departemen Operasi 4', '2023-12-08', 1, 1, 1, 0, 0, '2023-12-08', NULL, 1, 37, '2023-12-08', '12082023090013 Digitalisasi.xlsx', '12082023090216 Digitalisasi.xlsx', 1),
(7, 5, 56, 'trial', 'Engineering', 'Knowledge Management', 'Departemen Operasi 3', NULL, 0, 0, 0, 0, 0, NULL, NULL, 0, NULL, '2024-01-23', '01232024085148 trial.jpg', NULL, NULL),
(8, 27, 57, 'tes', 'Engineering', 'Best Practice', 'Departemen Operasi 3', NULL, 0, 0, 0, 0, 0, NULL, NULL, 0, NULL, '2024-04-10', '04102024140608 tes.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kontrak_induk`
--

CREATE TABLE `kontrak_induk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_proyek` int(11) DEFAULT NULL,
  `tanggal_kontrak_induk` date DEFAULT NULL,
  `link_kontrak_induk` text DEFAULT NULL,
  `tanggal_spmk` date DEFAULT NULL,
  `link_spmk` text DEFAULT NULL,
  `tanggal_dokumen_rkp` date DEFAULT NULL,
  `link_dokumen_rkp` text DEFAULT NULL,
  `tanggal_checkpoint_20` date DEFAULT NULL,
  `link_checkpoint_20` text DEFAULT NULL,
  `tanggal_checkpoint_50` date DEFAULT NULL,
  `link_checkpoint_50` text DEFAULT NULL,
  `tanggal_checkpoint_75` date DEFAULT NULL,
  `link_checkpoint_75` text DEFAULT NULL,
  `tanggal_foureyes_principal` date DEFAULT NULL,
  `link_foureyes_principal` text DEFAULT NULL,
  `tanggal_dokumen_lps` date DEFAULT NULL,
  `link_dokumen_lps` text DEFAULT NULL,
  `verifikasi_timeline` varchar(255) DEFAULT 'Belum Disetujui',
  `id_verifikator` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nama_kontrak_induk` varchar(255) DEFAULT NULL,
  `nama_spmk` varchar(255) DEFAULT NULL,
  `nama_dokumen_rkp` varchar(255) DEFAULT NULL,
  `nama_checkpoint_20` varchar(255) DEFAULT NULL,
  `nama_checkpoint_50` varchar(255) DEFAULT NULL,
  `nama_checkpoint_75` varchar(255) DEFAULT NULL,
  `nama_foureyes_principal` varchar(255) DEFAULT NULL,
  `nama_dokumen_lps` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kontrak_induk`
--

INSERT INTO `kontrak_induk` (`id`, `id_proyek`, `tanggal_kontrak_induk`, `link_kontrak_induk`, `tanggal_spmk`, `link_spmk`, `tanggal_dokumen_rkp`, `link_dokumen_rkp`, `tanggal_checkpoint_20`, `link_checkpoint_20`, `tanggal_checkpoint_50`, `link_checkpoint_50`, `tanggal_checkpoint_75`, `link_checkpoint_75`, `tanggal_foureyes_principal`, `link_foureyes_principal`, `tanggal_dokumen_lps`, `link_dokumen_lps`, `verifikasi_timeline`, `id_verifikator`, `created_at`, `updated_at`, `nama_kontrak_induk`, `nama_spmk`, `nama_dokumen_rkp`, `nama_checkpoint_20`, `nama_checkpoint_50`, `nama_checkpoint_75`, `nama_foureyes_principal`, `nama_dokumen_lps`) VALUES
(1, 27, '2024-03-24', 'Link', '2024-03-24', 'Link', '2024-03-24', 'Link', '2024-03-24', 'Link', '2024-03-24', 'Link', '2024-03-24', 'Link', '2024-03-24', 'Link', '2024-03-24', 'Link', 'Sudah Disetujui', 61, '2024-03-23 23:42:38', '2024-03-24 00:29:10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `license`
--

CREATE TABLE `license` (
  `id_license` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `unit_kerja` varchar(255) DEFAULT NULL,
  `id_device` text DEFAULT NULL,
  `tanggal_license` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `license`
--

INSERT INTO `license` (`id_license`, `id_user`, `unit_kerja`, `id_device`, `tanggal_license`) VALUES
(4, 54, NULL, 'ID Device alve hunus', '2023-11-22'),
(7, 37, NULL, '123456', '2023-12-08'),
(8, 56, NULL, '123456', '2024-01-23');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id_log` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `activity` varchar(255) DEFAULT NULL,
  `feature` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`id_log`, `id_user`, `activity`, `feature`, `created_at`, `updated_at`) VALUES
(2, 58, 'Melakukan Logout.', 'LOGOUT', '2024-02-10 14:01:20', '2024-02-10 14:01:20'),
(4, 60, 'Melakukan Logout.', 'LOGOUT', '2024-02-10 14:04:46', '2024-02-10 14:04:46'),
(5, 58, 'Melakukan Login.', 'LOGIN', '2024-02-10 14:07:39', '2024-02-10 14:07:39'),
(6, 58, 'Melakukan Logout.', 'LOGOUT', '2024-02-10 14:16:58', '2024-02-10 14:16:58'),
(7, 41, 'Melakukan Login.', 'LOGIN', '2024-02-10 14:17:15', '2024-02-10 14:17:15'),
(8, 41, 'Melihat Halaman Daftar Achievement.', 'ACHIEVEMENT', '2024-02-10 14:17:31', '2024-02-10 14:17:31'),
(9, 41, 'Menambah Data Achievement.', 'ACHIEVEMENT', '2024-02-10 14:18:42', '2024-02-10 14:18:42'),
(10, 41, 'Melihat Halaman Daftar Achievement.', 'ACHIEVEMENT', '2024-02-10 14:18:43', '2024-02-10 14:18:43'),
(11, 41, 'Melihat Halaman Detail Achievement.', 'ACHIEVEMENT', '2024-02-10 14:20:35', '2024-02-10 14:20:35'),
(12, 41, 'Melihat Halaman Daftar Achievement.', 'ACHIEVEMENT', '2024-02-10 14:20:52', '2024-02-10 14:20:52'),
(13, 41, 'Menghapus Data Achievement.', 'ACHIEVEMENT', '2024-02-10 14:20:56', '2024-02-10 14:20:56'),
(14, 41, 'Melihat Halaman Daftar Achievement.', 'ACHIEVEMENT', '2024-02-10 14:20:56', '2024-02-10 14:20:56'),
(15, 60, 'Melakukan Login.', 'LOGIN', '2024-02-11 03:58:02', '2024-02-11 03:58:02'),
(16, 60, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-02-11 03:58:03', '2024-02-11 03:58:03'),
(17, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 03:59:59', '2024-02-11 03:59:59'),
(18, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 04:00:14', '2024-02-11 04:00:14'),
(19, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 04:04:23', '2024-02-11 04:04:23'),
(20, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 04:12:39', '2024-02-11 04:12:39'),
(21, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 04:15:23', '2024-02-11 04:15:23'),
(22, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 04:16:17', '2024-02-11 04:16:17'),
(23, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 04:17:46', '2024-02-11 04:17:46'),
(24, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 04:19:00', '2024-02-11 04:19:00'),
(25, 60, 'Menambah Chat ke coor', 'CHAT', '2024-02-11 04:19:08', '2024-02-11 04:19:08'),
(26, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 04:19:36', '2024-02-11 04:19:36'),
(27, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 04:20:04', '2024-02-11 04:20:04'),
(28, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 04:20:28', '2024-02-11 04:20:28'),
(29, 60, 'Menghapus Data Chat ke coor.', 'CHAT', '2024-02-11 04:22:19', '2024-02-11 04:22:19'),
(30, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 04:22:20', '2024-02-11 04:22:20'),
(31, 60, 'Menambah Chat ke coor', 'CHAT', '2024-02-11 04:22:40', '2024-02-11 04:22:40'),
(32, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 04:22:40', '2024-02-11 04:22:40'),
(33, 60, 'Menghapus Data Chat ke coor.', 'CHAT', '2024-02-11 04:22:46', '2024-02-11 04:22:46'),
(34, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 04:22:46', '2024-02-11 04:22:46'),
(35, 60, 'Menambah Chat ke coor', 'CHAT', '2024-02-11 04:23:54', '2024-02-11 04:23:54'),
(36, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 04:23:55', '2024-02-11 04:23:55'),
(37, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 04:24:36', '2024-02-11 04:24:36'),
(38, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 04:30:15', '2024-02-11 04:30:15'),
(39, 60, 'Menghapus Data Chat ke coor.', 'CHAT', '2024-02-11 04:30:19', '2024-02-11 04:30:19'),
(40, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 04:30:19', '2024-02-11 04:30:19'),
(41, 60, 'Menambah Chat ke coor', 'CHAT', '2024-02-11 04:30:31', '2024-02-11 04:30:31'),
(42, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 04:30:31', '2024-02-11 04:30:31'),
(43, 60, 'Menghapus Data Chat ke coor.', 'CHAT', '2024-02-11 04:30:36', '2024-02-11 04:30:36'),
(44, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 04:30:37', '2024-02-11 04:30:37'),
(45, 60, 'Menambah Chat ke coor', 'CHAT', '2024-02-11 04:30:51', '2024-02-11 04:30:51'),
(46, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 04:30:51', '2024-02-11 04:30:51'),
(47, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 04:58:40', '2024-02-11 04:58:40'),
(48, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:08:04', '2024-02-11 05:08:04'),
(49, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:08:36', '2024-02-11 05:08:36'),
(50, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:08:56', '2024-02-11 05:08:56'),
(51, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:09:21', '2024-02-11 05:09:21'),
(52, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:10:00', '2024-02-11 05:10:00'),
(53, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:10:15', '2024-02-11 05:10:15'),
(54, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:10:29', '2024-02-11 05:10:29'),
(55, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:10:39', '2024-02-11 05:10:39'),
(56, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:12:06', '2024-02-11 05:12:06'),
(57, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:13:52', '2024-02-11 05:13:52'),
(58, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:17:50', '2024-02-11 05:17:50'),
(59, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:18:12', '2024-02-11 05:18:12'),
(60, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:18:27', '2024-02-11 05:18:27'),
(61, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:30:02', '2024-02-11 05:30:02'),
(62, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:30:33', '2024-02-11 05:30:33'),
(63, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:30:50', '2024-02-11 05:30:50'),
(64, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:31:07', '2024-02-11 05:31:07'),
(65, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:31:18', '2024-02-11 05:31:18'),
(66, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:31:37', '2024-02-11 05:31:37'),
(67, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:33:39', '2024-02-11 05:33:39'),
(68, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:33:58', '2024-02-11 05:33:58'),
(69, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:34:14', '2024-02-11 05:34:14'),
(70, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:35:00', '2024-02-11 05:35:00'),
(71, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:35:48', '2024-02-11 05:35:48'),
(72, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:38:32', '2024-02-11 05:38:32'),
(73, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:39:19', '2024-02-11 05:39:19'),
(74, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:39:36', '2024-02-11 05:39:36'),
(75, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:40:15', '2024-02-11 05:40:15'),
(76, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:40:30', '2024-02-11 05:40:30'),
(77, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:40:59', '2024-02-11 05:40:59'),
(78, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:41:11', '2024-02-11 05:41:11'),
(79, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:41:21', '2024-02-11 05:41:21'),
(80, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:43:24', '2024-02-11 05:43:24'),
(81, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:45:46', '2024-02-11 05:45:46'),
(82, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:46:24', '2024-02-11 05:46:24'),
(83, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 05:46:47', '2024-02-11 05:46:47'),
(84, 60, 'Melakukan Login.', 'LOGIN', '2024-02-11 10:05:54', '2024-02-11 10:05:54'),
(85, 60, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-02-11 10:05:55', '2024-02-11 10:05:55'),
(86, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 10:05:59', '2024-02-11 10:05:59'),
(87, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 10:12:27', '2024-02-11 10:12:27'),
(88, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 10:12:30', '2024-02-11 10:12:30'),
(89, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 11:52:11', '2024-02-11 11:52:11'),
(90, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 11:53:52', '2024-02-11 11:53:52'),
(91, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 11:56:23', '2024-02-11 11:56:23'),
(92, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 12:10:44', '2024-02-11 12:10:44'),
(93, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 12:11:13', '2024-02-11 12:11:13'),
(94, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 12:12:50', '2024-02-11 12:12:50'),
(95, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 12:16:03', '2024-02-11 12:16:03'),
(96, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 12:18:21', '2024-02-11 12:18:21'),
(97, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 12:18:42', '2024-02-11 12:18:42'),
(98, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 12:20:47', '2024-02-11 12:20:47'),
(99, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 12:21:48', '2024-02-11 12:21:48'),
(100, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 12:22:10', '2024-02-11 12:22:10'),
(101, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 12:22:20', '2024-02-11 12:22:20'),
(102, 60, 'Melihat Halaman Daftar Task.', 'Manajemen TASK', '2024-02-11 12:23:07', '2024-02-11 12:23:07'),
(103, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 12:23:13', '2024-02-11 12:23:13'),
(104, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 12:23:19', '2024-02-11 12:23:19'),
(105, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 12:23:27', '2024-02-11 12:23:27'),
(106, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 12:24:08', '2024-02-11 12:24:08'),
(107, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 12:24:12', '2024-02-11 12:24:12'),
(108, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 12:28:15', '2024-02-11 12:28:15'),
(109, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 12:35:47', '2024-02-11 12:35:47'),
(110, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 12:36:08', '2024-02-11 12:36:08'),
(111, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 12:36:21', '2024-02-11 12:36:21'),
(112, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 12:36:33', '2024-02-11 12:36:33'),
(113, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 12:37:13', '2024-02-11 12:37:13'),
(114, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 12:59:12', '2024-02-11 12:59:12'),
(115, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:00:12', '2024-02-11 13:00:12'),
(116, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:10:10', '2024-02-11 13:10:10'),
(117, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:11:18', '2024-02-11 13:11:18'),
(118, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:11:42', '2024-02-11 13:11:42'),
(119, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:18:51', '2024-02-11 13:18:51'),
(120, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:21:36', '2024-02-11 13:21:36'),
(121, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:24:07', '2024-02-11 13:24:07'),
(122, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:24:11', '2024-02-11 13:24:11'),
(123, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:24:53', '2024-02-11 13:24:53'),
(124, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:25:44', '2024-02-11 13:25:44'),
(125, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:26:19', '2024-02-11 13:26:19'),
(126, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:26:28', '2024-02-11 13:26:28'),
(127, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:26:35', '2024-02-11 13:26:35'),
(128, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:26:41', '2024-02-11 13:26:41'),
(129, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:27:04', '2024-02-11 13:27:04'),
(130, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:27:53', '2024-02-11 13:27:53'),
(131, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:28:16', '2024-02-11 13:28:16'),
(132, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:28:22', '2024-02-11 13:28:22'),
(133, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:28:26', '2024-02-11 13:28:26'),
(134, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:28:32', '2024-02-11 13:28:32'),
(135, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:29:35', '2024-02-11 13:29:35'),
(136, 58, 'Melakukan Login.', 'LOGIN', '2024-02-11 13:36:13', '2024-02-11 13:36:13'),
(137, 58, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-02-11 13:36:14', '2024-02-11 13:36:14'),
(138, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 13:36:50', '2024-02-11 13:36:50'),
(139, 60, 'Menambah Chat ke Head Office 1', 'CHAT', '2024-02-11 13:36:59', '2024-02-11 13:36:59'),
(140, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 13:36:59', '2024-02-11 13:36:59'),
(141, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:37:03', '2024-02-11 13:37:03'),
(142, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:37:09', '2024-02-11 13:37:09'),
(143, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 13:37:47', '2024-02-11 13:37:47'),
(144, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 13:41:04', '2024-02-11 13:41:04'),
(145, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:41:07', '2024-02-11 13:41:07'),
(146, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:41:16', '2024-02-11 13:41:16'),
(147, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 13:41:34', '2024-02-11 13:41:34'),
(148, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 13:41:43', '2024-02-11 13:41:43'),
(149, 58, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-02-11 13:42:29', '2024-02-11 13:42:29'),
(150, 58, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 13:42:37', '2024-02-11 13:42:37'),
(151, 58, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:42:48', '2024-02-11 13:42:48'),
(152, 58, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:43:01', '2024-02-11 13:43:01'),
(153, 58, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:43:09', '2024-02-11 13:43:09'),
(154, 58, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:43:17', '2024-02-11 13:43:17'),
(155, 60, 'Menghapus Data Chat ke Head Office 1.', 'CHAT', '2024-02-11 13:46:02', '2024-02-11 13:46:02'),
(156, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 13:46:02', '2024-02-11 13:46:02'),
(157, 58, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:46:25', '2024-02-11 13:46:25'),
(158, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:47:07', '2024-02-11 13:47:07'),
(159, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:47:55', '2024-02-11 13:47:55'),
(160, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:48:40', '2024-02-11 13:48:40'),
(161, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:54:02', '2024-02-11 13:54:02'),
(162, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 13:55:05', '2024-02-11 13:55:05'),
(163, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 14:00:06', '2024-02-11 14:00:06'),
(164, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 14:00:33', '2024-02-11 14:00:33'),
(165, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 14:00:51', '2024-02-11 14:00:51'),
(166, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 14:01:28', '2024-02-11 14:01:28'),
(167, 58, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 14:01:43', '2024-02-11 14:01:43'),
(168, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 14:05:37', '2024-02-11 14:05:37'),
(169, 58, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 14:05:58', '2024-02-11 14:05:58'),
(170, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 14:06:16', '2024-02-11 14:06:16'),
(171, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 14:11:20', '2024-02-11 14:11:20'),
(172, 58, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 14:11:38', '2024-02-11 14:11:38'),
(173, 58, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 14:12:31', '2024-02-11 14:12:31'),
(174, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 14:12:36', '2024-02-11 14:12:36'),
(175, 60, 'Menambah Chat ke Head Office 1', 'CHAT', '2024-02-11 14:12:44', '2024-02-11 14:12:44'),
(176, 60, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 14:12:44', '2024-02-11 14:12:44'),
(177, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 14:12:48', '2024-02-11 14:12:48'),
(178, 60, 'Melihat Halaman Detail chat.', 'CHAT', '2024-02-11 14:12:54', '2024-02-11 14:12:54'),
(179, 58, 'Melihat Halaman Daftar Chat.', 'CHAT', '2024-02-11 14:13:05', '2024-02-11 14:13:05'),
(180, 58, 'Melakukan Login.', 'LOGIN', '2024-02-12 07:34:54', '2024-02-12 07:34:54'),
(181, 58, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-02-12 07:34:54', '2024-02-12 07:34:54'),
(182, 58, 'Melihat Halaman Daftar Task.', 'Manajemen TASK', '2024-02-12 07:35:04', '2024-02-12 07:35:04'),
(183, 58, 'Melihat Halaman Daftar Task.', 'Manajemen TASK', '2024-02-12 07:36:08', '2024-02-12 07:36:08'),
(184, 58, 'Melihat Halaman Form Tambah Task.', 'Manajemen TASK', '2024-02-12 07:37:05', '2024-02-12 07:37:05'),
(185, 58, 'Melihat Halaman Form Tambah Task.', 'Manajemen TASK', '2024-02-12 07:38:06', '2024-02-12 07:38:06'),
(186, 58, 'Menambah Data Task.', 'Manajemen TASK', '2024-02-12 07:38:24', '2024-02-12 07:38:24'),
(187, 58, 'Melihat Halaman Daftar Task.', 'Manajemen TASK', '2024-02-12 07:38:25', '2024-02-12 07:38:25'),
(188, 1, 'Melakukan Login.', 'LOGIN', '2024-03-08 19:08:42', '2024-03-08 19:08:42'),
(189, 1, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-08 19:08:42', '2024-03-08 19:08:42'),
(190, 41, 'Melakukan Login.', 'LOGIN', '2024-03-09 03:17:14', '2024-03-09 03:17:14'),
(191, 41, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-09 03:17:15', '2024-03-09 03:17:15'),
(192, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 03:23:37', '2024-03-09 03:23:37'),
(193, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 03:26:19', '2024-03-09 03:26:19'),
(194, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 03:28:36', '2024-03-09 03:28:36'),
(195, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 03:30:10', '2024-03-09 03:30:10'),
(196, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 03:31:06', '2024-03-09 03:31:06'),
(197, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 03:32:37', '2024-03-09 03:32:37'),
(198, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 03:33:05', '2024-03-09 03:33:05'),
(199, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 03:33:46', '2024-03-09 03:33:46'),
(200, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 03:34:54', '2024-03-09 03:34:54'),
(201, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 03:35:32', '2024-03-09 03:35:32'),
(202, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 03:36:12', '2024-03-09 03:36:12'),
(203, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 03:36:44', '2024-03-09 03:36:44'),
(204, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 03:38:47', '2024-03-09 03:38:47'),
(205, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 03:43:55', '2024-03-09 03:43:55'),
(206, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 03:46:03', '2024-03-09 03:46:03'),
(207, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 03:47:55', '2024-03-09 03:47:55'),
(208, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 03:54:11', '2024-03-09 03:54:11'),
(209, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 03:57:45', '2024-03-09 03:57:45'),
(210, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 04:05:34', '2024-03-09 04:05:34'),
(211, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 04:07:18', '2024-03-09 04:07:18'),
(212, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 04:08:47', '2024-03-09 04:08:47'),
(213, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 04:11:28', '2024-03-09 04:11:28'),
(214, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 04:14:17', '2024-03-09 04:14:17'),
(215, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 04:14:51', '2024-03-09 04:14:51'),
(216, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 04:15:14', '2024-03-09 04:15:14'),
(217, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 04:23:46', '2024-03-09 04:23:46'),
(218, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 04:25:29', '2024-03-09 04:25:29'),
(219, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 04:27:18', '2024-03-09 04:27:18'),
(220, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 04:28:33', '2024-03-09 04:28:33'),
(221, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 04:28:55', '2024-03-09 04:28:55'),
(222, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 04:29:05', '2024-03-09 04:29:05'),
(223, 41, 'Menambah Data User.', 'USER', '2024-03-09 04:33:26', '2024-03-09 04:33:26'),
(224, 41, 'Melihat Halaman Daftar User.', 'USER', '2024-03-09 04:33:26', '2024-03-09 04:33:26'),
(225, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-09 04:33:40', '2024-03-09 04:33:40'),
(226, 41, 'Menambah Data User.', 'USER', '2024-03-09 04:36:50', '2024-03-09 04:36:50'),
(227, 41, 'Melihat Halaman Daftar User.', 'USER', '2024-03-09 04:36:50', '2024-03-09 04:36:50'),
(228, 41, 'Melihat Halaman Daftar User.', 'USER', '2024-03-09 04:38:21', '2024-03-09 04:38:21'),
(229, 41, 'Melakukan Logout.', 'LOGOUT', '2024-03-09 04:38:41', '2024-03-09 04:38:41'),
(230, 61, 'Melakukan Login.', 'LOGIN', '2024-03-09 04:39:05', '2024-03-09 04:39:05'),
(231, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-09 04:39:05', '2024-03-09 04:39:05'),
(232, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-09 04:42:00', '2024-03-09 04:42:00'),
(233, 61, 'Melakukan Login.', 'LOGIN', '2024-03-09 11:57:55', '2024-03-09 11:57:55'),
(234, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-09 11:57:55', '2024-03-09 11:57:55'),
(235, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-09 12:00:37', '2024-03-09 12:00:37'),
(236, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-09 12:02:25', '2024-03-09 12:02:25'),
(237, 61, 'Melakukan Logout.', 'LOGOUT', '2024-03-09 12:25:49', '2024-03-09 12:25:49'),
(238, 41, 'Melakukan Login.', 'LOGIN', '2024-03-09 12:25:58', '2024-03-09 12:25:58'),
(239, 41, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-09 12:25:58', '2024-03-09 12:25:58'),
(240, 41, 'Melihat Halaman Daftar User.', 'USER', '2024-03-09 12:26:04', '2024-03-09 12:26:04'),
(241, 41, 'Melakukan Logout.', 'LOGOUT', '2024-03-09 12:26:27', '2024-03-09 12:26:27'),
(242, 57, 'Melakukan Login.', 'LOGIN', '2024-03-09 12:26:32', '2024-03-09 12:26:32'),
(243, 57, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-09 12:26:33', '2024-03-09 12:26:33'),
(244, 57, 'Menambah Data Monthly Report.', 'MONTHLY REPORT', '2024-03-09 12:27:37', '2024-03-09 12:27:37'),
(245, 57, 'Melihat Halaman Daftar Monthly Report.', 'MONTHLY REPORT', '2024-03-09 12:27:38', '2024-03-09 12:27:38'),
(246, 57, 'Melihat Halaman Detail Monthly Report.', 'MONTHLY REPORT', '2024-03-09 12:27:57', '2024-03-09 12:27:57'),
(247, 57, 'Melihat Halaman Form Edit Monthly Report.', 'MONTHLY REPORT', '2024-03-09 12:28:46', '2024-03-09 12:28:46'),
(248, 57, 'Melihat Halaman Daftar Monthly Report.', 'MONTHLY REPORT', '2024-03-09 12:28:51', '2024-03-09 12:28:51'),
(249, 57, 'Melihat Halaman Detail Monthly Report.', 'MONTHLY REPORT', '2024-03-09 12:28:55', '2024-03-09 12:28:55'),
(250, 57, 'Melihat Halaman Detail Monthly Report.', 'MONTHLY REPORT', '2024-03-09 12:39:05', '2024-03-09 12:39:05'),
(251, 57, 'Melihat Halaman Daftar Monthly Report.', 'MONTHLY REPORT', '2024-03-09 12:55:37', '2024-03-09 12:55:37'),
(252, 57, 'Melakukan Logout.', 'LOGOUT', '2024-03-09 12:55:42', '2024-03-09 12:55:42'),
(253, 61, 'Melakukan Login.', 'LOGIN', '2024-03-09 12:55:56', '2024-03-09 12:55:56'),
(254, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-09 12:55:56', '2024-03-09 12:55:56'),
(255, 61, 'Melakukan Login.', 'LOGIN', '2024-03-09 20:31:22', '2024-03-09 20:31:22'),
(256, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-09 20:31:23', '2024-03-09 20:31:23'),
(257, 61, 'Melihat Halaman Daftar Monthly Report.', 'MONTHLY REPORT', '2024-03-09 20:31:28', '2024-03-09 20:31:28'),
(258, 61, 'Melihat Halaman Form Tambah Monthly Report PCP.', 'Monthly Report PCP', '2024-03-09 20:32:15', '2024-03-09 20:32:15'),
(259, 61, 'Melihat Halaman Form Tambah Monthly Report PCP.', 'Monthly Report PCP', '2024-03-09 21:06:15', '2024-03-09 21:06:15'),
(260, 61, 'Melihat Halaman Form Tambah Monthly Report PCP.', 'Monthly Report PCP', '2024-03-09 21:06:38', '2024-03-09 21:06:38'),
(261, 61, 'Melihat Halaman Form Tambah Monthly Report PCP.', 'Monthly Report PCP', '2024-03-09 21:12:29', '2024-03-09 21:12:29'),
(262, 61, 'Menambah Data Monthly Report PCP.', 'Monthly Report PCP', '2024-03-09 21:12:47', '2024-03-09 21:12:47'),
(263, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-09 21:12:47', '2024-03-09 21:12:47'),
(264, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-09 21:13:17', '2024-03-09 21:13:17'),
(265, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-09 21:13:38', '2024-03-09 21:13:38'),
(266, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-09 21:14:01', '2024-03-09 21:14:01'),
(267, 61, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-09 21:14:06', '2024-03-09 21:14:06'),
(268, 61, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-09 21:14:46', '2024-03-09 21:14:46'),
(269, 61, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-09 21:15:42', '2024-03-09 21:15:42'),
(270, 61, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-09 21:15:59', '2024-03-09 21:15:59'),
(271, 61, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-09 21:16:50', '2024-03-09 21:16:50'),
(272, 61, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-09 21:17:27', '2024-03-09 21:17:27'),
(273, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-09 21:17:38', '2024-03-09 21:17:38'),
(274, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-09 21:28:47', '2024-03-09 21:28:47'),
(275, 61, 'Melihat Halaman Form Tambah Monthly Report PCP.', 'Monthly Report PCP', '2024-03-09 21:28:49', '2024-03-09 21:28:49'),
(276, 61, 'Menambah Data Monthly Report PCP.', 'Monthly Report PCP', '2024-03-09 21:29:02', '2024-03-09 21:29:02'),
(277, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-09 21:29:03', '2024-03-09 21:29:03'),
(278, 61, 'Melihat Halaman Form Tambah Monthly Report PCP.', 'Monthly Report PCP', '2024-03-09 21:29:44', '2024-03-09 21:29:44'),
(279, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-09 21:29:54', '2024-03-09 21:29:54'),
(280, 61, 'Menghapus Data Monthly Report PCP.', 'Monthly Report PCP', '2024-03-09 21:29:59', '2024-03-09 21:29:59'),
(281, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-09 21:29:59', '2024-03-09 21:29:59'),
(282, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-09 21:30:06', '2024-03-09 21:30:06'),
(283, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-09 21:30:49', '2024-03-09 21:30:49'),
(284, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-09 21:30:56', '2024-03-09 21:30:56'),
(285, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-09 21:31:40', '2024-03-09 21:31:40'),
(286, 57, 'Melakukan Login.', 'LOGIN', '2024-03-10 01:03:40', '2024-03-10 01:03:40'),
(287, 57, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-10 01:03:40', '2024-03-10 01:03:40'),
(288, 57, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-10 01:07:44', '2024-03-10 01:07:44'),
(289, 57, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-10 01:28:58', '2024-03-10 01:28:58'),
(290, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 01:35:45', '2024-03-10 01:35:45'),
(291, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 01:36:37', '2024-03-10 01:36:37'),
(292, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 01:37:23', '2024-03-10 01:37:23'),
(293, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 01:38:05', '2024-03-10 01:38:05'),
(294, 57, 'Melakukan Logout.', 'LOGOUT', '2024-03-10 01:38:18', '2024-03-10 01:38:18'),
(295, 61, 'Melakukan Login.', 'LOGIN', '2024-03-10 01:38:30', '2024-03-10 01:38:30'),
(296, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-10 01:38:31', '2024-03-10 01:38:31'),
(297, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 01:38:40', '2024-03-10 01:38:40'),
(298, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 01:41:42', '2024-03-10 01:41:42'),
(299, 61, 'Melihat Halaman Form Tambah Monthly Report PCP.', 'Monthly Report PCP', '2024-03-10 01:41:46', '2024-03-10 01:41:46'),
(300, 61, 'Menambah Data Monthly Report PCP.', 'Monthly Report PCP', '2024-03-10 01:41:59', '2024-03-10 01:41:59'),
(301, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 01:42:00', '2024-03-10 01:42:00'),
(302, 61, 'Melakukan Logout.', 'LOGOUT', '2024-03-10 01:42:09', '2024-03-10 01:42:09'),
(303, 57, 'Melakukan Login.', 'LOGIN', '2024-03-10 01:42:30', '2024-03-10 01:42:30'),
(304, 57, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-10 01:42:30', '2024-03-10 01:42:30'),
(305, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 01:42:35', '2024-03-10 01:42:35'),
(306, 57, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-10 01:42:43', '2024-03-10 01:42:43'),
(307, 57, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-10 01:43:37', '2024-03-10 01:43:37'),
(308, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 01:43:39', '2024-03-10 01:43:39'),
(309, 57, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-10 01:45:46', '2024-03-10 01:45:46'),
(310, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 01:45:55', '2024-03-10 01:45:55'),
(311, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 01:52:52', '2024-03-10 01:52:52'),
(312, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 01:53:36', '2024-03-10 01:53:36'),
(313, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 01:56:14', '2024-03-10 01:56:14'),
(314, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 01:56:42', '2024-03-10 01:56:42'),
(315, 57, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-10 02:07:33', '2024-03-10 02:07:33'),
(316, 57, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-10 02:11:06', '2024-03-10 02:11:06'),
(317, 57, 'Mengedit Data Monthly Report PCP.', 'Monthly Report PCP', '2024-03-10 02:11:34', '2024-03-10 02:11:34'),
(318, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 02:11:34', '2024-03-10 02:11:34'),
(319, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 02:14:07', '2024-03-10 02:14:07'),
(320, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 02:14:29', '2024-03-10 02:14:29'),
(321, 57, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-10 02:14:32', '2024-03-10 02:14:32'),
(322, 57, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-10 02:16:59', '2024-03-10 02:16:59'),
(323, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 02:37:11', '2024-03-10 02:37:11'),
(324, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 02:37:15', '2024-03-10 02:37:15'),
(325, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 02:37:51', '2024-03-10 02:37:51'),
(326, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 02:38:09', '2024-03-10 02:38:09'),
(327, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 02:38:44', '2024-03-10 02:38:44'),
(328, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 02:40:08', '2024-03-10 02:40:08'),
(329, 57, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-10 02:40:13', '2024-03-10 02:40:13'),
(330, 57, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-10 02:41:11', '2024-03-10 02:41:11'),
(331, 57, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-10 03:02:39', '2024-03-10 03:02:39'),
(332, 57, 'Mengedit Data Monthly Report PCP.', 'Monthly Report PCP', '2024-03-10 03:04:24', '2024-03-10 03:04:24'),
(333, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 03:04:25', '2024-03-10 03:04:25'),
(334, 57, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-10 03:04:32', '2024-03-10 03:04:32'),
(335, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 03:05:08', '2024-03-10 03:05:08'),
(336, 57, 'Melakukan Logout.', 'LOGOUT', '2024-03-10 03:05:14', '2024-03-10 03:05:14'),
(337, 61, 'Melakukan Login.', 'LOGIN', '2024-03-10 03:05:32', '2024-03-10 03:05:32'),
(338, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-10 03:05:33', '2024-03-10 03:05:33'),
(339, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 03:05:41', '2024-03-10 03:05:41'),
(340, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 03:06:19', '2024-03-10 03:06:19'),
(341, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-10 03:06:29', '2024-03-10 03:06:29'),
(342, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 03:06:35', '2024-03-10 03:06:35'),
(343, 61, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-10 03:06:38', '2024-03-10 03:06:38'),
(344, 61, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-10 03:07:56', '2024-03-10 03:07:56'),
(345, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 03:08:18', '2024-03-10 03:08:18'),
(346, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-10 03:08:23', '2024-03-10 03:08:23'),
(347, 61, 'Mengedit Data Monthly Report PCP.', 'Monthly Report PCP', '2024-03-10 03:08:33', '2024-03-10 03:08:33'),
(348, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 03:08:33', '2024-03-10 03:08:33'),
(349, 61, 'Melakukan Logout.', 'LOGOUT', '2024-03-10 03:08:42', '2024-03-10 03:08:42'),
(350, 61, 'Melakukan Login.', 'LOGIN', '2024-03-10 03:08:49', '2024-03-10 03:08:49'),
(351, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-10 03:08:49', '2024-03-10 03:08:49'),
(352, 61, 'Melakukan Logout.', 'LOGOUT', '2024-03-10 03:08:59', '2024-03-10 03:08:59'),
(353, 57, 'Melakukan Login.', 'LOGIN', '2024-03-10 03:09:06', '2024-03-10 03:09:06'),
(354, 57, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-10 03:09:06', '2024-03-10 03:09:06'),
(355, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 03:09:14', '2024-03-10 03:09:14'),
(356, 57, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-10 03:09:19', '2024-03-10 03:09:19'),
(357, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 03:09:23', '2024-03-10 03:09:23'),
(358, 57, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-10 03:09:26', '2024-03-10 03:09:26'),
(359, 57, 'Mengedit Data Monthly Report PCP.', 'Monthly Report PCP', '2024-03-10 03:09:34', '2024-03-10 03:09:34'),
(360, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 03:09:34', '2024-03-10 03:09:34'),
(361, 57, 'Melakukan Logout.', 'LOGOUT', '2024-03-10 03:09:38', '2024-03-10 03:09:38'),
(362, 61, 'Melakukan Login.', 'LOGIN', '2024-03-10 03:09:45', '2024-03-10 03:09:45'),
(363, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-10 03:09:46', '2024-03-10 03:09:46'),
(364, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 03:09:50', '2024-03-10 03:09:50'),
(365, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-10 03:09:53', '2024-03-10 03:09:53'),
(366, 61, 'Mengedit Data Monthly Report PCP.', 'Monthly Report PCP', '2024-03-10 03:09:58', '2024-03-10 03:09:58'),
(367, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 03:09:59', '2024-03-10 03:09:59'),
(368, 61, 'Melakukan Logout.', 'LOGOUT', '2024-03-10 03:10:08', '2024-03-10 03:10:08'),
(369, 57, 'Melakukan Login.', 'LOGIN', '2024-03-10 03:10:15', '2024-03-10 03:10:15'),
(370, 57, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-10 03:10:15', '2024-03-10 03:10:15'),
(371, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 03:10:20', '2024-03-10 03:10:20'),
(372, 57, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-10 03:10:25', '2024-03-10 03:10:25'),
(373, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 04:01:47', '2024-03-10 04:01:47'),
(374, 57, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-10 04:01:51', '2024-03-10 04:01:51'),
(375, 57, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-10 04:03:01', '2024-03-10 04:03:01'),
(376, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 04:03:08', '2024-03-10 04:03:08'),
(377, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 04:03:22', '2024-03-10 04:03:22'),
(378, 57, 'Melakukan Logout.', 'LOGOUT', '2024-03-10 04:03:27', '2024-03-10 04:03:27'),
(379, 61, 'Melakukan Login.', 'LOGIN', '2024-03-10 04:03:39', '2024-03-10 04:03:39'),
(380, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-10 04:03:39', '2024-03-10 04:03:39'),
(381, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 04:03:43', '2024-03-10 04:03:43'),
(382, 61, 'Melihat Halaman Form Tambah Monthly Report PCP.', 'Monthly Report PCP', '2024-03-10 04:03:47', '2024-03-10 04:03:47'),
(383, 61, 'Melihat Halaman Form Tambah Monthly Report PCP.', 'Monthly Report PCP', '2024-03-10 04:06:51', '2024-03-10 04:06:51'),
(384, 61, 'Menambah Data Monthly Report PCP.', 'Monthly Report PCP', '2024-03-10 04:07:03', '2024-03-10 04:07:03'),
(385, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 04:07:04', '2024-03-10 04:07:04'),
(386, 61, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-10 04:07:14', '2024-03-10 04:07:14'),
(387, 61, 'Melakukan Logout.', 'LOGOUT', '2024-03-10 04:07:22', '2024-03-10 04:07:22'),
(388, 57, 'Melakukan Login.', 'LOGIN', '2024-03-10 04:07:31', '2024-03-10 04:07:31'),
(389, 57, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-10 04:07:31', '2024-03-10 04:07:31'),
(390, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 04:07:37', '2024-03-10 04:07:37'),
(391, 57, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-10 04:07:41', '2024-03-10 04:07:41'),
(392, 57, 'Mengedit Data Monthly Report PCP.', 'Monthly Report PCP', '2024-03-10 04:08:28', '2024-03-10 04:08:28'),
(393, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 04:08:28', '2024-03-10 04:08:28'),
(394, 57, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-10 04:08:38', '2024-03-10 04:08:38'),
(395, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 04:08:46', '2024-03-10 04:08:46'),
(396, 57, 'Melakukan Logout.', 'LOGOUT', '2024-03-10 04:08:53', '2024-03-10 04:08:53'),
(397, 61, 'Melakukan Login.', 'LOGIN', '2024-03-10 04:09:01', '2024-03-10 04:09:01'),
(398, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-10 04:09:02', '2024-03-10 04:09:02'),
(399, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 04:09:14', '2024-03-10 04:09:14'),
(400, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-10 04:09:18', '2024-03-10 04:09:18'),
(401, 61, 'Mengedit Data Monthly Report PCP.', 'Monthly Report PCP', '2024-03-10 04:09:27', '2024-03-10 04:09:27'),
(402, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 04:09:27', '2024-03-10 04:09:27'),
(403, 61, 'Melakukan Logout.', 'LOGOUT', '2024-03-10 04:09:32', '2024-03-10 04:09:32'),
(404, 57, 'Melakukan Login.', 'LOGIN', '2024-03-10 04:09:41', '2024-03-10 04:09:41'),
(405, 57, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-10 04:09:42', '2024-03-10 04:09:42'),
(406, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 04:09:47', '2024-03-10 04:09:47'),
(407, 57, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-10 04:09:50', '2024-03-10 04:09:50'),
(408, 57, 'Mengedit Data Monthly Report PCP.', 'Monthly Report PCP', '2024-03-10 04:09:57', '2024-03-10 04:09:57'),
(409, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 04:09:57', '2024-03-10 04:09:57'),
(410, 57, 'Melakukan Logout.', 'LOGOUT', '2024-03-10 04:10:01', '2024-03-10 04:10:01'),
(411, 61, 'Melakukan Login.', 'LOGIN', '2024-03-10 04:10:11', '2024-03-10 04:10:11'),
(412, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-10 04:10:11', '2024-03-10 04:10:11'),
(413, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 04:10:15', '2024-03-10 04:10:15'),
(414, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-10 04:10:19', '2024-03-10 04:10:19'),
(415, 61, 'Mengedit Data Monthly Report PCP.', 'Monthly Report PCP', '2024-03-10 04:10:25', '2024-03-10 04:10:25'),
(416, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 04:10:26', '2024-03-10 04:10:26'),
(417, 61, 'Melakukan Logout.', 'LOGOUT', '2024-03-10 04:10:30', '2024-03-10 04:10:30'),
(418, 57, 'Melakukan Login.', 'LOGIN', '2024-03-10 04:10:38', '2024-03-10 04:10:38'),
(419, 57, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-10 04:10:38', '2024-03-10 04:10:38'),
(420, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-10 04:10:41', '2024-03-10 04:10:41'),
(421, 57, 'Melakukan Logout.', 'LOGOUT', '2024-03-10 05:46:52', '2024-03-10 05:46:52'),
(422, 61, 'Melakukan Login.', 'LOGIN', '2024-03-10 05:47:00', '2024-03-10 05:47:00'),
(423, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-10 05:47:01', '2024-03-10 05:47:01'),
(424, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-10 05:47:13', '2024-03-10 05:47:13'),
(425, 61, 'Melihat Halaman Form Tambah Task PCP.', 'Task PCP', '2024-03-10 05:47:17', '2024-03-10 05:47:17'),
(426, 61, 'Melihat Halaman Form Tambah Task PCP.', 'Task PCP', '2024-03-10 05:50:14', '2024-03-10 05:50:14'),
(427, 61, 'Melihat Halaman Form Tambah Task PCP.', 'Task PCP', '2024-03-10 05:51:00', '2024-03-10 05:51:00'),
(428, 61, 'Menambah Data Task PCP.', 'Task PCP', '2024-03-10 05:55:09', '2024-03-10 05:55:09'),
(429, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-10 05:55:09', '2024-03-10 05:55:09'),
(430, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-10 05:57:05', '2024-03-10 05:57:05'),
(431, 61, 'Melihat Halaman Detail Task PCP.', 'Task PCP', '2024-03-10 05:57:12', '2024-03-10 05:57:12'),
(432, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-10 05:57:21', '2024-03-10 05:57:21'),
(433, 61, 'Melihat Halaman Form Edit Task PCP.', 'Task PCP', '2024-03-10 05:57:26', '2024-03-10 05:57:26'),
(434, 61, 'Mengedit Data Task PCP.', 'Task PCP', '2024-03-10 05:58:17', '2024-03-10 05:58:17'),
(435, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-10 05:58:18', '2024-03-10 05:58:18'),
(436, 61, 'Melihat Halaman Detail Task PCP.', 'Task PCP', '2024-03-10 05:58:21', '2024-03-10 05:58:21'),
(437, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-10 05:58:25', '2024-03-10 05:58:25'),
(438, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-10 06:29:58', '2024-03-10 06:29:58'),
(439, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-10 06:32:16', '2024-03-10 06:32:16'),
(440, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 06:32:20', '2024-03-10 06:32:20'),
(441, 61, 'Melihat Halaman Form Tambah Agenda.', 'Agenda', '2024-03-10 06:32:23', '2024-03-10 06:32:23'),
(442, 61, 'Menambah Data Agenda.', 'Agenda', '2024-03-10 06:32:50', '2024-03-10 06:32:50'),
(443, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 06:32:50', '2024-03-10 06:32:50'),
(444, 61, 'Melihat Halaman Detail Agenda.', 'Agenda', '2024-03-10 06:32:59', '2024-03-10 06:32:59'),
(445, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 06:33:06', '2024-03-10 06:33:06'),
(446, 61, 'Melihat Halaman Form Edit Agenda.', 'Agenda', '2024-03-10 06:34:28', '2024-03-10 06:34:28'),
(447, 61, 'Mengedit Data Agenda.', 'Agenda', '2024-03-10 06:34:46', '2024-03-10 06:34:46'),
(448, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 06:34:47', '2024-03-10 06:34:47'),
(449, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 06:35:03', '2024-03-10 06:35:03'),
(450, 61, 'Menghapus Data Agenda.', 'Agenda', '2024-03-10 06:35:12', '2024-03-10 06:35:12'),
(451, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 06:35:12', '2024-03-10 06:35:12'),
(452, 61, 'Melihat Halaman Form Tambah Agenda.', 'Agenda', '2024-03-10 06:35:15', '2024-03-10 06:35:15'),
(453, 61, 'Menambah Data Agenda.', 'Agenda', '2024-03-10 06:35:35', '2024-03-10 06:35:35'),
(454, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 06:35:35', '2024-03-10 06:35:35'),
(455, 61, 'Melihat Halaman Form Tambah Agenda.', 'Agenda', '2024-03-10 06:35:55', '2024-03-10 06:35:55'),
(456, 61, 'Melihat Halaman Form Tambah Agenda.', 'Agenda', '2024-03-10 06:37:14', '2024-03-10 06:37:14'),
(457, 61, 'Melihat Halaman Form Tambah Agenda.', 'Agenda', '2024-03-10 06:37:31', '2024-03-10 06:37:31'),
(458, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 06:40:20', '2024-03-10 06:40:20'),
(459, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 06:43:51', '2024-03-10 06:43:51'),
(460, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 06:44:23', '2024-03-10 06:44:23'),
(461, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 07:14:14', '2024-03-10 07:14:14'),
(462, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 07:33:19', '2024-03-10 07:33:19'),
(463, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 07:34:38', '2024-03-10 07:34:38'),
(464, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 07:34:44', '2024-03-10 07:34:44'),
(465, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-10 07:35:05', '2024-03-10 07:35:05'),
(466, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 07:35:13', '2024-03-10 07:35:13'),
(467, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 07:35:18', '2024-03-10 07:35:18'),
(468, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 07:36:23', '2024-03-10 07:36:23'),
(469, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 07:37:32', '2024-03-10 07:37:32'),
(470, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 07:38:38', '2024-03-10 07:38:38'),
(471, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 07:39:02', '2024-03-10 07:39:02'),
(472, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 07:39:19', '2024-03-10 07:39:19'),
(473, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-10 07:39:24', '2024-03-10 07:39:24'),
(474, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 07:39:28', '2024-03-10 07:39:28'),
(475, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 07:39:31', '2024-03-10 07:39:31'),
(476, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 07:40:28', '2024-03-10 07:40:28'),
(477, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 07:42:50', '2024-03-10 07:42:50'),
(478, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 07:43:23', '2024-03-10 07:43:23'),
(479, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 07:43:54', '2024-03-10 07:43:54'),
(480, 61, 'Melihat Halaman Form Tambah Agenda.', 'Agenda', '2024-03-10 07:43:58', '2024-03-10 07:43:58'),
(481, 61, 'Menambah Data Agenda.', 'Agenda', '2024-03-10 07:44:19', '2024-03-10 07:44:19'),
(482, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 07:44:20', '2024-03-10 07:44:20'),
(483, 61, 'Melihat Halaman Form Tambah Agenda.', 'Agenda', '2024-03-10 07:44:24', '2024-03-10 07:44:24'),
(484, 61, 'Menambah Data Agenda.', 'Agenda', '2024-03-10 07:44:42', '2024-03-10 07:44:42'),
(485, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 07:44:42', '2024-03-10 07:44:42'),
(486, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 07:45:05', '2024-03-10 07:45:05'),
(487, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 07:46:25', '2024-03-10 07:46:25'),
(488, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 07:47:52', '2024-03-10 07:47:52'),
(489, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 07:50:20', '2024-03-10 07:50:20'),
(490, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 07:56:30', '2024-03-10 07:56:30'),
(491, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 07:57:29', '2024-03-10 07:57:29');
INSERT INTO `log` (`id_log`, `id_user`, `activity`, `feature`, `created_at`, `updated_at`) VALUES
(492, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 07:59:49', '2024-03-10 07:59:49'),
(493, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 08:01:52', '2024-03-10 08:01:52'),
(494, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 08:02:12', '2024-03-10 08:02:12'),
(495, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 08:02:27', '2024-03-10 08:02:27'),
(496, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 08:07:35', '2024-03-10 08:07:35'),
(497, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 08:08:28', '2024-03-10 08:08:28'),
(498, 61, 'Melakukan Login.', 'LOGIN', '2024-03-10 11:05:40', '2024-03-10 11:05:40'),
(499, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-10 11:05:40', '2024-03-10 11:05:40'),
(500, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 11:05:48', '2024-03-10 11:05:48'),
(501, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 11:06:52', '2024-03-10 11:06:52'),
(502, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 11:07:50', '2024-03-10 11:07:50'),
(503, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 11:08:15', '2024-03-10 11:08:15'),
(504, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 11:09:07', '2024-03-10 11:09:07'),
(505, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 11:10:30', '2024-03-10 11:10:30'),
(506, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 11:11:19', '2024-03-10 11:11:19'),
(507, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 11:14:48', '2024-03-10 11:14:48'),
(508, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 11:17:39', '2024-03-10 11:17:39'),
(509, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 11:26:08', '2024-03-10 11:26:08'),
(510, 61, 'Melakukan Logout.', 'LOGOUT', '2024-03-10 11:26:22', '2024-03-10 11:26:22'),
(511, 57, 'Melakukan Login.', 'LOGIN', '2024-03-10 11:26:40', '2024-03-10 11:26:40'),
(512, 57, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-10 11:26:41', '2024-03-10 11:26:41'),
(513, 57, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 11:26:46', '2024-03-10 11:26:46'),
(514, 57, 'Melakukan Logout.', 'LOGOUT', '2024-03-10 11:26:54', '2024-03-10 11:26:54'),
(515, 1, 'Melakukan Login.', 'LOGIN', '2024-03-10 11:27:06', '2024-03-10 11:27:06'),
(516, 1, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-10 11:27:06', '2024-03-10 11:27:06'),
(517, 1, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-10 11:27:14', '2024-03-10 11:27:14'),
(518, 1, 'Menambah Data User.', 'USER', '2024-03-10 11:28:18', '2024-03-10 11:28:18'),
(519, 1, 'Melihat Halaman Daftar User.', 'USER', '2024-03-10 11:28:18', '2024-03-10 11:28:18'),
(520, 1, 'Melakukan Logout.', 'LOGOUT', '2024-03-10 11:28:25', '2024-03-10 11:28:25'),
(521, 63, 'Melakukan Login.', 'LOGIN', '2024-03-10 11:28:34', '2024-03-10 11:28:34'),
(522, 63, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-10 11:28:34', '2024-03-10 11:28:34'),
(523, 63, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 11:28:39', '2024-03-10 11:28:39'),
(524, 63, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-10 11:28:44', '2024-03-10 11:28:44'),
(525, 60, 'Melakukan Login.', 'LOGIN', '2024-03-16 13:00:44', '2024-03-16 13:00:44'),
(526, 60, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-16 13:00:45', '2024-03-16 13:00:45'),
(527, 60, 'Melakukan Logout.', 'LOGOUT', '2024-03-16 13:00:53', '2024-03-16 13:00:53'),
(528, 41, 'Melakukan Login.', 'LOGIN', '2024-03-16 13:01:12', '2024-03-16 13:01:12'),
(529, 41, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-16 13:01:13', '2024-03-16 13:01:13'),
(530, 41, 'Melihat Halaman Monitoring RKP.', 'RKP', '2024-03-16 13:01:45', '2024-03-16 13:01:45'),
(531, 41, 'Melakukan Logout.', 'LOGOUT', '2024-03-16 13:03:20', '2024-03-16 13:03:20'),
(532, 1, 'Melakukan Login.', 'LOGIN', '2024-03-16 13:03:26', '2024-03-16 13:03:26'),
(533, 1, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-16 13:03:27', '2024-03-16 13:03:27'),
(534, 1, 'Melakukan Logout.', 'LOGOUT', '2024-03-16 13:03:36', '2024-03-16 13:03:36'),
(535, 41, 'Melakukan Login.', 'LOGIN', '2024-03-16 13:03:42', '2024-03-16 13:03:42'),
(536, 41, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-16 13:03:43', '2024-03-16 13:03:43'),
(537, 41, 'Melihat Halaman Daftar User.', 'USER', '2024-03-16 13:03:48', '2024-03-16 13:03:48'),
(538, 41, 'Melakukan Logout.', 'LOGOUT', '2024-03-16 13:04:06', '2024-03-16 13:04:06'),
(539, 53, 'Melakukan Login.', 'LOGIN', '2024-03-16 13:04:12', '2024-03-16 13:04:12'),
(540, 53, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-16 13:04:13', '2024-03-16 13:04:13'),
(541, 53, 'Melihat Halaman Update RKP.', 'RKP', '2024-03-16 13:04:26', '2024-03-16 13:04:26'),
(542, 53, 'Melihat Halaman Update RKP.', 'RKP', '2024-03-16 13:06:18', '2024-03-16 13:06:18'),
(543, 53, 'Melakukan Logout.', 'LOGOUT', '2024-03-16 13:30:50', '2024-03-16 13:30:50'),
(544, 61, 'Melakukan Login.', 'LOGIN', '2024-03-16 13:30:57', '2024-03-16 13:30:57'),
(545, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-16 13:30:58', '2024-03-16 13:30:58'),
(546, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-16 13:32:54', '2024-03-16 13:32:54'),
(547, 61, 'Melakukan Logout.', 'LOGOUT', '2024-03-16 13:33:07', '2024-03-16 13:33:07'),
(548, 57, 'Melakukan Login.', 'LOGIN', '2024-03-16 13:33:33', '2024-03-16 13:33:33'),
(549, 57, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-16 13:33:33', '2024-03-16 13:33:33'),
(550, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-16 13:33:39', '2024-03-16 13:33:39'),
(551, 57, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-16 15:13:41', '2024-03-16 15:13:41'),
(552, 61, 'Melakukan Login.', 'LOGIN', '2024-03-19 16:11:49', '2024-03-19 16:11:49'),
(553, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-19 16:11:50', '2024-03-19 16:11:50'),
(554, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-19 16:42:05', '2024-03-19 16:42:05'),
(555, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-19 16:44:58', '2024-03-19 16:44:58'),
(556, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-19 17:06:58', '2024-03-19 17:06:58'),
(557, 63, 'Melakukan Login.', 'LOGIN', '2024-03-23 07:50:15', '2024-03-23 07:50:15'),
(558, 63, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-23 07:50:16', '2024-03-23 07:50:16'),
(559, 63, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-23 07:50:25', '2024-03-23 07:50:25'),
(560, 63, 'Melakukan Logout.', 'LOGOUT', '2024-03-23 07:50:34', '2024-03-23 07:50:34'),
(561, 61, 'Melakukan Login.', 'LOGIN', '2024-03-23 07:50:47', '2024-03-23 07:50:47'),
(562, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-23 07:50:47', '2024-03-23 07:50:47'),
(563, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-23 07:51:02', '2024-03-23 07:51:02'),
(564, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 07:51:06', '2024-03-23 07:51:06'),
(565, 61, 'Melihat Halaman Form Tambah Task PCP.', 'Task PCP', '2024-03-23 07:56:34', '2024-03-23 07:56:34'),
(566, 61, 'Melihat Halaman Form Tambah Task PCP.', 'Task PCP', '2024-03-23 07:57:34', '2024-03-23 07:57:34'),
(567, 61, 'Melihat Halaman Form Tambah Task PCP.', 'Task PCP', '2024-03-23 07:59:00', '2024-03-23 07:59:00'),
(568, 61, 'Melihat Halaman Form Tambah Task PCP.', 'Task PCP', '2024-03-23 08:00:50', '2024-03-23 08:00:50'),
(569, 61, 'Melihat Halaman Form Tambah Task PCP.', 'Task PCP', '2024-03-23 08:01:15', '2024-03-23 08:01:15'),
(570, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 08:03:44', '2024-03-23 08:03:44'),
(571, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 08:14:13', '2024-03-23 08:14:13'),
(572, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 08:35:10', '2024-03-23 08:35:10'),
(573, 61, 'Melihat Halaman Form Tambah Task PCP.', 'Task PCP', '2024-03-23 08:36:30', '2024-03-23 08:36:30'),
(574, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 08:36:33', '2024-03-23 08:36:33'),
(575, 61, 'Melihat Halaman Form Tambah Monthly Report PCP.', 'Monthly Report PCP', '2024-03-23 08:36:36', '2024-03-23 08:36:36'),
(576, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 08:36:43', '2024-03-23 08:36:43'),
(577, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-03-23 08:47:45', '2024-03-23 08:47:45'),
(578, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-03-23 08:48:06', '2024-03-23 08:48:06'),
(579, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-03-23 08:48:40', '2024-03-23 08:48:40'),
(580, 61, 'Menambah Data PIC Tujuan Task PCP.', 'Task PCP', '2024-03-23 08:48:54', '2024-03-23 08:48:54'),
(581, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-03-23 08:48:55', '2024-03-23 08:48:55'),
(582, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-03-23 08:49:32', '2024-03-23 08:49:32'),
(583, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-03-23 08:51:26', '2024-03-23 08:51:26'),
(584, 61, 'Menghapus Data PIC Tujuan Task PCP.', 'Task PCP', '2024-03-23 08:51:31', '2024-03-23 08:51:31'),
(585, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-03-23 08:51:31', '2024-03-23 08:51:31'),
(586, 61, 'Menambah Data PIC Tujuan Task PCP.', 'Task PCP', '2024-03-23 08:51:47', '2024-03-23 08:51:47'),
(587, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-03-23 08:51:47', '2024-03-23 08:51:47'),
(588, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-03-23 08:57:33', '2024-03-23 08:57:33'),
(589, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 08:57:35', '2024-03-23 08:57:35'),
(590, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-03-23 08:57:42', '2024-03-23 08:57:42'),
(591, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 08:57:45', '2024-03-23 08:57:45'),
(592, 61, 'Melihat Halaman PIC Divisi Task PCP.', 'Task PCP', '2024-03-23 08:59:18', '2024-03-23 08:59:18'),
(593, 61, 'Menambah Data PIC Tujuan Task PCP.', 'Task PCP', '2024-03-23 08:59:25', '2024-03-23 08:59:25'),
(594, 61, 'Melihat Halaman PIC Divisi Task PCP.', 'Task PCP', '2024-03-23 08:59:25', '2024-03-23 08:59:25'),
(595, 61, 'Menambah Data PIC Tujuan Task PCP.', 'Task PCP', '2024-03-23 09:00:04', '2024-03-23 09:00:04'),
(596, 61, 'Melihat Halaman PIC Divisi Task PCP.', 'Task PCP', '2024-03-23 09:00:04', '2024-03-23 09:00:04'),
(597, 61, 'Menambah Data PIC Tujuan Task PCP.', 'Task PCP', '2024-03-23 09:00:55', '2024-03-23 09:00:55'),
(598, 61, 'Melihat Halaman PIC Divisi Task PCP.', 'Task PCP', '2024-03-23 09:00:56', '2024-03-23 09:00:56'),
(599, 61, 'Melihat Halaman PIC Divisi Task PCP.', 'Task PCP', '2024-03-23 09:03:02', '2024-03-23 09:03:02'),
(600, 61, 'Menambah Data PIC Divisi Task PCP.', 'Task PCP', '2024-03-23 09:03:17', '2024-03-23 09:03:17'),
(601, 61, 'Melihat Halaman PIC Divisi Task PCP.', 'Task PCP', '2024-03-23 09:03:18', '2024-03-23 09:03:18'),
(602, 61, 'Melihat Halaman PIC Divisi Task PCP.', 'Task PCP', '2024-03-23 09:03:40', '2024-03-23 09:03:40'),
(603, 61, 'Melihat Halaman PIC Divisi Task PCP.', 'Task PCP', '2024-03-23 09:04:54', '2024-03-23 09:04:54'),
(604, 61, 'Menghapus Data PIC Divisi Task PCP.', 'Task PCP', '2024-03-23 09:05:17', '2024-03-23 09:05:17'),
(605, 61, 'Melihat Halaman PIC Divisi Task PCP.', 'Task PCP', '2024-03-23 09:05:18', '2024-03-23 09:05:18'),
(606, 61, 'Menambah Data PIC Divisi Task PCP.', 'Task PCP', '2024-03-23 09:05:26', '2024-03-23 09:05:26'),
(607, 61, 'Melihat Halaman PIC Divisi Task PCP.', 'Task PCP', '2024-03-23 09:05:26', '2024-03-23 09:05:26'),
(608, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 09:05:29', '2024-03-23 09:05:29'),
(609, 61, 'Menghapus Data Task PCP.', 'Task PCP', '2024-03-23 09:05:35', '2024-03-23 09:05:35'),
(610, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 09:05:35', '2024-03-23 09:05:35'),
(611, 61, 'Melihat Halaman Form Tambah Task PCP.', 'Task PCP', '2024-03-23 09:41:51', '2024-03-23 09:41:51'),
(612, 61, 'Melihat Halaman Form Tambah Monthly Report PCP.', 'Monthly Report PCP', '2024-03-23 09:41:56', '2024-03-23 09:41:56'),
(613, 61, 'Melakukan Logout.', 'LOGOUT', '2024-03-23 09:42:08', '2024-03-23 09:42:08'),
(614, 1, 'Melakukan Login.', 'LOGIN', '2024-03-23 09:42:26', '2024-03-23 09:42:26'),
(615, 1, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-23 09:42:26', '2024-03-23 09:42:26'),
(616, 1, 'Melihat Halaman Form Tambah User.', 'USER', '2024-03-23 09:42:34', '2024-03-23 09:42:34'),
(617, 1, 'Menambah Data User.', 'USER', '2024-03-23 09:43:51', '2024-03-23 09:43:51'),
(618, 1, 'Melihat Halaman Daftar User.', 'USER', '2024-03-23 09:43:52', '2024-03-23 09:43:52'),
(619, 1, 'Melihat Halaman Daftar Proyek.', 'PROYEK', '2024-03-23 09:43:58', '2024-03-23 09:43:58'),
(620, 1, 'Melihat Halaman Daftar Tim Proyek.', 'TIM PROYEK', '2024-03-23 09:44:12', '2024-03-23 09:44:12'),
(621, 1, 'Melihat Halaman Form Edit Tim Proyek.', 'TIM PROYEK', '2024-03-23 09:44:25', '2024-03-23 09:44:25'),
(622, 1, 'Melihat Halaman Daftar Tim Proyek.', 'TIM PROYEK', '2024-03-23 09:44:34', '2024-03-23 09:44:34'),
(623, 1, 'Melihat Halaman Form Tambah Tim Proyek.', 'TIM PROYEK', '2024-03-23 09:44:43', '2024-03-23 09:44:43'),
(624, 1, 'Melihat Halaman Daftar Proyek.', 'PROYEK', '2024-03-23 09:44:51', '2024-03-23 09:44:51'),
(625, 1, 'Melihat Halaman Daftar User.', 'USER', '2024-03-23 09:45:06', '2024-03-23 09:45:06'),
(626, 1, 'Melihat Halaman Daftar Tim Proyek.', 'TIM PROYEK', '2024-03-23 09:45:14', '2024-03-23 09:45:14'),
(627, 1, 'Melihat Halaman Form Edit Tim Proyek.', 'TIM PROYEK', '2024-03-23 09:45:37', '2024-03-23 09:45:37'),
(628, 1, 'Melihat Halaman Form Edit Tim Proyek.', 'TIM PROYEK', '2024-03-23 09:47:18', '2024-03-23 09:47:18'),
(629, 1, 'Menambah Data Detail Tim Proyek.', 'DETAIL TIM PROYEK', '2024-03-23 09:47:36', '2024-03-23 09:47:36'),
(630, 1, 'Melihat Halaman Form Edit Tim Proyek.', 'TIM PROYEK', '2024-03-23 09:47:37', '2024-03-23 09:47:37'),
(631, 1, 'Melakukan Logout.', 'LOGOUT', '2024-03-23 09:47:44', '2024-03-23 09:47:44'),
(632, 61, 'Melakukan Login.', 'LOGIN', '2024-03-23 09:47:52', '2024-03-23 09:47:52'),
(633, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-23 09:47:52', '2024-03-23 09:47:52'),
(634, 61, 'Melihat Halaman Form Tambah Monthly Report PCP.', 'Monthly Report PCP', '2024-03-23 09:51:22', '2024-03-23 09:51:22'),
(635, 61, 'Menambah Data Monthly Report PCP.', 'Monthly Report PCP', '2024-03-23 09:51:34', '2024-03-23 09:51:34'),
(636, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-23 09:51:35', '2024-03-23 09:51:35'),
(637, 61, 'Melakukan Logout.', 'LOGOUT', '2024-03-23 09:51:40', '2024-03-23 09:51:40'),
(638, 61, 'Melakukan Login.', 'LOGIN', '2024-03-23 09:51:55', '2024-03-23 09:51:55'),
(639, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-23 09:51:55', '2024-03-23 09:51:55'),
(640, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-23 09:52:00', '2024-03-23 09:52:00'),
(641, 61, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-23 09:52:04', '2024-03-23 09:52:04'),
(642, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-23 09:52:12', '2024-03-23 09:52:12'),
(643, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-23 09:52:16', '2024-03-23 09:52:16'),
(644, 61, 'Melakukan Logout.', 'LOGOUT', '2024-03-23 09:54:40', '2024-03-23 09:54:40'),
(645, 64, 'Melakukan Login.', 'LOGIN', '2024-03-23 09:55:17', '2024-03-23 09:55:17'),
(646, 64, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-23 09:55:18', '2024-03-23 09:55:18'),
(647, 64, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-23 09:55:26', '2024-03-23 09:55:26'),
(648, 64, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-23 09:55:31', '2024-03-23 09:55:31'),
(649, 64, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-23 10:20:18', '2024-03-23 10:20:18'),
(650, 64, 'Mengedit Data Monthly Report PCP.', 'Monthly Report PCP', '2024-03-23 10:47:55', '2024-03-23 10:47:55'),
(651, 64, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-23 10:47:56', '2024-03-23 10:47:56'),
(652, 64, 'Melakukan Logout.', 'LOGOUT', '2024-03-23 10:48:03', '2024-03-23 10:48:03'),
(653, 64, 'Melakukan Login.', 'LOGIN', '2024-03-23 10:48:16', '2024-03-23 10:48:16'),
(654, 64, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-23 10:48:17', '2024-03-23 10:48:17'),
(655, 64, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-23 10:48:23', '2024-03-23 10:48:23'),
(656, 64, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-23 10:48:28', '2024-03-23 10:48:28'),
(657, 64, 'Melakukan Logout.', 'LOGOUT', '2024-03-23 10:48:59', '2024-03-23 10:48:59'),
(658, 61, 'Melakukan Login.', 'LOGIN', '2024-03-23 10:49:07', '2024-03-23 10:49:07'),
(659, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-23 10:49:07', '2024-03-23 10:49:07'),
(660, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-23 10:49:12', '2024-03-23 10:49:12'),
(661, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-23 10:49:16', '2024-03-23 10:49:16'),
(662, 61, 'Mengedit Data Monthly Report PCP.', 'Monthly Report PCP', '2024-03-23 10:50:07', '2024-03-23 10:50:07'),
(663, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-23 10:50:08', '2024-03-23 10:50:08'),
(664, 61, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-23 10:50:14', '2024-03-23 10:50:14'),
(665, 61, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-23 10:59:30', '2024-03-23 10:59:30'),
(666, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-23 10:59:50', '2024-03-23 10:59:50'),
(667, 61, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-23 10:59:54', '2024-03-23 10:59:54'),
(668, 61, 'Melakukan Logout.', 'LOGOUT', '2024-03-23 11:00:00', '2024-03-23 11:00:00'),
(669, 64, 'Melakukan Login.', 'LOGIN', '2024-03-23 11:00:12', '2024-03-23 11:00:12'),
(670, 64, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-23 11:00:12', '2024-03-23 11:00:12'),
(671, 64, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-23 11:00:16', '2024-03-23 11:00:16'),
(672, 64, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-23 11:00:19', '2024-03-23 11:00:19'),
(673, 64, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-23 11:03:21', '2024-03-23 11:03:21'),
(674, 64, 'Melakukan Login.', 'LOGIN', '2024-03-23 21:20:51', '2024-03-23 21:20:51'),
(675, 64, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-23 21:20:52', '2024-03-23 21:20:52'),
(676, 64, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-23 21:21:13', '2024-03-23 21:21:13'),
(677, 64, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-23 21:21:54', '2024-03-23 21:21:54'),
(678, 64, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-23 21:22:04', '2024-03-23 21:22:04'),
(679, 64, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-23 21:22:08', '2024-03-23 21:22:08'),
(680, 64, 'Mengedit Data Monthly Report PCP.', 'Monthly Report PCP', '2024-03-23 21:22:19', '2024-03-23 21:22:19'),
(681, 64, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-23 21:22:19', '2024-03-23 21:22:19'),
(682, 64, 'Melakukan Logout.', 'LOGOUT', '2024-03-23 21:22:26', '2024-03-23 21:22:26'),
(683, 61, 'Melakukan Login.', 'LOGIN', '2024-03-23 21:22:51', '2024-03-23 21:22:51'),
(684, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-23 21:22:52', '2024-03-23 21:22:52'),
(685, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-23 21:22:59', '2024-03-23 21:22:59'),
(686, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-23 21:23:10', '2024-03-23 21:23:10'),
(687, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-23 21:23:32', '2024-03-23 21:23:32'),
(688, 61, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-23 21:23:37', '2024-03-23 21:23:37'),
(689, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-23 21:23:47', '2024-03-23 21:23:47'),
(690, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-23 21:23:56', '2024-03-23 21:23:56'),
(691, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-23 21:37:45', '2024-03-23 21:37:45'),
(692, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-23 21:37:49', '2024-03-23 21:37:49'),
(693, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-23 22:01:53', '2024-03-23 22:01:53'),
(694, 61, 'Melakukan Logout.', 'LOGOUT', '2024-03-23 22:02:18', '2024-03-23 22:02:18'),
(695, 63, 'Melakukan Login.', 'LOGIN', '2024-03-23 22:02:25', '2024-03-23 22:02:25'),
(696, 63, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-23 22:02:25', '2024-03-23 22:02:25'),
(697, 63, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-23 22:02:31', '2024-03-23 22:02:31'),
(698, 63, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-23 22:22:33', '2024-03-23 22:22:33'),
(699, 63, 'Melakukan Logout.', 'LOGOUT', '2024-03-23 22:22:41', '2024-03-23 22:22:41'),
(700, 61, 'Melakukan Login.', 'LOGIN', '2024-03-23 22:22:54', '2024-03-23 22:22:54'),
(701, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-23 22:22:54', '2024-03-23 22:22:54'),
(702, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 22:22:59', '2024-03-23 22:22:59'),
(703, 61, 'Melihat Halaman Form Tambah Task PCP.', 'Task PCP', '2024-03-23 22:23:05', '2024-03-23 22:23:05'),
(704, 61, 'Menambah Data Task PCP.', 'Task PCP', '2024-03-23 22:25:36', '2024-03-23 22:25:36'),
(705, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 22:25:37', '2024-03-23 22:25:37'),
(706, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 22:36:38', '2024-03-23 22:36:38'),
(707, 61, 'Melihat Halaman Form Tambah Task PCP.', 'Task PCP', '2024-03-23 22:36:41', '2024-03-23 22:36:41'),
(708, 61, 'Menambah Data Task PCP.', 'Task PCP', '2024-03-23 22:37:10', '2024-03-23 22:37:10'),
(709, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 22:37:11', '2024-03-23 22:37:11'),
(710, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-23 22:37:16', '2024-03-23 22:37:16'),
(711, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 22:37:36', '2024-03-23 22:37:36'),
(712, 61, 'Melihat Halaman Form Edit Task PCP.', 'Task PCP', '2024-03-23 22:37:41', '2024-03-23 22:37:41'),
(713, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 22:37:49', '2024-03-23 22:37:49'),
(714, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-23 22:37:56', '2024-03-23 22:37:56'),
(715, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 22:38:01', '2024-03-23 22:38:01'),
(716, 61, 'Melihat Halaman Form Edit Task PCP.', 'Task PCP', '2024-03-23 22:40:03', '2024-03-23 22:40:03'),
(717, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 22:40:49', '2024-03-23 22:40:49'),
(718, 61, 'Melihat Halaman Form Edit Task PCP.', 'Task PCP', '2024-03-23 22:41:25', '2024-03-23 22:41:25'),
(719, 61, 'Mengedit Data Task PCP.', 'Task PCP', '2024-03-23 22:42:41', '2024-03-23 22:42:41'),
(720, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 22:42:41', '2024-03-23 22:42:41'),
(721, 61, 'Melihat Halaman Form Edit Task PCP.', 'Task PCP', '2024-03-23 22:42:47', '2024-03-23 22:42:47'),
(722, 61, 'Mengedit Data Task PCP.', 'Task PCP', '2024-03-23 22:42:53', '2024-03-23 22:42:53'),
(723, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 22:42:53', '2024-03-23 22:42:53'),
(724, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-23 22:42:58', '2024-03-23 22:42:58'),
(725, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 22:43:05', '2024-03-23 22:43:05'),
(726, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 22:43:10', '2024-03-23 22:43:10'),
(727, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 22:44:48', '2024-03-23 22:44:48'),
(728, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 22:46:39', '2024-03-23 22:46:39'),
(729, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 22:49:46', '2024-03-23 22:49:46'),
(730, 61, 'Melihat Halaman Form Tambah Task PCP.', 'Task PCP', '2024-03-23 22:49:49', '2024-03-23 22:49:49'),
(731, 61, 'Menambah Data Task PCP.', 'Task PCP', '2024-03-23 22:50:12', '2024-03-23 22:50:12'),
(732, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 22:50:12', '2024-03-23 22:50:12'),
(733, 61, 'Menghapus Data Task PCP.', 'Task PCP', '2024-03-23 22:50:17', '2024-03-23 22:50:17'),
(734, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 22:50:17', '2024-03-23 22:50:17'),
(735, 61, 'Melihat Halaman Form Tambah Task PCP.', 'Task PCP', '2024-03-23 22:50:22', '2024-03-23 22:50:22'),
(736, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-23 22:50:25', '2024-03-23 22:50:25'),
(737, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 22:51:00', '2024-03-23 22:51:00'),
(738, 61, 'Melihat Halaman Form Tambah Task PCP.', 'Task PCP', '2024-03-23 22:51:03', '2024-03-23 22:51:03'),
(739, 61, 'Menambah Data Task PCP.', 'Task PCP', '2024-03-23 22:51:27', '2024-03-23 22:51:27'),
(740, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 22:51:28', '2024-03-23 22:51:28'),
(741, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-23 22:51:31', '2024-03-23 22:51:31'),
(742, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 22:51:37', '2024-03-23 22:51:37'),
(743, 61, 'Melihat Halaman Form Edit Task PCP.', 'Task PCP', '2024-03-23 22:51:41', '2024-03-23 22:51:41'),
(744, 61, 'Mengedit Data Task PCP.', 'Task PCP', '2024-03-23 22:51:47', '2024-03-23 22:51:47'),
(745, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 22:51:47', '2024-03-23 22:51:47'),
(746, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-23 22:51:51', '2024-03-23 22:51:51'),
(747, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 22:51:57', '2024-03-23 22:51:57'),
(748, 61, 'Menghapus Data Task PCP.', 'Task PCP', '2024-03-23 22:52:01', '2024-03-23 22:52:01'),
(749, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 22:52:02', '2024-03-23 22:52:02'),
(750, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-23 22:52:11', '2024-03-23 22:52:11'),
(751, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 22:52:39', '2024-03-23 22:52:39'),
(752, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-23 22:52:43', '2024-03-23 22:52:43'),
(753, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 22:52:57', '2024-03-23 22:52:57'),
(754, 61, 'Melihat Halaman Form Tambah Task PCP.', 'Task PCP', '2024-03-23 22:53:26', '2024-03-23 22:53:26'),
(755, 61, 'Menambah Data Task PCP.', 'Task PCP', '2024-03-23 22:53:47', '2024-03-23 22:53:47'),
(756, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 22:53:47', '2024-03-23 22:53:47'),
(757, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-23 22:53:52', '2024-03-23 22:53:52'),
(758, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 22:53:56', '2024-03-23 22:53:56'),
(759, 61, 'Menghapus Data Task PCP.', 'Task PCP', '2024-03-23 22:54:03', '2024-03-23 22:54:03'),
(760, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-03-23 22:54:03', '2024-03-23 22:54:03'),
(761, 61, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-23 22:54:07', '2024-03-23 22:54:07'),
(762, 64, 'Melakukan Login.', 'LOGIN', '2024-03-24 05:37:13', '2024-03-24 05:37:13'),
(763, 64, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-24 05:37:14', '2024-03-24 05:37:14'),
(764, 64, 'Melihat Halaman Daftar Timeline.', 'Timeline', '2024-03-24 05:38:06', '2024-03-24 05:38:06'),
(765, 64, 'Melihat Halaman Form Tambah Agenda.', 'Agenda', '2024-03-24 06:17:19', '2024-03-24 06:17:19'),
(766, 64, 'Melihat Halaman Daftar Timeline.', 'Timeline', '2024-03-24 06:17:28', '2024-03-24 06:17:28'),
(767, 64, 'Melihat Halaman Daftar Timeline.', 'Timeline', '2024-03-24 06:18:00', '2024-03-24 06:18:00'),
(768, 64, 'Melihat Halaman Form Tambah Timeline.', 'Timeline', '2024-03-24 06:18:02', '2024-03-24 06:18:02'),
(769, 64, 'Menambah Data Timeline.', 'Timeline', '2024-03-24 06:20:02', '2024-03-24 06:20:02'),
(770, 64, 'Melihat Halaman Daftar Timeline.', 'Timeline', '2024-03-24 06:20:02', '2024-03-24 06:20:02'),
(771, 64, 'Melihat Halaman Daftar Timeline.', 'Timeline', '2024-03-24 06:21:04', '2024-03-24 06:21:04'),
(772, 64, 'Melihat Halaman Detail Timeline.', 'Timeline', '2024-03-24 06:21:09', '2024-03-24 06:21:09'),
(773, 64, 'Melihat Halaman Detail Timeline.', 'Timeline', '2024-03-24 06:21:41', '2024-03-24 06:21:41'),
(774, 64, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-24 06:21:49', '2024-03-24 06:21:49'),
(775, 64, 'Melihat Halaman Daftar Timeline.', 'Timeline', '2024-03-24 06:21:52', '2024-03-24 06:21:52'),
(776, 64, 'Melihat Halaman Detail Timeline.', 'Timeline', '2024-03-24 06:22:08', '2024-03-24 06:22:08'),
(777, 64, 'Melihat Halaman Daftar Timeline.', 'Timeline', '2024-03-24 06:22:12', '2024-03-24 06:22:12'),
(778, 64, 'Melihat Halaman Form Edit Timeline.', 'Timeline', '2024-03-24 06:22:16', '2024-03-24 06:22:16'),
(779, 64, 'Melihat Halaman Form Edit Timeline.', 'Timeline', '2024-03-24 06:22:53', '2024-03-24 06:22:53'),
(780, 64, 'Mengedit Data Timeline.', 'Timeline', '2024-03-24 06:23:18', '2024-03-24 06:23:18'),
(781, 64, 'Melihat Halaman Daftar Timeline.', 'Timeline', '2024-03-24 06:23:19', '2024-03-24 06:23:19'),
(782, 64, 'Melihat Halaman Detail Timeline.', 'Timeline', '2024-03-24 06:23:26', '2024-03-24 06:23:26'),
(783, 64, 'Melihat Halaman Daftar Timeline.', 'Timeline', '2024-03-24 06:23:30', '2024-03-24 06:23:30'),
(784, 64, 'Melihat Halaman Daftar Timeline.', 'Timeline', '2024-03-24 06:25:27', '2024-03-24 06:25:27'),
(785, 64, 'Menghapus Data Timeline.', 'Timeline', '2024-03-24 06:26:11', '2024-03-24 06:26:11'),
(786, 64, 'Melihat Halaman Daftar Timeline.', 'Timeline', '2024-03-24 06:26:11', '2024-03-24 06:26:11'),
(787, 64, 'Melihat Halaman Form Tambah Timeline.', 'Timeline', '2024-03-24 06:41:48', '2024-03-24 06:41:48'),
(788, 64, 'Menambah Data Timeline.', 'Timeline', '2024-03-24 06:42:38', '2024-03-24 06:42:38'),
(789, 64, 'Melihat Halaman Daftar Timeline.', 'Timeline', '2024-03-24 06:42:39', '2024-03-24 06:42:39'),
(790, 64, 'Melakukan Logout.', 'LOGOUT', '2024-03-24 06:43:28', '2024-03-24 06:43:28'),
(791, 61, 'Melakukan Login.', 'LOGIN', '2024-03-24 06:44:01', '2024-03-24 06:44:01'),
(792, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-24 06:44:02', '2024-03-24 06:44:02'),
(793, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-24 06:48:18', '2024-03-24 06:48:18'),
(794, 61, 'Melihat Halaman Daftar Timeline.', 'Timeline', '2024-03-24 07:10:55', '2024-03-24 07:10:55'),
(795, 61, 'Melihat Halaman Verifikasi Timeline.', 'Timeline', '2024-03-24 07:11:01', '2024-03-24 07:11:01'),
(796, 61, 'Melihat Halaman Daftar Timeline.', 'Timeline', '2024-03-24 07:11:50', '2024-03-24 07:11:50'),
(797, 61, 'Melihat Halaman Verifikasi Timeline.', 'Timeline', '2024-03-24 07:11:52', '2024-03-24 07:11:52'),
(798, 61, 'Melihat Halaman Detail Timeline.', 'Timeline', '2024-03-24 07:12:03', '2024-03-24 07:12:03'),
(799, 61, 'Melihat Halaman Daftar Timeline.', 'Timeline', '2024-03-24 07:12:18', '2024-03-24 07:12:18'),
(800, 61, 'Melihat Halaman Verifikasi Timeline.', 'Timeline', '2024-03-24 07:12:35', '2024-03-24 07:12:35'),
(801, 61, 'Melakukan Verifikasi Timeline.', 'Timeline', '2024-03-24 07:12:43', '2024-03-24 07:12:43'),
(802, 61, 'Melihat Halaman Verifikasi Timeline.', 'Timeline', '2024-03-24 07:12:44', '2024-03-24 07:12:44'),
(803, 61, 'Melihat Halaman Daftar Timeline.', 'Timeline', '2024-03-24 07:12:55', '2024-03-24 07:12:55'),
(804, 61, 'Melihat Halaman Verifikasi Timeline.', 'Timeline', '2024-03-24 07:12:59', '2024-03-24 07:12:59'),
(805, 61, 'Melihat Halaman Verifikasi Timeline.', 'Timeline', '2024-03-24 07:13:25', '2024-03-24 07:13:25'),
(806, 61, 'Melihat Halaman Verifikasi Timeline.', 'Timeline', '2024-03-24 07:14:13', '2024-03-24 07:14:13'),
(807, 61, 'Melihat Halaman Detail Timeline.', 'Timeline', '2024-03-24 07:14:20', '2024-03-24 07:14:20'),
(808, 61, 'Melihat Halaman Detail Timeline.', 'Timeline', '2024-03-24 07:15:47', '2024-03-24 07:15:47'),
(809, 61, 'Melihat Halaman Detail Timeline.', 'Timeline', '2024-03-24 07:17:38', '2024-03-24 07:17:38'),
(810, 61, 'Melakukan Logout.', 'LOGOUT', '2024-03-24 07:17:45', '2024-03-24 07:17:45'),
(811, 64, 'Melakukan Login.', 'LOGIN', '2024-03-24 07:17:52', '2024-03-24 07:17:52'),
(812, 64, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-24 07:17:52', '2024-03-24 07:17:52'),
(813, 64, 'Melihat Halaman Daftar Timeline.', 'Timeline', '2024-03-24 07:17:57', '2024-03-24 07:17:57'),
(814, 64, 'Melihat Halaman Form Edit Timeline.', 'Timeline', '2024-03-24 07:18:01', '2024-03-24 07:18:01'),
(815, 64, 'Melihat Halaman Daftar Timeline.', 'Timeline', '2024-03-24 07:18:05', '2024-03-24 07:18:05'),
(816, 64, 'Melihat Halaman Detail Timeline.', 'Timeline', '2024-03-24 07:18:10', '2024-03-24 07:18:10'),
(817, 64, 'Melakukan Logout.', 'LOGOUT', '2024-03-24 07:18:28', '2024-03-24 07:18:28'),
(818, 64, 'Melakukan Login.', 'LOGIN', '2024-03-24 07:18:43', '2024-03-24 07:18:43'),
(819, 64, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-24 07:18:43', '2024-03-24 07:18:43'),
(820, 64, 'Melakukan Logout.', 'LOGOUT', '2024-03-24 07:18:48', '2024-03-24 07:18:48'),
(821, 61, 'Melakukan Login.', 'LOGIN', '2024-03-24 07:18:57', '2024-03-24 07:18:57'),
(822, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-24 07:18:57', '2024-03-24 07:18:57'),
(823, 61, 'Melihat Halaman Verifikasi Timeline.', 'Timeline', '2024-03-24 07:19:06', '2024-03-24 07:19:06'),
(824, 61, 'Melihat Halaman Verifikasi Timeline.', 'Timeline', '2024-03-24 07:21:21', '2024-03-24 07:21:21'),
(825, 61, 'Melihat Halaman Detail Timeline.', 'Timeline', '2024-03-24 07:21:58', '2024-03-24 07:21:58'),
(826, 61, 'Melihat Halaman Daftar Timeline.', 'Timeline', '2024-03-24 07:22:03', '2024-03-24 07:22:03'),
(827, 61, 'Melihat Halaman Verifikasi Timeline.', 'Timeline', '2024-03-24 07:22:06', '2024-03-24 07:22:06'),
(828, 61, 'Melihat Halaman Verifikasi Timeline.', 'Timeline', '2024-03-24 07:26:31', '2024-03-24 07:26:31'),
(829, 61, 'Melakukan Verifikasi Timeline.', 'Timeline', '2024-03-24 07:26:40', '2024-03-24 07:26:40'),
(830, 61, 'Melihat Halaman Verifikasi Timeline.', 'Timeline', '2024-03-24 07:26:40', '2024-03-24 07:26:40'),
(831, 61, 'Melihat Halaman Daftar Timeline.', 'Timeline', '2024-03-24 07:26:45', '2024-03-24 07:26:45'),
(832, 61, 'Melihat Halaman Verifikasi Timeline.', 'Timeline', '2024-03-24 07:29:05', '2024-03-24 07:29:05'),
(833, 61, 'Melakukan Verifikasi Timeline.', 'Timeline', '2024-03-24 07:29:10', '2024-03-24 07:29:10'),
(834, 61, 'Melihat Halaman Verifikasi Timeline.', 'Timeline', '2024-03-24 07:29:10', '2024-03-24 07:29:10'),
(835, 61, 'Melihat Halaman Daftar Timeline.', 'Timeline', '2024-03-24 07:29:14', '2024-03-24 07:29:14'),
(836, 61, 'Melihat Halaman Detail Timeline.', 'Timeline', '2024-03-24 07:29:19', '2024-03-24 07:29:19'),
(837, 61, 'Melihat Halaman Daftar Timeline.', 'Timeline', '2024-03-24 07:29:23', '2024-03-24 07:29:23'),
(838, 61, 'Melakukan Logout.', 'LOGOUT', '2024-03-24 07:29:28', '2024-03-24 07:29:28'),
(839, 64, 'Melakukan Login.', 'LOGIN', '2024-03-24 07:29:35', '2024-03-24 07:29:35'),
(840, 64, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-24 07:29:35', '2024-03-24 07:29:35'),
(841, 64, 'Melihat Halaman Daftar Timeline.', 'Timeline', '2024-03-24 07:29:38', '2024-03-24 07:29:38'),
(842, 64, 'Melihat Halaman Daftar Timeline.', 'Timeline', '2024-03-24 07:30:34', '2024-03-24 07:30:34'),
(843, 64, 'Melihat Halaman Daftar Timeline.', 'Timeline', '2024-03-24 07:30:50', '2024-03-24 07:30:50'),
(844, 64, 'Melakukan Logout.', 'LOGOUT', '2024-03-24 07:30:58', '2024-03-24 07:30:58'),
(845, 61, 'Melakukan Login.', 'LOGIN', '2024-03-29 02:58:03', '2024-03-29 02:58:03'),
(846, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-29 02:58:04', '2024-03-29 02:58:04'),
(847, 61, 'Melihat Halaman Form Tambah Monthly Report PCP.', 'Monthly Report PCP', '2024-03-29 04:09:04', '2024-03-29 04:09:04'),
(848, 61, 'Melihat Halaman Form Tambah Monthly Report PCP.', 'Monthly Report PCP', '2024-03-29 04:10:34', '2024-03-29 04:10:34'),
(849, 61, 'Melihat Halaman Form Tambah Monthly Report PCP.', 'Monthly Report PCP', '2024-03-29 04:12:40', '2024-03-29 04:12:40'),
(850, 61, 'Melihat Halaman Form Tambah Monthly Report PCP.', 'Monthly Report PCP', '2024-03-29 04:21:46', '2024-03-29 04:21:46'),
(851, 1, 'Melakukan Login.', 'LOGIN', '2024-03-29 07:00:05', '2024-03-29 07:00:05'),
(852, 1, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-29 07:00:06', '2024-03-29 07:00:06'),
(853, 1, 'Melihat Halaman Daftar Monthly Report Admin.', 'MONTHLY REPORT ADMIN', '2024-03-29 07:00:13', '2024-03-29 07:00:13'),
(854, 1, 'Melihat Halaman Detail Monthly Report Admin.', 'MONTHLY REPORT ADMIN', '2024-03-29 07:00:17', '2024-03-29 07:00:17'),
(855, 1, 'Melihat Halaman Detail Monthly Report Admin.', 'MONTHLY REPORT ADMIN', '2024-03-29 07:22:42', '2024-03-29 07:22:42'),
(856, 1, 'Melakukan Logout.', 'LOGOUT', '2024-03-29 07:22:47', '2024-03-29 07:22:47'),
(857, 61, 'Melakukan Login.', 'LOGIN', '2024-03-29 07:22:54', '2024-03-29 07:22:54'),
(858, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-29 07:22:55', '2024-03-29 07:22:55'),
(859, 61, 'Melihat Halaman Form Tambah Monthly Report PCP.', 'Monthly Report PCP', '2024-03-29 07:23:01', '2024-03-29 07:23:01'),
(860, 61, 'Melihat Halaman Form Tambah Monthly Report PCP.', 'Monthly Report PCP', '2024-03-29 07:53:50', '2024-03-29 07:53:50'),
(861, 61, 'Melihat Halaman Form Tambah Monthly Report PCP.', 'Monthly Report PCP', '2024-03-29 07:59:50', '2024-03-29 07:59:50'),
(862, 61, 'Melihat Halaman Form Tambah Monthly Report PCP.', 'Monthly Report PCP', '2024-03-29 08:21:56', '2024-03-29 08:21:56'),
(863, 61, 'Melihat Halaman Form Tambah Monthly Report PCP.', 'Monthly Report PCP', '2024-03-29 08:22:16', '2024-03-29 08:22:16'),
(864, 61, 'Melihat Halaman Form Tambah Monthly Report PCP.', 'Monthly Report PCP', '2024-03-29 08:24:38', '2024-03-29 08:24:38'),
(865, 61, 'Melihat Halaman Form Tambah Monthly Report PCP.', 'Monthly Report PCP', '2024-03-29 08:46:40', '2024-03-29 08:46:40'),
(866, 61, 'Melihat Halaman Form Tambah Monthly Report PCP.', 'Monthly Report PCP', '2024-03-29 08:47:50', '2024-03-29 08:47:50'),
(867, 61, 'Melihat Halaman Form Tambah Monthly Report PCP.', 'Monthly Report PCP', '2024-03-29 12:40:46', '2024-03-29 12:40:46'),
(868, 61, 'Melihat Halaman Form Tambah Monthly Report PCP.', 'Monthly Report PCP', '2024-03-29 12:44:16', '2024-03-29 12:44:16'),
(869, 61, 'Melihat Halaman Form Tambah Monthly Report PCP.', 'Monthly Report PCP', '2024-03-29 12:47:10', '2024-03-29 12:47:10'),
(870, 61, 'Melihat Halaman Form Tambah Monthly Report PCP.', 'Monthly Report PCP', '2024-03-29 12:48:05', '2024-03-29 12:48:05'),
(872, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-29 12:53:07', '2024-03-29 12:53:07'),
(873, 61, 'Melihat Halaman Form Tambah Monthly Report PCP.', 'Monthly Report PCP', '2024-03-29 12:53:12', '2024-03-29 12:53:12'),
(874, 61, 'Menambah Data Monthly Report PCP.', 'Monthly Report PCP', '2024-03-29 12:55:10', '2024-03-29 12:55:10'),
(875, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-29 12:55:11', '2024-03-29 12:55:11'),
(876, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-29 12:56:02', '2024-03-29 12:56:02'),
(877, 61, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-29 12:56:07', '2024-03-29 12:56:07'),
(878, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-29 12:56:47', '2024-03-29 12:56:47'),
(879, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-29 13:38:03', '2024-03-29 13:38:03'),
(880, 61, 'Melakukan Logout.', 'LOGOUT', '2024-03-29 13:45:25', '2024-03-29 13:45:25'),
(881, 57, 'Melakukan Login.', 'LOGIN', '2024-03-29 13:45:32', '2024-03-29 13:45:32'),
(882, 57, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-29 13:45:33', '2024-03-29 13:45:33'),
(883, 57, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-29 13:48:04', '2024-03-29 13:48:04'),
(884, 64, 'Melakukan Login.', 'LOGIN', '2024-03-29 16:14:11', '2024-03-29 16:14:11'),
(885, 64, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-29 16:14:11', '2024-03-29 16:14:11'),
(886, 64, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-29 16:14:14', '2024-03-29 16:14:14'),
(887, 64, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-29 16:14:19', '2024-03-29 16:14:19'),
(888, 64, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-29 16:14:24', '2024-03-29 16:14:24'),
(889, 64, 'Melakukan Login.', 'LOGIN', '2024-03-29 20:33:42', '2024-03-29 20:33:42'),
(890, 64, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-29 20:33:43', '2024-03-29 20:33:43'),
(891, 64, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-29 20:33:49', '2024-03-29 20:33:49'),
(892, 64, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-29 20:34:27', '2024-03-29 20:34:27'),
(893, 64, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-29 20:35:38', '2024-03-29 20:35:38'),
(894, 64, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-29 20:37:27', '2024-03-29 20:37:27'),
(895, 64, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-29 20:38:15', '2024-03-29 20:38:15'),
(896, 64, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-29 21:02:04', '2024-03-29 21:02:04'),
(897, 64, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-29 21:02:36', '2024-03-29 21:02:36'),
(898, 64, 'Melakukan Login.', 'LOGIN', '2024-03-30 08:09:55', '2024-03-30 08:09:55'),
(899, 64, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-30 08:09:55', '2024-03-30 08:09:55'),
(900, 64, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 08:09:59', '2024-03-30 08:09:59'),
(901, 64, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-30 08:10:03', '2024-03-30 08:10:03'),
(902, 64, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-30 08:10:10', '2024-03-30 08:10:10'),
(903, 64, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-30 08:20:40', '2024-03-30 08:20:40'),
(904, 64, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-30 09:02:11', '2024-03-30 09:02:11'),
(905, 64, 'Mengedit Data Monthly Report PCP.', 'Monthly Report PCP', '2024-03-30 09:03:18', '2024-03-30 09:03:18'),
(906, 64, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 09:03:18', '2024-03-30 09:03:18'),
(907, 64, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-30 09:03:25', '2024-03-30 09:03:25'),
(908, 64, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 09:03:42', '2024-03-30 09:03:42'),
(909, 64, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 09:06:38', '2024-03-30 09:06:38'),
(910, 64, 'Melakukan Logout.', 'LOGOUT', '2024-03-30 09:06:45', '2024-03-30 09:06:45'),
(911, 61, 'Melakukan Login.', 'LOGIN', '2024-03-30 09:06:55', '2024-03-30 09:06:55'),
(912, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-30 09:06:56', '2024-03-30 09:06:56'),
(913, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 09:07:08', '2024-03-30 09:07:08'),
(914, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-30 09:07:20', '2024-03-30 09:07:20'),
(915, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-30 09:08:29', '2024-03-30 09:08:29'),
(916, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-30 09:09:40', '2024-03-30 09:09:40'),
(917, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-30 09:11:37', '2024-03-30 09:11:37'),
(918, 61, 'Mengedit Data Monthly Report PCP.', 'Monthly Report PCP', '2024-03-30 09:13:49', '2024-03-30 09:13:49'),
(919, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 09:13:49', '2024-03-30 09:13:49'),
(920, 61, 'Melakukan Logout.', 'LOGOUT', '2024-03-30 09:13:59', '2024-03-30 09:13:59'),
(921, 64, 'Melakukan Login.', 'LOGIN', '2024-03-30 09:14:33', '2024-03-30 09:14:33'),
(922, 64, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-30 09:14:33', '2024-03-30 09:14:33'),
(923, 64, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 09:14:38', '2024-03-30 09:14:38'),
(924, 64, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-30 09:14:42', '2024-03-30 09:14:42'),
(925, 64, 'Melakukan Logout.', 'LOGOUT', '2024-03-30 09:16:27', '2024-03-30 09:16:27'),
(926, 61, 'Melakukan Login.', 'LOGIN', '2024-03-30 09:16:34', '2024-03-30 09:16:34'),
(927, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-30 09:16:34', '2024-03-30 09:16:34'),
(928, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 09:16:39', '2024-03-30 09:16:39'),
(929, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-30 09:16:44', '2024-03-30 09:16:44'),
(930, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-30 09:26:54', '2024-03-30 09:26:54'),
(931, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-30 09:29:57', '2024-03-30 09:29:57'),
(932, 61, 'Mengedit Data Monthly Report PCP.', 'Monthly Report PCP', '2024-03-30 09:31:36', '2024-03-30 09:31:36'),
(933, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 09:31:36', '2024-03-30 09:31:36'),
(934, 61, 'Melakukan Logout.', 'LOGOUT', '2024-03-30 09:31:45', '2024-03-30 09:31:45'),
(935, 64, 'Melakukan Login.', 'LOGIN', '2024-03-30 09:31:54', '2024-03-30 09:31:54'),
(936, 64, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-30 09:31:54', '2024-03-30 09:31:54'),
(937, 64, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 09:31:58', '2024-03-30 09:31:58'),
(938, 64, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-30 09:32:16', '2024-03-30 09:32:16'),
(939, 64, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-30 09:39:31', '2024-03-30 09:39:31'),
(940, 64, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-30 09:43:56', '2024-03-30 09:43:56'),
(941, 64, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-30 09:44:40', '2024-03-30 09:44:40'),
(942, 64, 'Mengedit Data Monthly Report PCP.', 'Monthly Report PCP', '2024-03-30 09:50:15', '2024-03-30 09:50:15'),
(943, 64, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 09:50:15', '2024-03-30 09:50:15'),
(944, 64, 'Melakukan Logout.', 'LOGOUT', '2024-03-30 09:50:22', '2024-03-30 09:50:22'),
(945, 61, 'Melakukan Login.', 'LOGIN', '2024-03-30 09:50:56', '2024-03-30 09:50:56'),
(946, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-30 09:50:57', '2024-03-30 09:50:57'),
(947, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 09:54:39', '2024-03-30 09:54:39'),
(948, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-30 09:54:43', '2024-03-30 09:54:43'),
(949, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 09:55:01', '2024-03-30 09:55:01'),
(950, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-30 09:55:04', '2024-03-30 09:55:04'),
(951, 61, 'Mengedit Data Monthly Report PCP.', 'Monthly Report PCP', '2024-03-30 09:57:12', '2024-03-30 09:57:12'),
(952, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 09:57:13', '2024-03-30 09:57:13'),
(953, 61, 'Melakukan Logout.', 'LOGOUT', '2024-03-30 09:57:20', '2024-03-30 09:57:20'),
(954, 64, 'Melakukan Login.', 'LOGIN', '2024-03-30 09:57:30', '2024-03-30 09:57:30'),
(955, 64, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-30 09:57:31', '2024-03-30 09:57:31'),
(956, 64, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 09:57:35', '2024-03-30 09:57:35'),
(957, 64, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-30 09:57:38', '2024-03-30 09:57:38'),
(958, 64, 'Mengedit Data Monthly Report PCP.', 'Monthly Report PCP', '2024-03-30 09:58:42', '2024-03-30 09:58:42'),
(959, 64, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 09:58:43', '2024-03-30 09:58:43'),
(960, 64, 'Melakukan Logout.', 'LOGOUT', '2024-03-30 09:58:48', '2024-03-30 09:58:48'),
(961, 61, 'Melakukan Login.', 'LOGIN', '2024-03-30 09:58:56', '2024-03-30 09:58:56'),
(962, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-30 09:58:56', '2024-03-30 09:58:56'),
(963, 61, 'Melihat Halaman Form Tambah Monthly Report PCP.', 'Monthly Report PCP', '2024-03-30 09:59:07', '2024-03-30 09:59:07'),
(964, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 09:59:12', '2024-03-30 09:59:12'),
(965, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-30 09:59:16', '2024-03-30 09:59:16'),
(966, 61, 'Mengedit Data Monthly Report PCP.', 'Monthly Report PCP', '2024-03-30 10:01:13', '2024-03-30 10:01:13'),
(967, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 10:01:13', '2024-03-30 10:01:13'),
(968, 61, 'Melakukan Logout.', 'LOGOUT', '2024-03-30 10:01:18', '2024-03-30 10:01:18'),
(969, 64, 'Melakukan Login.', 'LOGIN', '2024-03-30 10:01:28', '2024-03-30 10:01:28'),
(970, 64, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-30 10:01:29', '2024-03-30 10:01:29');
INSERT INTO `log` (`id_log`, `id_user`, `activity`, `feature`, `created_at`, `updated_at`) VALUES
(971, 64, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 10:01:45', '2024-03-30 10:01:45'),
(972, 64, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-30 10:01:54', '2024-03-30 10:01:54'),
(973, 64, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-30 10:14:44', '2024-03-30 10:14:44'),
(974, 64, 'Mengedit Data Monthly Report PCP.', 'Monthly Report PCP', '2024-03-30 10:15:08', '2024-03-30 10:15:08'),
(975, 64, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 10:15:08', '2024-03-30 10:15:08'),
(976, 64, 'Melakukan Logout.', 'LOGOUT', '2024-03-30 10:15:14', '2024-03-30 10:15:14'),
(977, 64, 'Melakukan Login.', 'LOGIN', '2024-03-30 10:15:21', '2024-03-30 10:15:21'),
(978, 64, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-30 10:15:22', '2024-03-30 10:15:22'),
(979, 64, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 10:15:30', '2024-03-30 10:15:30'),
(980, 64, 'Melakukan Logout.', 'LOGOUT', '2024-03-30 10:15:36', '2024-03-30 10:15:36'),
(981, 61, 'Melakukan Login.', 'LOGIN', '2024-03-30 10:15:43', '2024-03-30 10:15:43'),
(982, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-30 10:15:43', '2024-03-30 10:15:43'),
(983, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 10:16:04', '2024-03-30 10:16:04'),
(984, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 10:16:05', '2024-03-30 10:16:05'),
(985, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 10:16:06', '2024-03-30 10:16:06'),
(986, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-30 10:21:06', '2024-03-30 10:21:06'),
(987, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 10:21:29', '2024-03-30 10:21:29'),
(988, 61, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-30 10:21:32', '2024-03-30 10:21:32'),
(989, 61, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-30 10:41:18', '2024-03-30 10:41:18'),
(990, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 10:41:49', '2024-03-30 10:41:49'),
(991, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-30 10:41:53', '2024-03-30 10:41:53'),
(992, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 10:42:09', '2024-03-30 10:42:09'),
(993, 61, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-30 10:42:12', '2024-03-30 10:42:12'),
(994, 61, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-30 10:44:15', '2024-03-30 10:44:15'),
(995, 61, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-30 10:46:20', '2024-03-30 10:46:20'),
(996, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 10:46:40', '2024-03-30 10:46:40'),
(997, 61, 'Melakukan Login.', 'LOGIN', '2024-03-30 13:24:48', '2024-03-30 13:24:48'),
(998, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-30 13:24:48', '2024-03-30 13:24:48'),
(999, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 13:24:54', '2024-03-30 13:24:54'),
(1000, 61, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-30 13:25:01', '2024-03-30 13:25:01'),
(1001, 61, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-30 13:25:55', '2024-03-30 13:25:55'),
(1002, 61, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-30 13:28:12', '2024-03-30 13:28:12'),
(1003, 61, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-30 13:30:41', '2024-03-30 13:30:41'),
(1004, 61, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-30 13:35:59', '2024-03-30 13:35:59'),
(1005, 61, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-30 13:40:54', '2024-03-30 13:40:54'),
(1006, 61, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-30 13:43:05', '2024-03-30 13:43:05'),
(1007, 61, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-30 13:44:38', '2024-03-30 13:44:38'),
(1008, 61, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-03-30 13:57:29', '2024-03-30 13:57:29'),
(1009, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 13:58:29', '2024-03-30 13:58:29'),
(1010, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-30 14:16:10', '2024-03-30 14:16:10'),
(1011, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-30 14:16:49', '2024-03-30 14:16:49'),
(1012, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-30 14:18:08', '2024-03-30 14:18:08'),
(1013, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-30 14:40:26', '2024-03-30 14:40:26'),
(1014, 61, 'Melakukan Login.', 'LOGIN', '2024-03-30 19:42:47', '2024-03-30 19:42:47'),
(1015, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-30 19:42:47', '2024-03-30 19:42:47'),
(1016, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 19:42:52', '2024-03-30 19:42:52'),
(1017, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-30 19:42:56', '2024-03-30 19:42:56'),
(1018, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 19:43:10', '2024-03-30 19:43:10'),
(1019, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-30 19:45:38', '2024-03-30 19:45:38'),
(1020, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-03-30 20:03:39', '2024-03-30 20:03:39'),
(1021, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-03-30 20:03:46', '2024-03-30 20:03:46'),
(1022, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-30 22:06:34', '2024-03-30 22:06:34'),
(1023, 61, 'Melakukan Logout.', 'LOGOUT', '2024-03-30 22:06:48', '2024-03-30 22:06:48'),
(1024, 1, 'Melakukan Login.', 'LOGIN', '2024-03-30 22:07:10', '2024-03-30 22:07:10'),
(1025, 1, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-30 22:07:10', '2024-03-30 22:07:10'),
(1026, 1, 'Melakukan Logout.', 'LOGOUT', '2024-03-30 22:07:22', '2024-03-30 22:07:22'),
(1027, 63, 'Melakukan Login.', 'LOGIN', '2024-03-30 22:07:32', '2024-03-30 22:07:32'),
(1028, 63, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-30 22:07:32', '2024-03-30 22:07:32'),
(1029, 63, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-30 22:07:37', '2024-03-30 22:07:37'),
(1030, 63, 'Melihat Halaman Form Edit Agenda.', 'Agenda', '2024-03-30 22:15:29', '2024-03-30 22:15:29'),
(1031, 63, 'Mengedit Data Agenda.', 'Agenda', '2024-03-30 22:15:36', '2024-03-30 22:15:36'),
(1032, 63, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-30 22:15:36', '2024-03-30 22:15:36'),
(1033, 63, 'Melihat Halaman Form Edit Agenda.', 'Agenda', '2024-03-30 22:15:41', '2024-03-30 22:15:41'),
(1034, 63, 'Mengedit Data Agenda.', 'Agenda', '2024-03-30 22:15:45', '2024-03-30 22:15:45'),
(1035, 63, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-30 22:15:45', '2024-03-30 22:15:45'),
(1036, 63, 'Melihat Halaman Form Edit Agenda.', 'Agenda', '2024-03-30 22:15:49', '2024-03-30 22:15:49'),
(1037, 63, 'Mengedit Data Agenda.', 'Agenda', '2024-03-30 22:15:54', '2024-03-30 22:15:54'),
(1038, 63, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-30 22:15:54', '2024-03-30 22:15:54'),
(1039, 63, 'Melakukan Login.', 'LOGIN', '2024-03-31 04:04:16', '2024-03-31 04:04:16'),
(1040, 63, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-31 04:04:17', '2024-03-31 04:04:17'),
(1041, 63, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-31 04:04:21', '2024-03-31 04:04:21'),
(1042, 63, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-31 04:08:37', '2024-03-31 04:08:37'),
(1043, 63, 'Melihat Halaman Form Tambah Agenda.', 'Agenda', '2024-03-31 04:08:41', '2024-03-31 04:08:41'),
(1044, 63, 'Menambah Data Agenda.', 'Agenda', '2024-03-31 04:09:03', '2024-03-31 04:09:03'),
(1045, 63, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-31 04:09:03', '2024-03-31 04:09:03'),
(1046, 63, 'Melihat Halaman Detail Agenda.', 'Agenda', '2024-03-31 04:09:09', '2024-03-31 04:09:09'),
(1047, 63, 'Melihat Halaman Detail Agenda.', 'Agenda', '2024-03-31 04:09:58', '2024-03-31 04:09:58'),
(1048, 63, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-31 04:10:00', '2024-03-31 04:10:00'),
(1049, 63, 'Melihat Halaman Form Edit Agenda.', 'Agenda', '2024-03-31 04:10:04', '2024-03-31 04:10:04'),
(1050, 63, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-31 04:10:07', '2024-03-31 04:10:07'),
(1051, 63, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-31 04:11:48', '2024-03-31 04:11:48'),
(1052, 63, 'Menghapus Data Agenda.', 'Agenda', '2024-03-31 04:11:54', '2024-03-31 04:11:54'),
(1053, 63, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-31 04:11:55', '2024-03-31 04:11:55'),
(1054, 63, 'Melihat Halaman Form Edit Agenda.', 'Agenda', '2024-03-31 04:30:44', '2024-03-31 04:30:44'),
(1055, 63, 'Mengedit Data Agenda.', 'Agenda', '2024-03-31 04:30:54', '2024-03-31 04:30:54'),
(1056, 63, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-31 04:30:54', '2024-03-31 04:30:54'),
(1057, 63, 'Melihat Halaman Detail Agenda.', 'Agenda', '2024-03-31 04:30:58', '2024-03-31 04:30:58'),
(1058, 63, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-31 04:31:04', '2024-03-31 04:31:04'),
(1059, 63, 'Melihat Halaman Form Tambah Agenda.', 'Agenda', '2024-03-31 04:31:07', '2024-03-31 04:31:07'),
(1060, 63, 'Menambah Data Agenda.', 'Agenda', '2024-03-31 04:31:32', '2024-03-31 04:31:32'),
(1061, 63, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-31 04:31:32', '2024-03-31 04:31:32'),
(1062, 63, 'Melihat Halaman Detail Agenda.', 'Agenda', '2024-03-31 04:31:38', '2024-03-31 04:31:38'),
(1063, 63, 'Melihat Halaman Daftar Agenda.', 'Agenda', '2024-03-31 04:32:29', '2024-03-31 04:32:29'),
(1064, 61, 'Melakukan Login.', 'LOGIN', '2024-03-31 07:06:24', '2024-03-31 07:06:24'),
(1065, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-03-31 07:06:24', '2024-03-31 07:06:24'),
(1066, 61, 'Melihat Halaman Daftar Timeline.', 'Timeline', '2024-03-31 07:06:29', '2024-03-31 07:06:29'),
(1067, 61, 'Melihat Halaman Detail Timeline.', 'Timeline', '2024-03-31 07:07:19', '2024-03-31 07:07:19'),
(1068, 61, 'Melihat Halaman Daftar Timeline.', 'Timeline', '2024-03-31 07:07:34', '2024-03-31 07:07:34'),
(1069, 61, 'Melihat Halaman Detail Timeline.', 'Timeline', '2024-03-31 07:09:45', '2024-03-31 07:09:45'),
(1070, 63, 'Melakukan Login.', 'LOGIN', '2024-04-06 12:44:12', '2024-04-06 12:44:12'),
(1071, 63, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-06 12:44:13', '2024-04-06 12:44:13'),
(1072, 63, 'Melakukan Logout.', 'LOGOUT', '2024-04-06 13:29:24', '2024-04-06 13:29:24'),
(1073, 61, 'Melakukan Login.', 'LOGIN', '2024-04-06 13:29:34', '2024-04-06 13:29:34'),
(1074, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-06 13:29:35', '2024-04-06 13:29:35'),
(1075, 61, 'Melihat Halaman Daftar Timeline.', 'Timeline', '2024-04-06 13:29:41', '2024-04-06 13:29:41'),
(1076, 61, 'Melakukan Logout.', 'LOGOUT', '2024-04-06 14:15:11', '2024-04-06 14:15:11'),
(1077, 64, 'Melakukan Login.', 'LOGIN', '2024-04-06 14:15:20', '2024-04-06 14:15:20'),
(1078, 64, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-06 14:15:20', '2024-04-06 14:15:20'),
(1079, 61, 'Melakukan Login.', 'LOGIN', '2024-04-07 03:21:41', '2024-04-07 03:21:41'),
(1080, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-07 03:21:42', '2024-04-07 03:21:42'),
(1081, 61, 'Melakukan Logout.', 'LOGOUT', '2024-04-07 03:22:42', '2024-04-07 03:22:42'),
(1082, 64, 'Melakukan Login.', 'LOGIN', '2024-04-07 03:22:50', '2024-04-07 03:22:50'),
(1083, 64, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-07 03:22:51', '2024-04-07 03:22:51'),
(1084, 1, 'Melakukan Login.', 'LOGIN', '2024-04-09 15:08:33', '2024-04-09 15:08:33'),
(1085, 1, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-09 15:08:34', '2024-04-09 15:08:34'),
(1086, 1, 'Melihat Halaman Form Tambah User.', 'USER', '2024-04-09 15:08:49', '2024-04-09 15:08:49'),
(1087, 1, 'Melakukan Login.', 'LOGIN', '2024-04-09 17:36:33', '2024-04-09 17:36:33'),
(1088, 1, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-09 17:36:34', '2024-04-09 17:36:34'),
(1089, 1, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-09 17:36:47', '2024-04-09 17:36:47'),
(1090, 1, 'Melihat Halaman Daftar User.', 'USER', '2024-04-09 18:37:35', '2024-04-09 18:37:35'),
(1091, 1, 'Melihat Halaman Form Tambah User.', 'USER', '2024-04-09 18:37:40', '2024-04-09 18:37:40'),
(1092, 1, 'Melihat Halaman Form Tambah User.', 'USER', '2024-04-09 18:43:32', '2024-04-09 18:43:32'),
(1093, 1, 'Menambah Data User.', 'USER', '2024-04-09 18:44:38', '2024-04-09 18:44:38'),
(1094, 1, 'Melihat Halaman Daftar User.', 'USER', '2024-04-09 18:44:38', '2024-04-09 18:44:38'),
(1095, 1, 'Melihat Halaman Form Edit User.', 'USER', '2024-04-09 18:44:44', '2024-04-09 18:44:44'),
(1096, 1, 'Mengedit Data User.', 'USER', '2024-04-09 18:44:49', '2024-04-09 18:44:49'),
(1097, 1, 'Melihat Halaman Daftar User.', 'USER', '2024-04-09 18:44:50', '2024-04-09 18:44:50'),
(1098, 1, 'Melihat Halaman Form Edit User.', 'USER', '2024-04-09 18:44:55', '2024-04-09 18:44:55'),
(1099, 1, 'Melihat Halaman Daftar User.', 'USER', '2024-04-09 18:45:03', '2024-04-09 18:45:03'),
(1100, 1, 'Melihat Halaman Daftar User.', 'USER', '2024-04-09 18:45:53', '2024-04-09 18:45:53'),
(1101, 1, 'Melihat Halaman Daftar User.', 'USER', '2024-04-09 18:47:26', '2024-04-09 18:47:26'),
(1102, 1, 'Melihat Halaman Daftar User.', 'USER', '2024-04-09 18:52:08', '2024-04-09 18:52:08'),
(1103, 1, 'Melakukan Login.', 'LOGIN', '2024-04-10 12:07:40', '2024-04-10 12:07:40'),
(1104, 1, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-10 12:07:41', '2024-04-10 12:07:41'),
(1105, 1, 'Melihat Halaman Form Tambah Proyek.', 'PROYEK', '2024-04-10 12:08:07', '2024-04-10 12:08:07'),
(1106, 1, 'Melihat Halaman Form Tambah Proyek.', 'PROYEK', '2024-04-10 12:09:29', '2024-04-10 12:09:29'),
(1107, 1, 'Menambah Data Proyek.', 'PROYEK', '2024-04-10 12:09:59', '2024-04-10 12:09:59'),
(1108, 1, 'Melihat Halaman Daftar Proyek.', 'PROYEK', '2024-04-10 12:09:59', '2024-04-10 12:09:59'),
(1109, 1, 'Melihat Halaman Daftar Proyek.', 'PROYEK', '2024-04-10 12:11:28', '2024-04-10 12:11:28'),
(1110, 1, 'Melihat Halaman Daftar Proyek.', 'PROYEK', '2024-04-10 12:12:17', '2024-04-10 12:12:17'),
(1111, 1, 'Melihat Halaman Daftar Proyek.', 'PROYEK', '2024-04-10 12:14:49', '2024-04-10 12:14:49'),
(1112, 1, 'Melihat Halaman Daftar Proyek.', 'PROYEK', '2024-04-10 12:15:02', '2024-04-10 12:15:02'),
(1113, 1, 'Melihat Halaman Form Tambah Proyek.', 'PROYEK', '2024-04-10 12:17:28', '2024-04-10 12:17:28'),
(1114, 1, 'Menambah Data Proyek.', 'PROYEK', '2024-04-10 12:17:54', '2024-04-10 12:17:54'),
(1115, 1, 'Melihat Halaman Daftar Proyek.', 'PROYEK', '2024-04-10 12:17:54', '2024-04-10 12:17:54'),
(1116, 1, 'Melihat Halaman Daftar Proyek.', 'PROYEK', '2024-04-10 12:18:28', '2024-04-10 12:18:28'),
(1117, 1, 'Menghapus Data Proyek.', 'PROYEK', '2024-04-10 12:18:38', '2024-04-10 12:18:38'),
(1118, 1, 'Melihat Halaman Daftar Proyek.', 'PROYEK', '2024-04-10 12:18:39', '2024-04-10 12:18:39'),
(1119, 1, 'Melihat Halaman Daftar Proyek.', 'PROYEK', '2024-04-10 12:20:06', '2024-04-10 12:20:06'),
(1120, 1, 'Melihat Halaman Form Edit Proyek.', 'PROYEK', '2024-04-10 12:20:46', '2024-04-10 12:20:46'),
(1121, 1, 'Melihat Halaman Daftar Proyek.', 'PROYEK', '2024-04-10 12:21:03', '2024-04-10 12:21:03'),
(1122, 1, 'Melihat Halaman Form Edit Proyek.', 'PROYEK', '2024-04-10 12:21:09', '2024-04-10 12:21:09'),
(1123, 1, 'Melihat Halaman Daftar Proyek.', 'PROYEK', '2024-04-10 12:21:27', '2024-04-10 12:21:27'),
(1124, 1, 'Melihat Halaman Form Edit Proyek.', 'PROYEK', '2024-04-10 12:21:46', '2024-04-10 12:21:46'),
(1125, 1, 'Melihat Halaman Form Edit Proyek.', 'PROYEK', '2024-04-10 12:23:14', '2024-04-10 12:23:14'),
(1126, 1, 'Mengedit Data Proyek.', 'PROYEK', '2024-04-10 12:23:20', '2024-04-10 12:23:20'),
(1127, 1, 'Melihat Halaman Daftar Proyek.', 'PROYEK', '2024-04-10 12:23:20', '2024-04-10 12:23:20'),
(1128, 1, 'Melakukan Logout.', 'LOGOUT', '2024-04-10 12:46:35', '2024-04-10 12:46:35'),
(1129, 64, 'Melakukan Login.', 'LOGIN', '2024-04-10 12:47:14', '2024-04-10 12:47:14'),
(1130, 64, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-10 12:47:15', '2024-04-10 12:47:15'),
(1131, 64, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-04-10 12:47:17', '2024-04-10 12:47:17'),
(1132, 64, 'Melakukan Logout.', 'LOGOUT', '2024-04-10 12:47:26', '2024-04-10 12:47:26'),
(1133, 61, 'Melakukan Login.', 'LOGIN', '2024-04-10 12:48:55', '2024-04-10 12:48:55'),
(1134, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-10 12:48:56', '2024-04-10 12:48:56'),
(1135, 61, 'Melihat Halaman Form Tambah Monthly Report PCP.', 'Monthly Report PCP', '2024-04-10 12:49:00', '2024-04-10 12:49:00'),
(1136, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-04-10 12:49:15', '2024-04-10 12:49:15'),
(1137, 61, 'Melihat Halaman Form Edit Monthly Report.', 'Monthly Report', '2024-04-10 12:49:22', '2024-04-10 12:49:22'),
(1138, 61, 'Mengedit Data Monthly Report PCP.', 'Monthly Report PCP', '2024-04-10 12:49:36', '2024-04-10 12:49:36'),
(1139, 61, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-04-10 12:49:37', '2024-04-10 12:49:37'),
(1140, 61, 'Melakukan Logout.', 'LOGOUT', '2024-04-10 12:49:42', '2024-04-10 12:49:42'),
(1141, 64, 'Melakukan Login.', 'LOGIN', '2024-04-10 12:49:51', '2024-04-10 12:49:51'),
(1142, 64, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-10 12:49:51', '2024-04-10 12:49:51'),
(1143, 64, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-04-10 12:52:17', '2024-04-10 12:52:17'),
(1144, 64, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-04-10 12:53:15', '2024-04-10 12:53:15'),
(1145, 64, 'Melakukan Logout.', 'LOGOUT', '2024-04-10 12:53:20', '2024-04-10 12:53:20'),
(1146, 1, 'Melakukan Login.', 'LOGIN', '2024-04-10 12:54:04', '2024-04-10 12:54:04'),
(1147, 1, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-10 12:54:05', '2024-04-10 12:54:05'),
(1148, 1, 'Melihat Halaman Daftar Proyek.', 'PROYEK', '2024-04-10 12:54:11', '2024-04-10 12:54:11'),
(1149, 1, 'Melakukan Logout.', 'LOGOUT', '2024-04-10 12:55:59', '2024-04-10 12:55:59'),
(1150, 64, 'Melakukan Login.', 'LOGIN', '2024-04-10 12:56:20', '2024-04-10 12:56:20'),
(1151, 64, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-10 12:56:20', '2024-04-10 12:56:20'),
(1152, 64, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-04-10 12:56:23', '2024-04-10 12:56:23'),
(1153, 64, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-04-10 12:56:28', '2024-04-10 12:56:28'),
(1154, 64, 'Melihat Halaman Detail Monthly Report PCP.', 'Monthly Report PCP', '2024-04-10 13:00:56', '2024-04-10 13:00:56'),
(1155, 64, 'Melakukan Logout.', 'LOGOUT', '2024-04-10 14:05:07', '2024-04-10 14:05:07'),
(1156, 57, 'Melakukan Login.', 'LOGIN', '2024-04-10 14:05:23', '2024-04-10 14:05:23'),
(1157, 57, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-10 14:05:23', '2024-04-10 14:05:23'),
(1158, 57, 'Melihat Halaman Monitoring Technical Supporting.', 'TECHNICAL SUPPORTING', '2024-04-10 14:05:27', '2024-04-10 14:05:27'),
(1159, 57, 'Melihat Halaman Monitoring Kolaborasi KI/KM', 'KOLABORASI KI/KM', '2024-04-10 14:05:35', '2024-04-10 14:05:35'),
(1160, 57, 'Melihat Halaman Form Tambah Kolaborasi KI/KM', 'KOLABORASI KI/KM', '2024-04-10 14:05:41', '2024-04-10 14:05:41'),
(1161, 57, 'Menambah Data Kolaborasi KI/KM', 'KOLABORASI KI/KM', '2024-04-10 14:06:08', '2024-04-10 14:06:08'),
(1162, 57, 'Melihat Halaman Monitoring Kolaborasi KI/KM', 'KOLABORASI KI/KM', '2024-04-10 14:06:08', '2024-04-10 14:06:08'),
(1163, 57, 'Melakukan Login.', 'LOGIN', '2024-04-11 00:32:51', '2024-04-11 00:32:51'),
(1164, 57, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-11 00:32:52', '2024-04-11 00:32:52'),
(1165, 57, 'Melakukan Logout.', 'LOGOUT', '2024-04-11 00:43:08', '2024-04-11 00:43:08'),
(1166, 41, 'Melakukan Login.', 'LOGIN', '2024-04-11 00:43:19', '2024-04-11 00:43:19'),
(1167, 41, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-11 00:43:19', '2024-04-11 00:43:19'),
(1168, 41, 'Melakukan Logout.', 'LOGOUT', '2024-04-11 00:43:38', '2024-04-11 00:43:38'),
(1169, 60, 'Melakukan Login.', 'LOGIN', '2024-04-11 00:43:53', '2024-04-11 00:43:53'),
(1170, 60, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-11 00:43:53', '2024-04-11 00:43:53'),
(1171, 60, 'Melakukan Logout.', 'LOGOUT', '2024-04-11 00:44:00', '2024-04-11 00:44:00'),
(1172, 53, 'Melakukan Login.', 'LOGIN', '2024-04-11 00:44:08', '2024-04-11 00:44:08'),
(1173, 53, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-11 00:44:08', '2024-04-11 00:44:08'),
(1174, 53, 'Melihat Halaman Form Tambah Engineering Activity.', 'ENGINEERING ACTIVITY', '2024-04-11 00:44:25', '2024-04-11 00:44:25'),
(1175, 53, 'Menambah Data Engineering Activity.', 'ENGINEERING ACTIVITY', '2024-04-11 00:45:18', '2024-04-11 00:45:18'),
(1176, 53, 'Melihat Halaman Check Engineering Activity.', 'ENGINEERING ACTIVITY', '2024-04-11 00:45:19', '2024-04-11 00:45:19'),
(1177, 53, 'Melihat Halaman Check Engineering Activity.', 'ENGINEERING ACTIVITY', '2024-04-11 00:47:23', '2024-04-11 00:47:23'),
(1178, 53, 'Melihat Halaman Form Tambah Engineering Activity.', 'ENGINEERING ACTIVITY', '2024-04-11 00:47:29', '2024-04-11 00:47:29'),
(1179, 53, 'Melihat Halaman Check Engineering Activity.', 'ENGINEERING ACTIVITY', '2024-04-11 00:47:32', '2024-04-11 00:47:32'),
(1180, 53, 'Melihat Halaman Check Engineering Activity.', 'ENGINEERING ACTIVITY', '2024-04-11 00:49:06', '2024-04-11 00:49:06'),
(1181, 53, 'Melihat Halaman Check Engineering Activity.', 'ENGINEERING ACTIVITY', '2024-04-11 01:06:25', '2024-04-11 01:06:25'),
(1182, 53, 'Melihat Halaman Check Engineering Activity.', 'ENGINEERING ACTIVITY', '2024-04-11 01:07:14', '2024-04-11 01:07:14'),
(1183, 53, 'Melihat Halaman Check Engineering Activity.', 'ENGINEERING ACTIVITY', '2024-04-11 01:07:55', '2024-04-11 01:07:55'),
(1184, 53, 'Melihat Halaman Check Engineering Activity.', 'ENGINEERING ACTIVITY', '2024-04-11 01:08:28', '2024-04-11 01:08:28'),
(1185, 53, 'Melakukan Logout.', 'LOGOUT', '2024-04-11 01:08:59', '2024-04-11 01:08:59'),
(1186, 41, 'Melakukan Login.', 'LOGIN', '2024-04-11 01:09:09', '2024-04-11 01:09:09'),
(1187, 41, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-11 01:09:09', '2024-04-11 01:09:09'),
(1188, 41, 'Melihat Halaman Daftar Engineering Activity.', 'ENGINEERING ACTIVITY', '2024-04-11 01:09:32', '2024-04-11 01:09:32'),
(1189, 41, 'Melakukan Logout.', 'LOGOUT', '2024-04-11 01:10:55', '2024-04-11 01:10:55'),
(1190, 53, 'Melakukan Login.', 'LOGIN', '2024-04-11 01:12:05', '2024-04-11 01:12:05'),
(1191, 53, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-11 01:12:05', '2024-04-11 01:12:05'),
(1192, 53, 'Melihat Halaman Check Engineering Activity.', 'ENGINEERING ACTIVITY', '2024-04-11 01:12:25', '2024-04-11 01:12:25'),
(1193, 53, 'Melihat Halaman Check Engineering Activity.', 'ENGINEERING ACTIVITY', '2024-04-11 01:15:51', '2024-04-11 01:15:51'),
(1194, 53, 'Melakukan Check Engineering Activity.', 'ENGINEERING ACTIVITY', '2024-04-11 01:16:17', '2024-04-11 01:16:17'),
(1195, 53, 'Melihat Halaman Check Engineering Activity.', 'ENGINEERING ACTIVITY', '2024-04-11 01:16:17', '2024-04-11 01:16:17'),
(1196, 53, 'Melakukan Logout.', 'LOGOUT', '2024-04-11 01:17:10', '2024-04-11 01:17:10'),
(1197, 41, 'Melakukan Login.', 'LOGIN', '2024-04-11 01:17:19', '2024-04-11 01:17:19'),
(1198, 41, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-11 01:17:19', '2024-04-11 01:17:19'),
(1199, 41, 'Melihat Halaman Daftar Monthly Report Admin.', 'MONTHLY REPORT ADMIN', '2024-04-11 01:17:26', '2024-04-11 01:17:26'),
(1200, 41, 'Melihat Halaman Detail Monthly Report Admin.', 'MONTHLY REPORT ADMIN', '2024-04-11 01:17:31', '2024-04-11 01:17:31'),
(1201, 41, 'Melihat Halaman Daftar Monthly Report Admin.', 'MONTHLY REPORT ADMIN', '2024-04-11 01:17:46', '2024-04-11 01:17:46'),
(1202, 41, 'Melihat Halaman Detail Monthly Report Admin.', 'MONTHLY REPORT ADMIN', '2024-04-11 01:18:27', '2024-04-11 01:18:27'),
(1203, 41, 'Melakukan Logout.', 'LOGOUT', '2024-04-11 01:18:52', '2024-04-11 01:18:52'),
(1204, 57, 'Melakukan Login.', 'LOGIN', '2024-04-11 01:18:59', '2024-04-11 01:18:59'),
(1205, 57, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-11 01:18:59', '2024-04-11 01:18:59'),
(1206, 57, 'Melihat Halaman Daftar Monthly Report.', 'MONTHLY REPORT', '2024-04-11 01:19:06', '2024-04-11 01:19:06'),
(1207, 57, 'Melihat Halaman Detail Monthly Report.', 'MONTHLY REPORT', '2024-04-11 01:19:11', '2024-04-11 01:19:11'),
(1208, 57, 'Melihat Halaman Detail Monthly Report.', 'MONTHLY REPORT', '2024-04-11 01:27:05', '2024-04-11 01:27:05'),
(1209, 57, 'Melihat Halaman Detail Monthly Report.', 'MONTHLY REPORT', '2024-04-11 01:35:24', '2024-04-11 01:35:24'),
(1210, 57, 'Melihat Halaman Daftar Monthly Report.', 'MONTHLY REPORT', '2024-04-11 01:35:29', '2024-04-11 01:35:29'),
(1211, 57, 'Menambah Data Monthly Report.', 'MONTHLY REPORT', '2024-04-11 01:37:58', '2024-04-11 01:37:58'),
(1212, 57, 'Melihat Halaman Daftar Monthly Report.', 'MONTHLY REPORT', '2024-04-11 01:37:58', '2024-04-11 01:37:58'),
(1213, 57, 'Melihat Halaman Detail Monthly Report.', 'MONTHLY REPORT', '2024-04-11 01:38:02', '2024-04-11 01:38:02'),
(1214, 57, 'Melihat Halaman Daftar Monthly Report.', 'MONTHLY REPORT', '2024-04-11 01:38:27', '2024-04-11 01:38:27'),
(1215, 57, 'Melihat Halaman Detail Monthly Report.', 'MONTHLY REPORT', '2024-04-11 01:38:31', '2024-04-11 01:38:31'),
(1216, 57, 'Melihat Halaman Daftar Monthly Report.', 'MONTHLY REPORT', '2024-04-11 01:38:52', '2024-04-11 01:38:52'),
(1217, 57, 'Melihat Halaman Daftar Monthly Report.', 'MONTHLY REPORT', '2024-04-11 01:48:32', '2024-04-11 01:48:32'),
(1218, 57, 'Melihat Halaman Detail Monthly Report.', 'MONTHLY REPORT', '2024-04-11 01:48:35', '2024-04-11 01:48:35'),
(1219, 57, 'Melihat Halaman Form Edit Monthly Report.', 'MONTHLY REPORT', '2024-04-11 01:49:36', '2024-04-11 01:49:36'),
(1220, 57, 'Melihat Halaman Daftar Monthly Report.', 'MONTHLY REPORT', '2024-04-11 01:50:14', '2024-04-11 01:50:14'),
(1221, 57, 'Melihat Halaman Detail Monthly Report.', 'MONTHLY REPORT', '2024-04-11 01:50:22', '2024-04-11 01:50:22'),
(1222, 57, 'Melihat Halaman Detail Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:24:56', '2024-04-11 02:24:56'),
(1223, 57, 'Melihat Halaman Detail Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:25:39', '2024-04-11 02:25:39'),
(1224, 57, 'Melihat Halaman Detail Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:26:04', '2024-04-11 02:26:04'),
(1225, 57, 'Menambah Data Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:28:27', '2024-04-11 02:28:27'),
(1226, 57, 'Melihat Halaman Daftar Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:28:28', '2024-04-11 02:28:28'),
(1227, 57, 'Melihat Halaman Detail Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:28:34', '2024-04-11 02:28:34'),
(1228, 57, 'Melihat Halaman Daftar Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:28:39', '2024-04-11 02:28:39'),
(1229, 57, 'Melihat Halaman Daftar Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:30:41', '2024-04-11 02:30:41'),
(1230, 57, 'Melihat Halaman Daftar Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:40:34', '2024-04-11 02:40:34'),
(1231, 57, 'Melihat Halaman Daftar Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:40:37', '2024-04-11 02:40:37'),
(1232, 57, 'Melihat Halaman Daftar Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:40:48', '2024-04-11 02:40:48'),
(1233, 57, 'Melihat Halaman Daftar Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:42:06', '2024-04-11 02:42:06'),
(1234, 57, 'Melihat Halaman Check Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:42:10', '2024-04-11 02:42:10'),
(1235, 57, 'Melihat Halaman Check Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:42:36', '2024-04-11 02:42:36'),
(1236, 57, 'Melihat Halaman Check Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:42:54', '2024-04-11 02:42:54'),
(1237, 57, 'Melihat Halaman Form Edit Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:44:15', '2024-04-11 02:44:15'),
(1238, 57, 'Melihat Halaman Check Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:44:37', '2024-04-11 02:44:37'),
(1239, 57, 'Melihat Halaman Daftar Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:50:33', '2024-04-11 02:50:33'),
(1240, 57, 'Melihat Halaman Detail Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:50:36', '2024-04-11 02:50:36'),
(1241, 57, 'Melihat Halaman Form Edit Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:50:40', '2024-04-11 02:50:40'),
(1242, 57, 'Melihat Halaman Check Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:50:45', '2024-04-11 02:50:45'),
(1243, 57, 'Melihat Halaman Form Edit Check Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:50:48', '2024-04-11 02:50:48'),
(1244, 57, 'Melihat Halaman Form Edit Check Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:51:22', '2024-04-11 02:51:22'),
(1245, 57, 'Melihat Halaman Form Edit Check Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:51:37', '2024-04-11 02:51:37'),
(1246, 57, 'Melihat Halaman Form Edit Check Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:51:56', '2024-04-11 02:51:56'),
(1247, 57, 'Melihat Halaman Form Edit Check Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:53:03', '2024-04-11 02:53:03'),
(1248, 57, 'Mengedit Data Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:58:09', '2024-04-11 02:58:09'),
(1249, 57, 'Melihat Halaman Check Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:58:09', '2024-04-11 02:58:09'),
(1250, 57, 'Melihat Halaman Check Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:58:38', '2024-04-11 02:58:38'),
(1251, 57, 'Melihat Halaman Form Edit Check Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:58:41', '2024-04-11 02:58:41'),
(1252, 57, 'Mengedit Data Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:58:50', '2024-04-11 02:58:50'),
(1253, 57, 'Melihat Halaman Check Monthly Report.', 'MONTHLY REPORT', '2024-04-11 02:58:50', '2024-04-11 02:58:50'),
(1254, 57, 'Melihat Halaman Check Monthly Report.', 'MONTHLY REPORT', '2024-04-11 03:08:14', '2024-04-11 03:08:14'),
(1255, 57, 'Melihat Halaman Daftar Monthly Report.', 'MONTHLY REPORT', '2024-04-11 03:08:18', '2024-04-11 03:08:18'),
(1256, 57, 'Melihat Halaman Check Monthly Report.', 'MONTHLY REPORT', '2024-04-11 03:08:21', '2024-04-11 03:08:21'),
(1257, 57, 'Melihat Halaman Daftar Monthly Report.', 'MONTHLY REPORT', '2024-04-11 03:08:23', '2024-04-11 03:08:23'),
(1258, 57, 'Melihat Halaman Detail Monthly Report.', 'MONTHLY REPORT', '2024-04-11 03:08:25', '2024-04-11 03:08:25'),
(1259, 57, 'Melihat Halaman Check Monthly Report.', 'MONTHLY REPORT', '2024-04-11 03:08:32', '2024-04-11 03:08:32'),
(1260, 57, 'Melihat Halaman Check Monthly Report.', 'MONTHLY REPORT', '2024-04-11 03:16:04', '2024-04-11 03:16:04'),
(1261, 57, 'Melihat Halaman Check Monthly Report.', 'MONTHLY REPORT', '2024-04-11 03:16:38', '2024-04-11 03:16:38'),
(1262, 57, 'Melihat Halaman Check Monthly Report.', 'MONTHLY REPORT', '2024-04-11 03:17:14', '2024-04-11 03:17:14'),
(1263, 57, 'Melihat Halaman Check Monthly Report.', 'MONTHLY REPORT', '2024-04-11 03:43:30', '2024-04-11 03:43:30'),
(1264, 57, 'Melakukan Logout.', 'LOGOUT', '2024-04-11 03:44:18', '2024-04-11 03:44:18'),
(1265, 53, 'Melakukan Login.', 'LOGIN', '2024-04-11 03:45:05', '2024-04-11 03:45:05'),
(1266, 53, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-11 03:45:06', '2024-04-11 03:45:06'),
(1267, 53, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-11 03:57:11', '2024-04-11 03:57:11'),
(1268, 53, 'Melakukan Logout.', 'LOGOUT', '2024-04-11 03:57:16', '2024-04-11 03:57:16'),
(1269, 57, 'Melakukan Login.', 'LOGIN', '2024-04-11 03:58:26', '2024-04-11 03:58:26'),
(1270, 57, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-11 03:58:26', '2024-04-11 03:58:26'),
(1271, 57, 'Melihat Halaman Check Monthly Report.', 'MONTHLY REPORT', '2024-04-11 03:58:34', '2024-04-11 03:58:34'),
(1272, 57, 'Melihat Halaman Form Edit Check Monthly Report.', 'MONTHLY REPORT', '2024-04-11 03:58:40', '2024-04-11 03:58:40'),
(1273, 57, 'Mengedit Data Monthly Report.', 'MONTHLY REPORT', '2024-04-11 03:58:46', '2024-04-11 03:58:46'),
(1274, 57, 'Melihat Halaman Check Monthly Report.', 'MONTHLY REPORT', '2024-04-11 03:58:47', '2024-04-11 03:58:47'),
(1275, 57, 'Melakukan Logout.', 'LOGOUT', '2024-04-11 03:58:54', '2024-04-11 03:58:54'),
(1276, 53, 'Melakukan Login.', 'LOGIN', '2024-04-11 03:59:06', '2024-04-11 03:59:06'),
(1277, 53, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-11 03:59:06', '2024-04-11 03:59:06'),
(1278, 53, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-11 04:01:11', '2024-04-11 04:01:11'),
(1279, 53, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-11 04:06:58', '2024-04-11 04:06:58'),
(1280, 53, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-11 04:07:05', '2024-04-11 04:07:05'),
(1281, 53, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-11 04:07:42', '2024-04-11 04:07:42'),
(1282, 53, 'Melakukan Logout.', 'LOGOUT', '2024-04-11 04:11:32', '2024-04-11 04:11:32'),
(1283, 53, 'Melakukan Login.', 'LOGIN', '2024-04-11 04:13:09', '2024-04-11 04:13:09'),
(1284, 53, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-11 04:13:09', '2024-04-11 04:13:09'),
(1285, 53, 'Melakukan Logout.', 'LOGOUT', '2024-04-11 04:19:14', '2024-04-11 04:19:14'),
(1286, 57, 'Melakukan Login.', 'LOGIN', '2024-04-11 04:19:19', '2024-04-11 04:19:19'),
(1287, 57, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-11 04:19:20', '2024-04-11 04:19:20'),
(1288, 57, 'Melihat Halaman Daftar Monthly Report.', 'MONTHLY REPORT', '2024-04-11 04:19:25', '2024-04-11 04:19:25'),
(1289, 57, 'Melihat Halaman Check Monthly Report.', 'MONTHLY REPORT', '2024-04-11 04:19:28', '2024-04-11 04:19:28'),
(1290, 57, 'Melihat Halaman Daftar Monthly Report.', 'MONTHLY REPORT', '2024-04-11 04:19:30', '2024-04-11 04:19:30'),
(1291, 57, 'Melihat Halaman Detail Monthly Report.', 'MONTHLY REPORT', '2024-04-11 04:19:33', '2024-04-11 04:19:33'),
(1292, 57, 'Melihat Halaman Form Edit Monthly Report.', 'MONTHLY REPORT', '2024-04-11 04:19:43', '2024-04-11 04:19:43'),
(1293, 57, 'Mengedit Data Monthly Report.', 'MONTHLY REPORT', '2024-04-11 04:19:50', '2024-04-11 04:19:50'),
(1294, 57, 'Melihat Halaman Detail Monthly Report.', 'MONTHLY REPORT', '2024-04-11 04:19:51', '2024-04-11 04:19:51'),
(1295, 57, 'Melihat Halaman Monitoring LPS Tim Proyek.', 'LPS', '2024-04-11 04:40:05', '2024-04-11 04:40:05'),
(1296, 57, 'Melakukan Logout.', 'LOGOUT', '2024-04-11 04:40:49', '2024-04-11 04:40:49'),
(1297, 41, 'Melakukan Login.', 'LOGIN', '2024-04-11 06:06:32', '2024-04-11 06:06:32'),
(1298, 41, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-11 06:06:33', '2024-04-11 06:06:33'),
(1299, 41, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-11 07:10:44', '2024-04-11 07:10:44'),
(1300, 41, 'Melihat Halaman Form Tambah Proyek.', 'PROYEK', '2024-04-11 07:10:59', '2024-04-11 07:10:59'),
(1301, 41, 'Menambah Data Proyek.', 'PROYEK', '2024-04-11 07:11:40', '2024-04-11 07:11:40'),
(1302, 41, 'Melihat Halaman Daftar Proyek.', 'PROYEK', '2024-04-11 07:11:40', '2024-04-11 07:11:40'),
(1303, 41, 'Melihat Halaman Form Edit Proyek.', 'PROYEK', '2024-04-11 07:11:47', '2024-04-11 07:11:47'),
(1304, 41, 'Mengedit Data Proyek.', 'PROYEK', '2024-04-11 07:11:55', '2024-04-11 07:11:55'),
(1305, 41, 'Melihat Halaman Daftar Proyek.', 'PROYEK', '2024-04-11 07:11:55', '2024-04-11 07:11:55'),
(1306, 41, 'Melihat Halaman Review LPS.', 'LPS', '2024-04-11 07:12:04', '2024-04-11 07:12:04'),
(1307, 41, 'Melihat Halaman Detail LPS.', 'LPS', '2024-04-11 07:12:13', '2024-04-11 07:12:13'),
(1308, 41, 'Melihat Halaman Monitoring LPS.', 'LPS', '2024-04-11 07:12:28', '2024-04-11 07:12:28'),
(1309, 41, 'Melihat Halaman Detail Monitoring LPS.', 'LPS', '2024-04-11 07:12:39', '2024-04-11 07:12:39'),
(1310, 41, 'Melihat Halaman Progress LPS.', 'LPS', '2024-04-11 07:12:48', '2024-04-11 07:12:48'),
(1311, 41, 'Melihat Halaman Monitoring RKP.', 'RKP', '2024-04-11 07:13:14', '2024-04-11 07:13:14'),
(1312, 41, 'Melihat Halaman Form Tambah Proyek.', 'PROYEK', '2024-04-11 07:13:30', '2024-04-11 07:13:30'),
(1313, 41, 'Melihat Halaman Daftar Proyek.', 'PROYEK', '2024-04-11 07:13:33', '2024-04-11 07:13:33'),
(1314, 41, 'Melihat Halaman Form Edit Proyek.', 'PROYEK', '2024-04-11 07:13:46', '2024-04-11 07:13:46'),
(1315, 41, 'Mengedit Data Proyek.', 'PROYEK', '2024-04-11 07:13:54', '2024-04-11 07:13:54'),
(1316, 41, 'Melihat Halaman Daftar Proyek.', 'PROYEK', '2024-04-11 07:13:54', '2024-04-11 07:13:54'),
(1317, 41, 'Melihat Halaman Monitoring RKP.', 'RKP', '2024-04-11 07:13:59', '2024-04-11 07:13:59'),
(1318, 41, 'Melakukan Logout.', 'LOGOUT', '2024-04-11 07:14:05', '2024-04-11 07:14:05'),
(1319, 53, 'Melakukan Login.', 'LOGIN', '2024-04-11 07:14:13', '2024-04-11 07:14:13'),
(1320, 53, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-11 07:14:14', '2024-04-11 07:14:14'),
(1321, 53, 'Melihat Halaman Form Tambah RKP.', 'RKP', '2024-04-11 07:14:57', '2024-04-11 07:14:57'),
(1322, 53, 'Menambah Data RKP.', 'RKP', '2024-04-11 07:15:06', '2024-04-11 07:15:06'),
(1323, 53, 'Melihat Halaman Update RKP.', 'RKP', '2024-04-11 07:15:06', '2024-04-11 07:15:06'),
(1324, 53, 'Melihat Halaman Form Update RKP.', 'RKP', '2024-04-11 07:15:13', '2024-04-11 07:15:13'),
(1325, 53, 'Melihat Halaman Review LPS.', 'LPS', '2024-04-11 07:15:24', '2024-04-11 07:15:24'),
(1326, 53, 'Melihat Halaman Monitoring LPS.', 'LPS', '2024-04-11 07:15:38', '2024-04-11 07:15:38'),
(1327, 53, 'Melihat Halaman Detail Monitoring LPS.', 'LPS', '2024-04-11 07:15:41', '2024-04-11 07:15:41'),
(1328, 53, 'Melihat Halaman Monitoring RKP.', 'RKP', '2024-04-11 07:15:54', '2024-04-11 07:15:54'),
(1329, 53, 'Melihat Halaman Form Tambah Engineering Activity.', 'ENGINEERING ACTIVITY', '2024-04-11 08:23:52', '2024-04-11 08:23:52'),
(1330, 53, 'Melihat Halaman Form Tambah Engineering Activity.', 'ENGINEERING ACTIVITY', '2024-04-11 08:39:42', '2024-04-11 08:39:42'),
(1331, 53, 'Melihat Halaman Form Tambah Engineering Activity.', 'ENGINEERING ACTIVITY', '2024-04-11 08:43:48', '2024-04-11 08:43:48'),
(1332, 53, 'Melihat Halaman Daftar Lincese Software.', 'LICENSE SOFTWARE', '2024-04-11 08:52:14', '2024-04-11 08:52:14'),
(1333, 53, 'Melihat Halaman Daftar Lincese Software.', 'LICENSE SOFTWARE', '2024-04-11 08:54:45', '2024-04-11 08:54:45'),
(1334, 53, 'Melihat Halaman Daftar Lincese Software.', 'LICENSE SOFTWARE', '2024-04-11 08:57:46', '2024-04-11 08:57:46'),
(1335, 53, 'Melihat Halaman Monitoring Proyek CSI.', 'CSI', '2024-04-11 08:58:56', '2024-04-11 08:58:56'),
(1336, 53, 'Melihat Halaman Daftar Lincese Software.', 'LICENSE SOFTWARE', '2024-04-11 09:06:53', '2024-04-11 09:06:53'),
(1337, 53, 'Melihat Halaman Daftar Lincese Software.', 'LICENSE SOFTWARE', '2024-04-11 09:09:34', '2024-04-11 09:09:34'),
(1338, 53, 'Melihat Halaman Daftar Lincese Software.', 'LICENSE SOFTWARE', '2024-04-11 10:04:24', '2024-04-11 10:04:24'),
(1339, 53, 'Melihat Halaman Monitoring Lincese Software.', 'MONITORING LICENSE SOFTWARE', '2024-04-11 10:04:28', '2024-04-11 10:04:28'),
(1340, 53, 'Melihat Halaman Monitoring Lincese Software.', 'MONITORING LICENSE SOFTWARE', '2024-04-11 10:05:01', '2024-04-11 10:05:01'),
(1341, 53, 'Melihat Halaman Detail Lincese Software.', 'MONITORING LICENSE SOFTWARE', '2024-04-11 10:05:08', '2024-04-11 10:05:08'),
(1342, 53, 'Melihat Halaman Detail Lincese Software.', 'MONITORING LICENSE SOFTWARE', '2024-04-11 10:05:28', '2024-04-11 10:05:28'),
(1343, 53, 'Melihat Halaman Detail Lincese Software.', 'MONITORING LICENSE SOFTWARE', '2024-04-11 10:07:07', '2024-04-11 10:07:07'),
(1344, 53, 'Melakukan Logout.', 'LOGOUT', '2024-04-11 10:07:37', '2024-04-11 10:07:37'),
(1345, 41, 'Melakukan Login.', 'LOGIN', '2024-04-11 10:07:52', '2024-04-11 10:07:52'),
(1346, 41, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-11 10:07:52', '2024-04-11 10:07:52'),
(1347, 41, 'Melihat Halaman Daftar User.', 'USER', '2024-04-11 10:08:01', '2024-04-11 10:08:01'),
(1348, 41, 'Melakukan Logout.', 'LOGOUT', '2024-04-11 10:08:18', '2024-04-11 10:08:18'),
(1349, 60, 'Melakukan Login.', 'LOGIN', '2024-04-11 10:08:25', '2024-04-11 10:08:25'),
(1350, 60, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-11 10:08:26', '2024-04-11 10:08:26'),
(1351, 60, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-11 10:09:01', '2024-04-11 10:09:01'),
(1352, 60, 'Melihat Halaman Monitoring Lincese Software.', 'MONITORING LICENSE SOFTWARE', '2024-04-11 10:09:06', '2024-04-11 10:09:06'),
(1353, 60, 'Melihat Halaman Detail Lincese Software.', 'MONITORING LICENSE SOFTWARE', '2024-04-11 10:09:18', '2024-04-11 10:09:18'),
(1354, 60, 'Melihat Halaman Detail Lincese Software.', 'MONITORING LICENSE SOFTWARE', '2024-04-11 10:10:53', '2024-04-11 10:10:53'),
(1355, 60, 'Melihat Halaman Detail Lincese Software.', 'MONITORING LICENSE SOFTWARE', '2024-04-11 10:12:04', '2024-04-11 10:12:04'),
(1356, 60, 'Melihat Halaman Monitoring Lincese Software.', 'MONITORING LICENSE SOFTWARE', '2024-04-11 10:12:08', '2024-04-11 10:12:08'),
(1357, 60, 'Melihat Halaman Monitoring Lincese Software.', 'MONITORING LICENSE SOFTWARE', '2024-04-11 11:12:32', '2024-04-11 11:12:32'),
(1358, 60, 'Melihat Halaman Detail Lincese Software.', 'MONITORING LICENSE SOFTWARE', '2024-04-11 11:18:16', '2024-04-11 11:18:16'),
(1359, 60, 'Melihat Halaman Monitoring Lincese Software.', 'MONITORING LICENSE SOFTWARE', '2024-04-11 11:18:23', '2024-04-11 11:18:23'),
(1360, 60, 'Melihat Halaman Detail Lincese Software.', 'MONITORING LICENSE SOFTWARE', '2024-04-11 11:18:26', '2024-04-11 11:18:26'),
(1361, 60, 'Melihat Halaman Monitoring Lincese Software.', 'MONITORING LICENSE SOFTWARE', '2024-04-11 11:18:37', '2024-04-11 11:18:37'),
(1362, 60, 'Melihat Halaman Detail Lincese Software.', 'MONITORING LICENSE SOFTWARE', '2024-04-11 11:18:49', '2024-04-11 11:18:49'),
(1363, 60, 'Melihat Halaman Monitoring Lincese Software.', 'MONITORING LICENSE SOFTWARE', '2024-04-11 11:18:56', '2024-04-11 11:18:56'),
(1364, 60, 'Melihat Halaman Monitoring Lincese Software.', 'MONITORING LICENSE SOFTWARE', '2024-04-11 11:34:05', '2024-04-11 11:34:05'),
(1365, 60, 'Melihat Halaman Monitoring Lincese Software.', 'MONITORING LICENSE SOFTWARE', '2024-04-11 11:41:58', '2024-04-11 11:41:58'),
(1366, 60, 'Melihat Halaman Daftar Lincese Software.', 'LICENSE SOFTWARE', '2024-04-11 11:50:34', '2024-04-11 11:50:34'),
(1367, 60, 'Melihat Halaman Monitoring Lincese Software.', 'MONITORING LICENSE SOFTWARE', '2024-04-11 11:52:49', '2024-04-11 11:52:49'),
(1368, 60, 'Melihat Halaman Monitoring Lincese Software.', 'MONITORING LICENSE SOFTWARE', '2024-04-11 11:55:53', '2024-04-11 11:55:53'),
(1369, 60, 'Melihat Halaman Daftar Productivity By Team.', 'PRODUCTIVITY', '2024-04-11 12:30:43', '2024-04-11 12:30:43'),
(1370, 60, 'Melihat Halaman Daftar Productivity By Team.', 'PRODUCTIVITY', '2024-04-11 12:30:50', '2024-04-11 12:30:50'),
(1371, 60, 'Melihat Halaman Monitoring LPS.', 'LPS', '2024-04-11 12:31:03', '2024-04-11 12:31:03'),
(1372, 60, 'Melihat Halaman Detail Monitoring LPS.', 'LPS', '2024-04-11 12:31:08', '2024-04-11 12:31:08'),
(1373, 60, 'Melihat Halaman Monitoring Proyek CSI.', 'CSI', '2024-04-11 12:32:01', '2024-04-11 12:32:01'),
(1374, 60, 'Melihat Halaman Daftar SNI.', 'SNI', '2024-04-11 12:32:07', '2024-04-11 12:32:07'),
(1375, 60, 'Melihat Halaman Monitoring LPS.', 'LPS', '2024-04-11 12:47:14', '2024-04-11 12:47:14'),
(1376, 60, 'Melihat Halaman Monitoring RKP.', 'RKP', '2024-04-11 12:47:21', '2024-04-11 12:47:21'),
(1377, 60, 'Melihat Halaman Monitoring LPS.', 'LPS', '2024-04-11 12:48:15', '2024-04-11 12:48:15'),
(1378, 60, 'Melihat Halaman Monitoring LPS.', 'LPS', '2024-04-11 12:50:20', '2024-04-11 12:50:20'),
(1379, 60, 'Melihat Halaman Detail Monitoring LPS.', 'LPS', '2024-04-11 12:52:42', '2024-04-11 12:52:42'),
(1380, 60, 'Melihat Halaman Detail Monitoring LPS.', 'LPS', '2024-04-11 12:54:32', '2024-04-11 12:54:32'),
(1381, 60, 'Melihat Halaman Detail Monitoring LPS.', 'LPS', '2024-04-11 12:54:58', '2024-04-11 12:54:58'),
(1382, 60, 'Melihat Halaman Detail Monitoring LPS.', 'LPS', '2024-04-11 13:07:21', '2024-04-11 13:07:21'),
(1383, 60, 'Melihat Halaman Monitoring LPS.', 'LPS', '2024-04-11 13:09:05', '2024-04-11 13:09:05'),
(1384, 60, 'Melihat Halaman Detail Monitoring LPS.', 'LPS', '2024-04-11 13:09:09', '2024-04-11 13:09:09'),
(1385, 60, 'Melakukan Login.', 'LOGIN', '2024-04-11 15:12:17', '2024-04-11 15:12:17'),
(1386, 60, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-11 15:12:18', '2024-04-11 15:12:18'),
(1387, 60, 'Melihat Halaman Monitoring LPS.', 'LPS', '2024-04-11 15:13:41', '2024-04-11 15:13:41'),
(1388, 60, 'Melihat Halaman Monitoring Lincese Software.', 'MONITORING LICENSE SOFTWARE', '2024-04-11 15:13:48', '2024-04-11 15:13:48'),
(1389, 60, 'Melihat Halaman Monitoring LPS.', 'LPS', '2024-04-11 15:14:44', '2024-04-11 15:14:44'),
(1390, 60, 'Melihat Halaman Monitoring Lincese Software.', 'MONITORING LICENSE SOFTWARE', '2024-04-11 15:14:49', '2024-04-11 15:14:49'),
(1391, 60, 'Melihat Halaman Monitoring LPS.', 'LPS', '2024-04-11 15:15:13', '2024-04-11 15:15:13'),
(1392, 60, 'Melihat Halaman Detail Monitoring LPS.', 'LPS', '2024-04-11 15:15:23', '2024-04-11 15:15:23'),
(1393, 60, 'Melihat Halaman Monitoring RKP.', 'RKP', '2024-04-11 15:17:55', '2024-04-11 15:17:55'),
(1394, 60, 'Melihat Halaman Monitoring Proyek CSI.', 'CSI', '2024-04-11 15:18:23', '2024-04-11 15:18:23'),
(1395, 60, 'Melihat Halaman Monitoring LPS.', 'LPS', '2024-04-11 15:18:50', '2024-04-11 15:18:50'),
(1396, 60, 'Melihat Halaman Monitoring Proyek CSI.', 'CSI', '2024-04-11 15:19:00', '2024-04-11 15:19:00'),
(1397, 60, 'Melakukan Logout.', 'LOGOUT', '2024-04-11 15:19:29', '2024-04-11 15:19:29'),
(1398, 53, 'Melakukan Login.', 'LOGIN', '2024-04-11 15:19:50', '2024-04-11 15:19:50'),
(1399, 53, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-11 15:19:51', '2024-04-11 15:19:51'),
(1400, 53, 'Melihat Halaman Monitoring Proyek CSI.', 'CSI', '2024-04-11 15:20:03', '2024-04-11 15:20:03'),
(1401, 53, 'Melihat Halaman Detail Proyek CSI.', 'CSI', '2024-04-11 15:20:08', '2024-04-11 15:20:08'),
(1402, 53, 'Melihat Halaman Monitoring Proyek CSI.', 'CSI', '2024-04-11 15:20:49', '2024-04-11 15:20:49'),
(1403, 53, 'Melakukan Logout.', 'LOGOUT', '2024-04-11 15:20:57', '2024-04-11 15:20:57'),
(1404, 60, 'Melakukan Login.', 'LOGIN', '2024-04-11 15:21:08', '2024-04-11 15:21:08'),
(1405, 60, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-11 15:21:08', '2024-04-11 15:21:08'),
(1406, 60, 'Melihat Halaman Daftar Productivity By Team.', 'PRODUCTIVITY', '2024-04-11 15:21:23', '2024-04-11 15:21:23'),
(1407, 60, 'Melihat Halaman Daftar Productivity By Team.', 'PRODUCTIVITY', '2024-04-11 15:21:33', '2024-04-11 15:21:33'),
(1408, 60, 'Melihat Halaman Daftar Productivity By Person.', 'PRODUCTIVITY', '2024-04-11 15:22:03', '2024-04-11 15:22:03'),
(1409, 60, 'Melihat Halaman Daftar Productivity By Person.', 'PRODUCTIVITY', '2024-04-11 15:22:08', '2024-04-11 15:22:08'),
(1410, 60, 'Melihat Halaman Daftar Productivity By Person.', 'PRODUCTIVITY', '2024-04-11 15:22:28', '2024-04-11 15:22:28'),
(1411, 60, 'Melihat Halaman Daftar Productivity By Person.', 'PRODUCTIVITY', '2024-04-11 15:22:34', '2024-04-11 15:22:34'),
(1412, 60, 'Melihat Halaman Daftar Productivity By Person.', 'PRODUCTIVITY', '2024-04-11 15:22:46', '2024-04-11 15:22:46'),
(1413, 60, 'Melihat Halaman Daftar Productivity By Person.', 'PRODUCTIVITY', '2024-04-11 15:24:33', '2024-04-11 15:24:33'),
(1414, 60, 'Melihat Halaman Daftar Productivity By Person.', 'PRODUCTIVITY', '2024-04-11 15:24:51', '2024-04-11 15:24:51'),
(1415, 60, 'Melihat Halaman Monitoring Lincese Software.', 'MONITORING LICENSE SOFTWARE', '2024-04-11 15:25:15', '2024-04-11 15:25:15'),
(1416, 60, 'Melihat Halaman Daftar Productivity By Person.', 'PRODUCTIVITY', '2024-04-11 15:33:44', '2024-04-11 15:33:44'),
(1417, 60, 'Melihat Halaman Daftar Productivity By Person.', 'PRODUCTIVITY', '2024-04-11 15:33:54', '2024-04-11 15:33:54'),
(1418, 60, 'Melihat Halaman Daftar Productivity By Team.', 'PRODUCTIVITY', '2024-04-11 15:36:02', '2024-04-11 15:36:02'),
(1419, 60, 'Melihat Halaman Daftar Productivity By Person.', 'PRODUCTIVITY', '2024-04-11 15:36:10', '2024-04-11 15:36:10'),
(1420, 60, 'Melihat Halaman Daftar Productivity By Person.', 'PRODUCTIVITY', '2024-04-11 15:36:24', '2024-04-11 15:36:24'),
(1421, 60, 'Melihat Halaman Daftar Productivity By Person.', 'PRODUCTIVITY', '2024-04-11 15:38:00', '2024-04-11 15:38:00'),
(1422, 60, 'Melihat Halaman Daftar Productivity By Person.', 'PRODUCTIVITY', '2024-04-11 15:38:11', '2024-04-11 15:38:11'),
(1423, 60, 'Melihat Halaman Monitoring RKP.', 'RKP', '2024-04-11 15:39:57', '2024-04-11 15:39:57'),
(1424, 60, 'Melihat Halaman Monitoring LPS.', 'LPS', '2024-04-11 15:42:07', '2024-04-11 15:42:07'),
(1425, 60, 'Melakukan Logout.', 'LOGOUT', '2024-04-11 15:42:25', '2024-04-11 15:42:25'),
(1426, 53, 'Melakukan Login.', 'LOGIN', '2024-04-11 15:42:37', '2024-04-11 15:42:37'),
(1427, 53, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-11 15:42:38', '2024-04-11 15:42:38'),
(1428, 53, 'Melihat Halaman Form Tambah Engineering Activity.', 'ENGINEERING ACTIVITY', '2024-04-11 15:42:47', '2024-04-11 15:42:47'),
(1429, 53, 'Melakukan Logout.', 'LOGOUT', '2024-04-11 15:47:30', '2024-04-11 15:47:30'),
(1430, 41, 'Melakukan Login.', 'LOGIN', '2024-04-11 15:47:49', '2024-04-11 15:47:49'),
(1431, 41, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-11 15:47:50', '2024-04-11 15:47:50'),
(1432, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-04-11 15:48:06', '2024-04-11 15:48:06'),
(1433, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-04-11 15:59:02', '2024-04-11 15:59:02'),
(1434, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-04-11 16:04:08', '2024-04-11 16:04:08'),
(1435, 41, 'Melihat Halaman Daftar User.', 'USER', '2024-04-11 16:07:04', '2024-04-11 16:07:04'),
(1436, 41, 'Melihat Halaman Daftar Proyek.', 'PROYEK', '2024-04-11 16:07:11', '2024-04-11 16:07:11'),
(1437, 41, 'Melihat Halaman Daftar Proyek.', 'PROYEK', '2024-04-11 16:07:45', '2024-04-11 16:07:45'),
(1438, 41, 'Melihat Halaman Review LPS.', 'LPS', '2024-04-11 16:17:23', '2024-04-11 16:17:23');
INSERT INTO `log` (`id_log`, `id_user`, `activity`, `feature`, `created_at`, `updated_at`) VALUES
(1439, 41, 'Melihat Halaman Detail LPS.', 'LPS', '2024-04-11 16:17:28', '2024-04-11 16:17:28'),
(1440, 41, 'Mengedit Data LPS.', 'LPS', '2024-04-11 16:22:40', '2024-04-11 16:22:40'),
(1441, 41, 'Melihat Halaman Detail LPS.', 'LPS', '2024-04-11 16:22:40', '2024-04-11 16:22:40'),
(1442, 41, 'Mengedit Data LPS.', 'LPS', '2024-04-11 16:23:04', '2024-04-11 16:23:04'),
(1443, 41, 'Melihat Halaman Detail LPS.', 'LPS', '2024-04-11 16:23:05', '2024-04-11 16:23:05'),
(1444, 41, 'Melakukan Login.', 'LOGIN', '2024-04-12 07:09:58', '2024-04-12 07:09:58'),
(1445, 41, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-12 07:09:59', '2024-04-12 07:09:59'),
(1446, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-04-12 07:10:06', '2024-04-12 07:10:06'),
(1447, 41, 'Melihat Halaman Form Tambah User.', 'USER', '2024-04-12 07:14:17', '2024-04-12 07:14:17'),
(1448, 41, 'Melakukan Logout.', 'LOGOUT', '2024-04-12 07:15:27', '2024-04-12 07:15:27'),
(1449, 61, 'Melakukan Login.', 'LOGIN', '2024-04-12 07:16:35', '2024-04-12 07:16:35'),
(1450, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-12 07:16:36', '2024-04-12 07:16:36'),
(1451, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 07:24:55', '2024-04-12 07:24:55'),
(1452, 61, 'Melihat Halaman Form Tambah Task PCP.', 'Task PCP', '2024-04-12 07:25:00', '2024-04-12 07:25:00'),
(1453, 61, 'Melakukan Logout.', 'LOGOUT', '2024-04-12 07:29:56', '2024-04-12 07:29:56'),
(1454, 64, 'Melakukan Login.', 'LOGIN', '2024-04-12 07:30:08', '2024-04-12 07:30:08'),
(1455, 64, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-12 07:30:08', '2024-04-12 07:30:08'),
(1456, 64, 'Melakukan Logout.', 'LOGOUT', '2024-04-12 07:30:18', '2024-04-12 07:30:18'),
(1457, 61, 'Melakukan Login.', 'LOGIN', '2024-04-12 07:30:26', '2024-04-12 07:30:26'),
(1458, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-12 07:30:27', '2024-04-12 07:30:27'),
(1459, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 07:32:03', '2024-04-12 07:32:03'),
(1460, 61, 'Melihat Halaman Form Tambah Task PCP.', 'Task PCP', '2024-04-12 07:32:07', '2024-04-12 07:32:07'),
(1461, 61, 'Melihat Halaman Form Tambah Task PCP.', 'Task PCP', '2024-04-12 07:35:43', '2024-04-12 07:35:43'),
(1462, 61, 'Menambah Data Task PCP.', 'Task PCP', '2024-04-12 07:36:01', '2024-04-12 07:36:01'),
(1463, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 07:36:02', '2024-04-12 07:36:02'),
(1464, 61, 'Melihat Halaman PIC Divisi Task PCP.', 'Task PCP', '2024-04-12 07:36:17', '2024-04-12 07:36:17'),
(1465, 61, 'Menambah Data PIC Divisi Task PCP.', 'Task PCP', '2024-04-12 07:36:24', '2024-04-12 07:36:24'),
(1466, 61, 'Melihat Halaman PIC Divisi Task PCP.', 'Task PCP', '2024-04-12 07:36:24', '2024-04-12 07:36:24'),
(1467, 61, 'Menambah Data PIC Divisi Task PCP.', 'Task PCP', '2024-04-12 07:36:32', '2024-04-12 07:36:32'),
(1468, 61, 'Melihat Halaman PIC Divisi Task PCP.', 'Task PCP', '2024-04-12 07:36:33', '2024-04-12 07:36:33'),
(1469, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 07:36:35', '2024-04-12 07:36:35'),
(1470, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 07:36:43', '2024-04-12 07:36:43'),
(1471, 61, 'Menambah Data PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 07:36:56', '2024-04-12 07:36:56'),
(1472, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 07:36:57', '2024-04-12 07:36:57'),
(1473, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 07:37:00', '2024-04-12 07:37:00'),
(1474, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 07:37:08', '2024-04-12 07:37:08'),
(1475, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 07:37:17', '2024-04-12 07:37:17'),
(1476, 61, 'Melakukan Logout.', 'LOGOUT', '2024-04-12 07:37:35', '2024-04-12 07:37:35'),
(1477, 64, 'Melakukan Login.', 'LOGIN', '2024-04-12 07:37:42', '2024-04-12 07:37:42'),
(1478, 64, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-12 07:37:42', '2024-04-12 07:37:42'),
(1479, 64, 'Melihat Halaman Daftar Monthy Report PCP.', 'Monthly Report PCP', '2024-04-12 07:37:56', '2024-04-12 07:37:56'),
(1480, 64, 'Melakukan Logout.', 'LOGOUT', '2024-04-12 07:47:26', '2024-04-12 07:47:26'),
(1481, 61, 'Melakukan Login.', 'LOGIN', '2024-04-12 07:47:33', '2024-04-12 07:47:33'),
(1482, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-12 07:47:33', '2024-04-12 07:47:33'),
(1483, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 07:47:38', '2024-04-12 07:47:38'),
(1484, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 08:56:32', '2024-04-12 08:56:32'),
(1485, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 09:04:30', '2024-04-12 09:04:30'),
(1486, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 09:04:34', '2024-04-12 09:04:34'),
(1487, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 09:06:42', '2024-04-12 09:06:42'),
(1488, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 09:06:50', '2024-04-12 09:06:50'),
(1489, 61, 'Menambah Data PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 09:07:04', '2024-04-12 09:07:04'),
(1490, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 09:07:42', '2024-04-12 09:07:42'),
(1491, 61, 'Menghapus Data PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 09:07:49', '2024-04-12 09:07:49'),
(1492, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 09:07:49', '2024-04-12 09:07:49'),
(1493, 61, 'Menambah Data PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 09:08:06', '2024-04-12 09:08:06'),
(1494, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 09:08:06', '2024-04-12 09:08:06'),
(1495, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 09:08:10', '2024-04-12 09:08:10'),
(1496, 61, 'Melihat Halaman Form Tambah Task PCP.', 'Task PCP', '2024-04-12 09:10:55', '2024-04-12 09:10:55'),
(1497, 61, 'Melihat Halaman Form Tambah Task PCP.', 'Task PCP', '2024-04-12 09:11:58', '2024-04-12 09:11:58'),
(1498, 61, 'Melihat Halaman Form Tambah Task PCP.', 'Task PCP', '2024-04-12 09:13:16', '2024-04-12 09:13:16'),
(1499, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 09:43:18', '2024-04-12 09:43:18'),
(1500, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 09:50:00', '2024-04-12 09:50:00'),
(1501, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 09:50:31', '2024-04-12 09:50:31'),
(1502, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 09:52:18', '2024-04-12 09:52:18'),
(1503, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 10:03:39', '2024-04-12 10:03:39'),
(1504, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 10:06:13', '2024-04-12 10:06:13'),
(1505, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 10:07:00', '2024-04-12 10:07:00'),
(1506, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 10:07:27', '2024-04-12 10:07:27'),
(1507, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 10:10:32', '2024-04-12 10:10:32'),
(1508, 61, 'Melihat Halaman Form Edit Task PCP.', 'Task PCP', '2024-04-12 10:15:23', '2024-04-12 10:15:23'),
(1509, 61, 'Melihat Halaman Form Edit Task PCP.', 'Task PCP', '2024-04-12 10:23:59', '2024-04-12 10:23:59'),
(1510, 61, 'Melihat Halaman Form Edit Task PCP.', 'Task PCP', '2024-04-12 10:24:28', '2024-04-12 10:24:28'),
(1511, 61, 'Mengedit Data Task PCP.', 'Task PCP', '2024-04-12 10:24:55', '2024-04-12 10:24:55'),
(1512, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 10:24:56', '2024-04-12 10:24:56'),
(1513, 61, 'Melihat Halaman Detail Task PCP.', 'Task PCP', '2024-04-12 10:25:13', '2024-04-12 10:25:13'),
(1514, 61, 'Melihat Halaman Detail Task PCP.', 'Task PCP', '2024-04-12 10:26:48', '2024-04-12 10:26:48'),
(1515, 61, 'Melihat Halaman Detail Task PCP.', 'Task PCP', '2024-04-12 10:28:39', '2024-04-12 10:28:39'),
(1516, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 10:28:50', '2024-04-12 10:28:50'),
(1517, 61, 'Melihat Halaman Form Edit Task PCP.', 'Task PCP', '2024-04-12 10:29:03', '2024-04-12 10:29:03'),
(1518, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 10:29:30', '2024-04-12 10:29:30'),
(1519, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 10:30:50', '2024-04-12 10:30:50'),
(1520, 61, 'Melihat Halaman Form Edit Task PCP.', 'Task PCP', '2024-04-12 10:30:55', '2024-04-12 10:30:55'),
(1521, 61, 'Mengedit Data Task PCP.', 'Task PCP', '2024-04-12 10:31:00', '2024-04-12 10:31:00'),
(1522, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 10:31:01', '2024-04-12 10:31:01'),
(1523, 61, 'Melihat Halaman Form Edit Task PCP.', 'Task PCP', '2024-04-12 10:31:07', '2024-04-12 10:31:07'),
(1524, 61, 'Mengedit Data Task PCP.', 'Task PCP', '2024-04-12 10:31:21', '2024-04-12 10:31:21'),
(1525, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 10:31:21', '2024-04-12 10:31:21'),
(1526, 61, 'Melakukan Logout.', 'LOGOUT', '2024-04-12 10:37:19', '2024-04-12 10:37:19'),
(1527, 63, 'Melakukan Login.', 'LOGIN', '2024-04-12 10:37:27', '2024-04-12 10:37:27'),
(1528, 63, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-12 10:37:27', '2024-04-12 10:37:27'),
(1529, 63, 'Melakukan Logout.', 'LOGOUT', '2024-04-12 10:37:36', '2024-04-12 10:37:36'),
(1530, 64, 'Melakukan Login.', 'LOGIN', '2024-04-12 10:37:46', '2024-04-12 10:37:46'),
(1531, 64, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-12 10:37:46', '2024-04-12 10:37:46'),
(1532, 64, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-12 10:39:59', '2024-04-12 10:39:59'),
(1533, 64, 'Melakukan Logout.', 'LOGOUT', '2024-04-12 11:28:49', '2024-04-12 11:28:49'),
(1534, 61, 'Melakukan Login.', 'LOGIN', '2024-04-12 11:29:00', '2024-04-12 11:29:00'),
(1535, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-12 11:29:01', '2024-04-12 11:29:01'),
(1536, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 11:29:06', '2024-04-12 11:29:06'),
(1537, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:29:13', '2024-04-12 11:29:13'),
(1538, 61, 'Menghapus Data PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:29:18', '2024-04-12 11:29:18'),
(1539, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:29:18', '2024-04-12 11:29:18'),
(1540, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 11:29:25', '2024-04-12 11:29:25'),
(1541, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:29:31', '2024-04-12 11:29:31'),
(1542, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 11:29:37', '2024-04-12 11:29:37'),
(1543, 61, 'Melihat Halaman Form Tambah Task PCP.', 'Task PCP', '2024-04-12 11:29:41', '2024-04-12 11:29:41'),
(1544, 61, 'Menambah Data Task PCP.', 'Task PCP', '2024-04-12 11:30:14', '2024-04-12 11:30:14'),
(1545, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 11:30:14', '2024-04-12 11:30:14'),
(1546, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:30:25', '2024-04-12 11:30:25'),
(1547, 61, 'Menambah Data PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:30:38', '2024-04-12 11:30:38'),
(1548, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:30:39', '2024-04-12 11:30:39'),
(1549, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 11:30:44', '2024-04-12 11:30:44'),
(1550, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 11:31:52', '2024-04-12 11:31:52'),
(1551, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:31:59', '2024-04-12 11:31:59'),
(1552, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 11:32:02', '2024-04-12 11:32:02'),
(1553, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:32:07', '2024-04-12 11:32:07'),
(1554, 61, 'Menghapus Data PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:32:16', '2024-04-12 11:32:16'),
(1555, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:32:17', '2024-04-12 11:32:17'),
(1556, 61, 'Menambah Data PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:32:27', '2024-04-12 11:32:27'),
(1557, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:32:28', '2024-04-12 11:32:28'),
(1558, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 11:32:32', '2024-04-12 11:32:32'),
(1559, 61, 'Melihat Halaman Form Tambah Task PCP.', 'Task PCP', '2024-04-12 11:32:37', '2024-04-12 11:32:37'),
(1560, 61, 'Menambah Data Task PCP.', 'Task PCP', '2024-04-12 11:33:02', '2024-04-12 11:33:02'),
(1561, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 11:33:03', '2024-04-12 11:33:03'),
(1562, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:33:10', '2024-04-12 11:33:10'),
(1563, 61, 'Menambah Data PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:33:43', '2024-04-12 11:33:43'),
(1564, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:33:43', '2024-04-12 11:33:43'),
(1565, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 11:33:49', '2024-04-12 11:33:49'),
(1566, 61, 'Melihat Halaman Form Tambah Task PCP.', 'Task PCP', '2024-04-12 11:33:56', '2024-04-12 11:33:56'),
(1567, 61, 'Menambah Data Task PCP.', 'Task PCP', '2024-04-12 11:34:21', '2024-04-12 11:34:21'),
(1568, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 11:34:21', '2024-04-12 11:34:21'),
(1569, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:34:29', '2024-04-12 11:34:29'),
(1570, 61, 'Menambah Data PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:34:38', '2024-04-12 11:34:38'),
(1571, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:34:39', '2024-04-12 11:34:39'),
(1572, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 11:34:45', '2024-04-12 11:34:45'),
(1573, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:34:51', '2024-04-12 11:34:51'),
(1574, 61, 'Menambah Data PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:34:59', '2024-04-12 11:34:59'),
(1575, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:35:00', '2024-04-12 11:35:00'),
(1576, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 11:35:03', '2024-04-12 11:35:03'),
(1577, 61, 'Melihat Halaman Form Tambah Task PCP.', 'Task PCP', '2024-04-12 11:35:06', '2024-04-12 11:35:06'),
(1578, 61, 'Menambah Data Task PCP.', 'Task PCP', '2024-04-12 11:35:31', '2024-04-12 11:35:31'),
(1579, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 11:35:31', '2024-04-12 11:35:31'),
(1580, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:35:38', '2024-04-12 11:35:38'),
(1581, 61, 'Menambah Data PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:35:45', '2024-04-12 11:35:45'),
(1582, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:35:46', '2024-04-12 11:35:46'),
(1583, 61, 'Menambah Data PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:35:53', '2024-04-12 11:35:53'),
(1584, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:35:54', '2024-04-12 11:35:54'),
(1585, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 11:35:57', '2024-04-12 11:35:57'),
(1586, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:36:05', '2024-04-12 11:36:05'),
(1587, 61, 'Menambah Data PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:36:15', '2024-04-12 11:36:15'),
(1588, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:36:16', '2024-04-12 11:36:16'),
(1589, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 11:36:19', '2024-04-12 11:36:19'),
(1590, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:36:25', '2024-04-12 11:36:25'),
(1591, 61, 'Menambah Data PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:36:38', '2024-04-12 11:36:38'),
(1592, 61, 'Melihat Halaman PIC Tujuan Task PCP.', 'Task PCP', '2024-04-12 11:36:38', '2024-04-12 11:36:38'),
(1593, 61, 'Melakukan Logout.', 'LOGOUT', '2024-04-12 11:37:09', '2024-04-12 11:37:09'),
(1594, 64, 'Melakukan Login.', 'LOGIN', '2024-04-12 11:37:27', '2024-04-12 11:37:27'),
(1595, 64, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-12 11:37:27', '2024-04-12 11:37:27'),
(1596, 64, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 11:37:34', '2024-04-12 11:37:34'),
(1597, 64, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 11:45:11', '2024-04-12 11:45:11'),
(1598, 64, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 11:46:22', '2024-04-12 11:46:22'),
(1599, 64, 'Melihat Halaman Detail Task PCP.', 'Task PCP', '2024-04-12 11:46:33', '2024-04-12 11:46:33'),
(1600, 64, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 11:46:54', '2024-04-12 11:46:54'),
(1601, 64, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 11:53:13', '2024-04-12 11:53:13'),
(1602, 64, 'Melihat Halaman Detail Task PCP.', 'Task PCP', '2024-04-12 11:53:24', '2024-04-12 11:53:24'),
(1603, 64, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 12:14:08', '2024-04-12 12:14:08'),
(1604, 64, 'Melihat Halaman Detail Task PCP.', 'Task PCP', '2024-04-12 12:14:13', '2024-04-12 12:14:13'),
(1605, 64, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 12:14:26', '2024-04-12 12:14:26'),
(1606, 64, 'Melihat Halaman Form Edit Task PCP.', 'Task PCP', '2024-04-12 12:14:31', '2024-04-12 12:14:31'),
(1607, 64, 'Melihat Halaman Form Edit Task PCP.', 'Task PCP', '2024-04-12 12:15:25', '2024-04-12 12:15:25'),
(1608, 64, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 12:15:34', '2024-04-12 12:15:34'),
(1609, 64, 'Melihat Halaman Detail Task PCP.', 'Task PCP', '2024-04-12 12:15:39', '2024-04-12 12:15:39'),
(1610, 64, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 12:15:44', '2024-04-12 12:15:44'),
(1611, 64, 'Melihat Halaman Form Edit Task PCP.', 'Task PCP', '2024-04-12 12:15:48', '2024-04-12 12:15:48'),
(1612, 64, 'Mengedit Data Task PCP.', 'Task PCP', '2024-04-12 12:15:52', '2024-04-12 12:15:52'),
(1613, 64, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 12:15:53', '2024-04-12 12:15:53'),
(1614, 64, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 12:17:02', '2024-04-12 12:17:02'),
(1615, 64, 'Melihat Halaman Detail Task PCP.', 'Task PCP', '2024-04-12 12:17:26', '2024-04-12 12:17:26'),
(1616, 64, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 12:17:30', '2024-04-12 12:17:30'),
(1617, 64, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 12:20:48', '2024-04-12 12:20:48'),
(1618, 64, 'Melihat Halaman Detail Task PCP.', 'Task PCP', '2024-04-12 12:20:54', '2024-04-12 12:20:54'),
(1619, 64, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 12:20:59', '2024-04-12 12:20:59'),
(1620, 64, 'Melihat Halaman Form Edit Task PCP.', 'Task PCP', '2024-04-12 12:21:02', '2024-04-12 12:21:02'),
(1621, 64, 'Mengedit Data Task PCP.', 'Task PCP', '2024-04-12 12:21:06', '2024-04-12 12:21:06'),
(1622, 64, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 12:21:06', '2024-04-12 12:21:06'),
(1623, 64, 'Melihat Halaman Detail Task PCP.', 'Task PCP', '2024-04-12 12:21:11', '2024-04-12 12:21:11'),
(1624, 64, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 12:21:17', '2024-04-12 12:21:17'),
(1625, 64, 'Melakukan Logout.', 'LOGOUT', '2024-04-12 12:21:24', '2024-04-12 12:21:24'),
(1626, 61, 'Melakukan Login.', 'LOGIN', '2024-04-12 12:21:32', '2024-04-12 12:21:32'),
(1627, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-12 12:21:33', '2024-04-12 12:21:33'),
(1628, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 12:21:38', '2024-04-12 12:21:38'),
(1629, 61, 'Melihat Halaman Detail Task PCP.', 'Task PCP', '2024-04-12 12:21:49', '2024-04-12 12:21:49'),
(1630, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 12:21:57', '2024-04-12 12:21:57'),
(1631, 61, 'Melihat Halaman Form Edit Task PCP.', 'Task PCP', '2024-04-12 12:22:02', '2024-04-12 12:22:02'),
(1632, 61, 'Mengedit Data Task PCP.', 'Task PCP', '2024-04-12 12:22:12', '2024-04-12 12:22:12'),
(1633, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 12:22:13', '2024-04-12 12:22:13'),
(1634, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 12:23:14', '2024-04-12 12:23:14'),
(1635, 61, 'Melakukan Logout.', 'LOGOUT', '2024-04-12 12:23:25', '2024-04-12 12:23:25'),
(1636, 64, 'Melakukan Login.', 'LOGIN', '2024-04-12 12:23:35', '2024-04-12 12:23:35'),
(1637, 64, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-12 12:23:36', '2024-04-12 12:23:36'),
(1638, 64, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 12:23:42', '2024-04-12 12:23:42'),
(1639, 64, 'Melihat Halaman Detail Task PCP.', 'Task PCP', '2024-04-12 12:23:47', '2024-04-12 12:23:47'),
(1640, 64, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 12:23:51', '2024-04-12 12:23:51'),
(1641, 64, 'Melihat Halaman Form Edit Task PCP.', 'Task PCP', '2024-04-12 12:23:55', '2024-04-12 12:23:55'),
(1642, 64, 'Mengedit Data Task PCP.', 'Task PCP', '2024-04-12 12:23:59', '2024-04-12 12:23:59'),
(1643, 64, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 12:23:59', '2024-04-12 12:23:59'),
(1644, 64, 'Melakukan Logout.', 'LOGOUT', '2024-04-12 12:24:05', '2024-04-12 12:24:05'),
(1645, 61, 'Melakukan Login.', 'LOGIN', '2024-04-12 12:24:12', '2024-04-12 12:24:12'),
(1646, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-12 12:24:13', '2024-04-12 12:24:13'),
(1647, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 12:24:21', '2024-04-12 12:24:21'),
(1648, 61, 'Melihat Halaman Form Edit Task PCP.', 'Task PCP', '2024-04-12 12:24:25', '2024-04-12 12:24:25'),
(1649, 61, 'Mengedit Data Task PCP.', 'Task PCP', '2024-04-12 12:24:32', '2024-04-12 12:24:32'),
(1650, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 12:24:32', '2024-04-12 12:24:32'),
(1651, 61, 'Melakukan Logout.', 'LOGOUT', '2024-04-12 12:24:41', '2024-04-12 12:24:41'),
(1652, 64, 'Melakukan Login.', 'LOGIN', '2024-04-12 12:24:52', '2024-04-12 12:24:52'),
(1653, 64, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-12 12:24:52', '2024-04-12 12:24:52'),
(1654, 64, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 12:24:55', '2024-04-12 12:24:55'),
(1655, 64, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 13:05:50', '2024-04-12 13:05:50'),
(1656, 64, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 13:06:39', '2024-04-12 13:06:39'),
(1657, 64, 'Melihat Halaman Detail Task PCP.', 'Task PCP', '2024-04-12 13:06:44', '2024-04-12 13:06:44'),
(1658, 64, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 13:06:55', '2024-04-12 13:06:55'),
(1659, 64, 'Melihat Halaman Form Edit Task PCP.', 'Task PCP', '2024-04-12 13:06:59', '2024-04-12 13:06:59'),
(1660, 64, 'Melihat Halaman Form Edit Task PCP.', 'Task PCP', '2024-04-12 13:07:33', '2024-04-12 13:07:33'),
(1661, 64, 'Mengedit Data Task PCP.', 'Task PCP', '2024-04-12 13:07:53', '2024-04-12 13:07:53'),
(1662, 64, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 13:07:53', '2024-04-12 13:07:53'),
(1663, 64, 'Melihat Halaman Detail Task PCP.', 'Task PCP', '2024-04-12 13:07:57', '2024-04-12 13:07:57'),
(1664, 64, 'Melakukan Logout.', 'LOGOUT', '2024-04-12 13:08:08', '2024-04-12 13:08:08'),
(1665, 61, 'Melakukan Login.', 'LOGIN', '2024-04-12 13:08:16', '2024-04-12 13:08:16'),
(1666, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-12 13:08:17', '2024-04-12 13:08:17'),
(1667, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 13:08:26', '2024-04-12 13:08:26'),
(1668, 61, 'Melihat Halaman Detail Task PCP.', 'Task PCP', '2024-04-12 13:08:42', '2024-04-12 13:08:42'),
(1669, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 13:09:33', '2024-04-12 13:09:33'),
(1670, 61, 'Melihat Halaman Form Edit Task PCP.', 'Task PCP', '2024-04-12 13:09:39', '2024-04-12 13:09:39'),
(1671, 61, 'Mengedit Data Task PCP.', 'Task PCP', '2024-04-12 13:09:50', '2024-04-12 13:09:50'),
(1672, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 13:09:50', '2024-04-12 13:09:50'),
(1673, 61, 'Melakukan Logout.', 'LOGOUT', '2024-04-12 13:10:21', '2024-04-12 13:10:21'),
(1674, 64, 'Melakukan Login.', 'LOGIN', '2024-04-12 13:10:28', '2024-04-12 13:10:28'),
(1675, 64, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-12 13:10:29', '2024-04-12 13:10:29'),
(1676, 64, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 13:10:39', '2024-04-12 13:10:39'),
(1677, 64, 'Melihat Halaman Detail Task PCP.', 'Task PCP', '2024-04-12 13:10:43', '2024-04-12 13:10:43'),
(1678, 64, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 13:10:47', '2024-04-12 13:10:47'),
(1679, 64, 'Melihat Halaman Form Edit Task PCP.', 'Task PCP', '2024-04-12 13:10:51', '2024-04-12 13:10:51'),
(1680, 64, 'Mengedit Data Task PCP.', 'Task PCP', '2024-04-12 13:10:56', '2024-04-12 13:10:56'),
(1681, 64, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 13:10:56', '2024-04-12 13:10:56'),
(1682, 64, 'Melakukan Logout.', 'LOGOUT', '2024-04-12 13:11:03', '2024-04-12 13:11:03'),
(1683, 61, 'Melakukan Login.', 'LOGIN', '2024-04-12 13:11:09', '2024-04-12 13:11:09'),
(1684, 61, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-12 13:11:10', '2024-04-12 13:11:10'),
(1685, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 13:11:15', '2024-04-12 13:11:15'),
(1686, 61, 'Melihat Halaman Form Edit Task PCP.', 'Task PCP', '2024-04-12 13:11:20', '2024-04-12 13:11:20'),
(1687, 61, 'Mengedit Data Task PCP.', 'Task PCP', '2024-04-12 13:11:25', '2024-04-12 13:11:25'),
(1688, 61, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 13:11:25', '2024-04-12 13:11:25'),
(1689, 61, 'Melakukan Logout.', 'LOGOUT', '2024-04-12 13:11:33', '2024-04-12 13:11:33'),
(1690, 64, 'Melakukan Login.', 'LOGIN', '2024-04-12 13:11:39', '2024-04-12 13:11:39'),
(1691, 64, 'Melihat Halaman Dashboard.', 'DASHBOARD', '2024-04-12 13:11:39', '2024-04-12 13:11:39'),
(1692, 64, 'Melihat Halaman Daftar Task PCP.', 'Task PCP', '2024-04-12 13:11:53', '2024-04-12 13:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `lps`
--

CREATE TABLE `lps` (
  `id_lps` int(11) NOT NULL,
  `id_dokumen_lps` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `pdf` int(11) NOT NULL DEFAULT 0,
  `native` int(11) NOT NULL DEFAULT 0,
  `tanggal_lps` date DEFAULT NULL,
  `id_user_respon` int(11) DEFAULT NULL,
  `is_respon` int(11) NOT NULL DEFAULT 0,
  `id_user_respon_lps` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lps`
--

INSERT INTO `lps` (`id_lps`, `id_dokumen_lps`, `id_proyek`, `pdf`, `native`, `tanggal_lps`, `id_user_respon`, `is_respon`, `id_user_respon_lps`) VALUES
(241, 1, 27, 1, 1, '2024-01-24', 37, 1, 37),
(242, 2, 27, 1, 0, '2024-04-11', 37, 1, 41),
(243, 3, 27, 0, 1, '2024-04-11', 37, 1, 41),
(244, 4, 27, 0, 0, '2024-01-24', 37, 1, NULL),
(245, 5, 27, 0, 0, '2024-01-24', 37, 1, NULL),
(246, 6, 27, 0, 0, '2024-01-24', 37, 1, NULL),
(247, 7, 27, 0, 0, '2024-01-24', 37, 1, NULL),
(248, 8, 27, 0, 0, '2024-01-24', 37, 1, NULL),
(249, 9, 27, 0, 0, '2024-01-24', 37, 1, NULL),
(250, 10, 27, 0, 0, '2024-01-24', 37, 1, NULL),
(251, 11, 27, 0, 0, '2024-01-24', 37, 1, NULL),
(252, 12, 27, 0, 0, '2024-01-24', 37, 1, NULL),
(253, 13, 27, 0, 0, '2024-01-24', 37, 1, NULL),
(254, 14, 27, 0, 0, '2024-01-24', 37, 1, NULL),
(255, 15, 27, 0, 0, '2024-01-24', 37, 1, NULL),
(256, 16, 27, 0, 0, '2024-01-24', 37, 1, NULL),
(257, 17, 27, 0, 0, '2024-01-24', 37, 1, NULL),
(258, 18, 27, 0, 0, '2024-01-24', 37, 1, NULL),
(259, 19, 27, 0, 0, '2024-01-24', 37, 1, NULL),
(260, 20, 27, 0, 0, '2024-01-24', 37, 1, NULL),
(261, 1, 4, 0, 0, '2024-01-25', 42, 1, NULL),
(262, 2, 4, 0, 0, '2024-01-25', 42, 1, NULL),
(263, 3, 4, 0, 0, '2024-01-25', 42, 1, NULL),
(264, 4, 4, 0, 0, '2024-01-25', 42, 1, NULL),
(265, 5, 4, 0, 0, '2024-01-25', 42, 1, NULL),
(266, 6, 4, 0, 0, '2024-01-25', 42, 1, NULL),
(267, 7, 4, 0, 0, '2024-01-25', 42, 1, NULL),
(268, 8, 4, 0, 0, '2024-01-25', 42, 1, NULL),
(269, 9, 4, 0, 0, '2024-01-25', 42, 1, NULL),
(270, 10, 4, 0, 0, '2024-01-25', 42, 1, NULL),
(271, 11, 4, 0, 0, '2024-01-25', 42, 1, NULL),
(272, 12, 4, 0, 0, '2024-01-25', 42, 1, NULL),
(273, 13, 4, 0, 0, '2024-01-25', 42, 1, NULL),
(274, 14, 4, 0, 0, '2024-01-25', 42, 1, NULL),
(275, 15, 4, 0, 0, '2024-01-25', 42, 1, NULL),
(276, 16, 4, 0, 0, '2024-01-25', 42, 1, NULL),
(277, 17, 4, 0, 0, '2024-01-25', 42, 1, NULL),
(278, 18, 4, 0, 0, '2024-01-25', 42, 1, NULL),
(279, 19, 4, 0, 0, '2024-01-25', 42, 1, NULL),
(280, 20, 4, 0, 0, '2024-01-25', 42, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_activity`
--

CREATE TABLE `master_activity` (
  `id_master_activity` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `absense_start` date DEFAULT NULL,
  `absense_end` date DEFAULT NULL,
  `work_days` int(11) DEFAULT NULL,
  `work_hours` int(11) DEFAULT NULL,
  `tanggal_master` date DEFAULT NULL,
  `holidays` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`holidays`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `master_activity`
--

INSERT INTO `master_activity` (`id_master_activity`, `id_user`, `absense_start`, `absense_end`, `work_days`, `work_hours`, `tanggal_master`, `holidays`) VALUES
(14, 42, '2028-01-26', '2028-01-31', 4, 32, '2028-01-31', NULL),
(46, 53, '2023-11-01', '2023-11-30', 22, 176, '2023-11-30', '[\"\"]'),
(47, 52, '2023-11-01', '2023-11-30', 22, 176, '2023-11-30', '[\"\"]'),
(48, 30, '2023-11-01', '2023-11-30', 22, 176, '2023-11-30', '[\"\"]'),
(49, 37, '2023-11-12', '2023-11-30', 14, 112, '2023-11-30', '[\"\"]'),
(55, 43, '2023-12-01', '2023-12-31', 19, 152, '2023-12-31', '[\"2023-12-25\",\"2023-12-26\"]'),
(56, 49, '2023-12-01', '2023-12-31', 19, 152, '2023-12-31', '[\"2023-12-25\",\"2023-12-26\"]'),
(57, 42, '2023-12-04', '2023-12-31', 18, 144, '2023-12-31', '[\"2023-12-25\",\"2023-12-26\"]'),
(58, 32, '2023-12-05', '2023-12-31', 17, 136, '2023-12-31', '[\"2023-12-25\",\"2023-12-26\"]'),
(59, 45, '2023-12-11', '2023-12-31', 13, 104, '2023-12-31', '[\"2023-12-25\",\"2023-12-26\"]'),
(60, 29, '2023-12-18', '2023-12-31', 8, 64, '2023-12-31', '[\"2023-12-25\",\"2023-12-26\"]'),
(61, 46, '2023-12-18', '2023-12-31', 8, 64, '2023-12-31', '[\"2023-12-25\",\"2023-12-26\"]'),
(62, 41, '2023-12-18', '2023-12-31', 8, 64, '2023-12-31', '[\"2023-12-25\",\"2023-12-26\"]'),
(63, 42, '2023-10-01', '2023-10-31', 22, 176, '2023-10-31', '[\"\"]'),
(64, 31, '2023-10-01', '2023-10-31', 22, 176, '2023-10-31', '[\"\"]'),
(65, 44, '2023-10-01', '2023-10-31', 22, 176, '2023-10-31', '[\"\"]'),
(66, 45, '2023-10-02', '2023-10-31', 22, 176, '2023-10-31', '[\"\"]'),
(67, 49, '2023-10-02', '2023-10-31', 22, 176, '2023-10-31', '[\"\"]'),
(68, 29, '2023-10-02', '2023-10-31', 22, 176, '2023-10-31', '[\"\"]'),
(69, 30, '2023-10-02', '2023-10-31', 22, 176, '2023-10-31', '[\"\"]'),
(70, 46, '2023-10-02', '2023-10-31', 22, 176, '2023-10-31', '[\"\"]'),
(71, 33, '2023-10-02', '2023-10-31', 22, 176, '2023-10-31', '[\"\"]'),
(72, 43, '2023-10-02', '2023-10-31', 22, 176, '2023-10-31', '[\"\"]'),
(73, 0, '2023-10-02', '2023-10-31', 22, 176, '2023-10-31', '[\"\"]'),
(74, 47, '2023-10-02', '2023-10-31', 22, 176, '2023-10-31', '[\"\"]'),
(75, 28, '2023-10-02', '2023-10-31', 22, 176, '2023-10-31', '[\"\"]'),
(76, 50, '2023-10-02', '2023-10-31', 22, 176, '2023-10-31', '[\"\"]'),
(77, 37, '2023-10-02', '2023-10-31', 22, 176, '2023-10-31', '[\"\"]'),
(78, 48, '2023-10-02', '2023-10-31', 22, 176, '2023-10-31', '[\"\"]'),
(79, 39, '2023-10-02', '2023-10-31', 22, 176, '2023-10-31', '[\"\"]'),
(80, 38, '2023-10-02', '2023-10-31', 22, 176, '2023-10-31', '[\"\"]'),
(81, 51, '2023-10-02', '2023-10-31', 22, 176, '2023-10-31', '[\"\"]'),
(82, 32, '2023-10-02', '2023-10-31', 22, 176, '2023-10-31', '[\"\"]'),
(83, 34, '2023-10-06', '2023-10-31', 18, 144, '2023-10-31', '[\"\"]'),
(84, 41, '2023-10-16', '2023-10-31', 12, 96, '2023-10-31', '[\"\"]'),
(85, 40, '2023-10-23', '2023-10-31', 7, 56, '2023-10-31', '[\"\"]');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2024_03_09_121526_create_monthly_report_pcps_table', 1),
(13, '2024_03_10_041423_create_task_pcps_table', 2),
(14, '2024_03_10_060234_create_agendas_table', 3),
(15, '2024_03_23_080532_create_pic_tujuan_tasks_table', 4),
(16, '2024_03_23_082742_create_pic_divisi_tasks_table', 5),
(18, '2024_03_23_095814_update-monthly-report-pcp', 6),
(19, '2024_03_23_220113_update-agenda', 7),
(22, '2024_03_23_221245_create_agenda_tasks_table', 8),
(26, '2024_03_24_044738_create_timelines_table', 9),
(29, '2024_03_28_094325_update-monthly-report-pcp-2', 10),
(30, '2024_03_29_122307_create_pic_monthly_report_pcps_table', 11),
(32, '2024_03_30_222845_create_pic_agendas_table', 12),
(33, '2024_03_31_042738_update-agenda-1', 13),
(35, '2019_12_14_000001_create_personal_access_tokens_table', 14),
(36, '2024_03_31_091913_create_dokumen_timelines_table', 15),
(37, '2024_03_31_094757_create-timeline-2', 16),
(38, '2024_03_31_095624_create_timeline_details_table', 17),
(39, '2024_04_09_151106_create_jabatans_table', 18),
(40, '2024_04_09_175704_create_divisies_table', 19),
(41, '2024_04_09_181833_update-user', 20),
(42, '2024_04_10_112217_create_proyek_users_table', 21),
(44, '2024_04_11_014019_update-monthly-report-1', 22),
(47, '2024_04_11_022253_update-monthly-report-1', 23),
(48, '2024_04_11_050528_update-proyek-1', 24),
(49, '2024_04_12_084900_create_pic_tujuan_proyek_tasks_table', 25);

-- --------------------------------------------------------

--
-- Table structure for table `monitoring_license_software`
--

CREATE TABLE `monitoring_license_software` (
  `id_monitoring_license_software` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `monitoring_lps`
--

CREATE TABLE `monitoring_lps` (
  `id_monitoring_lps` int(11) NOT NULL,
  `jenis_dokumen` varchar(255) DEFAULT NULL,
  `nama_dokumen` varchar(255) DEFAULT NULL,
  `pdf_bajo` int(11) DEFAULT NULL,
  `native_bajo` int(11) DEFAULT NULL,
  `pdf_bypss` int(11) DEFAULT NULL,
  `native_bypss` int(11) DEFAULT NULL,
  `pdf_g20` int(11) DEFAULT NULL,
  `native_g20` int(11) DEFAULT NULL,
  `pdf_gomur` int(11) DEFAULT NULL,
  `native_gomur` int(11) DEFAULT NULL,
  `pdf_kukaw` int(11) DEFAULT NULL,
  `native_kukaw` int(11) DEFAULT NULL,
  `pdf_seitai` int(11) DEFAULT NULL,
  `native_seitai` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `monthly_report`
--

CREATE TABLE `monthly_report` (
  `id_monthly_report` int(11) NOT NULL,
  `id_proyek` int(11) DEFAULT NULL,
  `realisasi_proyek` float DEFAULT NULL,
  `kendala_implementasi_bim` text DEFAULT NULL,
  `engineering_issue_berjalan` text DEFAULT NULL,
  `masalah_produksi_berjalan` text DEFAULT NULL,
  `konsep_lean_construction_berjalan` text DEFAULT NULL,
  `feedback_untuk_perusahaan` text DEFAULT NULL,
  `evidence_link` text DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `tanggal_report` date NOT NULL DEFAULT current_timestamp(),
  `bulan_report` varchar(255) DEFAULT NULL,
  `is_check` int(11) NOT NULL DEFAULT 1,
  `dua_d_temp` int(11) NOT NULL DEFAULT 0,
  `tiga_d_temp` int(11) NOT NULL DEFAULT 0,
  `empat_d_temp` int(11) NOT NULL DEFAULT 0,
  `lima_d_temp` int(11) NOT NULL DEFAULT 0,
  `cde_d_temp` int(11) NOT NULL DEFAULT 0,
  `kesiapan_bim5d_temp` varchar(255) DEFAULT NULL,
  `id_ho` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `monthly_report`
--

INSERT INTO `monthly_report` (`id_monthly_report`, `id_proyek`, `realisasi_proyek`, `kendala_implementasi_bim`, `engineering_issue_berjalan`, `masalah_produksi_berjalan`, `konsep_lean_construction_berjalan`, `feedback_untuk_perusahaan`, `evidence_link`, `remarks`, `tanggal_report`, `bulan_report`, `is_check`, `dua_d_temp`, `tiga_d_temp`, `empat_d_temp`, `lima_d_temp`, `cde_d_temp`, `kesiapan_bim5d_temp`, `id_ho`) VALUES
(28, 3, 100, '1. Walaupun sudah dilakukan pelatihan dan sosialisasi ke semua stakeholder, namun masih belum semua personil familiar dan bisa menggunakan semua software BIM dengan baik2. Ada nya permintaan tambahan dan konsultan dan owner terkait pemodelan-pemodelan tambahan di luar scope pekerjaan awal3. Adanya amandemen waktu ke 5 proyek dimana selesainya proyek di sesuaikan menjadi 31 November 2023, namun Lisensi Software AEC Autodesk sudah expired pada tanggal 13 September 2023, sehingga kami memanfaatkan license student milik saya', 'Progress Pekerjaan As Built Drawing sudah mencapai 100% di 20 November 2023, namun karena ada instruksi dari Owner adanya perubahan format gambar yang disampaikan belakangan pada saat pekerjaan as built drawing sudah selesai, maka pekerjaan As Built Drawing dimulai kembali dari 0, sehingga berpotensi penyelesaiannya bisa di Desember 2023 atau Januari 2024', 'Adanya catatan Uji Laik Fungsi dari Kementrian PUPR Dinas Bina Marga Subdit JBH dan BPJT, Kepolisian, Kementrian Perhubungan dan Balai Jalan Prov Sulsel yang membuat adanya perbaikan, rework dan pekerjaan tambahan dari design yang sudah di sepakati, dan harus selesai di 30 November 2023', 'Di proyek ini konsep lean constrution sudah di terapkan bersinergi dengan fungsionalitas BIM yang sudah di implementasikan dan fase 4D dalam BIM, terutama di aspek Project Schedule & Planning, Just In Time Schedule, Installation Schedule, dan Last Planner Schedule', 'Di Tengah kondisi perusahaan yang Sedang kurang Baik dan recovery dan di tengah implementasi Transformasi Wika yang Sedang di gencarkan, peningkatan produktivitas dan mutu dalam sinergi yang berkelanjutan menjadi tantangan tersendiri seiring dengan pesatnya perkembangan dunia industri dan teknologi informasi. Dalam konsteks tersebut ada 2 ?pendekatan yang sering di bahas di lingkungan akademik dan para praktisi dunia konstruksi, yaitu lean construction (LC) dan Building Information Modelling (BIM). Oleh karena itu harapan proyek agar, sosialisasi,pelatihan dan wokshop terkait Lean Construction bisa lebih di gencarkan dan di rutinkan lagi, prosedurnya segera di bakukan, dan juga dijadikan salah satu indikator KPI Proyek dan individu, hal itu sudah mulai berjalan dengan diadakannya Kick Off Meeting Penerapan Lean Construction di PT Wijaya Karya pada tanggal 16 Agustus yang lalu', 'https://docs.google.com/presentation/d/1X5y3eUOPiybCTuKiN4Tzqb-24kBT2UV0/edit?usp=share_link&ouid=100241242324540774415&rtpof=true&sd=true', NULL, '2023-11-30', '2023-11', 1, 0, 0, 0, 0, 0, NULL, NULL),
(36, 10, 58.89, 'Penggunaan software yang masih belum berlisensi.', 'Sedang dalam proses optimalisasi desain dinding perkuatan kolam dermaga timur.', 'Sedang menunggu hopper yang masih dalam masa docking.', 'Tim Proyek D&B Pengerukan Alur dan Kolam Pelabuhan Benoa Paket A beberapa waktu lalu kedatangan tim dari Transformasi Office untuk berdiskusi dan mesosailisasikan mengenai Lean Construction. Dari hasil diskusi tersebut tim proyek D&B Pengerukan Alur dan Kolam Pelabuhan Benoa Paket A telah melakukan upaya penerapan konsep Lean Construction, tetapi belum teradministrasi sesuai dengan format yang telah disampaikan oleh tim Transformasi Office. Oleh sebab itu, tim proyek D&B Pengerukan Alur dan Kolam Pelabuhan Benoa Paket A akan melakukan administrasi sesuai dengan arahan dan instruksi yang telah disosialisasikan oleh tim Transformasi Office.', 'Semoga Tim Proyek D&B Pengerukan Alur dan Kolam Pelabuhan Benoa Paket A dapat menerapkan Lean Construction dengan baik.', 'https://officehub365-my.sharepoint.com/:p:/g/personal/wikabenoapaketa_my-office365_my_id/EQaPBQQsKOVOqWAAocsJ6TYBR43v-81juwUQBxi6KJMFuA?e=5vPFGD', '', '2023-11-30', '2023-11', 1, 0, 0, 0, 0, 0, NULL, NULL),
(50, 12, 94.27, 'software digunakan kurang cocok untuk pekerjaan bendungan, sehingga implementasi belum menyeluruh', 'design puncak terkait handrail dan trotoar belum acc dr direksi dan konsultan, padahal akan direncanakan diresmikan di bulan Desember 2023', 'sumber daya pemasangan rip rap sangat terbatas', 'proses implementasi dan sudah menjalankan sarasehan', 'menjadikan lean construction sebagai tool yang dapat membuat lebih efektif dan efisien dalam menjalankan proyek dan perusahaan', 'https://docs.google.com/presentation/d/1p2-3khCDVImGXzVjMkRDdnbCl7Opu7pQ/edit?usp=sharing&ouid=117707207364281329958&rtpof=true&sd=true', '', '2023-11-30', '2023-11', 1, 0, 0, 0, 0, 0, NULL, NULL),
(51, 5, 96.09, 'Pada akhir proyek saat ini tim BIM Engineering proyek sedang membagi tugas untuk menyelesaikan beberapa administrasi terkait addendum dan laporan-laporan, serta menyelesaikan combine pemodelan 3D item major seperti timbunan bendungan utama dan saluran pengelak', 'Penggantian material extra embankment timbunan random biasa menjadi timbunan random pilihan', 'Dikarenakan material clay bersumber dari borrow di area genangan, maka harus dilakukan stok pile untuk material clay dikarenakan impounding harus segera dilakukan', 'Dibuat schedulle dan agenda kerja untuk setiap karyawan didalam 1 minggu hari kerja dan akan dimonitor dirapat mingguan bulan berjalan agar pembagian porsi kerja setaip karyawan bisa lebih efektif', 'Diharapkan dengan konsep lean construction akan lebih mengefektifkan jumlah man powwer terhadap scope pekerjaan yang akan dilaksanakan', 'https://docs.google.com/presentation/d/1a9AROU_cZen0aP4WL-XuKgQOq8cQflH2/edit?usp=drive_link&ouid=107017957828322709613&rtpof=true&sd=true', '', '2023-12-01', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(52, 25, 49.91, 'Tidak ada', 'Tidak ada', 'Curah hujan tinggi', 'Dapat memberikan efisiensi dan nilai lebih pada proyek', 'Dapat diterapkan dengan baik dan sesuai prosedur', 'https://docs.google.com/presentation/d/1UPfYChIpSu-K9GHKz7QS1lZDYmXjkTOs/edit?usp=sharing&ouid=115910223499295073977&rtpof=true&sd=true', '', '2023-12-01', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(53, 9, 36.67, 'Masih belum fix nya desain bendungan sehingga implementasi BIM blm dapat dilanjutkan', 'Belum fixnya desain bendungan dan belum dapat dikerjakannya bendungan akibat pekerjaan paket 2 yang belum selesai', 'Belum fixnya desain bendungan dan belum dapat dikerjakannya bendungan akibat pekerjaan paket 2 yang belum selesai', '-', '-', 'https://ptwijayakarya-my.sharepoint.com/:b:/g/personal/melda_ms_wikamail_id/EesHyVmlpvFOtN6OCTnHdZUBwhQa6EnmYl9M2sTQ5sxqpw?e=0MdeMn', '', '2023-12-01', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(54, 23, 3.758, '-', 'Pendetailan drawing bertahap sesuai dengan tahapan pekerjaan (Bored Pile dan Girder)', 'Keterlambatan pekerjaan common excavation dan Pile drilling karena jalan eksisiting belum dialihkan-Keterlambatan pekerjaan persiapan detour dikarenakan terdapat beberapa area yang belum bebas', '-', 'Harapannya terdapat arahan dan monitor khusus secara jelas terkait penerapan Lean Construction', 'https://docs.google.com/presentation/d/1pft7P0VvdiSxIpsUtTjVVq3SQm5k9d2j/edit?usp=sharing&ouid=103975619180644603394&rtpof=true&sd=true', '', '2023-12-02', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(55, 22, 9, 'Spesifikasi device yang minim sehingga dalam permodelan 3D hanya dapat terbentuk 2 Segmen dari total 5 segmen', '-', '-', '-', 'Harapannya terdapat arahan serta monitoring khusus yang jelas terkait lean construction ini', 'https://drive.google.com/drive/folders/17_4DRBO9mqCvTpJqEnO5GDCSbpsBaap9?usp=sharing', '', '2023-11-30', '2023-11', 1, 0, 0, 0, 0, 0, NULL, NULL),
(56, 24, 97.86, 'Lisensi BIM tidak ada', 'Keretakan Pada Timbunan Tanggul 17 m', 'Cuaca', 'Konsisten dalam menyelesaikan pekerjaan', 'agar dapat lebih banyak dilakukan pelatihan', 'https://docs.google.com/presentation/d/1w6NvCFbxCzlRdoBlhbA_cXVn3_P51J_j/edit?usp=sharing&ouid=100377425895178781925&rtpof=true&sd=true', '', '2023-12-02', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(57, 29, 13.14, 'penyesuaian dengan jadwal reguler pekerjaan proyek, masih dalam proses percepatan pembuatan data addendum', 'Review kedalaman pipa dari yang semula 3,5 m diganti menjadi 2,5 m, untuk mempermudah proses pekerjaan dan mengurangi resiko pelaksanaan pekerjaan.', 'Perizinan pemindahan jalur yang semula di Jalan Provinsi, diusulkan melewati tanggul saluran irigasi milik Dinas SDA', 'Yang kami lakukan masih sebatas monitoring Ra Ri pengadaan dan pekerjaan. Memastikan apa yang kita rencanakan sesuai dengan Pelaksanaannya.', 'Untuk mempermudah laporan, mungkin bisa dibuatkan model pelaporan spt aplikasi sehingga pengisian sudah sesuai panduan yg diminta.', 'https://docs.google.com/presentation/d/13AlVNa2WijOrlYLaAbxHjsriKkJjrU-D/edit?usp=drive_link&ouid=116435217094604517524&rtpof=true&sd=true', '', '2023-12-04', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(58, 4, 79.1, 'Tidak ada personil khusus.', '-', 'Percepatan pekerjaan fasilitas darat', 'Lean structure', 'Implementasi semua proyek', 'https://docs.google.com/presentation/d/1fxgI2NVBgt-lyOa649iuDtMj63vICuoK/edit?usp=sharing&ouid=108022410927805862250&rtpof=true&sd=true', '', '2023-12-04', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(59, 16, 52.7, 'pekerjaan 3D Model Revit', 'Review Percepatan struktur', 'Kendala Cuaca untuk percepatan progres pengecoran', 'proses berjalan dan monitoring oleh tim pusat', 'terdapat SOP dan format baku yang bisa diterapkan di semua proyek dengan mudah', 'https://docs.google.com/presentation/d/1Qkc4BtKpmS4ykHhIO5XaIFpEl0BQ8Thz/edit?usp=sharing&ouid=106855385276361796483&rtpof=true&sd=true', '', '2023-12-04', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(60, 17, 26.69, 'belum ada', 'Analisis stabilitas lereng dermaga yang belum close', 'material dredging berupa clay , sehingga sering membersihakan mata cutter', 'dengan Tim proyek yang minimalis', 'semoga menjadi lebih baik', 'https://ptwijayakarya-my.sharepoint.com/:p:/g/personal/bayuchandraf_wikamail_id/EWm8EPZpHs5Mr5oSKb7-2v4BTLahsziGtbc4W-mkm9DlxA?e=oC7X5h', '', '2023-12-05', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(61, 26, 85.104, 'Konsultan belum terintegrasi dengan BIM jadi belum sepenuhnya bisa diaplikasikan', 'Masih terdapat engineering issue dan nantinya di bahas pada weekly meeting agar tercapai solusi bersama.', 'Masih terdapat masalah produksi dan nantinya di bahas pada weekly meeting agar tercapai solusi bersama.', 'Menciptakan alur kerja yang lebih lancar dengan mengurangi hambatan dan pemborosan di antara berbagai tim dan tahap konstruksi.Mengoptimalkan penggunaan ruang dan sumber daya untuk menghindari penumpukan dan penundaan.', 'Implementasi Lean Construction seringkali melibatkan penggunaan metrik kinerja baru yang lebih fokus pada efisiensi, aliran nilai, dan eliminasi pemborosan. Harapannya adalah bahwa prosedur manajemen proyek akan memasukkan metrik-metrik ini untuk mengukur dan memonitor kinerja.', 'https://docs.google.com/presentation/d/17hfcZJXcVOtzhjTBBkzD74UlnI4XuTNv/edit?usp=sharing&ouid=114894544937434482082&rtpof=true&sd=true', '', '2023-11-30', '2023-11', 1, 0, 0, 0, 0, 0, NULL, NULL),
(62, 13, 53.19, 'Personil dan software', 'Persetujuan perubahan pondasi dangkal menjadi pondasi dalam', 'Banjir di bulan desember, mengganggu pekerjaan pondasi sumuran', '-', '-', 'https://docs.google.com/presentation/d/15PngTwdzp7c8MYPpdXufbUBcuzm7g_E1/edit?usp=sharing&ouid=101616284123334240298&rtpof=true&sd=true', '', '2023-12-05', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(63, 20, 100, 'Owner dan konsultan belum sepenuhnya mengerti implementasi BIM pada proyek', 'Proses serah terima pekerjaan ke owner', '-', '-', '-', 'https://drive.google.com/drive/folders/1-P9qwvplzFd0zjEm0Y9FJwA82B0sObHk?usp=sharing', '', '2023-12-06', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(64, 11, 92.68, '-', 'perubahan kontrak addendum 06', 'ditemukan matagareng pada pekerjaan rangka', 'sudah', 'dapat menjadikan WIKA lebih baik ke depannya', 'https://ptwijayakarya-my.sharepoint.com/:p:/g/personal/khusein_wikamail_id/EcLyfWexr_hInBAr2grGSFMBG_V0WPhvMXQdlnx2bAEtzg?e=eQaiS9', '', '2023-12-07', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(65, 28, 87.2, 'Referensi untuk proyek pipa', 'Pekerjaan penggantian pipa eksisting di ruas P160-P168, membutuhkan penyesuaian elevasi tanam pipa HDPE karena ada potensi tidak bisa mengalir akibat taping di WTP Simoro', 'Pekerjaan rehabilitasi mercu intake saluki mengalami keterlambatan akibat coverdam rusak dampak hujan yang cukup deras di hulu sungai', 'konsen lean construction dijalankan bersama dengan seluruh komponen proyek', 'konsep lean construction dipahami oleh stakeholder proyek', 'https://docs.google.com/presentation/d/1Hz5l0DjyQuA9UfYJfJvtLOvc9DtqY8vq/edit?usp=drive_link&ouid=104252439775990078637&rtpof=true&sd=true', '', '2023-11-30', '2023-11', 1, 0, 0, 0, 0, 0, NULL, NULL),
(66, 27, 84.44, 'Tidak dapat diaplikasikan untuk metode kerja', 'Terdapat pekerjaan yang belum ada pendetailan gambar oleh konsultan perencana', 'Diperlukan crane kapasitas lebih 100 ton untuk instalasi Pile Cap P1 dikarenakan berat precast mencapai 9 ton dengan radius 22 meter', 'Berjalan dengan baik', 'Agar dilakukan Lean Construction dengan beberapa kajian-kajian yang lebih mendalam agar dapat membuat margin proyek semakin tinggi', 'https://docs.google.com/presentation/d/1G9Xzwo1KvB1Su-8swLrex0ZNigMH25oJ/edit?usp=sharing&ouid=103748644988845076206&rtpof=true&sd=true', '', '2023-12-08', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(67, 8, 75.039, 'Kendala pada Clash Detection yang terjadi pada area/kawasan persil antar paket pekerjaan', 'Berjalan', 'Berjalan', 'Konsep dimulai pada proyek yang telah menerapkan BIM sebagai proses yang sangat berpengaruh pada efisiensi, dilanjutkan proyek yang sudah mulai menjalankan SAP pada proses Komersial dan Keuangan .', 'harapan Lean construction pada proyek , proyek dapat berjalan seefisiensi mungkin dengan pencapaian quality  yang sudah ditentukan dalam procedure.', 'https://ptwijayakarya-my.sharepoint.com/:p:/g/personal/yudha_rc_wikamail_id/ERFBg4TJ97dMnSj6yxxQ7eoBC2bOtEEXZkHgKZz1IiM_Ng?e=fyQajI', NULL, '2023-11-29', '2023-11', 1, 0, 0, 0, 0, 0, NULL, NULL),
(69, 9, 40.62, 'Belum dapat terimplementasi karena desain bendungan berubah dan masih dalam proses diskusi dengan KKB dan BTB', '-', 'Proyek memasuki masa musim hujan', '-', '-', 'https://ptwijayakarya-my.sharepoint.com/:b:/g/personal/melda_ms_wikamail_id/EYuo1zoMK6tEuaqi6aFTmWoB6OXyraBeypmdUOrq_UFweA?e=b3HMTB', '', '2023-12-31', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(70, 17, 33.45, 'Implementasi BIM di proyek dredging tursina sudah berjalan dengan baik. untuk saat ini digunakan untuk monitoring progress pekerjaan', 'Safety Faktor pada analisis slope stability area dermaga belum mencapai ketentuan yaitu 1.5', 'Material yang berupa clay menghambat proses dan menurunkan produktifitas harian', 'Belum', 'Belum', 'https://drive.google.com/drive/folders/1GnqUzaVVPZTUa06pTdQEIxEiN2fe45Ze?usp=sharing', '', '2023-12-31', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(71, 12, 99.07, 'belum bisa diaplikan mengingat progres sudah 70% pada saat memulai BIM', 'perubahan design di puncak bendungan sering berubah mengikuti perkembangan', 'keterbatan lahan kerja menunggu paket lain', 'memprioritaskan lean consruction pada kompetensi SDM dan memaksimalkan jumlah yang ada', 'setiap karyawan tetap maupun kontrak memiliki kompetensi yang merata dan berkualitas', 'https://docs.google.com/presentation/d/17vpLJvGvyTWZzB6861TGTmzd3mjgqLjz/edit?usp=sharing&ouid=117707207364281329958&rtpof=true&sd=true', '', '2023-12-31', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(72, 24, 98.35, 'Belum ada kendala', 'Pekerjaan saat ini dalam masa tunggu konsolidasi untuk cutting surcharge', 'Pekerjaan saat ini dalam masa tunggu konsolidasi untuk cutting surcharge', 'Belum', 'belum', 'https://drive.google.com/drive/folders/1ADldwVDw7wloooPG0ZZo0TKGEZvSY02i?usp=sharing', '', '2023-12-31', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(73, 5, 100, 'BWS Sulawesi IV Kendari belum mewajibkan BIM sebagai laporan seca resmi baik gambar teknis maupun laporan quantity', 'tidak ada', 'tidak ada', 'Dengan menerapkan program kerja yang baik dalam rapat mingguan dan dilakukan monitoring evaluasi berkala untuk meminimalkan sate sumber daya. Melakukan subkont dalam pekerjaan galian dand timbunan', 'Dengan adanya lean construction bisa membawa WIKA lebih efektif dan efisien dari segi Biaya. Mutu dan Waktu', 'https://drive.google.com/file/d/1Ua5h_kKfXMSjFbXugciWmOGwqfYeNtVP/view?usp=sharing', '', '2023-12-31', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(74, 27, 89.5, 'Dalam implementasi BIM 2D untuk metode kerja masih kurang menjelaskan sehingga diperlukan 3D agar dapat dimengerti di lapangan', 'Persiapan PHO pekerjaan sehingga memerlukan banyak dokumen yang harus dilengkapi dan menyesuaikan dengan format dari pihak Konsultan', 'Material atap membrane membutuhkan waktu pabrikasi cukup lama sehingga diperlukan percepatan kedatangan material', 'Berjalan dengan baik', 'Lebih banyak lagi konsep yang dijalankan', 'https://drive.google.com/drive/folders/108E6qfJATR_xl-ZeVajBivHOk0UUoAsS?usp=sharing', '', '2023-12-31', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(75, 10, 59.9, 'Belum Menggunakan Software Berlisensi.', 'Masih Menunggu Proses Docking Peralatan Keruk.', 'Masih Menunggu Proses Docking Peralatan Keruk.', 'Proyek D&B Pengerukan Alur dan Kolam Pelabuhan Benoa Paket A saat ini sedang melakukan penerapan Lean Construction terutama dalam administrasi supaya sesuai dengan format yang telah disosialisasikan sebelumnya.', 'Semoga Proyek D&B Pengerukan Alur dan Kolam Pelabuhan Benoa Paket A dapat menerapkan Lean Contrustion dengan sebaik-baiknya.', 'https://officehub365-my.sharepoint.com/:p:/g/personal/wikabenoapaketa_my-office365_my_id/EeEquOY76t1Em8mZ4bHMNlYBouJerq2qvTbv1e6jJ06UJA?e=iRgTU0', '', '2023-12-31', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(76, 8, 85.03, 'kendala pada implementasi BIM saat ini ada pada pengunaan BIM template dimana saat proses tender ataupun pekerjaan baru tidak memiliki refrensi sehingga harus membuat baru', 'Saat ini kendala pada konstruksi abutmen jembatan yang berdekatan dengan konstruksi jembatan paket sebelah', 'kenaikan harga material dan pengunaan jalan nasional yang sudah melebihi dari kapasitas jalan karena pemakaian dari seluruh kontraktor yang aktif di lokasi proyek', 'konsep saat ini sudah melakukan SAP dan BIM', 'Semakin simple pengunaaan dan menyeluruh untuk setiap lini bidang', 'https://ptwijayakarya-my.sharepoint.com/:f:/g/personal/yudha_rc_wikamail_id/EsgIjdN9-ItIrNfUdlTRcAkBtE6wBUHwaF6nAAz-0c2cPg?e=Ofna3W', '', '2023-12-31', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(77, 28, 92.1, 'Belum ada referensi BIM untuk proyek air baku', 'Perubahan Desain Bak Pelepas Tekan. menyesuaikan lahan yang tersedia sehingga harus berada di atas jalur pipa yang sudah tertanam. Perubahan elevasi penanaman pipa di P160~P168 menyesuaikan dengan elevasi WTP Simoro karena ada potensi air tidak bisa mengalir secara gravitasi akibat elevasi di area tersebut lebih tinggi dari elevasi WTP Simoro. Pekerjaan galian untuk penanaman pipa HDPE 4 m hingga 7 m.', 'Perecepatan pada pemasangan aksesoris pipa', 'Konsep lean construction dilaksanakan bersama stakeholder di dalam proyek', 'Konsep lean construction wajib diketahui oleh semua stakeholder proyek', 'https://docs.google.com/presentation/d/1LSJbWHxD5VDqzm0y6FBLkAE9kFlWEpBW/edit?usp=drive_link&ouid=104252439775990078637&rtpof=true&sd=true', '', '2023-12-31', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(78, 15, 0.4, '1. Kebutuhan Spesifikasi Hardware yang tinggi untuk menjalankan BIM sehingga membutuhkan investasi yang tinggi2. Software yang digunakan oleh proyek masih menggunakan student version sehingga fitur aplikasinya masih sangat terbatas', 'Issue pada proyek Bendungan Jenelata yakni adanya perubahan Trase Jalan', 'Issue pada proyek Bendungan Jenelata yakni adanya perubahan Trase Jalan', 'Not Yet', 'Implementation of Lean Construction is expected that the project can be executed with efficiently so as to produce a quality project that is good in cost and time', 'https://drive.google.com/drive/folders/11rnv60ZAjq1jZN0LjrOlpI0i-IuAGap_?usp=sharing', '', '2023-12-31', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(79, 23, 20.68, '-', 'Pendetailan Shop Drawing bertahap sesuai dengan tahapan pekerjaan (Pembesian Abutmen)', 'Underpass Pelikan : Keterlambatan pekerjaan common excavation dan pile drilling karena jalan eksisiting belum dialihkanUnderpass SPE : Potensi keterlambatan akibat utilitas Listrik yang belum mendapat izin untuk dilakukan pemindahan', '-', 'Terdapat arahan dan monitor seacara khusus terkait penerapan lean construction', '-', '', '2023-12-31', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(80, 22, 9, 'Spesifikasi device yang minim sehingga dalam permodelan 3D hanya dapat terbentuk 2 segmen dari total 5 segmen', '-', '-', '-', 'Arahan dan monitor khusus secara jelas terkait penerapan Lean Construction', 'https://drive.google.com/drive/folders/1Gv1sTa5e3RfHtdvwEahPvrJq2T_rKRLj?usp=sharing', '', '2023-12-31', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(81, 29, 32.11, 'Menyesuaikan jadwal pengerjaan dengan progres pekerjaan di proyek', 'Review kedalaman pipa dari 3.5 meter dasar galian menjadi 2.5 meter', 'Tanah eksisting lokasi pekerjaan kurang sesuai dengan metode yang digunakan. sehingga progres tidak maksimal', 'Monitoring pekerjaan dikerjakan oleh tim project control dan selalu berkoordinasi dengan tim pelaksana', 'Pelaporan mungkin bisa dibuat monthly', '-', '', '2023-12-31', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(82, 14, 32.84, 'Proyek masih menunggu Kontrak Penunjukan Langsung Pekerjaan Soil Improvement', 'Pekerjaan dilapangan menunggu kontrak pekerjaan soil simprovement', 'Pekerjaan dilapangan menunggu kontrak pekerjaan soil simprovement', 'Proyek masih menunggu kontrak pekerjaan soil improvement', 'Harus ada prosedur dan role model yang jelas. karena sistem di indonesia masih kurang bisa menerapkan seperti negara-negara maju dimana mereka telah menggunakan sistem full subcon. di indonesia dan di wika masih sulit untuk menerapkan ini', 'https://docs.google.com/presentation/d/1X8ClnhkDvyBTslts4JreES4eKCX1UTHe/edit?usp=sharing&ouid=114476014859024615848&rtpof=true&sd=true', '', '2023-12-31', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(83, 16, 65.18, 'Kurangnya sumber daya manusia dalam pendetailan suatu model (contoh: tahap pembesian)', 'Tidak ada', 'Cuaca yang tidak menentu', '-', '-', 'https://drive.google.com/drive/u/0/folders/1tgSazT8xkQaAk6uatrZq3mkClaHKyIHl', '', '2023-12-31', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(84, 4, 91.45, '-', 'Pekerjaan Aspal pada Halaman PK-PPK dengan grade 0% rawan genangan yang berubah-ubah.', 'Percepatan pekerjaan gedung.', 'Lean people', 'Simultan', 'https://docs.google.com/presentation/d/1Ggfrq46_eNou1R6lpNNIHW4A6TIBjWaf/edit?usp=sharing&ouid=108022410927805862250&rtpof=true&sd=true', '', '2023-12-31', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(86, 30, 0.51, 'Proses pengadaan Perangkat Hardware dan Software BIM', '- Perubahan Desain dari DED menyesuaikan lapangan dengan pendekatan awal menggunakan data MC-0 dan photogametri untuk penentuan jalur pipa.', 'Lokasi pekerjaan banyak clash terhadap proyek lain sehingga dibutuhkan koordinasi baik secara desain dan kondisi lapangan terkait akses pekerjaan dan jadwal pekerjaan.', 'Ya', '-', 'LAPORAN BULANAN ENGINEERING', '', '2023-12-31', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(104, 25, 50.61, 'Tidak ada', 'Tidak ada', 'Curah hujan tinggi', 'Dapat memberikan efisiensi dan nilai lebih pada proyek', 'Dapat diterapkan dengan baik dan sesuai prosedur', 'https://docs.google.com/presentation/d/1UPfYChIpSu-K9GHKz7QS1lZDYmXjkTOs/edit?usp=sharing&ouid=115910223499295073977&rtpof=true&sd=true', '', '2023-12-31', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(121, 11, 99.8, '-', 'perubahan kontrak addendum 06', 'ditemukan matagareng pada pekerjaan rangka', 'sudah', 'dapat menjadikan WIKA lebih baik ke depannya', 'https://ptwijayakarya-my.sharepoint.com/:p:/g/personal/khusein_wikamail_id/EcLyfWexr_hInBAr2grGSFMBG_V0WPhvMXQdlnx2bAEtzg?e=eQaiS9', '', '2023-12-31', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(122, 13, 59.13, 'Personil dan software', 'Persetujuan perubahan pondasi dangkal menjadi pondasi dalam', 'Banjir di bulan desember, mengganggu pekerjaan pondasi sumuran', '-', '-', 'https://docs.google.com/presentation/d/15PngTwdzp7c8MYPpdXufbUBcuzm7g_E1/edit?usp=sharing&ouid=101616284123334240298&rtpof=true&sd=true', '', '2023-12-31', '2023-12', 1, 0, 0, 0, 0, 0, NULL, NULL),
(155, 27, 88, '-', '-', '-', '-', '-', 'https://docs.google.com/presentation/d/1t8w1b-3MkEefYWSQEsVjhLptwuo0fXtL/edit?rtpof=true&sd=true', NULL, '2024-01-24', '2024-01', 1, 0, 0, 0, 0, 0, NULL, NULL),
(159, 27, 50, 'test', 'test', 'test', 'test', 'test', 'test', NULL, '2024-03-09', '2024-03', 1, 0, 0, 0, 0, 0, NULL, NULL),
(160, 31, 50, 'test', 'test', 'test', 'test', 'test', 'test', NULL, '2024-04-11', '2024-04', 1, 0, 0, 0, 0, 0, NULL, NULL),
(161, 31, 55, 'test', 'test', 'test', 'test', 'test', 'test update', NULL, '2024-04-12', '2024-04', 1, 1, 1, 0, 0, 0, 'Belum Siap Implementasi BIM 5D', 53);

-- --------------------------------------------------------

--
-- Table structure for table `monthly_report_pcps`
--

CREATE TABLE `monthly_report_pcps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_monthly_report` int(11) DEFAULT NULL,
  `id_proyek` int(11) DEFAULT NULL,
  `bulan_report` varchar(255) DEFAULT NULL,
  `evaluasi_hasil_usaha` text DEFAULT NULL,
  `laporan_lc` text DEFAULT NULL,
  `laporan_vendor` text DEFAULT NULL,
  `update_inventaris` text DEFAULT NULL,
  `prognosa_hasil_usaha` text DEFAULT NULL,
  `ms_project_file` text DEFAULT NULL,
  `laporan_bulanan_ikn` text DEFAULT NULL,
  `laporan_upaya_klaim` text DEFAULT NULL,
  `laporan_potob` text DEFAULT NULL,
  `laporan_spi` text DEFAULT NULL,
  `status_report_pcp` varchar(255) DEFAULT NULL,
  `persentase_evaluasi_hasil_usaha` varchar(255) DEFAULT NULL,
  `persentase_laporan_lc` varchar(255) DEFAULT NULL,
  `persentase_laporan_vendor` varchar(255) DEFAULT NULL,
  `persentase_update_inventaris` varchar(255) DEFAULT NULL,
  `persentase_prognosa_hasil_usaha` varchar(255) DEFAULT NULL,
  `persentase_ms_project_file` varchar(255) DEFAULT NULL,
  `persentase_laporan_bulanan_ikn` varchar(255) DEFAULT NULL,
  `persentase_laporan_upaya_klaim` varchar(255) DEFAULT NULL,
  `persentase_laporan_potob` varchar(255) DEFAULT NULL,
  `persentase_laporan_spi` varchar(255) DEFAULT NULL,
  `narasi_evaluasi_hasil_usaha` text DEFAULT NULL,
  `narasi_laporan_lc` text DEFAULT NULL,
  `narasi_laporan_vendor` text DEFAULT NULL,
  `narasi_update_inventaris` text DEFAULT NULL,
  `narasi_prognosa_hasil_usaha` text DEFAULT NULL,
  `narasi_ms_project_file` text DEFAULT NULL,
  `narasi_laporan_bulanan_ikn` text DEFAULT NULL,
  `narasi_laporan_upaya_klaim` text DEFAULT NULL,
  `narasi_laporan_potob` text DEFAULT NULL,
  `status_evaluasi_hasil_usaha` varchar(255) NOT NULL DEFAULT 'Open',
  `status_laporan_lc` varchar(255) NOT NULL DEFAULT 'Open',
  `status_laporan_vendor` varchar(255) NOT NULL DEFAULT 'Open',
  `status_update_inventaris` varchar(255) NOT NULL DEFAULT 'Open',
  `status_prognosa_hasil_usaha` varchar(255) NOT NULL DEFAULT 'Open',
  `status_ms_project_file` varchar(255) NOT NULL DEFAULT 'Open',
  `status_laporan_bulanan_ikn` varchar(255) NOT NULL DEFAULT 'Open',
  `status_laporan_upaya_klaim` varchar(255) NOT NULL DEFAULT 'Open',
  `status_laporan_potob` varchar(255) NOT NULL DEFAULT 'Open',
  `komentar_evaluasi_hasil_usaha` text DEFAULT NULL,
  `komentar_laporan_lc` text DEFAULT NULL,
  `komentar_laporan_vendor` text DEFAULT NULL,
  `komentar_update_inventaris` text DEFAULT NULL,
  `komentar_prognosa_hasil_usaha` text DEFAULT NULL,
  `komentar_ms_project_file` text DEFAULT NULL,
  `komentar_laporan_bulanan_ikn` text DEFAULT NULL,
  `komentar_laporan_upaya_klaim` text DEFAULT NULL,
  `komentar_laporan_potob` text DEFAULT NULL,
  `due_date_evaluasi_hasil_usaha` date DEFAULT NULL,
  `due_date_laporan_lc` date DEFAULT NULL,
  `due_date_laporan_vendor` date DEFAULT NULL,
  `due_date_update_inventaris` date DEFAULT NULL,
  `due_date_prognosa_hasil_usaha` date DEFAULT NULL,
  `due_date_ms_project_file` date DEFAULT NULL,
  `due_date_laporan_bulanan_ikn` date DEFAULT NULL,
  `due_date_laporan_upaya_klaim` date DEFAULT NULL,
  `due_date_laporan_potob` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monthly_report_pcps`
--

INSERT INTO `monthly_report_pcps` (`id`, `id_monthly_report`, `id_proyek`, `bulan_report`, `evaluasi_hasil_usaha`, `laporan_lc`, `laporan_vendor`, `update_inventaris`, `prognosa_hasil_usaha`, `ms_project_file`, `laporan_bulanan_ikn`, `laporan_upaya_klaim`, `laporan_potob`, `laporan_spi`, `status_report_pcp`, `persentase_evaluasi_hasil_usaha`, `persentase_laporan_lc`, `persentase_laporan_vendor`, `persentase_update_inventaris`, `persentase_prognosa_hasil_usaha`, `persentase_ms_project_file`, `persentase_laporan_bulanan_ikn`, `persentase_laporan_upaya_klaim`, `persentase_laporan_potob`, `persentase_laporan_spi`, `narasi_evaluasi_hasil_usaha`, `narasi_laporan_lc`, `narasi_laporan_vendor`, `narasi_update_inventaris`, `narasi_prognosa_hasil_usaha`, `narasi_ms_project_file`, `narasi_laporan_bulanan_ikn`, `narasi_laporan_upaya_klaim`, `narasi_laporan_potob`, `status_evaluasi_hasil_usaha`, `status_laporan_lc`, `status_laporan_vendor`, `status_update_inventaris`, `status_prognosa_hasil_usaha`, `status_ms_project_file`, `status_laporan_bulanan_ikn`, `status_laporan_upaya_klaim`, `status_laporan_potob`, `komentar_evaluasi_hasil_usaha`, `komentar_laporan_lc`, `komentar_laporan_vendor`, `komentar_update_inventaris`, `komentar_prognosa_hasil_usaha`, `komentar_ms_project_file`, `komentar_laporan_bulanan_ikn`, `komentar_laporan_upaya_klaim`, `komentar_laporan_potob`, `due_date_evaluasi_hasil_usaha`, `due_date_laporan_lc`, `due_date_laporan_vendor`, `due_date_update_inventaris`, `due_date_prognosa_hasil_usaha`, `due_date_ms_project_file`, `due_date_laporan_bulanan_ikn`, `due_date_laporan_upaya_klaim`, `due_date_laporan_potob`) VALUES
(6, NULL, 8, '2024-03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Narasi', 'Narasi', 'Narasi', 'Narasi', 'Narasi', 'Narasi', 'Narasi', 'Narasi', 'Narasi', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-04-06', '2024-04-06', '2024-04-06', '2024-04-06', '2024-04-06', '2024-04-06', '2024-04-06', '2024-04-06', '2024-04-06'),
(7, 159, 27, '2024-03', '033020240903181 Pdf Empty.pdf', 'Ya', '033020240903183 Pdf Empty.pdf', '033020240903184 Pdf Empty.pdf', 'Ya', 'Ya', '033020240903187 Pdf Empty.pdf', 'Ya', 'Ya', NULL, 'Revisi', '50', '50', '50', '50', '50', '50', '50', '50', '50', NULL, 'Narasi', 'Narasi', 'Narasi', 'Narasi', 'Narasi', 'Narasi', 'Narasi', 'Narasi', 'Narasi', 'Revisi', 'Revisi', 'Revisi', 'Revisi', 'Revisi', 'Revisi', 'Revisi', 'Revisi', 'Revisi', 'Evaluasi Hasil Usaha', 'Laporan LC', 'Laporan Vendor Performance Index', 'Update Inventaris Extracomptable Proyek', 'Prognosa Hasil Usaha', 'MS. Project', 'Laporan Bulanan IKN/PSN', 'Laporan Pengupayaan Klaim/Eskalasi', 'Laporan POTOB & SPI', '2024-04-06', '2024-04-06', '2024-04-06', '2024-04-06', '2024-04-06', '2024-04-06', '2024-04-06', '2024-04-06', '2024-04-06');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pic_agendas`
--

CREATE TABLE `pic_agendas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_agenda` bigint(20) DEFAULT NULL,
  `id_pic` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pic_agendas`
--

INSERT INTO `pic_agendas` (`id`, `id_agenda`, `id_pic`, `created_at`, `updated_at`) VALUES
(4, 12, 27, '2024-03-30 21:09:03', '2024-03-30 21:09:03'),
(6, 13, 25, '2024-03-30 21:31:32', '2024-03-30 21:31:32'),
(7, 13, 26, '2024-03-30 21:31:32', '2024-03-30 21:31:32');

-- --------------------------------------------------------

--
-- Table structure for table `pic_divisi_tasks`
--

CREATE TABLE `pic_divisi_tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_task_pcp` bigint(20) UNSIGNED DEFAULT NULL,
  `id_divisi` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pic_divisi_tasks`
--

INSERT INTO `pic_divisi_tasks` (`id`, `id_task_pcp`, `id_divisi`, `created_at`, `updated_at`) VALUES
(3, 9, 64, '2024-04-12 00:36:24', '2024-04-12 00:36:24'),
(4, 9, 46, '2024-04-12 00:36:32', '2024-04-12 00:36:32');

-- --------------------------------------------------------

--
-- Table structure for table `pic_monthly_report_pcps`
--

CREATE TABLE `pic_monthly_report_pcps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_monthly_report_pcp` bigint(20) UNSIGNED DEFAULT NULL,
  `jenis_dokumen` varchar(255) DEFAULT NULL,
  `id_pic` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pic_monthly_report_pcps`
--

INSERT INTO `pic_monthly_report_pcps` (`id`, `id_monthly_report_pcp`, `jenis_dokumen`, `id_pic`, `created_at`, `updated_at`) VALUES
(37, 6, 'Evaluasi Hasil Usaha', 27, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(38, 6, 'Evaluasi Hasil Usaha', 28, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(39, 6, 'Laporan LC', 30, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(40, 6, 'Laporan LC', 31, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(41, 6, 'Laporan Vendor', 30, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(42, 6, 'Laporan Vendor', 31, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(43, 6, 'Update Inventaris', 28, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(44, 6, 'Update Inventaris', 29, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(45, 6, 'Prognosa Hasil Usaha', 28, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(46, 6, 'Prognosa Hasil Usaha', 29, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(47, 6, 'Ms. Project', 24, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(48, 6, 'Ms. Project', 25, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(49, 6, 'Laporan Bulanan IKN', 25, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(50, 6, 'Laporan Bulanan IKN', 26, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(51, 6, 'Laporan Bulanan IKN', 27, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(52, 6, 'Laporan Bulanan IKN', 29, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(53, 6, 'Laporan Upaya Klaim', 24, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(54, 6, 'Laporan Upaya Klaim', 27, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(55, 6, 'Laporan Upaya Klaim', 28, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(56, 6, 'Laporan Potob & SPI', 27, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(57, 6, 'Laporan Potob & SPI', 30, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(58, 6, 'Laporan Potob & SPI', 31, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(59, 7, 'Evaluasi Hasil Usaha', 27, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(60, 7, 'Evaluasi Hasil Usaha', 28, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(61, 7, 'Laporan LC', 30, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(62, 7, 'Laporan LC', 31, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(63, 7, 'Laporan Vendor', 30, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(64, 7, 'Laporan Vendor', 31, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(65, 7, 'Update Inventaris', 28, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(66, 7, 'Update Inventaris', 29, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(67, 7, 'Prognosa Hasil Usaha', 28, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(68, 7, 'Prognosa Hasil Usaha', 29, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(69, 7, 'Ms. Project', 24, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(70, 7, 'Ms. Project', 25, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(71, 7, 'Laporan Bulanan IKN', 25, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(72, 7, 'Laporan Bulanan IKN', 26, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(73, 7, 'Laporan Bulanan IKN', 27, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(75, 7, 'Laporan Upaya Klaim', 24, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(76, 7, 'Laporan Upaya Klaim', 27, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(77, 7, 'Laporan Upaya Klaim', 28, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(78, 7, 'Laporan Potob & SPI', 27, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(79, 7, 'Laporan Potob & SPI', 30, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(80, 7, 'Laporan Potob & SPI', 31, '2024-03-29 05:55:10', '2024-03-29 05:55:10'),
(83, 7, 'Laporan Bulanan IKN', 23, '2024-03-30 13:14:28', '2024-03-30 13:14:28'),
(84, 7, 'Laporan Bulanan IKN', 24, '2024-03-30 13:14:28', '2024-03-30 13:14:28');

-- --------------------------------------------------------

--
-- Table structure for table `pic_tujuan_proyek_tasks`
--

CREATE TABLE `pic_tujuan_proyek_tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_task_pcp` bigint(20) UNSIGNED DEFAULT NULL,
  `id_proyek` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pic_tujuan_proyek_tasks`
--

INSERT INTO `pic_tujuan_proyek_tasks` (`id`, `id_task_pcp`, `id_proyek`, `created_at`, `updated_at`) VALUES
(3, 12, 27, '2024-04-12 04:34:38', '2024-04-12 04:34:38'),
(4, 12, 4, '2024-04-12 04:34:59', '2024-04-12 04:34:59'),
(5, 13, 4, '2024-04-12 04:35:45', '2024-04-12 04:35:45'),
(6, 13, 8, '2024-04-12 04:35:53', '2024-04-12 04:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `pic_tujuan_tasks`
--

CREATE TABLE `pic_tujuan_tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_task_pcp` bigint(20) UNSIGNED DEFAULT NULL,
  `id_tujuan` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pic_tujuan_tasks`
--

INSERT INTO `pic_tujuan_tasks` (`id`, `id_task_pcp`, `id_tujuan`, `created_at`, `updated_at`) VALUES
(7, 10, 64, '2024-04-12 04:30:38', '2024-04-12 04:30:38'),
(8, 9, 64, '2024-04-12 04:32:27', '2024-04-12 04:32:27'),
(9, 11, 62, '2024-04-12 04:33:43', '2024-04-12 04:33:43'),
(10, 9, 65, '2024-04-12 04:36:15', '2024-04-12 04:36:15'),
(11, 10, 56, '2024-04-12 04:36:38', '2024-04-12 04:36:38');

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `id_proyek` int(11) NOT NULL,
  `nama_proyek` varchar(100) DEFAULT NULL,
  `realisasi` float NOT NULL DEFAULT 0,
  `tanggal` date DEFAULT NULL,
  `tipe_konstruksi` varchar(255) DEFAULT NULL,
  `prioritas` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `id_tim_proyek` int(11) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `status_implementasi` varchar(255) DEFAULT NULL,
  `kesiapan_bim5d` varchar(255) NOT NULL DEFAULT '0',
  `dua_d` int(11) NOT NULL DEFAULT 0,
  `tiga_d` int(11) NOT NULL DEFAULT 0,
  `empat_d` int(11) NOT NULL DEFAULT 0,
  `lima_d` int(11) NOT NULL DEFAULT 0,
  `cde` int(11) NOT NULL DEFAULT 0,
  `status_rkp` int(11) NOT NULL DEFAULT 0,
  `status_lps` int(11) NOT NULL DEFAULT 0,
  `id_user_lps` int(11) DEFAULT NULL,
  `tanggal_pho_lps` date DEFAULT NULL,
  `kode_spk_lps` varchar(255) DEFAULT NULL,
  `dokumen_lps` text DEFAULT NULL,
  `deskripsi_proyek` text DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `kode_spk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id_proyek`, `nama_proyek`, `realisasi`, `tanggal`, `tipe_konstruksi`, `prioritas`, `status`, `id_tim_proyek`, `latitude`, `longitude`, `status_implementasi`, `kesiapan_bim5d`, `dua_d`, `tiga_d`, `empat_d`, `lima_d`, `cde`, `status_rkp`, `status_lps`, `id_user_lps`, `tanggal_pho_lps`, `kode_spk_lps`, `dokumen_lps`, `deskripsi_proyek`, `gambar`, `kode_spk`) VALUES
(3, 'Akses Tol makassar New Port', 100, '2023-11-09', 'Road & Bridge', 'Prioritas 1', 'Proyek Menengah', 8, '-5.1160465', '119.4110114', NULL, 'Siap Implementasi BIM 5D', 1, 1, 1, 1, 1, 1, 1, 52, '2023-11-29', NULL, NULL, 'Proyek Akses Tol Makassae New Port', '12052023055105 Akses Tol makassar New Port.jpg', NULL),
(4, 'Bandar Udara Banggai', 91, '2023-11-09', 'Road & Bridge', 'Bukan Prioritas', 'Proyek Kecil', 9, '-1.5540836', '123.5546477', NULL, 'Belum Siap Implementasi BIM 5D', 1, 1, 0, 0, 0, 1, 1, 42, NULL, '122', 'https://fttgyt', 'Proyek Bandar Udara Banggai', '12052023043709 Bandar Udara Banggai.jpg', NULL),
(5, 'Bendungan Ameroro', 90.8, '2023-11-09', 'Water Resource', 'Prioritas 2', 'Proyek Menengah', NULL, '-3.9083268', '122.0099196', NULL, 'Siap Implementasi BIM 5D', 1, 1, 1, 1, 1, 1, 1, 53, NULL, 'Kode', 'https://lookerstudio.google.com/u/0/reporting/c78e509d-dcfe-45a0-b3a5-04560799df7a/page/pIOQD', 'Proyek  Bendungan Meroro', '12052023043538 Bendungan Ameroro.jpg', 'SPK003'),
(8, 'Sumbu Timur', 85, '2023-12-05', 'Road & Bridge', 'Prioritas 1', 'Proyek Besar', 11, '-0.9596623', '116.7020184', NULL, 'Siap Implementasi BIM 5D', 1, 1, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, 'Proyek Sumbu Timur', '12052023043335 Sumbu Timur.jpg', NULL),
(9, 'Bendungan Manikin', 41, '2023-12-05', 'Water Resource', 'Prioritas 1', 'Proyek Besar', 12, '-10.2147620', '123.7191163', NULL, 'Siap Implementasi BIM 5D', 1, 1, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, 'Proyek Bendungan Manikin', '12052023044222 Bendungan Manikin.jpg', NULL),
(10, 'D&B Pengerukan Pelabuhan Benoa Paket A', 59, '2023-12-05', 'Dredging & Land Clearing', 'Prioritas 1', 'Proyek Besar', 13, '-8.7457246', '115.2089482', NULL, 'Siap Implementasi BIM 5D', 1, 1, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, 'Proyek D&B Pengerukan Pelabuhan Benoa Paket A', '12052023044412 D&B Pengerukan Pelabuhan Benoa Paket A.jpg', NULL),
(11, 'Duplikasi Jembatan Kapuas I MYC', 100, '2023-12-05', 'Road & Bridge', 'Prioritas 1', 'Proyek Besar', 14, '-0.0371631', '109.3518281', NULL, 'Siap Implementasi BIM 5D', 1, 1, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, 'Proyek Duplikasi Jembatan Kapuas I MYC', '12052023044611 Duplikasi Jembatan Kapuas I MYC.jpg', NULL),
(12, 'Bendungan Pamukkulu', 99.07, '2023-12-05', 'Water Resource', 'Prioritas 1', 'Proyek Besar', 15, '-5.3972773', '119.5905002', NULL, 'Siap Implementasi BIM 5D', 1, 1, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, 'Proyek Bendungan Pamukkulu', '12052023044805 Bendungan Pamukkulu.jpg', NULL),
(13, 'Pembangunan Jalan dan Jembatan Tumbang Samba Tumbang Hiran II', 59.13, '2023-12-05', 'Road & Bridge', 'Prioritas 3', 'Proyek Kecil', 16, '-1.4563982', '113.0933217', NULL, 'Belum Siap Implementasi BIM 5D', 1, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'Proyek Pembangunan Jalan dan Jembatan Tumbang Samba Tumbang Hiran II', '12052023045111 Pembangunan Jalan dan Jembatan Tumbang Samba Tumbang Hiran II.jpg', NULL),
(14, 'Relokasi Jalan Sei Duri - Mempawah Kalbar (Lingkar Kijing)', 32.84, '2023-12-05', 'Road & Bridge', 'Prioritas 1', 'Proyek Besar', 18, '0.5143710', '108.9476736', NULL, 'Belum Siap Implementasi BIM 5D', 1, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'Proyek Relokasi Jalan Sei Duri - Mempawah Kalbar (Lingkar Kijing)', '12052023045327 Relokasi Jalan Sei Duri - Mempawah Kalbar (Lingkar Kijing).jpg', NULL),
(15, 'Bendungan Jenelata', 0, '2023-12-05', 'Water Resource', 'Prioritas 1', 'Proyek Besar', 19, '-5.2918439', '119.5990221', NULL, 'Belum Siap Implementasi BIM 5D', 1, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'Proyek Bendungan Jeneleta', '12052023045521 Bendungan Jenelata.jpg', NULL),
(16, 'Jalan Tol IKN Segmen KKT Kariangau - Sp. Tempadung', 65.18, '2023-12-05', 'Road & Bridge', 'Prioritas 1', 'Proyek Besar', 20, '-1.1573949', '116.8407825', NULL, 'Siap Implementasi BIM 5D', 1, 1, 1, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Proyek Jalan Tol IKN Segmen KKT Kariangau - Sp. Tempadung', '12052023055016 Jalan Tol IKN Segmen KKT Kariangau - Sp. Tempadung.jpg', NULL),
(17, 'Dredging Pendalaman Alur Tursina Area III & IV', 33.45, '2023-12-05', 'Dredging & Land Clearing', 'Prioritas 2', 'Proyek Menengah', 21, '0.0988705', '117.4816524', NULL, 'Siap Implementasi BIM 5D', 1, 1, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, 'Proyek Dredging Pendalaman Alur Tursina Area III & IV', '12052023055414 Dredging Pendalaman Alur Tursina Area III & IV.jpg', NULL),
(18, 'Irigasi Gumbasa', 100, '2023-12-05', 'Water Resource', 'Bukan Prioritas', 'Proyek Kecil', 22, '-1.2017391', '119.9425945', NULL, 'Persiapan Implementasi BIM 5D', 1, 1, 1, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'Proyek Irigasi Gumbasa', '12052023055726 Irigasi Gumbasa.jpg', NULL),
(19, 'Underpass Tatakan 101', 100, '2023-12-05', 'Road & Bridge', 'Bukan Prioritas', 'Proyek Kecil', 23, '-3.0751754', '115.1101065', NULL, 'Belum Siap Implementasi BIM 5D', 1, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'Proyek Underpass Tatakan 101', '12052023060438 Underpass Tatakan 101.jpg', NULL),
(20, 'Mandalika Urban Tourism Infrastructure Project Package 1', 100, '2023-12-05', 'Road & Bridge', 'Prioritas 1', 'Proyek Besar', 24, '-8.8976580', '116.3038789', NULL, 'Siap Implementasi BIM 5D', 1, 1, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, 'Proyek Mandalika Urban Tourism Infrastructure Project Package 1', '12052023060740 Mandalika Urban Tourism Infrastructure Project Package 1.jpg', NULL),
(21, 'Rekonstruksi Jalan Kalawara-Kulawi dan Sirenja', 100, '2023-12-05', 'Road & Bridge', 'Bukan Prioritas', 'Proyek Kecil', 25, '-1.5020489', '119.8653219', NULL, 'Belum Siap Implementasi BIM 5D', 1, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'Proyek Rekonstruksi Jalan Kalawara-Kulawi dan Sirenja', '12052023061100 Rekonstruksi Jalan Kalawara-Kulawi dan Sirenja.jpg', NULL),
(22, 'SPRD (KPC)', 9, '2023-12-05', 'Road & Bridge', 'Prioritas 1', 'Proyek Besar', 26, '0.5457752', '117.6217823', NULL, 'Siap Implementasi BIM 5D', 1, 1, 1, 1, 0, 0, 0, NULL, NULL, NULL, NULL, 'Proyek SPRD (KPC)', '12052023061306 SPRD (KPC).jpg', NULL),
(23, 'MWRD (KPC)', 20.68, '2023-12-05', 'Road & Bridge', 'Bukan Prioritas', 'Proyek Kecil', 27, '0.5457752', '117.6217823', NULL, 'Belum Siap Implementasi BIM 5D', 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'Proyek MWRD (KPC)', '12052023061518 MWRD (KPC).jpg', NULL),
(24, 'Penyiapan Lahan Industri PKT Bontang', 98.35, '2023-12-05', 'Dredging & Land Clearing', 'Bukan Prioritas', 'Proyek Kecil', 28, '0.1007683', '117.4764607', NULL, 'Belum Siap Implementasi BIM 5D', 1, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'Proyek Penyiapan Lahan Industri PKT Bontang', '12052023062347 Penyiapan Lahan Industri PKT Bontang.jpg', NULL),
(25, 'Pekerjaan Land Clearing untuk Budidaya Jagung Kabupaten Keerom', 50.61, '2023-12-05', 'Dredging & Land Clearing', 'Bukan Prioritas', 'Proyek Kecil', 29, '-3.3312800', '140.7670145', NULL, 'Belum Siap Implementasi BIM 5D', 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'Proyek Pekerjaan Land Clearing untuk Budidaya Jagung Kabupaten Keerom', '12052023062636 Pekerjaan Land Clearing untuk Budidaya Jagung Kabupaten Keerom.jpg', NULL),
(26, 'Wani Port', 85.104, '2023-12-05', 'Harbour', 'Prioritas 3', 'Proyek Kecil', 30, '-0.6948045', '119.8402461', NULL, 'Belum Siap Implementasi BIM 5D', 1, 1, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'Proyek Wani Port', '12052023062750 Wani Port.jpg', NULL),
(27, 'Donggala Port', 50, '2023-12-05', 'Harbour', 'Prioritas 1', 'Proyek Kecil', 31, '-0.6670883', '119.7443731', NULL, 'Belum Siap Implementasi BIM 5D', 1, 0, 0, 0, 0, 1, 1, 37, NULL, '1235', 'https://fttgyt', 'Proyek Donggala Port', '12052023062911 Donggala Port.jpg', NULL),
(28, 'PASIGALA raw water transmission system rehabilitation (Paket 1)', 92.1, '2023-12-05', 'Water Resource', 'Prioritas 2', 'Proyek Menengah', 32, '119.7443731', '119.9631180', NULL, 'Belum Siap Implementasi BIM 5D', 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'Proyek PASIGALA raw water transmission system rehabilitation (Paket 1)', '12052023063122 PASIGALA raw water transmission system rehabilitation (Paket 1).jpg', NULL),
(29, 'Proyek JDU SPAM Regional Mamminasata', 32.11, '2023-12-05', 'Water Resource', 'Prioritas 2', 'Proyek Menengah', 33, '-5.1628036', '119.5956783', NULL, 'Belum Siap Implementasi BIM 5D', 1, 1, 0, 0, 0, 1, 0, NULL, NULL, NULL, NULL, 'Proyek Proyek JDU SPAM Regional Mamminasata', '12052023063315 Proyek JDU SPAM Regional Mamminasata.png', NULL),
(30, 'Jaringan Perpipaan Air Limbah 1 dan 3 KIPP IKN', 0.51, '2023-11-15', 'Water Resource', 'Prioritas 2', 'Proyek Menengah', 35, '-6.242049', '106.875651', NULL, 'Belum Siap Implementasi BIM 5D', 1, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'PEMBANGUNAN JARINGAN PERPIPAAN AIR LIMBAH 1 DAN 3 KAWASAN INTI PUSAT PEMERINTAHAN IBU KOTA NEGARA (KIPP IKN)', '01122024022949 Jaringan Perpipaan Air Limbah 1 dan 3 KIPP IKN.jpg', NULL),
(31, 'Proyek Baru 1', 55, '2024-04-10', 'Road & Bridge', 'Prioritas 1', 'Proyek Menengah', NULL, '-6.1944491', '107.7411404', NULL, 'Persiapan Implementasi BIM 5D', 1, 1, 1, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'Desc', '04102024120959 Proyek Baru 1.png', NULL),
(33, 'Proyek Baru 2', 0, '2024-04-11', 'Water Resource', 'Prioritas 1', 'Proyek Menengah', NULL, '-6.9173248', '108.5341696', NULL, '0', 0, 0, 0, 0, 0, 0, 0, NULL, NULL, NULL, NULL, 'Desc', '04112024071140 Proyek Baru 2.png', 'SPK002');

-- --------------------------------------------------------

--
-- Table structure for table `proyek_users`
--

CREATE TABLE `proyek_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_proyek` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proyek_users`
--

INSERT INTO `proyek_users` (`id`, `id_proyek`, `id_user`, `created_at`, `updated_at`) VALUES
(2, 31, 56, '2024-04-10 05:12:43', '2024-04-10 05:12:43'),
(3, 31, 57, '2024-04-10 05:12:52', '2024-04-10 05:12:52'),
(4, 31, 62, '2024-04-10 05:13:03', '2024-04-10 05:13:03'),
(7, 27, 64, '2024-04-10 05:55:46', '2024-04-10 05:55:46'),
(8, 27, 57, '2024-04-10 05:55:55', '2024-04-10 05:55:55');

-- --------------------------------------------------------

--
-- Table structure for table `rencana`
--

CREATE TABLE `rencana` (
  `id_rencana` int(11) NOT NULL,
  `tipe` varchar(100) NOT NULL,
  `tahun` year(4) NOT NULL,
  `januari` int(11) NOT NULL DEFAULT 0,
  `februari` int(11) NOT NULL DEFAULT 0,
  `maret` int(11) NOT NULL DEFAULT 0,
  `april` int(11) NOT NULL DEFAULT 0,
  `mei` int(11) NOT NULL DEFAULT 0,
  `juni` int(11) NOT NULL DEFAULT 0,
  `juli` int(11) NOT NULL DEFAULT 0,
  `agustus` int(11) NOT NULL DEFAULT 0,
  `september` int(11) NOT NULL DEFAULT 0,
  `oktober` int(11) NOT NULL DEFAULT 0,
  `november` int(11) NOT NULL DEFAULT 0,
  `desember` int(11) NOT NULL DEFAULT 0,
  `tanggal_input` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rencana`
--

INSERT INTO `rencana` (`id_rencana`, `tipe`, `tahun`, `januari`, `februari`, `maret`, `april`, `mei`, `juni`, `juli`, `agustus`, `september`, `oktober`, `november`, `desember`, `tanggal_input`) VALUES
(2, 'KI/KM', '2023', 3, 3, 3, 3, 4, 4, 3, 4, 3, 4, 3, 4, '2023-11-25'),
(3, 'Technical Supporting', '2023', 3, 3, 2, 2, 3, 2, 3, 2, 3, 2, 3, 3, '2023-01-09'),
(5, 'KI/KM', '2022', 3, 0, 2, 0, 2, 0, 0, 0, 0, 0, 0, 0, '2023-12-08'),
(6, 'Technical Supporting', '2022', 1, 0, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2023-12-08');

-- --------------------------------------------------------

--
-- Table structure for table `rkp`
--

CREATE TABLE `rkp` (
  `id_rkp` int(11) NOT NULL,
  `id_proyek` int(11) DEFAULT NULL,
  `kode_spk` varchar(255) DEFAULT NULL,
  `review1` int(11) NOT NULL DEFAULT 0,
  `review2` int(11) NOT NULL DEFAULT 0,
  `review3` int(11) NOT NULL DEFAULT 0,
  `review4` int(11) NOT NULL DEFAULT 0,
  `review5` int(11) NOT NULL DEFAULT 0,
  `review6` int(11) NOT NULL DEFAULT 0,
  `note` text DEFAULT NULL,
  `tanggal_rkp` date NOT NULL,
  `id_user_respon` int(11) DEFAULT NULL,
  `is_respon` int(11) NOT NULL DEFAULT 0,
  `upload_file` text DEFAULT NULL,
  `upload_file_hasil` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rkp`
--

INSERT INTO `rkp` (`id_rkp`, `id_proyek`, `kode_spk`, `review1`, `review2`, `review3`, `review4`, `review5`, `review6`, `note`, `tanggal_rkp`, `id_user_respon`, `is_respon`, `upload_file`, `upload_file_hasil`) VALUES
(12, 5, '3457790', 1, 1, 1, 0, 0, 0, NULL, '2024-01-14', 37, 1, '01162024124830 3457790.jpg', NULL),
(13, 29, NULL, 0, 0, 0, 0, 0, 0, NULL, '2024-04-11', 53, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `saran`
--

CREATE TABLE `saran` (
  `id_saran` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `mesaage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sni`
--

CREATE TABLE `sni` (
  `id_sni` int(11) NOT NULL,
  `nama_sni` varchar(255) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sni`
--

INSERT INTO `sni` (`id_sni`, `nama_sni`, `file`) VALUES
(5, 'ini', '01292024071149 ini.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `software`
--

CREATE TABLE `software` (
  `id_software` int(11) NOT NULL,
  `nama_software` varchar(255) DEFAULT NULL,
  `fungsi` varchar(255) DEFAULT NULL,
  `kategori` varchar(255) DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `tanggal_software` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `software`
--

INSERT INTO `software` (`id_software`, `nama_software`, `fungsi`, `kategori`, `gambar`, `tanggal_software`) VALUES
(2, 'Global Mapper', 'Survey Course', 'Engineering', '12052023095050 Global Mapper.png', NULL),
(3, 'ArcGIS', 'Survey Course', 'Engineering', '12052023095030 ArcGIS.png', NULL),
(4, 'Metashape', 'Survey Course', 'Engineering', '12052023095011 Metashape.png', NULL),
(5, 'PCI Geomatica', 'Survey Course', 'Engineering', '12052023094950 PCI Geomatica.png', NULL),
(6, 'Autocad', 'Modelling', 'Engineering', '12052023094929 Autocad.png', NULL),
(7, 'Revit', 'Modelling', 'Engineering', '12052023094908 Revit.png', NULL),
(8, 'Infraworks', 'Modelling', 'Engineering', '12052023094845 Infraworks.png', NULL),
(9, 'Civil 3D', 'Modelling', 'Engineering', '12052023094823 Civil 3D.png', NULL),
(10, 'Tekla Structures', 'Modelling', 'Engineering', '12052023094758 Tekla Structures.png', NULL),
(11, 'TRB', 'Modelling', 'Engineering', '12052023094736 TRB.png', NULL),
(12, 'TAS', 'Modelling', 'Engineering', '12052023094544 TAS.png', NULL),
(13, 'Open Building', 'Modelling', 'Engineering', '12052023094606 Open Building.png', NULL),
(14, 'Open Road', 'Modelling', 'Engineering', '12052023094647 Open Road.png', NULL),
(15, 'Open Bridge', 'Modelling', 'Engineering', '12052023094626 Open Bridge.png', NULL),
(16, 'Skecthup', 'Modelling', 'Engineering', '12052023094507 Skecthup.png', NULL),
(17, 'Allplan Bridge', 'Modelling', 'Engineering', '12052023094426 Allplan Bridge.png', NULL),
(18, 'Allplan Eng', 'Modelling', 'Engineering', '12052023094445 Allplan Eng.png', NULL),
(19, 'ArchiCad', 'Modelling', 'Engineering', '12052023094332 ArchiCad.png', NULL),
(20, 'Tekla Tedds', 'Modelling', 'Engineering', '12052023094312 Tekla Tedds.png', NULL),
(21, 'Plaxis', 'Analisis', 'Engineering', '12052023094254 Plaxis.jpg', NULL),
(22, 'SAP 2000', 'Analisis', 'Engineering', '12052023094230 SAP 2000.png', NULL),
(23, 'Robot', 'Analisis', 'Engineering', '12052023094151 Robot.png', NULL),
(24, 'ETABS', 'Analisis', 'Engineering', '12052023094211 ETABS.png', NULL),
(25, 'Primavera', '4D & 5D', 'Engineering', '12052023094133 Primavera.png', NULL),
(26, 'Ms. Project', '4D & 5D', 'Engineering', '12052023094116 Ms. Project.png', NULL),
(27, 'Synchro Pro', '4D & 5D', 'Engineering', '12052023094058 Synchro Pro.png', NULL),
(28, 'Naviswork', '4D & 5D', 'Engineering', '12052023094039 Naviswork.png', NULL),
(29, 'TBQ', '4D & 5D', 'Engineering', '12052023094021 TBQ.png', NULL),
(30, 'Lumion', 'Animasi', 'Engineering', '12052023093957 Lumion.png', NULL),
(31, '3DS Max', 'Animasi', 'Engineering', '12052023093936 3DS Max.png', NULL),
(32, 'Lumenrt 4', 'Animasi', 'Engineering', '12052023093918 Lumenrt 4.png', NULL),
(33, 'Enscape', 'Animasi', 'Engineering', '12052023093900 Enscape.png', NULL),
(34, 'Ms. Word', 'Microsoft Office', 'Office', '12052023093830 Ms. Word.png', NULL),
(35, 'Ms. Excel', 'Microsoft Office', 'Office', '12052023093845 Ms. Excel.png', NULL),
(36, 'Ms. Powerpoint', 'Microsoft Office', 'Office', '12052023093815 Ms. Powerpoint.png', NULL),
(37, 'Ms. Outlook', 'Microsoft Office', 'Office', '12052023093800 Ms. Outlook.png', NULL),
(38, 'Solidworks', 'Lain-lain', 'Engineering', '11192023124638 Solidworks.jpg', NULL),
(39, 'Ideastatica', 'Lain-lain', 'Engineering', '11192023124700 Ideastatica.jpg', NULL),
(40, 'SPColumn', 'Lain-lain', 'Engineering', '11192023124725 SPColumn.jpg', NULL),
(41, 'Nitro Pro', 'Lain-lain', 'Office', '11192023124754 Nitro Pro.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id_task` int(11) NOT NULL,
  `item_task` varchar(255) DEFAULT NULL,
  `id_personil` int(11) DEFAULT NULL,
  `timeline` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `file` text DEFAULT NULL,
  `komentar` text DEFAULT NULL,
  `id_manajemen` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id_task`, `item_task`, `id_personil`, `timeline`, `status`, `file`, `komentar`, `id_manajemen`, `created_at`, `updated_at`) VALUES
(3, 'Item Task 1', 58, '2024-02-10 12:48:00', 'Start', '02102024054924.pdf', 'Komentar ku', 60, '2024-02-09 22:48:59', '2024-02-10 00:55:28'),
(4, 'Item Task 2', 58, '2024-02-19 18:01:00', 'Start', '02102024080338.pdf', NULL, NULL, '2024-02-10 01:01:29', '2024-02-10 01:03:38'),
(5, 'Item Task 3', 58, '2024-02-20 18:19:00', 'Start', NULL, NULL, NULL, '2024-02-10 02:20:04', '2024-02-10 02:20:04'),
(6, 'Item Task 4', 58, '2024-01-18 19:31:00', 'Done', NULL, NULL, NULL, '2024-01-10 02:31:26', '2024-01-10 02:31:26'),
(7, 'Item Task 1', 58, '2024-02-12 14:38:00', 'Start', NULL, NULL, NULL, '2024-02-12 00:38:24', '2024-02-12 00:38:24');

-- --------------------------------------------------------

--
-- Table structure for table `task_pcps`
--

CREATE TABLE `task_pcps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tanggal_permintaan` date DEFAULT NULL,
  `judul_tugas` varchar(255) DEFAULT NULL,
  `instruksi_pekerjaan` text DEFAULT NULL,
  `batas_waktu` datetime DEFAULT NULL,
  `link_pengumpulan_tugas` text DEFAULT NULL,
  `status_tugas` varchar(255) DEFAULT NULL,
  `komentar` text DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `task_pcps`
--

INSERT INTO `task_pcps` (`id`, `tanggal_permintaan`, `judul_tugas`, `instruksi_pekerjaan`, `batas_waktu`, `link_pengumpulan_tugas`, `status_tugas`, `komentar`, `created_by`, `created_at`, `updated_at`) VALUES
(9, '2024-04-12', 'Judul 1', 'Instruksi', '2024-04-23 18:30:00', 'Link', 'Close', 'Catatan', 61, '2024-04-12 00:36:01', '2024-04-12 05:24:32'),
(10, '2024-04-12', 'Judul 2', 'Instruksi', '2024-04-23 18:30:00', 'Link', 'Open', NULL, 61, '2024-04-12 04:30:14', '2024-04-12 04:30:14'),
(11, '2024-04-13', 'Judul 3', 'Instruksi', '2024-04-30 18:32:00', 'Link', 'Open', NULL, 61, '2024-04-12 04:33:02', '2024-04-12 04:33:02'),
(12, '2024-04-12', 'Judul 4', 'Link', '2024-04-30 18:34:00', 'Link', 'Close', 'Catatan', 61, '2024-04-12 04:34:21', '2024-04-12 06:11:25'),
(13, '2024-04-12', 'Judul 5', 'Instrksui', '2024-04-30 18:35:00', 'Link', 'Open', NULL, 61, '2024-04-12 04:35:31', '2024-04-12 04:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `technical_supporting`
--

CREATE TABLE `technical_supporting` (
  `id_technical_supporting` int(11) NOT NULL,
  `id_proyek` int(11) DEFAULT NULL,
  `pic` varchar(255) DEFAULT NULL,
  `nomor_laporan` varchar(255) DEFAULT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `topik` varchar(255) DEFAULT NULL,
  `tanggal_submit` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `status_support` varchar(255) DEFAULT NULL,
  `note` varchar(255) DEFAULT NULL,
  `dokumen` text DEFAULT NULL,
  `kendala` text DEFAULT NULL,
  `is_respon` int(11) NOT NULL DEFAULT 0,
  `id_user` int(11) DEFAULT NULL,
  `upload_file` text DEFAULT NULL,
  `upload_file_hasil` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `technical_supporting`
--

INSERT INTO `technical_supporting` (`id_technical_supporting`, `id_proyek`, `pic`, `nomor_laporan`, `kode`, `topik`, `tanggal_submit`, `tanggal_selesai`, `status_support`, `note`, `dokumen`, `kendala`, `is_respon`, `id_user`, `upload_file`, `upload_file_hasil`) VALUES
(51, 5, 'Muhammad Aqrobin', 'nmpp', 'S', 'barang', '2024-01-23', NULL, NULL, NULL, NULL, 'trial', 1, 42, '01232024084213 trial.jpg', NULL),
(52, 27, 'Herlambang Bagus Sulistyo', '22333', 'G/S', 'kk', '2024-01-24', '2024-01-24', 'ON GOING', NULL, NULL, 'uuu', 1, 39, '01242024062812 uuu.pdf', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `timelines`
--

CREATE TABLE `timelines` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_proyek` int(11) DEFAULT NULL,
  `verifikasi_timeline` varchar(255) DEFAULT 'Belum Disetujui',
  `id_verifikator` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `timeline_details`
--

CREATE TABLE `timeline_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_timeline` bigint(20) DEFAULT NULL,
  `id_dokumen_timeline` bigint(20) DEFAULT NULL,
  `tanggal_timeline` date DEFAULT NULL,
  `nama_dokumen` varchar(255) DEFAULT NULL,
  `file_dokumen` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tim_proyek`
--

CREATE TABLE `tim_proyek` (
  `id_tim_proyek` int(11) NOT NULL,
  `nama_tim_proyek` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal_dibuat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tim_proyek`
--

INSERT INTO `tim_proyek` (`id_tim_proyek`, `nama_tim_proyek`, `deskripsi`, `tanggal_dibuat`) VALUES
(3, 'Tim Proyek A', 'Deskripsi Proyek A', '2023-10-29'),
(4, 'Tim Proyek B', 'Deskripsi Tim Proyek B', '2023-10-29'),
(5, 'Tim Proyek C', 'Deskripsi Tim Proyek C', '2023-10-29'),
(6, 'Tim Proyek D', 'Deskripsi Tim Proyek D', '2023-10-29'),
(7, 'Tim Proyek E', 'Deskripsi Tim Proyek E', '2023-10-29'),
(8, 'Tim Akses Tol makassar New Port', 'Akses Tol makassar New Port', '2023-11-09'),
(9, 'Tim Bandar Udara Banggai', 'Bandar Udara Banggai', '2023-11-09'),
(10, 'Tim Bendungan Ameroro', 'Bendungan Ameroro', '2023-11-09'),
(11, 'Tim Sumbu Timur', 'Proyek Sumbu Timur', '2023-09-21'),
(12, 'Tim Bendungan Manikin', 'Tim Bendungan Manikin', '2023-09-21'),
(13, 'Tim D&B Pengerukan Pelabuhan Benoa Paket A', 'Tim D&B Pengerukan Pelabuhan Benoa Paket A', '2023-09-21'),
(14, 'Tim Duplikasi Jembatan Kapuas I MYC', 'Tim Duplikasi Jembatan Kapuas I MYC', '2023-09-21'),
(15, 'Tim Bendungan Pamukkulu', 'Tim Bendungan Pamukkulu', '2023-09-21'),
(16, 'Tim Pembangunan Jalan dan Jembatan Tumbang Samba Tumbang Hiran II', 'Pembangunan Jalan dan Jembatan Tumbang Samba Tumbang Hiran II', '2023-09-21'),
(18, 'Tim Relokasi Jalan Sei Duri - Mempawah Kalbar (Lingkar Kijing)', 'Proyek Relokasi Jalan Sei Duri - Mempawah Kalbar (Lingkar Kijing)', '2023-09-21'),
(19, 'Tim Bendungan Jenelata', 'Proyek Bendungan Jenelata', '2023-11-21'),
(20, 'Tim Jalan Tol IKN Segmen KKT Kariangau - Sp. Tempadung', 'Proyek Jalan Tol IKN Segmen KKT Kariangau - Sp. Tempadung', '2023-11-21'),
(21, 'Tim Dredging Pendalaman Alur Tursina Area III & IV', 'Proyek Dredging Pendalaman Alur Tursina Area III & IV', '2023-11-21'),
(22, 'Tim Irigasi Gumbasa', 'Proyek Irigasi Gumbasa', '2023-11-21'),
(23, 'Tim Underpass Tatakan 101', 'Proyek Underpass Tatakan 101', '2023-11-21'),
(24, 'Tim Mandalika Urban Tourism Infrastructure Project Package 1', 'Proyek Mandalika Urban Tourism Infrastructure Project Package 1', '2023-11-21'),
(25, 'Tim Rekonstruksi Jalan Kalawara-Kulawi dan Sirenja', 'Proyek Rekonstruksi Jalan Kalawara-Kulawi dan Sirenja', '2023-11-21'),
(26, 'Tim SPRD (KPC)', 'Proyek SPRD (KPC)', '2023-11-21'),
(27, 'Tim MWRD (KPC)', 'Proyek MWRD (KPC)', '2023-11-21'),
(28, 'Tim Penyiapan Lahan Industri PKT Bontang', 'Proyek Penyiapan Lahan Industri PKT Bontang', '2023-11-21'),
(29, 'Tim Pekerjaan Land Clearing untuk Budidaya Jagung Kabupaten Keerom', 'Proyek Pekerjaan Land Clearing untuk Budidaya Jagung Kabupaten Keerom', '2023-11-21'),
(30, 'Tim Wani Port', 'Proyek Wani Port', '2023-11-21'),
(31, 'Tim Donggala Port', 'Proyek Donggala Port', '2023-11-21'),
(32, 'Tim PASIGALA raw water transmission system rehabilitation (Paket 1)', 'Proyek PASIGALA raw water transmission system rehabilitation (Paket 1)', '2023-11-21'),
(33, 'Tim Proyek JDU SPAM Regional Mamminasata', 'Proyek JDU SPAM Regional Mamminasata', '2023-11-21'),
(35, 'Tim IPAL IKN', 'Tim Jaringan Perpipaan Air Limbah 1 dan 3 KIPP IKN', '2023-11-15');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(50) DEFAULT NULL,
  `jabatan` varchar(100) DEFAULT NULL,
  `fungsi` varchar(255) DEFAULT NULL,
  `nip` varchar(30) DEFAULT NULL,
  `telepon` varchar(30) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `role` varchar(255) NOT NULL,
  `divisi` varchar(255) DEFAULT NULL,
  `foto_user` text DEFAULT NULL,
  `id_jabatan` bigint(20) DEFAULT NULL,
  `id_divisi` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `jabatan`, `fungsi`, `nip`, `telepon`, `password`, `role`, `divisi`, `foto_user`, `id_jabatan`, `id_divisi`) VALUES
(1, 'Admin', 'Admin', NULL, '11111', '0898972836423', '$2y$10$sIgZRbYhk3OmrUSTZBJyH.qMkghMa7bdaAFwODNfSCZ8OIfsB4cZi', 'Admin', 'Engineering', '01042024015454Admin.png', NULL, NULL),
(12, 'Anggota Tim Proyek A', 'General Manager', NULL, '55555', '0898988397872', '$2y$10$ftafxo0GcSpHkcObrW6K1.nX.iymQI7vZZIt58uEHn8TOn6qQP8Z6', 'Tim Proyek', 'Engineering', '10282023195739 Anggota Tim Proyek A.jpg', NULL, NULL),
(13, 'User 1', 'Staf', NULL, '10101010', '0898997198934', '$2y$10$648WzdZ.9DPsHOjmIHKNrOT2KPnQ4stodXLH0PmsZzdTuzuDHE58K', 'Tim Proyek', 'Engineering', '10282023201444 User 1.jpg', NULL, NULL),
(14, 'Tim Proyek 1', 'Kepala Seksi Proyek Menengah', NULL, '12222', '089899179868', '$2y$10$UmuCwinglz8O.0AUhx7a9OZf152cVrJd9LNe275eBVON1ctXDnkru', 'Tim Proyek', 'Engineering', '10292023085008 Tim Proyek 1.jpg', NULL, NULL),
(15, 'Tim Proyek 2 update', 'Staf', NULL, '22222', '089899728363', '$2y$10$jFMN4Kz5LL0cWPDCPBadpenXuuzTP44Hl5vX/Jq5lK3xQaJtkfxI.', 'Tim Proyek', 'Engineering', '11022023000546Tim Proyek 2 update.jpg', NULL, NULL),
(16, 'Tim Proyek 3', 'Staf', NULL, '322222', '0897867858323', '$2y$10$GbSqZohjhFBpVfg7GZ.s0.J1q7ipXJCtMLIIcA.nT7VHqE2CBcCr2', 'Tim Proyek', 'Engineering', '10292023085157 Tim Proyek 3.jpg', NULL, NULL),
(17, 'Tim Proyek 4', 'Staf', NULL, '42222', '089978628744', '$2y$10$iNWgb5fQFni1.gRk.IDD0OKUI1BA.oOgCbgkZlz.c67KIyncau.4S', 'Tim Proyek', 'Engineering', '10292023085235 Tim Proyek 4.jpg', NULL, NULL),
(18, 'Tim Proyek 5', 'Staf', NULL, '52222', '089998923432543', '$2y$10$bZBZdvRy9QKaBSRM7KdZhOsYi2WwaBhtLA8JQ3f2iYlgj5or4jt6C', 'Tim Proyek', 'Engineering', '10292023085320 Tim Proyek 5.jpg', NULL, NULL),
(23, 'Head Office 1', 'Staff of Engineering', 'Design & Analysis', '333331', '089979792324', '$2y$10$ZEQxnEsqEbsc1AOoX8uoRux2ESLgP6yZlT3nALgzRmCZXjIgyN0je', 'Head Office', 'Engineering', '11042023061636 Head Office 1.jpg', NULL, NULL),
(24, 'Head Office 2', 'Staff of Engineering', 'Design & Analysis', '333332', '089897898323', '$2y$10$Vkwjr3Gmo1o4uHp7EF1wVukGphlVPJ9NMCYpi4SAecVtt.uBDD0QG', 'Head Office', 'Engineering', '11042023061727 Head Office 2.jpg', NULL, NULL),
(25, 'Head Office 3', 'Staff of Engineering', 'Design & Analysis', '333333', '089978686878', '$2y$10$URcpbBLvxaGkUpI.Oob9E.lM7NVYlMEMwg019euLFVcNsn8jKuMYK', 'Head Office', 'Engineering', '11042023061813 Head Office 3.jpg', NULL, NULL),
(26, 'Head Office 4', 'Staff of Engineering', 'BIM & Digitalization Engineering', '333334', '08989813412421', '$2y$10$WDVWReivpdkA22aUE1SA6OYThRdvMMLp4fR3HDYVmKg4FTof5AZOe', 'Head Office', 'Engineering', '11062023034654 Head Office 4.jpg', NULL, NULL),
(27, 'Luthfi Bina', 'Staff Corporate', 'System Engineering & Lean Construction', 'ET032190', '123456789', '$2y$10$4B4HKg1oDiPD.lmjtCvLTucPc7W1X6v0dV6PQHYMl0enrpe39odT2', 'Head Office', 'Engineering', '11102023043204 Luthfi Bina.jpg', NULL, NULL),
(28, 'Aliq Taufan Arisono', 'Staff Corporate', 'System Engineering & Lean Construction', 'ET173874', '123456789', '$2y$10$LPB/DSpZ.o9COJZv5gr/z.WiQBs3NC/i0aVTjQYcUTyQbJl77FLy.', 'Head Office', 'Engineering', '11102023043306 Aliq Taufan Arisono.jpg', NULL, NULL),
(29, 'Muhammad Risyad Alditio, ST.', 'Staff Corporate', 'Design & Analysis', 'ET194333', '123456789', '$2y$10$cNDjGrpv1sTb6qXJ3MxYS.RB6dl3pJAZEe1vNXjYT4Z7i1jAjJ.Sm', 'Head Office', 'Engineering', '11102023043430 Muhammad Risyad Alditio, ST..jpg', NULL, NULL),
(30, 'R.M. Ihsan', 'Staff Corporate', 'Design & Analysis', 'ET194334', '123456789', '$2y$10$qJ1YkMb4YMyyM61TO4ecWub5X08Tjey2DYj1PhGzDF8CAi.TP5Cly', 'Head Office', 'Engineering', '11102023043522 R.M. Ihsan.jpg', NULL, NULL),
(31, 'Wahyu Imam Pambudi', 'Staff Corporate', 'Design & Analysis', 'ET173858', '123456789', '$2y$10$LjDR6yfZpeFV7WWUpuu8Y.xlnhbXTnhhkpRY1.qXE/uXBE.HDe/4S', 'Head Office', 'Engineering', '11102023043621 Wahyu Imam Pambudi.jpg', NULL, NULL),
(32, 'Rizky Dhewandaru', 'Staff Corporate', 'Design & Analysis', 'ET194389', '123456789', '$2y$10$.8wmL2Ydi.Zjb2CuoFa6v.NJ2.VDdwJ/isGB7/8JttlKFmqj5XooG', 'Head Office', 'Engineering', '11102023043714 Rizky Dhewandaru.jpg', NULL, NULL),
(33, 'Andrian Wibisono', 'Staff Corporate', 'System Engineering & Lean Construction', 'ET224521', '123456789', '$2y$10$t5kbRbpSjF6qbkfD6CQhA..4Il5owS/lfKVo1XJasgN314ppjNhZG', 'Head Office', 'Engineering', '11102023044026 Andrian Wibisono.jpg', NULL, NULL),
(34, 'Aswadi Irsyadillah', 'Staff Corporate', 'Design & Analysis', 'ET194363', '123456789', '$2y$10$u/zVDd.jr3Hv7yuo.oYgcOk6H0luu0GGcS6XE.mEIbUfG8moCE8gK', 'Head Office', 'Engineering', '11102023044131 Aswadi Irsyadillah.jpg', NULL, NULL),
(35, 'Aryo Bimantoro', 'Staff Corporate', 'Design & Analysis', 'ET184207', '123456789', '$2y$10$ud7JEqN.KLAQMZlY8c0dSeWS.kGX3LwglNhByUm87p4s.YmwPDBea', 'Head Office', 'Engineering', '11102023044225 Aryo Bimantoro.jpg', NULL, NULL),
(36, 'Anan Febyanto Sanjaya', 'Staff Corporate', 'Design & Analysis', 'LS193837', '123456789', '$2y$10$c5QpeaBDVBM/2aPuy91Ower1LEqDFqwNWimVY0TQ16n8CQRLY6Dw.', 'Head Office', 'Engineering', '11102023044318 Anan Febyanto Sanjaya.jpg', NULL, NULL),
(37, 'Agus Ubaidillah', 'Coordinator', 'BIM & Digitalization Engineering', 'ET122830', '123456789', '$2y$10$MYbeRJhk4FrK.2zjgnmXn.wVcDmqPRS2RrRX4/.hPePH1T7XvDsyu', 'Head Office', 'Engineering', '12112023071406Agus Ubaidillah.jpg', NULL, NULL),
(38, 'Nico Okto Wahyu Hartama', 'Staff Corporate', 'BIM & Digitalization Engineering', 'K190573', '123456789', '$2y$10$26kgnbDP2JTZnI5MpIGQ1ujwCOARKJG9denMY3hSDvrLJraG.H3Le', 'Head Office', 'Engineering', '11102023044526 Nico Okto Wahyu Hartama.jpg', NULL, NULL),
(39, 'Herlambang Bagus Sulistyo', 'Staff Corporate', 'BIM & Digitalization Engineering', 'ET163730', '123456789', '$2y$10$upMlbbkVTKLDxmxVJSnFkOyrIwtafDtl6LRxxAc//ocUDyX9nYaAu', 'Head Office', 'Engineering', '11102023044645 Herlambang Bagus Sulistyo.jpg', NULL, NULL),
(40, 'Rifki Rahmadian Pangestu', 'Staff Corporate', 'BIM & Digitalization Engineering', 'ET204480', '123456789', '$2y$10$ANcu4APoKHmVS6.7oNA7xuMRW56uUgcXatUIWMHQol152hddUJsyK', 'Head Office', 'Engineering', '11102023044740 Rifki Rahmadian Pangestu.jpg', NULL, NULL),
(41, 'Prita Nur Rifdah', 'Staff Corporate', NULL, 'Magang', '085860500814', '$2y$10$8dIMGgqN559jD4kMkD.RAOv8pa5vep97p0SXwqH5PWfOlDtkPGlwW', 'Admin', 'Engineering', '11102023044842 Prita Nur Rifdah.jpg', NULL, NULL),
(42, 'Muhammad Aqrobin', 'Coordinator', 'System Engineering & Lean Construction', 'ET082466', '123456789', '$2y$10$AmAjaX18pwub3m4MfpynSO6ZqRlIMlz3Is2pIgaRv5u/7Nb6dJQ9C', 'Head Office', 'Engineering', '11102023044940 Muhammad Aqrobin.jpg', NULL, NULL),
(43, 'Muhammad Ariful Akbar', 'Staff Corporate', 'System Engineering & Lean Construction', 'ET163808', '123456789', '$2y$10$HRjJ7JaU0XZR1GkT4jmNPeOBjP60Kr6rJRrgjcf9XHn5u7ZM4Seka', 'Head Office', 'Engineering', '11102023045032 Muhammad Ariful Akbar.jpg', NULL, NULL),
(44, 'Ahmad Najib', 'Staff Corporate', 'System Engineering & Lean Construction', 'ET133080', '123456789', '$2y$10$9wDgvz92nCizjonDrVD1w.HdzpZXDGjseuLL0WwQet7CnQURbwFxW', 'Head Office', 'Engineering', '11102023045150 Ahmad Najib.jpg', NULL, NULL),
(45, 'Antonius Herdianto Gultom', 'Staff Corporate', 'System Engineering & Lean Construction', 'LS153485', '123456789', '$2y$10$dJOot.VnnLuDV1g2TzAEIOjqkRF7TI47giwnHmeCzWg95TgqErMeS', 'Head Office', 'Engineering', '11102023045243 Antonius Herdianto Gultom.jpg', NULL, NULL),
(46, 'Meiko Yogatama', 'Staff Corporate', 'System Engineering & Lean Construction', 'LS193812', '123456789', '$2y$10$KE5veszgrtVwVHFuEc2nduG2JrllF1fABifP1zhOudbBd36m5OdFW', 'Head Office', 'Engineering', '11102023045348 Meiko Yogatama.jpg', NULL, NULL),
(47, 'Marjukih', 'Staff Corporate', 'System Engineering & Lean Construction', 'LS203851', '123456789', '$2y$10$5DoEaX6qNCJ3FlykfWGECuk2V6DwzsORgXkbo9F6/FcniA.VSa.c.', 'Head Office', 'Engineering', '11102023045433 Marjukih.jpg', NULL, NULL),
(48, 'Herru Kusuma Praja', 'Staff Corporate', 'System Engineering & Lean Construction', 'ET163721', '123456789', '$2y$10$v3KIE5WWiGhP60enqazXMuCsZtmccdS7EZIWMUGNui1/.zeSaQzDC', 'Head Office', 'Engineering', '11102023045541 Herru Kusuma Praja.jpg', NULL, NULL),
(49, 'M. Zaenal Muttaqin', 'Staff Corporate', 'System Engineering & Lean Construction', 'ET153447', '123456789', '$2y$10$AH7BkLcPXeyfRi7vdJsF0ueetdn4OJtirxTRbGMPPG29qKGUl5X.i', 'Head Office', 'Engineering', '11102023045647 M. Zaenal Muttaqin.jpg', NULL, NULL),
(50, 'Muhamad Ali', 'Staff Corporate', 'System Engineering & Lean Construction', 'LS153456', '123456789', '$2y$10$ibnlPIb8MUNfXLs5eyfbI.iBPJ2pUVE0bNBlheERXmBXqE4dafzhS', 'Head Office', 'Engineering', '11102023045733 Muhamad Ali.jpg', NULL, NULL),
(51, 'Paraserian Firdaus', 'Staff Corporate', 'System Engineering & Lean Construction', 'ET163687', '13456789', '$2y$10$nXsKheBL.i9hvY2ndvSL.e5di9sv48VzdnzOpGhwmoBp5GMB3m/Ou', 'Head Office', 'Engineering', '11102023045830 Paraserian Firdaus.jpg', NULL, NULL),
(52, 'Soleh', 'Staff Corporate', 'System Engineering & Lean Construction', 'LS193784', '123456789', '$2y$10$bxv/eZ7vo40uM3Pi1WLqAOVJL4QKi4Rd149Z0BsMEMJpbngk2nZ6S', 'Head Office', 'Engineering', '11102023045922 Soleh.jpg', NULL, NULL),
(53, 'Yanto Agus Wahyudi', 'Staff Corporate', 'System Engineering & Lean Construction', 'LS962699', '08987675767', '$2y$10$mcCSVirxtxck3u1k.Ngq.evDK0M0n2pgCeKNFIRuvBfrN21bCDjTS', 'Head Office', 'Engineering', '11102023050011 Yanto Agus Wahyudi.jpg', NULL, NULL),
(54, 'Alve Yunus', 'Deputy General Manager operasi 4', NULL, 'makassar', '081294304555', '$2y$10$cO5z1tum7PSnyNTywvjlGe2s2wtRHWjVFjvMtbgalEp8Af5/DM.P6', 'Tim Proyek', 'Engineering', '11102023050257 Alve Yunus.jpg', NULL, NULL),
(55, 'Agustinus Dimas', 'Kepala Seksi', NULL, 'banggai', '081230000706', '$2y$10$HAzI7mO4Pm1miYuSPvkZwO0P22S10Du1JlFxf.NTn.DRknaAJeymO', 'Tim Proyek', 'Engineering', '11102023050353 081294304555.jpg', NULL, NULL),
(56, 'Dedi Chandra', 'Kepala Seksi', NULL, 'ameroro', '081230000706', '$2y$10$DHO3lsNI1x6zA/.wrGnF4OxtXiVFVdGSJ/.aUonPdbHe.gwEWiODS', 'Tim Proyek', 'Engineering', '11102023050631 Dedi Chandra.jpg', NULL, NULL),
(57, 'donggala', 'Senior Expert 1', NULL, 'donggal', '00000000', '$2y$10$m1md5T2eCoLxR1BTN1cLUeHgyEEPi.F1IWEd2ud6xOmPRoRBsDwl6', 'Tim Proyek', 'Engineering', '12082023091027 donggala.png', NULL, NULL),
(58, 'coor', 'Coordinator', 'BIM & Digitalization Engineering', '123456789', '00000000', '$2y$10$KHrXt6TOVZQ3fqUm4aFYFe5NcExwHMSlcRVSpb.y/ltZQv0B9kpUC', 'Head Office', 'Engineering', '12162023070544 coor.jpg', NULL, NULL),
(59, 'media', 'Manager of Engineering', NULL, 'et12000', '0812', '$2y$10$E/VFd3VYwysFTmfz8LZpTeiGnsDYfWGhDBDgU2QuXakbWuR5HEBfW', 'Manajemen', 'Engineering', '02022024035705 magang.jpg', NULL, NULL),
(60, 'Rey Manajemen', 'Manager of Engineering', NULL, '12121212', '0892324324324', '$2y$10$6yfRGsB2V0UMyPpiT3uEF.kx3YKdLUYgXkcqc659JBGyrxittIlX.', 'Manajemen', 'Engineering', '02102024005931 Rey Manajemen.jpg', NULL, NULL),
(61, 'Head Office PCP 1', 'Staff Corporate', 'Design & Analysis', 'hopcp1', '08989234324', '$2y$10$viPxA4LTyI3MqC41qb9ddOblRz7K5qi5Zm6YT.2nZqvbdW.LWo9n6', 'Head Office', 'PCP', '03092024043326 Head Office PCP 1.jpg', NULL, NULL),
(62, 'Tim Proyek PCP1', 'Staff Corporate', NULL, 'timproyekpcp1', '089893423423', '$2y$10$BPoOyRk/okkSFBZBUof4/.gehsqkLkDVTYY0/HjT6qEVOjIfe9KEW', 'Tim Proyek', 'PCP', '03092024043650 Tim Proyek PCP1.jpg', NULL, NULL),
(63, 'Admin PCP', 'Staff Corporate', NULL, 'adminpcp', '089893823232', '$2y$10$Pn9Yni9wgPJAovz64dOHluZFLyRDPZx1dkYFbwOokUn4B3/OmNpkK', 'Admin', 'PCP', '03102024112818 Admin PCP.jpg', NULL, NULL),
(64, 'Proyek PCP Donggal', 'Staff proyek', NULL, 'proyekpcpdonggal', '0898123214124', '$2y$10$EDvgltebRWWVrXl7V9WkFucBVzLcyntA35yWRAOy.xsxClFwpDmye', 'Tim Proyek', 'PCP', '03232024094351 Proyek PCP Donggal.png', NULL, NULL),
(65, 'Renaldi Proyek 1', NULL, NULL, 'rproyek1', '089932984234', '$2y$10$E9dl7Ov/8iIjVcZEyM2jZeae3G/sluIh1C7f0rAbSm5DsG3JWdAjO', 'Tim Proyek', 'Engineering', '04092024184437 Renaldi Proyek 1.png', 2, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievement`
--
ALTER TABLE `achievement`
  ADD PRIMARY KEY (`id_achievement`);

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id_activity`);

--
-- Indexes for table `agendas`
--
ALTER TABLE `agendas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agendas_created_by_foreign` (`created_by`);

--
-- Indexes for table `agenda_tasks`
--
ALTER TABLE `agenda_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aspek_csi`
--
ALTER TABLE `aspek_csi`
  ADD PRIMARY KEY (`id_aspek_csi`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id_carousel`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`);

--
-- Indexes for table `csi`
--
ALTER TABLE `csi`
  ADD PRIMARY KEY (`id_csi`);

--
-- Indexes for table `detail_achievement`
--
ALTER TABLE `detail_achievement`
  ADD PRIMARY KEY (`id_detail_achievement`);

--
-- Indexes for table `detail_chat`
--
ALTER TABLE `detail_chat`
  ADD PRIMARY KEY (`id_detail_chat`);

--
-- Indexes for table `detail_csi`
--
ALTER TABLE `detail_csi`
  ADD PRIMARY KEY (`id_detail_csi`);

--
-- Indexes for table `detail_license`
--
ALTER TABLE `detail_license`
  ADD PRIMARY KEY (`id_detail_license`);

--
-- Indexes for table `detail_tim_proyek`
--
ALTER TABLE `detail_tim_proyek`
  ADD PRIMARY KEY (`id_detail_tim_proyek`);

--
-- Indexes for table `divisies`
--
ALTER TABLE `divisies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dokumen_lps`
--
ALTER TABLE `dokumen_lps`
  ADD PRIMARY KEY (`id_dokumen_lps`);

--
-- Indexes for table `dokumen_timelines`
--
ALTER TABLE `dokumen_timelines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `engineering_activity`
--
ALTER TABLE `engineering_activity`
  ADD PRIMARY KEY (`id_engineering_activity`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `infra_news`
--
ALTER TABLE `infra_news`
  ADD PRIMARY KEY (`id_infra_news`);

--
-- Indexes for table `jabatans`
--
ALTER TABLE `jabatans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_pekerjaan`
--
ALTER TABLE `kategori_pekerjaan`
  ADD PRIMARY KEY (`id_kategori_pekerjaan`);

--
-- Indexes for table `ki_km`
--
ALTER TABLE `ki_km`
  ADD PRIMARY KEY (`id_ki_km`);

--
-- Indexes for table `kontrak_induk`
--
ALTER TABLE `kontrak_induk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timelines_id_proyek_foreign` (`id_proyek`),
  ADD KEY `timelines_id_verifikator_foreign` (`id_verifikator`);

--
-- Indexes for table `license`
--
ALTER TABLE `license`
  ADD PRIMARY KEY (`id_license`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id_log`);

--
-- Indexes for table `lps`
--
ALTER TABLE `lps`
  ADD PRIMARY KEY (`id_lps`);

--
-- Indexes for table `master_activity`
--
ALTER TABLE `master_activity`
  ADD PRIMARY KEY (`id_master_activity`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monitoring_license_software`
--
ALTER TABLE `monitoring_license_software`
  ADD PRIMARY KEY (`id_monitoring_license_software`);

--
-- Indexes for table `monitoring_lps`
--
ALTER TABLE `monitoring_lps`
  ADD PRIMARY KEY (`id_monitoring_lps`);

--
-- Indexes for table `monthly_report`
--
ALTER TABLE `monthly_report`
  ADD PRIMARY KEY (`id_monthly_report`);

--
-- Indexes for table `monthly_report_pcps`
--
ALTER TABLE `monthly_report_pcps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `monthly_report_pcps_id_monthly_report_foreign` (`id_monthly_report`),
  ADD KEY `monthly_report_pcps_id_proyek_foreign` (`id_proyek`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pic_agendas`
--
ALTER TABLE `pic_agendas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pic_divisi_tasks`
--
ALTER TABLE `pic_divisi_tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pic_divisi_tasks_id_divisi_foreign` (`id_divisi`);

--
-- Indexes for table `pic_monthly_report_pcps`
--
ALTER TABLE `pic_monthly_report_pcps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pic_tujuan_proyek_tasks`
--
ALTER TABLE `pic_tujuan_proyek_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pic_tujuan_tasks`
--
ALTER TABLE `pic_tujuan_tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pic_tujuan_tasks_id_tujuan_foreign` (`id_tujuan`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id_proyek`);

--
-- Indexes for table `proyek_users`
--
ALTER TABLE `proyek_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rencana`
--
ALTER TABLE `rencana`
  ADD PRIMARY KEY (`id_rencana`);

--
-- Indexes for table `rkp`
--
ALTER TABLE `rkp`
  ADD PRIMARY KEY (`id_rkp`);

--
-- Indexes for table `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id_saran`);

--
-- Indexes for table `sni`
--
ALTER TABLE `sni`
  ADD PRIMARY KEY (`id_sni`);

--
-- Indexes for table `software`
--
ALTER TABLE `software`
  ADD PRIMARY KEY (`id_software`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id_task`);

--
-- Indexes for table `task_pcps`
--
ALTER TABLE `task_pcps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `task_pcps_created_by_foreign` (`created_by`);

--
-- Indexes for table `technical_supporting`
--
ALTER TABLE `technical_supporting`
  ADD PRIMARY KEY (`id_technical_supporting`);

--
-- Indexes for table `timelines`
--
ALTER TABLE `timelines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timeline_details`
--
ALTER TABLE `timeline_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tim_proyek`
--
ALTER TABLE `tim_proyek`
  ADD PRIMARY KEY (`id_tim_proyek`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievement`
--
ALTER TABLE `achievement`
  MODIFY `id_achievement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `id_activity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `agendas`
--
ALTER TABLE `agendas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `agenda_tasks`
--
ALTER TABLE `agenda_tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `aspek_csi`
--
ALTER TABLE `aspek_csi`
  MODIFY `id_aspek_csi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id_carousel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `csi`
--
ALTER TABLE `csi`
  MODIFY `id_csi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `detail_achievement`
--
ALTER TABLE `detail_achievement`
  MODIFY `id_detail_achievement` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `detail_chat`
--
ALTER TABLE `detail_chat`
  MODIFY `id_detail_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `detail_csi`
--
ALTER TABLE `detail_csi`
  MODIFY `id_detail_csi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `detail_license`
--
ALTER TABLE `detail_license`
  MODIFY `id_detail_license` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `detail_tim_proyek`
--
ALTER TABLE `detail_tim_proyek`
  MODIFY `id_detail_tim_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `divisies`
--
ALTER TABLE `divisies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `dokumen_lps`
--
ALTER TABLE `dokumen_lps`
  MODIFY `id_dokumen_lps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `dokumen_timelines`
--
ALTER TABLE `dokumen_timelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `engineering_activity`
--
ALTER TABLE `engineering_activity`
  MODIFY `id_engineering_activity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2623;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `infra_news`
--
ALTER TABLE `infra_news`
  MODIFY `id_infra_news` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `jabatans`
--
ALTER TABLE `jabatans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kategori_pekerjaan`
--
ALTER TABLE `kategori_pekerjaan`
  MODIFY `id_kategori_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `ki_km`
--
ALTER TABLE `ki_km`
  MODIFY `id_ki_km` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kontrak_induk`
--
ALTER TABLE `kontrak_induk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `license`
--
ALTER TABLE `license`
  MODIFY `id_license` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1693;

--
-- AUTO_INCREMENT for table `lps`
--
ALTER TABLE `lps`
  MODIFY `id_lps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT for table `master_activity`
--
ALTER TABLE `master_activity`
  MODIFY `id_master_activity` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `monitoring_license_software`
--
ALTER TABLE `monitoring_license_software`
  MODIFY `id_monitoring_license_software` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `monitoring_lps`
--
ALTER TABLE `monitoring_lps`
  MODIFY `id_monitoring_lps` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `monthly_report`
--
ALTER TABLE `monthly_report`
  MODIFY `id_monthly_report` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `monthly_report_pcps`
--
ALTER TABLE `monthly_report_pcps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pic_agendas`
--
ALTER TABLE `pic_agendas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pic_divisi_tasks`
--
ALTER TABLE `pic_divisi_tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pic_monthly_report_pcps`
--
ALTER TABLE `pic_monthly_report_pcps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `pic_tujuan_proyek_tasks`
--
ALTER TABLE `pic_tujuan_proyek_tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pic_tujuan_tasks`
--
ALTER TABLE `pic_tujuan_tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `proyek_users`
--
ALTER TABLE `proyek_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rencana`
--
ALTER TABLE `rencana`
  MODIFY `id_rencana` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rkp`
--
ALTER TABLE `rkp`
  MODIFY `id_rkp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `saran`
--
ALTER TABLE `saran`
  MODIFY `id_saran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sni`
--
ALTER TABLE `sni`
  MODIFY `id_sni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `software`
--
ALTER TABLE `software`
  MODIFY `id_software` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `task_pcps`
--
ALTER TABLE `task_pcps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `technical_supporting`
--
ALTER TABLE `technical_supporting`
  MODIFY `id_technical_supporting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `timelines`
--
ALTER TABLE `timelines`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `timeline_details`
--
ALTER TABLE `timeline_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tim_proyek`
--
ALTER TABLE `tim_proyek`
  MODIFY `id_tim_proyek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agendas`
--
ALTER TABLE `agendas`
  ADD CONSTRAINT `agendas_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `kontrak_induk`
--
ALTER TABLE `kontrak_induk`
  ADD CONSTRAINT `timelines_id_proyek_foreign` FOREIGN KEY (`id_proyek`) REFERENCES `proyek` (`id_proyek`),
  ADD CONSTRAINT `timelines_id_verifikator_foreign` FOREIGN KEY (`id_verifikator`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `monthly_report_pcps`
--
ALTER TABLE `monthly_report_pcps`
  ADD CONSTRAINT `monthly_report_pcps_id_monthly_report_foreign` FOREIGN KEY (`id_monthly_report`) REFERENCES `monthly_report` (`id_monthly_report`),
  ADD CONSTRAINT `monthly_report_pcps_id_proyek_foreign` FOREIGN KEY (`id_proyek`) REFERENCES `proyek` (`id_proyek`);

--
-- Constraints for table `pic_divisi_tasks`
--
ALTER TABLE `pic_divisi_tasks`
  ADD CONSTRAINT `pic_divisi_tasks_id_divisi_foreign` FOREIGN KEY (`id_divisi`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `pic_tujuan_tasks`
--
ALTER TABLE `pic_tujuan_tasks`
  ADD CONSTRAINT `pic_tujuan_tasks_id_tujuan_foreign` FOREIGN KEY (`id_tujuan`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `task_pcps`
--
ALTER TABLE `task_pcps`
  ADD CONSTRAINT `task_pcps_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
