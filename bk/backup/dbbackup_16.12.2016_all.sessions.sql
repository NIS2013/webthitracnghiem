DROP TABLE sessions;<|||||||>

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sessionid` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `device` varchar(255) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=168 DEFAULT CHARSET=latin1;<|||||||>

INSERT INTO sessions VALUES("","","","","","");<|||||||>
INSERT INTO sessions VALUES("","","","","","");<|||||||>
INSERT INTO sessions VALUES("","","","","","");<|||||||>
INSERT INTO sessions VALUES("","","","","","");<|||||||>
INSERT INTO sessions VALUES("","","","","","");<|||||||>
INSERT INTO sessions VALUES("","","","","","");<|||||||>
INSERT INTO sessions VALUES("","","","","","");<|||||||>
INSERT INTO sessions VALUES("","","","","","");<|||||||>
INSERT INTO sessions VALUES("","","","","","");<|||||||>
INSERT INTO sessions VALUES("","","","","","");<|||||||>
INSERT INTO sessions VALUES("","","","","","");<|||||||>
INSERT INTO sessions VALUES("","","","","","");<|||||||>
INSERT INTO sessions VALUES("","","","","","");<|||||||>
INSERT INTO sessions VALUES("","","","","","");<|||||||>
INSERT INTO sessions VALUES("","","","","","");<|||||||>
INSERT INTO sessions VALUES("","","","","","");<|||||||>
INSERT INTO sessions VALUES("","","","","","");<|||||||>
