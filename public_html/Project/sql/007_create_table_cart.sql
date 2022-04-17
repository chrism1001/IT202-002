CREATE TABLE IF NOT EXISTS `CART`
(
    `id` int AUTO_INCREMENT PRIMARY KEY,
    `product_id` int,
    `user_id` int,
    `desired_quantity` int,
    `unit_price` int,
    `created`   TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `modified`  TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(id),
    FOREIGN KEY (product_id) REFERENCES Products(id),
    UNIQUE KEY (user_id, product_id)
)