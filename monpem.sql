-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 11, 2022 at 03:53 PM
-- Server version: 10.3.37-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monpem`
--

-- --------------------------------------------------------

--
-- Table structure for table `adendum`
--

CREATE TABLE `adendum` (
  `id_addm` int(11) NOT NULL,
  `id_kontrak` bigint(20) DEFAULT NULL,
  `id_mslh` int(11) DEFAULT NULL,
  `nmr_adendum` varchar(255) DEFAULT NULL,
  `tanggal_adendum` datetime DEFAULT NULL,
  `lama_durasi_penyerahan1` int(20) DEFAULT NULL,
  `durasi_lama` int(20) DEFAULT NULL,
  `lama_durasi_pemeliharaan` int(20) DEFAULT NULL,
  `pemeliharaan_lama` int(20) DEFAULT NULL,
  `kontrak_nilai` bigint(20) DEFAULT NULL,
  `nilai_lama` bigint(20) DEFAULT NULL,
  `btk_pembayaran` int(11) DEFAULT NULL,
  `pbyr_lama` int(11) DEFAULT NULL,
  `dokumen` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adendum`
--

INSERT INTO `adendum` (`id_addm`, `id_kontrak`, `id_mslh`, `nmr_adendum`, `tanggal_adendum`, `lama_durasi_penyerahan1`, `durasi_lama`, `lama_durasi_pemeliharaan`, `pemeliharaan_lama`, `kontrak_nilai`, `nilai_lama`, `btk_pembayaran`, `pbyr_lama`, `dokumen`, `created_date`, `updated_date`) VALUES
(1, NULL, NULL, NULL, '1970-01-01 07:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '2022-12-08 05:58:24', '2022-12-08 05:58:24'),
(2, NULL, NULL, '12241241251', '2022-12-08 00:00:00', 20, 120, 10, 180, 40000000, 855272900, 3, NULL, 'd41ef746d55491fd52194fd3356b0324.pdf', '2022-12-08 06:03:56', '2022-12-08 06:03:56'),
(3, NULL, 4, '12241241251', '2022-12-08 00:00:00', 20, 120, 10, 180, 40000000, 855272900, 3, NULL, '855629360e7f2edfa95c2fe6fc8282d1.pdf', '2022-12-08 06:04:38', '2022-12-08 06:04:38'),
(4, 6, 5, '12241241251', '2022-12-08 00:00:00', 20, 120, 10, 180, 40000000, 855272900, 3, NULL, '4c7462315a00c9bdd9480b6cd31a9472.pdf', '2022-12-08 06:05:30', '2022-12-08 06:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `bukti`
--

CREATE TABLE `bukti` (
  `id_bkti` int(11) NOT NULL,
  `id_lpr` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bukti`
--

INSERT INTO `bukti` (`id_bkti`, `id_lpr`, `image`, `created_date`, `updated_date`) VALUES
(1, 6, '13de67d89d99bb36247fbf3a3eec9de4.jpg', '2022-12-03 06:28:10', '2022-12-03 06:28:10'),
(4, 17, '3fba7f00d106a8fc50152dad79dec15f.jpg', '2022-12-06 16:29:59', '2022-12-06 16:29:59'),
(5, 18, '4d8e1c504252224975f3f97c9e92635b.png', '2022-12-06 16:32:19', '2022-12-06 16:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `kontrak`
--

CREATE TABLE `kontrak` (
  `id_kontrak` bigint(20) NOT NULL,
  `id_paket` bigint(20) DEFAULT NULL,
  `id_rekanan` bigint(20) DEFAULT NULL,
  `lls_id` bigint(20) DEFAULT NULL,
  `rkn_id` bigint(20) DEFAULT NULL,
  `kontrak_no` varchar(255) DEFAULT NULL,
  `kontrak_tanggal` datetime DEFAULT NULL,
  `kontrak_nilai` bigint(20) DEFAULT NULL,
  `kontrak_mulai` datetime DEFAULT NULL,
  `kontrak_akhir` datetime DEFAULT NULL,
  `kode_akun_kegiatan` varchar(255) DEFAULT NULL,
  `lama_durasi_penyerahan1` int(20) DEFAULT NULL,
  `lama_durasi_pemeliharaan` int(20) DEFAULT NULL,
  `kontrak_jabatan_wakil` varchar(255) DEFAULT NULL,
  `kontrak_wakil_penyedia` varchar(255) DEFAULT NULL,
  `kontrak_norekening` varchar(255) DEFAULT NULL,
  `kontrak_namarekening` varchar(255) DEFAULT NULL,
  `btk_pembayaran` int(11) DEFAULT NULL,
  `no_registrasi` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kontrak`
--

INSERT INTO `kontrak` (`id_kontrak`, `id_paket`, `id_rekanan`, `lls_id`, `rkn_id`, `kontrak_no`, `kontrak_tanggal`, `kontrak_nilai`, `kontrak_mulai`, `kontrak_akhir`, `kode_akun_kegiatan`, `lama_durasi_penyerahan1`, `lama_durasi_pemeliharaan`, `kontrak_jabatan_wakil`, `kontrak_wakil_penyedia`, `kontrak_norekening`, `kontrak_namarekening`, `btk_pembayaran`, `no_registrasi`, `created_date`, `updated_date`) VALUES
(4, 4, 1, 4263590, 906207, '600/25.05/FSK.CK/419.101/2022', '2022-09-05 00:00:00', 334160000, '2022-09-05 00:00:00', '2022-12-14 00:00:00', '1.03.08.2.01.02.5.2.03.01.01.0001', 100, 180, 'Direktur', 'MUHAMMAD NANDANG PRIBADI', '0061027696', 'Bank Jatim', NULL, NULL, '2022-11-26 06:54:22', '2022-11-26 06:54:22'),
(5, 5, 3, 4234590, 1195203, 'KONS-SDA/046/VIII/SP/DAU/2022', '2022-08-08 00:00:00', 285378000, '2022-08-08 00:00:00', '2022-12-06 00:00:00', '1.03.02.2.02', 120, 180, 'DIREKTUR', 'ACHMAD FAISAL FIRMANSYAH', '0141044524', 'BANK JATIM', NULL, NULL, '2022-11-26 10:35:00', '2022-11-26 10:35:00'),
(6, 6, 4, 4207590, 210207, 'BJ/1213/VII/419.109/2022', '1970-01-01 07:00:00', 40000000, '1970-01-01 07:00:00', '1970-01-01 07:00:00', '1.01.02.2.01.08', 20, 10, 'DIREKTUR', 'TONY ERLAMBANG, SH', '0061006494', 'BANK JATIM', 3, NULL, '2022-11-28 01:10:01', '2022-12-08 06:05:30');

-- --------------------------------------------------------

--
-- Table structure for table `kontrak_user`
--

CREATE TABLE `kontrak_user` (
  `id_ku` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_kontrak` bigint(20) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_lpr` int(11) NOT NULL,
  `id_kontrak` bigint(20) DEFAULT NULL,
  `id_mslh` int(11) DEFAULT NULL,
  `rencana` double DEFAULT NULL,
  `realisasi` double DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `bulan` int(11) DEFAULT NULL,
  `minggu` int(11) DEFAULT NULL,
  `tanggal_awal` datetime DEFAULT NULL,
  `tanggal_akhir` datetime DEFAULT NULL,
  `created_date` timestamp NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_lpr`, `id_kontrak`, `id_mslh`, `rencana`, `realisasi`, `keterangan`, `bulan`, `minggu`, `tanggal_awal`, `tanggal_akhir`, `created_date`, `updated_date`) VALUES
(1, 5, 1, 20, 20, 'coba', 12, 4, '2022-12-03 00:00:00', '2022-12-10 00:00:00', '2022-12-02 17:14:45', '2022-12-03 14:52:40'),
(2, 5, NULL, 20, 20, 'coba2', 12, 4, '2022-12-10 00:00:00', '2022-12-17 00:00:00', '2022-12-02 17:16:02', '2022-12-02 17:16:02'),
(3, 4, NULL, 20, 20, 'dhdkjfkjfoi', 9, 4, '2022-12-10 00:00:00', '2022-12-16 00:00:00', '2022-12-03 04:01:23', '2022-12-03 14:31:43'),
(4, 4, NULL, 20, 20, 'adfagagas', 10, 4, '2022-12-10 00:00:00', '2022-12-17 00:00:00', '2022-12-03 04:05:59', '2022-12-03 14:31:43'),
(5, 4, NULL, 20, 20, 'dwrwrqwrqwrqw', 11, 4, '2022-12-23 00:00:00', '2022-12-22 00:00:00', '2022-12-03 04:12:10', '2022-12-03 14:31:43'),
(6, 4, NULL, 20, 20, 'fasfafsaf', 12, 4, '2022-12-03 00:00:00', '2022-12-10 00:00:00', '2022-12-03 06:28:10', '2022-12-03 06:28:10'),
(17, 4, NULL, 20, 20, 'zcaCACACDGDAGdgadg', 12, 4, '2022-12-22 00:00:00', '2022-12-29 00:00:00', '2022-12-06 16:29:59', '2022-12-06 16:29:59'),
(18, 4, NULL, 12, 21, 'dgagagaga', 11, 5, '2022-12-15 00:00:00', '2022-12-23 00:00:00', '2022-12-06 16:32:19', '2022-12-06 16:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `laporan_pekerjaan`
--

CREATE TABLE `laporan_pekerjaan` (
  `id_lpkr` int(11) NOT NULL,
  `id_lpr` int(11) DEFAULT NULL,
  `id_pkrj` int(11) DEFAULT NULL,
  `volume` double DEFAULT NULL,
  `bobot` double DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `laporan_pekerjaan`
--

INSERT INTO `laporan_pekerjaan` (`id_lpkr`, `id_lpr`, `id_pkrj`, `volume`, `bobot`, `created_date`, `updated_date`) VALUES
(1, 5, 3, NULL, 1, '2022-12-03 04:12:10', '2022-12-03 04:12:10'),
(2, 5, 4, NULL, 1, '2022-12-03 04:12:10', '2022-12-03 04:12:10'),
(3, 6, 3, NULL, 1, '2022-12-03 06:28:10', '2022-12-03 06:28:10'),
(4, 6, 4, NULL, 1, '2022-12-03 06:28:10', '2022-12-03 06:28:10'),
(25, 17, 3, NULL, 0, '2022-12-06 16:29:59', '2022-12-06 16:29:59'),
(26, 17, 4, NULL, 0, '2022-12-06 16:29:59', '2022-12-06 16:29:59'),
(27, 18, 3, NULL, 0, '2022-12-06 16:32:19', '2022-12-06 16:32:19'),
(28, 18, 4, NULL, 0, '2022-12-06 16:32:19', '2022-12-06 16:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `id_paket` bigint(20) NOT NULL,
  `id_satker` bigint(20) DEFAULT NULL,
  `pkt_id` bigint(20) DEFAULT NULL,
  `stk_id` bigint(20) DEFAULT NULL,
  `ppk_id` bigint(20) DEFAULT NULL,
  `lls_id` bigint(20) DEFAULT NULL,
  `rup_id` bigint(20) DEFAULT NULL,
  `metode_pengadaan` int(11) DEFAULT NULL,
  `sbd_id` varchar(255) DEFAULT NULL,
  `ang_tahun` int(11) DEFAULT NULL,
  `pkt_nama` varchar(255) DEFAULT NULL,
  `pkt_pagu` bigint(20) DEFAULT NULL,
  `tanggal_awal_pengadaan` datetime DEFAULT NULL,
  `jadwal_awal_pengumuman` datetime DEFAULT NULL,
  `pkt_lokasi` text DEFAULT NULL,
  `alamat_lokasi` text DEFAULT NULL,
  `latitude` decimal(8,6) NOT NULL,
  `longitude` decimal(9,6) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id_paket`, `id_satker`, `pkt_id`, `stk_id`, `ppk_id`, `lls_id`, `rup_id`, `metode_pengadaan`, `sbd_id`, `ang_tahun`, `pkt_nama`, `pkt_pagu`, `tanggal_awal_pengadaan`, `jadwal_awal_pengumuman`, `pkt_lokasi`, `alamat_lokasi`, `latitude`, `longitude`, `created_date`, `updated_date`) VALUES
(4, 1, 4001590, 575590, 672590, 4263590, 31972555, 13, 'APBD', 2022, 'Pembangunan Gedung Panti PKK Kel.Blabak (Lanjutan)', 420000000, '2022-04-01 00:00:00', '2022-08-02 13:00:00', 'Kota Kediri', NULL, '0.000000', '0.000000', '2022-11-26 06:54:22', '2022-11-26 06:54:22'),
(5, 1, 3972590, 575590, 672590, 4234590, 31393508, 13, 'APBD', 2022, 'Pembangunan Saluran Irigasi Kel. Bangsal', 371400000, '2022-01-01 00:00:00', '2022-07-04 15:30:00', 'Kota Kediri', NULL, '0.000000', '0.000000', '2022-11-26 10:35:00', '2022-11-26 10:35:00'),
(6, 3, 3946590, 578590, 663590, 4207590, 33999621, 13, 'APBD', 2022, 'Biaya Konstruksi Fisik Rehabilitasi Ruang Kelas Dengan Tingkat Kerusakan Minimal Sedang Beserta Perabotnya SD Negeri Tempurejo 1 (DAK)', 1069728000, '2022-03-01 00:00:00', '2022-06-06 15:00:00', 'SD Negeri Tempurejo 1', NULL, '0.000000', '0.000000', '2022-11-28 01:10:01', '2022-11-28 01:10:01');

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id_pkrj` int(11) NOT NULL,
  `id_kontrak` bigint(20) DEFAULT NULL,
  `uraian_pkrj` varchar(255) DEFAULT NULL,
  `satuan` varchar(255) DEFAULT NULL,
  `volume` double DEFAULT NULL,
  `status` smallint(6) DEFAULT 1,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pkrj`, `id_kontrak`, `uraian_pkrj`, `satuan`, `volume`, `status`, `created_date`, `updated_date`) VALUES
(3, 4, 'coba', 'meter', 2, 1, '2022-11-29 14:19:51', '2022-11-29 14:37:49'),
(4, 4, 'uruk', 'm2', 20, 1, '2022-12-02 07:12:10', '2022-12-02 07:12:10');

-- --------------------------------------------------------

--
-- Table structure for table `perhitungan_akhir`
--

CREATE TABLE `perhitungan_akhir` (
  `id_prakhir` int(11) NOT NULL,
  `id_kontrak` bigint(20) DEFAULT NULL,
  `id_mslh` int(11) DEFAULT NULL,
  `no_ba` varchar(255) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `prosentase` double DEFAULT NULL,
  `hitung_nilai` bigint(20) DEFAULT NULL,
  `dokumen` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perhitungan_akhir`
--

INSERT INTO `perhitungan_akhir` (`id_prakhir`, `id_kontrak`, `id_mslh`, `no_ba`, `tanggal`, `prosentase`, `hitung_nilai`, `dokumen`, `created_date`, `updated_date`) VALUES
(1, 6, 7, '122421', '2022-12-11 00:00:00', 98, 21937209721, 'b30ee11b71aa6f593f4a5543584d2e86.pdf', '2022-12-11 08:34:00', '2022-12-11 08:34:00'),
(2, 6, 8, '122421', '2022-12-11 00:00:00', 97, 2181398640209, '37022496550802bdcc75c5f5b4c3f9cb.pdf', '2022-12-11 08:35:19', '2022-12-11 08:35:19');

-- --------------------------------------------------------

--
-- Table structure for table `permasalahan`
--

CREATE TABLE `permasalahan` (
  `id_mslh` int(11) NOT NULL,
  `id_kontrak` bigint(20) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `tahapan` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `permasalahan`
--

INSERT INTO `permasalahan` (`id_mslh`, `id_kontrak`, `tanggal`, `tahapan`, `keterangan`, `created_date`, `updated_date`) VALUES
(1, 5, '0000-00-00 00:00:00', 'Laporan,4,12', 'barangek', '2022-12-02 17:14:45', '2022-12-02 17:14:45'),
(4, NULL, '2022-12-08 00:00:00', 'adendum', 'karena ingin', '2022-12-08 06:04:38', '2022-12-08 06:04:38'),
(5, 6, '2022-12-08 00:00:00', 'adendum', 'karena ingin', '2022-12-08 06:05:30', '2022-12-08 06:05:30'),
(6, NULL, '1970-01-01 07:00:00', 'denda', 'volume tidak sesuai', '2022-12-09 04:02:58', '2022-12-09 04:02:58'),
(7, 6, '1970-01-01 07:00:00', 'perhitungan', '353tetwegeg', '2022-12-11 08:34:00', '2022-12-11 08:34:00'),
(8, 6, '1970-01-01 07:00:00', 'perhitungan', 'coba lagi gaes', '2022-12-11 08:35:19', '2022-12-11 08:35:19');

-- --------------------------------------------------------

--
-- Table structure for table `ppk`
--

CREATE TABLE `ppk` (
  `id_ppk` bigint(20) NOT NULL,
  `ppk_id` bigint(20) DEFAULT NULL,
  `ppk_nama` varchar(255) DEFAULT NULL,
  `ppk_nip` varchar(255) DEFAULT NULL,
  `ppk_pangkat` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ppk`
--

INSERT INTO `ppk` (`id_ppk`, `ppk_id`, `ppk_nama`, `ppk_nip`, `ppk_pangkat`, `created_date`, `updated_date`) VALUES
(1, 672590, 'ENDANG KARTIKASARI, ST', '196910052003122005', 'Pembina', '2022-11-20 04:47:39', '2022-11-20 04:47:39'),
(2, 664590, 'ALFAN SUGIYANTO', '197410052005011000', 'Penata Tingkat I', '2022-11-20 17:36:43', '2022-11-20 17:36:43'),
(3, 663590, 'IBNU QOYIM, S.Ag.MH', '197303232001121001', 'Pembina', '2022-11-28 01:10:01', '2022-11-28 01:10:01');

-- --------------------------------------------------------

--
-- Table structure for table `rekanan`
--

CREATE TABLE `rekanan` (
  `id_rekanan` bigint(20) NOT NULL,
  `id_btu` bigint(20) DEFAULT NULL,
  `rkn_id` bigint(20) DEFAULT NULL,
  `btu_id` varchar(36) DEFAULT NULL,
  `rkn_nama` varchar(255) DEFAULT NULL,
  `rkn_alamat` text DEFAULT NULL,
  `rkn_kodepos` varchar(255) DEFAULT NULL,
  `rkn_npwp` varchar(255) DEFAULT NULL,
  `rkn_pkp` varchar(255) DEFAULT NULL,
  `rkn_telepon` varchar(255) DEFAULT NULL,
  `rkn_email` varchar(255) DEFAULT NULL,
  `kbp` varchar(255) DEFAULT NULL,
  `lhk_no` varchar(255) DEFAULT NULL,
  `lhk_tanggal` timestamp NULL DEFAULT NULL,
  `lhk_notaris` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rekanan`
--

INSERT INTO `rekanan` (`id_rekanan`, `id_btu`, `rkn_id`, `btu_id`, `rkn_nama`, `rkn_alamat`, `rkn_kodepos`, `rkn_npwp`, `rkn_pkp`, `rkn_telepon`, `rkn_email`, `kbp`, `lhk_no`, `lhk_tanggal`, `lhk_notaris`, `created_date`, `updated_date`) VALUES
(1, NULL, 906207, '01', 'CV.Linda Jaya', 'JL.Letjen Suprapto Gg III/12 B, Kel.Burengan', '64131', '91.294.041.8-622.000', 'S-102PKP/WPJ.12/KP.0203/2019', '085785822255', 'lindajaya2309@gmail.com', 'Kediri (Kota)', '13', '2019-04-22 17:00:00', 'DANNY RACHMAN HAKIM , S.H., M.Kn.', '2022-11-20 04:42:37', '2022-11-20 04:42:37'),
(2, NULL, 348590, '01', 'karya baja, cv', 'Jl. Penanggungan No.155 Kel. Lirboyo Kec Mojoroto Kota Kediri', '', '93.408.575.4-622.000', '', '081333982228', 'karyabajakediri@gmail.com', 'Kediri (Kota)', '34', '2019-11-04 17:00:00', 'SUKMA MARISABELA RAHAJENG, SH., MKn', '2022-11-20 17:36:43', '2022-11-20 17:36:43'),
(3, NULL, 1195203, '01', 'CV. SAUDARA KONSTRUKSI', 'Desa Tlogo II RT03 RW002 Kec. Kanigoro Kab. Blitar', '66171', '95.541.625.0-653.000', 'S-41PKP/WPJ.12/KP.1203/2021', '085851340212', 'cv.saudarakonstruksi2020@gmail.com', 'Blitar (Kab.)', '53', '2020-07-22 17:00:00', 'ANANG SUSAPTO, S.H', '2022-11-26 10:35:00', '2022-11-26 10:35:00'),
(4, NULL, 210207, '01', 'CV TIRTOSARI', 'Jl. Tosaren I / 49 Kel.Tosaren Kec. Pesantren', '64111', '02.298.505.5-622.000', 'PEM-386/WPJ.12/KP.0203/2007', '-', 'cvtirtosari@gmail.com', 'Kediri (Kota)', '178', '2006-08-22 17:00:00', 'Soebekti Ngardiman, SH.', '2022-11-28 01:10:01', '2022-11-28 01:10:01');

-- --------------------------------------------------------

--
-- Table structure for table `sanksi`
--

CREATE TABLE `sanksi` (
  `id_snksi` int(11) NOT NULL,
  `id_kontrak` bigint(20) DEFAULT NULL,
  `id_mslh` int(11) DEFAULT NULL,
  `nmr_denda` varchar(255) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `jns_sanksi` smallint(6) DEFAULT NULL,
  `sanksi` varchar(255) DEFAULT NULL,
  `denda_nilai` bigint(20) DEFAULT NULL,
  `dokumen` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sanksi`
--

INSERT INTO `sanksi` (`id_snksi`, `id_kontrak`, `id_mslh`, `nmr_denda`, `tanggal`, `jns_sanksi`, `sanksi`, `denda_nilai`, `dokumen`, `created_date`, `updated_date`) VALUES
(1, 6, 6, '4275376', '2022-12-09 00:00:00', 2, 'volume tidak sesuai', 50000, '5f4d4fb8283b049fbfd79b71360e8cfd.pdf', '2022-12-09 04:02:58', '2022-12-09 04:08:20');

-- --------------------------------------------------------

--
-- Table structure for table `satuan_kerja`
--

CREATE TABLE `satuan_kerja` (
  `id_satker` bigint(20) NOT NULL,
  `stk_id` bigint(20) DEFAULT NULL,
  `stk_nama` varchar(255) DEFAULT NULL,
  `stk_alamat` text DEFAULT NULL,
  `stk_telepon` varchar(255) DEFAULT NULL,
  `stk_kode` varchar(125) DEFAULT NULL,
  `stk_rup_id` varchar(125) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `satuan_kerja`
--

INSERT INTO `satuan_kerja` (`id_satker`, `stk_id`, `stk_nama`, `stk_alamat`, `stk_telepon`, `stk_kode`, `stk_rup_id`, `created_date`, `updated_date`) VALUES
(1, 575590, 'DINAS PEKERJAAN UMUM DAN PENATAAN RUANG', 'Jl. Brigjen Pol Imam Bahri HP No 100 Kediri', NULL, '1.03.2.10.0.00.01.0000', '101029', '2022-11-20 04:31:09', '2022-11-20 04:31:09'),
(2, 570590, 'DINAS KESEHATAN', 'Jl. RA Kartini No. 7 Kota Kediri', NULL, '1.02.0.00.0.00.01.0000', '101357', '2022-11-20 17:36:43', '2022-11-20 17:36:43'),
(3, 578590, 'DINAS PENDIDIKAN', 'JL. MAYOR BISMO 10-12 KOTA KEDIRI', NULL, '1.01.0.00.0.00.01.0000', '101342', '2022-11-28 01:10:01', '2022-11-28 01:10:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2y$12$Whh3RBI.I6ApyoRQds.Ho.4yA5Va0iaNfZo78CORr3F01HtF9FfXi', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1670747228, 1, 'Admin', 'istrator', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adendum`
--
ALTER TABLE `adendum`
  ADD PRIMARY KEY (`id_addm`);

--
-- Indexes for table `bukti`
--
ALTER TABLE `bukti`
  ADD PRIMARY KEY (`id_bkti`),
  ADD KEY `lpr` (`id_lpr`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kontrak`
--
ALTER TABLE `kontrak`
  ADD PRIMARY KEY (`id_kontrak`),
  ADD KEY `id_paket` (`id_paket`) USING BTREE,
  ADD KEY `id_rekanan` (`id_rekanan`) USING BTREE;

--
-- Indexes for table `kontrak_user`
--
ALTER TABLE `kontrak_user`
  ADD PRIMARY KEY (`id_ku`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_lpr`),
  ADD KEY `kntr` (`id_kontrak`);

--
-- Indexes for table `laporan_pekerjaan`
--
ALTER TABLE `laporan_pekerjaan`
  ADD PRIMARY KEY (`id_lpkr`),
  ADD KEY `pkj` (`id_pkrj`),
  ADD KEY `lapor` (`id_lpr`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`),
  ADD KEY `id_satker` (`id_satker`) USING BTREE;

--
-- Indexes for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id_pkrj`),
  ADD KEY `kontrak` (`id_kontrak`);

--
-- Indexes for table `perhitungan_akhir`
--
ALTER TABLE `perhitungan_akhir`
  ADD PRIMARY KEY (`id_prakhir`);

--
-- Indexes for table `permasalahan`
--
ALTER TABLE `permasalahan`
  ADD PRIMARY KEY (`id_mslh`);

--
-- Indexes for table `ppk`
--
ALTER TABLE `ppk`
  ADD PRIMARY KEY (`id_ppk`);

--
-- Indexes for table `rekanan`
--
ALTER TABLE `rekanan`
  ADD PRIMARY KEY (`id_rekanan`),
  ADD KEY `id_btu` (`id_btu`) USING BTREE;

--
-- Indexes for table `sanksi`
--
ALTER TABLE `sanksi`
  ADD PRIMARY KEY (`id_snksi`),
  ADD KEY `ktrs` (`id_kontrak`);

--
-- Indexes for table `satuan_kerja`
--
ALTER TABLE `satuan_kerja`
  ADD PRIMARY KEY (`id_satker`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adendum`
--
ALTER TABLE `adendum`
  MODIFY `id_addm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bukti`
--
ALTER TABLE `bukti`
  MODIFY `id_bkti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kontrak`
--
ALTER TABLE `kontrak`
  MODIFY `id_kontrak` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kontrak_user`
--
ALTER TABLE `kontrak_user`
  MODIFY `id_ku` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_lpr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `laporan_pekerjaan`
--
ALTER TABLE `laporan_pekerjaan`
  MODIFY `id_lpkr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id_pkrj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `perhitungan_akhir`
--
ALTER TABLE `perhitungan_akhir`
  MODIFY `id_prakhir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permasalahan`
--
ALTER TABLE `permasalahan`
  MODIFY `id_mslh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ppk`
--
ALTER TABLE `ppk`
  MODIFY `id_ppk` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rekanan`
--
ALTER TABLE `rekanan`
  MODIFY `id_rekanan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sanksi`
--
ALTER TABLE `sanksi`
  MODIFY `id_snksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `satuan_kerja`
--
ALTER TABLE `satuan_kerja`
  MODIFY `id_satker` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `adendum`
--
ALTER TABLE `adendum`
  ADD CONSTRAINT `kntrk` FOREIGN KEY (`id_kontrak`) REFERENCES `kontrak` (`id_kontrak`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `bukti`
--
ALTER TABLE `bukti`
  ADD CONSTRAINT `lpr` FOREIGN KEY (`id_lpr`) REFERENCES `laporan` (`id_lpr`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kontrak`
--
ALTER TABLE `kontrak`
  ADD CONSTRAINT `pkt` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id_paket`) ON DELETE SET NULL ON UPDATE NO ACTION,
  ADD CONSTRAINT `rknn` FOREIGN KEY (`id_rekanan`) REFERENCES `rekanan` (`id_rekanan`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `laporan`
--
ALTER TABLE `laporan`
  ADD CONSTRAINT `kntr` FOREIGN KEY (`id_kontrak`) REFERENCES `kontrak` (`id_kontrak`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `laporan_pekerjaan`
--
ALTER TABLE `laporan_pekerjaan`
  ADD CONSTRAINT `lapor` FOREIGN KEY (`id_lpr`) REFERENCES `laporan` (`id_lpr`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pkj` FOREIGN KEY (`id_pkrj`) REFERENCES `pekerjaan` (`id_pkrj`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `paket`
--
ALTER TABLE `paket`
  ADD CONSTRAINT `stk` FOREIGN KEY (`id_satker`) REFERENCES `satuan_kerja` (`id_satker`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD CONSTRAINT `kontrak` FOREIGN KEY (`id_kontrak`) REFERENCES `kontrak` (`id_kontrak`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `perhitungan_akhir`
--
ALTER TABLE `perhitungan_akhir`
  ADD CONSTRAINT `kntrs` FOREIGN KEY (`id_kontrak`) REFERENCES `kontrak` (`id_kontrak`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `sanksi`
--
ALTER TABLE `sanksi`
  ADD CONSTRAINT `ktrs` FOREIGN KEY (`id_kontrak`) REFERENCES `kontrak` (`id_kontrak`) ON DELETE CASCADE ON UPDATE SET NULL;

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
