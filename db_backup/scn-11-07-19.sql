-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2019 at 07:37 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `scn`
--

-- --------------------------------------------------------

--
-- Table structure for table `bg_country`
--

CREATE TABLE `bg_country` (
  `COUNTRY_ID` int(11) NOT NULL DEFAULT '0',
  `COUNTRY_NAME` varchar(100) DEFAULT NULL,
  `SHORT_CODE_ISO` char(2) DEFAULT NULL,
  `SHORT_CODE_UN` char(3) DEFAULT NULL,
  `NUM_UN` int(11) DEFAULT NULL,
  `DIAL_CODE` int(11) DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `COUNTRY_REMARKS` varchar(4000) DEFAULT NULL,
  `ENTERED_BY` int(11) DEFAULT NULL,
  `ENTRY_TIMESTAMP` date DEFAULT NULL,
  `UPDATED_BY` int(11) DEFAULT NULL,
  `UPDATE_TIMESTAMP` date DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) DEFAULT NULL,
  `FLEX_FIELD4` varchar(500) DEFAULT NULL,
  `FLEX_FIELD5` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bg_country`
--

INSERT INTO `bg_country` (`COUNTRY_ID`, `COUNTRY_NAME`, `SHORT_CODE_ISO`, `SHORT_CODE_UN`, `NUM_UN`, `DIAL_CODE`, `ACTIVE_STATUS`, `COUNTRY_REMARKS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`, `FLEX_FIELD4`, `FLEX_FIELD5`) VALUES
(20190001, 'Bangladesh', 'BD', NULL, NULL, NULL, 1, NULL, 2, '2019-06-12', 2, '2019-06-12', NULL, NULL, NULL, NULL, NULL),
(20190002, 'India', 'IN', NULL, NULL, NULL, 1, NULL, 2, '2019-06-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20190003, 'Pakistan', 'PK', NULL, NULL, NULL, 1, NULL, 2, '2019-06-12', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bg_designation`
--

CREATE TABLE `bg_designation` (
  `DESIGNATION_ID` bigint(20) NOT NULL DEFAULT '0',
  `DESIGNATION_NAME` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DESIGNATION_TYPE` int(11) DEFAULT NULL,
  `SHORT_CODE` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `REMARKS` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ENTERED_BY` bigint(20) DEFAULT NULL,
  `ENTRY_TIMESTAMP` datetime DEFAULT NULL,
  `UPDATED_BY` bigint(20) DEFAULT NULL,
  `UPDATE_TIMESTAMP` datetime DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bg_designation`
--

INSERT INTO `bg_designation` (`DESIGNATION_ID`, `DESIGNATION_NAME`, `DESIGNATION_TYPE`, `SHORT_CODE`, `ACTIVE_STATUS`, `REMARKS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`) VALUES
(20190001, 'Chairman', 2, 'C', 1, NULL, 2, '2019-05-21 09:06:06', NULL, NULL, NULL, NULL, NULL),
(20190002, 'Managing Director', 2, 'MD', 1, NULL, 2, '2019-05-21 09:06:21', NULL, NULL, NULL, NULL, NULL),
(20190003, 'Governing Body', 2, 'GB', 1, NULL, 2, '2019-05-21 09:06:35', NULL, NULL, NULL, NULL, NULL),
(20190004, 'Principal', 2, 'P', 1, NULL, 2, '2019-05-21 09:06:54', 2, '2019-06-19 06:28:27', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bg_user`
--

CREATE TABLE `bg_user` (
  `USER_ID` bigint(20) NOT NULL DEFAULT '0',
  `USER_NAME` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `USER_TITLE` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DESIGNATION_ACADEMIC` int(11) DEFAULT NULL,
  `DESIGNATION_ADMIN` int(11) DEFAULT NULL,
  `QUALIFICATION` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PROFILE` text COLLATE utf8_unicode_ci,
  `LOGIN_USER` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SECURITY_CODE` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `GENDER` int(11) DEFAULT NULL,
  `BLOOD_GROUP` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FATHER_NAME` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MOTHER_NAME` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PROFESSION` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PRESENT_ADDRESS` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PERMANENT_ADDRESS` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NATIONAL_ID` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `USER_TYPE_ID` int(11) DEFAULT NULL,
  `SPOUSE_NAME` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `USER_IMAGE_PATH` text COLLATE utf8_unicode_ci,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `REMARKS` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ENTERED_BY` bigint(20) DEFAULT NULL,
  `ENTRY_TIMESTAMP` datetime DEFAULT NULL,
  `UPDATED_BY` bigint(20) DEFAULT NULL,
  `UPDATE_TIMESTAMP` datetime DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bg_user_type`
--

CREATE TABLE `bg_user_type` (
  `USER_TYPE_ID` bigint(20) NOT NULL DEFAULT '0',
  `TYPE_NAME` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SHORT_CODE` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `REMARKS` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ENTERED_BY` bigint(20) DEFAULT NULL,
  `ENTRY_TIMESTAMP` datetime DEFAULT NULL,
  `UPDATED_BY` bigint(20) DEFAULT NULL,
  `UPDATE_TIMESTAMP` datetime DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `scn_about_us`
--

CREATE TABLE `scn_about_us` (
  `ABOUT_US_ID` bigint(20) NOT NULL,
  `ABOUT_US_CONTENT` text,
  `IMAGE_FILE_PATH` varchar(200) DEFAULT NULL,
  `REMARKS` varchar(500) DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `ENTERED_BY` bigint(20) DEFAULT NULL,
  `ENTRY_TIMESTAMP` date DEFAULT NULL,
  `UPDATED_BY` bigint(20) DEFAULT NULL,
  `UPDATE_TIMESTAMP` date DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) DEFAULT NULL,
  `FLEX_FIELD4` varchar(500) DEFAULT NULL,
  `FLEX_FIELD5` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scn_about_us`
--

INSERT INTO `scn_about_us` (`ABOUT_US_ID`, `ABOUT_US_CONTENT`, `IMAGE_FILE_PATH`, `REMARKS`, `ACTIVE_STATUS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`, `FLEX_FIELD4`, `FLEX_FIELD5`) VALUES
(1, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum took a galley of type and scrambled it to make a type specimen book to continue Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum took a galley of type and scrambled it to</p>\r\n\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', '1_1559364618.png', NULL, NULL, NULL, NULL, 2, '2019-06-19', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scn_academic_calendar`
--

CREATE TABLE `scn_academic_calendar` (
  `CALENDAR_ID` bigint(20) NOT NULL DEFAULT '0',
  `EVENT_DATE` date DEFAULT NULL,
  `EVENT_TYPE_ID` int(11) DEFAULT NULL,
  `EVENT_DESC` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CLASS_OFF` int(11) DEFAULT NULL,
  `REMARKS` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `ENTERED_BY` int(11) DEFAULT NULL,
  `ENTRY_TIMESTAMP` datetime DEFAULT NULL,
  `UPDATED_BY` int(11) DEFAULT NULL,
  `UPDATE_TIMESTAMP` datetime DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `scn_academic_calendar`
--

INSERT INTO `scn_academic_calendar` (`CALENDAR_ID`, `EVENT_DATE`, `EVENT_TYPE_ID`, `EVENT_DESC`, `CLASS_OFF`, `REMARKS`, `ACTIVE_STATUS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`) VALUES
(20190001, '2019-06-02', 20190002, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', 0, NULL, 1, 2, '2019-05-26 05:54:40', 2, '2019-05-26 06:19:51', NULL, NULL, NULL),
(20190002, '2019-05-24', 20190001, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut</p>', 0, NULL, 1, 2, '2019-05-26 07:24:05', NULL, NULL, NULL, NULL, NULL),
(20190003, '2019-05-27', 20190002, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut</p>', 0, NULL, 1, 2, '2019-05-27 06:54:30', NULL, NULL, NULL, NULL, NULL),
(20190004, '2019-05-28', 20190002, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut</p>', 0, NULL, 1, 2, '2019-05-27 06:54:30', NULL, NULL, NULL, NULL, NULL),
(20190005, '2019-05-29', 20190002, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut</p>', 0, NULL, 1, 2, '2019-05-27 06:54:30', NULL, NULL, NULL, NULL, NULL),
(20190006, '2019-05-30', 20190002, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut</p>', 0, NULL, 1, 2, '2019-05-27 06:54:30', NULL, NULL, NULL, NULL, NULL),
(20190007, '2019-05-31', 20190002, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut</p>', 0, NULL, 1, 2, '2019-05-27 06:54:30', NULL, NULL, NULL, NULL, NULL),
(20190008, '2019-05-27', 20190001, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut</p>', 0, NULL, 1, 2, '2019-05-27 06:55:00', NULL, NULL, NULL, NULL, NULL),
(20190009, '2019-05-08', 20190004, '<p>To welcome the auspicious month of Ramadan, your favorite Koyla Restaurant has a number of surprising offers waiting to be unveiled for our loyal customers</p>', 0, NULL, 1, 2, '2019-05-27 07:24:12', NULL, NULL, NULL, NULL, NULL),
(20190010, '2019-05-09', 20190004, '<p>To welcome the auspicious month of Ramadan, your favorite Koyla Restaurant has a number of surprising offers waiting to be unveiled for our loyal customers</p>', 0, NULL, 1, 2, '2019-05-27 07:24:12', NULL, NULL, NULL, NULL, NULL),
(20190011, '2019-06-02', 20190002, NULL, 0, NULL, 1, 2, '2019-05-28 04:41:25', NULL, NULL, NULL, NULL, NULL),
(20190012, '2019-06-03', 20190002, NULL, 0, NULL, 1, 2, '2019-05-28 04:41:25', NULL, NULL, NULL, NULL, NULL),
(20190013, '2019-06-04', 20190002, NULL, 0, NULL, 1, 2, '2019-05-28 04:41:25', NULL, NULL, NULL, NULL, NULL),
(20190014, '2019-06-05', 20190002, NULL, 0, NULL, 1, 2, '2019-05-28 04:41:25', NULL, NULL, NULL, NULL, NULL),
(20190015, '2019-06-06', 20190002, NULL, 0, NULL, 1, 2, '2019-05-28 04:41:25', NULL, NULL, NULL, NULL, NULL),
(20190016, '2019-06-08', 20190002, NULL, 0, NULL, 1, 2, '2019-05-28 04:41:25', NULL, NULL, NULL, NULL, NULL),
(20190017, '2019-05-07', 20190003, NULL, 1, NULL, 1, 2, '2019-05-28 04:42:51', NULL, NULL, NULL, NULL, NULL),
(20190018, '2019-05-08', 20190003, NULL, 1, NULL, 1, 2, '2019-05-28 04:42:51', NULL, NULL, NULL, NULL, NULL),
(20190019, '2019-05-09', 20190003, NULL, 1, NULL, 1, 2, '2019-05-28 04:42:51', NULL, NULL, NULL, NULL, NULL),
(20190020, '2019-05-12', 20190003, NULL, 1, NULL, 1, 2, '2019-05-28 04:42:51', NULL, NULL, NULL, NULL, NULL),
(20190021, '2019-05-13', 20190003, NULL, 1, NULL, 1, 2, '2019-05-28 04:42:51', NULL, NULL, NULL, NULL, NULL),
(20190022, '2019-05-14', 20190003, NULL, 1, NULL, 1, 2, '2019-05-28 04:42:51', NULL, NULL, NULL, NULL, NULL),
(20190023, '2019-05-15', 20190003, NULL, 1, NULL, 1, 2, '2019-05-28 04:42:51', NULL, NULL, NULL, NULL, NULL),
(20190024, '2019-05-16', 20190003, NULL, 1, NULL, 1, 2, '2019-05-28 04:42:51', NULL, NULL, NULL, NULL, NULL),
(20190025, '2019-05-19', 20190003, NULL, 1, NULL, 1, 2, '2019-05-28 04:42:51', NULL, NULL, NULL, NULL, NULL),
(20190026, '2019-05-20', 20190003, NULL, 1, NULL, 1, 2, '2019-05-28 04:42:51', NULL, NULL, NULL, NULL, NULL),
(20190027, '2019-05-21', 20190003, NULL, 1, NULL, 1, 2, '2019-05-28 04:42:51', NULL, NULL, NULL, NULL, NULL),
(20190034, '2019-05-28', 20190003, NULL, 1, NULL, 1, 2, '2019-05-28 04:51:27', 2, '2019-06-19 06:20:50', NULL, NULL, NULL),
(20190033, '2019-05-07', 20190004, NULL, 1, NULL, 1, 2, '2019-05-28 04:48:10', NULL, NULL, NULL, NULL, NULL),
(20190032, '2019-05-06', 20190004, NULL, 1, NULL, 1, 2, '2019-05-28 04:48:10', NULL, NULL, NULL, NULL, NULL),
(20190031, '2019-05-04', 20190004, NULL, 1, NULL, 1, 2, '2019-05-28 04:48:10', NULL, NULL, NULL, NULL, NULL),
(20190030, '2019-05-03', 20190004, NULL, 1, NULL, 1, 2, '2019-05-28 04:48:10', NULL, NULL, NULL, NULL, NULL),
(20190029, '2019-05-02', 20190004, NULL, 1, NULL, 1, 2, '2019-05-28 04:48:10', NULL, NULL, NULL, NULL, NULL),
(20190028, '2019-05-01', 20190004, NULL, 1, NULL, 1, 2, '2019-05-28 04:48:10', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scn_admission_application_form`
--

CREATE TABLE `scn_admission_application_form` (
  `ADMISSION_APPLICATION_FORM_ID` bigint(20) NOT NULL DEFAULT '0',
  `APPLICANT_NAME` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PROGRAM_ID` bigint(20) DEFAULT NULL,
  `SESSION_ID` bigint(20) DEFAULT NULL,
  `FATHER_NAME` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FATHER_PROFESSION` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MOTHER_NAME` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MOTHER_PROFESSION` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `APPLICANT_PHOTO_PATH` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `APPLICATION_IMAGE_PATH` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BIRTH_PLACE` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BIRTH_DISTRICT` bigint(20) DEFAULT NULL,
  `MARITAL_STATUS` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NATIONALITY` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NATIONAL_ID` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `RELIGION` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CASTE` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PERMANENT_ADDRESS` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PERMANENT_PS` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PERMANENT_UPAZILLA` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PERMANENT_DISTRICT` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PERMANENT_POST_CODE` int(11) DEFAULT NULL,
  `PERMANENT_COUNTRY_ID` bigint(20) DEFAULT NULL,
  `CONTACT_ADDRESS` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `CONTACT_NO` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EMAIL_ID` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LEGAL_GUARDIAN_NAME1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LEGAL_GUARDIAN_CONTACT_ADDRESS1` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LEGAL_GUARDIAN_CONTACT_NO1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LEGAL_GUARDIAN_RELATION1` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LEGAL_GUARDIAN_NAME2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LEGAL_GUARDIAN_CONTACT_ADDRESS2` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LEGAL_GUARDIAN_CONTACT_NO2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LEGAL_GUARDIAN_RELATION2` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `REMARKS` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `ENTERED_BY` int(11) DEFAULT NULL,
  `ENTRY_TIMESTAMP` datetime DEFAULT NULL,
  `UPDATED_BY` int(11) DEFAULT NULL,
  `UPDATE_TIMESTAMP` datetime DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ATTACHED_DOC` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ADMISSION_APP_FORM_DECLARATION_ID` bigint(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `scn_admission_application_form`
--

INSERT INTO `scn_admission_application_form` (`ADMISSION_APPLICATION_FORM_ID`, `APPLICANT_NAME`, `PROGRAM_ID`, `SESSION_ID`, `FATHER_NAME`, `FATHER_PROFESSION`, `MOTHER_NAME`, `MOTHER_PROFESSION`, `DOB`, `APPLICANT_PHOTO_PATH`, `APPLICATION_IMAGE_PATH`, `BIRTH_PLACE`, `BIRTH_DISTRICT`, `MARITAL_STATUS`, `NATIONALITY`, `NATIONAL_ID`, `RELIGION`, `CASTE`, `PERMANENT_ADDRESS`, `PERMANENT_PS`, `PERMANENT_UPAZILLA`, `PERMANENT_DISTRICT`, `PERMANENT_POST_CODE`, `PERMANENT_COUNTRY_ID`, `CONTACT_ADDRESS`, `CONTACT_NO`, `EMAIL_ID`, `LEGAL_GUARDIAN_NAME1`, `LEGAL_GUARDIAN_CONTACT_ADDRESS1`, `LEGAL_GUARDIAN_CONTACT_NO1`, `LEGAL_GUARDIAN_RELATION1`, `LEGAL_GUARDIAN_NAME2`, `LEGAL_GUARDIAN_CONTACT_ADDRESS2`, `LEGAL_GUARDIAN_CONTACT_NO2`, `LEGAL_GUARDIAN_RELATION2`, `REMARKS`, `ACTIVE_STATUS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`, `ATTACHED_DOC`, `ADMISSION_APP_FORM_DECLARATION_ID`) VALUES
(20190001, 'Habib R', 20190001, 20190001, 'Father', 'Business', 'Mother', 'housewife', '2018-10-01', NULL, NULL, 'Dhaka', NULL, 'S', 'Bangladeshi', NULL, 'Muslim', NULL, 'Prothom Alo', NULL, 'Chilmari', 'Kurigram', NULL, 20190001, 'Prothom Alo', '01740473189', 'manager@example.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 2, '2019-05-29 07:56:50', 2, '2019-06-12 06:16:23', NULL, NULL, NULL, NULL, NULL),
(20190002, 'Sohel', 20190001, 20190001, 'Father', 'Business', 'Mother', 'housewife', '2019-05-01', '36311116_2046812478904662_6313732612384882688_n_1559194173.jpg', NULL, 'Dhaka', NULL, 'S', 'Bangladeshi', '123456789', 'Muslim', NULL, 'House NO- 532, West Khor khoriya', NULL, 'Chilmari', 'Kurigram', NULL, 20190002, 'House NO - 75, Road NO - 8, Kalshi, Mirpur -12', '01740473189', 'habibcse335@gmail.com', 'Ibne Soud Mia', 'House NO- 532, West Khor khoriya, Chilmari, Kurigram', '01917054053', 'Father', 'Arman Hossain', 'House NO- 532, West Khor khoriya, Chilmari, Kurigram', '01917054053', 'Brother', NULL, 1, 2, '2019-05-30 05:29:34', 2, '2019-06-12 06:13:22', NULL, NULL, NULL, NULL, 20190001),
(20190003, 'Habib R', 20190001, 20190001, 'Father', 'Business', 'Mother', 'housewife', '2019-06-01', 'IMG-20170305-WA0036.jpg (1)_1560587009.jpg', NULL, 'Dhaka', NULL, 'S', 'Bangladeshi', '123456789', 'Muslim', NULL, 'aFSWGEYERWY', NULL, 'Chilmari', 'Kurigram', NULL, 20190001, 'GEEWsdhgd', '01740473189', 'companyname@gmail.com', 'Ibne Soud Mia', 'dgerryre', '01917054053', 'Father', 'Arman Hossain', 'shrehd dtrh dr', '01917054053', 'Brother', NULL, 1, NULL, '2019-06-15 08:23:33', NULL, NULL, NULL, NULL, NULL, NULL, 20190001),
(20190004, 'Habib R', 20190001, 20190001, 'Father', 'Business', 'Mother', 'housewife', '2019-06-01', 'IMG-20170305-WA0036.jpg (1)_1560587128.jpg', NULL, 'Dhaka', NULL, 'S', 'Bangladeshi', '123456789', 'Muslim', NULL, 'aFSWGEYERWY', NULL, 'Chilmari', 'Kurigram', NULL, 20190001, 'GEEWsdhgd', '01740473189', 'companyname@gmail.com', 'Ibne Soud Mia', 'dgerryre', '01917054053', 'Father', 'Arman Hossain', 'shrehd dtrh dr', '01917054053', 'Brother', NULL, 1, NULL, '2019-06-15 08:25:29', 2, '2019-06-19 06:07:06', NULL, NULL, NULL, NULL, 20190001);

-- --------------------------------------------------------

--
-- Table structure for table `scn_admission_app_form_declartion`
--

CREATE TABLE `scn_admission_app_form_declartion` (
  `ADMISSION_APP_FORM_DECLARATION_ID` bigint(20) NOT NULL DEFAULT '0',
  `DECLARATION_TITLE` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DECLARATION` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PROGRAM_ID` bigint(20) DEFAULT NULL,
  `SESSION_ID` bigint(20) DEFAULT NULL,
  `REMARKS` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `ENTERED_BY` int(11) DEFAULT NULL,
  `ENTRY_TIMESTAMP` datetime DEFAULT NULL,
  `UPDATED_BY` int(11) DEFAULT NULL,
  `UPDATE_TIMESTAMP` datetime DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `scn_admission_app_form_declartion`
--

INSERT INTO `scn_admission_app_form_declartion` (`ADMISSION_APP_FORM_DECLARATION_ID`, `DECLARATION_TITLE`, `DECLARATION`, `PROGRAM_ID`, `SESSION_ID`, `REMARKS`, `ACTIVE_STATUS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`) VALUES
(20190001, 'Declaration Title', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', 20190001, 20190001, NULL, 1, 2, '2019-05-29 06:16:39', 2, '2019-06-19 06:26:40', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scn_admission_app_form_edu_past`
--

CREATE TABLE `scn_admission_app_form_edu_past` (
  `ADMISSION_APP_FORM_EDU_PAST_ID` bigint(20) NOT NULL,
  `ADMISSION_APPLICATION_FORM_ID` bigint(20) DEFAULT NULL,
  `EXAM_NAME` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GROUP_NAME` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `YEAR_PASSED` int(4) DEFAULT NULL,
  `ROLL_NO` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `REG_NO` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BOARD_NAME` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GPA_WITH_OPTIONAL_SUBJECT` decimal(4,2) DEFAULT NULL,
  `MARKS_BIOLOGY` decimal(6,2) DEFAULT NULL,
  `REMARKS` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `ENTERED_BY` int(11) DEFAULT NULL,
  `ENTRY_TIMESTAMP` datetime DEFAULT NULL,
  `UPDATED_BY` int(11) DEFAULT NULL,
  `UPDATE_TIMESTAMP` datetime DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `scn_admission_app_form_edu_past`
--

INSERT INTO `scn_admission_app_form_edu_past` (`ADMISSION_APP_FORM_EDU_PAST_ID`, `ADMISSION_APPLICATION_FORM_ID`, `EXAM_NAME`, `GROUP_NAME`, `YEAR_PASSED`, `ROLL_NO`, `REG_NO`, `BOARD_NAME`, `GPA_WITH_OPTIONAL_SUBJECT`, `MARKS_BIOLOGY`, `REMARKS`, `ACTIVE_STATUS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`) VALUES
(1, 20190004, 'SSC', 'Science', 2011, '123456', '987654', 'Dinajpur', '5.00', '87.60', NULL, 1, NULL, '2019-06-15 08:25:29', NULL, NULL, NULL, NULL, NULL),
(2, 20190004, 'HSC', 'Science', 2013, '456789', '654321', 'Dhaka', '4.00', '83.20', NULL, 1, NULL, '2019-06-15 08:25:29', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scn_contact_address`
--

CREATE TABLE `scn_contact_address` (
  `CONTACT_ADDRESS_ID` bigint(20) NOT NULL,
  `CONTACT_ADDRESS` varchar(500) DEFAULT NULL,
  `CONTACT_PHONE` varchar(500) DEFAULT NULL,
  `CONTACT_EMAIL` varchar(500) DEFAULT NULL,
  `REMARKS` varchar(500) DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `ENTERED_BY` bigint(20) DEFAULT NULL,
  `ENTRY_TIMESTAMP` date DEFAULT NULL,
  `UPDATED_BY` bigint(20) DEFAULT NULL,
  `UPDATE_TIMESTAMP` date DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) DEFAULT NULL,
  `FLEX_FIELD4` varchar(500) DEFAULT NULL,
  `FLEX_FIELD5` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scn_contact_address`
--

INSERT INTO `scn_contact_address` (`CONTACT_ADDRESS_ID`, `CONTACT_ADDRESS`, `CONTACT_PHONE`, `CONTACT_EMAIL`, `REMARKS`, `ACTIVE_STATUS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`, `FLEX_FIELD4`, `FLEX_FIELD5`) VALUES
(1, 'Road No - 5, House - 30, Location Name, Dhaka', '0171500444', 'companyname@gmail.com', NULL, NULL, NULL, NULL, 2, '2019-06-19', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scn_contact_email`
--

CREATE TABLE `scn_contact_email` (
  `CONTACT_EMAIL_ID` bigint(20) NOT NULL,
  `FROM_EMAIL_ID` varchar(500) DEFAULT NULL,
  `SUBJECT` varchar(200) DEFAULT NULL,
  `EMAIL_CONTENT` text,
  `REMARKS` varchar(500) DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `ENTERED_BY` bigint(20) DEFAULT NULL,
  `ENTRY_TIMESTAMP` date DEFAULT NULL,
  `UPDATED_BY` bigint(20) DEFAULT NULL,
  `UPDATE_TIMESTAMP` date DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) DEFAULT NULL,
  `FLEX_FIELD4` varchar(500) DEFAULT NULL,
  `FLEX_FIELD5` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `scn_contact_email`
--

INSERT INTO `scn_contact_email` (`CONTACT_EMAIL_ID`, `FROM_EMAIL_ID`, `SUBJECT`, `EMAIL_CONTENT`, `REMARKS`, `ACTIVE_STATUS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`, `FLEX_FIELD4`, `FLEX_FIELD5`) VALUES
(20190001, 'manager@example.com', 'Sample Contact', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', NULL, 1, NULL, '2019-06-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20190002, 'habibcse335@gmail.com', 'Contact Subject', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut</p>', NULL, 1, NULL, '2019-06-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20190003, 'test@mail.com', 'Need Help', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', NULL, 1, NULL, '2019-06-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scn_event`
--

CREATE TABLE `scn_event` (
  `EVENT_ID` bigint(20) NOT NULL DEFAULT '0',
  `EVENT_TITLE` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EVENT_DESC` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EVENT_DATE` date DEFAULT NULL,
  `IMAGE_PATH` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PUBLISH_START_DATE` date DEFAULT NULL,
  `PUBLISH_END_DATE` date DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `REMARKS` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ENTERED_BY` bigint(20) DEFAULT NULL,
  `ENTRY_TIMESTAMP` datetime DEFAULT NULL,
  `UPDATED_BY` bigint(20) DEFAULT NULL,
  `UPDATE_TIMESTAMP` datetime DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `EVENT_TIME` time DEFAULT NULL,
  `EVENT_LOCATION` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `scn_event`
--

INSERT INTO `scn_event` (`EVENT_ID`, `EVENT_TITLE`, `EVENT_DESC`, `EVENT_DATE`, `IMAGE_PATH`, `PUBLISH_START_DATE`, `PUBLISH_END_DATE`, `ACTIVE_STATUS`, `REMARKS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`, `EVENT_TIME`, `EVENT_LOCATION`) VALUES
(20190001, 'Event New Square College of Nursing', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', '2019-05-21', '1_1558429004.png', '2019-05-21', '2019-07-31', 1, NULL, 2, '2019-05-21 08:56:44', 2, '2019-06-01 07:38:54', NULL, NULL, NULL, NULL, 'Dhaka'),
(20190002, 'Custom Event College of Nursing', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', '2019-05-23', '1_1558429060.png', '2019-05-21', '2019-06-14', 1, NULL, 2, '2019-05-21 08:57:40', 2, '2019-07-03 09:10:34', NULL, NULL, NULL, NULL, 'Mirpur, Dhaka'),
(20190003, 'Test Event Square College of Nursing', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', '2019-05-25', '1_1558429088.png', '2019-05-21', '2019-07-23', 1, NULL, 2, '2019-05-21 08:58:08', 2, '2019-06-01 07:38:42', NULL, NULL, NULL, NULL, 'Shahbag, Dhaka'),
(20190004, 'SCN Event Square College of Nursing', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', '2019-05-31', '1_1558429175.png', '2019-05-21', '2019-07-31', 1, NULL, 2, '2019-05-21 08:58:56', 2, '2019-06-19 06:32:17', NULL, NULL, NULL, NULL, 'SCN');

-- --------------------------------------------------------

--
-- Table structure for table `scn_event_type`
--

CREATE TABLE `scn_event_type` (
  `EVENT_TYPE_ID` bigint(20) NOT NULL DEFAULT '0',
  `TYPE_NAME` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SHORT_CODE` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TYPE_DESC` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COLOR_CODE` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `REMARKS` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `ENTERED_BY` int(11) DEFAULT NULL,
  `ENTRY_TIMESTAMP` datetime DEFAULT NULL,
  `UPDATED_BY` int(11) DEFAULT NULL,
  `UPDATE_TIMESTAMP` datetime DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `scn_event_type`
--

INSERT INTO `scn_event_type` (`EVENT_TYPE_ID`, `TYPE_NAME`, `SHORT_CODE`, `TYPE_DESC`, `COLOR_CODE`, `REMARKS`, `ACTIVE_STATUS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`) VALUES
(20190001, 'Class off', 'W', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut</p>', '#8000ff', NULL, 1, 2, '2019-05-26 03:56:56', 2, '2019-05-27 06:58:43', NULL, NULL, NULL),
(20190002, 'Holiday', 'H', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', '#ff0000', NULL, 1, 2, '2019-05-26 04:17:00', 2, '2019-05-27 06:57:55', NULL, NULL, NULL),
(20190003, 'Exam', 'Ex', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut</p>', '#ff8040', NULL, 1, 2, '2019-05-27 06:56:32', NULL, NULL, NULL, NULL, NULL),
(20190004, 'Others', 'O', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut</p>', '#00ce00', NULL, 1, 2, '2019-05-27 06:57:26', 2, '2019-06-19 06:34:49', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scn_image_gallery`
--

CREATE TABLE `scn_image_gallery` (
  `IMAGE_ID` int(11) NOT NULL DEFAULT '0',
  `IMAGE_TITLE` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IMAGE_DESC` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IMAGE_FILE_PATH` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SL_NO` int(11) DEFAULT NULL,
  `HOME_PAGE_SHOW_FLAG` int(11) DEFAULT NULL,
  `REMARKS` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `ENTERED_BY` int(11) DEFAULT NULL,
  `ENTRY_TIMESTAMP` datetime DEFAULT NULL,
  `UPDATED_BY` int(11) DEFAULT NULL,
  `UPDATE_TIMESTAMP` datetime DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `scn_image_gallery`
--

INSERT INTO `scn_image_gallery` (`IMAGE_ID`, `IMAGE_TITLE`, `IMAGE_DESC`, `IMAGE_FILE_PATH`, `SL_NO`, `HOME_PAGE_SHOW_FLAG`, `REMARKS`, `ACTIVE_STATUS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`) VALUES
(20190001, 'Gallery', NULL, '1_1558429287.png', 1, 1, NULL, 1, 2, '2019-05-21 09:01:27', NULL, NULL, NULL, NULL, NULL),
(20190002, 'Image Title', NULL, '1_1558429301.png', 2, 1, NULL, 1, 2, '2019-05-21 09:01:41', NULL, NULL, NULL, NULL, NULL),
(20190003, 'No Image 4', NULL, '1_1558429316.png', 3, 1, NULL, 1, 2, '2019-05-21 09:01:56', NULL, NULL, NULL, NULL, NULL),
(20190004, 'Graphics', NULL, '1_1558429331.png', 4, 1, NULL, 1, 2, '2019-05-21 09:02:12', 2, '2019-06-19 06:38:10', NULL, NULL, NULL),
(20190005, 'new image', NULL, '20180001_download_3d_wallpaper_1546239102_1562144743.jpg', NULL, 1, NULL, 1, 2, '2019-07-03 09:05:44', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scn_message`
--

CREATE TABLE `scn_message` (
  `MESSAGE_ID` bigint(20) NOT NULL DEFAULT '0',
  `MESSAGE_CONTENT` text COLLATE utf8_unicode_ci,
  `USER_ID` bigint(20) DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `REMARKS` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ENTERED_BY` bigint(20) DEFAULT NULL,
  `ENTRY_TIMESTAMP` datetime DEFAULT NULL,
  `UPDATED_BY` bigint(20) DEFAULT NULL,
  `UPDATE_TIMESTAMP` datetime DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `scn_message`
--

INSERT INTO `scn_message` (`MESSAGE_ID`, `MESSAGE_CONTENT`, `USER_ID`, `ACTIVE_STATUS`, `REMARKS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`) VALUES
(20190001, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 5, 1, NULL, 2, '2019-05-21 09:24:43', NULL, NULL, NULL, NULL, NULL),
(20190002, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 4, 1, NULL, 2, '2019-05-22 06:21:26', NULL, NULL, NULL, NULL, NULL),
(20190003, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 6, 1, NULL, 2, '2019-05-22 06:21:34', NULL, NULL, NULL, NULL, NULL),
(20190004, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 5, 1, NULL, 2, '2019-05-22 06:21:43', 2, '2019-06-19 07:13:58', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scn_notice`
--

CREATE TABLE `scn_notice` (
  `NOTICE_ID` bigint(20) NOT NULL DEFAULT '0',
  `NOTICE_TITLE` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NOTICE_DESC` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PUBLISH_START_DATE` date DEFAULT NULL,
  `PUBLISH_END_DATE` date DEFAULT NULL,
  `NOTICE_FILE_PATH` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `REMARKS` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ENTERED_BY` bigint(20) DEFAULT NULL,
  `ENTRY_TIMESTAMP` datetime DEFAULT NULL,
  `UPDATED_BY` bigint(20) DEFAULT NULL,
  `UPDATE_TIMESTAMP` datetime DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `scn_notice`
--

INSERT INTO `scn_notice` (`NOTICE_ID`, `NOTICE_TITLE`, `NOTICE_DESC`, `PUBLISH_START_DATE`, `PUBLISH_END_DATE`, `NOTICE_FILE_PATH`, `ACTIVE_STATUS`, `REMARKS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`) VALUES
(20190001, 'Sample Notice Square College of Nursing', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', '2019-05-21', '2019-06-30', NULL, 1, NULL, 2, '2019-05-21 08:39:02', 2, '2019-06-01 07:36:08', NULL, NULL, NULL),
(20190002, 'Notice Title Square College of Nursing', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', '2019-05-21', '2019-06-21', NULL, 1, NULL, 2, '2019-05-21 08:39:52', 2, '2019-06-01 07:36:05', NULL, NULL, NULL),
(20190003, 'Why do we use it? Square College of Nursing', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', '2019-05-21', '2019-06-13', NULL, 1, NULL, 2, '2019-05-21 08:40:04', 2, '2019-06-01 07:35:43', NULL, NULL, NULL),
(20190004, 'Test Title For Notice Square College of Nursing', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', '2019-05-21', '2019-06-13', NULL, 1, NULL, 2, '2019-05-21 08:40:33', 2, '2019-06-01 07:35:38', NULL, NULL, NULL),
(20190005, 'Display the dates Square College of Nursing', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut</p>', '2019-05-27', '2019-07-31', NULL, 1, NULL, 2, '2019-05-27 08:31:08', 2, '2019-06-19 07:16:57', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scn_program`
--

CREATE TABLE `scn_program` (
  `PROGRAM_ID` bigint(20) NOT NULL DEFAULT '0',
  `PROGRAM_NAME` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PROGRAM_TYPE_ID` bigint(20) DEFAULT NULL,
  `PROGRAM_PERIOD` int(11) DEFAULT NULL,
  `PERIOD_UNIT` int(11) DEFAULT NULL,
  `PROGRAM_DESC` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `REMARKS` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `ENTERED_BY` int(11) DEFAULT NULL,
  `ENTRY_TIMESTAMP` datetime DEFAULT NULL,
  `UPDATED_BY` int(11) DEFAULT NULL,
  `UPDATE_TIMESTAMP` datetime DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `scn_program`
--

INSERT INTO `scn_program` (`PROGRAM_ID`, `PROGRAM_NAME`, `PROGRAM_TYPE_ID`, `PROGRAM_PERIOD`, `PERIOD_UNIT`, `PROGRAM_DESC`, `REMARKS`, `ACTIVE_STATUS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`) VALUES
(20190001, 'Nursing', 20190001, 36, 4, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', NULL, 1, 2, '2019-05-28 06:47:13', 2, '2019-06-19 07:18:56', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scn_program_type`
--

CREATE TABLE `scn_program_type` (
  `PROGRAM_TYPE_ID` bigint(20) NOT NULL DEFAULT '0',
  `TYPE_NAME` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TYPE_DESC` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `REMARKS` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `ENTERED_BY` int(11) DEFAULT NULL,
  `ENTRY_TIMESTAMP` datetime DEFAULT NULL,
  `UPDATED_BY` int(11) DEFAULT NULL,
  `UPDATE_TIMESTAMP` datetime DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `scn_program_type`
--

INSERT INTO `scn_program_type` (`PROGRAM_TYPE_ID`, `TYPE_NAME`, `TYPE_DESC`, `REMARKS`, `ACTIVE_STATUS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`) VALUES
(20190001, 'Graduation', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', NULL, 1, 2, '2019-05-28 06:06:04', 2, '2019-05-28 06:15:42', NULL, NULL, NULL),
(20190002, 'Under Graduation', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', NULL, 1, 2, '2019-05-28 06:07:01', 2, '2019-05-28 06:15:24', NULL, NULL, NULL),
(20190003, 'Post-Graduation', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', NULL, 1, 2, '2019-05-28 06:11:23', 2, '2019-06-19 07:20:45', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scn_session`
--

CREATE TABLE `scn_session` (
  `SESSION_ID` bigint(20) NOT NULL DEFAULT '0',
  `SESSION_NAME` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `START_DATE` date DEFAULT NULL,
  `END_DATE` date DEFAULT NULL,
  `REMARKS` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `ENTERED_BY` int(11) DEFAULT NULL,
  `ENTRY_TIMESTAMP` datetime DEFAULT NULL,
  `UPDATED_BY` int(11) DEFAULT NULL,
  `UPDATE_TIMESTAMP` datetime DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `scn_session`
--

INSERT INTO `scn_session` (`SESSION_ID`, `SESSION_NAME`, `START_DATE`, `END_DATE`, `REMARKS`, `ACTIVE_STATUS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`) VALUES
(20190001, 'Spring', '2019-05-29', '2019-06-29', NULL, 1, 2, '2019-05-29 04:54:29', 2, '2019-06-19 07:22:23', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scn_slide_image`
--

CREATE TABLE `scn_slide_image` (
  `SLIDE_IMAGE_ID` bigint(20) NOT NULL DEFAULT '0',
  `IMAGE_TITLE` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IMAGE_DESC` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IMAGE_PATH` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IMAGE_PAGE` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PAGE_SHORT_CODE` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PAGE_LOC` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `PAGE_LOC_SHORT_CODE` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `REMARKS` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ENTERED_BY` bigint(20) DEFAULT NULL,
  `ENTRY_TIMESTAMP` datetime DEFAULT NULL,
  `UPDATED_BY` bigint(20) DEFAULT NULL,
  `UPDATE_TIMESTAMP` datetime DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `scn_slide_image`
--

INSERT INTO `scn_slide_image` (`SLIDE_IMAGE_ID`, `IMAGE_TITLE`, `IMAGE_DESC`, `IMAGE_PATH`, `IMAGE_PAGE`, `PAGE_SHORT_CODE`, `PAGE_LOC`, `PAGE_LOC_SHORT_CODE`, `ACTIVE_STATUS`, `REMARKS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`) VALUES
(20190001, NULL, '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', 'slider1_1558427794.png', NULL, NULL, NULL, NULL, 0, NULL, 2, '2019-05-21 08:36:38', 2, '2019-07-03 05:16:04', NULL, NULL, NULL),
(20190002, 'Square College of Nursing', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.', 'slider1_1558427813.png', NULL, NULL, NULL, NULL, 1, NULL, 2, '2019-05-21 08:36:55', NULL, NULL, NULL, NULL, NULL),
(20190003, 'Square College of Nursing', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', 'slider1_1558427830.png', NULL, NULL, NULL, NULL, 1, NULL, 2, '2019-05-21 08:37:11', 2, '2019-05-22 09:05:45', NULL, NULL, NULL),
(20190004, 'Square College of Nursing', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>', 'slider1_1560243247.png', NULL, NULL, NULL, NULL, 1, NULL, 2, '2019-06-11 08:54:18', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `scn_testimonial`
--

CREATE TABLE `scn_testimonial` (
  `TESTIMONIAL_ID` bigint(20) NOT NULL DEFAULT '0',
  `TESTIMONIAL_BY_NAME` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TESTIMONIAL_BY_DESC` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TESTIMONIAL_CONTENT` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `IMAGE_PATH` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `SL_NO` int(11) DEFAULT NULL,
  `REMARKS` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `ENTERED_BY` int(11) DEFAULT NULL,
  `ENTRY_TIMESTAMP` datetime DEFAULT NULL,
  `UPDATED_BY` int(11) DEFAULT NULL,
  `UPDATE_TIMESTAMP` datetime DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `scn_testimonial`
--

INSERT INTO `scn_testimonial` (`TESTIMONIAL_ID`, `TESTIMONIAL_BY_NAME`, `TESTIMONIAL_BY_DESC`, `TESTIMONIAL_CONTENT`, `IMAGE_PATH`, `SL_NO`, `REMARKS`, `ACTIVE_STATUS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`) VALUES
(20190001, 'Habib R', '44th Batch', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable.</p>', '114_1558591598.png', 1, NULL, 1, 2, '2019-05-23 06:06:38', 2, '2019-05-23 06:19:13', NULL, NULL, NULL),
(20190002, 'Sohel', '56th Batch', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable.</p>', '114_1558601907.png', 2, NULL, 1, 2, '2019-05-23 08:58:28', NULL, NULL, NULL, NULL, NULL),
(20190003, 'Sojib', '2nd Batch', '<p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable.</p>', '114_1558601927.png', 3, NULL, 1, 2, '2019-05-23 08:58:47', 2, '2019-06-19 07:29:10', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `USER_TITLE` varchar(20) DEFAULT NULL,
  `DESIGNATION_ACADEMIC` int(11) DEFAULT NULL,
  `DESIGNATION_ADMIN` int(11) DEFAULT NULL,
  `QUALIFICATION` varchar(500) DEFAULT NULL,
  `PROFILE` text,
  `PROFILE_IMAGE_PATH` varchar(500) DEFAULT NULL,
  `LOGIN_USER` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `GENDER` int(11) DEFAULT NULL,
  `BLOOD_GROUP` varchar(500) DEFAULT NULL,
  `email` varchar(500) DEFAULT NULL,
  `FATHER_NAME` varchar(200) DEFAULT NULL,
  `MOTHER_NAME` varchar(200) DEFAULT NULL,
  `PROFESSION` varchar(100) DEFAULT NULL,
  `PRESENT_ADDRESS` varchar(500) DEFAULT NULL,
  `PERMANENT_ADDRESS` varchar(500) DEFAULT NULL,
  `NATIONAL_ID` varchar(50) DEFAULT NULL,
  `USER_TYPE_ID` int(11) DEFAULT NULL,
  `SPOUSE_NAME` varchar(500) DEFAULT NULL,
  `USER_IMAGE_PATH` text,
  `ACTIVE_STATUS` int(11) DEFAULT NULL,
  `REMARKS` varchar(4000) DEFAULT NULL,
  `ENTERED_BY` bigint(20) DEFAULT NULL,
  `ENTRY_TIMESTAMP` date DEFAULT NULL,
  `UPDATED_BY` bigint(20) DEFAULT NULL,
  `UPDATE_TIMESTAMP` date DEFAULT NULL,
  `FLEX_FIELD1` varchar(500) DEFAULT NULL,
  `FLEX_FIELD2` varchar(500) DEFAULT NULL,
  `FLEX_FIELD3` varchar(500) DEFAULT NULL,
  `FLEX_FIELD4` varchar(500) DEFAULT NULL,
  `FLEX_FIELD5` varchar(500) DEFAULT NULL,
  `CONTACT_PHONE` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `USER_TITLE`, `DESIGNATION_ACADEMIC`, `DESIGNATION_ADMIN`, `QUALIFICATION`, `PROFILE`, `PROFILE_IMAGE_PATH`, `LOGIN_USER`, `password`, `DOB`, `GENDER`, `BLOOD_GROUP`, `email`, `FATHER_NAME`, `MOTHER_NAME`, `PROFESSION`, `PRESENT_ADDRESS`, `PERMANENT_ADDRESS`, `NATIONAL_ID`, `USER_TYPE_ID`, `SPOUSE_NAME`, `USER_IMAGE_PATH`, `ACTIVE_STATUS`, `REMARKS`, `ENTERED_BY`, `ENTRY_TIMESTAMP`, `UPDATED_BY`, `UPDATE_TIMESTAMP`, `FLEX_FIELD1`, `FLEX_FIELD2`, `FLEX_FIELD3`, `FLEX_FIELD4`, `FLEX_FIELD5`, `CONTACT_PHONE`) VALUES
(1, 'Photos Editing Expert', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$LfTeEdUc5o9V0SS7TMG4VeJWtA5g9Jx609OC0TqhTvfcAe3FUa2Pe', NULL, NULL, NULL, '123@mail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'HR Rahman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$28YgvcDKmwEuqfCKoMNpheINdK6HRP19.z7IgDgjcxgn2pYBIBrQ2', NULL, NULL, NULL, 'test@mail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'HR Rahman', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$XoYpMheVQY2TeTvuh0gFw.hnIg2G.VmQ/JwrTrUpH2mG6atL.Trre', NULL, NULL, NULL, 'admin@mail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Ridoy Khan', NULL, NULL, 20190002, 'BSC Enginner', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'chairman@2x_1560245520.png', NULL, NULL, '2018-09-01', 1, NULL, 'sample@mail.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, 1, '2019-03-03', 2, '2019-06-11', NULL, NULL, NULL, NULL, NULL, '12457893321'),
(5, 'Habib', NULL, NULL, 20190001, 'BSC Enginner', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n\r\n<h2>&nbsp;</h2>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &quot;de Finibus Bonorum et Malorum&quot; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>', 'chairman@2x_1560245494.png', NULL, NULL, '2018-11-01', 1, NULL, '789@mail.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, 1, '2019-03-04', 2, '2019-06-11', NULL, NULL, NULL, NULL, NULL, '01740473189'),
(6, 'Rahim Uddin', NULL, NULL, 20190003, 'HSC', NULL, 'chairman_1558504525.png', NULL, NULL, '2019-03-01', 1, NULL, 'rahimuddin@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, 2, '2019-03-16', 2, '2019-06-11', NULL, NULL, NULL, NULL, NULL, '+88-8615147 / 4010, 4011'),
(7, 'Sohel', NULL, NULL, 20190004, 'MBA', NULL, 'IMG-20170305-WA0036.jpg (1)_1560245194.jpg', NULL, NULL, '2018-09-03', 1, NULL, 'mymail@mail.com', NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, 1, NULL, 2, '2019-05-22', 2, '2019-06-19', NULL, NULL, NULL, NULL, NULL, '12457893321');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bg_designation`
--
ALTER TABLE `bg_designation`
  ADD PRIMARY KEY (`DESIGNATION_ID`);

--
-- Indexes for table `bg_user`
--
ALTER TABLE `bg_user`
  ADD PRIMARY KEY (`USER_ID`),
  ADD KEY `FK_BU_DADM_BD` (`DESIGNATION_ACADEMIC`),
  ADD KEY `FK_BU_BUT` (`USER_TYPE_ID`);

--
-- Indexes for table `bg_user_type`
--
ALTER TABLE `bg_user_type`
  ADD PRIMARY KEY (`USER_TYPE_ID`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `scn_about_us`
--
ALTER TABLE `scn_about_us`
  ADD PRIMARY KEY (`ABOUT_US_ID`);

--
-- Indexes for table `scn_academic_calendar`
--
ALTER TABLE `scn_academic_calendar`
  ADD PRIMARY KEY (`CALENDAR_ID`);

--
-- Indexes for table `scn_admission_application_form`
--
ALTER TABLE `scn_admission_application_form`
  ADD PRIMARY KEY (`ADMISSION_APPLICATION_FORM_ID`),
  ADD KEY `FK_SAAF_SS` (`SESSION_ID`),
  ADD KEY `FK_SAAF_SP` (`PROGRAM_ID`);

--
-- Indexes for table `scn_admission_app_form_declartion`
--
ALTER TABLE `scn_admission_app_form_declartion`
  ADD PRIMARY KEY (`ADMISSION_APP_FORM_DECLARATION_ID`),
  ADD KEY `FK_SAAFD_SS` (`SESSION_ID`),
  ADD KEY `FK_SAAFD_SP` (`PROGRAM_ID`);

--
-- Indexes for table `scn_admission_app_form_edu_past`
--
ALTER TABLE `scn_admission_app_form_edu_past`
  ADD PRIMARY KEY (`ADMISSION_APP_FORM_EDU_PAST_ID`),
  ADD KEY `FK_SAAFEP_SAAFI` (`ADMISSION_APPLICATION_FORM_ID`);

--
-- Indexes for table `scn_contact_address`
--
ALTER TABLE `scn_contact_address`
  ADD PRIMARY KEY (`CONTACT_ADDRESS_ID`);

--
-- Indexes for table `scn_contact_email`
--
ALTER TABLE `scn_contact_email`
  ADD PRIMARY KEY (`CONTACT_EMAIL_ID`);

--
-- Indexes for table `scn_event`
--
ALTER TABLE `scn_event`
  ADD PRIMARY KEY (`EVENT_ID`);

--
-- Indexes for table `scn_event_type`
--
ALTER TABLE `scn_event_type`
  ADD PRIMARY KEY (`EVENT_TYPE_ID`);

--
-- Indexes for table `scn_image_gallery`
--
ALTER TABLE `scn_image_gallery`
  ADD PRIMARY KEY (`IMAGE_ID`);

--
-- Indexes for table `scn_message`
--
ALTER TABLE `scn_message`
  ADD PRIMARY KEY (`MESSAGE_ID`),
  ADD KEY `FK_SM_BU` (`USER_ID`);

--
-- Indexes for table `scn_notice`
--
ALTER TABLE `scn_notice`
  ADD PRIMARY KEY (`NOTICE_ID`);

--
-- Indexes for table `scn_program`
--
ALTER TABLE `scn_program`
  ADD PRIMARY KEY (`PROGRAM_ID`),
  ADD KEY `FK_SP_SPT` (`PROGRAM_TYPE_ID`);

--
-- Indexes for table `scn_program_type`
--
ALTER TABLE `scn_program_type`
  ADD PRIMARY KEY (`PROGRAM_TYPE_ID`);

--
-- Indexes for table `scn_session`
--
ALTER TABLE `scn_session`
  ADD PRIMARY KEY (`SESSION_ID`);

--
-- Indexes for table `scn_slide_image`
--
ALTER TABLE `scn_slide_image`
  ADD PRIMARY KEY (`SLIDE_IMAGE_ID`);

--
-- Indexes for table `scn_testimonial`
--
ALTER TABLE `scn_testimonial`
  ADD PRIMARY KEY (`TESTIMONIAL_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_BU_DADM_BD` (`DESIGNATION_ACADEMIC`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `scn_admission_app_form_edu_past`
--
ALTER TABLE `scn_admission_app_form_edu_past`
  MODIFY `ADMISSION_APP_FORM_EDU_PAST_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
