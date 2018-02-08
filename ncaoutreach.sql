-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 08, 2018 at 05:53 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ncaoutreach`
--
CREATE DATABASE IF NOT EXISTS `ncaoutreach` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE ncaoutreach;

-- --------------------------------------------------------

--
-- Table structure for table `audiences`
--
-- Creation: Jan 24, 2018 at 04:23 PM
--

DROP TABLE IF EXISTS `audiences`;
CREATE TABLE `audiences` (
  `aud_id` int(11) NOT NULL,
  `aud_name` varchar(250) NOT NULL
) ;

--
-- RELATIONSHIPS FOR TABLE `audiences`:
--

--
-- Dumping data for table `audiences`
--

INSERT INTO `audiences` (`aud_id`, `aud_name`) VALUES
(1, 'Corporate'),
(2, 'Education'),
(3, 'Healthcare'),
(4, 'Hospitality'),
(5, 'Market'),
(6, 'Mixed'),
(7, 'Transportation');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--
-- Creation: Jan 24, 2018 at 04:23 PM
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `state_id` int(11) NOT NULL
) ;

--
-- RELATIONSHIPS FOR TABLE `cities`:
--

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `name`, `state_id`) VALUES
(20367, 'Agogo', 1),
(20368, 'Bekwai', 1),
(20369, 'Konongo', 1),
(20370, 'Kumasi', 1),
(20371, 'Mampong', 1),
(20372, 'Mankranso', 1),
(20373, 'Obuasi', 1),
(20374, 'Ofinso', 1),
(20375, 'Tafo', 1),
(20376, 'Bechem', 2),
(20377, 'Berekum', 2),
(20378, 'Duayaw Nkwanta', 2),
(20379, 'Kintampo', 2),
(20380, 'Sunyani', 2),
(20381, 'Techiman', 2),
(20382, 'Wenchi', 2),
(20383, 'Apam', 3),
(20384, 'Cape Coast', 3),
(20385, 'Dunkwa', 3),
(20386, 'Elmina', 3),
(20387, 'Foso', 3),
(20388, 'Komenda', 3),
(20389, 'Mauri', 3),
(20390, 'Mumford', 3),
(20391, 'Nyakrom', 3),
(20392, 'Okitsiu', 3),
(20393, 'Saltpond', 3),
(20394, 'Swedru', 3),
(20395, 'Winneba', 3),
(20396, 'Aburi', 4),
(20397, 'Ada', 4),
(20398, 'Akim Swedru', 4),
(20399, 'Akropong', 4),
(20400, 'Asamankese', 4),
(20401, 'Begoro', 4),
(20402, 'Kade', 4),
(20403, 'Kibi', 4),
(20404, 'Koforidua', 4),
(20405, 'Mpraeso', 4),
(20406, 'Nkawkaw', 4),
(20407, 'Nsawam', 4),
(20408, 'Oda', 4),
(20409, 'Somanya', 4),
(20410, 'Suhum', 4),
(20411, 'Kpandae', 6),
(20412, 'Salaga', 6),
(20413, 'Savelugu', 6),
(20414, 'Tamale', 6),
(20415, 'Yendi', 6),
(20416, 'Aflao', 9),
(20417, 'Anloga', 9),
(20418, 'Ho', 9),
(20419, 'Hohoe', 9),
(20420, 'Keta', 9),
(20421, 'Kete-Krachi', 9),
(20422, 'Kpandu', 9),
(20423, 'Aboso', 10),
(20424, 'Anomabu', 10),
(20425, 'Axim', 10),
(20426, 'Bibiani', 10),
(20427, 'Prestea', 10),
(20428, 'Sekondi', 10),
(20429, 'Shama', 10),
(20430, 'Takoradi', 10),
(20431, 'Tarkwa', 10);

-- --------------------------------------------------------

--
-- Table structure for table `eventlogs`
--
-- Creation: Feb 05, 2018 at 01:31 PM
--

DROP TABLE IF EXISTS `eventlogs`;
CREATE TABLE `eventlogs` (
  `eventlog_id` int(11) NOT NULL,
  `event_title` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(30) NOT NULL,
  `date` timestamp NOT NULL,
  `region` int(11) NOT NULL
) ;

--
-- RELATIONSHIPS FOR TABLE `eventlogs`:
--

--
-- Dumping data for table `eventlogs`
--

INSERT INTO `eventlogs` (`eventlog_id`, `event_title`, `user_id`, `action`, `date`, `region`) VALUES
(21, 'test1', 5, 'added a Future event', '2018-02-08 09:21:24', 2),
(22, 'testtt', 5, 'added a Future event', '2018-02-08 12:58:23', 2),
(23, 'testtt', 5, 'edited a Future event', '2018-02-08 13:01:59', 2);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--
-- Creation: Jan 30, 2018 at 01:35 PM
--

DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `eventtitle` varchar(1000) NOT NULL,
  `eventtopic` varchar(30) NOT NULL,
  `date_to_be_organized` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `region` varchar(300) NOT NULL,
  `town` varchar(300) NOT NULL,
  `logistics` varchar(2000) NOT NULL,
  `mode_of_outreach` varchar(30) NOT NULL,
  `audience_category` varchar(300) NOT NULL,
  `expected_audience_attendance` varchar(300) NOT NULL,
  `is_verified` int(10) NOT NULL DEFAULT '0',
  `is_approved` int(10) NOT NULL DEFAULT '0',
  `verification_comments` varchar(2000) NOT NULL,
  `creator` int(10) NOT NULL,
  `verified_timestamp` varchar(30) NOT NULL,
  `approved_timestamp` varchar(30) NOT NULL
) ;

--
-- RELATIONSHIPS FOR TABLE `events`:
--   `creator`
--       `users` -> `userid`
--

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `eventtitle`, `eventtopic`, `date_to_be_organized`, `region`, `town`, `logistics`, `mode_of_outreach`, `audience_category`, `expected_audience_attendance`, `is_verified`, `is_approved`, `verification_comments`, `creator`, `verified_timestamp`, `approved_timestamp`) VALUES
(27, 'test1', 'testttt', '2018-02-16 00:00:00', '2', 'dfsdf', 'Sound System(s),Mug(s),', 'Road Show,Durbar,', 'Communities', '34', 1, 1, 'verificationTouched', 5, '2018-02-08 10:21:46', '2018-02-08 16:25:09'),
(28, 'testtt', 'Topic ', '2018-02-22 00:00:00', '2', 'rt', 'Pen(s),Mug(s),', 'Durbar,', 'Communities', '67', 0, 0, 'verificationTouched', 5, '2018-02-08 16:38:15', '2018-02-08 14:04:31');

-- --------------------------------------------------------

--
-- Table structure for table `pending`
--
-- Creation: Jan 24, 2018 at 04:23 PM
--

DROP TABLE IF EXISTS `pending`;
CREATE TABLE `pending` (
  `pending_id` int(11) NOT NULL,
  `eventtitle` varchar(100) NOT NULL,
  `date_to_be_organized` timestamp NULL DEFAULT NULL,
  `region` int(10) NOT NULL,
  `town` varchar(100) NOT NULL,
  `audience_category` varchar(100) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `reporter` int(10) NOT NULL
) ;

--
-- RELATIONSHIPS FOR TABLE `pending`:
--

-- --------------------------------------------------------

--
-- Table structure for table `region`
--
-- Creation: Jan 24, 2018 at 04:23 PM
--

DROP TABLE IF EXISTS `region`;
CREATE TABLE `region` (
  `region_id` int(10) NOT NULL,
  `regionname` varchar(40) NOT NULL
) ;

--
-- RELATIONSHIPS FOR TABLE `region`:
--

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`region_id`, `regionname`) VALUES
(1, 'Ashanti'),
(2, 'Brong Ahafo'),
(3, 'Central'),
(4, 'Eastern'),
(5, 'Greater Accra'),
(6, 'Northern'),
(7, 'Upper East'),
(8, 'Upper West'),
(9, 'Volta'),
(10, 'Western');

-- --------------------------------------------------------

--
-- Table structure for table `reportmembers`
--
-- Creation: Feb 08, 2018 at 09:34 AM
--

DROP TABLE IF EXISTS `reportmembers`;
CREATE TABLE `reportmembers` (
  `report_members_id` int(10) NOT NULL,
  `event_id` int(10) NOT NULL,
  `role` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL
) ;

--
-- RELATIONSHIPS FOR TABLE `reportmembers`:
--   `event_id`
--       `reports` -> `report_id`
--

--
-- Dumping data for table `reportmembers`
--

INSERT INTO `reportmembers` (`report_members_id`, `event_id`, `role`, `name`) VALUES
(23, 27, '', 'df'),
(24, 28, '', 'Brian'),
(25, 28, '', 'Osman');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--
-- Creation: Feb 02, 2018 at 10:00 AM
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `event_id` int(10) NOT NULL,
  `team_challenges` varchar(1000) NOT NULL,
  `complaints_raised` varchar(1000) NOT NULL,
  `is_approved` int(10) NOT NULL,
  `verification_comments` varchar(2000) NOT NULL,
  `event_summary` varchar(2000) NOT NULL,
  `picture_paths` varchar(2000) NOT NULL,
  `folder_paths` varchar(250) NOT NULL,
  `team_members` varchar(300) NOT NULL,
  `date_reported` timestamp NOT NULL,
  `verified_timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ;

--
-- RELATIONSHIPS FOR TABLE `reports`:
--   `event_id`
--       `events` -> `event_id`
--

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `event_id`, `team_challenges`, `complaints_raised`, `is_approved`, `verification_comments`, `event_summary`, `picture_paths`, `folder_paths`, `team_members`, `date_reported`, `verified_timestamp`) VALUES
(125, 27, 'f', 'f', 1, '', 's', '[\"1920x1080-px-album-covers-Kaptan-H-Davran-Trap-Nation-trapandemi-1227046-wallhere.com.jpg\"]', '5_27', 'df', '2018-02-08 11:56:09', '2018-02-08 13:01:38'),
(126, 28, 'noneee', 'nonee', 1, '', 'nonee', '[\"1.jpg\",\"3.jpg\"]', '5_28', 'Brian,Osman', '2018-02-08 13:05:34', '2018-02-08 14:08:31');

-- --------------------------------------------------------

--
-- Table structure for table `userlogs`
--
-- Creation: Jan 24, 2018 at 04:23 PM
--

DROP TABLE IF EXISTS `userlogs`;
CREATE TABLE `userlogs` (
  `userlog_id` int(11) NOT NULL,
  `acted_id` int(11) NOT NULL,
  `acted_on_id` int(11) NOT NULL,
  `action` varchar(30) NOT NULL,
  `date` timestamp NOT NULL
) ;

--
-- RELATIONSHIPS FOR TABLE `userlogs`:
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Jan 24, 2018 at 04:23 PM
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `userid` int(100) NOT NULL,
  `firstname` varchar(300) NOT NULL,
  `lastname` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `region` int(10) NOT NULL,
  `level` varchar(300) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ;

--
-- RELATIONSHIPS FOR TABLE `users`:
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `firstname`, `lastname`, `email`, `password`, `region`, `level`, `status`) VALUES
(1, 'Admin5', 'Account5', 'admin5@nca.org.gh', '26a91342190d515231d7238b0c5438e1', 2, '5', 'active'),
(2, 'Admin4', 'Account4', 'admin4@nca.org.gh', 'fc1ebc848e31e0a68e868432225e3c82', 1, '4', 'active'),
(3, 'Admin3', 'Account3', 'admin3@nca.org.gh', '32cacb2f994f6b42183a1300d9a3e8d6', 3, '3', 'active'),
(4, 'Admin2', 'Account2', 'admin2@nca.org.gh', 'c84258e9c39059a89ab77d846ddab909', 2, '2', 'active'),
(5, 'Admin1', 'Account1', 'admin1@nca.org.gh', 'e00cf25ad42683b3df678c61f42c6bda', 7, '1', 'active'),
(16, 'Brian ', 'Martey', 'bm@nca.org.gh', 'e00cf25ad42683b3df678c61f42c6bda', 2, '1', 'active'),
(17, 'Brian1', 'MArtey', 'bnmm@nca.org.gh', 'e00cf25ad42683b3df678c61f42c6bda', 2, '1', 'active'),
(18, 'BB', 'Martey', 'bnmm1@nca.org.gh', 'e00cf25ad42683b3df678c61f42c6bda', 2, '2', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audiences`
--
ALTER TABLE `audiences`
  ADD PRIMARY KEY (`aud_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `eventlogs`
--
ALTER TABLE `eventlogs`
  ADD PRIMARY KEY (`eventlog_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `pending`
--
ALTER TABLE `pending`
  ADD PRIMARY KEY (`pending_id`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`region_id`);

--
-- Indexes for table `reportmembers`
--
ALTER TABLE `reportmembers`
  ADD PRIMARY KEY (`report_members_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`report_id`);

--
-- Indexes for table `userlogs`
--
ALTER TABLE `userlogs`
  ADD PRIMARY KEY (`userlog_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audiences`
--
ALTER TABLE `audiences`
  MODIFY `aud_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `eventlogs`
--
ALTER TABLE `eventlogs`
  MODIFY `eventlog_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pending`
--
ALTER TABLE `pending`
  MODIFY `pending_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `region_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reportmembers`
--
ALTER TABLE `reportmembers`
  MODIFY `report_members_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userlogs`
--
ALTER TABLE `userlogs`
  MODIFY `userlog_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(100) NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
