/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `tb_bukti_bayar` (
  `id_bukti_bayar` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(20) DEFAULT NULL,
  `id_transaksi` int(20) DEFAULT NULL,
  `tgl_upload` varchar(50) DEFAULT NULL,
  `foto_bukti_bayar` varchar(255) DEFAULT NULL,
  UNIQUE KEY `id` (`id_bukti_bayar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tb_data_booking` (
  `id_booking` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_paket` int(20) DEFAULT NULL,
  `id_user` int(20) DEFAULT NULL,
  `nomor_booking` varchar(255) DEFAULT NULL,
  `tanggal_booking` varchar(50) DEFAULT NULL,
  `jumlah_peserta` int(11) DEFAULT NULL,
  `status_booking` varchar(20) DEFAULT NULL,
  `total_biaya` int(11) DEFAULT NULL,
  `status_pembayaran` varchar(20) DEFAULT NULL,
  `tanggal_transaksi` varchar(5) DEFAULT NULL,
  UNIQUE KEY `id_booking` (`id_booking`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tb_foto` (
  `id_foto` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_paket` int(20) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `foto_unggulan` varchar(5) DEFAULT NULL,
  UNIQUE KEY `id` (`id_foto`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

CREATE TABLE `tb_paket_wisata` (
  `id_paket` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nama_paket` varchar(255) DEFAULT NULL,
  `harga_paket` int(11) DEFAULT NULL,
  `satuan` varchar(20) DEFAULT NULL,
  `keterangan` text,
  `total_kunjungan` int(11) DEFAULT NULL,
  `lat` varchar(255) DEFAULT NULL,
  `long` varchar(255) DEFAULT NULL,
  `status` varchar(5) DEFAULT NULL,
  UNIQUE KEY `id` (`id_paket`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

CREATE TABLE `tb_peserta_wisata` (
  `id_peserta_wisata` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_paket_wisata` int(20) DEFAULT NULL,
  `nama_peserta` varchar(255) DEFAULT NULL,
  `jenis_kelamin` varchar(3) DEFAULT NULL,
  UNIQUE KEY `id` (`id_peserta_wisata`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tb_profil` (
  `id_profil` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(20) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `alamat` text,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  UNIQUE KEY `id_profil` (`id_profil`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `tb_user` (
  `id_user` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  `nama` varchar(200) DEFAULT NULL,
  `status_data` varchar(10) DEFAULT NULL,
  `status_account` varchar(10) DEFAULT NULL,
  `tgl_registrasi` varchar(30) DEFAULT NULL,
  UNIQUE KEY `id` (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;





INSERT INTO `tb_foto` (`id_foto`, `id_paket`, `foto`, `foto_unggulan`) VALUES
(4, 1, 'uploads/21fe636ed70e437a7bcbea7ad3db62b1.png', '1');
INSERT INTO `tb_foto` (`id_foto`, `id_paket`, `foto`, `foto_unggulan`) VALUES
(5, 2, 'uploads/c254f8b188c4b30b54ffa8863e9d3c18.png', '1');
INSERT INTO `tb_foto` (`id_foto`, `id_paket`, `foto`, `foto_unggulan`) VALUES
(6, 3, 'uploads/19951a80efa2bbf6651df2f16bfd8bbb.png', '1');
INSERT INTO `tb_foto` (`id_foto`, `id_paket`, `foto`, `foto_unggulan`) VALUES
(7, 4, 'uploads/685c63af97baf88a1485b5ae38b1b51b.png', '1');

INSERT INTO `tb_paket_wisata` (`id_paket`, `nama_paket`, `harga_paket`, `satuan`, `keterangan`, `total_kunjungan`, `lat`, `long`, `status`) VALUES
(1, 'Makan Bajamba', 90000, '3', '<p>Merupakan salah satu tradisi makan bersama di Kubu Gadang yang penyajian lauk pauknya disusun dalam dulang. Biasanya disajikan di berbagai tempat baik di dalam maupun di luar ruangan degan disuguhkan pemandangan sawah yang asri dan indah<br></p>', 0, '0', '0', '1');
INSERT INTO `tb_paket_wisata` (`id_paket`, `nama_paket`, `harga_paket`, `satuan`, `keterangan`, `total_kunjungan`, `lat`, `long`, `status`) VALUES
(2, 'Belajar membatik', 20000, '3', '<p class=\"MsoNormal\"><span lang=\"SV\">Membatik\r\nmerupakan seni menggambar di atas kain dengan coating yang berisi tinta khusus.\r\nDesa Kubu Gadang juga menawarkan paket membatik dengan pemandangan alam yang\r\nasri dan memanjakan mata. Belajar membatik di Kubu gadang untuk minimal 20 px.<o:p></o:p></span></p>', 0, '0', '0', '1');
INSERT INTO `tb_paket_wisata` (`id_paket`, `nama_paket`, `harga_paket`, `satuan`, `keterangan`, `total_kunjungan`, `lat`, `long`, `status`) VALUES
(3, 'Bagadang Samba Lado', 20000, '3', '<p>Merupakan tradisi makan bersama di Kubu Gadang yang penyajiannya diatas daun pisang. Biasanya tradisi makan ini menggunakan menu tradisional yaitu samba lado yang dibuat oleh ibu-ibu PKK yang ada di Desa Wisata Kubu Gadang<br></p>', 0, '0', '0', '1');
INSERT INTO `tb_paket_wisata` (`id_paket`, `nama_paket`, `harga_paket`, `satuan`, `keterangan`, `total_kunjungan`, `lat`, `long`, `status`) VALUES
(4, 'Nasi Baka', 25000, '3', '<p>Nasi Baka merupakan salah satu makanan khas yang ada di Kubu Gadang yang penyajiannnya nasi dibungkus menggunakan daun pisang</p>', 0, '0', '0', '1');





INSERT INTO `tb_user` (`id_user`, `username`, `password`, `role`, `nama`, `status_data`, `status_account`, `tgl_registrasi`) VALUES
(1, 'budi@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'pelanggan', 'budi', '0', '1', '2023-02-04 13:05:21');
INSERT INTO `tb_user` (`id_user`, `username`, `password`, `role`, `nama`, `status_data`, `status_account`, `tgl_registrasi`) VALUES
(2, 'admin@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'admin', 'Admin', '1', '1', '2023-02-04 14:07:39');
INSERT INTO `tb_user` (`id_user`, `username`, `password`, `role`, `nama`, `status_data`, `status_account`, `tgl_registrasi`) VALUES
(3, 'yudi@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'pelanggan', 'yudi', '0', '1', '2023-02-06 11:44:21');


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;