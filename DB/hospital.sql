-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2021 at 08:06 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `admin_email`, `admin_password`, `admin_phone`) VALUES
(7, 'Admin', 'admin@gmail.com', 'admin1234', '0770770778'),
(14, 'admin2', 'admin2@gmail.com', 'admin1234', '0790790799');

-- --------------------------------------------------------

--
-- Table structure for table `apointments`
--

CREATE TABLE `apointments` (
  `id` int(255) NOT NULL,
  `doctor_id` int(255) DEFAULT NULL,
  `patient_id` int(255) NOT NULL,
  `Date` date DEFAULT NULL,
  `starting_time` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `apointment_time` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apointments`
--

INSERT INTO `apointments` (`id`, `doctor_id`, `patient_id`, `Date`, `starting_time`, `end_time`, `apointment_time`) VALUES
(34, 5, 72, '2021-01-06', NULL, NULL, '10:00 AM to 10:30 AM'),
(36, 2, 74, '2021-01-06', NULL, NULL, '11:30 AM to 12:00 PM'),
(37, 2, 72, '2021-01-06', NULL, NULL, '12:00 PM to 12:30 PM'),
(38, 2, 75, '2021-01-06', NULL, NULL, '9:30 AM to 10:00 AM');

-- --------------------------------------------------------

--
-- Table structure for table `apointments_requests`
--

CREATE TABLE `apointments_requests` (
  `id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `ssn` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `doctor_id` int(255) DEFAULT NULL,
  `status` tinyint(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apointments_requests`
--

INSERT INTO `apointments_requests` (`id`, `fname`, `lname`, `ssn`, `dob`, `phone`, `address`, `gender`, `doctor_id`, `status`) VALUES
(20, 'test', 'test', '99999', '2021-01-05', '07807807808', 'amman', 'Male', 5, 1),
(21, 'test2', 'test2', '55555', '2222-02-12', '0780780788', 'amman', 'Male', 2, 1),
(22, 'ali', 'omar', '456456456', '2021-01-05', '0780780788', 'Amman', 'Male', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `diagnostics`
--

CREATE TABLE `diagnostics` (
  `id` int(255) NOT NULL,
  `doctor_id` int(255) DEFAULT NULL,
  `patient_id` int(255) NOT NULL,
  `diagnostics` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diagnostics`
--

INSERT INTO `diagnostics` (`id`, `doctor_id`, `patient_id`, `diagnostics`) VALUES
(7, 2, 74, ' test test test testtesttest test test  test test test testtesttest test test   test test test testtesttest test test '),
(8, 2, 75, 'test test test');

-- --------------------------------------------------------

--
-- Table structure for table `diseases`
--

CREATE TABLE `diseases` (
  `id` int(255) NOT NULL,
  `dis_name` varchar(255) NOT NULL,
  `dis_symptoms` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `diseases`
--

INSERT INTO `diseases` (`id`, `dis_name`, `dis_symptoms`) VALUES
(3, 'Heart problem', ' test2 test2 test2 test2 test2 test2 test2 test2 test2  test2 test2 test2 test2 test2 test2 test2 test2 test2   test2 test2 test2 test2 test2 test2 test2 test2 test2 '),
(4, 'Diseases', 'Diseases Diseases Diseases Diseases Diseases Diseases Diseases Diseases Diseases Diseases Diseases Diseases Diseases Diseases Diseases Diseases');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(255) NOT NULL,
  `doc_name` varchar(255) NOT NULL,
  `doc_major` varchar(255) NOT NULL,
  `doc_phone` varchar(255) DEFAULT NULL,
  `working_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `doc_name`, `doc_major`, `doc_phone`, `working_time`) VALUES
(2, 'Doctor1', 'test', '0780780788', '09:00-18:00'),
(5, 'test', 'test', '0780780788', '16:00-21:00'),
(6, 'test', 'test', '07807807878', '09:09-22:00');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `name`, `email`, `phone`, `message`) VALUES
(1, 'abed', 'abed@gmail.com', '0780780788', 'Nice Clinic'),
(3, 'test', 'test@gmail.com', '0799887795', 'dasdas'),
(4, 'abed', 'ghr@gmail.com', '0790790799', 'teesssttt');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(255) NOT NULL,
  `pat_fname` varchar(255) NOT NULL,
  `pat_lname` varchar(255) NOT NULL,
  `ssn` varchar(255) DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `pat_phone` varchar(15) NOT NULL,
  `pat_address` varchar(255) NOT NULL,
  `pat_gender` varchar(20) NOT NULL,
  `register_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `pat_fname`, `pat_lname`, `ssn`, `date_of_birth`, `pat_phone`, `pat_address`, `pat_gender`, `register_date`) VALUES
(72, 'test', 'test', '99999', '2021-01-05', '07807807808', 'amman', 'Male', '2021-01-05'),
(74, 'test2', 'test2', '55555', '2222-02-12', '0780780788', 'amman', 'Male', '2021-01-05'),
(75, 'ali', 'omar', '456456456', '2021-01-05', '0780780788', 'Amman', 'Male', '2021-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(255) NOT NULL,
  `report` text NOT NULL,
  `pat_id_req` int(255) DEFAULT NULL,
  `pat_id` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `apointments`
--
ALTER TABLE `apointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_FK` (`doctor_id`),
  ADD KEY `patient_FK` (`patient_id`);

--
-- Indexes for table `apointments_requests`
--
ALTER TABLE `apointments_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctor_id_FK` (`doctor_id`);

--
-- Indexes for table `diagnostics`
--
ALTER TABLE `diagnostics`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctorID_FK` (`doctor_id`),
  ADD KEY `patientID_FK` (`patient_id`);

--
-- Indexes for table `diseases`
--
ALTER TABLE `diseases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ssn` (`ssn`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pat_req_FK` (`pat_id_req`),
  ADD KEY `pat_FK` (`pat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `apointments`
--
ALTER TABLE `apointments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `apointments_requests`
--
ALTER TABLE `apointments_requests`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `diagnostics`
--
ALTER TABLE `diagnostics`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `diseases`
--
ALTER TABLE `diseases`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apointments`
--
ALTER TABLE `apointments`
  ADD CONSTRAINT `doctor_FK` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `patient_FK` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `apointments_requests`
--
ALTER TABLE `apointments_requests`
  ADD CONSTRAINT `doctor_id_FK` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `diagnostics`
--
ALTER TABLE `diagnostics`
  ADD CONSTRAINT `doctorID_FK` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `patientID_FK` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `pat_FK` FOREIGN KEY (`pat_id`) REFERENCES `patient` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pat_req_FK` FOREIGN KEY (`pat_id_req`) REFERENCES `apointments_requests` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
