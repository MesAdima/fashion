CREATE TABLE `manager_mail` (
  `mm_id` int(11) NOT NULL AUTO_INCREMENT,
  `mm_subject` text NOT NULL,
  `mm_message` text NOT NULL,
  `date_sent` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`mm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1