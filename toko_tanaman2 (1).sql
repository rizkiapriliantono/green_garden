-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2021 at 09:55 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_tanaman2`
--

-- --------------------------------------------------------

--
-- Table structure for table `adm`
--

CREATE TABLE `adm` (
  `id_admin` int(5) NOT NULL,
  `username` varchar(25) NOT NULL,
  `pass` varchar(25) NOT NULL,
  `nama_lengkap` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adm`
--

INSERT INTO `adm` (`id_admin`, `username`, `pass`, `nama_lengkap`) VALUES
(1, 'admin', 'admin1', 'admin1');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_produk` int(5) NOT NULL,
  `images` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id`, `id_produk`, `images`) VALUES
(1, 13, 'algonema1.png'),
(2, 13, 'aglonema2.png'),
(3, 13, 'aglonema3.png'),
(20, 11, 'bonsai1.png'),
(23, 12, 'janda bolong.png'),
(24, 12, 'jandabolong2.png'),
(25, 12, 'janda3.png'),
(29, 0, 'ban2.JPG'),
(30, 11, 'bonsai2.png'),
(33, 11, 'bonsai3.png');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `kategori` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`) VALUES
(1, 'Umum'),
(2, 'Hias'),
(3, 'tanaman');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(3) NOT NULL,
  `nama_kota` varchar(50) NOT NULL,
  `tarif` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Jakarta', 10000),
(2, 'Bandung', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(5) NOT NULL,
  `email_pelanggan` varchar(30) NOT NULL,
  `password_pelanggan` varchar(255) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `telpon_pelanggan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telpon_pelanggan`) VALUES
(1, 'rizkiapriliantono@gmail.com', '9592638716b04b52fe6e041429822a79', 'user_coba', '08221344212342'),
(2, 'jiboy1444@gmail.com', '', 'Jiboy 14', ''),
(3, 'octaviona29@gmail.com', '', 'Octaviona Cahya', ''),
(4, 'jjiboy14@gmail.com', '', 'Jijiboy 14', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(5) NOT NULL,
  `id_pembelian` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `bank` varchar(30) NOT NULL,
  `jumlah` varchar(15) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(1, 1, 'user_coba', 'BCA', '10000', '2021-01-13', 'tes'),
(2, 18, 'user_coba', 'BCA', '1000000', '2021-01-13', ''),
(3, 19, 'user_coba', 'Mandiri Syariah', '2000000', '2021-02-02', 'index.png'),
(6, 18, 'Rizki Apriliantono', 'Bank NTT', 'Rp. 152.000', '2021-02-09', '20210209114439'),
(7, 17, 'Bunga Keladi', 'Bank Mega', 'Rp. 142.000', '2021-02-09', '20210209115300ban2.JPG'),
(8, 19, 'Rizki Apriliantono', 'Bank Permata', 'Rp. 142.000', '2021-02-09', '20210209120506vespa1.png'),
(9, 36, 'Rizki Apriliantono', 'Bank Mandiri', 'Rp. 1.100.000', '2021-04-03', '20210403181558janda bolong.jpeg'),
(10, 37, 'Rizki Apriliantono', 'Panin Bank', 'Rp. 1.120.000', '2021-04-13', '20210413175432janda bolong.jpeg'),
(11, 45, 'Rizki Apriliantono', 'Bank Maybank', 'Rp. 130.000', '2021-04-26', '20210426161308login.png');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(5) NOT NULL,
  `id_pelanggan` int(5) NOT NULL,
  `id_ongkir` int(5) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `kode_pos` int(7) NOT NULL,
  `tarif` int(5) NOT NULL,
  `alamat_pengiriman` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `telpon` varchar(20) NOT NULL,
  `status_pembelian` varchar(20) NOT NULL DEFAULT 'PENDING',
  `resi_pengiriman` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `kode_pos`, `tarif`, `alamat_pengiriman`, `email`, `telpon`, `status_pembelian`, `resi_pengiriman`) VALUES
(1, 2, 1, '2021-05-03', 130000, 'Jakarta', 123344, 10000, 'lereng ciputat', '', '', 'PENDING', ''),
(2, 2, 2, '2021-05-03', 1020000, 'Bandung', 12312, 20000, 'depok kepo bat', '', '', 'PENDING', ''),
(3, 3, 1, '2021-05-03', 1010000, 'Jakarta', 123344, 10000, 'komplek bbd', '', '', 'PENDING', ''),
(4, 4, 1, '2021-05-03', 160000, 'Jakarta', 123344, 10000, 'lereng ciputat', '', '', 'PENDING', '');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(5) NOT NULL,
  `id_pembelian` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `jumlah_produk` int(3) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(9) NOT NULL,
  `berat` int(3) NOT NULL,
  `subharga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah_produk`, `nama`, `harga`, `berat`, `subharga`) VALUES
(1, 1, 11, 1, 'Bonsai Beringin', 120000, 1, 120000),
(2, 2, 13, 1, 'Tanaman Aglonema Merah', 1000000, 1, 1000000),
(3, 3, 13, 1, 'Tanaman Aglonema Merah', 1000000, 1, 1000000),
(4, 4, 12, 1, 'Tanaman Janda Bolong', 150000, 1, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(5) NOT NULL,
  `kat_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat_produk` int(4) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kat_produk`, `nama_produk`, `harga_produk`, `berat_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(11, 'tanaman', 'Bonsai Beringin', 120000, 1, 'bonsai1.png', ' Bonsai Beringin merupakan versi mini dari pohon beringin yang sangat besar. Memiliki struktur yang kuat, tidak gampang mati, serta memiliki daun yang rimbun memudahkan proses pohon tersebut menjadi bonsai.                                                ', 24),
(12, 'Hias', 'Tanaman Janda Bolong', 150000, 1, 'janda bolong.png', 'Tanaman Janda Bolong adalah sebutan untuk jenis tanaman Monstera yang daunnya bolong. Jenis Monstera lain tidak termasuk sebutan Janda Bolong karena belahan pada daunnya yang terbuka hingga ke ujung daun tidak terlihat seperti bolongan.                                                                                                ', 8),
(13, 'Umum', 'Tanaman Aglonema Merah', 1000000, 1, 'algonema1.png', ' Chinese Evergreens (Aglaonema) adalah tanaman hias yang sangat populer karena penampilannya yang fantastis dan perawatan yang mudah. Mereka adalah tanaman yang sempurna untuk pemula tetapi juga disukai oleh penggemar tanaman hias karena keanekaragaman dan keindahan banyak kultivar.\r\n\r\nAglaonema tersedia dalam berbagai warna dan variegasi eksotis. Tanaman rumah aglaonema bisa dipelihara pada tingkat cahaya rendah yang sering ditemukan di rumah atau kantor. Meski ada banyak varietas tanaman ini, namun perawatan untuk semua tanaman aglaonema sangat mirip.                                                                                                                                                ', 4);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id_video` int(20) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `nama` text NOT NULL,
  `penyiraman` text NOT NULL,
  `penyinaran` text NOT NULL,
  `campuran_tanah` text NOT NULL,
  `pupuk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id_video`, `id_produk`, `nama`, `penyiraman`, `penyinaran`, `campuran_tanah`, `pupuk`) VALUES
(3, 11, 'https://www.youtube.com/embed/ZByDgjEn660', '2 - 3 Kali @ 1 Hari', '3 Jam  ', '50% Tanah dan 50% Pupuk', 'Kompos'),
(6, 12, 'https://www.youtube.com/embed/HoEdifzdBR0', '3 - 5 Kali @ 1 Hari', 'Pukul 10.00 - Pukul 12.00', '50% Tanah dan 50% Secumb', 'Organik'),
(8, 0, '', '', '', '', ''),
(10, 13, 'https://www.youtube.com/embed/MAFDeTtGTtA', '3 Kali - 4 Kali / Hari', 'Pukul 09.00 - 10.00 & Pukul 15.00 - 17.00', '60% Tanah & 40% Pupuk', 'Kompos ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adm`
--
ALTER TABLE `adm`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id_video`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adm`
--
ALTER TABLE `adm`
  MODIFY `id_admin` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id_video` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
