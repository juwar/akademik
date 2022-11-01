-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 01, 2022 at 02:17 AM
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
('KP635FF', 'MK-635F', 'Kreatif dan Inovatif');

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
('KS-635F', 'KP635FF', 'MH-635FEF36053F5');

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
('MH-635FEF9A37841', 'Muhammad Juwarno', 'TI', 'Ndak Tau', '08767867868', 'Suruh');

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
('MK-635F', 'Technoprenuership', 2);

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
('R-635FFECB', 'MH-635FEF36053F5', 'Baik');

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
