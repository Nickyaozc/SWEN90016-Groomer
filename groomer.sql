DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL DEFAULT '',
  `password` varchar(20) NOT NULL DEFAULT '',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `admin` VALUES (1,'admin','admin');

DROP TABLE IF EXISTS `uinfo`;
CREATE TABLE `uinfo` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `u_name` varchar(50) NOT NULL DEFAULT '',
  `u_email` varchar(50) NOT NULL DEFAULT '',
  `u_password` varchar(20) NOT NULL DEFAULT '',
  `u_address` varchar(100) NOT NULL DEFAULT '',
  `u_state` char(3) NOT NULL DEFAULT '',
  `u_postcode` smallint(4) NOT NULL DEFAULT '0',
  `u_mobilenumber` int(11) NOT NULL DEFAULT '0',
  `u_homenumber` int(11) NOT NULL DEFAULT '0',
  `u_worknumber` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `dinfo`;
CREATE TABLE `dinfo` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `d_ownerid` int(10) NOT NULL DEFAULT '0',
  `d_name` varchar(50) NOT NULL DEFAULT '',
  `d_breed` varchar(20) NOT NULL DEFAULT '',
  `d_date_of_birth` varchar(15) NOT NULL DEFAULT '',
  PRIMARY KEY (`Id`),
  KEY `d_ownerid` (`d_ownerid`),
  CONSTRAINT `dinfo_ibfk_1` FOREIGN KEY (`d_ownerid`) REFERENCES `uinfo` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `appointment`;
CREATE TABLE `appointment` (
  `Id` int(10) NOT NULL AUTO_INCREMENT,
  `a_userid` int(10) NOT NULL DEFAULT '0',
  `a_dogid` int(10) NOT NULL DEFAULT '0',
  `a_variety` varchar(10) NOT NULL DEFAULT '',
  `a_date` varchar(20) NOT NULL DEFAULT '',
  `a_time` varchar(50) NOT NULL DEFAULT '',
  `a_options` varchar(20) NOT NULL DEFAULT '',
  `a_description` varchar(200) NOT NULL DEFAULT '',
  PRIMARY KEY (`Id`),
  KEY `a_userid` (`a_userid`),
  KEY `a_dogid` (`a_dogid`),
  CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`a_userid`) REFERENCES `uinfo` (`Id`),
  CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`a_dogid`) REFERENCES `dinfo` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
