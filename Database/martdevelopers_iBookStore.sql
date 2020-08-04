-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 04, 2020 at 03:18 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `martdevelopers_iBookStore`
--

-- --------------------------------------------------------

--
-- Table structure for table `iBookStore_books`
--

CREATE TABLE `iBookStore_books` (
  `b_id` int(20) NOT NULL,
  `b_isbn` varchar(200) NOT NULL,
  `b_title` varchar(200) NOT NULL,
  `b_author` varchar(200) NOT NULL,
  `b_publisher` varchar(200) NOT NULL,
  `b_summary` longtext NOT NULL,
  `cat_id` varchar(200) NOT NULL,
  `cat_name` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `b_count` int(200) NOT NULL,
  `b_price` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iBookStore_books`
--

INSERT INTO `iBookStore_books` (`b_id`, `b_isbn`, `b_title`, `b_author`, `b_publisher`, `b_summary`, `cat_id`, `cat_name`, `created_at`, `b_count`, `b_price`) VALUES
(2, 'DIZV-9623', 'Adobe Dreamweaver CS4 Complete', 'Shelly Wells', 'Crown Publishing Group', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', '2', 'Magazines', '2020-08-04 12:52:40.788955', 20, '500'),
(3, 'IWQU-2785', 'Students Guide To Unix', 'Hahn', 'Mc Graw Hill', '', '2', 'Magazines', '2020-08-03 18:11:24.567014', 100, '590'),
(4, 'SGBY-1682', 'NPPE English Aid', 'Macmillan', 'Macmillan Publshers', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', '3', 'Early Child Hood Books', '2020-08-04 12:47:28.840522', 200, '450');

-- --------------------------------------------------------

--
-- Table structure for table `iBookStore_book_categories`
--

CREATE TABLE `iBookStore_book_categories` (
  `cat_id` int(20) NOT NULL,
  `cat_number` varchar(200) NOT NULL,
  `cat_name` varchar(200) NOT NULL,
  `cat_desc` longtext NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iBookStore_book_categories`
--

INSERT INTO `iBookStore_book_categories` (`cat_id`, `cat_number`, `cat_name`, `cat_desc`, `created_at`) VALUES
(2, 'ROSP-857', 'Magazines', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. ', '2020-07-30 19:23:19.880692'),
(3, 'ETXJ-9483', 'Early Child Hood Books', 'Early childhood education is a term that describes the care taken and the teaching of young children from their birth to the age of eight, or until they start school. The term refers to activities carried out by people outside the family and is often focused on learning through play. The facilities that provide early childhood education services include kindergartens, nurseries, pre-school classes, child-care centers and other institutions.', '2020-08-04 12:34:33.190534');

-- --------------------------------------------------------

--
-- Table structure for table `iBookStore_HRM`
--

CREATE TABLE `iBookStore_HRM` (
  `staff_id` int(20) NOT NULL,
  `staff_name` varchar(200) NOT NULL,
  `staff_number` varchar(200) NOT NULL,
  `staff_phone` varchar(200) NOT NULL,
  `staff_dob` varchar(200) NOT NULL,
  `staff_email` varchar(200) NOT NULL,
  `staff_natid` varchar(200) NOT NULL,
  `staff_adr` varchar(200) NOT NULL,
  `staff_gender` varchar(200) NOT NULL,
  `staff_bio` longtext NOT NULL,
  `staff_passport` varchar(200) NOT NULL,
  `allow_login` varchar(6) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iBookStore_HRM`
--

INSERT INTO `iBookStore_HRM` (`staff_id`, `staff_name`, `staff_number`, `staff_phone`, `staff_dob`, `staff_email`, `staff_natid`, `staff_adr`, `staff_gender`, `staff_bio`, `staff_passport`, `allow_login`, `created_at`) VALUES
(2, 'Mart Mbithi', 'GINC-4582', '+254718186074', '1998-07-13', 'martmbithi@protonmail.com', '35574881', '120 Machakos Kenya', 'Male', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', 'gitLogo.png', '1', '2020-07-30 19:52:53.295442');

-- --------------------------------------------------------

--
-- Table structure for table `iBookStore_Login`
--

CREATE TABLE `iBookStore_Login` (
  `login_id` int(20) NOT NULL,
  `login_user_name` varchar(200) NOT NULL,
  `login_user_email` varchar(200) NOT NULL,
  `login_user_password` varchar(200) NOT NULL,
  `login_user_permission` int(2) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iBookStore_Login`
--

INSERT INTO `iBookStore_Login` (`login_id`, `login_user_name`, `login_user_email`, `login_user_password`, `login_user_permission`, `created_at`) VALUES
(1, 'Mart', 'martdevelopers254@gmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 1, '2020-08-03 10:41:47.126217'),
(13, 'Ones', 'martmbithi@protonmail.com', 'a69681bcf334ae130217fea4505fd3c994f5683f', 0, '2020-08-04 11:55:51.150266');

-- --------------------------------------------------------

--
-- Table structure for table `iBookStore_logs`
--

CREATE TABLE `iBookStore_logs` (
  `log_id` int(20) NOT NULL,
  `log_code` varchar(200) NOT NULL,
  `log_content` longtext NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iBookStore_logs`
--

INSERT INTO `iBookStore_logs` (`log_id`, `log_code`, `log_content`, `created_at`) VALUES
(1, 'FKIQ-3175', 'Book Sold', '2020-08-03 18:21:50.952908'),
(2, 'JYNR-5103', 'Book Sold', '2020-08-04 12:56:50.242975');

-- --------------------------------------------------------

--
-- Table structure for table `iBookStore_Password_Resets`
--

CREATE TABLE `iBookStore_Password_Resets` (
  `reset_id` int(20) NOT NULL,
  `reset_code` varchar(200) NOT NULL,
  `reset_token` varchar(200) NOT NULL,
  `reset_email` varchar(200) NOT NULL,
  `reset_status` varchar(200) NOT NULL,
  `created_at` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `iBookStore_Sales`
--

CREATE TABLE `iBookStore_Sales` (
  `s_id` int(20) NOT NULL,
  `s_code` varchar(200) NOT NULL,
  `s_amt` varchar(200) NOT NULL,
  `b_id` varchar(200) NOT NULL,
  `b_title` varchar(200) NOT NULL,
  `b_isbn` varchar(200) NOT NULL,
  `s_date` varchar(200) NOT NULL,
  `s_month` varchar(200) NOT NULL,
  `s_year` varchar(200) NOT NULL,
  `s_copies` varchar(200) NOT NULL,
  `created_at` timestamp(5) NOT NULL DEFAULT CURRENT_TIMESTAMP(5) ON UPDATE CURRENT_TIMESTAMP(5)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iBookStore_Sales`
--

INSERT INTO `iBookStore_Sales` (`s_id`, `s_code`, `s_amt`, `b_id`, `b_title`, `b_isbn`, `s_date`, `s_month`, `s_year`, `s_copies`, `created_at`) VALUES
(8, 'HUGA-2415', '500', '2', 'Adobe Dreamweaver CS4 Complete', 'DIZV-9623', '03', 'Aug', '2020', '5', '2020-08-03 18:06:48.26010'),
(9, 'FKIQ-3175', '590', '3', 'Students Guide To Unix', 'IWQU-2785', '03', 'Aug', '2020', '10', '2020-08-03 18:21:50.84083'),
(10, 'JYNR-5103', '450', '4', 'NPPE English Aid', 'SGBY-1682', '04', 'Aug', '2020', '20', '2020-08-04 12:56:50.03903');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `iBookStore_books`
--
ALTER TABLE `iBookStore_books`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `iBookStore_book_categories`
--
ALTER TABLE `iBookStore_book_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `iBookStore_HRM`
--
ALTER TABLE `iBookStore_HRM`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `iBookStore_Login`
--
ALTER TABLE `iBookStore_Login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `iBookStore_logs`
--
ALTER TABLE `iBookStore_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `iBookStore_Password_Resets`
--
ALTER TABLE `iBookStore_Password_Resets`
  ADD PRIMARY KEY (`reset_id`);

--
-- Indexes for table `iBookStore_Sales`
--
ALTER TABLE `iBookStore_Sales`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `iBookStore_books`
--
ALTER TABLE `iBookStore_books`
  MODIFY `b_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `iBookStore_book_categories`
--
ALTER TABLE `iBookStore_book_categories`
  MODIFY `cat_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `iBookStore_HRM`
--
ALTER TABLE `iBookStore_HRM`
  MODIFY `staff_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `iBookStore_Login`
--
ALTER TABLE `iBookStore_Login`
  MODIFY `login_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `iBookStore_logs`
--
ALTER TABLE `iBookStore_logs`
  MODIFY `log_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `iBookStore_Password_Resets`
--
ALTER TABLE `iBookStore_Password_Resets`
  MODIFY `reset_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `iBookStore_Sales`
--
ALTER TABLE `iBookStore_Sales`
  MODIFY `s_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
