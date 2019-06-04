-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 04, 2019 at 06:10 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--
CREATE DATABASE IF NOT EXISTS `test` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `test`;

-- --------------------------------------------------------

--
-- Table structure for table `jevlasnik`
--

DROP TABLE IF EXISTS `jevlasnik`;
CREATE TABLE IF NOT EXISTS `jevlasnik` (
  `IDKorisnik` int(11) NOT NULL,
  `IDUO` int(11) NOT NULL,
  PRIMARY KEY (`IDKorisnik`,`IDUO`),
  KEY `R_8` (`IDUO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jevlasnik`
--

INSERT INTO `jevlasnik` (`IDKorisnik`, `IDUO`) VALUES
(2, 16),
(2, 32),
(2, 33),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 41),
(2, 42),
(2, 43),
(2, 44),
(2, 45),
(2, 46),
(2, 47),
(2, 48),
(2, 49),
(2, 50),
(2, 51),
(2, 54),
(2, 55);

-- --------------------------------------------------------

--
-- Table structure for table `komiocena`
--

DROP TABLE IF EXISTS `komiocena`;
CREATE TABLE IF NOT EXISTS `komiocena` (
  `IDKomiOcena` int(11) NOT NULL AUTO_INCREMENT,
  `IDKorisnik` int(11) DEFAULT NULL,
  `IDUO` int(11) DEFAULT NULL,
  `Komentar` longtext,
  `Ocena` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDKomiOcena`),
  KEY `R_5` (`IDUO`),
  KEY `R_4` (`IDKorisnik`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `komiocena`
--

INSERT INTO `komiocena` (`IDKomiOcena`, `IDKorisnik`, `IDUO`, `Komentar`, `Ocena`) VALUES
(2, 3, 32, 'super je lokal', 5),
(3, 3, 32, 'sve je super, osim konobara', 4),
(4, 2, 16, 'kom', 3),
(5, 2, 54, 'neki komentar', 1);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE IF NOT EXISTS `korisnik` (
  `IDKorisnik` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(20) DEFAULT NULL,
  `Password` varchar(32) DEFAULT NULL,
  `Tip` char(18) DEFAULT NULL,
  `AvatarPath` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`IDKorisnik`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`IDKorisnik`, `Username`, `Password`, `Tip`, `AvatarPath`) VALUES
(1, 'admin', 'test123', 'admin', NULL),
(2, 'vlasnik', 'test123', 'vlasnik', NULL),
(3, 'korisnik', 'test123', 'korisnik', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `phae`
--

DROP TABLE IF EXISTS `phae`;
CREATE TABLE IF NOT EXISTS `phae` (
  `IDUO` int(11) NOT NULL,
  `Pice` tinyint(3) UNSIGNED DEFAULT NULL,
  `Hrana` tinyint(3) UNSIGNED DEFAULT NULL,
  `Ambijent` tinyint(3) UNSIGNED DEFAULT NULL,
  `Ekstra` tinyint(3) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`IDUO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phae`
--

INSERT INTO `phae` (`IDUO`, `Pice`, `Hrana`, `Ambijent`, `Ekstra`) VALUES
(16, 255, 255, 255, 239),
(32, 0, 0, 0, 239),
(33, 0, 0, 0, 239),
(35, 0, 0, 0, 0),
(36, 0, 0, 0, 227),
(37, 0, 0, 0, 231),
(38, 116, 18, 32, 231),
(39, 0, 0, 0, 239),
(41, 0, 0, 0, 0),
(42, 0, 0, 0, 0),
(43, 0, 0, 0, 0),
(44, 0, 0, 0, 0),
(45, 0, 0, 0, 0),
(46, 0, 0, 0, 0),
(47, 0, 0, 0, 0),
(48, 0, 0, 0, 0),
(49, 0, 0, 0, 0),
(50, 0, 0, 0, 0),
(51, 0, 0, 0, 0),
(54, 255, 255, 255, 231),
(55, 0, 0, 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `sadrzi`
--

DROP TABLE IF EXISTS `sadrzi`;
CREATE TABLE IF NOT EXISTS `sadrzi` (
  `IDSearchKeywords` int(11) NOT NULL,
  `IDUO` int(11) NOT NULL,
  PRIMARY KEY (`IDSearchKeywords`,`IDUO`),
  KEY `R_12` (`IDUO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sadrzi`
--

INSERT INTO `sadrzi` (`IDSearchKeywords`, `IDUO`) VALUES
(25, 16),
(26, 16),
(27, 16),
(28, 16),
(55, 16),
(56, 16),
(57, 16),
(58, 16),
(59, 16),
(91, 16),
(92, 16),
(94, 16),
(95, 16),
(100, 16),
(124, 16),
(125, 16),
(126, 16),
(146, 16),
(147, 16),
(148, 16),
(160, 16),
(205, 16),
(206, 16),
(212, 16),
(728, 16),
(729, 16),
(730, 16),
(731, 16),
(732, 16),
(733, 16),
(734, 16),
(735, 16),
(736, 16),
(737, 16),
(738, 16),
(739, 16),
(740, 16),
(741, 16),
(742, 16),
(743, 16),
(744, 16),
(745, 16),
(746, 16),
(747, 16),
(748, 16),
(749, 16),
(750, 16),
(20, 32),
(27, 32),
(28, 32),
(29, 32),
(30, 32),
(56, 32),
(57, 32),
(58, 32),
(59, 32),
(95, 32),
(126, 32),
(160, 32),
(212, 32),
(221, 32),
(27, 33),
(28, 33),
(56, 33),
(57, 33),
(58, 33),
(59, 33),
(95, 33),
(126, 33),
(160, 33),
(221, 33),
(221, 35),
(27, 36),
(28, 36),
(56, 36),
(57, 36),
(95, 36),
(160, 36),
(221, 36),
(20, 37),
(27, 37),
(28, 37),
(29, 37),
(30, 37),
(56, 37),
(57, 37),
(95, 37),
(126, 37),
(160, 37),
(775, 37),
(20, 38),
(27, 38),
(28, 38),
(29, 38),
(30, 38),
(56, 38),
(57, 38),
(91, 38),
(92, 38),
(95, 38),
(124, 38),
(125, 38),
(126, 38),
(160, 38),
(205, 38),
(212, 38),
(735, 38),
(736, 38),
(737, 38),
(738, 38),
(747, 38),
(748, 38),
(771, 38),
(772, 38),
(773, 38),
(20, 39),
(27, 39),
(28, 39),
(29, 39),
(30, 39),
(56, 39),
(57, 39),
(58, 39),
(59, 39),
(95, 39),
(126, 39),
(160, 39),
(212, 39),
(774, 39),
(60, 42),
(771, 42),
(221, 43),
(780, 45),
(221, 51),
(20, 54),
(25, 54),
(26, 54),
(27, 54),
(28, 54),
(29, 54),
(30, 54),
(55, 54),
(56, 54),
(57, 54),
(91, 54),
(92, 54),
(94, 54),
(95, 54),
(100, 54),
(124, 54),
(125, 54),
(126, 54),
(146, 54),
(147, 54),
(148, 54),
(160, 54),
(205, 54),
(206, 54),
(212, 54),
(221, 54),
(733, 54),
(734, 54),
(735, 54),
(736, 54),
(737, 54),
(738, 54),
(739, 54),
(740, 54),
(741, 54),
(742, 54),
(743, 54),
(744, 54),
(745, 54),
(746, 54),
(747, 54),
(748, 54),
(749, 54),
(750, 54),
(785, 54),
(58, 55),
(59, 55),
(221, 55);

-- --------------------------------------------------------

--
-- Table structure for table `searchkeywords`
--

DROP TABLE IF EXISTS `searchkeywords`;
CREATE TABLE IF NOT EXISTS `searchkeywords` (
  `IDSearchKeywords` int(11) NOT NULL AUTO_INCREMENT,
  `Word` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`IDSearchKeywords`)
) ENGINE=InnoDB AUTO_INCREMENT=786 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `searchkeywords`
--

INSERT INTO `searchkeywords` (`IDSearchKeywords`, `Word`) VALUES
(1, 'bistro'),
(2, 'ulica'),
(3, 'prva'),
(4, '123'),
(5, 'ovo'),
(6, 'opis'),
(7, 'naseg'),
(8, 'lokala'),
(9, 'przeni'),
(10, 'humus'),
(11, 'kul'),
(12, 'smo'),
(13, 'jedete'),
(14, 'govna'),
(20, 'kafic'),
(21, 'bre'),
(22, 'kaka'),
(25, 'pizza'),
(26, 'pogled'),
(27, 'pet'),
(28, 'frendly'),
(29, 'brza'),
(30, 'hrana'),
(32, 'vojvode'),
(33, 'stepe'),
(34, 'izdvajamo'),
(35, 'burito'),
(36, 'sve'),
(37, 'izvajamo'),
(38, 'zato'),
(39, 'bree'),
(42, 'izmenjen'),
(43, 'lokal'),
(44, 'novaadresa'),
(47, 'nova'),
(48, 'razlika'),
(55, 'centar'),
(56, 'happy'),
(57, 'hour'),
(58, 'baby'),
(59, 'oprema'),
(60, 'aaa'),
(61, 'adr'),
(62, 'kjkjkjkjjk'),
(63, 'jkjkj'),
(64, 'aaaaaaaaabbbbbbbbbb'),
(65, '118'),
(82, 'sepe'),
(87, '202'),
(89, 'stepa'),
(91, 'obrok'),
(92, 'salate'),
(94, 'reka'),
(95, 'dostava'),
(98, 'aaaaaaaacccccccc'),
(99, 'stepecccccc'),
(100, 'balkon'),
(113, 'java'),
(114, 'vozd'),
(115, 'mwnirasl'),
(116, 'razl'),
(117, 'mojlokal'),
(118, 'mojaadrre'),
(119, 'mojmojmoj'),
(120, 'mojmoj'),
(121, 'moj'),
(124, 'ziva'),
(125, 'svirka'),
(126, 'parking'),
(146, 'splav'),
(147, 'chill'),
(148, 'basta'),
(150, 'uros'),
(151, 'uris'),
(152, 'lazra'),
(154, 'cao'),
(155, 'ayaya'),
(158, '202aaaaaaa'),
(159, 'aaaaaaaa'),
(160, 'wifi'),
(163, 'kolo'),
(164, 'novo'),
(165, 'jove'),
(205, 'kokteli'),
(206, 'vina'),
(212, 'restoran'),
(214, 'milos'),
(215, 'coko'),
(216, 'ubicu'),
(218, 'radi'),
(219, 'pliz'),
(220, 'dodaj1'),
(221, 'proba'),
(728, 'milica'),
(729, 'laza'),
(730, 'viktor'),
(731, 'ear'),
(732, 'zas'),
(733, 'bezalkoholna'),
(734, 'pica'),
(735, 'likeri'),
(736, 'vitaminski'),
(737, 'napici'),
(738, 'zestina'),
(739, 'kafa'),
(740, 'special'),
(741, 'craft'),
(742, 'pivo'),
(743, 'sendvici'),
(744, 'sushi'),
(745, 'pecenje'),
(746, 'rostilj'),
(747, 'dnevni'),
(748, 'meni'),
(749, 'kuvana'),
(750, 'jela'),
(771, 'novi'),
(772, 'obj'),
(773, 'adresa'),
(774, 'oianoloco'),
(775, 'proba8'),
(780, 'proba9'),
(783, 'prba'),
(785, '1010');

-- --------------------------------------------------------

--
-- Table structure for table `uo`
--

DROP TABLE IF EXISTS `uo`;
CREATE TABLE IF NOT EXISTS `uo` (
  `IDUO` int(11) NOT NULL AUTO_INCREMENT,
  `Opis` longtext,
  `PonPet` varchar(32) DEFAULT NULL,
  `Sub` varchar(32) DEFAULT NULL,
  `Ned` varchar(32) DEFAULT NULL,
  `AvgOcena` bigint(20) DEFAULT NULL,
  `Adresa` varchar(32) DEFAULT NULL,
  `Gmaps` varchar(32) DEFAULT NULL,
  `Odobren` tinyint(1) DEFAULT NULL,
  `Vidljivost` tinyint(1) DEFAULT NULL,
  `Info1` longtext,
  `Info2` longtext,
  `Info3` longtext,
  `Naziv` varchar(32) DEFAULT NULL,
  `JeRestoran` tinyint(1) DEFAULT NULL,
  `JeKafic` tinyint(1) DEFAULT NULL,
  `JeBrzaHrana` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`IDUO`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uo`
--

INSERT INTO `uo` (`IDUO`, `Opis`, `PonPet`, `Sub`, `Ned`, `AvgOcena`, `Adresa`, `Gmaps`, `Odobren`, `Vidljivost`, `Info1`, `Info2`, `Info3`, `Naziv`, `JeRestoran`, `JeKafic`, `JeBrzaHrana`) VALUES
(16, 'op', '15-03', '15-04', '15-05', 3, 'laza', '', 1, 1, 'me', 'ear', 'zas', 'MILIca laza viktor', 1, 0, 0),
(32, '', '', '', '', 5, 'proba', '', 1, 1, '', '', '', 'proba 4', 1, 1, 1),
(33, '', '00-00', '00-00', '00-00', 0, 'proba', '', 1, 0, '', '', '', 'proba 5', 0, 0, 0),
(35, '', '', '', '', 0, 'proba', '', 1, 1, '', '', '', 'proba 7', 0, 0, 0),
(36, '', '00-00', '00-00', '00-00', 0, '', '', 1, 0, '', '', '', 'proba 7', 0, 0, 0),
(37, '', '00-00', '12-10', '07-07', 0, '', '', 1, 1, '', '', '', 'proba8', 0, 1, 1),
(38, '', '00-15', '15-16', '17-17', 0, 'adresa 15', '', 0, 0, '', '', '', 'Novi obj', 1, 1, 1),
(39, '', '00-02', '11-12', '12-00', 0, '', '', 0, 0, '', '', '', 'OianoLoco', 1, 1, 1),
(41, '', '00-00', '00-00', '00-00', 0, '', '', 0, 0, '', '', '', 'novi aaa', 0, 0, 0),
(42, '', '00-00', '00-00', '00-00', 0, '', '', 0, 0, '', '', '', 'novi aaa', 0, 0, 0),
(43, '', '00-00', '00-00', '00-00', 0, '', '', 0, 0, '', '', '', 'proba 8', 0, 0, 0),
(44, '', '00-00', '00-00', '00-00', 0, '', '', 0, 0, '', '', '', 'proba9', 0, 0, 0),
(45, '', '00-00', '00-00', '00-00', 0, '', '', 0, 0, '', '', '', 'proba9', 0, 0, 0),
(46, '', '00-00', '00-00', '00-00', 0, '', '', 0, 0, '', '', '', 'proba9', 0, 0, 0),
(47, '', '00-00', '00-00', '00-00', 0, '', '', 0, 0, '', '', '', 'proba9', 0, 0, 0),
(48, '', '00-00', '00-00', '00-00', 0, '', '', 0, 0, '', '', '', 'proba 9', 0, 0, 0),
(49, '', '00-00', '00-00', '00-00', 0, '', '', 0, 0, '', '', '', 'proba 9', 0, 0, 0),
(50, '', '00-00', '00-00', '00-00', 0, '', '', 0, 0, '', '', '', 'proba 9', 0, 0, 0),
(51, '', '00-00', '00-00', '00-00', 0, '', '', 0, 0, '', '', '', 'proba 9', 0, 0, 0),
(54, 'proba 10', '15-16', '17-17', '19-19', 1, 'proba 10', '', 0, 0, 'proba 10', 'proba 10', 'proba 10', 'proba 1010', 1, 1, 1),
(55, '', '00-00', '00-00', '00-00', 0, '', '', 0, 0, '', '', '', 'proba 11', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `uoslike`
--

DROP TABLE IF EXISTS `uoslike`;
CREATE TABLE IF NOT EXISTS `uoslike` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDUO` int(11) NOT NULL,
  `rbr` int(11) NOT NULL,
  `Path` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `R_3` (`IDUO`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uoslike`
--

INSERT INTO `uoslike` (`ID`, `IDUO`, `rbr`, `Path`) VALUES
(33, 45, 1, 'kafa24.jpg'),
(34, 45, 2, 'kafa_-_Copy12.jpg'),
(36, 51, 1, 'kafa_-_Copy23.jpg'),
(37, 51, 7, 'kafa_-_Copy24.jpg'),
(50, 54, 1, 'kafa25.jpg'),
(51, 54, 2, 'kafa14.jpg'),
(52, 54, 3, 'kafa42.jpg'),
(53, 54, 4, 'fast14.jpg'),
(54, 54, 5, 'fast4.jpg'),
(55, 54, 6, 'kafa313.jpg'),
(56, 54, 7, 'kafa26.jpg'),
(57, 54, 8, 'kafa5.jpg'),
(58, 54, 9, 'kafa27.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jevlasnik`
--
ALTER TABLE `jevlasnik`
  ADD CONSTRAINT `R_7` FOREIGN KEY (`IDKorisnik`) REFERENCES `korisnik` (`IDKorisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `R_8` FOREIGN KEY (`IDUO`) REFERENCES `uo` (`IDUO`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `komiocena`
--
ALTER TABLE `komiocena`
  ADD CONSTRAINT `R_4` FOREIGN KEY (`IDKorisnik`) REFERENCES `korisnik` (`IDKorisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `R_5` FOREIGN KEY (`IDUO`) REFERENCES `uo` (`IDUO`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `phae`
--
ALTER TABLE `phae`
  ADD CONSTRAINT `R_2` FOREIGN KEY (`IDUO`) REFERENCES `uo` (`IDUO`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `sadrzi`
--
ALTER TABLE `sadrzi`
  ADD CONSTRAINT `R_11` FOREIGN KEY (`IDSearchKeywords`) REFERENCES `searchkeywords` (`IDSearchKeywords`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `R_12` FOREIGN KEY (`IDUO`) REFERENCES `uo` (`IDUO`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `uoslike`
--
ALTER TABLE `uoslike`
  ADD CONSTRAINT `R_3` FOREIGN KEY (`IDUO`) REFERENCES `uo` (`IDUO`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
