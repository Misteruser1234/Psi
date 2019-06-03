-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 01, 2019 at 04:43 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `searchkeywords`
--

DROP TABLE IF EXISTS `searchkeywords`;
CREATE TABLE IF NOT EXISTS `searchkeywords` (
  `IDSearchKeywords` int(11) NOT NULL AUTO_INCREMENT,
  `Word` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`IDSearchKeywords`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `uoslike`
--

DROP TABLE IF EXISTS `uoslike`;
CREATE TABLE IF NOT EXISTS `uoslike` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IDUO` int(11) NOT NULL,
  `Path` varchar(32) DEFAULT NULL,
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
