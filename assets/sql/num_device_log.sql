CREATE TABLE `num_device_log`(
    `id` int NOT NULL primary key AUTO_INCREMENT,
    `loginsId` int NOT NULL,
    `IP` VARCHAR(255) UNIQUE,
    `device` VARCHAR(255),
    `browser` VARCHAR(255),
    FOREIGN KEY (loginsId) REFERENCES `num_logins` (id)
) CHARACTER SET utf8 COLLATE utf8_unicode_ci;