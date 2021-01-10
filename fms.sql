-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2019 at 06:44 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fms`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `cls_id` int(11) NOT NULL,
  `cls_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`cls_id`, `cls_name`) VALUES
(1, 'Matric'),
(2, '1st Year'),
(3, '2nd Year'),
(4, 'b.com part 1'),
(5, 'seven');

-- --------------------------------------------------------

--
-- Table structure for table `class_fees`
--

CREATE TABLE `class_fees` (
  `grp_id` int(11) NOT NULL,
  `cls_id` int(11) NOT NULL,
  `cls_fees` bigint(20) NOT NULL,
  `grp_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_fees`
--

INSERT INTO `class_fees` (`grp_id`, `cls_id`, `cls_fees`, `grp_name`) VALUES
(1, 8, 352, 'Computer Science'),
(3, 9, 4000, 'Pre-Engineering'),
(4, 9, 4000, 'Commerce'),
(6, 11, 500, 'Commerce'),
(7, 12, 5000, 'Pre-Engineering'),
(8, 1, 500, 'Computer Science'),
(9, 1, 800, 'Pre-Medical'),
(10, 2, 2000, 'Commerce'),
(11, 2, 3000, 'Pre-Medical'),
(12, 4, 5000, 'Commerce'),
(13, 5, 777, 'Computer Science'),
(14, 2, 700, 'Computer Science'),
(15, 1, 900, 'Commerce'),
(16, 1, 2000, 'Pre-Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `fee_payment`
--

CREATE TABLE `fee_payment` (
  `fp_id` int(11) NOT NULL,
  `fp_std_id` int(4) NOT NULL,
  `fp_cls_id` int(11) NOT NULL,
  `fp_grp_id` int(11) NOT NULL,
  `fp_month` varchar(50) NOT NULL,
  `fp_year` varchar(50) NOT NULL,
  `fp_cls_grp_fee` float NOT NULL,
  `fp_paid_amount` float NOT NULL,
  `fp_balance_amount` float NOT NULL,
  `fp_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fee_payment`
--

INSERT INTO `fee_payment` (`fp_id`, `fp_std_id`, `fp_cls_id`, `fp_grp_id`, `fp_month`, `fp_year`, `fp_cls_grp_fee`, `fp_paid_amount`, `fp_balance_amount`, `fp_status`) VALUES
(1, 2, 1, 9, 'Jun', '2019', 800, 566, 0, 0),
(2, 3, 1, 8, 'Jul', '2019', 500, 500, 0, 1),
(3, 3, 1, 8, 'Aug', '2019', 500, 500, 0, 0),
(4, 3, 1, 8, 'Oct', '2019', 500, 200, 300, 0),
(5, 2, 1, 9, 'Aug', '2019', 800, 333, 467, 0),
(6, 2, 1, 9, 'Sep', '2019', 800, 666, 134, 0),
(7, 2, 1, 9, 'Dec', '2019', 800, 454, 346, 0),
(8, 3, 1, 8, 'May', '2019', 500, 422, 78, 0),
(9, 2, 1, 9, 'Feb', '2019', 800, 566, 234, 0),
(10, 2, 1, 9, 'Apr', '2019', 800, 345, 455, 0),
(11, 2, 1, 9, 'Jan', '2019', 800, 677, 123, 0),
(12, 2, 1, 9, 'Mar', '2019', 800, 555, 245, 0),
(13, 2, 1, 9, 'Jul', '2019', 800, 567, 0, 0),
(14, 2, 1, 9, 'Nov', '2019', 800, 300, 500, 0),
(15, 4, 1, 8, 'Sep', '2019', 500, 400, 100, 0),
(16, 5, 2, 10, 'Apr', '2019', 2000, 500, 1500, 0),
(17, 5, 2, 10, 'May', '2019', 2000, 500, 0, 0),
(18, 4, 1, 8, 'Oct', '2019', 500, 500, 0, 1),
(19, 6, 2, 11, 'Feb', '2019', 3000, 766, 2234, 0),
(20, 6, 2, 11, 'May', '2019', 3000, 766, 0, 0),
(21, 7, 1, 8, 'Jul', '2019', 500, 455, 45, 0),
(27, 8, 1, 8, 'Oct', '2019', 500, 400, 0, 0),
(29, 8, 1, 8, 'Aug', '2019', 500, 455, 45, 0),
(32, 9, 1, 8, 'May', '2019', 500, 500, 0, 1),
(33, 7, 1, 8, 'Jun', '2019', 500, 500, 0, 1),
(34, 7, 1, 8, 'Nov', '2019', 500, 55, 445, 0),
(35, 8, 1, 8, 'Nov', '2019', 500, 500, 0, 1),
(36, 8, 1, 8, 'Dec', '2019', 500, 400, 100, 0),
(37, 4, 1, 8, 'Feb', '2019', 500, 500, 0, 1),
(38, 4, 1, 8, 'Mar', '2019', 500, 300, 200, 0),
(39, 10, 1, 9, 'Aug', '2019', 800, 500, 300, 0),
(40, 11, 1, 8, 'Jun', '2019', 500, 500, 0, 1),
(41, 11, 1, 8, 'Sep', '2019', 500, 500, 0, 1),
(42, 5, 2, 10, 'Jun', '2019', 2000, 1500, 0, 0),
(43, 5, 2, 10, 'Nov', '2019', 2000, 1500, 0, 0),
(44, 5, 2, 10, 'Dec', '2019', 2000, 1500, 0, 0),
(45, 5, 2, 10, 'Aug', '2019', 2000, 1500, 0, 0),
(46, 3, 1, 8, 'Sep', '2019', 500, 5000, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `st_id` int(4) UNSIGNED ZEROFILL NOT NULL,
  `st_name` varchar(50) NOT NULL,
  `st_father_name` varchar(50) NOT NULL,
  `st_address` varchar(225) NOT NULL,
  `st_parents_phone_no` varchar(20) NOT NULL,
  `st_school_college` varchar(100) NOT NULL,
  `st_student_phone_no` varchar(20) NOT NULL,
  `st_gender` varchar(10) NOT NULL,
  `st_status` tinyint(4) NOT NULL,
  `st_religion` varchar(50) NOT NULL,
  `st_class_id` varchar(50) NOT NULL,
  `st_group` varchar(50) NOT NULL,
  `st_admission_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`st_id`, `st_name`, `st_father_name`, `st_address`, `st_parents_phone_no`, `st_school_college`, `st_student_phone_no`, `st_gender`, `st_status`, `st_religion`, `st_class_id`, `st_group`, `st_admission_date`) VALUES
(0002, 'zia hussain', 'Tariq siddiqui', 'L-1277 sector 4-a surjani town karachi', '03452661587', 'Sir syed degree college', '03442804658', 'M', 0, 'Islam', '2', '11', '2019-09-11'),
(0003, 'Talha hussain', 'Tariq siddiqui', 'L-1277 sector 4-a surjani town karachi', '03452661587', 'Surjani degree college', '03442804654', 'M', 0, 'Islam', '4', '12', '2019-09-25'),
(0004, 'Hina', 'Kashif', 'nazimavad karachi', '03452661587', 'Surjani degree college', '03442804658', 'F', 0, 'Islam', '1', '8', '2019-09-14'),
(0005, 'Asma Naz', 'Tariq siddiqui', 'L-1277 sector 4-a surjani town karachi', '03452661587', 'Lyari degree college', '03442804651', 'F', 0, 'Islam', '2', '10', '2019-09-11'),
(0006, 'Jamila khatoom', 'Tariq siddiqui', 'L-1277 sector 4-a surjani town karachi', '03452661587', 'Sir syed degree college', '03442804650', 'F', 0, 'Islam', '2', '11', '2019-09-13'),
(0007, 'Hina', 'Tariq siddiqui', 'L-1277 sector 4-a surjani town karachi', '03452661587', 'saddar degree college', '03442804650', 'F', 0, 'Islam', '1', '8', '2019-09-20'),
(0008, 'Asma Naz', 'Salahuddin', 'nazimavad karachi', '03452661587', 'Lyari degree college', '03442804658', 'F', 0, 'Islam', '1', '8', '2019-09-13'),
(0009, 'Talha hussain', 'Tariq siddiqui', 'L-1277 sector 4-a surjani town karachi', '03452661587', 'Lyari degree college', '03442804654', 'F', 0, 'Islam', '1', '8', '2019-09-26'),
(0010, 'Hina', 'Salahuddin', 'L-1277 sector 4-a surjani town karachi', '03452661587', 'Surjani degree college', '03442804658', 'F', 0, 'Hindu', '1', '9', '2019-09-07'),
(0011, 'Hina', 'Tariq siddiqui', 'nazimavad karachi', '03452661587', 'Sir syed degree college', '03442804651', 'F', 0, 'Islam', '1', '8', '2019-09-26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `us_id` int(11) NOT NULL,
  `us_name` varchar(50) NOT NULL,
  `us_email` varchar(50) NOT NULL,
  `us_password` varchar(50) NOT NULL,
  `us_registered` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`us_id`, `us_name`, `us_email`, `us_password`, `us_registered`) VALUES
(1, 'asmaa', 'sa;k;s@.com', '123456', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`cls_id`);

--
-- Indexes for table `class_fees`
--
ALTER TABLE `class_fees`
  ADD PRIMARY KEY (`grp_id`);

--
-- Indexes for table `fee_payment`
--
ALTER TABLE `fee_payment`
  ADD PRIMARY KEY (`fp_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`st_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`us_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `cls_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `class_fees`
--
ALTER TABLE `class_fees`
  MODIFY `grp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `fee_payment`
--
ALTER TABLE `fee_payment`
  MODIFY `fp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `st_id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `us_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
