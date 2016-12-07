-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 08, 2016 at 01:21 AM
-- Server version: 5.5.37-log
-- PHP Version: 5.3.29

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `winwanwoni_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `Activity`
--

CREATE TABLE IF NOT EXISTS `Activity` (
  `StudentID` varchar(11) NOT NULL,
  `ActivityID` varchar(5) NOT NULL,
  `Responsibility` varchar(30) NOT NULL,
  PRIMARY KEY (`StudentID`,`ActivityID`),
  KEY `ActivityID` (`ActivityID`),
  KEY `ActivityID_2` (`ActivityID`),
  KEY `ActivityID_3` (`ActivityID`),
  KEY `ActivityID_4` (`ActivityID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Activity`
--

INSERT INTO `Activity` (`StudentID`, `ActivityID`, `Responsibility`) VALUES
('57070501024', 'BN026', 'ประธาน'),
('57070501024', 'CC027', 'เฮดกิจกรรม'),
('57070501024', 'FG014', 'เฮดกลอง'),
('57070501024', 'JE018', 'Staff'),
('57070501024', 'MC003', 'เฮดกิจกรรม'),
('57070501024', 'MC004', 'พี่สตาฟ'),
('57070501038', 'JE019', 'Web Developer'),
('57070501038', 'UZ000', 'Co-Founder'),
('57070501049', 'CC027', 'พ่อเซคผีเดเตอร์อย่างไงหละ'),
('57070501049', 'MT026', 'เด็กปีหนึ่ง'),
('57070501049', 'UZ000', 'สตาฟ'),
('57070501053', 'BN026', 'สตาฟ'),
('57070501053', 'CC027', 'staff'),
('57070501053', 'CG027', 'ขับรถแข่ง'),
('57070501053', 'CR004', 'ทำโรงเห็ด'),
('57070501053', 'CR005', 'ทาสี'),
('57070501053', 'EG008', 'ฝ่ายฉาก'),
('57070501053', 'LK014', 'เดินเล่น'),
('57070501053', 'MC003', 'ยกข้าว'),
('57070501065', 'CC027', 'Bae'),
('57070501065', 'EG010', 'Lead'),
('57070501065', 'MC001', 'Mod'),
('57070501078', 'BN026', 'ปธ'),
('57070501078', 'CC027', 'เฮด สวัสน้ำ'),
('57070501078', 'CC028', 'พี่ขี้เสือก'),
('57070501078', 'EG010', 'sTaNd'),
('57070501078', 'EG011', 'พี่เสือกโดนลากไปทำงาน'),
('57070501078', 'JE018', 'สวัสน้ำ'),
('57070501078', 'MC002', 'น้องค่าย'),
('57070501078', 'MC003', 'สวัสน้ำ'),
('57070501078', 'MF027', 'สวัสน้ำ'),
('57070501078', 'UZ000', 'ผู้เข้าร่วม'),
('58070501024', 'JE019', 'staff'),
('58070501024', 'MC004', 'staff');

-- --------------------------------------------------------

--
-- Table structure for table `ActivityCode`
--

CREATE TABLE IF NOT EXISTS `ActivityCode` (
  `ActivityID` varchar(5) NOT NULL,
  `ActivityName` varchar(100) NOT NULL,
  PRIMARY KEY (`ActivityID`),
  KEY `ActivityID` (`ActivityID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ActivityCode`
--

INSERT INTO `ActivityCode` (`ActivityID`, `ActivityName`) VALUES
('BN026', 'Byenior CPE26 : Full Moon Full of Memory'),
('CC024', 'Comcamp#24 : ใจ'),
('CC025', 'Comcamp#25 : เทพอ่ะ'),
('CC026', 'Comcamp#26 : ดาว'),
('CC027', 'Comcamp#27 : ผีรักทุกวินาเธอ'),
('CC028', 'Comcamp#28 : สายลับ สายเลิฟ'),
('CG025', 'CPE Game 2014 : นักเรียนนักเลง'),
('CG027', 'CPE Game 2016 : แว๊นบอย สก๊อยเกิร์ล'),
('CN014', 'CPE Night 2014 : Red Carpet'),
('CR004', 'CPE RSA #4'),
('CR005', 'CPE RSA #5'),
('EG007', 'E-game#7'),
('EG008', 'E-game#8'),
('EG009', 'E-game#9'),
('EG010', 'E-game#10'),
('EG011', 'E-game#11'),
('FG014', 'Freshy Game 2014'),
('FG015', 'Freshy Game 2015'),
('HW001', 'CPE HelloWorld 1'),
('HW002', 'CPE HelloWorld 2'),
('JE016', 'JEC16'),
('JE017', 'JEC17'),
('JE018', 'JEC18'),
('JE019', 'JEC19'),
('LK013', 'ลอยกระทง มจธ. 2013'),
('LK014', 'ลอยกระทง มจธ. 2014'),
('MC001', 'ModCom#1 : Carnival'),
('MC002', 'ModCom#2 : Casino'),
('MC003', 'ModCom#3 : Prison Break'),
('MC004', 'ModCom#4 : Harry Potter'),
('MF027', 'ModFire#27 : Hunger'),
('MF028', 'ModFire#28 : Angry Ant'),
('MT026', 'CPE Family 1 : สานสัมพันธ์ CPE'),
('MT027', 'CPE Family 2 : รวมใจ ไปกันเลย'),
('UZ000', 'CPE Unzip #0');

-- --------------------------------------------------------

--
-- Table structure for table `Address`
--

CREATE TABLE IF NOT EXISTS `Address` (
  `StudentID` varchar(11) NOT NULL,
  `Type` varchar(32) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Latitude` float NOT NULL,
  `Longitude` float NOT NULL,
  PRIMARY KEY (`StudentID`,`Address`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Address`
--

INSERT INTO `Address` (`StudentID`, `Type`, `Address`, `Latitude`, `Longitude`) VALUES
('56070501024', 'Dormitory', 'My Place 2', 13.6482, 100.499),
('57070501024', 'Home', '27/146 หมู่บ้านสยามเนเชอรัลโฮม หมู่ที่ 5 ถ.พระรามที่2 ต.พันท้ายนรสิงห์ อ.เมือง จ.สมุทรสาคร 74000', 13.5849, 100.356),
('57070501024', 'Dormitory', 'CPE', 42.9869, -81.2432),
('57070501038', 'Home', 'Library Houze 2nd Floor', 13.6549, 100.498),
('57070501038', 'Home', 'Lumphini Place Rama9-Ratchada', 13.7563, 100.571),
('57070501038', 'Dormitory', 'test', 35.6895, 139.692),
('57070501053', 'Dormitory', 'สวนธนบุรีการ์เด้น', 13.6549, 100.498),
('57070501061', 'Home', 'ddd', 37.7277, 20.8707),
('57070501065', 'Dormitory', 'Cosmo', 13.6507, 100.497),
('57070501078', 'Home', 'Library Houze', 51.5074, -0.127758),
('57070501078', 'Home', 'Mexico', 19.4326, -99.1332),
('58070501024', 'Dormitory', 'หมู่บ้านสวนธน', 13.6537, 100.49);

-- --------------------------------------------------------

--
-- Table structure for table `Course`
--

CREATE TABLE IF NOT EXISTS `Course` (
  `CourseID` varchar(6) NOT NULL,
  `CourseName` varchar(100) NOT NULL,
  PRIMARY KEY (`CourseID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Course`
--

INSERT INTO `Course` (`CourseID`, `CourseName`) VALUES
('CPE100', 'Computer Programming for Engineers'),
('CPE101', 'Engineering Exploration'),
('CPE121', 'Discrete Mathematics for Computer Engineers'),
('CPE214', 'Signals and Systems'),
('CPE221', 'Circuits and Electronics for Computer Engineers'),
('CPE222', 'Circuit and Electronic Laboratory'),
('CPE325', 'Computer Architectures and Systems'),
('CPE332', 'Database and Enterprise Resource Planning (ERP) Systems'),
('CPE351', 'Ubiquitous Computing and Wearable Systems '),
('CPE352', 'Opinion Mining and Sentiment Analysis'),
('CPE353', 'Digital Image Processing for Copyrigth Protection'),
('CPE354', 'Optimization System Design and Evolutionary Computing'),
('CPE363', 'Embedded System Design'),
('CPE364', 'Automatic Control Systems'),
('CPE374', 'Parallel Computing and Grid Technology'),
('CPE375', 'Intelligent Robot Programming'),
('CPE378', 'Computer Graphics'),
('CPE402', 'Computer Engineering Project I'),
('CPE442', 'Computer Network Laboratory'),
('CPE458', 'Programming Massively Parallel Processors '),
('CPE486', 'Game Design and Development');

-- --------------------------------------------------------

--
-- Table structure for table `Education`
--

CREATE TABLE IF NOT EXISTS `Education` (
  `StudentID` varchar(11) NOT NULL,
  `CourseID` varchar(6) NOT NULL,
  `TeacherID` int(4) NOT NULL,
  `Review` float NOT NULL,
  `Comment` text NOT NULL,
  PRIMARY KEY (`StudentID`,`CourseID`,`TeacherID`),
  KEY `CourseID` (`CourseID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Education`
--

INSERT INTO `Education` (`StudentID`, `CourseID`, `TeacherID`, `Review`, `Comment`) VALUES
('57070501024', 'CPE214', 9, 5, 'อาจารย์ฝ้าย สาย24 สอนโคตรดีบอกเลย\nหาอาจารย์แบบนี่ยากมาก'),
('57070501024', 'CPE221', 14, 0.5, ' เหอะๆๆๆๆๆ\nไม่ต้องเข้าเรียนนะน้องๆ'),
('57070501024', 'CPE332', 1, 5, 'สอนดีมากเลยครับ\nนั่งเฉยๆ ฟังเสียงหวานๆ\nก็ได้รับความรู้เต็มที่มากๆเลย'),
('57070501024', 'CPE332', 2, 5, ' เป็นคาบเดียวที่ ไม่โดดเรียน เพราะอาจารย์สอนดีมาก น้องๆไม่ต้องกลัวนะดีมากเลย'),
('57070501024', 'CPE374', 23, 3.5, ' ยากอยู่ อ.สอนดี\nแต่รุ่นพี่ที่มาสอนห่วย'),
('57070501038', 'CPE100', 19, 4.5, 'สุดยอด'),
('57070501038', 'CPE332', 1, 4.5, 'the best'),
('57070501049', 'CPE214', 9, 5, 'หนึ่งในอาจารย์ภาคคอมที่สอนดีมากคนนึง >< อยากให้อาจารย์เปิดวิชาเลือกอีก'),
('57070501049', 'CPE332', 1, 5, 'สอนดีมากๆเรยครับ อาจารย์น่ารักด้วย 55555 แต่อาจารย์แอบตรวจข้อสอบโหด T_T'),
('57070501049', 'CPE354', 22, 3, ' วิชาดีนะ แต่อาจารย์สอนไม่ค่อยโอเคอะ 55555'),
('57070501053', 'CPE222', 14, 1, ' 	ต้องเรียนกันเองนะ เพราะ อาจารย์ชอบปั่นจักรยานกับกินกาแฟ'),
('57070501053', 'CPE325', 12, 1.5, ' 	งานเยอะมากๆเลย ไฟนอลโปรเจคต้องส่งพรุ่งนี้แล้วว'),
('57070501053', 'CPE332', 1, 5, ' อาจารย์สอนดีมากๆเลยครับ '),
('57070501053', 'CPE364', 21, 1.5, 'ในคลาสมีเวลา 3 ชั่วโมง แต่อาจารย์สอนครึ่งชั่วโมง กับการเรียน 5 บท'),
('57070501053', 'CPE375', 15, 5, 'เป็นวิชาที่ดีมากๆเล๊ยยย \nมีพิซซ่า เป๊บซี่ ไก่ทอด ตอนสอบด้วย แต่สอบ 6 ชั่วโมงนะ');

-- --------------------------------------------------------

--
-- Table structure for table `FamilyCode`
--

CREATE TABLE IF NOT EXISTS `FamilyCode` (
  `FamilyCode` int(2) NOT NULL,
  `FamilyName` varchar(100) NOT NULL,
  `FacebookGroup` text NOT NULL,
  `Quote` text NOT NULL,
  `Logo` text NOT NULL,
  PRIMARY KEY (`FamilyCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `FamilyCode`
--

INSERT INTO `FamilyCode` (`FamilyCode`, `FamilyName`, `FacebookGroup`, `Quote`, `Logo`) VALUES
(1, 'สายอึ้งกิมกี่', '-', 'เจ้าแม่ลิ้มกอเหนี่ยว', 'https://placekitten.com/g/200/200'),
(2, 'สายลอง', '-', 'ฟุตลอง ยาดอง เงาะกระป๋องพี่ลองมาหมด', 'https://placekitten.com/g/200/200'),
(3, 'สายสามถามทาง', 'หาไม่เจออะ', 'สายผมไปทางไหน', 'https://placekitten.com/g/200/200'),
(4, 'สายขี่จักรยาน', 'อาจารย์อุ้ม', 'เราจะขี่จักรยาน ให้ไกลไปถึงมุกดาหาร', 'https://placekitten.com/g/200/200'),
(5, 'สายล่าสัตว์', 'เมาคลี', 'ล่าสัตว์ๆ ฆ่าแชร์คาน ถลกหนังออกมาให้หมด', 'https://placekitten.com/g/200/200'),
(6, 'สายหกต้องยกออก', 'ใบเตย อาร์ หยาม', 'มันแน่นอก ต้องยกออก', 'https://placekitten.com/g/200/200'),
(7, 'สายเจ๊ดเข้', 'ฟาร์มสามพราน', 'เจ๊ดเจ๊ดๆๆๆ', 'https://placekitten.com/g/200/200'),
(8, 'สายแพร่ด', 'ไม่มี', 'เสียงแพร่ดเป็นเสียงตด อันนี้ต้องจด', 'https://placekitten.com/g/200/200'),
(9, 'สายเก้าหลัง', 'https://www.facebook.com/groups/202376133137321/', 'หากหยิบเพิ่มอีกใบแล้วได้ 9 จึงเรียกว่า เก้าหลัง', 'https://placekitten.com/g/200/200'),
(10, 'สายหยิบ', 'ขนมไทย', 'สายหยุดเป็นดอกไม้ สายใยเราคงเป็นดอกรัก', 'https://placekitten.com/g/200/200'),
(11, 'สายสิบเอ็ดอย่าเอ็ดไป', 'จุ๊ๆ', 'ไม่เอา ไม่พูด', 'https://placekitten.com/g/200/200'),
(12, 'สายนางสิบสอง', 'นางสิบสอง', 'เมื่อมีสาวครบสิบสอง จะสามารถขอพรกับเทพเจ้ามังกรได้', 'https://placekitten.com/g/200/200'),
(13, 'สายอินดี้', 'https://www.facebook.com/groups/195594845263/', 'กินๆๆๆๆๆ', 'http://www.welikecat.com/wp-content/uploads/2014/12/12.jpg'),
(14, 'สายดี๊ดี', 'สาย 14/54', 'ดี๊ดีไม่ใช่ดีดี้ งงอะดิ งงเหมือนกัน', 'https://placekitten.com/g/200/200'),
(15, 'สายฮา', 'โคตรฮา', '555555555555555555555555', 'https://placekitten.com/g/200/200'),
(16, 'สายดกหมด', 'แก้ว', 'สายสิบหกต้องดกให้หมด', 'https://placekitten.com/g/200/200'),
(17, 'สายเจ๊ดครก', 'อ่างศิลา', 'เจ๊ดครก อ่างศิลา ราคาเป็นหมื่น', 'https://placekitten.com/g/200/200'),
(18, 'สายแสดเอ๊ย', 'เราชาวสีแสด', 'สีแสดกับสีส้มต่างกันยังไง', 'https://placekitten.com/g/200/200'),
(19, 'สายเก้าหน้า', 'แดกเก้าหลัง', 'เก้าหลังก็ไร้ความหมาย เพราะมันพ่ายเก้าหน้า', 'https://placekitten.com/g/200/200'),
(20, 'สายจุ๊บจิ๊บ', 'กินจุ๊บจิ๊บ', 'กินจุ๊บ กินจิ๊บ กินจุ๊บจิ๊บ แถ่แดน แถ่แดน แถ๊น', 'https://placekitten.com/g/200/200'),
(21, 'สายเป็ดแดง', 'ลิเวอร์พูล', 'You Will Never Walk Away', 'https://placekitten.com/g/200/200'),
(22, 'สองยาดอง', 'สองโหล', 'โอ้ ยาดอง ลงไปกองกับพื้น', 'https://placekitten.com/g/200/200'),
(23, 'สายจาม', 'ฮัดชิ้ว', 'จามบ่อยๆแสดงว่ามีคนนินทา', 'https://placekitten.com/g/200/200'),
(24, 'สายยี่สิบสี่ มีดีทุกท่วงท่า', 'https://www.facebook.com/groups/202991133069785/', 'อิอิ คิดคำคมประจำสายไม่ออก', 'https://placekitten.com/g/200/200'),
(25, 'สายราชา', 'เดอะก๊อด', 'สายยี่สิบห้า ท่วงท่าโคตรดี ท่าดีโคตรเอา', 'https://placekitten.com/g/200/200'),
(26, 'สายตกรถ', 'เตือนหน่อย', 'โทรปลุกด้วย เดี๋ยวตกรถ', 'https://placekitten.com/g/200/200'),
(27, 'สายเจ๊ดตาม่อน', 'พี่ๆ', 'ขอพารา แป๋งนึง', 'https://placekitten.com/g/200/200'),
(28, 'สายแดดแรง', 'สายลมและแสงแดด', 'แสงแดดที่ร้อนแรง กินแกงระวังลวกปาก', 'https://placekitten.com/g/200/200'),
(29, 'สายเร้าใจ', 'Cup E', 'หุ่นเธอช่างเร้าใจ ส่วนร้อนในช่างร้าวราน', 'https://placekitten.com/g/200/200'),
(30, 'สายแจกคลิป', 'สังคมแห่งการแบ่งปัน', 'สังคมยังแบ่งปัน เมื่อไหร่เธอนั้นจะแบ่งใจ', 'https://placekitten.com/g/200/200'),
(31, 'สายเสร็จละ', 'เกาะสเม็ด', 'เสร็จทุกราย', 'https://placekitten.com/g/200/200'),
(32, 'สายยอง', 'นั่งยอง', 'สายยองไม่ใช่สายย่อ ', 'https://placekitten.com/g/200/200'),
(33, 'สายตาม', 'ขอตามครับ', 'เขาว่ายังไง ผมก็ว่าอย่างงั้นแหละครับ', 'https://placekitten.com/g/200/200'),
(34, 'สายโดเรมี', 'โด๊..เร..หมี่..', 'ซ่อนน หล่าา.. หนูขอเวลาสักสามนาที', 'https://placekitten.com/g/200/200'),
(35, 'สายกล้า ท้า ลอง', 'เมาเท่นดิว', 'เจ้มจ้น เกินพิกัด', 'https://placekitten.com/g/200/200'),
(36, 'สายฉกชื่น', 'งูตกน้ำ', 'ฉกอะไร...ฉกชื่นน', 'https://placekitten.com/g/200/200'),
(37, 'สายเจ๊ดผ้า', 'อั๊วเปงคนจีนทำมาหากิงอยุ่ในเมืองไทย', 'อั๊วมีเมียรักไฉไล ลูกสาวล่วยกัน 2 คง', 'https://placekitten.com/g/200/200'),
(38, 'สายวุ้น', 'https://www.facebook.com/groups/219352281436729/', 'คออ่อนเรียก 38', 'https://placekitten.com/g/200/200'),
(39, 'สายว่าว', 'ว่าวจุฬา', 'จุฬาอะไร จุฬาลงกรณ์ ลงกลอนอะไร ลงกลอนประตู', 'https://placekitten.com/g/200/200'),
(40, 'สายดิ๊บซี่', 'ลาล่า', 'โพ่ง', 'https://placekitten.com/g/200/200');

-- --------------------------------------------------------

--
-- Table structure for table `HangingOut`
--

CREATE TABLE IF NOT EXISTS `HangingOut` (
  `Restaurant` varchar(100) NOT NULL,
  `DateT` date NOT NULL,
  `FamilyCode` int(2) NOT NULL,
  `Generation` int(11) NOT NULL,
  `Review` float NOT NULL,
  PRIMARY KEY (`Restaurant`,`DateT`,`FamilyCode`,`Generation`),
  KEY `FamilyCode` (`FamilyCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `HangingOut`
--

INSERT INTO `HangingOut` (`Restaurant`, `DateT`, `FamilyCode`, `Generation`, `Review`) VALUES
('Chabu Home', '2014-12-20', 13, 28, 4),
('Chabu Home', '2016-10-31', 25, 28, 2.5),
('Coco Ichibanya', '2016-12-06', 38, 28, 5),
('Indy Bar', '2016-08-16', 13, 28, 3.5),
('Indy Bar', '2016-08-18', 13, 28, 4.5),
('Indy Bar', '2016-08-19', 13, 28, 4.5),
('Station 45', '2016-11-08', 13, 28, 1.5),
('Thonburi Garden', '2016-09-30', 38, 28, 0),
('Thonburi Garden', '2016-09-30', 38, 29, 4),
('กูมาชาบู', '2015-12-15', 13, 28, 3.5),
('จิ๋ม', '2016-12-01', 9, 28, 3),
('จิ๋ม', '2016-12-29', 38, 28, 0),
('จิ๋ม', '2016-12-31', 1, 28, 3.5),
('ชาบูนางใน', '2016-09-30', 9, 28, 4),
('ชาบูนางใน', '2016-11-22', 24, 28, 4),
('บาบีก้อน ขย้อนเนื้อ', '2016-11-08', 13, 28, 1.5),
('มากินป้ะ ไม่อะ', '2015-12-15', 13, 28, 1.5),
('มานะ มาเถอะ', '2016-12-04', 25, 28, 3),
('ลุงถอดเสื้อ', '2016-12-01', 24, 28, 5),
('สเต็ก', '2016-08-09', 13, 5, 3),
('หลืบ', '2016-12-03', 24, 28, 4),
('อินดี้', '2016-12-01', 38, 28, 4.5),
('เก่ากะปิ กะปิเก่าๆ', '2016-12-01', 13, 23, 5),
('เก่ากะปิ กะปิเก่าๆ', '2016-12-01', 13, 24, 5),
('เก่ากะปิ กะปิเก่าๆ', '2016-12-01', 13, 25, 5),
('เก่ากะปิ กะปิเก่าๆ', '2016-12-01', 13, 26, 4),
('เก่ากะปิ กะปิเก่าๆ', '2016-12-01', 13, 27, 3),
('เก่ากะปิ กะปิเก่าๆ', '2016-12-01', 13, 28, 3.5),
('เก่ากะปิ กะปิเก่าๆ', '2016-12-01', 13, 29, 5),
('เก่ากะปิ กะปิเก่าๆ', '2016-12-12', 25, 28, 2.5),
('เจ้พร', '2016-12-31', 1, 28, 1),
('เจ๊ณี', '2015-09-12', 33, 21, 3),
('เจ๊ณี', '2015-09-12', 33, 24, 3),
('เจ๊พร', '2016-12-07', 13, 23, 5),
('เจ๊พร', '2016-12-07', 13, 24, 5),
('เจ๊พร', '2016-12-31', 1, 28, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Internship`
--

CREATE TABLE IF NOT EXISTS `Internship` (
  `StudentID` varchar(11) NOT NULL,
  `CorpName` varchar(100) NOT NULL,
  `Comment` text NOT NULL,
  PRIMARY KEY (`StudentID`,`CorpName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Internship`
--

INSERT INTO `Internship` (`StudentID`, `CorpName`, `Comment`) VALUES
('57070501024', 'Krispy Kreme', 'testtest'),
('57070501024', 'Poseidon', 'ฝึกงานอย่างไงให้ตัวหอม แหนะๆคิดไรอะ ไปทำเว็บให้โพไซดอนไง'),
('57070501024', 'โอ้โห คอร์ป', 'บริษัทิเปิดใหม่ ไฟแรง\nแต่งานยังมีให้ทำไม่มาก\nจัดระเบียบยังไม่ค่อยดี'),
('57070501049', 'DST', 'code ดีให้ตายแต่พูดอิ้งไม่ได้ก็หายไปก่อนนาจา'),
('57070501049', 'Poseidon', 'มีบริการอาบน้ำให้ก่อนเริ่มงานด้วยครับ รู้สึกดีมากเลย จะได้ไม่ต้องอาบน้ำมาตั้งแต่อยู่บ้าน'),
('57070501049', 'SO Company', 'เราต้องการคนที่มี passion'),
('57070501049', 'True ', 'มีหลายโครงการนะ แนะนำ True Academy เราจะได้ไปร้องเพลง(ถุย)'),
('57070501053', '7-Elephant', 'รับหนมจีบซาลาเปา เพิ่มมั้ยค่ะ  เจอทุกครั้งก่อนออกจากบริษัท'),
('57070501053', 'AppliCAD', 'ทุกเย็นจะมีการกินเหล้า ดีจังเล๊ยยยยยยยยยยยย'),
('57070501053', 'Toyota Samutsakhon', 'ผู้บริหารอ่อย'),
('57070501053', 'ก.ไก่ ข.ไข่', 'ทุกมื้อกลางวันต้องกินไก่กับไข่'),
('57070501053', 'หมูหยอง Racing', 'วันๆมีแต่แต่งรถ เก็บตังไว้แต่งเมียมั้ยครับ'),
('57070501065', 'ยันหว่าง คอร์ป', 'เขียนโค้ดยันหว่างเลย #ดาต้าเบสก็เช่นกัน');

-- --------------------------------------------------------

--
-- Table structure for table `Permission`
--

CREATE TABLE IF NOT EXISTS `Permission` (
  `FacebookID` varchar(100) NOT NULL,
  `Permission` varchar(30) NOT NULL DEFAULT 'User',
  PRIMARY KEY (`FacebookID`),
  KEY `FacebookID` (`FacebookID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Permission`
--

INSERT INTO `Permission` (`FacebookID`, `Permission`) VALUES
('10202347511084716', 'Admin'),
('10207388023771122', 'User'),
('10209561384664376', 'User'),
('1137533099656723', 'User'),
('1180179282072076', 'User'),
('1211927162177030', 'User'),
('1243071112418792', 'User'),
('1243092112401275', 'Admin'),
('1304479479624455', 'User'),
('1314639715274911', 'User'),
('1317020631705077', 'User'),
('1348225395242168', 'User'),
('1370285002983111', 'Admin'),
('1372285359449319', 'User'),
('1393988437286969', 'User'),
('1430619143666403', 'Admin'),
('1830978697191411', 'User'),
('1843036982598516', 'User'),
('911525528949281', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `Student`
--

CREATE TABLE IF NOT EXISTS `Student` (
  `StudentID` varchar(11) NOT NULL,
  `FacebookID` varchar(100) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `DOB` date NOT NULL,
  `Tel` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Program` varchar(30) NOT NULL,
  `Occupation` varchar(100) NOT NULL,
  `Workplace` varchar(100) NOT NULL,
  `Generation` int(11) NOT NULL,
  `FamilyCode` int(2) NOT NULL,
  PRIMARY KEY (`StudentID`),
  KEY `FamilyCode` (`FamilyCode`),
  KEY `FacebookID` (`FacebookID`),
  KEY `FamilyCode_2` (`FamilyCode`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Student`
--

INSERT INTO `Student` (`StudentID`, `FacebookID`, `FirstName`, `LastName`, `Gender`, `DOB`, `Tel`, `Email`, `Program`, `Occupation`, `Workplace`, `Generation`, `FamilyCode`) VALUES
('52211524', '1393988437286969', 'ณภัทร', 'ดีพา', 'F', '1990-10-22', '0918852855', 'feverxai@gmail.com', 'Regular', 'Project Manager', 'Smartclick Solution', 23, 4),
('55070501024', '1304479479624455', 'ปฐมพงศ์', 'ตั้งจิตสิริสรรพ์', 'M', '1993-11-17', '0850755696', 'P.Tungjitsirisun@gmail.com', 'Regular', 'Application Support Analyst', 'Atos IT Solutions and Services Ltd.', 26, 24),
('56070501024', '1137533099656723', 'นภนต์', 'เยาวลักษณ์', 'M', '1994-07-15', '0839762861', 'napon49@hotmail.com', 'Regular', 'นักศึกษา', '', 27, 24),
('56070501078', '1843036982598516', 'ชนกานต์', 'เหล่าวีรวัฒน์', 'F', '1994-07-29', '0909359137', 'chonkarn.lao@gmail.com', 'Regular', 'นักศึกษา', 'kmutt', 27, 38),
('56070503464', '1180179282072076', 'ยรรยงค์', 'พรหมจารย์', 'M', '1994-12-10', '0833428420', 'eieiy@gmail.com', 'International', 'นักศึกษา', '', 27, 24),
('57070501024', '1243092112401275', 'ปิยพนธ์', 'ตรังจิระเสถียร', 'M', '1995-08-16', '0943457887', 'nn.namelesz@gmail.com', 'Regular', 'นักศึกษา', 'KMUTT', 28, 24),
('57070501038', '10202347511084716', 'วรัตม์', 'กวีพรพจน์', 'M', '1996-12-07', '0853615557', 'winwanwon123@gmail.com', 'Regular', 'Former Intern Web Developer', 'Donuts Bangkok Co., Ltd', 28, 38),
('57070501041', '1830978697191411', 'ศกานต์', 'โกมลวาทิน', 'M', '1996-02-22', '0832788281', 'tutumm96@gmail.com', 'Regular', 'นักศึกษา', 'มอ', 28, 1),
('57070501049', '1370285002983111', 'ศุภณัฐ', 'อ่องสุข', 'M', '1996-02-29', '0800641217', 'n.nsupanuth@gmail.com', 'Regular', 'นักศึกษา', 'KMUTT', 28, 9),
('57070501053', '911525528949281', 'สิรภัทร', 'ผลหว้า', 'M', '1995-12-09', '0831600065', 'teamma_555@hotmail.com', 'Regular', 'นักศึกษา', '', 28, 13),
('57070501061', '10209561384664376', 'ทท', 'ทท', 'M', '1996-01-01', '0944444444', 'ecec@gmail.com', 'Regular', 'นศ', '', 28, 21),
('57070501065', '1430619143666403', 'กฤต', 'ประสาทพรศิริโชค', 'M', '1995-10-20', '0613849141', 'krit_424@hotmail.com', 'Regular', 'Student', 'Cosmo', 28, 25),
('57070501078', '1243071112418792', 'สาธิต', 'อุดมพานิช', 'M', '1996-08-30', '087-921510', 'sasuke_mik@hotmail.com', 'Regular', 'นศ', 'เทคโนบางมด', 28, 38),
('57070503464', '1314639715274911', 'อภิญญา', 'จิรปิติสัจจะ', 'F', '1996-03-14', '0858908660', 'apinya.pin@mail.kmutt.c.th', 'International', 'นักศึกษา', '', 28, 24),
('58070501024', '1348225395242168', 'ธนฤทธิ์', 'เลิศวุฒิการย์', 'M', '1997-01-15', '0813984068', 'cheast-naogi@hotmail.com', 'Regular', 'นักศึกษา', 'มจธ.', 29, 24),
('58070501064', '10207388023771122', 'วิธูสิริ', 'รอดสมบูรณ์', 'M', '1996-06-08', '0863727004', 'withusiri@gmail.com', 'Regular', 'นักศึกษา', '', 29, 24),
('58070503464', '1211927162177030', 'รชยา', 'อังคะนาวิน', 'F', '1996-10-08', '0955892108', 'toey.rac@hotmail.com', 'Regular', 'นักศึกษา', '', 29, 24),
('59070501024', '1317020631705077', 'ณัฏฐ์นรี', 'ศิลสังวรณ์', 'F', '1998-05-09', '0922813732', 'mei.n.s1998@gmail.com', 'Regular', 'นักศึกษา', '', 30, 24),
('59070501064', '1372285359449319', 'รวี', 'แซ่ห่าน', 'F', '1997-08-27', '0882962355', 'rawee.s@mail.kmutt.ac.th', 'Regular', 'นักศึกษา', 'CPE', 30, 24);

-- --------------------------------------------------------

--
-- Table structure for table `Taking`
--

CREATE TABLE IF NOT EXISTS `Taking` (
  `StudentUpperID` varchar(11) NOT NULL,
  `StudentUnderID` varchar(11) NOT NULL,
  PRIMARY KEY (`StudentUpperID`,`StudentUnderID`),
  KEY `StudentUnderID` (`StudentUnderID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Taking`
--

INSERT INTO `Taking` (`StudentUpperID`, `StudentUnderID`) VALUES
('57070501078', '57070501038'),
('57070501038', '57070501049'),
('57070501053', '57070501049'),
('57070501065', '57070501049'),
('57070501038', '57070501053'),
('57070501078', '57070501053'),
('57070501038', '57070501065'),
('57070501049', '57070501065'),
('57070501078', '57070501065');

-- --------------------------------------------------------

--
-- Table structure for table `Teacher`
--

CREATE TABLE IF NOT EXISTS `Teacher` (
  `TeacherID` int(4) NOT NULL AUTO_INCREMENT,
  `TeacherFirstName` varchar(30) NOT NULL,
  `TeacherLastname` varchar(30) NOT NULL,
  PRIMARY KEY (`TeacherID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `Teacher`
--

INSERT INTO `Teacher` (`TeacherID`, `TeacherFirstName`, `TeacherLastname`) VALUES
(1, 'ดร.พร', 'พันธุ์จงหาญ'),
(2, 'ดร.ขจรพงศ์', 'อัครจิตสกุล'),
(7, 'นางนงเยา', 'เคล้าเคลิ้ม'),
(9, 'ผศ.ดร.สุธาทิพย์', 'มณีวงศ์วัฒนา'),
(10, 'ผศ.ดร.สันติธรรม', 'พรหมอ่อน'),
(11, 'ดร.ปริยกร', 'ปุสวิโร'),
(12, 'ผศ.ดร.มารอง', 'ผดุงสิทธิ์'),
(13, 'ผศ.ดร.ณัฐนาถ', 'ฟาคุนเดซ'),
(14, 'ผศ.สุรพนธ์', 'ตุ้มนาค'),
(15, 'ดร.จุมพล', 'พลวิชัย'),
(16, 'รศ.ดร.พีรพล', 'ศิริพงศ์วุฒิกร'),
(17, 'รศ.ดร.ณัฐชา', 'เดชดำรง'),
(18, 'ดร.จาตุรนต์', 'หาญสมบูรณ์'),
(19, 'ผศ.พิพัฒน์', 'ศุภศิริสันต์'),
(20, 'ผศ.สนั่น', 'สระแก้ว'),
(21, 'อ.ไกรกร', 'เศรษฐไกรกุล'),
(22, 'รศ.ดร.นฤมล', ' วัฒนพงศกร'),
(23, 'รศ.ดร. ธีรณี', 'อจลากุล');

-- --------------------------------------------------------

--
-- Table structure for table `Teaching`
--

CREATE TABLE IF NOT EXISTS `Teaching` (
  `CourseID` varchar(6) NOT NULL,
  `TeacherID` int(4) NOT NULL,
  PRIMARY KEY (`CourseID`,`TeacherID`),
  KEY `TeacherID` (`TeacherID`),
  KEY `CourseID` (`CourseID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Teaching`
--

INSERT INTO `Teaching` (`CourseID`, `TeacherID`) VALUES
('CPE101', 1),
('CPE332', 1),
('CPE402', 1),
('CPE101', 2),
('CPE332', 2),
('CPE402', 2),
('CPE101', 7),
('CPE363', 7),
('CPE402', 7),
('CPE458', 7),
('CPE101', 9),
('CPE214', 9),
('CPE402', 9),
('CPE101', 10),
('CPE402', 10),
('CPE101', 11),
('CPE351', 11),
('CPE402', 11),
('CPE101', 12),
('CPE325', 12),
('CPE402', 12),
('CPE101', 13),
('CPE352', 13),
('CPE378', 13),
('CPE402', 13),
('CPE101', 14),
('CPE221', 14),
('CPE222', 14),
('CPE402', 14),
('CPE101', 15),
('CPE375', 15),
('CPE402', 15),
('CPE101', 16),
('CPE402', 16),
('CPE442', 16),
('CPE101', 17),
('CPE402', 17),
('CPE486', 17),
('CPE101', 18),
('CPE402', 18),
('CPE100', 19),
('CPE101', 19),
('CPE221', 19),
('CPE222', 19),
('CPE402', 19),
('CPE101', 20),
('CPE402', 20),
('CPE101', 21),
('CPE364', 21),
('CPE402', 21),
('CPE101', 22),
('CPE121', 22),
('CPE354', 22),
('CPE402', 22),
('CPE325', 23),
('CPE374', 23),
('CPE402', 23);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Activity`
--
ALTER TABLE `Activity`
  ADD CONSTRAINT `Activity_ibfk_1` FOREIGN KEY (`ActivityID`) REFERENCES `ActivityCode` (`ActivityID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Activity_ibfk_2` FOREIGN KEY (`StudentID`) REFERENCES `Student` (`StudentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Address`
--
ALTER TABLE `Address`
  ADD CONSTRAINT `Address_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `Student` (`StudentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Education`
--
ALTER TABLE `Education`
  ADD CONSTRAINT `Education_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `Student` (`StudentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Education_ibfk_2` FOREIGN KEY (`CourseID`) REFERENCES `Course` (`CourseID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `HangingOut`
--
ALTER TABLE `HangingOut`
  ADD CONSTRAINT `HangingOut_ibfk_1` FOREIGN KEY (`FamilyCode`) REFERENCES `FamilyCode` (`FamilyCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Internship`
--
ALTER TABLE `Internship`
  ADD CONSTRAINT `Internship_ibfk_1` FOREIGN KEY (`StudentID`) REFERENCES `Student` (`StudentID`);

--
-- Constraints for table `Permission`
--
ALTER TABLE `Permission`
  ADD CONSTRAINT `Permission_ibfk_1` FOREIGN KEY (`FacebookID`) REFERENCES `Student` (`FacebookID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Student`
--
ALTER TABLE `Student`
  ADD CONSTRAINT `Student_ibfk_1` FOREIGN KEY (`FamilyCode`) REFERENCES `FamilyCode` (`FamilyCode`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Taking`
--
ALTER TABLE `Taking`
  ADD CONSTRAINT `Taking_ibfk_2` FOREIGN KEY (`StudentUnderID`) REFERENCES `Student` (`StudentID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Taking_ibfk_1` FOREIGN KEY (`StudentUpperID`) REFERENCES `Student` (`StudentID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Teaching`
--
ALTER TABLE `Teaching`
  ADD CONSTRAINT `Teaching_ibfk_2` FOREIGN KEY (`TeacherID`) REFERENCES `Teacher` (`TeacherID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Teaching_ibfk_1` FOREIGN KEY (`CourseID`) REFERENCES `Course` (`CourseID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
