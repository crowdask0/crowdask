/*
This script populates user badge table
*/

CREATE TABLE IF NOT EXISTS `qa_badgerules` (
  `ruleid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `content` varchar(1000) DEFAULT NULL,
  `type` ENUM('GOLD', 'SILVER', 'BRONZE') NOT NULL,
  `desc1` varchar(1000) DEFAULT NULL, 
  PRIMARY KEY (`ruleid`),
  KEY `title` (`title`),
  KEY `content` (`content`),
  KEY `type` (`type`),
  KEY `desc1` (`desc1`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;