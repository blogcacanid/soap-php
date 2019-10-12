-- database name: soap_db
--
-- Create table `users`
CREATE TABLE `users` (
  `id_users` int(5) NOT NULL auto_increment,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY  (`id_users`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
INSERT INTO `users` (`id_users`, `username`, `password`) VALUES
(1, 'user1', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'user2', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'user3', '827ccb0eea8a706c4c34a16891f84e7b');

---
--- username: user1, user2, user
--- password: 12345, 12345, 12345

