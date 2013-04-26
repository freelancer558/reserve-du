-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2013 at 03:52 PM
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
  `CompanyThaiName` varchar(100) NOT NULL,
  `CompanyEnglishName` varchar(100) NOT NULL,
  `CompanyAddress` varchar(200) NOT NULL,
  `CompanyEmail` varchar(50) NOT NULL,
  `CompanyPhone` varchar(15) NOT NULL,
  PRIMARY KEY (`CompanyId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`CompanyId`, `CompanyThaiName`, `CompanyEnglishName`, `CompanyAddress`, `CompanyEmail`, `CompanyPhone`) VALUES
(6, 'บริษัท เคโมไซเอนซ์ (ประเทศไทย) จํากัด', '', '1244 พัฒนาการ แขวงสวนหลวง เขตสวนหลวง กทม 10250', 'enquiry@chemoscience.co.th', '027175091-5'),
(7, 'ห้างหุ้นส่วนจำกัด ไซเอนซ์ พลัส อินสทรูเมนท์', '', '584 หมู่ที่ 11 ตำบล	บ้านเป็ด อำเภอ เมืองขอนแก่น จังหวัด ขอนแก่น 40000', '-', '081-5926109'),
(8, 'บริษัท พาราไซแอนติฟิค จำกัด', '', '968 พระราม 4 แขวงสีลม เขตบางรัก กทม 10500', 'som@barascientific.com', '026324300');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Address` varchar(500) NOT NULL,
  `Email` varchar(120) NOT NULL,
  `phone1` varchar(20) NOT NULL,
  `phone2` varchar(20) NOT NULL,
  `PhoneFax` varchar(12) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`Id`, `Name`, `Address`, `Email`, `phone1`, `phone2`, `PhoneFax`) VALUES
(1, 'คุณธนากร โคธิเสน', 'สำนักงานคณบดี คณะวิทยาศาสตร์\r\nอาคาร Sc.06 มหาวิทยาลัยขอนแก่น', 'thakho@kku.ac.th', '043-202372 ต่อ 148', '-', '043-202371'),
(2, 'คุณจิตภรณ์ พิมพ์ภูมี', 'อาคาร Sc.08 ห้อง 8420\r\nคณะวิทยาศาสตร์ มหาวิทยาลัยขอแก่น', 'jirpim@kku.ac.th', '043-202372', '-', '043-202371');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `durablearticle`
--

INSERT INTO `durablearticle` (`DurableArticleId`, `DurableArticleSetId`, `DurableArticleNumber`, `DurableArticleThaiName`, `DurableArticleEnglishName`, `DurableArticleVersion`, `DurableArticleDetail`, `DurableArticlePic`, `DurableArticleStatus`, `DurableArticleVouchDate`, `DuarableArticleCompanyId`) VALUES
(5, 17, '3200125411', 'อิเล็กโตรโฟรีซิส', 'Gel Electrophoresis', ' GE-100', 'ใช้ในการวัดปริมาณสาร', 'Gel Electrophoresis GE-100.jpg', 'พร้อมใช้งาน', '4', 7);

-- --------------------------------------------------------

--
-- Table structure for table `durablearticleset`
--

CREATE TABLE IF NOT EXISTS `durablearticleset` (
  `DurableArticleSetId` int(20) NOT NULL AUTO_INCREMENT,
  `DurableArticleSetNumber` varchar(20) NOT NULL,
  `DurableArticleSetThaiName` varchar(100) NOT NULL,
  `DurableArticleSetEnglishName` varchar(100) NOT NULL,
  `DurableArticleSetBrand` varchar(200) NOT NULL,
  `DurableArticleSetVersion` varchar(100) NOT NULL,
  `DurableArticleSetDetail` varchar(100) NOT NULL,
  `DurableArticleSetPic` varchar(600) NOT NULL,
  `DurableArticleSetHowtoUse` varchar(100) NOT NULL,
  `DurableArticleSetBuyDate` varchar(20) NOT NULL,
  `ProcurementBudgetYear` varchar(100) NOT NULL,
  `ProcurementBudgetType` varchar(100) NOT NULL,
  `VouchDate` varchar(20) NOT NULL,
  `DurableArticleSetAtRoom` varchar(100) NOT NULL,
  `DurableArticleSetType` varchar(100) NOT NULL,
  `DurableArticleSetStatus` varchar(20) NOT NULL DEFAULT 'พร้อมใช้งาน' COMMENT 'status : พร้อมใช้งาน , บำรุงรักษา ',
  `CompanyId` varchar(5) NOT NULL,
  `DurableArticleId` int(20) NOT NULL,
  PRIMARY KEY (`DurableArticleSetId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `durablearticleset`
--

INSERT INTO `durablearticleset` (`DurableArticleSetId`, `DurableArticleSetNumber`, `DurableArticleSetThaiName`, `DurableArticleSetEnglishName`, `DurableArticleSetBrand`, `DurableArticleSetVersion`, `DurableArticleSetDetail`, `DurableArticleSetPic`, `DurableArticleSetHowtoUse`, `DurableArticleSetBuyDate`, `ProcurementBudgetYear`, `ProcurementBudgetType`, `VouchDate`, `DurableArticleSetAtRoom`, `DurableArticleSetType`, `DurableArticleSetStatus`, `CompanyId`, `DurableArticleId`) VALUES
(18, '5232010245', 'เครื่องวัดกรดด่าง', 'pH meter', '', 'BP3001', 'Automatic buffer recognition with built in standards:\r\nISO - pH7.00, 4.01, 10.01\r\nNIST - pH6.68, 4.0', 'pH meter BP3001.jpg', 'tor227.pdf', '2012-08-08', '1', '1', '4', '6205', 'อุปกรณ์กลาง', 'พร้อมใช้งาน', '6', 0),
(17, '3200152345', 'กล้องจุลทรรศน์ ', 'Microscope', 'Nikon', 'nikon eclipse e200', 'nikon eclipse e200', 'nikon eclipse e200.jpg', 'tor227.pdf', '2012-10-16', '1', '1', '4', '6205', 'อุปกรณ์กลาง', 'พร้อมใช้งาน', '6', 0),
(19, '52302100214', 'เครื่องมือที่ใช้ในการตรวจวัดปริมาณแสง', 'UV Spectrophotometer', 'shimadzu', 'shimadzu', 'สารอินทรีย์ สารประกอบเชิงซ้อน และสารอนินทรีย์โดยส่วนใหญ่ สามารถดูด กลืนแสงหรือรังสีที่อยู่ในช่วงยูวี', 'UV Spectrophotometer shimadzu.jpg', 'tor227.pdf', '2012-05-31', '1', '1', '4', '6205', 'อุปกรณ์กลาง', 'พร้อมใช้งาน', '6', 0),
(20, '3200114587', 'เครื่องหมุนเหวี่ยง', 'Centrifuge', 'Senova', 'Senova', 'Model                                      \r\nNovaFuge B134-6K\r\nMax. Speed\r\n5000rpm\r\nMax. RCF\r\n4390×g', 'Centrifuge.jpg', 'tor227.pdf', '2013-02-12', '1', '1', '4', '6205', 'อุปกรณ์กลาง', 'พร้อมใช้งาน', '6', 0),
(21, '3200154877', 'เครื่องเพิ่มปริมาณดีเอ็นเอ', 'Thermal Cycler', '', 'little genius', 'Thermal cycler is programmable, rapid temperature changeable, accurately temperature controllable in', 'Thermal Cycler BIOER.jpg', 'tor227.pdf', '2013-02-12', '1', '1', '8', '6205', 'อุปกรณ์กลาง', 'พร้อมใช้งาน', '6', 0),
(22, '5202120000183', 'ตู้อบสาร', 'Drying Oven with Natural', 'Binder ', 'ED53', 'Routine drying and sterilization applications up to 300 °C (572 °F) and storage at precisely control', 'Drying Oven with Natural Binder ED 53.jpg', 'tor227.pdf', '2012-06-13', '1', '1', '4', '6205', 'อุปกรณ์กลาง', 'พร้อมใช้งาน', '6', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`MaintenanceId`, `MaintenanceDetail`, `MaintenanceDetail2`, `MaintenanceNext`, `MaintenanceCharges`, `MaintenanceDetailCharges`, `MaintenanceStatus`, `MaintenanceType`, `MaintenanceDate`, `MaintenanceDateReceive`, `DurableArticleSetStatus`, `DurableArticleSetId`) VALUES
(44, 'ไม่สามารถใช้งานได้ ไม่ทราบสาเหตุ ', 'สายไฟเสียหาย', '0000-00-00', '1000', 'เปลี่ยนสายไฟภายในเครื่อง', 'ได้รับเครื่องมือคืนแล้ว', 'ชำรุดจากการใช้งาน', '2013-02-20 08:09:53', '2013-03-05', 'พร้อมใช้งาน', 18),
(57, 'เสียหายจากการใช้งาน', 'เสียหาย', '0000-00-00', '400.00', 'การเช็คสภาพ', 'ได้รับเครื่องมือคืนแล้ว', 'ชำรุดจากการใช้งาน', '2013-03-18 14:20:52', '2013-03-20', 'พร้อมใช้งาน', 21);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `NewsId` int(5) NOT NULL AUTO_INCREMENT,
  `NewsDetail` varchar(10000) NOT NULL,
  `NewsPic` varchar(100) NOT NULL,
  `NewsHeader` varchar(300) NOT NULL,
  PRIMARY KEY (`NewsId`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`NewsId`, `NewsDetail`, `NewsPic`, `NewsHeader`) VALUES
(13, 'คณะวิทยาศาสตร์  ขอเชิญบุคลากรคณะวิทยาศาสตร์  ร่วมงานฌาปนกิจศพบิดาของผศ.ดร.ชนกพร  เผ่าศิริ   สังกัด  ภาควิชาเคมี  คณะวิทยาศาสตร์  มหาวิทยาลัยขอนแก่น  ซึ่งมีกำหนดการพระราชทานเพลิงศพ  ในวันที่  20 กุมภาพันธ์  2556    เวลา  16.00  น.  ณ  เมรุวัดโนนชัยวนาราม  บ้านโนนชัย  อำเภอเมือง  จังหวัดขอนแก่น  (มีรถออกจากโรงรถคณะวิทยาศาสตร์  เวลา  14.00 น.)    และ ขอเชิญร่วมงานฌาปนกิจศพมารดาของนายเดือน  จรัสแสงทอง  ตำแหน่งพนักงานห้องทดลอง  สังกัด  ภาควิชาเคมี  คณะวิทยาศาสตร์  มหาวิทยาลัยขอนแก่น  มีกำหนดการฌาปนกิจศพ  ในวันที่  20  กุมภาพันธ์  2556  เลา  15.00  น.  ณ  เมรุวัดสว่างสุธาราม  บ้านหนองกุง  อำเภอเมือง  จังหวัดขอนแก่น    คณะวิทยาศาสตร์  ขอแสดงความเสียใจกับทั้ง 2 ครอบครัวมา  ณ  โอกาสนี้', 'Untitled-29.png', 'ขอเชิญร่วมงานฌาปนกิจศพ บิดาของผศ.ดร.ชนกพร เผ่าศิริ และมารดาของ นายเดือน จรัสแสงทอง'),
(10, 'ผศ.ดร.สมพงษ์  สิทธิพรหม  รองคณบดีฝ่ายบริหาร  พร้อมด้วยคณะผู้ทรงคุณวุฒิส่งเสริมกิจการคณะวิทยาศาสตร์  มหาวิทยาลัยขอนแก่น  ได้แก่ ศ.ดร.สุพจน์  หารหนองบัว  คณบดีคณะวิทยาศาสตร์  จุฬาลงกรณ์มหาวิทยาลัย  รศ.วุฒิสาร  ตันชัย  รองเลขาธิการสถาบันพระปกเกล้า  นายเกรียงไกร  ฎิระวณิชย์กุล  กรรมการผู้จัดการทั่วไป  บ', 'IMG_3705.JPG', 'ผู้ทรงคุณวฒิฯคณะวิทยาศาสตร์ มข นำเสนอโครงการ Khon Kaen Model');

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
  `user_id` varchar(10) NOT NULL,
  `DurableArticleSet` varchar(200) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending' COMMENT 'status: pending, checking, approved, non-approved',
  `Date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `group_id` int(11) NOT NULL,
  `show` tinyint(1) NOT NULL DEFAULT '1',
  `TimeAdd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Detail` varchar(300) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=292 ;

--
-- Dumping data for table `reserve`
--

INSERT INTO `reserve` (`ID`, `user_id`, `DurableArticleSet`, `status`, `Date`, `end_date`, `group_id`, `show`, `TimeAdd`, `Detail`) VALUES
(234, '111131', 'Microscope', 'approved', '2013-02-27 06:00:00', '2013-03-01 17:00:00', 1361326641, 0, '2013-02-20 09:17:21', ''),
(213, '111150', 'pH meter', 'approved', '2013-03-25 08:00:00', '2013-03-28 14:00:00', 1361282794, 0, '2013-02-19 21:06:34', ''),
(214, '111150', 'Microscope', 'approved', '2013-03-25 08:00:00', '2013-03-28 14:00:00', 1361282794, 0, '2013-02-19 21:06:34', ''),
(215, '111150', 'pH meter', 'approved', '2013-04-19 08:00:00', '2013-04-28 15:00:00', 1361283216, 0, '2013-02-19 21:13:36', ''),
(216, '111150', 'Microscope', 'approved', '2013-04-19 08:00:00', '2013-04-28 15:00:00', 1361283216, 0, '2013-02-19 21:13:36', ''),
(217, '111150', 'UV Spectrophotometer', 'approved', '2013-04-19 08:00:00', '2013-04-28 15:00:00', 1361283216, 0, '2013-02-19 21:13:36', ''),
(218, '111150', 'Centrifuge', 'approved', '2013-04-19 08:00:00', '2013-04-28 15:00:00', 1361283216, 0, '2013-02-19 21:13:36', ''),
(238, '111176', 'pH meter', 'approved', '2013-02-22 17:00:00', '2013-02-22 19:00:00', 1361333548, 0, '2013-02-20 11:12:28', ''),
(233, '111131', 'pH meter', 'approved', '2013-02-27 06:00:00', '2013-03-01 17:00:00', 1361326641, 0, '2013-02-20 09:17:21', ''),
(237, '111149', 'Drying Oven with Natural', 'approved', '2013-02-24 08:00:00', '2013-02-25 16:00:00', 1361326910, 0, '2013-02-20 09:21:50', ''),
(227, '111131', 'UV Spectrophotometer', 'approved', '2013-02-19 09:00:00', '2013-02-22 16:00:00', 1361287313, 0, '2013-02-19 22:21:53', ''),
(226, '111131', 'Microscope', 'approved', '2013-02-19 09:00:00', '2013-02-22 16:00:00', 1361287313, 0, '2013-02-19 22:21:53', ''),
(225, '111131', 'pH meter', 'approved', '2013-02-19 09:00:00', '2013-02-22 16:00:00', 1361287313, 0, '2013-02-19 22:21:53', ''),
(239, '111149', 'pH meter', 'approved', '2013-02-22 17:00:00', '2013-02-22 18:00:00', 1361333596, 0, '2013-02-20 11:13:16', ''),
(236, '111149', 'pH meter', 'approved', '2013-02-24 08:00:00', '2013-02-25 16:00:00', 1361326910, 0, '2013-02-20 09:21:50', ''),
(240, '111150', 'pH meter', 'approved', '2013-03-05 08:00:00', '2013-03-08 10:00:00', 1361697410, 0, '2013-02-24 16:16:50', ''),
(241, '111150', 'Microscope', 'approved', '2013-03-05 08:00:00', '2013-03-08 10:00:00', 1361697410, 0, '2013-02-24 16:16:50', ''),
(259, '111131', 'Microscope', 'approved', '2013-03-29 09:00:00', '2013-03-31 17:00:00', 1362451666, 0, '2013-03-05 09:47:46', 'เทสน'),
(258, '111131', 'pH meter', 'approved', '2013-03-29 09:00:00', '2013-03-31 17:00:00', 1362451666, 0, '2013-03-05 09:47:46', 'เทสน'),
(244, '111131', 'pH meter', 'pending', '2013-03-17 10:00:00', '2013-03-20 16:00:00', 1362325585, 0, '2013-03-03 22:46:25', ''),
(245, '111131', 'Microscope', 'pending', '2013-03-17 10:00:00', '2013-03-20 16:00:00', 1362325585, 0, '2013-03-03 22:46:25', ''),
(246, '111131', 'pH meter', 'approved', '2013-03-17 09:00:00', '2013-03-20 16:00:00', 1362325598, 1, '2013-03-03 22:46:38', ''),
(247, '111131', 'Microscope', 'approved', '2013-03-17 09:00:00', '2013-03-20 16:00:00', 1362325598, 1, '2013-03-03 22:46:38', ''),
(248, '111131', 'pH meter', 'approved', '2013-03-11 08:00:00', '2013-03-15 18:00:00', 1362381623, 0, '2013-03-04 14:20:23', ''),
(249, '111131', 'Microscope', 'approved', '2013-03-11 08:00:00', '2013-03-15 18:00:00', 1362381623, 0, '2013-03-04 14:20:23', ''),
(250, '111131', 'pH meter', 'approved', '2013-03-21 09:00:00', '2013-03-23 16:00:00', 1362410545, 0, '2013-03-04 22:22:25', ''),
(251, '111131', 'Microscope', 'approved', '2013-03-21 09:00:00', '2013-03-23 16:00:00', 1362410545, 0, '2013-03-04 22:22:25', ''),
(252, '111131', 'pH meter', 'pending', '2013-03-17 09:00:00', '2013-03-20 17:00:00', 1362413877, 1, '2013-03-04 23:17:57', ''),
(253, '111131', 'Microscope', 'pending', '2013-03-17 09:00:00', '2013-03-20 17:00:00', 1362413877, 1, '2013-03-04 23:17:57', ''),
(254, '111131', 'pH meter', 'pending', '2013-03-17 12:00:00', '2013-03-20 17:00:00', 1362415600, 1, '2013-03-04 23:46:40', ''),
(255, '111131', 'Microscope', 'pending', '2013-03-17 12:00:00', '2013-03-20 17:00:00', 1362415600, 1, '2013-03-04 23:46:40', ''),
(256, '111131', 'pH meter', 'pending', '2013-03-17 10:00:00', '2013-03-20 17:00:00', 1362415790, 1, '2013-03-04 23:49:50', ''),
(257, '111131', 'Microscope', 'pending', '2013-03-17 10:00:00', '2013-03-20 17:00:00', 1362415790, 1, '2013-03-04 23:49:50', ''),
(260, '111131', 'pH meter', 'approved', '2013-03-31 17:05:00', '2013-03-31 19:00:00', 1362451788, 0, '2013-03-05 09:49:48', 'ghfhgfgh'),
(264, '111131', 'Drying Oven with Natural', 'pending', '2013-03-31 14:44:00', '2013-04-10 14:44:00', 1363938325, 1, '2013-03-22 14:45:25', ''),
(265, '111131', 'Drying Oven with Natural', 'pending', '2013-03-31 14:44:00', '2013-04-10 14:44:00', 1363938385, 1, '2013-03-22 14:46:25', ''),
(266, '111131', 'Drying Oven with Natural', 'pending', '2013-03-31 14:44:00', '2013-04-10 14:44:00', 1363938432, 1, '2013-03-22 14:47:12', ''),
(267, '111131', 'Drying Oven with Natural', 'pending', '2013-03-31 14:44:00', '2013-04-10 14:44:00', 1363941438, 1, '2013-03-22 15:37:18', ''),
(268, '111131', 'Drying Oven with Natural', 'pending', '2013-03-31 14:44:00', '2013-04-10 14:44:00', 1363941451, 1, '2013-03-22 15:37:31', ''),
(269, '111131', 'Drying Oven with Natural', 'pending', '2013-03-31 14:44:00', '2013-04-10 14:44:00', 1363941460, 1, '2013-03-22 15:37:40', ''),
(270, '111131', 'Drying Oven with Natural', 'pending', '2013-03-31 14:44:00', '2013-04-10 14:44:00', 1363941470, 1, '2013-03-22 15:37:50', ''),
(271, '111131', 'Drying Oven with Natural', 'pending', '2013-03-31 14:44:00', '2013-04-10 14:44:00', 1363941517, 1, '2013-03-22 15:38:37', ''),
(272, '111131', 'Drying Oven with Natural', 'pending', '2013-03-31 14:44:00', '2013-04-10 14:44:00', 1363941608, 1, '2013-03-22 15:40:08', ''),
(273, '111131', 'Drying Oven with Natural', 'pending', '2013-03-31 14:44:00', '2013-04-10 14:44:00', 1363941615, 1, '2013-03-22 15:40:15', ''),
(274, '111131', 'Drying Oven with Natural', 'pending', '2013-03-31 14:44:00', '2013-04-10 14:44:00', 1363941643, 1, '2013-03-22 15:40:43', ''),
(275, '111131', 'Drying Oven with Natural', 'pending', '2013-03-31 14:44:00', '2013-04-10 14:44:00', 1363941671, 1, '2013-03-22 15:41:11', ''),
(276, '111131', 'Drying Oven with Natural', 'pending', '2013-03-31 14:44:00', '2013-04-10 14:44:00', 1363941681, 1, '2013-03-22 15:41:21', ''),
(277, '111131', 'Drying Oven with Natural', 'pending', '2013-03-31 14:44:00', '2013-04-10 14:44:00', 1363941730, 1, '2013-03-22 15:42:10', ''),
(278, '111131', 'Drying Oven with Natural', 'pending', '2013-03-31 14:44:00', '2013-04-10 14:44:00', 1363941757, 1, '2013-03-22 15:42:37', ''),
(279, '111131', 'Drying Oven with Natural', 'pending', '2013-03-31 14:44:00', '2013-04-10 14:44:00', 1363941765, 1, '2013-03-22 15:42:45', ''),
(280, '111131', 'Drying Oven with Natural', 'pending', '2013-03-31 14:44:00', '2013-04-10 14:44:00', 1363941779, 1, '2013-03-22 15:42:59', ''),
(281, '111131', 'Drying Oven with Natural', 'pending', '2013-03-31 14:44:00', '2013-04-10 14:44:00', 1363941820, 1, '2013-03-22 15:43:40', ''),
(282, '111131', 'Drying Oven with Natural', 'pending', '2013-03-31 14:44:00', '2013-04-10 14:44:00', 1363941845, 1, '2013-03-22 15:44:05', ''),
(283, '111131', 'Drying Oven with Natural', 'pending', '2013-03-31 14:44:00', '2013-04-10 14:44:00', 1363941949, 1, '2013-03-22 15:45:49', ''),
(284, '111149', 'pH meter', 'pending', '2013-04-11 15:28:00', '2013-04-30 15:28:00', 1365668917, 1, '2013-04-11 08:28:37', ''),
(285, '111149', 'pH meter', 'pending', '2013-04-17 15:29:00', '2013-04-29 15:28:00', 1365668976, 1, '2013-04-11 08:29:36', ''),
(286, '111149', 'Microscope', 'pending', '2013-04-17 15:29:00', '2013-04-29 15:28:00', 1365668976, 1, '2013-04-11 08:29:36', ''),
(287, '111149', 'pH meter', 'pending', '2013-04-17 15:29:00', '2013-04-29 15:28:00', 1365669033, 1, '2013-04-11 08:30:33', ''),
(288, '111149', 'Microscope', 'pending', '2013-04-17 15:29:00', '2013-04-29 15:28:00', 1365669033, 1, '2013-04-11 08:30:33', ''),
(289, '111149', 'Microscope', 'pending', '2013-04-17 11:21:00', '2013-04-17 11:21:00', 1366172474, 1, '2013-04-17 04:21:14', ''),
(290, '111149', 'pH meter', 'approved', '2013-04-17 11:21:00', '2013-04-17 11:21:00', 1366172502, 1, '2013-04-17 04:21:42', ''),
(291, '111149', 'pH meter', 'pending', '2013-04-29 14:32:00', '2013-04-30 14:32:00', 1366702266, 1, '2013-04-23 07:31:06', '');

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
  `UserStatus` varchar(20) NOT NULL COMMENT 'status: user, ADMIN, authority, authority-apply',
  `Active` varchar(10) NOT NULL DEFAULT 'No' COMMENT 'Active : Yes,No,NoApply',
  `Detail` varchar(300) NOT NULL,
  `FacultyId` varchar(10) NOT NULL,
  `DepartmentId` varchar(10) NOT NULL,
  `BranchId` varchar(10) NOT NULL,
  PRIMARY KEY (`UserId`),
  UNIQUE KEY `UserName` (`UserName`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=111181 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `UserName`, `Password`, `UserFullname`, `UserSex`, `UserAddress`, `UserPhone`, `UserEmail`, `UserSSID`, `UserStatus`, `Active`, `Detail`, `FacultyId`, `DepartmentId`, `BranchId`) VALUES
(111129, '523030837-1', '1234', 'Panyanan Kadroy', 'male', 'Mugdahan', '885353535', 'holytrue_1722@hotmail.com', '1349988765647', 'authority', 'Yes', '', '1', '8', '2'),
(111175, '523020113-4', '1234', 'ธีรวุฒิ หิรัญมา', 'male', 'อุดรธานี', '085-0241246', 'kk@gmail.com', '1231122112131', 'user', 'Yes', 'ขอเข้าใช้ระบบเพื่อการศึกษา', '1', '8', ''),
(111131, 'authority', '1234', 'Test Authority', 'male', '', '0', '', '', 'authority', 'Yes', '', '1', '1', '0'),
(111136, 'admin', '1234', 'admin tests', 'male', 'kku', '1221212', 'dsdc@gmail.com', '12212121212', 'ADMIN', 'Yes', '', '1', '6', '-'),
(111154, ' 523020623-0 ', '1234', 'ธีรวุฒิ หิรัญมาพร', 'male', '256/36-37 ถ.อุดร-สามพร้าว ต.หมากแข้ง อ.เมือง จ.อุดรธานี 41000', '085-0241246', 'katsuojr0@gmail.com', '1419900223696', 'user', 'Yes', 'ขอใช้เพื่อการเรียน', '1', '8', '2'),
(111149, 'user', '1234', 'usertest', 'male', '1111 / 111 ssssss0', '11220022550', '441100@gmail.com0', '1141189800122', 'user', 'Yes', '', '1', '1', '0'),
(111150, 'test', '1234', 'test test', 'male', 'aaaa', '3333333333', 'sssssssss', '1111122112121', 'authority-apply', 'Yes', '', '1', '1', ''),
(111156, 'pusadee', 'pusadee', 'pusadee', 'femal', 'cs sc kku', '043342910', 'pusadee2@hotmail.com', '1234567890123', 'authority-apply', 'Yes', '', '1', '8', '1'),
(111157, ' nok ', '1234', 'pusadee', 'femal', 'cs sc kku', '043342910', 'pusadee2@hotmail.com', '1234567890123', 'user', 'Yes', '', '1', '8', '1'),
(111158, ' nok2 ', '1234', 'nok2', 'femal', '-', '-', '-', '-', 'user', 'Yes', '-', '1', '8', '1'),
(111178, '1111', '1111', '2222', 'male', '515151', '515151', '515151', '51515151551', 'user ', 'NoApply', '51515', '2', '12', ''),
(111177, 'tori', '1234', 'tori', 'femal', '123 kku', '0807777777', 'tori@hotmail.com', '12334455555', 'user', 'Yes', 'xxxx', '1', '1', ''),
(111176, 'pusadee1', '1234', 'pusadee', 'femal', 'kku', '0866626617', 'kku@kku.com', '1211111111111', 'user', 'Yes', 'เทส', '1', '8', ''),
(111179, 'kkkkkk', 'kkkkkk', 'kkkkkk', 'male', 'sadasd', '0867281827', 'momo_te_kung@hotmail.com', '1412211223123', 'user ', 'Yes', 'sdd', '1', '1', ''),
(111180, 'mmmm', 'mmmm', 'mmmm', 'male', 'mmmm', '222222222', 'katsuojr0@gmail.com', '1121220022020', 'user ', 'Yes', '2121', '1', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `userdurablereport`
--

CREATE TABLE IF NOT EXISTS `userdurablereport` (
  `RId` int(10) NOT NULL AUTO_INCREMENT,
  `DurableArticleSetId` int(20) NOT NULL,
  `Detail` varchar(300) NOT NULL,
  `Active` varchar(11) NOT NULL DEFAULT 'No' COMMENT 'Show : Yes , No',
  `UserId` int(10) NOT NULL,
  PRIMARY KEY (`RId`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `userdurablereport`
--

INSERT INTO `userdurablereport` (`RId`, `DurableArticleSetId`, `Detail`, `Active`, `UserId`) VALUES
(1, 17, 'มีการเสียหายที่เลนส์ ทำให้มองภาพไม่ชัด', 'Yes', 0),
(2, 18, 'อุปกรณ์มีปัญหา ไม่สามารถใช้งานได้', 'Yes', 0),
(3, 17, 'ไม่สามารถมใช้งานได้', 'No', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
