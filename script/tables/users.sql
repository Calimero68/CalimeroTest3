create table users (
	id int(11) not null AUTO_INCREMENT,
	username varchar(30) not null unique,
	created_date datetime not null,
	password varchar(64) not null,
	email varchar(254) not null unique,
	isActive tinyint(1) not null,
	newsletter tinyint(1) not null,
	role varchar(20),
		PRIMARY KEY (id)
);
	