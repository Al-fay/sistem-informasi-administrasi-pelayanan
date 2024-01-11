-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2024 at 01:24 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `datang`
--

CREATE TABLE `datang` (
  `id_datang` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `id_pemohon` int(11) DEFAULT NULL,
  `tanggal` datetime NOT NULL,
  `kepala_keluarga` varchar(60) NOT NULL,
  `tempat_lahir` varchar(32) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('1','2') NOT NULL,
  `status_perkawinan` enum('1','2','3','4') NOT NULL,
  `alamat_asal` text NOT NULL,
  `alamat_sekarang` text NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `data_anggotakeluarga` text NOT NULL,
  `kk` varchar(35) NOT NULL,
  `status` enum('1','2','3') NOT NULL,
  `surat_datang` varchar(35) NOT NULL,
  `pengantar_rt` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kelahiran`
--

CREATE TABLE `kelahiran` (
  `id_kelahiran` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `id_pemohon` int(11) DEFAULT NULL,
  `no_surat` varchar(14) DEFAULT NULL,
  `tanggal` datetime NOT NULL,
  `nama_anak` varchar(60) NOT NULL,
  `nama_ibu` varchar(60) NOT NULL,
  `nama_ayah` varchar(60) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('1','2') NOT NULL,
  `tgl_kelahiran` date NOT NULL,
  `tempat_kelahiran` varchar(15) NOT NULL,
  `status_kelahiran` enum('1','2','3') NOT NULL,
  `surat_kelahiran` varchar(35) NOT NULL,
  `pengantar_rt` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelahiran`
--

INSERT INTO `kelahiran` (`id_kelahiran`, `id_pengguna`, `id_pemohon`, `no_surat`, `tanggal`, `nama_anak`, `nama_ibu`, `nama_ayah`, `alamat`, `jenis_kelamin`, `tgl_kelahiran`, `tempat_kelahiran`, `status_kelahiran`, `surat_kelahiran`, `pengantar_rt`) VALUES
(1, NULL, 6, NULL, '2024-01-11 12:23:32', 'coba', 'coba', 'coba', 'kdw brt', '1', '2024-01-11', 'Pekalongan', '1', '', '1704975812_5232261cc92ba6fbc984.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kematian`
--

CREATE TABLE `kematian` (
  `id_meninggal` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `id_pemohon` int(11) DEFAULT NULL,
  `no_surat` varchar(14) DEFAULT NULL,
  `tanggal` datetime NOT NULL,
  `nama_meninggal` varchar(60) NOT NULL,
  `jenis_kelamin` enum('1','2') NOT NULL,
  `alamat` text NOT NULL,
  `umur` int(3) NOT NULL,
  `tgl_meninggal` date NOT NULL,
  `tempat_meninggal` varchar(40) NOT NULL,
  `sebab_meninggal` varchar(40) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `status` enum('1','2','3') NOT NULL,
  `surat_kematian` varchar(35) NOT NULL,
  `pengantar_rt` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keterangan`
--

CREATE TABLE `keterangan` (
  `id_keterangan` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `id_pemohon` int(11) DEFAULT NULL,
  `no_surat` varchar(14) DEFAULT NULL,
  `nama` varchar(60) NOT NULL,
  `tempat_lahir` varchar(32) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `negara` varchar(9) NOT NULL,
  `agama` enum('1','2','3','4','5','6') NOT NULL,
  `pekerjaan` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `keperluan` enum('1','2','3','4') NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` enum('1','2','3') NOT NULL,
  `surat_keterangan` varchar(35) NOT NULL,
  `pengantar_rt` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pemohon`
--

CREATE TABLE `pemohon` (
  `id_pemohon` int(11) NOT NULL,
  `tgl_daftar` datetime NOT NULL,
  `nama_pemohon` varchar(60) NOT NULL,
  `jns_kelamin` enum('1','2') NOT NULL,
  `alamat_pemohon` text NOT NULL,
  `tempat_lahir_pemohon` varchar(32) NOT NULL,
  `tgl_lahir_pemohon` date NOT NULL,
  `no_telepon` varchar(13) NOT NULL,
  `nik_pemohon` varchar(16) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `status_akun` enum('1','2','3') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemohon`
--

INSERT INTO `pemohon` (`id_pemohon`, `tgl_daftar`, `nama_pemohon`, `jns_kelamin`, `alamat_pemohon`, `tempat_lahir_pemohon`, `tgl_lahir_pemohon`, `no_telepon`, `nik_pemohon`, `username`, `password`, `status_akun`) VALUES
(4, '2023-11-27 03:39:57', 'azka', '1', 'kdw brt', 'contoh', '2023-11-17', '098273846783', '039834742348', 'coba', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '1'),
(6, '2023-11-28 02:50:11', 'Adnan Supriyanto', '1', 'contoh', 'pekalongan', '2023-11-28', '098273846783', '039834742348', 'abc', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '2');

-- --------------------------------------------------------

--
-- Table structure for table `pengantar`
--

CREATE TABLE `pengantar` (
  `id_pengantar` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `id_pemohon` int(11) DEFAULT NULL,
  `no_surat` varchar(14) DEFAULT NULL,
  `nama` varchar(60) NOT NULL,
  `tempat_lahir` varchar(32) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `negara` varchar(9) NOT NULL,
  `agama` enum('1','2','3','4','5','6') NOT NULL,
  `pekerjaan` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `keperluan` enum('1','2','3','4') NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` date NOT NULL,
  `status` enum('1','2','3') NOT NULL,
  `surat_pengantar` varchar(35) NOT NULL,
  `pengantar_rt` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `role` enum('petugas','lurah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id_pengguna`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 'petugas'),
(2, 'lurah', 'lurah', 'lurah');

-- --------------------------------------------------------

--
-- Table structure for table `pindah`
--

CREATE TABLE `pindah` (
  `id_pindah` int(11) NOT NULL,
  `id_pengguna` int(11) DEFAULT NULL,
  `id_pemohon` int(11) DEFAULT NULL,
  `tanggal` datetime NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `nama` varchar(60) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `jenis_kelamin` enum('1','2') NOT NULL,
  `jenis_permohonan` varchar(23) NOT NULL,
  `pekerjaan` varchar(40) NOT NULL,
  `alamat_asal` text NOT NULL,
  `klasifikasi_perpindahan` enum('1','2','3','4','5') NOT NULL,
  `alamat_pindah` text NOT NULL,
  `alasan_pindah` enum('1','2','3','4','5','6') NOT NULL,
  `jenis_kepindahan` enum('1','2','3','4') NOT NULL,
  `anggotakeluarga_tidakpindah` enum('1','2') NOT NULL,
  `anggotakeluarga_pindah` enum('1','2') NOT NULL,
  `daftarpindah` text NOT NULL,
  `kk` varchar(35) NOT NULL,
  `foto` varchar(36) NOT NULL,
  `status` enum('1','2','3') NOT NULL,
  `surat_pindah` varchar(35) NOT NULL,
  `pengantar_rt` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datang`
--
ALTER TABLE `datang`
  ADD PRIMARY KEY (`id_datang`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_pemohon` (`id_pemohon`);

--
-- Indexes for table `kelahiran`
--
ALTER TABLE `kelahiran`
  ADD PRIMARY KEY (`id_kelahiran`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_pemohon` (`id_pemohon`);

--
-- Indexes for table `kematian`
--
ALTER TABLE `kematian`
  ADD PRIMARY KEY (`id_meninggal`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_pemohon` (`id_pemohon`);

--
-- Indexes for table `keterangan`
--
ALTER TABLE `keterangan`
  ADD PRIMARY KEY (`id_keterangan`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_pemohon` (`id_pemohon`);

--
-- Indexes for table `pemohon`
--
ALTER TABLE `pemohon`
  ADD PRIMARY KEY (`id_pemohon`);

--
-- Indexes for table `pengantar`
--
ALTER TABLE `pengantar`
  ADD PRIMARY KEY (`id_pengantar`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_pemohon` (`id_pemohon`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `pindah`
--
ALTER TABLE `pindah`
  ADD PRIMARY KEY (`id_pindah`),
  ADD KEY `id_pengguna` (`id_pengguna`),
  ADD KEY `id_pemohon` (`id_pemohon`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datang`
--
ALTER TABLE `datang`
  MODIFY `id_datang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelahiran`
--
ALTER TABLE `kelahiran`
  MODIFY `id_kelahiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kematian`
--
ALTER TABLE `kematian`
  MODIFY `id_meninggal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keterangan`
--
ALTER TABLE `keterangan`
  MODIFY `id_keterangan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pemohon`
--
ALTER TABLE `pemohon`
  MODIFY `id_pemohon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengantar`
--
ALTER TABLE `pengantar`
  MODIFY `id_pengantar` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pindah`
--
ALTER TABLE `pindah`
  MODIFY `id_pindah` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
