CREATE TABLE `check_in`{
	`checkIn_id` smallint UNSIGEND NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`uid` int(11) NOT NULL,
	`sid` int(11) NOT NULL,
	`package_id` int(11) NOT NULL,
	`username` varchar(20) NOT NULL,
	`email` varchar(50) NOT NULL,
	`phone` int(20) NOT NULL,
	`status` tinyint(1) NOT NULL DEFAULT 0,
	`checkIn_code` int(20) NOT NULL
	FOREIGN KEY `uid` REFERENCES user(uid)
	FOREIGN KEY `sid` REFERENCES tbl_services(sid)
	FOREIGN KEY `package_id` REFERENCES tbl_package(package_id)
}; ENGINE MyISAM latin-charset=utf-8; 