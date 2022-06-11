CREATE TABLE `num_info_calcs`(  
    `id` int NOT NULL primary key AUTO_INCREMENT,
    `calc_name` VARCHAR(255),
    `type` INT,
    `differences` VARCHAR(255),
    `timeRange1` TIME,
    `timeRange2` TIME,
    `dateRange1` DATE,
    `dateRange2` DATE,
    `content` TEXT NOT NULL,
    `subcalc_name`VARCHAR(255),
    FOREIGN KEY (`calc_name`) REFERENCES `num_desc_calcs` (`calc_name`),
    FOREIGN KEY (`subcalc_name`) REFERENCES `num_desc_subcalcs` (`subcalc_name`)
) CHARACTER SET utf8 COLLATE utf8_unicode_ci; 