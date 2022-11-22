-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2022 at 02:20 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adds`
--

-- --------------------------------------------------------

--
-- Table structure for table `addsall_`
--

CREATE TABLE `addsall_` (
  `id` varchar(30) NOT NULL,
  `title` varchar(30) NOT NULL,
  `category` varchar(30) NOT NULL,
  `price` varchar(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `city` varchar(200) NOT NULL,
  `file1` varchar(100) NOT NULL,
  `file2` varchar(100) NOT NULL,
  `des` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addsall_`
--

INSERT INTO `addsall_` (`id`, `title`, `category`, `price`, `name`, `phone`, `city`, `file1`, `file2`, `des`) VALUES
('96434434915b5f1d29a58d9', 'car', 'car', '1000PerMonth', 'suraj kumar', '9643443491', 'Delhi,Delhi', 'upload/5b5f1d253cfaa.jpeg', 'upload/5b5f1d24a9c50.jpeg', 'alto 800 ac'),
('96434434915bb92151d4404', 'bike', 'car', '2398Perday', 'suraj', '9643443491', 'Bihar Motihari ', 'upload/5bb9214fa2cb3.jpeg', '', 'dfigh'),
('96434434915bb92fa747911', 'suraj', 'car', '100PerMonth', 'suraj', '9643443491', 'delhi vasant vihar ', 'upload/5bb92fa6d5a52.jpeg', '', 'bike'),
('96434434915be982214e656', 'car at low rate', 'book', '100Perweek', 'suraj', '9643443491', 'delhi shivaji park ', '', '', 'please contact soon'),
('96434434915bea9928ac8c5', 'suraj', 'bike', '100PerMonth', 'suraj', '9643443491', 'delhi chandni chowk ', 'upload/5bea99283841e.jpeg', 'upload/5bea99281b014.jpeg', 'oeigh'),
('96434434915bea9b7927b86', 'alsfk', 'car', 'lknPerMonth', 'sd', '9643443491', 'sweigoh', 'upload/5bea9b78a2425.jpeg', '', 'sef'),
('96434434915bea9cfe50fe7', 'sfb', 'car', 'sdkgPerweek', 'sdg', '9643443491', 'sldng', 'upload/5bea9cfdd00b4.jpeg', '', 'dsgli'),
('96434434915beaa080a240b', 'SEPFO', 'car', 'WEFN;Perweek', 'SU', '9643443491', 'SAEB', 'upload/5beaa07f4de7e.jpeg', '', 'WEGPO'),
('96434434915beaa12f0d077', 'slgb', 'car', 'sdgnPerday', 'd', '9643443491', 'wseg', 'upload/5beaa112629c9.png', '', 'segl'),
('96434434915beaa164482bb', 'slgb', 'car', 'sdgnPerday', 'd', '9643443491', 'wseg', 'upload/5beaa15eb3734.png', '', 'segl'),
('96434434915c0448fac6727', 'srg', 'car', 'segojpPerweek', 'se;g', '9643443491', 'segn', 'upload/5c0448fabfaee.jpeg', '', 'wlrgb');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `fname` varchar(30) NOT NULL,
  `phonenumber` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `active` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`fname`, `phonenumber`, `password`, `active`) VALUES
('suraj kumar', '8055596542', '12345678', '1'),
('suraj kumar', '8298455418', '12345678', '1'),
('suraj', '9643443491', '12345678', '1'),
('suraj kumar', '9643443492', '12345678', '1'),
('suraj kumar', '9643443493', '12345678', '1'),
('suraj kumar', '9643443498', '12345678', '1'),
('rohan', '9654248616', '123456789', '1'),
('amitraj', '9910712897', '12345678', '1');

-- --------------------------------------------------------

--
-- Table structure for table `s9643443491`
--

CREATE TABLE `s9643443491` (
  `id` varchar(20) NOT NULL,
  `title` varchar(60) NOT NULL,
  `category` varchar(20) NOT NULL,
  `price` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `city` varchar(200) NOT NULL,
  `file1` varchar(100) DEFAULT NULL,
  `file2` varchar(100) DEFAULT NULL,
  `des` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `s9643443491`
--

INSERT INTO `s9643443491` (`id`, `title`, `category`, `price`, `name`, `phone`, `city`, `file1`, `file2`, `des`) VALUES
('5b5f1d29a58d9', 'car', 'car', '1000PerMonth', 'suraj kumar', '9643443491', 'Delhi,Delhi', 'upload/5b5f1d253cfaa.jpeg', 'upload/5b5f1d24a9c50.jpeg', 'alto 800 ac'),
('5bb92151d4404', 'bike', 'car', '2398Perday', 'suraj', '9643443491', 'Bihar Motihari ', 'upload/5bb9214fa2cb3.jpeg', '', 'dfigh'),
('5bb92fa747911', 'suraj', 'car', '100PerMonth', 'suraj', '9643443491', 'delhi vasant vihar ', 'upload/5bb92fa6d5a52.jpeg', '', 'bike'),
('5be982214e656', 'car at low rate', 'book', '100Perweek', 'suraj', '9643443491', 'delhi shivaji park ', '', '', 'please contact soon'),
('5bea9928ac8c5', 'suraj', 'bike', '100PerMonth', 'suraj', '9643443491', 'delhi chandni chowk ', 'upload/5bea99283841e.jpeg', 'upload/5bea99281b014.jpeg', 'oeigh'),
('5bea9b7927b86', 'alsfk', 'car', 'lknPerMonth', 'sd', '9643443491', 'sweigoh', 'upload/5bea9b78a2425.jpeg', '', 'sef'),
('5bea9cfe50fe7', 'sfb', 'car', 'sdkgPerweek', 'sdg', '9643443491', 'sldng', 'upload/5bea9cfdd00b4.jpeg', '', 'dsgli'),
('5beaa080a240b', 'SEPFO', 'car', 'WEFN;Perweek', 'SU', '9643443491', 'SAEB', 'upload/5beaa07f4de7e.jpeg', '', 'WEGPO'),
('5beaa12f0d077', 'slgb', 'car', 'sdgnPerday', 'd', '9643443491', 'wseg', 'upload/5beaa112629c9.png', '', 'segl'),
('5beaa164482bb', 'slgb', 'car', 'sdgnPerday', 'd', '9643443491', 'wseg', 'upload/5beaa15eb3734.png', '', 'segl'),
('5c0448fac6727', 'srg', 'car', 'segojpPerweek', 'se;g', '9643443491', 'segn', 'upload/5c0448fabfaee.jpeg', '', 'wlrgb');

-- --------------------------------------------------------

--
-- Table structure for table `s9654248616`
--

CREATE TABLE `s9654248616` (
  `id` varchar(20) NOT NULL,
  `title` varchar(60) NOT NULL,
  `category` varchar(20) NOT NULL,
  `price` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `city` varchar(200) NOT NULL,
  `file1` varchar(100) DEFAULT NULL,
  `file2` varchar(100) DEFAULT NULL,
  `des` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addsall_`
--
ALTER TABLE `addsall_`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`phonenumber`);

--
-- Indexes for table `s9643443491`
--
ALTER TABLE `s9643443491`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s9654248616`
--
ALTER TABLE `s9654248616`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
