-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2013 at 02:40 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE IF NOT EXISTS `branch` (
  `BranchId` int(5) NOT NULL,
  `BranchThaiName` varchar(100) NOT NULL,
  `BranchEnglishName` varchar(100) NOT NULL,
  `FacultyId` varchar(100) NOT NULL,
  `DepartmentId` varchar(100) NOT NULL,
  PRIMARY KEY (`BranchId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`BranchId`, `BranchThaiName`, `BranchEnglishName`, `FacultyId`, `DepartmentId`) VALUES
(1, 'วิทยาการคอมพิวเตอร์', 'Computer science', '1', '8'),
(2, 'เทคโนโลยีสารสนเทศและการสื่อสาร', 'Information and Communication Technology', '1', '8'),
(3, 'ภูมิสารสนเทศศาสตร์', 'Geospatial sciences', '1', '8'),
(0, '-', '-', '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `CompanyId` int(20) NOT NULL AUTO_INCREMENT,
  `CompanyName` varchar(100) NOT NULL,
  `CompanyAddress` varchar(200) NOT NULL,
  `CompanyEmail` varchar(50) NOT NULL,
  `CompanyPhone` varchar(15) NOT NULL,
  PRIMARY KEY (`CompanyId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`CompanyId`, `CompanyName`, `CompanyAddress`, `CompanyEmail`, `CompanyPhone`) VALUES
(6, 'บริษัท เคโมไซเอนซ์ (ประเทศไทย) จํากัด', '1244 พัฒนาการ แขวงสวนหลวง เขตสวนหลวง กทม 10250', 'enquiry@chemoscience.co.th', '027175091-5'),
(7, 'ห้างหุ้นส่วนจำกัด ไซเอนซ์ พลัส อินสทรูเมนท์', '584 หมู่ที่ 11 ตำบล	บ้านเป็ด อำเภอ เมืองขอนแก่น จังหวัด ขอนแก่น 40000', '-', '081-5926109'),
(8, 'บริษัท พาราไซแอนติฟิค จำกัด', '968 พระราม 4 แขวงสีลม เขตบางรัก กทม 10500', 'som@barascientific.com', '026324300');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `DepartmentId` int(5) NOT NULL,
  `DepartmentThaiName` varchar(100) NOT NULL,
  `DepartmentEnglishName` varchar(100) NOT NULL,
  `FacultyId` varchar(100) NOT NULL,
  PRIMARY KEY (`DepartmentId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`DepartmentId`, `DepartmentThaiName`, `DepartmentEnglishName`, `FacultyId`) VALUES
(7, 'จุลชีววิทยา', 'Microbiology', '1'),
(6, 'สถิติ', 'Statistics', '1'),
(5, 'ฟิสิกส์', 'Physics', '1'),
(3, 'เคมี', 'chemistry', '1'),
(4, 'คณิตศาสตร์', 'Mathematics', '1'),
(1, 'นิติวิทยาศาสตร์', 'Forensic Science', '1'),
(2, 'ชีววิทยา', 'Biology', '1'),
(8, 'วิทยาการคอมพิวเตอร์', 'Computer science', '1'),
(9, 'ชีวเคมี', 'Biochemistry', '1'),
(10, 'วิทยาศาสตร์สิ่งแวดล้อม', 'Environmental Science', '1'),
(11, 'คณิตศาสตร์ประยุกต์', 'Applied Mathematics', '1'),
(12, 'พืชไร่', 'Farm products', '2'),
(13, 'โยธา', 'civil', '3');

-- --------------------------------------------------------

--
-- Table structure for table `durablearticle`
--

CREATE TABLE IF NOT EXISTS `durablearticle` (
  `DurableArticleId` int(20) NOT NULL AUTO_INCREMENT,
  `DurableArticleSetId` int(20) NOT NULL,
  `DurableArticleNumber` varchar(10) NOT NULL,
  `DurableArticleThaiName` varchar(100) NOT NULL,
  `DurableArticleEnglishName` varchar(100) NOT NULL,
  `DurableArticleVersion` varchar(100) NOT NULL,
  `DurableArticleDetail` varchar(150) NOT NULL,
  `DurableArticlePic` varchar(200) NOT NULL,
  `DurableArticleStatus` varchar(100) NOT NULL,
  `DurableArticleVouchDate` varchar(20) NOT NULL,
  `DuarableArticleCompanyId` int(20) NOT NULL,
  PRIMARY KEY (`DurableArticleId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `durablearticle`
--

INSERT INTO `durablearticle` (`DurableArticleId`, `DurableArticleSetId`, `DurableArticleNumber`, `DurableArticleThaiName`, `DurableArticleEnglishName`, `DurableArticleVersion`, `DurableArticleDetail`, `DurableArticlePic`, `DurableArticleStatus`, `DurableArticleVouchDate`, `DuarableArticleCompanyId`) VALUES
(5, 18, '3200125411', 'Gel Electrophoresis', 'Gel Electrophoresis', ' GE-100', 'ใช้ในการวัดปริมาณสาร', 'Gel Electrophoresis GE-100.jpg', 'พร้อมใช้งาน', '4', 6);

-- --------------------------------------------------------

--
-- Table structure for table `durablearticleset`
--

CREATE TABLE IF NOT EXISTS `durablearticleset` (
  `DurableArticleSetId` int(20) NOT NULL AUTO_INCREMENT,
  `DurableArticleSetNumber` varchar(20) NOT NULL,
  `DurableArticleSetThaiName` varchar(100) NOT NULL,
  `DurableArticleSetEnglishName` varchar(100) NOT NULL,
  `DurableArticleSetVersion` varchar(100) NOT NULL,
  `DurableArticleSetDetail` varchar(100) NOT NULL,
  `DurableArticleSetPic` varchar(600) NOT NULL,
  `DurableArticleSetHowtoUse` varchar(100) NOT NULL,
  `DurableArticleSetBuyDate` varchar(20) NOT NULL,
  `ProcurementBudgetYear` int(5) NOT NULL,
  `ProcurementBudgetType` varchar(20) NOT NULL,
  `VouchDate` varchar(20) NOT NULL,
  `DurableArticleSetAtRoom` varchar(100) NOT NULL,
  `DurableArticleSetType` varchar(20) NOT NULL,
  `DurableArticleSetStatus` varchar(20) NOT NULL DEFAULT 'พร้อมใช้งาน' COMMENT 'status : พร้อมใช้งาน , บำรุงรักษา ',
  `CompanyId` varchar(5) NOT NULL,
  `DurableArticleId` int(20) NOT NULL,
  PRIMARY KEY (`DurableArticleSetId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Dumping data for table `durablearticleset`
--

INSERT INTO `durablearticleset` (`DurableArticleSetId`, `DurableArticleSetNumber`, `DurableArticleSetThaiName`, `DurableArticleSetEnglishName`, `DurableArticleSetVersion`, `DurableArticleSetDetail`, `DurableArticleSetPic`, `DurableArticleSetHowtoUse`, `DurableArticleSetBuyDate`, `ProcurementBudgetYear`, `ProcurementBudgetType`, `VouchDate`, `DurableArticleSetAtRoom`, `DurableArticleSetType`, `DurableArticleSetStatus`, `CompanyId`, `DurableArticleId`) VALUES
(18, '5232010245', 'เครื่องวัดกรดด่าง', 'pH meter', 'BP3001', 'Automatic buffer recognition with built in standards:\r\nISO - pH7.00, 4.01, 10.01\r\nNIST - pH6.68, 4.0', 'pH meter BP3001.jpg', 'ควรทำการปรับจูนเครื่อง (calibration) ให้อ่านค่าได้ตรง  โดยใช้สารละลาย standard buffer  pH 4.0 ,  7.0', '2012-08-08', 1, '2', '4', '6205', 'อุปกรณ์กลาง', 'บำรุงรักษา', '6', 0),
(17, '3200152345', 'กล้องจุลทรรศน์ ', 'Microscope', 'nikon eclipse e200', 'The Eclipse E200-LED is a built-to-last, top-quality biological microscope ideal for basic laborator', 'nikon eclipse e200.jpg', 'การใช้กล้องจุลทรรศน์แบบใช้แสง (Light microscope) มีวิธีใช้ดังนี้\r\n1. วางกล้องให้ฐานอยู่บนพื้นรองรับท', '2012-10-16', 1, '2', '4', '6205', 'อุปกรณ์กลาง', 'พร้อมใช้งาน', '6', 0),
(19, '52302100214', 'นเครื่องมือที่ใช้ในการตรวจวัดปริมาณแสง', 'UV Spectrophotometer', 'shimadzu', 'สารอินทรีย์ สารประกอบเชิงซ้อน และสารอนินทรีย์โดยส่วนใหญ่ สามารถดูด กลืนแสงหรือรังสีที่อยู่ในช่วงยูวี', 'UV Spectrophotometer shimadzu.jpg', 'เครื่องวัดการดูดกลืนแสงแต่ละแบบอาจมีเทคนิคการใช้และวิธีการใช้แตกต่างกันบ้าง ซึ่งผู้ใช้ควรศึกษาคู่มือ', '2012-05-31', 2, '2', '4', '6205', 'อุปกรณ์กลาง', 'พร้อมใช้งาน', '8', 0),
(20, '3200114587', 'เครื่องหมุนเหวี่ยง', 'Centrifuge', 'Senova', 'Model                                      \r\nNovaFuge B134-6K\r\nMax. Speed\r\n5000rpm\r\nMax. RCF\r\n4390×g', 'Centrifuge.jpg', '1.   เปิด switch \r\n\r\n2.   ปรับความเร็ว หมุน  Speed Regulator\r\n\r\n3.   ปรับเวลาที่ลูกศรขึ้น ลง        ', '2013-02-12', 1, '2', '4', '6205', 'อุปกรณ์กลาง', 'พร้อมใช้งาน', '7', 0),
(21, '3200154877', 'เครื่องเพิ่มปริมาณดีเอ็นเอ', 'Thermal Cycler', 'รุ่น little genius', 'Thermal cycler is programmable, rapid temperature changeable, accurately temperature controllable in', 'Thermal Cycler BIOER.jpg', '1.   กดปุ่ม standby เพื่อเปิดเครื่อง จะปรากฏหน้าจอแรก\r\n\r\n2.   กดปุ่ม F2- Create เพื่อเลือก template ', '2013-02-12', 1, '2', '8', '6205', 'อุปกรณ์กลาง', 'พร้อมใช้งาน', '6', 0),
(22, '3200001254', 'ตู้อบสาร', 'Drying Oven with Natural', 'Binder ED53', 'Routine drying and sterilization applications up to 300 °C (572 °F) and storage at precisely control', 'Drying Oven with Natural Binder ED 53.jpg', ' ตู้อบความร้อน Drying ovens with forced convection FD53 แบบมีพัดลมกระจายความร้อน ขนาด 53 ลิตร FD ser', '2012-06-13', 1, '2', '4', '6205', 'อุปกรณ์กลาง', 'พร้อมใช้งาน', '8', 0);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `FacultyId` int(5) NOT NULL,
  `FacultyThaiName` varchar(100) NOT NULL,
  `FacultyEnglishName` varchar(100) NOT NULL,
  PRIMARY KEY (`FacultyId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`FacultyId`, `FacultyThaiName`, `FacultyEnglishName`) VALUES
(1, 'คณะวิทยาศาสตร์', 'Faculty of science'),
(4, 'คณะศึกษาศาสตร์', 'Faculty of Education'),
(3, 'คณะวิศวกรรมศาสตร์', 'Faculty of Engineering'),
(2, 'คณะเกษตรศาสตร์', 'Faculty of Agriculture'),
(5, 'คณะแพทยศาสตร์', 'Faculty of Medicine'),
(6, 'คณะพยาบาลศาสตร์', 'Faculty of Nursing'),
(7, 'คณะเทคนิคการแพทย์', 'Faculty of Associated Medical Science'),
(8, 'คณะทันตแพทยศาสตร์', 'Faculty of Dentistry'),
(9, 'คณะสาธารณสุขศาสตร์', 'Faculty of Public Health'),
(10, 'คณะเภสัชศาสตร์', 'Faculty of Pharmacy'),
(11, 'คณะสัตวแพทยศาสตร์', 'Faculty of Veterinary Science'),
(12, 'คณะมนุษยศาสตร์และสังคมศาสตร์', 'Faculty of Humanities and Social Sciences'),
(13, 'คณะเทคโนโลยี', 'Faculty of Technology'),
(14, 'คณะสถาปัตยกรรมศาสตร์', 'Faculty of Architecture'),
(15, 'คณะวิทยาการจัดการ', ' Faculty of Management Science'),
(16, 'คณะศิลปกรรมศาสตร์', 'Faculty of Fine and Applied Arts'),
(17, 'คณะนิติศาสตร์', 'Faculty of Law'),
(18, 'วิทยาลัยการปกครองส่วนท้องถิ่น', 'College of Local Administration'),
(19, 'วิทยาลัยนานาชาติ', 'International College');

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE IF NOT EXISTS `maintenance` (
  `MaintenanceId` int(20) NOT NULL AUTO_INCREMENT,
  `MaintenanceDetail` varchar(200) NOT NULL,
  `MaintenanceDetail2` varchar(200) NOT NULL,
  `MaintenanceNext` date NOT NULL,
  `MaintenanceCharges` varchar(10) NOT NULL,
  `MaintenanceDetailCharges` varchar(200) NOT NULL,
  `MaintenanceStatus` varchar(50) NOT NULL,
  `MaintenanceType` varchar(50) NOT NULL,
  `MaintenanceDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `MaintenanceDateReceive` date NOT NULL,
  `DurableArticleSetStatus` varchar(20) NOT NULL DEFAULT 'พร้อมใช้งาน' COMMENT 'status : พร้อมใช้งาน,บำรุงรักษา',
  `DurableArticleSetId` int(5) NOT NULL,
  PRIMARY KEY (`MaintenanceId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`MaintenanceId`, `MaintenanceDetail`, `MaintenanceDetail2`, `MaintenanceNext`, `MaintenanceCharges`, `MaintenanceDetailCharges`, `MaintenanceStatus`, `MaintenanceType`, `MaintenanceDate`, `MaintenanceDateReceive`, `DurableArticleSetStatus`, `DurableArticleSetId`) VALUES
(33, 'เสียหาย', '', '0000-00-00', '', '', 'รอการส่งซ่อม', 'ชำรุดจากการใช้งาน', '2013-02-13 17:18:06', '0000-00-00', 'พร้อมใช้งาน', 18);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `NewsId` int(5) NOT NULL AUTO_INCREMENT,
  `NewsDetail` varchar(300) NOT NULL,
  `NewsPic` varchar(100) NOT NULL,
  `NewsHeader` varchar(100) NOT NULL,
  PRIMARY KEY (`NewsId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `procurement`
--

CREATE TABLE IF NOT EXISTS `procurement` (
  `ProcurementBudgetId` int(10) NOT NULL AUTO_INCREMENT,
  `ProcurementBudgetType` varchar(100) NOT NULL,
  `ProcurementBudgetYear` varchar(10) NOT NULL,
  PRIMARY KEY (`ProcurementBudgetId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `procurement`
--

INSERT INTO `procurement` (`ProcurementBudgetId`, `ProcurementBudgetType`, `ProcurementBudgetYear`) VALUES
(1, 'งบประมาณแผ่นดิน', '2555'),
(2, 'งบประมาณคณะวิทยาศาสตร์มหาวิทยาลัยขอนแก่น', '2555');

-- --------------------------------------------------------

--
-- Table structure for table `reserve`
--

CREATE TABLE IF NOT EXISTS `reserve` (
  `ID` int(20) NOT NULL AUTO_INCREMENT,
  `Description` longtext NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `DurableArticleSetId` varchar(20) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending' COMMENT 'status: pending, checking, approved, non-approved',
  `Date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `group_id` int(11) NOT NULL,
  `show` tinyint(1) NOT NULL DEFAULT '1',
  `TimeAdd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=197 ;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`ID`, `Description`, `user_id`, `DurableArticleSetId`, `status`, `Date`, `end_date`, `group_id`, `show`, `TimeAdd`) VALUES
(190, 'M', '111131', '', 'approved', '2013-02-13 04:00:00', '2013-02-17 15:00:00', 1360594501, 0, '0000-00-00 00:00:00'),
(187, 'M', '111131', '', 'reject', '2013-01-26 10:00:00', '2013-01-29 15:00:00', 1359171121, 1, '0000-00-00 00:00:00'),
(191, '5', '111131', '', 'approved', '2013-02-17 13:00:00', '2013-02-19 16:00:00', 1360598281, 0, '2013-02-11 15:58:01'),
(192, 'p', '111149', '', 'pending', '2013-02-15 16:00:00', '2013-02-19 07:00:00', 1360802417, 1, '2013-02-14 00:40:17'),
(193, 'p', '111149', '', 'approved', '2013-02-14 01:00:00', '2013-02-14 08:00:00', 1360802500, 0, '2013-02-14 00:41:40'),
(194, 'T', '111156', '', 'pending', '2013-02-14 05:00:00', '2013-02-14 10:00:00', 1360815347, 1, '2013-02-14 04:15:47'),
(195, 'T', '111150', '', 'pending', '2013-02-14 05:00:00', '2013-02-14 10:00:00', 1360816283, 1, '2013-02-14 04:31:23'),
(196, 'T', '111150', '', 'pending', '2013-02-14 05:00:00', '2013-02-14 10:00:00', 1360816328, 1, '2013-02-14 04:32:08');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UserId` int(5) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `UserFullname` varchar(50) NOT NULL,
  `UserSex` varchar(5) NOT NULL,
  `UserAddress` varchar(150) NOT NULL,
  `UserPhone` varchar(11) NOT NULL,
  `UserEmail` varchar(150) NOT NULL,
  `UserSSID` varchar(13) NOT NULL,
  `UserStatus` varchar(20) NOT NULL DEFAULT 'user' COMMENT 'status: user, ADMIN, authority, authority-apply',
  `Active` varchar(10) NOT NULL DEFAULT 'No' COMMENT 'Active : Yes,No,NoApply',
  `Detail` varchar(300) NOT NULL,
  `FacultyId` varchar(10) NOT NULL,
  `DepartmentId` varchar(10) NOT NULL,
  `BranchId` varchar(10) NOT NULL,
  PRIMARY KEY (`UserId`),
  UNIQUE KEY `UserName` (`UserName`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=111161 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `UserName`, `Password`, `UserFullname`, `UserSex`, `UserAddress`, `UserPhone`, `UserEmail`, `UserSSID`, `UserStatus`, `Active`, `Detail`, `FacultyId`, `DepartmentId`, `BranchId`) VALUES
(111129, '523030837-1', '1234', 'Panyanan Kadroy', 'male', 'Mugdahan', '885353535', 'holytrue_1722@hotmail.com', '1349988765647', 'authority', 'Yes', '', '1', '8', '2'),
(111128, '523020623-0', '1234', 'teerawut hirunmaporn', 'male', 'Khonkaen', '883116262', 'holytrue_1722@hotmail.com', '1349900426262', 'authority', 'Yes', '', '1', '3', '-'),
(111131, 'authority', '1234', 'Test Authority', '', '', '0', '', '', 'authority', 'Yes', '', '1', '1', '0'),
(111136, 'admin', '1234', 'admin test', 'kku', 'kku', '1221212', 'dsdcdcdc', '12212121212', 'ADMIN', 'Yes', '', '1', '6', '-'),
(111154, ' 523020623-0 ', '1234', 'ธีรวุฒิ หิรัญมาพร', 'male', '256/36-37 ถ.อุดร-สามพร้าว ต.หมากแข้ง อ.เมือง จ.อุดรธานี 41000', '085-0241246', 'katsuojr0@gmail.com', '1419900223696', 'user', 'No', 'ขอใช้เพื่อการเรียน', '1', '8', '2'),
(111149, 'user', '1234', 'user dddd0', '1111 ', '1111 / 111 ssssss0', '11220022550', '441100@gmail.com0', '1141189800122', 'user', 'Yes', '', '1', '1', '0'),
(111150, 'test', '1234', 'test test', 'male', 'aaaa', '3333333333', 'sssssssss', '1111122112121', 'authority-apply', 'Yes', '', '1', '1', ''),
(111155, ' 0111 ', '1111', '1111', 'male', '1111', '1111', '1111', '111', 'user', 'No', '11111', '1', '3', ''),
(111156, 'pusadee', 'pusadee', 'pusadee', 'femal', 'cs sc kku', '043342910', 'pusadee2@hotmail.com', '1234567890123', 'authority-apply', 'Yes', '', '1', '8', '1'),
(111157, ' nok ', '1234', 'pusadee', 'femal', 'cs sc kku', '043342910', 'pusadee2@hotmail.com', '1234567890123', 'user', 'Yes', '', '1', '8', '1'),
(111158, ' nok2 ', '1234', 'nok2', 'femal', '-', '-', '-', '-', 'user', 'Yes', '-', '1', '8', '1'),
(111159, ' mmmm ', '1234', 'mm', 'male', 'mmmm', 'mmmm', 'mmmm', 'mmm', 'user', 'Yes', 'dd\r\n', '1', '1', '0'),
(111160, ' nnnn ', 'nnnn', 'nnnn', 'male', 'jjj', '2222222', 'jjj@gmail.com', '2123231213123', 'user', 'Yes', 'asf', '1', '5', '');

-- --------------------------------------------------------

--
-- Table structure for table `userdurablereport`
--

CREATE TABLE IF NOT EXISTS `userdurablereport` (
  `RId` int(10) NOT NULL AUTO_INCREMENT,
  `DurableArticleSetId` int(20) NOT NULL,
  `Detail` varchar(300) NOT NULL,
  `Active` varchar(11) NOT NULL DEFAULT 'No' COMMENT 'Show : Yes , No',
  PRIMARY KEY (`RId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
