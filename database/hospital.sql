-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2021 at 10:59 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

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
-- Table structure for table `accountant`
--

CREATE TABLE `accountant` (
  `id` int(100) NOT NULL,
  `img_url` varchar(200) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accountant`
--

INSERT INTO `accountant` (`id`, `img_url`, `name`, `email`, `address`, `phone`, `x`, `ion_user_id`) VALUES
(72, 'uploads/favicon7.png', 'Mr. Accountant', 'accountant@hms.com', 'New York, USA', '+880123456789', '', '112');

-- --------------------------------------------------------

--
-- Table structure for table `alloted_bed`
--

CREATE TABLE `alloted_bed` (
  `id` int(100) NOT NULL,
  `number` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `a_time` varchar(100) DEFAULT NULL,
  `d_time` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `bed_id` varchar(100) DEFAULT NULL,
  `patientname` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `appcode`
--

CREATE TABLE `appcode` (
  `code` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appcode`
--

INSERT INTO `appcode` (`code`) VALUES
(312263);

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(100) NOT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `time_slot` varchar(100) DEFAULT NULL,
  `s_time` varchar(100) DEFAULT NULL,
  `e_time` varchar(100) DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  `add_date` varchar(100) DEFAULT NULL,
  `registration_time` varchar(100) DEFAULT NULL,
  `s_time_key` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `request` varchar(100) DEFAULT NULL,
  `patientname` varchar(1000) DEFAULT NULL,
  `doctorname` varchar(1000) DEFAULT NULL,
  `room_id` varchar(500) DEFAULT NULL,
  `live_meeting_link` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `patient`, `doctor`, `date`, `time_slot`, `s_time`, `e_time`, `remarks`, `add_date`, `registration_time`, `s_time_key`, `status`, `user`, `request`, `patientname`, `doctorname`, `room_id`, `live_meeting_link`) VALUES
(472, '1', '1', '1606690800', NULL, '', '', 'problem', '11/30/20', '1606709587', '0', 'Confirmed', '709', '', 'Mr Patient', 'Mr Doctor', 'hms-meeting-+8801777024443-43505', 'https://meet.jit.si/hms-meeting-+8801777024443-43505'),
(473, '1', '1', '1606690800', NULL, '', '', 'second problem', '11/30/20', '1606710016', '0', 'Confirmed', '709', '', 'Mr Patient', 'Mr Doctor', 'hms-meeting-+8801777024443-975834', 'https://meet.jit.si/hms-meeting-+8801777024443-975834'),
(474, '1', '1', '1618783200', '11:45 AM To 12:05 PM', '11:45 AM', '12:05 PM', 'second problem aaaaa', '04/19/21', '1618821886', '141', 'Confirmed', '709', '', 'Mr Patient', 'Mr Doctor', 'hms-meeting-+8801777024443-564616', 'https://meet.jit.si/hms-meeting-+8801777024443-564616'),
(475, '63', '1', '1618783200', '12:05 PM To 12:25 PM', '12:05 PM', '12:25 PM', 'abcccc', '04/19/21', '1618822604', '145', 'Confirmed', '709', '', 'Faheem', 'Mr Doctor', NULL, NULL),
(476, '1', '1', '1625004000', NULL, '', '', 'Siiirrrr', '06/30/21', '1625025570', '0', 'Confirmed', '709', '', 'Mr Patient', 'Mr Doctor', 'hms-meeting-+8801777024443-289010', 'https://meet.jit.si/hms-meeting-+8801777024443-289010'),
(477, '65', '202', '1625608800', 'Not Selected', 'Not Selected', '', 'problem', '07/02/21', '1625236243', '0', 'Requested', '', 'Yes', 'haz', NULL, NULL, NULL),
(478, '66', '1', '1626040800', '11:45 AM To 12:05 PM', '11:45 AM', '12:05 PM', 'fever', '07/11/21', '1625985358', '141', 'Confirmed', '709', '', 'usama', 'Mr Doctor', NULL, NULL),
(479, '67', '1', '1626040800', '12:25 PM To 12:45 PM', '12:25 PM', '12:45 PM', 'second problem aaaaa', '07/11/21', '1625985630', '149', 'Requested', '', 'Yes', NULL, NULL, NULL, NULL),
(480, '68', '1', '1626040800', '12:05 PM To 12:25 PM', '12:05 PM', '12:25 PM', 'problem is', '07/11/21', '1625985710', '145', 'Requested', '', 'Yes', NULL, NULL, NULL, NULL),
(481, NULL, '1', '1626040800', '12:45 PM To 01:05 PM', '12:45 PM', '01:05 PM', 'second problem', '07/12/21', '1626079540', '153', 'Requested', '', 'Yes', NULL, NULL, NULL, NULL),
(482, '69', '1', '1626040800', NULL, '', '', 'fever', '07/12/21', '1626079824', '0', 'Confirmed', '709', '', 'babar', 'Mr Doctor', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `autoemailshortcode`
--

CREATE TABLE `autoemailshortcode` (
  `id` int(100) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autoemailshortcode`
--

INSERT INTO `autoemailshortcode` (`id`, `name`, `type`) VALUES
(1, '{firstname}', 'payment'),
(2, '{lastname}', 'payment'),
(3, '{name}', 'payment'),
(4, '{amount}', 'payment'),
(52, '{doctorname}', 'appoinment_confirmation'),
(42, '{firstname}', 'appoinment_creation'),
(51, '{name}', 'appoinment_confirmation'),
(50, '{lastname}', 'appoinment_confirmation'),
(49, '{firstname}', 'appoinment_confirmation'),
(48, '{hospital_name}', 'appoinment_creation'),
(47, '{time_slot}', 'appoinment_creation'),
(46, '{appoinmentdate}', 'appoinment_creation'),
(45, '{doctorname}', 'appoinment_creation'),
(44, '{name}', 'appoinment_creation'),
(43, '{lastname}', 'appoinment_creation'),
(26, '{name}', 'doctor'),
(27, '{firstname}', 'doctor'),
(28, '{lastname}', 'doctor'),
(29, '{company}', 'doctor'),
(41, '{doctor}', 'patient'),
(40, '{company}', 'patient'),
(39, '{lastname}', 'patient'),
(38, '{firstname}', 'patient'),
(37, '{name}', 'patient'),
(36, '{department}', 'doctor'),
(53, '{appoinmentdate}', 'appoinment_confirmation'),
(54, '{time_slot}', 'appoinment_confirmation'),
(55, '{hospital_name}', 'appoinment_confirmation'),
(56, '{start_time}', 'meeting_creation'),
(57, '{patient_name}', 'meeting_creation'),
(58, '{doctor_name}', 'meeting_creation'),
(59, '{hospital_name}', 'meeting_creation'),
(60, '{meeting_link}', 'meeting_creation');

-- --------------------------------------------------------

--
-- Table structure for table `autoemailtemplate`
--

CREATE TABLE `autoemailtemplate` (
  `id` int(100) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autoemailtemplate`
--

INSERT INTO `autoemailtemplate` (`id`, `name`, `message`, `type`, `status`) VALUES
(1, 'Payment successful email to patient', '<p>Dear {name}, Your paying amount - Tk {amount} was successful.</p>\n\n<p>Thank You</p>\n', 'payment', 'Active'),
(9, 'Appointment creation email to patient', 'Dear {name},<br />\r\nYou have an &nbsp;appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment.<br />\r\nFor more information contact with {hospital_name}<br />\r\nRegards', 'appoinment_creation', 'Active'),
(10, 'Appointment Confirmation email  to patient', 'Dear {name},<br />\r\nYour appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed.<br />\r\nFor more information contact with {hospital_name}<br />\r\nRegards', 'appoinment_confirmation', 'Active'),
(11, 'Meeting Schedule Notification To Patient', '<p>Dear {patient_name},</p>\r\n\r\n<p>You have a Live Video Meeting with {doctor_name} on {start_time}.<br />\r\nPlease click on this link to join the meeting&nbsp;{meeting_link} .<br />\r\nFor more information please contact with {hospital_name} .</p>\r\n\r\n<p>Regards</p>\r\n', 'meeting_creation', 'Active'),
(6, 'send joining confirmation to Doctor', '<p>Dear {name},<br />\r\nYou are appointed as a doctor&nbsp; in {department}.<br />\r\nThank You</p>\r\n\r\n<p>{company}</p>\r\n', 'doctor', 'Active'),
(8, 'Patient Registration Confirmation ', '<p>Dear {name},</p>\n\n<p>You are registred to {company} as a patient to {doctor}.</p>\n\n<p>Regards</p>\n', 'patient', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `autosmsshortcode`
--

CREATE TABLE `autosmsshortcode` (
  `id` int(100) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autosmsshortcode`
--

INSERT INTO `autosmsshortcode` (`id`, `name`, `type`) VALUES
(1, '{name}', 'payment'),
(2, '{firstname}', 'payment'),
(3, '{lastname}', 'payment'),
(4, '{amount}', 'payment'),
(55, '{appoinmentdate}', 'appoinment_confirmation'),
(54, '{doctorname}', 'appoinment_confirmation'),
(53, '{name}', 'appoinment_confirmation'),
(52, '{lastname}', 'appoinment_confirmation'),
(51, '{firstname}', 'appoinment_confirmation'),
(50, '{time_slot}', 'appoinment_creation'),
(49, '{appoinmentdate}', 'appoinment_creation'),
(48, '{hospital_name}', 'appoinment_creation'),
(47, '{doctorname}', 'appoinment_creation'),
(46, '{name}', 'appoinment_creation'),
(45, '{lastname}', 'appoinment_creation'),
(44, '{firstname}', 'appoinment_creation'),
(28, '{firstname}', 'doctor'),
(29, '{lastname}', 'doctor'),
(30, '{name}', 'doctor'),
(31, '{company}', 'doctor'),
(43, '{doctor}', 'patient'),
(42, '{company}', 'patient'),
(41, '{lastname}', 'patient'),
(40, '{firstname}', 'patient'),
(39, '{name}', 'patient'),
(38, '{department}', 'doctor'),
(56, '{time_slot}', 'appoinment_confirmation'),
(57, '{hospital_name}', 'appoinment_confirmation'),
(58, '{start_time}', 'meeting_creation'),
(59, '{patient_name}', 'meeting_creation'),
(60, '{doctor_name}', 'meeting_creation'),
(61, '{hospital_name}', 'meeting_creation'),
(62, '{meeting_link}', 'meeting_creation');

-- --------------------------------------------------------

--
-- Table structure for table `autosmstemplate`
--

CREATE TABLE `autosmstemplate` (
  `id` int(100) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autosmstemplate`
--

INSERT INTO `autosmstemplate` (`id`, `name`, `message`, `type`, `status`) VALUES
(1, 'Payment successful sms to patient', 'Dear {name},\r\n Your paying amount - Tk {amount} was successful.\r\nThank You\r\nPlease contact our support for further queries.', 'payment', 'Active'),
(12, 'Appointment Confirmation sms to patient', 'Dear {name},\r\nYour appointment with {doctorname} on {appoinmentdate} at {time_slot} is confirmed.\r\nFor more information contact with {hospital_name}\r\nRegards', 'appoinment_confirmation', 'Active'),
(13, 'Appointment creation sms to patient', 'Dear {name},\r\nYou have an  appointment with {doctorname} on {appoinmentdate} at {time_slot} .Please confirm your appointment.\r\nFor more information contact with {hospital_name}\r\nRegards', 'appoinment_creation', 'Active'),
(14, 'Meeting Schedule Notification To Patient', 'Dear {patient_name}, You have a Live Video Meeting with {doctor_name} on {start_time}. Click on this link to join the meeting {meeting_link} . For more information contact with {hospital_name} .\r\nRegards ', 'meeting_creation', 'Active'),
(9, 'send appoint confirmation to Doctor', 'Dear {name},\nYou are appointed as a doctor in {department} .\nThank You\n{company}', 'doctor', 'Active'),
(11, 'Patient Registration Confirmation ', 'Dear {name},\n You are registred to {company} as a patient to {doctor}. \nRegards', 'patient', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `bankb`
--

CREATE TABLE `bankb` (
  `id` int(100) NOT NULL,
  `group` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bankb`
--

INSERT INTO `bankb` (`id`, `group`, `status`) VALUES
(1, 'A+', '0 Bags'),
(2, 'A-', '0 Bags'),
(3, 'B+', '8 Bags'),
(4, 'B-', '0 Bags'),
(5, 'AB+', '15 Bags'),
(6, 'AB-', '0 Bags'),
(7, 'O+', '2 Bags'),
(8, 'O-', '8 Bags');

-- --------------------------------------------------------

--
-- Table structure for table `bed`
--

CREATE TABLE `bed` (
  `id` int(10) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `number` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `last_a_time` varchar(100) DEFAULT NULL,
  `last_d_time` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `bed_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bed`
--

INSERT INTO `bed` (`id`, `category`, `number`, `description`, `last_a_time`, `last_d_time`, `status`, `bed_id`) VALUES
(22, 'Category', 'Bed 1', 'Description', '13 October 2020 - 01:00 AM', '21 October 2020 - 01:00 AM', NULL, 'Category-Bed 1'),
(23, 'Category', 'Bed 2', 'Description', '05 October 2020 - 12:55 AM', '06 October 2020 - 02:05 AM', NULL, 'Category-Bed 2');

-- --------------------------------------------------------

--
-- Table structure for table `bed_category`
--

CREATE TABLE `bed_category` (
  `id` int(100) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bed_category`
--

INSERT INTO `bed_category` (`id`, `category`, `description`) VALUES
(15, 'Category', 'Description');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(10) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `x` varchar(10) DEFAULT NULL,
  `y` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `description`, `x`, `y`) VALUES
(12, 'Cardiology', '<p>This department provides medical care to patients who have problems with their heart or circulation. It treats people on an inpatient and outpatient basis. </p>\n', '', ''),
(15, 'Diagnostic imaging', 'Formerly known as X-ray, this department provides a full range of diagnostic imaging services including:\n\n', '', ''),
(17, 'Ear nose and throat (ENT)', 'Ear nose and throat (ENT)\nThe ENT department provides care for patients with a variety of problems, including:\ngeneral ear, nose and throat diseases\nneck lumps\ncancers of the head and neck area\ntear duct problems\nfacial skin lesions\nbalance and hearing disorders\nsnoring and sleep apnoea\nENT allergy problems\nsalivary gland diseases\nvoice disorders.\n', '', ''),
(20, 'General surgery', 'The general surgery ward covers a wide range of surgery.', '', ''),
(23, 'Maternity departments', 'Women now have a choice of who leads their maternity care and where they give birth. Care can be led by a consultant, a GP or a midwife.\n\n', '', ''),
(24, 'Microbiology', 'The microbiology department looks at all aspects of microbiology, such as bacterial and viral infections.\n\n', '', ''),
(26, 'Nephrology', 'This department monitors and assesses patients with kidney (renal) problems.\n', '', ''),
(27, 'Neurology', 'This unit deals with disorders of the nervous system, including the brain and spinal cord. It\'s run by doctors who specialise in this area (neurologists) and their staff.\n\n', '', ''),
(28, 'Nutrition and dietetics', 'Trained dieticians and nutritionists provide specialist advice on diet for hospital wards and outpatient clinics, forming part of a multidisciplinary team.\n\n', '', ''),
(32, 'Occupational therapy', 'This profession helps people who are physically or mentally impaired, including temporary disability after medical treatment. It practices in the fields of both healthcare and social care.\n\n', '', ''),
(33, 'Oncology', 'This department provides radiotherapy and a full range of chemotherapy treatments for cancerous tumours and blood disorders.\n\n', '', ''),
(34, 'Ophthalmology', 'Eye departments provide a range of ophthalmic services for adults and children,\n\n', '', ''),
(35, 'Orthopaedics', 'Orthopaedic departments treat problems that affect your musculoskeletal system. That\'s your muscles, joints, bones, ligaments, tendons and nerves.\n\n', '', ''),
(36, 'Pain management clinics', 'Usually run by consultant anaesthetists, these clinics aim to help treat patients with severe long-term pain that appears resistant to normal treatments.\n', '', ''),
(38, 'Physiotherapy', 'Physiotherapists promote body healing, for example after surgery, through therapies such as exercise and manipulation.\n\n', '', ''),
(39, 'Radiotherapy', 'Radiotherapy\nRun by a combination of consultant doctors and specially trained radiotherapists, this department provides radiotherapy (X-ray) treatment for conditions such as malignant tumours and cancer.\n\n', '', ''),
(40, 'Renal unit', 'Closely linked with nephrology teams at hospitals, these units provide haemodialysis treatment for patients with kidney failure. Many of these patients are on waiting lists for a kidney transplant.\n\n', '', ''),
(41, 'Rheumatology', 'Specialist doctors called rheumatologists run the unit and are experts in the field of musculoskeletal disorders (bones, joints, ligaments, tendons, muscles and nerves).\n\n', '', ''),
(42, 'Sexual health (genitourinary medicine)', 'This department provides a free and confidential service offering:\nadvice, testing and treatment for all sexually transmitted infections (STIs)\nfamily planning care (including emergency contraception and free condoms)\npregnancy testing and advice.\nIt also provides care and support for other sexual and genital problems.\nPatients are usually able to phone the department directly for an appointment and don\'t need a referral letter from their GP.\n\n\n', '', ''),
(43, 'Urology', '<p>The urology department is run by consultant urology surgeons and their surgical teams. It investigates all areas linked to kidney and bladder-based problems.</p>\n', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `diagnostic_report`
--

CREATE TABLE `diagnostic_report` (
  `id` int(100) NOT NULL,
  `date` varchar(100) DEFAULT NULL,
  `invoice` varchar(100) DEFAULT NULL,
  `report` varchar(10000) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(10) NOT NULL,
  `img_url` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `profile` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(10) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `img_url`, `name`, `email`, `address`, `phone`, `department`, `profile`, `x`, `y`, `ion_user_id`) VALUES
(1, 'uploads/360F260040900OO6YW1sHTnKxby4GcjCvtypUCWjnQRg5.jpg', 'Mr Doctor', 'doctor@hms.com', 'Colegepara, Rajbari', '+880123456789', 'Cardiology', 'Cardiac Specialized', '', '', '709'),
(202, 'uploads/faheem-1.jpg', 'faheem mehdi', 'faheemmehdi012@gmail.com', 'new rehmanabad', '03157079240', 'Oncology', 'abc', NULL, NULL, '1554');

-- --------------------------------------------------------

--
-- Table structure for table `donor`
--

CREATE TABLE `donor` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `group` varchar(10) DEFAULT NULL,
  `age` varchar(10) DEFAULT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `ldd` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `add_date` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `donor`
--

INSERT INTO `donor` (`id`, `name`, `group`, `age`, `sex`, `ldd`, `phone`, `email`, `add_date`) VALUES
(18, 'faheem', 'O+', '23', 'Male', '30-11-2020', '03157078745', 'bc.oyee@gmail.com', '11/30/20');

-- --------------------------------------------------------

--
-- Table structure for table `email`
--

CREATE TABLE `email` (
  `id` int(100) NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `message` varchar(10000) DEFAULT NULL,
  `reciepient` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `email_settings`
--

CREATE TABLE `email_settings` (
  `id` int(100) NOT NULL,
  `admin_email` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email_settings`
--

INSERT INTO `email_settings` (`id`, `admin_email`, `type`, `user`, `password`) VALUES
(1, 'admin@website.net', '', '', ''),
(5, 'admin@website.net', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(10) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `datestring` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `category`, `date`, `note`, `amount`, `user`, `datestring`) VALUES
(89, 'pipe', '1625025981', 'pipe fixed', '50', '112', '30/06/21');

-- --------------------------------------------------------

--
-- Table structure for table `expense_category`
--

CREATE TABLE `expense_category` (
  `id` int(10) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `expense_category`
--

INSERT INTO `expense_category` (`id`, `category`, `description`, `x`, `y`) VALUES
(58, 'Category 1', 'Description', NULL, NULL),
(59, 'pipe', 'hospital pipes', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `featured`
--

CREATE TABLE `featured` (
  `id` int(100) NOT NULL,
  `img_url` varchar(1000) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `profile` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `featured`
--

INSERT INTO `featured` (`id`, `img_url`, `name`, `profile`, `description`) VALUES
(1, 'uploads/images.jpg', 'Dr Ali sajjad', 'Cardiac Specialized', '<p>Experienced and professional doctor. Satisfied with his treatment techniques</p>\r\n'),
(2, 'uploads/doctor.png', 'Dr RahmatUllah Asif', 'Cardiac Specialized', 'Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence'),
(3, 'uploads/download_(2)2.png', 'Dr A.R.M. Jamil', 'Cardiac Specialized', 'Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence Cardiac Excellence');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User'),
(3, 'Accountant', 'For Financial Activities'),
(4, 'Doctor', ''),
(5, 'Patient', ''),
(6, 'Nurse', ''),
(7, 'Pharmacist', ''),
(8, 'Laboratorist', ''),
(10, 'Receptionist', 'Receptionist');

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(100) NOT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `doctor`, `date`, `x`, `y`) VALUES
(75, '1', '1606604400', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lab`
--

CREATE TABLE `lab` (
  `id` int(100) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `category_name` varchar(1000) DEFAULT NULL,
  `report` varchar(10000) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `patient_name` varchar(100) DEFAULT NULL,
  `patient_phone` varchar(100) DEFAULT NULL,
  `patient_address` varchar(100) DEFAULT NULL,
  `doctor_name` varchar(100) DEFAULT NULL,
  `date_string` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `laboratorist`
--

CREATE TABLE `laboratorist` (
  `id` int(100) NOT NULL,
  `img_url` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `laboratorist`
--

INSERT INTO `laboratorist` (`id`, `img_url`, `name`, `email`, `address`, `phone`, `x`, `y`, `ion_user_id`) VALUES
(3, 'uploads/favicon1.png', 'Mr Laboratorist', 'laboratorist@hms.com', 'Tampa, Florida, USA', '+880123456789', '', '', '111');

-- --------------------------------------------------------

--
-- Table structure for table `lab_category`
--

CREATE TABLE `lab_category` (
  `id` int(10) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `reference_value` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lab_category`
--

INSERT INTO `lab_category` (`id`, `category`, `description`, `reference_value`) VALUES
(35, 'Troponin-I', 'Pathological Test', ''),
(36, 'CBC (DIGITAL)', 'Pathological Test', ''),
(37, 'Eosinophil', 'Pathological Test', ''),
(38, 'Platelets', 'Pathological Test', ''),
(39, 'Malarial Parasites (MP)', 'Pathological Test', ''),
(40, 'BT/ CT', 'Pathological Test', ''),
(41, 'ASO Titre', 'Pathological Test', ''),
(42, 'CRP', 'Pathological Test', ''),
(43, 'R/A test', 'Pathological Test', ''),
(44, 'VDRL', 'Pathological Test', ''),
(45, 'TPHA', 'Pathological Test', ''),
(46, 'HBsAg (Screening)', 'Pathological Test', ''),
(47, 'HBsAg (Confirmatory)', 'Pathological Test', ''),
(48, 'CFT for Kala Zar', 'Pathological Test', ''),
(49, 'CFT for Filaria', 'Pathological Test', ''),
(50, 'Pregnancy Test', 'Pathological Test', ''),
(51, 'Blood Grouping', 'Pathological Test', ''),
(52, 'Widal Test', 'Pathological Test', '(70-110)mg/dl'),
(53, 'RBS', 'Pathological Test', ''),
(54, 'Blood Urea', 'Pathological Test', ''),
(55, 'S. Creatinine', 'Pathological Test', ''),
(56, 'S. cholesterol', 'Pathological Test', ''),
(57, 'Fasting Lipid Profile', 'Pathological Test', ''),
(58, 'S. Bilirubin', 'Pathological Test', ''),
(59, 'S. Alkaline Phosohare', 'Pathological Test', ''),
(61, 'S. Calcium', 'Pathological Test', ''),
(62, 'RBS with CUS', 'Pathological Test', ''),
(63, 'SGPT', 'Pathological Test', ''),
(64, 'SGOT', 'Pathological Test', ''),
(65, 'Urine for R/E', 'Pathological Test', ''),
(66, 'Urine C/S', 'Pathological Test', ''),
(67, 'Stool for R/E', 'Pathological Test', ''),
(68, 'Semen Analysis', 'Pathological Test', ''),
(69, 'S. Electrolyte', 'Pathological Test', ''),
(70, 'S. T3/ T4/ THS', 'Pathological Test', ''),
(71, 'MT', 'Pathological Test', ''),
(106, 'ESR', 'Patho Test', ''),
(107, 'FBS CUS', 'Pathological test', ''),
(108, 'Hb%', 'Pathological test', ''),
(114, '2HABF', 'Pathological test', ''),
(113, 'FBS', 'Pathological test', ''),
(115, 'S. TSH', 'Pathological test', ''),
(116, 'S. T3', 'Pathological test', ''),
(117, 'DC', 'Pathological test', ''),
(118, 'TC', 'Pathological test', ''),
(120, 'S. Uric acid', 'Pathological test', ''),
(126, 'eosinphil', 'Pathology Test', '');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `manualemailshortcode`
--

CREATE TABLE `manualemailshortcode` (
  `id` int(100) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manualemailshortcode`
--

INSERT INTO `manualemailshortcode` (`id`, `name`, `type`) VALUES
(1, '{firstname}', 'email'),
(2, '{lastname}', 'email'),
(3, '{name}', 'email'),
(6, '{address}', 'email'),
(7, '{company}', 'email'),
(8, '{email}', 'email'),
(9, '{phone}', 'email');

-- --------------------------------------------------------

--
-- Table structure for table `manualsmsshortcode`
--

CREATE TABLE `manualsmsshortcode` (
  `id` int(100) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manualsmsshortcode`
--

INSERT INTO `manualsmsshortcode` (`id`, `name`, `type`) VALUES
(1, '{firstname}', 'sms'),
(2, '{lastname}', 'sms'),
(3, '{name}', 'sms'),
(4, '{email}', 'sms'),
(5, '{phone}', 'sms'),
(6, '{address}', 'sms'),
(10, '{company}', 'sms');

-- --------------------------------------------------------

--
-- Table structure for table `manual_email_template`
--

CREATE TABLE `manual_email_template` (
  `id` int(100) NOT NULL,
  `name` varchar(1000) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `type` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manual_email_template`
--

INSERT INTO `manual_email_template` (`id`, `name`, `message`, `type`) VALUES
(7, 'vddfvdf', '<p>dvdfvdfvdfvd</p>\r\n', 'email');

-- --------------------------------------------------------

--
-- Table structure for table `manual_sms_template`
--

CREATE TABLE `manual_sms_template` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `message` varchar(1000) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manual_sms_template`
--

INSERT INTO `manual_sms_template` (`id`, `name`, `message`, `type`) VALUES
(1, 'test', '{firstname} come to my offce {lastname}', 'sms'),
(8, 'dsdsdss3wew454', '{firstname}{address}{phone}{address}{email}{name}{lastname}{firstname}', 'sms'),
(3, 'sdgfgfdgfdgdf', '<p>{email}{instructor}{address} gfdgdfg</p>\r\n', 'email'),
(7, 'test223', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width: 500px;\">\r\n	<tbody>\r\n		<tr>\r\n			<td>dsfsf</td>\r\n			<td>sdfsdf</td>\r\n		</tr>\r\n		<tr>\r\n			<td>sdfdsf</td>\r\n			<td>dfdsf</td>\r\n		</tr>\r\n		<tr>\r\n			<td>dfdf</td>\r\n			<td>dfdfd</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n{email}{instructor}', 'email');

-- --------------------------------------------------------

--
-- Table structure for table `medical_history`
--

CREATE TABLE `medical_history` (
  `id` int(100) NOT NULL,
  `patient_id` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(10000) DEFAULT NULL,
  `patient_name` varchar(100) DEFAULT NULL,
  `patient_address` varchar(500) DEFAULT NULL,
  `patient_phone` varchar(100) DEFAULT NULL,
  `img_url` varchar(500) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `registration_time` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medical_history`
--

INSERT INTO `medical_history` (`id`, `patient_id`, `title`, `description`, `patient_name`, `patient_address`, `patient_phone`, `img_url`, `date`, `registration_time`) VALUES
(64, '1', 'case 1', '<p><strong>problem 1&nbsp;</strong></p>\r\n\r\n<p>problem 2</p>\r\n\r\n<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>kejdkpl</td>\r\n			<td>lm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>kmk</td>\r\n			<td>lm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>,</td>\r\n			<td>,kk</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 'Mr Patient', 'Ka/5 Jagannathpur', '+8801777024443', NULL, '1606690800', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE `medicine` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `box` varchar(100) DEFAULT NULL,
  `s_price` varchar(100) DEFAULT NULL,
  `quantity` int(100) DEFAULT NULL,
  `generic` varchar(100) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `effects` varchar(100) DEFAULT NULL,
  `e_date` varchar(70) DEFAULT NULL,
  `add_date` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `name`, `category`, `price`, `box`, `s_price`, `quantity`, `generic`, `company`, `effects`, `e_date`, `add_date`) VALUES
(2878, 'napa extra', NULL, '30', '44', '35', 2100, 'Pracetimol', 'Square', 'dsdsds', '16-08-2020', '02/10/20');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_category`
--

CREATE TABLE `medicine_category` (
  `id` int(100) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicine_category`
--

INSERT INTO `medicine_category` (`id`, `category`, `description`) VALUES
(24, 'paracetamol', 'sadasdas');

-- --------------------------------------------------------

--
-- Table structure for table `meeting`
--

CREATE TABLE `meeting` (
  `id` int(100) NOT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `topic` varchar(1000) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `start_time` varchar(100) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL,
  `timezone` varchar(100) DEFAULT NULL,
  `meeting_id` varchar(100) DEFAULT NULL,
  `meeting_password` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `time_slot` varchar(100) DEFAULT NULL,
  `s_time` varchar(100) DEFAULT NULL,
  `e_time` varchar(100) DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  `add_date` varchar(100) DEFAULT NULL,
  `registration_time` varchar(100) DEFAULT NULL,
  `s_time_key` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `request` varchar(100) DEFAULT NULL,
  `patientname` varchar(1000) DEFAULT NULL,
  `doctorname` varchar(1000) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL,
  `doctor_ion_id` varchar(100) DEFAULT NULL,
  `patient_ion_id` varchar(100) DEFAULT NULL,
  `appointment_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meeting`
--

INSERT INTO `meeting` (`id`, `patient`, `doctor`, `topic`, `type`, `start_time`, `duration`, `timezone`, `meeting_id`, `meeting_password`, `date`, `time_slot`, `s_time`, `e_time`, `remarks`, `add_date`, `registration_time`, `s_time_key`, `status`, `user`, `request`, `patientname`, `doctorname`, `ion_user_id`, `doctor_ion_id`, `patient_ion_id`, `appointment_id`) VALUES
(597, '1', '147', 'Doctor Appointment', '2', '2020-08-31 05:57', '60', 'UTC', '78065502079', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598867830', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', NULL),
(596, '1', '147', 'Doctor Appointment', '2', '2020-08-31 05:55', '60', 'UTC', '73399002446', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598867708', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', NULL),
(594, '1', '147', 'Doctor Appointment', '2', '2020-08-31 05:52', '60', 'UTC', '76863762416', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598867523', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', NULL),
(595, '1', '147', 'Doctor Appointment', '2', '2020-08-31 05:53', '60', 'UTC', '76103574289', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598867627', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', NULL),
(593, '1', '147', 'Doctor Appointment', '2', '2020-08-31 05:50', '60', 'UTC', '78581884320', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598867418', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', NULL),
(592, '1', '147', 'Doctor Appointment', '2', '2020-08-31 03:01', '60', 'UTC', '71935056353', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598857283', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', NULL),
(590, '1', '147', 'Doctor Appointment', '2', '2020-08-31 02:47', '60', 'UTC', '73066856714', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598856455', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', NULL),
(591, '1', '147', 'Doctor Appointment', '2', '2020-08-31 03:01', '60', 'UTC', '73873024898', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598857264', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', NULL),
(589, '1', '147', 'Doctor Appointment', '2', '2020-08-31 02:46', '60', 'UTC', '71674039118', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598856418', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', NULL),
(598, '1', '147', 'Doctor Appointment', '2', '2020-08-31 06:37', '60', 'UTC', '79952317532', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598870269', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '455'),
(599, '1', '147', 'Doctor Appointment', '2', '2020-08-31 06:52', '60', 'UTC', '71430825323', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598871125', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '455'),
(600, '1', '147', 'Doctor Appointment', '2', '2020-08-31 11:34', '60', 'UTC', '78873863945', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598888071', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '455'),
(601, '1', '147', 'Doctor Appointment', '2', '2020-08-31 14:21', '60', 'UTC', '77058133464', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598898079', NULL, NULL, '709', NULL, 'Rizvi Mahmud Plabon', 'Dr. Rahmatullah Asif', NULL, '709', '681', '455'),
(602, '1', '147', 'Doctor Appointment', '2', '2020-08-31 14:35', '60', 'UTC', '76826440714', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598898940', NULL, NULL, '709', NULL, 'Rizvi Mahmud Plabon', 'Dr. Rahmatullah Asif', NULL, '709', '681', '455'),
(603, '1', '147', 'Doctor Appointment', '2', '2020-08-31 15:09', '60', 'UTC', '71324680797', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598900963', NULL, NULL, '1', NULL, 'Rizvi Mahmud Plabon', 'Dr. Rahmatullah Asif', NULL, '709', '681', '455'),
(604, '1', '147', 'Doctor Appointment', '2', '2020-08-31 17:51', '60', 'UTC', '72784087056', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598910684', NULL, NULL, '1', NULL, 'Rizvi Mahmud Plabon', 'Dr. Rahmatullah Asif', NULL, '709', '681', '455'),
(605, '1', '147', 'Doctor Appointment', '2', '2020-08-31 18:03', '60', 'UTC', '71781120129', '12345', NULL, NULL, NULL, NULL, NULL, '08/31/20', '1598911430', NULL, NULL, '1', NULL, 'Rizvi Mahmud Plabon', 'Dr. Rahmatullah Asif', NULL, '709', '681', '455'),
(606, '1', '147', 'Doctor Appointment', '2', '2020-09-01 05:21', '60', 'UTC', '73426854489', '12345', NULL, NULL, NULL, NULL, NULL, '09/01/20', '1598952101', NULL, NULL, '1', NULL, 'Rizvi Mahmud Plabon', 'Dr. Rahmatullah Asif', NULL, '709', '681', '456'),
(607, '1', '147', 'Doctor Appointment', '2', '2020-09-10 14:13', '60', 'UTC', '73576408457', '12345', NULL, NULL, NULL, NULL, NULL, '09/10/20', '1599761627', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '464'),
(608, '1', '147', 'Doctor Appointment', '2', '2020-09-11 13:47', '60', 'UTC', '75454341566', '12345', NULL, NULL, NULL, NULL, NULL, '09/11/20', '1599846437', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '464'),
(609, '1', '147', 'Doctor Appointment', '2', '2020-09-11 13:47', '60', 'UTC', '73157465436', '12345', NULL, NULL, NULL, NULL, NULL, '09/11/20', '1599846468', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '465'),
(610, '1', '147', 'Doctor Appointment', '2', '2020-09-11 13:48', '60', 'UTC', '78370052717', '12345', NULL, NULL, NULL, NULL, NULL, '09/11/20', '1599846502', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '465'),
(611, '1', '147', 'Doctor Appointment', '2', '2020-09-11 13:48', '60', 'UTC', '71877134261', '12345', NULL, NULL, NULL, NULL, NULL, '09/11/20', '1599846505', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '465'),
(612, '1', '147', 'Doctor Appointment', '2', '2020-09-11 13:48', '60', 'UTC', '75349390219', '12345', NULL, NULL, NULL, NULL, NULL, '09/11/20', '1599846517', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '465'),
(613, '1', '147', 'Doctor Appointment', '2', '2020-09-11 13:48', '60', 'UTC', '77947823088', '12345', NULL, NULL, NULL, NULL, NULL, '09/11/20', '1599846518', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '465'),
(614, '1', '147', 'Doctor Appointment', '2', '2020-09-11 13:49', '60', 'UTC', '75473785483', '12345', NULL, NULL, NULL, NULL, NULL, '09/11/20', '1599846572', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '465'),
(615, '1', '147', 'Doctor Appointment', '2', '2020-09-11 13:49', '60', 'UTC', '76165228124', '12345', NULL, NULL, NULL, NULL, NULL, '09/11/20', '1599846593', NULL, NULL, '1', NULL, 'Mr Patient', 'Mr Doctor', NULL, '709', '681', '465');

-- --------------------------------------------------------

--
-- Table structure for table `meeting_settings`
--

CREATE TABLE `meeting_settings` (
  `id` int(100) NOT NULL,
  `api_key` varchar(100) DEFAULT NULL,
  `secret_key` varchar(100) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `meeting_settings`
--

INSERT INTO `meeting_settings` (`id`, `api_key`, `secret_key`, `ion_user_id`, `y`) VALUES
(8, 'PEbvh2uESS6ryue3Kb3D0w', 'BZpvXJsvgqG6mN4Up1FuuWJQAY47w5QCWIAo', '709', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `notice`
--

CREATE TABLE `notice` (
  `id` int(100) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notice`
--

INSERT INTO `notice` (`id`, `title`, `description`, `date`, `type`) VALUES
(15, 'hi today half break cancle', '<p>hahahah</p>\r\n', '1625522400', 'staff'),
(16, 'kkfvkdml', '<p>cdknvckdnknk</p>\r\n', '1625436000', 'patient');

-- --------------------------------------------------------

--
-- Table structure for table `nurse`
--

CREATE TABLE `nurse` (
  `id` int(100) NOT NULL,
  `img_url` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL,
  `z` varchar(100) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nurse`
--

INSERT INTO `nurse` (`id`, `img_url`, `name`, `email`, `address`, `phone`, `x`, `y`, `z`, `ion_user_id`) VALUES
(8, 'uploads/favicon4.png', 'Mrs Nurse', 'nurse@hms.com', 'Uttara, Dhaka', '+880123456789', '', '', '', '109');

-- --------------------------------------------------------

--
-- Table structure for table `ot_payment`
--

CREATE TABLE `ot_payment` (
  `id` int(100) NOT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `doctor_c_s` varchar(100) DEFAULT NULL,
  `doctor_a_s_1` varchar(100) DEFAULT NULL,
  `doctor_a_s_2` varchar(100) DEFAULT NULL,
  `doctor_anaes` varchar(100) DEFAULT NULL,
  `n_o_o` varchar(100) DEFAULT NULL,
  `c_s_f` varchar(100) DEFAULT NULL,
  `a_s_f_1` varchar(100) DEFAULT NULL,
  `a_s_f_2` varchar(11) DEFAULT NULL,
  `anaes_f` varchar(100) DEFAULT NULL,
  `ot_charge` varchar(100) DEFAULT NULL,
  `cab_rent` varchar(100) DEFAULT NULL,
  `seat_rent` varchar(100) DEFAULT NULL,
  `others` varchar(100) DEFAULT NULL,
  `discount` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `doctor_fees` varchar(100) DEFAULT NULL,
  `hospital_fees` varchar(100) DEFAULT NULL,
  `gross_total` varchar(100) DEFAULT NULL,
  `flat_discount` varchar(100) DEFAULT NULL,
  `amount_received` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ot_payment`
--

INSERT INTO `ot_payment` (`id`, `patient`, `doctor_c_s`, `doctor_a_s_1`, `doctor_a_s_2`, `doctor_anaes`, `n_o_o`, `c_s_f`, `a_s_f_1`, `a_s_f_2`, `anaes_f`, `ot_charge`, `cab_rent`, `seat_rent`, `others`, `discount`, `date`, `amount`, `doctor_fees`, `hospital_fees`, `gross_total`, `flat_discount`, `amount_received`, `status`, `user`) VALUES
(85, '451', 'None', '123', 'None', '125', 'dbdbd', '', '1000', '0', '1000', '', '', '', '', '', '1506195494', '2000', '2000', '0', '2000', '', '1000', 'unpaid', '614');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(100) NOT NULL,
  `img_url` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(1000) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `sex` varchar(100) DEFAULT NULL,
  `birthdate` varchar(100) DEFAULT NULL,
  `age` varchar(100) DEFAULT NULL,
  `bloodgroup` varchar(100) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL,
  `patient_id` varchar(100) DEFAULT NULL,
  `add_date` varchar(100) DEFAULT NULL,
  `registration_time` varchar(100) DEFAULT NULL,
  `how_added` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `img_url`, `name`, `email`, `doctor`, `address`, `phone`, `sex`, `birthdate`, `age`, `bloodgroup`, `ion_user_id`, `patient_id`, `add_date`, `registration_time`, `how_added`) VALUES
(1, 'uploads/cardiology-patient-icon-vector-6244713.jpg', 'Mr Patient', 'patient@hms.com', ',1', 'Ka/5 Jagannathpur', '+8801777024443', 'Male', '01-01-1987', '', 'A+', '681', '101223', '01/30/21', '', ''),
(63, 'uploads/faheem-1.jpg', 'Faheem', 'bc.oyee@gmail.com', ',1', NULL, '03157079240', 'Male', NULL, NULL, NULL, '1553', '471026', '04/19/21', '1618822604', 'from_appointment'),
(64, 'uploads/download.jpg', 'Ali hamza', 'ali@gmail.com', '202', 'chiniot', '03157875142', 'Male', '23-05-1996', NULL, 'O+', '1555', '844230', '07/02/21', '1625236108', NULL),
(65, NULL, 'kumail', 'kumail@gmail.com', ',202', NULL, '0314525788', 'Male', NULL, NULL, NULL, '1556', '210286', '07/02/21', '1625236243', 'from_appointment'),
(66, NULL, 'usama', 'usama@gmail.com', ',1', NULL, '03157874250', 'Male', NULL, NULL, NULL, '1557', '332207', '07/11/21', '1625985358', 'from_appointment'),
(67, NULL, 'babar', 'babar@gmail.com', ',1', NULL, '03154546872', 'Male', NULL, NULL, NULL, '1558', '194811', '07/11/21', '1625985630', 'from_appointment'),
(68, NULL, 'anas', 'anas@gmail.com', ',1', NULL, '03157954025', 'Male', NULL, NULL, NULL, '1559', '739501', '07/11/21', '1625985710', 'from_appointment'),
(69, NULL, 'babar', 'babar11@gmail.com', ',1', NULL, '0315747801', 'Male', NULL, NULL, NULL, '1560', '108783', '07/12/21', '1626079824', 'from_appointment');

-- --------------------------------------------------------

--
-- Table structure for table `patient_deposit`
--

CREATE TABLE `patient_deposit` (
  `id` int(10) NOT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `payment_id` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `deposited_amount` varchar(100) DEFAULT NULL,
  `amount_received_id` varchar(100) DEFAULT NULL,
  `deposit_type` varchar(100) DEFAULT NULL,
  `gateway` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient_deposit`
--

INSERT INTO `patient_deposit` (`id`, `patient`, `payment_id`, `date`, `deposited_amount`, `amount_received_id`, `deposit_type`, `gateway`, `user`) VALUES
(1708, '1', '2396', '1606710467', 'acount deposited example', '2396.gp', 'Cash', NULL, '614'),
(1709, NULL, '2397', '1625024818', '', '2397.gp', 'Cash', NULL, '614');

-- --------------------------------------------------------

--
-- Table structure for table `patient_material`
--

CREATE TABLE `patient_material` (
  `id` int(100) NOT NULL,
  `date` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `patient_name` varchar(100) DEFAULT NULL,
  `patient_address` varchar(100) DEFAULT NULL,
  `patient_phone` varchar(100) DEFAULT NULL,
  `url` varchar(1000) DEFAULT NULL,
  `date_string` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient_material`
--

INSERT INTO `patient_material` (`id`, `date`, `title`, `category`, `patient`, `patient_name`, `patient_address`, `patient_phone`, `url`, `date_string`) VALUES
(86, '1606711162', 'doc 1', NULL, '1', 'Mr Patient', 'Ka/5 Jagannathpur', '+8801777024443', 'uploads/2593068.jpg', '30-11-20');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(10) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `vat` varchar(100) NOT NULL DEFAULT '0',
  `x_ray` varchar(100) DEFAULT NULL,
  `flat_vat` varchar(100) DEFAULT NULL,
  `discount` varchar(100) NOT NULL DEFAULT '0',
  `flat_discount` varchar(100) DEFAULT NULL,
  `gross_total` varchar(100) DEFAULT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  `hospital_amount` varchar(100) DEFAULT NULL,
  `doctor_amount` varchar(100) DEFAULT NULL,
  `category_amount` varchar(1000) DEFAULT NULL,
  `category_name` varchar(1000) DEFAULT NULL,
  `amount_received` varchar(100) DEFAULT NULL,
  `deposit_type` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `patient_name` varchar(100) DEFAULT NULL,
  `patient_phone` varchar(100) DEFAULT NULL,
  `patient_address` varchar(100) DEFAULT NULL,
  `doctor_name` varchar(100) DEFAULT NULL,
  `date_string` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `category`, `patient`, `doctor`, `date`, `amount`, `vat`, `x_ray`, `flat_vat`, `discount`, `flat_discount`, `gross_total`, `remarks`, `hospital_amount`, `doctor_amount`, `category_amount`, `category_name`, `amount_received`, `deposit_type`, `status`, `user`, `patient_name`, `patient_phone`, `patient_address`, `doctor_name`, `date_string`) VALUES
(2396, NULL, '1', '1', '1606710467', '1200', '0', NULL, NULL, '0', '0', '1200', 'problem', '890', '310', NULL, '73*700*ECHO Normal*1,79*500*USG - KUB*1', 'acount deposited example', 'Cash', 'unpaid', '614', 'Mr Patient', '+8801777024443', 'Ka/5 Jagannathpur', 'Mr Doctor', '30-11-20'),
(2397, NULL, NULL, NULL, '1625024818', '1850', '0', NULL, NULL, '50', '50', '1800', '', '1800', '0', NULL, '85*500*X-RAY - KUB                         *1,84*1000*X-RAY - Ba Swallo Oesopha*1,89*350*X-RAY - Wrist(B/V)(L/R) *1', '', 'Cash', 'unpaid', '614', '0', '0', '0', '0', '30-06-21');

-- --------------------------------------------------------

--
-- Table structure for table `paymentgateway`
--

CREATE TABLE `paymentgateway` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `merchant_key` varchar(100) DEFAULT NULL,
  `salt` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL,
  `APIUsername` varchar(100) DEFAULT NULL,
  `APIPassword` varchar(100) DEFAULT NULL,
  `APISignature` varchar(100) DEFAULT NULL,
  `status` varchar(1000) DEFAULT NULL,
  `publish` varchar(1000) DEFAULT NULL,
  `secret` varchar(1000) DEFAULT NULL,
  `public_key` varchar(1000) DEFAULT NULL,
  `store_id` varchar(1000) DEFAULT NULL,
  `store_password` varchar(1000) DEFAULT NULL,
  `merchant_mid` varchar(1000) DEFAULT NULL,
  `merchant_website` varchar(1000) DEFAULT NULL,
  `apiloginid` varchar(1000) DEFAULT NULL,
  `transactionkey` varchar(1000) DEFAULT NULL,
  `apikey` varchar(1000) DEFAULT NULL,
  `merchantcode` varchar(1000) DEFAULT NULL,
  `privatekey` varchar(1000) DEFAULT NULL,
  `publishablekey` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `paymentgateway`
--

INSERT INTO `paymentgateway` (`id`, `name`, `merchant_key`, `salt`, `x`, `y`, `APIUsername`, `APIPassword`, `APISignature`, `status`, `publish`, `secret`, `public_key`, `store_id`, `store_password`, `merchant_mid`, `merchant_website`, `apiloginid`, `transactionkey`, `apikey`, `merchantcode`, `privatekey`, `publishablekey`) VALUES
(1, 'PayPal', '', '', '', '', 'sb-5n47ok25449_api1.business.example.com', 'E7CTYGARQH454UJV', 'AaHPGjHbAfQMARVmoKb2FcGxSFbMAU8dvNcovJ4jdQroUw3VbeNkN3vz', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'Pay U Money', 'Merchant Key', 'Salt', '', '', '', '', 'Aaw-Fd69z.JLuiq13ejMN-CsSMuuAPEXWUFPF5QW9sD22fp1hosGIFKo', 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Stripe', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', 'Publish key', 'Secret Key', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Paystack', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, 'sk_test_c0b4a969e33564d0fdc6c781efb0300e68316897', 'pk_test_6511ce507f68769d3035234614ba03f3e7368f4e', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'SSLCOMMERZ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, NULL, 'Store id', 'Store Password', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Paytm', 'Merchant Key', NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, 'Merchant MID', 'Merchant Website', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Authorize.Net', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Api Login Id', 'Transaction Key', NULL, NULL, NULL, NULL),
(8, '2Checkout', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'test', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Merchant Code', 'Private key', 'Publishable Key');

-- --------------------------------------------------------

--
-- Table structure for table `payment_category`
--

CREATE TABLE `payment_category` (
  `id` int(10) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `c_price` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `d_commission` int(100) DEFAULT NULL,
  `h_commission` int(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_category`
--

INSERT INTO `payment_category` (`id`, `category`, `description`, `c_price`, `type`, `d_commission`, `h_commission`) VALUES
(16, 'E.C.G', 'Payments from E.C.G', '250', 'diagnostic', 30, 0),
(78, 'USG - Pregnancy Pro', 'USG - Pregnancy Pro', '400', 'diagnostic', 30, 0),
(19, 'Ward Fee', 'Deposits from ward', '400', 'others', 0, 0),
(20, 'Admission Fees', 'Patient Admission Fees', '100', 'others', 0, 0),
(23, 'Oxyzen', 'Income From Oxyzen', '0', 'others', 0, 0),
(24, 'Nebulizer', 'Income From Nebulizer', '60', 'others', 0, 0),
(25, 'Newspaper sell', 'Income From selling old newspaper', '0', 'others', 0, 0),
(33, 'Ambulance', 'Ambulance er vara', '0', 'others', 0, 0),
(34, 'HbAIc', 'gfdsegfdgd', '800', 'diagnostic', 30, 0),
(35, 'Troponin-I', 'Pathological Test', '1000', 'diagnostic', 30, 0),
(36, 'CBC (DIGITAL)', 'Pathological Test', '450', 'diagnostic', 30, 0),
(37, 'Eosinophil', 'Pathological Test', '100', 'diagnostic', 30, 0),
(38, 'Platelets', 'Pathological Test', '200', 'diagnostic', 30, 0),
(39, 'Malarial Parasites (MP)', 'Pathological Test', '100', 'diagnostic', 30, 0),
(40, 'BT/ CT', 'Pathological Test', '200', 'diagnostic', 30, 0),
(41, 'ASO Titre', 'Pathological Test', '250', 'diagnostic', 30, 0),
(42, 'CRP', 'Pathological Test', '400', 'diagnostic', 30, 0),
(43, 'R/A test', 'Pathological Test', '300', 'diagnostic', 30, 0),
(44, 'VDRL', 'Pathological Test', '200', 'diagnostic', 30, 0),
(45, 'TPHA', 'Pathological Test', '350', 'diagnostic', 30, 0),
(46, 'HBsAg (Screening)', 'Pathological Test', '300', 'diagnostic', 30, 0),
(47, 'HBsAg (Confirmatory)', 'Pathological Test', '600', 'diagnostic', 30, 0),
(48, 'CFT for Kala Zar', 'Pathological Test', '0', 'diagnostic', 0, 0),
(49, 'CFT for Filaria', 'Pathological Test', '0', 'diagnostic', 0, 0),
(50, 'Pregnancy Test', 'Pathological Test', '150', 'diagnostic', 30, 0),
(51, 'Blood Grouping', 'Pathological Test', '100', 'diagnostic', 30, 0),
(52, 'Widal Test', 'Pathological Test', '300', 'diagnostic', 30, 0),
(53, 'RBS', 'Pathological Test', '100', 'diagnostic', 30, 0),
(54, 'Blood Urea', 'Pathological Test', '250', 'diagnostic', 30, 0),
(55, 'S. Creatinine', 'Pathological Test', '250', 'diagnostic', 30, 0),
(56, 'S. cholesterol', 'Pathological Test', '250', 'diagnostic', 30, 0),
(57, 'Fasting Lipid Profile', 'Pathological Test', '850', 'diagnostic', 30, 0),
(58, 'S. Bilirubin', 'Pathological Test', '150', 'diagnostic', 30, 0),
(59, 'S. Alkaline Phosohare', 'Pathological Test', '300', 'diagnostic', 30, 0),
(60, 'S. Albumin', 'Pathological Test', '250', 'diagnostic', 30, 0),
(61, 'S. Calcium', 'Pathological Test', '350', 'diagnostic', 30, 0),
(62, 'RBS with CUS', 'Pathological Test', '160', 'diagnostic', 30, 0),
(63, 'SGPT', 'Pathological Test', '300', 'diagnostic', 30, 0),
(64, 'SGOT', 'Pathological Test', '300', 'diagnostic', 30, 0),
(65, 'Urine for R/E', 'Pathological Test', '150', 'diagnostic', 30, 0),
(66, 'Urine C/S', 'Pathological Test', '350', 'diagnostic', 30, 0),
(67, 'Stool for R/E', 'Pathological Test', '150', 'diagnostic', 30, 0),
(68, 'Semen Analysis', 'Pathological Test', '300', 'diagnostic', 30, 0),
(69, 'S. Electrolyte', 'Pathological Test', '800', 'diagnostic', 30, 0),
(70, 'S. T3/ T4/ THS', 'Pathological Test', '1000', 'diagnostic', 30, 0),
(71, 'MT', 'Pathological Test', '150', 'diagnostic', 30, 0),
(77, 'USG - Whole Abdomen ', 'USG - Whole Abdomen ', '400', 'diagnostic', 30, 0),
(73, 'ECHO Normal', 'ksdjkfsd', '700', 'diagnostic', 30, 0),
(76, 'x-ray chest', 'Normal', '200', 'diagnostic', 10, 0),
(79, 'USG - KUB', 'USG - KUB', '500', 'diagnostic', 20, 0),
(80, 'USG - Liver', 'USG - Liver', '400', 'diagnostic', 30, 0),
(81, 'USG - Breast (Left)', 'USG - Breast (Left)', '400', 'diagnostic', 30, 0),
(82, 'USG - Breast (Right)', 'USG - Breast (Right)', '400', 'diagnostic', 30, 0),
(83, 'X-RAY - Ba MealS+D  ', 'X-RAY - Ba MealS+D  ', '1400', 'diagnostic', 20, 0),
(84, 'X-RAY - Ba Swallo Oesopha', 'X-RAY - Ba Swallo Oesopha', '1000', 'diagnostic', 20, 0),
(85, 'X-RAY - KUB                         ', 'X-RAY - KUB ', '500', 'diagnostic', 20, 0),
(86, 'X-RAY - Leg Joint(B/V)(L/R)', 'X-RAY - Leg Joint(B/V)(L/R)', '500', 'diagnostic', 20, 0),
(87, 'X-RAY -Knee Joint(L/R)', 'X-RAY -Knee Joint(L/R)', '500', 'diagnostic', 20, 0),
(88, 'X-RAY - Finger(B/V) ', 'X-RAY - Finger(B/V) ', '350', 'diagnostic', 20, 0),
(89, 'X-RAY - Wrist(B/V)(L/R) ', 'X-RAY - Wrist(B/V)(L/R) ', '350', 'diagnostic', 20, 0),
(90, 'X-RAY - Hand(B/V)(L/R)                   ', 'X-RAY - Hand(B/V)(L/R)       ', '350', 'diagnostic', 20, 0),
(91, 'X-RAY - Elbow(B/V)(L/R)', 'X-RAY - Elbow(B/V)(L/R)', '350', 'diagnostic', 20, 0),
(92, 'X-RAY - Erm(B/V)(L/R )', 'X-RAY - Erm(B/V)(L/R )', '350', 'diagnostic', 20, 0),
(93, 'X-RAY - Shoulder Joint (B/V)', 'X-RAY - Shoulder Joint (B/V)', '500', 'diagnostic', 20, 0),
(94, 'X-RAY - Shoulder Joint (A/P)', 'X-RAY - Shoulder Joint (A/P)', '350', 'diagnostic', 20, 0),
(95, 'X-RAY - Foot (B/V)', 'X-RAY - Foot (B/V)', '350', 'diagnostic', 20, 0),
(96, 'X-RAY - Thigh(B/V)', 'X-RAY - Thigh(B/V)', '500', 'diagnostic', 20, 0),
(97, 'X-RAY - Ankle(B/V)', 'X-RAY - Ankle(B/V)', '350', 'diagnostic', 20, 0),
(98, 'X-RAY - Hip Joint(A/P)', 'X-RAY - Hip Joint(A/P)', '350', 'diagnostic', 20, 0),
(99, 'X-RAY - Pelvis(A/P)', 'X-RAY - Pelvis(A/P)', '500', 'diagnostic', 20, 0),
(100, 'X-RAY - L/S(B/V)(Lamber Spine)', 'X-RAY - L/S(B/V)(Lamber Spine)', '500', 'diagnostic', 20, 0),
(101, 'X-RAY - L/S(A/P)(LamberSpine)', 'X-RAY - L/S(A/P)(LamberSpine)', '500', 'diagnostic', 20, 0),
(102, 'X-RAY - D/L(A/P)(Thoracic)', 'X-RAY - D/L(A/P)(Thoracic)', '500', 'diagnostic', 20, 0),
(103, 'X-RAY - Mandable(B/V)', 'X-RAY - Mandable(B/V)', '500', 'diagnostic', 20, 0),
(104, 'X-RAY -C/S(AP)(Carvicai)', 'X-RAY -C/S(AP)(Carvicai)', '500', 'diagnostic', 20, 0),
(105, 'X-RAY - PNS (AP)', 'X-RAY - PNS (AP)', '350', 'diagnostic', 20, 0),
(106, 'ESR', 'Patho Test', '150', 'diagnostic', 30, 0),
(107, 'FBS CUS', 'Pathological test', '160', 'diagnostic', 30, 0),
(108, 'Hb%', 'Pathological test', '100', 'diagnostic', 30, 0),
(109, 'Physio-Therapy', 'Therapy', '1000', '', 0, 0),
(114, '2HABF', 'Pathological test', '100', 'diagnostic', 30, 0),
(113, 'FBS', 'Pathological test', '100', 'diagnostic', 30, 0),
(115, 'S. TSH', 'Pathological test', '400', 'diagnostic', 30, 0),
(116, 'S. T3', 'Pathological test', '400', 'diagnostic', 30, 0),
(117, 'DC', 'Pathological test', '200', 'diagnostic', 30, 0),
(118, 'TC', 'Pathological test', '200', 'diagnostic', 30, 0),
(119, 'X-Ray CXR (Digital)', 'X-Ray', '500', 'diagnostic', 20, 0),
(120, 'S. Uric acid', 'Pathological test', '250', 'diagnostic', 30, 0),
(122, 'U.S.G OF L/A ', 'U.S.G', '400', 'diagnostic', 30, 0),
(125, 'Rt knee joient b/v', 'X-Ray', '500', 'diagnostic', 20, 0),
(126, 'eosinphil', 'Pathology Test', '100', 'diagnostic', 0, 0),
(128, 'مستشفى', 'sadsad', '120', 'diagnostic', 10, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacist`
--

CREATE TABLE `pharmacist` (
  `id` int(100) NOT NULL,
  `img_url` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pharmacist`
--

INSERT INTO `pharmacist` (`id`, `img_url`, `name`, `email`, `address`, `phone`, `x`, `y`, `ion_user_id`) VALUES
(7, 'uploads/favicon6.png', 'Mr. Pharmacist', 'pharmacist@hms.com', 'Pottersbar, Hertfordshire, UK', '+880123456789', '', '', '110');

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_expense`
--

CREATE TABLE `pharmacy_expense` (
  `id` int(10) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_expense_category`
--

CREATE TABLE `pharmacy_expense_category` (
  `id` int(10) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `y` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_payment`
--

CREATE TABLE `pharmacy_payment` (
  `id` int(10) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `vat` varchar(100) NOT NULL DEFAULT '0',
  `x_ray` varchar(100) DEFAULT NULL,
  `flat_vat` varchar(100) DEFAULT NULL,
  `discount` varchar(100) NOT NULL DEFAULT '0',
  `flat_discount` varchar(100) DEFAULT NULL,
  `gross_total` varchar(100) DEFAULT NULL,
  `hospital_amount` varchar(100) DEFAULT NULL,
  `doctor_amount` varchar(100) DEFAULT NULL,
  `category_amount` varchar(1000) DEFAULT NULL,
  `category_name` varchar(1000) DEFAULT NULL,
  `amount_received` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pharmacy_payment_category`
--

CREATE TABLE `pharmacy_payment_category` (
  `id` int(10) NOT NULL,
  `category` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `c_price` varchar(100) DEFAULT NULL,
  `d_commission` int(100) DEFAULT NULL,
  `h_commission` int(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(100) NOT NULL,
  `date` varchar(100) DEFAULT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `symptom` varchar(100) DEFAULT NULL,
  `advice` varchar(1000) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `dd` varchar(100) DEFAULT NULL,
  `medicine` varchar(1000) DEFAULT NULL,
  `validity` varchar(100) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `patientname` varchar(1000) DEFAULT NULL,
  `doctorname` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `date`, `patient`, `doctor`, `symptom`, `advice`, `state`, `dd`, `medicine`, `validity`, `note`, `patientname`, `doctorname`) VALUES
(99, '1625954400', '63', '1', '<p>juhihi</p>\r\n', '<p>fjdkfnksjdfk</p>\r\n', NULL, NULL, '2878***50***1***5***after food', NULL, '<p>khknkn</p>\r\n', 'Faheem', 'Mr Doctor');

-- --------------------------------------------------------

--
-- Table structure for table `receptionist`
--

CREATE TABLE `receptionist` (
  `id` int(100) NOT NULL,
  `img_url` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `ion_user_id` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `receptionist`
--

INSERT INTO `receptionist` (`id`, `img_url`, `name`, `email`, `address`, `phone`, `x`, `ion_user_id`) VALUES
(7, '', 'Mr Receptionist', 'receptionist@hms.com', 'Collegepara, Rajbari', '+880123456789', '', '614');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(100) NOT NULL,
  `report_type` varchar(100) DEFAULT NULL,
  `patient` varchar(100) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `add_date` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` int(100) NOT NULL,
  `img_url` varchar(1000) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `img_url`, `title`, `description`) VALUES
(1, 'uploads/cardic1.jpg', 'Heart Transplant', 'Transplant Center has performed Corneal Transplants by providing quality and integrated care to the patients. We work in close collaboration with HOTA (Human Organ Transplant Authority) to ensure high quality and standard in donor corneal harvesting and transplantation.'),
(3, 'uploads/liver-transplant1.jpg', 'Liver Transplant', 'Liver transplant is a treatment option for people with liver failure and for some people with liver cancer who have significant complications due to end-stage chronic liver disease.'),
(4, 'uploads/Kidney1.jpg', 'Kidney Transplant ', 'Hospital started its Kidney Transplant program in 2001 and so far the team has performed more than 600 kidney transplant surgeries in both adult and pediatric patients at the facility'),
(6, 'uploads/discussion-organ-systems-human-body-another-influence1.jpg', 'Disease Diagnosis Dystem', 'A diagnostic program is an automatic computer program sequence that determines the operational status within the software, hardware, or any combination thereof in a component, a system, or a network of systems');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) NOT NULL,
  `system_vendor` varchar(100) DEFAULT NULL,
  `title` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `facebook_id` varchar(100) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `discount` varchar(100) DEFAULT NULL,
  `live_appointment_type` varchar(100) DEFAULT NULL,
  `vat` varchar(100) DEFAULT NULL,
  `login_title` varchar(100) DEFAULT NULL,
  `logo` varchar(500) DEFAULT NULL,
  `invoice_logo` varchar(500) DEFAULT NULL,
  `payment_gateway` varchar(100) DEFAULT NULL,
  `sms_gateway` varchar(100) DEFAULT NULL,
  `codec_username` varchar(100) DEFAULT NULL,
  `codec_purchase_code` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `system_vendor`, `title`, `address`, `phone`, `email`, `facebook_id`, `currency`, `language`, `discount`, `live_appointment_type`, `vat`, `login_title`, `logo`, `invoice_logo`, `payment_gateway`, `sms_gateway`, `codec_username`, `codec_purchase_code`) VALUES
(1, 'Hospital Management System', 'Hospital', 'Boropool, Rajbari-7700', '+0123456789', 'admin@11.com', '#', 'Rs', 'english', 'flat', 'jitsi', 'percentage', 'Login Title', 'uploads/logo-nonetext1.png', '', 'Stripe', 'MSG91', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `img_url` varchar(1000) DEFAULT NULL,
  `text1` varchar(500) DEFAULT NULL,
  `text2` varchar(500) DEFAULT NULL,
  `text3` varchar(500) DEFAULT NULL,
  `position` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`id`, `title`, `img_url`, `text1`, `text2`, `text3`, `position`, `status`) VALUES
(1, 'Slider 1', 'uploads/3847201.jpg', 'Welcome To ', 'Smart Hospital Management ', 'Hospital', '2', 'Active'),
(2, 'Best Hospital management System', 'uploads/banner.jpg', 'Best Hospital management System', 'Best Hospital management System', 'Best Hospital management System', '1', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `sms`
--

CREATE TABLE `sms` (
  `id` int(100) NOT NULL,
  `date` varchar(100) DEFAULT NULL,
  `message` varchar(1600) DEFAULT NULL,
  `recipient` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sms`
--

INSERT INTO `sms` (`id`, `date`, `message`, `recipient`, `user`) VALUES
(66, '1599481727', '{firstname}{address}{phone}{address}{email}{name}{lastname}{firstname}', 'Patient Id: 1<br> Patient Name: Mr Patient<br> Patient Phone: +8801777024443', '1'),
(67, '1599481826', 'gjhgjh', 'Patient Id: 1<br> Patient Name: Mr Patient<br> Patient Phone: +8801777024443', '1'),
(68, '1599556856', '{firstname}{address}{phone}{address}{email}{name}{lastname}{firstname}', 'Patient Id: 1<br> Patient Name: Mr Patient<br> Patient Phone: +8801777024443', '1'),
(69, '1599557403', '{firstname} come to my offce {lastname}', 'Patient Id: 60<br> Patient Name: shaibal saha<br> Patient Phone: +8801819636104', '1'),
(70, '1599557420', '{firstname}{address}{phone}{address}{email}{name}{lastname}{firstname}', 'All Patient', '1'),
(71, '1599743589', '{firstname}{address}{phone}{address}{email}{name}{lastname}{firstname}', 'Patient Id: 60<br> Patient Name: shaibal saha<br> Patient Phone: +8801819636104', '1'),
(72, '1599744175', '{firstname}{address}{phone}{address}{email}{name}{lastname}{firstname}', 'All Patient', '1'),
(73, '1600093303', '{company} {address} {phone}', 'Patient Id: 1<br> Patient Name: Mr Patient<br> Patient Phone: +8801777024443', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sms_settings`
--

CREATE TABLE `sms_settings` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `api_id` varchar(100) DEFAULT NULL,
  `sender` varchar(100) DEFAULT NULL,
  `authkey` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `sid` varchar(1000) DEFAULT NULL,
  `token` varchar(1000) DEFAULT NULL,
  `sendernumber` varchar(1000) DEFAULT NULL,
  `link` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sms_settings`
--

INSERT INTO `sms_settings` (`id`, `name`, `username`, `password`, `api_id`, `sender`, `authkey`, `user`, `sid`, `token`, `sendernumber`, `link`) VALUES
(1, 'Clickatell', 'Q2xpY2thdGVsbCBVc2VybmFtZQ==', '', 'API Id', NULL, NULL, '1', NULL, NULL, NULL, 'https://www.clickatell.com/'),
(2, 'MSG91', NULL, NULL, NULL, 'Sender', 'Auth Key', '1', NULL, NULL, NULL, 'https://msg91.com/'),
(5, 'Twilio', '', '', NULL, NULL, NULL, '1', 'Twilio SID', 'Twilio Token Password', 'Sender Number', 'https://www.twilio.com/'),
(6, 'Bulk Sms', 'VXNlcm5hbWU=', 'UGFzc3dvcmQ=', NULL, NULL, NULL, '1', NULL, NULL, NULL, 'https://www.bulksms.com/'),
(8, 'Bd Bulk Sms', '', '', NULL, NULL, NULL, '1', NULL, 'Bd Bulk Sms Token Password', NULL, 'https://bdbulksms.net/');

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` int(100) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `template` varchar(10000) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `template`
--

INSERT INTO `template` (`id`, `name`, `template`, `user`, `x`) VALUES
(6, 'CBC', '<table align=\"center\" border=\"1\" cellpadding=\"5\" cellspacing=\"0\">\n <thead>\n  <tr>\n   <th scope=\"col\">Head 1</th>\n   <th scope=\"col\">Head 2</th>\n   <th scope=\"col\">Head 3</th>\n   <th scope=\"col\">Head 4</th>\n   <th scope=\"col\">Head 5</th>\n  </tr>\n </thead>\n <tbody>\n  <tr>\n   <td> </td>\n   <td> </td>\n   <td> </td>\n   <td> </td>\n   <td> </td>\n  </tr>\n  <tr>\n   <td> </td>\n   <td> </td>\n   <td> </td>\n   <td> </td>\n   <td> </td>\n  </tr>\n </tbody>\n</table>\n\n<p> </p>\n', '1', ''),
(3, 'Diagnostic', '<table align=\"center\" border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\n <tbody>\n  <tr>\n   <td>Lab Name</td>\n   <td>Value</td>\n  </tr>\n  <tr>\n   <td> </td>\n   <td> </td>\n  </tr>\n  <tr>\n   <td> </td>\n   <td> </td>\n  </tr>\n </tbody>\n</table>\n\n<p> </p>\n', '1', ''),
(5, 'Lipid  Profile', '<table align=\"center\" border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\n <caption>Lipid Profile</caption>\n <thead>\n  <tr>\n   <th scope=\"col\">Head1</th>\n   <th scope=\"col\">Head2</th>\n   <th scope=\"col\">Head3</th>\n   <th scope=\"col\">Head4</th>\n   <th scope=\"col\">Head5</th>\n  </tr>\n </thead>\n <tbody>\n  <tr>\n   <td> </td>\n   <td> </td>\n   <td> </td>\n   <td> </td>\n   <td> </td>\n  </tr>\n  <tr>\n   <td> </td>\n   <td> </td>\n   <td> </td>\n   <td> </td>\n   <td> </td>\n  </tr>\n </tbody>\n</table>\n\n<p> </p>\n', '1', ''),
(8, 'superadmin', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td>gddgdga</td>\r\n			<td>gdgfdgdgfdgd</td>\r\n		</tr>\r\n		<tr>\r\n			<td>fgdfgdff</td>\r\n			<td>gfgdgfdgfd</td>\r\n		</tr>\r\n		<tr>\r\n			<td>gfdgfdd</td>\r\n			<td>\r\n			<p>gggfgfdgfdgd</p>\r\n\r\n			<p>?</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>?</p>\r\n', '111', ''),
(9, 'Lipid Profile Result', '<table align=\"center\" border=\"1\" cellpadding=\"1\" cellspacing=\"1\" summary=\"Result Of Lipid Profile \">\n <caption>Lipid Profile Result</caption>\n <tbody>\n  <tr>\n   <td>SL</td>\n   <td> Test Name</td>\n   <td>Test Result</td>\n   <td> Reference Valur</td>\n   <td>Comment</td>\n  </tr>\n  <tr>\n   <td> 1</td>\n   <td> Lipid Profile</td>\n   <td>    100</td>\n   <td> >10 < 150</td>\n   <td> Normal</td>\n  </tr>\n  <tr>\n   <td> 2</td>\n   <td>Lipid Profile</td>\n   <td>    100</td>\n   <td>>10 < 150</td>\n   <td> Normal</td>\n  </tr>\n  <tr>\n   <td> 3</td>\n   <td> Lipid Profile</td>\n   <td>    100</td>\n   <td>>10 < 150</td>\n   <td> Normal</td>\n  </tr>\n  <tr>\n   <td> 4</td>\n   <td>Lipid Profile</td>\n   <td>    100</td>\n   <td>>10 < 150</td>\n   <td> Normal</td>\n  </tr>\n </tbody>\n</table>\n\n<p> </p>\n', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `time_schedule`
--

CREATE TABLE `time_schedule` (
  `id` int(100) NOT NULL,
  `doctor` varchar(500) DEFAULT NULL,
  `weekday` varchar(100) DEFAULT NULL,
  `s_time` varchar(100) DEFAULT NULL,
  `e_time` varchar(100) DEFAULT NULL,
  `s_time_key` varchar(100) DEFAULT NULL,
  `duration` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `time_schedule`
--

INSERT INTO `time_schedule` (`id`, `doctor`, `weekday`, `s_time`, `e_time`, `s_time_key`, `duration`) VALUES
(109, '147', 'Friday', '01:45 PM', '05:45 PM', '165', '3'),
(110, '1', 'Monday', '11:45 AM', '01:15 PM', '141', '4');

-- --------------------------------------------------------

--
-- Table structure for table `time_slot`
--

CREATE TABLE `time_slot` (
  `id` int(100) NOT NULL,
  `doctor` varchar(100) DEFAULT NULL,
  `s_time` varchar(100) DEFAULT NULL,
  `e_time` varchar(100) DEFAULT NULL,
  `weekday` varchar(100) DEFAULT NULL,
  `s_time_key` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `time_slot`
--

INSERT INTO `time_slot` (`id`, `doctor`, `s_time`, `e_time`, `weekday`, `s_time_key`) VALUES
(2271, '147', '02:30 PM', '02:45 PM', 'Friday', '174'),
(2270, '147', '02:15 PM', '02:30 PM', 'Friday', '171'),
(2269, '147', '02:00 PM', '02:15 PM', 'Friday', '168'),
(2268, '147', '01:45 PM', '02:00 PM', 'Friday', '165'),
(2196, NULL, '01:30 PM', '01:45 PM', 'Tuesday', '162'),
(2197, NULL, '01:45 PM', '02:00 PM', 'Tuesday', '165'),
(2198, NULL, '02:00 PM', '02:15 PM', 'Tuesday', '168'),
(2199, NULL, '02:15 PM', '02:30 PM', 'Tuesday', '171'),
(2200, NULL, '02:30 PM', '02:45 PM', 'Tuesday', '174'),
(2201, NULL, '02:45 PM', '03:00 PM', 'Tuesday', '177'),
(2202, NULL, '03:00 PM', '03:15 PM', 'Tuesday', '180'),
(2203, NULL, '03:15 PM', '03:30 PM', 'Tuesday', '183'),
(2204, NULL, '03:30 PM', '03:45 PM', 'Tuesday', '186'),
(2205, NULL, '03:45 PM', '04:00 PM', 'Tuesday', '189'),
(2206, NULL, '04:00 PM', '04:15 PM', 'Tuesday', '192'),
(2207, NULL, '04:15 PM', '04:30 PM', 'Tuesday', '195'),
(2208, NULL, '04:30 PM', '04:45 PM', 'Tuesday', '198'),
(2209, NULL, '04:45 PM', '05:00 PM', 'Tuesday', '201'),
(2210, NULL, '05:00 PM', '05:15 PM', 'Tuesday', '204'),
(2211, NULL, '05:15 PM', '05:30 PM', 'Tuesday', '207'),
(2212, NULL, '05:30 PM', '05:45 PM', 'Tuesday', '210'),
(2213, NULL, '05:45 PM', '06:00 PM', 'Tuesday', '213'),
(2214, NULL, '06:00 PM', '06:15 PM', 'Tuesday', '216'),
(2215, NULL, '06:15 PM', '06:30 PM', 'Tuesday', '219'),
(2216, NULL, '06:30 PM', '06:45 PM', 'Tuesday', '222'),
(2217, NULL, '06:45 PM', '07:00 PM', 'Tuesday', '225'),
(2218, NULL, '07:00 PM', '07:15 PM', 'Tuesday', '228'),
(2219, NULL, '07:15 PM', '07:30 PM', 'Tuesday', '231'),
(2220, NULL, '07:30 PM', '07:45 PM', 'Tuesday', '234'),
(2221, NULL, '07:45 PM', '08:00 PM', 'Tuesday', '237'),
(2222, NULL, '08:00 PM', '08:15 PM', 'Tuesday', '240'),
(2223, NULL, '08:15 PM', '08:30 PM', 'Tuesday', '243'),
(2224, NULL, '08:30 PM', '08:45 PM', 'Tuesday', '246'),
(2225, NULL, '08:45 PM', '09:00 PM', 'Tuesday', '249'),
(2226, NULL, '09:00 PM', '09:15 PM', 'Tuesday', '252'),
(2227, NULL, '09:15 PM', '09:30 PM', 'Tuesday', '255'),
(2228, NULL, '09:30 PM', '09:45 PM', 'Tuesday', '258'),
(2229, NULL, '09:45 PM', '10:00 PM', 'Tuesday', '261'),
(2230, NULL, '10:00 PM', '10:15 PM', 'Tuesday', '264'),
(2231, NULL, '10:15 PM', '10:30 PM', 'Tuesday', '267'),
(2232, NULL, '10:30 PM', '10:45 PM', 'Tuesday', '270'),
(2233, NULL, '10:45 PM', '11:00 PM', 'Tuesday', '273'),
(2234, NULL, '11:00 PM', '11:15 PM', 'Tuesday', '276'),
(2235, NULL, '11:15 PM', '11:30 PM', 'Tuesday', '279'),
(2283, '147', '05:30 PM', '05:45 PM', 'Friday', '210'),
(2282, '147', '05:15 PM', '05:30 PM', 'Friday', '207'),
(2281, '147', '05:00 PM', '05:15 PM', 'Friday', '204'),
(2280, '147', '04:45 PM', '05:00 PM', 'Friday', '201'),
(2279, '147', '04:30 PM', '04:45 PM', 'Friday', '198'),
(2278, '147', '04:15 PM', '04:30 PM', 'Friday', '195'),
(2277, '147', '04:00 PM', '04:15 PM', 'Friday', '192'),
(2276, '147', '03:45 PM', '04:00 PM', 'Friday', '189'),
(2275, '147', '03:30 PM', '03:45 PM', 'Friday', '186'),
(2274, '147', '03:15 PM', '03:30 PM', 'Friday', '183'),
(2273, '147', '03:00 PM', '03:15 PM', 'Friday', '180'),
(2272, '147', '02:45 PM', '03:00 PM', 'Friday', '177'),
(2284, '1', '11:45 AM', '12:05 PM', 'Monday', '141'),
(2285, '1', '12:05 PM', '12:25 PM', 'Monday', '145'),
(2286, '1', '12:25 PM', '12:45 PM', 'Monday', '149'),
(2287, '1', '12:45 PM', '01:05 PM', 'Monday', '153');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'admin', '$2y$08$GclRTUhfRYv19X.qFyJ7KegFXr6CZq93.cZtxil5akzCEss1m2UrK', '', 'admin@hms.com', '', 'eX0.Bq6nP57EuXX4hJkPHO973e7a4c25f1849d3a', 1511432365, 'zCeJpcj78CKqJ4sVxVbxcO', 1268889823, 1626251087, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(109, '113.11.74.192', 'Mrs Nurse', '$2y$08$CqxsVFewynbZi6UBOe481eJWbkNdOa/ehpmlGXJnrjq5mvpPDdzoO', NULL, 'nurse@hms.com', NULL, NULL, NULL, NULL, 1435082243, 1626001836, 1, NULL, NULL, NULL, NULL),
(110, '113.11.74.192', 'Mr. Pharmacist', '$2y$08$uy2YnEG6kAADq8QLL2MS7OfvPs.ZLcWmAVJCj5LA4pNQTuuBWNZ4G', NULL, 'pharmacist@hms.com', NULL, NULL, NULL, 'mbeMop6vTuscFYmD2M4Iqu', 1435082359, 1625026145, 1, NULL, NULL, NULL, NULL),
(111, '113.11.74.192', 'Mr Laboratorist', '$2y$08$hSHiFXnJZE4fusxX2WlfYeIVIYLH2H6ZfyINHRQLbrTAUcnVc572a', NULL, 'laboratorist@hms.com', NULL, NULL, NULL, NULL, 1435082438, 1625026023, 1, NULL, NULL, NULL, NULL),
(112, '113.11.74.192', 'Mr. Accountant', '$2y$08$MeJQlgRC1AALgtvxfXwhuu5p1QOE9VAhXf7eM7llpt1TRRpNxVAFu', NULL, 'accountant@hms.com', NULL, NULL, NULL, NULL, 1435082637, 1625025836, 1, NULL, NULL, NULL, NULL),
(614, '103.231.162.58', 'Mr Receptionist', '$2y$08$K2lK8Adt2whlJupWKZuPiuE7GIS.yI0ort8xgOGAERLqdwapGWszq', NULL, 'receptionist@hms.com', NULL, NULL, NULL, NULL, 1505800835, 1625024747, 1, NULL, NULL, NULL, NULL),
(681, '103.231.161.30', 'Mr Patient', '$2y$08$j3zhfraqNBFknCgyc.nc2.7tZ4pLRjW6JFUwH7kLfqqCG5y8QUmgm', NULL, 'patient@hms.com', NULL, NULL, NULL, NULL, 1548872582, 1626079638, 1, NULL, NULL, NULL, NULL),
(709, '103.231.160.47', 'Mr Doctor', '$2y$08$OpopE/0j9osR4hnNnyCz3eekXDTQsMRpXgs7VfDvXxmG8vGxFt3.u', NULL, 'doctor@hms.com', NULL, NULL, NULL, NULL, 1558379920, 1626079832, 1, NULL, NULL, NULL, NULL),
(1553, '::1', 'Faheem', '$2y$08$ds/0BGov.lY0FEFa4rEzP./YqFSbc0ght6zD/.C3O0cXMYg85VXvy', NULL, 'bc.oyee@gmail.com', NULL, 'hDwkg.uSyzcd9d9975a066adb045a3bb0b9f63ad', 1625824011, NULL, 1618822605, NULL, 1, NULL, NULL, NULL, NULL),
(1554, '::1', 'faheem mehdi', '$2y$08$cYO02/IlhdZsArM8Yi08rexqIJxaB5wACQDNKj3ZQV3sEbbRk8kim', NULL, 'faheemmehdi012@gmail.com', NULL, 'wF.WU40Htx2309a6d1e3f38b75c10ac0aefbce97', 1625820528, NULL, 1625203368, 1625235997, 1, NULL, NULL, NULL, NULL),
(1555, '::1', 'Ali hamza', '$2y$08$KcQp2bz0YBS0YFUpWPeybuGD3acLQiOYgnmdSL/sb8yNH0E/2pBoa', NULL, 'ali@gmail.com', NULL, NULL, NULL, NULL, 1625236108, 1625240327, 1, NULL, NULL, NULL, NULL),
(1556, '::1', 'kumail', '$2y$08$4yE5Qc4r9ria5oYtvL8sieEOpNVfZlT4o37TGC2prrxdj0GyhrQ56', NULL, 'kumail@gmail.com', NULL, NULL, NULL, NULL, 1625236243, NULL, 1, NULL, NULL, NULL, NULL),
(1557, '::1', 'usama', '$2y$08$B8Rh27XK8M29PdEea6NwB.wYqM/nOw6wK/5ixUof6Y64wTJoS3Jta', NULL, 'usama@gmail.com', NULL, NULL, NULL, NULL, 1625985358, NULL, 1, NULL, NULL, NULL, NULL),
(1558, '::1', 'babar', '$2y$08$//hm1ySZ4Xe0pYD54kenfuuuO7ExVz/OgJ0AhG5ybagVrBDMz2gQC', NULL, 'babar@gmail.com', NULL, NULL, NULL, NULL, 1625985630, NULL, 1, NULL, NULL, NULL, NULL),
(1559, '::1', 'anas', '$2y$08$vIqtpFc7w8DCu/pZyTTPieqR0xchPlEHQ.ZVnfWdpCyDYQYMUKR96', NULL, 'anas@gmail.com', NULL, NULL, NULL, NULL, 1625985710, NULL, 1, NULL, NULL, NULL, NULL),
(1560, '::1', 'babar1', '$2y$08$q5pQeunCuleQxPuCqR5sC.E2knGDbw09ZhnaMa5Y3q/GVdCGPB3E6', NULL, 'babar11@gmail.com', NULL, NULL, NULL, NULL, 1626079824, NULL, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(111, 109, 6),
(112, 110, 7),
(113, 111, 8),
(114, 112, 3),
(616, 614, 10),
(683, 681, 5),
(711, 709, 4),
(5550, 1553, 5),
(5551, 1554, 4),
(5552, 1555, 5),
(5553, 1556, 5),
(5554, 1557, 5),
(5555, 1558, 5),
(5556, 1559, 5),
(5557, 1560, 5);

-- --------------------------------------------------------

--
-- Table structure for table `website_settings`
--

CREATE TABLE `website_settings` (
  `id` int(100) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `logo` varchar(1000) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `emergency` varchar(100) DEFAULT NULL,
  `support` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `block_1_text_under_title` varchar(500) DEFAULT NULL,
  `service_block__text_under_title` varchar(500) DEFAULT NULL,
  `doctor_block__text_under_title` varchar(500) DEFAULT NULL,
  `facebook_id` varchar(100) DEFAULT NULL,
  `twitter_id` varchar(100) DEFAULT NULL,
  `google_id` varchar(100) DEFAULT NULL,
  `youtube_id` varchar(100) DEFAULT NULL,
  `skype_id` varchar(100) DEFAULT NULL,
  `x` varchar(100) DEFAULT NULL,
  `twitter_username` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `website_settings`
--

INSERT INTO `website_settings` (`id`, `title`, `logo`, `address`, `phone`, `emergency`, `support`, `email`, `currency`, `block_1_text_under_title`, `service_block__text_under_title`, `doctor_block__text_under_title`, `facebook_id`, `twitter_id`, `google_id`, `youtube_id`, `skype_id`, `x`, `twitter_username`) VALUES
(1, 'Smart HealthCare ', '', 'demo address ', '03********', '03*********', '03*********', 'smarthelathcare@hms.com', 'Rs', 'Best Hospital ', 'We work with forward thinking clients to create beautiful, honest and amazing things that bring positive results.', 'Best doctors', 'https://www.facebook.com/xyz', 'https://www.facebook.com/xyz', 'https://www.facebook.com/xyz', 'https://www.facebook.com/xyz', 'https://www.facebook.com/xyz', NULL, 'https://www.facebook.com/xyz');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountant`
--
ALTER TABLE `accountant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alloted_bed`
--
ALTER TABLE `alloted_bed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `autoemailshortcode`
--
ALTER TABLE `autoemailshortcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `autoemailtemplate`
--
ALTER TABLE `autoemailtemplate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `autosmsshortcode`
--
ALTER TABLE `autosmsshortcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `autosmstemplate`
--
ALTER TABLE `autosmstemplate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bankb`
--
ALTER TABLE `bankb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bed`
--
ALTER TABLE `bed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bed_category`
--
ALTER TABLE `bed_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `diagnostic_report`
--
ALTER TABLE `diagnostic_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donor`
--
ALTER TABLE `donor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_settings`
--
ALTER TABLE `email_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_category`
--
ALTER TABLE `expense_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featured`
--
ALTER TABLE `featured`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `laboratorist`
--
ALTER TABLE `laboratorist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lab_category`
--
ALTER TABLE `lab_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manualemailshortcode`
--
ALTER TABLE `manualemailshortcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manualsmsshortcode`
--
ALTER TABLE `manualsmsshortcode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manual_email_template`
--
ALTER TABLE `manual_email_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manual_sms_template`
--
ALTER TABLE `manual_sms_template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_history`
--
ALTER TABLE `medical_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine`
--
ALTER TABLE `medicine`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicine_category`
--
ALTER TABLE `medicine_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting`
--
ALTER TABLE `meeting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting_settings`
--
ALTER TABLE `meeting_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notice`
--
ALTER TABLE `notice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nurse`
--
ALTER TABLE `nurse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ot_payment`
--
ALTER TABLE `ot_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_deposit`
--
ALTER TABLE `patient_deposit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_material`
--
ALTER TABLE `patient_material`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentgateway`
--
ALTER TABLE `paymentgateway`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_category`
--
ALTER TABLE `payment_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacist`
--
ALTER TABLE `pharmacist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy_expense`
--
ALTER TABLE `pharmacy_expense`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy_expense_category`
--
ALTER TABLE `pharmacy_expense_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy_payment`
--
ALTER TABLE `pharmacy_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacy_payment_category`
--
ALTER TABLE `pharmacy_payment_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `receptionist`
--
ALTER TABLE `receptionist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms`
--
ALTER TABLE `sms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_settings`
--
ALTER TABLE `sms_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_schedule`
--
ALTER TABLE `time_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `time_slot`
--
ALTER TABLE `time_slot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- Indexes for table `website_settings`
--
ALTER TABLE `website_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountant`
--
ALTER TABLE `accountant`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `alloted_bed`
--
ALTER TABLE `alloted_bed`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=483;

--
-- AUTO_INCREMENT for table `autoemailshortcode`
--
ALTER TABLE `autoemailshortcode`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `autoemailtemplate`
--
ALTER TABLE `autoemailtemplate`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `autosmsshortcode`
--
ALTER TABLE `autosmsshortcode`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `autosmstemplate`
--
ALTER TABLE `autosmstemplate`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `bankb`
--
ALTER TABLE `bankb`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `bed`
--
ALTER TABLE `bed`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `bed_category`
--
ALTER TABLE `bed_category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `diagnostic_report`
--
ALTER TABLE `diagnostic_report`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;

--
-- AUTO_INCREMENT for table `donor`
--
ALTER TABLE `donor`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `email`
--
ALTER TABLE `email`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `email_settings`
--
ALTER TABLE `email_settings`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `expense_category`
--
ALTER TABLE `expense_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `featured`
--
ALTER TABLE `featured`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `lab`
--
ALTER TABLE `lab`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1931;

--
-- AUTO_INCREMENT for table `laboratorist`
--
ALTER TABLE `laboratorist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lab_category`
--
ALTER TABLE `lab_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `manualemailshortcode`
--
ALTER TABLE `manualemailshortcode`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `manualsmsshortcode`
--
ALTER TABLE `manualsmsshortcode`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `manual_email_template`
--
ALTER TABLE `manual_email_template`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `manual_sms_template`
--
ALTER TABLE `manual_sms_template`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `medical_history`
--
ALTER TABLE `medical_history`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `medicine`
--
ALTER TABLE `medicine`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2879;

--
-- AUTO_INCREMENT for table `medicine_category`
--
ALTER TABLE `medicine_category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `meeting`
--
ALTER TABLE `meeting`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=616;

--
-- AUTO_INCREMENT for table `meeting_settings`
--
ALTER TABLE `meeting_settings`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `notice`
--
ALTER TABLE `notice`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `nurse`
--
ALTER TABLE `nurse`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `ot_payment`
--
ALTER TABLE `ot_payment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `patient_deposit`
--
ALTER TABLE `patient_deposit`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1710;

--
-- AUTO_INCREMENT for table `patient_material`
--
ALTER TABLE `patient_material`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2398;

--
-- AUTO_INCREMENT for table `paymentgateway`
--
ALTER TABLE `paymentgateway`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment_category`
--
ALTER TABLE `payment_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `pharmacist`
--
ALTER TABLE `pharmacist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pharmacy_expense`
--
ALTER TABLE `pharmacy_expense`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `pharmacy_expense_category`
--
ALTER TABLE `pharmacy_expense_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `pharmacy_payment`
--
ALTER TABLE `pharmacy_payment`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1976;

--
-- AUTO_INCREMENT for table `pharmacy_payment_category`
--
ALTER TABLE `pharmacy_payment_category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `receptionist`
--
ALTER TABLE `receptionist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sms`
--
ALTER TABLE `sms`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `sms_settings`
--
ALTER TABLE `sms_settings`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `time_schedule`
--
ALTER TABLE `time_schedule`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `time_slot`
--
ALTER TABLE `time_slot`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2288;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1561;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5558;

--
-- AUTO_INCREMENT for table `website_settings`
--
ALTER TABLE `website_settings`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
