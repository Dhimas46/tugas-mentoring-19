-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 08, 2023 at 02:11 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bahan`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `kode` varchar(20) NOT NULL,
  `nama_product` varchar(150) NOT NULL,
  `stock` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `kode`, `nama_product`, `stock`) VALUES
(1, 'BHN001', 'Selada', 50),
(2, 'BHN002', 'Seledri', 30),
(3, 'BHN003', 'Roti', 100),
(4, 'BHN004', 'Daging Ayam', 80),
(5, 'BHN005', 'Tomat', 70),
(6, 'BHN006', 'Kentang', 90),
(7, 'BHN007', 'Bawang Putih', 40),
(8, 'BHN008', 'Lada Hitam', 25),
(9, 'BHN009', 'Tahu', 60),
(10, 'BHN010', 'Tempe', 55),
(11, 'BHN011', 'Kacang Hijau', 35),
(12, 'BHN012', 'Wortel', 75),
(13, 'BHN013', 'Telur', 65),
(14, 'BHN014', 'Susu', 45),
(15, 'BHN015', 'Gula', 85),
(16, 'BHN016', 'Garam', 20),
(17, 'BHN017', 'Minyak Sayur', 55),
(18, 'BHN018', 'Sambal', 30),
(19, 'BHN019', 'Bawang Merah', 40),
(20, 'BHN020', 'Sereh', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
