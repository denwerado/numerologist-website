CREATE TABLE `num_account_details`(  
    `id` int NOT NULL primary key AUTO_INCREMENT,
    `loginsId` int NOT NULL,
    `name` VARCHAR(255),
    `surname` VARCHAR(255),
    `patronymic` VARCHAR(255),
    `dateBirth` VARCHAR(255),
    `timeBirth` VARCHAR(255),
    `gender` VARCHAR(255),
    `dateBirthPartner` VARCHAR(255),
    FOREIGN KEY (loginsId) REFERENCES num_logins (id)
) CHARACTER SET utf8 COLLATE utf8_unicode_ci;