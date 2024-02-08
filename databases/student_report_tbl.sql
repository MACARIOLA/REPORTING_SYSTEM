CREATE TABLE `student_report_tbl` (
  `id` int(11) NOT NULL,
  `building` varchar(255) NOT NULL,
  `room` varchar(255) NOT NULL,
  `state` varchar(255) DEFAULT NULL,
  `problem` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `professor` varchar(255) NOT NULL,
  `comment_type` varchar(20) NOT NULL,
  `comment_text` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `Date End` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `student_report_tbl` (`id`, `building`, `room`, `state`, `problem`, `course`, `professor`, `comment_type`, `comment_text`, `timestamp`, `Date End`) VALUES
(1, 'New Building', '203', '', 'Electricity', 'DICT 3 - 1', 'Ms. Indaleen', 'none', '', '2024-02-07 23:53:05', ''),
(2, 'Old Building', 'Comlab 2', '', 'Ceiling', 'BSIT 4 - 1', 'Mr. Maravilla', 'none', '', '2024-02-07 23:53:18', ''),
(3, 'New Building', '201', '', 'Chemical', 'BSIT 3 - 1', 'Mr. Maravilla', 'none', '', '2024-02-07 23:53:27', ''),
(4, 'Old Building', 'Comlab 1', '', 'Floor', 'BSIT 3 - 1', 'Mr. Miguel', 'none', '', '2024-02-07 23:53:55', ''),
(5, 'New Building', '203', '', 'Defective', 'BSIT 4 - 1', 'Mr. Miguel', 'none', '', '2024-02-07 23:54:03', ''),
(6, 'New Building', 'AVR2', '', 'Damaged', 'BSIT 3 - 1', 'Mr. Miguel', 'none', '', '2024-02-08 03:16:44', '');

ALTER TABLE `student_report_tbl`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `student_report_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;
