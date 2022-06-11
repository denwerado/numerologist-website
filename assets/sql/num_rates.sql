CREATE TABLE `num_rates`(
    `id` int NOT NULL primary key AUTO_INCREMENT,
    `title` VARCHAR(255) UNIQUE,
    `price` INT,
    `time_action` DATE
) CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO `num_rates` (`title`,`price`,`time_action`)
VALUES
    ('basic',3900,'0000.01.00'),
    ('premium',7900,'0000.03.00'),
    ('pro',10900,'0001.00.00')