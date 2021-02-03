-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 12, 2020 at 01:07 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `LT_DB`
--
CREATE DATABASE IF NOT EXISTS `LT_DB` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `LT_DB`;

-- --------------------------------------------------------

--
-- Table structure for table `flight`
--

CREATE TABLE `flight` (
  `bookingNum` int(11) NOT NULL,
  `passInfo` varchar(1023) NOT NULL,
  `flightInfo` varchar(1023) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `flight`
--

INSERT INTO `flight` (`bookingNum`, `passInfo`, `flightInfo`, `username`) VALUES
(4, ' $Ali$|$$Waleed$$|$$$alahmady$$$|&Saudi Arabia&|&&Male&&|&&&10/02/1977&&&|%12315468798798%|%%12/10/2023%%', '<-Saudi Arabia<-|->America->|%443276%|%%09/04/2020%%|%%%10:30 PM%%%|*13*|**35**', 'mohammed'),
(5, '$dsa$|$$dsa$$|$$$das$$$|#321#|##0001-01-01##|&afghan&|&&male&&|&&&0001-01-01&&&|', '|<-32<-|->321->|%VF652%|%%0011-11-01%%|%%%01:11%%%|*916*|**588**|', 'GUEST'),
(6, '|$Hamad$|$$Yousef$$|$$$AlAjaji$$$|#321321234#|##1111-11-11##|&afghan&|&&male&&|&&&0111-01-11&&&|', '|<-Saudi Arabia<-|->United Kingdom->|%VO695%|%%1233-02-01%%|%%%12:32%%%|*308*|**991**|', 'GUEST'),
(7, '|$Hamad$|$$Yousef$$|$$$AlAjaji$$$|#321321234#|##1111-11-11##|&afghan&|&&M&&|&&&0111-01-11&&&|', '|<-Saudi Arabia<-|->United Kingdom->|%AO648%|%%1233-02-01%%|%%%12:32%%%|*091*|**796**|', 'GUEST'),
(8, '|$Abduaza$|$$sdadsa$$|$$$dsadsa$$$|#321332422#|##3321-03-12##|&afghan&|&&M&&|&&&0111-02-11&&&|', '|<-Damma<-|->dSAa asda->|%RR411%|%%0332-02-01%%|%%%12:33%%%|*830*|**574**|', 'GUEST');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(255) NOT NULL,
  `passportInfo` varchar(1023) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `passportInfo`, `email`) VALUES
('GUEST', '$das$|$$d$$|$$$d$$$|#321#|##0002-02-02##|&afghan&|&&male&&|&&&0002-02-02&&&|', '2@222.22'),
('mohammed', ' $Ali$|$$Waleed$$|$$$alahmady$$$|&Saudi Arabia&|&&Male&&|&&&10/02/1977&&&|%12315468798798%|%%12/10/2023%%', 'mohammed@gamil.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flight`
--
ALTER TABLE `flight`
  ADD PRIMARY KEY (`bookingNum`),
  ADD KEY `user_idx` (`username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flight`
--
ALTER TABLE `flight`
  MODIFY `bookingNum` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
