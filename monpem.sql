-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 19, 2022 at 01:58 PM
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
(2, 'operator', 'Operator Pembangunan'),
(3, 'skpd', 'Operator SKPD'),
(4, 'auditor', 'Auditor APIP');

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
  `tgl_reg` datetime DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pemb` int(11) NOT NULL,
  `id_kontrak` bigint(20) DEFAULT NULL,
  `id_mslh` int(11) DEFAULT NULL,
  `no_bap` varchar(255) DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `jns_pemb` int(11) DEFAULT NULL,
  `prosentase` double DEFAULT NULL,
  `nilai_bayar` bigint(20) DEFAULT NULL,
  `dokumen` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

-- --------------------------------------------------------

--
-- Table structure for table `potongan`
--

CREATE TABLE `potongan` (
  `id_pot` int(11) NOT NULL,
  `id_kontrak` bigint(20) DEFAULT NULL,
  `id_pemb` int(11) DEFAULT NULL,
  `jns_pot` varchar(255) DEFAULT NULL,
  `nilai_pot` bigint(20) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nama_kpl` varchar(255) DEFAULT NULL,
  `nip_kpl` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, '127.0.0.1', 'administrator', '$2y$12$Whh3RBI.I6ApyoRQds.Ho.4yA5Va0iaNfZo78CORr3F01HtF9FfXi', 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1671430613, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '127.0.0.1', 'operator', '$2y$10$Nq5tomViNVG6GO4L6Ia1zOckwl.GRNvIxTjRIXuZne926NHDr3/ce', 'operator@operator1.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1670994587, 1671183094, 1, NULL, NULL, 'Pemerintah Kota Kediri', NULL),
(3, '127.0.0.1', 'skpd', '$2y$10$ZaGEui8EqCHY1Wek1ESpwO9k/wNhIuOHH52wjJP1LfObvFE/tOR12', 'skpd@simonpem.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1671164838, 1671264072, 1, NULL, NULL, 'Pemerintah Kota Kediri', NULL);

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
(2, 1, 2),
(3, 2, 2),
(4, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `workflow`
--

CREATE TABLE `workflow` (
  `id_wf` int(11) NOT NULL,
  `id_kontrak` bigint(20) DEFAULT NULL,
  `id_lpr` int(11) DEFAULT NULL,
  `id_pemb` int(11) DEFAULT NULL,
  `id_addm` int(11) DEFAULT NULL,
  `id_prakhir` int(11) DEFAULT NULL,
  `acc` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pemb`);

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
-- Indexes for table `potongan`
--
ALTER TABLE `potongan`
  ADD PRIMARY KEY (`id_pot`);

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
-- Indexes for table `workflow`
--
ALTER TABLE `workflow`
  ADD PRIMARY KEY (`id_wf`);

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
  MODIFY `id_bkti` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kontrak`
--
ALTER TABLE `kontrak`
  MODIFY `id_kontrak` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kontrak_user`
--
ALTER TABLE `kontrak_user`
  MODIFY `id_ku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_lpr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laporan_pekerjaan`
--
ALTER TABLE `laporan_pekerjaan`
  MODIFY `id_lpkr` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id_pkrj` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pemb` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `perhitungan_akhir`
--
ALTER TABLE `perhitungan_akhir`
  MODIFY `id_prakhir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permasalahan`
--
ALTER TABLE `permasalahan`
  MODIFY `id_mslh` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `potongan`
--
ALTER TABLE `potongan`
  MODIFY `id_pot` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ppk`
--
ALTER TABLE `ppk`
  MODIFY `id_ppk` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rekanan`
--
ALTER TABLE `rekanan`
  MODIFY `id_rekanan` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanksi`
--
ALTER TABLE `sanksi`
  MODIFY `id_snksi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `satuan_kerja`
--
ALTER TABLE `satuan_kerja`
  MODIFY `id_satker` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `workflow`
--
ALTER TABLE `workflow`
  MODIFY `id_wf` int(11) NOT NULL AUTO_INCREMENT;

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
