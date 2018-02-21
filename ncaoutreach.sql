-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 21, 2018 at 03:09 PM
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
(1, 'Artisans'),
(2, 'Communities'),
(3, 'Corporate'),
(4, 'Religious Bodies'),
(5, 'Schools'),
(6, 'Villages'),
(7, 'Others');

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
(23, 'testtt', 5, 'edited a Future event', '2018-02-08 13:01:59', 2),
(24, 'OH EBONY', 5, 'added a Future event', '2018-02-09 11:54:27', 2),
(25, 'sd', 5, 'added a Future event', '2018-02-09 11:55:48', 2),
(26, 'sd', 5, 'added a Future event', '2018-02-09 12:14:25', 3),
(27, 'ds', 5, 'added a Future event', '2018-02-09 12:19:39', 2),
(28, 'test1', 5, 'edited a Future event', '2018-02-12 09:27:09', 2),
(48, 'test1', 5, 'has verified an event: ', '2018-02-12 16:36:08', 2),
(49, 'test1', 5, 'has approved an event: ', '2018-02-12 16:36:18', 2),
(52, 'sd', 5, 'has approved a report: ', '2018-02-12 16:41:15', 2),
(53, 'testtt', 5, 'Added a new report for ', '2018-02-13 09:28:31', 2),
(54, 'test1', 5, 'edited a Future event', '2018-02-13 09:29:14', 4),
(55, 'sdsd', 5, 'added a new report for: ', '2018-02-13 10:44:23', 3),
(56, 'sd', 5, 'added a new report for: ', '2018-02-13 12:06:51', 2),
(57, 'sd', 5, 'has approved a report: ', '2018-02-13 12:07:35', 2),
(58, 'Event at mendskrom', 5, 'added a future event', '2018-02-14 09:26:26', 2),
(59, 'Event at mendskrom', 5, 'has verified an event: ', '2018-02-14 09:46:04', 2),
(60, 'Event at mendskrom', 5, 'has approved an event: ', '2018-02-14 09:46:57', 2),
(61, 'Event at mendskrom', 5, 'edited a future event', '2018-02-14 09:47:57', 2),
(62, 'Event at mendskrom', 5, 'has verified an event: ', '2018-02-14 09:48:23', 2),
(63, 'Event at mendskrom', 5, 'has approved an event: ', '2018-02-14 09:52:42', 2),
(64, 'Event at mendskrom', 5, 'added a new report for: ', '2018-02-14 09:53:20', 2),
(65, 'Event at mendskrom', 5, 'has approved a report: ', '2018-02-14 09:55:51', 2),
(66, 'dd', 5, 'added a future event', '2018-02-14 15:11:01', 2),
(67, 'sdddddd', 5, 'added a future event', '2018-02-14 15:17:00', 3),
(68, 'sddsdaasasas', 5, 'added a future event', '2018-02-14 15:19:02', 2),
(69, 'heyy', 5, 'added a future event', '2018-02-14 15:19:39', 4),
(70, 'sdsadqw', 5, 'added a future event', '2018-02-14 15:21:43', 5),
(71, '32', 5, 'added a future event', '2018-02-14 15:22:46', 2),
(72, '1ow', 5, 'added a future event', '2018-02-14 15:23:41', 7),
(73, 'wdsd', 5, 'added a future event', '2018-02-14 15:26:09', 2),
(74, 'wdsd', 5, 'has verified an event: ', '2018-02-14 15:35:06', 2),
(75, 'wdsd', 5, 'has approved an event: ', '2018-02-14 15:37:14', 2),
(76, '1ow', 5, 'edited a future event', '2018-02-14 15:37:39', 2),
(77, '1ow', 5, 'has verified an event: ', '2018-02-14 15:40:40', 2),
(78, '1ow', 5, 'has approved an event: ', '2018-02-14 15:40:53', 2),
(79, '1ow', 5, 'added a new report for: ', '2018-02-14 15:42:50', 2),
(80, 'sde33', 5, 'added a future event', '2018-02-16 10:03:03', 3),
(81, 'sde33', 5, 'edited a future event', '2018-02-16 10:03:31', 2),
(82, 'zxx', 5, 'added a future event', '2018-02-16 10:07:54', 2),
(83, 'zxx', 5, 'has verified an event: ', '2018-02-16 10:08:14', 2),
(84, 'zxx', 5, 'has approved an event: ', '2018-02-16 10:09:56', 2),
(85, 'sde33', 5, 'has verified an event: ', '2018-02-16 15:21:08', 2),
(86, 'sde33', 5, 'has approved an event: ', '2018-02-16 17:22:39', 2),
(87, 'testtt', 5, 'added a new report for: ', '2018-02-19 12:52:58', 2),
(88, 'testtt', 5, 'added a new report for: ', '2018-02-19 12:54:23', 2),
(89, 'testtt', 5, 'added a new report for: ', '2018-02-19 13:01:20', 2),
(90, 'testtt', 5, 'added a new report for: ', '2018-02-19 13:08:50', 2),
(91, 'sde33', 5, 'added a new report for: ', '2018-02-19 13:09:37', 2),
(92, 'sde33', 5, 'added a new report for: ', '2018-02-19 13:14:03', 2),
(93, 'sde33', 5, 'added a new report for: ', '2018-02-19 13:15:24', 2),
(94, 'sde33', 5, 'added a new report for: ', '2018-02-19 13:15:54', 2),
(95, 'wdsd', 5, 'added a new report for: ', '2018-02-19 13:16:55', 2),
(96, 'sde33', 5, 'added a new report for: ', '2018-02-19 13:48:07', 2),
(97, 'sde33', 5, 'added a new report for: ', '2018-02-19 14:01:26', 2),
(98, 'sde33', 5, 'added a new report for: ', '2018-02-19 14:08:16', 2),
(99, 'sde33', 5, 'added a new report for: ', '2018-02-19 14:10:18', 2),
(100, 'sde33', 5, 'added a new report for: ', '2018-02-19 14:10:57', 2),
(101, 'wdsd', 5, 'added a new report for: ', '2018-02-19 14:13:40', 2),
(102, 'wdsd', 5, 'added a new report for: ', '2018-02-19 14:14:34', 2),
(103, 'wdsd', 5, 'added a new report for: ', '2018-02-19 14:15:32', 2),
(104, 'wdsd', 5, 'added a new report for: ', '2018-02-19 15:54:49', 2),
(105, 'wdsd', 5, 'added a new report for: ', '2018-02-19 15:58:55', 2),
(106, 'wdsd', 5, 'has approved a report: ', '2018-02-19 16:32:47', 2),
(107, 'test43', 5, 'added a future event', '2018-02-20 06:04:16', 2),
(108, 'test43', 5, 'has verified an event: ', '2018-02-20 07:01:54', 2),
(109, 'test43', 5, 'has approved an event: ', '2018-02-20 07:05:05', 2),
(110, 'asd', 5, 'added a future event', '2018-02-20 08:07:58', 4),
(111, '1ow', 5, 'added a new report for: ', '2018-02-20 08:11:06', 2),
(112, 'asd', 5, 'has approved an event: ', '2018-02-20 10:02:57', 4),
(113, 'dsds', 5, 'added a future event', '2018-02-20 11:18:48', 2),
(114, 'dsds', 5, 'has verified an event: ', '2018-02-20 11:19:07', 2),
(115, 'dsds', 5, 'has approved an event: ', '2018-02-20 11:19:25', 2),
(116, 'dsds', 5, 'added a new report for: ', '2018-02-20 11:19:50', 2),
(117, 'TOTaf', 5, 'added a future event', '2018-02-20 12:06:10', 2),
(118, 'TOTaf', 5, 'has verified an event: ', '2018-02-20 12:06:54', 2),
(119, 'TOTaf', 5, 'has approved an event: ', '2018-02-20 12:07:39', 2),
(120, 'TOTaf', 5, 'added a new report for: ', '2018-02-20 12:09:00', 2),
(121, 'TOTaf', 5, 'added a new report for: ', '2018-02-20 12:09:39', 2),
(122, 'TOTaf', 5, 'has approved a report: ', '2018-02-20 12:27:13', 2),
(123, '1ow', 5, 'has approved a report: ', '2018-02-20 12:29:33', 2),
(124, 'wrgs', 5, 'added a future event', '2018-02-20 16:33:04', 2),
(125, 'wrgs', 5, 'edited a future event', '2018-02-20 16:33:18', 2),
(126, 'wrgs', 5, 'edited a future event', '2018-02-21 06:22:43', 2),
(127, 'wrgs', 5, 'has verified an event: ', '2018-02-21 06:22:50', 2),
(128, 'wrgs', 5, 'edited a future event', '2018-02-21 07:59:51', 2),
(129, 'testtt', 5, 'added a new report for: ', '2018-02-21 08:11:23', 2),
(130, 'testtt', 5, 'added a new report for: ', '2018-02-21 09:05:33', 2),
(131, 'wrgs', 5, 'edited a future event', '2018-02-21 09:27:21', 2),
(132, 'wrgs', 5, 'has verified an event: ', '2018-02-21 09:27:33', 2),
(133, 'sd', 5, 'added a new report for: ', '2018-02-21 09:28:36', 2),
(134, 'asd', 5, 'added a new report for: ', '2018-02-21 09:31:05', 4),
(135, 'sdf', 5, 'added a future event', '2018-02-21 09:54:17', 3),
(136, 'sd', 5, 'added a future event', '2018-02-21 09:54:33', 2),
(137, 'sdf', 5, 'has verified an event: ', '2018-02-21 09:55:07', 2),
(138, 'sdf', 5, 'has approved an event: ', '2018-02-21 09:58:10', 2),
(139, 'sd', 5, 'edited a future event', '2018-02-21 09:58:27', 2),
(140, 'sd', 5, 'has verified an event: ', '2018-02-21 09:58:41', 2),
(141, 'sdf', 5, 'added a new report for: ', '2018-02-21 09:59:15', 2),
(142, 'sd', 5, 'edited a future event', '2018-02-21 10:20:14', 2),
(143, 'sdf', 5, 'added a new report for: ', '2018-02-21 10:21:41', 2),
(144, 'sdf', 5, 'has approved a report: ', '2018-02-21 10:21:52', 2),
(145, 'sd', 5, 'has verified an event: ', '2018-02-21 11:29:32', 2),
(146, 'sd', 5, 'has approved an event: ', '2018-02-21 11:29:40', 2),
(147, 'sd', 5, 'added a new report for: ', '2018-02-21 11:30:47', 2),
(148, 'sd', 5, 'added a future event', '2018-02-21 11:36:09', 2),
(149, 'sd', 5, 'edited a future event', '2018-02-21 11:37:08', 2),
(150, 'sd', 5, 'has verified an event: ', '2018-02-21 11:37:19', 2),
(151, 'sd', 5, 'added a new report for: ', '2018-02-21 13:48:19', 2);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--
-- Creation: Feb 21, 2018 at 02:09 PM
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
  `mode_of_outreach` varchar(300) NOT NULL,
  `audience_category` varchar(300) NOT NULL,
  `expected_audience_attendance` varchar(300) NOT NULL,
  `is_verified` int(10) NOT NULL DEFAULT '0',
  `is_approved` int(10) NOT NULL DEFAULT '0',
  `nonapproval_comments` varchar(150) NOT NULL,
  `verification_comments` varchar(2000) NOT NULL,
  `approved_comments` varchar(100) NOT NULL,
  `creator` int(10) NOT NULL,
  `verified_timestamp` varchar(30) NOT NULL,
  `approved_timestamp` varchar(30) NOT NULL,
  `is_reported` int(11) NOT NULL DEFAULT '0',
  `misc_reasons` varchar(150) NOT NULL,
  `deny_status` int(10) NOT NULL
) ;

--
-- RELATIONSHIPS FOR TABLE `events`:
--   `creator`
--       `users` -> `userid`
--

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `eventtitle`, `eventtopic`, `date_to_be_organized`, `region`, `town`, `logistics`, `mode_of_outreach`, `audience_category`, `expected_audience_attendance`, `is_verified`, `is_approved`, `nonapproval_comments`, `verification_comments`, `approved_comments`, `creator`, `verified_timestamp`, `approved_timestamp`, `is_reported`, `misc_reasons`, `deny_status`) VALUES
(49, 'sdf', 'sd', '2018-02-21 00:00:00', '2', 'sd', 'Pen(s),', 'Durbar,', 'Schools', '23', 1, 1, '', 'sd', 'sd', 5, '2018-02-21 10:55:07', '2018-02-21 10:58:10', 1, '', 0),
(50, 'sd', 'sd', '2018-02-17 00:00:00', '2', 'sd', 'Notepad(s),', 'Road Show,', 'Religious Bodies', '3', 1, 1, 'sd', 'sd', 'd', 5, '2018-02-21 12:29:32', '2018-02-21 12:29:40', 1, '', 1),
(51, 'sd', 'fdf', '2018-02-07 00:00:00', '2', 'ad', 'Notepad(s),', 'Durbar,', 'Corporate', '33', 2, 2, 'sd', '', '', 5, '', '', 0, '', 0);

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
(71, 49, '', 'sd'),
(72, 49, '', 's'),
(73, 50, '', 'df'),
(74, 50, '', 'sd');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--
-- Creation: Feb 19, 2018 at 02:12 PM
--

DROP TABLE IF EXISTS `reports`;
CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `event_id` int(10) NOT NULL,
  `team_challenges` varchar(1000) NOT NULL,
  `complaints_raised` varchar(1000) NOT NULL,
  `is_approved` int(10) NOT NULL,
  `verification_comments` varchar(2000) NOT NULL,
  `nonapproval_comments` varchar(150) NOT NULL,
  `event_summary` varchar(2000) NOT NULL,
  `picture_paths` varchar(55000) NOT NULL,
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

INSERT INTO `reports` (`report_id`, `event_id`, `team_challenges`, `complaints_raised`, `is_approved`, `verification_comments`, `nonapproval_comments`, `event_summary`, `picture_paths`, `folder_paths`, `team_members`, `date_reported`, `verified_timestamp`) VALUES
(159, 49, 'sd', 'sd', 1, 'fg', '', 'sd', '[\"9uRzYv4.jpg\"]', '5_49', 's', '2018-02-21 10:21:41', '2018-02-21 11:21:52'),
(161, 50, 'sd', 'sd', 2, '', 'sdsd', 'sd', '[\"1920x1080-px-Arrow-TV-series-arrows-computer-mice-1226519-wallhere.com.jpg\"]', '5_50', 'sd', '2018-02-21 13:48:19', '0000-00-00 00:00:00');

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

--
-- Dumping data for table `userlogs`
--

INSERT INTO `userlogs` (`userlog_id`, `acted_id`, `acted_on_id`, `action`, `date`) VALUES
(15, 3, 19, 'added', '2018-02-12 10:46:07'),
(16, 3, 20, 'added', '2018-02-13 13:42:44'),
(17, 3, 20, 'deactivated the user:', '2018-02-13 13:42:47'),
(18, 3, 20, 'activated the user:', '2018-02-13 13:43:12'),
(19, 3, 20, 'deactivated the user:', '2018-02-13 13:45:25'),
(20, 3, 20, 'activated the user:', '2018-02-13 13:46:11');

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
(17, 'Brian1', 'MArtey', 'bnmm@nca.org.gh', 'e00cf25ad42683b3df678c61f42c6bda', 3, '2', 'active'),
(18, 'BB', 'Martey', 'bnmm1@nca.org.gh', 'e00cf25ad42683b3df678c61f42c6bda', 2, '2', 'active'),
(19, 'daf', 'df', 'bnmm@nca.org.gh', 'c84258e9c39059a89ab77d846ddab909', 4, '2', 'active'),
(20, 'ryan', 'moujaled', 'ryan@nca.org.gh', '10c7ccc7a4f0aff03c915c485565b9da', 2, '1', 'active');

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
