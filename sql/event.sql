-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2016 at 02:08 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `session`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `nama_event` varchar(100) NOT NULL,
  `poster` blob,
  `deskripsi` varchar(10000) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `kontak` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `tanggal` varchar(50) NOT NULL,
  `tgl` date DEFAULT NULL,
  `status` enum('Valid','Rejected','in Confirmation') NOT NULL DEFAULT 'in Confirmation',
  `proposedby` varchar(50) NOT NULL,
  `view` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `nama_event`, `poster`, `deskripsi`, `harga`, `lokasi`, `kontak`, `website`, `kategori`, `tanggal`, `tgl`, `status`, `proposedby`, `view`) VALUES
(2, 'IFEST 2016', 0x69666573742e706e67, 'Informatics Festival 2016 atau yang biasa disingkat IFEST 2016, sudah hadir untuk yang kedua kalinya dalam 2 tahun terakhir ini. Sebuah Proker dari Departemen Humas. Secara keseluruhan rangkaian acara pada IFEST tahun ini tidak jauh berbeda dengan tahun kemarin hanya saja tahun ini, panitia IFEST mampu mendatangkan MOCCA dan Hivi dengan begitu acara penutupan IFEST terasa lebih spesial karena ada penampilan dari mereka.\r\n\r\nUntuk rangkaian acara pertama IFEST ada Ifest Futsal Competition 2016 untuk mahasiswa Teknik Informatika se-Bandung Raya. Setelah melewati hamper 3 minggu pertandingan Futsal, SI TELKOM 2 berhasil merebut juara 1, disusul oleh MI TELKOM 1 yang menjadi juara 2 dan juga Panji Ikhsan N sebagai Top Scorer dalam Ifest Futsal Competition 2016  kali ini.', 20000, 'Parkiran PPBS D Unpad', '0899', 'himatif.fmipa.unpad.ac.id', 'musik', '28 October, 2016', '2016-10-28', 'Valid', 'andreantaufik@live.com', 52),
(3, 'Blazture', 0x626c617a747572652e706e67, 'acara statistika', 50000, 'Parkiran PPBS D Unpad', '099909', '', 'musik', '25 November, 2016', '2016-11-25', 'in Confirmation', 'adaadaaja@gmail.com', 3),
(6, 'Makan Makan Komunitas Mahasiswa Semarang Unpad', NULL, 'Perkumpulan mahasiswa asal semarang atau demak atau sekitarnya, yo rek wes datang ke acara ini', 0, 'KFC Jatos', '090909', '-', 'Komunitas', '20 December, 2017', '2016-12-20', 'Valid', 'alvin.niza@gmail.com', 36),
(10, 'wadaw bayar', NULL, 'wadaw bayar', 13000, 'wadaw bayar', '121', '1', 'bayar', '20 January, 2017', '2017-01-20', 'in Confirmation', 'andreantaufik96@gmail.com', 3),
(13, 'SMILEMOTION 2016', 0x736d696c656d6f74696f6e2e706e67, 'Sebagian besar para penderita Celah Bibir dan Langit-langit menjadikan kekurangan mereka sebagai alasan untuk tidak percaya diri dan merasa berbeda dengan orang lain. Padahal banyak orang dengan keterbatasan fisik contohnya penderita Celah Bibir dan Langit-langit, namun dapat berprestasi dan menjadi inspirasi bagi orang lain. Hal ini yang mendorong kami membuat sebuah kampanye akbar yang dinamakan dengan SMILEMOTION.\r\nAnnual event yang diselenggarakan oleh FKG Unpad yang bekerja sama dengan Yayasan Pembina Penderita Celah Bibir dan Langit-Langit (YPPCBL)\r\n\r\nMelalui tema â€˜MOVEMENTâ€™ selain mengedukasi masyarakat mengenai apa itu penyakit celah bibir dan langit-langit, kami ingin menginspirasi masyarakat untuk berkarya dan membuat suatu gerakan positif melalui persembahan karya dari kami dan para penderita celah bibir dan langit-langit', 0, 'Sasana Budaya Ganesha', '628996126083', 'smilemotion.org', 'Music', '17 December, 2016', '2016-12-17', 'in Confirmation', 'alvin.niza@gmail.com', 5),
(14, 'IFFD 2016', 0x436f7665722d39303578313238302e6a7067, 'Merupakan dies natalis Himatif FMIPA Unpad. Acara tahunan ini .....', 25000, 'Bale Santika Unpad', '0999121', 'himatif.fmipa.unpad.ac.id', 'Dies Natalis', '22 November, 2016', '2016-11-22', 'Valid', 'andreantaufik@live.com', 9),
(15, 'Mail Unpad Community', NULL, 'Kumpul tentang ....... ', 0, 'Bale Sawala', '00009909', '', 'Komunitas', '20 January, 2017', '2017-01-20', 'Rejected', 'alvin.niza@gmail.com', 11),
(16, 'Marketown', 0x6d61726b65746f776e2e706e67, 'Ajang jual jualan makanan, clothing, dll.', 0, 'Unpad Jatinangor', '12121212112', '', 'Kuliner', '19 November, 2017', '2016-11-19', 'Valid', 'andreantaufik@live.com', 9),
(17, 'SMFans Community', 0x3430303435302e706e67, 'Komunitas SMFans Bandung', 135000, 'Istana Plaza', '000999090', 'satria-muda.com', 'Komunitas', '20 January, 2017', '2017-01-20', 'in Confirmation', 'andreantaufik@live.com', 3),
(20, 'Overwatch Blizzards Community', NULL, 'Perkumpulan pemain Overwatch indonesia', 75000, 'Grand Indonesia', '1212121', '', 'Games', '28 December, 2016', '2016-12-28', 'in Confirmation', 'alvin.niza@gmail.com', 0),
(22, 'Troops Unpad', 0x74726f6f70732e706e67, 'troops unpad, psikologi 3x3', 195000, 'GOR C-TRA Arena', '0998980890', '', 'Olahraga', '25 November, 2016', '2016-11-25', 'in Confirmation', 'andreantaufik@live.com', 0),
(23, 'FK Unpad Fair', 0x666b756e706164666169722e706e67, 'FK Unpad Fair adalah .......', 150000, 'Sabuga', '0909090909', '', 'Musik', '3 December, 2016', '2016-12-03', 'Rejected', 'andreantaufik@live.com', 1),
(24, 'OOTRAD', 0x6f6f747261642e706e67, '..... OOTRAD ntaps', 25000, 'Unpad Jatinangor', '08989898', '', 'Lomba', '29 December, 2016', NULL, 'Valid', 'alvin.niza@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
