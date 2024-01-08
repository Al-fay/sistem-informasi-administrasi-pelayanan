-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2024 at 03:11 AM
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

--
-- Dumping data for table `datang`
--

INSERT INTO `datang` (`id_datang`, `id_pengguna`, `id_pemohon`, `tanggal`, `kepala_keluarga`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `status_perkawinan`, `alamat_asal`, `alamat_sekarang`, `telepon`, `data_anggotakeluarga`, `kk`, `status`, `surat_datang`, `pengantar_rt`) VALUES
(2, NULL, 6, '2023-11-30 01:24:58', 'coba1', 'Pekalongan', '2023-11-30', '1', '1', 'pekajangan', 'kdw brt', '098658463382', '-', '1701350698_2f291cca9657042803e3.pdf', '2', '1701351253_bea2c11c38a7c4924df2.pdf', '1701350698_2e980f6702ea7552b29e.jpg');

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
(1, 1, 6, '474.5/2023/001', '2023-11-27 04:15:18', 'coba', 'coba', 'coba', 'coba', '2', '2023-11-27', 'coba', '2', '1701387278_24d5d710f15f6d2110cf.pdf', '1701058518_b1d78c90304929abb6c8.jpg'),
(2, 1, NULL, NULL, '2023-12-19 01:45:53', 'coba99', 'coba', 'coba', 'kdw barat', '1', '2023-12-19', 'pekalongan', '3', '', '1702950353_2518b86f2249213711aa.jpg');

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

--
-- Dumping data for table `kematian`
--

INSERT INTO `kematian` (`id_meninggal`, `id_pengguna`, `id_pemohon`, `no_surat`, `tanggal`, `nama_meninggal`, `jenis_kelamin`, `alamat`, `umur`, `tgl_meninggal`, `tempat_meninggal`, `sebab_meninggal`, `nik`, `no_kk`, `status`, `surat_kematian`, `pengantar_rt`) VALUES
(2, NULL, 6, '474.3/2023/001', '2023-11-30 01:22:26', 'coba1', '1', 'coba1', 70, '2023-11-30', 'Rumah Sakit', 'Sakit Tua', '3029305698378465', '3326139298230003', '2', '1701387861_195c82c3d64b79bcfcc4.pdf', '1701350546_636711eeb00caa5cf20a.jpg');

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

--
-- Dumping data for table `keterangan`
--

INSERT INTO `keterangan` (`id_keterangan`, `id_pengguna`, `id_pemohon`, `no_surat`, `nama`, `tempat_lahir`, `tgl_lahir`, `negara`, `agama`, `pekerjaan`, `alamat`, `no_ktp`, `keperluan`, `keterangan`, `tanggal`, `status`, `surat_keterangan`, `pengantar_rt`) VALUES
(2, NULL, 6, '422.8/2023/001', 'Sky Strike Ace: Raye', 'Pekalongan', '2023-11-30', 'Indonesia', '1', 'Karyawan Swasta', 'kdw brt', '3326139876000002', '2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus', '2023-11-30 01:26:26', '2', '1701351295_991a1e0a1df694191796.pdf', '1701350786_a709cb58de44d9a6d7e8.jpg');

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

--
-- Dumping data for table `pengantar`
--

INSERT INTO `pengantar` (`id_pengantar`, `id_pengguna`, `id_pemohon`, `no_surat`, `nama`, `tempat_lahir`, `tgl_lahir`, `negara`, `agama`, `pekerjaan`, `alamat`, `no_ktp`, `keperluan`, `keterangan`, `tanggal`, `status`, `surat_pengantar`, `pengantar_rt`) VALUES
(1, 1, NULL, '475.2/2023/001', 'Raye', 'Pekalongan', '2023-11-27', 'Indonesia', '2', 'Karyawan Swasta', 'kdw brt', '3326139876000002', '2', 'kehilangan ktp saat pulang dari Wonopringgo', '2023-11-27', '2', '', '1701091301_e3dc23f08fb9ffc4c213.jpg'),
(2, NULL, 6, NULL, 'Sky Strike Ace: Raye', 'Pekalongan', '2023-11-30', 'Indonesia', '1', 'Karyawan Swasta', 'kdw brt', '3326139876000002', '3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus', '2023-11-30', '1', '1701351316_45a3d8914e7b0d5925ce.pdf', '1701350826_c35aee456af7e02e52e8.jpg');

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
-- Dumping data for table `pindah`
--

INSERT INTO `pindah` (`id_pindah`, `id_pengguna`, `id_pemohon`, `tanggal`, `no_kk`, `nama`, `nik`, `jenis_kelamin`, `jenis_permohonan`, `pekerjaan`, `alamat_asal`, `klasifikasi_perpindahan`, `alamat_pindah`, `alasan_pindah`, `jenis_kepindahan`, `anggotakeluarga_tidakpindah`, `anggotakeluarga_pindah`, `daftarpindah`, `kk`, `foto`, `status`, `surat_pindah`, `pengantar_rt`) VALUES
(2, NULL, 6, '2023-11-30 00:00:00', '3273264244903900', 'Raye', '3326139274530003', '1', 'Surat Keterangan Pindah', 'Karyawan Swasta', 'kdw brt', '1', 'pekajangan', '1', '1', '2', '2', 'coba', '1701350647_4283e2c0b208b034b5b1.pdf', '1701350647_579701d1f7101a2ca4ed.jpg', '3', '', '1701350647_89fc28d241a5276b843d.jpg');

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
  MODIFY `id_datang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kelahiran`
--
ALTER TABLE `kelahiran`
  MODIFY `id_kelahiran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kematian`
--
ALTER TABLE `kematian`
  MODIFY `id_meninggal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `keterangan`
--
ALTER TABLE `keterangan`
  MODIFY `id_keterangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pemohon`
--
ALTER TABLE `pemohon`
  MODIFY `id_pemohon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pengantar`
--
ALTER TABLE `pengantar`
  MODIFY `id_pengantar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pindah`
--
ALTER TABLE `pindah`
  MODIFY `id_pindah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
