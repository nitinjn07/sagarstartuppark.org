-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 17, 2024 at 07:36 AM
-- Server version: 10.6.12-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `saga_online_video`
--

-- --------------------------------------------------------

--
-- Table structure for table `course_category`
--

CREATE TABLE `course_category` (
  `id` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_category`
--

INSERT INTO `course_category` (`id`, `tid`, `category_name`, `slug`, `status`) VALUES
(1, 1, 'Website Development', 'Website-Development', 1),
(2, 2, 'MS EXCEL', 'MS-EXCEL', 1),
(3, 2, 'MS POWER POINT ', 'POWER-POINT', 1),
(4, 3, 'Communication ', 'Communication ', 1),
(5, 3, 'Business Etiquettes', 'Business-Etiquettes', 1),
(6, 3, 'Conflict & Anger management', 'Conflict-Anger-management', 1),
(7, 3, 'Design thinking', 'Design-thinking', 1),
(8, 3, 'Time Management Techniques ', 'Time-Management ', 1),
(9, 3, 'Mastering Negotiation Skills and Leadership Skills', 'Mastering-Negotiation-Skills-and-Leadership-Skills', 1),
(10, 4, 'Scale Your Startup\'s Marketing Efforts', 'Scale-Your-Startup-Marketing Efforts', 1),
(11, 4, 'Marketing ', 'Marketing', 1),
(12, 4, 'Effective Marketing Strategies', 'Marketing-Strategies', 1),
(13, 4, 'Branding', 'Branding', 1),
(14, 5, 'Tools for Digital Marketing', 'Digital Marketing', 1),
(15, 5, 'Social Media Management ', '', 1),
(16, 4, 'Customer Aquisition ', 'Customer Aquisition ', 1),
(17, 5, 'Affiliate Marketing ', '', 1),
(18, 6, 'Revenue Model ', 'Revenue-Model ', 1),
(19, 6, 'Fund Management', 'Fund Management', 1),
(20, 7, 'Email Etiquettes & Business Letter Drafting', 'Email Etiquettes & Business Letter Drafting', 1),
(21, 8, 'Legal Basics ', 'Legal-Basics ', 1),
(22, 8, 'Intellectual property rights', 'Intellectual-property-rights', 1),
(23, 6, 'Taxation ', 'Taxation ', 1),
(24, 9, 'Documentation ', 'Documentation ', 0),
(25, 2, 'MS Word', 'MS WORD', 1),
(26, 10, 'Team Managememt', 'Team-Managememt', 1),
(27, 1, 'Cost effective Technology & Entrepreneurship', 'Cost effective Technology & Entrepreneurship', 1),
(28, 8, 'GST', 'GST', 1),
(29, 8, 'Patent', 'Patent ', 1),
(30, 11, 'Investors ', 'Investors ', 1),
(31, 12, 'Building a right network', 'Building-a-right-network', 1),
(32, 13, 'Business Model ', 'Business-Model ', 1),
(33, 14, 'Women Entrepreneurship ', 'Women-Entrepreneurship ', 1),
(34, 14, 'Young Entrepreneurship ', 'Young entrepreneurs', 1),
(35, 15, 'Startup Lifecycle ', 'Startup-Lifecycle ', 1),
(36, 15, 'Refine and develop a startup Idea ', 'Refine-and-develop-startup Idea ', 1),
(37, 15, 'MVP', 'MVP', 1),
(38, 15, 'Evaluation ', 'Evaluation ', 1),
(39, 16, 'A perfect Pitch Deck', 'Pitch-Deck', 1),
(40, 17, 'MP Startup Policy', 'MP-Startup-Policy', 1),
(41, 18, 'Startup Basics ', 'Startup-Basics ', 1),
(42, 19, 'Basics of E-Commerce and Online Selling', 'Basics of E-Commerce and Online Selling', 1),
(43, 20, ' DPIIT Recognition', ' DPIIT-Recognition', 1),
(44, 20, 'Startup India Program ', 'Startup India Program ', 1),
(45, 20, 'Startup India Seed Fund Scheme ', 'Startup India Seed Fund Scheme ', 1),
(46, 21, 'Agritech startups transforming the farming sector', 'How are Agritech startups transforming the farming sector', 1),
(47, 22, 'Hackathon ', 'Hackathon', 1),
(48, 23, 'Sales & Marketing ', 'Sales & Marketing ', 1),
(49, 24, 'HR Hacks ', 'HR-HACKS ', 1),
(50, 26, 'Content Creation Techniques For Startups', 'Content Creation Techniques to Structure Your Sales Presentation', 1),
(51, 13, ' business models for successful startups', 'Sustainable business models for successful startups', 1),
(52, 8, 'Legal Basics that every Startup should do', 'Legal Basics that every Startup should do', 1),
(53, 22, 'Things you should know before your first HACKATHON', 'Things you should know before your first HACKATHON', 1),
(54, 1, 'Technology need for Startups', 'Technology need for Startups', 1),
(55, 13, 'Importance of Business Model', 'Importance of Business Model', 1),
(56, 28, 'Tech Pathshala', 'Tech Pathshala', 1),
(57, 15, 'Idea Validation ', 'Idea Validation ', 1),
(58, 8, 'Formalize a legal business structure', 'Formalize a legal business structure', 1),
(59, 8, 'Celebrating World Intellectual Property Day', 'Celebrating World Intellectual Property Day', 1),
(60, 29, 'Budget 22', 'Budget 22', 1),
(61, 8, 'Company Types', 'Types of Companies', 1),
(62, 3, 'Mindful Entrepreneurship ', 'Mindful Entrepreneurship ', 1),
(63, 3, 'Mindful Entrepreneurship ', 'Mindful Entrepreneurship ', 1),
(64, 30, 'Survival strategies for startups during Covid-19', 'Survival strategies for startups during Covid-19', 1),
(65, 31, 'Sustainable Development Goals', 'Sustainable Development Goals', 1),
(66, 32, 'Intellectual Property Day', '', 1),
(67, 33, 'Product Life Cycle Management', '', 1),
(68, 34, 'DPIIT recognition', '', 1),
(69, 35, 'Mindful Entrepreneurship', '', 1),
(70, 36, 'Taxation', '', 1),
(71, 37, 'Know your Customer', '', 1),
(72, 38, ' Pricing Strategy', '', 1),
(73, 39, 'startup valuation', '', 1),
(74, 40, 'Business Model Canvas', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_sub_category`
--

CREATE TABLE `course_sub_category` (
  `id` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `sub_cat_name` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_sub_category`
--

INSERT INTO `course_sub_category` (`id`, `tid`, `cid`, `sub_cat_name`, `status`, `slug`) VALUES
(1, 1, 1, 'Web designing ', 0, ''),
(2, 1, 1, 'Website and Hosting Service and Email Management', 1, 'Website and Hosting Service and Email Management'),
(3, 2, 2, 'MS EXCEL', 1, 'MS-EXCEL'),
(4, 2, 3, 'MS POWER POINT ', 1, 'Tips and Tricks of using MS PowerPoint for business professionals'),
(5, 3, 4, 'Business Communication', 1, 'Business-Communication'),
(6, 3, 5, 'Business Etiquettes', 1, 'Business Etiquettes'),
(7, 3, 4, 'Public Speaking Master Classes', 1, 'Public Speaking Master Classes'),
(8, 3, 4, 'Mastering interpersonal Skills', 1, 'Mastering interpersonal Skills'),
(9, 3, 6, 'Conflict & Anger management', 1, 'Conflict & Anger management'),
(10, 3, 7, 'Design thinking', 1, 'Design thinking'),
(11, 3, 8, 'Time Management Techniques ', 1, 'Time Management Techniques '),
(12, 3, 9, 'Mastering Negotiation Skills and Leadership Skills', 1, 'Mastering Negotiation Skills and Leadership Skills'),
(13, 4, 10, 'Growth Hacking Techniques to Scale Your Startup\'s Marketing Efforts', 0, 'Growth Hacking Techniques to Scale Your Startup\'s Marketing Efforts'),
(14, 4, 10, 'Marketing strategies ', 1, ''),
(15, 4, 12, 'Effective Marketing Strategies', 1, 'Effective Marketing Strategies'),
(16, 4, 13, 'Branding ', 1, 'Brand Identity'),
(17, 4, 13, 'Packaging & Branding strategies for startups', 1, 'Packaging & Branding strategies for startups'),
(18, 5, 14, 'Digital Marketing', 1, 'Digital Marketing'),
(19, 5, 15, 'Social Media Management and Marketing', 1, ''),
(20, 4, 16, 'Customer Aquisition ', 1, ''),
(21, 5, 17, 'Affiliate Marketing ', 1, ''),
(22, 6, 18, 'Introduction of Revenue Model for your startup', 1, 'Introduction of Revenue Model for your startup'),
(23, 6, 19, 'Learn how to arrange funds for your startup ', 1, 'Learn how to arrange funds for your startup '),
(24, 6, 18, 'Basics of Revenue Model ', 1, 'Basics of Revenue Model '),
(25, 7, 20, 'Email Etiquettes & Business Letter Drafting', 1, ''),
(26, 8, 21, 'Legal Basics ', 1, 'Legal Basics '),
(27, 8, 22, 'Intellectual property rights', 1, 'Intellectual property rights'),
(28, 6, 23, 'Measures to ease taxation for startups', 1, 'Measures to ease taxation for startups'),
(29, 9, 24, 'Importance of documentation and how to prepare them', 1, 'Importance of documentation and how to prepare them'),
(30, 2, 25, 'MS WORD', 1, 'MS-WORD'),
(31, 10, 26, 'Build a successful team for your Startup ', 1, 'Build a successful team for your Startup '),
(32, 1, 27, 'Cost effective Technology & Entrepreneurship', 1, 'Cost effective Technology & Entrepreneurship'),
(33, 8, 28, 'GST Compliance for Startups', 1, 'GST Compliance for Startups'),
(34, 8, 29, 'Legal Patent Filing Process ', 1, 'Legal Patent Filing Process'),
(35, 8, 29, 'Legal Patent Filing Process ', 1, 'Legal Patent Filing Process'),
(36, 11, 30, 'Key Factors Investors Seek in Startups', 1, 'Key Factors Investors Seek in Startups'),
(37, 12, 31, 'How to build a right network for your startup growth', 1, 'How to build a right network for your startup growth'),
(38, 13, 32, 'Choose the right business model ', 1, ''),
(39, 14, 33, 'Why Should We Have More Women Entrepreneurs?', 1, 'Why Should We Have More Women Entrepreneurs?'),
(40, 14, 33, 'How to grow your Startups?', 1, 'How to grow your Startups?'),
(41, 14, 34, 'How should young entrepreneurs develop their startup?', 1, 'How should young entrepreneurs develop their startup?'),
(42, 15, 35, 'Startup Lifecycle ', 1, 'Startup Lifecycle '),
(43, 15, 36, 'How to choose , refine and develop a startup Idea ', 1, 'How to choose , refine and develop a startup Idea '),
(44, 15, 37, 'How to build MVP', 1, 'How to build MVP'),
(45, 15, 38, 'How to Evaluate your Startup Idea?', 1, 'How to Evaluate your Startup Idea?'),
(46, 16, 39, 'How to prepare a perfect Pitch Deck?', 1, 'How to prepare a perfect Pitch Deck?'),
(47, 17, 40, 'MP Startup Policy 2022 by Satna Incubation Center', 1, 'MP Startup Policy 2022 by Satna Incubation Center'),
(48, 18, 41, 'Difference between Startups and conventional Business', 1, 'Difference between Startups and conventional Business'),
(49, 18, 41, 'Incubation Center', 1, 'What is Incubation Center?'),
(50, 18, 41, 'What to do if similar idea already exist?', 1, 'What to do if similar idea already exist?'),
(51, 18, 41, 'Innovation Management', 1, 'Innovation Management'),
(52, 19, 42, 'Basics of E-Commerce and Online Selling', 1, 'Basics of E-Commerce and Online Selling'),
(53, 20, 43, ' DPIIT Recognition', 1, ' DPIIT Recognition'),
(54, 20, 44, 'Startup India Program ', 1, 'Startup India Program'),
(55, 20, 45, 'Startup India Seed Fund Scheme ', 1, 'Startup India Seed Fund Scheme '),
(56, 21, 46, 'Agritech startups transforming the farming sector', 1, 'Agritech startups transforming the farming sector'),
(57, 22, 47, 'How to win your first Hackathon', 1, 'How to win your first Hackathon'),
(58, 22, 47, 'How to Build A Wining Start-up Team?', 1, 'How to Build A Wining Start-up Team?'),
(59, 23, 48, 'Basics of Sales and Marketing', 1, 'Basics of Sales and Marketing'),
(60, 23, 48, 'Basics of Sales and Marketing', 1, 'Basics of Sales and Marketing'),
(61, 23, 48, 'Marketing strategies ', 1, 'Marketing strategies '),
(62, 23, 48, 'Influencer Marketing ', 1, 'Influencer Marketing '),
(63, 23, 48, 'The art of selling', 1, 'The art of selling'),
(64, 23, 48, 'Branding ', 1, 'Branding '),
(65, 19, 42, 'Selling on Meesho , Amazon and Flipcart', 1, 'Selling on Meesho , Amazon and Flipcart'),
(66, 24, 49, 'HR Hacks For Startups', 1, 'HR Hacks For Startups'),
(67, 8, 21, 'The Importance of Company Formation for Startups', 1, 'The Importance of Company Formation for Startups'),
(68, 26, 50, 'Content Creation Techniques to Structure Your Sales Presentation', 0, 'Content Creation Techniques to Structure Your Sales Presentation'),
(69, 13, 51, 'Sustainable business models for successful startups', 1, 'Sustainable business models for successful startups'),
(70, 8, 21, 'Legal Basics that every Startup should do', 1, 'Legal Basics that every Startup should do'),
(71, 8, 52, 'Legal Basics that every Startup should do', 1, 'Legal Basics that every Startup should do'),
(72, 22, 53, 'Things you should know before your first HACKATHON', 1, 'Things you should know before your first HACKATHON'),
(73, 22, 47, 'Brainstorming Ideas for HACKATHON', 1, 'Brainstorming Ideas for HACKATHON'),
(74, 22, 47, 'Winning Strategies For Hackathon', 1, 'Winning Strategies For Hackathon'),
(75, 22, 47, 'Day 2: Winning Strategy for Bundelkhand Spark Hackathon 2.0', 1, 'Day 2: Winning Strategy for Bundelkhand Spark Hackathon 2.0'),
(76, 22, 47, 'Day 3: Winning Strategy Bundelkhand Spark Hackathon 2.0', 1, 'Day 3: Winning Strategy Bundelkhand Spark Hackathon 2.0'),
(77, 20, 45, 'Know everything about Startup Seed Fund Scheme', 1, 'Know everything about Startup Seed Fund Scheme'),
(78, 20, 45, 'Day#1 of SEED by Sagar Smart City Limited', 1, 'Day#1 of SEED by Sagar Smart City Limited'),
(79, 20, 45, 'Day 2 of SEED Session by SSCL', 1, 'Day 2 of SEED Session by SSCL - Incubation Center and how it can help in funding the startups'),
(80, 20, 45, 'Day#3 - What is Startup India Program, what is DPIIT?', 1, 'Day#3 - What is Startup India Program, what is DPIIT? - SEED sessions by Sagar Smart City Limited'),
(81, 20, 45, ' Day#4 Startup Stages', 1, 'SundaySpecial - Day#4 of Startup Training Classes (SEED) by Sagar Smart City - Startup Stages'),
(82, 20, 45, '#Day 5  Legal and Compliance', 1, '#Day5 of Startup Training Classes (SEED) by Sagar Smart City Limited - Legal and Compliance'),
(83, 20, 45, '#Day6  Startup Funding', 1, '#Day6 of Startup Training Classes (SEED) by Sagar Smart City Limited - Startup Funding'),
(84, 20, 45, '#Day7 Startup Ideas for Sagar', 1, 'Startup Ideas for Sagar, on day7 the last day of SEED training sessions'),
(85, 20, 43, 'How to get DPIIT recognization for your startups and it\'s benefit', 1, 'How to get DPIIT recognization for your startups and it\'s benefit'),
(86, 17, 40, 'MP Startup Policy', 1, 'Workshop- MP Startup Policy 2022 by SPARK Incubation center'),
(87, 1, 54, 'Technology need for Startups', 1, 'Technology need for Startups'),
(88, 13, 55, 'Importance of Business Model', 1, 'Importance of Business Model'),
(89, 28, 56, 'Technology Traning for Non- Tech Startups', 1, 'Technology Traning for Non- Tech Startups'),
(90, 28, 56, 'Basic Architecture of web/App Based System', 1, 'Basic Architecture of web/App Based System'),
(91, 28, 56, 'Basic Architecture of web/App Based System 2', 1, 'Basic Architecture of web/App Based System 2'),
(92, 28, 56, 'Front End ,Back End and Business Layer ', 1, 'Front End ,Back End and Business Layer '),
(93, 28, 56, 'E-commerce Store Development', 1, 'E-commerce Store Development'),
(94, 28, 56, 'Google Analytics Data Collection ', 1, 'Google Analytics Data Collection '),
(95, 28, 56, 'basic Search Engine Optimization (SEO) and Effective Internet Presence', 1, 'basic Search Engine Optimization (SEO) and Effective Internet Presence'),
(96, 28, 56, 'Basic of E-Commerce and Online Selling', 1, 'Basic of E-Commerce and Online Selling'),
(97, 28, 56, 'Online Designing Tool', 1, 'Online Designing Tool'),
(98, 28, 56, 'Hosting Solutions', 1, 'Hosting Solutions'),
(99, 28, 56, 'Outlook & MS Word', 1, 'Outlook & MS Word'),
(100, 28, 56, 'Graduation Day of Tech pathshala', 1, 'Graduation Day of Tech pathshala'),
(101, 15, 57, 'Idea Validation', 1, 'Idea Validation'),
(102, 8, 58, 'Formalize a legal business structure', 1, 'Formalize a legal business structure'),
(103, 8, 59, 'Celebrating World Intellectual Property Day', 1, 'Celebrating World Intellectual Property Day'),
(104, 29, 60, 'Budget 22', 1, 'Budget 22'),
(105, 8, 61, 'Types of Companies and Cost of Non Compliance', 1, 'Types of Companies and Cost of Non Compliance'),
(106, 15, 35, 'startup Lifecycle', 1, 'startup Lifecycle'),
(107, 31, 65, 'Sustainable Development Goals', 1, 'Sustainable Development Goals'),
(108, 30, 64, 'Survival strategies for startups during Covid-19', 1, 'Survival strategies for startups during Covid-19'),
(109, 3, 63, 'Mindful Enterpreneurship', 1, 'Mindful Enterpreneurship'),
(110, 32, 66, 'Celebrating World Intellectual Property Day-22', 1, ''),
(111, 33, 67, 'Product Life Cycle Management', 1, ''),
(112, 34, 68, 'DPIIT recognization for your startups and it\'s benefit', 1, ''),
(113, 35, 69, 'Mindful Entrepreneurship', 1, ''),
(114, 36, 70, 'Taxation Simplified', 1, ''),
(115, 37, 71, 'Know your customers and tips', 1, ''),
(116, 38, 72, ' Pricing Strategy', 1, ''),
(117, 39, 73, 'startup valuation', 1, ''),
(118, 40, 74, 'Business Model Canvas', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `course_type`
--

CREATE TABLE `course_type` (
  `id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_type`
--

INSERT INTO `course_type` (`id`, `type`, `slug`, `status`) VALUES
(1, 'Technology', 'Technology', 1),
(2, 'MS Office ', 'MS-OFFICE ', 1),
(3, 'Soft Skills ', 'SOFT-SKILLS', 1),
(4, 'Sales & Marketing ', 'Sales-and-Marketing ', 1),
(5, 'Digital Marketing ', 'Digital-Marketing ', 1),
(6, 'Financial Management', 'Financial ', 1),
(7, 'Email Etiquettes & Business Letter Drafting', 'Email-Etiquettes', 1),
(8, 'Legal compliance', 'Legal-compliance', 1),
(9, 'Documentation ', 'Documentation ', 1),
(10, 'Team Managememt', 'Team-Managememt', 1),
(11, 'Investors and Investment', 'Investors-and-Investment', 1),
(12, 'Networking ', 'Networking ', 1),
(13, 'Business Model ', 'Business-Model ', 1),
(14, 'Women and Student Entrepreneurship ', 'Women-and-Student-Entrepreneurship ', 1),
(15, 'Startup Lifecycle ', 'Startup-Lifecycle ', 1),
(16, 'Pitch Deck', 'Pitch-Deck', 1),
(17, 'MP Startup Policy', 'MP-Startup-Policy', 1),
(18, 'Startup Basics ', 'Startup-Basics ', 1),
(19, 'E-Commerce and Online Selling', 'Basics of E-Commerce and Online Selling', 1),
(20, 'Startup Schemes and Benefits', 'Startup-Schemes', 1),
(21, 'Agritech', 'Agritech', 1),
(22, 'Hackathon ', 'Hackathon ', 1),
(23, 'Marketing & Sales ', 'Marketing & Sales ', 1),
(24, 'HR ', 'HR', 1),
(25, 'Legal Comliance', 'The Importance of Company Formation for Startups', 1),
(26, 'Content Creation', 'Content Creation Techniques to Structure Your Sales Presentation', 1),
(27, 'Business Model', 'Sustainable business models for successful startups', 1),
(28, 'Tech Pathshala', 'Tech Pathshala', 1),
(29, 'Budget 22', 'Budget 22', 1),
(30, 'Survival strategies for startups during Covid-19', 'Survival strategies for startups during Covid-19', 1),
(31, 'startup Sustainable Development Goals', 'Sustainable Development Goals', 1),
(32, 'Intellectual Property Day', '', 1),
(33, 'Product Life Cycle Management', '', 1),
(34, 'DPIIT recognition', '', 1),
(35, 'Mindful Entrepreneurship', '', 1),
(36, 'Taxation Simplified for Successful Startups', '', 1),
(37, 'Customer Validation', '', 1),
(38, ' Pricing Strategy', '', 1),
(39, 'startup valuation', '', 1),
(40, 'Business Model Canvas', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `video_upload`
--

CREATE TABLE `video_upload` (
  `id` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `subid` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `requirement` varchar(100) NOT NULL,
  `this_course_is_for` varchar(100) NOT NULL,
  `what_you_learn` varchar(100) NOT NULL,
  `intro_video` text NOT NULL,
  `main_video` text NOT NULL,
  `doc_file` text NOT NULL,
  `uploaded_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video_upload`
--

INSERT INTO `video_upload` (`id`, `tid`, `cid`, `subid`, `title`, `description`, `requirement`, `this_course_is_for`, `what_you_learn`, `intro_video`, `main_video`, `doc_file`, `uploaded_date`, `status`) VALUES
(1, 23, 48, 59, 'Basics of Sales and Marketing', 'Discover the Fundamentals of Sales and Marketing in Our Latest Video! ???? Unlock powerful insights and strategies to boost your brand\'s reach and drive success. Watch now and take your first step towards mastering the art of sales and marketing! ', ' .', 'Startups  ', 'The core principles of effective sales techniques\r\n???? How to create impactful marketing campaigns\r', '#', 'https://youtube.com/embed/vwlSKwsKL0U', '#', '2023-08-18 10:19:38', 1),
(2, 23, 48, 62, 'Influencer Marketing ', 'Power Up Your Brand with Influencer Marketing! ???? Discover the secrets behind this game-changing strategy in our video. Learn how to collaborate with influencers, amplify your reach, and connect authentically with your audience. Ready to boost your brand\'s impact? Watch now! ', ' .', 'Startups', 'What influencer marketing is and why it matters\r\n???? How to identify the right influencers for your', '#', 'https://youtube.com/embed/JD-oAPglZYE', '#', '2023-08-18 10:23:49', 1),
(3, 23, 48, 61, 'FAB Analysis and Marketing Strategies', 'Dive into FAB Analysis and Marketing Strategies! ???? In our latest video, we demystify the power of Feature, Advantage, Benefit analysis and how it fuels effective marketing tactics. Unlock the tools to craft irresistible offers and connect with your audience\'s needs. Ready to supercharge your marketing game? Watch now! ', ' .', 'Startups ', 'What FAB Analysis is and why it\'s crucial\r\n???? How to identify and communicate features, advantages', '#', 'https://youtube.com/embed/NnkDvIbd2Vk', '#', '2023-08-18 11:12:05', 1),
(4, 23, 48, 61, 'Go-To-Marketing Strategies', 'Ready to Conquer the Market? Discover Go-To-Market Strategies! ???? Unlock the playbook to launching your product or service effectively in our latest video. Learn how to strategize, target the right audience, and stand out in the competitive landscape. Ready to make your mark? Watch now! ', ' .', 'Startups ', 'What Go-To-Market strategies are and why they\'re essential\r\n???? How to identify your target audienc', '#', 'https://youtube.com/embed/PYA4QmCpXss', '#', '2023-08-18 11:16:24', 1),
(5, 23, 48, 64, 'Brand Management ', '\"???? Unleash the Power of Brand Management! ???? Join us in our latest video as we delve into the art of building and maintaining a strong brand. Learn the strategies to create a memorable brand identity, connect with your audience, and shape perceptions. Ready to elevate your brand game? Watch now! ???? #BrandManagement101 #BuildYourBrand #LearnAndGrow', ' .', 'Startups ', 'The importance of effective brand management\r\n???? Strategies to create a compelling brand identity\r', '#', 'https://youtube.com/embed/G3ouIt0CXvo', '#', '2023-08-18 11:21:58', 1),
(6, 19, 42, 65, 'How to sell your Product on Meesho ', 'Ready to Master Meesho Selling? ???? Discover the step-by-step guide to selling your product on Meesho in our latest video! Learn the tricks to create listings, reach potential buyers, and boost your sales game. Ready to take your online business to the next level? Watch now! ????', ' .', 'Startups ', ' How to create compelling product listings on Meesho\r\n???? Strategies to effectively showcase your p', '#', 'https://youtube.com/embed/Pa9KSA2R5oM', '#', '2023-08-18 11:31:32', 1),
(7, 19, 42, 65, 'How to Sell your product online Day 2 ', 'Elevate Your Online Selling Game: Day 2 Guide is Here! ???? Join us in this video as we dive deeper into the art of selling your product online. Learn advanced strategies to optimize your listings, connect with customers, and drive more sales. Ready to boost your e-commerce success? Watch now! ', ' .', 'Startups ', 'Advanced techniques to enhance your online product listings\r\n???? Strategies for effective customer ', '#', 'https://youtube.com/embed/hAlNQm5b9xg', '#', '2023-08-18 11:33:47', 1),
(8, 19, 42, 65, 'How to sell your Product online?  Day 1', 'Unlock Online Selling Success: Day 1 Guide is Here! ???? Join us in this video as we kickstart your journey to selling your product online. Learn essential strategies to create compelling listings, attract buyers, and establish your brand presence. Ready to transform your e-commerce game? Watch now! ???? #OnlineSelling101 #ElevateYourBusiness #LearnAndGrow', ' 1', 'Startups ', 'Basics of creating effective online product listings\r\n???? Tips for optimizing product images and de', '#', 'https://youtube.com/embed/garZdWhXn_I', '#', '2023-08-18 11:35:22', 1),
(9, 14, 33, 39, 'Women Entrepreneurship and the importance of Women in the Growing Startup Market', '\"????‍???? Embrace the Power of Women Entrepreneurship! ???? Join us in this enlightening video as we explore the significance of women in the dynamic startup landscape. Learn about their crucial role, inspiring success stories, and how they\'re shaping the future of business. Ready to be empowered? Watch now! ???????? #WomenInEntrepreneurship #InspiringSuccess #LearnAndGrow', ' .', 'Women Lead Startup ', 'In this video, you will learn:\r\n???? The growing impact of women in the startup market\r\n???? Inspiri', '#', 'https://youtube.com/embed/xWcAEnLw7xs', '#', '2023-08-18 11:41:23', 1),
(10, 3, 7, 10, 'How Design Thinking Helps Startups & Entrepreneurs? ', '\"???? Ignite Innovation with Design Thinking! ???? Join us in this insightful video to explore how design thinking can fuel creativity and success for startups and entrepreneurs. Learn the principles, techniques, and real-world examples that can transform your approach. Ready to elevate your business game? Watch now! ????????', ' .', 'Startups ', 'n this video, you will learn:\r\n???? What design thinking is and why it matters\r\n???? Techniques to e', '#', 'https://youtube.com/embed/TMl-SMbc7Xg', '#', '2023-08-18 11:43:28', 1),
(11, 3, 4, 5, 'Empower and Engage your startup with Communication ', '\"???? Elevate Your Startup\'s Impact with Effective Communication! ???? Join us in this video to discover how powerful communication can drive growth and engagement for your venture. Learn strategies, tips, and real-world insights that will empower your startup\'s journey. Ready to amplify your reach? Watch now! ???????? #StartupCommunication #EmpowerAndEngage #LearnAndGrow', ' .', 'Startup ', '       The role of communication in startup success\r\n???? Strategies to effectively convey your bran', '#', 'https://youtube.com/embed/LX_Th-cXHyM', '#', '2023-08-18 11:47:00', 1),
(12, 23, 48, 61, 'Content Creation ', 'Structure your sales presentation by first understanding your audience\'s needs and then using a problem-solving approach to highlight how your product or service provides solutions, all while incorporating engaging visuals and a clear call to action for a compelling and effective pitch.', ' ..', 'Content Creation Techniques to Structure Your Sales Presentation', '(1) Audience Understanding \r\n(2) Problem-Solution Framework\r\n(3) Visual Support\r\n(4) Clear Call to A', '#', 'https://youtube.com/embed/g500r-AP0_E', '#', '2023-09-12 09:39:55', 0),
(13, 26, 50, 68, 'Content Creation Techniques to Structure Your Sales Presentation', 'Structure your sales presentation by first understanding your audience\'s needs and then using a problem-solving approach to highlight how your product or service provides solutions, all while incorporating engaging visuals and a clear call to action for a compelling and effective pitch.', ' ..', 'Startups', '(1) Audience Understanding \r\n(2) Compelling Opening\r\n(3) Problem-Solution Framework\r\n(4) Visual Supp', '#', 'https://youtube.com/embed/g500r-AP0_E', '#', '2023-09-12 10:14:11', 0),
(14, 8, 21, 67, 'The Importance of Company Formation for Startups', 'Company formation for startups is vital for legal protection and building credibility, instilling trust in investors and customers.', ' ..', 'startups', '(1) Legal Structure and Liability Protection\r\n(2) Credibility and Trust\r\n(3) Access to Funding\r\n(4) ', '#', 'https://youtube.com/embed/zt8A3jCCQ7Y', '#', '2023-09-12 10:21:26', 0),
(15, 26, 50, 68, 'Content Creation Techniques to Structure Your Sales Presentation', 'Structure your sales presentation by first understanding your audience\'s needs and then using a problem-solving approach to highlight how your product or service provides solutions, all while incorporating engaging visuals and a clear call to action for a compelling and effective pitch.', ' ..', 'Startups', 'Effective presentations require thorough audience understanding, a problem-solving narrative, emphas', '#', 'https://youtube.com/embed/g500r-AP0_E', '#', '2023-09-12 10:32:12', 0),
(16, 13, 51, 69, 'Sustainable business models for successful startups', 'Sustainable business models for startups are centered on customer-centricity, scalability, multiple revenue sources, efficient resource management, social and environmental responsibility, innovation, adaptability, a forward-looking approach, collaboration, and measuring their impact.', ' ..', 'Startups', '(1) Customer-Centricity\r\n(2) Value Proposition\r\n(3) Diversified Revenue Streams\r\n(4) Scalability', '#', 'https://youtube.com/embed/2u8V66ImRiw', '#', '2023-09-12 11:05:00', 1),
(17, 8, 52, 71, 'Legal Basics that every Startup should do', 'Every startup should prioritize legal basics such as choosing the right business structure and ensuring intellectual property protection to establish a solid legal foundation for business operations and growth.', ' ..', 'startups', 'Learn About Basic that every Startup should do', '#', 'https://youtube.com/embed/xcc860uDHJI', '#', '2023-09-12 11:16:49', 1),
(18, 22, 53, 72, 'Things you should know before your first HACKATHON', 'Essential tips to consider before your debut hackathon to maximize your participation and learning experience.', ' ..', 'startups', 'Learn about the Crucial Preparations for Your First Hackathon.', '#', 'https://youtube.com/embed/iD_jTMQk-0w', '#', '2023-09-12 11:37:11', 1),
(19, 22, 47, 73, 'Brainstorming Ideas for HACKATHON', 'Brainstorming Ideas for HACKATHON  ', ' ....', 'startup', 'Brainstorming Ideas for HACKATHON ', '#', 'https://youtube.com/embed/daUjTTtxUqU', '#', '2023-09-12 11:49:00', 1),
(20, 22, 47, 74, 'Winning Strategies For Hackathon', 'Hackathons are competitive events where teams or individuals come together to brainstorm, design, and build innovative solutions to specific problems or challenges within a limited timeframe, often ranging from a few hours to a few days.', ' ..', 'startup', 'How to prepare hackathon Pitch.', '#', 'https://youtube.com/embed/ZsKgftwUYbk', '#', '2023-09-12 12:01:30', 1),
(21, 22, 47, 75, 'Day 2: Winning Strategy for Bundelkhand Spark Hackathon 2.0', 'Increase your chances of success in the Bundelkhand Spark Hackathon 2.0 and create a winning solution that stands out to the judges and participants.', ' ..', 'Startup', 'Winning Strategy for Bundelkhand Spark Hackathon 2.0', '#', 'https://youtube.com/embed/jiXWlLFpJuY', '#', '2023-09-12 12:05:43', 1),
(22, 22, 47, 76, 'Winning Strategy Bundelkhand Spark Hackathon 2.0', 'Increase your chances of success in the Bundelkhand Spark Hackathon 2.0 and create a winning solution that stands out to the judges and participants.', ' ..', 'startup', ' Prepare a Compelling Presentation', '#', 'https://youtube.com/embed/ZFJtmybG56E', '#', '2023-09-12 12:09:42', 1),
(23, 20, 45, 77, 'Know everything about Startup Seed Fund Scheme', 'Startup Seed Fund Scheme is a government or private initiative that offers funding and support to early-stage startups to encourage innovation, entrepreneurship, and economic development within a region or industry.', ' ...', 'startups', 'Startup India Seed Fund Scheme contributes to the growth of startups and what support does it provid', '#', 'https://youtube.com/embed/ENJPecanCqg', '#', '2023-09-13 06:35:04', 1),
(24, 20, 45, 78, 'Day#1 of SEED by Sagar Smart City Limited', 'On the first day of SEED sessions hosted by Sagar Smart City Limited, participants will grasp the fundamentals of startups and discern the distinctions between startups and conventional businesses.', ' ...', 'startups', 'Understand the basics of startups and what are the differences between startup and a normal business', '#', 'https://youtube.com/embed/SCO31nSqBKU', '#', '2023-09-13 06:59:04', 1),
(25, 20, 45, 79, 'Day 2 of SEED Session by SSCL - Incubation Center and how it can help in funding the startups', 'Comprehend the services provided by an Incubation Center and their role in nurturing startup growth, particularly in facilitating funding arrangements.', ' ...', 'Startups', 'Understand the offerings by an Incubation Center and how it can help the startups grow, especially i', '#', 'https://youtube.com/embed/WGm9E4muW3s', '#', '2023-09-13 07:03:54', 1),
(26, 20, 45, 80, 'Day#3 - What is Startup India Program, what is DPIIT? - SEED sessions by Sagar Smart City Limited', 'Gain essential insights into your startup journey, explore the advantages of the Startup India Program, and delve into key details about DPIIT (Department for Promotion of Industry and Internal Trade).\r\n\r\n\r\n\r\n\r\n', ' ...', 'Startups', 'Learn the very important aspect of your startup journey, the benefits of Startup India Program and t', '#', 'https://youtube.com/embed/00rW-Jjnw_Q', '#', '2023-09-13 07:07:05', 1),
(27, 20, 45, 81, 'Day#4 Startup Stages', 'On day 4 of SEED sessions presented by Sagar Smart City Limited\'s Incubation Center - SPARK, participants will be introduced to the diverse stages of startups, spanning from ideation to the exit phase.', ' ....', 'Startups', 'Learn the various stages of Startups right from Ideation to Exit on day4 of SEED sessions by Sagar S', '#', 'https://youtube.com/embed/zxlLtHtDqyU', '#', '2023-09-13 07:11:21', 1),
(28, 20, 45, 82, '#Day5 Legal and compliance', 'legal requirements and compliance aspects essential for establishing and operating your startup, presented by Mr. Nishant Mehta, a CA, lawyer, and international partner at India World Business Angel Investment Forum.', ' .....', 'Startups', 'Legal and compliance are very important for any business. Learn the legal implications and complianc', '#', 'https://youtube.com/embed/xGS0WKEovfk', '#', '2023-09-13 07:13:58', 1),
(29, 20, 45, 83, '#Day6 of Startup Training Classes (SEED) by Sagar Smart City Limited - Startup Funding', 'Startup funding refers to the process of securing financial capital from investors or sources to support a new business\'s growth, development, and operational needs.', ' ...', 'Startups', 'Learn the basic details of funding.', '#', 'https://youtube.com/embed/D6Nb5wvASoo', '#', '2023-09-13 07:17:05', 1),
(30, 20, 45, 84, 'Startup Ideas for Sagar, on day7 the last day of SEED training sessions', 'Participate in brainstorming sessions to generate startup concepts that align with the specific opportunities and requirements of Sagar Smart City.', ' .....', 'Startups', 'Engage in idea brainstorming for potential startup concepts tailored to Sagar Smart City\'s unique op', '#', 'https://youtube.com/embed/ucgESleOkz4', '#', '2023-09-13 07:20:49', 1),
(31, 20, 43, 53, 'How to get DPIIT recognization for your startups and it\'s benefit', 'To gain tax advantages and simplified compliance procedures, firms must attain recognition as startups through the Startup India initiative by the Department for Promotion of Industry and Internal Trade (DPIIT).', ' ....', 'Startups\r\n', 'To access tax benefits and easier compliance, companies have to be recognized as Startups by the Dep', '#', 'https://youtube.com/embed/nIW8wWmPJfI', '#', '2023-09-13 07:29:44', 1),
(32, 17, 40, 86, 'Workshop- MP Startup Policy 2022 by SPARK Incubation center', 'These policies are designed to promote and support the growth of startups within the state by offering various incentives, funding opportunities, and infrastructure support to budding entrepreneurs and innovative businesses. The specifics of the policy can vary over time, so it\'s essential to refer to the latest version or official government sources for detailed information on the MP Startup Policy.', ' .....', 'Startups', 'Learn about the benefits of MP startup Policy ', '#', 'https://youtube.com/embed/LGY8XYmTwSc', '#', '2023-09-13 07:41:50', 1),
(33, 1, 54, 87, 'Technology need for Startups', 'Digital transformation has reshaped global economies, enabling businesses to innovate and address real-world issues through technology-driven solutions. Technology opens avenues for revenue and customer-centric outcomes. Entrepreneurs must harness appropriate tech tools and technologies to capitalize on these opportunities.', ' ....', 'Startups', 'Digital transformation has redefined economies across the world by letting companies innovate and de', '#', 'https://youtube.com/embed/-J-83kuivyw', '#', '2023-09-13 07:46:31', 1),
(34, 13, 55, 88, 'Importance of Business Model', 'A business model\'s significance lies in its core role, shaping a company\'s operations, revenue generation, and long-term growth sustainability.', ' .....', 'Startups', 'The importance of a business model lies in its fundamental role in shaping how a company operates, g', '#', 'https://youtube.com/embed/59NfDxNmxG4', '#', '2023-09-13 07:51:22', 1),
(35, 16, 39, 46, 'How to Prepare a Perfect Pitch Deck?', 'Preparing a perfect pitch deck is crucial for entrepreneurs seeking investment or trying to persuade stakeholders about their business idea. A pitch deck is typically a concise presentation that outlines your business, its value proposition, and your plans for growth. ', ' ....', 'Startups', 'Creating a perfect pitch deck involves several crucial steps and elements. ', '#', 'https://youtube.com/embed/G8_C9wnAmlg', '#', '2023-09-14 06:22:06', 1),
(36, 18, 41, 50, 'What to do if Similar Idea already exits?', 'If a similar idea or product already exists in the market, it\'s essential to address this in your pitch deck and explain how your approach is different and why it has the potential to succeed.', ' .....', 'Startups', 'how to differentiate your approach and stand out in the market?', '#', 'https://youtube.com/embed/Ks-14tpdm18', '#', '2023-09-14 06:29:29', 1),
(37, 21, 46, 56, 'Agritech startup transforming the farming sector ', 'An AgriTech startup that aims to transform the farming sector leverages innovative technology and solutions to address various challenges faced by farmers, enhance agricultural productivity, and contribute to sustainable farming practices.', ' .....', 'Startups ', '(1) Mission and Vision (2) Innovative Solutions', '#', 'https://youtube.com/embed/GwSJJE5SqoQ', '#', '2023-09-14 06:43:50', 1),
(38, 28, 56, 89, 'Technology Traning for Non - Tech startups', 'Technology is a powerful driver of growth and innovation. For non-tech startups, embracing technology is not just an option but a necessity to stay competitive and thrive in the digital era.', ' .....', 'Startups', 'variety of essential skills and concepts that can help you effectively leverage technology for your ', '#', 'https://youtube.com/embed/HLQFoKWlxLw', '#', '2023-09-14 10:28:05', 1),
(39, 28, 56, 90, 'Basic Architecture  of web/app based system', '\"Basic Architecture of Web/App-Based Systems\" course provides an insightful exploration into the fundamental components and principles that underpin these systems.', ' .....', 'Startups', ' fundamental concepts and components that are essential for designing and understanding these system', '#', 'https://youtube.com/embed/aAGZxHFhk4Q', '#', '2023-09-14 10:36:29', 1),
(40, 28, 56, 91, 'Basic Architecture of web/ App Based System 2', '\"Basic Architecture of Web/App-Based Systems\" course provides an insightful exploration into the fundamental components and principles that underpin these systems.', '...', 'Startups', 'Fundamental concepts and components that are essential for designing and understanding these systems', '#', 'https://youtube.com/embed/KfRpro1T6fQ', '#', '2023-09-14 10:39:05', 1),
(41, 28, 56, 92, 'Front End , Back End and Business Layer', 'Understanding the architecture of these systems is vital for developers, entrepreneurs, and professionals across various industries. Our course, \"Front End, Back End, and Business Layer: Understanding Web/Application System Architecture,\" offers a comprehensive exploration of the core components that constitute these systems.', ' ......', 'Startups', 'Understanding Web/Application System Architecture.', '#', 'https://youtube.com/embed/8fSN14ebTwg', '#', '2023-09-14 10:44:20', 1),
(42, 28, 56, 93, 'E-commerce Store Development ', 'E-commerce store development refers to the process of creating, designing, and building an online platform or website where businesses can sell their products or services to customers over the internet. ', ' ......', 'Startups', 'wide range of skills and knowledge related to building and managing online retail platforms.', '#', 'https://youtube.com/embed/nAJyLjX5t3Q', '#', '2023-09-14 10:54:19', 1),
(43, 28, 56, 94, 'Google Analytics Data Collection ', 'Analytics is a powerful web analytics service provided by Google that helps website and app owners track and analyze user behavior to gain insights into how their digital assets are performing. ', ' ......', 'Startups', 'Gathering and utilizing data from your website or mobile app.', '#', 'https://youtube.com/embed/vEIzMOuk9KQ', '#', '2023-09-14 11:01:10', 1),
(44, 28, 56, 95, 'Basic Search Engine Optimization (SEO) and Effective Internet Persence', 'Basic Search Engine Optimization (SEO) and Effective Internet Presence refer to fundamental strategies and practices that individuals and businesses use to improve their visibility and impact on the internet.', ' ....', 'Startups', 'Understanding SEO Fundamentals.', '#', 'https://youtube.com/embed/u1PLV2g-HyQ', '#', '2023-09-14 11:15:24', 1),
(45, 28, 56, 96, 'Basic of E-commerce and Online Selling ', 'E-commerce and online selling refer to the fundamental principles and practices involved in conducting business transactions, primarily the buying and selling of products or services, through digital channels and platforms. ', ' ......', 'Startups ', 'Understand the foundational concepts and principles of e-commerce, including its history, types, and', '#', 'https://youtube.com/embed/1fCFvTiMOuI', '#', '2023-09-14 11:20:34', 1),
(46, 28, 56, 96, 'Online Designing Tool', 'online designing tool is a web-based application or software that allows users to create, edit, and manipulate visual designs and graphics without the need for complex desktop design software. ', ' .....', 'Startups', 'Basic of Designing..', '#', 'https://youtube.com/embed/oWyTQNv9n50', '#', '2023-09-16 06:19:34', 0),
(47, 28, 56, 97, 'Online Designing Tool', 'online designing tool is a web-based application or software that allows users to create, edit, and manipulate visual designs and graphics without the need for complex desktop design software.', ' .....', 'Startups', 'Basic of Online Designing Tool', '#', 'https://youtube.com/embed/oWyTQNv9n50', '#', '2023-09-16 06:22:03', 1),
(48, 28, 56, 98, 'Hosting Solutions', 'Hosting solutions refer to a range of services and technologies that enable individuals and organizations to make their websites, applications, and digital content accessible on the internet.', ' ......', 'Startups', 'These solutions provide the infrastructure and resources necessary to store, manage, and deliver dig', '#', 'https://youtube.com/embed/6Slw7J35J_Y', '#', '2023-09-16 06:29:44', 1),
(49, 28, 56, 99, 'Outlook & MS Word', 'Outlook and Microsoft Word are two widely used software applications developed by Microsoft, each serving distinct purposes in the world of productivity, communication, and document creation. ', ' .....', 'Startups', 'Email Management,Task and To-Do List Management', '#', 'https://youtube.com/embed/d4XVXw08PKY', '#', '2023-09-16 06:34:33', 1),
(50, 28, 56, 100, 'Graduation Day of Tech Pathshala', 'The description of the Graduation Day at Tech Pathshala would typically involve an overview of the event, its significance, and what participants and attendees can expect.', ' .....', 'Startups', 'The description of the Graduation Day at Tech Pathshala would typically involve an overview of the e', '#', 'https://youtube.com/embed/IESlo_styYE', '#', '2023-09-16 06:38:46', 1),
(51, 15, 57, 101, 'Why idea validation is important for your business ', 'Idea validation is a crucial step in the development and success of any business. It involves thoroughly assessing and testing your business concept before investing significant time, money, and resources into it. ', ' ......', 'Startups', 'Market Demand,Competitive Landscape,Customer Feedback', '#', 'https://youtube.com/embed/fIOVDrWplkU', '#', '2023-09-16 07:05:33', 1),
(52, 29, 60, 104, 'Impact of Budget 22 on Startups ', 'The impact of a national budget, such as \"Budget 22,\" on startups can be significant, as government fiscal policies and financial allocations can directly influence the startup ecosystem. ', ' .............', 'Startups', 'The key takeaway from the impact of a national budget on startups is that government fiscal policies', '#', 'https://youtube.com/embed/WJFS9PndAKs', '#', '2023-09-16 07:34:01', 1),
(53, 8, 58, 102, 'How to Formalize a legal business structure\"? ', 'Formalizing a legal business structure is a crucial step in establishing your business as a distinct legal entity. The process involves choosing the appropriate legal structure, registering your business with the relevant authorities, and complying with legal and regulatory requirements. ', ' .................', 'Startups', 'Formula to learn about legal business structure.', '#', 'https://youtube.com/embed/LfhStJ8MmS8', '#', '2023-09-16 07:37:32', 1),
(54, 8, 59, 103, 'Celebrating World Intellectual Property Day-22 legal ', 'Celebrating World Intellectual Property Day on April 26th each year is an opportunity to recognize the importance of intellectual property (IP) and its role in fostering innovation, creativity, and economic growth.', ' .....', 'Startups', 'what is the IPR?', '#', 'https://youtube.com/embed/o8Q5MUnTKXk', '#', '2023-09-16 07:40:07', 1),
(55, 8, 61, 105, 'Types of Companies and Cost of Non Compliance', 'Companies are subject to various regulations and compliance requirements depending on their legal structure, industry, and jurisdiction', ' ......', 'Startups', 'These regulations are in place to ensure legal and ethical conduct, protect stakeholders, and mainta', '#', 'https://youtube.com/embed/5X_w8DDiigE', '#', '2023-09-16 07:42:25', 1),
(56, 30, 64, 108, 'Survival strategies for startups during Covid-19', '\r\nSurvival strategies for startups during the COVID-19 pandemic require adaptability, resilience, and a proactive approach to navigate the challenging business environment. ', ' .....', 'startups', 'How to sustain your startups.', '#', 'https://youtube.com/embed/dPBl5R_tb2s', '#', '2023-09-16 07:55:43', 1),
(57, 15, 35, 42, 'Product lifecycle Management ', 'Product Lifecycle Management (PLM) is a comprehensive approach to managing the entire lifecycle of a product, from its initial concept and design through production, use, and eventual disposal or retirement.', '.....', 'Startups', 'how to lunch product in market ', '#', 'https://youtube.com/embed/uhkn3OxHars', '#', '2023-09-16 07:58:47', 1),
(58, 31, 65, 107, 'Startups For Sustainable Development Goals (SDGs) basic of enterprenureship ', 'Startups for Sustainable Development Goals (SDGs) represent a growing movement of entrepreneurs and businesses that are committed to addressing some of the world\'s most pressing social, economic, and environmental challenges outlined in the United Nations\' 17 Sustainable Development Goals.', ' ....', 'Startups', '..', '#', 'https://youtube.com/embed/5j5O6Xkom4g', '#', '2023-09-16 08:00:44', 1),
(59, 3, 63, 109, 'Mindful Entrepreneurship ', 'Mindful entrepreneurship is an approach to business that emphasizes the integration of mindfulness practices and principles into the entrepreneurial journey. It involves cultivating a heightened awareness of the present moment, fostering a deeper understanding of oneself and the business environment, and integrating these insights into decision-making and daily operations.', ' ....', 'Startups', '..', '#', 'https://youtube.com/embed/Af7U8B2EC78', '#', '2023-09-16 08:02:32', 1),
(60, 6, 19, 23, 'What is Startup Valuation and why you need to calculate valuation for your startup?', 'In this webinar we will understand the various aspects of startup valuation, importance of startup valuation and what are the methods by which you can evaluate the valuation of your startup.', ' N/A', 'Startups and Entrepreneurs.', 'In this webinar we have learnt the various aspects of startup valuation, importance of startup valua', 'https://www.youtube.com/live/dWxXrPiLOdI?si=diYqmwEnM43ojFOI', 'https://www.youtube.com/embed/dWxXrPiLOdI?si=diYqmwEnM43ojFOI', 'N/A', '2023-12-08 07:36:21', 0),
(61, 18, 41, 51, '10 Biggest Mistakes that every startup founder must avoid.', 'In this session we will understand the 10 Biggest Mistakes every startup founder must avoid.', ' N/A', 'Startups and Entrepreneurs', 'In this session we learnt the 10 Biggest Mistakes that every startup founder must avoid.', 'N/A', 'https://www.youtube.com/embed/ZyXgHxfFUI8?si=f3hYfXQAlT2O1UVL', 'N/A', '2023-12-08 07:40:53', 0),
(62, 5, 14, 18, 'Importance of Social Media and Digital Marketing ', 'In this session we will learn the importance of social media and Digital Marketing.', ' N/A', 'N/A', 'In this session we learnt the importance of social media and Digital Marketing.', 'N/A', 'https://www.youtube.com/embed/OzhVz_7OjSY?si=G-cDfCcJ79avBp1B', 'N/A', '2023-12-08 07:47:12', 0),
(63, 26, 50, 68, 'Content Creation Techniques to Structure Your Sales Presentation', 'In this session we will learn Content Creation Techniques to Structure Your Sales Presentation', ' N/A', 'Startups who want to learn content creation technique.', 'In this session we learnt Content Creation Techniques to Structure Your Sales Presentation', 'N/A', 'https://youtube.com/embed/g500r-AP0_E', 'N/A', '2023-12-09 08:41:42', 1),
(64, 18, 41, 49, 'The Importance of Company Formation for Startups', 'In this webinar we will learn the Importance of Company Formation for Startups', ' N/A', 'N/A', 'In this webinar we will learn the Importance of Company Formation for Startups', 'N/A', 'https://youtube.com/embed/zt8A3jCCQ7Y', 'N/A', '2023-12-09 08:50:49', 1),
(65, 22, 47, 74, 'Day 2: Winning Strategy for Bundelkhand Spark Hackathon 2.0', 'Webinar for Day 2: Winning Strategy for Bundelkhand Spark Hackathon 2.0', ' N/A', ' N/A', 'Webinar for Day 2: Winning Strategy for Bundelkhand Spark Hackathon 2.0', ' N/A', 'https://youtube.com/embed/jiXWlLFpJuY', ' N/A', '2023-12-09 08:54:59', 1),
(66, 22, 47, 74, 'Day 3: Winning Strategy Bundelkhand Spark Hackathon 2.0', 'Webinar Day 3: Winning Strategy Bundelkhand Spark Hackathon 2.0', 'N/A', 'N/A', 'Webinar Day 3: Winning Strategy Bundelkhand Spark Hackathon 2.0', 'N/A', 'https://youtube.com/embed/ZFJtmybG56E', 'N/A', '2023-12-09 09:20:55', 1),
(67, 22, 47, 74, 'Winning strategies for Hackathon', 'In this webinar we will learn the winning strategies for Hackathon', ' N/A', 'N/A', 'In this webinar we will learn the winning strategies for Hackathon', 'N/A', 'https://youtube.com/embed/GEsfAVRhUv0', 'N/A', '2023-12-09 09:23:46', 1),
(68, 31, 65, 107, 'Startups For Sustainable Development Goals (SDGs)', 'In this webinar we will learn the basics of Sustainable Development Goals (SDGs)', ' N/A', ' N/A', 'In this webinar we will learn the basics of Sustainable Development Goals (SDGs)', ' N/A', 'https://youtube.com/embed/5j5O6Xkom4g', ' N/A', '2023-12-09 09:27:01', 1),
(69, 17, 40, 86, 'Workshop- MP Startup Policy 2022 by SPARK Incubation center', 'This is the workshop to learn MP Startup Policy 2022 by SPARK Incubation center', 'N/A', 'N/A', 'This is the workshop to learn MP Startup Policy 2022 by SPARK Incubation center', 'N/A', 'https://youtube.com/embed/LGY8XYmTwSc', 'N/A', '2023-12-09 09:29:43', 1),
(70, 32, 66, 110, 'Celebrating World Intellectual Property Day-22', 'In this webinar we will Celebrate World Intellectual Property Day-22', ' N/A', ' N/A', 'In this webinar we will Celebrate World Intellectual Property Day-22', ' N/A', 'https://youtube.com/embed/o8Q5MUnTKXk', ' N/A', '2023-12-09 09:37:01', 1),
(71, 16, 39, 46, 'How to prepare a Perfect Pitch Deck', 'In this webinar we will learn-How to prepare a Perfect Pitch Deck', 'N/A', 'N/A', 'In this webinar we will learn-How to prepare a Perfect Pitch Deck', 'N/A', 'https://youtube.com/embed/G8_C9wnAmlg', 'N/A', '2023-12-09 09:39:06', 1),
(72, 8, 58, 102, 'How to Formalize a legal business structure?', 'In this webinar we will learn-How to Formalize a legal business structure?', ' N/A', 'N/A', 'In this webinar we will learn-How to Formalize a legal business structure?', 'N/A', 'https://youtube.com/embed/LfhStJ8MmS8', 'N/A', '2023-12-09 09:44:49', 1),
(73, 33, 67, 111, 'Product lifecycle Management', 'In this webinar we will learn the product lifecycle management', ' N/A', 'Startups', 'In this webinar we will learn the product lifecycle management', ' N/A', 'https://youtube.com/embed/uhkn3OxHars', ' N/A', '2023-12-09 09:51:30', 1),
(74, 29, 60, 104, 'Impact of Budget 22 on Startups', 'In this webinar we will learn the Impact of Budget 2022 on Startups', ' N/A', 'Startups', 'In this webinar we will learn the Impact of Budget 2022 on Startups', 'N/A', 'https://youtube.com/embed/WJFS9PndAKs', 'N/A', '2023-12-09 09:53:44', 1),
(75, 21, 46, 56, 'How AgriTech startups are changing the agricultural field', 'In this webinar we will learn how AgriTech startups are changing the agricultural field', ' N/A', 'AgriTech startups', 'In this webinar we will learn how AgriTech startups are changing the agricultural field', 'N/A', 'https://youtube.com/embed/GwSJJE5SqoQ', 'N/A', '2023-12-09 09:57:47', 1),
(76, 30, 64, 108, 'Survival strategies for startups during Covid-19', 'In this webinar we will learn about the survival strategies for startups during Covid-19', ' N/A', 'All', 'In this webinar we will learn about the survival strategies for startups during Covid-19', ' N/A', 'https://youtube.com/embed/dPBl5R_tb2s', ' N/A', '2023-12-09 09:59:45', 1),
(77, 34, 68, 112, 'How to get DPIIT recognition for your startups and it\'s benefit.', 'In this webinar we will learn-how to get DPIIT recognition for your startups and it\'s benefit?', ' N/A', 'Startups', 'In this webinar we will learn-how to get DPIIT recognition for your startups and it\'s benefit?', 'N/A', 'https://youtube.com/embed/nIW8wWmPJfI', 'N/A', '2023-12-09 10:06:31', 1),
(78, 22, 47, 74, 'Winning strategies for Hackathon', 'In this webinar we will watch and learn the Winning Strategies for Hackathon', ' N/A', 'Startups', 'In this webinar we will watch and learn the Winning Strategies for Hackathon', ' N/A', 'https://youtube.com/embed/ZsKgftwUYbk', ' N/A', '2023-12-09 10:09:14', 1),
(79, 22, 47, 73, 'Brainstorming Ideas for HACKATHON', 'In this webinar we will learn the brainstorming Ideas for HACKATHON', ' N/A', 'Startups', 'In this webinar we will learn the brainstorming Ideas for HACKATHON', 'N/A', 'https://youtube.com/embed/daUjTTtxUqU', 'N/A', '2023-12-09 10:12:18', 1),
(80, 22, 53, 72, 'Things you should know before your first HACKATHON', 'This webinar is to learn the things you should know before your first HACKATHON.', ' N/A', 'Startups', ' we learned the things you should know before your first HACKATHON.', 'N/A', 'https://youtube.com/embed/iD_jTMQk-0w', 'N/A', '2023-12-09 10:15:14', 1),
(81, 20, 45, 77, 'Know everything about Startup Seed Fund Scheme', 'In this webinar we will know everything about Startup Seed Fund Scheme', ' N/A', 'Startups', 'In this webinar we learned everything about Startup Seed Fund Scheme', 'N/A', 'https://youtube.com/embed/ENJPecanCqg', 'N/A', '2023-12-09 10:18:31', 1),
(82, 35, 69, 113, 'Mindful Entrepreneurship', 'This webinar is on the topic-Mindful Entrepreneurship', ' N/A', 'Startups and entrepreneurs', 'This webinar is on the topic-Mindful Entrepreneurship', 'N/A', 'https://youtube.com/embed/Af7U8B2EC78', 'N/A', '2023-12-09 10:24:21', 1),
(83, 1, 54, 87, 'Technology need for Startups', 'In this webinar we will learn about technology need for Startups', ' N/A', 'Startups', 'In this webinar we learned about technology need for startups.', 'N/A', 'https://youtube.com/embed/-J-83kuivyw', 'N/A', '2023-12-09 10:28:06', 1),
(84, 8, 61, 105, 'Types of Companies and Cost of Non-Compliance', 'In this webinar we will learn about the types of Companies and Cost of Non-Compliance', ' N/A', 'Startups', 'In this webinar we learned about the types of Companies and Cost of Non-Compliance', ' N/A', 'https://youtube.com/embed/5X_w8DDiigE', ' N/A', '2023-12-09 10:31:18', 1),
(85, 8, 21, 70, 'Legal Basics that every Startup should do', 'In this webinar we will learn the legal Basics that every Startup should do', ' N/A', 'Startups', 'In this webinar we learned the legal Basics that every Startup should do', 'N/A', 'https://youtube.com/embed/xcc860uDHJI', ' N/A', '2023-12-09 10:34:07', 1),
(86, 36, 70, 114, 'Taxation Simplified for Successful Startups', 'In this webinar we will learn about taxation Simplified for Successful Startups', ' N/A', 'Startups', 'In this webinar we learned about the taxation simplified for the successful startups.', 'N/A', 'https://youtube.com/embed/TauwMcSGoMk', ' N/A', '2023-12-09 10:43:27', 1),
(87, 13, 51, 69, 'Sustainable business models for successful startups', 'In this webinar we will learn about the sustainable business models for successful startups', ' N/A', 'Startups', 'In this webinar we learned about the sustainable business models for successful startups', ' N/A', 'https://youtube.com/embed/2u8V66ImRiw', ' N/A', '2023-12-09 10:46:17', 1),
(88, 28, 56, 100, 'Graduation Day - Tech Pathshala 2021, a 15 days long Technical Training by SSCL', 'This webinar is about the Graduation Day - Tech Pathshala 2021, a 15 days long Technical Training by SSCL', ' N/A', 'startups', 'In this webinar we learned about the Graduation Day - Tech Pathshala 2021, a 15 days long Technical ', ' N/A', 'https://youtube.com/embed/IESlo_styYE', ' N/A', '2023-12-09 10:49:50', 1),
(89, 28, 56, 89, '12th day of the LIVE Technical classes Tech Pathshala 2021', 'In this webinar we will attend the 12th day of the LIVE Technical classes Tech Pathshala 2021', ' N/A', 'Startups', 'In this webinar we will attend the 12th day of the LIVE Technical classes Tech Pathshala 2021', ' N/A', 'https://youtube.com/embed/6Slw7J35J_Y', ' N/A', '2023-12-09 10:53:53', 1),
(90, 28, 56, 89, '13th day of the LIVE Technical classes - Tech Pathshala 2021', 'In this webinar we will attend the 13th day of the LIVE Technical classes - Tech Pathshala 2021', ' N/A', 'Startups', 'In this webinar we learned the 13th day of the LIVE Technical classes - Tech Pathshala 2021', ' N/A', 'https://youtube.com/embed/d4XVXw08PKY', ' N/A', '2023-12-09 10:56:14', 1),
(91, 28, 56, 89, '14th day of the LIVE Technical classes - Tech Pathshala 2021', 'In this webinar we will attend the 14th day of the LIVE Technical classes - Tech Pathshala 2021', ' N/A', 'Startups', 'In this webinar we will attend the 14th day of the LIVE Technical classes - Tech Pathshala 2021', ' N/A', 'https://youtube.com/embed/vpbnOWpbgUk', ' N/A', '2023-12-09 10:58:43', 1),
(92, 28, 56, 89, 'Eleventh day of the LIVE Technical classes for Startup Founders - Tech Pathshala 2021', 'In this webinar we will attend the Eleventh day of the LIVE Technical classes for Startup Founders - Tech Pathshala 2021', ' N/A', 'Startups', 'In this webinar we will attend the Eleventh day of the LIVE Technical classes for Startup Founders -', ' N/A', 'https://youtube.com/embed/oWyTQNv9n50', ' N/A', '2023-12-09 11:02:45', 1),
(93, 28, 56, 89, 'Tenth day of Tech Pathshala 2021', 'This webinar is for the tenth day of Tech Pathshala 2021', ' N/A', 'Startups and Entrepreneurs', 'In this webinar we learned from the tenth day of Tech Pathshala 2021', ' N/A', 'https://youtube.com/embed/2q86df_TMMk', ' N/A', '2023-12-11 06:12:03', 1),
(94, 28, 56, 89, 'Ninth day of the LIVE Technical classes for Startup Founders - Tech Pathshala 2021', 'This webinar is the ninth day of the Live technical classes for the startup founders-Tech Pathshala 2021', ' N/A', 'Startups and Entrepreneurs', 'In this webinar we understood the ninth day activity  of the Live technical classes for the startup ', ' N/A', 'https://youtu.be/embed/DkBAjjZNxU', ' N/A', '2023-12-11 06:15:37', 1),
(95, 28, 56, 89, 'Eighth day of the LIVE Technical classes for Startup Founders - Tech Pathshala 2021', 'This webinar is the Eighth day of the LIVE Technical classes for Startup Founders - Tech Pathshala 2021', ' N/A', 'Startups and Entrepreneurs', 'We learned from the Eighth day of the LIVE Technical classes for Startup Founders - Tech Pathshala 2', ' N/A', 'https://youtube.com/embed/1fCFvTiMOuI', ' N/A', '2023-12-11 06:18:15', 1),
(96, 28, 56, 89, 'Seventh day of the LIVE Technical classes for Startup Founders - Tech Pathshala 2021', 'This webinar is the Seventh day of the LIVE Technical classes for Startup Founders - Tech Pathshala 2021', ' ', 'Startups and Entrepreneurs', 'We understood the concept in the Seventh day of the LIVE Technical classes for Startup Founders - Te', ' N/A', 'https://youtube.com/embed/u1PLV2g-HyQ', 'N/A', '2023-12-11 06:21:00', 1),
(97, 28, 56, 89, 'Sixth day of the LIVE Technical classes for Startup Founders - Tech Pathshala 2021', 'This webinar is the Sixth day of the LIVE Technical classes for Startup Founders - Tech Pathshala 2021', ' N/A', 'Startups and Entrepreneurs', 'In this webinar we understood the concept of the Sixth day of the LIVE Technical classes for Startup', ' N/A', 'https://youtube.com/embed/vEIzMOuk9KQ', ' N/A', '2023-12-11 06:23:07', 1),
(98, 28, 56, 89, 'Fifth day of the LIVE Technical classes for Startup Founders - Tech Pathshala 2021', 'This webinar is the fifth day of the LIVE Technical classes for Startup Founders - Tech Pathshala 2021', ' N/A', 'Startups and Entrepreneurs', 'In this webinar we understood the concept of the fifth day of the LIVE Technical classes for Startup', ' N/A', 'https://youtube.com/embed/nAJyLjX5t3Q', 'N/A', '2023-12-11 06:25:47', 1),
(99, 28, 56, 89, 'Fourth day of Tech Pathshala - Technical classes for Startup Founders by SPARK', 'This webinar is the Fourth day of Tech Pathshala - Technical classes for Startup Founders by SPARK', ' N/A', 'Startups and Entrepreneurs', 'In this webinar we understood the concept of the Fourth day of Tech Pathshala - Technical classes fo', ' N/A', 'https://youtube.com/embed/8fSN14ebTwg', ' N/A', '2023-12-11 06:27:59', 1),
(100, 28, 56, 89, 'Third day of the LIVE Technical classes for Startup Founders - Tech Pathshala 2021', 'This webinar is the Third day of the LIVE Technical classes for Startup Founders - Tech Pathshala 2021', ' N/A', 'Startups and Entrepreneurs', 'In this webinar we understood the concept of the Third day of the LIVE Technical classes for Startup', ' N/A', 'https://youtube.com/embed/KfRpro1T6fQ', 'N/A', '2023-12-11 06:30:26', 1),
(101, 28, 56, 89, '2nd Dayof - Tech Pathshala 2021 by Sagar Smart City Limited Incubation Center (SPARK)', 'This webinar is the 2nd Day of - Tech Pathshala 2021 by Sagar Smart City Limited Incubation Center (SPARK)', ' N/A', 'Startups and Entrepreneurs', 'In this webinar we understood the concept of the 2nd Dayof - Tech Pathshala 2021 by Sagar Smart City', 'N/A', 'https://youtube.com/embed/aAGZxHFhk4Q', ' N/A', '2023-12-11 07:41:47', 1),
(102, 28, 56, 89, 'Inaugural Session of 15 days long FREE Technical Classes \"Tech Pathshala\"', 'This webinar is the Inaugural Session of 15 days long FREE Technical Classes \"Tech Pathshala\"', ' N/A', 'Startups and Entrepreneurs', 'In this webinar we understood the Inaugural Session of 15 days long FREE Technical Classes \"Tech Pat', ' N/A', 'https://youtube.com/embed/HLQFoKWlxLw', 'N/A', '2023-12-11 07:44:34', 1),
(103, 13, 55, 88, 'Importance of Business Model', 'Importance of Business Model', ' N/A', 'Startups and Entrepreneurs', 'Importance of Business Model', ' N/A', 'https://youtube.com/embed/59NfDxNmxG4', ' N/A', '2023-12-11 07:46:15', 1),
(104, 15, 57, 101, 'Startup Idea Validation Stage', 'This webinar is for the startup Idea Validation Stage', ' N/A', 'Startups and Entrepreneurs', 'In this webinar we learnt the startup Idea Validation Stage', 'N/A', 'https://youtube.com/embed/fIOVDrWplkU', 'N/A', '2023-12-11 07:49:15', 1),
(105, 15, 36, 43, 'How to use difference Techniques to research if A similar Idea already Exist? by SPARK', 'How to use difference Techniques to research if A similar Idea already Exist? by SPARK', ' N/A', 'Startups and Entrepreneurs ', 'How to use difference Techniques to research if A similar Idea already Exist? by SPARK', ' N/A', 'https://youtube.com/embed/Ks-14tpdm18', ' N/A', '2023-12-11 07:52:35', 1),
(106, 20, 45, 55, 'Startup Ideas for Sagar, on day7 the last day of SEED training sessions', 'This webinar is for the Startup Ideas for Sagar, on day7 the last day of SEED training sessions', ' N/A', 'Startups and Entrepreneurs', 'In this webinar we understand the Startup Ideas for Sagar, on day7 the last day of SEED training ses', 'N/A', 'https://youtube.com/embed/ucgESleOkz4', 'N/A', '2023-12-11 07:56:33', 1),
(107, 20, 45, 55, '#Day6 of Startup Training Classes (SEED) by Sagar Smart City Limited - Startup Funding', 'This webinar is for the Day6 of Startup Training Classes (SEED) by Sagar Smart City Limited - Startup Funding', ' N/A', 'Startups and Entrepreneurs', 'In this webinar we understood the Day6 of Startup Training Classes (SEED) by Sagar Smart City Limite', ' N/A', 'https://youtube.com/embed/D6Nb5wvASoo', ' N/A', '2023-12-11 08:01:28', 1),
(108, 8, 21, 70, '#Day5 of Startup Training Classes (SEED) by Sagar Smart City Limited - Legal and Compliance', 'This webinar is the Day5 of Startup Training Classes (SEED) by Sagar Smart City Limited - Legal and Compliance', ' N/A', 'startups and entrepreneurs', 'In this webinar we understood the Day5 of Startup Training Classes (SEED) by Sagar Smart City Limite', 'N/A', 'https://youtube.com/embed/xGS0WKEovfk', 'N/A', '2023-12-11 08:05:42', 1),
(109, 15, 38, 45, 'SundaySpecial - Day#4 of Startup Training Classes (SEED) by Sagar Smart City - Startup Stages', 'This webinar is related to the startup stages', ' N/A', 'Startups and Entrepreneurs', 'We understood the startup stages', ' N/A', 'https://youtube.com/embed/zxlLtHtDqyU', ' N/A', '2023-12-11 08:09:53', 1),
(110, 34, 68, 112, 'Day#3 - What is Startup India Program, what is DPIIT? - SEED sessions by Sagar Smart City Limited', 'Day#3 - What is Startup India Program, what is DPIIT? - SEED sessions by Sagar Smart City Limited', ' N/A', 'Startups and Entrepreneurs', 'Day#3 - What is Startup India Program, what is DPIIT? - SEED sessions by Sagar Smart City Limited', 'N/A', 'https://youtube.com/embed/00rW-Jjnw_Q', 'N/A', '2023-12-11 08:15:20', 1),
(111, 20, 45, 79, 'Day 2 of SEED Session by SSCL - Incubation Center and how it can help in funding the statups', 'This webinar is the Day 2 of SEED Session by SSCL - Incubation Center and how it can help in funding the statups', ' N/A', 'Startups and Entrepreneurs', 'In this webinar we understood the Day 2 of SEED Session by SSCL - Incubation Center and how it can h', ' N/A', 'https://youtube.com/embed/WGm9E4muW3s', ' N/A', '2023-12-11 08:23:15', 1),
(112, 20, 45, 78, 'Day#1 of SEED by Sagar Smart City Limited', 'This webinar is the Day#1 of SEED by Sagar Smart City Limited', ' N/A', 'Startups and Entrepreneurs', 'In this webinar we watched and understood the Day#1 of SEED by Sagar Smart City Limited', 'N/A', 'https://youtube.com/embed/SCO31nSqBKU', 'N/A', '2023-12-11 08:26:16', 1),
(113, 23, 48, 59, 'Know your market and how to estimate your target market size', 'This webinar is to know your market and how to estimate your target market size', ' N/A', 'Startups and Entrepreneurs', 'In this webinar we Know our market and how to estimate your target market size', ' N/A', 'https://www.youtube.com/embed/yBoVdnjcaD4?si=waCvLcP2ZTZk5vne', ' N/A', '2023-12-11 08:31:21', 1),
(114, 37, 71, 115, 'Know your customers and tips to  get your first customer ', 'This webinar is to know your customers and tips to\r\n get your first customer ', ' N/A', 'startups and entrepreneurs', 'In this webinar we understand and know our customers and tips to\r\n get your first customer ', ' N/A', 'https://www.youtube.com/embed/D4-vEAGpres?si=x-7FK25KUn5ybQaR', ' N/A', '2023-12-11 08:37:29', 1),
(115, 15, 37, 44, 'How to create MVP and specifying  Your Minimum Viable Product (MVP) Feature Set', 'This webinar is for how to create MVP and specifying \r\nYour Minimum Viable Product (MVP) Feature Set', ' N/A', 'startups and entrepreneurs', 'In this webinar we learned-how to create MVP and specifying \r\nYour Minimum Viable Product (MVP) Feat', 'N/A', 'https://www.youtube.com/embed/29RKwtGzy_M?si=5p17Xy-qMdXlBqat', 'N/A', '2023-12-11 08:40:59', 1),
(116, 13, 32, 38, 'Case Study - Learn  from Unicorn companies\' MVPs', 'This webinar is the Case Study to Learn\r\n from Unicorn companies\' MVPs', ' N/A', 'startups and entrepreneurs', 'Case Study - Learn\r\n from Unicorn companies\' MVPs', ' N/A', 'https://www.youtube.com/embed/Ret6ZrS2l7s?si=3hMBXmEgojxC5v3Y', ' N/A', '2023-12-11 08:44:20', 1),
(117, 38, 72, 116, 'What is Pricing Strategy? Why is it needed?', 'This webinar is to understand about What is Pricing Strategy? Why is it needed?', ' ', 'startups and entrepreneurs', 'In this webinar we will learn about What is Pricing Strategy? Why is it needed?', 'N/A', 'https://www.youtube.com/embed/xLs8TwCcJzY?si=pCcIHB3uS4HALxHY', 'N/A', '2023-12-11 08:48:42', 1);
INSERT INTO `video_upload` (`id`, `tid`, `cid`, `subid`, `title`, `description`, `requirement`, `this_course_is_for`, `what_you_learn`, `intro_video`, `main_video`, `doc_file`, `uploaded_date`, `status`) VALUES
(118, 23, 48, 60, 'How to estimate budget for sales and marketing', 'This webinar is how to estimate budget for sales and marketing', ' N/A', 'startups and entrepreneurs', 'In this webinar we learned how to estimate budget for sales and marketing', ' N/A', 'https://www.youtube.com/embed/Uw7BN-hmDXc?si=KFR8u8Ubwyz8VfpJ', ' N/A', '2023-12-11 08:51:28', 1),
(119, 5, 14, 18, 'Importance of Social Media and Digital Marketing ', 'This webinar is for the Importance of Social Media and Digital Marketing ', ' N/A', 'startups and entrepreneurs', 'In this webinar we learn the Importance of Social Media and Digital Marketing ', 'N/A', 'https://www.youtube.com/embed/OzhVz_7OjSY?si=9Y0-_IWCEfSD8-FW', 'N/A', '2023-12-11 08:53:26', 1),
(120, 18, 41, 51, '10 Biggest Mistakes every startup founder must avoid', 'This webinar is for the 10 Biggest Mistakes every startup founder must avoid', ' N/A', 'startups and entrepreneurs', 'In this webinar we understand the 10 Biggest Mistakes every startup founder must avoid', ' N/A', 'https://www.youtube.com/embed/ZyXgHxfFUI8?si=ySdkYxmI55EmjoUF', ' N/A', '2023-12-11 08:55:54', 1),
(121, 39, 73, 117, 'What is Startup Valuation? Why you need to calculate valuation for your startup ', 'This webinar is to understand What is Startup Valuation? Why you need to calculate valuation for your startup ', ' N/A', 'Startups and entrepreneurs', 'In this webinar we learned What is Startup Valuation? Why you need to calculate valuation for your s', 'N/A', 'https://www.youtube.com/embed/dWxXrPiLOdI?si=WbyXA2o1kfgR9f8H', 'N/A', '2023-12-11 08:59:40', 1),
(122, 18, 41, 49, 'How to Startup? - The First Step', 'This webinar is for How to Startup? - The First Step', ' N/A', 'startups and entrepreneurs', 'In this webinar we learned How to Startup? - The First Step', ' N/A', 'https://www.youtube.com/watch?v=QL9y8APyUNY', ' N/A', '2023-12-11 10:07:11', 1),
(123, 40, 74, 118, 'Business Model Canvas – An introduction', 'This webinar is for the Business Model Canvas – An introduction', ' N/A', 'startups and entrepreneurs', 'In this webinar we learned about the Business Model Canvas – An introduction', 'N/A', 'https://www.youtube.com/watch?v=lpUedBBcEvM', 'N/A', '2023-12-11 10:11:03', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course_category`
--
ALTER TABLE `course_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tid` (`tid`);

--
-- Indexes for table `course_sub_category`
--
ALTER TABLE `course_sub_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tid` (`tid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `course_type`
--
ALTER TABLE `course_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_upload`
--
ALTER TABLE `video_upload`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tid` (`tid`),
  ADD KEY `cid` (`cid`),
  ADD KEY `subid` (`subid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course_category`
--
ALTER TABLE `course_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `course_sub_category`
--
ALTER TABLE `course_sub_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `course_type`
--
ALTER TABLE `course_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `video_upload`
--
ALTER TABLE `video_upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
