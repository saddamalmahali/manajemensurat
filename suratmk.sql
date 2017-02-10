-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2017 at 01:05 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `suratmk`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_surat`
--

CREATE TABLE IF NOT EXISTS `jenis_surat` (
`kode_jenis` int(10) NOT NULL,
  `nama_jenis` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_surat`
--

INSERT INTO `jenis_surat` (`kode_jenis`, `nama_jenis`) VALUES
(1, 'Surat Undangan'),
(2, 'Surat Umum'),
(3, 'Surat Audiensi'),
(4, 'Surat Proposal'),
(5, 'Surat Keuangan'),
(6, 'Surat Radiogram'),
(8, 'Surat Perintah'),
(9, 'Surat Perjalanan Dinas'),
(10, 'Surat Tugas'),
(11, 'Surat Keterangan'),
(12, 'surat resmi');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE IF NOT EXISTS `pengguna` (
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `level` enum('admin','ketua','bidang','') NOT NULL,
  `aktif` varchar(5) NOT NULL,
  `name` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`username`, `password`, `level`, `aktif`, `name`) VALUES
('admin', 'admin', 'admin', 'Y', 'admin'),
('bidang', 'bidang', 'bidang', 'Y', 'bidang'),
('delima', '12345', 'admin', 'Y', 'Ratu Delima'),
('ketua', 'ketua', 'ketua', 'Y', 'ketua');

-- --------------------------------------------------------

--
-- Table structure for table `tb_agendabidang`
--

CREATE TABLE IF NOT EXISTS `tb_agendabidang` (
`kode_agenda` int(100) NOT NULL,
  `tgl_agenda` date NOT NULL,
  `bidang` varchar(50) NOT NULL,
  `perihal_agenda` text NOT NULL,
  `anggaran_agenda` varchar(225) NOT NULL,
  `ket_agenda` varchar(225) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_agendabidang`
--

INSERT INTO `tb_agendabidang` (`kode_agenda`, `tgl_agenda`, `bidang`, `perihal_agenda`, `anggaran_agenda`, `ket_agenda`, `tanggal`) VALUES
(1, '2017-01-10', 'bidang_ekonomi', 'haslfai', 'Rp. 12674821', 'ggfoa', '2017-01-11');

-- --------------------------------------------------------

--
-- Table structure for table `tb_disposisi`
--

CREATE TABLE IF NOT EXISTS `tb_disposisi` (
`indexd` int(50) NOT NULL,
  `tanggal_disposisi` date NOT NULL,
  `indexsm` int(100) NOT NULL,
  `kode_organisasi` int(10) NOT NULL,
  `sifat` varchar(100) NOT NULL,
  `tindakan` varchar(225) NOT NULL,
  `catatan` text NOT NULL,
  `update_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_disposisi`
--

INSERT INTO `tb_disposisi` (`indexd`, `tanggal_disposisi`, `indexsm`, `kode_organisasi`, `sifat`, `tindakan`, `catatan`, `update_on`) VALUES
(1, '2017-01-11', 1, 6, 'biasa', '', '', '2017-01-11 04:02:35'),
(2, '2017-01-23', 2, 3, 'biasa', 'hadiri', '', '2017-01-23 02:43:12');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pn`
--

CREATE TABLE IF NOT EXISTS `tb_pn` (
`id_pn` int(50) NOT NULL,
  `indexsk` int(100) NOT NULL,
  `nama_penerima` varchar(225) NOT NULL,
  `organisasi_penerima` varchar(225) NOT NULL,
  `tanggal_terima` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pn`
--

INSERT INTO `tb_pn` (`id_pn`, `indexsk`, `nama_penerima`, `organisasi_penerima`, `tanggal_terima`, `status`) VALUES
(2, 1, 'delima', 'sttg', '2017-01-31', 'terkirim');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sk`
--

CREATE TABLE IF NOT EXISTS `tb_sk` (
`indexsk` int(100) NOT NULL,
  `no_agendask` varchar(225) NOT NULL,
  `tanggal_sk` date NOT NULL,
  `kode_jenis` int(10) NOT NULL,
  `perihal_sk` text NOT NULL,
  `ket_sk` varchar(225) NOT NULL,
  `gambar_sk` varchar(225) NOT NULL,
  `update_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sk`
--

INSERT INTO `tb_sk` (`indexsk`, `no_agendask`, `tanggal_sk`, `kode_jenis`, `perihal_sk`, `ket_sk`, `gambar_sk`, `update_on`) VALUES
(1, '001/11/bappeda/2017', '2017-01-01', 1, 'sfakf.lea', 'reuigq.dj', '', '2017-01-18 09:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sm`
--

CREATE TABLE IF NOT EXISTS `tb_sm` (
`indexsm` int(100) NOT NULL,
  `no_agendasm` varchar(225) NOT NULL,
  `kode_jenis` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `pengirim` varchar(50) NOT NULL,
  `tgl_sm` date NOT NULL,
  `no_sm` varchar(225) NOT NULL,
  `perihal` text NOT NULL,
  `tgl_perihal` date NOT NULL,
  `tmptwkt_perihal` varchar(50) NOT NULL,
  `ringkasan` varchar(225) NOT NULL,
  `pengolah` varchar(25) NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `update_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sm`
--

INSERT INTO `tb_sm` (`indexsm`, `no_agendasm`, `kode_jenis`, `tanggal`, `pengirim`, `tgl_sm`, `no_sm`, `perihal`, `tgl_perihal`, `tmptwkt_perihal`, `ringkasan`, `pengolah`, `gambar`, `update_on`) VALUES
(1, '015/12/bappeda/2017', 1, '2017-01-11', 'ratu', '2017-01-09', '14/12/garut/2017', 'surat surat', '2017-01-14', 'garut, 10.00 WIB', 'djhhfk', 'hgkl', 'Screenshot_2016-10-06-06-42-38.png', '0000-00-00 00:00:00'),
(2, '016/', 2, '2017-01-23', 'hilmi', '2017-01-22', '125-01', 'undangan', '2017-01-25', 'alun alun garut', '', '', '2 dokter.PNG', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tujuandisposisi`
--

CREATE TABLE IF NOT EXISTS `tb_tujuandisposisi` (
`kode_organisasi` int(10) NOT NULL,
  `nama_organisasi` varchar(150) DEFAULT NULL,
  `kategori` varchar(80) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tujuandisposisi`
--

INSERT INTO `tb_tujuandisposisi` (`kode_organisasi`, `nama_organisasi`, `kategori`) VALUES
(1, 'Ketua Badan', 'Esselon II.b'),
(2, 'Sekertaris Badan', 'Esselon III.a'),
(3, 'Kabid Fisik', 'Esselon III.b'),
(4, 'Kabid Data Evaluasi dan Pelaporan', 'Esselon III.b'),
(5, 'Kabid Sosial Budaya', 'Esselon III.b'),
(6, 'Kabid Ekonomi', 'Esselon III.b'),
(7, 'Kabid Pemerintahan', 'Esselon III.b'),
(9, 'Kasubbag Keuangan', 'Esselon IV'),
(10, 'Kabid Penyusunan Rencana Kerja', 'Esselon IV'),
(11, 'Kasubbag', 'Esselon IV'),
(12, 'kabid kesekretariatan', 'esselon IV');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
 ADD PRIMARY KEY (`kode_jenis`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `tb_agendabidang`
--
ALTER TABLE `tb_agendabidang`
 ADD PRIMARY KEY (`kode_agenda`);

--
-- Indexes for table `tb_disposisi`
--
ALTER TABLE `tb_disposisi`
 ADD PRIMARY KEY (`indexd`);

--
-- Indexes for table `tb_pn`
--
ALTER TABLE `tb_pn`
 ADD PRIMARY KEY (`id_pn`);

--
-- Indexes for table `tb_sk`
--
ALTER TABLE `tb_sk`
 ADD PRIMARY KEY (`indexsk`);

--
-- Indexes for table `tb_sm`
--
ALTER TABLE `tb_sm`
 ADD PRIMARY KEY (`indexsm`);

--
-- Indexes for table `tb_tujuandisposisi`
--
ALTER TABLE `tb_tujuandisposisi`
 ADD PRIMARY KEY (`kode_organisasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_surat`
--
ALTER TABLE `jenis_surat`
MODIFY `kode_jenis` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tb_agendabidang`
--
ALTER TABLE `tb_agendabidang`
MODIFY `kode_agenda` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_disposisi`
--
ALTER TABLE `tb_disposisi`
MODIFY `indexd` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_pn`
--
ALTER TABLE `tb_pn`
MODIFY `id_pn` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_sk`
--
ALTER TABLE `tb_sk`
MODIFY `indexsk` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_sm`
--
ALTER TABLE `tb_sm`
MODIFY `indexsm` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_tujuandisposisi`
--
ALTER TABLE `tb_tujuandisposisi`
MODIFY `kode_organisasi` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
