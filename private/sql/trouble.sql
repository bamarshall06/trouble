-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 10, 2018 at 08:46 AM
-- Server version: 5.6.36-82.1-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bryanm43_pro1`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blogid` int(11) NOT NULL,
  `blogName` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contactFName` varchar(50) NOT NULL,
  `contactLName` varchar(50) NOT NULL,
  `qualityScore` int(11) NOT NULL,
  `mozDA` int(11) NOT NULL,
  `sponsors` int(11) NOT NULL,
  `fqshop` int(11) NOT NULL,
  `gfairy` int(11) NOT NULL,
  `mstar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blogid`, `blogName`, `url`, `email`, `contactFName`, `contactLName`, `qualityScore`, `mozDA`, `sponsors`, `fqshop`, `gfairy`, `mstar`) VALUES
(3, 'southernfabric.com', 'southernfabric.com', 'admin@southernfabric.com', 'Southern', 'Fabric', 86, 43, 13, 1, 1, 1),
(4, 'bryanmarshall.com', 'bryanmarshall.com', 'professor@bryanmarshall.com', 'Bryan', 'Marshall', 86, 50, 16, 0, 1, 1),
(8, 'bryanmarshall.com', 'fefe', 'fefe', 'fefe', 'feef', 66, 44, 2, 1, 1, 0),
(13, 'I love PeeWee Herman', 'peewee.com', 'peewee@herman.com', 'PeeWee', 'Herman', 100, 50, 20, 1, 1, 1),
(14, 'somthe', 'somthe', 'eso@the', 'the', 'big', 130, 90, 20, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `contractid` int(11) NOT NULL,
  `paymentDate` date NOT NULL,
  `contractLength` int(11) NOT NULL,
  `paymentAmt` decimal(20,2) NOT NULL,
  `blogid` int(11) NOT NULL,
  `endContract` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`contractid`, `paymentDate`, `contractLength`, `paymentAmt`, `blogid`, `endContract`) VALUES
(6, '2017-12-03', 3, '54.44', 4, '0000-00-00'),
(7, '2017-07-10', 6, '299.00', 4, '0000-00-00'),
(12, '2018-03-21', 12, '400.00', 3, '0000-00-00'),
(14, '2018-01-01', 3, '45.00', 3, '0000-00-00'),
(15, '2017-08-01', 5, '69.00', 3, '0000-00-00'),
(16, '0000-00-00', 3, '0.00', 8, '0000-00-00'),
(18, '2020-02-03', 3, '89.00', 13, '0000-00-00'),
(19, '0000-00-00', 2, '66.00', 4, '0000-00-00'),
(20, '2018-03-27', 1, '233.00', 3, '2018-04-27');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `userName`, `password`, `firstName`) VALUES
(3, 'test', 'test', 'Bryan'),
(8, 'Test2', 'test2', 'Nick'),
(9, 'two', 'two', 'two'),
(11, 'no', 'no', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blogid`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`contractid`),
  ADD KEY `blogID` (`blogid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blogid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `contractid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`blogid`) REFERENCES `blog` (`blogid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
