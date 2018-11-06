-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2018 at 05:49 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbpemetaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detailpenilaian`
--

CREATE TABLE `detailpenilaian` (
  `idpenilaian` int(11) NOT NULL,
  `idkriteriaPoint` int(11) NOT NULL,
  `point` double NOT NULL,
  `nilaiNormalisasi` double NOT NULL,
  `nilaiMatrik` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `keterangan`) VALUES
(1, 'Internal', 'Pengajar yang berada di divisi pembelajaran NF COMPUTER'),
(2, 'Eksternal', 'Pengajar yang berada di luar divisi pembelajaran NF COMPUTER,tetapi masih pegawai STT Nurul Fikri'),
(3, 'Freelance', 'Pengajar freelance yang tidak menjadi bagian STT NF');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id`, `nama`, `bobot`) VALUES
(1, 'Pendidikan Formal', 15),
(2, 'Pendidikan Non Formal', 5),
(3, 'Kompetensi Teknis', 20),
(4, 'Kompetensi Metodologi', 10),
(5, 'Hasil Karya Modul Kursus', 10),
(6, 'Sertifikat Kompetensi Berskala Nasional', 5),
(7, 'Sertifikat Kompetensi Berskala Internasional ', 10),
(8, 'Durasi Jam Mengajar dalam Setahun', 15),
(9, 'Masa / Lama Kerja', 10);

-- --------------------------------------------------------

--
-- Table structure for table `kriteriapoint`
--

CREATE TABLE `kriteriapoint` (
  `id` int(11) NOT NULL,
  `idkriteria` int(11) NOT NULL,
  `deskripsi` text NOT NULL,
  `point` double NOT NULL,
  `tahun` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteriapoint`
--

INSERT INTO `kriteriapoint` (`id`, `idkriteria`, `deskripsi`, `point`, `tahun`) VALUES
(3, 1, 'SMA,SMK,MA,Setara', 60, 2018),
(4, 1, 'D1,SMK/STM 4 Tahun,PPST,Setara', 65, 2018),
(5, 1, 'D2,PPDT,Setara', 68, 2018),
(6, 1, 'D3,Setara', 70, 2018),
(7, 1, 'D4,S1,Setara', 75, 2018),
(8, 1, 'S2,Specialist,Setara', 85, 2018),
(9, 2, '0', 0, 2018),
(10, 2, '1', 60, 2018),
(11, 2, '2', 70, 2018),
(12, 2, '3', 80, 2018),
(13, 2, '4', 90, 2018),
(14, 2, '>5', 100, 2018);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(255) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1541467889),
('m140209_132017_init', 1541467902),
('m140403_174025_create_account_table', 1541467903),
('m140504_113157_update_tables', 1541467905),
('m140504_130429_create_token_table', 1541467907),
('m140506_102106_rbac_init', 1541478520),
('m140602_111327_create_menu_table', 1541478171),
('m140830_171933_fix_ip_field', 1541467907),
('m140830_172703_change_account_table_name', 1541467907),
('m141222_110026_update_ip_field', 1541467909),
('m141222_135246_alter_username_length', 1541467909),
('m150614_103145_update_social_account_table', 1541467911),
('m150623_212711_fix_username_notnull', 1541467911),
('m151218_234654_add_timezone_to_profile', 1541467911),
('m160312_050000_create_user', 1541478171),
('m160929_103127_add_last_login_at_to_user_table', 1541467911),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1541478520);

-- --------------------------------------------------------

--
-- Table structure for table `pengajar`
--

CREATE TABLE `pengajar` (
  `id` int(11) NOT NULL,
  `nip` varchar(45) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `idkategori` int(11) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `tmp_lahir` varchar(45) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `hp` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `tgl_bergabung` date DEFAULT NULL,
  `pendidikan_terakhir` varchar(45) NOT NULL,
  `tahun_lulus` int(11) DEFAULT NULL,
  `instansi_pendidikan` varchar(45) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `cv` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajar`
--

INSERT INTO `pengajar` (`id`, `nip`, `nama`, `idkategori`, `gender`, `tmp_lahir`, `tgl_lahir`, `alamat`, `hp`, `email`, `tgl_bergabung`, `pendidikan_terakhir`, `tahun_lulus`, `instansi_pendidikan`, `foto`, `cv`) VALUES
(1, '231', 'abdullah', 1, 'L', 'rasau jaya', '0000-00-00', 'rasua jaya', '08232342354', 'abdullah@gmail.com', '0000-04-04', 'mas', 2018, '', '1235632566-5112018.jpg', '1235632566.docx'),
(4, '123', 'wahyono', 1, 'L', 'risu', '2000-04-04', 'riaau', '08534521573', 'wahyono@gmail.com', '2018-07-04', 'sma', 2018, 'sma', '123-4112018.jpg', '123.docx'),
(5, '125', 'samsul', 1, 'P', 'rasau jaya', '2000-04-04', 'Rasau jaya', '090887566757', 'samsularifinanwar@gmail.com', '0000-04-04', 'mas', 2018, 'mas', '125-5112018.jpg', '12.docx'),
(6, '134', 'samsul arifin', 1, 'L', 'rasau jaya', '2018-11-05', 'rasau jaya', '0845345675', 'samsularifin@gmail.com', '0000-00-00', 'mas', 2018, 'mas', '134-5112018.jpg', '1.pdf'),
(7, '256', 'nanang', 2, 'L', 'jogja', '2018-11-05', 'jogja', '04552453642', 'nanang@gmail.com', '2018-07-04', 'sma', 2018, 'sma', '256-5112018.jpg', NULL),
(8, '142', 'dudung', 2, 'L', 'wajok', '2018-11-05', 'wajok', '0534532456', 'dudung@gmai.com', '2018-07-04', 'mas', 2018, 'sma', '142-5112018.jpg', NULL),
(9, '237', 'didin', 2, 'L', 'peniram', '2018-11-05', 'peniram', '0534532456', 'didin@gmail.com', '2018-07-04', 'mas', NULL, 'mas', '237-5112018.jpg', NULL),
(10, '1234', 'ninin', 2, 'P', 'mempawah', '2018-11-05', 'mempawah', '08232342354', 'ninin@gmail.com', '2018-07-04', 'mas', 2018, 'mas', '1234-5112018.jpg', NULL),
(11, '213', 'nur hayati', 2, 'P', 'mempawah', '2018-11-05', 'jogja', '0534532456', 'nurhayati@gmail.com', '0000-04-04', 'sma', 2018, 'mas', '213-5112018.jpg', NULL),
(12, '243', 'nur mala', 2, 'P', 'mempawah', '2018-11-05', 'mempawah', '08534521573', 'nurmala@gmail.com', '0000-04-04', 'mas', 2018, 'sma', '243-5112018.jpg', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(11) NOT NULL,
  `idpengajar` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `total` double DEFAULT NULL,
  `level` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id`, `idpengajar`, `tahun`, `total`, `level`) VALUES
(1, 1, 2018, 1, '10'),
(2, 12, 2018, 2, '12'),
(3, 1, 2000, 12, '4'),
(4, 12, 2000, 12, '12'),
(5, 1, 2018, 2, '4');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `public_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gravatar_id` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `website` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `timezone` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`user_id`, `name`, `public_email`, `gravatar_email`, `gravatar_id`, `location`, `website`, `bio`, `timezone`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `social_account`
--

CREATE TABLE `social_account` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `code` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`user_id`, `code`, `created_at`, `type`) VALUES
(1, 'iuICJ3XBAnwv4iObx65qJB_rvxlJGTnb', 1541469392, 0),
(2, 'fFhpCfuUCI-eEpa-yYjC1qSMH6HPUOHR', 1541469600, 0),
(4, 'fDkzXIXeA6maQljgPT2tSmPycxvJ7_YD', 1541470196, 0),
(5, 'aXnkB4MpH8lPIfm6eb2KJ1DJP3GVELMb', 1541471144, 0),
(6, '5bpKy761KOFCdm6F32YFlc_6XuLG2W3b', 1541471599, 0),
(7, 'M6HJf-PJNQ26wMh-5Y5sF-aPKh_o2X-J', 1541471671, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  `last_login_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password_hash`, `auth_key`, `confirmed_at`, `unconfirmed_email`, `blocked_at`, `registration_ip`, `created_at`, `updated_at`, `flags`, `last_login_at`) VALUES
(1, 'nanang', 'nanang@gmail.com', '$2y$12$SV9MOYdU8skoLb.GdSmiuOJuC/ffvC9BHgisHnnEmMhgo/iU7SUQq', '1_H9TAuXcsqw5QYarRYiiRL8Bqad5PEH', NULL, NULL, NULL, '::1', 1541469392, 1541469392, 0, 1541469502),
(2, 'samsul', 'samsul@gmail.com', '$2y$12$eJz/s59YJFF8Yg9fQYWrU.nySWCq8j1qj6VcWBlcEiF8b3cIa6M66', '4q6e6jBHB1Y8xttsW0hRBQZRWjnplVq7', 1541469916, NULL, NULL, '::1', 1541469600, 1541469600, 0, 1541472361),
(4, 'abdullah', 'abdullah@gmail.com', '$2y$12$09vQyPrVOZj9.OyuLVAsZOagP6rcBoL/.I4632r9rAV9cRx32kbkC', 'Dd4HFeUz7kpHSXPDq4GqiIyqw5cNkVHG', NULL, NULL, NULL, '::1', 1541470196, 1541470196, 0, 1541470221),
(5, 'ardiantamvan', 'ardianazzzaaaaaaaaaa@gmail.com', '$2y$12$ilJ6vKheF6I9/qSvC6lrpuGn.4sWNVuw0MKMiR9xQI5pNFn2tc2em', 'fLHM2_k2Nti2SbrdEFrs8QJtBdAjkqrg', 1541472458, NULL, NULL, '192.168.15.229', 1541471144, 1541471144, 0, NULL),
(6, 'wahyono', 'wahyono1@gmail.com', '$2y$12$EsjIshPlALKNxTaIU7jn2.Uvci3FEnChOSq89/rcZEZ8zcMl1fNaG', 'p0kVEf31V02aHlzzXXt5PqDW7LsYKFcR', 1541471731, NULL, NULL, '192.168.15.147', 1541471598, 1541471598, 0, 1541471614),
(7, 'admin', 'wahyonohatake@gmail.com', '$2y$12$wfRRgv1wu0Aur/WHljr.seFlUvuwRVHzB44gvgN4q6lGvYUpfbecO', 'lDyooZ0EQGIstfaXQJVgUFrW_-nXBXvN', 1541471727, NULL, NULL, '192.168.15.147', 1541471670, 1541471670, 0, 1541471715);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `auth_assignment_user_id_idx` (`user_id`);

--
-- Indexes for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indexes for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indexes for table `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `detailpenilaian`
--
ALTER TABLE `detailpenilaian`
  ADD KEY `fk_kriteriaPoint_has_penilaian_kriteriaPoint1` (`idkriteriaPoint`),
  ADD KEY `fk_kriteriaPoint_has_penilaian_penilaian1` (`idpenilaian`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_UNIQUE` (`nama`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_UNIQUE` (`nama`);

--
-- Indexes for table `kriteriapoint`
--
ALTER TABLE `kriteriapoint`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kriteriaPoint_kriteria` (`idkriteria`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent` (`parent`);

--
-- Indexes for table `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nip_UNIQUE` (`nip`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD KEY `fk_pengajar_kategori1` (`idkategori`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_penilaian_pengajar1` (`idpengajar`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `social_account`
--
ALTER TABLE `social_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account_unique` (`provider`,`client_id`),
  ADD UNIQUE KEY `account_unique_code` (`code`),
  ADD KEY `fk_user_account` (`user_id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD UNIQUE KEY `token_unique` (`user_id`,`code`,`type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_unique_username` (`username`),
  ADD UNIQUE KEY `user_unique_email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kriteriapoint`
--
ALTER TABLE `kriteriapoint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengajar`
--
ALTER TABLE `pengajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `social_account`
--
ALTER TABLE `social_account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detailpenilaian`
--
ALTER TABLE `detailpenilaian`
  ADD CONSTRAINT `fk_kriteriaPoint_has_penilaian_kriteriaPoint1` FOREIGN KEY (`idkriteriaPoint`) REFERENCES `kriteriapoint` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_kriteriaPoint_has_penilaian_penilaian1` FOREIGN KEY (`idpenilaian`) REFERENCES `penilaian` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kriteriapoint`
--
ALTER TABLE `kriteriapoint`
  ADD CONSTRAINT `fk_kriteriaPoint_kriteria` FOREIGN KEY (`idkriteria`) REFERENCES `kriteria` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `pengajar`
--
ALTER TABLE `pengajar`
  ADD CONSTRAINT `fk_pengajar_kategori1` FOREIGN KEY (`idkategori`) REFERENCES `kategori` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `fk_penilaian_pengajar1` FOREIGN KEY (`idpengajar`) REFERENCES `pengajar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `social_account`
--
ALTER TABLE `social_account`
  ADD CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `token`
--
ALTER TABLE `token`
  ADD CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
