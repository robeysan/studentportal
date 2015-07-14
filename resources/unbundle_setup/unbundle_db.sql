# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 172.16.33.97 (MySQL 5.1.61)
# Database: GRAIL
# Generation Time: 2012-08-10 16:17:13 +0000
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
	(2,'app_trad','Traditional Application','This is the general application for traditional students',7325);

/*!40000 ALTER TABLE `client_applications` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table client_programs_services
# ------------------------------------------------------------

DROP TABLE IF EXISTS `client_programs_services`;

CREATE TABLE `client_programs_services` (
  `client_program_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `has_ecs` tinyint(1) DEFAULT NULL,
  `has_stp` tinyint(1) DEFAULT NULL,
  `display_name` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`client_program_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `client_programs_services` WRITE;
/*!40000 ALTER TABLE `client_programs_services` DISABLE KEYS */;

INSERT INTO `client_programs_services` (`client_program_id`, `has_ecs`, `has_stp`, `display_name`)
VALUES
	(728,1,1,'Bachelor of Arts in Business'),
	(729,1,1,'Master of Arts in Educational Technology'),
	(730,1,1,'Master of Arts in Health Care'),
	(731,1,1,'Bachelor of Arts in Health Care'),
	(748,1,1,'Master of Arts in Health Care and Aging'),
	(832,1,1,'Associate of Arts'),
	(833,1,1,'Associate of Arts in Early Childhood'),
	(834,1,1,'Bachelor of Arts in Child Development'),
	(835,1,1,'Bachelor of Arts in Criminal Justice'),
	(836,1,1,'Bachelor of Arts in Exercise Science'),
	(837,1,1,'Bachelor of Arts in Family Life Education'),
	(838,1,1,'Bachelor of Arts in Food Industry Management '),
	(839,1,1,'Bachelor of Arts in Hospitality Management'),
	(840,1,1,'Bachelor of Arts in Human Resource Management'),
	(841,1,1,'Bachelor of Arts in Information and Technology Management'),
	(842,1,1,'Bachelor of Arts in Marketing and Innovation Management '),
	(843,1,1,'Bachelor of Science in Pulmonary Science'),
	(844,1,1,'Bachelor of Science in Radiological Science Leadership'),
	(845,1,1,'Master of Business Administration'),
	(846,1,1,'Master of Business Administration, Health Care Management'),
	(847,1,1,'Master of Arts in Christian Outreach'),
	(848,1,1,'Master of Arts in Criminal Justice Leadership'),
	(849,1,1,'Master of Arts in Education - Early Childhood'),
	(850,1,1,'Master of Arts in Family Life Education'),
	(851,1,1,'Master of Arts in Human Resource Management'),
	(852,1,1,'Master of Arts in Leadership and Management'),
	(853,1,1,'Master of Arts in Strategic Communication Management'),
	(854,1,1,'Bachelor of Arts in Accounting'),
	(855,1,1,'Bachelor of Arts in Organizational Management and Leadership'),
	(857,1,1,'Bachelor of Arts in Human Resource Management'),
	(858,1,1,'Bachelor of Arts in Information and Technology Management'),
	(859,1,1,'Bachelor of Arts in Marketing and Innovation Management'),
	(860,1,1,'Bachelor of Arts in Organizational Management and Leadership'),
	(861,1,1,'Master of Business Administration'),
	(862,1,1,'Master of Business Administration, Health Care Management'),
	(863,1,1,'Master of Arts in Human Resource Management'),
	(864,1,1,'Master of Arts in Leadership and Management'),
	(865,1,1,'Master of Arts in Strategic Communication Management'),
	(894,1,1,'Master of Arts in Health Care Aging'),
	(895,1,1,'Master of Arts in Education - Educational Leadership'),
	(896,1,1,'Master of Arts in Education - Differentiated Instruction'),
	(897,1,1,'Master of Arts in Education - Curriculum & Instruction with K-12 Reading'),
	(898,1,1,'Master of Arts in Education - K-12 Reading Endorsement'),
	(899,1,1,'Master of Arts in Education - Educational Technology '),
	(900,1,1,'Master of Arts in Education - Special Education'),
	(901,1,1,'Master of Arts in Education - Curriculum & Instruction with K-12 Reading'),
	(902,1,1,'Master of Arts in Education - Differentiated Instruction'),
	(903,1,1,'Master of Arts in Education - Educational Leadership'),
	(904,1,1,'Master of Arts in Education - Educational Technology'),
	(905,1,1,'Master of Arts in Education - K-12 Reading Endorsement'),
	(908,1,1,'Master of Arts in Christian Outreach'),
	(928,1,1,'Social Media Certificate');

/*!40000 ALTER TABLE `client_programs_services` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table client_programs_to_applications
# ------------------------------------------------------------

DROP TABLE IF EXISTS `client_programs_to_applications`;

CREATE TABLE `client_programs_to_applications` (
  `client_program_id` int(11) DEFAULT NULL,
  `application_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `client_programs_to_applications` WRITE;
/*!40000 ALTER TABLE `client_programs_to_applications` DISABLE KEYS */;

INSERT INTO `client_programs_to_applications` (`client_program_id`, `application_id`)
VALUES
	(728,1),
	(729,1),
	(730,1),
	(731,1),
	(748,1),
	(832,1),
	(833,1),
	(834,1),
	(835,1),
	(836,1),
	(837,1),
	(838,1),
	(839,1),
	(840,1),
	(841,1),
	(842,1),
	(843,1),
	(844,1),
	(845,1),
	(846,1),
	(847,1),
	(848,1),
	(849,1),
	(850,1),
	(851,1),
	(852,1),
	(853,1),
	(854,1),
	(855,1),
	(857,1),
	(858,1),
	(859,1),
	(860,1),
	(861,1),
	(862,1),
	(863,1),
	(864,1),
	(865,1),
	(894,1),
	(895,1),
	(896,1),
	(897,1),
	(898,1),
	(899,1),
	(900,1),
	(901,1),
	(902,1),
	(903,1),
	(904,1),
	(905,1),
	(908,1),
	(928,1);

/*!40000 ALTER TABLE `client_programs_to_applications` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table client_programs_to_destination_types
# ------------------------------------------------------------

DROP TABLE IF EXISTS `client_programs_to_destination_types`;

CREATE TABLE `client_programs_to_destination_types` (
  `client_program_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `destination_type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`client_program_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `client_programs_to_destination_types` WRITE;
/*!40000 ALTER TABLE `client_programs_to_destination_types` DISABLE KEYS */;

INSERT INTO `client_programs_to_destination_types` (`client_program_id`, `destination_type`)
VALUES
	(728,'Dest_Student_Portal'),
	(729,'Dest_Student_Portal'),
	(730,'Dest_Student_Portal'),
	(731,'Dest_Student_Portal'),
	(748,'Dest_Student_Portal'),
	(832,'Dest_Student_Portal'),
	(833,'Dest_Student_Portal'),
	(834,'Dest_Student_Portal'),
	(835,'Dest_Student_Portal'),
	(836,'Dest_Student_Portal'),
	(837,'Dest_Student_Portal'),
	(838,'Dest_Student_Portal'),
	(839,'Dest_Student_Portal'),
	(840,'Dest_Student_Portal'),
	(841,'Dest_Student_Portal'),
	(842,'Dest_Student_Portal'),
	(843,'Dest_Student_Portal'),
	(844,'Dest_Student_Portal'),
	(845,'Dest_Student_Portal'),
	(846,'Dest_Student_Portal'),
	(847,'Dest_Student_Portal'),
	(848,'Dest_Student_Portal'),
	(849,'Dest_Student_Portal'),
	(850,'Dest_Student_Portal'),
	(851,'Dest_Student_Portal'),
	(852,'Dest_Student_Portal'),
	(853,'Dest_Student_Portal'),
	(854,'Dest_Student_Portal'),
	(855,'Dest_Student_Portal'),
	(857,'Dest_Student_Portal'),
	(858,'Dest_Student_Portal'),
	(859,'Dest_Student_Portal'),
	(860,'Dest_Student_Portal'),
	(861,'Dest_Student_Portal'),
	(862,'Dest_Student_Portal'),
	(863,'Dest_Student_Portal'),
	(864,'Dest_Student_Portal'),
	(865,'Dest_Student_Portal'),
	(894,'Dest_Student_Portal'),
	(895,'Dest_Student_Portal'),
	(896,'Dest_Student_Portal'),
	(897,'Dest_Student_Portal'),
	(898,'Dest_Student_Portal'),
	(899,'Dest_Student_Portal'),
	(900,'Dest_Student_Portal'),
	(901,'Dest_Student_Portal'),
	(902,'Dest_Student_Portal'),
	(903,'Dest_Student_Portal'),
	(904,'Dest_Student_Portal'),
	(905,'Dest_Student_Portal'),
	(908,'Dest_Student_Portal'),
	(928,'Dest_Student_Portal');

/*!40000 ALTER TABLE `client_programs_to_destination_types` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
