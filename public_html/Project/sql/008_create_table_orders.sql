CREATE TABLE IF NOT EXISTS `Orders` (
    `id` int AUTO_INCREMENT PRIMARY KEY,
    `user_id`   int,
    `total_price`   int,
    `address` TEXT,
    `payment_method` TEXT,
    `money_received` TINYINT(1) DEFAULT 1,
    `created` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `modified` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(id)
)