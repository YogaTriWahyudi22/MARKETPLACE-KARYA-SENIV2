-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Jan 2022 pada 19.26
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `market_place`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `faktur`
--

CREATE TABLE `faktur` (
  `kode_faktur` bigint(20) NOT NULL,
  `id_pay` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_kota` bigint(20) NOT NULL,
  `id_kurir` bigint(20) NOT NULL,
  `id_rincian_pembayaran` bigint(20) NOT NULL,
  `tanggal_bayar` date NOT NULL,
  `konfirmasi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `faktur`
--

INSERT INTO `faktur` (`kode_faktur`, `id_pay`, `id_user`, `id_kota`, `id_kurir`, `id_rincian_pembayaran`, `tanggal_bayar`, `konfirmasi`) VALUES
(1, 1, 4, 1, 1, 1, '2021-12-14', 'Latif Muhammad'),
(2, 1, 4, 1, 1, 2, '2021-12-14', 'Latif Muhammad'),
(3, 3, 4, 3, 1, 3, '2021-12-14', 'Latif Muhammad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_karya_seni`
--

CREATE TABLE `jenis_karya_seni` (
  `id_jenis` bigint(20) UNSIGNED NOT NULL,
  `jenis_karya_seni` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_karya_seni`
--

INSERT INTO `jenis_karya_seni` (`id_jenis`, `jenis_karya_seni`) VALUES
(1, 'Olahan Sampah'),
(2, 'Bordir'),
(3, 'Sulaman'),
(4, 'Songket');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id_kota` bigint(20) UNSIGNED NOT NULL,
  `kota` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id_kota`, `kota`) VALUES
(1, 'Mega Permai 1 Block E1 nomor 7'),
(2, 'Mega Permai 1 Block E1 nomor 7'),
(3, 'Kota Bandung');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kurir`
--

CREATE TABLE `kurir` (
  `id_kurir` bigint(20) UNSIGNED NOT NULL,
  `nama_kurir` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kurir`
--

INSERT INTO `kurir` (`id_kurir`, `nama_kurir`, `harga`) VALUES
(1, 'Marketplace', 1000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2021_12_06_184421_create_produk_table', 1),
(3, '2021_12_06_184525_create_kurir_table', 1),
(4, '2021_12_06_185008_create_kota_table', 1),
(5, '2021_12_06_185403_create_pembayaran_table', 1),
(6, '2021_12_06_185635_create_rincian_pembayaran_table', 1),
(7, '2021_12_06_190908_create_faktur_table', 1),
(8, '2021_12_06_191359_create_pesanan_table', 1),
(9, '2022_01_04_161645_create_jenis_karya_seni_table', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pay` bigint(20) UNSIGNED NOT NULL,
  `tipe_pembayaran` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pay`, `tipe_pembayaran`) VALUES
(1, 'transfer'),
(2, 'transfer'),
(3, 'cash');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` bigint(20) UNSIGNED NOT NULL,
  `id_produk` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kuantiti` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_produk`, `id_user`, `status`, `kuantiti`) VALUES
(12, 1, 4, 'konfirmasi', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` bigint(20) UNSIGNED NOT NULL,
  `distributor_produk` bigint(20) NOT NULL,
  `photo` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_produk` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_karya_seni` int(20) NOT NULL,
  `jumlah_produk` bigint(20) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `satuan` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diskon` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `distributor_produk`, `photo`, `nama_produk`, `deskripsi`, `jenis_karya_seni`, `jumlah_produk`, `harga`, `satuan`, `diskon`) VALUES
(1, 2, '1639313066.jpg', 'Lampu Hias', 'Lampu hias ini sangat bagus di belei dan', 1, 8, 100000, 'Unit', 0),
(2, 2, '1639313422.jpg', 'Tempat pensil kayu', 'Tempat pensil dan pena kreatif dapat menyegarkan mata anda', 1, 8, 20000, 'Unit', 0),
(3, 3, '1639313769.jpg', 'Tas Plastik', 'Tas plastik bikin nyaman baik ketika hari panas dan hari hujan', 1, 4, 100000, 'Buah', 0),
(4, 3, '1639313827.jpg', 'Lampu Hias', 'Lampu Hias bisa menyimpan listrik ketika di charge', 1, 3, 50000, 'Unit', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rincian_pembayaran`
--

CREATE TABLE `rincian_pembayaran` (
  `id_rincian_pembayaran` bigint(20) UNSIGNED NOT NULL,
  `id_produk` bigint(20) NOT NULL,
  `photo` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kuantiti` int(11) NOT NULL,
  `jumlah_pembayaran` bigint(20) NOT NULL,
  `waktu_pemesanan` time NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rincian_pembayaran`
--

INSERT INTO `rincian_pembayaran` (`id_rincian_pembayaran`, `id_produk`, `photo`, `kuantiti`, `jumlah_pembayaran`, `waktu_pemesanan`, `status`) VALUES
(1, 1, '1639417800.jpg', 1, 100000, '12:50:00', 'sampai'),
(2, 2, '1639417800.jpg', 1, 20000, '12:50:00', 'konfirmasi'),
(3, 1, NULL, 1, 100000, '12:51:48', 'pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `photo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'admin.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `alamat`, `nohp`, `status`, `photo`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$tfY1w7msptwA1oESlbu1v.11tx6v.03Ipu4zWBxosvtsq97W7t7MG', 'Kota Padang', '08123456789', 'admin', 'admin.jpg'),
(2, 'Latif Muhammad', 'latif@gmail.com', '$2y$10$obp0fIMz0dnNQbmBpFyoDuiR2UAjgHE.Sen/QPDNVDgsrQHE6DBqe', 'Kota Padang', '08123456789', 'toko', 'admin.jpg'),
(3, 'Muhammad Tiza Andrian', 'andri@gmail.com', '$2y$10$3.mNQUU1axCRkq3No1/XpecmnB/tNmAARqdjxYbz0OH7WDGH6JwQe', 'Kota Padang', '08123456789', 'toko', 'admin.jpg'),
(4, 'Pelanggan', 'pelanggan@gmail.com', '$2y$10$Md0/gdbRtIe5td5KtT5TMe9CVaeiGAb5tdpnhCN9c3WnwValPQdgW', 'Kota Padang', '8123456', 'user', 'admin.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `faktur`
--
ALTER TABLE `faktur`
  ADD PRIMARY KEY (`kode_faktur`);

--
-- Indeks untuk tabel `jenis_karya_seni`
--
ALTER TABLE `jenis_karya_seni`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`);

--
-- Indeks untuk tabel `kurir`
--
ALTER TABLE `kurir`
  ADD PRIMARY KEY (`id_kurir`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pay`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `rincian_pembayaran`
--
ALTER TABLE `rincian_pembayaran`
  ADD PRIMARY KEY (`id_rincian_pembayaran`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `faktur`
--
ALTER TABLE `faktur`
  MODIFY `kode_faktur` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jenis_karya_seni`
--
ALTER TABLE `jenis_karya_seni`
  MODIFY `id_jenis` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kurir`
--
ALTER TABLE `kurir`
  MODIFY `id_kurir` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pay` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `rincian_pembayaran`
--
ALTER TABLE `rincian_pembayaran`
  MODIFY `id_rincian_pembayaran` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
