-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2023 at 05:40 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jumia`
--

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` varchar(300) NOT NULL,
  `feedback` varchar(300) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`id`, `email`, `message`, `feedback`, `date`) VALUES
(1, 'pauldrums32@gmail.com', '   Hello!\r\n   ', 'Hi dear! How can we help you?', '2022-11-29 16:25:11'),
(2, 'pauldrums32@gmail.com', 'How can I place an order?   \r\n   ', 'Simply click the order now button corresponding to any product.', '2022-11-29 16:25:11'),
(3, 'pauldrums32@gmail.com', 'How can I place an order?   \r\n   ', 'E be like say you no go school', '2022-11-29 16:25:11'),
(4, 'odeyjameseta2@gmail.com', 'Hi   \r\n   ', 'Hello', '2022-11-29 16:25:11'),
(5, 'odeyjameseta2@gmail.com', '   What is your name\r\n   ', 'Why ask?', '2022-11-29 16:25:11'),
(93, 'celestinanweze23@gmail.com', 'Hi   \r\n   ', 'Hello, how can we help you', '2022-12-05 14:03:13'),
(94, 'celestinanweze23@gmail.com', 'I am looking for an item   \r\n   ', '', '2022-12-05 14:03:32'),
(95, 'pauldrums32@gmail.com', '   Hi\r\n   ', '', '2022-12-21 12:29:17');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `unique_id` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `home_address` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `device` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `unique_id`, `username`, `phone`, `email`, `home_address`, `password`, `date`, `device`) VALUES
(1, '37343938', 'Paul Ekung', '09067476828', 'pauldrums32@gmail.com', 'Unwana', '$2y$10$Usa5WAjxUc/e.GYX78Pvquk8vfx70.xkS7pXNH.pmnw6jopYlNpL.', '2023-01-10 10:55:03', ''),
(2, '39373832', 'Odey James', '09061971506', 'odeyjameseta2@gmail.com', 'Unwana', '$2y$10$dmKBuj338TS9xjiElhY72OLNHH.t4k/txIWgsDMhGu9QOi6g0b.WC', '2022-11-29 17:15:52', ''),
(6, '37343535', 'Dominic Innoncent', '08177567533', 'dominic23@gmail.com', 'Obubra', '$2y$10$nU4bHK/zh0xfTfr7/q5Nr.kR2kLcBOvLbS9k0xYjqm6wJYkWHyP8K', '2022-11-30 14:06:02', ''),
(7, '393937', 'Mbam Collins', '09078654323', 'collins2@gmail.com', 'Abakaliki', '$2y$10$6tHrxyV1b6lLVEfUI8posO258lsxSSKHpblLbIC4w9iIVWjjG6mN2', '2022-12-01 10:58:00', 'Toshiba'),
(8, '393935', 'Egwu Victor', '09075946606', 'victor34@gmail.com', 'Unwana', '$2y$10$qE2nVN5C.uR9Ske52zQEzu/T7n3duXA0koL0qFq7lLMWHVaUlnCNO', '2022-12-02 09:03:49', 'Toshiba'),
(9, '383737', 'Nweze Celestina', '08121199853', 'celestinanweze23@gmail.com', '70 ezzea road Abakaliki', '$2y$10$DuSglkaBam9rfgbB0QGu4.HRU2lRQIUUnWpMVhI6Syr5XLu6o2FrK', '2022-12-05 13:48:56', 'Toshiba'),
(10, '373130', 'Favour Okereke', '08183156316', 'okerekefavour889@gmail.com', 'Unwana', '$2y$10$nMTUJRq2VyD..dg5BI8bWeehr7GxSAvTFCpkKY9FhYCyyaIoVyz9y', '2022-12-06 11:44:18', 'Toshiba');

-- --------------------------------------------------------

--
-- Table structure for table `forgottenpwd`
--

CREATE TABLE `forgottenpwd` (
  `email` varchar(50) NOT NULL,
  `token` varchar(6) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forgottenpwd`
--

INSERT INTO `forgottenpwd` (`email`, `token`, `date`) VALUES
('pauldrums32@gmail.com', '373037', '2023-01-10 10:53:44');

-- --------------------------------------------------------

--
-- Table structure for table `j_admin`
--

CREATE TABLE `j_admin` (
  `id` int(11) NOT NULL,
  `password` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `j_admin`
--

INSERT INTO `j_admin` (`id`, `password`, `date`) VALUES
(1, '193700', '2022-12-03 19:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `productName` varchar(200) NOT NULL,
  `order_user_email` varchar(50) NOT NULL,
  `order_phone` varchar(20) NOT NULL,
  `order_address` varchar(50) NOT NULL,
  `order_quantity` varchar(50) NOT NULL,
  `order_method` varchar(20) NOT NULL,
  `status` varchar(50) NOT NULL,
  `card_num` varchar(16) NOT NULL,
  `expiry` varchar(11) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `bank_name` varchar(50) NOT NULL,
  `pay_status` varchar(50) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `productName`, `order_user_email`, `order_phone`, `order_address`, `order_quantity`, `order_method`, `status`, `card_num`, `expiry`, `cvv`, `bank_name`, `pay_status`, `order_date`) VALUES
(13, 'Street Dancer', 'pauldrums32@gmail.com', '09067476828', 'Unwana', '1', 'Delivery', 'Approved', '', '', '', '', '', '2022-11-25 13:58:37'),
(15, 'Tennis', 'odeyjameseta2@gmail.com', '09061971506', 'Unwana', '2', 'Delivery', 'Approved', '', '', '', '', '', '2022-11-25 17:34:27'),
(17, 'SENS R70', 'odeyjameseta2@gmail.com', '09061971506', 'Unwana', '1', 'Delivery', 'Approved', '', '', '', '', '', '2022-11-25 17:34:18'),
(18, 'iphone 13 Pro Max', 'pauldrums32@gmail.com', '09067476828', 'Unwana', '1', 'Delivery', 'Approved', '', '', '', '', '', '2022-11-25 17:38:48'),
(19, 'Red Women', 'pauldrums32@gmail.com', '09067476828', 'Unwana', '2', 'Pickup', 'Approved', '', '', '', '', '', '2022-11-28 09:00:42'),
(20, 'Bounce', 'odeyjameseta2@gmail.com', '09061971506', 'Unwana', '3', 'Delivery', 'Approved', '', '', '', '', '', '2022-11-28 09:00:04'),
(21, 'iphone 12 Pro Max', 'victor34@gmail.com', '09075946606', 'Unwana', '3', 'Delivery', '', '', '', '', '', '', '2022-12-02 09:06:36'),
(22, 'SAMSUNG ELITE MARK R70', 'pauldrums32@gmail.com', '09067476828', 'Unwana', '1', 'Pickup', '', '', '', '', '', '', '2022-12-03 20:34:18'),
(23, 'Double Gold', 'odeyjameseta2@gmail.com', '09061971506', 'Unwana', '2', 'Delivery', 'Approved', '2210020077884096', '2022-12-06', '322', 'Zenith Bank', 'Verified', '2022-12-05 09:48:18'),
(24, 'Hot Tennis', 'odeyjameseta2@gmail.com', '09061971506', 'Unwana', '1', 'Pickup', 'Approved', '8877564453465768', '2022-12-06', '344', 'Zenith Bank', 'Verified', '2022-12-05 10:00:16'),
(25, 'Jew Bag', 'celestinanweze23@gmail.com', '08121199853', 'Abakaliki', '3', 'Delivery', 'Approved', '1600987009886544', '2022-12-07', '344', 'First Bank', 'Verified', '2022-12-05 13:57:10'),
(26, 'B-D-A', 'okerekefavour889@gmail.com', '08183156316', 'Unwana', '3', 'Delivery', '', '3225567220099867', '2022-12-07', '322', 'First Bank', 'Verified', '2022-12-06 11:51:18'),
(27, 'Street Dancer', 'pauldrums32@gmail.com', '09067476828', 'Unwana', '2', 'Delivery', '', '', '', '', '', '', '2022-12-21 12:30:05'),
(28, 'SAMSUNG ELITE MARK R70', 'pauldrums32@gmail.com', '09067476828', 'Unwana', '3', 'Delivery', '', '', '', '', '', '', '2023-01-10 11:14:22');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `payId` bigint(20) NOT NULL,
  `card_number` varchar(16) NOT NULL,
  `expiry` varchar(50) NOT NULL,
  `cvv` varchar(3) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payId`, `card_number`, `expiry`, `cvv`, `bank`, `date`) VALUES
(2, 15, '3002444002234632', '2022-12-02', '322', 'Zenith Bank', '2022-12-04 07:26:09'),
(3, 23, '2256554009787754', '2022-12-04', '322', 'Zenith Bank', '2022-12-04 19:55:23'),
(4, 17, '5559874653645253', '2022-12-06', '566', 'Zenith Bank', '2022-12-04 19:58:09');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `productName` varchar(50) NOT NULL,
  `price` varchar(50) NOT NULL,
  `productImage` varchar(200) NOT NULL,
  `category` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `productName`, `price`, `productImage`, `category`, `date`) VALUES
(1, 'Sizo', '3000', 'Sizo637783bb2757a7.83956723.jpg', 'Shoes', '2022-11-18 13:08:11'),
(2, 'Bounce', '2500', 'Bounce637783ebd8fad1.75788937.jpg', 'Shoes', '2022-11-18 13:08:59'),
(3, 'Tennis', '3500', 'Tennis63778447026754.88441314.jpg', 'Shoes', '2022-11-18 13:10:31'),
(4, 'Hot Tennis', '2500', 'Hot Tennis6377847c4467a7.89300691.jpg', 'Shoes', '2022-11-18 13:11:24'),
(5, 'Zuzuki', '4000', 'Zuzuki637784b52acef9.01265747.jpg', 'Shoes', '2022-11-18 13:12:21'),
(6, 'Zach Drop', '5000', 'Zach Drop637784d344c0e9.62184744.jpg', 'Shoes', '2022-11-18 13:12:51'),
(7, 'Snow Breaker', '6000', 'Snow Breaker637784fe2c6502.80161808.jpg', 'Shoes', '2022-11-18 13:13:34'),
(8, 'Sputon', '4500', 'Sputon63778537a2c6a2.14985573.jpg', 'Shoes', '2022-11-18 13:14:31'),
(9, 'Versage', '4000', 'Versage6377855b3d68c9.86661575.jpg', 'Shoes', '2022-11-18 13:15:07'),
(10, 'Palmper', '6000', 'Palmper63778589c8a1d6.04752606.jpg', 'Shoes', '2022-11-18 13:15:53'),
(11, 'Ladies Walk', '3000', 'Ladies Walk637785be4f0583.03858447.jpg', 'Shoes', '2022-11-18 13:16:46'),
(12, 'Crusher', '4000', 'Crusher637785e1d8cbc1.86925960.jpg', 'Shoes', '2022-11-18 13:17:21'),
(13, 'Double Gold', '7000', 'Double Gold637786062f4b34.91282733.jpg', 'Hand Wears', '2022-11-18 13:17:58'),
(14, 'Hang Over', '3000', 'Hang Over63778626b2bfc8.41616274.jpg', 'Cloths', '2022-11-18 13:18:30'),
(15, 'Old School', '3000', 'Old School63778658672f92.85360905.jpg', 'Cloths', '2022-11-18 13:19:20'),
(16, 'Street Dancer', '6000', 'Street Dancer63778674d33cb2.52642032.jpg', 'Shoes', '2022-11-18 13:19:48'),
(17, 'B-D-A', '2000', 'B-D-A63778713aead57.34500162.jpg', 'Shoes', '2022-11-18 13:22:27'),
(18, 'G-Shirts', '3000', 'G-Shirts6377873257dd88.78131254.jpg', 'Cloths', '2022-11-18 13:22:58'),
(19, 'F-W-L', '6000', 'F-W-L6377875db18749.73534684.jpg', 'Hand Bags', '2022-11-18 13:23:41'),
(20, 'Jew Bag', '4000', 'Jew Bag6377877ace2bd3.66534422.jpg', 'Hand Bags', '2022-11-18 13:24:10'),
(21, 'Red Hover', '3000', 'Red Hover6377879bdb97a0.89744304.jpg', 'Hand Bags', '2022-11-18 13:24:43'),
(22, 'Shufflers', '3500', 'Shufflers637787ce1ef455.00931007.jpg', 'Hand Bags', '2022-11-18 13:25:34'),
(23, 'Ladies Blag', '3000', 'Ladies Blag637788001e6650.69234985.jpg', 'Hand Bags', '2022-11-18 13:26:24'),
(24, 'Ladies Brown', '3500', 'Ladies Brown63778830d05566.18077030.jpg', 'Hand Bags', '2022-11-29 21:07:22'),
(25, 'Red Women', '6000', 'Red Women6377884c1c9a48.60521576.jpg', 'Hand Bags', '2022-11-18 13:27:40'),
(26, 'iphone 12 Pro Max', '30000', 'iphone 12 Pro Max63778895570218.04294001.jpg', 'Mobile Phone', '2022-11-18 13:28:53'),
(27, 'iphone 13 Pro Max', '350000', 'iphone 13 Pro Max637788bc84cc22.93690632.jpg', 'Mobile Phone', '2022-11-18 13:29:32'),
(28, 'SAMSUNG ELITE MARK R70', '200000', 'SAMSUNG ELITE MARK R7063778919abc004.33717870.jpg', 'Laptop', '2022-11-18 13:37:22'),
(29, 'SENS R70', '250000', 'SENS R70637789767bcf14.05700249.png', 'Laptop', '2022-11-18 13:32:38'),
(30, 'ELITEBOOK 8460P', '150000', 'ELITEBOOK 8460P637789b633c166.32955966.png', 'Laptop', '2022-11-18 13:33:42'),
(31, 'Samsung Galaxy S14', '120000', 'Samsung Galaxy S14637789efebb240.82583725.jpg', 'Mobile Phone', '2022-11-18 13:34:39'),
(32, 'Mens Budd', '3000', 'Mens Budd63778ae3ecd224.54083979.jpg', 'Cloths', '2022-11-18 13:38:43'),
(33, 'Slimix', '4000', 'Slimix63778b0de02894.45601782.jpg', 'Cloths', '2022-11-18 13:39:25'),
(34, 'Mantra', '1500', 'Mantra63778bf5ba5ad5.58424597.jpg', 'Beverages', '2022-11-18 13:43:17'),
(35, 'Golden Penny', '3000', 'Golden Penny63778daddacb97.13523214.jpg', 'Beverages', '2022-11-18 13:50:37'),
(36, 'Nadim', '2500', 'Nadim63778df7b53b79.01305530.jpg', 'Beverages', '2022-11-18 13:51:51'),
(37, 'Kings', '3000', 'Kings63778e4b75c944.97983411.jpg', 'Beverages', '2022-11-18 13:53:15'),
(38, 'Mantra-small', '1500', 'Mantra-small63778e93e533a5.96212021.jpg', 'Beverages', '2022-11-18 13:54:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forgottenpwd`
--
ALTER TABLE `forgottenpwd`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `j_admin`
--
ALTER TABLE `j_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `j_admin`
--
ALTER TABLE `j_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
