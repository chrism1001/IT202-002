CREATE TABLE IF NOT EXISTS `Products`
(
    `id`        INT AUTO_INCREMENT PRIMARY KEY,
    `name`      VARCHAR(30) UNIQUE,
    `description`   TEXT,
    `category`      VARCHAR(20) default '',
    `stock`     INT DEFAULT 0,
    `unit_price`    INT DEFAULT 9999,
    `visibility`    TINYINT(1) DEFAULT 1,
    `created`       TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    `modified`      TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    check (stock >= 0),
    check (unit_price >= 0)
)