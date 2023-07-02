-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2023 at 07:23 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `details`
--

CREATE TABLE `details` (
  `user_id` int(5) NOT NULL,
  `ref_docno` varchar(15) NOT NULL,
  `ref_docdt` date NOT NULL,
  `ref_sec` varchar(15) NOT NULL,
  `dc_rec_no` varchar(15) NOT NULL,
  `dc_rec_dt` date NOT NULL,
  `igp_itmcd` varchar(15) NOT NULL,
  `vend_name` varchar(15) NOT NULL,
  `igp_au` varchar(15) NOT NULL,
  `igp_itmqty` varchar(15) NOT NULL,
  `rb_no` varchar(15) NOT NULL,
  `send_epcd` varchar(15) NOT NULL,
  `send_epds` varchar(15) NOT NULL,
  `migp_no` varchar(15) NOT NULL,
  `migp_sl` varchar(15) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doc_details`
--

CREATE TABLE `doc_details` (
  `user_id` int(5) NOT NULL,
  `cd` varchar(15) NOT NULL,
  `avl` varchar(15) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doc_details`
--

INSERT INTO `doc_details` (`user_id`, `cd`, `avl`, `id`) VALUES
(81868, 'afw', 'asf', 1),
(81868, 'xzv', 'xzv', 1),
(21693, 'QADW', 'asd', 3),
(63454, 'dfds', 'adsf', 4),
(0, '22', 'fwsfwsd', 0),
(0, 'we', 'fwsfwsd', 0),
(3, 'we', '2ee2e', 0);

-- --------------------------------------------------------

--
-- Table structure for table `escrt_details`
--

CREATE TABLE `escrt_details` (
  `user_id` int(5) NOT NULL,
  `escrt_id` varchar(15) NOT NULL,
  `escrt_nam` varchar(15) NOT NULL,
  `escrt_desg` varchar(15) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `escrt_details`
--

INSERT INTO `escrt_details` (`user_id`, `escrt_id`, `escrt_nam`, `escrt_desg`, `id`) VALUES
(81868, 'awf', 'asf', 'fa', 1),
(81868, 'zC', 'zc', 'vc', 1),
(21693, 'QWR', 'QWRD', 'DS', 3),
(63454, '23', 'gaurds', 'officiers', 4),
(54652, '', '', '', 0),
(54652, '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `attempts` int(11) DEFAULT 0,
  `lockout_time` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_attempts`
--

INSERT INTO `login_attempts` (`id`, `username`, `attempts`, `lockout_time`, `created_at`) VALUES
(1, 'admin', 1, NULL, '2023-06-27 05:18:31'),
(2, 'admin', 1, NULL, '2023-06-27 05:18:37'),
(3, 'admin', 1, NULL, '2023-06-27 05:18:42'),
(4, 'admin', 1, NULL, '2023-06-27 05:18:46'),
(5, 'admin', 1, NULL, '2023-06-27 05:18:51'),
(6, 'admin', 1, NULL, '2023-06-27 08:51:57'),
(7, 'admin', 1, NULL, '2023-06-27 08:52:52'),
(8, 'admin', 1, NULL, '2023-06-27 08:58:56'),
(9, 'admin', 1, NULL, '2023-06-27 09:13:01'),
(10, 'ram', 1, NULL, '2023-06-27 09:20:51');

-- --------------------------------------------------------

--
-- Table structure for table `pkg_details`
--

CREATE TABLE `pkg_details` (
  `user_id` int(5) NOT NULL,
  `pkg_mod` varchar(15) NOT NULL,
  `no_of_pkg` varchar(15) NOT NULL,
  `pkg_slno` varchar(15) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pkg_details`
--

INSERT INTO `pkg_details` (`user_id`, `pkg_mod`, `no_of_pkg`, `pkg_slno`, `id`) VALUES
(43775, 'wfdwdw', '4', '2333', 0),
(43775, 'wfdwdw', '4', '2333', 0),
(43775, 'wfdwdw', '4', '3423', 0),
(43775, '2', '4', '3423', 0),
(43775, 'wfdwdw', '4', '2333', 0),
(0, 'wfdwdw', '3', '3423', 0),
(0, '2', '4', '2333', 0),
(0, 'wfdwdw', '3', '2333', 0),
(1, '2', '4', '3423', 0),
(1, 'wfdwdw', '4', '2333', 0);

-- --------------------------------------------------------

--
-- Table structure for table `root`
--

CREATE TABLE `root` (
  `slno` int(11) NOT NULL DEFAULT 1,
  `po_no` char(10) NOT NULL,
  `po_dt` date NOT NULL DEFAULT curdate(),
  `sis_no` char(10) DEFAULT NULL,
  `sis_dt` date DEFAULT NULL,
  `itm_cd` char(13) NOT NULL,
  `reqd_qty` decimal(12,3) NOT NULL,
  `unit_rt` decimal(15,5) NOT NULL,
  `rt_per` decimal(11,3) DEFAULT NULL,
  `cst_pct` decimal(5,3) NOT NULL DEFAULT 0.000,
  `st_pct` decimal(5,3) DEFAULT NULL,
  `sc_on_st_pct` decimal(5,3) NOT NULL DEFAULT 0.000,
  `addl_sc_pct` decimal(5,3) NOT NULL DEFAULT 0.000,
  `bas_exc_pct` decimal(5,3) NOT NULL DEFAULT 0.000,
  `addl_exc_pct` decimal(5,3) NOT NULL DEFAULT 0.000,
  `exc_pct` decimal(5,3) DEFAULT NULL,
  `disc_pct` decimal(5,3) NOT NULL DEFAULT 0.000,
  `pf_chgs` decimal(13,5) NOT NULL,
  `pf_pct` decimal(5,3) NOT NULL DEFAULT 0.000,
  `cust_pct` decimal(5,3) NOT NULL DEFAULT 0.000,
  `freight` decimal(13,5) NOT NULL,
  `oct_pct` decimal(5,3) NOT NULL DEFAULT 0.000,
  `oth_chgs` decimal(14,5) NOT NULL,
  `recd_qty` decimal(12,3) NOT NULL,
  `act_qty` decimal(12,3) NOT NULL,
  `tot_val` decimal(20,5) NOT NULL,
  `amt_pd` decimal(14,3) NOT NULL DEFAULT 0.000,
  `dly_typ_ind` char(1) DEFAULT NULL,
  `ord_typ_ind` char(1) NOT NULL DEFAULT 'o',
  `tol_pct` decimal(6,2) NOT NULL DEFAULT 0.00,
  `popt_duml` varchar(20) DEFAULT NULL,
  `popt_dum2` varchar(20) DEFAULT NULL,
  `popt_dum3` varchar(20) DEFAULT NULL,
  `cgst_pct` decimal(5,3) DEFAULT NULL,
  `sgst_pct` decimal(5,3) DEFAULT NULL,
  `igst_pct` decimal(5,3) DEFAULT NULL,
  `ugst_pct` decimal(5,3) DEFAULT NULL,
  `hsn_code` char(10) DEFAULT NULL,
  `stat_cd` char(1) DEFAULT NULL,
  `cgst_val` decimal(19,5) DEFAULT NULL,
  `sgst_val` decimal(19,5) DEFAULT NULL,
  `igst_val` decimal(19,5) DEFAULT NULL,
  `ugst_val` decimal(19,5) DEFAULT NULL,
  `lc_basic_rate` decimal(15,5) DEFAULT NULL,
  `lc_epf_pct` decimal(5,3) DEFAULT NULL,
  `lc_esi_pct` decimal(5,3) DEFAULT NULL,
  `lc_bonus_pct` decimal(5,3) DEFAULT NULL,
  `lc_no_of_pers` smallint(6) DEFAULT NULL,
  `lc_noofdays_month` smallint(6) DEFAULT NULL,
  `lc_no_of_months` smallint(6) DEFAULT NULL,
  `lc_profit_pct` decimal(7,5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` int(5) NOT NULL,
  `username` varchar(15) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `username`, `Date`, `password`) VALUES
(1, 92148, 'staff', '2023-06-27 10:30:59', '$2y$10$NGWLJTSiU.4/4uwAMkgyJ.xGwEogHxUIygfWFkV2PmditOtbazOnu'),
(2, 18770, 'vasa', '2023-06-27 10:57:32', '$2y$10$c4af18bNSMSyBsF6nHdnSOP7JMN2gSS9DbxYqtmRqi1s.rwnhhGFe'),
(3, 54652, 'kumar', '2023-06-28 03:04:00', '$2y$10$j6iFYb3..60szNRj/Gwicecds0Pvzs3QpQIOE/X9Ltq7YGISx696y');

-- --------------------------------------------------------

--
-- Table structure for table `veh_details`
--

CREATE TABLE `veh_details` (
  `user_id` int(3) NOT NULL,
  `vehNo` varchar(15) NOT NULL,
  `lrNo` varchar(15) NOT NULL,
  `lr_recdt` date NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `veh_details`
--

INSERT INTO `veh_details` (`user_id`, `vehNo`, `lrNo`, `lr_recdt`, `id`) VALUES
(81868, 'af', 'af', '2023-06-22', 1),
(81868, 'xvz', 'xzv', '2023-06-06', 1),
(21693, 'QWD', 'ASD', '2023-06-21', 3),
(63454, 'asda', 'acsaca', '2023-06-08', 4),
(43775, '344', '4444', '2023-06-14', 0),
(43775, '44', '444', '2023-06-09', 0),
(43775, '344', '43rewr3', '2023-06-23', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
