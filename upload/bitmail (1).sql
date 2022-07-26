-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP TABLE IF EXISTS `All_emails`;
CREATE TABLE `All_emails` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sender_email` varchar(50) NOT NULL,
  `reciver_email` varchar(50) NOT NULL,
  `ccEmail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bccEmail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `msg` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `attechment` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datetime` timestamp NOT NULL,
  `sender_status` int NOT NULL,
  `reciver_status` int NOT NULL,
  `draft_status` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `All_emails` (`id`, `sender_email`, `reciver_email`, `ccEmail`, `bccEmail`, `subject`, `msg`, `attechment`, `datetime`, `sender_status`, `reciver_status`, `draft_status`) VALUES
(1,	'abhihesta@mailman.com',	'vijay@mailman.com',	'raju@mailman.com',	'rani@mailman.com',	'testing',	'welcome rani',	'upload/pix.jpg',	'2022-07-05 20:53:50',	0,	1,	1),
(3,	'vijay@mailman.com',	'abhihesta@mailman.com',	'harsh@mailman.com',	'surya@mailman.com',	'hello abhi',	'welcome abhi',	'upload/pix.jpg',	'2022-07-05 20:56:33',	0,	1,	1),
(4,	'abhihesta@mailman.com',	'vijay@mailman.com',	'rahul@mailman.com',	'raju@mailman.com',	'hello Rahul',	'welcome rahul',	'upload/pix.jpg',	'2022-07-05 21:55:38',	0,	1,	1),
(5,	'abhihesta@mailman.com',	'vijay@mailman.com',	'pankaj@mailman.com',	'pavan@mailman.com',	'hello pankaj',	'welcome Pankaj',	'upload/pix.jpg',	'2022-07-05 22:43:43',	0,	0,	1),
(6,	'vijay@mailman.com',	'abhihesta@mailman.com',	'harsh@mailman.com',	'suryan@mailman.com',	'hello harsh',	'welcome harsh',	'upload/pix.jpg',	'2022-07-06 00:27:53',	1,	1,	1),
(7,	'vijay@mailman.com',	'abhihesta@mailman.com',	'maish@mailman.com',	'sameer@mailman.com',	'Invitation Sameer',	'welcome sameer',	'upload/demo.jpg',	'2022-07-06 00:42:31',	1,	0,	1),
(8,	'abhihesta@mailman.com',	'vijay@mailman.com',	'harsh@mailman.com',	'shivam@mailman.com',	'meeting with shivam',	'welcome shivam',	'upload/pix.jpg',	'2022-07-06 05:33:55',	1,	0,	1),
(9,	'abhihesta@mailman.com',	'vijay@mailman.com',	'raj@mailman.com',	'shivam@mailman.com',	'hello Raj',	'welcome Raj',	'upload/demo.jpg',	'2022-07-06 21:39:07',	0,	1,	1),
(10,	'vijay@mailman.com',	'abhihesta@mailman.com',	'gorav@mailman.com',	'saurav@mailman.com',	'hello Gaurav',	'welcome Gaurav',	'upload/demo.jpg',	'2022-07-06 21:41:45',	1,	0,	1),
(11,	'abhihesta@mailman.com',	'vijay@mailman.com',	'ravi@mailman.com',	'pavan@mailman.com',	'hello pawan',	'welcome pavan',	'upload/cartoon.jpeg',	'2022-07-07 01:49:42',	1,	1,	1),
(12,	'vijay@mailman.com',	'abhihesta@mailman.com',	'harsh@mailman.com',	'raju@mailman.com',	'hello budy',	'welcome ',	'upload/demo.jpg',	'2022-07-07 01:52:19',	1,	0,	1),
(13,	'abhihesta@mailman.com',	'vijay@mailman.com',	'ravi@mailman.com',	'rani@mailman.com',	'hello abhishek ',	'welcome',	'upload/demo.jpg',	'2022-07-07 01:53:30',	1,	1,	1),
(14,	'vijay@mailman.com',	'abhihesta@mailman.com',	'raju@mailman.com',	'shivam@mailman.com',	'hhhhhhhh',	'welcome',	'upload/pix.jpg',	'2022-07-07 01:54:19',	1,	0,	1),
(15,	'abhihesta@mailman.com',	'vijay@mailman.com',	'raju@mailman.com',	'raju@mailman.com',	'nokia',	'welcome',	'upload/demo.jpg',	'2022-07-07 01:55:04',	1,	1,	1),
(16,	'abhihesta@mailman.com',	'vijay@mailman.com',	'ravi@mailman.com',	'rani@mailman.com',	'Anand invitation',	'welcome anand',	'upload/demo.jpg',	'2022-07-07 02:08:08',	1,	0,	1),
(17,	'abhihesta@mailman.com',	'vijay@mailman.com',	'abhi@gmail.com',	'raju@mailman.com',	'testing',	'welcome tester',	'upload/demo.jpg',	'2022-07-07 02:12:07',	1,	1,	1),
(18,	'abhihesta@mailman.com',	'vijay@mailman.com',	'ravi@mailman.com',	'rani@mailman.com',	'HELLO TESTER',	'Welcome TESTER',	'upload/demo.jpg',	'2022-07-07 02:50:01',	0,	1,	1),
(21,	'abhihesta@mailman.com',	'vijay@mailman.com',	'abhi@gmail.com',	'raju@mailman.com',	'INVITATION HARSH',	'WELCOME HARSH',	'upload/cartoon.jpeg',	'2022-07-08 19:42:19',	1,	1,	1),
(22,	'abhihesta@mailman.com',	'vijay@mailman.com',	'harsh@mailman.com',	'raju@mailman.com',	'hello vijay',	'welcome vijay',	'upload/cartoon.jpeg',	'2022-07-10 22:07:48',	0,	1,	1),
(23,	'vijay@mailman.com',	'abhihesta@mailman.com',	'harsh@mailman.com',	'rani@mailman.com',	'hello Abhishek',	'welcome',	'upload/cartoon.jpeg',	'2022-07-11 00:22:36',	1,	1,	1),
(24,	'vijay@mailman.com',	'abhihesta@mailman.com',	'raju@mailman.com',	'pavan@mailman.com',	'Invitation ranjan',	'Welcome ranjan',	'upload/demo.jpg',	'2022-07-11 00:24:01',	1,	1,	1),
(25,	'vijay@mailman.com',	'abhihesta@mailman.com',	'raju@mailman.com',	'rani@mailman.com',	'INVITATION surya',	'welcome Surya',	'upload/demo.jpg',	'2022-07-11 00:24:53',	1,	0,	1),
(26,	'vijay@mailman.com',	'abhihesta@mailman.com',	'abhi@mailman.com',	'raju@mailman.com',	'Hello Ananad',	'Welcome Ananad',	'upload/pix.jpg',	'2022-07-11 00:26:20',	1,	0,	1),
(28,	'abhihesta@mailman.com',	'vijay@mailman.com',	NULL,	NULL,	NULL,	NULL,	NULL,	'2022-07-11 21:18:41',	0,	0,	0),
(29,	'abhihesta@mailman.com',	'vijay@mailman.com',	NULL,	NULL,	NULL,	NULL,	NULL,	'2022-07-11 22:14:32',	0,	0,	0),
(30,	'abhihesta@mailman.com',	'vijay@mailman.com',	NULL,	NULL,	NULL,	NULL,	NULL,	'2022-07-11 22:14:48',	0,	0,	0),
(31,	'abhihesta@mailman.com',	'vijay@mailman.com',	'raju@mailman.com',	'raju@mailman.com',	'testing',	'welcome pavan',	'upload/demo.jpg',	'2022-07-11 22:15:10',	1,	1,	1);

DROP TABLE IF EXISTS `Reg_userid`;
CREATE TABLE `Reg_userid` (
  `id` int NOT NULL AUTO_INCREMENT,
  `fname` varchar(40) NOT NULL,
  `lname` varchar(40) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `remail` varchar(40) NOT NULL,
  `pass` varchar(20) NOT NULL,
  `cpass` varchar(20) NOT NULL,
  `image` varchar(50) NOT NULL,
  `t_condition` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `Reg_userid` (`id`, `fname`, `lname`, `username`, `email`, `remail`, `pass`, `cpass`, `image`, `t_condition`) VALUES
(1,	'Abhi',	' kumar ',	'Abhishek',	'abhihesta@mailman.com',	'abhishek@mailman.com',	'Anand@123',	'Anand@123',	'upload/pix.jpg',	'on'),
(2,	'vijay',	'kumar',	'Vijay',	'vijay@mailman.com',	'ajay@mailman.com',	'Vijay@123',	'Vijay@123',	'upload/demo.jpg',	'on');

-- 2022-07-12 12:31:08
