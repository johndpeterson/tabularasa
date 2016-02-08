SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `tabularasa`
--
CREATE DATABASE IF NOT EXISTS `tabularasa` DEFAULT CHARACTER SET utf8_latin_ci COLLATE utf8_latin_ci;
USE `tabularasa`;

-- --------------------------------------------------------

--
-- Table structure for table `adminexclude`
--

CREATE TABLE `adminexclude` (
  `ID` int(11) NOT NULL,
  `exclude` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8_latin_ci;

--
-- Dumping data for table `adminexclude`
--

INSERT INTO `adminexclude` (`ID`, `exclude`) VALUES
(2, 'ID');

-- --------------------------------------------------------

--
-- Table structure for table `admintableexclude`
--

CREATE TABLE `admintableexclude` (
  `ID` int(11) NOT NULL,
  `exclude` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8_latin_ci;

--
-- Dumping data for table `admintableexclude`
--

INSERT INTO `admintableexclude` (`ID`, `exclude`) VALUES
(1, 'users'),
(2, 'adminexclude'),
(3, 'userexclude'),
(4, 'tableexclude'),
(5, 'fieldnames'),
(6, 'admintableexclude'),
(7, 'user_entered_task');

-- --------------------------------------------------------

--
-- Table structure for table `fieldnames`
--

CREATE TABLE `fieldnames` (
  `ID` int(11) NOT NULL,
  `fieldname` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8_latin_ci;

--
-- Dumping data for table `fieldnames`
--

INSERT INTO `fieldnames` (`ID`, `fieldname`) VALUES
(1, 'ID'),
(2, 'Submitted'),
(3, 'Person'),
(4, 'Start_Time'),
(5, 'End_Time'),
(6, 'Total_Time'),
(7, 'Total_Items'),
(8, 'Total_Corrections'),
(9, 'Task_Done');

-- --------------------------------------------------------

--
-- Table structure for table `tableexclude`
--

CREATE TABLE `tableexclude` (
  `ID` int(11) NOT NULL,
  `exclude` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8_latin_ci;

--
-- Dumping data for table `tableexclude`
--

INSERT INTO `tableexclude` (`ID`, `exclude`) VALUES
(1, 'users'),
(2, 'adminexclude'),
(3, 'userexclude'),
(4, 'tableexclude'),
(5, 'fieldnames'),
(6, 'admintableexclude');

-- --------------------------------------------------------

--
-- Table structure for table `user_entered_task`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_latin_ci;

-- --------------------------------------------------------

--
-- Table structure for table `userexclude`
--

CREATE TABLE `userexclude` (
  `ID` int(11) NOT NULL,
  `exclude` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8_latin_ci;

--
-- Dumping data for table `userexclude`
--

INSERT INTO `userexclude` (`ID`, `exclude`) VALUES
(1, 'ID'),
(2, 'Submitted'),
(3, 'Person');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8_latin_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminexclude`
--
ALTER TABLE `adminexclude`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `admintableexclude`
--
ALTER TABLE `admintableexclude`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `fieldnames`
--
ALTER TABLE `fieldnames`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tableexclude`
--
ALTER TABLE `tableexclude`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user_entered_task`
--
ALTER TABLE `user_entered_task`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `userexclude`
--
ALTER TABLE `userexclude`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminexclude`
--
ALTER TABLE `adminexclude`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `admintableexclude`
--
ALTER TABLE `admintableexclude`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `fieldnames`
--
ALTER TABLE `fieldnames`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tableexclude`
--
ALTER TABLE `tableexclude`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user_entered_task`
--
ALTER TABLE `user_entered_task`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `userexclude`
--
ALTER TABLE `userexclude`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;