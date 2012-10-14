CREATE TABLE `users` (
  `user_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(25) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` enum('_ADM','_USER','_OPER') DEFAULT '_USER',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `IDX_user_pass` (`username`,`password`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;