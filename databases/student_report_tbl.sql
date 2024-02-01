CREATE TABLE `student_report_tbl` (
  `id` int(11) NOT NULL,
  `building` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `problem` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `professor` varchar(255) NOT NULL,
  `comment_type` varchar(20) NOT NULL,
  `comment_text` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
