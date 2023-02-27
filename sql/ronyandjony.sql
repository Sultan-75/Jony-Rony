-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2023 at 11:17 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ronyandjony`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `cat_id` int(11) NOT NULL,
  `category` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`cat_id`, `category`) VALUES
(2, 'mobile'),
(7, 'New Smart5phone'),
(8, 'Old Smartphone'),
(9, 'Display'),
(10, 'New Feature Phone'),
(14, 'Old Feature Phone');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_due`
--

CREATE TABLE `tbl_due` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(32) NOT NULL,
  `customer_num` int(14) NOT NULL,
  `product_name` varchar(32) NOT NULL,
  `due_paid` float(20,2) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_due`
--

INSERT INTO `tbl_due` (`id`, `customer_name`, `customer_num`, `product_name`, `due_paid`, `date`) VALUES
(8, 'Akinur Khan', 1721962632, 'AMOLED Display', 5.00, '2021-09-07 13:13:16'),
(9, 'Akinur Khan', 1721962632, 'AMOLED Display', 5.00, '2021-09-07 13:13:47'),
(10, 'Sultan Ahmed', 2147483647, 'MI', 60.00, '2021-09-07 13:15:07'),
(11, 'Sultan Ahmed', 2147483647, 'MI', 40.00, '2021-09-07 13:15:36'),
(12, 'Sultan Ahmed', 2147483647, 'MI', 50.00, '2021-09-11 10:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_expance`
--

CREATE TABLE `tbl_expance` (
  `ex_id` int(11) NOT NULL,
  `ex_details` varchar(255) NOT NULL,
  `ex_amount` float(20,2) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_expance`
--

INSERT INTO `tbl_expance` (`ex_id`, `ex_details`, `ex_amount`, `date`) VALUES
(1, 'demooc', 800.00, '2021-07-09 00:18:13'),
(2, 'dehkujjhggh', 280.00, '2021-07-09 00:18:13'),
(4, 'paner bil', 10.00, '2021-07-12 00:17:28'),
(5, 'coffee', 100.00, '2021-07-12 00:30:25'),
(6, 'salary', 1000.00, '2021-07-12 00:31:31'),
(7, 'today ex', 100.00, '2021-07-13 22:00:53'),
(8, 'ex-90', 90.00, '2021-07-13 22:01:47'),
(9, 'salary-2', 300.00, '2021-07-14 00:56:25'),
(10, 'fdgfgf', 50.00, '2021-07-15 01:35:05'),
(14, 'bill', 300.00, '2021-07-19 01:25:58'),
(15, 'tod', 444.00, '2021-09-06 13:34:31'),
(16, 'f', 790.00, '2021-09-06 13:35:17'),
(17, 'ttt', 50.00, '2021-09-08 12:04:55'),
(18, 'fg', 500.00, '2023-02-27 00:28:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `product_qty` int(11) NOT NULL,
  `product_price` float(11,2) NOT NULL,
  `product_total` float(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `cat_id`, `product_qty`, `product_price`, `product_total`) VALUES
(35, 'g32', 2, 36, 100.00, 3600.00),
(36, 'new', 2, 10, 250.00, 2500.00),
(38, 'walton', 8, 25, 150.00, 3750.00),
(40, 'AMOLED Display', 9, 90, 500.00, 45000.00),
(44, 'test 4', 8, 1, 50.00, 50.00),
(46, 'MI', 7, 57, 100.00, 5700.00),
(47, 'test5', 9, 9, 2000.00, 18000.00),
(48, 'waton 600', 14, 4, 800.00, 3200.00),
(49, 'nokia 112', 10, 5, 1500.00, 7500.00),
(50, 'new phone 2', 2, 4, 500.00, 2000.00);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_return`
--

CREATE TABLE `tbl_return` (
  `return_id` int(11) NOT NULL,
  `customer_name` varchar(25) NOT NULL,
  `customer_num` varchar(14) NOT NULL,
  `product_name` varchar(64) NOT NULL,
  `return_selling_price` float(20,2) NOT NULL,
  `return_selling_qty` int(11) NOT NULL,
  `return_total_amount` float(20,2) NOT NULL,
  `return_date` datetime NOT NULL DEFAULT current_timestamp(),
  `product_id_sale` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_return`
--

INSERT INTO `tbl_return` (`return_id`, `customer_name`, `customer_num`, `product_name`, `return_selling_price`, `return_selling_qty`, `return_total_amount`, `return_date`, `product_id_sale`) VALUES
(64, 'Sultan Ahmed', ' 8801799213804', 'g32', 150.00, 2, 300.00, '2021-07-07 02:25:29', 35),
(65, 'Sultan Ahmed', ' 8801799213804', 'test 4', 60.00, 1, 60.00, '2021-07-11 02:07:40', 44),
(66, 'Sultan Ahmed', ' 8801799213804', 'test5', 80.00, 1, 80.00, '2021-07-11 02:10:40', 45),
(67, 'Sultan Ahmed', ' 8801799213804', 'test5', 250.00, 1, 250.00, '2021-07-17 23:12:53', 47),
(68, 'Aftabuzzaman Khan', '01721962632', 'AMOLED Display', 600.00, 5, 3000.00, '2021-07-19 00:22:48', 40);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale`
--

CREATE TABLE `tbl_sale` (
  `sale_id` int(11) NOT NULL,
  `customer_name` varchar(32) NOT NULL,
  `customer_num` varchar(14) NOT NULL,
  `product_name` varchar(32) NOT NULL,
  `selling_price` float(11,2) NOT NULL,
  `selling_qty` int(5) NOT NULL,
  `total_amount` float(11,2) NOT NULL,
  `payment` float(11,2) NOT NULL,
  `due` float(11,2) NOT NULL,
  `profit` float(11,2) NOT NULL,
  `date` date DEFAULT current_timestamp(),
  `product_id` int(11) NOT NULL,
  `product_price` float(20,2) NOT NULL,
  `product_imei` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sale`
--

INSERT INTO `tbl_sale` (`sale_id`, `customer_name`, `customer_num`, `product_name`, `selling_price`, `selling_qty`, `total_amount`, `payment`, `due`, `profit`, `date`, `product_id`, `product_price`, `product_imei`) VALUES
(63, 'Sultan Ahmed', ' 8801799213804', 'g32', 150.00, 10, 1500.00, 1500.00, 0.00, 500.00, '2021-07-07', 35, 100.00, 0),
(64, 'Sultan Ahmed', ' 8801799213804', 'g32', 150.00, 8, 1200.00, 800.00, 400.00, 400.00, '2021-07-07', 35, 100.00, 0),
(65, 'Sultan Ahmed', ' 8801799213804', 'g32', 150.00, 2, 300.00, 300.00, 0.00, 100.00, '2021-07-07', 35, 100.00, 0),
(66, 'Sultan Ahmed', ' 8801799213804', 'g32', 150.00, 1, 150.00, 150.00, 0.00, 50.00, '2021-07-07', 35, 100.00, 0),
(67, 'Sultan Ahmed', ' 8801799213804', 'g32', 120.00, 1, 120.00, 120.00, 0.00, 20.00, '2021-07-07', 35, 100.00, 0),
(68, 'Sultan Ahmed', ' 8801799213804', 'g32', 250.00, 2, 500.00, 300.00, 200.00, 300.00, '2021-07-09', 35, 100.00, 0),
(69, 'Sultan Ahmed', ' 8801799213804', 'g32', 250.00, 2, 500.00, 400.00, 100.00, 300.00, '2021-07-09', 35, 100.00, 0),
(70, 'Sultan Ahmed', ' 8801799213804', 'g32', 150.00, 10, 1500.00, 1500.00, 0.00, 500.00, '2021-07-09', 35, 100.00, 0),
(71, 'Sultan Ahmed', ' 8801799213804', 'g32', 250.00, 1, 250.00, 200.00, 50.00, 150.00, '2021-07-10', 35, 100.00, 0),
(73, 'Sultan Ahmed', ' 8801799213804', 'g32', 150.00, 1, 150.00, 150.00, 0.00, 50.00, '2021-07-11', 35, 100.00, 0),
(74, 'Sultan Ahmed', ' 8801799213804', 'g32', 150.00, 1, 150.00, 150.00, 0.00, 50.00, '2021-07-11', 35, 100.00, 0),
(78, 'Sultan Ahmed', ' 8801799213804', 'test5', 80.00, 1, 80.00, 70.00, 10.00, 10.00, '2021-07-11', 45, 70.00, 0),
(79, 'Sultan Ahmed', ' 8801799213804', 'MI', 150.00, 10, 1500.00, 1400.00, 100.00, 500.00, '2021-07-12', 46, 100.00, 0),
(80, 'Sultan Ahmed', ' 8801799213804', 'MI', 500.00, 10, 5000.00, 4000.00, 1000.00, 4000.00, '2021-07-12', 46, 100.00, 0),
(81, 'Sultan Ahmed', ' 8801799213804', 'g32', 200.00, 10, 2000.00, 1500.00, 490.00, 990.00, '2021-07-13', 35, 100.00, 0),
(82, 'Sultan Ahmed', ' 8801799213804', 'g32', 500.00, 10, 5000.00, 4000.00, 1000.00, 4000.00, '2021-07-14', 35, 100.00, 0),
(83, 'Sultan Ahmed', ' 8801799213804', 'MI', 500.00, 2, 1000.00, 1000.00, 0.00, 800.00, '2021-07-15', 46, 100.00, 0),
(84, 'Sultan Ahmed', ' 8801799213804', 'MI', 200.00, 5, 1000.00, 1000.00, 0.00, 500.00, '2021-07-16', 46, 100.00, 0),
(85, 'Sultan Ahmed', ' 8801799213804', 'test5', 100.00, 1, 100.00, 90.00, 10.00, 30.00, '2021-07-16', 45, 70.00, 0),
(86, 'Sultan Ahmed', ' 8801799213804', 'MI', 200.00, 5, 1000.00, 850.00, 150.00, 500.00, '2021-07-17', 46, 100.00, 0),
(88, 'Sultan Ahmed', ' 8801799213804', 'MI', 250.00, 2, 500.00, 500.00, 0.00, 300.00, '2021-07-18', 46, 100.00, 0),
(89, 'Aftabuzzaman Khan', '01721962632', 'AMOLED Display', 600.00, 5, 3000.00, 3000.00, 0.00, 500.00, '2021-07-19', 40, 500.00, 0),
(90, 'Akinur Khan', '01721962632', 'AMOLED Display', 600.00, 5, 3000.00, 3000.00, 0.00, 500.00, '2021-07-19', 40, 500.00, 0),
(91, 'tutudfb', '0998833566', 'MI', 150.00, 2, 300.00, 300.00, 0.00, 100.00, '2021-09-05', 46, 100.00, 0),
(101, '', '', 'nokia 112', 2000.00, 1, 2000.00, 2000.00, 0.00, 500.00, '2021-09-05', 49, 1500.00, 788999),
(102, '', '', 'MI', 150.00, 2, 300.00, 300.00, 0.00, 100.00, '2021-09-05', 46, 100.00, 2147483647),
(103, '', '', 'MI', 234.00, 1, 234.00, 234.00, 0.00, 134.00, '2021-09-06', 46, 100.00, 0),
(104, '', '', 'MI', 150.00, 2, 300.00, 300.00, 0.00, 100.00, '2021-09-06', 46, 100.00, 2147483647),
(105, 'fami', '009343', 'MI', 150.00, 2, 300.00, 300.00, 0.00, 100.00, '2021-09-07', 46, 100.00, 48988898),
(106, '', '', 'g32', 200.00, 5, 1000.00, 1000.00, 0.00, 500.00, '2021-09-08', 35, 100.00, 0),
(107, '', '', 'new phone 2', 1000.00, 2, 2000.00, 2000.00, 0.00, 1000.00, '2021-09-11', 50, 500.00, 0),
(108, '', '', 'new phone 2', 100.00, 2, 200.00, 200.00, 0.00, -800.00, '2021-09-12', 50, 500.00, 0),
(109, 'v', 'v', 'new phone 2', 100.00, 2, 200.00, 200.00, 0.00, -800.00, '2023-02-25', 50, 500.00, 0),
(110, 'i', 'i', 'nokia 112', 550.00, 1, 550.00, 550.00, 0.00, -950.00, '2023-02-27', 49, 1500.00, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale_services`
--

CREATE TABLE `tbl_sale_services` (
  `service_id` int(11) NOT NULL,
  `customer_name` varchar(32) NOT NULL,
  `customer_num` varchar(14) NOT NULL,
  `service_details` varchar(255) NOT NULL,
  `service_price` float(20,2) NOT NULL,
  `service_exp` float(20,2) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sale_services`
--

INSERT INTO `tbl_sale_services` (`service_id`, `customer_name`, `customer_num`, `service_details`, `service_price`, `service_exp`, `date`) VALUES
(2, 'Sultan Ahmed', ' 8801799213804', 'new serv', 1520.00, 10.00, '2021-07-08 18:40:18'),
(3, 'Sultan Ahmed', ' 8801799213804', 'tik koratm mobile', 200.00, 100.00, '2021-07-15 01:30:08'),
(4, 'Sultan Ahmed', ' 8801799213804', 'rrr', 150.00, 70.00, '2021-07-15 03:18:21'),
(5, 'Sultan Ahmed', ' 8801799213804', 'lllllllllllikxdfdg', 100.00, 50.00, '2021-07-16 00:14:52'),
(6, 'Sultan Ahmed', ' 8801799213804', 'desmo', 70.00, 40.00, '2021-07-16 01:17:05'),
(7, 'ttt', '645645656', 'hjghjghjghj', 1000.00, 0.00, '2021-09-06 13:33:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(32) NOT NULL,
  `staff_num` varchar(14) NOT NULL,
  `staff_nid` int(18) NOT NULL,
  `staff_salary` float(20,2) NOT NULL,
  `staff_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`staff_id`, `staff_name`, `staff_num`, `staff_nid`, `staff_salary`, `staff_address`) VALUES
(1, 'new staff', '0178786855', 1582325236, 8000.00, 'humayun rashid chattar sylhet ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `User_id` int(11) NOT NULL,
  `user_name` varchar(15) NOT NULL,
  `user_email` varchar(25) NOT NULL,
  `user_pass` varchar(64) NOT NULL,
  `role` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`User_id`, `user_name`, `user_email`, `user_pass`, `role`) VALUES
(1, 'Developers', 'user@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2),
(2, 'malik', 'malik@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(3, 'staf', 'staf@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1),
(6, 'khan', 'staff@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `tbl_due`
--
ALTER TABLE `tbl_due`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_expance`
--
ALTER TABLE `tbl_expance`
  ADD PRIMARY KEY (`ex_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_return`
--
ALTER TABLE `tbl_return`
  ADD PRIMARY KEY (`return_id`);

--
-- Indexes for table `tbl_sale`
--
ALTER TABLE `tbl_sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `tbl_sale_services`
--
ALTER TABLE `tbl_sale_services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_due`
--
ALTER TABLE `tbl_due`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_expance`
--
ALTER TABLE `tbl_expance`
  MODIFY `ex_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_return`
--
ALTER TABLE `tbl_return`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tbl_sale`
--
ALTER TABLE `tbl_sale`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `tbl_sale_services`
--
ALTER TABLE `tbl_sale_services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
