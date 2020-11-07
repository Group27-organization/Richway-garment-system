-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2020 at 12:48 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `richway_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountant`
--

CREATE TABLE `accountant` (
  `emp_ID` varchar(50) NOT NULL,
  `login_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `assign`
--

CREATE TABLE `assign` (
  `job_ID` varchar(50) NOT NULL,
  `line_ID` varchar(50) NOT NULL,
  `lines_count` int(100) NOT NULL,
  `start_date_and_time` varchar(100) NOT NULL,
  `end_date_and_time` varchar(100) NOT NULL,
  `emp_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `date` date NOT NULL,
  `attendence` int(50) NOT NULL,
  `OT_hours` int(100) NOT NULL,
  `emp_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bank_account`
--

CREATE TABLE `bank_account` (
  `bank_ID` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `ac_number` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank_account`
--

INSERT INTO `bank_account` (`bank_ID`, `name`, `branch`, `ac_number`) VALUES
('bnk1', 'Tempory Name', 'Tempory Branch', 100000000);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_ID` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact_no` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_ID` varchar(50) NOT NULL,
  `contact_no` char(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `job_start_date` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `salary_basic` varchar(100) NOT NULL,
  `blood_group` varchar(20) NOT NULL,
  `bank_account_name` varchar(100) NOT NULL,
  `bank_branch` varchar(100) NOT NULL,
  `account_no` varchar(50) NOT NULL,
  `bank_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_ID`, `contact_no`, `name`, `job_start_date`, `address`, `salary_basic`, `blood_group`, `bank_account_name`, `bank_branch`, `account_no`, `bank_ID`) VALUES
('emp1', '0708042314', 'Yasiru Ayeshmantha', '2020-10-01', 'No 12, Matara road,Matara.', '45000', 'O', 'K. Y. Ayeshmanatha', 'Matara', '10102564526', 'bnk1'),
('emp2', '0705826482', 'Mahela Jayewardene', '2020-10-03', 'No 12, Matara road,Matara.', '35000', 'A+', 'M. Jayewardene', 'Matara', '10402344719', 'bnk1'),
('emp3', '0765123482', 'Angelo Mathews', '2020-10-03', 'No 12, Matara road,Matara.', '35000', 'B-', 'M. Jayewardene', 'Matara', '104053123459', 'bnk1'),
('emp4', '0708042314', 'Kasun Lakshitha', '2020-10-22', 'No 12, Matara road,Matara.', '35000', 'O', 'K. L. Rajapaksa', 'Matara', '10102564526', 'bnk1'),
('emp5', '0705826482', 'Kusal Mendis', '2020-10-15', 'No 12, Matara road,Matara.', '35000', 'A+', 'K. Mendis', 'Matara', '10402344719', 'bnk1'),
('emp6', '0765123482', 'Dimuth Karunarattna', '2020-10-03', 'No 12, Matara road,Matara.', '35000', 'B-', 'D. Karunarattna', 'Matara', '104053123459', 'bnk1');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_ID` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `emp_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `line`
--

CREATE TABLE `line` (
  `line_ID` varchar(50) NOT NULL,
  `item_per_hour` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `machine_count` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_ID` int(10) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL,
  `role_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_ID`, `user_name`, `password`, `role_id`) VALUES
(1, 'uishara98@gmail.com', '$2y$10$eW5JH9xeD6txXi8HcPKTYeqhUGNlz5X3OErD52QorR.sLX5Vvm6FS', 1),
(2, 'yasiruayesh97@gmail.com', '$2y$10$eW5JH9xeD6txXi8HcPKTYeqhUGNlz5X3OErD52QorR.sLX5Vvm6FS', 3),
(34, 'mahela@richwaygarment.com', '$2y$10$GRi0opBurVCZ5vvo5fpWOuRVCEK3H483ET04uY5nuonm80Wp5opbG', 6),
(35, 'angelo@richwaygarment.com', '$2y$10$CXMzKCYkX61.5gBgu01SrOhsLgAPkvJd9vq/7ZKzMwY6LskiT9BpW', 4),
(41, 'kumar@richwaygarment.com', '$2y$10$yrwgtNBkYcnliz1t70/HlevARdz/q2iptyuopMLMtjby2aGdLdGOa', 2);

-- --------------------------------------------------------

--
-- Table structure for table `machine`
--

CREATE TABLE `machine` (
  `stock_ID` varchar(50) NOT NULL,
  `warranty` varchar(100) NOT NULL,
  `manufacturer` varchar(100) NOT NULL,
  `line_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `maintainance`
--

CREATE TABLE `maintainance` (
  `id` varchar(50) NOT NULL,
  `cost` int(100) NOT NULL,
  `date_of_maintain` date NOT NULL,
  `description` varchar(200) NOT NULL,
  `stock_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_ID` varchar(50) NOT NULL,
  `order_name` varchar(100) NOT NULL,
  `order_status` varchar(50) NOT NULL,
  `order_description` varchar(100) NOT NULL,
  `order_due_date` date NOT NULL,
  `order_price` varchar(100) NOT NULL,
  `advance_price` varchar(100) NOT NULL,
  `emp_ID` varchar(50) NOT NULL,
  `customer_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_item`
--

CREATE TABLE `order_item` (
  `order_item_ID` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `logo_count` int(100) NOT NULL,
  `button_color_code` varchar(50) NOT NULL,
  `material` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `design_mockup` varchar(50) NOT NULL,
  `material_color_code` varchar(50) NOT NULL,
  `order_ID` varchar(50) NOT NULL,
  `p_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `owner_ID` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `login_ID` int(10) DEFAULT NULL,
  `address` varchar(50) NOT NULL,
  `contact_no` char(10) NOT NULL,
  `blood_group` char(2) NOT NULL,
  `bank_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`owner_ID`, `name`, `login_ID`, `address`, `contact_no`, `blood_group`, `bank_ID`) VALUES
('own1', 'Kumar Sangakkara', 41, 'No 21, Colombo road, Colombo 7.', '0715064213', 'A+', 'bnk1'),
('own2', 'Upul Tharanga', NULL, 'No 21, Colombo road, Colombo 7.', '0705826482', 'A+', 'bnk1');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_ID` varchar(50) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `payment_status` varchar(50) NOT NULL,
  `payment_date` date NOT NULL,
  `payment_description` varchar(200) NOT NULL,
  `owner_ID` varchar(50) NOT NULL,
  `emp_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `permission_ID` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `module` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `per_role_login`
--

CREATE TABLE `per_role_login` (
  `login_ID` int(10) NOT NULL,
  `permission_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `predifine`
--

CREATE TABLE `predifine` (
  `p_ID` varchar(50) NOT NULL,
  `OT_tailoring_cost` varchar(100) NOT NULL,
  `normal_tailoring_cost` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `tailoring_time` varchar(50) NOT NULL,
  `fabric_quantity` int(100) NOT NULL,
  `button_quantity` int(100) NOT NULL,
  `nool_reel_quantity` varchar(100) NOT NULL,
  `minimum_profit` varchar(100) NOT NULL,
  `margin` varchar(50) NOT NULL,
  `style` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produce`
--

CREATE TABLE `produce` (
  `job_ID` varchar(50) NOT NULL,
  `order_item_ID` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `production_manager`
--

CREATE TABLE `production_manager` (
  `emp_ID` varchar(50) NOT NULL,
  `login_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `production_manager`
--

INSERT INTO `production_manager` (`emp_ID`, `login_ID`) VALUES
('emp3', 35);

-- --------------------------------------------------------

--
-- Table structure for table `row_material`
--

CREATE TABLE `row_material` (
  `unit_price` varchar(100) NOT NULL,
  `color_code` varchar(50) NOT NULL,
  `order_item_ID` varchar(50) NOT NULL,
  `stock_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sales_manager`
--

CREATE TABLE `sales_manager` (
  `emp_ID` varchar(50) NOT NULL,
  `login_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_manager`
--

INSERT INTO `sales_manager` (`emp_ID`, `login_ID`) VALUES
('emp1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `shirt`
--

CREATE TABLE `shirt` (
  `p_ID` varchar(50) NOT NULL,
  `collar_size` varchar(20) NOT NULL,
  `height` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_ID` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `emp_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stock_keeper`
--

CREATE TABLE `stock_keeper` (
  `emp_ID` varchar(50) NOT NULL,
  `login_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock_keeper`
--

INSERT INTO `stock_keeper` (`emp_ID`, `login_ID`) VALUES
('emp2', 34);

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `emp_ID` varchar(50) NOT NULL,
  `login_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_ID` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact_no` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `supply`
--

CREATE TABLE `supply` (
  `stock_ID` varchar(50) NOT NULL,
  `supplier_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `t-shirt`
--

CREATE TABLE `t-shirt` (
  `p_ID` varchar(50) NOT NULL,
  `height` int(100) NOT NULL,
  `size` varchar(20) NOT NULL,
  `time_for_logo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tailor`
--

CREATE TABLE `tailor` (
  `emp_ID` varchar(50) NOT NULL,
  `line_ID` varchar(50) NOT NULL,
  `t_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tool`
--

CREATE TABLE `tool` (
  `stock_ID` varchar(50) NOT NULL,
  `manufacture` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_ID` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_ID`, `title`, `description`) VALUES
(1, 'admin', 'Administrator of the system.'),
(2, 'owner', 'Owner of the company.'),
(3, 'sales_manager', 'Sales Manager of the company.'),
(4, 'production_manager', 'Production Manager of the company.'),
(5, 'supervisor', 'Supervisor of the company.'),
(6, 'stock_keeper', 'Stock Keeper of the company.'),
(7, 'accountant', 'Accountant of the company.');

-- --------------------------------------------------------

--
-- Table structure for table `workload`
--

CREATE TABLE `workload` (
  `date` date NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `job_ID` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountant`
--
ALTER TABLE `accountant`
  ADD PRIMARY KEY (`emp_ID`,`login_ID`) USING BTREE,
  ADD KEY `acc_l` (`login_ID`);

--
-- Indexes for table `assign`
--
ALTER TABLE `assign`
  ADD KEY `t21` (`job_ID`),
  ADD KEY `t22` (`line_ID`),
  ADD KEY `t23` (`emp_ID`);

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD PRIMARY KEY (`date`),
  ADD KEY `t6` (`emp_ID`);

--
-- Indexes for table `bank_account`
--
ALTER TABLE `bank_account`
  ADD PRIMARY KEY (`bank_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_ID`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_ID`),
  ADD KEY `bank_ID` (`bank_ID`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`job_ID`);

--
-- Indexes for table `line`
--
ALTER TABLE `line`
  ADD PRIMARY KEY (`line_ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_ID`),
  ADD KEY `l_r` (`role_id`);

--
-- Indexes for table `machine`
--
ALTER TABLE `machine`
  ADD PRIMARY KEY (`stock_ID`),
  ADD KEY `t10` (`line_ID`);

--
-- Indexes for table `maintainance`
--
ALTER TABLE `maintainance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stock_ID` (`stock_ID`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_ID`),
  ADD KEY `t1` (`customer_ID`),
  ADD KEY `t2` (`emp_ID`);

--
-- Indexes for table `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`order_item_ID`),
  ADD KEY `t16` (`order_ID`),
  ADD KEY `t17` (`p_ID`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`owner_ID`),
  ADD KEY `ow_l` (`login_ID`),
  ADD KEY `bank_ID` (`bank_ID`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_ID`),
  ADD KEY `t4` (`owner_ID`),
  ADD KEY `t5` (`emp_ID`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`permission_ID`);

--
-- Indexes for table `per_role_login`
--
ALTER TABLE `per_role_login`
  ADD KEY `t20` (`permission_ID`),
  ADD KEY `prl_l` (`login_ID`);

--
-- Indexes for table `predifine`
--
ALTER TABLE `predifine`
  ADD PRIMARY KEY (`p_ID`);

--
-- Indexes for table `produce`
--
ALTER TABLE `produce`
  ADD KEY `t24` (`job_ID`),
  ADD KEY `t25` (`order_item_ID`);

--
-- Indexes for table `production_manager`
--
ALTER TABLE `production_manager`
  ADD PRIMARY KEY (`emp_ID`,`login_ID`) USING BTREE,
  ADD KEY `p_l` (`login_ID`);

--
-- Indexes for table `row_material`
--
ALTER TABLE `row_material`
  ADD PRIMARY KEY (`stock_ID`),
  ADD KEY `t11` (`order_item_ID`);

--
-- Indexes for table `sales_manager`
--
ALTER TABLE `sales_manager`
  ADD PRIMARY KEY (`emp_ID`,`login_ID`) USING BTREE,
  ADD KEY `sl` (`login_ID`);

--
-- Indexes for table `shirt`
--
ALTER TABLE `shirt`
  ADD PRIMARY KEY (`p_ID`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_ID`),
  ADD KEY `t12` (`emp_ID`);

--
-- Indexes for table `stock_keeper`
--
ALTER TABLE `stock_keeper`
  ADD PRIMARY KEY (`emp_ID`,`login_ID`) USING BTREE,
  ADD KEY `st_l` (`login_ID`);

--
-- Indexes for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD PRIMARY KEY (`emp_ID`,`login_ID`) USING BTREE,
  ADD KEY `su_l` (`login_ID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_ID`);

--
-- Indexes for table `supply`
--
ALTER TABLE `supply`
  ADD PRIMARY KEY (`stock_ID`,`supplier_ID`);

--
-- Indexes for table `t-shirt`
--
ALTER TABLE `t-shirt`
  ADD PRIMARY KEY (`p_ID`);

--
-- Indexes for table `tailor`
--
ALTER TABLE `tailor`
  ADD PRIMARY KEY (`t_id`) USING BTREE,
  ADD KEY `line_ID` (`line_ID`),
  ADD KEY `emp_ID` (`emp_ID`);

--
-- Indexes for table `tool`
--
ALTER TABLE `tool`
  ADD PRIMARY KEY (`stock_ID`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_ID`);

--
-- Indexes for table `workload`
--
ALTER TABLE `workload`
  ADD PRIMARY KEY (`date`),
  ADD KEY `t3` (`job_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tailor`
--
ALTER TABLE `tailor`
  MODIFY `t_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accountant`
--
ALTER TABLE `accountant`
  ADD CONSTRAINT `acc_l` FOREIGN KEY (`login_ID`) REFERENCES `login` (`login_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `accountant_ibfk_1` FOREIGN KEY (`emp_ID`) REFERENCES `employee` (`emp_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `assign`
--
ALTER TABLE `assign`
  ADD CONSTRAINT `t21` FOREIGN KEY (`job_ID`) REFERENCES `job` (`job_ID`),
  ADD CONSTRAINT `t22` FOREIGN KEY (`line_ID`) REFERENCES `line` (`line_ID`),
  ADD CONSTRAINT `t23` FOREIGN KEY (`emp_ID`) REFERENCES `employee` (`emp_ID`);

--
-- Constraints for table `attendence`
--
ALTER TABLE `attendence`
  ADD CONSTRAINT `t6` FOREIGN KEY (`emp_ID`) REFERENCES `employee` (`emp_ID`);

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`bank_ID`) REFERENCES `bank_account` (`bank_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `l_r` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`role_ID`) ON UPDATE CASCADE;

--
-- Constraints for table `machine`
--
ALTER TABLE `machine`
  ADD CONSTRAINT `t10` FOREIGN KEY (`line_ID`) REFERENCES `line` (`line_ID`);

--
-- Constraints for table `maintainance`
--
ALTER TABLE `maintainance`
  ADD CONSTRAINT `maintainance_ibfk_1` FOREIGN KEY (`stock_ID`) REFERENCES `stock` (`stock_ID`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `t1` FOREIGN KEY (`customer_ID`) REFERENCES `customer` (`customer_ID`),
  ADD CONSTRAINT `t2` FOREIGN KEY (`emp_ID`) REFERENCES `employee` (`emp_ID`);

--
-- Constraints for table `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `t16` FOREIGN KEY (`order_ID`) REFERENCES `order` (`order_ID`),
  ADD CONSTRAINT `t17` FOREIGN KEY (`p_ID`) REFERENCES `predifine` (`p_ID`);

--
-- Constraints for table `owner`
--
ALTER TABLE `owner`
  ADD CONSTRAINT `ow_l` FOREIGN KEY (`login_ID`) REFERENCES `login` (`login_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `owner_ibfk_1` FOREIGN KEY (`bank_ID`) REFERENCES `bank_account` (`bank_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `t4` FOREIGN KEY (`owner_ID`) REFERENCES `owner` (`owner_ID`),
  ADD CONSTRAINT `t5` FOREIGN KEY (`emp_ID`) REFERENCES `employee` (`emp_ID`);

--
-- Constraints for table `per_role_login`
--
ALTER TABLE `per_role_login`
  ADD CONSTRAINT `prl_l` FOREIGN KEY (`login_ID`) REFERENCES `login` (`login_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t20` FOREIGN KEY (`permission_ID`) REFERENCES `permission` (`permission_ID`);

--
-- Constraints for table `produce`
--
ALTER TABLE `produce`
  ADD CONSTRAINT `t24` FOREIGN KEY (`job_ID`) REFERENCES `job` (`job_ID`),
  ADD CONSTRAINT `t25` FOREIGN KEY (`order_item_ID`) REFERENCES `order_item` (`order_item_ID`);

--
-- Constraints for table `production_manager`
--
ALTER TABLE `production_manager`
  ADD CONSTRAINT `p_l` FOREIGN KEY (`login_ID`) REFERENCES `login` (`login_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `production_manager_ibfk_1` FOREIGN KEY (`emp_ID`) REFERENCES `employee` (`emp_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `row_material`
--
ALTER TABLE `row_material`
  ADD CONSTRAINT `t11` FOREIGN KEY (`order_item_ID`) REFERENCES `row_material` (`stock_ID`);

--
-- Constraints for table `sales_manager`
--
ALTER TABLE `sales_manager`
  ADD CONSTRAINT `sales_manager_ibfk_1` FOREIGN KEY (`emp_ID`) REFERENCES `employee` (`emp_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sl` FOREIGN KEY (`login_ID`) REFERENCES `login` (`login_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `t12` FOREIGN KEY (`emp_ID`) REFERENCES `employee` (`emp_ID`);

--
-- Constraints for table `stock_keeper`
--
ALTER TABLE `stock_keeper`
  ADD CONSTRAINT `st_l` FOREIGN KEY (`login_ID`) REFERENCES `login` (`login_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stock_keeper_ibfk_1` FOREIGN KEY (`emp_ID`) REFERENCES `employee` (`emp_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supervisor`
--
ALTER TABLE `supervisor`
  ADD CONSTRAINT `su_l` FOREIGN KEY (`login_ID`) REFERENCES `login` (`login_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `supervisor_ibfk_1` FOREIGN KEY (`emp_ID`) REFERENCES `employee` (`emp_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tailor`
--
ALTER TABLE `tailor`
  ADD CONSTRAINT `t_line` FOREIGN KEY (`line_ID`) REFERENCES `line` (`line_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tailor_ibfk_1` FOREIGN KEY (`emp_ID`) REFERENCES `employee` (`emp_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `workload`
--
ALTER TABLE `workload`
  ADD CONSTRAINT `t3` FOREIGN KEY (`job_ID`) REFERENCES `job` (`job_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
