-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 05, 2024 at 04:44 PM
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
-- Database: `db_autotrack`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_email` varchar(60) NOT NULL,
  `admin_password` varchar(60) NOT NULL,
  `admin_name` varchar(60) NOT NULL,
  `admin_photo` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_photo`) VALUES
(2, 'admin@gmail', '12345', 'vaishak', 'vr.png'),
(11, 'ajin@gmail.com', '12345', 'ajin benny', 'ajin.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bikedetails`
--

CREATE TABLE `tbl_bikedetails` (
  `bikedetails_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `bikedetails_varient` varchar(40) NOT NULL,
  `bikedetails_modelyear` varchar(40) NOT NULL,
  `bikedetails_photo` varchar(40) NOT NULL,
  `bikedetails_prize` varchar(40) NOT NULL,
  `bikedetails_displacement` varchar(40) NOT NULL,
  `bikedetails_power` varchar(40) NOT NULL,
  `bikedetails_torque` varchar(40) NOT NULL,
  `bikedetails_noofcylinders` varchar(40) NOT NULL,
  `bikedetails_noofgears` varchar(40) NOT NULL,
  `bikedetails_fueltype` varchar(40) NOT NULL,
  `bikedetails_mileage` varchar(40) NOT NULL,
  `bikedetails_fuelcapacity` varchar(40) NOT NULL,
  `emissionnorms_id` int(11) NOT NULL,
  `bikedetails_topspeed` varchar(40) NOT NULL,
  `bikedetails_instrumentconsole` varchar(40) NOT NULL,
  `bikedetails_brakingsystem` varchar(40) NOT NULL,
  `frontbraketype_id` int(11) NOT NULL,
  `rearbraketype_id` int(11) NOT NULL,
  `bikedetails_dimensions` varchar(40) NOT NULL,
  `bikedetails_totalweight` varchar(40) NOT NULL,
  `bikedetails_groundcleanance` varchar(40) NOT NULL,
  `bikedetails_warranty` varchar(40) NOT NULL,
  `bikedetails_otherdetails` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_bikedetails`
--

INSERT INTO `tbl_bikedetails` (`bikedetails_id`, `model_id`, `bikedetails_varient`, `bikedetails_modelyear`, `bikedetails_photo`, `bikedetails_prize`, `bikedetails_displacement`, `bikedetails_power`, `bikedetails_torque`, `bikedetails_noofcylinders`, `bikedetails_noofgears`, `bikedetails_fueltype`, `bikedetails_mileage`, `bikedetails_fuelcapacity`, `emissionnorms_id`, `bikedetails_topspeed`, `bikedetails_instrumentconsole`, `bikedetails_brakingsystem`, `frontbraketype_id`, `rearbraketype_id`, `bikedetails_dimensions`, `bikedetails_totalweight`, `bikedetails_groundcleanance`, `bikedetails_warranty`, `bikedetails_otherdetails`) VALUES
(2, 28, 'British Racing Green', '2024', 'continental-gt-650641562f366c8a.webp', '320000', '647', '47', '52', '2', '6Speed', 'Fuelinjection', '27', '12.5', 8, '170', 'analoge', 'abs', 7, 7, 'Width 780 mm,Length 2119 mm,Height 1067 ', '214', '174', '2', ' 647.95 cc air-cooled engine which produces 47.4 P'),
(3, 29, ' Arsenal Black Without Quickshifter', '2024', 'apache-rtr.jpg', '250000', '312', '35', '28', '1', '6Speed', 'Fuelinjection', '35', '11', 8, '160', 'digitel', 'abs', 7, 7, 'Width 831 mm,Length 1991 mm,Height 1154 ', '169', '180', '2', '312.12 cc air-cooled engine which produces 35.6 PS'),
(4, 30, 'STD', '2024', 'pulsar-ns4006638d90b5ab9e.avif', '190000', '373', '40', '35', '1', '6Speed', 'Fuelinjection', '24', '12', 8, '190', 'digitel', 'abs', 7, 7, '807', '174', '168', '2', 'Liquid Cooled, 4V, DOHC with DLC coated finger fol'),
(5, 32, 'Metallic Red', '2024', 'r15-v46255380195231.webp', '200000', '155', '18', '14', '1', '6Speed', 'Fuelinjection', '55', '11', 8, '140', 'digitel', 'abs', 7, 7, 'Width 725 mm,Length 1990 mm,Height 1135 ', '142', '170', '2', 'Liquid-cooled, 4-stroke, SOHC, 4-valve'),
(6, 33, 'STD', '2024', 'unicorn-bs6625919b832196.webp', '120000', '162', '12.', '14', '1', '5Speed', 'Fuelinjection', '60', '13', 8, '150', 'analoge', 'abs', 7, 6, 'Width 756 mm,Length 2081 mm,Height 1103 ', '140', '187', '2', '3D Wing Mark, Honda Eco Technology, Side Stand Eng'),
(7, 34, 'Self with Alloy Wheel', '2024', 'hero-motocorp-splendor6594efca3fa93.webp', '78000', '97', '8', '8', '1', '4Speed', 'Fuelinjection', '80', '9', 8, '100', 'analoge', 'abs', 6, 6, 'Width 720 mm,Length 2000 mm,Height 1052 ', '112', '165', '1', 'XSens Technology, Engin Cut of AT fall'),
(8, 35, 'STD', '2024', '2020-z90064f8112b9b6f3.webp', '940000', '948', '125', '98', '4', '6Speed', 'Fuelinjection', '17', '17', 8, '240', 'digitel', 'abs', 7, 7, 'Width 825 mm,Length 2070 mm,Height 1080 ', '212', '145', '3', 'Liquid-cooled, 4-stroke In-Line Four');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `booking_date` varchar(100) NOT NULL DEFAULT '0',
  `booking_status` varchar(100) NOT NULL DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `booking_amount` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `booking_date`, `booking_status`, `user_id`, `booking_amount`) VALUES
(6, '2024-08-02', '1', 9, 1500),
(7, '2024-08-02', '1', 9, 1500),
(8, '2024-08-02', '1', 9, 1500),
(9, '2024-08-02', '1', 9, 1500),
(10, '2024-08-02', '1', 9, 1500),
(11, '2024-08-02', '1', 9, 1500),
(12, '2024-08-02', '1', 9, 1500),
(13, '2024-08-02', '1', 9, 1500),
(14, '2024-08-02', '2', 9, 1500),
(15, '2024-08-31', '1', 11, 3000),
(16, '2024-08-31', '1', 11, 3000),
(17, '2024-08-24', '0', 0, 0),
(18, '2024-08-31', '1', 11, 3000),
(19, '2024-08-31', '1', 11, 3000),
(20, '2024-08-31', '1', 11, 3000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_braketype`
--

CREATE TABLE `tbl_braketype` (
  `braketype_id` int(11) NOT NULL,
  `braketype_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_braketype`
--

INSERT INTO `tbl_braketype` (`braketype_id`, `braketype_name`) VALUES
(5, 'Hydraulic Brake'),
(6, 'Drum Brake'),
(7, 'Disc Brake'),
(8, 'Anti brake Brakes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `category_id`) VALUES
(2, 'Maruti suzuki', 12),
(3, 'Toyota', 12),
(4, 'Honda', 12),
(6, 'Volkswagon', 12),
(7, 'Skoda', 12),
(8, 'Bmw', 12),
(15, 'Tata', 12),
(16, 'Hyundai', 12),
(17, 'Mahindra', 12),
(18, 'Mercedes-Benz', 12),
(19, 'Audi', 12),
(20, 'Land Rover', 12),
(21, 'Porsche', 12),
(22, 'Kia', 12),
(25, 'Volvo', 12),
(30, 'Nissan', 12),
(31, 'MINI', 12),
(35, 'Honda', 11),
(36, 'Royal Enfield', 11),
(37, 'Hero', 11),
(38, 'Bajaj', 11),
(39, 'Yamaha', 11),
(40, 'TVS', 11),
(41, 'Kawasaki', 11),
(42, 'BMW', 11),
(43, 'KTM', 11),
(44, 'Triumph', 11),
(46, 'Ather', 11),
(48, 'Ducati', 11),
(53, 'OLA', 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cardetails`
--

CREATE TABLE `tbl_cardetails` (
  `cardetails_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `cardetails_varient` varchar(50) NOT NULL,
  `cardetails_modelyear` varchar(50) NOT NULL,
  `cardetails_photo` varchar(50) NOT NULL,
  `cardetails_prize` varchar(11) NOT NULL,
  `cardetails_engine` varchar(60) NOT NULL,
  `cardetails_displacement` int(11) NOT NULL,
  `cardetails_power` int(11) NOT NULL,
  `cardetails_torque` int(11) NOT NULL,
  `cardetails_noofcylinders` int(11) NOT NULL,
  `transmissiontype_id` int(11) NOT NULL,
  `cardetails_noofgears` varchar(50) NOT NULL,
  `drivetype_id` int(11) NOT NULL,
  `fueltype_id` int(11) NOT NULL,
  `cardetails_mileage` int(11) NOT NULL,
  `cardetails_fuelcapacity` int(11) NOT NULL,
  `emissionnorms_id` int(11) NOT NULL,
  `cardetails_topspeed` int(11) NOT NULL,
  `steeringtype_id` int(11) NOT NULL,
  `cardetails_turningradius` varchar(50) NOT NULL,
  `frontbraketype_id` int(11) NOT NULL,
  `rearbraketype_id` int(11) NOT NULL,
  `cardetails_dimensions` varchar(50) NOT NULL,
  `cardetails_bootspace` varchar(50) NOT NULL,
  `cardetails_seatingcapacity` int(11) NOT NULL,
  `cardetails_noofdoors` int(11) NOT NULL,
  `cardetails_keyless` int(11) NOT NULL,
  `cardetails_safety` varchar(50) NOT NULL,
  `cardetails_ABS` varchar(50) NOT NULL,
  `cardetails_noofairbags` varchar(50) NOT NULL,
  `cardetails_electronicstabilitycontrol` varchar(50) NOT NULL,
  `cardetails_360viewcamera` varchar(50) NOT NULL,
  `cardetails_otherdetails` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cardetails`
--

INSERT INTO `tbl_cardetails` (`cardetails_id`, `model_id`, `cardetails_varient`, `cardetails_modelyear`, `cardetails_photo`, `cardetails_prize`, `cardetails_engine`, `cardetails_displacement`, `cardetails_power`, `cardetails_torque`, `cardetails_noofcylinders`, `transmissiontype_id`, `cardetails_noofgears`, `drivetype_id`, `fueltype_id`, `cardetails_mileage`, `cardetails_fuelcapacity`, `emissionnorms_id`, `cardetails_topspeed`, `steeringtype_id`, `cardetails_turningradius`, `frontbraketype_id`, `rearbraketype_id`, `cardetails_dimensions`, `cardetails_bootspace`, `cardetails_seatingcapacity`, `cardetails_noofdoors`, `cardetails_keyless`, `cardetails_safety`, `cardetails_ABS`, `cardetails_noofairbags`, `cardetails_electronicstabilitycontrol`, `cardetails_360viewcamera`, `cardetails_otherdetails`) VALUES
(7, 12, 'Lxi', '2022', 'swift.webp', '650000', 'Z12E', 1197, 80, 112, 3, 4, '5Speed', 5, 5, 26, 37, 8, 145, 8, '4.8 m', 5, 6, 'Length 3860 mm,Width 1735 mm,Height  1520 mm', '150', 5, 5, 1, 'ADAS Level4', '1', '6', '1', '0', 'The Maruti Swift has 1 Petrol Engine on offer. The Petrol engine is 11'),
(8, 19, 'Lxi', '2024', 'Brezza.webp', '840000', 'K15C', 1462, 101, 136, 4, 7, '6Speed', 5, 5, 20, 48, 8, 159, 8, '4.8 m', 5, 6, 'Length 3995 mm,Width 1790 mm,Height 1685 mm', '150', 5, 5, 1, 'ADAS Level4', '1', '6', '1', '0', 'The Maruti Brezza has 1 Petrol Engine and 1 CNG Engine on offer. The P'),
(9, 24, 'Lxi', '2024', 'ignis.webp', '550000', 'VVT', 1197, 81, 113, 4, 7, '5Speed', 5, 5, 21, 32, 8, 159, 8, '4.7 m', 7, 6, 'Length 3700 mm,Width 1690 mm,Height 1595 mm', '260', 5, 5, 0, 'ADAS Level4', '1', '2', '1', '1', 'The Maruti Ignis has 1 Petrol Engine on offer. The Petrol engine is 11'),
(10, 25, 'Lxi', '2024', 'ertiga.webp', '860000', 'K15C Smart Hybrid', 1462, 101, 136, 4, 7, '6Speed', 5, 5, 20, 45, 8, 159, 4, '5.2', 7, 6, 'Length 4395 mm,Width 1735 mm,Height 1690 mm', '209', 7, 5, 1, 'ADAS Level3', '1', '4', '1', '0', 'The Maruti Ertiga has 1 Petrol Engine and 1 CNG Engine on offer. The P'),
(11, 26, 'Lxi', '2024', 'wagon r-left-side-47 (1).webp', '550000', 'K10C', 998, 65, 89, 3, 4, '5Speed', 5, 5, 24, 32, 8, 140, 4, '4.7', 7, 6, 'Length 3655 mm,Width1620 mm,Height1675 mm', '341', 5, 5, 0, 'ADAS Level4', '1', '2', '1', '0', 'The Maruti Wagon R has 2 Petrol Engine and 1 CNG Engine on offer. The '),
(12, 27, '4X2 Diesel', '2024', 'fortuner-left-side-47.webp', '3343000', '2.8 L Diesel engine', 2755, 201, 420, 4, 4, '6Speed', 5, 6, 8, 80, 8, 190, 8, '5.8', 7, 7, 'Length 4795 mm,Width 1855 mm,Height 1835 mm', '300', 7, 5, 1, 'ADAS Level5', '1', '7', '1', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `cart_quantity` varchar(100) NOT NULL DEFAULT '1',
  `spareparts_id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `cart_status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cart_id`, `cart_quantity`, `spareparts_id`, `booking_id`, `cart_status`) VALUES
(7, '1', 13, 6, 4),
(8, '1', 13, 7, 4),
(9, '1', 13, 8, 1),
(10, '1', 13, 9, 1),
(11, '6', 13, 10, 1),
(12, '10', 13, 11, 1),
(13, '40', 13, 12, 1),
(14, '1', 13, 13, 1),
(15, '1', 13, 14, 1),
(16, '16', 13, 15, 4),
(17, '1', 13, 16, 1),
(18, '1', 14, 17, 0),
(20, '2', 13, 18, 1),
(21, '1', 13, 19, 1),
(22, '2', 13, 20, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(11, 'Motorcycles'),
(12, 'Cars');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_complaint`
--

CREATE TABLE `tbl_complaint` (
  `complaint_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `complaint_complaints` varchar(50) NOT NULL,
  `complaint_date` varchar(40) NOT NULL,
  `showroom_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_complaint`
--

INSERT INTO `tbl_complaint` (`complaint_id`, `user_id`, `complaint_complaints`, `complaint_date`, `showroom_id`) VALUES
(7, 11, 'qwert', '2024-08-13', 0),
(14, 11, '2666666666', '2024-08-13', 0),
(15, 11, '2666666666', '2024-08-13', 0),
(16, 11, '2666666666', '2024-08-13', 0),
(17, 11, '11111111111111', '2024-08-13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `district_id` int(11) NOT NULL,
  `district_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`district_id`, `district_name`) VALUES
(2, 'Ernakulam'),
(4, 'Thrissur'),
(6, 'Idukki'),
(7, 'Kottayam'),
(8, 'Alappuzha');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_drivetype`
--

CREATE TABLE `tbl_drivetype` (
  `drivetype_id` int(11) NOT NULL,
  `drivetype_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_drivetype`
--

INSERT INTO `tbl_drivetype` (`drivetype_id`, `drivetype_name`) VALUES
(5, 'Front-Wheel Drive'),
(6, 'Rear-Wheel Drive'),
(7, 'Four-Wheel Drive'),
(8, 'All-Wheel Drive');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_emissionnorms`
--

CREATE TABLE `tbl_emissionnorms` (
  `emissionnorms_id` int(11) NOT NULL,
  `emissionnorms_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_emissionnorms`
--

INSERT INTO `tbl_emissionnorms` (`emissionnorms_id`, `emissionnorms_name`) VALUES
(3, 'Bharat Stage I (BS-I)'),
(4, 'Bharat Stage II (BS-II)'),
(5, 'Bharat Stage III (BS-III)'),
(6, 'Bharat Stage IV (BS-IV)'),
(7, 'Bharat Stage V (BS-V)'),
(8, 'Bharat Stage VI (BS-VI)');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `feedback_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `feedback_feed` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `user_id`, `feedback_feed`) VALUES
(1, 11, 'good');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fueltype`
--

CREATE TABLE `tbl_fueltype` (
  `fueltype_id` int(11) NOT NULL,
  `fueltype_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_fueltype`
--

INSERT INTO `tbl_fueltype` (`fueltype_id`, `fueltype_name`) VALUES
(5, 'Petrol'),
(6, 'Diesel'),
(7, 'Hybrid'),
(8, 'Electric');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_model`
--

CREATE TABLE `tbl_model` (
  `model_id` int(11) NOT NULL,
  `model_name` varchar(50) NOT NULL,
  `brand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_model`
--

INSERT INTO `tbl_model` (`model_id`, `model_name`, `brand_id`) VALUES
(12, 'Swift', 2),
(15, 'Hyryder', 3),
(17, 'Innova hycross', 3),
(19, 'Breeza', 2),
(24, 'Ignis', 2),
(25, 'Ertiga', 2),
(26, 'Wagon R', 2),
(27, 'Fortuner', 3),
(28, 'Continental GT 650 ', 36),
(29, 'Apache RTR 310', 40),
(30, 'NS400Z', 38),
(32, 'R15 V4', 39),
(33, 'Unicorn', 35),
(34, 'Splendor Plus', 37),
(35, 'Z900', 41);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_orderdeatils`
--

CREATE TABLE `tbl_orderdeatils` (
  `orderdeatils_id` int(50) NOT NULL,
  `orderdeatils_name` varchar(50) NOT NULL,
  `showroom_id` int(11) NOT NULL,
  `orderdeatils_contact` varchar(50) NOT NULL,
  `orderdeatils_address` varchar(50) NOT NULL,
  `orderdeatils_pincode` varchar(50) NOT NULL,
  `orderdeatils_price` varchar(50) NOT NULL,
  `orderdeatils_payment` varchar(50) NOT NULL,
  `orderdeatils_productname` varchar(50) NOT NULL,
  `orderdeatils_quantity` varchar(50) NOT NULL,
  `orderdeatils_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_orderdeatils`
--

INSERT INTO `tbl_orderdeatils` (`orderdeatils_id`, `orderdeatils_name`, `showroom_id`, `orderdeatils_contact`, `orderdeatils_address`, `orderdeatils_pincode`, `orderdeatils_price`, `orderdeatils_payment`, `orderdeatils_productname`, `orderdeatils_quantity`, `orderdeatils_status`) VALUES
(14, 'vaishak rajesh', 6, '56671341', 'house', '682303', '1500', 'UPI', 'Cluch belt', '1', 2),
(15, 'vaishak rajesh', 6, '56671341', 'house', '682303', '1500', 'Cash on delivery', 'Cluch belt', '1', 0),
(16, 'vaishak rajesh', 6, '56671341', 'house', '682303', '1500', 'UPI', 'Cluch belt', '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_place`
--

CREATE TABLE `tbl_place` (
  `place_id` int(11) NOT NULL,
  `place_name` varchar(50) NOT NULL,
  `place_pincode` varchar(50) NOT NULL,
  `district_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_place`
--

INSERT INTO `tbl_place` (`place_id`, `place_name`, `place_pincode`, `district_id`) VALUES
(3, 'karimugal', '682303', 2),
(5, 'Aluva', '682305', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_review`
--

CREATE TABLE `tbl_review` (
  `review_id` int(11) NOT NULL,
  `review_datetime` varchar(100) NOT NULL,
  `spareparts_id` int(11) NOT NULL,
  `user_review` varchar(100) NOT NULL,
  `user_rating` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_review`
--

INSERT INTO `tbl_review` (`review_id`, `review_datetime`, `spareparts_id`, `user_review`, `user_rating`, `user_name`) VALUES
(7, '2024-07-26 14:28:43', 13, 'sdcsdvsdv', '4', 'adsfasdcasdc'),
(8, '2024-07-26 14:29:40', 13, '12345', '2', 'njkjnj'),
(9, '2024-08-10 15:04:35', 0, 'asfryjg', '0', 'GG'),
(10, '2024-08-10 15:21:31', 13, 'sdfghj', '5', 'jjj');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE `tbl_service` (
  `service_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `service_year` varchar(10) NOT NULL,
  `place_id` int(11) NOT NULL,
  `showroom_id` int(11) NOT NULL,
  `service_date` varchar(10) NOT NULL,
  `service_status` int(11) NOT NULL DEFAULT 0,
  `service_slotedate` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`service_id`, `user_id`, `category_id`, `brand_id`, `model_id`, `service_year`, `place_id`, `showroom_id`, `service_date`, `service_status`, `service_slotedate`) VALUES
(18, 11, 11, 35, 33, '2018', 3, 10, '2024-09-06', 3, '2024-09-06'),
(19, 11, 11, 35, 33, '2018', 3, 10, '2024-09-05', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_showroom`
--

CREATE TABLE `tbl_showroom` (
  `showroom_id` int(11) NOT NULL,
  `showroom_showroomname` varchar(50) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `showroom_email` varchar(50) NOT NULL,
  `showroom_contact` varchar(20) NOT NULL,
  `place_id` int(11) NOT NULL,
  `showroom_address` varchar(80) NOT NULL,
  `showroom_dateofjoin` varchar(50) NOT NULL,
  `showroom_password` varchar(50) NOT NULL,
  `showroom_photo` varchar(50) NOT NULL,
  `showroom_proof` varchar(50) NOT NULL,
  `showroom_status` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_showroom`
--

INSERT INTO `tbl_showroom` (`showroom_id`, `showroom_showroomname`, `brand_id`, `showroom_email`, `showroom_contact`, `place_id`, `showroom_address`, `showroom_dateofjoin`, `showroom_password`, `showroom_photo`, `showroom_proof`, `showroom_status`) VALUES
(8, 'maruti Suzuki', 2, 'km@gmail', '7323456789', 5, 'fytdftrdytft', '2024-09-02', 'Vaishak@123', 'apache-rtr.jpg', 'bajaj ns400z.png', '1'),
(9, 'nippon toyota', 3, 'nt@gmail', '1245678909', 3, 'fytdftrdytft', '2024-09-06', '@Vaishak12345', 'apache-rtr.jpg', 'apache-rtr.jpg', '1'),
(10, 'honda', 35, 'honda@gmail.com', '3455677899', 3, 'showroom', '2024-09-06', '@Vaishak12345', 'apache-rtr.jpg', 'apache-rtr.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_spareparts`
--

CREATE TABLE `tbl_spareparts` (
  `spareparts_id` int(11) NOT NULL,
  `showroom_id` int(11) NOT NULL,
  `spareparts_brand` varchar(50) NOT NULL,
  `spareparts_model` varchar(50) NOT NULL,
  `spareparts_year` varchar(10) NOT NULL,
  `spareparts_partsname` varchar(50) NOT NULL,
  `spareparts_colour` varchar(50) NOT NULL,
  `spareparts_stock` varchar(10) NOT NULL,
  `spareparts_price` varchar(50) NOT NULL,
  `spareparts_photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_spareparts`
--

INSERT INTO `tbl_spareparts` (`spareparts_id`, `showroom_id`, `spareparts_brand`, `spareparts_model`, `spareparts_year`, `spareparts_partsname`, `spareparts_colour`, `spareparts_stock`, `spareparts_price`, `spareparts_photo`) VALUES
(13, 7, 'Honda', 'activa', '2014', 'Cluch belt', 'Grey', '42', '1500', 'wallpaperflare.com_wallpaper.jpg'),
(14, 7, 'toyota', 'activa', '2015', 'Cluch belt', 'Red', '', '1', 'vr.png'),
(15, 7, 'toyota', 'activa', '2015', 'Cluch belt', 'Red', '', '1', 'vr.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_steeringtype`
--

CREATE TABLE `tbl_steeringtype` (
  `steeringtype_id` int(11) NOT NULL,
  `steeringtype_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_steeringtype`
--

INSERT INTO `tbl_steeringtype` (`steeringtype_id`, `steeringtype_name`) VALUES
(4, 'Power Steering'),
(5, 'Rack and Pinion Steering'),
(6, 'Recirculating Ball Steering'),
(8, 'Electronic Power Steering (EPS)'),
(9, 'Steer-by-Wire Steering'),
(10, 'Four-wheel Steering'),
(11, 'Manual Steering');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_stock`
--

CREATE TABLE `tbl_stock` (
  `stock_id` int(11) NOT NULL,
  `stock_quantity` varchar(50) NOT NULL,
  `stock_date` varchar(50) NOT NULL,
  `spareparts_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_stock`
--

INSERT INTO `tbl_stock` (`stock_id`, `stock_quantity`, `stock_date`, `spareparts_id`) VALUES
(2, '10', '2024-07-20', 13),
(3, '10', '2024-07-20', 13),
(4, '58', '2024-07-20', 13),
(5, '10', '2024-08-24', 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subcategory`
--

CREATE TABLE `tbl_subcategory` (
  `subcategory_id` int(11) NOT NULL,
  `subcategory_name` varchar(50) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_subcategory`
--

INSERT INTO `tbl_subcategory` (`subcategory_id`, `subcategory_name`, `category_id`) VALUES
(1, '1', 0),
(6, 'windows', 6),
(8, 'windows', 7),
(10, 'windows', 8),
(11, 'Ram', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transmissiontype`
--

CREATE TABLE `tbl_transmissiontype` (
  `transmissiontype_id` int(11) NOT NULL,
  `transmissiontype_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_transmissiontype`
--

INSERT INTO `tbl_transmissiontype` (`transmissiontype_id`, `transmissiontype_name`) VALUES
(4, 'Manual Transmission'),
(5, 'Intelligent Manual Transmission (IMT)'),
(6, 'Automated Manual Transmission (AMT)'),
(7, 'Automatic Transmission (AT)'),
(8, 'Continuously Variable Transmission (CVT)'),
(9, 'Semi-automatic Transmission'),
(10, 'Dual-clutch Transmission(DCT)'),
(11, 'Sequential Transmission'),
(12, 'Torque Converter Transmission'),
(13, 'Tiptronic Transmission');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_trial`
--

CREATE TABLE `tbl_trial` (
  `trial_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bikedetails_id` int(11) NOT NULL,
  `cardetails_id` int(11) NOT NULL,
  `showroom_id` int(11) NOT NULL,
  `trial_date` varchar(20) NOT NULL,
  `trial_status` int(11) NOT NULL,
  `trial_slotedate` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_trial`
--

INSERT INTO `tbl_trial` (`trial_id`, `user_id`, `bikedetails_id`, `cardetails_id`, `showroom_id`, `trial_date`, `trial_status`, `trial_slotedate`) VALUES
(27, 11, 0, 7, 8, '2024-09-05', 0, ''),
(28, 11, 6, 0, 10, '2024-09-06', 1, ''),
(29, 11, 6, 0, 10, '2024-09-07', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `place_id` int(11) NOT NULL,
  `user_address` varchar(50) NOT NULL,
  `user_photo` varchar(50) NOT NULL,
  `user_proof` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_contact` varchar(50) NOT NULL,
  `user_dob` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_email`, `place_id`, `user_address`, `user_photo`, `user_proof`, `user_password`, `user_contact`, `user_dob`) VALUES
(11, 'vaishak rajesh', 'vaishak@gmail', 3, 'house', 'IMG_20230625_180538-01-01.jpeg', '', '12345', '56671341', '2024-08-08'),
(20, 'vaishak rajesh', 'user@gmail', 3, 'house', 'apache-rtr.jpg', 'apache-rtr.jpg', '@Vaishak1234', '1234556789', '2024-08-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_bikedetails`
--
ALTER TABLE `tbl_bikedetails`
  ADD PRIMARY KEY (`bikedetails_id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `tbl_braketype`
--
ALTER TABLE `tbl_braketype`
  ADD PRIMARY KEY (`braketype_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_cardetails`
--
ALTER TABLE `tbl_cardetails`
  ADD PRIMARY KEY (`cardetails_id`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  ADD PRIMARY KEY (`complaint_id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`district_id`);

--
-- Indexes for table `tbl_drivetype`
--
ALTER TABLE `tbl_drivetype`
  ADD PRIMARY KEY (`drivetype_id`);

--
-- Indexes for table `tbl_emissionnorms`
--
ALTER TABLE `tbl_emissionnorms`
  ADD PRIMARY KEY (`emissionnorms_id`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_fueltype`
--
ALTER TABLE `tbl_fueltype`
  ADD PRIMARY KEY (`fueltype_id`);

--
-- Indexes for table `tbl_model`
--
ALTER TABLE `tbl_model`
  ADD PRIMARY KEY (`model_id`);

--
-- Indexes for table `tbl_orderdeatils`
--
ALTER TABLE `tbl_orderdeatils`
  ADD PRIMARY KEY (`orderdeatils_id`);

--
-- Indexes for table `tbl_place`
--
ALTER TABLE `tbl_place`
  ADD PRIMARY KEY (`place_id`);

--
-- Indexes for table `tbl_review`
--
ALTER TABLE `tbl_review`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tbl_showroom`
--
ALTER TABLE `tbl_showroom`
  ADD PRIMARY KEY (`showroom_id`);

--
-- Indexes for table `tbl_spareparts`
--
ALTER TABLE `tbl_spareparts`
  ADD PRIMARY KEY (`spareparts_id`);

--
-- Indexes for table `tbl_steeringtype`
--
ALTER TABLE `tbl_steeringtype`
  ADD PRIMARY KEY (`steeringtype_id`);

--
-- Indexes for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  ADD PRIMARY KEY (`subcategory_id`);

--
-- Indexes for table `tbl_transmissiontype`
--
ALTER TABLE `tbl_transmissiontype`
  ADD PRIMARY KEY (`transmissiontype_id`);

--
-- Indexes for table `tbl_trial`
--
ALTER TABLE `tbl_trial`
  ADD PRIMARY KEY (`trial_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_bikedetails`
--
ALTER TABLE `tbl_bikedetails`
  MODIFY `bikedetails_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_braketype`
--
ALTER TABLE `tbl_braketype`
  MODIFY `braketype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `tbl_cardetails`
--
ALTER TABLE `tbl_cardetails`
  MODIFY `cardetails_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_complaint`
--
ALTER TABLE `tbl_complaint`
  MODIFY `complaint_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `district_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_drivetype`
--
ALTER TABLE `tbl_drivetype`
  MODIFY `drivetype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_emissionnorms`
--
ALTER TABLE `tbl_emissionnorms`
  MODIFY `emissionnorms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_fueltype`
--
ALTER TABLE `tbl_fueltype`
  MODIFY `fueltype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_model`
--
ALTER TABLE `tbl_model`
  MODIFY `model_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `tbl_orderdeatils`
--
ALTER TABLE `tbl_orderdeatils`
  MODIFY `orderdeatils_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_place`
--
ALTER TABLE `tbl_place`
  MODIFY `place_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_review`
--
ALTER TABLE `tbl_review`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_showroom`
--
ALTER TABLE `tbl_showroom`
  MODIFY `showroom_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_spareparts`
--
ALTER TABLE `tbl_spareparts`
  MODIFY `spareparts_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_steeringtype`
--
ALTER TABLE `tbl_steeringtype`
  MODIFY `steeringtype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_stock`
--
ALTER TABLE `tbl_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_subcategory`
--
ALTER TABLE `tbl_subcategory`
  MODIFY `subcategory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_transmissiontype`
--
ALTER TABLE `tbl_transmissiontype`
  MODIFY `transmissiontype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_trial`
--
ALTER TABLE `tbl_trial`
  MODIFY `trial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
