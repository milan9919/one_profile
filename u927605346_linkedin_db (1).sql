-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2023 at 04:19 AM
-- Server version: 10.5.19-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u927605346_linkedin_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tags`
--

CREATE TABLE `tbl_tags` (
  `id` int(11) NOT NULL,
  `tag_type` enum('creator','category','x_years') NOT NULL,
  `tag_name` varchar(255) NOT NULL,
  `tag_icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_tags`
--

INSERT INTO `tbl_tags` (`id`, `tag_type`, `tag_name`, `tag_icon`) VALUES
(1, 'creator', 'Software', 'fa-solid fa-mobile-screen-button icon_margin_top ml-1'),
(2, 'creator', 'Product', 'fa-sharp fa-solid fa-graduation-cap icon_margin_top ml-1'),
(3, 'creator', 'Design', 'fa-solid fa-user-tie icon_margin_top ml-1'),
(4, 'creator', 'Marketing', 'fa-solid fa-desktop icon_margin_top ml-1'),
(5, 'creator', 'Sales', 'fa-solid fa-paint-roller icon_margin_top ml-1'),
(6, 'creator', 'Customer Success', 'fa-solid fa-tags icon_margin_top ml-1'),
(7, 'creator', 'Other', 'fa-solid fa-circle-nodes icon_margin_top ml-1'),
(8, 'category', 'Astrology', 'fa-solid fa-globe icon_margin_top ml-1'),
(9, 'category', 'Business', 'fa-solid fa-business-time icon_margin_top ml-1'),
(10, 'category', 'Crypto', 'fab fa-btc icon_margin_top ml-1'),
(11, 'category', 'Dance', 'fas fa-music icon_margin_top ml-1'),
(12, 'category', 'Design', 'fas fa-paint-brush icon_margin_top ml-1'),
(13, 'category', 'Development', 'fa-solid fa-database icon_margin_top ml-1'),
(14, 'category', 'Other', 'fa-solid fa-circle-nodes icon_margin_top ml-1'),
(15, 'x_years', 'Social Media Creator', 'fa-solid fa-mobile-screen-button icon_margin_top ml-1'),
(16, 'x_years', 'Student', 'fa-sharp fa-solid fa-graduation-cap icon_margin_top ml-1'),
(17, 'x_years', 'Professional', 'fa-solid fa-user-tie icon_margin_top ml-1'),
(18, 'x_years', 'Freelancer', 'fa-solid fa-desktop icon_margin_top ml-1'),
(19, 'x_years', 'Artist', 'fa-solid fa-paint-roller icon_margin_top ml-1'),
(20, 'x_years', 'Brand', 'fa-solid fa-tags icon_margin_top ml-1'),
(21, 'x_years', 'Other', 'fa-solid fa-circle-nodes icon_margin_top ml-1'),
(22, 'x_years', 'Astrology', 'fa-solid fa-globe icon_margin_top ml-1'),
(23, 'x_years', 'Business', 'fa-solid fa-business-time icon_margin_top ml-1'),
(24, 'x_years', 'Crypto', 'fab fa-btc icon_margin_top ml-1'),
(25, 'x_years', 'Dance', 'fas fa-music icon_margin_top ml-1'),
(26, 'x_years', 'Design', 'fas fa-paint-brush icon_margin_top ml-1'),
(27, 'x_years', 'Development', 'fa-solid fa-database icon_margin_top ml-1'),
(28, 'x_years', 'Advisor', 'fa-solid fa-circle-nodes icon_margin_top ml-1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(11) NOT NULL,
  `oauth_provider` enum('linkedin') NOT NULL DEFAULT 'linkedin',
  `oauth_uid` varchar(50) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `locale` varchar(25) DEFAULT NULL,
  `picture` varchar(200) DEFAULT NULL,
  `link` varchar(50) DEFAULT NULL,
  `step` varchar(10) NOT NULL DEFAULT '0',
  `about_me` text NOT NULL,
  `introduction_video_link` text NOT NULL,
  `availability` text NOT NULL,
  `looking_for_job` tinyint(1) NOT NULL,
  `looking_for_job_description` text NOT NULL,
  `gitub_title` varchar(255) DEFAULT NULL,
  `gitub_url` text DEFAULT NULL,
  `medium_title` varchar(255) DEFAULT NULL,
  `medium_url` text DEFAULT NULL,
  `portfolio_title` varchar(255) DEFAULT NULL,
  `portfolio_url` text DEFAULT NULL,
  `references_title` varchar(255) DEFAULT NULL,
  `references_url` text DEFAULT NULL,
  `website_title` varchar(255) DEFAULT NULL,
  `website_url` text DEFAULT NULL,
  `youtube_title` varchar(255) DEFAULT NULL,
  `youtube_url` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `email`, `gender`, `locale`, `picture`, `link`, `step`, `about_me`, `introduction_video_link`, `availability`, `looking_for_job`, `looking_for_job_description`, `gitub_title`, `gitub_url`, `medium_title`, `medium_url`, `portfolio_title`, `portfolio_url`, `references_title`, `references_url`, `website_title`, `website_url`, `youtube_title`, `youtube_url`, `created_at`, `updated_at`) VALUES
(12, 'linkedin', 'ZGjNp-YI8g', 'Kano', 'Prajapati', 'kano.prajapati100@yahoo.com', NULL, '', 'http://rajnishdholakiya.com/one_profile/assets/imgs/default_user.jpg', 'https://www.linkedin.com/', '5', 'est', '', '', 1, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-10-05 12:56:25', '2023-10-05 12:56:25'),
(13, 'linkedin', '4HegfJti_I', 'Sarvaiya', 'Mansukh', 'mvsarvaiya9919@gmail.com', NULL, '', 'https://media.licdn.com/dms/image/C5603AQFYwWG0zqyEcQ/profile-displayphoto-shrink_100_100/0/1623479846748?e=1706745600&v=beta&t=f2q3Oeg1GUnEoFrNivGB9c1or6Xl5GT0M4L0fPh63mY', 'https://www.linkedin.com/', '6', 'AA', 'https://www.youtube.com/embed/eegl7of4g-o', '', 0, 'Testing', 'Git', 'https://www.gitub.com/', 'Medium title', 'https://www.medium.com/', 'Portfolio title', '', 'References title', 'https://www.refrences.com/', 'Website titel', 'https://www.website.com/', 'Youtube title', 'https://www.testyoutube.com/', '2023-10-06 03:51:50', '2023-12-01 04:21:37'),
(14, 'linkedin', 'sUJc8sOyXK', 'Ashish', 'Gondaliya', 'ashish.gondaliya100@gmail.com', NULL, '', 'https://media.licdn.com/dms/image/C5103AQE7R2Iy9_BxHQ/profile-displayphoto-shrink_100_100/0/1563688224246?e=1703116800&v=beta&t=HZrmXKhP_fdwsOp1usgiWgizYJmFkluMG-4HKHxSk9Y', 'https://www.linkedin.com/', '4', 'aj asjvdaj', '', '', 0, '', 'Github', 'https://www.github.com', 'Medium', 'https://www.medium.com', 'Portfolio', 'https://www.portfolio.com', 'References', 'https://www.references.com', 'Website', 'https//www.website.com', 'YouTube', 'https://www.youtube.com', '2023-10-06 13:50:03', '2023-10-17 13:23:58'),
(15, 'linkedin', '6lFAlGa4t5', 'Parag', 'Agrawal', 'parag_agarwal1981@hotmail.com', NULL, '', 'https://media.licdn.com/dms/image/C4D03AQFMMtU00tNFTg/profile-displayphoto-shrink_100_100/0/1605767496935?e=1704931200&v=beta&t=hUZf5wpamZjtmBL625MAcdSZ7Pt842bQtURTfylgt68', 'https://www.linkedin.com/', '5', 'Test Test Test Test Test Test Test TestTest Test Test TestTest Test Test TestTest Test Test TestTest Test Test TestTest Test Test TestTest Test Test TestTest Test Test TestTest Test Test TestTest Test Test TestTest Test Test TestTest Test Test TestTest Test Test TestTest Test Test TestTest Test Test TestTest Test Test TestTest Test Test TestTest Test Test TestTest Test Test TestTest Test Test TestTest Test Test TestTest Test Test TestTest Test Test TestTest Test Test TestTest Test Test TestTest Test Test Test', 'https://youtu.be/XySbukdRbF0?si=PaEA7pWWCfqa6STg', '', 1, '', 'My code repo', 'https://github.com/paragdrring', 'My Blogs', 'https://medium.com/@paragagarwal1981june', '', '', '', '', '', '', 'Youtube', 'https://www.youtube.com/@DrringHealth', '2023-11-03 11:37:24', '2023-11-06 12:18:45');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_key_results`
--

CREATE TABLE `tbl_user_key_results` (
  `id` int(11) NOT NULL,
  `objective_id` int(11) NOT NULL,
  `quarterly_revenue` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `skill` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_user_key_results`
--

INSERT INTO `tbl_user_key_results` (`id`, `objective_id`, `quarterly_revenue`, `description`, `skill`) VALUES
(164, 127, '$200', 'test', ''),
(165, 128, 'tfsfds', 'dfsdfds', ''),
(228, 210, 'KR 1 - some test ', 'Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test Test ', ''),
(445, 436, '$400', 'D3', 'Test,sub,mix'),
(638, 580, 'Objective 1 - KR1 - Some text', 'KR1 text KR1 textKR1 textKR1 textKR1 textKR1 textKR1 textKR1 textKR1 textKR1 textKR1 textKR1 textKR1 textKR1 textKR1 textKR1 textKR1 textKR1 textKR1 textKR1 textKR1 textKR1 textKR1 textKR1 text', 'Skill1,skill2,skill3'),
(639, 580, 'Objective 1 - KR2 - Some text', 'KR2 Desc KR2 Desc KR2 Desc KR2 Desc KR2 Desc KR2 Desc KR2 Desc KR2 Desc ', ''),
(934, 903, '$1000', 'A1', 'Skill1'),
(936, 904, '$2000', 'B2', 'skill2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_objectives`
--

CREATE TABLE `tbl_user_objectives` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `archive_revenue` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `image` text NOT NULL,
  `status` enum('ongoing','complete') NOT NULL DEFAULT 'ongoing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_user_objectives`
--

INSERT INTO `tbl_user_objectives` (`id`, `user_id`, `archive_revenue`, `position`, `start_date`, `end_date`, `image`, `status`) VALUES
(127, 9, 'Test', 'Test', '2023-10-17', '2023-10-04', 'objectives-1696510971-Design.png', 'ongoing'),
(128, 12, 'dsf', 'sdf', '2023-10-07', '2023-10-11', '', 'ongoing'),
(210, 11, 'Objective 1 - some text some text', 'Microsoft', '0000-00-00', '0000-00-00', '', 'ongoing'),
(211, 11, 'Objective 2 - some test', 'MS', '0000-00-00', '0000-00-00', '', 'ongoing'),
(580, 15, 'Test Objective 1 - Some text some text', 'Microsoft', '2022-06-07', '0000-00-00', '', 'ongoing'),
(903, 13, 'Test', 'Laravel', '2023-11-10', '2023-10-16', '', 'ongoing'),
(904, 13, 'Java', 'Java', '2023-11-10', '0000-00-00', '', 'ongoing');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_tags`
--

CREATE TABLE `tbl_user_tags` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user_tags`
--

INSERT INTO `tbl_user_tags` (`id`, `user_id`, `tag_id`) VALUES
(93, 11, 2),
(94, 11, 3),
(96, 12, 1),
(105, 14, 1),
(106, 14, 3),
(107, 14, 4),
(108, 13, 1),
(109, 13, 2),
(110, 13, 3),
(111, 15, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_team`
--

CREATE TABLE `tbl_user_team` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_user_team`
--

INSERT INTO `tbl_user_team` (`id`, `user_id`, `name`, `email`) VALUES
(1, 13, 'Test', 'ajay2323@gmail.com'),
(2, 13, 'Milan', 'milan@gmail.com'),
(3, 13, 'Pharm', 'pharm@gmail.com'),
(4, 15, 'Test Parag', 'paragagarwal1981june@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_key_results`
--
ALTER TABLE `tbl_user_key_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_objectives`
--
ALTER TABLE `tbl_user_objectives`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_tags`
--
ALTER TABLE `tbl_user_tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user_team`
--
ALTER TABLE `tbl_user_team`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_tags`
--
ALTER TABLE `tbl_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_user_key_results`
--
ALTER TABLE `tbl_user_key_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=937;

--
-- AUTO_INCREMENT for table `tbl_user_objectives`
--
ALTER TABLE `tbl_user_objectives`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=906;

--
-- AUTO_INCREMENT for table `tbl_user_tags`
--
ALTER TABLE `tbl_user_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `tbl_user_team`
--
ALTER TABLE `tbl_user_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
