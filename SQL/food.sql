-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Dec 02, 2016 at 09:19 PM
-- Server version: 5.5.49-log
-- PHP Version: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `item_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`item_id`, `type`) VALUES
(1, 'indian'),
(2, 'indian'),
(3, 'indian'),
(4, 'indian'),
(5, ''),
(6, 'indian'),
(7, 'indian'),
(8, 'indian'),
(9, 'indian'),
(18, ''),
(19, 'lunch'),
(20, 'lunch'),
(21, 'lunch'),
(22, 'lunch'),
(23, 'lunch'),
(24, 'lunch'),
(25, 'lunch'),
(26, 'lunch'),
(27, 'lunch'),
(30, 'chinese'),
(31, 'chinese'),
(32, 'chinese'),
(33, 'chinese'),
(34, 'chinese'),
(35, 'chinese'),
(10, 'dessert'),
(36, 'dessert'),
(37, 'dessert'),
(38, 'dessert'),
(39, 'dessert'),
(40, 'dessert'),
(41, 'breakfast'),
(42, 'breakfast'),
(43, 'breakfast'),
(45, 'breakfast'),
(46, 'breakfast'),
(47, 'dinner'),
(48, 'dinner'),
(49, 'dinner'),
(50, 'dinner'),
(52, 'dinner'),
(53, 'beverage'),
(54, 'beverage'),
(55, 'beverage'),
(56, 'beverage'),
(57, 'beverage'),
(58, 'beverage'),
(59, 'snack'),
(60, 'snack'),
(61, 'snack'),
(62, 'snack'),
(63, 'snack'),
(64, 'chaat'),
(65, 'chaat'),
(66, 'chaat'),
(69, ''),
(69, ''),
(18, ''),
(71, 'breakfast'),
(72, 'indian'),
(73, '');

-- --------------------------------------------------------

--
-- Table structure for table `food_item`
--

CREATE TABLE IF NOT EXISTS `food_item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `description` varchar(400) NOT NULL,
  `stock` int(11) NOT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food_item`
--

INSERT INTO `food_item` (`item_id`, `item_name`, `price`, `description`, `stock`, `status`) VALUES
(1, 'roti', 5, 'ROTI / BREAD - $5', 9, 'a'),
(2, 'paneertikka', 15, 'PANEER MASALA - $15', 15, 'a'),
(3, 'dosa', 10, 'MASALA DOSA - $10', 10, 'a'),
(4, 'idli', 6, 'IDLI - $6', 10, 'a'),
(5, 'jalebi', 10, 'JALEBI - $10', 15, 'a'),
(6, 'laddo', 10, 'LADDO - $10', 10, 'a'),
(7, 'biriyani', 12, 'BIRIYANI - $12', 3, 'a'),
(8, 'pakora', 6, 'PAKORA - $6', 10, 'a'),
(9, 'panipuri', 8, 'PANI PURI - $8', 10, 'a'),
(10, 'red velvet', 15, 'RED VELVET - $15', 8, 'a'),
(18, 'pho beef', 10, 'PHO BEEF - $10', 10, 'd'),
(19, 'kung pao chicken', 5, 'KUNG CHICKEN - $5', 10, 'a'),
(20, 'paneer fried rice', 10, 'PANEER RICE - $10', 10, 'a'),
(21, 'gobi manchurian', 10, 'GOBI FRY - $10', 7, 'a'),
(22, 'baby corn noodles', 6, 'CORN NOODLES - $6', 5, 'a'),
(23, 'prawn malabari', 10, 'PRAWN MALBAR - $10', 9, 'a'),
(24, 'chicken curry', 10, 'CHICKEN CURRY -$10', 9, 'a'),
(25, 'tandoori chicken', 12, 'TANDOORI - $12', 10, 'a'),
(26, 'moo goo gai pan', 6, 'MOO GOO GAI -$6', 10, 'a'),
(27, 'crab chow mein', 8, 'CRAB CHOW MEIN -$8', 9, 'a'),
(30, 'wonton soup', 5, 'WONTON SOUP - $5\r\n', 10, 'a'),
(31, 'chashu bun', 10, 'CHASHU BUN -$10', 8, 'a'),
(32, 'tepura shrimp', 5, 'TEPURA SHRIMP -$5', 10, 'a'),
(33, 'salt pepper squid', 6, 'SALTPEPPER SQUID -$6', 10, 'a'),
(34, 'har gow', 10, 'HAR GOW -$10', 9, 'a'),
(35, 'orange chicken', 6, 'ORANGE CHICKEN -$6', 10, 'a'),
(36, 'choco cake', 15, 'CHOCO CAKE - $15', 9, 'a'),
(37, 'fruit pastry', 10, 'FRUIT PASTRY - $10', 8, 'a'),
(38, 'strawberry', 15, 'STRAWBERRY - $15', 10, 'a'),
(39, 'blueberry', 15, 'BLUEBERRY - $15', 10, 'a'),
(40, 'mix and match', 20, 'MIX AND MATCH- $20', 10, 'a'),
(41, 'omelette & ham', 8, 'OMELETTE & HAM - $8', 10, 'a'),
(42, 'pancake', 10, 'PANCAKE - $10', 10, 'a'),
(43, 'masala dosa', 10, 'MASALA DOSA - $10', 10, 'a'),
(45, 'cereal bowl', 10, 'CEREAL BOWL - $10', 10, 'a'),
(46, 'CONGEE', 10, 'CONGEE - $10', 10, 'a'),
(47, 'kadai paneer', 18, 'KADAI PANEER - $18', 10, 'a'),
(48, 'kulcha', 10, 'KULCHA - $10', 9, 'a'),
(49, 'paneer masala', 10, 'PANEER MASALA - $10\r\n', 10, 'a'),
(50, 'meat dumpling', 15, 'MEAT DUMPLING - $15\r\n', 10, 'a'),
(52, 'fried rice', 12, 'FRIED RICE - $12', 9, 'a'),
(53, 'ice tea', 5, 'ICE TEA - $5', 10, 'a'),
(54, 'hot chocolate', 5, 'HOT CHOCOLATE - $5', 10, 'a'),
(55, 'COFFEE', 10, 'COFFEE - $10', 10, 'a'),
(56, 'mojito', 15, 'MOJITO - $15', 10, 'a'),
(57, 'lemon tea', 10, 'LEMON TEA - $10', 9, 'a'),
(58, 'litchi drink', 12, 'LITCHI DRINK - $12', 9, 'a'),
(59, 'fries', 10, 'FRIES - $10', 10, 'a'),
(60, 'nachos', 12, 'NACHOS - $12', 10, 'a'),
(61, 'egg rolls', 10, 'EGG ROLLS - $10', 10, 'a'),
(62, 'falafel wrap', 15, 'FALAFEL WRAP - $15', 10, 'a'),
(63, 'cutlet', 10, 'CUTLET - $10', 9, 'a'),
(64, 'dahi kachori', 15, 'DAHI KACHORI - $15', 2, 'a'),
(65, 'pav bhaji', 12, 'PAV BHAJI - $12', 6, 'a'),
(66, 'samosa', 10, 'SAMOSA - $10', 8, 'a'),
(69, 'choco shake', 5, 'CHOCO SHAKE -$5', 8, 'a'),
(71, 'idli', 6, 'IDLI - $6', 10, 'a'),
(72, 'Tofu Wrap', 4, 'TOFU WRAP', 2, 'd'),
(73, 'veg biriyani', 10, 'VEG BIRIYANI - $10', 10, 'a');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE IF NOT EXISTS `location` (
  `ID` int(11) NOT NULL,
  `STREET` varchar(100) NOT NULL,
  `APT` varchar(100) DEFAULT NULL,
  `CITY` varchar(50) NOT NULL,
  `STATE` varchar(20) NOT NULL,
  `COUNTRY` varchar(20) NOT NULL,
  `ZIP` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`ID`, `STREET`, `APT`, `CITY`, `STATE`, `COUNTRY`, `ZIP`) VALUES
(1, '901 S Coit Rd', '', 'Richardson', 'Texas', 'USA', '75080'),
(2, 'address', '', 'Richardson', 'Texas', 'USA', '75080'),
(3, '951 Greenside Drive\nApt no 7316', '', 'Richardson', 'Texas', 'USA', '75080'),
(4, '951 Greenside Drive\nApt no 7316', '', 'Richardson', 'Texas', 'USA', '75080'),
(5, '951 Greenside Drive\nApt no 7316', '', 'Richardson', 'Texas', 'USA', '75080'),
(6, '951 Greenside Drive\n', '', 'Richardson', 'Texas', 'USA', '75080');

-- --------------------------------------------------------

--
-- Table structure for table `location_mappings`
--

CREATE TABLE IF NOT EXISTS `location_mappings` (
  `ID` int(11) NOT NULL,
  `LOCATION_ID` int(11) NOT NULL,
  `USER_ID` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location_mappings`
--

INSERT INTO `location_mappings` (`ID`, `LOCATION_ID`, `USER_ID`) VALUES
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(5, 5, 5),
(6, 6, 6);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `total_amt` int(11) NOT NULL,
  `order_date` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `email`, `total_amt`, `order_date`) VALUES
(37, 'me@me.com', 32, '2016-12-02'),
(38, 'me@me.com', 30, '2016-12-02'),
(39, 'me@me.com', 22, '2016-12-02'),
(40, 'me@me.com', 12, '2016-12-02');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE IF NOT EXISTS `order_items` (
  `order_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `items_price` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`order_id`, `item_id`, `items_price`, `qty`) VALUES
(37, 21, 10, 2),
(37, 22, 6, 2),
(38, 5, 10, 3),
(39, 57, 10, 1),
(39, 58, 12, 1),
(40, 72, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `ID` int(11) NOT NULL,
  `FULLNAME` varchar(200) NOT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `PHONE` varchar(20) DEFAULT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `ROLES` varchar(2) NOT NULL DEFAULT '10'
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `FULLNAME`, `EMAIL`, `PHONE`, `PASSWORD`, `ROLES`) VALUES
(1, 'voodoo', 'voodooaw@gmail.com', '4695857712', '5f4dcc3b5aa765d61d8327deb882cf99', '10'),
(2, 'sample', 'sample@gmail.com', '4696124466', '4e91b1cbe42b5c884de47d4c7fda0555', '10'),
(3, 'ADMIN', 'admin@admin.com', '4696124466', '5f4dcc3b5aa765d61d8327deb882cf99', '01'),
(4, 'ME', 'me@me.com', '4696124466', '5f4dcc3b5aa765d61d8327deb882cf99', '10'),
(5, 'user', 'user@gmail.com', '4696124466', '5f4dcc3b5aa765d61d8327deb882cf99', '10'),
(6, 'newuser', 'newuser@newuser.com', '4696124466', '5f4dcc3b5aa765d61d8327deb882cf99', '10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD KEY `item_id` (`item_id`);

--
-- Indexes for table `food_item`
--
ALTER TABLE `food_item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `location_mappings`
--
ALTER TABLE `location_mappings`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `FK_LOC` (`LOCATION_ID`),
  ADD KEY `FK_USER_LOC` (`USER_ID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `UC_EMAIL` (`EMAIL`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `food_item`
--
ALTER TABLE `food_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `location_mappings`
--
ALTER TABLE `location_mappings`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `item_id_fk` FOREIGN KEY (`item_id`) REFERENCES `food_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `location_mappings`
--
ALTER TABLE `location_mappings`
  ADD CONSTRAINT `FK_LOC` FOREIGN KEY (`LOCATION_ID`) REFERENCES `location` (`ID`),
  ADD CONSTRAINT `FK_USER_LOC` FOREIGN KEY (`USER_ID`) REFERENCES `user` (`ID`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `fk_order_id` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
