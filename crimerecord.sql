-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2021 at 01:08 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crimerecord`
--

-- --------------------------------------------------------

--
-- Table structure for table `crime`
--

CREATE TABLE `crime` (
  `crime_id` int(10) NOT NULL,
  `crime_place` varchar(100) NOT NULL,
  `crime_date` date NOT NULL,
  `crime_type` text NOT NULL,
  `crime_desc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `criminal`
--

CREATE TABLE `criminal` (
  `criminal_id` int(15) NOT NULL,
  `criminal_fname` varchar(25) NOT NULL,
  `criminal_lname` varchar(25) NOT NULL,
  `criminal_sex` text NOT NULL,
  `criminal_DOB` date NOT NULL,
  `criminal_phno` varchar(10) NOT NULL,
  `criminal_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Triggers `criminal`
--
DELIMITER $$
CREATE TRIGGER `backup_criminal` AFTER INSERT ON `criminal` FOR EACH ROW INSERT INTO criminal_backup(criminal_fname,criminal_lname,criminal_phno) VALUES(NEW.criminal_fname,NEW.criminal_lname,NEW.criminal_phno)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `criminal_backup`
--

CREATE TABLE `criminal_backup` (
  `criminal_fname` varchar(25) NOT NULL,
  `criminal_lname` varchar(25) NOT NULL,
  `criminal_phno` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `criminal_backup`
--

INSERT INTO `criminal_backup` (`criminal_fname`, `criminal_lname`, `criminal_phno`) VALUES
('lol', 'balls', '7899877899'),
('light ', 'yagami', '6969585825'),
('baron', 'limca', '3030303030'),
('zombie', 'lord', '1234567890'),
('pratham', 'vk', '1111111111');

-- --------------------------------------------------------

--
-- Table structure for table `evidence`
--

CREATE TABLE `evidence` (
  `evidence_item` varchar(20) DEFAULT NULL,
  `evidence_desc` varchar(50) DEFAULT NULL,
  `crime_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `police`
--

CREATE TABLE `police` (
  `p_id` int(15) NOT NULL,
  `p_name` varchar(30) DEFAULT NULL,
  `p_phno` varchar(10) DEFAULT NULL,
  `p_job` varchar(20) DEFAULT NULL,
  `crime_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`id`, `username`, `Password`) VALUES
(2, 'testuser', 'testpass'),
(3, 'admin', '123');

-- --------------------------------------------------------

--
-- Table structure for table `victim`
--

CREATE TABLE `victim` (
  `victim_id` int(15) NOT NULL,
  `victim_name` varchar(30) DEFAULT NULL,
  `victim_gender` tinytext DEFAULT NULL,
  `victim_phno` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `victim`
--

INSERT INTO `victim` (`victim_id`, `victim_name`, `victim_gender`, `victim_phno`) VALUES
(550, 'rohan', 'male', '4444444444');

-- --------------------------------------------------------

--
-- Table structure for table `witness`
--

CREATE TABLE `witness` (
  `witness_name` varchar(30) DEFAULT NULL,
  `witness_phno` varchar(10) DEFAULT NULL,
  `crime_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crime`
--
ALTER TABLE `crime`
  ADD PRIMARY KEY (`crime_id`);

--
-- Indexes for table `criminal`
--
ALTER TABLE `criminal`
  ADD PRIMARY KEY (`criminal_id`);

--
-- Indexes for table `evidence`
--
ALTER TABLE `evidence`
  ADD KEY `evidence_ibfk_1` (`crime_id`);

--
-- Indexes for table `police`
--
ALTER TABLE `police`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `police_ibfk_1` (`crime_id`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `victim`
--
ALTER TABLE `victim`
  ADD PRIMARY KEY (`victim_id`);

--
-- Indexes for table `witness`
--
ALTER TABLE `witness`
  ADD KEY `witness_ibfk_1` (`crime_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `evidence`
--
ALTER TABLE `evidence`
  ADD CONSTRAINT `evidence_ibfk_1` FOREIGN KEY (`crime_id`) REFERENCES `crime` (`crime_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `police`
--
ALTER TABLE `police`
  ADD CONSTRAINT `police_ibfk_1` FOREIGN KEY (`crime_id`) REFERENCES `crime` (`crime_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `witness`
--
ALTER TABLE `witness`
  ADD CONSTRAINT `witness_ibfk_1` FOREIGN KEY (`crime_id`) REFERENCES `crime` (`crime_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
