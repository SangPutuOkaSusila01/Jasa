-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Des 2023 pada 14.06
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.2.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ajumas`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL DEFAULT 0,
  `username_admin` varchar(100) NOT NULL DEFAULT '',
  `password_admin` varchar(100) DEFAULT '',
  `foto_admin` varchar(255) DEFAULT NULL,
  `verifikasi` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username_admin`, `password_admin`, `foto_admin`, `verifikasi`) VALUES
(1, 'admin', 'admin', NULL, NULL),
(2, 'athallah', '123masuk', NULL, NULL),
(3, 'aulia', '123masuk', NULL, NULL),
(4, 'laras', '123masuk', NULL, NULL),
(5, 'yefi', '123masuk', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `daftar_jasa`
--

CREATE TABLE `daftar_jasa` (
  `id_daftar_jasa` int(11) NOT NULL,
  `id_penyedia_jasa` varchar(100) DEFAULT NULL,
  `nama_jasa` varchar(150) DEFAULT NULL,
  `jenis_jasa` varchar(100) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `deskripsi_jasa` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `daftar_jasa`
--

INSERT INTO `daftar_jasa` (`id_daftar_jasa`, `id_penyedia_jasa`, `nama_jasa`, `jenis_jasa`, `foto`, `deskripsi_jasa`) VALUES
(1, '30', 'Fotografi', 'Fotografi', 'fotografi.svg', 'kami siap, melayani anda dengan sepenuhati !!'),
(2, '33', 'Service Electronik', 'Service_Elektronik', 'elektronik.svg', 'kami siap, melayani anda dengan sepenuhati !!'),
(3, '', 'Service Kendaraan', 'Service_Kendaraan', 'kendaraan.svg', 'kami siap, melayani anda dengan sepenuhati !!'),
(4, '35', 'Dekorasi', 'Dekorasi', 'dekorasi1.svg', 'kami siap, melayani anda dengan sepenuhati !!'),
(5, '36', 'Cukur Rambut', 'Cukur_Rambut', 'cukur_rambut.svg', 'kami siap, melayani anda dengan sepenuhati !!'),
(6, '38', 'Pencucian Motor', 'Pencucian_Motor', 'Pencucian.png', 'kami siap, melayani anda dengan sepenuhati !!');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang_pesanan`
--

CREATE TABLE `keranjang_pesanan` (
  `Id_keranjang_pemesan` int(11) NOT NULL,
  `jenis_jasa` varchar(100) NOT NULL DEFAULT '',
  `id_penyedia_jasa` varchar(50) NOT NULL,
  `id_pengguna_jasa` varchar(50) DEFAULT NULL,
  `nama_penyedia` varchar(255) DEFAULT NULL,
  `tanggal_pemesan` date NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `telepon_pemesan` varchar(50) NOT NULL,
  `alamat_pemesan` varchar(255) NOT NULL,
  `permintaan_pemesan` varchar(255) NOT NULL,
  `status_pemesan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keranjang_pesanan`
--

INSERT INTO `keranjang_pesanan` (`Id_keranjang_pemesan`, `jenis_jasa`, `id_penyedia_jasa`, `id_pengguna_jasa`, `nama_penyedia`, `tanggal_pemesan`, `nama_pemesan`, `telepon_pemesan`, `alamat_pemesan`, `permintaan_pemesan`, `status_pemesan`) VALUES
(94, 'Fotografi', '56', '16', 'uututututututututu', '2023-11-14', 'oka2', '08121314151', 'watolo2', 'gdgdgd5656565', '0'),
(101, 'Fotografi', '30 ', '16', 'Al basrin Yamin', '2023-11-14', 'oka2', '08121314151', 'watolo2', 'fotoooo saja', '1'),
(104, 'Fotografi', '30', '17', 'Al basrin Yamin', '2023-11-15', 'yamin', '082192114441', 'watolo', 'foto keluarga', '0'),
(105, 'Fotografi', '30 ', '23', 'Al basrin Yamin', '2023-11-19', 'Hendri', '081340184940', '12345', 'foto bareng mantan', '0'),
(106, 'Service_Elektronik', '33', '23', 'ANZA', '2023-11-19', 'Hendri', '081340184940', '12345', 'foto', '0'),
(107, 'Fotografi', '31', '32', 'Muhamad  Harzan', '2023-11-22', 'Putri', '085255667788', 'Kolaka Utara', 'foto keluarga', '1'),
(109, 'Fotografi', '31', '33', 'Muhamad  Harzan', '2023-11-22', 'Yamin', '0823776655', 'mawasangka induk', 'Foto frewedding', '1'),
(110, 'Service_Kendaraan', '34', '33', 'Raditya', '2023-11-22', 'Yamin', '0823776655', 'mawasangka induk', 'perbaiki lampu motor', '1'),
(111, 'Service_Kendaraan', '59', '32', 'Fikram ', '2023-11-22', 'Putri', '085255667788', 'Kolaka Utara', 'Ganti ban motor', '1'),
(112, 'Cukur_Rambut', '36', '32', 'Pak Afi', '2023-11-22', 'Putri', '085255667788', 'Kolaka Utara', 'cukur rambut', '1'),
(113, 'Fotografi', '31', '32', 'Muhamad  Harzan', '2023-12-09', 'Putri', '085255667788', 'Kolaka Utara', 'Testing', '0'),
(126, 'Fotografi', '54', '36', 'Al basrin Yamin', '2023-12-14', 'putu narsih', '0777', 'bali', 'pesan paket komplit saja', '0'),
(127, 'Fotografi', '54', '33', 'Al basrin Yamin', '2023-12-14', 'Yamin', '0823776655', 'mawasangka induk', 'pesan paket 1 saja bang', '1'),
(128, 'Fotografi', '54', '33', 'Al basrin Yamin', '2023-12-15', 'Yamin', '0823776655', 'mawasangka induk', 'pesan paket terakhir', '0'),
(129, 'Fotografi', '54', '32', 'Al basrin Yamin', '2023-12-15', 'Putri', '085255667788', 'Kolaka Utara', 'pesan paket2', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `login`
--

CREATE TABLE `login` (
  `id_user` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL DEFAULT '',
  `password` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `kd_verikasi` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `login`
--

INSERT INTO `login` (`id_user`, `userid`, `nama`, `password`, `foto`, `level`, `kd_verikasi`) VALUES
(2, '0855', 'SANG PUTU OKA SUSILA', '123', '08934567788.png', 'admin', '1'),
(47, '081392850201', 'Muhamad  Harzan', 'ajumas', '081392850201.png', 'penyedia_jasa', '1'),
(48, '08114405694', 'Aditya Purwanto Sadif', 'ajumas', '08114405694.png', 'penyedia_jasa', '1'),
(50, '081295544903', 'Raditya', 'ajumas', '081295544903.png', 'penyedia_jasa', '1'),
(51, '085240283863', 'Jafaruddin', 'ajumas', '085240283863.jpg', 'penyedia_jasa', '1'),
(52, '082213998418', 'Pak Afi', 'ajumas', '082213998418.png', 'penyedia_jasa', '1'),
(53, '083213988418', 'Ahmad', 'ajumas', '083213988418.jpg', 'penyedia_jasa', '1'),
(54, '081153047865', 'Putra', 'ajumas', '081153047865.jpg', 'penyedia_jasa', '1'),
(77, '082397527891', 'Al basrin Yamin', 'ajumas', '082397527891.png', 'penyedia_jasa', '1'),
(84, '085255667788', 'Putri', 'ajumas', '085255667788.png', 'pengguna_jasa', '1'),
(85, '0823776655', 'Yamin', 'ajumas', '0823776655.png', 'pengguna_jasa', '1'),
(86, '082210335150', 'ANZA', 'ajumas', '082210335150.png', 'penyedia_jasa', '1'),
(87, '08535285665', 'Fikram ', 'ajumas', '08535285665.png', 'penyedia_jasa', '0'),
(90, '0777', 'putu narsih', 'ajumas', '0777.jpg', 'pengguna_jasa', '1'),
(91, '09999', 'ff', 'ajumas', '09999.jpg', 'penyedia_jasa', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mekanik`
--

CREATE TABLE `mekanik` (
  `id_mekanik` int(11) NOT NULL,
  `nama_mekanik` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mekanik`
--

INSERT INTO `mekanik` (`id_mekanik`, `nama_mekanik`) VALUES
(1, 'Shawn Mendes'),
(2, 'Harry Styles');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `jenis_jasa` varchar(100) NOT NULL,
  `id_pengguna_jasa` int(11) NOT NULL,
  `tanggal_pemesanan` date NOT NULL,
  `nama_pemesan` varchar(100) NOT NULL,
  `telepon_pemesan` int(15) NOT NULL,
  `alamat_pemesan` varchar(100) NOT NULL,
  `permintaan_pemesan` varchar(500) NOT NULL,
  `biaya_jasa` int(100) NOT NULL,
  `biaya_tambahan` int(100) NOT NULL,
  `keterangan` varchar(1000) NOT NULL,
  `status_pemesanan` varchar(100) NOT NULL DEFAULT 'Pesanan Diterima'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `jenis_jasa`, `id_pengguna_jasa`, `tanggal_pemesanan`, `nama_pemesan`, `telepon_pemesan`, `alamat_pemesan`, `permintaan_pemesan`, `biaya_jasa`, `biaya_tambahan`, `keterangan`, `status_pemesanan`) VALUES
(14, 'Service Handphone', 13, '2021-06-05', 'Justin Bieberwee', 2147483647, 'Jl. Imajinasi No 99', 'Hp rusak karena kebanyakan notifikasi, efek orang ganteng', 0, 0, '', 'Pesanan Diterima'),
(15, 'Service Mobil', 13, '2021-06-05', 'Justin Bieber', 2147483647, 'Jl. Imajinasi No. 99', 'Mobil tidak bisa menyala', 0, 0, '', 'Pesanan Diterima'),
(16, 'Service Handphone', 14, '2021-06-07', 'Ariana Grande', 2147483647, 'Jl. Kenangan No 100', 'Rusak layar', 100000, 50000, ' Beli layar baru', 'selesai');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna_jasa`
--

CREATE TABLE `pengguna_jasa` (
  `id_pengguna_jasa` int(11) NOT NULL,
  `nama_pengguna` varchar(30) DEFAULT NULL,
  `jk` varchar(1) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `no_hp` varchar(12) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `kd_verikasi` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengguna_jasa`
--

INSERT INTO `pengguna_jasa` (`id_pengguna_jasa`, `nama_pengguna`, `jk`, `alamat`, `tempat_lahir`, `tanggal_lahir`, `no_hp`, `foto`, `kd_verikasi`) VALUES
(32, 'Putri', 'P', 'Kolaka Utara', 'kolak', '2001-10-14', '085255667788', '085255667788.png', '1'),
(33, 'Yamin', 'L', 'mawasangka induk', 'mawasangka', '1987-11-26', '0823776655', '0823776655.png', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyedia_jasa`
--

CREATE TABLE `penyedia_jasa` (
  `id_penyedia_jasa` int(11) NOT NULL,
  `nama_penyedia` varchar(100) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `jk` varchar(1) DEFAULT NULL,
  `tempat_lahir` varchar(150) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `nama_brand` varchar(255) DEFAULT NULL,
  `jenis_jasa` varchar(100) DEFAULT NULL,
  `no_hp` varchar(12) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `foto1` varchar(100) DEFAULT NULL,
  `foto2` varchar(100) DEFAULT NULL,
  `foto3` varchar(255) NOT NULL,
  `kisaran_harga` varchar(200) DEFAULT NULL,
  `deskripsi_jasa` mediumtext DEFAULT NULL,
  `profil_penyedia` varchar(255) NOT NULL,
  `kd_verikasi` varchar(1) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyedia_jasa`
--

INSERT INTO `penyedia_jasa` (`id_penyedia_jasa`, `nama_penyedia`, `alamat`, `jk`, `tempat_lahir`, `tanggal_lahir`, `nama_brand`, `jenis_jasa`, `no_hp`, `foto`, `foto1`, `foto2`, `foto3`, `kisaran_harga`, `deskripsi_jasa`, `profil_penyedia`, `kd_verikasi`) VALUES
(31, 'Muhamad  Harzan', 'Lingk, Pokawa-kawa, Kel, Watolo, Kec, Mawasangka', 'L', 'Mawasangka', '1990-09-30', 'GHA STUDIO', 'Fotografi', '081392850201', '081392850201.png', '081392850201.jpg', '081392850201.jpg', '081392850201.jpg', '10000-30000', '<p>PAKET I: Harga 3.500.000 - Foto dokumentasi - Unlimited shoot - 1 Album magnetik 20 sheet (40 Hal) isi 234 foto Uk 4R+ sampul foto Uk 10 R -1 Album magnetik 20 sheet (40 Hal) isi 240 foto Uk 4R -1 Foto 50x60 (20R) + bingkai - Disc seluruh file foto&nbsp;</p><p>PAKET II: Harga 2.500.000 - Foto dokumentasi - Unlimited shoot - 1 Album magnetik 15 sheet (30 Hal) isi 174 foto Uk 4R+ sampul Uk 10 R -1 Foto 25x35 (14R) + bingkai - Disc seluruh file foto</p><p>PAKET III: Harga 2.000.000 - Foto dokumentasi - Unlimited shoot - 1 Album magnetik 10 sheet (20 Hal) isi 115 foto Uk 4R + sampul Uk 10 R - 1 Foto 30x40 (12R) + bingkai - Disc seluruh file foto</p><p>PAKET IV: HARGA 1.800.000 -Foto dokumentasi -Unlimited shoot -1 album magnetik 10 Sheet (10 Hal) isi 85 foto UK 4R+ Sampul Uk 10 R -1 foto 20X25(10R) + bingkai -Disc seluruh file&nbsp;</p>', '<p>Nama : Muhamad Harzan</p><p>Jam buka : Setiap hari dari jam 07:00-17:00</p><p>Alamat : Lingk, Pokawa-kawa, Kel, Watolo, Kec, Mawasangka</p><p>Nomor Telpon : 081392850201</p><p><br></p>', '1'),
(32, 'Aditya Purwanto Sadif', 'jln.R.A.kartini no 21 kec, Mawasangka', 'L', 'Mawasangka', '2014-05-13', 'Piknikyukk.id', 'Fotografi', '08114405694', '08114405694.png', '08114405694.jpg', '08114405694.jpg', '08114405694.jpg', '10000-30000', '<p>Paket Pravate, trip buton tengah Rp 2.000.000,00 DESTINATIONS- Pasir Timbul, Pantai Labobo, Tanjung Buaya, Danau Anano Tei, Danau Fotu, Kotayono, Gua Bidadari, Gua Maobu, Pantai Wantopi, Gua Koo, Pantai Mutiara.&nbsp;</p><p>Paket 1 hari Trip Buton Tengah Rp 250.000,00 DESTINATIONS - Kotayono, Gua Bidadari, Pantai Mutiara, Pantai Labobo.INCLUDE - Mobil Driver, Guide, BBM, Dokumentasi, Tiket Masuk, Antar Jemput, Makan 1X.&nbsp;</p>', '<p>Nama : Aditya Purwanto Sadifa</p><p>Alamat : jln.R.A.kartini no 21 kec, Mawasangka</p><p>Nomor Telpon : 08114405694</p>', '1'),
(34, 'Raditya', 'Lingk, Pantai Nelayan, Kel, Watolo, Kec, Mawasangka', 'L', 'Mawasangka', '2015-06-05', 'Raditya Motor', 'Service_Kendaraan', '081295544903', '081295544903.png', NULL, NULL, '', '10000-30000', NULL, '', '1'),
(35, 'Jafaruddin', 'Lingk, Kaweli Bawah, Kel, Watolo, Kec, Mawasangka', 'L', 'Mawasangka', '2017-06-14', 'Uli Salon', 'Dekorasi', '085240283863', '085240283863.jpg', NULL, NULL, '', '10000-30000', NULL, '', '1'),
(36, 'Pak Afi', 'Lingk, Pasar, Kel, Watolo,  Kec, Mawasangka', 'L', 'Mawasangka', '2014-06-09', 'Pangkas Rambut Afi', 'Cukur_Rambut', '082213998418', '082213998418.png', NULL, NULL, '', '10000-30000', NULL, '', '1'),
(37, 'Ahmad', 'Lingk, Pasar, Kel, Watolo,  Kec, Mawasangka', 'L', 'Mawasangka', '2012-05-07', 'Pangakas Cukur Ahmad', 'Cukur_Rambut', '083213988418', '083213988418.jpg', NULL, NULL, '', '10000-30000', NULL, '', '1'),
(38, 'Putra', 'Lingk, Kaweli Bawah, Kel, Watolo, Kec, Mawasangka', 'L', 'Mawasangka', '2008-01-29', 'Cuci Motor putra', 'Pencucian_Motor', '081153047865', '081153047865.jpg', NULL, NULL, '', '10000-30000', NULL, '', '1'),
(54, 'Al basrin Yamin', 'Lingk, Kaweli, Kel, Mawasangka, Kec, Mawasangka', 'L', 'mawasangka', '1999-05-03', 'ABY FOTO GRAFI', 'Fotografi', '082397527891', '082397527891.png', '082397527891.jpg', '082397527891.jpg', '082397527891.jpeg', '20000-30000', '<p>PAKET I: Harga 3.500.000 - Foto dokumentasi - Unlimited shoot - 1 Album magnetik 20 sheet (40 Hal) isi 234 foto Uk 4R+ sampul foto Uk 10 R -1 Album magnetik 20 sheet (40 Hal) isi 240 foto Uk 4R -1 Foto 50x60 (20R) + bingkai - Disc seluruh file foto&nbsp;</p><p>PAKET II: Harga 2.500.000 - Foto dokumentasi - Unlimited shoot - 1 Album magnetik 15 sheet (30 Hal) isi 174 foto Uk 4R+ sampul Uk 10 R -1 Foto 25x35 (14R) + bingkai - Disc seluruh file foto</p><p>PAKET III: Harga 2.000.000 - Foto dokumentasi - Unlimited shoot - 1 Album magnetik 10 sheet (20 Hal) isi 115 foto Uk 4R + sampul Uk 10 R - 1 Foto 30x40 (12R) + bingkai - Disc seluruh file foto</p><p>PAKET IV: HARGA 1.800.000 -Foto dokumentasi -Unlimited shoot -1 album magnetik 10 Sheet (10 Hal) isi 85 foto UK 4R+ Sampul Uk 10 R -1 foto 20X25(10R) + bingkai -Disc seluruh file&nbsp;</p>', '', '1'),
(58, 'ANZA', 'Lingk, pasar, Kel, Mawasangka, Kec, Mawasangka', 'L', 'Ujung Pndang', '1986-09-19', 'Anza Service', 'Service_Elektronik', '082210335150', '082210335150.png', NULL, NULL, '082210335150.jpg', '50000-500000', NULL, '', '1'),
(59, 'Fikram ', 'Lingk,Watolo,kecamatan, mawasangka', 'L', 'Kalimantan', '1987-07-06', 'Fikram Motor', 'Service_Kendaraan', '08535285665', '08535285665.png', NULL, NULL, '', '500000-100000', NULL, '', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `kategori_produk` varchar(100) NOT NULL,
  `bt_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `kategori_produk`, `bt_produk`, `foto_produk`, `deskripsi_produk`) VALUES
(1, 'Service Motor', 'transportasi', 10000, 'motor.png', 'Melayani servis dengan kerusakan ringan, sedang dan berat.'),
(2, 'Service Mobil', 'transportasi', 9000, 'mobil.png', 'Melayani servis dengan kerusakan ringan, sedang dan berat.'),
(3, 'Service Handphone', 'elektronik', 9000, 'hp.png', 'Melayani servis dengan kerusakan ringan, sedang dan berat.'),
(4, 'Servis Komputer', 'elektronik', 9000, 'pc.png', 'Melayani servis dengan kerusakan ringan, sedang dan berat.'),
(5, 'Servis Mesin Cuci', 'rumah tangga', 9000, 'mesincuci.png', 'Melayani servis dengan kerusakan ringan, sedang dan berat.'),
(6, 'Service Blender', 'rumah tangga', 9000, 'blender.png', 'Melayani servis dengan kerusakan ringan, sedang dan berat.'),
(7, 'Service Setrika', 'rumah tangga', 9000, 'setrika.png', 'Melayani servis dengan kerusakan ringan, sedang dan berat.'),
(8, 'Service AC', 'elektronik', 9000, 'ac.png', 'Melayani service AC dengan kerusakan ringan, sedang dan berat'),
(9, 'Service Kipas', 'Elektronik', 9000, 'kipas.png', 'Melayani Service Kipas dengan segala kerusakan.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `id_penyedia_jasa` varchar(10) NOT NULL DEFAULT '',
  `id_pengguna_jasa` varchar(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `rating` int(30) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `waktu_terakhir_rating` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rating`
--

INSERT INTO `rating` (`id_rating`, `id_penyedia_jasa`, `id_pengguna_jasa`, `nama`, `rating`, `waktu`, `waktu_terakhir_rating`) VALUES
(20, '31', '32', 'Muhamad  Harzan', 2, '2023-12-02 04:07:35', '2023-12-02 05:07:35'),
(21, '34', '32', 'Raditya', 4, '2023-12-02 04:20:51', '2023-12-02 05:20:51'),
(22, '31', '33', 'Muhamad  Harzan', 5, '2023-12-02 04:25:42', '2023-12-02 05:25:42'),
(23, '58', '33', 'ANZA', 4, '2023-12-02 04:34:04', '2023-12-02 05:34:04'),
(24, '34', '33', 'Raditya', 0, '2023-12-02 04:40:15', '2023-12-02 05:40:15'),
(25, '35', '33', 'Jafaruddin', 5, '2023-12-02 04:46:55', '2023-12-02 05:46:55'),
(26, '35', '32', 'Jafaruddin', 2, '2023-12-02 04:47:18', '2023-12-02 05:47:18'),
(27, '58', '32', 'ANZA', 4, '2023-12-03 15:47:14', '2023-12-03 16:47:14'),
(28, '31', '32', 'Muhamad  Harzan', 1, '2023-12-03 15:47:23', '2023-12-03 16:47:23'),
(29, '32', '32', 'Aditya Purwanto Sadif', 2, '2023-12-03 15:47:39', '2023-12-03 16:47:39'),
(30, '31', '32', 'Muhamad  Harzan', 5, '2023-12-09 01:51:41', '2023-12-09 02:51:41'),
(31, '54', '32', 'Al basrin Yamin', 5, '2023-12-11 12:00:22', '2023-12-11 13:00:22');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `daftar_jasa`
--
ALTER TABLE `daftar_jasa`
  ADD PRIMARY KEY (`id_daftar_jasa`);

--
-- Indeks untuk tabel `keranjang_pesanan`
--
ALTER TABLE `keranjang_pesanan`
  ADD PRIMARY KEY (`Id_keranjang_pemesan`);

--
-- Indeks untuk tabel `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `mekanik`
--
ALTER TABLE `mekanik`
  ADD PRIMARY KEY (`id_mekanik`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`);

--
-- Indeks untuk tabel `pengguna_jasa`
--
ALTER TABLE `pengguna_jasa`
  ADD PRIMARY KEY (`id_pengguna_jasa`);

--
-- Indeks untuk tabel `penyedia_jasa`
--
ALTER TABLE `penyedia_jasa`
  ADD PRIMARY KEY (`id_penyedia_jasa`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`,`id_penyedia_jasa`,`id_pengguna_jasa`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `daftar_jasa`
--
ALTER TABLE `daftar_jasa`
  MODIFY `id_daftar_jasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `keranjang_pesanan`
--
ALTER TABLE `keranjang_pesanan`
  MODIFY `Id_keranjang_pemesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT untuk tabel `login`
--
ALTER TABLE `login`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `pengguna_jasa`
--
ALTER TABLE `pengguna_jasa`
  MODIFY `id_pengguna_jasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `penyedia_jasa`
--
ALTER TABLE `penyedia_jasa`
  MODIFY `id_penyedia_jasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT untuk tabel `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
