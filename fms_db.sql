-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 08:13 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fms_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `addcar`
--

CREATE TABLE `addcar` (
  `Car_Type` varchar(200) NOT NULL,
  `Car_Name` varchar(200) NOT NULL,
  `Car_Model` varchar(200) NOT NULL,
  `Registration_Number` varchar(200) NOT NULL,
  `Chassis_Number` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addcar`
--

INSERT INTO `addcar` (`Car_Type`, `Car_Name`, `Car_Model`, `Registration_Number`, `Chassis_Number`) VALUES
('Sedan', 'Toyota', 'Alion-2010', '117185', 'ASDF1234'),
('Sedan1', 'Toyota1', 'Alion-20101', '1171851', 'ASDF12341'),
('Sedan12', 'Toyota11', 'Alion-20101', '1171853', 'ASDF12341');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Name` varchar(300) NOT NULL,
  `Phone` varchar(300) NOT NULL,
  `Email` varchar(300) NOT NULL,
  `Username` varchar(300) NOT NULL,
  `Password` varchar(300) NOT NULL,
  `Image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Name`, `Phone`, `Email`, `Username`, `Password`, `Image`) VALUES
('Zahid Hasan', '+8801521218101', 'sfsdf@gmail', 'zahid2111', 'zaq1', ''),
('Towsif Muhtadi Khan', '01711353028', 'towsifkhan98@gmail.com', 'towsifkhan98@gmail.com', 'Asdf1234', ''),
('Zahid Hasan', '+8801521218101', 'zahid.hasan.1911509642@gmail.com', 'zahid2000', 'zaq1', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addcar`
--
ALTER TABLE `addcar`
  ADD PRIMARY KEY (`Registration_Number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
