-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2022 at 10:54 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `admin_email` text DEFAULT NULL,
  `admin_pass` text DEFAULT NULL,
  `admin_name` text DEFAULT NULL,
  `admin_country` text DEFAULT NULL,
  `admin_contact` text DEFAULT NULL,
  `admin_about` text DEFAULT NULL,
  `admin_job` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_email`, `admin_pass`, `admin_name`, `admin_country`, `admin_contact`, `admin_about`, `admin_job`) VALUES
(1, 'mursalinir@gmail.com', '123456', 'Mursalin Islam', 'Bangladesh', '01571707773', NULL, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `amount`
--

CREATE TABLE `amount` (
  `id` int(11) NOT NULL,
  `invoice` text DEFAULT NULL,
  `total` text DEFAULT NULL,
  `paid` text DEFAULT NULL,
  `due` text DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `paid_by_cash` text DEFAULT NULL,
  `details` text DEFAULT NULL,
  `old_bat_name` text DEFAULT NULL,
  `old_bat_price` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `amount_details`
--

CREATE TABLE `amount_details` (
  `id` int(11) NOT NULL,
  `total` int(20) NOT NULL,
  `paid` int(20) NOT NULL,
  `due` int(20) NOT NULL,
  `exchange` text DEFAULT NULL,
  `old_bat` text DEFAULT NULL,
  `old_bat_price` text DEFAULT NULL,
  `qty` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `admin_id` int(11) NOT NULL,
  `admin_email` text DEFAULT NULL,
  `admin_pass` text DEFAULT NULL,
  `admin_name` text DEFAULT NULL,
  `admin_country` text DEFAULT NULL,
  `admin_contact` text DEFAULT NULL,
  `admin_about` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`admin_id`, `admin_email`, `admin_pass`, `admin_name`, `admin_country`, `admin_contact`, `admin_about`) VALUES
(1, 'mursalinir@gmail.com', '123456', 'Mursalin Islam', 'Bangladesh', '01571707773', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `balance`
--

CREATE TABLE `balance` (
  `balance_id` int(200) NOT NULL,
  `date` date DEFAULT NULL,
  `income` text DEFAULT NULL,
  `i_name` text DEFAULT NULL,
  `i_purpose` text DEFAULT NULL,
  `expenditure` text DEFAULT NULL,
  `e_name` text DEFAULT NULL,
  `e_purpose` text DEFAULT NULL,
  `carried_over` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bank_id` int(11) NOT NULL,
  `bank_name` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bank_id`, `bank_name`) VALUES
(1, 'Exim Bank'),
(2, 'NRBC Bank'),
(3, 'Dutch Bangla Bank'),
(4, 'Prime Bank'),
(5, 'Mutual Trust Bank'),
(6, 'Basic Bank'),
(7, 'Union Bank'),
(8, 'Islami Bank'),
(9, 'City Bank'),
(10, 'Standard Bank');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(50) NOT NULL,
  `product_id` text DEFAULT NULL,
  `product_serial` text DEFAULT NULL,
  `product_qty` text DEFAULT NULL,
  `purchase_rate` text DEFAULT NULL,
  `unit_price` text DEFAULT NULL,
  `total_price` text DEFAULT NULL,
  `profit` varchar(100) DEFAULT '0',
  `customer_name` text DEFAULT NULL,
  `author_id` text DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `customer_contact` text DEFAULT NULL,
  `customer_city` text DEFAULT NULL,
  `customer_type` varchar(11) DEFAULT '1',
  `customer_address` text DEFAULT NULL,
  `product_category` text DEFAULT NULL,
  `easy_bike` text DEFAULT NULL,
  `battery` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(10) NOT NULL,
  `cat_title` text DEFAULT NULL,
  `cat_desc` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_desc`) VALUES
(1, 'Battery', ''),
(2, 'Old Battery', ''),
(3, 'Spare Parts', ''),
(4, 'Easy Bike', ''),
(5, ' Easy Bike + Battery Set', '');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `customer_name` text DEFAULT NULL,
  `customer_contact` text DEFAULT NULL,
  `customer_city` text DEFAULT NULL,
  `customer_address` text DEFAULT NULL,
  `customer_img` text DEFAULT NULL,
  `guarantor_name` text DEFAULT NULL,
  `guarantor_contact` text DEFAULT NULL,
  `guarantor_address` text DEFAULT NULL,
  `nid_front` text DEFAULT NULL,
  `nid_back` text DEFAULT NULL,
  `chek` text DEFAULT NULL,
  `last_payment_date` date DEFAULT NULL,
  `last_payment_amount` text DEFAULT NULL,
  `next_payment_date` text DEFAULT NULL,
  `total_due` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `dues`
--

CREATE TABLE `dues` (
  `id` int(11) NOT NULL,
  `customer_id` text DEFAULT NULL,
  `invoice` text DEFAULT NULL,
  `total` text DEFAULT NULL,
  `paid` text DEFAULT NULL,
  `due` text DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `payment_date` date DEFAULT NULL,
  `payment_amount` text DEFAULT NULL,
  `details` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `expenditure`
--

CREATE TABLE `expenditure` (
  `expenditure_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `name` text DEFAULT NULL,
  `purpose` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `details` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE `income` (
  `income_id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `name` text DEFAULT NULL,
  `purpose` text DEFAULT NULL,
  `amount` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `log_id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `activity` text DEFAULT NULL,
  `user` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `date`, `activity`, `user`) VALUES
(1471, '2022-02-03 00:59:52', 'Logged in to the system', 'Mursalin Islam');

-- --------------------------------------------------------

--
-- Table structure for table `old_dry_report`
--

CREATE TABLE `old_dry_report` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `details` text DEFAULT NULL,
  `qty` text DEFAULT NULL,
  `total_qty` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `old_ev_report`
--

CREATE TABLE `old_ev_report` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `details` text DEFAULT NULL,
  `qty` text DEFAULT NULL,
  `total_qty` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `print`
--

CREATE TABLE `print` (
  `print_id` int(11) NOT NULL,
  `invoice` text DEFAULT NULL,
  `customer_name` text DEFAULT NULL,
  `customer_contact` text DEFAULT NULL,
  `customer_city` text DEFAULT NULL,
  `customer_address` text DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `product_qty` text DEFAULT NULL,
  `product_serial` text DEFAULT NULL,
  `product_id` text DEFAULT NULL,
  `product_category` text DEFAULT NULL,
  `total_price` text DEFAULT NULL,
  `easy_bike` text DEFAULT NULL,
  `battery` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` text DEFAULT NULL,
  `product_cat` text DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `product_details` text DEFAULT NULL,
  `product_img` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE `purchase` (
  `order_id` int(11) NOT NULL,
  `invoice` text DEFAULT NULL,
  `product_id` text DEFAULT NULL,
  `product_qty` text DEFAULT NULL,
  `purchase_rate` text DEFAULT NULL,
  `unit_price` text DEFAULT NULL,
  `total_price` text DEFAULT NULL,
  `seller_name` text DEFAULT NULL,
  `author_id` text DEFAULT NULL,
  `purchase_date` date DEFAULT NULL,
  `seller_contact` text DEFAULT NULL,
  `seller_city` text DEFAULT NULL,
  `seller_address` text DEFAULT NULL,
  `product_category` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_cart`
--

CREATE TABLE `purchase_cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` text DEFAULT NULL,
  `product_qty` text DEFAULT NULL,
  `purchase_rate` text DEFAULT NULL,
  `unit_price` text DEFAULT NULL,
  `total_price` text DEFAULT NULL,
  `customer_name` text DEFAULT NULL,
  `author_id` text DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `customer_contact` text DEFAULT NULL,
  `customer_city` text DEFAULT NULL,
  `customer_address` text DEFAULT NULL,
  `product_category` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `employee` text NOT NULL,
  `amount` varchar(11) DEFAULT '0',
  `purpose` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `s_id` int(20) NOT NULL,
  `i` text DEFAULT NULL,
  `invoice` text DEFAULT NULL,
  `product_id` text DEFAULT NULL,
  `product_serial` text DEFAULT NULL,
  `product_qty` text DEFAULT NULL,
  `purchase_rate` text DEFAULT NULL,
  `unit_price` text DEFAULT NULL,
  `sub_total` text DEFAULT NULL,
  `profit` text DEFAULT NULL,
  `customer_name` text DEFAULT NULL,
  `author_id` text DEFAULT NULL,
  `order_date` date DEFAULT NULL,
  `customer_contact` text DEFAULT NULL,
  `customer_city` text DEFAULT NULL,
  `customer_type` text DEFAULT NULL,
  `customer_address` text DEFAULT NULL,
  `product_category` text DEFAULT NULL,
  `total` text DEFAULT NULL,
  `easy_bike` text DEFAULT NULL,
  `battery` text DEFAULT NULL,
  `details` text DEFAULT NULL,
  `old_bat_price` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sales_return`
--

CREATE TABLE `sales_return` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `invoice` text DEFAULT NULL,
  `product` text DEFAULT NULL,
  `qty` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `s_id` int(11) NOT NULL,
  `product_id` text DEFAULT NULL,
  `category_id` text DEFAULT NULL,
  `purchase_rate` varchar(11) DEFAULT '0',
  `unit_price` varchar(11) DEFAULT '0',
  `quantity` varchar(11) DEFAULT '0',
  `author` text DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`s_id`, `product_id`, `category_id`, `purchase_rate`, `unit_price`, `quantity`, `author`, `date`) VALUES
(13, '1', '1', '0', '0', '0', NULL, '2020-11-30 00:00:00'),
(14, '2', '1', '0', '0', '0', NULL, '2020-11-30 00:00:00'),
(15, '3', '1', '0', '0', '0', NULL, '2020-11-30 00:00:00'),
(16, '4', '1', '0', '0', '0', NULL, '2020-11-24 04:52:55'),
(17, '5', '1', '0', '0', '0', NULL, '2020-11-30 00:00:00'),
(19, '6', '4', '0', '0', '0', NULL, '2020-11-30 00:00:00'),
(20, '7', '4', '0', '0', '0', NULL, '2020-11-30 00:00:00'),
(21, '8', '4', '0', '0', '0', NULL, '2020-11-30 00:00:00'),
(22, '9', '2', '0', '0', '6', NULL, '2021-12-02 00:00:00'),
(23, '10', '2', '0', '0', '0', NULL, '2021-09-13 00:00:00'),
(24, '23', '1', '0', '0', '0', NULL, '2020-12-02 03:28:43'),
(25, '24', '1', '0', '0', '0', NULL, '2020-12-02 03:29:33'),
(26, '25', '1', '0', '0', '0', NULL, '2020-12-12 22:49:29'),
(27, '26', '1', '0', '0', '0', NULL, '2021-01-14 07:35:38'),
(28, '27', '1', '0', '0', '0', NULL, '2021-02-11 04:32:20'),
(29, '28', '4', '0', '0', '0', NULL, '2021-03-24 08:16:03'),
(30, '29', '1', '0', '0', '0', NULL, '2021-03-24 08:57:38'),
(31, '30', '1', '0', '0', '0', NULL, '2021-03-24 09:06:09'),
(32, '31', '1', '0', '0', '0', NULL, '2021-05-06 03:21:58'),
(33, '32', '1', '0', '0', '7', NULL, '2021-06-10 08:12:50'),
(34, '33', '1', '0', '0', '0', NULL, '2021-10-05 09:41:23'),
(35, '34', '1', '0', '0', '0', NULL, '2021-10-27 08:22:07');

-- --------------------------------------------------------

--
-- Table structure for table `stock_report`
--

CREATE TABLE `stock_report` (
  `id` int(11) NOT NULL,
  `date` text DEFAULT NULL,
  `pro_id` text DEFAULT NULL,
  `details` text DEFAULT NULL,
  `qty` text DEFAULT NULL,
  `total_qty` text DEFAULT NULL,
  `remarks` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `s_id` int(11) NOT NULL,
  `supplier_name` text DEFAULT NULL,
  `supplier_contact` text DEFAULT NULL,
  `supplier_address` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`s_id`, `supplier_name`, `supplier_contact`, `supplier_address`) VALUES
(1, 'General Supplier', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_amount`
--

CREATE TABLE `supplier_amount` (
  `id` int(11) NOT NULL,
  `invoice` text DEFAULT NULL,
  `s_name` text DEFAULT NULL,
  `s_contact` text DEFAULT NULL,
  `total` text DEFAULT NULL,
  `paid` text DEFAULT NULL,
  `due` text DEFAULT NULL,
  `date` date DEFAULT NULL,
  `last_payment` datetime DEFAULT current_timestamp(),
  `last_amount` varchar(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_amount`
--

INSERT INTO `supplier_amount` (`id`, `invoice`, `s_name`, `s_contact`, `total`, `paid`, `due`, `date`, `last_payment`, `last_amount`) VALUES
(3, 'PRCS3', 'General Supplier', '', '20000', '20000', '0', '2020-11-21', '2020-11-21 07:03:53', '0');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `bank_name` text DEFAULT NULL,
  `branch` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `purpose` text DEFAULT NULL,
  `account_no` text DEFAULT NULL,
  `amount` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `method` text DEFAULT NULL,
  `check_no` text DEFAULT NULL,
  `check_bank` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `amount`
--
ALTER TABLE `amount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `amount_details`
--
ALTER TABLE `amount_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `balance`
--
ALTER TABLE `balance`
  ADD PRIMARY KEY (`balance_id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bank_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `dues`
--
ALTER TABLE `dues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenditure`
--
ALTER TABLE `expenditure`
  ADD PRIMARY KEY (`expenditure_id`);

--
-- Indexes for table `income`
--
ALTER TABLE `income`
  ADD PRIMARY KEY (`income_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `old_dry_report`
--
ALTER TABLE `old_dry_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `old_ev_report`
--
ALTER TABLE `old_ev_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `print`
--
ALTER TABLE `print`
  ADD PRIMARY KEY (`print_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `purchase_cart`
--
ALTER TABLE `purchase_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `sales_return`
--
ALTER TABLE `sales_return`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `stock_report`
--
ALTER TABLE `stock_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `supplier_amount`
--
ALTER TABLE `supplier_amount`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `amount`
--
ALTER TABLE `amount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;

--
-- AUTO_INCREMENT for table `amount_details`
--
ALTER TABLE `amount_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `balance`
--
ALTER TABLE `balance`
  MODIFY `balance_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2767;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bank_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `dues`
--
ALTER TABLE `dues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=561;

--
-- AUTO_INCREMENT for table `expenditure`
--
ALTER TABLE `expenditure`
  MODIFY `expenditure_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1543;

--
-- AUTO_INCREMENT for table `income`
--
ALTER TABLE `income`
  MODIFY `income_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=712;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1472;

--
-- AUTO_INCREMENT for table `old_dry_report`
--
ALTER TABLE `old_dry_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `old_ev_report`
--
ALTER TABLE `old_ev_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `print`
--
ALTER TABLE `print`
  MODIFY `print_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchase_cart`
--
ALTER TABLE `purchase_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `s_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `sales_return`
--
ALTER TABLE `sales_return`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `stock_report`
--
ALTER TABLE `stock_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=352;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `s_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `supplier_amount`
--
ALTER TABLE `supplier_amount`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
