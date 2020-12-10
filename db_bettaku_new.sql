-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09 Jan 2020 pada 04.44
-- Versi Server: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_bettaku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id_admin` int(11) NOT NULL,
  `username_admin` varchar(20) NOT NULL,
  `password_admin` varchar(255) NOT NULL,
  `foto_admin` varchar(100) DEFAULT NULL,
  `nama_admin` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username_admin`, `password_admin`, `foto_admin`, `nama_admin`) VALUES
(1, 'rizqi1724', '3103deb68465747643608bb0f506dee6', 'rizqi.jpg', 'rizqi krisandika'),
(4, 'farida1708', 'c59b469d724f7919b7d35514184fdc0f', NULL, 'Farida'),
(5, 'tito1709', '52d080a3e172c33fd6886a37e7288491', NULL, 'Syaril tito mahendra');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gejala`
--

CREATE TABLE IF NOT EXISTS `gejala` (
  `kd_gejala` varchar(10) NOT NULL,
  `gejala` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gejala`
--

INSERT INTO `gejala` (`kd_gejala`, `gejala`) VALUES
('G01', 'Ikan kurang aktif'),
('G02', 'Warna ikan pucat'),
('G03', 'Sirip dan ekor menguncup'),
('G04', 'Nafsu makan berkurang'),
('G05', 'Mata bengkak'),
('G06', 'Warna gelap/merah dipinggir sirip'),
('G07', 'Sirip rontok atau sobek'),
('G08', 'Bintik putih pada ikan'),
('G09', 'Menabrakan diri ke akuarium'),
('G10', 'Perut membengkak'),
('G11', 'Tidak bisa buang kotoran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE IF NOT EXISTS `kategori` (
`id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Plakat'),
(2, 'Crowntail'),
(3, 'Halfmoon'),
(4, 'Halfmoon Plakat'),
(5, 'Slayer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelanggan`
--

CREATE TABLE IF NOT EXISTS `pelanggan` (
`id_pelanggan` int(11) NOT NULL,
  `tanggal_daftar` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `email_pelanggan` varchar(50) NOT NULL,
  `password_pelanggan` varchar(255) NOT NULL,
  `username_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) DEFAULT NULL,
  `nohp_pelanggan` varchar(25) NOT NULL,
  `alamat_pelanggan` varchar(255) DEFAULT NULL,
  `foto_pelanggan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `tanggal_daftar`, `email_pelanggan`, `password_pelanggan`, `username_pelanggan`, `nama_pelanggan`, `nohp_pelanggan`, `alamat_pelanggan`, `foto_pelanggan`) VALUES
(12, '2019-12-11 12:21:01', 'rizqikrisandika990@gmail.com', '541dfad50aac2125dac2ef63b4d022f2', 'rizqikrisandika', 'rizqikrisandika', '089523269898', 'Taman Sedayu 3, Bantul', 'user/foto_profile/img_20191221014459.png'),
(16, '2019-12-22 16:02:55', 'rizqialnova@gmail.com', '01aad4b248d8fa31ff08455ed4c72006', 'Alnova99', 'Rizqi alnova defario', '089523269898', 'Gamping, Yogyakarta', 'user/foto_profile/img_20191222100443.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE IF NOT EXISTS `pembayaran` (
`id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `jumlah_pembayaran` int(11) NOT NULL,
  `tanggal_pembayaran` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bukti_pembayaran` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah_pembayaran`, `tanggal_pembayaran`, `bukti_pembayaran`) VALUES
(7, 24, 'Rizqi Krisandika', 'BRI', 195000, '2019-12-25 03:56:58', 'ls/bukti_pembayaran/img_20191224215658.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE IF NOT EXISTS `pembelian` (
`id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `tanggal_pembelian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `total_pembelian` int(11) NOT NULL,
  `status_pembelian` varchar(20) NOT NULL DEFAULT 'Belum bayar'
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `tanggal_pembelian`, `total_pembelian`, `status_pembelian`) VALUES
(23, 12, '2019-12-24 20:29:11', 300000, 'Belum bayar'),
(24, 12, '2019-12-24 20:56:13', 195000, 'Verifikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_produk`
--

CREATE TABLE IF NOT EXISTS `pembelian_produk` (
`id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `foto_produk` varchar(255) NOT NULL,
  `harga_produk` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama_produk`, `foto_produk`, `harga_produk`) VALUES
(20, 23, 35, 1, 'Red Dragon', 'img_20191212151559.png', 300000),
(21, 24, 29, 1, 'AOC', 'img_20191211151300.png', 150000),
(22, 24, 32, 1, 'Super Red', 'img_20191211152030.png', 45000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pencegahan`
--

CREATE TABLE IF NOT EXISTS `pencegahan` (
  `kd_pencegahan` varchar(10) NOT NULL,
  `kode` varchar(10) NOT NULL,
  `deskripsi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pencegahan`
--

INSERT INTO `pencegahan` (`kd_pencegahan`, `kode`, `deskripsi`) VALUES
('PP01', 'P01', 'TESTING'),
('PP02', 'P02', 'TESTING'),
('PP03', 'P03', 'TESTING'),
('PP04', 'P04', 'TESTING');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyakit`
--

CREATE TABLE IF NOT EXISTS `penyakit` (
  `kode` varchar(10) NOT NULL,
  `nama_penyakit` varchar(50) NOT NULL,
  `penyebab` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyakit`
--

INSERT INTO `penyakit` (`kode`, `nama_penyakit`, `penyebab`) VALUES
('P01', 'Mata Bengkak (Pop Eye)', 'Bakteri dan kondisi air yang kotor.'),
('P02', 'Sirip Busuk (Fin Rot)', 'Kondisi akuarium yang kotor, kualitas perawatan yang buruk, atau terpapar ikan lain yang terjangkit penyakit menular.'),
('P03', 'Bintik Putih (White Spot)', 'Parasit yang berkista.'),
('P04', 'Sisik Nanas (Dropsy)', 'Bakteri yang menyerang organ dalam ikan Cupang.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE IF NOT EXISTS `produk` (
`id_produk` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `tanggal_produk` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nama_produk` varchar(50) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) DEFAULT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok_produk` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `id_admin`, `id_pelanggan`, `tanggal_produk`, `nama_produk`, `harga_produk`, `foto_produk`, `deskripsi_produk`, `stok_produk`) VALUES
(25, 1, 1, NULL, '2019-12-09 06:12:03', 'Fancy Red', 136000, 'img_20191209091739.png', 'murahhh', 1),
(26, 1, 1, NULL, '2019-12-11 12:56:18', 'Red Fccp', 25000, 'img_20191211135618.png', 'Jantan\r\nsize M', 1),
(27, 1, 1, NULL, '2019-12-11 12:58:56', 'Fancy Yellow', 75000, 'img_20191211135856.png', 'sudah siap pijah', 1),
(28, 4, 1, NULL, '2019-12-11 13:00:26', 'HMPK Gold', 320000, 'img_20191211140026.png', 'Muantappppp', 1),
(29, 1, 1, NULL, '2019-12-11 14:13:00', 'AOC', 150000, 'img_20191211151300.png', 'size s', 0),
(30, 1, 1, NULL, '2019-12-11 14:16:26', 'Koi', 50000, 'img_20191211151626.png', 'Betina', 1),
(31, 1, 1, NULL, '2019-12-11 14:17:23', 'Koi Galaxy', 75000, 'img_20191211151723.png', 'siapp breed slur', 1),
(32, 1, 1, NULL, '2019-12-11 14:20:30', 'Super Red', 45000, 'img_20191211152030.png', 'bisa diliat di gambar', 0),
(33, 3, 1, NULL, '2019-12-11 14:24:03', 'Besgel Red Blue', 30000, 'img_20191211152403.png', 'murahh ajaa hehe', 1),
(35, 1, 1, NULL, '2019-12-12 14:15:59', 'Red Dragon', 300000, 'img_20191212151559.png', 'murahhhhh', 0),
(41, 1, NULL, 12, '2019-12-22 03:40:04', 'Cupang Alam Machacha', 3000000, 'img_20191222044004.png', 'Mahall pastinya', 1),
(43, 1, 4, NULL, '2019-12-22 09:27:17', 'Fancy', 70000, 'img_20191222102717.png', 'Murahhhh\r\n\r\n#CUPANG #CUPANGINDONESIA', 1),
(44, 1, NULL, 16, '2019-12-22 09:32:16', 'Cupang Alam Copper', 5000000, 'img_20191222103216.png', 'Yang ngerti aja sama barang\r\n\r\n#CUPANGALAM', 1),
(45, 2, 1, NULL, '2019-12-24 21:24:39', 'Crowntail black', 50000, 'img_20191224222439.png', 'murah slurrrrr', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rule`
--

CREATE TABLE IF NOT EXISTS `rule` (
  `jika` varchar(50) NOT NULL,
  `maka` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rule`
--

INSERT INTO `rule` (`jika`, `maka`) VALUES
('G01ANDG02ANDG03ANDG04ANDG05', 'P01'),
('G01ANDG02ANDG03ANDG04ANDG06ANDG07', 'P02'),
('G01ANDG02ANDG03ANDG04ANDG08ANDG09', 'P03'),
('G01ANDG02ANDG03ANDG04ANDG10ANDG11', 'P04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `solusi`
--

CREATE TABLE IF NOT EXISTS `solusi` (
`id` int(10) NOT NULL,
  `kd_solusi` varchar(10) NOT NULL,
  `kd_pencegahan` varchar(10) NOT NULL,
  `solusi` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `solusi`
--

INSERT INTO `solusi` (`id`, `kd_solusi`, `kd_pencegahan`, `solusi`) VALUES
(1, 'S11', 'PP01', 'Pengobatan popeye harus dilakukan sesuai dengan penyebabnya, namun pada umumnya pengobatan optimal dilakukan dengan menggunakan antibiotik ringan. Elbayou merupakan antibiotik ikan yang terbukti ampuh dalam mengobati penyakit ikan akibat infeksi bakteri.\r\nCara penggunaannya :<br><ul><li> larutkan elbayou sebanyak 5 sampai 10 gram pada 100 liter air.</li> <li>masukkan dan karantina ikan yang terinfeksi ke dalam larutan elbayou selama beberapa hari dan lihat perkembangannya.</li></ul>'),
(2, 'S12', 'PP02', '1. Membersihkan akuarium. <br>\r\n2. Menggunakan obat-obatan dan perawatan herbal dengan menggunakan minyak tea tree dan garam sebagai berikut:<br><ul><li>menambahkan 1-2 tetes minyak tea tree ke dalam akuarium sehingga air tetap bersih dan steril. Pastikan ikan tidak bereaksi negatif terhadap minyak tea tree sebelum Anda menambahkan beberapa tetes tambahan keesokan harinya.</li><li>Gunakan garam tonik, atau sodium klorida, dapat digunakan untuk mencegah penyakit busuk sirip. Tambahkan 30 gr garam untuk setiap 4 liter air. Gunakan garam tonik hanya untuk ikan air tawar yang dapat menoleransi garam.</li></ul>\r\n3. Mencegah sirip busuk dengan cara :<ul><li>Menjaga kebersihan akuarium dan ganti airnya seminggu sekali,</li><li>akuarium tidak terlalu sesak,</li><li>memberikan makanan berkualitas baik untuk ikan.</li</ul>'),
(3, 'S13', 'PP03', 'Untuk mengobatinya bisa menggunakan obat Blitz ich, Neo Blue, Gold 100, dan Pomate. <br><br>\r\n- Blitz ich bisa dipakai dengan dosis 1 tetes untuk 6-8 liter air bila sekedar untuk pencegahan.<br>\r\n- Neo Blue dengan dosis 1 cc(kurang lebih 15 tetes) untuk setiap 100 liter air saat pengobatan dan 1 cc setiap 150 liter air untuk pencegahan. <br>\r\n- Konsentrasi Gold 100 untuk pengobatan sebanyak 5-10 g(1-2 pak) untuk setiap 500 liter air, sedangkan untuk pencegahan 5 g(1 pak) untuk setiap 1.000 liter air. <br>\r\n- Konsentrasi Pomate untuk pengobatan 5 g per 500 liter air dan untuk pencegahan 5 g per 1.000 liter air.'),
(4, 'S14', 'PP04', '1. Karantina ikan cupang <br>\r\n2. Taruh pada wadah yang cukup memadai <br>\r\n3. Berikan air bersih <br>\r\n4. Memberikan obat AntiBakteri <br>\r\n5. Memberikan pakan yang sehat <br>\r\n6. Rajin menguras air <br>\r\n7. Berikan nutrisi cukup <br>\r\n8. Bersihkan ikan <br>\r\n9. Memanfaatkan daun ketapang <br>\r\n10. Berikan garam ikan.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
 ADD PRIMARY KEY (`kd_gejala`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
 ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
 ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
 ADD PRIMARY KEY (`id_pembayaran`), ADD KEY `id_pembelian` (`id_pembelian`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
 ADD PRIMARY KEY (`id_pembelian`), ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
 ADD PRIMARY KEY (`id_pembelian_produk`), ADD KEY `id_pembelian` (`id_pembelian`), ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `pencegahan`
--
ALTER TABLE `pencegahan`
 ADD PRIMARY KEY (`kd_pencegahan`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
 ADD PRIMARY KEY (`kode`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
 ADD PRIMARY KEY (`id_produk`), ADD KEY `id_kategori` (`id_kategori`), ADD KEY `id_admin` (`id_admin`), ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `rule`
--
ALTER TABLE `rule`
 ADD PRIMARY KEY (`jika`);

--
-- Indexes for table `solusi`
--
ALTER TABLE `solusi`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `solusi`
--
ALTER TABLE `solusi`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`);

--
-- Ketidakleluasaan untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
ADD CONSTRAINT `pembelian_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

--
-- Ketidakleluasaan untuk tabel `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
ADD CONSTRAINT `pembelian_produk_ibfk_1` FOREIGN KEY (`id_pembelian`) REFERENCES `pembelian` (`id_pembelian`),
ADD CONSTRAINT `pembelian_produk_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
ADD CONSTRAINT `produk_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
ADD CONSTRAINT `produk_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`),
ADD CONSTRAINT `produk_ibfk_3` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
