ALTER TABLE `OrderItems` ADD COLUMN `user_id` int;
ALTER TABLE `OrderItems` ADD FOREIGN KEY (user_id) REFERENCES Users(id); 