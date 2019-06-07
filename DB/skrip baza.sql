-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 07, 2019 at 07:52 PM
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
(4, 59),
(4, 60),
(4, 63);

-- --------------------------------------------------------

--
-- Table structure for table `komiocena`
--

DROP TABLE IF EXISTS `komiocena`;
CREATE TABLE IF NOT EXISTS `komiocena` (
  `IDKomiOcena` int(11) NOT NULL AUTO_INCREMENT,
  `IDKorisnik` int(11) DEFAULT NULL,
  `IDUO` int(11) DEFAULT NULL,
  `Komentar` longtext CHARACTER SET utf8 COLLATE utf8_bin,
  `Ocena` int(11) DEFAULT NULL,
  PRIMARY KEY (`IDKomiOcena`),
  KEY `R_5` (`IDUO`),
  KEY `R_4` (`IDKorisnik`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `komiocena`
--

INSERT INTO `komiocena` (`IDKomiOcena`, `IDKorisnik`, `IDUO`, `Komentar`, `Ocena`) VALUES
(8, 2, 59, 'Ambijent je jako prijatan i usluga na nivou.', 5),
(9, 4, 59, 'Najbolji kokteli!', 5),
(10, 2, 60, 'Fino mesto i okej hrana.', 4);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
CREATE TABLE IF NOT EXISTS `korisnik` (
  `IDKorisnik` int(11) NOT NULL AUTO_INCREMENT,
  `Username` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `Password` varchar(32) DEFAULT NULL,
  `Tip` char(18) DEFAULT NULL,
  `AvatarPath` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`IDKorisnik`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`IDKorisnik`, `Username`, `Password`, `Tip`, `AvatarPath`) VALUES
(1, 'admin', 'test123', 'admin', NULL),
(2, 'vlasnik', 'test123', 'vlasnik', NULL),
(3, 'korisnik', 'test123', 'korisnik', NULL),
(4, 'anaana', 'anaana', 'vlasnik', 'Flower_jtca001.jpg');

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
(59, 255, 24, 105, 219),
(60, 254, 110, 1, 131),
(63, 204, 63, 8, 48);

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
(1754, 59),
(1755, 59),
(1756, 59),
(1757, 59),
(1758, 59),
(1759, 59),
(1760, 59),
(1761, 59),
(1762, 59),
(1763, 59),
(1764, 59),
(1765, 59),
(1766, 59),
(1767, 59),
(1768, 59),
(1769, 59),
(1770, 59),
(1771, 59),
(1772, 59),
(1773, 59),
(1774, 59),
(1775, 59),
(1776, 59),
(1777, 59),
(1778, 59),
(1779, 59),
(1780, 59),
(1781, 59),
(1782, 59),
(1783, 59),
(1784, 59),
(1785, 59),
(1786, 59),
(1787, 59),
(1788, 59),
(1789, 59),
(1790, 59),
(1791, 59),
(1792, 59),
(1793, 59),
(1794, 59),
(1795, 59),
(1796, 59),
(1797, 59),
(1798, 59),
(1799, 59),
(1800, 59),
(1801, 59),
(1802, 59),
(1803, 59),
(1804, 59),
(1805, 59),
(1806, 59),
(1807, 59),
(1808, 59),
(1809, 59),
(1810, 59),
(1811, 59),
(1812, 59),
(1813, 59),
(1814, 59),
(1815, 59),
(1816, 59),
(1817, 59),
(1818, 59),
(1819, 59),
(1820, 59),
(1821, 59),
(1822, 59),
(1823, 59),
(1824, 59),
(1825, 59),
(1826, 59),
(1827, 59),
(1828, 59),
(1829, 59),
(1830, 59),
(1831, 59),
(1832, 59),
(1833, 59),
(1834, 59),
(1835, 59),
(1836, 59),
(1837, 59),
(1838, 59),
(1839, 59),
(1840, 59),
(1841, 59),
(1842, 59),
(1843, 59),
(1844, 59),
(1845, 59),
(1846, 59),
(1847, 59),
(1848, 59),
(1849, 59),
(1850, 59),
(1851, 59),
(1852, 59),
(1853, 59),
(1854, 59),
(1855, 59),
(1856, 59),
(1857, 59),
(1858, 59),
(1859, 59),
(1860, 59),
(1861, 59),
(1862, 59),
(1863, 59),
(1864, 59),
(1865, 59),
(1866, 59),
(1867, 59),
(1868, 59),
(1869, 59),
(1870, 59),
(1871, 59),
(1872, 59),
(1873, 59),
(1874, 59),
(1875, 59),
(1876, 59),
(1877, 59),
(1878, 59),
(1879, 59),
(1880, 59),
(1881, 59),
(1882, 59),
(1883, 59),
(1884, 59),
(1885, 59),
(1886, 59),
(1887, 59),
(1888, 59),
(1889, 59),
(1890, 59),
(1891, 59),
(1892, 59),
(1893, 59),
(1894, 59),
(1895, 59),
(1896, 59),
(1897, 59),
(1898, 59),
(1899, 59),
(1900, 59),
(1901, 59),
(1902, 59),
(1903, 59),
(1904, 59),
(1905, 59),
(1906, 59),
(1907, 59),
(1908, 59),
(1909, 59),
(1910, 59),
(1911, 59),
(1912, 59),
(1913, 59),
(1914, 59),
(1915, 59),
(1916, 59),
(1917, 59),
(1918, 59),
(1919, 59),
(1920, 59),
(1755, 60),
(1757, 60),
(1775, 60),
(1786, 60),
(1863, 60),
(1889, 60),
(1891, 60),
(1892, 60),
(1893, 60),
(1894, 60),
(1895, 60),
(1896, 60),
(1897, 60),
(1898, 60),
(1899, 60),
(1900, 60),
(1905, 60),
(1916, 60),
(1917, 60),
(1918, 60),
(1919, 60),
(1920, 60),
(1921, 60),
(1922, 60),
(1923, 60),
(1924, 60),
(1925, 60),
(1926, 60),
(1927, 60),
(1928, 60),
(1929, 60),
(1930, 60),
(1931, 60),
(1932, 60),
(1933, 60),
(1934, 60),
(1935, 60),
(1936, 60),
(1937, 60),
(1938, 60),
(1939, 60),
(1940, 60),
(1941, 60),
(1942, 60),
(1943, 60),
(1944, 60),
(1945, 60),
(1946, 60),
(1947, 60),
(1948, 60),
(1949, 60),
(1950, 60),
(1951, 60),
(1952, 60),
(1953, 60),
(1954, 60),
(1955, 60),
(1956, 60),
(1957, 60),
(1958, 60),
(1959, 60),
(1960, 60),
(1961, 60),
(1962, 60),
(1963, 60),
(1964, 60),
(1965, 60),
(1966, 60),
(1967, 60),
(1771, 63),
(1811, 63),
(1827, 63),
(1830, 63),
(1891, 63),
(1892, 63),
(1893, 63),
(1897, 63),
(1898, 63),
(1903, 63),
(1904, 63),
(1905, 63),
(1909, 63),
(1912, 63),
(1913, 63),
(1919, 63),
(1935, 63),
(1942, 63),
(1946, 63),
(1948, 63),
(1949, 63),
(1952, 63),
(1965, 63),
(1966, 63),
(1967, 63),
(1968, 63),
(1969, 63),
(1970, 63),
(1971, 63),
(1972, 63),
(1973, 63),
(1974, 63),
(1975, 63),
(1976, 63),
(1977, 63),
(1978, 63),
(1979, 63),
(1980, 63),
(1981, 63),
(1982, 63),
(1983, 63),
(1984, 63),
(1985, 63),
(1986, 63),
(1987, 63),
(1988, 63),
(1989, 63),
(1990, 63),
(1991, 63),
(1992, 63),
(1993, 63),
(1994, 63),
(1995, 63),
(1996, 63),
(1997, 63),
(1998, 63),
(1999, 63),
(2000, 63),
(2001, 63),
(2002, 63),
(2003, 63),
(2004, 63),
(2005, 63),
(2006, 63),
(2007, 63),
(2008, 63),
(2009, 63),
(2010, 63),
(2011, 63),
(2012, 63),
(2013, 63),
(2014, 63),
(2015, 63),
(2016, 63),
(2017, 63),
(2018, 63),
(2019, 63),
(2020, 63),
(2021, 63),
(2022, 63),
(2023, 63),
(2024, 63),
(2025, 63),
(2026, 63),
(2027, 63),
(2028, 63),
(2029, 63),
(2030, 63),
(2031, 63),
(2032, 63),
(2033, 63),
(2034, 63),
(2035, 63),
(2036, 63),
(2037, 63),
(2038, 63),
(2039, 63),
(2040, 63),
(2041, 63),
(2042, 63),
(2043, 63),
(2044, 63),
(2045, 63),
(2046, 63),
(2047, 63),
(2048, 63),
(2049, 63),
(2050, 63),
(2051, 63),
(2052, 63),
(2053, 63),
(2054, 63),
(2055, 63),
(2056, 63),
(2057, 63),
(2058, 63),
(2059, 63),
(2060, 63),
(2061, 63),
(2062, 63),
(2063, 63),
(2064, 63),
(2065, 63),
(2066, 63),
(2067, 63),
(2068, 63),
(2069, 63),
(2070, 63),
(2071, 63),
(2072, 63),
(2073, 63),
(2074, 63),
(2075, 63),
(2076, 63),
(2077, 63),
(2078, 63),
(2079, 63),
(2080, 63),
(2081, 63),
(2082, 63),
(2083, 63),
(2084, 63),
(2085, 63),
(2086, 63),
(2087, 63),
(2088, 63),
(2089, 63),
(2090, 63),
(2091, 63),
(2092, 63);

-- --------------------------------------------------------

--
-- Table structure for table `searchkeywords`
--

DROP TABLE IF EXISTS `searchkeywords`;
CREATE TABLE IF NOT EXISTS `searchkeywords` (
  `IDSearchKeywords` int(11) NOT NULL AUTO_INCREMENT,
  `Word` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`IDSearchKeywords`)
) ENGINE=InnoDB AUTO_INCREMENT=2093 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `searchkeywords`
--

INSERT INTO `searchkeywords` (`IDSearchKeywords`, `Word`) VALUES
(1754, 'jazz'),
(1755, 'basta'),
(1756, 'karadjordjeva'),
(1757, 'beograd'),
(1758, 'karadjordjevoj'),
(1759, 'nalazi'),
(1760, 'zgrada'),
(1761, 'cija'),
(1762, 'izgradnja'),
(1763, 'pocela'),
(1764, 'davne'),
(1765, '1870'),
(1766, 'godine'),
(1767, 'ciji'),
(1768, 'zid'),
(1769, 'krio'),
(1770, 'prostor'),
(1771, 'koji'),
(1772, 'malo'),
(1773, 'truda'),
(1774, 'pretvorio'),
(1775, 'mesto'),
(1776, 'opustanje'),
(1777, 'pod'),
(1778, 'imenom'),
(1779, '␜basta␝'),
(1780, 'ulaz'),
(1781, 'ovaj'),
(1782, 'mali'),
(1783, 'raj'),
(1784, 'vrhu'),
(1785, 'stepenica'),
(1786, 'koje'),
(1787, 'vode'),
(1788, 'brankovog'),
(1789, 'mosta'),
(1790, 'reku'),
(1791, 'vodi'),
(1792, 'ulicom'),
(1793, 'male'),
(1794, 'stepenice'),
(1795, '1a\r\n\r\nstalno'),
(1796, 'zivi'),
(1797, 'nastupi'),
(1798, 'gde'),
(1799, 'pre'),
(1800, 'svega'),
(1801, 'akcenat'),
(1802, 'stavljen'),
(1803, 'dzez'),
(1804, 'izvodjace'),
(1805, 'toku'),
(1806, 'leta'),
(1807, 'moze'),
(1808, 'iskoristiti'),
(1809, 'private'),
(1810, 'sastanke'),
(1811, 'kao'),
(1812, 'sve'),
(1813, 'proslave'),
(1814, 'volimo'),
(1815, 'ukusno'),
(1816, 'vino'),
(1817, 'osetimo'),
(1818, 'voljenima'),
(1819, 'cete'),
(1820, 'iskusiti'),
(1821, 'nasoj'),
(1822, 'basti'),
(1823, 'potrebno'),
(1824, 'samo'),
(1825, 'nam'),
(1826, 'pridruzite\r\n\r\na'),
(1827, '␓'),
(1828, 'tajni'),
(1829, 'sastojak'),
(1830, 'vam'),
(1831, 'ipak'),
(1832, 'necemo'),
(1833, 'otkriti'),
(1834, 'probajte'),
(1835, 'pronadjete'),
(1836, 'dok'),
(1837, 'ususkani'),
(1838, 'slusate'),
(1839, 'pijete'),
(1840, 'naravno'),
(1841, 'najlepsi'),
(1842, 'kutak'),
(1843, 'beograda\r\npored'),
(1844, 'jednoj'),
(1845, 'najlepsih'),
(1846, 'starih'),
(1847, 'beogradskih'),
(1848, 'svojim'),
(1849, 'enterijerom'),
(1850, 'podseca'),
(1851, 'francuske'),
(1852, 'stanove'),
(1853, 'duhom'),
(1854, 'neke'),
(1855, 'romanticne'),
(1856, 'basta\r\n␜basta␝'),
(1857, 'ujedinjuje'),
(1858, 'kvalitetnu'),
(1859, 'muziku'),
(1860, 'ukusnim'),
(1861, 'vinima'),
(1862, 'opustajucem'),
(1863, 'ambijentu'),
(1864, 'krasi'),
(1865, 'predivan'),
(1866, 'pogled'),
(1867, 'brankov'),
(1868, 'most'),
(1869, 'kod'),
(1870, 'nas'),
(1871, 'stlano'),
(1872, 'nesto'),
(1873, 'desava'),
(1874, 'svirke'),
(1875, 'gostovanja'),
(1876, 'festivali␦'),
(1877, 'ali'),
(1878, 'cesto'),
(1879, 'organizujemo'),
(1880, 'posebna'),
(1881, 'dogadjanja'),
(1882, 'nase'),
(1883, 'goste\r\n\r\nzelena'),
(1884, 'subota'),
(1885, 'jesenja'),
(1886, 'carolija'),
(1887, 'blues'),
(1888, 'vikend␦'),
(1889, 'sta'),
(1890, 'sledece?'),
(1891, 'bezalkoholna'),
(1892, 'pica'),
(1893, 'likeri'),
(1894, 'vitaminski'),
(1895, 'napici'),
(1896, 'kokteli'),
(1897, 'vina'),
(1898, 'zestina'),
(1899, 'kafa'),
(1900, 'special'),
(1901, 'craft'),
(1902, 'pivo'),
(1903, 'obrok'),
(1904, 'salate'),
(1905, 'pizza'),
(1906, 'chill'),
(1907, 'ziva'),
(1908, 'svirka'),
(1909, 'centar'),
(1910, 'happy'),
(1911, 'hour'),
(1912, 'smoking'),
(1913, 'zona'),
(1914, 'baby'),
(1915, 'oprema'),
(1916, 'pet'),
(1917, 'frendly'),
(1918, 'wifi'),
(1919, 'restoran'),
(1920, 'kafic'),
(1921, 'petit'),
(1922, 'bistro'),
(1923, 'branicevska'),
(1924, 'vracar'),
(1925, 'lociran'),
(1926, 'najlepsem'),
(1927, 'delu'),
(1928, 'vracara'),
(1929, 'ispod'),
(1930, 'hrama'),
(1931, 'svetog'),
(1932, 'save'),
(1933, 'vas'),
(1934, 'oduseviti'),
(1935, 'svojom'),
(1936, 'energijom'),
(1937, 'izvrsnom'),
(1938, 'uslugom'),
(1939, 'uzivajte'),
(1940, 'obroku'),
(1941, 'spremljenom'),
(1942, 'strane'),
(1943, 'iskusnih'),
(1944, 'kulinarskih'),
(1945, 'majstora'),
(1946, 'ste'),
(1947, 'dorucak'),
(1948, 'ili'),
(1949, 'dnevni'),
(1950, 'meni?'),
(1951, 'pogledajte'),
(1952, 'sto'),
(1953, 'izdvaja'),
(1954, 'ostalih'),
(1955, 'ambijent'),
(1956, 'hrana'),
(1957, 'desavanja?'),
(1958, 'potpuno'),
(1959, 'uzivanje'),
(1960, 'hrani'),
(1961, 'picu'),
(1962, 'vidimo'),
(1963, 'bistrou'),
(1964, 'sushi'),
(1965, 'pecenje'),
(1966, 'rostilj'),
(1967, 'meni'),
(1968, 'lorenzo'),
(1969, 'kakalamba'),
(1970, 'cvijiceva'),
(1971, '110'),
(1972, '\"deselepojede'),
(1973, 'kakalamba\"'),
(1974, 'porodicni'),
(1975, 'kratko'),
(1976, 'vreme'),
(1977, 'uspeo'),
(1978, 'osvoji'),
(1979, 'goste'),
(1980, 'originalnoscu'),
(1981, 'sarmom'),
(1982, 'jedinstvenim'),
(1983, 'spojem'),
(1984, 'firence'),
(1985, 'pirota'),
(1986, 'zamisao'),
(1987, 'potekla'),
(1988, 'iskrenog'),
(1989, 'obecanja'),
(1990, 'pazljivog'),
(1991, 'muza'),
(1992, 'voljenoj'),
(1993, 'zeni'),
(1994, 'pocetku'),
(1995, 'braka:'),
(1996, '␝draga'),
(1997, 'jedino'),
(1998, 'mogu'),
(1999, 'sigurno'),
(2000, 'obecam'),
(2001, 'nikada'),
(2002, 'neces'),
(2003, 'biti'),
(2004, 'gladna!␝'),
(2005, 'jedne'),
(2006, 'ljubavi'),
(2007, 'slike'),
(2008, 'dva'),
(2009, 'zivota'),
(2010, 'izmesale'),
(2011, 'biografiji'),
(2012, 'jednog'),
(2013, 'restorana'),
(2014, 'dobili'),
(2015, 'smo'),
(2016, 'spoj'),
(2017, 'tradicije'),
(2018, 'jednostavnosti'),
(2019, 'novih'),
(2020, 'tehnologija'),
(2021, 'pripremi'),
(2022, 'hrane'),
(2023, 'uvek'),
(2024, 'vizuelnih'),
(2025, 'iznenadjenja'),
(2026, 'dobio'),
(2027, 'prestiznu'),
(2028, 'titulu'),
(2029, 'ambasador'),
(2030, 'luce'),
(2031, 'toskanske'),
(2032, 'vinske'),
(2033, 'kuce'),
(2034, 'della'),
(2035, 'vite'),
(2036, 'kroz'),
(2037, 'autenticnu'),
(2038, 'ponudu'),
(2039, 'tradicionalnih'),
(2040, 'firentinskih'),
(2041, 'pirocanskih'),
(2042, 'specijaliteta'),
(2043, 'istog'),
(2044, 'takvog'),
(2045, 'ambijenta'),
(2046, 'imacete'),
(2047, 'osecaj'),
(2048, 'jugu'),
(2049, 'srbije'),
(2050, 'otputovali'),
(2051, 'nazad'),
(2052, 'renesansnu'),
(2053, 'italiju'),
(2054, 'pred'),
(2055, 'vama'),
(2056, 'nizati'),
(2057, 'mesati'),
(2058, 'ukusi'),
(2059, 'proslosti'),
(2060, 'buducnosti'),
(2061, 'avangarde'),
(2062, 'zapitacete'),
(2063, 'niste'),
(2064, 'mozda'),
(2065, 'zalutali'),
(2066, 'muzej'),
(2067, 'kada'),
(2068, 'oko'),
(2069, 'privikne'),
(2070, 'cudesan'),
(2071, 'svet'),
(2072, 'kom'),
(2073, 'zatekli'),
(2074, 'osmeh'),
(2075, 'uporno'),
(2076, 'ostajao'),
(2077, 'licu'),
(2078, 'seticete'),
(2079, 'zasto'),
(2080, 'odabrali'),
(2081, 'bas'),
(2082, 'jedete'),
(2083, 'dosli'),
(2084, 'jednu'),
(2085, 'veliku'),
(2086, 'porodicu'),
(2087, 'koja'),
(2088, 'voli'),
(2089, 'radi'),
(2090, 'kuvana'),
(2091, 'jela'),
(2092, 'dostava');

-- --------------------------------------------------------

--
-- Table structure for table `uo`
--

DROP TABLE IF EXISTS `uo`;
CREATE TABLE IF NOT EXISTS `uo` (
  `IDUO` int(11) NOT NULL AUTO_INCREMENT,
  `Opis` longtext CHARACTER SET utf8 COLLATE utf8_bin,
  `PonPet` varchar(32) DEFAULT NULL,
  `Sub` varchar(32) DEFAULT NULL,
  `Ned` varchar(32) DEFAULT NULL,
  `AvgOcena` bigint(20) DEFAULT NULL,
  `Adresa` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `Gmaps` varchar(32) DEFAULT NULL,
  `Odobren` tinyint(1) DEFAULT NULL,
  `Vidljivost` tinyint(1) DEFAULT NULL,
  `Info1` longtext CHARACTER SET utf8 COLLATE utf8_bin,
  `Info2` longtext CHARACTER SET utf8 COLLATE utf8_bin,
  `Info3` longtext CHARACTER SET utf8 COLLATE utf8_bin,
  `Naziv` varchar(32) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `JeRestoran` tinyint(1) DEFAULT NULL,
  `JeKafic` tinyint(1) DEFAULT NULL,
  `JeBrzaHrana` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`IDUO`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uo`
--

INSERT INTO `uo` (`IDUO`, `Opis`, `PonPet`, `Sub`, `Ned`, `AvgOcena`, `Adresa`, `Gmaps`, `Odobren`, `Vidljivost`, `Info1`, `Info2`, `Info3`, `Naziv`, `JeRestoran`, `JeKafic`, `JeBrzaHrana`) VALUES
(59, 'U Karadjordjevoj 43 nalazi se zgrada cija je izgradnja pocela davne 1870. godine i uz ciji zid se krio prostor koji se uz malo truda pretvorio u mesto za opustanje pod imenom “Basta”. Ulaz u ovaj mali raj se nalazi na vrhu stepenica koje vode sa Brankovog mosta na reku. Vodi se pod ulicom Male stepenice 1A.\r\n\r\nStalno su i zivi nastupi, gde je pre svega akcenat stavljen na dzez izvodjace. U toku leta prostor se moze iskoristiti za private sastanke, kao i za sve private proslave.', '08-23', '09-01', '09-23', 5, 'Karadjordjeva 43, Beograd', '', 1, 1, 'Mi volimo dzez. Volimo ukusno vino. Volimo da volimo i da se osetimo voljenima. I vi cete sve to iskusiti u nasoj Basti. Potrebno je samo da nam se pridruzite.\r\n\r\nA da – tajni sastojak vam ipak necemo otkriti. Probajte da ga pronadjete, dok ususkani slusate dzez i pijete vino. U Basti, naravno.', 'Najlepsi kutak Beograda\r\nPored Brankovog mosta u jednoj od najlepsih starih beogradskih zgrada, nalazi se mesto koje svojim enterijerom podseca na francuske stanove, a svojim duhom na neke davne, romanticne godine – Dzez Basta.\r\n“Basta” ujedinjuje kvalitetnu muziku sa ukusnim vinima u opustajucem ambijentu koji krasi predivan pogled na reku i Brankov most.', 'Kod nas se stlano nesto desava. Svirke, gostovanja, festivali… Ali cesto organizujemo i posebna dogadjanja za nas i nase goste.\r\n\r\nZelena subota, jesenja carolija, blues vikend… Sta li je sledece?', 'Jazz Basta', 1, 1, 0),
(60, 'Lociran u najlepsem delu Vracara, ispod Hrama Svetog Save, Le Petit Bistro je mesto koje ce Vas oduseviti svojom energijom i izvrsnom uslugom.', '08-01', '08-02', '08-01', 4, 'Branicevska 13, Vracar, Beograd', '', 1, 1, 'Uzivajte u obroku spremljenom od strane iskusnih kulinarskih majstora. Da li ste za dorucak ili dnevni meni?', 'Pogledajte sta je to sto Bistro izdvaja od ostalih. Ambijent, hrana ili desavanja?', 'Za potpuno uzivanje u hrani, picu i ambijentu, vidimo se u Bistrou', 'LE PETIT BISTRO', 1, 1, 0),
(63, '\"Deselepojede LORENZO I KAKALAMBA\" je porodicni restoran koji je za kratko vreme uspeo da osvoji goste svojom originalnoscu, sarmom i jedinstvenim spojem Firence i Pirota. Zamisao je potekla od iskrenog obecanja pazljivog muza voljenoj zeni na pocetku braka: ”Draga, jedino sto mogu sigurno da ti obecam je da nikada neces biti gladna!”. Iz jedne ljubavi, slike dva zivota su se izmesale u biografiji jednog restorana – dobili smo spoj tradicije, jednostavnosti i novih tehnologija u pripremi hrane, kao i uvek novih vizuelnih iznenadjenja. ', '12-00', '12-01', '12-00', 0, 'Cvijiceva 110', '', 1, 1, 'Restoran Lorenzo & Kakalamba dobio je prestiznu titulu AMBASADOR LUCE od strane toskanske vinske kuce LUCE DELLA VITE. ', 'Kroz autenticnu ponudu tradicionalnih firentinskih i pirocanskih specijaliteta i istog takvog ambijenta, imacete osecaj da ste na jugu Srbije ili ste otputovali kroz vreme nazad u renesansnu Italiju. Pred vama ce se nizati slike i mesati ukusi proslosti i buducnosti, tradicije i avangarde.', 'Zapitacete se da niste mozda zalutali u muzej, a kada vam se oko privikne na cudesan svet u kom ste se zatekli a osmeh uporno ostajao na licu, seticete se zasto ste odabrali bas tu da jedete. Dosli ste u jednu veliku porodicu koja voli to sto radi.', 'Lorenzo & Kakalamba', 1, 0, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=120 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uoslike`
--

INSERT INTO `uoslike` (`ID`, `IDUO`, `rbr`, `Path`) VALUES
(84, 59, 1, '017.jpg'),
(85, 59, 2, 'desno214.jpg'),
(86, 59, 3, 'levo27.jpg'),
(87, 59, 4, 'desno18.jpg'),
(88, 59, 5, 'jazz.jpg'),
(89, 59, 6, 'slika5.jpg'),
(90, 59, 7, 'desno215.jpg'),
(91, 60, 1, 'image_(3)1.jpg'),
(92, 60, 2, 'image1.jpg'),
(93, 60, 3, 'image_(7)1.jpg'),
(94, 60, 4, 'image_(2)2.jpg'),
(95, 60, 5, 'image_(5)1.jpg'),
(96, 60, 6, 'image_(4)1.jpg'),
(97, 60, 7, 'image_(2)3.jpg'),
(98, 60, 8, 'image_(6)1.jpg'),
(113, 63, 1, '275.jpg'),
(114, 63, 2, '2-enterijer5.jpg'),
(115, 63, 3, 'IMG_0117_resize5.jpg'),
(116, 63, 4, '1-basta5.jpg'),
(117, 63, 5, 'luce15.jpg'),
(118, 63, 6, 'IMG_1935_resize5.jpg'),
(119, 63, 7, 'IMG_0140_resize5.jpg');

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
  ADD CONSTRAINT `R_12` FOREIGN KEY (`IDUO`) REFERENCES `uo` (`IDUO`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `uoslike`
--
ALTER TABLE `uoslike`
  ADD CONSTRAINT `R_3` FOREIGN KEY (`IDUO`) REFERENCES `uo` (`IDUO`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
