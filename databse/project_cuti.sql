-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Jun 2022 pada 06.24
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_cuti_malasngoding`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_nama` varchar(50) NOT NULL,
  `admin_kontak` varchar(15) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_password` varchar(100) NOT NULL,
  `admin_foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_nama`, `admin_kontak`, `admin_username`, `admin_password`, `admin_foto`) VALUES
(1, 'admin saya', '082272242022', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin_foto.png'),
(6, 'jaconb', '09281982192', 'vepes', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'admin_foto.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_cuti`
--

CREATE TABLE `tbl_cuti` (
  `cuti_id` int(11) NOT NULL,
  `cuti_devisi` int(11) NOT NULL,
  `cuti_jenis` int(11) NOT NULL,
  `cuti_pegawai` int(11) NOT NULL,
  `cuti_tanggal` date NOT NULL,
  `cuti_dari` date NOT NULL,
  `cuti_sampai` date NOT NULL,
  `cuti_jumlah` int(11) NOT NULL,
  `cuti_alasan` varchar(100) NOT NULL,
  `cuti_alamat` varchar(100) DEFAULT NULL,
  `cuti_supervisor` int(11) DEFAULT NULL,
  `cuti_status_supervisor` varchar(100) DEFAULT NULL,
  `cuti_keterangan_supervisor` varchar(100) DEFAULT NULL,
  `cuti_manajer` int(11) DEFAULT NULL,
  `cuti_status_manajer` varchar(100) DEFAULT NULL,
  `cuti_keterangan_manajer` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_cuti`
--

INSERT INTO `tbl_cuti` (`cuti_id`, `cuti_devisi`, `cuti_jenis`, `cuti_pegawai`, `cuti_tanggal`, `cuti_dari`, `cuti_sampai`, `cuti_jumlah`, `cuti_alasan`, `cuti_alamat`, `cuti_supervisor`, `cuti_status_supervisor`, `cuti_keterangan_supervisor`, `cuti_manajer`, `cuti_status_manajer`, `cuti_keterangan_manajer`) VALUES
(1, 5, 2, 1, '2022-06-02', '2022-06-05', '2022-06-07', 2, 'acara dirumah', 'jalan kenari nomor 5 annur ', 1, 'Terima', 'oke', 1, 'Terima', 'oke');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_devisi`
--

CREATE TABLE `tbl_devisi` (
  `devisi_id` int(11) NOT NULL,
  `devisi_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_devisi`
--

INSERT INTO `tbl_devisi` (`devisi_id`, `devisi_nama`) VALUES
(5, 'Security PEMKOT'),
(6, 'Security GMS'),
(7, 'Security BPKAD'),
(8, 'Security PN'),
(9, 'Security ULP'),
(10, 'MANAJER'),
(11, 'DANRU'),
(12, 'KORLAP'),
(13, 'ANGGOTA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jenis_cuti`
--

CREATE TABLE `tbl_jenis_cuti` (
  `jenis_id` int(11) NOT NULL,
  `jenis_nama` varchar(100) NOT NULL,
  `jenis_jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_jenis_cuti`
--

INSERT INTO `tbl_jenis_cuti` (`jenis_id`, `jenis_nama`, `jenis_jumlah`) VALUES
(2, 'Cuti Tahunan', 14),
(3, 'Cuti Melahirkan ', 96);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `karyawan_id` int(11) NOT NULL,
  `karyawan_devisi` int(11) NOT NULL,
  `karyawan_nip` int(11) NOT NULL,
  `karyawan_nama` varchar(50) NOT NULL,
  `karyawan_jabatan` varchar(100) NOT NULL,
  `karyawan_alamat` varchar(100) NOT NULL,
  `karyawan_kelamin` varchar(20) NOT NULL,
  `karyawan_kontak` varchar(15) NOT NULL,
  `karyawan_username` varchar(50) NOT NULL,
  `karyawan_password` varchar(100) NOT NULL,
  `karyawan_foto` varchar(100) NOT NULL,
  `karyawan_tanda_tangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`karyawan_id`, `karyawan_devisi`, `karyawan_nip`, `karyawan_nama`, `karyawan_jabatan`, `karyawan_alamat`, `karyawan_kelamin`, `karyawan_kontak`, `karyawan_username`, `karyawan_password`, `karyawan_foto`, `karyawan_tanda_tangan`) VALUES
(1, 5, 1920182912, 'karyawan1', 'karyawan', 'Soluta tempora enim ', 'Perempuan', '02182918291', 'karyawan', '9e014682c94e0f2cc834bf7348bda428', 'karyawan_foto.png', '1380751068_signature3.png'),
(2, 5, 38, 'Et ullamco velit eni', 'Nostrud non minima o', 'Harum rem tenetur qu', 'Laki-Laki', '90', 'jomypi', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'karyawan_foto.png', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_manajer`
--

CREATE TABLE `tbl_manajer` (
  `manajer_id` int(11) NOT NULL,
  `manajer_devisi` int(11) NOT NULL,
  `manajer_nip` int(11) NOT NULL,
  `manajer_nama` varchar(50) NOT NULL,
  `manajer_kelamin` varchar(20) NOT NULL,
  `manajer_alamat` varchar(100) NOT NULL,
  `manajer_kontak` varchar(15) NOT NULL,
  `manajer_username` varchar(50) NOT NULL,
  `manajer_password` varchar(100) NOT NULL,
  `manajer_foto` varchar(100) NOT NULL,
  `manajer_tanda_tangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_manajer`
--

INSERT INTO `tbl_manajer` (`manajer_id`, `manajer_devisi`, `manajer_nip`, `manajer_nama`, `manajer_kelamin`, `manajer_alamat`, `manajer_kontak`, `manajer_username`, `manajer_password`, `manajer_foto`, `manajer_tanda_tangan`) VALUES
(1, 5, 1234567890, 'manajer', 'Laki-Laki', 'Culpa quis sequi mag', '6282272216125', 'manajer1', '69b731ea8f289cf16a192ce78a37b4f0', 'manajer_foto.png', '131639120_signature1.png'),
(2, 9, 0, 'Omnis et voluptatem ', 'Perempuan', 'Reiciendis et ipsa ', '38', 'lakotod', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'manajer_foto.png', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_supervisor`
--

CREATE TABLE `tbl_supervisor` (
  `supervisor_id` int(11) NOT NULL,
  `supervisor_devisi` int(11) NOT NULL,
  `supervisor_nip` int(11) NOT NULL,
  `supervisor_nama` varchar(50) NOT NULL,
  `supervisor_kelamin` varchar(20) NOT NULL,
  `supervisor_kontak` varchar(15) NOT NULL,
  `supervisor_alamat` varchar(100) NOT NULL,
  `supervisor_username` varchar(50) NOT NULL,
  `supervisor_password` varchar(100) NOT NULL,
  `supervisor_foto` varchar(100) NOT NULL,
  `supervisor_tanda_tangan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_supervisor`
--

INSERT INTO `tbl_supervisor` (`supervisor_id`, `supervisor_devisi`, `supervisor_nip`, `supervisor_nama`, `supervisor_kelamin`, `supervisor_kontak`, `supervisor_alamat`, `supervisor_username`, `supervisor_password`, `supervisor_foto`, `supervisor_tanda_tangan`) VALUES
(1, 5, 821291289, 'supevisor', 'Laki-Laki', '08128192192', 'Cum dolores dolore i', 'supervisor', '09348c20a019be0318387c08df7a783d', 'supervisor_foto.png', '1399678955_signature2.png'),
(2, 8, 15, 'Et et obcaecati ut q', 'Laki-Laki', '67', 'Assumenda qui recusa', 'nymixos', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'supervisor_foto.png', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indeks untuk tabel `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  ADD PRIMARY KEY (`cuti_id`);

--
-- Indeks untuk tabel `tbl_devisi`
--
ALTER TABLE `tbl_devisi`
  ADD PRIMARY KEY (`devisi_id`);

--
-- Indeks untuk tabel `tbl_jenis_cuti`
--
ALTER TABLE `tbl_jenis_cuti`
  ADD PRIMARY KEY (`jenis_id`);

--
-- Indeks untuk tabel `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`karyawan_id`);

--
-- Indeks untuk tabel `tbl_manajer`
--
ALTER TABLE `tbl_manajer`
  ADD PRIMARY KEY (`manajer_id`),
  ADD UNIQUE KEY `manajer_nip` (`manajer_nip`);

--
-- Indeks untuk tabel `tbl_supervisor`
--
ALTER TABLE `tbl_supervisor`
  ADD PRIMARY KEY (`supervisor_id`),
  ADD UNIQUE KEY `supervisor_nip` (`supervisor_nip`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_cuti`
--
ALTER TABLE `tbl_cuti`
  MODIFY `cuti_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_devisi`
--
ALTER TABLE `tbl_devisi`
  MODIFY `devisi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tbl_jenis_cuti`
--
ALTER TABLE `tbl_jenis_cuti`
  MODIFY `jenis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `karyawan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_manajer`
--
ALTER TABLE `tbl_manajer`
  MODIFY `manajer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_supervisor`
--
ALTER TABLE `tbl_supervisor`
  MODIFY `supervisor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
