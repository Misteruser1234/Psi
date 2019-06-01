-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 01, 2019 at 12:11 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

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
(2, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(2, 26),
(2, 27),
(2, 28),
(2, 29),
(2, 30),
(2, 31),
(2, 32),
(2, 33),
(2, 34),
(2, 35),
(2, 36),
(2, 37),
(2, 38),
(2, 39),
(2, 40),
(2, 41),
(2, 42),
(2, 43),
(2, 44),
(2, 45),
(2, 46),
(2, 47),
(2, 48),
(2, 49),
(2, 50);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(2, 25, 26, 10, 36),
(3, 25, 26, 10, 36),
(4, 0, 0, 0, 0),
(5, 0, 0, 0, 0),
(6, 0, 0, 0, 0),
(7, 0, 0, 0, 0),
(8, 0, 0, 0, 0),
(9, 0, 0, 0, 0),
(10, 0, 0, 0, 0),
(11, 0, 0, 0, 0),
(12, 0, 0, 0, 0),
(13, 0, 0, 0, 0),
(14, 0, 0, 0, 0),
(15, 0, 0, 0, 0),
(16, 0, 0, 0, 0),
(17, 0, 0, 0, 0),
(18, 0, 0, 0, 0),
(19, 0, 0, 0, 0),
(20, 0, 0, 0, 0),
(21, 0, 0, 0, 0),
(22, 0, 0, 0, 0),
(23, 0, 0, 0, 0),
(24, 0, 0, 0, 0),
(25, 0, 0, 0, 0),
(26, 0, 0, 0, 0),
(27, 0, 0, 0, 0),
(28, 0, 0, 0, 0),
(29, 0, 0, 0, 0),
(30, 0, 0, 0, 0),
(31, 0, 0, 0, 0),
(32, 0, 0, 0, 0),
(33, 0, 0, 0, 0),
(34, 0, 0, 0, 0),
(35, 0, 0, 0, 0),
(36, 0, 0, 0, 0),
(37, 0, 0, 0, 0),
(38, 0, 0, 0, 0),
(39, 0, 0, 0, 0),
(40, 0, 0, 0, 0),
(41, 0, 0, 0, 0),
(42, 0, 0, 0, 0),
(43, 0, 0, 0, 0),
(44, 0, 0, 0, 0),
(45, 0, 0, 0, 0),
(46, 0, 0, 0, 0),
(47, 0, 0, 0, 0),
(48, 0, 0, 0, 0),
(49, 0, 0, 0, 0),
(50, 0, 0, 0, 0);

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
(1, 18),
(2, 18),
(3, 19),
(4, 19),
(4, 20),
(5, 20);

-- --------------------------------------------------------

--
-- Table structure for table `searchkeywords`
--

DROP TABLE IF EXISTS `searchkeywords`;
CREATE TABLE IF NOT EXISTS `searchkeywords` (
  `IDSearchKeywords` int(11) NOT NULL AUTO_INCREMENT,
  `Word` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`IDSearchKeywords`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `searchkeywords`
--

INSERT INTO `searchkeywords` (`IDSearchKeywords`, `Word`) VALUES
(1, 'asdasd'),
(2, 'adfda'),
(3, 'sad'),
(4, 'asd'),
(5, 'adf');

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
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uo`
--

INSERT INTO `uo` (`IDUO`, `Opis`, `PonPet`, `Sub`, `Ned`, `AvgOcena`, `Adresa`, `Gmaps`, `Odobren`, `Vidljivost`, `Info1`, `Info2`, `Info3`, `Naziv`, `JeRestoran`, `JeKafic`, `JeBrzaHrana`) VALUES
(1, '', '', '', '', 0, 'adf', 'adffad', 0, 0, '', '', '', 'asdasd', 0, 0, 0),
(2, '', '', '', '', 0, 'adf', 'adffad', 0, 0, '', '', '', 'asdasd', 0, 0, 0),
(3, '', '', '', '', 0, 'adf', 'adffad', 0, 0, '', '', '', 'asdasd', 0, 0, 0),
(4, '', '', '', '', 0, 'adf', 'adf', 0, 0, '', '', '', 'afd', 0, 0, 0),
(5, '', '', '', '', 0, 'asd', 'ads', 0, 0, '', '', '', 'asd', 0, 0, 0),
(6, '', '', '', '', 0, '', '', 0, 0, '', '', '', '', 0, 0, 0),
(7, '', '', '', '', 0, '', '', 0, 0, '', '', '', '', 0, 0, 0),
(8, '', '', '', '', 0, 'asd', 'asd', 0, 0, '', '', '', 'asd', 0, 0, 0),
(9, '', '', '', '', 0, 'asd', 'asd', 0, 0, '', '', '', 'asd', 0, 0, 0),
(10, '', '', '', '', 0, 'asd', 'asd', 0, 0, '', '', '', 'asd', 0, 0, 0),
(11, '', '', '', '', 0, 'asd', 'asd', 0, 0, '', '', '', 'asd', 0, 0, 0),
(12, '', '', '', '', 0, 'proba1', 'proba1', 0, 0, '', '', '', 'proba1', 0, 0, 0),
(13, '', '', '', '', 0, '', '', 0, 0, '', '', '', '', 0, 0, 0),
(14, '', '', '', '', 0, 'asd', 'asd', 0, 0, '', '', '', 'asd', 0, 0, 0),
(15, '', '04-07', '00-', '00-00', 0, 'irina', 'irina', 0, 0, '', '', '', 'irina', 0, 0, 0),
(16, '', '', '00-00', '00-00', 0, 'dfa', 'afds', 0, 0, '', '', '', 'asdafg', 0, 0, 0),
(17, '', '', '00-00', '00-00', 0, 'adfda', 'afdaf', 0, 0, '', '', '', 'asdasd', 0, 0, 0),
(18, '', '', '00-00', '00-00', 0, 'adfda', 'afdaf', 0, 0, '', '', '', 'asdasd', 0, 0, 0),
(19, '', '', '00-00', '00-00', 0, 'asd', 'asd', 0, 0, '', '', '', 'sad', 0, 0, 0),
(20, '', '', '00-00', '00-00', 0, 'adf', 'adf', 0, 0, '', '', '', 'asd', 0, 0, 0),
(21, '', '', '00-00', '00-00', 0, '', '', 0, 0, '', '', '', '', 0, 0, 0),
(22, '', '', '00-00', '00-00', 0, '', '', 0, 0, '', '', '', '', 0, 0, 0),
(23, '', '', '00-00', '00-00', 0, 'asd', 'adf', 0, 0, '', '', '', 'asdd', 0, 0, 0),
(24, '', '', '00-00', '00-00', 0, 'asd', 'adf', 0, 0, '', '', '', 'asdd', 0, 0, 0),
(25, '', '', '00-00', '00-00', 0, 'asd', 'adf', 0, 0, '', '', '', 'asdd', 0, 0, 0),
(26, '', '', '00-00', '00-00', 0, 'asd', 'adf', 0, 0, '', '', '', 'asdd', 0, 0, 0),
(27, '', '', '00-00', '00-00', 0, '', '', 0, 0, '', '', '', '', 0, 0, 0),
(28, '', '', '00-00', '00-00', 0, '', '', 0, 0, '', '', '', '', 0, 0, 0),
(29, '', '', '00-00', '00-00', 0, '', '', 0, 0, '', '', '', '', 0, 0, 0),
(30, '', '', '00-00', '00-00', 0, '', '', 0, 0, '', '', '', '', 0, 0, 0),
(31, '', '', '00-00', '00-00', 0, '', '', 0, 0, '', '', '', '', 0, 0, 0),
(32, '', '', '00-00', '00-00', 0, '', '', 0, 0, '', '', '', '', 0, 0, 0),
(33, '', '', '00-00', '00-00', 0, '', '', 0, 0, '', '', '', '', 0, 0, 0),
(34, '', '', '00-00', '00-00', 0, '', '', 0, 0, '', '', '', '', 0, 0, 0),
(35, '', '', '00-00', '00-00', 0, '', '', 0, 0, '', '', '', '', 0, 0, 0),
(36, '', '', '00-00', '00-00', 0, '', '', 0, 0, '', '', '', '', 0, 0, 0),
(37, '', '', '00-00', '00-00', 0, 'asd', 'asd', 0, 0, '', '', '', 'asd', 0, 0, 0),
(38, '', '', '00-00', '00-00', 0, 'asd', 'asd', 0, 0, '', '', '', 'asd', 0, 0, 0),
(39, '', '', '00-00', '00-00', 0, 'asd', 'asd', 0, 0, '', '', '', 'asd', 0, 0, 0),
(40, '', '', '00-00', '00-00', 0, 'asd', 'asd', 0, 0, '', '', '', 'asd', 0, 0, 0),
(41, '', '', '00-00', '00-00', 0, 'asd', 'asd', 0, 0, '', '', '', 'asd', 0, 0, 0),
(42, '', '', '00-00', '00-00', 0, 'asd', 'asd', 0, 0, '', '', '', 'asd', 0, 0, 0),
(43, '', '', '00-00', '00-00', 0, 'asd', 'asd', 0, 0, '', '', '', 'asd', 0, 0, 0),
(44, '', '', '00-00', '00-00', 0, 'asd', 'asd', 0, 0, '', '', '', 'asd', 0, 0, 0),
(45, '', '', '00-00', '00-00', 0, 'asd', 'asd', 0, 0, '', '', '', 'asd', 0, 0, 0),
(46, '', '', '00-00', '00-00', 0, 'asd', 'asd', 0, 0, '', '', '', 'asd', 0, 0, 0),
(47, '', '', '00-00', '00-00', 0, '', '', 0, 0, '', '', '', '', 0, 0, 0),
(48, '', '', '00-00', '00-00', 0, '', '', 0, 0, '', '', '', '', 0, 0, 0),
(49, '', '', '00-00', '00-00', 0, '', '', 0, 0, '', '', '', '', 0, 0, 0),
(50, '', '', '00-00', '00-00', 0, '', '', 0, 0, '', '', '', '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `uoslike`
--

DROP TABLE IF EXISTS `uoslike`;
CREATE TABLE IF NOT EXISTS `uoslike` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDUO` int(11) NOT NULL,
  `Path` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `R_3` (`IDUO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jevlasnik`
--
ALTER TABLE `jevlasnik`
  ADD CONSTRAINT `R_7` FOREIGN KEY (`IDKorisnik`) REFERENCES `korisnik` (`IDKorisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `R_8` FOREIGN KEY (`IDUO`) REFERENCES `uo` (`IDUO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `komiocena`
--
ALTER TABLE `komiocena`
  ADD CONSTRAINT `R_4` FOREIGN KEY (`IDKorisnik`) REFERENCES `korisnik` (`IDKorisnik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `R_5` FOREIGN KEY (`IDUO`) REFERENCES `uo` (`IDUO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `phae`
--
ALTER TABLE `phae`
  ADD CONSTRAINT `R_2` FOREIGN KEY (`IDUO`) REFERENCES `uo` (`IDUO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sadrzi`
--
ALTER TABLE `sadrzi`
  ADD CONSTRAINT `R_11` FOREIGN KEY (`IDSearchKeywords`) REFERENCES `searchkeywords` (`IDSearchKeywords`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `R_12` FOREIGN KEY (`IDUO`) REFERENCES `uo` (`IDUO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `uoslike`
--
ALTER TABLE `uoslike`
  ADD CONSTRAINT `R_3` FOREIGN KEY (`IDUO`) REFERENCES `uo` (`IDUO`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
