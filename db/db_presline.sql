-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Okt 2023 pada 15.24
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
-- Database: `db_presline`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_chat`
--

CREATE TABLE `tb_chat` (
  `id_chat` int(11) NOT NULL,
  `id_chat_type` tinyint(4) NOT NULL DEFAULT 1,
  `isi_chat` varchar(1000) NOT NULL,
  `chat_by` varchar(20) NOT NULL,
  `chat_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `chat_modified` timestamp NOT NULL DEFAULT current_timestamp(),
  `chat_point` int(11) DEFAULT NULL,
  `id_mk_sesi` int(11) NOT NULL,
  `status_chat` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0 deleted\r\n-1 deleted by dosen',
  `chat_opsi` varchar(1000) DEFAULT NULL,
  `durasi_jawab` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_chat`
--

INSERT INTO `tb_chat` (`id_chat`, `id_chat_type`, `isi_chat`, `chat_by`, `chat_date`, `chat_modified`, `chat_point`, `id_mk_sesi`, `status_chat`, `chat_opsi`, `durasi_jawab`) VALUES
(1, 1, 'Haloo...', 'abi', '2022-06-06 12:46:31', '2022-06-10 07:10:50', 0, 1, 1, NULL, NULL),
(2, 1, 'halo juga Pak!! Lorem ipsum occaecat in aute culpa sed anim laborum in aliqua commodo veniam nulla sit. Esse mollit cupidatat anim commodo dolore cillum aliquip incididunt ea dolore. Culpa fugiat ad ullamco occaecat aliqua exercitation labore enim in adipisicing ut cupidatat nostrud aliqua esse.', 'ahmad', '2022-06-06 13:01:17', '2022-06-10 07:10:50', NULL, 1, -1, NULL, NULL),
(3, 1, 'Gimana kabarnya? Lorem ipsum occaecat in aute culpa sed anim laborum in aliqua commodo veniam nulla sit. Esse mollit cupidatat anim commodo dolore cillum aliquip incididunt ea dolore. Culpa fugiat ad ullamco occaecat aliqua exercitation labore enim in adipisicing ut cupidatat nostrud aliqua esse. ', 'abi', '2022-06-06 13:14:45', '2022-06-10 07:10:50', NULL, 1, 0, NULL, NULL),
(4, 1, 'alhamdulillah sehat Pak!', 'salwa', '2022-06-07 02:33:44', '2022-06-10 07:10:50', 45, 1, 1, NULL, NULL),
(5, 1, 'sehat Pak, alhamdulillah.', 'ahmad', '2022-06-08 03:10:28', '2022-06-10 07:10:50', 79, 1, 1, NULL, NULL),
(6, 1, 'asdasdasd', 'ahmad', '2022-06-07 07:38:59', '2022-06-10 07:10:50', NULL, 1, -1, NULL, NULL),
(14, 1, 'nnn', 'salwa', '2022-06-07 11:55:25', '2022-06-10 07:10:50', 100, 1, -1, NULL, NULL),
(15, 1, 'ooo', 'ahmad', '2022-06-07 11:55:40', '2022-06-10 07:10:50', NULL, 1, 0, NULL, NULL),
(16, 1, 'ppp', 'abi', '2022-06-07 11:55:50', '2022-06-10 07:10:50', NULL, 1, 0, NULL, NULL),
(17, 1, 'aaa', 'abi', '2022-06-07 12:03:34', '2022-06-10 07:10:50', NULL, 1, 0, NULL, NULL),
(18, 1, 'bbb', 'ahmad', '2022-06-07 12:03:43', '2022-06-10 07:10:50', NULL, 1, -1, NULL, NULL),
(19, 1, 'c', 'salwa', '2022-06-07 12:04:37', '2022-06-10 07:10:50', NULL, 1, -1, NULL, NULL),
(20, 1, 'cv', 'ahmad', '2022-06-07 12:04:38', '2022-06-10 07:10:50', NULL, 1, -1, NULL, NULL),
(21, 1, 'cvb', 'ahmad', '2022-06-07 12:04:40', '2022-06-10 07:10:50', NULL, 1, -1, NULL, NULL),
(22, 1, 'aaa', 'abi', '2022-06-07 12:19:24', '2022-06-10 07:10:50', NULL, 1, 0, NULL, NULL),
(23, 1, 'aaa', 'abi', '2022-06-07 12:37:59', '2022-06-10 07:10:50', NULL, 1, 0, NULL, NULL),
(24, 1, 'asd', 'abi', '2022-06-07 12:38:36', '2022-06-10 07:10:50', NULL, 1, 0, NULL, NULL),
(25, 1, 'asdddad', 'ahmad', '2022-06-08 12:38:22', '2022-06-10 07:10:50', NULL, 1, -1, NULL, NULL),
(26, 1, 'chumaeroh is typing', 'ahmad', '2022-06-08 12:38:57', '2022-06-10 07:10:50', NULL, 1, -1, NULL, NULL),
(27, 1, '31212189 chumaeroh is typing', '31212189', '2022-06-08 12:41:18', '2022-06-10 07:10:50', NULL, 1, 0, NULL, NULL),
(28, 1, 'Rohadi Utoyo is typing...', '31222220', '2022-06-08 12:50:27', '2022-06-10 07:10:50', NULL, 1, 0, NULL, NULL),
(29, 1, 'ahmad ngetik sesuatu', 'ahmad', '2022-06-08 14:00:04', '2022-06-10 07:10:50', NULL, 1, 0, NULL, NULL),
(30, 1, 'dcdcdc', 'ahmad', '2022-06-08 14:02:27', '2022-06-10 07:10:50', NULL, 1, 0, NULL, NULL),
(31, 1, 'sdasdasd', 'ahmad', '2022-06-08 14:04:00', '2022-06-10 07:10:50', NULL, 1, 0, NULL, NULL),
(32, 1, 'zzz', 'ahmad', '2022-06-08 14:05:58', '2022-06-10 07:10:50', NULL, 1, 0, NULL, NULL),
(33, 1, 'xxx', 'ahmad', '2022-06-08 14:06:52', '2022-06-10 07:10:50', NULL, 1, 0, NULL, NULL),
(34, 1, 'asdf', '31212189', '2022-06-09 01:51:45', '2022-06-10 07:10:50', NULL, 1, 0, NULL, NULL),
(35, 1, 'fff', 'ahmad', '2022-06-09 02:20:00', '2022-06-10 07:10:50', NULL, 1, 0, NULL, NULL),
(36, 1, 'gg', 'ahmad', '2022-06-09 02:50:47', '2022-06-10 07:10:50', NULL, 1, 0, NULL, NULL),
(37, 1, 'cc', 'ahmad', '2022-06-09 03:07:39', '2022-06-10 07:10:50', NULL, 1, 0, NULL, NULL),
(38, 1, 'zzz', 'ahmad', '2022-06-09 03:25:57', '2022-06-10 07:10:50', NULL, 1, 0, NULL, NULL),
(39, 1, 'zzz', 'ahmad', '2022-06-09 03:28:40', '2022-06-10 07:10:50', NULL, 1, 0, NULL, NULL),
(40, 1, 'asd', 'ahmad', '2022-06-09 03:30:57', '2022-06-10 07:10:50', NULL, 1, 0, NULL, NULL),
(41, 1, 'zxc', 'ahmad', '2022-06-09 03:32:59', '2022-06-10 07:10:50', NULL, 1, -1, NULL, NULL),
(42, 2, 'ini adalah pertanyaan', 'ahmad', '2022-06-09 04:56:34', '2022-06-10 07:10:50', NULL, 1, 0, NULL, 180),
(43, 1, 'a', 'charlie', '2022-06-09 05:16:10', '2022-06-10 07:10:50', 10, 1, 1, NULL, NULL),
(44, 2, 'saya mau bertanya!', 'ahmad', '2022-06-09 05:18:42', '2022-06-10 07:10:50', NULL, 1, 0, NULL, 180),
(45, 2, 'Kalo untuk jalanin file .php gimana caranya?', 'ahmad', '2022-06-09 08:14:43', '2022-06-10 07:10:50', NULL, 1, -1, NULL, 180),
(46, 2, 'Pertanyaan kedua saya.', 'ahmad', '2022-06-09 08:58:15', '2022-06-10 07:10:50', NULL, 1, -1, NULL, 180),
(47, 2, 'Kuis Pertama: Apa Definisi dari CSS Selector?', 'abi', '2022-06-10 01:48:58', '2022-06-10 07:10:50', NULL, 1, 1, NULL, 180),
(48, 2, 'Kuis kedua', 'abi', '2022-06-10 02:32:39', '2022-06-10 07:10:50', NULL, 1, 0, NULL, 180),
(52, 3, 'Bahasa Pemrograman manakah yang paling Kalian sukai?', 'abi', '2022-06-11 03:57:59', '2022-06-11 03:57:59', NULL, 1, 1, 'PHP__;Javascript__;Java__;Kotlin__;Python__;__;', 120),
(53, 3, 'Jabatan Developer yang paling kamu senangi?', 'abi', '2022-06-11 11:32:50', '2022-06-11 11:32:50', NULL, 1, 0, 'Frontend__;Backend__;DB Admin__;Network Engineer__;__;__;', 120),
(54, 2, 'Pertanyaan lagi nih..', 'abi', '2022-06-11 11:39:26', '2022-06-11 11:39:26', NULL, 1, 0, NULL, 180),
(55, 1, 'HALO', 'ahmad', '2022-06-12 04:56:40', '2022-06-12 04:56:40', NULL, 1, -1, NULL, NULL),
(56, 2, 'makanan apa yang paling enak menurut kalian??', 'abi', '2022-06-12 04:57:14', '2022-06-12 04:57:14', NULL, 1, 0, NULL, 180),
(57, 3, 'Makanan apa yang paling enak?', 'abi', '2022-06-12 04:58:36', '2022-06-12 04:58:36', NULL, 1, 0, 'sate__;rendang__;opor__;jengkol__;__;__;', 120),
(58, 1, 'aaa', 'abi', '2022-06-13 07:20:20', '2022-06-13 07:20:20', NULL, 1, 0, NULL, NULL),
(59, 2, 'asd', 'abi', '2022-06-13 07:23:51', '2022-06-13 07:23:51', NULL, 1, 0, NULL, 120),
(60, 3, 'Ikan terganteng???', 'abi', '2022-06-13 07:56:46', '2022-06-13 07:56:46', NULL, 1, 0, 'Lele__;Koi__;Nila__;__;__;__;', 200),
(61, 3, 'Materi yang cocok untuk Pertemuan Selanjutnya (Rabu Depan)??', 'abi', '2022-06-13 08:42:42', '2022-06-13 08:42:42', 1, 1, 0, 'SESSION__;JS-Cookie__;Bootstrap__;__;__;__;', 600),
(62, 3, 'zzzrrrrrrrrrrrrrrrrrrrrrrrrr', 'abi', '2022-06-13 08:49:53', '2022-06-13 08:49:53', 1, 1, 0, 'zzz__;ccc__;ddd__;eee__;rrr__;__;', 60),
(63, 1, 'zzz', '31200071', '2022-06-14 06:44:23', '2022-06-14 06:44:23', 1000, 1, 1, NULL, NULL),
(64, 1, 'aaaa', 'abi', '2022-06-15 06:47:20', '2022-06-15 06:47:20', NULL, 1, 1, NULL, NULL),
(65, 1, 'ddddddddddddddd', '31222221', '2022-06-15 06:47:38', '2022-06-15 06:47:38', 100, 1, -1, NULL, NULL),
(66, 2, 'Pertanyaan keeeeeeeeeeeeeeeeeeee', 'abi', '2022-06-15 06:48:41', '2022-06-15 06:48:41', NULL, 1, 0, NULL, 120),
(67, 3, 'makanan apa yg pailing enak', 'abi', '2022-06-15 06:49:57', '2022-06-15 06:49:57', 1, 1, 0, 'sate__;rendang__;opor__;__;__;__;', 600),
(68, 2, 'zzzzzzzzzzzzzzzzzz zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz', 'abi', '2022-06-15 07:10:02', '2022-06-15 07:10:02', NULL, 1, 0, NULL, 1200),
(69, 2, 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', 'abi', '2022-06-15 07:46:51', '2022-06-15 07:46:51', NULL, 1, 0, NULL, 20),
(70, 2, 'ggggggggggggggggggggggggg', 'abi', '2022-06-15 07:48:29', '2022-06-15 07:48:29', NULL, 1, 0, NULL, 999),
(71, 2, 'gfsds', 'abi', '2022-06-15 07:51:20', '2022-06-15 07:51:20', NULL, 1, 0, NULL, 1200),
(72, 1, 'tst', 'iin', '2022-07-18 10:08:11', '2022-07-18 10:08:11', NULL, 4, 1, NULL, NULL),
(73, 1, 'zzz', 'iin', '2022-07-18 10:12:44', '2022-07-18 10:12:44', NULL, 4, 1, NULL, NULL),
(74, 1, 'tetst', 'iin', '2022-07-18 11:15:45', '2022-07-18 11:15:45', NULL, 3, 0, NULL, NULL),
(75, 1, 'zzza', 'iin', '2022-07-18 11:17:11', '2022-07-18 11:17:11', NULL, 3, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_chat_answer`
--

CREATE TABLE `tb_chat_answer` (
  `answer_id` int(11) NOT NULL,
  `answer` varchar(500) NOT NULL,
  `id_chat` int(11) NOT NULL,
  `answer_by` varchar(20) NOT NULL,
  `chat_point_answer` smallint(6) DEFAULT NULL,
  `id_chat_answer_by` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_chat_answer`
--

INSERT INTO `tb_chat_answer` (`answer_id`, `answer`, `id_chat`, `answer_by`, `chat_point_answer`, `id_chat_answer_by`) VALUES
(26, 'g', 46, '31212189', NULL, NULL),
(27, 'y', 45, '31212189', NULL, NULL),
(38, 'd', 45, 'abi', NULL, NULL),
(39, 'ghhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhh', 46, 'abi', NULL, NULL),
(40, 'aku jawab', 45, 'salwa', NULL, NULL),
(41, 'kkkk', 46, 'salwa', NULL, NULL),
(42, 'lllk', 46, 'salwa', NULL, NULL),
(43, 'aaaa', 46, 'abi', NULL, NULL),
(44, 'd', 45, 'abi', NULL, NULL),
(45, 'Acuan dalam menerapkan rule CSS', 47, 'ahmad', 50, NULL),
(47, 'jawaban salwa', 47, 'salwa', 56, NULL),
(50, 'jawaban dari dosen', 48, 'abi', 75, NULL),
(51, 'aku jawab', 48, 'ahmad', 50, NULL),
(52, 'PHP', 52, 'ahmad', 10, '52_ahmad'),
(59, 'asd', 47, 'abi', 0, NULL),
(60, 'sss', 47, 'abi', NULL, NULL),
(61, 'ff', 47, 'abi', NULL, NULL),
(65, 'Javascript', 52, 'charlie', 10, '52_charlie'),
(77, 'Javascript', 52, 'salwa', 10, '52_salwa'),
(78, 'dffdf', 54, 'salwa', 50, NULL),
(80, 'Network Engineer', 53, 'salwa', 10, '53_salwa'),
(81, 'Frontend', 53, 'ahmad', 10, '53_ahmad'),
(82, 'sate', 56, 'ahmad', 50, NULL),
(83, 'sate', 57, 'ahmad', 10, '57_ahmad'),
(84, 'jengkol', 56, 'salwa', 200, NULL),
(85, 'sate', 57, 'salwa', 9, '57_salwa'),
(87, 'Lele', 60, 'salwa', 10, '60_salwa'),
(88, 'JS-Cookie', 61, 'salwa', 10, '61_salwa'),
(89, 'ccc', 62, 'salwa', 10, '62_salwa'),
(90, 'sate', 67, '31222221', 10, '67_31222221'),
(91, 'asd', 68, '31222221', NULL, NULL),
(92, 'ouyut', 70, '31222221', NULL, NULL),
(93, 'asd', 71, '31222221', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_chat_like`
--

CREATE TABLE `tb_chat_like` (
  `id_chat_like` varchar(50) NOT NULL,
  `like_by` varchar(20) NOT NULL,
  `id_chat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_chat_like`
--

INSERT INTO `tb_chat_like` (`id_chat_like`, `like_by`, `id_chat`) VALUES
('abi_14', 'abi', 14),
('abi_4', 'abi', 4),
('abi_43', 'abi', 43),
('abi_5', 'abi', 5),
('ahmad_14', 'ahmad', 14),
('salwa_2', 'salwa', 2),
('salwa_5', 'salwa', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_chat_type`
--

CREATE TABLE `tb_chat_type` (
  `id_chat_type` tinyint(4) NOT NULL,
  `chat_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_chat_type`
--

INSERT INTO `tb_chat_type` (`id_chat_type`, `chat_type`) VALUES
(1, 'Normal Chat'),
(2, 'Pertanyaan'),
(3, 'Polling');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dosen`
--

CREATE TABLE `tb_dosen` (
  `id_dosen` int(11) NOT NULL,
  `nama_dosen` varchar(50) NOT NULL,
  `nidn` char(10) DEFAULT NULL,
  `id_prodi` int(11) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `status_dosen` tinyint(4) NOT NULL DEFAULT 1,
  `tanggal_buat` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_dosen`
--

INSERT INTO `tb_dosen` (`id_dosen`, `nama_dosen`, `nidn`, `id_prodi`, `username`, `status_dosen`, `tanggal_buat`) VALUES
(1, 'Iin Sholihin', '0411068706', 2, 'abi', 1, '2022-06-06 12:59:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kode_kelas` varchar(20) NOT NULL,
  `nama_kelas` varchar(100) DEFAULT NULL,
  `id_prodi` int(11) DEFAULT NULL,
  `jenis_jalur` varchar(10) DEFAULT NULL,
  `jenis_kelas` varchar(1) DEFAULT NULL,
  `kelas_ket` varchar(100) DEFAULT NULL,
  `semester` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kode_kelas`, `nama_kelas`, `id_prodi`, `jenis_jalur`, `jenis_kelas`, `kelas_ket`, `semester`) VALUES
(1, 'KA-2020-KIP-A', NULL, NULL, 'KIP', 'P', NULL, NULL),
(2, 'KA-2020-KIP-B1', NULL, NULL, 'KIP', 'P', NULL, NULL),
(3, 'KA-2020-KIP-B2', NULL, NULL, 'KIP', 'P', NULL, NULL),
(4, 'KA-2020-KIP-B4', NULL, NULL, 'KIP', 'P', NULL, NULL),
(5, 'KA-2020-KIP-B5', NULL, NULL, 'KIP', 'P', NULL, NULL),
(6, 'KA-2020-KIP-B5-SORE', NULL, NULL, 'KIP', 'S', NULL, NULL),
(7, 'KA-2020-KIP-B6', NULL, NULL, 'KIP', 'P', NULL, NULL),
(8, 'MI-2020-KIP-A', NULL, NULL, 'KIP', 'P', NULL, NULL),
(9, 'MI-2020-KIP-B1', NULL, NULL, 'KIP', 'P', NULL, NULL),
(10, 'MI-2020-KIP-B3', NULL, NULL, 'KIP', 'P', NULL, NULL),
(11, 'MI-2020-KIP-B4', NULL, NULL, 'KIP', 'P', NULL, NULL),
(12, 'MI-2020-KIP-B5', NULL, NULL, 'KIP', 'P', NULL, NULL),
(13, 'MI-2020-KIP-B5-SORE', NULL, NULL, 'KIP', 'S', NULL, NULL),
(14, 'MI-2020-KIP-B6', NULL, NULL, 'KIP', 'P', NULL, NULL),
(15, 'MI-2020-P', NULL, NULL, 'REG', 'P', NULL, NULL),
(16, 'TI-2019-ANALIS-P', NULL, NULL, 'KIP', 'P', NULL, NULL),
(17, 'TI-2019-ANALIS-S', NULL, NULL, 'KIP', 'S', NULL, NULL),
(18, 'TI-2019-ANDROID-P1', NULL, NULL, 'KIP', 'P', NULL, NULL),
(19, 'TI-2019-ANDROID-P2', NULL, NULL, 'KIP', 'P', NULL, NULL),
(20, 'TI-2019-ANDROID-S1', NULL, NULL, 'KIP', 'S', NULL, NULL),
(21, 'TI-2019-ANDROID-S2', NULL, NULL, 'KIP', 'S', NULL, NULL),
(22, 'TI-2019-MULTIMEDIA-P', NULL, NULL, 'KIP', 'P', NULL, NULL),
(24, 'TI-2019-MULTIMEDIA-S', NULL, NULL, 'KIP', 'S', NULL, NULL),
(25, 'TI-2020-KIP-A-1', NULL, NULL, 'KIP', 'P', NULL, NULL),
(26, 'TI-2020-KIP-A-2', NULL, NULL, 'KIP', 'P', NULL, NULL),
(27, 'TI-2020-KIP-B1-1', NULL, NULL, 'KIP', 'P', NULL, NULL),
(28, 'TI-2020-KIP-B1-2', NULL, NULL, 'KIP', 'P', NULL, NULL),
(29, 'TI-2020-KIP-B1-3', NULL, NULL, 'KIP', 'P', NULL, NULL),
(30, 'TI-2020-KIP-B2-1', NULL, NULL, 'KIP', 'P', NULL, NULL),
(31, 'TI-2020-KIP-B2-2', NULL, NULL, 'KIP', 'P', NULL, NULL),
(32, 'TI-2020-KIP-B2-3', NULL, NULL, 'KIP', 'P', NULL, NULL),
(33, 'TI-2020-KIP-B2-4', NULL, NULL, 'KIP', 'P', NULL, NULL),
(34, 'TI-2020-KIP-B3-1', NULL, NULL, 'KIP', 'P', NULL, NULL),
(35, 'TI-2020-KIP-B3-2', NULL, NULL, 'KIP', 'P', NULL, NULL),
(36, 'TI-2020-KIP-B3-3', NULL, NULL, 'KIP', 'P', NULL, NULL),
(37, 'TI-2020-KIP-B3-4', NULL, NULL, 'KIP', 'P', NULL, NULL),
(38, 'TI-2020-KIP-B4', NULL, NULL, 'KIP', 'P', NULL, NULL),
(39, 'TI-2020-KIP-B5-1', NULL, NULL, 'KIP', 'P', NULL, NULL),
(40, 'TI-2020-KIP-B5-2', NULL, NULL, 'KIP', 'P', NULL, NULL),
(41, 'TI-2020-KIP-B5-3', NULL, NULL, 'KIP', 'P', NULL, NULL),
(42, 'TI-2020-KIP-B6-1', NULL, NULL, 'KIP', 'P', NULL, NULL),
(43, 'TI-2020-KIP-B6-2', NULL, NULL, 'KIP', 'P', NULL, NULL),
(44, 'TI-2020-KIP-B6-3', NULL, NULL, 'KIP', 'P', NULL, NULL),
(45, 'TI-2020-KIP-B7-1', NULL, NULL, 'KIP', 'P', NULL, NULL),
(46, 'TI-2020-KIP-B7-2', NULL, NULL, 'KIP', 'P', NULL, NULL),
(47, 'TI-2020-KIP-B7-3', NULL, NULL, 'KIP', 'P', NULL, NULL),
(48, 'TI-2020-P', NULL, NULL, 'REG', 'P', NULL, NULL),
(49, 'TI-2020-P-TRANS', NULL, NULL, 'TRANS', 'P', NULL, NULL),
(50, 'TI-2020-S', NULL, NULL, 'REG', 'S', NULL, NULL),
(51, 'TI-2020-S-TRANS', NULL, NULL, 'TRANS', 'S', NULL, NULL),
(52, 'MI-2021-KIP-C1', NULL, 4, 'KIP', 'P', NULL, NULL),
(53, 'MI-2021-KIP-P1', NULL, 4, 'KIP', 'P', NULL, NULL),
(54, 'MI-2021-KIP-P2', NULL, 4, 'KIP', 'P', NULL, NULL),
(55, 'MI-2021-KIP-P3', NULL, 4, 'KIP', 'P', NULL, NULL),
(56, 'MI-2021-KIP-P4', NULL, 4, 'KIP', 'P', NULL, NULL),
(57, 'MI-2021-P', NULL, 4, 'REG', 'P', NULL, NULL),
(58, 'MI-2021-S', NULL, 4, 'REG', 'S', NULL, NULL),
(59, 'JWD-A', 'JWD-Group A', NULL, NULL, NULL, 'JWD-Group A by Pak InSho', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas_peserta`
--

CREATE TABLE `tb_kelas_peserta` (
  `id_kelas_peserta` varchar(30) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `insert_by` varchar(20) NOT NULL,
  `date_insert` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kelas_peserta`
--

INSERT INTO `tb_kelas_peserta` (`id_kelas_peserta`, `id_kelas`, `username`, `insert_by`, `date_insert`) VALUES
('1_ahmad', 1, 'ahmad', 'abi', '2022-06-04 10:04:36'),
('1_salwa', 1, 'salwa', 'abi', '2022-06-04 10:05:27'),
('52_31222187', 52, '31222187', 'abi', '2022-06-06 09:18:44'),
('52_31222208', 52, '31222208', 'abi', '2022-06-06 09:18:44'),
('52_31222210', 52, '31222210', 'abi', '2022-06-06 09:18:44'),
('52_31222217', 52, '31222217', 'abi', '2022-06-06 09:18:44'),
('52_31222220', 52, '31222220', 'abi', '2022-06-06 09:18:44'),
('52_31222221', 52, '31222221', 'abi', '2022-06-06 09:18:44'),
('53_31212128', 53, '31212128', 'abi', '2022-06-06 09:18:44'),
('53_31212130', 53, '31212130', 'abi', '2022-06-06 09:18:44'),
('53_31212132', 53, '31212132', 'abi', '2022-06-06 09:18:44'),
('53_31212133', 53, '31212133', 'abi', '2022-06-06 09:18:44'),
('53_31212138', 53, '31212138', 'abi', '2022-06-06 09:18:44'),
('53_31212139', 53, '31212139', 'abi', '2022-06-06 09:18:44'),
('53_31212140', 53, '31212140', 'abi', '2022-06-06 09:18:44'),
('53_31212143', 53, '31212143', 'abi', '2022-06-06 09:18:44'),
('53_31212145', 53, '31212145', 'abi', '2022-06-06 09:18:44'),
('53_31212148', 53, '31212148', 'abi', '2022-06-06 09:18:44'),
('53_31212155', 53, '31212155', 'abi', '2022-06-06 09:18:44'),
('53_31212156', 53, '31212156', 'abi', '2022-06-06 09:18:44'),
('53_31212157', 53, '31212157', 'abi', '2022-06-06 09:18:44'),
('53_31212160', 53, '31212160', 'abi', '2022-06-06 09:18:44'),
('53_31212174', 53, '31212174', 'abi', '2022-06-06 09:18:44'),
('53_31212177', 53, '31212177', 'abi', '2022-06-06 09:18:44'),
('53_31212179', 53, '31212179', 'abi', '2022-06-06 09:18:44'),
('53_31212192', 53, '31212192', 'abi', '2022-06-06 09:18:44'),
('53_31212203', 53, '31212203', 'abi', '2022-06-06 09:18:44'),
('54_31212129', 54, '31212129', 'abi', '2022-06-06 09:18:44'),
('54_31212131', 54, '31212131', 'abi', '2022-06-06 09:18:44'),
('54_31212136', 54, '31212136', 'abi', '2022-06-06 09:18:44'),
('54_31212141', 54, '31212141', 'abi', '2022-06-06 09:18:44'),
('54_31212142', 54, '31212142', 'abi', '2022-06-06 09:18:44'),
('54_31212144', 54, '31212144', 'abi', '2022-06-06 09:18:44'),
('54_31212153', 54, '31212153', 'abi', '2022-06-06 09:18:44'),
('54_31212154', 54, '31212154', 'abi', '2022-06-06 09:18:44'),
('54_31212163', 54, '31212163', 'abi', '2022-06-06 09:18:44'),
('54_31212170', 54, '31212170', 'abi', '2022-06-06 09:18:44'),
('54_31212173', 54, '31212173', 'abi', '2022-06-06 09:18:44'),
('54_31212176', 54, '31212176', 'abi', '2022-06-06 09:18:44'),
('54_31212193', 54, '31212193', 'abi', '2022-06-06 09:18:44'),
('54_31212194', 54, '31212194', 'abi', '2022-06-06 09:18:44'),
('54_31212196', 54, '31212196', 'abi', '2022-06-06 09:18:44'),
('54_31212199', 54, '31212199', 'abi', '2022-06-06 09:18:44'),
('54_31212200', 54, '31212200', 'abi', '2022-06-06 09:18:44'),
('54_31212201', 54, '31212201', 'abi', '2022-06-06 09:18:44'),
('54_31212207', 54, '31212207', 'abi', '2022-06-06 09:18:44'),
('55_31212134', 55, '31212134', 'abi', '2022-06-06 09:18:44'),
('55_31212135', 55, '31212135', 'abi', '2022-06-06 09:18:44'),
('55_31212137', 55, '31212137', 'abi', '2022-06-06 09:18:44'),
('55_31212146', 55, '31212146', 'abi', '2022-06-06 09:18:44'),
('55_31212147', 55, '31212147', 'abi', '2022-06-06 09:18:44'),
('55_31212149', 55, '31212149', 'abi', '2022-06-06 09:18:44'),
('55_31212159', 55, '31212159', 'abi', '2022-06-06 09:18:44'),
('55_31212169', 55, '31212169', 'abi', '2022-06-06 09:18:44'),
('55_31212180', 55, '31212180', 'abi', '2022-06-06 09:18:44'),
('55_31212183', 55, '31212183', 'abi', '2022-06-06 09:18:44'),
('55_31212184', 55, '31212184', 'abi', '2022-06-06 09:18:44'),
('55_31212188', 55, '31212188', 'abi', '2022-06-06 09:18:44'),
('55_31212189', 55, '31212189', 'abi', '2022-06-06 09:18:44'),
('55_31212195', 55, '31212195', 'abi', '2022-06-06 09:18:44'),
('55_31212198', 55, '31212198', 'abi', '2022-06-06 09:18:44'),
('55_31212202', 55, '31212202', 'abi', '2022-06-06 09:18:44'),
('55_31212204', 55, '31212204', 'abi', '2022-06-06 09:18:44'),
('55_31212205', 55, '31212205', 'abi', '2022-06-06 09:18:44'),
('56_31212161', 56, '31212161', 'abi', '2022-06-06 09:18:44'),
('56_31212162', 56, '31212162', 'abi', '2022-06-06 09:18:44'),
('56_31212166', 56, '31212166', 'abi', '2022-06-06 09:18:44'),
('56_31212168', 56, '31212168', 'abi', '2022-06-06 09:18:44'),
('56_31212171', 56, '31212171', 'abi', '2022-06-06 09:18:44'),
('56_31212172', 56, '31212172', 'abi', '2022-06-06 09:18:44'),
('56_31212197', 56, '31212197', 'abi', '2022-06-06 09:18:44'),
('56_31212211', 56, '31212211', 'abi', '2022-06-06 09:18:44'),
('57_31200071', 57, '31200071', 'abi', '2022-06-06 09:18:44'),
('57_31212124', 57, '31212124', 'abi', '2022-06-06 09:18:44'),
('57_31212125', 57, '31212125', 'abi', '2022-06-06 09:18:44'),
('57_31212127', 57, '31212127', 'abi', '2022-06-06 09:18:44'),
('57_31212158', 57, '31212158', 'abi', '2022-06-06 09:18:44'),
('57_31212165', 57, '31212165', 'abi', '2022-06-06 09:18:44'),
('57_31212175', 57, '31212175', 'abi', '2022-06-06 09:18:44'),
('58_31212150', 58, '31212150', 'abi', '2022-06-06 09:18:44'),
('58_31212212', 58, '31212212', 'abi', '2022-06-06 09:18:44'),
('58_31212214', 58, '31212214', 'abi', '2022-06-06 09:18:44'),
('58_31212215', 58, '31212215', 'abi', '2022-06-06 09:18:44'),
('58_31212216', 58, '31212216', 'abi', '2022-06-06 09:18:44'),
('58_31212222', 58, '31212222', 'abi', '2022-06-06 09:18:44'),
('59_ainul', 59, 'ainul', 'abi', '2022-07-18 07:42:14'),
('59_aishanda', 59, 'aishanda', 'abi', '2022-07-18 07:42:14'),
('59_aji', 59, 'aji', 'abi', '2022-07-18 07:42:14'),
('59_andika', 59, 'andika', 'abi', '2022-07-18 07:42:14'),
('59_andrian', 59, 'andrian', 'abi', '2022-07-18 07:42:14'),
('59_anum', 59, 'anum', 'abi', '2022-07-18 07:42:14'),
('59_apsarika', 59, 'apsarika', 'abi', '2022-07-18 07:42:14'),
('59_arina', 59, 'arina', 'abi', '2022-07-18 07:42:14'),
('59_daffa', 59, 'daffa', 'abi', '2022-07-18 07:42:14'),
('59_diana', 59, 'diana', 'abi', '2022-07-18 07:42:14'),
('59_edi', 59, 'edi', 'abi', '2022-07-18 07:42:14'),
('59_enggar', 59, 'enggar', 'abi', '2022-07-18 07:42:14'),
('59_fais', 59, 'fais', 'abi', '2022-07-18 07:42:14'),
('59_faris', 59, 'faris', 'abi', '2022-07-18 07:42:14'),
('59_faruk', 59, 'faruk', 'abi', '2022-07-18 07:42:14'),
('59_iin', 59, 'iin', 'abi', '2022-07-18 07:42:14'),
('59_imron', 59, 'imron', 'abi', '2022-07-18 07:42:14'),
('59_ismi', 59, 'ismi', 'abi', '2022-07-18 07:42:14'),
('59_jamalul', 59, 'jamalul', 'abi', '2022-07-18 07:42:14'),
('59_latifatul', 59, 'latifatul', 'abi', '2022-07-18 07:42:14'),
('59_nabila', 59, 'nabila', 'abi', '2022-07-18 07:42:14'),
('59_nurrika', 59, 'nurrika', 'abi', '2022-07-18 07:42:14'),
('59_pradana', 59, 'pradana', 'abi', '2022-07-18 07:42:14'),
('59_putra', 59, 'putra', 'abi', '2022-07-18 07:42:14'),
('59_putri', 59, 'putri', 'abi', '2022-07-18 07:42:14'),
('59_riski', 59, 'riski', 'abi', '2022-07-18 07:42:14'),
('59_rizky', 59, 'rizky', 'abi', '2022-07-18 07:42:14'),
('59_sayyid', 59, 'sayyid', 'abi', '2022-07-18 07:42:14'),
('59_steven', 59, 'steven', 'abi', '2022-07-18 07:42:14'),
('59_syafina', 59, 'syafina', 'abi', '2022-07-18 07:42:14'),
('59_waqi', 59, 'waqi', 'abi', '2022-07-18 07:42:14');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_login`
--

CREATE TABLE `tb_login` (
  `id_login` int(11) NOT NULL,
  `date_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `login_info` varchar(200) DEFAULT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mhs`
--

CREATE TABLE `tb_mhs` (
  `id_mhs` int(11) NOT NULL,
  `nama_mhs` varchar(50) NOT NULL,
  `nama_panggilan` varchar(10) DEFAULT NULL,
  `nim` char(8) DEFAULT NULL,
  `id_prodi` int(11) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `status_mhs` tinyint(1) NOT NULL DEFAULT 1,
  `tanggal_buat` timestamp NOT NULL DEFAULT current_timestamp(),
  `gender` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mhs`
--

INSERT INTO `tb_mhs` (`id_mhs`, `nama_mhs`, `nama_panggilan`, `nim`, `id_prodi`, `username`, `status_mhs`, `tanggal_buat`, `gender`) VALUES
(3, 'Ahmad Firdaus', NULL, '41000001', 1, 'ahmad', 1, '2022-06-04 10:03:14', NULL),
(4, 'Salwa Fatimah', NULL, '32000001', 5, 'salwa', 1, '2022-06-04 10:03:14', 'P'),
(5, 'Caca Hamdika', 'Charlie', '42205678', 2, 'charlie', 1, '2022-06-06 07:41:26', NULL),
(6, 'Ferdinan', NULL, '31212132', 4, '31212132', 1, '2022-06-06 08:59:26', NULL),
(7, 'Rizky Rahman Sahputra', NULL, '31212211', 4, '31212211', 1, '2022-06-06 08:59:26', NULL),
(8, 'Herlyta Qotrun Nada', NULL, '31222221', 4, '31222221', 1, '2022-06-06 08:59:26', NULL),
(9, 'Hilya Ashfia Nabila', NULL, '31212183', 4, '31212183', 1, '2022-06-06 08:59:26', NULL),
(10, 'Hidayatul Mubtadiin', NULL, '31212193', 4, '31212193', 1, '2022-06-06 08:59:26', NULL),
(11, 'Dewi Yuliyanti', NULL, '31212153', 4, '31212153', 1, '2022-06-06 08:59:26', NULL),
(12, 'Tiar Imam Muarif', NULL, '31212204', 4, '31212204', 1, '2022-06-06 08:59:26', NULL),
(13, 'Aldi Ahmad Septian', NULL, '31212141', 4, '31212141', 1, '2022-06-06 08:59:26', NULL),
(14, 'Eva Andini', NULL, '31212157', 4, '31212157', 1, '2022-06-06 08:59:26', NULL),
(15, 'Teguh Adrian', NULL, '31212128', 4, '31212128', 1, '2022-06-06 08:59:26', NULL),
(16, 'Fitriyani', NULL, '31212133', 4, '31212133', 1, '2022-06-06 08:59:26', NULL),
(17, 'Ajay Maulana', NULL, '31212146', 4, '31212146', 1, '2022-06-06 08:59:26', NULL),
(18, 'Muhammad Idan Fadhilah', NULL, '31212138', 4, '31212138', 1, '2022-06-06 08:59:26', NULL),
(19, 'Cahaya Agus Prastio', NULL, '31222210', 4, '31222210', 1, '2022-06-06 08:59:26', NULL),
(20, 'Adi Kaswandi', NULL, '31212202', 4, '31212202', 1, '2022-06-06 08:59:26', NULL),
(21, 'Muhamad Sharun', NULL, '31222208', 4, '31222208', 1, '2022-06-06 08:59:26', NULL),
(22, 'Anita Nur Kirana', NULL, '31212188', 4, '31212188', 1, '2022-06-06 08:59:26', NULL),
(23, 'Ucica Nadilah', NULL, '31222187', 4, '31222187', 1, '2022-06-06 08:59:26', NULL),
(24, 'Eddiwan Dwiguna', NULL, '31212198', 4, '31212198', 1, '2022-06-06 08:59:26', NULL),
(25, 'Ines Nursatika Kusuma', NULL, '31212173', 4, '31212173', 1, '2022-06-06 08:59:26', NULL),
(26, 'Andrea Panca Pramudita', NULL, '31212194', 4, '31212194', 1, '2022-06-06 08:59:26', NULL),
(27, 'Noviyanti Nurachmawati', NULL, '31212179', 4, '31212179', 1, '2022-06-06 08:59:26', NULL),
(28, 'Rahadatul Aisy', NULL, '31212205', 4, '31212205', 1, '2022-06-06 08:59:26', NULL),
(29, 'Habbi Muhamad Abdillah', NULL, '31212135', 4, '31212135', 1, '2022-06-06 08:59:26', NULL),
(30, 'Parahita', NULL, '31212176', 4, '31212176', 1, '2022-06-06 08:59:26', NULL),
(31, 'Sidqi Hilman', NULL, '31212169', 4, '31212169', 1, '2022-06-06 08:59:26', NULL),
(32, 'Weni Agustin', NULL, '31212172', 4, '31212172', 1, '2022-06-06 08:59:26', NULL),
(33, 'Dimas Illi', NULL, '31212149', 4, '31212149', 1, '2022-06-06 08:59:27', NULL),
(34, 'Rismawati Abidin', NULL, '31212196', 4, '31212196', 1, '2022-06-06 08:59:27', NULL),
(35, 'Sendyawan Nagari', NULL, '31212143', 4, '31212143', 1, '2022-06-06 08:59:27', NULL),
(36, 'Mokhammad Galis Januaherlangga', NULL, '31212137', 4, '31212137', 1, '2022-06-06 08:59:27', NULL),
(37, 'Rini Wahyuningsih', NULL, '31212140', 4, '31212140', 1, '2022-06-06 08:59:27', NULL),
(38, 'Nazwa Alkatiri', NULL, '31212177', 4, '31212177', 1, '2022-06-06 08:59:27', NULL),
(39, 'Puji Oktaviani', NULL, '31212156', 4, '31212156', 1, '2022-06-06 08:59:27', NULL),
(40, 'Gun Gun Gunawan Rahmat', NULL, '31212134', 4, '31212134', 1, '2022-06-06 08:59:27', NULL),
(41, 'Erni Ilmiyah', NULL, '31212147', 4, '31212147', 1, '2022-06-06 08:59:27', NULL),
(42, 'Siti Khotimah', NULL, '31212145', 4, '31212145', 1, '2022-06-06 08:59:27', NULL),
(43, 'Arini Khansa Nabila', NULL, '31212162', 4, '31212162', 1, '2022-06-06 08:59:27', NULL),
(44, 'Fitriyana', NULL, '31212154', 4, '31212154', 1, '2022-06-06 08:59:27', NULL),
(45, 'Dewantifuji Astri', NULL, '31212144', 4, '31212144', 1, '2022-06-06 08:59:27', NULL),
(46, 'Regina Fitriani', NULL, '31212139', 4, '31212139', 1, '2022-06-06 08:59:27', NULL),
(47, 'Salmatul Maulidya Fasha', NULL, '31212142', 4, '31212142', 1, '2022-06-06 08:59:27', NULL),
(48, 'Taufik Hidayat', NULL, '31212195', 4, '31212195', 1, '2022-06-06 08:59:27', NULL),
(49, 'Raihan Abdul Ghani', NULL, '31212180', 4, '31212180', 1, '2022-06-06 08:59:27', NULL),
(50, 'Meysa Putri Maharani', NULL, '31212136', 4, '31212136', 1, '2022-06-06 08:59:27', NULL),
(51, 'Mu`ammar Mustofa Bisri', NULL, '31212159', 4, '31212159', 1, '2022-06-06 08:59:27', NULL),
(52, 'Ahmad Rizal Marani', NULL, '31212222', 4, '31212222', 1, '2022-06-06 08:59:27', NULL),
(53, 'Nurilah', NULL, '31212199', 4, '31212199', 1, '2022-06-06 08:59:27', NULL),
(54, 'Grimonia Qurrotu`ainii', NULL, '31212150', 4, '31212150', 1, '2022-06-06 08:59:27', NULL),
(55, 'Rohadi Utoyo', NULL, '31222220', 4, '31222220', 1, '2022-06-06 08:59:27', NULL),
(56, 'Rifky Ariyadi', NULL, '31212212', 4, '31212212', 1, '2022-06-06 08:59:27', NULL),
(57, 'Dede Hoeriah', NULL, '31212168', 4, '31212168', 1, '2022-06-06 08:59:27', NULL),
(58, 'Farhan Rizky Al-giffary', NULL, '31212174', 4, '31212174', 1, '2022-06-06 08:59:27', NULL),
(59, 'Sandi Saputra', NULL, '31212166', 4, '31212166', 1, '2022-06-06 08:59:27', NULL),
(60, 'Adisty Tri Putra', NULL, '31212201', 4, '31212201', 1, '2022-06-06 08:59:27', NULL),
(61, 'Muhamad Sulaeman', NULL, '31212214', 4, '31212214', 1, '2022-06-06 08:59:27', NULL),
(62, 'Fariz Ramadan', NULL, '31212161', 4, '31212161', 1, '2022-06-06 08:59:27', NULL),
(63, 'Gina Ayu Romadhon', NULL, '31212163', 4, '31212163', 1, '2022-06-06 08:59:27', NULL),
(64, 'Ela Apriliyani', NULL, '31212171', 4, '31212171', 1, '2022-06-06 08:59:27', NULL),
(65, 'Muhammad Fauzan Hanindito', NULL, '31212175', 4, '31212175', 1, '2022-06-06 08:59:27', NULL),
(66, 'Agita Hany Talia', NULL, '31212207', 4, '31212207', 1, '2022-06-06 08:59:27', NULL),
(67, 'Aida Jundana Elsa', NULL, '31212125', 4, '31212125', 1, '2022-06-06 08:59:27', NULL),
(68, 'Aldi Nur Syafaat', NULL, '31222217', 4, '31222217', 1, '2022-06-06 08:59:27', NULL),
(69, 'Anggara Pratama Putra', NULL, '41190055', 4, '41190055', 1, '2022-06-06 08:59:27', NULL),
(70, 'Anisatul Fadilah', NULL, '31212170', 4, '31212170', 1, '2022-06-06 08:59:27', NULL),
(71, 'Chumaeroh', NULL, '31212189', 4, '31212189', 1, '2022-06-06 08:59:27', NULL),
(72, 'Eka Roehatul Jannah', NULL, '31212160', 4, '31212160', 1, '2022-06-06 08:59:27', NULL),
(73, 'Elin Muzilin', NULL, '31212131', 4, '31212131', 1, '2022-06-06 08:59:27', NULL),
(74, 'Fian Sayful Romansyab', NULL, '41190125', 4, '41190125', 1, '2022-06-06 08:59:27', NULL),
(75, 'Himmawan Firdan', NULL, '31212127', 4, '31212127', 1, '2022-06-06 08:59:27', NULL),
(76, 'Ika Nur Parikah', NULL, '31212129', 4, '31212129', 1, '2022-06-06 08:59:27', NULL),
(77, 'Ilva Minatika', NULL, '31212148', 4, '31212148', 1, '2022-06-06 08:59:27', NULL),
(78, 'Krisna Manik Bumi', NULL, '31212192', 4, '31212192', 1, '2022-06-06 08:59:27', NULL),
(79, 'Kurniawan Fajar Abdulloh', NULL, '31212203', 4, '31212203', 1, '2022-06-06 08:59:27', NULL),
(80, 'Maya Indriani', NULL, '31212200', 4, '31212200', 1, '2022-06-06 08:59:27', NULL),
(81, 'Moh. Miftahurrifa', NULL, '41190049', 4, '41190049', 1, '2022-06-06 08:59:27', NULL),
(82, 'Mohamad Djazuli', NULL, '41190098', 4, '41190098', 1, '2022-06-06 08:59:27', NULL),
(83, 'Raena Agustin Laeliyah', NULL, '31212184', 4, '31212184', 1, '2022-06-06 08:59:27', NULL),
(84, 'Ramdhan Pebriyanto', NULL, '31212216', 4, '31212216', 1, '2022-06-06 08:59:27', NULL),
(85, 'Rizki Nurrahman', NULL, '31212215', 4, '31212215', 1, '2022-06-06 08:59:27', NULL),
(86, 'Salwa Fatimah', NULL, '41170090', 4, '41170090', 1, '2022-06-06 08:59:27', NULL),
(87, 'Siskawati', NULL, '31212197', 4, '31212197', 1, '2022-06-06 08:59:27', NULL),
(88, 'Siti Nurhasanah', NULL, '31212130', 4, '31212130', 1, '2022-06-06 08:59:27', NULL),
(89, 'Sultan Gymnastiar', NULL, '31212158', 4, '31212158', 1, '2022-06-06 08:59:27', NULL),
(90, 'Talitha Dhiya Syahla', NULL, '31212155', 4, '31212155', 1, '2022-06-06 08:59:27', NULL),
(91, 'Taufik Faturrakhman', NULL, '31212124', 4, '31212124', 1, '2022-06-06 08:59:27', NULL),
(92, 'Tegar Maulana', NULL, '31200071', 4, '31200071', 1, '2022-06-06 08:59:27', NULL),
(93, 'Rijalul Wahid', NULL, '31212165', 4, '31212165', 1, '2022-06-06 09:16:57', NULL),
(94, 'VSGA DTS', NULL, NULL, NULL, 'vsga', 1, '2022-07-18 03:35:50', NULL),
(95, 'Syafina Indriani', NULL, NULL, NULL, 'syafina', 1, '2022-07-18 03:35:50', NULL),
(96, 'Ismi Fatimatuzzahro Putri', NULL, NULL, NULL, 'ismi', 1, '2022-07-18 03:35:50', NULL),
(97, 'Moh. Imron', NULL, NULL, NULL, 'imron', 1, '2022-07-18 03:35:50', NULL),
(98, 'Faris Wahyudi', NULL, NULL, NULL, 'faris', 1, '2022-07-18 03:35:50', NULL),
(99, 'Waqi` Rahman', NULL, NULL, NULL, 'waqi', 1, '2022-07-18 03:35:50', NULL),
(100, 'Ainul Yakin Arofat', NULL, NULL, NULL, 'ainul', 1, '2022-07-18 03:35:50', NULL),
(101, 'Aishanda Vania Aanisah', NULL, NULL, NULL, 'aishanda', 1, '2022-07-18 03:35:50', NULL),
(102, 'Moh. Riski Maulana Ishak', NULL, NULL, NULL, 'riski', 1, '2022-07-18 03:35:50', NULL),
(103, 'Jamalul Lail', NULL, NULL, NULL, 'jamalul', 1, '2022-07-18 03:35:50', NULL),
(104, 'Apsarika Elysia Augisti', NULL, NULL, NULL, 'apsarika', 1, '2022-07-18 03:35:50', NULL),
(105, 'Putri Nur Fadilla', NULL, NULL, NULL, 'putri', 1, '2022-07-18 03:35:50', NULL),
(106, 'Arina Rosada Nuriyah Murdiyanto', NULL, NULL, NULL, 'arina', 1, '2022-07-18 03:35:50', NULL),
(107, 'Latifatul Khoer', NULL, NULL, NULL, 'latifatul', 1, '2022-07-18 03:35:50', NULL),
(108, 'Daffa Kurnia Nur Firdaus', NULL, NULL, NULL, 'daffa', 1, '2022-07-18 03:35:50', NULL),
(109, 'Andrian Cahya Dinata', NULL, NULL, NULL, 'andrian', 1, '2022-07-18 03:35:50', NULL),
(110, 'Faruk Maulana', NULL, NULL, NULL, 'faruk', 1, '2022-07-18 03:35:50', NULL),
(111, 'Putra Prassiesa Abimanyu', NULL, NULL, NULL, 'putra', 1, '2022-07-18 03:35:50', NULL),
(112, 'Andika Miftahul Hasan', NULL, NULL, NULL, 'andika', 1, '2022-07-18 03:35:50', NULL),
(113, 'Edi Firmansyah', NULL, NULL, NULL, 'edi', 1, '2022-07-18 03:35:50', NULL),
(114, 'Fais Al Farisi', NULL, NULL, NULL, 'fais', 1, '2022-07-18 03:35:50', NULL),
(115, 'Steven Rio Chandra Purnama', NULL, NULL, NULL, 'steven', 1, '2022-07-18 03:35:50', NULL),
(116, 'Nurrika Riskya', NULL, NULL, NULL, 'nurrika', 1, '2022-07-18 03:35:50', NULL),
(117, 'Enggar Susmita', NULL, NULL, NULL, 'enggar', 1, '2022-07-18 03:35:50', NULL),
(118, 'Pradana Akhdanul Azmi', NULL, NULL, NULL, 'pradana', 1, '2022-07-18 03:35:50', NULL),
(119, 'Diana Indri Rukmana', NULL, NULL, NULL, 'diana', 1, '2022-07-18 03:35:50', NULL),
(120, 'Muhammad Anum Maulana Wagiyanto', NULL, NULL, NULL, 'anum', 1, '2022-07-18 03:35:50', NULL),
(121, 'Nabila Maulidirroziqina Fara', NULL, NULL, NULL, 'nabila', 1, '2022-07-18 03:35:50', NULL),
(122, 'Mohammad Aji Saputra', NULL, NULL, NULL, 'aji', 1, '2022-07-18 03:35:50', NULL),
(123, 'Rizky Zapar', NULL, NULL, NULL, 'rizky', 1, '2022-07-18 03:35:50', NULL),
(124, 'Sayyid Miftah Farid', NULL, NULL, NULL, 'sayyid', 1, '2022-07-18 03:35:50', NULL),
(125, 'manager lms', NULL, NULL, NULL, 'manager', 1, '2022-07-18 03:35:50', NULL),
(126, 'Iin bin Koswara', NULL, NULL, NULL, 'iin', 1, '2022-07-18 03:35:50', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mk`
--

CREATE TABLE `tb_mk` (
  `id_mk` int(11) NOT NULL,
  `id_prodi` int(11) DEFAULT NULL,
  `kode_mk` varchar(10) DEFAULT NULL,
  `mk_creator` varchar(20) NOT NULL,
  `nama_mk` varchar(50) NOT NULL,
  `singkatan_mk` varchar(7) NOT NULL,
  `mk_desc` varchar(200) DEFAULT NULL,
  `mk_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_start` date DEFAULT NULL,
  `date_end` date DEFAULT NULL,
  `status_mk` tinyint(4) NOT NULL DEFAULT 1,
  `mk_active_points` int(11) NOT NULL DEFAULT 0,
  `dosen_pengampu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mk`
--

INSERT INTO `tb_mk` (`id_mk`, `id_prodi`, `kode_mk`, `mk_creator`, `nama_mk`, `singkatan_mk`, `mk_desc`, `mk_created`, `date_start`, `date_end`, `status_mk`, `mk_active_points`, `dosen_pengampu`) VALUES
(1, 1, 'TIKK001', 'abi', 'Pemrograman Web Dasar', 'PWEB1', NULL, '2022-06-04 10:07:42', NULL, NULL, 1, 0, 'abi'),
(2, NULL, 'JWD-A', 'abi', 'Junior Web Developer', 'JWD', 'JWD dengan Pak InSho', '2022-07-18 06:43:12', NULL, NULL, 1, 0, 'abi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mk_kelas`
--

CREATE TABLE `tb_mk_kelas` (
  `id_mk_kelas` varchar(30) NOT NULL,
  `id_mk` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mk_kelas`
--

INSERT INTO `tb_mk_kelas` (`id_mk_kelas`, `id_mk`, `id_kelas`) VALUES
('1_1', 1, 1),
('1_52', 1, 52),
('1_53', 1, 53),
('1_54', 1, 54),
('1_55', 1, 55),
('1_56', 1, 56),
('1_57', 1, 57),
('1_58', 1, 58),
('2_59', 2, 59);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mk_sesi`
--

CREATE TABLE `tb_mk_sesi` (
  `id_mk_sesi` int(11) NOT NULL,
  `id_mk` int(11) NOT NULL,
  `no_subject` tinyint(4) DEFAULT NULL,
  `nama_mk_sesi` varchar(100) NOT NULL,
  `dosen_pengajar` varchar(20) NOT NULL,
  `status_mk_sesi` tinyint(4) NOT NULL DEFAULT -1 COMMENT '-1: belum dimulai\r\n1: started\r\nnull: berakhir',
  `durasi_kuliah` time DEFAULT NULL,
  `start_sesi_kuliah` timestamp NULL DEFAULT NULL,
  `stop_perkuliahan` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_mk_sesi`
--

INSERT INTO `tb_mk_sesi` (`id_mk_sesi`, `id_mk`, `no_subject`, `nama_mk_sesi`, `dosen_pengajar`, `status_mk_sesi`, `durasi_kuliah`, `start_sesi_kuliah`, `stop_perkuliahan`) VALUES
(1, 1, 1, 'Pengantar Teknologi Web', 'abi', 0, '01:30:00', '2022-07-18 05:59:53', '2022-07-18 07:59:58'),
(2, 2, 1, 'Installasi Alat Bantu dan Pengantar Algoritma\n', 'abi', 0, '01:30:00', '2022-07-18 08:00:14', NULL),
(3, 2, 2, 'Merancang User Interface (UX-UI)', 'abi', 0, '01:30:00', '2022-09-17 11:54:07', '2022-09-20 09:47:18'),
(4, 2, 3, 'Membuat Antarmuka Website', 'abi', -1, '01:30:00', NULL, NULL),
(5, 2, 4, 'Mekanisme Running Web dan Debugging Source Code', 'abi', -1, '01:30:00', NULL, NULL),
(6, 2, 5, 'P05', 'abi', -2, '01:30:00', NULL, NULL),
(7, 2, 6, 'P06', 'abi', -2, '01:30:00', NULL, NULL),
(8, 2, 7, 'P07', 'abi', -2, '01:30:00', NULL, NULL),
(9, 2, 8, 'P08', 'abi', -2, '01:30:00', NULL, NULL),
(10, 2, 9, 'P09', 'abi', -2, '01:30:00', NULL, NULL),
(11, 2, 10, 'P10', 'abi', -2, '01:30:00', NULL, NULL),
(12, 2, 11, 'P11', 'abi', -2, '01:30:00', NULL, NULL),
(13, 2, 12, 'P12', 'abi', -2, '01:30:00', NULL, NULL),
(14, 2, 13, 'P13', 'abi', -2, '01:30:00', NULL, NULL),
(15, 2, 14, 'P14', 'abi', -2, '01:30:00', NULL, NULL),
(16, 2, 15, 'P15', 'abi', -2, '01:30:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_mk_sesi_login_point`
--

CREATE TABLE `tb_mk_sesi_login_point` (
  `id_mk_sesi_login_point` varchar(50) NOT NULL,
  `id_mk_sesi` int(11) NOT NULL,
  `id_login` int(11) NOT NULL,
  `login_point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_presensi`
--

CREATE TABLE `tb_presensi` (
  `id_presensi` varchar(30) NOT NULL,
  `id_mk_sesi` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `tanggal_presensi` timestamp NOT NULL DEFAULT current_timestamp(),
  `poin_presensi` mediumint(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_presensi`
--

INSERT INTO `tb_presensi` (`id_presensi`, `id_mk_sesi`, `username`, `tanggal_presensi`, `poin_presensi`) VALUES
('1_31200071', 1, '31200071', '2022-06-14 04:31:05', 5),
('1_31212134', 1, '31212134', '2022-06-14 04:31:33', 45),
('1_31212138', 1, '31212138', '2022-06-14 04:31:59', 33),
('1_31212188', 1, '31212188', '2022-06-15 04:53:05', 207),
('1_31222221', 1, '31222221', '2022-06-15 06:46:24', 975),
('1_ahmad', 1, 'ahmad', '2022-06-10 10:04:51', 950),
('1_charlie', 1, 'charlie', '2022-06-10 10:06:54', 700),
('1_salwa', 1, 'salwa', '2022-06-10 10:04:51', 800),
('3_ainul', 3, 'ainul', '2022-09-17 11:57:32', 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_prodi`
--

CREATE TABLE `tb_prodi` (
  `id_prodi` int(11) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL,
  `singkatan_prodi` varchar(5) NOT NULL,
  `nama_kaprodi` varchar(50) DEFAULT NULL,
  `nidn_kaprodi` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_prodi`
--

INSERT INTO `tb_prodi` (`id_prodi`, `nama_prodi`, `singkatan_prodi`, `nama_kaprodi`, `nidn_kaprodi`) VALUES
(1, 'Teknik Informatika', 'TI', NULL, NULL),
(2, 'Rekayasa Perangkat Lunak', 'RPL', NULL, NULL),
(3, 'Sistem Informasi', 'SI', NULL, NULL),
(4, 'Manajemen Informatika', 'MI', NULL, NULL),
(5, 'Komputerisasi Akuntansi', 'KA', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL,
  `admin_level` tinyint(4) NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `last_activity` timestamp NULL DEFAULT NULL,
  `last_time_activity` time DEFAULT NULL,
  `tanggal_buat` timestamp NOT NULL DEFAULT current_timestamp(),
  `terverifikasi_email` tinyint(1) DEFAULT NULL,
  `terverifikasi_wa` tinyint(1) DEFAULT NULL,
  `password_hint` varchar(200) DEFAULT NULL,
  `folder_uploads` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`username`, `password`, `admin_level`, `last_login`, `last_activity`, `last_time_activity`, `tanggal_buat`, `terverifikasi_email`, `terverifikasi_wa`, `password_hint`, `folder_uploads`) VALUES
('31200071', '31200071', 1, NULL, NULL, '13:50:57', '2022-06-06 08:55:46', NULL, NULL, 'Pakai NIM', '_tegarmau26176766912'),
('31212124', 'taufik', 1, NULL, NULL, '09:08:58', '2022-06-06 08:55:46', NULL, NULL, 'Pakai NIM', '_taufikfa47730196216'),
('31212125', '31212125', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_aidajund24852428465'),
('31212127', '31212127', 1, NULL, NULL, NULL, '2022-06-06 08:55:46', NULL, NULL, 'Pakai NIM', '_himmawan73558625040'),
('31212128', '31212128', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_teguhadr50021971526'),
('31212129', '31212129', 1, NULL, NULL, NULL, '2022-06-06 08:55:46', NULL, NULL, 'Pakai NIM', '_ikanurpa78892127860'),
('31212130', '31212130', 1, NULL, NULL, NULL, '2022-06-06 08:55:46', NULL, NULL, 'Pakai NIM', '_sitinurh39261397425'),
('31212131', '31212131', 1, NULL, NULL, NULL, '2022-06-06 08:55:46', NULL, NULL, 'Pakai NIM', '_elinmuzi86090774397'),
('31212132', '31212132', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_ferdinan56189736405'),
('31212133', '31212133', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_fitriyan79513751834'),
('31212134', '31212134', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_gungungu47087082896'),
('31212135', '31212135', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_habbimuh34245722035'),
('31212136', '31212136', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_meysaput36019676346'),
('31212137', '31212137', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_mokhamma41510295925'),
('31212138', '31212138', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_muhammad56983124397'),
('31212139', '31212139', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_reginafi23892337382'),
('31212140', '31212140', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_riniwahy50164381582'),
('31212141', '31212141', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_aldiahma17557724437'),
('31212142', '31212142', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_salmatul53079212568'),
('31212143', '31212143', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_sendyawa68100953639'),
('31212144', '31212144', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_dewantif70732247600'),
('31212145', '31212145', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_sitikhot67127188927'),
('31212146', '31212146', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_ajaymaul69003194549'),
('31212147', '31212147', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_erniilmi10924948981'),
('31212148', '31212148', 1, NULL, NULL, NULL, '2022-06-06 08:55:46', NULL, NULL, 'Pakai NIM', '_ilvamina20760882301'),
('31212149', '31212149', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_dimasill68340015402'),
('31212150', '31212150', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_grimonia61264227381'),
('31212153', '31212153', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_dewiyuli84664018356'),
('31212154', '31212154', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_fitriyan31264351681'),
('31212155', '31212155', 1, NULL, NULL, NULL, '2022-06-06 08:55:46', NULL, NULL, 'Pakai NIM', '_talithad66327248533'),
('31212156', '31212156', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_pujiokta41548838002'),
('31212157', '31212157', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_evaandin11960268070'),
('31212158', '31212158', 1, NULL, NULL, NULL, '2022-06-06 08:55:46', NULL, NULL, 'Pakai NIM', '_sultangy13911793290'),
('31212159', '31212159', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_mu`ammar82813697435'),
('31212160', '31212160', 1, NULL, NULL, NULL, '2022-06-06 08:55:46', NULL, NULL, 'Pakai NIM', '_ekaroeha75423744313'),
('31212161', '31212161', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_farizram22270588713'),
('31212162', '31212162', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_arinikha71590264349'),
('31212163', '31212163', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_ginaayur88517716473'),
('31212165', '31212165', 1, NULL, NULL, NULL, '2022-06-06 09:16:11', NULL, NULL, '31212165', '_rijalulwa3121216534'),
('31212166', '31212166', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_sandisap31835971479'),
('31212168', '31212168', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_dedehoer54967035718'),
('31212169', '31212169', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_sidqihil76670182305'),
('31212170', '31212170', 1, NULL, NULL, NULL, '2022-06-06 08:55:46', NULL, NULL, 'Pakai NIM', '_anisatul64055185348'),
('31212171', '31212171', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_elaapril65078378699'),
('31212172', '31212172', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_weniagus11064401273'),
('31212173', '31212173', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_inesnurs75936346819'),
('31212174', '31212174', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_farhanri47022241946'),
('31212175', '31212175', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_muhammad26606618015'),
('31212176', '31212176', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_parahita61167782161'),
('31212177', '31212177', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_nazwaalk34903814600'),
('31212179', '31212179', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_noviyant13512103634'),
('31212180', '31212180', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_raihanab56242105109'),
('31212183', '31212183', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_hilyaash53385528017'),
('31212184', '31212184', 1, NULL, NULL, NULL, '2022-06-06 08:55:46', NULL, NULL, 'Pakai NIM', '_raenaagu30388458348'),
('31212188', '31212188', 1, NULL, NULL, '15:12:19', '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_anitanur54755883880'),
('31212189', '31212189', 1, NULL, NULL, '20:30:05', '2022-06-06 08:55:46', NULL, NULL, 'Pakai NIM', '_chumaero83995068462'),
('31212192', '31212192', 1, NULL, NULL, NULL, '2022-06-06 08:55:46', NULL, NULL, 'Pakai NIM', '_krisnama67378361379'),
('31212193', '31212193', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_hidayatu47490823989'),
('31212194', '31212194', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_andreapa88667398070'),
('31212195', '31212195', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_taufikhi81701016384'),
('31212196', '31212196', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_rismawat11904563317'),
('31212197', '31212197', 1, NULL, NULL, NULL, '2022-06-06 08:55:46', NULL, NULL, 'Pakai NIM', '_siskawat61638475897'),
('31212198', '31212198', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_eddiwand75600802776'),
('31212199', '31212199', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_nurilah264113570662'),
('31212200', '31212200', 1, NULL, NULL, NULL, '2022-06-06 08:55:46', NULL, NULL, 'Pakai NIM', '_mayaindr11158697266'),
('31212201', '31212201', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_adistytr22236847611'),
('31212202', '31212202', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_adikaswa45999065518'),
('31212203', '31212203', 1, NULL, NULL, NULL, '2022-06-06 08:55:46', NULL, NULL, 'Pakai NIM', '_kurniawa73185358468'),
('31212204', '31212204', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_tiarimam70343587320'),
('31212205', '31212205', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_rahadatu48960261086'),
('31212207', '31212207', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_agitahan88163923916'),
('31212211', '31212211', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_rizkyrah49255091469'),
('31212212', '31212212', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_rifkyari71103577158'),
('31212214', '31212214', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_muhamads57354883667'),
('31212215', '31212215', 1, NULL, NULL, NULL, '2022-06-06 08:55:46', NULL, NULL, 'Pakai NIM', '_rizkinur37434625480'),
('31212216', '31212216', 1, NULL, NULL, NULL, '2022-06-06 08:55:46', NULL, NULL, 'Pakai NIM', '_ramdhanp36394465031'),
('31212222', '31212222', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_ahmadriz35367068432'),
('31222187', '31222187', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_ucicanad70504166936'),
('31222208', '31222208', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_muhamads80635561984'),
('31222210', '31222210', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_cahayaag17818325730'),
('31222217', '31222217', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_aldinurs26022872783'),
('31222220', '31222220', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_rohadiut74276372229'),
('31222221', '31222221', 1, NULL, NULL, '15:13:49', '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_herlytaq89906216769'),
('41170090', '41170090', 1, NULL, NULL, NULL, '2022-06-06 08:55:46', NULL, NULL, 'Pakai NIM', '_salwafat71227805330'),
('41190049', '41190049', 1, NULL, NULL, NULL, '2022-06-06 08:55:46', NULL, NULL, 'Pakai NIM', '_moh.mift42380216499'),
('41190055', '41190055', 1, NULL, NULL, NULL, '2022-06-06 08:55:45', NULL, NULL, 'Pakai NIM', '_anggarap86318121035'),
('41190098', '41190098', 1, NULL, NULL, NULL, '2022-06-06 08:55:46', NULL, NULL, 'Pakai NIM', '_mohamadd21899824875'),
('41190125', '41190125', 1, NULL, NULL, NULL, '2022-06-06 08:55:46', NULL, NULL, 'Pakai NIM', '_fiansayf39631788249'),
('abi', 'abi123', 2, NULL, '2022-06-03 10:33:55', '04:07:06', '2022-06-04 10:04:25', NULL, NULL, 'abi123', '_abi21900_1648781867'),
('ahmad', 'ahmad', 1, NULL, '2022-06-04 10:30:10', '08:48:46', '2022-06-04 10:00:26', NULL, NULL, 'ahmad', '_10694300_1648781867'),
('ainul', 'ainul123', 1, NULL, NULL, '19:54:58', '2022-07-18 03:31:00', NULL, NULL, NULL, '_ainul56876756876756'),
('aishanda', 'aishanda', 1, NULL, NULL, NULL, '2022-07-18 03:31:00', NULL, NULL, NULL, '_aishanda79734579734'),
('aji', 'aji', 1, NULL, NULL, NULL, '2022-07-18 03:31:00', NULL, NULL, NULL, '_aji6115606115606115'),
('andika', 'andika', 1, NULL, NULL, NULL, '2022-07-18 03:31:00', NULL, NULL, NULL, '_andika6420926420926'),
('andrian', 'andrian', 1, NULL, NULL, NULL, '2022-07-18 03:31:00', NULL, NULL, NULL, '_andrian362984362984'),
('anum', 'anum', 1, NULL, NULL, NULL, '2022-07-18 03:31:00', NULL, NULL, NULL, '_anum682770682770682'),
('apsarika', 'apsarika', 1, NULL, NULL, NULL, '2022-07-18 03:31:00', NULL, NULL, NULL, '_apsarika75967175967'),
('arina', 'arina', 1, NULL, NULL, NULL, '2022-07-18 03:31:00', NULL, NULL, NULL, '_arina72020672020672'),
('charlie', 'charlie', 1, NULL, NULL, '08:36:05', '2022-06-06 07:41:17', NULL, NULL, 'charlie', '_charlie0_1648781867'),
('daffa', 'daffa', 1, NULL, NULL, NULL, '2022-07-18 03:31:00', NULL, NULL, NULL, '_daffa40196240196240'),
('diana', 'diana', 1, NULL, NULL, NULL, '2022-07-18 03:31:00', NULL, NULL, NULL, '_diana42073842073842'),
('edi', 'edi', 1, NULL, NULL, NULL, '2022-07-18 03:31:00', NULL, NULL, NULL, '_edi5863565863565863'),
('enggar', 'enggar', 1, NULL, NULL, NULL, '2022-07-18 03:31:00', NULL, NULL, NULL, '_enggar3584713584713'),
('fais', 'fais', 1, NULL, NULL, NULL, '2022-07-18 03:31:00', NULL, NULL, NULL, '_fais701665701665701'),
('faris', 'faris', 1, NULL, NULL, NULL, '2022-07-18 03:31:00', NULL, NULL, NULL, '_faris92736792736792'),
('faruk', 'faruk', 1, NULL, NULL, NULL, '2022-07-18 03:31:00', NULL, NULL, NULL, '_faruk36813136813136'),
('iin', 'iin123', 1, NULL, NULL, '18:17:33', '2022-07-18 03:31:00', NULL, NULL, NULL, '_iin6905926905926905'),
('imron', 'imron', 1, NULL, NULL, NULL, '2022-07-18 03:31:00', NULL, NULL, NULL, '_imron91706291706291'),
('ismi', 'ismi', 1, NULL, NULL, NULL, '2022-07-18 03:31:00', NULL, NULL, NULL, '_ismi489323489323489'),
('jamalul', 'jamalul', 1, NULL, NULL, NULL, '2022-07-18 03:31:00', NULL, NULL, NULL, '_jamalul827431827431'),
('latifatul', 'latifatul', 1, NULL, NULL, NULL, '2022-07-18 03:31:00', NULL, NULL, NULL, '_latifatul8312398312'),
('manager', 'manager', 2, NULL, NULL, NULL, '2022-07-18 03:31:00', NULL, NULL, NULL, '_manager516791516791'),
('nabila', 'nabila', 1, NULL, NULL, NULL, '2022-07-18 03:31:00', NULL, NULL, NULL, '_nabila8178248178248'),
('nurrika', 'nurrika', 1, NULL, NULL, NULL, '2022-07-18 03:31:00', NULL, NULL, NULL, '_nurrika555121555121'),
('pradana', 'pradana', 1, NULL, NULL, NULL, '2022-07-18 03:31:00', NULL, NULL, NULL, '_pradana952770952770'),
('putra', 'putra', 1, NULL, NULL, NULL, '2022-07-18 03:31:00', NULL, NULL, NULL, '_putra12272612272612'),
('putri', 'putri', 1, NULL, NULL, NULL, '2022-07-18 03:31:00', NULL, NULL, NULL, '_putri26258826258826'),
('riski', 'riski', 1, NULL, NULL, NULL, '2022-07-18 03:31:00', NULL, NULL, NULL, '_riski94709394709394'),
('rizky', 'rizky', 1, NULL, NULL, NULL, '2022-07-18 03:31:00', NULL, NULL, NULL, '_rizky59000459000459'),
('salwa', 'salwa', 1, NULL, '2022-06-01 10:34:00', '08:36:46', '2022-06-04 10:00:42', NULL, NULL, 'salwa', '_12463300_1648781867'),
('sayyid', 'sayyid', 1, NULL, NULL, NULL, '2022-07-18 03:31:00', NULL, NULL, NULL, '_sayyid2743132743132'),
('steven', 'steven', 1, NULL, NULL, NULL, '2022-07-18 03:31:00', NULL, NULL, NULL, '_steven4959514959514'),
('syafina', 'syafina', 1, NULL, NULL, NULL, '2022-07-18 03:31:00', NULL, NULL, NULL, '_syafina428273428273'),
('vsga', 'vsga', 2, NULL, NULL, NULL, '2022-07-18 03:31:00', NULL, NULL, NULL, '_vsga660253660253660'),
('waqi', 'waqi', 1, NULL, NULL, NULL, '2022-07-18 03:31:00', NULL, NULL, NULL, '_waqi617914617914617');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD PRIMARY KEY (`id_chat`),
  ADD KEY `chat_by` (`chat_by`),
  ADD KEY `id_mk_sesi` (`id_mk_sesi`),
  ADD KEY `chat_type` (`id_chat_type`),
  ADD KEY `id_chat_type` (`id_chat_type`);

--
-- Indeks untuk tabel `tb_chat_answer`
--
ALTER TABLE `tb_chat_answer`
  ADD PRIMARY KEY (`answer_id`),
  ADD UNIQUE KEY `id_chat_answer_by` (`id_chat_answer_by`),
  ADD KEY `answer_by` (`answer_by`),
  ADD KEY `chat_id` (`id_chat`);

--
-- Indeks untuk tabel `tb_chat_like`
--
ALTER TABLE `tb_chat_like`
  ADD PRIMARY KEY (`id_chat_like`),
  ADD KEY `like_by` (`like_by`),
  ADD KEY `id_chat` (`id_chat`);

--
-- Indeks untuk tabel `tb_chat_type`
--
ALTER TABLE `tb_chat_type`
  ADD PRIMARY KEY (`id_chat_type`),
  ADD UNIQUE KEY `chat_type` (`chat_type`);

--
-- Indeks untuk tabel `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD PRIMARY KEY (`id_dosen`),
  ADD KEY `username` (`username`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `nidn` (`nidn`);

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD UNIQUE KEY `kode_kelas` (`kode_kelas`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indeks untuk tabel `tb_kelas_peserta`
--
ALTER TABLE `tb_kelas_peserta`
  ADD PRIMARY KEY (`id_kelas_peserta`),
  ADD KEY `id_kelas` (`id_kelas`),
  ADD KEY `username` (`username`),
  ADD KEY `insert_by` (`insert_by`);

--
-- Indeks untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD PRIMARY KEY (`id_login`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `tb_mhs`
--
ALTER TABLE `tb_mhs`
  ADD PRIMARY KEY (`id_mhs`),
  ADD UNIQUE KEY `nim` (`nim`),
  ADD KEY `username` (`username`),
  ADD KEY `id_prodi` (`id_prodi`);

--
-- Indeks untuk tabel `tb_mk`
--
ALTER TABLE `tb_mk`
  ADD PRIMARY KEY (`id_mk`),
  ADD UNIQUE KEY `kode_mk` (`kode_mk`),
  ADD KEY `creator` (`mk_creator`),
  ADD KEY `id_prodi` (`id_prodi`),
  ADD KEY `dosen_pengampu` (`dosen_pengampu`);

--
-- Indeks untuk tabel `tb_mk_kelas`
--
ALTER TABLE `tb_mk_kelas`
  ADD PRIMARY KEY (`id_mk_kelas`),
  ADD KEY `id_mk` (`id_mk`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `tb_mk_sesi`
--
ALTER TABLE `tb_mk_sesi`
  ADD PRIMARY KEY (`id_mk_sesi`),
  ADD KEY `id_mk` (`id_mk`),
  ADD KEY `dosen_pengajar` (`dosen_pengajar`);

--
-- Indeks untuk tabel `tb_mk_sesi_login_point`
--
ALTER TABLE `tb_mk_sesi_login_point`
  ADD PRIMARY KEY (`id_mk_sesi_login_point`),
  ADD KEY `id_mk_sesi` (`id_mk_sesi`),
  ADD KEY `id_login` (`id_login`),
  ADD KEY `login_point` (`login_point`);

--
-- Indeks untuk tabel `tb_presensi`
--
ALTER TABLE `tb_presensi`
  ADD PRIMARY KEY (`id_presensi`),
  ADD KEY `id_mk_sesi` (`id_mk_sesi`),
  ADD KEY `username` (`username`);

--
-- Indeks untuk tabel `tb_prodi`
--
ALTER TABLE `tb_prodi`
  ADD PRIMARY KEY (`id_prodi`),
  ADD UNIQUE KEY `singkatan_prodi` (`singkatan_prodi`),
  ADD UNIQUE KEY `nidn_kaprodi` (`nidn_kaprodi`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `folder_uploads` (`folder_uploads`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_chat`
--
ALTER TABLE `tb_chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `tb_chat_answer`
--
ALTER TABLE `tb_chat_answer`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT untuk tabel `tb_chat_type`
--
ALTER TABLE `tb_chat_type`
  MODIFY `id_chat_type` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_dosen`
--
ALTER TABLE `tb_dosen`
  MODIFY `id_dosen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_mhs`
--
ALTER TABLE `tb_mhs`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT untuk tabel `tb_mk`
--
ALTER TABLE `tb_mk`
  MODIFY `id_mk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_mk_sesi`
--
ALTER TABLE `tb_mk_sesi`
  MODIFY `id_mk_sesi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tb_prodi`
--
ALTER TABLE `tb_prodi`
  MODIFY `id_prodi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_chat`
--
ALTER TABLE `tb_chat`
  ADD CONSTRAINT `tb_chat_ibfk_1` FOREIGN KEY (`chat_by`) REFERENCES `tb_user` (`username`),
  ADD CONSTRAINT `tb_chat_ibfk_2` FOREIGN KEY (`id_mk_sesi`) REFERENCES `tb_mk_sesi` (`id_mk_sesi`),
  ADD CONSTRAINT `tb_chat_ibfk_3` FOREIGN KEY (`id_chat_type`) REFERENCES `tb_chat_type` (`id_chat_type`);

--
-- Ketidakleluasaan untuk tabel `tb_chat_answer`
--
ALTER TABLE `tb_chat_answer`
  ADD CONSTRAINT `tb_chat_answer_ibfk_1` FOREIGN KEY (`id_chat`) REFERENCES `tb_chat` (`id_chat`),
  ADD CONSTRAINT `tb_chat_answer_ibfk_2` FOREIGN KEY (`answer_by`) REFERENCES `tb_user` (`username`);

--
-- Ketidakleluasaan untuk tabel `tb_chat_like`
--
ALTER TABLE `tb_chat_like`
  ADD CONSTRAINT `tb_chat_like_ibfk_1` FOREIGN KEY (`id_chat`) REFERENCES `tb_chat` (`id_chat`),
  ADD CONSTRAINT `tb_chat_like_ibfk_2` FOREIGN KEY (`like_by`) REFERENCES `tb_user` (`username`);

--
-- Ketidakleluasaan untuk tabel `tb_dosen`
--
ALTER TABLE `tb_dosen`
  ADD CONSTRAINT `tb_dosen_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `tb_prodi` (`id_prodi`),
  ADD CONSTRAINT `tb_dosen_ibfk_2` FOREIGN KEY (`username`) REFERENCES `tb_user` (`username`);

--
-- Ketidakleluasaan untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD CONSTRAINT `tb_kelas_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `tb_prodi` (`id_prodi`);

--
-- Ketidakleluasaan untuk tabel `tb_kelas_peserta`
--
ALTER TABLE `tb_kelas_peserta`
  ADD CONSTRAINT `tb_kelas_peserta_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`),
  ADD CONSTRAINT `tb_kelas_peserta_ibfk_2` FOREIGN KEY (`username`) REFERENCES `tb_user` (`username`),
  ADD CONSTRAINT `tb_kelas_peserta_ibfk_3` FOREIGN KEY (`insert_by`) REFERENCES `tb_user` (`username`);

--
-- Ketidakleluasaan untuk tabel `tb_login`
--
ALTER TABLE `tb_login`
  ADD CONSTRAINT `tb_login_ibfk_1` FOREIGN KEY (`username`) REFERENCES `tb_user` (`username`);

--
-- Ketidakleluasaan untuk tabel `tb_mhs`
--
ALTER TABLE `tb_mhs`
  ADD CONSTRAINT `tb_mhs_ibfk_1` FOREIGN KEY (`id_prodi`) REFERENCES `tb_prodi` (`id_prodi`),
  ADD CONSTRAINT `tb_mhs_ibfk_2` FOREIGN KEY (`username`) REFERENCES `tb_user` (`username`);

--
-- Ketidakleluasaan untuk tabel `tb_mk`
--
ALTER TABLE `tb_mk`
  ADD CONSTRAINT `tb_mk_ibfk_1` FOREIGN KEY (`mk_creator`) REFERENCES `tb_user` (`username`),
  ADD CONSTRAINT `tb_mk_ibfk_2` FOREIGN KEY (`id_prodi`) REFERENCES `tb_prodi` (`id_prodi`),
  ADD CONSTRAINT `tb_mk_ibfk_3` FOREIGN KEY (`dosen_pengampu`) REFERENCES `tb_user` (`username`);

--
-- Ketidakleluasaan untuk tabel `tb_mk_kelas`
--
ALTER TABLE `tb_mk_kelas`
  ADD CONSTRAINT `tb_mk_kelas_ibfk_1` FOREIGN KEY (`id_mk`) REFERENCES `tb_mk` (`id_mk`),
  ADD CONSTRAINT `tb_mk_kelas_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`);

--
-- Ketidakleluasaan untuk tabel `tb_mk_sesi`
--
ALTER TABLE `tb_mk_sesi`
  ADD CONSTRAINT `tb_mk_sesi_ibfk_1` FOREIGN KEY (`id_mk`) REFERENCES `tb_mk` (`id_mk`),
  ADD CONSTRAINT `tb_mk_sesi_ibfk_2` FOREIGN KEY (`dosen_pengajar`) REFERENCES `tb_user` (`username`);

--
-- Ketidakleluasaan untuk tabel `tb_mk_sesi_login_point`
--
ALTER TABLE `tb_mk_sesi_login_point`
  ADD CONSTRAINT `tb_mk_sesi_login_point_ibfk_1` FOREIGN KEY (`id_login`) REFERENCES `tb_login` (`id_login`),
  ADD CONSTRAINT `tb_mk_sesi_login_point_ibfk_2` FOREIGN KEY (`id_mk_sesi`) REFERENCES `tb_mk_sesi` (`id_mk_sesi`);

--
-- Ketidakleluasaan untuk tabel `tb_presensi`
--
ALTER TABLE `tb_presensi`
  ADD CONSTRAINT `tb_presensi_ibfk_1` FOREIGN KEY (`id_mk_sesi`) REFERENCES `tb_mk_sesi` (`id_mk_sesi`),
  ADD CONSTRAINT `tb_presensi_ibfk_2` FOREIGN KEY (`username`) REFERENCES `tb_user` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
