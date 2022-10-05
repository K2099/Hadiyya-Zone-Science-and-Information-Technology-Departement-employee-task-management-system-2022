

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



CREATE TABLE `attendance_info` (
  `aten_id` int(20) NOT NULL,
  `atn_user_id` int(20) NOT NULL,
  `in_time` datetime DEFAULT NULL,
  `out_time` datetime DEFAULT NULL,
  `total_duration` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


INSERT INTO `attendance_info` (`aten_id`, `atn_user_id`, `in_time`, `out_time`, `total_duration`) VALUES
(1, 27, '2022-09-01 14:49:26', NULL, NULL);


CREATE TABLE `department_info` (
  `dep_id` int(20) NOT NULL,
  `dep_name` varchar(100) DEFAULT NULL,
  `dep_description` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


INSERT INTO `department_info` (`dep_id`, `dep_name`, `dep_description`) VALUES
(4, 'Software', 'Anything related with softwares');


CREATE TABLE `task_info` (
  `task_id` int(50) NOT NULL,
  `t_title` varchar(120) NOT NULL,
  `t_description` text DEFAULT NULL,
  `file_json` text NOT NULL,
  `t_start_time` datetime DEFAULT NULL,
  `t_end_time` datetime DEFAULT NULL,
  `t_user_id` int(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0 COMMENT '0 = incomplete, 1 = In progress, 2 = complete'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


INSERT INTO `task_info` (`task_id`, `t_title`, `t_description`,`file_json`, `t_start_time`, `t_end_time`, `t_user_id`, `status`) VALUES
(1, 'Hello', 'You have to hello', '2022-08-31 11:00:00', '2022-08-31 12:00:00', 27, 0),
(2, 'adam', 'go to adam', '2022-09-22 12:00:00', '2022-09-30 12:00:00', 27, 0);


CREATE TABLE `tbl_admin` (
  `user_id` int(20) NOT NULL,
  `fullname` varchar(120) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `temp_password` varchar(100) DEFAULT NULL,
  `user_role` int(10) NOT NULL,
  `user_dep_id` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='2';


INSERT INTO `tbl_admin` (`user_id`, `fullname`, `username`, `email`, `password`, `temp_password`, `user_role`, `user_dep_id`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500', NULL, 1, 0),
(27, 'adam', 'gebreyohannes', 'adam@gmail.com', '9ddc44f3f7f78da5781d6cab571b2fc5', '', 2, 4),
(32, 'someone', 'some', 'some@gmail.com', 'e1b8c1abf0b916bc2736a33c4b98817c', '9371298', 2, 4);


ALTER TABLE `attendance_info`
  ADD PRIMARY KEY (`aten_id`);


ALTER TABLE `department_info`
  ADD PRIMARY KEY (`dep_id`);

ALTER TABLE `task_info`
  ADD PRIMARY KEY (`task_id`);


ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`user_id`);


ALTER TABLE `attendance_info`
  MODIFY `aten_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;


ALTER TABLE `department_info`
  MODIFY `dep_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;


ALTER TABLE `task_info`
  MODIFY `task_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;


ALTER TABLE `tbl_admin`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

