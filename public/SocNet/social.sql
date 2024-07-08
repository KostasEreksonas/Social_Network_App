SET time_zone = "+02:00";

USE social;

CREATE TABLE IF NOT EXISTS `users` (
    `id` INT AUTO_INCREMENT NOT NULL,
    `first_name` VARCHAR(255),
    `last_name` VARCHAR(255),
    `username` VARCHAR(255),
    `email` VARCHAR(255),
    `password` VARCHAR(255),
    `profile_pic` VARCHAR(255) DEFAULT 'assets/img/defaults/head_carrot.png',
    `deactivated` BIT DEFAULT 0,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	`updated_at` DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS `messages` (
    `id` INT AUTO_INCREMENT NOT NULL,
    `user_to` VARCHAR(255) NOT NULL,
    `user_from` VARCHAR(255) NOT NULL,
    `body` TEXT NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS `posts` (
    `id` INT NOT NULL,
    `body` TEXT NOT NULL,
    `added_by` VARCHAR(255) NOT NULL,
    `user_to` varchar(60) NOT NULL,
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);
