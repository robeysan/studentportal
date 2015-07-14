<?php

use Phinx\Migration\AbstractMigration;

class DataRefactor extends AbstractMigration
{
    /**
     * Migrate Up.
     */
    public function up()
    {
	$this->execute("
CREATE TABLE `stp_programs_to_locations` (
  `location_id` int(11) unsigned NOT NULL,
  `client_program_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `stp_programs_to_locations` (`location_id`, `client_program_id`)
VALUES
	(1,847),
	(1,848),
	(1,896),
	(1,849),
	(1,855),
	(1,843),
	(1,844),
	(1,832),
	(1,833),
	(1,728),
	(1,834),
	(1,835),
	(1,836),
	(1,837),
	(1,838),
	(1,731),
	(1,842),
	(1,841),
	(1,839),
	(1,840),
	(1,895),
	(1,963),
	(1,894),
	(1,851),
	(1,899),
	(1,850),
	(1,1002),
	(1,852),
	(1,845),
	(1,846),
	(1,900),
	(1,730),
	(1,853),
	(2,897),
	(2,902),
	(2,903),
	(2,1023),
	(2,857),
	(2,858),
	(2,859),
	(2,865),
	(2,1046),
	(2,1047),
	(2,864),
	(2,861),
	(2,860),
	(4,860),
	(2,854),
	(4,854),
	(6,854),
	(2,862),
	(4,862);
	");
        $this->execute("
CREATE TABLE `stp_locations` (
  `location_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `entity_id` int(11) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `abbrev` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`location_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
INSERT INTO `stp_locations` (`location_id`, `entity_id`, `name`, `abbrev`)
VALUES
	(1,7325,'Online','ONLINE'),
	(2,7325,'Campus','CAMPUS'),
	(3,7325,'Chippewa Valley Technical College','CHIPPEWA'),
	(4,7325,'Inver Hills Community College','INVER'),
	(5,7325,'North Hennepin Community College','HENNEPIN'),
	(6,7325,'South Central Community College','SCCC');
        ");
        // ALTER portals table:
        $this->execute("
ALTER TABLE portals 
ADD (
	ssn_field_name varchar(16),
	abbrev varchar(16)
);
");
$this->execute("
UPDATE portals 
SET ssn_field_name='social_tax_id'
WHERE portal_id = 302;
");
$this->execute("
UPDATE portals 
SET ssn_field_name='social_tax_id'
WHERE portal_id = 285;
");
$this->execute("
UPDATE portals 
SET ssn_field_name='txtSSN'
WHERE portal_id = 284;
");
$this->execute("
UPDATE portals 
SET abbrev='csp'
WHERE portal_id = 284;
");
$this->execute("
UPDATE portals 
SET abbrev='aurora'
WHERE portal_id = 285;
UPDATE portals
SET abbrev='aurora'
WHERE portal_id = 283;
UPDATE portals
SET portal_address='aurora.students.learninghouse.com'
WHERE portal_id = 285;
");
$this->execute("
UPDATE portals 
SET abbrev='uof'
WHERE portal_id = 302;
");
	$this->table('client_programs_to_applications')->drop();
	
	if (! $this->hasTable('client_programs_to_applications')) {
		$this->execute("
		CREATE TABLE `client_programs_to_applications` (
		  `client_program_id` int(11) NOT NULL DEFAULT '0',
		  `application_id` int(11) DEFAULT NULL,
		  PRIMARY KEY (`client_program_id`)
		) ENGINE=InnoDB DEFAULT CHARSET=latin1;
		");
	}
$this->execute("
INSERT INTO `client_programs_to_applications` (`client_program_id`, `application_id`)
VALUES
	(728,1),
	(729,1),
	(730,1),
	(731,1),
	(748,1),
	(781,5),
	(783,4),
	(784,4),
	(785,5),
	(786,4),
	(828,5),
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
	(916,4),
	(917,5),
	(923,5),
	(924,5),
	(925,5),
	(928,1),
	(959,2),
	(963,1),
	(964,1),
	(1002,1),
	(1023,4),
	(1024,5),
	(1025,5),
	(1026,5),
	(1046,1),
	(1047,1),
	(1053,5),
	(1059,5),
	(1060,5),
	(1061,5),
	(1107,1),
	(2249,2);
");
$this->execute("
CREATE TABLE `stp_csp_licensures` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `trad_id` varchar(64) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `major` varchar(64) DEFAULT NULL,
  `interest` varchar(64) DEFAULT NULL,
  `concentration` varchar(64) DEFAULT NULL,
  `level` varchar(64) DEFAULT NULL,
  `college` varchar(64) DEFAULT NULL,
  `degree` varchar(64) DEFAULT NULL,
  `student_type` varchar(64) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
");
$this->execute("
INSERT INTO `stp_csp_licensures` (`id`, `trad_id`, `program_id`, `major`, `interest`, `concentration`, `level`, `college`, `degree`, `student_type`, `name`)
VALUES
	(1,'CSPTRAD_97',959,'ECE','0M','','UG','ED','LICEN','','Early Childhood Education (Birth-Grade 3)'),
	(2,'CSPTRAD_98',959,'ECE','1W','','UG','ED','LICEN','','Kindergarten Endorsement'),
	(3,'CSPTRAD_99',959,'ECE','1X','','UG','ED','LICEN','','Pre-Primary Endorsement'),
	(4,'CSPTRAD_100',959,'EK8C','1M','','UG','ED','LICEN','','K-8 Communication Arts & Literature'),
	(5,'CSPTRAD_101',959,'CAL','3M','','UG','ED','LICEN','','5-12 Communication Arts & Literature'),
	(6,'CSPTRAD_102',959,'EK8M','1M','','UG','ED','LICEN','','K-8 Mathematics'),
	(7,'CSPTRAD_103',959,'MATL','3M','','UG','ED','LICEN','','5-12 Mathematics'),
	(8,'CSPTRAD_104',959,'EK8L','1M','','UG','ED','LICEN','','K-8 Science'),
	(9,'CSPTRAD_105',959,'LS','3M','','UG','ED','LICEN','','9-12 Life Science'),
	(10,'CSPTRAD_106',959,'CTL9','3M','','UG','ED','LICEN','','9-12 Chemistry'),
	(11,'CSPTRAD_107',959,'EK8S','1M','','UG','ED','LICEN','','K-8 Social Studies'),
	(12,'CSPTRAD_108',959,'SE','3M','','UG','ED','LICEN','','5-12 Social Studies'),
	(13,'CSPTRAD_109',959,'K12A','1V','','UG','ED','LICEN','','K-12 Art'),
	(14,'CSPTRAD_110',959,'ESLL','1E','','UG','ED','LICEN','','K-12 English as a Second Language'),
	(15,'CSPTRAD_111',959,'K12M','1K','','UG','ED','LICEN','','K-12 Music'),
	(16,'CSPTRAD_112',959,'HLPE','1P','','UG','ED','LICEN','','K-12 Physical Education & 5-12 Health'),
	(17,'CSPTRAD_113',959,'PFE','PF','','UG','ED','LICEN','','Parent & Family Education'),
	(18,'CSPTRAD_114',959,'DC','MR','','GR','VM','CERT','','Colloquy-Director of Christian Education'),
	(19,'CSPTRAD_115',959,'DO','MS','','GR','VM','CERT','','Colloquy-Director of Christian Outreach'),
	(20,'CSPTRAD_116',959,'LCT','MV','','UG','VM','CERT','','Colloquy-Lutheran Classroom Teacher');
	");
	$this->execute("
CREATE TABLE `stp_csp_majors` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `trad_id` varchar(64) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `major` varchar(64) DEFAULT NULL,
  `interest` varchar(64) DEFAULT NULL,
  `concentration` varchar(64) DEFAULT NULL,
  `level` varchar(64) DEFAULT NULL,
  `college` varchar(64) DEFAULT NULL,
  `degree` varchar(64) DEFAULT NULL,
  `student_type` varchar(64) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
");
$this->execute("
INSERT INTO `stp_csp_majors` (`id`, `trad_id`, `program_id`, `major`, `interest`, `concentration`, `level`, `college`, `degree`, `student_type`, `name`)
VALUES
	(1,'CSPTRAD_1',959,'0000','','','UG','00','BA','','Undecided'),
	(2,'CSPTRAD_2',959,'ACCT','5M','','UG','00','BA','','Accounting'),
	(3,'CSPTRAD_3',959,'ARTD','6M','','UG','00','BA','','Art Design'),
	(4,'CSPTRAD_4',959,'ARST','6M','','UG','00','BA','','Art Studio'),
	(5,'CSPTRAD_5',959,'ATHT','AT','','UG','00','BA','','Athletic Training'),
	(6,'CSPTRAD_6',959,'BIOL','7M','','UG','00','BA','','Biology (BA)'),
	(7,'CSPTRAD_7',959,'BIOL','7N','','UG','00','BA','','Biology (BS)'),
	(8,'CSPTRAD_8',959,'BSMT','MZ','','UG','00','BA','','Business Management'),
	(9,'CSPTRAD_9',959,'CLD','1L','','UG','00','BA','','Child Learning and Development'),
	(10,'CSPTRAD_10',959,'CHM','MR','DC','UG','00','BA','','Christian Ministry - Director of Christian Education'),
	(11,'CSPTRAD_11',959,'CHM','MS','DO','UG','00','BA','','Christian Ministry - Director of Christian Outreach'),
	(12,'CSPTRAD_12',959,'CHMS','MT','','UG','00','BA','','Church Music (DPM)'),
	(13,'CSPTRAD_13',959,'COMM','8M','','UG','00','BA','','Communication Studies'),
	(14,'CSPTRAD_14',959,'CMAT','6M','','UG','00','BA','','Community Arts'),
	(15,'CSPTRAD_15',959,'CHSE','1C','','UG','00','BA','','Community Health Science'),
	(16,'CSPTRAD_16',959,'CJ','9M','','UG','00','BA','','Criminal Justice'),
	(17,'CSPTRAD_17',959,'ECE','0M','','UG','00','BA','','Early Childhood (Birth to 3rd Grade)'),
	(18,'CSPTRAD_18',959,'CTL','3M','','UG','00','BA','','Education - Grade 5-12 Chemistry'),
	(19,'CSPTRAD_19',959,'CAL','3M','','UG','00','BA','','Education - Grade 5-12 Comm Arts/Literature'),
	(20,'CSPTRAD_20',959,'MTL','3M','','UG','00','BA','','Education - Grade 5-12 Life Science'),
	(21,'CSPTRAD_21',959,'MA','3M','','UG','00','BA','','Education - Grade 5-12 Math'),
	(22,'CSPTRAD_22',959,'SE','3M','','UG','00','BA','','Education - Grade 5-12 Social Sciences'),
	(23,'CSPTRAD_23',959,'AE','1V','','UG','00','BA','','Education - Grade K-12 Art Education'),
	(24,'CSPTRAD_24',959,'HLPE','1P','','UG','00','BA','','Education - Grade K-12 Health/Physical Ed'),
	(25,'CSPTRAD_25',959,'K12M','1K','','UG','00','BA','','Education - Grade K-12 Instrumental/Vocal Music Ed'),
	(26,'CSPTRAD_26',959,'ELK6','1M','EK8C','UG','00','BA','','Elementary Education - Community Arts/Literature'),
	(27,'CSPTRAD_27',959,'ELK6','1M','EK8M','UG','00','BA','','Elementary Education - Mathematics'),
	(28,'CSPTRAD_28',959,'ELK6','1M','ELP6','UG','00','BA','','Elementary Education - PreK-6 Early Child Spec'),
	(29,'CSPTRAD_29',959,'ELK6','1M','EK8L','UG','00','BA','','Elementary Education - Science'),
	(30,'CSPTRAD_30',959,'ELK6','1M','EK8S','UG','00','BA','','Elementary Education - Social Studies'),
	(31,'CSPTRAD_31',959,'ENGL','MA','','UG','00','BA','','English'),
	(32,'CSPTRAD_32',959,'ESL','1E','','UG','00','BA','','English as Second Language'),
	(33,'CSPTRAD_33',959,'EXCS','EA','','UG','00','BA','','Exercise Science - BA'),
	(34,'CSPTRAD_34',959,'EXCS','ES','','UG','00','BS','','Exercise Science - BS'),
	(35,'CSPTRAD_35',959,'FLED','FL','','UG','00','BA','','Family Life Education'),
	(36,'CSPTRAD_36',959,'FINA','MC','','UG','00','BA','','Finance'),
	(37,'CSPTRAD_37',959,'GRDS','1G','','UG','00','BA','','Graphic Design'),
	(38,'CSPTRAD_38',959,'HIST','MD','','UG','00','BA','','History'),
	(39,'CSPTRAD_39',959,'LCT','MV','','UG','00','BA','','Lutheran Classroom Teacher'),
	(40,'CSPTRAD_40',959,'MKT','MU','','UG','00','BA','','Marketing'),
	(41,'CSPTRAD_41',959,'MATH','MY','','UG','00','BA','','Math (BA)'),
	(42,'CSPTRAD_42',959,'MATH','1T','','UG','00','BA','','Math (BS)'),
	(43,'CSPTRAD_43',959,'MUSC','ME','','UG','00','BA','','Music'),
	(44,'CSPTRAD_44',959,'PFE','PF','','UG','00','BA','','Parent and Family Education'),
	(45,'CSPTRAD_45',959,'0000','MO','','UG','00','BA','','Pre-Engineering Studies'),
	(46,'CSPTRAD_46',959,'0000','MN','','UG','00','BA','','Pre-Law Studies'),
	(47,'CSPTRAD_47',959,'0000','MM','','UG','00','BA','','Pre-Medical Studies'),
	(48,'CSPTRAD_48',959,'PSYC','MH','','UG','00','BA','','Psychology (BA)'),
	(49,'CSPTRAD_49',959,'PSYC','1H','','UG','00','BA','','Psychology (BS)'),
	(50,'CSPTRAD_50',959,'PP','1Y','','UG','00','BA','','Public Policy'),
	(51,'CSPTRAD_51',959,'SOCI','MI','','UG','00','BA','','Sociology'),
	(52,'CSPTRAD_52',959,'SPM','SM','','UG','00','BA','','Sport Management'),
	(53,'CSPTRAD_53',959,'SPSY','SP','','UG','00','BA','','Sport Psychology'),
	(54,'CSPTRAD_54',959,'THEA','MJ','','UG','00','BA','','Theatre'),
	(55,'CSPTRAD_55',959,'THEO','MK','','UG','00','BA','','Theology'),
	(56,'CSPTRAD_56',959,'THEO','ML','','UG','00','BA','','Theology (Pre-Seminary)'),
	(57,'CSPTRAD_117',959,'ORP','OP','','UG','ED','BS','T','Orthotics & Prosthetics Major');
");$this->execute("
CREATE TABLE `stp_csp_minors` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `trad_id` varchar(64) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `minor` varchar(64) DEFAULT NULL,
  `interest` varchar(64) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
");$this->execute("
INSERT INTO `stp_csp_minors` (`id`, `trad_id`, `program_id`, `minor`, `interest`, `name`)
VALUES
	(1,'CSPTRAD_57',959,'ACCT','5M','Accounting'),
	(2,'CSPTRAD_58',959,'ARHT','6M','Art History'),
	(3,'CSPTRAD_59',959,'ARST','6M','Art Studio'),
	(4,'CSPTRAD_60',959,'BBTR','BB','Bible Translation'),
	(5,'CSPTRAD_61',959,'BL','BB','Biblical Languages'),
	(6,'CSPTRAD_62',959,'BIOL','7M','Biology'),
	(7,'CSPTRAD_63',959,'BUS','MZ','Business'),
	(8,'CSPTRAD_64',959,'BUSF','MC','Business Finance'),
	(9,'CSPTRAD_65',959,'CHEM','CB','Chemistry'),
	(10,'CSPTRAD_66',959,'COMM','8M','Communication Studies'),
	(11,'CSPTRAD_67',959,'CMAT','6M','Community Arts'),
	(12,'CSPTRAD_68',959,'CHSE','1C','Community Health Science'),
	(13,'CSPTRAD_69',959,'CONL','CN','Confessional Lutheranism'),
	(14,'CSPTRAD_70',959,'CJ','9M','Criminal Justice'),
	(15,'CSPTRAD_71',959,'DNC','1D','Dance'),
	(16,'CSPTRAD_72',959,'DSGN','6M','Design'),
	(17,'CSPTRAD_73',959,'EDUC','1U','Education'),
	(18,'CSPTRAD_74',959,'ENGL','MA','English'),
	(19,'CSPTRAD_75',959,'ESL','1E','English as Second Language'),
	(20,'CSPTRAD_76',959,'ENVR','MB','Environmental Science'),
	(21,'CSPTRAD_77',959,'FAMI','FL','Family Studies'),
	(22,'CSPTRAD_78',959,'GER','1R','Gerontology'),
	(23,'CSPTRAD_79',959,'HIS','MD','History'),
	(24,'CSPTRAD_80',959,'HMG','HM','Hmong Studies'),
	(25,'CSPTRAD_81',959,'INTL','IS','International Studies'),
	(26,'CSPTRAD_82',959,'MKT','MU','Marketing'),
	(27,'CSPTRAD_83',959,'MATH','MY','Math'),
	(28,'CSPTRAD_84',959,'MUSC','ME','Music'),
	(29,'CSPTRAD_85',959,'NPM','NP','Non-Profit Management'),
	(30,'CSPTRAD_86',959,'PHTO','PH','Photography'),
	(31,'CSPTRAD_87',959,'PO','PS','Political Science'),
	(32,'CSPTRAD_88',959,'PSYC','MH','Psychology'),
	(33,'CSPTRAD_89',959,'RE','MK','Religion'),
	(34,'CSPTRAD_90',959,'SLBD','SB','Sales and Business Development'),
	(35,'CSPTRAD_91',959,'SOCI','MI','Sociology'),
	(36,'CSPTRAD_92',959,'SPAN','SA','Spanish'),
	(37,'CSPTRAD_93',959,'SPEC','1N','Special Education'),
	(38,'CSPTRAD_94',959,'THEA','MJ','Theatre'),
	(39,'CSPTRAD_95',959,'WRIT','WR','Writing'),
	(40,'CSPTRAD_96',959,'WRTC','WR','Writing Communication');
");$this->execute("
CREATE TABLE `stp_csp_pseos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `trad_id` varchar(64) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `major` varchar(64) DEFAULT NULL,
  `interest` varchar(64) DEFAULT NULL,
  `concentration` varchar(64) DEFAULT NULL,
  `level` varchar(64) DEFAULT NULL,
  `college` varchar(64) DEFAULT NULL,
  `degree` varchar(64) DEFAULT NULL,
  `student_type` varchar(64) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
");$this->execute("
INSERT INTO `stp_csp_pseos` (`id`, `trad_id`, `program_id`, `major`, `interest`, `concentration`, `level`, `college`, `degree`, `student_type`, `name`)
VALUES
	(1,'CSPTRAD_117',959,'0000','A0',NULL,'UG','00','000000',NULL,'PSEO');
");$this->execute("
CREATE TABLE `stp_elp_programs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `entity_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
");$this->execute("
INSERT INTO `stp_elp_programs` (`id`, `entity_id`, `item_id`, `name`)
VALUES
	(1,7325,1543,'Master of Arts in Sport Management'),
	(2,7325,2174,'Master of Arts in Strategic Communication Management'),
	(3,7325,1559,'Bachelor of Arts in Business'),
	(4,7325,1568,'Bachelor of Arts in Health Care'),
	(5,7325,2151,'Associate of Arts'),
	(6,7325,2152,'Associate of Arts in Early Childhood Education'),
	(7,7325,2153,'Bachelor of Arts in Accounting'),
	(8,7325,2154,'Bachelor of Arts in Child Development'),
	(9,7325,2155,'Bachelor of Arts in Criminal Justice'),
	(10,7325,2156,'Bachelor of Arts in Exercise Science'),
	(11,7325,2157,'Bachelor of Arts in Family Life Education'),
	(12,7325,2158,'Bachelor of Arts in Food Industry Management'),
	(13,7325,2159,'Bachelor of Arts in Hospitality Management'),
	(14,7325,2160,'Bachelor of Arts in Human Resource Management'),
	(15,7325,2161,'Bachelor of Arts in Information and Technology Management'),
	(16,7325,2162,'Bachelor of Arts in Marketing (blended)'),
	(17,7325,2163,'Bachelor of Arts in Organizational Management and Leadership'),
	(18,7325,2164,'Bachelor of Science in Pulmonary Science'),
	(19,7325,2165,'Bachelor of Science in Radiologic Science Leadership'),
	(20,7325,2166,'Master of Business Administration'),
	(21,7325,2167,'Master of Business Administration - Health Care Management'),
	(22,7325,2169,'Master of Arts in Criminal Justice Leadership'),
	(23,7325,2171,'Master of Arts in Family Life Education'),
	(24,7325,2172,'Master of Arts in Human Resource Management'),
	(25,7325,2239,'Master of Arts in Human Service Health Care Aging'),
	(26,7325,2173,'Master of Arts in Leadership and Management'),
	(27,7325,2187,'Master of Arts in Classroom Instruction with K-12 Reading Endorsement'),
	(28,7325,2188,'Master of Arts in Differentiated Instruction'),
	(29,7325,2170,'Master of Arts in Education - Early Childhood Education'),
	(30,7325,2189,'Master of Arts in Educational Leadership'),
	(31,7325,2205,'Master of Arts in Education - K-12 Reading Endorsement Only'),
	(32,7325,2204,'Master of Arts in Special Education'),
	(33,7325,1550,'Master of Arts in Educational Technology'),
	(34,7325,2327,'Forensic Mental Health (Online)'),
	(35,10570,2302,'Bachelor of Science in Business Management: Business Management Strand'),
	(36,10570,2303,'Bachelor of Science in Business Management: Environmental, Safety and Health Strand'),
	(37,10570,2304,'Bachelor of Science in Business Management: Emergency Operations Strand'),
	(38,10570,2305,'Bachelor of Science in Business Management: Health Administration Strand'),
	(39,8470,2213,'RN to BSN'),
	(40,8470,2214,'Special Ed Endorsement'),
	(41,8470,2215,'Bilingual-ESL Endorsment'),
	(42,8470,2217,'BA in Communications'),
	(43,8470,2218,'BA in Business Administration'),
	(44,8470,2221,'BA in Criminal Justice'),
	(45,8470,2222,'Master of Business Administration'),
	(46,8470,2223,'Master of Business Administration, Leadership Concentration'),
	(47,8470,2224,'Master of Science in Criminal Justice'),
	(48,8470,2341,'Master in Math Education'),
	(49,8470,2340,'MA in Mathematics & Science Education for Elementary Teachers'),
	(50,8470,2342,'MA in Science Education'),
	(51,8470,2129,'Masters of Arts in Communications Management'),
	(52,8470,2919,'MSN, Education Track'),
	(53,8470,2921,'MSN, Administration Track'),
	(54,8470,2916,'MSN, Bridge Program'),
	(55,8470,2917,'Post-Grad Certificate, Nurse Administrator'),
	(56,8470,2918,'Post-Grad Certificate, Nurse Educator'),
	(57, 7325, 2940, 'Health Care Administration (Blended)');
");$this->execute("
CREATE TABLE `stp_partners` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `entity_id` int(11) DEFAULT NULL,
  `name` varchar(64) DEFAULT NULL,
  `student_type` varchar(64) DEFAULT NULL,
  `extra_json` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
");$this->execute("
INSERT INTO `stp_partners` (`id`, `entity_id`, `name`, `student_type`, `extra_json`)
VALUES
	(1,7325,'Ajasa Technologies',NULL,NULL),
	(2,7325,'Allina',NULL,NULL),
	(3,7325,'Duluth Police Department',NULL,NULL),
	(4,7325,'EdAssist',NULL,NULL),
	(5,7325,'Edcor',NULL,NULL),
	(6,7325,'Express Scripts',NULL,NULL),
	(7,7325,'Fairview Health Services',NULL,NULL),
	(8,7325,'Law Enforcement Labor Services',NULL,NULL),
	(9,7325,'Mankato Clinic',NULL,NULL),
	(10,7325,'Metropolitan Airports Commission',NULL,NULL),
	(11,7325,'Minneapolis Police Department',NULL,NULL),
	(12,7325,'Minnesota Association of County Probation Officers',NULL,NULL),
	(13,7325,'Minnesota Association of Women Police',NULL,NULL),
	(14,7325,'Minnesota Corrections Association',NULL,NULL),
	(15,7325,'Minnesota Fraternal Order of Police',NULL,NULL),
	(16,7325,'Minnesota Gastroenterology',NULL,NULL),
	(17,7325,'Minnesota Head Start',NULL,NULL),
	(18,7325,'Minnesota State Troopers',NULL,NULL),
	(19,7325,'Park Nicollet',NULL,NULL),
	(20,7325,'Scholarship Management Services',NULL,NULL),
	(21,7325,'Summit Orthopedics',NULL,NULL),
	(22,7325,'SuperValu',NULL,NULL),
	(23,7325,'United Health Group',NULL,NULL),
	(24,7325,'UPS',NULL,NULL),
	(25,7325,'YMCA',NULL,NULL),
	(26,7325,'West Central Minnesota Chapter of Oncology Nursing Society',NULL,NULL),
	(27,7325,'Anne Arundel Community College','ND',NULL),
	(28,7325,'Anoka Ramsey','ND',NULL),
	(29,7325,'Anoka Technical','ND',NULL),
	(30,7325,'Carroll Community College','ND',NULL),
	(31,7325,'Century College','ND',NULL),
	(32,7325,'Dakota Community and Technical College','ND',NULL),
	(33,7325,'Hennepin Tech - Brooklyn Park','ND',NULL),
	(34,7325,'Hennepin Tech - Eden Prairie ','ND',NULL),
	(35,7325,'Inver Hills Community College','ND',NULL),
	(36,7325,'Normandale Community College','ND',NULL),
	(37,7325,'North Hennepin','ND',NULL),
	(38,7325,'Ridgewater - Hutchinson','ND',NULL),
	(39,7325,'Ridgewater - Willmar','ND',NULL),
	(40,7325,'Riverland - Albert Lea','ND',NULL),
	(41,7325,'Riverland - Austin','ND',NULL),
	(42,7325,'Riverland - Owatonna','ND',NULL),
	(43,7325,'South Central - Fairbault','ND',NULL),
	(44,7325,'South Central - Mankato','ND',NULL),
	(45,8470,'Ajasa Technologies',NULL,NULL),
	(46,8470,'Allina Health Systems (United Hospital)',NULL,NULL),
	(47,8470,'Cub Foods',NULL,NULL),
	(48,8470,'Dominos Pizza',NULL,NULL),
	(49,8470,'Duluth Police Department',NULL,NULL),
	(50,8470,'Express Scripts',NULL,NULL),
	(51,8470,'Fairview Heath System',NULL,NULL),
	(52,8470,'Fourteen Foods',NULL,NULL),
	(53,8470,'Fraternal Order of Police Officers',NULL,NULL),
	(54,8470,'Lunds/Byerly\'s',NULL,NULL),
	(55,8470,'Minneapolis Police Department',NULL,NULL),
	(56,8470,'Minnesota Head Start Programs',NULL,NULL),
	(57,8470,'MN Gastroenterology',NULL,NULL),
	(58,8470,'SuperValu Corporation',NULL,NULL),
	(59,8470,'Sylvan Learning Center',NULL,NULL),
	(60,8470,'Tuition Advisory Services',NULL,NULL),
	(61,8470,'UnitedHealth Group',NULL,NULL),
	(62,8470,'UPS Corporation',NULL,NULL),
	(63,8470,'YMCA',NULL,NULL),
	(64,8470,'Normandale CC','ND',NULL),
	(65,8470,'St. Paul College CC','ND',NULL),
	(66,8470,'Inver Hills CC','ND',NULL),
	(67,8470,'Dakota Community and Technical College','ND',NULL),
	(68,8470,'Hennepin Tech-Eden Prarie','ND',NULL),
	(69,8470,'South Central Mankato','ND',NULL),
	(70,8470,'South Central Fairbault','ND',NULL),
	(71,8470,'North Hennepin','ND',NULL),
	(72,8470,'Anoka Ramsey','ND',NULL),
	(73,8470,'Century College','ND',NULL),
	(74,8470,'Hennepin Tech-Brooklyn Park','ND',NULL),
	(75,8470,'Ridgewater-Hutchinson','ND',NULL),
	(76,8470,'Ridgewater-Willmar','ND',NULL),
	(77,8470,'Anoka Technical','ND',NULL),
	(78,8470,'Riverland-Owatonna','ND',NULL),
	(79,8470,'Riverland-Albert Lea','ND',NULL),
	(80,8470,'Riverland-Austin','ND',NULL);
");$this->execute("
CREATE TABLE `stp_programs` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `entity_id` int(11) DEFAULT NULL,
  `classification` varchar(64) DEFAULT NULL,
  `elp_item_id` int(11) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `major` varchar(64) DEFAULT NULL,
  `interest` varchar(64) DEFAULT NULL,
  `concentration` varchar(64) DEFAULT NULL,
  `level` varchar(64) DEFAULT NULL,
  `college` varchar(64) DEFAULT NULL,
  `degree` varchar(64) DEFAULT NULL,
  `student_type` varchar(64) DEFAULT NULL,
  `name` varchar(128) DEFAULT NULL,
  `preferred_major` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
");$this->execute("
INSERT INTO `stp_programs` (`id`, `entity_id`, `classification`, `elp_item_id`, `program_id`, `major`, `interest`, `concentration`, `level`, `college`, `degree`, `student_type`, `name`, `preferred_major`)
VALUES
	(1,7325,'NG',2168,847,'OUT','GO','','GR','VM','MA','G','Christian Outreach Leadership (Online)',NULL),
	(2,7325,'NG',2187,897,'EDUC','ER','CIRL','GR','ED','MA','G','Curriculum & Instruction with K-12 Reading (Blended)',NULL),
	(3,7325,'NG',2169,848,'CJL','GJ','','GR','BL','MA','G','Criminal Justice Leadership (Online)',NULL),
	(4,7325,'NG',2328,902,'EDUC','GK','DL','GR','ED','MA','G','Differentiated Instruction (In Class)',NULL),
	(5,7325,'NG',2188,896,'EDUC','GK','DL','GR','ED','MA','G','Differentiated Instruction (Online)',NULL),
	(6,7325,'NG',2170,849,'EDUC','GE','EC','GR','ED','MA','G','Early Childhood Education (Online)',NULL),
	(7,7325,'NG',2329,903,'EDUC','E5','EDLE','GR','ED','MA','G','Educational Leadership (In Class)',NULL),
	(8,7325,'NG',2189,895,'EDUC','E5','EDLE','GR','ED','MA','G','Educational Leadership (Online)',NULL),
	(9,7325,'NG',2336,1046,'SA','EP','PRC','GR','EDS','MA','G','Educational Specialist Degree (Ed.S) Principal Licensure (Blended)',NULL),
	(10,7325,'NG',2338,1047,'SA','EQ','SPC','GR','ED','MA','G','Educational Specialist Degree (Ed.S) Superintendent Licensure (Blended)',NULL),
	(11,7325,'NG',1550,899,'EDUC','E8','ET','GR','ED','MA','G','Educational Technology (Online)',NULL),
	(12,7325,'NG',2171,850,'FLED','GF','','GR','ED','MA','G','Family Life Education (Online)',NULL),
	(13,7325,'NG',2327,1002,'HUMS','GW','','GR','BL','CERT','G','Forensic Mental Health (Online)',NULL),
	(14,7325,'NG',2296,963,'HUMS','GW','FMH','GR','BL','CERT','G','Forensic Mental Health Certificate (Online)',NULL),
	(15,7325,'NG',2239,894,'HUMS','GA','HCA','GR','ED','MA','G','Health Care and Aging (Online)',NULL),
	(16,7325,'NG',2172,851,'HRM','GI','','GR','BL','MA','G','Human Resource Management (Online)',NULL),
	(17,7325,'NG',2332,864,'LM','GL','','GR','BL','MA','G','Leadership and Management (Blended)',NULL),
	(18,7325,'NG',2173,852,'LM','GN','','GR','BL','MA','G','Leadership and Management (Online)',NULL),
	(19,7325,'NG',2334,861,'BA','ZZ','','GR','BL','MBA','G','MBA (Blended)',NULL),
	(20,7325,'NG',2166,845,'BA','GB','','GR','BL','MBA','G','MBA (Online)',NULL),
	(21,7325,'NG',2335,862,'BA','ZH','HCM','GR','BL','MBA','G','MBA - Health Care Management Emphasis (Blended)',NULL),
	(22,7325,'NG',2167,846,'BA','ZI','HCM','GR','BL','MBA','G','MBA - Health Care Management Emphasis (Online)',NULL),
	(23,7325,'NG',2236,900,'EDUC','E7','SPEC','GR','ED','MA','G','Special Education (Online)',NULL),
	(24,7325,'NG',1543,730,'SPM','GS','','GR','ED','MA','G','Sport Management (Online)',NULL),
	(25,7325,'NG',2333,865,'SCM','GV','','GR','AS','MA','G','Strategic Communication Management (Blended)',NULL),
	(26,7325,'NG',2174,853,'SCM','GV','','GR','AS','MA','G','Strategic Communication Management (Online)',NULL),
	(27,7325,'ND',2151,832,'GS','DA','','UG','00','AA','D','Associate of Arts (Online)',NULL),
	(28,7325,'ND',2152,833,'GS','DE','EC','UG','00','AA','D','Associate of Arts - Early Childhood Education Emphasis (Online)',NULL),
	(29,7325,'ND',2153,854,'ACCT','DT','','UG','BL','BA','T','Accounting (Blended)',NULL),
	(30,7325,'ND',1559,728,'BUS','DB','','UG','BL','BA','T','Business (Online)',NULL),
	(31,7325,'ND',2154,834,'CDEV','DC','','UG','ED','BA','T','Child Development (Online)',NULL),
	(32,7325,'ND',2155,835,'CJ','DJ','','UG','BL','BA','T','Criminal Justice (Online)',NULL),
	(33,7325,'ND',2156,836,'EXCS','DK','','UG','ED','BA','T','Exercise Science (Online)',NULL),
	(34,7325,'ND',2157,837,'FLED','DF','','UG','ED','BA','T','Family Life Education (Online)',NULL),
	(35,7325,'ND',2158,838,'FIM','DR','','UG','BL','BA','T','Food Industry Management (Online)',NULL),
	(36,7325,'ND',1568,731,'HCR','DD','','UG','ED','BA','T','Health Care (Online)',NULL),
	(37,7325,'ND',2321,1023,'HSPM','DX','','UG','BL','BA','T','Hospitality Management (Blended)',NULL),
	(38,7325,'ND',2159,839,'HSPM','DY','','UG','BL','BA','T','Hospitality Management (Online)',NULL),
	(39,7325,'ND',2322,857,'HRM','D8','','UG','BL','BA','T','Human Resource Management (Blended)',NULL),
	(40,7325,'ND',2160,840,'HRM','DH','','UG','BL','BA','T','Human Resource Management (Online)',NULL),
	(41,7325,'ND',2323,858,'ITM','DI','','UG','BL','BA','T','Information and Technology Management (Blended)',NULL),
	(42,7325,'ND',2161,841,'ITM','M6','','UG','BL','BA','T','Information and Technology Management (Online)',NULL),
	(43,7325,'ND',2324,859,'MM','D9','','UG','BL','BA','T','Marketing (Blended)',NULL),
	(44,7325,'ND',2162,842,'MM','DM','','UG','BL','BA','T','Marketing (Online)',NULL),
	(45,7325,'ND',2325,860,'OML','D7','','UG','BL','BA','T','Organizational Management and Leadership (Blended)',NULL),
	(46,7325,'ND',2163,855,'OML','DO','','UG','BL','BA','T','Organizational Management and Leadership (Online)',NULL),
	(47,7325,'ND',2164,843,'PMSC','DL','','UG','ED','BS','T','Pulmonary Science (Online)',NULL),
	(48,7325,'ND',2165,844,'RADL','DN','','UG','ED','BS','T','Radiologic Science Leadership (Online)',NULL),
	(49,10570,'',2302,1000,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Bachelor of Science in Business Management: Business Management Strand',NULL),
	(50,10570,NULL,2303,990,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Bachelor of Science in Business Management: Environmental, Safety and Health Strand',NULL),
	(51,10570,NULL,2304,989,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Bachelor of Science in Business Management: Emergency Operations Strand',NULL),
	(52,10570,NULL,2305,997,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Bachelor of Science in Business Management: Health Administration Strand',NULL),
	(73,8470,NULL,2213,784,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'RN to BSN','BSN.RN.COMP.ONL'),
	(74,8470,NULL,2214,785,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Special Ed Endorsement','CER.GRD.SPED.ONL'),
	(75,8470,NULL,2215,828,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Bilingual-ESL Endorsment','END.BIL.ESL.ONL'),
	(76,8470,NULL,2217,783,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BA in Communications','BA.COMM.ONL'),
	(77,8470,NULL,2218,786,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BA in Business Administration','BA.BUS.ADMIN.ONL'),
	(78,8470,NULL,2221,916,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'BA in Criminal Justice','BA.CRJ.ONL'),
	(79,8470,NULL,2222,924,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Master of Business Administration','MBA.BUS.AD.ONL'),
	(80,8470,NULL,2223,925,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Master of Business Administration, Leadership Concentration','MBA.LEAD.ONL'),
	(81,8470,NULL,2224,923,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Master of Science in Criminal Justice','MS.CRJ.ONL'),
	(82,8470,NULL,2341,1024,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Master in Math Education','MA.MTH.ONL'),
	(83,8470,NULL,2340,1026,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'MA in Mathematics & Science Education for Elementary Teachers','MA.MTH.SCI.ONL'),
	(84,8470,NULL,2342,1025,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'MA in Science Education','MA.SCI.ONL'),
	(85,8470,NULL,2129,781,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Masters of Arts in Communications Management','MA.COM.MNG.ONL'),
	(86,8470,NULL,2919,1053,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'MSN, Education Track','MSN.NUR.EDU.ONL'),
	(87,8470,NULL,2921,917,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'MSN, Administration Track','MSN.NUR.ADM.ONL'),
	(88,8470,NULL,2916,1061,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'MSN, Bridge Program','MSN.BRIDGE.REQ'),
	(89,8470,NULL,2917,1059,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Post-Grad Certificate, Nurse Administrator','CER.MSN.ADM.ONL'),
	(90,8470,NULL,2918,1060,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'Post-Grad Certificate, Nurse Educator','CER.MSN.EDU.ONL'),
	(91, 7325, 'ND', 2940, 1108, 'HCR', 'DD', NULL, 'UG', 'ED', 'BA', 'T', 'Health Care Administration (Blended)', NULL);
        ");
    }

    /**
     * Migrate Down.
     */
    public function down()
    {
	$this->table('portals')->removeColumn('ssn_field_name')->save();
	$this->table('portals')->removeColumn('abbrev')->save();
	$this->table('stp_csp_licensures')->drop();
	$this->table('stp_csp_majors')->drop();
	$this->table('stp_csp_minors')->drop();
	$this->table('stp_csp_pseos')->drop();
	$this->table('stp_elp_programs')->drop();
	$this->table('stp_partners')->drop();
	$this->table('stp_programs')->drop();
	$this->table('stp_locations')->drop();
	$this->table('stp_programs_to_locations')->drop();
	$this->table('client_programs_to_applications')->drop();
        $this->execute("
UPDATE portals
SET portal_address='gwc.students.learninghouse.com'
WHERE portal_id=285;
UPDATE portals
SET abbrev='gwc'
WHERE portal_id=283;
UPDATE portals
SET abbrev='gwc'
WHERE portal_id=285;
CREATE TABLE `client_programs_to_applications` (
  `client_program_id` int(11) DEFAULT NULL,
  `application_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
	(928,1),
	(783,4),
	(784,4),
	(785,5),
	(786,4),
	(828,5),
	(916,4),
	(923,5),
	(925,5),
	(924,5),
	(959,2),
	(2249,2),
	(963,1),
	(964,1),
	(1022,4),
	(1023,4),
	(1047,1),
	(1002,1),
	(1022,4),
	(1023,4),
	(1046,1),
	(1002,5),
	(1024,5),
	(1026,5),
	(1025,5),
	(781,5),
	(1053,5),
	(917,5),
	(1061,5),
	(1059,5),
	(1060,5),
	(1107,1);
        ");
    }
}
