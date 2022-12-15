-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 15, 2022 at 02:07 AM
-- Server version: 5.7.40-cll-lve
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book_1`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `cid` varchar(255) DEFAULT NULL,
  `room` int(10) DEFAULT '0',
  `counter` varchar(255) DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL,
  `bill` varchar(255) DEFAULT NULL,
  `billexport` varchar(255) DEFAULT NULL,
  `billprint` varchar(255) DEFAULT NULL,
  `timeenter` varchar(255) DEFAULT NULL,
  `timeend` varchar(255) DEFAULT NULL,
  `timeend2` varchar(255) DEFAULT NULL,
  `datetext4` varchar(255) DEFAULT NULL,
  `comment` text,
  `comment1` text,
  `comment2` text,
  `comment3` text,
  `comment5` text,
  `comment6` text,
  `knet` varchar(11) DEFAULT NULL,
  `msgsms` int(11) DEFAULT '0',
  `bookingid` varchar(255) DEFAULT NULL,
  `noa` varchar(255) DEFAULT NULL,
  `comment7` text,
  `comment8` text,
  `netnum` varchar(255) DEFAULT NULL,
  `netpass` varchar(255) DEFAULT NULL,
  `commentnbeh` text,
  `user` varchar(255) DEFAULT NULL,
  `bookingnew` varchar(255) DEFAULT NULL,
  `user2` varchar(255) DEFAULT NULL,
  `oldroom` varchar(255) DEFAULT NULL,
  `timerenew` varchar(255) DEFAULT NULL,
  `nowait` varchar(255) DEFAULT NULL,
  `dataend` varchar(255) DEFAULT NULL,
  `knetok` varchar(255) DEFAULT NULL,
  `msgmove` text NOT NULL,
  `timemove` varchar(20) NOT NULL,
  `3gd` varchar(20) NOT NULL,
  `timecleanfinsh` varchar(20) NOT NULL,
  `outsite` varchar(20) NOT NULL,
  `timeoutsite` varchar(20) NOT NULL,
  `checkout` varchar(100) NOT NULL,
  `checkclean` varchar(100) NOT NULL,
  `dayfree` varchar(20) NOT NULL,
  `dayfree2` varchar(20) NOT NULL,
  `dayfree3` varchar(20) NOT NULL,
  `msgwait` text NOT NULL,
  `bookedok` varchar(20) DEFAULT NULL,
  `3gdok` varchar(20) DEFAULT NULL,
  `knetcode` varchar(20) DEFAULT NULL,
  `inok` int(11) NOT NULL,
  `outok` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `name`, `mobile`, `cid`, `room`, `counter`, `day`, `bill`, `billexport`, `billprint`, `timeenter`, `timeend`, `timeend2`, `datetext4`, `comment`, `comment1`, `comment2`, `comment3`, `comment5`, `comment6`, `knet`, `msgsms`, `bookingid`, `noa`, `comment7`, `comment8`, `netnum`, `netpass`, `commentnbeh`, `user`, `bookingnew`, `user2`, `oldroom`, `timerenew`, `nowait`, `dataend`, `knetok`, `msgmove`, `timemove`, `3gd`, `timecleanfinsh`, `outsite`, `timeoutsite`, `checkout`, `checkclean`, `dayfree`, `dayfree2`, `dayfree3`, `msgwait`, `bookedok`, `3gdok`, `knetcode`, `inok`, `outok`) VALUES
(1, 'محمد عبدالنبي محمد احمد سليمان', '69004813', '289050508574', 401, '2', '1', '45', 'ok', '5074', '1668096302', '1668157200', '1668097079', '20221110', NULL, NULL, NULL, NULL, NULL, NULL, '45', 0, 'لاند ابيض', 'بطاقة مدنية', '', '', NULL, NULL, NULL, 'محمد سليمان', '', 'محمد سليمان', NULL, NULL, NULL, '20221110', NULL, '', '', '0001\n', '1668097115', '', '', 'وائل', 'معتز ', '', '', '', '', NULL, NULL, '96822', 0, 0),
(2, 'محمد عبدالنبي محمد احمد سليمان', '69004813', '289050508574', 303, '2', '1', '45', 'ok', '5074', '1668097460', '1668157200', '1668097669', '20221110', NULL, NULL, NULL, NULL, NULL, NULL, '45', 0, 'لاند اسود', 'بطاقة مدنية', '', '', NULL, NULL, NULL, 'محمد سليمان', '', 'محمد سليمان', NULL, NULL, NULL, '20221110', NULL, '', '', '0002\n', '1668097739', '', '', 'الاحمدى ', 'حاتم ', '', '', '', '', NULL, NULL, '96822', 0, 0),
(3, 'عبدالله صعفك سرور المطيري', '24888438', '300073101288', 101, '2', '1', '45', 'ok', '5032', '1668173297', '1668243600', '1668173505', '20221111', NULL, NULL, NULL, NULL, NULL, NULL, '45', 0, 'رنج ابيض', 'بطاقة مدنية', '', '', NULL, NULL, NULL, 'محمد سليمان', '', 'محمد سليمان', NULL, NULL, NULL, '20221111', NULL, '', '', '0003\n', '1668173543', '', '', 'وائل', 'وائل', '', '', '', '', NULL, NULL, '654358', 0, 0),
(4, 'عبدالعزيز صريد راشد', '65772205', '301012901294', 201, '2', '1', '45', 'ok', '5092', '1668173406', '1668243600', '1668173527', '20221111', NULL, NULL, NULL, NULL, NULL, NULL, '45', 0, ' لاند ابيض', 'بطاقة مدنية', '', '', NULL, NULL, NULL, 'محمد سليمان', '', 'محمد سليمان', NULL, NULL, NULL, '20221111', NULL, '', '', '0004\n', '1668173553', '', '', 'معتز ', 'معتز ', '', '', '', '', NULL, NULL, '654358', 0, 0),
(5, 'احمد خالد احمد الراشد', '67775017', '297060700105', 303, '2', '1', '40', 'ok', '2244', '1668371034', '1668416400', '1668375510', '20221113', NULL, NULL, NULL, NULL, NULL, NULL, '40', 0, '- لاند ابيض', 'بطاقة مدنية', '', '', NULL, NULL, NULL, 'محمد سليمان', '', 'محمد سليمان', NULL, NULL, NULL, '20221113', NULL, '', '', '0005\n', '1668375531', '', '', 'معتز ', 'معتز ', '', '', '', '', NULL, NULL, '18250', 0, 0),
(6, 'هشام احمد صالح احمد', '65905947', '276111009849', 301, '2', '1', '40', 'ok', '', '1668532511', '1668589200', '1668543849', '20221115', NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 'رينج روفر نبيتي', 'بطاقة مدنية', '', '', NULL, NULL, NULL, 'محمد سليمان', '', 'محمد سليمان', NULL, NULL, NULL, '20221115', NULL, '', '', '0006\n', '1668620586', '', '', 'وائل', 'وائل', '', '', '', '', NULL, NULL, '', 0, 0),
(7, 'هشام احمد صالح احمد', '65905947', '276111009849', 103, '2', '1', '40', 'ok', '', '1668621335', '1668675600', '1668643648', '20221116', NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 'لاند ابيض', 'بطاقة مدنية', '', '', NULL, NULL, NULL, 'محمد سليمان', '', 'محمد سليمان', NULL, NULL, NULL, '20221116', NULL, '', '', '0007\n', '1668643666', '', '', 'وائل', 'وائل', '', '', '', '', NULL, NULL, '', 0, 0),
(8, 'هشام احمد صالح احمد', '65905947', '276111009849', 104, '2', '1', '40', 'ok', '11', '1668621536', '1668675600', '1668643675', '20221116', NULL, NULL, NULL, NULL, NULL, NULL, '40', 0, 'لاند اسود', 'بطاقة مدنية', '', '', NULL, NULL, NULL, 'محمد سليمان', '', 'محمد سليمان', NULL, NULL, NULL, '20221116', NULL, '', '', '0008\n', '1668643692', '', '', 'وائل', 'وائل', '', '', '', '', NULL, NULL, '18250', 1, 0),
(9, 'عبدالله سعد علي', '55006430', '279100304512', 201, '2', '1', '40', 'ok', '11', '1668622622', '1668675600', '1668622934', '20221116', NULL, NULL, NULL, NULL, NULL, NULL, '40', 0, 'لاند ابيض', 'بطاقة مدنية', '', '', NULL, NULL, NULL, 'محمد سليمان', '', 'محمد سليمان', NULL, NULL, NULL, '20221116', NULL, '', '', '0009\n', '1668623003', '', '', 'حاتم ', 'حاتم ', '', '', '', '', NULL, NULL, '18250', 0, 0),
(10, 'عبدالعزيز صريد راشد', '65772205', '301012901294', 102, '2', '1', '20', 'ok', '', '1668626007', '1668675600', '1668643620', '20221116', NULL, NULL, NULL, NULL, NULL, NULL, '', 0, '- لاند ابيض', 'بطاقة مدنية', '', 'ت', NULL, NULL, NULL, 'محمد سليمان', '', 'محمد سليمان', NULL, NULL, NULL, '20221116', NULL, '', '', '0010\n', '1668643640', '', '', 'وائل', 'وائل', '', '', '', '', NULL, NULL, '', 0, 0),
(11, 'هشام احمد صالح احمد', '65905947', '276111009849', 103, '2', '3', '120', 'ok', '4566', '1668950491', '1669194000', '1668950688', '20221120', NULL, NULL, NULL, NULL, NULL, NULL, '120', 0, 'لاند اسود', 'بطاقة مدنية', '', '', NULL, NULL, NULL, 'محمد سليمان', '', 'محمد سليمان', NULL, NULL, NULL, '20221120', NULL, '', '', '0011\n', '1668980754', '', '', ' ', '', '', '', '', '', NULL, NULL, '48877', 0, 0),
(12, 'سعود عايض المطيري', '65656565', '260042500936', 104, '2', '1', '40', 'ok', '45521', '1668950718', '1669021200', '1668950788', '20221120', NULL, NULL, NULL, NULL, NULL, NULL, '40', 0, 'تويتا ابيض', 'بطاقة مدنية', '', '', NULL, NULL, NULL, 'محمد سليمان', '', 'محمد سليمان', NULL, NULL, NULL, '20221120', NULL, '', '', '0012\n', '1668980780', '', '', ' ', '', '', '', '', '', NULL, NULL, '454122', 0, 0),
(13, 'محمد عبدالنبي محمد احمد سليمان', '69004813', '289050508574', 201, '2', '1', '40', 'ok', '12354', '1668951252', '1669021200', '1668954047', '20221120', NULL, NULL, NULL, NULL, NULL, NULL, '40', 0, 'لاند اسود', 'بطاقة مدنية', '', '', NULL, NULL, NULL, 'محمد سليمان', '', 'محمد سليمان', NULL, NULL, NULL, '20221120', NULL, '', '', '0013\n', '1668980774', '', '', ' ', '', '', '', '', '', NULL, NULL, '1245', 0, 0),
(14, 'معتز كمال خلفلا محمد', '67691199', '295052703657', 202, '2', '1', '40', 'ok', '', '1668951791', '1669021200', '1669041740', '20221120', NULL, '6', '20', '', 'wait', NULL, '', 0, 'رنج ابيض', 'بطاقة مدنية', '', '', NULL, NULL, NULL, 'محمد سليمان', '', 'محمد سليمان', NULL, NULL, 'لايوجد اي اثبات', '20221121', NULL, '', '', '0014\n', '1669042246', '', '', 'معتز ', 'معتز ', '', '', '', '', NULL, NULL, '', 0, 0),
(15, 'احمد عبدالمعز عبدالحافظ ابوزيد', '50112921', '287082406717', 203, '2', '1', '40', 'ok', '', '1668953010', '1669021200', '1669041850', '20221120', NULL, '6', NULL, '', 'no', NULL, '', 0, 'لاند ابيض', 'بطاقة مدنية', '', '', NULL, NULL, NULL, 'محمد سليمان', '', 'محمد سليمان', NULL, NULL, NULL, '20221121', NULL, '', '', '0015\n', '1669042255', '', '', 'معتز ', 'معتز ', '', '', '', '', NULL, NULL, '', 0, 0),
(16, 'ابو احمد الوحشابو احمد الوحش', '99199127', '291052502769', 604, '2', '1', '40', 'ok', '', '1668953273', '1669021200', '1668954023', '20221120', NULL, NULL, NULL, NULL, NULL, NULL, '0', 0, '- لاند ابيض', 'بطاقة مدنية', '', '', NULL, NULL, NULL, 'محمد سليمان', '', 'محمد سليمان', '204', NULL, NULL, '20221120', NULL, 'رغبه نزيل', '1668953560', '0016\n', '1668954678', '', '', 'معتز ', 'معتز ', '', '', '', '', NULL, NULL, '', 0, 0),
(17, 'هشام احمد صالح احمد', '65905947', '276111009849', 303, '2', '1', '40', 'ok', '1245', '1668953835', '1669021200', '1669041696', '20221120', NULL, '6', '20', '', 'wait', NULL, '40', 0, 'لاند اسود', 'بطاقة مدنية', '', '', NULL, NULL, NULL, 'محمد سليمان', '', 'محمد سليمان', NULL, NULL, 'لايوجد اي اثبات', '20221121', NULL, '', '', '0017\n', '1669042264', '', '', 'معتز ', 'معتز ', '', '', '', '', NULL, NULL, '12345', 0, 0),
(18, 'احمد عبدالمعز عبدالحافظ ابوزيد', '50112921', '287082406717', 101, '2', '1', '40', '', '', '1669042372', '1669107600', '1669043229', '20221121', NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 'رنج ابيض', 'بطاقة مدنية', '', '', NULL, NULL, NULL, 'محمد سليمان', '', 'محمد سليمان', NULL, NULL, NULL, '20221121', NULL, '', '', '0018\n', '1669055775', '', '', 'معتز ', 'معتز ', '', '', '', '', NULL, NULL, '', 0, 0),
(19, 'طارق كمال', '67769595', '288012306512', 201, '2', '1', '40', '', '', '1669210518', '1669280400', '1669210588', '20221123', NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 'لاند', 'بطاقة مدنية', '', '', NULL, NULL, NULL, 'tareq', '', 'tareq', NULL, NULL, NULL, '20221123', NULL, '', '', '0019\n', '', '', '', '', '', '', '', '', '', NULL, NULL, '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `booking_booked`
--

CREATE TABLE `booking_booked` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `cid` varchar(255) DEFAULT NULL,
  `dateadd` varchar(255) DEFAULT NULL,
  `datetext4` varchar(255) DEFAULT NULL,
  `amount` varchar(255) DEFAULT NULL,
  `room` varchar(255) DEFAULT NULL,
  `timeenter` varchar(255) DEFAULT NULL,
  `timeend` varchar(255) NOT NULL,
  `show1` int(10) DEFAULT NULL,
  `user` varchar(100) NOT NULL,
  `md5id` varchar(10) NOT NULL,
  `datesms` varchar(15) NOT NULL,
  `paymentdate` varchar(15) NOT NULL,
  `paymenttext` text NOT NULL,
  `booking` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `booking_card`
--

CREATE TABLE `booking_card` (
  `id` int(11) NOT NULL,
  `booking` int(11) NOT NULL,
  `room` int(11) DEFAULT '0',
  `cid` varchar(100) DEFAULT NULL,
  `timeenter` varchar(255) DEFAULT NULL,
  `timeend` varchar(255) DEFAULT NULL,
  `counter` int(11) DEFAULT '0',
  `user` varchar(255) DEFAULT NULL,
  `user2` varchar(100) DEFAULT NULL,
  `comment` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `booking_checkall`
--

CREATE TABLE `booking_checkall` (
  `id` int(11) NOT NULL,
  `text1` varchar(255) DEFAULT NULL,
  `text2` varchar(255) DEFAULT NULL,
  `text3` varchar(255) DEFAULT NULL,
  `text4` text,
  `text5` text,
  `text6` varchar(255) DEFAULT NULL,
  `text7` varchar(255) DEFAULT NULL,
  `text8` varchar(255) DEFAULT NULL,
  `text9` varchar(255) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking_checkall`
--

INSERT INTO `booking_checkall` (`id`, `text1`, `text2`, `text3`, `text4`, `text5`, `text6`, `text7`, `text8`, `text9`, `type_id`) VALUES
(34, '2', '2022/12/12', '01:26', '{\"choose_1\":\"\\u0646\\u0639\\u0645\",\"image_1\":\"3409ab49ca986af1ebb65f5d476c3417.jpg\",\"note_1\":\"\\u0646\\u0639\\u0645 \\u0644\\u0627\\u064a\\u0648\\u062c\\u062f \\u0645\\u0644\\u0627\\u062d\\u0638\\u0647\",\"question_1\":\"1\",\"choose_2\":\"\\u0646\\u0639\\u0645\",\"image_2\":\"49d3df334fcfeb7ea48d8266302a4f5d.jpg\",\"note_2\":\"ghg\",\"question_2\":\"2\"}', NULL, NULL, NULL, NULL, NULL, 1),
(33, '101', '2022/12/11', '16:27', '{\"choose_5\":\"\\u0646\\u0639\\u0645\",\"image_5\":\"a74fb4ca03c2385016f9d9492c0db357.jpg\",\"note_5\":\"\\u062a\\u064a\\u0633\\u062a1\",\"question_5\":\"5\",\"choose_7\":\"\\u0644\\u0627\",\"image_7\":\"2c559b33ccda961b821580b5f248c4f4.jpg\",\"note_7\":\"\\u0635\\u0635\\u0635\\u0635\\u0635\",\"question_7\":\"7\",\"choose_8\":\"\\u0646\\u0639\\u0645\",\"image_8\":\"d3bbb35a2a6a7cf48b2a8ac9385066a3.jpg\",\"note_8\":\"3\\u0635\\u0635\\u0635\",\"question_8\":\"8\"}', NULL, NULL, NULL, NULL, NULL, 2),
(32, '2', '2022/12/11', '12:45', '{\"choose_1\":\"\\u0646\\u0639\\u0645\",\"image_1\":\"8a56c735075d1188033718ebf7b1134c.jpg\",\"note_1\":\"fassafsfa\",\"question_1\":\"1\",\"choose_2\":\"\\u0646\\u0639\\u0645\",\"image_2\":\"ea0ad206df4dff8f188e036e8a544086.jpg\",\"note_2\":\"gsdsdsdgdsdsg\",\"question_2\":\"2\"}', NULL, NULL, NULL, NULL, NULL, 1),
(30, '2', '2022/12/12', '04:02', '{\"choose_1\":\"\\u0646\\u0639\\u0645\",\"image_1\":\"2fd7bd7632096d017a483c7d869e07dc.png\",\"note_1\":\"aaaaaaaaaaaa\",\"question_1\":\"1\",\"choose_2\":\"\\u0644\\u0627\",\"image_2\":\"99fa8f78c34ad1c323ac13a0248d129c.png\",\"note_2\":\"aaaaaaaaaa\",\"question_2\":\"2\"}', NULL, NULL, NULL, NULL, NULL, 1),
(31, '2', '2022/12/13', '12:02', '{\"choose_1\":\"\\u0646\\u0639\\u0645\",\"image_1\":\"2fd7bd7632096d017a483c7d869e07dc.png\",\"note_1\":\"aaaaaaaaaaaa\",\"question_1\":\"1\",\"choose_2\":\"\\u0644\\u0627\",\"image_2\":\"99fa8f78c34ad1c323ac13a0248d129c.png\",\"note_2\":\"aaaaaaaaaa\",\"question_2\":\"2\"}', NULL, NULL, NULL, NULL, NULL, 2),
(29, '2', '2022/12/11', '02:02', '{\"choose_1\":\"\\u0646\\u0639\\u0645\",\"image_1\":\"2fd7bd7632096d017a483c7d869e07dc.png\",\"note_1\":\"aaaaaaaaaaaa\",\"question_1\":\"1\",\"choose_2\":\"\\u0644\\u0627\",\"image_2\":\"99fa8f78c34ad1c323ac13a0248d129c.png\",\"note_2\":\"aaaaaaaaaa\",\"question_2\":\"2\"}', NULL, NULL, NULL, NULL, NULL, 3),
(28, '2', '2022/12/11', '11:02', '{\"choose_1\":\"\\u0646\\u0639\\u0645\",\"image_1\":\"2fd7bd7632096d017a483c7d869e07dc.png\",\"note_1\":\"aaaaaaaaaaaa\",\"question_1\":\"1\",\"choose_2\":\"\\u0644\\u0627\",\"image_2\":\"99fa8f78c34ad1c323ac13a0248d129c.png\",\"note_2\":\"aaaaaaaaaa\",\"question_2\":\"2\"}', NULL, NULL, NULL, NULL, NULL, 4);

-- --------------------------------------------------------

--
-- Table structure for table `booking_checkroom`
--

CREATE TABLE `booking_checkroom` (
  `id` int(11) NOT NULL,
  `text1` varchar(255) DEFAULT NULL,
  `text2` varchar(255) DEFAULT NULL,
  `text3` varchar(255) DEFAULT NULL,
  `text4` varchar(255) DEFAULT NULL,
  `text5` varchar(255) DEFAULT NULL,
  `text6` varchar(255) DEFAULT NULL,
  `text7` varchar(255) DEFAULT NULL,
  `text8` varchar(255) DEFAULT NULL,
  `text9` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `booking_clints`
--

CREATE TABLE `booking_clints` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `cid` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `comment` text,
  `oky` varchar(255) DEFAULT NULL,
  `datetext` varchar(255) DEFAULT NULL,
  `datetext2` int(5) DEFAULT '0',
  `datetext3` varchar(255) DEFAULT NULL,
  `datetext4` varchar(255) DEFAULT NULL,
  `file1` varchar(255) DEFAULT NULL,
  `file2` varchar(255) DEFAULT NULL,
  `file3` varchar(255) DEFAULT NULL,
  `file4` varchar(255) DEFAULT NULL,
  `file5` varchar(255) DEFAULT NULL,
  `file6` varchar(255) DEFAULT NULL,
  `dayfree` varchar(20) NOT NULL,
  `dayfree2` varchar(20) NOT NULL,
  `dayfree3` varchar(20) NOT NULL,
  `checkok` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking_clints`
--

INSERT INTO `booking_clints` (`id`, `name`, `mobile`, `cid`, `country`, `comment`, `oky`, `datetext`, `datetext2`, `datetext3`, `datetext4`, `file1`, `file2`, `file3`, `file4`, `file5`, `file6`, `dayfree`, `dayfree2`, `dayfree3`, `checkok`) VALUES
(1, 'محمد عبدالنبي محمد احمد سليمان', '69004813', '289050508574', 'مصري', NULL, NULL, '1', 3, NULL, '20221120', '', '', '', NULL, 'صديق', NULL, '', '', '', 0),
(2, 'عبدالله صعفك سرور المطيري', '24888438', '300073101288', 'كويتى ', NULL, NULL, '20221111', 1, NULL, '20221111', '../allcid/202211/3000731012881.jpg', '../allcid/202211/3000731012882.jpg', NULL, NULL, 'فورسل', NULL, '', '', '', 0),
(3, 'عبدالعزيز صريد راشد', '65772205', '301012901294', 'كويتى ', NULL, NULL, '1', 2, NULL, '20221116', '../allcid/202211/3010129012941.jpg', '../allcid/202211/3010129012942.jpg', NULL, NULL, 'قوقل', NULL, '', '', '', 0),
(4, 'احمد خالد احمد الراشد', '67775017', '297060700105', 'كويتى ', NULL, NULL, '20221113', 1, NULL, '20221113', '../allcid/202211/2970607001051.jpg', '../allcid/202211/2970607001052.jpg', NULL, NULL, '', NULL, '', '', '', 0),
(5, 'هشام احمد صالح احمد', '65905947', '276111009849', 'مصري', 'عليه مبلغ 20  بتاريخ 20221121', 'ok', '1', 5, NULL, '20221120', '../allcid/202211/2761110098491.jpg', '../allcid/202211/', '', NULL, 'صديق', NULL, '', '', '', 0),
(6, 'عبدالله سعد علي', '55006430', '279100304512', 'مصري', NULL, NULL, '20221116', 1, NULL, '20221116', '../allcid/202211/2791003045121.jpg', '../allcid/202211/2791003045122.jpg', '', NULL, 'صديق', NULL, '', '', '', 0),
(7, 'سعود عايض المطيري', '65656565', '260042500936', 'كويتى ', NULL, NULL, '20221120', 1, NULL, '20221120', '../allcid/202211/2600425009361.jpg', '../allcid/202211/2600425009362.jpeg', NULL, NULL, 'صديق', NULL, '', '', '', 0),
(8, 'معتز كمال خلفلا محمد', '67691199', '295052703657', 'مصرى', 'عليه مبلغ 20  بتاريخ 20221121', 'ok', '20221120', 1, NULL, '20221120', '../allcid/202211/2950527036571.jpg', '../allcid/202211/2950527036572.jpg', '', NULL, 'صديق', NULL, '', '', '', 0),
(9, 'احمد عبدالمعز عبدالحافظ ابوزيد', '50112921', '287082406717', 'مصري', NULL, NULL, '1', 2, NULL, '20221121', '../allcid/202211/2870824067171.jpg', '../allcid/202211/2870824067172.jpg', '', NULL, 'صديق', NULL, '', '', '', 0),
(10, 'ابو احمد الوحشابو احمد الوحش', '99199127', '291052502769', 'مصري', NULL, NULL, '20221120', 1, NULL, '20221120', '', '', NULL, NULL, 'صديق', NULL, '', '', '', 0),
(11, 'طارق كمال', '67769595', '288012306512', 'مصري', NULL, NULL, '20221123', 1, NULL, '20221123', '', '', NULL, NULL, ' اعلان سناب شات', NULL, '', '', '', 0),
(12, 'MR', '01022437388', '288012306512', 'مصري', NULL, NULL, '20221123', 1, NULL, '20221123', '', '', NULL, NULL, ' اعلان سناب شات', NULL, '', '', '', 0),
(13, 'Ahmed', '01091510571', '288012306512', 'مصري', NULL, NULL, '20221123', 1, NULL, '20221123', '', '', NULL, NULL, ' اعلان سناب شات', NULL, '', '', '', 0),
(14, 'Mohamed', '⁦+96551000186⁩', '288012306512', 'مصري', NULL, NULL, '20221123', 1, NULL, '20221123', '', '', NULL, NULL, ' اعلان سناب شات', NULL, '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `booking_gyab`
--

CREATE TABLE `booking_gyab` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `dateadd` varchar(255) DEFAULT NULL,
  `enter` varchar(255) DEFAULT NULL,
  `outsite` varchar(255) DEFAULT NULL,
  `userenter` varchar(255) DEFAULT NULL,
  `userout` varchar(255) DEFAULT NULL,
  `enterdev` varchar(255) DEFAULT NULL,
  `outdev` varchar(255) DEFAULT NULL,
  `comment` text,
  `image` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `booking_knet`
--

CREATE TABLE `booking_knet` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `dateadd` varchar(255) DEFAULT NULL,
  `text1` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `booking_lost`
--

CREATE TABLE `booking_lost` (
  `id` int(11) NOT NULL,
  `msg` text,
  `dateadd` varchar(255) DEFAULT NULL,
  `idbook` int(11) DEFAULT '0',
  `counter` int(11) DEFAULT '0',
  `datefinsh` varchar(255) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `booking_mhtwa`
--

CREATE TABLE `booking_mhtwa` (
  `id` int(11) NOT NULL,
  `text1` varchar(255) DEFAULT NULL,
  `text2` varchar(255) DEFAULT NULL,
  `text3` varchar(255) DEFAULT NULL,
  `text4` varchar(255) DEFAULT NULL,
  `text5` varchar(255) DEFAULT NULL,
  `text6` varchar(255) DEFAULT NULL,
  `text7` varchar(255) DEFAULT NULL,
  `text8` varchar(255) DEFAULT NULL,
  `text9` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking_mhtwa`
--

INSERT INTO `booking_mhtwa` (`id`, `text1`, `text2`, `text3`, `text4`, `text5`, `text6`, `text7`, `text8`, `text9`) VALUES
(1, 'ابجورة', 'Table Lamp', '', '', '1', '20', '', '1', ''),
(2, 'تلفزيون', 'T.V', '', '', '1', '120', '', '1', ''),
(3, 'ريسيفر', 'Receiver', '', '', '1', '15', '', '1', ''),
(4, 'ريموت التفزيون', 'Remote 2', '', '', '1', '3', '', '1', ''),
(6, 'طاولة اريكا كبيرة', 'Large Table', '', '', '1', '50', '', '1', ''),
(7, 'طاولة صغيرة', ' Small Table', '', '', '1', '25', '', '1', ''),
(8, 'لوحة كبيرة', 'Frames 2 - 3', '', '', '1', '20', '', '1', ''),
(9, 'خزانة ملابس', 'Cabinet', '', '', '2', '50', '', '1', ''),
(10, 'سرير مقاس 200x180 سم', ' 200x180 Bed', '', '', '2', '95', '', '1', ''),
(11, 'غطاء المرتبة  200x180 سم', '200x180 Mattress Cover ', '', '', '2', '5', '', '3', ''),
(12, 'مكواة', 'Iron', '', '', '4', '7', '', '3', ''),
(90, 'عدد 2 لحاف', '2Blanket', '', '', '3', '10', '', '2', ''),
(14, 'مكواة بخار', 'Steam Iron', '', '', '4', '25', '', '3', ''),
(15, 'مرتبة سرير 200x180 سم', '  200x180 Mattress Bed', '', '', '2', '35', '', '1', ''),
(16, 'ابجورة يمين', 'Table Lamp', '', '', '2', '15', '', '1', ''),
(17, 'ستارة', 'Curtain ', '', '', '2', '25', '', '1', ''),
(18, 'ثلاجة', 'Refrigerator', '', '', '4', '100', '', '1', ''),
(19, 'غسالة', 'Washing Mashine', '', '', '4', '75', '', '1', ''),
(20, 'مايكرويف', 'Microwave', '', '', '4', '25', '', '1', ''),
(21, 'سخان حراري', 'Thermal Heater', '', '', '4', '5', '', '1', ''),
(113, 'ٍسجادة امام حمام الماستر', 'Carpet in front of Master Bathroom', '', '', '2', '2', '', '3', ''),
(25, 'كومودينو يمين', ' 2Table with Drawer', '', '', '2', '50', '', '1', ''),
(26, 'جلسة يمين', '2 Sofa', '', '', '1', '100', '', '1', ''),
(27, 'دفاية', 'Heater', '', '', '1', '10', '', '3', ''),
(29, 'غلاية مياه', 'Water Kettle', '', '', '4', '5', '', '1', ''),
(30, 'منشر ملابس', 'Wash Rack', '', '', '4', '5', '', '3', ''),
(35, 'بوتوجاز (طباخ)', 'Gaz Cooker', '', '', '4', '60', '', '1', ''),
(126, 'كومودينو قياس 50 يسار', '', NULL, NULL, '3', '50', NULL, '1', NULL),
(33, 'سجادة ', 'Carpet in front of Bathroom', '', '', '1', '2', '', '3', ''),
(105, 'ابجورة', 'Table Lamp', '', '', '3', '20', '', '1', ''),
(38, 'حامل مكواة', 'Iron Holder', '', '', '4', '7', '', '3', ''),
(39, 'سجادة', 'Carpet in front of the Bathroom', '', '', '5', '2', '', '3', ''),
(87, 'سرير قياس  120   يسار', '2222', '', '', '3', '100', '', '1', ''),
(88, 'عدد 2 غطاء مرتبة 160*200', '2Mattress Cover 160*190', '', '', '3', '10', '', '2', ''),
(42, 'نعال', 'Slipper', '', '', '5', '2', '', '3', ''),
(107, 'ادوات المطبخ', 'Kitchen Tools', '', '', '4', '10', '', '3', ''),
(44, 'علبة محارم', 'Tissues Tray', '', '', '5', '5', '', '3', ''),
(45, 'علبة الصابون', 'Soap Box', '', '', '5', '5', '', '1', ''),
(46, 'رف او حامل تحت المرايا', 'Stand Under Mirror', '', '', '5', '3', '', '1', ''),
(47, 'حامل فوط وملابس', 'Towel Carrier', '', '', '5', '3', '', '1', ''),
(48, 'غطاء او قاعدة كرسى الحمام', 'Cover and Base Chair for Bathroom', '', '', '5', '10', '', '1', ''),
(49, 'باب الغرفة الماستر', 'Master Room Door', '', '', '2', '45', '', '2', ''),
(50, 'باب الغرفة الصغيرة', 'Small Room Door', '', '', '3', '45', '', '2', ''),
(51, 'باب الحمام', 'Bathroom Door', '', '', '5', '45', '', '2', ''),
(52, 'خزانة ملابس', 'Cabinet', '', '', '3', '50', '', '1', ''),
(53, 'ماسك باب الغرفة الماستر', 'Master Door Brakes', '', '', '2', '10', '', '2', ''),
(54, 'مقبض باب الغرفة الصغيرة', 'Small Room Door Brake ', '', '', '3', '10', '', '2', ''),
(55, 'ماسك باب الحمام', 'Bathroom Door Brakes ', '', '', '5', '10', '', '2', ''),
(56, 'ماسك باب المطبخ', 'Kitchen Door Brakes ', '', '', '4', '10', '', '2', ''),
(57, 'باب المطبخ', 'Kitchen Door', '', '', '4', '45', '', '2', ''),
(58, 'ستارة', 'Curtain ', '', '', '1', '25', '', '1', ''),
(59, 'كومودينو قياس 60 وسط سريرين', '2Table with Drawer  ', '', '', '3', '50', '', '1', ''),
(89, 'عدد 2 فرش سرير 160*200', ' 2Bed Sheet 160*200', '', '', '3', '10', '', '2', ''),
(136, 'ابجورة يسار', '', NULL, NULL, '2', '20', NULL, '1', NULL),
(132, 'مرتبة سرير 120يمين', '', NULL, NULL, '3', '20', NULL, '1', NULL),
(65, 'مرايا', 'Mirror', '', '', '5', '15', '', '1', ''),
(123, 'ريموت رسيفر', '', NULL, NULL, '2', '10', NULL, '1', NULL),
(67, 'باب الشقة', 'Flat Door', '', '', '1', '50', '', '2', ''),
(68, 'ماسك باب الشقة', 'Flat Door Brake', '', '', '1', '10', '', '2', ''),
(69, 'فرش السرير', 'Bed Sheet', '', '', '2', '5', '', '3', ''),
(70, 'لحاف', 'Blanket', '', '', '2', '5', '', '3', ''),
(71, 'غطاء لحاف', 'Blanket Cover', '', '', '2', '5', '', '3', ''),
(72, 'عدد 2 وسادة نوم', ' 2Pillow', '', '', '2', '4', '', '3', ''),
(73, 'عدد 2 غطاء وسادة نوم', ' 2Pillow Case', '', '', '2', '2', '', '3', ''),
(74, 'غطاء او قاعدة كرسى الحمام', 'Cover and Base Chair for Bathroom', '', '', '2', '10', '', '3', ''),
(80, 'علبة محارم', 'Tissues try', '', '', '6', '5', '', '3', ''),
(106, 'ادوات الحمام', 'Bathroom Tools', '', '', '5', '10', '', '3', ''),
(84, 'باب الحمام الماستر', 'Master bathroom door', '', '', '2', '45', '', '2', ''),
(122, 'ريموت تلفزيون', '', NULL, NULL, '2', '10', NULL, '1', NULL),
(82, 'حامل فوط وملابس', 'Stand under mirror', '', '', '6', '5', '', '3', ''),
(83, 'حزاء', 'Slipper', '', '', '2', '2', '', '3', ''),
(85, 'مقبض الحمام الماستر', ' Master bathroom door brake', '', '', '2', '10', '', '3', ''),
(91, 'عدد 2 غطاء لحاف', ' 2Blanket Cover', '', '', '3', '10', '', '3', ''),
(92, 'عدد 2 وسادة نوم', ' 2Pillow ', '', '', '3', '5', '', '3', ''),
(93, 'عدد 2 غطاء وسادة نوم', ' 2Pillow Case', '', '', '3', '5', '', '3', ''),
(130, 'ابجورة معلقة صغيرة', '', NULL, NULL, '7', '20', NULL, '1', NULL),
(129, 'ابجورة معلقة كبيرة', '', NULL, NULL, '7', '20', NULL, '1', NULL),
(96, 'عدد 2 غطاء مرتبة 200*90', '2Mattress Cover 200*90', '', '', '3', '10', '', '3', ''),
(128, 'عدد 4 كراسي طاولة طعام', '', NULL, NULL, '7', '50', NULL, '1', NULL),
(98, 'عدد 2 لحاف', '2Blanket', '', '', '3', '10', '', '3', ''),
(99, 'عدد 2 غطاء لحاف', ' 2Blanket Cover', '', '', '3', '10', '', '3', ''),
(100, 'عدد 2 وسادة نوم', ' 2Pillow ', '', '', '3', '5', '', '3', ''),
(101, 'عدد 2 غطاء وسادة نوم', ' 2Pillow Case', '', '', '3', '5', '', '3', ''),
(102, 'ستارة', 'Curtain', '', '', '3', '25', '', '1', ''),
(127, 'طاولة طعام', '', NULL, NULL, '7', '100', NULL, '1', NULL),
(125, 'كومودينو قياس 50 يمين', '', NULL, NULL, '3', '50', NULL, '1', NULL),
(124, 'سرير قياس 120 يمين', '', NULL, NULL, '3', '100', NULL, '1', NULL),
(120, 'تلفزيون', '', NULL, NULL, '2', '100', NULL, '1', NULL),
(121, 'رسيفر', '', NULL, NULL, '2', '20', NULL, '1', NULL),
(119, 'طاولة تلفزيون', '', NULL, NULL, '2', '100', NULL, '1', NULL),
(114, 'طاولة تلفزيون', '', NULL, NULL, '1', '100', NULL, '1', NULL),
(115, 'ريموت الرسيفر', '', NULL, NULL, '1', '10', NULL, '1', NULL),
(116, 'لوحة صغيرة', '', NULL, NULL, '1', '10', NULL, '1', NULL),
(117, 'جلسة يسار', '', NULL, NULL, '1', '100', NULL, '1', NULL),
(118, 'كومودينو يسار', '', NULL, NULL, '2', '50', NULL, '1', NULL),
(133, 'مرتبة سرير 120يسار', '', NULL, NULL, '3', '20', NULL, '1', NULL),
(134, 'سرير 180', '', NULL, NULL, '3', '20', NULL, '1', NULL),
(135, 'مرتبة سرير 180', '', NULL, NULL, '3', '100', NULL, '1', NULL),
(137, 'ستارة', '', NULL, NULL, '7', '20', NULL, '1', NULL),
(138, 'التليفون', '', NULL, NULL, '1', '10', NULL, '1', NULL),
(139, 'التليفون', '', NULL, NULL, '2', '10', NULL, '1', NULL),
(141, 'مجفف شعر', '', NULL, NULL, '6', '', NULL, '1', NULL),
(142, 'سرير 90', '', NULL, NULL, '4', '10', NULL, '1', NULL),
(143, 'مرتبة', '', NULL, NULL, '4', '10', NULL, '1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking_mhtwah`
--

CREATE TABLE `booking_mhtwah` (
  `id` int(11) NOT NULL,
  `text1` varchar(255) DEFAULT NULL,
  `text2` varchar(255) DEFAULT NULL,
  `text3` varchar(255) DEFAULT NULL,
  `text4` varchar(255) DEFAULT NULL,
  `text5` varchar(255) DEFAULT NULL,
  `text6` varchar(255) DEFAULT NULL,
  `text7` varchar(255) DEFAULT NULL,
  `text8` varchar(255) DEFAULT NULL,
  `text9` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `booking_msg`
--

CREATE TABLE `booking_msg` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `msg` text,
  `dateadd` varchar(255) DEFAULT NULL,
  `user` text,
  `idmsg` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `booking_note`
--

CREATE TABLE `booking_note` (
  `id` int(11) NOT NULL,
  `title` text,
  `cat` int(11) DEFAULT '0',
  `dateadd` varchar(255) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `counter` int(11) DEFAULT '0',
  `datefinsh` varchar(255) DEFAULT NULL,
  `userfinsh` varchar(100) DEFAULT NULL,
  `mobile` varchar(20) NOT NULL,
  `hour` varchar(20) NOT NULL,
  `day` varchar(20) NOT NULL,
  `comm` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking_note`
--

INSERT INTO `booking_note` (`id`, `title`, `cat`, `dateadd`, `user`, `counter`, `datefinsh`, `userfinsh`, `mobile`, `hour`, `day`, `comm`) VALUES
(1, 'محمد احمد عبدالله', 0, '1668375489', 'محمد سليمان', 3, '1668375495', 'محمد سليمان', '50703366', '17\r\n', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `booking_producer`
--

CREATE TABLE `booking_producer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `mhtwa` varchar(255) DEFAULT NULL,
  `counter` int(11) DEFAULT NULL,
  `counter2` int(11) DEFAULT NULL,
  `dateadd` varchar(255) DEFAULT NULL,
  `warranty` varchar(255) DEFAULT NULL,
  `comment` text,
  `text1` varchar(255) DEFAULT NULL,
  `text2` varchar(255) DEFAULT NULL,
  `text3` varchar(255) DEFAULT NULL,
  `text4` varchar(255) DEFAULT NULL,
  `text5` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking_producer`
--

INSERT INTO `booking_producer` (`id`, `name`, `model`, `company`, `mhtwa`, `counter`, `counter2`, `dateadd`, `warranty`, `comment`, `text1`, `text2`, `text3`, `text4`, `text5`) VALUES
(1, 'سلفر 55', 'اكورا', 'اليوسفي', 'تلفزيون', 0, NULL, '1598196786', '', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 'سلفر 55', 'اكورا', 'اليوسفي', 'تلفزيون', 0, NULL, '1598196786', '', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'سلفر 55', 'اكورا', 'اليوسفي', 'تلفزيون', 0, NULL, '1598196786', '', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'سلفر 55', 'اكورا', 'اليوسفي', 'تلفزيون', 0, NULL, '1598196786', '', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 'سلفر 55', 'اكورا', 'اليوسفي', 'تلفزيون', 0, NULL, '1598196786', '', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'سلفر 55', 'اكورا', 'اليوسفي', 'تلفزيون', 0, NULL, '1598196786', '', NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'سلفر 55', 'اكورا', 'اليوسفي', 'تلفزيون', 0, NULL, '1598196786', '', NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'سلفر 55', 'اكورا', 'اليوسفي', 'تلفزيون', 1, 0, '1598196786', '', 'نقل الى شقة :1 - ||1598196915||ابو محسن<aln3esa>', NULL, NULL, NULL, NULL, NULL),
(9, 'سلفر 55', 'اكورا', 'اليوسفي', 'تلفزيون', 0, NULL, '1598196786', '', NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'سلفر 55', 'اكورا', 'اليوسفي', 'تلفزيون', 0, NULL, '1598196786', '', NULL, NULL, NULL, NULL, NULL, NULL),
(11, 'سلفر 55', 'اكورا', 'اليوسفي', 'تلفزيون', 1004, 1, '1598196786', '', 'نقل الى شقة :1004 - الصالة||1598196951||<aln3esa>', NULL, NULL, NULL, NULL, NULL),
(12, 'سلفر 55', 'اكورا', 'اليوسفي', 'تلفزيون', 1001, 1, '1598196786', '', 'نقل الى شقة :1001 - الصالة||1598196966||<aln3esa>', NULL, NULL, NULL, NULL, NULL),
(13, 'سلفر 55', 'اكورا', 'اليوسفي', 'تلفزيون', 0, NULL, '1598196786', '', NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'سلفر 55', 'اكورا', 'اليوسفي', 'تلفزيون', 0, NULL, '1598196786', '', NULL, NULL, NULL, NULL, NULL, NULL),
(15, 'سلفر 50', 'سكاي ورث', 'اليوسفي', 'تلفزيون', 0, NULL, '1598196835', '', NULL, NULL, NULL, NULL, NULL, NULL),
(16, 'سلفر 50', 'سكاي ورث', 'اليوسفي', 'تلفزيون', 0, NULL, '1598196835', '', NULL, NULL, NULL, NULL, NULL, NULL),
(17, 'سلفر 50', 'سكاي ورث', 'اليوسفي', 'تلفزيون', 0, NULL, '1598196835', '', NULL, NULL, NULL, NULL, NULL, NULL),
(18, 'سلفر 50', 'سكاي ورث', 'اليوسفي', 'تلفزيون', 0, NULL, '1598196835', '', NULL, NULL, NULL, NULL, NULL, NULL),
(19, 'سلفر 50', 'سكاي ورث', 'اليوسفي', 'تلفزيون', 0, NULL, '1598196835', '', NULL, NULL, NULL, NULL, NULL, NULL),
(20, 'سلفر 50', 'سكاي ورث', 'اليوسفي', 'تلفزيون', 0, NULL, '1598196835', '', NULL, NULL, NULL, NULL, NULL, NULL),
(21, 'سلفر 50', 'سكاي ورث', 'اليوسفي', 'تلفزيون', 0, NULL, '1598196835', '', NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'سلفر 50', 'سكاي ورث', 'اليوسفي', 'تلفزيون', 0, NULL, '1598196835', '', NULL, NULL, NULL, NULL, NULL, NULL),
(23, 'سلفر 50', 'سكاي ورث', 'اليوسفي', 'تلفزيون', 0, NULL, '1598196835', '', NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'سلفر 50', 'سكاي ورث', 'اليوسفي', 'تلفزيون', 0, NULL, '1598196835', '', NULL, NULL, NULL, NULL, NULL, NULL),
(25, 'سلفر 50', 'سكاي ورث', 'اليوسفي', 'تلفزيون', 0, NULL, '1598196835', '', NULL, NULL, NULL, NULL, NULL, NULL),
(26, 'سلفر 50', 'سكاي ورث', 'اليوسفي', 'تلفزيون', 0, NULL, '1598196835', '', NULL, NULL, NULL, NULL, NULL, NULL),
(27, 'سلفر 50', 'سكاي ورث', 'اليوسفي', 'تلفزيون', 0, NULL, '1598196835', '', NULL, NULL, NULL, NULL, NULL, NULL),
(28, 'سلفر 50', 'سكاي ورث', 'اليوسفي', 'تلفزيون', 0, NULL, '1598196835', '', NULL, NULL, NULL, NULL, NULL, NULL),
(29, 'سلفر 50', 'سكاي ورث', 'اليوسفي', 'تلفزيون', 0, 0, '1598196835', '', 'نقل الى شقة :1 - ||1598196856||الللا اساليمة<aln3esa>نقل الى شقة :0 - ||1598196896||بالغلط<aln3esa>', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking_raoter`
--

CREATE TABLE `booking_raoter` (
  `id` int(11) NOT NULL,
  `text1` varchar(255) DEFAULT NULL,
  `text2` varchar(255) DEFAULT NULL,
  `text3` varchar(255) DEFAULT NULL,
  `text4` varchar(255) DEFAULT NULL,
  `text5` varchar(255) DEFAULT NULL,
  `text6` varchar(255) DEFAULT NULL,
  `text7` varchar(255) DEFAULT NULL,
  `text8` varchar(255) DEFAULT NULL,
  `text9` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `booking_rating`
--

CREATE TABLE `booking_rating` (
  `id` int(11) NOT NULL,
  `rat1` int(11) DEFAULT '0',
  `rat2` int(11) DEFAULT '0',
  `rat3` int(11) DEFAULT '0',
  `rat4` int(11) DEFAULT '0',
  `rat5` int(11) DEFAULT '0',
  `ratall` int(11) DEFAULT '0',
  `md5id` varchar(255) DEFAULT NULL,
  `dateadd` varchar(255) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `idbook` int(11) DEFAULT '0',
  `comment` text NOT NULL,
  `cid` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `booking_rooms`
--

CREATE TABLE `booking_rooms` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `door` varchar(255) DEFAULT NULL,
  `conter` varchar(255) DEFAULT NULL,
  `datetext3` varchar(255) DEFAULT NULL,
  `datetext4` varchar(255) DEFAULT NULL,
  `cnetomla` varchar(255) DEFAULT NULL,
  `comment` text,
  `noa` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `booking_rooms`
--

INSERT INTO `booking_rooms` (`id`, `name`, `door`, `conter`, `datetext3`, `datetext4`, `cnetomla`, `comment`, `noa`) VALUES
(2, '102', '1', '1', '1557098760', '', '', '', '1'),
(7, '201', '2', '3', '1558242389', '', 'يوجد الخادمه تبع ابو سالم حسب تعليماته', 'حامل فوط وملابس|47|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##تلفزيون|2|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##جلسة يسار|117|1##كومودينو قياس 50 يمين|125|3##التليفون|138|1##خزانة ملابس|52|3##ستارة|102|3##سرير قياس  120   يسار|87|3##سرير قياس 120 يمين|124|3##كومودينو قياس 50 يسار|126|3##مرتبة سرير 120يمين|132|3##بوتوجاز (طباخ)|35|4##سخان حراري|21|4##مرتبة سرير 120يسار|133|3##', '1'),
(8, '202', '2', '1', '1558270847', '', 'ابوالعز ', 'حامل فوط وملابس|47|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##غلاية مياه|29|4##مايكرويف|20|4##ثلاجة|18|4##طاولة تلفزيون|114|1##التليفون|138|1##تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريموت التفزيون|4|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة صغيرة|7|1##ابجورة يسار|136|2##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##مرتبة سرير 200x180 سم|15|2##ابجورة|1|1##ريموت الرسيفر|115|1##كومودينو يمين|25|2##ابجورة|105|3##ستارة|102|3##سرير قياس  120   يسار|87|3##سرير قياس 120 يمين|124|3##كومودينو قياس 50 يمين|125|3##مرتبة سرير 120يمين|132|3##خزانة ملابس|52|3##مرتبة سرير 120يسار|133|3##بوتوجاز (طباخ)|35|4##سخان حراري|21|4##ريسيفر|3|1##', '1'),
(9, '203', '2', '1', '1558225151', '', 'تكييف عطلان ', 'جلسة يسار|117|1##طاولة تلفزيون|114|1##خزانة ملابس|9|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##ابجورة يمين|16|2##ابجورة يسار|136|2##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##حامل فوط وملابس|47|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##التليفون|138|1##ستارة|17|2##ابجورة|1|1##تلفزيون|2|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة صغيرة|7|1##لوحة صغيرة|116|1##لوحة كبيرة|8|1##ابجورة|105|3##خزانة ملابس|52|3##ستارة|102|3##سرير قياس  120   يسار|87|3##سرير قياس 120 يمين|124|3##كومودينو قياس 50 يمين|125|3##مرتبة سرير 120يسار|133|3##مرتبة سرير 120يمين|132|3##بوتوجاز (طباخ)|35|4##سخان حراري|21|4##', '1'),
(10, '204', '2', '3', '1558229126', '', 'صيانه سباكه', 'جلسة يسار|117|1##جلسة يمين|26|1##طاولة تلفزيون|114|1##خزانة ملابس|9|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##ابجورة يمين|16|2##ابجورة يسار|136|2##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##حامل فوط وملابس|47|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##التليفون|138|1##ستارة|17|2##ابجورة|1|1##تلفزيون|2|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة صغيرة|7|1##لوحة صغيرة|116|1##لوحة كبيرة|8|1##بوتوجاز (طباخ)|35|4##سخان حراري|21|4##سرير قياس 120 يمين|124|3##سرير قياس  120   يسار|87|3##خزانة ملابس|52|3##ستارة|102|3##مرتبة سرير 120يسار|133|3##مرتبة سرير 180|135|3##مرتبة سرير 120يمين|132|3##', '1'),
(11, '301', '3', '1', '1558271346', '', 'رش ', 'ابجورة|1|1##تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##ابجورة يسار|136|2##ابجورة يمين|16|2##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##غلاية مياه|29|4##مايكرويف|20|4##حامل فوط وملابس|47|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##التليفون|138|1##مرتبة|143|4##سرير قياس 120 يمين|124|3##سرير قياس  120   يسار|87|3##ستارة|102|3##خزانة ملابس|52|3##مرتبة سرير 120يسار|133|3##مرتبة سرير 120يمين|132|3##سخان حراري|21|4##ثلاجة|18|4##بوتوجاز (طباخ)|35|4##', '3'),
(12, '302', '3', '1', '1558226846', '', 'التكيف حار ', 'ابجورة|1|1##تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##حامل فوط وملابس|47|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##التليفون|138|1##مرتبة|143|4##سرير قياس 120 يمين|124|3##سرير قياس  120   يسار|87|3##خزانة ملابس|52|3##ستارة|102|3##مرتبة سرير 120يسار|133|3##مرتبة سرير 120يمين|132|3##كومودينو قياس 50 يسار|126|3##ابجورة|105|3##سخان حراري|21|4##بوتوجاز (طباخ)|35|4##', '3'),
(13, '303', '3', '1', '1558273732', '', 'تكييف', 'تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##ابجورة يسار|136|2##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##حامل فوط وملابس|47|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##التليفون|138|1##مرتبة|143|4##سرير قياس 120 يمين|124|3##سرير قياس  120   يسار|87|3##ستارة|102|3##خزانة ملابس|52|3##مرتبة سرير 120يمين|132|3##مرتبة سرير 120يسار|133|3##سخان حراري|21|4##بوتوجاز (طباخ)|35|4##', '3'),
(14, '304', '3', '1', '1558220536', '', 'تكييف', 'تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##باب الشقة|67|1##ماسك باب الشقة|68|1##ابجورة يسار|136|2##ابجورة يمين|16|2##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##ابجورة|105|3##ستارة|102|3##غلاية مياه|29|4##مايكرويف|20|4##ثلاجة|18|4##حامل فوط وملابس|47|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##التليفون|138|1##كومودينو قياس 50 يسار|126|3##كومودينو قياس 50 يمين|125|3##مرتبة سرير 120يمين|132|3##مرتبة سرير 120يسار|133|3##خزانة ملابس|52|3##سرير قياس  120   يسار|87|3##سرير قياس 120 يمين|124|3##غسالة|19|4##ابجورة|1|1##بوتوجاز (طباخ)|35|4##سخان حراري|21|4##', '3'),
(15, '401', '4', '1', '1558221612', '', 'كثر فى ماسورة مطافى يحتاج تكسير الديكور وتصليح ', 'ابجورة|1|1##التليفون|138|1##تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##لوحة صغيرة|116|1##لوحة كبيرة|8|1##باب الشقة|67|1##ماسك باب الشقة|68|1##ابجورة يسار|136|2##ابجورة يمين|16|2##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##ابجورة|105|3##ستارة|102|3##سرير قياس  120   يسار|87|3##سرير قياس 120 يمين|124|3##مرتبة سرير 120يسار|133|3##مرتبة سرير 120يمين|132|3##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##حامل فوط وملابس|47|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##سخان حراري|21|4##بوتوجاز (طباخ)|35|4##خزانة ملابس|52|3##', '1'),
(16, '402', '4', '1', '1558227048', '', 'رش', 'ابجورة|1|1##تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##باب الشقة|67|1##ماسك باب الشقة|68|1##ابجورة يسار|136|2##ابجورة يمين|16|2##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##ابجورة|105|3##ستارة|102|3##كومودينو قياس 50 يسار|126|3##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##باب المطبخ|57|4##ماسك باب المطبخ|56|4##ادوات المطبخ|107|4##حامل فوط وملابس|47|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##التليفون|138|1##خزانة ملابس|52|3##سرير قياس  120   يسار|87|3##سرير قياس 120 يمين|124|3##مرتبة سرير 120يمين|132|3##مرتبة سرير 120يسار|133|3##سخان حراري|21|4##بوتوجاز (طباخ)|35|4##', '3'),
(17, '403', '4', '1', '1558217435', '', 'كهربا', 'ابجورة|1|1##تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##لوحة صغيرة|116|1##باب الشقة|67|1##ماسك باب الشقة|68|1##ابجورة يسار|136|2##ابجورة يمين|16|2##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##باب الحمام الماستر|84|2##باب الغرفة الماستر|49|2##ماسك باب الغرفة الماستر|53|2##غطاء او قاعدة كرسى الحمام|74|2##مقبض الحمام الماستر|85|2##ستارة|102|3##سرير قياس  120   يسار|87|3##سرير قياس 120 يمين|124|3##مرتبة سرير 120يمين|132|3##باب الغرفة الصغيرة|50|3##مقبض باب الغرفة الصغيرة|54|3##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##باب المطبخ|57|4##ماسك باب المطبخ|56|4##ادوات المطبخ|107|4##باب الحمام|51|5##ماسك باب الحمام|55|5##حامل فوط وملابس|82|6##علبة محارم|80|6##حامل فوط وملابس|47|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##التليفون|138|1##مرتبة سرير 120يسار|133|3##خزانة ملابس|52|3##سخان حراري|21|4##بوتوجاز (طباخ)|35|4##', '3'),
(18, '404', '4', '1', '1558223078', '', 'رش', 'تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##لوحة صغيرة|116|1##لوحة كبيرة|8|1##باب الشقة|67|1##ماسك باب الشقة|68|1##ابجورة يسار|136|2##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##باب الحمام الماستر|84|2##باب الغرفة الماستر|49|2##ماسك باب الغرفة الماستر|53|2##غطاء او قاعدة كرسى الحمام|74|2##مقبض الحمام الماستر|85|2##ابجورة|105|3##ستارة|102|3##كومودينو قياس 50 يسار|126|3##كومودينو قياس 50 يمين|125|3##باب الغرفة الصغيرة|50|3##مقبض باب الغرفة الصغيرة|54|3##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##باب المطبخ|57|4##ماسك باب المطبخ|56|4##ادوات المطبخ|107|4##حامل فوط وملابس|47|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##باب الحمام|51|5##ماسك باب الحمام|55|5##علبة محارم|44|5##حامل فوط وملابس|82|6##علبة محارم|80|6##التليفون|138|1##مرتبة سرير 120يمين|132|3##خزانة ملابس|52|3##مرتبة سرير 120يسار|133|3##سخان حراري|21|4##بوتوجاز (طباخ)|35|4##بوتوجاز (طباخ)|35|4##سرير قياس 120 يمين|124|3##سرير قياس  120   يسار|87|3##', '1'),
(19, '501', '5', '1', '1558231711', '', 'ابو سالم', 'ابجورة|1|1##تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##لوحة صغيرة|116|1##لوحة كبيرة|8|1##باب الشقة|67|1##ماسك باب الشقة|68|1##ابجورة يسار|136|2##ابجورة يمين|16|2##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##باب الحمام الماستر|84|2##باب الغرفة الماستر|49|2##ماسك باب الغرفة الماستر|53|2##عدد 2 غطاء وسادة نوم|73|2##عدد 2 وسادة نوم|72|2##غطاء المرتبة  200x180 سم|11|2##غطاء او قاعدة كرسى الحمام|74|2##غطاء لحاف|71|2##فرش السرير|69|2##لحاف|70|2##مقبض الحمام الماستر|85|2##ستارة|102|3##سرير قياس  120   يسار|87|3##سرير قياس 120 يمين|124|3##مرتبة سرير 120يسار|133|3##مرتبة سرير 120يمين|132|3##باب الغرفة الصغيرة|50|3##مقبض باب الغرفة الصغيرة|54|3##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##باب المطبخ|57|4##ماسك باب المطبخ|56|4##ادوات المطبخ|107|4##حامل فوط وملابس|47|5##مرايا|65|5##باب الحمام|51|5##ماسك باب الحمام|55|5##ادوات الحمام|106|5##علبة محارم|44|5##حامل فوط وملابس|82|6##علبة محارم|80|6##التليفون|138|1##خزانة ملابس|52|3##سخان حراري|21|4##', '1'),
(20, '502', '5', '1', '1558270025', '', 'التكيف حار ', 'ابجورة|1|1##تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##لوحة صغيرة|116|1##لوحة كبيرة|8|1##باب الشقة|67|1##ماسك باب الشقة|68|1##ابجورة يسار|136|2##ابجورة يمين|16|2##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##باب الحمام الماستر|84|2##باب الغرفة الماستر|49|2##ماسك باب الغرفة الماستر|53|2##عدد 2 غطاء وسادة نوم|73|2##عدد 2 وسادة نوم|72|2##غطاء المرتبة  200x180 سم|11|2##غطاء او قاعدة كرسى الحمام|74|2##غطاء لحاف|71|2##فرش السرير|69|2##لحاف|70|2##مقبض الحمام الماستر|85|2##ابجورة|105|3##ستارة|102|3##كومودينو قياس 50 يسار|126|3##كومودينو قياس 50 يمين|125|3##باب الغرفة الصغيرة|50|3##مقبض باب الغرفة الصغيرة|54|3##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##باب المطبخ|57|4##ماسك باب المطبخ|56|4##ادوات المطبخ|107|4##حامل فوط وملابس|47|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##باب الحمام|51|5##ماسك باب الحمام|55|5##ادوات الحمام|106|5##علبة محارم|44|5##حامل فوط وملابس|82|6##علبة محارم|80|6##التليفون|138|1##خزانة ملابس|52|3##مرتبة سرير 120يمين|132|3##مرتبة سرير 120يسار|133|3##سخان حراري|21|4##بوتوجاز (طباخ)|35|4##سرير قياس 120 يمين|124|3##سرير قياس  120   يسار|87|3##', '3'),
(21, '503', '5', '1', '1558218143', '', 'صيانه', 'ابجورة|1|1##تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##لوحة صغيرة|116|1##لوحة كبيرة|8|1##باب الشقة|67|1##ماسك باب الشقة|68|1##ابجورة يسار|136|2##ابجورة يمين|16|2##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##باب الحمام الماستر|84|2##باب الغرفة الماستر|49|2##ماسك باب الغرفة الماستر|53|2##عدد 2 غطاء وسادة نوم|73|2##عدد 2 وسادة نوم|72|2##غطاء المرتبة  200x180 سم|11|2##غطاء او قاعدة كرسى الحمام|74|2##غطاء لحاف|71|2##فرش السرير|69|2##لحاف|70|2##مقبض الحمام الماستر|85|2##ستارة|102|3##سرير قياس  120   يسار|87|3##سرير قياس 120 يمين|124|3##مرتبة سرير 120يسار|133|3##مرتبة سرير 120يمين|132|3##باب الغرفة الصغيرة|50|3##مقبض باب الغرفة الصغيرة|54|3##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##باب المطبخ|57|4##ماسك باب المطبخ|56|4##ادوات المطبخ|107|4##حامل فوط وملابس|47|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##باب الحمام|51|5##ماسك باب الحمام|55|5##ادوات الحمام|106|5##علبة محارم|44|5##حامل فوط وملابس|82|6##علبة محارم|80|6##التليفون|138|1##خزانة ملابس|52|3##سخان حراري|21|4##بوتوجاز (طباخ)|35|4##', '3'),
(22, '504', '5', '1', '1557784285', '', 'صيانه الباب الرئيسى والدولاب الغرفه', 'ابجورة|1|1##تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##لوحة صغيرة|116|1##لوحة كبيرة|8|1##باب الشقة|67|1##ماسك باب الشقة|68|1##ابجورة يسار|136|2##ابجورة يمين|16|2##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##باب الحمام الماستر|84|2##باب الغرفة الماستر|49|2##ماسك باب الغرفة الماستر|53|2##عدد 2 غطاء وسادة نوم|73|2##عدد 2 وسادة نوم|72|2##غطاء المرتبة  200x180 سم|11|2##غطاء او قاعدة كرسى الحمام|74|2##غطاء لحاف|71|2##فرش السرير|69|2##لحاف|70|2##مقبض الحمام الماستر|85|2##ابجورة|105|3##ستارة|102|3##كومودينو قياس 50 يسار|126|3##كومودينو قياس 50 يمين|125|3##باب الغرفة الصغيرة|50|3##مقبض باب الغرفة الصغيرة|54|3##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##باب المطبخ|57|4##ماسك باب المطبخ|56|4##ادوات المطبخ|107|4##حامل فوط وملابس|47|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##باب الحمام|51|5##ماسك باب الحمام|55|5##ادوات الحمام|106|5##علبة محارم|44|5##حامل فوط وملابس|82|6##علبة محارم|80|6##التليفون|138|1##خزانة ملابس|52|3##خزانة ملابس|52|3##مرتبة سرير 120يمين|132|3##مرتبة سرير 120يسار|133|3##سرير 90|142|4##بوتوجاز (طباخ)|35|4##سخان حراري|21|4##سرير قياس  120   يسار|87|3##سرير قياس 120 يمين|124|3##', '1'),
(23, '601', '6', '1', '1558224291', '', 'تكيف لايعمل ', 'ابجورة|1|1##تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##باب الشقة|67|1##ماسك باب الشقة|68|1##ابجورة يسار|136|2##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##مرتبة سرير 200x180 سم|15|2##باب الحمام الماستر|84|2##باب الغرفة الماستر|49|2##ماسك باب الغرفة الماستر|53|2##عدد 2 غطاء وسادة نوم|73|2##عدد 2 وسادة نوم|72|2##غطاء المرتبة  200x180 سم|11|2##غطاء او قاعدة كرسى الحمام|74|2##غطاء لحاف|71|2##فرش السرير|69|2##لحاف|70|2##مقبض الحمام الماستر|85|2##ستارة|102|3##سرير قياس  120   يسار|87|3##سرير قياس 120 يمين|124|3##مرتبة سرير 120يسار|133|3##مرتبة سرير 120يمين|132|3##باب الغرفة الصغيرة|50|3##مقبض باب الغرفة الصغيرة|54|3##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##باب المطبخ|57|4##ماسك باب المطبخ|56|4##ادوات المطبخ|107|4##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##باب الحمام|51|5##ماسك باب الحمام|55|5##ادوات الحمام|106|5##علبة محارم|44|5##حامل فوط وملابس|82|6##علبة محارم|80|6##التليفون|138|1##خزانة ملابس|52|3##بوتوجاز (طباخ)|35|4##سخان حراري|21|4##', '1'),
(24, '602', '6', '1', '1558226970', '', 'تكييف', 'ابجورة|1|1##التليفون|138|1##تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##باب الشقة|67|1##ماسك باب الشقة|68|1##ابجورة يسار|136|2##ابجورة يمين|16|2##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##باب الحمام الماستر|84|2##باب الغرفة الماستر|49|2##ماسك باب الغرفة الماستر|53|2##عدد 2 غطاء وسادة نوم|73|2##عدد 2 وسادة نوم|72|2##غطاء المرتبة  200x180 سم|11|2##غطاء او قاعدة كرسى الحمام|74|2##غطاء لحاف|71|2##فرش السرير|69|2##لحاف|70|2##مقبض الحمام الماستر|85|2##ابجورة|105|3##ستارة|102|3##كومودينو قياس 50 يسار|126|3##باب الغرفة الصغيرة|50|3##عدد 2 لحاف|90|3##مقبض باب الغرفة الصغيرة|54|3##عدد 2 غطاء لحاف|91|3##عدد 2 وسادة نوم|92|3##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##باب المطبخ|57|4##ماسك باب المطبخ|56|4##ادوات المطبخ|107|4##حامل فوط وملابس|47|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##باب الحمام|51|5##ماسك باب الحمام|55|5##ادوات الحمام|106|5##علبة محارم|44|5##حامل فوط وملابس|82|6##علبة محارم|80|6##مرتبة سرير 120يمين|132|3##مرتبة سرير 120يسار|133|3##خزانة ملابس|52|3##سخان حراري|21|4##بوتوجاز (طباخ)|35|4##سرير قياس 120 يمين|124|3##سرير قياس  120   يسار|87|3##', '3'),
(25, '603', '6', '1', NULL, NULL, 'تكييف', 'ابجورة|1|1##تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##باب الشقة|67|1##ماسك باب الشقة|68|1##ابجورة يسار|136|2##ابجورة يمين|16|2##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##باب الحمام الماستر|84|2##باب الغرفة الماستر|49|2##ماسك باب الغرفة الماستر|53|2##عدد 2 غطاء وسادة نوم|73|2##عدد 2 وسادة نوم|72|2##غطاء المرتبة  200x180 سم|11|2##غطاء او قاعدة كرسى الحمام|74|2##غطاء لحاف|71|2##فرش السرير|69|2##لحاف|70|2##مقبض الحمام الماستر|85|2##ابجورة|105|3##ستارة|102|3##سرير قياس  120   يسار|87|3##سرير قياس 120 يمين|124|3##مرتبة سرير 120يسار|133|3##مرتبة سرير 120يمين|132|3##باب الغرفة الصغيرة|50|3##مقبض باب الغرفة الصغيرة|54|3##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##باب المطبخ|57|4##ماسك باب المطبخ|56|4##ادوات المطبخ|107|4##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##باب الحمام|51|5##ماسك باب الحمام|55|5##ادوات الحمام|106|5##علبة محارم|44|5##حامل فوط وملابس|82|6##علبة محارم|80|6##التليفون|138|1##كومودينو قياس 50 يسار|126|3##خزانة ملابس|52|3##بوتوجاز (طباخ)|35|4##سخان حراري|21|4##', '3'),
(26, '604', '6', '1', NULL, NULL, 'انترنت', 'ابجورة|1|1##تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##لوحة صغيرة|116|1##لوحة كبيرة|8|1##باب الشقة|67|1##ماسك باب الشقة|68|1##ابجورة يسار|136|2##ابجورة يمين|16|2##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##باب الحمام الماستر|84|2##باب الغرفة الماستر|49|2##ماسك باب الغرفة الماستر|53|2##عدد 2 غطاء وسادة نوم|73|2##عدد 2 وسادة نوم|72|2##غطاء المرتبة  200x180 سم|11|2##غطاء او قاعدة كرسى الحمام|74|2##غطاء لحاف|71|2##فرش السرير|69|2##لحاف|70|2##مقبض الحمام الماستر|85|2##ابجورة|105|3##ستارة|102|3##كومودينو قياس 50 يسار|126|3##كومودينو قياس 50 يمين|125|3##باب الغرفة الصغيرة|50|3##مقبض باب الغرفة الصغيرة|54|3##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##باب المطبخ|57|4##ماسك باب المطبخ|56|4##ادوات المطبخ|107|4##حامل فوط وملابس|47|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##باب الحمام|51|5##ماسك باب الحمام|55|5##ادوات الحمام|106|5##علبة محارم|44|5##حامل فوط وملابس|82|6##علبة محارم|80|6##التليفون|138|1##خزانة ملابس|52|3##مرتبة سرير 120يسار|133|3##مرتبة سرير 120يمين|132|3##سخان حراري|21|4##بوتوجاز (طباخ)|35|4##سرير قياس 120 يمين|124|3##سرير قياس  120   يسار|87|3##', '1'),
(27, '701', '7', '1', NULL, NULL, 'ابو سالم', 'ابجورة|1|1##تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##لوحة صغيرة|116|1##لوحة كبيرة|8|1##باب الشقة|67|1##ماسك باب الشقة|68|1##ابجورة يسار|136|2##ابجورة يمين|16|2##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##ستارة|102|3##سرير قياس  120   يسار|87|3##سرير قياس 120 يمين|124|3##كومودينو قياس 60 وسط سريرين|59|3##مرتبة سرير 120يسار|133|3##مرتبة سرير 120يمين|132|3##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##باب المطبخ|57|4##ماسك باب المطبخ|56|4##حامل فوط وملابس|47|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##باب الحمام|51|5##ماسك باب الحمام|55|5##علبة محارم|44|5##التليفون|138|1##خزانة ملابس|52|3##سخان حراري|21|4##بوتوجاز (طباخ)|35|4##', '1'),
(28, '702', '7', '1', NULL, NULL, 'كهربا', 'ابجورة|1|1##التليفون|138|1##تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##لوحة صغيرة|116|1##لوحة كبيرة|8|1##باب الشقة|67|1##ماسك باب الشقة|68|1##ابجورة يسار|136|2##ابجورة يمين|16|2##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##باب الحمام الماستر|84|2##باب الغرفة الماستر|49|2##ماسك باب الغرفة الماستر|53|2##مقبض الحمام الماستر|85|2##ابجورة|105|3##ستارة|102|3##كومودينو قياس 50 يسار|126|3##كومودينو قياس 50 يمين|125|3##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##باب المطبخ|57|4##ماسك باب المطبخ|56|4##ادوات المطبخ|107|4##حامل فوط وملابس|47|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##باب الحمام|51|5##ماسك باب الحمام|55|5##علبة محارم|44|5##حامل فوط وملابس|82|6##علبة محارم|80|6##خزانة ملابس|52|3##مرتبة سرير 120يمين|132|3##مرتبة سرير 120يسار|133|3##سخان حراري|21|4##بوتوجاز (طباخ)|35|4##سرير قياس 120 يمين|124|3##سرير قياس  120   يسار|87|3##', '3'),
(29, '703', '7', '1', NULL, NULL, 'رش مبيد', 'ابجورة|1|1##التليفون|138|1##تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##لوحة صغيرة|116|1##لوحة كبيرة|8|1##باب الشقة|67|1##ماسك باب الشقة|68|1##ابجورة يسار|136|2##ابجورة يمين|16|2##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##باب الحمام الماستر|84|2##باب الغرفة الماستر|49|2##ماسك باب الغرفة الماستر|53|2##عدد 2 غطاء وسادة نوم|73|2##عدد 2 وسادة نوم|72|2##غطاء المرتبة  200x180 سم|11|2##غطاء او قاعدة كرسى الحمام|74|2##غطاء لحاف|71|2##فرش السرير|69|2##لحاف|70|2##مقبض الحمام الماستر|85|2##ابجورة|105|3##ستارة|102|3##سرير قياس  120   يسار|87|3##سرير قياس 120 يمين|124|3##كومودينو قياس 60 وسط سريرين|59|3##مرتبة سرير 120يسار|133|3##مرتبة سرير 120يمين|132|3##باب الغرفة الصغيرة|50|3##مقبض باب الغرفة الصغيرة|54|3##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##باب المطبخ|57|4##ماسك باب المطبخ|56|4##ادوات المطبخ|107|4##حامل فوط وملابس|47|5##مرايا|65|5##باب الحمام|51|5##ماسك باب الحمام|55|5##علبة محارم|44|5##حامل فوط وملابس|82|6##علبة محارم|80|6##خزانة ملابس|52|3##بوتوجاز (طباخ)|35|4##سخان حراري|21|4##', '3'),
(30, '704', '7', '1', NULL, NULL, 'ماتور تكيف محروق', 'ابجورة|1|1##التليفون|138|1##تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##لوحة صغيرة|116|1##لوحة كبيرة|8|1##باب الشقة|67|1##ماسك باب الشقة|68|1##ابجورة يسار|136|2##ابجورة يمين|16|2##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##باب الحمام الماستر|84|2##باب الغرفة الماستر|49|2##ماسك باب الغرفة الماستر|53|2##عدد 2 غطاء وسادة نوم|73|2##عدد 2 وسادة نوم|72|2##غطاء المرتبة  200x180 سم|11|2##غطاء او قاعدة كرسى الحمام|74|2##غطاء لحاف|71|2##فرش السرير|69|2##لحاف|70|2##مقبض الحمام الماستر|85|2##ابجورة|105|3##ستارة|102|3##كومودينو قياس 50 يسار|126|3##كومودينو قياس 50 يمين|125|3##باب الغرفة الصغيرة|50|3##مقبض باب الغرفة الصغيرة|54|3##عدد 2 غطاء وسادة نوم|101|3##عدد 2 وسادة نوم|100|3##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##باب المطبخ|57|4##ماسك باب المطبخ|56|4##ادوات المطبخ|107|4##حامل فوط وملابس|47|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##باب الحمام|51|5##ماسك باب الحمام|55|5##علبة محارم|44|5##حامل فوط وملابس|82|6##علبة محارم|80|6##خزانة ملابس|52|3##مرتبة سرير 120يمين|132|3##سخان حراري|21|4##بوتوجاز (طباخ)|35|4##سرير قياس 120 يمين|124|3##سرير قياس  120   يسار|87|3##', '1'),
(1, '101', '1', '1', '1557098760', '', 'الموظفين', '', '1'),
(31, '801', '8', '1', NULL, NULL, 'كهربائى', 'ابجورة|1|1##تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##لوحة صغيرة|116|1##لوحة كبيرة|8|1##باب الشقة|67|1##ماسك باب الشقة|68|1##ابجورة يسار|136|2##ابجورة يمين|16|2##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##ستارة|102|3##سرير قياس  120   يسار|87|3##سرير قياس 120 يمين|124|3##كومودينو قياس 60 وسط سريرين|59|3##مرتبة سرير 120يسار|133|3##مرتبة سرير 120يمين|132|3##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##باب المطبخ|57|4##ماسك باب المطبخ|56|4##حامل فوط وملابس|47|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##باب الحمام|51|5##ماسك باب الحمام|55|5##علبة محارم|44|5##التليفون|138|1##خزانة ملابس|52|3##بوتوجاز (طباخ)|35|4##سخان حراري|21|4##', '1'),
(32, '802', '8', '1', NULL, NULL, 'رش مبيد', 'ابجورة|1|1##التليفون|138|1##تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##لوحة صغيرة|116|1##لوحة كبيرة|8|1##باب الشقة|67|1##ماسك باب الشقة|68|1##ابجورة يسار|136|2##ابجورة يمين|16|2##خزانة ملابس|9|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##باب الحمام الماستر|84|2##باب الغرفة الماستر|49|2##ماسك باب الغرفة الماستر|53|2##مقبض الحمام الماستر|85|2##ابجورة|105|3##ستارة|102|3##كومودينو قياس 50 يسار|126|3##كومودينو قياس 50 يمين|125|3##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##باب المطبخ|57|4##ماسك باب المطبخ|56|4##ادوات المطبخ|107|4##حامل فوط وملابس|47|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##باب الحمام|51|5##ماسك باب الحمام|55|5##علبة محارم|44|5##حامل فوط وملابس|82|6##علبة محارم|80|6##ستارة|17|2##خزانة ملابس|52|3##مرتبة سرير 120يمين|132|3##مرتبة سرير 120يسار|133|3##بوتوجاز (طباخ)|35|4##سخان حراري|21|4##سرير قياس 120 يمين|124|3##سرير قياس  120   يسار|87|3##', '3'),
(33, '803', '8', '1', NULL, NULL, 'رش مبيد', 'ابجورة|1|1##التليفون|138|1##تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##باب الشقة|67|1##ماسك باب الشقة|68|1##ابجورة يسار|136|2##ابجورة يمين|16|2##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##باب الحمام الماستر|84|2##باب الغرفة الماستر|49|2##ماسك باب الغرفة الماستر|53|2##عدد 2 غطاء وسادة نوم|73|2##عدد 2 وسادة نوم|72|2##غطاء المرتبة  200x180 سم|11|2##غطاء او قاعدة كرسى الحمام|74|2##غطاء لحاف|71|2##فرش السرير|69|2##لحاف|70|2##مقبض الحمام الماستر|85|2##ابجورة|105|3##ستارة|102|3##سرير قياس  120   يسار|87|3##كومودينو قياس 60 وسط سريرين|59|3##مرتبة سرير 120يسار|133|3##مرتبة سرير 120يمين|132|3##باب الغرفة الصغيرة|50|3##مقبض باب الغرفة الصغيرة|54|3##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##باب المطبخ|57|4##ماسك باب المطبخ|56|4##ادوات المطبخ|107|4##حامل فوط وملابس|47|5##رف او حامل تحت المرايا|46|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##باب الحمام|51|5##ماسك باب الحمام|55|5##علبة محارم|44|5##حامل فوط وملابس|82|6##علبة محارم|80|6##خزانة ملابس|52|3##بوتوجاز (طباخ)|35|4##سخان حراري|21|4##سرير قياس 120 يمين|124|3##', '3'),
(34, '804', '8', '1', NULL, NULL, 'عطل بالباب', 'ابجورة|1|1##التليفون|138|1##تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##لوحة صغيرة|116|1##باب الشقة|67|1##ماسك باب الشقة|68|1##ابجورة يسار|136|2##ابجورة يمين|16|2##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##باب الحمام الماستر|84|2##باب الغرفة الماستر|49|2##ماسك باب الغرفة الماستر|53|2##عدد 2 غطاء وسادة نوم|73|2##عدد 2 وسادة نوم|72|2##غطاء المرتبة  200x180 سم|11|2##غطاء او قاعدة كرسى الحمام|74|2##غطاء لحاف|71|2##فرش السرير|69|2##لحاف|70|2##مقبض الحمام الماستر|85|2##ابجورة|105|3##ستارة|102|3##كومودينو قياس 50 يسار|126|3##كومودينو قياس 50 يمين|125|3##باب الغرفة الصغيرة|50|3##مقبض باب الغرفة الصغيرة|54|3##عدد 2 غطاء وسادة نوم|101|3##عدد 2 وسادة نوم|100|3##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##باب المطبخ|57|4##ماسك باب المطبخ|56|4##ادوات المطبخ|107|4##حامل فوط وملابس|47|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##باب الحمام|51|5##ماسك باب الحمام|55|5##علبة محارم|44|5##حامل فوط وملابس|82|6##علبة محارم|80|6##خزانة ملابس|52|3##بوتوجاز (طباخ)|35|4##سخان حراري|21|4##سرير قياس 120 يمين|124|3##سرير قياس 120 يمين|124|3##سرير قياس  120   يسار|87|3##', '1'),
(35, '901', '9', '1', NULL, NULL, 'كهربا', 'تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##لوحة صغيرة|116|1##باب الشقة|67|1##ماسك باب الشقة|68|1##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##ستارة|102|3##سرير قياس  120   يسار|87|3##سرير قياس 120 يمين|124|3##مرتبة سرير 120يسار|133|3##مرتبة سرير 120يمين|132|3##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##باب المطبخ|57|4##ماسك باب المطبخ|56|4##حامل فوط وملابس|47|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##باب الحمام|51|5##ماسك باب الحمام|55|5##علبة محارم|44|5##التليفون|138|1##خزانة ملابس|52|3##كومودينو قياس 50 يمين|125|3##كومودينو قياس 50 يسار|126|3##بوتوجاز (طباخ)|35|4##بوتوجاز (طباخ)|35|4##سخان حراري|21|4##', '1'),
(36, '902', '9', '1', NULL, NULL, 'رش مبيد', 'التليفون|138|1##تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##باب الشقة|67|1##ماسك باب الشقة|68|1##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##باب الحمام الماستر|84|2##باب الغرفة الماستر|49|2##ماسك باب الغرفة الماستر|53|2##مقبض الحمام الماستر|85|2##ستارة|102|3##كومودينو قياس 50 يسار|126|3##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##باب المطبخ|57|4##ماسك باب المطبخ|56|4##ادوات المطبخ|107|4##حامل فوط وملابس|47|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##باب الحمام|51|5##ماسك باب الحمام|55|5##علبة محارم|44|5##حامل فوط وملابس|82|6##علبة محارم|80|6##خزانة ملابس|52|3##سرير قياس  120   يسار|87|3##سرير قياس 120 يمين|124|3##مرتبة سرير 120يمين|132|3##بوتوجاز (طباخ)|35|4##سخان حراري|21|4##', '3'),
(37, '903', '9', '1', NULL, NULL, 'رش مبيد', 'التليفون|138|1##تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##لوحة صغيرة|116|1##باب الشقة|67|1##ماسك باب الشقة|68|1##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##باب الحمام الماستر|84|2##باب الغرفة الماستر|49|2##ماسك باب الغرفة الماستر|53|2##عدد 2 غطاء وسادة نوم|73|2##عدد 2 وسادة نوم|72|2##غطاء المرتبة  200x180 سم|11|2##غطاء او قاعدة كرسى الحمام|74|2##غطاء لحاف|71|2##فرش السرير|69|2##لحاف|70|2##مقبض الحمام الماستر|85|2##ستارة|102|3##سرير قياس  120   يسار|87|3##سرير قياس 120 يمين|124|3##مرتبة سرير 120يسار|133|3##مرتبة سرير 120يمين|132|3##باب الغرفة الصغيرة|50|3##مقبض باب الغرفة الصغيرة|54|3##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##باب المطبخ|57|4##ماسك باب المطبخ|56|4##ادوات المطبخ|107|4##حامل فوط وملابس|47|5##رف او حامل تحت المرايا|46|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##باب الحمام|51|5##ماسك باب الحمام|55|5##علبة محارم|44|5##حامل فوط وملابس|82|6##علبة محارم|80|6##خزانة ملابس|52|3##كومودينو قياس 50 يسار|126|3##بوتوجاز (طباخ)|35|4##سخان حراري|21|4##كومودينو قياس 50 يمين|125|3##علبة الصابون|45|5##', '3'),
(38, '904', '9', '1', NULL, NULL, 'كهربا', 'التليفون|138|1##تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##لوحة صغيرة|116|1##باب الشقة|67|1##ماسك باب الشقة|68|1##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##باب الحمام الماستر|84|2##باب الغرفة الماستر|49|2##ماسك باب الغرفة الماستر|53|2##عدد 2 غطاء وسادة نوم|73|2##عدد 2 وسادة نوم|72|2##غطاء المرتبة  200x180 سم|11|2##غطاء او قاعدة كرسى الحمام|74|2##غطاء لحاف|71|2##فرش السرير|69|2##لحاف|70|2##مقبض الحمام الماستر|85|2##ستارة|102|3##كومودينو قياس 50 يسار|126|3##كومودينو قياس 50 يمين|125|3##باب الغرفة الصغيرة|50|3##مقبض باب الغرفة الصغيرة|54|3##عدد 2 غطاء وسادة نوم|101|3##عدد 2 وسادة نوم|100|3##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##باب المطبخ|57|4##ماسك باب المطبخ|56|4##ادوات المطبخ|107|4##حامل فوط وملابس|47|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##باب الحمام|51|5##ماسك باب الحمام|55|5##علبة محارم|44|5##حامل فوط وملابس|82|6##علبة محارم|80|6##خزانة ملابس|9|2##مرتبة سرير 200x180 سم|15|2##خزانة ملابس|52|3##مرتبة سرير 120يمين|132|3##مرتبة سرير 120يسار|133|3##سرير قياس 120 يمين|124|3##سرير قياس  120   يسار|87|3##بوتوجاز (طباخ)|35|4##سخان حراري|21|4##ابجورة|1|1##ابجورة يسار|136|2##ابجورة يمين|16|2##علبة الصابون|45|5##', '1'),
(39, '1001', '10', '1', NULL, NULL, 'كهرباء', 'ابجورة|1|1##تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##لوحة صغيرة|116|1##لوحة كبيرة|8|1##باب الشقة|67|1##ماسك باب الشقة|68|1##ابجورة يسار|136|2##ابجورة يمين|16|2##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##ستارة|102|3##سرير قياس  120   يسار|87|3##سرير قياس 120 يمين|124|3##مرتبة سرير 120يسار|133|3##مرتبة سرير 120يمين|132|3##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##باب المطبخ|57|4##ماسك باب المطبخ|56|4##حامل فوط وملابس|47|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##باب الحمام|51|5##ماسك باب الحمام|55|5##علبة محارم|44|5##التليفون|138|1##خزانة ملابس|52|3##سخان حراري|21|4##', '1'),
(40, '1002', '10', '1', NULL, NULL, 'صيانة التكيف لايعمل ', 'ابجورة|1|1##التليفون|138|1##تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##لوحة صغيرة|116|1##لوحة كبيرة|8|1##باب الشقة|67|1##ماسك باب الشقة|68|1##ابجورة يسار|136|2##ابجورة يمين|16|2##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##باب الحمام الماستر|84|2##باب الغرفة الماستر|49|2##ماسك باب الغرفة الماستر|53|2##مقبض الحمام الماستر|85|2##ابجورة|105|3##ستارة|102|3##كومودينو قياس 50 يسار|126|3##كومودينو قياس 50 يمين|125|3##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##باب المطبخ|57|4##ماسك باب المطبخ|56|4##ادوات المطبخ|107|4##حامل فوط وملابس|47|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##باب الحمام|51|5##ماسك باب الحمام|55|5##علبة محارم|44|5##حامل فوط وملابس|82|6##علبة محارم|80|6##خزانة ملابس|52|3##مرتبة سرير 120يمين|132|3##مرتبة سرير 120يسار|133|3##بوتوجاز (طباخ)|35|4##سخان حراري|21|4##سرير قياس 120 يمين|124|3##سرير قياس  120   يسار|87|3##', '3'),
(41, '1003', '10', '1', NULL, NULL, 'فرحان', 'ابجورة|1|1##التليفون|138|1##تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##لوحة صغيرة|116|1##لوحة كبيرة|8|1##باب الشقة|67|1##ماسك باب الشقة|68|1##ابجورة يسار|136|2##ابجورة يمين|16|2##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##باب الحمام الماستر|84|2##باب الغرفة الماستر|49|2##ماسك باب الغرفة الماستر|53|2##عدد 2 غطاء وسادة نوم|73|2##عدد 2 وسادة نوم|72|2##غطاء المرتبة  200x180 سم|11|2##غطاء او قاعدة كرسى الحمام|74|2##غطاء لحاف|71|2##فرش السرير|69|2##لحاف|70|2##مقبض الحمام الماستر|85|2##ابجورة|105|3##ستارة|102|3##سرير قياس  120   يسار|87|3##سرير قياس 120 يمين|124|3##مرتبة سرير 120يسار|133|3##مرتبة سرير 120يمين|132|3##باب الغرفة الصغيرة|50|3##مقبض باب الغرفة الصغيرة|54|3##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##باب المطبخ|57|4##ماسك باب المطبخ|56|4##ادوات المطبخ|107|4##رف او حامل تحت المرايا|46|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##باب الحمام|51|5##ماسك باب الحمام|55|5##علبة محارم|44|5##حامل فوط وملابس|82|6##علبة محارم|80|6##خزانة ملابس|52|3##', '3'),
(42, '1004', '10', '1', NULL, NULL, 'كنب', 'ابجورة|1|1##التليفون|138|1##تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##لوحة صغيرة|116|1##لوحة كبيرة|8|1##باب الشقة|67|1##ماسك باب الشقة|68|1##ابجورة يسار|136|2##ابجورة يمين|16|2##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##باب الحمام الماستر|84|2##باب الغرفة الماستر|49|2##ماسك باب الغرفة الماستر|53|2##عدد 2 غطاء وسادة نوم|73|2##عدد 2 وسادة نوم|72|2##غطاء المرتبة  200x180 سم|11|2##غطاء او قاعدة كرسى الحمام|74|2##غطاء لحاف|71|2##فرش السرير|69|2##لحاف|70|2##مقبض الحمام الماستر|85|2##ابجورة|105|3##ستارة|102|3##كومودينو قياس 50 يسار|126|3##كومودينو قياس 50 يمين|125|3##باب الغرفة الصغيرة|50|3##مقبض باب الغرفة الصغيرة|54|3##عدد 2 غطاء وسادة نوم|101|3##عدد 2 وسادة نوم|100|3##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##باب المطبخ|57|4##ماسك باب المطبخ|56|4##ادوات المطبخ|107|4##حامل فوط وملابس|47|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##باب الحمام|51|5##ماسك باب الحمام|55|5##علبة محارم|44|5##حامل فوط وملابس|82|6##علبة محارم|80|6##مرتبة سرير 120يسار|133|3##بوتوجاز (طباخ)|35|4##سخان حراري|21|4##سرير قياس  120   يسار|87|3##', '1'),
(4, '104', '1', '1', NULL, NULL, 'كهربا', 'ابجورة|1|1##التليفون|138|1##تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##لوحة صغيرة|116|1##لوحة كبيرة|8|1##باب الشقة|67|1##ماسك باب الشقة|68|1##ابجورة يسار|136|2##ابجورة يمين|16|2##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##باب الحمام الماستر|84|2##باب الغرفة الماستر|49|2##ماسك باب الغرفة الماستر|53|2##عدد 2 غطاء وسادة نوم|73|2##عدد 2 وسادة نوم|72|2##غطاء المرتبة  200x180 سم|11|2##غطاء او قاعدة كرسى الحمام|74|2##غطاء لحاف|71|2##فرش السرير|69|2##لحاف|70|2##مقبض الحمام الماستر|85|2##ابجورة|105|3##ستارة|102|3##سرير قياس  120   يسار|87|3##سرير قياس 120 يمين|124|3##مرتبة سرير 120يسار|133|3##مرتبة سرير 120يمين|132|3##باب الغرفة الصغيرة|50|3##مقبض باب الغرفة الصغيرة|54|3##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##باب المطبخ|57|4##ماسك باب المطبخ|56|4##ادوات المطبخ|107|4##حامل فوط وملابس|47|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##باب الحمام|51|5##ماسك باب الحمام|55|5##علبة محارم|44|5##حامل فوط وملابس|82|6##علبة محارم|80|6##سخان حراري|21|4##بوتوجاز (طباخ)|35|4##', '2'),
(3, '103', '1', '1', NULL, NULL, 'كهربا', 'ابجورة|1|1##التليفون|138|1##تلفزيون|2|1##جلسة يسار|117|1##جلسة يمين|26|1##ريسيفر|3|1##ريموت التفزيون|4|1##ريموت الرسيفر|115|1##ستارة|58|1##طاولة اريكا كبيرة|6|1##طاولة تلفزيون|114|1##طاولة صغيرة|7|1##لوحة صغيرة|116|1##لوحة كبيرة|8|1##باب الشقة|67|1##ماسك باب الشقة|68|1##ابجورة يسار|136|2##ابجورة يمين|16|2##خزانة ملابس|9|2##ستارة|17|2##سرير مقاس 200x180 سم|10|2##كومودينو يسار|118|2##كومودينو يمين|25|2##مرتبة سرير 200x180 سم|15|2##باب الحمام الماستر|84|2##باب الغرفة الماستر|49|2##ماسك باب الغرفة الماستر|53|2##عدد 2 غطاء وسادة نوم|73|2##عدد 2 وسادة نوم|72|2##غطاء المرتبة  200x180 سم|11|2##غطاء او قاعدة كرسى الحمام|74|2##غطاء لحاف|71|2##فرش السرير|69|2##لحاف|70|2##مقبض الحمام الماستر|85|2##ابجورة|105|3##ستارة|102|3##سرير 180|134|3##كومودينو قياس 50 يسار|126|3##كومودينو قياس 50 يمين|125|3##باب الغرفة الصغيرة|50|3##مقبض باب الغرفة الصغيرة|54|3##عدد 2 غطاء وسادة نوم|101|3##عدد 2 وسادة نوم|100|3##ثلاجة|18|4##غلاية مياه|29|4##مايكرويف|20|4##باب المطبخ|57|4##ماسك باب المطبخ|56|4##ادوات المطبخ|107|4##حامل فوط وملابس|47|5##غطاء او قاعدة كرسى الحمام|48|5##مرايا|65|5##باب الحمام|51|5##ماسك باب الحمام|55|5##علبة محارم|44|5##حامل فوط وملابس|82|6##علبة محارم|80|6##مرتبة سرير 120يمين|132|3##مرتبة سرير 120يسار|133|3##بوتوجاز (طباخ)|35|4##سخان حراري|21|4##سرير قياس 120 يمين|124|3##سرير قياس  120   يسار|87|3##', '2');

-- --------------------------------------------------------

--
-- Table structure for table `booking_rooms_images`
--

CREATE TABLE `booking_rooms_images` (
  `id` int(11) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `msg` text,
  `dateadd` varchar(255) DEFAULT NULL,
  `noa` varchar(100) DEFAULT NULL,
  `room` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `booking_subscriptions`
--

CREATE TABLE `booking_subscriptions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `cid` varchar(255) DEFAULT NULL,
  `dateadd` varchar(255) DEFAULT NULL,
  `counter` varchar(255) DEFAULT NULL,
  `text1` varchar(255) DEFAULT NULL,
  `text2` varchar(255) DEFAULT NULL,
  `text3` varchar(255) DEFAULT NULL,
  `text4` varchar(255) DEFAULT NULL,
  `text5` varchar(255) DEFAULT NULL,
  `text6` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `check_types`
--

CREATE TABLE `check_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `check_types`
--

INSERT INTO `check_types` (`id`, `name`) VALUES
(1, 'نظافة'),
(2, 'استقبال'),
(3, 'كاميرات'),
(4, 'موظفين');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `model_bills3`
--

CREATE TABLE `model_bills3` (
  `id` int(11) NOT NULL,
  `counter` int(11) DEFAULT '0',
  `catid` int(11) DEFAULT '0',
  `catid2` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `dateadd` varchar(255) DEFAULT NULL,
  `text1` varchar(255) DEFAULT NULL,
  `text2` varchar(255) DEFAULT NULL,
  `text3` varchar(255) DEFAULT NULL,
  `text4` varchar(255) DEFAULT NULL,
  `text5` varchar(255) DEFAULT NULL,
  `text6` varchar(255) DEFAULT NULL,
  `text7` varchar(255) DEFAULT NULL,
  `text8` varchar(255) DEFAULT NULL,
  `text9` varchar(255) DEFAULT NULL,
  `text10` varchar(255) DEFAULT NULL,
  `text11` varchar(255) DEFAULT NULL,
  `text12` varchar(255) DEFAULT NULL,
  `text13` varchar(255) DEFAULT NULL,
  `text14` varchar(255) DEFAULT NULL,
  `text15` varchar(255) DEFAULT NULL,
  `text16` varchar(255) DEFAULT NULL,
  `text17` varchar(255) DEFAULT NULL,
  `text18` varchar(255) DEFAULT NULL,
  `text19` varchar(255) DEFAULT NULL,
  `text20` varchar(255) DEFAULT NULL,
  `text21` varchar(255) DEFAULT NULL,
  `text22` varchar(255) DEFAULT NULL,
  `text23` varchar(255) DEFAULT NULL,
  `text24` varchar(255) DEFAULT NULL,
  `text25` varchar(255) DEFAULT NULL,
  `text26` varchar(255) DEFAULT NULL,
  `text27` varchar(255) DEFAULT NULL,
  `text28` varchar(255) DEFAULT NULL,
  `text29` varchar(255) DEFAULT NULL,
  `text30` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `model_bills3_cat`
--

CREATE TABLE `model_bills3_cat` (
  `id` int(11) NOT NULL,
  `counter` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `dateadd` varchar(255) NOT NULL,
  `text1` varchar(255) NOT NULL,
  `text2` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `model_billshawly`
--

CREATE TABLE `model_billshawly` (
  `id` int(11) NOT NULL,
  `counter` int(11) DEFAULT '0',
  `catid` int(11) DEFAULT '0',
  `catid2` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `dateadd` varchar(255) DEFAULT NULL,
  `text1` varchar(255) DEFAULT NULL,
  `text2` varchar(255) DEFAULT NULL,
  `text3` varchar(255) DEFAULT NULL,
  `text4` varchar(255) DEFAULT NULL,
  `text5` varchar(255) DEFAULT NULL,
  `text6` varchar(255) DEFAULT NULL,
  `text7` varchar(255) DEFAULT NULL,
  `text8` varchar(255) DEFAULT NULL,
  `text9` varchar(255) DEFAULT NULL,
  `text10` varchar(255) DEFAULT NULL,
  `text11` varchar(255) DEFAULT NULL,
  `text12` varchar(255) DEFAULT NULL,
  `text13` varchar(255) DEFAULT NULL,
  `text14` varchar(255) DEFAULT NULL,
  `text15` varchar(255) DEFAULT NULL,
  `text16` varchar(255) DEFAULT NULL,
  `text17` varchar(255) DEFAULT NULL,
  `text18` varchar(255) DEFAULT NULL,
  `text19` varchar(255) DEFAULT NULL,
  `text20` varchar(255) DEFAULT NULL,
  `text21` varchar(255) DEFAULT NULL,
  `text22` varchar(255) DEFAULT NULL,
  `text23` varchar(255) DEFAULT NULL,
  `text24` varchar(255) DEFAULT NULL,
  `text25` varchar(255) DEFAULT NULL,
  `text26` varchar(255) DEFAULT NULL,
  `text27` varchar(255) DEFAULT NULL,
  `text28` varchar(255) DEFAULT NULL,
  `text29` varchar(255) DEFAULT NULL,
  `text30` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `model_billshawly`
--

INSERT INTO `model_billshawly` (`id`, `counter`, `catid`, `catid2`, `name`, `dateadd`, `text1`, `text2`, `text3`, `text4`, `text5`, `text6`, `text7`, `text8`, `text9`, `text10`, `text11`, `text12`, `text13`, `text14`, `text15`, `text16`, `text17`, `text18`, `text19`, `text20`, `text21`, `text22`, `text23`, `text24`, `text25`, `text26`, `text27`, `text28`, `text29`, `text30`) VALUES
(1, 1, 5, 0, NULL, '20221115', '20', 'ابوسالم  ', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 1, 2, 0, NULL, '20221115', '10', 'معطرات  ', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 1, 2, 0, NULL, '20221115', '10', '  سلفة على : طارق كمال  ', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 1, 2, 0, NULL, '20221116', '20', 'شراء ماكينة  ', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'محمد عبد النبي', '', '55006430', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 1, 2, 0, NULL, '20221116', '40', '  سلفة على : احمد محمد محمد مصطفي  ', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 1, 2, 0, NULL, '20221116', '20', '  ', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 1, 1, 0, NULL, '20221121', '220', 'ايراد 20221121  كاش ', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 1, 1, 0, NULL, '20221121', '540', 'ايراد 20221121  knet ', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `model_billshawly2`
--

CREATE TABLE `model_billshawly2` (
  `id` int(11) NOT NULL,
  `counter` int(11) DEFAULT '0',
  `catid` int(11) DEFAULT '0',
  `catid2` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `dateadd` varchar(255) DEFAULT NULL,
  `text1` varchar(255) DEFAULT NULL,
  `text2` varchar(255) DEFAULT NULL,
  `text3` varchar(255) DEFAULT NULL,
  `text4` varchar(255) DEFAULT NULL,
  `text5` varchar(255) DEFAULT NULL,
  `text6` varchar(255) DEFAULT NULL,
  `text7` varchar(255) DEFAULT NULL,
  `text8` varchar(255) DEFAULT NULL,
  `text9` varchar(255) DEFAULT NULL,
  `text10` varchar(255) DEFAULT NULL,
  `text11` varchar(255) DEFAULT NULL,
  `text12` varchar(255) DEFAULT NULL,
  `text13` varchar(255) DEFAULT NULL,
  `text14` varchar(255) DEFAULT NULL,
  `text15` varchar(255) DEFAULT NULL,
  `text16` varchar(255) DEFAULT NULL,
  `text17` varchar(255) DEFAULT NULL,
  `text18` varchar(255) DEFAULT NULL,
  `text19` varchar(255) DEFAULT NULL,
  `text20` varchar(255) DEFAULT NULL,
  `text21` varchar(255) DEFAULT NULL,
  `text22` varchar(255) DEFAULT NULL,
  `text23` varchar(255) DEFAULT NULL,
  `text24` varchar(255) DEFAULT NULL,
  `text25` varchar(255) DEFAULT NULL,
  `text26` varchar(255) DEFAULT NULL,
  `text27` varchar(255) DEFAULT NULL,
  `text28` varchar(255) DEFAULT NULL,
  `text29` varchar(255) DEFAULT NULL,
  `text30` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `model_cat_billshawly`
--

CREATE TABLE `model_cat_billshawly` (
  `id` int(11) NOT NULL,
  `counter` int(11) DEFAULT '0',
  `catid` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `dateadd` varchar(255) DEFAULT NULL,
  `text1` varchar(255) DEFAULT NULL,
  `text2` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `model_cat_billshawly2`
--

CREATE TABLE `model_cat_billshawly2` (
  `id` int(11) NOT NULL,
  `counter` int(11) DEFAULT '0',
  `catid` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `dateadd` varchar(255) DEFAULT NULL,
  `text1` varchar(255) DEFAULT NULL,
  `text2` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `model_modif`
--

CREATE TABLE `model_modif` (
  `id` int(11) NOT NULL,
  `counter` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `dateadd` varchar(255) DEFAULT NULL,
  `text1` varchar(255) DEFAULT NULL,
  `text2` varchar(255) DEFAULT NULL,
  `text3` varchar(255) DEFAULT NULL,
  `text4` varchar(255) DEFAULT NULL,
  `text5` varchar(255) DEFAULT NULL,
  `text6` varchar(255) DEFAULT NULL,
  `text7` varchar(255) DEFAULT NULL,
  `text8` varchar(255) DEFAULT NULL,
  `text9` varchar(255) DEFAULT NULL,
  `text10` varchar(255) DEFAULT NULL,
  `text11` varchar(255) DEFAULT NULL,
  `text12` varchar(255) DEFAULT NULL,
  `text13` varchar(255) DEFAULT NULL,
  `text14` varchar(255) DEFAULT NULL,
  `text15` varchar(255) DEFAULT NULL,
  `text16` varchar(255) DEFAULT NULL,
  `text17` varchar(255) DEFAULT NULL,
  `text18` varchar(255) DEFAULT NULL,
  `text19` varchar(255) DEFAULT NULL,
  `text20` varchar(255) DEFAULT NULL,
  `text21` varchar(255) DEFAULT NULL,
  `text22` varchar(255) DEFAULT NULL,
  `text23` varchar(255) DEFAULT NULL,
  `text24` varchar(255) DEFAULT NULL,
  `text25` varchar(255) DEFAULT NULL,
  `text26` varchar(255) DEFAULT NULL,
  `text27` varchar(255) DEFAULT NULL,
  `text28` varchar(255) DEFAULT NULL,
  `text29` varchar(255) DEFAULT NULL,
  `text30` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `model_numbber`
--

CREATE TABLE `model_numbber` (
  `id` int(11) NOT NULL,
  `counter` int(11) NOT NULL,
  `text6` varchar(255) NOT NULL,
  `text10` varchar(255) NOT NULL,
  `dateadd` varchar(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `model_ohda`
--

CREATE TABLE `model_ohda` (
  `id` int(11) NOT NULL,
  `counter` int(11) DEFAULT '0',
  `catid` int(11) DEFAULT '0',
  `catid2` int(11) DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `dateadd` varchar(255) DEFAULT NULL,
  `text1` varchar(255) DEFAULT NULL,
  `text2` varchar(255) DEFAULT NULL,
  `text3` varchar(255) DEFAULT NULL,
  `text4` varchar(255) DEFAULT NULL,
  `text5` varchar(255) DEFAULT NULL,
  `text6` varchar(255) DEFAULT NULL,
  `text7` varchar(255) DEFAULT NULL,
  `text8` varchar(255) DEFAULT NULL,
  `text9` varchar(255) DEFAULT NULL,
  `text10` varchar(255) DEFAULT NULL,
  `text11` varchar(255) DEFAULT NULL,
  `text12` varchar(255) DEFAULT NULL,
  `text13` varchar(255) DEFAULT NULL,
  `text14` varchar(255) DEFAULT NULL,
  `text15` varchar(255) DEFAULT NULL,
  `text16` varchar(255) DEFAULT NULL,
  `text17` varchar(255) DEFAULT NULL,
  `text18` varchar(255) DEFAULT NULL,
  `text19` varchar(255) DEFAULT NULL,
  `text20` varchar(255) DEFAULT NULL,
  `text21` varchar(255) DEFAULT NULL,
  `text22` varchar(255) DEFAULT NULL,
  `text23` varchar(255) DEFAULT NULL,
  `text24` varchar(255) DEFAULT NULL,
  `text25` varchar(255) DEFAULT NULL,
  `text26` varchar(255) DEFAULT NULL,
  `text27` varchar(255) DEFAULT NULL,
  `text28` varchar(255) DEFAULT NULL,
  `text29` varchar(255) DEFAULT NULL,
  `text30` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `md5id` varchar(50) NOT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `date1` varchar(50) DEFAULT NULL,
  `TRACKING_ID` text NOT NULL,
  `date2` varchar(150) DEFAULT NULL,
  `idtable` int(10) NOT NULL DEFAULT '0',
  `tablem` varchar(100) DEFAULT NULL,
  `STATUS` varchar(10) DEFAULT '0',
  `PAYMENT_STATUS` varchar(100) NOT NULL,
  `REFERENCE_ID` varchar(100) NOT NULL,
  `PAYMENT_TIME` varchar(100) NOT NULL,
  `AUTHORIZATION_ID` varchar(100) NOT NULL,
  `TRANSACTION_ID` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `paymentlinks`
--

CREATE TABLE `paymentlinks` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `mobile` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `md5id` varchar(100) DEFAULT NULL,
  `comment` varchar(150) DEFAULT NULL,
  `show1` int(10) DEFAULT '0',
  `date1` int(15) NOT NULL,
  `paymentdate` int(15) NOT NULL,
  `paymenttext` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `text` text CHARACTER SET utf8
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `type_id`, `text`) VALUES
(1, 1, 'هل اسقاء الاشجار والتاكد من نظافة مجرى الماي'),
(2, 1, ' هل الواجهة البناية والزجاج نظيفة؟....'),
(4, 3, 'هل تم الاتصال على العملاء المتاخرين وتاكد من مبلغ الغرامات التاخير '),
(5, 2, 'هل يوزر المستخدم مطابق للموظف في السستم '),
(6, 4, ' هل موظف يرتدي الزي الرسمي ويظهر بمظهر لائق وحالق\r\n'),
(7, 2, 'هل يوزر المستخدم مطابق للموظف في السستم تيست'),
(8, 2, 'هل يوزر المستخدم مطابق للموظف في السستم تيست2');

-- --------------------------------------------------------

--
-- Table structure for table `rep`
--

CREATE TABLE `rep` (
  `id` int(12) UNSIGNED NOT NULL,
  `comment` text,
  `user` varchar(100) DEFAULT NULL,
  `date` varchar(10) DEFAULT NULL,
  `noa` varchar(10) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rep`
--

INSERT INTO `rep` (`id`, `comment`, `user`, `date`, `noa`) VALUES
(1, '  تسجيل دخول  - 94.128.71.238', 'aln3esa', '1666947224', ''),
(2, '  تسجيل دخول  - 94.128.64.138', 'aln3esa', '1667375166', ''),
(3, '  تسجيل دخول  - 94.128.71.185', 'aln3esa', '1667786631', ''),
(4, '  تسجيل دخول  - 94.128.176.189', 'aln3esa', '1667955750', ''),
(5, '  تسجيل دخول  - 94.129.5.145', 'aln3esa', '1668161908', ''),
(6, '  تسجيل دخول  - 37.231.203.114', 'aln3esa', '1668219195', ''),
(7, '  تسجيل دخول  - 94.129.4.125', 'aln3esa', '1668524818', ''),
(8, '  تسجيل دخول  - 37.231.108.255', 'aln3esa', '1668624987', ''),
(9, '  تسجيل دخول  - 37.231.108.255', 'aln3esa', '1668628519', ''),
(10, '  البحث عن    50112921', 'محمد سليمان', '1668950396', ''),
(11, '  البحث عن    6590597', 'محمد سليمان', '1668953723', ''),
(12, '  البحث عن    6590597', 'محمد سليمان', '1668953754', ''),
(13, '  تسجيل دخول  - 37.231.241.87', 'tareq', '1668980746', ''),
(14, '  غرامة تاخير لمدة  6 ساعات دفع     0 والمطلوب 20 تسكين رقم15', 'محمد سليمان', '1669041850', ''),
(15, '  تسجيل دخول  - 37.231.254.191', 'aln3esa', '1669224476', ''),
(16, '  تسجيل دخول  - 37.231.254.191', 'aln3esa', '1669290195', ''),
(17, '  تسجيل دخول  - 37.39.232.164', 'aln3esa', '1669650321', ''),
(18, '  تسجيل دخول  - 196.132.100.223', 'aln3esa', '1669651705', ''),
(19, '  تسجيل دخول  - 37.231.161.59', 'aln3esa', '1669653725', ''),
(20, '  تسجيل دخول  - 94.128.103.201', 'aln3esa', '1669745914', ''),
(21, '  تسجيل دخول  - 94.128.196.211', 'aln3esa', '1669746037', ''),
(22, '  تسجيل دخول  - 197.39.43.67', 'aln3esa', '1669807863', ''),
(23, '  تسجيل دخول  - 197.39.43.67', 'aln3esa', '1669811141', ''),
(24, '  تسجيل دخول  - 94.128.100.167', 'aln3esa', '1669870128', ''),
(25, '  تسجيل دخول  - 78.89.162.88', 'aln3esa', '1669888921', ''),
(26, '  تسجيل دخول  - 197.39.43.67', 'aln3esa', '1669888934', ''),
(27, '  البحث عن    67769595', 'aln3esa', '1669889356', ''),
(28, '  البحث عن    67769595', 'aln3esa', '1669889486', ''),
(29, '  البحث عن    67769595', 'aln3esa', '1669890867', ''),
(30, '  البحث عن    67769595', 'aln3esa', '1669890870', ''),
(31, '  البحث عن    67769595', 'aln3esa', '1669890976', ''),
(32, '  البحث عن    67769595', 'aln3esa', '1669891125', ''),
(33, '  البحث عن    66443323', 'aln3esa', '1669891933', ''),
(34, '  البحث عن    67769595', 'aln3esa', '1669891948', ''),
(35, '  البحث عن    99199127', 'aln3esa', '1669891964', ''),
(36, '  البحث عن    55544445', 'aln3esa', '1669891997', ''),
(37, '  البحث عن    67769595', 'aln3esa', '1669893057', ''),
(38, '  تسجيل دخول  - 197.120.85.125', 'aln3esa', '1669962683', ''),
(39, '  تسجيل دخول  - 197.39.112.32', 'aln3esa', '1670156972', ''),
(40, '  تسجيل دخول  - 197.39.112.32', 'aln3esa', '1670221607', ''),
(41, '  تسجيل دخول  - 197.39.112.32', 'aln3esa', '1670233108', ''),
(42, '  تسجيل دخول  - 94.128.228.224', 'aln3esa', '1670235123', ''),
(43, '  تسجيل دخول  - 197.39.112.32', 'aln3esa', '1670307076', ''),
(44, '  تسجيل دخول  - 197.39.112.32', 'aln3esa', '1670325544', ''),
(45, '  تسجيل دخول  - 197.39.112.32', 'aln3esa', '1670397749', ''),
(46, '  تسجيل دخول  - 94.129.249.125', 'aln3esa', '1670414427', ''),
(47, '  تسجيل دخول  - 197.39.112.32', 'aln3esa', '1670415476', ''),
(48, '  تسجيل دخول  - 197.39.112.32', 'aln3esa', '1670494213', ''),
(49, '  تسجيل دخول  - 197.39.112.32', 'aln3esa', '1670505902', ''),
(50, '  تسجيل دخول  - 154.237.47.200', 'aln3esa', '1670561965', ''),
(51, '  تسجيل دخول  - 154.237.19.196', 'aln3esa', '1670581084', ''),
(52, '  تسجيل دخول  - 94.128.247.150', 'aln3esa', '1670581146', ''),
(53, '  تسجيل دخول  - 94.128.247.150', 'aln3esa', '1670581155', ''),
(54, '  تسجيل دخول  - 94.128.191.226', 'aln3esa', '1670599941', ''),
(55, '  تسجيل دخول  - 197.39.112.32', 'aln3esa', '1670742473', ''),
(56, '  تسجيل دخول  - 197.39.112.32', 'aln3esa', '1670743125', ''),
(57, '  تسجيل دخول  - 197.39.112.32', 'aln3esa', '1670743882', ''),
(58, '  تسجيل دخول  - 41.235.198.228', 'aln3esa', '1670747398', ''),
(59, '  تسجيل دخول  - 197.39.94.60', 'aln3esa', '1670758701', ''),
(60, '  تسجيل دخول  - 197.39.94.60', 'test', '1670763144', ''),
(61, '  تسجيل دخول  - 197.39.94.60', 'aln3esa', '1670764403', ''),
(62, '  تسجيل دخول  - 37.231.195.42', 'aln3esa', '1670797411', ''),
(63, '  تسجيل دخول  - 197.39.94.60', 'aln3esa', '1670825914', ''),
(64, '  تسجيل دخول  - 197.39.94.60', 'aln3esa', '1670840575', ''),
(65, '  تسجيل دخول  - 197.120.68.34', 'aln3esa', '1670921642', ''),
(66, '  البحث عن    01022437388', 'aln3esa', '1670921661', ''),
(67, '  تسجيل دخول  - 197.120.68.34', 'aln3esa', '1670923764', ''),
(68, '  البحث عن    محمد عوض محمد الحربي', 'aln3esa', '1670923770', ''),
(69, '  البحث عن    معتز كمال خلفلا محمد', 'aln3esa', '1670924334', ''),
(70, '  تسجيل دخول  - 154.237.28.61', 'aln3esa', '1670934033', ''),
(71, '  البحث عن    هشام احمد صالح احمد', 'aln3esa', '1670934062', ''),
(72, '  البحث عن    هشام احمد صالح احم', 'aln3esa', '1670934070', ''),
(73, '  البحث عن    هشام احمد صالح', 'aln3esa', '1670934078', ''),
(74, '  تسجيل دخول  - 197.39.94.60', 'aln3esa', '1670936606', ''),
(75, '  تسجيل دخول  - 197.120.78.220', 'aln3esa', '1670951196', ''),
(76, '  تسجيل دخول  - 197.120.78.220', 'aln3esa', '1670951208', ''),
(77, '  تسجيل دخول  - 197.120.78.220', 'aln3esa', '1670951213', ''),
(78, '  تسجيل دخول  - 197.39.94.60', 'aln3esa', '1671014160', ''),
(79, '  البحث عن    حسين', 'aln3esa', '1671014213', ''),
(80, '  البحث عن    محمد عوض محمد الحربي', 'aln3esa', '1671014219', ''),
(81, '  البحث عن    عبدالله سعد علي', 'aln3esa', '1671014232', ''),
(82, '  البحث عن    عبدالعزيز صريد راشد', 'aln3esa', '1671014247', ''),
(83, '  البحث عن    عبدالعزيز صريد راشد', 'aln3esa', '1671014256', ''),
(84, '  تسجيل دخول  - 197.39.94.60', 'aln3esa', '1671021845', ''),
(85, '  تسجيل دخول  - 197.39.94.60', 'aln3esa', '1671021845', ''),
(86, '  تسجيل دخول  - 197.39.94.60', 'aln3esa', '1671088672', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `pass` varchar(150) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `comm` text,
  `gruop` int(11) DEFAULT '0',
  `Country` varchar(100) DEFAULT NULL,
  `BirthDate` varchar(50) DEFAULT NULL,
  `userInfo` text,
  `regdata` varchar(50) DEFAULT NULL,
  `reglog` varchar(50) DEFAULT NULL,
  `gruopu` int(9) DEFAULT '0',
  `myfov` text,
  `mosma` varchar(100) DEFAULT NULL,
  `styleid` int(11) DEFAULT '0',
  `allplay` int(11) DEFAULT '0',
  `newpass` varchar(50) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `timeout` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `pass`, `email`, `comm`, `gruop`, `Country`, `BirthDate`, `userInfo`, `regdata`, `reglog`, `gruopu`, `myfov`, `mosma`, `styleid`, `allplay`, `newpass`, `phone`, `timeout`) VALUES
(2, 'aln3esa', '0f8fad117740dc78cb2e834068b94fab', 'aln3esa@aln3esa.com', '|||', 1, '', '', '', '1437562299', '1558267924', 0, '', '3a795f79-ba46-4e60-af46-2c7f0af0817c', 0, 0, '', '', ''),
(51, 'عبدالرحيم', 'f1b1da99407f7e3e3640ba4e364f3546', 'admin@admin.com', '||booking||billshawly||modif|||', 5, '', '', '', '1554893629', '1558113340', 0, '', '', 0, 0, '', '', ''),
(14, 'خالد بدوي', '281d4a868886819859d36b0935f595bd', 'يشسبيب', '||booking||billshawly||modif|||', 4, '', '', '', '1510247426', '1558243647', 0, '', '3efb6680-33e6-4ddc-9112-5da782687d84', 0, 0, '', '', '1601757471'),
(16, 'ملاك مكرم', '8a794452632c77f7a6a01926d8588545', 'ليليب', '||booking||billshawly||modif|||', 4, '', '', '', '1510774130', '1557477289', 0, '', '', 0, 0, '', '', ''),
(18, 'احمد ضاحي', '3dc25886eba6c0a864ea55053c5406ab', 'nbbf@hf.cin', '||booking||billshawly|||', 4, '', '', '', '1529318103', '1558214758', 0, '', '', 0, 0, '', '', ''),
(50, 'tamer', 'fd3fcfd0e425d02568d357f1afe1d5e7', '5425454', '||billshawly||modif|||', 2, '', '', '', '1537722108', '1537982237', 0, '', '', 0, 0, '', '', ''),
(52, 'سامح غالي', '32c1fa13f7c20a63cbf114a8695c8d63', 'سشس', '||booking||billshawly|||', 4, '', '', '', '1557598661', '1558187394', 0, '', '', 0, 0, '', '', ''),
(80, 'tareq', 'e3e8ae7a67a7ff2c8128563a5aa820e5', 'dsdas@dsdas.fsdf', NULL, 3, NULL, NULL, '', '1569066211', NULL, 0, NULL, '', 0, 0, NULL, '', '1598220038'),
(54, 'احمد حسن', '7455cc2213ebdf44ac2acaa6e355bbe4', 'dsdas@dsdasdd.fsdf', NULL, 4, NULL, NULL, '', '1569659411', NULL, 0, NULL, '', 0, 0, NULL, '', NULL),
(55, 'توني', '63ee451939ed580ef3c4b6f0109d1fd0', 'sad@dd.cc', NULL, 2, NULL, NULL, '', '1575306233', NULL, 0, NULL, '', 0, 0, NULL, '', NULL),
(56, 'وائل', 'ec6a6536ca304edf844d1d248a4f08dc', 'fdd@ss.com', NULL, 4, NULL, NULL, '', '1576599401', NULL, 0, NULL, 'd480c6ea-2b8b-4261-9990-1831e9e7d05a', 0, 0, NULL, '', '1610461103'),
(57, 'خالد علي', '0f8fad117740dc78cb2e834068b94fab', 'dd@dd.com', NULL, 4, NULL, NULL, '', '1576945790', NULL, 0, NULL, '', 0, 0, NULL, '', NULL),
(58, 'معتز', '2f7b52aacfbf6f44e13d27656ecb1f59', 'hhy@gy.com', NULL, 5, NULL, NULL, '', '1581856155', NULL, 0, NULL, '83d56031-4aea-4ef6-8571-50f02fabfce2', 0, 0, NULL, '', '1644097436'),
(59, 'هاني', 'ec6a6536ca304edf844d1d248a4f08dc', 'aa@ss.com', NULL, 4, NULL, NULL, '', '1580711252', NULL, 0, NULL, '', 0, 0, NULL, '', NULL),
(60, 'احمد سمير', '6e4b95c147f51624ce88cfa5216e6dc2', 'ddc@dd.d.com', NULL, 4, NULL, NULL, '', '1608050303', NULL, 0, NULL, '', 0, 0, NULL, '', '1608110590'),
(61, 'محمد عادل', 'bbac1c885694dff57d636546bf055870', 'sdsada@fdf.gg', NULL, 4, NULL, NULL, '', '1610053211', NULL, 0, NULL, 'رسبنش', 0, 0, NULL, '', NULL),
(62, 'اسامة مصطفى', '671b7c6d831d522c204b0a453579f832', 'ss@ss.com', NULL, 5, NULL, NULL, '', '1611406885', NULL, 0, NULL, '5cadffb1-3720-4909-897f-0f73f0c4e7d4', 0, 0, NULL, '', NULL),
(63, 'محمود عزمي', 'a66b06db16d53c00f8bbb72425af6b1d', 'zss@ss.com', NULL, 2, NULL, NULL, '', '1618155231', NULL, 0, NULL, '', 0, 0, NULL, '', NULL),
(64, 'زكي', '0f8fad117740dc78cb2e834068b94fab', 'aln3esa@fds.vv', NULL, 4, NULL, NULL, '', '1618168063', NULL, 0, NULL, '', 0, 0, NULL, '', NULL),
(65, 'عمرو احمد', '671b7c6d831d522c204b0a453579f832', 'jj@rr.com', NULL, 5, NULL, NULL, '\r\n', '1625063887', NULL, 0, NULL, '', 0, 0, NULL, '\r\n', NULL),
(81, 'يوسف سعد', '89d0ec7eee08a745e2cc97fe534a260a', 'ddd@ss.com', NULL, 2, NULL, NULL, '', '1629481881', NULL, 0, NULL, 'وز', 0, 0, NULL, '', '1629482289'),
(82, 'روماني', '9106f84b1de8d11c9917f5c74dcb4a93', 'dff@gh.com', NULL, 2, NULL, NULL, '', '1630830492', NULL, 0, NULL, '', 0, 0, NULL, '', '1630830695'),
(83, 'اندرو', '243107f52c8bfc86710d4a871dd8ba63', 'aln3esasdsd@gmail.com', NULL, 2, NULL, NULL, '', '1652189701', NULL, 0, NULL, '', 0, 0, NULL, '', NULL),
(84, 'محمد سليمان', '8c28f3eb2abf20367e27225a93b2cd46', 'sss@dsd.com', NULL, 2, NULL, NULL, '', '1652288029', NULL, 0, NULL, '', 0, 0, NULL, '', NULL),
(100, 'الراشد', 'd2f246aa678bf149cfee7d367e0028f0', 'dsdas@dsdadds.fsdf', NULL, 3, NULL, NULL, '', '1569066211', NULL, 0, NULL, '', 0, 0, NULL, '', '1598220038'),
(101, 'test', '0f8fad117740dc78cb2e834068b94fab', 'aln3esa@aln3esa.com', '|||', 1, '', '', '', '1437562299', '1558267924', 0, '', '3a795f79-ba46-4e60-af46-2c7f0af0817c', 0, 0, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_booked`
--
ALTER TABLE `booking_booked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_card`
--
ALTER TABLE `booking_card`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_checkall`
--
ALTER TABLE `booking_checkall`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_checkroom`
--
ALTER TABLE `booking_checkroom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_clints`
--
ALTER TABLE `booking_clints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_gyab`
--
ALTER TABLE `booking_gyab`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_knet`
--
ALTER TABLE `booking_knet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_lost`
--
ALTER TABLE `booking_lost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_mhtwa`
--
ALTER TABLE `booking_mhtwa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_mhtwah`
--
ALTER TABLE `booking_mhtwah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_msg`
--
ALTER TABLE `booking_msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_note`
--
ALTER TABLE `booking_note`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_producer`
--
ALTER TABLE `booking_producer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_raoter`
--
ALTER TABLE `booking_raoter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_rating`
--
ALTER TABLE `booking_rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_rooms`
--
ALTER TABLE `booking_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_rooms_images`
--
ALTER TABLE `booking_rooms_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_subscriptions`
--
ALTER TABLE `booking_subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `check_types`
--
ALTER TABLE `check_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_bills3`
--
ALTER TABLE `model_bills3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_bills3_cat`
--
ALTER TABLE `model_bills3_cat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_billshawly`
--
ALTER TABLE `model_billshawly`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_billshawly2`
--
ALTER TABLE `model_billshawly2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_cat_billshawly`
--
ALTER TABLE `model_cat_billshawly`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_cat_billshawly2`
--
ALTER TABLE `model_cat_billshawly2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_modif`
--
ALTER TABLE `model_modif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_numbber`
--
ALTER TABLE `model_numbber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_ohda`
--
ALTER TABLE `model_ohda`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paymentlinks`
--
ALTER TABLE `paymentlinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rep`
--
ALTER TABLE `rep`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `booking_booked`
--
ALTER TABLE `booking_booked`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_card`
--
ALTER TABLE `booking_card`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_checkall`
--
ALTER TABLE `booking_checkall`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `booking_checkroom`
--
ALTER TABLE `booking_checkroom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_clints`
--
ALTER TABLE `booking_clints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `booking_gyab`
--
ALTER TABLE `booking_gyab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_knet`
--
ALTER TABLE `booking_knet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_lost`
--
ALTER TABLE `booking_lost`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_mhtwa`
--
ALTER TABLE `booking_mhtwa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `booking_mhtwah`
--
ALTER TABLE `booking_mhtwah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_msg`
--
ALTER TABLE `booking_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_note`
--
ALTER TABLE `booking_note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking_producer`
--
ALTER TABLE `booking_producer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `booking_raoter`
--
ALTER TABLE `booking_raoter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_rating`
--
ALTER TABLE `booking_rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_rooms`
--
ALTER TABLE `booking_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `booking_rooms_images`
--
ALTER TABLE `booking_rooms_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `booking_subscriptions`
--
ALTER TABLE `booking_subscriptions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `check_types`
--
ALTER TABLE `check_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `model_bills3`
--
ALTER TABLE `model_bills3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `model_bills3_cat`
--
ALTER TABLE `model_bills3_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `model_billshawly`
--
ALTER TABLE `model_billshawly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `model_billshawly2`
--
ALTER TABLE `model_billshawly2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `model_cat_billshawly`
--
ALTER TABLE `model_cat_billshawly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `model_cat_billshawly2`
--
ALTER TABLE `model_cat_billshawly2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `model_modif`
--
ALTER TABLE `model_modif`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `model_numbber`
--
ALTER TABLE `model_numbber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `model_ohda`
--
ALTER TABLE `model_ohda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `paymentlinks`
--
ALTER TABLE `paymentlinks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `rep`
--
ALTER TABLE `rep`
  MODIFY `id` int(12) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
