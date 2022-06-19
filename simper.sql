-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2020 at 12:06 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simper`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tgl_absen` date NOT NULL,
  `status_absen` varchar(10) NOT NULL,
  `keterangan` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id`, `id_karyawan`, `tgl_absen`, `status_absen`, `keterangan`) VALUES
(11, 7, '2020-06-03', 'hadir', 'hadir'),
(12, 6, '2020-06-03', 'izin', 'Saya izin.'),
(13, 8, '2020-06-03', 'sakit', 'Saya sakit.'),
(14, 6, '2020-06-04', 'hadir', 'hadir');

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tgl_awal_cuti` date NOT NULL,
  `jumlah_cuti` int(11) NOT NULL,
  `subjek_cuti` varchar(100) NOT NULL,
  `keterangan_cuti` varchar(200) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id`, `id_karyawan`, `tgl_awal_cuti`, `jumlah_cuti`, `subjek_cuti`, `keterangan_cuti`, `status`) VALUES
(10, 7, '2020-06-15', 5, 'Ujian Semester', 'Mohon izin cuti untuk 5 Hari kedepan, dikarenakan adanya ujian semester di perkuliahan. terima kasih.', 'approved'),
(11, 8, '2020-06-17', 3, 'Menikah', 'Mohon izin cuti, dikarenakan saya mengadakan \r\npesta pernikahan.', 'rejected'),
(12, 7, '2020-06-22', 5, 'Ujian Semester 2', 'Hallo pak, saya mohon izin cuti lagi, selama 5 Hari. dikarenakan ada ujian semester ke-2 pak.. jadi mohon izinnya,, terima kasih.', 'rejected'),
(13, 8, '2020-06-08', 5, 'Sakit Hati', 'Mohon izin cuti untuk 5 hari kedepan dikarenakan saya terkena sakit hati.', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `jabatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `jabatan`) VALUES
(3, 'Leader'),
(5, 'Karyawan');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(11) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `jatah_cuti` int(11) NOT NULL,
  `tgl_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `nik`, `nama`, `username`, `password`, `jabatan`, `status`, `jatah_cuti`, `tgl_masuk`) VALUES
(6, '0154678124867522', 'Muhammad Azmi Fauzi', 'azmifauzy', '$2y$10$yGJ9.iS7cPxh2F6ssIu6uOFG5K3xNhdDlnj05Y6NorLD.5E53mhCi', 'Leader', 'tetap', 10, '2020-06-03'),
(7, '0154678124865522', 'Victor Fuentes', 'victor', '$2y$10$jw4Si39b1Byjt/ttuiOMM.9FzxpaYQqVp1vTGYs8vxdZZp5/3aVbS', 'Karyawan', 'kontrak', 5, '2020-06-03'),
(8, '0154266624867522', 'Mitch Lucker', 'mitch', '$2y$10$A1EMV70IPgRvn6oh2K6ykugXsWget/K/GlRcWPAp5ufncLlRN9PR.', 'Karyawan', 'tetap', 10, '2020-06-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cuti`
--
ALTER TABLE `cuti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
