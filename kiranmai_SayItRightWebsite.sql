-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 09, 2019 at 09:29 PM
-- Server version: 5.6.43
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kiranmai_SayItRightWebsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `Business`
--

CREATE TABLE `Business` (
  `business_id` int(20) NOT NULL,
  `business_type` varchar(20) NOT NULL,
  `business_name` text NOT NULL,
  `description` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `location` text NOT NULL,
  `user_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Business`
--

INSERT INTO `Business` (`business_id`, `business_type`, `business_name`, `description`, `date`, `location`, `user_id`) VALUES
(1, 'university', 'Mobile food center', 'business on wheels', '2019-02-04', 'texas', 3),
(2, 'company', 'footware business', 'exporting and importing footware from different countries', '2019-02-05', 'texas', 4);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(20) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `telephone` int(20) NOT NULL,
  `message` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `first_name`, `last_name`, `telephone`, `message`) VALUES
(1, 'wan', 'kim', 4578625, 'information about the sales'),
(2, 'fiona', 'hereby', 451861626, 'updates about  the websites'),
(3, 'king', 'huon', 625214962, 'updates about the new items in buy from us page');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `address` varchar(80) NOT NULL,
  `apartment` varchar(40) NOT NULL,
  `city` varchar(20) NOT NULL,
  `postal_code` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `email`, `first_name`, `last_name`, `address`, `apartment`, `city`, `postal_code`) VALUES
(1, 'kim@gmail.com', 'kim', 'yun', 'street.no : 1, arlington', '542', 'texas', '76013'),
(2, 'yen@yahoo.com', 'henry', 'pendry', 'meadow run', '785', 'arlington', '76018'),
(3, 'james@gmail.com', 'jane', 'ire', 'arbor oaks', '789', 'arlington', '78965'),
(4, 'umber@yahoo.com', 'umber', 'heard', 'university center', '1008', 'arlington', '76015');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(20) NOT NULL,
  `event_name` varchar(30) NOT NULL,
  `event_type` text NOT NULL,
  `description` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `location` text NOT NULL,
  `user_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `event_name`, `event_type`, `description`, `date`, `location`, `user_id`) VALUES
(1, 'oratory', 'event', 'art of making formal speeches', '2019-02-04', 'texas', 2),
(2, 'vocalization', 'conference', 'a sound ', '2019-02-12', 'arlington', 2),
(3, 'social communication', 'conference', 'the formation of a stable structure inside a group, which provides a basis for order and patterns re', '2019-02-05', 'newyork', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Myevent`
--

CREATE TABLE `Myevent` (
  `myevent_id` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `event_id` int(20) NOT NULL,
  `event_type` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Myevent`
--

INSERT INTO `Myevent` (`myevent_id`, `user_id`, `event_id`, `event_type`) VALUES
(1, 1, 1, 'event'),
(2, 1, 2, 'conference');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscription`
--

CREATE TABLE `newsletter_subscription` (
  `id` int(20) NOT NULL,
  `email_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter_subscription`
--

INSERT INTO `newsletter_subscription` (`id`, `email_address`) VALUES
(2, 'james@yahoo.com'),
(1, 'jones@gmail.com'),
(3, 'kiranmai@gmail.com'),
(4, 'neon@gmail.com'),
(5, 'vane@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `orderDetail`
--

CREATE TABLE `orderDetail` (
  `orderdetail_id` int(20) NOT NULL,
  `order_id` int(20) NOT NULL,
  `product_id` int(20) NOT NULL,
  `quantity` int(20) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orderDetail`
--

INSERT INTO `orderDetail` (`orderdetail_id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 1, 1, 1, 20),
(2, 1, 3, 3, 60),
(4, 3, 2, 1, 50),
(5, 3, 4, 1, 40.5),
(6, 4, 1, 1, 20),
(7, 5, 4, 1, 40.5);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(20) NOT NULL,
  `customer_id` int(20) NOT NULL,
  `total_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `total_price`) VALUES
(1, 1, 80),
(3, 4, 90.5),
(4, 3, 20),
(5, 2, 40.5);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(20) NOT NULL,
  `product_name` varchar(40) NOT NULL,
  `unit_price` float NOT NULL,
  `description` varchar(100) NOT NULL,
  `image_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `unit_price`, `description`, `image_url`) VALUES
(1, 'cup', 20, 'cup with a printed message', 'https://www.bing.com/images/search?view=detailV2&i'),
(2, 'flannel', 50, 'shirt with a design', 'https://www.bing.com/images/search?view=detailV2&id=D3C335AB5E7B7C8426C0470B247105F1E0BCB6C6&thid=OI'),
(3, 'cup', 20, 'cup with an image', 'https://www.bing.com/images/search?view=detailV2&id=D3C335AB5E7B7C8426C0470B247105F1E0BCB6C6&thid='),
(4, 'shirt', 40.5, 'shirt with buttons', 'https://www.bing.com/images/search?view=detailV2&id=D3C335AB5E7B');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(10) NOT NULL,
  `role_name` text NOT NULL,
  `role_subtype` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `role_subtype`) VALUES
(1, 'Individual', NULL),
(2, 'Event', NULL),
(3, 'Business', 'University'),
(4, 'Business', 'company');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `user_id` int(20) NOT NULL,
  `role_id` int(10) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `workplace` varchar(50) DEFAULT NULL,
  `school` varchar(50) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(30) NOT NULL,
  `image` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`user_id`, `role_id`, `first_name`, `last_name`, `workplace`, `school`, `email`, `password`, `image`) VALUES
(1, 1, 'john', 'wan', 'university center', 'uta', 'john.wan@gmail.com', '123456', 'https://www.bing.com/images/search?q=ima'),
(2, 2, 'james', 'potter', NULL, NULL, 'james.potter@hogwarts.com', 'harry', 'https://www.bing.com/images/search?q='),
(3, 3, 'venom', 'Alien', NULL, NULL, 'venom.alien@venus.com', 'venom', 'https://www.bing.com/images/search?q=huh'),
(4, 4, 'anil', 'kumar', NULL, NULL, 'anilkumar@gmail.com', 'sonam', 'https://www.bing.com/images/searc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Business`
--
ALTER TABLE `Business`
  ADD PRIMARY KEY (`business_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `Myevent`
--
ALTER TABLE `Myevent`
  ADD PRIMARY KEY (`myevent_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `newsletter_subscription`
--
ALTER TABLE `newsletter_subscription`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_address` (`email_address`);

--
-- Indexes for table `orderDetail`
--
ALTER TABLE `orderDetail`
  ADD PRIMARY KEY (`orderdetail_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `customer_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `image_url` (`image_url`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Business`
--
ALTER TABLE `Business`
  MODIFY `business_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Myevent`
--
ALTER TABLE `Myevent`
  MODIFY `myevent_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `newsletter_subscription`
--
ALTER TABLE `newsletter_subscription`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orderDetail`
--
ALTER TABLE `orderDetail`
  MODIFY `orderdetail_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Business`
--
ALTER TABLE `Business`
  ADD CONSTRAINT `Business_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `signup` (`user_id`);

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `signup` (`user_id`);

--
-- Constraints for table `Myevent`
--
ALTER TABLE `Myevent`
  ADD CONSTRAINT `Myevent_ibfk_1` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`),
  ADD CONSTRAINT `Myevent_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `signup` (`user_id`);

--
-- Constraints for table `orderDetail`
--
ALTER TABLE `orderDetail`
  ADD CONSTRAINT `orderDetail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `orderDetail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `signup`
--
ALTER TABLE `signup`
  ADD CONSTRAINT `signup_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
