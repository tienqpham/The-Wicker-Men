-- MySQL dump 10.13  Distrib 8.0.13, for Win64 (x86_64)
--
-- Host: localhost    Database: cagebase
-- ------------------------------------------------------
-- Server version	8.0.13

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `film_staffing`
--

DROP TABLE IF EXISTS `film_staffing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `film_staffing` (
  `film_ID` int(11) NOT NULL,
  `person_ID` int(11) NOT NULL,
  `role` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`film_ID`,`person_ID`),
  KEY `person_ID_idx` (`person_ID`),
  CONSTRAINT `film_ID` FOREIGN KEY (`film_ID`) REFERENCES `films` (`id`),
  CONSTRAINT `film_staff` FOREIGN KEY (`person_ID`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `film_staffing`
--

LOCK TABLES `film_staffing` WRITE;
/*!40000 ALTER TABLE `film_staffing` DISABLE KEYS */;
INSERT INTO `film_staffing` VALUES (1,1,'Brad\'s Bud');
/*!40000 ALTER TABLE `film_staffing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `films`
--

DROP TABLE IF EXISTS `films`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `films` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `release_date` date DEFAULT NULL,
  `budget` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `films`
--

LOCK TABLES `films` WRITE;
/*!40000 ALTER TABLE `films` DISABLE KEYS */;
INSERT INTO `films` VALUES (1,'Fast Times at Ridgemont High','1982-08-13',5000000);
/*!40000 ALTER TABLE `films` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `people` (
  `ID` int(11) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `death_date` date DEFAULT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `people`
--

LOCK TABLES `people` WRITE;
/*!40000 ALTER TABLE `people` DISABLE KEYS */;
INSERT INTO `people` VALUES (1,'1964-01-07',NULL,'Nicolas','Cage');
/*!40000 ALTER TABLE `people` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `play_staffing`
--

DROP TABLE IF EXISTS `play_staffing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `play_staffing` (
  `play_ID` int(11) NOT NULL,
  `person_ID` int(11) NOT NULL,
  `role` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `play_staffing`
--

LOCK TABLES `play_staffing` WRITE;
/*!40000 ALTER TABLE `play_staffing` DISABLE KEYS */;
INSERT INTO `play_staffing` VALUES (1,1,'Heartbreaker');
/*!40000 ALTER TABLE `play_staffing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pseudonyms`
--

DROP TABLE IF EXISTS `pseudonyms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `pseudonyms` (
  `name` varchar(50) NOT NULL,
  `ID` int(11) NOT NULL,
  KEY `ID_idx` (`ID`),
  CONSTRAINT `ID` FOREIGN KEY (`ID`) REFERENCES `people` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pseudonyms`
--

LOCK TABLES `pseudonyms` WRITE;
/*!40000 ALTER TABLE `pseudonyms` DISABLE KEYS */;
INSERT INTO `pseudonyms` VALUES ('Nicolas Coppola',1);
/*!40000 ALTER TABLE `pseudonyms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stage_plays`
--

DROP TABLE IF EXISTS `stage_plays`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `stage_plays` (
  `ID` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `release_date` date DEFAULT NULL,
  `budget` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stage_plays`
--

LOCK TABLES `stage_plays` WRITE;
/*!40000 ALTER TABLE `stage_plays` DISABLE KEYS */;
INSERT INTO `stage_plays` VALUES (1,'Industrial Symphony No. 1: The Dream of the Broken Hearted',NULL,NULL);
/*!40000 ALTER TABLE `stage_plays` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tv_series`
--

DROP TABLE IF EXISTS `tv_series`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tv_series` (
  `ID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `episodes` int(11) DEFAULT NULL,
  `budget` decimal(10,0) DEFAULT NULL,
  `release_date` date DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID_UNIQUE` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tv_series`
--

LOCK TABLES `tv_series` WRITE;
/*!40000 ALTER TABLE `tv_series` DISABLE KEYS */;
INSERT INTO `tv_series` VALUES (1,'The Best of Times',1,NULL,'1981-07-13');
/*!40000 ALTER TABLE `tv_series` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tv_staffing`
--

DROP TABLE IF EXISTS `tv_staffing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `tv_staffing` (
  `person_ID` int(11) NOT NULL,
  `tv_ID` int(11) NOT NULL,
  `role` varchar(50) NOT NULL,
  PRIMARY KEY (`person_ID`,`tv_ID`),
  KEY `tv_ID_idx` (`tv_ID`),
  CONSTRAINT `tv_ID` FOREIGN KEY (`tv_ID`) REFERENCES `tv_series` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tv_staff` FOREIGN KEY (`person_ID`) REFERENCES `people` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tv_staffing`
--

LOCK TABLES `tv_staffing` WRITE;
/*!40000 ALTER TABLE `tv_staffing` DISABLE KEYS */;
INSERT INTO `tv_staffing` VALUES (1,1,'Nicolas');
/*!40000 ALTER TABLE `tv_staffing` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-11-28 14:03:27
