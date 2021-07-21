-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2021 at 09:45 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_isodec`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `pro_insertAbout` (IN `p_about_type` INT(11), IN `p_img` VARCHAR(255), IN `p_img_description` LONGTEXT, IN `p_details` LONGTEXT, IN `p_user_id` INT(11))  BEGIN
Declare p_count int(11);
SET p_count=(SELECT count(*) FROM tbl_about WHERE about_type = p_about_type);

IF p_count=0 THEN
INSERT INTO tbl_about (
about_type,
img,
img_description,
details,
created_by,
created_date,
modified_by,
modified_date
) VALUES (
p_about_type,
p_img,
p_img_description,
p_details,
p_user_id,
NOW(),
p_user_id,
NOW()
);
ELSEIF p_count=1 THEN
UPDATE tbl_about SET 
img=p_img,
img_description=p_img_description,
details=p_details,
modified_by=p_user_id,
modified_date=NOW()
WHERE about_type=p_about_type;

END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pro_insertProgramme` (IN `p_prog_type` INT(11), IN `p_img` VARCHAR(255), IN `p_img_description` LONGTEXT, IN `p_details` LONGTEXT, IN `p_user_id` INT(11))  BEGIN
Declare p_count int(11);
SET p_count=(SELECT count(*) FROM tbl_programmes WHERE programme_type  = p_prog_type);

IF p_count=0 THEN
INSERT INTO tbl_programmes (
programme_type,
img,
img_description,
details,
created_by,
created_date,
modified_by,
modified_date
) VALUES (
p_prog_type,
p_img,
p_img_description,
p_details,
p_user_id,
NOW(),
p_user_id,
NOW()
);
ELSEIF p_count=1 THEN
UPDATE tbl_programmes SET 
img=p_img,
img_description=p_img_description,
details=p_details,
modified_by=p_user_id,
modified_date=NOW()
WHERE programme_type=p_prog_type;

END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pro_selectAbout` (IN `aboutType` INT(11))  BEGIN
SELECT * FROM tbl_about WHERE about_type=aboutType;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pro_selectProgramme` (IN `progType` INT(11))  BEGIN
SELECT * FROM tbl_programmes WHERE programme_type=progType;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `about_id` int(11) NOT NULL,
  `about_type` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `img_description` longtext NOT NULL,
  `details` longtext NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_about`
--

INSERT INTO `tbl_about` (`about_id`, `about_type`, `img`, `img_description`, `details`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(7, 1, '60f80804de96d.jpeg', 'vision img title', '<p>testing vision mtn momo<br></p>', 1, '2021-07-17 22:11:46', 1, '2021-07-21 11:41:56'),
(8, 2, '', 'vision img title', '<p>vision test<br></p>', 1, '2021-07-18 18:25:24', 1, '2021-07-21 09:08:11'),
(9, 3, '', 'vision img title', '<p>testing vision mtn collabo<br></p>', 1, '2021-07-18 20:08:50', 1, '2021-07-19 08:08:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blogs`
--

CREATE TABLE `tbl_blogs` (
  `blog_id` int(11) NOT NULL,
  `blog_code` varchar(255) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_img` int(11) NOT NULL,
  `blog_details` longtext NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_documents`
--

CREATE TABLE `tbl_documents` (
  `document_id` int(11) NOT NULL,
  `document_title` varchar(255) NOT NULL,
  `document_name` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `news_id` int(11) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `news_detail` longtext NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_programmes`
--

CREATE TABLE `tbl_programmes` (
  `programme_id` int(11) NOT NULL,
  `programme_type` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `img_description` varchar(255) NOT NULL,
  `details` longtext NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_programmes`
--

INSERT INTO `tbl_programmes` (`programme_id`, `programme_type`, `img`, `img_description`, `details`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(1, '1', '', 'essential services image', '<p>essential services<br></p>', 1, '2021-07-21 07:03:22', 1, '2021-07-21 15:17:56'),
(2, '2', '60f84114e5361.jpg', 'policy support image', '<p>policy support<br></p>', 1, '2021-07-21 11:14:46', 1, '2021-07-21 15:45:24'),
(3, '3', '', 'policy support image', '<p>poicy support details<br></p>', 1, '2021-07-21 15:48:17', 1, '2021-07-21 15:48:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `tbl_documents`
--
ALTER TABLE `tbl_documents`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `tbl_programmes`
--
ALTER TABLE `tbl_programmes`
  ADD PRIMARY KEY (`programme_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_documents`
--
ALTER TABLE `tbl_documents`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_programmes`
--
ALTER TABLE `tbl_programmes`
  MODIFY `programme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
