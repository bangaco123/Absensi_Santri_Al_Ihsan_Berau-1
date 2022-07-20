-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jul 2022 pada 13.53
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_santri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `aktif` varchar(5) NOT NULL,
  `foto` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nama_lengkap`, `username`, `password`, `aktif`, `foto`) VALUES
(1, 'MUHAMMAD RIZKY RUHUL F', 'admin', 'f10e2821bbbea527ea02200352313bc059445190', 'Y', 'undraw_profile_2.svg'),
(7, 'ruhul', 'ruhul', 'f10e2821bbbea527ea02200352313bc059445190', 'Y', 'PRIA_1.svg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(11) NOT NULL,
  `nip` varchar(15) NOT NULL,
  `nama_guru` varchar(120) NOT NULL,
  `email` varchar(65) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nip`, `nama_guru`, `email`, `password`, `foto`, `status`) VALUES
(12, '001', 'salim', 'salim@gmail.com', 'e193a01ecf8d30ad0affefd332ce934e32ffce72', 'h.png', 'Y'),
(13, '002', 'saifuddin', 'acobaba422@gmail.com', '6fc978af728d43c59faa400d5f6e0471ac850d4c', 'h.png', 'Y'),
(15, '003', 'sabarudin ado.S.Pd', 'ado@gmail.com', '221407c03ae5c73109cce71d27e24637824f3333', 'PRIA_1.svg', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_master_mapel`
--

CREATE TABLE `tb_master_mapel` (
  `id_mapel` int(11) NOT NULL,
  `kode_mapel` varchar(40) NOT NULL,
  `mapel` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_master_mapel`
--

INSERT INTO `tb_master_mapel` (`id_mapel`, `kode_mapel`, `mapel`) VALUES
(15, 'MP-17-22', 'Hafalan'),
(18, 'MP-17-22', 'pandu'),
(19, 'MP-17-22', 'silat');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mengajar`
--

CREATE TABLE `tb_mengajar` (
  `id_mengajar` int(11) NOT NULL,
  `kode_pelajaran` varchar(30) NOT NULL,
  `hari` varchar(40) NOT NULL,
  `jam_mengajar` varchar(60) NOT NULL,
  `jamke` varchar(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_mapel` int(11) NOT NULL,
  `id_mkelas` int(11) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `id_thajaran` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mengajar`
--

INSERT INTO `tb_mengajar` (`id_mengajar`, `kode_pelajaran`, `hari`, `jam_mengajar`, `jamke`, `id_guru`, `id_mapel`, `id_mkelas`, `id_semester`, `id_thajaran`) VALUES
(29, 'KH-17-22', 'Senin', '07.00-08.00', '1', 12, 15, 30, 4, 8),
(34, 'KH-19-22', 'Selasa', '10.00-10.30', '1', 13, 18, 30, 4, 8),
(35, 'KH-19-22', 'Kamis', '07.00-08.00', '1', 15, 19, 30, 4, 8),
(36, 'KH-20-22', 'Selasa', '10.00-11.00', '2', 12, 15, 31, 4, 8),
(37, 'KH-20-22', 'Rabu', '10.00-10.30', '2', 13, 18, 31, 4, 8),
(38, 'KH-20-22', 'Senin', '07.00-08.00', '1', 15, 19, 31, 4, 8),
(39, 'KH-20-22', 'Senin', '08.00-09.00', '2', 12, 15, 32, 4, 8),
(40, 'KH-20-22', 'Senin', '07.00-08.00', '1', 13, 18, 32, 4, 8),
(41, 'KH-20-22', 'Sabtu', '07.00-08.00', '1', 15, 19, 32, 4, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mkelas`
--

CREATE TABLE `tb_mkelas` (
  `id_mkelas` int(11) NOT NULL,
  `kd_kelas` varchar(40) NOT NULL,
  `nama_kelas` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_mkelas`
--

INSERT INTO `tb_mkelas` (`id_mkelas`, `kd_kelas`, `nama_kelas`) VALUES
(30, 'KL-17', 'VII'),
(31, 'KL-17', 'VIII'),
(32, 'KL-17', 'IX');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_santri`
--

CREATE TABLE `tb_santri` (
  `id_santri` int(11) NOT NULL,
  `nis` varchar(60) NOT NULL,
  `nama_santri` varchar(120) NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tgl_lahir` text NOT NULL,
  `jk` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `status` varchar(15) NOT NULL,
  `th_angkatan` year(4) NOT NULL,
  `no_wa` varchar(13) NOT NULL,
  `id_mkelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_santri`
--

INSERT INTO `tb_santri` (`id_santri`, `nis`, `nama_santri`, `tempat_lahir`, `tgl_lahir`, `jk`, `alamat`, `password`, `foto`, `status`, `th_angkatan`, `no_wa`, `id_mkelas`) VALUES
(62, '030632022', 'ABDILLAH FARHAN', 'BONTANG', '2010-12-01', 'L', 'JL TEKUKUR LABANAN JAYA\r\n', 'd2a03615f0d04375f865d447f7a2ee4f96fabea9', 'PRIA_1.svg', '1', 2022, '6282319753273', 30),
(63, '030642022', 'AHMAD ISWAN', 'BONE', '2009-12-12', 'L', 'HARAPAN JAYA SEGAH\r\n', 'd4ec8d2b3cb179ec3f4dfecc6894a59b84c2da62', 'PRIA_1.svg', '1', 2022, '6285345205416', 30),
(64, '030322022', 'HERDIANSYAH', 'BERAU', '2010-12-05', 'L', 'JL. MILONO\r\n', '1d2c2c68858567b0b362cfca70d0103b2b130792', 'PRIA_1.svg', '1', 2022, '6285345205416', 30),
(65, '030072022', 'IBNU FAJAR', 'BERAU', '2010-10-01', 'L', 'JL. KAKATUA, HARAPAN JAYA, SEGAH\r\n', 'fc52dcf91bc62701c253f1ba1dc625ae8eca79f2', 'PRIA_2.svg', '1', 2022, '6281346291639', 30),
(66, '030032022', 'IMDADDUROHMAN IBNU RABBANI', 'BERAU', '2010-01-03', 'L', 'JL. CUT NYAK DIEN, RINDING\r\n', '9ee426c31f7905ae774becfa01884940e64b599b', 'PRIA_1.svg', '1', 2022, '6281254152606', 30),
(67, '030742022', 'MOCH FECHA ANDHIKA NUR SAPUTRA', 'BERAU', '07-06-2010\n', 'L', 'JL KEDAUNG\r\n', '01caff6ab1913910fa3507253d0606048272667e', 'PRIA_1.svg', '1', 2022, '6282251453787', 30),
(68, '030972022', 'MOHAMMAD ALNURWAN', 'TOLI TOLI', '04-03-2010\n', 'L', 'JL. TRANS SAMBALIUNG\r\n', '38dfdc7c29f7946e89be0bf080a97971dc3b9332', 'PRIA_1.svg', '1', 2022, '6282254352520', 30),
(69, '030912022', 'MUHAMMAD ADLU NABIL L', 'BERAU', '10-05-2010\n', 'L', 'JL. CUT NYAK DIEN RT. 07\r\n', '0771844014614a3e2556dda4b0f3f70308c823ee', 'PRIA_1.svg', '1', 2022, '6282352777967', 30),
(70, '030132022', 'MUHAMMAD AFDAL BRYANTYO', 'SUMATERA BARAT', '0000-00-0011-12-2009\n', 'L', 'JL . PERUMAHAN BERAU INDAH\r\n', 'e91beb80fa58c03dc00218710acc2856b99fba43', 'PRIA_1.svg', '1', 2022, '6285388978774', 30),
(71, '030672022', 'MUHAMMAD AICKAL PRATAMA', 'KASAI', '11-12-2009\n', 'L', 'JL PATTIMURA RT 04 KASAI\r\n', '21f72a42f861a6c458430979e81c174b1e99eb07', 'PRIA_1.svg', '1', 2022, '0847164213123', 30),
(72, '030792021', 'ABDUL HALIM MAULANA', 'SEBATIK', '11-12-2009\n', 'L', 'JL. BUJANGGA GG. AJI SAMSUDIN TANJUNG REDEB\r\n', '2ee2ce67d8a46f0918603cc2628fc7ca611b9d62', 'PRIA_1.svg', '1', 2021, '081350447515', 31),
(73, '030182021', 'ABDUL MUHSIN AL MUJAHID', 'BERAU', '13-03-2010\n', 'L', 'JL.GUNUNG MARITAM\r\n', '47b969857900d6362589290c90c3a2b8841d9f63', 'PRIA_1.svg', '1', 2021, '0813465858336', 31),
(74, '030092021', 'ACHMAD ARIF', 'BERAU', '27-10-2008\n', 'L', 'SAMBAKUNGAN RT 01\r\n', 'e2492423b531d72c13437b2f24c306c334a5d9c8', 'PRIA_1.svg', '1', 2021, '0813465858336', 31),
(75, '030812021', 'ADIS RAMADHAN ATHALAH', 'KEBUMEN', '11-07-2009\n', 'L', 'KAMP. TANJUNG PERRANGAT\r\n', 'd4a0376abfbc752111bade3d5aff79e70c801b0b', 'PRIA_2.svg', '1', 2021, '081313452294', 31),
(76, '030872021', 'AHMAD AGIL SOFYAN', 'BERAU', '27-10-2009\n', 'L', 'TALISAYAN\r\n', '3c3a405e27ad95cb181e0aa63120fddef5172f54', 'PRIA_2.svg', '1', 2021, '0847164213123', 31),
(77, '030062021', 'AL MUHSYAKIR', 'LAMURU', '11-04-2009\n', 'L', 'JL. BUKIT ILANUN ,SAMBALIUNG\r\n', 'f58724214de76197b2992fa62a4c931c8015b8b0', 'PRIA_1.svg', '1', 2021, '082153001139', 31),
(78, '030172021', 'AZIZAN KHAIRUL IKHWAN', 'BERAU', '14-06-2009\n', 'L', 'JL. M.ISWAHYUDI ,RINDING ,TL.BAYUR\r\n', 'dc5198a289da569a136e85c061b7d53d07c99e60', 'PRIA_1.svg', '1', 2021, '085248601374', 31),
(79, '030222021', 'AZKA AHMAD FAUZAN', 'BERAU', '12-12-2007\n', 'L', 'KP.SAMBAKUNGAN RT.03\r\n', 'dde5b48db5f685a7d1ff8a5a0fb75a51cbd110fa', 'PRIA_2.svg', '1', 2021, '628115982338', 30),
(80, '030952021', 'BILAL AZIZAN', 'BERAU', '10-12-2007\n', 'L', 'JL. P.HIDAYATULLAH\r\n', '51aa0b7141be6905c5d887b6d5439be5b2ab46eb', 'PRIA_1.svg', '1', 2021, '082352366520', 31),
(81, '0301052022', 'IDROR SILVI UTAMA', 'BERAU', '28-10-2007\n', 'L', 'GG. MORO SENENG, STASIUN 2 TELUK BAYUR\r\n', '03b0c7d4e0a91f8bc5504738e06ae46fe2fd533f', 'PRIA_1.svg', '1', 2021, '6281253895754', 31),
(82, '030012020', 'Fairuz Fadhilah Rahman', 'Samarinda', '17-05-2007\n', 'L', 'Jl. Pulau Panjang Rt. 33\r\n', 'f6092b50657acbd7b62ecf335a7358098d82270b', 'PRIA_1.svg', '1', 2020, '082230721417', 32),
(83, '030022020', 'Fariel Syhabil Hafazri', 'Berau', '25-11-2007\n', 'L', 'Jl. Bangsawan Rt. 04\r\n', 'c75df7c074bcec70f908af98097ce15331fe676a', 'PRIA_2.svg', '1', 2020, '081347518181', 32),
(84, '030032020', 'Fathul Islam', 'Berau', '16-06-2008\n', 'L', 'Jl. Raya Poros Biatan - Talisayan Rt. 03\r\n', '4eef060f97971fc74c220ef2e71ed14c8c80c750', 'PRIA_1.svg', '1', 2020, '6285216122403', 32),
(85, '030042020', 'Fauzan Aqil Risqullah', 'Berau', '02-07-2008\n', 'L', 'Jln. Milono Rt. 12\r\n', 'd69446aecfd8bb1326b40cc36cdc0b13921acc52', 'PRIA_1.svg', '1', 2020, '082146488840', 32),
(86, '030052020', 'Gagah Maulana Zaha Prianto', 'Malang', '08-11-2007\n', 'L', 'Jl.Bulungan Gg. Family Rt 8\r\n', '56719ac0b61c4bf85a68fcd8d3cc3e73ab9f40f8', 'PRIA_1.svg', '1', 2020, '082141170087', 32),
(87, '030082020', 'Lalu Muhammad Afrizal', 'Berau', '0000-00-00', 'L', 'Perum / Mess PT. HHM, Gunung Sari Rt. 2\r\n', '79dd1dfc232925dd996fd9a52d834d05f9e500f5', 'PRIA_1.svg', '1', 2020, '085349377261', 32),
(88, '030092020', 'Luthfi Fiqri Setio', 'Berau', '0000-00-00', 'L', 'Jl. HARM Ayoeb Gg. Ketapang Blok B Rt. 13\r\n', '17b2db2d8c0015912ec69c71009fa97c82f7660f', 'PRIA_1.svg', '1', 2020, '081347754180', 32),
(89, '030102020', 'Muhammad Arifullah', 'Berau', '0000-00-00', 'L', 'Jln. Poros Sukan\r\n', '42a64089c2e08e3e65a61fdda4101b558d372c21', 'PRIA_1.svg', '1', 2020, '081256661029', 32),
(90, '030112020', 'Muhammad Fauzan', 'Tarakan', '0000-00-00', 'L', 'Gunung Tabur\r\n', '5e655fdf9211acbe89c1c267a949de7004615976', 'PRIA_1.svg', '1', 2020, '6281342480677', 32),
(91, '030122020', 'Muhammad Noor Rizky', 'Berau', '0000-00-00', 'L', 'Jl. Poros Rt. 4, Sukan Rengah\r\n', '5d665958a049b7020f8fa18ed59aafaf8f46d6ea', 'PRIA_2.svg', '1', 2020, '082153001216', 32),
(92, '111', 'Ruhul', 'asdasd', '2022-07-18', 'L', 'qwdasdasd', '6216f8a75fd5bb3d5f22b6f9958cdede3fc086c2', 'PRIA_1.svg', '1', 2021, '12312312312', 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_semester`
--

CREATE TABLE `tb_semester` (
  `id_semester` int(11) NOT NULL,
  `semester` varchar(45) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_semester`
--

INSERT INTO `tb_semester` (`id_semester`, `semester`, `status`) VALUES
(4, 'Ganjil', 1),
(5, 'Genap', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_thajaran`
--

CREATE TABLE `tb_thajaran` (
  `id_thajaran` int(11) NOT NULL,
  `tahun_ajaran` varchar(30) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_thajaran`
--

INSERT INTO `tb_thajaran` (`id_thajaran`, `tahun_ajaran`, `status`) VALUES
(8, '2020/2021', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `_logabsensi`
--

CREATE TABLE `_logabsensi` (
  `id_presensi` int(11) NOT NULL,
  `id_mengajar` int(11) NOT NULL,
  `id_santri` int(11) NOT NULL,
  `tgl_absen` date NOT NULL,
  `ket` enum('H','I','S','T','A','C') NOT NULL,
  `pertemuan_ke` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `_logabsensi`
--

INSERT INTO `_logabsensi` (`id_presensi`, `id_mengajar`, `id_santri`, `tgl_absen`, `ket`, `pertemuan_ke`) VALUES
(175, 29, 62, '2022-07-20', 'H', '1'),
(176, 29, 63, '2022-07-20', 'H', '1'),
(177, 29, 64, '2022-07-20', 'H', '1'),
(178, 29, 65, '2022-07-20', 'H', '1'),
(179, 29, 66, '2022-07-20', 'H', '1'),
(180, 29, 67, '2022-07-20', 'H', '1'),
(181, 29, 68, '2022-07-20', 'H', '1'),
(182, 29, 69, '2022-07-20', 'H', '1'),
(183, 29, 70, '2022-07-20', 'H', '1'),
(184, 29, 71, '2022-07-20', 'H', '1'),
(185, 29, 79, '2022-07-20', 'H', '1'),
(186, 29, 92, '2022-07-20', 'H', '1'),
(187, 34, 62, '2022-07-20', 'H', '1'),
(188, 34, 63, '2022-07-20', 'H', '1'),
(189, 34, 64, '2022-07-20', 'H', '1'),
(190, 34, 65, '2022-07-20', 'H', '1'),
(191, 34, 66, '2022-07-20', 'H', '1'),
(192, 34, 67, '2022-07-20', 'H', '1'),
(193, 34, 68, '2022-07-20', 'H', '1'),
(194, 34, 69, '2022-07-20', 'H', '1'),
(195, 34, 70, '2022-07-20', 'H', '1'),
(196, 34, 71, '2022-07-20', 'H', '1'),
(197, 34, 79, '2022-07-20', 'H', '1'),
(198, 34, 92, '2022-07-20', 'H', '1'),
(199, 37, 72, '2022-07-20', 'H', '1'),
(200, 37, 73, '2022-07-20', 'H', '1'),
(201, 37, 74, '2022-07-20', 'H', '1'),
(202, 37, 75, '2022-07-20', 'H', '1'),
(203, 37, 76, '2022-07-20', 'H', '1'),
(204, 37, 77, '2022-07-20', 'H', '1'),
(205, 37, 78, '2022-07-20', 'H', '1'),
(206, 37, 80, '2022-07-20', 'H', '1'),
(207, 37, 81, '2022-07-20', 'H', '1'),
(208, 40, 82, '2022-07-20', 'H', '1'),
(209, 40, 83, '2022-07-20', 'H', '1'),
(210, 40, 84, '2022-07-20', 'H', '1'),
(211, 40, 85, '2022-07-20', 'H', '1'),
(212, 40, 86, '2022-07-20', 'H', '1'),
(213, 40, 87, '2022-07-20', 'H', '1'),
(214, 40, 88, '2022-07-20', 'H', '1'),
(215, 40, 89, '2022-07-20', 'H', '1'),
(216, 40, 90, '2022-07-20', 'H', '1'),
(217, 40, 91, '2022-07-20', 'H', '1'),
(218, 35, 62, '2022-07-20', 'H', '1'),
(219, 35, 63, '2022-07-20', 'H', '1'),
(220, 35, 64, '2022-07-20', 'H', '1'),
(221, 35, 65, '2022-07-20', 'H', '1'),
(222, 35, 66, '2022-07-20', 'H', '1'),
(223, 35, 67, '2022-07-20', 'H', '1'),
(224, 35, 68, '2022-07-20', 'H', '1'),
(225, 35, 69, '2022-07-20', 'H', '1'),
(226, 35, 70, '2022-07-20', 'H', '1'),
(227, 35, 71, '2022-07-20', 'H', '1'),
(228, 35, 79, '2022-07-20', 'H', '1'),
(229, 35, 92, '2022-07-20', 'H', '1'),
(230, 38, 72, '2022-07-20', 'H', '1'),
(231, 38, 73, '2022-07-20', 'H', '1'),
(232, 38, 74, '2022-07-20', 'H', '1'),
(233, 38, 75, '2022-07-20', 'H', '1'),
(234, 38, 76, '2022-07-20', 'H', '1'),
(235, 38, 77, '2022-07-20', 'H', '1'),
(236, 38, 78, '2022-07-20', 'H', '1'),
(237, 38, 80, '2022-07-20', 'H', '1'),
(238, 38, 81, '2022-07-20', 'H', '1'),
(239, 41, 82, '2022-07-20', 'H', '1'),
(240, 41, 83, '2022-07-20', 'H', '1'),
(241, 41, 84, '2022-07-20', 'H', '1'),
(242, 41, 85, '2022-07-20', 'H', '1'),
(243, 41, 86, '2022-07-20', 'H', '1'),
(244, 41, 87, '2022-07-20', 'H', '1'),
(245, 41, 88, '2022-07-20', 'H', '1'),
(246, 41, 89, '2022-07-20', 'H', '1'),
(247, 41, 90, '2022-07-20', 'H', '1'),
(248, 41, 91, '2022-07-20', 'H', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `tb_master_mapel`
--
ALTER TABLE `tb_master_mapel`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indeks untuk tabel `tb_mengajar`
--
ALTER TABLE `tb_mengajar`
  ADD PRIMARY KEY (`id_mengajar`),
  ADD KEY `id_mapel` (`id_mapel`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indeks untuk tabel `tb_mkelas`
--
ALTER TABLE `tb_mkelas`
  ADD PRIMARY KEY (`id_mkelas`);

--
-- Indeks untuk tabel `tb_santri`
--
ALTER TABLE `tb_santri`
  ADD PRIMARY KEY (`id_santri`) USING BTREE;

--
-- Indeks untuk tabel `tb_semester`
--
ALTER TABLE `tb_semester`
  ADD PRIMARY KEY (`id_semester`);

--
-- Indeks untuk tabel `tb_thajaran`
--
ALTER TABLE `tb_thajaran`
  ADD PRIMARY KEY (`id_thajaran`);

--
-- Indeks untuk tabel `_logabsensi`
--
ALTER TABLE `_logabsensi`
  ADD PRIMARY KEY (`id_presensi`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tb_master_mapel`
--
ALTER TABLE `tb_master_mapel`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tb_mengajar`
--
ALTER TABLE `tb_mengajar`
  MODIFY `id_mengajar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT untuk tabel `tb_mkelas`
--
ALTER TABLE `tb_mkelas`
  MODIFY `id_mkelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `tb_santri`
--
ALTER TABLE `tb_santri`
  MODIFY `id_santri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT untuk tabel `tb_semester`
--
ALTER TABLE `tb_semester`
  MODIFY `id_semester` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_thajaran`
--
ALTER TABLE `tb_thajaran`
  MODIFY `id_thajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `_logabsensi`
--
ALTER TABLE `_logabsensi`
  MODIFY `id_presensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
