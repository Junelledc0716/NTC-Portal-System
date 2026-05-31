-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2026 at 05:23 AM
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
-- Database: `univercity_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(150) DEFAULT NULL,
  `body` text DEFAULT NULL,
  `posted_by` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `body`, `posted_by`, `created_at`) VALUES
(6, 'Enrollment for Semester 2 AY 2025-2026 Now Open', 'Dear students, enrollment for the second semester is now open. Please log in to the registrar portal to enroll your subjects. Deadline of enrollment is on February 15, 2026. Late enrollees will be subject to additional fees.', 'Registrar Office', '2026-01-10 00:00:00'),
(7, 'IT Week 2026 Call for Participants', 'The IT Department proudly announces IT Week 2026! Events include Hackathon, Quiz Bee, Web Design Competition, and Game Development Showcase. Register at the IT Department Office on or before January 20, 2026.', 'IT Department', '2026-01-08 01:00:00'),
(8, 'Academic Calendar Update Second Semester 2025-2026', 'Please be advised that the Academic Calendar for Second Semester AY 2025-2026 has been updated. Classes will officially start on January 13, 2026. Please check the registrar portal for the full calendar.', 'Academic Affairs Office', '2026-01-05 02:00:00'),
(9, 'Scholarship Applications Now Open AY 2025-2026', 'Students with a General Weighted Average of 1.75 or higher are encouraged to apply for the Academic Excellence Scholarship. Submit all requirements to the Office of Student Affairs on or before January 30, 2026.', 'Office of Student Affairs', '2026-01-03 03:00:00'),
(10, 'Library Extended Hours January 2026', 'The school library will extend its operating hours starting January 6, 2026. The library will be open from 7:00 AM to 9:00 PM on weekdays. Free printing services are available for all enrolled students.', 'Library Services', '2026-01-02 00:30:00'),
(11, 'No Classes November 1 and 2 2025', 'There will be no classes on November 1 and 2, 2025 in observance of All Saints Day and All Souls Day. All missed activities will be rescheduled by respective professors.', 'Academic Affairs Office', '2025-10-28 00:00:00'),
(12, 'Midterm Examination Schedule First Semester 2025-2026', 'The Midterm Examination for First Semester AY 2025-2026 will be held from October 13 to 17, 2025. Students are advised to check their respective department bulletin boards for their examination schedules.', 'Academic Affairs Office', '2025-10-05 01:00:00'),
(13, 'Campus Clean-Up Drive September 27 2025', 'In celebration of Environmental Awareness Month, the school will conduct a Campus Clean-Up Drive on September 27, 2025. All students and faculty are encouraged to participate. Wear comfortable clothes and bring gloves.', 'Student Affairs Office', '2025-09-20 02:00:00'),
(14, 'Freshmen Orientation August 18 2025', 'A Freshmen Orientation will be held on August 18, 2025 at the school gymnasium. All first-year students are required to attend. Bring your school ID and enrollment form. Program starts at 8:00 AM sharp.', 'Student Affairs Office', '2025-08-10 00:00:00'),
(15, 'First Semester 2025-2026 Classes Begin', 'Classes for the First Semester of Academic Year 2025-2026 will officially begin on August 11, 2025. All students are advised to check their class schedules on the portal and proceed to their respective classrooms.', 'Registrar Office', '2025-08-04 23:00:00'),
(16, 'Graduation Ceremony April 5 2025', 'The Graduation Ceremony for Academic Year 2024-2025 will be held on April 5, 2025 at the school covered court. Graduating students are advised to attend the rehearsal on April 3, 2025 at 2:00 PM.', 'Registrar Office', '2025-03-20 01:00:00'),
(17, 'Final Examination Schedule Second Semester 2024-2025', 'The Final Examination for Second Semester AY 2024-2025 will be held from March 10 to 14, 2025. Please review your exam permits and settle all outstanding balances before the examination period.', 'Academic Affairs Office', '2025-03-01 00:00:00'),
(18, 'Christmas Break December 20 2024 to January 5 2025', 'The school will be on Christmas Break from December 20, 2024 to January 5, 2025. Classes will resume on January 6, 2025. The administration wishes everyone a Merry Christmas and a Happy New Year!', 'Academic Affairs Office', '2024-12-15 02:00:00'),
(19, 'Prelim Examination Schedule First Semester 2024-2025', 'The Preliminary Examination for First Semester AY 2024-2025 will be held from September 16 to 20, 2024. Students are reminded to bring their exam permits and arrive on time at their designated examination rooms.', 'Academic Affairs Office', '2024-09-10 00:00:00'),
(20, 'Welcome Back First Semester 2024-2025', 'Welcome back! Classes for the First Semester of Academic Year 2024-2025 officially begin on August 12, 2024. We wish all students a productive and successful semester ahead!', 'Registrar Office', '2024-08-07 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_code` varchar(20) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `instructor` varchar(100) DEFAULT NULL,
  `schedule_days` varchar(50) DEFAULT NULL,
  `schedule_time` varchar(50) DEFAULT NULL,
  `room` varchar(50) DEFAULT NULL,
  `color` varchar(20) DEFAULT '#6366f1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_code`, `course_name`, `instructor`, `schedule_days`, `schedule_time`, `room`, `color`) VALUES
(1, 'IT301', 'Web Systems & Technologies', 'Prof. Santos', 'Monday & Wednesday', '7:30 AM - 9:00 AM', 'IT Lab 1', '#f5a623'),
(2, 'IT302', 'Object-Oriented Programming', 'Dr. Reyes', 'Tuesday & Thursday', '10:00 AM - 11:30 AM', 'CS Room 3', '#0a6b8a'),
(3, 'IT303', 'Database Management Systems', 'Prof. Cruz', 'Monday & Friday', '1:00 PM - 2:30 PM', 'IT Lab 2', '#f5a623'),
(4, 'IT304', 'Systems Analysis & Design', 'Dr. Lim', 'Wednesday', '3:00 PM - 5:00 PM', 'Lecture Hall B', '#0a6b8a'),
(5, 'IT305', 'Network Fundamentals', 'Prof. Garcia', 'Thursday & Saturday', '8:00 AM - 9:30 AM', 'Server Room A', '#f5a623'),
(6, 'IT306', 'Software Engineering', 'Prof. Mendoza', 'Tuesday & Friday', '10:00 AM - 11:30 AM', 'CS Room 1', '#0a6b8a'),
(7, 'IT307', 'Human Computer Interaction', 'Dr. Tan', 'Monday', '3:00 PM - 5:00 PM', 'IT Lab 3', '#f5a623'),
(8, 'IT308', 'Information Security', 'Prof. Villanueva', 'Wednesday & Friday', '1:00 PM - 2:30 PM', 'Server Room B', '#0a6b8a'),
(9, 'IT309', 'Mobile App Development', 'Dr. Aquino', 'Thursday', '2:00 PM - 5:00 PM', 'IT Lab 1', '#f5a623'),
(10, 'IT310', 'Data Structures & Algorithms', 'Prof. Bautista', 'Tuesday & Thursday', '7:30 AM - 9:00 AM', 'CS Room 2', '#0a6b8a');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`id`, `student_id`, `course_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(7, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `exam_name` varchar(100) DEFAULT NULL,
  `exam_date` date DEFAULT NULL,
  `exam_time` varchar(20) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `status` enum('Completed','Upcoming') DEFAULT 'Upcoming'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `course_id`, `exam_name`, `exam_date`, `exam_time`, `location`, `status`) VALUES
(1, 1, 'Web Systems Midterm', '2024-01-25', '10:00 AM', 'IT Lab 1', 'Completed'),
(2, 2, 'OOP Prelim Exam', '2024-02-05', '02:00 PM', 'CS Room 3', 'Completed'),
(3, 3, 'Database Design Exam', '2024-03-10', '01:00 PM', 'IT Lab 2', 'Completed'),
(4, 4, 'SAD Case Study Defense', '2024-04-02', '09:45 AM', 'Lecture Hall B', 'Completed'),
(5, 1, 'Web Systems Finals', '2024-05-15', '10:00 AM', 'IT Lab 1', 'Upcoming'),
(6, 2, 'OOP Final Project', '2024-06-08', '02:00 PM', 'IT Lab 1', 'Upcoming'),
(7, 5, 'Network Fundamentals Final', '2024-11-20', '02:00 PM', 'Server Room A', 'Upcoming');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `midterm` decimal(5,2) DEFAULT NULL,
  `finals` decimal(5,2) DEFAULT NULL,
  `final_grade` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `student_id`, `course_id`, `midterm`, `finals`, `final_grade`) VALUES
(1, 1, 1, 88.00, NULL, NULL),
(2, 1, 2, 92.00, NULL, NULL),
(3, 1, 3, 85.00, NULL, NULL),
(4, 1, 4, 90.00, NULL, NULL),
(5, 1, 5, 87.00, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `homeworks`
--

CREATE TABLE `homeworks` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `assignment_name` varchar(150) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `status` enum('Not Submitted','In Progress','Completed') DEFAULT 'Not Submitted',
  `file_path` varchar(255) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homeworks`
--

INSERT INTO `homeworks` (`id`, `course_id`, `assignment_name`, `due_date`, `status`, `file_path`, `student_id`) VALUES
(1, 1, 'Build a CRUD Web App', '2024-02-10', 'Completed', NULL, 1),
(2, 2, 'OOP Design Patterns Report', '2024-03-05', 'Completed', NULL, 1),
(3, 3, 'ER Diagram & Normalization', '2024-04-15', 'In Progress', NULL, 1),
(4, 4, 'System Proposal Document', '2024-04-08', 'Not Submitted', '', 1),
(5, 5, 'Network Topology Lab Report', '2024-05-20', 'Not Submitted', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `payment_schedule`
--

CREATE TABLE `payment_schedule` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `month_label` varchar(50) DEFAULT NULL,
  `due_date` date DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `status` enum('Paid','Unpaid','Overdue') DEFAULT 'Unpaid',
  `paid_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_schedule`
--

INSERT INTO `payment_schedule` (`id`, `student_id`, `month_label`, `due_date`, `amount`, `status`, `paid_date`) VALUES
(1, 1, 'December 2025', '2025-12-20', 7500.00, 'Paid', '2025-12-10'),
(2, 1, 'January 2026', '2026-01-20', 7500.00, 'Paid', '2026-01-12'),
(3, 1, 'February 2026', '2026-02-20', 7500.00, 'Paid', '2026-02-14'),
(4, 1, 'March 2026', '2026-03-20', 7500.00, 'Overdue', '2026-03-30'),
(5, 1, 'April 2026', '2026-04-20', 7500.00, 'Unpaid', '2026-04-19'),
(6, 1, 'May 2026', '2026-05-20', 7500.00, 'Unpaid', '2026-05-30');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT 'default.png',
  `semester` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_tuition` decimal(10,2) DEFAULT 45000.00,
  `total_paid` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_id`, `full_name`, `username`, `password`, `email`, `profile_pic`, `semester`, `created_at`, `total_tuition`, `total_paid`) VALUES
(1, '2021-00123', 'Elle Dela Cruz', 'Elle@school.edu', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'elle@school.edu', '1780068669_74584c65b04e8f2c21a6.jpg', 3, '2026-05-29 14:33:25', 45000.00, 22500.00);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `homeworks`
--
ALTER TABLE `homeworks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `payment_schedule`
--
ALTER TABLE `payment_schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `homeworks`
--
ALTER TABLE `homeworks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payment_schedule`
--
ALTER TABLE `payment_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `enrollments_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `grades`
--
ALTER TABLE `grades`
  ADD CONSTRAINT `grades_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `grades_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`);

--
-- Constraints for table `homeworks`
--
ALTER TABLE `homeworks`
  ADD CONSTRAINT `homeworks_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `homeworks_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `payment_schedule`
--
ALTER TABLE `payment_schedule`
  ADD CONSTRAINT `payment_schedule_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
