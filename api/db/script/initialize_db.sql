

CREATE DATABASE IF NOT EXISTS shop;

USE shop;

CREATE TABLE IF NOT EXISTS products (
    id INT(11) AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO products VALUES (0, "MacBook Pro core i5-591 8GB 2012", 250000);
INSERT INTO products VALUES (0, "Nokia 4.2 Smartphone", 120000);