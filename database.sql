CREATE DATABASE loginSystem_DB;
use loginSystem_DB;

CREATE TABLE `users` ( 
    `id` int(11) NOT NULL AUTO_INCREMENT, 
    `username` varchar(50) NOT NULL, 
    `email` varchar(100) NOT NULL, 
    `password` varchar(255) NOT NULL, 
    `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY (`id`), 
    UNIQUE KEY `username` (`username`), 
    UNIQUE KEY `email` (`email`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;