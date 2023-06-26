-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2023 at 09:15 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idrive`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_schedule`
--

CREATE TABLE `admin_schedule` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `exam` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `typeoftime` varchar(255) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  `instructor` varchar(255) NOT NULL,
  `open` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_schedule`
--

INSERT INTO `admin_schedule` (`id`, `name`, `student_id`, `exam`, `date`, `typeoftime`, `timestamp`, `instructor`, `open`) VALUES
(1, 'Instructor', '23-0001', 'Practical Exam', '2023-06-26', 'Whole Day', '8:00AM - 3:00PM', 'Instructor', 0),
(2, 'Telle Marquez', '23-0001', 'Practical Exam', '2023-06-26', 'Whole Day', '8:00AM - 4:00PM', 'Instructor', 0);

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `announcement_id` int(11) NOT NULL,
  `idrive_id` mediumtext NOT NULL,
  `name` mediumtext NOT NULL,
  `announcement` mediumtext NOT NULL,
  `file_sent` mediumtext NOT NULL,
  `date_posted` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `idrive_id` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `is_late` int(11) NOT NULL,
  `hours_worked` decimal(10,2) NOT NULL,
  `is_holiday` int(11) NOT NULL,
  `payment` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `client_information`
--

CREATE TABLE `client_information` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `client_schedule`
--

CREATE TABLE `client_schedule` (
  `id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `typeofexam` varchar(255) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `typeoftime` varchar(255) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  `instructor` varchar(255) NOT NULL,
  `admin_approval` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `client_scheduleonly`
--

CREATE TABLE `client_scheduleonly` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `typeofexam` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `typeoftime` varchar(255) NOT NULL,
  `timestamp` varchar(255) NOT NULL,
  `instructor` varchar(255) NOT NULL,
  `admin_approval` int(11) NOT NULL,
  `grade` int(11) NOT NULL,
  `attendance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client_scheduleonly`
--

INSERT INTO `client_scheduleonly` (`id`, `name`, `student_id`, `typeofexam`, `date`, `typeoftime`, `timestamp`, `instructor`, `admin_approval`, `grade`, `attendance`) VALUES
(1, 'Instructor', '23-0001', 'Practical Exam', '2023-06-26', 'Whole Day', '8:00AM - 3:00PM', 'Instructor', 2, 0, 0),
(2, 'Telle Marquez', '23-0001', 'Practical Exam', '2023-06-26', 'Whole Day', '8:00AM - 4:00PM', 'Instructor', 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

CREATE TABLE `deductions` (
  `id` int(11) NOT NULL,
  `deduction_id` int(11) NOT NULL,
  `idrive_id` varchar(255) DEFAULT NULL,
  `deduction_name` varchar(255) DEFAULT NULL,
  `deduction_amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deductions`
--

INSERT INTO `deductions` (`id`, `deduction_id`, `idrive_id`, `deduction_name`, `deduction_amount`) VALUES
(1, 2, '2023-0002', 'Philhealth', '4.00');

-- --------------------------------------------------------

--
-- Table structure for table `deduction_list`
--

CREATE TABLE `deduction_list` (
  `deduction_id` int(11) NOT NULL,
  `deduction_name` varchar(255) DEFAULT NULL,
  `deduction_amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `deduction_list`
--

INSERT INTO `deduction_list` (`deduction_id`, `deduction_name`, `deduction_amount`) VALUES
(1, 'Social Security System', '4.00'),
(2, 'Philhealth', '4.00');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `idrive_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_number` varchar(12) NOT NULL,
  `position` varchar(255) NOT NULL,
  `instructor_course` varchar(255) DEFAULT NULL,
  `vehicle_type` varchar(255) NOT NULL DEFAULT 'N/A',
  `date_registered` date NOT NULL DEFAULT current_timestamp(),
  `salary` decimal(10,2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT 'working=1 notworking=2'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `idrive_id`, `username`, `password`, `name`, `gender`, `age`, `email`, `contact_number`, `position`, `instructor_course`, `vehicle_type`, `date_registered`, `salary`, `status`) VALUES
(1, '2023-0001', '123', '$2y$10$BAXDCtKXIQpbzMPD3.da6ev6lmyIhv1WBjB/mMacbx/nNB6Zp7Pt2', 'John Doe', 'Male', 22, 'sad@gmail.com', '09123456789', 'Super Admin', 'N/A', 'N/A', '2023-06-26', '60.00', 1),
(2, '2023-0002', '123', '$2y$10$UTVkncuNz.2hV9aIRpLFwOOJnc2OA3i98UY9rTlVd9lKeDwVtLA6.', 'Jane Doe', 'Female', 22, 'asd@gmail.com', '09123456798', 'Admin', 'N/A', 'N/A', '2023-06-26', '70.00', 1),
(3, '2023-0003', 'instruc', '$2y$10$VTPssUKyVwh6JjcZAFUKK.62AI2A3r1/x2TTbKCyb1DynLLthmwjS', 'Instructor', 'Male', 22, 'instruc@gmail.com', '0912232323', 'Instructor', 'Practical', 'Sedan Automatic', '2023-06-26', '60.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee_picture`
--

CREATE TABLE `employee_picture` (
  `id_picture` int(11) NOT NULL,
  `idrive_id` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee_picture`
--

INSERT INTO `employee_picture` (`id_picture`, `idrive_id`, `filename`) VALUES
(1, '2023-0001', 'patatas.jpg'),
(2, '2023-0002', ''),
(3, '2023-0003', '');

-- --------------------------------------------------------

--
-- Table structure for table `instructor_schedule`
--

CREATE TABLE `instructor_schedule` (
  `id` int(11) NOT NULL,
  `instructor_name` varchar(255) NOT NULL,
  `vehicle_type` varchar(255) NOT NULL,
  `instructor_room` int(11) NOT NULL,
  `available_date` varchar(255) NOT NULL,
  `typeoftime` varchar(255) NOT NULL,
  `admin_approval` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructor_schedule`
--

INSERT INTO `instructor_schedule` (`id`, `instructor_name`, `vehicle_type`, `instructor_room`, `available_date`, `typeoftime`, `admin_approval`) VALUES
(1, 'Instructor', 'Sedan Automatic', 30, '2023-06-26', 'Whole Day', 2);

-- --------------------------------------------------------

--
-- Table structure for table `payroll`
--

CREATE TABLE `payroll` (
  `payroll_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Not Payed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payroll`
--

INSERT INTO `payroll` (`payroll_id`, `start_date`, `end_date`, `status`) VALUES
(1, '2023-06-01', '2023-06-15', 'Not Payed'),
(2, '2023-06-16', '2023-06-30', 'Not Payed');

-- --------------------------------------------------------

--
-- Table structure for table `payroll_items`
--

CREATE TABLE `payroll_items` (
  `payroll_item_id` int(11) NOT NULL,
  `payroll_id` int(11) NOT NULL,
  `idrive_id` varchar(255) NOT NULL,
  `employee_name` varchar(255) NOT NULL,
  `total_absences` int(11) NOT NULL,
  `salary_before_deductions` decimal(10,2) NOT NULL,
  `deductions` decimal(10,2) NOT NULL,
  `total_salary` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payroll_items`
--

INSERT INTO `payroll_items` (`payroll_item_id`, `payroll_id`, `idrive_id`, `employee_name`, `total_absences`, `salary_before_deductions`, `deductions`, `total_salary`) VALUES
(1, 2, '2023-0001', 'Julius Macalalad', 1, '546.00', '0.00', '546.00');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_proof_of_payment`
--

CREATE TABLE `schedule_proof_of_payment` (
  `payment_id` int(11) NOT NULL,
  `student_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `image_proof` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule_proof_of_payment`
--

INSERT INTO `schedule_proof_of_payment` (`payment_id`, `student_id`, `name`, `amount`, `image_proof`) VALUES
(1, '23-0001', 'Instructor', 2600, '../payment_proof//canteen.jpg'),
(2, '23-0001', 'Telle Marquez', 2600, '../payment_proof//tools.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `student_id` varchar(255) NOT NULL,
  `student_course` varchar(255) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `mobile_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `student_id`, `student_course`, `age`, `email`, `user_password`, `date_of_birth`, `mobile_number`) VALUES
(1, 'Telle', 'Caballero', 'Marquez', '23-0001', 'practical', 22, 'tellekris9@gmail.com', '$2y$10$hfv4Gmr/ugwrUbaq33l3EOQwCZNavG6i5wWeLhiu8.XIWwLsqPs5q', '2002-03-15', '09083550192');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `car_id` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `plate` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`car_id`, `model`, `plate`, `category`, `price`) VALUES
(1, 'Sedan', 'PLATE', 'Sedan Automatic', 2600),
(2, 'car', '123132', 'Sedan Manual', 3000),
(3, 'car', '321', 'Motorcycle', 1500),
(4, 'trike', 'ca', 'Tricycle', 1000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_schedule`
--
ALTER TABLE `admin_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`announcement_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `client_information`
--
ALTER TABLE `client_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_schedule`
--
ALTER TABLE `client_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_scheduleonly`
--
ALTER TABLE `client_scheduleonly`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deductions`
--
ALTER TABLE `deductions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deduction_list`
--
ALTER TABLE `deduction_list`
  ADD PRIMARY KEY (`deduction_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `employee_picture`
--
ALTER TABLE `employee_picture`
  ADD PRIMARY KEY (`id_picture`);

--
-- Indexes for table `instructor_schedule`
--
ALTER TABLE `instructor_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`payroll_id`);

--
-- Indexes for table `payroll_items`
--
ALTER TABLE `payroll_items`
  ADD PRIMARY KEY (`payroll_item_id`),
  ADD KEY `payroll_id` (`payroll_id`);

--
-- Indexes for table `schedule_proof_of_payment`
--
ALTER TABLE `schedule_proof_of_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`car_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_schedule`
--
ALTER TABLE `admin_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `announcement_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_information`
--
ALTER TABLE `client_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `client_schedule`
--
ALTER TABLE `client_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `client_scheduleonly`
--
ALTER TABLE `client_scheduleonly`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deductions`
--
ALTER TABLE `deductions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `deduction_list`
--
ALTER TABLE `deduction_list`
  MODIFY `deduction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employee_picture`
--
ALTER TABLE `employee_picture`
  MODIFY `id_picture` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `instructor_schedule`
--
ALTER TABLE `instructor_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payroll`
--
ALTER TABLE `payroll`
  MODIFY `payroll_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payroll_items`
--
ALTER TABLE `payroll_items`
  MODIFY `payroll_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedule_proof_of_payment`
--
ALTER TABLE `schedule_proof_of_payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `car_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payroll_items`
--
ALTER TABLE `payroll_items`
  ADD CONSTRAINT `payroll_items_ibfk_1` FOREIGN KEY (`payroll_id`) REFERENCES `payroll` (`payroll_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
