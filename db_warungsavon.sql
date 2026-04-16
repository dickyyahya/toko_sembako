-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2026 at 08:52 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_warungsavon`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`) VALUES
(1, 'SavoN Gaa', 'admin', '827ccb0eea8a706c4c34a16891f84e7b', '+628129831298', 'savon@gmail.com', 'Brebes');

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(13, 'Kebutuhan Rumah Tangga'),
(14, 'Minuman'),
(17, 'Makanan Instan'),
(18, 'Bahan Pokok');

-- --------------------------------------------------------

--
-- Table structure for table `tb_product`
--

CREATE TABLE `tb_product` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_status` tinyint(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_product`
--

INSERT INTO `tb_product` (`product_id`, `category_id`, `product_name`, `product_price`, `product_description`, `product_image`, `product_status`, `date_created`) VALUES
(12, 18, 'Minyak Goreng', 30000, '<p>Untuk menggoreng makanan agar menjadi krispi</p>', 'produk1776156605.jpg', 1, '2026-04-14 08:50:05'),
(13, 18, 'Telur', 25000, '<p>Protein dengan harga terjangkau</p>', 'produk1776156664.jpg', 1, '2026-04-14 08:51:04'),
(14, 17, 'Mie Instan', 5000, '<p>Makanan darurat dan simple</p>', 'produk1776156775.jpg', 1, '2026-04-14 08:52:55'),
(15, 17, 'Sarden Kaleng', 15000, '<p>makanan kaleng yang mudah dan simpel</p>', 'produk1776158109.jpg', 1, '2026-04-14 09:15:09'),
(16, 17, 'Kornet', 20000, '<p>Makanan simpel dan enak</p>', 'produk1776158200.jpg', 1, '2026-04-14 09:16:40'),
(17, 17, 'Sup Instan', 5000, '<p>Sup Instan dan enak</p>', 'produk1776158288.jpg', 1, '2026-04-14 09:18:08'),
(18, 14, 'Air Mineral', 5000, '<p>Minuman paling sehat dan murni</p>', 'produk1776158416.jpg', 1, '2026-04-14 09:20:16'),
(19, 14, 'Teh', 5000, '<p>Teh dengan aroma nikmat</p>', 'produk1776158512.jpg', 1, '2026-04-14 09:21:52'),
(20, 14, 'Kopi', 5000, '<p>Minuman nikmat jika diminum pagi hari</p>', 'produk1776158578.jpg', 1, '2026-04-14 09:22:58'),
(21, 14, 'Sirup', 10000, '<p>Pelengkap minuman paling seger</p>', 'produk1776158647.jpg', 1, '2026-04-14 09:24:07'),
(22, 13, 'Pewangi Pakaian', 3000, '<p>Membuat pakaain menjadi wangi</p>', 'produk1776159807.jpg', 1, '2026-04-14 09:43:27'),
(23, 13, 'Deterjen', 5000, '<p>Untuk mencuci pakaian</p>', 'produk1776159879.jpg', 1, '2026-04-14 09:44:39'),
(24, 13, 'Sampo', 5000, '<p>Untuk membasuh rambut agar bersih</p>', 'produk1776159939.jpg', 1, '2026-04-14 09:45:39'),
(25, 13, 'sabun', 5000, '<p>untuk membersihkan tubuh saat mandi agar bersih</p>', 'produk1776159997.jpg', 1, '2026-04-14 09:46:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tb_product`
--
ALTER TABLE `tb_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_product`
--
ALTER TABLE `tb_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
