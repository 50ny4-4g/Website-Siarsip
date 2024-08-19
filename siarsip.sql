-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2024 at 01:09 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siarsip`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_arsip`
--

CREATE TABLE `tb_arsip` (
  `id_arsip` varchar(11) NOT NULL,
  `id_lemari` varchar(11) NOT NULL,
  `id_kegiatan` varchar(11) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `nm_berkas` varchar(30) NOT NULL,
  `tgl_arsip` date NOT NULL,
  `file` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_arsip`
--

INSERT INTO `tb_arsip` (`id_arsip`, `id_lemari`, `id_kegiatan`, `no_surat`, `nm_berkas`, `tgl_arsip`, `file`) VALUES
('2305350767', '904', '9324685876', '23.198', 'PT Surya Hanmesnus Perkasa', '2023-11-05', 'file_66b433460ddc75.90048660.pdf'),
('2712299656', '747', '0566835390', '23.206', 'Dapur Rika', '2023-10-16', 'file_66b4330ca402f9.91884064.pdf'),
('3282904818', '306', '2487593648', '23.196', 'Zrosee', '2023-10-04', 'file_66b4313e75fee1.83280837.pdf'),
('3497069592', '905', '2277787616', '23.223', 'Ice Cup Indonesia', '2023-11-09', 'file_66b432607a7db4.00557928.pdf'),
('4108771700', '185', '0540236079', '23.1944', 'LPD CV. Satu Wahana Jaya Sento', '2024-08-07', 'file_66b328b7892ae9.94829918.pdf'),
('4209884011', '306', '9753187341', '23.229', 'Momtsaka', '2023-11-14', 'file_66b4317c273170.81720979.pdf'),
('4825645341', '904', '2617388884', '23.226', 'Bola-Bola Ayam Najiha', '2023-11-13', 'file_66b431b9ae53c4.29516646.pdf'),
('5167585216', '355', '3965653551', '23.221', 'CV. Kembar Cemerlang Abadi', '2023-11-06', 'file_66b4329fa61029.19918807.pdf'),
('6034608881', '185', '9068921963', '23.194', 'Dapur Az-Zahra Cake And Drink', '2023-10-02', 'file_66b433e5013bc2.94118810.pdf'),
('6733327606', '747', '2657982702', '23.209', 'Emak CW', '2023-10-17', 'file_66b432d483ea62.85559015.pdf'),
('7144004760', '407', '0952997946', '23.231', 'PT Sagu Riau Maju Jaya', '2023-11-22', 'file_66b430f154d577.66410900.pdf'),
('7628844612', '904', '2233185890', '23.224', 'PT Enseval Putera Megatrading', '2023-11-09', 'file_66b4321298da62.07609479.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_galeri`
--

CREATE TABLE `tb_galeri` (
  `id_galeri` varchar(11) NOT NULL,
  `id_kegiatan` varchar(11) NOT NULL,
  `file` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_galeri`
--

INSERT INTO `tb_galeri` (`id_galeri`, `id_kegiatan`, `file`) VALUES
('0009928774', '9324685876', 'file_66b43f90e27e80.09203125.jpg'),
('0495223235', '3965653551', 'file_66b43f579f1c63.51369942.jpg'),
('0825952596', '2657982702', 'file_66b4407fd200c8.70003197.jpeg'),
('1478719537', '2233185890', 'file_66b43b7c218765.47595028.jpg'),
('1680326645', '9324685876', 'file_66b43f893fb156.44930434.jpg'),
('2286186877', '0566835390', 'file_66b4388f61a4b5.17395596.jpeg'),
('2309049996', '2233185890', 'file_66b43b6d478925.07156005.jpg'),
('3065150483', '0566835390', 'file_66b43831f1d005.53870781.jpeg'),
('3827670635', '2233185890', 'file_66b43b56ae08b3.20611930.jpg'),
('4432967621', '9324685876', 'file_66b43fa2954220.84385748.jpg'),
('5011668225', '0566835390', 'file_66b32824230827.55630223.jpeg'),
('7029801326', '2617388884', 'file_66b4410154c182.28190197.jpeg'),
('8487661824', '9324685876', 'file_66b43f81720b67.48062468.jpg'),
('8528878468', '0566835390', 'file_66b4383e8ebc49.90975168.jpeg'),
('8835371126', '9324685876', 'file_66b43f9a6b2359.30648878.jpg'),
('9122881110', '2617388884', 'file_66b4410ac46fd1.04757987.jpeg'),
('9373255380', '3965653551', 'file_66b43f5ee3b8c6.06092803.jpg'),
('9902113575', '2487593648', 'file_66b4405c771f89.35002309.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kegiatan`
--

CREATE TABLE `tb_kegiatan` (
  `id_kegiatan` varchar(11) NOT NULL,
  `judul_kegiatan` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `tgl_kegiatan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kegiatan`
--

INSERT INTO `tb_kegiatan` (`id_kegiatan`, `judul_kegiatan`, `deskripsi`, `tgl_kegiatan`) VALUES
('0566835390', 'Dapur Rika', ' Melakukan pemeriksaan sarana bangunan', '2024-07-30'),
('0952997946', 'PT Sagu Riau Maju Jaya', ' Melakukan audit sarana IP CPPOB', '2023-11-23'),
('2233185890', 'PT Enseval Putera Megatrading', ' Melakukan audit denah', '2023-11-09'),
('2277787616', 'Ice Cup Indonesia', ' Melakukan pembinaan', '2023-11-06'),
('2487593648', 'Zrosee', ' Melakukan pemeriksaan bangunan', '2024-08-01'),
('2617388884', 'Bola-bola Ayam Najiha', ' Melakukan audit sarana', '2023-11-13'),
('2657982702', 'Emak CW', ' Melakukan audit sarana', '2023-10-17'),
('3965653551', 'CV. Kembar Cemerlang Abadi', ' Melakukan pembinaan', '2023-11-06'),
('9068921963', 'Dapur Az-zahra Cake and Drink', ' Melakukan pemeriksaan bangunan', '2024-08-07'),
('9324685876', 'PT Surya Hanmensus Perkasa', ' Melakukan audit lay out denah gudang', '2024-08-05'),
('9753187341', 'Momtsaka', ' Melakukan pembinaan UMKM', '2023-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `tb_lemari`
--

CREATE TABLE `tb_lemari` (
  `id_lemari` varchar(11) NOT NULL,
  `nama_lemari` varchar(20) NOT NULL,
  `jenis_dokumen` varchar(20) NOT NULL,
  `rak` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_lemari`
--

INSERT INTO `tb_lemari` (`id_lemari`, `nama_lemari`, `jenis_dokumen`, `rak`) VALUES
('050', 'lemari-2', 'IP CPPOB', 'Rak-5'),
('185', 'lemari-2', 'PSB', 'Rak-1'),
('214', 'lemari-1', 'Audit Sarana', 'Rak-1'),
('306', 'lemari-1', 'Pembinaan', 'Rak-3'),
('355', 'lemari-1', 'Pembinaan', 'Rak-5'),
('407', 'lemari-2', 'IP CPPOB', 'Rak-4'),
('747', 'lemari-2', 'PSB', 'Rak-3'),
('828', 'lemari-2', 'PSB', 'Rak-2'),
('904', 'lemari-1', 'Audit Sarana', 'Rak-2'),
('905', 'lemari-1', 'Pembinaan', 'Rak-4');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `level` enum('Administrator','Pegawai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(1, 'Ahmad Munfarriih', 'admin', 'admin', 'Administrator'),
(3, 'Andrizal', 'andi', '123456', 'Pegawai');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_arsip`
--
ALTER TABLE `tb_arsip`
  ADD PRIMARY KEY (`id_arsip`);

--
-- Indexes for table `tb_galeri`
--
ALTER TABLE `tb_galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `tb_lemari`
--
ALTER TABLE `tb_lemari`
  ADD PRIMARY KEY (`id_lemari`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
