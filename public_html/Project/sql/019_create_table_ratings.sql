CREATE TABLE IF NOT EXISTS `Ratings` (
    `id` int AUTO_INCREMENT PRIMARY KEY,
    `user_id` INT,
    `product_id` INT,
    `rating` TINYINT(1) DEFAULT 0,
    `comment` TEXT,
    `created` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `modified` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(id),
    FOREIGN KEY (product_id) REFERENCES Products(id),
    check (rating>=0 AND rating<=5)
)