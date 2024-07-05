SET time_zone = "+02:00";

USE social;

CREATE TABLE IF NOT EXISTS `users` (
    `id` INT AUTO_INCREMENT NOT NULL,
    `first_name` VARCHAR(255),
    `last_name` VARCHAR(255),
    `username` VARCHAR(255),
    `email` VARCHAR(255),
    `password` VARCHAR(255),
    `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

