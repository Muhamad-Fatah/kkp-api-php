-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2023 at 10:23 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mahasiswa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dosen`
--

CREATE TABLE `tbl_dosen` (
  `dosen_id` varchar(36) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL DEFAULT 'dosen',
  `role` varchar(10) NOT NULL DEFAULT 'dosen'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_dosen`
--

INSERT INTO `tbl_dosen` (`dosen_id`, `nama_dosen`, `password`, `role`) VALUES
('100399379940114433', 'Roby Sulistyo', 'dosen', 'dosen'),
('100399379940114434', 'Hadi Wibowo', 'dosen', 'dosen'),
('100399379940114435', 'Sri Mulyati Andini', 'dosen', 'dosen'),
('100399379940114436', 'Eva Nurkhalisah', 'dosen', 'dosen'),
('100399379940114437', 'Muhamad Arif Hasanudin', 'dosen', 'dosen'),
('100399379940114438', 'Sulistyo Yoga Hendrawan', 'dosen', 'dosen');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kaprodi`
--

CREATE TABLE `tbl_kaprodi` (
  `kaprodi_id` varchar(36) NOT NULL,
  `nama_kaprodi` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL DEFAULT 'kaprodi',
  `role` varchar(10) NOT NULL DEFAULT 'kaprodi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kaprodi`
--

INSERT INTO `tbl_kaprodi` (`kaprodi_id`, `nama_kaprodi`, `password`, `role`) VALUES
('100400276715864064', 'Anggoro Jati', 'kaprodi', 'kaprodi'),
('100400276715864065', 'Agus Sutisna', 'kaprodi', 'kaprodi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kegiatan`
--

CREATE TABLE `tbl_kegiatan` (
  `kegiatan_id` varchar(36) NOT NULL,
  `tipe_kegiatan` varchar(3) NOT NULL,
  `nama_tempat` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `bentuk_kegiatan` varchar(50) NOT NULL,
  `dosen_id` varchar(36) DEFAULT NULL,
  `mahasiswa_id` varchar(36) NOT NULL,
  `daftar_anggota` varchar(255) NOT NULL,
  `tanggal_mulai` timestamp NULL DEFAULT current_timestamp(),
  `tanggal_akhir` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_kegiatan`
--

INSERT INTO `tbl_kegiatan` (`kegiatan_id`, `tipe_kegiatan`, `nama_tempat`, `alamat`, `bentuk_kegiatan`, `dosen_id`, `mahasiswa_id`, `daftar_anggota`, `tanggal_mulai`, `tanggal_akhir`) VALUES
('100400276715864067', 'kkp', 'PT.Astra Indonesia', 'Jl.Hamengkubwono X kelurahan siliwangi kecamatan telagasari', 'IT Support', '100399379940114434', '2023000035', '', '2023-07-14 18:46:48', '2023-07-14 18:46:48'),
('64b1a25e60a8f', 'kkn', 'Puskesmas Desa', 'Jl.Flores 3 desa warudingin gunung lentera', 'Sosialisasi pentingnya makanan higenis', '100399379940114438', '12345', 'Hendra Wicaksono;Samuel Aditya;Farhan Alfarizi', '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `mahasiswa_id` varchar(36) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'mahasiswa',
  `password` varchar(255) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`mahasiswa_id`, `role`, `password`, `nama_depan`, `nama_belakang`, `jurusan`) VALUES
('12345', 'mahasiswa', 'mahasiswa', 'Betran', 'Sitoli-toli', 'Teknik Informatika'),
('2023000035', 'mahasiswa', 'mahasiswa', 'Febi', 'Novitasari', 'Sistem Informasi'),
('2023000174', 'mahasiswa', 'mahasiswa', 'Melinda', 'Uyainah', 'Teknik Informatika'),
('2023000286', 'mahasiswa', 'mahasiswa', 'Siti', 'Handayani', 'Teknik Informatika'),
('2023001011', 'mahasiswa', 'mahasiswa', 'Fauzi', 'Ariansyah', 'Teknik Mesin'),
('2023001015', 'mahasiswa', 'mahasiswa', 'Ayu', 'Maryati', 'Sistem Informasi'),
('2023001023', 'mahasiswa', 'mahasiswa', 'Alif', 'Khairudin', 'Operator Teknik'),
('2023001049', 'mahasiswa', 'mahasiswa', 'Ade', 'Ferdiansyah', 'Teknik Farmasi'),
('2023001130', 'mahasiswa', 'mahasiswa', 'Irwan', 'Utama', 'Teknik Informatika'),
('2023111005', 'mahasiswa', 'mahasiswa', 'Jail', 'Uwais', 'Sistem Informasi'),
('2147483647', 'mahasiswa', 'mahasiswa', 'Jindra', 'Hakim', 'Sistem Informasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_dosen`
--
ALTER TABLE `tbl_dosen`
  ADD PRIMARY KEY (`dosen_id`);

--
-- Indexes for table `tbl_kaprodi`
--
ALTER TABLE `tbl_kaprodi`
  ADD PRIMARY KEY (`kaprodi_id`);

--
-- Indexes for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD PRIMARY KEY (`kegiatan_id`),
  ADD UNIQUE KEY `mahasiswa_id_2` (`mahasiswa_id`),
  ADD KEY `mahasiswa_id` (`mahasiswa_id`),
  ADD KEY `dosen_id` (`dosen_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`mahasiswa_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_kegiatan`
--
ALTER TABLE `tbl_kegiatan`
  ADD CONSTRAINT `fk_tbl_kegiatan_tbl_dosen` FOREIGN KEY (`dosen_id`) REFERENCES `tbl_dosen` (`dosen_id`),
  ADD CONSTRAINT `fk_tbl_kegiatan_tbl_user` FOREIGN KEY (`mahasiswa_id`) REFERENCES `tbl_user` (`mahasiswa_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
