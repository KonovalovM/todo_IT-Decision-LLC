CREATE database todo;
USE todo;

CREATE table users (
id int unsigned primary key auto_increment,
name varchar (255) not null default '',
email varchar (255) unique not null,
password varchar (255),
position int unsigned,
time_created timestamp
);
CREATE table lists (
id int unsigned primary key auto_increment,
cat_name varchar (255),
time_created timestamp,
title varchar (255),
description varchar (255),
done int unsigned
);

INSERT INTO `users` (`name`, `email`, `password`, `position`)
VALUES
('admin', 'admin@gmail.com', 'admin', '1');
