-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2025 at 07:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trusted`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `username`, `password`) VALUES
(1, 'trusted10', 'admin@123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blogs`
--

CREATE TABLE `tbl_blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `pay` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `isfeaturepost` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_blogs`
--

INSERT INTO `tbl_blogs` (`id`, `title`, `description`, `image`, `slug`, `category`, `pay`, `status`, `created_at`, `updated_at`, `isfeaturepost`) VALUES
(1, 'COMMERCIAL CLEANING JOBS | NO EXPERIENCE REQUIRED', '<div class=\"artical_first_blog my-4\" style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; margin-top: 1rem !important; margin-bottom: 1rem !important;\"><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 1.2em; line-height: 1.8; counter-reset: list-0 0 list-1 0 list-2 0 list-3 0 list-4 0 list-5 0 list-6 0 list-7 0 list-8 0 list-9 0;\">Earn $46/hr with commercial cleaning jobs—no experience or certifications needed! Open to men and women with immediate hiring. Apply now:</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 1.2em; line-height: 1.8; counter-reset: list-0 0 list-1 0 list-2 0 list-3 0 list-4 0 list-5 0 list-6 0 list-7 0 list-8 0 list-9 0;\"></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 1.2em; line-height: 1.8; counter-reset: list-0 0 list-1 0 list-2 0 list-3 0 list-4 0 list-5 0 list-6 0 list-7 0 list-8 0 list-9 0;\"></p><h2 style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 24px; counter-reset: list-0 0 list-1 0 list-2 0 list-3 0 list-4 0 list-5 0 list-6 0 list-7 0 list-8 0 list-9 0;\"><span style=\"box-sizing: inherit; color: rgb(54, 54, 54); font-weight: 700;\">Job Description:</span></h2><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 1.2em; line-height: 1.8; counter-reset: list-0 0 list-1 0 list-2 0 list-3 0 list-4 0 list-5 0 list-6 0 list-7 0 list-8 0 list-9 0;\">As a commercial cleaner you’ll help maintain offices stores and business spaces by performing simple tasks like dusting mopping vacuuming and sanitizing surfaces. It’s a straightforward job with on-the-job training so you can start earning right away!</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 1.2em; line-height: 1.8; counter-reset: list-0 0 list-1 0 list-2 0 list-3 0 list-4 0 list-5 0 list-6 0 list-7 0 list-8 0 list-9 0;\"></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 1.2em; line-height: 1.8; counter-reset: list-0 0 list-1 0 list-2 0 list-3 0 list-4 0 list-5 0 list-6 0 list-7 0 list-8 0 list-9 0;\"></p><h2 style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 24px; counter-reset: list-0 0 list-1 0 list-2 0 list-3 0 list-4 0 list-5 0 list-6 0 list-7 0 list-8 0 list-9 0;\"><span style=\"box-sizing: inherit; color: rgb(54, 54, 54); font-weight: 700;\">Why Apply?</span></h2><ol style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 1.2em; line-height: 1.8;\"><li data-list=\"bullet\" style=\"box-sizing: inherit; margin: 0px; padding: 0px 0px 0px 1.5em; list-style-type: none; position: relative;\"><span class=\"ql-ui\" contenteditable=\"false\" style=\"box-sizing: inherit; font-style: inherit; font-weight: inherit; position: absolute;\"></span>$46 per hour – competitive pay!</li><li data-list=\"bullet\" style=\"box-sizing: inherit; margin: 0px; padding: 0px 0px 0px 1.5em; list-style-type: none; position: relative;\"><span class=\"ql-ui\" contenteditable=\"false\" style=\"box-sizing: inherit; font-style: inherit; font-weight: inherit; position: absolute;\"></span>No prior experience or certifications needed</li><li data-list=\"bullet\" style=\"box-sizing: inherit; margin: 0px; padding: 0px 0px 0px 1.5em; list-style-type: none; position: relative;\"><span class=\"ql-ui\" contenteditable=\"false\" style=\"box-sizing: inherit; font-style: inherit; font-weight: inherit; position: absolute;\"></span>Flexible hours – full-time &amp; part-time available</li><li data-list=\"bullet\" style=\"box-sizing: inherit; margin: 0px; padding: 0px 0px 0px 1.5em; list-style-type: none; position: relative;\"><span class=\"ql-ui\" contenteditable=\"false\" style=\"box-sizing: inherit; font-style: inherit; font-weight: inherit; position: absolute;\"></span>Immediate hiring – start working ASAP</li><li data-list=\"bullet\" style=\"box-sizing: inherit; margin: 0px; padding: 0px 0px 0px 1.5em; list-style-type: none; position: relative;\"><span class=\"ql-ui\" contenteditable=\"false\" style=\"box-sizing: inherit; font-style: inherit; font-weight: inherit; position: absolute;\"></span>Clean &amp; safe work environment</li></ol><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 1.2em; line-height: 1.8; counter-reset: list-0 0 list-1 0 list-2 0 list-3 0 list-4 0 list-5 0 list-6 0 list-7 0 list-8 0 list-9 0;\"></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 1.2em; line-height: 1.8; counter-reset: list-0 0 list-1 0 list-2 0 list-3 0 list-4 0 list-5 0 list-6 0 list-7 0 list-8 0 list-9 0;\"></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 1.2em; line-height: 1.8; counter-reset: list-0 0 list-1 0 list-2 0 list-3 0 list-4 0 list-5 0 list-6 0 list-7 0 list-8 0 list-9 0;\">Don’t miss this chance to land an easy well-paying job in a growing industry! Apply now and start earning today!</p><div><br></div></div>', '1743956921_WXvGv-1739574130395.jpg', 'commercial-cleaning-jobs-no-experience-required', '1', '$46/HR', 1, '2025-04-06 12:58:41', '2025-04-06 16:28:41', 0),
(2, 'YARD CLEAN UP JOBS | ANY EXPERIENCE IS WELCOME', '<div class=\"artical_first_blog my-4\" style=\"box-sizing: inherit; color: rgb(0, 0, 0); font-family: Roboto, sans-serif; margin-top: 1rem !important; margin-bottom: 1rem !important;\"><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 1.2em; line-height: 1.8; counter-reset: list-0 0 list-1 0 list-2 0 list-3 0 list-4 0 list-5 0 list-6 0 list-7 0 list-8 0 list-9 0;\">Looking for a&nbsp;<span style=\"box-sizing: inherit; color: rgb(54, 54, 54); font-weight: 700;\">high-paying job</span>&nbsp;that requires&nbsp;<span style=\"box-sizing: inherit; color: rgb(54, 54, 54); font-weight: 700;\">no prior experience?</span>&nbsp;This is your chance! Yard clean-up jobs are now hiring offering an incredible&nbsp;<span style=\"box-sizing: inherit; color: rgb(54, 54, 54); font-weight: 700;\">upto</span>&nbsp;<span style=\"box-sizing: inherit; color: rgb(54, 54, 54); font-weight: 700;\">$270/Daily</span>&nbsp;to help keep outdoor spaces neat and tidy.</p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 1.2em; line-height: 1.8; counter-reset: list-0 0 list-1 0 list-2 0 list-3 0 list-4 0 list-5 0 list-6 0 list-7 0 list-8 0 list-9 0;\"></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 1.2em; line-height: 1.8; counter-reset: list-0 0 list-1 0 list-2 0 list-3 0 list-4 0 list-5 0 list-6 0 list-7 0 list-8 0 list-9 0;\"></p><h2 style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 24px; counter-reset: list-0 0 list-1 0 list-2 0 list-3 0 list-4 0 list-5 0 list-6 0 list-7 0 list-8 0 list-9 0;\"><span style=\"box-sizing: inherit; color: rgb(54, 54, 54); font-weight: 700;\">Why Choose Yard Clean-Up Jobs?</span></h2><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 1.2em; line-height: 1.8; counter-reset: list-0 0 list-1 0 list-2 0 list-3 0 list-4 0 list-5 0 list-6 0 list-7 0 list-8 0 list-9 0;\">This job is perfect for anyone who enjoys working outdoors staying active and earning top pay without sitting at a desk all day. With homeowners businesses and property managers always needing yard maintenance demand for workers is sky-high!</p><h2 style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 24px; counter-reset: list-0 0 list-1 0 list-2 0 list-3 0 list-4 0 list-5 0 list-6 0 list-7 0 list-8 0 list-9 0;\"><span style=\"box-sizing: inherit; color: rgb(54, 54, 54); font-weight: 700;\">What Makes This Opportunity Special?</span></h2><ol style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 1.2em; line-height: 1.8;\"><li data-list=\"bullet\" style=\"box-sizing: inherit; margin: 0px; padding: 0px 0px 0px 1.5em; list-style-type: none; position: relative;\"><span class=\"ql-ui\" contenteditable=\"false\" style=\"box-sizing: inherit; font-style: inherit; font-weight: inherit; position: absolute;\"></span><span style=\"box-sizing: inherit; color: rgb(54, 54, 54); font-weight: 700;\">Earn $46/HR –</span>&nbsp;Get paid well for simple yard work!</li><li data-list=\"bullet\" style=\"box-sizing: inherit; margin: 0px; padding: 0px 0px 0px 1.5em; list-style-type: none; position: relative;\"><span class=\"ql-ui\" contenteditable=\"false\" style=\"box-sizing: inherit; font-style: inherit; font-weight: inherit; position: absolute;\"></span><span style=\"box-sizing: inherit; color: rgb(54, 54, 54); font-weight: 700;\">No Experience Needed</span>&nbsp;– Full training provided start immediately.</li><li data-list=\"bullet\" style=\"box-sizing: inherit; margin: 0px; padding: 0px 0px 0px 1.5em; list-style-type: none; position: relative;\"><span class=\"ql-ui\" contenteditable=\"false\" style=\"box-sizing: inherit; font-style: inherit; font-weight: inherit; position: absolute;\"></span><span style=\"box-sizing: inherit; color: rgb(54, 54, 54); font-weight: 700;\">Open to Everyone</span>&nbsp;– Both men and women can apply.</li><li data-list=\"bullet\" style=\"box-sizing: inherit; margin: 0px; padding: 0px 0px 0px 1.5em; list-style-type: none; position: relative;\"><span class=\"ql-ui\" contenteditable=\"false\" style=\"box-sizing: inherit; font-style: inherit; font-weight: inherit; position: absolute;\"></span><span style=\"box-sizing: inherit; color: rgb(54, 54, 54); font-weight: 700;\">Flexible Hours</span>&nbsp;– Choose part-time or full-time shifts.</li><li data-list=\"bullet\" style=\"box-sizing: inherit; margin: 0px; padding: 0px 0px 0px 1.5em; list-style-type: none; position: relative;\"><span class=\"ql-ui\" contenteditable=\"false\" style=\"box-sizing: inherit; font-style: inherit; font-weight: inherit; position: absolute;\"></span><span style=\"box-sizing: inherit; color: rgb(54, 54, 54); font-weight: 700;\">Job Security</span>&nbsp;– Yard work is always in demand!</li></ol><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 1.2em; line-height: 1.8; counter-reset: list-0 0 list-1 0 list-2 0 list-3 0 list-4 0 list-5 0 list-6 0 list-7 0 list-8 0 list-9 0;\"></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 1.2em; line-height: 1.8; counter-reset: list-0 0 list-1 0 list-2 0 list-3 0 list-4 0 list-5 0 list-6 0 list-7 0 list-8 0 list-9 0;\"></p><h2 style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 24px; counter-reset: list-0 0 list-1 0 list-2 0 list-3 0 list-4 0 list-5 0 list-6 0 list-7 0 list-8 0 list-9 0;\"><span style=\"box-sizing: inherit; color: rgb(54, 54, 54); font-weight: 700;\">What Does a Yard Clean-Up Worker Do?</span></h2><ol style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 1.2em; line-height: 1.8;\"><li data-list=\"bullet\" style=\"box-sizing: inherit; margin: 0px; padding: 0px 0px 0px 1.5em; list-style-type: none; position: relative;\"><span class=\"ql-ui\" contenteditable=\"false\" style=\"box-sizing: inherit; font-style: inherit; font-weight: inherit; position: absolute;\"></span>Rake leaves and remove debris.</li><li data-list=\"bullet\" style=\"box-sizing: inherit; margin: 0px; padding: 0px 0px 0px 1.5em; list-style-type: none; position: relative;\"><span class=\"ql-ui\" contenteditable=\"false\" style=\"box-sizing: inherit; font-style: inherit; font-weight: inherit; position: absolute;\"></span>Mow lawns and trim bushes.</li><li data-list=\"bullet\" style=\"box-sizing: inherit; margin: 0px; padding: 0px 0px 0px 1.5em; list-style-type: none; position: relative;\"><span class=\"ql-ui\" contenteditable=\"false\" style=\"box-sizing: inherit; font-style: inherit; font-weight: inherit; position: absolute;\"></span>Clean up after storms or seasonal changes.</li><li data-list=\"bullet\" style=\"box-sizing: inherit; margin: 0px; padding: 0px 0px 0px 1.5em; list-style-type: none; position: relative;\"><span class=\"ql-ui\" contenteditable=\"false\" style=\"box-sizing: inherit; font-style: inherit; font-weight: inherit; position: absolute;\"></span>Haul away branches trash and clutter.</li><li data-list=\"bullet\" style=\"box-sizing: inherit; margin: 0px; padding: 0px 0px 0px 1.5em; list-style-type: none; position: relative;\"><span class=\"ql-ui\" contenteditable=\"false\" style=\"box-sizing: inherit; font-style: inherit; font-weight: inherit; position: absolute;\"></span>Keep outdoor areas looking neat and tidy.</li></ol><h2 style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: 24px; counter-reset: list-0 0 list-1 0 list-2 0 list-3 0 list-4 0 list-5 0 list-6 0 list-7 0 list-8 0 list-9 0;\"><span style=\"box-sizing: inherit; color: rgb(54, 54, 54); font-weight: 700;\">How to Apply?</span></h2><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 1.2em; line-height: 1.8; counter-reset: list-0 0 list-1 0 list-2 0 list-3 0 list-4 0 list-5 0 list-6 0 list-7 0 list-8 0 list-9 0;\">This is your golden ticket to a high-paying and stable job. No experience? No problem! Start earning $46 per hour right away.</p><div><br></div><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 1.2em; line-height: 1.8; counter-reset: list-0 0 list-1 0 list-2 0 list-3 0 list-4 0 list-5 0 list-6 0 list-7 0 list-8 0 list-9 0;\"></p><p style=\"box-sizing: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; padding: 0px; font-size: 1.2em; line-height: 1.8; counter-reset: list-0 0 list-1 0 list-2 0 list-3 0 list-4 0 list-5 0 list-6 0 list-7 0 list-8 0 list-9 0;\"></p></div>', '1743958732_ewX2V-1738317974549.jpg', 'yard-clean-up-jobs-any-experience-is-welcome', '1', 'PAY UPTO $270/DAILY', 1, '2025-04-06 13:28:52', '2025-04-06 16:58:52', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `isfeatured` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `name`, `isfeatured`) VALUES
(1, 'Jobs', 0),
(2, 'Lifestyle', 0),
(3, 'Automobile', 1),
(4, 'Healthy Eating', 1),
(5, 'Beauty & Personal Care', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_blogs`
--
ALTER TABLE `tbl_blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
