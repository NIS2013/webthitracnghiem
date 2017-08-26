DROP TABLE users;<|||||||>

CREATE TABLE `users` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `role` tinyint(3) unsigned NOT NULL DEFAULT '1',
  `username` varchar(100) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `location` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `tempid` varchar(255) DEFAULT NULL,
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;<|||||||>

INSERT INTO users VALUES("","","","","","","","","","");<|||||||>
INSERT INTO users VALUES("","","","","","","","","","");<|||||||>
INSERT INTO users VALUES("","","","","","","","","","");<|||||||>
INSERT INTO users VALUES("","","","","","","","","","");<|||||||>
INSERT INTO users VALUES("","","","","","","","","","");<|||||||>
