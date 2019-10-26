-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Okt 2019 pada 18.33
-- Versi server: 10.1.35-MariaDB
-- Versi PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_voting`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` varchar(8) NOT NULL,
  `password_admin` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `calon`
--

CREATE TABLE `calon` (
  `id_calon` varchar(8) NOT NULL,
  `nama_calon` text NOT NULL,
  `visi_calon` text NOT NULL,
  `misi_calon` text NOT NULL,
  `foto_calon` varchar(100) NOT NULL,
  `jumlah_suara` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `calon`
--

INSERT INTO `calon` (`id_calon`, `nama_calon`, `visi_calon`, `misi_calon`, `foto_calon`, `jumlah_suara`) VALUES
('0QXxathT', 'Septa Alfauzan', 'mensejahterakan para jomblo', 'menghapuskan para bucin', 'Screenshot_(58).png', 2),
('CFJoN3oJ', 'Robert Downey Jr', 'Yare-yare...', 'Membudayakan setiap siswa SMKN 1 Boyolangu untuk menonton anime Jojo Bizzare Adventure', 'downey.jpg', 0),
('Qwu4G7aD', 'elon musk', 'mencerdaskan kaum dungu', 'membawa manusia ke mars', 'Elon-Musk-2010.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemilih`
--

CREATE TABLE `pemilih` (
  `id_pemilih` varchar(8) NOT NULL,
  `password_pemilih` varchar(8) NOT NULL,
  `status_pemilih` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemilih`
--

INSERT INTO `pemilih` (`id_pemilih`, `password_pemilih`, `status_pemilih`) VALUES
('27CWdL9w', '58343365', 1),
('5W7d3cGp', '59287429', 1),
('7jo7Xaop', '07916761', 0),
('B3zwtz3I', '86404212', 0),
('Dkhu7qPc', '16535580', 0),
('fK2sEByg', '86135944', 0),
('GjCzaYgX', '80193926', 0),
('gS40ccnp', '84435982', 0),
('JvKk6bZi', '73185607', 0),
('K9QmUxQq', '34437969', 0),
('MX6cYYta', '02062685', 0),
('n1hzgyY7', '51113781', 0),
('p7EnrKPr', '14720042', 0),
('r7GqYsOW', '99473215', 0),
('rRwmsgej', '15302029', 0),
('tEYh7SV0', '53089391', 0),
('UYjWUkcJ', '84292909', 0),
('vhMPn5Fo', '81820119', 0),
('VyUWdMXI', '43687520', 0),
('wasJvQ7A', '81940825', 0),
('XuJYX6g4', '33321872', 0),
('Y7zZzXS4', '70717815', 0),
('Y8hqe9J5', '16785546', 0),
('z2lNX3CF', '86197463', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `suara`
--

CREATE TABLE `suara` (
  `id_suara` varchar(8) NOT NULL,
  `id_calon` varchar(8) NOT NULL,
  `id_pemilih` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `suara`
--

INSERT INTO `suara` (`id_suara`, `id_calon`, `id_pemilih`) VALUES
('5VAxWf1y', 'dasd', ''),
('mcgesqIU', '0QXxathT', ''),
('q1j9arAn', '0QXxathT', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `calon`
--
ALTER TABLE `calon`
  ADD PRIMARY KEY (`id_calon`);

--
-- Indeks untuk tabel `pemilih`
--
ALTER TABLE `pemilih`
  ADD PRIMARY KEY (`id_pemilih`),
  ADD UNIQUE KEY `id_pemilih` (`id_pemilih`);

--
-- Indeks untuk tabel `suara`
--
ALTER TABLE `suara`
  ADD PRIMARY KEY (`id_suara`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
