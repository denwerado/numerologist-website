CREATE TABLE `num_logins`(
  `id` int NOT NULL primary key AUTO_INCREMENT,
  `login` VARCHAR(255) UNIQUE NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `name` VARCHAR(255),
  `rate` VARCHAR(255),
  `time_purchase` DATE,
  FOREIGN KEY (rate) REFERENCES num_rates (title)
) CHARACTER SET utf8 COLLATE utf8_unicode_ci;