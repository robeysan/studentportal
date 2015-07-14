# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 172.16.45.77 (MySQL 5.5.20-log)
# Database: GRAIL
# Generation Time: 2012-09-27 19:32:31 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table client_applications
# ------------------------------------------------------------

DROP TABLE IF EXISTS `client_applications`;

CREATE TABLE `client_applications` (
  `application_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `application_filename` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `desc` varchar(500) DEFAULT NULL,
  `client_entity_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`application_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `client_applications` WRITE;
/*!40000 ALTER TABLE `client_applications` DISABLE KEYS */;

INSERT INTO `client_applications` (`application_id`, `application_filename`, `name`, `desc`, `client_entity_id`)
VALUES
	(1,'app_online','Online Application','This is the general application for online undergraduate students',7325),
	(2,'app_trad','Traditional Application','This is the general application for traditional students',7325),
	(3,'app_online','Online Applicaion','This is the general application for online students\napplication for online students',8928),
	(4,'app_online','Online Undergrad Application','GWC Undergrad Application',8470),
	(5,'app_online_masters','Online Graduate Application','GWC Masters Application',8470),
	(6,'app_online','Online Undergrad Application','GWC Undergrad Application',8470);

/*!40000 ALTER TABLE `client_applications` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
