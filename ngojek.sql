-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 16, 2023 at 04:21 AM
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
) ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `subscription_id`, `name`, `gender`, `age`, `username`, `password`, `address`, `phone_number`) VALUES
('CS001', 'SID01', 'john doe', 'male', 20, 'johndoe', 'johndoe123', 'Babakan madang', '08765');

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
  `phone_number` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_id`, `vehicle`, `name`, `age`, `gender`, `phone_number`) VALUES
('DI001', 'Vario 150', 'Beny', 29, 'male', '0889578394');

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
) ;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`goods_id`, `weight`, `name`, `dimension`, `description`) VALUES
('G0001', 12, 'Roti maryam', 20, 'roti maryam siap makan');

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
('IT001', 'MR001', 'minuman', 'fruit tea', 'minuman segar', '', 3000, 100);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `menu_id` char(5) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `merchant_id` char(5) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL
) ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `name`, `price`, `category`, `merchant_id`, `image`) VALUES
('MN001', 'sop klaten', 24000, 'makanan', 'MR001', '');

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
('MR011', 'daww', 'dawda', 'dwadw', '6502ca7ec8b29-artis-9.jpg', 'Restaurant', 'kkemfke', '$2y$10$HWx5E7FbHj8lL/VAOlgEXOpHW5K8c.9RZDMJ/L9wVlSqrWSSfb1aC', '34543');

-- --------------------------------------------------------

--
-- Table structure for table `order_driver`
--

CREATE TABLE `order_driver` (
  `order_driverid` char(5) NOT NULL,
  `driver_id` char(5) DEFAULT NULL,
  `customer_id` char(5) DEFAULT NULL,
  `destination` varchar(100) DEFAULT NULL,
  `source` varchar(100) DEFAULT NULL
) ;

--
-- Dumping data for table `order_driver`
--

INSERT INTO `order_driver` (`order_driverid`, `driver_id`, `customer_id`, `destination`, `source`) VALUES
('OD001', 'DI001', 'CS001', 'aeon mall', 'rumah talenta bca');

-- --------------------------------------------------------

--
-- Table structure for table `order_goods`
--

CREATE TABLE `order_goods` (
  `order_goodsid` char(5) NOT NULL CHECK (`order_goodsid` regexp '^OG[0-9][0-9][0-9]'),
  `customer_id` char(5) DEFAULT NULL,
  `driver_id` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_goods`
--

INSERT INTO `order_goods` (`order_goodsid`, `customer_id`, `driver_id`) VALUES
('OG001', 'CS001', 'DI001');

-- --------------------------------------------------------

--
-- Table structure for table `order_goods_detail`
--

CREATE TABLE `order_goods_detail` (
  `order_goodsid` char(5) NOT NULL CHECK (`order_goodsid` regexp '^OG[0-9][0-9][0-9]'),
  `goods_id` char(5) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_goods_detail`
--

INSERT INTO `order_goods_detail` (`order_goodsid`, `goods_id`, `quantity`, `source`, `destination`) VALUES
('OG001', 'G0001', 4, 'Aeon Mall Sentul City Lt.2', 'Rumah Talenta BCA - B502');

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_itemid` char(5) NOT NULL CHECK (`order_itemid` regexp '^OI[0-9][0-9][0-9]'),
  `driver_id` char(5) DEFAULT NULL,
  `customer_id` char(5) DEFAULT NULL,
  `merchant_id` char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_item`
--

INSERT INTO `order_item` (`order_itemid`, `driver_id`, `customer_id`, `merchant_id`) VALUES
('OI001', 'DI001', 'CS001', 'MR001');

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
('OI001', 'IT001', 5);

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
  `driver_id` char(5) DEFAULT NULL
) ;

--
-- Dumping data for table `order_menu`
--

INSERT INTO `order_menu` (`order_menuid`, `customer_id`, `merchant_id`, `driver_id`) VALUES
('OM001', 'CS001', 'MR001', 'DI001');

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
('OM001', 'MN001', 3);

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
) ;

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
  ADD KEY `fk_ordergoods_customer` (`customer_id`);

--
-- Indexes for table `order_goods_detail`
--
ALTER TABLE `order_goods_detail`
  ADD PRIMARY KEY (`order_goodsid`),
  ADD KEY `fk_detail_goods` (`goods_id`);

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
  ADD CONSTRAINT `fk_ordergoods_driver` FOREIGN KEY (`driver_id`) REFERENCES `driver` (`driver_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_goods_detail`
--
ALTER TABLE `order_goods_detail`
  ADD CONSTRAINT `fk_detail_goods` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`goods_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detail_ordergoods` FOREIGN KEY (`order_goodsid`) REFERENCES `order_goods` (`order_goodsid`) ON DELETE CASCADE ON UPDATE CASCADE;

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
