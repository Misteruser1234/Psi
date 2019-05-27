-- ----------------------------------------------------------------------------
-- MySQL Workbench Migration
-- Migrated Schemata: Test
-- Source Schemata: Test
-- Created: Mon May 27 20:07:38 2019
-- Workbench Version: 8.0.16
-- ----------------------------------------------------------------------------

SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------------------------------------------------------
-- Schema Test
-- ----------------------------------------------------------------------------
DROP SCHEMA IF EXISTS `Test` ;
CREATE SCHEMA IF NOT EXISTS `Test` ;

-- ----------------------------------------------------------------------------
-- Table Test.JeVlasnik
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Test`.`JeVlasnik` (
  `IDKorisnik` INT NOT NULL,
  `IDUO` INT NOT NULL,
  PRIMARY KEY (`IDKorisnik`, `IDUO`),
  CONSTRAINT `R_6`
    FOREIGN KEY (`IDKorisnik`)
    REFERENCES `Test`.`Korisnik` (`IDKorisnik`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `R_8`
    FOREIGN KEY (`IDUO`)
    REFERENCES `Test`.`UO` (`IDUO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

-- ----------------------------------------------------------------------------
-- Table Test.KomiOcena
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Test`.`KomiOcena` (
  `IDKomiOcena` INT NOT NULL,
  `IDKorisnik` INT NULL,
  `IDUO` INT NULL,
  `Komentar` LONGTEXT NULL,
  `Ocena` INT NULL,
  PRIMARY KEY (`IDKomiOcena`),
  CONSTRAINT `R_4`
    FOREIGN KEY (`IDKorisnik`)
    REFERENCES `Test`.`Korisnik` (`IDKorisnik`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `R_5`
    FOREIGN KEY (`IDUO`)
    REFERENCES `Test`.`UO` (`IDUO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

-- ----------------------------------------------------------------------------
-- Table Test.Korisnik
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Test`.`Korisnik` (
  `IDKorisnik` INT NOT NULL,
  `Username` VARCHAR(20) NULL,
  `Password` VARCHAR(32) NULL,
  `Tip` CHAR(18) NULL,
  `AvatarPath` VARCHAR(32) NULL,
  PRIMARY KEY (`IDKorisnik`));

-- ----------------------------------------------------------------------------
-- Table Test.PHAE
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Test`.`PHAE` (
  `IDUO` INT NOT NULL,
  `Pice` TINYINT UNSIGNED NULL,
  `Hrana` TINYINT UNSIGNED NULL,
  `Ambijent` TINYINT UNSIGNED NULL,
  `Ekstra` TINYINT UNSIGNED NULL,
  PRIMARY KEY (`IDUO`),
  CONSTRAINT `R_2`
    FOREIGN KEY (`IDUO`)
    REFERENCES `Test`.`UO` (`IDUO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

-- ----------------------------------------------------------------------------
-- Table Test.Sadrzi
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Test`.`Sadrzi` (
  `IDSearchKeywords` INT NOT NULL,
  `IDUO` INT NOT NULL,
  PRIMARY KEY (`IDSearchKeywords`, `IDUO`),
  CONSTRAINT `R_11`
    FOREIGN KEY (`IDSearchKeywords`)
    REFERENCES `Test`.`SearchKeywords` (`IDSearchKeywords`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `R_12`
    FOREIGN KEY (`IDUO`)
    REFERENCES `Test`.`UO` (`IDUO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

-- ----------------------------------------------------------------------------
-- Table Test.SearchKeywords
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Test`.`SearchKeywords` (
  `IDSearchKeywords` INT NOT NULL,
  `Word` VARCHAR(32) NULL,
  PRIMARY KEY (`IDSearchKeywords`));

-- ----------------------------------------------------------------------------
-- Table Test.UO
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Test`.`UO` (
  `IDUO` INT NOT NULL,
  `Opis` LONGTEXT NULL,
  `PonPet` VARCHAR(32) NULL,
  `Sub` VARCHAR(32) NULL,
  `Ned` VARCHAR(32) NULL,
  `AvgOcena` BIGINT NULL,
  `Adresa` VARCHAR(32) NULL,
  `Gmaps` VARCHAR(32) NULL,
  `Odobren` TINYINT(1) NULL,
  `Vidljivost` TINYINT(1) NULL,
  `Info1` LONGTEXT NULL,
  `Info2` LONGTEXT NULL,
  `Info3` LONGTEXT NULL,
  `Naziv` VARCHAR(32) NULL,
  `JeRestoran` TINYINT(1) NULL,
  `JeKafic` TINYINT(1) NULL,
  `JeBrzaHrana` TINYINT(1) NULL,
  PRIMARY KEY (`IDUO`));

-- ----------------------------------------------------------------------------
-- Table Test.UOSlike
-- ----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS `Test`.`UOSlike` (
  `IDUO` INT NOT NULL,
  `Path` VARCHAR(32) NULL,
  PRIMARY KEY (`IDUO`),
  CONSTRAINT `R_3`
    FOREIGN KEY (`IDUO`)
    REFERENCES `Test`.`UO` (`IDUO`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
SET FOREIGN_KEY_CHECKS = 1;
