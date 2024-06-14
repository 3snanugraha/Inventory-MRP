-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 14, 2024 at 01:47 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mrp_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_bahan_baku`
--

CREATE TABLE `t_bahan_baku` (
  `id_bahan_baku` int(11) NOT NULL,
  `kode_bom` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `nama_bahan_baku` varchar(100) DEFAULT NULL,
  `jenis_bahan_baku` varchar(50) DEFAULT NULL,
  `stok_awal` int(11) DEFAULT NULL,
  `stok_akhir` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_bahan_baku`
--

INSERT INTO `t_bahan_baku` (`id_bahan_baku`, `kode_bom`, `id_produk`, `nama_bahan_baku`, `jenis_bahan_baku`, `stok_awal`, `stok_akhir`) VALUES
(1, 1, 1, 'Bahan A', 'Jenis 1', 100, 80),
(2, 2, 2, 'Bahan B', 'Jenis 2', 200, 150);

-- --------------------------------------------------------

--
-- Table structure for table `t_bahan_baku_masuk`
--

CREATE TABLE `t_bahan_baku_masuk` (
  `no_bahan_masuk` int(11) NOT NULL,
  `id_bahan_baku` int(11) DEFAULT NULL,
  `nama_supplier` varchar(100) DEFAULT NULL,
  `jumlah_bahan_masuk` int(11) DEFAULT NULL,
  `tanggal_bahan_masuk` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_bahan_baku_masuk`
--

INSERT INTO `t_bahan_baku_masuk` (`no_bahan_masuk`, `id_bahan_baku`, `nama_supplier`, `jumlah_bahan_masuk`, `tanggal_bahan_masuk`) VALUES
(1, 1, 'Supplier A', 50, '2024-06-10'),
(2, 2, 'Supplier B', 100, '2024-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `t_bom`
--

CREATE TABLE `t_bom` (
  `kode_bom` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `nama_komponen` varchar(100) DEFAULT NULL,
  `panjang` decimal(10,2) DEFAULT NULL,
  `tb` decimal(10,2) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `satuan` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_bom`
--

INSERT INTO `t_bom` (`kode_bom`, `id_produk`, `nama_komponen`, `panjang`, `tb`, `jumlah`, `satuan`) VALUES
(1, 1, 'Komponen A', 10.50, 1.20, 5, 'PCS'),
(2, 2, 'Komponen B', 20.00, 2.50, 10, 'PCS'),
(3, 3, 'Komponen C', 15.00, 1.80, 8, 'PCS');

-- --------------------------------------------------------

--
-- Table structure for table `t_dtl_pesanan`
--

CREATE TABLE `t_dtl_pesanan` (
  `no_pesan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `load` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_dtl_pesanan`
--

INSERT INTO `t_dtl_pesanan` (`no_pesan`, `id_produk`, `qty`, `load`) VALUES
(1, 1, 50, 12.50),
(1, 2, 100, 8.30),
(2, 3, 200, 5.00);

-- --------------------------------------------------------

--
-- Table structure for table `t_mps`
--

CREATE TABLE `t_mps` (
  `id_mps` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `jadwal_export` date DEFAULT NULL,
  `wk` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_mps`
--

INSERT INTO `t_mps` (`id_mps`, `id_produk`, `order`, `jadwal_export`, `wk`, `tanggal`) VALUES
(1, 1, 100, '2024-07-01', 27, '2024-06-10'),
(2, 2, 200, '2024-07-15', 29, '2024-06-24');

-- --------------------------------------------------------

--
-- Table structure for table `t_mrp`
--

CREATE TABLE `t_mrp` (
  `id_mrp` int(11) NOT NULL,
  `id_mps` int(11) DEFAULT NULL,
  `kode_bom` int(11) DEFAULT NULL,
  `gr` int(11) DEFAULT NULL,
  `ohi` int(11) DEFAULT NULL,
  `nr` int(11) DEFAULT NULL,
  `por` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_mrp`
--

INSERT INTO `t_mrp` (`id_mrp`, `id_mps`, `kode_bom`, `gr`, `ohi`, `nr`, `por`) VALUES
(1, 1, 1, 100, 50, 30, 20),
(2, 2, 2, 200, 100, 60, 40);

-- --------------------------------------------------------

--
-- Table structure for table `t_pelanggan`
--

CREATE TABLE `t_pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(100) DEFAULT NULL,
  `alamat` varchar(200) DEFAULT NULL,
  `kontak` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_pelanggan`
--

INSERT INTO `t_pelanggan` (`id_pelanggan`, `nama_pelanggan`, `alamat`, `kontak`) VALUES
(1, 'Pelanggan A', 'Jl. Merpati No.1', '081234567890'),
(2, 'Pelanggan B', 'Jl. Kenari No.2', '081234567891');

-- --------------------------------------------------------

--
-- Table structure for table `t_pesanan`
--

CREATE TABLE `t_pesanan` (
  `no_pesan` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `tipe_kontainer` varchar(50) DEFAULT NULL,
  `tgl_pesanan` date DEFAULT NULL,
  `tgl_pengiriman` date DEFAULT NULL,
  `total_load` decimal(10,2) DEFAULT NULL,
  `total_qty` int(11) DEFAULT NULL,
  `minggu_ke` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_pesanan`
--

INSERT INTO `t_pesanan` (`no_pesan`, `id_pelanggan`, `tipe_kontainer`, `tgl_pesanan`, `tgl_pengiriman`, `total_load`, `total_qty`, `minggu_ke`) VALUES
(1, 101, 'Kontainer A', '2024-06-10', '2024-07-01', 100.50, 150, 27),
(2, 102, 'Kontainer B', '2024-06-11', '2024-07-02', 200.00, 300, 28);

-- --------------------------------------------------------

--
-- Table structure for table `t_produk`
--

CREATE TABLE `t_produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) DEFAULT NULL,
  `tipe` varchar(50) DEFAULT NULL,
  `profil` varchar(50) DEFAULT NULL,
  `warna` varchar(50) DEFAULT NULL,
  `size` varchar(10) DEFAULT NULL,
  `load` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_produk`
--

INSERT INTO `t_produk` (`id_produk`, `nama_produk`, `tipe`, `profil`, `warna`, `size`, `load`) VALUES
(1, 'Produk A', 'Tipe 1', 'Profil 1', 'Merah', 'L', 12.50),
(2, 'Produk B', 'Tipe 2', 'Profil 2', 'Biru', 'M', 8.30),
(3, 'Produk C', 'Tipe 1', 'Profil 3', 'Hijau', 'S', 5.00);

-- --------------------------------------------------------

--
-- Table structure for table `t_users`
--

CREATE TABLE `t_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `t_users`
--

INSERT INTO `t_users` (`id_user`, `username`, `role`, `nama`, `password`) VALUES
(1, 'admin', 'Admin', 'Admin User', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'user', 'User', 'Regular User', 'ee11cbb19052e40b07aac0ca060c23ee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_bahan_baku`
--
ALTER TABLE `t_bahan_baku`
  ADD PRIMARY KEY (`id_bahan_baku`),
  ADD KEY `kode_bom` (`kode_bom`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `t_bahan_baku_masuk`
--
ALTER TABLE `t_bahan_baku_masuk`
  ADD PRIMARY KEY (`no_bahan_masuk`),
  ADD KEY `id_bahan_baku` (`id_bahan_baku`);

--
-- Indexes for table `t_bom`
--
ALTER TABLE `t_bom`
  ADD PRIMARY KEY (`kode_bom`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `t_dtl_pesanan`
--
ALTER TABLE `t_dtl_pesanan`
  ADD PRIMARY KEY (`no_pesan`,`id_produk`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `t_mps`
--
ALTER TABLE `t_mps`
  ADD PRIMARY KEY (`id_mps`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `t_mrp`
--
ALTER TABLE `t_mrp`
  ADD PRIMARY KEY (`id_mrp`),
  ADD KEY `id_mps` (`id_mps`),
  ADD KEY `kode_bom` (`kode_bom`);

--
-- Indexes for table `t_pelanggan`
--
ALTER TABLE `t_pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `t_pesanan`
--
ALTER TABLE `t_pesanan`
  ADD PRIMARY KEY (`no_pesan`);

--
-- Indexes for table `t_produk`
--
ALTER TABLE `t_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `t_users`
--
ALTER TABLE `t_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_bahan_baku`
--
ALTER TABLE `t_bahan_baku`
  MODIFY `id_bahan_baku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_bahan_baku_masuk`
--
ALTER TABLE `t_bahan_baku_masuk`
  MODIFY `no_bahan_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_bom`
--
ALTER TABLE `t_bom`
  MODIFY `kode_bom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_mps`
--
ALTER TABLE `t_mps`
  MODIFY `id_mps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_mrp`
--
ALTER TABLE `t_mrp`
  MODIFY `id_mrp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_pelanggan`
--
ALTER TABLE `t_pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_pesanan`
--
ALTER TABLE `t_pesanan`
  MODIFY `no_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `t_produk`
--
ALTER TABLE `t_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `t_users`
--
ALTER TABLE `t_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_bahan_baku`
--
ALTER TABLE `t_bahan_baku`
  ADD CONSTRAINT `t_bahan_baku_ibfk_1` FOREIGN KEY (`kode_bom`) REFERENCES `t_bom` (`kode_bom`),
  ADD CONSTRAINT `t_bahan_baku_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `t_produk` (`id_produk`);

--
-- Constraints for table `t_bahan_baku_masuk`
--
ALTER TABLE `t_bahan_baku_masuk`
  ADD CONSTRAINT `t_bahan_baku_masuk_ibfk_1` FOREIGN KEY (`id_bahan_baku`) REFERENCES `t_bahan_baku` (`id_bahan_baku`);

--
-- Constraints for table `t_bom`
--
ALTER TABLE `t_bom`
  ADD CONSTRAINT `t_bom_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `t_produk` (`id_produk`);

--
-- Constraints for table `t_dtl_pesanan`
--
ALTER TABLE `t_dtl_pesanan`
  ADD CONSTRAINT `t_dtl_pesanan_ibfk_1` FOREIGN KEY (`no_pesan`) REFERENCES `t_pesanan` (`no_pesan`),
  ADD CONSTRAINT `t_dtl_pesanan_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `t_produk` (`id_produk`);

--
-- Constraints for table `t_mps`
--
ALTER TABLE `t_mps`
  ADD CONSTRAINT `t_mps_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `t_produk` (`id_produk`);

--
-- Constraints for table `t_mrp`
--
ALTER TABLE `t_mrp`
  ADD CONSTRAINT `t_mrp_ibfk_1` FOREIGN KEY (`id_mps`) REFERENCES `t_mps` (`id_mps`),
  ADD CONSTRAINT `t_mrp_ibfk_2` FOREIGN KEY (`kode_bom`) REFERENCES `t_bom` (`kode_bom`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
