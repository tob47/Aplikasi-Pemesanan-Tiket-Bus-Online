-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 15. Nopember 2013 jam 17:26
-- Versi Server: 5.1.41
-- Versi PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dbkaruniabakti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `level`, `blokir`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin@karuniabakti.com', '085123456789', 'admin', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_kursi`
--

CREATE TABLE IF NOT EXISTS `detail_kursi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_orders` int(11) NOT NULL,
  `id_tiket` int(11) NOT NULL,
  `no_kursi` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `detail_kursi`
--

INSERT INTO `detail_kursi` (`id`, `id_orders`, `id_tiket`, `no_kursi`) VALUES
(2, 20, 2, 1),
(3, 20, 2, 2),
(4, 20, 2, 3),
(5, 21, 2, 4),
(6, 21, 2, 5),
(7, 21, 2, 6),
(8, 22, 5, 1),
(9, 22, 5, 2),
(10, 23, 2, 7),
(11, 23, 2, 8),
(12, 23, 2, 9),
(13, 24, 8, 1),
(14, 24, 8, 2),
(15, 25, 8, 3),
(16, 25, 8, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hubungi`
--

CREATE TABLE IF NOT EXISTS `hubungi` (
  `id_hubungi` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `subjek` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pesan` text COLLATE latin1_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_hubungi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `hubungi`
--

INSERT INTO `hubungi` (`id_hubungi`, `nama`, `email`, `subjek`, `pesan`, `tanggal`) VALUES
(13, 'tes', 'tes@yahoo.com', 'testis', 'oke testis', '2013-10-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `tujuan` varchar(30) NOT NULL,
  `jam` varchar(10) NOT NULL,
  PRIMARY KEY (`id_jadwal`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `tujuan`, `jam`) VALUES
(1, 'Bandung', '14.00'),
(2, 'Bandung', '13.00'),
(3, 'Jakarta', '09.00'),
(4, 'Jakarta', '11.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `id_kelas` int(5) NOT NULL AUTO_INCREMENT,
  `nama_kelas` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jumlah_kursi` int(11) NOT NULL,
  PRIMARY KEY (`id_kelas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `jumlah_kursi`) VALUES
(1, 'Ekonomi', 59),
(2, 'Executive', 55),
(4, 'VIP', 48);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kustomer`
--

CREATE TABLE IF NOT EXISTS `kustomer` (
  `id_kustomer` int(5) NOT NULL AUTO_INCREMENT,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `alamat` text COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `telpon` varchar(20) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id_kustomer`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

--
-- Dumping data untuk tabel `kustomer`
--

INSERT INTO `kustomer` (`id_kustomer`, `password`, `nama_lengkap`, `alamat`, `email`, `telpon`) VALUES
(1, '7815696ecbf1c96e6894b779456d330e', 'asd', 'asd', 'akang@yahoo.com', '123'),
(3, '47bce5c74f589f4867dbd57e9ca9f808', 'aaa', 'aaa', 'aaa@gmail.com', '111'),
(4, 'e10adc3949ba59abbe56e057f20f883e', 'irham miftah', 'Tasikmalaya', 'irman_ef@yahoo.com', '2039384'),
(5, 'f561aaf6ef0bf14d4208bb46a4ccb3ad', 'xxx', 'xxx', 'xxx4@yahoo.com', '111'),
(6, '7815696ecbf1c96e6894b779456d330e', 'asd', 'asd', 'asd@asd.com', '123'),
(8, '61bcf60d56ac3f6351acdd957849c20b', 'codet', 'codet rock city', 'codet@yahoo.com', '123456'),
(9, '698d51a19d8a121ce581499d7b701668', 'asd fgh', 'asd fgh', '111@111.com', '111'),
(10, 'ae715891160580bd65826a20d69d8d96', 'codet2', 'Tasikmalaya', 'codet2@yahoo.com', '123456');

-- --------------------------------------------------------

--
-- Struktur dari tabel `modul`
--

CREATE TABLE IF NOT EXISTS `modul` (
  `id_modul` int(5) NOT NULL AUTO_INCREMENT,
  `nama_modul` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `static_content` text COLLATE latin1_general_ci NOT NULL,
  `gambar` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `status` enum('user','admin') COLLATE latin1_general_ci NOT NULL,
  `aktif` enum('Y','N') COLLATE latin1_general_ci NOT NULL,
  `urutan` int(5) NOT NULL,
  PRIMARY KEY (`id_modul`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=61 ;

--
-- Dumping data untuk tabel `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `link`, `static_content`, `gambar`, `status`, `aktif`, `urutan`) VALUES
(18, 'Tiket', '?module=tiket', '', '', 'admin', 'Y', 5),
(42, 'Pesanan Tiket', '?module=order', '', '', 'admin', 'Y', 7),
(10, 'Manajemen Modul', '?module=modul', '', '', 'admin', 'N', 3),
(31, 'Kelas', '?module=kelas', '', '', 'admin', 'Y', 4),
(43, 'Profil', '?module=profil', '<strong>PO Karunia Bakti</strong> merupakan perusahaan otobis yang beralamat di Tasikmalaya.\r\n', 'gedung.jpg', 'admin', 'Y', 2),
(44, 'Hubungi Kami', '?module=hubungi', '', '', 'admin', 'Y', 9),
(45, 'Cara Pemesanan', '?module=carapesan', '<ol>\r\n	<li>Tentukan tanggal keberangkatan dan jenis bis yang akan anda pesan.</li>\r\n	<li>Pilih jadwal keberangkatan yang tersedia.</li>\r\n	<li>Jika sudah selesai, maka akan tampil form untuk pengisian data kustomer/pemesan.</li>\r\n	<li>Setelah data pemesan selesai diisikan, klik tombol&nbsp;<span style="font-weight: bold">Proses</span>, maka akan tampil data pemesan beserta tiket yang dipesannya (jika diperlukan catat nomor tiketnya). Dan juga ada total pembayaran serta nomor rekening pembayaran.</li>\r\n	<li>Apabila telah melakukan pembayaran, maka tiket sudah dapat dicetak oleh pemesanan.&nbsp;</li>\r\n</ol>\r\n', 'gedung.jpg', 'admin', 'Y', 8),
(58, 'Jadwal', '?module=jadwal', '', '', 'admin', 'Y', 6),
(60, 'Web Service', '../webservice/webservice.php', '', '', 'admin', 'Y', 12),
(49, 'Ganti Password', '?module=password', '', '', 'user', 'Y', 1),
(52, 'Laporan', '?module=laporan', '', '', 'user', 'Y', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id_orders` int(5) NOT NULL AUTO_INCREMENT,
  `status_order` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT 'Lunas',
  `tgl_order` date NOT NULL,
  `jam_order` time NOT NULL,
  `id_kustomer` int(5) NOT NULL,
  PRIMARY KEY (`id_orders`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=26 ;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id_orders`, `status_order`, `tgl_order`, `jam_order`, `id_kustomer`) VALUES
(1, 'Lunas', '2013-10-23', '21:32:54', 1),
(2, 'Lunas', '2013-10-23', '21:34:03', 1),
(4, 'Lunas', '2013-10-23', '21:36:52', 3),
(24, 'Lunas', '2013-11-15', '17:06:57', 10),
(23, 'Lunas', '2013-11-15', '17:01:56', 3),
(22, 'Lunas', '2013-11-15', '16:51:07', 3),
(21, 'Lunas', '2013-11-15', '16:50:30', 3),
(20, 'Lunas', '2013-11-15', '16:43:16', 3),
(19, 'Lunas', '2013-11-15', '16:38:04', 3),
(18, 'Lunas', '2013-11-15', '16:37:02', 3),
(25, 'Lunas', '2013-11-15', '04:14:43', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders_detail`
--

CREATE TABLE IF NOT EXISTS `orders_detail` (
  `id_orders` int(5) NOT NULL,
  `id_tiket` int(5) NOT NULL,
  `jumlah` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `orders_detail`
--

INSERT INTO `orders_detail` (`id_orders`, `id_tiket`, `jumlah`) VALUES
(1, 2, 2),
(2, 8, 5),
(4, 6, 3),
(22, 5, 2),
(21, 2, 3),
(20, 2, 3),
(19, 2, 2),
(18, 2, 3),
(23, 2, 3),
(24, 8, 2),
(25, 8, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders_temp`
--

CREATE TABLE IF NOT EXISTS `orders_temp` (
  `id_orders_temp` int(5) NOT NULL AUTO_INCREMENT,
  `id_tiket` int(5) NOT NULL,
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `jumlah` int(5) NOT NULL,
  `tgl_order_temp` date NOT NULL,
  `jam_order_temp` time NOT NULL,
  PRIMARY KEY (`id_orders_temp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=38 ;

--
-- Dumping data untuk tabel `orders_temp`
--


-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket`
--

CREATE TABLE IF NOT EXISTS `tiket` (
  `id_tiket` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tiket` varchar(30) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `harga_tiket` int(11) NOT NULL,
  `tujuan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_tiket`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `tiket`
--

INSERT INTO `tiket` (`id_tiket`, `nama_tiket`, `id_kelas`, `harga_tiket`, `tujuan`) VALUES
(2, 'Ekonomi JKT', 1, 25000, 'Jakarta'),
(4, 'Executive BDG', 2, 35000, 'Bandung'),
(5, 'Executive JKT', 2, 45000, 'Jakarta'),
(6, 'Ekonomi BDG', 1, 20000, 'Bandung'),
(7, 'VIP BDG', 4, 50000, 'Bandung'),
(8, 'VIP JKT', 4, 55000, 'Jakarta');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
