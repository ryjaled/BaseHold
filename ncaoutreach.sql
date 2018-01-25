-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 25, 2018 at 04:41 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ncaoutreach`
--

-- --------------------------------------------------------

--
-- Table structure for table `audiences`
--

CREATE TABLE `audiences` (
  `aud_id` int(11) NOT NULL,
  `aud_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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

CREATE TABLE `eventlogs` (
  `eventlog_id` int(11) NOT NULL,
  `event_title` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `region` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventlogs`
--

INSERT INTO `eventlogs` (`eventlog_id`, `event_title`, `user_id`, `action`, `date`, `region`) VALUES
(4, 'aaa', 5, 'added a completed event', '2018-01-24 15:48:48', '1'),
(5, 'aa', 5, 'added a pending event', '2018-01-24 15:49:00', '1'),
(11, 'cccc', 5, 'added a completed event', '2018-01-25 09:36:12', '4'),
(12, 'xxxx', 5, 'added a pending event', '2018-01-25 14:55:47', '4'),
(13, 'xxxx', 5, 'added a completed event', '2018-01-25 15:06:52', '1');

-- --------------------------------------------------------

--
-- Table structure for table `pending`
--

CREATE TABLE `pending` (
  `pending_id` int(11) NOT NULL,
  `eventtitle` varchar(100) NOT NULL,
  `date_to_be_organized` timestamp NULL DEFAULT NULL,
  `region` int(10) NOT NULL,
  `town` varchar(100) NOT NULL,
  `audience_category` varchar(100) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `reporter` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pending`
--

INSERT INTO `pending` (`pending_id`, `eventtitle`, `date_to_be_organized`, `region`, `town`, `audience_category`, `status`, `reporter`) VALUES
(1, '$eventtitle', '2018-09-01 00:00:00', 2, 'town', '$audiencecat', '1', 5),
(2, 'sdsd', '2018-01-27 00:00:00', 2, 'sdsdsd', 'Education', '1', 5),
(4, 'test4', '2018-01-27 00:00:00', 2, 'awurade', 'Hospitality', '1', 5),
(5, 'vfevve', '2018-01-24 00:00:00', 1, 'vfvf', 'Education', '1', 5),
(6, 'eeee', '2018-01-26 00:00:00', 4, 'eee', '', '1', 5),
(7, 'aa', '2018-01-24 00:00:00', 1, 'aaa', 'Corporate', '1', 5),
(8, '23dsd', '2018-01-25 00:00:00', 2, 'sdas', 'Corporate', '1', 5),
(9, 'checker22', '2018-01-25 00:00:00', 2, 'asd', 'Education', '1', 5);

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `region_id` int(10) NOT NULL,
  `regionname` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `report_id` int(11) NOT NULL,
  `eventtitle` varchar(1000) NOT NULL,
  `date_organized` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `region` varchar(300) NOT NULL,
  `town` varchar(300) NOT NULL,
  `audience_category` varchar(300) NOT NULL,
  `audience_attendance` varchar(300) NOT NULL,
  `team_challenges` varchar(1000) NOT NULL,
  `complaints_raised` varchar(1000) NOT NULL,
  `is_verified` int(10) NOT NULL,
  `is_approved` int(10) NOT NULL,
  `verification_comments` varchar(2000) NOT NULL,
  `event_summary` varchar(2000) NOT NULL,
  `picture_paths` varchar(2000) NOT NULL,
  `folder_paths` varchar(250) NOT NULL,
  `reporter` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`report_id`, `eventtitle`, `date_organized`, `region`, `town`, `audience_category`, `audience_attendance`, `team_challenges`, `complaints_raised`, `is_verified`, `is_approved`, `verification_comments`, `event_summary`, `picture_paths`, `folder_paths`, `reporter`) VALUES
(75, 'as', '2018-01-03 00:00:00', '2', 'wdc', 'Corporate', '19', 'as', 'as', 1, 1, 'not verified', 'as', '[\"dining-room-paint-colors_3275_1600_1067.jpg\",\"Awesome-Dining-Room-Colors-85-In-home-design-ideas-budget-with-Dining-Room-Colors.jpg\"]', '5_as', 5),
(76, 'sdasd', '2018-01-18 12:00:21', '4', 'adasd', 'Healthcare', '12', 'sd', 'sd', 1, 1, 'jh', 'ds', '[\"Modern-small-dining-room-colors.jpg\"]', '5_sdasd', 5),
(77, 'sd', '2018-01-07 00:00:00', '9', 'dsd', 'Healthcare', '4', 'asd', 'asd', 1, 1, 'not verified', 'asd', '[\"Modern-small-dining-room-colors.jpg\"]', '5_sd', 5),
(78, 'ss', '2018-01-15 11:33:36', '10', 'sd', 'Hospitality', '78', 's', 'sd', 1, 1, 'bgcgv', 's', '[]', '5_ss', 5),
(79, 'dd', '2018-01-12 00:00:00', '5', 'ds', 'Mixed', '20', 's', 's', 1, 1, 'not verified', 's', '[]', '5_dd', 5),
(80, 's', '2018-01-15 11:33:22', '2', 's', 'Market', '10', 'sd', 'sd', 1, 1, 'done', 'sd', '[]', '5_s', 5),
(81, 's', '2018-01-17 00:00:00', '2', 'sd', 'Corporate', '20', 'sd', 'sd', 1, 1, 'not verified', 'sd', '[\"IMG-20180102-WA0008.jpg\"]', '5_s', 5),
(82, 'sd', '2018-01-15 09:31:13', '2', 'asd', 'Mixed', '2', 'sd', 'sd', 1, 1, 'not verified', 'sd', '[]', '5_sd', 7),
(83, 'sd', '2018-01-18 12:08:12', '1', 'd', 'Healthcare', '3', 'sd', 'd', 1, 1, 'dsd', 'sd', '[]', '5_sd', 7),
(84, 'sd', '2018-01-15 09:31:13', '1', 'sd', 'Education', '100', 'sd', 'ds', 1, 1, 'not verified', 'sd', '[]', '5_sd', 7),
(85, 'dsd', '2018-01-24 00:00:00', '5', 'sdd', 'Education', '683', 'sds', 'sd', 1, 1, 'verify at 5', 'd', '[]', '5_dsd', 5),
(86, 'teST', '2018-01-15 09:42:53', '2', 'weija', 'Corporate', '234', 'dfdf', 'dfdf', 1, 1, 'hi', 'dfdf', '[\"Tech-News.jpg\"]', '5_teST', 5),
(87, 'hey', '2018-01-17 00:00:00', '2', 'adsd', 'Education', '4', 'sds', 'sddd', 1, 1, 'd', 'sdsd', '[\"Pink watercolor skull1939_square.jpg\",\"Sunny stag811_square.jpg\",\"Meet you1889_square.jpg\"]', '5_hey', 5),
(88, 'Test Event', '2018-01-16 12:09:07', '2', 'Trotdgdf', 'Healthcare', '60', 'None', 'None', 1, 1, 'how', 'None', '[\"work.jpg\"]', '17_Test Event', 17),
(89, 'asd', '2018-01-24 00:00:00', '2', '12dsa', 'Corporate', '12', 'asd', 'dasd', 0, 0, 'not verified', 'asd', '[\"4620747.jpg\"]', '5_asd', 5),
(90, 'asdasd', '2018-01-24 00:00:00', '1', 'cccc', 'Corporate', '212', 'csc', 'gg', 0, 0, 'not verified', 'ww', '[\"74297b.jpg\"]', '5_asdasd', 5),
(91, 'aaa', '2018-01-24 00:00:00', '1', 'aaa', 'Corporate', '111', 'aaa', 'aa', 1, 1, 'verify', 'aaa', '[\"images.jpeg\"]', '5_aaa', 5),
(92, '111', '2018-01-25 00:00:00', '1', '333', 'Corporate', '222', '444', 'ss', 1, 1, 'verify again', 'ddddd', '[\"4620747.jpg\"]', '5_111', 5),
(93, 'checker', '2018-01-25 00:00:00', '2', 'casda', 'Corporate', '122', 'asda', 'asdas', 1, 1, 'verify me', 'das ', '[\"images.jpeg\"]', '5_checker', 5),
(94, 'qweqweqwe', '2018-01-25 00:00:00', '2', 'qweqwe', 'Hospitality', '2121', 'asdasd', 'czsca', 0, 0, 'not verified', 'asd', '[]', '5_qweqweqwe', 5),
(95, 'cccc', '2018-01-25 00:00:00', '4', 'Ccc', 'Education', '11', 'ccc', 'cc', 0, 0, 'not verified', 'cc', '[]', '5_cccc', 5),
(96, 'ttttttt', '2018-01-26 00:00:00', '1', 'gf', 'Corporate', '21', 'asd', 'asd', 0, 0, 'not verified', 'asd', '[\"4620747.jpg\"]', '5_ttttttt', 5),
(97, 'xxxx', '2018-01-25 00:00:00', '1', 'xxxx', 'Corporate', '222', 'xx', 'xxx', 0, 0, 'not verified', 'xxx', '[\"316084.gif\"]', '5_xxxx', 5);

-- --------------------------------------------------------

--
-- Table structure for table `userlogs`
--

CREATE TABLE `userlogs` (
  `userlog_id` int(11) NOT NULL,
  `acted_id` int(11) NOT NULL,
  `acted_on_id` int(11) NOT NULL,
  `action` varchar(30) CHARACTER SET latin1 NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `userlogs`
--

INSERT INTO `userlogs` (`userlog_id`, `acted_id`, `acted_on_id`, `action`, `date`) VALUES
(1, 0, 0, 'deactivated the user:', '2018-01-24 15:49:29'),
(2, 0, 0, 'activated the user:', '2018-01-24 15:49:35'),
(3, 3, 5, 'deactivated the user:', '2018-01-24 15:52:44'),
(4, 3, 4, 'deactivated the user:', '2018-01-24 15:52:45'),
(5, 3, 5, 'activated the user:', '2018-01-24 15:52:48'),
(6, 3, 4, 'activated the user:', '2018-01-24 15:52:50'),
(7, 3, 5, 'deactivated the user:', '2018-01-24 15:54:36'),
(8, 3, 4, 'deactivated the user:', '2018-01-24 15:54:41'),
(9, 3, 5, 'activated the user:', '2018-01-24 15:54:43'),
(10, 3, 4, 'activated the user:', '2018-01-24 15:54:44'),
(11, 0, 0, 'activated the user:', '2018-01-24 21:23:50'),
(12, 4, 31, 'added', '2018-01-24 22:21:22'),
(13, 3, 32, 'added', '2018-01-24 22:28:08'),
(14, 3, 33, 'added', '2018-01-24 22:28:34'),
(15, 3, 34, 'added', '2018-01-25 08:43:02'),
(16, 3, 16, 'deactivated the user:', '2018-01-25 09:59:57'),
(17, 3, 16, 'activated the user:', '2018-01-25 10:00:43'),
(18, 3, 16, 'deactivated the user:', '2018-01-25 10:00:48'),
(19, 3, 16, 'activated the user:', '2018-01-25 10:00:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(100) NOT NULL,
  `firstname` varchar(300) NOT NULL,
  `lastname` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `region` int(10) NOT NULL,
  `level` varchar(300) NOT NULL,
  `status` enum('active','inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(18, 'BB', 'Martey', 'bnmm1@nca.org.gh', 'e00cf25ad42683b3df678c61f42c6bda', 2, '2', 'active'),
(31, 'Test', 'Testuser', 'test@nca.org.gh', '098f6bcd4621d373cade4e832627b4f6', 2, '1', 'active'),
(32, 'testteam', 'testteam', 'testteam@nca.org.gh', '6054086ed1959ec7bbad81be7f6170c6', 1, '1', 'active'),
(33, 'testteam2', 'testteam2', 'testteam2@nca.org.gh', 'ae4940e04e8e9aadf41bb3398d934580', 5, '2', 'active'),
(34, 'firstname', 'lastname', 'firstname@nca.org.gh', '342f5c77ed008542e78094607ce1f7f3', 1, '3', 'active');

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
  MODIFY `aud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20432;

--
-- AUTO_INCREMENT for table `eventlogs`
--
ALTER TABLE `eventlogs`
  MODIFY `eventlog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pending`
--
ALTER TABLE `pending`
  MODIFY `pending_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `region_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `userlogs`
--
ALTER TABLE `userlogs`
  MODIFY `userlog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
