-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2020 at 05:48 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imagehub`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE `buyer` (
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact no` bigint(10) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `profession` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`username`, `pass`, `name`, `email`, `contact no`, `gender`, `profession`) VALUES
('parag', '$2y$10$UPvzLcJzdMe3StRFLL3pKOlT3c.J8tKVh3lUp7wRokQ0UJh4qtKcm', 'parag', 'parag@gmail.com', 8080808080, 'male', ''),
('ravi', '$2y$10$SqAVVTYPZwfc06egW2/3e.gTofoUsx1/crzwiJBUFW4DAbmLCHQve', 'ravi', 'ravi@gmail.com', 8573637292, 'male', ''),
('Shivaji007', '$2y$10$U6UMzccqYeIiwuclgqDvI.wxuxPpIynHWsXH78zqyHqFljDR9gi9q', 'shivaji', 'befilmi007@gmail.com', 8573637292, 'male', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `s_username` varchar(255) NOT NULL,
  `b_username` varchar(255) NOT NULL,
  `i_id` int(10) NOT NULL,
  `c_id` int(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `price` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`s_username`, `b_username`, `i_id`, `c_id`, `size`, `price`) VALUES
('Shivaji007', 'Shivaji007', 5, 19, 'medium', 2400);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `i_id` int(10) NOT NULL,
  `i_name` varchar(255) NOT NULL,
  `i_path` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `s_username` varchar(255) NOT NULL,
  `tag` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`i_id`, `i_name`, `i_path`, `category`, `description`, `s_username`, `tag`) VALUES
(5, 'shivaji', 'WhatsApp Image 2020-03-27 at 4.32.02 PM.jpeg', 'Fashion', 'shivaji is a gentle man', 'Shivaji007', 'fashion, one person, blezer'),
(6, 'khana', 'langar4.jpeg', 'Food and Drink', 'khana', 'Shivaji007', 'khana'),
(7, 'coke', 'langar8.jfif', 'Food and Drink', 'coke', 'Shivaji007', 'coke'),
(8, 'paneer', 'langar11.webp', 'Food and Drink', 'paneer', 'Shivaji007', 'paneer'),
(9, 'pizza ', 'langar9 (1).webp', 'Food and Drink', 'dilicious pizza ', 'Shivaji007', 'pizza , pizza image , food'),
(10, 'nature', 'logo.jfif', 'Natural', 'nature', 'Shivaji007', 'nature, natural, river, mountain'),
(11, 'french frish', 'langar5.jpeg', 'Food and Drink', 'french frish', 'Shivaji007', 'french frish');

-- --------------------------------------------------------

--
-- Table structure for table `my_order`
--

CREATE TABLE `my_order` (
  `o_id` int(100) NOT NULL,
  `b_username` varchar(255) NOT NULL,
  `s_username` varchar(255) NOT NULL,
  `i_id` int(10) NOT NULL,
  `stetus` varchar(50) NOT NULL,
  `size` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `method` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `my_order`
--

INSERT INTO `my_order` (`o_id`, `b_username`, `s_username`, `i_id`, `stetus`, `size`, `price`, `method`) VALUES
(11, 'Shivaji007', 'Shivaji007', 10, 'delivered', 'large', 3000, 'DD or NEFT'),
(11, 'Shivaji007', 'Shivaji007', 7, 'delivered', 'large', 3000, 'DD or NEFT'),
(12, 'Shivaji007', 'Shivaji007', 6, 'delivered', 'web', 800, 'DD or NEFT'),
(12, 'Shivaji007', 'Shivaji007', 7, 'delivered', 'medium', 2400, 'DD or NEFT');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `o_id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `b_username` varchar(255) NOT NULL,
  `amount` int(50) NOT NULL,
  `stetus` varchar(50) NOT NULL,
  `otp` int(8) NOT NULL,
  `gst` int(15) NOT NULL,
  `method` varchar(50) NOT NULL,
  `neft_ref` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`o_id`, `name`, `email`, `b_username`, `amount`, `stetus`, `otp`, `gst`, `method`, `neft_ref`) VALUES
(11, 'shivaji', 'befilmi007@gmail.com', 'Shivaji007', 7080, 'delivered', 55423820, 2147483647, 'DD or NEFT', '1236tduyiwerw765433468'),
(12, 'shivaji', 'befilmi007@gmail.com', 'Shivaji007', 3776, 'delivered', 47021376, 2147483647, 'DD or NEFT', 'jhjakdsfkjjs834yyo54uno34utoewu9tw');

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE `payment_history` (
  `username` varchar(255) NOT NULL,
  `p_id` int(10) NOT NULL,
  `amount_withdraw` int(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_history`
--

INSERT INTO `payment_history` (`username`, `p_id`, `amount_withdraw`, `date`) VALUES
('Shivaji007', 2, 20, '2020-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `payment_request`
--

CREATE TABLE `payment_request` (
  `username` varchar(255) NOT NULL,
  `req_id` int(10) NOT NULL,
  `amount_req` int(10) NOT NULL,
  `stetus` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_request`
--

INSERT INTO `payment_request` (`username`, `req_id`, `amount_req`, `stetus`, `date`) VALUES
('Shivaji007', 2, 20, 'paid', '2020-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `massage` text NOT NULL,
  `stetus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`id`, `name`, `email`, `massage`, `stetus`) VALUES
(6, 'suman', 'befilmi007@gmail.com', 'kjflwjsdklfjsad', 'pending'),
(7, 'shivaji', 'befilmi007@gmail.com', 'kjdshs jfdjksddldyt rijf ldkjvi', 'pending'),
(8, '', '', '', 'pending'),
(9, '', '', '', 'pending'),
(10, '', '', '', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `avtar` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact no` bigint(11) NOT NULL,
  `profession` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `fb` varchar(255) NOT NULL,
  `insta` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `pinterest` varchar(255) NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `acc_no` bigint(50) NOT NULL,
  `ifsc` varchar(100) NOT NULL,
  `paytm_no` bigint(11) NOT NULL,
  `upi_id` varchar(255) NOT NULL,
  `upi_no` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`username`, `pass`, `name`, `avtar`, `gender`, `email`, `contact no`, `profession`, `bio`, `fb`, `insta`, `twitter`, `pinterest`, `payment_method`, `bank_name`, `acc_no`, `ifsc`, `paytm_no`, `upi_id`, `upi_no`) VALUES
('parag', '$2y$10$dMsvZDkbpzClZiog/GL4Su.3PbX03MXGKYBtuQi6i4Q/xIo4xqdDa', 'parag', '', 'female', 'parag@gmail.com', 8076660918, '', '', '', '', '', '', '', '', 0, '', 0, '', 0),
('Shivaji007', '$2y$10$mffcZyqwbDqJfCFzXmjDiuB1tWk61BmbyfY16s2qzT4sk4xJHreYK', 'shivaji', 'WhatsApp Image 2020-03-27 at 4.32.02 PM.jpeg', 'male', 'befilmi007@gmail.com', 8076660918, 'student', 'yes', 'facebook.com', '', '', '', 'Paytm', '', 0, '', 8295850524, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `seller_account`
--

CREATE TABLE `seller_account` (
  `username` varchar(255) NOT NULL,
  `lifetime_earning` bigint(100) NOT NULL,
  `lifetime_withdraw` bigint(100) NOT NULL,
  `lifetime_large_sell` int(10) NOT NULL,
  `lifetime_medium_sell` int(10) NOT NULL,
  `lifetime_small_sell` int(10) NOT NULL,
  `lifetime_web_sell` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_account`
--

INSERT INTO `seller_account` (`username`, `lifetime_earning`, `lifetime_withdraw`, `lifetime_large_sell`, `lifetime_medium_sell`, `lifetime_small_sell`, `lifetime_web_sell`) VALUES
('Shivaji007', 8280, 20, 2, 1, 0, 1),
('parag', 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sell_detail`
--

CREATE TABLE `sell_detail` (
  `username` varchar(255) NOT NULL,
  `o_id` bigint(100) NOT NULL,
  `i_id` int(10) NOT NULL,
  `size` varchar(100) NOT NULL,
  `price` bigint(50) NOT NULL,
  `buyer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sell_detail`
--

INSERT INTO `sell_detail` (`username`, `o_id`, `i_id`, `size`, `price`, `buyer`) VALUES
('Shivaji007', 11, 10, 'large', 3000, 'Shivaji007'),
('Shivaji007', 11, 7, 'large', 3000, 'Shivaji007'),
('Shivaji007', 12, 6, 'web', 800, 'Shivaji007'),
('Shivaji007', 12, 7, 'medium', 2400, 'Shivaji007');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `i_id` int(10) NOT NULL,
  `s_username` varchar(255) NOT NULL,
  `b_username` varchar(255) NOT NULL,
  `w_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`i_id`, `s_username`, `b_username`, `w_id`) VALUES
(8, 'Shivaji007', 'Shivaji007', 2),
(7, 'Shivaji007', 'Shivaji007', 3),
(6, 'Shivaji007', 'Shivaji007', 4),
(5, 'Shivaji007', 'Shivaji007', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `i_id` (`i_id`),
  ADD KEY `b_username` (`b_username`),
  ADD KEY `s_username` (`s_username`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`i_id`),
  ADD KEY `s_username` (`s_username`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`o_id`);

--
-- Indexes for table `payment_history`
--
ALTER TABLE `payment_history`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `payment_request`
--
ALTER TABLE `payment_request`
  ADD PRIMARY KEY (`req_id`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `seller_account`
--
ALTER TABLE `seller_account`
  ADD KEY `username` (`username`);

--
-- Indexes for table `sell_detail`
--
ALTER TABLE `sell_detail`
  ADD KEY `username` (`username`),
  ADD KEY `buyer` (`buyer`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`w_id`),
  ADD KEY `i_id` (`i_id`),
  ADD KEY `b_username` (`b_username`),
  ADD KEY `s_username` (`s_username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `c_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `i_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `o_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `payment_history`
--
ALTER TABLE `payment_history`
  MODIFY `p_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_request`
--
ALTER TABLE `payment_request`
  MODIFY `req_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `w_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`i_id`) REFERENCES `images` (`i_id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`b_username`) REFERENCES `buyer` (`username`),
  ADD CONSTRAINT `cart_ibfk_3` FOREIGN KEY (`s_username`) REFERENCES `seller` (`username`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_ibfk_1` FOREIGN KEY (`s_username`) REFERENCES `seller` (`username`);

--
-- Constraints for table `payment_history`
--
ALTER TABLE `payment_history`
  ADD CONSTRAINT `payment_history_ibfk_1` FOREIGN KEY (`username`) REFERENCES `seller` (`username`);

--
-- Constraints for table `payment_request`
--
ALTER TABLE `payment_request`
  ADD CONSTRAINT `payment_request_ibfk_1` FOREIGN KEY (`username`) REFERENCES `seller` (`username`);

--
-- Constraints for table `seller_account`
--
ALTER TABLE `seller_account`
  ADD CONSTRAINT `seller_account_ibfk_1` FOREIGN KEY (`username`) REFERENCES `seller` (`username`);

--
-- Constraints for table `sell_detail`
--
ALTER TABLE `sell_detail`
  ADD CONSTRAINT `sell_detail_ibfk_1` FOREIGN KEY (`username`) REFERENCES `seller` (`username`),
  ADD CONSTRAINT `sell_detail_ibfk_2` FOREIGN KEY (`buyer`) REFERENCES `buyer` (`username`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`i_id`) REFERENCES `images` (`i_id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`b_username`) REFERENCES `buyer` (`username`),
  ADD CONSTRAINT `wishlist_ibfk_3` FOREIGN KEY (`s_username`) REFERENCES `seller` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
