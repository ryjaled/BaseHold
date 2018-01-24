-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 24, 2018 at 05:17 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `ncaoutreach`
--

-- --------------------------------------------------------

--
-- Table structure for table `eventlogs`
--

CREATE TABLE `eventlogs` (
  `eventlog_id` int(11) NOT NULL,
  `event_title` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `eventlogs`
--

INSERT INTO `eventlogs` (`eventlog_id`, `event_title`, `user_id`, `action`, `date`) VALUES
(4, 'aaa', 5, 'Added a completed event', '2018-01-24 15:48:48'),
(5, 'aa', 5, 'Added a pending event', '2018-01-24 15:49:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eventlogs`
--
ALTER TABLE `eventlogs`
  ADD PRIMARY KEY (`eventlog_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eventlogs`
--
ALTER TABLE `eventlogs`
  MODIFY `eventlog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
