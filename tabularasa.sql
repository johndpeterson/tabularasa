CREATE DATABASE `tabularasa`;
USE `tabularasa`;

CREATE TABLE `adminexclude` (
  `ID` int(11) NOT NULL,
  `exclude` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `adminexclude` VALUES(2, 'ID');

CREATE TABLE `admintableexclude` (
  `ID` int(11) NOT NULL,
  `exclude` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `admintableexclude` VALUES(1, 'users');
INSERT INTO `admintableexclude` VALUES(2, 'adminexclude');
INSERT INTO `admintableexclude` VALUES(3, 'userexclude');
INSERT INTO `admintableexclude` VALUES(4, 'tableexclude');
INSERT INTO `admintableexclude` VALUES(5, 'fieldnames');
INSERT INTO `admintableexclude` VALUES(6, 'admintableexclude');
INSERT INTO `admintableexclude` VALUES(7, 'user_entered_task');

CREATE TABLE `fieldnames` (
  `ID` int(11) NOT NULL,
  `fieldname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `fieldnames` VALUES(1, 'ID');
INSERT INTO `fieldnames` VALUES(2, 'Submitted');
INSERT INTO `fieldnames` VALUES(3, 'Person');
INSERT INTO `fieldnames` VALUES(4, 'Start_Time');
INSERT INTO `fieldnames` VALUES(5, 'End_Time');
INSERT INTO `fieldnames` VALUES(6, 'Total_Time');
INSERT INTO `fieldnames` VALUES(7, 'Total_Items');
INSERT INTO `fieldnames` VALUES(8, 'Total_Corrections');
INSERT INTO `fieldnames` VALUES(9, 'Task_Done');

CREATE TABLE `tableexclude` (
  `ID` int(11) NOT NULL,
  `exclude` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tableexclude` VALUES(1, 'users');
INSERT INTO `tableexclude` VALUES(2, 'adminexclude');
INSERT INTO `tableexclude` VALUES(3, 'userexclude');
INSERT INTO `tableexclude` VALUES(4, 'tableexclude');
INSERT INTO `tableexclude` VALUES(5, 'fieldnames');
INSERT INTO `tableexclude` VALUES(6, 'admintableexclude');
INSERT INTO `tableexclude` VALUES(7, 'user_entered_task');

CREATE TABLE `userexclude` (
  `ID` int(11) NOT NULL,
  `exclude` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `userexclude` VALUES(1, 'ID');
INSERT INTO `userexclude` VALUES(2, 'Submitted');
INSERT INTO `userexclude` VALUES(3, 'Person');

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email_address` varchar(255) NOT NULL,
  `login` varchar(15) DEFAULT '0',
  `password` varchar(255) DEFAULT '0',
  `info` varchar(30) NOT NULL,
  `status` enum('live','suspended','pending') NOT NULL,
  `user_level` enum('1','2','3','4','5') NOT NULL,
  `last_loggedin` varchar(30) NOT NULL,
  `forgot` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `user_entered_task` (
  `ID` int(11) NOT NULL,
  `Task_Name` varchar(255) DEFAULT NULL,
  `Submitted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Person` text,
  `Start_Time` time DEFAULT NULL,
  `End_Time` time DEFAULT NULL,
  `Total_Time` time DEFAULT NULL,
  `Total_Items` int(30) DEFAULT NULL,
  `Total_Corrections` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


ALTER TABLE `adminexclude`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `admintableexclude`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `fieldnames`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `tableexclude`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `userexclude`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `user_entered_task`
  ADD PRIMARY KEY (`ID`);


ALTER TABLE `adminexclude`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `admintableexclude`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `fieldnames`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `tableexclude`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `userexclude`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;
ALTER TABLE `user_entered_task`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
