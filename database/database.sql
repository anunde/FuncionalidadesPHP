CREATE DATABASE IF NOT EXISTS user;

USE user;

CREATE TABLE IF NOT EXISTS users(
id int(255) not null auto_increment,
role varchar(20),
name varchar(200) not null,
surname varchar(100) not null,
nick varchar(20) not null,
email varchar(255) not null,
password varchar(255) not null,
status varchar(255),
image varchar(255),
created_at datetime,
updated_at datetime,
remember_token varchar(255),
CONSTRAINT pk_users PRIMARY KEY(id)
)ENGINE=InnoDB;