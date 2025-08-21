-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 21, 2025 at 09:35 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ppmh`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_detail`
--

CREATE TABLE `admin_detail` (
  `user_id` int NOT NULL,
  `nama_admin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin_detail`
--

INSERT INTO `admin_detail` (`user_id`, `nama_admin`) VALUES
(4, 'Mely Rahmawati A.Md');

-- --------------------------------------------------------

--
-- Table structure for table `guru_detail`
--

CREATE TABLE `guru_detail` (
  `user_id` int NOT NULL,
  `nama_guru` varchar(50) NOT NULL,
  `nomor_telepon` varchar(25) NOT NULL,
  `jabatan` enum('Wali Kelas','Guru Pendamping') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `guru_detail`
--

INSERT INTO `guru_detail` (`user_id`, `nama_guru`, `nomor_telepon`, `jabatan`) VALUES
(24, 'Faza Fauziah S.Pd', '089231142211', 'Guru Pendamping'),
(30, 'Ela Ferawaty S.Pd', '089231142212', 'Wali Kelas');

-- --------------------------------------------------------

--
-- Table structure for table `hasil_cpi`
--

CREATE TABLE `hasil_cpi` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `nilai_cpi` decimal(5,2) NOT NULL,
  `kategori_iq` varchar(50) DEFAULT NULL,
  `tipe_kecerdasan` varchar(50) DEFAULT NULL,
  `tanggal_tes` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hasil_cpi`
--

INSERT INTO `hasil_cpi` (`id`, `user_id`, `nilai_cpi`, `kategori_iq`, `tipe_kecerdasan`, `tanggal_tes`) VALUES
(16, 25, '139.00', 'Di Atas Rata-rata', 'Si Logis Kecil', '2025-08-10 11:11:16'),
(17, 26, '150.00', 'Superior', 'Si Logis Kecil', '2025-08-10 11:15:13'),
(18, 27, '139.00', 'Di Atas Rata-rata', 'Si Logis Kecil', '2025-08-10 11:30:02'),
(19, 28, '131.00', 'Rata-rata (Normal)', 'Si Cerdik', '2025-08-10 11:32:43'),
(20, 29, '129.00', 'Rata-rata (Normal)', 'Si Logis Kecil', '2025-08-10 11:37:46'),
(21, 25, '139.00', 'Di Atas Rata-rata', 'Si Logis Kecil', '2025-08-10 11:48:12'),
(22, 25, '100.00', 'Memerlukan Dukungan Tambahan', 'Si Logis Kecil', '2025-08-11 11:21:25'),
(23, 25, '92.00', 'Memerlukan Dukungan Tambahan', 'Si Pencerita', '2025-08-18 12:43:39'),
(24, 25, '92.00', 'Memerlukan Dukungan Tambahan', 'Si Pencerita', '2025-08-18 13:11:37'),
(25, 25, '92.00', 'Memerlukan Dukungan Tambahan', 'Si Pencerita', '2025-08-18 22:01:03'),
(26, 31, '92.00', 'Memerlukan Dukungan Tambahan', NULL, '2025-08-18 22:07:36'),
(27, 31, '92.00', 'Memerlukan Dukungan Tambahan', 'Si Pencerita', '2025-08-18 22:12:34'),
(28, 31, '92.00', 'Memerlukan Dukungan Tambahan', 'Si Pencerita', '2025-08-18 22:14:17'),
(29, 31, '92.00', 'Memerlukan Dukungan Tambahan', 'Si Pencerita', '2025-08-18 22:14:50'),
(30, 31, '92.00', 'Memerlukan Dukungan Tambahan', 'Si Pencerita', '2025-08-18 22:15:56'),
(31, 31, '65.00', 'Memerlukan Dukungan Tambahan', 'Si Logis Kecil', '2025-08-18 22:24:23'),
(32, 31, '78.00', 'Memerlukan Dukungan Tambahan', 'Si Pencerita', '2025-08-18 22:30:35'),
(33, 31, '92.00', 'Memerlukan Dukungan Tambahan', 'Si Pencerita', '2025-08-19 13:16:46');

-- --------------------------------------------------------

--
-- Table structure for table `jawaban_cpi`
--

CREATE TABLE `jawaban_cpi` (
  `id` int NOT NULL,
  `soal_id` int NOT NULL,
  `jawaban` text NOT NULL,
  `nilai_konversi` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `jawaban_cpi`
--

INSERT INTO `jawaban_cpi` (`id`, `soal_id`, `jawaban`, `nilai_konversi`) VALUES
(1, 1, '10', 5),
(2, 1, '12', 3),
(3, 1, '9', 2),
(4, 1, '6', 1),
(5, 2, '4', 2),
(6, 2, '5', 5),
(7, 2, '3', 1),
(8, 2, '6', 3),
(9, 3, '6', 2),
(10, 3, '8', 5),
(11, 3, '10', 3),
(12, 3, '12', 1),
(13, 4, 'Segitiga', 4),
(14, 4, 'Persegi panjang', 4),
(15, 4, 'Lingkaran', 4),
(16, 4, 'Semua benar', 5),
(17, 5, 'Kecil', 1),
(18, 5, 'Tinggi', 2),
(19, 5, 'Gede', 5),
(20, 5, 'Panjang', 3),
(21, 6, 'Apakah ibu sudah ke pasar?', 5),
(22, 6, 'Ibu pergi kemana?', 4),
(23, 6, 'Siapa yang pergi ke pasar?', 4),
(24, 6, 'Saya tidak tahu', 1),
(25, 7, 'Cepat', 5),
(26, 7, 'Makan', 2),
(27, 7, 'Anak', 1),
(28, 7, 'Kucing', 1),
(29, 8, 'Ayah sedang membaca buku', 5),
(30, 8, 'Ikan berenang di darat', 1),
(31, 8, 'Adik bermain boneka', 4),
(32, 8, 'Ibu memasak nasi', 5),
(33, 9, 'Menangis', 1),
(34, 9, 'Memanggil guru', 5),
(35, 9, 'Melompat', 2),
(36, 9, 'Mendorong lemari', 1),
(37, 10, 'Ikut bertengkar', 1),
(38, 10, 'Melaporkan ke guru', 5),
(39, 10, 'Menjauh', 3),
(40, 10, 'Menonton', 2),
(41, 11, 'Membantu mencarinya', 5),
(42, 11, 'Diam saja', 2),
(43, 11, 'Mengambil milik teman lain', 1),
(44, 11, 'Tidak peduli', 1),
(45, 12, 'Menangis', 1),
(46, 12, 'Minta ke teman', 5),
(47, 12, 'Pulang', 2),
(48, 12, 'Marah', 1),
(49, 13, 'Mobil', 2),
(50, 13, 'Motor', 2),
(51, 13, 'Pohon', 5),
(52, 13, 'Bus', 2),
(53, 14, '⚫️ - ⚫️', 5),
(54, 14, '🔺 - 🔵', 2),
(55, 14, '🟢 - 🟥', 1),
(56, 14, '⬛️ - 🔺', 2),
(57, 15, '🔺', 2),
(58, 15, '🔵', 5),
(59, 15, '⬛️', 1),
(60, 15, '🔷', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna_detail`
--

CREATE TABLE `pengguna_detail` (
  `user_id` int NOT NULL,
  `nama_anak` varchar(50) NOT NULL,
  `kelas` enum('A1','B1','B2') NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `nama_orangtua` varchar(50) NOT NULL,
  `nomor_telepon` varchar(25) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pengguna_detail`
--

INSERT INTO `pengguna_detail` (`user_id`, `nama_anak`, `kelas`, `jenis_kelamin`, `nama_orangtua`, `nomor_telepon`, `created_at`) VALUES
(25, 'Adnan Khoir Arsenio', 'B1', 'Laki-Laki', 'Sumiati', '089231142211', '2025-08-10 11:01:25'),
(26, 'Zavier Shaquil Dzakiandra', 'A1', 'Laki-Laki', 'Fatmawati', '089231142212', '2025-08-10 11:02:41'),
(27, 'Reyna Putri Feriani', 'B2', 'Perempuan', 'Intan', '089231142213', '2025-08-10 11:03:24'),
(28, 'Artanabil Raqila Shahbaz', 'B1', 'Laki-Laki', 'Fera', '089231142214', '2025-08-10 11:05:23'),
(29, 'Muhammad Latif Permana', 'A1', 'Laki-Laki', 'Asri', '089231142215', '2025-08-10 11:06:05'),
(31, 'tester', 'A1', 'Laki-Laki', 'tester', '123', '2025-08-18 21:19:06');

-- --------------------------------------------------------

--
-- Table structure for table `soal_cpi`
--

CREATE TABLE `soal_cpi` (
  `soal_id` int NOT NULL,
  `kriteria` enum('Logika-Matematika','Linguistik','Pemecahan Masalah','Visual-Spasial') NOT NULL,
  `pertanyaan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `soal_cpi`
--

INSERT INTO `soal_cpi` (`soal_id`, `kriteria`, `pertanyaan`) VALUES
(1, 'Logika-Matematika', 'Berapa angka selanjutnya dari pola ini: 2, 4, 6, 8, ...?'),
(2, 'Logika-Matematika', 'Jika kamu punya 3 apel dan kamu beli lagi 2, berapa jumlah apelmu sekarang?'),
(3, 'Logika-Matematika', 'Jika 1+1 = 2 dan 2+2 = 4, maka 4+4 = ?'),
(4, 'Logika-Matematika', 'Mana yang memiliki bentuk simetris?'),
(5, 'Linguistik', 'Manakah yang merupakan sinonim dari “besar”?'),
(6, 'Linguistik', 'Kalimat tanya dari \"Ibu pergi ke pasar\" adalah...?'),
(7, 'Linguistik', 'Mana yang termasuk kata sifat?'),
(8, 'Linguistik', 'Kalimat berikut salah, kecuali:'),
(9, 'Pemecahan Masalah', 'Jika ingin mengambil mainan di tempat tinggi, kamu...?'),
(10, 'Pemecahan Masalah', 'Ketika dua temanmu bertengkar, kamu akan...?'),
(11, 'Pemecahan Masalah', 'Temanmu kehilangan pensil. Apa yang kamu lakukan?'),
(12, 'Pemecahan Masalah', 'Jika kamu kehabisan kertas saat menggambar...'),
(13, 'Visual-Spasial', 'Manakah gambar yang tidak cocok di antara mobil, motor, pohon, bus?'),
(14, 'Visual-Spasial', 'Gambar bentuk yang sama: ⚫️ - ⚫️, 🔺 - 🔵, ...'),
(15, 'Visual-Spasial', 'Lengkapi pola: 🔺🔵🔺🔵___');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','guru','pengguna') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `role`) VALUES
(4, 'tester@gmail.com', '$2y$10$0oz9FcH4yZM2rCAdkeVetemfyISMpmmlN3DMgDClCNZQ1zqL8Gp7W', 'admin'),
(24, 'faza@gmail.com', '$2y$10$zR1bC5ybX.IvjrgCDq8Mo.Z8ueigcnN6rjaOQAqCuINkqPJ6Srz7e', 'guru'),
(25, 'pengguna1@gmail.com', '$2y$10$V8c9kpomIMTrjiSbK1BWweztswhvIuHHmbJTrrkI1PF/4eUypvLMi', 'pengguna'),
(26, 'pengguna2@gmail.com', '$2y$10$SoGFtkR92Iz0Sd2LQsBnYOi02iVEYodnw8PMWNeeGYEEC06G4rrEy', 'pengguna'),
(27, 'pengguna3@gmail.com', '$2y$10$0vwMqtDd1eZYO9j3h2q1.OX9MbV7yLBsB3kgDSHoL40pW0hEK1pbO', 'pengguna'),
(28, 'pengguna4@gmail.com', '$2y$10$LRhbM7sR2eYIzT06hpECJ.mbBOkbd54oGP8Vso8NWE2ONOvDa0S2W', 'pengguna'),
(29, 'pengguna5@gmail.com', '$2y$10$ZXFS/HhYwL6NHluHREneuusb20wCM2CUPGdrtZ75T42grpPeF7QBG', 'pengguna'),
(30, 'elaferawaty@gmail.com', '$2y$10$hplipe/EfM5WLPnC5USyMedU8QA2.DjVygJL7mYTerfQMilp.SH5O', 'guru'),
(31, 'pengguna0@gmail.com', '$2y$10$PLlvzADI3wRHcCX04d97AefUAkiQefGkpOVB5qIYSIFa.S.H1dsMC', 'pengguna');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_detail`
--
ALTER TABLE `admin_detail`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `guru_detail`
--
ALTER TABLE `guru_detail`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `hasil_cpi`
--
ALTER TABLE `hasil_cpi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `jawaban_cpi`
--
ALTER TABLE `jawaban_cpi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jawaban_soal` (`soal_id`);

--
-- Indexes for table `pengguna_detail`
--
ALTER TABLE `pengguna_detail`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `soal_cpi`
--
ALTER TABLE `soal_cpi`
  ADD PRIMARY KEY (`soal_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil_cpi`
--
ALTER TABLE `hasil_cpi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `jawaban_cpi`
--
ALTER TABLE `jawaban_cpi`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `soal_cpi`
--
ALTER TABLE `soal_cpi`
  MODIFY `soal_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_detail`
--
ALTER TABLE `admin_detail`
  ADD CONSTRAINT `admin_detail_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `guru_detail`
--
ALTER TABLE `guru_detail`
  ADD CONSTRAINT `guru_detail_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `hasil_cpi`
--
ALTER TABLE `hasil_cpi`
  ADD CONSTRAINT `hasil_cpi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jawaban_cpi`
--
ALTER TABLE `jawaban_cpi`
  ADD CONSTRAINT `fk_jawaban_soal` FOREIGN KEY (`soal_id`) REFERENCES `soal_cpi` (`soal_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jawaban_cpi_ibfk_1` FOREIGN KEY (`soal_id`) REFERENCES `soal_cpi` (`soal_id`) ON DELETE CASCADE;

--
-- Constraints for table `pengguna_detail`
--
ALTER TABLE `pengguna_detail`
  ADD CONSTRAINT `pengguna_detail_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
