-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2015 at 01:44 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `uge`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `ArticleID` int(11) NOT NULL AUTO_INCREMENT,
  `ArticleName` varchar(150) NOT NULL,
  `Description` text NOT NULL,
  `PreviousArticleID` int(11) DEFAULT NULL,
  `NextArticleID` int(11) DEFAULT NULL,
  `ChapterID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `AvgRating` int(11) DEFAULT NULL,
  `VideoLink` text NOT NULL,
  PRIMARY KEY (`ArticleID`),
  KEY `PreviousArticleID` (`PreviousArticleID`),
  KEY `NextArticleID` (`NextArticleID`),
  KEY `ChapterID` (`ChapterID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`ArticleID`, `ArticleName`, `Description`, `PreviousArticleID`, `NextArticleID`, `ChapterID`, `UserID`, `AvgRating`, `VideoLink`) VALUES
(4, '3D Arrays in Java', '3d array is a combination of 2 dimensional arrays. Here i points to the total number of 3d arrays which in this program are 3.j points to one two dimensional array and k just keeps track of each row in a two dimensional array.', NULL, NULL, 1, 2, NULL, 'https://www.youtube.com/v/mIJXeNWIE1E'),
(6, 'One and Two Dimensional Arrays', 'Here I am going to visualize the basic concepts of array.', NULL, NULL, 1, 2, NULL, '//www.youtube.com/v/NFJMjgXb0uA'),
(7, 'For Loop in C', 'Introduction to the C "For" loop. \r\n', NULL, NULL, 5, 8, NULL, 'https://www.youtube.com/v/HB0TFkQATBo'),
(10, 'Java: Objects and Classes', 'In this tutorial we will learn how to instantiate objects from classes that we create. We learn about instance variables, instance methods, and constructors. Getters and setters are introduced and encouraged as good coding practice.', NULL, NULL, 9, 8, NULL, 'https://www.youtube.com/v/ZpBtDTCgalw'),
(11, 'Java Tutorial - Inheritance and Polymorphism', 'Inheritance and Polymorphism are explained with real examples. Deep dive in to Java classes to understand these concepts.', NULL, NULL, 10, 2, NULL, 'https://www.youtube.com/v/YoSghxkxBVQ'),
(12, 'Probability Part 1', 'Learn what probability is.', NULL, NULL, 11, 2, NULL, 'https://www.youtube.com/v/3ER8OkqBdpE'),
(14, 'Math: Differential Equations Introduction', 'Math: Differential Equations Introduction by MD. Azhar Uddin', NULL, NULL, 12, 8, NULL, 'https://www.youtube.com/v/3nIXEZvP5dY'),
(15, 'Accounting Part 1', 'An intuitive approach to explaining introductory financial accounting.', NULL, NULL, 7, 8, NULL, 'https://www.youtube.com/v/4c0fB0IwIqs'),
(16, 'Transactional Analysis 1', 'First in a series on TA, offering some of the metaphors I think can be useful in conceptualising and dealing with interactions. This first video looks at the Parent, Adult and Child states, and basic transactions.', NULL, NULL, 8, 26, NULL, 'https://www.youtube.com/v/nKNyFSLJy6o');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE IF NOT EXISTS `book` (
  `BookID` int(11) NOT NULL AUTO_INCREMENT,
  `BookName` varchar(50) NOT NULL,
  `SubjectID` int(11) NOT NULL,
  PRIMARY KEY (`BookID`),
  KEY `SujectID` (`SubjectID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`BookID`, `BookName`, `SubjectID`) VALUES
(1, 'C Programming', 1),
(2, 'Java programming', 1),
(5, 'Accounting', 2),
(6, 'Management', 2),
(7, 'Probability and Stastics', 3),
(8, 'Calculus III', 3);

-- --------------------------------------------------------

--
-- Table structure for table `bookmark`
--

CREATE TABLE IF NOT EXISTS `bookmark` (
  `BookmarkID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `ArticleID` int(11) NOT NULL,
  PRIMARY KEY (`BookmarkID`),
  KEY `ArticleID` (`ArticleID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `changeuserrole`
--

CREATE TABLE IF NOT EXISTS `changeuserrole` (
  `ChangeUserRoleID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  PRIMARY KEY (`ChangeUserRoleID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `changeuserrole`
--

INSERT INTO `changeuserrole` (`ChangeUserRoleID`, `UserID`) VALUES
(3, 7);

-- --------------------------------------------------------

--
-- Table structure for table `chapter`
--

CREATE TABLE IF NOT EXISTS `chapter` (
  `ChapterID` int(11) NOT NULL AUTO_INCREMENT,
  `BookID` int(11) NOT NULL,
  `ChapterName` varchar(80) NOT NULL,
  `TotalArticles` int(11) DEFAULT NULL,
  PRIMARY KEY (`ChapterID`),
  KEY `BookID` (`BookID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `chapter`
--

INSERT INTO `chapter` (`ChapterID`, `BookID`, `ChapterName`, `TotalArticles`) VALUES
(1, 1, 'Array', NULL),
(2, 1, 'If-Else', NULL),
(5, 1, 'For-Loop', NULL),
(6, 1, 'While-Loop', NULL),
(7, 5, 'Introduction to Accounting', NULL),
(8, 5, 'Advance Accounting', NULL),
(9, 2, 'Objects and Classes', NULL),
(10, 2, 'Inheritence and Polymorphism', NULL),
(11, 7, 'Introduction to Probability', NULL),
(12, 8, 'Introduction to Differential Equation', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `choice`
--

CREATE TABLE IF NOT EXISTS `choice` (
  `ChoiceID` int(11) NOT NULL AUTO_INCREMENT,
  `QuestionID` int(11) NOT NULL,
  `ChoiceDisplay` varchar(500) NOT NULL,
  PRIMARY KEY (`ChoiceID`),
  KEY `QuestionID` (`QuestionID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `choice`
--

INSERT INTO `choice` (`ChoiceID`, `QuestionID`, `ChoiceDisplay`) VALUES
(2, 8, '0'),
(3, 8, '1'),
(4, 8, '-1'),
(5, 8, '2'),
(6, 9, '0'),
(7, 9, '1'),
(8, 9, '2'),
(9, 9, 'none'),
(10, 10, '5'),
(11, 10, '0'),
(12, 10, 'not applicable'),
(13, 10, '4'),
(14, 11, 'arr[0]'),
(15, 11, 'arr[10000]'),
(16, 11, 'arr[-1]'),
(17, 11, 'none'),
(18, 12, 'int A= {2,3,4,5};'),
(19, 12, 'int A{1,2,3};'),
(20, 12, 'A=[1 2 3 4]'),
(21, 12, 'none');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `CommentID` int(11) NOT NULL AUTO_INCREMENT,
  `ArticleID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Comment` text NOT NULL,
  PRIMARY KEY (`CommentID`),
  KEY `ArticleID` (`ArticleID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `forumanswer`
--

CREATE TABLE IF NOT EXISTS `forumanswer` (
  `ForumAnswerID` int(11) NOT NULL AUTO_INCREMENT,
  `QuestionID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Answer` int(11) NOT NULL,
  `AvgRating` int(11) NOT NULL,
  PRIMARY KEY (`ForumAnswerID`),
  KEY `QuestionID` (`QuestionID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `forumquestion`
--

CREATE TABLE IF NOT EXISTS `forumquestion` (
  `ForumQuestionID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `ArticleID` int(11) NOT NULL,
  `Question` text NOT NULL,
  `Keyword` varchar(80) NOT NULL,
  PRIMARY KEY (`ForumQuestionID`),
  KEY `UserID` (`UserID`),
  KEY `ArticleID` (`ArticleID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mcq`
--

CREATE TABLE IF NOT EXISTS `mcq` (
  `MCQID` int(11) NOT NULL AUTO_INCREMENT,
  `Duration` time(5) NOT NULL,
  `ArticleID` int(11) NOT NULL,
  `Title` varchar(150) NOT NULL,
  PRIMARY KEY (`MCQID`),
  KEY `ArticleID` (`ArticleID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `mcq`
--

INSERT INTO `mcq` (`MCQID`, `Duration`, `ArticleID`, `Title`) VALUES
(22, '00:00:00.00000', 6, 'Array Part 1'),
(26, '00:00:00.00000', 11, 'Part 1');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE IF NOT EXISTS `question` (
  `QuestionID` int(11) NOT NULL AUTO_INCREMENT,
  `MCQID` int(11) NOT NULL,
  `Hint` varchar(200) DEFAULT NULL,
  `AnswerChoice` text NOT NULL,
  `QuestionDisplay` text NOT NULL,
  PRIMARY KEY (`QuestionID`),
  KEY `MCQID` (`MCQID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`QuestionID`, `MCQID`, `Hint`, `AnswerChoice`, `QuestionDisplay`) VALUES
(8, 22, NULL, '0', 'Array index starts from?'),
(9, 22, NULL, '2', 'A={1,2,3,4}; A[1]=?'),
(10, 22, NULL, '2', 'B={5,4,3,2}; B[5]=?'),
(11, 22, NULL, '2', 'Which one is invalid?'),
(12, 22, NULL, '0', 'Which one is correct syntax?');

-- --------------------------------------------------------

--
-- Table structure for table `ratemcq`
--

CREATE TABLE IF NOT EXISTS `ratemcq` (
  `RateMCQID` int(11) NOT NULL,
  `MCQID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `Rating` int(11) NOT NULL,
  PRIMARY KEY (`RateMCQID`),
  KEY `MCQID` (`MCQID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE IF NOT EXISTS `rating` (
  `RatingID` int(11) NOT NULL AUTO_INCREMENT,
  `ArticleID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `VideoQuality` int(11) NOT NULL,
  `TeachingTechnique` int(11) DEFAULT NULL,
  `Materials` int(4) DEFAULT NULL,
  `AvgRating` float NOT NULL,
  PRIMARY KEY (`RatingID`),
  UNIQUE KEY `ArticleID` (`ArticleID`),
  KEY `UserID` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE IF NOT EXISTS `subject` (
  `SubjectID` int(11) NOT NULL AUTO_INCREMENT,
  `SubjectName` varchar(150) NOT NULL,
  PRIMARY KEY (`SubjectID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`SubjectID`, `SubjectName`) VALUES
(1, 'Computer Science and Engineering'),
(2, 'Bachelor of Business and Administration '),
(3, 'Mathematics '),
(4, 'Pharmacy'),
(5, 'Physics');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(50) NOT NULL,
  `Name` varchar(80) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Email` varchar(80) NOT NULL,
  `AlternativeEmail` varchar(80) DEFAULT NULL,
  `DateOfBirth` date NOT NULL,
  `SecretQuestion` varchar(250) NOT NULL,
  `SecretAnswer` varchar(250) NOT NULL,
  `ContactNo` varchar(20) NOT NULL,
  `AlternativeContactNo` varchar(20) DEFAULT NULL,
  `Institution` varchar(150) DEFAULT NULL,
  `DepartmentName` varchar(150) DEFAULT NULL,
  `Nationality` varchar(50) NOT NULL,
  `Profession` varchar(150) NOT NULL,
  `Picture` varchar(300) DEFAULT NULL,
  `UserRoleID` int(11) NOT NULL,
  PRIMARY KEY (`UserID`),
  UNIQUE KEY `UserName` (`UserName`),
  KEY `UserRoleID` (`UserRoleID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `UserName`, `Name`, `Password`, `Email`, `AlternativeEmail`, `DateOfBirth`, `SecretQuestion`, `SecretAnswer`, `ContactNo`, `AlternativeContactNo`, `Institution`, `DepartmentName`, `Nationality`, `Profession`, `Picture`, `UserRoleID`) VALUES
(2, 'abir', 'Syed Nayeem Ridwan', 'abir', 'nayeemridwanabir@gmail.com', NULL, '2011-03-31', 'mother', 'shahnaz', '01672798267', NULL, 'NSU', 'ECE', 'BD', 'teacher', '', 2),
(5, 'Zitu', 'Mosharof Hossain', 'zitu', 'zituxn@gmail.com', 'mosharof_zitu@yahoo.com', '1990-05-21', 'girlfriend', 'shukta', '01719331761', '', 'NSU', 'ECE', 'Bangladeshi', 'Bekar', '', 1),
(7, 'Musfique', 'Musfique Ahmed', 'mus', 'musfique4u@yahoo.com', '', '1991-01-05', 'father', 'mesbah', '01911903854', '', 'NSU', 'ECE', 'Bangladeshi', 'student', 'Desert.jpg', 1),
(8, 'azhar', 'Md. Azhar Uddin', 'azhar', 'azhar_8800@yahoo.com', 'azhar_nsu@gmail.com', '1990-09-15', 'father', 'belal', '01673295025', '', 'NSU', 'ECE (CSE)', 'Bangladeshi', 'Student', '', 2),
(23, 'musfique2', 'Musfique Ahmed', '123', 'musfique4u@yahoo.com', '', '2015-01-01', 'father', 'mesbah', '01911903854', '', 'NSU', 'ECE', 'Bangladeshi', 'Teacher', 'upload/', 1),
(26, 'Admin1', 'Shamima Yasmin', '1234', 'brishti293@yahoo.com', NULL, '2015-04-23', 'A', 'B', '012345678', NULL, 'nsu', 'cse', 'Bangladeshi', 'Student', NULL, 3);

-- --------------------------------------------------------

--
-- Table structure for table `userrole`
--

CREATE TABLE IF NOT EXISTS `userrole` (
  `UserRoleID` int(11) NOT NULL AUTO_INCREMENT,
  `RoleName` varchar(80) NOT NULL,
  `RolePriority` int(11) NOT NULL,
  PRIMARY KEY (`UserRoleID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `userrole`
--

INSERT INTO `userrole` (`UserRoleID`, `RoleName`, `RolePriority`) VALUES
(1, 'student', 1),
(2, 'teacher', 2),
(3, 'admin', 3);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE IF NOT EXISTS `wishlist` (
  `WishListID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `ArticleID` int(11) NOT NULL,
  `Dated` date DEFAULT NULL,
  `LastNotified` date DEFAULT NULL,
  PRIMARY KEY (`WishListID`),
  KEY `UserID` (`UserID`),
  KEY `ArticleID` (`ArticleID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`WishListID`, `UserID`, `ArticleID`, `Dated`, `LastNotified`) VALUES
(8, 8, 4, NULL, NULL),
(9, 2, 10, NULL, NULL),
(10, 2, 11, NULL, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`ChapterID`) REFERENCES `chapter` (`ChapterID`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`PreviousArticleID`) REFERENCES `article` (`ArticleID`),
  ADD CONSTRAINT `article_ibfk_3` FOREIGN KEY (`NextArticleID`) REFERENCES `article` (`ArticleID`),
  ADD CONSTRAINT `article_ibfk_4` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_1` FOREIGN KEY (`SubjectID`) REFERENCES `subject` (`SubjectID`);

--
-- Constraints for table `bookmark`
--
ALTER TABLE `bookmark`
  ADD CONSTRAINT `bookmark_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `bookmark_ibfk_2` FOREIGN KEY (`ArticleID`) REFERENCES `article` (`ArticleID`);

--
-- Constraints for table `changeuserrole`
--
ALTER TABLE `changeuserrole`
  ADD CONSTRAINT `changeuserrole_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `chapter`
--
ALTER TABLE `chapter`
  ADD CONSTRAINT `chapter_ibfk_1` FOREIGN KEY (`BookID`) REFERENCES `book` (`BookID`);

--
-- Constraints for table `choice`
--
ALTER TABLE `choice`
  ADD CONSTRAINT `choice_ibfk_1` FOREIGN KEY (`QuestionID`) REFERENCES `question` (`QuestionID`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`ArticleID`) REFERENCES `article` (`ArticleID`),
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `forumanswer`
--
ALTER TABLE `forumanswer`
  ADD CONSTRAINT `forumanswer_ibfk_1` FOREIGN KEY (`QuestionID`) REFERENCES `question` (`QuestionID`),
  ADD CONSTRAINT `forumanswer_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `forumquestion`
--
ALTER TABLE `forumquestion`
  ADD CONSTRAINT `forumquestion_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `forumquestion_ibfk_2` FOREIGN KEY (`ArticleID`) REFERENCES `article` (`ArticleID`);

--
-- Constraints for table `mcq`
--
ALTER TABLE `mcq`
  ADD CONSTRAINT `mcq_ibfk_1` FOREIGN KEY (`ArticleID`) REFERENCES `article` (`ArticleID`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`MCQID`) REFERENCES `mcq` (`MCQID`);

--
-- Constraints for table `ratemcq`
--
ALTER TABLE `ratemcq`
  ADD CONSTRAINT `ratemcq_ibfk_1` FOREIGN KEY (`MCQID`) REFERENCES `mcq` (`MCQID`),
  ADD CONSTRAINT `ratemcq_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`ArticleID`) REFERENCES `article` (`ArticleID`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`UserRoleID`) REFERENCES `userrole` (`UserRoleID`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`ArticleID`) REFERENCES `article` (`ArticleID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
