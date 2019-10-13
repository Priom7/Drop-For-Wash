-- phpMyAdmin SQL Dump
-- version 5.0.0-dev
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 14, 2019 at 03:39 PM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `bid` int(5) NOT NULL,
  `bname` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`bid`, `bname`) VALUES
(1, 'Cheras'),
(2, 'Chan sow lin'),
(3, 'pudu'),
(4, 'salak selatan'),
(5, 'masjid jamek');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `idea_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `username` varchar(200) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `cntctid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cntctid`, `name`, `phone`, `email`, `message`) VALUES
(2, 'Masum Rayhan', '1234567876543', 'sfgg@dfy6.com', 'nhj,');

-- --------------------------------------------------------

--
-- Table structure for table `idea`
--

CREATE TABLE `idea` (
  `idea_id` int(11) NOT NULL,
  `idea_title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `topic_id` int(11) NOT NULL,
  `username` varchar(200) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `idea-like` int(11) NOT NULL,
  `idea-dislike` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `laundry_order`
--

CREATE TABLE `laundry_order` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `branch` varchar(250) NOT NULL,
  `package` varchar(100) NOT NULL,
  `pickup_date` varchar(100) NOT NULL,
  `pickup_time` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `total` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laundry_order`
--

INSERT INTO `laundry_order` (`order_id`, `user_id`, `branch`, `package`, `pickup_date`, `pickup_time`, `address`, `total`) VALUES
(6, 6, 'masjid jamek', 'Urgent', '03/12/2019', '12:30', '', '70'),
(7, 5, 'Cheras', 'Ordinary', '03/26/2019', '15', '', '2630'),
(10, 4, 'masjid jamek', 'Urgent', '03/18/2019', '19', 'bintang mas', '940');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `pkgid` int(1) NOT NULL,
  `pkgname` varchar(50) NOT NULL,
  `pckprice` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`pkgid`, `pkgname`, `pckprice`) VALUES
(3, 'Ordinary', 10),
(4, 'Urgent', 20);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pdctid` int(11) NOT NULL,
  `pdctname` varchar(100) NOT NULL,
  `pdctprice` varchar(100) NOT NULL,
  `pdctimg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pdctid`, `pdctname`, `pdctprice`, `pdctimg`) VALUES
(1, ' Bag of wash & fold', '50', ''),
(2, 'Whites separated', '50', ''),
(3, 'Blouse Bonanza', '20', ''),
(4, 'Shirt folded', '15', ''),
(5, 'Silk top', '15', ''),
(6, ' Skirt ', '10', '');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `sid` int(1) NOT NULL,
  `sname` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `site_name` varchar(100) NOT NULL,
  `contact_email` varchar(100) NOT NULL,
  `contact_phone` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`site_name`, `contact_email`, `contact_phone`) VALUES
('GoodWash', 'pnanto313@gmail.com', '12312415623');

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topic_id` int(11) NOT NULL,
  `topic_name` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `user_id` int(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topic_id`, `topic_name`, `description`, `user_id`, `date`) VALUES
(6, 'General Topics', 'This is a general discussion panel. share your ideas over here.', 3, '2019-03-14 02:49:26'),
(7, 'Chemicals', 'Laundry detergents, Wash formulas, Boiler chemicals, etc.', 3, '2019-03-14 02:50:10'),
(8, 'Textiles', 'Discussion all about textiles', 3, '2019-03-14 02:50:56'),
(9, 'IT Questions and Answers', 'Website, forum, personal computer questions and answers', 3, '2019-03-14 02:51:31'),
(10, 'Equipment Brands', 'All laundry equipments discussion panel', 3, '2019-03-14 02:55:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `profile_pic` varchar(100) NOT NULL,
  `role` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `username`, `email`, `password`, `phone`, `gender`, `city`, `address`, `profile_pic`, `role`, `status`) VALUES
(1, 'Muslim Uddin Arju', 'muarju', 'mdarju240@gmail.com', '5d206a759a3dfc79a40b48f43e572f49', '', '', '', '', '0', 2, 1),
(2, 'johair mahtab', 'johair', 'mahtab@test.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '', '0', 1, 1),
(3, 'Jubayer Pranto', 'root', 'marayhan96@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '12345432135', 'Female', 'Kuala Lumpur', 'jalan jelawat 1', '0', 1, 1),
(4, 'nazmul pranto', 'nazmul', 'sfgg@dfy6.com', 'e10adc3949ba59abbe56e057f20f883e', '1234567876543', 'Male', 'Kuala Lumpur', 'bintang mas', '0', 2, 1),
(5, 'Zubayer Pranto', 'pranto313', 'pnanto313@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '', '', '', '', '', 2, 1),
(6, 'Md Nazmul Haque', 'pranto10425', 'pranto.nbd@gmail.com', '25d55ad283aa400af464c76d713c07ad', '', '', '', '', '', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`cntctid`);

--
-- Indexes for table `idea`
--
ALTER TABLE `idea`
  ADD PRIMARY KEY (`idea_id`);

--
-- Indexes for table `laundry_order`
--
ALTER TABLE `laundry_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`pkgid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pdctid`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `bid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `cntctid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `idea`
--
ALTER TABLE `idea`
  MODIFY `idea_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `laundry_order`
--
ALTER TABLE `laundry_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `pkgid` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pdctid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `sid` int(1) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
