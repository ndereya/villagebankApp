-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2024 at 06:27 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bunjsacco`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `generate_account_number` () RETURNS VARCHAR(20) CHARSET utf8mb4 COLLATE utf8mb4_general_ci  BEGIN
    DECLARE prefix VARCHAR(2);
    DECLARE rand_num INT;
    DECLARE unique_id VARCHAR(20);
    
    SET prefix = 'BS';
    SET rand_num = FLOOR(1000 + RAND() * 9000); -- Generate a random 4-digit number
    SET unique_id = CONCAT(prefix, rand_num);
    
    RETURN unique_id;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `password`, `full_name`, `email`) VALUES
(1, 'me', '123', 'gfdgdf', 'gdfgdf');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `account_number` varchar(255) DEFAULT NULL,
  `transaction_date` date DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `transaction_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `account_number`, `transaction_date`, `amount`, `transaction_type`) VALUES
(1, 'BS6938', '2024-02-11', 500000.00, 'Withdrawal'),
(2, 'BS6938', '2024-02-11', 200.00, 'Withdrawal Charge'),
(3, 'BS6938', '2024-02-11', 200000.00, 'Withdrawal'),
(4, 'BS6938', '2024-02-11', 200.00, 'Withdrawal Charge'),
(5, 'BS6938', '2024-02-11', 500000.00, 'Deposit');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `password1` varchar(255) NOT NULL,
  `account_number` varchar(20) NOT NULL,
  `longitude` varchar(225) NOT NULL,
  `latitude` varchar(255) NOT NULL,
  `balance` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `email`, `dob`, `password1`, `account_number`, `longitude`, `latitude`, `balance`) VALUES
(1, 'Smart Watch double straps', 'andrewnjuki2020@gmail.com', '2024-02-09', 'sdcscsdfv', '', '', '', ''),
(2, 'image', 'NAKAGGWABABRA@GMAIL.COM', '2024-02-15', 'mnfhghg', '', '', '', ''),
(3, 'Smart Watch double straps', 'andrewnjuki@gmail.com', '2024-02-29', '454365', '', '', '', ''),
(4, 'Smart Watch double straps', 'ndereya2018@outlook.com', '2024-01-01', '4536767', '', '', '', ''),
(5, 'morning code', 'andrenjui@gmail.com', '2024-02-02', '34564645', '', '', '', ''),
(6, 'config.php', 'monikanenterprises1@gmail.com', '2024-03-02', '65756765', 'BS8852', '', '', ''),
(7, 'Smart Watch double straps', 'admin@gmail.com', '2024-02-13', '43565', 'BS6938', '32.5943296', '0.3244032', '1300000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
