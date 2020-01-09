-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2020 at 08:06 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticflip`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_checkout`
--

CREATE TABLE `tb_checkout` (
  `id_checkout` char(5) NOT NULL,
  `id_tiket` char(5) DEFAULT NULL,
  `id_tour` char(5) DEFAULT NULL,
  `username` varchar(12) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `total` int(20) NOT NULL,
  `tanggal` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `penginapan` varchar(255) NOT NULL,
  `kendaraan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_checkout`
--

INSERT INTO `tb_checkout` (`id_checkout`, `id_tiket`, `id_tour`, `username`, `jumlah`, `total`, `tanggal`, `status`, `penginapan`, `kendaraan`) VALUES
('OR001', 'TC001', NULL, 'budiawan', 5, 60000, '2019-12-03', 1, '', ''),
('OR002', 'TC004', NULL, 'anwar', 6, 600000, '2019-12-03', 1, '', ''),
('OR005', 'TC003', NULL, 'budiawan', 1, 48000, '2019-12-06', 1, '', ''),
('OR006', 'TC002', NULL, 'anwar', 1, 25000, '2020-01-02', 1, '', ''),
('OR077', NULL, 'TR002', 'pambudi', 10, 2850000, '2020-01-08', 1, 'Hotel Wisma Sakinah', 'Innova'),
('OR078', NULL, 'TR002', 'pambudi', 10, 2422500, '2020-01-08', 1, 'Hotel Wisma Sakinah', 'Innova'),
('OR079', NULL, 'TR003', 'pambudi', 10, 3000000, '2020-01-11', 1, 'Red Doorz Hotel', 'Toyota Hiace'),
('OR080', 'TC002', NULL, 'laily', 3, 63750, '2020-01-16', 1, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_count`
--

CREATE TABLE `tb_count` (
  `id` int(3) NOT NULL,
  `count` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_count`
--

INSERT INTO `tb_count` (`id`, `count`) VALUES
(1, 212);

-- --------------------------------------------------------

--
-- Table structure for table `tb_detailcheckout`
--

CREATE TABLE `tb_detailcheckout` (
  `id_checkout` char(5) CHARACTER SET latin1 NOT NULL,
  `id_tiket` char(5) CHARACTER SET latin1 DEFAULT NULL,
  `id_tour` char(5) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_detailcheckout`
--

INSERT INTO `tb_detailcheckout` (`id_checkout`, `id_tiket`, `id_tour`) VALUES
('OR001', 'TC001', NULL),
('OR001', 'TC002', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kendaraan`
--

CREATE TABLE `tb_kendaraan` (
  `id_kendaraan` char(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tipe` varchar(25) NOT NULL,
  `status` int(1) NOT NULL,
  `harga` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kendaraan`
--

INSERT INTO `tb_kendaraan` (`id_kendaraan`, `nama`, `tipe`, `status`, `harga`) VALUES
('KD001', 'Daihatsu Ayla', 'mobil', 1, 200000),
('KD002', 'Innova', 'mobil', 1, 210000),
('KD003', 'Toyota Hiace', 'mobil', 1, 350000),
('KD004', 'Jetbus 2', 'bus', 0, 400000),
('KD005', 'Toyota Avanza', 'mobil', 1, 250000),
('KD006', 'Suzuki APV', 'semi-bus', 0, 270000),
('KD007', 'Jeep', 'jeep', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembayaran`
--

CREATE TABLE `tb_pembayaran` (
  `id_pembayaran` char(5) NOT NULL,
  `id_checkout` char(5) NOT NULL,
  `username` varchar(12) NOT NULL,
  `id_item` char(5) NOT NULL,
  `item` varchar(25) NOT NULL,
  `metode` varchar(25) NOT NULL,
  `tanggal` date NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `status` varchar(15) NOT NULL,
  `konfirmasi` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pembayaran`
--

INSERT INTO `tb_pembayaran` (`id_pembayaran`, `id_checkout`, `username`, `id_item`, `item`, `metode`, `tanggal`, `barcode`, `status`, `konfirmasi`) VALUES
('PB003', 'OR001', 'budiawan', 'TC002', 'Taman Pintar', 'Gopay', '2019-12-16', 'das', 'lunas', 1),
('PB004', 'OR001', 'budiawan', 'TC001', 'Taman Pintar', 'BNI', '2019-12-16', 'das', 'lunas', 1),
('PB005', 'OR001', 'budiawan', 'TC001', 'Taman Pintar', 'Gopay', '2019-12-16', 'das', 'lunas', 1),
('PB006', 'OR002', 'anwar', 'TC004', 'Museum 3D De Mata & De Ar', 'Gopay', '2019-12-16', 'das', 'lunas', 1),
('PB007', 'OR078', 'pambudi', 'TR002', 'Historical Trip', 'bni', '2020-01-07', 'das', 'lunas', 1),
('PB008', 'OR079', 'pambudi', 'TR003', 'Beach Trip', 'gopay', '2020-01-07', 'das', 'lunas', 1),
('PB009', 'OR080', 'laily', 'TC002', 'Kebun Binatang Gembira Lo', 'bri', '2020-01-09', 'das', 'lunas', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penginapan`
--

CREATE TABLE `tb_penginapan` (
  `id_penginapan` char(5) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `deskripsi` varchar(2048) NOT NULL,
  `harga` int(12) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_penginapan`
--

INSERT INTO `tb_penginapan` (`id_penginapan`, `nama`, `deskripsi`, `harga`, `status`) VALUES
('PG001', 'Kona Backpacker Room', 'Penginapan Murah dan Nyaman', 60000, 1),
('PG002', 'Red Doorz Hotel', 'Nyaman dan Aman', 130000, 1),
('PG003', 'Hotel Wisma Sakinah', 'Pilihan yang tepat', 135000, 1),
('PG004', 'Mashbrow Hotel', 'Cocok untuk kamu', 140000, 1),
('PG005', 'Villa kepodang', 'Vila yang sejuk dan aman', 120000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_promo`
--

CREATE TABLE `tb_promo` (
  `id_promo` varchar(12) NOT NULL,
  `diskon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_promo`
--

INSERT INTO `tb_promo` (`id_promo`, `diskon`) VALUES
('ticflipaja', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tb_rating`
--

CREATE TABLE `tb_rating` (
  `username` varchar(12) CHARACTER SET latin1 NOT NULL,
  `id_tiket` char(5) CHARACTER SET latin1 DEFAULT NULL,
  `id_tour` char(5) CHARACTER SET latin1 DEFAULT NULL,
  `rate` int(1) NOT NULL,
  `comments` varchar(255) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_rating`
--

INSERT INTO `tb_rating` (`username`, `id_tiket`, `id_tour`, `rate`, `comments`) VALUES
('budiawan', 'TC001', NULL, 3, 'asd'),
('mulyadi', 'TC001', NULL, 4, 'asd'),
('anwar', 'TC002', NULL, 2, 'noob'),
('dodit', 'TC002', NULL, 5, 'gud kok'),
('budiawan', NULL, 'TR001', 3, 'hmm'),
('mulyadi', NULL, 'TR002', 5, 'wow'),
('budiawan', 'TC002', NULL, 2, NULL),
('anwar', 'TC004', NULL, 4, NULL),
('budiawan', 'TC004', NULL, 5, NULL),
('budiawan', NULL, 'TR003', 4, NULL),
('iqbal', 'TC003', NULL, 5, NULL),
('iqbal', NULL, 'TR004', 5, NULL),
('iqbal', NULL, 'TR004', 4, NULL),
('anwar', 'TC004', NULL, 4, NULL),
('iqbal', 'TC006', NULL, 3, NULL),
('pambudi', 'TC005', NULL, 4, NULL),
('pambudi', NULL, 'TR003', 5, NULL),
('laila', NULL, 'TR001', 4, NULL),
('laily', 'TC002', NULL, 4, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_saran`
--

CREATE TABLE `tb_saran` (
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `saran` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_saran`
--

INSERT INTO `tb_saran` (`nama`, `email`, `telp`, `saran`) VALUES
('iqbal', 'iqbal.pambudi@gmail.com', '085655638843', 'guud'),
('yogyakarta', 'bcmanado@gmail.com', '085655638843', 'asd'),
('laily', 'laily@gmail.com', '876333333', 'bagus bro');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tiket`
--

CREATE TABLE `tb_tiket` (
  `id_tiket` char(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` varchar(2048) NOT NULL,
  `harga` int(25) NOT NULL,
  `foto` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tiket`
--

INSERT INTO `tb_tiket` (`id_tiket`, `nama`, `deskripsi`, `harga`, `foto`) VALUES
('TC001', 'Taman Pintar Yogyakarta', 'Taman Pintar Yogyakarta adalah wahana wisata yang terdapat di pusat Kota Yogyakarta, tepatnya di Jalan Panembahan Senopati No. 1-3, Yogyakarta, di kawasan Benteng Vredeburg. Taman ini memadukan tempat wisata rekreasi maupun edukasi dalam satu lokasi.', 12000, '2511619.png'),
('TC002', 'Kebun Binatang Gembira Loka', 'Kebun Binatang Gembira Loka adalah kebun binatang yang berada di Yogyakarta. Berisi berbagai macam spesies dari belahan dunia, seperti orangutan, gajah asia, simpanse, harimau, dan lain sebagainya. Kebun Binatang Gembira Loka menjadi daya tarik tersendiri bagi para wisatawan Yogyakarta', 25000, 'gembiraloka.jpg'),
('TC003', 'Jogja Bay', 'Kawasan ini dibangun diatas tanah milik kas daerah maguwoharjo. Dengan luas kurang lebih 7,7 ha. Kurang lebih ada 19 wahana permainan yang bisa dinikmati oleh Sobat Native. Banyak wisatawan berkata bila Jogja bay adalah waterpark tercanggih dan terlengkap di Indonesia dengan Tema Bajak laut.', 60000, 'jogjabay.jpeg'),
('TC004', 'Museum 3D De Mata & De Arca', 'Museum dengan patung lilin yang sangat mirip dengan artis, politisi & karakter film internasional.', 100000, 'demata.jpg'),
('TC005', 'Taman Pelangi', 'Taman Pelangi Yogyakarta merupakan tempat wisata malam yang menampilkan warna-warni lampu lampion, sehingga terlihat seperti pelangi. Taman wisata ini terletak di Jalan Padjajaran, dan berada di lokasi Museum Monumen Yogya Kembali Yogyakarta', 15000, 'tamanpelangi.jpg'),
('TC006', 'Tiket Prambanan', 'Prambanan adalah candi Hindu terbesar dan termegah yang pernah dibangun di Jawa kuno, pembangunan candi Hindu kerajaan ini dimulai oleh Rakai Pikatan sebagai tandingan candi Buddha Borobudur dan juga candi Sewu yang terletak tak jauh dari Prambanan.', 30000, 'prambanan.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tour`
--

CREATE TABLE `tb_tour` (
  `id_tour` char(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` varchar(2048) NOT NULL,
  `fasilitas` varchar(500) NOT NULL,
  `harga` int(100) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `tgl_pulang` date NOT NULL,
  `foto` varchar(700) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tour`
--

INSERT INTO `tb_tour` (`id_tour`, `nama`, `deskripsi`, `fasilitas`, `harga`, `tgl_berangkat`, `tgl_pulang`, `foto`) VALUES
('TR001', 'Lava Tour Merapi Joga', 'Paket wisata ini disediakan bagi group yang menginginkan wisata sejarah. Rombongan akan diantar ke Candi Borobudur yang merupakan peninggalan Dinasti Syailendra. Setelah mengagumi kemegahan Borobudur, tour akan dilanjutkan dengan aktivitas Lava Tour. Menjelajahi lereng Gunung Merapi menggunakan Jeep dengan rute off road tentunya akan memacu semangat Anda kembali. Tak lupa Anda akan melihat langsung saksi sejarah ganasnya letusan Gunung Merapi tahun 2010 di Museum Sisa Hartaku yang dahulunya merupakan rumah juru kunci Merapi, Mbah Maridjan. Sehabis berlelah-leleh, Anda dan rombongan akan diajak untuk menikmati syahdunya Yogyakarta pada malam hari di Malioboro. Disini Anda dapat melakukan wisata belanja atau sekedar duduk santai menikmati suasana.', 'Bus pariwisata,Drop in dan drop off di Yogyakarta,Tiket masuk,Air mineral,Makan siang,Jeep Lava Tour,Dokumentasi Ekslusif,Asuransi Perjalanan', 360000, '2019-12-06', '2019-12-08', 'lavatour.jpg'),
('TR002', 'Historical Trip', 'Paket wisata group yang satu ini bisa dikatakan paket wisata santai untuk menghabiskan agenda rapat atau event kantor anda di Jogja pada hari terakhir atau disela-sela agenda, anda dan rombongan akan kami ajak berkunjung ke Kraton Yogyakarta yang merupakan janytung kerajaan Yogyakarta dan sekaligus kediaman sultan dan keluarga, setelah itu anda akan mengunjungi Candi Prambanan yang sudah sangat terkenal, terakhir anda akan kami ajak naik bukit untuk mengunjungi Tebing Breksi, belum begitu lama namun daya tariknya sangat tinggi sehingga wisatawan yang berkunjung sangat banyak ke tempat ini.', 'Bus pariwisata AC seat 2-2,Tour Guide Profesional,Parkir,Drop in dan drop off (Terminal/ Bandara/ Stasiun/ Hotel) di Yogyakarta,Tiket masuk destinasi sesuai program,Air mineral,Makan siang,Shuttle menuju Keraton,Dokumentasi Ekslusif (Foto & Video),Asuransi perjalanan', 285000, '2019-12-04', '2019-12-09', 'borobudur.jpg'),
('TR003', 'Beach Trip', 'Di Pantai Sadranan Anda bisa melakukan snorkeling,canoeing, bahkan melihat ikan hias yang berenang di sela-sela karang ketika air surut tanpa harus menyelam. Pantai ini juga cocok bagi keluarga dengan anak kecil karena sembari menunggu anak Anda bermain air dan menangkap ikan, Anda bisa bersantai di bale-bale yang disewakan. Selanjutnya Anda akan kami ajak ke Hutan Pinus Pengger untuk menghirup udara segar dan melihat pemandangan Kota Yogyakarta dari ketinggian. Selanjutnya Anda akan kami ajak untuk mengisi perut menikmati senja di Manglung dan melihat hamparan kilauan cahaya lampu dari kota Yogyakarta di malam hari.', 'Kendaraan AC standar pariwisata,Tour Guide Profesional,Parkir,Drop in dan drop off (Terminal/ Bandara/ Stasiun/ Hotel) di Yogyakarta,Tiket masuk destinasi sesuai jadwal,Air mineral,Makan siang,Special dinner di The Manglung,Dokumentasi Ekslusif (Foto & Video),Asuransi perjalanan', 300000, '2019-12-16', '2019-12-17', 'pantai.jpg'),
('TR004', 'Outbound & Adventure', 'Paket outbound ini kami desain untuk Anda yang menginginkan suasana yang damai jauh dari hiruk pikuk kota. Outbound akan dilaksanakan di desa wisata dengan suasana yang asri dan udara yang sejuk serta terdapat aliran sungai dengan air yang jernih dan segar, selain fun games anda akan diajak untuk menyusuri sungai alammi yang ada di desa wisata tersebut. Setelah puas bersenang-senang anda akan kami ajak menuju Lava Tour untuk menguji adrenalin peserta dengan mengendarai mobil Jeep dengan rute yang menantang.', 'Bus pariwisata,Tour Guide Profesional,Parkir,Drop in dan drop off,Tiket masuk destinasi sesuai jadwal,Air mineral,Makan siang,Jeep Lava Tour rute medium + track air,Dokumentasi Ekslusif (Foto & Video),Asuransi perjalanan', 390000, '2019-12-18', '2019-12-19', 'cave_tubing.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(12) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `poin` int(4) DEFAULT NULL,
  `role` varchar(10) NOT NULL,
  `baned` enum('N','Y') NOT NULL,
  `logintime` int(5) NOT NULL,
  `foto` varchar(250) NOT NULL,
  `telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`username`, `nama`, `password`, `email`, `alamat`, `poin`, `role`, `baned`, `logintime`, `foto`, `telepon`) VALUES
('anwar', 'anwar', 'anwar', 'anwar@hotmail.com', 'Jl. Magelang, Sleman, Yogyakarta', 35, 'user', 'N', 0, 'fluid-elements-template-13-.jpg', '08777777'),
('asd', 'asd', 'asd', 'asd@asd.com', '', 0, 'user', 'N', 0, '', ''),
('budiawan', 'Budi', 'budiawan', 'budiawan@gmail.com', 'Yogyakarta', 300, 'user', 'N', 0, 'IMG_1777.JPG', ''),
('daffa', 'daffa', '123', 'daffa@daffa.co', 'joja', 0, 'user', 'N', 0, '2511619.png', '0812345678'),
('dodit', 'Dodit Mul', 'dodit', 'dodit@dodit.com', 'Bantul, Yogyakarta', 2, 'user', 'N', 0, '', ''),
('iqbal', 'iqbal r', 'dsa', 'iqbalrpambudi@gmail.com', 'Solo', 70, 'admin', 'N', 0, 'Screenshot_56.png', '085655638843'),
('laily', 'laily', '124', 'laily@gmail.com', 'Sleman', 10, 'user', 'N', 0, '2511619.png', '08988888'),
('pambudi', 'Iqbal', '123', 'iqbal@gmail.com', 'Sleman', 40, 'user', 'N', 0, 'linux-2025536_960_720.png', '087');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_checkout`
--
ALTER TABLE `tb_checkout`
  ADD PRIMARY KEY (`id_checkout`),
  ADD KEY `id_tiket` (`id_tiket`),
  ADD KEY `id_tour` (`id_tour`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `tb_detailcheckout`
--
ALTER TABLE `tb_detailcheckout`
  ADD KEY `id_checkout` (`id_checkout`),
  ADD KEY `id_tiket` (`id_tiket`),
  ADD KEY `id_tour` (`id_tour`);

--
-- Indexes for table `tb_kendaraan`
--
ALTER TABLE `tb_kendaraan`
  ADD PRIMARY KEY (`id_kendaraan`);

--
-- Indexes for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_checkout` (`id_checkout`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `tb_penginapan`
--
ALTER TABLE `tb_penginapan`
  ADD PRIMARY KEY (`id_penginapan`);

--
-- Indexes for table `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD KEY `tb_rating_ibfk_1` (`id_tiket`),
  ADD KEY `tb_rating_ibfk_2` (`id_tour`);

--
-- Indexes for table `tb_tiket`
--
ALTER TABLE `tb_tiket`
  ADD PRIMARY KEY (`id_tiket`);

--
-- Indexes for table `tb_tour`
--
ALTER TABLE `tb_tour`
  ADD PRIMARY KEY (`id_tour`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`username`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_checkout`
--
ALTER TABLE `tb_checkout`
  ADD CONSTRAINT `tb_checkout_ibfk_1` FOREIGN KEY (`id_tiket`) REFERENCES `tb_tiket` (`id_tiket`),
  ADD CONSTRAINT `tb_checkout_ibfk_2` FOREIGN KEY (`id_tour`) REFERENCES `tb_tour` (`id_tour`),
  ADD CONSTRAINT `tb_checkout_ibfk_3` FOREIGN KEY (`username`) REFERENCES `tb_user` (`username`);

--
-- Constraints for table `tb_detailcheckout`
--
ALTER TABLE `tb_detailcheckout`
  ADD CONSTRAINT `tb_detailcheckout_ibfk_1` FOREIGN KEY (`id_checkout`) REFERENCES `tb_checkout` (`id_checkout`),
  ADD CONSTRAINT `tb_detailcheckout_ibfk_2` FOREIGN KEY (`id_tiket`) REFERENCES `tb_tiket` (`id_tiket`),
  ADD CONSTRAINT `tb_detailcheckout_ibfk_3` FOREIGN KEY (`id_tour`) REFERENCES `tb_tour` (`id_tour`);

--
-- Constraints for table `tb_pembayaran`
--
ALTER TABLE `tb_pembayaran`
  ADD CONSTRAINT `tb_pembayaran_ibfk_1` FOREIGN KEY (`id_checkout`) REFERENCES `tb_checkout` (`id_checkout`),
  ADD CONSTRAINT `tb_pembayaran_ibfk_2` FOREIGN KEY (`username`) REFERENCES `tb_user` (`username`);

--
-- Constraints for table `tb_rating`
--
ALTER TABLE `tb_rating`
  ADD CONSTRAINT `tb_rating_ibfk_1` FOREIGN KEY (`id_tiket`) REFERENCES `tb_tiket` (`id_tiket`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `tb_rating_ibfk_2` FOREIGN KEY (`id_tour`) REFERENCES `tb_tour` (`id_tour`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
