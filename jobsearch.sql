-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 28, 2019 at 04:29 AM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobsearch`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(1, 'Jurong East'),
(2, 'Bedok'),
(3, 'Paya Lebar'),
(4, 'Ang Mo Kio'),
(5, 'Serangoon'),
(6, 'Punggol'),
(7, 'Woodlands'),
(8, 'Clementi'),
(9, 'Pasir Ris'),
(10, 'Bishan'),
(11, 'Choa Chu Kang'),
(12, 'Bukit Batok'),
(13, 'Hougang');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
CREATE TABLE IF NOT EXISTS `job` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `companyName` varchar(100) NOT NULL,
  `link` text NOT NULL,
  `city_id` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `city_id` (`city_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id`, `title`, `companyName`, `link`, `city_id`) VALUES
(1, 'Part Time Office Administrator (2 days a week)', 'Robert Half Singapore', 'https://www.roberthalf.com.sg/job/singapore/part-time-office-administrator-2-days-week/67020-0011219081-sgen?rh_job-feed=true&utm_source=Indeed&utm_medium=cpc&utm_campaign=Indeed', 1),
(2, 'General Admin Staff (Reception)', 'GAIN EMPLOYMENT SERVICES PTE. LTD', 'https://www.mycareersfuture.sg/job/admin/general-admin-staff-gain-employment-services-91450d1a13e518d55358ddfc764a7d72', 2),
(3, 'Financial Planning Analyst', 'Australian International School Pte Ltd', 'https://www.jobstreet.com.sg/en/job-search/job-vacancy.php?ojs=6', 5),
(4, 'Administrative Assistant', 'QXY RESOURCES PTE. LTD.', 'https://www.mycareersfuture.sg/job/admin/administrative-assistant-qxy-resources-028cebb74f92dad2ac29c1965627cc26', 1),
(5, 'Customer Service Officer', 'HI-P INTERNATIONAL LIMITED ', 'https://www.mycareersfuture.sg/job/customer-service/customer-service-officer-hi-p-international-a4224d54cd2f652064cf403c1c375ad6', 1),
(6, 'Secretary', 'MENCAST OFFSHORE & MARINE PTE. LTD.', 'https://www.mycareersfuture.sg/job/admin/secretary-mencast-offshore-marine-31f3b7886a9fed582b470bd29119710d', 1),
(7, 'Customer Service Executive', 'QXPRESS PTE. LTD.', 'https://www.mycareersfuture.sg/job/customer-service/customer-service-executive-qxpress-8135d746b5b758b400174cdc14c8135c', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
