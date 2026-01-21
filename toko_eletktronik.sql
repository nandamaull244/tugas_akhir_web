-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 21, 2026 at 02:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_eletktronik`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `nama_brand` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `nama_brand`, `created_at`) VALUES
(1, 'Samsung', '2026-01-21 08:56:20'),
(2, 'Oppo', '2026-01-21 09:25:38'),
(4, 'apple', '2026-01-21 12:35:19'),
(5, 'vivo', '2026-01-21 12:35:28');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL DEFAULT 1,
  `harga` decimal(12,2) NOT NULL,
  `subtotal` decimal(12,2) GENERATED ALWAYS AS (`qty` * `harga`) STORED,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `id_produk`, `qty`, `harga`, `created_at`, `updated_at`) VALUES
(2, 4, 7, 1, 19000000.00, '2026-01-21 12:41:38', '2026-01-21 12:41:38'),
(3, 4, 6, 2, 21000000.00, '2026-01-21 12:42:04', '2026-01-21 12:42:20');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `created_at`) VALUES
(1, 'Smartphon', '2026-01-21 12:36:52'),
(3, 'kulkas', '2026-01-21 12:36:48'),
(5, 'laptop', '2026-01-21 12:34:48');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `harga` decimal(12,2) NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `stok_produk` int(11) NOT NULL DEFAULT 0,
  `deskripsi` text DEFAULT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `harga`, `is_available`, `stok_produk`, `deskripsi`, `id_kategori`, `id_brand`, `gambar`) VALUES
(5, 'OPPO FIND X8 PRO 16/512GB RESMI', 18000000.00, 1, 1234, 'Find X8 Pro mengandalkan prosesor Dimensity 9400 dan kamera Hasselblad 50MP yang menghasilkan detail tinggi serta warna yang hidup. Dilengkapi baterai 5000mAh dan SuperVOOC 100W, ponsel ini menyasar pengguna yang membutuhkan performa cepat dan manajemen daya efisien.', 3, 2, '/tugas_akhir/gambar/1768990186_oppox8pro.png'),
(6, 'OPPO FIND X9 PRO 16/1TB', 21000000.00, 1, 12, 'OPPO Find X9 Pro is a premium flagship smartphone featuring a powerful MediaTek Dimensity 9500 chipset, a large 7500mAh battery with fast charging, and a versatile Hasselblad-tuned camera system highlighted by a 200MP telephoto lens, all wrapped in a sleek design with thin bezels, an IP68 rating, and ColorOS 16 (Android 16).', 3, 2, '/tugas_akhir/gambar/1768996494_oppox9pro.jpeg'),
(7, 'SAMSUNG S24 ULTRA 12/1TB SEIN', 19000000.00, 1, 321, 'Samsung Galaxy S24 Ultra is a premium smartphone featuring a powerful Snapdragon 8 Gen 3 chip, a stunning 6.8\" 120Hz anti-reflective display with Gorilla Armor, an advanced 200MP camera system with enhanced AI, titanium frame, integrated S Pen, and extensive Galaxy AI features like live translation and note summarization, all in a durable design with long software support. ', 3, 1, '/tugas_akhir/gambar/1768996691_s24u.jpeg'),
(8, 'SAMSUNG ZFLIP 7 8/256GB SEIN', 14000000.00, 1, 87, 'Samsung Galaxy Z Flip 5 is a compact, clamshell foldable phone featuring a large 3.4-inch customizable cover screen (Flex Window) for app use and widgets without opening, powered by a Snapdragon 8 Gen 2 for Galaxy chip, 8GB RAM, and up to 512GB storage, boasting a durable hinge, 12MP dual rear cameras, 120Hz main display, and improved Flex Mode for hands-free use, running Android with One UI. ', 3, 1, '/tugas_akhir/gambar/1768996946_zflip7.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','user') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$xRDBqeEVZ9f5TQ70WSPx4umaOh4J3/tISsix5NPyMkWHBhKN3tQ9y', 'admin'),
(3, 'lintang', 'lintang@gmail.com', '$2y$10$ZyTSowQwG/KmOMauTXr/L.ESIJ9vsvoKLkKTkMOs8fU790HITLyRG', 'user'),
(4, 'irvan', 'irvan123@gmail.com', '$2y$10$XYo/PZ936a16sMWzyVcD4eKN.exB7eENb194QQQpEmY2Ia7ucIFTK', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uq_user_produk` (`id_user`,`id_produk`),
  ADD KEY `fk_cart_produk` (`id_produk`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produk_kategori` (`id_kategori`),
  ADD KEY `fk_produk_brand` (`id_brand`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cart_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `fk_produk_brand` FOREIGN KEY (`id_brand`) REFERENCES `brand` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_produk_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
