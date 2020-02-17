-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 15, 2020 at 08:35 AM
-- Server version: 8.0.18
-- PHP Version: 7.1.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbnomadssurvei`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('f97d79230a7dc70041b0040f5f92b1240fb59b58', '127.0.0.1', 1578988144, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383938383134343b7374617475735f616b756e7c733a313a2231223b726f6c655f616b756e7c733a313a2231223b69645f757365727c733a313a2237223b656d61696c7c733a31353a2261646d696e40676d61696c2e636f6d223b70617373776f72647c733a363a22313233343536223b69735f6c6f67676564696e7c623a313b5f5f63695f766172737c613a313a7b733a363a226572726f7273223b733a333a226f6c64223b7d6572726f72737c733a303a22223b),
('e7a34fccf0e343ed10753ff8601e714e310f6753', '127.0.0.1', 1578988842, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383938383834323b7374617475735f616b756e7c733a313a2231223b726f6c655f616b756e7c733a313a2231223b69645f757365727c733a313a2237223b656d61696c7c733a31353a2261646d696e40676d61696c2e636f6d223b70617373776f72647c733a363a22313233343536223b69735f6c6f67676564696e7c623a313b),
('b701efcc7356f4bf5ac5266ebbc4f48c55f3dd35', '127.0.0.1', 1578992265, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383939323236353b7374617475735f616b756e7c733a313a2231223b726f6c655f616b756e7c733a313a2231223b69645f757365727c733a313a2237223b656d61696c7c733a31353a2261646d696e40676d61696c2e636f6d223b70617373776f72647c733a363a22313233343536223b69735f6c6f67676564696e7c623a313b),
('4a00f8e0b4ff3cc8ccbdd2511ed2c7eac018d88f', '127.0.0.1', 1578992693, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383939323639333b7374617475735f616b756e7c733a313a2231223b726f6c655f616b756e7c733a313a2231223b69645f757365727c733a313a2237223b656d61696c7c733a31353a2261646d696e40676d61696c2e636f6d223b70617373776f72647c733a363a22313233343536223b69735f6c6f67676564696e7c623a313b),
('ba56327e06576c7a44f5db26f00bcd28999d8808', '127.0.0.1', 1578993037, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383939333033373b7374617475735f616b756e7c733a313a2231223b726f6c655f616b756e7c733a313a2231223b69645f757365727c733a313a2237223b656d61696c7c733a31353a2261646d696e40676d61696c2e636f6d223b70617373776f72647c733a363a22313233343536223b69735f6c6f67676564696e7c623a313b),
('978decaecae11f9e0067a9331ae1b1d7f7a7e1f3', '127.0.0.1', 1578993497, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383939333439373b7374617475735f616b756e7c733a313a2231223b726f6c655f616b756e7c733a313a2231223b69645f757365727c733a313a2237223b656d61696c7c733a31353a2261646d696e40676d61696c2e636f6d223b70617373776f72647c733a363a22313233343536223b69735f6c6f67676564696e7c623a313b),
('5410dc99cd5d4b35bf7974aa4c7adaa5fdb98817', '127.0.0.1', 1578993765, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537383939333736353b);

-- --------------------------------------------------------

--
-- Table structure for table `tm_aspek`
--

CREATE TABLE `tm_aspek` (
  `id_aspek` int(3) NOT NULL,
  `aspek_name` varchar(256) DEFAULT NULL,
  `simbol` varchar(24) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tm_aspek`
--

INSERT INTO `tm_aspek` (`id_aspek`, `aspek_name`, `simbol`) VALUES
(23, 'Teknologi', 'T'),
(24, 'Pasar', 'M'),
(25, 'Manufaktur', 'MF'),
(26, 'Organisasi', 'O'),
(27, 'Kemitraan', 'P'),
(28, 'Investment', 'I'),
(29, 'Risiko', 'R');

-- --------------------------------------------------------

--
-- Table structure for table `tm_file_pendukung`
--

CREATE TABLE `tm_file_pendukung` (
  `id_file` int(5) NOT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_upload` varchar(255) DEFAULT NULL,
  `log_time_upload` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tm_indikator`
--

CREATE TABLE `tm_indikator` (
  `id_indikator` int(3) NOT NULL,
  `indikator_name` varchar(24) DEFAULT NULL,
  `indikator_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tm_indikator`
--

INSERT INTO `tm_indikator` (`id_indikator`, `indikator_name`, `indikator_description`) VALUES
(1, 'KATSINOV 1', ''),
(2, 'KATSINOV 2', ''),
(3, 'KATSINOV 3', ''),
(4, 'KATSINOV 4', ''),
(5, 'KATSINOV 5', ''),
(6, 'KATSINOV 6', '');

-- --------------------------------------------------------

--
-- Table structure for table `tm_institution`
--

CREATE TABLE `tm_institution` (
  `kode_lembaga` int(4) DEFAULT NULL,
  `nama_lembaga` varchar(51) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tm_institution`
--

INSERT INTO `tm_institution` (`kode_lembaga`, `nama_lembaga`) VALUES
(1001, 'Universitas Gadjah Mada'),
(1002, 'Universitas Indonesia'),
(1003, 'Universitas Sumatera Utara'),
(1004, 'Universitas Airlangga'),
(1005, 'Universitas Hasanuddin'),
(1006, 'Universitas Andalas'),
(1007, 'Universitas Padjadjaran'),
(1008, 'Universitas Diponegoro'),
(1009, 'Universitas Sriwijaya'),
(1010, 'Universitas Lambung Mangkurat'),
(1011, 'Universitas Syiah Kuala'),
(1012, 'Universitas Sam Ratulangi'),
(1013, 'Universitas Udayana'),
(1014, 'Universitas Nusa Cendana'),
(1015, 'Universitas Mulawarman'),
(1016, 'Universitas Mataram'),
(1017, 'Universitas Riau'),
(1018, 'Universitas Cenderawasih'),
(1019, 'Universitas Brawijaya'),
(1020, 'Universitas Jambi'),
(1021, 'Universitas Pattimura'),
(1022, 'Universitas Tanjungpura'),
(1023, 'Universitas Jenderal Soedirman'),
(1024, 'Universitas Palangka Raya'),
(1025, 'Universitas Jember'),
(1026, 'Universitas Lampung'),
(1027, 'Universitas Sebelas Maret'),
(1028, 'Universitas Tadulako'),
(1029, 'Universitas Halu Oleo'),
(1030, 'Universitas Bengkulu'),
(1031, 'Universitas Terbuka'),
(1032, 'Universitas Negeri Padang'),
(1033, 'Universitas Negeri Malang'),
(1034, 'Universitas Pendidikan Indonesia'),
(1035, 'Universitas Negeri Manado'),
(1036, 'Universitas Negeri Makassar'),
(1037, 'Universitas Negeri Jakarta'),
(1038, 'Universitas Negeri Yogyakarta'),
(1039, 'Universitas Negeri Surabaya'),
(1040, 'Universitas Negeri Medan'),
(1041, 'Universitas Negeri Semarang'),
(1042, 'Universitas Sultan Ageng Tirtayasa'),
(1043, 'Universitas Trunojoyo'),
(1044, 'Universitas Khairun'),
(1045, 'Universitas Papua'),
(1046, 'Universitas Malikussaleh'),
(1047, 'Universitas Negeri Gorontalo'),
(1048, 'Universitas Pendidikan Ganesha'),
(1049, 'Universitas Bangka Belitung'),
(1050, 'Universitas Borneo Tarakan'),
(1051, 'Universitas Musamus Merauke'),
(1052, 'Universitas Maritim Raja Ali Haji (UMRAH)'),
(1053, 'Universitas Samudra'),
(1054, 'Universitas Sulawesi Barat'),
(1055, 'Universitas Sembilanbelas November Kolaka'),
(1056, 'Universitas Tidar'),
(1057, 'Universitas Siliwangi'),
(1058, 'Universitas Teuku Umar'),
(1059, 'Universitas Pembangunan Nasional Veteran Jawa Timur'),
(1060, 'Universitas Timor'),
(1061, 'Universitas Pembangunan Nasional Veteran Jakarta'),
(1062, 'Universitas Pembangunan Nasional Veteran Yogyakarta'),
(1063, 'Universitas Singaperbangsa Karawang'),
(2001, 'Institut Teknologi Bandung'),
(2002, 'Institut Teknologi Sepuluh Nopember'),
(2003, 'Institut Pertanian Bogor'),
(2005, 'Institut Seni Indonesia Yogyakarta'),
(2007, 'Institut Seni Indonesia Denpasar'),
(2008, 'Institut Seni Indonesia Surakarta'),
(2009, 'Institut Seni Indonesia Padang Panjang'),
(2010, 'Institut Seni Budaya Indonesia Bandung'),
(2011, 'Institut Seni Budaya Indonesia Aceh'),
(2012, 'Institut Seni Budaya Indonesia Tanah Papua'),
(2013, 'Institut Teknologi Kalimantan'),
(2014, 'Institut Teknologi Sumatera'),
(2015, 'Institut Teknologi Bacharuddin Jusuf Habibie'),
(5001, 'Politeknik Manufaktur Bandung'),
(5002, 'Politeknik Negeri Jakarta'),
(5003, 'Politeknik Negeri Medan'),
(5004, 'Politeknik Negeri Bandung'),
(5005, 'Politeknik Negeri Semarang'),
(5006, 'Politeknik Negeri Sriwijaya'),
(5007, 'Politeknik Negeri Lampung'),
(5008, 'Politeknik Negeri Ambon'),
(5009, 'Politeknik Negeri Padang'),
(5010, 'Politeknik Negeri Bali'),
(5011, 'Politeknik Negeri Pontianak'),
(5012, 'Politeknik Negeri Ujung Pandang'),
(5013, 'Politeknik Negeri Manado'),
(5014, 'Politeknik Perkapalan Negeri Surabaya'),
(5015, 'Politeknik Negeri Banjarmasin'),
(5016, 'Politeknik Negeri Lhokseumawe'),
(5017, 'Politeknik Negeri Kupang'),
(5018, 'Politeknik Elektronika Negeri Surabaya'),
(5019, 'Politeknik Negeri Jember'),
(5020, 'Politeknik Pertanian Negeri Pangkajene Kepulauan'),
(5021, 'Politeknik Pertanian Negeri Kupang'),
(5022, 'Politeknik Perikanan Negeri Tual'),
(5023, 'Politeknik Negeri Malang'),
(5024, 'Politeknik Pertanian Negeri Samarinda'),
(5025, 'Politeknik Pertanian Negeri Payakumbuh'),
(5026, 'Politeknik Negeri Samarinda'),
(5027, 'Politeknik Negeri Media Kreatif'),
(5028, 'Politeknik Manufaktur Negeri Bangka Belitung'),
(5029, 'Politeknik Negeri Batam'),
(5030, 'Politeknik Negeri Nusa Utara'),
(5031, 'Politeknik Negeri Bengkalis'),
(5032, 'Politeknik Negeri Balikpapan'),
(5033, 'Politeknik Negeri Madura'),
(5034, 'Politeknik Maritim Negeri Indonesia'),
(5035, 'Politeknik Negeri Banyuwangi'),
(5036, 'Politeknik Negeri Madiun'),
(5037, 'Politeknik Negeri Fakfak'),
(5038, 'Politeknik Negeri Sambas'),
(5039, 'Politeknik Negeri Tanah Laut'),
(5040, 'Politeknik Negeri Subang'),
(5041, 'Politeknik Negeri Ketapang'),
(5042, 'Politeknik Negeri Cilacap'),
(5043, 'Politeknik Negeri Indramayu'),
(6001, 'Akademi Komunitas Negeri Pacitan'),
(6002, 'Akademi Komunitas Negeri Putra Sang Fajar Blitar'),
(6003, 'Akademi Komunitas Negeri Aceh Barat'),
(6004, 'Akademi Komunitas Negeri Rejang Lebong');

-- --------------------------------------------------------

--
-- Table structure for table `tm_penilaian`
--

CREATE TABLE `tm_penilaian` (
  `id_penilaian` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `id_indikator` int(3) NOT NULL,
  `id_aspek` int(3) NOT NULL,
  `id_soal` int(5) NOT NULL,
  `id_produk` int(5) NOT NULL,
  `nilai` int(2) DEFAULT NULL,
  `log_time_penilaian` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tm_penilaian`
--

INSERT INTO `tm_penilaian` (`id_penilaian`, `id_user`, `id_indikator`, `id_aspek`, `id_soal`, `id_produk`, `nilai`, `log_time_penilaian`) VALUES
(117, 29, 1, 23, 1, 11, 1, '2020-01-13 09:57:43'),
(118, 29, 2, 23, 23, 11, 5, '2020-01-13 09:58:02'),
(119, 29, 1, 23, 4, 10, 2, '2020-01-13 09:58:32'),
(120, 29, 1, 23, 1, 10, 1, '2020-01-13 10:01:08'),
(121, 29, 1, 23, 2, 11, 5, '2020-01-13 10:01:40'),
(122, 29, 1, 23, 3, 12, 4, '2020-01-13 10:02:18');

-- --------------------------------------------------------

--
-- Table structure for table `tm_produk`
--

CREATE TABLE `tm_produk` (
  `id_produk` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `tgl_pengukuran` date DEFAULT NULL,
  `produk_name` varchar(255) DEFAULT NULL,
  `focus_bidang` varchar(255) DEFAULT NULL,
  `proyek_name` varchar(255) DEFAULT NULL,
  `company_name` varchar(64) DEFAULT NULL,
  `produk_address` text,
  `log_produk_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tm_produk`
--

INSERT INTO `tm_produk` (`id_produk`, `id_user`, `tgl_pengukuran`, `produk_name`, `focus_bidang`, `proyek_name`, `company_name`, `produk_address`, `log_produk_time`) VALUES
(10, 29, '2020-01-13', 'Produk Komposit Sabut Kelapa', 'Teknik/Konstruksi Bangunan', 'PUT-KELAPA-02', 'Pusat Unggulan Teknologi Kelapa, Politeknik Negeri Manado', 'jakarta', '2020-01-13 08:42:21'),
(11, 29, '2020-01-13', 'perdagangan', 'Perminyakan', 'PERMIN-Minyak-023', 'Fakultas IPA - Jambi', 'bogor', '2020-01-13 08:43:32'),
(12, 29, '2020-01-13', 'produk limbah', 'teknik limbah', 'PER-01', 'IPB', 'bandung', '2020-01-13 08:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `tm_soal`
--

CREATE TABLE `tm_soal` (
  `id_soal` int(5) NOT NULL,
  `id_indikator` int(3) NOT NULL,
  `id_aspek` int(11) NOT NULL,
  `activity_key` text,
  `description_key` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tm_soal`
--

INSERT INTO `tm_soal` (`id_soal`, `id_indikator`, `id_aspek`, `activity_key`, `description_key`) VALUES
(1, 1, 23, 'Ide baru yang memberi solusi permasalahan masyarakat. 								', NULL),
(2, 1, 23, 'Telah dilakukan pengamatan prinsip-prinsip ilmiah dasar dan publikasi ilmiah. 								', ''),
(3, 1, 23, 'Faktor yang membedakan temuan dengan temuan lain dan unsur kebaruan dari sebuah ide atau gagasan  telah diidentifikasi.								', ''),
(4, 1, 23, 'Mengidentifikasi tahapan riset dan targetnya. 								', ''),
(5, 1, 23, 'Teknologi yang akan dikembangkan telah layak secara ilmiah (scientific feasibility).								', ''),
(6, 1, 24, 'Inovasi dilakukan berdasarkan permintaan dan / atau kebutuhan pelanggan.								', ''),
(7, 1, 24, 'Permintaan dan kebutuhan pelanggan telah diidentifikasi. 								', ''),
(8, 1, 24, 'Telah mengidentifikasikan lokasi pasar yang akan dituju.								', ''),
(9, 1, 26, 'Telah memiliki strategi inovasi.								', ''),
(10, 1, 26, 'Lingkup proyek dan tugas telah diidentifikasi.								', ''),
(11, 1, 26, 'Kebutuhan akan sumber daya, dana dan fasilitas penelitian telah dikonfirmasi. 								', ''),
(12, 1, 26, 'Tersedia saluran komunikasi tanpa hambatan.								', ''),
(13, 1, 25, 'Konsekuensi hasil temuan telah diidentifikasi melalui dasar manufaktur ekonomis.								', ''),
(14, 1, 25, 'Teridentifikasi dalam konsep manufaktur secara teknis dan ekonomis. 								', ''),
(15, 1, 25, 'Tersedia bukti  konsep manufaktur  melalui analitik atau eksperimen laboratorium.', ''),
(16, 1, 28, 'Ide yang dikembangkan memiliki konsep model bisnis.								', ''),
(17, 1, 28, 'Ide yang dikembangkan memiliki hasil analisis pelanggan, pasar, dan pesaing.								', ''),
(18, 1, 28, 'Ide yang dikembangkan telah terbukti memberi solusi bagi pelanggan.								', ''),
(19, 1, 27, 'Telah tersusun strategi membangung jaringan kerja dan kemitraan. 								', ''),
(20, 1, 27, 'Mitra potensial telah diidentifikasi.								', ''),
(21, 1, 29, 'Kajian risiko teknologi telah menjadi pertimbangan dalam setiap langkah penelitian.								', ''),
(22, 1, 29, 'Pada tahap penelitian dilakukan penyusunan rencana pengendalian risiko teknologi.								', ''),
(23, 2, 23, 'Telah melakukan validasi terhadap komponen individu dari teknologi.	', ''),
(24, 2, 23, 'Prototipe telah didemonstrasikan dalam lingkungan yang relevan.								', ''),
(25, 2, 23, 'Teknologi dinyatakan layak secara teknis.								', ''),
(26, 2, 23, 'Telah melakukan pendaftaran kekayaan intelektual (misal: paten, desain industri, hak cipta, merek, dll).								', ''),
(27, 2, 23, 'Secara teknis mampu memberikan solusi terhadap permasalahan yang dihadapi masyarakat.', ''),
(28, 2, 24, 'Pelanggan akhir teridentifikasi								', ''),
(29, 2, 24, 'Telah mengeluarkan rencana peluncuran produk baru ke pasar secara rinci.								', ''),
(30, 2, 24, 'Telah memulai kesiapan modal intelektual (intellectual capital). 								', ''),
(31, 2, 26, 'Analisis dan rencana bisnis telah dikeluarkan.								', ''),
(32, 2, 26, 'Telah memiliki keterlibatan dengan individu kunci.								', ''),
(33, 2, 26, 'Telah melakukan persetujuan persyaratan proyek dan daftar mitra proyek.								', ''),
(34, 2, 26, 'Telah melakukan persetujuan tanggung jawab dan persetujuan batas waktu dalam pengelolaan suatu proyek.								', ''),
(35, 2, 25, 'Identifikasi teknologi dan komponen kritikal telah komplit.								', ''),
(36, 2, 25, 'Material, perkakas dan alat uji prototipe, maupun keahlian personel telah diperlihatkan oleh sub system/system dalam suatu lingkungan produksi yang relevan.								', ''),
(37, 2, 28, 'Keunggulan nilai jual yang dimiliki telah teruji kepada pelanggan.								', ''),
(38, 2, 28, 'Solusi yang ditawarkan kepada pelanggan memunculkan daya tarik yang menguntungkan di pasar. 								', ''),
(39, 2, 28, 'Validasi value proposition, channel, segmen pelanggan, model hubungan dengan pelanggan yang ada, dan aliran revenue terbukti telah dilakukan.								', ''),
(40, 2, 27, 'Telah melakukan penggalian informasi dan seleksi mitra.								', ''),
(41, 2, 27, 'Pola kemitraan dibangun dengan tepat.								', ''),
(42, 2, 29, 'Kajian risiko teknologi telah dilakukan dalam setiap langkah pengembangan teknologi.								', ''),
(43, 2, 29, 'Pada tahap pengembangan teknologi dilakukan penyusunan rencana pengendalian risiko teknologi.								', '');

-- --------------------------------------------------------

--
-- Table structure for table `tm_user`
--

CREATE TABLE `tm_user` (
  `id_user` int(5) NOT NULL,
  `institution_name` varchar(255) DEFAULT NULL,
  `pic_name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(256) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `phone` varchar(14) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `fax` varchar(14) DEFAULT NULL,
  `file_lampiran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `address` text,
  `role_akun` int(2) DEFAULT NULL,
  `stat_akun` int(2) DEFAULT NULL,
  `log_user` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tm_user`
--

INSERT INTO `tm_user` (`id_user`, `institution_name`, `pic_name`, `email`, `password`, `phone`, `fax`, `file_lampiran`, `address`, `role_akun`, `stat_akun`, `log_user`) VALUES
(7, 'Kemenristek DIKTI', 'administrator', 'admin@gmail.com', '$2y$12$qJ/BDO2iqBJGGnGWZM0pYOWwrdGXhO5XFmUyMSciKfGC8ExRHle0i', '081210101', '021887788', NULL, 'Gedung BPPT II lantai 24, Jl. M.H. Thamrin No. 8,\r\nJakarta Pusat 10340 ', 1, 1, '2020-01-06 07:55:48'),
(22, 'Universitas Pakuan', 'Luis Timothy Rogers', 'adirahman.id@gmail.com', '$2y$12$fGyD5DrC2uyBtP2PdbWNd.pySFFVqJvouATrt1XaMopqQ9Mnik3AO', '081210101', '021887788', '69718f7cdff394cb40b8a023ebf7d2d4.pdf', 'ssdsdsd', 3, 1, '2020-01-08 09:36:07'),
(29, 'Universitas Jambi', 'test localhost', 'com.adirahman@gmail.com', '$2y$12$1uAiz55Mp1TnGuSnGCJaH.giemLqBAem.tafxnvzbRCUheMu0i4D2', '081210101', '021887788', '0f281e738ec18142b188757414ae7e83.pdf', 'jl.cipayung', 3, 1, '2020-01-13 07:25:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `tm_aspek`
--
ALTER TABLE `tm_aspek`
  ADD PRIMARY KEY (`id_aspek`);

--
-- Indexes for table `tm_file_pendukung`
--
ALTER TABLE `tm_file_pendukung`
  ADD PRIMARY KEY (`id_file`);

--
-- Indexes for table `tm_indikator`
--
ALTER TABLE `tm_indikator`
  ADD PRIMARY KEY (`id_indikator`);

--
-- Indexes for table `tm_penilaian`
--
ALTER TABLE `tm_penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `tm_produk`
--
ALTER TABLE `tm_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tm_soal`
--
ALTER TABLE `tm_soal`
  ADD PRIMARY KEY (`id_soal`);

--
-- Indexes for table `tm_user`
--
ALTER TABLE `tm_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tm_aspek`
--
ALTER TABLE `tm_aspek`
  MODIFY `id_aspek` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tm_file_pendukung`
--
ALTER TABLE `tm_file_pendukung`
  MODIFY `id_file` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tm_indikator`
--
ALTER TABLE `tm_indikator`
  MODIFY `id_indikator` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tm_penilaian`
--
ALTER TABLE `tm_penilaian`
  MODIFY `id_penilaian` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `tm_produk`
--
ALTER TABLE `tm_produk`
  MODIFY `id_produk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tm_soal`
--
ALTER TABLE `tm_soal`
  MODIFY `id_soal` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tm_user`
--
ALTER TABLE `tm_user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
