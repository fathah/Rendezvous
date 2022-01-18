SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `program` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `section` varchar(5) NOT NULL,
  `addedOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `type` varchar(5) DEFAULT NULL,
  `isCompleted` int(1) DEFAULT NULL,
  `resultDeclared` int(1) DEFAULT NULL,
  `rules` longtext DEFAULT NULL,
  `topics` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `programlist` (
  `id` int(11) NOT NULL,
  `studentid` int(11) NOT NULL,
  `programid` int(11) NOT NULL,
  `grade` varchar(10) NOT NULL,
  `rank` int(1) NOT NULL,
  `addedOn` timestamp NOT NULL DEFAULT current_timestamp(),
  `groupId` varchar(10) DEFAULT NULL,
  `point` int(5) DEFAULT NULL,
  `type` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `scores` (
  `id` int(11) NOT NULL,
  `level` int(5) NOT NULL,
  `team1` int(11) NOT NULL,
  `team2` int(11) NOT NULL,
  `team3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `campus` varchar(10) NOT NULL,
  `team` varchar(10) NOT NULL,
  `chest` int(5) NOT NULL,
  `card_no` varchar(255) DEFAULT NULL,
  `section` varchar(5) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `team` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(10) NOT NULL,
  `point` int(11) NOT NULL,
  `floor` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `program`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `programlist`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

ALTER TABLE `programlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

ALTER TABLE `team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;
