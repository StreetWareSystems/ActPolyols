-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2022 at 01:53 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `actdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `Id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_email` varchar(256) DEFAULT NULL,
  `ProductId` varchar(255) NOT NULL,
  `Package` varchar(255) NOT NULL,
  `Port` varchar(255) NOT NULL,
  `Container` varchar(255) NOT NULL,
  `PalletType` varchar(255) NOT NULL,
  `ActMargin` varchar(255) NOT NULL,
  `NumOfPackaging` varchar(255) NOT NULL,
  `WeightPerPackaging` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `action_made` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`Id`, `user_id`, `user_email`, `ProductId`, `Package`, `Port`, `Container`, `PalletType`, `ActMargin`, `NumOfPackaging`, `WeightPerPackaging`, `date_created`, `action_made`) VALUES
(1350, 8, 'user2', 'CRS DE28', 'Drums', 'New York', '20', 'Plastic', '0.1', 'Standard', 'Standard', '2022-02-24 15:42:59', 'User Generated a File from Syrup'),
(1349, 8, 'user2', 'CRS DE28', 'Spacekraft', 'New York', '20', 'Plastic', '0.1', 'Standard', 'Standard', '2022-02-24 15:37:12', 'User Generated a File from Syrup'),
(1348, 8, 'user2', 'CRS DE28', 'Drums', 'New York', '20', 'Plastic', '0.1', 'Standard', 'Standard', '2022-02-24 11:43:36', 'User Generated a File from Syrup'),
(1347, 8, 'user2', 'CRS DE28', 'Drums', 'New York', '20', 'Plastic', '0.1', 'Standard', 'Standard', '2022-02-24 11:35:42', 'User Generated a File from Syrup'),
(1346, 8, 'user2', 'CRS DE28', 'Drums', 'New York', '20', 'Plastic', '0.1', 'Standard', 'Standard', '2022-02-24 11:17:15', 'User Generated a File from Syrup');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) NOT NULL,
  `added_by_users_id` int(10) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `booking_time` varchar(20) DEFAULT NULL,
  `customers_id` int(10) DEFAULT NULL,
  `number_of_passengers` int(10) DEFAULT NULL,
  `pickup_address` text DEFAULT NULL,
  `drop_off_address` text DEFAULT NULL,
  `return_journey` enum('Yes','No') DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `return_time` varchar(20) DEFAULT NULL,
  `return_flight_number` int(11) DEFAULT NULL,
  `contact_telephone_number` int(11) DEFAULT NULL,
  `total_fare` decimal(10,2) DEFAULT NULL,
  `paid_or_unpaid` enum('PAID','NOT PAID') DEFAULT NULL,
  `payment_method` enum('Cash','Bacs','Cheque','Account') DEFAULT NULL,
  `comments_for_booking` text DEFAULT NULL,
  `type_of_taxi` enum('Local Taxi','Airport Taxi') DEFAULT NULL,
  `type_of_vehicle_required` int(11) DEFAULT NULL,
  `assign_to_driver_users_id` int(11) DEFAULT NULL,
  `allocated_pickup_time` varchar(20) DEFAULT NULL,
  `allocated_finish_time_of_booking_for_the_day` varchar(20) DEFAULT NULL,
  `customer_type` enum('New customer','Returning customer','Account customer') DEFAULT NULL,
  `source_of_booking` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `added_by_users_id`, `booking_date`, `booking_time`, `customers_id`, `number_of_passengers`, `pickup_address`, `drop_off_address`, `return_journey`, `return_date`, `return_time`, `return_flight_number`, `contact_telephone_number`, `total_fare`, `paid_or_unpaid`, `payment_method`, `comments_for_booking`, `type_of_taxi`, `type_of_vehicle_required`, `assign_to_driver_users_id`, `allocated_pickup_time`, `allocated_finish_time_of_booking_for_the_day`, `customer_type`, `source_of_booking`, `created_at`, `updated_at`) VALUES
(2, 9, '2020-03-13', '00:00', 1, 1, 'London', 'NY', 'Yes', '0000-00-00', 'bb', 0, 0, '0.00', '', '', '', '', 0, 10, '', '', 'New customer', 5, '2020-03-12 12:22:13', '2020-03-13 12:12:19'),
(3, 9, '2020-03-18', '10:00', 1, 44, 'Oxford', 'London', 'Yes', '2020-03-13', '12:05', 0, 0, '0.00', 'PAID', '', '', 'Local Taxi', 0, 10, '08:00', '', 'Returning customer', 55, '2020-03-13 08:02:23', '2020-03-13 12:12:09'),
(4, 9, '2020-03-19', '13:05', 1, 1, 'Ny', 'Oxford', 'Yes', '2020-03-13', '13:15', 0, 0, '0.00', '', '', '', '', 0, 11, '', '', 'New customer', 55, '2020-03-13 08:45:18', '2020-03-13 12:27:39'),
(5, 9, '2020-03-15', '22:30', 1, 33, '23677', '64555', 'Yes', '2020-03-13', '17:35', 6666, 666666, '66.00', 'PAID', 'Cash', '666', 'Local Taxi', 66, 11, '17:30', '55', 'New customer', 555, '2020-03-13 12:24:58', '2020-03-13 12:27:18'),
(6, 9, '2020-03-14', '02:20', 1, 44, 'C-20,JAkir Hossain Road,Block-E', 'Md-pur', 'Yes', '2020-03-14', '20:50', 0, 66565656, '66.00', 'PAID', 'Cash', '', 'Local Taxi', 0, 11, '', '', 'New customer', 0, '2020-03-13 21:53:24', '2020-03-14 17:45:11'),
(7, 9, '2020-03-25', '12:45', 1, 0, 'Dhaka', 'Md-pur', 'No', '2020-03-26', '21:45', 0, 66565656, '0.00', 'PAID', 'Cash', '', 'Local Taxi', 0, 11, '12:35', '55', 'New customer', 55, '2020-03-25 07:05:30', '2020-03-25 07:16:12');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `CompanyId` int(11) NOT NULL,
  `CompanyName` varchar(300) NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`CompanyId`, `CompanyName`, `img`) VALUES
(5, 'Admin', '../DatabasePhpFile/Company/Ismail-industries.jpg'),
(6, 'dwadawdaw', '../DatabasePhpFile/Company/Immentia.png'),
(61, 'Immentia', '../DatabasePhpFile/Company/Immentia.png'),
(78, 'Ismail Industries', '../DatabasePhpFile/Company/Ismail-industries.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `company_product`
--

CREATE TABLE `company_product` (
  `Comp_Product_Id` int(11) NOT NULL,
  `CompanyId` int(11) NOT NULL,
  `ProductId` varchar(100) NOT NULL,
  `FTotal` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_product`
--

INSERT INTO `company_product` (`Comp_Product_Id`, `CompanyId`, `ProductId`, `FTotal`) VALUES
(10, 6, 'ORSS DE10', 4),
(13, 6, 'CRS DE28', 2),
(24, 61, 'ORS DE42', 111),
(25, 6, 'RSS DE10', 11);

-- --------------------------------------------------------

--
-- Table structure for table `container`
--

CREATE TABLE `container` (
  `ContainerId` int(11) NOT NULL,
  `ContainerSize` int(11) NOT NULL,
  `ContainerPallet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `container`
--

INSERT INTO `container` (`ContainerId`, `ContainerSize`, `ContainerPallet`) VALUES
(1, 20, 16),
(2, 40, 30);

-- --------------------------------------------------------

--
-- Table structure for table `duties`
--

CREATE TABLE `duties` (
  `DutiesId` int(11) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `ProductTypeId` int(11) NOT NULL,
  `DutiesValue` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `duties`
--

INSERT INTO `duties` (`DutiesId`, `Country`, `ProductTypeId`, `DutiesValue`) VALUES
(2, 'US', 1, 4.9),
(3, 'US', 2, 4.9),
(4, 'CA', 2, 3.5),
(5, 'CA', 1, 4.95),
(18, 'CA', 1, 12),
(20, 'US', 1, 1111111),
(21, 'US', 1, 122),
(22, 'US', 1, 12);

-- --------------------------------------------------------

--
-- Table structure for table `freightrates`
--

CREATE TABLE `freightrates` (
  `FreightRateId` int(11) NOT NULL,
  `Port` varchar(100) NOT NULL,
  `Country` varchar(100) NOT NULL,
  `FreightSize` int(11) NOT NULL,
  `PortName` varchar(100) NOT NULL,
  `Rate` float NOT NULL,
  `Limit` float NOT NULL,
  `Maxlimit` float NOT NULL,
  `OWPenalty` float NOT NULL,
  `PerTonInDrums` float NOT NULL,
  `PerTonInTotes` float NOT NULL,
  `Validity` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `freightrates`
--

INSERT INTO `freightrates` (`FreightRateId`, `Port`, `Country`, `FreightSize`, `PortName`, `Rate`, `Limit`, `Maxlimit`, `OWPenalty`, `PerTonInDrums`, `PerTonInTotes`, `Validity`) VALUES
(2, 'Los', 'US', 20, 'la20', 1222, 22, 40, 0, 52.9004, 58.3746, '2022-02-15'),
(3, 'New York', 'US', 20, 'NYC-20', 10435, 17.9, 23.5, 0, 451.732, 498.477, '2022-02-17'),
(13, 'Los Angeles', 'US', 40, 'LA-40', 17000, 24, 40, 0, 629.63, 679.631, '2021-12-22'),
(14, 'New York', 'CA', 40, 'NYC-40', 144, 23, 24, 0, 5.33333, 5.75688, '2021-12-24'),
(31, 'LB', 'US', 20, 'Long Beach', 12875, 19, 24, 1000, 600.649, 617.017, '2022-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Id` int(11) NOT NULL,
  `Name` varchar(23) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `RoleId` int(11) NOT NULL,
  `CompanyId` int(11) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `Contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Id`, `Name`, `Email`, `Password`, `RoleId`, `CompanyId`, `date_created`, `Contact`) VALUES
(5, 'Admin', 'Admin@gmail.com', 'Abc@12', 1, 5, '2022-02-02 17:38:24', '9233331122'),
(8, 'user2', 'user2@gmail.com', 'Abc@12', 2, 6, '2022-02-02 17:38:24', '9233223222'),
(17, 'user', 'User@gmail.com', 'Abc@12', 2, 6, '2022-02-06 19:45:12', ''),
(19, 'Khurram ', 'khuraam@gmail.com', 'abc.123', 2, 61, '2022-02-07 11:32:21', '92233324432');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `PackageId` int(11) NOT NULL,
  `PackageName` varchar(100) NOT NULL,
  `CostperUnit` float NOT NULL,
  `Weight` float NOT NULL,
  `CostPerton` double NOT NULL,
  `20FtPallet` int(11) NOT NULL,
  `40FtPallet` int(11) NOT NULL,
  `20FtinMt` float NOT NULL,
  `40FtinMt` float NOT NULL,
  `UnitWeight` float NOT NULL,
  `BagPerPallet` float DEFAULT NULL,
  `ProductTypeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`PackageId`, `PackageName`, `CostperUnit`, `Weight`, `CostPerton`, `20FtPallet`, `40FtPallet`, `20FtinMt`, `40FtinMt`, `UnitWeight`, `BagPerPallet`, `ProductTypeID`) VALUES
(1, 'Drums', 15.88, 0.3, 52.933333333333, 76, 90, 23.1, 27, 0.01, NULL, 1),
(2, 'Spacekraft', 127, 1.365, 93.04029, 16, 19, 21.84, 25.94, 0.03, NULL, 1),
(3, 'Spacekraft  Heated', 169, 1.365, 123.8095, 16, 19, 21.84, 25.94, 0.03, NULL, 1),
(4, 'Jumbo Bags 800', 7.79, 0.8, 9.7375, 20, 33, 16, 26.4, 0.01, 1, 2),
(5, 'Small Bags 25kg', 0.29, 0.025, 11.7641, 14, 30, 9.1, 19.5, 0.01, 26, 2),
(25, 'DD', 17, 11, 1.5454545454545, 12, 12, 132, 132, 77, 22, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pallettype`
--

CREATE TABLE `pallettype` (
  `PalletId` int(11) NOT NULL,
  `PalletName` varchar(100) NOT NULL,
  `CostInDollar` float NOT NULL,
  `WeightinKg` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pallettype`
--

INSERT INTO `pallettype` (`PalletId`, `PalletName`, `CostInDollar`, `WeightinKg`) VALUES
(1, 'Plastic', 14.7059, 19),
(2, 'Wood', 11.176, 19);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductId` varchar(100) NOT NULL,
  `ProductName` varchar(100) NOT NULL,
  `UsdPerTon` float NOT NULL,
  `ProductDesc` varchar(150) NOT NULL,
  `DiscountInPercentage` float NOT NULL,
  `DiscountValue` float NOT NULL,
  `Total` float NOT NULL,
  `ProductTypeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductId`, `ProductName`, `UsdPerTon`, `ProductDesc`, `DiscountInPercentage`, `DiscountValue`, `Total`, `ProductTypeId`) VALUES
('CRS DE28', 'CRS28', 600, 'Clarified Rice Syrup DE28 Conventionaldf', 0, 0, 600, 1),
('OCBRSDE42', 'Organic Clarified Syrup DE 42', 660, 'Organic Clarified Brown Rice Syrup DE 42 No SO3', 0, 0, 660, 1),
('OPP-333', 'OP222', 444, 'This is a product', 2, 5.328, 438.672, 1),
('ORS DE42', 'OCRS42', 630, 'Organic Clarified Rice Syrup DE42', 0, 0, 630, 1),
('ORS DE60', 'OCRS60', 640, 'Organic Clarified Rice Syrup DE60', 0, 0, 640, 1),
('ORSS DE10', 'ORSS10', 1235.29, 'Organic Rice Maltodextrin DE10', 0, 0, 1235.29, 2),
('ProductId', 'ProductNAme', 11, 'ProductDescription', 2, 0.132, 10.868, 1),
('RSS DE10', 'RSS10', 1176.47, 'Rice Maltodextrin DE10', 0, 0, 1176.47, 2),
('RSS DE18', 'RSS18', 1176.47, 'Rice Maltodextrin DE18', 0, 0, 1176.47, 2),
('SRN 70', 'SRN7033', 670, 'Sorbitol 70% Non 1Crystalizing', 0, 0, 670, 2);

-- --------------------------------------------------------

--
-- Table structure for table `producttype`
--

CREATE TABLE `producttype` (
  `ProductTypeId` int(11) NOT NULL,
  `Type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `producttype`
--

INSERT INTO `producttype` (`ProductTypeId`, `Type`) VALUES
(1, 'Syrup'),
(2, 'Sorbitol');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `RoleId` int(11) NOT NULL,
  `Roletype` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`RoleId`, `Roletype`) VALUES
(1, 'Admin\r\n'),
(2, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`CompanyId`);

--
-- Indexes for table `company_product`
--
ALTER TABLE `company_product`
  ADD PRIMARY KEY (`Comp_Product_Id`),
  ADD KEY `Company_Fk` (`CompanyId`),
  ADD KEY `Product_Fk` (`ProductId`);

--
-- Indexes for table `container`
--
ALTER TABLE `container`
  ADD PRIMARY KEY (`ContainerId`);

--
-- Indexes for table `duties`
--
ALTER TABLE `duties`
  ADD PRIMARY KEY (`DutiesId`),
  ADD KEY `Product_ProductType3` (`ProductTypeId`);

--
-- Indexes for table `freightrates`
--
ALTER TABLE `freightrates`
  ADD PRIMARY KEY (`FreightRateId`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `loginrole` (`RoleId`),
  ADD KEY `loginCompany` (`CompanyId`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`PackageId`),
  ADD UNIQUE KEY `Package_Name` (`PackageName`),
  ADD KEY `Product_ProductType1` (`ProductTypeID`);

--
-- Indexes for table `pallettype`
--
ALTER TABLE `pallettype`
  ADD PRIMARY KEY (`PalletId`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductId`),
  ADD UNIQUE KEY `product_name` (`ProductName`),
  ADD KEY `Product_ProductType` (`ProductTypeId`);

--
-- Indexes for table `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`ProductTypeId`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1351;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `CompanyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `company_product`
--
ALTER TABLE `company_product`
  MODIFY `Comp_Product_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `container`
--
ALTER TABLE `container`
  MODIFY `ContainerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `duties`
--
ALTER TABLE `duties`
  MODIFY `DutiesId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `freightrates`
--
ALTER TABLE `freightrates`
  MODIFY `FreightRateId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `PackageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pallettype`
--
ALTER TABLE `pallettype`
  MODIFY `PalletId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `producttype`
--
ALTER TABLE `producttype`
  MODIFY `ProductTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `RoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `company_product`
--
ALTER TABLE `company_product`
  ADD CONSTRAINT `Company_Fk` FOREIGN KEY (`CompanyId`) REFERENCES `company` (`CompanyId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Product_Fk` FOREIGN KEY (`ProductId`) REFERENCES `product` (`ProductId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `duties`
--
ALTER TABLE `duties`
  ADD CONSTRAINT `Product_ProductType3` FOREIGN KEY (`ProductTypeId`) REFERENCES `producttype` (`ProductTypeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `login`
--
ALTER TABLE `login`
  ADD CONSTRAINT `loginCompany` FOREIGN KEY (`CompanyId`) REFERENCES `company` (`CompanyId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `loginrole` FOREIGN KEY (`RoleId`) REFERENCES `role` (`RoleId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `package`
--
ALTER TABLE `package`
  ADD CONSTRAINT `Product_ProductType1` FOREIGN KEY (`ProductTypeID`) REFERENCES `producttype` (`ProductTypeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `Product_ProductType` FOREIGN KEY (`ProductTypeId`) REFERENCES `producttype` (`ProductTypeId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
