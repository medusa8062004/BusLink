-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2024 at 03:44 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_buslink`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `admin_mail` varchar(200) NOT NULL,
  `admin_pass` varchar(10) NOT NULL,
  `admin_pic` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_mail`, `admin_pass`, `admin_pic`) VALUES
(144, 'krishna', 'kpb08062004@gmail.com', '1234567Aa@', 'Hotpot.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alert`
--

CREATE TABLE `tbl_alert` (
  `alert_id` int(11) NOT NULL,
  `alert_detail` varchar(200) NOT NULL,
  `route_id` int(11) NOT NULL,
  `alert_datetime` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `driver_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_alert`
--

INSERT INTO `tbl_alert` (`alert_id`, `alert_detail`, `route_id`, `alert_datetime`, `driver_id`) VALUES
(33, 'heavy Rain', 69, '2023-10-01 04:24:20.000000', 22),
(44, 'Bus given to Service', 99, '2023-12-08 20:56:24.000000', 49),
(45, 'Breakdown', 99, '2023-12-08 20:56:30.000000', 49),
(46, 'Heavy Rain', 99, '2023-12-08 20:57:31.000000', 49);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_assign`
--

CREATE TABLE `tbl_assign` (
  `assign_id` int(11) NOT NULL,
  `bus_id` int(11) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `route_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_assign`
--

INSERT INTO `tbl_assign` (`assign_id`, `bus_id`, `driver_id`, `route_id`) VALUES
(66, 115, 49, 99),
(67, 119, 54, 100),
(68, 124, 49, 99),
(69, 125, 54, 101),
(71, 125, 54, 100);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bus`
--

CREATE TABLE `tbl_bus` (
  `bus_id` int(11) NOT NULL,
  `bus_regno` int(11) NOT NULL,
  `bus_capacity` int(11) NOT NULL,
  `bus_image` varchar(200) NOT NULL,
  `bus_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_bus`
--

INSERT INTO `tbl_bus` (`bus_id`, `bus_regno`, `bus_capacity`, `bus_image`, `bus_time`) VALUES
(124, 1, 40, 'busimage4.webp', '07:00:00'),
(125, 2, 35, 'busimage3.webp', '08:00:00'),
(126, 3, 40, 'busimage2.jpeg', '07:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaints`
--

CREATE TABLE `tbl_complaints` (
  `cmp_id` int(11) NOT NULL,
  `cmp_title` varchar(100) NOT NULL,
  `cmp_content` varchar(200) NOT NULL,
  `driver_id` int(11) NOT NULL DEFAULT 0,
  `stureg_id` int(11) NOT NULL DEFAULT 0,
  `cmp_replay` varchar(200) NOT NULL,
  `cmp_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cmp_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_complaints`
--

INSERT INTO `tbl_complaints` (`cmp_id`, `cmp_title`, `cmp_content`, `driver_id`, `stureg_id`, `cmp_replay`, `cmp_date`, `cmp_status`) VALUES
(41, 'No Time', 'Good Content', 49, 0, '', '2023-10-31 10:41:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(200) NOT NULL,
  `dep_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `course_name`, `dep_id`) VALUES
(99, 'BBA', 70),
(101, 'MASTER OF COMMERCE AND MANAGEMENT', 71),
(102, 'B COM', 71),
(103, 'BCA', 72),
(104, 'M.Sc Computer Science', 72),
(105, 'B.Sc. Electronics', 73),
(106, 'B A Hindi', 75),
(107, 'B A English  with Journalism', 74);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `dep_id` int(11) NOT NULL,
  `dep_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`dep_id`, `dep_name`) VALUES
(70, 'Bussiness Administartion'),
(71, 'Commerce'),
(72, 'ComputerApplications'),
(73, 'Electronics'),
(74, 'English'),
(75, 'Hindi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `dis_id` int(11) NOT NULL,
  `dis_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`dis_id`, `dis_name`) VALUES
(25, 'Kasaragod'),
(26, 'Kannur'),
(27, 'Wayanad'),
(28, 'Kozhikode'),
(29, 'Malappuram'),
(30, 'Palakkad'),
(31, 'Thrissur'),
(32, 'Ernakulam'),
(33, 'Idukki'),
(34, 'Kottayam'),
(35, 'Alappuzha'),
(36, 'Pathanamtitta'),
(37, 'Kollam'),
(39, 'Thiruvanantapuram');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_driver`
--

CREATE TABLE `tbl_driver` (
  `driver_id` int(11) NOT NULL,
  `driver_name` varchar(200) NOT NULL,
  `driver_mail` varchar(100) NOT NULL,
  `driver_phone` varchar(11) NOT NULL,
  `driver_license` varchar(100) NOT NULL,
  `driver_exp` int(11) NOT NULL,
  `driver_pass` varchar(10) NOT NULL,
  `place_id` int(11) NOT NULL,
  `d_status` int(11) NOT NULL DEFAULT 0,
  `driver_pic` varchar(200) NOT NULL,
  `noti_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_driver`
--

INSERT INTO `tbl_driver` (`driver_id`, `driver_name`, `driver_mail`, `driver_phone`, `driver_license`, `driver_exp`, `driver_pass`, `place_id`, `d_status`, `driver_pic`, `noti_status`) VALUES
(49, 'Binu', 'krish08062004@gmail.com', '9544520477', 'KL089', 5, '12345678aA', 0, 1, '2022-11-19.png', 1),
(54, 'reji', 'krishnapriyab864@gmail.com', '9544520477', 'KL98866554', 5, 'Asdfg@123', 40, 1, '', 1),
(55, 'Vishnu', 'vishnubn777@gmail.com', '9539855983', 'KL67468364872', 3, '12345678aA', 40, 0, '', 1),
(56, 'Reji', 'sdjshdkjal9009@gmail.com', '9539855983', 'KL44073348929', 6, '123456789a', 36, 0, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feed_id` int(11) NOT NULL,
  `feed_content` varchar(200) NOT NULL,
  `stureg_id` int(11) NOT NULL DEFAULT 0,
  `driver_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `pay_id` int(11) NOT NULL,
  `stureg_id` int(11) NOT NULL,
  `pay_amount` varchar(10) NOT NULL,
  `pay_datetime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `pay_status` int(11) NOT NULL DEFAULT 0,
  `pay_month` varchar(50) NOT NULL,
  `bill_no` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`pay_id`, `stureg_id`, `pay_amount`, `pay_datetime`, `pay_status`, `pay_month`, `bill_no`) VALUES
(272, 87, '2000', '2023-12-08 18:38:26', 1, 'September', '202312012'),
(273, 87, '2000', '2023-12-08 18:43:55', 1, 'August', '202312013'),
(274, 87, '2000', '2023-12-08 19:05:17', 1, 'November', '202312014'),
(275, 87, '2000', '2023-12-08 19:06:22', 1, 'October', '202312015'),
(276, 87, '2000', '2023-12-08 20:10:24', 1, 'December', '202312016'),
(277, 87, '2000', '2023-12-08 20:14:24', 1, 'July', '202312017'),
(278, 87, '2000', '2023-12-08 20:18:17', 1, 'July', '202312018'),
(279, 87, '2000', '2023-12-08 20:25:13', 1, 'January', '202312019'),
(280, 87, '2000', '2023-12-08 20:32:08', 1, 'January', '202312020'),
(281, 87, '2000', '2023-12-08 20:37:04', 1, 'January', '202312021'),
(282, 87, '2000', '2023-12-08 20:41:39', 1, 'February', '202312022'),
(283, 89, '2000', '2023-12-08 20:48:43', 1, 'January', '202312023'),
(284, 87, '2000', '2024-01-05 12:56:17', 1, 'January', '202401000'),
(285, 88, '2000', '2024-01-05 13:01:13', 1, 'January', '202401001'),
(286, 88, '2000', '2023-03-05 13:16:11', 1, 'January', '202303000'),
(287, 88, '2000', '2024-01-05 13:25:59', 1, 'February', '202401000'),
(288, 88, '2000', '2024-01-05 13:30:42', 1, 'March', '202401001'),
(289, 88, '2000', '2024-01-05 13:34:00', 1, 'April', '202401002'),
(290, 88, '2000', '2024-01-05 13:35:31', 1, 'May', '202401003'),
(291, 88, '2000', '2024-01-05 13:50:02', 1, 'June', '202401004'),
(292, 88, '2000', '2024-01-05 13:53:17', 1, 'July', '202401005'),
(293, 92, '2000', '2024-01-05 13:58:00', 1, 'January', '202401006');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(200) NOT NULL,
  `dis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `dis_id`) VALUES
(11, 'kothamangalam', 20),
(14, 'vellore', 18),
(16, 'kothamangalam', 20),
(17, 'Talakkod', 11),
(36, 'kattapana', 25),
(40, 'kothamangalam', 32);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_route`
--

CREATE TABLE `tbl_route` (
  `route_id` int(11) NOT NULL,
  `source_name` varchar(100) NOT NULL,
  `desti_name` varchar(100) NOT NULL,
  `route_rate` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_route`
--

INSERT INTO `tbl_route` (`route_id`, `source_name`, `desti_name`, `route_rate`) VALUES
(99, 'Piravom', 'Kothamangalam', '2000'),
(100, 'Piravom', 'Eranakulam', '3000'),
(101, 'Piravom', 'Pala', '1800');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stdstp`
--

CREATE TABLE `tbl_stdstp` (
  `stdstp_id` int(11) NOT NULL,
  `stureg_id` int(11) NOT NULL,
  `stop_id` int(11) NOT NULL,
  `noti_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stdstp`
--

INSERT INTO `tbl_stdstp` (`stdstp_id`, `stureg_id`, `stop_id`, `noti_status`) VALUES
(151, 70, 62, 2),
(152, 84, 75, 2),
(154, 88, 70, 2),
(155, 87, 70, 1),
(156, 89, 63, 1),
(157, 92, 70, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stop`
--

CREATE TABLE `tbl_stop` (
  `stop_id` int(11) NOT NULL,
  `stop_name` varchar(200) NOT NULL,
  `route_id` int(11) NOT NULL,
  `stp_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_stop`
--

INSERT INTO `tbl_stop` (`stop_id`, `stop_name`, `route_id`, `stp_no`) VALUES
(62, 'Onakkur', 99, 1),
(63, 'Anchalpetty', 99, 2),
(64, 'Pampakkuda', 99, 3),
(65, 'Muvattupuzha', 99, 4),
(66, 'Kakkadasseri', 99, 5),
(67, 'Ambalappadi', 99, 6),
(68, 'Kothamangalam', 99, 7),
(69, 'Mulanturuthy', 100, 1),
(70, 'Kalamassery', 100, 2),
(71, 'Kakkanad', 100, 3),
(75, 'Pala', 101, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_studentreg`
--

CREATE TABLE `tbl_studentreg` (
  `stureg_id` int(11) NOT NULL,
  `stu_name` varchar(200) NOT NULL,
  `stu_mail` varchar(50) NOT NULL,
  `stu_dob` varchar(10) NOT NULL,
  `stu_gen` char(10) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `stu_year` int(11) NOT NULL,
  `stu_city` varchar(100) NOT NULL,
  `stu_pin` varchar(10) NOT NULL,
  `stu_house` varchar(100) NOT NULL,
  `place_id` int(11) NOT NULL,
  `stu_roll` int(11) NOT NULL,
  `stu_contact` varchar(10) NOT NULL,
  `stu_gname` varchar(100) NOT NULL,
  `stu_gcon` varchar(10) NOT NULL,
  `stu_pass` varchar(100) NOT NULL,
  `stud_status` int(11) NOT NULL DEFAULT 0,
  `stu_pic` varchar(500) NOT NULL,
  `noti_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_studentreg`
--

INSERT INTO `tbl_studentreg` (`stureg_id`, `stu_name`, `stu_mail`, `stu_dob`, `stu_gen`, `dep_id`, `stu_year`, `stu_city`, `stu_pin`, `stu_house`, `place_id`, `stu_roll`, `stu_contact`, `stu_gname`, `stu_gcon`, `stu_pass`, `stud_status`, `stu_pic`, `noti_status`) VALUES
(87, 'girija', 'priya08062004@gmail.com', '1967-05-26', 'female', 67, 2, 'kothamangalam', '686691', 'ushas', 40, 234567, '9544520477', 'Fathima', '8921380791', '123456aA@', 1, '', 1),
(90, 'Raghi', 'kgdhey8062004@gmail.com', '2023-12-01', 'female', 73, 2023, 'Asamannur(p.o)', '686789', 'Putthanpura (h)', 40, 78, '9544520673', 'Sharon', '5435678967', '12345678!@##', 0, 'passport_size.jpg', 1),
(91, 'Rahul', 'aradhya123@gmail.com', '2003-12-13', 'female', 72, 2024, 'Nellimattom(p.o)', '565655', 'Koikkakudi (h)', 40, 78, '9887786737', 'Bijiu', '9846935816', '12333346564A12', 0, 'PAN CARD(1).jpg', 1),
(92, 'krishna', 'kpb08062004@gmail.com', '2024-01-09', 'male', 72, 2024, 'Thrikkariyoor(p.o)', '686692', 'Madavanakkudi (h)', 40, 89, '9544520673', 'lashiya', '7878654400', '123456789aA@', 1, 'WhatsApp Image 2023-12-29 at 15.42.08_b184df2f.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_alert`
--
ALTER TABLE `tbl_alert`
  ADD PRIMARY KEY (`alert_id`);

--
-- Indexes for table `tbl_assign`
--
ALTER TABLE `tbl_assign`
  ADD PRIMARY KEY (`assign_id`);

--
-- Indexes for table `tbl_bus`
--
ALTER TABLE `tbl_bus`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indexes for table `tbl_complaints`
--
ALTER TABLE `tbl_complaints`
  ADD PRIMARY KEY (`cmp_id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`dep_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`dis_id`);

--
-- Indexes for table `tbl_driver`
--
ALTER TABLE `tbl_driver`
  ADD PRIMARY KEY (`driver_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feed_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`pay_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_route`
--
ALTER TABLE `tbl_route`
  ADD PRIMARY KEY (`route_id`);

--
-- Indexes for table `tbl_stdstp`
--
ALTER TABLE `tbl_stdstp`
  ADD PRIMARY KEY (`stdstp_id`);

--
-- Indexes for table `tbl_stop`
--
ALTER TABLE `tbl_stop`
  ADD PRIMARY KEY (`stop_id`);

--
-- Indexes for table `tbl_studentreg`
--
ALTER TABLE `tbl_studentreg`
  ADD PRIMARY KEY (`stureg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `tbl_alert`
--
ALTER TABLE `tbl_alert`
  MODIFY `alert_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_assign`
--
ALTER TABLE `tbl_assign`
  MODIFY `assign_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `tbl_bus`
--
ALTER TABLE `tbl_bus`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `tbl_complaints`
--
ALTER TABLE `tbl_complaints`
  MODIFY `cmp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `dis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `tbl_driver`
--
ALTER TABLE `tbl_driver`
  MODIFY `driver_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feed_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `pay_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=294;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_route`
--
ALTER TABLE `tbl_route`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT for table `tbl_stdstp`
--
ALTER TABLE `tbl_stdstp`
  MODIFY `stdstp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `tbl_stop`
--
ALTER TABLE `tbl_stop`
  MODIFY `stop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tbl_studentreg`
--
ALTER TABLE `tbl_studentreg`
  MODIFY `stureg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
