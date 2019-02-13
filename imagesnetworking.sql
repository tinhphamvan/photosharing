-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2018 at 05:50 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `imagesnetworking`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `c_id` bigint(50) NOT NULL,
  `c_author_id` varchar(255) NOT NULL,
  `c_post_id` bigint(11) NOT NULL,
  `c_content` varchar(10000) CHARACTER SET utf8mb4 NOT NULL,
  `c_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`c_id`, `c_author_id`, `c_post_id`, `c_content`, `c_time`) VALUES
(3, 'tinhphamvan', 29, 'T cung thay vay m oi', '2018-11-26 08:31:16'),
(4, 'vudinhthuan', 29, 'Haha I love you', '2018-11-25 20:23:06'),
(5, 'tinhphamvan', 29, 'Haha cai gi ba', '2018-11-26 11:29:06'),
(6, 'tinhphamvan', 29, 'vvc hay lam', '2018-11-26 11:33:42'),
(7, 'tinhphamvan', 29, 'tau so m rroi do Thuan', '2018-10-26 11:33:56'),
(9, 'tinhphamvan', 29, 'vcc', '2018-11-26 14:39:14'),
(10, 'tinhphamvan', 29, 'Hay lam anh ban', '2018-11-26 14:55:11'),
(11, 'tinhphamvan', 31, 'Beautiful <3', '2018-11-26 14:56:05'),
(12, 'tinhphamvan', 31, 'ahaha', '2018-11-26 14:56:35'),
(13, 'tinhphamvan', 31, 'ha qua', '2018-11-26 14:57:56'),
(14, 'tinhphamvan', 31, 'love it', '2018-11-26 14:58:03'),
(15, 'tinhphamvan', 31, 'just kidding', '2018-11-26 14:59:00'),
(16, 'tinhphamvan', 31, 'erty', '2018-11-26 14:59:38'),
(17, 'tinhphamvan', 31, '', '2018-11-26 14:59:41'),
(18, 'tinhphamvan', 31, 'good man', '2018-11-26 14:59:48'),
(19, 'tinhphamvan', 31, 'oh my god', '2018-11-26 15:05:11'),
(20, 'tinhphamvan', 51, 'OMG GOOD MAN', '2018-11-26 15:08:06'),
(21, 'tinhphamvan', 51, 'GOOD MANE', '2018-11-26 15:08:30'),
(22, 'tinhphamvan', 51, 'RTYU', '2018-11-26 15:09:11'),
(23, 'tinhphamvan', 51, 'good boy', '2018-11-26 15:09:46'),
(24, 'vudinhthuan', 29, 'hihi', '2018-11-26 15:21:24'),
(25, 'vudinhthuan', 51, 'ertghj', '2018-11-26 15:46:35'),
(26, 'vudinhthuan', 29, '', '2018-11-26 15:46:48'),
(27, 'vudinhthuan', 72, 'haha', '2018-11-26 16:12:20'),
(28, 'tinhphamvan', 31, '', '2018-11-26 17:31:05'),
(29, 'tinhphamvan', 51, 'hihi done go to sleep', '2018-11-26 17:31:25'),
(30, 'tinhphamvan', 31, 'ui xinh vl', '2018-11-27 08:19:25'),
(31, 'tinhphamvan', 70, 'Ngon m', '2018-11-28 15:21:00'),
(32, 'tinhphamvan', 88, 'great', '2018-12-04 05:08:17'),
(33, 'cristiano', 110, 'Good', '2018-12-04 06:24:20'),
(34, 'tinhphamvan', 130, 'Hay quaÌ anh Æ¡i', '2018-12-04 15:33:14'),
(35, 'tinhphamvan', 122, 'haha', '2018-12-04 15:43:32'),
(36, 'cristiano', 130, 'HAHA', '2018-12-04 17:20:59'),
(37, 'tinhphamvan', 128, 'ngon', '2018-12-06 17:52:59'),
(38, 'cristiano', 127, 'good job', '2018-12-07 04:41:12'),
(39, 'tinhphamvan', 130, 'good job man', '2018-12-07 04:46:57'),
(40, 'tinhphamvan', 144, 'dep trai', '2018-12-07 05:08:09'),
(41, '', 128, 'HAHAH', '2018-12-07 09:34:46'),
(42, 'tinhphamvan', 31, 'ffff', '2018-12-12 03:34:37'),
(43, 'tinhphamvan', 129, 'haha good', '2018-12-12 09:40:25'),
(44, 'tinhphamvan', 130, '<3', '2018-12-12 09:41:46'),
(45, 'tinhphamvan', 111, 'like', '2018-12-12 09:49:25'),
(46, 'tinhphamvan', 201, 'oh great man', '2018-12-12 10:50:36'),
(47, 'vladimirputin', 210, 'hand some', '2018-12-12 11:08:34'),
(48, 'tinhphamvan', 114, 'ngon', '2018-12-13 03:43:29'),
(49, 'tinhphamvan', 88, 'haha', '2018-12-13 03:57:23');

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `id` bigint(11) NOT NULL,
  `uf_one` varchar(255) NOT NULL,
  `uf_two` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`id`, `uf_one`, `uf_two`) VALUES
(250, 'tinhphamvan', 'vudinhthuan'),
(251, 'cristiano', 'tinhphamvan'),
(261, 'cristiano', 'vudinhthuan'),
(262, 'billgate', 'cristiano'),
(263, 'markzuckerberg', 'tinhphamvan'),
(264, 'markzuckerberg', 'cristiano'),
(265, 'justinbieber', 'cristiano'),
(270, 'tinhphamvan', 'nguyenquanghai'),
(271, 'tinhphamvan', 'vladimirputin'),
(276, 'cristiano', 'markzuckerberg'),
(280, 'tinhphamvan', 'cristiano'),
(282, 'cristiano', 'vladimirputin'),
(284, 'tinhphamvan', 'markzuckerberg'),
(288, 'cristiano', 'justinbieber'),
(289, 'cristiano', 'nguyenquanghai'),
(291, 'tinhphamvan', 'nickvujicic'),
(292, 'vladimirputin', 'cristiano'),
(293, 'vladimirputin', 'tinhphamvan'),
(294, 'vladimirputin', 'justinbieber'),
(295, 'justinbieber', 'billgate'),
(296, 'justinbieber', 'nickvujicic'),
(297, 'nickvujicic', 'justinbieber'),
(298, 'justinbieber', 'tinhphamvan');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` bigint(11) NOT NULL,
  `liker` varchar(255) NOT NULL,
  `post_id` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `liker`, `post_id`) VALUES
(218, 'tinhphamvan', 36),
(223, 'tinhphamvan', 40),
(225, 'tinhphamvan', 41),
(226, 'tinhphamvan', 57),
(244, 'tinhphamvan', 68),
(246, 'tinhphamvan', 66),
(259, 'vudinhthuan', 45),
(277, 'vudinhthuan', 33),
(317, 'vudinhthuan', 31),
(318, 'vudinhthuan', 72),
(331, 'vudinhthuan', 29),
(345, 'tinhphamvan', 70),
(360, 'tinhphamvan', 73),
(364, 'tinhphamvan', 74),
(365, 'tinhphamvan', 37),
(366, 'tinhphamvan', 72),
(368, 'vudinhthuan', 70),
(371, 'vudinhthuan', 77),
(372, 'tinhphamvan', 29),
(374, 'tinhphamvan', 104),
(375, 'cristiano', 105),
(376, 'cristiano', 106),
(377, 'cristiano', 107),
(379, 'cristiano', 109),
(380, 'cristiano', 113),
(381, 'cristiano', 115),
(382, 'cristiano', 116),
(383, 'cristiano', 127),
(384, 'cristiano', 130),
(386, 'tinhphamvan', 123),
(390, 'tinhphamvan', 105),
(391, 'billgate', 151),
(392, 'billgate', 130),
(393, 'markzuckerberg', 164),
(394, 'tinhphamvan', 128),
(395, 'tinhphamvan', 134),
(396, 'tinhphamvan', 133),
(397, 'tinhphamvan', 132),
(400, 'tinhphamvan', 127),
(401, 'tinhphamvan', 151),
(402, 'tinhphamvan', 144),
(403, 'tinhphamvan', 164),
(404, 'tinhphamvan', 141),
(405, 'tinhphamvan', 155),
(406, 'tinhphamvan', 51),
(407, 'cristiano', 129),
(408, 'cristiano', 134),
(409, 'cristiano', 133),
(410, 'cristiano', 132),
(412, 'cristiano', 114),
(414, 'tinhphamvan', 33),
(415, 'tinhphamvan', 130),
(416, 'tinhphamvan', 129),
(438, 'tinhphamvan', 135),
(445, 'tinhphamvan', 139),
(446, 'tinhphamvan', 46),
(447, 'tinhphamvan', 242),
(450, 'tinhphamvan', 65),
(451, 'tinhphamvan', 201),
(452, 'vladimirputin', 31),
(453, 'nickvujicic', 132),
(454, 'nickvujicic', 235),
(455, 'nickvujicic', 160),
(456, 'nickvujicic', 237),
(457, 'tinhphamvan', 111),
(458, 'tinhphamvan', 45),
(459, 'tinhphamvan', 49),
(460, 'justinbieber', 185),
(461, 'justinbieber', 178),
(462, 'justinbieber', 133),
(467, 'cristiano', 88),
(468, 'tinhphamvan', 50),
(472, 'tinhphamvan', 88),
(474, 'tinhphamvan', 114),
(480, 'tinhphamvan', 158),
(481, 'tinhphamvan', 31),
(483, 'tinhphamvan', 263);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `post_id` bigint(11) NOT NULL,
  `from_id` varchar(100) NOT NULL,
  `for_id` varchar(100) NOT NULL,
  `notifyType_id` bigint(11) NOT NULL,
  `seen` int(11) NOT NULL DEFAULT '0',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `checkSeen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `post_id`, `from_id`, `for_id`, `notifyType_id`, `seen`, `time`, `checkSeen`) VALUES
(5, 65, 'tinhphamvan', 'tinhphamvan', 1, 0, '2018-12-12 10:45:53', 1),
(6, 201, 'tinhphamvan', 'vladimirputin', 1, 1, '2018-12-12 10:46:17', 1),
(7, 201, 'tinhphamvan', 'vladimirputin', 2, 0, '2018-12-12 10:50:36', 1),
(8, 0, 'tinhphamvan', 'nickvujicic', 3, 0, '2018-12-12 10:55:39', 1),
(9, 0, 'tinhphamvan', 'nickvujicic', 3, 0, '2018-12-12 10:56:15', 1),
(10, 31, 'vladimirputin', 'tinhphamvan', 1, 0, '2018-12-12 11:08:04', 1),
(11, 210, 'vladimirputin', 'vladimirputin', 2, 0, '2018-12-12 11:08:34', 1),
(12, 0, 'justinbieber', 'nickvujicic', 3, 0, '2018-12-12 12:06:21', 1),
(13, 0, 'nickvujicic', 'justinbieber', 3, 0, '2018-12-12 12:06:51', 1),
(14, 132, 'nickvujicic', 'justinbieber', 1, 0, '2018-12-12 12:08:53', 1),
(15, 235, 'nickvujicic', 'NickVujicic', 1, 0, '2018-12-12 12:09:31', 1),
(16, 160, 'nickvujicic', 'nickvujicic', 1, 0, '2018-12-12 12:23:28', 1),
(17, 237, 'nickvujicic', 'NickVujicic', 1, 0, '2018-12-12 12:24:45', 1),
(18, 111, 'tinhphamvan', 'cristiano', 1, 0, '2018-12-13 03:36:46', 1),
(19, 114, 'tinhphamvan', 'cristiano', 2, 0, '2018-12-13 03:43:29', 1),
(20, 45, 'tinhphamvan', 'tinhphamvan', 1, 0, '2018-12-13 03:51:39', 1),
(21, 88, 'tinhphamvan', 'tinhphamvan', 2, 0, '2018-12-13 03:57:23', 1),
(22, 49, 'tinhphamvan', 'tinhphamvan', 1, 0, '2018-12-13 03:58:53', 1),
(23, 0, 'justinbieber', 'tinhphamvan', 3, 0, '2018-12-13 04:06:06', 1),
(24, 185, 'justinbieber', 'justinbieber', 1, 0, '2018-12-13 04:26:16', 1),
(25, 178, 'justinbieber', 'justinbieber', 1, 0, '2018-12-13 04:31:33', 1),
(26, 133, 'justinbieber', 'justinbieber', 1, 0, '2018-12-13 04:52:36', 1),
(27, 88, 'cristiano', 'tinhphamvan', 1, 0, '2018-12-13 08:44:18', 1),
(28, 88, 'cristiano', 'tinhphamvan', 1, 0, '2018-12-13 08:44:19', 1),
(29, 88, 'cristiano', 'tinhphamvan', 1, 0, '2018-12-13 08:44:22', 1),
(30, 88, 'cristiano', 'tinhphamvan', 1, 0, '2018-12-13 08:44:23', 1),
(31, 88, 'cristiano', 'tinhphamvan', 1, 0, '2018-12-13 08:44:24', 1),
(32, 50, 'tinhphamvan', 'tinhphamvan', 1, 0, '2018-12-13 09:30:35', 1),
(33, 158, 'tinhphamvan', 'nickvujicic', 1, 0, '2018-12-13 16:09:47', 1),
(34, 88, 'tinhphamvan', 'tinhphamvan', 1, 0, '2018-12-13 16:10:49', 1),
(35, 88, 'tinhphamvan', 'tinhphamvan', 1, 0, '2018-12-13 16:11:26', 1),
(36, 88, 'tinhphamvan', 'tinhphamvan', 1, 0, '2018-12-13 16:11:27', 1),
(37, 158, 'tinhphamvan', 'nickvujicic', 1, 0, '2018-12-13 16:11:48', 1),
(38, 114, 'tinhphamvan', 'cristiano', 1, 0, '2018-12-13 16:20:04', 1),
(39, 158, 'tinhphamvan', 'nickvujicic', 1, 0, '2018-12-13 16:20:55', 1),
(40, 158, 'tinhphamvan', 'nickvujicic', 1, 0, '2018-12-14 04:40:03', 1),
(41, 158, 'tinhphamvan', 'nickvujicic', 1, 0, '2018-12-14 04:40:04', 1),
(42, 158, 'tinhphamvan', 'nickvujicic', 1, 0, '2018-12-14 04:40:06', 1),
(43, 158, 'tinhphamvan', 'nickvujicic', 1, 0, '2018-12-14 04:40:07', 1),
(44, 158, 'tinhphamvan', 'nickvujicic', 1, 0, '2018-12-14 04:40:10', 1),
(45, 31, 'tinhphamvan', 'tinhphamvan', 1, 0, '2018-12-14 04:45:47', 1),
(46, 263, 'tinhphamvan', 'tinhphamvan', 1, 0, '2018-12-14 07:53:18', 1),
(47, 263, 'tinhphamvan', 'tinhphamvan', 1, 0, '2018-12-14 07:54:21', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `user_id_p` varchar(255) NOT NULL,
  `status_image` varchar(255) NOT NULL,
  `status_time` date NOT NULL,
  `status_title` text NOT NULL,
  `status` text NOT NULL,
  `p_likes` int(100) NOT NULL DEFAULT '0',
  `time_posts` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id_p`, `status_image`, `status_time`, `status_title`, `status`, `p_likes`, `time_posts`) VALUES
(37, 'tinhphamvan', 'https://ucarecdn.com/5675669e-5526-4570-b6ed-f7484b862655/', '2016-06-05', 'Footbal with my friends', '<3 love', 1, '2018-11-28 15:20:39'),
(36, 'tinhphamvan', 'https://ucarecdn.com/2709c681-55a4-4c0b-84f5-90fe29377c78/', '1997-09-22', 'Birthday', 'The day I was born', 2, '2018-11-25 14:57:37'),
(29, 'tinhphamvan', 'https://ucarecdn.com/9bd7d5d1-7496-4d15-a15b-d91c63fbfaa9/', '2018-11-21', '', 'Hey I am supper MAN', 53, '2018-12-03 14:49:07'),
(31, 'tinhphamvan', 'https://ucarecdn.com/d7bb96d6-2f96-4596-943c-7cf5c2cf5eb9/-/crop/1504x1230/0,61/-/preview/', '2018-11-21', 'Da Lat trip 2018 summer', 'I and my love went to Da Lat in summer 2018. It was the first time that she have gone there. Very memorable <3', 4, '2018-11-27 09:27:50'),
(76, 'vudinhthuan', 'https://ucarecdn.com/ebaf2113-ea15-4c60-9fa0-a469c1abb2ca/-/preview/-/enhance/24/-/blur/0/-/sharp/6/-/grayscale/', '2016-02-04', 'HiTst', 'fdgfhjk', 0, '2018-11-29 09:01:53'),
(33, 'tinhphamvan', 'https://ucarecdn.com/f243729b-b2de-4fb6-b9b2-c33074d680e2/', '2018-02-02', 'Tet holiday 2018', 'Very funny', 3, '2018-12-12 07:52:31'),
(44, 'tinhphamvan', 'https://ucarecdn.com/7ac63809-7a93-4265-813b-aa50b4634a9b/', '2014-04-04', 'Market Festival ', 'I am selling somethings at market festival in my high school', 0, '2018-11-25 09:01:07'),
(41, 'tinhphamvan', 'https://ucarecdn.com/6b1b828f-6d7e-4f94-aed4-ad2f851d52ce/', '2016-03-05', 'My high school friends', 'Me with my high school friend at prom of high school', 2, '2018-11-25 13:06:08'),
(45, 'tinhphamvan', 'https://ucarecdn.com/1d281a56-4bac-495d-90ed-98f912536482/', '2013-02-02', 'Morning beach with football', 'My childhood friend and me have a trip to beach in the morning to see the sunshine and have a football match. BEAUTIFUL MEMORY', 2, '2018-11-25 15:49:52'),
(43, 'tinhphamvan', 'https://ucarecdn.com/a1c57528-3954-421e-804f-8253cb352668/-/crop/2041x1365/0,0/-/preview/', '2017-08-10', 'Fresher in university', 'I take part in an activity when I am at the first year in TDT university', 1, '2018-11-26 16:51:48'),
(46, 'tinhphamvan', 'https://ucarecdn.com/6f940b57-ca55-4118-bfe3-3f919fee15e2/', '2015-04-04', 'Stream Trip', 'My high school class help a trip to famous stream of my hometown <3 Love all', 2, '2018-11-25 13:06:13'),
(47, 'tinhphamvan', 'https://ucarecdn.com/c23bda5b-1c24-447e-b30f-248642ed6288/-/crop/540x723/0,0/-/preview/', '2015-09-22', 'Birthday Party', 'My class organize a birthday party for me in my class. LOVE', 1, '2018-11-25 13:06:11'),
(50, 'tinhphamvan', 'https://ucarecdn.com/83483cef-83bb-46af-a9a6-8e975e51ca49/', '2016-03-04', 'Graduate Day', 'A memory picture when I pick a present an prom day in my high school', 1, '2018-11-25 09:34:14'),
(49, 'tinhphamvan', 'https://ucarecdn.com/3f0fb1b0-5e02-4ef1-a976-dbb8c10f5172/', '1998-09-22', '1 YEAR ANNIVERSARY ', 'Me and my parent at a restaurant to organize 1 YEAR ANNIVERSARY  for me', 1, '2018-11-25 09:29:43'),
(51, 'tinhphamvan', 'https://ucarecdn.com/7266b2ad-67e3-4ad5-9d6c-3e9f9bd3a9ed/', '2018-10-30', 'Game Jam 2018', 'The competition before The Game Jam 2018 org at 30/11. ', 2, '2018-12-09 05:10:47'),
(65, 'tinhphamvan', 'https://ucarecdn.com/d1649c5d-be62-4eab-af8e-31c9e5c0981e/', '2017-03-03', 'My first English class in University', 'It is a funny class. I meet friends. Whose is my friend till now', 1, '2018-11-25 10:43:41'),
(87, 'vudinhthuan', 'https://ucarecdn.com/f0427dc1-1c5e-4448-b8ba-6ef3fdbf4ac8/-/preview/-/enhance/78/-/blur/10/-/sharp/5/-/grayscale/', '2016-02-03', 'dfgh', 'dfghj', 0, '2018-11-29 09:31:05'),
(74, 'tinhphamvan', 'https://ucarecdn.com/087ebe08-abb9-484f-bd2b-d56c9147dc37/', '2017-02-03', 'Part time job', 'I have worked in MasterBeef restaurant as a bartender', 1, '2018-11-28 15:20:36'),
(72, 'tinhphamvan', 'https://ucarecdn.com/36332803-1dc3-41d3-9c53-14abb03b55c1/', '2017-03-02', 'Inspire Libary Canteen', '<3', 2, '2018-11-28 15:33:17'),
(68, 'tinhphamvan', 'https://ucarecdn.com/fae10efd-8fba-4bc6-ac06-99e7cff924b8/', '2016-03-02', 'Chi Stream', 'Beautiful View from a mountaint', 1, '2018-11-25 14:56:00'),
(77, 'vudinhthuan', 'https://ucarecdn.com/ebaf2113-ea15-4c60-9fa0-a469c1abb2ca/-/preview/-/enhance/24/-/blur/0/-/sharp/6/-/grayscale/', '2016-02-04', 'HiTst', 'fdgfhjk', 1, '2018-11-29 09:14:46'),
(78, 'vudinhthuan', 'https://ucarecdn.com/e8f25021-c132-4cf2-8993-83465085811b/-/preview/-/enhance/12/-/blur/5/-/sharp/19/', '2015-02-03', 'dd', 'hiih', 0, '2018-11-29 09:10:47'),
(79, 'vudinhthuan', 'https://ucarecdn.com/e1be34ba-7264-46c7-931e-8e0036a6158c/-/preview/-/enhance/91/-/blur/10/-/sharp/15/-/grayscale/', '1223-03-22', 'dfdedf', 'fghjk', 0, '2018-11-29 09:10:40'),
(112, 'cristiano', 'https://ucarecdn.com/4c9dd4d5-2beb-4ddd-ae93-1b25123e39c8/', '2004-12-12', 'FA CUP 2003-2004 Winner', 'We win FA cup at the first year I come there. ', 0, '2018-12-04 06:31:51'),
(113, 'cristiano', 'https://ucarecdn.com/42b197b0-664f-48ae-856a-89d52f5d7f07/', '2006-04-04', 'Champion League 2005-2006', 'Ronaldo grabs a goal in the FA Cup semi-final against Newcastle', 1, '2018-12-04 06:37:28'),
(86, 'vudinhthuan', 'https://ucarecdn.com/60c71c1a-cd80-429d-b25d-9439932b77ac/-/preview/-/enhance/80/-/blur/10/-/sharp/5/-/grayscale/', '2015-09-09', 'wertgyh', 'dfghjk', 0, '2018-11-29 09:24:32'),
(88, 'tinhphamvan', 'https://ucarecdn.com/f593fd31-5efd-4e99-883a-8d912ff67304/-/preview/-/enhance/13/-/blur/10/-/sharp/5/', '2018-12-01', 'Game Jam 2018', 'My team created the game named \"Somes one out there\" ', 2, '2018-12-12 07:53:52'),
(89, 'tinhphamvan', 'https://ucarecdn.com/0827eeb0-1fde-4486-8785-df1a16c4959f/-/preview/-/enhance/40/-/blur/3/-/sharp/13/', '2016-03-04', 'etyu', 'drtfghj', 0, '2018-12-03 15:13:37'),
(114, 'cristiano', 'https://ucarecdn.com/72d2aa4c-3162-4669-a96a-d4e4456d22b1/', '2007-05-07', 'Golden Boot in 2007/08', 'He won the Golden Boot in 2007/08 with a massive 42 goals in all competitions', 2, '2018-12-12 08:03:17'),
(115, 'cristiano', 'https://ucarecdn.com/42c0e459-7246-4c74-b2a9-ad9860e77fce/', '2008-06-06', ' winning the Champions League', 'He did celebrate winning the Champions League when they beat Chelsea in the 2008 final', 1, '2018-12-04 06:43:52'),
(107, 'cristiano', 'https://ucarecdn.com/a341ff04-df3f-4d0f-96ba-4bc0f4fb71c8/-/crop/1300x1256/0,0/-/preview/-/enhance/51/-/blur/0/-/sharp/5/', '1995-02-01', 'Local team', 'Running with my friends', 1, '2018-12-04 05:51:56'),
(110, 'cristiano', 'https://ucarecdn.com/027bfbbe-99fc-4510-8010-0678830c8bbe/-/preview/-/enhance/43/-/blur/10/-/sharp/5/', '2001-07-31', 'My teamate', 'My friend and me, when we was in sporting lisbon club', 0, '2018-12-04 06:23:53'),
(109, 'cristiano', 'https://ucarecdn.com/051c97c0-7796-4a4b-b5ae-c9b4d7f820e1/-/preview/-/enhance/50/-/blur/4/-/sharp/5/', '1997-02-03', 'School Champion', 'I won the trophy at school, and also be a best player of this league', 1, '2018-12-04 06:06:10'),
(111, 'cristiano', 'https://ucarecdn.com/0aa2b8ef-065a-42ab-9a04-ae75411b75c6/', '2003-08-05', 'Manchester United ', 'The first day at Manchester United club', 10001, '2018-12-12 07:53:24'),
(105, 'cristiano', 'https://ucarecdn.com/5b5b6ab2-fc08-4254-925a-5cdb77ebcbac/-/preview/-/enhance/75/-/blur/0/-/sharp/1/', '1985-02-05', '<3', 'The day the king was born', 2, '2018-12-04 16:03:09'),
(106, 'cristiano', 'https://ucarecdn.com/3369c4f5-ff3e-4e90-bd9d-9eb7237c4e20/', '1988-03-31', '3 years old', 'The king childhood', 1, '2018-12-04 05:41:17'),
(116, 'cristiano', 'https://ucarecdn.com/0739808c-4998-4c27-8bad-d85992c7686b/article23899991B42BFEA000005DC850_634x400.jpg', '2009-09-09', 'mad world of Real Madrid', 'The crowds were full when Ronaldo was presented in Madrid', 1, '2018-12-04 07:24:33'),
(118, 'cristiano', 'https://ucarecdn.com/bf13e4bd-9e48-4734-9161-6f3eeed41cf9/', '2012-03-31', 'against rivals Atletico Madrid', 'Penalty: Scoring from the spot against rivals Atletico Madrid', 0, '2018-12-04 07:03:06'),
(119, 'cristiano', 'https://ucarecdn.com/69a7e760-5fd6-4553-ac38-4496fbb96843/', '2013-02-04', 'Againts old club - The red delvil', 'Coming back to haunt them: He scored a booming header against United when they went to the Bernabeu in the Champions League last 16 last season', 0, '2018-12-04 07:05:08'),
(120, 'cristiano', 'https://ucarecdn.com/47f5ba02-8a4f-48ae-9edb-e1cf41e37526/', '2013-01-31', 'The second balondor', 'The second balondor at 2013', 0, '2018-12-04 07:10:49'),
(121, 'cristiano', 'https://ucarecdn.com/a1ca96e3-87e6-4933-9f83-9c83cfb6f70f/', '2014-05-03', 'UEFA champion league 2014', 'Still, the player has successfully built a legacy in world football.', 0, '2018-12-04 07:13:01'),
(122, 'cristiano', 'https://ucarecdn.com/e61a0ded-b3ba-4218-a927-6331a38627b1/', '2015-07-03', '2015 seasson', 'Ronaldo grabbed a first-half hat-trick against Granada and went on to net', 0, '2018-12-04 07:15:30'),
(123, 'cristiano', 'https://ucarecdn.com/182c25f1-cf02-4fc3-aa7b-c6596121ab96/', '2015-04-06', 'fourth Golden Shoe', 'Three time Ballon dâ€™Or winner Cristiano Ronaldo says he prefers winning the Golden Shoe award for scoring goals rather than being the best player in the World, ', 1, '2018-12-04 15:32:13'),
(124, 'cristiano', 'https://ucarecdn.com/7dc2d733-f92c-4711-a2ec-c8a5f064d168/', '2016-02-23', 'Euro 2016', 'Portugal\'s Cristiano Ronaldo defended after Euro 2016 final behaviour', 0, '2018-12-04 07:25:13'),
(125, 'cristiano', 'https://ucarecdn.com/9714fa63-2a14-485c-ba16-68dfc7ecc36f/', '2016-03-05', 'Portugal', 'Ederâ€™s extra-time goal sees Portugal crowned Euro 2016 champions despite loss of Cristiano Ronaldo to injury.', 0, '2018-12-04 07:32:35'),
(126, 'cristiano', 'https://ucarecdn.com/c0f402d7-0a7b-4691-9385-5a3c9caec526/', '2016-08-08', 'Champion League 2016', 'Champions League 2016/17: HÃ£y gá»i Ronaldo lÃ  huyá»n thoáº¡i', 0, '2018-12-04 07:35:02'),
(127, 'cristiano', 'https://ucarecdn.com/6dd855f1-f169-483d-9945-9eb2c49a193c/', '2017-07-07', 'Real Madrid won the Champions League', 'Cristiano Ronaldo celebrates after Real Madrid won the Champions League title. Credit Glyn Kirk/Agence France-Presse â€” Getty Images', 2, '2018-12-07 04:46:07'),
(128, 'cristiano', 'https://ucarecdn.com/8210b9f2-d6a1-4710-ad76-edd76e030b37/', '2017-09-05', ' 5 trofi Ballon', 'Cristiano Ronaldo memamerkan 5 trofi Ballon d`Or miliknya sebelum berlaga melawan Sevilla.', 1, '2018-12-06 17:52:54'),
(129, 'cristiano', 'https://ucarecdn.com/373471a1-88dd-4860-90c5-412e450f2fa1/', '2018-09-05', 'transfer Juventus ', 'Cristiano Ronaldo to Juventus unveiling LIVE updates: Ronaldo set to discuss Â£105million transfer', 2, '2018-12-12 08:00:36'),
(130, 'cristiano', 'https://ucarecdn.com/2da6ab0f-a611-47ec-954b-5f2a26b6ee49/', '2018-11-09', 'Juventus - Valencia', 'Juventus - Valencia: Ronaldo rá»±c sÃ¡ng Ä‘oáº¡t vÃ© knock-out sá»›m ', 3, '2018-12-12 08:00:24'),
(131, 'justinbieber', 'http://www3.pictures.zimbio.com/pc/Justin+Bieber+Justin+Bieber+Heathrow+Airport+yFDeVtwQchPl.jpg', '1998-10-13', 'London Heathrow Airport', 'Two days after turning 17 and flipping off a photographer', 42, '2018-02-18 00:31:26'),
(132, 'justinbieber', 'https://www.billboard.com/files/styles/article_main_image/public/media/justin-bieber-bb35-2015-billboard-06-650.jpg', '2007-10-23', 'No. 1 arrival of his album Purpose', 'No. 1 arrival of his album \"Purpose\" and record week on the Hot 100, Bieber holds atop the Artist 100', 107, '2018-12-12 05:44:35'),
(133, 'justinbieber', 'https://hindi.filmipop.com/wp-content/uploads/2017/02/justin.jpg', '2011-01-13', 'Justin Bieber India Concert Varun Dhawan', 'May Perform Tickets Price is 76000 Rupees', 85, '2018-12-12 05:44:30'),
(134, 'justinbieber', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTlXggHpJCMk5redNi1lWVxtpuIQMjw-GYI8w7PgPRmJEMlui0O', '2015-07-02', 'Arthur Christmas Version', 'Justin Bieber - Santa Claus Is Coming To Town', 66, '2018-12-12 05:44:28'),
(135, 'nguyenquanghai', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9ifyZguV7VOtWVc4FxVRQ9Yj9lrjzFJ1jQzUnagt9kpinlHRk', '2014-01-07', 'Nguy?n Quang H?i FC shared a link', 'face', 102, '2018-01-30 12:02:56'),
(136, 'nguyenquanghai', 'https://znews-photo.zadn.vn/w660/Uploaded/OFH_ftqftma2/2018_01_14/U23_Viet_Nam_Quang_Hai.jpg', '2017-02-23', 'Th?ng kê c?a Qu? bóng ??ng Vi?t Nam 2017', ' Nguy?n Quang H?i trong tr?n g?p U23 Australia', 201, '2017-02-23 15:02:03'),
(137, 'nguyenquanghai', 'https://kenh14cdn.com/2018/8/8/hai-2-1533666256390510142581-1533666869720237561760.png', '2018-08-14', 'luyen tap', 'luyen tap sau ky nghi duong', 20, '2018-07-04 03:00:03'),
(138, 'nguyenquanghai', 'https://motthegioi.vn/media/nguyenhuy/12_09_2018/MV9ETUhfOTY1Nl9RdWFuZ0hhaQ==.jpg', '2017-06-30', 'Hà N?i FC ch?t xong t??ng lai', 's? ti?p t?c ? l?i CLB Hà N?i ít nh?t là t?i cu?i mùa gi?i 2019', 300, '2018-06-05 15:03:48'),
(139, 'vladimirputin', 'https://i.chzbgr.com/full/5125523712/h15395BFB/', '2003-06-11', 'actors child', 'actors macaulay culkin political politicians russia russian Vladimir Putin young youth', 304, '2005-03-06 11:14:05'),
(140, 'vladimirputin', 'data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxIQEhUSERIVFRUVEA8PDw8QEA8PDw8PFRUWFhUSFRUYHSggGBolGxUVITEhJSkrLi4uFx8zODMtNygtLisBCgoKDg0OFw8QFysdFx0tKy0tKy0tLSsrLS0tLSsrLSsrLS0tLS0rKzctNy03Ky0tNy0tLTctKystLSstKysrK//AABEIAOEA4AMBIgACEQEDEQH/', '1965-10-07', 'Birthday', 'mvsnuoajvdsjk', 90, '2016-10-07 02:56:22'),
(141, 'vladimirputin', 'https://www.cheatsheet.com/wp-content/uploads/2017/11/Russias-President-Vladimir-Putin-and-hi-640x426.jpg', '2014-11-23', 'About Vladimir Putins', 'Everything We Know About Vladimir Putins 2 Mysterious Daughters (and the Young Child Who Some Say Is His)', 501, '2018-12-07 05:52:55'),
(142, 'vladimirputin', 'https://thenypost.files.wordpress.com/2014/09/532782157.jpg?quality=90&strip=all&w=618&h=410&crop=1', '2009-01-30', 'New York Post', 'Missing Putin in Switzerland for birth of love child', 221, '2018-04-13 20:30:35'),
(143, 'vladimirputin', 'http://archive.government.ru/media/2008/12/25/10855/photolenta_big_photo.jpeg', '2006-07-01', 'Official Website of the Government', 'Prime Minister Vladimir Putin met with the builders and doctors of the Federal Scientific Clinical Centre', 189, '2010-03-26 06:28:32'),
(144, 'billgate', 'https://myhero.com/images/guest/g285052/hero107070/Young-Bill-Gates.jpg', '2013-10-01', 'My hero', 'Bill Gates is known for his intelligence which led to huge technological advancements in computer software', 57, '2018-12-07 05:08:00'),
(145, 'billgate', 'http://img.timeinc.net/time/photoessays/2008/10_microsoft/drop_out.jpg', '1983-11-10', 'Bill Gates Founds the Company', 'As the middle child and only son of Seattle lawyer William H. Gates Sr. and Mary Gates, a board member of the United Way, William Gates III became the co-founder of Microsoft, one of the richest men in the world and the purveyor of the operating system Windows', 168, '2000-10-16 14:56:37'),
(146, 'billgate', 'https://www.biography.com/.image/t_share/MTQ1NDY3Njg2OTY3NTg0NTI5/bill-gates---mini-biography.jpg', '1987-10-13', 'became a billionaire', 'Over time, the companys stock increased in value and split numerous times. In 1987, Bill Gates became a billionaire when the stock hit $90.75 a share.', 653, '2001-07-21 03:02:34'),
(147, 'billgate', 'https://starschanges.com/wp-content/uploads/2016/11/bill-gates-family-1.jpg', '1990-03-15', 'My family', 'sazccsacxzc', 230, '2007-06-23 05:30:45'),
(148, 'billgate', 'https://starschanges.com/wp-content/uploads/2016/11/bill-gates-family-father-bill-gates-sr.jpg', '1975-07-21', 'Bill Gates’ parents', 'William Henry Gates or Bill Gates, Sr (father, born 1925) and Mary Maxwell Gates (mother, born 1931- died 1994)', 523, '0000-00-00 00:00:00'),
(149, 'billgate', 'https://starschanges.com/wp-content/uploads/2016/11/bill-gates-family-sister-Kristianne-Gates-Blake.jpg', '1989-05-16', 'Bill Gates siblings', 'Kristianne Gates Blake', 311, '2002-03-24 12:19:32'),
(150, 'billgate', 'https://starschanges.com/wp-content/uploads/2016/11/bill-gates-family-wife-melinda.jpg', '1998-02-08', 'Bill Gates’ spouse', 'Melinda Gates (born 1964, married to Bill since 1994)', 258, '2005-06-07 10:15:30'),
(151, 'billgate', 'https://starschanges.com/wp-content/uploads/2016/11/bill-gates-family-children-daughter-Jennifer-Katharine-Gates.jpg', '2013-10-10', 'Bill Gates’ children', 'Bill Gates’ eldest daughter Jennifer Katharine Gates (born 1996)', 902, '2018-12-07 05:07:58'),
(152, 'billgate', 'https://starschanges.com/wp-content/uploads/2016/11/bill-gates-family-children-son-Rory-and-Phoebe.jpg', '2009-11-18', 'mY son', 'Bill Gates’ son – Rory John Gates (born May 23, 1999)', 653, '2001-07-21 03:02:34'),
(153, 'nickvujicic', 'https://i2.wp.com/2.bp.blogspot.com/-6B5YDl0xRXs/TcpQx1-E2WI/AAAAAAAACxA/JNzQLJGcOtE/s1600/nick_vujicic_01.jpg', '1987-12-28', 'Nick Vujicic in Childhood', 'Boris Vujicic, father of Nick Vujicic narrated the story of the birth of his exceptional child in his book entitled, Raising the Perfectly Imperfect Child: Facing the Challenges with Strength, Courage, and Hope', 621, '2008-04-12 08:16:17'),
(154, 'nickvujicic', 'https://i1.wp.com/ashrafchaudhryblog.com/wp-content/uploads/2011/05/boris-vujicic.jpg?w=720', '2008-06-06', 'Family', 'Nick Vujicic’s Family Photo with Parents', 782, '2013-10-20 09:19:45'),
(155, 'nickvujicic', 'https://i.pinimg.com/originals/de/33/af/de33afa63bcf9b2540123bfa72ba9d41.jpg', '1989-04-03', 'Nick Vujicic as a child', 'Nick Vujicic as a child. Wow! What a determined spirit.', 461, '2018-12-07 09:33:23'),
(156, 'nickvujicic', 'https://vietnameselanguage.files.wordpress.com/2013/05/nick1.jpg', '2013-05-23', 'in Viet Nam', 'Australian motivational speaker Nick Vujicic addresses more than 20,000 people at Hà N?i’s M? ?ình stadium', 783, '2017-05-23 00:16:44'),
(157, 'nickvujicic', 'https://myhero.com/images/guest/g291210/hero112662/ccc7838527e5da2123a9fc39.jpg', '1985-07-08', 'Who is hero?', 'Hero is a veteran who fought for his birthplace, an astronaut, a firefighter who saved thousands of lives or just a kind and brave man who makes a lot of valiant feats', 186, '2010-07-08 03:20:23'),
(158, 'nickvujicic', 'https://myhero.com/images/guest/g291210/hero112662/NV11-300x237.jpg', '1984-12-04', 'infomation', 'Nicholas James Vujicic was born in 1982 in Melbourne, Australia', 1686, '2018-12-12 08:03:51'),
(159, 'nickvujicic', 'https://lagniappemobile.com/wp-content/uploads/2014/11/cover-1170x1129.jpg', '2014-11-12', 'my wife', 'COVER STORY: Man without limbs inspires loving ‘without limits’', 365, '2016-11-12 14:22:23'),
(160, 'nickvujicic', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS9wMJCYpSCNK9WwL-tzVUFgZndwGsN-d_X2t8aedzP-jOYrYa6', '2017-05-06', 'beach trip', 'Limbless Evangelist Nick Vujicic blessed with twin daughters ahead of Christmas', 340, '2017-05-06 11:16:49'),
(161, 'markzuckerberg', 'http://www.sanfranciscosentinel.com/wp-content/uploads/2010/12/zuckerberg-dec-15-4.jpg', '1994-05-14', 'Happy Birthday', 'Zuckerberg was a prankster in his teenage years', 157, '2010-05-14 09:00:03'),
(162, 'markzuckerberg', 'https://amp.businessinsider.com/images/59ea2d109099241f008b5f02-750-563.png', '2010-10-15', 'Bill Gates and Mark Zuckerberg', 'Bill Gates and Mark Zuckerberg, two of the wealthiest and most successful people in the world, both say that reading is integral to their success.', 364, '2018-10-15 02:17:55'),
(163, 'markzuckerberg', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR58m2aOc7-2tbpkEFwtx75YXvaQ0pBzHMn1ai671LdpVcNNEI5', '2005-03-21', 'Facebook owner Mark Zuckerberg', 'The Facebook CEO wrote Thursday that the couple will be welcoming another daughter.', 578, '2015-03-21 05:21:14'),
(164, 'markzuckerberg', 'https://fm.cnbc.com/applications/cnbc.com/resources/img/editorial/2017/05/26/104494833-GettyImages-688400216.1910x1000.jpg', '2017-08-06', 'Finding your purpose isnt enough', 'Im here to tell you finding your purpose isnt enough. The challenge for our generation is creating a world where everyone has a sense of purpose', 361, '2018-12-07 05:09:14'),
(165, 'markzuckerberg', 'http://allaboutnickvujicic.weebly.com/uploads/2/4/4/7/24473459/835654584.jpg', '2000-10-01', 'Mark Zuckerbergs Life', 'Mark Zuckerberg, Zuckerberg, Zuckerberg photo, facebook, Zuckerberg story, facebook story', 865, '2016-09-30 22:15:58'),
(166, 'markzuckerberg', 'https://www.reckontalk.com/wp-content/uploads/2015/10/Mark-Zuckerbergs-Life-In-Photos-13.jpg', '1985-05-14', 'Mark Zuckerberg as a toddler', 'Mark Zuckerberg as a toddler', 751, '2011-05-13 18:15:06'),
(167, 'markzuckerberg', 'https://www.reckontalk.com/wp-content/uploads/2015/10/Mark-Zuckerbergs-Life-In-Photos-2.jpg', '2000-08-26', 'the uber-exclusive New Hampshire prep school', 'Zuckerberg at his high school graduation', 186, '2010-08-26 15:36:48'),
(168, 'markzuckerberg', 'https://www.reckontalk.com/wp-content/uploads/2015/10/Mark-Zuckerbergs-Life-In-Photos-3.jpg', '1997-09-09', 'brother', 'Zuckerberg (far left) and his Harvard dorm roommates.', 668, '2009-09-08 23:25:59'),
(170, 'justinbieber', 'https://i.ytimg.com/vi/yJc0vfGxe2o/hqdefault.jpg', '1994-10-10', 'chidhood', 'when I am 1 years old', 100, '2018-12-01 09:24:29'),
(171, 'justinbieber', 'http://www.snakkle.com/wp-content/uploads/2012/02/justin-bieber-young-baby-portrait-photo-GC.jpg', '0000-00-00', 'Baby', 'Justin Bieber as a Baby', 100, '2018-12-01 09:24:29'),
(172, 'justinbieber', 'https://i.pinimg.com/736x/54/e1/c7/54e1c71256d332eebbc390df36561c0f--justin-bieber-birthday-justin-bieber-smile-cute.jpg', '0000-00-00', 'Justin Bieber As A Baby', 'In these Cute Pictures! Justin Bieber just recently turned 21-years-old and I bet it feels just like yesterday', 100, '2018-12-01 09:24:29'),
(173, 'justinbieber', 'http://www4.pictures.zimbio.com/bg/Megamind+Premiere+b2k_Pczq4Xnl.jpg', '2000-10-10', '2,000 Fans', 'Justin Bieber Signs New Book for 2,000 Fans in NYC', 100, '2018-12-01 09:24:29'),
(174, 'justinbieber', 'http://justinbiebermusicvideo.com/wp-content/uploads/2010/04/justin-bieber-miami-monday.jpg', '2001-10-10', 'justin-bieber-miami-monday', 'justin-bieber-miami-monday', 100, '2018-12-01 09:24:29'),
(175, 'justinbieber', 'http://chl-wordpress-uploads.s3.amazonaws.com/ohl/app/uploads/2015/11/30105518/MurrayJustin0555.jpg', '2002-10-10', 'hoockey', 'study hoockey', 100, '2018-12-01 09:24:29'),
(176, 'justinbieber', 'https://i.ytimg.com/vi/UPkihQjxups/hqdefault.jpg', '2003-10-10', 'sport', 'football', 100, '2018-12-01 09:24:29'),
(177, 'justinbieber', 'http://4.bp.blogspot.com/-2I-ZyC5fCkI/Tca4SoniwoI/AAAAAAAAAms/yERA0Q7PZiI/s640/justin-bieber%252525252525252Bbaby%25252525252Bjustin%25252525252Bbieber%252525252525252Bjustin%25252525252Bbieber%25252525252B2011-justin%25252525252Bbieber%25252525252Blyrics', '2004-10-10', 'Popular celebrity photos: justin bieber update', 'Popular celebrity photos: justin bieber update', 100, '2018-12-01 09:24:29'),
(178, 'justinbieber', 'https://i.ytimg.com/vi/ueLPOS48Il8/hqdefault.jpg', '2005-10-10', 'programming', 'live show', 101, '2018-12-01 09:24:29'),
(179, 'justinbieber', 'http://www3.pictures.zimbio.com/gi/Jordin+Sparks+Justin+Bieber+Z100+Jingle+Ball+bVBltdV4dqbl.jpg', '2009-10-10', 'Jordin Sparks and Justin Bieber', 'Jordin Sparks Justin Bieber Photos - Jordin Sparks and Justin Bieber perform onstage during Z100s Jingle Ball 2009 at Madison Square Garden', 100, '2018-12-01 09:24:29'),
(180, 'justinbieber', 'http://media3.s-nbcnews.com/j/ap/2010%20ama%20awards%20show-1742298961_v2.grid-4x2.jpg', '2010-10-10', 'Its Biebers night at American Music Awards', 'Justin Bieber is the top winner at Sunday nights American Music Awards, capturing four trophies including favorite artist.', 100, '2018-12-01 09:24:29'),
(181, 'justinbieber', 'http://www2.pictures.zimbio.com/gi/Justin+Bieber+2011+Billboard+Music+Awards+tp9gWBYgKysl.jpg', '2011-10-10', '2011 Billboard Music Awards', 'Singer Justin Bieber poses in the press room with the Digital Artist of the Year award during the 2011 Billboard Music Awards at the MGM Grand Garden Arena May 22, 2011 in Las Vegas, Nevada.', 100, '2018-12-01 09:24:29'),
(182, 'justinbieber', 'http://www4.pictures.zimbio.com/gi/Justin+Bieber+2012+Billboard+Music+Awards+JgcioBJDBMil.jpg', '2012-10-10', 'Best and Worst of the 2012 Billboard Music Awards', 'Even with the passing of two music legends this week, the show went on in Las Vegas for the 2012 Billboard Music Awards, honoring musics biggest chart toppers of today.', 100, '2018-12-01 09:24:29'),
(183, 'justinbieber', 'https://sslh.ulximg.com/image/740x493/cover/1536767811_886830ca0af74f67a15f20501abf41cf.jpg/9106f74a93df4df04837eab19bfdfe56/1536767811_6a26ac39b523f498c979478f0c2bd3b0.jpg', '2014-10-10', 'Scooter Braun Seriously Believed Justin Bieber Would Die From A Drug Overdose', 'Over the years, Justin Bieber has gone through an incredible transformation before our very eyes. He started out as a kid from a small town in Canada, playing his guitar on the steps of Stratford coffee shops to a globally known superstar. In between, hes struggled and thrived but many remember a time where he seemed to be in the news every day for his foolish behavior.', 100, '2018-12-01 09:24:29'),
(184, 'justinbieber', 'https://i.pinimg.com/236x/50/ea/40/50ea40749d7d410e47c84c2d087afe38--justin-bieber-pictures-justin-bieber-news.jpg', '2016-10-10', 'magazine', 'https://www.pinterest.com/miraclepitch/203-justin-bieber/', 100, '2018-12-01 09:24:29'),
(185, 'justinbieber', 'https://media.extratv.com/2018/02/22/justin-bieber-getty-510x600.jpg', '2018-10-10', 'sport', 'There is a Baby Bieber on the Way! Justin Is Going to Be a Big Brother Again', 101, '2018-12-01 09:24:29'),
(186, 'nguyenquanghai', 'https://www.tangchieucao.net/images/upload/tin-tuc/chieu-cao-cua-tien-ve-nguyen-quang-hai-hinh1(1).jpg', '2005-05-01', 'dat giai bong da', 'lan dau nhan giai', 100, '2018-12-01 09:24:29'),
(187, 'nguyenquanghai', 'https://image2.tin247.com/pictures/2018/08/28/ytj1535398309.png', '2011-05-01', 'chan thuong', 'nhung tran dau kho khan', 100, '2018-12-01 09:24:29'),
(188, 'nguyenquanghai', 'https://kenh14cdn.com/2018/1/30/3nhanhchongnhom23cauthuu23vietnamchaytoigattuyettaokhoangtrongchoquanghaidattraibong-1517287458249513454701.jpg', '2013-05-01', 'khoc liet', 'da co gang het suc, khong con gi de hoi tiec', 100, '2018-12-01 09:24:29'),
(189, 'nguyenquanghai', 'https://kenh14cdn.com/2018/capture-1516023153465.jpg', '2015-05-01', 'di choi', 'lâu lau di choi xa hoi', 100, '2018-12-01 09:24:29'),
(190, 'nguyenquanghai', 'https://nguoinoitieng.tv/images/nnt/97/0/bco8.jpg', '2016-05-01', 'tuong lai', 'co gang vi tuong lai', 100, '2018-12-01 09:24:29'),
(191, 'nguyenquanghai', 'https://media.thethao247.vn/upload/kienlv/2018/09/12/hlv-park-hang-seo-con-nhung-ai-cho-sea-games-20191536723402.jpg', '2017-05-01', 'chien thang', 'vaoooooooooo', 100, '2018-12-01 09:24:29'),
(192, 'nguyenquanghai', 'https://znews-photo.zadn.vn/w660/Uploaded/ofh_nuottuqz/2018_12_06/hai2.jpg', '2018-05-01', 'AFF cup', 'Trên Fox Sports Asia, chuyên gia bóng', 100, '2018-12-12 06:00:57'),
(193, 'vladimirputin', 'http://www.ticketsofrussia.ru/photos/gov/putin/school2.jpg', '1960-07-07', 'YOUTH - President Putin', 'YOUTH - President Putin', 100, '2018-12-01 09:24:29'),
(194, 'vladimirputin', 'http://bio-astrology.com/wp-content/uploads/2017/07/31-Himmler-1907-Putin-1965-10.jpg', '1965-07-07', 'Bio-Astrology', 'Vladimir Putin 1965', 100, '2018-12-01 09:24:29'),
(195, 'vladimirputin', 'https://i.pinimg.com/236x/cb/27/55/cb2755663153f80b454c4a4e689d0cae--film-black-vladimir-putin.jpg', '1970-07-07', 'Friend', 'A reproduction of a photograph made in the or Vladimir Putin (left) at a friends dacha', 100, '2018-12-01 09:24:29'),
(196, 'vladimirputin', 'https://photo-1-baomoi.zadn.vn/w1000_r1/17/08/04/94/22927407/7_46007.jpg', '1975-07-07', 'military', 'military', 100, '2018-12-01 09:24:29'),
(197, 'vladimirputin', 'https://upload.wikimedia.org/wikipedia/commons/2/2f/Vladimir_Spiridonovich_Putin.jpg', '1980-07-07', 'ABC', 'Putin is parents, Vladimir Spiridonovich Putin and Maria Ivanovna Putina (née Shelomova)', 100, '2018-12-01 09:24:29'),
(198, 'vladimirputin', 'https://i.pinimg.com/originals/20/16/97/2016971dae5dab13d71d84a1f8a9e875.jpg', '1985-07-07', 'my chidren', 'babe babe', 100, '2018-12-01 09:24:29'),
(199, 'vladimirputin', 'https://upload.wikimedia.org/wikipedia/commons/2/2e/Vladimir_Putin-4-crop.jpg', '1990-07-07', 'best', 'best', 100, '2018-12-01 09:24:29'),
(200, 'vladimirputin', 'https://upload.wikimedia.org/wikipedia/commons/thumb/d/d8/Vladimir_Putin_31_December_1999-3.jpg/170px-Vladimir_Putin_31_December_1999-3.jpg', '1999-07-07', 'meeting', 'meeting', 100, '2018-12-01 09:24:29'),
(201, 'vladimirputin', 'https://i.redd.it/1fbvlt69shw01.jpg', '2000-07-07', 'On this day 18 years ago', 'On this day 18 years ago, Vladimir Putin was inaugurated as the President of the Russian Federation.', 101, '2018-12-01 09:24:29'),
(202, 'vladimirputin', 'https://upload.wikimedia.org/wikipedia/commons/b/b3/Maurice_Druon_Vladimir_Putin_-_12_February_2003.jpg', '2003-02-12', 'Maurice Druon Vladimir Putin', 'https://commons.wikimedia.org/wiki/File:Maurice_Druon_Vladimir_Putin_-_12_February_2003.jpg', 100, '2018-12-01 09:24:29'),
(203, 'vladimirputin', 'https://images.indianexpress.com/2018/10/putin-1.jpg', '2005-07-07', 'Russia Is in the Middle East to Stay', 'Vladimir Putin in front of a map of Arab countries', 100, '2018-12-01 09:24:29'),
(204, 'vladimirputin', 'https://media.vanityfair.com/photos/54ca8fc67e4b004120bb223c/master/w_768,c_limit/image.jpg', '2007-07-07', 'Vladimir Putin and Mikhail Khodorkovsky', 'Vladimir Putin, now seeking to return to the presidency for a third term, at his dacha in 2007.', 100, '2018-12-01 09:24:29'),
(205, 'vladimirputin', 'https://i.pinimg.com/originals/d4/64/ba/d464ba9d20ae5c3da9ff1caff61a8add.jpg', '2009-07-07', 'meeting', 'Russian Prime Minister Vladimir Putin speaks at the Semper Opera Ball', 100, '2018-12-01 09:24:29'),
(206, 'vladimirputin', 'http://footage.framepool.com/shotimg/qf/415357320-vladimir-putin-prime-minister-interview-media-moscow.jpg', '2010-07-07', '# 415-357-320', 'SD Rights Managed Stock Footage ', 100, '2018-12-01 09:24:29'),
(207, 'vladimirputin', 'https://cdn.cnn.com/cnnnext/dam/assets/110924095024-putin-medvedev-horizontal-large-gallery.jpg', '2011-07-07', 'Russia is Medvedev backs Putin', 'The Russian president and prime minister pictured at the tomb of the unknown soldier ', 100, '2018-12-01 09:24:29'),
(208, 'vladimirputin', 'https://i.dailymail.co.uk/i/pix/2016/07/29/13/36A3676D00000578-3714527-Vladimir_Putin_wanted_to_meet_Donald_Trump_at_the_2013_Miss_Univ-m-72_1469795690434.jpg', '2013-07-07', 'Vladimir Putin begged to meet Donald Trump', 'Vladimir Putin wanted to meet Donald Trump at the 2013 Miss Universe pageant but their plans', 100, '2018-12-01 09:24:29'),
(209, 'vladimirputin', 'http://klankosova.tv/wp-content/uploads/2018/10/1-198.jpg', '2014-07-07', 'Putin ordered plane to be downed in 2014', 'Putin ordered plane to be downed in 2014', 100, '2018-12-01 09:24:29'),
(210, 'vladimirputin', 'https://www.livemint.com/rf/Image-621x414/LiveMint/Period1/2013/12/25/Photos/Putin--621x414.jpg', '2015-07-07', 'New post-Soviet union by 2015	', 'Creation of a post-Soviet economic union, which could one day even be joined', 100, '2018-12-01 09:24:29'),
(211, 'vladimirputin', 'http://thanhtra.com.vn/portals/0/news_images/2018/03/khaithacanh/fbl_rus_wc_2018_tour_844842056_4590_8930_1522197538_hrqd.jpg', '2018-07-07', 'Russia president Putin says 2018 World Cup', 'Russia president Putin says 2018 World Cup venues on track despite delays', 100, '2018-12-01 09:24:29'),
(212, 'billgate', 'http://3.bp.blogspot.com/-LpwanAXuib0/VaKar8euBdI/AAAAAAAAAAs/2jHor35LvKs/s1600/rubella.jpg', '1970-05-13', 'babe', 'babe', 100, '2018-12-01 09:24:29'),
(213, 'billgate', 'https://i.redd.it/m7v8nfs1agax.jpg', '1980-05-06', '1980', '1980', 100, '2018-12-01 09:24:29'),
(214, 'billgate', 'https://zdnet4.cbsistatic.com/hub/i/2014/08/29/b9bfa3b4-2f2a-11e4-9e6a-00505685119a/83c0fc23946d39ee69bb1437076e0c8e/40151704-2-early-90s-casual.jpg', '1990-05-06', 'Photos of the month', 'Iphone2 mini laptop', 100, '2018-12-01 09:24:29'),
(215, 'billgate', 'https://s.abcnews.com/images/ThisWeek/abc_TWIH_Bill_Gates_100613_wmain.jpg', '1993-01-03', 'Microsofts', 'Microsofts Bill Gates on This Week on January 3, 1993', 100, '2018-12-01 09:24:29'),
(216, 'billgate', 'https://i.ytimg.com/vi/WaacDO17Mx4/maxresdefault.jpg', '1995-05-06', 'windown', 'windown software', 100, '2018-12-01 09:24:29'),
(217, 'billgate', 'http://coretansimple.files.wordpress.com/2011/07/bill-gates.jpg', '1997-05-06', 'Bill Gates Success Story', 'Bill Gates Success Story', 100, '2018-12-01 09:24:29'),
(218, 'billgate', 'https://timedotcom.files.wordpress.com/2018/01/180117-bill-gates-ceo-microsoft.jpg', '1999-05-06', 'Bill Gates Net Worth', 'Microsoft Chairman Bill Gates addresses the participants of a computer camp at Carleton University in Ottawa', 100, '2018-12-01 09:24:29'),
(219, 'billgate', 'https://upload.wikimedia.org/wikipedia/en/thumb/e/e2/The_Road_Ahead_%28Bill_Gates_book%29.jpg/220px-The_Road_Ahead_%28Bill_Gates_book%29.jpg', '2003-05-06', 'the road ahead', 'the road ahead', 100, '2018-12-01 09:24:29'),
(220, 'billgate', 'https://cdn.lifehack.org/wp-content/uploads/2014/10/bill-gates-finished1.jpg', '2005-05-06', '10 Books', '10 Books That Bill Gates Wants You to Read to Become as Successful as Him', 100, '2018-12-01 09:24:29'),
(221, 'billgate', 'https://fm.cnbc.com/applications/cnbc.com/resources/img/editorial/2018/04/09/105119253-YoungBillGates-GettyImages-627710450.1910x1000.jpg', '2007-05-06', 'young', 'when I am student', 100, '2018-12-01 09:24:29'),
(222, 'billgate', 'http://archive.fortune.com/assets/i2.cdn.turner.com/money/2009/06/18/magazines/fortune/best_advice_bill_gates.fortune/gates_gates.03.jpg', '2009-05-06', 'friend', 'take a photo', 100, '2018-12-01 09:24:29'),
(223, 'billgate', 'http://vnreview.vn/image/17/34/04/1734044.jpg', '2011-05-06', 'ABC', 'XYZ', 100, '2018-12-01 09:24:29'),
(224, 'billgate', 'http://media.vietq.vn/files/thatbaibillgates1.jpg', '2012-05-06', 'title', 'It is fine to celebrate success but it is more impotant to heed the lessons  of failure', 100, '2018-12-01 09:24:29'),
(225, 'billgate', 'https://images.techhive.com/images/article/2014/03/160316913-100255750-primary.idge.jpg', '2013-05-06', 'Bill Gates 2013 Germany', 'Bill Gates sells $925M in Microsoft stock', 100, '2018-12-01 09:24:29'),
(226, 'billgate', 'http://www.pcworld.com.vn/files/articles/2011/1226264/bill-gates1.jpg', '2014-05-06', 'BITCON', 'Bill Gates in 2014: Bitcoin is better than currency', 100, '2018-12-01 09:24:29'),
(227, 'billgate', 'https://znews-photo.zadn.vn/w660/Uploaded/Ngtmtz/2015_02_21/BillGates1.png', '2015-05-06', 'asset', 'asset', 100, '2018-12-01 09:24:29'),
(228, 'billgate', 'https://static01.nyt.com/images/2016/01/04/fashion/04GATESQA/04GATESQA-facebookJumbo.jpg', '2016-05-06', 'news', 'Bill Gates on Books and Blogging ', 100, '2018-12-01 09:24:29'),
(229, 'billgate', 'https://dantricdn.com/2017/bill-gates-1492820855082.jpg', '2017-05-06', 'my family', 'my family', 100, '2018-12-01 09:24:29'),
(230, 'billgate', 'https://cdn.tuoitre.vn/thumb_w/640/2018/3/28/29594950101553534688619611406657315281690789n-152222427100644384216.jpg', '2018-05-06', 'my children', 'my children', 100, '2018-12-01 09:24:29'),
(231, 'NickVujicic', 'https://media-ak.static-adayroi.com/sys_master/h0b/h58/9607696744478.jpg', '2007-03-19', 'book', 'book', 100, '2018-12-01 09:24:29'),
(232, 'NickVujicic', 'https://salt.tikicdn.com/cache/550x550/media/catalog/product/0/0/004.u2377.d20160614.t140746.jpg', '2012-03-19', 'book', 'book', 100, '2018-12-01 09:24:29'),
(233, 'NickVujicic', 'https://sachvui.com/cover/2017/dung-day-manh-me.jpg', '2014-03-19', 'book', 'book', 100, '2018-12-01 09:24:29'),
(234, 'NickVujicic', 'https://m.media-amazon.com/images/I/513MYzsKkXL._SL500_.jpg', '2012-07-19', 'book', 'book', 100, '2018-12-01 09:24:29'),
(235, 'NickVujicic', 'https://m.media-amazon.com/images/I/51rduA-D3-L._SL320_.jpg', '2018-03-19', 'book', 'book', 101, '2018-12-01 09:24:29'),
(236, 'NickVujicic', 'https://g.christianbook.com/dg/product/cbd/f450/426765.jpg', '2014-09-19', 'book', 'book', 100, '2018-12-01 09:24:29'),
(237, 'NickVujicic', 'https://d1w7fb2mkkr3kw.cloudfront.net/assets/images/book/lrg/9781/7433/9781743318676.jpg', '2013-03-19', 'book', 'book', 101, '2018-12-01 09:24:29'),
(238, 'NickVujicic', 'https://images-na.ssl-images-amazon.com/images/I/61mLuO71AgL._SX258_BO1,204,203,200_.jpg', '2010-03-19', 'book', 'book', 100, '2018-12-01 09:24:29'),
(239, 'NickVujicic', 'http://1.bp.blogspot.com/-ommFh7cUcDI/Vgl764xsqFI/AAAAAAAAAWw/w38KRe2OKdQ/s1600/11849338_906379609449798_2090051923_n.jpg', '2015-03-19', 'book', 'book', 100, '2018-12-01 09:24:29'),
(240, 'NickVujicic', 'http://goodnewsfl.org/wp-content/uploads/2014/12/Nick-Vujicic.jpg', '2016-03-19', 'book', 'child', 100, '2018-12-01 09:24:29'),
(241, 'NickVujicic', 'https://makemindpowerful.com/wp-content/uploads/2016/07/20160801_111232-e1470021784549-169x300.jpg', '2017-03-19', 'book', 'book', 100, '2018-12-01 09:24:29'),
(242, 'MarkZuckerberg', 'http://images.ndh.vn/Images/Uploaded/Share/2016/06/01/6b0CEO-Facebook-Mark-Zuckerberg-1.jpg', '1984-10-04', 'life', 'life', 101, '2018-12-01 09:24:29'),
(243, 'MarkZuckerberg', 'https://s3.amazonaws.com/tracxnblog/wp-content/uploads/2017/05/Feature-image-1.jpg', '1997-10-04', 'life', 'life', 100, '2018-12-01 09:24:29'),
(244, 'MarkZuckerberg', 'https://static.businessinsider.com/image/54d3fb7feab8eab654e342f1/image.jpg', '2001-10-04', 'life', 'life', 100, '2018-12-01 09:24:29'),
(245, 'MarkZuckerberg', 'https://iluminasi.com/img/upload/mark-tiba-di-pejabat-pukul-10-30-pagi.jpg', '2002-10-04', 'life', 'life', 100, '2018-12-01 09:24:29'),
(246, 'MarkZuckerberg', 'http://archive.fortune.com/assets/i2.cdn.turner.com/money/galleries/2012/technology/1205/gallery.mark-zuckerberg-through-years.fortune/images/Harvard1.jpg', '2003-10-04', 'life', 'Mark Zuckerberg through the years', 100, '2018-12-01 09:24:29'),
(247, 'MarkZuckerberg', 'https://i.ytimg.com/vi/vW7f3wiNhcc/maxresdefault.jpg', '2004-10-04', 'life', 'The Facebook - Mark Zuckerberg first interview (2004)', 100, '2018-12-01 09:24:29'),
(248, 'MarkZuckerberg', 'https://images.techhive.com/images/article/2015/05/mark_zuckerberg_lecturing-620x465-100584775-primary.idge.jpg', '2005-10-04', 'life', 'Mark Zuckerberg lecturing Harvard is CS50 in 2005', 100, '2018-12-01 09:24:29'),
(249, 'MarkZuckerberg', 'https://cdn.cnn.com/cnnnext/dam/assets/120514105329-simon-mark-zuckerberg-intv-2006-00022901-horizontal-large-gallery.jpg', '2006-10-04', 'life', 'A look back at Mark Zuckerberg in 2006', 100, '2018-12-01 09:24:29'),
(250, 'MarkZuckerberg', 'https://fortunedotcom.files.wordpress.com/2015/02/ap070205058830.jpg', '2007-10-04', 'life', 'facebook 2007', 100, '2018-12-01 09:24:29'),
(251, 'MarkZuckerberg', 'http://img.timeinc.net/time/2008/time_100_2008/mark_zuckerberg.jpg', '2008-10-04', 'life', 'life', 100, '2018-12-01 09:24:29'),
(252, 'MarkZuckerberg', 'https://cafebiz.cafebizcdn.vn/thumb_w/600/2017/facebook-2-billion-users-fb-e1503501117382-1504066957106-1504574216976.jpg', '2009-10-04', 'life', 'life', 100, '2018-12-01 09:24:29'),
(253, 'MarkZuckerberg', 'https://d13ezvd6yrslxm.cloudfront.net/wp/wp-content/images/zuckerberg.jpg', '2010-10-04', 'life', 'Cannes Lions 2010 names Mark Zuckerberg as Media Person of the Year', 100, '2018-12-01 09:24:29'),
(254, 'MarkZuckerberg', 'https://s2.reutersmedia.net/resources/r/?m=02&d=20110525&t=2&i=422031465&r=2011-05-25T185900Z_01_BTRE74O1GQI00_RTROPTP_0_FRANCE&w=1280', '2011-10-04', 'life', 'Google, Facebook warn on Internet rules', 100, '2018-12-01 09:24:29'),
(255, 'MarkZuckerberg', 'https://i.ytimg.com/vi/5bJi7k-y1Lo/maxresdefault.jpg', '2012-10-04', 'life', 'Mark Zuckerberg at Startup School 2012 ', 100, '2018-12-01 09:24:29'),
(256, 'MarkZuckerberg', 'http://media.bizj.us/view/img/2809161/10011441h1260799*750xx2000-2667-0-0.jpg', '2013-10-04', 'life', 'life', 100, '2018-12-01 09:24:29'),
(257, 'MarkZuckerberg', 'http://7-themes.com/data_images/out/77/7034739-mark-zuckerberg-wallpaper-photos-2014.jpg', '2014-10-04', 'life', 'Mark Zuckerberg Wallpaper Photos 2014', 100, '2018-12-01 09:24:29'),
(258, 'MarkZuckerberg', 'http://images.ndh.vn/Images/Uploaded/Share/2015/01/04/83amark-zuckerberg-330.jpg', '2015-10-04', 'life', 'CEO facebook', 100, '2018-12-01 09:24:29'),
(259, 'MarkZuckerberg', 'https://static.politico.com/dims4/default/4e74060/2147483647/resize/1160x%3E/quality/90/?url=https%3A%2F%2Fstatic.politico.com%2Fc5%2Fe1%2Fe30410cf4796abf6e542455826d2%2F151201-mark-zuckerberg-gty-1160.jpg', '2016-10-04', 'life', '2016 campaign immigration', 100, '2018-12-01 09:24:29'),
(260, 'MarkZuckerberg', 'https://dmxvlyap9srmn.cloudfront.net/production/articles/1887/large_0ccde278-7497-4f82-9e4a-d1ce6d25fc9b.jpg', '2017-10-04', 'life', 'Runner Up for Person of 2017', 100, '2018-12-01 09:24:29'),
(261, 'MarkZuckerberg', 'https://znews-photo.zadn.vn/w660/Uploaded/lce_uxlcq/2018_01_05/_99464907_mediaitem99464906_1.jpg', '2018-10-04', 'life', 'life', 100, '2018-12-01 09:24:29'),
(262, 'cristiano', 'https://ucarecdn.com/620e0c47-1360-4ca9-aad1-77a61eb9e19f/-/preview/-/enhance/31/-/blur/10/-/sharp/5/', '2016-01-23', 'tuuyuortyjr', 'sdfdgfh', 0, '2018-12-12 06:08:50'),
(263, 'tinhphamvan', 'https://ucarecdn.com/4a7a28df-31ba-41b1-8a74-741b74bd71bb/-/preview/-/enhance/17/-/blur/2/-/sharp/11/-/grayscale/', '2014-02-05', 'hihi', 'esrdtfhgjhkj', 1, '2018-12-14 07:53:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `sign_up_date` date NOT NULL,
  `activated` enum('0','1') NOT NULL,
  `bio` text NOT NULL,
  `profile_pic` text NOT NULL,
  `imgurl` text NOT NULL,
  `imgcover1` text NOT NULL,
  `imgcover2` text NOT NULL,
  `imgcover3` text NOT NULL,
  `birthday` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `sign_up_date`, `activated`, `bio`, `profile_pic`, `imgurl`, `imgcover1`, `imgcover2`, `imgcover3`, `birthday`) VALUES
(1, 'tinhphamvan', 'Tinh', 'Pham Van', 'tinhpham0997@gmail.com', '1da9bdf50197762ec1f0e9dc8c02f8be', '2018-11-04', '0', 'When you are fail at some point, no matter', '', 'https://ucarecdn.com/e391723a-5396-4144-b7f8-e21e3fdb3e32/-/crop/795x795/107,165/-/preview/', 'https://ucarecdn.com/fd38014d-6708-490a-a69d-acdb4d1cf5fd/-/crop/960x384/0,256/-/preview/', 'https://ucarecdn.com/1457552a-c384-46f8-b1b2-532b85fa2fa4/-/crop/1600x639/0,134/-/preview/', 'https://ucarecdn.com/42b6d0b4-f8af-4f07-9c9f-608bcc62cced/-/crop/1024x409/0,66/-/preview/', '1997-09-22'),
(3, 'vudinhthuan', 'Vu Dinh', 'Thuan', 'dinhthuanvu@gmail.com', '25f9e794323b453885f5181f1b624d0b', '2018-11-05', '0', '', '', 'https://ucarecdn.com/e5eb1972-62f2-4341-ae15-2cbbd91498d9/-/crop/1370x1374/0,200/-/preview/', '', '', '', '1998-02-02'),
(4, 'cristiano', 'Cristiano', 'Ronaldo', 'efukfheiuif@ujheheif', '1da9bdf50197762ec1f0e9dc8c02f8be', '2018-12-04', '0', 'There is no harm in dreaming of becoming the worldâ€™s best player. It is all about trying to be the best. I will keep working hard to achieve it but it is within my capabilities.', '', 'https://ucarecdn.com/98a4df27-42f5-43d5-88db-e7d88d922226/-/crop/513x514/76,19/-/preview/', 'https://ucarecdn.com/afdf13e1-ff6f-4dd7-a2ca-221d43882702/-/crop/1200x480/0,150/-/preview/', 'https://ucarecdn.com/011fefd8-2b56-4f35-b789-17648ebe1ef2/-/crop/1100x441/0,0/-/preview/', 'https://ucarecdn.com/cba0c977-e669-49fe-800b-026130ab1cc2/-/crop/1920x769/0,32/-/preview/', '1985-02-05'),
(5, 'justinbieber', 'Justin', 'Bieber', 'justinbieber@gmail.com', '1da9bdf50197762ec1f0e9dc8c02f8be', '2018-12-06', '0', '', '', 'https://ucarecdn.com/5cb38f34-b169-4089-bbce-fcec3ea9f1cd/-/crop/871x873/220,0/-/preview/', '', '', '', '0000-00-00'),
(6, 'vladimirputin', 'Vladimir', 'Putin', 'putin@gmail.com', '1da9bdf50197762ec1f0e9dc8c02f8be', '2018-12-06', '0', '', '', 'https://ucarecdn.com/0ea614fe-ec86-44d9-8c84-ff122005f0a0/-/crop/460x460/99,0/-/preview/', '', '', '', '0000-00-00'),
(7, 'billgate', 'Bill', 'Gate', 'billgate@gmail.com', '1da9bdf50197762ec1f0e9dc8c02f8be', '2018-12-06', '0', '', '', 'https://ucarecdn.com/8747d0c6-77c7-44a6-9dc2-a76d20c6c977/', '', '', '', '0000-00-00'),
(8, 'nickvujicic', 'Nick', 'Vujicic', 'nickvujicic@gmail.com', '1da9bdf50197762ec1f0e9dc8c02f8be', '2018-12-06', '0', '', '', 'https://ucarecdn.com/b24d4c4f-9629-43d4-b038-deb19006e5a9/-/crop/409x409/70,0/-/preview/', '', '', '', '0000-00-00'),
(9, 'markzuckerberg', 'Mark', 'Zuckerberg', 'efukfheiuif@ujheheifvddvd', '1da9bdf50197762ec1f0e9dc8c02f8be', '2018-12-06', '0', '', '', 'https://ucarecdn.com/f85e9c15-a581-45d8-a6cd-137bd89ac1b0/-/crop/400x400/116,0/-/preview/', '', '', '', '0000-00-00'),
(10, 'nguyenquanghai', 'Hai', 'Nguyen Quang', 'nguyenquanghai@fefrgrg', '1da9bdf50197762ec1f0e9dc8c02f8be', '2018-12-06', '0', '', '', 'https://ucarecdn.com/cdb58c3e-01a7-4dc2-91d6-8ab43cf6f955/-/crop/270x270/105,0/-/preview/', '', '', '', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uf_one` (`uf_one`),
  ADD KEY `uf_two` (`uf_two`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id_p` (`user_id_p`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`,`username`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `c_id` bigint(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=484;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`uf_one`) REFERENCES `users` (`username`),
  ADD CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`uf_two`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
