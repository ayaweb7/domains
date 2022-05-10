DROP DATABASE IF EXISTS `test`;
CREATE DATABASE `test`;

create user test@'%' identified by 'test';
grant all privileges on test.* to test@'%' identified by 'test';

USE `test`;

CREATE TABLE `test`
(
	`id` INT(10) PRIMARY KEY AUTO_INCREMENT,
	`datum` VARCHAR(255)
);

INSERT INTO `test`(`datum`)
	VALUES('hellow world'),('almost University'),('Nick');
	
CREATE TABLE `login1`
(
	`id` INT(10) PRIMARY KEY AUTO_INCREMENT,
	`login_name` VARCHAR(255),
	`login_pass_hash` CHAR(255) NOT NULL,
	`email` VARCHAR(255)
);
INSERT INTO `login1`(`login_name`, `login_pass_hash`, `email`)
	VALUES('nikart'),('arteeva12'),('ayaweb7@gmail.com');
	
CREATE TABLE `message1`
(
	`id` INT(10) PRIMARY KEY AUTO_INCREMENT,
	`user_id` INT(10) NOT NULL,
	`msg_text` TEXT DEFAULT
);
INSERT INTO `message1`(`user_id`, `msg_text`)
	VALUES(1, 'hello ! ! !');
	
CREATE TABLE `login2`
(
	`id` INT(10) PRIMARY KEY AUTO_INCREMENT,
	`iv` VARBINARY(255),
	`login_name_cypher` VARBINARY(255),
	`login_pass_hash` CHAR(255) NOT NULL,
	`email_cypher` VARBINARY(255)
);


CREATE TABLE `message2`
(
	`id` INT(10) PRIMARY KEY AUTO_INCREMENT,
	`user_id` INT(10) NOT NULL,
	`msg_text` TEXT BLOB
);