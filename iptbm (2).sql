-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2023 at 05:47 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iptbm`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `announcement_id` text NOT NULL,
  `banner_img` text NOT NULL,
  `title` text NOT NULL,
  `announcement_description` text NOT NULL,
  `announcement_status` text NOT NULL,
  `announcement_from` text DEFAULT NULL,
  `announcement_to` text DEFAULT NULL,
  `creator` text DEFAULT NULL,
  `branch` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `announcement_id`, `banner_img`, `title`, `announcement_description`, `announcement_status`, `announcement_from`, `announcement_to`, `creator`, `branch`) VALUES
(32, '6094008018', 'Announcement lang po-6094008018.webp', 'Announcement lang po', '&lt;p&gt;Announcement lang po&lt;br&gt;&lt;/p&gt;', 'Admin (San Pablo)', '2023-11-24', '2023-12-04', '8222869982', 'Admin (Los Baños)');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branch_id` int(11) NOT NULL,
  `region` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `municipality` varchar(255) DEFAULT NULL,
  `township` varchar(255) DEFAULT NULL,
  `village` varchar(255) DEFAULT NULL,
  `district` varchar(255) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email_address` varchar(255) DEFAULT NULL,
  `fax_number` varchar(20) DEFAULT NULL,
  `emergency_contact` varchar(20) DEFAULT NULL,
  `department_contact_1` varchar(20) DEFAULT NULL,
  `department_contact_2` varchar(20) DEFAULT NULL,
  `department_contact_3` varchar(20) DEFAULT NULL,
  `specific_personnel` varchar(20) DEFAULT NULL,
  `branch_name` varchar(255) DEFAULT NULL,
  `principal_head` varchar(255) DEFAULT NULL,
  `operating_hours` time DEFAULT NULL,
  `branch_profile` varchar(255) DEFAULT NULL,
  `branch_cover` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`branch_id`, `region`, `country`, `city`, `municipality`, `township`, `village`, `district`, `phone_number`, `email_address`, `fax_number`, `emergency_contact`, `department_contact_1`, `department_contact_2`, `department_contact_3`, `specific_personnel`, `branch_name`, `principal_head`, `operating_hours`, `branch_profile`, `branch_cover`) VALUES
(1, 'Region IV - A', 'Philippines', 'Laguna', 'Los Baños', 'Batong Malake', '', '', '09856103168', 'sample@gmail.com', '09631877961', '09631877961', '09631877961', '09631877961', '09631877961', '', 'Los Baños', 'Creyes Joval', '17:00:00', 'Los Baños-profile.webp', 'Los Baños-cover.webp'),
(2, 'Calabarzon', 'Philippines', 'Laguna', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'San Pablo', NULL, NULL, 'San Pablo-profile.webp', 'San Pablo-cover.webp'),
(3, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Sta. Cruz', NULL, NULL, NULL, NULL),
(4, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Siniloan', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `account_id` text NOT NULL,
  `profile_photo` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` text NOT NULL,
  `middlename` text NOT NULL,
  `lastname` text NOT NULL,
  `phone` text NOT NULL,
  `role` text NOT NULL,
  `branch` text NOT NULL,
  `account_status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `account_id`, `profile_photo`, `email`, `password`, `firstname`, `middlename`, `lastname`, `phone`, `role`, `branch`, `account_status`) VALUES
(147, '8222869982', 'files/profile/Razon-Mark Nicholas-Limpin-8222869982.webp', 'razonmarknicholas.cdlb@gmail.com', '$2y$10$75Jc04YPabmdoQOEFJPs/.oklFgLIpJ9ZnZZgkeKS4NLfqh1yv.BC', 'Mark Nicholas', 'Limpin', 'Razon', '09631877961', 'Admin', 'Los Baños', 'active'),
(148, '4795702222', 'files/profile/Marinay-Chin Chin-Oliva-4795702222.webp', 'chinchinmarinay21@gmail.com', '$2y$10$qPCXJZtjKGAQEOEdltaTLeEFNdiyDVejYsqi.TXy6typtVB6uxm/q', 'Chin Chin', 'Oliva', 'Marinay', '', 'Admin', 'Los Baños', 'active'),
(155, '1061362272', 'files/profile/PH-Cheap-Devs-1061362272.webp', 'cheapdevsph@gmail.com', '$2y$10$0cr4EKHZ2Pd9g5bneUp0y.dWfZq6ffr1BVc0bBJqqjfnWbTt0bTOe', 'Cheap', 'Devs', 'PH', '', 'Admin', 'Los Baños', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `technologies`
--

CREATE TABLE `technologies` (
  `id` int(11) NOT NULL,
  `technology_id` text NOT NULL,
  `banner_img` text NOT NULL,
  `technology` text NOT NULL,
  `ip_type` text NOT NULL,
  `year` text NOT NULL,
  `date_of_filing` text NOT NULL,
  `application_no` text NOT NULL,
  `abstract` text NOT NULL,
  `inventors` text NOT NULL,
  `technology_status` text NOT NULL,
  `branch` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `technologies`
--

INSERT INTO `technologies` (`id`, `technology_id`, `banner_img`, `technology`, `ip_type`, `year`, `date_of_filing`, `application_no`, `abstract`, `inventors`, `technology_status`, `branch`) VALUES
(26, '8713834908', 'technology-8713834908.webp', 'The Process of making Sponge Cake where Egg Whites are replaced by Liquid Broth from chickenpeas (Cicer Arietinum)', 'Patent', '2023', '2022-05-20', '12022050275', '&lt;p&gt;Sample abstract&lt;/p&gt;', 'Erica Baraquio Tabuac', 'Applied', 'Los Baños'),
(27, '4031326763', 'technology-4031326763.webp', 'Composition of Probiotic plant material of the Synbiotic Fish Feed Supplement', 'Utility Model', '2022', '2022-05-19', '22022050538', '&lt;p&gt;Sample abstract&lt;/p&gt;', '&lt;p&gt;Christian Paul P. Dela Cruz&lt;/p&gt;', 'Applied', 'Los Baños'),
(28, '7220063701', 'technology-7220063701.webp', 'Process of Making Synbiotic Fish Feed Supplement', 'Patent', '2022', '2022-05-20', '12022050277', '&lt;p&gt;This is a sample abstract&lt;/p&gt;', '&lt;p&gt;Christian Paul P. Dela Cruz&lt;/p&gt;', 'Applied', 'Los Baños'),
(29, '7124724386', 'technology-7124724386.webp', 'Composition of Synbiotic Fish Feed Supplement', 'Patent', '2023', '2022-05-20', '12022050276', '&lt;p&gt;This is a sample abstract&lt;/p&gt;', 'Christian Paul P. Dela Cruz', 'Applied', 'Los Baños'),
(30, '482170058', 'technology-482170058.webp', 'Economical Plant based probiotic culture medium composition and method thereof (Product)', 'Utility Model', '2023', '2023-02-06', '22022051402', '&lt;p&gt;This is a sample abstract&lt;/p&gt;', '&lt;p&gt;Christian Paul P. Dela Cruz&lt;/p&gt;', 'Applied', 'Los Baños'),
(31, '1748227618', 'technology-1748227618.webp', 'Economical Plant based probiotic culture medium composition and method thereof (Method)', 'Utility Model', '2023', '2023-02-06', '22022051404', 'This is a sample abstract', 'Christian Paul P. Dela Cruz', 'Applied', 'Los Baños'),
(32, '8560393323', 'technology-8560393323.webp', 'Synthetic Rice Grain', 'Utility Model', '2022', '2022-05-20', '22022050536', 'This is a sample abstract', 'Bethlehem Maloles', 'Applied', 'Los Baños'),
(33, '7656338487', 'technology-7656338487.webp', 'Composition of Ice Cream with Milkfish Bone Powder and Process thereof (Product)', 'Utility Model', '2023', '2023-02-06', '22022051403', '&lt;p&gt;This is a sample abstract&lt;/p&gt;', '&lt;ol&gt;&lt;li style=&quot;text-align: justify; &quot;&gt;Salve Lyan Negrillo - Felisimo&lt;/li&gt;&lt;li style=&quot;text-align: justify;&quot;&gt;Ma. Grace L. Manzanida&lt;/li&gt;&lt;li style=&quot;text-align: justify;&quot;&gt;Raiven C. Alabama&lt;/li&gt;&lt;li style=&quot;text-align: justify;&quot;&gt;Marvie Ann S. Reyes&lt;/li&gt;&lt;/ol&gt;', 'Applied', 'Los Baños');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branch_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `technologies`
--
ALTER TABLE `technologies`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT for table `technologies`
--
ALTER TABLE `technologies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
