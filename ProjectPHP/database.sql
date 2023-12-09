
CREATE TABLE `users` (
  `id` int NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) not null ,
  `confirmPassword` varchar(100) not null ,
  PRIMARY KEY  (`id`)
);
CREATE TABLE `blogs` (
  `id` int NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `content` varchar(10000) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
);
