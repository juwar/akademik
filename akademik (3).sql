-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2022 at 07:29 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akademik`
--

-- --------------------------------------------------------

--
-- Table structure for table `kecakapan`
--

CREATE TABLE `kecakapan` (
  `id_kecakapan` varchar(10) NOT NULL,
  `kode_matkul` varchar(10) NOT NULL,
  `type_kecakapan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecakapan`
--

INSERT INTO `kecakapan` (`id_kecakapan`, `kode_matkul`, `type_kecakapan`) VALUES
('KP635FF', 'MK-635F', 'Kreatif dan Inovatif'),
('KP6365DDE6', 'MK-6365D65', 'AR / VR'),
('KP6365DE17', 'MK-6365D67', 'Android SDK'),
('KP6365DE4F', 'MK-6365D6D', 'Membuat Film'),
('KP6365DE87', 'MK-6365D6F', 'Matematika diskrit'),
('KP6365DE9D', 'MK-6365D70', 'Membuat Game 2D/3D'),
('KP6365DEB0', 'MK-6365D72', 'Merakit Komputer'),
('KP6365DECE', 'MK-6365D75', 'Kecerdasan AI'),
('KP6365DEF0', 'MK-6365D76', 'Membuat Website'),
('KP6365DF06', 'MK-6365D79', 'Periklanan'),
('KP6365DF37', 'MK-6365D7A', 'Mengajar');

-- --------------------------------------------------------

--
-- Table structure for table `kecakapan_siswa`
--

CREATE TABLE `kecakapan_siswa` (
  `id` varchar(10) NOT NULL,
  `id_kecakapan` varchar(10) NOT NULL,
  `nim` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kecakapan_siswa`
--

INSERT INTO `kecakapan_siswa` (`id`, `id_kecakapan`, `nim`) VALUES
('KS-6367532', 'KP6365DE17', 'MH-6365DB4473271'),
('KS-6367533', 'KP6365DE17', 'MH-6365DB711F514');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `prodi` varchar(100) NOT NULL,
  `pembimbing` varchar(100) NOT NULL,
  `telpon` varchar(15) NOT NULL,
  `alamat` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama`, `prodi`, `pembimbing`, `telpon`, `alamat`) VALUES
('MH-635FEF36053F5', 'Falid Reza', 'PTI', 'Dosen Pembimbing', '0557834838', 'Ampel'),
('MH-635FEF9A37841', 'Muhammad Juwarno', 'TI', 'Ndak Tau', '08767867868', 'Suruh'),
('MH-6365DB11EC31F', 'Andi Bachtiar', 'PTI', 'RYAN ', '0899746666252', 'Klaten'),
('MH-6365DB4473271', 'Chelvin Aryo Bimantoro', 'PTI', 'RYAN', '0899746624452', 'Salatiga'),
('MH-6365DB711F514', 'Andica Nur Rohman', 'PTI', 'Arif Setiaawan', '089898746652', 'Surakarta'),
('MH-6365DBB47FCE0', 'Alif Hammam', 'PTI', 'Ryan', '089766333421', 'Solo'),
('MH-6365DC0050009', 'Deni Nur', 'PTI', 'Ahmad Chamsudin', '0979721819', 'Boyolali'),
('MH-6365DC64811A5', 'Febrian Pambuko', 'PTI', 'Hardika Dwi Hernawan', '08936553223', 'Solobaru'),
('MH-6365DC80A361F', 'Ristanto Indra Kusuma', 'PTI', 'Arif Setiaawan', '089974667736', 'Klaten'),
('MH-6365DC9CADA49', 'Agan Puspo', 'PTI', 'Ryan', '089974667736', 'Surakarta'),
('MH-6365DCD1249E7', 'Fahrozi Reza', 'PTI', 'Arif Setiaawan', '08762736', 'Colomadu'),
('MH-6365DCF3023EC', 'Dicky Kurnia', 'PTI', 'Arif Setiaawan', '089974667736', 'Salatiga'),
('MH-6365DD18A2368', 'Dina Marinda', 'PTI', 'RYAN', '0899746666252', 'Bangka Belitung'),
('MH-6365DD300D99C', 'Wildan Deni ', 'PTI', 'RYAN', '089974667736', 'Magetan'),
('MH-6365DD4ED38F5', 'Handito Purnomo Edi', 'PTI', 'Arif Setiaawan', '089974667736', 'Surakarta'),
('MH-6365DD65B2D5C', 'Kevin Pratama', 'PTI', 'RYAN', '089974667736', 'Klaten');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `kode` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `sks` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`kode`, `nama`, `sks`) VALUES
('MK-635F', 'Technoprenuership', 2),
('MK-6365D65', 'Aplikasi Mixed Reality', 3),
('MK-6365D67', 'Teknologi Motion Tracking', 3),
('MK-6365D6D', 'Cinematography', 3),
('MK-6365D6F', 'Pengolahan Citra Digital', 3),
('MK-6365D70', 'Multiplayer Game', 3),
('MK-6365D72', 'Perakitan Komputer dan Praktik', 3),
('MK-6365D75', 'Computer Vision', 3),
('MK-6365D76', 'Pemrograman Web Lanjut', 3),
('MK-6365D79', 'e-Commerce', 3),
('MK-6365D7A', 'E-learning', 3),
('MK-6365D7C', 'Kecerdasan Buatan', 3),
('MK-6365D7D', 'Pengembangan Aplikasi Mobile', 3),
('MK-6365D7F', 'Data Science', 3),
('MK-6365D81', 'Riset Operasi', 3),
('MK-6365D85', 'Jaringan Nirkabel', 3),
('MK-6365D86', 'Ethical Hacking', 3),
('MK-6365D87', 'Internet of Things', 3),
('MK-6365D88', 'Cyber Security', 3),
('MK-6365D89', 'Cloud Computing', 3),
('MK-6365D8A', 'Wireless Sensor Network', 3),
('MK-6365D8B', 'Audit Sistem Informasi', 3),
('MK-6365D8C', 'Kewirausahaan', 3),
('MK-6365D8D', 'Hak Kekayaan Intelektual', 3),
('MK-6365D8E', 'Literasi Digital', 3),
('MK-6365D8F', 'Etika Profesi Keguruan', 3),
('MK-6365D90', 'Modul Nusantara', 3),
('MK-6365D92', 'Perkembangan Peserta Didik', 3),
('MK-6365D93', 'Penulisan Karya Ilmiah', 3),
('MK-6365D94', 'Pengembangan Sekolah', 3),
('MK-6365D95', 'Bisnis Digital', 3),
('MK-6365D96', 'Pembelajaran Tematik', 3),
('MK-6365D97', 'Sertifikasi Kompetensi', 3);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` varchar(10) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `kode_matkul` varchar(10) NOT NULL,
  `semester` int(2) NOT NULL,
  `nilai` varchar(3) NOT NULL,
  `bobot_nilai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nim`, `kode_matkul`, `semester`, `nilai`, `bobot_nilai`) VALUES
('NL-635F', 'MH-635FEF36053F5', 'MK-635F', 1, 'A', 100);

-- --------------------------------------------------------

--
-- Table structure for table `refleksi`
--

CREATE TABLE `refleksi` (
  `id_refleksi` varchar(10) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `refleksi_pembimbing` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `refleksi`
--

INSERT INTO `refleksi` (`id_refleksi`, `nim`, `refleksi_pembimbing`) VALUES
('R-635FFECB', 'MH-635FEF36053F5', 'Baik'),
('R-63675446', 'MH-6365DC80A361F', 'buruk');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kecakapan`
--
ALTER TABLE `kecakapan`
  ADD PRIMARY KEY (`id_kecakapan`);

--
-- Indexes for table `kecakapan_siswa`
--
ALTER TABLE `kecakapan_siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `refleksi`
--
ALTER TABLE `refleksi`
  ADD PRIMARY KEY (`id_refleksi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
