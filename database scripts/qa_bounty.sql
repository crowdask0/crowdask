/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

/*
* This script populates user bounty tables
*/

-- Dumping structure for table CrowdAsk.qa_bounty
CREATE TABLE IF NOT EXISTS `qa_bounty` (
  `bountyid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `postid` int(10) unsigned NOT NULL,
  `value` smallint(10) unsigned NOT NULL DEFAULT '0',
  `assignedBy` int(10) unsigned NOT NULL,
  `assignedTo` int(10) unsigned DEFAULT NULL,
  `created` datetime NOT NULL,
  `assigned` datetime DEFAULT NULL,
  PRIMARY KEY (`bountyid`),
  KEY `assignedBy` (`assignedBy`),
  KEY `assignedTo`(`assignedTo`),
  CONSTRAINT `qa_bounty_ibfk_1` FOREIGN KEY (`postid`) REFERENCES `qa_posts` (`postid`),
  CONSTRAINT `qa_bounty_ibfk_2` FOREIGN KEY (`assignedBy`) REFERENCES `qa_users` (`userid`),
  CONSTRAINT `qa_bounty_ibfk_3` FOREIGN KEY (`assignedTo`) REFERENCES `qa_users` (`userid`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*
* Add bounty columns to qa_posts
*/
ALTER TABLE `qa_posts`
  ADD (
  `bountyid` int(10) unsigned DEFAULT null,
  `bountyAwarded` int(10) unsigned DEFAULT 0
  );
  
 /*
 * Add total bounty to qa_userpoints
 */
 ALTER TABLE `qa_userpoints`
  ADD (
  `bountyOut` int(10) signed NOT NULL DEFAULT 0,
  `bountyIn`  int(10) unsigned NOT NULL DEFAULT 0
  ); 
  
-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
