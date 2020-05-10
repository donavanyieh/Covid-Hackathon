DROP DATABASE IF EXISTS user;

CREATE DATABASE user;
USE user; 

CREATE TABLE user (
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    postalcode int NOT NULL,
    unit VARCHAR(50) NOT NULL,
    PRIMARY KEY (username)
); 


INSERT INTO user (username, password, postalcode, unit) VALUES ("Don", "password", 510717, "14-05");
INSERT INTO user (username, password, postalcode, unit) VALUES ("Clement", "password", 510717, "13-05");



