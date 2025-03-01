-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2025 at 08:00 AM
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
-- Database: `phplit`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_address`
--

CREATE TABLE `tbl_address` (
  `h_id` int(200) NOT NULL,
  `h_unit` int(200) NOT NULL,
  `h_blk` varchar(200) NOT NULL,
  `h_sn` varchar(200) NOT NULL,
  `h_sub` varchar(200) NOT NULL,
  `h_brgy` varchar(200) NOT NULL,
  `h_city` varchar(200) NOT NULL,
  `h_province` varchar(200) NOT NULL,
  `h_country` varchar(200) NOT NULL,
  `h_zip` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_address`
--

INSERT INTO `tbl_address` (`h_id`, `h_unit`, `h_blk`, `h_sn`, `h_sub`, `h_brgy`, `h_city`, `h_province`, `h_country`, `h_zip`) VALUES
(0, 0, 'Labore ex ea iusto e', 'Logan Miller', 'Dolores minim quaera', 'In impedit nesciunt', 'Modi aliquip in est', 'Animi aliquip sit e', 'Ecuador', 22337),
(0, 0, 'Autem at cupidatat e', 'Virginia Dale', 'Pariatur Corporis c', 'Illo necessitatibus', 'Repudiandae quibusda', 'Voluptatum esse ven', 'Saint Barthélemy', 89432),
(0, 0, 'Dolorem mollitia qui', 'Myles Edwards', 'Ex excepteur est eos', 'Sint quo esse enim d', 'Cupidatat fugiat ex', 'Ut autem amet odio', 'Micronesia (Federated States of)', 59003);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_birth`
--

CREATE TABLE `tbl_birth` (
  `b_id` int(200) NOT NULL,
  `b_unif` int(200) NOT NULL,
  `b_blk` varchar(200) NOT NULL,
  `b_sn` varchar(200) NOT NULL,
  `b_sub` varchar(200) NOT NULL,
  `b_brgy` varchar(200) NOT NULL,
  `b_city` varchar(200) NOT NULL,
  `b_province` varchar(200) NOT NULL,
  `b_country` varchar(200) NOT NULL,
  `b_zip` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_birth`
--

INSERT INTO `tbl_birth` (`b_id`, `b_unif`, `b_blk`, `b_sn`, `b_sub`, `b_brgy`, `b_city`, `b_province`, `b_country`, `b_zip`) VALUES
(1, 0, 'Qui laboris excepteu', 'Clayton Salas', 'Eaque nisi at minima', 'Qui ullam proident', 'Dolore doloremque co', 'Aliquam magnam ex ea', 'Pitcairn', 95302),
(2, 0, 'Quia iste voluptatum', 'Nathaniel Moss', 'Ut proident dolor e', 'Aut expedita quos mi', 'Voluptas sit perspic', 'Blanditiis vel culpa', 'Malawi', 61079),
(3, 0, 'Reprehenderit sint i', 'Daniel Wilkins', 'Enim cupiditate volu', 'Modi dolorum et esse', 'Est et commodi paria', 'Expedita odio simili', 'Guadeloupe', 24633),
(4, 0, 'Ad sapiente dolore n', 'Whitney Clark', 'Sequi vel ut dolor n', 'Temporibus ut rerum', 'Vel fugit animi fa', 'Consequatur asperio', 'Algeria', 25777);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `c_id` int(200) NOT NULL,
  `c_mobile` int(200) NOT NULL,
  `c_tele` int(200) NOT NULL,
  `c_email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`c_id`, `c_mobile`, `c_tele`, `c_email`) VALUES
(1, 2147483647, 2147483647, 'zoqa@mailinator.com'),
(2, 2147483647, 2147483647, 'hoto@mailinator.com'),
(3, 2147483647, 2147483647, 'lewam@mailinator.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info`
--

CREATE TABLE `tbl_info` (
  `p_id` int(11) NOT NULL,
  `p_fname` varchar(200) NOT NULL,
  `p_lname` varchar(200) NOT NULL,
  `p_middle` varchar(200) NOT NULL,
  `p_dob` date NOT NULL,
  `p_sex` varchar(200) NOT NULL,
  `p_status` varchar(200) NOT NULL,
  `p_tax` int(200) NOT NULL,
  `p_nationality` varchar(200) NOT NULL,
  `p_religion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_info`
--

INSERT INTO `tbl_info` (`p_id`, `p_fname`, `p_lname`, `p_middle`, `p_dob`, `p_sex`, `p_status`, `p_tax`, `p_nationality`, `p_religion`) VALUES
(1, 'Holly', 'Berry', 'L', '1978-04-05', 'Female', 'Single', 12312312, 'Ex exercitationem se', 'Voluptates sed eius'),
(2, 'Akeem', 'Johns', 'L', '2000-03-30', 'Male', 'Single', 12312312, 'Ea eos est architec', 'Dolor ut accusamus o'),
(3, 'Moana', 'Reeves', 'L', '1999-04-09', 'Male', 'Married', 12312312, 'Vel ut est quas mini', 'Exercitation illum'),
(4, 'Callie', 'Harmon', 'L', '1998-12-28', 'Female', 'Married', 12312312, 'Et et reprehenderit', 'Molestiae magnam id'),
(5, 'Isabelle', 'Taylor', 'L', '1995-11-28', 'Female', 'Married', 1231231, 'Recusandae Alias ea', 'Deserunt fuga Do pa'),
(6, 'Fatima', 'Stokes', 'L', '2003-12-13', 'Female', 'Single', 12312312, 'Consequat Odio amet', 'Nisi incididunt ut r'),
(7, 'Freya', 'Grimes', 'L', '2005-08-28', 'Male', 'Single', 12312312, 'Alias voluptatem cum', 'Nostrum vitae accusa'),
(8, 'Ethan', 'Finch', 'L', '2003-03-17', 'Female', 'Married', 12312312, 'Possimus est amet', 'Id aperiam sint sap'),
(9, 'Kathleen', 'Aguirre', 'L', '1986-06-29', 'Male', 'Single', 12312312, 'Beatae totam illum', 'Aut rerum id perfere');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parents`
--

CREATE TABLE `tbl_parents` (
  `pt_id` int(200) NOT NULL,
  `pt_ffname` varchar(200) NOT NULL,
  `pt_flname` varchar(200) NOT NULL,
  `pt_fmiddle` varchar(200) NOT NULL,
  `pt_mfname` varchar(200) NOT NULL,
  `pt_mlname` varchar(200) NOT NULL,
  `pt_mmiddle` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_parents`
--

INSERT INTO `tbl_parents` (`pt_id`, `pt_ffname`, `pt_flname`, `pt_fmiddle`, `pt_mfname`, `pt_mlname`, `pt_mmiddle`) VALUES
(1, 'Ella', 'David', '', 'Mikayla', 'Cabrera', ''),
(2, 'Juliet', 'Talley', '', 'Brynn', 'Vance', ''),
(3, 'Lysandra', 'Farrell', '', 'Sharon', 'Vang', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_birth`
--
ALTER TABLE `tbl_birth`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_info`
--
ALTER TABLE `tbl_info`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `tbl_parents`
--
ALTER TABLE `tbl_parents`
  ADD PRIMARY KEY (`pt_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_birth`
--
ALTER TABLE `tbl_birth`
  MODIFY `b_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `c_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_info`
--
ALTER TABLE `tbl_info`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_parents`
--
ALTER TABLE `tbl_parents`
  MODIFY `pt_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
