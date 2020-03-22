-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2020 at 02:36 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patient_controler`
--

-- --------------------------------------------------------

--
-- Table structure for table `patient_info`
--

CREATE TABLE `patient_info` (
  `id` int(11) NOT NULL,
  `patient_ip` varchar(15) DEFAULT NULL,
  `f_name` varchar(40) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `phone` varchar(30) DEFAULT NULL,
  `bed_no` varchar(40) DEFAULT NULL,
  `pr_address` varchar(30) DEFAULT NULL,
  `pe_address` varchar(40) DEFAULT NULL,
  `first_medicine_name` varchar(40) DEFAULT NULL,
  `first_medicine_time` varchar(40) DEFAULT NULL,
  `second_medicine_name` varchar(40) DEFAULT NULL,
  `second_medicine_time` varchar(40) DEFAULT NULL,
  `third_medicine_name` varchar(40) DEFAULT NULL,
  `third_medicine_time` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_info`
--

INSERT INTO `patient_info` (`id`, `patient_ip`, `f_name`, `email`, `phone`, `bed_no`, `pr_address`, `pe_address`, `first_medicine_name`, `first_medicine_time`, `second_medicine_name`, `second_medicine_time`, `third_medicine_name`, `third_medicine_time`) VALUES
(1, 'Patient01', 'Md Shahed Talukder', 'shahedtalukder51@gmail.com', '01762178238', '01', 'Adalot Para, Tangail', 'Khagan Bazar, Ashulia, Dhaka', 'Napa Extra', '08:45', 'Flazil', '12:06', 'Matril', '18:56'),
(2, 'Patient02', 'Md Azad Miah', 'azad357@gmail.com', '01762345624', '02', 'Dotto Para. Dhaka', 'Fulki Jhonjhonia, Kashil, Bot Tola, Tang', 'Napa Extra', '08:45', 'Matril', '12:45', 'Flazil', '17:10'),
(3, 'Patient03', 'Md Ashik Mia', 'ashik56@gmail.com', '01762345624', '02', 'Dotto Para. Dhaka', 'Fulki Jhonjhonia, Kashil, Bot Tola, Tang', 'Napa Extra', '08:45', 'Matril', '12:45', 'Flazil', '16:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'shahedtalukder51', '$2y$10$UAilXIv3vn57i/ndgg2rW.zJqFHUDQQr6UFeV/ZrWOrkgW9d6byeG', '2020-03-19 23:05:29'),
(2, 'shahed', '$2y$10$XPJAq.apTn15ws8tx1t10ueZTdQSPcPPKYfL2ZbMFDOA70aJfdS3i', '2020-03-19 23:12:58'),
(3, 'take', '$2y$10$4Hnn9woPotwU63DKZBpexexpTRRkuLBVhQu7n/UgQbd0xAU0SYzhG', '2020-03-19 23:13:33');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patient_info`
--
ALTER TABLE `patient_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient_info`
--
ALTER TABLE `patient_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
