-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2021 at 12:26 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `udm_clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `college_code` varchar(10) NOT NULL,
  `coll_desc` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`college_code`, `coll_desc`) VALUES
('CAS', 'College of Arts and Sciences'),
('CBAE', 'College of Business, Accountancy and Entrepreneurship'),
('CCJ', 'College of Crimminal Justice'),
('CE', 'College of Education'),
('CET', 'College of Engineering and Technology'),
('CHS', 'College of Health and Sciences'),
('CL', 'College of Law'),
('SHS', 'Senior High School');

-- --------------------------------------------------------

--
-- Table structure for table `consultation`
--

CREATE TABLE `consultation` (
  `student_no` varchar(10) NOT NULL,
  `illness_code` varchar(10) NOT NULL,
  `attending_physician` varchar(50) NOT NULL DEFAULT 'not consulted',
  `prepared_by` varchar(50) NOT NULL,
  `date_prepared` datetime NOT NULL,
  `date_consulted` datetime NOT NULL,
  `diagnosis` varchar(50) DEFAULT 'not consulted',
  `display` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `consultation`
--

INSERT INTO `consultation` (`student_no`, `illness_code`, `attending_physician`, `prepared_by`, `date_prepared`, `date_consulted`, `diagnosis`, `display`) VALUES
('19-63-010', 'Dtl1', 'Arra Reyes', ' Arra Reyes', '2021-08-03 02:04:51', '2021-08-03 02:05:05', 'asd', 'active'),
('19-63-010', 'Dtl1', 'Arra Reyes', 'Arra Reyes', '2021-08-09 21:46:20', '2021-08-09 21:46:29', 'consulted ni arra reyes', 'active'),
('19-63-010', 'Dtl1', 'Arra Reyes', 'Arra Reyes', '2021-08-09 21:46:25', '2021-08-09 21:46:33', 'consulted ni arra reyes', 'active'),
('19-63-010', 'Dtl1', 'atienza francis', 'atienza francis', '2021-08-09 22:19:34', '2021-08-09 22:21:14', 'consulted ni arr', 'active'),
('19-63-010', 'Dtl1', 'atienza francis', 'atienza francis', '2021-08-10 12:30:44', '2021-08-10 12:59:04', 'atienza francis', 'active'),
('19-63-010', 'Dtl2', 'atienza francis', ' atienza francis', '2021-08-03 02:09:20', '2021-08-03 02:09:24', 'asdasd', 'active'),
('19-63-010', 'Dtl2', 'not consulted', '', '2021-08-09 20:52:13', '2021-08-09 21:12:10', '123asd', 'active'),
('19-63-010', 'Dtl2', 'Arra Reyes', 'Arra Reyes', '2021-08-09 21:46:02', '2021-08-09 21:46:12', 'consulted ni arra reyes', 'active'),
('19-63-010', 'Dtl2', 'atienza francis', 'atienza francis', '2021-08-10 13:01:02', '2021-08-10 13:01:11', 'topak', 'active'),
('19-63-010', 'Dtl2', 'Hannah Montana', 'Arra Reyes', '2021-08-10 13:35:29', '2021-08-10 13:35:59', 'nabbaaliw na', 'active'),
('19-63-010', 'Dtl2', 'not consulted', 'Arra Reyes', '2021-08-10 14:14:47', '0000-00-00 00:00:00', 'not consulted', 'active'),
('19-63-010', 'Dtl3', 'Arra Reyes', '', '2021-08-09 21:40:50', '2021-08-09 21:42:02', 'consulted ni arra reyes', 'active'),
('19-63-010', 'Dtl4', 'not consulted', '', '2021-08-09 20:52:07', '2021-08-09 21:12:19', 'asddddd', 'active'),
('19-63-010', 'Mdcn1', 'Arra Reyes', 'Arra Reyes', '2021-08-09 21:41:47', '2021-08-09 21:42:07', 'consulted ni arra reyes', 'active'),
('19-63-010', 'Mdcn3', 'Arra Reyes', '', '2021-08-09 20:52:45', '2021-08-09 21:27:09', 'consulted ni arra reyes', 'active'),
('19-63-010', 'Mdcn3', 'Arra Reyes', 'Arra Reyes', '2021-08-09 21:46:07', '2021-08-09 21:46:16', 'consulted ni arra reyes', 'active'),
('19-63-010', 'Mdcn4', 'Arra Reyes', '', '2021-08-09 20:52:51', '2021-08-09 21:41:57', 'consulted ni arra reyes', 'active'),
('19-63-010', 'Mdcn5', 'Arra Reyes', '', '2021-08-09 21:40:43', '2021-08-09 21:42:11', 'consulted ni arra reyes', 'active'),
('19-63-010', 'Mdcn5', 'atienza francis', 'atienza francis', '2021-08-10 13:25:26', '2021-08-10 13:25:35', 'Ewan', 'active'),
('21-10-002', 'Dtl1', 'Arra Reyes', '', '2021-08-03 02:51:17', '2021-08-09 21:42:15', 'consulted ni arra reyes', 'active'),
('21-10-003', 'Mdcn5', 'Arra Reyes', '', '2021-08-09 21:01:03', '2021-08-09 21:42:18', 'consulted ni arra reyes', 'active');

-- --------------------------------------------------------

--
-- Stand-in structure for view `consultation_vw`
-- (See below for the actual view)
--
CREATE TABLE `consultation_vw` (
`student_no` varchar(10)
,`illness_code` varchar(10)
,`illness_desc` varchar(500)
,`college_code` varchar(10)
,`course_code` varchar(10)
,`date_prepared` datetime
,`prepared_by` varchar(50)
,`date_consulted` datetime
,`attending_physician` varchar(50)
,`diagnosis` varchar(50)
,`display` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_code` varchar(10) NOT NULL,
  `course_desc` varchar(225) NOT NULL,
  `college_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_code`, `course_desc`, `college_code`) VALUES
('ABM', 'Accountancy,Business and Management', 'SHS'),
('BAC', 'Bachelor of Arts in Communication ', 'CAS'),
('BAPS', 'Bachelor of Arts in Political Science ', 'CAS'),
('BSA', 'Bachelor of Science in Accountancy ', 'CBAE'),
('BSBA', 'Bachelor of Science in Business Administration', 'CBAE'),
('BSCOE', 'Bachelor of Science in Computer Engineering', 'CET'),
('BSCRIM', 'Bachelor of Science in Criminology', 'CCJ'),
('BSE', 'Bachelor of Science in Entrepreneurship ', 'CBAE'),
('BSECE', 'Bachelor in Electronics Communcation Engineering ', 'CET'),
('BSED_ENG', 'Bachelor of Science in English', 'CE'),
('BSED_MATH', 'Bachelor of Science in Mathematics', 'CE'),
('BSED_SCI', 'Bachelor of Science in Science', 'CE'),
('BSHRDM', 'Bachelor of Science in Human Resource Development Management', 'CBAE'),
('BSIT', 'Bachelor of Science in Information Technology', 'CET'),
('BSN', 'Bachelor of Science in Nursing', 'CHS'),
('BSPE', 'Bachelor of Science in Physical Education', 'CE'),
('BSPSYCH', 'Bachelor of Science in Psychology ', 'CAS'),
('BSPT', 'Bachelor of Science in Physical Therapy', 'CHS'),
('GAS', 'General Academic Strand', 'SHS'),
('HUMMS', 'Humanity and Social Sciences', 'SHS'),
('LAW', 'Juris Doctor ', 'CL'),
('STEM', 'Science, Technology, Engineering and Mathematics', 'SHS');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `employee_no` varchar(10) NOT NULL,
  `employee_lname` varchar(50) NOT NULL,
  `employee_fname` varchar(50) NOT NULL,
  `employee_email` varchar(50) NOT NULL,
  `employee_birthday` date DEFAULT NULL,
  `employee_gender` varchar(7) NOT NULL DEFAULT 'MALE',
  `profile_picture` varchar(500) NOT NULL DEFAULT 'img/user.png',
  `employee_position` varchar(20) DEFAULT NULL,
  `employee_mobile` varchar(20) DEFAULT NULL,
  `employee_address` varchar(100) DEFAULT NULL,
  `display` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`employee_no`, `employee_lname`, `employee_fname`, `employee_email`, `employee_birthday`, `employee_gender`, `profile_picture`, `employee_position`, `employee_mobile`, `employee_address`, `display`) VALUES
('1234', 'Raf', 'Raynog', 'raf@gmail.com', '1986-01-01', 'Male', 'img/user.png', 'Dentist', '12316', 'asdas 123', 'active'),
('den_001', 'Reyes', 'Arra', 'arrareyes@yahoo.com', '1991-11-24', 'Female', 'img/dentist.png', 'Dentist', '09095909231', ' 455 Pandacan, Manila', 'active'),
('den_002', 'Dela Cruz', 'Cardo Dalisay', 'cardodelacruz@gmail.com', '1995-05-18', 'male', 'img/user.png', 'Dentist', '09392017117', 'Quiapo, Manila', 'active'),
('doc_001', 'Montana', 'Hannah', 'hannahmontana@gmail.com', '1996-04-17', 'Female', 'img/doctor (1).png', 'Doctor', '09205400123', 'Tondo, Manila', 'active'),
('doc_002', 'Aquino', 'Gloria', 'gloriaaquino@gmail.com', '1995-02-25', 'Female', 'img/user.png', 'Doctor', '09095623369', 'Quiapo, Manila', 'active'),
('doc_003', 'Andrie', 'Galim', 'andriegalima@gmail.com', '1967-08-01', 'Female', 'img/user.png', 'Doctor', '09095909232', '1233', 'inactive'),
('nur_001', 'Galang', 'Mika', 'mikagalang@gmail.com', '1997-05-15', 'Female', 'img/nurse (1).png', 'Nurse', '09083886969', 'Sta. Ana, Manila', 'active'),
('nur_002', 'Esperanza', 'Nica', 'nicaesperanza@gmail.com', '1996-06-11', 'Female', 'img/user.png', 'Nurse', '09760551234', 'Tondo, Manila', 'active'),
('sys_001', 'Atienza', 'Francis', 'francis.atienza@gmail.com ', '1969-12-25', 'male', 'img/administrator.png', 'system admin', '09123456789', 'Quezon City Metro Manila', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `illness`
--

CREATE TABLE `illness` (
  `illness_code` varchar(10) NOT NULL,
  `illness_desc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `illness`
--

INSERT INTO `illness` (`illness_code`, `illness_desc`) VALUES
('Dtl1', 'Pain&nbsp;in&nbsp;a&nbsp;tooth&nbsp;or&nbsp;teeth.'),
('Dtl2', 'Deep&nbsp;or&nbsp;superficial&nbsp;discoloration&nbsp;of&nbsp;teeth.'),
('Dtl3', 'A&nbsp;cavity&nbsp;is&nbsp;a&nbsp;space&nbsp;or&nbsp;hole&nbsp;in&nbsp;something&nbsp;such&nbsp;as&nbsp;a&nbsp;solid&nbsp;object&nbsp;or&nbsp;a&nbsp;persons&nbsp;body.'),
('Dtl4', 'Enamel&nbsp;or&nbsp;the&nbsp;tough,&nbsp;outer&nbsp;covering&nbsp;of&nbsp;your&nbsp;teeth&nbsp;is&nbsp;one&nbsp;of&nbsp;the&nbsp;strongest&nbsp;substances&nbsp;in&nbsp;your&nbsp;body.&nbsp;But&nbsp;it&nbsp;does&nbsp;have&nbsp'),
('Dtl5', 'Pain&nbsp;or&nbsp;discomfort&nbsp;in&nbsp;the&nbsp;teeth&nbsp;as&nbsp;a&nbsp;response&nbsp;to&nbsp;certain&nbsp;stimuli,&nbsp;such&nbsp;as&nbsp;hot&nbsp;or&nbsp;cold&nbsp;temperatures.&nbsp;It&nbsp;may&nbsp;be&nbsp;temporary&'),
('Mdcn1', 'Headache&nbsp;is&nbsp;pain&nbsp;in&nbsp;any&nbsp;region&nbsp;of&nbsp;the&nbsp;head.&nbsp;Headaches&nbsp;may&nbsp;occur&nbsp;on&nbsp;one&nbsp;or&nbsp;both&nbsp;sides&nbsp;of&nbsp;the&nbsp;head,&nbsp;be&nbsp;isolated&nbsp;to'),
('Mdcn2', 'Nosebleed&nbsp;is&nbsp;the&nbsp;loss&nbsp;ofblood&nbsp;from&nbsp;the&nbsp;tissue&nbsp;that&nbsp;lines&nbsp;the&nbsp;inside&nbsp;of&nbsp;your&nbsp;nose.'),
('Mdcn3', 'A&nbsp;cough&nbsp;begins&nbsp;with&nbsp;a&nbsp;deep&nbsp;breath&nbsp;in,&nbsp;at&nbsp;which&nbsp;point&nbsp;the&nbsp;opening&nbsp;between&nbsp;the&nbsp;vocal&nbsp;cords&nbsp;at&nbsp;the&nbsp;upper&nbsp;part&nbsp;of&nbsp;the&n'),
('Mdcn4', 'A&nbsp;fever&nbsp;is&nbsp;a&nbsp;body&nbsp;temperature&nbsp;that&nbsp;is&nbsp;higher&nbsp;than&nbsp;normal.&nbsp;A&nbsp;normal&nbsp;temperature&nbsp;can&nbsp;vary&nbsp;from&nbsp;person&nbsp;to&nbsp;person,&nbsp;but&nbsp;it&nb'),
('Mdcn5', 'A&nbsp;sore&nbsp;throat&nbsp;is&nbsp;a&nbsp;painful,&nbsp;dry,&nbsp;or&nbsp;scratchy&nbsp;feeling&nbsp;in&nbsp;the&nbsp;throat.');

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `employee_no` varchar(10) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'admin',
  `time_log` datetime NOT NULL,
  `action` varchar(50) NOT NULL,
  `display` varchar(20) DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`employee_no`, `role`, `time_log`, `action`, `display`) VALUES
('den_001', 'admin', '2021-07-29 08:26:33', 'logged out', 'inactive'),
('den_001', 'admin', '2021-08-01 19:57:34', 'deleted medical record', 'inactive'),
('den_001', 'admin', '2021-08-02 19:16:22', 'deleted medical record', 'inactive'),
('den_001', 'admin', '2021-08-02 19:16:37', 'deleted medical record', 'inactive'),
('den_001', 'admin', '2021-08-02 19:27:23', 'added medical record', 'inactive'),
('den_001', 'admin', '2021-08-02 19:27:37', 'deleted medical record', 'inactive'),
('den_001', 'admin', '2021-08-02 20:12:53', 'added consultation record', 'inactive'),
('den_001', 'admin', '2021-08-02 21:14:37', 'added consultation record', 'inactive'),
('den_001', 'admin', '2021-08-02 23:04:59', 'added consultation record', 'inactive'),
('den_001', 'admin', '2021-08-02 23:17:55', 'logged out', 'inactive'),
('den_001', 'admin', '2021-08-02 23:27:07', 'logged in', 'inactive'),
('den_001', 'admin', '2021-08-02 23:27:49', 'logged out', 'inactive'),
('den_001', 'admin', '2021-08-02 23:55:55', 'logged in', 'inactive'),
('den_001', 'admin', '2021-08-03 00:06:44', 'deleted consultation record', 'inactive'),
('den_001', 'admin', '2021-08-03 00:07:47', 'deleted consultation record', 'inactive'),
('den_001', 'admin', '2021-08-03 00:12:31', 'logged out', 'inactive'),
('den_001', 'admin', '2021-08-03 00:38:34', 'logged in', 'inactive'),
('den_001', 'admin', '2021-08-03 00:39:30', 'deleted medical record', 'inactive'),
('den_001', 'admin', '2021-08-03 00:41:00', 'added consultation record', 'inactive'),
('den_001', 'admin', '2021-08-03 00:45:47', 'added consultation record', 'inactive'),
('den_001', 'admin', '2021-08-03 00:46:50', 'Consulted a record', 'inactive'),
('den_001', 'admin', '2021-08-03 00:47:13', 'deleted consultation record', 'inactive'),
('den_001', 'admin', '2021-08-03 00:47:19', 'added consultation record', 'inactive'),
('den_001', 'admin', '2021-08-03 00:50:20', 'added illness record', 'inactive'),
('den_001', 'admin', '2021-08-03 00:50:24', 'deleted illness record', 'inactive'),
('den_001', 'admin', '2021-08-03 00:50:36', 'added illness record', 'inactive'),
('den_001', 'admin', '2021-08-03 00:50:43', 'deleted illness record', 'inactive'),
('den_001', 'admin', '2021-08-03 01:02:47', 'deleted illness record', 'inactive'),
('den_001', 'admin', '2021-08-03 01:03:16', 'updated password', 'inactive'),
('den_001', 'admin', '2021-08-03 01:03:18', 'logged out', 'inactive'),
('den_001', 'admin', '2021-08-03 01:03:21', 'logged in', 'inactive'),
('den_001', 'admin', '2021-08-03 01:04:11', 'updated password', 'inactive'),
('den_001', 'admin', '2021-08-03 01:04:12', 'logged out', 'inactive'),
('den_001', 'admin', '2021-08-03 01:04:15', 'logged in', 'inactive'),
('den_001', 'admin', '2021-08-03 01:04:34', 'deleted consultation record', 'inactive'),
('den_001', 'admin', '2021-08-03 01:04:51', 'logged out', 'inactive'),
('den_001', 'admin', '2021-08-03 01:14:58', 'logged in', 'inactive'),
('den_001', 'admin', '2021-08-03 01:15:03', 'logged out', 'inactive'),
('den_001', 'admin', '2021-08-03 01:27:14', 'logged in', 'inactive'),
('den_001', 'admin', '2021-08-03 01:27:19', 'Consulted a record', 'inactive'),
('den_001', 'admin', '2021-08-03 01:31:42', 'Consulted a record', 'inactive'),
('den_001', 'admin', '2021-08-03 01:32:18', 'logged out', 'inactive'),
('den_001', 'admin', '2021-08-03 01:47:06', 'logged in', 'inactive'),
('den_001', 'admin', '2021-08-03 01:47:25', 'added consultation record', 'inactive'),
('den_001', 'admin', '2021-08-03 01:48:22', 'added consultation record', 'inactive'),
('den_001', 'admin', '2021-08-03 01:48:31', 'Consulted a record', 'inactive'),
('den_001', 'admin', '2021-08-03 01:54:09', 'Consulted a record', 'inactive'),
('den_001', 'admin', '2021-08-03 01:54:50', 'Consulted a record', 'inactive'),
('den_001', 'admin', '2021-08-03 01:54:58', 'Consulted a record', 'inactive'),
('den_001', 'admin', '2021-08-03 01:55:32', 'added consultation record', 'inactive'),
('den_001', 'admin', '2021-08-03 01:55:36', 'Consulted a record', 'inactive'),
('den_001', 'admin', '2021-08-03 01:59:55', 'Consulted a record', 'inactive'),
('den_001', 'admin', '2021-08-03 01:59:59', 'Consulted a record', 'inactive'),
('den_001', 'admin', '2021-08-03 02:04:51', 'added consultation record', 'inactive'),
('den_001', 'admin', '2021-08-03 02:04:55', 'added consultation record', 'inactive'),
('den_001', 'admin', '2021-08-03 02:05:00', 'added consultation record', 'inactive'),
('den_001', 'admin', '2021-08-03 02:05:05', 'Consulted a record', 'inactive'),
('den_001', 'admin', '2021-08-03 02:05:12', 'added consultation record', 'inactive'),
('den_001', 'admin', '2021-08-03 02:05:15', 'deleted illness record', 'inactive'),
('den_001', 'admin', '2021-08-03 02:05:20', 'deleted illness record', 'inactive'),
('den_001', 'admin', '2021-08-03 02:05:23', 'deleted illness record', 'inactive'),
('den_001', 'admin', '2021-08-03 02:05:34', 'logged out', 'inactive'),
('den_001', 'admin', '2021-08-03 02:15:27', 'logged in', 'inactive'),
('den_001', 'admin', '2021-08-03 02:16:27', 'logged out', 'inactive'),
('den_001', 'admin', '2021-08-03 02:22:02', 'logged in', 'inactive'),
('den_001', 'admin', '2021-08-03 02:42:45', 'added consultation record', 'inactive'),
('den_001', 'admin', '2021-08-03 02:43:35', 'logged out', 'inactive'),
('den_001', 'admin', '2021-08-03 02:45:23', 'logged in', 'inactive'),
('den_001', 'admin', '2021-08-03 02:47:18', 'logged out', 'inactive'),
('den_001', 'admin', '2021-08-03 02:50:38', 'logged in', 'inactive'),
('den_001', 'admin', '2021-08-03 02:51:17', 'added consultation record', 'inactive'),
('den_001', 'admin', '2021-08-03 03:09:25', 'added medical record', 'inactive'),
('den_001', 'admin', '2021-08-03 03:09:47', 'added medical record', 'inactive'),
('den_001', 'admin', '2021-08-03 04:02:09', 'added medical record', 'inactive'),
('den_001', 'admin', '2021-08-03 04:02:37', 'added medical record', 'inactive'),
('den_001', 'admin', '2021-08-03 09:17:44', 'logged in', 'inactive'),
('den_001', 'admin', '2021-08-03 10:08:17', 'logged out', 'inactive'),
('den_001', 'admin', '2021-08-03 10:08:21', 'logged in', 'inactive'),
('den_001', 'admin', '2021-08-03 10:53:46', 'logged out', 'inactive'),
('den_001', 'admin', '2021-08-03 11:02:04', 'logged in', 'inactive'),
('den_001', 'admin', '2021-08-03 11:02:09', 'logged out', 'inactive'),
('den_001', 'admin', '2021-08-03 12:01:07', 'logged in', 'inactive'),
('den_001', 'admin', '2021-08-03 12:01:15', 'logged out', 'inactive'),
('den_001', 'admin', '2021-08-03 14:10:14', 'logged in', 'inactive'),
('den_001', 'admin', '2021-08-03 14:10:38', 'logged out', 'inactive'),
('den_001', 'admin', '2021-08-03 18:56:07', 'logged in', 'inactive'),
('den_001', 'admin', '2021-08-03 18:58:31', 'logged out', 'inactive'),
('den_001', 'admin', '2021-08-04 15:09:01', 'logged in', 'inactive'),
('den_001', 'admin', '2021-08-04 15:09:11', 'logged out', 'inactive'),
('den_001', 'admin', '2021-08-05 15:28:44', 'logged in', 'inactive'),
('den_001', 'admin', '2021-08-07 13:24:09', 'logged in', 'inactive'),
('den_001', 'admin', '2021-08-09 19:35:11', 'logged in', 'inactive'),
('den_001', 'admin', '2021-08-09 19:35:34', 'added medical record', 'inactive'),
('den_001', 'admin', '2021-08-09 19:43:19', 'deleted medical record', 'inactive'),
('den_001', 'admin', '2021-08-09 20:19:35', 'logged in', 'inactive'),
('den_001', 'admin', '2021-08-09 20:19:53', 'logged out', 'inactive'),
('den_001', 'admin', '2021-08-09 20:24:35', 'logged in', 'inactive'),
('den_001', 'admin', '2021-08-09 20:24:48', 'logged out', 'inactive'),
('den_001', 'admin', '2021-08-09 20:28:54', 'logged in', 'inactive'),
('den_001', 'admin', '2021-08-09 20:52:40', 'added consultation record', 'inactive'),
('den_001', 'admin', '2021-08-09 20:52:45', 'added consultation record', 'inactive'),
('den_001', 'admin', '2021-08-09 20:52:51', 'added consultation record', 'inactive'),
('den_001', 'admin', '2021-08-09 20:53:47', 'added medical record', 'inactive'),
('den_001', 'admin', '2021-08-09 20:54:40', 'added medical record', 'inactive'),
('den_001', 'admin', '2021-08-09 20:56:20', 'deleted medical record', 'inactive'),
('den_001', 'admin', '2021-08-09 20:56:38', 'Consulted a record', 'inactive'),
('den_001', 'admin', '2021-08-09 20:56:46', 'deleted illness record', 'inactive'),
('den_001', 'admin', '2021-08-09 20:56:49', 'deleted illness record', 'inactive'),
('den_001', 'admin', '2021-08-09 20:57:06', 'Consulted a record', 'inactive'),
('den_001', 'admin', '2021-08-09 20:59:09', 'deleted consultation record', 'inactive'),
('den_001', 'admin', '2021-08-09 20:59:22', 'deleted consultation record', 'inactive'),
('den_001', 'admin', '2021-08-09 20:59:28', 'deleted consultation record', 'inactive'),
('den_001', 'admin', '2021-08-09 20:59:34', 'deleted consultation record', 'inactive'),
('den_001', 'admin', '2021-08-09 20:59:38', 'deleted consultation record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:00:01', 'added illness record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:00:05', 'deleted illness record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:05:17', 'Consulted a record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:12:10', 'Consulted a record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:12:19', 'Consulted a record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:13:44', 'logged in', 'inactive'),
('den_001', 'admin', '2021-08-09 21:21:36', 'Consulted a record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:22:45', 'Consulted a record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:26:47', 'Consulted a record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:27:09', 'Consulted a record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:28:00', 'deleted consultation record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:28:05', 'deleted consultation record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:28:10', 'deleted consultation record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:28:14', 'deleted consultation record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:28:19', 'deleted consultation record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:28:23', 'deleted consultation record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:40:43', 'added consultation record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:40:50', 'added consultation record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:41:48', 'added consultation record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:41:57', 'Consulted a record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:42:02', 'Consulted a record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:42:07', 'Consulted a record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:42:11', 'Consulted a record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:42:15', 'Consulted a record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:42:19', 'Consulted a record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:46:02', 'added consultation record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:46:08', 'added consultation record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:46:12', 'Consulted a record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:46:16', 'Consulted a record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:46:20', 'added consultation record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:46:25', 'added consultation record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:46:29', 'Consulted a record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:46:34', 'Consulted a record', 'inactive'),
('den_001', 'admin', '2021-08-09 21:48:50', 'logged out', 'inactive'),
('den_001', 'admin', '2021-08-09 21:58:33', 'logged in', 'inactive'),
('den_001', 'admin', '2021-08-09 22:06:20', 'logged out', 'inactive'),
('den_001', 'admin', '2021-08-09 22:17:39', 'logged in', 'inactive'),
('den_001', 'admin', '2021-08-09 22:18:47', 'logged out', 'inactive'),
('den_001', 'admin', '2021-08-10 13:31:41', 'logged in', 'active'),
('den_001', 'admin', '2021-08-10 13:33:55', 'updated profile picture', 'active'),
('den_001', 'admin', '2021-08-10 13:33:58', 'updated profile picture', 'active'),
('den_001', 'admin', '2021-08-10 13:34:02', 'updated profile picture', 'active'),
('den_001', 'admin', '2021-08-10 13:35:29', 'added consultation record', 'active'),
('den_001', 'admin', '2021-08-10 13:35:31', 'logged out', 'active'),
('den_001', 'admin', '2021-08-10 14:12:29', 'logged in', 'active'),
('den_001', 'admin', '2021-08-10 14:14:47', 'added consultation record', 'active'),
('den_001', 'admin', '2021-08-10 14:24:02', 'logged out', 'active'),
('den_001', 'admin', '2021-08-10 14:44:22', 'logged in', 'active'),
('den_001', 'admin', '2021-08-10 14:44:36', 'logged out', 'active'),
('den_001', 'admin', '2021-08-10 17:55:01', 'logged in', 'active'),
('den_001', 'admin', '2021-08-10 18:09:29', 'logged out', 'active'),
('den_001', 'admin', '2021-08-10 18:42:38', 'logged in', 'active'),
('den_001', 'admin', '2021-08-10 18:44:13', 'logged out', 'active'),
('den_001', 'admin', '2021-08-12 16:44:57', 'logged in', 'active'),
('den_001', 'admin', '2021-08-12 16:49:16', 'logged out', 'active'),
('den_001', 'admin', '2021-08-12 16:54:01', 'logged in', 'active'),
('den_001', 'admin', '2021-08-12 16:55:09', 'logged out', 'active'),
('den_001', 'admin', '2021-08-12 17:06:41', 'logged in', 'active'),
('den_001', 'admin', '2021-08-12 17:08:55', 'logged out', 'active'),
('den_001', 'admin', '2021-08-12 17:24:16', 'Edited Employee Record', 'active'),
('den_001', 'admin', '2021-08-12 17:34:21', 'logged in', 'active'),
('den_001', 'admin', '2021-08-12 17:36:32', 'logged out', 'active'),
('den_001', 'admin', '2021-08-12 17:41:52', 'logged in', 'active'),
('den_001', 'admin', '2021-08-12 17:43:00', 'logged out', 'active'),
('den_001', 'admin', '2021-08-12 18:11:44', 'logged in', 'active'),
('den_001', 'admin', '2021-08-12 18:21:04', 'logged out', 'active'),
('den_001', 'admin', '2021-08-12 18:46:41', 'logged in', 'active'),
('den_001', 'admin', '2021-08-12 18:46:43', 'logged out', 'active'),
('den_001', 'admin', '2021-08-12 18:53:18', 'logged in', 'active'),
('den_001', 'admin', '2021-08-13 17:55:17', 'logged in', 'active'),
('den_001', 'admin', '2021-08-13 18:13:07', 'added medical record', 'active'),
('den_001', 'admin', '2021-08-13 18:13:46', 'added medical record', 'active'),
('den_001', 'admin', '2021-08-13 18:15:12', 'added medical record', 'active'),
('den_001', 'admin', '2021-08-13 18:15:18', 'logged out', 'active'),
('den_001', 'admin', '2021-08-13 18:16:07', 'logged in', 'active'),
('den_001', 'admin', '2021-08-13 18:22:16', 'added medical record', 'active'),
('den_001', 'admin', '2021-08-13 18:22:55', 'added medical record', 'active'),
('den_001', 'admin', '2021-08-13 18:24:35', 'logged out', 'active'),
('doc_001', 'admin', '2021-08-10 13:35:45', 'logged in', 'active'),
('doc_001', 'admin', '2021-08-10 13:35:59', 'Consulted a record', 'active'),
('doc_001', 'admin', '2021-08-10 14:07:13', 'updated profile picture', 'active'),
('doc_001', 'admin', '2021-08-10 14:07:15', 'updated profile picture', 'active'),
('doc_001', 'admin', '2021-08-12 18:21:09', 'logged in', 'active'),
('doc_001', 'admin', '2021-08-12 18:36:55', 'logged out', 'active'),
('sys_001', 'system_admin', '2021-07-29 08:25:08', 'added medical record', 'inactive'),
('sys_001', 'system_admin', '2021-07-29 08:25:14', 'deleted medical record', 'inactive'),
('sys_001', 'system_admin', '2021-07-29 08:25:38', 'added illness record', 'inactive'),
('sys_001', 'system_admin', '2021-07-29 08:25:53', 'deleted illness record', 'inactive'),
('sys_001', 'system_admin', '2021-07-29 08:26:27', 'logged out', 'inactive'),
('sys_001', 'system_admin', '2021-07-29 08:26:37', 'logged in', 'inactive'),
('sys_001', 'system_admin', '2021-07-29 08:30:03', 'updated password', 'inactive'),
('sys_001', 'system_admin', '2021-07-29 08:30:05', 'logged out', 'inactive'),
('sys_001', 'system_admin', '2021-07-29 08:30:10', 'logged in', 'inactive'),
('sys_001', 'system_admin', '2021-07-29 08:30:19', 'updated password', 'inactive'),
('sys_001', 'system_admin', '2021-07-29 08:30:20', 'logged out', 'inactive'),
('sys_001', 'system_admin', '2021-07-29 08:30:23', 'logged in', 'inactive'),
('sys_001', 'system_admin', '2021-08-02 23:18:01', 'logged in', 'inactive'),
('sys_001', 'system_admin', '2021-08-02 23:27:04', 'logged out', 'inactive'),
('sys_001', 'system_admin', '2021-08-02 23:28:51', 'logged in', 'inactive'),
('sys_001', 'system_admin', '2021-08-02 23:38:26', 'Add an Employee Record', 'inactive'),
('sys_001', 'system_admin', '2021-08-02 23:39:13', 'Add an Employee Record', 'inactive'),
('sys_001', 'system_admin', '2021-08-02 23:40:42', 'Add an Employee Record', 'inactive'),
('sys_001', 'system_admin', '2021-08-02 23:41:25', 'Add an Employee Record', 'inactive'),
('sys_001', 'system_admin', '2021-08-02 23:54:04', 'logged out', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 00:12:44', 'logged in', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 00:38:31', 'logged out', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 01:04:56', 'logged in', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 01:06:47', 'Add an Employee Record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 01:08:46', 'Add an Employee Record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 01:11:04', 'updated profile picture', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 01:11:08', 'updated profile picture', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 01:14:55', 'logged out', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 01:15:06', 'logged in', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 01:19:10', 'added consultation record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 01:20:43', 'Consulted a record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 01:20:59', 'Consulted a record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 01:21:49', 'Consulted a record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 01:22:51', 'Consulted a record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 01:27:12', 'logged out', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 01:32:21', 'logged in', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 01:33:04', 'Consulted a record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 01:33:08', 'Consulted a record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 01:33:12', 'Consulted a record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 01:33:19', 'Consulted a record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 01:33:32', 'Consulted a record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 01:34:53', 'Consulted a record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 01:35:39', 'Consulted a record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 01:37:29', 'Consulted a record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 01:37:34', 'Consulted a record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 01:39:27', 'Consulted a record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 01:40:28', 'Consulted a record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 01:42:01', 'Consulted a record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 01:43:12', 'Consulted a record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 01:43:38', 'Consulted a record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 01:44:14', 'Consulted a record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 01:46:07', 'Consulted a record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 01:47:02', 'logged out', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 02:05:37', 'logged in', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 02:07:33', 'added consultation record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 02:09:20', 'added consultation record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 02:09:24', 'Consulted a record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 02:09:27', 'deleted medical record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 02:10:00', 'deleted medical record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 02:10:52', 'deleted medical record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 02:11:29', 'added consultation record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 02:11:32', 'deleted medical record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 02:12:02', 'added consultation record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 02:12:06', 'deleted medical record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 02:13:04', 'added consultation record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 02:13:11', 'deleted medical record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 02:14:27', 'added consultation record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 02:14:43', 'deleted illness record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 02:15:24', 'logged out', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 02:16:30', 'logged in', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 02:27:11', 'added consultation record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 02:27:15', 'added consultation record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 02:27:21', 'added consultation record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 02:27:24', 'Consulted a record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 02:27:26', 'deleted illness record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 02:27:29', 'deleted illness record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 02:35:03', 'Add an Employee Record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 02:40:57', 'added medical record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 02:45:19', 'logged out', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 02:47:27', 'logged in', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 02:50:35', 'logged out', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 10:53:52', 'logged in', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 11:02:01', 'logged out', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 11:02:12', 'logged in', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 12:00:37', 'deleted illness record', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 12:01:03', 'logged out', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 12:01:20', 'logged in', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 18:58:41', 'logged in', 'inactive'),
('sys_001', 'system_admin', '2021-08-03 19:00:00', 'logged out', 'inactive'),
('sys_001', 'system_admin', '2021-08-04 15:09:23', 'logged in', 'inactive'),
('sys_001', 'system_admin', '2021-08-04 15:10:02', 'logged out', 'inactive'),
('sys_001', 'system_admin', '2021-08-05 14:44:59', 'logged in', 'inactive'),
('sys_001', 'system_admin', '2021-08-05 15:28:34', 'logged out', 'inactive'),
('sys_001', 'system_admin', '2021-08-07 13:23:26', 'logged in', 'inactive'),
('sys_001', 'system_admin', '2021-08-07 13:24:02', 'logged out', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 20:19:56', 'logged in', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 20:24:29', 'logged out', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 20:24:52', 'logged in', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 20:51:22', 'added consultation record', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 20:51:28', 'added consultation record', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 20:51:56', 'added consultation record', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 20:52:02', 'added consultation record', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 20:52:07', 'added consultation record', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 20:52:13', 'added consultation record', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 21:01:03', 'added consultation record', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 21:01:13', 'added consultation record', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 21:13:30', 'logged out', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 21:36:05', 'logged in', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 21:44:32', 'added medical record', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 21:50:15', 'logged out', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 21:50:20', 'logged in', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 21:53:09', 'updated profile picture', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 21:53:30', 'Add an Employee Record', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 21:54:03', 'added medical record', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 21:54:38', 'added medical record', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 21:54:58', 'added consultation record', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 21:57:02', 'added consultation record', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 21:57:21', 'Consulted a record', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 22:05:52', 'deleted illness record', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 22:10:18', 'added consultation record', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 22:17:05', 'added medical record', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 22:17:34', 'logged out', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 22:18:50', 'logged in', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 22:19:01', 'Consulted a record', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 22:19:28', 'added medical record', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 22:19:34', 'added consultation record', 'inactive'),
('sys_001', 'system_admin', '2021-08-09 22:21:14', 'Consulted a record', 'inactive'),
('sys_001', 'system_admin', '2021-08-10 12:13:36', 'logged in', 'inactive'),
('sys_001', 'system_admin', '2021-08-10 12:15:13', 'logged out', 'inactive'),
('sys_001', 'system_admin', '2021-08-10 12:15:16', 'logged in', 'inactive'),
('sys_001', 'system_admin', '2021-08-10 12:15:40', 'updated profile picture', 'inactive'),
('sys_001', 'system_admin', '2021-08-10 12:15:43', 'updated profile picture', 'inactive'),
('sys_001', 'system_admin', '2021-08-10 12:17:25', 'logged out', 'inactive'),
('sys_001', 'system_admin', '2021-08-10 12:17:28', 'logged in', 'inactive'),
('sys_001', 'system_admin', '2021-08-10 12:30:09', 'logged out', 'inactive'),
('sys_001', 'system_admin', '2021-08-10 12:30:18', 'logged in', 'inactive'),
('sys_001', 'system_admin', '2021-08-10 12:30:44', 'added consultation record', 'inactive'),
('sys_001', 'system_admin', '2021-08-10 12:32:43', 'Add an Employee Record', 'inactive'),
('sys_001', 'system_admin', '2021-08-10 12:38:05', 'logged in', 'inactive'),
('sys_001', 'system_admin', '2021-08-10 12:59:04', 'Consulted a record', 'inactive'),
('sys_001', 'system_admin', '2021-08-10 13:00:32', 'deleted consultation record', 'inactive'),
('sys_001', 'system_admin', '2021-08-10 13:00:43', 'deleted consultation record', 'inactive'),
('sys_001', 'system_admin', '2021-08-10 13:01:02', 'added consultation record', 'inactive'),
('sys_001', 'system_admin', '2021-08-10 13:01:12', 'Consulted a record', 'inactive'),
('sys_001', 'system_admin', '2021-08-10 13:25:26', 'added consultation record', 'inactive'),
('sys_001', 'system_admin', '2021-08-10 13:25:35', 'Consulted a record', 'inactive'),
('sys_001', 'system_admin', '2021-08-10 13:31:37', 'logged out', 'active'),
('sys_001', 'system_admin', '2021-08-10 14:24:24', 'logged in', 'active'),
('sys_001', 'system_admin', '2021-08-10 14:24:38', 'logged out', 'active'),
('sys_001', 'system_admin', '2021-08-10 14:24:44', 'logged in', 'active'),
('sys_001', 'system_admin', '2021-08-10 14:29:35', 'logged out', 'active'),
('sys_001', 'system_admin', '2021-08-10 14:44:39', 'logged in', 'active'),
('sys_001', 'system_admin', '2021-08-10 14:48:01', 'logged out', 'active'),
('sys_001', 'system_admin', '2021-08-10 18:09:32', 'logged in', 'active'),
('sys_001', 'system_admin', '2021-08-10 18:10:02', 'logged out', 'active'),
('sys_001', 'system_admin', '2021-08-10 18:15:51', 'logged in', 'active'),
('sys_001', 'system_admin', '2021-08-10 18:42:01', 'logged out', 'active'),
('sys_001', 'system_admin', '2021-08-12 16:49:19', 'logged in', 'active'),
('sys_001', 'system_admin', '2021-08-12 17:06:38', 'logged out', 'active'),
('sys_001', 'system_admin', '2021-08-12 17:08:58', 'logged in', 'active'),
('sys_001', 'system_admin', '2021-08-12 17:21:19', 'logged out', 'active'),
('sys_001', 'system_admin', '2021-08-12 17:21:23', 'logged in', 'active'),
('sys_001', 'system_admin', '2021-08-12 17:27:51', 'Edited Employee Record', 'active'),
('sys_001', 'system_admin', '2021-08-12 17:34:18', 'logged out', 'active'),
('sys_001', 'system_admin', '2021-08-12 17:36:40', 'logged in', 'active'),
('sys_001', 'system_admin', '2021-08-12 17:45:53', 'Edited Employee Record', 'active'),
('sys_001', 'system_admin', '2021-08-12 17:46:05', 'Edited Employee Record', 'active'),
('sys_001', 'system_admin', '2021-08-12 17:46:11', 'Edited Employee Record', 'active'),
('sys_001', 'system_admin', '2021-08-12 17:46:15', 'Edited Employee Record', 'active'),
('sys_001', 'system_admin', '2021-08-12 17:51:32', 'Edited Employee Record', 'active'),
('sys_001', 'system_admin', '2021-08-12 17:59:15', 'Edited Employee Record', 'active'),
('sys_001', 'system_admin', '2021-08-12 17:59:40', 'Edited Employee Record', 'active'),
('sys_001', 'system_admin', '2021-08-12 18:01:04', 'Added an Employee Record', 'active'),
('sys_001', 'system_admin', '2021-08-12 18:03:40', 'Added an Employee Record', 'active'),
('sys_001', 'system_admin', '2021-08-12 18:07:50', 'logged in', 'active'),
('sys_001', 'system_admin', '2021-08-12 18:36:59', 'logged in', 'active'),
('sys_001', 'system_admin', '2021-08-12 18:46:39', 'logged out', 'active'),
('sys_001', 'system_admin', '2021-08-12 18:46:46', 'logged in', 'active'),
('sys_001', 'system_admin', '2021-08-12 18:53:13', 'logged out', 'active'),
('sys_001', 'system_admin', '2021-08-13 18:15:21', 'logged in', 'active'),
('sys_001', 'system_admin', '2021-08-13 18:16:04', 'logged out', 'active'),
('sys_001', 'system_admin', '2021-08-13 18:24:38', 'logged in', 'active');

-- --------------------------------------------------------

--
-- Stand-in structure for view `log_vw`
-- (See below for the actual view)
--
CREATE TABLE `log_vw` (
`full_name` varchar(102)
,`employee_no` varchar(10)
,`action` varchar(50)
,`time_log` datetime
,`display` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `medical_requirement`
--

CREATE TABLE `medical_requirement` (
  `student_no` varchar(10) NOT NULL,
  `illness_code` varchar(10) NOT NULL,
  `school_year` varchar(10) NOT NULL,
  `semester` varchar(10) NOT NULL,
  `datetime_medical` datetime NOT NULL,
  `display` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medical_requirement`
--

INSERT INTO `medical_requirement` (`student_no`, `illness_code`, `school_year`, `semester`, `datetime_medical`, `display`) VALUES
('19-63-010', 'Dtl1', '2021-2020', 'First', '2021-08-13 18:22:16', 'active'),
('19-63-010', 'Mdcn4', '2021-2020', 'First', '2021-08-13 18:22:55', 'active');

-- --------------------------------------------------------

--
-- Stand-in structure for view `medreq_records_vw`
-- (See below for the actual view)
--
CREATE TABLE `medreq_records_vw` (
`student_no` varchar(10)
,`full_name` varchar(101)
,`age` double(17,0)
,`course_code` varchar(10)
,`college_code` varchar(10)
,`illness_code` varchar(10)
,`illness_desc` varchar(500)
,`SY` varchar(10)
,`semester` varchar(10)
,`datetime_medical` datetime
,`display` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `notconsulted_medreqvw`
-- (See below for the actual view)
--
CREATE TABLE `notconsulted_medreqvw` (
`student_no` varchar(10)
,`full_name` varchar(101)
,`age` double(17,0)
,`illness_code` varchar(10)
,`diagnosis` varchar(50)
,`display` varchar(20)
,`date_prepared` datetime
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `profile_vw`
-- (See below for the actual view)
--
CREATE TABLE `profile_vw` (
`employee_no` varchar(10)
,`position` varchar(20)
,`full_name` varchar(101)
,`email` varchar(50)
,`birthday` date
,`age` double(17,0)
,`mobile_number` varchar(20)
,`address` varchar(100)
,`gender` varchar(7)
,`profile_pic` varchar(500)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `records_vw`
-- (See below for the actual view)
--
CREATE TABLE `records_vw` (
`attending_physician` varchar(50)
,`date_consulted` datetime
,`diagnosis` varchar(50)
,`student_no` varchar(10)
,`FULL_NAME` varchar(101)
,`age` double(17,0)
,`illness_code` varchar(10)
,`illness_desc` varchar(500)
,`semester` varchar(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `employee_no` varchar(10) NOT NULL,
  `day` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `display` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`employee_no`, `day`, `time`, `display`) VALUES
('den_001', 'M W F', '5-10', 'active'),
('den_002', 'T', '5AM - 5PM', 'active'),
('doc_001', 'M T W TH F S', '5AM - 5PM', 'active'),
('doc_002', 'M T W TH F S', '5AM - 5PM', 'active'),
('nur_001', 'M T W TH F S', '5AM - 5PM', 'active'),
('nur_002', 'M T W TH F S', '5AM - 5PM', 'active'),
('sys_001', '', '', 'inactive');

-- --------------------------------------------------------

--
-- Stand-in structure for view `schedule_vw`
-- (See below for the actual view)
--
CREATE TABLE `schedule_vw` (
`employee_no` varchar(10)
,`full_name` varchar(101)
,`employee_position` varchar(20)
,`day` varchar(50)
,`time` varchar(50)
,`display` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_no` varchar(10) NOT NULL,
  `stud_lname` varchar(50) NOT NULL,
  `stud_fname` varchar(50) NOT NULL,
  `stud_email` varchar(50) NOT NULL,
  `stud_gender` varchar(7) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `birthday` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_no`, `stud_lname`, `stud_fname`, `stud_email`, `stud_gender`, `course_code`, `birthday`) VALUES
('19-63-010', 'Raynog', 'John Rafael', 'johnrafaelraynog@gmail', 'Male', 'BSIT', '1999-12-14'),
('21-10-002', 'Pandagani', 'Grace', 'GracePandagani@gmail.com', 'Female', 'STEM', '2000-6-11'),
('21-10-003', 'Gomez', 'London', 'LondonGomez@gmail.com', 'Male', 'STEM', '2001-3-25'),
('21-10-004', 'Tubil', 'Glen', 'GlenTubil@gmail.com', 'Male', 'STEM', '2000-4-17'),
('21-10-005', 'Dumalog', 'James', 'JamesDumalog@gmail.com', 'Male', 'STEM', '1999-5-15'),
('21-10-006', 'Demo', 'Pork', 'PorkDemo@gmail.com', 'FEMALE', 'STEM', '2000-1-1'),
('21-10-007', 'Delos Santos', 'Glenda', 'GlendaDelosSantos@gmail.com', 'FEMALE', 'STEM', '2000-1-2'),
('21-10-008', 'Bumindong', 'Livie', 'LivieBumindong@gmail.com', 'FEMALE', 'STEM', '2000-1-3'),
('21-10-009', 'Valeriano', 'Michaela', 'MichaelaValeriano@gmail.com', 'FEMALE', 'STEM', '2000-2-4'),
('21-10-010', 'Ambong', 'Cyril', 'CyrilAmbong@gmail.com', 'FEMALE', 'STEM', '2000-2-5'),
('21-11-001', 'Ambion', 'Anna', 'AnnaAmbion@gmail.com', 'Female', 'ABM', '1999-5-15'),
('21-11-002', 'Segoria', 'Nicka', 'NickaSegoria@gmail.com', 'Female', 'ABM', '2002-2-13'),
('21-11-003', 'Fajardo', 'Jobandy', 'JobandyFajardo@gmail.com', 'Male', 'ABM', '1999-4-17'),
('21-11-004', 'Tuliao', 'Perfecto', 'Perfecto Tuliao@gmail.com', 'Male', 'ABM', '2000-8-1'),
('21-11-005', 'Arnais', 'Lita', 'Lita Arnais@gmail.com', 'Female', 'ABM', '2000-8-8'),
('21-11-006', 'Tay', 'Carda', 'CardaTay@gmail.com', 'FEMALE', 'ABM', '2000-2-6'),
('21-11-007', 'Dor', 'Freddie', 'FreddieDor@gmail.com', 'FEMALE', 'ABM', '2000-3-7'),
('21-11-008', 'Yuson', 'Danila', 'DanilaYuson@gmail.com', 'FEMALE', 'ABM', '2000-3-8'),
('21-11-009', 'Gebelto', 'Bacoy', 'BacoyGebelto@gmail.com', 'FEMALE', 'ABM', '2000-3-9'),
('21-11-010', 'Hunco', 'Lay', 'LayHunco@gmail.com', 'FEMALE', 'ABM', '2000-4-10'),
('21-12-001', 'Ramirez', 'Billy', 'BillyRamirez@gmail.com', 'Male', 'HUMMS', '2001-9-21'),
('21-12-002', 'Lerion', 'Lito', 'LitoLerion@gmail.com', 'Male', 'HUMMS', '2000-03-29'),
('21-12-003', 'Embalsando', 'Michael', 'MichaelEmbalsando@gmail.com', 'Male', 'HUMMS', '2001-11-1'),
('21-12-004', 'Finas', 'Jonathan', 'JonathanFinas@gmail.com', 'Male', 'HUMMS', '2002-10-2'),
('21-12-005', 'Silva', 'Philipi', 'PhilipiSilva@gmail.com', 'Male', 'HUMMS', '2001-12-31'),
('21-12-006', 'Malinay', 'kay', 'kayMalinay@gmail.com', 'FEMALE', 'HUMMS', '2000-4-11'),
('21-12-007', 'Abalong', 'Gestoni', 'GestoniAbalong@gmail.com', 'FEMALE', 'HUMMS', '2000-4-12'),
('21-12-008', 'Aguida', 'Jayda', 'JaydaAguida@gmail.com', 'FEMALE', 'HUMMS', '2000-5-13'),
('21-12-009', 'Laborte', 'Michelle', 'MichelleLaborte@gmail.com', 'FEMALE', 'HUMMS', '2000-5-14'),
('21-12-010', 'Tecson', 'Rexa', 'RexaTecson@gmail.com', 'FEMALE', 'HUMMS', '2000-5-15'),
('21-13-001', 'Benalaga', 'George', 'GeorgeBenalaga@gmail.com', 'Male', 'GAS', '1999-12-6'),
('21-13-002', 'Raffy', 'Nina', 'NinaRaffy@gmail.com', 'Female', 'GAS', '2000-3-6'),
('21-13-003', 'Barro', 'Edgar', 'EdgarBarro@gmail.com', 'Male', 'GAS', '2001-12-19'),
('21-13-004', 'Abejero', 'George', 'GeorgeAbejero@gmail.com', 'Female', 'GAS', '2000-5-15'),
('21-13-005', 'Montederamo', 'Albert', 'AlbertMontederamo@gmail.com', 'Male', 'GAS', '2000-6-20'),
('21-13-006', 'Cadalso', 'Pauline', 'PaulineCadalso@gmail.com', 'FEMALE', 'GAS', '2000-6-16'),
('21-13-007', 'Tatan', 'Tea', 'TeaTatan@gmail.com', 'FEMALE', 'GAS', '2000-6-17'),
('21-13-008', 'Acar', 'Lea', 'LeaAcar@gmail.com', 'FEMALE', 'GAS', '2000-6-18'),
('21-13-009', 'Ruldado', 'Nico', 'NicoRuldado@gmail.com', 'MALE', 'GAS', '2000-7-19'),
('21-13-010', 'Rojo', 'Alex', 'AlexRojo@gmail.com', 'MALE', 'GAS', '2000-7-20'),
('21-14-001', 'Tandong', 'Noimelyn', 'NoimelynTandong@gmail.com', 'Female', 'BSECE', '2000-7-25'),
('21-14-002', 'Cadandag', 'John', 'JohnCadandag@gmail.com', 'Male', 'BSECE', '2000-5-15'),
('21-14-003', 'Labrador', 'Mila', 'MilaLabrador@gmail.com', 'Female', 'BSECE', '2000-4-15'),
('21-14-004', 'Magalso', 'Kent', 'KentMagalso@gmail.com', 'Male', 'BSECE', '2000-05-15'),
('21-14-005', 'Alviola', 'Chris', 'ChrisAlviola@gmail.com', 'Male', 'BSECE', '2000-7-16'),
('21-14-006', 'Acalal', 'Adrian', 'AdrianAcalal@gmail.com', 'MALE', 'BSECE', '2000-7-21'),
('21-14-007', 'Gesas', 'Angelo', 'AngeloGesas@gmail.com', 'MALE', 'BSECE', '2000-8-22'),
('21-14-008', 'Ambid', 'Jade', 'JadeAmbid@gmail.com', 'MALE', 'BSECE', '2000-8-23'),
('21-14-009', 'Ryses', 'Felix', 'FelixRyses@gmail.com', 'MALE', 'BSECE', '2000-8-24'),
('21-14-010', 'Fajardo', 'Mark', 'MarkFajardo@gmail.com', 'MALE', 'BSECE', '2000-9-25'),
('21-15-001', 'Velasco', 'Dani', 'DaniVelasco@gmail.com', 'Female', 'BSCOE', '2000-8-17'),
('21-15-002', 'Cataylo', 'Jefferson', 'JeffersonCataylo@gmail.com', 'Male', 'BSCOE', '2000-9-18'),
('21-15-003', 'Masanasas', 'Jeford', 'JefordMasanasas@gmail.com', 'Male', 'BSCOE', '2000-10-19'),
('21-15-004', 'Urciada', 'Aljun', 'AljunUrciada@gmail.com', 'Male', 'BSCOE', '2000-11-20'),
('21-15-005', 'Orain', 'Gerson', 'GersonOrain@gmail.com', 'Female', 'BSCOE', '2000-12-21'),
('21-15-006', 'Yadres', 'Aila', 'AilaYadres@gmail.com', 'MALE', 'BSCOE', '2000-9-26'),
('21-15-007', 'Wordet', 'Kai', 'KaiWordet@gmail.com', 'MALE', 'BSCOE', '2000-9-27'),
('21-15-008', 'Lubal', 'Ken', 'KenLubal@gmail.com', 'MALE', 'BSCOE', '2000-10-28'),
('21-15-009', 'Abante', 'Teling', 'TelingAbante@gmail.com', 'MALE', 'BSCOE', '2000-10-29'),
('21-15-010', 'Abante', 'Teling', 'TelingAbante@gmail.com', 'MALE', 'BSCOE', '2000-10-29'),
('21-16-001', 'Lanaguin', 'Junryl', 'JunrylLanaguin@gmail.com', 'Female', 'BSIT', '2001-1-1'),
('21-16-002', 'Obanana', 'Peter', 'PeterObanana@gmail.com', 'Male', 'BSIT', '2001-8-16'),
('21-16-003', 'German', 'Obert', 'ObertGerman@gmail.com', 'Male', 'BSIT', '2002-8-17'),
('21-16-004', 'Abaldo', 'Orlando', 'OrlandoAbaldo@gmail.com', 'Male', 'BSIT', '2001-8-10'),
('21-16-005', 'Montemayor', 'Jessie', 'JessieMontemayor@gmail.com', 'Female', 'BSIT', '2000-2-20'),
('21-16-006', 'Sagunza', 'Mark', 'MarkSagunza@gmail.com', 'MALE', 'BSIT', '2000-10-30'),
('21-16-007', 'Acansa', 'Ricorong', 'RicorongAcansa@gmail.com', 'MALE', 'BSIT', '2000-11-1'),
('21-16-008', 'Suyon', 'jake', 'jakeSuyon@gmail.com', 'MALE', 'BSIT', '2000-11-2'),
('21-16-009', 'Cruz', 'Jone', 'JoneCruz@gmail.com', 'MALE', 'BSIT', '2000-11-3'),
('21-16-010', 'Pallado', 'Albert', 'AlbertPallado@gmail.com', 'MALE', 'BSIT', '2000-12-6'),
('21-17-001', 'Magalso', 'Raffy', 'RaffyMagalso@gmail.com', 'Female', 'BSN', '2001-7-16'),
('21-17-002', 'Tenorio', 'Darius', 'DariusTenorio@gmail.com', 'Male', 'BSN', '2000-9-21'),
('21-17-003', 'Asmanulla', 'Ar', 'ArAsmanulla@gmail.com', 'Female', 'BSN', '1999-2-13'),
('21-17-004', 'Redal', 'Kentoy', 'KentoyRedal@gmail.com', 'Male', 'BSN', '2000-2-29'),
('21-17-005', 'Ragay', 'Ethan', 'EthanRagay@gmail.com', 'Male', 'BSN', '2001-11-16'),
('21-17-006', 'Badusac', 'Jose', 'JoseBadusac@gmail.com', 'MALE', 'BSN', '2000-12-7'),
('21-17-007', 'Ali', 'Bergie', 'BergieAli@gmail.com', 'MALE', 'BSN', '2000-12-8'),
('21-17-008', 'Andalado', 'Flonita', 'FlonitaAndalado@gmail.com', 'MALE', 'BSN', '2001-1-1'),
('21-17-009', 'Cadut', 'Jm', 'JmCadut@gmail.com', 'MALE', 'BSN', '2001-1-2'),
('21-17-010', 'Greyoc', 'Roy', 'RoyGreyoc@gmail.com', 'MALE', 'BSN', '2001-1-3'),
('21-18-001', 'Cansino', 'Jomme', 'JommeCansino@gmail.com', 'Male', 'BSPT', '2002-9-22'),
('21-18-002', 'Ubog', 'Abay', 'AbayUbog@gmail.com', 'Female', 'BSPT', '2000-7-16'),
('21-18-003', 'Tubio', 'Joseph', 'JosephTubio@gmail.com', 'Male', 'BSPT', '2000-7-16'),
('21-18-004', 'Ramos', 'Eduardo', 'EduardoRamos@gmail.com', 'Male', 'BSPT', '2000-7-17'),
('21-18-005', 'Laida', 'Dinda', 'DindaLaida@gmail.com', 'Female', 'BSPT', '2000-7-18'),
('21-18-006', 'Fabian', 'Lay', 'LayFabian@gmail.com', 'FEMALE', 'BSPT', '2001-2-4'),
('21-18-007', 'Cruz', 'Marjun', 'MarjunCruz@gmail.com', 'MALE', 'BSPT', '2001-2-5'),
('21-18-008', 'Yria', 'Rey', 'ReyYria@gmail.com', 'MALE', 'BSPT', '2001-2-6'),
('21-18-009', 'Altubar', 'Feance', 'FeanceAltubar@gmail.com', 'MALE', 'BSPT', '2001-3-7'),
('21-18-010', 'Palone', 'Banhce', 'BanhcePalone@gmail.com', 'MALE', 'BSPT', '2001-3-8'),
('21-19-002', 'Avid', 'Anton', 'AntonAvid@gmail.com', 'Male', 'BSCRIM', '2000-7-19'),
('21-19-003', 'Pacondo', 'Leonardo', 'LeonardoPacondo@gmail.com', 'Male', 'BSCRIM', '2000-7-20'),
('21-19-004', 'Generoso', 'Roger', 'RogerGeneroso@gmail.com', 'Male', 'BSCRIM', '2000-7-21'),
('21-19-005', 'Tenechio', 'Daniel', 'DanielTenechio@gmail.com', 'Male', 'BSCRIM', '2000-7-22'),
('21-19-006', 'Balanay', 'Jocel', 'JocelBalanay@gmail.com', 'FEMALE', 'BSCRIM', '2001-3-9'),
('21-19-007', 'Beconta', 'Paying', 'PayingBeconta@gmail.com', 'FEMALE', 'BSCRIM', '2001-4-10'),
('21-19-008', 'Catipay', 'Bason', 'BasonCatipay@gmail.com', 'MALE', 'BSCRIM', '2001-4-11'),
('21-19-009', 'Alejo', 'Jomarie', 'JomarieAlejo@gmail.com', 'FEMALE', 'BSCRIM', '2001-4-12'),
('21-19-010', 'Domingo', 'Dexter', 'DexterDomingo@gmail.com', 'MALE', 'BSCRIM', '2001-5-13'),
('21-20-001', 'Acap', 'Jenard', 'JenardAcap@gmail.com', 'Male', 'BSED_ENG', '2000-7-23'),
('21-20-002', 'Ading', 'Nelson', 'NelsonAding@gmail.com', 'Male', 'BSED_ENG', '2000-7-24'),
('21-20-003', 'Aboy', 'Louie', 'LouieAboy@gmail.com', 'Male', 'BSED_ENG', '2000-7-25'),
('21-20-004', 'Alcantara', 'Joseph', 'JosephAlcantara@gmail.com', 'Male', 'BSED_ENG', '2000-7-26'),
('21-20-005', 'Guam', 'Roger', 'RogerGuam@gmail.com', 'Male', 'BSED_ENG', '2000-7-27'),
('21-20-006', 'Valecer', 'Simon', 'SimonValecer@gmail.com', 'MALE', 'BSED_ENG', '2001-5-14'),
('21-20-007', 'Gumanad', 'Genie', 'GenieGumanad@gmail.com', 'FEMALE', 'BSED_ENG', '2001-5-15'),
('21-20-008', 'Benzon', 'Kelly', 'KellyBenzon@gmail.com', 'FEMALE', 'BSED_ENG', '2001-6-16'),
('21-20-009', 'Crisonto', 'John', 'JohnCrisonto@gmail.com', 'MALE', 'BSED_ENG', '2001-6-17'),
('21-20-010', 'Legados', 'Zaldy', 'ZaldyLegados@gmail.com', 'FEMALE', 'BSED_ENG', '2001-6-18'),
('21-21-001', 'Nico', 'Babor', 'BaborNico@gmail.com', 'Female', 'BSED_SCI', '2000-7-28'),
('21-21-002', 'Alud', 'Justin', 'JustinAlud@gmail.com', 'Female', 'BSED_SCI', '2000-7-29'),
('21-21-003', 'Duros', 'Losinito', 'LosinitoDuros@gmail.com', 'Female', 'BSED_SCI', '2000-7-30'),
('21-21-004', 'Saini', 'Mica', 'MicaSaini@gmail.com', 'Female', 'BSED_SCI', '2000-8-1'),
('21-21-005', 'Gunatalon', 'Mark', 'MarkGunatalon@gmail.com', 'Male', 'BSED_SCI', '2000-8-2'),
('21-21-006', 'Jarbanido', 'Mark', 'MarkJarbanido@gmail.com', 'MALE', 'BSED_SCI', '2001-7-19'),
('21-21-007', 'Llena', 'Nico', 'NicoLlena@gmail.com', 'FEMALE', 'BSED_SCI', '2001-7-20'),
('21-21-008', 'Palomar', 'Steve', 'StevePalomar@gmail.com', 'MALE', 'BSED_SCI', '2001-7-21'),
('21-21-009', 'Gongob', 'Ivan', 'IvanGongob@gmail.com', 'MALE', 'BSED_SCI', '2001-8-22'),
('21-21-010', 'Atad', 'Julius', 'JuliusAtad@gmail.com', 'MALE', 'BSED_SCI', '2001-8-23'),
('21-22-001', 'Dannie', 'Tayco', 'TaycoDannie@gmail.com', 'Male', 'BSED_MATH', '2000-8-3'),
('21-22-002', 'Fino', 'Lorence', 'LorenceFino@gmail.com', 'Male', 'BSED_MATH', '2000-8-4'),
('21-22-003', 'Francisco', 'Allan', 'AllanFrancisco@gmail.com', 'Male', 'BSED_MATH', '2000-8-5'),
('21-22-004', 'Gobert', 'Jericho', 'JerichoGobert@gmail.com', 'Male', 'BSED_MATH', '2000-8-6'),
('21-22-005', 'Constantino', 'Biansa', 'BiansaConstantino@gmail.com', 'Female', 'BSED_MATH', '2000-8-7'),
('21-22-006', 'Tinonas', 'Aldrich', 'AldrichTinonas@gmail.com', 'MALE', 'BSED_MATH', '2001-8-24'),
('21-22-007', 'Sison', 'Erven', 'ErvenSison@gmail.com', 'FEMALE', 'BSED_MATH', '2001-9-25'),
('21-22-008', 'Paul', 'Sara', 'SaraPaul@gmail.com', 'MALE', 'BSED_MATH', '2001-9-26'),
('21-22-009', 'Bacloan', 'Ian', 'IanBacloan@gmail.com', 'MALE', 'BSED_MATH', '2001-9-27'),
('21-22-010', 'Dario', 'Malou', 'MalouDario@gmail.com', 'FEMALE', 'BSED_MATH', '2001-10-28'),
('21-23-001', 'Philip', 'Saliva', 'SalivaPhilip@gmail.com', 'Female', 'BSPE', '2000-8-8'),
('21-23-002', 'Acan', 'Miralito', 'MiralitoAcan@gmail.com', 'Female', 'BSPE', '2000-8-9'),
('21-23-003', 'Calumpong', 'Juntine', 'JuntineCalumpong@gmail.com', 'Female', 'BSPE', '2000-8-10'),
('21-23-004', 'Dave', 'Greson', 'GresonDave@gmail.com', 'Male', 'BSPE', '2000-8-11'),
('21-23-005', 'Pinili', 'Alanico', 'AlanicoPinili@gmail.com', 'Male', 'BSPE', '2000-8-12'),
('21-23-006', 'Aluso', 'Raul', 'RaulAluso@gmail.com', 'MALE', 'BSPE', '2001-10-29'),
('21-23-007', 'Barbara', 'Zusimo', 'ZusimoBarbara@gmail.com', 'FEMALE', 'BSPE', '2001-10-30'),
('21-23-008', 'Abey', 'Elter', 'ElterAbey@gmail.com', 'FEMALE', 'BSPE', '2001-11-1'),
('21-23-009', 'Corforal', 'Benjie', 'BenjieCorforal@gmail.com', 'MALE', 'BSPE', '2001-11-2'),
('21-23-010', 'Dagoy', 'Louie', 'LouieDagoy@gmail.com', 'MALE', 'BSPE', '2001-11-3'),
('21-24-001', 'Canete', 'Jerald', 'JeraldCanete@gmail.com', 'Male', 'BSA', '2000-8-13'),
('21-24-002', 'Madox', 'Medina', 'MedinaMadox@gmail.com', 'Female', 'BSA', '2000-8-14'),
('21-24-003', 'Tubio', 'Irene', 'IreneTubio@gmail.com', 'Female', 'BSA', '2000-8-15'),
('21-24-004', 'Rannie', 'Caminse', 'CaminseRannie@gmail.com', 'Female', 'BSA', '2000-8-16'),
('21-24-005', 'Espina', 'James', 'JamesEspina@gmail.com', 'Male', 'BSA', '2000-8-17'),
('21-24-006', 'Alorrey', 'Jelo', 'JeloAlorrey@gmail.com', 'MALE', 'BSA', '2001-12-6'),
('21-24-007', 'Dinglasa', 'Champ', 'ChampDinglasa@gmail.com', 'FEMALE', 'BSA', '2001-12-7'),
('21-24-008', 'Tocson', 'Alexander', 'AlexanderTocson@gmail.com', 'MALE', 'BSA', '2001-12-8'),
('21-24-009', 'Alcasar', 'Jerson', 'JersonAlcasar@gmail.com', 'MALE', 'BSA', '2002-1-1'),
('21-24-010', 'Basco', 'Nenota', 'NenotaBasco@gmail.com', 'FEMALE', 'BSA', '2002-1-2'),
('21-25-001', 'Pillar', 'Juanita', 'JuanitaPillar@gmail.com', 'Female', 'BSE', '2000-8-18'),
('21-25-002', 'Tagayon', 'Elemer', 'ElemerTagayon@gmail.com', 'Male', 'BSE', '2000-8-19'),
('21-25-003', 'Ramirez', 'Richard', 'RichardRamirez@gmail.com', 'Male', 'BSE', '2000-8-20'),
('21-25-004', 'Bayubay', 'Tyron', 'TyronBayubay@gmail.com', 'Male', 'BSE', '2000-8-21'),
('21-25-005', 'Serim', 'Daryl', 'DarylSerim@gmail.com', 'Male', 'BSE', '2000-8-22'),
('21-25-006', 'Diaz', 'John', 'JohnDiaz@gmail.com', 'MALE', 'BSE', '2002-1-3'),
('21-25-007', 'Paquia', 'Marlou', 'MarlouPaquia@gmail.com', 'FEMALE', 'BSE', '2002-2-4'),
('21-25-008', 'Cristobal', 'Javier', 'JavierCristobal@gmail.com', 'MALE', 'BSE', '2002-2-5'),
('21-25-009', 'Porson', 'Dexter', 'DexterPorson@gmail.com', 'MALE', 'BSE', '2002-2-6'),
('21-25-010', 'Allen', 'Charles', 'CharlesAllen@gmail.com', 'MALE', 'BSE', '2002-3-7'),
('21-26-001', 'Ablao', 'Nathaniel', 'NathanielAblao@gmail.com', 'Male', 'BSBA', '2000-8-23'),
('21-26-002', 'Renie', 'Alar', 'AlarRenie@gmail.com', 'Female', 'BSBA', '2000-8-24'),
('21-26-003', 'Barasa', 'Edwin', 'EdwinBarasa@gmail.com', 'Male', 'BSBA', '2000-8-25'),
('21-26-004', 'Salao', 'Rony', 'RonySalao@gmail.com', 'Male', 'BSBA', '2000-8-26'),
('21-26-005', 'Amil', 'Jannah', 'JannahAmil@gmail.com', 'Female', 'BSBA', '2000-8-27'),
('21-26-006', 'Gabutero', 'Adrian', 'AdrianGabutero@gmail.com', 'MALE', 'BSBA', '2002-3-8'),
('21-26-007', 'Castillon', 'Genie', 'GenieCastillon@gmail.com', 'FEMALE', 'BSBA', '2002-3-9'),
('21-26-008', 'Atienza', 'Francisco', 'FranciscoAtienza@gmail.com', 'MALE', 'BSBA', '2002-4-10'),
('21-26-009', 'Allado', 'Gerry', 'GerryAllado@gmail.com', 'FEMALE', 'BSBA', '2002-4-11'),
('21-26-010', 'Ferraren', 'John', 'JohnFerraren@gmail.com', 'MALE', 'BSBA', '2002-4-12'),
('21-27-001', 'Carate', 'Pelerio', 'PelerioCarate@gmail.com', 'Female', 'BSHRDM', '2000-8-28'),
('21-27-002', 'Amil', 'Christophe', 'ChristopheAmil@gmail.com', 'Male', 'BSHRDM', '2000-8-29'),
('21-27-003', 'Margaso', 'James', 'JamesMargaso@gmail.com', 'Male', 'BSHRDM', '2000-8-30'),
('21-27-004', 'Labrador', 'Arvin', 'ArvinLabrador@gmail.com', 'Male', 'BSHRDM', '2000-9-1'),
('21-27-005', 'Montecillo', 'Joey', 'JoeyMontecillo@gmail.com', 'Male', 'BSHRDM', '2000-9-2'),
('21-27-006', 'Pastanes', 'Aldrin', 'AldrinPastanes@gmail.com', 'MALE', 'BSHRDM', '2002-5-13'),
('21-27-007', 'Tejano', 'Chris John', 'ChrisJohnTejano@gmail.com', 'MALE', 'BSHRDM', '2002-5-14'),
('21-27-008', 'Abadilo', 'Anne', 'AnneAbadilo@gmail.com', 'FEMALE', 'BSHRDM', '2002-5-15'),
('21-27-009', 'Banuea', 'Mark', 'MarkBanuea@gmail.com', 'MALE', 'BSHRDM', '2002-6-16'),
('21-27-010', 'Carlito', 'Hubert', 'HubertCarlito@gmail.com', 'MALE', 'BSHRDM', '2002-6-17'),
('21-28-001', 'Taguim', 'Mitsi', 'MitsiTaguim@gmail.com', 'Female', 'LAW', '2000-9-3'),
('21-28-002', 'Decero', 'Mina', 'MinaDecero@gmail.com', 'Female', 'LAW', '2000-9-4'),
('21-28-003', 'Reyes', 'Karl', 'KarlReyes@gmail.com', 'Male', 'LAW', '2000-9-5'),
('21-28-004', 'Merto', 'Kent', 'KentMerto@gmail.com', 'Male', 'LAW', '2000-9-6'),
('21-28-005', 'Flores', 'Charlie', 'CharlieFlores@gmail.com', 'Female', 'LAW', '2000-9-7'),
('21-28-006', 'Abing', 'Alvina', 'AlvinaAbing@gmail.com', 'FEMALE', 'LAW', '2002-6-18'),
('21-28-007', 'Arroyo', 'Jerome', 'JeromeArroyo@gmail.com', 'MALE', 'LAW', '2002-7-19'),
('21-28-008', 'Manolo', 'Vincent', 'VincentManolo@gmail.com', 'MALE', 'LAW', '2002-7-20'),
('21-28-009', 'Villanueva', 'Joshua', 'JoshuaVillanueva@gmail.com', 'MALE', 'LAW', '2002-7-21'),
('21-28-010', 'Pinas', 'Angelou', 'AngelouPinas@gmail.com', 'FEMALE', 'LAW', '2002-8-22'),
('21-29-001', 'Sayman', 'Anne', 'AnneSayman@gmail.com', 'Female', 'BSPSYCH', '2000-9-8'),
('21-29-002', 'Gadayan', 'John', 'JohnGadayan@gmail.com', 'Male', 'BSPSYCH', '2000-9-9'),
('21-29-003', 'Cabajes', 'Brayan', 'BrayanCabajes@gmail.com', 'Male', 'BSPSYCH', '2000-9-10'),
('21-29-004', 'Banagua', 'Arnela', 'ArnelaBanagua@gmail.com', 'Female', 'BSPSYCH', '2000-9-11'),
('21-29-005', 'Garsua', 'Danila', 'DanilaGarsua@gmail.com', 'Female', 'BSPSYCH', '2000-9-12'),
('21-29-006', 'Mipadiun', 'Edrian', 'EdrianMipadiun@gmail.com', 'MALE', 'BSPSYCH', '2002-8-23'),
('21-29-007', 'Sarnasi', 'cris', 'crisSarnasi@gmail.com', 'FEMALE', 'BSPSYCH', '2002-8-24'),
('21-29-008', 'Merced', 'Jessa Mae', 'JessaMaeMerced@gmail.com', 'FEMALE', 'BSPSYCH', '2002-9-25'),
('21-29-009', 'Tamayo', 'Randy', 'RandyTamayo@gmail.com', 'MALE', 'BSPSYCH', '2002-9-26'),
('21-29-010', 'Palomar', 'Angel Mae', 'AngelMaePalomar@gmail.com', 'FEMALE', 'BSPSYCH', '2002-9-27'),
('21-30-001', 'Codura', 'Rico', 'RicoCodura@gmail.com', 'Male', 'BAC', '2000-9-13'),
('21-30-002', 'Pinero', 'Anthony', 'AnthonyPinero@gmail.com', 'Male', 'BAC', '2000-9-14'),
('21-30-003', 'Sampilo', 'Foren', 'ForenSampilo@gmail.com', 'Male', 'BAC', '2000-9-15'),
('21-30-004', 'Cuizon', 'Bryan', 'BryanCuizon@gmail.com', 'Male', 'BAC', '2000-9-16'),
('21-30-005', 'Salatan', 'Fernando', 'FernandoSalatan@gmail.com', 'Male', 'BAC', '2000-9-17'),
('21-30-006', 'Calunod', 'Joven', 'JovenCalunod@gmail.com', 'MALE', 'BAC', '2002-10-28'),
('21-30-007', 'Faustor', 'Justin', 'JustinFaustor@gmail.com', 'MALE', 'BAC', '2002-10-29'),
('21-30-008', 'Lazaga', 'Mark', 'MarkLazaga@gmail.com', 'MALE', 'BAC', '2002-10-30'),
('21-30-009', 'Calumba', 'Francisca', 'FranciscaCalumba@gmail.com', 'FEMALE', 'BAC', '2002-11-1'),
('21-30-010', 'Mapili', 'Ac', 'AcMapili@gmail.com', 'MALE', 'BAC', '2002-11-2'),
('21-31-001', 'Coron', 'Nico', 'NicoCoron@gmail.com', 'Male', 'BAPS', '2000-9-18'),
('21-31-002', 'Pineda', 'Anthony', 'AnthonyPineda@gmail.com', 'Male', 'BAPS', '2000-9-19'),
('21-31-003', 'Reyes', 'Jon', 'JonReyes@gmail.com', 'Male', 'BAPS', '2000-9-20'),
('21-31-004', 'Quizon', 'Brent', 'BrentQuizon@gmail.com', 'Male', 'BAPS', '2000-9-21'),
('21-31-005', 'Satillan', 'Fernando', 'FernandoSantillan@gmail.com', 'Male', 'BAPS', '2000-9-22'),
('21-31-006', 'Tamayo', 'Jimmy', 'JimmyTamayo@gmail.com', 'MALE', 'BAPS', '2002-11-3'),
('21-31-007', 'Raguin', 'Aj', 'AjRaguin@gmail.com', 'FEMALE', 'BAPS', '2002-12-6'),
('21-31-008', 'Palomar', 'Jaymay', 'JaymayPalomar@gmail.com', 'MALE', 'BAPS', '2002-12-7'),
('21-31-009', 'Espanola', 'Joe', 'JoeEspanola@gmail.com', 'MALE', 'BAPS', '2002-12-8'),
('21-31-010', 'Mendoza', 'Rodrich', 'RodrichMendoza@gmail.com', 'MALE', 'BAPS', '1999-4-2');

-- --------------------------------------------------------

--
-- Stand-in structure for view `student_vw`
-- (See below for the actual view)
--
CREATE TABLE `student_vw` (
`student_no` varchar(10)
,`full_name` varchar(101)
,`age` double(17,0)
,`stud_gender` varchar(7)
,`course_code` varchar(10)
,`college_code` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `stud_consultation_vw`
-- (See below for the actual view)
--
CREATE TABLE `stud_consultation_vw` (
`student_no` varchar(10)
,`stud_lname` varchar(50)
,`stud_fname` varchar(50)
,`stud_email` varchar(50)
,`stud_gender` varchar(7)
,`birthday` varchar(20)
,`illness_code` varchar(10)
,`college_code` varchar(10)
,`course_code` varchar(10)
,`date_prepared` datetime
,`date_consulted` datetime
,`age` double(17,0)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `stud_consult_vw`
-- (See below for the actual view)
--
CREATE TABLE `stud_consult_vw` (
`student_no` varchar(10)
,`stud_fname` varchar(50)
,`stud_lname` varchar(50)
,`stud_email` varchar(50)
,`birthday` varchar(20)
,`stud_gender` varchar(7)
,`illness_code` varchar(10)
,`school_year` varchar(10)
,`semester` varchar(10)
,`course_code` varchar(10)
,`college_code` varchar(10)
,`datetime_medical` datetime
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `employee_no` varchar(10) NOT NULL,
  `password` varchar(50) NOT NULL DEFAULT 'udm@clinic',
  `role` varchar(20) NOT NULL DEFAULT 'admin',
  `display` varchar(20) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`employee_no`, `password`, `role`, `display`) VALUES
('1234', 'udm@clinic', 'admin', 'active'),
('den_001', '123', 'admin', 'active'),
('den_002', 'udm@clinic', 'admin', 'active'),
('doc_001', '123', 'admin', 'active'),
('doc_002', 'udm@clinic', 'admin', 'active'),
('doc_003', 'udm@clinic', 'admin', 'inactive'),
('nur_001', '123', 'admin', 'active'),
('nur_002', 'udm@clinic', 'admin', 'active'),
('sys_001', '123', 'system_admin', 'active');

-- --------------------------------------------------------

--
-- Stand-in structure for view `users_vw`
-- (See below for the actual view)
--
CREATE TABLE `users_vw` (
`username` varchar(10)
,`password` varchar(50)
,`role` varchar(20)
,`profile_picture` varchar(500)
,`full_name` varchar(101)
,`employee_no` varchar(10)
,`position` varchar(20)
,`gender` varchar(7)
,`birthday` date
,`email` varchar(50)
,`mobile_no` varchar(20)
,`address` varchar(100)
,`display` varchar(20)
,`age` double(17,0)
);

-- --------------------------------------------------------

--
-- Structure for view `consultation_vw`
--
DROP TABLE IF EXISTS `consultation_vw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `consultation_vw`  AS  select `st`.`student_no` AS `student_no`,`il`.`illness_code` AS `illness_code`,`il`.`illness_desc` AS `illness_desc`,`co`.`college_code` AS `college_code`,`cr`.`course_code` AS `course_code`,`cs`.`date_prepared` AS `date_prepared`,`cs`.`prepared_by` AS `prepared_by`,`cs`.`date_consulted` AS `date_consulted`,`cs`.`attending_physician` AS `attending_physician`,`cs`.`diagnosis` AS `diagnosis`,`cs`.`display` AS `display` from ((((`student` `st` join `course` `cr` on(`cr`.`course_code` = `st`.`course_code`)) join `college` `co` on(`co`.`college_code` = `cr`.`college_code`)) join `consultation` `cs` on(`cs`.`student_no` = `st`.`student_no`)) join `illness` `il` on(`il`.`illness_code` = `cs`.`illness_code`)) where `cs`.`display` = 'active' and `cs`.`diagnosis` <> 'not consulted' ;

-- --------------------------------------------------------

--
-- Structure for view `log_vw`
--
DROP TABLE IF EXISTS `log_vw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `log_vw`  AS  select concat(`emp`.`employee_fname`,', ',`emp`.`employee_lname`) AS `full_name`,`lg`.`employee_no` AS `employee_no`,`lg`.`action` AS `action`,`lg`.`time_log` AS `time_log`,`lg`.`display` AS `display` from (`log` `lg` join `employee` `emp` on(`lg`.`employee_no` = `emp`.`employee_no`)) where `lg`.`display` = 'active' ;

-- --------------------------------------------------------

--
-- Structure for view `medreq_records_vw`
--
DROP TABLE IF EXISTS `medreq_records_vw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `medreq_records_vw`  AS  select `st`.`student_no` AS `student_no`,concat(`st`.`stud_fname`,' ',`st`.`stud_lname`) AS `full_name`,date_format(from_days(to_days(current_timestamp()) - to_days(`st`.`birthday`)),'%Y') + 0 AS `age`,`cr`.`course_code` AS `course_code`,`co`.`college_code` AS `college_code`,`il`.`illness_code` AS `illness_code`,`il`.`illness_desc` AS `illness_desc`,`mr`.`school_year` AS `SY`,`mr`.`semester` AS `semester`,`mr`.`datetime_medical` AS `datetime_medical`,`mr`.`display` AS `display` from ((((`student` `st` join `medical_requirement` `mr` on(`st`.`student_no` = `mr`.`student_no`)) join `course` `cr` on(`cr`.`course_code` = `st`.`course_code`)) join `college` `co` on(`co`.`college_code` = `cr`.`college_code`)) join `illness` `il` on(`mr`.`illness_code` = `il`.`illness_code`)) where `mr`.`display` = 'active' ;

-- --------------------------------------------------------

--
-- Structure for view `notconsulted_medreqvw`
--
DROP TABLE IF EXISTS `notconsulted_medreqvw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `notconsulted_medreqvw`  AS  select `st`.`student_no` AS `student_no`,concat(`st`.`stud_fname`,' ',`st`.`stud_lname`) AS `full_name`,date_format(from_days(to_days(current_timestamp()) - to_days(`st`.`birthday`)),'%Y') + 0 AS `age`,`il`.`illness_code` AS `illness_code`,`cs`.`diagnosis` AS `diagnosis`,`cs`.`display` AS `display`,`cs`.`date_prepared` AS `date_prepared` from ((`consultation` `cs` join `student` `st` on(`st`.`student_no` = `cs`.`student_no`)) join `illness` `il` on(`il`.`illness_code` = `cs`.`illness_code`)) where `cs`.`diagnosis` = 'not consulted' and `cs`.`display` = 'active' ;

-- --------------------------------------------------------

--
-- Structure for view `profile_vw`
--
DROP TABLE IF EXISTS `profile_vw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `profile_vw`  AS  select `emp`.`employee_no` AS `employee_no`,`emp`.`employee_position` AS `position`,concat(`emp`.`employee_fname`,' ',`emp`.`employee_lname`) AS `full_name`,`emp`.`employee_email` AS `email`,`emp`.`employee_birthday` AS `birthday`,date_format(from_days(to_days(current_timestamp()) - to_days(`emp`.`employee_birthday`)),'%Y') + 0 AS `age`,`emp`.`employee_mobile` AS `mobile_number`,`emp`.`employee_address` AS `address`,`emp`.`employee_gender` AS `gender`,`emp`.`profile_picture` AS `profile_pic` from `employee` `emp` ;

-- --------------------------------------------------------

--
-- Structure for view `records_vw`
--
DROP TABLE IF EXISTS `records_vw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `records_vw`  AS  select `cs`.`attending_physician` AS `attending_physician`,`cs`.`date_consulted` AS `date_consulted`,`cs`.`diagnosis` AS `diagnosis`,`st`.`student_no` AS `student_no`,concat(`st`.`stud_fname`,' ',`st`.`stud_lname`) AS `FULL_NAME`,date_format(from_days(to_days(current_timestamp()) - to_days(`st`.`birthday`)),'%Y') + 0 AS `age`,`il`.`illness_code` AS `illness_code`,`il`.`illness_desc` AS `illness_desc`,`mr`.`semester` AS `semester` from (((`consultation` `cs` join `illness` `il` on(`cs`.`illness_code` = `il`.`illness_code`)) join `student` `st` on(`cs`.`student_no` = `st`.`student_no`)) join `medical_requirement` `mr` on(`cs`.`student_no` = `mr`.`student_no`)) ;

-- --------------------------------------------------------

--
-- Structure for view `schedule_vw`
--
DROP TABLE IF EXISTS `schedule_vw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `schedule_vw`  AS  select `em`.`employee_no` AS `employee_no`,concat(`em`.`employee_fname`,' ',`em`.`employee_lname`) AS `full_name`,`em`.`employee_position` AS `employee_position`,`sc`.`day` AS `day`,`sc`.`time` AS `time`,`sc`.`display` AS `display` from (`schedule` `sc` join `employee` `em` on(`em`.`employee_no` = `sc`.`employee_no`)) where `sc`.`display` = 'active' ;

-- --------------------------------------------------------

--
-- Structure for view `student_vw`
--
DROP TABLE IF EXISTS `student_vw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `student_vw`  AS  select `st`.`student_no` AS `student_no`,concat(`st`.`stud_fname`,' ',`st`.`stud_lname`) AS `full_name`,date_format(from_days(to_days(current_timestamp()) - to_days(`st`.`birthday`)),'%Y') + 0 AS `age`,`st`.`stud_gender` AS `stud_gender`,`st`.`course_code` AS `course_code`,`co`.`college_code` AS `college_code` from ((`student` `st` join `course` `cr` on(`cr`.`course_code` = `st`.`course_code`)) join `college` `co` on(`co`.`college_code` = `cr`.`college_code`)) ;

-- --------------------------------------------------------

--
-- Structure for view `stud_consultation_vw`
--
DROP TABLE IF EXISTS `stud_consultation_vw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stud_consultation_vw`  AS  select `st`.`student_no` AS `student_no`,`st`.`stud_lname` AS `stud_lname`,`st`.`stud_fname` AS `stud_fname`,`st`.`stud_email` AS `stud_email`,`st`.`stud_gender` AS `stud_gender`,`st`.`birthday` AS `birthday`,`il`.`illness_code` AS `illness_code`,`co`.`college_code` AS `college_code`,`cr`.`course_code` AS `course_code`,`cs`.`date_prepared` AS `date_prepared`,`cs`.`date_consulted` AS `date_consulted`,date_format(from_days(to_days(current_timestamp()) - to_days(`st`.`birthday`)),'%Y') + 0 AS `age` from ((((`student` `st` join `course` `cr` on(`cr`.`course_code` = `st`.`course_code`)) join `college` `co` on(`co`.`college_code` = `cr`.`college_code`)) join `consultation` `cs` on(`cs`.`student_no` = `st`.`student_no`)) join `illness` `il` on(`il`.`illness_code` = `cs`.`illness_code`)) ;

-- --------------------------------------------------------

--
-- Structure for view `stud_consult_vw`
--
DROP TABLE IF EXISTS `stud_consult_vw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stud_consult_vw`  AS  select `st`.`student_no` AS `student_no`,`st`.`stud_fname` AS `stud_fname`,`st`.`stud_lname` AS `stud_lname`,`st`.`stud_email` AS `stud_email`,`st`.`birthday` AS `birthday`,`st`.`stud_gender` AS `stud_gender`,`il`.`illness_code` AS `illness_code`,`mr`.`school_year` AS `school_year`,`mr`.`semester` AS `semester`,`cr`.`course_code` AS `course_code`,`co`.`college_code` AS `college_code`,`mr`.`datetime_medical` AS `datetime_medical` from ((((`student` `st` join `medical_requirement` `mr` on(`st`.`student_no` = `mr`.`student_no`)) join `illness` `il` on(`mr`.`illness_code` = `il`.`illness_code`)) join `course` `cr` on(`cr`.`course_code` = `st`.`course_code`)) join `college` `co` on(`co`.`college_code` = `cr`.`college_code`)) ;

-- --------------------------------------------------------

--
-- Structure for view `users_vw`
--
DROP TABLE IF EXISTS `users_vw`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `users_vw`  AS  select `ur`.`employee_no` AS `username`,`ur`.`password` AS `password`,`ur`.`role` AS `role`,`em`.`profile_picture` AS `profile_picture`,concat(`em`.`employee_fname`,' ',`em`.`employee_lname`) AS `full_name`,`em`.`employee_no` AS `employee_no`,`em`.`employee_position` AS `position`,`em`.`employee_gender` AS `gender`,`em`.`employee_birthday` AS `birthday`,`em`.`employee_email` AS `email`,`em`.`employee_mobile` AS `mobile_no`,`em`.`employee_address` AS `address`,`em`.`display` AS `display`,date_format(from_days(to_days(current_timestamp()) - to_days(`em`.`employee_birthday`)),'%Y') + 0 AS `age` from (`employee` `em` join `users` `ur` on(`em`.`employee_no` = `ur`.`employee_no`)) where `em`.`display` = 'active' ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`college_code`);

--
-- Indexes for table `consultation`
--
ALTER TABLE `consultation`
  ADD PRIMARY KEY (`student_no`,`illness_code`,`date_prepared`,`date_consulted`),
  ADD KEY `illness_code_fk1` (`illness_code`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_code`),
  ADD KEY `college_code_fk` (`college_code`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`employee_no`);

--
-- Indexes for table `illness`
--
ALTER TABLE `illness`
  ADD PRIMARY KEY (`illness_code`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`employee_no`,`time_log`),
  ADD KEY `employeeno_fk` (`employee_no`,`role`);

--
-- Indexes for table `medical_requirement`
--
ALTER TABLE `medical_requirement`
  ADD PRIMARY KEY (`student_no`,`illness_code`,`school_year`,`datetime_medical`),
  ADD KEY `illness_code_fk` (`illness_code`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`employee_no`,`day`,`time`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_no`),
  ADD KEY `course_code_fk` (`course_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`employee_no`,`role`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `consultation`
--
ALTER TABLE `consultation`
  ADD CONSTRAINT `illness_code_fk1` FOREIGN KEY (`illness_code`) REFERENCES `illness` (`illness_code`),
  ADD CONSTRAINT `student_no_fk1` FOREIGN KEY (`student_no`) REFERENCES `student` (`student_no`);

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `college_code_fk` FOREIGN KEY (`college_code`) REFERENCES `college` (`college_code`);

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `employeeno_fk` FOREIGN KEY (`employee_no`,`role`) REFERENCES `users` (`employee_no`, `role`);

--
-- Constraints for table `medical_requirement`
--
ALTER TABLE `medical_requirement`
  ADD CONSTRAINT `illness_code_fk` FOREIGN KEY (`illness_code`) REFERENCES `illness` (`illness_code`),
  ADD CONSTRAINT `student_no_fk` FOREIGN KEY (`student_no`) REFERENCES `student` (`student_no`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `employee_no_fk1` FOREIGN KEY (`employee_no`) REFERENCES `employee` (`employee_no`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `course_code_fk` FOREIGN KEY (`course_code`) REFERENCES `course` (`course_code`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`employee_no`) REFERENCES `employee` (`employee_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
