-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2017 at 09:10 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `ID` int(20) NOT NULL,
  `ACCOUNT_NUMBER` varchar(50) NOT NULL,
  `ACCOUNT_TYPE` varchar(50) DEFAULT NULL,
  `TOTAL_BALACE` double DEFAULT NULL,
  `CREATED_DATE` datetime(6) DEFAULT NULL,
  `UPDATED_DATE` datetime(6) DEFAULT NULL,
  `USER_ID` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`ID`, `ACCOUNT_NUMBER`, `ACCOUNT_TYPE`, `TOTAL_BALACE`, `CREATED_DATE`, `UPDATED_DATE`, `USER_ID`) VALUES
(27, '1234', 'Debit Account', 5000, '2017-08-19 00:00:00.000000', '2017-08-19 00:00:00.000000', 1),
(28, '121', 'Credit Account', 15500, '2017-08-19 00:00:00.000000', '2017-08-19 00:00:00.000000', 1),
(29, '131', 'Debit Account', 10700.5, '2017-08-19 00:00:00.000000', '2017-08-19 00:00:00.000000', 2),
(30, '131010', 'Credit Account', 10000, '2017-08-19 00:00:00.000000', '2017-08-19 00:00:00.000000', 2);

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `ID` int(20) NOT NULL,
  `CURRENCY_CODE` varchar(50) NOT NULL,
  `CURRENCY_NAME` varchar(50) DEFAULT NULL,
  `RATE` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`ID`, `CURRENCY_CODE`, `CURRENCY_NAME`, `RATE`) VALUES
(7, 'pqr123B', 'ABC DERZ', 101);

-- --------------------------------------------------------

--
-- Table structure for table `currency_user`
--

CREATE TABLE `currency_user` (
  `ID` int(11) NOT NULL,
  `CURRENCY_ID` int(11) NOT NULL,
  `USER_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `ID` int(20) NOT NULL,
  `QUESTION` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `ID` int(20) NOT NULL,
  `TR_CODE` varchar(400) NOT NULL,
  `FROM` varchar(50) DEFAULT NULL,
  `TO` varchar(50) DEFAULT NULL,
  `AMOUNT` double DEFAULT NULL,
  `HAPPENED_DATE_TIME` datetime(6) DEFAULT NULL,
  `STATUS` bit(50) NOT NULL,
  `DESCRIPTION` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`ID`, `TR_CODE`, `FROM`, `TO`, `AMOUNT`, `HAPPENED_DATE_TIME`, `STATUS`, `DESCRIPTION`) VALUES
(8, '2017-08-1808:58:15pm', '1234', '121', 5000, '2017-08-19 00:00:00.000000', b'101101011110101110110000101000000000000000000000000000000000000', 'transfered'),
(9, '2017-08-1809:05:47pm', '131', '121', 500, '2017-08-19 00:00:00.000000', b'101101011110101110110000101000000000000000000000000000000000000', 'transfered');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(20) NOT NULL,
  `USERNAME` varchar(50) NOT NULL,
  `PASSWORD` varchar(50) NOT NULL,
  `EMAIL` varchar(50) NOT NULL,
  `USERTYPE` bit(50) NOT NULL,
  `STATUS` bit(50) NOT NULL,
  `CREATED_AT` datetime(6) NOT NULL,
  `SECURITYID` int(20) NOT NULL,
  `SECURITYANSWER` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `USERNAME`, `PASSWORD`, `EMAIL`, `USERTYPE`, `STATUS`, `CREATED_AT`, `SECURITYID`, `SECURITYANSWER`) VALUES
(1, 'ASD', '20cf2ed092a129e18f19067db410b697', 'drubokarim@outlook.com', b'101101011110101110110000101000000000000000000000000000000000000', b'101101011110101110110000101000000000000000000000000000000000000', '2017-08-19 00:00:00.000000', 1, '2557f5bc793432846baf4f54a2d81c49'),
(2, 'TKD', '25f9e794323b453885f5181f1b624d0b', 'amtouhidulkarimdrubo@gmail.com', b'101101011110101110110000101000000000000000000000000000000000000', b'101101011110101110110000101000000000000000000000000000000000000', '2017-08-19 00:00:00.000000', 1, '48d6215903dff56238e52e8891380c8f');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `ID` int(20) NOT NULL,
  `USERID` int(20) NOT NULL,
  `FIRSTNAME` varchar(100) DEFAULT NULL,
  `LASTNAME` varchar(100) DEFAULT NULL,
  `DOB` varchar(400) DEFAULT NULL,
  `PHONE` varchar(14) DEFAULT NULL,
  `ADDRESS` varchar(700) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`ID`, `USERID`, `FIRSTNAME`, `LASTNAME`, `DOB`, `PHONE`, `ADDRESS`) VALUES
(1, 1, 'A M Touhidul Karim', 'Drubo', '1January1997', '01620174033', 'AAAAA,AAAAA,1230,Bangladesh'),
(2, 2, 'A M Touhidul Karim', 'Drubo', '1January1997', '01620174033', 'AAAAA,AAAAA,1245,Bangladesh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `UNIQUE` (`ACCOUNT_NUMBER`);

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `CURRENCY_CODE` (`CURRENCY_CODE`);

--
-- Indexes for table `currency_user`
--
ALTER TABLE `currency_user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `UNIQUE` (`TR_CODE`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `currency_user`
--
ALTER TABLE `currency_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
