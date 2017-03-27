-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2017 at 09:51 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hackboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `aid` int(11) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `school` varchar(128) DEFAULT NULL,
  `age` tinyint(4) NOT NULL,
  `gender` varchar(32) DEFAULT NULL,
  `size` tinyint(4) NOT NULL,
  `major` varchar(128) DEFAULT NULL,
  `resume` varchar(128) DEFAULT NULL,
  `website` varchar(128) DEFAULT NULL,
  `hacks` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`aid`, `firstname`, `lastname`, `email`, `phone`, `school`, `age`, `gender`, `size`, `major`, `resume`, `website`, `hacks`, `status`, `uid`) VALUES
(3, 'Daniel', 'Lucia', 'daniel_lucia22@hotmail.com', '4166166498', 'Queen''s University', 20, 'male', 3, 'Computer Science', 'https://www.resume.ca/Daniel', 'http://daniellucia.ca/', 3, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eid` int(11) NOT NULL,
  `pid` int(11) DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  `ename` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `timestart` datetime NOT NULL,
  `timeend` datetime NOT NULL,
  `location` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eid`, `pid`, `sid`, `ename`, `description`, `timestart`, `timeend`, `location`) VALUES
(1, 1, 1, 'Google Time Challenge', 'Code hello world in any language in 10 seconds.', '2017-02-15 00:00:00', '2017-02-15 00:00:00', 'Jeffery Hall 201');

-- --------------------------------------------------------

--
-- Table structure for table `prizes`
--

CREATE TABLE `prizes` (
  `pid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `pname` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `obtain` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `prizes`
--

INSERT INTO `prizes` (`pid`, `sid`, `pname`, `description`, `obtain`) VALUES
(1, 1, 'Google Cardboard', 'A virtual reality device.', 'You can obtain this by winning the google time challenge event.');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `sid` int(11) NOT NULL,
  `fname` varchar(128) NOT NULL,
  `lname` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `donationAmount` int(11) NOT NULL,
  `donationRecieved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`sid`, `fname`, `lname`, `email`, `phone`, `donationAmount`, `donationRecieved`) VALUES
(1, 'Matthew', 'Pollack', 'matt.email@gmail.com', '4754754485', 10, 0),
(5, 'Rob', 'John', 'robjohn@gmail.com', '1111111111', 100, 0),
(6, 'Rob', 'John', 'robjohn@gmail.com', '1111111111', 100, 0),
(8, 'Rob', 'John', 'robjohn@gmail.com', '1111111111', 100, 0),
(9, 'Rob', 'John', 'robjohn@gmail.com', '1111111111', 100, 0),
(11, 'Rob', 'John', 'robjohn@gmail.com', '1111111111', 100, 0),
(13, 'Rob', 'John', 'robjohn@gmail.com', '1111111111', 100, 0),
(14, 'Rob', 'John', 'robjohn@gmail.com', '1111111111', 100, 0),
(15, 'Rob', 'John', 'robjohn@gmail.com', '1111111111', 100, 0),
(16, 'Rob', 'John', 'robjohn@gmail.com', '1111111111', 100, 0),
(18, 'Rob', 'John', 'robjohn@gmail.com', '1111111111', 100, 0),
(19, 'Rob', 'John', 'robjohn@gmail.com', '1111111111', 100, 0),
(20, 'Rob', 'John', 'robjohn@gmail.com', '1111111111', 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `fname` varchar(128) NOT NULL,
  `lname` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `fname`, `lname`, `email`, `phone`, `position`) VALUES
(1, 'Michael', 'Wilson', 'mike.wils@gmail.com', '9057177711', 'co-chair');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`eid`),
  ADD KEY `pid` (`pid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `prizes`
--
ALTER TABLE `prizes`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `sid` (`sid`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `prizes`
--
ALTER TABLE `prizes`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `applications`
--
ALTER TABLE `applications`
  ADD CONSTRAINT `applications_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `users` (`uid`);

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `prizes` (`pid`),
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`sid`) REFERENCES `sponsors` (`sid`);

--
-- Constraints for table `prizes`
--
ALTER TABLE `prizes`
  ADD CONSTRAINT `prizes_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `sponsors` (`sid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
