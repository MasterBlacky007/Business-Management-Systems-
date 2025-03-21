-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2025 at 04:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nmdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `inquire`
--

CREATE TABLE `inquire` (
  `ID` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Subject` varchar(30) NOT NULL,
  `Messege` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquire`
--

INSERT INTO `inquire` (`ID`, `Name`, `Email`, `Subject`, `Messege`) VALUES
(1, 'Nigeeth', 'nigeeth@gmail.com', 'Technical Support', 'I am unable to reset my password. Can you please assist?'),
(2, 'Dishan', 'dishan@gmail.com', 'Feature Request', 'Can you add a dark mode feature to the application?'),
(3, 'Ravindu', 'ravindu@gmail.com', 'Billing Issue', 'I was charged twice for my subscription this month. Please resolve.'),
(4, 'Danuja', 'danuja@gmail.com', 'Feedback', 'Great service! I really enjoy using your platform. Keep up the good work!'),
(5, 'Pathum', 'pathum@gmail.com', 'Bug Report', 'The app crashes whenever I try to upload a file larger than 5MB.'),
(6, 'Roshan', 'roshan@gmail.com', 'Feedback', 'The fruits were fresh and delivered on time. I loved the service!'),
(7, 'Madushanka', 'madushanka@gmail.com', 'Order Inquiry', 'I placed an order for mangoes last week, but I haven\'t received it yet.'),
(10, 'Tharusha', 'Tharushade123@gmail.com', 'Product Availibility', 'Are organic dragon fruits currently in stock? I couldn\'t find them online');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ID` int(100) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Price` int(10) NOT NULL,
  `Image` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ID`, `Name`, `Price`, `Image`) VALUES
(2, 'Banana', 300, 'images (2).jpeg'),
(3, 'Apple', 400, 'download (2).jpeg'),
(4, 'Orange', 250, 'images (1).jpeg'),
(5, 'Papaya', 150, 'papaya.jpeg'),
(6, 'Pineapple', 750, 'pineapple.jpeg'),
(7, 'Avocado', 350, 'Avacado.jpeg'),
(8, 'Grapes', 1500, 'Grapes.jpeg'),
(9, 'Watermelon', 180, 'watermelon.jpeg'),
(47, 'Woodapple', 550, 'Woodapple.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `ID` int(100) NOT NULL,
  `Fullname` varchar(30) NOT NULL,
  `Username` varchar(10) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone_Number` int(15) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`ID`, `Fullname`, `Username`, `Email`, `Phone_Number`, `Password`) VALUES
(1, 'Nigeeth Maleesha', 'Nigeeth', 'kamkanamlage394@gmail.com', 764846394, '123456As!1'),
(2, 'Ravindu Lakshan', 'Ravindu', 'Ravindulak756@gmail.com', 771463259, '123456As@'),
(3, 'Dishan Keminda', 'Dishan', 'Dishankemi002@gmail.com', 751236957, '123456As@'),
(4, 'Danuja Dewnith', 'Danuja', 'danujadew852@gmail.com', 778536954, 'As123654!'),
(5, 'Pathum Dilshan', 'Pathum', 'Pathumdil145@gmail.com', 764846394, 'As123456!');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(100) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Username`, `Password`) VALUES
(1, 'Nigeeth', '1234'),
(2, 'Dishan', '1234'),
(3, 'Ravindu', '1234'),
(4, 'Danuja', '1234'),
(5, 'Pathum', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inquire`
--
ALTER TABLE `inquire`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `inquire`
--
ALTER TABLE `inquire`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
