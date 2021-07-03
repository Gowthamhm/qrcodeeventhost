-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 02, 2021 at 03:40 PM
-- Server version: 10.4.14-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u514971509_qrcode`
--

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `sl_no` int(11) NOT NULL,
  `folder_name` varchar(30) DEFAULT NULL,
  `creator` varchar(30) DEFAULT NULL,
  `Date` varchar(20) DEFAULT NULL,
  `Time` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`sl_no`, `folder_name`, `creator`, `Date`, `Time`) VALUES
(19, 'check', 'admin', '2021-05-21', '02:41:33pm'),
(20, 'demo-2', 'Anamika', '2021-05-21', '03:12:09pm');

-- --------------------------------------------------------

--
-- Table structure for table `qrcode`
--

CREATE TABLE `qrcode` (
  `slno` int(11) NOT NULL,
  `folder_name` varchar(20) DEFAULT NULL,
  `text` varchar(300) DEFAULT NULL,
  `Qoute` varchar(300) DEFAULT NULL,
  `number` varchar(20) DEFAULT NULL,
  `path` varchar(50) DEFAULT NULL,
  `infilename` varchar(200) DEFAULT NULL,
  `outfilename` varchar(200) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `intext` varchar(200) DEFAULT NULL,
  `outtext` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qrcode`
--

INSERT INTO `qrcode` (`slno`, `folder_name`, `text`, `Qoute`, `number`, `path`, `infilename`, `outfilename`, `status`, `intext`, `outtext`) VALUES
(32, 'check', '<p>Hello Good Moning &quot;jdfbgsdb&quot;&nbsp;</p>\r\n', 'jdfbgsdb', '9483621844', './resource/check', 'jdfbgsdb9483621844in.png', 'jdfbgsdb9483621844out.png', 999, 'Welcome<p>Hello Good Moning &quot;jdfbgsdb&quot;&nbsp;</p>\r\n', 'Thank You<p>Hello Good Moning &quot;jdfbgsdb&quot;&nbsp;</p>\r\n'),
(33, 'demo-2', '<p>hgefjebfe &quot;dghbjbkn&quot;</p>\r\n', 'dghbjbkn', '9483621844', './resource/demo-2', 'dghbjbkn9483621844in.png', 'dghbjbkn9483621844out.png', 0, 'Welcome<p>hgefjebfe &quot;dghbjbkn&quot;</p>\r\n', 'Thank You<p>hgefjebfe &quot;dghbjbkn&quot;</p>\r\n'),
(34, 'check', '<p>guyubjlbhi &quot;ghjthrgd&quot;</p>\r\n', 'ghjthrgd', '879465321', './resource/check', 'ghjthrgd879465321in.png', 'ghjthrgd879465321out.png', 0, 'Welcome<p>guyubjlbhi &quot;ghjthrgd&quot;</p>\r\n', 'Thank You<p>guyubjlbhi &quot;ghjthrgd&quot;</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `sl_no` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email_id` varchar(50) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sl_no`, `username`, `password`, `phone`, `email_id`, `role`) VALUES
(1, 'user', 'u', '9686116760', 'gowthamhm002@gmail.com', 'user'),
(2, 'admin', 'admin', '8095642067', 'lionmonkey001@gmail.com', 'admin'),
(3, 'Gowtham', 'g', '8095642067', 'gowthamhm002@gmail.com', 'user'),
(4, 'Anamika', 'b', '8095642067', 'lionmonkey001@gmail.com', 'user'),
(5, 'demo', NULL, '8095642067', 'gowthamhm002@gmail.com', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `qrcode`
--
ALTER TABLE `qrcode`
  ADD PRIMARY KEY (`slno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`sl_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `qrcode`
--
ALTER TABLE `qrcode`
  MODIFY `slno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
