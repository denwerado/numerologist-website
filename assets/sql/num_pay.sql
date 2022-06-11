CREATE TABLE `num_pay`(
  `id` int NOT NULL primary key AUTO_INCREMENT,
  `email` VARCHAR(255) NOT NULL,
  `name` VARCHAR(255) NOT NULL,
  `rate` VARCHAR(255),
  `sum` INT,
  `status_pay` VARCHAR(255) NOT NULL,
  `time` DATETIME NOT NULL,
  `status` VARCHAR(255) NOT NULL,
  FOREIGN KEY (rate) REFERENCES num_rates (title)
) CHARACTER SET utf8 COLLATE utf8_unicode_ci;
