-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2024 at 01:01 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frams`
--

-- --------------------------------------------------------

--
-- Table structure for table `lectures`
--

CREATE TABLE `lectures` (
  `subject` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lectures`
--

INSERT INTO `lectures` (`subject`, `date`) VALUES
('Cloud Computing', '01/01/2024'),
('Machine Learning', '01/01/2024'),
('Data Science', '01/01/2024'),
('Web Technology', '01/01/2024'),
('Cloud Computing', '02/01/2024'),
('Web Technology', '02/01/2024'),
('Data Science', '02/01/2024'),
('Machine Learning', '02/01/2024'),
('Machine Learning', '03/01/2024'),
('Machine Learning', '04/01/2024'),
('Cloud Computing', '03/01/2024'),
('Cloud Computing', '03/01/2024'),
('Web Technology', '03/01/2024'),
('Web Technology', '03/01/2024'),
('Cloud Computing', '20/01/2024'),
('Cloud Computing', '22/01/2024'),
('Machine Learning', '22/01/2024'),
('Machine Learning', '23/01/2024'),
('Machine Learning', '24/01/2024'),
('Web Technology', '24/01/2024'),
('Web Technology', '22/01/2024');

-- --------------------------------------------------------

--
-- Table structure for table `om`
--

CREATE TABLE `om` (
  `subject` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `om`
--

INSERT INTO `om` (`subject`, `date`) VALUES
('Machine Learning', '02/01/2024'),
('Machine Learning', '01/01/2024'),
('Cloud Computing', '01/01/2024'),
('Web Technology', '01/01/2024'),
('Web Technology', '02/01/2024'),
('Cloud Computing', '03/01/2024');

-- --------------------------------------------------------

--
-- Table structure for table `sai`
--

CREATE TABLE `sai` (
  `subject` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sai`
--

INSERT INTO `sai` (`subject`, `date`) VALUES
('Data Science', '02/01/2024'),
('Data Science', '01/01/2024'),
('Web Technology', '01/01/2024'),
('Machine Learning', '03/01/2024'),
('Machine Learning', '03/01/2024'),
('Machine Learning', '03/01/2024'),
('Machine Learning', '03/01/2024'),
('Cloud Computing', '03/01/2024'),
('Cloud Computing', '03/01/2024'),
('Cloud Computing', '03/01/2024'),
('Web Technology', '03/01/2024'),
('Web Technology', '03/01/2024');

-- --------------------------------------------------------

--
-- Table structure for table `studentdetails`
--

CREATE TABLE `studentdetails` (
  `id` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `branch` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentdetails`
--

INSERT INTO `studentdetails` (`id`, `password`, `name`, `branch`, `year`, `email`) VALUES
('om', 'om', 'Om Dagade', 'Computer', 'BE', 'omdagade9325@gmail.com'),
('sai', 'sai', 'Sai Jagdale', 'Computer', 'BE', 'omdagade13@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
