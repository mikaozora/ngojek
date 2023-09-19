-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2023 at 03:38 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ngojek`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` char(5) NOT NULL,
  `subscription_id` char(5) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `subscription_id`, `name`, `gender`, `age`, `username`, `password`, `address`, `phone_number`) VALUES
('CS001', 'SID01', 'jambul', 'male', 44, 'johndoe', '$2y$10$eAWSVYtFR.2RSOgBL6Vqd.MBeC3Rx7mjiEJGJeostLUtFCLU2BftW', 'bekasi', '9999999');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_id` char(5) NOT NULL CHECK (`driver_id` regexp '^DI[0-9][0-9][0-9]'),
  `vehicle` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `number_plate` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `vehicle`, `name`, `age`, `gender`, `phone_number`, `number_plate`) VALUES
('DI001', 'Vario 150', 'Beny', 29, 'male', '0889578394', 'DK 1024 KJ'),
('DI002', 'vario', 'panjul', 30, 'male', '082232175005', 'W 1239 AS'),
('DI003', 'ZX25R', 'Nafisya', 29, 'female', '081289236745', 'B 4247 NJK'),
('DI004', 'Honda Scoopy', 'Mayra', 45, 'female', '08347413478', 'F 7263 HFA'),
('DI005', 'Honda PCX ASEK', 'Arasy', 35, 'male', '08123513612', 'D 5346 IWY');

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `goods_id` char(5) NOT NULL,
  `weight` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `dimension` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`goods_id`, `weight`, `name`, `dimension`, `description`) VALUES
('G0001', 12, 'Roti maryam', 20, 'roti maryam siap makan'),
('G0002', 23, 'wertyui', 234, 'werty'),
('G0004', 37, 'enfjne', 1411, 'hiqwdiqn');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` char(5) NOT NULL CHECK (`item_id` regexp '^IT[0-9][0-9][0-9]'),
  `merchant_id` char(5) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `merchant_id`, `category`, `name`, `description`, `image`, `price`, `stock`) VALUES
('IT001', 'MR001', 'minuman', 'fruit tea', 'minuman segar', '', 3000, 100),
('IT002', 'MR001', 'Makanan', 'Nugget', 'Crispy chicken', NULL, 20000, 195),
('IT021', 'MR061', 'Lain-lain', 'Cd indomaret', 'Celana dalam pria', '650814f99b82b-Group 34339.png', 35000, 44),
('IT056', 'MR071', 'minuman', 'Yakult', 'Yakult', '650851d179138-Group 34336.png', 5000, 44),
('IT063', 'MR077', 'Lain-lain', 'Pepsodent', 'pepsodent', '65085229208a7-Group 34342.png', 10000, 221),
('IT066', 'MR061', 'makanan', 'Kecap bangau', 'Kecap bangau', '650814c15cc97-Group 34334.png', 18000, 61),
('IT069', 'MR061', 'Obat', 'Durex kontrasepsi', 'alat kontrasepsi', '650814d9ac13d-Group 34338.png', 23000, 3333),
('IT070', 'MR061', 'minuman', 'Ultra Milk Full cream', 'Susu uht', '6508155c4dbd4-Group 34333.png', 10000, 61),
('IT077', 'MR061', 'Lain-lain', 'Karyawan', 'Mas MAs indomaret ganteng', '6508150f34a30-Group 34340.png', 999999, 1),
('IT093', 'MR077', 'minuman', 'Nescafe', 'Nescafe Mix', '650852a975359-Group 34345.png', 18000, 61),
('IT099', 'MR071', 'Lain-lain', 'Tissue Nice', 'Tissue Nice', '650851bc229c7-Group 34335.png', 18000, 3333),
('IT201', 'MR071', 'minuman', 'Coca-cola', 'Coca-cola', '6508517f3585b-Group 34332.png', 5000, 555),
('IT312', 'MR077', 'Obat', 'Listerin', 'Listerin', '6508528fe09b4-Group 34344.png', 35000, 61),
('IT432', 'MR077', 'makanan', 'Twisko', 'twistko', '6508527a3884d-Group 34343.png', 5000, 555),
('IT999', 'MR071', 'makanan', 'Pocky', 'Pocky', '650851f904718-Group 34341.png', 10000, 44);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` char(5) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `merchant_id` char(5) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `name`, `category`, `stock`, `price`, `description`, `merchant_id`, `image`) VALUES
(' MN00', 'Babi Guling', 'Makanan', 40, 65000, 'Babi enak tau', 'MR001', '6505d4d442a7e-makanan.jpg'),
('MN001', 'sop klaten', 'makanan', 0, 24000, 'anjing', 'MR001', ''),
('MN002', 'ayam geprek', 'Makanan', NULL, 15000, NULL, 'MR002', NULL),
('MN003', 'seblak', 'Makanan', 0, 18000, '', 'MR002', '65059cbbd0232-makanan.jpg'),
('MN005', 'aSU', 'makanan', 20, 20000, '', 'MR001', '65059ca5248a7-makanan.jpg'),
('MN321', 'Nasi rendang', 'makanan', 300, 18000, 'Nasi rendang dan sayuran', 'MR066', '6507ed57114e4-image 17.png'),
('MN323', 'Nasi telur balado', 'makanan', 3333, 18000, 'telur bulat balado', 'MR066', '6507edbe9b6be-image 20.png'),
('MN325', 'Nasi ayam pop', 'makanan', 600, 18000, 'Nasi ayam pop', 'MR066', '6507ed6fed164-image 18.png'),
('MN354', 'Daging cincang', 'makanan', 555, 23000, 'Daging cincang tanpa nasi', 'MR066', '6507ed909535f-image 19.png'),
('MN451', 'es kelapa muda', 'minuman', 61, 15000, 'es kelapa muda', 'MR069', '6507eec74cf2c-image 25.png'),
('MN455', 'Es teler', 'minuman', 61, 15000, 'Es teler', 'MR069', '6507ee6da68d2-image 23.png'),
('MN457', 'Es buah', 'minuman', 61, 15000, 'Es buah', 'MR069', '6507ee97798b3-image 26.png'),
('MN459', 'Es doger', 'minuman', 3333, 15000, 'Es doger', 'MR069', '6507eeaddd1bc-image 24.png'),
('MN551', 'nasi goreng jawa', 'makanan', 555, 23000, 'nasi goreng jawa', 'MR068', '6507ee15befd6-unsplash_rQX9eVpSFz8.png'),
('MN555', 'nasi goreng spesial', 'makanan', 61, 18000, 'nasi goreng spesial', 'MR068', '6507edfc418ab-image 13.png'),
('MN557', 'Mie goreng', 'makanan', 61, 18000, 'Mie goreng', 'MR068', '6507ee335543f-unsplash_TNnhq2nUR8s.png'),
('MN559', 'Es teh', 'minuman', 44, 5000, 'Es teh', 'MR068', '6507ee47c1094-unsplash_CCowelQ2pLw.png');

-- --------------------------------------------------------

--
-- Table structure for table `merchant`
--

CREATE TABLE `merchant` (
  `merchant_id` char(5) NOT NULL CHECK (`merchant_id` regexp '^MR[0-9][0-9][0-9]'),
  `address` varchar(255) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `merchant_type` enum('Restaurant','Mart') DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `merchant`
--

INSERT INTO `merchant` (`merchant_id`, `address`, `name`, `description`, `image`, `merchant_type`, `username`, `password`, `phone_number`) VALUES
('MR001', 'Babakan Madang , Kabupaten Bogor', 'Soto pak Min', 'Soto ayam dan jerohan khas klaten', '', 'Restaurant', 'Joel', '$2y$10$h2cMSUBobjM9vKk8XBz/GeT6ajhjx96mEXrt/epq1KJUF42SjjbFW', '123456789'),
('MR002', 'pasar bersih', 'gembus', 'enak bro mantap', '65026c1e6db5f-064695400_1541071261-Iqbaal_1.webp', 'Restaurant', 'abdi', '$2y$10$qxxooqgcXQ7ChGV2A44WDe6FwUl2AkTjNAc77WRf6Xu7qY5pjFW3C', '09876'),
('MR003', 'pasar bersih', 'indomerit', 'dajdawdan', '6502c78139bda-artis-9.jpg', 'Mart', 'jus', '$2y$10$szFYtEmjRdb.jDOswQdGP.MNOG/UgrssmqtX4iAno6jc3QHW2TAa6', '45678'),
('MR004', 'vbn', 'bnm', 'vbnm', '6502c7964599c-025b0231f7aa1499ca7154254fd1e6bb.jpg', 'Restaurant', 'bnm', '$2y$10$.hYFAIyZCUd3cv/i9idIze1rh91At4ZnGoybPQRVGmPq3IL0PiZvm', 'k789'),
('MR005', 'yui', 'tyui', 'tyui', '6502c7ad4d761-025b0231f7aa1499ca7154254fd1e6bb.jpg', 'Restaurant', 'yui', '$2y$10$sceHfHCdMikabs9v0nKTBuOhwDc285AHqvj14SeAqBwygE/NYwjni', '9999999'),
('MR006', 'ikm', 'ikm', 'fghj', '6502c7c8be394-064695400_1541071261-Iqbaal_1.webp', 'Mart', 'yuio', '$2y$10$EKo52SwO/fp6tJ4MNByWFOELP71PgWUCSC4eud8Zo8I28M2bJxHcK', '34567'),
('MR007', 'kmkm', 'kmkmm', 'jnkkjn', '6502c7dbc8637-064695400_1541071261-Iqbaal_1.webp', 'Restaurant', 'kmkm', '$2y$10$aMLCGDcg7XNMZcEa2oQ8AuPDA3CmMVSeXrwEOyhsJW4Mdc/xdjDWy', '12345'),
('MR008', 'asdf', 'asdf', 'sdf', '6502c7f1dc825-gambar-foto-orang-8.jpg', 'Restaurant', 'rtyu', '$2y$10$1lcwRWag5bo5ndTI/47Iqu01gw5piEQHupIMyX9huFjsRRGfwe3tO', '88888'),
('MR009', 'qwert', 'qwert', 'qwert', '6502c80952a91-artis-9.jpg', 'Mart', 'njnj', '$2y$10$WALRaYZqmb3sAmHM7JCvzO2i.FLMokjyWwDgw2Xz6/YVg7EL/CVSO', '234567'),
('MR010', 'tyu', 'rty', 'dfgh', '6502c82d83cfd-025b0231f7aa1499ca7154254fd1e6bb.jpg', 'Restaurant', 'xcvbn', '$2y$10$sYjr4e60oeJTgt0uHAnl5uYsHaLH3xu56ZFxYUthJ.pXl4VNAZZj6', '5678'),
('MR011', 'daww', 'dawda', 'dwadw', '6502ca7ec8b29-artis-9.jpg', 'Restaurant', 'kkemfke', '$2y$10$HWx5E7FbHj8lL/VAOlgEXOpHW5K8c.9RZDMJ/L9wVlSqrWSSfb1aC', '34543'),
('MR061', 'babakan madang', 'Indomaret', 'jual aneka kebutuhan', '6507d1ad50e79-image 34.png', 'Mart', 'indomaret', '$2y$10$758/eqYLFEcOxlbBRaGK2edqmIttKXFbIpVGC33CcZ54tK8YTWlZm', '4445524'),
('MR066', 'babakan madang', 'RM Padang Uda Uni', 'rumah makan padang murah', '6507d1088d289-image 15.png', 'Restaurant', 'udauni', '$2y$10$BZM89NpNlt/IiR/Tt31yyesOPYdNQGmWr/U0uXQR9Tcuxxh.ByheK', '987890987'),
('MR068', 'babakan madang', 'Nasi goreng Ajiz', 'jual aneka mi dan nasi goreng', '6507d17f215c1-image 13.png', 'Restaurant', 'ajiz', '$2y$10$YzI6GGT8zC/79iR3BcS7rOWystdMI4f1XAGgD7qBVN2SiRGzaANO6', '99789344'),
('MR069', 'babakan madang', 'Es Teler Enak', 'jual aneka es nusantara', '6507d145d78fe-image 12.png', 'Restaurant', 'teler', '$2y$10$Su2rSpla/SAkCzcjtMt7F.vvxjizhV7YOY5TRMDiHCEw2F7JTDQg2', '6545677774'),
('MR071', 'babakan madang', 'Toko Madura', 'jual sembako dan kebutuhan sehari hari', '6507d1f5467ee-unsplash_PfAFNYL-qXY.png', 'Mart', 'madura', '$2y$10$AfXVs8U29FFp9xiDS5goH.ClDa8wfhSDGpmtV2cphG6Upi.dVcJw6', '876545678'),
('MR077', 'babakan madang', 'Toko Berkah', 'jual kebutuhan sehari hari', '6507d1cc81ce1-unsplash_IuXtdvHNc2g.png', 'Mart', 'barokah', '$2y$10$64afys1FBwM/CkW8DO8aZOv74EBNjp/C0GzztKvGtBYyVHo2hlh4m', '6544567887');

-- --------------------------------------------------------

--
-- Table structure for table `order_driver`
--

CREATE TABLE `order_driver` (
  `order_driverid` char(5) NOT NULL,
  `driver_id` char(5) DEFAULT NULL,
  `customer_id` char(5) DEFAULT NULL,
  `destination` varchar(100) DEFAULT NULL,
  `source` varchar(100) DEFAULT NULL,
  `transaction_date` date DEFAULT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_driver`
--

INSERT INTO `order_driver` (`order_driverid`, `driver_id`, `customer_id`, `destination`, `source`, `transaction_date`, `total`) VALUES
('OD001', 'DI001', 'CS001', 'aeon mall', 'rumah talenta bca', '2023-08-10', 50000),
('OD002', 'DI001', 'CS001', 'joglo', 'rtb', '2023-09-05', 12345),
('OD003', 'DI002', 'CS001', 'famindo', 'rtb', '2023-09-09', 98765),
('OD004', 'DI001', 'CS001', 'nirwana', 'rtb', '2023-09-26', 4567),
('OD005', 'DI001', 'CS001', 'badang', 'rtb', '2023-09-12', 6789),
('OD006', 'DI002', 'CS001', 'kwdak', 'kdmkaw', '2023-09-13', 345667),
('OD007', 'DI001', 'CS001', 'dkada', 'duhaw', '2023-09-02', 4321),
('OD008', 'DI002', 'CS001', 'wadmk', 'tyuiwakd', '2023-09-27', 12345),
('OD009', 'DI002', 'CS001', 'yadadw', 'kmdkaf', '2023-09-01', 29222),
('OD010', 'DI001', 'CS001', 'kwmdkadm', 'cdccaw', '2023-09-07', 5678),
('OD011', 'DI002', 'CS001', 'kwmdka', 'dowdff', '2023-09-08', 5678);

-- --------------------------------------------------------

--
-- Table structure for table `order_goods`
--

CREATE TABLE `order_goods` (
  `order_goodsid` char(5) NOT NULL CHECK (`order_goodsid` regexp '^OG[0-9][0-9][0-9]'),
  `customer_id` char(5) DEFAULT NULL,
  `driver_id` char(5) DEFAULT NULL,
  `transaction_date` date DEFAULT NULL,
  `goods_id` char(5) NOT NULL,
  `source` varchar(100) NOT NULL,
  `destination` varchar(100) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_goods`
--

INSERT INTO `order_goods` (`order_goodsid`, `customer_id`, `driver_id`, `transaction_date`, `goods_id`, `source`, `destination`, `total`) VALUES
('OG001', 'CS001', 'DI001', '2023-09-01', 'G0001', 'rtb', 'aeon', 45000),
('OG002', 'CS001', 'DI001', '2023-09-17', 'G0001', 'Jakarta', 'Bandung', 40000),
('OG003', 'CS001', 'DI001', '2023-09-17', 'G0002', 'rty', 'wwd', 12345),
('OG004', 'CS001', 'DI005', '2023-09-17', 'G0004', 'ienfi', 'ihbqe', 141412);

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_itemid` char(5) NOT NULL CHECK (`order_itemid` regexp '^OI[0-9][0-9][0-9]'),
  `driver_id` char(5) DEFAULT NULL,
  `customer_id` char(5) DEFAULT NULL,
  `merchant_id` char(5) DEFAULT NULL,
  `transaction_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_itemid`, `driver_id`, `customer_id`, `merchant_id`, `transaction_date`) VALUES
('OI001', 'DI001', 'CS001', 'MR001', '2023-09-15');

-- --------------------------------------------------------

--
-- Table structure for table `order_item_detail`
--

CREATE TABLE `order_item_detail` (
  `order_itemid` char(5) NOT NULL,
  `item_id` char(5) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_item_detail`
--

INSERT INTO `order_item_detail` (`order_itemid`, `item_id`, `quantity`) VALUES
('OI001', 'IT001', 5),
('OI001', 'IT002', 5);

--
-- Triggers `order_item_detail`
--
DELIMITER $$
CREATE TRIGGER `after_orderitem_insert` AFTER INSERT ON `order_item_detail` FOR EACH ROW UPDATE item
SET item.stock = item.stock - new.quantity
WHERE item.item_id = new.item_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `order_menu`
--

CREATE TABLE `order_menu` (
  `order_menuid` char(5) NOT NULL,
  `customer_id` char(5) DEFAULT NULL,
  `merchant_id` char(5) DEFAULT NULL,
  `driver_id` char(5) DEFAULT NULL,
  `transaction_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_menu`
--

INSERT INTO `order_menu` (`order_menuid`, `customer_id`, `merchant_id`, `driver_id`, `transaction_date`) VALUES
('OM001', 'CS001', 'MR001', 'DI001', '2023-10-10'),
('OM002', 'CS001', 'MR002', 'DI002', '2023-09-01');

-- --------------------------------------------------------

--
-- Table structure for table `order_menu_detail`
--

CREATE TABLE `order_menu_detail` (
  `order_menuid` char(5) NOT NULL,
  `menu_id` char(5) NOT NULL,
  `quantity` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_menu_detail`
--

INSERT INTO `order_menu_detail` (`order_menuid`, `menu_id`, `quantity`) VALUES
('OM001', 'MN001', 3),
('OM002', 'MN002', 3),
('OM002', 'MN003', 2);

-- --------------------------------------------------------

--
-- Table structure for table `subscription`
--

CREATE TABLE `subscription` (
  `subscription_id` char(5) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `period` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscription`
--

INSERT INTO `subscription` (`subscription_id`, `name`, `description`, `price`, `period`) VALUES
('SID01', 'Gold', 'Free ongkir Rp 10.000', 35000, 2),
('SID02', 'Platinum', 'Free ongkir Rp15.000', 40000, 2),
('SID03', 'Immortal', 'Free Ongkir Rp20.000', 50000, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`),
  ADD KEY `fk_subs_cust` (`subscription_id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`goods_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `fk_merchant_item` (`merchant_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `fk_merchant_menu` (`merchant_id`);

--
-- Indexes for table `merchant`
--
ALTER TABLE `merchant`
  ADD PRIMARY KEY (`merchant_id`);

--
-- Indexes for table `order_driver`
--
ALTER TABLE `order_driver`
  ADD PRIMARY KEY (`order_driverid`),
  ADD KEY `fk_driver_od` (`driver_id`),
  ADD KEY `fk_cust_od` (`customer_id`);

--
-- Indexes for table `order_goods`
--
ALTER TABLE `order_goods`
  ADD PRIMARY KEY (`order_goodsid`),
  ADD KEY `fk_ordergoods_driver` (`driver_id`),
  ADD KEY `fk_ordergoods_customer` (`customer_id`),
  ADD KEY `goods_id` (`goods_id`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_itemid`),
  ADD KEY `fk_oi_drv` (`driver_id`),
  ADD KEY `fk_oi_cust` (`customer_id`),
  ADD KEY `fk_merchant_oi` (`merchant_id`);

--
-- Indexes for table `order_item_detail`
--
ALTER TABLE `order_item_detail`
  ADD PRIMARY KEY (`order_itemid`,`item_id`),
  ADD KEY `fk_oid_item` (`item_id`);

--
-- Indexes for table `order_menu`
--
ALTER TABLE `order_menu`
  ADD PRIMARY KEY (`order_menuid`),
  ADD KEY `fk_cust_om` (`customer_id`),
  ADD KEY `fk_merchant_om` (`merchant_id`),
  ADD KEY `fk_driver_om` (`driver_id`);

--
-- Indexes for table `order_menu_detail`
--
ALTER TABLE `order_menu_detail`
  ADD PRIMARY KEY (`order_menuid`,`menu_id`),
  ADD KEY `fk_omd_m` (`menu_id`);

--
-- Indexes for table `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`subscription_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `fk_subs_cust` FOREIGN KEY (`subscription_id`) REFERENCES `subscription` (`subscription_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `fk_merchant_item` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`merchant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `fk_merchant_menu` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`merchant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_driver`
--
ALTER TABLE `order_driver`
  ADD CONSTRAINT `fk_cust_od` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_driver_od` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_goods`
--
ALTER TABLE `order_goods`
  ADD CONSTRAINT `fk_ordergoods_customer` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ordergoods_driver` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_goods_ibfk_1` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`goods_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `fk_merchant_oi` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`merchant_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_oi_cust` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_oi_drv` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_item_detail`
--
ALTER TABLE `order_item_detail`
  ADD CONSTRAINT `fk_oid_item` FOREIGN KEY (`item_id`) REFERENCES `item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_oid_oi` FOREIGN KEY (`order_itemid`) REFERENCES `order_item` (`order_itemid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_menu`
--
ALTER TABLE `order_menu`
  ADD CONSTRAINT `fk_cust_om` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_driver_om` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_merchant_om` FOREIGN KEY (`merchant_id`) REFERENCES `merchant` (`merchant_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_menu_detail`
--
ALTER TABLE `order_menu_detail`
  ADD CONSTRAINT `fk_omd_m` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`menu_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_omd_om` FOREIGN KEY (`order_menuid`) REFERENCES `order_menu` (`order_menuid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
