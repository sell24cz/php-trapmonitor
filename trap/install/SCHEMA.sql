-- MySQL dump 10.13  Distrib 5.7.38, for Linux (x86_64)
--
-- Host: localhost    Database: trap
-- ------------------------------------------------------
-- Server version	5.7.38-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `1nmp`
--

DROP TABLE IF EXISTS `1nmp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `1nmp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alarmid` int(11) NOT NULL,
  `objname` text NOT NULL,
  `info` varchar(250) DEFAULT NULL,
  `address` varchar(15) NOT NULL,
  `severity` varchar(12) NOT NULL,
  `state` varchar(12) NOT NULL,
  `time` datetime NOT NULL,
  `timestamp` float NOT NULL,
  `alarmed1` int(11) NOT NULL,
  `alarmed2` int(11) NOT NULL,
  `alarmed_one` int(11) NOT NULL,
  `alarmed_all` int(11) NOT NULL,
  `alarmed` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=499158 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `2nmp`
--

DROP TABLE IF EXISTS `2nmp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `2nmp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alarmid` int(11) NOT NULL,
  `objname` text NOT NULL,
  `info` varchar(150) NOT NULL,
  `address` varchar(15) NOT NULL,
  `severity` varchar(12) NOT NULL,
  `state` varchar(12) NOT NULL,
  `time` datetime NOT NULL,
  `timestamp` float NOT NULL,
  `alarmed1` int(11) NOT NULL,
  `alarmed2` int(11) NOT NULL,
  `alarmed_one` int(11) NOT NULL,
  `alarmed_all` int(11) NOT NULL,
  `alarmed` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16037465 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `disable_trap`
--

DROP TABLE IF EXISTS `disable_trap`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `disable_trap` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `snmp`
--

DROP TABLE IF EXISTS `snmp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `snmp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alarmid` int(11) NOT NULL,
  `objname` text NOT NULL,
  `info` varchar(150) NOT NULL,
  `address` varchar(20) NOT NULL,
  `severity` varchar(12) NOT NULL,
  `state` varchar(12) NOT NULL,
  `time` varchar(25) NOT NULL,
  `timestamp` datetime NOT NULL,
  `alarmed1` date NOT NULL,
  `alarmed2` time NOT NULL,
  `alarmed_one` datetime NOT NULL,
  `alarmed_all` int(11) NOT NULL,
  `alarmed` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `snmp_alerts`
--

DROP TABLE IF EXISTS `snmp_alerts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `snmp_alerts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `objname` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `snmp_majors`
--

DROP TABLE IF EXISTS `snmp_majors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `snmp_majors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alarmid` text,
  `timestamp` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-05 12:47:38
