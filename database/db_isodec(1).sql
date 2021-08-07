-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2021 at 06:08 PM
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `pro_insertBlog` (IN `p_blog_code` VARCHAR(255), IN `p_blog_details` LONGTEXT, IN `p_blog_img` VARCHAR(255), IN `p_img_description` VARCHAR(255), IN `p_blog_title` VARCHAR(255), IN `p_user` INT(11))  BEGIN
Declare p_count int(11);
SET p_count=(SELECT count(*) FROM tbl_blogs WHERE blog_code  = p_blog_code);
IF p_count=0 THEN
INSERT INTO `tbl_blogs`
(`blog_code`, 
`blog_title`,
`blog_img`, 
`img_description`, 
`blog_details`, 
`created_by`, 
`created_date`, 
`modified_by`, 
`modified_date`) 
VALUES (p_blog_code,
p_blog_title,
p_blog_img,
p_img_description,
p_blog_details,
p_user,
NOW(),
p_user,
NOW());

ELSEIF p_count=1 THEN
UPDATE `tbl_blogs` SET `blog_title`=p_blog_title,
`blog_img`=p_blog_img, `img_description`=p_img_description, `blog_details`=p_blog_details,
`modified_by`=p_user,`modified_date`=NOW() WHERE `blog_code`=p_blog_code;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pro_insertEssentials` (IN `p_post_type` INT(11), IN `p_post_title` VARCHAR(255), IN `p_post_code` VARCHAR(255), IN `p_post_details` LONGTEXT, IN `p_post_img` VARCHAR(255), IN `p_img_description` VARCHAR(255), IN `p_user` INT(11))  BEGIN
Declare p_count int(11);
SET p_count=(SELECT count(*) FROM tbl_essentials WHERE post_code  = p_post_code);
IF p_count=0 THEN
INSERT INTO `tbl_essentials`
(
`post_type`, 
`post_code`, 
`post_title`,
`post_img`, 
`img_description`, 
`post_details`, 
`created_by`, 
`created_date`, 
`modified_by`, 
`modified_date`) 
VALUES (
p_post_type,
p_post_code,
p_post_title,
p_post_img,
p_img_description,
p_post_details,
p_user,
NOW(),
p_user,
NOW());
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pro_insertEvents` (IN `p_event_code` VARCHAR(255), IN `p_event_details` LONGTEXT, IN `p_event_img` VARCHAR(255), IN `p_event_type` INT(11), IN `p_event_title` VARCHAR(255), IN `p_webinar_url` VARCHAR(255), IN `p_event_date` DATE, IN `p_event_time` TIME, IN `p_user` INT(11))  BEGIN
Declare p_count int(11);
SET p_count=(SELECT count(*) FROM tbl_events WHERE event_code  = p_event_code);
IF p_count=0 THEN
INSERT INTO `tbl_events`
(`event_type`, 
`event_code`, 
`event_title`,
`event_img`,  
`event_details`, 
`webinar_url`, 
`event_date`, 
`event_time`, 
`created_by`, 
`created_date`, 
`modified_by`, 
`modified_date`) 
VALUES (
p_event_type,
p_event_code,
p_event_title,
p_event_img,
p_event_details,
p_webinar_url,
p_event_date,
p_event_time,
p_user,
NOW(),
p_user,
NOW());

ELSEIF p_count=1 THEN
UPDATE `tbl_events` SET `event_title`=p_event_title,
`event_img`=p_event_img, `event_type`=p_event_type, `event_details`=p_event_details,
`webinar_url`=p_webinar_url, `event_date`=p_event_date, `event_time`=p_event_time,
`modified_by`=p_user,`modified_date`=NOW() WHERE `event_code`=p_event_code;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pro_insertMedia` (IN `p_media_type` INT(11), IN `p_media_title` VARCHAR(255), IN `p_file_name` VARCHAR(255), IN `p_user` INT(11))  BEGIN
Declare p_count int(11);

INSERT INTO `tbl_media`
(
`media_type`, 
`media_title`, 
`file_name`,
`created_by`, 
`created_date`,  
`modified_by`, 
`modified_date`) 
VALUES (
p_media_type,
p_media_title,
p_file_name,
p_user,
NOW(),
p_user,
NOW());
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pro_insertNews` (IN `p_news_code` VARCHAR(255), IN `p_news_details` LONGTEXT, IN `p_news_img` VARCHAR(255), IN `p_img_description` VARCHAR(255), IN `p_news_title` VARCHAR(255), IN `p_user` INT(11))  BEGIN
Declare p_count int(11);
SET p_count=(SELECT count(*) FROM tbl_news WHERE news_code  = p_news_code);
IF p_count=0 THEN
INSERT INTO `tbl_news`
(`news_code`, 
`news_title`,
`news_img`, 
`img_description`, 
`news_details`, 
`created_by`, 
`created_date`, 
`modified_by`, 
`modified_date`) 
VALUES (p_news_code,
p_news_title,
p_news_img,
p_img_description,
p_news_details,
p_user,
NOW(),
p_user,
NOW());

ELSEIF p_count=1 THEN
UPDATE `tbl_news` SET `news_title`=p_news_title,
`news_img`=p_news_img, `img_description`=p_img_description, `news_details`=p_news_details,
`modified_by`=p_user,`modified_date`=NOW() WHERE `news_code`=p_news_code;
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

CREATE DEFINER=`root`@`localhost` PROCEDURE `pro_insertSocialMedia` (IN `p_entry_code` VARCHAR(255), IN `p_facebook_url` VARCHAR(255), IN `p_twitter_url` VARCHAR(255), IN `p_skype_url` VARCHAR(255), IN `p_linkedIn_url` VARCHAR(255), IN `p_instagram_url` VARCHAR(255), IN `p_user` INT(11))  BEGIN
Declare p_count int(11);
SET p_count=(SELECT count(*) FROM tbl_social_media WHERE entry_code  = p_entry_code);
IF p_count=0 THEN
INSERT INTO `tbl_social_media`
(`entry_code`, 
`facebook_url`, 
`twitter_url`,
`skype_url`,
`linkedIn_url`,
`instagram_url`,
`created_by`, 
`created_date`, 
`modified_by`, 
`modified_date`) 
VALUES (
p_entry_code,
p_facebook_url,
p_twitter_url,
p_skype_url,
p_linkedIn_url,
p_instagram_url,
p_user,
NOW(),
p_user,
NOW());

ELSEIF p_count=1 THEN
UPDATE `tbl_social_media` SET `facebook_url`=p_facebook_url,
`twitter_url`=p_twitter_url, `skype_url`=p_skype_url, `linkedIn_url`=p_linkedIn_url,
`instagram_url`=p_instagram_url, `modified_by`=p_user,`modified_date`=NOW() WHERE `entry_code`=p_entry_code;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pro_selectAbout` (IN `aboutType` INT(11))  BEGIN
SELECT * FROM tbl_about WHERE about_type=aboutType;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pro_selectProgramme` (IN `progType` INT(11))  BEGIN
SELECT * FROM tbl_programmes WHERE programme_type=progType;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pro_updateEssentials` (IN `p_post_title` VARCHAR(255), IN `p_post_id` INT(11), IN `p_post_details` LONGTEXT, IN `p_post_img` VARCHAR(255), IN `p_img_description` VARCHAR(255), IN `p_user` INT(11))  BEGIN
UPDATE `tbl_essentials` SET `post_title`=p_post_title,
`post_img`=p_post_img, `img_description`=p_img_description, `post_details`=p_post_details,
`modified_by`=p_user,`modified_date`=NOW() WHERE `post_id`=p_post_id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `pro_updateMedia` (IN `p_media_title` VARCHAR(255), IN `p_file_name` VARCHAR(255), IN `p_user` INT(11), IN `p_media_id` INT(11))  BEGIN
UPDATE `tbl_media` SET `media_title`=p_media_title,
`file_name`=p_file_name, `modified_by`=p_user,`modified_date`=NOW() WHERE `media_id`=p_media_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `event_status`
--

CREATE TABLE `event_status` (
  `event_status_id` int(11) NOT NULL,
  `event_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_status`
--

INSERT INTO `event_status` (`event_status_id`, `event_status`) VALUES
(0, 'closed'),
(1, 'upcoming');

-- --------------------------------------------------------

--
-- Table structure for table `event_types`
--

CREATE TABLE `event_types` (
  `event_type_id` int(11) NOT NULL,
  `event_type_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_types`
--

INSERT INTO `event_types` (`event_type_id`, `event_type_name`) VALUES
(1, 'General'),
(2, 'Webinar');

-- --------------------------------------------------------

--
-- Table structure for table `media_types`
--

CREATE TABLE `media_types` (
  `media_type_id` int(11) NOT NULL,
  `media_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `media_types`
--

INSERT INTO `media_types` (`media_type_id`, `media_name`) VALUES
(1, 'Picture'),
(2, 'Video'),
(3, 'Document');

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
(7, 1, '60fa98bf18add.jpg', 'ISODEC works in solidarity with those striving for social justice towards a life of dignity by promoting rights and accountability.', '<p>\r\n</p><table cellspacing=\"0\" cellpadding=\"7\"><tbody><tr><td><h4><strong>ISODEC\r\n works in solidarity with those striving for social justice towards a \r\nlife of dignity by promoting rights and accountability\'</strong></h4>\r\n</td></tr><tr><td>\r\n<h3><font color=\"#3984C6\"><strong>CORE VALUES</strong></font></h3>\r\n<ul><li>\r\n<p>Equity</p>\r\n</li><li>\r\n<p>Transparency and Accountability</p>\r\n</li><li>\r\n<p>Human Rights and Dignity for All</p>\r\n</li><li>\r\n<p>Participation</p><p><br></p>\r\n</li></ul></td>\r\n</tr><tr><td>\r\n<h3><font color=\"#3984C6\"><strong>OUR SERVICES AND CLIENTS</strong></font></h3>\r\n<ul><li>\r\n<p>Defending and promoting public goods (water, education and health) and basic human rights</p>\r\n</li><li>\r\n<p>Promoting accountable use of public resources</p>\r\n</li><li>\r\n<p>Promoting alternative macroeconomics</p>\r\n</li><li>\r\n<p>Promoting responsible regional integration</p>\r\n</li></ul><p>Our target groups include, policy makers, duty bearers at national and international levels, the civil society</p>\r\n</td>\r\n</tr><tr><td>\r\n<h3><font color=\"#3984C6\"><strong>OUR BENEFITS TO SOCIETY</strong></font></h3>\r\n<ul><li>\r\n<p>Building a strong civil society</p>\r\n</li><li>\r\n<p>Nurturing an accountable government</p>\r\n</li><li>\r\n<p>Widening the political and social space for the voice of civil \r\nsociety in national and local policy making processes and the \r\nconsideration of national development alternatives</p>\r\n</li></ul></td>\r\n</tr><tr><td>\r\n<h3><font color=\"#3984C6\"><strong>OUR UNIQNESS</strong></font></h3>\r\n<ul><li>\r\n<p>We are national in character, physically present in five regions in the country</p>\r\n</li></ul><ul><li>\r\n<p>We have a strong grassroots base – working through the District Assemblies, Community Based Organisations and Local NGOs</p>\r\n</li><li>\r\n<p>We have the ability to engage in policy discourse at all levels – International, National and the grassroots level</p>\r\n</li><li>\r\n<p>We work through specialized affiliate organisations established by us</p>\r\n</li><li>\r\n<p>We have partner organisations in the West Africa sub region</p>\r\n</li><li>\r\n<p>We belief and work to promote social justice, equity and human rights</p>\r\n</li><li>\r\n<p>We facilitate and nurture national networks and coalitions</p>\r\n</li><li>\r\n<p>We combine service delivery with advocacy at all levels</p>\r\n</li></ul></td>\r\n</tr><tr><td>\r\n<h3><font color=\"#3984C6\"><strong>OUR POTENTIALS</strong></font></h3>\r\n<ul><li>\r\n<p>Providing strong link between Civil Society Organisations in Ghana and in the Sub region.</p>\r\n</li><li>\r\n<p>Ability to organize and facilitate discussion platforms on any development related issues at all levels</p>\r\n</li><li>\r\n<p>Effectively linking the grassroots to global policy issues</p>\r\n</li><li>\r\n<p>Becoming a lead civil society organizations in extractive issues</p>\r\n</li><li>\r\n<p>Develop the capacity to monitor full implementation of Economic, Social and Cultural Rights by the State</p>\r\n</li></ul></td></tr></tbody></table>', 1, '2021-07-17 22:11:46', 1, '2021-07-29 00:00:00'),
(8, 2, '60fa9acd4089e.jpg', 'title', '<p class=\"rtejustify\">In 2000 ISODEC took a strategic decision to \r\ncombine service delivery with policy and people centered advocacy. \r\nHence, a research and advocacy programme was initiated aimed at \r\npromoting national development alternatives principally in Ghana and, to\r\n some extent, in the West Africa sub-region. This programme, sought to: \r\nreview the neoliberal policy measures promoted largely by the \r\ninternational donor community and its impact on the poor; promote \r\naccountability by the state to its citizens; instill civil activism \r\nthrough rights awareness creation, rights promotion and defence and \r\neconomic literacy; and promote social equity through the responsible use\r\n of public resources.\'</p>\r\n<p class=\"rtejustify\">ISODEC created and nuttured three affiliate organisations. These are the <strong>Centre for Public Interest Law (CEPIL),</strong>\r\n CEPIL’s objectives are to promote the public interest wherever these \r\nare violated by those with, or in, power (be they governmental or \r\ncorporate), and to defend the interest of the poor. CEPIL has provided \r\nlegal support services to mining communities in the country fighting \r\nunjust treatment by mining companies. They are also active in defence of\r\n prisoners’ rights and the right of squatters to shelter. CEPIL provides\r\n general legal advice services and internship for law students. <strong>The Cedi Finance Foundation (CFF) </strong>is\r\n a micro-finance institution currently operating in the Kumasi \r\nMetropolis. It provides largely micro-credit services to very small \r\nscale entrepreneurs, mainly women. It aspires to register as a Savings \r\nand Loans Company. <strong>Public Agenda</strong>: Public Agenda is a \r\nnewspaper, which currently publishes twice a week. Its objective is to \r\npromote democratic participation, articulate social justice principles \r\nand defend the poor.</p>\r\n<p class=\"rtejustify\">Within the West Africa Region, ISODEC has entered \r\ninto a network relationship with six other civil society organizations \r\nin the sub region to create a regional forum called West Africa Right \r\nBased Advocacy Network (WARBAN). The organizations are: Alternatives – \r\nNiger, CAD – Mali, CPPC – Nigeria, ORCADE – Burkina Faso, NMJD – Sierra \r\nLeone and ASPE - in Senegal.</p>\r\n<p class=\"rtejustify\">Our work on the national annual budget over the \r\nyears has contributed to creating the space for public input into the \r\nbudgeting process at the national level. It has also compelled the \r\ngovernment to take to organising regional platforms to discuss the \r\nnational budget with the citizenry. In addition, our budget work \r\nprovides the platform for tracking public expenditure from the national \r\nthrough to district to community levels and it also provides budget \r\ninformation services to promote pro-poor and equitable impacts of the \r\nbudget.</p>\r\n<p class=\"rtejustify\">At the health front, our work on the field under \r\nour Family Reproductive Health Programme and our involvement in the \r\nactivities of the Alliance for Reproductive Health Rights has \r\ncontributed to the reviewing of the National Health Insurance Scheme to \r\noffer exemption to children less than 18 years. In addition our field \r\nwork has contributed immensely to the huge community response to \r\nregister with the NHIS in the districts where we operated</p>\r\n<p class=\"rtejustify\">Our involvement with the Coalition for Universal \r\nAccess to Anti-Retroviral Treatment (UCARRT) to lead the campaign for \r\nfree universal access to ART has contributed to the expansion of \r\ntreatment and testing centres from Accra to all the regions</p>\r\n<p class=\"rtejustify\">Our work with Northern Network for Education \r\nDevelopment (NNED) and Ghana National Education Campaign Coalition \r\n(GNECC) has resulted in the expansion of the Education Sector Annual \r\nReview to the district and regional levels as against the former \r\npractice of holding only one review at the national capital</p>\r\n<p class=\"rtejustify\">Our Girl Child Education Programme in \r\ncollaboration with 8 District Assemblies (DAs) has contributed to \r\ninfluencing their district budgeting. Now there is a separate budget \r\nallocation for Girl Child Education activities in their respective \r\ndistricts. This programme has contributed immensely to the \r\nimplementation of government policy on girl’s education. This programme \r\nhas been repackaged under the name The Ambassador Girls Scholarship \r\nProgramme (AGSP) and it is been implemented in the Upper East and the \r\nNorthern regions.</p>\r\n<p class=\"rtejustify\">For almost six years ISODEC participated in rural \r\nwater and sanitation delivery in the country Our partnership with Water \r\nAid began a process that led to the creation of the Mole Series in the \r\n1990s; an annual national forum for discussion of Water and Sanitation \r\nissues. Principally, the Mole Series paved the way for the Community \r\nWater and Sanitation Agency and the subsequent Community Water and \r\nSanitation Policy in Ghana. In recent years, ISODEC’s involvement and \r\nresearch on the Savelugu water system along with the creation of the \r\nNational Campaign against Water Privatisation (NCAP) resulted in the \r\nchange of government’s initial policy of lease arrangement to the \r\ncurrent management contract. The campaign also compelled the World Bank \r\nto convert a $106,000,000 loan facility meant for the promotion of lease\r\n management to a grant aimed at supporting management contract.</p>\r\n<p class=\"rtejustify\">Our Right Based Advocacy programme has as its \r\nobjective to promote accountability by the state to its citizens, instil\r\n civil activism through rights awareness rights promotion/defence \r\nthrough economic policy and to promote social equity through the \r\nresponsible use of public resources. Within this programme, much \r\nattention was paid to efficient use of the country’s natural resource \r\nrevenue. As a result, we are currently facilitating the CSOs-led Public \r\nWhat You Pay ( PWYP) campaign in Ghana.</p>', 1, '2021-07-18 18:25:24', 1, '2021-07-29 00:00:00'),
(9, 3, '60fa9ece56d46.jpg', 'ISODEC works with many civil society groups, including Research and Advocacy organisations in Ghana although most of the relationships are loose and formed to carry out specific programmes. \' \'', '<p>\r\n</p><table cellspacing=\"0\" cellpadding=\"7\"><tbody><tr><td><p class=\"rtejustify\">We\r\n work with Third World Network (TWN), the Northern Network for \r\nDevelopment (The Network), SEND Foundation, Institute of Policy \r\nAlternatives (IPA) and ISSER in Ghana. Our Centre for Budget Advocacy \r\n(CBA) also works closely with the Institute of Democracy in South Africa\r\n (IDASA) and the International Budget Project (IBP) in Washington both \r\nof whom we have jointly carried out research work on Budget Management \r\nand Fiscal Transparency and PRSPs and Civil Society as well as Save the \r\nChildren–UK.\'</p>\r\n</td></tr><tr><td>\r\n<h4 class=\"rtejustify\"><font color=\"#3984C6\"><strong>JOINT-CAMPAIGNS, LOBBYING, ETC.</strong></font><strong> </strong></h4>\r\n<p class=\"rtejustify\">ISODEC was very instrumental in the formation of \r\nthe Northern Network for Education Development (NNED) and the Ghana \r\nNational Education Campaign Coalition (GNECC), which are leading the \r\ncampaign for Education for All. The Alliance for Reproductive Health \r\nRights (ARHRs) and the Market Access Promotion Network (MAPRONET) are \r\nalso being facilitated and supported by ISODEC and its partners to \r\ncampaign for reproductive rights and promote market access for poor \r\nproducers respectively. ISODEC presently convenes the Publish What You \r\nPay (PWYP) -Ghana Coalition campaigning for transparency in the \r\ngeneration and management of extractive sector revenues; ISODEC \r\nfacilitated the formation of the Ghana Trade and Livelihood Coalition - \r\ncampaigning for the protection of livelihoods of peasant farmers and \r\nsmall scale producers through poverty-responsive trade policy \r\nformulation ISODEC also formed the Coalition for Universal Access to \r\nAnti-Retroviral Treatment. To campaign for the right of HIV/AIDS victim \r\nto universal access to ART We have direct working relationship with the \r\nSave the Children –UK (SC-UK) and the Coalition on the Rights of the \r\nChild on budgets and how they impact the lives of children. We also have\r\n working relations with OXFAM UK, Christian Aid, and Ibis.</p>\r\n<p class=\"rtejustify\">At the sub regional level we have a network \r\nrelation with six civil society organisations under the umbrella name \r\nWest Africa Right Based Advocacy Network.</p>\r\n<p class=\"rtejustify\">ISODEC is the CSOs’ representative on the Ghana EITI multi-stakeholder steering committee.</p>\r\n</td>\r\n</tr><tr><td>\r\n<h4 class=\"rtejustify\"><font color=\"#3984C6\"><strong>NETWORK HOSTING</strong></font></h4>\r\n<p class=\"rtejustify\">We are currently hosting the secretariats of three\r\n networks/coalitions. These are the Greater regional secretariats of \r\nGNECC, the Ghana chapter of PWYP and Oil and Gas Platform.</p></td></tr></tbody></table>', 1, '2021-07-18 20:08:50', 1, '2021-07-29 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blogs`
--

CREATE TABLE `tbl_blogs` (
  `blog_id` int(11) NOT NULL,
  `blog_code` varchar(255) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_img` varchar(255) NOT NULL,
  `img_description` varchar(255) NOT NULL,
  `blog_details` longtext NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_blogs`
--

INSERT INTO `tbl_blogs` (`blog_id`, `blog_code`, `blog_title`, `blog_img`, `img_description`, `blog_details`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(16, 'N1SRswoLeM', 'Ghana\'s Strengthening Accountability Mechanisms - GSAM', '610506c5b2f71.jpg', 'CODESULT Network, in collaboration with the Sefwi Akontombra District Assembly of the Western North Region, is holding a training for Community Development Monitors (CDMs) in the district. A total of 75 CDMs, selected from 15 communities, are taking part ', '<p><em>The training of CDMs is currently taking place across the 50 \r\ndistricts by the GSAM Consortium (CARE International in Ghana, OXFAM in \r\nGhana and <strong>ISODEC</strong>) in collaboration with 25 other civil society organisations and with funding from the USAID.</em></p>\r\n<p>A total of 3,750 citizens selected from 750 communities are being trained to serve as CDMs in their communities.</p>\r\n<p>CDMs are community members who are trained to lead other members to \r\nmonitor and assess projects (i.e. classroom blocks, clinics, toilets, \r\nboreholes, market stalls, etc.) that are being constructed or have been \r\nearmarked for construction in their communities by their respective \r\nDistrict Assemblies. This is to ensure quality projects, get citizens\' \r\nneeds addressed and reduce the possibility of corruption.</p>\r\n<p>The training will, among other things, enhance their knowledge in \r\nDistrict Assemblies\' planning processes, the legal framework for citizen\r\n participation in local governance and the processes for monitoring \r\nprojects and engaging with their assemblies to get their concerns \r\naddressed.</p><p><br><strong></strong></p>', 1, '2021-07-26 14:37:16', 1, '2021-07-31 00:00:00');

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
-- Table structure for table `tbl_essentials`
--

CREATE TABLE `tbl_essentials` (
  `post_id` int(11) NOT NULL,
  `post_type` int(11) NOT NULL,
  `post_code` varchar(255) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_img` varchar(255) NOT NULL,
  `img_description` varchar(255) NOT NULL,
  `post_details` longtext NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_essentials`
--

INSERT INTO `tbl_essentials` (`post_id`, `post_type`, `post_code`, `post_title`, `post_img`, `img_description`, `post_details`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(2, 0, 'CVzZ9voR3d', 'helping upper west', 'WsbXtpTmU0.jpg', 'test', '<p>helping upper west details<br></p>', 1, '2021-07-24 23:41:09', 1, '2021-07-24 23:41:09'),
(5, 1, 'qR0xbvFwMs', 'test', '60fdf98a7cdb4.jpg', 'descripton', 'row5 details', 1, '2021-07-25 14:30:17', 1, '2021-07-25 23:53:46'),
(6, 2, 'QlpMBGDbL1', 'Health test updated', '60fe9508f287b.jpg', 'man woman sitting', '<p>health o health<br></p>', 1, '2021-07-25 22:48:13', 1, '2021-07-26 10:57:13'),
(14, 3, 'Rq2cfTyWip', 'water preservation', '60fe961a5d01b.jpg', 'pic caption', '<p>water preservation content<br></p>', 1, '2021-07-26 09:44:39', 1, '2021-07-26 11:01:46');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_essential_types`
--

CREATE TABLE `tbl_essential_types` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_essential_types`
--

INSERT INTO `tbl_essential_types` (`service_id`, `service_name`) VALUES
(1, 'Education'),
(2, 'Health'),
(3, 'Water');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events`
--

CREATE TABLE `tbl_events` (
  `event_id` int(11) NOT NULL,
  `event_type` int(11) NOT NULL,
  `event_code` varchar(255) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_details` longtext NOT NULL,
  `event_img` varchar(255) NOT NULL,
  `webinar_url` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `event_date` date DEFAULT NULL,
  `event_time` time NOT NULL,
  `events_status` int(11) NOT NULL DEFAULT 1,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_events`
--

INSERT INTO `tbl_events` (`event_id`, `event_type`, `event_code`, `event_title`, `event_details`, `event_img`, `webinar_url`, `location`, `event_date`, `event_time`, `events_status`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(11, 1, 'AHOVsKNi9f68k3rghzQd', 'ISODEC launches election monitoring portal', '<div class=\"field field-name-field-picture-caption field-type-text field-label-hidden\"><div class=\"field-items\"><div class=\"field-item even\">A launch and training workshop on Maaro-Noyine held at Tamale Regal Hotel</div></div></div><p>Tamale,\r\n Dec. 3, GNA – The Integrated Social Development Centre (ISODEC), a \r\nnon-governmental organisation (NGO), has launched the “Maaro-Noyine \r\nElections Monitoring Portal” to help citizens to report and capture \r\npossible electoral violence and other irregularities.</p>\r\n<p>The portal, which can receive both image and audio reports, is to \r\nhelp election managers and peace ambassadors as well as security \r\nagencies to have quick information on such issues for a swift response.</p>\r\n<p>The electoral violence prevention monitoring system formed part of \r\n“Youth Vigilant for Peaceful Elections and Development (Y-VPED) project,\r\n being implemented by a consortium of NGOs, including; ISODEC, TAMA \r\nFoundation and Centre for Conflict Transformation and Peace Studies \r\n(CECOTAPS).<br>\r\n&nbsp;</p>\r\n<p>The project, being implemented in the five Northern regions, with \r\nsupport from the STAR Ghana Foundation, sought to promote peace and \r\ndevelopment in its operational areas.<br>\r\n&nbsp;</p>\r\n<p>Mr Tay Awoosah, Executive Director of ISODEC, said at the launch of \r\nthe portal that the system was developed to help individuals who had \r\naccess to the internet connection to report on possible electoral \r\nviolence and other anomalies for a quick resolution.<br>\r\n&nbsp;</p>\r\n<p>He said the portal would be linked to key stakeholders such as the \r\nElectoral Commission, Police, National Commission for Civic Education, \r\nCommission on Human Rights and Administrative Justice, among others.<br>\r\n&nbsp;</p>\r\n<p>“The portal’s interface has been designed in such a way that anyone \r\nat all with internet connectivity can turn in a report they come across \r\nduring this time of election activities and the idea is to help relevant\r\n institutions to resolve possible misunderstandings as quickly as \r\npossible,” he noted.<br>\r\n&nbsp;</p>\r\nMr Awoosah encouraged members of the public to regularly use the \r\n“Maaro-Noyine Elections Monitoring Portal” to help prevent violence \r\nbefore, during and after the 2020 general elections.', 'o6JlA7ztev2XuQEKIM1r.jpg', '', '', '2021-07-14', '00:00:00', 0, '2021-07-28 12:02:14', 1, '2021-07-31 08:12:11', 1),
(12, 1, 'MaOZilNEUrgG1sbeKfpt', 'general event', '<p><strong>Pursuant to its mission for 2016, the organization, with \r\nsupport from STAR-Ghana has kick-started a project that seeks to enhance\r\n the electoral processes and engagements for peaceful, credible and \r\ninclusive elections towards the long term goal of helping to deepen and \r\nconsolidate democratic governance in Ghana.</strong></p>\r\n<p>The project, Dubbed,’ Influencing Political Party Manifestos to \r\nEnhance Issue-Based 2016 Electioneering, has as its objectives, to \r\nfacilitate political party manifesto alignment with the Sustainable \r\nDevelopment Goals(SDGs) framework in the context of Ghanaian needs.</p>\r\n<p>The project also intends to facilitate dialogue and discussions \r\nbetween political parties and citizens on national development issues \r\nincluding how to tackle the leakage of illicit financial outflows from \r\nGhana to conserve revenues for development.</p>\r\n<p>It further plans to build the capacity of citizens to engage \r\nconstructively and effectively on national and local development issues \r\nthat affect them in their communities using Information Communication \r\nTechnology (ICT), while facilitating the interaction between citizens \r\nand the Members of Parliament in their communities with the aid of ICT.</p>\r\n<p>At an inception meeting in Accra on Thursday, to rally civil society \r\naround the project, the project Co-ordinator, Mr Bernard Anaba explained\r\n that the project will aim at strengthening links between political \r\nparty manifestoes and the Sustainable Development Goals framework as \r\nwell as enhance the capacity of citizens to engage political parties on \r\nissue-based campaigns.</p>\r\n<p>Mr Anaba indicated that the SDGs which have 17 key target areas have \r\nbecome de-facto universal development goals for all around the world. \r\nAside from Ghana’s development needs as a matter, of course, it also \r\nimposes obligations for Ghana’s international commitments to \r\ndevelopment.</p>\r\n<p>According to him, it is important to begin to mainstream strategies \r\nand policies for policy consistencies through individual political party\r\n manifestos and their vision for Ghana.</p>\r\n<p>Mr Anaba disclosed that: “ISODEC will design and deploy an electronic\r\n portal to link citizens and political parties for the purpose of \r\nengagement towards the 2016 general elections, and also constitute a \r\nsteering committee of CSOs from across the 17 SDGs to oversee the \r\nintervention from now till when the 2016 election results are declared.”</p>\r\n<p>He added that each key stakeholder identified will have a dashboard on the portal for the purpose of engagement.</p>\r\n<p>Roles of key stakeholders</p>\r\n<p>Each political party, he expatiated, will have a page on the portal \r\non which to engage with the public. There will be a section for blogs to\r\n enable each party debate issues dear to their party and in connection \r\nwith the upcoming 2016 election. Each party can also receive SMS, \r\npictures and videos as well as upload materials on the party and its \r\nactivities and give announcements to members.</p>\r\n<p>Sitting or aspiring Members of Parliament will also receive SMS and \r\nengage the electorate in the constituency under the campaign “text your \r\nMP.” Mr Anaba said the MPs will use the platform to articulate their \r\nmanifestos, especially on how the 17 SDGs will be mainstreamed in their \r\nmanifestoes.<br>\r\nThe Platform, he stressed will offer opportunity to politicians to speak\r\n to the electorate and all Ghanaians on how they will fund the SDGs when\r\n they assume the mantle of leadership of the country. Emphasis, he said,\r\n will be placed on how they will tackle the tony issue of illicit \r\nfinancial outflows from Ghana in order to free up revenues for funding \r\nthe SDGs</p>\r\n<p>Expected role of CSOs</p>\r\n<p>The Project coordinator further explained that CSOs are expected to \r\nmobilise and organise citizens to put pressure on political parties to \r\nmake their campaign issues-based and also to talk directly to the 17 \r\nSDGs and how they will fund them largely using domestically mobilised \r\nresources, including reducing illicit financial outflows to free up \r\nrevenues for national development.</p>\r\n<p>Expected Role of Citizens</p>\r\n<p>He said Citizens are expected to engage their political parties and \r\nput pressure on them to stay away from personal insults and attacks, as \r\nwell as ethnocentric statements. Again, they will be able to use SMS to \r\nspeak to and ask their aspiring MP questions and debate them on blogs on\r\n topical development issues dear to citizens.</p>', 'sIXwF2drJuLgkoUDMS9N.jpg', '', '', '2021-07-31', '08:06:00', 1, '2021-07-28 12:03:38', 1, '2021-07-31 08:10:33', 1),
(13, 2, 'jvTLEZFxdNcJRO41WV3C', 'The title', '<div class=\"field field-name-body field-type-text-with-summary field-label-hidden\"><div class=\"field-items\"><div class=\"field-item even\"><p>Following\r\n the recent increase in petroleum prices, the Integrated Social \r\nDevelopment Centre (ISODEC), has said the deregulation of the petroleum \r\nsector has so far not benefited Ghanaians.</p>\r\n<p><strong>Petrol recently went up by 4 percent while diesel is up by 2 percent.</strong></p>\r\n<p>Citi News‘ checks in parts of the capital Accra, revealed that a \r\nlitre of petrol which was selling at Ghc3.32 pesewas at some petrol \r\nstations, is now selling at Ghc3.47 pesewas. Also diesel has increased \r\nfrom Ghc3:26 pesewas to Ghc3.33 pesewas. In June 2015, government took a\r\n policy decision to deregulate the pricing of petroleum products in a \r\nbid to sanitize the downstream petroleum sector.</p>\r\n<p>The policy allowed oil marketing companies to fix their own prices, \r\nin an attempt to introduce competition to the ultimate benefit and \r\nprotection of the consumer. But assessing the policy on the Citi \r\nBreakfast Show on Friday, Campaign Coordinator of ISODEC, Dr. Steve \r\nManteaw, described the policy as a farce that benefits only government \r\nand not the people.</p>\r\n<p>“What we have here in the name of deregulation is actually a parody \r\nof deregulation. That is to say so far as we have been on this \r\ntrajectory, all the benefits that have accrued from deregulation have \r\naccrued to government.”</p>\r\n<p>Dr. Manteaw is of the view that the benefits government accrue from \r\nthe deregulation policy are eventually wasted on dubious contracts \r\namongst others. “The benefits accrued to government have been misused \r\nthrough dubious contracting and waste of public resources.”</p>\r\n<p>Dr. Steve Manteaw further accused government of essentially defeating\r\n the purpose of the deregulation policy because of the taxes imposed on \r\npetroleum products last December.</p>\r\n<p>“They are always changing the goal post and they say they are \r\nderegulating; but in actual fact, by imposing taxes they are regulating \r\nthe price level.”<br>\r\nSource: Citifmonline</p>\r\n</div></div></div>', '6KQC8lzMExjaI7DL1PW5.jpg', 'https://zoom.us', '', '2021-07-17', '09:45:00', 0, '2021-07-28 12:23:09', 1, '2021-07-31 08:09:31', 1),
(14, 1, 'Tsw8U6ZYxdjnOlv4L0q1', 'General Webinar', '<p>serious event<br></p>', 'JHlOY3rcIVFoGSKWpivg.png', '', '', '2021-08-07', '08:45:00', 1, '2021-08-06 13:46:48', 1, '2021-08-06 13:46:48', 1),
(15, 2, '7CnUwGbOBE4LKJWrYlsk', 'Webinar testing', '<p>this the webinar url<br></p>', 'gz9w6YF1TClrBORJWADs.jpg', 'https://us05web.zoom.us/j/7117341495?pwd=SWZoNWxwVjVDMkN2K0lOWk1CZWZMZz09', '', '2021-08-14', '07:09:00', 1, '2021-08-06 14:39:02', 1, '2021-08-06 14:39:02', 1),
(16, 1, 'kYmrs2nXbtua6oO5hVDv', 'Maaro.org Launch', '<p>Maaro.org launch.<br></p>', 'lWh6b3oVtBvFaum0MXSg.jpg', '', '', '2021-08-07', '08:09:00', 1, '2021-08-07 00:00:00', 14, '2021-08-07 00:00:00', 14),
(17, 1, 'dIX2DKjcsGm8BevxuwHU', 'test', '<p>testing event<br></p>', 'gHTyKoI2FU6nvXbBEOzJ.jpg', '', 'mariam hotel road', '2021-08-13', '02:00:00', 1, '2021-08-07 00:00:00', 14, '2021-08-07 00:00:00', 14);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_events_registration`
--

CREATE TABLE `tbl_events_registration` (
  `registration_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `othernames` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `organisation` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_events_registration`
--

INSERT INTO `tbl_events_registration` (`registration_id`, `event_id`, `firstname`, `othernames`, `phone`, `email`, `organisation`, `location`) VALUES
(11, 11, 'Fredrick ', 'Adjei Quansah', '', 'kwaadjeei015@gmail.com', 'Forestry Commision', 'Tamale'),
(12, 11, 'Eunice', 'Bamfo', '02045678939', 'bamfo364@gmail.com', 'tafo hospital', 'tafo'),
(13, 13, 'Hannah', 'Assumang', '0246208751', 'hannah@gmail.com', 'Bakery', 'Kentikrono'),
(14, 13, 'Frank', 'Quansah', '0234567890', 'frank@gmail.com', 'Magazine', 'Maakro'),
(15, 12, 'Esther ', 'Asare', '023456789', 'esther@gmail.com', 'Roman Hill', 'Tafo'),
(16, 12, 'Abena ', 'Agyeiwaa', '0240000000', 'abena@gmail.com', 'forestry', 'tamale'),
(17, 12, 'adwoa ', 'konang', '03455555555', 'adwoa@email.com', 'nurse', 'pankrono'),
(18, 12, 'fred', 'kwame', '2323232323232', 'kwame@email', 'Forestry Commision', 'tamale'),
(19, 12, 'akwasi', 'frank', '0234567890', 'akwasi@gmail.com', 'Magazine', 'afrancho'),
(20, 12, 'sham', 'una-abdullai', '0345756565', 'sham@gamil', 'forestry', 'tamlae'),
(21, 12, 'kelvin', 'boadi', '03748393939', 'boadi@gmail', 'pankrono', 'pankrono'),
(22, 12, 'kwame', 'Adjei', '023456789', 'kwame@gmail.com', 'tafo', 'tafo'),
(23, 12, 'fredrick ', 'apau', '04658393939', 'apau@email', 'danlyd', 'tamale'),
(24, 12, 'dlksfjsl', 'jlfjlfja', 'jfdlaajfldj', 'jflajfljf@fjdlfjsl', 'guamani', 'guamani'),
(25, 12, 'papa', 'chris', '94599393849', 'papa@gmail', 'forest', 'tamale'),
(26, 12, 'dennis', 'otneg', '9478373899', 'otneg@gmail.com', 'agric', 'tamale'),
(27, 12, 'oteng', 'felix', '023456789', 'oteng@gmail', 'agric', 'tamale'),
(28, 12, 'eric', 'Battoir', '748499939', 'eric@gmail', 'treeaid', 'damongo'),
(29, 12, 'gabriel', 'asante', '20434390409', 'gabby@gmail', 'forestry', 'accra'),
(30, 12, 'gabriel', 'duoh naah', '945893993', 'gabby@gmail', 'accra', 'accra'),
(31, 14, 'Kwame ', 'Adjei', '02456666', 'kwaadjei@gmail.com', 'f-techs', 'Tamale');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_media`
--

CREATE TABLE `tbl_media` (
  `media_id` int(11) NOT NULL,
  `media_type` int(11) NOT NULL,
  `media_title` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `video_thumbnail` varchar(255) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_media`
--

INSERT INTO `tbl_media` (`media_id`, `media_type`, `media_title`, `file_name`, `video_thumbnail`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(25, 2, 'Girl child education', 'https://www.youtube.com/watch?v=aO7748CsM-0&t=14s', 'e658yFlaBT.jpg', 1, '2021-07-27 17:07:39', 1, '2021-07-31 00:00:00'),
(26, 1, 'we are ', '5wLNgepKJu.jpeg', '', 1, '2021-07-28 13:48:00', 1, '2021-07-30 00:00:00'),
(34, 0, 'thesing\'', 'https://getbootstrap.com/docs/4.0/utilities/colors/', 'qktGg9n5Uc.jpg', 1, '2021-07-30 00:00:00', 1, '2021-07-30 00:00:00'),
(35, 3, 'document name', 'document-name.pdf', '', 1, '2021-07-30 00:00:00', 1, '2021-07-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `news_id` int(11) NOT NULL,
  `news_code` varchar(255) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `news_img` varchar(255) NOT NULL,
  `img_description` varchar(255) NOT NULL,
  `news_details` longtext NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`news_id`, `news_code`, `news_title`, `news_img`, `img_description`, `news_details`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(25, 'RgMS06jwDr', '40-YEAR DEV\'T PLAN WILL SUFFER UNDER NPP – ISODEC ', '6102cbbeca450.jpg', '', '<p><strong>The newly launched long term national development plan might \r\nnot be implemented if the flagbearer of the opposition New Patriotic \r\nParty (NPP), Nana Akufo Addo emerge as the president of Ghana after \r\n2016.</strong></p>\r\n<p>This was revealed by the Integrated Social Development Center \r\n(ISODEC), which claims that the NPP flag bearer is not in support of a \r\nnational development plan.</p>\r\n<p>Campaign Coordinator for ISODEC, Steve Manteaw told <strong>Citi News</strong>, Akufo Addo is convinced a long term development plan will return Ghana to what he terms, “socialist economic planning.”</p>\r\n<p>“I am very much aware that the NPP flag bearer, Nana Akufo Addo does \r\nnot buy into this idea. As at 2012, we had an encounter with him and he \r\nhad convincing reason why we should not be governed by a long-term \r\ndevelopment plan. His view is that a long-term development plan for \r\nGhana will return us to the command type of socialist economic planning \r\nand he thinks that people should be free to provide whatever manifesto \r\nthey want to be guided by and carry it through,” he noted.</p>\r\n<p>Manteaw however believes that the long term development plan can work\r\n only if the plans are restricted to only broad national aspirations.</p>\r\n<p>He said: “I think what is being proposed is not a document that will \r\nbe very detailed in terms of how this country must be governed. What is \r\nbeing proposed is a broad development framework that sets our national \r\ndevelopment priorities. You may want to liken this to the Millennium \r\nDevelopment Goals or its successor programmes. So it sets the broad goal\r\n and then political competition will take place within that framework in\r\n terms of who has the best strategy to take this country to where we \r\nwant to get to by 2040, the plan actually should be very broad.”</p>\r\n<p>President John Mahama on Tuesday launched a programme to kickstart the preparation of a <strong><a href=\"http://4cd.e16.myftpupload.com/2015/08/04/national-devt-plan-must-devise-strategy-to-boost-growth-mahama/\" target=\"_blank\">long-term National Development Plan</a></strong> for the country today.</p>\r\n<p>The plan is expected to span within a period of 40 years.</p>', 1, '2021-07-29 00:00:00', 1, '2021-07-29 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_our_work`
--

CREATE TABLE `tbl_our_work` (
  `our_work_id` int(11) NOT NULL,
  `our_work_title` varchar(255) NOT NULL,
  `our_work_description` longtext NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_our_work`
--

INSERT INTO `tbl_our_work` (`our_work_id`, `our_work_title`, `our_work_description`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(2, 'testing', '<p>testing the <b>page</b><br></p>', 1, '0000-00-00 00:00:00', 1, '0000-00-00 00:00:00');

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
(1, '1', '60fab68357987.jpg', 'Caption economic justice test 2', '<p>ISODEC believes state security agencies cannot be expected to do a good \r\njob in investigating corruption issues when appointments to top jobs in \r\nthe agencies are politicized.\r\n</p>', 1, '2021-07-21 07:03:22', 1, '2021-07-23 12:30:59'),
(2, '2', '60f84114e5361.jpg', 'policy support image', '<p>policy support<br></p>', 1, '2021-07-21 11:14:46', 1, '2021-07-21 15:45:24'),
(3, '3', '', 'policy support image', '<p>poicy support details<br></p>', 1, '2021-07-21 15:48:17', 1, '2021-07-21 15:48:17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_social_media`
--

CREATE TABLE `tbl_social_media` (
  `social_media_id` int(11) NOT NULL,
  `entry_code` varchar(255) NOT NULL,
  `facebook_url` varchar(255) NOT NULL,
  `twitter_url` varchar(255) NOT NULL,
  `skype_url` varchar(255) NOT NULL,
  `linkedIn_url` varchar(255) NOT NULL,
  `instagram_url` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_social_media`
--

INSERT INTO `tbl_social_media` (`social_media_id`, `entry_code`, `facebook_url`, `twitter_url`, `skype_url`, `linkedIn_url`, `instagram_url`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(1, '123', 'https://web.facebook.com/Integrated-Social-Development-Centre-ISODEC-439240326098224/?_rdc=1&_rdr', 'https://twitter.com', 'https://skype.com', 'https://linkedIn.com/isodec', 'https://instagram.com', '2021-07-28 07:28:12', 1, '2021-07-28 08:40:34', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `othernames` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `firstname`, `othernames`, `user_email`, `phone`, `user_password`, `created_by`, `created_date`, `modified_by`, `modified_date`) VALUES
(12, 'Fredrick', 'Adjei Quansah', 'isodec@super', '0246208751', '$2y$10$V/88F6sSBRddKEnSDv6J7uJjIIkT2Z4rm3qTOyGSVEKDuKYrBgISW', 1, '2021-08-06 12:26:06', 1, '2021-08-06 12:26:06'),
(13, 'isodec', 'ghana', 'isodec@email', '0200000000', '$2y$10$L2KTqqgOAzttK54Z7SztE..78dtd3s5VFh/Y7vGzBuCz.Wpcqp3Gu', 1, '2021-08-06 12:42:38', 1, '2021-08-06 12:42:38'),
(14, 'fred', 'quansah', 'fred@gmail.com', '0246200000', '$2y$10$uU68M3kJl4WJS6DQEDK0b.jiqtK9PV3RZLdOsJQCuItGdse.JRAHm', 1, '2021-08-06 12:59:12', 1, '2021-08-06 12:59:12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_welcome_message`
--

CREATE TABLE `tbl_welcome_message` (
  `message_id` int(11) NOT NULL,
  `mission` varchar(255) NOT NULL,
  `vision` varchar(255) NOT NULL,
  `isodec_values` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_welcome_message`
--

INSERT INTO `tbl_welcome_message` (`message_id`, `mission`, `vision`, `isodec_values`, `created_date`, `created_by`, `modified_by`, `modified_date`) VALUES
(1, '0sgfgdfgdfgdsg', '<p>dfafdfdsfagsdgdfgdf<br></p>', '<p>dfasfsdfasdfsdgsdgdfgds<br></p>', '0000-00-00 00:00:00', 0, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_essentialservices`
-- (See below for the actual view)
--
CREATE TABLE `view_essentialservices` (
`post_id` int(11)
,`post_type` int(11)
,`post_code` varchar(255)
,`post_title` varchar(255)
,`post_img` varchar(255)
,`img_description` varchar(255)
,`post_details` longtext
,`created_by` int(11)
,`created_date` datetime
,`modified_by` int(11)
,`modified_date` datetime
,`service_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_events`
-- (See below for the actual view)
--
CREATE TABLE `view_events` (
`event_id` int(11)
,`event_type` int(11)
,`event_code` varchar(255)
,`event_title` varchar(255)
,`event_details` longtext
,`event_img` varchar(255)
,`webinar_url` varchar(255)
,`location` varchar(255)
,`event_date` date
,`event_time` time
,`events_status` int(11)
,`created_date` datetime
,`created_by` int(11)
,`modified_date` datetime
,`modified_by` int(11)
,`event_status` varchar(255)
,`event_type_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_event_registration`
-- (See below for the actual view)
--
CREATE TABLE `view_event_registration` (
`event_type_name` varchar(255)
,`event_title` varchar(255)
,`event_img` varchar(255)
,`webinar_url` varchar(255)
,`event_date` date
,`event_details` longtext
,`event_time` time
,`firstname` varchar(255)
,`othernames` varchar(255)
,`phone` varchar(255)
,`email` varchar(255)
,`organisation` varchar(255)
,`location` varchar(255)
,`event_id` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_event_summary`
-- (See below for the actual view)
--
CREATE TABLE `view_event_summary` (
`Count_event_id` bigint(21)
,`registration_id` int(11)
,`event_type_name` varchar(255)
,`event_type_id` int(11)
,`event_title` varchar(255)
,`event_details` longtext
,`event_img` varchar(255)
,`webinar_url` varchar(255)
,`event_date` date
,`event_time` time
,`firstname` varchar(255)
,`othernames` varchar(255)
,`phone` varchar(255)
,`email` varchar(255)
,`organisation` varchar(255)
,`location` varchar(255)
,`event_id` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_media`
-- (See below for the actual view)
--
CREATE TABLE `view_media` (
`media_id` int(11)
,`media_type` int(11)
,`media_title` varchar(255)
,`file_name` varchar(255)
,`video_thumbnail` varchar(255)
,`created_by` int(11)
,`created_date` datetime
,`modified_by` int(11)
,`modified_date` datetime
,`media_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Structure for view `view_essentialservices`
--
DROP TABLE IF EXISTS `view_essentialservices`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_essentialservices`  AS  select `tbl_essentials`.`post_id` AS `post_id`,`tbl_essentials`.`post_type` AS `post_type`,`tbl_essentials`.`post_code` AS `post_code`,`tbl_essentials`.`post_title` AS `post_title`,`tbl_essentials`.`post_img` AS `post_img`,`tbl_essentials`.`img_description` AS `img_description`,`tbl_essentials`.`post_details` AS `post_details`,`tbl_essentials`.`created_by` AS `created_by`,`tbl_essentials`.`created_date` AS `created_date`,`tbl_essentials`.`modified_by` AS `modified_by`,`tbl_essentials`.`modified_date` AS `modified_date`,`tbl_essential_types`.`service_name` AS `service_name` from (`tbl_essential_types` join `tbl_essentials` on(`tbl_essential_types`.`service_id` = `tbl_essentials`.`post_type`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_events`
--
DROP TABLE IF EXISTS `view_events`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_events`  AS  select `tbl_events`.`event_id` AS `event_id`,`tbl_events`.`event_type` AS `event_type`,`tbl_events`.`event_code` AS `event_code`,`tbl_events`.`event_title` AS `event_title`,`tbl_events`.`event_details` AS `event_details`,`tbl_events`.`event_img` AS `event_img`,`tbl_events`.`webinar_url` AS `webinar_url`,`tbl_events`.`location` AS `location`,`tbl_events`.`event_date` AS `event_date`,`tbl_events`.`event_time` AS `event_time`,`tbl_events`.`events_status` AS `events_status`,`tbl_events`.`created_date` AS `created_date`,`tbl_events`.`created_by` AS `created_by`,`tbl_events`.`modified_date` AS `modified_date`,`tbl_events`.`modified_by` AS `modified_by`,`event_status`.`event_status` AS `event_status`,`event_types`.`event_type_name` AS `event_type_name` from ((`event_status` join `tbl_events` on(`event_status`.`event_status_id` = `tbl_events`.`events_status`)) join `event_types` on(`event_types`.`event_type_id` = `tbl_events`.`event_type`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_event_registration`
--
DROP TABLE IF EXISTS `view_event_registration`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_event_registration`  AS  select `event_types`.`event_type_name` AS `event_type_name`,`tbl_events`.`event_title` AS `event_title`,`tbl_events`.`event_img` AS `event_img`,`tbl_events`.`webinar_url` AS `webinar_url`,`tbl_events`.`event_date` AS `event_date`,`tbl_events`.`event_details` AS `event_details`,`tbl_events`.`event_time` AS `event_time`,`tbl_events_registration`.`firstname` AS `firstname`,`tbl_events_registration`.`othernames` AS `othernames`,`tbl_events_registration`.`phone` AS `phone`,`tbl_events_registration`.`email` AS `email`,`tbl_events_registration`.`organisation` AS `organisation`,`tbl_events_registration`.`location` AS `location`,`tbl_events`.`event_id` AS `event_id` from ((`tbl_events` join `event_types` on(`tbl_events`.`event_type` = `event_types`.`event_type_id`)) join `tbl_events_registration` on(`tbl_events`.`event_id` = `tbl_events_registration`.`event_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `view_event_summary`
--
DROP TABLE IF EXISTS `view_event_summary`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_event_summary`  AS  select count(`tbl_events`.`event_id`) AS `Count_event_id`,`tbl_events_registration`.`registration_id` AS `registration_id`,`event_types`.`event_type_name` AS `event_type_name`,`event_types`.`event_type_id` AS `event_type_id`,`tbl_events`.`event_title` AS `event_title`,`tbl_events`.`event_details` AS `event_details`,`tbl_events`.`event_img` AS `event_img`,`tbl_events`.`webinar_url` AS `webinar_url`,`tbl_events`.`event_date` AS `event_date`,`tbl_events`.`event_time` AS `event_time`,`tbl_events_registration`.`firstname` AS `firstname`,`tbl_events_registration`.`othernames` AS `othernames`,`tbl_events_registration`.`phone` AS `phone`,`tbl_events_registration`.`email` AS `email`,`tbl_events_registration`.`organisation` AS `organisation`,`tbl_events_registration`.`location` AS `location`,`tbl_events_registration`.`event_id` AS `event_id` from ((`tbl_events_registration` join `tbl_events` on(`tbl_events_registration`.`event_id` = `tbl_events`.`event_id`)) join `event_types` on(`event_types`.`event_type_id` = `tbl_events`.`event_type`)) group by `tbl_events_registration`.`event_id` ;

-- --------------------------------------------------------

--
-- Structure for view `view_media`
--
DROP TABLE IF EXISTS `view_media`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_media`  AS  select `tbl_media`.`media_id` AS `media_id`,`tbl_media`.`media_type` AS `media_type`,`tbl_media`.`media_title` AS `media_title`,`tbl_media`.`file_name` AS `file_name`,`tbl_media`.`video_thumbnail` AS `video_thumbnail`,`tbl_media`.`created_by` AS `created_by`,`tbl_media`.`created_date` AS `created_date`,`tbl_media`.`modified_by` AS `modified_by`,`tbl_media`.`modified_date` AS `modified_date`,`media_types`.`media_name` AS `media_name` from (`tbl_media` join `media_types` on(`tbl_media`.`media_type` = `media_types`.`media_type_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event_status`
--
ALTER TABLE `event_status`
  ADD PRIMARY KEY (`event_status_id`);

--
-- Indexes for table `event_types`
--
ALTER TABLE `event_types`
  ADD PRIMARY KEY (`event_type_id`);

--
-- Indexes for table `media_types`
--
ALTER TABLE `media_types`
  ADD PRIMARY KEY (`media_type_id`);

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
-- Indexes for table `tbl_essentials`
--
ALTER TABLE `tbl_essentials`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tbl_essential_types`
--
ALTER TABLE `tbl_essential_types`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tbl_events`
--
ALTER TABLE `tbl_events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `tbl_events_registration`
--
ALTER TABLE `tbl_events_registration`
  ADD PRIMARY KEY (`registration_id`);

--
-- Indexes for table `tbl_media`
--
ALTER TABLE `tbl_media`
  ADD PRIMARY KEY (`media_id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `tbl_our_work`
--
ALTER TABLE `tbl_our_work`
  ADD PRIMARY KEY (`our_work_id`);

--
-- Indexes for table `tbl_programmes`
--
ALTER TABLE `tbl_programmes`
  ADD PRIMARY KEY (`programme_id`);

--
-- Indexes for table `tbl_social_media`
--
ALTER TABLE `tbl_social_media`
  ADD PRIMARY KEY (`social_media_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_welcome_message`
--
ALTER TABLE `tbl_welcome_message`
  ADD PRIMARY KEY (`message_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event_types`
--
ALTER TABLE `event_types`
  MODIFY `event_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `media_types`
--
ALTER TABLE `media_types`
  MODIFY `media_type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_documents`
--
ALTER TABLE `tbl_documents`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_essentials`
--
ALTER TABLE `tbl_essentials`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_essential_types`
--
ALTER TABLE `tbl_essential_types`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_events`
--
ALTER TABLE `tbl_events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_events_registration`
--
ALTER TABLE `tbl_events_registration`
  MODIFY `registration_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_media`
--
ALTER TABLE `tbl_media`
  MODIFY `media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_our_work`
--
ALTER TABLE `tbl_our_work`
  MODIFY `our_work_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_programmes`
--
ALTER TABLE `tbl_programmes`
  MODIFY `programme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_social_media`
--
ALTER TABLE `tbl_social_media`
  MODIFY `social_media_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_welcome_message`
--
ALTER TABLE `tbl_welcome_message`
  MODIFY `message_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
